<?php

class Mprincipal extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    function get_user_by_id($ID_USUARIO){
        try{
            $this->db->select("*");
            $this->db->from('USUARIO');
            $this->db->where('ID_USUARIO',$ID_USUARIO);
            $query = $this->db->get();
            return $query->result_array();
            
        } catch (Exception $ex) {
           return $e->getMessage();
        }
    }
    
    function get_user_by_email($EMAIL_USUARIO){
        try{
            $this->db->select("*");
            $this->db->from('USUARIO');
            $this->db->where('EMAIL_USUARIO',$EMAIL_USUARIO);
            $query = $this->db->get();
            return $query->result_array();
            
        } catch (Exception $ex) {
           return $e->getMessage();
        }
    }
    
    function add_new_user_for_confirmation_on_db($row){
        try{
            
            $data = array(
                'NOMBRE_USUARIO' => trim($row['NOMBRE_USUARIO']),
                'APELLIDO_USUARIO' => trim($row['APELLIDO_USUARIO']),
                'EMAIL_USUARIO' => trim($row['EMAIL_USUARIO']),
                'TELEFONO_USUARIO' => trim($row['TELEFONO_USUARIO']),
                'PASSWD_USUARIO' => trim($row['PASSWD_USUARIO']),
                'ESTADO_USUARIO' => trim($row['ESTADO_USUARIO']),
                'CIUDAD_USUARIO' => trim($row['CIUDAD_USUARIO']),
                'CONFIRMADO_USUARIO' => NULO,
                'ACTIVADO_USUARIO' => VIGENTE
            );
            
            $this->db->insert('USUARIO', $data);
            return $this->db->insert_id();
            
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }
    
    function add_new_sugerencia_on_db($row){
        try{
            
            $data = array(
                'ASUNTO_SUGERENCIA' => trim($row['ASUNTO_SUGERENCIA']),
                'MENSAJE_SUGERENCIA' => trim($row['MENSAJE_SUGERENCIA']),
                );
            
            $this->db->insert('SUGERENCIAS', $data);
            return $this->db->insert_id();
            
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }

    
    function get_sugerencia_by_id($id_sugerencia){
        try{
            $this->db->select("*");
            $this->db->from('SUGERENCIAS AS S');
            //$this->db->join('USUARIO AS U','U.ID_USUARIO=S.ID_USUARIO');
            $this->db->where('ID_SUGERENCIA',$id_sugerencia);
            $query = $this->db->get();
            return $query->result_array();
            
        } catch (Exception $ex) {
           return $e->getMessage();
        }
    }
    
    function add_new_haz_paro_on_db($row){
        try{
            
            $data = array(
                'NOMBRE_HAZ_PARO' => trim($row['NOMBRE_HAZ_PARO']),
                'APELLIDO_HAZ_PARO' => trim($row['APELLIDO_HAZ_PARO']),
                'EMAIL_HAZ_PARO' => trim($row['EMAIL_HAZ_PARO']),
                'TELEFONO_HAZ_PARO' => trim($row['TELEFONO_HAZ_PARO']),                
                'MENSAJE_HAZ_PARO' => trim($row['MENSAJE_HAZ_PARO']),
                );
            
            $this->db->insert('HAZ_PARO', $data);
            return $this->db->insert_id();
            
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }
    
    function get_haz_paro_by_id($id_haz_paro){
        try{
            $this->db->select("*");
            $this->db->from('HAZ_PARO');
            $this->db->where('ID_HAZ_PARO',$id_haz_paro);
            $query = $this->db->get();
            return $query->result_array();
            
        } catch (Exception $ex) {
           return $e->getMessage();
        }
    }
    
    function confirm($ID_USUARIO){
        $data = array(
            'CONFIRMADO_USUARIO' => 1,
        );
        try {
            $this->db->where('ID_USUARIO', $ID_USUARIO);
            $this->db->update('USUARIO', $data);
            return $this->db->affected_rows();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    function get_images_events_actives(){
        try{
            $this->db->select("*");
            $this->db->from('IMAGEN_EVENTO');
            $this->db->where('VIGENCIA_IMAGEN_EVENTO',VIGENTE);
            $this->db->where('ACTIVO_IMAGEN_EVENTO',VIGENTE);
            $query = $this->db->get();
            return $query->result_array();
            
        } catch (Exception $ex) {
           return $e->getMessage();
        }
    }
    
    function get_event_by_id_on_db($ID_EVENTO){
        try{
            $this->db->select("*");
            $this->db->from('IMAGEN_EVENTO');
            $this->db->where('ID_IMAGEN_EVENTO',$ID_EVENTO);
            $query = $this->db->get();
            return $query->result_array();
            
        } catch (Exception $ex) {
           return $e->getMessage();
        }
    }
    
    function add_new_buy_on_db($data){
        try{
            $this->db->insert('COMPRA', $data);
            return $this->db->insert_id();
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }
    
    function get_config_by_id($ID_CONFIG){
        try{
            $this->db->select("*");
            $this->db->from('CONFIG');
            $this->db->where('ID_CONFIG',$ID_CONFIG);
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $ex) {
           return $e->getMessage();
        }
    }
    
    function get_buys_by_user_id_on_db($USER_ID){
        try{
            $this->db->select("*");
            $this->db->from('COMPRA AS C');
            $this->db->join('IMAGEN_EVENTO AS E','E.ID_IMAGEN_EVENTO=C.ID_IMAGEN_EVENTO');
            $this->db->where('C.ID_USUARIO',$USER_ID);
            $this->db->order_by('C.FECHA_COMPRA','DESC');
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $ex) {
           return $e->getMessage();
        }
    }
    
    function cancel_buy_on_db($ID_COMPRA){
        try{
            $data = array(
                'CANCELADA_COMPRA' => VIGENTE
            );
            
            $this->db->where('ID_COMPRA',$ID_COMPRA);
            $this->db->update('COMPRA',$data);
            return $this->db->affected_rows();
            
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }
    
    function confirm_buy_on_db($ROW){
        try{
            $data = array(
                'CONFIRMADA_COMPRA' => VIGENTE,
                'FECHA_DEPOSITO_COMPRA' => $ROW['FECHA_DEPOSITO_COMPRA'],
                'HORA_DEPOSITO_COMPRA' => $ROW['HORA_DEPOSITO_COMPRA'],
                'NO_AUTORIZACION_BANCO_COMPRA' => $ROW['NO_AUTORIZACION_BANCO_COMPRA'],
                'MONTO_DEPOSITO_COMPRA' => $ROW['MONTO_DEPOSITO_COMPRA']
            );
            
            $this->db->where('ID_COMPRA',$ROW['ID_COMPRA']);
            $this->db->update('COMPRA',$data);
            return $this->db->affected_rows();
            
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }
}