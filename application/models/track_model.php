<?php
class Track_model extends Model {
	function __construct() {
		parent :: __construct();
        $this->_table = 'tracks';
	}
    function list_tracks(){
        $data = $this->db->query("SELECT id,name,mne FROM ".$this->_table)->result_array();
        $returnData = array();
        $i = 0;
        foreach($data as $line){
            $temp = $this->db->query("SELECT COUNT(*) AS count FROM paper WHERE tracks_id = '".$line['id']."'")->row_array();
            $returnData[$i]['count'] = $temp['count'];
            $returnData[$i]['id'] = $line['id'];
            $returnData[$i]['name'] = $line['name'].' ('.$line['mne'].')';
            $i++;
        }
        return $returnData;
    }

	function get_details($id) {
		$query = $this->db->get_where($this->_table, array('id' => $id));
		return $query->row_array();
	}

}
/* End of file track_model.php */
/* Location: ./system/application/models/track_model.php */