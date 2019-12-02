<?php

Class Mregistro extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function insert_user() {
		$data= array(
			"EMAIL_USUARIO" => $this->input->post('C_EMAIL_USUARIO'),
			"NOMBRE_USUARIO" => $this->input->post('C_NOMBRE_USUARIO'),
			"APELLIDO_USUARIO" => $this->input->post('C_APELLIDOS_USUARIO'),
			"PASSWD_USUARIO" => $this->input->post('C_PASSWORD_USUARIO'),
			"VIGENCIA_USUARIO" => 1,
			"ID_ROL" => 3
		);
		$this->db->insert("usuario",$data);

		if ($this->db->affected_rows() > 0) {
			$msj = array("msj"=> "true");
			echo json_encode($msj);
			return true;
		}
		return false;
		
	}
}