	<div class="clearfix"></div>
	<div class="container-fluid" style="">
		<div class="container padding-0-xs">
			<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-20px margin-bottom-20px padding-0-xs">
				<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-0-xs">
                    <h1 class="text-center text-darkgrey text-shadow-black text-uppercase font-25-xs" style="font-size:30px;"><span class="text-color-light-red">Upcoming</span> <span class="text-color-default">Events</span></h1>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="clearfix"></div>
    	<!-- ========  for event list========  -->
            	<div class="" id="main_content_ajax">
					<?php include_once('event_list_ajax.php'); ?>
				</div>
           	   <!-- ========  for event list ========  -->   
	<div class="clearfix"></div>
    <div class="margin-top-40"></div>
    <script src="http://maps.googleapis.com/maps/api/js"></script>
<?php
	$this->common_model->js_extra_code_fr.="
    load_pagination_code_front_end();
	";
?>