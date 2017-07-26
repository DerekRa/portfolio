<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribe extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_subscribe');
	}

	public function index(){
		// $this->settings();
	}

	public function settings(){
			// $p = $this->input->post();
			// $ret = FALSE;
			// if ($p) {
			// 	$ret = $p;
			// }
			// return json_encode($ret);

		$this->load->view('Subscribe/settings');
	}

	public function post(){
		$p = $this->input->post();
		$ret['msg_err'] = '';
		$ret['msg_succ'] = '';
		if ($p) {
			// $check = $this->model_subscribe->check_email();
			// if () {
			// 	# code...
			// }
			$ret['post'] = $p['last_name'];
		}

		echo json_encode($ret);
		exit(0);
	}

	public function email(){
		$p = $this->input->post();
		$ret['msg_err'] = FALSE;
		$ret['msg_succ'] = FALSE;
		if ($p) {	
			$em = $p['email'];
			#check first email if already in the db
			$check_em = $this->model_subscribe->check_email_subscribers($em);
			if ($check_em) {
				$ret['msg_err'] = 'Your email is already on my bucket list! Thank you!';
			} else {
				#insert email to db
				$insert_em = $this->model_subscribe->insert_email_subscribers($em);
				if ($insert_em) {
					$ret['msg_succ'] = 'Thank you for subscribing! Visit your email w/n 24 hours.';
				} else {
					$ret['msg_err'] = 'Something went wrong. Please try again. Thanks.';
				}
			}
		}
		echo json_encode($ret);
		exit(0);
	}
}