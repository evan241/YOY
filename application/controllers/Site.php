<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('msite');
    }

    public function index() {
        if ($this->session->userdata('YOY_ID_ROL') == ADMINISTRADOR) {
            redirect('manager/index');
        } else {
            $this->load->view('esqueleton/header');
            $this->load->view('index');
            $this->load->view('esqueleton/footer');
        }
    }

    public function login() {
        $this->load->view('esqueleton/header');
        $this->load->view('login');
        $this->load->view('esqueleton/footer');
    }

    public function ajax_validate_user() {
        if ($this->input->is_ajax_request()):
            if (!empty($this->input->post('username')) && !empty($this->input->post('password'))):
                $data['username'] = $this->input->post('username');
                $data['password'] = $this->input->post('password');
                $result = $this->msite->login($data);
                if (count($result)):

                    $datosSesion = array(
                        'YOY_ID_USUARIO' => $result[0]["ID_USUARIO"],
                        'YOY_NOMBRE_USUARIO' => $result[0]["NOMBRE_USUARIO"],
                        'YOY_USERNAME_USUARIO' => $result[0]["USERNAME_USUARIO"],
                        'YOY_APELLIDO_USUARIO' => $result[0]["APELLIDO_USUARIO"],
                        'YOY_ID_ROL' => $result[0]["ID_ROL"]
                    );

                    //var_dump($result);
                    $this->session->set_userdata($datosSesion);
                    $this->msite->update_last_login($result[0]["ID_USUARIO"]);
                    echo 'Ok';

                else:
                    echo '<b>* Datos de acceso incorrectos</b>';
                endif;
            else:
                echo '<b>* Debe introducir usuario y contraseña</b>';
            //redirect('login/salir');
            endif;
        else:
            redirect('login/salir');
        endif;
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

    public function hoteles() {

        $data['logo1'] = base_url() . "assets/images/logo.png";
        $data['logo2'] = base_url() . "assets/images/logo2.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('hoteles/hoteles');
        $this->load->view('esqueleton/footer');
    }

    public function wyndham() {

        $data['logo1'] = base_url() . "assets/images/logowindham.png";
        $data['logo2'] = base_url() . "assets/images/logowindham.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('hoteles/wyndham');
        $this->load->view('esqueleton/footer');
    }

    public function fiestainn() {

        $data['logo1'] = base_url() . "assets/images/logofiesta.png";
        $data['logo2'] = base_url() . "assets/images/logofiesta.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('hoteles/fiesta-inn');
        $this->load->view('esqueleton/footer');
    }

    public function mision() {

        $data['logo1'] = base_url() . "assets/images/logomision.png";
        $data['logo2'] = base_url() . "assets/images/logomision.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('hoteles/mision');
        $this->load->view('esqueleton/footer');
    }

    public function concierge() {

        $data['logo1'] = base_url() . "assets/images/logoconcierge.png";
        $data['logo2'] = base_url() . "assets/images/logoconcierge.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('hoteles/concierge');
        $this->load->view('esqueleton/footer');
    }

    public function delrey() {

        $data['logo1'] = base_url() . "assets/images/logodelrey.png";
        $data['logo2'] = base_url() . "assets/images/logodelrey.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('hoteles/del-rey');
        $this->load->view('esqueleton/footer');
    }

    public function donjorge() {

        $data['logo1'] = base_url() . "assets/images/logodonjorge.png";
        $data['logo2'] = base_url() . "assets/images/logodonjorge.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('hoteles/don-jorge');
        $this->load->view('esqueleton/footer');
    }

    public function actividades() {

        $data['logo1'] = base_url() . "assets/images/logo.png";
        $data['logo2'] = base_url() . "assets/images/logo2.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('actividades/actividades');
        $this->load->view('esqueleton/footer');
    }

    public function paracaidismo() {

        $data['logo1'] = base_url() . "assets/images/logo.png";
        $data['logo2'] = base_url() . "assets/images/logo2.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('actividades/paracaidismo');
        $this->load->view('esqueleton/footer');
    }

    public function paracaidismo2() {

        $data['logo1'] = base_url() . "assets/images/logo.png";
        $data['logo2'] = base_url() . "assets/images/logo2.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('actividades/paracaidismo2');
        $this->load->view('esqueleton/footer');
    }

    public function gastronomia() {

        $data['logo1'] = base_url() . "assets/images/logo.png";
        $data['logo2'] = base_url() . "assets/images/logo2.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('actividades/gastronomia');
        $this->load->view('esqueleton/footer');
    }

    public function ronclasico() {

        $data['logo1'] = base_url() . "assets/images/logo.png";
        $data['logo2'] = base_url() . "assets/images/logo2.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('actividades/ron-clasico');
        $this->load->view('esqueleton/footer');
    }

    public function lamaria() {

        $data['logo1'] = base_url() . "assets/images/logo.png";
        $data['logo2'] = base_url() . "assets/images/logo2.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('actividades/la-maria');
        $this->load->view('esqueleton/footer');
    }

    public function conoce() {

        $data['logo1'] = base_url() . "assets/images/logo.png";
        $data['logo2'] = base_url() . "assets/images/logo2.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('conoce/conoce-colima');
        $this->load->view('esqueleton/footer');
    }

    public function cerveza() {

        $data['logo1'] = base_url() . "assets/images/logo.png";
        $data['logo2'] = base_url() . "assets/images/logo2.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('conoce/cerveza');
        $this->load->view('esqueleton/footer');
    }

    public function pascuales() {

        $data['logo1'] = base_url() . "assets/images/logo.png";
        $data['logo2'] = base_url() . "assets/images/logo2.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('conoce/pascuales');
        $this->load->view('esqueleton/footer');
    }

    public function ponche() {

        $data['logo1'] = base_url() . "assets/images/logo.png";
        $data['logo2'] = base_url() . "assets/images/logo2.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('conoce/ponche');
        $this->load->view('esqueleton/footer');
    }

    public function rios() {

        $data['logo1'] = base_url() . "assets/images/logo.png";
        $data['logo2'] = base_url() . "assets/images/logo2.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('conoce/rios');
        $this->load->view('esqueleton/footer');
    }

    public function playas() {

        $data['logo1'] = base_url() . "assets/images/logo.png";
        $data['logo2'] = base_url() . "assets/images/logo2.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('conoce/playas');
        $this->load->view('esqueleton/footer');
    }

    public function villa() {

        $data['logo1'] = base_url() . "assets/images/logo.png";
        $data['logo2'] = base_url() . "assets/images/logo2.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('conoce/villa');
        $this->load->view('esqueleton/footer');
    }

    public function volcan() {

        $data['logo1'] = base_url() . "assets/images/logo.png";
        $data['logo2'] = base_url() . "assets/images/logo2.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('conoce/volcan');
        $this->load->view('esqueleton/footer');
    }

    public function Manglar() {

        $data['logo1'] = base_url() . "assets/images/logo.png";
        $data['logo2'] = base_url() . "assets/images/logo2.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('conoce/Manglar');
        $this->load->view('esqueleton/footer');
    }

    public function museos() {

        $data['logo1'] = base_url() . "assets/images/logo.png";
        $data['logo2'] = base_url() . "assets/images/logo2.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('conoce/museos');
        $this->load->view('esqueleton/footer');
    }

    public function rangeliana() {

        $data['logo1'] = base_url() . "assets/images/logo.png";
        $data['logo2'] = base_url() . "assets/images/logo2.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('conoce/rangeliana');
        $this->load->view('esqueleton/footer');
    }

    public function canon() {

        $data['logo1'] = base_url() . "assets/images/logo.png";
        $data['logo2'] = base_url() . "assets/images/logo2.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('conoce/canon');
        $this->load->view('esqueleton/footer');
    }

    public function canaverales() {

        $data['logo1'] = base_url() . "assets/images/logo.png";
        $data['logo2'] = base_url() . "assets/images/logo2.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('conoce/cañaverales');
        $this->load->view('esqueleton/footer');
    }

    public function globo() {

        $data['logo1'] = base_url() . "assets/images/logo.png";
        $data['logo2'] = base_url() . "assets/images/logo2.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('actividades/globo');
        $this->load->view('esqueleton/footer');
    }

    public function quienes() {

        $data['logo1'] = base_url() . "assets/images/logo.png";
        $data['logo2'] = base_url() . "assets/images/logo2.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('quienes-somos');
        $this->load->view('esqueleton/footer');
    }

    public function contacto() {

        $data['logo1'] = base_url() . "assets/images/logo.png";
        $data['logo2'] = base_url() . "assets/images/logo2.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('contacto');
        $this->load->view('esqueleton/footer');
    }

}
