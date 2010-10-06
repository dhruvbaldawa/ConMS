<?php

	class Papers_model extends Model{
		function Papers_model(){
			parent::Model();
	        $this->_table = 'paper';
            $this->_author_paper_table = 'author_paper';
            $this->_user_table = 'users';
		}

		function create($data){
			$this->db->insert($this->_table, $data);
		}

		function get_paper_details($data){
			$query =$this->db->get_where($this->_table,$data);
			if($query->num_rows==0)
			{	echo('Nothing to retrieve');
				return FALSE;
			}
			else
				return $query->result_array();
		}


		function get_reg_status($data){
			$this->db->select('Paper_status');
			$query=$this->db->where($this->_table,$data);
			return $query->result_array();
		}


		function payment_status($data){
                $CI =& get_instance();
                $CI->load->model('payment_model');
		        $query=$CI->payment_model->payment_status($data);
		return $query->result_array();
		}


		function get_track($data){
			$this->db->select('track');
			$query=$this->db->where($this->_table,$data);
			return $query->result_array();
		}


		function update($data,$where){
            	$this->db->update($this->_table,$data,$where);
 	        }

		function get_author($data){

            $CI =& get_instance();
            $CI->load->model('authors_model');
	    	$query=$CI->authors_model->get_details($data);
		    return $query->result_array();
		}
		
		function delete($id){
		    $this->db->delete($this->_table, array('id' => $id));
		}

        function list_papers(){
            $query = $this->db->get($this->_table);
            $results = $query->result_array();
            for($i=0;$i<sizeof($results);$i++){
                $temp = $this->db->query("SELECT id,name FROM ".$this->_user_table." WHERE id IN (SELECT authors_id FROM ".$this->_author_paper_table." WHERE paper_id = ".$results[$i]['id'].")");
                $results[$i]['authors'] = $temp->result_array();

                $temp = $this->db->query("SELECT name FROM ".$this->_user_table." WHERE id = ".$results[$i]['chairperson_id']);
                $results[$i]['chairperson'] = $temp->row_array();

                $temp = $this->db->query("SELECT name FROM tracks WHERE id = ".$results[$i]['tracks_id']);
                $results[$i]['track'] = $temp->row_array();

            }
            return $results;
        }

	}
?>