<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta Tag -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <!-- SEO -->
        <meta name="description" content="150 words">
        <meta name="author" content="uipasta">
        <meta name="url" content="http://www.kennethmacaraeg.com">
        <meta name="copyright" content="KennethMacaraeg">
        <meta name="robots" content="index,follow">
        
        <title><?=$title?></title>

        <!-- w3 css -->
        <link rel="stylesheet" href="<?=site_url('assets/public/css/w3.css') ?>">
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?=site_url('assets/files/icon_logo.ico')?>">
        <link rel="apple-touch-icon" sizes="144x144" type="image/x-icon" href="<?=site_url('assets/files/portfolio_logo.png')?>">
        
        <!-- All CSS Plugins -->
        <link rel="stylesheet" type="text/css" href="<?=site_url('assets/public/css/plugin.css') ?>">
        
        <!-- Main CSS Stylesheet -->
        <link rel="stylesheet" type="text/css" href="<?=site_url('assets/public/css/style.css') ?>">
        
        <!-- Google Web Fonts  -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700">
    </head>
    <body>
    	<!-- Preloader Start -->
        <div class="preloader">
            <div class="kenthinking">Kenneth is thinking...</div>
    	    <div class="rounder"></div>
        </div>
        <!-- Preloader End -->
          
        <div id="main">
            <div class="container">
                <div class="row">
                    <!-- About Me (Left Sidebar) Start -->
                    <div class="col-md-3">
                        <div class="about-fixed">
                            <div class="my-pic">
                                <img src="<?=site_url('assets/public/images/pic/my-pic.png') ?>" alt="">
                                <a href="javascript:void(0)" class="collapsed" data-target="#menu" data-toggle="collapse"><i class="icon-menu menu"></i></a>
                                <div id="menu" class="collapse">
                                    <ul class="menu-link">
                                        <li><a href="<?=site_url('About') ?>">About</a></li>
                                        <li><a href="<?=site_url('Work') ?>">Work</a></li>
                                        <li><a href="<?=site_url('Contact') ?>">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="my-detail">
                                <div class="white-spacing">
                                    <h1>Kenneth Macaraeg</h1>
                                    <span>Web Developer</span>
                                </div> 
                                <ul class="social-icon">
                                    <li><a href="#" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#" target="_blank" class="github"><i class="fa fa-github"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- About Me (Left Sidebar) End -->

                    <!-- Blog Post (Right Sidebar) Start -->
                    <div class="col-md-9">
                            <div class="col-md-12 page-body">
                                <div class="row">
														      <div class="col-lg-12">
														        <h3 class="page-header"></i>Back Home</h3>
														        <div class="">&nbsp;</div>
														        <ol class="breadcrumb">
														          <li><h4><i class="fa fa-thumbs-down"></i>
					                                <?
								                         echo "\nERROR: ",
																							$heading,
																							"\n\n",
																							$message,
																							"\n\n";
					                                ?></h4>
														          </li>
														        </ol>
														        <div class="">&nbsp;</div>
														      </div>
														    </div>
                            </div>
                            <!-- Footer Start -->
                            <div class="col-md-12 page-body margin-top-50 footer">
                                <footer>
                                    <ul class="menu-link">
                                        <li><a href="<?=site_url('Home') ?>">Home</a></li>
                                        <li><a href="<?=site_url('About') ?>">About</a></li>
                                        <li><a href="<?=site_url('Work') ?>">Work</a></li>
                                        <li><a href="<?=site_url('Contact') ?>">Contact</a></li>
                                    </ul>
                                    <p>© Copyright 2016 DevBlog. All rights reserved</p>
                                    <!-- UiPasta Credit Start -->
                                    <div class="uipasta-credit">
                                        Design By 
                                        <a href="http://www.uipasta.com" target="_blank">UiPasta</a>
                                    </div>
                                    <!-- UiPasta Credit End -->
                                </footer>
                            </div>
                            <!-- Footer End -->
                    </div>
                    <!-- Blog Post (Right Sidebar) End -->
                </div>
            </div>
        </div>
      
        <!-- Back to Top Start -->
        <a href="#" class="scroll-to-top"><i class="fa fa-long-arrow-up"></i></a>
        <!-- Back to Top End -->
        <!-- All Javascript Plugins  -->
        <script type="text/javascript" src="<?=site_url('assets/public/js/jquery.min.js') ?>"></script>
        <script type="text/javascript" src="<?=site_url('assets/public/js/plugin.js') ?>"></script>
        <!-- Main Javascript File  -->
        <script type="text/javascript" src="<?=site_url('assets/public/js/scripts.js') ?>"></script>
    </body>
</html>

