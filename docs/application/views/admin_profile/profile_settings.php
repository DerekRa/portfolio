    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-home"></i> Home</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-laptop"></i><a href="<?=site_url('Admin_Dashboard')?>">Dashboard</a></li>
          <li><i class="fa fa-home"></i>Home</li>                
                     
        </ol>
      </div>
    </div>
    <style type="text/css">
       #profpic {
          border-radius: 8px;
          border: 1px solid #ddd;
          padding: 5px;
        }
    </style> 
    <!-- message return -->
    <div class="row">
      <div class="col-lg-12">
        <?=$msg?>
      </div>
    </div>
    <!-- public image -->
    <div class="row">
      <div class="col-lg-12">
                  <section class="panel">
                <header class="panel-heading">
                   Website Profile Image
                </header>
                <div class="panel-body">
                          <div class="row">
                              <div class="col-lg-3">
                                  <div class="col-md-3">
                                        <img id="profpic" name="image_pub" src="<?=public_logo()?>" alt="Public Picture" width="220" height="220" size="20">
                                  </div>
                              </div>
                              <div class="col-lg-12">&nbsp;</div>
                              <div class="col-lg-8">
                              <?php echo form_open_multipart('Admin_Profile/Upload_pub_picture');?>
                                  <input type="file" name="userfile" class="form-control" id="imgInp" />
                                  <br>
                                  <div class="col-lg-4">
                                  <input type="submit" name="upload_pub_logo" id="upload_pub" class="form-control btn btn-primary" value="Upload">
                              </form>
                                  </div>
                                  <div class="col-lg-8">
                                  <p>Please choose file that is formated from: <em>png</em></p>
                                  <p>Thank you!</p>
                                  </div>
                              </div>
                              <div class="col-md-2">
                              </div>
                          </div>
                          <div class="row">
                          </div>
            </section>
      </div>
    </div>
    <!-- profile pic -->
    <div class="row">
      <div class="col-lg-12">
                  <section class="panel">
                <header class="panel-heading">
                   Profile Picture
                </header>
                <div class="panel-body">
                          <div class="row">
                              <div class="col-lg-3">
                                  <div class="col-md-3">
                                        <img id="profpic" name="image_pub" src="<?=my_prof_logo()?>" alt="Public Picture" width="220" height="220" size="20">
                                  </div>
                              </div>
                              <div class="col-lg-12">&nbsp;</div>
                              <div class="col-lg-8">
                              <?php echo form_open_multipart('Admin_Profile/Upload_prof_picture');?>
                                  <input type="file" name="userfile" class="form-control" id="imgInp" />
                                  <br>
                                  <div class="col-lg-4">
                                  <input type="submit" name="upload_pub_logo" id="upload_pub" class="form-control btn btn-primary" value="Upload">
                              </form>
                                  </div>
                                  <div class="col-lg-8">
                                  <p>Please choose file that is formated from: <em>jpg</em></p>
                                  <p>Thank you!</p>
                                  </div>
                              </div>
                              <div class="col-md-2">
                              </div>
                          </div>
                          <div class="row">
                          </div>
            </section>
      </div>
    </div>
    <!-- Profile Settings -->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Profile
                </header>
                <div class="panel-body">
                    <div class="form">
                        <form class="form-validate form-horizontal " id="register_form" method="POST" action="<?=site_url('Admin_Profile/Profile_Settings')?>">
                            <?=$message_error;?>
                            <?=$message_success; ?>
                            <!-- First Name -->
                            <div class="form-group ">
                                <label for="first_name" class="control-label col-lg-2 ">First name <span class="required">*</span></label>
                                <div class="col-lg-10">
                                    <input class=" form-control profclas" id="first_name" name="first_name" type="text" value="<?=set_value('first_name') ? set_value('first_name') : $profile->first_name?>" />
                                    <?php echo form_error('first_name', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                            <!-- Last Name -->
                            <div class="form-group ">
                                <label for="last_name" class="control-label col-lg-2">Last name <span class="required">*</span></label>
                                <div class="col-lg-10">
                                    <input class=" form-control profclas" id="last_name" name="last_name" type="text" value="<?=set_value('last_name') ? set_value('last_name') : $profile->last_name?>" />
                                    <?php echo form_error('last_name', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                            <!-- Middle Name -->
                            <div class="form-group ">
                                <label for="middle_name" class="control-label col-lg-2">Middle name <span class="required">*</span></label>
                                <div class="col-lg-10">
                                    <input class=" form-control profclas" id="middle_name" name="middle_name" type="text" value="<?=set_value('middle_name') ? set_value('middle_name') : $profile->middle_name?>" />
                                    <?php echo form_error('middle_name', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                            <!-- Birthday -->
                            <div class="form-group">
                                <label for="date_of_birth" class="control-label col-lg-2">Birthday </label>
                                <div class="col-lg-10" id="datepicker">
                                 <div class='input-group date ' id='datetimepicker'>
                                      <input type='text' class="form-control profclas" name="date_of_birth" value="<?=set_value('date_of_birth') ? set_value('date_of_birth') : $profile->date_of_birth?>" />
                                      <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar">
                                          </span>
                                      </span>
                                  </div>
                                  <?php echo form_error('date_of_birth', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                            <!-- Sex -->
                            <div class="form-group ">
                                <label for="gender" class="control-label col-lg-2">Sex </label>
                                    <div class="col-lg-10">
                                       <select class="selectpicker form-control profclas" name="gender" data-live-search="true">
                                          <option data-tokens=""> -- Choose Gender -- </option>
                                          <option data-tokens="Male" <?=$profile->gender == 'Male' ? 'selected' : set_value('gender') == 'Male' ? 'selected' : ''; ?>>Male</option>
                                          <option data-tokens="Female" <?=$profile->gender == 'Female' ? 'selected' : set_value('gender') == 'Female' ? 'selected' : ''; ?>>Female</option>
                                        </select>
                                    </div>
                                    <?php echo form_error('gender', '<div class="error">', '</div>'); ?>
                            </div>
                            <!-- Address -->
                            <div class="form-group ">
                                <label for="address" class="control-label col-lg-2">Address </label>
                                <div class="col-lg-10">
                                    <input class=" form-control profclas" id="address" name="address" type="text" value="<?=set_value('address') ? set_value('address') : $profile->address?>" />
                                    <?php echo form_error('address', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                            <!-- Provintial Address -->
                            <div class="form-group ">
                                <label for="provincial_address" class="control-label col-lg-2">Provincial Address </label>
                                <div class="col-lg-10">
                                    <input class=" form-control profclas" id="provincial_address" name="provincial_address" type="text" value="<?=set_value('provincial_address') ? set_value('provincial_address') : $profile->provincial_address?>" />
                                    <?php echo form_error('provincial_address', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                            <!-- Username -->
                            <div class="form-group ">
                                <label for="username" class="control-label col-lg-2">Username</label>
                                <div class="col-lg-10">
                                    <input class="form-control profclas" id="username" name="username" type="text" value="<?=set_value('username') ? set_value('username') : $profile->username?>" />
                                    <?php echo form_error('username', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                            <!-- Citation -->
                            <div class="form-group ">
                                <label for="citation" class="control-label col-lg-2">Citation</label>
                                <div class="col-lg-10">
                                    <input class="form-control profclas" id="citation" name="citation" type="text" value="<?=set_value('citation') ? set_value('citation') : $profile->citation?>" />
                                    <?php echo form_error('citation', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                            <!-- Created -->
                            <div class="form-group ">
                                <label for="created" class="control-label col-lg-2">Created</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="created" name="created" type="text" disabled="disabled" />
                                </div>
                            </div>
                            <!-- Agree -->
                            <div class="form-group ">
                                <label for="agree" class="control-label col-lg-2 col-sm-3">Agree for changes <span class="required">*</span></label>
                                <div class="col-lg-10 col-sm-9">
                                    <input  type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="agree" />
                                </div>
                            </div>
                            <!-- Submit -->
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-2">
                                  <input type="submit" class="form-control btn btn-primary editsecond" value="Save Changes">
                                  <button class="form-control btn btn-primary editfirst" type="button">Edit</button>
                                </div>
                                <div class="col-lg-2">
                                  <button class="form-control btn btn-default editsecond editsecondcan" type="button">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>      
    <!-- Social Link Accounts -->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Social Links
                </header>
                <div class="panel-body">
                  <div class="form">
                    <form class="form-validate form-horizontal " id="form_links_account" method="POST" action="<?=site_url('Admin_profile/social_links')?>">
                        <?=$mess_error;?>
                        <?=$mess_success; ?>
                        <div class="msg_ajx"></div>
                        <?$inc = 1;?>
                        <?if(!empty($all_links)):?>
                          <?foreach($all_links as $all => $links):?>
                            <div class="form-group fr_del" >
                                <label for="links<?=$inc?>" class="control-label col-lg-1"><?=$inc?>.</label>
                                <div class="col-lg-7">
                                  <input class="form-control profclasLinks aj_data" idtag="<?=$links->links_id?>" id="links<?=$inc?>" name="linkicon<?=$inc?>[]" type="text" value="<?=set_value('link_address') ? set_value('link'.$inc) : $links->link_address ?>" />
                                </div>
                                <div class="col-lg-3">
                                  <select class="selectpicker form-control profclasLinks aj_data_nm" name="linkicon<?=$inc?>[]" idtag="<?=$links->links_id?>" data-live-search="true">
                                      <option value=""> -- Choose Link Name -- </option>
                                      <option value="fa fa-facebook,facebook" <?=set_value('link'.$inc) ? set_value('link'.$inc) == 'fa fa-facebook' ? 'selected' : '' : $links->name_of_link == 'fa fa-facebook' ? 'selected' : '' ?>>Facebook</option>
                                      <option value="fa fa-linkedin,linkedin" <?=set_value('link'.$inc) ? set_value('link'.$inc) == 'fa fa-linkedin' ? 'selected' : '' : $links->name_of_link == 'fa fa-linkedin' ? 'selected' : '' ?>>LinkedIn</option>
                                      <option value="fa fa-stack-overflow,overflow" <?=set_value('link'.$inc) ? set_value('link'.$inc) == 'fa fa-stack-overflow' ? 'selected' : '' : $links->name_of_link == 'fa fa-stack-overflow' ? 'selected' : '' ?>>Stack-Overflow</option>
                                      <option value="fa fa-github,github" <?=set_value('link'.$inc) ? set_value('link'.$inc) == 'fa fa-github' ? 'selected' : '' : $links->name_of_link == 'fa fa-github' ? 'selected' : '' ?>>Github</option>
                                      <option value="fa fa-instagram,instagram" <?=set_value('link'.$inc) ? set_value('link'.$inc) == 'fa fa-instagram' ? 'selected' : '' : $links->name_of_link == 'fa fa-instagram' ? 'selected' : '' ?>>Instagram</option>
                                      <option value="fa fa-twitter,twitter" <?=set_value('link'.$inc) ? set_value('link'.$inc) == 'fa fa-twitter' ? 'selected' : '' : $links->name_of_link == 'fa fa-twitter' ? 'selected' : '' ?>>Twitter</option>
                                      <option value="fa fa-youtube,youtube" <?=set_value('link'.$inc) ? set_value('link'.$inc) == 'fa fa-youtube' ? 'selected' : '' : $links->name_of_link == 'fa fa-youtube' ? 'selected' : '' ?>>Youtube</option>
                                      <option value="fa fa-google,google" <?=set_value('link'.$inc) ? set_value('link'.$inc) == 'fa fa-google' ? 'selected' : '' : $links->name_of_link == 'fa fa-google' ? 'selected' : '' ?>>Gmail</option>
                                      <option value="fa fa-yahoo,yahoo" <?=set_value('link'.$inc) ? set_value('link'.$inc) == 'fa fa-yahoo' ? 'selected' : '' : $links->name_of_link == 'fa fa-yahoo' ? 'selected' : '' ?>>Yahoo</option>
                                      <option value="fa fa-skype,skype" <?=set_value('link'.$inc) ? set_value('link'.$inc) == 'fa fa-skype' ? 'selected' : '' : $links->name_of_link == 'fa fa-skype' ? 'selected' : '' ?>>Other</option>
                                      <option value="fa fa-connectdevelop,connectdevelop" <?=set_value('link'.$inc) ? set_value('link'.$inc) == 'fa fa-connectdevelop' ? 'selected' : '' : $links->name_of_link == 'fa fa-connectdevelop' ? 'selected' : '' ?>>Other</option>
                                    </select>
                                </div>
                                <div class="col-lg-1">
                                  <a id="del<?=$inc?>" data-original-title="Remove" data-content="Delete Row Now?" data-placement="left" data-trigger="hover" class="btn btn-danger btn-lg btn-block popovers profclasLinks aj_data_del" idtag="<?=$links->links_id?>"><span class="fa fa-trash-o"></span></a>
                                </div>
                            </div>
                          <?$inc++;?>
                          <?endforeach;?>
                        <?else:?>
                        <div class="form-group " >
                            <label for="links1" class="control-label col-lg-2">1.</label>
                            <div class="col-lg-7">
                              <input class="form-control profclasLinks" id="links" name="linkicon[]['link']" type="text" value="<?=set_value('link1')?>" />
                            </div>
                            <div class="col-lg-3">
                            <select class="selectpicker form-control profclasLinks" name="linkicon[]['name']" data-live-search="true">
                                <option value=""> -- Choose Link Name -- </option>
                                <option value="fa fa-facebook,facebook">Facebook</option>
                                <option value="fa fa-linkedin,linkedin">LinkedIn</option>
                                <option value="fa fa-stack-overflow,overflow">Stack-Overflow</option>
                                <option value="fa fa-github,github">Github</option>
                                <option value="fa fa-instagram,instagram">Instagram</option>
                                <option value="fa fa-twitter,twitter">Twitter</option>
                                <option value="fa fa-youtube,youtube">Youtube</option>
                                <option value="fa fa-google,google">Gmail</option>
                                <option value="fa fa-yahoo,yahoo">Yahoo</option>
                                <option value="fa fa-skype,skype">Skype</option>
                                <option value="fa fa-connectdevelop,connectdevelop">Other</option>
                              </select>
                            </div>
                        </div>
                        <?endif;?>

                        <div id="inputcreatelinks">
                        </div>
                        <div class="form-group"></div>
                        <div class="form-group">
                              <div class="col-lg-offset-2 col-lg-2">
                                  <input type="submit" class="form-control btn btn-primary editsecondLinks" value="Save Changes">
                                  <button class="form-control btn btn-primary editfirstLinks" type="button">Edit</button>
                              </div>
                              <div class="col-lg-2">
                                <a class="form-control btn btn-default addthirdLinks"   id="addlinks" >Add Input</a>
                              </div>
                              <div class="col-lg-2">
                                <button class="form-control btn btn-default editsecondLinks editsecondcanLinks" type="button">Cancel</button>
                              </div>
                        </div>
                    </form>
                  </div>
                </div>
            </section>
        </div>
    </div>
