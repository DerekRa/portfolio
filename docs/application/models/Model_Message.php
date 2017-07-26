<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Message extends CI_model {
	
	public function __construct(){
		parent::__construct();
	}

	public function insert_new_message($data = FALSE){
		if ($data) {
			$this->db->insert('my_messages',$data);
		}
		return $this->db->affected_rows() >= 1 ? TRUE : FALSE;
	}
}