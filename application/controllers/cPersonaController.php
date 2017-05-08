<?php

	/**
	* 
	*/
	class CpersonaController extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper('hCalendar');
			$prefs['template']=Hcalerdar::CalendarPref();
			$this->load->library('calendar',$prefs);
			$this->load->model('mpersona');
			$this->load->helper('my_api_helper');

		}

		function index(){

			$this->load->view('persona/vis_regpersona');
		}

		public function guardar(){


			
			$Udata['nomusuario'] = $this->input->post('txtUser');
			$Udata['clave'] = $this->input->post('txtClave');


			   
			$data = remove_unknown_fields($this->input->post(),$this->form_validation->get_field_names('persona_insert'));
			$this->form_validation->set_data($data);
			// field cant not repeat
			$validateIn = $this->mpersona->validateIn($data);


			if ($this->form_validation->run('persona_insert') == FALSE){
				$this->load->view('persona/vis_regpersona');
			
			}else{

				
				$validateData = $this->mpersona->get_by_or_arguments($validateIn);

				$repet = repeatedData($validateIn,$validateData);

				echo $repet;

				//$idPersona = $this->mpersona->insert($data);
			
			}

			//array_pop
			//	var_dump($data);
			
		
		}
	}