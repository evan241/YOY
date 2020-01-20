<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Manager_News extends CI_Controller {

        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('mmanager_news');
        }

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

        public function ajax_add_news() {
            if (!$this->input->is_ajax_request() || ($this->session->userdata('YOY_ID_ROL') != ADMINISTRADOR)) 
                redirect('manager/index');

                $newsContent = $_POST['Content'];
                $newsContent = str_replace('contenteditable="true"', '', $newsContent);

                if ($this->mmanager_news->add_news($newsContent)) echo '1';
                    else echo '0';
        }
    }
?>