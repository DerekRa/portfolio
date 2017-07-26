<?php
class MY_PublicController Extends CI_Controller
{
		protected $layout_view = 'Portfolio';
  	protected $content_view ='';
  	protected $view_data = array();

	public function __construct()
	{
		parent::__construct();
		$this->view_data['page_title'] = "Kenneth's Portfolio";
		$this->view_data['system_message_information'] = $this->_msg();
		$this->load->model('model_client_information');
		$this->view_data['profile_information'] = $this->model_client_information->_master_prof();
		$this->view_data['links_information'] = $this->model_client_information->social_accounts();
		$this->view_data['skills_information'] = $this->model_client_information->my_skills();
		$this->view_data['story_information'] = $this->model_client_information->my_story();
		$this->view_data['services_information'] = $this->model_client_information->my_services();
		$project = $this->model_client_information->my_projects();
		if ($project) {
			$data = array();
			foreach ($project as $kp => $vp) {
				$data[$kp]['description'] = $vp->description;
				$data[$kp]['skills'] = $this->model_client_information->get_proj_skills($vp->id);
				$data[$kp]['images'] = $this->model_client_information->get_proj_images($vp->id);
			}
		} else {
			$data = FALSE;
		}
		$this->view_data['projects_information'] = $data;
	}
	
	public function _output($output)
    {
		if($this->content_view !== FALSE && empty($this->content_view)) $this->content_view = $this->router->class . '/' . $this->router->method;
		
			$flexible_yeild = file_exists(APPPATH . 'views/' . $this->content_view . '.php') ? $this->load->view($this->content_view, $this->view_data, TRUE) : FALSE ;
		
		if($this->layout_view){	
			echo $this->load->view('layouts/' . $this->layout_view, array('yield' => $flexible_yeild), TRUE);
			echo $output;
		}
	}
	
	public function _msg($type = FALSE,$message = FALSE,$redirect = FALSE,$var_name = 'system_message')
	{
		$type = strtolower($type);
		switch($type)
		{
		 	case $type === 'e':
				$template = "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <strong>Error!</strong> ".$message."</div>";
			break;
			case $type === 's':
				$template = "<div class='alert alert-success'><strong>Success!</strong> ".$message."</div>";
			break;
			case $type === 'n':
				$template = "<span class='word-break' style='color:#FFA500 !important; font-weight:bold !important;'><i class='callout callout-warning'></i> ".$message."</span>";
			break;
			case $type === 'p':
				$template = "<span class='word-break' style='color: green !important; font-weight:bold !important;'><i class='callout callout-success'></i> ".$message."</span>";

			break;
			case $type === 'st':
				$template = "<span class='word-break' style='color: gray !important; font-weight:bold !important;'><i class='callout callout-success'></i> ".$message."</span>";

			break;
			case $type === FALSE;
				$template = $message;
			break;
		}
		
		if($type AND $message AND $redirect){
			$this->session->set_flashdata($var_name,$template);
			redirect($redirect);

		}elseif($type AND $message AND $redirect == FALSE){
			return $template;
		}
		
		if($redirect == FALSE AND $message == FALSE AND $redirect == FALSE){
			return $this->session->flashdata($var_name);
		}
	}
}