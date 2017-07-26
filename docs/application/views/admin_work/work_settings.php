	    <div class="row">
	      <div class="col-lg-12">
	        <h3 class="page-header"><i class="fa fa-suitcase"></i>Work</h3>
	        <ol class="breadcrumb">
	          <li><i class="fa fa-laptop"></i><a href="<?=site_url('Admin_Dashboard')?>">Dashboard</a></li>
	          <li><i class="fa fa-suitcase"></i>Work</li>                
	        </ol>
	      </div>
	    </div>
	    <div class="row">
		    <div class="col-lg-12">
				  <section class="panel">
				  		<!-- Header -->
						  <header class="panel-heading">
						      Project/s Accomplishment
						  </header>
						  <br>
						  <br>
						  <!-- message msg -->
						  <div class="col-lg-12">
							  <div class="row">
							  	<div class="col-lg-12">
							  		<div id="msg"></div>
							  	</div>
							  </div>
							  <div class="row">&nbsp;</div>
					  		<!-- project -->
					  		<div class="row">
								  <div class="col-lg-12">
							      <section class="panel">
								        <header class="panel-heading tab-bg-primary">
								            <ul class="nav nav-tabs">
								                <li class="active">
								                    <a data-toggle="tab" href="#new">
								                        New Project<span class="icon-home"></span>
								                    </a>
								                </li>
								                <li >
								                    <a data-toggle="tab" href="#projects">
								                        Projects <i class="icon-user"></i>
								                    </a>
								                </li>
								            </ul>
								        </header>
								        <div class="panel-body">
								            <div class="tab-content">
								            		<!-- new project -->
								                <div id="new" class="tab-pane active">
		                  					  		<div class="row">
		                  					  			&nbsp;
		                  					  		</div>
		                  					  		<!-- Skill label -->
																	    <div class="row">
																	    	<div class="center">
																	      		<div class="col-lg-1"></div>
																	      		<div class="col-lg-11	">
																		        	<label for="cname">Skills Used </label>
																	      		</div>
																		    </div>
																	    </div>
																	    <!-- Skills -->
																	    <div class="row">
																			  <div class="col-md-12">
																        		<div class="col-lg-1"></div>
																            <div class="col-lg-10">
																                <input name="tagsinput" id="skil_mod" class="tagsinput" value="" />
																            </div>
																		    </div>
																	    </div>
																	    <!-- hr -->
																	    <div class="row">

																		   	<hr>
																	    </div>
																			<!-- Description label-->
																	    <div class="row">
																	    	<div class="center">
																	      		<div class="col-lg-1"></div>
																	      		<div class="col-lg-11	">
																		        	<label for="cname">Description</label>
																	      		</div>
																		    </div>
																	    </div>
																	    <!-- Description -->
																			<div class="row">
														        		<div class="col-lg-1"></div>
														        		<div class="col-lg-10">
															              <div class="col-lg-12">
														                  <textarea class="form-control ckeditor" id="editor" name="editor1" rows="6"></textarea>
														                  <!-- <div id="editor" class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor"> -->
															                <!-- </div> -->
																			      </div>
																				</div>
																			</div>
																	    <!-- hr -->
																	    <div class="row">

																		   	<hr>
																	    </div>
																			<!-- save -->
																			<div class="row">
																				<div class="col-lg-12">
															              <div class="col-lg-offset-4 col-lg-4">
		                                            <a href="#myModal" id="get_mod" data-toggle="modal" class="form-control btn btn-primary"> Continue </a> <!-- <input class="form-control btn btn-primary" type="submit" value="Save it"> --> 
		                                        </div>
																				</div>
																			</div>
										            </div>
										            <!-- end new project -->
										            <!-- Projects -->
								                <div id="projects" class="tab-pane ">
									                	<div class="row">&nbsp; </div>
									                	<div id="ref_div">
						                          <div class="table-responsive">
						                            <table class="table" id="cd-grid">
						                              <thead>
						                                <tr>
						                                  <th>Description</th>
						                                  <th>Skills Applied</th>
						                                  <th width="210px">Picture/s</th>
						                                  <th width="110px">Action</th>
						                                </tr>
						                              </thead>
						                              <tbody>
						                              	<?if($my_projects):?>
							                              	<?foreach($my_projects as $k => $v):?>
								                                <tr>
								                                  <td><?=$v['description'];?></td>
								                                  <td>
									                                  <?if($v['skills']):?>
									                                  	<?for($x = 0; $x < count($v['skills']);$x++):?>
											                                  <span class="fa fa-check"></span><?=$v['skills'][$x]->name_of_skill;?></br>
										                                  <?endfor;;?>
									                                  <?endif;?>
									                                </td>
								                                  <td>
								                                  	<?if($v['images']):?>
								                                  		<?foreach($v['images'] as $ik => $iv):?>
								                                  			<img src="<?=site_url('assets/files/proj_imgs/'.$iv->name_of_picture.'.'.$iv->picture_format);?>" height="60px" width="60px">
								                                  		<?endforeach;?>
								                                  	<?endif;?>
								                                  </td>
								                                  <td>
									                                  <div class="btn-group">
									                                      <a data-original-title="Edit" data-content="Edit Skills and Description, Add or Remove Picture/s" data-placement="top" data-trigger="hover" class="btn btn-primary popovers" href="#"><i class="icon_plus_alt2"></i></a>
									                                      <a  data-original-title="Publish" data-content="Will be shown on the site or production" data-placement="top" data-trigger="hover" class="btn btn-success popovers" href="#"><i class="icon_check_alt2"></i></a>
									                                      <a data-original-title="Delete" data-content="Will be deleted permanently" data-placement="top" data-trigger="hover" class="btn btn-danger popovers" href="#"><i class="icon_close_alt2"></i></a>
									                                  </div>
								                                  </td>
								                                </tr>
								                                <?endforeach;?>
						                                <?endif;?>
						                              </tbody>
						                            </table>
						                          </div>
					                          </div>
								                </div>
								                <!-- end projects -->
										        </div>
								        </div>
										</section>
									</div>
								</div>
							</div>
					</section>
				</div>
			</div>
    <div aria-hidden="true" aria-labelledby="" role="dialog" tabindex="-1" id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">New Project</h4>
                </div>
                <div class="modal-body">
                    <!-- <form role="form" action="<?=site_url('Admin_Work/upload_pictures')?>" method="post"> -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Skills Applied</label>
                            <div id="skill_on_mod"></div>
                            <input type="hidden" name="skills" class="form-control" id="skill_on_mod_int" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <p id="desc_compres"></p>
                            <div class="hdckcreator">
						                  <textarea class="form-control ckeditor" id="desc_mod" name="description" rows="6"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                        		<div class="mgs_int"></div>
                            <label for="exampleInputFile">File input</label>
                            <input type="file" id="multiFiles" name="files[]" onclick="resetAll()" onchange="preview_images()" accept="image/gif, image/jpeg, image/png" multiple/>
                            <p class="help-block">Please choose images that are <em>png, gif, jpg</em> in format</p>
                            <p>Thanks!</p>
												    <!-- <button id="upload" class="form-control btn btn-primary">Upload</button> -->
                        </div>
                        <div class="form-group">
                        	<div id="prev_img">
														<!-- <p id="image_preview"></p> -->
                        	</div>
                        </div>
                        <div class="form-group">
                        	<div class="row">
                        		<div class="col-lg-12">
                            </div>
                          </div>
                        </div><div class="form-group">
                        	<div class="row">
                        		<div class="col-lg-12">
                              <div class="checkbox">
                                <label>
                                    <input type="checkbox" required="required"> Validate
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <button id='upload' class="btn btn-primary">Save Project</button>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
