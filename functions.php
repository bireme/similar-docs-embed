<?php

function get_db_list() {
	$db_list = array(
		'LILACS'  => 'LILACS',
		'MEDLINE' => 'MEDLINE'
	);

	return $db_list;
}

function get_site_url($lang='pt', $skip=false) {
	unset($_REQUEST['output']);
	$_REQUEST['lang'] = $lang;
	$protocol = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http" );
	$url = $protocol . '://' .$_SERVER["HTTP_HOST"] . strtok($_SERVER["REQUEST_URI"], '?');

	if ( $_REQUEST && !$skip ) {
		$url .= '?'.http_build_query($_REQUEST);
	}

	return $url;
}

?>