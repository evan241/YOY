<?php

class Mmanager extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    //products
    function get_all_valid_products() {
        try {
            $this->db->select("*");
            $this->db->from('PRODUCTO AS P');
            $this->db->join('CATEGORIA AS C',"P.ID_CATEGORIA=C.ID_CATEGORIA");
            $this->db->where('P.VIGENCIA_PRODUCTO',VIGENTE);
            $this->db->order_by('P.NOMBRE_PRODUCTO', 'ASC');
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }
    
    //sales
    function get_all_sales() {
        try {
            $this->db->select("*");
            $this->db->from('VENTA AS V');
            $this->db->join('USUARIO AS U',"U.ID_USUARIO=V.ID_USUARIO");
            $this->db->join('PRODUCTO AS P',"P.ID_PRODUCTO=V.ID_PRODUCTO");
            $this->db->join('MEDIO_PAGO AS MP',"MP.ID_MEDIO_PAGO=V.ID_MEDIO_PAGO");
            $this->db->join('TIPO_ENVIO AS TE',"TE.ID_TIPO_ENVIO=V.ID_TIPO_ENVIO");
            //$this->db->where('P.VIGENCIA_PRODUCTO',VIGENTE);
            $this->db->order_by('V.ID_VENTA', 'DESC');
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }
    
    //users
    function get_all_valid_users() {
        try {
            $this->db->select("*");
            $this->db->from('USUARIO AS U');
            $this->db->join('ROL AS R', 'U.ID_ROL=R.ID_ROL');
            $this->db->where('VIGENCIA_USUARIO', VIGENTE);
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }

    function get_all_valid_autoridades() {
        try {
            $this->db->select("*");
            $this->db->from('ROL');
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }

    function get_autoridad_by_id($id_autoridad) {
        try {
            $this->db->select("*");
            $this->db->from('ROL');
            $this->db->where('ID_ROL', $id_autoridad);
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }

    function add_new_user_on_db($row) {
        try {
            
            $this->db->insert('USUARIO', $row);
            return $this->db->insert_id();
        } catch (Exception $ex) {
            //return $e->getMessage();
            return 0;
        }
    }

    function get_user_by_id($id_usuario) {
        try {
            $this->db->select("*");
            $this->db->from('USUARIO');
            $this->db->where('ID_USUARIO', $id_usuario);
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }

    function edit_user_on_db($row,$id) {
        try {
            $this->db->where('ID_USUARIO', $id);
            $this->db->update('USUARIO',$row);
            return $this->db->affected_rows();
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }

    function disable_user_on_db($ID_USUARIO) {
        try {
            $data = array(
                'VIGENCIA_USUARIO' => NULO
            );

            $this->db->where('ID_USUARIO', $ID_USUARIO);
            $this->db->update('USUARIO', $data);
            return $this->db->affected_rows();
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }

    

    

}
