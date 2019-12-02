<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registro extends CI_Controller {

        public function __construct() {
        parent::__construct();

        $this->load->model('mregistro');
        $this->load->helper('validation');
    }

    public function index() {
        $this->load->view('TESTING/registrar');
    }

    public function validar() {

        if ($this->form_validation->run('registro')) {
            echo true;
        }
        else {
            echo false;
        }
                
    }

}