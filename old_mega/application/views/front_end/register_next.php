<?php $member_fb_data = $this->session->userdata('member_fb_data');
$member_fb_data_image_url = '';
if($member_fb_data != '')
{
	if(isset($member_fb_data['fb_image_name']) && $member_fb_data['fb_image_name'] !='')
	{
		$member_fb_data_image_url = $member_fb_data['fb_image_name'];
	}
}

$religion_arr = $this->common_model->dropdown_array_table('religion');
?>
<!-- =====<div class="container"> Start===== -->
<div class="container margin-top-20 margin-bottom-20 padding-lr-zero-xs">
    <div class="bg-border" style="padding:0 0 15px 0">
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active" id="step1_li">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Some Basic Information">
                            <span class="round-tab">
                                <i class="fa fa-info"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled" id="step2_li">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Education Qualification">
                            <span class="round-tab">
                                <img src="<?php echo $base_url; ?>assets/front_end/images/icon/graduation1.png" alt="horoscope" style="margin-top:-7px;" />
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled" id="step3_li">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Eating Habits / Physical Info">
                            <span class="round-tab">
                                <img src="<?php echo $base_url; ?>assets/front_end/images/icon/cutlery.png" alt="horoscope" style="margin-top:-7px;" />
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled" id="step4_li">
                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Religious Information / Other Details ">
                            <span class="round-tab">
                                <img src="<?php echo $base_url; ?>assets/front_end/images/icon/horoscope.gif" alt="Religious Information / Other Details" style="width:63%;margin-top:-7px;" />
                            </span>
                            </a>
                    </li>
                    <li role="presentation" class="disabled" id="complete_li">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Upload Photo">
                            <span class="round-tab">
                                <img src="<?php echo $base_url; ?>assets/front_end/images/icon/add-pic.png" alt="horoscope" style="margin-top:-7px;" />
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content padding-lr-zero-xs">
                <div class="tab-pane active" role="tabpanel" id="step1">
                    <form method="post" id="register_step1" name="register_step1" action="<?php echo $base_url; ?>register/save-register-step/step1" onSubmit="return validat_function(1)">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id"  class="hash_tocken_id" />
                    <input type="hidden" name="is_post" value="1" />
                    <input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />
                    <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero-xs">
                        <h4 class="text-center text-darkgrey bold font-18 font-weight-normal">Thanks for Registering. Now let's build Your Profile</h4>
                        <div class="clearfix"></div>
                        <div class="font-12 pull-right text-darkgrey"><span class="font-red">* </span> Mandatory fields</div>
                    </div>
                    <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-20px-1200 margin-top-20px-1199 margin-top-20px-999 margin-top-15px-480px margin-top-10px-320px reg-main-title" style="margin-top:5px;">
                        <div class="padding-lr-zero-320">
                            <h3 class="font-15-bold-arial title-bg">
                                <i class="fa fa-lg fa-info-circle"></i> Some Basic Information
                            </h3>
                        </div>
						</div>
                    <div class="xxl-12 xs-16 s-16 m-16 l-12 xl-12 padding-lr-zero-xs">
                        <div class="clearfix"></div>
                        <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-bottom-20 padding-lr-zero-xs">
                        	<div class="reponse_message" id="reponse_message"></div>
                            <?php
								$insert_id = $this->session->userdata('recent_reg_id');
								if(isset($insert_id) && $insert_id != '' )
								{
									$row_data = $this->common_model->get_count_data_manual('register',array('id'=>$insert_id,'is_deleted'=>'No'),1);
									if(isset($row_data) && $row_data !='' && count($row_data) > 0)
									{
										$this->common_front_model->edit_row_data = $row_data;
										$this->common_model->edit_row_data = $row_data;
										$this->common_model->mode= 'edit';
										$this->common_front_model->mode= 'edit';
									}
								}
								 $ele_array = array(
									'country_id'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->dropdown_array_table('country_master'),'label'=>'Country','class'=>'select2','onchange'=>"dropdownChange('country_id','state_id','state_list')"),
									'state_id'=>array('is_required'=>'required','type'=>'dropdown','relation'=>array('rel_table'=>'state_master','key_val'=>'id','key_disp'=>'state_name','not_load_add'=>'yes','cus_rel_col_name'=>'country_id'),'label'=>'State','class'=>'select2','onchange'=>"dropdownChange('state_id','city','city_list')"),
            						'city'=>array('is_required'=>'required','type'=>'dropdown','relation'=>array('rel_table'=>'city_master','key_val'=>'id','key_disp'=>'city_name','not_load_add'=>'yes','cus_rel_col_name'=>'state_id'),'label'=>'City','class'=>'select2'),
                                    'other_city'=>array('label'=>'If other city'),
                                    'marital_status'=>array('is_required'=>'required','type'=>'radio','value_arr'=>$this->common_model->get_list_ddr('marital_status'),'onclick'=>'display_total_childern()'),
									'total_children'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->get_list_ddr('total_children'),'value_curr'=>0,'extra'=>'disabled','onchange'=>'display_childern_status()'),
									'status_children'=>array('is_required'=>'required','type'=>'radio','value_arr'=>$this->common_model->get_list_ddr('status_children'),'extra'=>'disabled'),
									'mother_tongue'=>array('is_required'=>'required','type'=>'dropdown','class'=>'select2','value_arr'=>$this->common_model->dropdown_array_table('mothertongue'),'label'=>'Mother Tongue'),
								);
								echo $this->common_front_model->generate_common_front_form($ele_array,array('page_type'=>'register'));
                            ?>
                        </div>
                    </div>
                    <div class="xxl-4 xs-16 s-16 m-16 l-4 xl-4 padding-lr-zero-xs hidden-xs">
                        <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-10 text-center">
                            <h4 class="text-darkgrey font-13 bold">Why Register ?</h4>
                            <hr>
                            <div class="carousel slide" data-ride="carousel" id="quote-carousel_1">
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <div class="owl-carousel xxl-16 padding-lr-zero">
                                            <div class="margin-top-10">
                                                <div class="reg-sprtie profile"></div>
                                                <p class="sprite-caption">Lakhs of Genuine <br/>Profiles</p>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="row-center"><hr style="width:50%;"></div>
                                            <div class="margin-top-15">
                                                <div class="reg-sprtie man"></div>
                                                <p class="sprite-caption">Many Verified by <br/>Personal Visit</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="owl-carousel xxl-16 padding-lr-zero">
                                            <div class="margin-top-10">
                                                <div class="reg-sprtie secure"></div>
                                                <p class="sprite-caption">Secure & <br/>Family Friendly</p>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="row-center"><hr style="width:50%;"></div>
                                            <div class="margin-top-15">
                                                <div class="reg-sprtie privacy-key"></div>
                                                <p class="sprite-caption">Strict <br/>Privacy Control</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a data-slide="prev" href="#quote-carousel_1" class="left carousel-control" style="color:#F9A630;"><img class="img-circle" src="<?php echo $base_url; ?>assets/front_end/images/icon/arrow-lft-mh.gif" alt=""></a>
                                <a data-slide="next" href="#quote-carousel_1" class="right carousel-control" style="color:#F9A630;"><img class="img-circle" src="<?php echo $base_url; ?>assets/front_end/images/icon/arrow-rgt-mh.gif" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-20px-1200 margin-top-20px-1199 margin-top-20px-999 margin-top-15px-480px margin-top-10px-320px reg-main-title" style="margin-top:5px;">
                        <div class="padding-lr-zero-320">
                            <h3 class="font-15-bold-arial title-bg">
                                <i class="fa fa-lg fa-info-circle"></i> Some Basic Partner Preferences
                            </h3>
                        </div>
                    </div>
                    <div class="xxl-12 xs-16 s-16 m-16 l-12 xl-12 padding-lr-zero-xs">
                        <div class="clearfix"></div>
                        <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-bottom-20 padding-lr-zero-xs">
                            <?php
								 $ele_array = array(
									'looking_for'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->get_list_ddr('marital_status'),'label'=>'Looking For','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2'),
									'part_frm_age'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->age_rang(),'label'=>"Partner From Age",'class'=>'select2'),
									'part_to_age'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->age_rang(),'label'=>"Partner To Age",'class'=>'select2'),
									'part_height'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->height_list(),'label'=>"Partner From Height",'class'=>'select2'),
									'part_height_to'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->height_list(),'label'=>"Partner To Height",'class'=>'select2'),
								);
								echo $this->common_front_model->generate_common_front_form($ele_array,array('page_type'=>'register'));
                            ?>
                        </div>
                    </div>
                    <hr style="margin-top:0px;">
                    <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
                        <button onClick="return validat_function(1)" class="text-white font-15 bold btn pull-right btn-md next-step1" >Save and continue <i class="fa fa-chevron-right"></i></button>
                        <input type="button" class="next-step" style="display:none" id="next_step1" />
                    </div>
                    </form>
                </div>
                <div class="clearfix"></div>
                                
                <div class="tab-pane" role="tabpanel" id="step2">
                	<form method="post" id="register_step2" name="register_step2" action="<?php echo $base_url; ?>register/save-register-step/step2"  onSubmit="return validat_function(2)">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id"  class="hash_tocken_id" />
                    <input type="hidden" name="is_post" value="1" />
                    <input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />
                    <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero-xs">
                        <h4 class="text-center text-darkgrey bold font-18 font-weight-normal">Add your Education Information to make stronger Your Profile</h4>
                        <div class="clearfix"></div>
                        <div class="font-12 pull-right text-darkgrey"><span class="font-red">* </span> Mandatory fields</div>
                    </div>
                    
                    <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-20px-1200 margin-top-20px-1199 margin-top-20px-999 margin-top-15px-480px margin-top-10px-320px reg-main-title padding-lr-zero-xs" style="margin-top:5px;">
                        <h3 class="font-15-bold-arial title-bg">
                            <a href="#" class="text-white">
                                <i class="fa fa-graduation-cap"></i> Education / Occupation Details:
                            </a>
                        </h3>
                    </div>
                    <div class="clearfix"></div>
                    
                	<div class="xxl-12 xs-16 s-16 m-16 l-12 xl-12 padding-lr-zero-xs">
                        <div class="clearfix"></div>
                        <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-bottom-20 padding-lr-zero-xs">
                        	<div class="reponse_message" id="reponse_message"></div>
                            <?php
								 $ele_array = array(
									'education_detail'=>array('is_required'=>'required','type'=>'dropdown','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','value_arr'=>$this->common_model->dropdown_array_table('education_detail'),'label'=>'Education','extra_style'=>'width:100%'),
									'employee_in'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->get_list_ddr('employee_in'),'extra_style'=>'width:100%'),
									'income'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->get_list_ddr('income'),'label'=>'Annual Income','extra_style'=>'width:100%'),
									'occupation'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->dropdown_array_table('occupation'),'label'=>'Occupation','class'=>'select2','extra_style'=>'width:100%'),
									'designation'=>array('is_required'=>'required','type'=>'dropdown','class'=>'select2','value_arr'=>$this->common_model->dropdown_array_table('designation'),'extra_style'=>'width:100%'),
									
								);
								echo $this->common_front_model->generate_common_front_form($ele_array,array('page_type'=>'register'));
                            ?>
                        </div>                
                	</div>
                    <div class="xxl-4 xs-16 s-16 m-16 l-4 xl-4 padding-lr-zero-xs hidden-xs">
                        <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-10 text-center">
                            <h4 class="text-darkgrey font-13 bold">Why Register ?</h4>
                            <hr>
                            
                            <div class="carousel slide" data-ride="carousel" id="quote-carousel_2">
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <div class="owl-carousel xxl-16 padding-lr-zero">
                                            <div class="margin-top-10">
                                                <div class="reg-sprtie profile"></div>
                                                <p class="sprite-caption">Lakhs of Genuine <br/>Profiles</p>
                                            </div>
                                            <div class="clearfix"></div>
                                           <div class="row-center"><hr style="width:50%;"></div>
                                            <div class="margin-top-15">
                                                <div class="reg-sprtie man"></div>
                                                <p class="sprite-caption">Many Verified by <br/>Personal Visit</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="owl-carousel xxl-16 padding-lr-zero">
                                            <div class="margin-top-10">
                                                <div class="reg-sprtie secure"></div>
                                                <p class="sprite-caption">Secure & <br/>Family Friendly</p>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="row-center"><hr style="width:50%;"></div>
                                            <div class="margin-top-15">
                                                <div class="reg-sprtie privacy-key"></div>
                                                <p class="sprite-caption">Strict <br/>Privacy Control</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a data-slide="prev" href="#quote-carousel_2" class="left carousel-control" style="color:#F9A630;"><img class="img-circle" src="<?php echo $base_url; ?>assets/front_end/images/icon/arrow-lft-mh.gif" alt=""></a>
                                <a data-slide="next" href="#quote-carousel_2" class="right carousel-control" style="color:#F9A630;"><img class="img-circle" src="<?php echo $base_url; ?>assets/front_end/images/icon/arrow-rgt-mh.gif" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
                        <a class="text-white font-15 bold btn pull-left btn-md prev-step"><i class="fa fa-chevron-left"></i> Previous</a>
                        <button onClick="return validat_function(2)" class="text-white font-15 bold btn pull-right btn-md next-step1" >Save and continue <i class="fa fa-chevron-right"></i></button>
                        <input type="button" class="next-step" style="display:none" id="next_step2" />
                    </div>
                    </form>
                </div>
                
                <div class="tab-pane" role="tabpanel padding-lr-zero-xs" id="step3">
                <form method="post" id="register_step3" name="register_step3" action="<?php echo $base_url; ?>register/save-register-step/step3" onSubmit="return validat_function(3)">
                	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id"  class="hash_tocken_id" />
                    <input type="hidden" name="is_post" value="1" />
                    <input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />
                    <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero-xs">
                        <h4 class="text-center text-darkgrey bold font-18 font-weight-normal">Add your Eating Habits / Drinking / Smoking / Physical Info to make more Attractive Your Profile</h4>
                        <div class="clearfix"></div>
                        <div class="font-12 pull-right text-darkgrey"><span class="font-red">* </span> Mandatory fields</div>
                    </div>
                    <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-20px-1200 margin-top-20px-1199 margin-top-20px-999 margin-top-15px-480px margin-top-10px-320px reg-main-title padding-lr-zero-xs" style="margin-top:5px;">
                        <h3 class="font-15-bold-arial title-bg">
                            <a href="#" class="text-white">
                                <i class="fa fa-cutlery"></i> Eating Habits / Smoking / Physical Info Details:
                            </a>
                        </h3>
                    </div>
                    <div class="clearfix"></div>
                    <div class="xxl-12 xs-16 s-16 m-16 l-12 xl-12 padding-lr-zero-xs">
                        <div class="clearfix"></div>
                        <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-bottom-20 padding-lr-zero-xs">
                        	<div class="reponse_message" id="reponse_message"></div>
                            <?php
								 $ele_array = array(
									'height'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->height_list(),'extra_style'=>'width:100%'),
									'weight'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->weight_list(),'extra_style'=>'width:100%'),
									'diet'=>array('label'=>'Eating Habits','is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->get_list_ddr('diet'),'extra_style'=>'width:100%'),
									'smoke'=>array('label'=>'Smoking','is_required'=>'required','type'=>'radio','value_arr'=>$this->common_model->get_list_ddr('smoke'),'value'=>'No','extra_style'=>'width:100%'),
									'drink'=>array('label'=>'Drinking','is_required'=>'required','type'=>'radio','value_arr'=>$this->common_model->get_list_ddr('drink'),'value'=>'No','extra_style'=>'width:100%'),
									'bodytype'=>array('label'=>'Body Type','is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->get_list_ddr('bodytype'),'extra_style'=>'width:100%'),
									'complexion'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->get_list_ddr('complexion'),'label'=>'Skin Tone','extra_style'=>'width:100%'),
									
								);
								echo $this->common_front_model->generate_common_front_form($ele_array,array('page_type'=>'register'));
                            ?>
                        </div>
                    </div>
                    <div class="xxl-4 xs-16 s-16 m-16 l-4 xl-4 padding-lr-zero-xs hidden-xs">
                        <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-10 text-center hidden-sm hidden-xs">
                            <h4 class="text-darkgrey font-13 bold">Why Register ?</h4>
                            <hr>
                            
                            <div class="carousel slide" data-ride="carousel" id="quote-carousel_3">
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <div class="owl-carousel xxl-16 padding-lr-zero">
                                            <div class="margin-top-10">
                                                <div class="reg-sprtie profile"></div>
                                                <p class="sprite-caption">Lakhs of Genuine <br/>Profiles</p>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="row-center"><hr style="width:50%;"></div>
                                            <div class="margin-top-15">
                                                <div class="reg-sprtie man"></div>
                                                <p class="sprite-caption">Many Verified by <br/>Personal Visit</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="owl-carousel xxl-16 padding-lr-zero">
                                            <div class="margin-top-10">
                                                <div class="reg-sprtie secure"></div>
                                                <p class="sprite-caption">Secure & <br/>Family Friendly</p>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="row-center"><hr style="width:50%;"></div>
                                            <div class="margin-top-15">
                                                <div class="reg-sprtie privacy-key"></div>
                                                <p class="sprite-caption">Strict <br/>Privacy Control</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a data-slide="prev" href="#quote-carousel_3" class="left carousel-control" style="color:#F9A630;"><img class="img-circle" src="<?php echo $base_url; ?>assets/front_end/images/icon/arrow-lft-mh.gif" alt=""></a>
                                <a data-slide="next" href="#quote-carousel_3" class="right carousel-control" style="color:#F9A630;"><img class="img-circle" src="<?php echo $base_url; ?>assets/front_end/images/icon/arrow-rgt-mh.gif" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
                        <a class="text-white font-15 bold btn pull-left btn-md prev-step"><i class="fa fa-chevron-left"></i> Previous</a>
                        <button onClick="return validat_function(3)" class="text-white font-15 bold btn pull-right btn-md next-step1" >Save and continue <i class="fa fa-chevron-right"></i></button>
                        <input type="button" class="next-step" style="display:none" id="next_step3" />
                        
                        <!--<a class="text-white font-15 bold btn pull-right btn-md next-step margin-right-10 margin-top-10-sm text-left-xs skip hidden-xs">Skip <i class="fa fa-chevron-right"></i></a>-->
                    </div>
                    
                    <!--<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-10 hidden-lg hidden-md hidden-sm">
                    	<a class="text-white font-15 bold btn pull-right btn btn-md next-step margin-top-10-sm pull-right">Skip <i class="fa fa-chevron-right"></i></a>
                    </div>-->
                    </form>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="tab-pane" role="tabpanel padding-lr-zero-xs" id="step4">
                <form method="post" id="register_step4" name="register_step4" action="<?php echo $base_url; ?>register/save-register-step/step4" onSubmit="return validat_function(4)">
                	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id"  class="hash_tocken_id" />
                    <input type="hidden" name="is_post" value="1" />
                    <input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />
                    <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero-xs">
                        <h4 class="text-center text-darkgrey bold font-18 font-weight-normal">Add your Religious Information / Other Information to make better Profile</h4>
                        <div class="clearfix"></div>
                        <div class="font-12 pull-right text-darkgrey"><span class="font-red">* </span> Mandatory fields</div>
                    </div>
                    <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-20px-1200 margin-top-20px-1199 margin-top-20px-999 margin-top-15px-480px margin-top-10px-320px reg-main-title padding-lr-zero-xs" style="margin-top:5px;">
                        <h3 class="font-15-bold-arial title-bg">
                            <a href="#" class="text-white">
                                <i class="fa fa-asterisk"></i> Religious Information:
                            </a>
                        </h3>
                    </div>
                    <div class="clearfix"></div>
                    <div class="xxl-12 xs-16 s-16 m-16 l-12 xl-12 padding-lr-zero-xs">
                        <div class="clearfix"></div>
                        <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-bottom-20 padding-0-5-xs">
                            <div class="reponse_message" id="reponse_message"></div>
                             <?php
								 $ele_array = array(
                                    'religion'=>array('is_required'=>'required','type'=>'dropdown','onchange'=>"dropdownChange('religion','caste','caste_list')",'value_arr'=>$religion_arr,'extra_style'=>'width:100%','label'=>'Catholic Community'),
                                    'caste'=>array('label'=>'Diocese','is_required'=>'required','type'=>'dropdown','relation'=>array('rel_table'=>'caste','key_val'=>'id','key_disp'=>'caste_name','rel_col_name'=>'religion_id','not_load_add'=>'yes','not_load_add'=>'yes','cus_rel_col_val'=>'religion'),'extra_style'=>'width:100%'),
                                    'other_caste'=>array('label'=>'If Other Diocese'),
									'subcaste'=>array('label'=>'Parish'),
									//'manglik'=>array('type'=>'dropdown','value_arr'=>$this->common_model->get_list_ddr('manglik'),'extra_style'=>'width:100%'),
									//'star'=>array('type'=>'dropdown','class'=>'select2','value_arr'=>$this->common_model->dropdown_array_table('star'),'extra_style'=>'width:100%'),
									//'horoscope'=>array('type'=>'dropdown','value_arr'=>$this->common_model->get_list_ddr('horoscope'),'extra_style'=>'width:100%'),
									//'gothra'=>array('label'=>'Gothra'),
									//'moonsign'=>array('type'=>'dropdown','class'=>'select2','value_arr'=>$this->common_model->dropdown_array_table('moonsign'),'extra_style'=>'width:100%'),
								);
								echo $this->common_front_model->generate_common_front_form($ele_array,array('page_type'=>'register'));
                            ?>
                        </div>
                    </div>
                    <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-20px-1200 margin-top-20px-1199 margin-top-20px-999 margin-top-15px-480px margin-top-10px-320px reg-main-title padding-lr-zero-xs">
                        <h3 class="font-15-bold-arial title-bg">
                            <a href="#" class="text-white">
                                <i class="fa fa-user"></i> About me:
                            </a>
                        </h3>
                    </div>
                    <div class="xxl-12 xs-16 s-16 m-16 l-12 xl-12 padding-lr-zero-xs">
                        <div class="clearfix"></div>
                        <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-bottom-20 padding-0-5-xs">
                            <div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px padding-0-xs">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            Write something about Yourself <span class="font-red">* </span>: 
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                        <textarea id="profile_text" class="form-control" rows="5" placeholder="" name="profile_text" required><?php if(isset($row_data['profile_text']) && $row_data['profile_text'] !=''){ echo $row_data['profile_text'];} ?></textarea>
                                        <p class="text-grey font-14 margin-top-3">Help me write About Yourself<a class="ne-cursor" data-toggle="modal" data-target="#myModal111"> Click Here</a> <span class="tooltip_stay"><span class="text-left help-img-normal"></span> <span class="tooltiptext">If you don't want to write whole sentences than you can direct by suggestions</span></span></p>
                                    </div>
                                    
                                    <div class="modal fade-in" id="myModal111" tabindex="-1" role="dialog"  aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content xxl-16 xl-16 m-16 l-16 s-16 xs-16 padding-0-xs">
                                                <div class="xxl-16 xl-16 m-16 l-16 s-16 xs-16 margin-top-10">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                                        <i class="glyphicon glyphicon-remove-circle" style="display:block;font-size:27px;"></i>
                                                    </button>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="modal-body xxl-16 xl-16 m-16 l-16 s-16 xs-16 margin-bottom-10 padding-20-5-xs" style="padding-top:20px;">
                                                    <div class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 margin-top-10px-320px margin-top-10px-480px ne-mrg-top-10-768 margin-top-10px-999 margin-bottom-20px">
                                                        <h4 class="text-darkgrey">Write Aboute me:</h4>
                                                         <textarea name="aboutemedemo" cols="46" rows="6" class="form-control" style="height:auto;box-shadow:5px 5px 0 0 #e2e2e2;" id="aboutemedemo">I come from a/an <Type of Family> family. The most important thing in my life is <Ex. religious believes, moral values & respect for elders>.  I am modern thinker but also believe in <Ex. good> values given by our ancestors. I love __<Ex. trekking, going on trips with friends, listening to classical music & watching latest movies>.
                                                         </textarea>                          							
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="xxl-16 xl-16 m-16 l-16 s-16 xs-16">
                                                        <a class="btn btn-sm text-white font-15 bold margin-right-10 margin-right-0-xs" style="box-shadow:3px 3px 0 0 #ddd;" onClick="chkabouteme()"><i class="fa fa-check font-18"></i> Submit</a>
                                                        <a class="btn btn-sm btn-danger font-15 bold margin-top-10-xs margin-bottom-10-xs" style="box-shadow:3px 3px 0 0 #ddd;" data-dismiss="modal"><i class="fa fa-close font-18"></i> Close</a>
                                                    </div>	
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                    	<br/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            Hobby <span class="font-red">* </span>:
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                        <textarea id="hobby" class="form-control" rows="5" placeholder="" name="hobby" required><?php if(isset($row_data['profile_text']) && $row_data['hobby'] !=''){ echo $row_data['hobby'];} ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
                        <a class="text-white font-15 bold btn pull-left btn-md prev-step"><i class="fa fa-chevron-left"></i> Previous</a>
                        <button onClick="return validat_function(4)" class="text-white font-15 bold btn pull-right btn-md next-step1" >Save and continue <i class="fa fa-chevron-right"></i></button>
                        <input type="button" class="next-step" style="display:none" id="next_step4" />
                        <!--<a class="text-white font-15 bold btn pull-right btn btn-md next-step margin-right-10 skip hidden-xs">Skip <i class="fa fa-chevron-right"></i></a>-->
                    </div>
                    <!--<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-10 hidden-lg hidden-md hidden-sm">
                    	<a class="text-white font-15 bold btn pull-right btn btn-md next-step margin-top-10-sm pull-right">Skip <i class="fa fa-chevron-right"></i></a>
                    </div>-->
                    </form>
                </div>
                <div class="clearfix"></div>
                
                <div class="tab-pane padding-lr-zero-xs" role="tabpanel" id="complete">
                	<form method="post" id="register_step5" name="register_step5" action="<?php echo $base_url; ?>register/save-register-step/step5" enctype="multipart/form-data" onSubmit="return validat_function(5)">
                    	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id"  class="hash_tocken_id" />
                        <input type="hidden" name="is_post" value="1" />
                    	<input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />
                    <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-xs">
                        <div class="xxl-12 xl-12 l-12 m-16 s-16 xs-16 margin-bottom-20 box-shadow padding-20-5-xs" style="border:8px outset #999;border-radius:3px;padding:20px;">
                            <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
                                <h3 class="text-center text-green">Add your photo and get much better responses!</h3>
                            </div>
                            <div class="clearfix"></div>
                            <div class="colorgraph"></div>
                            <div class="xxl-10 xl-10 l-10 m-16 s-16 xs-16 ne_photo_upload border-right margin-top-30px margin-bottom-10 padding-0-5-xs">
                                <div class="text-center">
                                    <div class="xxl-16 xl-16 xs-16 m-6 l-16 s-16 margin-top-40">
                                    	<div class="reponse_photo"></div>
                                        <div class="fileUpload btn btn-sm active font-15 bold text-white" style="background:#F58220 !important;box-shadow:4px 4px 0 0 #ddd;" data-toggle="modal" data-target="#myModal_pic" onClick="set_photo_number(1)"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/add-photo-comp.gif" width="23" height="30" alt="" style="padding-top:6px;"> Upload Your Photo 
                                        <!-- <input type="file" id="profil_photo" name="profil_photo" class="upload xxl-16 xs-16 m-16 xs-16 padding-top-10px padding-bottom-10px" style="padding:5px;height:100%;" /> -->
                                        <img class="" width="23" height="23"  alt="" src="<?php echo $base_url; ?>assets/front_end/images/icon/profile-arrow.png" ></div> 
                                    </div>
                                    <div id="myModal_pic" class="modal fade" role="dialog">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title"><i class="fa fa-file-image-o"></i> Upload Image</h4>
									</div>
									<div class="modal-body padding-0-5-xs">
                                    	<div class="container_photo">
                                        	<div class="row">
                                                <div class="col-md-12" style="padding:10px;">
                                                    <div id="response_message"></div>
                                                </div>
                                            </div>
                                          <div class="imageBox" style="display:none">
                                            <div class="mask"></div>
                                            <div class="thumbBox"></div>
                                            <div class="spinner" style="display: none">Loading...</div>
                                          </div>
                                          <div class="tools clearfix">
                                            <span class="show_btn" id="rotateLeft">rotate Left</span>
                                            <span class="show_btn" id="rotateRight">rotate Right</span>
                                            <span class="show_btn" id="zoomOut">zoom In</span>
                                            <span class="show_btn" id="zoomIn">zoom Out</span>
                                            <div class="upload-wapper">
                                                       Browse Image
                                                <input type="file" id="profil_photo" name="profil_photo"/>
                                            </div>
                                            <span class="show_btn" id="crop" style="background-color: rgb(7, 90, 133); margin-left: 5px; display: inline;">Crop</span>
                                            
                                            <input type="hidden" id="croped_base64" name="croped_base64" value="" />
                                            <input type="hidden" id="orig_base64" name="orig_base64" value="" />
                                            <input type="hidden" id="photo_number" name="photo_number" value="1" />
                                            
                                          </div>
                                          <span class="show_btn">Drag image and select proper image</span>
                                          <div class="tools clearfix">
                                          </div>
                                        </div>
										<div class="row">
                                            <div class="col-md-12" style="padding:10px;">
                                                <div id="croped_img"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
									<div class="clearfix"></div>
									<div class="modal-footer margin-top-10">
										<a onClick="update_photo1()" id="upload_btn" class="btn btn-sm"><i class="fa fa-upload"></i> Upload</a>
										<a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</a>
									</div>
								</div>
							</div>
						</div>    
                                    <!--<div class="xxl-16 xl-16 s-16 xs-16 m-16 l-16 text-center margin-top-5">
                                        <h3 class="text-grey text-center" style="padding:8px 5px;text-shadow:2px 2px 1px rgba(203, 203, 203, 1);">OR</h3>
                                    </div>
                                
                                    <a class="btn btn-sm text-white font-15 bold" href="https://www.facebook.com" target="_blank" style=" display: inline-block; background-color:#4483b0 !important;box-shadow:3px 3px 0 0 #e2e2e2;">
                                        <img src="<?php echo $base_url; ?>assets/front_end/images/icon/add-photo-fb.gif" width="28" height="30"  alt="" class="fleft paddl10 margin-right-10" style="padding-top:6px;"> Upload from Facebook 
                                        <img width="23" height="23"  alt="" class=" margin-left-10" src="<?php echo $base_url; ?>assets/front_end/images/icon/profile-arrow.png">
                                    </a>
                                    -->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="xxl-6 xl-6 l-6 m-16 s-16 xs-16 ne_pad_btm_10px ne_pad_tp_10px">
                                <div class="row">
                                    <div class="xxl-14 xxl-margin-left-1 xl-14 xl-margin-left-1 video-effect">
                                        <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 text-center">
                                        <?php
											$photo1_val = 'assets/front_end/images/icon/no-image.jpg';
											if(isset($row_data['photo1']) && $row_data['photo1'] !='' && file_exists($this->common_model->path_photos.$row_data['photo1']))
											{
												$photo1_val = $this->common_model->path_photos.$row_data['photo1'];
											}
											else if(isset($member_fb_data_image_url) && $member_fb_data_image_url !='')
											{
												$photo1_val = $this->common_model->path_photos.$member_fb_data_image_url;
											}
										?>
                                            <div class="margin-top-10"></div>
                                            <img id="blah" src="<?php echo $base_url.$photo1_val; ?>" class="blah border img-responsive" alt="your image" width="250" height="250" style="box-shadow: 0 5px 11px 0 rgba(0,0,0,.18), 0 4px 15px 0 rgba(0,0,0,.15);margin:12px 12px;"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="xxl-4 xl-4 m-16 l-4 xs-16 s-16 hidden-xs" style="padding-top:0px;padding-bottom:0px;">
                            <div class="panel panel-info margin-top-20" style="margin-bottom:0px;">
                                <div class="panel-heading">
                                    <h4 class="panel-title" style="">Important Notes</h4>
                                </div>
                                <div class="panel-body">
                                    <ul>
                                        <li class="small"> - The maximum file size for uploads is <strong>2 MB</strong>.</li>
                                        <li class="small margin-top-10"> - image files (<strong>JPG, GIF, PNG, JPEG, BMP</strong>) are allowed.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="xxl-16 m-16 s-16 xs-16">
                        <div class="row margin-bottom-10">
                            <!--<div class="xxl-16 m-16 s-16 xs-16">
                                <div class="row">
                                    <div class="xxl-10 xxl-margin-left-5 l-10 l-margin-left-2 xs-16 xs-margin-left-0">
                                        <input checked="" name="term_condition" data-validetta="required" type="checkbox"> I Accept <a href="terms_and_condition.html" target="_blank">Terms &amp; Condition</a>  and <a href="privacy_policy.html" target="_blank">Privacy Policy</a>.
                                    </div>
                                </div>
                            </div>-->
                            <div class="xxl-8 xxl-margin-left-5 l-10 l-margin-left-2 xs-16 xs-margin-left-0 margin-top-10 text-center">
                            <a class="text-white font-15 bold btn pull-left btn-md  prev-step margin-right-5"><i class="fa fa-chevron-left"></i> Previous</a>
                            <a href="<?php echo $base_url.'register/successful' ?>" class="btn xs-16 xxl-9 xl-9 l-16 s-16 m-16 text-white font-15 bold">Save and Complete <i class="fa fa-chevron-right"></i></a>
                            
                            <!--<button onClick="return validat_function(5)" class="btn xs-16 xxl-9 xl-9 l-16 s-16 m-16 text-white font-15 bold next-step" > Save and Complete <i class="fa fa-chevron-right"></i></button>-->
                            <!--<a href="registration_successful.html" class="btn xs-16 xxl-9 xl-9 l-16 s-16 m-16 text-white font-15 bold next-step"   style="box-shadow:3px 3px 0 0 #ddd;">Register <i class="fa fa-chevron-right"></i></a>-->
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="clearfix"></div>
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
?>
<script src="<?php echo $base_url; ?>assets/front_end/js/jquery.min.js?ver=1.0"></script>
<script src="<?php echo $base_url; ?>assets/front_end/js/bootstrap.min.js?ver=1.0"></script>
<script src="<?php echo $base_url; ?>assets/front_end/js/select2.min.js?ver=1.0"></script>
<script src="<?php echo $base_url; ?>assets/front_end/js/jquery.sticky.js?ver=1.0"></script>
<script src="<?php echo $base_url; ?>assets/front_end/js/common.js?ver=1.1"></script>
<script>
var base_url = '<?php echo $base_url; ?>';

$('#total_children').parent().parent().parent().hide();
$('#Living with me').parent().parent().parent().hide();
$( document ).ready(function() {
	$('select').select2();
	$('.nav-tabs > li a[title]').tooltip();
	
	$('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
		var $target = $(e.target);
		if ($target.parent().hasClass('disabled')) {
			return false;
		}
	});
	$(".next-step").click(function (e) {
		var $active = $('.wizard .nav-tabs li.active');
		$active.next().removeClass('disabled');
		nextTab($active);
	});
	$(".prev-step").click(function (e) {
		var $active = $('.wizard .nav-tabs li.active');
		prevTab($active);
	});
	select2('#education_detail','Select Education');
	select2('#languages_known','Select Languages Known');
	select2('#part_complexion','Select Complexion');
	select2('#looking_for','Select Looking For');
	select2('#mother_tongue','Select Mother Tongue');
	old_photo_url = '';
	// $('#profil_photo').bind('change', function()
	// {
	// 	var size = this.files[0].size;
	// 	var mb_size = size/(1024*1024);
	// 	if(mb_size > 2 )
	// 	{
	// 		$(".reponse_photo").removeClass('alert alert-success alert-danger');
	// 		$(".reponse_photo").html("File uploaded Size is to large, Please upload another file.");
	// 		$(".reponse_photo").addClass('alert alert-danger');
	// 		//document.getElementById('blah').src = base_url+ 'assets/front_end/images/icon/no-image.jpg';
	// 	}
	// 	else
	// 	{
	// 		var ext = $('#profil_photo').val().split('.').pop().toLowerCase();
	// 		if($.inArray(ext, ['gif','png','jpg','jpeg','bmp']) == -1)
	// 		{
	// 			$(".reponse_photo").removeClass('alert alert-success alert-danger');
	// 			$(".reponse_photo").html("Please upload only Image file only.");
	// 			$(".reponse_photo").addClass('alert alert-danger');
	// 			//document.getElementById('blah').src = base_url+ 'assets/front_end/images/icon/no-image.jpg';
	// 		}
	// 		else
	// 		{
	// 			document.getElementById('blah').src = window.URL.createObjectURL(this.files[0]);
	// 			$(".reponse_photo").html("<i class='fa fa-spinner' aria-hidden='true'></i> Please Wait while uploading your photo..");
	// 			$(".reponse_photo").addClass('alert alert-warning');

	// 			var form_data = new FormData(document.getElementById("register_step5"));
	// 			hase_tocke_val = $("#hash_tocken_id").val();
	// 			form_data.append('<?php //echo $this->security->get_csrf_token_name(); ?>', hase_tocke_val);
	// 			form_data.append('is_post', 0);
	// 			//alert(form_data);
	// 			var action = $('#register_step5').attr('action');
	// 			//alert(action);
	// 			 $.ajax({
	// 				url: action,
	// 				type: 'POST',
	// 				data: form_data,
	// 				cache: false,
	// 				dataType: 'json',
	// 				processData: false,
	// 				contentType: false,
	// 				success: function(data)
	// 				{
	// 					update_tocken(data.tocken);
	// 					$(".reponse_photo").removeClass('alert alert-success alert-danger alert-warning');
	// 					$(".reponse_photo").html(data.errmessage);
	// 					$(".reponse_photo").slideDown();
	// 					if(data.status == 'success')
	// 					{
	// 						$(".reponse_photo").addClass('alert alert-success');
	// 						stoptimeout();
	// 						starttimeout('.reponse_message');
	// 					}
	// 					else
	// 					{
	// 						/*if(data.old_photo_url !='')
	// 						{
	// 							//alert(data.old_photo_url);
	// 							//$("#blah").attr('src',old_photo_url);
	// 							//document.getElementById('blah').src = old_photo_url;
	// 						}*/
	// 						$('#profil_photo').val('');
	// 						$(".reponse_photo").addClass('alert alert-danger');
    //                         document.getElementById('blah').src = base_url+ 'assets/front_end/images/icon/no-image.jpg';
                            
	// 					}
	// 				}
	// 			});
	// 		}
    //     }
        
	// });
	display_total_childern();
});
function nextTab(elem) {
	$(elem).next().find('a[data-toggle="tab"]').click();
	scroll_to_div('step1_li');
}
function prevTab(elem) {
	$(elem).prev().find('a[data-toggle="tab"]').click();
	scroll_to_div('step1_li');
}
<!--About me-->
function chkabouteme()
{
  $('#myModal111').modal('hide'); 
  var aboutemedemo = $('#aboutemedemo').val();
  String.prototype.replaceArray = function(find, replace) {
	var replaceString = this;
	var regex; 
	for (var i = 0; i < find.length; i++) {
   regex = new RegExp(find[i], "g");
   replaceString = replaceString.replace(regex, replace[i]);
	}
	return replaceString;
  };
  var textarea = aboutemedemo;
  var find = ["_", "Type of Family", "Ex. religious believes, moral values & respect for elders", "<",">", "Ex. good", "Ex. trekking, going on trips with friends, listening to classical music & watching latest movies" ];
  var replace = ["", "", "", "", "","", "", "", "", "", ""];
  textarea = textarea.replaceArray(find, replace);
  $('#profile_text').val(textarea);
}
function validat_function(form_id)
{
	if($("#register_step"+form_id).length > 0)
	{
		$("#register_step"+form_id).validate({
			submitHandler: function(form)
			{
				$("#next_step"+form_id).trigger('click');
				$(".reponse_message").removeClass('alert alert-success alert-danger');
				$(".reponse_message").html("<i class='fa fa-spinner' aria-hidden='true'></i> Updating your profile, Please Do't close your browser.");
				$(".reponse_message").addClass('alert alert-warning');
				//alert(form_id);
				if(form_id !=5)
				{
					var form_data = $('#register_step'+form_id).serialize();
					form_data = form_data+ "&is_post=0";
					var action = $('#register_step'+form_id).attr('action');
					//show_comm_mask();
					$.ajax({
					   url: action,
					   type: "post",
					   dataType:"json",
					   data: form_data,
					   success:function(data)
					   {
							update_tocken(data.tocken);
							$(".reponse_message").removeClass('alert alert-success alert-danger alert-warning');
							$(".reponse_message").html(data.errmessage);
							$(".reponse_message").slideDown();
							if(data.status == 'success')
							{
								$(".reponse_message").addClass('alert alert-success');
								stoptimeout();
								starttimeout('.reponse_message');
							}
							else
							{
								$(".reponse_message").addClass('alert alert-danger');
							}
					   }
					});
				}
				else
				{
						
					//alert('In file upload');
				}
				return false;
			}
		});
	}
}
</script>
<?php
if(isset($this->common_model->extra_js_fr) && $this->common_model->extra_js_fr !='' && count($this->common_model->extra_js_fr) > 0){
			$extra_js_fr = $this->common_model->extra_js_fr;
			foreach($extra_js_fr as $extra_js_fr_val){?>
				<script src="<?php echo $base_url.'assets/front_end/'.$extra_js_fr_val;?>"></script>
		<?php }
		}?>
<script>
<?php
	if(isset($this->common_model->js_extra_code_fr) && $this->common_model->js_extra_code_fr !='')
	{
		echo $this->common_model->js_extra_code_fr;
	}
?>
</body>
</html>