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

        $this->load->view('esqueleton/header', getActive("classPro"));
        $this->load->view('Manager/products/v_edit_producto', $data);
        $this->load->view('esqueleton/footer');
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
            'ACTIVO_PRODUCTO' => VIGENTE,
            'VIGENCIA_PRODUCTO' => VIGENTE,
            'STOCK_MINIMO_PRODUCTO' => $this->input->post("RG_STOCK_MINIMO_PRODUCTO"),
            'IMAGEN_PRODUCTO' => 'EMPTY'
        );

        if ($this->mmanager_products->saveProduct($data)) echo 1;
        else echo 0;
    }


    public function ajax_edit_products() {
        if ($this->input->is_ajax_request()) {
            if (!empty($this->session->userdata('ALMACEN_ID_USUARIO'))) {

                $id_producto = $this->input->post("RG_ID_PRODUCTO");
                $data['ID_CATEGORIA'] = $this->input->post("RG_ID_CATEGORIA");
                $data['ID_ALMACEN'] = $this->input->post("RG_ID_ALMACEN");
                $data['CODIGO_PRODUCTO'] = trim($this->input->post("RG_CODIGO_PRODUCTO"));
                $data['NOMBRE_PRODUCTO'] = trim($this->input->post("RG_NOMBRE_PRODUCTO"));
                $data['DESCRIPCION_PRODUCTO'] = trim($this->input->post("RG_DESCRIPCION_PRODUCTO"));
                $data['COSTO_PRODUCTO'] = $this->input->post("RG_COSTO_PRODUCTO");
                $data['STOCK_PRODUCTO'] = $this->input->post("RG_STOCK_PRODUCTO");
                $data['PRESTAMO_PRODUCTO'] = $this->input->post("RG_PRESTAMO_PRODUCTO");
                $data['CONSUMO_PRODUCTO'] = $this->input->post("RG_CONSUMO_PRODUCTO");
                $data['CODIGO_PRODUCTO_SECUNDARIO'] = trim($this->input->post("RG_CODIGO_PRODUCTO_SECUNDARIO"));
                $data['STOCK_MINIMO_PRODUCTO'] = $this->input->post("RG_STOCK_MINIMO_PRODUCTO");


                $AFFECTED_ROWS = $this->mproductos->edit_product_on_db($data, $id_producto);
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

    function ajax_disable_products() {
        if ($this->input->is_ajax_request()) {
            if (!empty($this->session->userdata('ALMACEN_ID_USUARIO'))) {
                $ID_PRODUCTO = $this->input->post('ID_PRODUCTO');
                $AFFECTED_ROWS = $this->mproductos->disable_product_on_db($ID_PRODUCTO);
                echo $AFFECTED_ROWS;
            } else {
                redirect('login/salir');
            }
        } else {
            show_404();
        }
    }
}
