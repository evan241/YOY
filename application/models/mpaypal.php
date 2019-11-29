<?php

Class Mpaypal extends CI_Model {

    const TABLE_PAYPAL_CLIENT = "paypal_client";
    const TABLE_PAYPAL_ORDER = "paypal_order";
    const TABLE_PAYPAL_ERROR = "paypal_error";

    function __construct() {
        parent::__construct();
    }

    /**
     *      Agrega errores a la tabla paypal_error, para evitar perder la informacion
     *      en caso de fallo durante el proceso.
     */
    function addError($ID_USUARIO, $ID_PRODUCTO, $orderID) {
        try {
            $this->db->insert(TABLE_PAYPAL_ERROR, array(
             'ID_USUARIO' => $ID_USUARIO,
             'ID_PRODUCTO' => $ID_PRODUCTO,
             'checkout_id' => $orderID));

            return $this->db->insert_id();
        }
        catch (Exception $e) {
            echo "Este error ya esta registrado";
            return -1;
        }
    }

    function addClient($ID_USUARIO, $ID_PRODUCTO, $orderID) {
        try {
            $this->db->insert(TABLE_PAYPAL_CLIENT, array(
             'ID_USUARIO' => $ID_USUARIO,
             'ID_PRODUCTO' => $ID_PRODUCTO,
             'checkout_id' => $orderID));

            return $this->db->insert_id();
        }
        catch (Exception $e) {
            echo "Este cliente paypal ya esta registrado";
            return -1;
        }
    }

    /**
     *      Agrega toda la informacion a paypal_orders
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
     *      Regresa el paypal_client_id
     */
    function getClientId($paypal_client_id) {
        try {
            $this->db->select("paypal_client_id");
            $this->db->from("paypal_client");
            $this->db->where("id", $paypal_client_id);
            return $this->db->get()->row('paypal_client_id');
        }
        catch (Exception $e) {
            return 0;
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