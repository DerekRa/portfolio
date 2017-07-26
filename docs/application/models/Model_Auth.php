<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Auth extends CI_model {
	
	public function __construct(){
		parent::__construct();
	}
	#check email & username master profile 			: login
	public function check_email_username_master_profile($data){
		$email = $data['email_address'];
		$username = $data['username'];
		$select = "SELECT id 
							FROM master_profile 
							WHERE email_address 
							LIKE '%$email%' 
							OR 
							username 
							LIKE '%$username%' ";
		$query = $this->db->query($select);
		return $query->num_rows() > 0 ? TRUE : FALSE; 
	}
	#check credential master user 			: login
	public function check_credential($data = FALSE){
		$select = "SELECT id, username FROM master_user 
							WHERE (username = ? OR email_address = ?)
							AND password = ? ";
		$query = $this->db->query($select,$data);
		return $query->num_rows() > 0 ? TRUE : FALSE; 
	}
	#get credential master user 			 : login
	public function get_credential($data = FALSE){
		$select = 'SELECT id, username, email_address FROM master_user 
							WHERE (username = ? OR email_address = ?)
							AND password = ? ';
		$query = $this->db->query($select,$data);
		return $query->num_rows() > 0 ? $query->row() : FALSE; 
	}
}