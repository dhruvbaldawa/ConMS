<?php
class Authors extends Controller {
    function Authors(){
        parent::Controller();
        $this->load->model('authors_model');
        $this->load->model('auth_model');
    }

    function index(){
        //List all the authors
        $rows = $this->authors_model->list_authors();
        $data['title'] = "Authors";
        $data['rows'] = $rows;
        $this->load->view('site/authors',$data);

    }

    function get_all_info(){
        if($this->input->post('ajax')==1){
            $row = $this->authors_model->get_details($this->input->post('id'));
            $data['content'] = $row;
            $this->load->view('site/author_info',$data);
        }
        else
            $this->index();
    }
}
/* End of file authors.php */
/* Location: ./system/application/controllers/authors.php */