<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Manager_clients extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mmanager');
        $this->load->model('mmanager_clients');
        $this->load->helper('general');
    }


    public function clients() {
        if ($this->session->userdata('YOY_ID_ROL') != ADMINISTRADOR) redirect('manager/index');

        $data['users'] = $this->mmanager_clients->get_all_valid_clients();

        $this->load->view('esqueleton/header_manager', getActive("classUser"));
        $this->load->view('Manager/clients/v_clients_manager', $data);
        $this->load->view('esqueleton/footer_manager');
    }


    public function form_config_add_client() {
        if ($this->session->userdata('YOY_ID_ROL') != ADMINISTRADOR) redirect('manager/index');

        $data['roles'] = $this->mmanager->get_all_valid_autoridades();

        $this->load->view('esqueleton/header_manager', getActive("classUser"));
        $this->load->view('Manager/clients/v_add_client', $data);
        $this->load->view('esqueleton/footer_manager');
    }


    public function form_config_edit_client($id) {
        if ($this->session->userdata('YOY_ID_ROL') != ADMINISTRADOR) redirect('manager/index');
        if (($id <= 0) || ($id == NUlL)) redirect('manager_clients/clients');

        $data = array(
            'user' => $this->mmanager_clients->get_client_by_id($id),
            'roles' => $this->mmanager->get_all_valid_autoridades()
        );

        if (!$data['user'] || !$data['roles']) redirect('manager_users/users');

        $this->load->view('esqueleton/header_manager', getActive("classEnt"));
        $this->load->view('Manager/clients/v_edit_client', $data);
        $this->load->view('esqueleton/footer_manager');
    }


    public function ajax_add_client() {
        if (!$this->input->is_ajax_request() || ($this->session->userdata('YOY_ID_ROL') != ADMINISTRADOR)) 
            redirect('manager/index');

        $data = array(
            'ID_ROL' => trim($this->input->post("RG_ID_ROL")),
            'NOMBRE_USUARIO' => trim($this->input->post("RG_NOMBRE_USUARIO")),
            'APELLIDO_USUARIO' => trim($this->input->post("RG_APELLIDOS_USUARIO")),
            'TELEFONO_USUARIO' => trim($this->input->post("RG_TELEFONO_USUARIO")),
            'EMAIL_USUARIO' => strtolower(trim($this->input->post('RG_EMAIL_USUARIO'))),
            'PASSWD_USUARIO' => $this->encryption->encrypt(trim($this->input->post("RG_PASSWORD_USUARIO"))),
            'VIGENCIA_USUARIO' => VIGENTE
        );

        if ($this->mmanager_clients->add_new_client_on_db($data)) echo 1;
        else echo 0;
    }


    public function ajax_edit_client() {
        if (!$this->input->is_ajax_request() || ($this->session->userdata('YOY_ID_ROL') != ADMINISTRADOR)) 
            redirect('manager/index');

        $user = array(
            'ID_ROL' => trim($this->input->post("RG_ID_ROL")),
            'NOMBRE_USUARIO' => trim($this->input->post("RG_NOMBRE_USUARIO")),
            'APELLIDO_USUARIO' => trim($this->input->post("RG_APELLIDO_USUARIO")),
            'TELEFONO_USUARIO' => trim($this->input->post("RG_TELEFONO_USUARIO")),
            'EMAIL_USUARIO' => strtolower(trim($this->input->post("RG_EMAIL_USUARIO"))),
            'PASSWD_USUARIO' => $this->encryption->encrypt(trim($this->input->post("RG_PASSWORD_USUARIO")))
        );
        
        $id = trim($this->input->post("RG_ID_USUARIO"));

        if ($this->mmanager_clients->edit_client_on_db($user, $id)) echo 1;
        else echo 0;
    }


    public function ajax_disable_client() {
        if (!$this->input->is_ajax_request() || ($this->session->userdata('YOY_ID_ROL') != ADMINISTRADOR)) 
            redirect('manager/index');

        if ($this->mmanager_clients->disable_client_on_db($this->input->post("ID_USUARIO"))) echo 1;
        else echo 0;
    }
}
