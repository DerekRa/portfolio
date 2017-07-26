   
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My404 extends CI_Controller  {
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->error_page();
    }

    public function error_page(){
        $data['title'] = '404'; 
        $data['heading'] = 'Error_404:'; // View name 
        $data['message'] = '&nbsp;&nbsp;&nbsp;The page you requested was not found.'; // View name 
        $this->load->view('errors/cli/error_404',$data);//loading in my template 
        // $this->load->view('errors/html/error_404',$data);//loading in my template 
    }

}


