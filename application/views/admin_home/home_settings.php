    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-home"></i> Home</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-laptop"></i><a href="<?=site_url('Admin_Dashboard')?>">Dashboard</a></li>
          <li><i class="fa fa-home"></i>Home</li>                
        </ol>
      </div>
    </div>
    <!-- Bootsrep Editor -->
    <div class="row">
      <div class="col-lg-12">
        <?=$system_message_information?>
        <?=form_error('self_introduction', '<div id="error">', '</div>'); ?>
      </div>
    </div>
    <div class="row">&nbsp;</div>
    <div class="row">
      <div class="col-lg-12">
            <section class="panel">
                  <header class="panel-heading">
                      Self Introduce
                  </header>
                  <form class="form-validate form-horizontal" action="" method="post">
                    <div class="panel-body"> 
                        <textarea class="form-control ckeditor" name="self_introduction" rows="6"><?=$self_intro != '' ? $self_intro : set_value('self_introduction')?></textarea>
                        <br>
                        <div class="col-lg-3 pull-right ">
                          <input class="form-control btn btn-primary" type="submit" value="Save It">
                        </div>
                    </div>
                  </form>
            </section>
        </div>
      </div>
