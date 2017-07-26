<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
	}

	public function ajax_message(){
			$p = $this->input->post();
			$ret['status'] = FALSE;
			if ($p) {
				$this->load->model('model_message');
				$p['created'] = date('Y-m-d H:i:s');
				$check_insert = $this->model_message->insert_new_message($p);
				if ($check_insert) {
					$ret['status'] = TRUE;
				}
			}
			echo json_encode($ret);
			exit(0);
	}

}