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

    public function insert() {
        if ($this->mregistro->insert_user()) {

            $this->email->from("CGXel@hotmail.com", "Jashua");
            $this->email->to("Alexis.isidoro_91@hotmail.com");
            $this->email->subject("Titulo");
            $this->email->message("Mensaje");
            $this->email->send();



            echo true;
        }
        else {
            echo false;
        }
    }
}