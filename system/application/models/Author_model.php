<?php

	class Author_model extends Model{
		$table='author';
		function Author_model(){
			parent::Model();
		}

		function create($data){
			$this->db->insert($table, $data); 
		}
	
		function get($data){
			$query=$this->db->get_where($table,$data);
			if($query->num_rows==0)
				return FALSE;
			
			else
				return ($query->result() as $row);
		}

		
		
?>