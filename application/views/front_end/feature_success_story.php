<!-- ======= <div class="container"> Start======= -->	
	<div class="tp-page-head hidden-xs">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-2 col-md-8">
						<div class="page-header text-center">
							<div class="icon-circle">
								<i class="icon icon-size-60 icon-heart icon-white"></i>
							</div>
							<h1 class="text-shadow-black">Featured Success Stories</h1>
							<p class="text-shadow-black text-white text-center">They say marriages are made in heaven and we at vvsangam are trying to bring together that someone who is made for you. We welcome you all to celebrate with us the Success Stories of the innumerable married couples who have found their dream partner through vvsangam. We wish them the very best for a happy and successful married life.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<div class="container padding-0-xs">
		<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-30px padding-lr-zero-320 margin-top-10px-320px margin-top-10px-480px  ne-mrg-top-10-768 padding-lr-zero-999 padding-lr-zero-1199 padding-0-5-xs">
			<div class="">
					<div class="">
                    	<div class="pull-right"><a href="<?php echo $base_url; ?>success-story/add-story" class="bg-tabs tabs btn"><span style="color:#ffffff !important"><i class="fa fa-pencil-square-o"></i>&nbsp; Post Success Story</span></a></div> <!-- ==== aria-controls="ne-post-success-story" ===== -->
						<div class="xxl-16 xl-16 s-16 m-16 l-16 xs-16 back-img">
							<h2 class="text-center text-white text-shadow">Welcome to <?php if(isset($config_data['website_title'])) {echo $config_data['website_title'];}?>.</h2>
							<!--<h3 class="text-center text-white text-shadow">This is where we celebrate <?php //if(isset($config_data['web_name'])) {echo $config_data['web_name'];}?> Success Stories.</h3>-->
							<h3 class="text-center text-white text-shadow">This is where we celebrate Success Stories.</h3>
						</div>
						<div class="clearfix"></div>
						<hr>
						<div class="clearfix"></div>
                          <!-- ======== for success story list======== -->
                        <div class="" id="main_content_ajax">
                            <?php include_once('feature_success_story_list_ajax.php'); ?>
                        </div>
           	 			<!-- ======== for success story list======== -->   
					</div>
				</div>
              
			</div>

		<div class="clearfix"></div>
			<hr>
			<!--<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero need-help-img hidden-sm hidden-xs text-center">
				<img src="<?php echo $base_url; ?>assets/front_end/images/icon/need-help.gif" class="img-responsive text-center" alt="" style="box-shadow: 0 1px 2px rgba(43,59,93,0.29);border-radius:3px;" />
			<p class="help-text">Need help? Here's one click assistance! <a href="#">Click here</a> <span class="text-grey">and we will get in touch with you right away.</span></p>
			</div>-->
			<div class="clearfix"></div>

		</div>
<!-- ======== <div class="container"> End ======== -->
<div class="clearfix"></div>
<div class="margin-top-30"></div>
<?php
	$this->common_model->js_extra_code_fr.="
	
    load_pagination_code_front_end();"
	;
?>