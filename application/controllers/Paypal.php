<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//  FAVOR DE NO TOCAR ESTO O SE CAE TODO

require './vendor/autoload.php';
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

class Paypal extends CI_Controller {

  private $sale = NULL;


  public function __construct() {
    parent::__construct();
    $this->load->helper('paypal');
    $this->load->model('mpaypal');
    $this->load->model('mmanager_sales');
  }

    /**
     *      Funcion para arreglar los errores de paypal, solo toma el ID del error encontrado
     *      en la base de datos, para despues ejecutar de nuevo toda la operacion,
     *      este proceso toma unos segundos, puede tomar más arriba del server.
    */
    public function requestSaleInformation($errorID) {
      $var = $this->mpaypal->getErrorInfo($errorID);

      if ($var != NULL) {
        $order = $var['order_id'];
        $product = $var['ID_PRODUCTO'];
        $user = $var['ID_USUARIO'];
        $shipment = $var['ID_TIPO_ENVIO'];

        $this->handleInformation($order, $product, $shipment, $user);
      }
      else echo false;
    }

    /**
     *      Finalmente, al obtener toda la informacion, la ingresamos en la base de datos
     *      La cual revisara los registros para evitar duplicados.
     *
     *      Si todo sale bien entonces removera el registro temporal que guardamos en paypal_error
     */
    public function handleInformation($orderID, $saleID) {

      /* obtenemos la informacion de la venta guardada previamente */
      $this->sale = $this->mmanager_sales->get_sale_by_id($saleID);

      /*  Obtiene la informacion de la orden  */
      $info = $this->getInformation($orderID);

        /*  Si obtuvo la informacion, entonces guarda la orden en la base de datos,
            en la tabla de ordenes de Paypal
        */
            if ($info != NULL) {
              $info["paypal_order"]["paypal_client_id"] = $this->mpaypal->addClient($info["paypal_client"]);
              $id = $this->mpaypal->addOrder($info["paypal_order"]);

            /*  Si logro guardar correctamente el registro de la orden de Paypal,
                entonces borramos el registro de la tabla errores de Paypal
            */
                if ($id > 0) {
                  $this->mpaypal->deleteError($orderID);

                  $data = array(
                    'ID_USUARIO' => $ID_USUARIO,
                    'ID_PRODUCTO' => $ID_PRODUCTO,
                    'FECHA_VENTA' => $info['paypal_order']['create_date'],
                    'STATUS_VENTA' => PAGO_VERIFICADO,
                    'ID_MEDIO_PAGO' => PAGO_PAYPAL,
                    'ID_TIPO_ENVIO' => $this->ID_TIPO_ENVIO,
                    'paypal_order_id' => $id
                  );

                /*  Por ultimo, agregamos la venta de Paypal a la tabla de ventas, 
                    si todo sale bien, borramos el registro de la venta con error
                */
                    if (!$this->mpaypal->paypalSaleExists($id)) {
                      $this->mmanager_sales->save_sale($data);
                    }
                    $this->mpaypal->deleteSaleError($this->ID_SALE);
                  }
                  echo true;
                  return true;
                }
                else echo false;
                return false;
              }

    /**
     *      Aqui basicamente acomodamos toda la informacion que le habiamos pedido a Paypal sobre la compra,
     *      solo tomamos la informacion necesaria y lo acomodamos en dos arrays.
     * 
     *      Antes de comenzar cualquier proceso de paypal guardamos la informacion más importante en
     *      la tabla "paypal_error", hacemos esto en caso de que el proceso falle por cualquier motivo: 
     *      perdida de conexion, token invalido, etc.
     */
    public function getInformation($orderID) {

		// Guardamos la info en caso de un error
      $error_id = $this->mpaypal->addError($this->sale['ID_VENTA'], $orderID);


		// Intentamos pedir la informacion a paypal
      $additionalInfo = NULL;
      $response = NULL;

      try {
        $client = PayPalClient::client();
        $response = $client->execute(new OrdersGetRequest($orderID));

        $additionalInfo = $this->getTransactionDetails(
          $response->result->links[0]->href,
          $this->getToken());
      }
      catch (Exception $e) {
        return NULL;
      }

		/**
		 * 		Si paypal regresa de manera efectiva la informacion, entonces la acomodamos en arrays
		 */
		if (($additionalInfo != NULL) && ($response != NULL)) {
			
			$paypal_client = array(
				"id" => $response->result->payer->payer_id,
				"name" => $response->result->payer->name->given_name,
				"surname" => $response->result->payer->name->surname,
				"email" => $response->result->payer->email_address
			);

			$paypal_order = array(
				"paypal_client_id" => NULL,
				"ID_USUARIO" => $this->ID_USUARIO,
				"ID_PRODUCTO" => $this->ID_PRODUCTO,
        "ID_TIPO_ENVIO" => $this->ID_TIPO_ENVIO,
        "sale_id" => $additionalInfo->purchase_units[0]->payments->captures[0]->id,
        "currency" => $additionalInfo->purchase_units[0]->amount->currency_code,
        "total_amount" => $additionalInfo->purchase_units[0]->payments->captures[0]->seller_receivable_breakdown->gross_amount->value,
        "net_amount" => $additionalInfo->purchase_units[0]->payments->captures[0]->seller_receivable_breakdown->net_amount->value,
        "paypal_fee" => $additionalInfo->purchase_units[0]->payments->captures[0]->seller_receivable_breakdown->paypal_fee->value,
        "status" => $response->result->status,
        "create_date" => $additionalInfo->purchase_units[0]->payments->captures[0]->create_time,
        "create_time" => "",
        "update_date" => $additionalInfo->purchase_units[0]->payments->captures[0]->update_time,
        "update_time" => "",
        "order_id" => $response->result->id
      );

			$info = fixDateTime(array(
				"paypal_client" => $paypal_client,
				"paypal_order" => $paypal_order
			));
      return $info;
    }
    return NULL;
  }

    /**
     *      Aqui es donde jalamos toda la informacion de la compra de Paypal ya que por default 
     *      el response no te regresa todo, entonces aqui exigimos toda la informacion.
     * 
     *      La funcion simplemente requiere el checkout_url obtenido durante la compra y el token.
     *      checkout_url = $response->result->links[0]->href
     * 
     *      Si el token o el url de la venta son incorrectos, regresara un valor null.
     */
    public function getTransactionDetails($checkout, $token) {

      $curl = curl_init($checkout);
      curl_setopt($curl, CURLOPT_POST, false);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($curl, CURLOPT_HEADER, false);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Authorization: Bearer ' . $token,
        'Accept: application/json',
        'Content-Type: application/json'
      ));

      $result = json_decode(curl_exec($curl));
      $additionalInfo = (!array_key_exists("name", $result)) ? $result : NULL;
      curl_close($curl);

      return $additionalInfo;
    }

    /**
     *      Esta funcion simplemente regresa el Token necesario para mandar un request
     *      al API de paypal y obtener informacion de la compra.
     * 
     *      Solo requiere los datos de Sandbox ó Live, se encuentran en el archivo de Constants,
     *      si la informacion ingresada es incorrecta regresara un valor null en vez del token.
     */
    public function getToken() {

      $curl = curl_init();

      curl_setopt($curl, CURLOPT_URL, TOKEN_URL);
      curl_setopt($curl, CURLOPT_HEADER, false);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
      curl_setopt($curl, CURLOPT_USERPWD, SANDBOX_ID.":".SANDBOX_SECRET);
      curl_setopt($curl, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

      $result = json_decode(curl_exec($curl));
      $token = (array_key_exists("access_token", $result)) ? $result->access_token : NULL;
      curl_close($curl);

      return $token;
    }
  }

/**
 *      Aqui es donde cambiamos el payment API a Sandbox o Live.
 * 
 *      Servidor Sandbox        Servidor Live
 *      SANDBOX_ID              Se necesita crear una business account
 *      SANDBOX_SECRET          para las ventas reales
 */
class PayPalClient
{
  public static function client() {
    return new PayPalHttpClient(self::environment());
  }

  public static function environment(){
    $clientId = getenv("CLIENT_ID") ?: SANDBOX_ID;
    $clientSecret = getenv("CLIENT_SECRET") ?: SANDBOX_SECRET;
    return new SandboxEnvironment($clientId, $clientSecret);
  }
}
