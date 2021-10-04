<?php 

class Rooms extends CI_Controller{

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Rooms_model');
	}
	public function index()
	{
		
		$data['rooms']= $this -> Rooms_model->getallRooms(); 
		$data['title']='Room list';
		$this ->load-> view('templates/header',$data);
		$this ->load-> view('room/index',$data);
		$this ->load-> view('templates/footer');
		
	}
}