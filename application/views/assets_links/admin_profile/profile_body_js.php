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
        // $(document).ready(function (){
            // get image on input
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    
                    reader.onload = function (e) {
                        $('#profpic').attr('src', e.target.result);
                    }
                    
                    reader.readAsDataURL(input.files[0]);
                }
            }
            // preview change image
            $("#imgInp").change(function(){
                readURL(this);
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
            // upload public image ajax
            // $('#upload_pub').on('submit', function (e) {
            //     e.preventDefault();
            //     // var form_data = ;
            //     // form_data.append("files[]", document.getElementById('profpic').files);

            //     // var form_data = $('#profpic input').map(function(){
            //     //          return $(this).val();
            //     //      }).get().join();
            //     // var form_data  = $('#profpic input').val();
            //     // var form_data = document.getElementById('profpic').files.length;
            //     $.ajax({ 
            //         type: 'POST',
            //         url: base_url + 'Admin_profile/upload_pub_picture', // point to server-side controller method
            //         // dataType: 'text', // what to expect back from the server
            //         cache: false,
            //         contentType: false,
            //         processData: false,
            //         data: new FormData(this),
            //         success: function (data) {
            //             console.log(data);
            //             // $('#msg').show();
            //             // $('#msg').html(response); // display success response from the server
            //             // setTimeout(function(){
            //             //      $('#msg').hide();
            //                                     // },3000);
            //         },
            //         error: function (data) {
            //             console.log('error'+data);
            //             // $('#msg').show();
            //             // $('#msg').html(response); // display error response from the server
            //             // setTimeout(function(){
            //             //      $('#msg').hide();
            //             //                         },3000);
            //         }
            //     });
            // });
        // });
    </script>

    <script type="text/javascript">

            var scntDiv = $('#inputcreatelinks');
            var i = existed_links;
            var num = 1;
            // create add input for social link accounts
            $('#addlinks').live('click', function() {
                    var li = "'link'";
                    var na = "'name'";
                    $('<div class="form-group okiy"><label for="links'+i+'" class="control-label col-lg-1">new ' + num + '</label><div class="col-lg-7"><input type="text" id="links'+i+'" name="linkicon'+i+'[]['+li+']" class="form-control profclasLinks" value="<?php echo set_value("links'+i+'")?>"></div> <div class="col-lg-3"> <select class=" form-control profclasLinks" name="linkicon'+i+'[]['+na+']" > <option value=""> -- Choose Link Name --</option><option value="fa fa-facebook,facebook">Facebook</option> <option value="fa fa-linkedin,linkedin">LinkedIn</option> <option value="fa fa-stack-overflow,overflow">Stack-Overflow</option> <option value="fa fa-github,github">Github</option> <option value="fa fa-instagram,instagram">Instagram</option> <option value="fa fa-twitter,twitter">Twitter</option> <option value="fa fa-youtube,youtube">Youtube</option> <option value="fa fa-google,google">Gmail</option> <option value="fa fa-yahoo,yahoo">Yahoo</option> <option value="fa fa-skype,skype">Skype</option> <option value="fa fa-connectdevelop,connectdevelop">Other</option></select></div> <div class="col-lg-1"> <a id="remScnts" data-original-title="Remove" data-content="Delete Row Now?" data-placement="left" data-trigger="hover" class="btn btn-danger btn-lg btn-block popovers remScnts" ><span class="fa fa-trash-o"></span></a> </div> </div>').appendTo(scntDiv);
                    // alert(i);
                    i++;
                    num++;
                    return false;
            });
            // remove newly created link accounts
            $('#remScnts').live('click', function() { 
                    if( i > 1 ) {
                        $(this).parents('div .okiy').remove();
                            // alert(i);
                        i--;
                    }
                    return false;
            });
            // profile edit
            //edit click button
            $('.editfirst').on('click', function(){
                $('.editsecond').show();
                $('.editfirst').hide();
                $('.profclas').removeProp('disabled');
                $('.profclas').selectpicker('refresh');
            });
            //cancel click button
            $('.editsecondcan').on('click', function(){
                $('.editsecond').hide();
                $('.editfirst').show();
                $('.profclas').attr('disabled','disabled');
                $('.profclas').selectpicker('refresh');
            });
            // social skills
            // edit click button social link
            $('.editfirstLinks').on('click', function(){
                $('.editsecondLinks').show();
                $('.remScnts').show();
                $('.editfirstLinks').hide();
                $('.profclasLinks').removeAttr('disabled');
                $('.profclasLinks').show();
                $('.profclasLinks').selectpicker('refresh');
            });
            // cancel click button social link
            $('.editsecondcanLinks').on('click', function(){
                $('.editsecondLinks').hide();
                $('.remScnts').hide();
                $('.editfirstLinks').show();
                $('.profclasLinks').attr('disabled','disabled');
                $('.profclasLinks').show();
                $('.profclasLinks').selectpicker('refresh');
            });
            // save click button social link
            $('.editsecondLinks').first().on('click', function(){
                $('.editfirstLinks').hide();
                $('.editsecondLinks').first().show();
                // $('.remScnts').hide();
                $('.profclasLinks').removeAttr('disabled');
                // $('.profclasLinks').show();
                $('.profclasLinks').selectpicker('refresh');
            });
            // add inputs link social link 
            $('.addthirdLinks').on('click', function(){
                $('.editsecondLinks').show();
                $('.editfirstLinks').hide();
            });
            // profile edit birthday
            $('#datetimepicker').datetimepicker({
              viewMode: 'years',
              format: 'MM/DD/YYYY'
            });

            $("#register_form").bind('ajax:complete', function() {
                $('.editsecond').show();
                $('.editfirst').hide();
                $('.profclas').removeAttr('disabled');
            });
            //insert ajax links
            $('.aj_data').on('blur', function(){
                var val_int = $(this).val();
                var val_id = $(this).attr('idtag');
                $.ajax({
                     type: "POST",
                     url:  base_url + "Admin_profile/update_links_account_address/",
                     dataType: 'json', // what to expect back from the server
                     data: {'val_link' : val_int, 'val_id' : val_id}, //assign the var here 
                     cache: false,
                     success: function(msg){
                        if (msg['status']) {

                            $('.msg_ajx').html("<p id='succc'>Successfully <em>Change</em>.</p></br>");

                        } else{

                            $('.msg_ajx').html("<p id='errr'>Failed to <em>Update</em>.</p></br>");
                            
                        }
                        console.log(msg['status']);
                        setTimeout(function(){
                                 $('#succc').hide();
                                 $('#errr').hide();
                            },6000);
                     },
                    error: function (msg)
                    {
                            $('.msg_ajx').html("<p id='errr'>Failed to <em>Update</em>.</p>");
                        console.log(msg);

                        //Ajax call failed, so we inform the user something went wrong
                        // $( '#msg' ).html( 'Server unavailable now: please, retry later.' ).fadeIn( 'slow' ).delay( 3000 ).fadeOut( 'slow' );
                    }
                });
            });
            // update ajax links
            $('.aj_data_nm').on('change', function(){
                var val_int = $(this).val();
                var val_id = $(this).attr('idtag');
                $.ajax({
                     type: "POST",
                     url:  base_url + "Admin_profile/update_links_account_name/",
                     dataType: 'json', // what to expect back from the server
                     data: {'val_link' : val_int, 'val_id' : val_id}, //assign the var here 
                     cache: false,
                     success: function(msg){
                        if (msg['status']) {

                            $('.msg_ajx').html("<p id='succc'>Successfully <em>Change</em>.</p></br>");

                        } else{

                            $('.msg_ajx').html("<p id='errr'>Failed to <em>Update</em>.</p></br>");
                            
                        }
                        // console.log(msg['status']);
                        setTimeout(function(){
                                 $('#succc').hide();
                                 $('#errr').hide();
                            },6000);
                     },
                    error: function (msg)
                    {
                        // console.log(msg);
                        //Ajax call failed, so we inform the user something went wrong
                        $( '.msg_ajx' ).html( "<p id='errr'>Server unavailable now: please, <em>retry later</em>.</p>" ).fadeIn( 'slow' ).delay( 3000 ).fadeOut( 'slow' );
                    }
                });
            });
            // delete ajax links
            $('.aj_data_del').on('click', function(){
                var val_id = $(this).attr('idtag');
                var val_div = $(this).attr('id');
                // alert(int_id);
                $.ajax({
                     type: "POST",
                     url:  base_url + "Admin_profile/delete_links_account/",
                     dataType: 'json', // what to expect back from the server
                     data: {'val_id' : val_id}, //assign the var here 
                     // cache: false,
                     success: function(msg){
                        if (msg['status']) {
                            $('#'+val_div).closest('.fr_del').hide();
                            // $('.fr_del').load(' .fr_del');
                            $('.msg_ajx').html("<p id='succc'>Successfully <em>Change</em>.</p></br>");

                        } else{

                            $('.msg_ajx').html("<p id='errr'>Failed to <em>Update</em>.</p></br>");
                            
                        }
                        console.log(msg['status']);
                        setTimeout(function(){
                                 $('#succc').hide();
                                 $('#errr').hide();
                            },6000);
                     },
                    error: function (msg)
                    {
                        // console.log(msg);
                        //Ajax call failed, so we inform the user something went wrong
                        $( '.msg_ajx' ).html( "<p id='errr'>Server unavailable now: please, <em>retry later</em>.</p>" ).fadeIn( 'slow' ).delay( 3000 ).fadeOut( 'slow' );
                    }
                });
            });

    </script>


<?if ($this->input->post()) {?>
    <script type="text/javascript">
          $('.editsecond').show();
          $('.editfirst').hide();
          $('.profclas').removeAttr('disabled');
          $('.profclas').selectpicker('refresh');

          //social
          $('.editsecondLinks').show();
          $('.remScnts').show();
          $('.editfirstLinks').hide();
          $('.profclasLinks').removeAttr('disabled');
          $('.profclasLinks').selectpicker('refresh');

    </script>
<?} else {?>
  <script type="text/javascript">
          $('.editsecond').hide();
          // $('.profclas').attr('disabled','disabled')
          $('.profclas').attr('disabled',true);
          // $('.profclas *').prop('disabled', true);

          //social links
          $('.editsecondLinks').hide();

          $('.profclasLinks').attr('disabled','disabled');
  </script>
<?}?>