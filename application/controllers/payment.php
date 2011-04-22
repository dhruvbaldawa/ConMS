<?php
class Payment extends Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('payment_model');
        $this->load->model('auth_model');
    }
 function index(){
        if($this->auth_model->logged_in()){
            //List all the papers
         /*   $rows = $this->payment_model->list_papers();    */
            $data['title'] = "Payment";
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

            $this->load->view('site/papers',$data);
        }else{
            $this->load->view('site/login');
        }
    }
}
?>