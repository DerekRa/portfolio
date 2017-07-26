<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Home extends MY_PrivateController {
	
	public function __construct(){
		parent::__construct();
		$this->view_data['link'] = 'home';
	}

	public function index(){

		}

	public function home_settings(){
			#get selft introduction 
			$get_self_int = $this->model_my_story->get_my_story();
			$this->view_data['self_intro'] = $get_self_int ? $get_self_int->self_introduction : '' ;
			$post = $this->input->post();
			#post request
			if ($post) {
					$this->form_validation->set_rules('self_introduction', 'Self Introduce', 'required|min_length[5]');
					#form validation
					if ($this->form_validation->run() == TRUE) {
					
					 	#upload to my_story table
						#check if already created
						$check_account = $this->model_my_story->check_my_story_exist();
						if ($check_account) {
							$post['updated'] = date('Y-m-d H:i:s');
							#update data
							$update_my_story = $this->model_my_story->update_my_story($post);
							if ($update_my_story) {
								$this->_msg('s','Your Self Introduction have been updated. Thank you.','Admin_Home/Settings');
							} else {
								$this->_msg('e','Failed on updating Self Introduction. Please try again. Thanks.','Admin_Home/Settings');
							}// end update of data
						} else {
							$post['mp_id'] = $this->model_my_story->_mp_id()->id;
							$post['created'] = date('Y-m-d H:i:s');
							#insert data
							$insert_my_story = $this->model_my_story->insert_my_story($post);
							if ($insert_my_story) {
								$this->_msg('s','Your Self Introduction have been saved. Thank you.','Admin_Home/Settings');
							} else {
								$this->_msg('e','Failed on uploading Self Introduction. Please try again. Thanks.','Admin_Home/Settings');
							}// end insert of data
						}// end checking if created
					}// end form validation
			}//end post request
	}
}

