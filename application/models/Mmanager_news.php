<?php
    
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

        public function get_news_by_id($id) {
            $this->db->select('*');
            $this->db->from('news');
            $this->db->where('ID', $id);
            $data = $this->db->get();
            
            return $data->result_array();
        }

        public function edit_news($data, $id) {
            $this->db->update('news', $data);
            $this->db->where('ID', $id);
            
            return $this->db->affected_rows();
        }

        public function delete_news($IDs) {
            $this->db->where_in('ID', $IDs);
            $this->db->delete('news');
            
            return $this->db->affected_rows();
        }
    }
    