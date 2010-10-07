<?php
	class Track_model extends Model{
		$this->_table='tracks';
		$this->_user_table='users';
		$this->_paper_table='paper';
		function track_model(){
			parent::Model();
		}

		 function list_tracks(){
            		 $query = $this->db->query("SELECT tracks.id,tracks.name,tracks.managers_id,users.name 		FROM"._table,_user_table."WHERE tracks.id=users.id");
		 $results = $query->result_array();
            		  for($i=0;$i<sizeof($results);$i++){
$temp = $this->db->query("SELECT count(`id`) from"._paper_table." where tracks_id=".results[$i]['id']);
$results[$i]['papercount'] = $temp->result_array();
           		 }	
            		 return $results;
        		}

        		function get_details($id){
            		$query = $this->db->get_where($this->_table,array('id'=>$id));
            		return $query->row_array();
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