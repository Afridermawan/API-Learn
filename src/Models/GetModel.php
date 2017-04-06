<?php

namespace App\Models;

/**
* 
*/
class GetModel
{
	public $model;
	
	/**
	* Dynamically access model
	*/
	public function __get($model)
	{
		$namespace = '\\App\\Models\\' . $model;

		$this->model = new $namespace;

		return $this->model;
	}
}