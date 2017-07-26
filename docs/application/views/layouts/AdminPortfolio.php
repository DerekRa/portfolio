<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kennethmacaraeg Portfolio">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal, Kenneth, Macaraeg, Kennethmacaraeg, Web, Developer">
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="1059692502657-2dblauhb0g3onbasj9hnk64u5v2spq7q.apps.googleusercontent.com">
    <link rel="shortcut icon" href="img/favicon.png">

    <title><?=$page_title?></title>

    <!-- head distinguish -->
    <!-- home about work contact -->
    <? switch($link){
          case 'auth':
                $this->load->view('assets_links/admin_auth/auth_head_links');
                break;
    			case 'home':
    	    			$this->load->view('assets_links/admin_home/home_head_links');
    	    			break;
    			case 'about':
    	    			$this->load->view('assets_links/admin_about/about_head_links');
    	    			break;
    			case 'work':
    	    			$this->load->view('assets_links/admin_work/work_head_links');
    	    			break;
          case 'contact':
                $this->load->view('assets_links/admin_contact/contact_head_links');
                break;
          case 'dash':
                $this->load->view('assets_links/admin_dashboard/dashboard_head_links');
                break;
    			case 'profy':
    	    			$this->load->view('assets_links/admin_profile/profile_head_links');
    	    			break;
    		}
    ?>
    <style type="text/css">
        #err {
            color: #e23228 !important;
        }
        #succ{
            color: #1faf0f !important;
        }
        #error,#errr{
            color: #540000;
            background: #ed717e; /* For browsers that do not support gradients */
            background: -webkit-linear-gradient(#ed717e, #fff4f4); /* For Safari 5.1 to 6.0 */
            background: -o-linear-gradient(#ed717e, #fff4f4); /* For Opera 11.1 to 12.0 */
            background: -moz-linear-gradient(#ed717e, #fff4f4); /* For Firefox 3.6 to 15 */
            background: linear-gradient(#ed717e, #fff4f4); /* Standard syntax */
            /*background-color: #ed717e;*/
            text-align: center;
            padding: 8px 8px 8px 8px;
            width: 500px;
            margin: auto;
            border-radius: 7px;
        }
        #success,#succc {
            color: #055400 ;
            background: #7ae572; /* For browsers that do not support gradients */
            background: -webkit-linear-gradient(#7ae572, #f4fff8); /* For Safari 5.1 to 6.0 */
            background: -o-linear-gradient(#7ae572, #f4fff8); /* For Opera 11.1 to 12.0 */
            background: -moz-linear-gradient(#7ae572, #f4fff8); /* For Firefox 3.6 to 15 */
            background: linear-gradient(#7ae572, #f4fff8); /* Standard syntax */
            /*background-color: #7ae572 ;*/ 
            text-align: center;
            padding: 8px 8px 8px 8px;
            width: 500px;
            margin: auto;
            border-radius: 7px;
        }
    </style>
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>
            <!--logo start-->
            <a href="<?=site_url('Dashboard')?>" class="logo">
            <img width="60px" height="35px" src="<?=site_url('assets/files/portfolio_logo.png')?>">
            <span class="lite">Admin</span></a>
            <!--logo end-->
            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="<?=my_prof_thum_logo()?>">
                            </span>
                            <span class="username">Jenifer Smith</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="<?=site_url('Admin_Profile')?>"><i class="icon_profile"></i>Profile Settings</a>
                            </li>
                            <li>
                                <a href="<?=site_url('Admin_Auth/Logout')?>"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="<?=site_url('Admin_Dashboard/')?>">
                          <i class="icon_lightbulb"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
				  				<li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_cogs"></i>
                          <span>Setting</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?=site_url('Admin_Home/Settings')?>"><i class="icon_cog"></i>Home Page</a></li>       
                          <li><a class="" href="<?=site_url('Admin_About/Settings')?>"><i class="icon_cog"></i>About Page</a></li>       
                          <li><a class="" href="<?=site_url('Admin_Work/Settings')?>"><i class="icon_cog"></i>Work Page</a></li>       
                          <li><a class="" href="<?=site_url('Admin_Contact/Settings')?>"><i class="icon_cog"></i>Contact Page</a></li>       
                      </ul>
                  </li>       
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
		
							<?=$yield?>

          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->


    <!-- head distinguish -->
    <!-- home about work contact -->
    <? switch($link){
    			case 'auth':
  	    			$this->load->view('assets_links/admin_auth/auth_body_js');
  	    			break;
          case 'home':
              $this->load->view('assets_links/admin_home/home_body_js');
              break;
    			case 'about':
  	    			$this->load->view('assets_links/admin_about/about_body_js');
  	    			break;
    			case 'work':
  	    			$this->load->view('assets_links/admin_work/work_body_js');
  	    			break;
          case 'contact':
                $this->load->view('assets_links/admin_contact/contact_body_js');
                break;
          case 'dash':
              $this->load->view('assets_links/admin_dashboard/dashboard_body_js');
              break;
    			case 'profy':
  	    			$this->load->view('assets_links/admin_profile/profile_body_js');
  	    			break;
    		}
    ?>
    <script type="text/javascript">
         $(function() {
             setTimeout(function(){
                 $('#succ').hide();
                 $('#err').hide();
                 $('#succc').hide();
                 $('#errr').hide();
                 $('#success').hide();
                 $('#error').hide();
            },6000);
         });
    </script>
  </body>
</html>
