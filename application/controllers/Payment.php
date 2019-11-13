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

class Payment extends CI_Controller {

	public function __construct() {
        parent::__construct();
	}
	
	public function index() {
        $data['RESPONSE'] = $this->getInformation("6Y237066T71437910");
        $this->load->view('PAYPAL_TEST/TEST', $data);
    }
    
    public function handleInformation() {
        
    }

    /**
     *      Aqui basicamente acomodamos toda la informacion que le habiamos pedido a Paypal sobre la compra,
     *      solo tomamos la informacion necesaria y lo acomodamos en tres distintos arrays.
     * 
     *      Los "key" de los tres arrray tienen el mismo nombre de los CAMPOS en la base de datos,
     *      y los "key" del array regresado al final de la funcion tienen el mismo nombre de las TABLAS en la base de datos.
     */
	public function getInformation($orderID) {

        $client = PayPalClient::client();
        $response = $client->execute(new OrdersGetRequest($orderID));

        $additionalInfo = $this->getTransactionDetails(
            $response->result->links[0]->href,
            $this->getToken()
        );

        $clientDetails = array(
            "id" => $response->result->payer->payer_id,
            "name" => $response->result->payer->name->given_name,
            "surname" => $response->result->payer->name->surname,
            "email" => $response->result->payer->email_address
        );

        $orderDetails = array(
            "ID_PRODUCTO" => $additionalInfo->purchase_units[0]->description,
            "id" => $additionalInfo->purchase_units[0]->payments->captures[0]->id,
            "create_date_time" => $additionalInfo->purchase_units[0]->payments->captures[0]->create_time,
            "currency" => $additionalInfo->purchase_units[0]->amount->currency_code,
            "total_amount" => $additionalInfo->purchase_units[0]->payments->captures[0]->seller_receivable_breakdown->gross_amount->value,
            "net_amount" => $additionalInfo->purchase_units[0]->payments->captures[0]->seller_receivable_breakdown->net_amount->value,
            "paypal_fee" => $additionalInfo->purchase_units[0]->payments->captures[0]->seller_receivable_breakdown->paypal_fee->value
        );

        $developerInfo = array(
            "status" => $response->result->status,
            "update_date_time" => $additionalInfo->purchase_units[0]->payments->captures[0]->update_time,
            "checkout_url" => $response->result->links[0]->href,
            "checkout_id" => $response->result->id
        );

        return array(
            "paypal_client" => $clientDetails,
            "paypal_order" => $orderDetails,
            "paypal_info" => $developerInfo
        );
    }

    /**
     *      Aqui es donde jalamos toda la informacion de la compra de Paypal ya que por default 
     *      el response no te regresa todo, entonces aqui exigimos toda la informacion.
     * 
     *      La funcion simplemente requiere el checkout_url obtenido durante la compra y el token.
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
        $response = curl_exec($curl);

        return json_decode($response);
    }

    /**
     *      Esta funcion simplemente regresa el Token necesario para mandar un request
     *      al API de paypal y obtener informacion de la compra.
     * 
     *      Solo requiere los datos de Sandbox / Live, se encuentran en el archivo de Constants.
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
        
        $result = curl_exec($ch);
        $token = '';
        
        if(!empty($result)) {
            $json = json_decode($result);
            $token = $json->access_token;
        }
        else {
            // Falta implementar que hacer en caso de no regresar el token
            $token = "N/A";
        }
        curl_close($ch);
        
        return $token;
    }
}

/**
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
