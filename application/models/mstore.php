<?php

class Mstore extends CI_Model {

    function __construct() {
        parent::__construct();
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
    function choose_ship(){
        try {
            if(!$this->input->post('id')){
                return false;
            }else{

                $id = $this->input->post('id');
                $type = $this->input->post('type');
                $product = $this->input->post('product');

                $this->session->set_userdata('TEMP_CHOSSE_ID_ENVIO', $id);
                $this->session->set_userdata('TEMP_CHOSSE_TYPE_ENVIO', $type);

                return $product;
            }

        } catch (\Throwable $th) {
            //throw $th;
        }


        
    }
}