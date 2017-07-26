<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Model_Client_Information extends CI_model {
		
		public function __construct(){
			parent::__construct();
		}
		#user id
		public function _master_user(){
			$s = 'SELECT user_id FROM admin_restrictions 
						WHERE master_admin = 1';
			$q = $this->db->query($s);
			return $q->num_rows() > 0 ? $q->row() : FALSE;
		}
		#master profile information
		public function _master_prof(){
			$u_id = $this->_master_user();
			$ret = FALSE;
			if ($u_id) {
				$s = 'SELECT id,
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
										created
							FROM master_profile 
							WHERE user_id = ?';
				$q = $this->db->query($s,$u_id->user_id);
			  $ret = $q->num_rows() > 0 ? $q->row() : FALSE;
			}
			return $ret;
		}
		#social links
		public function social_accounts(){
			$mp_id = $this->_master_prof();
			$ret = FALSE;
			if ($mp_id) {
				$s = 'SELECT 
							name_of_link,
							class_of_link,
							link_address
				FROM social_accounts 
				WHERE mp_id = ?';
				$q = $this->db->query($s,$mp_id->id);
			  $ret = $q->num_rows() > 0 ? $q->result() : FALSE;
			}
			return $ret;
		}

		public function my_story(){
			$mp_id = $this->_master_prof();
			$ret = FALSE;
			if ($mp_id) {
				$s = 'SELECT 
							self_introduction,
							life_adventure,
							video_file_name,
							video_description
				FROM my_story 
				WHERE mp_id = ?';
				$q = $this->db->query($s,$mp_id->id);
			  $ret = $q->num_rows() > 0 ? $q->row() : FALSE;
			}
			return $ret;
		}

		public function my_skills(){
			$mp_id = $this->_master_prof();
			$ret = FALSE;
			if ($mp_id) {
				$s = 'SELECT 
							name_of_skill,
							rating
				FROM my_skills 
				WHERE mp_id = ?
				AND project_id IS NULL';
				$q = $this->db->query($s,$mp_id->id);
			  $ret = $q->num_rows() > 0 ? $q->result() : FALSE;
			}
			return $ret;
		}

		public function my_services(){
			$mp_id = $this->_master_prof();
			$ret = FALSE;
			if ($mp_id) {
				$s = 'SELECT 
							name_of_service
				FROM my_services 
				WHERE mp_id = ?';
				$q = $this->db->query($s,$mp_id->id);
			  $ret = $q->num_rows() > 0 ? $q->result() : FALSE;
			}
			return $ret;
		}

		public function my_projects(){
			$mp_id = $this->_master_prof();
			$ret = FALSE;
			if ($mp_id) {
				$s = 'SELECT 
							id,
							description
				FROM my_projects 
				WHERE mp_id = ?';
				$q = $this->db->query($s,$mp_id->id);
			  $ret = $q->num_rows() > 0 ? $q->result() : FALSE;
			}
			return $ret;
		}

		public function get_proj_skills($data = FALSE){
			$mp_id = $this->_master_prof();
			$ret = FALSE;
			if ($data) {
				$select = 'SELECT name_of_skill 
						FROM my_skills 
						WHERE mp_id = ? 
						AND project_id = ? 
						ORDER BY id DESC';
				$datas = array(
								'mp_id' => $mp_id->id, 
								'project_id' => $data 
								);
				$query = $this->db->query($select,$datas);
				$ret = $query->num_rows() > 0 ? $query->result() : FALSE;
			}
			return $ret;
		} 

		public function get_proj_images($data = FALSE){
			$ret = FALSE;
			if ($data) {
				$select = 'SELECT 
											name_of_picture,
											picture_format
									FROM project_images 
									WHERE project_id = ? ';
				$query = $this->db->query($select,[$data]);
				$ret = $query->num_rows() > 0 ? $query->result() : FALSE;
			}
			return $ret;
		}

	}