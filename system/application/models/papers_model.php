<?php

	class Papers_model extends Model{
		$table='paper'
		function Paper_model(){
			parent::Model();
		}

		function create($data){
			$this->db->insert($table, $data);
		}
	
		function get_paper_details($data){
			$query=$this->db->get_where($table,$data);
			if($query->num_rows==0)
			{	echo('Nothing to retrieve');
				return FALSE;
			}
			else
				return $query->result_array();
		}
		

		function get_reg_status($data){
			$this->db->select('Paper_status');
			$query=$this->db->where($table,$data);
			return $query->result_array();
		}
		
		
		function payment_status($data){
                $CI =& get_instance();
                $CI->load->model('payment_model');
		$query=$CI->Payment_model->payment_status($data);
                $this->_Payment_model = $CI->Payment_model;
		return $query->result_array();
		}			


		function get_track($data){
			$this->db->select('track');
			$query=$this->db->where($table,$data);
			return $query->result_array();
		}		
		
					
		function update($data,$where){
            	$this->db->update($this->_table,$data,$where);
 	        }

		function get_author($data){
	
                $CI =& get_instance();
                $CI->load->model('authors_model');
		$query=$CI->authors_model->get_details($data);
                $this->_authors_model = $CI->authors_model;
		return $query->result_array();
		}
		
		function delete($id){
		$this->db->delete($table, array('id' => $id)); 
		}

	}
?>