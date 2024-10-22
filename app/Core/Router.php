<?php

namespace Pkl\MyApp\Core;

class Router
{
    protected $params = [];

    private const DEFAULT_GET = 'GET';
    private const DEFAULT_POST = 'POST';
    private const DEFAULT_DELETE = 'DELETE';
    private static array $routes = [];

    public static function get($uri, $callback, $middlewares = [])
    {
        self::add(self::DEFAULT_GET, $uri, $callback, $middlewares);
    }

    public static function post($uri, $callback, $middlewares = [])
    {
        self::add(self::DEFAULT_POST, $uri, $callback, $middlewares);
    }

    public static function delete($uri, $callback, $middlewares = [])
    {
        self::add(self::DEFAULT_DELETE, $uri, $callback, $middlewares);
    }

    private static function add(string $method, string $path, $handler, array  $middlewares = []): void
    {
        self::$routes[$method . $path] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler,
            'middleware' => $middlewares
        ];
    }

    public static function run(): void
    {
        $path = '/';
        if (isset($_SERVER['PATH_INFO'])) {
            $path = $_SERVER['PATH_INFO'];
        }

        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {
            $pattern = "#^" . $route['path'] . "$#";
            if (preg_match($pattern, $path, $variables) && $method == $route['method']) {

                // call middleware
                foreach ($route['middleware'] as $middleware) {
                    $instance = new $middleware;
                    $instance->before();
                }

                $controller = new $route['handler'][0];
                $function = $route['handler'][1];
                // $controller->$function();

                array_shift($variables);
                call_user_func_array([$controller, $function], $variables);


                return;
            }
        }

        http_response_code(404);
        echo 'CONTROLLER NOT FOUND';
    }
}
