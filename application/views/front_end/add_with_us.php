<?php $this->common_model->extra_js_fr[] = 'js/additional-methods.min.js'; ?>
<!-- ======= <div class="container"> Strat======= -->	
<style>
.inner-addon {
  position: relative;
}

/* style glyph */
.inner-addon .glyphicon {
  position: absolute;
  padding: 9px 13px;
  pointer-events: none;
  color:#555;
  background-color: #eee;
  border: 1px solid #ccc;
  border-radius: 4px;
  border-right: 0;
}

/* align glyph */
.left-addon .glyphicon  { left:  0px; top: 0px;}
.right-addon .glyphicon { right: 0px;}
</style>
	<div class="">
			<div class="container margin-top-20 padding-lr-zero-xs">
				<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-20 xxl-padding-lr-zero">
					<div class="xxl-12 xl-1 l-12 m-16 s-16 xs-16 xxl-padding-lr-zero">
						<div class="row">
							<div class="bg-border border-top padding-top-0 padding-bottom-0 padding-lr-zero" style="overflow:hidden;">
								<div class="xxl-16 xl-16 s-16 m-16 l-16 xs-16 padding-bottom-10 padding-top-10 bg-advert">
									<h2 class="text-center text-white text-shadow"><i class="fa fa-feed fa-lg"></i> Advertise With us</h2>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="xxl-16 xl-16 s-16 m-16 xs-16 l-16 bg-border border-top" style="overflow:hidden;" id="advertisement_form_div">
								<p class="small text-right"><span class="red-only">*</span> All fields are mandatory</p>
                                      <div class="alert alert-success" id="email_success_message" style="display:none"></div>
                      					<div class="alert alert-danger" id="email_error_message" style="display:none"></div>
								<div class="xxl-16 xl-16 s-16 m-16 xs-16 l-16 margin-top-30 margin-bottom-30 padding-lr-zero-xs margin-top-0-xs" style="">
									<form class="margin-top-5" method="post" id="advertisement_form" name="advertisement_form">		
										<div class="form-group xxl-16 xl-16 s-16 m-16 xs-16 l-16 padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-xs">
											<label class="xxl-4 xl-6 m-16 l-6 s-16 xs-16 margin-top-5px">
												Advertise Name <span class="font-red">* </span>:
											</label>
											<div class="xxl-12 xl-10 s-16 xs-16 m-16 l-10">
                                                 <div class="inner-addon left-addon">
                                                    <i class="glyphicon fa fa-feed" style=""></i>
                                                    <input type="text" id="addname" name="addname"  style="padding-left:45px;" class="form-control input-md" placeholder="Enter Advertisement Name" required>
                                                </div>
											</div>
										</div>
										<div class="form-group xxl-16 xl-16 s-16 m-16 xs-16 l-16 padding-lr-zero-320 padding-lr-zero-480 margin-top-20 padding-lr-zero-xs">
											<label class="xxl-4 xl-6 m-16 l-6 s-16 xs-16 margin-top-5px">
												Advertise Link <span class="font-red">* </span>:
											</label>
											<div class="xxl-12 xl-10 s-16 xs-16 m-16 l-10">
                                            	<div class="inner-addon left-addon">
                                                    <i class="glyphicon glyphicon glyphicon-link" style=""></i>
                                                    <input type="url" name="link" id="link" style="border:1px solid #dfe0e3;z-index:0;padding-left:45px;" class="form-control input-md" placeholder="Enter Link like https://www.google.com or http://www.google.com" required>
                                                </div>
											</div>
										</div>
										
										<div class="form-group xxl-16 xl-16 s-16 m-16 xs-16 l-16 padding-lr-zero-320 padding-lr-zero-480 margin-top-20 padding-lr-zero-xs">
											<label class="xxl-4 xl-6 m-16 l-6 s-16 xs-16 margin-top-5px">
												Contact Person <span class="font-red">* </span>:
											</label>
											<div class="xxl-12 xl-10 s-16 xs-16 m-16 l-10">
                                            	<div class="inner-addon left-addon">
                                                    <i class="glyphicon glyphicon glyphicon-user" style=""></i>
                                                    <input type="text" name="contact_person" id="contact_person" style="border:1px solid #dfe0e3;z-index:0;padding-left:45px;" class="form-control input-md" placeholder="Enter Contact Person Name" required >
                                                </div>
											</div>
										</div>
										
										<div class="form-group xxl-16 xl-16 s-16 m-16 xs-16 l-16 padding-lr-zero-320 padding-lr-zero-480 margin-top-20 padding-lr-zero-xs">
											<label class="xxl-4 xl-6 m-16 l-6 s-16 xs-16 margin-top-5px">
												Phone <span class="font-red">* </span>:
											</label>
											<div class="xxl-12 xl-10 s-16 xs-16 m-16 l-10">
                                            	<div class="inner-addon left-addon">
                                                    <i class="glyphicon fa fa-phone" style=""></i>
                                                    <div class="col-md-4 col-xs-12">
                                                        <select name="country_code" id="country_code" class="form-control select2" style="margin-left: 23px;width: 78%;">
                                                            <?php echo $this->common_model->country_code_opt('+91');?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-8 col-xs-12" style="padding: 0px;">
                                                        <input type="text" name="phone" id="phone" style="border:1px solid #dfe0e3;z-index:0;padding-left: 10px;" placeholder="Enter Phone No" class="form-control input-md" required minlength="7" maxlength="15" >
                                                    </div>
                                                </div>
										</div>
										</div>
                                        <div class="form-group xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero-320 padding-lr-zero-480 margin-top-10 padding-0-5-xs">
                                            <div class="xxl-4 xl-6 m-16 l-6 s-16 xs-16 margin-top-3px">                                                                        	
                                            </div>
                                            <div class="xxl-11 xl-11 xs-16 xs-16 m-11 s-16 l-11 margin-top-5px-320 padding-lr-zero-480">
                                            <img src="<?php echo $base_url; ?>captcha.php?captch_code_front=yes&captch_code=<?php echo $this->session->userdata['captcha_ad_us']; ?>" alt="" />
                                            <input  type="number" name="code_captcha" id="code_captcha" class="font-weight-normal text-grey form-control" style="width:70%; float:right;" placeholder="Enter Captcha Code" value="" required /> </div>
                                         </div>
										<div class="clearfix"></div>
										<hr>
										<div class="form-group margin-top-30">
                                        <div class="text-center">
                                                <input type="submit" class="btn btn-info margin-right-20 margin-right-0-xs" value="Submit" style="box-shadow:3px 3px 0 0 #e2e2e2;">
												<a class="btn btn-danger margin-top-15-xs" style="box-shadow:3px 3px 0 0 #e2e2e2;"  onClick="return cancel();">Reset <span class=""></span></a>	
											</div>
										</div>
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" class="hash_tocken_id" />
                                        <input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />
                                        <input type="hidden" name="is_post" id="is_post" value="1" />
									</form>
									<div class="clearfix"></div>
								</div>
							
							</div>
						</div>
					</div>
					
					<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-5 margin-bottom-15px margin-top-0px" style="padding:4px;">
						<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-999 margin-top-0px" style="box-shadow: none;">
							<div class="row" style="padding:0px;">
								<?php $where_arra=array('id'=>'14','is_deleted'=>'No','status'=>'APPROVED','level'=>'Level 2','type'=>'Image');
								$advertisement_data = $this->common_model->get_count_data_manual('advertisement_master',$where_arra,1,'*','');
								if(isset($advertisement_data) && $advertisement_data !='' && is_array($advertisement_data) && count($advertisement_data) > 0 ){?>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-999" style="box-shadow: none;">
									<div class="row" style="padding:0px;">
										<?php if(isset($advertisement_data['type']) && $advertisement_data['type'] =='Image' && isset($advertisement_data['link']) && $advertisement_data['link'] !='' && isset($advertisement_data['image']) && $advertisement_data['image'] !=''){?>
										</a>
                                        <a href="<?php echo $advertisement_data['link']; ?>" target="_blank">
                                            <img data-src="<?php echo $base_url.$this->common_model->path_advertise.$advertisement_data['image']; ?>" src="<?php echo $base_url.$this->common_model->path_advertise.$advertisement_data['image']; ?>" class="bg-border text-center img-responsive lazyload" alt="">
                                        </a>
										<?php }else{
											if(isset($advertisement_data['google_adsense']) && $advertisement_data['google_adsense'] !=''){echo $advertisement_data['google_adsense'];}
										}?>
									</div>
								</div>
							<?php }?>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
<!-- ======= <div class="container"> End ======= -->		
<div class="margin-top-20"></div>

<?php
	$this->common_model->js_extra_code_fr.="
	
	if($('#advertisement_form').length > 0)
	{
		$('#advertisement_form').validate({
			rules: {
				contact_person: {
				  required: true,
				  lettersonly: true
				},
				phone: {
				  required: true,
				  number: true
				}
			 },
			submitHandler: function(form)
			{
				submit_advertisement_form();
			}
		});
	}
	function submit_advertisement_form()
	{
		var addname = $('#addname').val();
		var link = $('#link').val();
		var contact_person = $('#contact_person').val();
		var country_code = $('#country_code').val();
		var phone = $('#phone').val();
		//var file = $('#file').val();
		show_comm_mask();
		var hash_tocken_id = $('#hash_tocken_id').val();
		var code_captcha = $('#code_captcha').val();
		var base_url = $('#base_url').val();
		var url = base_url+'add_with_us/advertisement_submit';
		$('#email_success_message').hide();
		$('#email_error_message').hide();
		$.ajax({
		   url: url,
		   type:'post',
		   data: {'csrf_new_matrimonial':hash_tocken_id,'addname':addname,'link':link,'contact_person':contact_person,'country_code':country_code, 'phone':phone,'code_captcha':code_captcha},
		   dataType:'json',
		   success:function(data)
		   {
				if(data.status == 'success')
				{
					$('#email_success_message').html(data.errmessage);
					$('#email_success_message').slideDown();
					form_reset('advertisement_form');
					setTimeout(function() {
								$('#email_success_message').fadeOut('fast');
							}, 10000);
				}
				else
				{
					$('#email_error_message').html(data.errmessage);
					$('#email_error_message').slideDown();
				}
				scroll_to_div('advertisement_form_div');
				$('#hash_tocken_id').val(data.token);
			   hide_comm_mask();	
		   }
		});
		return false;
	}
	function cancel()
	{
		form_reset('advertisement_form');	
	}";
?>