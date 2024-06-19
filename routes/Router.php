<?php

namespace Route;

class Router
{
    protected $routes = array();

    private function addRoute($method, $controller, $action, $route)
    {
        $this->routes[$method][$route] = ['controller' => $controller, 'action' => $action];
    }

    public function get($route, $controller, $action)
    {
        $this->addRoute('GET', $controller, $action, $route);
    }

    public function post($route, $controller, $action)
    {
        $this->addRoute('POST', $controller, $action, $route);
    }

    public function dispatch()
    {
        $uri    = strtok($_SERVER['REQUEST_URI'], '?');
        $method = $_SERVER['REQUEST_METHOD'];

        if (array_key_exists($uri, $this->routes[$method])) {
            $controller = $this->routes[$method][$uri]['controller'];
            $action     = $this->routes[$method][$uri]['action'];

            $data       = $method == "GET" ? $_GET : $_POST;
            $controller = new $controller();
            if ($data) {
                $controller->$action($data);
            } else {
                $controller->$action();
            }
        } else {
            require_once __DIR__ . "/../resources/views/404.php";
        }
    }
}
