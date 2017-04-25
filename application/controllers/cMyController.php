<?php

/**
* 
*/
class CmyController extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		$this->load->view('vis_MyController');
	}
}