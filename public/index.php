<?php

spl_autoload_register(function ($class) {
    $root = dirname(__DIR__); // get the parent directory
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $root . '/' . str_replace('\\', '/', $class) . '.php';
    }
});

$router = new Core\Router();

// add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
/*$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);*/

$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');

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

/*if ($router->match($url)) {
    echo '<pre>';
    var_dump($router->getParams());
    echo '</pre>';
} else {
    echo "No route found for url: $url";
}*/

$router->dispatch($url);