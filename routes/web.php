<?php
/**
 * Created by Riat Abduramani.
 * Date: 11/7/2018
 * Time: 12:28 PM
 */
use Customproject\Backbone\Router as Route;
/*
Route::get('/test', 'HelloRoute');
Route::get('/urls/2/lati', function () {
    echo "This is something else";
});*/

use Customproject\Application\Controllers\User;
$user = new User();
$get_all_users_handler = $user->users();


$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/users', 'Customproject\\Application\\Controllers\\User/users');
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
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // ... call $handler with $vars
        list($class, $method) = explode("/", $handler);
        call_user_func_array(array(new $class, $method), $vars);
        break;
}
