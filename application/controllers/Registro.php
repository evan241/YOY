<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registro extends CI_Controller {

        public function __construct() {
        parent::__construct();

        $this->load->model('mregistro');
    }

    public function index() {
        $this->load->view('TESTING/registrar');
    }

    public function validar() {

        // $this->form_validation->set_rules('username', 'Username', array($this->mregistro, 'test'));
        $this->form_validation->set_rules('username', 'Username', array('required', array($this->mregistro, 'test')));
        // $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_message('required', 'TEST');

        if ($this->form_validation->run()) {
            $this->load->view('TESTING/ok');
        }
        else {
            $this->load->view('TESTING/registrar');
        }
                
    }

}