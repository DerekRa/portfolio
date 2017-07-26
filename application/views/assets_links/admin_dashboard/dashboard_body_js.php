    <!-- javascripts -->
    <script src="<?=site_url('assets/admin/js/jquery.js')?>"></script>

    <!-- bootstrap -->
    <script src="<?=site_url('assets/admin/js/bootstrap.min.js')?>"></script>

    <!-- nice scroll -->
    <script src="<?=site_url('assets/admin/js/jquery.scrollTo.min.js')?>"></script>
    <script src="<?=site_url('assets/admin/js/jquery.nicescroll.js')?>" type="text/javascript"></script>

    <!-- jquery ui -->
    <script src="<?=site_url('assets/admin/js/jquery-ui-1.9.2.custom.min.js')?>"></script>

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
    <!-- custom script for this page-->
    <script src="<?=site_url('assets/admin/js/sparklines.js') ?>"></script>
    <script src="<?=site_url('assets/admin/js/charts.js') ?>"></script>

    <script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
      };
    </script>