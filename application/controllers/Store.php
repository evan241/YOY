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
        $this->load->view('esqueleton/header');
        $data['product'] = $this->mmanager_products->get_product_by_id($item);
        $data['ROW_SHIPS'] = $this->mmanager->get_all_valid_ships();
        $this->load->view('store/process_sale', $data);
        $this->load->view('esqueleton/footer');
    }
    public function proccess_payment($item) {
        $this->load->view('esqueleton/header');
        $data['product'] = $this->mmanager_products->get_product_by_id($item);
        $data['ROW_SHIPS'] = $this->mmanager->get_all_valid_ships();
        $this->load->view('store/process_payment', $data);
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
            if($choose)
                echo $choose;
            else
                echo"error";
        }else{
            redirect('Store/index','refresh');
        }
    }
    public function sales($item) {
        $this->load->view('esqueleton/header');
        $data['product'] = $this->mmanager_products->get_product_by_id($item);
        $data['ROW_SHIPS'] = $this->mmanager->get_all_valid_ships();
        $this->load->view('store/sales', $data);
        $this->load->view('esqueleton/footer');
    }
     public function resume($id) {
         
         $Sale = $this->mstore->get_sale($id);
         /* $Product = $Sale->ID_PRODUCTO; */
         
         $data['infoSale'] =$this->mstore->get_sale($id);
         $data['product'] = $this->mmanager_products->get_product_by_id(2);

        $this->load->view('esqueleton/header');
        $this->load->view('store/resume_sale', $data);
        $this->load->view('esqueleton/footer');
    }
}