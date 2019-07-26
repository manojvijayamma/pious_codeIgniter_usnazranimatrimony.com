<!-- =======<div class="container"> ======= -->	
    <div class="clearfix margin-top-30"></div>		
    <div class="container margin-top-30 hidden-xs hidden-xsm">
        <div class="margin-top-30"></div>
    </div>
    <div class="clearfix"></div>
    <div class="container margin-top-30">
        <div>
            <div class="signup-screen col-sm-4 col-sm-offset-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bg-blue text-center form-header-title">
                            <h3 class="text-white"><i class="fa fa-key font-18"></i> Forgot Password</h3>
                        </div>
                        <form action="<?php echo $base_url; ?>login/check-email-forgot" method="post" id="login_form" name="login_form">
                        <div class="card">
                            <div class="">
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
					            <div class="alert alert-success" id="login_message_succ" style="display:none"></div>
                                <div class="col-md-12 margin-top-20">
                                    <div class="md-form font-15 margin-top-10 text-darkgrey">
                                    <label>Enter your Email ID: <span class="tooltip_stay"><span class="text-left help-img-normal"></span> <span class="tooltiptext">If you forgot the Password than simple type ypur email ID, than get Reset password Link on your Email. </span></span></label>
                                        <input class="form-control" required type="email" name="username" id="username" autofocus />
                                    </div>
                                    <div class="font-16 margin-top-20 text-darkgrey margin-bottom-10">
                                        
                                        <img src="<?php echo $base_url; ?>captcha.php?captch_code_front=yes&captch_code=<?php echo $this->session->userdata['for_captcha_code']; ?>" alt=""/>
                                        <input required type="number" name="code_captcha" id="code_captcha" class="font-weight-normal text-grey form-control" style="width:170px;float:right" placeholder="Enter Captcha Code" value="" />                                    </div>
                                    <div class="clearfix"></div>
                                    
                                    <div class="margin-top-30 margin-bottom-10 text-center">
                                        <input type="submit" class="btn btn-block text-white btn-deep-purple font-13" value="Reset Password" >
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" />
                                        <input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />
                                        <input type="hidden" name="is_post" id="is_post" value="1" />
                                        <!--<a href="javascript:;" id="next_form" class="btn btn-block text-white btn-deep-purple font-13">Reset Password <i class="fa fa-chevron-right"></i></a>-->
                                    </div>
                                    <div class="row">
                                    	<div class="col-md-6"></div>
                                    	<div class="col-md-6">
                                        <div class="row pull-right">
                                            <p class=" underline"><a href="<?php echo $base_url; ?>login" class="text_slider">Login ?</a></p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
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
}?>
<!-- ===== <div class="container">===== -->
	<script src="<?php echo $base_url; ?>assets/front_end/js/jquery.min.js?ver=1.0"></script>		
    <script src="<?php echo $base_url; ?>assets/front_end/js/bootstrap.min.js?ver=1.0"></script>
    <script src="<?php echo $base_url; ?>assets/front_end/js/jquery.sticky.js?ver=1.4"></script>

<script>
$("#login_form").validate({
  submitHandler: function(form) 
  {
	check_validation();
  }
});
function check_validation()
{
    var username = $("#username").val();
	var code_captcha = $("#code_captcha").val();
    show_comm_mask();
    var hash_tocken_id = $("#hash_tocken_id").val();
    var base_url = $("#base_url").val();
    var url = base_url+"login/check_email_forgot";
	$("#log_out_succ").hide();
	$("#login_message_succ").hide();
	$("#login_message").hide();
    $.ajax({
       url: url,
       type: "post",
       data: {'username':username,'<?php echo $this->security->get_csrf_token_name(); ?>':hash_tocken_id,'is_post':0,'code_captcha':code_captcha},
       dataType:"json",
       success:function(data)
       {
            //alert(data.status);
            if(data.status == 'success')
            {
				$("#login_message_succ").html(data.errmessage);
                $("#login_message_succ").slideDown();
                ///window.location.href = base_url+"dashboard";
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
</script>
 </body>
</html>