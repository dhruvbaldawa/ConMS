<?php

	class Paper extends Model{
	
		function Paper(){
			parent::Model();
		}

		function create($data){
			$this->db->insert('Paper', $data); 
		}
	
		function get($data){
			$query=$this->db->get_where('Paper',$data);
			if($query->num_rows==0)
			{	echo('Nothing to retrieve');
				return FALSE;
			}
			else
				return $query;
		}
		

		function get_reg_status($data){
			$this->db->select('Paper_status');
			return ($this->db->where('Paper',$data));
		}
		
		function payment_status($data){
			$this->db->select('Payment_status');
			return ($this->db->where('Paper',$data));
		}

		function get_track($data){
			$this->db->select('track');
			return ($this->db->where('Paper',$data));
		}		
		
					

	}