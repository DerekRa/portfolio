    <?$this->load->view('admin_auth_reg/template/head.php')?>
                <div class="col-lg-12">
                      <form class="login-form" action="<?=site_url('Admin/Link/Recover_Password/'.__link($id))?>" method="POST">        
                        <div class="login-wrap">
                            <p class="login-img"><i class="icon_heart_alt"></i></p>
                            <div class="input-group">
                                <h3><?=$h_notif?></h3>
                                <h4><?=$notif?></h4>
                                <?=validation_errors(); ?>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="New Password">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                                <input type="password" name="cpassword" class="form-control" placeholder="Confirm New Password">
                            </div>
                            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
                            <a class="btn btn-link btn-xm btn-block " href="<?=site_url('Admin/Login')?>">Login</a>
                        </div>
                      </form>
                </div>
    <?$this->load->view('admin_auth_reg/template/foot.php')?>