<?php
class Papers_model extends Model {
	function Papers_model() {
		parent :: Model();
		$this->load->model('auth_model');
		$this->_table = 'paper';
		$this->_author_paper_table = 'author_paper';
		$this->_user_table = 'users';
	}
	function get_paper_details($data) {
		$query = $this->db->get_where($this->_table, array('id' => $data));
		$results = $query->row_array();
		$temp = $this->db->query("SELECT id,name FROM " . $this->_user_table . " WHERE id IN (SELECT authors_id FROM " . $this->_author_paper_table . " WHERE paper_id = " . $results['id'] . ")");
		$results['authors'] = ($temp->num_rows > 0) ? $temp->result_array() : "Not Assigned";
		if ($results['chairperson_id']) {
			$temp = $this->db->query("SELECT name FROM " . $this->_user_table . " WHERE id = " . $results['chairperson_id']);
			$results['chairperson'] = $temp->row_array();
		}
		else {
			$results['chairperson']['name'] = "Not Assigned";
		}
		if (isset ($results['tracks_id'])) {
			$temp = $this->db->query("SELECT name FROM tracks WHERE id = " . $results['tracks_id']);
			$results['track'] = ($temp->num_rows > 0) ? $temp->row_array() : "Not Assigned";
		}
		else {
			$results['track']['name'] = 'Not Assigned';
		}
		return $results;
	}
	function get_reg_status($data) {
		$this->db->select('Paper_status');
		$query = $this->db->where($this->_table, $data);
		return $query->result_array();
	}
	function payment_status($data) {
		$CI = & get_instance();
		$CI->load->model('payment_model');
		$query = $CI->payment_model->payment_status($data);
		return $query->result_array();
	}
	function get_track($data) {
		$this->db->select('track');
		$query = $this->db->where($this->_table, $data);
		return $query->result_array();
	}
	function update($data) {
		$this->db->delete($this->_author_paper_table, array('paper_id' => $data['id']));
		if (isset ($data['authors_id'][0])) {
			foreach ($data['authors_id'] as $author) {
				if (!$this->db->query("REPLACE INTO " . $this->_author_paper_table . " VALUES (" . $author . "," . $data['id'] . ")")) {
					return false;
				}
			}
		}
		unset ($data['authors_id']);
		if ($this->db->update($this->_table, $data, array('id' => $data['id']))) {
			return true;
		}
		else {
			return false;
		}
	}
	function create($data) {
		$authors = $data['authors_id'];
		unset ($data['authors_id']);
		if (!$this->db->insert($this->_table, $data))
			return false;
		$record = $this->db->get_where($this->_table, $data)->row_array();
		$id = $record['id'];
		unset ($record);
		if (isset ($authors[0])) {
			foreach ($authors as $author) {
				if (!$this->db->query("REPLACE INTO " . $this->_author_paper_table . " VALUES (" . $author . "," . $id . ")")) {
					return false;
				}
			}
		}
		return true;
	}
	function get_author($data) {
		$CI = & get_instance();
		$CI->load->model('authors_model');
		$query = $CI->authors_model->get_details($data);
		return $query->result_array();
	}
	function delete($id) {
		$this->db->delete($this->_table, array('id' => $id));
	}
	function list_papers() {
		$query;
		$results;
		if ($this->auth_model->is_admin()) {
			$query = $this->db->get($this->_table);
			$results = $query->result_array();
		}
		else if($this->auth_model->is_manager()) {
			$managerid = $this->auth_model->get_user();
			$query = $this->db->query("select * from paper where tracks_id in (select id from tracks where managers_id=" . $managerid . ")");
			$results = $query->result_array();
		}
		else if($this->auth_model->is_author()) {
			$authorid = $this->auth_model->get_user();
			$query = $this->db->query("select * from paper where id in (select paper_id from author_paper where authors_id=" . $authorid . ")");
			$results = $query->result_array();
		}
		/* i m getting an error for this part.pls chck.must be a minor syntax error:
		else if($this->auth_model->is_chairperson()){
			global $query;
			global $results;
			$chairpersonid=$this->auth_model->get_user();
			$query = $this->db->query("select * from paper where chairperson_id=".$chairpersonid.");
			$results = $query->result_array();
		}*/
		else if($this->auth_model->is_reviewer()) {
			$reviewerid = $this->auth_model->get_user();
			$query = $this->db->query("select * from paper where id in (select paper_id from reviewer_paper where reviewer_id=" . $reviewerid . ")");
			$results = $query->result_array();
		}
			for ($i = 0; $i < sizeof($results); $i++) {
				$temp = $this->db->query("SELECT id,name FROM " . $this->_user_table . " WHERE id IN (SELECT authors_id FROM " . $this->_author_paper_table . " WHERE paper_id = " . $results[$i]['id'] . ") and status='active'");
				if ($temp->num_rows > 0) {
					$results[$i]['authors'] = $temp->result_array();
				}
				else {
					$temp1 = $this->db->query("SELECT id,name FROM " . $this->_user_table . " WHERE id IN (SELECT authors_id FROM " . $this->_author_paper_table . " WHERE paper_id = " . $results[$i]['id'] . ") and status='deactivated'");
					if ($temp1->num_rows > 0) {
						$results[$i]['authors'] = $temp1->result_array();
					}
					else {
						$results[$i]['authors'] = array(array("name" => "Not Assigned"));
					}
				}
				if ($results[$i]['chairperson_id'] != 0) {
					$temp = $this->db->query("SELECT name FROM " . $this->_user_table . " WHERE id = " . $results[$i]['chairperson_id']);
					$results[$i]['chairperson'] = $temp->row_array();
				}
				else {
					$results[$i]['chairperson'] = array("name" => "Not Assigned");
				}
				if (isset ($results[$i]['tracks_id'])) {
					$temp = $this->db->query("SELECT name FROM tracks WHERE id = " . $results[$i]['tracks_id']);
					$results[$i]['track'] = $temp->row_array();
				}
				else {
					$results[$i]['track']['name'] = "Not Assigned";
				}
			}
			return $results;
	}
}
function list_papers($data) {
	$query = $this->db->get($this->_table);
	$results = $query->result_array();
	for ($i = 0; $i < sizeof($results); $i++) {
		$temp = $this->db->query("SELECT id,name FROM " . $this->_user_table . " WHERE id =" . $data . " and status='active'");
		if ($temp->num_rows > 0) {
			$results[$i]['authors'] = $temp->result_array();
		}
		else {
			$temp1 = $this->db->query("SELECT id,name FROM " . $this->_user_table . " WHERE id =" . $data . " and status='deactivated'");
			if ($temp1->num_rows > 0) {
				$results[$i]['authors'] = $temp1->result_array();
			}
			else {
				$results[$i]['authors'] = array(array("name" => "Not Assigned"));
			}
		}
		if ($results[$i]['chairperson_id'] != 0) {
			$temp = $this->db->query("SELECT name FROM " . $this->_user_table . " WHERE id = " . $results[$i]['chairperson_id']);
			$results[$i]['chairperson'] = $temp->row_array();
		}
		else {
			$results[$i]['chairperson'] = array("name" => "Not Assigned");
		}
		if (isset ($results[$i]['tracks_id'])) {
			$temp = $this->db->query("SELECT name FROM tracks WHERE id = " . $results[$i]['tracks_id']);
			$results[$i]['track'] = $temp->row_array();
		}
		else {
			$results[$i]['track']['name'] = "Not Assigned";
		}
	}
	return $results;
}

/* End of file papers_model.php */
/* Location: ./system/application/models/papers_model.php */