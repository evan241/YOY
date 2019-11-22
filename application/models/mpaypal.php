<?php

Class Mpaypal extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     *      Busca el error en la base de datos
     */
    function errorExists($orderID) {
        try {
            $this->db->select("paypal_error_id");
            $this->db->from("paypal_error");
            $this->db->where("checkout_id", $orderID);
            return ($this->db->count_all_results() > 0);
        }
        catch (Exception $e) {
            return false;
        }
    }

    /**
     *      Agrega errores a la tabla paypal_error, pero antes de eso busca
     *      si no existe actualmente en la base de datos, para evitar duplicado.
     */
    function addError($orderID) {
        try {
            if (!$this->errorExists($orderID)) {
                $this->db->insert('paypal_error', array('checkout_id' => $orderID));
            }
        }
        catch (Exception $e) {
            return null;
        }
    }

    /**
     *      Regresa el paypal_client_id o null
     */
    function getClientID($paypal_client) {
        try {
            $this->db->select("paypal_client_id");
            $this->db->from("paypal_client");
            $this->db->where("id", $paypal_client["id"]);
            return $this->db->get()->row('paypal_client_id');
        }
        catch (Exception $e) {
            return null;
        }
    }

    /**
     *      Busca la orden en la base de datos
     */
    function orderExists($paypal_order) {
        try {
            $this->db->select("*");
            $this->db->from("paypal_order");
            $this->db->where("sale_id", $paypal_order["sale_id"]);
            return ($this->db->count_all_results() > 0);
        }
        catch (Exception $e) {
            return false;
        }
    }

    /**
     *      Primero busca al cliente en la base de datos, sino esta lo agrega para
     *      evitar duplicados, hace lo mismo con la orden.
     */
    function addSale($info) {
        try {
            $clientID = $this->getClientID($info['paypal_client']);

            if ($clientID == null) {
                $this->db->insert('paypal_client', $info['paypal_client']);
                $info['paypal_order']['paypal_client_id'] = $this->db->insert_id();
            }
            else {
                $info['paypal_order']['paypal_client_id'] = $clientID;
            }

            if (!$this->orderExists($info['paypal_order'])) {
                $this->db->insert('paypal_order', $info['paypal_order']);
                return true;
            }
            return false;
        }
        catch (Exception $e) {
            return false;
        }
    }
}