<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manager_sales extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('mmanager_sales');
        $this->load->model('mmanager_clients');
        $this->load->model('mpaypal');
        $this->load->helper('general');
        $this->load->helper('currency');
        $this->load->helper('functions');
    }

    public function sales() {
        if ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR))
            redirect('login/salir');

        if ($this->input->post("RG_BUSCAR") == 1) {
            $dates['fechaini'] = convierte_fecha($this->input->post("RG_FECHA_INICIAL"));
            $dates['fechafin'] = convierte_fecha($this->input->post("RG_FECHA_FINAL"));
            $data['fechaini'] = $this->input->post("RG_FECHA_INICIAL");
            $data['fechafin'] = $this->input->post("RG_FECHA_FINAL");
        } else {
            $month = date('m');
            $year = date('Y');
            $fechaini = date('d/m/Y', mktime(0, 0, 0, $month, 1, $year));
            $fechafin = date('d/m/Y');
            $dates['fechaini'] = convierte_fecha($fechaini);
            $dates['fechafin'] = convierte_fecha($fechafin);
            $data['fechaini'] = $fechaini;
            $data['fechafin'] = $fechafin;
        }
        $data['sales'] = $this->mmanager_sales->get_all_sales_by_dates($dates);

        $this->load->view('esqueleton/header_manager', getActive("classSal"));
        $this->load->view('Manager/sales/v_index_venta', $data);
        $this->load->view('esqueleton/footer_manager');
    }

    public function ajax_disable_sale() {
        if ((!$this->input->is_ajax_request()) || ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR)))
            redirect('login/salir');

        if ($this->mmanager_sales->changeStatus($this->input->post("ID_VENTA"), CANCELADA))
            echo 1;
        else
            echo 0;
    }

    public function ajax_get_sale($id) {
        if ((!$this->input->is_ajax_request()) || ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR)))
            redirect('login/salir');

        print_r($this->mmanager_sales->get_sale_by_id($id));
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
