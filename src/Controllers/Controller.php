<?php

namespace App\Controllers;

/**
* 
*/
abstract class Controller
{
    protected $container;
    protected $model;

    /**
    * All of the registered container & model
    */
    public function __construct($container)
    {
        $this->container = $container;
        $this->model     = new \App\Models\GetModel;
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