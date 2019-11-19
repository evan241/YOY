<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//  FAVOR DE NO TOCAR ESTO O SE CAE TODO
 
require '/vendor/autoload.php';
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

class Paypal extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('paypal');
        $this->load->model('mpaypal');
	}
	
	public function index() {
        $data['RESPONSE'] = $this->handleInformation("3XL77363M2982862A");
        $this->load->view('PAYPAL_TEST/TEST', $data);
    }
    
    /**
     *      Una vez que tengamos la información necesaria, finalmente la ingresamo en la base de datos.
     * 
     *      Como puedes ver a $info se le esta asignando el valor de la funcion, las cuales regresan
     *      el mismo array pero ligeramente modificado, ya que incluyen el ultimo ID ingresado a la base,
     *      y estos ID son utilizados como Foreign Key en las tablas.      
     */
    public function handleInformation($orderID) {
        
        $info = $this->getInformation($orderID);

        if ($info == null) {
            return "Error";
        }

        $info = fixDateTime($this->getInformation($orderID));
        $this->mpaypal->addSale($info);

        return "Success";
    }

    /**
     *      Aqui basicamente acomodamos toda la informacion que le habiamos pedido a Paypal sobre la compra,
     *      solo tomamos la informacion necesaria y lo acomodamos en tres distintos arrays.
     * 
     *      Los "key" dentro de cada arrray tienen el mismo nombre de los CAMPOS en la base de datos,
     *      y los "key" del array regresado al final de la funcion tienen el mismo nombre de las TABLAS.
     */
	public function getInformation($orderID) {

        try {
            $client = PayPalClient::client();
            $response = $client->execute(new OrdersGetRequest($orderID));
        }
        catch (Exception $e) {
            // Solo guardar el orderID
           return null; 
        }
        
        $paypal_client = array(
            "id" => $response->result->payer->payer_id,
            "name" => $response->result->payer->name->given_name,
            "surname" => $response->result->payer->name->surname,
            "email" => $response->result->payer->email_address
        );

        $token = $this->getToken();

        $additionalInfo = $this->getTransactionDetails(
            $response->result->links[0]->href,
            $token);

        /**
         *      Si el servidor falla en obtener el token o si no recibe la informacion
         *      adicional requerida, simplemente guardara el url y orden en: "paypal_error"
         */
        if ($token == null || $additionalInfo == null) {
            $paypal_error = array(
                "paypal_client" => $paypal_client,
                "ID_USUARIO" => 1,
                "ID_PRODUCTO" => 1,
                "status" => $response->result->status,
                "checkout_url" => $response->result->links[0]->href,
                "checkout_id" => $response->result->id
            );
            return null;
        }

        /**
         *      De lo contrario, si la informacion es recibida de manera correcta, se guardara toda la 
         *      informacion en la base de datos
         */

        $paypal_order = array(
            "paypal_client_id" => "",
            "ID_USUARIO" => 1,
            "ID_PRODUCTO" => 1,
            "id" => $additionalInfo->purchase_units[0]->payments->captures[0]->id,
            "create_date" => $additionalInfo->purchase_units[0]->payments->captures[0]->create_time,
            "create_time" => "",
            "currency" => $additionalInfo->purchase_units[0]->amount->currency_code,
            "total_amount" => $additionalInfo->purchase_units[0]->payments->captures[0]->seller_receivable_breakdown->gross_amount->value,
            "net_amount" => $additionalInfo->purchase_units[0]->payments->captures[0]->seller_receivable_breakdown->net_amount->value,
            "paypal_fee" => $additionalInfo->purchase_units[0]->payments->captures[0]->seller_receivable_breakdown->paypal_fee->value
        );

        $paypal_info = array(
            "paypal_order_id" => "",
            "status" => $response->result->status,
            "update_date" => $additionalInfo->purchase_units[0]->payments->captures[0]->update_time,
            "update_time" => "",
            "checkout_url" => $response->result->links[0]->href,
            "checkout_id" => $response->result->id
        );

        return array(
            "paypal_client" => $paypal_client,
            "paypal_order" => $paypal_order,
            "paypal_info" => $paypal_info
        );
    }

    /**
     *      Aqui es donde jalamos toda la informacion de la compra de Paypal ya que por default 
     *      el response no te regresa todo, entonces aqui exigimos toda la informacion.
     * 
     *      La funcion simplemente requiere el checkout_url obtenido durante la compra y el token.
     *      checkout_url = $response->result->links[0]->href
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

        /**
         *      Regresa la informacion de la venta si el token y el url son correctos,
         *      caso contrario regresa un valor null.
         */
        $result = json_decode(curl_exec($curl));
        return (!array_key_exists("name", $result)) ? $result : null;
    }

    /**
     *      Esta funcion simplemente regresa el Token necesario para mandar un request
     *      al API de paypal y obtener informacion de la compra.
     * 
     *      Solo requiere los datos de Sandbox ó Live, se encuentran en el archivo de Constants.
     */
    public function getToken() {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, TOKEN_URL);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_USERPWD, SANDBOX_ID.":".SANDBOX_SECRET);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        
        /**
         *      Regresa el token si el ID y Password del vendedor son correctos,
         *      caso contrario regresa un valor null.
         */
        $result = json_decode(curl_exec($ch));
        $token = (array_key_exists("access_token", $result)) ? $result->access_token : null;
        curl_close($ch);
        
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
