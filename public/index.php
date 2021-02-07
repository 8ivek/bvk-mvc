<?php

require 'Core/Router.php';

$router = new Router();

// add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);

// match the requested route
$url = '';
if (!empty($_SERVER['QUERY_STRING'])) {
    $url = $_SERVER['QUERY_STRING'];
} elseif (!empty($_SERVER['REQUEST_URI'])) {
    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

    if (!file_exists(__DIR__ . '/' . $uri) && !is_file(__DIR__ . '/' . $uri)) {
        $url = trim($uri, '/');
    }
}

if ($router->match($url)) {
    echo '<pre>';
    var_dump($router->getParams());
    echo '</pre>';
} else {
    echo "No route found for url: $url";
}