    <?$this->load->view('admin_auth_reg/template/head.php')?>
                <div class="col-lg-12">
                      <form class="login-form" action="<?=site_url('Admin/Login')?>" method="POST">        
                        <div class="login-wrap">
                            <p class="login-img"><i class="icon_lock_alt"></i></p>
                            <a class="btn btn-link btn-block btn-block" id="err" href="#"> 
                                <?=$message_error;?>
                                <?=validation_errors(); ?>
                            </a>
                            <a class="btn btn-link btn-block btn-block" id="succ" href="<?=site_url('Admin/ForgotPass')?>"> 
                                <?=$message_success;?>
                            </a>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="icon_profile"></i></span>
                              <input type="email" name="email" class="form-control" placeholder="Username / Email" autofocus>
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
                            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Login">
                            <a class="btn btn-link btn-xm btn-block " href="<?=site_url('Admin/ForgotPass')?>">Forgot Password </a>
                            <a class="btn btn-link btn-xm btn-block " href="<?=site_url('Admin/Register')?>">Register </a>
                        </div>
                      </form>
                </div>
    <?$this->load->view('admin_auth_reg/template/foot.php')?>

