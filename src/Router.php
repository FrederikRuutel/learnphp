<?php
namespace App;

class Router {
    private static $routes = [];

    public static function getRoutes() {
        return self::$routes;
    }

    public static function addRoute($method, $path, $action) {
        self::$routes[] = ['path' => $path, 'action' => $action];
    }

    public function __construct(private $path, private $method){
        $this->path = parse_url($this->path, PHP_URL_PATH);
    }

    public function match() {
        foreach(self::$routes as $route) {
            if ($route['path'] === $this->path && $route['method'] === $this->method) {
                return $route;
            }
        }
        return false;
    }
}