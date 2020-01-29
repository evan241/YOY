<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Manager_shipments extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('mmanager_sales');
        $this->load->model('mmanager_clients');
        $this->load->model('mpaypal');
        $this->load->helper('general');
    }

}
