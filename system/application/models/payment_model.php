<?php

	class Payment_model extends Model{
		$table='payment';
		function Payment_model(){
			parent::Model();
		}

		function make_payment($data)
		{
			$query=$this->db->get_where($table,$data);
			if($query->num_rows>0)
			{
				echo('Payment already made');
				reurn FALSE;
			}
			else
			{
				$this->db->insert($table,$data);
				return TRUE;
			}
		}
	
		function get_payment($data)
		{
			$query=$this->db->get_where($table,$data);
			if($query->num_rows()==0)
				return FALSE;
			else
				return ($query->result() as $row);
		}
		
		function findrem($data)
		{
			$query=$this->db->get_where($table,$data);
			return ($query->result() as $row);
		}

		function payment_status($data){
			$this->db->select('Payment_status');
			$query=$this->db->where($table,$data);
			return ($query->result() as $row);
		}
		
	        function update($data,$where){
		         $this->db->update($this->_table,$data,$where);
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


?>
		
