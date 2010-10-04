<?php
class Papers extends Controller {
    function Authors(){
        parent::Controller();
        $this->load->model('papers_model');
        $this->load->model('auth_model');
    }

    function index(){
        //List all the authors
        $rows = $this->papers_model->list_papers();
        $data['title'] = "Papers";
        $data['rows'] = $rows;
        $this->load->view('site/papers',$data);

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
}
/* End of file papers.php */
/* Location: ./system/application/controllers/papers.php */