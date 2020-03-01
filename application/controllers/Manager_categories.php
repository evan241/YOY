<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, DELETE, PUT, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manager_categories extends CI_Controller {

    private $rol;

    public function __construct() {
        parent::__construct();
        $this->rol = $this->session->userdata('YOY_ID_ROL');
        $this->load->model('mmanager_categories');
        $this->load->helper('general');
        $this->load->helper('api');
    }
    
    public function categories() {
        if (!$this->isAuthorized()) redirect('login/salir');

        // $curl = curl_init(CATEGORY);

        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        //   'Content-Type: application/json'
        // ));

        // $response = json_decode(curl_exec($curl), true);
        // echo curl_error($curl);
        // curl_close($curl);
        // print_r($response);

        $data['categories'] = api_get(CATEGORY);

        $this->load->view('esqueleton/header_manager', getActive("classPro"));
        $this->load->view('Manager/categories/v_index_category', $data);
        $this->load->view('esqueleton/footer_manager');
    }
    
    public function form_add_categories() {
        if (!$this->isAuthorized()) redirect('login/salir');

        $this->load->view('esqueleton/header_manager', getActive("classPro"));
        $this->load->view('Manager/categories/v_add_category');
        $this->load->view('esqueleton/footer_manager');
    }

    public function form_edit_categories($id) {
        if (!$this->isAuthorized()) redirect('login/salir');
        if (($id <= 0) || ($id == NUlL)) redirect('manager_categories/categories');

        $data['category'] = api_get_id(CATEGORY, $id);

        $this->load->view('esqueleton/header_manager', getActive("classPro"));
        $this->load->view('Manager/categories/v_edit_category', $data);
        $this->load->view('esqueleton/footer_manager');

    }

    public function ajax_add_categories() {
        if (!$this->input->is_ajax_request() || !$this->isAuthorized()) redirect('login/salir');

        $category = ["name" => trim($this->input->post("name"))];
        echo api_post(CATEGORY, $category);
    }

    public function ajax_edit_categories() {
        if (!$this->input->is_ajax_request() || !$this->isAuthorized()) redirect('login/salir');

        $data = array(
            'id' => $this->input->post("id"),
            'name' => trim($this->input->post("name"))
        );
        echo api_put(CATEGORY, $data);
    }

    function ajax_disable_categories() {
        if (!$this->input->is_ajax_request() || !$this->isAuthorized()) redirect('login/salir');

        $id = $this->input->post('ID_CATEGORY');
        echo api_delete(CATEGORY, $id);
    }

    private function isAuthorized() {
        return $this->rol == (ADMINISTRADOR || VENDEDOR);
    }
}