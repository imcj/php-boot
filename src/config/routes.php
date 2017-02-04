<?php
use Phroute\Phroute\RouteCollector;
$router = new RouteCollector();

$router->any('{username:\w+}/{repository:\w+}', function($username, $repository)
{
});

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], 
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
