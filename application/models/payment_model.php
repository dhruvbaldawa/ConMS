<?php

class Payment_model extends Model {

    function __construct() {
        parent::__construct();
        $this->_table = 'payments';
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

    function add_payment_details($data) {
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

    function list_payment_details(){
        $rows = $this->db->get($this->_table)->result_array();
        if(!empty($rows)){
            return $rows;
        }else{
            return false;
        }
    }

    function get_payment_details($where){
        $rows = $this->db->get_where($this->_table)->result_array();
        if(!empty($rows)){
            return $rows;
        }else{
            return false;
        }
    }

}

/* End of file payment_model.php */
/* Location: ./system/application/models/payment_model.php */