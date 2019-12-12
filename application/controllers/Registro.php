<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registro extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('mregistro');
        $this->load->helper('validation');
    }

    // public function index() {

    //     // $this->email->clear();
    //     $this->email->from('CGXel@hotmail.com', 'Jashua');
    //     // $this->email->reply_to('CGXel@hotmail.com', 'Jashua');
    //     $this->email->to('Jashua.Heredia@hotmail.com');
    //     $this->email->subject('This is my subject');
    //     $this->email->message('This is my message');
    //     $this->email->set_mailtype('html');
    //     $this->email->send();
    // }

    public function index(){
        if (empty($this->session->userdata('YOY_ID_ROL'))) {
            $this->load->view('esqueleton/header');
            $this->load->view('Registro/v_index');
            $this->load->view('esqueleton/footer');
        } else {
            redirect('login/salir');
        }
    }

    public function ajax_registrar_usuario() {
        if ($this->form_validation->run('registro')) {
            $info = array(
                "NOMBRE_USUARIO" => $this->input->post('C_NOMBRE_USUARIO'),
                "APELLIDO_USUARIO" => $this->input->post('C_APELLIDOS_USUARIO'),
                "PASSWD_USUARIO" => $this->encryption->encrypt($this->input->post('C_PASSWORD_USUARIO')),
                "TELEFONO_USUARIO" => $this->input->post('C_TELEFONO_USUARIO'),
                "EMAIL_USUARIO" => $this->input->post('C_EMAIL_USUARIO'));

            $registro = $this->mregistro->registroUsuario($info);

            if ($registro != null) {

            }
        }
        echo "error";
    }
}