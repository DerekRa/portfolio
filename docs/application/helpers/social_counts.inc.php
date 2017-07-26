<?

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

function social_count($network, $settings = null) {
  
	// Make user $settings is an associative array
	if (!empty($settings) && !is_array($settings)) {
		$s = $settings;
		$settings = array();
		$settings['id'] = $s;
	}
	
	// Fetch counts from networks
	switch ($network) {

		// Required $settings values = username (string), password (string), apiKey (string), lists (array)
		// To get all lists query https://api.constantcontact.com/ws/customers/{$settings['username']}/lists
		case 'constant_contact':
			$count = 0;
			foreach ($settings['lists'] as $list) {
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, "https://api.constantcontact.com/ws/customers/{$settings['username']}/lists/{$list}");
				curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				curl_setopt($ch, CURLOPT_USERPWD, "{$settings['apiKey']}%{$settings['username']}:{$settings['password']}");
				curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:application/atom+xml"));
				curl_setopt($ch, CURLOPT_HEADER, false);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				$curl = @curl_exec($ch);
				curl_close($ch);
				$data = new SimpleXMLElement($curl);
				$count += $data->content->ContactList->ContactCount;
			}
			return $count;
			break;

 		// Required $settings values = id (your group id, string), 
 		// Dependency: http://oauth.googlecode.com/svn/code/php/OAuth.php
 		// Dependency: http://simple-linkedinphp.googlecode.com/svn/trunk/v3/3.3/3.3.0/linkedin_3.3.0.class.php
		case 'linkedin_group':
			require_once(dirname(__FILE__) . '/OAuth.php');
			require_once(dirname(__FILE__) . '/linkedin_3.2.0.class.php');
			$linkedin = new LinkedIn($settings);
			$group = $linkedin->group($settings['id'], ':(num-members)');
			$xml = new SimpleXMLElement($group['linkedin']);
			return intval($xml->{'num-members'});
			break;
			
		// Required $settings values = id (your username, string), app_id (string), app_secret (string)
		case 'facebook':
			$data = json_decode(file_get_contents('https://graph.facebook.com/' . $settings['id'] . '?fields=likes&access_token=' . $settings['app_id'] . '|' . $settings['app_secret']));
			return $data->likes;
			break;

		// Required $settings values = id (your username, string), oauth_access_token (string), oauth_access_token_secret (string), consumer_key (string), consumer_secret (string)
		// Dependency: https://github.com/J7mbo/twitter-api-php/blob/master/TwitterAPIExchange.php
		case 'twitter':
			require_once(dirname(__FILE__) . '/TwitterAPIExchange.php');
			$ta_url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
			$getfield = '?screen_name=' . $settings['id'];
			$requestMethod = 'GET';
			$twitter = new TwitterAPIExchange($settings);
			$follow_count = $twitter->setGetfield($getfield)->buildOauth($ta_url, $requestMethod)->performRequest();
			$data = json_decode($follow_count, true);
			return $data[0]['user']['followers_count'];
			break;

		// Required $settings values = id (your user id, string), apiKey (string)
		// You can get a free Google+ API key here: https://console.developers.google.com
		case 'gplus':
			if ($data = file_get_contents('https://www.googleapis.com/plus/v1/people/' . $settings['id'] . '?fields=circledByCount%2CplusOneCount&key=' . $settings['apiKey'])) {
				$data = json_decode($data);
				return $data->circledByCount;
			}
			break;
		
		// Required $settings values = channel (string), data (viewCount|commentCount|subscriberCount|hiddenSubscriberCount|videoCount), api_key (string)
		case 'youtube':
			if ($json = @file_get_contents("https://www.googleapis.com/youtube/v3/channels?key={$settings['api_key']}&part=contentDetails,statistics&forUsername={$settings['channel']}")) {
				$youtube = json_decode($json);
				$data = (in_array($settings['data'], array('viewCount', 'commentCount', 'subscriberCount', 'hiddenSubscriberCount', 'videoCount'))) ? $settings['data'] : 'viewCount';
				if (isset($youtube->items[0]->statistics->$data)) {
					return $youtube->items[0]->statistics->$data;
				}
			}			
			break;
		
	}
}

?>