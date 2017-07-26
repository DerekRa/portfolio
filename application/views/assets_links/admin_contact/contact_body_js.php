		<!-- javascripts -->
    <script src="<?=site_url('assets/admin/js/jquery.js')?>"></script>
		<script src="<?=site_url('assets/admin/js/jquery-ui-1.10.4.min.js')?>"></script>
    <script src="<?=site_url('assets/admin/js/jquery-1.8.3.min.js')?>"></script>
    <script type="text/javascript" src="<?=site_url('assets/admin/js/jquery-ui-1.9.2.custom.min.js')?>"></script>

    <!-- bootstrap -->
    <script src="<?=site_url('assets/admin/js/bootstrap.min.js')?>"></script>

    <!-- nice scroll -->
    <script src="<?=site_url('assets/admin/js/jquery.scrollTo.min.js')?>"></script>
    <script src="<?=site_url('assets/admin/js/jquery.nicescroll.js')?>" type="text/javascript"></script>

    <!-- charts scripts -->
    <script src="<?=site_url('assets/admin/otherassets/jquery-knob/js/jquery.knob.js')?>"></script>
    <script src="<?=site_url('assets/admin/js/jquery.sparkline.js')?>" type="text/javascript"></script>
    <script src="<?=site_url('assets/admin/otherassets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')?>"></script>
    <script src="<?=site_url('assets/admin/js/owl.carousel.js')?>" ></script>

    <!-- jQuery full calendar -->
    <script src="<?=site_url('assets/admin/js/fullcalendar.min.js')?>"></script> 

    <!-- Full Google Calendar - Calendar -->
		<script src="<?=site_url('assets/admin/otherassets/fullcalendar/fullcalendar/fullcalendar.js')?>"></script>
   
    <!--script for this page only-->
    <script src="<?=site_url('assets/admin/js/calendar-custom.js')?>"></script>
		<script src="<?=site_url('assets/admin/js/jquery.rateit.min.js')?>"></script>

    <!-- custom select -->
    <script src="<?=site_url('assets/admin/js/jquery.customSelect.min.js')?>" ></script>
		<script src="<?=site_url('assets/otherassets/chart-master/Chart.js')?>"></script>
   
    <!--custome script for all page-->
    <script src="<?=site_url('assets/admin/js/scripts.js')?>"></script>

    <!-- custom script for this page-->
	  <script src="<?=site_url('assets/admin/js/sparkline-chart.js')?>"></script>
	  <script src="<?=site_url('assets/admin/js/easy-pie-chart.js')?>"></script>
		<script src="<?=site_url('assets/admin/js/jquery-jvectormap-1.2.2.min.js')?>"></script>
		<script src="<?=site_url('assets/admin/js/jquery-jvectormap-world-mill-en.js')?>"></script>
		<script src="<?=site_url('assets/admin/js/xcharts.min.js')?>"></script>
		<script src="<?=site_url('assets/admin/js/jquery.autosize.min.js')?>"></script>
		<script src="<?=site_url('assets/admin/js/jquery.placeholder.min.js')?>"></script>
		<script src="<?=site_url('assets/admin/js/gdp-data.js')?>"></script>	
		<script src="<?=site_url('assets/admin/js/morris.min.js')?>"></script>
		<script src="<?=site_url('assets/admin/js/sparklines.js')?>"></script>	
		<script src="<?=site_url('assets/admin/js/charts.js')?>"></script>
		<script src="<?=site_url('assets/admin/js/jquery.slimscroll.min.js')?>"></script>

    <!--custom tagsinput-->
  	<script src="<?=site_url('assets/admin/js/jquery.tagsinput.js')?>"></script>

	  <!-- bootstrap-wysiwyg -->
	  <script src="<?=site_url('assets/admin/js/jquery.hotkeys.js')?>"></script>
	  <script src="<?=site_url('assets/admin/js/bootstrap-wysiwyg.js')?>"></script>
	  <script src="<?=site_url('assets/admin/js/bootstrap-wysiwyg-custom.js')?>"></script>
    
    <!-- ck editor -->
 	 <script type="text/javascript" src="<?=site_url('assets/admin/otherassets/ckeditor/ckeditor.js')?>"></script>

    <!-- custom form component script for this page-->
  	<script src="<?=site_url('assets/admin/js/form-component.js')?>"></script>
  
  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#tagsinput").bind("change paste keyup", function() {
             alert('ok'); 
          });
                  
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
	  
	  /* ---------- Map ---------- */
	$(function(){
	  $('#map').vectorMap({
	    map: 'world_mill_en',
	    series: {
	      regions: [{
	        values: gdpData,
	        scale: ['#000', '#000'],
	        normalizeFunction: 'polynomial'
	      }]
	    },
		backgroundColor: '#eef3f7',
	    onLabelShow: function(e, el, code){
	      el.html(el.html()+' (GDP - '+gdpData[code]+')');
	    }
	  });
	});

  </script>

