    <!-- Bootstrap CSS -->    
    <link href="<?site_url('assets/admin/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- bootstrap theme -->
    <link href="<?=site_url('assets/admin/css/bootstrap-theme.css')?>" rel="stylesheet">

    <!--external css-->
    <!-- font icon -->
    <link href="<?=site_url('assets/admin/css/elegant-icons-style.css')?>" rel="stylesheet" />
    <link href="<?=site_url('assets/admin/css/font-awesome.min.css')?>" rel="stylesheet" />    
    <!-- date picker -->
    
    <!-- color picker -->

    <!-- Custom styles -->
    <link href="<?=site_url('assets/admin/css/style.css')?>" rel="stylesheet">
    <link href="<?=site_url('assets/admin/css/style-responsive.css')?>" rel="stylesheet" />

    <!-- Production version - this is for your live website because it has been minified and compressed -->
    <script src="<?=site_url('assets/admin/js/jquery-3.2.1.min.js')?>"></script>

<!-- Bootstrap styles -->

    <script src="<?=site_url('assets/admin/js/jquery.min.js')?>"></script>
    <!-- data tables -->
    <!-- <link type="text/css" rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet"> -->
    <link type="text/css" rel="stylesheet" href="<?=site_url('assets/admin/css/jquery.dataTables.min.css')?>" rel="stylesheet">
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->

    <script type="text/javascript">
            var base_url = "<?php echo base_url();?>";
    </script>

    <style type="text/css">
            .hdckcreator{
              display:none !important;
              visibility: hidden !important;
            }
            .btn-file {
                position: relative;
                overflow: hidden;
            }
            .btn-file input[type=file] {

                position: absolute;
                top: 0;
                right: 0;
                min-width: 100%;
                min-height: 100%;
                font-size: 100px;
                text-align: right;
                filter: alpha(opacity=0);
                opacity: 0;
                outline: none;
                background: white;
                cursor: inherit;
                display: block;
            }
            .modal-body {
                max-height: calc(100vh - 210px);
                max-width: 1000px;
                overflow-y: auto;
            }
            p #desc_mod{
                max-height: calc(100vh - 210px) !important;
                max-width: 400px;
            }
            p #image_preview{
                max-height: calc(100vh - 210px);
                max-width: 400px;
            }
    </style>