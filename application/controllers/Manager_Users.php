<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Manager_Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mmanager');
        $this->load->model('mmanager_users');
        $this->load->helper('general');
    }


    public function index() {
        if ($this->session->userdata('YOY_ID_ROL') != ADMINISTRADOR) redirect('login/salir');

        $this->load->view('esqueleton/header_manager', getActive("classIni"));
        $this->load->view('Manager/v_index_manager');
        $this->load->view('esqueleton/footer_manager');
    }
    

    public function users() {
        if ($this->session->userdata('YOY_ID_ROL') != ADMINISTRADOR) redirect('login/salir');

        $data['ROW_USERS'] = $this->mmanager_users->get_all_valid_users();

        $this->load->view('esqueleton/header_manager', getActive("classUser"));
        $this->load->view('Manager/v_users_manager', $data);
        $this->load->view('esqueleton/footer_manager');
    }


    public function form_config_add_user() {
        if ($this->session->userdata('YOY_ID_ROL') != ADMINISTRADOR) redirect('login/salir');

        $data['ROW_ROLES'] = $this->mmanager->get_all_valid_autoridades();

        $this->load->view('esqueleton/header_manager', getActive("classUser"));
        $this->load->view('Manager/v_add_user', $data);
        $this->load->view('esqueleton/footer_manager');
    }


    public function form_config_edit_user($id) {
        if ($this->session->userdata('YOY_ID_ROL') != ADMINISTRADOR) redirect('login/salir');
        if ($id <= 0) redirect('manager_users/users');

        $user = $this->mmanager_users->get_user_by_id($id);
        $roles = $this->mmanager->get_all_valid_autoridades();
        
        if (!$user || !$roles) redirect('manager_users/users');

        $this->load->view('esqueleton/header_manager', getActive("classEnt"));
        $this->load->view('Manager/v_edit_user', $user, $roles);
        $this->load->view('esqueleton/footer_manager');
    }


    public function ajax_add_user() {
        if (!$this->input->is_ajax_request() || ($this->session->userdata('YOY_ID_ROL') != ADMINISTRADOR)) 
            redirect('login/salir');

        $data = array(
            'ID_ROL' => trim($this->input->post("RG_ID_ROL")),
            'NOMBRE_USUARIO' => trim($this->input->post("RG_NOMBRE_USUARIO")),
            'APELLIDO_USUARIO' => trim($this->input->post("RG_APELLIDOS_USUARIO")),
            'USERNAME_USUARIO' => trim($this->input->post('RG_USERNAME_USUARIO')),
            'PASSWD_USUARIO' => trim($this->input->post("RG_PASSWORD_USUARIO")),
            'VIGENCIA_USUARIO' => VIGENTE
        );
        if ($this->mmanager_users->add_new_user_on_db($data)) echo 1;
        else echo 0;
    }


    public function ajax_edit_user() {
        if (!$this->input->is_ajax_request() || ($this->session->userdata('YOY_ID_ROL') != ADMINISTRADOR)) 
            redirect('login/salir');

        $user = array(
            'ID_USUARIO' => trim($this->input->post("RG_ID_USUARIO")),
            'ID_ROL' => trim($this->input->post("RG_ID_ROL")),
            'NOMBRE_USUARIO' => trim($this->input->post("RG_NOMBRE_USUARIO")),
            'APELLIDO_USUARIO' => trim($this->input->post("RG_APELLIDO_USUARIO")),
            'TELEFONO_USUARIO' => trim($this->input->post("RG_TELEFONO_USUARIO"))
            'EMAIL_USUARIO' => strtolower(trim($this->input->post("RG_EMAIL_USUARIO")))
            'PASSWD_USUARIO' => trim($this->input->post("RG_PASSWORD_USUARIO"))
        );
        // REFACTORIZE THE MODEL
        if ($this->mmanager_users->edit_user_on_db($user)) echo 1;
        else echo 0;
    }


    public function ajax_disable_user() {
        if (!$this->input->is_ajax_request() || ($this->session->userdata('YOY_ID_ROL') != ADMINISTRADOR)) 
            redirect('login/salir');

        if ($this->mmanager->disable_user_on_db($this->input->post("RG_ID_USUARIO"))) echo 1;
        else echo 0;
    }
}
