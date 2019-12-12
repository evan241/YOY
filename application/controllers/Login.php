<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {



    public function __construct() {
        parent::__construct();
        $this->load->model('mlogin');
        $this->load->helper('validation');
    }
    public function index() {
        $this->load->view('esqueleton/header');
        $this->load->view('Login/v_index');
        $this->load->view('esqueleton/footer');
    }

    public function salir() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function ForgotPassword() {
        if (empty($this->session->userdata('ROLLING_ID_USUARIO'))) {
            $this->load->view('esqueleton/header');
            $data['title']='Principal/v_title_forgot_password';
            $data['contenido']="Login/v_forgot_password";
            $this->load->view('Login/v_forgot_password',$data);
            $this->load->view('esqueleton/footer');
        } else {
            redirect('login/salir');
        }
    }

    public function ajax_validate_user() {

        if ($this->input->is_ajax_request()) {
            if (!empty($this->input->post('email')) && !empty($this->input->post('password'))) {

                $data = array(
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password'));

                $result = $this->mlogin->login($data);

                if (count($result)) {
                    $datosSesion = array(
                        'YOY_ID_USUARIO' => $result[0]["ID_USUARIO"],
                        'YOY_NOMBRE_USUARIO' => $result[0]["NOMBRE_USUARIO"],
                        'YOY_USERNAME_USUARIO' => $result[0]["EMAIL_USUARIO"],
                        'YOY_APELLIDO_USUARIO' => $result[0]["APELLIDO_USUARIO"],
                        'YOY_ID_ROL' => $result[0]["ID_ROL"]
                    );
                    $this->session->set_userdata($datosSesion);
                    $this->mlogin->update_last_login($result[0]["ID_USUARIO"]);
                    echo 'Ok';
                }
                else {
                    echo '<b>* Datos de acceso incorrectos</b>';
                }
            }
            else {
                echo '<b>* Debe introducir usuario y contraseña</b>';
            }
        }
    }

    public function registro(){
        if (empty($this->session->userdata('YOY_ID_ROL'))) {
            $this->load->view('esqueleton/header');
            $this->load->view('login/registro');
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

            $registro = $this->mlogin->registroUsuario($info);

            if ($registro != null) {
                echo "ok";
            }
        }
        else {
            echo "error";
        }
        
    }
}
