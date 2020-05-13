<?php

function get_db_list() {
	$databases = array(
		'LILACS'  => 'LILACS',
		'MEDLINE' => 'MEDLINE'
	);

	return $databases;
}

function get_themes() {
	$themes = array(
		'list' => 'List',
		'tabs' => 'Tabs'
	);

	return $themes;
}

function get_site_url($lang='pt', $embed=false, $skip=false) {
	$_REQUEST['lang'] = $lang;
	$protocol = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http" );
	$url = $protocol . '://' .$_SERVER["HTTP_HOST"] . strtok($_SERVER["REQUEST_URI"], '?');

	if ( $embed ) {
		$_REQUEST['output'] = 'embed';

		if ( $_REQUEST['theme'] && 'tabs' == $_REQUEST['theme'] ) {
			$_REQUEST['output'] = 'embed-tabs';
		}

		unset($_REQUEST['theme']);
	} else {
		unset($_REQUEST['output']);
	}

	if ( $_REQUEST && !$skip ) {
		$url .= '?'.http_build_query($_REQUEST);
	}

	return $url;
}

function shortened_string($string, $crop=true) {
    $string = htmlspecialchars_decode($string);

    if ( strlen($string) > 200 ) {
        $start = substr($string, 0, 200);
        $end = substr($string, 200);

        if ($crop) {
            $string = $start . ' [...]';
        } else {
            return $start.'<span class="show-all"> [...]</span><span class="short-string">'.$end.'</span>';
        }
    }

    return $string;
}

?>