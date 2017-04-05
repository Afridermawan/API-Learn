<?php

namespace App\Controllers;

/**
* 
*/
class HomeController extends Controller
{
    /**
    * Sample handler
    */
    public function index($request, $response)
    {
    	$sampleModel = $this->model->SampleModel;

    	$banner = $sampleModel::find(1);

        return $this->view->render($response, 'home.twig', ['banner' => $banner]);
    }
}