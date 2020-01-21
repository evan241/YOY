<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manager extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mmanager_categories');
        $this->load->helper('general');
    }
    
    public function categorias() {
        if (!empty($this->session->userdata('ALMACEN_ID_USUARIO'))) {
            $data['classIni'] = '';
            $data['classPro'] = 'class="dropdown active"';
            $data['classEnt'] = '';
            $data['classSal'] = '';
            $data['classRep'] = '';
            $data['classCnf'] = '';
            $this->load->view('esqueleton/header', $data);
            $data['ROW_CATEGORIES'] = $this->mproductos->get_all_valid_categories();
            //$data['cart'] = array();
            $this->load->view('Productos/v_categorias', $data);
            $this->load->view('esqueleton/footer');
        } else {
            redirect('login/salir');
        }
    }
    
    public function form_add_category() {
        if (!empty($this->session->userdata('ALMACEN_ID_USUARIO'))) {
            $data['classIni'] = '';
            $data['classPro'] = 'class="dropdown active"';
            $data['classEnt'] = '';
            $data['classSal'] = '';
            $data['classRep'] = '';
            $data['classCnf'] = '';
            $this->load->view('esqueleton/header', $data);
            $this->load->view('Productos/v_add_categoria');
            $this->load->view('esqueleton/footer');
        } else {
            redirect('login/salir');
        }
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
    
    public function form_edit_category($PARAM) {

        if (!empty($this->session->userdata('ALMACEN_ID_USUARIO'))) {
            $ID_CATEGORIA = intval($PARAM);
            if ($ID_CATEGORIA > NULO) {
                $ROW_CATEGORIA = $this->mproductos->get_category_by_id($ID_CATEGORIA);
                if (count($ROW_CATEGORIA) > NULO) {
                    //CARGAR LA VISTA..
                    $data['classIni'] = '';
                    $data['classPro'] = 'class="dropdown active"';
                    $data['classEnt'] = '';
                    $data['classSal'] = '';
                    $data['classRep'] = '';
                    $data['classCnf'] = '';
                    $this->load->view('esqueleton/header', $data);
                    $data['ROW_DATA_CATEGORY'] = $ROW_CATEGORIA;
                    $this->load->view('Productos/v_edit_categoria', $data);
                    $this->load->view('esqueleton/footer');
                } else {
                    redirect('productos/categorias');
                }
            } else {
                redirect('productos/categorias');
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
