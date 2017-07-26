<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Subscribe extends CI_model {
	
	public function __construct(){
		parent::__construct();
	}

	public function check_email_subscribers($data = FALSE){
		$ret = 0;
		if ($data) {
			$select = "SELECT id 
								FROM subscribers 
								WHERE email_address = ? ";
			$query = $this->db->query($select,[$data]);
			$ret = $query->num_rows();
		}
		return $ret > 0 ? TRUE : FALSE; 
	}

	public function insert_email_subscribers($data = FALSE){
		if ($data) {
			$datas = array(
				'email_address' => $data,
				'created' => date('Y-m-d H:i:s')
				);
			$this->db->insert('subscribers',$datas);
		}
		return $this->db->affected_rows() >= 1 ? TRUE : FALSE;
	}
}