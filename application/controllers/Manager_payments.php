<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manager_payments extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mmanager_payments');
        $this->load->helper('general');
    }
    
    public function payments() {
        if ($this->session->userdata('YOY_ID_ROL') != ADMINISTRADOR) redirect('login/salir');

        $data['payments'] = $this->mmanager_payments->getAll();

        $this->load->view('esqueleton/header_manager');
        $this->load->view('Manager/payments/v_index_payment', $data);
        $this->load->view('esqueleton/footer_manager');
    }

    function ajax_toggle_payments() {
        if ((!$this->input->is_ajax_request()) || ($this->session->userdata('YOY_ID_ROL') != ADMINISTRADOR )) 
            redirect('login/salir');

        echo $this->mmanager_payments->toggle($this->input->post('ID_PAYMENT'));
    }

}
