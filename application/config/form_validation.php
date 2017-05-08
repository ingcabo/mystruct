<?php if (!defined('BASEPATH')) exit('No direct script access allowed');




	$config = array( 				

		'persona_insert' => 
		array(
			array('field' => 'nombre','lebel' => 'nombre de persona', 'rules' => 'trim|required|max_length[50]'),
			array('field' => 'appaterno','lebel' => 'Apellido paterno', 'rules' => 'trim|required|max_length[50]'),
			array('field' => 'apmaterno','lebel' => 'Apellido Materno', 'rules' => 'trim|required|max_length[50]'),
			array('field' => 'email','lebel' => 'Email', 'rules' => 'trim|valid_email'),
			array('field' => 'dni','lebel' => 'DNI', 'rules' => 'trim|required|max_length[50]'),
			array('field' => 'register_date','lebel' => 'fecha', 'rules' => 'trim|required|max_length[50]')
		),

		'usuario_insert' => 
		array(
			array ('field' => 'nomusuario','lebel' => 'nombre de usuario','rules' => 'trim|required|max_length[50]'),
			array ('field' => 'clave','lebel' => 'nombre de usuario','rules' => 'trim|required|max_length[50]'),
			)
												  
	);
						
					
					
								

				

?>