<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Profile extends CI_model {
	
	public function __construct(){
		parent::__construct();
	}
	#get master profile 						: MY_PrivateController __construct
	public function get_master_profile($data = FALSE){
		$select = 'SELECT 
									id as mp_id,
									first_name, 
									last_name, 
									middle_name, 
									date_of_birth, 
									gender, 
									address, 
									provincial_address, 
									contact_number, 
									username, 
									email_address, 
									my_schedule, 
									citation, 
									created, 
									updated 
							FROM master_profile 
							WHERE user_id = ? ';
		$query = $this->db->query($select,[$data]);
		return $query->num_rows() > 0 ? $query->row() : FALSE; 
	}
	#check username 				: profile_settings
	public function check_username_master_profile($data = FALSE){
		$select = 'SELECT id FROM master_profile WHERE username LIKE "%$data%"';
		$query = $this->db->query($select);
		return $query->num_rows() > 0 ? TRUE : FALSE;
	}
	#update master profile 				: profile_settings
	public function update_master_profile($data = FALSE){
		if ($data) {
			$this->db->set($data);
			$this->db->where('user_id',$this->session->userdata('id'));
			$this->db->update('master_profile');
		}
		return $this->db->affected_rows() > 0 ? TRUE : FALSE;
	}
	#insert social links 				: social_links
	public function insert_links($data = FALSE){
		if ($data) {
					$mp_id = $data['mp_id'];
					$date = date('Y-m-d H:i:s');
					$array_size = count($data) - 1;
					$arr_start = $data['count_existed_links'];
					$start = $arr_start->count == 0 ? 1 : $arr_start->count + 1;
					// echo "<pre>";
					// $ex = $data['linkicon2'][1][0];
					// $x = explode(',', $ex);
					// var_dump($data);
					// var_dump($start);
					// var_dump($array_size);
					// print_r($ex);
					// die();
					for ($x=$start; $x < $array_size; $x++) { 
						$expl = $data['linkicon'.$x][1][0];
						$xli = explode(',', $expl);
						$data_insert = array(
							'mp_id' => $mp_id, 
							'link_address' => $data['linkicon'.$x][0][0], 
							'name_of_link' => $xli[0], 
							'class_of_link' => $xli[1], 
							'created' => $date
							);
						// var_dump($data_insert);echo "</pre>";die();
						$this->db->insert('social_accounts',$data_insert);
					}//die();
		}
		return $this->db->affected_rows() >= 1 ? TRUE : FALSE;
	}
	#get all social links 				: Admin_Profile __construct()
	public function get_all_links($data = FALSE){
		if ($data) {
				$select = 'SELECT 
								id as links_id,
								name_of_link, 
								link_address, 
								created, 
								updated 
						FROM social_accounts 
						WHERE mp_id = ? ';
			$query = $this->db->query($select,[$data]);
		}
			return $query->num_rows() > 0 ? $query->result() : FALSE; 
	}
	#count existed social accounts 				: profile_settings, social_links
	public function count_existed_links($data = FALSE){
		if ($data) {
			$select = 'SELECT count(id) as count
					FROM social_accounts
					WHERE mp_id = ?';
			$query = $this->db->query($select,[$data]);
		}
		return $query->num_rows() > 0 ? $query->row() : FALSE; 
	}
	#update link account address 				: update_links_account_address
	public function update_link_address($data = FALSE){
		if ($data) {
			extract($data);
			$this->db->set('link_address',$val_link);
			$this->db->set('updated',$updated);
			$this->db->where('id',$val_id);
			$this->db->update('social_accounts');
		}
		return $this->db->affected_rows() > 0 ? TRUE : FALSE;
	}
	#update link account name 				: update_links_account_name
	public function update_link_name($data = FALSE){
		if ($data) {
			extract($data);
			$ex = $val_link;
			$x = explode(',', $ex);
			$nl = $x[0];
			$cl = $x[1];
			$this->db->set('name_of_link',$nl);
			$this->db->set('class_of_link',$cl);
			$this->db->set('updated',$updated);
			$this->db->where('id',$val_id);
			$this->db->update('social_accounts');
		}
		return $this->db->affected_rows() > 0 ? TRUE : FALSE;
	}
	#delete link account 				: delete_links_account
	public function delete_link_account($data = FALSE){
		if ($data) {
			$this->db->where('id', $data);
			$this->db->delete('social_accounts');
		}
		return $this->db->affected_rows() >= 1 ? TRUE : FALSE;
	}
	#get mp id
	public function _mp_id(){
		$select = 'SELECT id 
				FROM master_profile 
				WHERE user_id = ?';
		$query = $this->db->query($select,[$this->session->userdata('id')]);
		return $query->num_rows() > 0 ? $query->row() : '';
	}
	#update contact number and my schedule
	public function update_contact_details($data = FALSE){
		if ($data) {
			$mp_id = $this->_mp_id()->id;
			$this->db->where('id',$mp_id);
			$this->db->update('master_profile',$data);
		}
		return $this->db->affected_rows() >= 1 ? TRUE : FALSE;
	}
} 
 