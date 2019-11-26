<?php

class Mlogin extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    
    function login($data) {
        try {
            $this->db->select("*");
            $this->db->from("USUARIO");
            $this->db->where("EMAIL_USUARIO", $data['USERNAME_USUARIO'])->where("PASSWORD_USUARIO", $data['PASSWD_USUARIO'])->where("ACTIVADO_USUARIO",VIGENTE)->where("CONFIRMADO_USUARIO",VIGENTE);
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    } 
    
    function update_last_login($ID_USUARIO) {
        try {
            
             $data = array(
                'ULTIMO_LOGIN_USUARIO'=>date('Y-m-d H:i:s')   
            );
            
            $this->db->where('ID_USUARIO',$ID_USUARIO);
            $this->db->update('USUARIO',$data);
            return $this->db->affected_rows();
            
        } catch (Exception $ex) {

            return $e->getMessage();
        }
    }

    function insert_user()
    {
        $data= array(
            "EMAIL_USUARIO" => $this->input->post('C_EMAIL_USUARIO'),
            "NOMBRE_USUARIO" => $this->input->post('C_NOMBRE_USUARIO'),
            "APELLIDO_USUARIO" => $this->input->post('C_APELLIDOS_USUARIO'),
            "PASSWD_USUARIO" => $this->input->post('C_PASSWORD_USUARIO'),
            "VIGENCIA_USUARIO" => 1,
            "ID_ROL" => 3
        );

        $this->db->insert("usuario",$data);

        if ($this->db->affected_rows() > 0)
          {
            $msj = array("msj"=> "true");
            echo json_encode($msj);
            return true;
        }
        else
        {
            return false;
        }
        
    }

}