<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Work extends MY_PrivateController {
	private $upload_destination = FALSE;

	public function __construct(){
		parent::__construct();
		$this->view_data['link'] = 'work';
	  $this->load->model('model_my_projects');
    $this->load->model('model_my_skills');
	}

	public function index(){
		echo "indexings";
	}

	public function work_settings(){
		$all_proj = $this->model_my_projects->get_my_projects();
		$projects = FALSE;
		if ($all_proj) {
			$data = array();
			// echo '<pre>';var_dump($all_proj);die();
			foreach ($all_proj as $k => $v) {
				$data[$k]['description'] = $v->description; 
				$data[$k]['created'] = $v->created; 
				// $skill = FALSE;
				// $arr_sk = $this->model_my_skills->get_name_of_skill_proj($v->id);
				// for ($i=0; $i < count($arr_sk); $i++) { 
				// 	$skill[$k] = $arr_sk[$i]->name_of_skill;
				// }
				$data[$k]['skills'] = $this->model_my_skills->get_name_of_skill_proj($v->id);
				// $img_pr = FALSE;
				// $arr_img = $this->model_my_projects->get_all_images($v->id);
				// for ($x=0; $x < count($arr_img); $x++) { 
				// 	$img_pr[$x]['name_of_picture'] = $arr_img[$x]->name_of_picture;
				// 	$img_pr[$x]['picture_format'] = $arr_img[$x]->picture_format;
				// }
				// var_dump($img_pr);die();
				$data[$k]['images'] = $this->model_my_projects->get_all_images($v->id);
			}
			$projects = $data;
		}
		// echo "<pre>";
		// var_dump($projects);
		// echo "</pre>";
		// die();
		$this->view_data['my_projects'] = $projects;
	}

	public function upload_pictures(){
						$ret['msg_err'] = '';
						$ret['msg_succ'] = '';
						$ret['msg_err_arr'] = $_FILES['files'];
            if (isset($_FILES['files']) && !empty($_FILES['files'])) {
	            // if (isset($_POST['files'])) {
	            $no_files = count($_FILES["files"]['name']);
	            $ret['file'] = $_FILES;
	            $p = $this->input->post();
	            $description = $p['description'];
	            $skills = $p['skills'];
	            #insert new project
	            $insert_np = $this->model_my_projects->insert_new_project($description);
	            #check if inserted or not
	            if ($insert_np == FALSE) {
		            $ret['msg_err'] .= 'New Prject was not save. Please try again. Thank you.';
		            echo json_encode($ret);
		            exit();
	            } else {
	            	$sk['skills'] = $skills;
	            	$sk['project_id'] = $insert_np;
	            	#insert skills used for the new projects
	            	$insert_skil = $this->model_my_skills->insert_skills_proj($sk);
	            	if ($insert_skil == FALSE) {
			            $ret['msg_err'] .= '<br>Skills was not updated.';
	            	}
								#upload the file to the folder and save name into database
		            for ($i = 0; $i < $no_files; $i++) {
		                if ($_FILES["files"]["error"][$i] > 0) {
		                    $ret['msg_err'] .= "Error: " . $_FILES["files"]["error"][$i] . "";
		                } else {
		                    if (file_exists('uploads/' . $_FILES["files"]["name"][$i])) {
		                        $ret['msg_err'] .= 'File already exists : uploads/' . $_FILES["files"]["name"][$i];
		                    } else { 
		                    		$temp_nm = $_FILES["files"]["tmp_name"][$i];
		                    		$date = date('Y-m-d-H-i-s');
		                    		$u_id = $this->session->userdata('id');
		                    		// $temp = explode(".", $_FILES["file"]["name"][$i]);
		                    		$info = pathinfo($_FILES["files"]["name"][$i]);
														$name = $info['filename'];
														$format = $info['extension'];
		                    		// $fname = $temp[0];
		                    		$hash_pic_name = md5($name).$date.__link($u_id);
		                    		$location = './assets/files/proj_imgs/' . $hash_pic_name . '.' . $format;
		                    		#move picture to folder
		                        move_uploaded_file($temp_nm, $location);
		                        $ret['msg_succ'] .= 'File successfully uploaded : ' . $_FILES['files']['name'][$i];
		                        #insert name to database table project images
		                        $img_np['project_id'] = $insert_np;
		                        $img_np['name_of_picture'] = $hash_pic_name;
		                        $img_np['picture_format'] = $format;
		                        $insert_pi = $this->model_my_projects->insert_proj_image($img_np);
		                        if ($insert_pi) {
			                        $ret['msg_succ'] .= '</br>';
		                        }
		                    }
		                }
		            } 
	            }//end check in new project was inserted
	            echo json_encode($ret);
	            exit();
		        } else {
		            $ret['msg_err'] .= 'Please choose at least one file';
		            echo json_encode($ret);
		            exit();	
		        }
		
						// $ret['msg_err'] = '';
						// $ret['msg_succ'] = '';
			      //  if (isset($_FILES['files']) && !empty($_FILES['files'])) {
				    //  // if (isset($_POST['files'])) {
				    //  $no_files = count($_FILES["files"]['name']);
				    //  // $ret['num_of_files'] =  $no_files;
						// 	// var_dump($_FILES);die();exit();
						// 	// echo $_FILES['files']['name'];
						// 	// $ret['skil'] = $_FILES['skills'];
						// 	// $ret['descr'] = $_FILES['description'];
						// 	// echo "<br>";
						// 	// $ret['num'] = $no_files;
						// 	$ret['post'] = $this->input->post();
				    //  $ret['file'] = $_FILES;
						// 	#upload the file to the folder
				    //    for ($i = 0; $i < $no_files; $i++) {
			      //        if ($_FILES["files"]["error"][$i] > 0) {
			      //            $ret['msg_err'] .= "Error: " . $_FILES["files"]["error"][$i] . "";
			      //        } else {
			      //          if (file_exists('uploads/' . $_FILES["files"]["name"][$i])) {
			      //              $ret['msg_err'] .= 'File already exists : uploads/' . $_FILES["files"]["name"][$i];
			      //          } else { 
			      //            move_uploaded_file($_FILES["files"]["tmp_name"][$i], './assets/files/proj_imgs/' . $_FILES["files"]["name"][$i]);
			      //            $ret['msg_succ'] .= 'File successfully uploaded : uploads/' . $_FILES['files']['name'][$i];
			      //           }
			      //        }
			      //    } 
				    //    echo json_encode($ret);
			      //    exit();
				    //  } else {
				    //     $ret['msg_err'] = 'Please choose at least one file';
				    //     echo json_encode($ret);
				    //     exit();	
				    //  }
    }

	public function deleteImage($file) 
	{
		//gets the job done but you might want to add error checking and security
		$success = unlink(FCPATH . 'files/' .$this->upload_destination.'/'. $file);
		$success = unlink(FCPATH . 'files/'.$this->upload_destination.'/thumbs/' . $file);
		//info to see if it is doing what it is supposed to 
		$info->sucess = $success;
		$info->path = base_url() . 'files/'.$this->upload_destination.$file;
		$info->file = is_file(FCPATH . 'files/'.$this->upload_destination. $file);

		if (IS_AJAX) 
		{
			//I don't think it matters if this is set but good for error checking in the console/firebug
			echo json_encode(array($info));
		}else{
		//here you will need to decide what you want to show for a successful delete        
			$file_data['delete_data'] = $file;
			$this->load->view('admin/delete_success', $file_data);
		}

	}

	public function success(){
		echo "success";
	}
}