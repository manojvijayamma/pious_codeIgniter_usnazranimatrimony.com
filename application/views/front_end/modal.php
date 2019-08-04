<?php
$comm_model = $this->common_model;

?><div id="comm_delete_myModal" class="modal fade" role="dialog" tabindex="-1">
<?php
if(isset($is_login) && $is_login!=0)
{
	echo form_open(base_url()."common_request/send_common_request",array("name"=>"common_delete_form","id"=>"common_delete_form"));
	?>
	<input type="hidden" name="user_id" id="user_id" />
	<input type="hidden" name="action" id="action" />
	<input type="hidden" name="photo_no" id="photo_no" />
	<input type="hidden" name="id" id="id" />
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12 col-xs-12" style="display:none;" id="message_element">
					</div>
					<div id="comm_delete_content_view">
						<div class="col-md-12 col-xs-12 text-center">
							<h4>Are you sure want to delete this?</h4>
						</div>
						<div class="col-md-12 col-xs-12 text-center">
							<button type="submit" class="btn g-btns-2">Yes</button>
							<button type="button" class="btn btn-cancel g-btns-2" data-dismiss="modal">No</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	echo form_close();
}
else
{
?>
	<div class="modal-header" style="padding:5px 8px;">
        <button type="button" class="close" data-dismiss="modal"> <i class='fa fa-times fa-q'></i> </button>
        <button class="close modalMinimize">  </button>
        <h4 class="modal-title">Login</h4>
    </div>
    <div class="modal-body" style="padding:15px;">
        <form name="MatriForm" class="form-horizontal" action="<?php echo base_url();?>login" method="post">
            <div class="form-group">
                <div class="col-sm-12">
                    <h4>&nbsp;&nbsp;Please Login for access this feature.</h4>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-10">
                    <div class="col-md-1 col-xs-6">
                        <a href="<?php echo base_url();?>login" class="btn btn-sm fb-btns"><b>Log In</b> </a>					
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php
}
?>
</div>
<div class="modal fade mymodal" id="sendmessage_modal" role="dialog" tabindex="-1">
	<div class="modal-dialog">
		<!-- Modal content Start-->
		<div class="modal-content">
        	<?php
			if(isset($is_login) && $is_login!=0)
			{
			?>
			<div class="modal-header" style="padding:5px 8px;">
				<button type="button" class="close" data-dismiss="modal"> <i class='fa fa-times fa-q'></i> </button>
				<!--<button class="close modalMinimize"> <i class='fa fa-minus fa-q'></i> </button>-->
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body" style="padding:15px;">
				<div id="show_member_data">
				</div>
				<?php
				echo form_open(base_url()."common_request/send_message",array("name"=>"send_message_form","id"=>"send_message_form"));
				?>
				<input type="hidden" name="from_id" id="from_id" />
				<input type="hidden" name="to_id" id="to_id" />
				<div class="row margin-top-10">
					<div class="col-md-12">
						<div id="sendmessage_errormsg"></div>
						<div class="col-md-2">
							Subject
						</div>
						<div class="col-md-1">
							:
						</div>
						<div class="col-md-9">
							<input type="text" class="form-control input-text-b" name="subject" id="subject" placeholder="Subject" required="required" />							
						</div>
					</div>
					<div class="col-md-12 margin-top-10">
						<div class="col-md-2">
							Message
						</div>
						<div class="col-md-1">
							:
						</div>
						<div class="col-md-9">
							<textarea class="form-control input-text-b text-area-w-modal" rows="3" placeholder="Write your message to" name="message" id="message" required></textarea>
						</div>
					</div>
				</div>
				<div class="row margin-top-10">
					<div class="col-md-12 margin-top-10">
						<div class="col-md-2">
						</div>
						<div class="col-md-1">
						</div>
						<div class="col-md-9">
							<p class="">
								<button type="submit" class="btn make-dash-2"> Send Message</button>
							</p>
						</div>
					</div>
				</div>
				<?php
				echo form_close();
				?>
			</div>
			<?php
            }
            else
            {
            ?>
        	<div class="modal-header" style="padding:5px 8px;">
                    <button type="button" class="close" data-dismiss="modal"> <i class='fa fa-times fa-q'></i> </button>
                    <button class="close modalMinimize">  </button>
                    <h4 class="modal-title">Login</h4>
				</div>
                <div class="modal-body" style="padding:15px;">
                    <form name="MatriForm" class="form-horizontal" action="<?php echo base_url();?>login" method="post">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <h4>&nbsp;&nbsp;Please Login to access this feature.</h4>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-10">
                                <div class="col-md-1 col-xs-6">
                                    <a href="<?php echo base_url();?>login" class="btn btn-sm fb-btns"><b>Log In</b> </a>					
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
			<?php
            }
            ?>
        </div>
		<!-- Modal content End-->
	</div>
</div>
<div class="modal fade mymodal" id="sendinterest_modal" role="dialog" tabindex="-1">
	<div class="modal-dialog">
		<!-- Modal content Start-->
		<div class="modal-content">
        	<?php
			if(isset($is_login) && $is_login!=0)
			{
            ?>
			<div class="modal-header" style="padding:5px 8px;">
				<button type="button" class="close" data-dismiss="modal"> <i class='fa fa-times fa-q'></i> </button>
				<h4 class="modal-title">Express Interest</h4>
			</div>
			<div class="modal-body" style="padding:15px;">
				<?php
				
				echo form_open(base_url()."common_request/send_interest",array("name"=>"send_interest_form","id"=>"send_interest_form"));
				?>
				<input type="hidden" name="from_id" id="from_id" />
				<input type="hidden" name="to_id" id="to_id" />
				<div class="row margin-top-10">
					<div class="col-md-12">
						<div id="sendinterest_errormsg"></div>
						<div class="col-md-12" id="radio_element">
							<label class="label_font_normal"><input type="radio" name="exp_interest" id="exp_interest1" value="I am interested in your profile. Please Accept if you are interested." required="required" /> I am interested in your profile. Please Accept if you are interested.</label>
							<label class="label_font_normal"><input type="radio" name="exp_interest" id="exp_interest2" value="You are the kind of person we have been looking for. Please respond to proceed further." required="required" /> You are the kind of person we have been looking for. Please respond to proceed &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;further.</label>
							<label class="label_font_normal"><input type="radio" name="exp_interest" id="exp_interest3" value="We liked your profile and interested to take it forward. Please reply at the earliest." required="required" /> We liked your profile and interested to take it forward. Please reply at the earliest.</label>
							<label class="label_font_normal"><input type="radio" name="exp_interest" id="exp_interest4" value="You seem to be the kind of person who suits our family. We would like to contact your parents to proceed further." required="required" /> You seem to be the kind of person who suits our family. We would like to contact &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;your parents to proceed further.</label>
							<label class="label_font_normal"><input type="radio" name="exp_interest" id="exp_interest5" value="You profile matches my sister's/brother's profile. Please 'Accept' if you are interested." required="required" /> You profile matches my sister's/brother's profile. Please 'Accept' if you are &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;interested.</label>
							<label class="label_font_normal"><input type="radio" name="exp_interest" id="exp_interest6" value="Our children's profile seems to match. Please reply to proceed further." required="required" /> Our children's profile seems to match. Please reply to proceed further.</label>
							<label class="label_font_normal"><input type="radio" name="exp_interest" id="exp_interest7" value="We find a good life partner in you for our friend. Please reply to proceed further." required="required" /> We find a good life partner in you for our friend. Please reply to proceed further.</label>
						</div>
					</div>
				</div>
				<div class="row margin-top-10">
					<div class="col-md-12 margin-top-10">
						<div class="col-md-12 text-right">
							<button type="submit" class="btn make-dash-2"> Send Interest</button>
						</div>
					</div>
				</div>
				<?php
				echo form_close();
				?>
			</div>
            <?php
			}
			else
			{
			?>
            	<div class="modal-header" style="padding:5px 8px;">
                    <button type="button" class="close" data-dismiss="modal"> <i class='fa fa-times fa-q'></i> </button>
                    <button class="close modalMinimize">  </button>
                    <h4 class="modal-title">Login</h4>
				</div>
                <div class="modal-body" style="padding:15px;">
                    <form name="MatriForm" class="form-horizontal" action="<?php echo base_url();?>login" method="post">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <h4>&nbsp;&nbsp;Please Login to access this feature.</h4>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-10">
                                <div class="col-md-1 col-xs-6">
                                    <a href="<?php echo base_url();?>login" class="btn btn-sm fb-btns"><b>Log In</b> </a>					
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            <?php	
			}
			?>
			
		</div>
		<!-- Modal content End-->
	</div>
</div>
<div class="modal fade mymodal" id="shortlist_modal" role="dialog" tabindex="-1">
	<div class="modal-dialog">
		<!-- Modal content Start-->
		<div class="modal-content">
			<?php
            if(isset($is_login) && $is_login!=0)
            {
            ?>
			<div class="modal-header" style="padding:5px 8px;">
				<button type="button" class="close" data-dismiss="modal"> <i class='fa fa-times fa-q'></i> </button>
			</div>
			<div class="modal-body" style="padding:15px;">
				<?php
				echo form_open(base_url()."common_request/member_short_unshort",array("name"=>"shortlist_form","id"=>"shortlist_form"));
				?>
				<input type="hidden" name="from_id" id="from_id" />
				<input type="hidden" name="to_id" id="to_id" />
				<input type="hidden" name="type" id="type" />
				<div id="shortlistedmember_errormsg"></div>
				<div id="shortlist_element">
					<div class="row margin-top-10">
						<div class="col-md-12">
							<div class="col-md-12 text-center">
								<h4></h4>
							</div>
						</div>
					</div>
					<div class="row margin-top-10">
						<div class="col-md-12 margin-top-10">
							<div class="col-md-12 text-center">
								<button type="submit" class="btn make-default-btn"> Yes</button>
								<button type="submit" class="btn make-dash-2" class="close" data-dismiss="modal"> No</button>
							</div>
						</div>
					</div>
				</div>
				<?php
				echo form_close();
				?>
			</div>
            <?php
			}
			else
			{
			?>
            	<div class="modal-header" style="padding:5px 8px;">
                    <button type="button" class="close" data-dismiss="modal"> <i class='fa fa-times fa-q'></i> </button>
                    <button class="close modalMinimize">  </button>
                    <h4 class="modal-title">Login</h4>
				</div>
                <div class="modal-body" style="padding:15px;">
                    <form name="MatriForm" class="form-horizontal" action="<?php echo base_url();?>login" method="post">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <h4>&nbsp;&nbsp;Please Login to access this feature.</h4>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-10">
                                <div class="col-md-1 col-xs-6">
                                    <a href="<?php echo base_url();?>login" class="btn btn-sm fb-btns"><b>Log In</b> </a>					
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            <?php
			}
			?>
			
		</div>
		<!-- Modal content End-->
	</div>
</div>
<div class="modal fade mymodal" id="blocklist_modal" role="dialog" tabindex="-1">
	<div class="modal-dialog">
		<!-- Modal content Start-->
		<div class="modal-content">
        	<?php
			if(isset($is_login) && $is_login!=0)
			{
			?>
			<div class="modal-header" style="padding:5px 8px;">
				<button type="button" class="close" data-dismiss="modal"> <i class='fa fa-times fa-q'></i> </button>
			</div>
			<div class="modal-body" style="padding:15px;">
				<?php
				echo form_open(base_url()."common_request/member_block_unblock",array("name"=>"blocklist_form","id"=>"blocklist_form"));
				?>
				<input type="hidden" name="from_id" id="from_id" />
				<input type="hidden" name="to_id" id="to_id" />
				<input type="hidden" name="type" id="type" />
				<div id="blocklistedmember_errormsg"></div>
				<div id="blocklist_element">
					<div class="row margin-top-10">
						<div class="col-md-12">
							<div class="col-md-12 text-center">
								<h4></h4>
							</div>
						</div>
					</div>
					<div class="row margin-top-10">
						<div class="col-md-12 margin-top-10">
							<div class="col-md-12 text-center">
								<button type="submit" class="btn make-default-btn"> Yes</button>
								<button type="submit" class="btn make-dash-2" class="close" data-dismiss="modal"> No</button>
							</div>
						</div>
					</div>
				</div>
				<?php
				echo form_close();
				?>
			</div>
             <?php
			}
			else
			{
			?>
            	<div class="modal-header" style="padding:5px 8px;">
                    <button type="button" class="close" data-dismiss="modal"> <i class='fa fa-times fa-q'></i> </button>
                    <button class="close modalMinimize">  </button>
                    <h4 class="modal-title">Login</h4>
				</div>
                <div class="modal-body" style="padding:15px;">
                    <form name="MatriForm" class="form-horizontal" action="<?php echo base_url();?>login" method="post">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <h4>&nbsp;&nbsp;Please Login to access this feature.</h4>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-10">
                                <div class="col-md-1 col-xs-6">
                                    <a href="<?php echo base_url();?>login" class="btn btn-sm fb-btns"><b>Log In</b> </a>					
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            <?php
			}
			?>
			
		</div>
		<!-- Modal content End-->
	</div>
</div>
<div class="modal fade mymodal" id="displaymessage_modal" role="dialog" tabindex="-1">
	<div class="modal-dialog">
		<!-- Modal content Start-->
		<div class="modal-content">
			<div class="modal-header" style="padding:5px 8px;">
				<button type="button" class="close" data-dismiss="modal"> <i class='fa fa-times fa-q'></i> </button>
			</div>
			<div class="modal-body" style="padding:15px;">
			<div id="displaymessage_element"></div>
			</div>
		</div>
		<!-- Modal content End-->
	</div>
</div>
<div class="modal fade mymodal" id="save_search_modal" role="dialog" tabindex="-1">
	<div class="modal-dialog">
		<!-- Modal content Start-->
		<div class="modal-content">
			<div class="modal-header" style="padding:5px 8px;">
				<button type="button" class="close" data-dismiss="modal"> <i class='fa fa-times fa-q'></i> </button>
				<h4 class="modal-title">Saved Search</h4>
			</div>
			<div class="modal-body" style="padding:15px;">
				<div id="savedsearch_message" style="display:none;"></div>
				<?php
				echo form_open(base_url()."search",array("name"=>"modal_saved_search_form","id"=>"modal_saved_search_form"));
				?>
				<div class="row">
					<div class="col-md-12">
						<p>Use a name which you can easily recall later as it will appear in My Saved Search feature of MY PROFILE menu to help you quickly search desired profiles without entering search details again.</p>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="saved_search_name">Saved Search Name</label>
							<input type="text" name="modal_saved_search_name" id="modal_saved_search_name" class="form-control" required="required" />
						</div>
					</div>
					<div class="col-md-12 text-right">
						<input type="submit" name="saved_search_name_btn" id="saved_search_name_btn" class="btn g-btns-4 margin-top-search padding-s back-search" value="Submit" />
						<button type="button" class="btn g-btns-4 margin-top-search padding-s" data-dismiss="modal"> Close</button>
					</div>
				</div>
				<?php
				echo form_close();
				?>
			</div>
		</div>
		<!-- Modal content End-->
	</div>
</div>
<div class="modal fade mymodal" id="show_protect_image_modal" role="dialog" tabindex="-1">
	<?php
    if(isset($is_login) && $is_login!=0)
    {
    ?>
	<div class="modal-dialog">
		<!-- Modal content Start-->
		<div class="modal-content">
			<div class="modal-header" style="padding:5px 8px;">
				<button type="button" class="close" data-dismiss="modal"> <i class='fa fa-times fa-q'></i> </button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body" style="padding:15px;">
				<div class="row">
					<div class="col-md-12" id="show_photo_protect_menu">
						<ul class="protect-view">
							<li>
								<div class="radio-search">
								   <label class="radio-box-search">
								   <input type="radio" name="photo_protect_type" id="photo_protect_type_p" value="p">
								   <span class="indicator"></span>
								   Click here if you have password
								   </label>
								</div>
							</li>
							<li>
								<div class="radio-search">
								   <label class="radio-box-search">
								   <input type="radio" name="photo_protect_type" id="photo_protect_type_r" value="r">
								   <span class="indicator"></span>
								   Send photo pass request
								   </label>
								</div>
							</li>
						</ul>
					</div>
					<div id="have_password_protect_ele" style="display:none;">
						<?php
						echo form_open(base_url()."common_request/show_photo_protect",array("name"=>"photo_protect_pwd_form","id"=>"photo_protect_pwd_form"));
						?>
						<input type="hidden" name="user_id" id="user_id" />
						<input type="hidden" name="to_id" id="to_id" />
						<div class="col-md-10 col-md-offset-1">
							<p>The Photo has been protected by the owner of this profile. Members are given the feature to protect their Photo from viewing by anyone. If the Photo is protected, then you need a Photo Password to view it.</p>
						</div>
						<div id="pwd_protect_error_page"></div>
						<div class="col-md-10 col-md-offset-1">
							<div class="form-group">
								<label for="protect_password">Password</label>
								<input type="password" name="protect_password" id="protect_password" class="form-control" required="required" />
							</div>
						</div>
						<div class="col-md-10 col-md-offset-1 text-right">
							<input type="submit" name="show_photo_btn" id="show_photo_btn" class="btn g-btns-4 margin-top-search padding-s back-search" value="Submit" />
							<button type="button" class="btn g-btns-4 margin-top-search padding-s" id="dont_pwd_btn"> Don't have password</button>
						</div>
						<?php
						echo form_close();
						?>
					</div>
					<div id="pwd_protect_request_error_msg"></div>
					<div id="send_password_req_ele" style="display:none;">
						<?php
						echo form_open(base_url()."common_request/send_photo_protect",array("name"=>"send_pass_req_form","id"=>"send_pass_req_form"));
						?>
						<input type="hidden" name="user_id" id="user_id" />
						<input type="hidden" name="to_id" id="to_id" />
						
						<div class="col-md-12">
							<ul class="protect-view">
								<li>
									<div class="radio-search">
									   <label class="radio-box-search">
									   <input type="radio" name="msg" id="msg1" value="I am interested in your profile. I would like to view photo now, send me password." required="required" />
									   <span class="indicator"></span>
									   I am interested in your profile. I would like to view photo now, send me password.
									   </label>
									</div>
								</li>
								<li>
									<div class="radio-search">
									   <label class="radio-box-search">
									   <input type="radio" name="msg" id="msg2" value="We found your profile to be a good match. Please send me Photo password to proceed further." required="required" />
									   <span class="indicator"></span>
									   We found your profile to be a good match. Please send me Photo password to proceed further.
									   </label>
									</div>
								</li>
							</ul>
						</div>
						<div class="col-md-10 col-md-offset-1 text-right">
							<input type="submit" name="show_photo_btn" id="send_photo_req_btn" class="btn g-btns-4 margin-top-search padding-s back-search" value="Send" />
							<button type="button" class="btn g-btns-4 margin-top-search padding-s" id="have_pwd_btn"> Cancel</button>
						</div>
						<?php
						echo form_close();
						?>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal content End-->
	</div>
    <?php
	}
	else
	{
	?>
    <div class="modal-header" style="padding:5px 8px;">
        <button type="button" class="close" data-dismiss="modal"> <i class='fa fa-times fa-q'></i> </button>
        <button class="close modalMinimize">  </button>
        <h4 class="modal-title">Login</h4>
    </div>
    <div class="modal-body" style="padding:15px;">
        <form name="MatriForm" class="form-horizontal" action="<?php echo base_url();?>login" method="post">
            <div class="form-group">
                <div class="col-sm-12">
                    <h4>&nbsp;&nbsp;Please Login for access this feature.</h4>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-10">
                    <div class="col-md-1 col-xs-6">
                        <a href="<?php echo base_url();?>login" class="btn btn-sm fb-btns"><b>Log In</b> </a>					
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php
	}
	?>
</div>