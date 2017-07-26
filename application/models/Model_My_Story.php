<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_My_Story extends CI_model {
	
	public function __construct(){
		parent::__construct();
	}
	# get master profile id 				: home_settings, life_story
	public function _mp_id(){
		$select = 'SELECT id 
				FROM master_profile 
				WHERE user_id = ?';
		$query = $this->db->query($select,[$this->session->userdata('id')]);
		return $query->num_rows() > 0 ? $query->row() : '';
	}
	# check if my story is existed 				: home_settings, life_story
	public function check_my_story_exist(){
		$select = 'SELECT id as count 
							FROM my_story 
							WHERE mp_id = ?';
		$mp_id = $this->_mp_id()->id;
		$query = $this->db->query($select,$mp_id);
		// echo $this->db->last_query();die();
		return $query->num_rows() > 0 ? TRUE : FALSE;
	}
	# insert my story 				: home_settings, life_story
	public function insert_my_story($data = FALSE){
		if ($data) {
			$this->db->insert('my_story',$data);
		}
		return $this->db->affected_rows() > 0 ? TRUE : FALSE;
	}
	# update my story 				: home_settings, life_story
	public function update_my_story($data = FALSE){
		if ($data) {
			$mp_id = $this->_mp_id()->id;
			$this->db->where('mp_id', $mp_id);
			$this->db->update('my_story', $data);
		}
		return $this->db->affected_rows() > 0 ? TRUE : FALSE;
	}
	#get self introduction 				: home_settings, life_story
	public function get_my_story(){
		$select = 'SELECT self_introduction, 
								life_adventure, 
								video_file_name,
								video_description
						FROM my_story 
						WHERE mp_id = ?';
		$mp_id = $this->_mp_id()->id;
		$query = $this->db->query($select,$mp_id);
		// echo $this->db->last_query();die();
		return $query->num_rows() > 0 ? $query->row() : FALSE;
	}  
}