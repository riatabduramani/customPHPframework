<?php
/**
 * Created by Riat Abduramani.
 * Date: 11/7/2018
 * Time: 12:28 PM
 */

use DI\ContainerBuilder;
$containerBuilder = new ContainerBuilder;

if(!file_exists(PROJECT_ROOT."/cache/DI/CompiledContainer.php") && $app['app_live'] == 'false') {
    $containerBuilder->enableCompilation(PROJECT_ROOT . '/cache/DI/');
} elseif($app['app_live'] == 'true' && file_exists(PROJECT_ROOT."/cache/DI/CompiledContainer.php")) {
    unlink(PROJECT_ROOT."/cache/DI/CompiledContainer.php");
    $containerBuilder->enableCompilation(PROJECT_ROOT . '/cache/DI/');
} elseif($app['app_live'] == 'true' && !file_exists(PROJECT_ROOT."/cache/DI/CompiledContainer.php")) {
    $containerBuilder->enableCompilation(PROJECT_ROOT . '/cache/DI/');
}

$container = $containerBuilder->build();

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/users', ['Customproject\Application\Controllers\User','users']);
});


// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}

$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo "404 not found";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        echo "405 Method Not Allowed";
        break;
    case FastRoute\Dispatcher::FOUND:
        $controller = $routeInfo[1];
        $parameters  = $routeInfo[2];
        echo $container->call($controller, $parameters);
        break;
}
