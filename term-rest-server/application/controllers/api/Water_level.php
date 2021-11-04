<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Water_level extends RESTController
{
	function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this-> load ->model('Water_level_model','waterlevel');
    }

    




    public function index_get()
    {


    	$id = $this -> get('id');
    	if ($id === null){
    		$waterlevel = $this -> waterlevel -> getWaterlevel();

    	}else {
    		$waterlevel = $this ->  waterlevel -> getWaterlevel( $id );
    	}
    	 

    	if($waterlevel){
    		 $this->response( [
                    'status' => true,
                    'data' => $waterlevel
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

    		if ($this -> waterlevel -> deleteWaterlevel($id) > 0 ){
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
    		'Water_level'=> $this -> post('Water_level'),
    		
    	];


    	if ($this -> waterlevel -> createWaterlevel($data) > 0 )
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
    		
    		'Water_level'=> $this -> put('Water_level'),
    		
    	];

        


    	if ($this -> waterlevel -> updateWaterlevel($data, $id) > 0 )
    	{
    		$this-> response( [
                    'status' => true,
                    'message' =>'water level has been updated'
                ], 204);
    	}else {

    			//id not found
    			$this->response( [
                    'status' => false,
                    'message' =>'failed to update data!',
                    'id' =>$id
                ], 400);
    	}


    }

}