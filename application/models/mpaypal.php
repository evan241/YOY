<?php

Class Mpaypal extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getClientID($info) {
        try {
            $this->db->select("paypal_client_id");
            $this->db->from("paypal_client");
            $this->db->where("id", $info['paypal_client']['id']);

            return $this->db->get()->row('paypal_client_id');
        }
        catch (Exception $e) {
            return -1;
        }
    }

    function addClient($info) {
        try {
            $clientID = $this->getClientID($info);

            if ($clientID == NULL) {
                $this->db->insert('paypal_client', $info['paypal_client']);
                $info['paypal_order']['paypal_client_id'] = $this->db->insert_id();
            }
            else {
                $info['paypal_order']['paypal_client_id'] = $clientID;
            }
            return $info;
        }
        catch (Exception $e) {
            return -1;
        }
    }

    function addOrder($info) {
        try {
            $this->db->insert('paypal_order', $info['paypal_order']);
            $info['paypal_info']['paypal_order_id'] = $this->db->insert_id();
            return $info;
        }
        catch (Exception $e) {
            return -1;
        }
    }

    function addInfo($info) {
        try {
            $this->db->insert('paypal_info', $info['paypal_info']);
            return $info;
        }
        catch (Exception $e) {
            return -1;
        }
    }
}