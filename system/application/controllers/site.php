<?php
/*Notes
*Authentication
*   The site links however are disabled upon the privileges, but the thing is this system is only available in
*   side menu as yet. What we need to do is implement this is in the index function and all non-ajax functions
*   of the controllers.
*   create a authorisation function for each controller and use it to authorize the access.
*/

class Site extends Controller {

	function Site()
	{
		parent::Controller();
        $this->load->model('auth_model');
        $this->_salt = '123456789987654321';
	}
	
	function index(){
            if($this->auth_model->logged_in() === TRUE)
                $this->dashboard(TRUE);
            else{
                $data['title']  = "Login";
                $this->load->view('site/login',$data);
}
        }

        function dashboard($condition = FALSE){
            if($condition === TRUE || $this->auth_model->logged_in() === TRUE){
                $data['title'] = "Dashboard";
                $this->load->view('site/index',$data);
            }
            else{
                $data['title'] = "Login";
                $this->load->view('site/login',$data);
            }
        }

        function login(){
            $this->_username = $this->input->xss_clean($this->input->post('username'));
            $this->_password = $this->input->xss_clean($this->input->post('password'));
            if(empty($this->_username)){
                $data['type'] = "notice";
                $data['detail'] = "Please type your username";
                echo json_encode($data);
                return FALSE;
            }
            if(empty($this->_password)){
                $data['type'] = "notice";
                $data['detail'] = "Please type your password";
                echo json_encode($data);
                return FALSE;
            }
            $this->_password = sha1($this->_salt.$this->_password);
            if($this->auth_model->login($this->_username,$this->_password)){
                $data['type'] = "success";
                $data['detail'] = base_url().'site/index';
                echo json_encode($data);
                return TRUE;
            }else{
                $data['type'] = "error";
                $data['detail'] = "Invalid Username or Password";
                echo json_encode($data);
                return FALSE;
            }
        }

        function logout(){
            $this->auth_model->logout();
            $data['title'] = "Login";
            $this->load->view('site/login',$data);
        }

        function password_check(){
            if($this->auth_model->password_check($this->_username,$this->_password)){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }

        function user_exists($user){
            if($this->auth_model->user_exists($user)){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }

        function authors(){
            if($this->auth_model->logged_in()){
                $data['title'] = "Authors";
                $this->load->view('site/authors',$data);
            }else{
                $this->dashboard(FALSE);
            }
        }

        function wizard(){
            if($this->auth_model->logged_in()){
                $data['title'] = "Wizard";
                $this->load->view('site/wizard',$data);
            }else{
                $this->dashboard(FALSE);
            }
        }
}

/* End of file site.php */
/* Location: ./system/application/controllers/site.php */