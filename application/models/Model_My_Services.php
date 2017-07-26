<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_My_Services extends CI_model {
	
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
	# check if my services is existed 
	public function count_my_services_exist(){
		$select = 'SELECT count(id) as count  
							FROM my_services 
							WHERE mp_id = ? ' ;
		$mp_id = $this->_mp_id()->id;
		$query = $this->db->query($select,$mp_id);
		return $query->num_rows() > 0 ? $query->row() : FALSE;
	}
	# insert my services 			
	public function insert_my_services($data = FALSE){
		if ($data) {
				// $count = $this->count_my_services_exist()->count;
				// $countsize = $count == 0 ? 1 : $count;
				// var_dump(count($data));die();
				for ($i=1; $i <= count($data); $i++) { 
				// var_dump($data['service'.$i]);die();
					$mp_id = $this->_mp_id()->id;
					$datas = array(
									'name_of_service' => $data['service'.$i], 
									'mp_id' => $mp_id, 
									'created' => date('Y-m-d H:i:s'), 
									);
					$this->db->insert('my_services',$datas);
				} //echo 'out'; die();
		}
		return $this->db->affected_rows() > 0 ? TRUE : FALSE;
	}
	# get my services
	public function get_name_of_services(){
		$select = 'SELECT id,name_of_service
				FROM my_services 
				WHERE mp_id = ? ';
		$mp_id = $this->_mp_id()->id;
		$query = $this->db->query($select,[$mp_id]);
		return $query->num_rows() > 0 ? $query->result() : FALSE;
	}  
	# update my services
	public function update_my_services($data = FALSE){
		if ($data) {
			extract($data);
			$this->db->set('name_of_service',$val_serv);
			$this->db->set('updated',$updated);
			$this->db->where('id',$id);
			$this->db->update('my_services');
		}
		return $this->db->affected_rows() > 0 ? TRUE : FALSE;
	}
	# delete my services
	public function delete_my_service($data = FALSE){
		if ($data) {
			$this->db->where('id', $data);
			$this->db->delete('my_services');
		}
		return $this->db->affected_rows() >= 1 ? TRUE : FALSE;
	}
}