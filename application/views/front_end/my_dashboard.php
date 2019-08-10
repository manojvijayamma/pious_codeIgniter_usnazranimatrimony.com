<style>
	p:last-child {
    margin-bottom: 0px;
    color: #b9466d;
    font-size: 0.85em;
    line-height: 1.8em;
	}
	.border-left {
    border-left: 1px solid #f2ddc8;
	}
	hr {
    border-top: 1px solid #f2ddc8;
	}
</style>

<?php
	
	$comm_model = $this->common_model;
	$curre_gender = $this->common_front_model->get_session_data('gender');
	$matri_id = $this->common_front_model->get_session_data('matri_id');
	$curre_id = $this->common_front_model->get_session_data('id');
	$curre_data = $this->common_front_model->get_session_data();
	
	$member_data_mobile = '';
	if(isset($curre_id) && $curre_id!=''){
		$where_array = array('id'=>$curre_id, 'is_deleted'=>'No');
		$member_data_mobile = $this->common_model->get_count_data_manual('register',$where_array,1,'id,matri_id,username,email,mobile,mobile_verify_status,email,cpass_status,id_proof');
	}
	
	$mobile_num = '';
	$mobile_num_status = '';
	if(isset($member_data_mobile) && $member_data_mobile != "")
	{
		if(isset($member_data_mobile['mobile']) && $member_data_mobile['mobile']!='') 
		{
			$mobile_num = $member_data_mobile['mobile'];
		}
		if(isset($member_data_mobile['mobile_verify_status']) && $member_data_mobile['mobile_verify_status'] != '')
		{
			$mobile_num_status = $member_data_mobile['mobile_verify_status'];
		}
	}
	$this->common_model->extra_js_fr[] = 'js/editor.js';
	//$percentage_stored = $this->common_front_model->getprofile_completeness($curre_id);
	$where_arra = array('is_deleted' => 'No', "status !='UNAPPROVED' and status !='Suspended'");
	if (isset($curre_gender) && $curre_gender != '') {
		$where_arra[] = " gender != '$curre_gender' ";
	}
	
	if (isset($curre_gender) && $curre_gender == 'Male') {
		$photopassword_image = $base_url . 'assets/images/photopassword_female.png';
		} else {
		$photopassword_image = $base_url . 'assets/images/photopassword_male.png';
	}
$current_login_user = $this->common_front_model->get_session_data(); ?>

<div class="">
    <div class="container padding-lr-zero-xs">
        <div class="margin-top-5">
            <!--<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
                <div class="">
				<img src="<?php echo $base_url; ?>assets/front_end/images/icon/register-header-female.jpg"  class="ful-width img-thumbnail" alt="" style="width:100%;" /> 
                </div>
			</div>-->
            <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 margin-top-20 padding-lr-zero-xs" style="padding-right:0px;">
                <div class="" id="my_dashboard_slider_ajax">
                    <?php include_once('my_dashboard_slider.php'); ?>
				</div>
                <div class="xxl-12 xl-12 xs-16 m-16 s-16 l-11 ne_myhome_tab">
                    <div class="row">
                        <div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-320 padding-lr-zero-768">                                <div>    
							<?php
                                $last_added_profile = $this->matches_model->get_matching_result_dashboard(1);
								
								//echo $last_added_profile['is_deleted'];
								$count_last_added_profile = 0;
								if(isset($last_added_profile) && $last_added_profile !='' && is_array($last_added_profile) && count($last_added_profile) > 0)
								{									
									$count_last_added_profile = count($last_added_profile);
								}
								
                                if(isset($last_added_profile) && $last_added_profile != '' && $count_last_added_profile > 0) {
								?>                            
								<div class="xxl-16 xl-16 m-16 l-16 xs-16 s-16 compltele-profile margin-bottom-15 margin-top-10" style="padding-top:0px;padding-bottom:0px;">
									<div class="row" style="padding:4px;">									
										<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 bg-white" style="box-shadow: none;">
											<div class="row upgrade-heading">
												<h3 class="font-13 text-white">You might also be interested in these new matching profiles</h3>
											</div>
											<div class="clearfix"></div>
											<div class="row">
												<div class="xxl-16 xl-16 m-16 s-16 l-16 xs-16 ne_myhome_featured-pro margin-bottom-20px margin-top-15px">
													<div class="carousel slide" data-ride="carousel" id="quote-carousel_2">
														<div class="carousel-inner">
															<div class="item active">
																<div class="owl-carousel xxl-16 padding-lr-zero">
																	<?php
                                                                        $i = 0;
                                                                        foreach ($last_added_profile as $member_data) 
																		{
																			$is_deleted = $member_data['is_deleted'];
                                                                            if($is_deleted == 'No')
																			{
																				if ($i!=0 && $i%4==0)
																				{
																				?>
																			</div>
																		</div>
																		<div class="item">
																			<div class="owl-carousel xxl-16 padding-lr-zero">
																				<?php		
                                                                                	//break;
																				}
                                                                            	$i++;
																			?> 
                                                                            <div class="xxl-4 xl-4 l-4 m-4 xs-16 s-16 tex-center">
                                                                                <?php
																					$path_photos = $this->common_model->path_photos;
																					//echo $member_data['is_deleted'];
																					
																					if (isset($member_data['photo1']) && $member_data['photo1'] != '' && isset($member_data['photo1_approve']) && $member_data['photo1_approve'] == 'APPROVED' && file_exists($path_photos . $member_data['photo1']) && isset($member_data['photo_password']) && $member_data['photo_password'] != '' && isset($member_data['photo_protect']) && $member_data['photo_protect'] != 'No' && isset($member_data['photo_view_status']) && $member_data['photo_view_status'] == 0) {
																					?>
                                                                                    <a data-toggle="modal" data-target="#myModal_photoprotect" title="Photo Protected" onClick="addstyle('<?php echo $matri_id;?>','<?php echo $member_data['matri_id']; ?>')">                                                                               <img src="<?php echo $photopassword_image; ?>" class="xxl-16 xs-16 xl-16 l-16 m-16 s-16 img-responsive success-story-img text-align-center" alt="<?php echo $comm_model->display_data_na($member_data['matri_id']); ?>" style="width:167px; height:180px !important;" title="<?php echo $comm_model->display_data_na($member_data['username']); ?>"></a>
																					<?php } else { ?>
                                                                                    <a href="<?php echo $base_url; ?>search/view-profile/<?php echo $member_data['matri_id']; ?>" target="_blank" class="border-shadow-img">
                                                                                        <img src="<?php echo $comm_model->member_photo_disp($member_data); ?>" class="xxl-16 xs-16 xl-16 l-16 m-16 s-16 img-responsive success-story-img text-align-center" title="<?php echo $comm_model->display_data_na($member_data['username']); ?>" alt="<?php echo $comm_model->display_data_na($member_data['matri_id']); ?>" style="width:167px; " >
																					</a>
																				<?php } ?>	
																				
                                                                                <div class="xxl-16 xl-16 m-16 l-16 s-16 xs-16">
                                                                                    <div class="row text-center">
                                                                                        <div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16">
                                                                                            <a href="<?php echo $base_url; ?>search/view-profile/<?php echo $member_data['matri_id']; ?>" target="_blank" class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 font padding-lr-zero text_slider"><?php echo ucwords($this->common_model->display_data_na($member_data['username'])); ?></a>
																							
																						</div>
                                                                                        <div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16 ne_font_12"><?php echo $comm_model->birthdate_disp($member_data['birthdate'], 0); ?>, <?php echo $comm_model->display_height($member_data['height']); ?>, <?php
                                                                                            if (isset($member_data['weight']) && $member_data['weight'] != '') {
                                                                                                $weight = $member_data['weight'] . ' Kg';
                                                                                                echo $weight;
																								} else {
                                                                                                echo $this->common_model->display_data_na('');
																							}
																						?> <?php echo $this->common_model->display_data_na($member_data['religion_name']); ?>, <?php echo $this->common_model->display_data_na($member_data['caste_name']); ?>
                                                                                        </div>
                                                                                        <div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16 ne_font_12">
                                                                                            <?php echo $this->common_model->display_data_na($member_data['country_name']); ?>, <?php echo $this->common_model->display_data_na($member_data['country_name']); ?>
																						</div>
                                                                                        <div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16 ne_font_12">
                                                                                            <a href="<?php echo $base_url; ?>search/view-profile/<?php echo $member_data['matri_id']; ?>" class="underline text_slider">View full Profile</a> <img src="<?php echo $base_url; ?>assets/front_end/images/icon/right-gray-arrow.png" class="right-gray-arrow" alt="view-arrow" />
																						</div>
																					</div>
																				</div>
																			</div>
																			<?php }
																		}?>
																</div>
															</div>																
														</div>
														<?php if($count_last_added_profile > 4){?>
                                                            <a data-slide="prev" href="#quote-carousel_2" class="left carousel-control" style="color:#F9A630;"><img class="img-circle" src="<?php echo $base_url; ?>assets/front_end/images/icon/arrow-lft-mh.gif" alt=""></a>
                                                            <a data-slide="next" href="#quote-carousel_2" class="right carousel-control" style="color:#F9A630;"><img class="img-circle" src="<?php echo $base_url; ?>assets/front_end/images/icon/arrow-rgt-mh.gif" alt=""></a>
														<?php } ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
							<?php } ?>             
							<?php
								$where_arra_login = array('is_deleted' => 'No', "status !='UNAPPROVED' and status !='Suspended'" ,'gender!=' => $curre_gender);
                                $last_updated_profile = $this->common_model->get_count_data_manual('search_register_view', $where_arra_login, 2, '*', 'last_login desc', 1, 8);
                                if (isset($last_updated_profile) && $last_updated_profile != '' && count($last_updated_profile) > 0) {
								?>
								<div class="xxl-16 xl-16 m-16 l-16 xs-16 s-16 compltele-profile margin-bottom-15 margin-top-10" style="padding-top:0px;padding-bottom:0px;">
									<div class="row" style="padding:4px;">									
										<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 bg-white" style="box-shadow: none;">
											<div class="row upgrade-heading">
												<h3 class="font-13 text-brown">Recently logged in members</h3>
											</div>
											<div class="clearfix"></div>
											<div class="row">
												<div class="xxl-16 xl-16 m-16 s-16 l-16 xs-16 ne_myhome_featured-pro margin-top-20px">
													<div class="carousel slide" data-ride="carousel" id="quote-carousel_3">
														<div class="carousel-inner" role="listbox">
															<div class="item active">
																<div class="owl-carousel padding-lr-zero">
																	<?php
                                                                        $i = 0;
                                                                        foreach ($last_updated_profile as $member_data) {
                                                                            
																			if ($i!=0 && $i%4==0)
																			{
																			?>
																		</div>
																	</div>
																	<div class="item">
																		<div class="owl-carousel padding-lr-zero">
                                                                            <?php		
																				//break;
																			}
                                                                            $i++;
																		?> 
																		<div class="col-lg-3 col-md-3 col-sm-6 col-lg-12 vendor-box">
																			<div class="vendor-image">
																				<?php
                                                                                    $path_photos = $this->common_model->path_photos;
																					
                                                                                    if (isset($member_data['photo1']) && $member_data['photo1'] != '' && $member_data['photo1_approve'] == 'APPROVED' && file_exists($path_photos . $member_data['photo1']) && $member_data['photo_view_status'] == 0) {
																					?>
																					<a data-toggle="modal" data-target="#myModal_photoprotect" title="Photo Protected" onClick="addstyle('<?php echo $matri_id;?>','<?php echo $member_data['matri_id']; ?>')">
																						<img src="<?php echo $photopassword_image; ?>" class="xxl-16 xs-16 xl-16 l-16 m-16 s-16 img-responsive success-story-img text-align-center tufelimgheight" alt="<?php echo $comm_model->display_data_na($member_data['matri_id']); ?>"  title="<?php echo $comm_model->display_data_na($member_data['username']); ?>">
																					</a>
                                                                                    <?php } else {							
																					?>
																					<a href="<?php echo $base_url; ?>search/view-profile/<?php echo $member_data['matri_id']; ?>">
																						<img src="<?php echo $comm_model->member_photo_disp($member_data); ?>" class="xxl-16 xs-16 xl-16 l-16 m-16 s-16 img-responsive success-story-img text-align-center" title="<?php echo $comm_model->display_data_na($member_data['username']); ?>" alt="<?php echo $comm_model->display_data_na($member_data['matri_id']); ?>"  >
																					</a>
																				<?php } ?>
																				
																				
																				<!--<div class="favourite-bg"><a href="#" class="heart-bg" title="Send Interest"><i class="fa fa-heart"></i></a></div>-->
																			</div>
																			
																			<div class="vendor-detail">
																				<div class="caption text-center">
																					<a href="<?php echo $base_url; ?>search/view-profile/<?php echo $member_data['matri_id']; ?>" target="_blank" class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 font padding-lr-zero text_slider"><?php echo ucwords($member_data['username']); ?></a>
																					<div class="xxl-16 xl-16 m-16 l-16 s-16 xs-16 margin-top-10px tufelfixheight">
																						<div class="row ne_font_12">
																							<p class="text-center"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $comm_model->birthdate_disp($member_data['birthdate'], 0); ?>, <?php echo $comm_model->display_height($member_data['height']); ?>, <?php
																								if (isset($member_data['weight']) && $member_data['weight'] != '') {
																									$weight = $member_data['weight'] . ' Kg';
																									echo $weight;
                                                                                                    } else {
																									echo $this->common_model->display_data_na('');
																								}
																							?></br><?php echo $this->common_model->display_data_na($member_data['religion_name']); ?>, <?php echo $this->common_model->display_data_na($member_data['caste_name']); ?></p>
																							<p class="ne_font_12 margin-top-5px ne-font-m text-center"><i class="fa fa-map"></i> <?php echo $this->common_model->display_data_na($member_data['city_name']); ?>, <?php echo $this->common_model->display_data_na($member_data['country_name']); ?></p>
																						</div>
																					</div>
																				</div>
																				<div class="clearfix"></div>
																				<a href="<?php echo $base_url; ?>search/view-profile/<?php echo $member_data['matri_id']; ?>" class="margin-top-10">
																					<div class="vendor-price-bg text-center" style="overflow:hidden;">
																						<span class="text-white text-center">
																							View full Profile <i class="fa fa-angle-double-right font-16"></i>
																						</span>
																					</div>
																				</a>
																			</div>
																		</div>
																	<?php } ?>              
																</div>
															</div>
														</div>
														<a data-slide="prev" href="#quote-carousel_3" class="left carousel-control" style="color:#F9A630;"><img class="img-circle" src="<?php echo $base_url; ?>assets/front_end/images/icon/arrow-lft-mh.gif" alt=""></a>
														<a data-slide="next" href="#quote-carousel_3" class="right carousel-control" style="color:#F9A630;"><img class="img-circle" src="<?php echo $base_url; ?>assets/front_end/images/icon/arrow-rgt-mh.gif" alt=""></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php
                                $recent_profile = $this->common_model->get_count_data_manual('search_register_view', $where_arra, 2, '*', 'id desc', 1, 4);
                                if (isset($recent_profile) && $recent_profile != '' && count($recent_profile) > 0) {
                                    $path_photos = $this->common_model->path_photos;
								?>
								
								<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 tab-content padding-15px border-radius-5px">
									<div>
										<div class="row">
											<div class="xxl-8 xl-8 l-8 m-16 s-16 xs-16 pull-left">
												<h4 class="text-grey font-13"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/down-arrow.gif" alt="" /> Recently Joined Members</h4>
											</div>
										</div>
										<?php foreach ($recent_profile as $member_data_val) {
										?>
										<div class="xs-16 xl-16 xxl-16 m-16 s-16 ne_result  padding-lr-zero margin-bottom-20px">
											<div class="row">
												<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne">
													<div class="" >
														<input type="checkbox" class="pull-left xxl-1 xl-1 l-1 m-1 s-16 xs-16" name="m_status" value="Unmarried">
														<h2 id="mobile_hover" class="margin-top-0px margin-bottom-0px xxl-5 xl-5 l-5 m-5 s-16 xs-16" style="padding:0px;">
															
															<a target="_blank" href="<?php echo $base_url; ?>search/view-profile/<?php echo $member_data_val['matri_id']; ?>" class="name-title xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero ne_font_weight_nrm">
																<?php echo ucwords($comm_model->display_data_na($member_data_val['username'])); ?>&nbsp;<span class="user-id">(<?php echo $comm_model->display_data_na($member_data_val['matri_id']); ?>)</span>
															</a>
														</h2>
														
													</div>
												</div>
											</div>
											<hr>
											<div class="xxl-4 xxl-margin-left-0 xl-4 xl-margin-left-0 xs-12 xs-margin-left-2 l-4 l-margin-left-0 m-4 m-margin-left-0">    
												<?php
													$path_photos = $this->common_model->path_photos;
													
													if (isset($member_data_val['photo1']) && $member_data_val['photo1'] != '' && $member_data_val['photo1_approve'] == 'APPROVED' && file_exists($path_photos . $member_data_val['photo1']) && $member_data_val['photo_password'] != '' && $member_data_val['photo_protect'] != 'No' && $member_data_val['photo_view_status'] == 0) {
													?>
													<a data-toggle="modal" data-target="#myModal_photoprotect" class="xxl-16 xl-16 l-16 s-16 m-16 xs-16  btn-block font-14 padding-lr-zero" title="Photo Protected" onClick="addstyle('<?php echo $matri_id;?>','<?php echo $member_data_val['matri_id']; ?>')">
														<img src="<?php echo $photopassword_image; ?>" class="cursor img-thumbnail text-center" style=" height: 164px!important; width: 164px!important;">
													</a>
													
													<?php } else { ?>
													<a target="_blank" href="<?php echo $base_url; ?>search/view-profile/<?php echo $member_data_val['matri_id']; ?>">
														<img src="<?php echo $this->common_model->member_photo_disp($member_data_val); ?>" class="img-responsive ne_result_img myimg" title="<?php echo $this->common_model->display_data_na($member_data_val['username']); ?>" alt="<?php echo $this->common_model->display_data_na($member_data_val['matri_id']); ?>" style=" height: 164px!important; width: 164px!important;">
													</a>
												<?php } ?>
												
												<p class="small text-center margin-top-5"><a target="_blank" href="<?php echo $base_url; ?>search/view-profile/<?php echo $member_data_val['matri_id']; ?>" class="underline">View Full Details</a></p>
												<ul class="xxl-16 xl-16 m-16 xs-16 l-16 s-16 padding-lr-zero margin-top-10px margin-bottom-10px neResultBottomIcons"></ul>
											</div> 
											
											<div class="xxl-12 xl-12 l-12 m-12 s-16 xs-16 padding-lr-zero-1199 padding-lr-zero-999 padding-lr-zero-768">
												<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-10px ne-bdr-btm-lgt-grey ne">
													<div class="row">
														<div class="xxl-10 xl-10 l-10 m-16 s-16 xs-16">
															<div class="row">
																<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne_font_12 margin-bottom-6px">
																	<div class="row">
																		<div class="xxl-6 xl-6 l-6 m-6 s-6 ne_mrg_ri8_10">
																			<div class="row label-title">
																				Age / Height
																			</div>
																		</div>
																		<div class="xxl-9 xl-9 l-9 m-9 s-9 ne-word-wrap">
																			<div class="row">
																				: <?php echo $comm_model->birthdate_disp($member_data_val['birthdate'], 0); ?>, <?php echo $comm_model->display_height($member_data_val['height']); ?>                                                                       		
																			</div>
																		</div>
																	</div>
																</div>
																
																<div class="clearfix"></div>
																<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne_font_12 margin-bottom-6px">
																	<div class="row">
																		<div class="xxl-6 xl-6 l-6 m-6 s-6 ne_mrg_ri8_10">
																			<div class="row label-title">
																				Catholic Community
																			</div>
																		</div>
																		<div class="xxl-9 xl-9 l-9 m-9 s-9 ne-word-wrap">
																			<div class="row">
																				: <?php echo $comm_model->display_data_na($member_data_val['religion_name']); ?>                                                                        		
																			</div>
																		</div>
																	</div>
																</div>
																<div class="clearfix"></div>
																<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne_font_12 margin-bottom-6px">
																	<div class="row">
																		<div class="xxl-6 xl-6 l-6 m-6 s-6 ne_mrg_ri8_10">
																			<div class="row label-title">
																				Diocese
																			</div>
																		</div>
																		<div class="xxl-9 xl-9 l-9 m-9 s-9 ne-word-wrap">
																			<div class="row">
																				: <?php echo $comm_model->display_data_na($member_data_val['caste_name']); ?>                                                                        		
																			</div>
																		</div>
																	</div>
																</div>
																<div class="clearfix"></div>
																<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne_font_12 margin-bottom-6px">
																	<div class="row">
																		<div class="xxl-6 xl-6 l-6 m-6 s-6 ne_mrg_ri8_10">
																			<div class="row label-title">
																				Mother Tongue
																			</div>
																		</div>
																		<div class="xxl-9 xl-9 l-9 m-9 s-9 ne-word-wrap">
																			<div class="row">
																				: <?php echo $comm_model->display_data_na($member_data_val['mtongue_name']); ?>                                                                        		
																			</div>
																		</div>
																	</div>
																</div>
																<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne_font_12 margin-bottom-6px">
																	<div class="row">
																		<div class="xxl-6 xl-6 l-6 m-6 s-6 ne_mrg_ri8_10">
																			<div class="row label-title">
																				Education
																			</div>
																		</div>
																		<div class="xxl-9 xl-9 l-9 m-9 s-9 ne-word-wrap">
																			<div class="row">
																				: <?php echo $comm_model->valueFromId('education_detail', $member_data_val['education_detail'], 'education_name'); ?>                                                                        		
																			</div>
																		</div>
																	</div>
																</div>
																<div class="clearfix"></div>
																<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne_font_12 margin-bottom-6px">
																	<div class="row">
																		<div class="xxl-6 xl-6 l-6 m-6 s-6 ne_mrg_ri8_10">
																			<div class="row label-title">
																				Location
																			</div>
																		</div>
																		<div class="xxl-9 xl-9 l-9 m-9 s-9 ne-word-wrap">
																			<div class="row">
																				: <?php echo $comm_model->display_data_na($member_data_val['city_name']) . ', ' . $comm_model->display_data_na($member_data_val['state_name']) . ', ' . $comm_model->display_data_na($member_data_val['country_name']); ?>                                                                        		
																			</div>
																		</div>
																	</div>
																</div>
																<div class="clearfix"></div>
																<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne_font_12 margin-bottom-6px">
																	<div class="row">
																		<div class="xxl-6 xl-6 l-6 m-6 s-6 ne_mrg_ri8_10">
																			<div class="row label-title">
																				Occupation
																			</div>
																		</div>
																		<div class="xxl-9 xl-9 l-9 m-9 s-9 ne-word-wrap">
																			<div class="row">
																				: <?php echo $comm_model->display_data_na($member_data_val['occupation_name']); ?>                                                                        		
																			</div>
																		</div>
																	</div>
																</div>
															</div>       
														</div>
														
														<?php include('page_part/common_like_dislike.php'); ?>
													</div>
												</div>
												<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-5">
													<div class="row">
														<p class="small"><?php
															$profile_text = $comm_model->display_data_na($member_data_val['profile_text']);
															if (strlen($profile_text) > 160) {
																echo substr($profile_text, 0, 160) . '...';
																} else {
																echo $profile_text;
															}
														?> 
														<a target="_blank" href="<?php echo $base_url; ?>search/view-profile/<?php echo $member_data_val['matri_id']; ?>" style="color:#d8497f;font-weight:bold;">Read More</a> <i class="fa fa-caret-right" style="font-size: 16px;
														position: relative;
														top: 2px;"></i></p>
													</div>
												</div>
											</div>
											<div class="clearfix"></div>
											<hr style="margin:5px 0px; !important;">
											<div style="text-align: center">
												<a class="underline hook1 in" data-toggle="collapse" href=".<?php echo $member_data_val['matri_id']; ?>" aria-expanded="false">Action <i class="fa fa-caret-down"></i></a>
											</div>
											
											<?php include('page_part/common_front_button.php'); ?>
											
										</div>
										<?php } ?>
									</div>
									<div class="clearfix"></div>
								</div>	
								
								<?php
									} else {
								?>
								<div role="alert" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 alert margin-top-20" style="background:#fcf8e3;border:1px solid #faebcc; color: #8a6d3b;">
									<p class="margin-top-10px margin-bottom-10px">
										No Data found to display.
									</p>
								</div>
							<?php } ?>
						</div>
						<div class="clearfix"></div>
                        </div>
					</div>
				</div>
				<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-4 hidden-lg hidden-md">
					<?php $this->load->view('front_end/mobile_my_profile_sidebar'); ?>
				</div>
			</div>
			
            <?php include_once('page_part/common_front_button_ajaxcode.php'); ?>
			
		</div>
	</div>
</div>

<div id="myModal_new" class="modal_new">
    <span class="close cursor padding-right-10" onclick="closeModal()" style="position:relative;color:#fff !important;opacity:2 !important;">&times;</span>
    <div class="modal-content_new margin-bottom-20px">
	    <div id="slider"></div>
	</div>
	<div class="clearfix"></div>
	<center style="margin-bottom:20px !important;">
		<span class="prev_p" onclick="plusSlides(-1)">&#10094;</span>
		<span class="next_n" onclick="plusSlides(1)">&#10095;</span>
	</center>
</div>
<div class="clearfix"></div>

<div class="margin-top-30"></div>

<?php
	if ($mobile_num != '' && $mobile_num_status == 'No')
	{
		$this->common_model->js_extra_code_fr .= " $('#myModal_verify_mobile_btn').trigger('click'); ";
	}
	$this->common_model->js_extra_code_fr .= "
	load_choosen_code();
	$('.todo-percentage').percentcircle({});
	$('.button-wrap').on('click', function(){
	$(this).toggleClass('button-active');
	});
	$(document).ready(function()
	{
	$(" . '"' . "[data-toggle='tooltip']" . '"' . ").tooltip();
	$('#test').BootSideMenu({
	side: 'left',
	pushBody:false,
	width: '250px'
	}); ";
	
	$this->common_model->js_extra_code_fr .= "
	
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
	
	function fields(field)
	{
	var value = $('#'+field).val();
	if(value=='')
	{
	alert('Please Add/Select Value');
	}
	else
	{
	var val = value;
	show_comm_mask();
	}
	var hash_tocken_id = $('#hash_tocken_id').val();
	var base_url = $('#base_url').val();
	var url = base_url+'my-dashboard/update-percentage-slider-field';
	$.ajax({
	url: url,
	type: 'POST',
	data:{'csrf_new_matrimonial':hash_tocken_id,'val':val,'field':field},
	dataType:'json',
	success: function(data) 
	{ 	
	if(data.status == 'success')
	{
	$('#my_dashboard_slider_ajax').html(data.my_dashboard_data);
	update_tocken($('#hash_tocken_id_temp').val());
	setTimeout(function() {
	$('#update_field_success').fadeOut('fast');
	}, 5000);
	$('#progress_bar').html(data.progress);
	$('#hash_tocken_id_temp').remove();
	}
	$('#hash_tocken_id').val(data.token);
	hide_comm_mask();
	}
	});
	return false;
	}
	
	var win = null;
	function newWindow(mypage,myname,w,h,features) {
	var winl = (screen.width-w)/2;
	var wint = (screen.height-h)/2;
	if (winl < 0) winl = 0;
	if (wint < 0) wint = 0;
	var settings = 'height=' + h + ',';
	settings += 'width=' + w + ',';
	settings += 'top=' + wint + ',';
	settings += 'left=' + winl + ',';
	settings += features;
	
	win = window.open(mypage,myname,settings);
	win.window.focus();
	}
	
	";
?>