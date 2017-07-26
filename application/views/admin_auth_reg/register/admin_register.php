    <?$this->load->view('admin_auth_reg/template/head.php')?>
                <div class="col-lg-6">
                      <form class="login-form" action="<?=site_url('Admin/Login')?>" method="POST">        
                        <div class="login-wrap">
                            <p class="login-img"><i class="icon_lock_alt"></i></p>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="icon_profile"></i></span>
                              <input type="text" name="email" class="form-control" placeholder="Username / Email">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="input-group">
                                <?=$image?> 
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon_refresh"></i></span>
                                <input type="text" name="captcha" class="form-control" placeholder="Captcha">
                            </div>
                            <a class="btn btn-link btn-xm btn-block " href="<?=site_url('Admin/ForgotPass')?>">Forgot Password </a>
                            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Login">
                            <!-- <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button> -->
                        </div>
                      </form>
                </div>
                <div class="col-lg-6">
                      <form class="login-form" action="<?=site_url('Admin/Register')?>" method="POST">        
                        <div class="login-wrap">
                            <p class="login-img"><i class="icon_contacts_alt"></i></p>
                            <a class="btn btn-link btn-block btn-block" id="err" href="#"> 
                                <?=$message;?>
                                <?=validation_errors(); ?>
                            </a>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="icon_profile"></i></span>
                              <input type="text" name="email" class="form-control" value="<?=set_value('email')?>" placeholder="Email" autofocus>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                                <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password">
                            </div>
                            <div class="input-group">
                                <img width="300px" height="46px" src="<?=base_url()."captcha/".$captcha_filename?>">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon_refresh"></i></span>
                                <input type="text" name="captcha" class="form-control" placeholder="Captcha">
                            </div>
                            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Register">
                            <!-- <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button> -->
                        </div>
                      </form>
                </div>
    <?$this->load->view('admin_auth_reg/template/foot.php')?>

