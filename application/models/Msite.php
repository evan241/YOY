<?php

class Msite extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function update_last_login($ID_USUARIO) {
        try {

            $data = array(
                'ULTIMO_LOGIN_USUARIO' => date('Y-m-d H:i:s')
            );

            $this->db->where('ID_USUARIO', $ID_USUARIO);
            $this->db->update('USUARIO', $data);
            return $this->db->affected_rows();
        } catch (Exception $ex) {

            return $e->getMessage();
        }
    }
    
    function get_all_valid_products_to_store() {
        try {
            $this->db->select("*");
            $this->db->from('PRODUCTO AS P');
            $this->db->join('CATEGORIA AS C',"P.ID_CATEGORIA=C.ID_CATEGORIA");
            $this->db->where('P.VIGENCIA_PRODUCTO',VIGENTE);
            $this->db->where('P.ACTIVO_PRODUCTO',VIGENTE);
            $this->db->order_by('P.NOMBRE_PRODUCTO', 'ASC');
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }

}
