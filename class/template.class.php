<?php
/**
 * Alerts Class
 *
 * @package     Minha BVS - Alertas
 * @author      Wilson da Silva Moura (mourawil@paho.org)
 * @copyright   BIREME/PAHO/WHO
 *
 */

require_once __DIR__ . '/simdocs.class.php';

class Template {

    public function __construct() {}
    
    public static function __render($template, array $arguments = array())
    {
        if (!ini_get('allow_url_fopen')) {
            self::__error('INI setting allow_url_fopen not enabled.');
        }

        if (!is_readable($template)) {
            self::__error('Template file "%s" is not readable', $template);
        }

        if (!file_exists(__DIR__ . '/../config.php')) {
            self::__error('config.php not found');
        }

        date_default_timezone_set(TIMEZONE);
        global $localTimezone;
        $localTimezone = new DateTimeZone(TIMEZONE);

        $encode = function($str){return htmlentities($str, ENT_QUOTES, 'UTF-8');};
        $elipsize = function($str, $length){return mb_strlen($str, 'UTF-8') > $length
                                                   ? mb_substr($str, 0, mb_strrpos(mb_substr($str, 0, $length), ' ')) . '&nbsp;…'
                                                   : $str;};

        $texts = parse_ini_file("ini/".$arguments['lang']."/texts.ini");
        $similarDocs = self::getSimilarDocs($arguments['query'], $arguments['lang'], $arguments['db']);
        $embed_url = get_site_url($arguments['lang'], true);
        $db_list = get_db_list();
        $themes = get_themes();

        if ( 'embed-tabs' == $arguments['output'] || 'tabs' == $arguments['theme'] ) {
            $similarDB = array();
            $databases = explode(',', $arguments['db']);
            $databases = array_flip($databases);
            $databases = array_intersect_key($db_list, $databases);
            $databases = ( $databases ) ? $databases : $db_list;

            if ( $databases ) {
                foreach ($databases as $key => $value) {
                    $similarDB[$key] = self::getSimilarDocs($arguments['query'], $arguments['lang'], $key);
                }
            }
        }

        require_once $template;
    }

    public static function __error($message)
    {
        $args = func_get_args();
        array_shift($args);
        die(vsprintf($message . PHP_EOL, $args));
    }

    public static function __log($message)
    {
        global $lastFunction;
        global $localTimezone;

        $args = func_get_args();
        array_shift($args);

        foreach ($args as &$arg) {
            $arg = preg_replace('/(key|signature)([^=]*)=([^\&]+)/i', '\1\2=...', $arg);
        }

        $microtime = (string)microtime(true);
        $date = DateTime::createFromFormat('U.u', $microtime);
        $date->setTimezone($localTimezone);
        if (!$date) {
            printf("Error creating date from microtime %s: %s\n", $microtime, print_r(DateTime::getLastErrors(), true));
            exit('COULD NOT CREATE MICROTIME');
        }
        $fmt = 'D, d M y H:i:s.u';

        $bt = debug_backtrace();
        $function = $bt[1]['function'];
        if ($function != $lastFunction) {
            $lastFunction = $function;
            $prefix = $function . ' ' . $date->format($fmt) . ': ';
        } else {
            $prefix = str_repeat(' ', strlen($function) + 1) . $date->format($fmt) . ': ';
        }

        $date = date('Ymd');
        $log_file = str_replace('#DATE#', $date, LOG_FILE);
        $log_msg = vsprintf($prefix . $message . PHP_EOL, $args);
        file_put_contents($log_file, $log_msg, FILE_APPEND);
    }

    public static function __cache($expire, $function, array $arguments = array())
    {
        $now = time();
        $dir = __DIR__ . '/../cache';
        $filename = $dir . '/' . str_replace('\\', '.', $function) . md5(serialize($arguments));
        if (file_exists($filename)) {
            $file = fopen($filename, 'rb');
            $expiry = fgets($file);
            if ($now > $expiry) {
                fclose($file);
                unlink($filename);
                self::__log('Cache for %s expired. Cleanup up', $function);
            } else {
                self::__log('Reading %s from cache', $function);
                $serialized = '';
                while (!feof($file)) {
                    $serialized .= fgets($file);
                }
                $data = unserialize($serialized);
                fclose($file);
                return $data;
            }
        }

        if ( method_exists(__CLASS__, $function) ) {
            $data = call_user_func_array(array(__CLASS__, $function), $arguments);
        } else {
            $data = call_user_func_array($function, $arguments);
        }

        if (!file_exists($dir) || !is_dir($dir)) {
            self::__log('Cache dir "%s" does not exists or is not an directory', $dir);
        } else {
            self::__log('Caching %s result for %f minutes', $function, $expire / 60);
            $file = fopen($filename, 'w+');
            fputs($file, $now + $expire . "\n");
            fputs($file, serialize($data));
            fclose($file);
        }

        return $data;
    }

    public static function __escape($str)
    {
        return htmlentities($str, ENT_QUOTES, 'UTF-8');
    }

    public static function getSimilarDocs($query, $lang, $db)
    {
        self::__log('Started');

        $string = '';
        $similars = array();
        $filter_db = ( $db ) ? '&sources='.$db : '';
        $resource = sprintf('%s%s%s', SIMDOCS_GET_RELATED, rawurlencode($query), $filter_db);
        $data = SimDocs::adhocSimilarDocs($query, $db);
        
        if (!$data) {
            self::__log('Could not fetch resource "%s"', $resource);
        } else {
            self::__log('Successfully fetched');

            foreach ($data as $similar) {
                $title = SimDocs::get_similardoc_title($similar, $lang);

                if ( !empty($string) ) {
                    if ( strtolower(rtrim($title, '.')) == strtolower(rtrim($string, '.')) ) {
                        continue;
                    }
                }

                $url = SimDocs::generate_similardoc_url($similar['id']);

                $doc = array();
                $doc['title'] = htmlspecialchars_decode($title);
                $doc['url'] = $url.'?src=similar';
                $similars[] = $doc;

                $string = $title;
            }

            self::__log('Successfully transformed');
        }

        return $similars;
    }

    public static function is_set(array $struct, $fields, $instance = null)
    {
        foreach ((array)$fields as $field) {
            if (isset($struct[$field]) && (!$instance || $struct[$field] instanceof $instance)) {
                return $struct[$field];
            }
        }
    }
}
