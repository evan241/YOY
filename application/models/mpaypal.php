<?php

class Mpaypal extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        define('TABLE_PAYPAL_CLIENT', 'paypal_client');
        define("TABLE_PAYPAL_ORDER", "paypal_order");
        define("TABLE_PAYPAL_ERROR", "paypal_error");
    }

    /**
     *      Agrega errores a la tabla paypal_error, para evitar perder la informacion
     *      en caso de fallo durante el proceso.
     */
    function addError($ID_USUARIO, $ID_PRODUCTO, $orderID)
    {
        try {
            $errorId = $this->getError($orderID);

            if ($errorId == NULL) {
                $this->db->insert(TABLE_PAYPAL_ERROR, array(
                    'ID_USUARIO' => $ID_USUARIO,
                    'ID_PRODUCTO' => $ID_PRODUCTO,
                    'checkout_id' => $orderID
                ));
                return $this->db->insert_id();
            }
            return $errorId;
        } catch (Exception $e) {
            return NULL;
        }
    }

    /**
     *      Busca el error en la base de datos
     */
    function getError($orderID)
    {
        try {
            $this->db->select("*");
            $this->db->from(TABLE_PAYPAL_ERROR);
            $this->db->where("checkout_id", $orderID);

            $result = $this->db->get()->row('paypal_error_id');
            return ($result > 0) ? $result : NULL;
        } catch (Exception $e) {
            return NULL;
        }
    }

    /**
     *      Verifica que la compra haya sido procesada de manera correcta,  
     *      de ser asi entonces borra el registro en "paypal_errors"
     */
    function deleteError($checkout_id)
    {
        try {
            $errorId = $this->getError($checkout_id);
            if ($errorId != NULL) {
                $this->db->where('paypal_error_id', $errorId);
                $this->db->delete(TABLE_PAYPAL_ERROR);
            }
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     *      Regresa el paypal_client_id
     */
    function getClientId($paypal_client_id)
    {
        try {
            $this->db->select("paypal_client_id");
            $this->db->from(TABLE_PAYPAL_CLIENT);
            $this->db->where("id", $paypal_client_id);

            $result = $this->db->get()->row('paypal_client_id');
            return ($result > 0) ? $result : NULL;
        } catch (Exception $e) {
            return NULL;
        }
    }

    /*
     *      Registra al cliente de paypal que esta haciendo la compra
     */
    function addClient($paypal_client)
    {
        try {
            $clientId = $this->getClientId($paypal_client["id"]);

            if ($clientId == NULL) {
                $this->db->insert(TABLE_PAYPAL_CLIENT, $paypal_client);
                return $this->db->insert_id();
            }
            return $clientId;
        } catch (Exception $e) {
            return NULL;
        }
    }

    /**
     *      Busca la orden en la base de datos
     */
    function getOrder($checkout_id)
    {
        try {
            $this->db->select("paypal_order_id");
            $this->db->from(TABLE_PAYPAL_ORDER);
            $this->db->where("checkout_id", $checkout_id);

            $result = $this->db->get()->row('paypal_order_id');
            return ($result > 0) ? $result : NULL;
        } catch (Exception $e) {
            return NULL;
        }
    }

    /**
     *      Agrega toda la informacion a paypal_orders
     */
    function addOrder($paypal_order)
    {
        try {
            $orderId = $this->getOrder($paypal_order["checkout_id"]);

            if ($orderId == NULL) {
                $this->db->insert(TABLE_PAYPAL_ORDER, $paypal_order);
                return $this->db->insert_id();
            }
            return $orderId;
        } catch (Exception $e) {
            return NULL;
        }
    }
}
