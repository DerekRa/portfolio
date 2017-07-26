<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Contact extends MY_PrivateController {

	public function __construct(){
		parent::__construct();
		$this->view_data['link'] = 'contact';
	}

	public function index(){

	}

	public function contact_settings(){
		$p = $this->input->post();
		if ($p) {
			$this->form_validation->set_rules('contact_number','Contact Information','required');
			$this->form_validation->set_rules('my_schedule','My Schedule','required');
			if ($this->form_validation->run() == TRUE) {
				#update master profile
				$check_update = $this->model_profile->update_contact_details($p);
				if ($check_update) {
					$this->_msg('s','Your Contact Information have been updated. Thanks',site_url('Admin_Contact/Settings'));
				} else {
					$this->_msg('e','Failed on updating your information. Please try again. Thanks.',site_url('Admin_Contact/Settings'));
				}
			}
		}
	}

}