    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-tasks	"></i>About</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-laptop"></i><a href="<?=site_url('Admin_Dashboard')?>">Dashboard</a></li>
          <li><i class="fa fa-tasks"></i>About</li>                
        </ol>
      </div>
    </div>
    <div class="row">
    	<div class="col-lg-12">
        <?=$system_message_information?>
        <?=form_error('life_adventure', '<div id="error">', '</div>'); ?>
    	</div>
    </div>
    <div class="row">&nbsp;</div>
    <!--tab nav start-->
    <section class="panel">
        <header class="panel-heading tab-bg-primary ">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="#professional">Add Skills</a>
                </li>
                <li class="">
                    <a data-toggle="tab" href="#rating">Rate Skills</a>
                </li>
                <li class="">
                    <a data-toggle="tab" href="#story">Tell Story About Yourself</a>
                </li>
                <li class="">
                    <a data-toggle="tab" href="#video" onclick="enableAutoplay()">Upload Video</a>
                </li>
                <li class="">
                    <a data-toggle="tab" href="#service">Service</a>
                </li>
            </ul>
        </header>
        <div class="panel-body">
            	<div class="tab-content">
            		<!-- Add Skills -->
                <div id="professional" class="tab-pane active">
                		<!-- </br> -->
                    <section class="panel">
								        <header class="panel-heading">
								            Professional Skills
								        </header>
								        <div class="panel-body">
									        <form action="<?=site_url('Admin_about/add_skills')?>" class="form-validate form-horizontal" method="post">
					                    <div class="form-group ">
					                        <label for="cname" class="control-label col-lg-2">Skills <span class="required">*</span></label>
					                        <div class="col-lg-10">
					                            <input name="tagsinput" id="tagsinput" class="tagsinput" value="<?=$my_skills?>" />
					                        </div>
					                    </div>
					                    <div class="form-group">
					                        <div class="col-lg-offset-2 col-lg-4">
													            <input type="submit" class="form-control btn btn-primary" value="Save Changes">
					                        </div>
					                    </div>
									        </form>
								        </div>
								    </section>
                </div>
                <!-- Rate Skills -->
                <div id="rating" class="tab-pane">
                		</br>
			              <div class="col-lg-12">
							        <form action="<?=site_url('Admin_about/rate_skills')?>" class="form-validate form-horizontal" method="post">
												<table class="table bootstrap-datatable countries">
													<thead>
														<tr>
															<th width="60px"></th>
															<th width="240px">Name</th>
															<th>Ratings</th>
														</tr>
													</thead>   
													<tbody>
															<?if($ratings):?>
															<?$n = 0;?>
															<?foreach($ratings as $k => $r):?>
															<?$n++?>
																	<tr>
																			<td><?=$n?></td>
																			<td>
														              <?=$r->name_of_skill?>
												              </td>
												              <td>
													              <?if($r->rating == 0):?>
													              	<input type="hidden" name="rating<?=$n?>[]" value="<?=$r->id?>">
	                                        <select class="selectpicker form-control profclas" name="rating<?=$n?>[]" data-live-search="true">
	                                          <option data-tokens="" value="0"> -- Please rate your skill here -- </option>
	                                          <option data-tokens="10" value="10" <?=$r->rating == 10 ? 'selected' : set_value('rating[]') == 10 ? 'selected' : ''; ?>>1 to 10 %</option>
	                                          <option data-tokens="20" value="20" <?=$r->rating == 20 ? 'selected' : set_value('rating[]') == 20 ? 'selected' : ''; ?>>10 to 20 %</option>
	                                          <option data-tokens="30" value="30" <?=$r->rating == 30 ? 'selected' : set_value('rating[]') == 20 ? 'selected' : ''; ?>>20 to 30 %</option>
	                                          <option data-tokens="40" value="40" <?=$r->rating == 40 ? 'selected' : set_value('rating[]') == 20 ? 'selected' : ''; ?>>30 to 40 %</option>
	                                          <option data-tokens="50" value="50" <?=$r->rating == 50 ? 'selected' : set_value('rating[]') == 20 ? 'selected' : ''; ?>>40 to 50 %</option>
	                                          <option data-tokens="60" value="60" <?=$r->rating == 60 ? 'selected' : set_value('rating[]') == 20 ? 'selected' : ''; ?>>50 to 60 %</option>
	                                          <option data-tokens="70" value="70" <?=$r->rating == 70 ? 'selected' : set_value('rating[]') == 20 ? 'selected' : ''; ?>>60 to 70 %</option>
	                                          <option data-tokens="80" value="80" <?=$r->rating == 80 ? 'selected' : set_value('rating[]') == 20 ? 'selected' : ''; ?>>70 to 80 %</option>
	                                          <option data-tokens="90" value="90" <?=$r->rating == 90 ? 'selected' : set_value('rating[]') == 20 ? 'selected' : ''; ?>>80 to 90 %</option>
	                                          <option data-tokens="100" value="100" <?=$r->rating == 100 ? 'selected' : set_value('rating[]') == 20 ? 'selected' : ''; ?>>90 to 100 %</option>
	                                        </select>
	                                      <?else:?>
    												       				<div class="currentrate">
						                                  <div class="progress thin">
																								<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?=$r->rating?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$r->rating?>%">
																								</div>
																							</div>
																							<span class="sr-only"><?=$r->rating?> %</span>  
																					</div>
																					<div class="editrate">	
														              	<input type="hidden" name="rating<?=$n?>[]" value="<?=$r->id?>">
		                                        <select class="selectpicker form-control profclas" name="rating<?=$n?>[]" data-live-search="true">
		                                          <option data-tokens="" value="0"> -- Please rate your skill here -- </option>
		                                          <option data-tokens="10" value="10" <?=$r->rating == 10 ? 'selected' : set_value('rating<?=$n?>[]') == 10 ? 'selected' : ''; ?>>1 to 10 %</option>
		                                          <option data-tokens="20" value="20" <?=$r->rating == 20 ? 'selected' : set_value('rating<?=$n?>[]') == 20 ? 'selected' : ''; ?>>10 to 20 %</option>
		                                          <option data-tokens="30" value="30" <?=$r->rating == 30 ? 'selected' : set_value('rating<?=$n?>[]') == 30 ? 'selected' : ''; ?>>20 to 30 %</option>
		                                          <option data-tokens="40" value="40" <?=$r->rating == 40 ? 'selected' : set_value('rating<?=$n?>[]') == 40 ? 'selected' : ''; ?>>30 to 40 %</option>
		                                          <option data-tokens="50" value="50" <?=$r->rating == 50 ? 'selected' : set_value('rating<?=$n?>[]') == 50 ? 'selected' : ''; ?>>40 to 50 %</option>
		                                          <option data-tokens="60" value="60" <?=$r->rating == 60 ? 'selected' : set_value('rating<?=$n?>[]') == 60 ? 'selected' : ''; ?>>50 to 60 %</option>
		                                          <option data-tokens="70" value="70" <?=$r->rating == 70 ? 'selected' : set_value('rating<?=$n?>[]') == 70 ? 'selected' : ''; ?>>60 to 70 %</option>
		                                          <option data-tokens="80" value="80" <?=$r->rating == 80 ? 'selected' : set_value('rating<?=$n?>[]') == 80 ? 'selected' : ''; ?>>70 to 80 %</option>
		                                          <option data-tokens="90" value="90" <?=$r->rating == 90 ? 'selected' : set_value('rating<?=$n?>[]') == 90 ? 'selected' : ''; ?>>80 to 90 %</option>
		                                          <option data-tokens="100" value="100" <?=$r->rating == 100 ? 'selected' : set_value('rating<?=$n?>[]') == 100 ? 'selected' : ''; ?>>90 to 100 %</option>
		                                        </select>
												                  </div> 
	                                      <?endif;?>
		                                    <?php echo form_error('rating<?=$n?>[]', '<div class="error">', '</div>'); ?>
												              </td>
														      </tr>	
														  <?endforeach;?>
												      <tr>
												          <td colspan="4">
												         	    <div class="col-lg-offset-3 col-lg-4">
														            <input type="submit" class="form-control btn btn-primary" value="Save Changes">
												              </div>
												         	    <div class="col-lg-2">
					                              <a class="form-control btn btn-default" id="editbars" >Edit All</a>
					                              <a class="form-control btn btn-default" id="returnbars">Return</a>
												              </div>
										              </td>
												      </tr>
												      <?endif;?>
												  </tbody>
									      </table>
							        </form>
						        </div>
                </div>
                <!-- Life Story -->
                <div id="story" class="tab-pane">
                		</br>
						        <section class="panel">
						              <header class="panel-heading">
						                  Yourself / Life Story / Story Telling
						              </header>
						              <div class="panel-body">
												    <form class="form-validate form-horizontal" action="<?=site_url('Admin_about/life_story')?>" method="post">
								                <div class="form-group">
										              <div class="col-lg-12">
									                  <textarea class="form-control ckeditor" name="life_adventure" rows="6"><?=$life_story != '' ? $life_story : set_value('life_adventure')?></textarea>
									                </div>
								                </div>
								                <div class="form-group">
										              <div class="col-lg-offset-4 col-lg-4">
														          <input class="form-control btn btn-primary" type="submit" value="Save it">
														      </div>
													      </div>
											      </form>
										      </div>
						        </section>
                </div>
                <!-- Upload Video -->
                <div id="video" class="tab-pane">
                		</br>
                		<?=clear_all_cache()?>
						        <section class="panel">
						              <header class="panel-heading">
						                  Upload your Video web development thoughts or self introduction
						              </header>
						              <div class="panel-body">
      				              	<div class="row">
							              		<div class="msg_vd"></div>
							              	</div>
							              	<div class="row">&nbsp;</div>
								              <div class="row">
								              	<div class="col-lg-7">
		                              <?php echo form_open_multipart('Admin_About/Upload_video');?>
		                                  <input type="file" name="userfile" class="form-control" id="imgInp" />
		                                  <br>
		                                  <div class="col-lg-5">
			                                  <input type="submit" name="upload_pub_logo" id="upload_pub" class="form-control btn btn-primary" value="Upload">
		                                  </div>
		                                  <div class="col-lg-7">
		                                  	<p>Please choose a file format of: <em>mp4</em></p>
		                                  	<p>Upload Limit of: <em>30M</em></p>
		                                  	<p>Thanks!</p>
		                                  </div>
		                                  <div class="col-lg-12">
		                                  	<h4>Description</h4>
		                                  	<textarea class="form-control" id="vid_desc" rows="3"><?=$video_desc?></textarea>
		                                  </div>
		                              </form>
	                              </div>
	                              <div class="col-lg-5">
	                              	<video  id="myVideo" controls>
																	  <source src="<?=my_video()?>" type="video/mp4">
																	  Your browser does not support the video tag.
																	</video>
	                              </div>
                              </div>
                              <div class="row">
	                              
                            </div>
										      </div>
						        </section>
                </div>
                <!-- Services -->
                <div id="service" class="tab-pane">
                		</br>
						        <section class="panel">
				              <header class="panel-heading">
				                  Your Services
				              </header>
				              <div class="panel-body">
				              	<div class="row">
				              		<div class="msg_srv"></div>
				              	</div>
				              	<div class="row">&nbsp;</div>
				              	<div class="row">
					              	<div class="col-lg-12">
													    <form class="form-validate form-horizontal" id="register_form_service" action="<?=site_url('Admin_About/add_services')?>" method="post">
													    		<?if($my_services):?>
													    		<?$n = 0?>
													    			<?foreach($my_services as $k => $s):?>
													    				<?$n++?>
			                                <div class="form-group fg_hide" >
			                                	<div class="col-lg-10">
			                                    <label for="service1" class="control-label col-lg-2"><?=$n?>.</label>
			                                    <div class="col-lg-10">
																						<input class="form-control serv rem_srv serv_update" idtag="<?=$s->id?>" id="service1" name="service<?=$n?>" value="<?=$s->name_of_service?>" type="text"  />
																					</div>
																				</div>
																				<div class="col-lg-1">
																					<a id="del<?=$s->id?>" idtag="<?=$s->id?>" data-original-title="Remove" data-content="Delete Row Now?" data-placement="left" data-trigger="hover" class="btn btn-danger btn-lg btn-block popovers serv_del serv rem_srv" ><span class="fa fa-trash-o"></span></a>
																				</div>
			                                </div>
													    			<?endforeach;?>
													    		<?endif;?>

	                                <div id="inputcreate">
	                                </div>
	                                <div class="form-group"></div>
									                <div class="form-group">
													         	    <div class="col-lg-offset-3 col-lg-4">
															            <input id="sav" type="submit" class="form-control btn btn-primary serv" value="Save Changes">
													              </div>
													         	    <div class="col-lg-2">
						                              <a class="form-control btn btn-default "   id="addit" >Add Services</a>
					                             </div>
					                             <?if($my_services):?> 
													         	    <div class="col-lg-2">
						                              <a class="form-control btn btn-default"   id="modit" >Modify Services</a>
													              </div>
													              <?endif;?>
														      </div>
												      </form>
										      </div>
									      </div>
								      </div>
						        </section>
                </div>
            </div>
        </div>
    </section>
