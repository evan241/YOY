<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Mmanager_news extends CI_Model {
    
        
        public function __construct()
        {
            parent::__construct();
            //Do your magic here
        }
        
        public function get_all_news() {
            $this->db->select('*');
            $this->db->join('usuario', 'news.AUTOR = usuario.ID_USUARIO');
            
            $this->db->from('news');
            $query = $this->db->get();
            
            return $query->result_array();
        }
    
        public function add_news($data) {
            $this->db->insert('news', $data);
            return $this->db->affected_rows();
        }
    }
    
    /* End of file ModelName.php */
    
?>