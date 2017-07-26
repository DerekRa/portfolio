<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

// public / client routings

// $route['(:any)'] = 'Client_Home';
$route['Home'] = 'Client_Home/Home_settings';
$route['Home/(:any)'] = 'Client_Home/Home_settings';
$route['About'] = 'Client_About/About_settings';
$route['About/(:any)'] = 'Client_About/About_settings';
$route['Work'] = 'Client_Work/Work_settings';
$route['Work/(:any)'] = 'Client_Work/Work_settings';
$route['Contact'] = 'Client_Contact/Contact_settings';
$route['Contact/(:any)'] = 'Client_Contact/Contact_settings';

// admin routings

#Login
$route['Admin/Auth'] = 'Admin_Auth/Login';
$route['Admin/Login'] = 'Admin_Auth/Login';
$route['Admin/Auth/(:any)'] = 'Admin_Auth/Login';
$route['Admin/Login/(:any)'] = 'Admin_Auth/Login';
$route['Admin/Auth/Login/(:any)'] = 'Admin_Auth/Login';
#Register
$route['Admin/Register'] = 'Admin_Register/Register';
$route['Admin/Register/(:any)'] = 'Admin_Register/Register';
$route['Admin/ForgotPass'] = 'Admin_Register/Forgot_password';
$route['Admin/ForgotPass/(:any)'] = 'Admin_Register/Forgot_password';
$route['Admin/ChangePass'] = 'Admin_Register/Password_Recovery';
#email links
$route['Admin/Link/Email_Validation/(:any)'] = 'Admin_Register/Registration_Email_Validation/$1';
$route['Admin/Link/Change_Password/(:any)'] = 'Admin_Register/Change_Password/$1';
$route['Admin/Link/Recover_Password/(:any)'] = 'Admin_Register/Password_Recovery/$1';
#admin profile
$route['Admin_Profile'] = 'Admin_Profile/Profile_settings';
$route['Admin_Profile/Settings/(:any)'] = 'Admin_Profile/Profile_settings';
#admin dashboard
$route['Admin_Dashboard'] = 'Admin_Dashboard/Dashboard_settings';
$route['Admin_Dashboard/(:any)'] = 'Admin_Dashboard/Dashboard_settings';
$route['Admin_Dashboard/Settings/(:any)'] = 'Admin_Dashboard/Dashboard_settings';
#admin home
$route['Admin_Home'] = 'Admin_Home/Home_settings';
$route['Admin_Home/(:any)'] = 'Admin_Home/Home_settings';
$route['Admin_Home/Settings/(:any)'] = 'Admin_Home/Settings';
#admin about
$route['Admin_About'] = 'Admin_About/About_settings';
$route['Admin_About/Settings'] = 'Admin_About/About_settings';
$route['Admin_About/Settings/(:any)'] = 'Admin_About/About_settings';
#admin work
$route['Admin_Work'] = 'Admin_Work/Work_settings';
$route['Admin_Work/Settings'] = 'Admin_Work/Work_settings';
$route['Admin_Work/Settings/(:any)'] = 'Admin_Work/Work_settings';
#contact
$route['Admin_Contact'] = 'Admin_Contact/Contact_settings';
$route['Admin_Contact/(:any)'] = 'Admin_Contact/Contact_settings';
$route['Admin_Contact/Settings/(:any)'] = 'Admin_Contact/Contact_settings';


$route['default_controller'] = 'Client_Home/home_settings';
// $route['default_controller'] = 'auth';
$route['404_override'] = 'my404';
$route['translate_uri_dashes'] = FALSE;
