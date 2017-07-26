	  <div class="row">
        <div class="sub-title">
       	    <h2><span class="fa fa-code"></span></h2>
            <a href="<?=site_url('Contact') ?>"><i class="icon-envelope"></i></a>
        </div>
        <div class="col-md-12 content-page">
            <!-- Blog Post Start -->
            <div class="col-md-12 blog-post">
                <div class="post-title">
                  <?if($story_information):?> 
                    <?=$story_information->self_introduction?>
                  <?else:?>
                    <h1>Hi,</h1>
                    <a href="#"><h1>I'm Kenneth,</h1></a>
                    <h1>Web Developer</h1>
                    <p>Frontend to Backend Developer</p>                         			
                  <?endif;?>
                </div>  
            </div>
            <!-- Blog Post End -->
        </div>
    </div>
