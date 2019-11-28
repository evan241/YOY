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
    public function register() {
        if (empty($this->session->userdata('YOY_ID_ROL'))) {
            $this->load->view('Login/v_register');
        } else {
            //echo 'aca';
            redirect('login/salir');
        }
    }

    public function registration(){
        if (empty($this->session->userdata('YOY_ID_ROL'))) {
            $this->load->view('esqueleton/header');
            //$data['contenido']="Login/v_registration";
            //$data['title']='Principal/v_title_registrate';
            // $this->load->view('Login/v_registration');
            $this->load->view('Login/v_registration');
            $this->load->view('esqueleton/footer');
        } else {
            //echo 'aca';
            redirect('login/salir');
        }
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

    public function ajax_validate_user() {
        if ($this->input->is_ajax_request()):
            if (!empty($this->input->post('USERNAME_USUARIO')) && !empty($this->input->post('PASSWD_USUARIO'))):
                $data['USERNAME_USUARIO'] = $this->input->post('USERNAME_USUARIO');
                $data['PASSWD_USUARIO'] = $this->input->post('PASSWD_USUARIO');
                $result = $this->mlogin->login($data);

                if (count($result)):

                    $datosSesion = array(
                        'ROLLINGO_ID_USUARIO' => $result[0]["ID_USUARIO"],
                        'ROLLINGO_EMAIL_USUARIO'=>$result[0]['EMAIL_USUARIO'],
                        'ROLLINGO_NOMBRE_USUARIO' => $result[0]["NOMBRE_USUARIO"] . ' ' . $result[0]["APELLIDOS_USUARIO"],
                        'ROLLINGO_ID_ROL' => $result[0]["ID_ROL"],
                        'ROLLINGO_IMG_USUARIO' => $result[0]["IMG_PERFIL_USUARIO"]
                    );
                    //var_dump($result);
                    $this->session->set_userdata($datosSesion);


                    echo 'Ok'.$result[0]["ID_ROL"];
                else:
                    echo '<b id="msj">* Datos de acceso incorrectos</b>';
                endif;
            else:
                echo '<b id="msj">* Datos de acceso incorrectos</b>';
            //redirect('login/salir');
            endif;
        else:
            redirect('login/salir');
        endif;
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