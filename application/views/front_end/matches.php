<!------------------<div class="container">----Start------------------------------------>
<div class="container padding-lr-zero-xs">
	<!--<div class="margin-top-15px xxl-16 xl-16 l-16 m-16 s-16 xs-16">
		<div class="row">
			<a href="#"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/header-banner.jpg" class="full-width img-thumbnail" alt="" /></a>
		</div>
	</div>-->
	<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-20 padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 padding-lr-zero">
		<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-5">
			<?php $this->load->view('front_end/my_profile_sidebar'); ?>
		</div>
						
		<div class="xxl-12 xl-12 l-11 xs-16 m-16 s-16 ne_inbox_right_pan padding-lr-zero-320 margin-top-10px-320px padding-lr-zero-480 margin-top-10px-480px ne-mrg-top-10-768 padding-lr-zero-xs">
			<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 bg-border padding-lr-zero ne_pad_tp_10px" style="padding-top:4px;">
            	<div id="reponse_match_making_form"></div>
				<form class="" method="post" name="match_making_form" id="match_making_form" action="<?php echo $base_url; ?>matches/save-matches" enctype="multipart/form-data" onSubmit="return validat_function('match_making_form')" >
                		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id"  class="hash_tocken_id" />
                        <input type="hidden" name="is_post" value="1" />
                        <input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>"/>

                        <div id="reponse_ne_lft_pan_list"></div>

                <?php
								$member_id = $this->common_front_model->get_session_data('id');
								if(isset($member_id) && $member_id != '' )
								{
									$row_data = $this->common_model->get_count_data_manual('register',array('id'=>$member_id,'is_deleted'=>'No'),1);
									$this->common_front_model->edit_row_data = $row_data;
									$this->common_model->edit_row_data = $row_data;
									$this->common_model->mode= 'edit';
									$this->common_front_model->mode= 'edit';
									$mother_tongue_arr = $this->common_model->dropdown_array_table('mothertongue');
									$religion_arr = $this->common_model->dropdown_array_table('religion');
									$education_name_arr = $this->common_model->dropdown_array_table('education_detail');
									$country_arr = $this->common_model->dropdown_array_table('country_master');
								}
						?>
					<div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16" style="padding:0px 4px;">
						<h2 class="font-16 upgrade-heading center-text margin-top-0px" style="padding:5px 0;">
							<img src="<?php echo $base_url; ?>assets/front_end/images/icon/couple-match.png" class="" alt=""/> Custom Match
						</h2>
					</div>
                    <?php
                    			$ele_array = array(
									'looking_for'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->get_list_ddr('marital_status'),'label'=>'Looking For','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','extra_style'=>'width:100%'),
									 'part_frm_age'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->age_rang(),'label'=>"From Age",'class'=>'select2','extra_style'=>'width:100%'),
           							 'part_to_age'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->age_rang(),'label'=>"To Age",'class'=>'select2','extra_style'=>'width:100%'),
									'part_height'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->height_list(),'label'=>"From Height",'class'=>'select2','extra_style'=>'width:100%'),
									'part_height_to'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->height_list(),'label'=>"To Height",'class'=>'select2','extra_style'=>'width:100%'),
									'part_complexion'=>array('type'=>'dropdown','value_arr'=>$this->common_model->get_list_ddr('complexion'),'label'=>'Complexion','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','extra_style'=>'width:100%'),
									'part_mother_tongue'=>array('type'=>'dropdown','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','value_arr'=>$mother_tongue_arr,'label'=>'Mother Tongue','extra_style'=>'width:100%'),
									'part_religion'=>array('is_required'=>'required','type'=>'dropdown','onchange'=>"dropdownChange('part_religion','part_caste','caste_list')",'value_arr'=>$religion_arr,'label'=>'Catholic Community','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','extra_style'=>'width:100%'),
									'part_caste'=>array('type'=>'dropdown','relation'=>array('rel_table'=>'caste','key_val'=>'id','key_disp'=>'caste_name','not_load_add'=>'yes','rel_col_name'=>'religion_id','cus_rel_col_val'=>'part_religion'),'label'=>'Diocese','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','extra_style'=>'width:100%'),
									'part_country_living'=>array('type'=>'dropdown','value_arr'=>$country_arr,'label'=>'Country','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','extra_style'=>'width:100%'),
									'part_education'=>array('type'=>'dropdown','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','value_arr'=>$education_name_arr,'label'=>'Education','extra_style'=>'width:100%'),
								);
								echo $this->common_front_model->generate_common_front_form($ele_array,array('page_type'=>'edit_profile'));?>
					<div class="xxl-16 form-group padding-lr-zero">
						
							<div class="clearfix"></div>
							<hr>
							
                            <div class="row form-group xxl-16 xl-16 s-16 m-16 xs-16 l-16 padding-lr-zero-320 padding-lr-zero-480 text-center">
							<div class="xxl-12 xxl-margin-left-4 xl-12 xl-margin-left-2 xs-16 s-16 m-16 l-16 padding-lr-zero-320 padding-lr-zero-480">
								<div class="xxl-8 xl-8 s-16 xs-8 m-8 l-8 xs-16">
									<button type="submit" onClick="return validat_function('match_making_form');" class="btn btn-info ne-cursor" ><i class="fa fa-check font-16" ></i> Save and Search</button>
								</div>
							</div>
						
						</div>
						
					</div>
				</div>
				</form>
                <div class="clearfix"></div>
				<div class="clearfix"></div>
                <div  id="main_content_ajax">
                <?php include('match_result_member_profile.php'); ?>
                </div>
			</div>
			<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-4 hidden-lg hidden-md">
				<?php $this->load->view('front_end/mobile_my_profile_sidebar'); ?>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>

<div class="clearfix"></div>
<!------------------<div class="container">----End------------------------------------>
<div class="margin-top-30"></div>
<?php
	$this->common_model->js_extra_code_fr.="
	
	$('.button-wrap').on('click', function(){
		$(this).toggleClass('button-active');
	});
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
	$(document).ready(function () {
		$('#test').BootSideMenu({
			side: 'left',
			pushBody:false,
			width: '250px'
		});
		$(".'"'."[data-toggle='tooltip']".'"'.").tooltip(); 
	}); 
	
	$('select').select2();
	select2('#languages_known','Select Languages Known');
	//load_choosen_code();
	
	function validat_function(form_id)
	{
		if($('#'+form_id).length > 0)
		{
			$('#'+form_id).validate({
			submitHandler: function(form)
			{
				common_ajax_request(form_id);
				get_data_ajax(1,'".$base_url.'matches/search-now/'."');
				return false;
			}
			});
		}
	}	
	load_pagination_code_front_end();
	";
?>
<?php //include_once('photo_protect.php'); ?>
<div class="clearfix"></div>