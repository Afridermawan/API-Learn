<?php

namespace App\Controllers;

/**
* 
*/
class GetModel
{
	public $model;
	
	/**
	* 
	*/
	public function __get($model)
	{
		$namespace = '\\App\\Models\\' . $model;

		$this->model = new $namespace;

		return $this->model;
	}
}