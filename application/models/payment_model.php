<?php
	class Payment_model extends Model{
   		function __construct(){
			parent::__construct();
            $this->_payments_table='payment';
		}

		function make_payment($data)
		{
			$query=$this->db->get_where($this->_payments_table,array('id' => $data));
			if($query->num_rows>0)
			{
				echo('Payment already made');
			    	return FALSE;
			}
			else
			{
				$this->db->insert($this->_payments_table,array('id' => $data));
				return TRUE;
			}
		}

		function get_payment($data)
		{
			$query=$this->db->get_where($this->_payments_table,array('id' => $data));
			if($query->num_rows()==0)
				return FALSE;
			else
			    {
                    $row=$query->result();
                    return ($row);
                }
		}

		function findrem($data)
		{
			$query=$this->db->get_where($this->_payments_table,array('id' => $data));
            $row=$query->result();
                    return ($row);
		}

		function payment_status($data){
			$this->db->select('Payment_status');
			$query=$this->db->where($this->_payments_table,array('id' => $data));
			$row=$query->result();
                    return ($row);
		}

	        function update($data,$where){
		         $this->db->update($this->_payments_table,array('id' => $data),$where);
        	}

		function author_details($data){
                $CI =& get_instance();
                $CI->load->model('authors_model');
		$CI->authors_model->get_details($data);
                $this->_authors_model = $CI->authors_model;
		}

		function paper_details($data){
                $CI =& get_instance();
                $CI->load->model('Paper_model');
		$query=$CI->Paper_model->get($data);
                $this->_Paper_model = $CI->Paper_model;
		return $query->row_array();
		}
	}
/* End of file payment_model.php */
/* Location: ./system/application/models/payment_model.php */