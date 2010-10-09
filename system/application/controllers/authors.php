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
        $this->load->view('site/authors',$data);
        }else{
            $this->load->view('site/index');
        }

    }

    function get_all_info(){
        if($this->input->post('ajax')==1 && $this->auth_model->logged_in()){
            $row = $this->authors_model->get_details($this->input->post('id'));
            $data['content'] = $row;
            $this->load->view('site/author_info',$data);
        }
        else
            $this->index();
    }

    function add_authors(){
        if($this->input->post('ajax')==1 && $this->auth_model->logged_in()){
            //Form Validation
            foreach($_POST as $key=>$value){
                if($value==''){
                    $data['type'] = 'error';
                    $data['description'] = 'All fields are compulsory.<br>You have left '.$value.' blank.';
                    die(json_encode($data));
                }
            }
            if($_POST['password'] != $_POST['cpassword']){
                $data['type'] = 'error';
                $data['description'] = 'Passwords not matching.';
                die(json_encode($data));
            }
            unset($_POST['ajax']);
            unset($_POST['cpassword']);
            $return = $this->authors_model->create_author($_POST);
            if($return){
                $data['type'] = "success";
                $data['description'] = $return['name']." (".$return['username'].") added successfully.";
            }else{
                $data['type'] = "error";
                $data['description'] = "Error adding the author.";
            }
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
        if($this->input->post('ajax')==1 && $this->auth_model->logged_in()){
            unset($_POST['ajax']);
            //Form Validation
            foreach($_POST as $key=>$value){
                if($value=='' && $key!='password'){
                    $data['type'] = 'error';
                    $data['description'] = 'All fields are compulsory.<br>You have left '.$value.' blank.';
                    die(json_encode($data));
                }
            }
            if($this->authors_model->update($_POST,array('id'=>$_POST['id']))){
                $data['type'] = 'success';
                 $data['description'] = 'Author data updated successfully.';
                 die(json_encode($data));
            }else{
                $data['type'] = 'error';
                $data['description'] = 'Author data couldnot be updated.';
                die(json_encode($data));
            }
        }
    }

    function view($name){
        $this->load->view("site/".$name);
    }
}
/* End of file authors.php */
/* Location: ./system/application/controllers/authors.php */