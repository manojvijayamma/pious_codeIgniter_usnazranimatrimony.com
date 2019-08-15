<!------------------<div class="container">----Start------------------------------------>
    <div class="container margin-top-20 box-shadow padding-lr-zero-xs" style="background:rgba(255,255,255,1);border-radius:4px;">
        <div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-20 margin-bottom-15 padding-0-5-xs">
            <div class="xxl-10 xl-10 xs-16 s-16 m-16 l-16 margin-top-20px">
                <div class="alert" style="background:#6AC259;overflow:hidden;box-shadow:4px 4px 0 0 #ccc;margin-bottom:10px;">
					<?php 
						if(isset($success) && $success!= '')
						{ ?>
							<center><h2 class="text-center reg-success text-shadow" style="">Congratulations !</h2></center>
					<?php }
						if(isset($error) && $error!= '')
						{ ?>
							<center><h2 class="text-center reg-success text-shadow" style="">Opps !</h2></center>
					<?php }	?>
                    <hr>
                    <div class="xxl-16 m-16 s-16 xs-16 margin-top-10px">
                        <div class="xxl-2 xl-2 l-2 m-16 xs-16 s-16">
                            <img src="<?php echo $base_url; ?>assets/front_end/images/icon/user-unblock.png" alt="" class="margin-right-10 hidden-sm hidden-xs" />
                        </div>
                        <div class="xxl-13 xl-13 l-13 m-16 xs-16 s-16 xxl-margin-left-1 xl-margin-left-1 margin-top-20">
                            <h4 class="small text-white font-16 text-shadow">
							<?php 
								if(isset($success) && $success!= '')
								{ 
									echo $success;
								}
								if(isset($error) && $error!= '')
								{
									echo $error; 
								}
							?>
							</h4>
                        </div>
                    </div>
                </div>
                <center><img src="<?php echo $base_url; ?>assets/front_end/images/icon/download.png" alt="" class="text-center" /></center>
                <div class="alert alert-info margin-top-10" style="overflow:hidden;box-shadow:4px 4px 0 0 #ccc;margin-bottom:0px;">
                    <div class="xxl-2 xl-2 l-2 m-16 xs-16 s-16 margin-top-10">
                        <img src="<?php echo $base_url; ?>assets/front_end/images/icon/partner.png" alt="" class="margin-right-10 hidden-sm hidden-xs" />
                    </div>
                    <div class="xxl-13 xl-13 l-13 m-16 xs-16 s-16 xxl-margin-left-1 xl-margin-left-1 margin-top-10">
                        <h4 class="text-shadow-black">UPCOMING EVENTS</h4>
                        <p class="small">Now register on events.</p>
                    </div>
                    <center><a href="<?php echo $base_url; ?>event" style="box-shadow:3px 3px 0 0 #ccc; display: inline-block;" class="text-shadow btn btn-info margin-top-10 btn-sm font-15 bold"> Events <i class="fa fa-chevron-right"></i></a></center>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="xxl-4 xl-4 xs-16 m-16 s-16 l-5 xxl-margin-left-1 xl-margin-left-1 margin-bottom-15px border-left" style="overflow:hidden;">
                 <?php
				 	$current_login_user = $this->common_front_model->get_session_data(); 
				 	$login_user_gender = $current_login_user['gender'];
					$where_arra=array('is_deleted'=>'No','status'=>'APPROVED','fstatus'=>'Featured');
					if($login_user_gender=='Male')
					{
						$where_arra['gender'] = 'Female';
					}
					else if($login_user_gender=='Female')
					{
						$where_arra['gender'] = 'Male';
					}
					$featured_profile_data = $this->common_model->get_count_data_manual('search_register_view',$where_arra,2,'matri_id,username,gender,fstatus,birthdate,height,weight,religion_name,caste_name,country_name,city_name,photo1,photo1_approve,','id desc',1,6);
				if(isset($featured_profile_data) && $featured_profile_data !='' && is_array($featured_profile_data) && count($featured_profile_data) > 0 )
				{
					$path_photos = $this->common_model->path_photos;
				?>
                <div class="xxl-16 xl-16 m-16 s-16 l-16 xs-16 ne_myhome_featured-pro margin-bottom-20px margin-top-15px">
                    <div class="carousel slide" data-ride="carousel" id="quote-carousel_2">
                        <div class="carousel-inner">
                        	<?php $i = 0;
							foreach($featured_profile_data as $featured_data)
							{
							?>
                            <div class="item <?php if($i ==0){?>active<?php } ?>">
                                <div class="owl-carousel xxl-16 padding-lr-zero">
                                    <div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16">
                                        <center><a href="<?php echo $base_url; ?>search/view-profile/<?php echo $featured_data['matri_id'];?>" target="_blank" class="border-shadow-img"><img src="<?php echo $this->common_model->member_photo_disp($featured_data);?>" class="xxl-16 xs-16 xl-16 l-16 m-16 s-16 img-responsive success-story-img" title="<?php echo $featured_data['username'];?>" alt="<?php echo $featured_data['username'];?>" /></a></center>
                                        <div class="xxl-16 xl-16 m-16 s-16 l-16 xs-16">
                                            <div class="row text-center">
                                                <div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16">
                                                    <a href="<?php echo $base_url; ?>search/view-profile/<?php echo $featured_data['matri_id'];?>" target="_blank" class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 font padding-lr-zero text_slider"><?php echo $featured_data['username'];?></a>
                                                </div>
                                                <div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16 ne_font_12">
                                                    <?php
                                                    $birthdate = $featured_data['birthdate'];
													echo $this->common_model->birthdate_disp($birthdate,0);
													echo ', ';
													$height = $featured_data['height'];
													echo $this->common_model->display_height($height);
													?>
                                                </div>
                                                <div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16 ne_font_12">
                                                    <?php if(isset($featured_data['city_name']) && $featured_data['city_name'] !=''){ echo $featured_data['city_name'];}else{echo $this->common_model->display_data_na($featured_data['country_name']);}?>, <?php if(isset($featured_data['country_name']) && $featured_data['country_name'] !=''){ echo $featured_data['country_name'];}else{echo $this->common_model->display_data_na($featured_data['country_name']);}?>
                                                </div>
                                                <div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16 ne_font_12">
                                                    <a href="<?php echo $base_url; ?>search/view-profile/<?php echo $featured_data['matri_id'];?>" target="_blank" class="underline text_slider">View full Profile</a> <img src="<?php echo $base_url; ?>assets/front_end/images/icon/right-gray-arrow.png" class="right-gray-arrow" alt="view-arrow" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
							$i++;
							}
							?>
                        </div>
                        <a data-slide="prev" href="#quote-carousel_2" class="left carousel-control" style="color:#F9A630;"><img class="img-circle" src="<?php echo $base_url; ?>assets/front_end/images/icon/arrow-lft-mh.gif"></a>
                        <a data-slide="next" href="#quote-carousel_2" class="right carousel-control" style="color:#F9A630;"><img class="img-circle" src="<?php echo $base_url; ?>assets/front_end/images/icon/arrow-rgt-mh.gif"></a>
                    </div>
                </div>
                <?php 
				}
				?>
                <div class="clearfix"></div>
                
            </div>
            <div class="clearfix"></div>
            <div class="border-top margin-top-20 margin-bottom-10"></div>
            <!--<a href="<?php echo $base_url; ?>my-profile" class="btn btn-sm text-white font-15 bold underline pull-right">View Profile <i class="fa fa-chevron-right"></i></a>-->
        </div>
    </div>
    <script src="<?php echo $base_url; ?>assets/front_end/js/jquery.min.js"></script>		
    <script src="<?php echo $base_url; ?>assets/front_end/js/bootstrap.min.js"></script>
    <script src="<?php echo $base_url; ?>assets/front_end/js/jquery.sticky.js"></script>
	</body>
</html>