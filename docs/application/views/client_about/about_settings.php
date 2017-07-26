	<div class="row">
      <div class="sub-title">
       		<h2>About Me</h2>
          <a href="<?=site_url('Contact') ?>"><i class="icon-envelope"></i></a>
      </div>
      <div class="col-md-12 content-page">
          <div class="col-md-12 blog-post">
              <!-- My Intro Start -->
              <div class="post-title margin-bottom-30">
                  <h1><span class="main-color">Web Development</span></h1>
                  <ul class="knowledge">
                      <?if($skills_information):?>
                        <?foreach($skills_information as $sk => $sv):?>
                          <li class="bg-color-<?=rand(1,6)?>"><?=$sv->name_of_skill?></li>
                        <?endforeach;?>
                      <?endif;?>
                  </ul>
              </div>
              <div class="w3-container">
                  <!-- PHP -->
                  <div class="w3-row">

                    <?if($skills_information):?>
                      <?foreach($skills_information as $skk => $svv):?>
                        <div class="w3-col m2">
                            <p><?=$sv->name_of_skill?></p>
                        </div>
                        <div class="w3-col m10 ">
                            <div class="w3-light-grey w3-round-xlarge">
                                <div class="w3-container w3-blue w3-round-xlarge w3-center" style="width:<?=$sv->rating?>%"><?=$sv->rating?>%
                                </div>
                            </div>
                        </div>
                      <?endforeach;?>
                    <?endif;?>
                  </div>
              </div>
              <!-- My Intro End -->
                   <?if($story_information):?> 
                    <?=$story_information->life_adventure?>                          
                  <?endif;?>
              <!-- Video Start -->
              <div class="video-box margin-top-40 margin-bottom-80">
                <?if($story_information):?>
                  <div class="video-tutorial">
                     <a class="video-popup" href="<?=my_video()?>" title="My Thought">
                         <img src="<?=site_url('assets/files/default-vid.jpg') ?>" alt="">
                     </a>
                  </div>
                  <p><?=strlen(trim($story_information->video_description)) != strlen($story_information->video_description) ? '' : $story_information->video_description;?> </p>
                <?endif;?>                           
              </div>
              <!-- Video End -->
              <!-- My Service Start -->
              <div class="post-title">
                  <h1>My <span class="main-color">Services</span></h1> 
              </div>
              <div class="list list-style-2 margin-top-30">
                  <ul>
                      <?if($services_information):?>
                          <?foreach($services_information as $ks => $vs):?>
                            <li><?=$vs->name_of_service?></li>
                          <?endforeach;?>
                      <?endif;?>
                   </ul>
              </div>
              <!-- My Service End --> 
          </div>  
          <div class="col-md-12 text-center">
              <a href="<?=site_url('Contact')?>" data-toggle="tooltip" data-placement="top" title="Visit on my contact page for hire me." class="load-more-button">
                  Hire
              </a>
          </div>
      </div>
  </div>