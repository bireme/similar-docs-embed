<?php

function get_db_list() {
	$db_list = array(
		'LILACS'  => 'LILACS',
		'MEDLINE' => 'MEDLINE'
	);

	return $db_list;
}

function get_url_lang($lang='pt') {
	unset($_REQUEST['output']);
	$_REQUEST['lang'] = $lang;
	$protocol = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http" );
	$url = $protocol . '://' .$_SERVER["HTTP_HOST"] . strtok($_SERVER["REQUEST_URI"], '?');

	if ( $_REQUEST ) {
		$url .= '?'.http_build_query($_REQUEST);
	}

	return $url;
}

?>