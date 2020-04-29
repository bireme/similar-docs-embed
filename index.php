<?php

/**
 * Alert template output
 *
 * @package     Minha BVS - Alertas
 * @author      Wilson da Silva Moura (mourawil@paho.org)
 * @copyright   BIREME/PAHO/WHO
 *
 */

require_once "config.php";
require_once "functions.php";
require_once "router.php";

$args = array();
$args['query'] = ( array_key_exists("q", $_REQUEST) ) ? $_REQUEST['q'] : '';
$args['lang'] = ( array_key_exists("lang", $_REQUEST) ) ? $_REQUEST['lang'] : 'pt';
$args['output'] = ( array_key_exists("output", $_REQUEST) ) ? $_REQUEST['output'] : 'main';
$args['db'] = ( array_key_exists("db", $_REQUEST) ) ? $_REQUEST['db'] : false;

$action = parse_url($_SERVER['REQUEST_URI']);

dispatch($action['path'], $args);

?>