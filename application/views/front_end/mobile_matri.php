<?php
	$mobile_matri_bannner = $this->common_model->get_count_data_manual('mobile_matri_bannner',array('status'=>'APPROVED'),2,'banner','id desc');
?>

<!-- ========== <div class="container"> Start========== -->
	<div class="container margin-top-10 padding-lr-zero-xs">
		<div class="xxl-16 xl-16 m-16 l-16 xs-16 s-16 margin-top-10 padding-0-5-xs">
			<div class="">      
				<div class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 margin-top-10px bg-border padding-0-5-xs" style="padding:4px;background:#063467;box-shadow: 0 2px 11px 0 rgba(0,0,0,.18), 0 0px 15px 0 rgba(0,0,0,.15)">
					<div class="xxl-6 xl-6 l-6 m-16 s-16 xs-16 font-size-14 margin-top-20px">	
						<div class="row">
							<div id="slider" class="margin-top-10-xs">
							<?php 
								if(isset($mobile_matri_bannner) && $mobile_matri_bannner !='' && is_array($mobile_matri_bannner) && count($mobile_matri_bannner) > 0)
								{
									$path_mobile_matri_banner = $this->common_model->path_mobile_matri_banner;
									foreach($mobile_matri_bannner as $mobile_matri_bannner_val)
									{
										if(isset($mobile_matri_bannner_val['banner']) && $mobile_matri_bannner_val['banner'] !='' && file_exists($path_mobile_matri_banner.$mobile_matri_bannner_val['banner']))
										{
											$banner_url = $base_url.$path_mobile_matri_banner.$mobile_matri_bannner_val['banner'];
							?>
											<div class="item">
												<div class="row-center"><img style="max-width:230px;" src="<?php echo $base_url.$path_mobile_matri_banner.$mobile_matri_bannner_val['banner']; ?>" class="img-responsive" alt=""></div>
											</div>
								<?php	}
									}
								}else{ ?> 
									<div class="item">
										<div class="row-center"><img src="<?php echo $base_url; ?>assets/front_end/images/app-screen1.png" class="img-responsive" alt=""></div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="xxl-10 xl-10 l-10 m-16 s-16 xs-16 font-size-14 margin-top-20px">	
						<div class="row">
							<h1 class="text-white text-shadow-black text-center">Download App for lots of choices</h1>
							<h3 class="text-white text-shadow-black text-center">Get Matrimony Apps on Mobile!</h3>
						</div>
						<div class="xxl-12 xl-12 l-16 m-16 s-16 xs-16 xxl-margin-left-2 xl-margin-left-2 margin-top-20px margin-bottom-10-xs" style="background:#FFF;border-radius:2px;box-shadow:6px 6px 0 0 #777;">
							<h4 class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 text-center font-15 bold text-darkgrey">Get a link to download the Mobile app</h4>
							<h5 class="text-grey text-center bold font-13"><em>Search Smarter, Match Faster</em></h5>
							<div class="clearfix"></div>
							<hr class="colorgraph">
							
							<form  method="post" name="mobile_app_sms_form" id="mobile_app_sms_form" enctype="multipart/form-data">
                            <?php
									if($this->session->flashdata('user_log_err'))
									{
								?>
								<div class="alert alert-danger"><?php
									echo $this->session->flashdata('user_log_err'); ?>
								</div>
								<?php
									}
								?>
								<div class="alert alert-danger" id="login_message" style="display:none"></div>
                                <div class="alert alert-success" id="send_sms_success" style="display:none"></div>
								<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-10px margin-bottom-20px padding-0-5-xs">
									<div class="row margin-left-10">
										<div class="xxl-6 xl-6 l-6 xs-16 s-16 m-16" style="padding:0 5px;">
											<div class="">
                                           <select class="chosen-select form-control" name="country_code" id="country_code" required>
											<option value="">Select Country Code</option>
                                        	<?php echo $this->common_model->country_code_opt('+91');?>
                                        	</select>
											</div>
										</div>
										<div class="xxl-6 xl-6 l-6 xs-16 s-16 m-16" style="padding:0 5px;">
											<div class="">
												<input type="text" name="mobile_number" id="mobile_number" minlength="7" maxlength="15" class="form-control xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-10-xs" placeholder="Mobile Number" required />
											</div>
										</div>
									</div>
                                    <div class="row margin-left-10 margin-top-10">
											 <div class="xxl-5 xl-5 l-5 xs-16 s-16 m-16" style="padding:0 5px;">
											<div class="" >
                                            <img src="<?php echo $base_url; ?>captcha.php?captch_code_front=yes&captch_code=<?php echo $this->session->userdata['captcha_code']; ?>" alt=""/>
                                            </div>
                                           </div>
                                           <div class="xxl-7 xl-7 l-7 xs-16 s-16 m-16" style="padding:0 5px;">
											<div class="">
                                               <input required type="text" name="code_captcha" id="code_captcha" class="form-control xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-10-xs"  style="float:right;" placeholder="Enter Captcha Code" value=""/><!-- == min="0" == -->
                                            </div>
                                           </div>
                                      </div>
                                      <div class="row margin-left-10 margin-top-10">
										<div class="xxl-4 xl-4 l-4 xs-16 s-16 m-16 margin-top-10-xs" style="padding:0 5px;">
											<div class="">
                                           <!-- <input type="button" name="get_it_now" value="Get it Now" class="btn btn-sm btn-success font-14" onclick="getmobileappmsg(this.value);"/>-->
                                      <input type="submit" class="btn btn-sm btn-success font-14" value="Get it Now" >
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" class="hash_tocken_id" />
                                        <input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />
                                        <input type="hidden" name="is_post" id="is_post" value="1" />
										   </div>
									</div>
									<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-10px margin-bottom-10px">
										<div class="row-center"><img src="<?php echo $base_url; ?>assets/front_end/images//icon/or-icon.png" class="img-responsive" alt="" /></div>
									</div>
									<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-0px margin-bottom-10 padding-0-5-xs">
										<div class="xxl-8 xl-8 l-8 xs-8 s-8 m-8 padding-0-5-xs">
											<div class="">
												<div class="row-center"><a href="<?php if(isset($config_data['android_app_link']) && $config_data['android_app_link'] !='') {echo $config_data['android_app_link'];} ?>" target="_blank"><img src="<?php echo $base_url; ?>assets/front_end/images//google-play-icon.png" class="img-responsive" alt="" title="Google Play" /></a></div>
											</div>
										</div>
										<div class="xxl-8 xl-8 l-8 xs-8 s-8 m-8 padding-0-5-xs">
											<div class="">
												<div class="row-center"><a href="<?php if(isset($config_data['ios_app_link']) && $config_data['ios_app_link'] !='') {echo $config_data['ios_app_link'];} ?>" target="_blank"><img src="<?php echo $base_url; ?>assets/front_end/images//iphone-icon.png" class="img-responsive" alt="" title="Apps Store" /></a></div>
											</div>
										</div>
								   </div>
								</div>
                                </div>
							</form>
					</div>
				</div>
				<div class="clearfix"></div>
				
				<!--<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-15px margin-bottom-10px">
					<div class="row">
						<div class="xxl-3 xl-2 l-4 xs-16 s-16 m-4 pull-right">
							<div class="row">
								<a href="#" class="btn-block font-12 exp-sent-btn">
									Reminder me later <i class="fa fa-chevron-right margin-left-2"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
-->			</div>
		</div>
	</div>
	</div>
    <div id="lightbox-panel-mask"></div>
<div id="lightbox-panel-loader" style="text-align:center">
	<img alt="Please wait.." title="Please wait.." src="<?php echo $base_url; ?>assets/front_end/images/loading.gif" />
</div>
<?php
$this->common_model->user_ip_block();
if(base_url()!='http://192.168.1.111/mega_matrimony/original_script/'){
	$uri_segment_check_red = $this->uri->segment(1);
	if(isset($uri_segment_check_red) && $uri_segment_check_red!=''){
		$uri_segment_check_red = $this->uri->segment(1);
	}
	else{
		$uri_segment_check_red = basename($_SERVER['PHP_SELF']);
	}
	if(isset($uri_segment_check_red) && $uri_segment_check_red!='' && $uri_segment_check_red!="blocked"){
		$details = $this->common_model->add_user_analysis();
	}
}
?>
<!-- ========== <div class="container"> End========== -->
	<div class="clearfix"></div>
	<script src="<?php echo $base_url; ?>assets/front_end/js/jquery.min.js?ver=1.0"></script>
	<script src="<?php echo $base_url; ?>assets/front_end/js/bootstrap.min.js?ver=1.0"></script>
	<script src="<?php echo $base_url; ?>assets/front_end/js/owl.carousel.min.js?ver=1.0"></script>
	<script src="<?php echo $base_url; ?>assets/front_end/js/slider.js?ver=1.0"></script>
	<script src="<?php echo $base_url; ?>assets/front_end/js/jquery.sticky.js?ver=1.0"></script>
	<script src="<?php echo $base_url; ?>assets/front_end/js/select2.min.js?ver=1.0"></script>
	<script>
		$( document ).ready(function() {
			$('select').select2();
		});
	
    	if($("#mobile_app_sms_form").length > 0)
		{
			$("#mobile_app_sms_form").validate({
				rules: {
					mobile_number: {
					  required: true,
					  number: true
					},
					code_captcha: {
					  required: true,
					  number: true
					}
				 },	
				submitHandler: function(form)
				{
					//return true;
					check_validation();
				}
			});
		}
		function check_validation()
		{
			//debugger;
			var mobile_number = $("#mobile_number").val();
			var country_code = $("#country_code").val();
			var code_captcha = $("#code_captcha").val();
			show_comm_mask();
			var hash_tocken_id = $("#hash_tocken_id").val();
			var base_url = $("#base_url").val();
			var url = base_url+"mobile-matri/send-app-sms";
			$("#send_sms_success").hide();
			$("#login_message").hide();
			$.ajax({
			   url: url,
			   type: "post",
			   data: {'country_code':country_code,'mobile_number':mobile_number,'<?php echo $this->security->get_csrf_token_name(); ?>':hash_tocken_id,'is_post':0,'code_captcha':code_captcha},
			   dataType:"json",
			   success:function(data)
			   {
					if(data.status == 'success')
					{
						$("#send_sms_success").html(data.errmessage);
						$("#send_sms_success").slideDown();
						setTimeout(function() {
								$('#send_sms_success').fadeOut('fast');
							}, 13000);
						document.getElementById("mobile_app_sms_form").reset();
					}
					else
					{
						$("#login_message").html(data.errmessage);
						$("#login_message").slideDown();
						
					}
					$("#hash_tocken_id").val(data.token);
					hide_comm_mask();
			   }
			});
			return false;
		}
				
		
	jQuery.extend(jQuery.validator.messages, {
		maxlength: jQuery.validator.format("Please enter at least {0} numeric value."),
		minlength: jQuery.validator.format("Please enter at least {0} numeric value."),
	});
	
    </script>
</body>
</html>