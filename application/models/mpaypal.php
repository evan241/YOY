<?php

Class Mpaypal extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getErrorID($orderID) {
        try {
            $this->db->select("checkout_id");
            $this->db->from("paypal_error");
            $this->db->where("checkout_id", $orderID);
            return $this->db->get()->row('checkout_id');
        }
        catch (Exception $e) {
            return null;
        }
    }

    function addError($orderID) {
        try {
            if ($this->getErrorID($orderID) == null) {
                $this->db->insert('paypal_error', array('checkout_id' => $orderID));
            }
        }
        catch (Exception $e) {
            return null;
        }
        
    }

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

    function addSale($info) {
        try {
            $clientID = $this->getClientID($info['paypal_client']);
            
            // return $clientID;

            if ($clientID == null) {
                $this->db->insert('paypal_client', $info['paypal_client']);
                $info['paypal_order']['paypal_client_id'] = $this->db->insert_id();
            }
            else {
                $info['paypal_order']['paypal_client_id'] = $clientID;
            }
            
            $this->db->insert('paypal_order', $info['paypal_order']);

            return "FALTA IMPLEMENTAR EL VALOR";
        }
        catch (Exception $e) {
            return "FALTA IMPLEMENTAR EL VALOR";
        }
    }
}