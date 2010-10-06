<?php
	class Track_model extends Model{
		$this->_table='tracks';
		function track_model(){
			parent::Model();
		}

		 function list_tracks(){
            		 $query = $this->db->query("SELECT * FROM ".$this->_table);
            		 return $query->result_array();
        		}

        		function get_details($id){
            		$query = $this->db->get_where($this->_table,array('id'=>$id));
            		return ($query->row_array();)
		}

		funtion get_papers($id){
		$CI =& get_instance();
                	$CI->load->model('paper_model');
		$query=$CI->paper_model->paper_status(array('track_id'=$id));
                	$this->paper_model = $CI->paper_model;
		return $query->row_array();
		}

	}

?>