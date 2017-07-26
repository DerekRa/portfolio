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
        
        <title><?=$page_title?></title>

        <!-- w3 css -->
        <link rel="stylesheet" href="<?=site_url('assets/public/css/w3.css') ?>">
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?=site_url('assets/files/icon_logo.ico')?>">
        <link rel="apple-touch-icon" sizes="144x144" type="image/x-icon" href="<?=site_url('assets/files/portfolio_logo.png')?>">
        
        <!-- All CSS Plugins -->
        <link rel="stylesheet" type="text/css" href="<?=site_url('assets/public/css/plugin.css') ?>">
        
        <!-- Main CSS Stylesheet -->
        <link rel="stylesheet" type="text/css" href="<?=site_url('assets/public/css/style.css') ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Google Web Fonts  -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700">
        <script type="text/javascript" src="<?=site_url('assets/public/js/jquery-3.2.1.min.js') ?>"></script>
        <script type="text/javascript">
            var base_url = "<?php echo base_url();?>";
        </script>
    </head>
    <body>
    	<!-- Preloader Start -->
        <div class="preloader">
            <div class="kenthinking"><?=$profile_information ? $profile_information->first_name != '' ?  $profile_information->first_name : 'Kenneth' : 'Kenneth'?> is thinking...</div>
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
                                <img src="<?=public_logo()?>" alt="">
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
                                    <?if($profile_information):?>
                                        <?$fn = $profile_information->first_name;?>
                                        <?$ln = $profile_information->last_name;?>
                                        <?if($fn != '' AND $ln != ''):?>
                                            <h1><?=$fn . ' ' .$ln?></h1>
                                        <?else:?>
                                            <h1>Kenneth Macaraeg</h1>
                                        <?endif;?>
                                    <?else:?>
                                        <h1>Kenneth Macaraeg</h1>
                                    <?endif;?>
                                    <span><?=$profile_information ? $profile_information->citation != '' ? $profile_information->citation : 'Web Developer' : 'Web Developer'?></span>
                                </div> 
                                <ul class="social-icon">
                                    <?if($links_information):?>
                                        <?foreach($links_information as $kl => $vl):?>
                                        <li><a href="<?=$vl->link_address?>" target="_blank" class="<?=$vl->class_of_link?>"><i class="<?=$vl->name_of_link?>"></i></a></li>
                                        <?endforeach;?>
                                    <?endif;?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- About Me (Left Sidebar) End -->

                    <!-- Blog Post (Right Sidebar) Start -->
                    <div class="col-md-9">
                            <div class="col-md-12 page-body">
                                <?=$yield?>
                                <!-- Subscribe Form Start -->
                                <div class="col-md-8 col-md-offset-2">
                                    <form id="mc-form">
                                        <div class="subscribe-form margin-top-20">
                                            <input id="mc-email" name="email" type="email" placeholder="Email Address" class="text-input" required="required">
                                            <button class="submit-btn" type="submit">Submit</button>
                                        </div>
                                        <p>Subscribe</p>
                                        <label for="mc-email" id="div1" class="mc-label div1" style="display:none;"></label>
                                    </form>
                                    <div id="div1" ></div>
                                </div>
                                <!-- Subscribe Form End -->
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
                                    <p>© 2017 Kenzou</p>
                                    <!-- UiPasta Credit Start -->
                                    <div class="uipasta-credit">
                                        <a href="" target="_blank"></a>
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
        <!-- jqeuyr 3.2.1 -->
    </body>
</html>

<script>
$(document).ready(function(){
    $("button").click(function(e){
        e.preventDefault();
        $('.in_dv').remove();
        var em = $('#mc-email').val();
        if (em == '') {
            $(".div1").fadeIn(1000).append("<div class='in_dv'><span class='fa fa-close' style='color:red'></span> Please write your email. Thanks.</div>");
        } else {
          $.ajax({ 
          url: base_url + 'Subscribe/email', // point to server-side controller method
          dataType: 'json', // what to expect back from the server
          cache: false,
          data: {'email' : em},
          type: 'post',
          success: function (res) {
            // console.log(res);
            if (res['msg_err']) {
                $(".div1").fadeIn(1000).append("<div class='in_dv'><span class='fa fa-close' style='color:red'></span> "+res['msg_err']+"</div>");
            }
            if (res['msg_succ']) {
                $(".div1").fadeIn(2000).append("<div class='in_dv'><span class='fa fa-check' style='color:green'></span> "+res['msg_succ']+"</div>");
            }
          },
          error: function (res) {
                // console.log(res);
          }   
          });
        }
        setTimeout(function(){
                 $('.div1').hide();
        },8000);
    });
});
</script>
