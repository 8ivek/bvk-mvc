<?php

namespace App\Controllers;

abstract class AbstractController
{
    /**
     * parameters from the matched route
     * @var array
     */
    protected $route_params = [];

    public function __construct($route_params)
    {
        $this->route_params = $route_params;
    }
}