<?php $this->common_model->extra_js_fr[] = 'js/additional-methods.min.js'; ?>
<!-- ====== <div class="container"> Start====== -->	
   <div class="tp-page-head hidden-xs">
		<div class="container">
			<div class="row">
				<div class="col-md-offset-2 col-md-8">
					<div class="page-header text-center">
						<div class="icon-circle">
							<i class="icon icon-size-60 icon-loving-home icon-white"></i>
						</div>
						<h1 class="text-shadow-black">Contact Us</h1>
						<p class="text-shadow-black text-white text-center">They say marriages are made in heaven and we at vvsangam are trying to bring together that someone who is made for you..</p>
					</div>
				</div>
			</div>
		</div>
	</div>
    
    <div class="tp-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo $base_url;?>">Home</a></li>
                        <li class="active">Contact us</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white xxl-12 xxl-margin-left-2 xl-12 xl-margin-left-2 xs-16 xs-margin-left-0 s-16 xs-margin-left-0 m-16 m-margin-left-0 l-16 l-margin-left-0 margin-top-10px padding-15px border-1px-light-grey box-shadow-light border-radius-5px padding-20-5-xs">
        		<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
                	<div class="row">
                    	<h3 class="margin-top-0px margin-bottom-0px font-blue border-1px-btm-lgt-grey padding-bottom-5px text-shadow-black">
                        	Contact Us
                        </h3>
                        <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 font-size-14 margin-top-10px">
                        	<div class="row text-center text-grey">
                        		<b>
                        			At <?php if(isset($config_data['website_title'])) {echo $config_data['website_title'];}?>, we are always striving to better your experience.
                            	</b>
                            </div>
                        </div>

                    </div>
                </div>
                
                <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-15px">
                	<div class="row">
                    	<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-0-5-xs">
                        	<div class="">
                            	<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-contact-tab padding-0-5-xs">
                                	<div class="">
                                		<div role="tabpanel">
										  <ul class="nav nav-tabs xxl-10 xxl-margin-left-3 xs-16 xs-margin-left-0 padding-lr-zero-320 padding-0-5-xs" role="tablist">
    											 <li role="presentation" class="xxl-8 xs-8 border-rgt-1px-lgt-grey  active">
                                                    <a href="#ne-contact" aria-controls="ne-contact" role="tab" data-toggle="tab"  class="col-lg-12 padding-10-10-xs">
                                                        <strong class="font-13-xs"><i class="fa fa-phone hidden-xs"></i> Contact Us</strong>
                                                    </a>
                                                 </li>
    											 <li role="presentation" class="xxl-8 xs-8">
                                                    <a href="#ne-feedback" aria-controls="ne-feedback" role="tab" data-toggle="tab" class="padding-10-10-xs">
                                                        <strong class="font-13-xs"><i class="fa fa-feed hidden-xs"></i> Enquiry / Feedback</strong>
                                                    </a>
                                                 </li>
    									   </ul>
										   <div class="clearfix"></div>
                                          
                                           <div class="tab-content xxl-16 xl-16 xs-16 m-16 l-16 xs-16 border-1px-grey padding-top-10px padding-bottom-10px padding-20-5-xs">
    											<div role="tabpanel" class="tab-pane active" id="ne-contact">
                                                	<div class="xxl-16 xl-16 m-16 l-16 s-16 xs-16 margin-bottom-20px">
                                                    	<div class="row">
                                               				<div class="xxl-6 xl-8 m-8 l-8 xs-16 s-16" style="border:1px solid #ddd;padding:0 25px !important;">
                                                    	<div class="row">
                                                        	<div class="xxl-16 xl-16 m-16 l-16 xs-16 s-16 bg-light-grey padding-top-10px padding-bottom-10px font-green border-radius-5px margin-top-10-xs">
                                                            	<strong>Address</strong>
                                                            </div>
                                                            <div class="xxl-16 xl-16 xs-16 m-16 l-16 s-16 xs-16 margin-top-10px border-1px-btm-lgt-grey padding-bottom-10px">
 				<?php 	if(isset($contact_data['page_content']) && $contact_data['page_content'] !='')
						{
							echo $contact_data['page_content'];
						}
						else
						{?>	
                        <div class="padding-lr-zero-xs" style="margin-bottom: 00px;">
							<div class="new_reg">
								<header class="header_bg" style="margin-bottom: 00px;">
									<h1>No Data Available</h1>
								</header> 
							</div>
					    </div>
                        
                        <?php
						}?>
                                                            </div>
                                                        </div>
                                                    </div>
												<div class="xxl-10 xl-8 s-16 l-8 m-8 xs-16 padding-0-5-xs margin-top-10-xs">    
                                                        <div id="googleMap" class="map"></div>
                                                    </div>
                                                  		</div>
                                            		</div>
                                                </div>
    											<div role="tabpanel" class="tab-pane " id="ne-feedback">
                                            		<div class="xxl-16 xl-16 m-16 l-16 s-16 xs-16" >
                                                    	<div class="row">
                                                        	<div class="xxl-16 m-16 l-16 xl-16 xs-16 s-16 font-normal-grey font-size-14 margin-top-15px padding-bottom-10px border-1px-btm-lgt-grey">
                                                           		<div class="row">
                                                        			Please feel free to post your questions, comments and suggestions. We are eager to assist you and serve you better.
                                                                 </div>
                                                            </div>
                                                            <div class="xxl-16 m-16 l-16 xl-16 xs-16 s-16 font-normal-grey font-size-14 margin-top-15px text-center">
                                                           		<div class="row">
                                                                	<i class="font-red">*</i> All fields are mandatory
                                                        		</div>
                                                            </div>
                                                            <div class="xxl-16 xl-16 m-16 s-16 l-16 xs-16 margin-top-20px padding-lr-zero-320 padding-lr-zero-480 padding-0-5-xs">
                                                            	<form class="xxl-14 xxl-margin-left-1 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero-320 padding-lr-zero-480" action="<?php echo $base_url;?>contact/submit-contact" method="post" id="contact_form" name="contact_form" style="border:3px solid #ddd;padding:25px 0;">
                                                                	<div class="alert alert-success" id="email_success_message"  style="display:none"></div>
                                                                    <div class="alert alert-danger" id="email_error_message" style="display:none"></div>
                                                                	<div class="form-group xxl-16 xl-16 xs-16 m-16 s-16 l-16 padding-lr-zero-320 padding-lr-zero-480 padding-0-5-xs">
                                                                    	<div class="xxl-5 xl-5 xs-16 s-16 m-5 l-5 margin-top-3px">
                                                                        	Name<i class="font-red"> *</i>:
                                                                        </div>
                                                                        <div class="xxl-11 xs-11 xs-16 m-11 s-16 l-11 margin-top-5px-320 padding-lr-zero-480 ">
                                                                        	<input type="text" class="form-control" placeholder="Enter Your Name" id="name" name="name" required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                    <div class="form-group xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero-320 padding-lr-zero-480 margin-top-10 padding-0-5-xs">
                                                                    	<div class="xxl-5 xs-16 xl-5 s-16 m-5 l-5 margin-top-3px">
                                                                        	E-mail<i class="font-red"> *</i>:
                                                                        </div>
                                                                        <div class="xxl-11 xl-11 xs-16 m-11 s-16 l-11 margin-top-5px-320 padding-lr-zero-480 ">
                                                                        	<input type="email" class="form-control" placeholder="Enter Your Email" name="email" id="email"  required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero-320 padding-lr-zero-480 margin-top-10 padding-0-5-xs">
                                                                    	<div class="xxl-5 xl-5 s-16 xs-16 m-5 l-5 margin-top-3px ">
                                                                        	Contact No <i class="font-red">*</i>:
                                                                        </div>
                                                                        <div class="xxl-11 xl-11 xs-16 s-16 m-11 l-11 margin-top-5px-320 padding-lr-zero-480">								
                                                                       <div style="width:40% !important;float:left">
                                        			<select name="country_code" id="country_code" class="form-control select2">
                                        						<?php echo $this->common_model->country_code_opt('+91');?>
                                        			</select>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Enter Your Contact No" id="phone" name="phone" minlength="7" maxlength="15" style="width:60%;float:left" required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group xxl-16 xl-16 xs-16 m-16 s-16 l-16 padding-lr-zero-320 padding-lr-zero-480 margin-top-10 padding-0-5-xs">
                                                                    	<div class="xxl-5 xl-5 s-16 xs-16 m-5 l-5 margin-top-3px">
                                                                        	Subject <i class="font-red"> *</i>:
                                                                        </div>
                                                                        <div class="xxl-11 xl-11 xs-16 xs-16 m-11 s-16 l-11 margin-top-5px-320 padding-lr-zero-480">
                                                                        	<input type="text" class="form-control" placeholder="Enter Your Subject Related To" name="subject" id="subject" required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero-320 padding-lr-zero-480 margin-top-10 padding-0-5-xs">
                                                                    	<div class="xxl-5 xl-5 s-16 xs-16 m-5 l-5 margin-top-3px">
                                                                        	Suggestion / Feedback<i class="font-red"> *</i>:
                                                                        </div>
                                                                        <div class="xxl-11 xl-11 xs-16 xs-16 m-11 s-16 l-11 margin-top-5px-320 padding-lr-zero-480">
                                                                        	<textarea class="form-control" rows="5" name="description" id="description" required></textarea>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="form-group xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero-320 padding-lr-zero-480 margin-top-10 padding-0-5-xs">
                                                                    	<div class="xxl-5 xl-5 s-16 xs-16 m-5 l-5 margin-top-3px">                                                                        	
                                                                        </div>
                                                                        <div class="xxl-11 xl-11 xs-16 xs-16 m-11 s-16 l-11 margin-top-5px-320 padding-lr-zero-480">
																		<div class="xxl-6 xl-6 xs-16 xs-16 m-16 s-16 l-16 margin-top-5px-320 padding-lr-zero-480">   
                                                                        <img src="<?php echo $base_url; ?>captcha.php?captch_code_front=yes&captch_code=<?php echo $this->session->userdata['captcha_contact']; ?>" alt="" />
																		</div>
																		
																		<div class="xxl-10 xl-10 xs-16 xs-16 m-16 s-16 l-16 margin-top-5px-320 padding-lr-zero-480">   
                                                                        <div class="margin-top-10px hidden-lg hidden-md"></div>
																		<input  type="number" name="code_captcha" id="code_captcha" class="font-weight-normal text-grey form-control"  placeholder="Enter Captcha Code" value="" required /> 
																		</div>
																		</div>
                                                                        </div>
                                                                    <div class="form-group xxl-16 xl-16 xs-16 m-16 xs-16 l-16 padding-lr-zero-480 margin-top-20">
                                                                  
                                                                       <div class="text-center"><button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button></div>
                                                                    </div>
                                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" class="hash_tocken_id" />
                                                                 	<input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />
                                        						   <input type="hidden" name="is_post" id="is_post" value="1"/>
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
 <!-- ======= <div class="container"> End======= -->	
    <div class="clearfix"></div>
    <br/>
	<?php
		$htpp_web = 'http';
		if(strpos(base_url(),'https') === false)
		{
			
		}
		else
		{
			$htpp_web = 'https';
		}
	?>
<script src="<?php echo $htpp_web; ?>://maps.googleapis.com/maps/api/js?key=AIzaSyArZ7otxoqUtWWNbIW9-vBst3uevYRan7g"></script>
<?php
	$this->common_model->js_extra_code_fr.="
	(function($){
		$(document).ready(function(){
			$('#googleMap').gMap({
				maptype: 'ROADMAP',
				scrollwheel: false,
				zoom: 13,
				markers: [
					{
						address: '".trim($config_data['map_address'])."',
						html: '".$config_data['map_tooltip']."',
						popup: true,
					}
				],
			});
		   });
	})(this.jQuery);
	
	if($('#contact_form').length > 0)
	{
		$('#contact_form').validate({
			rules: {
				name: {
				  required: true,
				  lettersonly: true
				},
				subject: {
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
				//return true;
				submit_contact_us();
			}
		});
	}
	function submit_contact_us()
	{
		var name = $('#name').val();
		var email = $('#email').val();
		var phone = $('#phone').val();
		var country_code = $('#country_code').val();
		var subject = $('#subject').val();
		var description = $('#description').val();
		var code_captcha = $('#code_captcha').val();
		show_comm_mask();
		var hash_tocken_id = $('#hash_tocken_id').val();
		var base_url = $('#base_url').val();
		var url = base_url+'contact/submit-contact';
		$('#email_success_message').hide();
		$('#email_error_message').hide();
		$.ajax({
		   url: url,
		   type: 'post',
		   data: {'name':name,'email':email,'phone':phone,'subject':subject,'description':description,'".$this->security->get_csrf_token_name()."':hash_tocken_id,'is_post':0,'code_captcha':code_captcha,'country_code':country_code},
		   dataType:'json',
		   success:function(data)
		   {
			   $('#hash_tocken_id').val(data.token);
				if(data.status == 'success')
				{
					$('#email_success_message').html(data.errmessage);
					$('#email_success_message').slideDown();
					form_reset('contact_form');
				}
				else
				{
					$('#email_error_message').html(data.errmessage);
					$('#email_error_message').slideDown();
				}
				scroll_to_div('contact_form');
				hide_comm_mask();
		   }
		});
		return false;
	} ";
?>