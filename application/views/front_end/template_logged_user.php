<style>

	ul.select2-selection__rendered:after {

    content: "";

	border-color: #999 transparent transparent transparent;

    border-style: solid;

    border-width: 5px 4px 0 4px;

    right: 10px;

    top: 50%;

    margin-left: -4px;

    margin-top: -2px;

    position: absolute;

    top: 50%;

    width: 0;

	}

	.collapse-minus-nomargin{

	margin: 7px 7px 0 0;

	}

	.collapse-plus-nomargin{

	margin: 7px 7px 0 0;

	}

</style><?php $this->common_model->extra_js_fr[] = 'js/additional-methods.min.js'; ?>

<!------------------<div class="container">----Start------------------------------>	

<div class="container padding-0-5-xs">

	<!--<div class="margin-top-15px xxl-16 xl-16 l-16 m-16 s-16 xs-16">

		<div class="row">

		<a href="#"><img src="<?php //echo $base_url; ?>assets/front_end/images/icon/header-banner.jpg" class="full-width img-thumbnail" alt="" /></a>

		</div>

	</div>-->

    <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 margin-top-20 padding-0-5-xs" style="padding-right:0px;">

        <div class="xxl-4 xl-4 xs-16 m-16 s-16 l-4">

            <?php $this->load->view('front_end/my_profile_sidebar'); ?>

		</div>

		

        <div class="xs-16 s-16 xl-12 xxl-12 m-16 l-12 padding-lr-zero-320 padding-lr-zero-480">

			<div class="ne_pad_btm_10px padding-lr-zero-320 padding-lr-zero-480" style="margin-top: -20px;">

				

				<div class="clearfix"></div>

				<div id="basic-detail" class="bg-border margin-top-20" style="padding-top:0px;">

					<div class="row padding-0-xs"   style="padding:4px 0px;">

						<h3 class="font-16-bold-arial font-edit-m title-bg-noradius margin-top-5-xs" style="margin-top:0px;">

							<a href="#" class="text-white">

								<i class="fa fa-file ne_mrg_ri8_10"></i>Edit Basic Detail

								

							</a>

						</h3>

					</div>

					

					<div class="clearfix"></div>

					

					<form method="post" id="ne_lft_pan_list1"  name="ne_lft_pan_list1" action="<?php echo $base_url; ?>my-profile/save-profile/basic-detail" onSubmit="return validat_function('ne_lft_pan_list1')">

                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id"  class="hash_tocken_id" />

                        <input type="hidden" name="is_post" value="1" />

                        <input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />

						<div class="margin-top-10px"></div>

                        <div id="reponse_ne_lft_pan_list1"></div>

                        <div class="margin-top-10px"></div>

							

						<div class="clearfix"></div>

						<hr>

						<div class="row form-group xxl-16 xl-16 s-16 m-16 xs-16 l-16 padding-lr-zero-320 padding-lr-zero-480 padding-0-xs">

							<div class="xxl-8 xxl-margin-left-4 xl-12 xl-margin-left-2 xs-16 s-16 m-16 l-16 padding-lr-zero-320 padding-lr-zero-480">

								<div class="xxl-8 xl-8 s-16 xs-16 m-8 l-8 text-center">

									<button onClick="return validat_function_frm1('ne_lft_pan_list1')" class="btn btn-info ne-cursor" ><i class="fa fa-check font-16"></i> Save Changes</button>

								</div>

							</div>

						</div>

						<div class="clearfix"></div>

					</form>

				</div>

			</div>

			<div class="clearfix"></div>

			

			<!-----------------------Life style and appearance------------->

			

			

				

				

				

				<!-----------------------Life style and appearance------------->

				

				

					

					

			

						

						

			

						

							

				


							

						

								

								

								

											

								<div class="clearfix"></div>

								

											</div>

											<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-4 hidden-lg hidden-md">

												<?php $this->load->view('front_end/mobile_my_profile_sidebar'); ?>

											</div>

										</div>

										

										<div class="clearfix"></div>

										<!------------------<div class="container">----End------------------------------>	

										<div class="clearfix"></div>

										<div class="margin-top-30"></div>

									</div>

									<?php 

										if(isset($step_part) && $step_part !='')

										{

											$this->common_model->js_extra_code_fr.=" scroll_to_div('".$step_part."')

											$('.".$step_part."').addClass(' in ');

											

											var image_div = document.getElementById('".$step_part."');

											var img_id = image_div.getElementsByClassName('collapse-plus-nomargin')[0].id;

											if(img_id != ''){

											$('#'+img_id).attr('class','collapse-minus-nomargin');

											}else{

											$('#'+img_id).attr('class','collapse-plus-nomargin');	

											}

											";

										}

										$this->common_model->js_extra_code_fr.="

										$('select').select2();

										select2('#languages_known','Select Languages Known');

										

										

										function validat_function_frm1(form_id)

										{

										if($('#'+form_id).length > 0)

										{

										$('#'+form_id).validate({

										rules: {

										firstname: {

										lettersonly: true

										},

										lastname: {

										lettersonly: true

										},

										},	

										submitHandler: function(form)

										{

										common_ajax_request(form_id);

										return false;

										}

										});

										}

										}

										function validat_function_form2(form_id)

										{

										if($('#'+form_id).length > 0)

										{

										$('#'+form_id).validate({

										rules: {

										birthplace: {

										lettersonly: true

										},

										},	

										submitHandler: function(form)

										{

										common_ajax_request(form_id);

										return false;

										}

										});

										}

										}

										function validat_function_frm6(form_id)

										{

										if($('#'+form_id).length > 0)

										{

										$('#'+form_id).validate({

										rules: {

										father_name: {

										lettersonly: true

										},

										father_occupation: {

										lettersonly: true

										},

										mother_name: {

										lettersonly: true

										},

										mother_occupation: {

										lettersonly: true

										},

										},	

										submitHandler: function(form)

										{

										common_ajax_request(form_id);

										return false;

										}

										});

										}

										}

										function validat_function_res()

										{

										if($('#ne_lft_pan_list4').length > 0)

										{

										$('#ne_lft_pan_list4').validate({

										rules: {

										mobile_num: {

										required: true,

										number: true

										},

										phone: {					

										number: true

										}

										},	

										submitHandler: function(form)

										{

										common_ajax_request('ne_lft_pan_list4');

										return false;

										}

										});

										}

										}

										function validat_function(form_id)

										{

										if($('#'+form_id).length > 0)

										{

										$('#'+form_id).validate({

										submitHandler: function(form)

										{

										common_ajax_request(form_id);

										return false;

										}

										});

										}

										}

										$('.button-wrap').on('click', function(){

										$(this).toggleClass('button-active');

										});

										

										function change_img(id)

										{	

										var className = $('#img_'+id).attr('class');		

										if(className =='collapse-plus-nomargin')

										{

										$('#img_'+id).attr('class','collapse-minus-nomargin');

										}

										else

										{

										$('#img_'+id).attr('class','collapse-plus-nomargin');				

										}

										} 

										$(function(){display_total_childern(); });

										";

									?>	


									<script>
									




									</script>