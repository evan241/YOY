<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Store extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("mstore");
        $this->load->model('msite');
        $this->load->model('mmanager');
        $this->load->model('mmanager_products');
        /* if($this->session->userdata('YOY_ID_USUARIO')==''){redirect('site/index');} */
    }

    public function index() {
    	$this->load->view('esqueleton/header');
        $data['products'] = $this->mstore->get_all_valid_products_to_store();
        $this->load->view('Store/v_index', $data);
        $this->load->view('esqueleton/footer');
    }
    public function proccess_sale($item) {
        if($this->session->userdata('YOY_ID_USUARIO')):
            $this->load->view('esqueleton/header');
            $data['product'] = $this->mmanager_products->get_product_by_id($item);
            $data['ROW_SHIPS'] = $this->mmanager->get_all_valid_ships();
            $this->load->view('Store/process_sale', $data);
            $this->load->view('esqueleton/footer');
        else:
            redirect('Login/index','refresh');
        endif;
            
    }
    public function ajax_SaveInfoSale()
    {
        if($this->input->is_ajax_request())
        {
            $AddresTemp = array(
                'NOMBRE_USUARIO'   => $this->input->post('NOMBRE_EDIT'),
                'APELLIDO_USUARIO' => $this->input->post('APE_EDIT'),               
                'TELEFONO_USUARIO' => $this->input->post('TEL_EDIT'),
                'PAIS_USUARIO'     => $this->input->post('PAIS_EDIT'),
                'ESTADO_USUARIO'   => $this->input->post('ESTADO_EDIT'),
                'CIUDAD_USUARIO'   => $this->input->post('CIUDAD_EDIT'),
                'CALLE_DIRECCION'  => $this->input->post('CALLE_EDIT'),
                'NUM_DIRECCION'    => $this->input->post('NUM_EDIT'),
                'CP_USUARIO'       => $this->input->post('CP_EDIT'),
                'COLONIA_DIRECCION'=> $this->input->post('COLONIA_EDIT')
            );
            
            $this->session->set_userdata($AddresTemp);
            
        }else{
            redirect("Store/index");
        }
    }
    public function proccess_payment($item) {
        $this->load->view('esqueleton/header');
        $data['product'] = $this->mmanager_products->get_product_by_id($item);
        $data['ROW_SHIPS'] = $this->mmanager->get_all_valid_ships();
        $this->load->view('Store/process_payment', $data);
        $this->load->view('esqueleton/footer');
    }
    public function ajax_choose_ship(){
        if($this->input->is_ajax_request())
        {
            $choose = $this->mstore->choose_ship();
            if($choose)
                echo $choose;
            else
                echo"error";
        }else{
            redirect('Store/index','refresh');
        }
    }
    public function ajax_choose_payment(){
        if($this->input->is_ajax_request())
        {
            $choose = $this->mstore->choose_payment();
            if($choose){
                echo $choose;
            } else
                echo "error";
        }else{
            redirect('Store/index','refresh');
        }
    }
    public function ajax_BuyNow(){

        if($this->input->is_ajax_request()){

            if($this->session->set_userdata("TEMP_CANT",$this->input->post("cant"))){
                return true;
            }else{
                return false;
            }
        }else{            
            redirect('Store/index','refresh');        
        }
    }
    public function sales($item) {

        $this->load->view('esqueleton/header');
        $data['product'] = $this->mmanager_products->get_product_by_id($item);
        $data['ROW_SHIPS'] = $this->mmanager->get_all_valid_ships();
        $this->load->view('Store/sales', $data);
        $this->load->view('esqueleton/footer');
    }
    public function resume($id) {
         
         $Sale = $this->mstore->get_sale($id);
         if (is_object($Sale)){
            $Product = $Sale->ID_PRODUCTO;
            $data['infoSale'] = $this->mstore->get_sale($id);
            $data['product'] = $this->mmanager_products->get_product_by_id($Product);

            $this->load->view('esqueleton/header');
            $this->load->view('Store/resume_sale', $data);
            $this->load->view('esqueleton/footer');

         }else{
            
            redirect(base_url('Store/index'),'refresh');
            
         }
         
    }
    public function send_mail($id) {
        $Sale = $this->mstore->get_sale($id);
        $Usuario = $this->mstore->get_user_by_id($Sale->ID_USUARIO);
        $producto = $this->mstore->get_producto_by_id($Sale->ID_PRODUCTO);
        $envio = $this->mstore->get_envio_by_id($Sale->ID_TIPO_ENVIO);
        
        $data = array(
            "venta" => $Sale,
            "usuario" => $Usuario,
            "producto" => $producto,
            "envio" => $envio
        );

        //load email library
        $this->load->library('email');
        $this->email->set_newline("\r\n");

        //set email information and content
        $this->email->from('erick.evangelista87@gmail.com', 'Administración');
        $this->email->to($Usuario["EMAIL_USUARIO"]);
        $this->email->subject('NEW BUY - YOY');
        $this->email->message($this->load->view('Store/emailBuy',$data,true));
           

        $this->email->set_mailtype('html');

        $this->email->send();
        
        $data2 = array(
            'Nombre' => $Usuario["NOMBRE_USUARIO"]." ".$Usuario["APELLIDO_USUARIO"],
            'Telefono' => $Usuario["TELEFONO_USUARIO"],
            'Email' => $Usuario["EMAIL_USUARIO"],
            'Mensaje' => $Sale->CANT_VENTA . " " . $producto["NOMBRE_PRODUCTO"]
        );

        $this->email->set_newline("\r\n");

        //set email information and content
        $this->email->from('contacto@geemsolutions.com', 'Administración YOY');
        $this->email->to('yoyideas@gmail.com');
        $this->email->subject('YOY - NEW SALE');
         $this->email->message($this->load->view('Store/newBuy', $data2, true));
           

        $this->email->set_mailtype('html');

        $this->email->send();

        return true;
        
    }
}