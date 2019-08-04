<?php
	$member_front_search = $this->session->userdata('member_front_search');
	$mega_user_data = $this->session->userdata('mega_user_data');
	
	$search_filed_data = array();
	if(isset($member_front_search['search_filed_data']) && $member_front_search['search_filed_data'] !='')
	{
		$search_filed_data = $member_front_search['search_filed_data'];
	}
	$comm_model = $this->common_model; // reffrence store for sort syntax
?>
<!-- ===== <div class="container"> Start ===== -->
<style>
	.neRefineScroll{ max-height:170px;height:auto !important}
	.neRefineSearch .neBoxShadowBtm2px {
    box-shadow:none;
	
}
.ne-bdr-btm-lgt-grey {
border-bottom: 0px !important;
}
</style>
<?php echo $this->search_model->search_sub_menu(''); ?>
<div class="container margin-top-20 padding-lr-zero-xs">
	<!--<div class="">
		<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-0-5-xs">
		<img src="<?php echo $base_url; ?>assets/	/images//icon/register-header-female.jpg"  class="full-width img-thumbnail" alt=""/>
		</div>
	</div>-->
	<div  class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-20px padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 padding-0-5-xs">
		<!-- for search side bar-->
		<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-5 ">
			<div class="row">
                <div class="xxl-16 xl-16 l-16 hidden-xs hidden-sm" style="background: #fff;">
					<div class="row">
						<a class="">
							<h4 class="margin-top-0px search-heading ne_pad_tp_10px ne_pad_btm_10px xxl-16 xl-16 l-16 m-16 s-16 xs-16 center-text">
								<i class="fa fa-filter ne_mrg_ri8_10"></i><span class="">Refine Search</span>
							</h4>
						</a>
						<div>
							<form name="frm_filter" id="frm_filter" method="post" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero neBoxShdOffwhite-1px neRefineSearch"> <!-- ne-bdr-lgt-grey bg-white -->
								
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" class="hash_tocken_id" />
								
								<?php
									$curre_gender = $this->common_front_model->get_session_data('gender');
									if($curre_gender == '')
									{
									?>
									<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top"  data-toggle="collapse" role="navigation" data-target="#collapseExample_gender" aria-expanded="false" aria-controls="collapseExample_gender" onclick="change_img('gender_profile')">
											<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
												<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
													Gender
													<span class="collapse-minus-nomargin" id="img_gender_profile"></span>
												</h4>
											</a>
										</div>
										<div class="collapse in xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs" id="collapseExample_gender"> 
											<div class="xxl-16 xs-16 ne_pad_tp_10px margin-top-10px margin-bottom-10px padding-lr-zero">
												<div class="row">
													<?php
														$gender = $comm_model->get_data_fromArray($search_filed_data,'gender');
													?>
													<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
													<div class="xxl-7 xl-7 xs-7 s-7 m-7 l-7">
														<input onClick="refine_search()" id="349" type="radio" value="Male" name="gender" <?php if(isset($gender) && $gender !='' && $gender =='Male'){ echo 'checked';} ?> />
														<label for="349" class="font-13-normal margin-top-2 src-choosen margin-left-10">Male</label>
													</div>
													<div class="xxl-7 xl-7 xs-7 s-7 m-7 l-7">
														<input onClick="refine_search()" id="350" type="radio" value="Female" name="gender" <?php if(isset($gender) && $gender !='' && $gender =='Female'){ echo 'checked';} ?> />
														<label for="350" class="font-13-normal margin-top-2 src-choosen margin-left-10">Female</label>
													</div>
													<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1"></span>
												</div>
											</div>									
										</div>
									</div>
									<?php
									}
								?>   
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" role="navigation" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1" onclick="change_img('1_profile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Age
												<span class="collapse-minus-nomargin" id="img_1_profile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse in xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs" id="collapseExample1"> 
										<div class="xxl-16 xs-16 ne_pad_tp_10px margin-top-10px margin-bottom-10px padding-lr-zero">
											<div class="xxl-7 xl-7 l-7 xs-7 m-7 s-7">
												<?php
													$from_age = $comm_model->get_data_fromArray($search_filed_data,'from_age');
												?>
												<select class="form-control age" name="from_age" id="from_age" style="border:1px solid #dfe0e3;">
													<option value="">From</option>
													<?php echo $this->common_model->array_optionstr($this->common_model->age_rang(),$from_age);?>
												</select>
											</div>
											<div class="xxl-2 xl-2 l-2 xs-2 m-2 s-2 margin-top-5px padding-lr-zero-xs">
												To
											</div>
											<div class="xxl-7 xl-7 l-7 xs-7 m-7 s-7">
												<select class="form-control age" name="to_age" id="to_age" style="border:1px solid #dfe0e3;">
													<option value="">To</option>
													<?php echo $this->common_model->array_optionstr($this->common_model->age_rang(),$comm_model->get_data_fromArray($search_filed_data,'to_age'));?>
												</select>
											</div>
										</div>
										<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search();">
											<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
										</a>
										<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
										<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('age');">
											<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
										</a>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" role="navigation" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample1"  onclick="change_img('2_profile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Height
												<span class="collapse-plus-nomargin" id="img_2_profile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs" id="collapseExample2"> 
										<div class="xxl-16 xs-16 ne_pad_tp_10px margin-top-10px margin-bottom-10px padding-lr-zero">
											<div class="xxl-7 xl-7 l-7 xs-7 m-7 s-7">
												<select class="form-control height" name="from_height" id="from_height" style="border:1px solid #dfe0e3;" >
													<option value="">From</option>
													<?php echo $this->common_model->array_optionstr($this->common_model->height_list(),$comm_model->get_data_fromArray($search_filed_data,'from_height'));?>
												</select>
											</div>
											<div class="xxl-2 xl-2 l-2 xs-2 m-2 s-2 margin-top-5px padding-lr-zero-xs">
												To
											</div>
											<div class="xxl-7 xl-7 l-7 xs-7 m-7 s-7">
												<select class="form-control height" name="to_height" id="to_height" style="border:1px solid #dfe0e3;">
													<option value="">To</option>
													<?php echo $this->common_model->array_optionstr($this->common_model->height_list(),$comm_model->get_data_fromArray($search_filed_data,'to_height'));?>
												</select>
											</div>
										</div>
										<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search();">
											<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
										</a>
										<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
										<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('height');">
											<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
										</a>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" role="navigation" data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample1" onclick="change_img('3_profile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero" >
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Marital Status
												<span class="collapse-plus-nomargin" id="img_3_profile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16  padding-lr-zero" id="collapseExample3"> 
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px">
											<?php
												$marital_status_arr = $this->common_model->get_list_ddr('marital_status');
												if(isset($marital_status_arr) && $marital_status_arr !='' && is_array($marital_status_arr) && count($marital_status_arr) > 0)
												{
													$marital_status_curr = $comm_model->get_data_fromArray($search_filed_data,'looking_for');
													foreach($marital_status_arr as $matr_key=>$mart_val)
													{
														$cheked = "";
														if(isset($marital_status_curr) && $marital_status_curr !='' && count($marital_status_curr) && in_array($matr_key,$marital_status_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="<?php echo $matr_key; ?>" type="checkbox" value="<?php echo $matr_key; ?>" name="looking_for[]" class="row xxl-4 xl-4 xs-4 s-4 m-4 l-4 marital_status">
															<label for="<?php echo $matr_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $mart_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('marital_status');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" role="navigation" data-toggle="collapse" data-target="#collapseExample4" aria-expanded="false" aria-controls="collapseExample1" onclick="change_img('4_profile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Catholic Community
												<span class="collapse-plus-nomargin" id="img_4_profile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16  padding-lr-zero" id="collapseExample4"> 
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px neRefineScroll">
											<?php
												$religion_arr = $this->common_model->dropdown_array_table('religion');
												if(isset($religion_arr) && $religion_arr !='' && is_array($religion_arr) && count($religion_arr) > 0)
												{
													$religion_curr = $comm_model->get_data_fromArray($search_filed_data,'religion');
													foreach($religion_arr as $reli_key=>$reli_val)
													{
														$cheked = "";
														if(isset($religion_curr) && $religion_curr !='' && is_array($religion_curr) && count($religion_curr) && in_array($reli_key,$religion_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="rel_<?php echo $reli_key; ?>" type="checkbox" value="<?php echo $reli_key; ?>" name="religion[]" class="religion row xxl-4 xl-4 xs-4 s-4 m-4 l-4" onClick="getlist_onchange('religion','caste')">
															<label for="rel_<?php echo $reli_key; ?>" class="religion xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $reli_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('religion');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero" id="getcaste">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top"  data-toggle="collapse" role="navigation" data-target="#collapseExample5" aria-expanded="false" aria-controls="collapseExample1" onclick="change_img('5_profile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Diocese
												<span class="collapse-plus-nomargin" id="img_5_profile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16  padding-lr-zero" id="collapseExample5"> 
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px neRefineScroll" id="list_disp_caste">
											<?php
												if(isset($religion_curr) && $religion_curr !='' && is_array($religion_curr) && count($religion_curr))
												{
													$cast_curr = $comm_model->get_data_fromArray($search_filed_data,'caste');
													echo $this->search_model->get_list('religion','caste',$religion_curr,$cast_curr,$app_csrf=0);
												}
												else
												{
												?>
												<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
													<span class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search">
														First Select Catholic Community
													</span>
												</li>
												<?php
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('caste');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>									
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" role="navigation" data-toggle="collapse" data-target="#collapseExample6" aria-expanded="false" aria-controls="collapseExample1" onclick="change_img('6_profile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Country
												<span class="collapse-plus-nomargin" id="img_6_profile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16  padding-lr-zero" id="collapseExample6">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px neRefineScroll">
											<?php
												$country_arr = $this->common_model->dropdown_array_table('country_master');
												if(isset($country_arr) && $country_arr !='' && is_array($country_arr) && count($country_arr) > 0)
												{
													$country_curr = $comm_model->get_data_fromArray($search_filed_data,'country');
													foreach($country_arr as $country_key=>$country_val)
													{
														$cheked = "";
														if(isset($country_curr) && $country_curr !='' && is_array($country_curr) && count($country_curr) && in_array($country_key,$country_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="country_<?php echo $country_key; ?>" type="checkbox" value="<?php echo $country_key; ?>"  onClick="getlist_onchange('country','state')" name="country[]" class="country row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
															<label for="country_<?php echo $country_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $country_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('country');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero" id="getstate">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample7" aria-expanded="false" aria-controls="collapseExample1" onclick="change_img('7_profile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												State
												<span class="collapse-plus-nomargin" id="img_7_profile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16  padding-lr-zero" id="collapseExample7">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px neRefineScroll" id="list_disp_state">
											<?php
												if(isset($country_curr) && $country_curr !='' && is_array($country_curr) && count($country_curr) )
												{
													$state_curr = $comm_model->get_data_fromArray($search_filed_data,'state');
													echo $this->search_model->get_list('country','state',$country_curr,$state_curr,$app_csrf=0);
												}
												else
												{
												?>	
												<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
													<span class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search">
														First Select Country
													</span>
												</li>
												<?php
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('state');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample8" aria-expanded="false" aria-controls="collapseExample1" onclick="change_img('8_profile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												City
												<span class="collapse-plus-nomargin" id="img_8_profile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16  padding-lr-zero" id="collapseExample8">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px neRefineScroll"  id="list_disp_city">
											<?php
												if(isset($state_curr) && $state_curr !='' && is_array($state_curr) && count($state_curr))
												{
													$city_curr = $comm_model->get_data_fromArray($search_filed_data,'city');
													echo $this->search_model->get_list('state','city',$state_curr,$city_curr,$app_csrf=0);
												}
												else
												{
												?>	
												<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
													<span class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search">
														First Select State
													</span>
												</li>
												<?php
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('city');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero" >
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample9" aria-expanded="false" aria-controls="collapseExample1"  onclick="change_img('9_profile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Mother Tongue
												<span class="collapse-plus-nomargin" id="img_9_profile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16  padding-lr-zero" id="collapseExample9">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px neRefineScroll">
											<?php
												$mothertoung_arr = $this->common_model->dropdown_array_table('mothertongue');
												if(isset($mothertoung_arr) && $mothertoung_arr !='' && is_array($mothertoung_arr) && count($mothertoung_arr) > 0)
												{
													$mothertongue_curr = $comm_model->get_data_fromArray($search_filed_data,'mothertongue');
													foreach($mothertoung_arr as $mtou_key=>$mtou_val)
													{
														$cheked = "";
														if(isset($mothertongue_curr) && $mothertongue_curr !='' && is_array($mothertongue_curr) &&  count($mothertongue_curr) && in_array($mtou_key,$mothertongue_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="mothertongue_<?php echo $mtou_key; ?>" type="checkbox" value="<?php echo $mtou_key; ?>" name="mothertongue[]" class="mothertongue row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
															<label for="mothertongue_<?php echo $mtou_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $mtou_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('mothertongue');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample11" aria-expanded="false" aria-controls="collapseExample1" onclick="change_img('11_profile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Education
												<span class="collapse-plus-nomargin" id="img_11_profile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero" id="collapseExample11">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px neRefineScroll">
											<?php
												$education_arr = $this->common_model->dropdown_array_table('education_detail');
												if(isset($education_arr) && $education_arr !='' && is_array($education_arr) && count($education_arr) > 0)
												{
													$education_curr = $comm_model->get_data_fromArray($search_filed_data,'education');
													foreach($education_arr as $educ_key=>$educ_val)
													{
														$cheked = "";
														if(isset($education_curr) && $education_curr !='' && is_array($education_curr) && count($education_curr) && in_array($educ_key,$education_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="education_<?php echo $educ_key; ?>" type="checkbox" value="<?php echo $educ_key; ?>" name="education[]" class="education row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
															<label for="education_<?php echo $educ_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $educ_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('education');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample12" aria-expanded="false" aria-controls="collapseExample1"  onclick="change_img('12_profile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Occupation
												<span class="collapse-plus-nomargin" id="img_12_profile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero" id="collapseExample12">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px neRefineScroll">
											<?php
												$occupation_arr = $this->common_model->dropdown_array_table('occupation');
												if(isset($occupation_arr) && $occupation_arr !='' && is_array($occupation_arr) && count($occupation_arr) > 0)
												{
													$occupation_curr = $comm_model->get_data_fromArray($search_filed_data,'occupation');
													foreach($occupation_arr as $ocup_key=>$ocup_val)
													{
														$cheked = "";
														if(isset($occupation_curr) && $occupation_curr !='' && is_array($occupation_curr) && count($occupation_curr) && in_array($ocup_key,$occupation_curr))
														{
															$cheked = "checked";
														}													
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="occupation_<?php echo $ocup_key; ?>" type="checkbox" value="<?php echo $ocup_key; ?>" name="occupation[]" class="occupation row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
															<label for="occupation_<?php echo $ocup_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $ocup_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('occupation');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample13" aria-expanded="false" aria-controls="collapseExample1"  onclick="change_img('13_profile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Annual Income
												<span class="collapse-plus-nomargin" id="img_13_profile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero" id="collapseExample13">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px neRefineScroll">
											<?php
												$income_arr = $this->common_model->get_list_ddr('income');
												if(isset($income_arr) && $income_arr !='' && is_array($income_arr) && count($income_arr) > 0)
												{
													$income_curr = $comm_model->get_data_fromArray($search_filed_data,'income');
													foreach($income_arr as $income_key=>$income_val)
													{
														$cheked = "";
														if(isset($income_curr) && $income_curr !='' && is_array($income_curr) && count($income_curr) && in_array($income_key,$income_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="<?php echo $income_key; ?>" type="checkbox" value="<?php echo $income_key; ?>" name="income[]" class="income row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
															<label for="<?php echo $income_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $income_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('income');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample221" aria-expanded="false" aria-controls="collapseExample1"  onclick="change_img('221_profile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Employee In
												<span class="collapse-plus-nomargin" id="img_221_profile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero" id="collapseExample221">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px neRefineScroll">
											<?php
												$employee_in_arr = $this->common_model->get_list_ddr('employee_in');
												if(isset($employee_in_arr) && $employee_in_arr !='' && is_array($employee_in_arr) && count($employee_in_arr) > 0)
												{
													$employee_in_curr = $comm_model->get_data_fromArray($search_filed_data,'employee_in');
													foreach($employee_in_arr as $emp_key=>$emp_val)
													{
														$cheked = "";
														if(isset($employee_in_curr) && $employee_in_curr !='' && is_array($employee_in_curr) &&  count($employee_in_curr) && in_array($emp_key,$employee_in_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="employee_in_<?php echo $emp_key; ?>" type="checkbox" value="<?php echo $emp_key; ?>" name="employee_in[]" class="employee_in row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
															<label for="employee_in_<?php echo $emp_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $emp_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('employee_in');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample13_1" aria-expanded="false" aria-controls="collapseExample1" onclick="change_img('13_1_profile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Smoking
												<span class="collapse-plus-nomargin" id="img_13_1_profile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero" id="collapseExample13_1">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px ">
											<?php
												$smoke_arr = $this->common_model->get_list_ddr('smoke');
												if(isset($smoke_arr) && $smoke_arr !='' && is_array($smoke_arr) && count($smoke_arr) > 0)
												{
													$smoke_curr = $comm_model->get_data_fromArray($search_filed_data,'smoking');
													foreach($smoke_arr as $smoke_key=>$smoke_val)
													{
														$cheked = "";
														if(isset($smoke_curr) && $smoke_curr !='' && is_array($smoke_curr) && count($smoke_curr) && in_array($smoke_key,$smoke_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="smoke_<?php echo $smoke_key; ?>" type="checkbox" value="<?php echo $smoke_key; ?>" name="smoking[]" class="smoking row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
															<label for="smoke_<?php echo $smoke_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $smoke_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('smoking');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample14" aria-expanded="false" aria-controls="collapseExample1"  onclick="change_img('14_profile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Drinking
												<span class="collapse-plus-nomargin" id="img_14_profile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero" id="collapseExample14">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px ">
											<?php
												$drink_arr = $this->common_model->get_list_ddr('drink');
												if(isset($drink_arr) && $drink_arr !='' && is_array($drink_arr) && count($drink_arr) > 0)
												{
													$drink_curr = $comm_model->get_data_fromArray($search_filed_data,'drink');
													foreach($drink_arr as $drink_key=>$drink_val)
													{
														$cheked = "";
														if(isset($drink_curr) && $drink_curr !='' && is_array($drink_curr) && count($drink_curr) && in_array($drink_key,$drink_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="drink_<?php echo $drink_key; ?>" type="checkbox" value="<?php echo $drink_key; ?>" name="drink[]" class="drink row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
															<label for="drink_<?php echo $drink_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $drink_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('drink');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample15" aria-expanded="false" aria-controls="collapseExample1" onclick="change_img('15_profile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Eating Habits
												<span class="collapse-plus-nomargin" id="img_15_profile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero" id="collapseExample15">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px ">
											<?php
												$diet_arr = $this->common_model->get_list_ddr('diet');
												if(isset($diet_arr) && $diet_arr !='' && is_array($diet_arr) && count($diet_arr) > 0)
												{
													$diet_curr = $comm_model->get_data_fromArray($search_filed_data,'diet');
													foreach($diet_arr as $diet_key=>$diet_val)
													{
														$cheked = "";
														if(isset($diet_curr) && $diet_curr !='' && is_array($diet_curr) && count($diet_curr) && in_array($diet_key,$diet_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="diet_<?php echo $diet_key; ?>" type="checkbox" value="<?php echo $diet_key; ?>" name="diet[]" class="diet row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
															<label for="diet_<?php echo $diet_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $diet_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('diet');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample16" aria-expanded="false" aria-controls="collapseExample1" onclick="change_img('16_profile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Profile Picture
												<span class="collapse-plus-nomargin" id="img_16_profile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16  padding-lr-zero" id="collapseExample16">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px ">
											<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
												<span class="">
													<?php 
														$photo_search = $comm_model->get_data_fromArray($search_filed_data,'photo_search');
														$photo_search_checked = '';
														if(isset($photo_search) && $photo_search !='' && $photo_search =='photo_search')
														{
															$photo_search_checked = 'checked';
															
														}
													?>
													<input <?php echo $photo_search_checked; ?> id="photo_search" type="checkbox" value="photo_search" name="photo_search" class="row xxl-4 xl-4 xs-4 s-4 m-4 l-4" onClick="refine_search();">
													
													<label for="photo_search" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search">With Picture</label>
												</span>
											</li>
										</ul>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample17" aria-expanded="false" aria-controls="collapseExample1" onclick="change_img('17_profile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Complexion
												<span class="collapse-plus-nomargin" id="img_17_profile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero" id="collapseExample17">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px ">
											<?php
												$complexion_arr = $this->common_model->get_list_ddr('complexion');
												if(isset($complexion_arr) && $complexion_arr !='' && is_array($complexion_arr) && count($complexion_arr) > 0)
												{
													$complexion_curr = $comm_model->get_data_fromArray($search_filed_data,'complexion');
													foreach($complexion_arr as $complexion_key=>$complexion_val)
													{
														$cheked = "";
														if(isset($complexion_curr) && $complexion_curr !='' && is_array($complexion_curr) && count($complexion_curr) && in_array($complexion_key,$complexion_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="complexion_<?php echo $complexion_key; ?>" type="checkbox" value="<?php echo $complexion_key; ?>" name="complexion[]" class="complexion row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
															<label for="complexion_<?php echo $complexion_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $complexion_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('complexion');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample18" aria-expanded="false" aria-controls="collapseExample1" onclick="change_img('18_profile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Body Type
												
												<span class="collapse-plus-nomargin" id="img_18_profile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero" id="collapseExample18">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px neRefineScroll">
											<?php
												$bodytype_arr = $this->common_model->get_list_ddr('bodytype');
												if(isset($bodytype_arr) && $bodytype_arr !='' && is_array($bodytype_arr) && count($bodytype_arr) > 0)
												{
													$bodytype_curr = $comm_model->get_data_fromArray($search_filed_data,'bodytype');
													foreach($bodytype_arr as $bodytype_key=>$bodytype_val)
													{
														$cheked = "";
														if(isset($bodytype_curr) && $bodytype_curr !='' && is_array($bodytype_curr) && count($bodytype_curr) && in_array($bodytype_key,$bodytype_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="bodytype_<?php echo $bodytype_key; ?>" type="checkbox" value="<?php echo $bodytype_key; ?>" name="bodytype[]" class="bodytype row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
															<label for="bodytype_<?php echo $bodytype_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $bodytype_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('bodytype');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								
								<!--<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample19" aria-expanded="false" aria-controls="collapseExample1" onclick="change_img('19_profile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Star
												<span class="collapse-plus-nomargin" id="img_19_profile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero" id="collapseExample19">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px neRefineScroll">
											<?php
												$star_arr = $this->common_model->get_list_ddr('star');
												if(isset($star_arr) && $star_arr !='' && is_array($star_arr) && count($star_arr) > 0)
												{
													$star_curr = $comm_model->get_data_fromArray($search_filed_data,'star');
													foreach($star_arr as $star_key=>$star_val)
													{
														$cheked = "";
														if(isset($star_curr) && $star_curr !='' && is_array($star_curr) && count($star_curr) && in_array($star_key,$star_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="star_<?php echo $star_key; ?>" type="checkbox" value="<?php echo $star_key; ?>" name="star[]" class="star row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
															<label for="star_<?php echo $star_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $star_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('star');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>-->
								<!--<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample20" aria-expanded="false" aria-controls="collapseExample1" onclick="change_img('20_profile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Manglik
												<span class="collapse-plus-nomargin" id="img_20_profile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero" id="collapseExample20">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px neRefineScroll">
											<?php
												$manglik_arr = $this->common_model->get_list_ddr('manglik');
												if(isset($manglik_arr) && $manglik_arr !='' && is_array($manglik_arr) && count($manglik_arr) > 0)
												{
													$manglik_curr = $comm_model->get_data_fromArray($search_filed_data,'manglik');
													foreach($manglik_arr as $manglik_key=>$manglik_val)
													{
														$cheked = "";
														if(isset($manglik_curr) && $manglik_curr !='' && is_array($manglik_curr) && count($manglik_curr) && in_array($manglik_key,$manglik_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="manglik_<?php echo $manglik_key; ?>" type="checkbox" value="<?php echo $manglik_key; ?>" name="manglik[]" class="manglik row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
															<label for="manglik_<?php echo $manglik_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $manglik_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('manglik');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>-->
							</form>                        
						</div>
					</div>
				</div>
				
				<div class="xxl-16 xl-16 l-16 hidden-lg hidden-md">
					<div class="row">
						<a class="" >
							<h4 class="margin-top-0px search-heading ne_pad_tp_10px ne_pad_btm_10px xxl-16 xl-16 l-16 m-16 s-16 xs-16 center-text" data-toggle="collapse" role="navigation" data-target="#collapseExample-refine" aria-expanded="false" aria-controls="collapseExample-refine">
								<i class="fa fa-filter ne_mrg_ri8_10"></i><span class="">Refine Search</span>
							</h4>
						</a>
						<div class="collapse" id="collapseExample-refine">
							<form name="frm_filter_mobile" id="frm_filter_mobile" method="post"  class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero neBoxShdOffwhite-1px ne-bdr-lgt-grey bg-white neRefineSearch">
								
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" class="hash_tocken_id" />
								
								<?php
									$curre_gender = $this->common_front_model->get_session_data('gender');
									if($curre_gender =='')
									{
									?>
									<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample_gender_mobile" aria-expanded="false" aria-controls="collapseExample_gender_mobile" onclick="change_img('gender_profile123')">
											<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
												<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
													Gender
													<span class="collapse-minus-nomargin" id="img_gender_profile123"></span>
												</h4>
											</a>
										</div>
										<div class="collapse in xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs" id="collapseExample_gender_mobile"> 
											<div class="xxl-16 xs-16 ne_pad_tp_10px margin-top-10px margin-bottom-10px padding-lr-zero">
												<div class="row">
													<?php
														$gender = $comm_model->get_data_fromArray($search_filed_data,'gender');
													?>
													<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
													<div class="xxl-7 xl-7 xs-7 s-7 m-7 l-7">
														<input onClick="refine_search_mobile()" id="349" type="radio" value="Male" name="gender" <?php if(isset($gender) && $gender !='' && $gender =='Male'){ echo 'checked';} ?> />
														<label for="349" class="font-13-normal margin-top-2 src-choosen margin-left-10">Male</label>
													</div>
													<div class="xxl-7 xl-7 xs-7 s-7 m-7 l-7">
														<input onClick="refine_search_mobile()" id="350" type="radio" value="Female" name="gender" <?php if(isset($gender) && $gender !='' && $gender =='Female'){ echo 'checked';} ?> />
														<label for="350" class="font-13-normal margin-top-2 src-choosen margin-left-10">Female</label>
													</div>
													<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1"></span>
												</div>
											</div>									
										</div>
									</div>
									<?php
									}
								?>   
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample12_age" aria-expanded="false" aria-controls="collapseExample12_age" onclick="change_img('1_profile_mobile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Age
												<span class="collapse-minus-nomargin" id="img_1_profile_mobile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse in xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs" id="collapseExample12_age"> 
										<div class="xxl-16 xs-16 ne_pad_tp_10px margin-top-10px margin-bottom-10px padding-lr-zero">
											<div class="xxl-7 xl-7 l-7 xs-7 m-7 s-7">
												<?php
													$from_age = $comm_model->get_data_fromArray($search_filed_data,'from_age');
												?>
												<select class="form-control age" name="from_age" id="from_age" style="border:1px solid #dfe0e3;">
													<option value="">From</option>
													<?php echo $this->common_model->array_optionstr($this->common_model->age_rang(),$from_age);?>
												</select>
											</div>
											<div class="xxl-2 xl-2 l-2 xs-2 m-2 s-2 margin-top-5px padding-lr-zero-xs">
												To
											</div>
											<div class="xxl-7 xl-7 l-7 xs-7 m-7 s-7">
												<select class="form-control age" name="to_age" id="to_age" style="border:1px solid #dfe0e3;">
													<option value="">To</option>
													<?php echo $this->common_model->array_optionstr($this->common_model->age_rang(),$comm_model->get_data_fromArray($search_filed_data,'to_age'));?>
												</select>
											</div>
										</div>
										<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search_mobile();">
											<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
										</a>
										<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
										<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('age');">
											<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
										</a>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample22" aria-expanded="false" aria-controls="collapseExample12"  onclick="change_img('2_profile_mobile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Height
												<span class="collapse-plus-nomargin" id="img_2_profile_mobile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs" id="collapseExample22"> 
										<div class="xxl-16 xs-16 ne_pad_tp_10px margin-top-10px margin-bottom-10px padding-lr-zero">
											<div class="xxl-7 xl-7 l-7 xs-7 m-7 s-7">
												<select class="form-control height" name="from_height" id="from_height" style="border:1px solid #dfe0e3;" >
													<option value="">From</option>
													<?php echo $this->common_model->array_optionstr($this->common_model->height_list(),$comm_model->get_data_fromArray($search_filed_data,'from_height'));?>
												</select>
											</div>
											<div class="xxl-2 xl-2 l-2 xs-2 m-2 s-2 margin-top-5px padding-lr-zero-xs">
												To
											</div>
											<div class="xxl-7 xl-7 l-7 xs-7 m-7 s-7">
												<select class="form-control height" name="to_height" id="to_height" style="border:1px solid #dfe0e3;">
													<option value="">To</option>
													<?php echo $this->common_model->array_optionstr($this->common_model->height_list(),$comm_model->get_data_fromArray($search_filed_data,'to_height'));?>
												</select>
											</div>
										</div>
										<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search_mobile();">
											<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
										</a>
										<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
										<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('height');">
											<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
										</a>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample32" aria-expanded="false" aria-controls="collapseExample12" onclick="change_img('3_profile_mobile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero" >
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Marital Status
												<span class="collapse-plus-nomargin" id="img_3_profile_mobile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16  padding-lr-zero" id="collapseExample32"> 
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px">
											<?php
												$marital_status_arr = $this->common_model->get_list_ddr('marital_status');
												if(isset($marital_status_arr) && $marital_status_arr !='' && is_array($marital_status_arr) && count($marital_status_arr) > 0)
												{
													$marital_status_curr = $comm_model->get_data_fromArray($search_filed_data,'looking_for');
													foreach($marital_status_arr as $matr_key=>$mart_val)
													{
														$cheked = "";
														if(isset($marital_status_curr) && $marital_status_curr !='' && is_array($marital_status_curr) && count($marital_status_curr) && in_array($matr_key,$marital_status_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="<?php echo $matr_key; ?>" type="checkbox" value="<?php echo $matr_key; ?>" name="looking_for[]" class="row xxl-4 xl-4 xs-4 s-4 m-4 l-4 marital_status">
															<label for="<?php echo $matr_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $mart_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search_mobile();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('marital_status');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample42" aria-expanded="false" aria-controls="collapseExample12" onclick="change_img('4_profile_mobile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Catholic Community
												<span class="collapse-plus-nomargin" id="img_4_profile_mobile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16  padding-lr-zero" id="collapseExample42"> 
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px neRefineScroll">
											<?php
												$religion_arr = $this->common_model->dropdown_array_table('religion');
												if(isset($religion_arr) && $religion_arr !='' && is_array($religion_arr) && count($religion_arr) > 0)
												{
													$religion_curr = $comm_model->get_data_fromArray($search_filed_data,'religion');
													foreach($religion_arr as $reli_key=>$reli_val)
													{
														$cheked = "";
														if(isset($religion_curr) && $religion_curr !='' && is_array($religion_curr) && count($religion_curr) && in_array($reli_key,$religion_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="rel_<?php echo $reli_key; ?>" type="checkbox" value="<?php echo $reli_key; ?>" name="religion[]" class="religion row xxl-4 xl-4 xs-4 s-4 m-4 l-4" onClick="getlist_onchange('religion','caste')">
															<label for="rel_<?php echo $reli_key; ?>" class="religion xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $reli_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search_mobile();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('religion');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero" id="getcaste">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample52" aria-expanded="false" aria-controls="collapseExample12" onclick="change_img('5_profile_mobile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Diocese
												<span class="collapse-plus-nomargin" id="img_5_profile_mobile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16  padding-lr-zero" id="collapseExample52"> 
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px neRefineScroll" id="list_disp_caste">
											<?php
												if(isset($religion_curr) && $religion_curr !='' && is_array($religion_curr) && count($religion_curr))
												{
													$cast_curr = $comm_model->get_data_fromArray($search_filed_data,'caste');
													echo $this->search_model->get_list('religion','caste',$religion_curr,$cast_curr,$app_csrf=0);
													/*$this->db->where_in('religion_id',$religion_curr);
														$cast_arr = $comm_model->get_count_data_manual('caste',array('status'=>'APPROVED'),2,' * ');
														if(isset($cast_arr) && $cast_arr !='' && count($cast_arr) > 0)
														{
														$cast_curr = $comm_model->get_data_fromArray($search_filed_data,'caste');
														foreach($cast_arr as $cast_arr_val)
														{
														$key = $cast_arr_val['id'];
														$val = $cast_arr_val['caste_name'];
														$cheked = "";
														if(isset($cast_curr) && $cast_curr !='' && count($cast_curr) && in_array($key,$cast_curr))
														{
														$cheked = "checked";
														}
														?>
														<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
														<input <?php echo $cheked; ?> id="caste_<?php echo $key; ?>" type="checkbox" value="<?php echo $key; ?>" name="caste[]" class="caste row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
														<label for="caste_<?php echo $key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $val; ?></label>
														</span>
														</li>
														<?php
														}
													}*/
												}
												else
												{
												?>
												<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
													<span class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search">
														First Select Catholic Community
													</span>
												</li>
												<?php
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search_mobile();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('caste');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>									
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample62" aria-expanded="false" aria-controls="collapseExample12" onclick="change_img('6_profile_mobile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Country
												<span class="collapse-plus-nomargin" id="img_6_profile_mobile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16  padding-lr-zero" id="collapseExample62">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px neRefineScroll">
											<?php
												$country_arr = $this->common_model->dropdown_array_table('country_master');
												if(isset($country_arr) && $country_arr !='' && is_array($country_arr) && count($country_arr) > 0)
												{
													$country_curr = $comm_model->get_data_fromArray($search_filed_data,'country');
													foreach($country_arr as $country_key=>$country_val)
													{
														$cheked = "";
														if(isset($country_curr) && $country_curr !='' && is_array($country_curr) && count($country_curr) && in_array($country_key,$country_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="country_<?php echo $country_key; ?>" type="checkbox" value="<?php echo $country_key; ?>"  onClick="getlist_onchange('country','state')" name="country[]" class="country row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
															<label for="country_<?php echo $country_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $country_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search_mobile();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('country');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero" id="getstate">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample72" aria-expanded="false" aria-controls="collapseExample12" onclick="change_img('7_profile_mobile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												State
												<span class="collapse-plus-nomargin" id="img_7_profile_mobile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16  padding-lr-zero" id="collapseExample72">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px neRefineScroll" id="list_disp_state">
											<?php
												if(isset($country_curr) && $country_curr !='' && is_array($country_curr) && count($country_curr))
												{
													$state_curr = $comm_model->get_data_fromArray($search_filed_data,'state');
													echo $this->search_model->get_list('country','state',$country_curr,$state_curr,$app_csrf=0);
													
													/*$this->db->where_in('country_id',$country_curr);
														$state_arr = $comm_model->get_count_data_manual('state_master',array('status'=>'APPROVED'),2,' * ');
														if(isset($state_arr) && $state_arr !='' && count($state_arr) > 0)
														{
														$state_curr = $comm_model->get_data_fromArray($search_filed_data,'state');
														foreach($state_arr as $state_arr_val)
														{
														$key = $state_arr_val['id'];
														$val = $state_arr_val['state_name'];
														$cheked = "";
														if(isset($state_curr) && $state_curr !='' && count($state_curr) && in_array($key,$state_curr))
														{
														$cheked = "checked";
														}
														?>
														<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
														<input <?php echo $cheked; ?> id="state_<?php echo $key; ?>" type="checkbox" value="<?php echo $key; ?>" name="state[]" class="state row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
														<label for="state_<?php echo $key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $val; ?></label>
														</span>
														</li>
														<?php
														}
													}*/
												}
												else
												{
												?>	
												<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
													<span class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search">
														First Select Country
													</span>
												</li>
												<?php
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search_mobile();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('state');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample82" aria-expanded="false" aria-controls="collapseExample12" onclick="change_img('8_profile_mobile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												City
												<span class="collapse-plus-nomargin" id="img_8_profile_mobile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16  padding-lr-zero" id="collapseExample82">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px neRefineScroll"  id="list_disp_city">
											<?php
												if(isset($state_curr)&& $state_curr !='' && is_array($state_curr) && count($state_curr))
												{
													$city_curr = $comm_model->get_data_fromArray($search_filed_data,'city');
													echo $this->search_model->get_list('state','city',$state_curr,$city_curr,$app_csrf=0);
													/*if(isset($city_arr) && $city_arr !='' && count($city_arr) > 0)
														{
														$city_curr = $comm_model->get_data_fromArray($search_filed_data,'city');
														foreach($city_arr as $city_arr_val)
														{
														$key = $city_arr_val['id'];
														$val = $city_arr_val['city_name'];
														$cheked = "";
														if(isset($city_curr) && $city_curr !='' && count($city_curr) && in_array($key,$city_curr))
														{
														$cheked = "checked";
														}
														?>
														<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
														<input <?php echo $cheked; ?> id="city_<?php echo $key; ?>" type="checkbox" value="<?php echo $key; ?>" name="city[]" class="city row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
														<label for="city_<?php echo $key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $val; ?></label>
														</span>
														</li>
														<?php
														}
													}*/
												}
												else
												{
												?>	
												<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
													<span class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search">
														First Select State
													</span>
												</li>
												<?php
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search_mobile();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('city');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero" >
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample92" aria-expanded="false" aria-controls="collapseExample12"  onclick="change_img('9_profile_mobile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Mother Tongue
												<span class="collapse-plus-nomargin" id="img_9_profile_mobile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16  padding-lr-zero" id="collapseExample92">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px neRefineScroll">
											<?php
												$mothertoung_arr = $this->common_model->dropdown_array_table('mothertongue');
												if(isset($mothertoung_arr) && $mothertoung_arr !='' && is_array($mothertoung_arr) && count($mothertoung_arr) > 0)
												{
													$mothertongue_curr = $comm_model->get_data_fromArray($search_filed_data,'mothertongue');
													foreach($mothertoung_arr as $mtou_key=>$mtou_val)
													{
														$cheked = "";
														if(isset($mothertongue_curr) && $mothertongue_curr !='' && is_array($mothertongue_curr) &&  count($mothertongue_curr) && in_array($mtou_key,$mothertongue_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="mothertongue_<?php echo $mtou_key; ?>" type="checkbox" value="<?php echo $mtou_key; ?>" name="mothertongue[]" class="mothertongue row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
															<label for="mothertongue_<?php echo $mtou_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $mtou_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search_mobile();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('mothertongue');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample112" aria-expanded="false" aria-controls="collapseExample12" onclick="change_img('11_profile_mobile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Education
												<span class="collapse-plus-nomargin" id="img_11_profile_mobile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero" id="collapseExample112">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px neRefineScroll">
											<?php
												$education_arr = $this->common_model->dropdown_array_table('education_detail');
												if(isset($education_arr) && $education_arr !='' && is_array($education_arr) && count($education_arr) > 0)
												{
													$education_curr = $comm_model->get_data_fromArray($search_filed_data,'education');
													foreach($education_arr as $educ_key=>$educ_val)
													{
														$cheked = "";
														if(isset($education_curr) && $education_curr !='' && is_array($education_curr) && count($education_curr) && in_array($educ_key,$education_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="education_<?php echo $educ_key; ?>" type="checkbox" value="<?php echo $educ_key; ?>" name="education[]" class="education row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
															<label for="education_<?php echo $educ_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $educ_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search_mobile();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('education');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample122" aria-expanded="false" aria-controls="collapseExample12"  onclick="change_img('12_profile_mobile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Occupation
												<span class="collapse-plus-nomargin" id="img_12_profile_mobile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero" id="collapseExample122">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px neRefineScroll">
											<?php
												$occupation_arr = $this->common_model->dropdown_array_table('occupation');
												if(isset($occupation_arr) && $occupation_arr !='' && is_array($occupation_arr) && count($occupation_arr) > 0)
												{
													$occupation_curr = $comm_model->get_data_fromArray($search_filed_data,'occupation');
													foreach($occupation_arr as $ocup_key=>$ocup_val)
													{
														$cheked = "";
														if(isset($occupation_curr) && $occupation_curr !='' && is_array($occupation_curr) && count($occupation_curr) && in_array($ocup_key,$occupation_curr))
														{
															$cheked = "checked";
														}													
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="occupation_<?php echo $ocup_key; ?>" type="checkbox" value="<?php echo $ocup_key; ?>" name="occupation[]" class="occupation row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
															<label for="occupation_<?php echo $ocup_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $ocup_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search_mobile();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('occupation');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample132" aria-expanded="false" aria-controls="collapseExample12"  onclick="change_img('13_profile_mobile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Annual Income
												<span class="collapse-plus-nomargin" id="img_13_profile_mobile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero" id="collapseExample132">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px neRefineScroll">
											<?php
												$income_arr = $this->common_model->get_list_ddr('income');
												if(isset($income_arr) && $income_arr !='' && is_array($income_arr) && count($income_arr) > 0)
												{
													$income_curr = $comm_model->get_data_fromArray($search_filed_data,'income');
													foreach($income_arr as $income_key=>$income_val)
													{
														$cheked = "";
														if(isset($income_curr) && $income_curr !='' && is_array($income_curr) && count($income_curr) && in_array($income_key,$income_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="<?php echo $income_key; ?>" type="checkbox" value="<?php echo $income_key; ?>" name="income[]" class="income row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
															<label for="<?php echo $income_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $income_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search_mobile();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('income');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample2212" aria-expanded="false" aria-controls="collapseExample12"  onclick="change_img('221_profile_mobile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Employee In
												<span class="collapse-plus-nomargin" id="img_221_profile_mobile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero" id="collapseExample2212">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px neRefineScroll">
											<?php
												$employee_in_arr = $this->common_model->get_list_ddr('employee_in');
												if(isset($employee_in_arr) && $employee_in_arr !='' && is_array($employee_in_arr) && count($employee_in_arr) > 0)
												{
													$employee_in_curr = $comm_model->get_data_fromArray($search_filed_data,'employee_in');
													foreach($employee_in_arr as $emp_key=>$emp_val)
													{
														$cheked = "";
														if(isset($employee_in_curr) && $employee_in_curr !='' && is_array($employee_in_curr) &&  count($employee_in_curr) && in_array($emp_key,$employee_in_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="employee_in_<?php echo $emp_key; ?>" type="checkbox" value="<?php echo $emp_key; ?>" name="employee_in[]" class="employee_in row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
															<label for="employee_in_<?php echo $emp_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $emp_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search_mobile();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('employee_in');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample13_12" aria-expanded="false" aria-controls="collapseExample12" onclick="change_img('13_1_profile_mobile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Smoking
												<span class="collapse-plus-nomargin" id="img_13_1_profile_mobile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero" id="collapseExample13_12">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px ">
											<?php
												$smoke_arr = $this->common_model->get_list_ddr('smoke');
												if(isset($smoke_arr) && $smoke_arr !='' && is_array($smoke_arr) && count($smoke_arr) > 0)
												{
													$smoke_curr = $comm_model->get_data_fromArray($search_filed_data,'smoking');
													foreach($smoke_arr as $smoke_key=>$smoke_val)
													{
														$cheked = "";
														if(isset($smoke_curr) && $smoke_curr !='' && is_array($smoke_curr) && count($smoke_curr) && in_array($smoke_key,$smoke_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="smoke_<?php echo $smoke_key; ?>" type="checkbox" value="<?php echo $smoke_key; ?>" name="smoking[]" class="smoking row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
															<label for="smoke_<?php echo $smoke_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $smoke_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search_mobile();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('smoking');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample142" aria-expanded="false" aria-controls="collapseExample12"  onclick="change_img('14_profile_mobile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Drinking
												<span class="collapse-plus-nomargin" id="img_14_profile_mobile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero" id="collapseExample142">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px ">
											<?php
												$drink_arr = $this->common_model->get_list_ddr('drink');
												if(isset($drink_arr) && $drink_arr !='' && is_array($drink_arr) && count($drink_arr) > 0)
												{
													$drink_curr = $comm_model->get_data_fromArray($search_filed_data,'drink');
													foreach($drink_arr as $drink_key=>$drink_val)
													{
														$cheked = "";
														if(isset($drink_curr) && $drink_curr !='' && is_array($drink_curr) && count($drink_curr) && in_array($drink_key,$drink_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="drink_<?php echo $drink_key; ?>" type="checkbox" value="<?php echo $drink_key; ?>" name="drink[]" class="drink row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
															<label for="drink_<?php echo $drink_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $drink_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search_mobile();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('drink');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample152" aria-expanded="false" aria-controls="collapseExample12" onclick="change_img('15_profile_mobile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Eating Habits
												<span class="collapse-plus-nomargin" id="img_15_profile_mobile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero" id="collapseExample152">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px ">
											<?php
												$diet_arr = $this->common_model->get_list_ddr('diet');
												if(isset($diet_arr) && $diet_arr !='' && is_array($diet_arr) && count($diet_arr) > 0)
												{
													$diet_curr = $comm_model->get_data_fromArray($search_filed_data,'diet');
													foreach($diet_arr as $diet_key=>$diet_val)
													{
														$cheked = "";
														if(isset($diet_curr) && $diet_curr !='' && is_array($diet_curr) && count($diet_curr) && in_array($diet_key,$diet_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="diet_<?php echo $diet_key; ?>" type="checkbox" value="<?php echo $diet_key; ?>" name="diet[]" class="diet row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
															<label for="diet_<?php echo $diet_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $diet_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search_mobile();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('diet');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample162" aria-expanded="false" aria-controls="collapseExample12" onclick="change_img('16_profile_mobile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Profile Picture
												<span class="collapse-plus-nomargin" id="img_16_profile_mobile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16  padding-lr-zero" id="collapseExample162">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px ">
											<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
												<span class="">
													<?php 
														$photo_search = $comm_model->get_data_fromArray($search_filed_data,'photo_search');
														$photo_search_checked = '';
														if(isset($photo_search) && $photo_search !='' && $photo_search =='photo_search')
														{
															$photo_search_checked = 'checked';
															
														}
													?>
													<input <?php echo $photo_search_checked; ?> id="photo_search" type="checkbox" value="photo_search" name="photo_search" class="row xxl-4 xl-4 xs-4 s-4 m-4 l-4" onClick="refine_search_mobile();">
													
													<label for="photo_search" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search">With Picture</label>
												</span>
											</li>
										</ul>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample172" aria-expanded="false" aria-controls="collapseExample12" onclick="change_img('17_profile_mobile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Complexion
												<span class="collapse-plus-nomargin" id="img_17_profile_mobile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero" id="collapseExample172">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px ">
											<?php
												$complexion_arr = $this->common_model->get_list_ddr('complexion');
												if(isset($complexion_arr) && $complexion_arr !='' && is_array($complexion_arr) && count($complexion_arr) > 0)
												{
													$complexion_curr = $comm_model->get_data_fromArray($search_filed_data,'complexion');
													foreach($complexion_arr as $complexion_key=>$complexion_val)
													{
														$cheked = "";
														if(isset($complexion_curr) && $complexion_curr !='' && is_array($complexion_curr) && count($complexion_curr) && in_array($complexion_key,$complexion_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="complexion_<?php echo $complexion_key; ?>" type="checkbox" value="<?php echo $complexion_key; ?>" name="complexion[]" class="complexion row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
															<label for="complexion_<?php echo $complexion_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $complexion_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search_mobile();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('complexion');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample182" aria-expanded="false" aria-controls="collapseExample12" onclick="change_img('18_profile_mobile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Body Type
												
												<span class="collapse-plus-nomargin" id="img_18_profile_mobile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero" id="collapseExample182">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px neRefineScroll">
											<?php
												$bodytype_arr = $this->common_model->get_list_ddr('bodytype');
												if(isset($bodytype_arr) && $bodytype_arr !='' && is_array($bodytype_arr) && count($bodytype_arr) > 0)
												{
													$bodytype_curr = $comm_model->get_data_fromArray($search_filed_data,'bodytype');
													foreach($bodytype_arr as $bodytype_key=>$bodytype_val)
													{
														$cheked = "";
														if(isset($bodytype_curr) && $bodytype_curr !='' && is_array($bodytype_curr) && count($bodytype_curr) && in_array($bodytype_key,$bodytype_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="bodytype_<?php echo $bodytype_key; ?>" type="checkbox" value="<?php echo $bodytype_key; ?>" name="bodytype[]" class="bodytype row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
															<label for="bodytype_<?php echo $bodytype_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $bodytype_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search_mobile();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('bodytype');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample192" aria-expanded="false" aria-controls="collapseExample12" onclick="change_img('19_profile_mobile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Star
												<span class="collapse-plus-nomargin" id="img_19_profile_mobile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero" id="collapseExample192">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px neRefineScroll">
											<?php
												$star_arr = $this->common_model->get_list_ddr('star');
												if(isset($star_arr) && $star_arr !='' && is_array($star_arr) && count($star_arr) > 0)
												{
													$star_curr = $comm_model->get_data_fromArray($search_filed_data,'star');
													foreach($star_arr as $star_key=>$star_val)
													{
														$cheked = "";
														if(isset($star_curr) && $star_curr !='' && is_array($star_curr) && count($star_curr) && in_array($star_key,$star_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="star_<?php echo $star_key; ?>" type="checkbox" value="<?php echo $star_key; ?>" name="star[]" class="star row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
															<label for="star_<?php echo $star_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $star_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search_mobile();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('star');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-btm-lgt-grey ne_pad_btm_10px neBoxShadowBtm2px padding-lr-zero">
									<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 ne_bg_alert ne-box-shd-1px-lgt-grey border-top" data-toggle="collapse" role="navigation" data-target="#collapseExample202" aria-expanded="false" aria-controls="collapseExample12" onclick="change_img('20_profile_mobile')">
										<a class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero">
											<h4 class="margin-bottom-0px margin-top-0px ne_pad_btm_10px ne_pad_tp_10px center-text ne_font_weight_nrm ne_bg_alert ">
												Manglik
												<span class="collapse-plus-nomargin" id="img_20_profile_mobile"></span>
											</h4>
										</a>
									</div>
									<div class="collapse xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero" id="collapseExample202">
										<ul class="xxl-16 xl-16 padding-lr-zero margin-top-10px neRefineScroll">
											<?php
												$manglik_arr = $this->common_model->get_list_ddr('manglik');
												if(isset($manglik_arr) && $manglik_arr !='' && is_array($manglik_arr) && count($manglik_arr) > 0)
												{
													$manglik_curr = $comm_model->get_data_fromArray($search_filed_data,'manglik');
													foreach($manglik_arr as $manglik_key=>$manglik_val)
													{
														$cheked = "";
														if(isset($manglik_curr) && $manglik_curr !='' && is_array($manglik_curr) && count($manglik_curr) && in_array($manglik_key,$manglik_curr))
														{
															$cheked = "checked";
														}
													?>
													<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero">
														<span class="">
															<input <?php echo $cheked; ?> id="manglik_<?php echo $manglik_key; ?>" type="checkbox" value="<?php echo $manglik_key; ?>" name="manglik[]" class="manglik row xxl-4 xl-4 xs-4 s-4 m-4 l-4">
															<label for="manglik_<?php echo $manglik_key; ?>" class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search"><?php echo $manglik_val; ?></label>
														</span>
													</li>
													<?php
													}
												}
											?>
										</ul>
										<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-xs">
											<a class="xxl-7 xl-7 xs-7 l-7 m-7 s-7 clear ne-cursor" onClick="refine_search_mobile();">
												<i class="fa fa-search ne_mrg_ri8_10 text-grey"></i>Search
											</a>
											<span class="xxl-1 xl-1 xs-1 l-1 m-1 s-1">&nbsp;</span>
											<a class="xxl-6 xl-6 xs-6 l-6 m-6 s-6 clear ne-cursor" onClick="clear_refine('manglik');">
												<i class="fa fa-times-circle-o ne_mrg_ri8_10 text-grey"></i>Clear
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								
							</form>                        
						</div>
					</div>
				</div>
				<!--<div class="">
                	<div class="clearfix"></div>
                    <div class="xxl-16 xl-16 m-16 l-16 xs-16 s-16 compltele-profile hidden-sm hidden-xs margin-bottom-15 margin-top-5" style="padding-top:0px;padding-bottom:0px;">
					<div class="row margin-bottom-20px" style="padding:4px;">
					<h3 class="upgrade-heading font-16 text-center" style="margin:0px;">
					Connect with Matches
					</h3>
					<div class="xxl-16 xl-16 m-16 l-16 xs-16 s-16 margin-top-10">
					<div class="row search_contact">
					<center>
					
					<div class="xxl-16 xl-16 m-16 l-16 xs-16 s-16">
					<div class="search_mail xxl-16 xl-16 m-16 l-16 xs-16 s-16">
					<div class="search_image">
					<div class="srch_mail_icon"></div>
					<p class="search_txt margin-top-10">Send Email</p>
					</div>
					<br/><br/>
					</div>
					</div>
					<div class="clearfix"></div>
					<div class="xxl-16 xl-16 m-16 l-16 xs-16 s-16 ">
					<div class="search_mail xxl-16 xl-16 m-16 l-16 xs-16 s-16">
					<div class="search_image">
					<div class="srch_chat_icon"></div>
					<p class="search_txt">Chat</p>
					</div>
					<br/><br/>
					</div>
					</div>
					<div class="clearfix"></div>
					<div class="xxl-16 xl-16 m-16 l-16 xs-16 s-16 border-left">
					<div class="search_mail xxl-16 xl-16 m-16 l-16 xs-16 s-16">
					<div class="search_image">
					<div class="srch_phn_icon" style="width:100px;"></div>
					<p class="search_txt">Call / Send SMS</p>
					</div>
					</div>
					</div>
					
					</center>
					</div>
					</div>
					<div class="clearfix"></div>
					
					<div class="xxl-16 xl-16 m-16 l-16 xs-16 s-16 margin-top-10">
					<div class="text-center">
					<a href="<?php echo $base_url.'premium-member';?>" class="btn">Upgrade Now <i class="fa fa-chevron-right"></i></a>
					</div>
					<div class="xxl-16 xl-16 m-16 l-16 xs-16 s-16 margin-top-10 text-center">
					<h3 class="font-weight-normal text-grey">Other Benefits</h3>
					<p class="text-darkgrey font-14 text-center">- View Member Photo</p>
					<p class="text-darkgrey font-14 text-center">- Make your profile stand out in search results</p>
					</div>
					</div>
					</div>
                    </div>
    	            <?php //include_once('success_story_side_bar.php'); ?>
				</div>-->
			</div>
		</div>
		
		<!-- for search side bar-->
		<!-- for search result -->
		<div class="xxl-12 xl-12 xs-16 m-16 s-16 l-11 ne_myhome_tab" id="main_content_ajax">
			<?php include_once('search_result_member_profile.php'); ?>                  
		</div>
		<!-- for search result -->
		
	</div>
</div>
<!---refine search end-->
<div class="margin-top-20px hidden-lg hidden-md"></div>
<div id="myModal_sendinterest" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/love-message.png" class="margin-right-5" alt="" />Send Interest</h4>
			</div>
			<div class="modal-body">
				<div class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 margin-top-10px-320px margin-top-10px-480px ne-mrg-top-10-768 margin-top-10px-999">
					<ul class="list-unstyled">                              
						<li class="margin-right-5"><input name="exp_interest" class="radio-inline" type="radio" value="I am interested in your profile. Please Accept if you are interested." checked=""> I am interested in your profile. Please Accept if you are interested.</li>
						
						<li class="margin-right-5"><input name="exp_interest" class="radio-inline" type="radio" value="You are the kind of person we have been looking for. Please respond to proceed further."> You are the kind of person we have been looking for. Please respond to proceed further.</li>
						
						<li class="margin-right-5"><input name="exp_interest" class="radio-inline" type="radio" value=" We liked your profile and interested to take it forward. Please reply at the earliest."> We liked your profile and interested to take it forward. Please reply at the earliest.</li>
						
						<li class="margin-right-5"><input name="exp_interest" class="radio-inline" type="radio" value="You seem to be the kind of person who suits our family. We would like to contact your parents to proceed further."> You seem to be the kind of person who suits our family. We would like to contact your parents to proceed further.</li>
						
						<li class="margin-right-5"><input name="exp_interest" class="radio-inline" type="radio" value="You profile matches my sister's/brother's profile. Please 'Accept' if you are interested."> You profile matches my sister's/brother's profile. Please 'Accept' if you are interested.</li>
						
						<li class="margin-right-5"><input name="exp_interest" class="radio-inline" type="radio" value="Our children's profile seems to match. Please reply to proceed further."> Our children's profile seems to match. Please reply to proceed further.</li>
						
						<li class="margin-right-5"><input name="exp_interest" class="radio-inline" type="radio" value="We find a good life partner in you for our friend. Please reply to proceed further."> We find a good life partner in you for our friend. Please reply to proceed further.</li>
					</ul>                                                  
				</div>								
			</div>
			<div class="modal-footer">
				<p class="text-darkgrey font-13 pull-left margin-top-10">Date - Wednesday, 5<sup>th</sup>, July - 2017 (7:23 p.m.) Send Interest</p>
				<a class="btn btn-sm"><i class="fa fa-heart"></i> Send</a>
				<a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</a>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<div class="clearfix"></div>
<div class="margin-top-40"></div>
<?php
	$this->common_model->js_extra_code_fr.="
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
	$(document).ready(function (){
	setTimeout(function(){
	$('#remove_left_panel_message').hide();
	}, 7000);
	$('#test').BootSideMenu({
	side: 'left',
	pushBody:false,
	width: '250px'
	});
	$('[data-toggle=".'"'."tooltip".'"'."]').tooltip(); 
	});
	load_pagination_code_front_end();
	";
?><?php include_once('photo_protect.php'); ?>
<div class="clearfix"></div>