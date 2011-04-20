<?php
class Papers extends Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('papers_model');
        $this->load->model('auth_model');
    }

    function index(){
        if($this->auth_model->logged_in()){
            //List all the papers
            $rows = $this->papers_model->list_papers();
            $data['title'] = "Papers";
            $data['rows'] = $rows;

            /**
             * $data contains :
             * title <string> : The title of the page
             * rows <array> : contains the list of the authors with the following attributes.
             *      authors <array> : contains all the information regarding the authors, the attributes in authors are :
             *          id <number> : the author id
             *          name <string> : author's name
             *      chairperson <array> : contains the information regarding the chairperson
             *          name <string> : chairperson's name
             *      tracks <array> : contains the information regarding the tracks
             *          name <string> : name of the track
             */

            $this->load->view('site/papers',$data);
        }else{
            $this->load->view('site/login');
        }
    }

/*    function index($data){
        if($this->auth_model->logged_in()){
            //List all the papers related to id
            $rows = $this->papers_model->list_papers($data);
            $data['title'] = "Papers";
            $data['rows'] = $rows;
            $this->load->view('site/papers',$data);
        }else{
            $this->load->view('site/login');
        }

    }
 */
    function get_all_info(){
      // If the request is AJAX request
        if($this->input->post('ajax')==1){
            $row = $this->papers_model->get_paper_details($this->input->post('id'));
            $data['content'] = $row;

            /**
             * $data contains :
             * content <array> : basically, consists of all the attributes of a particular paper.
             *      <attributes from the paper relation, which are used in the views>
             *      title <string> : paper title
             *      type <string> : paper type
             *      description <string> : paper abstract
             *      authors <array> : contains all the information regarding the authors
             *          id <number> : the author id
             *          name <string> : author's name
             *      chairperson <array> : contains the information regarding the chairperson
             *          name <string> : chairperson's name
             *      tracks <array> : contains the information regarding the tracks
             *          name <string> : name of the track
             */

            $this->load->view('site/paper_info',$data);
        }
        else
            $this->index();
    }


        function view($name){
        // Function to load arbitrary views
        $this->load->view("site/".$name);
    }

    function get_json_tracks($name){
      // Get JSON data regarding tracks (used for autocomplete feature in the forms).
        $name = strtolower($name);
        $row = $this->db->query("SELECT id,name FROM tracks WHERE LOWER(name) LIKE '%".$name."%'")->result_array();
        $json = json_encode($row);
        $search = array('id','name');
        $replace = array('value','caption');

        echo str_replace($search,$replace,$json);
    }

    function get_json_chairpersons($name){
      // Get JSON data regarding chairpersons (used for autocomplete feature in the forms).
        $name = strtolower($name);
        $row = $this->db->query("SELECT id as value,name as caption FROM users WHERE LOWER(name) LIKE '%".$name."%' AND id IN (SELECT id FROM chairperson)")->result_array();
        $json = json_encode($row);
        echo $json;
    }

    function get_json_authors($name){
      // Get JSON data regarding authors (used for autocomplete feature in the forms).
        $name = strtolower($name);
        $row = $this->db->query("SELECT id as value,name as caption FROM users WHERE LOWER(name) LIKE '%".$name."%' AND id IN (SELECT id FROM authors)")->result_array();
        $json = json_encode($row);
        echo $json;
    }

    function update(){
      // Only if the request is a AJAX request
        if($_POST['ajax'] == 1){
            $_POST['tracks_id'] = $_POST['tracks_id'][0];
            if(isset($_POST['chairperson_id'][0])){
                $_POST['chairperson_id'] = $_POST['chairperson_id'][0];
            }
            //Remove AJAX parameter from the POST variables
            unset($_POST['ajax']);
            if($this->papers_model->update($_POST)){
                $data['type'] = 'success';
                $data['description'] = 'Paper ('.$_POST['title'].') details updated successfully.';
            }else{
                $data['type'] = 'error';
                $data['description'] = 'Error occured while updated the paper.';

            }

            /**
             * Sends json encoded string after the AJAX request showing error or success description.
             * Checking if the paper is updated properly or not.
             * the parameters passed from error request are :
             * type <string> : the type of message
             * description <string> : the description of the message
             */

            die(json_encode($data));
        }
    }

    function create(){
      // Only if the request is AJAX request
        if($_POST['ajax'] == 1){
            //Form Validation
            //Please put in the form validation over here. Depending upon the database constraints.

            //Remove AJAX parameter from the POST variables
            unset($_POST['ajax']);
            $_POST['tracks_id'] = $_POST['tracks_id'][0];
            if(isset($_POST['chairperson_id'][0]))
                $_POST['chairperson_id'] = $_POST['chairperson_id'][0];
            if($this->papers_model->create($_POST)){
                $data['type'] = 'success';
                $data['description'] = 'Paper ('.$_POST['title'].') added successfully.';
            }else{
                $data['type'] = 'error';
                $data['description'] = 'Error occured while adding the paper.';
            }

            /**
             * Sends json encoded string after the AJAX request showing error or success description.
             * Checking if the paper is added properly or not.
             * the parameters passed from error request are :
             * type <string> : the type of message
             * description <string> : the description of the message
             */

            die(json_encode($data));
        }
    }
}
/* End of file papers.php */
/* Location: ./system/application/controllers/papers.php */