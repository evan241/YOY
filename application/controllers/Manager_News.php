<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Manager_News extends CI_Controller {


        // Constructor
        public function __construct(){
            parent::__construct();

            $this->load->model('mmanager_news');
        }

        // funcion que trae la vista principal de la seccion news
        public function news() {
            if (!empty($this->session->userdata('YOY_ID_USUARIO')) && ($this->session->userdata('YOY_ID_ROL') == ADMINISTRADOR || $this->session->userdata('YOY_ID_ROL') == ADMINISTRATIVO)) {
                $data['classIni'] = '';
                $data['classPro'] = '';
                $data['classSal'] = '';
                $data['classNews'] = 'class="dropdown active"';
                $data['classUser'] = '';
                $data['classCustom'] = '';
                $data['classCnf'] = '';

                $data['ROWS'] = $this->mmanager_news->get_all_news();


                $this->load->view('esqueleton/header_manager', $data);
                $this->load->view('Manager/News/v_manager_news', $data['ROWS']);
                $this->load->view('esqueleton/footer_manager');
            } else {
                redirect('login/salir');
            }
        }

        // funcion que trae la vista para añadir una noticia
        public function add_news() {
            if (!empty($this->session->userdata('YOY_ID_USUARIO')) && ($this->session->userdata('YOY_ID_ROL') == ADMINISTRADOR || $this->session->userdata('YOY_ID_ROL') == ADMINISTRATIVO)) {
                $data['classIni'] = '';
                $data['classPro'] = '';
                $data['classSal'] = '';
                $data['classNews'] = 'class="dropdown active"';
                $data['classUser'] = '';
                $data['classCustom'] = '';
                $data['classCnf'] = '';

                $this->load->view('esqueleton/header_manager', $data);
                $this->load->view('Manager/News/v_manager_add_new');
                $this->load->view('esqueleton/footer_manager');
            } else {
                redirect('login/salir');
            }
        }

        // funcion para subir una noticia a la base de datos mediante ajax
        public function ajax_add_news() {
            if (!$this->input->is_ajax_request() || ($this->session->userdata('YOY_ID_ROL') != ADMINISTRADOR))
                redirect('manager/index');

                $newsContent = $_POST['Content'];

                if ($this->mmanager_news->add_news($newsContent)) echo '1';
                    else echo '0';
        }

        // Funcion que devuelve la vista para editar una noticia existente
        public function edit_news($id = null) {
            if (!empty($this->session->userdata('YOY_ID_USUARIO')) && ($this->session->userdata('YOY_ID_ROL') == ADMINISTRADOR || $this->session->userdata('YOY_ID_ROL') == ADMINISTRATIVO)) {

                $newsId = $id;
                $data['ROWS'] = $this->mmanager_news->get_news_by_id($newsId);

                $this->load->view('esqueleton/header_manager');
                $this->load->view('Manager/News/v_manager_edit_new', $data);
                $this->load->view('esqueleton/footer_manager');
            }
        }

        // Funcion para editar una noticia existente en la base de datos mediante el metodo ajax
        public function ajax_edit_news() {
            if (!$this->input->is_ajax_request() || ($this->session->userdata('YOY_ID_ROL') != ADMINISTRADOR))
                redirect('manager/index');

                $newsContent = $_POST['Content'];
                $newsID = $_POST['ID'];

                if ($this->mmanager_news->edit_news($newsContent, $newsID)) echo '1';
                    else echo '0';
        }

        // Funcion para eliminar noticias de la base de datos mediante el metodo ajax
        public function ajax_delete_news() {
            if (!$this->input->is_ajax_request() || ($this->session->userdata('YOY_ID_ROL') != ADMINISTRADOR))
                redirect('manager/index');

                $IDs = $_POST['IDs'];
                $IDsArray = explode(',', $IDs);

                if ($this->mmanager_news->delete_news($IDsArray)) {
                    echo 1;
                } else {
                    echo 0;
                }
        }

        // Funcion para agregar imagenes a las noticias
        public function ajax_add_image_news() {
            if (!$this->input->is_ajax_request() || ($this->session->userdata('YOY_ID_ROL') != ADMINISTRADOR))
                redirect('manager/index');

                if (($_FILES["image"]["type"] == "image/pjpeg")
                    || ($_FILES["image"]["type"] == "image/jpeg")
                    || ($_FILES["image"]["type"] == "image/jpg")
                    || ($_FILES["image"]["type"] == "image/png")
                    || ($_FILES["image"]["type"] == "image/gif")) {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/YOY/assets/img/news/".$_FILES['image']['name'])) {
                        //more code here...
                        echo base_url() . 'assets/img/news/'. $_FILES['image']['name'];
                    } else {
                        echo '1';
                    }
                } else {
                    echo '0';
                }
        }

        // Funcion para agregar videos a las noticias
        public function ajax_add_video_news() {
            if (!$this->input->is_ajax_request() || ($this->session->userdata('YOY_ID_ROL') != ADMINISTRADOR))
                redirect('manager/index');

                if (($_FILES["video"]["type"] == "video/mpeg")
                    || ($_FILES["video"]["type"] == "video/mp4")
                    || ($_FILES["video"]["type"] == "video/3gp")
                    || ($_FILES["video"]["type"] == "video/avi")) {
                    if (move_uploaded_file($_FILES["video"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/YOY/assets/video/news/".$_FILES['video']['name'])) {
                        //more code here...
                        echo base_url() . 'assets/video/news/'. $_FILES['video']['name'];
                    } else {
                        echo '1';
                    }
                } else {
                    echo '0';
                }
        }
    }
?>