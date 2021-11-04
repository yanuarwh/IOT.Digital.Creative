<?php 

class Waterlevel extends CI_Controller{

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Waterlevel_model');
	}
	public function index()
	{
		 
		$data['waterlevel']= $this -> Waterlevel_model->getallWaterlevel(); 
		$data['title']='Water-level';
		$this ->load-> view('templates/header',$data);
		$this ->load-> view('water_level/index',$data);
		$this ->load-> view('templates/footer');
		
	}
}