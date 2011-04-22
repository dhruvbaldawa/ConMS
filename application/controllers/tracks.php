<<<<<<< HEAD
<?php
/*Notes
*Authentication
*   The site links however are disabled upon the privileges, but the thing is this system is only available in
*   side menu as yet. What we need to do is implement this is in the index function and all non-ajax functions
*   of the controllers.
*   create a authorisation function for each controller and use it to authorize the access.
*/
class Tracks extends Controller {
	function __construct() {
		parent :: __construct();
		$this->load->model('auth_model');
        $this->load->model('track_model');
	}
	function index() {
		if ($this->auth_model->logged_in() === TRUE){
			$data['tracks'] = $this->track_model->list_tracks();
            $data['title'] = "Tracks";

        /**
         * $data contains :
         * title <string> : title to set the page title
         * tracks <array> : each element contains information regarding tracks
         *      id <number> : track id
         *      name <string> : track name
         *      mne <string> : track mnemonic
         */

            $this->load->view('site/tracks',$data);
        }
		else {
			$data['title'] = "Login";
			$this->load->view('site/login', $data);
		}
	}
}
/* End of file tracks.php */
=======
<?php
/*Notes
*Authentication
*   The site links however are disabled upon the privileges, but the thing is this system is only available in
*   side menu as yet. What we need to do is implement this is in the index function and all non-ajax functions
*   of the controllers.
*   create a authorisation function for each controller and use it to authorize the access.
*/
class Tracks extends Controller {
	function Tracks() {
		parent :: Controller();
		$this->load->model('auth_model');
        $this->load->model('track_model');
	}
	function index() {
		if ($this->auth_model->logged_in() === TRUE){
			$data['tracks'] = $this->track_model->list_tracks();
            $data['title'] = "Tracks";

        /**
         * $data contains :
         * title <string> : title to set the page title
         * tracks <array> : each element contains information regarding tracks
         *      id <number> : track id
         *      name <string> : track name
         *      mne <string> : track mnemonic
         */

            $this->load->view('site/tracks',$data);
        }
		else {
			$data['title'] = "Login";
			$this->load->view('site/login', $data);
		}
	}
}
/* End of file tracks.php */
>>>>>>> 7091785391c7d4ae033bf43b0be85ea6720ad999
/* Location: ./system/application/controllers/tracks.php */