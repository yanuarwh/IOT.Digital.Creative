<?php 

class Home extends CI_Controller {
	public function index()
	{
		$data['title'] = 'Title page';
		$this->load->view('templates/header',$data);
		$this->load->view('home/index');
		$this->load->view('templates/footer');
	}
}