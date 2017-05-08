<?php

	/**
	* 
	*/
	class Musuario extends MY_Model
	{
		
	protected $_table = 'usuario';
	protected $_validateIn = array("nomusuario");
	protected $primary_key = 'id';
	protected $return_type = 'array';
	protected $after_get = array('remove_sensite_data');
	protected $before_create = array('prep_data');
	protected $before_update = array('update_timestamp');


		function __construct()
		{
			parent::__construct();
			$this->load->helper('my_api_helper');
		}

		protected function remove_sensite_data($data){

			unset($data['clave']);
			return $data;
		}

		protected function prep_data($data){

			$data['register_date'] = date('Y/m/d H:i:s');
			$data['clave'] = md5($data['clave']);
			return $data;	
		}

		protected function update_timestamp($data){

			$data['update_timestamp'] = date('Y/m/d H:i:s');
			return $data;
		}


		function validateIn($param){

		$data = remove_unknown_fields($param,$this->_validateIn);

			return $data;
		
		}


	}