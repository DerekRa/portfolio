    <!-- javascripts -->
    <script src="<?=site_url('assets/admin/js/scripts.js')?>"></script>

    <!-- bootstrap -->
    <script src="<?=site_url('assets/admin/js/bootstrap.min.js')?>"></script>

    <!--custom tagsinput-->
    <script src="<?=site_url('assets/admin/js/jquery.tagsinput.js')?>"></script>

    <!-- nice scroll -->
    <script src="<?=site_url('assets/admin/js/jquery.scrollTo.min.js')?>"></script>
    <script src="<?=site_url('assets/admin/js/jquery.nicescroll.js')?>" type="text/javascript"></script>

    <!-- jquery ui -->
    <script src="<?=site_url('assets/admin/js/jquery-ui-1.9.2.custom.min.js')?>"></script>

    <!--custom checkbox & radio-->
    <script type="text/javascript" src="<?=site_url('assets/admin/js/ga.js')?>"></script>

    <!-- bootstrap-wysiwyg -->
    <script src="<?=site_url('assets/admin/js/jquery.hotkeys.js')?>"></script>
    <script src="<?=site_url('assets/admin/js/bootstrap-wysiwyg.js')?>"></script>
    <script src="<?=site_url('assets/admin/js/bootstrap-wysiwyg-custom.js')?>"></script>
    
    <!-- ck editor -->
    <script type="text/javascript" src="<?=site_url('assets/admin/otherassets/ckeditor/ckeditor.js')?>"></script>

    <!-- colorpicker -->
    <!--custom switch-->
    <script src="<?=site_url('assets/admin/js/bootstrap-switch.js')?>"></script> 

    <!-- custom form component script for this page-->
    <script src="<?=site_url('assets/admin/js/form-component.js')?>"></script>

    <!-- jquery validate js -->
    <script type="text/javascript" src="<?=site_url('assets/admin/js/jquery.validate.min.js') ?>"></script>

    <!-- custom form validation script for this page-->
    <script src="<?=site_url('assets/admin/js/form-validation-script.js') ?>"></script>

    <!-- data tables -->
    <script type= 'text/javascript' src="<?=site_url('assets/admin/js/jquery.dataTables.min.js')?>"></script>
 
    <!--custome script for all page-->

    <!-- custom gritter script for this page only-->

    <script type="text/javascript">
        // data tables
        $(document).ready(function () {
            $('#cd-grid').DataTable();
        });
        // transfer data
        $('#get_mod').on('click',function() {
                //get skill val
                $('#desc_mod').hide();
                var sk = $('#skil_mod').val();
                $('#skill_on_mod').text(sk);
                $('#skill_on_mod_int').val(sk);
                // get editor val
                var des = CKEDITOR.instances['editor'].getData();
                // var des = $('#editor').cleanHtml();
                CKEDITOR.instances.desc_mod.setData(des);
                $('#desc_compres').html(des);
        });
        // preview the image
        function preview_images() 
        {
         if($("#multiFiles")[0].files.length > 10){
                            $("#multiFiles").val('');
                            $('.mgs_int').html('<div id="errr">You can select only 10 images</div>');
                  setTimeout(function(){
                     $('.mgs_int').hide();
                                },6000);
         } else {
            
                         var total_file=document.getElementById("multiFiles").files.length;
                         for(var i=0;i<total_file;i++)
                         {
                            $('#prev_img').append( "<p id='image_preview'></p>" );
                          $('#image_preview').append("<div class='col-md-4'><img class='img-responsive' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
                         }
         }
        }
        // clear the image
        function resetAll(){

            $('#image_preview').remove(); // Removing it as with next form submit you will be adding the div again in your code. 
        }
        // upload location area
        $('#upload').on('click', function (e) {
              e.preventDefault();
              var url = base_url + 'Admin_Work/Settings';
              var form_data = new FormData();
              var txtar = CKEDITOR.instances['editor'].getData();
              var sk = $('#skil_mod').val();
              var ins = document.getElementById('multiFiles').files.length;
              for (var x = 0; x < ins; x++) {
                  form_data.append("files[]", document.getElementById('multiFiles').files[x]);
              }
              form_data.append("skills", sk);
              form_data.append("description", txtar);
              $.ajax({ 
                  url: 'http://localhost/Portfolio/Admin_Work/upload_pictures/', // point to server-side controller method
                  dataType: 'json', // what to expect back from the server
                  cache: false,
                  contentType: false,
                  processData: false,
                  data: form_data,
                  type: 'post',
                  success: function (response) {
                    $('#myModal').modal('toggle');
                    if (response['msg_succ'] != '') {
                              CKEDITOR.instances.editor.setData('');
                      $('#msg').append("<div id='succc'>" + response['msg_succ'] + "</div>");
                        // $('#cd-grid').DataTable();
                      $('#projects').load(url + ' #ref_div');
                              $('.tag').remove();
                        $('#image_preview').remove(); 
                        // $('#cd-grid').DataTable().ajax.reload();
                        // $.fn.dataTable.ext.errMode = 'throw';
                        // $('#cd-grid').DataTable();
                    }
                    if (response['msg_err'] != '') {
                      $('#msg').append("<div id='errr'>" + response['msg_err'] + "</div>");
                    }
                    setTimeout(function(){
                       $('#msg').hide();
                                    },12000);
                  },
                  error: function (response) {
                        // console.log(response);
                      $('#msg').append("<div id='errr'>" + response['msg_err'] + "</div>"); // display error response from the server
                      setTimeout(function(){
                         $('#msg').hide();
                                        },12000);
                  }   
              });
          });
    </script>