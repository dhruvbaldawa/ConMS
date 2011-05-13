<?php

class Review_model extends Model {

    function __construct() {
        parent::__construct();
        $this->_table = 'reviewer';
        $this->_table2='reviewer_paper'
        $CI = &get_instance();
        $CI->load->model('papers_model');
        $CI->load->model('authors_model');
    }

    /*
     * $data contains :
     * author_id : author's id
     * paper_id : paper's id
     * payment_type : type of payment (cheque,dd,cash,money transfer,other)
     * amount : the amount
     * details : the payment details
     */

    function add_reviewer_details($data) {
        if(!$this->db->insert($this->_table,$data)){
            return false;
        }
        $record = $this->db->get_where($this->_table,$data)->row_array();
        if(!empty($record)){
            return $record;
        }
        else{
            return false;
        }
    }

    function list_reviewer_details(){
        $rows = $this->db->get($this->_table)->result_array();
        if(!empty($rows)){
            return $rows;
        }else{
            return false;
        }
    }

    function get_reviewer_details($where){
        $rows = $this->db->get_where($this->_table)->result_array();
        if(!empty($rows)){
            return $rows;
        }else{
            return false;
        }
    }

    function_assign_reviewer_paper($data)
    {
        $rows = $this->db->get_where('$this->_table2',array()->result_array();
        if(!empty($rows)){
            return $rows;
        }else{
            return false;
        }

    }

    



}

/* End of file payment_model.php */
/* Location: ./system/application/models/payment_model.php */