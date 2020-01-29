<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Manager_shipments extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('mmanager_shipments');
        $this->load->helper('general');
    }

    public function shipments() {
        if ($this->session->userdata('YOY_ID_ROL') != ADMINISTRADOR) redirect('login/salir');

        $data['shipments'] = $this->mmanager_shipments->getAll();

        $this->load->view('esqueleton/header_manager');
        $this->load->view('Manager/shipments/v_index_shipment', $data);
        $this->load->view('esqueleton/footer_manager');
    }

}
