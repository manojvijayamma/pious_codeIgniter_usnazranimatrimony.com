<!------------------<div class="container">----Start-------------------->
<div class="container margin-top-10 padding-lr-zero-xs">
	<!--<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-0-5-xs">
		<div class="">
		<img src="<?php echo $base_url; ?>assets/front_end/images/icon/register-header-female.jpg" class="full-width img-thumbnail" alt=""> 
		</div>
	</div>-->
	<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 margin-top-20 padding-0-5-xs">
		<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-5">
			<?php $this->load->view('front_end/my_profile_sidebar'); ?>
		</div>
		<div class="xxl-12 xl-12 l-11 xs-16 m-16 s-16 padding-lr-zero-320 margin-top-10px-320px padding-lr-zero-480 margin-top-10px-480px ne-mrg-top-10-768 padding-0-5-xs">
			<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 bg-border padding-top-0" style="padding:4px;">
				<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-top-0">
					<div class="row">
						<h3 class="upgrade-heading text-center font-18 font-weight-normal" style="padding:10px 0;">
							<img src="<?php echo $base_url; ?>assets/front_end/images/icon/admin-contact.png" alt=""> Contact To Admin
						</h3>
					</div>
				</div>
                <div class="clearfix"></div>
				<div align="center">
					<h4 class="text-center">
						<?php
							if($this->session->flashdata('success_message'))
							{
							?>
							<div class="alert alert-success" id="admin_contact"><?php
							echo $this->session->flashdata('success_message'); ?>
							</div>
							<?php
							}
						?>
					</h4>
				</div>
				<div align="center">
					<h4 class="text-center">
						<?php
							if($this->session->flashdata('message_for_user'))
							{
							?>
							<div class="alert alert-danger"><?php
							echo $this->session->flashdata('message_for_user'); ?>
							</div>
							<?php
							}
						?>
					</h4>
				</div>
				<div role="alert" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 alert" style="background:#fcf8e3;border:1px solid #faebcc; color: #8a6d3b;">
                    <p class="margin-top-10px margin-bottom-10px">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
						</button>
                        Ask if have any type of query on our site or any type of enquiry please feel free to contact admin.
					</p>
				</div>
				<div class="xxl-16 xl-16 m-16 s-16 xs-16 l-16 margin-top-10px margin-bottom-10px text-grey text-center bold font-13">
					Please Write Your Query :
				</div>
				
				<div class="xxl-16 xl-16 m-16 s-16 xs-16 l-16 margin-bottom-20">
					<form action="<?php echo $base_url; ?>contact/send_msg_admin" method="post" name="contact_admin" id="contact_admin" enctype="multipart/form-data">
						<div class="xxl-16 xl-16 m-16 s-16 xs-16 l-16 form-group padding-lr-zero-xs">
							<textarea class="form-control border-radius-5px" placeholder="Enter Your Message Here" rows="8" style="box-shadow:3px 3px 0 0 #e2e2e2;" name="message" id="message" required></textarea>
						</div>
						<div class="xxl-16 xl-16 m-16 s-16 xs-16 l-16 form-group">
							<div class="xxl-4 xxl-margin-left-6 xl-6 xl-margin-left-1 xs-16 s-16 m-8 l-8 padding-lr-zero-xs">
                            	<button type="submit" class="btn xxl-16 xl-16 xs-16 m-16 l-16"><i class="fa fa-paper-plane"></i> Send Message</button>
							</div>
							<div class="xxl-5 xxl-margin-left-2 xl-6 xl-margin-left- xs-16 s-16 m-8 l-8 padding-lr-zero-xs"></div>
						</div>
						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" />
					</form>
				</div>
			</div>
		</div>
		<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-4 hidden-lg hidden-md">
			<?php $this->load->view('front_end/mobile_my_profile_sidebar'); ?>
		</div>
	</div>
</div>
</div>
<div class="clearfix"></div> 


<!------------------<div class="container">----End-------------------->
<?php
	$this->common_model->js_extra_code_fr.="
	function change_img(id)
	{	
	var className = $('#img_'+id).attr('class');		
	if(className =='collapse-plus')
	{
	$('#img_'+id).attr('class','collapse-minus');
	}
	else
	{
	$('#img_'+id).attr('class','collapse-plus');				
	}
	}	
	if($('#contact_admin').length > 0)
	{
	$('#contact_admin').validate({
	submitHandler: function(form)
	{
	return true;
	//submit_contact_us();
	setTimeout(function() {
	$('#admin_contact').fadeOut('fast');
	}, 10000);
	}
	});
	}
	$(document).ready(function () {
	$('#test').BootSideMenu({
	side: 'left',
	pushBody:false,
	width: '250px'
	});
	$(".'"'."[data-toggle='tooltip']".'"'.").tooltip();
	}); 
	
	$(function(){
    setTimeout(function() {
	$('#admin_contact').fadeOut('fast');
	}, 10000);
	
	});
	";
	?>	