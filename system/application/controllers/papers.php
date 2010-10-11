<?php
class Papers extends Controller {
    function Papers(){
        parent::Controller();
        $this->load->model('papers_model');
        $this->load->model('auth_model');
    }

    function index(){
        if($this->auth_model->logged_in()){
            //List all the papers
            $rows = $this->papers_model->list_papers();
            $data['title'] = "Papers";
            $data['rows'] = $rows;
            $this->load->view('site/papers',$data);
        }else{
            $this->load->view('site/login');
        }

    }

    function get_all_info(){
        if($this->input->post('ajax')==1){
            $row = $this->papers_model->get_paper_details($this->input->post('id'));
            $data['content'] = $row;
            $this->load->view('site/paper_info',$data);
        }
        else
            $this->index();
    }

        function view($name){
        $this->load->view("site/".$name);
    }

    function get_json_tracks($name){
        $name = strtolower($name);
        $row = $this->db->query("SELECT id,name FROM tracks WHERE LOWER(name) LIKE '%".$name."%'")->result_array();
        $json = json_encode($row);
        $search = array('id','name');
        $replace = array('value','caption');

        echo str_replace($search,$replace,$json);
    }

    function get_json_chairpersons($name){
        $name = strtolower($name);
        $row = $this->db->query("SELECT id,name FROM users WHERE LOWER(name) LIKE '%".$name."%' AND id IN (SELECT id FROM chairperson)")->result_array();
        $json = json_encode($row);
        $search = array('id','name');
        $replace = array('value','caption');

        echo str_replace($search,$replace,$json);
    }

    function get_json_authors($name){
        $name = strtolower($name);
        $row = $this->db->query("SELECT id,name FROM users WHERE LOWER(name) LIKE '%".$name."%' AND id IN (SELECT id FROM authors)")->result_array();
        $json = json_encode($row);
        $search = array('id','name');
        $replace = array('value','caption');

        echo str_replace($search,$replace,$json);
    }

    function update(){
        if($_POST['ajax'] == 1){
            $_POST['tracks_id'] = $_POST['tracks_id'][0];
            if(isset($_POST['chairperson_id'][0])){
                $_POST['chairperson_id'] = $_POST['chairperson_id'][0];
                unset($_POST['chairperson_id'][0]);
            }
            unset($_POST['ajax']);
            if($this->papers_model->update($_POST)){
                $data['type'] = 'success';
                $data['description'] = 'Paper ('.$_POST['title'].') details updated successfully.';
                die(json_encode($data));
            }else{
                $data['type'] = 'error';
                $data['description'] = 'Error occured while updated the paper.';
                die(json_encode($data));
            }
        }
    }

    function create(){
        if($_POST['ajax'] == 1){
            //Form Validation
            //Please put in the form validation over here. Depending upon the database constraints.
            unset($_POST['ajax']);
            $_POST['tracks_id'] = $_POST['tracks_id'][0];
            if(isset($_POST['chairperson_id'][0]))
                $_POST['chairperson_id'] = $_POST['chairperson_id'][0];
            if($this->papers_model->create($_POST)){
                $data['type'] = 'success';
                $data['description'] = 'Paper ('.$_POST['title'].') added successfully.';
                die(json_encode($data));
            }else{
                $data['type'] = 'error';
                $data['description'] = 'Error occured while adding the paper.';
                die(json_encode($data));
            }
        }
    }
}
/* End of file papers.php */
/* Location: ./system/application/controllers/papers.php */