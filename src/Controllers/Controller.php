<?php

namespace App\Controllers;

/**
* 
*/
abstract class Controller
{
    private $container;
    protected $model;

    /**
    * All of the registered container & model
    */
    public function __construct($container)
    {
        $this->container = $container;
        $this->model     = new GetModel;
    }

    /**
    * Dynamically access container
    */
    public function __get($property)
    {
        if ($this->container->{$property}) {
            return $this->container->{$property};
        }
    }
}