    <!-- javascripts -->
    <script src="<?=site_url('assets/admin/js/jquery.js')?>"></script>

    <!-- bootstrap -->
    <script src="<?=site_url('assets/admin/js/bootstrap.min.js')?>"></script>

    <!-- nice scroll -->
    <script src="<?=site_url('assets/admin/js/jquery.scrollTo.min.js')?>"></script>
    <script src="<?=site_url('assets/admin/js/jquery.nicescroll.js')?>" type="text/javascript"></script>

    <!-- moment for date picker -->
    <script src="<?=site_url('assets/admin/js/moment.js')?>"></script>

    <!-- jquery ui -->
    <script src="<?=site_url('assets/admin/js/jquery-ui-1.9.2.custom.min.js')?>"></script>

    <!-- date picker -->
    <script src="<?=site_url('assets/admin/js/bootstrap-datetimepicker.min.js')?>"></script>

    <!--custom checkbox & radio-->
    <script type="text/javascript" src="<?=site_url('assets/admin/js/ga.js')?>"></script>

    <!--custom switch-->
    <script src="<?=site_url('assets/admin/js/bootstrap-switch.js')?>"></script> 

    <!--custom tagsinput-->
    <script src="<?=site_url('assets/admin/js/jquery.tagsinput.js')?>"></script>

    <!-- colorpicker -->

    <!-- bootstrap-wysiwyg -->
    <script src="<?=site_url('assets/admin/js/jquery.hotkeys.js')?>"></script>
    <script src="<?=site_url('assets/admin/js/bootstrap-wysiwyg.js')?>"></script>
    <script src="<?=site_url('assets/admin/js/bootstrap-wysiwyg-custom.js')?>"></script>

    <!-- live select -->
    <script src="<?=site_url('assets/admin/js/select_js/bootstrap-select.js')?>"></script>
    
    <!-- ck editor -->
    <script type="text/javascript" src="<?=site_url('assets/admin/otherassets/ckeditor/ckeditor.js')?>"></script>

    <!-- custom form component script for this page-->
    <script src="<?=site_url('assets/admin/js/form-component.js')?>"></script>

    <!-- jquery validate js -->
    <script type="text/javascript" src="<?=site_url('assets/admin/js/jquery.validate.min.js') ?>"></script>

    <!-- custom form validation script for this page-->
    <script src="<?=site_url('assets/admin/js/form-validation-script.js') ?>"></script>

    <!--custome script for all page-->
    <script src="<?=site_url('assets/admin/js/scripts.js')?>"></script>


    <script type="text/javascript">

        var vid = document.getElementById("myVideo");
        function enableAutoplay() { 
            vid.autoplay = true;
            vid.defaultMuted = true;
            vid.loop = true;
            vid.load();
        }

        function add(){
            //Create an input type dynamically.   
            var element = document.createElement("input");
            
            element.type = 'text';
            element.value = ''; 
            element.name = 'BtnName'; 
            element.className = 'form-control';
            var foo = document.getElementById("inputcreate");
                foo.appendChild(element);
        }

       $(function() 
       {
            $('.currentrate').show();
            $('.editrate').hide();
            $('#returnbars').hide();
            $("#editbars").on('click', function() {
                $('.currentrate').hide();
                $('.editrate').show();
                $('#returnbars').show();
                $('#editbars').hide();
            });   
            $("#returnbars").on('click', function() {
                $('.currentrate').show();
                $('.editrate').hide();
                $('#returnbars').hide();
                $('#editbars').show();
            }); 
            $('#modit').on('click',function(){
                $('.serv').removeAttr('disabled');
            });
            $('#sav').on('click',function(){
                $('.rem_srv').attr('disabled',true);
            });


            if (typeof jQuery.fn.live == 'undefined' || !(jQuery.isFunction(jQuery.fn.live))) {
              jQuery.fn.extend({
                  live: function (event, callback) {
                     if (this.selector) {
                          jQuery(document).on(event, this.selector, callback);
                      }
                  }
              });
            }
            
            var scntDiv = $('#inputcreate');
            var i = $('#inputcreate div').size() + 2;
            var num =  1;
            $('#addit').live('click', function() {
                    $('<div class="form-group okiy"><label for="service'+i+'" class="control-label col-lg-2"> new ' + num + '</label><div class="col-lg-8"><input id="service'+i+'" type="text" name="service' + num +'" class="form-control"></div> <div class="col-lg-1"><a id="remScnts" data-original-title="Remove" data-content="Delete Row Now?" data-placement="left" data-trigger="hover" class="btn btn-danger btn-lg btn-block popovers remScnts" ><span class="fa fa-trash-o"></span></a> </div> </div>').appendTo(scntDiv);
                    // alert(i);
                    i++;
                    num++;
                    $('#sav').removeAttr('disabled');
                    return false;
            });

            $('#remScnts').live('click', function() { 
                    if( i > 1 ) {
                        $(this).parents('div .okiy').remove();
                            // alert(i);
                        i--;
                    }
                    return false;
              });

            //update ajax service
            $('.serv_update').on('change', function(){
                var val_int = $(this).val();
                var val_id = $(this).attr('idtag');
                $.ajax({
                     type: "POST",
                     url:  base_url + "Admin_about/update_my_services/",
                     dataType: 'json', // what to expect back from the server
                     data: {'val_serv' : val_int, 'id' : val_id}, //assign the var here 
                     cache: false,
                     success: function(msg){
                        if (msg['status']) {
                            $('.msg_srv').html("<p id='succc'>Successfully <em>Change</em>.</p></br>");
                        } else{
                            $('.msg_srv').html("<p id='errr'>Failed to <em>Update</em>.</p></br>");
                        }
                        setTimeout(function(){
                             $('#succc').hide();
                             $('#errr').hide();
                        },6000);
                     }, error: function (msg) {
                            $('.msg_srv').html("<p id='errr'>Failed to <em>Update</em>.</p>");
                            setTimeout(function(){
                                 $('#succc').hide();
                                 $('#errr').hide();
                            },6000);
                       }
                });

            });

            // delete ajax service
            $('.serv_del').on('click', function(){
                var val_id = $(this).attr('idtag');
                // var val_div = $(this).attr('id');
                $.ajax({
                     type: "POST",
                     url:  base_url + "Admin_about/delete_my_service/",
                     dataType: 'json', // what to expect back from the server
                     data: {'id' : val_id}, //assign the var here 
                     // cache: false,
                     success: function(msg){
                            // console.log(msg);
                        if (msg['status']) {
                            $('#del'+val_id).closest('.fg_hide').hide();
                            $('.msg_srv').html("<p id='succc'>Successfully <em>Change</em>.</p></br>");
                        } else{
                            $('.msg_srv').html("<p id='errr'>Failed to <em>Update</em>.</p></br>");
                        }
                        setTimeout(function(){
                             $('#succc').hide();
                             $('#errr').hide();
                        },6000);
                     }, error: function (msg) {
                        //Ajax call failed, so we inform the user something went wrong
                        $( '.msg_srv' ).html( "<p id='errr'>Server unavailable now: please, <em>retry later</em>.</p>" ).fadeIn( 'slow' ).delay( 3000 ).fadeOut( 'slow' );
                        setTimeout(function(){
                             $('#succc').hide();
                             $('#errr').hide();
                        },6000);
                     }
                });

            });

            //update video description
            $('textarea#vid_desc').on('blur', function(){
                var val_int = $(this).val();
                $.ajax({
                     type: "POST",
                     url:  base_url + "Admin_about/update_video_description/",
                     dataType: 'json', // what to expect back from the server
                     data: {'vid_des' : val_int}, //assign the var here 
                     cache: false,
                     success: function(msg){
                        if (msg['status']) {
                            $('.msg_vd').html("<p id='succc'>Successfully <em>Change</em>.</p></br>");
                        } else{
                            $('.msg_vd').html("<p id='errr'>Failed to <em>Update</em>.</p></br>");
                        }
                        setTimeout(function(){
                             $('#succc').hide();
                             $('#errr').hide();
                        },6000);
                     }, error: function (msg) {
                            $('.msg_vd').html("<p id='errr'>Failed to <em>Update</em>.</p>");
                            setTimeout(function(){
                                 $('#succc').hide();
                                 $('#errr').hide();
                            },6000);
                       }
                });

            });

        });
    </script>

    <?if ($this->input->post()) {?>
        <script type="text/javascript">
              $('.serv').removeAttr('disabled');
        </script>
    <?} else {?>
      <script type="text/javascript">
              $('.serv').attr('disabled',true);
      </script>
    <?}?>