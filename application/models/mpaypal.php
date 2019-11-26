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
    function addError($ID_USUARIO, $ID_PRODUCTO, $orderID) {
        try {
            if (!$this->errorExists($orderID)) {
                $this->db->insert('paypal_error', array('ID_USUARIO' => $ID_USUARIO,
                                                        'ID_PRODUCTO' => $ID_PRODUCTO,
                                                        'checkout_id' => $orderID));
            }
            return ($this->db->affected_rows() > 0) ? false : true;
        }
        catch (Exception $e) {
            return false;
        }
    }

    /**
     *      Regresa el paypal_client_id
     */
    function getClientID($paypal_client_id) {
        try {
            $this->db->select("paypal_client_id");
            $this->db->from("paypal_client");
            $this->db->where("id", $paypal_client_id);
            return $this->db->get()->row('paypal_client_id');
        }
        catch (Exception $e) {
            return null;
        }
    }

    /**
     *      Busca la orden en la base de datos
     */
    function orderExists($checkout_id) {
        try {
            $this->db->select("*");
            $this->db->from("paypal_order");
            $this->db->where("checkout_id", $checkout_id);
            return ($this->db->count_all_results() > 0);
        }
        catch (Exception $e) {
            return false;
        }
    }

    /**
     *      Primero busca al cliente y orden en la base de datos para evitar duplicados,
     *      si no los encuentra los agrega.
     */
    function addSale($info) {
        try {
            $clientID = $this->getClientID($info['paypal_client']["id"]);

            // Agrega al cliente

            if ($clientID == null) {
                $this->db->insert('paypal_client', $info['paypal_client']);
                $info['paypal_order']['paypal_client_id'] = $this->db->insert_id();
            }
            else {
                $info['paypal_order']['paypal_client_id'] = $clientID;
            }

            // Agrega la orden

            if (!$this->orderExists($info['paypal_order']["checkout_id"])) {
                $this->db->insert('paypal_order', $info['paypal_order']);
            }
            return ($this->db->affected_rows() > 0) ? false : true;
        }
        catch (Exception $e) {
            return false;
        }
    }

    /**
     *      Verifica que la compra haya sido procesada de manera correcta,  
     *      de ser asi entonces borra el registro en "paypal_errors"
     */
    function deleteError($checkout_id) {
        try {
            if ($this->orderExists($checkout_id)) {
                $this->db->where('checkout_id', $checkout_id);
                $this->db->delete('paypal_error');
            }
            return ($this->db->affected_rows() > 0) ? false : true;
        }
        catch (Exception $e) {
            return false;
        }
    }
}