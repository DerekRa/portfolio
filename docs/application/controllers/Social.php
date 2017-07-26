<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->view_data['link'] = 'about';
	}

	public function index(){
		$this->load->helper('social_counts');
		$linkedin_group_followers = social_count('linkedin_group', array(
					'id' => '37967729',
					'appKey' => '81pkixf5dxjfaw',
					'appSecret' => 'VXmzSddDzlEjNNg6'
				));
			

		// $this->view_data['socials'] = $facebook_followers;
		$this->load->view('social/index',$linkedin_group_followers['social']);

	}
/*
$facebook_followers = social_count('facebook', array(
	'id' => '<your_facebook_page_name_or_id>',
	'api_key' => '<your_facebook_app_api_key>',
	'api_secret' => '<your_facebook_app_api_secret>'
));
$twitter_followers = social_count('twitter', array(
	'id' => '<your_twitter_username>',
	'oauth_access_token' => '<your_twitter_oauth_access_token>',
	'oauth_access_token_secret' => '<your_twitter_oauth_access_token_secret>',
	'consumer_key' => '<your_twitter_consumer_key>',
	'consumer_secret' => '<your_twitter_consumer_secret>'
));
$gplus_followers = social_count('gplus', array(
	'id' => '<your_google_plus_id>',
	'apiKey' => '<your_google_api_key>'
);
$linkedin_group_followers = social_count('linkedin_group', array(
	'id' => '<your_linkedin_group_username>',
	'appKey' => '<your_linkedin_app_key>',
	'appSecret' => '<your_linkedin_app_secret>'
));
$constant_contact_subsribers = social_count('constant_contact', array(
	'username' => '<your_constant_contact_username>',
	'password' => '<your_constant_contact_password>',
 	'apiKey' => '<your_constant_contact_api_key>',
	'lists' => array(<id_of_constant_contact_lists_to_be_counted>)
));
$youtube_views = social_count(array(
	'channel' => '<your_youtube_channel_name>',
	'data' => 'totalUploadViews',
	'api_key' => '<your_youtube_api_key>'
));
$youtube_subscribers = social_count(array(
	'channel' => '<your_youtube_channel_name>',
	'data' => 'subscriberCount',
	'api_key' => '<your_youtube_api_key>'
));
*/




}
// }
