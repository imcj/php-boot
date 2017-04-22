<?php
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\HandlerResolverInterface;

class RouterResolver implements HandlerResolverInterface
{
    public function resolve($handler)
    {
        global $container;
        /*
         * Only attempt resolve uninstantiated objects which will be in the form:
         *
         *      $handler = ['App\Controllers\Home', 'method'];
         */
        if (is_array($handler) and is_string($handler[0]))
        {
            $controller = $container->get($handler[0]);
            // var_dump($controller);die();
            $handler[0] = $controller;
            
            // $container->injectOn($controller);
        }

        return $handler;
    }
}

$router = new RouteCollector();

$router->controller('/api/user', 'org\phpee\web\controllers\user\UserController');
$router->controller('/api/auth', 'org\phpee\web\controllers\auth\AuthController');

$resolver = new RouterResolver;
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData(), $resolver);

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], 
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
