<?php $login_member_id = $this->common_front_model->get_session_data('matri_id');
	  $where_arra=array('matri_id'=>$login_member_id);
	  $user_data = $this->common_model->get_count_data_manual('register',$where_arra,1,'photo_protect,photo_password,photo_view_status,contact_view_security');
	  $tab_active1= 'active';
	  $tab_active_chan = '';
	  if(isset($tab_active) && $tab_active =='change_password')
	  {
		$tab_active_chan = 'active';
		$tab_active1= '';
	  }
?>
	<div class="container margin-top-20 padding-0-5-xs">
        <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 padding-0-5-xs">
			<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-5 ne_exp_tab margin-top-15 padding-lr-zero hidden-xs">
           		<div class="row">
                	<ul class="nav nav-tabs" role="tablist" style="text-align:left;">
    					<li role="presentation" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 <?php echo $tab_active1; ?>">
                        	<a href="#exp-1" aria-controls="exp-1" role="tab" data-toggle="tab" class="text-left border-top xxl-16 xl-16 l-16 m-16 s-16 xs-16" id="exp-link-1">
                            	<div class="row">
									<div class="xxl-2 xl-2 l-2 m-16 s-16 xs-16">
										<img src="<?php echo $base_url; ?>assets/front_end/images/icon/rejected_1.png" alt="" class="" />
									</div>
									<div class="xxl-14 xl-14 l-14 m-16 s-16 xs-16">
										Block list
									</div>
								</div>
                            </a>
						</li>
						<li role="presentation" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16" id="photovisibility">
						   <a href="#exp-2" aria-controls="exp-2" role="tab" data-toggle="tab" class="text-left border-top xxl-16 xl-16 l-16 m-16 s-16 xs-16" id="exp-link-2">
							  <div class="row">
									<div class="xxl-2 xl-2 l-2 m-16 s-16 xs-16">
										<img src="<?php echo $base_url; ?>assets/front_end/images/icon/interest-sent-black.png" alt="" class="" />
									</div>
									<div class="xxl-14 xl-14 l-14 m-16 s-16 xs-16">
										Photo visibility
									</div>
								</div>
						   </a>
						</li>
						<li role="presentation" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
							<a href="#exp-3" aria-controls="exp-3" role="tab" data-toggle="tab" class="text-left border-top xxl-16 xl-16 l-16 m-16 s-16 xs-16" id="exp-link-3">
								<div class="row">
									<div class="xxl-2 xl-2 l-2 m-16 s-16 xs-16">
										<img src="<?php echo $base_url; ?>assets/front_end/images/icon/user-pending-black.png" alt="" class="" />
									</div>
									<div class="xxl-14 xl-14 l-14 m-16 s-16 xs-16">
										Contact Settings
									</div>
								</div>
							</a>
						</li>
						<li role="presentation" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 <?php echo $tab_active_chan; ?>">
							<a href="#exp-4" aria-controls="exp-4" role="tab" data-toggle="tab" class="text-left border-top xxl-16 xl-16 l-16 m-16 s-16 xs-16" id="exp-link-4">
								<div class="row">
									<div class="xxl-2 xl-2 l-2 m-16 s-16 xs-16">
										<img src="<?php echo $base_url; ?>assets/front_end/images/icon/hp-secure-icon-new.png" alt="" class="" />
									</div>
									<div class="xxl-14 xl-14 l-14 m-16 s-16 xs-16">
										Change Password
									</div>
								</div>
							</a>
						</li>
					</ul>
           		</div>
           </div>
           <div class="xxl-12 xl-12 xs-16 m-16 s-16 l-11 margin-top-5">
           		<div class="row">
                	<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-320 padding-lr-zero-768 ne_exp_tab_content padding-20-5-xs">
                    	<div role="tabpanel">
						   <div class="tab-content xxl-16 xl-16 m-16 l-16 s-16 xs-16 padding-lr-zero" style="background:none;border-radius:0px;padding:0px;">
                                <div role="tabpanel" class="tab-pane fade <?php echo $tab_active1; ?>" id="exp-1">
                                	<div class="xxl-16 xl-16 m-16 l-16 s-16 xs-16 ne_exp_sub_tab bg-border" style="padding-top:0px;">
										<div class="row">
											<div class="nav ne_exp_interest_sended xxl-16 xl-16 m-16 l-16 s-16 xs-16 padding-lr-zero margin-top-0px">
												<div class="bg-light-blue text-center padding-5px">
													   <h3 class="text-white"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/interest-reject.png" alt="" class="margin-right-5" />Block list</h3>
												</div>
											</div>
											<div class="ne_tab_sub_tab_content ne_interest_sent_tab xxl-16 xl-16 m-16 l-16 s-16 xs-16 tab-content padding-20-5-xs" style="border:0px;">
                                              <div align="center" class="padding-top-10px">
                                            
                                          <!------for block member error or success message display---->  
												 
                                           <h4> <div class="alert alert-danger" id="block_error" style="display:none"></div>
                                           <div class="alert alert-success" id="block_success" style="display:none"></div></h4>  
                                            <!------for block member error or success message display----> 
                                                </div>
												<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16">
													<div class="">
														<h3 class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 margin-bottom-0px padding-bottom-10px ne-bdr-btm-lgt-grey text-darkgrey padding-lr-zero">
															<i class="fa fa-user-times ne_mrg_ri8_10"></i>Block Member
														</h3>
														<p class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_font_12 margin-top-10px padding-lr-zero"></p>
                                                       
													<form  id="blocklist_form" name="blocklist_form" method="post">
                                                    <div class="xxl-16 xl-16 xs-16 l-16 m-12 s-16 margin-top-10px padding-lr-zero" >
																<h4 class="xxl-5 xl-5 xs-16 l-6 m-6 s-16 text-darkgrey font-15">
																	Profile ID :
																</h4>
																<div class="xxl-6 xl-6 xs-16 l-10 m-10 s-16 margin-top-5px">
																	<input type="text" class="form-control" name="blockuserid" id="blockuserid" required style="box-shadow:2px 2px 0 0 #ccc;">
																</div>
															</div>
                                                            <div class="xxl-16 xl-16 xs-16 l-16 m-12 s-16 margin-top-10px " align="center">
														
                                                        <input type="submit" class="btn margin-top-10 xxl-4 xxl-margin-left-6 xl-4 xl-margin-left-6 s-16 m-16 l-16 xs-16" value="Block" name="block_sub" id="block_sub">
															<!--<input type="submit" class="btn btn-block text-white btn-deep-purple font-13" value="Block" >-->
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" class="hash_tocken_id" />
                                        <input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />
                                        <input type="hidden" name="is_post" id="is_post" value="1" />
									</div>
								</form>
													</div>
											</div>
										</div>
									</div>
                                     <!------- for search result ----->
                                        <div class="" id="main_content_ajax">
                                            <?php 
                                            include_once('short_listed_member_profile.php'); ?>
                                        </div>
                                      <!------ for search result ------>
									</div>
                                    
                                </div>
								
  								<div role="tabpanel" class="tab-pane fade" id="exp-2">
                                	<div class="xxl-16 xl-16 m-16 l-16 s-16 xs-16 ne_exp_sub_tab bg-border" style="padding-top:0px;">
										<div class="row">
											<div class="nav ne_exp_interest_sended xxl-16 xl-16 m-16 l-16 s-16 xs-16 padding-lr-zero margin-top-0px">
												<div class="bg-light-blue text-center padding-5px">
													   <h3 class="text-white"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/interest-sent.png" alt="" class="margin-right-5" /> Photo Visibility</h3>
												</div>
											</div>
                                           
                                            <div class="" id="photo_setting_ajax">
                                        		<?php include_once('photo_setting.php'); ?>
                                   		   </div>
										</div>
									</div>
                                </div>
								
  								<div role="tabpanel" class="tab-pane fade" id="exp-3">
                                	<div class="xxl-16 xl-16 m-16 l-16 s-16 xs-16 ne_exp_sub_tab bg-border" style="padding-top:0px;">
										<div class="row">
											<div class="nav ne_exp_interest_sended xxl-16 xl-16 m-16 l-16 s-16 xs-16 padding-lr-zero margin-top-0px">
												<div class="bg-light-blue text-center padding-5px">
													<h3 class="text-white"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/user-pending.png" alt="" class="margin-right-5" /> Contact Settings</h3>
												</div>
											</div>
											
                                            <div class="" id="contact_setting_ajax">
                                        		<?php include_once('contact_privacy_setting.php'); ?>
                                   		   </div>
										</div>
									</div>
                                </div>
								
                              <div role="tabpanel" class="tab-pane fade <?php echo $tab_active_chan; ?>" id="exp-4">
                                	<div class="xxl-16 xl-16 m-16 l-16 s-16 xs-16 ne_exp_sub_tab bg-border" style="padding-top:0px;">
										<div class="row">
											<div class="nav ne_exp_interest_sended xxl-16 xl-16 m-16 l-16 s-16 xs-16 padding-lr-zero margin-top-0px">
												<div class="bg-light-blue text-center padding-5px">
													<h3 class="text-white"><i class="fa fa-key"></i> Change Password</h3>
												</div>
											</div>
											<div class="ne_tab_sub_tab_content ne_interest_sent_tab xxl-16 xl-16 m-16 l-16 s-16 xs-16 tab-content" style="border:0px;">
                                             <div align="center" class="padding-top-10px">
                                            
                                          <!------for block member error or success message display---->  
												 
                                    <h4> <div class="alert alert-danger" id="change_pass_error" style="display:none"></div>
                                     <div class="alert alert-success" id="change_pass_success" style="display:none"></div></h4>                                            <!------for block member error or success message display----> 
                                                </div>

												<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-0-5-xs">
													<div class="">
														<h3 class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 margin-bottom-0px padding-bottom-10px ne-bdr-btm-lgt-grey text-darkgrey padding-lr-zero">
															<i class="fa fa-key ne_mrg_ri8_10"></i>Change Password
														</h3>
														<div class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 padding-lr-zero ne_pad_btm_10px ne_pad_tp_10px margin-top-20">
															<form method="post" name="change_pass" id="change_pass"> 	
																<div class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 form-group padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 padding-lr-zero-999 padding-0-5-xs">
																	<div class="xxl-5 xl-5 xs-16 s-16 m-5 l-8 ne_pad_tp_5px font-13">
																		Enter Old Password:
																	</div>
																	<div class="xxl-8 xl-8 l-8 m-8 xs-16 s-16">
																		<input type="password" class="form-control" id="old_pass" name="old_pass" minlength="6" required>
																	</div>
																</div>
																<div class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 form-group padding-lr-zero-320 padding-lr-zero-480  padding-lr-zero-768 padding-lr-zero-999 padding-0-5-xs">
																	<div class="xxl-5 xl-5 xs-16 s-16 m-5 l-8 ne_pad_tp_5px font-13">
																		Enter New Password:
																	</div>
																	<div class="xxl-8 xl-8 l-8 m-8 xs-16 s-16">
																		<input type="password" class="form-control" id="new_pass" name="new_pass" minlength="6" required>
																	</div>
																</div>
																<div class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 form-group padding-lr-zero-320 padding-lr-zero-480  padding-lr-zero-768 padding-lr-zero-999 padding-0-5-xs">
																	<div class="xxl-5 xl-5 xs-16 s-16 m-5 l-8 ne_pad_tp_5px font-13">
																		Enter Confirm Password:
																	</div>
																	<div class="xxl-8 xl-8 l-8 m-8 xs-16 s-16">
																		<input type="password" class="form-control" id="cnfm_pass" name="cnfm_pass" minlength="6" required>
																	</div>
																</div>
																<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 margin-top-15px padding-0-5-xs">
																	<div class="xxl-4 xxl-margin-left-6 xl-4 xl-margin-left-6 xs-16 s-16 m-4 m-margin-left-6 l-6 l-margin-left-5">
																	<!--	<a href="#" class="btn btn-success font-15"><i class="fa fa-check"></i> Save Change</a>-->
                                                                   <input type="submit" class="btn btn-block text-white btn-deep-purple font-15" value="Save Changes" >
       																	</div>
																</div>
                                                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" class="hash_tocken_id" />                                        <input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />
                                                <input type="hidden" name="is_post" id="is_post" value="1" />	
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
                                </div>
						   </div>
						</div>
                    </div>
                </div>
			</div>
        </div>
	</div>
	<div class="clearfix"></div>
	<div id="test" class="hidden-lg hidden-md hidden-sm" style="padding-left:0px;width:-315px !important;">
		<div class="user margin-top-20">
			<h3 href="#" target="_blank" class="navbar-link text-shadow-black text-center">Browse Express Interest Categories</h3>
		</div>

		<div class="list-group margin-top-10" style="box-shadow:none;">
			<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-5 ne_exp_tab margin-top-15 padding-lr-zero">
           		<div class="row">
                	<ul class="nav nav-tabs" role="tablist" style="text-align:left;">
    					<li role="presentation" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
                        	<a href="#exp-1" aria-controls="exp-1" role="tab" data-toggle="tab" class="text-left border-top xxl-16 xl-16 l-16 m-16 s-16 xs-16" id="exp-link-1">
                            	<div class="row">
									<div class="xxl-2 xl-2 l-2 m-3 s-3 xs-3">
										<img src="<?php echo $base_url; ?>assets/front_end/images/icon/rejected_1.png" alt="" class="" />
									</div>
									<div class="xxl-14 xl-14 l-14 m-13 s-13 xs-13">
										Block list
									</div>
								</div>
                            </a>
						</li>
						<li role="presentation" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
						   <a href="#exp-2" aria-controls="exp-2" role="tab" data-toggle="tab" class="text-left border-top xxl-16 xl-16 l-16 m-16 s-16 xs-16" id="exp-link-2">
							  <div class="row">
									<div class="xxl-2 xl-2 l-2 m-3 s-3 xs-3">
										<img src="<?php echo $base_url; ?>assets/front_end/images/icon/interest-sent-black.png" alt="" class="" />
									</div>
									<div class="xxl-14 xl-14 l-14 m-13 s-13 xs-13">
										Photo visibility
									</div>
								</div>
						   </a>
						</li>
						<li role="presentation" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
							<a href="#exp-3" aria-controls="exp-3" role="tab" data-toggle="tab" class="text-left border-top xxl-16 xl-16 l-16 m-16 s-16 xs-16" id="exp-link-3">
								<div class="row">
									<div class="xxl-2 xl-2 l-2 m-3 s-3 xs-3">
										<img src="<?php echo $base_url; ?>assets/front_end/images/icon/user-pending-black.png" alt="" class="" />
									</div>
									<div class="xxl-14 xl-14 l-14 m-13 s-13 xs-13">
										Contact Setting
									</div>
								</div>
							</a>
						</li>
						<li role="presentation" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16" >
							<a href="#exp-4" aria-controls="exp-4" role="tab" data-toggle="tab" class="text-left border-top xxl-16 xl-16 l-16 m-16 s-16 xs-16" id="exp-link-4">
								<div class="row">
									<div class="xxl-2 xl-2 l-2 m-3 s-3 xs-3">
										<img src="<?php echo $base_url; ?>assets/front_end/images/icon/hp-secure-icon-new.png" alt="" class="" />
									</div>
									<div class="xxl-14 xl-14 l-14 m-13 s-13 xs-13">
										Change Password
									</div>
								</div>
							</a>
						</li>
					</ul>
           		</div>
           </div>
		   <div class="clearfix"></div>
		</div>
		<div class="clearfix margin-top-10"></div>
	</div>
<!------------------<div class="container">----End------------------------------------>
	<div class="margin-top-30"></div>
<?php
	$this->common_model->js_extra_code_fr.="
	$(document).ready(function () {
		$('#test').BootSideMenu({
			side: 'left',
			pushBody:false,
			width: '250px'
		});
	});
	
	if($('#blocklist_form').length > 0)
		{
			$('#blocklist_form').validate({
				submitHandler: function(form)
				{
					check_validation();
				}
			});
		}
		function check_validation()
		{	
			if($('#blockuserid').val() && $('#blockuserid').val()!='')
			{
				var blockuserid = $('#blockuserid').val();
			}
			show_comm_mask();
			var hash_tocken_id = $('#hash_tocken_id').val();
			var base_url = $('#base_url').val();
			var url = base_url+'privacy-setting/block-profile';
			$('#block_success').hide();
			$('#block_error').hide();
			
			$.ajax({
			  	    url: url,
					type: 'POST',
					data: {'csrf_new_matrimonial':hash_tocken_id,'blockuserid':blockuserid},
					dataType:'json',
					success: function(data)
					{ 	
						if(data.status == 'success')
						{
							$('#block_success').html(data.errmessage);
							$('#block_success').slideDown();
							$('#blockuserid').val('');
							$('#main_content_ajax').html(data.block_profile_code);
							load_pagination_code_front_end();
							scroll_to_div('main_content_ajax');
							update_tocken($('#hash_tocken_id_temp').val());					
							$('#hash_tocken_id_temp').remove();
							setTimeout(function() {
								$('#block_success').fadeOut('fast');
							}, 10000);
						}
						else
						{
							$('#block_error').html(data.errmessage);
							$('#block_error').slideDown();
							setTimeout(function() {
								$('#block_error').fadeOut('fast');
							}, 10000);
						}
						$('#hash_tocken_id').val(data.token);
						hide_comm_mask();
			   }
			});
			return false;
		}
	
	function unblock_particulare(id,matri_id)
		{
			$('#unblock_id').val(id);
			$('#matri_id').val(matri_id);
			setTimeout(function() {
				$('#unblock_success').fadeOut('fast');
			}, 10000);
		}
		load_pagination_code_front_end();
<!------------------------------------------------start for photo visiblity------------------------------------------------>			
		function check_validation_photo()
		{				
			if($('#photo_password').val() && $('#photo_password').val()!='')
			{
				var photo_password = $('#photo_password').val();
			}			
			show_comm_mask();
			var hash_tocken_id = $('#hash_tocken_id').val();
			var base_url = $('#base_url').val();
			var url = base_url+'privacy-setting/photo-visibility';
			$.ajax({
			  	    url: url,
					type: 'POST',
					data: {'csrf_new_matrimonial':hash_tocken_id,'photo_password':photo_password},
					dataType:'json',
					success: function(data)
					{ 	
						if(data.status == 'success')
						{	
							$('#photo_setting_ajax').html(data.photo_setting_load);
							update_tocken($('#hash_tocken_id_temp').val());					
							$('#hash_tocken_id_temp').remove();
							setTimeout(function() {
								$('#mydivs').fadeOut('fast');
							}, 10000);
						}
						$('#hash_tocken_id').val(data.token);
						hide_comm_mask();	
			   		}
			});
			return false;
		}
		function removephotopass()
		{
			show_comm_mask();
			var hash_tocken_id = $('#hash_tocken_id').val();
			var base_url = $('#base_url').val();
			var url = base_url+'privacy-setting/remove-photo-visibility';
			$.ajax({
			  	    url: url,
					type: 'POST',
					data: {'csrf_new_matrimonial':hash_tocken_id},
					dataType:'json',
					success: function(data)
					{ 	
						if(data.status == 'success')
						{	
							$('#photo_setting_ajax').html(data.photo_setting_load);
							update_tocken($('#hash_tocken_id_temp').val());					
							$('#hash_tocken_id_temp').remove();
							setTimeout(function() {
								$('#mydivs').fadeOut('fast');
							}, 10000);
						}
						$('#hash_tocken_id').val(data.token);
						hide_comm_mask();	
			   		}
			});
			return false;
		}		
		function photovisbility(pval)
		{	
			show_comm_mask();
			var hash_tocken_id = $('#hash_tocken_id').val();
			var base_url = $('#base_url').val();
			var url = base_url+'privacy-setting/photo-view-status';
			$.ajax({
			  	    url: url,
					type: 'POST',
					data: {'csrf_new_matrimonial':hash_tocken_id,'photo_view_status':pval},
					dataType:'json',
					success: function(data)
					{ 	
						if(data.status == 'success')
						{
							$('#photo_setting_ajax').html(data.photo_setting_load);
							setTimeout(function() {
								$('#mydivs').fadeOut('fast');
							}, 10000);
							update_tocken($('#hash_tocken_id_temp').val());					
							$('#hash_tocken_id_temp').remove();
						}
						$('#hash_tocken_id').val(data.token);
						hide_comm_mask();	
			   		}
			});
			return false;
		}
<!---------------------------------------------stop for photo visiblity and start for contact setting----------------------->
		function contactvisbility(cval)
		{	
			show_comm_mask();
			var hash_tocken_id = $('#hash_tocken_id').val();
			var base_url = $('#base_url').val();
			var url = base_url+'privacy-setting/contact-privacy-setting';
			$.ajax({
			  	    url: url,
					type: 'POST',
					data: {'csrf_new_matrimonial':hash_tocken_id,'contact_view_security':cval},
					dataType:'json',
					success: function(data)
					{ 	
						if(data.status == 'success')
						{
							$('#contact_setting_ajax').html(data.contact_setting_load);
							setTimeout(function() {
								$('#mydivs').fadeOut('fast');
							}, 10000);
							update_tocken($('#hash_tocken_id_temp').val());					
							$('#hash_tocken_id_temp').remove();
						}
						$('#hash_tocken_id').val(data.token);
						hide_comm_mask();	
			   		}
			});
			return false;
		}
<!---------------------------------------------stop for contact setting and start for change password----------------------->
		
		if($('#change_pass').length > 0)
		{
			$('#change_pass').validate({
				rules: 
				{
					cnfm_pass:
					{
						equalTo:'#new_pass'
					},
				},
				submitHandler: function(form)
				{
					check_validation_password();
				}
			});
		}
		
		function check_validation_password()
		{	
			var old_pass = $('#old_pass').val();
			var new_pass = $('#new_pass').val();
			var cnfm_pass = $('#cnfm_pass').val();
			show_comm_mask();
			var hash_tocken_id = $('#hash_tocken_id').val();
			var base_url = $('#base_url').val();
			$('#change_pass_success').hide();
			$('#change_pass_error').hide();
			
			var url = base_url+'privacy-setting/change-password';
			$.ajax({
			  	    url: url,
					type: 'POST',
					data:{'csrf_new_matrimonial':hash_tocken_id,'old_pass':old_pass,'new_pass':new_pass,'cnfm_pass':cnfm_pass},
					dataType:'json',
					success: function(data)
					{ 	
						if(data.status == 'success')
						{
							$('#change_pass_success').html(data.errmessage);
							$('#change_pass_success').slideDown();
							update_tocken($('#hash_tocken_id_temp').val());					
							$('#hash_tocken_id_temp').remove();
							form_reset('change_pass');
							setTimeout(function() {
								$('#change_pass_success').fadeOut('fast');
							}, 10000);
						}
						else
						{
							$('#change_pass_error').html(data.errmessage);
							$('#change_pass_error').slideDown();
							setTimeout(function() {
								$('#change_pass_error').fadeOut('fast');
							}, 10000);
						}
						$('#hash_tocken_id').val(data.token);
						hide_comm_mask();	
			   		}
			});
			return false;
		}
		;";
?>