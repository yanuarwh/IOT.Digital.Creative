<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class getwaterlevel extends CI_Controller
{

	function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this-> load ->model('Water_level_model','waterlevel');
    }

	public function getwaterlevel($data) {



		$this -> waterlevel -> updateWaterlevel($data) ;





	}



}