<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Register extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    $this->load->model('model_register');
  }

  public function index(){
  }
  #clean
  public function register(){
    
    	$post = $this->input->post();
    	if ($post) {
          # validate inputs via form validation on config folder
          if ($this->form_validation->run('register_temp_admin_user') == TRUE) {
              $captcha = $post['captcha'];
              if (strtolower($captcha) == strtolower($this->session->userdata('register_word_captcha'))) {
              		$data = array(
                          'email_temp' => $this->tokenz->encrypt($post['email']), 
                          'password_temp' => md5($post['password']),
              						'created' => date('Y-m-d H:i:s')
              						);
                            // #store in session
                            // $this->session->set_userdata($data);
                            // #created a time limit for session created
                            // $data_session_temp = array(
                  #redundant    //         'email_temp' => 300, 
                            //         'password_temp' => 200,
                            //         'created' => 200
                            //         );
                            // $this->session->set_tempdata($data_session_temp);
                  #insert on temp table
              		$get_inserted_id = $this->model_register->insert_temp($data);
                  $id = $get_inserted_id;
                  #use id to check if truly insert
                  $true = $get_inserted_id > 0 ? TRUE : FALSE;
                  #if truly
              		if ($true) {
                      #email
                      $this->load->library('email');

                      $this->email->from('armstrong17.km@gmail.com', 'Kenneth');
                      $this->email->to($post['email']);
                      // $this->email->cc('another@another-example.com');
                      // $this->email->bcc('them@their-example.com');

                      $this->email->subject('Email Validation Portfolio');
                      $this->email->message("Please activate your account by clicking on the link below \r\n \r\n ".site_url('Admin/Link/Email_Validation/').__link($id).
                        " \r\n \r\nemail: ".$post['email'].
                        " \r\npassword: ".$post['password']);

                      $send = $this->email->send();

                      $config['protocol'] = 'sendmail';
                      $config['mailpath'] = '/usr/sbin/sendmail';
                      $config['charset'] = 'iso-8859-1';
                      $config['wordwrap'] = TRUE;

                      $this->email->initialize($config);

                      $data['h_notif'] = 'Success!';
                      $data['notif'] = 'Please visit your email: '.$post['email'].' to activate your account. Thanks!';
                      $data['title_page'] = 'Register Activation';
                      $this->success_form($data);
              		} else {
            				$data['message'] = 'Something went wrong while inserting your information. </br>Please try again. Thanks!';
                    $this->register_form($data);
                  }// end check insert on temp table

              } else {
                  $data['message'] = 'Captcha did not match.';
                  $this->register_form($data);
              }// end captcha compare

      		} else {
              $this->register_form();
          }// end validation form

    	} else {
        $this->register_form();
      }// end post
  }
  #clean
  public function register_form($datas = FALSE){
      delete_files("./captcha/", true);
      $this->load->helper('captcha');
      $cap = capt(); // register
      $data = capt(); // login
      $data['message'] = $datas['message'] ? $datas['message'] : '';
      $data['captcha_filename'] = $cap['filename']; // register
      $data['title_page'] = 'Register';
      $sess = array(
              'login_word_captcha' => $data['word'], 
              'register_word_captcha' => $cap['word']
              );
      $this->session->set_userdata($sess);
      $this->form_validation->set_error_delimiters('<div class="err">', '</div>');
      $this->load->view('Admin_Auth_Reg/Register/Admin_Register',$data);
  }
  #clean
  public function success_form($data = FALSE){

    if ($data) {
        $this->load->view('Admin_Auth_Reg/Register/Admin_Success',$data);
    }
  }
  #clean
  public function registration_email_validation($hashid = FALSE){

    if ($hashid) {
        #encode hash id
        $d_id = _secure_encode($hashid);
        #valid hash id
        if (!empty($d_id)) {
            $id = $d_id[0];
            #check id from temp
            $true = $this->model_register->check_temp($id);
            if($true) {
                #get temp
                $get_temp = $this->model_register->get_temp($id);
                #decode email got on temp
                $decode_email = $this->tokenz->decrypt($get_temp->email_temp);
                #hash decode email
                $hash_email = base_convert(md5($decode_email,TRUE),36,10);
                #get count of admin restriction
                $ar_check_count = $this->model_register->count_admin_restrictions();
                #check limit of admin restriction
                $ar_check_limit = $this->model_register->limit_admin_restrictions();
                #initialize
                $ar_count = $ar_check_count->count - 1;
                $ar_limit = $ar_check_limit == null ? $ar_check_limit['admin_limit'] - 0 : $ar_check_limit->admin_limit - 0;
                #check if reach limit set from master admin
                if ($ar_count > $ar_limit) {
                    $data['message'] = 'Admin is already full. Thanks for making it here.';
                    $this->email_validation_register_form($data);
                } else {
                      $true_create_mu = FALSE;
                      $true_create_mp = FALSE;
                      $true_create_ar = FALSE;
                      #check email on master user if existed to avoid duplication
                      $check_email_mu = $this->model_register->check_email_master_user($hash_email);
                      if ($check_email_mu == FALSE) {
                          $data_mu = array(
                                  'username' => $hash_email, 
                                  'email_address' => $hash_email, 
                                  'password' => $get_temp->password_temp, 
                                  'created' => date('Y-m-d H:i:s')
                                  );
                          #insert data on master user
                          $mu_insert_id = $this->model_register->insert_master_user($data_mu);
                          $true_create_mu = TRUE;
                      } else {
                        $get_id_mu = $this->model_register->get_master_user($hash_email);
                        $mu_insert_id = $get_id_mu->id; // not sure
                      }// end check master user

                      #check email on master profile if existed to avoid duplication
                      $check_email_mp = $this->model_register->check_email_master_profile($decode_email);
                      if ($check_email_mp == FALSE) {
                          $data_mp = array(
                                  'user_id' => $mu_insert_id, 
                                  'username' => $decode_email, 
                                  'email_address' => $decode_email,
                                  'created' => date('Y-m-d H:i:s')
                                  );
                          #insert data on master profile
                          $true_mp = $this->model_register->insert_master_profile($data_mp);
                          $true_create_mp = TRUE;
                      }//end check master profile
                      
                      #check if admin restriction is created
                      $check_ad_res = $this->model_register->check_admin_restriction($mu_insert_id);
                      if ($check_ad_res == FALSE) {
                          #check if there is already existed admin restriction by counting
                          if ($ar_check_count->count > 0) {
                              $data_ar = array(
                                'master_admin' => 0, 
                                'user_id' => $mu_insert_id, 
                                'created' => date('Y-m-d H:i:s')
                              );
                          } else {
                              $data_ar = array(
                                'master_admin' => 1, 
                                'user_id' => $mu_insert_id, 
                                'admin_limit' => 2,
                                'created' => date('Y-m-d H:i:s')
                              );
                          }// end check if master admin is existed
                          #insert data on admin restriction
                          $ops = $this->model_register->insert_admin_restrictions($data_ar);
                          $true_create_ar = TRUE;
                      }//end check admin restriction

                      #CHECK IF EVERY THING HAVE BEEN INSERTED TO THERE TABLES
                      if ($check_email_mu && $check_email_mp && $check_ad_res) {
                          #delete temp record
                          $del_temp = $this->model_register->delete_temp($id);
                          if ($del_temp) {
                            #load log in form
                            $this->email_validation_login_form(TRUE);
                          } else {
                            $data['message'] = 'Hey! Something went wrong while creating your account. </br> Please try clicking again your link on your email. </br>BIG Thanks!';
                            $this->email_validation_register_form($data);
                          }// end delete temp

                      } else {
                          #check of they are all inserted: master user, master profile, admin restrictions
                          if ($true_create_mu && $true_create_mp && $true_create_ar) {
                              #delete temp record
                              $del_temp = $this->model_register->delete_temp($id);
                              if ($del_temp) {
                                #load log in form
                                $this->email_validation_login_form(TRUE);
                              } else {
                                $data['message'] = 'Ops! Something went wrong while creating your account. </br> Please try clicking again your link on your email. </br>BIG Thanks!';
                                $this->email_validation_register_form($data);
                              }// end delete temp

                          } else {
                              $data['message'] = 'Something went wrong on creating your account. </br> Please try clicking again your link on your email. </br>BIG Thanks!';
                              $this->email_validation_register_form($data);
                        }
                      }// end check all three tables are affected by newly account

                }// end check if reach limit admin
            } else {
                $data['message'] = "Your registration has already expired. </br> Please try another one. Thanks!";
                $this->email_validation_register_form($data);
            }// end valid id check from temp
        } else {
            $data['message'] = "Your registration has already expired. </br> Please try another one. Thanks!";
            $this->email_validation_register_form($data);
        }// end valid hash id
          
    } else {
        $data['message'] = "Please do not change the link given to you. </br> Big Thanks!";
        $this->email_validation_register_form($data);
    }// end hash id
  }
  #clean
  public function email_validation_register_form($datas = FALSE){

    if ($datas) {
      $this->load->helper('captcha');
      $data = capt(); // login
      $cap = capt(); // register
      $data['message'] = $datas['message'] ? $datas['message'] : '';
      $data['captcha_filename'] = $cap['filename']; // register
      $sess = array(
            'login_word_captcha' => $data['word'], 
            'register_word_captcha' => $cap['word']
            );
      $this->session->set_userdata($sess);
      $data['title_page'] = 'Register Activation';
      $this->form_validation->set_error_delimiters('<div class="err">', '</div>');
      $this->load->view('Admin_Auth_Reg/Register/Admin_Register',$data);
    }
  }
  #clean
  public function email_validation_login_form($data = FALSE){

    if ($data) {
      $this->load->helper('captcha');
      $data = capt(); // login
      $data['message_success'] = 'Success! Your account is now activated. </br>Please login and edit your account. Thanks!';
      $data['message_error'] = '';
      $data['title_page'] = 'Login';
      $this->load->view('Admin_Auth_Reg/Auth/Admin_Login',$data);
    }
  }
  #clean
  public function forgot_password(){
        $em = $this->input->post();
        if ($em) {
              #adjust to be read on model by convert object to stdClass and pass string to array object
              $email = $em['email'];
              #check if email is existed master profile
              $check_email = $this->model_register->check_email_master_profile($email);
              if ($check_email) {
                  #get master user id
                  #encrypt decrypt email post to match on the data
                  $encrypt_email = $this->tokenz->encrypt($em['email']);
                  $decrypt_email = $this->tokenz->decrypt($encrypt_email);
                  #hash email to match the data
                  $hash_email = base_convert(md5($decrypt_email,TRUE),36,10);
                  #get id master user
                  $get_id = $this->model_register->get_master_user($hash_email);
                  $id = $get_id->id;
                  $true = $id > 0 ? TRUE : FALSE;
                  if ($true) {
                      #email
                      $this->load->library('email');

                      $this->email->from('armstrong17.km@gmail.com', 'Kenneth');
                      $this->email->to($em['email']);
                      // $this->email->cc('another@another-example.com');
                      // $this->email->bcc('them@their-example.com');

                      $this->email->subject('Email Password Recovery');
                      $this->email->message("Please click on the link below to Reset your password. Thanks. \r\n \r\n ".site_url('Admin/Link/Change_Password/').__link($id));

                      $send = $this->email->send();

                      $config['protocol'] = 'sendmail';
                      $config['mailpath'] = '/usr/sbin/sendmail';
                      $config['charset'] = 'iso-8859-1';
                      $config['wordwrap'] = TRUE;

                      $this->email->initialize($config);
                      
                      #check if email sent
                      if ($send) {
                          $data['h_notif'] = 'Success!';
                          $data['notif'] = 'Please visit your email: '.$em['email'].' for recovery information. Thanks!';
                          $data['title_page'] = 'Register Activation';
                          $this->load->view('Admin_Auth_Reg/Register/Admin_Success',$data);
                      } else {
                          $data['notif'] = 'Your request was not send to the server. </br> Please try again. Thanks.';
                          $this->forgot_password_form($data);
                      }// end check email is sent

                  } else {
                      $data['notif'] = 'Something went wrong. Please contact programmer.';
                      $this->forgot_password_form($data);
                  }//end get id master user

              } else {
                  $data['notif'] = 'The Email you provided is not existed.';
                  $this->forgot_password_form($data);
              }//end check if email existed on master profile
        } else {
            $data['notif'] = 'Enter recovery email associated with your account.';
            $this->forgot_password_form($data);
        }//end post
  }
  #clean
  public function forgot_password_form($data = FALSE){
      if ($data) {
          $data['h_notif'] = 'Password Recovery';
          $data['title_page'] = 'Forgot Password Recover';
          $this->load->view('Admin_Auth_Reg/Register/Admin_Forgot_Password',$data);
      }
  }
  #clean
  public function change_password($hashid = FALSE){
      if ($hashid) {
        $d_id = _secure_encode($hashid);
        #valid hash id
        if (!empty($d_id)) {
            $this->password_recovery(__link($d_id));
        } else{
            $data['h_notif'] = 'Password Recovery';
            $data['notif'] = 'Please do not change the link given to you. </br> Big Thanks!';
            $data['title_page'] = 'Change Password';
            $this->password_recovery($data);
        }
      }
  }
  #clean
  public function password_recovery($id = FALSE){
      if ($id) {
          $d_id = _secure_encode($id);
          #valid hash id
          if (!empty($d_id)) {
              $id = $d_id[0];
              $post = $this->input->post();
              #post request
              if ($post) {
                if($this->form_validation->run('change_password') == TRUE) {
                  $data = array(
                          'id' => $id, 
                          'password' => md5($post['password']) 
                          );
                  #update password
                  $update_pass = $this->model_register->update_password_master_user($data);
                  if ($update_pass) {
                        $this->load->helper('captcha');
                        $data = capt(); // login
                        $data['message_success'] = 'Success! You have change your Password. </br>Please login to your account. Thanks!';
                        $data['message_error'] = '';
                        $data['title_page'] = 'Login';
                        $this->load->view('Admin_Auth_Reg/Auth/Admin_Login',$data);
                  } else {
                    $data['id'] = $id;
                    $data['notif'] = 'Please try changing again your password.';
                    $this->password_recovery_form($data);
                  }//end update pass

                } else {
                  $data['id'] = $id;
                  $data['notif'] = '';
                  $this->password_recovery_form($data);
                }// end form validation

              } else {
                $data['id'] = $id;
                $data['notif'] = 'You can now change your password.';
                $this->password_recovery_form($data);
              }// end of post

          } else {
              $data['id'] = '';
              $data['notif'] = 'Please do not change the link given to you. Big Thanks!';
              $this->password_recovery_form($data);
          }// end check valid hash id
      }
  }
  #clean
  public function password_recovery_form($data = FALSE){
      if ($data) {
          $data['h_notif'] = 'Password Recovery';
          $data['title_page'] = 'Change Password';
          $this->form_validation->set_error_delimiters('<div id="err">', '</div>');
          $this->load->view('Admin_Auth_Reg/Register/Admin_Change_Password',$data);
      }
  }

}

