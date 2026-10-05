<?php

// Let PHP's development server serve existing public assets directly.
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$publicFile = realpath(__DIR__ . rawurldecode($path));
if (PHP_SAPI === 'cli-server' && $publicFile !== false
    && str_starts_with($publicFile, __DIR__ . DIRECTORY_SEPARATOR)
    && is_file($publicFile) && strtolower(pathinfo($publicFile, PATHINFO_EXTENSION)) !== 'php') {
    return false;
}

session_start();
require __DIR__ . '/../bootstrap.php';

require __DIR__ . '/../helpers.php';
require __DIR__ . '/../routes.php';

$router = new App\Router($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
$match = $router->match();
if($match) {
    if(is_callable($match['action'])) {
        call_user_func($match['action']);
    } else if(is_array($match['action'])) {
        $class = $match['action'][0];
        $controller = new $class();
        $method = $match['action'][1];
        $controller->$method();
    }
} else {
    http_response_code(404);
    echo '404 Not Found';
}
