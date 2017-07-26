<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Example extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('facebook');
		$this->load->helper('url');
	}

	// ------------------------------------------------------------------------

	/**
	 * Index page
	 */
	public function index()
	{
		$this->load->view('examples/start');
	}

	// ------------------------------------------------------------------------

	/**
	 * Web redirect login example page
	 */
	public function web_login()
	{
		$data['user'] = array();

		// Check if user is logged in
		if ($this->facebook->is_authenticated())
		{
			// User logged in, get user details
			$user = $this->facebook->request('get', '/me?fields=id,name,email');
			if (!isset($user['error']))
			{
				$data['user'] = $user;
			}

		}

		// display view
		$this->load->view('examples/web', $data);
	}

	// ------------------------------------------------------------------------

	/**
	 * JS SDK login example
	 */
	public function js_login()
	{
		// Load view
		$this->load->view('examples/js');
	}

	// ------------------------------------------------------------------------

	/**
	 * AJAX request method for positing to facebook feed
	 */
	public function post()
	{
		header('Content-Type: application/json');

		$result = $this->facebook->request(
			'post',
			'/me/feed',
			['message' => $this->input->post('message')]
		);

		echo json_encode($result);
	}

	// ------------------------------------------------------------------------

	/**
	 * Logout for web redirect example
	 *
	 * @return  [type]  [description]
	 */
	public function logout()
	{
		$this->facebook->destroy_session();
		redirect('example/web_login', redirect);
	}


	public function fb_callback(){
			$fb = new Facebook\Facebook([
			  'app_id' => '852725284883756', // Replace {app-id} with your app id
			  'app_secret' => '4d85806e826a4f238a0f803dada8f256',
			  'default_graph_version' => 'v2.2',
			  ]);

			$helper = $fb->getRedirectLoginHelper();

			try {
			  $accessToken = $helper->getAccessToken();
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
			  // When Graph returns an error
			  echo 'Graph returned an error: ' . $e->getMessage();
			  exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
			  // When validation fails or other local issues
			  echo 'Facebook SDK returned an error: ' . $e->getMessage();
			  echo "<br>";
			  // exit;
			}

			if (! isset($accessToken)) {
			  if ($helper->getError()) {
			    header('HTTP/1.0 401 Unauthorized');
			    echo "Error: " . $helper->getError() . "\n";
			    echo "Error Code: " . $helper->getErrorCode() . "\n";
			    echo "Error Reason: " . $helper->getErrorReason() . "\n";
			    echo "Error Description: " . $helper->getErrorDescription() . "\n";
			  } else {
			    header('HTTP/1.0 400 Bad Request');
			    echo 'Bad request';
			    echo "<br>";
			  }
			  // exit;
			}

			// Logged in
			echo '<h3>Access Token</h3>';
			var_dump($accessToken->getValue());

			// The OAuth 2.0 client handler helps us manage access tokens
			$oAuth2Client = $fb->getOAuth2Client();

			// Get the access token metadata from /debug_token
			$tokenMetadata = $oAuth2Client->debugToken($accessToken);
			echo '<h3>Metadata</h3>';
			var_dump($tokenMetadata);

			// Validation (these will throw FacebookSDKException's when they fail)
			$tokenMetadata->validateAppId(852725284883756); // Replace {app-id} with your app id
			// If you know the user ID this access token belongs to, you can validate it here
			//$tokenMetadata->validateUserId('123');
			$tokenMetadata->validateExpiration();

			if (! $accessToken->isLongLived()) {
			  // Exchanges a short-lived access token for a long-lived one
			  try {
			    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
			  } catch (Facebook\Exceptions\FacebookSDKException $e) {
			    echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
			    exit;
			  }

			  echo '<h3>Long-lived</h3>';
			  var_dump($accessToken->getValue());
			}

			$_SESSION['fb_access_token'] = (string) $accessToken;

			// User is logged in with a long-lived access token.
			// You can redirect them to a members-only page.
			//header('Location: https://example.com/members.php');
	}
}
