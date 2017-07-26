<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Profile extends MY_PrivateController {

	public function __construct(){
		parent::__construct();
		$this->view_data['link'] = 'profy';
		$this->load->model('model_profile');
		$all_links = $this->model_profile->get_all_links($this->view_data['profile']->mp_id);
		$this->view_data['all_links'] = $all_links;
		// echo (!empty($all_links)) ? 'true' : 'false';
		// echo "<br>";
		// var_dump($all_links);die();
		$this->view_data['msg'] = $this->_msg();
		$this->view_data['mess_error'] = '';
		$this->view_data['mess_success'] = '';
		$this->view_data['message_error'] = '';
		$this->view_data['message_success'] = '';
		// var_dump(count($all_links));
		// echo "<pre>";
		// var_dump($all_links);die();
		// $this->_lv('Admin_Profile/profile_settings','s','');
	}

	public function index(){
	}

	public function profile_settings(){
				#post request
				$post = $this->input->post();
				if ($post)	 {
					$this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[2]|max_length[50]');
					$this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[2]|max_length[50]');
					$this->form_validation->set_rules('middle_name', 'Middle Name', 'required|min_length[2]|max_length[50]');
					// $this->form_validation->set_rules('date_of_birth', 'Birthday in dd-mm-yyyy form', 'callback_dob');
					$this->form_validation->set_rules('address', 'Address', 'min_length[5]');
					$this->form_validation->set_rules('provincial_address', 'Provincial Address', 'min_length[5]');
					$this->form_validation->set_rules('username', 'Username', 'min_length[3]');
					$this->form_validation->set_rules('citation', 'Citation', 'min_length[5]');
					if ($this->form_validation->run() == TRUE) {
							#check username
							if (!empty($post['username'])) {
								$check_username = $this->model_profile->check_username_master_profile($post['username']);
								if ($check_username) {
									$this->_msg('e','Username you provided already into database.',site_url('Admin_Profile/Profile_Settings'));
									// $this->_lv('Admin_Profile/profile_settings','e','Username you provided already into database.');
								}
							} 
							#update master profile
							unset($post['agree']);
							$post['updated'] = date('Y-m-d H:i:s');
							$true_update = $this->model_profile->update_master_profile($post);
							if ($true_update) {
								$this->_msg('s','You have updated your profile. Thank you!',site_url('Admin_Profile/Profile_Settings'));
								// $this->_lv('Admin_Profile/profile_settings','s','You have updated your profile. Thank you!');
							} else {
								$this->_msg('e','Failed on updating your profile. Try again.',site_url('Admin_Profile/Profile_Settings'));
								// $this->_lv('Admin_Profile/profile_settings','e','Failed on updating your profile. Try again.');
							}

					} 
					// else {
						// $this->_lv('Admin_Profile/profile_settings');
						// $this->_msg('e','Ops sometime went wrong!', site_url('Admin_Profile'));
					// }

				} // end check if post submitted
				$mp_id = $this->view_data['profile']->mp_id;
				$c_existed = $this->model_profile->count_existed_links($mp_id);
				$this->view_data['existed_links_count'] = $c_existed;

	}

	public function social_links(){
		$post = $this->input->post();
		#post request
		if ($post) {
			$mp_id = $this->view_data['profile']->mp_id;
			$c_existed = $this->model_profile->count_existed_links($mp_id);
			$post['count_existed_links'] = $c_existed;
			$post['mp_id'] = $mp_id;
			#insert links account
			$true = $this->model_profile->insert_links($post);  
			if ($true) {
				$this->_msg('s','The links have been updated.', site_url('Admin_Profile'));
			} else{
				$this->_msg('e','Failed on updating your links.', site_url('Admin_Profile'));
			}
		}// end post request 
	}

	public function update_links_account_address(){
		$post = $this->input->post();
		#post request
		if ($post) {
			$url = $post['val_link'];
			$post['updated'] = date('Y-m-d H:i:s');
			$check_url = $this->valid_url($url);
			#check post url
			if ($check_url) {
				#update link account
				$true = $this->model_profile->update_link_address($post);
				if ($true) {
					$ret['status'] = true;
				} else {
					$ret['status'] = false;
				}//end update link
			} else {
				$ret['status'] = false;
			}//end url check
		} else {
			$ret['status'] = false;
		}//end post request
		echo json_encode($ret);
		exit(0);
	}

	public function valid_url($url)
	{

		return (filter_var($url, FILTER_VALIDATE_URL) !== FALSE);
	}

	public function update_links_account_name(){
		$post = $this->input->post();
		$post['updated'] = date('Y-m-d H:i:s');
		$url = $post['val_link'];
		#post request
		if ($post) {
			#update link account
			$true = $this->model_profile->update_link_name($post);
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

	public function delete_links_account(){
		$post = $this->input->post();
		#post request
		if ($post) {
		$id = $post['val_id'];
			#update link account
			$true = $this->model_profile->delete_link_account($id);
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

	public function upload_prof_picture(){
		$post = $this->input->post();
		if ($post) {
				set_time_limit(0);
				$config['upload_path'] = './assets/files/upload_prof_pic';
				$config['allowed_types'] = 'jpg';
				$config['max_size']	= '1000';
				$config['file_name'] = 'my-prof-img'.__link($this->session->userdata('id'));
				$config['overwrite'] = TRUE;
				$config['width']	 = 270;
				$config['height'] = 229;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ( ! $this->upload->do_upload('userfile'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->_msg('e',' '.$error['error'],'Admin_Profile/profile_settings');
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
					//resize start
					$source_path = $data['upload_data']['full_path'];
					$target_path = './assets/files/upload_prof_pic/thumbs';
					
					//create thumbs
					$thumb['image_library'] = 'gd2';
					$thumb['source_image']	= $source_path;
					$thumb['new_image']	= $target_path;
					$thumb['create_thumb'] = TRUE;
					$thumb['maintain_ratio'] = FALSE;
					$thumb['width']	 = 30;
					$thumb['height'] = 30;
					$thumb['overwrite'] = TRUE;
					$thumb['file_name'] = 'my-prof-img_logo_30x30_'.__link($this->session->userdata('id'));
					$this->load->library('image_lib', $thumb); 
					$this->image_lib->resize();
					$this->image_lib->clear();
					sleep(3);
					
					//resize image 100x100
					$thumb2['image_library'] = 'gd2';
					$thumb2['source_image']	= $source_path;
					$thumb2['new_image']	= $target_path;
					$thumb2['create_thumb'] = FALSE;
					$thumb2['maintain_ratio'] = TRUE;
					$thumb2['width'] = 100;
					$thumb2['height'] = 100;
					$thumb2['overwrite'] = TRUE;
					$thumb2['file_name'] = 'my-prof-img_100x100_'.__link($this->session->userdata('id'));
					$this->image_lib->initialize($thumb1);
					$this->image_lib->resize();
					$this->image_lib->clear();
					sleep(3);
					//resize end

					//resize image 200x200
					$thumb2['image_library'] = 'gd2';
					$thumb2['source_image']	= $source_path;
					$thumb2['new_image']	= $target_path;
					$thumb2['create_thumb'] = FALSE;
					$thumb2['maintain_ratio'] = TRUE;
					$thumb2['width'] = 200;
					$thumb2['height'] = 200;
					$thumb2['overwrite'] = TRUE;
					$thumb2['file_name'] = 'my-prof-img_200x200_'.__link($this->session->userdata('id'));
					$this->image_lib->initialize($thumb2);
					$this->image_lib->resize();
					$this->image_lib->clear();
					sleep(3);
					//resize end

					if($data)
					{
						$this->_msg('s','Image has been uploaded, changes will be applied in few minutes.','Admin_Profile/profile_settings');
					}else{
						$this->_msg('e','An error occured while trying to upload image','Admin_Profile/profile_settings');
					}
				}			
		}
	}

	public function upload_pub_picture(){
		$post = $this->input->post();
		if ($post) {
				set_time_limit(0);
				$config['upload_path'] = './assets/files/public_prof_pic';
				$config['allowed_types'] = 'png';
				$config['max_size']	= '1000';
				$config['file_name'] = 'public-img';
				$config['overwrite'] = TRUE;
				$config['width']	 = 270;
				$config['height'] = 229;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ( ! $this->upload->do_upload('userfile'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->_msg('e',' '.$error['error'],'Admin_Profile/profile_settings');
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
					//resize start
					$source_path = $data['upload_data']['full_path'];
					$target_path = './assets/files/public_prof_pic/thumbs';
					
					//create thumbs
					$thumb['image_library'] = 'gd2';
					$thumb['source_image']	= $source_path;
					$thumb['new_image']	= $target_path;
					$thumb['create_thumb'] = TRUE;
					$thumb['maintain_ratio'] = FALSE;
					$thumb['width']	 = 100;
					$thumb['height'] = 100;
					$thumb['overwrite'] = TRUE;
					$thumb['file_name'] = 'public-img_logo_100x100_';
					$this->load->library('image_lib', $thumb); 
					$this->image_lib->resize();
					$this->image_lib->clear();
					sleep(3);
					
					//resize image
					$thumb2['image_library'] = 'gd2';
					$thumb2['source_image']	= $source_path;
					$thumb2['new_image']	= $target_path;
					$thumb2['create_thumb'] = FALSE;
					$thumb2['maintain_ratio'] = TRUE;
					$thumb2['width'] = 200;
					$thumb2['height'] = 200;
					$thumb2['overwrite'] = TRUE;
					$thumb2['file_name'] = 'public-img_200x200_';
					$this->image_lib->initialize($thumb2);
					$this->image_lib->resize();
					$this->image_lib->clear();
					sleep(3);
					//resize end

					if($data)
					{
						$this->_msg('s','Image has been uploaded, changes will be applied in few minutes.','Admin_Profile/profile_settings');
					}else{
						$this->_msg('e','An error occured while trying to upload image','Admin_Profile/profile_settings');
					}
				}			
		}
	}
	
}