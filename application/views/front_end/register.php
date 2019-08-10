<?php

$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http").'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

$franchise_by = $this->common_model->get_count_data_manual('franchise',array('referral_link'=>$url,'status'=>'APPROVED','is_deleted'=>'No'),1,'id');



$member_fb_data = $this->session->userdata('member_fb_data');

$fb_id = '';

$birth_date = '';

if($member_fb_data != '')

{	

	$fb_id = $member_fb_data['FBID'];

	$fb_first_name = $member_fb_data['fb_first_name'];

	$fb_last_name = $member_fb_data['fb_last_name'];

	$fb_email = $member_fb_data['fb_email'];

	$fb_image = $member_fb_data['fb_image'];
	$other_caste=$member_fb_data['other_caste'];

	$fb_image_name = isset($member_fb_data['fb_image_name']) ? $member_fb_data['fb_image_name'] : '';

	if(isset($member_fb_data['month']) && $member_fb_data['month'] !='' && isset($member_fb_data['day']) && $member_fb_data['day'] !=''  && isset($member_fb_data['year']) && $member_fb_data['year'] !='' )

	{

		$birth_date = $member_fb_data['year'].'-'.$member_fb_data['month'].'-'.$member_fb_data['day'].'-';

	}

}

?>

<div class="clearfix"></div>

<!-- ======== <div class="container"> Start =========== -->

<div class="container margin-top-30" id="first_div">

        <div>

            <div class="signup-screen col-sm-4 col-sm-offset-4 margin-bottom-10-xs">

                <div class="row">

                    <div class="col-md-12">

                        <div class="bg-blue text-center form-header-title">

                            <h3 class="text-white"> Register for FREE</h3>

                        </div>

                        <form method="post" id="register_step1" name="register_step1" action="<?php echo $base_url; ?>register/save-register">

                        <input type="hidden" name="fb_id" id="fb_id" value="<?php if(isset($fb_id) && $fb_id !=''){echo $fb_id;}?>" />

                        <?php

                        if(isset($fb_image_name) && $fb_image_name !='')

                        {

							$photo1_uploaded_on = $this->common_model->getCurrentDate();

						?>

                        <input type="hidden" name="photo1" id="photo1" value="<?php if(isset($fb_image_name) && $fb_image_name !=''){echo $fb_image_name;}?>" />

                        <input type="hidden" name="photo1_uploaded_on" id="photo1_uploaded_on" value="<?php if(isset($photo1_uploaded_on) && $photo1_uploaded_on !=''){echo $photo1_uploaded_on;}?>" />

                        

                        <?php

						}

						?>

                        

                        <div class="card">

                            <div class="">

                                <div class="col-md-12">

                                	<div class="clearfix"></div>

                                    <div id="reponse_message_step1" style="margin-bottom: 0px;"></div>

                                    <div class="clearfix"></div>

                                    <?php

									if($this->session->flashdata('error_message'))

									{

									?>

									<div class="alert alert-danger"><?php

										echo $this->session->flashdata('error_message'); ?>

									</div>

									<?php

										}

									?>

                                    <div class="row margin-top-30 text-darkgrey">

                                        <div class="col-md-5 margin-top-5">

                                            <label>Gender:&nbsp;<mark style="background-color: #ffffff;">(Select)</mark></label>

                                        </div>

                                        <div class="col-md-7">

                                            <div class="btn-group">

                                                <div id="radioBtn" class="btn-group">

                                                    <a class="btn btn-primary btn-sm <?php if(isset($_REQUEST['gender']) && $_REQUEST['gender'] =='Female'){ echo "notActive";} else { echo "active";}?> col-md-6 font-10 bold" data-toggle="gender" data-title="Male" style="box-shadow:none;padding:7px 13px;border-top-left-radius:3px;border-bottom-left-radius:3px;"> <img src="<?php echo $base_url; ?>assets/front_end/images/icon/male.png" class="" alt=""/> Male</a>

                                                    <a class="btn btn-primary btn-sm <?php if(isset($_REQUEST['gender']) && $_REQUEST['gender'] =='Female'){ echo "active";} else { echo "notActive";}?> col-md-6 font-10 bold" data-toggle="gender" data-title="Female" style="box-shadow:none;padding:7px 8px;border-top-right-radius:3px;border-bottom-right-radius:3px;"> <img src="<?php echo $base_url; ?>assets/front_end/images/icon/woman.png" class="" alt=""/> Female</a>

                                                </div>

                                                <input type="hidden" name="gender" id="gender" value="<?php if(isset($_REQUEST['gender']) && $_REQUEST['gender'] !=''){ echo $_REQUEST['gender'];}else{ echo "Male";}?>" />

                                            </div>

                                        </div>

                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="md-form font-15 margin-top-10 text-darkgrey">

                                        <label>Enter your Email ID <span class="font-red">* </span>: </label>

                                        <input type="email" class="form-control" required name="email" id="email" value="<?php if(isset($_REQUEST['email']) && $_REQUEST['email'] !=''){ echo $_REQUEST['email'];} elseif(isset($fb_email) && $fb_email !=''){ echo $fb_email; } ?>" />

                                        <input type="hidden" name="email_varifired" id="email_varifired" value="0" />

                                        <input type="hidden" name="is_post" id="is_post" value="1" />

                                    </div>

                					<div class="md-form font-15 margin-top-10 text-darkgrey">

                                        <label style="float:left">Enter your Mobile <span class="font-red">* </span>: </label>

                                        <div class="clearfix"></div>

                                        <div style="width:50% !important;float:left">

                                        <select name="country_code" id="country_code" class="form-control select2">

										<?php if(isset($_REQUEST['country_code']) && $_REQUEST['country_code'] !=''){ echo $val=$_REQUEST['country_code'];}else{ echo $val='+91';}?>

                                        	<option value="Select Country Code">Select Country Code</option>

											<?php echo $this->common_model->country_code_opt($val);?>

                                        </select>

                                        </div>

                                        <input type="text" class="form-control" required name="mobile_number" id="mobile_number" minlength="7" maxlength="15"  style="width:50%;float:left" value="<?php if(isset($_REQUEST['mobile_number']) && $_REQUEST['mobile_number']!=''){ echo $_REQUEST['mobile_number'];}?>"/>

                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="md-form font-16 margin-top-10 text-darkgrey">

                                        <label>Create a Password <span class="font-red">* </span>: <span class="tooltip_stay"><span class="text-left help-img-normal"></span> <span class="tooltiptext">Create Strong Password, user symbol like (',' & / + - *  @ # $ !)</span></span></label>

                                        <input type="password" class="font-weight-normal text-grey form-control"  required name="password" id="password" minlength="6"  value="<?php if(isset($_REQUEST['password']) && $_REQUEST['password']!=''){ echo $_REQUEST['password'];}?>"/>

                                    </div>

                                    <div class="margin-top-10 text-center">

                                    	<button class="btn btn-block text-white btn-deep-purple font-13">Next <i class="fa fa-chevron-right"></i></button>

                                        <h4 class="text-center font-13">Already a Member? <a href="<?php echo $base_url; ?>login" class="text_slider">Login</a></h4>

                                        <?php /*?><h4 class="text-center font-13">Sign UP with <i class="fa fa-facebook-square" style="color: #4c68a1;"></i> <a href="javascript:void(0)" onClick="logInWithFacebook()" style="color: #2a4c92 !important;" >Facebook</a></h4><?php */?>

                                    </div>

                                </div>

                            </div>

                        </div>

							<input type="hidden" name="status_front_page" id="status_front_page" value="<?php if(isset($_REQUEST['status_front_page']) && $_REQUEST['status_front_page']!=''){ echo $_REQUEST['status_front_page'];}?>">	

                        	<input type="hidden" name="id" id="id" value="" />

                            <input type="hidden" name="mode" id="mode" value="add" />

                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id"  class="hash_tocken_id" />

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

	<div class="container margin-top-10" style="display:none;" id='second_div'>

        <div>

            <div class="signup-screen col-sm-4 col-sm-offset-4 margin-bottom-10-xs" style="padding:10px 20px 5px 20px;">

                <div class="row">

                    <div class="col-md-12">

                        <form method="post" id="register_step2" name="register_step2" action="<?php echo $base_url; ?>register/save-register">

                        <div class="card">

                            <div class="">

                                <div class="col-md-12">

                                    <div class="text-center">

                                        <h3 class="text-darkgrey"> Add Some Basic Details</h3>

                                        <div class="colorgraph"></div>

                                    </div>

                                    <div class="clearfix"></div>

                                    <div id="reponse_message"></div>

                                    <div class="md-form font-15 margin-top-20 text-darkgrey">

                                        <label>Enter First Name <span class="font-red">* </span>:</label>

                                        <input type="text" class="form-control" required name="firstname" id="firstname" value="<?php if(isset($_REQUEST['firstname']) && $_REQUEST['firstname']!=''){ echo $_REQUEST['firstname'];}elseif(isset($fb_first_name) && $fb_first_name !=''){ echo $fb_first_name; } ?>" />

                                    </div>

                                    <div class="md-form font-15 margin-top-20 text-darkgrey">

                                        <label>Enter Last Name <span class="font-red">* </span>:</label>

                                        <input type="text" class="form-control" required name="lastname" id="lastname" value="<?php if(isset($_REQUEST['lastname']) && $_REQUEST['lastname']!=''){ echo $_REQUEST['lastname'];}elseif(isset($fb_last_name) && $fb_last_name !=''){ echo $fb_last_name; } ?>" />

                                    </div>

                                    <div class="text-darkgrey margin-top-10">

                                        <label>Date of Birth <span class="font-red">* </span>:</label>

                                        <div class="row" style="padding-left:15px;padding-right:15px;">

                                            <?php echo $this->common_model->birth_date_picker($birth_date);?>                                        

                                        </div>

                                    </div>

                                    

                                    <div class="text-darkgrey margin-top-10">

                                        <label>Catholic Community<span class="font-red">* </span>:</label>

                                        <select class="form-control" required name="religion" id="religion" style="width:100%" onChange="dropdownChange('religion','caste','caste_list')">

                                            <option value="">Select Catholic Community</option>

											<?php echo $this->common_model->array_optionstr($this->common_model->dropdown_array_table('religion'));?>

                                        </select>

                                    </div>

                                    

                                    <div class="text-darkgrey margin-top-10">

                                        <label>Diocese <span class="font-red"> </span>:</label>

                                        <select class="form-control"  name="caste" id="caste" style="width:100%">

                                            <option value="">Select Your Catholic Community First</option>

                                        </select>

                                    </div>


									<div class="md-form font-15 margin-top-20 text-darkgrey">
                                        <label>If Other Diocese <span class="font-red"></span>:</label>
                                        <input type="text" class="form-control"  name="other_caste" id="other_caste" value="<?php if(isset($_REQUEST['other_caste']) && $_REQUEST['other_caste']!=''){ echo $_REQUEST['other_caste'];}elseif(isset($other_caste) && $other_caste !=''){ echo $other_caste; } ?>" />
                                    </div>

                                    

                                    <div class="margin-top-10">

											<input id="345" type="checkbox" value="Yes" name="terms" class="">

											<label for="345" class="font-13-normal text-grey margin-top-0 padding-lr-zero" style="display: inline;">By Register, you agree to our <a href="javascript:;" data-toggle="modal" data-target="#termsandconditions" id="tandc">Terms & Condition</a></label> 

											

											<!-- <span class="tooltip_stay"><span class="text-left help-img-normal"></span> 

											<span class="tooltiptext">Choosing this option will display profiles who are willing to marry into any caste. <br/><br/> <strong>Note:</strong> Number of results might be less if you select this option.</span></span> -->

                                    	<!-- <h4 class="font-13 font-weight-normal">By Register, you agree to our <a target="_blank" href="<?php echo $base_url; ?>terms-condition">Terms & Conditions</a></h4> -->

                                        <button class="btn btn-block text-white btn-deep-purple font-13">Register Now <i class="fa fa-chevron-right"></i></button>

                                        <a href="javascript:;" onClick="back_tostep()" >Back</a>

                                        <!--<a href="register_second.html" class="btn btn-sm btn-block text-white font-13">Register <i class="fa fa-chevron-right"></i></a>-->                                        

                                    </div>

                                </div>

                            </div>

                        </div>

                        	<input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />

                            <input type="hidden" name="id" id="id" value="" />

                            <input type="hidden" name="mode" id="mode" value="add" />

                            <input type="hidden" name="franchised_by" id="franchised_by" value="<?php if(isset($franchise_by['id']) && $franchise_by['id']!=''){echo $franchise_by['id'];}?>">

                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id"  class="hash_tocken_id" />

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

	}

	$client_key = "";

	if(isset($fb_detail['client_key']) && $fb_detail['client_key']!=''){

		$client_key = $fb_detail['client_key'];

	}

	?>

	<div id="termsandconditions" class="modal fade in" role="dialog" style="display: none; padding-right: 17px;">

                    <div class="modal-dialog" style="width:1000px;">

                        <div class="modal-content">

                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal">×</button>

                                <h4 class="modal-title"><i class="fa fa-lock"></i> Terms and Conditions</h4>

                            </div>

                            <div class="modal-body">

                                <div class="alert alert-danger" style="display:none" id="error_message_mv"></div>

                                <div class="alert alert-success" style="display:none" id="success_message_mv"></div>

                                <div id="displ_mobile_generate">

								<?php if(isset($cms_pages['page_content']) && $cms_pages['page_content'] !='')

                            {	

                                echo $cms_pages['page_content'];

                            }

                            else

                            {	?>

                            <div class="col-md-4 col-sm-12 col-xs-12">

                                <div class="padding-lr-zero-xs" style="margin-bottom:0px;">

                                    <div class="new_reg">

                                        <header class="header_bg" style="margin-bottom:0px;">

                                            <h1 style="margin: 0px !important;">No Data Available</h1>

                                        </header> 

                                    </div>

                                </div>

                            </div>

                        <?php }?>  

                                </div>                               

                            </div>

                            <div class="modal-footer" id="close_buttonn_div" style="display:block">

                                <a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</a>

                            </div>

                        </div>

                    </div>

                </div>

	<!-- ========= <div class="container"> End =========-->	

    <script src="<?php echo $base_url; ?>assets/front_end/js/jquery.min.js?ver=1.0"></script>		

    <script src="<?php echo $base_url; ?>assets/front_end/js/bootstrap.min.js?ver=1.0"></script>

    <script src="<?php echo $base_url; ?>assets/front_end/js/jquery.sticky.js?ver=1.0"></script>

    <script src="<?php echo $base_url; ?>assets/front_end/js/select2.min.js?ver=1.0"></script>

    <script src="<?php echo $base_url; ?>assets/front_end/js/common.js?ver=1.0"></script>

    <script src="<?php echo $base_url; ?>assets/front_end/js/additional-methods.min.js?ver=1.0"></script>

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

		<script>

		<!-----------------Gender Radio Button-------------------->

		$('#radioBtn a').on('click', function(){

			var sel = $(this).data('title');

			var tog = $(this).data('toggle');

			$('#'+tog).prop('value', sel);

			$('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');

			$('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');

		});

		

		$( document ).ready(function() {

			var gender = $('#gender').val();

			var email = $('#email').val();

			var mobile_number = $('#mobile_number').val();

			var password = $('#password').val();

			var status_front_page = $('#status_front_page').val();

			

			if(gender!='' && mobile_number!='' && password!='' && email!='' && status_front_page=='Yes')

			{

				//$( "#next_auto_step" ).trigger("click");

				$( "#second_div" ).css("display","block");

				$( "#first_div" ).hide(); 

			}

		});

		$( "#next_form" ).click(function() {

		$( "#second_div" ).css("display","block");

		$( "#first_div" ).hide();

	});

	//back_tostep();

	function back_tostep(){

		$( "#second_div" ).hide();

		$( "#first_div" ).css("display","block");

       // $( "#second_div" ).hide();

	}

	$('select').select2();

	if($("#register_step1").length > 0){

		$("#register_step1").validate({

			rules: {

				mobile_number: {

				  required: true,

				  number: true

				},

			},			 

			submitHandler: function(form){

				//return true;

				/*if($("#email_varifired").val() == 0 && $("#email").val() !=''){

					$("#email-error").text('Duplicate Email address found, please enter another one');

					$("#email-error").show();

					$("#email").addClass('error');

					return false;

				}*/

				/*var validator = $( "#register_step1" ).validate();

				alert(validator);

				validator.showErrors({

				  "mobile_number": "I know that your firstname is Pete, Pete!"

				});*/

				var mobile_number = $("#mobile_number").val();

				if(mobile_number !='')

				{

					var isnum = /^\d+$/.test(mobile_number);

					if(!isnum)

					{

						alert("Please enter valid number only");

						$("#mobile_number").val('');

						$("#mobile_number").focus();

						return false;

					}

				}

				var form_data = $('#register_step1').serialize();

				form_data = form_data+ "&is_post=0";

				var action = "<?php echo $base_url; ?>register/check_duplicate";

				show_comm_mask();

				$.ajax({

				   url: action,

				   type: "post",

				   dataType:"json",

				   data: form_data,

				   success:function(data)

				   {

					    $("#reponse_message_step1").removeClass('alert alert-success alert-danger');

						$("#reponse_message_step1").html(data.errmessage);

						$("#reponse_message_step1").slideDown();

						update_tocken(data.tocken);

						hide_comm_mask();

						if(data.status == 'success')

						{

							$("#reponse_message_step1").html('');

							$( "#second_div" ).css("display","block");

					        $( "#first_div" ).hide();

						}

						else

						{

							$("#reponse_message_step1").addClass('alert alert-danger');

						}

				   }

				});

				return false;

			}

		});

	}

	if($("#register_step2").length > 0)

	{

		$("#register_step2").validate({

			rules: {

				firstname: {

				  required: true,

				  lettersonly: true

				},

				lastname: {

				  required: true,

				  lettersonly: true

				},

			 },

			submitHandler: function(form)

			{

				//return true;
				var caste=$('#caste').val();
				var other_caste=$('#other_caste').val();
				if(caste=="" & other_caste==""){
					$("#reponse_message").removeClass('alert alert-success alert-danger');
					$("#reponse_message").html("Diocese or Other Diocese is required");	
					return false;
				}

				var form_data = $('#register_step1, #register_step2').serialize();

				form_data = form_data+ "&is_post=0";

				var action = $('#register_step2').attr('action');

				show_comm_mask();

				$.ajax({

				   url: action,

				   type: "post",

				   dataType:"json",

				   data: form_data,

				   success:function(data)

				   {

					   $("#reponse_message").removeClass('alert alert-success alert-danger');

						$("#reponse_message").html(data.errmessage);

						$("#reponse_message").slideDown();

						update_tocken(data.tocken);

						hide_comm_mask();

						if(data.status == 'success')

						{

							is_reload_page = 1;

							$("#reponse_message").addClass('alert alert-success');

							document.getElementById('register_step2').reset();

							var red_url = '';

							setTimeout(function(){

								window.location.href = $("#base_url").val()+'register/step2';

							},5000);

						}

						else

						{

							$("#reponse_message").addClass('alert alert-danger');

						}

				   }

				});

				return false;

			}

		});

	}

	</script>

    

	<div class="clearfix"></div>

	<!-- <div id="lightbox-panel-mask"></div> -->

	<div id="lightbox-panel-loader" style="text-align:center">

	<img alt="Please wait.." title="Please wait.." src="<?php echo $base_url; ?>assets/front_end/images/loading.gif" />

	</div>

	

	</body>

</html>