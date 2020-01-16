<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if ($this->session->userdata('YOY_ID_ROL') == ADMINISTRADOR || 
            $this->session->userdata('YOY_ID_ROL') == VENDEDOR) 
            redirect('manager/index');

        $this->load->view('esqueleton/header');
        $this->load->view('index');
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

    public function contact() {

        $data['logo1'] = base_url() . "assets/images/logo.png";
        $data['logo2'] = base_url() . "assets/images/logo2.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('contacto');
        $this->load->view('esqueleton/footer');
    }

}
