<?php

namespace Core;

class Router
{
    /**
     * Associative array of routes (the routing table)
     * @var array
     */
    protected array $routes = []; // Todo: make routes type with attribute route and params

    /**
     * @var array
     */
    private array $params;

    /**
     * Add a route to the routing table
     *
     * @param string $route The route URL
     * @param array $params Parameters (controller, action, etc.)
     */
    public function add(string $route, array $params = []): void
    {
        // Convert the route to a regular expression
        $route = preg_replace('/\//', '\\/', $route);

        // convert variables eg {controller}
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

        // convert variables with custom regular expression eg {id:\d+}
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

        // add start and end delimiters, and case insensitive flag
        $route = '/^'. $route. '$/i';

        $this->routes[$route] = $params;
    }

    /**
     * Get all the routes from the routing table
     *
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }

    /**
     *
     * @param string $url
     */
    public function dispatch(string $url): void
    {
        if ($this->match($url)) {
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            $controller = "App\Controllers\\$controller";

            if (class_exists($controller)) {
                $controller_object = new $controller();

                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);

                if (is_callable([$controller_object, $action])) {
                    $controller_object->$action();
                } else {
                    echo "Method $action (in controller $controller) not found";
                }
            } else {
                echo "Controllers class $controller not found";
            }
        }
    }

    /**
     * Convert the string with hypens to StudlyCaps or PascalCase,
     * eg: get-posts => GetPosts
     *
     * @param string $string
     * @return string
     */
    protected function convertToStudlyCaps(string $string): string
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    /**
     * Convert the string to camelCase,
     * eg get-posts => getPosts
     *
     * @param string $string
     * @return string
     */
    protected function convertToCamelCase(string $string): string
    {
        return lcfirst($this->convertToStudlyCaps($string));
    }

    /**
     * Match the route to the routes in the routing table, setting the property if a route is found.
     *
     * @param string $url the route url
     * @return bool true if match is found, false otherwise
     */
    public function match(string $url): bool
    {
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }

                $this->params = $params;
                return true;
            }
        }

        return false;
    }

    /**
     * Get the currently matched parameters
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }
}