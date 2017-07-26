    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-book"></i>Contact</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-laptop"></i><a href="<?=site_url('Admin_Dashboard')?>">Dashboard</a></li>
          <li><i class="fa fa-book"></i>Contact</li>                
        </ol>
      </div>
    </div>
    <div class="row"><?=$system_message_information?></div>
    <div class="row">&nbsp;</div>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Contact Information
                </header>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?=site_url('Admin_Contact/Settings')?>">
                        <div class="form-group">
                            <?php echo form_error('contact_number', '<div class="col-sm-12 err" id="errr">', '</div>'); ?>
                            <label class="col-sm-2 control-label">Number *</label>
                            <div class="col-sm-10">
                                <input type="number" step="any" name="contact_number" placeholder="Your Contact Number" class="form-control round-input input-lg int_txt" value="<?=$profile->contact_number?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <a  name="email_address" class="form-control round-input input-lg int_em"> <?=$profile->email_address ?></a>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo form_error('my_schedule', '<div class="col-sm-12 err" id="errr">', '</div>'); ?>
                            <label class="col-sm-2 control-label">Available Schedule *</label>
                            <div class="col-sm-10">
                                <input type="text" name="my_schedule" placeholder="Available Schedule of Contact eg. 9 am - 6 pm Mon - Fri" class="form-control round-input input-lg int_txt" value="<?=$profile->my_schedule?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label"></label>
                            <div class="col-lg-12">
                            		<div class="col-lg-3">
                                  <input type="submit" class="btn btn-info form-control input-lg round-input sub_int"  value="Save">
                                 </div>
                                 <div class="col-lg-3">
		                              <input type="reset" class="form-control btn btn-default input-lg round-input ed_int" value="Edit">
									              </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <style type="text/css">
      .int_em:hover{
        color: lightgray !important;
      }
    </style>
    <script type="text/javascript">
        $('.sub_int').attr('disabled',true);
        $('.int_txt').attr('disabled',true);
        $('.int_em').attr('disabled',true);
        $('.ed_int').on('click', function(){
          $('.sub_int').removeAttr('disabled');
          $('.int_txt').removeAttr('disabled');
          $('.ed_int').val('Clear');
        });
    </script>
        <script type="text/javascript">
         $(function() {
             setTimeout(function(){
                 $('#succ').hide();
                 $('.err').hide();
            },6000);
         });
    </script>
