<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mmanager_news');
        $this->load->model('Mmanager_sales');
    }

    public function index() {
        $var = $this->Mmanager_sales->get_sale_by_id(13);
        foreach ($var as $key => $val) {
        print_r($key . " = " . $val);
        echo "<br>";

        }

        // if ($this->session->userdata('YOY_ID_ROL') == ADMINISTRADOR) {
        //     redirect('manager/index');
        // } else {
        //     $this->load->view('esqueleton/header');
        //     $this->load->view('index');
        //     $this->load->view('esqueleton/footer');
        // }    
    }

    public function salir() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function work() {
        $this->load->view('esqueleton/header');
        $this->load->view('work');
        $this->load->view('esqueleton/footer');
    }

    public function about() {
        $this->load->view('esqueleton/header');
        $this->load->view('about');
        $this->load->view('esqueleton/footer');
    }

    public function contact() {

        $data['logo1'] = base_url() . "assets/images/logo.png";
        $data['logo2'] = base_url() . "assets/images/logo2.png";

        $this->load->view('esqueleton/header', $data);
        $this->load->view('contact/v_index_contact');
        $this->load->view('esqueleton/footer');
    }

    public function news($id = NULL) {
        $data['ROWS'] = $this->Mmanager_news->get_all_news();
        $data['ID'] = $id;

        $this->load->view('esqueleton/header', $data);

        if (!isset($id)) {
            $this->load->view('News/v_news', $data['ROWS']);
        } else {
            $this->load->view('News/v_id_news', $data['ROWS']);
        }

        $this->load->view('esqueleton/footer');
    }

    public function send_mail() {

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'tls://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'erick.evangelista87@gmail.com',
            'smtp_pass' => 'EdyXellE2011',
            'wordwrap' => true
        );
        $data = array(
            'Nombre' => $this->input->post("nombre"),
            'Telefono' => $this->input->post("telefono"),
            'Email' => $this->input->post("e-mail"),
            'Mensaje' => $this->input->post("mensaje")
        );

        //load email library
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        //set email information and content
        $this->email->from('erick.evangelista87@gmail.com', 'Administración');
        $this->email->to('gilbertomunizs@hotmail.com');
        $this->email->subject('YOY CONTACT');
         $this->email->message($this->load->view('contact/emailContact', $data, true));
           

        $this->email->set_mailtype('html');

        $this->email->send();

        echo true;
        
    }

}

defined('BASEPATH') OR exit('No direct script access allowed');

class Controllername extends CI_Controller {

    public function index() {
        
    }

}

/* End of file Controllername.php */
