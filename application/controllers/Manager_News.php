<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manager_News extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('mmanager_news');
        $this->load->helper('general');
    }

    public function news() {
        if ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR)) redirect('login/salir');

        $data['ROWS'] = $this->mmanager_news->get_all_news();

        $this->load->view('esqueleton/header_manager', getActive("classNews"));
        $this->load->view('Manager/News/v_manager_news', $data);
        $this->load->view('esqueleton/footer_manager');
    }

    public function add_news() {
        if ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR)) redirect('login/salir');

        $this->load->view('esqueleton/header_manager', getActive("classNews"));
        $this->load->view('Manager/News/v_manager_add_new');
        $this->load->view('esqueleton/footer_manager');
    }

    public function edit_news($id) {
        if ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR)) redirect('login/salir');
        if (($id <= 0) || ($id == NUlL)) redirect('manager_news/news');

        $data['ROWS'] = $this->mmanager_news->get_news_by_id($id);

        $this->load->view('esqueleton/header_manager');
        $this->load->view('Manager/News/v_manager_edit_new', $data);
        $this->load->view('esqueleton/footer_manager');
    }

    public function ajax_add_news() {
        if (!$this->input->is_ajax_request() || ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR)))
            redirect('login/salir');

        if ($this->mmanager_news->add_news($_POST['Content'])) echo '1';
        else echo '0';
    }

        // Funcion para editar una noticia existente en la base de datos mediante el metodo ajax
    public function ajax_edit_news() {
        if (!$this->input->is_ajax_request() || ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR)))
            redirect('login/salir');

        if ($this->mmanager_news->edit_news($_POST['Content'], $_POST['ID'])) echo '1';
        else echo '0';
    }

        // Funcion para eliminar noticias de la base de datos mediante el metodo ajax
    public function ajax_delete_news() {
        if (!$this->input->is_ajax_request() || ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR)))
            redirect('login/salir');

        if ($this->mmanager_news->delete_news(explode(',', $_POST['IDs']))) echo 1;
        else echo 0;
    }

        // Funcion para agregar imagenes a las noticias
    public function ajax_add_image_news() {
        if (!$this->input->is_ajax_request() || ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR)))
            redirect('login/salir');

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
        if (!$this->input->is_ajax_request() || ($this->session->userdata('YOY_ID_ROL') != (ADMINISTRADOR || VENDEDOR)))
            redirect('login/salir');

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