<?php
class Auth_model extends Model {
	function __construct() {
		parent :: __construct();
	}
	function logout() {
		$this->session->sess_destroy();
	}
	function password_check($username, $password) {
		$this->db->where('username', $username);
		$query = $this->db->get('users');
		$result = $query->row_array();
		if (@ $result['password'] == $password)
		;
		return TRUE;
		return FALSE;
	}
	function user_exists($user) {
//Check if the user with given username exists or not.
		$query = $this->db->get_where('users', array('username' => $user));
		if ($query->num_rows() > 0)
			return FALSE;
		else {
			$query->free_result();
			return TRUE;
		}
	}
	function create($data) {
//Calculate the hash for password.
		$data['password'] = $this->encrypt_password($data['password']);
//Empty because the 'id' is AUTO_INCREMENT in the database
		$data['id'] = "";
		if ($this->db->insert('users', $data)) {
			unset ($data['id']);
			$query = $this->db->get_where('users', $data);
			$row = $query->row_array();
			return $row;
		}
		return false;
	}
	function update($data, $where) {
//Update password with its hash, if it is set.
		if ($data['password'] != '')
			$data['password'] = $this->encrypt_password($data['password']);
		else {
			unset ($data['password']);
		}
		return $this->db->update('users', $data, $where);
	}
	function login($username, $password) {
		$query = $this->db->get_where('users', array('username' => $username, 'password' => $password));
		if ($query->num_rows > 0) {
			$data = $query->row_array();
			$data['logged_in'] = TRUE;
			$query = $this->db->get_where('admin', array('id' => $data['id']));
			if ($query->num_rows > 0)
				$data['is_admin'] = TRUE;
			else
				$data['is_admin'] = FALSE;
			$query = $this->db->get_where('chairperson', array('id' => $data['id']));
			if ($query->num_rows > 0)
				$data['is_chairperson'] = TRUE;
			else
				$data['is_chairperson'] = FALSE;
			$query = $this->db->get_where('authors', array('id' => $data['id']));
			if ($query->num_rows > 0)
				$data['is_author'] = TRUE;
			else
				$data['is_author'] = FALSE;
			$query = $this->db->get_where('managers', array('id' => $data['id']));
			if ($query->num_rows > 0)
				$data['is_manager'] = TRUE;
			else
				$data['is_manager'] = FALSE;
			$query = $this->db->get_where('reviewer', array('id' => $data['id']));
			if ($query->num_rows > 0)
				$data['is_reviewer'] = TRUE;
			else
				$data['is_reviewer'] = FALSE;
			$query = $this->db->get_where('entry', array('id' => $data['id']));
			if ($query->num_rows > 0)
				$data['is_entry'] = TRUE;
			else
				$data['is_entry'] = FALSE;
			$this->session->set_userdata($data);
			return true;
		}
		return false;
	}
	function get_user() {
		return $this->session->userdata('id');
	}
	function logged_in() {
		if ($this->session->userdata('logged_in') == TRUE)
			return TRUE;
		return FALSE;
	}
	function is_admin() {
		if ($this->session->userdata('is_admin') == TRUE)
			return TRUE;
		return FALSE;
	}
	function is_author() {
		if ($this->session->userdata('is_author') == TRUE)
			return TRUE;
		return FALSE;
	}
	function is_chairperson() {
		if ($this->session->userdata('is_chairperson') == TRUE)
			return TRUE;
		return FALSE;
	}
	function is_reviewer() {
		if ($this->session->userdata('is_reviewer') == TRUE)
			return TRUE;
		return FALSE;
	}
	function is_entry() {
		if ($this->session->userdata('is_entry') == TRUE)
			return TRUE;
		return FALSE;
	}
	function is_manager() {
		if ($this->session->userdata('is_manager') == TRUE)
			return TRUE;
		return FALSE;
	}
	function encrypt_password($password) {
		return sha1("123456789987654321" . $password);
	}
}
/* End of file auth_model.php */
/* Location: ./system/application/models/auth_model.php */