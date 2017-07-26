<div class="row">
    <div class="sub-title">
     		<h2>Contact Me</h2>
        <a href="<?=site_url('Home') ?>"><i class="icon-home"></i></a>
    </div>
    <div class="col-md-12 content-page">
        <div class="col-md-12 blog-post">
            <!-- Intro Start -->
            <div class="post-title margin-bottom-10">
                <!-- Contact Me Start -->
                <div class="post-title margin-top-70">
                    <h1>Get in touch with <span class="main-color">Me</span></h1>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="contact-us-detail">  
                            <i class="icon-screen-smartphone color-6"></i>
                            <p><a href="tel:+63<?=$profile_information ? $profile_information->contact_number : '+63907 0870 883'?>">+63<?=$profile_information ? $profile_information->contact_number : '+63907 0870 883'?></a></p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="contact-us-detail">
                            <i class="icon-envelope-open color-5"></i>
                            <p><a href="mailto:<?=$profile_information ? $profile_information->email_address : 'jbourne.kenmac17@gmail.com'?>"><small><?=$profile_information ? $profile_information->email_address : 'jbourne.kenmac17@gmail.com'?></small></a></p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="contact-us-detail">
                            <i class="icon-clock color-3"></i>
                            <p><?=$profile_information ? $profile_information->my_schedule : 'Mon - Fri 08:00 – 18:00'?></p>
                        </div>
                    </div>
                </div>
                <div class="row margin-top-30">
                  <div class="col-md-12">   
                    <div class="row">
                      <form  id="contact_form" action="" method="POST">
				                <div class="col-sm-6">
						              <div class="form-group">
                            <div id="err_name"></div>
						                <input type="text" id="name" name="name" class="form-control" placeholder="Your Name">
						              </div>
                        </div>
                        <div class="col-sm-6">
				                  <div class="form-group">
                            <div id="err_email"></div>
						                <input type="email" id="email" name="email" class="form-control" placeholder="Your Email">
						              </div>
                        </div>
                        <div class="col-sm-6">
						              <div class="form-group">
    							          <input type="text" id="website" name="website" class="form-control" placeholder="Your Website">
						              </div>
                        </div>
                        <div class="col-sm-6">
						              <div class="form-group">
    							          <input type="text" id="address" name="address" class="form-control" placeholder="Where are You From?">
						              </div>
                        </div>
                        <div class="col-sm-12">
                          <div id="err_subj"></div>
						              <select id="subject" name="subject" class="form-group form-control">
  							             <option value="" selected>Subject</option>
  							             <option value="Website">Website Design & Development</option>
  							             <option>Wordpress Development</option>
						                 <option>Search Engine Optimization</option>
                             <option>Mobile Website</option>
  							             <option>I Want to General Talk</option>
                             <option>Other</option>
						              </select>
                        </div>
                        <div class="col-sm-12">
				                  <div class="textarea-message form-group">
                            <div id="err_msg"></div>
				                    <textarea id="message" name="message" class="textarea-message form-control" placeholder="Your Message" rows="5"></textarea>
  						            </div>
                        </div>
                        <div class="text-center">      
                          <input type="submit" id="submit" class="load-more-button subm" value="Send">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
            <!-- Contact Me End -->
        </div>
    </div>
</div>
<!-- <div class="col-md-12 page-body margin-top-50 footer"> -->
<div class="row">
    <div class="col-md-12 content-page">

      <div id="map" style="width:100%;height:500px"></div>
    </div>
</div>
<style type="text/css">
  .err{
    color: red;
  }
</style>
<script type="text/javascript">
  $('#submit').on('click',function(e){
    e.preventDefault();
    $('.err').remove();
    var name, email, website, address, subject, message;
    name = $('#name').val();
    email = $('#email').val();
    website = $('#website').val();
    address = $('#address').val();
    subject = $('#subject').val();
    message = $('#message').val();
    if (name == '') {
      $('#err_name').append('<div class="err">Name field is required.</div>');
    }
    if (email == '') {
      $('#err_email').append('<div class="err">Email field is required.</div>');
    }
    if (message == '') {
      $('#err_msg').append('<div class="err">Message field is required.</div>');
    }
    if (subject == '') {
      $('#err_subj').append('<div class="err">Subject field is required.</div>');
    }
    if (name != '' && email != '' && message != '' && subject != '') {
      alert('ok');
    }
    // alert('name:'+name);
    // alert('email:'+email);
    // alert('website:'+website);
    // alert('address:'+address);
    // alert('subject:'+subject);
    // alert('message:'+message);
  });
</script>
<script>
    function myMap() {
      var mapCanvas = document.getElementById("map");
      var myCenter = new google.maps.LatLng(14.642110,121.122282); 
      var mapOptions = {center: myCenter, zoom: 15};
      var map = new google.maps.Map(mapCanvas,mapOptions);
      var marker = new google.maps.Marker({
        position: myCenter,
        animation: google.maps.Animation.BOUNCE
      });
      marker.setMap(map);

      var infowindow = new google.maps.InfoWindow({
        content: "Hello I'm here."
      });
      infowindow.open(map,marker);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDODmjj4sggrTuMFPS0SBNNTyfAkDbIY50&callback=myMap"></script>
