<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Auth extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
  }

  public function index(){
    }
  #clean
  public function login(){
    $this->load->model('model_auth');
  	$post = $this->input->post();
  	#post request
    if ($post) {
        #validation form
        if ($this->form_validation->run('login_admin_user') == TRUE) {
            $captcha = $post['captcha'];
            #match captcha
            if (strtolower($captcha) == strtolower($this->session->userdata('login_word_captcha'))) {
                $check_em_usrname = array(
                              'email_address' => $post['email'], 
                              'username' => $post['email']
                              );
                #check email / username master profile
                $check_em = $this->model_auth->check_email_username_master_profile($check_em_usrname);
                if ($check_em) {
                    #check credentials
                    #encrypt decrypt email post to match on the data
                    $encrypt_email = $this->tokenz->encrypt($post['email']);
                    $decrypt_email = $this->tokenz->decrypt($encrypt_email);
                		$data = array(
                						'username' => base_convert(md5($decrypt_email,TRUE),36,10), 
                						'email_address' => base_convert(md5($decrypt_email,TRUE),36,10), 
                						'password' => md5($post['password'])
                						);
                    #check post master user
                		$true = $this->model_auth->check_credential($data);
                		if ($true) {
                			$get_result = $this->model_auth->get_credential($data);
                      $data = array(
                              'is_logged_in' => true, 
                              'id' => $get_result->id, 
                              'username' => $get_result->username, 
                              'email_address' => $get_result->email_address 
                              );
                      $this->session->unset_userdata('login_word_captcha');
                			$this->session->set_userdata($data);
              				redirect('Admin_Dashboard/');
                		} else {
              				$data['message_error'] = 'Your account is not into the database.';
                      $this->login_form($data);
                		}//end check email post master user
                } else {
                  $data['message_error'] = 'No Match Email / Username.';
                  $this->login_form($data);
                }//end check email
            } else {
              $data['message_error'] = 'Captcha did not match.';
              $this->login_form($data);
            }//end check captcha
        } else {
          $this->login_form();
        }// end form validation

  	} else {
      $this->login_form();
    }// end check post
  }
  #clean
  public function login_form($datas = FALSE){
      $this->load->helper('captcha');
      $data = capt();
      $this->form_validation->set_error_delimiters('<div class="err">', '</div>');
      $data['title_page'] = 'Login';
      $data['message_error'] = $datas['message_error'] ? $datas['message_error'] : '';
      $data['message_success'] = '';
      $sess = array(
            'login_word_captcha' => $data['word']
            );
      $this->session->set_userdata($sess);
      $this->load->view('Admin_Auth_Reg/Auth/Admin_Login',$data);
  }
  #clean
  public function logout(){
  	$this->session->sess_destroy();
    $this->load->helper('captcha');
    $data = capt();
    $data['title_page'] = 'Login';
    $data['message_success'] = 'Successfully Logout!';
    $data['message_error'] = '';
    $this->load->view('Admin_Auth_Reg/Auth/Admin_Login',$data);
  }

}

