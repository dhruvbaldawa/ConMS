<?php

class Payment extends Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('payment_model');
        $this->load->model('authors_model');
        $this->load->model('papers_model');
        $this->load->model('auth_model');
    }

    function index() {
        if ($this->auth_model->logged_in()) {
            //List all the papers
            /*   $rows = $this->payment_model->list_papers();    */
            $data['title'] = "Payments";
            /* $data['rows'] = $rows;

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
            $data['rows'] = $this->payment_model->list_payment_details();
            $this->load->view('site/payment', $data);
        } else {
            $this->load->view('site/login');
        }
    }

    function create(){
        if($this->auth_model->logged_in() && $this->input->post('ajax') == 1){
            unset($_POST['ajax']);
            $record = $this->payment_model->add_payment_details($_POST);
            if(!empty($record)){
                $data['type'] = 'success';
                $data['description'] = 'Payment details added successfully.';
            } else {
                $data['type'] = 'error';
                $data['description'] = 'Error occured, during adding the Payment details.';
            }
            echo json_encode($data);
        } else {
            $this->load->view('site/login');
        }
    }

    function view($name){
      //Function to load any arbitrary view, which is passed as a parameter
        $this->load->view("site/".$name);
    }

}