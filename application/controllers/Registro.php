<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registro extends CI_Controller {

        public function __construct() {
        parent::__construct();
        $this->load->model('mlogin');
    }

    public function register() {
        if (empty($this->session->userdata('YOY_ID_ROL'))) {
            $this->load->view('Login/v_register');
        } else {
            //echo 'aca';
            redirect('login/salir');
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */