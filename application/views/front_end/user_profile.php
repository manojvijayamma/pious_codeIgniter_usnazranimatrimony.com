
<?php
	$member_id = $this->common_front_model->get_session_data('matri_id');
	$plan_status = $this->common_front_model->get_session_data('plan_status');
	$result_member_matri_id = $user_data['matri_id'];
	
	$no_remark= '<span class="no_remark"></span>';
	$yes_remark= '<span class="yes_remark"></span>';
	
	$gender = $this->common_front_model->get_session_data('gender');
	if(isset($gender) && $gender == 'Male'){
		$photopassword_image = $base_url.'assets/images/photopassword_female.png';
		}else{
		$photopassword_image = $base_url.'assets/images/photopassword_male.png';
	}
?>
<style>
.mobile-pro{
	display: table;
    margin: auto;
    width: 100%;
}
</style>
<div class="">
	<div class="container padding-lr-zero-xs">
		<div class="margin-top-20">
			<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-xs hidden-lg hidden-md">
				<div class="">
					<img src="<?php echo $base_url; ?>assets/front_end/images/icon/advrt.jpg" class="full-width img-thumbnail" alt=""/> 
				</div>
			</div>
			<div class="clearfix"></div>
			<?php 
				$photos = array();
				$photo_upload_count = $this->common_model->photo_upload_count;
				if($photo_upload_count =='' || $photo_upload_count > 0  || $photo_upload_count < 8)
				{
					$photo_upload_count = 8;
				}
				for($i_photo = 1;$i_photo<=$photo_upload_count;$i_photo++)
				{
					$photos[] = array('photo'=>$user_data['photo'.$i_photo],'status'=>$user_data['photo'.$i_photo.'_approve']);
				}
				$path_photos = $this->common_model->path_photos;
				$path_cover_photo = $this->common_model->path_cover_photo;
				if(isset($user_data['cover_photo']) && $user_data['cover_photo']!='' && $user_data['cover_photo_approve']=='APPROVED' && file_exists($path_cover_photo.$user_data['cover_photo']))
				{
					$cover_photo_final = $base_url.$path_cover_photo.$user_data['cover_photo'];
					}else{ 
					$cover_photo_final = $base_url.$path_cover_photo."cover_photo.png";
				}
			?>
			<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 hidden-sm hidden-xs">
				<div class="fb-profile-block"> 
					<div class="fb-profile-block-thumb"><img src="<?php echo $cover_photo_final;?>" alt="" class="fb-img"></div>
					<div class="profile-img">
						<?php
							if(isset($user_data['photo1']) && $user_data['photo1'] !='' && isset($user_data['photo1_approve']) && $user_data['photo1_approve'] =='APPROVED' && file_exists($path_photos.$user_data['photo1']) && isset($user_data['photo_view_status']) &&  $user_data['photo_view_status'] ==0 && isset($photo_view_count) && $photo_view_count == 0){
							?>
                            <a data-toggle="modal" data-target="#myModal_photoprotect" class="xxl-16 xl-16 l-16 s-16 m-16 xs-16  btn-block font-14 padding-lr-zero" title="Photo Protected" onClick="addstyle('<?php echo $member_id;?>','<?php echo $user_data['matri_id']; ?>')">
								<img src="<?php echo $photopassword_image; ?>" class="cursor img-thumbnail text-center" style=" max-height: 158px; max-width: 158px;min-height: 158px; min-width: 158px;">
							</a>
							<?php 
								}else{
								if(isset($user_data['gender']) && $user_data['gender'] == 'Male'){
									$defult_photo = $base_url.'assets/front_end/img/default-photo/male.gif';
									}else{
									$defult_photo = $base_url.'assets/front_end/img/default-photo/female.gif';
								}
								if(isset($user_data['photo1']) && $user_data['photo1'] !='' && $user_data['photo1_approve'] =='APPROVED' && file_exists($path_photos.$user_data['photo1']) && ($user_data['photo_view_status'] == 1 || ($user_data['photo_view_status'] == 2 && $plan_status == 'Paid') || (isset($user_data['photo_view_status']) &&  $user_data['photo_view_status'] ==0 && isset($photo_view_count) && $photo_view_count > 0)))
								{ ?>
								<a href="javascript:;"><img src="<?php echo $base_url; ?><?php echo $path_photos;?><?php echo $user_data['photo1'];?>" onclick="openModal();currentSlide(1)" class="cursor img-thumbnail text-center" alt="team-pic2"></a>
								
								<a class="profile-edit text-center underline font-12 cursor"><i class="glyphicon glyphicon-pencil"></i></a>	
								
								<a class="text-center underline font-12 cursor" onclick="openModal();currentSlide(1)">View Full Photo</a>
								<?php }
								else
								{ ?>
								<a href="javascript:;"><img src="<?php echo $defult_photo;?>" class="cursor img-thumbnail text-center" alt="team-pic2"></a>
								<?php   } 
							}	?>
                            
                            <div id="myModal_new" class="modal_new">
                                <span class="close cursor padding-right-10" onclick="closeModal()" style="position:relative;color:#fff !important;opacity:2 !important;">&times;</span>
                                <div class="modal-content_new margin-bottom-20px">
                                    <?php $path_photos_big = $this->common_model->path_photos_big;
										foreach($photos as $photo_val) 
										{	
											if(isset($photo_val['photo']) && $photo_val['photo'] !='' && file_exists($path_photos.$photo_val['photo']) && $photo_val['status'] =='APPROVED')
											{ ?>
                                            <div class="mySlides">
                                                
                                                <img src="<?php echo $base_url; ?><?php echo $path_photos_big;?><?php echo $photo_val['photo'];?>" class="slide-img img-responsive padding-top-10" alt="" style="box-shadow: 0 5px 11px 0 rgba(0,0,0,.38), 0 4px 15px 0 rgba(0,0,0,.55);padding: 0px;width: 400px !important;height: 500px !important;max-height:500px !important;" />
											</div>
											<?php }
										} ?>
										<div id="slider"></div>
								</div>
                                <div class="clearfix"></div>
                                <center style="margin-bottom:20px !important;">
                                    <span class="prev_p" onclick="plusSlides(-1)">&#10094;</span>
                                    <span class="next_n" onclick="plusSlides(1)">&#10095;</span>
								</center>
							</div>
                            <div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
					
					<div class="profile-fb" style="background:linear-gradient(rgba(0,0,0,0.2) 11%, rgba(0,0,0, .93));padding:5px 5px 10px 20px;border-radius:3px;width:84.4%;">
						<div class="xxl-8 xl-8 l-8 m-16 s-16 xs-16">
							<div class="row">
								<h3 class="margin-bottom-0px margin-top-0px fb-shadow"><?php if(isset($user_data['username']) && $user_data['username'] !=''){ echo ucwords($user_data['username']);}?><span class="matri_id fb-shadow">(<?php if(isset($user_data['matri_id']) && $user_data['matri_id'] !=''){ echo $user_data['matri_id'];}?>)</span></h3>
								<h5 class="text-grey margin-top-5px fb-shadow"><em>Profile Created by <?php if(isset($user_data['profileby']) && $user_data['profileby'] !=''){ echo $user_data['profileby'];}?> 
									
                                    <h5 class="text-grey margin-top-0px margin-bottom-0px fb-shadow"><i class="fa fa-lock"></i> Last Login: <?php if(isset($user_data['last_login']) && $user_data['last_login'] !=''){ echo $this->common_model->displayDate($user_data['last_login']);}else{echo "Never";}?></h5>
									<br/>
									
									<div class="like_button xxl-3 xl-3 l-3 m-16 s-16 xs-16">
										<?php 
											$likes_array = array('like_status'=>'Yes','other_id'=>$user_data['matri_id']);
											$total_likes = $this->common_model->get_count_data_manual('member_likes',$likes_array,0,'');
										?>
										<a href="javascript:;" class="">
											<i class="fa fa-thumbs-up" style="font-size:20px; color:white;"></i> 
											<span id="total_likes" class="count badge badge-info" style="font-size:15px;"><?php echo $total_likes;?>
											</span>
										</a>
									</div>
									<div class="like_button xxl-3 xl-3 l-3 m-16 s-16 xs-16">
										<?php 
											$unlikes_array = array('like_status'=>'No','other_id'=>$user_data['matri_id']);
											$total_unlikes = $this->common_model->get_count_data_manual('member_likes',$unlikes_array,0,'');
										?>
										<a href="javascript:;" class="">
											<i class="fa fa-thumbs-down" style="font-size:20px; color:white;"></i>
											<span id="total_unlikes"  class="count badge badge-info" style="font-size:15px;"><?php echo $total_unlikes;?></span>
										</a>
									</div>
								</div>
								</div>
								<div class="xxl-8 xl-8 l-8 m-16 s-16 xs-16" style="text-align:right;">
									<?php 
										$where_array = array('my_id'=>$member_id,'other_id'=>$user_data['matri_id']);
										$member_likes_data = $this->common_model->get_count_data_manual('member_likes',$where_array,1,'');
										$member_likes__count = $this->common_model->get_count_data_manual('member_likes',$where_array,0,'');
										$yes_style = 'display:inline-block;';
										$no_style = 'display:inline-block;';
										$image_yes_style = 'display:none';
										$image_no_style = 'display:none;';
										if($member_likes__count > 0 && $member_likes_data != '')
										{
											if($member_likes_data['like_status']=='Yes')
											{
												$yes_style = 'display:none;';
												$image_yes_style = 'display:inline-block;';
											}
											elseif($member_likes_data['like_status']=='No')
											{
												$no_style = 'display:none;';
												$image_no_style = 'display:inline-block;';
											}
										}
									?>
									<a id="Yes_id" style="<?php echo $yes_style;?>" href="javascript:;" onclick="member_like('Yes','<?php echo $user_data['matri_id'];?>');" class="btn-sm btn no-shadow" title="Yes" style="padding:5px 10px;"><i class="fa fa-thumbs-up ne_mrg_ri8_10"></i>Like</a>
									
									<a id="Image_Yes" style="<?php echo $image_yes_style;?>">
										<img alt="You have like this member." title="You have like this member." src='<?php echo $base_url; ?>assets/images/like.png' />
									</a>
									<a id="No_id" style="<?php echo $no_style;?>" href="javascript:;" onclick="member_like('No','<?php echo $user_data['matri_id']; ?>');" class="btn-sm  btn no-shadow" title="No" style="padding:5px 10px;"><i class="fa fa-thumbs-down ne_mrg_ri8_10"></i>Unlike</a>
									<a id="Image_No" style="<?php echo $image_no_style;?>">
										<img alt="You didn't like this member." title="You didn't like this member." src='<?php echo $base_url; ?>assets/images/dislike.png' />
									</a>
								</div>
							</div>
							
							<div class="fb-profile-block-menu">
								<div class="block-menu">
									<ul>
										<li>
											<a href="<?php echo $base_url; ?>premium-member" style="border:0px;background:none;margin-right:10px;padding:0px;line-height:40px;"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/myhome-king.png" class="margin-right-5" alt="myhome-king" title="Upgrade Membership"></a>
										</li>
										<?php
											if(isset($user_data['email']) && $user_data['email'] != ''){
												$email = $user_data['email'];
												}else{
												$email = '';
											}
										?>
										<?php if(isset($user_data['video_url']) && $user_data['video_url'] != '' && $user_data['video_approval'] == 'APPROVED'){?>
											<li>
												<a data-toggle="modal" data-target="#myModal_ViewVideo" class="btn-more" onClick="get_ViewVideo('<?php echo $user_data['matri_id'];?>')" ><span class="write_online_txt"><i class='fa fa-video ne_mrg_ri8_10'></i>View Video</span></a>
											</li>
										<?php } ?>
										<li>
											<a data-toggle="modal" data-target="#myModal_ViewContactDetails" class="btn-more" onClick="get_ViewContactDetails('<?php echo $user_data['matri_id'];?>')" ><span class="write_online_txt"><i class='fa fa-phone ne_mrg_ri8_10'></i>View Contact Detail</span></a>
										</li>
										<li>
											<a data-toggle="modal" data-target="#myModal_sms" class="btn-more text-center" onClick="get_member_matri_id('<?php echo $user_data['matri_id'];?>')"><span class="write_online_txt"><span class="sticker_send-sms"></span>Send Message</span></a>
										</li>
										<li>
											<a data-toggle="modal" data-target="#myModal_sendinterest" class="btn-more text-center"><span class="write_online_txt" onClick="express_interest('<?php echo $user_data['matri_id'];?>')"><span class="sticker_post-wall"></span> Send Interest</span></a>
										</li>
										<li>
										<?php 
                                        $where_arra=array('to_id'=>$result_member_matri_id,'from_id'=>$member_id);
                                        $data = $this->common_model->get_count_data_manual('shortlist',$where_arra,1,'id');
                                        $is_short_list = 0;
                                        if($data > 0){
                                            $is_short_list = 1;
                                        }?>
										<div id ="add_shortlist_<?php echo $user_data['matri_id'];?>" style="display:<?php if($is_short_list != 0){ echo 'none';} ?>">
                                        	<a data-toggle="modal" data-target="#myModal_shortlist" class="btn-more text-center" onClick="add_shortlist_matri_id('<?php echo $user_data['matri_id'];?>')"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/filter.png" class="" alt=""><span class="write_online_txt">Shortlist</span></a>
											</div>
											<div id ="remove_shortlist_<?php echo $user_data['matri_id'];?>" style="display:<?php if($is_short_list == 0){ echo 'none';} ?>;">
												
												<a data-toggle="modal" data-target="#myModal_shortlisted" class="btn-more text-center" onClick="remove_shortlist_matri_id('<?php echo $user_data['matri_id'];?>')">
												<img src="<?php echo $base_url; ?>assets/front_end/images/icon/filter.png" class="" alt=""><span class="write_online_txt"> Shortlisted</span></a>
											</div>
										</li>
										<li>
											<?php 
											$where_arra=array('block_to'=>$result_member_matri_id,'block_by'=>$member_id);
											$data = $this->common_model->get_count_data_manual('block_profile',$where_arra,1,'id');
											$is_block_list = 0;
											if($data > 0){
												$is_block_list = 1;
											}?>
											<div id ="add_blocklist_<?php echo $user_data['matri_id'];?>" style="display:<?php if($is_block_list != 0){ echo 'none';} ?>">
												<a data-toggle="modal" data-target="#myModal_block" class="btn-more text-center" onClick="add_block_list_matri_id('<?php echo $user_data['matri_id'];?>')" ><span class="write_online_txt"><span class="sticker_ban"></span> Block</span></a>
											</div>
											
											<div id ="remove_blocklist_<?php echo $user_data['matri_id'];?>" style="display:<?php if($is_block_list == 0){ echo 'none';} ?>;">
												<a data-toggle="modal" data-target="#myModal_unblock" class="btn-more text-center"  onClick="remove_block_list_id('<?php echo $user_data['matri_id'];?>')" ><span class="write_online_txt"><span class="sticker_ban"></span> UnBlock</span></a>
											</div>
											<input type="hidden" id="is_member_block_<?php echo $user_data['matri_id'];?>" name="is_member_block_<?php echo $user_data['matri_id'];?>" value="<?php if($is_block_list != 0){ echo 'is_member_block_'.$user_data['matri_id']; } ?>" />
										</li>
									</ul>
								</div>
								<?php include_once('page_part/common_front_button_ajaxcode.php'); ?>
							</div>
						</div>
					</div>
					
					<div class="clearfix"></div>
					
					<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 margin-top-10 padding-lr-zero-xs" style="padding-right:0px;">
						<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-5" style="padding-top:15px;">
							<?php $this->load->view('front_end/my_profile_sidebar'); ?>
						</div>
						
						<div class="xxl-12 xl-12 l-11 m-16 s-16 xs-16 padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 padding-lr-zero-xs">
							<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 bg-border hidden-lg hidden-md padding-0-5-xs" style="padding-top:0px;padding-bottom:0px;">
							<div class="xxl-4 xl-4 l-4 m-8 s-16 xs-16">
							
							<?php
						if(isset($user_data['photo1']) && $user_data['photo1'] !='' && isset($user_data['photo1_approve']) && $user_data['photo1_approve'] =='APPROVED' && file_exists($path_photos.$user_data['photo1']) && isset($user_data['photo_view_status']) &&  $user_data['photo_view_status'] ==0 && isset($photo_view_count) && $photo_view_count == 0){
					?>
                            
                            <a data-toggle="modal" data-target="#myModal_photoprotect" class="xxl-16 xl-16 l-16 s-16 m-16 xs-16  btn-block font-14 padding-lr-zero" title="Photo Protected" onClick="addstyle('<?php echo $member_id;?>','<?php echo $user_data['matri_id']; ?>')">
                <img src="<?php echo $photopassword_image; ?>" class="cursor img-thumbnail mobile-pro text-center">
            </a>
					<?php 
						}else{
							if(isset($user_data['gender']) && $user_data['gender'] == 'Male'){
								$defult_photo = $base_url.'assets/front_end/img/default-photo/male.gif';
							}else{
								$defult_photo = $base_url.'assets/front_end/img/default-photo/female.gif';
							}
							if(isset($user_data['photo1']) && $user_data['photo1'] !='' && $user_data['photo1_approve'] =='APPROVED' && file_exists($path_photos.$user_data['photo1']) && ($user_data['photo_view_status'] == 1 || ($user_data['photo_view_status'] == 2 && $plan_status == 'Paid') || (isset($user_data['photo_view_status']) &&  $user_data['photo_view_status'] ==0 && isset($photo_view_count) && $photo_view_count > 0)))
							{ ?>
								<a href="javascript:;"><img src="<?php echo $base_url; ?><?php echo $path_photos;?><?php echo $user_data['photo1'];?>" onclick="openModal();currentSlide(1)" class="cursor img-thumbnail mobile-pro text-center" alt="team-pic2"></a>
								
								<a class="profile-edit text-center underline font-12 cursor"><i class="glyphicon glyphicon-pencil"></i></a>	
								
								<a class="text-center underline font-12 cursor" onclick="openModal();currentSlide(1)">View Full Photo</a>
								<?php }
							else
							{ ?>
								<a href="javascript:;"><img src="<?php echo $defult_photo;?>" class="cursor img-thumbnail mobile-pro text-center" alt="team-pic2"></a>
					<?php   } 
						}	?>
						</div>
								<div class="xxl-4 xl-4 l-4 m-8 s-16 xs-16">
									<h3 class="margin-bottom-0px"><?php if(isset($user_data['username']) && $user_data['username'] !=''){ echo ucwords($user_data['username']);}?><span class="matri_id">(<?php if(isset($user_data['matri_id']) && $user_data['matri_id'] !=''){ echo $user_data['matri_id'];}?>)</span></h3>
									<h5 class="text-grey margin-top-5px"><em>Profile Created by Self <?php if(isset($user_data['profileby']) && $user_data['profileby'] !=''){ echo $user_data['profileby'];}?> 
										<h5 class="text-grey margin-top-0px"><i class="fa fa-lock"></i> Last Login: <?php if(isset($user_data['last_login']) && $user_data['last_login'] !=''){ echo $this->common_model->displayDate($user_data['last_login']);}else{echo "Never";}?></h5>
										
										<div class="like_button xxl-3 xl-3 l-3 m-8 s-8 xs-8">
											<?php 
												$likes_array = array('like_status'=>'Yes','other_id'=>$user_data['matri_id']);
												$total_likes = $this->common_model->get_count_data_manual('member_likes',$likes_array,0,'');
											?>
											<a href="javascript:;" class="">
												<i class="fa fa-thumbs-up" style="font-size:20px;"></i> 
												<span id="total_likes_mobile" class="count badge badge-info" style="font-size:15px;"><?php echo $total_likes;?>
												</span>
											</a>
										</div>
										<div class="like_button xxl-3 xl-3 l-3 m-8 s-8 xs-8">
											<?php 
												$unlikes_array = array('like_status'=>'No','other_id'=>$user_data['matri_id']);
												$total_unlikes = $this->common_model->get_count_data_manual('member_likes',$unlikes_array,0,'');
											?>
											<a href="javascript:;" class="">
												<i class="fa fa-thumbs-down" style="font-size:20px;"></i>
												<span id="total_unlikes_mobile"  class="count badge badge-info" style="font-size:15px;"><?php echo $total_unlikes;?></span>
											</a>
										</div>
									</div>
									<hr style="border-top:1px solid:#eee;">
									<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
										<h3 class="margin-top-20px margin-bottom-0px">Connect with her?</h3>
										<?php 
											$where_array = array('my_id'=>$member_id,'other_id'=>$user_data['matri_id']);
											$member_likes_data = $this->common_model->get_count_data_manual('member_likes',$where_array,1,'');
											$member_likes__count = $this->common_model->get_count_data_manual('member_likes',$where_array,0,'');
											$yes_style = 'display:inline-block;';
											$no_style = 'display:inline-block;';
											$image_yes_style = 'display:none';
											$image_no_style = 'display:none;';
											//$may_be_style = 'display:inline-block;';
											//$image_may_be_style = 'display:none;';
											
											if($member_likes__count > 0 && $member_likes_data != ''){
												if($member_likes_data['like_status']=='Yes'){
													$yes_style = 'display:none;';
													$image_yes_style = 'display:inline-block;';
												}
												elseif($member_likes_data['like_status']=='No'){
													$no_style = 'display:none;';
													$image_no_style = 'display:inline-block;';
												}
											}
										?>
										
										<a id="Yes_id_mobile" style="<?php echo $yes_style;?>" href="javascript:;" onclick="member_like('Yes','<?php echo $user_data['matri_id'];?>','mobile');" class="btn-sm btn no-shadow m-7 s-7 xs-7" title="Yes"><i class="fa fa-thumbs-up ne_mrg_ri8_10"></i>Like</a>
										
										<a id="Image_Yes_mobile" style="<?php echo $image_yes_style;?>">
											<img style="background:gray;" alt="You have like this member." title="You have like this member." src='<?php echo $base_url; ?>assets/images/like.png' />
										</a>
										
										<a  id="No_id_mobile" style="<?php echo $no_style;?>" href="javascript:;" onclick="member_like('No','<?php echo $user_data['matri_id']; ?>','mobile');" class="btn-sm btn no-shadow m-7 s-7 xs-7" title="No"><i class="fa fa-thumbs-down ne_mrg_ri8_10"></i>Unlike</a>
										<a id="Image_No_mobile" style="<?php echo $image_no_style;?>">
											<img style="background:gray;" alt="You didn't like this member." title="You didn't like this member." src='<?php echo $base_url; ?>assets/images/dislike.png' />
										</a>
									</div>
									<div class="clearfix"></div>
									<div class="row margin-top-10px" style="padding:4px;">
										<div class="upgrade-membership">
											<a data-toggle="modal" data-target="#mob_myModal_ViewContactDetails" class="btn-more text-center new-btn-mobile" onClick="get_ViewContactDetails_mobile('<?php echo $user_data['matri_id'];?>')" >
												<span class="write_online_txt"><i class='fa fa-phone ne_mrg_ri8_10'></i>View Contact</span>
											</a>
											<a data-toggle="modal" data-target="#mob_myModal_sms" class="btn-more text-center new-btn-mobile" onClick="get_member_matri_id_mobile('<?php echo $user_data['matri_id'];?>')">
												<span class="write_online_txt"><span class="sticker_send-sms"></span>Send Message</span>
											</a>
											<a data-toggle="modal" data-target="#mob_myModal_sendinterest" class="btn-more text-center new-btn-mobile">
												<span class="write_online_txt" onClick="express_interest_mobile('<?php echo $user_data['matri_id'];?>')"><span class="sticker_post-wall"></span> Send Interest</span>
											</a>
											<?php 
												$where_arra1=array('to_id'=>$result_member_matri_id,'from_id'=>$member_id);
												$data = $this->common_model->get_count_data_manual('shortlist',$where_arra1,1,'id');
												$is_short_list1 = 0;
												if($data > 0)
												{
													$is_short_list1 = 1;
												}
											?>
											
											<div id ="add_shortlist_mobile_<?php echo $user_data['matri_id'];?>" style="display:<?php if($is_short_list1 != 0){ echo 'none';} ?>">
												
												<a data-toggle="modal" data-target="#mob_myModal_shortlist" class="btn-more text-center new-btn-mobile" onClick="add_shortlist_matri_id_mobile_('<?php echo $user_data['matri_id'];?>')">
													<img src="<?php echo $base_url; ?>assets/front_end/images/icon/filter.png" class="" alt=""><span class="write_online_txt">
													Shortlist</span></a>
											</div>
											<div id ="remove_shortlist_mobile_<?php echo $user_data['matri_id'];?>" style="display:<?php if($is_short_list1 == 0){ echo 'none';} ?>;">
												
												<a data-toggle="modal" data-target="#mob_myModal_shortlisted" class="btn-more new-btn-mobile text-center" onClick="remove_shortlist_matri_id_mobile('<?php echo $user_data['matri_id'];?>')">
												<img src="<?php echo $base_url; ?>assets/front_end/images/icon/filter.png" class="" alt=""><span class="write_online_txt"> Shortlisted</span></a>
											</div>
											
											<?php 
												$where_arra2=array('block_to'=>$result_member_matri_id,'block_by'=>$member_id);
												$data = $this->common_model->get_count_data_manual('block_profile',$where_arra2,1,'id');
												$is_block_list = 0;
												if($data > 0)
												{
													$is_block_list = 1;
												}
											?>
											<div id ="add_blocklist_mobile_<?php echo $user_data['matri_id'];?>" style="display:<?php if($is_block_list != 0){ echo 'none';} ?>">
												<a data-toggle="modal" data-target="#mob_myModal_block" class="btn-more text-center new-btn-mobile" onClick="add_block_list_matri_id_mobile('<?php echo $user_data['matri_id'];?>')" >
													<span class="write_online_txt"><span class="sticker_ban"></span> Block</span>
												</a>
											</div>
											
											<div id ="remove_blocklist_mobile_<?php echo $user_data['matri_id'];?>" style="display:<?php if($is_block_list == 0){ echo 'none';} ?>;">
												<a data-toggle="modal" data-target="#mob_myModal_unblock" class="btn-more text-center new-btn-mobile"  onClick="remove_block_list_id_mobile('<?php echo $user_data['matri_id'];?>')" ><span class="write_online_txt"><span class="sticker_ban"></span> UnBlock</span></a>
											</div>
											<input type="hidden" id="is_member_block_<?php echo $user_data['matri_id'];?>" name="is_member_block_<?php echo $user_data['matri_id'];?>" value="<?php if($is_block_list != 0){ echo 'is_member_block_'.$user_data['matri_id']; } ?>" />
										</div>
									</div>
									<?php include_once('page_part/mobile_common_front_button_ajaxcode.php'); ?>
									</div>
									
									<div class="xxl-16 xl-16 m-16 s-16 xs-16 l-16 bg-border margin-top-15px" style="padding-top:0px;">
										<div class="row" style="padding:4px;">
											<h3 class="profile-heading" style="margin-top:0px;">
												<i class="fa fa-user ne_mrg_ri8_10"></i>Basic Details
											</h3>
										</div>
										
										<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero proDetailHover">
											<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero">
												<div  class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
													<p class="margin-top-5"><span class="basic-img_1"></span>Age : 
														<?php if(isset($user_data['birthdate']) && $user_data['birthdate'] !=''){
																$birthdate = $user_data['birthdate'];
																echo $this->common_model->birthdate_disp($birthdate,0);
															}
															else{
																echo $this->common_model->display_data_na('');
															}?>, Height : 
															<?php if(isset($user_data['height']) && $user_data['height'] !=''){
																$height = $user_data['height'];
																echo $this->common_model->display_height($height);
															}
															else
															{
																echo $this->common_model->display_data_na('');
															}?>, Weight : 
															<?php if(isset($user_data['weight']) && $user_data['weight'] !=''){
																$weight = $user_data['weight'].' Kg';
																echo $weight;
															}
															else
															{
																echo $this->common_model->display_data_na('');
															}?></p>
                                                            <p class="margin-top-5"><span class="basic-img_2"></span>Marital Status : <?php 
                                                                if(isset($user_data['marital_status']) && $user_data['marital_status'] !=''){
                                                                    echo $user_data['marital_status'];
                                                                    if(isset($user_data['total_children']) && $user_data['total_children'] !='' && $user_data['total_children'] > '0'){
                                                                        if($user_data['marital_status']!='Unmarried')
                                                                        echo ', Total Children : '.$user_data['total_children'];
                                                                    }
                                                                    if(isset($user_data['status_children']) && $user_data['status_children'] !=''){
                                                                        if($user_data['marital_status']!='Unmarried')
                                                                        echo ', Status Children : '.$user_data['status_children'];
                                                                    }
                                                                }
                                                                else{
                                                                    echo $this->common_model->display_data_na($user_data['marital_status']);
                                                                }
                                                            ?></p>
                                                            <p class="margin-top-5"><span class="basic-img_3"></span>Community : <?php if(isset($user_data['religion_name']) && $user_data['religion_name'] !=''){ echo $user_data['religion_name'];}else{echo $this->common_model->display_data_na($user_data['religion_name']);}?>, Diocese : <?php if(isset($user_data['caste_name']) && $user_data['caste_name'] !=''){ echo $user_data['caste_name'];}else{echo $this->common_model->display_data_na($user_data['caste_name']);}?></p>
                                                            <p class="margin-top-5"><span class="basic-img_4"></span>Mother Tongue : <?php 
                                                                if(isset($user_data['mother_tongue']) && $user_data['mother_tongue'] !=''){ 
                                                                    echo $this->common_model->valueFromId(' mothertongue',$user_data['mother_tongue'],'mtongue_name');	
                                                                }
                                                                else{
                                                                    echo $this->common_model->display_data_na('');
                                                                }?></p>
                                                                <p class="margin-top-5"><span class="basic-img_5"></span>Education : 
                                                                    <?php 
                                                                        if(isset($user_data['education_detail']) && $user_data['education_detail'] !=''){ 
                                                                            echo $this->common_model->valueFromId('education_detail',$user_data['education_detail'],'education_name');	
                                                                        }
                                                                        else{
                                                                            echo $this->common_model->display_data_na('');
                                                                        }?></p>
                                                                        <p class="margin-top-5"><span class="basic-img_7"></span>Lives in <?php if(isset($user_data['city_name']) && $user_data['city_name'] !=''){ echo $user_data['city_name'];}else{echo $this->common_model->display_data_na($user_data['country_name']);}?>, <?php if(isset($user_data['state_name']) && $user_data['state_name'] !=''){ echo $user_data['state_name'];}else{echo $this->common_model->display_data_na($user_data['state_name']);}?>, <?php if(isset($user_data['country_name']) && $user_data['country_name'] !=''){ echo $user_data['country_name'];}else{echo $this->common_model->display_data_na($user_data['country_name']);}?></p>
                                                                        <p class="margin-top-5"><span class="fa fa-tasks" style="margin: 0px 8px 0 0px;"></span>  Hobby : <?php if(isset($user_data['hobby']) && $user_data['hobby'] !=''){ echo $user_data['hobby'];}else{echo $this->common_model->display_data_na($user_data['hobby']);}?></p>
												</div>
											</div>
										</div>
									</div>
									
									<div class="xxl-16 xl-16 m-16 s-16 xs-16 l-16 bg-border margin-top-15px padding-0-5-xs" style="padding-top:0px;">
										<div class="row" style="padding:4px;">
											<h3 class="profile-heading" style="margin-top:0px;">
												<a href="javascript:;" class="bdr-btm text-brown"><i class="fa fa-book ne_mrg_ri8_10"></i>Detailed Profile</a>
											</h3>
										</div>
										
										<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero">
											<div class="about_section_ttl">About Me</div>
											
											<div class="detail_section">
												<?php if(isset($user_data['profile_text']) && $user_data['profile_text'] !=''){
														$profile_text = strip_tags($user_data['profile_text']);
														echo $about_us = substr($profile_text,0,180);
													?> <a class="underline hook-abut in" data-toggle="collapse" href=".hook-abut" aria-expanded="false"></a>
													<div class="collapse hook-abut">
														<br/>
														<?php  echo $about_us = substr($profile_text,180);?>
														<br/>
													</div>
													<?php }
													else{	
														echo $this->common_model->display_data_na($user_data['profile_text']);
													}?>
											</div>
											<div>
												<div class="education_career_section_ttl">Education &amp; Profession</div>
												<div class="detail_section">
													<p class="margin-top-5"><span class="basic-img_5"></span>Education : 
														<?php 
															if(isset($user_data['education_detail']) && $user_data['education_detail'] !='')
															{ 
																echo $this->common_model->valueFromId('education_detail',$user_data['education_detail'],'education_name');	
															}
															else
															{
																echo $this->common_model->display_data_na('');
															}?><?php echo $user_data['other_education']?></p>
															<p class="margin-top-5"><span class="basic-img_6"></span>Designation : <?php if(isset($user_data['designation_name']) && $user_data['designation_name'] !=''){ echo $user_data['designation_name'];}else{echo $this->common_model->display_data_na($user_data['designation_name']);}?>, <?php echo $user_data['other_designation']?></p>
															<p class="margin-top-5"><span class="basic-img_6"></span>Employed in : <?php if(isset($user_data['employee_in']) && $user_data['employee_in'] !=''){ echo $user_data['employee_in'];}else{echo $this->common_model->display_data_na($user_data['employee_in']);}?></p>
															<p class="margin-top-5"><span class="basic-img_6"></span>Occupation : <?php if(isset($user_data['occupation_name']) && $user_data['occupation_name'] !=''){ echo $user_data['occupation_name'];}else{echo $this->common_model->display_data_na($user_data['occupation_name']);}?>, <?php echo $user_data['other_occupation']?></p>
															
															<p></p>
												</div>
											</div>
											<div class="lifestyle_section_ttl">LIFESTYLE & APPEARANCE</div>
											<div class="detail_section">
												<div class="lifestyle_block">
													<?php if(isset($user_data['diet']) && $user_data['diet'] !='' && $user_data['diet'] =='Veg'){ ?>
														<span class="veg"></span>
														<span class="lifestyle_desc"><?php echo $user_data['diet'];?></span>
														<?php }elseif(isset($user_data['diet']) && $user_data['diet'] !='' && ($user_data['diet'] =='Non-Veg' || $user_data['diet'] =='Eggetarian')){ ?>
														<span class="non-veg"></span>
														<span class="lifestyle_desc"><?php echo $user_data['diet']; ?></span>
														<?php }elseif(isset($user_data['diet']) && $user_data['diet'] !='' && $user_data['diet'] =='Occasionally Non-Veg'){ ?>
														<span class="veg-non_veg"></span>
														<span class="lifestyle_desc"><?php echo $user_data['diet']; ?></span>
													<?php } ?>
												</div>
												<div class="lifestyle_block" >
													<?php if(isset($user_data['drink']) && $user_data['drink'] !='' && $user_data['drink'] =='No'){ ?>
														<span class="no_drink"></span>
														<span class="lifestyle_desc"><?php echo $user_data['drink'];?></span>
														<?php }elseif(isset($user_data['drink']) && $user_data['drink'] !='' && $user_data['drink'] =='Yes'){ ?>
														<span class="yes_drink"></span>
														<span class="lifestyle_desc"><?php echo $user_data['drink']; ?></span>
														<?php }else{ ?>
														<span class="yes_drink"></span>
														<span class="lifestyle_desc"><?php echo $this->common_model->display_data_na($user_data['drink']); ?></span>
													<?php } ?>
												</div>
												<div class="lifestyle_block">
													<?php if(isset($user_data['smoke']) && $user_data['smoke'] !='' && $user_data['smoke'] =='No'){ ?>
														<span class="dont_smoke"></span>
														<span class="lifestyle_desc"><?php echo $user_data['smoke'];?></span>
														<?php }elseif(isset($user_data['smoke']) && $user_data['smoke'] !='' && $user_data['smoke'] =='Yes'){ ?>
														<span class="yes_smoke"></span>
														<span class="lifestyle_desc"><?php echo $user_data['smoke']; ?></span>
														<?php }else{ ?>
														<span class="yes_smoke"></span>
														<span class="lifestyle_desc"><?php echo $this->common_model->display_data_na($user_data['smoke']); ?></span>
													<?php } ?>
												</div>
												<div class="lifestyle_block">
													<?php if(isset($user_data['bodytype']) && $user_data['bodytype'] !='' && $user_data['bodytype'] =='Slim'){ ?>
														<span class="body_type1"></span>
														<span class="lifestyle_desc"><?php echo $user_data['bodytype'];?></span>
														<?php }elseif(isset($user_data['bodytype']) && $user_data['bodytype'] !='' && $user_data['bodytype'] =='Average'){ ?>
														<span class="body_type2"></span>
														<span class="lifestyle_desc"><?php echo $user_data['bodytype']; ?></span>
														<?php }elseif(isset($user_data['bodytype']) && $user_data['bodytype'] !='' && $user_data['bodytype'] =='Heavy'){ ?>
														<span class="body_type3"></span>
														<span class="lifestyle_desc"><?php echo $user_data['bodytype']; ?></span>
														<?php }elseif(isset($user_data['bodytype']) && $user_data['bodytype'] !='' && $user_data['bodytype'] =='Athletic'){ ?>
														<span class="body_type4"></span>
														<span class="lifestyle_desc"><?php echo $user_data['bodytype']; ?></span>
													<?php } ?>
												</div>
												<div class="lifestyle_block">
													<?php if(isset($user_data['complexion']) && $user_data['complexion'] !='' && $user_data['complexion'] =='Wheatish'){ ?>
														<span class="complexion_1"></span>
														<span class="lifestyle_desc"><?php echo $user_data['complexion'];?></span>
														<?php }elseif(isset($user_data['complexion']) && $user_data['complexion'] !='' && $user_data['complexion'] =='Very Fair'){ ?>
														<span class="complexion_2"></span>
														<span class="lifestyle_desc"><?php echo $user_data['complexion']; ?></span>
														<?php }elseif(isset($user_data['complexion']) && $user_data['complexion'] !='' && $user_data['complexion'] =='Fair'){ ?>
														<span class="complexion_3"></span>
														<span class="lifestyle_desc"><?php echo $user_data['complexion']; ?></span>
														<?php }elseif(isset($user_data['complexion']) && $user_data['complexion'] !='' && $user_data['complexion'] =='Wheatish Brown'){ ?>
														<span class="complexion_4"></span>
														<span class="lifestyle_desc"><?php echo $user_data['complexion']; ?></span>
														<?php }elseif(isset($user_data['complexion']) && $user_data['complexion'] !='' && $user_data['complexion'] =='Dark'){ ?>
														<span class="complexion_5"></span>
														<span class="lifestyle_desc"><?php echo $user_data['complexion']; ?></span>
													<?php } ?>
												</div>
											</div>
											
											<div>
												<div class="family_section_ttl">Family Details</div>
												<div class="detail_section">
													<p class="margin-top-5">
                                                    <span class="basic-img_4"></span> About Family :
													<?php if(isset($user_data['family_details']) && $user_data['family_details'] !=''){ echo $user_data['family_details'];}else{echo $this->common_model->display_data_na($user_data['family_details']);}?>
                                                    </p>
                                                    <p class="margin-top-4"><span class="basic-img_4"></span>Family Type : 
                                                    <?php if(isset($user_data['family_type']) && $user_data['family_type'] !=''){ 
                                                            echo $user_data['family_type'];	
                                                        }else{
                                                            echo $this->common_model->display_data_na('');
                                                        }?>
                                                 	</p>
                                                    
                                                    <p class="margin-top-5"><span class="basic-img_1"></span>Father Name : 
                                                    <?php if(isset($user_data['father_name']) && $user_data['father_name'] !=''){ 
                                                            echo $user_data['father_name'];	
                                                        }else{
                                                            echo $this->common_model->display_data_na('');
                                                        }?>
                                                 	</p>
                                                    
                                                    <p class="margin-top-5"><span class="basic-img_6"></span>Father Occupation : 
                                                    <?php if(isset($user_data['father_occupation']) && $user_data['father_occupation'] !=''){ 
                                                            echo $user_data['father_occupation'];
                                                        }else{
                                                            echo $this->common_model->display_data_na('');
                                                        }?>
                                                 	</p>
                                                    <p class="margin-top-5"><span class="basic-img_1"></span>Mother Name: 
                                                    <?php if(isset($user_data['mother_name']) && $user_data['mother_name'] !=''){ 
                                                            echo $user_data['mother_name'];
                                                        }else{
                                                            echo $this->common_model->display_data_na('');
                                                        }?>
                                                 	</p>
                                                    <p class="margin-top-5"><span class="basic-img_6"></span>Mother Occupation : 
                                                    <?php if(isset($user_data['mother_occupation']) && $user_data['mother_occupation'] !=''){ 
                                                            echo $user_data['mother_occupation'];
                                                        }else{
                                                            echo $this->common_model->display_data_na('');
                                                        }?>
                                                 	</p>
                                                    <p class="margin-top-5"><span class="basic-img_5"></span>Family Status : 
                                                    <?php if(isset($user_data['family_status']) && $user_data['family_status'] !=''){ 
                                                            echo $user_data['family_status'];
                                                        }else{
                                                            echo $this->common_model->display_data_na('');
                                                        }?>
                                                 	</p>
                                                    
                                                    <p class="margin-top-4"><span class="basic-img_4"></span>No Of Brothers : 
                                                    <?php if(isset($user_data['no_of_brothers']) && $user_data['no_of_brothers'] !=''){ 
                                                            echo $user_data['no_of_brothers'];
                                                        }else{
                                                            echo $this->common_model->display_data_na($user_data['no_of_brothers']);
                                                        }?>
                                                 	</p>
                                                    <p class="margin-top-4"><span class="basic-img_4"></span>No Of Married Brother : 
                                                    <?php if(isset($user_data['no_of_married_brother']) && $user_data['no_of_married_brother'] !=''){ 
                                                            echo $user_data['no_of_married_brother'];
                                                        }else{
                                                            echo $this->common_model->display_data_na($user_data['no_of_married_brother']);
                                                        }?>
                                                 	</p>

                                                    <p class="margin-top-4"><span class="basic-img_4"></span>No Of Sisters : 
                                                    <?php if(isset($user_data['no_of_sisters']) && $user_data['no_of_sisters'] !=''){ 
                                                            echo $user_data['no_of_sisters'];
                                                        }else{
                                                            echo $this->common_model->display_data_na($user_data['no_of_sisters']);
                                                        }?>
                                                 	</p>
                                                    <p class="margin-top-5"><span class="basic-img_4"></span>No Of Married Sister : 
                                                    <?php if(isset($user_data['no_of_married_sister']) && $user_data['no_of_married_sister'] !=''){ 
                                                            echo $user_data['no_of_married_sister'];
                                                        }else{
                                                            echo $this->common_model->display_data_na($user_data['no_of_married_sister']);
                                                        }?>
                                                 	</p>
                                                    
                                                </div>
											</div>
											
											<div id="partner_pref">
												<div class="what_section_ttl">Partner Preferences</div>	
												<div class="detail_section">
													<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
														<div class="row">
															<div class="xxl-4 xl-4 l-4 m-16 s-16 xs-16 text-center">
																<?php
																	if(isset($user_data['photo1']) && $user_data['photo1'] !='' && $user_data['photo1_approve'] =='APPROVED')
																	{?>	
																	<img src="<?php echo $base_url; ?><?php echo $path_photos;?><?php echo $user_data['photo1'];?>" class="profile_pic_wrapper" alt="" />
																	<?php }
																	else
																	{ ?>
																	<img src="<?php echo $this->common_model->member_photo_disp($user_data);?>" class="profile_pic_wrapper" alt="" />
																<?php } ?>			
																<div class="img-caption">His/Her Preference</div>
															</div>
															<div class="xxl-8 xl-8 l-8 m-16 s-16 xs-16">
																<div class="matches_count_wrap">
																	<span class="matches_number">
																		<?php 
																			$match_count=0;
																		?>
																	You match <span id="match_count_result"></span>/9 of her Preferences</span>
																</div>
															</div>
															<div class="xxl-4 xl-4 l-4 m-16 s-16 xs-16 text-center">
																
																<?php
																	if(isset($member_data['photo1']) && $member_data['photo1'] !='' && $member_data['photo1_approve'] =='APPROVED'){ ?>	
																	<img src="<?php echo $base_url; ?><?php echo $path_photos;?><?php echo $member_data['photo1'];?>" class="profile_pic_wrapper" alt="" />
																	<?php }else{ ?>
																	<img src="<?php echo $this->common_model->member_photo_disp($member_data);?>" class="profile_pic_wrapper" alt="" />
																<?php } ?>
																<div class="img-caption">You Match</div>
															</div>
														</div>
														
														<div class="row margin-top-15px">
															<div class="info_container xxl-16 xl-16 l-16 m-16 s-16 xs-16">
																<div class="info_wrap xxl-13 xl-13 l-13 m-16 s-16 xs-16">
																	<span class="info_title">Age</span><br/>
																	<span class="info_value">
																	<?php if(isset($user_data['part_frm_age']) && $user_data['part_frm_age'] !=''){
																		echo $user_data['part_frm_age'];
																	}
																	else{
																		echo $this->common_model->display_data_na($user_data['part_frm_age']);
																	}?> to 
																	<?php if(isset($user_data['part_to_age']) && $user_data['part_to_age'] !=''){ 
																		echo $user_data['part_to_age'];
																	}
																	else{	
																		echo $this->common_model->display_data_na($user_data['part_to_age']);
																	}?></span>
																</div>
																<div class="match_remark xxl-3 xl-3 l-3 m-16 s-16 xs-16">
																	<?php
																	$part_frm_age = $user_data['part_frm_age'];
																	$part_to_age = $user_data['part_to_age'];
																	$login_user_age = $this->common_model->birthdate_disp($member_data['birthdate'],0);
																	$age_between = range($part_frm_age,$part_to_age);
																	if(in_array($login_user_age,$age_between)){
																		echo $yes_remark;
																		$match_count++;
																	}
																	else{
																		echo $no_remark;
																	}?>
																</div>
															</div>
															<div class="info_container xxl-16 xl-16 l-16 m-16 s-16 xs-16">
																<div class="info_wrap xxl-13 xl-13 l-13 m-16 s-16 xs-16">
																	<span class="info_title">Height</span><br/>
																	<span class="info_value">
																		<?php if(isset($user_data['part_height']) && $user_data['part_height'] !=''){
																				$height = $user_data['part_height'];
																				echo $this->common_model->display_height($height);
																			}
																			else{
																				echo $this->common_model->display_data_na('');
																			}?> to <?php if(isset($user_data['part_height_to']) && $user_data['part_height_to'] !='')
																			{
																				$height = $user_data['part_height_to'];
																				echo $this->common_model->display_height($height);
																			}
																			else{
																				echo $this->common_model->display_data_na('');
																			}?></span>
																</div>
																<div class="match_remark xxl-3 xl-3 l-3 m-16 s-16 xs-16">
																	<?php 
																		$height_from = $user_data['part_height'];
																		$height_to = $user_data['part_height_to'];
																		$login_user_height = $member_data['height'];
																		$height_between = range($height_from,$height_to);
																		
																		if(in_array($login_user_height,$height_between))
																		{
																			echo $yes_remark;
																			$match_count++;
																		}
																		else
																		{
																			echo $no_remark;
																		}?>
																</div>
															</div>
															<div class="info_container xxl-16 xl-16 l-16 m-16 s-16 xs-16">
																<div class="info_wrap xxl-13 xl-13 l-13 m-16 s-16 xs-16">
																	<span class="info_title">Marital Status</span><br/>
																	<?php if(isset($user_data['looking_for']) && $user_data['looking_for'] !=''){?>
																		<span class="info_value">
																		<?php echo $user_data['looking_for'];?></span>	
																	</div>
																	<div class="match_remark xxl-3 xl-3 l-3 m-16 s-16 xs-16">
																		<?php 
																			$user_data_value = $user_data['looking_for'];
																			$member_data_value = $member_data['marital_status'];
																			$user_data_value_arr =explode(',',$user_data_value);
																			if(in_array($member_data_value,$user_data_value_arr))
																			{
																				echo $yes_remark;
																				$match_count++;
																			}
																			else
																			{
																				echo $no_remark;
																			}?>
																	</div>
																	<?php }else{?>
																	<span class="info_value">
																	<?php echo $this->common_model->display_data_na('');?></span>
																</div>
																<div class="match_remark xxl-3 xl-3 l-3 m-16 s-16 xs-16">
																	<?php echo $no_remark;?>
																</div>
															<?php }?>
														</div>
														<div class="info_container xxl-16 xl-16 l-16 m-16 s-16 xs-16">
															<div class="info_wrap xxl-13 xl-13 l-13 m-16 s-16 xs-16">
																<span class="info_title">Community</span><br/>
																<?php if(isset($user_data['part_religion']) && $user_data['part_religion'] !='')
																	{ 
																	$religion = $this->common_model->valueFromId('religion',$user_data['part_religion'],'religion_name');?> 	
																	<span class="info_value"><?php echo $religion;?>
																	</span></span>
															</div>
															<div class="match_remark xxl-3 xl-3 l-3 m-16 s-16 xs-16">
																<?php  $user_data_value = $user_data['part_religion'];
																	$member_data_value = $member_data['religion'];
																	$user_data_value_arr =explode(',',$user_data_value);
																	if(in_array($member_data_value,$user_data_value_arr))
																	{
																		echo $yes_remark;
																		$match_count++;
																	}
																	else
																	{
																		echo $no_remark;
																	}?>
															</div>
															<?php }
															else{?>
															<span class="info_value"><?php echo  $this->common_model->display_data_na('');?>
															</span></span>
													</div>
													<div class="match_remark xxl-3 xl-3 l-3 m-16 s-16 xs-16">
														<?php echo $no_remark;?>
													</div> 
												<?php }?>
											</div>     
											<div class="info_container xxl-16 xl-16 l-16 m-16 s-16 xs-16">
												<div class="info_wrap xxl-13 xl-13 l-13 m-16 s-16 xs-16">
													<span class="info_title">Mother Tongue</span><br/>
													<?php if(isset($user_data['part_mother_tongue']) && $user_data['part_mother_tongue'] !=''){ 
														$mothertongue = $this->common_model->valueFromId('mothertongue',$user_data['part_mother_tongue'],'mtongue_name');	
														$part_mothertongue = substr($mothertongue,0,140);?>
														<span class="info_value">
															<?php echo $part_mothertongue;?>
														</span>
                                                        <div class="collapse hook5">
															<br/>
															<?php  echo $part_mothertongue = substr($mothertongue,140);?>
															<br/>
														</div>
													</div>
                                                    <div class="match_remark xxl-3 xl-3 l-3 m-16 s-16 xs-16">
														<?php  $user_data_value = $user_data['part_mother_tongue'];
															$member_data_value = $member_data['mother_tongue'];
															$user_data_value_arr =explode(',',$user_data_value);
															if(in_array($member_data_value,$user_data_value_arr)){
																echo $yes_remark;
																$match_count++;
															}
															else{
																echo $no_remark;
															}?>
													</div>
													<?php }else{?>
													<span class="info_value">
													<?php echo $this->common_model->display_data_na('');?></span>
												</div>
												<div class="match_remark xxl-3 xl-3 l-3 m-16 s-16 xs-16">
													<?php echo $no_remark;?>
												</div>
											<?php }?>
										</div>
										
										<div class="info_container xxl-16 xl-16 l-16 m-16 s-16 xs-16">
											<div class="info_wrap xxl-13 xl-13 l-13 m-16 s-16 xs-16">
												<span class="info_title">Country Living in</span><br/>
												<?php if(isset($user_data['part_country_living']) && $user_data['part_country_living'] !=''){ 
													$country = $this->common_model->valueFromId('country_master',$user_data['part_country_living'],'country_name');	
													$part_country = substr($country,0,140);?>
													<span class="info_value">
														<?php echo $part_country;?>
													</span>
													<div class="collapse hook4">
														<br/>
														<?php  echo $part_country = substr($country,140);?>
														<br/>
													</div>
												</div>
												<div class="match_remark xxl-3 xl-3 l-3 m-16 s-16 xs-16">
													<?php 
													$user_data_value = $user_data['part_country_living'];
													
													$member_data_value = $member_data['country_id'];
													$user_data_value_arr =explode(',',$user_data_value);
													if(in_array($member_data_value,$user_data_value_arr)){
														echo $yes_remark;
														$match_count++;
													}
													else{
														echo $no_remark;
													}?>
												</div>
												<?php }
												else{?>
												<span class="info_value">
													<?php echo $this->common_model->display_data_na('');?>
												</span>
											</div>
											<div class="match_remark xxl-3 xl-3 l-3 m-16 s-16 xs-16">
												<?php echo $no_remark;?>
											</div>
										<?php }?>
									</div>
									<div class="info_container xxl-16 xl-16 l-16 m-16 s-16 xs-16">
										<div class="info_wrap xxl-13 xl-13 l-13 m-16 s-16 xs-16">
											<span class="info_title">Education</span><br/>
											<?php if(isset($user_data['part_education']) && $user_data['part_education'] !=''){ 
												$education = $this->common_model->valueFromId('education_detail',$user_data['part_education'],'education_name');
												$part_education = substr($education,0,140);?>
												<span class="info_value">
													<?php echo $part_education;?>
												</span>
												<div class="collapse hook3">
													<br/>
													<?php  echo $part_education = substr($education,140);?>
													<br/>
												</div>
											</div>
											<div class="match_remark xxl-3 xl-3 l-3 m-16 s-16 xs-16">
												<?php  $user_data_value = $education;
												$member_data_value = $this->common_model->valueFromId('education_detail',$member_data['education_detail'],'education_name');
												//echo $member_data_value;
												$user_data_value_arr =explode(',',$user_data_value);
												$member_data_value_arr =explode(',',$member_data_value);
												$result_arr = array_intersect($member_data_value_arr, $user_data_value_arr);		
												$result_arr_count = count($result_arr);
												if(isset($result_arr) && $result_arr!='' && $result_arr_count>0){
													echo $yes_remark;
													$match_count++;
												}
												else{
													echo $no_remark;
												}?>
											</div>
											<?php }
											else{?>
											<span class="info_value">
											<?php echo $this->common_model->display_data_na('');?></span>
										</div>
										<div class="match_remark xxl-3 xl-3 l-3 m-16 s-16 xs-16">
											<?php echo $no_remark;?>
										</div>
									<?php };?>
								</div>
								<div class="info_container xxl-16 xl-16 l-16 m-16 s-16 xs-16">
									<div class="info_wrap xxl-13 xl-13 l-13 m-16 s-16 xs-16">
										<span class="info_title">Profession Area</span><br/>
										<?php if(isset($user_data['part_occupation']) && $user_data['part_occupation'] !='')
											{ 
												$occupation = $this->common_model->valueFromId('occupation',$user_data['part_occupation'],'occupation_name');	
											$part_occupation = substr($occupation,0,140);?>
											<span class="info_value">
												<?php echo $part_occupation;?>
											</span>
											<div class="collapse hook2">
												<br/>
												<?php  echo $part_occupation = substr($occupation,140);?>
												<br/>
											</div>
										</div>
										<div class="match_remark xxl-3 xl-3 l-3 m-16 s-16 xs-16">
											<?php  
											$user_data_value = $occupation;
											$member_data_value = $this->common_model->valueFromId('occupation',$member_data['occupation'],'occupation_name');	
											$user_data_value_arr =explode(',',$user_data_value);
											
											if(in_array($member_data_value,$user_data_value_arr))
											{
												echo $yes_remark;
												$match_count++;
											}
											else
											{
												echo $no_remark;
											}?>
										</div>
										<?php }
										else{?>
										<span class="info_value">
										<?php echo $this->common_model->display_data_na('');?></span>
									</div>
									<div class="match_remark xxl-3 xl-3 l-3 m-16 s-16 xs-16">
										<?php echo $no_remark;?>
									</div>
								<?php }?>
							</div>
							<div class="info_container xxl-16 xl-16 l-16 m-16 s-16 xs-16">
								<div class="info_wrap xxl-13 xl-13 l-13 m-16 s-16 xs-16">
									<span class="info_title">Working As</span><br/>
									<?php if(isset($user_data['part_designation']) && $user_data['part_designation'] !=''){ 
										$designation = $this->common_model->valueFromId('designation',$user_data['part_designation'],'designation_name');	
										$part_designation = substr($designation,0,140);?>
										<span class="info_value">
                                        	<?php echo $part_designation;?>
										</span>
										<div class="collapse hook1">
											<br/>
											<?php echo $part_designation = substr($designation,140);?>
											<br/>
										</div>
									</div>
									<div class="match_remark xxl-3 xl-3 l-3 m-16 s-16 xs-16">
										<?php $user_data_value = $designation;
										$member_data_value = $this->common_model->valueFromId('designation',$member_data['designation'],'designation_name');
										$user_data_value_arr =explode(',',$user_data_value);
										if(in_array($member_data_value,$user_data_value_arr))
										{
											echo $yes_remark;
											$match_count++;
										}
										else
										{
											echo $no_remark;
										}?>
									</div>
									<?php }
									else{?>
									<span class="info_value">
										<?php echo $this->common_model->display_data_na('');?>
									</span>
								</div>
								<div class="match_remark xxl-3 xl-3 l-3 m-16 s-16 xs-16">
									<?php echo $no_remark;?>
								</div>
							<?php }?>
						</div>
						
						<?php
						if(isset($user_data['video_url']) && $user_data['video_approval'] =='APPROVED'){
							preg_match('/[\\?\\&]v=([^\\?\\&]+)/',$user_data['video_url'],$matches);
						?>
							<div class="xxl-16 xl-16 m-16 s-16 xs-16 l-16 bg-border margin-top-15px padding-0-5-xs" style="padding-top:0px;">
								<div class="row" style="padding:4px;">
									<h3 class="profile-heading" style="margin-top:0px;">
										<a href="javascript:;" class="bdr-btm text-white"><i class="fa fa-book ne_mrg_ri8_10"></i>Video</a>
									</h3>
								</div>
								<object data="http://www.youtube.com/v/<?php echo $matches[1];?>" style="width:100%; height:300px;"></object>								
							</div>   
                            <?php }?>                           
						<input type="hidden" name='match_count' id='match_count' value='<?php echo $match_count;?>'>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-4 hidden-lg hidden-md">
	<?php $this->load->view('front_end/mobile_my_profile_sidebar'); ?>
</div>
<div class="clearfix"></div>
<div class="clearfix"></div>
<?php $this->load->view('front_end/member_slider_footer'); ?>
</div>			
</div>			
<div class="clearfix"></div>
<hr>                
</div>
</div>
</div>    
<?php //include 'photo_protect.php';?>
<div class="clearfix"></div>
<!------------------<div class="container">----End------------------------------------>
<div class="margin-top-30"></div>
<?php
	$this->common_model->js_extra_code_fr.="
	load_choosen_code();
	$(document).ready(function(){
	var matchcount = $('#match_count').val();
	if(matchcount != ''){
	$('#match_count_result').html(matchcount);
	}else{
	var matchcount = '0';
	$('#match_count_result').html(matchcount);
	}
	$(".'"'."[data-toggle='tooltip']".'"'.").tooltip(); 
	$(".'"'."[data-toggle='popover']".'"'.").popover();   
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
	
	$('.myModal_note').click(function(){
	alert('ok');
	}); 
	
	function member_like(like_status='',other_id='',mobile='')
	{
	if(like_status == ''){
	alert('Please try again..!!!');
	return false;
	}
	if(other_id == ''){
	alert('Please try again..!!!');
	return false;
	}
	
	var hash_tocken_id = $('#hash_tocken_id').val();
	var base_url = $('#base_url').val();
	var url = base_url+'search/member-like';
	show_comm_mask();
	$.ajax({
	url: url,
	type: 'POST',
	data: {'csrf_new_matrimonial':hash_tocken_id,'like_status':like_status,'other_id':other_id},
	dataType:'json',
	success: function(data)
	{
	if(data.status == 'success'){
	
	var url2 = base_url+'search/total_likes_unlikes';
	$.ajax({
	url: url2,
	type: 'POST',
	data: {'csrf_new_matrimonial':hash_tocken_id,'other_id':other_id},
	dataType:'json',
	success: function(data1)
	{
	if(data1.status == 'success'){
	if(mobile != ''){
	$('#total_likes_mobile').html( data1.total_likes);
	$('#total_unlikes_mobile').html( data1.total_unlikes);
	}else{
	$('#total_likes').html(data1.total_likes);
	$('#total_unlikes').html( data1.total_unlikes);
	}
	}
	}
	});
	
	if(mobile != ''){
	if(data.image_name == 'Yes'){
	$('#Yes_id_mobile').hide();
	$('#No_id_mobile').show();
	
	$('#Image_Yes_mobile').show();
	$('#Image_No_mobile').hide();
	}
	if(data.image_name == 'No'){
	$('#No_id_mobile').hide();
	$('#Yes_id_mobile').show();
	
	$('#Image_No_mobile').show();
	$('#Image_Yes_mobile').hide();
	}
	}else{
	if(data.image_name == 'Yes'){
	$('#Yes_id').hide();
	$('#No_id').show();
	//$('#May_be_id').show();
	
	$('#Image_Yes').show();
	$('#Image_No').hide();
	//$('#Image_May_be').hide();
	}
	
	if(data.image_name == 'No'){
	$('#No_id').hide();
	$('#Yes_id').show();
	//$('#May_be_id').show();
	
	$('#Image_No').show();
	$('#Image_Yes').hide();
	//$('#Image_May_be').hide();
	}
	/*if(data.image_name == 'May be'){
	$('#May_be_id').hide();
	$('#Yes_id').show();
	$('#No_id').show();
	$('#Image_May_be').show();
	$('#Image_Yes').hide();
	$('#Image_No').hide();
	}*/
	}
	
	
	}else{
	alert(data.errmessage);
	}
	update_tocken(data.tocken);
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
	
	function centerModal() 
	{
	$(this).css('display', 'block');
	var dialog = $(this).find('.modal-dialog');
	var offset = ($(window).height() - dialog.height()) / 2;
	// Center modal vertically in window
	dialog.css('margin-top', offset);
	}
	$('.modal').on('show.bs.modal', centerModal);
	$(window).on('resize', function () {
	$('.modal:visible').each(centerModal);
	});
	";
	?>	