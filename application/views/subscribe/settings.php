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
        
        <title>Subscribe</title>



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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700">
        <link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
        <script type="text/javascript">
            var base_url = "<?php echo base_url();?>";
        </script>
        <style type="text/css">
            body {
              background:url('../assets/public/images/subs/bg-img.jpg') !important ;
              margin:0px;
              font-family: 'Ubuntu', sans-serif;
              /*height: 100%;*/
                background-size: 5000px 5001px;
            }
            .subs {
              margin:0 auto;
              max-width:500px;
            }
            .subs-header {
              color: white;
              text-align:center;
              text-shadow:  0 0 10px #000, 0 0 5px #4facff;
              font-size:300%;
            }
            .subs-form {
              border:.5px solid #fff;
              background:#d4e0fc;
              border-radius:10px;
              box-shadow:0px 0px 10px #000;
            }
            .subs-form h3 {
              text-align:left;
              margin-left:40px;
              color:#fff;
            }
            .subs-form {
              box-sizing:border-box;
              padding-top:100px;
              padding-bottom:10%;
              margin:5% auto;
              text-align:center;
            }
            .subs input[type="text"] {
              max-width:400px;
              width: 80%;
              line-height:3em;
              font-family: 'Ubuntu', sans-serif;
              margin:-1em 3em;
              border-radius:5px;
              border:2px solid #f2f2f2;
              outline:none;
              padding-left:10px;
            }
            .subs input[type="submit"] {
              max-width:400px;
              width: 80%;
              line-height:3em;
              font-family: 'Ubuntu', sans-serif;
              margin:2em 3em;
              border-radius:25px;
              border:2px solid #f2f2f2;
              outline:none;
              padding-left:0px;
            }
            .sign-up{
              color:#f2f2f2;
              margin-left:-70%;
              cursor:pointer;
              text-decoration:underline;
            }
            .try-again {
              color:#f2f2f2;
              text-decoration:underline;
              cursor:pointer;
            }
            /* bg video */
            * { box-sizing: border-box; }
            .video-background {
              background: #000;
              position: fixed;
              top: 0; right: 0; bottom: 0; left: 0;
              z-index: -99;
            }
            .video-foreground,
            .video-background iframe {
              position: absolute;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
              pointer-events: none;
            }
            #vidtop-content {
                top: 0;
                color: #fff;
            }
            .vid-info { position: absolute; top: 0; right: 0; width: 33%; background: rgba(0,0,0,0.3); color: #fff; padding: 1rem; font-family: Avenir, Helvetica, sans-serif; }
            .vid-info h1 { font-size: 2rem; font-weight: 700; margin-top: 0; line-height: 1.2; }
            .vid-info a { display: block; color: #fff; text-decoration: none; background: rgba(0,0,0,0.5); transition: .6s background; border-bottom: none; margin: 1rem auto; text-align: center; }
            @media (min-aspect-ratio: 16/9) {
              .video-foreground { height: 300%; top: -100%; }
            }
            @media (max-aspect-ratio: 16/9) {
              .video-foreground { width: 300%; left: -100%; }
            }
            @media all and (max-width: 600px) {
            .vid-info { width: 50%; padding: .5rem; }
            .vid-info h1 { margin-bottom: .2rem; }
            }
            @media all and (max-width: 500px) {
            .vid-info .acronym { display: none; }
            }
        </style>

    </head>
    <body>
      <div class="video-background">
        <div class="video-foreground">
          <iframe  width="640" height="360" src="https://www.youtube.com/embed/BsekcY04xvQ?rel=0&mute=1&autoplay=1&loop=1&playlist=BsekcY04xvQ" frameborder="0" id="myVideo" allowfullscreen></iframe>
        </div>
      </div>
        <div class="container">
                <div class="col-lg-12">
                      <div class="subs">
                          <div class="subs-header">
                            <h3>
                                Please Fill Up below information to continue your subscription. Thanks!  
                            </h3>
                          </div>
                          <div class="subs-form">
                            <div class="form-group">
                                <input type="text" id="fname" name="first_name" class="form-control" placeholder="First Name"/>
                            </div>

                            <div class="form-group">
                            <input type="text" id="lname" name="last_name" class="form-control" placeholder="Last Name"/>
                            </div>

                            <div class="form-group">
                                <input type="submit" id="submit" class="form-control btn-primary" value="Submit" class="subs-button"/>
                            </div>

                            <br>
                            <br>
                            <br>
                            <p>© 2017 Kenzou </p>
                          </div>
                        </div>
                        <div class="error-page">
                          <div class="try-again">Error: Try again?</div>
                        </div>
                </div>
                </div>
        <script type="text/javascript">
        var myVideo =  document.getElementById('myVideo'); 
        myVideo.muted = true;
            // $('.error-page').hide(0);

            // $('.subs-button').click(function(){
            //   $('.subs').slideUp(500);
            //   $('.error-page').slideDown(1000);
            // });

            // $('.try-again').click(function(){
            //   $('.error-page').hide(0);
            //   $('.subs').slideDown(1000);
            // });

            $('#submit').on('click', function (e) {
              // e.preventDefault();
              var fn = $('#fname').val();
              var ln = $('#lname').val();
              if (fn == '' || ln == '') {
                $('.err').remove();
                if (fn == '') {
                    $('#fname').before('<span class="err" style="color:maroon">Please write your First Name. Thanks.<span>');
                }
                if (ln == '') {
                    $('#lname').before('<span class="err" style="color:maroon">Please write your Last Nme. Thanks.<span>');
                }
              } else {

                  $.ajax({ 
                      url: base_url + 'Subscribe/post', // point to server-side controller method
                      dataType: 'json', // what to expect back from the server
                      cache: false,
                      // contentType: false,
                      // processData: false,
                      data: {'first_name' : fn, 'last_name' : ln},
                      type: 'post',
                      success: function (res) {
                        console.log(res);
                        $('.form-group').remove();
                        $('p').remove();
                        $('.subs-form').append('<h4><a class"fa fa-check"></a> Thank you for completing your subsciption.</h4></br></br></br></br></br></br></br><p>© 2017 Kenzou </p>');
                        setTimeout(function(){
                           window.location.href = base_url;
                                        },15000);
                      },
                      error: function (res) {
                            console.log(res);
                      }   
                  });
              }
          });
   
        </script>
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