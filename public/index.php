<?php

/**
 * Front controller
 */

require_once '../vendor/autoload.php';

$loader = new Twig\Loader\FilesystemLoader('../App/Views');
$twig = new Twig\Environment($loader, ['debug' => true]);

$router = new Core\Router();

// add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);

$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');

// match the requested route, avoid using request_uri (aka. use docker to make it separate server)
$url = '';
if (!empty($_SERVER['QUERY_STRING'])) {
    $url = $_SERVER['QUERY_STRING'];
} elseif (!empty($_SERVER['REQUEST_URI'])) {
    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

    if (!file_exists(__DIR__ . '/' . $uri) && !is_file(__DIR__ . '/' . $uri)) {
        $url = trim($uri, '/');
    }
}

$router->dispatch($url);