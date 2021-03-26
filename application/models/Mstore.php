<?php

class Mstore extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all_valid_products_to_store() {
        try {
            $this->db->select("*");
            $this->db->from('producto AS P');
            $this->db->join('categoria AS C',"P.ID_CATEGORIA=C.ID_CATEGORIA");
            $this->db->where('P.VIGENCIA_PRODUCTO',VIGENTE);
            $this->db->where('P.ACTIVO_PRODUCTO',VIGENTE);
            $this->db->order_by('P.NOMBRE_PRODUCTO', 'ASC');
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }
    function get_all_valid_products_to_store_portada() {
        try {
            $this->db->select("*");
            $this->db->from('producto AS P');
            $this->db->join('categoria AS C',"P.ID_CATEGORIA=C.ID_CATEGORIA");
            $this->db->where('P.VIGENCIA_PRODUCTO',VIGENTE);
            $this->db->where('P.ACTIVO_PRODUCTO',VIGENTE);
            $this->db->where('P.PORTADA_PRODUCTO',VIGENTE);
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
                $Product = $this->input->post('product');

                $InfoShip = array(
                    'TEMP_CHOSSE_TOTAL'      => $this->input->post('total'),
                    'TEMP_CHOSSE_ID_ENVIO'   => $this->input->post('id'),
                    'TEMP_CHOSSE_TYPE_ENVIO' => $this->input->post('type'),
                    'TEMP_CHOSSE_ID_PRODUCTO'=> $this->input->post('product'),               
                    'TEMP_CHOSSE_PRICE_ENVIO'=> $this->input->post('envio'),                   
                );
                $this->session->set_userdata($InfoShip);
                
                $AddresTemp = array(
                    'NOMBRE_USUARIO'   => $this->input->post('NOMBRE_EDIT'),
                    'APELLIDO_USUARIO' => $this->input->post('APE_EDIT'),               
                    'TELEFONO_USUARIO' => $this->input->post('TEL_EDIT'),
                    'PAIS_USUARIO'     => $this->input->post('PAIS_EDIT'),
                    'ESTADO_USUARIO'   => $this->input->post('ESTADO_EDIT'),
                    'CIUDAD_USUARIO'   => $this->input->post('CIUDAD_EDIT'),
                    'CALLE_DIRECCION'  => $this->input->post('CALLE_EDIT'),
                    'NUM_DIRECCION'    => $this->input->post('NUM_EDIT'),
                    'CP_USUARIO'       => $this->input->post('CP_EDIT'),
                    'COLONIA_DIRECCION'=> $this->input->post('COLONIA_EDIT')
                );
                
                $this->session->set_userdata($AddresTemp);

                return $Product;
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
                $nombrePayment = $this->input->post('nombre');                                                

                $this->session->set_userdata('TEMP_CHOSSE_ID_PAYMENT', $id_payment);
                $this->session->set_userdata('TEMP_CHOSSE_NOMBRE_PAYMENT', $nombrePayment);
                
                $data = array(
                    'ID_USUARIO'       => $this->session->YOY_ID_USUARIO,
                    'ID_PRODUCTO'      => $this->session->TEMP_CHOSSE_ID_PRODUCTO,
                    'NOMBRE'           => $this->session->NOMBRE_USUARIO." ".$this->session->APELLIDO_USUARIO,
                    'TELEFONO'         => $this->session->TELEFONO_USUARIO,
                    'PAIS_USUARIO'     => $this->session->PAIS_USUARIO,
                    'ESTADO_USUARIO'   => $this->session->ESTADO_USUARIO,
                    'CIUDAD_USUARIO'   => $this->session->CIUDAD_USUARIO,
                    'CALLE_DIRECCION'  => $this->session->CALLE_DIRECCION,
                    'NUM_DIRECCION'    => $this->session->NUM_DIRECCION,
                    'COLONIA_DIRECCION'=> $this->session->COLONIA_DIRECCION,
                    'CP_VENTA'         => $this->session->CP_USUARIO,
                    'CANT_VENTA'       => $this->session->TEMP_CANT,
                    'TOTAL_VENTA'      => substr($this->session->TEMP_CHOSSE_TOTAL, 1,11),
                    'STATUS_VENTA'     => 1,
                    'ID_MEDIO_PAGO'    => $this->session->TEMP_CHOSSE_ID_PAYMENT,
                    'ID_TIPO_ENVIO'    => $this->session->TEMP_CHOSSE_ID_ENVIO,
                    'ACTIVA_VENTA'     => 1,
                    'paypal_order_id'  => 0,
                    'paypal_error_id'  => 0,                    
                );
                
                if($this->session->TEMP_CHOSSE_ID_PAYMENT != 4){
                    $data['STATUS_VENTA'] = 2;
                }

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
    
    function get_user_by_id($id) {
        try {
            $this->db->select("*");
            $this->db->from('usuario');
            $this->db->where('ID_USUARIO', $id);
            $array = $this->db->get()->result_array()[0];
            return $array;
        } 
        catch (Exception $exception) {
            return array();
        }
    }
    
    function get_producto_by_id($id) {
        try {
            $this->db->select("*");
            $this->db->from('producto');
            $this->db->where('ID_PRODUCTO', $id);
            $array = $this->db->get()->result_array()[0];
            return $array;
        } 
        catch (Exception $exception) {
            return array();
        }
    }
    
    function get_envio_by_id($id) {
        try {
            $this->db->select("*");
            $this->db->from('tipo_envio');
            $this->db->where('ID_TIPO_ENVIO', $id);
            $array = $this->db->get()->result_array()[0];
            return $array;
        } 
        catch (Exception $exception) {
            return array();
        }
    }
}