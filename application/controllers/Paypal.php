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
	
	public function index($orderID) {
        $data['RESPONSE'] = $this->handleInformation($orderID);
        // $this->load->view('PAYPAL_TEST/TEST', $data);
        $this->load->view('esqueleton/header');
        $this->load->view('index');
        $this->load->view('esqueleton/footer');
    }
    
    /**
     *      Si la informacion fue recibida de maneara correcta se ingresan todos los campos necesarios a la base de dato,
     *      caso contrario solamente guardamos el Order ID en la tabla paypal_error, para procesarla despues.    
     */
    public function handleInformation($orderID) {

        $info = $this->getInformation($orderID);

        if ($info == null) {
            $this->mpaypal->Error($orderID);
            return "Guardado en errores";
        }
        $this->mpaypal->addSale($info);

        return "Guardado correctamente";
    }

    /**
     *      Aqui basicamente acomodamos toda la informacion que le habiamos pedido a Paypal sobre la compra,
     *      solo tomamos la informacion necesaria y lo acomodamos en tres distintos arrays.
     * 
     *      Los "key" dentro de cada ambos tienen el mismo nombre de las columnas en la base de datos,
     *      y los "key" del array regresado al final de la funcion tienen el mismo nombre de las tablas.
     */
	public function getInformation($orderID) {

        $token = null;
        $additionalInfo = null;

        try {
            $client = PayPalClient::client();
            $response = $client->execute(new OrdersGetRequest($orderID));

            $token = $this->getToken();

            $additionalInfo = $this->getTransactionDetails(
                $response->result->links[0]->href,
                $token);
        }
        catch (Exception $e) {
           // Dejar vacio, solo es para evitar que la pagina crashe en la inicializacion de $response.
        }

        if ($additionalInfo == null) {
            return null;
        }

        $paypal_client = array(
            "id" => $response->result->payer->payer_id,
            "name" => $response->result->payer->name->given_name,
            "surname" => $response->result->payer->name->surname,
            "email" => $response->result->payer->email_address
        );

        $paypal_order = array(
            "paypal_client_id" => "",
            "ID_USUARIO" => $this->session->userdata("YOY_ID_USUARIO"),
            "ID_PRODUCTO" => 1,
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
            "checkout_url" => $response->result->links[0]->href,
            "checkout_id" => $response->result->id
        );

        return fixDateTime(array(
            "paypal_client" => $paypal_client,
            "paypal_order" => $paypal_order
        ));
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
        $additionalInfo = (!array_key_exists("name", $result)) ? $result : null;
        curl_close($curl);

        return $additionalInfo;
    }

    /**
     *      Esta funcion simplemente regresa el Token necesario para mandar un request
     *      al API de paypal y obtener informacion de la compra.
     * 
     *      Solo requiere los datos de Sandbox ó Live, se encuentran en el archivo de Constants,
     *      si la informacion ingresada es correcta regresara un valor null en vez del token.
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
        $token = (array_key_exists("access_token", $result)) ? $result->access_token : null;
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
