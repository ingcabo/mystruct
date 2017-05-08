<?php

	/**
	* 
	*/
	class CpersonaController extends CI_Controller
	{
		protected $msg ='';
		protected $inPuntData;
		protected $idPersona;
		protected $idUsuario;


		
		function __construct()
		{
			parent::__construct();
			$this->load->helper('hCalendar');
			$prefs['template']=Hcalerdar::CalendarPref();
			$this->load->library('calendar',$prefs);
			$this->load->model('mpersona');
			$this->load->model('musuario');
			$this->load->helper('my_api_helper');
			

		}

		function index(){

			$this->load->view('persona/vis_regpersona');
		}

		public function guardar(){

			//We capture the input data from the form
			$this->inPuntData = $this->input->post();
			   
			//We remove the fields that our table does not need, according to the declaration in form validation
			$dataPersona = remove_unknown_fields($this->inPuntData,$this->form_validation->get_field_names('persona_insert'));
			
			//We remove the fields that our table does not need, according to the declaration in form validation
			$dataUsario = remove_unknown_fields($this->inPuntData,$this->form_validation->get_field_names('usuario_insert'));

			
			//set form validation validation
			$this->form_validation->set_data($dataPersona);

			// field=>values cant not repeat in Db for persona table
			$validateInPerosna = $this->mpersona->validateIn($dataPersona);

			// field=>values cant not repeat in Db for usario table
			$validateInUsuario = $this->musuario->validateIn($dataUsario);

			// query result,if the unique fields are to be repeated in the database persona table
			$validateDataPersona = $this->mpersona->get_by_or_arguments($validateInPerosna);

			// query result,if the unique fields are to be repeated in the database usuario table
			$validateDataUsuario = $this->musuario->get_by_or_arguments($validateInUsuario);
 

			if ($this->form_validation->run('persona_insert') == FALSE){
				$this->load->view('persona/vis_regpersona');
			
			}else{

				if (count($validateDataPersona) > 0 or count($validateDataUsuario) > 0){
					$this->msg .= repeatedData($validateInPerosna,$validateDataPersona);
					
					$this->msg .= repeatedData($validateInUsuario,$validateDataUsuario);
					echo $this->msg;
				}else{
					
					$this->idPersona = $this->mpersona->insert($dataPersona);

					if ($this->idPersona){
						$dataUsario['idpersona'] = $this->idPersona;
						$this->idUsurio = $this->musuario->insert($dataUsario);
					}

					if ($this->idPersona and $this->idUsurio){
					echo "Registros ingresados de manera correcta";
					}else{
					echo "Registros NO ingresados de manera correcta";
					}

				}				
			}

		
		}

		function __destruct(){

		$this->inPuntData = null;	
			
		}
	}