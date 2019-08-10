<!------------------<div class="container">----Start------------------------------------>
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
                    <li role="presentation" class="" id="step2_li"><!--disabled-->
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Education Qualification">
                            <span class="round-tab">
                                <img src="<?php echo $base_url; ?>assets/front_end/images/icon/graduation1.png" alt="horoscope" style="margin-top:-7px;" />
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="" id="step3_li"><!--disabled-->
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Eating Habits / Physical Info">
                            <span class="round-tab">
                                <img src="<?php echo $base_url; ?>assets/front_end/images/icon/cutlery.png" alt="horoscope" style="margin-top:-7px;" />
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="" id="step4_li"><!--disabled-->
                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Religious Information / Other Details ">
                            <span class="round-tab">
                                <img src="<?php echo $base_url; ?>assets/front_end/images/icon/horoscope.gif" alt="Religious Information / Other Details" style="width:63%;margin-top:-7px;" />
                            </span>
                            </a>
                    </li>
                    <li role="presentation" class="" id="complete_li"><!--disabled-->
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
                	
                    
                    <form method="post" id="register_step1" name="register_step1" action="<?php echo $base_url; ?>register/save-register-step/step1">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id"  class="hash_tocken_id" />
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
                            <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-20px">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            Country <span class="font-red">* </span>:
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                        <select class="form-control"  name="country_id" id="country_id" required onchange="dropdownChange('country_id','state_id','state_list')">
                                            <option value="">Select Country</option>
                                            <?php echo $this->common_model->array_optionstr($this->common_model->dropdown_array_table('country_master'));?>
                                        </select><div id="status1"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-20px">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            State <span class="font-red">* </span>:
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                        <select class="form-control" name="state_id" id="state_id" required onchange="dropdownChange('state_id','city','city_list')" >
                                            <option value="Select City">Select State</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-20px">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            City <span class="font-red">* </span>:
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                        <select class="form-control select-2"  name="city" id="city" required>
                                            <option value="Select City">Select City</option>                                            </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            Marital Status <span class="font-red">* </span>:
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                        <select class="form-control" required name="marital_status" id="marital_status">
                                            <option value="">Select Marital Status</option>
                                            <?php echo $this->common_model->array_optionstr('marital_status');?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-20px">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            Mother Tongue <span class="font-red">* </span>:
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                         <select class="form-control" required name="mother_tongue" id="mother_tongue">
                                            <option value="">Select Mother Tongue</option>
                                            <?php echo $this->common_model->array_optionstr($this->common_model->dropdown_array_table('mothertongue'));?>
                                        </select>
                                        <div class="clearfix margin-top-5"></div>
                                    </div>
                                </div>
                            </div>
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
                                            <center><hr style="width:50%;"></center>
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
                                            <center><hr style="width:50%;"></center>
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
                                <i class="fa fa-lg fa-info-circle"></i> Some Basic Partner Preffresnse
                            </h3>
                        </div>
                    </div>
                    <div class="xxl-12 xs-16 s-16 m-16 l-12 xl-12 padding-lr-zero-xs">
                        <div class="clearfix"></div>
                        <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-bottom-20 padding-lr-zero-xs">
                            <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-20px">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            Looking For <span class="font-red">* </span>:
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                        <select class="form-control"  name="looking_for[]" id="looking_for" required multiple >
                                            <?php echo $this->common_model->array_optionstr('marital_status');?>
                                        </select><div id="status1"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-20px">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            Partner Age <span class="font-red">* </span>:
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                    	<?php
										$age_rang_array =$this->common_model->age_rang();
										?>
                                        <select class="form-control"  name="part_frm_age" id="part_frm_age" required style="width:49%;float:left">
                                            <option value="">Select From Age</option>
                                            <?php echo $this->common_model->array_optionstr($age_rang_array);?>
                                        </select>
                                        <select class="form-control"  name="part_to_age" id="part_to_age" required style="width:50%;float:right">
                                            <option value="">Select To Age</option>
                                            <?php echo $this->common_model->array_optionstr($age_rang_array);?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-20px">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            Partner Height <span class="font-red">* </span>:
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                    	<?php
										$height_list_array =$this->common_model->height_list();
										?>
                                        <select class="form-control"  name="part_height" id="part_height" required style="width:49%;float:left">
                                            <option value="">Select From Height</option>
                                            <?php echo $this->common_model->array_optionstr($height_list_array);?>
                                        </select>
                                        <select class="form-control"  name="part_height_to" id="part_height_to" required style="width:50%;float:right">
                                            <option value="">Select To Height</option>
                                            <?php echo $this->common_model->array_optionstr($height_list_array);?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-20px">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            Partner Complexion <span class="font-red">* </span>:
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                        <select class="form-control"  name="part_complexion[]" id="part_complexion" multiple >
                                            <?php echo $this->common_model->array_optionstr('complexion');?>
                                        </select><div id="status1"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    <hr style="margin-top:0px;">
                    <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
                    	<button class="text-white font-15 bold btn pull-right btn-md next-step" >Save and continue <i class="fa fa-chevron-right"></i></button>
                      <!--  <a href="#" class="text-white font-15 bold btn pull-right btn-md next-step" style="padding:8px 10px;">Save and continue <i class="fa fa-chevron-right"></i></a>-->
                    </div>
                    </form>
                    
                </div>
                
                <div class="clearfix"></div>
                                
                <div class="tab-pane" role="tabpanel" id="step2">
                	<form method="post" id="register_step2" name="register_step2" action="<?php echo $base_url; ?>register/save-register-step/step2">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id"  class="hash_tocken_id" />
                    <input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />
                    <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero-xs">
                        <h4 class="text-center text-darkgrey bold font-18 font-weight-normal">Add your Education Information to make stronger Your Profile</h4>
                        <div class="clearfix"></div>
                        <div class="font-12 pull-right text-darkgrey"><span class="font-red">* </span> Mandatory fields</div>
                    </div>
                    
                    <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-20px-1200 margin-top-20px-1199 margin-top-20px-999 margin-top-15px-480px margin-top-10px-320px reg-main-title padding-lr-zero-xs" style="margin-top:5px;">
                        <h3 class="font-15-bold-arial title-bg">
                            <a href="#" class="text-white">
                                <i class="fa fa-graduation-cap"></i> Education / Occupation / Annual Income Details:
                            </a>
                        </h3>
                    </div>
                    <div class="clearfix"></div>
                    
                	<div class="xxl-12 xs-16 s-16 m-16 l-12 xl-12 padding-lr-zero-xs">
                        <div class="clearfix"></div>
                        <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-bottom-20 padding-lr-zero-xs">
                            <div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            Education <span class="font-red">* </span>:
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                        <select class="form-control select2"  required name="education_detail[]" id="education_detail" style="width:100%" multiple>
                                            <?php echo $this->common_model->array_optionstr($this->common_model->dropdown_array_table('education_detail'));?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            Employee In <span class="font-red">* </span>:
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                       	<select class="form-control select2"  required name="employee_in" id="employee_in" style="width:100%">
	                                       <option value="">Select Employee In</option>
                                            <?php echo $this->common_model->array_optionstr('employee_in');?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            Annual Income <span class="font-red">* </span>:
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                        <select class="form-control select2" required name="income" id="income" style="width:100%">
	                                       <option value="">Select Annual Income</option>
                                            <?php echo $this->common_model->array_optionstr('income');?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            Occupation <span class="font-red">* </span>:
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                        <select class="form-control" required name="occupation" id="occupation" style="width:100%">
                                            <option value="Select Occupation">Select Occupation</option>
                                            <?php echo $this->common_model->array_optionstr($this->common_model->dropdown_array_table('occupation'));?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            Designation <span class="font-red">* </span>:
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                        <select class="form-control" name="designation" id="designation" style="width:100%">
                                            <option value="Select Designation">Select Designation</option>
                                            <?php echo $this->common_model->array_optionstr($this->common_model->dropdown_array_table('designation'));?>
                                        </select>
                                    </div>
                                </div>
                            </div>
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
                                            <center><hr style="width:50%;"></center>
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
                                            <center><hr style="width:50%;"></center>
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
                        <a href="#" class="text-white font-15 bold btn pull-left btn-md prev-step" style="padding:8px 10px;"><i class="fa fa-chevron-left"></i> Previous</a>
                        <a href="#" class="text-white font-15 bold btn pull-right btn-md next-step" style="padding:8px 10px;">Save and continue <i class="fa fa-chevron-right"></i></a>
                    </div>
                    </form>
                </div>
                
                <div class="tab-pane" role="tabpanel padding-lr-zero-xs" id="step3">
                <form method="post" id="register_step3" name="register_step3" action="<?php echo $base_url; ?>register/save-register-step/step3">
                	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id"  class="hash_tocken_id" />
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
                            <div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            Height <span class="font-red">* </span>:
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xs-16 s-16 m-11 l-11 xl-11 margin-top-5px">
                                        <select class="form-control" name="height" id="height" style="width:100%" required>
                                        <option value="">Select Height</option>
                                        <?php echo $this->common_model->array_optionstr($this->common_model->height_list());?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            Weight <span class="font-red">* </span>:
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                        <select class="form-control" name="weight" id="weight" style="width:100%" required>
                                            <option value="">Select Weight</option>
                                            <?php echo $this->common_model->array_optionstr($this->common_model->weight_list());?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            Eating Habits <span class="font-red">* </span>: 
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                        <select class="form-control" id="diet" name="diet" required  style="width:100%">
                                            <option value="Select Eating Habits">Select Eating Habits</option>
                                            <?php echo $this->common_model->array_optionstr('diet');?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            Smoking <span class="font-red">* </span>:
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                        <select class="form-control" id="smoke" name="smoke" required  style="width:100%">
                                            <option value="Select about Smoking">Select Smoking</option>
                                            <?php echo $this->common_model->array_optionstr('smoke');?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            Drinking <span class="font-red">* </span>:
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                        <select class="form-control" id="drink" name="drink" required  style="width:100%">
                                            <option value="Select about Drinking">Select Drinking</option>
                                            <?php echo $this->common_model->array_optionstr('drink');?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            Body Type :
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                        <select class="form-control" id="bodytype" name="bodytype" style="width:100%">
                                            <option value="Select Body Type">Select Body Type</option>
                                            <?php echo $this->common_model->array_optionstr('bodytype');?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            Skin Tone <span class="font-red">* </span>:
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                        <select class="form-control" id="complexion" name="complexion" required style="width:100%">
                                            <option value="Select about Skin Tone">Select Skin Tone</option>
                                            <?php echo $this->common_model->array_optionstr('complexion');?>
                                        </select>
                                    </div>
                                </div>
                            </div>
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
                                            <center><hr style="width:50%;"></center>
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
                                            <center><hr style="width:50%;"></center>
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
                        <a href="#" class="text-white font-15 bold btn pull-left btn-md prev-step" style="padding:8px 10px;"><i class="fa fa-chevron-left"></i> Previous</a>
                        <a href="#" class="text-white font-15 bold btn pull-right btn-md next-step" style="padding:8px 10px;">Save and continue <i class="fa fa-chevron-right"></i></a>
                        <a href="#" class="text-white font-15 bold btn pull-right btn btn-md next-step margin-right-10 margin-top-10-sm text-left-xs skip hidden-xs" style="padding:8px 10px;">Skip <i class="fa fa-chevron-right"></i></a>
                    </div>
                    
                    <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-10 hidden-lg hidden-md hidden-sm">
                        <a href="#" class="text-white font-15 bold btn pull-right btn btn-md next-step margin-top-10-sm pull-right" style="padding:8px 10px;">Skip <i class="fa fa-chevron-right"></i></a>
                    </div>
                    </form>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="tab-pane" role="tabpanel padding-lr-zero-xs" id="step4">
                <form method="post" id="register_step4" name="register_step4" action="<?php echo $base_url; ?>register/save-register-step/step4">
                	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id"  class="hash_tocken_id" />
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
                            
                            <div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                        Parish:
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                    	<input type="text" name="subcaste" id="subcaste" class="form-control" />                                    </div>
                                </div>
                            </div>
                            <!-- <div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            Manglik : 
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                        <select class="form-control" id="manglik" name="manglik" style="width:100%">
                                            <option value="Select Manglik">Select Manglik</option>
                                        	<?php echo $this->common_model->array_optionstr('manglik');?>    
                                        </select>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            Star : 
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                        <select class="form-control" id="star" name="star" style="width:100%">
                                            <option value="Select Star">Select Star</option>
                                        	<?php echo $this->common_model->array_optionstr('star');?>    
                                        </select>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            Horoscope : 
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                        <select class="form-control" id="horoscope" name="horoscope" style="width:100%">
                                            <option value="Select Horoscope">Select Horoscope</option>
                                        	<?php echo $this->common_model->array_optionstr('horoscope');?>    
                                        </select>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            Gothra :
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                    	<input type="text" name="gothra" id="gothra" class="form-control" />
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px">
                                <div class="row">
                                    <div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
                                        <label>
                                            Moonsign : 
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                        <select class="form-control" id="moonsign" name="moonsign" style="width:100%">
                                            <option value="Select Moonsign">Select Moonsign</option>
                                        	<?php echo $this->common_model->array_optionstr('moonsign');?>    
                                        </select>
                                    </div>
                                </div>
                            </div> -->
                            
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
                                        <textarea id="profile_text" class="form-control" rows="5" placeholder="" name="profile_text" required></textarea>
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
                                            Hobby : 
                                        </label>
                                    </div>
                                    <div class="clearfix visible-xs"></div>
                                    <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
                                        <textarea id="hobby" class="form-control" rows="5" placeholder="" name="hobby" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
                        <a href="#" class="text-white font-15 bold btn pull-left btn-md prev-step" style="padding:8px 10px;"><i class="fa fa-chevron-left"></i> Previous</a>
                        <a href="#" class="text-white font-15 bold btn pull-right btn-md next-step" style="padding:8px 10px;">Save and continue <i class="fa fa-chevron-right"></i></a>
                        <a href="#" class="text-white font-15 bold btn pull-right btn btn-md next-step margin-right-10 skip hidden-xs" style="padding:8px 10px;">Skip <i class="fa fa-chevron-right"></i></a>
                    </div>
                    <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-10 hidden-lg hidden-md hidden-sm">
                        <a href="#" class="text-white font-15 bold btn pull-right btn btn-md next-step margin-top-10-sm pull-right" style="padding:8px 10px;">Skip <i class="fa fa-chevron-right"></i></a>
                    </div>
                    </form>
                </div>
                <div class="clearfix"></div>
                
                <div class="tab-pane padding-lr-zero-xs" role="tabpanel" id="complete">
                	<form method="post" id="register_step5" name="register_step5" action="<?php echo $base_url; ?>register/save-register-step/step5" enctype="multipart/form-data">
                    	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id"  class="hash_tocken_id" />
                    	<input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />
                    <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-xs">
                        <div class="xxl-12 xl-12 l-12 m-16 s-16 xs-16 margin-bottom-20 box-shadow padding-20-5-xs" style="border:8px outset #999;border-radius:3px;padding:20px;">
                            <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
                                <h3 class="text-center text-green">Add your photo and get much better responses!</h3>
                            </div>
                            <div class="clearfix"></div>
                            <div class="colorgraph"></div>
                            <div class="xxl-10 xl-10 l-10 m-16 s-16 xs-16 ne_photo_upload border-right margin-top-30px margin-bottom-10 padding-0-5-xs">
                                <center>
                                    <div class="xxl-16 xl-16 xs-16 m-6 l-16 s-16 margin-top-20">
                                        <div class="fileUpload btn btn-sm active font-15 bold text-white" style="background:#F58220 !important;box-shadow:4px 4px 0 0 #ddd;"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/add-photo-comp.gif" width="23" height="30" alt="" style="padding-top:6px;"> Upload from  Computer 
                                        <input type="file" id="image" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" class="upload xxl-16 xs-16 m-16 xs-16 padding-top-10px padding-bottom-10px" style="padding:5px;height:100%;" />
                                        <img class="" width="23" height="23"  alt="" src="<?php echo $base_url; ?>assets/front_end/images/icon/profile-arrow.png" ></div> 
                                    </div>
                                    
                                    <!--<div class="xxl-16 xl-16 s-16 xs-16 m-16 l-16 text-center margin-top-5">
                                        <h3 class="text-grey text-center" style="padding:8px 5px;text-shadow:2px 2px 1px rgba(203, 203, 203, 1);">OR</h3>
                                    </div>
                                
                                    <a class="btn btn-sm text-white font-15 bold" href="https://www.facebook.com" target="_blank" style=" display: inline-block; background-color:#4483b0 !important;box-shadow:3px 3px 0 0 #e2e2e2;">
                                        <img src="<?php echo $base_url; ?>assets/front_end/images/icon/add-photo-fb.gif" width="28" height="30"  alt="" class="fleft paddl10 margin-right-10" style="padding-top:6px;"> Upload from Facebook 
                                        <img width="23" height="23"  alt="" class=" margin-left-10" src="<?php echo $base_url; ?>assets/front_end/images/icon/profile-arrow.png">
                                    </a>
                                    -->
                                </center>
                                <div class="clearfix"></div>
                            </div>
                            <div class="xxl-6 xl-6 l-6 m-16 s-16 xs-16 ne_pad_btm_10px ne_pad_tp_10px">
                                <div class="row">
                                    <div class="xxl-14 xxl-margin-left-1 xl-14 xl-margin-left-1 video-effect">
                                        <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 text-center">
                                            <h4 class="font-15 text-darkgrey">No horoscope Image available</h4>
                                            <div class="margin-top-10"></div>
                                            <img id="blah" src="<?php echo $base_url; ?>assets/front_end/images/icon/no-image.jpg" class="blah border img-responsive" alt="your image" width="250" height="250" style="box-shadow: 0 5px 11px 0 rgba(0,0,0,.18), 0 4px 15px 0 rgba(0,0,0,.15);margin:12px 12px;"/>
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
                                        <li class="small"> - The maximum file size for uploads in this demo is <strong>999 KB</strong> (default file size is unlimited).</li>
                                        <li class="small margin-top-10"> - image files (<strong>JPG, GIF, PNG</strong>) are Not allowed in this demo (by default there is no file type restriction).</li>
                                        <li class="small margin-top-10"> - Only PDF or Word files are allowed in this demo (by default there is no file type restriction).</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="xxl-16 m-16 s-16 xs-16">
                        <div class="row margin-bottom-10">
                            <div class="xxl-16 m-16 s-16 xs-16">
                                <div class="row">
                                    <div class="xxl-10 xxl-margin-left-5 l-10 l-margin-left-2 xs-16 xs-margin-left-0">
                                        <input checked="" name="term_condition" data-validetta="required" type="checkbox"> I Accept <a href="terms_and_condition.html" target="_blank">Terms &amp; Condition</a>  and <a href="privacy_policy.html" target="_blank">Privacy Policy</a>.
                                    </div>
                                </div>
                            </div>
                            <div class="xxl-8 xxl-margin-left-5 l-10 l-margin-left-2 xs-16 xs-margin-left-0 margin-top-10 text-center">
                            <a href="registration_successful.html" class="btn xs-16 xxl-9 xl-9 l-16 s-16 m-16 text-white font-15 bold next-step"   style="box-shadow:3px 3px 0 0 #ddd;">Register <i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>			
</div>
				
<script src="<?php echo $base_url; ?>assets/front_end/js/jquery.min.js?ver=1.0"></script>
<script src="<?php echo $base_url; ?>assets/front_end/js/bootstrap.min.js?ver=1.0"></script>
<script src="<?php echo $base_url; ?>assets/front_end/js/select2.min.js?ver=1.0"></script>
<script src="<?php echo $base_url; ?>assets/front_end/js/jquery.sticky.js?ver=1.0"></script>
<script src="<?php echo $base_url; ?>assets/front_end/js/common.js?ver=1.1"></script>
<script>
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
	
	if($("#register_step1").length > 0)
	{
		$("#register_step1").validate({
			submitHandler: function(form)
			{
				return false;
			}
		});
	}
	select2('#education_detail','Select Education');
	select2('#languages_known','Select Languages Known');
	select2('#part_complexion','Select Complexion');
	select2('#looking_for','Select Looking For');
});
function nextTab(elem) {
	$(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
	$(elem).prev().find('a[data-toggle="tab"]').click();
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

</script>
</body>
</html>