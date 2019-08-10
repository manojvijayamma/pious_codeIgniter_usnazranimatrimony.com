
<style>
	.ne-word-wrap{
	color: #bf8a60;
	
	}
	.label-title {
    color: #bf8a60;
	
	}
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
.ne-bdr-btm-lgt-grey {
    border-bottom: 1px solid #f2ddc8;
}
</style>
<div class="clearfix"></div>
<input type="hidden" id="matri_id_for_action" name="matri_id_for_action" value="" />
<?php 
	$member_id = $this->common_front_model->get_session_data('matri_id');
	$comm_model = $this->common_model;
	
	$gender = $this->common_front_model->get_session_data('gender');
	if(isset($gender) && $gender == 'Male'){
		$photopassword_image = $base_url.'assets/images/photopassword_female.png';
		}else{
		$photopassword_image = $base_url.'assets/images/photopassword_male.png';
	}
	//echo "<script>alert('".$gender."');</script>";
	if(isset($member_data) && $member_data !='' && is_array($member_data) && count($member_data) > 0)
	{
		$full_profile_url = $base_url.'search/view-profile/';
		foreach($member_data as $member_data_val)
		{ 
			if($member_data_val =='' || count($member_data_val)==0)
			{
				continue;
			}
			$full_profile_url_finale = $full_profile_url.$member_data_val['matri_id'];
			$result_member_matri_id = $member_data_val['matri_id'];
		?>
		<div class="xs-16 xl-16 xxl-16 m-16 s-16 ne_result padding-lr-zero margin-bottom-10px margin-top-10">
			<div class="row">
				<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne">
					<div class="" >
						<div class="xxl-1 xl-1 l-1 m-1 s-16 xs-16">
							&nbsp;<!--<input type="checkbox" class="pull-left" name="m_status" value="Unmarried">-->
						</div>
						<?php if(isset($member_data_val['sent_on']) && $member_data_val['sent_on']!='')
							{?> <b>Recieved On :</b>
							<?php $sent_on_admin_request =$member_data_val['sent_on'];
								echo $admin_request_date_display = $this->common_model->displayDate($sent_on_admin_request,'jS M, Y, g:i a');
							}?>
							<h2 id="mobile_hover" class="margin-top-0px margin-bottom-0px xxl-5 xl-5 l-5 m-5 s-16 xs-16" style="padding:0px;">
								<a target="_blank" href="<?php echo base_url()."search/view-profile/".$member_data_val['matri_id']; ?>" class="name-title xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero ne_font_weight_nrm"> <?php echo ucwords($comm_model->display_data_na($member_data_val['username']));?>&nbsp;<span class="user-id">(<?php echo $comm_model->display_data_na($member_data_val['matri_id']);?>)</span>
									<!--<span class="mobile-status"  data-toggle="tooltip" title="Contact Available" ></span>
									<span class="horo-status"  data-toggle="tooltip" title="Horoscope Available"></span>-->
								</a>
							</h2>
							
					</div>
				</div>
			</div>
			<hr>
			<div class="xxl-4 xxl-margin-left-0 xl-4 xl-margin-left-0 xs-12 xs-margin-left-2 l-4 l-margin-left-0 m-5 m-margin-left-0">
				
				<?php
					$path_photos = $this->common_model->path_photos;
					
					if(isset($member_data_val['photo1']) && $member_data_val['photo1'] !='' && isset($member_data_val['photo1_approve']) && $member_data_val['photo1_approve'] =='APPROVED' && file_exists($path_photos.$member_data_val['photo1']) && isset($member_data_val['photo_view_status']) && $member_data_val['photo_view_status'] == 0){
					?>
					<!--<a href="javascript:;" onClick="newWindow('<?php echo base_url();?>search/photo-password/<?php echo $member_data_val['matri_id']; ?>', '', '650', '420')" >
						<img src="<?php echo $photopassword_image; ?>" class="img-responsive ne_result_img myimg" alt="" >
					</a>-->
					<a data-toggle="modal" data-target="#myModal_photoprotect" title="Photo Protected" onClick="addstyle('<?php echo $member_id;?>','<?php echo $member_data_val['matri_id']; ?>')">
						<img src="<?php echo $photopassword_image; ?>" class="img-responsive ne_result_img myimg" alt="" style="height:164px!important;weight:164px!important;">
					</a>
					<?php }
					else{ ?>
					<a target="_blank" href="<?php echo base_url()."search/view-profile/".$member_data_val['matri_id']; ?>">
						<img src="<?php echo $comm_model->member_photo_disp($member_data_val); ?>" class="img-responsive ne_result_img myimg" title="<?php echo $comm_model->display_data_na($member_data_val['username']);?>" alt="<?php echo $comm_model->display_data_na($member_data_val['matri_id']);?>" style="height:164px!important;weight:164px!important;">
					</a>
					<p class="small text-center margin-top-5">
						<?php
							/*				
							<a target="_blank" href="<?php echo $full_profile_url_finale; ?>" class="underline">View Full Details</a> */
						?>
						
						<a target="_blank" href="<?php echo base_url()."search/view-profile/".$member_data_val['matri_id'];?>" class="underline">View Full Details</a>
					</p>
				<?php } ?>
				
				<ul class="xxl-16 xl-16 m-16 xs-16 l-16 s-16 padding-lr-zero margin-top-10px margin-bottom-10px neResultBottomIcons"></ul>
			</div> 
			
			<div class="xxl-12 xl-12 l-12 m-11 s-16 xs-16 padding-lr-zero-1199 padding-lr-zero-999 padding-lr-zero-768">
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
												: <?php echo $comm_model->birthdate_disp($member_data_val['birthdate'],0);?>, <?php echo $comm_model->display_height($member_data_val['height']);?>
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
												: <?php echo $comm_model->display_data_na($member_data_val['religion_name']);?>
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
												: <?php echo $comm_model->display_data_na($member_data_val['caste_name']);?>
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
												: <?php echo $comm_model->display_data_na($member_data_val['mtongue_name']);?>
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
												: <?php echo $comm_model->valueFromId('education_detail',$member_data_val['education_detail'],'education_name');?>
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
												: <?php echo $comm_model->display_data_na($member_data_val['city_name']).', '.$comm_model->display_data_na($member_data_val['state_name']).', '.$comm_model->display_data_na($member_data_val['country_name']);?>
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
												: <?php echo $comm_model->display_data_na($member_data_val['occupation_name']);?>
											</div>
										</div>
									</div>
								</div>
							</div>       
						</div>
						
						<?php include('page_part/common_like_dislike.php');?>
						
					</div>
				</div>
				<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-5">
					<div class="row">
						<p class="small">
							<?php 
								$profile_text = $comm_model->display_data_na($member_data_val['profile_text']);
								if(strlen($profile_text)> 160)
								{
									echo substr($profile_text,0,160).'...';
								}
								else
								{
									echo $profile_text;
								}
							?> <a target="_blank" href="<?php echo base_url()."search/view-profile/".$member_data_val['matri_id']; ?>" style="color:#d8497f;font-weight:bold;">Read More</a> <i class="fa fa-caret-right" style="    font-size: 16px;
							position: relative;
						top: 2px;"></i></p>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<hr style="margin:5px 0px; !important;">
			<div style="text-align: center">
				<a class="underline hook1 in" data-toggle="collapse" href=".<?php echo $member_data_val['matri_id'];?>" aria-expanded="false">Action <i class="fa fa-caret-down"></i></a>
			</div>
			
			
			<?php include('page_part/common_front_button.php'); ?>
			
		</div>
		<?php
		} }
		else
		{?>
		<div role="alert" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 alert margin-top-20" style="background:#fcf8e3;border:1px solid #faebcc; color: #8a6d3b;">
			<p class="margin-top-10px margin-bottom-10px">
				No Data found to display.
			</p>
		</div>
		<div class="clearfix"></div>
		<?php
		}
?>
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
	$this->common_model->js_extra_code_fr .= "var win = null;
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
?><?php include_once('photo_protect.php'); ?>
