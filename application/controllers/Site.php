<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('msite');
        $this->load->model('mmanager');
    }

    public function index() {
        if ($this->session->userdata('YOY_ID_ROL') == ADMINISTRADOR || $this->session->userdata('YOY_ID_ROL') == ADMINISTRATIVO) {
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

    public function store() {
        $this->load->view('esqueleton/header');
        $data['products'] = $this->msite->get_all_valid_products_to_store();
        $this->load->view('store', $data);
        $this->load->view('esqueleton/footer');
    }
    
    public function sales($param) {
        $this->load->view('esqueleton/header');
        $data['product'] = $this->mmanager->get_product_by_id($param);
        $data['ROW_SHIPS'] = $this->mmanager->get_all_valid_ships();
        $this->load->view('sales', $data);
        $this->load->view('esqueleton/footer');
    }

    public function contact() {

        $data['logo1'] = base_url() . "assets/images/logo.png";
        $data['logo2'] = base_url() . "assets/images/logo2.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('contacto');
        $this->load->view('esqueleton/footer');
    }

}
