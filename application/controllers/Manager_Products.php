<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manager_Products extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mmanager_categories');
        $this->load->model('mmanager_products');
        $this->load->helper('general');
    }

    
    public function products() {
        if ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR)) redirect('login/salir');

        $data['products'] = $this->mmanager_products->get_all_valid_products();

        $this->load->view('esqueleton/header_manager', getActive("classPro"));
        $this->load->view('Manager/products/v_index_producto', $data);
        $this->load->view('esqueleton/footer_manager');
    }

    public function form_add_products() {
        if ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR)) redirect('login/salir');

        $data['categories'] = $this->mmanager_categories->get_all_valid_categories();

        $this->load->view('esqueleton/header_manager', getActive("classPro"));
        $this->load->view('Manager/products/v_add_producto', $data);
        $this->load->view('esqueleton/footer_manager');

    }

    public function form_edit_products($id) {
        if ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR)) redirect('login/salir');
        if ($id <= 0) redirect('manager_products/products');

        $data = array(
            'product' => $this->mmanager_products->get_product_by_id($id),
            'categories' => $this->mmanager_categories->get_all_valid_categories()
        );

        if (!$data['product'] || !$data['categories']) redirect('manager_products/products');

        $this->load->view('esqueleton/header_manager', getActive("classPro"));
        $this->load->view('Manager/products/v_edit_producto', $data);
        $this->load->view('esqueleton/footer_manager');
    }

    public function ajax_add_products() {
        if ((!$this->input->is_ajax_request()) ||
            ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR))) 
            redirect('login/salir');

        $data = array(
            'ID_CATEGORIA' => $this->input->post("RG_ID_CATEGORIA"),
            'CODIGO_PRODUCTO' => $this->input->post("RG_CODIGO_PRODUCTO"),
            'NOMBRE_PRODUCTO' => trim($this->input->post("RG_NOMBRE_PRODUCTO")),
            'DESCRIPCION_PRODUCTO' => trim($this->input->post("RG_DESCRIPCION_PRODUCTO")),
            'COSTO_PRODUCTO' => $this->input->post("RG_COSTO_PRODUCTO"),
            'PRECIO_PRODUCTO' => $this->input->post("RG_PRECIO_PRODUCTO"),
            'STOCK_PRODUCTO' => $this->input->post("RG_STOCK_PRODUCTO"),
            'ACTIVO_PRODUCTO' => $this->input->post("RG_ACTIVO_PRODUCTO"),
            'VIGENCIA_PRODUCTO' => VIGENTE,
            'STOCK_MINIMO_PRODUCTO' => $this->input->post("RG_STOCK_MINIMO_PRODUCTO"),
            'IMAGEN_PRODUCTO' => 'EMPTY'
        );

        if ($this->mmanager_products->saveProduct($data)) echo 1;
        else echo 0;
    }


    public function ajax_edit_products() {
        if ((!$this->input->is_ajax_request()) ||
            ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR))) 
            redirect('login/salir');

        $data = array(
            'ID_CATEGORIA' => $this->input->post("RG_ID_CATEGORIA"),
            'CODIGO_PRODUCTO' => $this->input->post("RG_CODIGO_PRODUCTO"),
            'NOMBRE_PRODUCTO' => trim($this->input->post("RG_NOMBRE_PRODUCTO")),
            'DESCRIPCION_PRODUCTO' => trim($this->input->post("RG_DESCRIPCION_PRODUCTO")),
            'COSTO_PRODUCTO' => $this->input->post("RG_COSTO_PRODUCTO"),
            'PRECIO_PRODUCTO' => $this->input->post("RG_PRECIO_PRODUCTO"),
            'STOCK_PRODUCTO' => $this->input->post("RG_STOCK_PRODUCTO"),
            'STOCK_MINIMO_PRODUCTO' => $this->input->post("RG_STOCK_MINIMO_PRODUCTO"),
            'IMAGEN_PRODUCTO' => 'EMPTY'
        );

        $id = trim($this->input->post("RG_ID_PRODUCTO"));

        if ($this->mmanager_products->updateProduct($data, $id)) echo 1;
        else echo 0;
    }

    function ajax_disable_products() {
        if ((!$this->input->is_ajax_request()) ||
            ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR))) 
            redirect('login/salir');

        if ($this->mmanager_products->disableProduct($this->input->post('ID_PRODUCT'))) echo 1;
        else echo 0;
    }
}
