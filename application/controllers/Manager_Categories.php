<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manager_Categories extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mmanager_categories');
        $this->load->helper('general');
    }
    
    public function categories() {
        if ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR)) redirect('login/salir');

        $data['ROW_CATEGORIES'] = $this->mmanager_categories->get_all_valid_categories();

        $this->load->view('esqueleton/header', getActive("classPro"));
        $this->load->view('Manager/categories/v_index_category', $data);
        $this->load->view('esqueleton/footer');
    }
    
    public function form_add_categories() {
        if ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR)) redirect('login/salir');

        $this->load->view('esqueleton/header', getActive("classPro"));
        $this->load->view('Manager/categories/v_add_category');
        $this->load->view('esqueleton/footer');
    }

    public function form_edit_categories($id) {
        if ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR)) redirect('login/salir');
        if ($id <= 0) redirect('manager_categories/categories');

        $ROW_CATEGORIA = $this->mproductos->get_category_by_id($ID_CATEGORIA);

        $this->load->view('esqueleton/header', getActive("classPro"));
        $this->load->view('Manager/categories/v_edit_category', $data);
        $this->load->view('esqueleton/footer');

    }

    public function ajax_add_category() {
        if ($this->input->is_ajax_request()) {
            if (!empty($this->session->userdata('ALMACEN_ID_USUARIO'))) {

                $data['NOMBRE_CATEGORIA'] = trim($this->input->post("RG_NOMBRE_CATEGORIA"));

                $ID_CATEGORIA = $this->mproductos->add_new_category_on_db($data);
                if ($ID_CATEGORIA > NULO) {
                    echo $ID_CATEGORIA;
                } else {
                    echo -1;
                }
            } else {
                //operacion no permitida..
                redirect('login/salir');
            }
        } else {
            redirect('login/salir');
        }
    }



    public function ajax_edit_category() {
        if ($this->input->is_ajax_request()) {
            if (!empty($this->session->userdata('ALMACEN_ID_USUARIO'))) {

                $id_categoria = $this->input->post("RG_ID_CATEGORIA");
                $data['NOMBRE_CATEGORIA'] = trim($this->input->post("RG_NOMBRE_CATEGORIA"));

                $AFFECTED_ROWS = $this->mproductos->edit_category_on_db($data, $id_categoria);
                if ($AFFECTED_ROWS > NULO) {
                    echo $AFFECTED_ROWS;
                } else {
                    echo -1;
                }
            } else {
                redirect('login/salir');
            }
        } else {
            show_404();
        }
    }

    function ajax_disable_category() {
        if ($this->input->is_ajax_request()) {
            if (!empty($this->session->userdata('ALMACEN_ID_USUARIO'))) {
                $ID_CATEGORIA = $this->input->post('ID_CATEGORIA');
                $AFFECTED_ROWS = $this->mproductos->disable_category_on_db($ID_CATEGORIA);
                echo $AFFECTED_ROWS;
            } else {
                redirect('login/salir');
            }
        } else {
            show_404();
        }
    }

}
