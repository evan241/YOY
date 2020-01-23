<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Manager_Sales extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mmanager_sales');
        $this->load->helper('general');

        $this->load->model('mpaypal');
    }

    public function sales() {
        if ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR)) redirect('login/salir');

        $data['sales'] = $this->mmanager_sales->get_all_sales();

        print_r($this->mpaypal->deleteSaleError(1));

        // $this->load->view('esqueleton/header_manager', getActive("classSal"));
        // $this->load->view('Manager/sales/v_index_venta', $data);
        // $this->load->view('esqueleton/footer_manager');
    }

    public function ajax_disable_sale() {
        if ((!$this->input->is_ajax_request()) ||
            ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR))) 
            redirect('login/salir');

        if ($this->mmanager_sales->disable_sale_on_db($this->input->post("ID_VENTA"))) echo 1;
        else echo 0;
    }
}
