<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('msite');
        $this->load->model('mmanager');
    }

    public function index() {
        if ($this->session->userdata('YOY_ID_ROL') == ADMINISTRADOR || $this->session->userdata('YOY_ID_ROL') == ADMINISTRATIVO) {
            redirect('manager/index');
        } else {
            $this->load->view('esqueleton/header');
            $this->load->view('index');
            $this->load->view('esqueleton/footer');
        }
    }

    public function login() {
        $this->load->view('esqueleton/header');
        $this->load->view('Login/v_index');
        $this->load->view('esqueleton/footer');
    }

    

    public function salir() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function work() {
        $this->load->view('esqueleton/header');
        $this->load->view('work');
        $this->load->view('esqueleton/footer');
    }

    public function about() {
        $this->load->view('esqueleton/header');
        $this->load->view('about');
        $this->load->view('esqueleton/footer');
    }

    public function store() {
        $this->load->view('esqueleton/header');
        $data['products'] = $this->msite->get_all_valid_products_to_store();
        $this->load->view('store', $data);
        $this->load->view('esqueleton/footer');
    }
    
    public function sales($param) {
        $this->load->view('esqueleton/header');
        $data['product'] = $this->mmanager->get_product_by_id($param);
        $data['ROW_SHIPS'] = $this->mmanager->get_all_valid_ships();
        $this->load->view('sales', $data);
        $this->load->view('esqueleton/footer');
    }

    public function contact() {

        $data['logo1'] = base_url() . "assets/images/logo.png";
        $data['logo2'] = base_url() . "assets/images/logo2.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('contacto');
        $this->load->view('esqueleton/footer');
    }

}
