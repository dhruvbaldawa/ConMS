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
}
/* End of file authors.php */
/* Location: ./system/application/controllers/authors.php */