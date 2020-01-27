<?php

class Mperfil extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_usuario_by_id($ID_USUARIO) {
        try {
            $this->db->select("*");
            $this->db->from('USUARIO');
            $this->db->where('ID_USUARIO', $ID_USUARIO);
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }

    function edit_perfil_on_db($row) {
        try {
            $data = array(
                //'ID_USUARIO' => trim($row['ID_USUARIO']),
                'NOMBRE_USUARIO' => trim($row['NOMBRE_USUARIO']),
                'APELLIDOS_USUARIO' => trim($row['APELLIDOS_USUARIO']),
                'CIUDAD_USUARIO' => trim($row['CIUDAD_USUARIO']),
                'ESTADO_USUARIO' => trim($row['ESTADO_USUARIO']),
                'TELEFONO_USUARIO' => trim($row['TELEFONO_USUARIO']),
                'PASSWORD_USUARIO' => trim($row['PASSWORD_USUARIO']),
            );

            $this->db->where('ID_USUARIO', $row['ID_USUARIO']);
            $this->db->update('USUARIO', $data);
            return $this->db->affected_rows();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    function update_photo_profile_by_id($ROW) {
        try {
            // $data
            $data = array(
                'IMG_PERFIL_USUARIO' => $ROW['IMG_PERFIL_USUARIO']
            );

            $this->db->where('ID_USUARIO', $ROW['ID_USUARIO']);
            $this->db->update('USUARIO', $data);
            return $this->db->affected_rows();
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }

    function update_img_profile_by_params($row) {
        try {
            $data = array(
                'IMG_PERFIL_USUARIO' => $row['IMG_PERFIL_USUARIO']
            );
            $this->db->where('ID_USUARIO', $row['ID_USUARIO']);
            $this->db->update('USUARIO', $data);
            return $this->db->affected_rows();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
