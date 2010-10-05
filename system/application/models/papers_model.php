<?php

	class Papers_model extends Model{
		function Paper_model(){
			parent::Model();
	        $this->_table = 'paper';
            $this->_author_paper_table = 'author_paper';
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
            foreach($results as $result){
                $temp = $this->db->get($this->_author_paper_table,array('paper_id'=>$result['id']));
                $result['authors'] = $temp->result_array();
            }
            return $results;
        }

	}
?>