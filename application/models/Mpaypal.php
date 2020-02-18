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

    function orderInformation($id) {
        try {
            $this->db->select("*");
            $this->db->from("paypal_order");
            $this->db->where("paypal_order_id", $id);

            return $this->db->get()->result_array()[0];
        }
        catch(Exception $exception) {
            return NULL;
        }
    }

    function clientInformation($id) {
        try {
            $this->db->select("*");
            $this->db->from("paypal_client");
            $this->db->where("paypal_client_id", $id);

            return $this->db->get()->result_array()[0];
        }
        catch(Exception $exception) {
            return NULL;
        }
    }

    /**
     *      Agrega errores a la tabla paypal_error, para evitar perder la informacion
     *      en caso de fallo durante el proceso.
     */
    function addError($ID_USUARIO, $ID_PRODUCTO, $ID_TIPO_ENVIO, $orderID)
    {
        try {
            $errorId = $this->getError($orderID);

            if ($errorId == NULL) {
                $this->db->insert(TABLE_PAYPAL_ERROR, array(
                    'ID_USUARIO' => $ID_USUARIO,
                    'ID_PRODUCTO' => $ID_PRODUCTO,
                    'ID_TIPO_ENVIO' => $ID_TIPO_ENVIO,
                    'order_id' => $orderID
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
            $this->db->where("order_id", $orderID);

            $result = $this->db->get()->row('paypal_error_id');
            return ($result > 0) ? $result : NULL;
        } catch (Exception $e) {
            return NULL;
        }
    }

    function getErrorInfo($errorID) {
        try {
            $this->db->select("*");
            $this->db->from(TABLE_PAYPAL_ERROR);
            $this->db->where("paypal_error_id", $errorID);
            
            $result = $this->db->get()->result_array();

            if ($result) return $result[0];
        }
        catch (Exception $exception) {
            $exception->getMessage();
        }
        return NULL;
    }

    /**
     *      Verifica que la compra haya sido procesada de manera correcta,  
     *      de ser asi entonces borra el registro en "paypal_errors"
     */
    function deleteError($order_id)
    {
        try {
            $errorId = $this->getError($order_id);
            if ($errorId != NULL) {
                $this->db->where('paypal_error_id', $errorId);
                $this->db->delete(TABLE_PAYPAL_ERROR);
            }
        } catch (Exception $e) {
            return false;
        }
    }

    function paypalSaleExists($order_id) {
        try {
            $this->db->select("*");
            $this->db->from('venta');
            $this->db->where("paypal_order_id", $order_id);
            return ($this->db->count_all_results() > 0);
        }
        catch (Exception $exception) {
            return FALSE;
        }
    }

    function getSaleError($errorID) {
        try {
            $this->db->select("*");
            $this->db->from('venta');
            $this->db->where("paypal_error_id", $errorID);

            $result = $this->db->get()->row('ID_VENTA');
            return ($result > 0) ? $result : NULL;
        }
        catch (Exception $exception) {
            return NULL;
        }
    }

    function addSaleError($ID_USUARIO, $ID_PRODUCTO, $ID_TIPO_ENVIO, $errorID) {
        try {
            $sale_id = $this->getSaleError($errorID);

            if ($sale_id != NULL) return $sale_id;
            
            else {
                $data = array(
                    'ID_USUARIO' => $ID_USUARIO,
                    'ID_PRODUCTO' => $ID_PRODUCTO,
                    'STATUS_VENTA' => ERROR_PAYPAL,
                    'ID_MEDIO_PAGO' => PAGO_PAYPAL,
                    'ID_TIPO_ENVIO' => $ID_TIPO_ENVIO,
                    'paypal_error_id' => $errorID
                );
                $this->db->insert('venta', $data);
                return $this->db->insert_id();
            }
        }
        catch (Exception $exception) {
            return NULL;
        }
    }

    function deleteSaleError($ventaID) {
        try {
            $this->db->where('ID_VENTA', $ventaID);
            $this->db->delete('venta');
            return ($this->db->affected_rows() > 0);
        }
        catch (Exception $exception) {
            return NULL;
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
    function getOrder($order_id)
    {
        try {
            $this->db->select("paypal_order_id");
            $this->db->from(TABLE_PAYPAL_ORDER);
            $this->db->where("order_id", $order_id);

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
            $orderId = $this->getOrder($paypal_order["order_id"]);

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
