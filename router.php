<?php

require_once __DIR__ . '/class/template.class.php';

/**
 * Holds the registered routes
 *
 * @var array $routes
 */
$routes = [];

/**
 * Holds the registered templates
 *
 * @var array $templates
 */
$templates = [
	'main' => TEMPLATE_PATH.'/main.php',
	'embed' => TEMPLATE_PATH.'/embed.php',
	'embed-tabs' => TEMPLATE_PATH.'/embed-tabs.php'
];

/**
 * Register a new route
 *
 * @param $action string
 * @param \Closure $callback Called when current URL matches provided action
 */
function route($action, Closure $callback)
{
    global $routes;
    $action = trim($action, '/');
    $routes[$action] = $callback;
}

/**
 * Dispatch the router
 *
 * @param $action string
 */
function dispatch($action, array $arguments = array())
{
    global $routes;
    $action = trim($action, '/');
    $callback = $routes[$action];

    echo call_user_func($callback, $arguments);
}

/* Default Routes */
route(RELATIVE_PATH, function (array $arguments = array()) {
	global $templates;
	$template = TEMPLATE_PATH.'/main.php';
	$output = $arguments['output'];

	if ( array_key_exists($output, $templates) ) {
		$template = $templates[$output];
	}

    return Template::__render($template, $arguments);
});

?>