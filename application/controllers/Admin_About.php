<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_About extends MY_PrivateController {

	public function __construct(){
		parent::__construct();
		$this->view_data['link'] = 'about';
		$this->load->model('model_my_skills');
		$this->load->model('model_my_services');
	}

	public function index(){
	}
 
	public function about_settings(){
		
			// $this->clear_path_cache(site_url('Admin_About/Settings'));
			#get name of skills 
			$get_my_skills = $this->model_my_skills->get_name_of_skill();
			$em = '';
			if ($get_my_skills) {
				foreach ($get_my_skills as $k => $v) {
					$em .= $v->name_of_skill . ',';
				}
			}
			$this->view_data['my_skills'] = $em;
			$this->view_data['ratings'] = $get_my_skills;
			#get life story
			$get_life_story = $this->model_my_story->get_my_story();
			$this->view_data['life_story'] = $get_life_story ? $get_life_story->life_adventure : '' ;
			$this->view_data['video_desc'] = $get_life_story ? $get_life_story->video_description : '' ;
			if ($this->input->post()) {
				echo "you die";
				die();
			}
			#get name of services
			$get_my_services = $this->model_my_services->get_name_of_services();
			$this->view_data['my_services'] = $get_my_services;
		}

	public function add_skills(){
			$p = $this->input->post();
			#post request
			if ($p) {

					$this->form_validation->set_rules('tagsinput', 'Skills', 'required');
					#form validation
					if ($this->form_validation->run() == TRUE) {
					 	#upload to my_story table
						#check if already created
						$check_skills = $this->model_my_skills->check_my_skills_exist();
						// var_dump($check_skills);
						if ($check_skills) {
							#update data
							// echo "inside";die();
							$update_my_story = $this->model_my_skills->update_delete_my_skills($p);
							if ($update_my_story) {
								$this->_msg('s','Your Skills have been updated. Thank you.','Admin_About/Settings');
							} else {
								$this->_msg('e','Failed on updating Skill. Please try again. Thanks.','Admin_About/Settings');
							}// end update of data
						} else {
							#insert new data
							$insert_my_skills = $this->model_my_skills->insert_my_skills($p);
							if ($insert_my_skills) {
								$this->_msg('s','Your Skills have been saved. Thank you.','Admin_About/Settings');
							} else {
								$this->_msg('e','Fail on uploading Skills. Please try again. Thanks.','Admin_About/Settings');
							}// end insert of data
						}// end checking if created
					}// end form validation
			}//end post request
	}

	public function rate_skills(){
			$p = $this->input->post();
			#post request
			if ($p) {
				#update skill ratings
				$update_skill_rates = $this->model_my_skills->update_skill_ratings($p);
				if ($update_skill_rates) {
							$this->_msg('s','Your Skill Rates have been updated. Thank you.','Admin_About/Settings');
				} else {
							$this->_msg('e','Failed on updating your Skill Rates. Please try again. Thanks.','Admin_About/Settings');
				}
			}
	}

	public function life_story(){
			$p = $this->input->post();
			#post request
			if ($p) {
					$this->form_validation->set_rules('life_adventure', 'Life Story', 'required');
					#form validation
					if ($this->form_validation->run() == TRUE) {
					 	#upload to my_story table
						#check if already created
						$check_account = $this->model_my_story->check_my_story_exist();
						if ($check_account) {
							$p['updated'] = date('Y-m-d H:i:s');
							#update data
							$update_my_story = $this->model_my_story->update_my_story($p);
							if ($update_my_story) {
								$this->_msg('s','Your Life Story have been updated. Thank you.','Admin_About/Settings');
							} else {
								$this->_msg('e','Failed on updating Life Story. Please try again. Thanks.','Admin_About/Settings');
							}// end update of data
						} else {
							$p['mp_id'] = $this->model_my_story->_mp_id()->id;
							$p['created'] = date('Y-m-d H:i:s');
							#insert data
							$insert_my_story = $this->model_my_story->insert_my_story($p);
							if ($insert_my_story) {
								$this->_msg('s','Your Life Story have been saved. Thank you.','Admin_About/Settings');
							} else {
								$this->_msg('e','Failed on uploading Life Story. Please try again. Thanks.','Admin_About/Settings');
							}// end insert of data
						}// end checking if created
					}// end form validation
			}//end post request
	}

	public function upload_video(){
		$p = $this->input->post();
		if ($p) {	
				set_time_limit(0);
				ini_set('upload_max_filesize', '200M');
				ini_set('post_max_size', '200M');                               
				ini_set('max_input_time', 3000);                                
				ini_set('max_execution_time', 3000);
				$config['upload_path'] = './assets/files/upload_vid_file';
				$config['allowed_types'] = 'mp4';
				// $config['max_size']	= '102400';
				$config['max_size']	= '602400000';
				$config['file_name'] = 'my-video'.__link($this->session->userdata('id'));
				$config['overwrite'] = TRUE;
				$config['remove_spaces'] = TRUE;
        $config['max_width']='200000000';
        $config['max_height']='1000000000000';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ( ! $this->upload->do_upload('userfile'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->_msg('e',' '.$error['error'],'Admin_About/Settings');
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
					//resize start
					$source_path = $data['upload_data']['full_path'];


					if($data)
					{
						$this->_msg('s','Video has been uploaded, changes will be applied in few minutes.','Admin_About/Settings');
					}else{
						$this->_msg('e','An error occured while trying to upload video','Admin_About/Settings');
					}
				}			
		}
	}

	public function add_services(){
		$p = $this->input->post();
		#post request
		if ($p) {
				#insert services
				$check_insert = $this->model_my_services->insert_my_services($p);
				if ($check_insert) {
					$this->_msg('s','Your Services have been saved. Thank you.','Admin_About/Settings');
				} else {
					$this->_msg('e','Failed on saving your Services. Please try again. Thank you.','Admin_About/Settings');
				}// end insert check
		}// end post request
	}

	public function update_my_services(){
		$p = $this->input->post();
		$p['updated'] = date('Y-m-d H:i:s');
		#post request
		if ($p) {
			#update link account
			$true = $this->model_my_services->update_my_services($p);
			if ($true) {
				$ret['status'] = true;
			} else {
				$ret['status'] = false;
			}//end update link name
		} else {
			$ret['status'] = false;
		}//end check post
		echo json_encode($ret);
		exit(0);
	}

	public function delete_my_service(){
		$p = $this->input->post();
		#post request
		if ($p) {
			$id = $p['id'];
			#update link account
			$true = $this->model_my_services->delete_my_service($id);
			if ($true) {
				$ret['status'] = true;
			} else {
				$ret['status'] = false;
			}//end update link name
		} else {
			$ret['status'] = false;
		}//end check post
		$ret['ids'] = $id;
		echo json_encode($ret);
		exit(0);
	}

	public function update_video_description(){
		$p = $this->input->post();
		$ret['msg_succ'] = false;
		$ret['msg_err'] = false;
		$ret['status'] = false;
		if ($p) {
			$data['video_description'] = $p['vid_des'];
			$check_vd = $this->model_my_story->update_my_story($data);
			if ($check_vd) {
				$ret['status'] = true;
				$ret['msg_succ'] = 'You have updated your video description. Thanks.';
			} else {
				$ret['msg_err'] = 'Something went wrong. Please try again.';
			}
		}
		echo json_encode($ret);
		exit(0);
	}
}