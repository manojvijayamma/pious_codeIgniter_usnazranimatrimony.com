<?php  //print_r($member_data); 
	$current_login_user = $this->common_front_model->get_session_data();
?>
<style>
	.underline:hover {
    text-decoration: underline !important;
    color: #fff;
}
</style>
<!------------------container-Start------------------------------------>
    <div class="">
        <div class="container padding-lr-zero-xs">
            <div class="">
                <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 margin-top-20 padding-0-5-xs" style="padding-right:0px;">
                
                    <div class="xxl-4 xl-4 xs-16 m-16 s-16 l-4">
                        <?php $this->load->view('front_end/my_profile_sidebar'); ?>
                    </div>
                                    
                    <div class="xxl-12 xl-12 l-12 m-16 s-16 xs-16 padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 padding-lr-zero-xs">
                        <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 bg-border" style="padding-top:0px;">
                            <div class="row" style="padding:4px;">
                                <h3 class="profile-heading " style="margin-top:0px;">
                                    <i class="fa fa-file ne_mrg_ri8_10 text-white"></i>Basic Details
                                
                                    <a href="<?php echo $base_url.'my-profile/edit-profile/basic-detail'; ?>" class="view_all underline">
                                        <i class="fa fa-pencil"></i>
                                    Edit <img src="<?php echo $base_url; ?>assets/front_end/images/icon/right-gray-arrow.png" class="padding-left-5" alt="" />
                                    </a>
                                </h3>
                            </div>
                            <?php
								$element_array = array(
									'username'=>array('label'=>'Name'),
									'marital_status'=>array(),
									'total_children'=>array(),
									'status_children'=>array(),
									'mtongue_name'=>array('label'=>'Mother Tongue'),
									'languages_known'=>array('type'=>'relation','table_name'=>'mothertongue','disp_column_name'=>'mtongue_name'),
									'height'=>array('call_back'=>'display_height'),
									'weight'=>array('post_filed'=>'KG','post_filed_val'=>'Kg'),
									'birthdate'=>array('call_back'=>'birthdate_disp')
								);
								echo $this->common_front_model->view_detail_common($element_array,$member_data);
							?>
                        </div>
						
						<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 bg-border" style="padding-top:0px;">
                            <div class="row" style="padding:4px;">
                                <h3 class="profile-heading " style="margin-top:0px;">
                                    <i class="fa fa-glass ne_mrg_ri8_10 text-white"></i>Life Style Details
                                    <a href="<?php echo $base_url.'my-profile/edit-profile/life-style-detail'; ?>" class="view_all underline">
                                        <i class="fa fa-pencil"></i>
                                    	Edit <img src="<?php echo $base_url;?>assets/front_end/images/icon/right-gray-arrow.png" class="padding-left-5" alt="" />
                                    </a>
                                </h3>
                            </div>
                            <?php
								$element_array = array(
									'bodytype'=>array('label'=>'Body Type'),
									'diet'=>array('label'=>'Eating Habit'),
									'smoke'=>array('label'=>'Smoking Habit'),
									'drink'=>array('label'=>'Drinking Habit'),
									'complexion'=>array('label'=>'Skin Tone'),
									'blood_group'=>array(),
								);
								echo $this->common_front_model->view_detail_common($element_array,$member_data);
							?>
                        </div>
                        
                        <div class="xxl-16 xl-16 m-16 s-16 xs-16 l-16 bg-border margin-top-15px" style="padding-top:0px;">
                            <div class="row" style="padding:4px;">
                                <h3 class="profile-heading" style="margin-top:0px;">
                                    <i class="fa fa-user ne_mrg_ri8_10 text-white"></i>About Me & Hobby
                                    <a href="<?php echo $base_url.'my-profile/edit-profile/about-me-detail'; ?>" class="view_all underline tex-white">
                                        <i class="fa fa-pencil"></i>
                                    	Edit <img src="<?php echo $base_url; ?>assets/front_end/images/icon/right-gray-arrow.png" class="padding-left-5" alt="" />
                                    </a>
                                </h3>
                            </div>
                            <?php
								$element_array = array(
									'profile_text'=>array('is_single'=>'no','label'=>'About Us'),
									'hobby'=>array('label'=>'Hobby'),
									'birthplace'=>array('label'=>'Birth Place'),
									'birthtime'=>array('label'=>'Birth Time'),
									'profileby'=>array('label'=>'Created By'),
									'reference'=>array('label'=>'Referenced By'),
								);
								echo $this->common_front_model->view_detail_common($element_array,$member_data);
							?>
                        </div>
                        
                        <div class="xxl-16 xl-16 m-16 s-16 xs-16 l-16 bg-border margin-top-15px" style="padding-top:0px;">
                            <div class="row" style="padding:4px;">
                                <h3 class="profile-heading" style="margin-top:0px;">
                                    <i class="fa fa-book ne_mrg_ri8_10 text-white"></i>Religious Information
                                
                                    <a href="<?php echo $base_url.'my-profile/edit-profile/religious-detail'; ?>" class="view_all underline">
                                        <i class="fa fa-pencil"></i>
                                    Edit <img src="<?php echo $base_url; ?>assets/front_end/images/icon/right-gray-arrow.png" class="padding-left-5" alt="" />
                                    </a>
                                </h3>
                            </div>
                             <?php
								$element_array = array(
									'religion_name'=>array('label'=>'Catholic Community'),
									'caste_name'=>array('label'=>'Diocese'),
									'subcaste'=>array('label'=>'Parish'),
									//'manglik'=>array('label'=>'Manglik'),
									//'star'=>array('label'=>'Star','type'=>'relation','table_name'=>'star','disp_column_name'=>'star_name'),
									//'horoscope'=>array('label'=>'Horoscope'),
									//'gothra'=>array('label'=>'Gothra'),
									//'moonsign'=>array('label'=>'Moonsign','type'=>'relation','table_name'=>'moonsign','disp_column_name'=>'moonsign_name'),
								);
								echo $this->common_front_model->view_detail_common($element_array,$member_data);
							?>
                        </div>
                        
                        <div class="xxl-16 xl-16 m-16 s-16 xs-16 l-16 bg-border margin-top-15px" style="padding-top:0px;">
                            <div class="row" style="padding:4px;">
                                <h3 class="profile-heading" style="margin-top:0px;">
                                    <i class="fa fa-map-marker ne_mrg_ri8_10 text-white"></i>Location Information 
                                
                                    <a href="<?php echo $base_url.'my-profile/edit-profile/residence-detail'; ?>" class="view_all underline">
                                        <i class="fa fa-pencil"></i>
                                    Edit <img src="<?php echo $base_url; ?>assets/front_end/images/icon/right-gray-arrow.png" class="padding-left-5" alt="">
                                    </a>
                                </h3>
                            </div>
                            <?php
								if(isset($this->common_model->is_demo_mode) && $this->common_model->is_demo_mode == 1)
								{
									$member_data['city_name'] = $this->common_model->disable_in_demo_text;
									$member_data['address'] = $this->common_model->disable_in_demo_text;
									$member_data['mobile'] = $this->common_model->disable_in_demo_text;
									$member_data['phone'] = $this->common_model->disable_in_demo_text;
								}
								$element_array = array(
									'country_name'=>array('label'=>'Country'),
									'state_name'=>array('label'=>'State'),
									'city_name'=>array('label'=>'City'),
									'address'=>array('label'=>'Address'),
									'mobile'=>array('label'=>'Mobile','fa_icone'=>'fa fa-phone'),
									'phone'=>array('label'=>'Phone','fa_icone'=>'fa fa-phone'),
									'time_to_call'=>array('label'=>'Time To Call'),
									'residence'=>array('label'=>'Residence'),
								);
								echo $this->common_front_model->view_detail_common($element_array,$member_data);
							?>
                        </div>
                        
                        <div class="xxl-16 xl-16 m-16 s-16 xs-16 l-16 bg-border margin-top-15px" style="padding-top:0px;">
                            <div class="row" style="padding:4px;">
							
							
                                <h3 class="profile-heading" style="margin-top:0px;">
                                    <i class="fa fa-university ne_mrg_ri8_10 text-white"></i>Education / Occupation Information
                                
                                    <a href="<?php echo $base_url.'my-profile/edit-profile/education-detail'; ?>" class="view_all underline">
                                        <i class="fa fa-pencil"></i>
                                    Edit <img src="<?php echo $base_url; ?>assets/front_end/images/icon/right-gray-arrow.png" class="padding-left-5" alt="" >
                                    </a>
                                </h3>
                            </div>
                             <?php
								$element_array = array(
									'education_detail'=>array('label'=>'Education','type'=>'relation','table_name'=>'education_detail','disp_column_name'=>'education_name'),
									'employee_in'=>array(),
									'income'=>array('label'=>'Annual Income'),
									'occupation_name'=>array('label'=>'Occupation'),
									'designation'=>array('label'=>'Designation','type'=>'relation','table_name'=>'designation','disp_column_name'=>'designation_name'),
								);
								echo $this->common_front_model->view_detail_common($element_array,$member_data);
							?>
                        </div>
                        
                        <div class="xxl-16 xl-16 m-16 s-16 xs-16 l-16 bg-border margin-top-15px" style="padding-top:0px;">
                            <div class="row" style="padding:4px;">
                                <h3 class="profile-heading" style="margin-top:0px;">
                                    <i class="fa fa-users ne_mrg_ri8_10 text-white"></i>Family Details
                                
                                    <a href="<?php echo $base_url.'my-profile/edit-profile/family-detail'; ?>" class="view_all underline">
                                        <i class="fa fa-pencil"></i>
                                    Edit <img src="<?php echo $base_url; ?>assets/front_end/images/icon/right-gray-arrow.png" class="padding-left-5" alt="">
                                    </a>
                                </h3>
                            </div>
                            <?php
								$element_array = array(
									'family_type'=>array('label'=>'Family Type'),
									'father_name'=>array('label'=>'Father Name'),
									'father_occupation'=>array('label'=>"Father Occupation"),
									'mother_name'=>array('label'=>"Mother Name"),
									'mother_occupation'=>array('label'=>"Mother Occupation"),
									'family_status'=>array('label'=>'Family Status'),
									'no_of_brothers'=>array('label'=>'No Of Brothers'),
									'no_of_married_brother'=>array('label'=>'No Of Married Brother'),
									'no_of_sisters'=>array('label'=>'No Of Sisters'),
									'no_of_married_sister'=>array('label'=>'No Of Married Sister'),
									'family_details'=>array('label'=>'About My Family','class_width'=>'col-lg-12 col-md-12 col-sm-12 col-xs-12','disp_label'=>'yes'),
								);
								echo $this->common_front_model->view_detail_common($element_array,$member_data);
							?>
                            
                        </div>
                        
                        <a class="xxl-16 xl-16 m-16 s-16 xs-16 l-16 bg-white ne_pad_tp_10px ne_pad_btm_10px neBoxShdOffwhite-1px border-1px-grey margin-top-15px neAfterBucket bg-dark-green" data-toggle="collapse" href="#collapseExample8" aria-expanded="false" aria-controls="collapseExample8" onclick="change_img1()">
                            <h3 class="margin-bottom-0px margin-top-0px ne_font_weight_nrm font-white">
                                <i class="fa fa-users ne_mrg_ri8_10"></i>Partner Preferences<i id="arrow_up_down" class="fa fa-chevron-down pull-right"></i>
                            </h3>
                        </a>
                        
                        <div class="collapse in" id="collapseExample8">
                            <div class="xxl-16 xl-16 m-16 s-16 xs-16 l-16 bg-border margin-top-15px" style="padding-top:0px;">
                                <div class="row" style="padding:4px;">
                                    <h3 class="profile-heading" style="margin-top:0px;" id="part_prefrence">
                                        <i class="fa fa-file-text-o ne_mrg_ri8_10 text-white"></i>Basic Preferences
                                    
                                        <a href="<?php echo $base_url.'my-profile/edit-profile/part-basic-detail'; ?>" class="view_all underline">
                                            <i class="fa fa-pencil"></i>
                                    Edit <img src="<?php echo $base_url; ?>assets/front_end/images/icon/right-gray-arrow.png" class="padding-left-5" alt="" >
                                        </a>
                                    </h3>
                                </div>
                                
                                 <?php
								$element_array = array(
									'looking_for'=>array('label'=>'Looking For','class_width'=>' col-lg-6 col-md-6 col-sm-12 col-xs-12','label_width'=>'3','val_width'=>9),
									'part_complexion'=>array('label'=>'Partner Complexion','class_width'=>' col-lg-6 col-md-6 col-sm-12 col-xs-12','label_width'=>'3','val_width'=>9),
									'part_frm_age'=>array('label'=>"Age Preference",'post_filed_concate'=>' to ','post_filed'=>'part_to_age','post_filed_val_after'=>' Years'),
									'part_height'=>array('label'=>"Height",'call_back'=>'display_height','post_filed_concate'=>' to ','post_filed'=>'part_height_to','post_filed_call_back'=>'display_height'),
									'part_bodytype'=>array('label'=>'Body Type','class_width'=>' col-lg-6 col-md-6 col-sm-12 col-xs-12','label_width'=>'3','val_width'=>9),
									'part_diet'=>array('label'=>'Eating Habit','class_width'=>' col-lg-6 col-md-6 col-sm-12 col-xs-12','label_width'=>'3','val_width'=>9),
									'part_smoke'=>array('label'=>'Smoking'),
									'part_drink'=>array('label'=>'Drinking','class_width'=>' col-lg-6 col-md-6 col-sm-12 col-xs-12','label_width'=>'3','val_width'=>9),
									'part_mother_tongue'=>array('label'=>'Mother Tongue','type'=>'relation','table_name'=>'mothertongue','disp_column_name'=>'mtongue_name','class_width'=>' col-lg-10 col-md-10 col-sm-12 col-xs-12','label_width'=>'2','val_width'=>10,'disp_label'=>'yes'),
									'part_expect'=>array('label'=>'Expectations','class_width'=>' col-lg-6 col-md-6 col-sm-12 col-xs-12','label_width'=>'3','val_width'=>9)
								);
								echo $this->common_front_model->view_detail_common($element_array,$member_data);
							?>
                            </div>
                            
                            <div class="xxl-16 xl-16 m-16 s-16 xs-16 l-16 bg-border margin-top-15px" style="padding-top:0px;">
                                <div class="row" style="padding:4px;">
                                    <h3 class="profile-heading" style="margin-top:0px;">
                                        <i class="fa fa-book ne_mrg_ri8_10 text-white"></i>Religious Preferences
                                    
                                        <a href="<?php echo $base_url.'my-profile/edit-profile/part-religious-detail'; ?>" class="view_all underline">
                                            <i class="fa fa-pencil"></i>
                                    Edit <img src="<?php echo $base_url; ?>assets/front_end/images/icon/right-gray-arrow.png" class="padding-left-5" alt="" />
                                        </a>
                                    </h3>
                                </div>
                                
                                 <?php
								$element_array = array(
									'part_religion'=>array('label'=>'Catholic Community','type'=>'relation','table_name'=>'religion','disp_column_name'=>'religion_name'),
									'part_caste'=>array('label'=>'Diocese','type'=>'relation','table_name'=>'caste','disp_column_name'=>'caste_name'),
									//'part_manglik'=>array('label'=>'Manglik'),
									//'part_star'=>array('label'=>'Star','type'=>'relation','table_name'=>'star','disp_column_name'=>'star_name'),
								);
								echo $this->common_front_model->view_detail_common($element_array,$member_data);
							?>
                            </div>
                            <div class="xxl-16 xl-16 m-16 s-16 xs-16 l-16 bg-border margin-top-15px" style="padding-top:0px;">
                                <div class="row" style="padding:4px;">
                                    <h3 class="profile-heading" style="margin-top:0px;">
                                        <i class="fa fa-map-marker ne_mrg_ri8_10 text-white"></i>Location Preferences
                                    
                                        <a href="<?php echo $base_url.'my-profile/edit-profile/part-location-detail'; ?>" class="view_all underline">
                                            <i class="fa fa-pencil"></i>
                                    			Edit <img src="<?php echo $base_url; ?>assets/front_end/images/icon/right-gray-arrow.png" class="padding-left-5" alt="" />
                                        </a>
                                    </h3>
                                </div>
                                <?php 
                                $element_array = array(
									'part_country_living'=>array('label'=>'Country','type'=>'relation','table_name'=>'country_master','disp_column_name'=>'country_name'),
									'part_state'=>array('label'=>'State','type'=>'relation','table_name'=>'state_master','disp_column_name'=>'state_name'),
									'part_city'=>array('label'=>'City','type'=>'relation','table_name'=>'city_master','disp_column_name'=>'city_name'),
									'part_resi_status'=>array('label'=>'Residence'),
								);
								echo $this->common_front_model->view_detail_common($element_array,$member_data);
							?>
                            </div>
                            <div class="xxl-16 xl-16 m-16 s-16 xs-16 l-16 bg-border margin-top-15px" style="padding-top:0px;">
                                <div class="row" style="padding:4px;">
                                    <h3 class="profile-heading" style="margin-top:0px;">
                                        <i class="fa fa-university ne_mrg_ri8_10 text-white"></i>Education / Occupation Preferences
                                    
                                        <a href="<?php echo $base_url.'my-profile/edit-profile/part-education-detail'; ?>" class="view_all underline">
                                            <i class="fa fa-pencil"></i>
                                    		Edit <img src="<?php echo $base_url;?>assets/front_end/images/icon/right-gray-arrow.png" class="padding-left-5" alt="" />
                                        </a>
                                    </h3>
                                </div>
                                <?php 
                                $element_array = array(
									'part_education'=>array('label'=>'Education','type'=>'relation','table_name'=>'education_detail','disp_column_name'=>'education_name','label_width'=>'1','val_width'=>11,'class_width'=>' col-lg-12 col-md-12 col-sm-12 col-xs-12',),
									'part_employee_in'=>array('label'=>'Employed in'),
									'part_occupation'=>array('label'=>'Occupation','type'=>'relation','table_name'=>'occupation','disp_column_name'=>'occupation_name'),
									'part_designation'=>array('label'=>'Designation','type'=>'relation','table_name'=>'designation','disp_column_name'=>'designation_name'),
									'part_income'=>array('label'=>'Annual Income')
								);
								echo $this->common_front_model->view_detail_common($element_array,$member_data);
							?>
                            </div>
                        </div>
                    </div>
					 <div class="xxl-4 xl-4 xs-16 m-16 s-16 l-4 hidden-lg hidden-md">
                        <?php $this->load->view('front_end/mobile_my_profile_sidebar'); ?>
                    </div>
                </div>
                <div class="clearfix"></div>
                <hr>
                <!--<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero need-help-img text-center">
                    <img src="<?php echo $base_url; ?>assets/front_end/images/icon/need-help.gif" class="img-responsive  hidden-xs hidden-sm text-center" alt="" />
                <p class="help-text">Need help? Here's one click assistance! <a href="#">Click here</a> <span class="text-grey">and we will get in touch with you right away.</span></p>
                </div>-->
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
	<div class="clearfix"></div>
<!------------------container-End------------------------------------>
	<div class="margin-top-30"></div>
<?php
$this->common_model->js_extra_code_fr.="
	 load_choosen_code();
	$(document).ready(function(){
		$('#mobi_menu').BootSideMenu({
			side: 'left',
			pushBody:false,
			width: '250px'
		});
		
		$(".'"'."[data-toggle='popover']".'"'.").popover(); 
		$(".'"'."[data-toggle='tooltip']".'"'.").tooltip(); 
	});
	
	function change_img1()
	{	
		var className = $('#arrow_up_down').attr('class');
		if(className =='fa fa-chevron-down pull-right')
		{
			$('#arrow_up_down').attr('class','fa fa-chevron-up pull-right');
		}
		else
		{
			$('#arrow_up_down').attr('class','fa fa-chevron-down pull-right');				
		}
	} 
	
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
	$('html, body').animate({
	scrollTop: $(window.location.hash).offset().top -100 }, 'slow');
";
?>