<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Register extends CI_model {
	
	public function __construct(){
		parent::__construct();
	}
	#insert temp 					: register
	public function insert_temp($data = FALSE){
		$this->db->insert('activation',$data);
		$insert_id = $this->db->insert_id();
		return $this->db->affected_rows() >= 1 ? $insert_id : FALSE;
	}
	#check temp 					: registration_email_validation
	public function check_temp($data = FALSE){
		$select = 'SELECT email_temp, password_temp, created 
							FROM activation 
							WHERE id = ? ';
		$query = $this->db->query($select,[$data]);
		return $query->num_rows() > 0 ? TRUE : FALSE; 
	}
	#get temp 						: registration_email_validation
	public function get_temp($data = FALSE){
		$select = 'SELECT email_temp, password_temp, created 
							FROM activation 
							WHERE id = ? ';
		$query = $this->db->query($select,[$data]);
		return $query->num_rows() > 0 ? $query->row() : FALSE; 
	}
	#insert master user 			: registration_email_validation
	public function insert_master_user($data){
		$this->db->insert('master_user',$data);
		$insert_id = $this->db->insert_id();
		return $this->db->affected_rows() >= 1 ? $insert_id : FALSE;
	}
	#insert master profile 			: registration_email_validation
	public function insert_master_profile($data){
		$this->db->insert('master_profile',$data);
		return $this->db->affected_rows() >= 1 ? TRUE : FALSE;
	}
	#get admin restriction limit 			:registration_email_validation
	public function limit_admin_restrictions(){
		$select = 'SELECT admin_limit
							FROM admin_restrictions
							WHERE admin_limit <> 0';
		$query = $this->db->query($select);
		return $query->num_rows() > 0 ? $query->row() : FALSE; 
	}
	#count admin restriction 			: registration_email_validation
	public function count_admin_restrictions(){
		$select = 'SELECT count(id) as count
							FROM admin_restrictions';
		$query = $this->db->query($select);
		return $query->num_rows() > 0 ? $query->row() : FALSE; 
	}
	#insert admin restriction 			: registration_email_validation
	public function insert_admin_restrictions($data){
		$this->db->insert('admin_restrictions',$data);
		return $this->db->affected_rows() >= 1 ? TRUE : FALSE;
	}
	#delete temp 			: registration_email_validation
	public function delete_temp($data){
		$this->db->where('id', $data);
		$this->db->delete('activation');
		return $this->db->affected_rows() >= 1 ? TRUE : FALSE;
	} 
	#check email master profile 			: registration_email_validation, forgot_password, login
	public function check_email_master_profile($data){
		if ($data) {
		$email = $data;
		$select = "SELECT id 
							FROM master_profile 
							WHERE email_address
							LIKE '%$email%' ";
		$query = $this->db->query($select);
		}
		return $query->num_rows() > 0 ? TRUE : FALSE; 
	}
	#check email master user 			: registration_email_validation
	public function check_email_master_user($data){
		$select = "SELECT id 
							FROM master_user 
							WHERE email_address = ? ";
		$query = $this->db->query($select,[$data]);
		return $query->num_rows() > 0 ? TRUE : FALSE; 
	}
	#get id master user 			: registration_email_validation, 
	public function get_master_user($data = FALSE){
		$select = 'SELECT id 
							FROM master_user 
							WHERE email_address = ? ';
		$query = $this->db->query($select,[$data]);
		return $query->num_rows() > 0 ? $query->row() : FALSE; 
	}
	#check admin restriction 			: registration_email_validation
	public function check_admin_restriction($data = FALSE){
		$select = 'SELECT id 
							FROM admin_restrictions 
							WHERE user_id = ? ';
		$query = $this->db->query($select,[$data]);
		return $query->num_rows() > 0 ? TRUE : FALSE; 
	}
	#update password 				: password_recovery
	public function update_password_master_user($data = FALSE){
		if ($data) {
			extract($data);
			$this->db->set('password',$password);
			$this->db->where('id',$id);
			$this->db->update('master_user');
		}
		return $this->db->affected_rows() >= 1 ? TRUE : FALSE;
	}

}