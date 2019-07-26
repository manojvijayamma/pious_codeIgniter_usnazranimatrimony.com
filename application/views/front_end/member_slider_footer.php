<style>
.owl-carousel > div > a > img {
	height: 180px!important;
	width: 168px!important;
	padding-left:   0!important;
	padding-right:   0!important;
    border: none!important;
}
</style>

<?php
	$base_url = base_url();
	$member_id = $this->common_front_model->get_session_data('matri_id');
	$curre_gender = $this->common_front_model->get_session_data('gender');
	$where_arra=array('is_deleted'=>'No',"status !='UNAPPROVED' and status !='Suspended'");
	if(isset($curre_gender) && $curre_gender !='')
	{
		$where_arra[] = " gender != '$curre_gender' " ;
	}
	$register_data = $this->common_model->get_count_data_manual('register_view',$where_arra,2,'*','id desc',1,8);
	
	
if(isset($curre_gender) && $curre_gender == 'Male'){
	$photopassword_image = $base_url.'assets/images/photopassword_female.png';
}else{
	$photopassword_image = $base_url.'assets/images/photopassword_male.png';
}

	if(isset($register_data) && $register_data !='' && is_array($register_data) && count($register_data) > 0 )
	{	
		$path_photos = $this->common_model->path_photos;
?>
	<div class="xxl-16 xl-16 m-16 l-16 xs-16 s-16 compltele-profile hidden-xs margin-bottom-15 margin-top-20" style="padding-top:0px;padding-bottom:0px;">
        <div class="row" style="padding:4px;">									
            <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 bg-white" style="box-shadow: none;">
                <div class="row">
                    <div class="xxl-16 xl-16 m-16 s-16 l-16 xs-16 ne_myhome_featured-pro margin-bottom-20px">
                        <div class="row text-center margin-top-10">
                            <h3>You might also be interested in these new matching profiles</h3>
                        </div>
                        <div class="carousel slide" data-ride="carousel" id="quote-carousel_2">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="owl-carousel xxl-16 padding-lr-zero">
                                        <?php 
                                        $i=0;
                                        foreach($register_data as $member_data)
                                        {	
                                            if($i!=0 && $i%4==0) 
                                            {
                                                ?>
                                                </div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="owl-carousel xxl-16 padding-lr-zero"><?php
                                                //break;   
                                            }
                                            $i++;
                                        ?> 
                                    <div class="xxl-4 xl-4 l-4 m-4 xs-16 s-16">
                                    
                                    <?php if(isset($member_data['photo1']) && $member_data['photo1'] !='' && $member_data['photo1_approve'] =='APPROVED' && file_exists($path_photos.$member_data['photo1']) && $member_data['photo_view_status']==0){?>
                                    	<a data-toggle="modal" data-target="#myModal_photoprotect" title="Photo Protected" onClick="addstyle('<?php echo $member_id;?>','<?php echo $member_data['matri_id']; ?>')">
                                        	<img src="<?php echo $photopassword_image; ?>" class="xxl-16 xs-16 xl-16 l-16 m-16 s-16 img-responsive success-story-img text-align-center tufelheardstyle" alt="" style="height:166px!important;width:166px!important;"> 
                                    </a>
                                    <?php 
                                    }else{?>
                                        <a href="<?php echo $base_url; ?>search/view-profile/<?php echo $member_data['matri_id'];?>" target="_blank" class="border-shadow-img"><img src="<?php echo $this->common_model->member_photo_disp($member_data);?>" class="xxl-16 xs-16 xl-16 l-16 m-16 s-16 img-responsive success-story-img text-align-center" title="<?php echo $this->common_model->display_data_na($member_data['username']);?>" alt="" style="height:166px!important;width:166px!important;"/></a>
									<?php }?>
				
                        <div class="xxl-16 xl-16 m-16 l-16 s-16 xs-16">
                            <div class="row text-center">
                                <div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16">
                                    <a href="<?php echo $base_url; ?>search/view-profile/<?php echo $member_data['matri_id'];?>" target="_blank" class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 font padding-lr-zero text_slider"><?php echo ucwords($member_data['username']);?></a>
                                </div>
                                <div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16 ne_font_12">
                                    <?php if(isset($member_data['birthdate']) && $member_data['birthdate'] !=''){
											$birthdate = $member_data['birthdate'];
												 echo $this->common_model->birthdate_disp($birthdate,0);
											}
											else{
												echo $this->common_model->display_data_na('');
											}?>, 
										    <?php if(isset($member_data['height']) && $member_data['height'] !=''){
                                                $height = $member_data['height'];
                                                echo $this->common_model->display_height($height);
                                            }
                                            else{
                                                echo $this->common_model->display_data_na('');
                                            }?>,
											<?php if(isset($member_data['weight']) && $member_data['weight'] !=''){
                                                 $weight = $member_data['weight'].' Kg';
                                                 echo $weight;
                                            }
                                            else{
                                                echo $this->common_model->display_data_na('');
                                            }?> 
                                            <?php if(isset($member_data['religion_name']) && $member_data['religion_name'] !=''){ echo $member_data['religion_name'];}else{echo $this->common_model->display_data_na($member_data['religion_name']);}?>, <?php if(isset($member_data['caste_name']) && $member_data['caste_name'] !=''){ echo $member_data['caste_name'];}else{echo $this->common_model->display_data_na($member_data['caste_name']);}?>
                                            </div>
                                            <div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16 ne_font_12">
                                                <?php if(isset($member_data['city_name']) && $member_data['city_name'] !=''){ echo $member_data['city_name'];}else{echo $this->common_model->display_data_na($member_data['country_name']);}?>, <?php if(isset($member_data['country_name']) && $member_data['country_name'] !=''){ echo $member_data['country_name'];}else{echo $this->common_model->display_data_na($member_data['country_name']);}?>
                                            </div>
                                            <div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16 ne_font_12">
                                                <a href="<?php echo $base_url; ?>search/view-profile/<?php echo $member_data['matri_id'];?>" target="_blank" class="underline text_slider">View full Profile</a> <img src="<?php echo $base_url; ?>assets/front_end/images/icon/right-gray-arrow.png" class="right-gray-arrow" alt="view-arrow" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
							  <?php }?>
                            </div>
                        </div>
                    </div>
						<?php if(isset($register_data) && $register_data !='' && count($register_data) > 4){?>
                        <a data-slide="prev" href="#quote-carousel_2" class="left carousel-control" style="color:#F9A630;"><img class="img-circle" src="<?php echo $base_url; ?>assets/front_end/images/icon/arrow-lft-mh.gif" alt=""></a>
                        <a data-slide="next" href="#quote-carousel_2" class="right carousel-control" style="color:#F9A630;"><img class="img-circle" src="<?php echo $base_url; ?>assets/front_end/images/icon/arrow-rgt-mh.gif" alt=""></a>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
	}
?>

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
<?php

$this->common_model->js_extra_code_fr.="
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
	include_once('photo_protect.php'); ?>
<div class="clearfix"></div>