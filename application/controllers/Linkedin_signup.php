<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Linkedin_signup extends CI_Controller {

function __construct(){

  parent::__construct();
   $this->load->helper('url'); 
               
}

function index(){
            
           
            
            
            echo '<p>-------------------------------------------------------------------------</p>';
            echo '<p>1) Make sure OAuth.php and linkedin.php files are in application/libraries folder</p>';
            echo '<p>2) If you don\'t have the files. Download from http://code.google.com/p/simple-linkedinphp/downloads/list</p>';
            echo '<p>3) Rename linkedin_3.2.0.class.php to linkedin.php if you prefer</p>';
            echo '<p>-------------------------------------------------------------------------</p>';
            
            echo '&lt;form id="linkedin_connect_form" action="linkedin_signup/initiate" method="post"&gt;';
            echo '&lt;input type="submit" value="Login with LinkedIn" /&gt;';
            echo '&lt;/form&gt;';

            #######################################################################
#               PHP Social Share Count Class
#   Script Url: http://toolspot.org/script-to-get-shared-count.php
#   Author: Sunny Verma
#   Website: http://toolspot.org
#   License: GPL 2.0, @see http://www.gnu.org/licenses/gpl-2.0.html
########################################################################
// require("shareCount.php");
            $this->load->helper('shareCount');
$obj=new shareCount("http://localhost");  //Use your website or URL
// echo "Tweets: ".$obj->get_tweets(); //to get tweets
// echo "<br>Facebook: ".$obj->get_fb(); //to get facebook total count (likes+shares+comments)
echo "<br>Linkedin: ".$obj->get_linkedin(); //to get linkedin shares
echo "<br>Google+: ".$obj->get_plusones(); //to get google plusones
// echo "<br>Delicious: ".$obj->get_delicious(); //to get delicious bookmarks  count
// echo "<br>StumbleUpon: ".$obj->get_stumble(); //to get Stumbleupon views
// echo "<br>Pinterest: ".$obj->get_pinterest(); //to get pinterest pins


            $this->load->view('linkedin_signup/index');
  
        }
        
        function initiate(){
            
                // setup before redirecting to Linkedin for authentication.
                 $linkedin_config = array(
                     'appKey'       => '81pkixf5dxjfaw',
                     'appSecret'    => 'VXmzSddDzlEjNNg6',
                     'callbackUrl'  => 'http://localhost/Portfolio/linkedin_signup/data/'
                 );
                
                $this->load->library('linkedin', $linkedin_config);
                $this->linkedin->setResponseFormat(LINKEDIN::_RESPONSE_JSON);
                $token = $this->linkedin->retrieveTokenRequest();
                
                $this->session->set_flashdata('oauth_request_token_secret',$token['linkedin']['oauth_token_secret']);
                $this->session->set_flashdata('oauth_request_token',$token['linkedin']['oauth_token']);
                
                $link = "https://api.linkedin.com/uas/oauth/authorize?oauth_token=". $token['linkedin']['oauth_token'];  
                redirect($link);
}
        
        function cancel() {
            
            // See https://developer.linkedin.com/documents/authentication
            // You need to set the 'OAuth Cancel Redirect URL' parameter to &lt;your URL&gt;/linkedin_signup/cancel

            echo 'Linkedin user cancelled login';            
        }
        
        function logout() {
                session_unset();
                $_SESSION = array();
                echo "Logout successful";
        }
        
function data(){
  
                 $linkedin_config = array(
                     'appKey'       => '81pkixf5dxjfaw',
                     'appSecret'    => 'VXmzSddDzlEjNNg6',
                     'callbackUrl'  => 'http://localhost/Portfolio//linkedin_signup/data/'
                 );
                
                $this->load->library('linkedin', $linkedin_config);
                $this->linkedin->setResponseFormat(LINKEDIN::_RESPONSE_JSON);
                 
                $oauth_token = $this->session->flashdata('oauth_request_token');
                $oauth_token_secret = $this->session->flashdata('oauth_request_token_secret');
  
                $oauth_verifier = $this->input->get('oauth_verifier');
                $response = $this->linkedin->retrieveTokenAccess($oauth_token, $oauth_token_secret, $oauth_verifier);
                
                // ok if we are good then proceed to retrieve the data from Linkedin
                if($response['success'] === TRUE) {
                    
                // From this part onward it is up to you on how you want to store/manipulate the data 
                $oauth_expires_in = $response['linkedin']['oauth_expires_in'];
                $oauth_authorization_expires_in = $response['linkedin']['oauth_authorization_expires_in'];
                
                $response = $this->linkedin->setTokenAccess($response['linkedin']);
                $profile = $this->linkedin->profile('~:(id,first-name,last-name,picture-url)');
                $profile_connections = $this->linkedin->profile('~/connections:(id,first-name,last-name,picture-url,industry)');
                $user = json_decode($profile['linkedin']);
                $user_array = array('linkedin_id' => $user->id , 'second_name' => $user->lastName , 'profile_picture' => $user->pictureUrl , 'first_name' => $user->firstName);
                
                // For example, print out user data
                echo 'User data:';
                print '<pre>';
                print_r($user_array);
                print '</pre>';

                echo '<br><br>';
                    
                // Example of company data
                $company = $this->linkedin->company('1337:(id,name,ticker,description,logo-url,locations:(address,is-headquarters))');
                echo 'Company data:';
                print '<pre>';
                print_r($company);
                print '</pre>';
                
                echo '<br><br>';
                
                echo 'Logout';
                echo '&lt;form id="linkedin_connect_form" action="../logout" method="post"&gt;';
                echo '&lt;input type="submit" value="Logout from LinkedIn" /&gt;';
                echo '&lt;/form&gt;';
                
                } else {
                  // bad token request, display diagnostic information
                  echo "Request token retrieval failed:<br /><br />RESPONSE:<br /><br />" . print_r($response, TRUE);
                }       
                $this->load->view('linkedin_signup/data');  
        }
        }