<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mmanager_news');
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

    public function news($id = NULL) {
        
        $data['ROWS'] = $this->mmanager_news->get_all_news();
        $data['ID'] = $id;

        $this->load->view('esqueleton/header', $data);

        if (!isset($id)) {
            $this->load->view('News/v_news', $data['ROWS']);
        } else {
            $this->load->view('News/v_id_news', $data['ROWS']);
        }

        $this->load->view('esqueleton/footer');
    }
}
