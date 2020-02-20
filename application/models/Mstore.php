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
                $envio = $this->input->post('envio');
                $total = $this->input->post('total');

                $this->session->set_userdata('TEMP_CHOSSE_ID_ENVIO', $id);
                $this->session->set_userdata('TEMP_CHOSSE_ID_PRODUCTO', $product);
                $this->session->set_userdata('TEMP_CHOSSE_TYPE_ENVIO', $type);
                $this->session->set_userdata('TEMP_CHOSSE_PRICE_ENVIO', $envio);
                $this->session->set_userdata('TEMP_CHOSSE_TOTAL', $total);

                return $product;
            }

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    function choose_payment(){
        try {
            if(!$this->input->post('id')){
                return false;
            }else{

                $id_payment = $this->input->post('id');
                $nombre = $this->input->post('nombre');                                                

                $this->session->set_userdata('TEMP_CHOSSE_ID_PAYMENT', $id_payment);
                $this->session->set_userdata('TEMP_CHOSSE_NOMBRE_PAYMENT', $nombre);

                $data = array(
                    'ID_USUARIO' => $this->session->userdata('YOY_ID_USUARIO'),
                    'ID_PRODUCTO' => $this->session->userdata('TEMP_CHOSSE_ID_PRODUCTO'),
                    'TOTAL_VENTA' => substr($this->session->userdata('TEMP_CHOSSE_TOTAL'), 1,11),
                    'STATUS_VENTA' => 1,
                    'ID_MEDIO_PAGO' => $this->session->userdata('TEMP_CHOSSE_ID_PAYMENT'),
                    'ID_TIPO_ENVIO' => $this->session->userdata('TEMP_CHOSSE_ID_ENVIO'),
                    'ACTIVA_VENTA' => 1,
                    'paypal_order_id' => 0,
                    'paypal_error_id' => 0,                    
                );

                $this->db->insert('venta', $data);
                $id = $this->db->insert_id();
                $this->db->where('ID_VENTA', $id);

                $key = rand(1,99);
                $id_uniq = substr(uniqid($key), 0,10);
                $this->db->update('venta', array('ID_SALE'=> $id_uniq));

                return $id_uniq;
                
            }

        } catch (\Throwable $th) {
            //throw $th;
        }


        
    }

    function get_sale($id){
        try {
            $row =  $this->db->get_where('venta', array('ID_SALE' => $id))->row();

            return $row;
            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}