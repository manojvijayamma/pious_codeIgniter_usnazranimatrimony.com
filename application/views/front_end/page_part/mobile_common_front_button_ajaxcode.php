<input type="hidden" id="matri_id_for_action_mobile" name="matri_id_for_action_mobile" value="" />

<div id='mob_myModal_ViewContactDetails' class='modal fade' role='dialog'>
</div>


<div id="mob_myModal_block" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><span class="lock_medium"></span> Do you want to Block This Profile</h4>
            </div>
            <div class="modal-body">
                <div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16">
                	<div id="block_profile_message_mobile"> </div>
                    <div id="block_profile_alt_mobile" class="alert alert-danger" style="overflow:hidden;box-shadow:4px 4px 0 0 #ccc;">
                        <div class="xxl-2 xl-2 l-2 m-16 xs-16 s-16 tex-center">
                        <img src="<?php echo $base_url; ?>assets/front_end/images/icon/user-ban2.png" alt="" class="margin-right-10" />
                        </div>
                        <div class="xxl-13 xl-13 l-13 m-16 xs-16 s-16 xxl-margin-left-1 xl-margin-left-1 margin-top-10">
                            <strong>Do you want to Block This Profile</strong><br />
                            <span class="small">This Profile will be Blocked Permanently.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer margin-top-10">
            <div id="block_button_mobile">
                <a class="btn btn-sm btn-warning" onClick="add_blocklist_mobile()"><i class="fa fa-ban"></i> Block</a>
                <a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> No</a>
             </div>
             <div id="block_button_close_mobile" style="display:none;">
                   <a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</a>
               </div>
            </div>
            
        </div>
    </div>
</div>
 <div id="mob_myModal_unblock" class="modal fade" role="dialog" style="display: none;">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">×</button>
									<h4 class="modal-title"><span class="lock_medium"></span> Profile Currently Blocked</h4>
								</div>
								<div class="modal-body">
									<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16">
                                   <div id="unblock_profile_message_mobile"> </div>
                                    <div id="unblock_profile_alt_mobile">
                   						 <div class="alert alert-danger" style="overflow:hidden;box-shadow:4px 4px 0 0 #ccc;">
											<div class="xxl-2 xl-2 l-2 m-16 xs-16 s-16">
												<img src="<?php echo $base_url; ?>assets/front_end/images/icon/user-block.png" alt="" class="margin-right-10">
											</div>
											<div class="xxl-13 xl-13 l-13 m-16 xs-16 s-16 xxl-margin-left-1 xl-margin-left-1 margin-top-10">
												<strong>This Profile Currently Blocked</strong><br>
												<span class="small">This Profile will be Blocked Permanently.</span>
											</div>
										</div>
										<div class="text-center">
										<img src="<?php echo $base_url; ?>assets/front_end/images/icon/download.png" alt="" class="text-center">
										</div>
										<div class="alert alert-success margin-top-10" style="overflow:hidden;box-shadow:4px 4px 0 0 #ccc;">
											<div class="xxl-2 xl-2 l-2 m-16 xs-16 s-16">
												<img src="<?php echo $base_url; ?>assets/front_end/images/icon/user-unblock.png" alt="" class="margin-right-10">
											</div>
											<div class="xxl-13 xl-13 l-13 m-16 xs-16 s-16 xxl-margin-left-1 xl-margin-left-1 margin-top-10">
												<strong class="text-black">Do you want to Unblock this Profile</strong><br>
												<span class="small text-black">This Profile will be Unblock<em>(Show)</em> Permanently.</span>
											</div>
										</div>
                                       </div>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="modal-footer margin-top-10">
                                 <div id="unblock_button_mobile">
									<a class="btn btn-sm btn-success" onClick="remove_blocklist_mobile()"><i class="fa fa-check"></i> Unblock</a>
								<a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</a>
                                  </div>
             					<div id="unblock_button_close_mobile" style="display:none;">
                                   <a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</a>
                               </div>
								</div>
							</div>
				</div>
</div>


<div id="mob_myModal_shortlisted" class="modal fade" role="dialog" style="display: none;">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header" id="shortlisted_profile_header_mobile">
									<button type="button" class="close" data-dismiss="modal">×</button>
									<h4 class="modal-title"><span class="lock_medium"></span> Profile Currently Shortlisted</h4>
								</div>
								<div class="modal-body">
									<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16">
                                   <div id="shortlisted_profile_message_mobile"> </div>
                                    <div id="shortlisted_profile_alt_mobile">
                   						 <div class="alert alert-danger" style="overflow:hidden;box-shadow:4px 4px 0 0 #ccc;">
											<div class="xxl-2 xl-2 l-2 m-16 xs-16 s-16">
												<img src="<?php echo $base_url; ?>assets/front_end/images/icon/user-block.png" alt="" class="margin-right-10">
											</div>
											<div class="xxl-13 xl-13 l-13 m-16 xs-16 s-16 xxl-margin-left-1 xl-margin-left-1 margin-top-10">
												<strong>This Profile Currently Shortlisted</strong><br>
												<span class="small">This Profile will be Shortlisted Permanently.</span>
											</div>
										</div>
										<div class="text-center">
										<img src="<?php echo $base_url; ?>assets/front_end/images/icon/download.png" alt="" class="text-center">
										</div>
										<div class="alert alert-success margin-top-10" style="overflow:hidden;box-shadow:4px 4px 0 0 #ccc;">
											<div class="xxl-2 xl-2 l-2 m-16 xs-16 s-16">
												<img src="<?php echo $base_url; ?>assets/front_end/images/icon/user-unblock.png" alt="" class="margin-right-10">
											</div>
											<div class="xxl-13 xl-13 l-13 m-16 xs-16 s-16 xxl-margin-left-1 xl-margin-left-1 margin-top-10">
												<strong class="text-black">Do you want to shortlist this Profile</strong><br>
												<span class="small text-black">This Profile will be shortlist<em>(Show)</em> Permanently.</span>
											</div>
										</div>
                                       </div>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="modal-footer margin-top-10">
                                 <div id="shortlisted_button_mobile">
									<a class="btn btn-sm btn-success" onClick="remove_shortlist_mobile()"><i class="fa fa-check"></i> UnShortlist</a>
								<a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</a>
                                  </div>
             					<div id="shortlisted_button_close_mobile" style="display:none;">
                                   <a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</a>
                               </div>
								</div>
							</div>
				</div>
</div>
<div id="mob_myModal_shortlist" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" id="shortlist_profile_header_mobile">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><span class="lock_medium"></span> Do you want to Shortlist This Profile</h4>
            </div>
            <div class="modal-body">
                <div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16">
                	<div id="shortlist_profile_message_mobile"> </div>
                    <div id="shortlist_profile_alt_mobile" class="alert alert-danger" style="overflow:hidden;box-shadow:4px 4px 0 0 #ccc;">
                        <div class="xxl-2 xl-2 l-2 m-16 xs-16 s-16 tex-center">
                        <img src="<?php echo $base_url; ?>assets/front_end/images/icon/user-ban2.png" alt="" class="margin-right-10" />
                        </div>
                        <div class="xxl-13 xl-13 l-13 m-16 xs-16 s-16 xxl-margin-left-1 xl-margin-left-1 margin-top-10">
                            <strong>Do you want to Shortlist This Profile</strong><br/>
                            <span class="small">This Profile will be Shortlisted Permanently.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer margin-top-10">
            <div id="shortlist_button_mobile">
                <a class="btn btn-sm btn-warning" onClick="add_shortlist_mobile()"><i class="fa fa-ban"></i> Shortlist</a>
                <a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> No</a>
             </div>
             <div id="shortlist_button_close_mobile" style="display:none;">
                   <a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</a>
               </div>
            </div>
            
        </div>
    </div>
</div>

<div id="mob_myModal_sendinterest" class="modal fade" role="dialog">
  		<div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h4 class="modal-title"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/love-message.png" class="margin-right-5" alt="">Send Interest</h4>
                          </div>
		<?php
        $member_id = $this->common_front_model->get_session_data('matri_id');
		$plan_expire = '';
		if(isset($member_id) && $member_id !='')
		{
        	$where_arra=array('current_plan'=>'Yes','matri_id'=>$member_id);
        	$plan_expire = $this->common_model->get_count_data_manual('payments',$where_arra,1,'plan_expired');
		}
		$today_date =  $this->common_model->getCurrentDate('Y-m-d');
		
        if(isset($plan_expire) && $plan_expire !='' && $plan_expire > $today_date)
        {		 
		?>
                    <div class="modal-body">
                        <div class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 margin-top-10px-320px margin-top-10px-480px ne-mrg-top-10-768 margin-top-10px-999" id="is_block_member_exp_mobile" style="display:none;">
                        <span ><h3>This member has blocked by you.You can't express your interest.</h3> </span>                        </div>                        
                        <div id="form_express_intrest_mobile">
                        	<form name="ei_form" id="ei_form" action="" method="post">
                            <div class="modal-body">
      							<div id="ei_message_mobile"> </div>
                                <div class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 margin-top-10px-320px margin-top-10px-480px ne-mrg-top-10-768 margin-top-10px-999" id="ei_alt_mobile">
                                    <ul  id="ul_li" class="list-unstyled" style="list-style: none;">                              
                                        <li class="margin-right-5"><label><input name="exp_interest" id="exp_interest" class="radio-inline" type="radio" value="I am interested in your profile. Please Accept if you are interested." checked> I am interested in your profile. Please Accept if you are interested.</label></li>
                                        
                                        <li class="margin-right-5"><label><input name="exp_interest" id="exp_interest" class="radio-inline" type="radio" value="You are the kind of person we have been looking for. Please respond to proceed further."> You are the kind of person we have been looking for. Please respond to proceed further.</label></li>
                                        
                                        <li class="margin-right-5"><label><input name="exp_interest" id="exp_interest" class="radio-inline" type="radio" value=" We liked your profile and interested to take it forward. Please reply at the earliest."> We liked your profile and interested to take it forward. Please reply at the earliest.</label></li>
                                        
                                        <li class="margin-right-5"><label><input name="exp_interest" id="exp_interest" class="radio-inline" type="radio" value="You seem to be the kind of person who suits our family. We would like to contact your parents to proceed further."> You seem to be the kind of person who suits our family. We would like to contact your parents to proceed further.</label></li>
                                        
                                        <li class="margin-right-5"><label><input name="exp_interest" id="exp_interest" class="radio-inline" type="radio" value="You profile matches my sister's/brother's profile. Please 'Accept' if you are interested."> You profile matches my sister's/brother's profile. Please 'Accept' if you are interested.</label></li>
                                        
                                        <li class="margin-right-5"><label><input name="exp_interest" id="exp_interest" class="radio-inline" type="radio" value="Our children's profile seems to match. Please reply to proceed further."> Our children's profile seems to match. Please reply to proceed further.</label></li>
                                        
                                        <li class="margin-right-5"><label><input name="exp_interest" id="exp_interest" class="radio-inline" type="radio" value="We find a good life partner in you for our friend. Please reply to proceed further."> We find a good life partner in you for our friend. Please reply to proceed further.</label></li>
                                    </ul>                                                  
                                </div>								
                            </div>
                            <div class="modal-footer">
                                <div id="ei_button_mobile">
                                 <!--<p class="text-darkgrey font-13 pull-left margin-top-10">Date - Wednesday, 5<sup>th</sup>, July - 2017 (7:23 p.m.) Send Interest</p>-->
                                <a class="btn btn-sm" onClick="express_interest_sent_mobile()"><i class="fa fa-heart"></i> Send</a>
                                <a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</a>
                                 </div>
                                 <div id="ei_button_close_mobile" style="display:none;">
                                   <a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</a>
                               </div>
                            </div>
					</form>
                        </div>
                    </div>
        <?php 
		}
		else
		{?>
                    <div class="modal-body">
                        <div class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 margin-top-10px-320px margin-top-10px-480px ne-mrg-top-10-768 margin-top-10px-999">
                        <span ><h3>&nbsp;&nbsp;You are not a paid member, Please upgrade your membership to express the interest.</h3> </span>                                                 
                        </div>								
                    </div>
	<?php }?>
         </div>
   </div>
</div>



<div id="mob_myModal_email" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="fa fa-envelope"></i> Send Email</h4>
			</div>
			<div id="respond_email_message_mobile"> </div>
			<div class="modal-body">
				<form class="form-group" name="send_email_form" id="send_email_form" action="" method="post">
					
					<span>Email Subject : </span>
					<input type="text" placeholder="Email Subject" class="form-control input-border-modal" name="email_subject_mobile" id="email_subject_mobile"/>
                    <span>Email Content : </span>
					<div class="ne-editor">
						<div id="txtEditor_mobile"></div>
					</div>
					<textarea style="display:none" id="email_message_mobile" name="email_message_mobile"></textarea>
					
					<div class="clearfix"></div>
					<div class="modal-footer">
						<a class="btn btn-sm"  onClick="send_mail_mobile('sent')"><i class="fa fa-send"></i> Send</a>
						<a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div id="mob_myModal_sms" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/message.png" class="margin-right-5" alt="" />Send Sms</h4>
			</div>
			<div class="modal-body">
				<div id="respond_message_mobile"> </div>
                <form class="form-group" name="send_message_form" id="send_message_form" action="" method="post" >
					
					<!-- <input type="text" placeholder="Subject" class="form-control input-border-modal" name="subject_mobile" id="subject_mobile" /> -->
                    <textarea placeholder="Message" class="form-control input-border-modal" rows="6" name="message_mobile" id="message_mobile"></textarea>
					<div class="clearfix"></div>
					
					<div class="modal-footer">
						<a class="btn btn-sm" id="send_message_mobile" onClick="send_message_mobile('sent')"><i class="fa fa-send"></i> Send</a>
						<a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div id="mob_myModal_ignore" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Ignore Profile</h4>
			</div>
			<div class="modal-body">
				<div class="alert alert-warning" style="overflow:hidden;box-shadow:4px 4px 0 0 #ccc;">
					<div class="xxl-2 xl-2 l-2 m-16 xs-16 s-16">
						<img src="<?php echo $base_url; ?>assets/front_end/images/icon/user-block.png" alt="" class="margin-right-10" />
					</div>
					<div class="xxl-13 xl-13 l-13 m-16 xs-16 s-16 xxl-margin-left-1 xl-margin-left-1 margin-top-10">
						<strong>Are you sure want to Ignore this Profile</strong><br />
						<span class="small">This Profile will not be suggest you now onwards.</span>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<a class="btn btn-sm btn-warning"><i class="fa fa-ban"></i> Ignore</a>
				<a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</a>
			</div>
		</div>
	</div>
</div>

<div id="mob_myModal_post_wall" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="fa fa-pencil"></i> Write something to post on wall</h4>
			</div>
			<div class="modal-body">
				<div class="xxl-16 xl-16 m-16 s-16 xs-16 l-16">
					<textarea class="form-control" rows="6" placeholder="Write something to post on wall"></textarea>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="modal-footer">
				<a class="btn btn-sm"><i class="fa fa-send"></i> Post</a>
				<a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</a>
			</div>
		</div>
	</div>
</div>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id_temp" class="hash_tocken_id" />
<?php
$this->common_model->js_extra_code_fr.="
	function add_shortlist_matri_id_mobile_(matri_id)
	{
		//alert(matri_id);
		//debugger;
		$('#shortlist_profile_alt_mobile').show();
		$('#shortlist_profile_header_mobile').show();
		$('#shortlist_profile_message_mobile').hide();
		$('#shortlist_profile_message_mobile').html('');
		$('#shortlist_button_mobile').show();
		$('#shortlist_button_close_mobile').hide();
		$('#matri_id_for_action_mobile').val(matri_id);
	}
	function add_shortlist_mobile()
	{
		//debugger;
		var shortlist_id = $('#matri_id_for_action_mobile').val();
		$('#shortlist_profile_message_mobile').removeClass('alert alert-success alert-danger alert-warning');
		$('#shortlist_profile_message_mobile').html('');
		var hash_tocken_id = $('#hash_tocken_id').val();
		var base_url = $('#base_url').val();
		var url = base_url+'search/add-shortlist';
		//alert(shortlist_id);
		show_comm_mask();
		$.ajax({
			  	    url: url,
					type: 'POST',
					data: {'csrf_new_matrimonial':hash_tocken_id,'shortlistuserid':shortlist_id},
					dataType:'json',
					success: function(data)
					{ 
						$('#shortlist_profile_message_mobile').html(data.errmessage);
						$('#shortlist_profile_message_mobile').slideDown();
						if(data.status == 'success')
						{
							$('#shortlist_profile_message_mobile').addClass('alert alert-success');
							$('#shortlist_profile_alt_mobile').hide();
							$('#shortlist_profile_header_mobile').hide();
							$('#shortlist_button_close_mobile').show();
							$('#shortlist_button_mobile').hide();
							$('#add_shortlist_mobile_'+shortlist_id).hide();
							$('#remove_shortlist_mobile_'+shortlist_id).show();
							$('#matri_id_for_action_mobile').val('');
						}
						else
						{
							$('#shortlist_profile_message_mobile').addClass('alert alert-danger');
						}
						update_tocken(data.tocken);
						hide_comm_mask();
			   }
			});
		return false;
	}
	function remove_shortlist_matri_id_mobile(matri_id)
	{
		//alert(matri_id);
		//debugger;
		$('#shortlisted_profile_alt_mobile').show();
		$('#shortlisted_profile_header_mobile').show();
		$('#shortlisted_profile_message_mobile').hide();
		$('#shortlisted_profile_message_mobile').html('');
		$('#shortlisted_button_mobile').show();
		$('#shortlisted_button_close_mobile').hide();
		$('#matri_id_for_action_mobile').val(matri_id);
	}	
	function remove_shortlist_mobile()
	{
		//debugger;
		var shortlisted_id = $('#matri_id_for_action_mobile').val();
		//alert(shortlisted_id);
		$('#shortlisted_profile_message_mobile').removeClass('alert alert-success alert-danger alert-warning');
		$('#shortlisted_profile_message_mobile').html('');
		
		var hash_tocken_id = $('#hash_tocken_id').val();
		var base_url = $('#base_url').val();
		var url = base_url+'search/remove-shortlist';
		show_comm_mask();
		$.ajax({
			  	    url: url,
					type: 'POST',
					data: {'csrf_new_matrimonial':hash_tocken_id,'shortlisteduserid':shortlisted_id},
					dataType:'json',
					success: function(data)
					{ 	
						$('#shortlisted_profile_message_mobile').html( data.errmessage);
						$('#shortlisted_profile_message_mobile').slideDown();
						if(data.status == 'success')
						{
							$('#shortlisted_profile_header_mobile').hide();
							$('#shortlisted_profile_message_mobile').addClass('alert alert-success');
							$('#shortlisted_profile_alt_mobile').hide();
							$('#shortlisted_button_close_mobile').show();
							$('#shortlisted_button_mobile').hide();
							$('#remove_shortlist_mobile_'+shortlisted_id).hide();
							$('#add_shortlist_mobile_'+shortlisted_id).show();
							$('#matri_id_for_action_mobile').val('');
						}
						else
						{
							$('#shortlisted_profile_message_mobile').addClass( 'alert alert-danger');
						}
						update_tocken(data.tocken);
						hide_comm_mask();
			   }
			});
		return false;
	}	
	function add_block_list_matri_id_mobile(matri_id)
	{
		//debugger;
		$('#block_profile_alt_mobile').show();
		$('#block_profile_message_mobile').hide();
		$('#block_profile_message_mobile').html('');
		$('#block_button_mobile').show();
		$('#block_button_close_mobile').hide();
		$('#matri_id_for_action_mobile').val(matri_id);
	}	
	function add_blocklist_mobile()
	{
		//debugger;
		var block_id = $('#matri_id_for_action_mobile').val();
		$('#block_profile_message_mobile').removeClass('alert alert-success alert-danger alert-warning');
		$('#block_profile_message_mobile').html('');
		var hash_tocken_id = $('#hash_tocken_id').val();
		var base_url = $('#base_url').val();
		var url = base_url+'search/add-blocklist';
		show_comm_mask();
		$.ajax({
			  	    url: url,
					type: 'POST',
					data: {'csrf_new_matrimonial':hash_tocken_id,'blockuserid':block_id},
					dataType:'json',
					success: function(data)
					{ 
						$('#block_profile_message_mobile').html(data.errmessage);
						$('#block_profile_message_mobile').slideDown();
						if(data.status == 'success')
						{
							$('#block_profile_message_mobile').addClass('alert alert-success');
							$('#block_profile_alt_mobile').hide();
							$('#block_button_close_mobile').show();
							$('#block_button_mobile').hide();
							
							$('#add_blocklist_mobile_'+block_id).hide();
							$('#remove_blocklist_mobile_'+block_id).show();
							
							$('#matri_id_for_action_mobile').val('');
							$('#is_member_block_'+block_id).val(1);
							
						}
						else
						{
							$('#block_profile_message_mobile').addClass('alert alert-danger');
						}
						update_tocken(data.tocken);
						hide_comm_mask();
			   }
			});
		return false;
	}
	
	
	function remove_block_list_id_mobile(matri_id)
	{
		//debugger;
		$('#unblock_profile_alt_mobile').show();
		$('#unblock_profile_message_mobile').hide();
		$('#unblock_profile_message_mobile').html('');
		$('#unblock_button_mobile').show();
		$('#unblock_button_close_mobile').hide();
		$('#matri_id_for_action_mobile').val(matri_id);
	}	
	function remove_blocklist_mobile()
	{
		//debugger;
		var unblock_id = $('#matri_id_for_action_mobile').val();
		$('#unblock_profile_message_mobile').removeClass('alert alert-success alert-danger alert-warning');
		$('#unblock_profile_message_mobile').html('');
		
		var hash_tocken_id = $('#hash_tocken_id').val();
		//alert(hash_tocken_id);
		var base_url = $('#base_url').val();
		var url = base_url+'search/remove-blocklist';
		show_comm_mask();
		$.ajax({
			  	    url: url,
					type: 'POST',
					data: {'csrf_new_matrimonial':hash_tocken_id,'unblockuserid':unblock_id},
					dataType:'json',
					success: function(data)
					{ 	
						$('#unblock_profile_message_mobile').html(data.errmessage);
						$('#unblock_profile_message_mobile').slideDown();
						if(data.status == 'success')
						{
							$('#unblock_profile_message_mobile').addClass('alert alert-success');
							$('#unblock_profile_alt_mobile').hide();
							$('#unblock_button_close_mobile').show();
							$('#unblock_button_mobile').hide();
							
							
							$('#remove_blocklist_mobile_'+unblock_id).hide();
							$('#add_blocklist_mobile_'+unblock_id).show();
							$('#matri_id_for_action_mobile').val('');
							$('#is_member_block_'+unblock_id).val('');
						}
						else
						{
							$('#unblock_profile_message_mobile').addClass('alert alert-danger');
						}
						update_tocken(data.tocken);
						hide_comm_mask();
			   }
			});
		return false;
	}
	
	
	function express_interest_mobile(matri_id)
	{
		$('#matri_id_for_action_mobile').val(matri_id);
		var block_member_id = $('#matri_id_for_action_mobile').val();
		if($('#is_member_block_'+block_member_id).val() != '')
		{
			$('#is_block_member_exp_mobile').show();
			$('#form_express_intrest_mobile').hide();
		}
		else
		{
			$('#is_block_member_exp_mobile').hide();
			$('#form_express_intrest_mobile').show();
		}
		$('#ei_alt_mobile').show();
		$('#ei_message_mobile').hide();
		$('#ei_message_mobile').html('');
		$('#ei_button_mobile').show();
		$('#ei_button_close_mobile').hide();
	}
	function express_interest_sent_mobile()
	{
		var receiver = $('#matri_id_for_action_mobile').val();
		var exp_interest =  $('#exp_interest:checked').val();
		
		var dataString =$('#ei_form').serialize();
		
		var hash_tocken_id = $('#hash_tocken_id').val();
		//alert(hash_tocken_id);
		var base_url = $('#base_url').val();
		var url = base_url+'search/express-interest-sent';
		show_comm_mask();
		$.ajax({
			  	    url: url,
					type: 'POST',
					data: {'csrf_new_matrimonial':hash_tocken_id,'receiver':receiver,'message':exp_interest},
					dataType:'json',
					success: function(data)
					{ 	
						
						$('#ei_message_mobile').html(data.errmessage);
						$('#ei_message_mobile').slideDown();
						if(data.status == 'success')
						{
							$('#ei_message_mobile').removeClass('alert alert-danger');
							$('#ei_message_mobile').addClass('alert alert-success');
							$('#ei_alt_mobile').hide();
							$('#ei_button_close_mobile').show();
							$('#ei_button_mobile').hide();
							$('#matri_id_for_action_mobile').val('');
						}
						else
						{
							$('#ei_message_mobile').removeClass('alert alert-success');
							$('#ei_message_mobile').addClass('alert alert-danger');
						}
						update_tocken(data.tocken);
						hide_comm_mask();
			  		}
			});
		return false;
	}
	
	
	function get_member_matri_id_mobile(matri_id)
	{
		$('#matri_id_for_action_mobile').val(matri_id);
	}
	
	function send_message_mobile(status)
	{
		var receiver_id = $('#matri_id_for_action_mobile').val();
		
		var message = $('#message_mobile').val();
		
		if(status =='')
		{
			alert('Please try again');
			return false;
		}
		if(receiver_id =='')
		{
			alert('Please try again');
			return false;
		}	
		
		if(message =='')
		{
			alert('Please enter message to send');
			return false;
		}
		
		var hash_tocken_id = $('#hash_tocken_id').val();
		
		var base_url = $('#base_url').val();
		var url = base_url+'search/send-message';
		show_comm_mask();
		$.ajax({
			  	    url: url,
					type: 'POST',
					data: {'csrf_new_matrimonial':hash_tocken_id,'msg_status':status,'receiver_id':receiver_id,'message':message},
					dataType:'json',
					success: function(data)
					{ 	
						$('#respond_message_mobile').html(data.error_message);
						$('#respond_message_mobile').slideDown();
						if(data.status == 'success')
						{
							$('#respond_message_mobile').addClass('alert alert-success');
							
							$('#message_mobile').val('');
							window.setTimeout(function() {
								$('#respond_message_mobile').html('');
								$('#respond_message_mobile').hide();
								//$('#send_message_cancel').click();
							}, 3000);
						}
						else
						{
							$('#respond_message_mobile').addClass('alert alert-danger');
							window.setTimeout(function() {
								$('#respond_message_mobile').html('');
								$('#respond_message_mobile').hide();
							}, 10000);
						}
						update_tocken(data.tocken);
						hide_comm_mask();
			  		}
			});
		return false;
		
	}
	
	
	function get_member_matri_id_for_email_mobile(matri_id)
	{
		$('#matri_id_for_action_mobile').val(matri_id);
	}
	
	function send_mail_mobile(status='')
	{
		var receiver_email = $('#matri_id_for_action_mobile').val();
		var email_subject = $('#email_subject_mobile').val();
		var email_message = $('#email_message_mobile').val();
		
		if(status ==''){
			alert('Please try again');
			return false;
		}
		if(receiver_email ==''){
			alert('Please try again');
			return false;
		}	
		if(email_subject ==''){
			alert('Please enter subject to send');
			$('#email_subject').focus();
			return false;
		}
		if(email_message ==''){
			alert('Please enter message to send');
			return false;
		}
		
		var hash_tocken_id = $('#hash_tocken_id').val();
		var base_url = $('#base_url').val();
		var url = base_url+'search/send-email';
		show_comm_mask();
			$.ajax({
			  	url: url,
				type: 'POST',
				data: {'csrf_new_matrimonial':hash_tocken_id,'email_status':status,'receiver_email':receiver_email,'email_subject':email_subject,'email_message':email_message},
				dataType:'json',
				success: function(data)
				{ 	
					$('#respond_email_message_mobile').html(data.response);
					$('#respond_email_message_mobile').slideDown();
					if(data.status == 'success'){
						$('#respond_email_message_mobile').addClass('alert alert-success');
						$('#email_subject_mobile').val('');
						$('div.Editor-editor').html('');
						//$('#matri_id_for_action_mobile').val('');
						window.setTimeout(function() {
							$('#respond_email_message_mobile').html('');
							$('#respond_email_message_mobile').hide();
						}, 3000);
					}else{
						$('#mob_myModal_email').addClass('alert alert-danger');
					}
					update_tocken(data.tocken);
					hide_comm_mask();
			  	}
			});
		return false;
	}
	
	
	function get_ViewContactDetails_mobile(receiver_matri_id)
	{
		if(receiver_matri_id ==''){
			alert('Please try again..!!!');
			return false;
		}
		
		var hash_tocken_id = $('#hash_tocken_id').val();
		var base_url = $('#base_url').val();
		var url = base_url+'search/view-contact-details';
		show_comm_mask();
			$.ajax({
			  	url: url,
				type: 'POST',
				data: {'csrf_new_matrimonial':hash_tocken_id,'receiver_matri_id':receiver_matri_id},
				dataType:'json',
				success: function(data)
				{ 	
					if(data.success = 'success'){
						$('#mob_myModal_ViewContactDetails').html( data.contact_details);
					}else{
						alert(data.errmessage);
					}
					update_tocken(data.tocken);
					hide_comm_mask();
			  	}
			});
		return false;
	}
	
	
	
	";
	
?>
<?php
	$this->common_model->js_extra_code_fr.="
		$(document).ready(function() {			
			$('#txtEditor_mobile').Editor(); 
			$('div.Editor-editor').html($('#email_message_mobile').val()); 
			$('div.Editor-editor').blur(function(){
				var cms_cont= $('div.Editor-editor').html();
				alert(cms_cont);
				$('#email_message_mobile').val(cms_cont);
			});
			tooltip_fun();
		});	
	";
?>