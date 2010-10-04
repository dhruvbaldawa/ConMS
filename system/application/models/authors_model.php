<?php
    class Authors_model extends Model{
        function Authors_model(){
            parent::Model();
            $this->_table = 'authors';
            $this->_paper_table = 'papers';
            $this->_user_table = 'users' ;
        }

        function list_authors(){
            $query = $this->db->query("SELECT * FROM ".$this->_user_table." WHERE id IN (SELECT id FROM ".$this->_table.")");
            return $query->result_array();
        }

        function get_details($id){
            $query = $this->db->get_where($this->_user_table,array('id'=>$id));
            return $query->row_array();
        }

        function get_papers($data){
            $CI =& get_instance();
            $CI->load->model('papers_model');
            return $CI->paper_model->get_details($data) ;
        }

        function get_payment_details($data){
            $CI =& get_instance();
            $CI->load->model('payments_model');
            return $CI->payments_model->get_details($data);
        }

        function create($data){
            $this->db->insert($this->_table,$data);
        }

        function update($data,$where){
            $this->db->update($this->_table,$data,$where);
        }

        function add_paper($data){
            $this->db->insert('author_paper',$data);
        }

        function add_payment($data){
            $this->db->insert('payments',$data);
        }
	
	function delete($data){
	    $this->db->delete($this->_table, array('id' => $data)); 
	}
    }
	
/* End of file authors_model.php */
/* Location: ./system/application/models/authors_model.php */