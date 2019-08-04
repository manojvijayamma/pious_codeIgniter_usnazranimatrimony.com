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
?>
    <div class="xxl-16 xl-16 m-16 l-16 xs-16 s-16 compltele-profile margin-bottom-15px hidden-sm hidden-xs" style="padding-top:0px;padding-bottom:0px;">
   	 <!-- ===== for Featured Profile ======= -->
    <?php
		$where_arra=array('is_deleted'=>'No','fstatus'=>'Featured',"status !='UNAPPROVED' and status !='Suspended'");
		if($login_user_gender=='Male')
		{
			$where_arra['gender'] = 'Female';
		}
		else if($login_user_gender=='Female')
		{
			$where_arra['gender'] = 'Male';
		}
		$featured_profile_data = $this->common_model->get_count_data_manual('search_register_view',$where_arra,2,'*','id desc',1,6);
	?>
     <!-- ===== for Featured Profile ======= -->
<?php 
if(isset($featured_profile_data) && $featured_profile_data !='' && is_array($featured_profile_data) && count($featured_profile_data) > 0 )
{	
	$path_photos = $this->common_model->path_photos;
     ?>
    <div class="row" style="padding:4px;">
        <div class="upgrade-heading"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/users.png" class="ne_mrg_ri8_10 font-12" alt="" /> Featured Profile
			<?php if(count($featured_profile_data) > 3 )
            { ?>
                <div class="controls pull-right">
                    <a class="nxt_active" href="#quote-carousel" data-slide="prev"></a>
                    <a class="prv_active" href="#quote-carousel" data-slide="next"></a>
                </div>
            <?php } ?>
        </div>
    </div>

<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 bg-white" style="box-shadow: none;">
    <div class="row">
        <div class="xxl-16 xl-16 m-16 s-16 l-16 xs-16 ne_myhome_featured-pro">
            <div class="row">
                <div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16">
                    <div class="row">
                        <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="owl-carousel xxl-16 padding-lr-zero">
                                    <?php $i = 0;
								  		foreach($featured_profile_data as $featured_data)
										{
											if($i!=0 && $i%3==0) 
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
                                        <div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 featured-profile padding-lr-zero">
											<?php
                                            $path_photos = $this->common_model->path_photos;
                                                if(isset($featured_data['photo1']) && $featured_data['photo1'] !='' && $featured_data['photo1_approve'] =='APPROVED' && file_exists($path_photos.$featured_data['photo1']) && $featured_data['photo_password'] !='' && $featured_data['photo_protect'] !='No' && $featured_data['photo_view_status'] == 0){
                                            ?>
                                                    <a data-toggle="modal" data-target="#myModal_photoprotect" onClick="addstyle('<?php echo $login_user_matri_id;?>','<?php echo $featured_data['matri_id']; ?>')" class="border-shadow-img" >
                                                        <img src="<?php echo $photopassword_image; ?>" style="width: 70px !important;height: 70px !important;" class="xxl-6 xs-6 xl-6 l-6 m-6 s-6 img-responsive padding-lr-zero" alt="">
                                                    </a>
                                                  
                                            <?php }else{ ?>
                                                    <img src="<?php echo $this->common_model->member_photo_disp($featured_data);?>" class="xxl-6 xs-6 xl-6 l-6 m-6 s-6 img-responsive padding-lr-zero" title="<?php echo $featured_data['username'];?>" alt="<?php echo $featured_data['matri_id'];?>">
                                            <?php }	?>	
				
                                            <div class="xxl-10 xl-10 m-10 l-10 s-10 xs-10 padding-right-0">
                                                <div class="row">
                                                    <div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16">
                                                        <a href="<?php echo base_url()."search/view-profile/".$featured_data['matri_id']; ?>" target="_blank" class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 font padding-lr-zero text_slider"><?php echo $featured_data['username'];?></a>
                                                    </div>
                                                    <div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16 ne_font_12">
                                                        <?php if(isset($featured_data['birthdate']) && $featured_data['birthdate'] !='')
														{
															 $birthdate = $featured_data['birthdate'];
															 echo $this->common_model->birthdate_disp($birthdate,0);
														}
														else
														{
															echo $this->common_model->display_data_na('');
														}?>, 
                                                  		<?php if(isset($featured_data['height']) && $featured_data['height'] !='')
														{
															$height = $featured_data['height'];
															echo $this->common_model->display_height($height);
														}
														else
														{
															echo $this->common_model->display_data_na('');
														}?>,
														<?php if(isset($featured_data['religion_name']) && $featured_data['religion_name'] !=''){ echo $featured_data['religion_name'];}else{echo $this->common_model->display_data_na($featured_data['religion_name']);}?>
                                                    </div>
                                                    <div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16 ne_font_12">
                                                       <?php if(isset($featured_data['city_name']) && $featured_data['city_name'] !=''){ echo $featured_data['city_name'];}else{echo $this->common_model->display_data_na($featured_data['country_name']);}?>, <?php if(isset($featured_data['country_name']) && $featured_data['country_name'] !=''){ echo $featured_data['country_name'];}else{echo $this->common_model->display_data_na($featured_data['country_name']);}?>
                                                    </div>
                                                    <div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16 ne_font_12">
                                                        <a href="<?php echo base_url()."search/view-profile/".$featured_data['matri_id']; ?>" class="underline text_slider">View full Profile</a> <img src="<?php echo $base_url; ?>assets/front_end/images/icon/right-gray-arrow.png" class="right-gray-arrow" alt="view-arrow" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>    
    <div class="clearfix"></div>
  
 <?php } ?> 
    </div>
   <div id="myModal_new" class="modal_new">
    <span class="close cursor padding-right-10" onclick="closeModal()" style="position:relative;color:#fff !important;opacity:2 !important;">&times;</span>
    <div class="modal-content_new margin-bottom-20px">
	    <div id="slider"></div>
	</div>
	<div class="clearfix"></div>
	<div class="row-center" style="margin-bottom:20px !important;">
		<span class="prev_p" onclick="plusSlides(-1)">&#10094;</span>
		<span class="next_n" onclick="plusSlides(1)">&#10095;</span>
	</div>
</div>
<div class="clearfix"></div>
