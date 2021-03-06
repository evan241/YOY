<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manager extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mmanager');
        $this->load->helper('general');
    }

    public function index() {
        if ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR)) redirect('login/salir');

        $data['months'] = $this->mmanager->getYearSales();
        $data['monthSales'] = $this->mmanager->monthSaleCount(date('m'));
        $data['yearSales'] = $this->mmanager->getYearSaleTotal();

        $this->load->view('esqueleton/header_manager', getActive('classIni'));
        $this->load->view('Manager/v_index_manager', $data);
        $this->load->view('esqueleton/footer_manager');
    }
}
