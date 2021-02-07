<?php


class Router
{
    /**
     * Associative array of routes (the routing table)
     * @var array
     */
    protected array $routes = []; // Todo: make routes type with attribute route and params

    /**
     * Add a route to the routing table
     *
     * @param string $route The route URL
     * @param array $params Parameters (controller, action, etc.)
     */
    public function add(string $route, array $params): void
    {
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
}