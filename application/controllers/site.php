<?php
/*Notes
*Authentication
*   The site links however are disabled upon the privileges, but the thing is this system is only available in
*   side menu as yet. What we need to do is implement this is in the index function and all non-ajax functions
*   of the controllers.
*   create a authorisation function for each controller and use it to authorize the access.
*/
class Site extends Controller {
	function __construct() {
		parent :: __construct();
		$this->load->model('auth_model');
		$this->_salt = '123456789987654321';
		$this->_settings_tbl = 'settings';
	}
	function index() {
		if ($this->auth_model->logged_in() === TRUE)
			$this->dashboard(TRUE);
		else {
			$data['title'] = "Login";

/**
 * $data contains :
 * title <string> : title of the page
 */
			$this->load->view('site/login', $data);
		}                                                                
	}
	function dashboard($condition = FALSE) {
		if ($condition === TRUE || $this->auth_model->logged_in() === TRUE) {
			$data['title'] = "Dashboard";

/**
 * $data contains :
 * title <string> : title of the page
 */
			$this->load->view('site/index', $data);
		}
		else {
			$data['title'] = "Login";

/**
 * $data contains :
 * title <string> : title of the page
 */
			$this->load->view('site/login', $data);
		}
	}
	function login() {
		$this->_username = $this->security->xss_clean($this->input->post('username'));
		$this->_password = $this->security->xss_clean($this->input->post('password'));
		if (empty ($this->_username)) {
			$data['type'] = "notice";
			$data['detail'] = "Please type your username";

/**
 * Sends json encoded string after the AJAX request showing notice description (username is blank).
 * Only, if username are empty.
 * the parameters passed from notice request are :
 * type <string> : the type of message (notice)
 * detail <string> : the description of the message (notice description)
 */
			echo json_encode($data);
			return FALSE;
		}
		if (empty ($this->_password)) {
			$data['type'] = "notice";
			$data['detail'] = "Please type your password";

/**
 * Sends json encoded string after the AJAX request showing notice description (password is blank).
 * Only, if password are empty.
 * the parameters passed from notice request are :
 * type <string> : the type of message (notice)
 * detail <string> : the description of the message (notice description)
 */
			echo json_encode($data);
			return FALSE;
		}
		$this->_password = $this->auth_model->encrypt_password($this->_password);
		if ($this->auth_model->login($this->_username, $this->_password)) {
			$data['type'] = "success";
			$data['detail'] = base_url() . 'site/index';

/**
 * Sends json encoded string after the AJAX request showing success.
 * the parameters passed are :
 * type <string> : the type of message (success)
 * detail <string> : the description of the message (success description)
 */
			echo json_encode($data);
			return TRUE;
		}
		else {
			$data['type'] = "error";
			$data['detail'] = "Invalid Username or Password";

/**
 * Sends json encoded string after the AJAX request showing error description (authentication failed).
 * Invalid username and password.
 * the parameters passed from error request are :
 * type <string> : the type of message (error)
 * detail <string> : the description of the message (error description)
 */
			echo json_encode($data);
			return FALSE;
		}
	}
	function logout() {
		$this->auth_model->logout();
		$data['title'] = "Login";

/**
 * $data contains :
 * title <string> : title of the page
 */
		$this->load->view('site/login', $data);
	}
	function password_check() {
		if ($this->auth_model->password_check($this->_username, $this->_password)) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	function user_exists($user) {
		if ($this->auth_model->user_exists($user)) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	function authors() {
		if ($this->auth_model->logged_in()) {
			$data['title'] = "Authors";

/**
 * $data contains :
 * title <string> : title of the page
 */
			$this->load->view('site/authors', $data);
		}
		else {
			$this->dashboard(FALSE);
		}
	}
	function wizard() {
		if ($this->auth_model->logged_in()) {
			$data['title'] = "Wizard";

/**
 * $data contains :
 * title <string> : title of the page
*/
			$this->load->view('site/wizard', $data);
		}
		else {
			$this->dashboard(FALSE);
		}
	}
	function settings() {
		if ($this->auth_model->logged_in()) {
// Only if the request is a AJAX request
			if ($this->input->post('ajax') == 1) {
// Remove the AJAX variable from the POST variables
				unset ($_POST['ajax']);
				$fail = 0;
				foreach ($_POST as $key => $value) {
					$query = "UPDATE " . $this->_settings_tbl . " SET value = '" . $value . "' WHERE name = '" . $key . "'";
					if (!$this->db->query($query)) {
						$fail = 1;
						break;
					}
				}
				if (!$fail) {
					$data['type'] = "success";
					$data['description'] = "Settings updated successfully.";
				}
				else {
					$data['type'] = "error";
					$data['description'] = "Error updating the settings.";
				}

/**
 * Sends json encoded string after the AJAX request.
 * the parameters passed from error request are :
 * type <string> : the type of message (notice)
 * description <string> : the description of the message (notice description)
 */
				echo json_encode($data);
			}
			else {
				$data['data'] = $this->db->get($this->_settings_tbl)->result_array();
				$data['title'] = "Settings";

/**
 * $data contains :
 * title <string> : title of the page
 */
				$this->load->view('site/settings', $data);
			}
		}
		else {
			$this->dashboard(FALSE);
		}
	}
	function export() {
// To export CSV files from the HTML tables
		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=\"exported.csv\"");
		$data = stripcslashes($_REQUEST['csv_text']);
		echo htmlspecialchars_decode($data);
	}
}

/* End of file site.php */
/* Location: ./system/application/controllers/site.php */