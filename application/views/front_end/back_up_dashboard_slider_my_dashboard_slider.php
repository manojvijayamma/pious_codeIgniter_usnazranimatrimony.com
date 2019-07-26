<?php $curre_id = $this->common_front_model->get_session_data('id');
$percentage_stored = $this->common_front_model->getprofile_completeness($curre_id);?>
<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-5">
	<?php $this->load->view('front_end/my_profile_sidebar'); ?>
</div>
    <!------for update field success error message display---->  
    <?php
	if($this->session->flashdata('success_message'))
	{
		$success_message = $this->session->flashdata('success_message');
		if($success_message !='')
		{
			echo '<div class="xxl-12 xl-12 xs-16 m-16 s-16 l-16"><div id="update_field_success" class="alert alert-success  alert-dismissable " style="display:none;"><div class="fa fa-check">&nbsp;</div><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>'.$success_message.'</div></div>';
		}
	}
	$this->session->unset_userdata('success_message');?>
	<!------for update field success error message display---->
                     
    <div class="xxl-12 xl-12 xs-16 m-16 s-16 l-16 margin-bottom-10">
    
        <div class="xxl-11 xl-11 xs-11 m-16 s-16 l-16 compltele-profile">
            <!--<button type="button" class="close" style="background:none !important;">&times;</button>-->
            <div class="xxl-6 xl-6 xs-16 m-16 s-16 l-6">
                Complete your profile
            </div>
            <div class="xxl-16 xl-16 xs-16 m-16 s-16 l-10">
                <div class="progress xxl-16 xl-16 xs-16 l-16 margin-top-3px" style="margin-bottom:0px;">
                    <div class="row">
                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $percentage_stored; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage_stored; ?>%;">
                            <?php echo $percentage_stored; ?> %
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="clearfix"></div>
            <hr>
            <div class="xxl-16 xl-16 xs-16 m-16 s-16 l-16 margin-top-10">

			<?php 
            if($percentage_stored < 100)	
            { 
                $where = array('id'=>$curre_id);
                $login_user_data = $this->common_front_model->get_count_data_manual('register',$where,1);
                $field_array = $this->common_front_model->field_percentage_array();?>

                <div class="carousel slide" data-ride="carousel" id="quote-carousel_slide">
                    <div class="carousel-inner">
                    <?php $i = 0;
                        foreach($field_array as $fields=>$val)
                        {
                            if(array_key_exists($fields,$login_user_data))
                            { 
                                if(empty($login_user_data[$fields]) || trim($login_user_data[$fields])=='')
                                {
									if(($fields =='no_of_brothers' && $login_user_data[$fields] =='0') || ($fields =='no_of_sisters' && $login_user_data[$fields] =='0'))
									{
										continue;
									}
										
                                    if($i === 0)
                                    {?>
                                        <div class="item active <?php echo $fields;?>">
                                    <?php 
									}
                                    else
                                    {?>
                                        <div class="item <?php echo $fields;?>">
                                    	<?php 
									}
									
									if($fields=='firstname' || $fields=='lastname' || $fields=='email' || $fields=='mother_tongue' || $fields=='height' || $fields=='weight' || $fields=='religion' ||$fields=='reference'  || $fields=='complexion' || $fields=='profileby' || $fields=='diet' || $fields=='subcaste' || $fields=='horoscope' || $fields=='manglik' || $fields=='gothra' || $fields=='blood_group' || $fields=='bodytype' || $fields=='residence'  ||$fields=='star' || $fields=='moonsign' ||  $fields=='country_master' || $fields=='education_detail' || $fields=='occupation' || $fields=='marital_status' || $fields=='income' || $fields=='hobby' || $fields=='profile_text' || $fields=='family_details' || $fields=='address' || $fields=='designation' || $fields=='employee_in' || $fields=='time_to_call' || $fields=='family_type' || $fields=='family_status' || $fields=='father_name' || $fields=='mother_name' || $fields=='no_of_married_brother' || $fields=='no_of_married_sister' || $fields=='looking_for' || $fields=='part_frm_age' || $fields=='part_to_age' || $fields=='part_expect' || $fields=='part_height' || $fields=='part_height_to' || $fields=='part_complexion' ||$fields=='part_mother_tongue' || $fields=='part_religion' || $fields=='part_caste' || $fields=='part_education' || $fields=='part_resi_status' || $fields=='mobile' || $fields=='phone' || $fields=='languages_known' || $fields=='birthplace' || $fields=='birthtime' || $fields=='father_occupation' || $fields=='mother_occupation' || $fields=='no_of_brothers' || $fields=='no_of_sisters')
									{
										?>
									
                                        <div class="xxl-3 xl-3 xs-16 m-16 s-16 l-3 margin-top-10">
                                            <p class="profile-update-img4"></p>
                                        </div>
                                        
                                        <div class="xxl-13 xl-13 xs-16 m-16 s-16 l-13">
                                            <form class="xxl-16 xl-16 m-16 xs-16 l-16 s-16 ne_font_14" method="post" action=""id="update_fields" name="update_fields">	 
                                                <p class="bold small">Add Your <?php 
												if($fields=='part_resi_status')
												{
													echo 'Part residence';
												}
												else if($fields=='birthplace')
												{
													echo 'Birth place';
												}
												else
												{
													echo str_replace('_',' ', ucfirst($fields));
												}
												?>. <span class="text-green">(+<?php echo $val;?>%)</span></p>
                                                <div class="xxl-16 xl-15 xs-16 s-16 m-16 l-16 margin-top-10" style="padding:5px 5px 0 0px;">
												<?php 
												if($fields=='firstname' || $fields=='lastname' ||$fields=='subcaste' || $fields=='gothra' || $fields=='father_name' || $fields=='mother_name' || $fields=='father_occupation' || $fields=='mother_occupation')
                                                {?>
                                            			<input type="text" placeholder="Add <?php echo str_replace('_',' ', ucfirst($fields));?>" class="form-control" onkeypress="return KeycheckOnlyCharacter(event)" style="margin-top:3px;margin-bottom: 5px;border:1px solid #ddd;padding:9px 5px;border-radius:3px;background:#fdfdfb;box-shadow:inset #EAEAEA 1px 1px 4px 0px;" name="<?php echo $fields;?>" id="<?php echo $fields;?>" >
												<?php 
                                                }
												else if($fields=='birthplace')
                                                {?>
                                            			<input type="text" placeholder="Add <?php echo 'Birth place';?>" class="form-control" onkeypress="return KeycheckOnlyCharacter(event)" style="margin-top:3px;margin-bottom: 5px;border:1px solid #ddd;padding:9px 5px;border-radius:3px;background:#fdfdfb;box-shadow:inset #EAEAEA 1px 1px 4px 0px;" name="<?php echo $fields;?>" id="<?php echo $fields;?>" >
												<?php 
                                                }
                                                else if($fields=='mobile' || $fields=='phone')
                                                {?>
                                                    <input type="text" onkeypress="return KeycheckOnlyPhonenumber(event)" placeholder="Add <?php echo str_replace('_',' ', ucfirst($fields));?>" class="form-control" style="margin-top:3px;margin-bottom: 5px;border:1px solid #ddd;padding:9px 5px;border-radius:3px;background:#fdfdfb;box-shadow:inset #EAEAEA 1px 1px 4px 0px;" name="<?php echo $fields;?>" id="<?php echo $fields;?>" >
                                                <?php }
												else if($fields=='hobby' || $fields=='profile_text' || $fields=='family_details' || $fields=='address' || $fields=='part_expect' ){?>
													<textarea class="form-control" rows="1" name="<?php echo $fields;?>" id="<?php echo $fields;?>" required/></textarea>
												<?php 
												}
												else if($fields=='birthtime')
												{?>
													<input type="time" placeholder="Add <?php echo str_replace('_',' ', ucfirst($fields));?>" class="form-control" style="margin-top:3px;margin-bottom: 5px;border:1px solid #ddd;padding:9px 5px;border-radius:3px;background:#fdfdfb;box-shadow:inset #EAEAEA 1px 1px 4px 0px;" name="<?php echo $fields;?>" id="<?php echo $fields;?>" >
												<?php }
												else if($fields=='hobby' || $fields=='profile_text' || $fields=='family_details' || $fields=='address' || $fields=='part_expect'){?>
													<textarea class="form-control" rows="1" name="<?php echo $fields;?>" id="<?php echo $fields;?>" required/></textarea>
												<?php }
											
													else if($fields=='time_to_call')
													{?>
														<input type="text" placeholder="Add <?php echo str_replace('_',' ', ucfirst($fields));?>" class="form-control" style="margin-top:3px;margin-bottom: 5px;border:1px solid #ddd;padding:9px 5px;border-radius:3px;background:#fdfdfb;box-shadow:inset #EAEAEA 1px 1px 4px 0px;" name="<?php echo $fields;?>" id="<?php echo $fields;?>" >
													<?php }
													
													else if($fields=='hobby' || $fields=='profile_text' || $fields=='family_details' || $fields=='address' || $fields=='part_expect' ){?>
														<textarea class="form-control" rows="1" name="<?php echo $fields;?>" id="<?php echo $fields;?>" required/></textarea>
													<?php }
													else if($fields == 'looking_for'){?>
															<select class="form-control" name="<?php echo $fields;?>" id="<?php echo $fields;?>">
																<option value="">Select <?php echo str_replace('_',' ', ucfirst($fields));?></option>
																<?php echo $this->common_model->array_optionstr($this->common_model->get_list_ddr('marital_status'));?>
															</select>
                                                    <?php }
													else if($fields=='profileby' || $fields=='reference' ||  $fields=='diet' || $fields=='marital_status' || $fields=='horoscope' || $fields=='manglik' || $fields=='blood_group' || $fields=='complexion' || $fields=='bodytype' || $fields=='residence' ||  $fields=='employee_in' || $fields=='income' || $fields=='family_type' || $fields=='family_status' || $fields=='no_of_married_brother' || $fields=='no_of_married_sister' )
												   {?>
                                                   
													<select class="form-control" name="<?php echo $fields;?>" id="<?php echo $fields;?>">
														<option value="">Select <?php echo str_replace('_',' ', ucfirst($fields));?></option>
														<?php echo $this->common_model->array_optionstr($this->common_model->get_list_ddr($fields));?>
													</select>
													
													<?php }
													else if( $fields=='no_of_brothers' && $login_user_data['no_of_brothers']!='0')
													{											
													?>
														<select class="form-control" name="<?php echo $fields;?>" id="<?php echo $fields;?>">
															<option value="">Select <?php echo str_replace('_',' ', ucfirst($fields));?></option>
															<?php echo $this->common_model->array_optionstr($this->common_model->get_list_ddr($fields));?>
														</select>
									
													<?php 
													}
													else if( $fields=='no_of_sisters' && $login_user_data['no_of_sisters']!='0')
													{
													?>
                                                        <select class="form-control" name="<?php echo $fields;?>" id="<?php echo $fields;?>">
                                                            <option value="">Select <?php echo str_replace('_',' ', ucfirst($fields));?></option>
                                                            <?php echo $this->common_model->array_optionstr($this->common_model->get_list_ddr($fields));?>
                                                        </select>
                                    
                                                    <?php 
                                                    }
                                                    else if($fields=='height' || $fields=='part_height' || $fields=='part_height_to')
                                                    {?>
                                                        <select class="form-control" name="<?php echo $fields;?>" id="<?php echo $fields;?>">
                                                            <option value="">Select <?php echo str_replace('_',' ', ucfirst($fields));?></option>
                                                            <?php echo $this->common_model->array_optionstr($this->common_model->height_list());?>
                                                        </select>
                                                    
                                                    <?php }else if($fields=='weight')
                                                    {?>
                                                        <select class="form-control" name="<?php echo $fields;?>" id="<?php echo $fields;?>">
                                                            <option value="">Select <?php echo str_replace('_',' ', ucfirst($fields));?></option>
                                                            <?php echo $this->common_model->array_optionstr($this->common_model->weight_list());?>
                                                        </select>
                                    
                                                        <?php }else if($fields=='mother_tongue' || $fields=='star' || $fields=='moonsign' || $fields=='education_detail' || $fields=='occupation' || $fields=='designation' || $fields=='religion' || $fields=='part_mother_tongue' || $fields=='part_religion' || $fields=='part_education'|| $fields=='languages_known')
                                                        { ?>
                                                            <select class="form-control" name="<?php echo $fields;?>" id="<?php echo $fields;?>">
                                                                <option value="">Select <?php echo str_replace('_',' ', ucfirst($fields));?></option>
                                                                <?php echo $this->common_model->array_optionstr($this->common_model->dropdown_array_table($fields));?>
                                                            </select>
                                                    
                                                        <?php }else if( $fields=='part_complexion') 
                                                        { ?>
                                                                    <select class="form-control" name="<?php echo $fields;?>" id="<?php echo $fields;?>">
                                                                        <option value="">Select <?php echo str_replace('_',' ', ucfirst($fields));?></option>
                                                                        <?php echo $this->common_model->array_optionstr($this->common_model->get_list_ddr('complexion'));?>
                                                                    </select>
																	<?php }else if($fields=='part_resi_status') 
                                                                    { 	?>
                                                                        <select class="form-control" name="<?php echo 'Part residence';?>" id="<?php echo $fields;?>">
                                                                            <option value="">Select <?php echo 'Part residence';?></option>
                                                                            <?php echo $this->common_model->array_optionstr($this->common_model->get_list_ddr('residence'));?>
                                                                        </select>
                                                         
                                                                    <?php }else if( $fields=='part_caste') 
                                                                    {	?>
                                                                        <select class="form-control" name="<?php echo $fields;?>" id="<?php echo $fields;?>">
                                                                            <option value="">Select <?php echo str_replace('_',' ', ucfirst($fields));?></option>
                                                                            <?php echo $this->common_model->array_optionstr($this->common_model->dropdown_array_table($fields));?>
                                                                        </select>
											
																	<?php }else if($fields=='part_frm_age' || $fields=='part_to_age')
                                                                    {?>
                                                                        <select class="form-control" name="<?php echo $fields;?>" id="<?php echo $fields;?>">
                                                                            <option value="">Select <?php echo str_replace('_',' ', ucfirst($fields));?></option>
                                                                            <?php echo $this->common_model->array_optionstr($this->common_model->age_rang());?>
                                                                        </select>
                                                                    <?php }?>
                                            
                                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" class="hash_tocken_id" />
                                                                    <input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />                                        <input type="hidden" name="is_post" id="is_post" value="1" />
                                                                    <input type="submit" onClick="return fields('<?php echo $fields;?>')" class="profile-complate-btn" value="Save">
                                                </div>
                                                </form>
                                            </div>
										<?php $i++; ?>
										<?php } 
										
										else if($fields=='country_id' || $fields=='state_id' || $fields=='city') 
										{	?>
											<div class="xxl-16 xl-16 xs-16 m-16 s-16 l-13 margin-top-30 margin-bottom-40" align="center">
												<div class="xxl-16 xl-15 xs-16 s-16 m-16 l-16">
													<a href="<?php echo $base_url;?>my_profile/edit-profile/residence-detail">Click Here And Add Your <?php echo str_replace('_',' ', ucfirst($fields));?>. <span class="text-green">(+<?php echo $val;?>%)</span> </a>
                                                </div>
                                            </div>
                                         <?php $i++; ?>
										 <?php 
										 }
										 else if($fields=='photo1' || $fields=='photo2' || $fields=='photo3' || $fields=='photo4' || $fields=='photo5' || $fields=='photo6') 
										 {	?>
											<div class="xxl-16 xl-16 xs-16 m-16 s-16 l-13 margin-top-30 margin-bottom-40" align="center">
												<div class="xxl-16 xl-15 xs-16 s-16 m-16 l-16">
													<a href="<?php echo $base_url;?>modify-photo">Click Here And Upload Your <?php echo str_replace('_',' ', ucfirst($fields));?>. <span class="text-green">(+<?php echo $val;?>%)</span> </a>
                                                </div>
											</div>
                                         <?php $i++; ?>
										 <?php }
										 else if($fields=='cover_photo') 
										 {	?>
											<div class="xxl-16 xl-16 xs-16 m-16 s-16 l-13 margin-top-30 margin-bottom-40" align="center">
												<div class="xxl-16 xl-15 xs-16 s-16 m-16 l-16">
													<a href="<?php echo $base_url;?>upload/cover-photo">Click Here And Upload Your <?php echo str_replace('_',' ', ucfirst($fields));?>. <span class="text-green">(+<?php echo $val;?>%)</span> </a>
                                                </div>
											</div>
                                         <?php $i++; ?>
										 <?php }
										 else if($fields=='horoscope_photo') 
										 {	
											?>
											<div class="xxl-16 xl-16 xs-16 m-16 s-16 l-13 margin-top-30 margin-bottom-40" align="center">
												<div class="xxl-16 xl-15 xs-16 s-16 m-16 l-16">
													<a href="<?php echo $base_url;?>upload/horoscope">Click Here And Upload Your <?php echo str_replace('_',' ', ucfirst($fields));?>. <span class="text-green">(+<?php echo $val;?>%)</span> </a>
                                                </div>
                                            </div>
                                            <?php $i++; ?>
                                         <?php }else if($fields=='part_country_living' || $fields=='part_state' || $fields=='part_city' ) 
										 {?>
											<div class="xxl-16 xl-16 xs-16 m-16 s-16 l-13 margin-top-30 margin-bottom-40" align="center">
												<div class="xxl-16 xl-15 xs-16 s-16 m-16 l-16">
													<a href="<?php echo $base_url;?>my-profile/edit-profile/part-location-detail">Click Here And Add Your <?php  $test = str_replace('part','Partner', $fields);  echo str_replace('_',' ', ucfirst($test))?>. <span class="text-green">(+<?php echo $val;?>%)</span> </a>
                                                </div>
                                            </div>
											<?php $i++; ?>
                                         <?php } ?>
									</div>
								<?php } 
                                } 
                            }  ?>  
                        </div>
							<?php if($i>1)
							{?>
                                <a data-slide="prev" href="#quote-carousel_slide" class="left carousel-control" style="color:#F9A630;"><img class="img-circle" src="<?php echo $base_url; ?>assets/front_end/images/icon/arrow-lft-mh.gif" alt=""></a>
                                <a data-slide="next" href="#quote-carousel_slide" class="right carousel-control" style="color:#F9A630;"><img class="img-circle" src="<?php echo $base_url; ?>assets/front_end/images/icon/arrow-rgt-mh.gif" alt=""></a>
                            	<?php 
							}?> 
                            </div> 
							
						<?php 
                        }
                        else
                        {?>
                            <div class="carousel slide" data-ride="carousel" id="quote-carousel_slide">
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <div class="xxl-16 xl-16 xs-16 m-16 s-16 l-13 margin-top-40 margin-bottom-20" align="center">                        				<div class="xxl-16 xl-15 xs-16 s-16 m-16 l-16 margin-bottom-10" style="padding:5px 5px 0 0px;" align="center">
                                                <h4><span class="todo-done">Your profile is complete get more responses.</span></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        	<?php 
						}?>
                    </div>
                </div>
                        
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 compltele-profile compltele-profile_mobile margin-top-10-xs" style="padding:4px 4px;width:30%;margin-left:10px;">
                            <div class="">
                                <div class="upgrade-heading"><i class="fa fa-user"></i> Profile Completeness</div>
                                    <div class="todo-percentage" id="progress_bar" data-percent="<?php echo $percentage_stored;?>"></div>
                                <div class="upgrade-footer"><div class="todo-value"> <span class="todo-done"><?php echo $percentage_stored; ?>% Complete</span> | <span class="todo-pending"><?php echo 100 -$percentage_stored; ?>% Remaining </span> </div></div>
                            </div>
                        </div>
                    </div>