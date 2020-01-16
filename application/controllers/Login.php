<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mlogin');
        $this->load->helper('validation');
    }

    // public function index() {
    //     $var = $this->mlogin->authUser("cgxel@hotmail.com", "KNUWYV");
    //     echo $var;
    // }

    public function index() {
        echo getAuthCode();
    }

    public function registro(){
        $this->load->view('esqueleton/header');
        $this->load->view('login/registro');
        $this->load->view('esqueleton/footer');
    }

    public function ForgotPassword() {
        $this->load->view('esqueleton/header');
        $this->load->view('Login/v_forgot_password',$data);
        $this->load->view('esqueleton/footer');
    }



    public function ajax_validate_user() {
        if (!$this->input->is_ajax_request()) redirect('login/index');

        if (!empty($this->input->post('email')) && !empty($this->input->post('password'))) {

            $data = array(
                'email' => strtolower(trim($this->input->post('email'))),
                'password' => trim($this->input->post('password')));

            $result = $this->mlogin->login($data);

            if (count($result)) {
                $datosSesion = array(
                    'YOY_ID_USUARIO' => $result[0]["ID_USUARIO"],
                    'YOY_EMAIL_USUARIO' => $result[0]["EMAIL_USUARIO"],
                    'YOY_NOMBRE_USUARIO' => $result[0]["NOMBRE_USUARIO"],
                    'YOY_APELLIDO_USUARIO' => $result[0]["APELLIDO_USUARIO"],
                    'YOY_ID_ROL' => $result[0]["ID_ROL"]
                );
                $this->session->set_userdata($datosSesion);
                $this->mlogin->update_last_login($result[0]["ID_USUARIO"]);

                // Datos de login ingresados correctamente
                echo 1;
            }
            // Email o contraseña son incorrectos
            else echo 2;
        }
        // Algun campo fue enviado vacio
        else echo 3;
    }


    public function ajax_registrar_usuario() {

        if ($this->form_validation->run('registro')) {

            $authCode = getAuthCode();

            $info = array(
                "NOMBRE_USUARIO" => trim($this->input->post('C_NOMBRE_USUARIO')),
                "APELLIDO_USUARIO" => trim($this->input->post('C_APELLIDOS_USUARIO')),
                "PASSWD_USUARIO" => $this->encryption->encrypt(trim($this->input->post('C_PASSWORD_USUARIO'))),
                "TELEFONO_USUARIO" => trim($this->input->post('C_TELEFONO_USUARIO')),
                "EMAIL_USUARIO" => strtolower(trim($this->input->post('C_EMAIL_USUARIO'))),
                "VIGENCIA_USUARIO" => 1,
                "CODIGO_USUARIO" => $authCode
            );
            if ($this->mlogin->registroUsuario($info)) {
                $this->sendEmail($info['EMAIL_USUARIO'], $authCode);

                // Registrado de manera correcta
                echo 1; 
            }
            // Email ya existe en la base de datos
            else echo 2; 
        }
        // Algun campo ingresado (input) no paso la validacion
        else echo 3; 
    }

    /*  Este metodo es el cual será ejecutado una vez que abran el enlace enviado
        por email, llamara la funcion que se encarga de la verificacion, 
        el resultado de esa funcion se coloca en un switch para los casos posibles.
    */
    public function auth(){
        $email = $this->input->get('email');
        $code = $this->input->get('code');
        $response = 0;

        if ($email && $code) $response = $this->mlogin->authUser($email, $code);

        /*  Los echo necesitan ser remplazados por los view, ejemplo:
            
            case 3:
            redirect('login/usuario_verificado');
            break;
        */
        switch ($response) {
            case 1:
            echo "el email no existe";
            break;

            case 2:
            echo "usuario ya estaba verificado";
            break;

            case 3:
            echo "usuario verificado correctamente";
            break;

            case 4:
            echo "406 email o codigo ingresado es invalido";
            break;
            
            default:
            echo "500 error del servidor";
            break;
        }
    }


    /*  Envia el email que contiene el enlace de verificacion,
        actualmente utiliza el correo de Erick para los correos.

        La configuación se encuentra en:
        application / config / email.php
    */
    private function sendEmail($email, $code) {
        $this->load->config('email');

        $from = $this->config->item('smtp_user');
        $to = $email;
        $subject = 'Enlace de verificación';
        $message = $this->forgeAuthLink($email, $code);

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        $this->email->send();
    }


    /*  Crea el URL para la verificacion de usuarios, ejemplo:
        http://localhost/YOY/login/auth?email=cgxel@hotmail.com&code=OLJOZC
    */
    private function forgeAuthLink($email, $code) {
        return base_url()
        . "login/auth?"
        . 'email=' . $email . "&"
        . 'code=' . $code;
    }
}
