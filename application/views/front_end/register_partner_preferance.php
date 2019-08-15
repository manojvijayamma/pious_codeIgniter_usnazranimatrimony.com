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
</style><!-- ====== <div class="container"> Start================ -->
<div class="container margin-top-20 margin-bottom-20 padding-lr-zero-xs">
    <div class="bg-border" style="padding:0 0 15px 0">
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active" id="step1_li" style="width: 25% !important;">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Some Basic Information">
                            <span class="round-tab">
                                <i class="fa fa-info"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled" id="step2_li" style="width: 25% !important;">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Religious Information">
                            <span class="round-tab">
                                <img src="<?php echo $base_url; ?>assets/front_end/images/icon/horoscope.gif" alt="Religious Information / Other Details" style="margin-top:-7px;" />
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled" id="step3_li" style="width: 25% !important;">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Location Information">                        <span class="round-tab">
                                <i class="fa fa-map-marker"></i>
                             </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled" id="step4_li" style="width: 25% !important;">
                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Education Qualification">
                            <span class="round-tab">
                                <img src="<?php echo $base_url; ?>assets/front_end/images/icon/graduation1.png" alt="Education Information" style="width:63%;margin-top:-7px;" />
                            </span>
                            </a>
                    </li>
                   
                </ul>
            </div>
            <div class="tab-content padding-lr-zero-xs">
                <div class="tab-pane active" role="tabpanel" id="step1">
                    <form method="post" id="register_step1" name="register_step1" action="<?php echo $base_url; ?>register/save-profile/part-basic-detail" onSubmit="return validat_function(1)">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id"  class="hash_tocken_id" />
                    <input type="hidden" name="is_post" value="1" />
                    <input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />
                    <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero-xs">
						<h4 class="text-center text-darkgrey bold font-18 font-weight-normal"><span class="partners"></span>Thanks for Registering, Now Update Partner Preference Information</h4>
						<div class="clearfix"></div>
						<div class="font-12 pull-right text-darkgrey"><span class="font-red">* </span> Mandatory fields</div>
					</div>
                    <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-20px-1200 margin-top-20px-1199 margin-top-20px-999 margin-top-15px-480px margin-top-10px-320px reg-main-title" style="margin-top:5px;">
                        <div class="padding-lr-zero-320">
                            <h3 class="font-15-bold-arial title-bg">
                                <i class="fa fa-lg fa-info-circle"></i> Some Basic Preferences Details :
                            </h3>
                        </div>
                    </div>
                    <div class="xxl-12 xs-16 s-16 m-16 l-12 xl-12 padding-lr-zero-xs">
                        <div class="clearfix"></div>
                        <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-bottom-20 padding-lr-zero-xs">
                        	<div class="reponse_message" id="reponse_message"></div>
                            <?php
								//$insert_id = $this->session->userdata('recent_reg_id');
								//$insert_id = $this->common_front_model->get_session_data('id');
								$mother_tongue_arr = $this->common_model->dropdown_array_table('mothertongue');
								$religion_arr = $this->common_model->dropdown_array_table('religion');
								$education_name_arr = $this->common_model->dropdown_array_table('education_detail');
								$occupation_arr = $this->common_model->dropdown_array_table('occupation');
								$designation_arr = $this->common_model->dropdown_array_table('designation');
								$country_arr = $this->common_model->dropdown_array_table('country_master');
									
								$insert_id = $this->session->userdata('recent_reg_id');
								if(isset($insert_id) && $insert_id != '' )
								{
									$row_data = $this->common_model->get_count_data_manual('register',array('id'=>$insert_id,'is_deleted'=>'No'),1);
									$this->common_front_model->edit_row_data = $row_data;
									$this->common_model->edit_row_data = $row_data;
									$this->common_model->mode= 'edit';
									$this->common_front_model->mode= 'edit';
								}
								
								
								 $ele_array = array(
									'looking_for'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->get_list_ddr('marital_status'),'label'=>'Looking For','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','extra_style'=>'width:100%'),
									'part_complexion'=>array('type'=>'dropdown','value_arr'=>$this->common_model->get_list_ddr('complexion'),'label'=>'Partner Complexion','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','extra_style'=>'width:100%'),
									'part_frm_age'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->age_rang(),'label'=>"Partner From Age",'class'=>'select2','extra_style'=>'width:100%'),
									'part_to_age'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->age_rang(),'label'=>"Partner To Age",'class'=>'select2','extra_style'=>'width:100%'),
									'part_height'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->height_list(),'label'=>"Partner From Height",'class'=>'select2','extra_style'=>'width:100%'),
									'part_height_to'=>array('type'=>'dropdown','value_arr'=>$this->common_model->height_list(),'label'=>"Partner To Height",'class'=>'select2','extra_style'=>'width:100%'),
									'part_bodytype'=>array('type'=>'dropdown','value_arr'=>$this->common_model->get_list_ddr('bodytype'),'label'=>'Partner Body type','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','extra_style'=>'width:100%'),
									'part_diet'=>array('type'=>'dropdown','value_arr'=>$this->common_model->get_list_ddr('diet'),'label'=>'Partner Eating Habit','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','extra_style'=>'width:100%'),
									'part_smoke'=>array('type'=>'dropdown','value_arr'=>$this->common_model->get_list_ddr('smoke'),'label'=>'Partner Smoking Habit','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','extra_style'=>'width:100%'),
									'part_drink'=>array('type'=>'dropdown','value_arr'=>$this->common_model->get_list_ddr('drink'),'label'=>'Partner Drinking Habit','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','extra_style'=>'width:100%'),
									'part_mother_tongue'=>array('type'=>'dropdown','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','value_arr'=>$mother_tongue_arr,'label'=>'Partner Mother Tongue','extra_style'=>'width:100%'),
									
									'part_expect'=>array('type'=>'textarea','label'=>'Expectations','extra_style'=>'width:100%'),
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
                    <hr style="margin-top:0px;">
                    <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
                        <button onClick="return validat_function(1)" class="text-white font-15 bold btn pull-right btn-md next-step1" >Save and continue <i class="fa fa-chevron-right"></i></button>
                        <input type="button" class="next-step" style="display:none" id="next_step1" />
                    </div>
                    </form>
                </div>
                <div class="clearfix"></div>
                                
                <div class="tab-pane" role="tabpanel" id="step2">
                	<form method="post" id="register_step2" name="register_step2" action="<?php echo $base_url; ?>register/save-profile/part-religious-detail"  onSubmit="return validat_function(2)">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id"  class="hash_tocken_id" />
                    <input type="hidden" name="is_post" value="1" />
                    <input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />
                    <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero-xs">
                        <h4 class="text-center text-darkgrey bold font-18 font-weight-normal">Add Religious Preferences Information To Make Stronger Your Profile</h4>
                        <div class="clearfix"></div>
                        <div class="font-12 pull-right text-darkgrey"><span class="font-red">* </span> Mandatory fields</div>
                    </div>
                    
                    <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-20px-1200 margin-top-20px-1199 margin-top-20px-999 margin-top-15px-480px margin-top-10px-320px reg-main-title padding-lr-zero-xs" style="margin-top:5px;">
                        <h3 class="font-15-bold-arial title-bg">
                            <a href="#" class="text-white">
                                <i class="fa fa-book"></i> Religious Preferences Details :
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
									'part_religion'=>array('is_required'=>'required','type'=>'dropdown','onchange'=>"dropdownChange('part_religion','part_caste','caste_list')",'value_arr'=>$religion_arr,'label'=>'Partner Catholic Community','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','extra_style'=>'width:100%'),
									'part_caste'=>array('type'=>'dropdown','relation'=>array('rel_table'=>'caste','key_val'=>'id','key_disp'=>'caste_name','not_load_add'=>'yes','rel_col_name'=>'religion_id','cus_rel_col_val'=>'part_religion'),'label'=>'Partner Diocese','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','extra_style'=>'width:100%'),
									//'part_manglik'=>array('type'=>'dropdown','value_arr'=>$this->common_model->get_list_ddr('manglik'),'label'=>'Partner Manglik','extra_style'=>'width:100%'),
									//'part_star'=>array('type'=>'dropdown','value_arr'=>$this->common_model->dropdown_array_table('star'),'label'=>'Partner Star','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','extra_style'=>'width:100%'),
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
                <form method="post" id="register_step3" name="register_step3" action="<?php echo $base_url; ?>register/save-profile/part-location-detail" onSubmit="return validat_function(3)">
                	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id"  class="hash_tocken_id" />
                    <input type="hidden" name="is_post" value="1" />
                    <input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />
                    <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero-xs">
                        <h4 class="text-center text-darkgrey bold font-18 font-weight-normal">Add Location Preferences Information To Make Stronger Your Profile</h4>
                        <div class="clearfix"></div>
                        <div class="font-12 pull-right text-darkgrey"><span class="font-red">* </span> Mandatory fields</div>
                    </div>
                    <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-20px-1200 margin-top-20px-1199 margin-top-20px-999 margin-top-15px-480px margin-top-10px-320px reg-main-title padding-lr-zero-xs" style="margin-top:5px;">
                        <h3 class="font-15-bold-arial title-bg">
                            <a href="#" class="text-white">
                                <i class="fa fa-map-marker"></i> Location Preferences Details:
                            </a>
                        </h3>
                    </div>
                    <div class="clearfix"></div>
                    <div class="xxl-12 xs-16 s-16 m-16 l-12 xl-12 padding-lr-zero-xs">
                        <div class="clearfix"></div>
                        <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-bottom-20 padding-lr-zero-xs">
                        	<div class="reponse_message" id="reponse_message"></div>
                            <?php								
								$state_load_special = 'yes';
								$city_load_special = 'yes';
								if(isset($row_data['part_country_living']) && $row_data['part_country_living'] !='')
								{
									$state_load_special = 'no';
								}
								if(isset($row_data['part_state']) && $row_data['part_state'] !='')
								{
									$city_load_special = 'no';
								}
								
								 $ele_array = array(
									 'part_country_living'=>array('type'=>'dropdown','value_arr'=>$country_arr,'label'=>'Partner Country','onchange'=>"dropdownChange('part_country_living','part_state','state_list')",'is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','extra_style'=>'width:100%'),
									'part_state'=>array('type'=>'dropdown','relation'=>array('rel_table'=>'state_master','key_val'=>'id','key_disp'=>'state_name','not_load_add'=>'yes','cus_rel_col_name'=>'country_id','cus_rel_col_val'=>'part_country_living','not_load_add_special'=>$state_load_special),'label'=>'State','onchange'=>"dropdownChange('part_state','part_city','city_list')",'is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','label'=>'Partner State','extra_style'=>'width:100%'),
									'part_city'=>array('type'=>'dropdown','relation'=>array('rel_table'=>'city_master','key_val'=>'id','key_disp'=>'city_name','not_load_add'=>'yes','cus_rel_col_name'=>'state_id','cus_rel_col_val'=>'part_state','not_load_add_special'=>$city_load_special),'label'=>'Partner City','class'=>'select2','is_multiple'=>'yes','display_placeholder'=>'No','extra_style'=>'width:100%'),
									'part_other_city'=>array('label'=>'If other city'),
									'part_resi_status'=>array('type'=>'dropdown','value_arr'=>$this->common_model->get_list_ddr('residence'),'label'=>'Partner Residence Status','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','extra_style'=>'width:100%'),
									
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
                        
                        <a class="text-white font-15 bold btn pull-right btn-md next-step margin-right-10 margin-top-10-sm text-left-xs skip hidden-xs">Skip <i class="fa fa-chevron-right"></i></a>
                    </div>
                    
                    <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-10 hidden-lg hidden-md hidden-sm">
                    	<a class="text-white font-15 bold btn pull-right btn btn-md next-step margin-top-10-sm pull-right">Skip <i class="fa fa-chevron-right"></i></a>
                    </div>
                    </form>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="tab-pane" role="tabpanel padding-lr-zero-xs" id="step4">
                <form method="post" id="register_step4" name="register_step4" action="<?php echo $base_url; ?>register/save-profile/part-education-detail" onSubmit="return validat_function(4)">
                	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id"  class="hash_tocken_id" />
                    <input type="hidden" name="is_post" value="1" />
                    <input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />
                    <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero-xs">
                        <h4 class="text-center text-darkgrey bold font-18 font-weight-normal">Add Education Preferences Information To Make Stronger Your Profile
								</h4>
                        <div class="clearfix"></div>
                        <div class="font-12 pull-right text-darkgrey"><span class="font-red">* </span> Mandatory fields</div>
                    </div>
                    <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-20px-1200 margin-top-20px-1199 margin-top-20px-999 margin-top-15px-480px margin-top-10px-320px reg-main-title padding-lr-zero-xs" style="margin-top:5px;">
                        <h3 class="font-15-bold-arial title-bg">
                            <a href="#" class="text-white">
                                <i class="fa fa-asterisk"></i>  Education / Occupation Preferences Details :
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
									 'part_education'=>array('type'=>'dropdown','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','value_arr'=>$education_name_arr,'label'=>'Partner Education','extra_style'=>'width:100%'),
									'part_employee_in'=>array('is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','type'=>'dropdown','value_arr'=>$this->common_model->get_list_ddr('employee_in'),'label'=>'Partner Employed In','extra_style'=>'width:100%'),
									'part_occupation'=>array('type'=>'dropdown','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','value_arr'=>$occupation_arr,'label'=>'Partner Occupation','class'=>'select2','extra_style'=>'width:100%'),
									'part_designation'=>array('type'=>'dropdown','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','value_arr'=>$designation_arr,'label'=>'Partner Designation','extra_style'=>'width:100%'),
									
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
                        <button onClick="return validat_function(4)" class="text-white font-15 bold btn pull-right btn-md next-step1" >Save and Payment <i class="fa fa-chevron-right"></i></button>
                         <!--<a href="<?php echo $base_url.'my-profile';?>" class="text-white font-15 bold btn pull-left btn-md prev-step"><i class="fa fa-chevron-left"></i> View Your Full Profile</a>
                         <a href="<?php echo $base_url.'my-profile';?>" class="text-white font-15 bold btn pull-right btn-md next-step margin-right-10 margin-top-10-sm text-left-xs skip hidden-xs">View Profile <i class="fa fa-chevron-right"></i></a>-->
                    </div>
                    </form>
                </div>
                <div class="clearfix"></div>
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
	$('#profil_photo').bind('change', function()
	{
		var size = this.files[0].size;
		var mb_size = size/(1024*1024);
		if(mb_size > 2 )
		{
			$(".reponse_photo").removeClass('alert alert-success alert-danger');
			$(".reponse_photo").html("File uploaded Size is to large, Please upload another file.");
			$(".reponse_photo").addClass('alert alert-danger');
			//document.getElementById('blah').src = base_url+ 'assets/front_end/images/icon/no-image.jpg';
		}
		else
		{
			var ext = $('#profil_photo').val().split('.').pop().toLowerCase();
			if($.inArray(ext, ['gif','png','jpg','jpeg','bmp']) == -1)
			{
				$(".reponse_photo").removeClass('alert alert-success alert-danger');
				$(".reponse_photo").html("Please upload only Image file only.");
				$(".reponse_photo").addClass('alert alert-danger');
				//document.getElementById('blah').src = base_url+ 'assets/front_end/images/icon/no-image.jpg';
			}
			else
			{
				document.getElementById('blah').src = window.URL.createObjectURL(this.files[0]);
				$(".reponse_photo").html("<i class='fa fa-spinner' aria-hidden='true'></i> Please Wait while uploading your photo..");
				$(".reponse_photo").addClass('alert alert-warning');

				var form_data = new FormData(document.getElementById("register_step5"));
				hase_tocke_val = $("#hash_tocken_id").val();
				form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', hase_tocke_val);
				form_data.append('is_post', 0);
				//alert(form_data);
				var action = $('#register_step5').attr('action');
				//alert(action);
				 $.ajax({
					url: action,
					type: 'POST',
					data: form_data,
					cache: false,
					dataType: 'json',
					processData: false,
					contentType: false,
					success: function(data)
					{
						update_tocken(data.tocken);
						$(".reponse_photo").removeClass('alert alert-success alert-danger alert-warning');
						$(".reponse_photo").html(data.errmessage);
						$(".reponse_photo").slideDown();
						if(data.status == 'success')
						{
							$(".reponse_photo").addClass('alert alert-success');
							stoptimeout();
							starttimeout('.reponse_message');
						}
						else
						{
							/*if(data.old_photo_url !='')
							{
								//alert(data.old_photo_url);
								//$("#blah").attr('src',old_photo_url);
								//document.getElementById('blah').src = old_photo_url;
							}*/
							//$('#profil_photo').val('');
							$(".reponse_photo").addClass('alert alert-danger');
						}
					}
				});
			}
		}
	});
	
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
								if(form_id == 4){
									setTimeout(function () {
										window.location.href = "<?php  echo base_url('premium-member'); ?>";
									}, 2000);
								}
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
</body>
</html>