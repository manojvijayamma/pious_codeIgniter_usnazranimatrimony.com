<!-- ======== <div class="container"> Start======== -->
    <div class="container margin-top-30" id="first_div">
        <div>
            <div class="signup-screen col-md-4 col-sm-6 col-sm-offset-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bg-blue text-center form-header-title">
                            <h3 class="text-white"><i class="fa fa-lock font-18"></i> Login</h3>
                        </div>
                        <form action="<?php echo $base_url; ?>login/check_login" method="post" id="login_form" name="login_form">
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
								<?php
									if($this->session->flashdata('user_log_out'))
									{
								?>
								<div class="alert alert-success" id="log_out_succ">
									<?php echo $this->session->flashdata('user_log_out'); ?>
								</div>
								<?php
									}
								?>
                                <div class="col-md-12 margin-top-20">
                                    <div class="md-form font-15 margin-top-10 text-darkgrey">
                                        <label>Enter your Email ID or Matri ID: </label>
                                        <input type="text" class="form-control" required name="username" id="username" />
                                    </div>
                
                                    <div class="font-16 margin-top-20 text-darkgrey">
                                        <label>Enter Password: 
										<!--<span class="tooltip_stay"><span class="text-left help-img-normal"></span> <span class="tooltiptext">Create Strong Password, user symbol like (',' & / + - *  @ # $ !)</span></span>-->
										</label>
                                        <input type="password" class="font-weight-normal text-grey form-control" required name="password" id="password" />
                                    </div>
                                    <div class="font-16 margin-top-20 text-darkgrey margin-bottom-10">
                                    	<div class="row">
                                    		<div class="col-md-5 col-sm-5 col-xs-12">
                                    			<img src="<?php echo $base_url; ?>captcha.php?captch_code_front=yes&captch_code=<?php echo $this->session->userdata['captcha_code']; ?>" class="" alt="" />
                                    		</div>
                                    		<div class="col-md-7 col-sm-7 col-xs-12">
                                    			<input required type="number" name="code_captcha" id="code_captcha" class="font-weight-normal text-grey form-control tufelmargin-5" placeholder="Enter Captcha Code" value="" /> 
                                    		</div>
                                    	</div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!--<div class="row">
                                                <input type="checkbox" name="remember_me" id="remember_me" value="Yes" class=""> <label for="363" class="radio-clr font-13-normal margin-top-3">Remember Me </label> <span class="tooltip_stay"><span class="text-left help-img-normal"></span> <span class="tooltiptext">We Recommended that you do not use this Feature if you are signing in form a shared Computer. </span></span>
                                                    
                                                    
                                                </div>-->
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row pull-right">
                                                    <p class=" underline"><a href="<?php echo $base_url; ?>login/forgot-password" class="text_slider">Forgot Password ?</a></p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="clearfix"></div>
                                    
                                    <div class="margin-top-30 text-center">
                                    	<input type="submit" class="btn btn-block text-white btn-deep-purple font-13" value="Login" >
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" class="hash_tocken_id" />
                                        <input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />
                                        <input type="hidden" name="is_post" id="is_post" value="1" />
             				
                                        <!--<a href="javascript:;" id="next_form" class="btn btn-block text-white btn-deep-purple font-13">Login <i class="fa fa-chevron-right"></i></a>-->
                                        <h4 class="text-center font-13">New Member? <a href="<?php echo $base_url; ?>register" class="text_slider">Register Free </a></h4>
                                        <?php /*?><h4 class="text-center font-13">Sign In with <i class="fa fa-facebook-square" style="color: #4c68a1;"></i> <a href="javascript:void(0)" onClick="logInWithFacebook()" style="color: #2a4c92 !important;" >Facebook</a></h4><?php */?>
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
    <div id="lightbox-panel-mask"></div>
<div id="lightbox-panel-loader" style="text-align:center"><img alt="Please wait.." title="Please wait.." src='<?php echo $base_url; ?>assets/front_end/images/loading.gif' /></div>
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
$client_key = "";
if(isset($fb_detail['client_key']) && $fb_detail['client_key']!=''){
	$client_key = $fb_detail['client_key']; 
}
?>
<!-- ======== <div class="container"> End ======== -->
    <script src="<?php echo $base_url; ?>assets/front_end/js/jquery.min.js?ver=1.0"></script>
    <script src="<?php echo $base_url; ?>assets/front_end/js/bootstrap.min.js?ver=1.0"></script>
    <script src="<?php echo $base_url; ?>assets/front_end/js/jquery.sticky.js?ver=1.4"></script>
    <script>
    	if($("#login_form").length > 0)
		{
			$("#login_form").validate({
				submitHandler: function(form)
				{
					//return true;
					check_validation();
				}
			});
		}
		function check_validation()
		{
			var username = $("#username").val();
			var password = $("#password").val();
			var code_captcha = $("#code_captcha").val();
			show_comm_mask();
			var hash_tocken_id = $("#hash_tocken_id").val();
			var base_url = $("#base_url").val();
			var url = base_url+"login/check-login";
			$("#log_out_succ").hide();
			$("#login_message").hide();
			$.ajax({
			   url: url,
			   type: "post",
			   data: {'username':username,'password':password,'<?php echo $this->security->get_csrf_token_name(); ?>':hash_tocken_id,'is_post':0,'code_captcha':code_captcha},
			   dataType:"json",
			   success:function(data)
			   {
					if(data.status == 'success')
					{
						if(data.plan_id != ''){
							window.location.href = base_url+"premium-member/buy-now/"+data.plan_id;
						}else{
							window.location.href = base_url+"my-profile";
						}
						return false;
					}
					else
					{
						$("#login_message").html(data.errmessage);
						$("#login_message").slideDown();
						$("#hash_tocken_id").val(data.token);
					}
					hide_comm_mask();
			   }
			});
			return false;
		}
		$(document).ready(function(){
		setTimeout(function() {
			$('#log_out_succ').fadeOut('fast');
			}, 10000);
		});
    </script>
    
	 <script>
            logInWithFacebook = function() {
                FB.login(function(response) {
                    if (response.authResponse) {
                        //alert('You are logged in & cookie set!');
                        // Now you can redirect the user or do an AJAX request to
                        // a PHP script that grabs the signed request from the cookie.
                        window.location.href = "<?php echo $base_url; ?>register/fb_signup";
                    } else {
                        //alert('User cancelled login or did not fully authorize.');
                    }
                });
                return false;
            };
            window.fbAsyncInit = function() {
                FB.init({
                    appId: '<?php echo $client_key;?>',
                    cookie: true, // This is important, it's not enabled by default
                    version: 'v2.10'
                });
            };
        
            (function(d, s, id){
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {return;}
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
	</body>
</html>