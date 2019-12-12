<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manager extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /* if ($this->session->userdata('sesionAdmin')) {
          redirect('administracion');
          } */
        $this->load->model('mmanager');
        //$this->load->helper('functions');
    }

    public function index() {
        if (!empty($this->session->userdata('YOY_ID_USUARIO')) && ($this->session->userdata('YOY_ID_ROL') == ADMINISTRADOR || $this->session->userdata('YOY_ID_ROL') == ADMINISTRATIVO)) {
            $data['classIni'] = 'class="dropdown active"';
            $data['classPro'] = '';
            $data['classSal'] = '';
            $data['classUser'] = '';
            $data['classCustom'] = '';
            $data['classCnf'] = '';

            $this->load->view('esqueleton/header_manager', $data);
            $this->load->view('Manager/v_index_manager');
            $this->load->view('esqueleton/footer_manager');
        } else {
            redirect('login/salir');
        }
    }
    
    //Products
    public function products() {
        if (!empty($this->session->userdata('YOY_ID_USUARIO')) && ($this->session->userdata('YOY_ID_ROL') == ADMINISTRADOR || $this->session->userdata('YOY_ID_ROL') == ADMINISTRATIVO)) {
            $data['classIni'] = '';
            $data['classPro'] = 'class="dropdown active"';
            $data['classSal'] = '';
            $data['classUser'] = '';
            $data['classCustom'] = '';
            $data['classCnf'] = '';
            $this->load->view('esqueleton/header_manager', $data);
            $data['ROW_PRODUCTOS'] = $this->mmanager->get_all_valid_products();
            $this->load->view('Manager/v_index_producto', $data);
            $this->load->view('esqueleton/footer_manager');
        } else {
            redirect('login/salir');
        }
    }

    public function form_add_product() {
        if (!empty($this->session->userdata('YOY_ID_USUARIO')) && ($this->session->userdata('YOY_ID_ROL') == ADMINISTRADOR || $this->session->userdata('YOY_ID_ROL') == ADMINISTRATIVO)) {
            $data['classIni'] = '';
            $data['classPro'] = 'class="dropdown active"';
            $data['classSal'] = '';
            $data['classUser'] = '';
            $data['classCustom'] = '';
            $data['classCnf'] = '';
            $this->load->view('esqueleton/header_manager', $data);
            $data['ROW_CATEGORIES'] = $this->mmanager->get_all_valid_categories();
            //$data['ROW_ALMACEN'] = $this->mproductos->get_all_valid_almacenes();
            $this->load->view('Manager/v_add_producto', $data);
            $this->load->view('esqueleton/footer_manager');
        } else {
            redirect('login/salir');
        }
    }

    public function ajax_add_product() {
        if ($this->input->is_ajax_request()) {
            if (!empty($this->session->userdata('ALMACEN_ID_USUARIO'))) {

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

    public function form_edit_product($PARAM) {

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

    public function ajax_edit_product() {
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

    function ajax_disable_product() {
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
    
    //Sales
    public function sales() {
        if (!empty($this->session->userdata('YOY_ID_USUARIO')) && $this->session->userdata('YOY_ID_ROL') == ADMINISTRADOR) {
            $data['classIni'] = '';
            $data['classPro'] = '';
            $data['classSal'] = 'class="dropdown active"';
            $data['classUser'] = '';
            $data['classCustom'] = '';
            $data['classCnf'] = '';
            $this->load->view('esqueleton/header_manager', $data);
            $data['ROW_SALES'] = $this->mmanager->get_all_sales();
            $this->load->view('Manager/v_index_venta', $data);
            $this->load->view('esqueleton/footer_manager');
        } else {
            redirect('login/salir');
        }
    }
    
    //Users
    public function users() {
        if ($this->session->userdata('YOY_ID_ROL') == ADMINISTRADOR) {
            $data['classIni'] = '';
            $data['classPro'] = '';
            $data['classSal'] = '';
            $data['classUser'] = 'class="dropdown active"';
            $data['classCustom'] = '';
            $data['classCnf'] = '';

            $this->load->view('esqueleton/header_manager', $data);
            $DATA['ROW_USERS'] = $this->mmanager->get_all_valid_users();
            $this->load->view('Manager/v_users_manager', $DATA);
            $this->load->view('esqueleton/footer_manager');
            
        } else {
            redirect('login/salir');
        }
    }

    public function form_config_add_user() {
        if ($this->session->userdata('YOY_ID_ROL') == ADMINISTRADOR) {
            $data['classIni'] = '';
            $data['classPro'] = '';
            $data['classSal'] = '';
            $data['classUser'] = 'class="dropdown active"';
            $data['classCustom'] = '';
            $data['classCnf'] = '';

            $this->load->view('esqueleton/header_manager', $data);
            $data['ROW_ROLES'] = $this->mmanager->get_all_valid_autoridades();
            $this->load->view('Manager/v_add_user', $data);
            $this->load->view('esqueleton/footer_manager');
        } else {
            redirect('login/salir');
        }
    }

    public function ajax_add_user() {
        if ($this->input->is_ajax_request()) {
            if ($this->session->userdata('YOY_ID_ROL') == ADMINISTRADOR) {

                $data['NOMBRE_USUARIO'] = $this->input->post("RG_NOMBRE_USUARIO");
                $data['APELLIDO_USUARIO'] = $this->input->post("RG_APELLIDOS_USUARIO");
                $data['ID_ROL'] = $this->input->post("RG_ID_ROL");
                $data['USERNAME_USUARIO'] = $this->input->post('RG_USERNAME_USUARIO');
                $data['PASSWD_USUARIO'] = $this->input->post("RG_PASSWORD_USUARIO");
                $data['VIGENCIA_USUARIO'] = VIGENTE;

                $ID_USER = $this->mmanager->add_new_user_on_db($data);
                if ($ID_USER > NULO) {
                    echo $ID_USER;
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

    public function form_config_edit_user($PARAM) {
        if ($this->session->userdata('YOY_ID_ROL') == ADMINISTRADOR) {
            $data['classIni'] = '';
            $data['classPro'] = '';
            $data['classEnt'] = 'class="dropdown active"';
            $data['classSal'] = '';
            $data['classRep'] = '';
            $data['classCnf'] = '';


            $ID_USER = intval($PARAM);
            if ($ID_USER > NULO) {
                $ROW_USER = $this->mmanager->get_user_by_id($ID_USER);
                if (count($ROW_USER) > NULO) {
                    $this->load->view('esqueleton/header_manager', $data);
                    $data['ROW_DATA_USER'] = $ROW_USER;
                    $data['ROW_ROLES'] = $this->mmanager->get_all_valid_autoridades();
                    $this->load->view('Manager/v_edit_user', $data);
                    $this->load->view('esqueleton/footer_manager');
                } else {
                    redirect('manager/index');
                }
            } else {
                redirect('manager/index');
            }
        } else {
            redirect('login/salir');
        }
    }

    public function ajax_edit_user() {
        if ($this->input->is_ajax_request()) {
            if ($this->session->userdata('YOY_ID_ROL') == ADMINISTRADOR) {


                $ID = $this->input->post("RG_ID_USUARIO");
                $data['NOMBRE_USUARIO'] = $this->input->post("RG_NOMBRE_USUARIO");
                $data['APELLIDO_USUARIO'] = $this->input->post("RG_APELLIDO_USUARIO");
                $data['ID_ROL'] = $this->input->post("RG_ID_ROL");
                $data['USERNAME_USUARIO'] = $this->input->post("RG_USERNAME_USUARIO");
                $data['PASSWD_USUARIO'] = $this->input->post("RG_PASSWORD_USUARIO");

                $AFFECTED_ROWS = $this->mmanager->edit_user_on_db($data, $ID);
                if ($AFFECTED_ROWS > NULO) {
                    if (!empty($this->input->post('RG_UPDATE_MY_PROFILE'))) {
                        echo 'OkProfile';
                    } else {
                        echo $AFFECTED_ROWS;
                    }
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

    public function ajax_delete_user() {
        if ($this->input->is_ajax_request() && !empty($this->session->userdata('ROLLINGO_ID_USUARIO')) && $this->session->userdata('ROLLINGO_ID_ROL') == ADMINISTRADOR) {
            $datos = $this->mconfig->delete_user_on_db($this->input->post('ID_USUARIO'));
            if ($datos > NULO) {
                echo $datos;
            } else {
                echo -1;
            }
        } else {
            redirect('login/salir');
        }
    }

    public function ajax_disable_user() {
        if ($this->session->userdata('YOY_ID_ROL') == ADMINISTRADOR) {
            $datos = $this->mmanager->disable_user_on_db($this->input->post('ID_USUARIO'));
            if ($datos > NULO) {
                echo $datos;
            } else {
                echo -1;
            }
        } else {
            redirect('login/salir');
        }
    }

    public function events() {
        if (!empty($this->session->userdata('ROLLINGO_ID_USUARIO')) && $this->session->userdata('ROLLINGO_ID_ROL') == ADMINISTRADOR) {
            $this->load->view('esqueleton/header');
            $DATA['ROW_EVENTS'] = $this->mmanager->get_all_valid_events();
            $this->load->view('Manager/v_events_manager', $DATA);
            $this->load->view('esqueleton/footer');
        } else {
            redirect('login/salir');
        }
    }

    public function form_add_event() {
        if (!empty($this->session->userdata('ROLLINGO_ID_USUARIO')) && $this->session->userdata('ROLLINGO_ID_ROL') == ADMINISTRADOR) {
            $this->load->view('esqueleton/header');
            //$DATA['ROW_EVENTS'] = $this->mmanager->get_all_valid_events();
            $this->load->view('Manager/v_add_event');
            $this->load->view('esqueleton/footer');
        } else {
            redirect('login/salir');
        }
    }

    public function ajax_add_event() {
        if (!empty($this->session->userdata('ROLLINGO_ID_USUARIO')) && $this->session->userdata('ROLLINGO_ID_ROL') == ADMINISTRADOR) {
            //var_dump($_FILES);
            //var_dump($_POST);
            if (strlen(trim($_FILES['DIRECCION_IMAGEN_EVENTO']['name'])) > NULO) {
                $EVENTOS = $this->mmanager->get_all_events();
                $NUM = count($EVENTOS) + 1;
                $tmpNombreDir = $NUM . '_IMAGE' . '/';
                // var_dump(is_dir(PATH_TO_UPLOAD_FILES . '/' . $tmpNombreDir));
                if (!is_dir('eventos' . '/' . $tmpNombreDir))
                    mkdir('eventos/' . $tmpNombreDir);

                $config['upload_path'] = './' . 'eventos' . '/' . $tmpNombreDir;
                $config['allowed_types'] = '*';
                $config['max_size'] = '4000000';
                $config['max_width'] = '2024';
                $config['max_height'] = '2008';
                $this->load->library('upload', $config);
                $img = "DIRECCION_IMAGEN_EVENTO";
                if (!$this->upload->do_upload($img)) {
                    $error = $this->upload->display_errors();
                    //var_dump($error);
                    echo -2; //no se pudo adjuntar la imagen...
                    // uploading failed. $error will holds the errors.
                } else {
                    $data = $this->upload->data();
                    $data_aux['DIRECCION_IMAGEN_EVENTO'] = $tmpNombreDir . $data['file_name'];
                    //$data_aux['TIPO_DOCUMENTO'] = $_FILES['userfile']['type'];
                    $data_aux['NOMBRE_IMAGEN_EVENTO'] = $this->input->post('RG_NOMBRE_IMAGEN_EVENTO');
                    $data_aux['FECHA_EVENTO_IMAGEN_EVENTO'] = convierte_fecha_valida_db($this->input->post('FECHA_EVENTO_IMAGEN_EVENTO'));
                    $data_aux['COSTO_EVENTO_IMAGEN_EVENTO'] = $this->input->post('COSTO_EVENTO_IMAGEN_EVENTO');
                    $INSERT_EVENT = $this->mmanager->add_event_on_db($data_aux);
                    // var_dump($INSERT_FILE_CLIENT);
                    echo $INSERT_EVENT;

                    // uploading successfull, now do your further actions
                }
                //} else {
                //  echo -3; //directorio no se pudo crear..
                // }
            } else {
                var_dump('No');
            }
        } else {
            redirect('login/salir');
        }
    }

    public function form_edit_event($PARAM) {
        if (!empty($this->session->userdata('ROLLINGO_ID_USUARIO')) && $this->session->userdata('ROLLINGO_ID_ROL') == ADMINISTRADOR) {
            $ID_EVENT = intval($PARAM);
            if ($ID_EVENT > NULO) {
                $this->load->view('esqueleton/header');
                $DATA['ROW_EVENT'] = $this->mmanager->get_event_by_id($ID_EVENT);
                $this->load->view('Manager/v_edit_event', $DATA);
                $this->load->view('esqueleton/footer');
            } else {
                redirect('manager/events');
            }
        } else {
            redirect('login/salir');
        }
    }

    public function ajax_edit_event() {
        if ($this->input->is_ajax_request()) {
            if (!empty($this->session->userdata('ROLLINGO_ID_USUARIO')) && $this->session->userdata('ROLLINGO_ID_ROL') == ADMINISTRADOR) {


                $data['ID_IMAGEN_EVENTO'] = $this->input->post("RG_ID_IMAGEN_EVENTO");
                $data['NOMBRE_IMAGEN_EVENTO'] = $this->input->post("RG_NOMBRE_IMAGEN_EVENTO");
                $data['FECHA_EVENTO_IMAGEN_EVENTO'] = $this->input->post("FECHA_EVENTO_IMAGEN_EVENTO");
                $data['COSTO_EVENTO_IMAGEN_EVENTO'] = $this->input->post("COSTO_EVENTO_IMAGEN_EVENTO");

                $AFFECTED_ROWS = $this->mmanager->edit_event_on_db($data);
                if ($AFFECTED_ROWS > NULO) {
                    if (!empty($this->input->post('RG_UPDATE_MY_PROFILE'))) {
                        echo 'OkProfile';
                    } else {
                        echo $AFFECTED_ROWS;
                    }
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

    public function ajax_disable_event() {
        if ($this->input->is_ajax_request() && !empty($this->session->userdata('ROLLINGO_ID_USUARIO')) && $this->session->userdata('ROLLINGO_ID_ROL') == ADMINISTRADOR) {
            $datos = $this->mmanager->disable_event_on_db($this->input->post('ID_EVENT'));
            if ($datos > NULO) {
                echo $datos;
            } else {
                echo -1;
            }
        } else {
            redirect('login/salir');
        }
    }

    public function ajax_desactive_event() {
        if ($this->input->is_ajax_request() && !empty($this->session->userdata('ROLLINGO_ID_USUARIO')) && $this->session->userdata('ROLLINGO_ID_ROL') == ADMINISTRADOR) {
            $datos = $this->mmanager->desactive_event_on_db($this->input->post('ID_EVENT'));
            if ($datos > NULO) {
                echo $datos;
            } else {
                echo -1;
            }
        } else {
            redirect('login/salir');
        }
    }

    public function ajax_active_event() {
        if ($this->input->is_ajax_request() && !empty($this->session->userdata('ROLLINGO_ID_USUARIO')) && $this->session->userdata('ROLLINGO_ID_ROL') == ADMINISTRADOR) {
            $datos = $this->mmanager->active_event_on_db($this->input->post('ID_EVENT'));
            if ($datos > NULO) {
                echo $datos;
            } else {
                echo -1;
            }
        } else {
            redirect('login/salir');
        }
    }

    public function news() {
        if (!empty($this->session->userdata('ROLLINGO_ID_USUARIO')) && $this->session->userdata('ROLLINGO_ID_ROL') == ADMINISTRADOR) {
            $this->load->view('esqueleton/header');
            $DATA['ROW_NEWS'] = $this->mmanager->get_all_valid_news();
            $this->load->view('Manager/v_manager_news', $DATA);
            $this->load->view('esqueleton/footer');
        } else {
            redirect('login/salir');
        }
    }

    public function ajax_get_news() {
        
    }

    public function form_add_new() {
        if (!empty($this->session->userdata('ROLLINGO_ID_USUARIO')) && $this->session->userdata('ROLLINGO_ID_ROL') == ADMINISTRADOR) {
            $this->load->view('esqueleton/header');
            //$DATA['ROW_EVENTS'] = $this->mmanager->get_all_valid_events();
            $this->load->view('Manager/v_add_new');
            $this->load->view('esqueleton/footer');
        } else {
            redirect('login/salir');
        }
    }

    public function ajax_add_new() {
        if (!empty($this->session->userdata('ROLLINGO_ID_USUARIO')) && $this->session->userdata('ROLLINGO_ID_ROL') == ADMINISTRADOR) {

            $data_aux['TITULO_NOTICIA'] = $this->input->post('TITULO_NOTICIA');
            $data_aux['TAGS'] = $this->input->post('TAGS');
            $data_aux['TEXTO_NOTICIA'] = $this->input->post('TEXTO_NOTICIA');
            $INSERT_EVENT = $this->mmanager->add_new_on_db($data_aux);
            echo $INSERT_EVENT;

            // uploading successfull, now do your further actions
        } else {
            redirect('login/salir');
        }
    }

    public function ajax_disable_new() {
        if ($this->input->is_ajax_request() && !empty($this->session->userdata('ROLLINGO_ID_USUARIO')) && $this->session->userdata('ROLLINGO_ID_ROL') == ADMINISTRADOR) {
            $datos = $this->mmanager->disable_new_on_db($this->input->post('ID_NOTICIA'));
            if ($datos > NULO) {
                echo $datos;
            } else {
                echo -1;
            }
        } else {
            redirect('login/salir');
        }
    }

    public function form_edit_new($PARAM) {

        if (!empty($this->session->userdata('ROLLINGO_ID_USUARIO')) && $this->session->userdata('ROLLINGO_ID_ROL') == ADMINISTRADOR) {
            $ID_NOTICIA = intval($PARAM);
            if ($ID_NOTICIA > NULO) {
                $ROW_USER = $this->mmanager->get_new_by_id($ID_NOTICIA);

                if (count($ROW_USER) > NULO) {
                    $this->load->view('esqueleton/header');
                    $data['ROW_DATA_NEW'] = $ROW_USER;
                    //$data['ROW_NEWS'] = $this->mmanager->get_all_valid_autoridades();
                    $this->load->view('Manager/v_edit_new', $data);
                    $this->load->view('esqueleton/footer');
                } else {
                    redirect('manager/index');
                }
            } else {
                redirect('manager/index');
            }
        } else {
            redirect('login/salir');
        }
    }

    public function ajax_edit_new() {
        if ($this->input->is_ajax_request()) {
            if (!empty($this->session->userdata('ROLLINGO_ID_USUARIO'))) {

                $data['ID_NOTICIA'] = $this->input->post("ID_NOTICIA");
                //$data['DIRECCION_IMAGEN_NOTICIA'] = $this->input->post("DIRECCION_IMAGEN_NOTICIA");
                $data['TITULO_NOTICIA'] = $this->input->post("TITULO_NOTICIA");
                $data['TAGS'] = $this->input->post("TAGS");
                $data['TEXTO_NOTICIA'] = $this->input->post("TEXTO_NOTICIA");
                $AFFECTED_ROWS = $this->mmanager->edit_new_on_db($data);
                if ($AFFECTED_ROWS > NULO) {
                    echo $AFFECTED_ROWS;
                } else {
                    echo -1;
                }
            } else {
                //operacion no permitida..
                redirect('login/salir');
            }
        } else {
            show_404();
        }
    }

}
