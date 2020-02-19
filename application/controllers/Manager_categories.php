<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manager_categories extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mmanager_categories');
        $this->load->helper('general');
    }
    
    public function categories() {
        if ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR)) redirect('login/salir');

        $data['categories'] = $this->mmanager_categories->get_all_valid_categories();

        $this->load->view('esqueleton/header_manager', getActive("classPro"));
        $this->load->view('Manager/categories/v_index_category', $data);
        $this->load->view('esqueleton/footer_manager');
    }
    
    public function form_add_categories() {
        if ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR)) redirect('login/salir');

        $this->load->view('esqueleton/header_manager', getActive("classPro"));
        $this->load->view('Manager/categories/v_add_category');
        $this->load->view('esqueleton/footer_manager');
    }

    public function form_edit_categories($id) {
        if ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR)) redirect('login/salir');
        if (($id <= 0) || ($id == NUlL)) redirect('manager_categories/categories');

        $data['category'] = $this->mmanager_categories->getCategory($id);

        $this->load->view('esqueleton/header_manager', getActive("classPro"));
        $this->load->view('Manager/categories/v_edit_category', $data);
        $this->load->view('esqueleton/footer_manager');

    }

    public function ajax_add_categories() {
        if ((!$this->input->is_ajax_request()) ||
            ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR))) 
            redirect('login/salir');

        $category = array('NOMBRE_CATEGORIA' => trim($this->input->post("RG_NOMBRE_CATEGORIA")));

        if ($this->mmanager_categories->addCategory($category))echo 1;
        else echo 0;
    }

    public function ajax_edit_categories() {
        if ((!$this->input->is_ajax_request()) ||
            ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR))) 
            redirect('login/salir');

        $category = array('NOMBRE_CATEGORIA' => trim($this->input->post("RG_NOMBRE_CATEGORIA")));
        $id = trim($this->input->post("RG_ID_CATEGORIA"));

        if ($this->mmanager_categories->updateCategory($category, $id))echo 1;
        else echo 0;
    }

    function ajax_disable_categories() {
        if ((!$this->input->is_ajax_request()) ||
            ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR))) 
            redirect('login/salir');

        if ($this->mmanager_categories->disableCategory($this->input->post('ID_CATEGORY'))) echo 1;
        else echo 0;
    }
}