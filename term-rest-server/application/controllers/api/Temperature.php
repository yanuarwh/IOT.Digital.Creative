<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Temperature extends RESTController
{
	function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this-> load ->model('Temperature_model','temperature');
    }

    public function index_get()
    {
    	$id = $this -> get('id');
    	if ($id === null){
    		$temperature = $this -> temperature -> getTemperature();

    	}else {
    		$temperature = $this -> temperature -> getTemperature( $id );
    	}
    	
    	if($temperature){
    		 $this->response( [
                    'status' => true,
                    'data' => $temperature
                ], 200);
    	}else {
    		$this->response( [
                    'status' => false,
                    'message' =>'id not found'
                ], 404);
    	}
    }

    public function index_delete()
    {
    	$id = $this -> delete('id');

    	if ($id === null){
    		$this->response( [
                    'status' => false,
                    'message' =>'provide an id!'
                ], 400);
    	}else {

    		if ($this -> temperature -> deleteTemperature($id) > 0 ){
    			//ok
    			$this-> response( [
                    'status' => true,
                    'id' => $id ,
                    'message' =>'deleted'
                ], 204);
    		}else {

    			//id not found
    			$this->response( [
                    'status' => false,
                    'message' =>'id not found!'
                ], 400);
    		}

    	}
    }

    public function index_post()
    {
    	$data =[
    		'id'=> $this -> post('id'),
    		'temperature'=> $this -> post('temperature'),
    		'humidity'=> $this -> post('humidity')
    	];


    	if ($this -> temperature -> createTemperature($data) > 0 )
    	{
    		$this-> response( [
                    'status' => true,
                    'message' =>'New room has been created'
                ], 201);
    	}else {

    			//id not found
    			$this->response( [
                    'status' => false,
                    'message' =>'failed to create new room!'
                ], 400);
    	}


    }

    public function index_put()
    {
    	$id = $this-> put('id');
    	$data =[
    		
    		'temperature'=> $this -> put('temperature'),
    		'humidity'=> $this -> put('humidity'),
            'Last-Updated'=> $this -> put('Last-Updated')
    	];


    	if ($this -> temperature -> updateTemperature($data, $id) > 0 )
    	{
    		$this-> response( [
                    'status' => true,
                    'message' =>'temperature and humidity has been updated'
                ], 204);
    	}else {

    			//id not found
    			$this->response( [
                    'status' => false,
                    'message' =>'failed to update data!'
                ], 400);
    	}


    }

}
