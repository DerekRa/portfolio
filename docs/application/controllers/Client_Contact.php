<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_Contact extends MY_PublicController {
	
	public function __construct(){
		parent::__construct();
	}

	public function index(){

		}

	public function contact_settings(){
		$p = $this->input->post();
		if ($p) {
			echo "<pre>";
			print_r($p);
			die();
			
		}
	}

}

