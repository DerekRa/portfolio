<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_My_Projects extends CI_model {
	
	public function __construct(){
		parent::__construct();
	}
	# get master profile id 
	public function _mp_id(){
		$select = 'SELECT id 
				FROM master_profile 
				WHERE user_id = ?';
		$query = $this->db->query($select,[$this->session->userdata('id')]);
		return $query->num_rows() > 0 ? $query->row() : '';
	}

	# insert my new project 			
	public function insert_new_project($data = FALSE){
		if ($data) {
				$mp_id = $this->_mp_id()->id;
				$datas = array(
								'mp_id' => $mp_id, 
								'description' => $data, 
								'created' => date('Y-m-d H:i:s'), 
								);
				$this->db->insert('my_projects',$datas);
				$insert_id = $this->db->insert_id();
		}
		return $this->db->affected_rows() > 0 ? $insert_id : FALSE;
	}
	# insert my project image 			
	public function insert_proj_image($data = FALSE){
		if ($data) {
				extract($data);
				$datas = array(
								'project_id' => $project_id, 
								'name_of_picture' => $name_of_picture, 
								'picture_format' => $picture_format, 
								'created' => date('Y-m-d H:i:s'), 
								);
				$this->db->insert('project_images',$datas);
		}
		return $this->db->affected_rows() > 0 ? TRUE : FALSE;
	}
	# get my projects
	public function get_my_projects(){
		$select = 'SELECT id,description,created
				FROM my_projects 
				WHERE mp_id = ?
				ORDER BY id DESC  ';
		$mp_id = $this->_mp_id()->id;
		$query = $this->db->query($select,[$mp_id]);
		return $query->num_rows() > 0 ? $query->result() : FALSE;
	}  
	# get my projects images
	public function get_all_images($data = FALSE){
		if ($data) {
			$select = 'SELECT name_of_picture,picture_format
					FROM project_images 
					WHERE project_id = ? ';
			$query = $this->db->query($select,[$data]);
		}
		return $query->num_rows() > 0 ? $query->result() : FALSE;
	}  

// glimpse of my admin
	// # update my services
	// public function update_my_services($data = FALSE){
	// 	if ($data) {
	// 		extract($data);
	// 		$this->db->set('name_of_service',$val_serv);
	// 		$this->db->set('updated',$updated);
	// 		$this->db->where('id',$id);
	// 		$this->db->update('my_services');
	// 	}
	// 	return $this->db->affected_rows() > 0 ? TRUE : FALSE;
	// }
	// # delete my services
	// public function delete_my_service($data = FALSE){
	// 	if ($data) {
	// 		$this->db->where('id', $data);
	// 		$this->db->delete('my_services');
	// 	}
	// 	return $this->db->affected_rows() >= 1 ? TRUE : FALSE;
	// }
}