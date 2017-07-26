    <?$this->load->view('admin_auth_reg/template/head.php')?>
                <div class="col-lg-12">
                      <form class="login-form" action="<?site_url('Admin/Login')?>" method="POST">        
                        <div class="login-wrap">
                            <p class="login-img"><i class="icon_like"></i></p>
                            <div class="input-group">
                                <h3><?=$h_notif?></h3>
                            </div>
                            <div class="input-group">
                                <h4><?=$notif?></h4>
                            </div>
                        </div>
                      </form>
                </div>
    <?$this->load->view('admin_auth_reg/template/foot.php')?>

