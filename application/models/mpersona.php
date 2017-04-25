<?php

	/**
	* 
	*/
	class Mpersona extends My_model
	{
		
	protected $_table = 'persona';
	protected $primary_key = 'id';
	protected $return_type = 'array';
	protected $after_get = array('remove_sensite_data');
	protected $before_create = array('prep_data');
	protected $before_update = array('update_timestamp');


		function __construct()
		{
			parent::__construct();
		}

		protected function remove_sensite_data($data){

			return $data;
		}

		protected function prep_data($data){

			$data['register_date'] = date('Y/m/d H:i:s');
			return $data;	
		}

		protected function update_timestamp($data){

			$data['update_timestamp'] = date('Y/m/d H:i:s');
			return $data;
		}





		public function guardar($tabla,$param){

		

			$this->db->insert($tabla,$param);

			return $this->db->insert_id();
		}
	}