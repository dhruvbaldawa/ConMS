<?php
    class Authors_model extends Model{
        function Authors_model(){
            parent::Model();
            $this->_table = 'authors';
            $this->_paper_table = 'papers';
        }

        function get_details($id){
            $query = $this->db->get_where($this->_table,array('id'=>$id));
            return $query->row_array();
        }

        function get_papers($data){
            $this->load->model('papers_model');
            return $this->paper_model->get_details($data) ;
        }

        function get_payment_details($data){
            $this->load->model('payments_model');
            return $this->payments_model->get_details($data); 
        }

        function create($data){
            $this->db->insert($this->_table,$data);
        }

        function update($data,$where){
            $this->db->update($this->_table,$data,$where);
        }

    }
/* End of file authors_model.php */
/* Location: ./system/application/models/authors_model.php */