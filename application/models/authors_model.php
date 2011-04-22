<?php
/*notes
*Delete
*   delete the user entry and also the author and paper relations
*   and since author and paper relation also stays in payments, i think we should keep payment details as it is.
*   Alternative : put a status field in author, if you want to delete the author, put the state as deactivated.
*   Implement whatever appropriate. I would suggest 2nd method.
*/
class Authors_model extends Model {
	function __construct() {
		parent :: __construct();
		$this->_table = 'authors';
		$this->_paper_table = 'papers';
		$this->_user_table = 'users';
		$this->_author_paper_table = 'author_paper';
	}
	function list_authors() {
// List all the authors
		$query = $this->db->query("SELECT users.id,username,name,registered FROM " . $this->_user_table . "," . $this->_table . " WHERE users.id=authors.id");
		return $query->result_array();
	}
	function get_details($id) {
		$query = $this->db->get_where($this->_user_table, array('id' => $id));
		return $query->row_array();
	}
	function get_papers($data) {
//Building the $CI variable to get the main CodeIgniter object. To load the 'paper_model'.
		$CI = & get_instance();
		$CI->load->model('papers_model');
		return $CI->paper_model->get_details($data);
	}
	function get_payment_details($data) {
//Building the $CI variable to the main CodeIgniter object. To load the 'payments_model'.
		$CI = & get_instance();
		$CI->load->model('payments_model');
		return $CI->payments_model->get_details($data);
	}
	function create_author($data) {
		$CI = & get_instance();
		$CI->load->model('auth_model');
		$row = $CI->auth_model->create($data);
        $id = $row['id'];
        $data = array('id' => $id);
		if (!$id) {
			return false;
		}
		if ($this->db->insert($this->_table,$data)) {
			return $row;
		}
		else {
			return false;
		}
	}
	function update($data, $where) {
		$CI = & get_instance();
		$CI->load->model('auth_model');
		return $CI->auth_model->update($data, $where);
	}
	function add_paper($data) {
		$this->db->insert('author_paper', $data);
	}
	function add_payment($data) {
		$this->db->insert('payments', $data);
	}
	function delete($data) {
		$a = $this->db->delete($this->_table, array('id' => $data));
	}
	function link_authors($author_ids, $paper_ids) {
//Checking if there are equal number of author_ids and paper_ids, so we get proper (author,paper) pairs.
		if (sizeof($author_ids) != sizeof($paper_ids))
			return - 1;
		for ($i = 0; $i < sizeof($author_ids); $i++) {
			if (!$this->db->query("INSERT INTO " . $this->_author_paper_table . " VALUES " . $author_ids[$i] . "," . $paper_ids[$i])) {
				return false;
			}
		}
		return true;
	}
}
/* End of file authors_model.php */
/* Location: ./system/application/models/authors_model.php */