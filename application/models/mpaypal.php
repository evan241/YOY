<?php

Class Mpaypal extends CI_Model {

    // const TABLE_PAYPAL_CLIENT = "paypal_client";
    // const TABLE_PAYPAL_ORDER = "paypal_order";
    // const TABLE_PAYPAL_ERROR = "paypal_error";

    

    function __construct() {
        parent::__construct();
        define('TABLE_PAYPAL_CLIENT', 'paypal_client');
        define("TABLE_PAYPAL_ORDER", "paypal_order");
        define("TABLE_PAYPAL_ERROR", "paypal_error");
    }

    /**
     *      Agrega errores a la tabla paypal_error, para evitar perder la informacion
     *      en caso de fallo durante el proceso.
     */
    function addError($ID_USUARIO, $ID_PRODUCTO, $orderID) {
        try {
            echo "ok";
            $errorId = $this->errorExists($orderID);
            echo "wtf";
            echo $errorId;
            if ($errorId < 0) {
                $this->db->insert(TABLE_PAYPAL_ERROR, array(
                   'ID_USUARIO' => $ID_USUARIO,
                   'ID_PRODUCTO' => $ID_PRODUCTO,
                   'checkout_id' => $orderID));

                return $this->db->insert_id();
            }
            return $errorId;
        }
        catch (Exception $e) {
            echo "Este error paypal ya esta registrado";
            return 9;
        }
    }

    /*
     *      Registra al cliente de paypal que esta haciendo la compra
     */
    function addClient($paypal_client) {
        try {
            $clientId = $this->getClientId($paypal_client["id"]);

            if ($clientId == NULL) {
                $clientId = $this->db->insert(TABLE_PAYPAL_CLIENT, $paypal_client);
                return $this->db->insert_id();
            }
            return $clientId;
        }
        catch (Exception $e) {
            echo "Este cliente paypal ya esta registrado.";
            return NULL;
        }
    }

    /**
     *      Agrega toda la informacion a paypal_orders
     */
    function addOrder($paypal_order) {
        try {
            $orderId = $this->orderExists($paypal_order["checkout_id"]);

            if ($orderId == NULL) {
               $this->db->insert(TABLE_PAYPAL_ORDER, $paypal_order); 
               return $this->db->insert_id();
            }
            return $orderId;
        }
        catch (Exception $e) {
            echo "Esta orden paypal ya esta registrada.";
            return -1;
        }
    }

    /**
     *      Busca el error en la base de datos
     */
    function errorExists($orderID) {
        try {
            $this->db->select("*");
            $this->db->from("paypal_error");
            $this->db->where("checkout_id", $orderID);

            if ($this->db->get()->num_rows() > 0) {
                return $this->db->get()->row('paypal_error_id');
            }
            return 0;
        }
        catch (Exception $e) {
            return 0;
        }
    }

    /**
     *      Busca la orden en la base de datos
     */
    function orderExists($checkout_id) {
        try {
            $this->db->select("paypal_order_id");
            $this->db->from(TABLE_PAYPAL_ORDER);
            $this->db->where("checkout_id", $checkout_id);

            if ($this->db->count_all_results() > 0) {
                return $this->db->get()->row('paypal_order_id');
            }
            return NULL;
        }
        catch (Exception $e) {
            return NULL;
        }
    }

    /**
     *      Regresa el paypal_client_id
     */
    function getClientId($paypal_client_id) {
        try {
            $this->db->select("paypal_client_id");
            $this->db->from(TABLE_PAYPAL_CLIENT);
            $this->db->where("id", $paypal_client_id);

            if ($this->db->count_all_results() > 0) {
                return $this->db->get()->row('paypal_client_id');
            }
            return NULL;
        }
        catch (Exception $e) {
            return NULL;
        }
    }

    /**
     *      Verifica que la compra haya sido procesada de manera correcta,  
     *      de ser asi entonces borra el registro en "paypal_errors"
     */
    function deleteError($checkout_id) {
        try {
            $errorId = $this->errorExists($checkout_id);
            if ($errorId != NULL) {
                $this->db->where('paypal_error_id', $errorId);
                $this->db->delete('paypal_error'); 
            }
        }
        catch (Exception $e) {
            return false;
        }
    }
}