<?php

namespace Core;

abstract class Controller
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

    /**
     * @param $name
     * @param $args
     * @throws \Exception
     */
    public function __call($name, $args)
    {
        $method = $name . 'Action';
        if (method_exists($this, $method)) {
            if ($this->before() !== false) {
                call_user_func_array([$this, $method], $args);
                $this->after();
            }
        } else {
            throw new \Exception("Method $method not found in controller ". get_class($this));
        }
    }

    protected function before()
    {

    }

    protected function after()
    {

    }
}