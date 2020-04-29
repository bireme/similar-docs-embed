<?php
/**
 * SimDocs Class
 *
 * @package     Minha BVS - Alertas
 * @author      Wilson da Silva Moura (mourawil@paho.org)
 * @copyright   BIREME/PAHO/WHO
 *
 */

// require_once __DIR__ . '/../includes.php';

class SimDocs {

    public function __construct() {}

    /**
     * List related documents from SimilarDocs service
     *
     * @param string $string
     * @return array
     */
    public static function adhocSimilarDocs($string, $db){
        $retValue = false;
        $filter_db = ( $db ) ? '&sources='.$db : '';
        $request = SIMDOCS_GET_RELATED.urlencode($string).$filter_db;

        $opts = array(
            'http' => array(
                'method' => "GET",
                'header' => implode("\r\n", array(
                                'Content-type: text/html,application/xhtml+xml,application/xml'
                            ))
            )
        );

        $context = stream_context_create($opts);
        $content = utf8_encode(@file_get_contents($request,false,$context));

        if($content){
            $result = self::xml_to_array($content);

            if( array_key_exists('document', $result) && count($result) > 0 ){
                if( array_key_exists( 0, $result['document'] ) )
                    $retValue = $result['document'];
                else
                    $retValue = array_values($result);
            }
        }

        return $retValue;
    }

    /**
     * Generate the similar document URL
     *
     * @param string $docID
     * @return string $docURL Similar document URL
     */
    public static function generate_similardoc_url($docID){
        $docURL = VHL_SEARCH_PORTAL_DOMAIN."/portal/resource/".DEFAULT_LANG."/".$docID;
        return $docURL;
    }

    /**
     * Get the similar document authors
     *
     * @param string|array $authors
     * @return string $authors Similar document authors
     */
    public static function get_similardoc_authors($authors){
        $authors = ( is_array($authors) ) ? implode("; ", $authors) : $authors;
        return $authors;
    }

    /**
     * Get the similar document title
     *
     * @param array $similar
     * @param string $lang
     * @return string $title
     */
    public static function get_similardoc_title($similar, $lang='pt'){
        $key = '';
        $title = '';
        $lang = 'ti_'.$lang;

        if ( array_key_exists($lang, $similar) ) {
            $title = $similar[$lang];
        } elseif ( array_key_exists('ti_pt', $similar) ) {
            $title = $similar['ti_pt'];
        } elseif ( array_key_exists('ti_es', $similar) ) {
            $title = $similar['ti_es'];
        } elseif ( array_key_exists('ti_en', $similar) ) {
            $title = $similar['ti_en'];
        } elseif ( array_key_exists('ti', $similar) ) {
            if ( is_array($similar['ti']) )
                $title = $similar['ti'][0];
            else
                $title = $similar['ti'];
        } elseif ( array_key_exists('la', $similar) ) {
            if ( is_array($similar['la']) )
                $key = 'ti_'.$similar['la'][0];
            else
                $key = 'ti_'.$similar['la'];

            if ( array_key_exists($key, $similar) ) $title = $similar[$key];
        }

        if ( empty($title) ) {
            $similar = array_filter( $similar, function($key){
                return strpos($key, 'ti_') === 0;
            }, ARRAY_FILTER_USE_KEY );

            if ( !empty($similar) ) $title = array_shift($similar);
        }
        
        return $title;
    }

    /**
     * Convert XML string to Array
     *
     * @param string $xmlProfile
     * @return array
     */
    public static function xml_to_array($xmlProfile){
        /* load simpleXML object */
        $xmlProfile = utf8_decode(str_replace('&', '&amp;', $xmlProfile));
        $xml = simplexml_load_string($xmlProfile,'SimpleXMLElement',LIBXML_NOCDATA);
        $json = json_encode($xml);
        $result = json_decode($json,true);

        return $result;
    }
}
?>
