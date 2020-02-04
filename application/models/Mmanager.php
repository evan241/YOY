<?php

class Mmanager extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function monthSaleCount($monthNumber) {
        try {
            $date = getDateRange($monthNumber);

            $this->db->select("*");
            $this->db->from("venta");
            $this->db->where("DATE(FECHA_VENTA) >=", $date['start']);
            $this->db->where("DATE(FECHA_VENTA) <", $date['end']);

            return $this->db->get()->num_rows();
        }
        catch (Exception $exception) {
            return 0;
        }
    }

    function getYearSales() {
        $result = getMonthArray();
        $month = getMonths();

        for ($i = 0; $i < 12; $i++) {
            $result[$month[$i]] = $this->monthSaleCount($i + 1); 
        }
        return $result;
    }
    
    function get_all_valid_ships(){
        try {
            $this->db->select("*");
            $this->db->from('TIPO_ENVIO');
            $this->db->where('VIGENTE_TIPO_ENVIO',VIGENTE);
            $this->db->order_by('ID_TIPO_ENVIO', 'ASC');
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }

    function get_all_valid_autoridades() {
        try {
            $this->db->select("*");
            $this->db->from('rol');
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }

    function get_autoridad_by_id($id_autoridad) {
        try {
            $this->db->select("*");
            $this->db->from('rol');
            $this->db->where('ID_ROL', $id_autoridad);
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }
    
    function get_product_by_id($id_producto) {
        try {
            $this->db->select("*");
            $this->db->from('producto');
            $this->db->where('ID_PRODUCTO', $id_producto);
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }

}
