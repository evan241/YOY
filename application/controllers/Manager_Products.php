<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manager_Products extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mmanager');
        $this->load->helper('general');
    }

    
    public function products() {
        if ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR)) redirect('login/salir');
            
            $data['ROW_PRODUCTOS'] = $this->mmanager->get_all_valid_products();

            $this->load->view('esqueleton/header_manager', getActive("classPro"));
            $this->load->view('Manager/v_index_producto', $data);
            $this->load->view('esqueleton/footer_manager');
    }

    public function form_add_products() {
        if ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR)) redirect('login/salir');

            $data['ROW_CATEGORIES'] = $this->mmanager->get_all_valid_categories();

            $this->load->view('esqueleton/header_manager', getActive("classPro"));
            $this->load->view('Manager/v_add_producto', $data);
            $this->load->view('esqueleton/footer_manager');
       
    }

    public function ajax_add_products() {
        if ((!$this->input->is_ajax_request()) ||
            ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR))) 
            redirect('login/salir');

                $data['ID_CATEGORIA'] = $this->input->post("RG_ID_CATEGORIA");
                $data['ID_ALMACEN'] = $this->input->post("RG_ID_ALMACEN");
                $data['CODIGO_PRODUCTO'] = trim($this->input->post("RG_CODIGO_PRODUCTO"));
                $data['CODIGO_PRODUCTO_SECUNDARIO'] = trim($this->input->post("RG_CODIGO_PRODUCTO_SECUNDARIO"));
                $data['NOMBRE_PRODUCTO'] = trim($this->input->post("RG_NOMBRE_PRODUCTO"));
                $data['DESCRIPCION_PRODUCTO'] = trim($this->input->post("RG_DESCRIPCION_PRODUCTO"));
                $data['COSTO_PRODUCTO'] = $this->input->post("RG_COSTO_PRODUCTO");
                $data['STOCK_PRODUCTO'] = $this->input->post("RG_STOCK_PRODUCTO");
                $data['STOCK_MINIMO_PRODUCTO'] = $this->input->post("RG_STOCK_MINIMO_PRODUCTO");
                $data['PRESTAMO_PRODUCTO'] = $this->input->post("RG_PRESTAMO_PRODUCTO");
                $data['CONSUMO_PRODUCTO'] = $this->input->post("RG_CONSUMO_PRODUCTO");
                                
                $ID_PRODUCTO = $this->mproductos->add_new_product_on_db($data);
                if ($ID_PRODUCTO > NULO) {
                    echo $ID_PRODUCTO;
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

    public function form_edit_products($PARAM) {

        if (!empty($this->session->userdata('ALMACEN_ID_USUARIO'))) {
            $ID_PRODUCTO = intval($PARAM);
            if ($ID_PRODUCTO > NULO) {
                $ROW_PRODUCTO = $this->mproductos->get_product_by_id($ID_PRODUCTO);
                if (count($ROW_PRODUCTO) > NULO) {
                    //CARGAR LA VISTA..
                    $data['classIni'] = '';
                    $data['classPro'] = 'class="dropdown active"';
                    $data['classEnt'] = '';
                    $data['classSal'] = '';
                    $data['classRep'] = '';
                    $data['classCnf'] = '';
                    $this->load->view('esqueleton/header', $data);
                    
                    $data['ROW_DATA_PRODUCT'] = $ROW_PRODUCTO;
                    $data['ROW_DATA_CATEGORIES'] = $this->mproductos->get_all_valid_categories();
                    $data['ROW_DATA_ALMACEN'] = $this->mproductos->get_all_valid_almacenes();
                    $this->load->view('Productos/v_edit_productos', $data);
                    $this->load->view('esqueleton/footer');
                } else {
                    redirect('productos/index');
                }
            } else {
                redirect('productos/index');
            }
        } else {
            redirect('login/salir');
        }
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
