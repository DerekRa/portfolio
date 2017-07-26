<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_My_Skills extends CI_model {
	
	public function __construct(){
		parent::__construct();
	}
	# get master profile id 				 : check_my_skills_exist, 
																	#: insert_my_skills, 
																	#: update_delete_my_skills, 
																	#: get_name_of_skill
	public function _mp_id(){
		$select = 'SELECT id 
				FROM master_profile 
				WHERE user_id = ?';
		$query = $this->db->query($select,[$this->session->userdata('id')]);
		return $query->num_rows() > 0 ? $query->row() : '';
	}
	# check if my skill is existed 				: add_skills
	public function check_my_skills_exist(){
		$select = 'SELECT id  
							FROM my_skills 
							WHERE mp_id = ? 
							AND project_id IS NULL' ;
		$mp_id = $this->_mp_id()->id;
		$query = $this->db->query($select,$mp_id);
		return $query->num_rows() > 0 ? TRUE : FALSE;
	}
	# insert my skills 				: add_skills
	public function insert_my_skills($data = FALSE){
		if ($data) {
				$str = $data['tagsinput'];
				$ex = explode(',', $str);
				for ($i=0; $i < count($ex); $i++) { 
					$mp_id = $this->_mp_id()->id;
					$datas = array(
									'name_of_skill' => $ex[$i], 
									'mp_id' => $mp_id, 
									'created' => date('Y-m-d H:i:s'), 
									);
					$this->db->insert('my_skills',$datas);
				}
		}
		return $this->db->affected_rows() > 0 ? TRUE : FALSE;
	}
	# update my skills 				: add_skills
	public function update_delete_my_skills($data = FALSE){
		if ($data) {
			$str = $data['tagsinput'];
			$ex = explode(',', $str);
			$arr = $this->get_name_of_skill();
			#delete if not in the post request
			// echo 'update<pre>';var_dump($arr);die();
			foreach ($arr as $k => $v) {
					$id = $v->id;
					$name = $v->name_of_skill;	
					$delete = TRUE;
					for ($d=0; $d < count($ex); $d++) { 
						if($v->name_of_skill == $ex[$d]){	
							$delete = FALSE;
						}
					}
					if ($delete) {
						// echo "inside delte " . $name;die();
						$this->db->where('id', $id);
						$this->db->delete('my_skills');
					}
			}
					// echo "<pre>";	var_dump($ex);
			#insert if not in the existed
			for ($i=0; $i < count($ex); $i++) {
						// echo "inside insert <br>";
					$insert = TRUE; 
					foreach ($arr as $x => $y) {
						// echo '<br>houy ' . $ex[$i] . ' =+=+= ' . $y->name_of_skill;
						if($ex[$i] == $y->name_of_skill){
							$insert = FALSE;
						}
					}
					// var_dump($insert);
					// echo  ' === ' . $i . '<br>'; 
					// if ($i == 5) {
					// 	die();
					// }
					if ($insert) {
						// echo $ex[$i];
						// echo "<br>now inside insert";die();
						$mp_id = $this->_mp_id()->id;
						$datas = array(
										'name_of_skill' => $ex[$i], 
										'mp_id' => $mp_id, 
										'created' => date('Y-m-d H:i:s'), 
										);
						$this->db->insert('my_skills',$datas);
					}
			}
						// echo "end";die();

		}
		return $this->db->affected_rows() > 0 ? TRUE : FALSE;
	}
	#get self introduction 				: about_skills
	public function get_name_of_skill(){
		$select = 'SELECT id,name_of_skill,rating 
				FROM my_skills 
				WHERE mp_id = ? 
				AND project_id IS NULL 
				ORDER BY id DESC';
		$mp_id = $this->_mp_id()->id;
		$query = $this->db->query($select,[$mp_id]);
		return $query->num_rows() > 0 ? $query->result() : FALSE;
	}  
	#update skill rates 				: rate_skills
	public function update_skill_ratings($data = FALSE){
		if ($data) {
			foreach ($data as $k => $v) {
				$id = $v[0];
				$rate = $v[1];
				$datas = array(
								'rating' => $rate, 
								'updated' => date('Y-m-d H:i:s'), 
								);
				$this->db->where('id',$id);
				$this->db->update('my_skills',$datas);
			}
		}
		return $this->db->affected_rows() > 0 ? TRUE : FALSE;
	}
	# insert my skills 				: upload_pictures
	public function insert_skills_proj($data = FALSE){
		if ($data) {
				extract($data);
				$ex = explode(',', $skills);
				for ($i=0; $i < count($ex); $i++) { 
					$mp_id = $this->_mp_id()->id;
					$datas = array(
									'mp_id' => $mp_id, 
									'project_id' => $project_id, 
									'name_of_skill' => $ex[$i], 
									'created' => date('Y-m-d H:i:s'), 
									);
					$this->db->insert('my_skills',$datas);
				}
		}
		return $this->db->affected_rows() > 0 ? TRUE : FALSE;
	}
	#get my project				: work_settings, upload_pictures
	public function get_name_of_skill_proj($data = FALSE){
		if ($data) {
			$select = 'SELECT name_of_skill 
					FROM my_skills 
					WHERE mp_id = ? 
					AND project_id = ? 
					ORDER BY id DESC';
			$mp_id = $this->_mp_id()->id;
			$datas = array(
							'mp_id' => $mp_id, 
							'project_id' => $data, 
							);
			$query = $this->db->query($select,$datas);
			return $query->num_rows() > 0 ? $query->result() : FALSE;
		}
	} 
}