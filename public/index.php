<?php

require 'Core/Router.php';

$router = new Router();

// add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);

// display this routing table
echo "<pre>";
var_dump($router->getRoutes());
echo "</pre>";