<?php
	class track_model extends Model{
		$table='tracks';
		function track_model(){
			parent::Model();
		}
		
        	function get_details($id){
            		$query = $this->db->get_where($this->_table,array('id'=>$id));
            		return ($query->row_array();)
		}

		funtion get_papers($id){
		$CI =& get_instance();
                $CI->load->model('Paper_model');
		$CI->Paper_model->Paper_status(array('track_id'=$id));
                $this->_Paper_model = $CI->Paper_model;
		}

	}

?>