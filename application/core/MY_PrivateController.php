<?php
class MY_PrivateController Extends CI_Controller
{
		protected $layout_view = 'AdminPortfolio';
  	protected $content_view ='';
  	protected $view_data = array();

	public function __construct()
	{
		parent::__construct();
		$this->view_data['page_title'] = 'Admin Portfolio';
		$this->view_data['system_message_information'] = $this->_msg();
		$this->view_data['system_load_view'] = $this->_lv();
		$this->load->model('model_profile');
		$this->load->model('model_my_story');
		
		#check if has the name userdata
    if ($this->session->has_userdata('is_logged_in')) {
    		#check if true
		    if ($this->session->userdata('is_logged_in') == TRUE) {
		    		#get profile
            $this->view_data['profile'] = $this->model_profile->get_master_profile($this->session->userdata('id'));
            // echo '<pre>';var_dump($this->router->method);die();
            // echo '<pre>';var_dump($this->view_data['profile']);die();
        } else {
            redirect(site_url('Admin/Auth'));
        }// end check if value of logged in is TRUE
    } else {
        redirect(site_url('Admin/Auth'));
    }// end check if has the name userdata

	}
	
	public function _output($output)
    {
		if($this->content_view !== FALSE && empty($this->content_view)) $this->content_view = "/" . $this->router->class . "/" . $this->router->method;

			$flexible_yeild = file_exists(APPPATH . 'views/' . $this->content_view . '.php') ? $this->load->view($this->content_view, $this->view_data, TRUE) : FALSE ;
		
		if($this->layout_view){	
			echo $this->load->view('layouts/' . $this->layout_view, array('yield' => $flexible_yeild), TRUE);
			echo $output;
		}
	}
	//(type[e,s,n,p,st],message['your messages return'],redirect['Admin_About/Settings'],)
	public function _msg($type = FALSE,$message = FALSE,$redirect = FALSE,$var_name = 'system_message')
	{
		$type = strtolower($type);
		switch($type)
		{
		 	case $type === 'e':
				$template = "<div id='errr' class='alert alert-success'><strong>Error!</strong> ".$message."</div>";
			break;
			case $type === 's':
				$template = "<div id='succc' class='alert alert-success'><strong>Success!</strong> ".$message."</div>";
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
	// (view['Admmin_auth_reg/auth/admin_login'],data[array])
	public function _lv($view = FALSE, $type = FALSE, $dataStr = FALSE, $dataArr = FALSE){

		if ($view AND $dataStr AND $type) {
			
			switch ($type) {
				case 'e':
					$data['message_success'] = '';
					$data['message_error'] = '<div class="alert alert-block alert-danger fade in">
														<a class="btn btn-link btn-block btn-block" id="err">'
														.$dataStr.'</a></div>';
					$data['mess_error'] = '';
					$data['mess_success'] = '';
					$data['msg'] = '';
					break;
				case 's':
					$data['message_error'] = '';
					$data['message_success'] = '<div class="alert alert-success fade in">
														<a class="btn btn-link btn-block btn-block" id="succ"> '
														.$dataStr.'</a></div>';
					$data['mess_error'] = '';
					$data['mess_success'] = '';
					$data['msg'] = '';
					break;
				}

				return $this->load->view($view,$data);
		}		

		if ($view AND $dataArr) {

			return $this->load->view($view,$dataArr);
		}

		if ($view) {

			return	$this->load->view($view);
		}

	}

}