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
            $data['classNews'] = '';
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
}
