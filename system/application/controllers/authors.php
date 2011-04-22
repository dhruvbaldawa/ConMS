<<<<<<< HEAD
<?php
class Authors extends Controller {
    function Authors(){
        parent::Controller();
        $this->load->model('authors_model');
        $this->load->model('auth_model');
    }

    function index(){
        if($this->auth_model->logged_in()){
        //List all the authors
        $rows = $this->authors_model->list_authors();
        $data['title'] = "Authors";
        $data['rows'] = $rows;

        /**
         * $data contains :
         * title <string> : title to set the page title
         * rows <array> :each element contains information regarding authors
         *      user.id <number> : user id
         *      username <string> : username of the author
         *      name <string> : author's name
         *      registered <string> : whether the author is registered or not
         */

        $this->load->view('site/authors',$data);
        }else{
            $this->load->view('site/index');
        }

    }

    function get_all_info(){
// Checking if the request is a AJAX request or not.
        if($this->input->post('ajax')==1 && $this->auth_model->logged_in()){
            $row = $this->authors_model->get_details($this->input->post('id'));
            $data['content'] = $row;

            /**
             * $data contains :
             * content <array> : basically, consists of all the attributes of a particular author.
             *      <attributes from the author relation, which are used in the views>
             *      name <string> : author's name
             *      username <string> : author's username
             *      email <string> : author's email
             *      street,city,pincode,state,country <string> : author's address parameters
             *      phone <string> : author's phone
             *      home_institute <string> : whether author is from home_institute or not.
             */

            $this->load->view('site/author_info',$data);
        }
        else
            $this->index();
    }

    function add_authors(){
      //Only if the request is a AJAX request
        if($this->input->post('ajax')==1 && $this->auth_model->logged_in()){
            //Form Validation
            foreach($_POST as $key=>$value){
                if($value==''){
                    $data['type'] = 'error';
                    $data['description'] = 'All fields are compulsory.<br>You have left '.$value.' blank.';

                    /**
                     * Sends json encoded string after the AJAX request showing error description (fields are blank).
                     * Only, if any of the fields are empty.
                     * the parameters passed from error request are :
                     * type <string> : the type of message (error)
                     * description <string> : the description of the message (error description)
                     */

                // Stop execution of the script and print the json encoded data
                    die(json_encode($data));
                }
            }
            /*if($_POST['password'] != $_POST['cpassword']){
                $data['type'] = 'error';
                $data['description'] = 'Passwords not matching.';
                die(json_encode($data));
            }*/

            // Remove 'ajax' from POST variables, so that it is removed from the main array
            // and then the main array can be used to create a author

            unset($_POST['ajax']);
            //unset($_POST['cpassword']);
            $return = $this->authors_model->create_author($_POST);
            if($return){
                $data['type'] = "success";
                $data['description'] = $return['name']." (".$return['username'].") added successfully.";
            }else{
                $data['type'] = "error";
                $data['description'] = "Error adding the author.";
            }

            /**
             * Sends json encoded string after the AJAX request showing error or success description.
             * Checking if the author is added properly or not.
             * the parameters passed from error request are :
             * type <string> : the type of message
             * description <string> : the description of the message
             */

            echo json_encode($data);
        }else{
            $this->index();
        }
    }

    function delete(){
       if($this->authors_model->delete($this->input->post('id')) && $this->auth_model->logged_in()){
            echo "Author deleted successfully.";
        }else{
            echo "Author couldn't be deleted.";
        }

    }

    function update(){
    // Only if the request is a AJAX request.
        if($this->input->post('ajax')==1 && $this->auth_model->logged_in()){
          // Remove 'ajax' from POST variables, so that it is removed from the main array
          // and then the main array can be used to create a author
            unset($_POST['ajax']);

            //Form Validation
            foreach($_POST as $key=>$value){
                if($value=='' && $key!='password'){
                    $data['type'] = 'error';
                    $data['description'] = 'All fields are compulsory.<br>You have left '.$key.' blank.';

                    /**
                     * Sends json encoded string after the AJAX request showing error description (fields are blank).
                     * Only, if any of the fields are empty.
                     * the parameters passed from error request are :
                     * type <string> : the type of message (error)
                     * description <string> : the description of the message (error description)
                     */

                    die(json_encode($data));
                }
            }
            if($this->authors_model->update($_POST,array('id'=>$_POST['id']))){
                $data['type'] = 'success';
                 $data['description'] = 'Author data updated successfully.';
            }else{
                $data['type'] = 'error';
                $data['description'] = 'Author data couldnot be updated.';
            }

            /**
             * Sends json encoded string after the AJAX request showing error or success description.
             * Checking if the author is updated properly or not.
             * the parameters passed from error request are :
             * type <string> : the type of message
             * description <string> : the description of the message
             */

             die(json_encode($data));
        }
    }

    function view($name){
      //Function to load any arbitrary view, which is passed as a parameter
        $this->load->view("site/".$name);
    }
}
/* End of file authors.php */
/* Location: ./system/application/controllers/authors.php */
=======
<?php
class Authors extends Controller {
    function Authors(){
        parent::Controller();
        $this->load->model('authors_model');
        $this->load->model('auth_model');
    }

    function index(){
        if($this->auth_model->logged_in()){
        //List all the authors
        $rows = $this->authors_model->list_authors();
        $data['title'] = "Authors";
        $data['rows'] = $rows;

        /**
         * $data contains :
         * title <string> : title to set the page title
         * rows <array> :each element contains information regarding authors
         *      user.id <number> : user id
         *      username <string> : username of the author
         *      name <string> : author's name
         *      registered <string> : whether the author is registered or not
         */

        $this->load->view('site/authors',$data);
        }else{
            $this->load->view('site/index');
        }

    }

    function get_all_info(){
// Checking if the request is a AJAX request or not.
        if($this->input->post('ajax')==1 && $this->auth_model->logged_in()){
            $row = $this->authors_model->get_details($this->input->post('id'));
            $data['content'] = $row;

            /**
             * $data contains :
             * content <array> : basically, consists of all the attributes of a particular author.
             *      <attributes from the author relation, which are used in the views>
             *      name <string> : author's name
             *      username <string> : author's username
             *      email <string> : author's email
             *      street,city,pincode,state,country <string> : author's address parameters
             *      phone <string> : author's phone
             *      home_institute <string> : whether author is from home_institute or not.
             */

            $this->load->view('site/author_info',$data);
        }
        else
            $this->index();
    }

    function add_authors(){
      //Only if the request is a AJAX request
        if($this->input->post('ajax')==1 && $this->auth_model->logged_in()){
            //Form Validation
            foreach($_POST as $key=>$value){
                if($value==''){
                    $data['type'] = 'error';
                    $data['description'] = 'All fields are compulsory.<br>You have left '.$value.' blank.';

                    /**
                     * Sends json encoded string after the AJAX request showing error description (fields are blank).
                     * Only, if any of the fields are empty.
                     * the parameters passed from error request are :
                     * type <string> : the type of message (error)
                     * description <string> : the description of the message (error description)
                     */

                // Stop execution of the script and print the json encoded data
                    die(json_encode($data));
                }
            }
            /*if($_POST['password'] != $_POST['cpassword']){
                $data['type'] = 'error';
                $data['description'] = 'Passwords not matching.';
                die(json_encode($data));
            }*/

            // Remove 'ajax' from POST variables, so that it is removed from the main array
            // and then the main array can be used to create a author

            unset($_POST['ajax']);
            //unset($_POST['cpassword']);
            $return = $this->authors_model->create_author($_POST);
            if($return){
                $data['type'] = "success";
                $data['description'] = $return['name']." (".$return['username'].") added successfully.";
            }else{
                $data['type'] = "error";
                $data['description'] = "Error adding the author.";
            }

            /**
             * Sends json encoded string after the AJAX request showing error or success description.
             * Checking if the author is added properly or not.
             * the parameters passed from error request are :
             * type <string> : the type of message
             * description <string> : the description of the message
             */

            echo json_encode($data);
        }else{
            $this->index();
        }
    }

    function delete(){
       if($this->authors_model->delete($this->input->post('id')) && $this->auth_model->logged_in()){
            echo "Author deleted successfully.";
        }else{
            echo "Author couldn't be deleted.";
        }

    }

    function update(){
    // Only if the request is a AJAX request.
        if($this->input->post('ajax')==1 && $this->auth_model->logged_in()){
          // Remove 'ajax' from POST variables, so that it is removed from the main array
          // and then the main array can be used to create a author
            unset($_POST['ajax']);

            //Form Validation
            foreach($_POST as $key=>$value){
                if($value=='' && $key!='password'){
                    $data['type'] = 'error';
                    $data['description'] = 'All fields are compulsory.<br>You have left '.$key.' blank.';

                    /**
                     * Sends json encoded string after the AJAX request showing error description (fields are blank).
                     * Only, if any of the fields are empty.
                     * the parameters passed from error request are :
                     * type <string> : the type of message (error)
                     * description <string> : the description of the message (error description)
                     */

                    die(json_encode($data));
                }
            }
            if($this->authors_model->update($_POST,array('id'=>$_POST['id']))){
                $data['type'] = 'success';
                 $data['description'] = 'Author data updated successfully.';
            }else{
                $data['type'] = 'error';
                $data['description'] = 'Author data couldnot be updated.';
            }

            /**
             * Sends json encoded string after the AJAX request showing error or success description.
             * Checking if the author is updated properly or not.
             * the parameters passed from error request are :
             * type <string> : the type of message
             * description <string> : the description of the message
             */

             die(json_encode($data));
        }
    }

    function view($name){
      //Function to load any arbitrary view, which is passed as a parameter
        $this->load->view("site/".$name);
    }
}
/* End of file authors.php */
/* Location: ./system/application/controllers/authors.php */
>>>>>>> master
