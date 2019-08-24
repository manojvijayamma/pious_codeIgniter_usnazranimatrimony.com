<!-- ======<div class="container">=====Start======== -->
<style>
	.owl-theme .owl-controls {
    text-align: center;
    display: none !important;
	}
	body{
	background-color:#fff !important;
	}
</style>






<div id="bootstrap-touch-slider" class="slider-bg kenburns_zoomInOut" >
	<div id="slider" class="owl-carousel owl-theme slider hp-3">
		<?php
			$home_banner = $this->common_model->get_count_data_manual('homepage_banner',array('status'=>'APPROVED'),2,'banner','id desc');
			if(isset($home_banner) && $home_banner !='' && is_array($home_banner) && count($home_banner) > 0)
			{
				$path_banner = $this->common_model->path_banner;
				foreach($home_banner as $home_banner_val)
				{
					if(isset($home_banner_val['banner']) && $home_banner_val['banner'] !='' && file_exists($path_banner.$home_banner_val['banner']))
					{
						$banner_url = $base_url.$path_banner.$home_banner_val['banner'];
					}
					else
					{
						continue;
					}
				?> 
				<div class="item slider-shade"><img src="<?php echo $banner_url;?>" class="lazyload banner-home-1" alt="" style="width:100%;height:690px;"></div>
				<?php
				}
			}
			else
			{
			?>
            <div class="item slider-shade"><img src="<?php echo $base_url; ?>assets/front_end/images/slider/slider-15.jpg" class="lazyload banner-home-1" alt="Wedding"></div>
            <?php
			}
		?>
	</div>
	<div class="find-section snow padding-to-0-xs">
		<div class="container">
			<div class="row">
				<div class="hidden-sm hidden-xs">
					<div class="col-md-12">
						<div class="finder-caption margin-top-144 pull-right">
							<h1 class="animated bounceInDown" style="margin-bottom:7px;color:#c47594;line-height: 50px;font-size: 36px;"><span class=""> <?php if(isset($config_data['homepage_banner_text']) && $config_data['homepage_banner_text'] !='') {echo nl2br($config_data['homepage_banner_text']);} ?></h1>
								
							</div>
						</div>
						<div class="col-md-12">
							<a href="<?php echo $base_url;?>register" class="btn btn-md font-15 bold pull-right new-reg-t">Free Registration </a>
						</div>
						<div class="col-md-12">
							<p class="text-right" style="color:#d87e03;margin: 0px 8px;"> Contact For Assistance</p>
						</div>
						<div class="col-md-12">
							<h4 class="text-right" style="color:#d87e03;margin:3px 8px;font-weight:bold;"> <?php if(isset($config_data['contact_no']) && $config_data['contact_no'] !='') {echo $config_data['contact_no'];} ?></h4>
						</div>
					</div>
					<!--<div class="col-md-12">
						<div class="finder-caption margin-top-144">
						<h1 class="animated bounceInDown" style="margin-bottom:7px;"><span class="text-color-default"><?php if(isset($config_data['homepage_banner_text'])) { echo $config_data['homepage_banner_text']; } ?></span> </h1>
						<p class="animated bounceInUp text-center"><?php if(isset($config_data['homepage_banner_description'])) { echo $config_data['homepage_banner_description']; } ?> </p>
						</div>
					</div>-->
					<div class="col-md-12 finder-block">
						<div class="finderform animated zoomIn">
							<div class="wrap_1 inline-block pd-rgt-none">
								<form method="post" name="search_form" id="search_form"><!-- === action="" ==== -->
									<div class="search_top">
										<div class="inline-block pdr10">
											<label class="gender_1">I am looking for :</label>
											<div class="age_box1" style="max-width:100%;display:inline-block;">
												<select name="gender" class="form-control new-home-select" style="padding: 5px 15px; border: 2px solid #ecc8ca!important;
												border-radius: 5px;">
													<option value="">Select Gender</option>
													<?php echo $this->common_model->array_optionstr('gender');?>
												</select>
											</div>
										</div>
										<div class="inline-block pdr10">
											<label class="gender_1">Age:</label>
											<div class="age_box1" style="max-width:100%;display:inline-block;">
												<select style=" margin-right:5px;padding: 5px 3px;border: 2px solid #ecc8ca!important;
												border-radius: 5px;" name="from_age" class="form-control">
													<?php echo $this->common_model->array_optionstr($this->common_model->age_rang(),18);?>
												</select>
											</div>&nbsp;to
											<div class="age_box1" style="max-width:100%;display:inline-block;">
												<select style="padding: 5px 3px;border: 2px solid #ecc8ca!important;
												border-radius: 5px;" name="to_age" class="form-control">
													<?php echo $this->common_model->array_optionstr($this->common_model->age_rang(),30);?>
												</select>
											</div>
										</div>
										<div class="inline-block pdr10">
											<label class="gender_1">Of Community:</label>
											<div class="age_box1" style="max-width:100%;display:inline-block;">
												<select name="religion[]" class="form-control" style="padding: 5px 5px;border: 2px solid #ecc8ca!important;
												border-radius: 5px;">
													<option value="">Select Community</option>
													<?php echo $this->common_model->array_optionstr($this->common_model->dropdown_array_table('religion'));?>
												</select>
											</div>
										</div>
										<div class="inline-block pdr10">
											<label class="gender_1">Mother Tongue :</label>
											<div class="age_box1" style="max-width:100%;display:inline-block;">
												<select name="mothertongue[]" id="mothertongue[]" class="form-control" style="padding: 5px 15px;border: 2px solid #ecc8ca!important;
												border-radius: 5px;">
													<option value="">Select Mother Tongue</option>
													<?php echo $this->common_model->array_optionstr($this->common_model->dropdown_array_table('mothertongue'));?>
												</select>
											</div>
										</div>
										<div class="inline-block pd-rgt-none">
											<label class="gender_1">Country:</label>
											<div class="age_box1" style="max-width:100%;display:inline-block;">
												<select name="country[]" id="country[]" class="form-control" style="padding: 5px 15px;width: 150px;border: 2px solid #ecc8ca!important;
												border-radius: 5px;">
													<option value="">Select Country</option>
													<?php echo $this->common_model->array_optionstr($this->common_model->dropdown_array_table('country_master'),'215');?>
												</select>
											</div>
										</div>
										<br class="hidden-lg hidden-md" />
										<div class="submit inline-block pd-rgt-none margin-top-0">
											<input id="submit-btn" class="hvr-wobble-vertical" type="button" value="Find Matches" style="padding: 9px 20px;" onClick="find_match()">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	
	
	
	<?php
		$current_login_user = $this->common_front_model->get_session_data(); 
		$login_user_matri_id = $current_login_user['matri_id'];
		$login_user_gender = $current_login_user['gender'];
		
		$gender = $this->common_front_model->get_session_data('gender');
		if(isset($gender) && $gender == 'Male'){
			$photopassword_image = $base_url.'assets/images/photopassword_female.png';
			}else{
			$photopassword_image = $base_url.'assets/images/photopassword_male.png';
		}
		$where_arra=array('is_deleted'=>'No','fstatus'=>'Featured',"status !='UNAPPROVED' and status !='Suspended'");
		if($login_user_gender=='Male')
		{
			$where_arra['gender'] = 'Female';
		}
		else if($login_user_gender=='Female')
		{
			$where_arra['gender'] = 'Male';
		}
		$featured_profile_data = $this->common_model->get_count_data_manual('register_view',$where_arra,2,'*','rand()',1,8);
		//echo $this->db->last_query();
		if(isset($featured_profile_data) && $featured_profile_data !='' && is_array($featured_profile_data) && count($featured_profile_data) > 0 )
		{	?>
		<div class="section-space50 padding-top-10-xs" style="background:#fff; margin-bottom: 30px;">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title text-center slideanim" style="margin-bottom: 15px;
						padding: 5px;">
							<h2 class="font-25-xs" style="color:#c54868;"><span class=""><b>Highlighted Profiles</b></span>
							</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<?php
						$i=1;
						$path_photos = $this->common_model->path_photos;
						foreach($featured_profile_data as $featured_data)
						{
							if($i==5){
							?>	</div>
							<div class="row margin-top-20">
								<?php
								}?>
								<div class="col-md-3 feature-block">
									<?php
										$path_photos = $this->common_model->path_photos;
										if(isset($featured_data['photo1']) && $featured_data['photo1'] !='' && $featured_data['photo1_approve'] =='APPROVED' && file_exists($path_photos.$featured_data['photo1']) && $featured_data['photo_password'] !='' && $featured_data['photo_protect'] !='No' && $featured_data['photo_view_status'] == 0){
										?>
										
										<a data-toggle="modal" data-target="#myModal_photoprotect" onClick="addstyle('<?php echo $login_user_matri_id;?>','<?php echo $featured_data['matri_id']; ?>')" >
											<img src="<?php echo $photopassword_image; ?>" style="width: 70px !important;height: 70px !important;" class="new-hiegh" alt="">
										</a>
										
										<?php }else{ ?>
										<a href="javascript:void(0);">
										<div class="profile-image biseller-column">
											<img src="<?php echo $this->common_model->member_photo_disp($featured_data);?>" class="new-hiegh" title="<?php echo $featured_data['username'];?>" alt="<?php echo $featured_data['matri_id'];?>">
										<?php }	?>
										<div class="agile-overlay">
											<h4><a class="highlight" href="<?php echo $base_url."search/view-profile/".$featured_data['matri_id']; ?>"><?php echo $featured_data['username'];?></a></h4>
											<ul>
												<li class="nbs-flexisel-item"><span>
                                                <?php if(isset($featured_data['birthdate']) && $featured_data['birthdate'] !=''){
													 $birthdate = $featured_data['birthdate'];
													 echo $this->common_model->birthdate_disp($birthdate,0);
												}
												else{
													echo $this->common_model->display_data_na('');
												}?>,
												<?php if(isset($featured_data['height']) && $featured_data['height'] !=''){
													$height = $featured_data['height'];
													echo $this->common_model->display_height($height);
												}
												else{
													echo $this->common_model->display_data_na('');
												}?>, <br>
												<?php if(isset($featured_data['education_name']) && $featured_data['education_name'] !=''){ echo $featured_data['education_name'];}else{echo $this->common_model->display_data_na($featured_data['education_name']);}?>,<br>
                                                <?php if(isset($featured_data['religion_name']) && $featured_data['religion_name'] !=''){ echo $featured_data['religion_name'];}else{echo $this->common_model->display_data_na($featured_data['religion_name']);}?>, <br>
						<?php if(isset($featured_data['city_name']) && $featured_data['city_name'] !=''){ echo $featured_data['city_name'];}else{echo $this->common_model->display_data_na($featured_data['country_name']);}?>, <?php if(isset($featured_data['country_name']) && $featured_data['country_name'] !=''){ echo $featured_data['country_name'];}else{echo $this->common_model->display_data_na($featured_data['country_name']);}?></li>
											</ul>
										</div>
									</div>
									</a>
								</div>
								<?php
									$i++;
								}?>
				</div>
				
			</div>
		</div>
		<?php	}
	?>
	
	<div class="clearfix"></div>
	<?php
		
	?>
	
    <div class="section-space50 padding-top-10-xs" style="background:#f6e0d5;">
        <div class="container">
            <div class="row">
				<div class="col-md-12">
					<div class="text-center slideanim slide" style="margin-bottom: 15px;
					padding: 5px;">
						<h2 class="font-25-xs" style="color:#c54868;"><span class=""><b>About <?php if(isset($config_data['web_frienly_name']) && $config_data['web_frienly_name'] !=''){ echo $config_data['web_frienly_name'];} ?></b></span>
						</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<a href="https://www.usnazranimatrimony.com/about-us"><img src="<?php echo $base_url?>/assets/logo/homepage-aboutlogo.png" border="0"></a>
				</div>
				<div class="col-md-8">
					<p class="font-25-xs" style="color:#c54868;padding-bottom: 18px;"><span class="text-center"><b><?php if(isset($config_data['website_description']) && $config_data['website_description'] !=''){ echo $config_data['website_description'];} ?></b></span></p>
					
				</div>
			</div>
		</div>
	</div>
    <?php
		
		$logo_url = 'front_end/images/logo/logo-3.png';
		if(isset($config_data['upload_logo']) && $config_data['upload_logo'] !='')
		{
			$logo_url = 'logo/'.$config_data['upload_logo'];
		}
		$other_banner1_url='';
		$other_banner1_logo_url='';
		$other_banner = $this->common_model->get_count_data_manual('other_banner',array('status'=>'APPROVED'),1,'','id desc');
		
		if($other_banner != '')
		{
			$path_other_banner = $this->common_model->other_banner;
			if(isset($other_banner['other_banner1']) && $other_banner['other_banner1'] !='' && file_exists($path_other_banner.$other_banner['other_banner1']))
			{
				$other_banner1_url = $base_url.$path_other_banner.$other_banner['other_banner1'];
			}
			
			if(isset($other_banner['other_banner1_logo']) && $other_banner['other_banner1_logo'] !='' && file_exists($path_other_banner.$other_banner['other_banner1_logo']))
			{
				$other_banner1_logo_url = $base_url.$path_other_banner.$other_banner['other_banner1_logo'];
			}
		}
		else
		{
			$other_banner1_url='';
		}
	?>
	<!--<input type="hidden" name="other_banner1" id="other_banner1" value="<?php echo $other_banner1_url;?>">
		<section class="module section-space20 hidden-sm hidden-xs">
		<div class="container">
		<div class="row">
		<div class="col-md-6 col-sm-12 col-xs-12"></div>
		<div class="col-md-6 parallax-caption text-center padding-bottom-30 margin-top-0">
		<?php if(isset($other_banner1_logo_url) && $other_banner1_logo_url != ''){ ?>
			<img data-src="<?php echo $other_banner1_logo_url; ?>" alt="<?php echo $other_banner['other_banner1_title'];?>" src="<?php echo $other_banner1_logo_url; ?>" class="img-responsive text-center lazyload" />
			<?php }else{ ?>
			<img data-src="<?php echo $base_url; ?>assets/<?php echo $logo_url; ?>" alt="Wedding Vendors" src="<?php echo $base_url; ?>assets/<?php echo $logo_url; ?>" class="img-responsive text-center lazyload" />
		<?php } ?>
		<h2 class="text-shadow-black"><span class="color-blue">
		<?php echo $other_banner['other_banner1_title'];?>
		</span>
		</h2>
		<p class="text-center text-shadow-black"><?php echo $other_banner['other_banner1_description'];?></p>
		<a href="<?php echo $base_url; ?>wedding-vendor" class="btn " style="box-shadow:2px 2px 0 0 #aaa;">Start Planning Today <i class="fa fa-chevron-right"></i></a> 
		</div>
		</div>
		</div>
	</section>-->
	
	<!--<div class="section-space60 padding-top-10-xs padding-bottom-10-xs hidden-sm hidden-xs" style="background:#F1F1F2;">
		<div class="container">
		<div class="row">
		<div class="col-md-12">
		<div class="section-title mb60 text-center">
		<h1 class="color-linear text-shadow-black"><span class="text-darkgrey">
		<span class="text-color-light-red"><?php echo $config_data['middle_text2'];?></span></span>
		</h1>
		<p class="text-center">
		<span class="text-darkgrey"><?php echo $config_data['middle_text2_description'];?></span>
		</p>
		<div class="heart-divider font-18">
		<span class="grey-line"></span>
		<i class="fa fa-heart pink-heart"></i>
		<i class="fa fa-heart grey-heart"></i>
		<span class="grey-line"></span>
		</div>
		</div>
		</div>
		</div>
		<div class="row">
		<?php
			$reason_why_choose = $this->common_model->get_count_data_manual('reason_why_choose',array('status'=>'APPROVED'),2,'','id asc',1,3);
			$path_reason_why_choose = 'assets/images/';
			if(isset($reason_why_choose) && $reason_why_choose != '' && is_array($reason_why_choose) && count($reason_why_choose) > 0)
			{
				foreach($reason_why_choose as $row){
					
					$path_reason_why_choose_url = '';
					if(isset($row['icon']) && $row['icon'] !='' && file_exists($path_reason_why_choose.$row['icon']))
					{
						$path_reason_why_choose_url = $base_url.$path_reason_why_choose.$row['icon'];
					}
				?>
				<div class="col-md-4 margin-f-p-m">
				<div class="well-box feature-block text-center" style="min-height:250px;max-height:250px;">
				<div class="feature-icon">
				<img style="min-height:80px;max-height:80px;" data-src="<?php echo $path_reason_why_choose_url; ?>" src="<?php echo $path_reason_why_choose_url; ?>" alt="<?php echo $row['title']; ?>" class="text-center img-responsive lazyload" />
				</div>
				<div class="feature-info">
				<h3 class="text-darkgrey">
				<?php
					$title = strip_tags($row['title']);
					if (strlen($title) > 20) {
						echo $title = substr($title, 0, 20);
						}else{
						echo $title;
					}
				?></h3>
				<p class="most-r-w-p">
				<?php
					$description = strip_tags($row['description']);
					if (strlen($description) > 120) {
						echo $description = substr($description, 0, 120).'...';
						}else{
						echo $description;
					}
				?></p>
				</div>
				</div>
				</div>
				<?php 	} 
			}
		?>
		</div>
		</div>
	</div>-->
	
	<?php
		$vendors_list = $this->common_model->get_count_data_manual('wedding_planner',array('status'=>'APPROVED'),2,'*','id desc',1,3);
		$vendors_list_count = $this->common_model->get_count_data_manual('wedding_planner',array('status'=>'APPROVED'),0,'*','id desc');
		if(isset($vendors_list) && $vendors_list !='' && is_array($vendors_list) && count($vendors_list) > 0)
		{
		?>
		
		<?php
		}
	?>
	<div class="clearfix"></div>
	
	<?php 
		$other_banner2_url='';
		if($other_banner != ''){
			$path_other_banner = $this->common_model->other_banner;
			if(isset($other_banner['other_banner2']) && $other_banner['other_banner2'] !='' && file_exists($path_other_banner.$other_banner['other_banner2']))
			{
				$other_banner2_url = $base_url.$path_other_banner.$other_banner['other_banner2'];
			}
		}
	?>
	<div class="container" style="background:#fff;">
		<div class="container margin-top-20 padding-0-5-xs">
			<div class="col-md-3 col-sm-12 col-xs-12 padding-0-5-xs">
				<?php if(isset($other_banner2_url) && $other_banner2_url != ''){ ?>
					<img data-src="<?php echo $other_banner2_url; ?>" class="img-responsive lazyload" src="<?php echo $other_banner2_url; ?>" alt="matrimony-mobile"/>
					<?php }else{ ?>
					<img data-src="<?php echo $base_url; ?>assets/front_end/images/matrimony-mobile.png" class="img-responsive lazyload" src="<?php echo $base_url; ?>assets/front_end/images/matrimony-mobile.png" alt="matrimony-mobile" />
				<?php } ?>
			</div>
			<div class="col-md-5 col-sm-12 col-xs-12 margin-top-30 padding-0-5-xs">
				<div class="text-center slideanim slide" style="margin-bottom: 15px;padding: 5px;">
					<h2 class="font-25-xs" style="color:#c54868;"><span class=""><b>Download</b></span>
					</h2>
					
					<h2 class="font-25-xs margin-top-40" style="color:#cb7371;"><span class=""><b><?php if(isset($config_data['web_frienly_name']) && $config_data['web_frienly_name'] !=''){ echo strtoupper($config_data['web_frienly_name']);} ?><br> MOBILE APP</b></span>
					</h2>
				</div>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12 margin-top-30 padding-0-5-xs">
				<a target="_blank" href="<?php if(isset($config_data['android_app_link']) && $config_data['android_app_link'] !='') {echo $config_data['android_app_link'];} ?>"><img src="<?php echo $base_url; ?>assets/front_end/images/google-play.gif" class="img-responsive lazyload" alt="google-play" title="google-play" /></a>
				<a target="_blank"  href="<?php if(isset($config_data['ios_app_link']) && $config_data['ios_app_link'] !='') {echo $config_data['ios_app_link'];} ?>"><img src="<?php echo $base_url; ?>assets/front_end/images/app-store.gif" class="img-responsive lazyload margin-top-30" alt="app-store" title="app-store" /></a>
			</div>
		</div>
	</div>
	
	<div class="clearfix"></div>
	<div class="section-space50 padding-top-10-xs" style="background:#fff3e7; padding-bottom: 37px;
	padding-top: 46px;
	margin-bottom: 20px;">
		<div class="container">
			
			<div class="row">
				<div class="col-md-3 feature-block">
					<a href=""> <img src="<?php echo $base_url;?>assets/images/mc.png" class="new-wedding" alt=""/></a>
					<h4 class="text-center" style="color:#a58401; line-height: 25px;"><strong> Marriage <br> Preparation Course </strong></h4>
				</div>
				<div class="col-md-3 feature-block">
					<a href=""> <img src="<?php echo $base_url;?>assets/images/cg.png" class="new-wedding" alt=""/></a>
					<h4 class="text-center" style="color:#a58401; line-height: 25px;"><strong> <br> Guidelines </strong></h4>
				</div>
				<div class="col-md-3 feature-block">
					<a href=""> <img src="<?php echo $base_url;?>assets/images/use-full.png" class="new-wedding" alt=""/> </a>
					<h4 class="text-center" style="color:#a58401; line-height: 25px;"><strong> Useful <br> Links </strong></h4>
				</div>
				<div class="col-md-3 feature-block">
					<a href=""><img src="<?php echo $base_url;?>assets/images/mb.png" class="new-wedding" alt=""/></a>
					<h4 class="text-center" style="color:#a58401; line-height: 25px;"><strong> <br> Matrimonial Blog</strong></h4>
				</div>
			</div>
			
		</div>
	</div>
	
	<div class="section-space50 padding-top-10-xs hidden-sm hidden-xs" style="background:#fff; padding-bottom: 37px;
	padding-top: 46px;
	margin-bottom: 20px;">
		<div class="container">
			<div class="row">
				<div class="col-md-2 feature-block">
					<a href="<?php if(isset($config_data['facebook_link']) && $config_data['facebook_link'] !=''){ echo $config_data['facebook_link'];} ?>" target="_blank"> <img src="<?php echo $base_url;?>assets/images/fb-icon.png" class="social-img" alt="Facebook Link"/></a>
				</div>
				<div class="col-md-2">
					<a href="<?php if(isset($config_data['twitter_link']) && $config_data['twitter_link'] !=''){ echo $config_data['twitter_link'];} ?>" target="_blank"> <img src="<?php echo $base_url;?>assets/images/twit.png" class="social-img" alt="Twitter Link"/></a>
				</div>
				<div class="col-md-2">
					<a href="<?php if(isset($config_data['google_link']) && $config_data['google_link'] !=''){ echo $config_data['google_link'];} ?>" target="_blank"> <img src="<?php echo $base_url;?>assets/images/g-plus.png" class="social-img" alt="Google Link"/></a>
				</div>
				<div class="col-md-2">
					<a href="<?php if(isset($config_data['youtube_link']) && $config_data['youtube_link'] !=''){ echo $config_data['youtube_link'];} ?>" target="_blank"> <img src="<?php echo $base_url;?>assets/images/you-t.png" class="social-img" alt="Youtube Link"/></a>
				</div>
				<div class="col-md-2">
					<a href="<?php if(isset($config_data['pinterest_link']) && $config_data['pinterest_link'] !=''){ echo $config_data['pinterest_link'];} ?>" target="_blank"> <img src="<?php echo $base_url;?>assets/images/print-t.png" class="social-img" alt="Pinterest Link"/></a>
				</div>
				<div class="col-md-2">
					<a href="<?php if(isset($config_data['instagram_link']) && $config_data['instagram_link'] !=''){ echo $config_data['instagram_link'];} ?>" target="_blank"> <img src="<?php echo $base_url;?>assets/images/insta.png" class="social-img" alt="Instagram Link"/></a>
				</div>
			</div>
			
		</div>
	</div>
	<!-- ===== <div class="container"> =======End ======= -->		
	<?php 
		$this->common_model->js_extra_code_fr.='
		$(window).scroll(function() {
		if($(".header-v2").length > 0)
		{
		if ($(".header-v2").offset().top > 50) {
		$(".navbar-fixed-top").addClass("top-nav-collapse");
		} else {
		$(".navbar-fixed-top").removeClass("top-nav-collapse");
		}
		}
		});
		$(window).scroll(function() {
		$(".slideanim").each(function(){
		var pos = $(this).offset().top;
		var winTop = $(window).scrollTop();
		if (pos < winTop + 600) {
		$(this).addClass("slide");
		}
		});
		});
		$(document).ready(function(){
		
		var other_bannerUrl = $("#other_banner1").val();
		if(other_bannerUrl != ""){
		$(".module").css("background-image", "url(" + other_bannerUrl + ")");
		}
		
		$('."'".'[data-toggle="tooltip"]'."'".').tooltip();
		$('."'".'[rel="tooltip"]'."'".').tooltip();
		});
		function rotateCard(btn){
		var $card = $(btn).closest(".card-container");
		console.log($card);
		if($card.hasClass("hover")){
		$card.removeClass("hover");
		} else {
		$card.addClass("hover");
		}
		}
		
		function find_match()
		{
		var hash_tocken_id = $("#hash_tocken_id").val();
		var base_url = $("#base_url").val();
		var url = base_url+"search/home_search";
		var form_data = $("#search_form").serialize();
		form_data = form_data+ "&csrf_new_matrimonial="+hash_tocken_id;	
		
		show_comm_mask();
		$.ajax({
		url: url,
		type: "POST",
		data: form_data,
		dataType:"json",
		success: function(data)
		{ 	
		window.location.href = base_url+"search/result";
		update_tocken(data.tocken);
		hide_comm_mask();
		}
		});
		return false;
		}
		';
	?>	