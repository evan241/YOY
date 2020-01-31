<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Manager_sales extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('mmanager_sales');
        $this->load->model('mmanager_clients');
        $this->load->model('mpaypal');
        $this->load->helper('general');
    }
    
    public function sales() {
        if ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR)) redirect('login/salir');

        $data['sales'] = $this->mmanager_sales->get_all_sales();

        $this->load->view('esqueleton/header_manager', getActive("classSal"));
        $this->load->view('Manager/sales/v_index_venta', $data);
        $this->load->view('esqueleton/footer_manager');
    }

    public function ajax_disable_sale() {
        if ((!$this->input->is_ajax_request()) ||
            ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR))) 
            redirect('login/salir');

        if ($this->mmanager_sales->disable_sale_on_db($this->input->post("ID_VENTA"))) echo 1;
        else echo 0;
    }

    public function ajax_get_user($id) {
        if ((!$this->input->is_ajax_request()) ||
            ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR))) 
            redirect('login/salir');

        print_r($this->mmanager_clients->get_client_by_id($id));
    }

    public function ajax_paypal_info($id) {
        if ((!$this->input->is_ajax_request()) ||
            ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR))) 
            redirect('login/salir');

        $order = $this->mpaypal->orderInformation($id);
        $client = $this->mpaypal->clientInformation($order['paypal_client_id']);

        print_r(array('order' => $order, 'client' => $client));        
    }
}
