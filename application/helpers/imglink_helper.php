<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('my_prof_logo'))
{
	function my_prof_logo()
	{
			$CI =& get_instance();
			get_instance()->load->helper('linkcreator_helper');
			$id = $CI->session->userdata('id');
			$hash_id = __link($id);
			$img_check = FCPATH.'assets/files/upload_prof_pic/my-prof-img'.$hash_id.'.jpg';
			$img_show = base_url().'assets/files/upload_prof_pic/my-prof-img'.$hash_id.'.jpg';
			$def_img = base_url().'assets/files/default-img.png';

			return file_exists($img_check) ? $img_show :  $def_img;
	}
}

if ( ! function_exists('my_prof_thum_logo'))
{
	function my_prof_thum_logo()
	{
			$CI =& get_instance();
			get_instance()->load->helper('linkcreator_helper');
			$id = $CI->session->userdata('id');
			$hash_id = __link($id);
			$img_check = FCPATH.'assets/files/upload_prof_pic/thumbs/my-prof-img'.$hash_id.'_thumb.jpg';
			$img_show = base_url().'assets/files/upload_prof_pic/thumbs/my-prof-img'.$hash_id.'_thumb.jpg';
			$def_img = base_url().'assets/files/my-prof-img_thumb2.png';

			return file_exists($img_check) ? $img_show :  $def_img;
	}
}


if ( ! function_exists('my_video'))
{
	function my_video()
	{
			$CI =& get_instance();
			get_instance()->load->helper('linkcreator_helper');
			$id = $CI->session->userdata('id');
			$hash_id = __link($id);
			$img_check = FCPATH.'assets/files/upload_vid_file/my-video'.$hash_id.'.mp4';
			$img_show = base_url().'assets/files/upload_vid_file/my-video'.$hash_id.'.mp4';
			$def_img = base_url().'assets/files/default-vid.jpg';

			return file_exists($img_check) ? $img_show :  $def_img;
	}
}

if ( ! function_exists('public_logo'))
{
	function public_logo()
	{
			$img_check = FCPATH.'assets/files/public_prof_pic/public-img.png';
			$img_show = base_url().'assets/files/public_prof_pic/public-img.png';
			$def_img = base_url().'assets/files/default-img.png';

			return file_exists($img_check) ? $img_show :  $def_img;
	}
}

