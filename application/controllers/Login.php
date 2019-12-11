<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {



    public function __construct() {
        parent::__construct();
        /* if ($this->session->userdata('sesionAdmin')) {
          redirect('administracion');
          } */
        $this->load->model('mlogin');
        //$this->load->model('mprincipal');
        //$this->load->model('mmanager');
    }
    public function index(){
        $this->load->view('esqueleton/header');
        $this->load->view('login');
        $this->load->view('esqueleton/footer');
    }

    public function confirmation($ID_USUARIO){
        if (empty($this->session->userdata('ROLLINGO_ID_USUARIO'))) {
            $this->load->view('esqueleton/header');
            //$ID_USUARIO=$this->input->post('ID_USUARIO');
            if(intval($ID_USUARIO)>0){
                $confirm=$this->mprincipal->confirm($ID_USUARIO);
            }
            if(intval($ID_USUARIO)>0 && intval($confirm)>0)
                $this->load->view('Principal/v_confirmation');
            else
                $this->load->view('Principal/v_error_confirmation');
            $this->load->view('esqueleton/footer');
        } else {
            //echo 'aca';
            redirect('login/salir');
        }

    }

    public function salir(){
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function ForgotPassword(){
        if (empty($this->session->userdata('ROLLING_ID_USUARIO'))) {
            $this->load->view('esqueleton/header');
            $data['title']='Principal/v_title_forgot_password';
            $data['contenido']="Login/v_forgot_password";
            $this->load->view('Principal/v_index_principal',$data);
            $this->load->view('esqueleton/footer');
        } else {
            redirect('login/salir');
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */