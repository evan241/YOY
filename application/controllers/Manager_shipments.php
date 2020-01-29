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

    public function form_add_shipments() {
        if ($this->session->userdata('YOY_ID_ROL') != ADMINISTRADOR) redirect('login/salir');

        $this->load->view('esqueleton/header_manager');
        $this->load->view('Manager/shipments/v_add_shipment');
        $this->load->view('esqueleton/footer_manager');
    }

    public function ajax_add_shipments() {
        if ((!$this->input->is_ajax_request()) || ($this->session->userdata('YOY_ID_ROL') != ADMINISTRADOR )) 
            redirect('login/salir');

        $shipment = array(
            'NOMBRE_TIPO_ENVIO' => trim($this->input->post("RG_NOMBRE_ENVIO")),
            'PRECIO_TIPO_ENVIO' => trim($this->input->post("RG_PRECIO_ENVIO"))
        );

        echo $this->mmanager_shipments->addShipment($shipment);
    }

    function ajax_disable_shipments($id) {
        if ((!$this->input->is_ajax_request()) || ($this->session->userdata('YOY_ID_ROL') != ADMINISTRADOR )) 
            redirect('login/salir');

        echo $this->mmanager_shipments->disableShipment($id);
    }
}
