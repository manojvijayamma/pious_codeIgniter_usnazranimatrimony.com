<?php 
$path_photos = $this->common_model->path_photos;
$member_id=$this->common_front_model->get_session_data('matri_id');
if(!isset($all_interest_sent_count) || $all_interest_sent_count =='')
{
	$all_interest_sent_count = 0;
}
$mode_exp = $this->express_interest_model->mode_exp;
$mode_exp_status = 'sent';
$rec_status_arr = array('all_receive','accept_receive','reject_receive','pending_receive');
if($mode_exp !='' && in_array($mode_exp,$rec_status_arr))
{
	$mode_exp_status = 'receive';
}
$comm_model = $this->common_model;
$curre_gender = $this->common_front_model->get_session_data('gender');

$where_arra = array('is_deleted' => 'No', "status !='UNAPPROVED' and status !='Suspended'");
if (isset($curre_gender) && $curre_gender != '') {
    $where_arra[] = " gender != '$curre_gender' ";
}

if (isset($curre_gender) && $curre_gender == 'Male') {
    $photopassword_image = $base_url . 'assets/images/photopassword_female.png';
} else {
    $photopassword_image = $base_url . 'assets/images/photopassword_male.png';
}
?>
<div class="row">
    <div class="ne_tab_sub_tab_content ne_interest_sent_tab xxl-16 xl-16 m-16 l-16 s-16 xs-16 tab-content" style="border:0px;">
<?php 
if(isset($all_interest_sent) && $all_interest_sent !='' && is_array($all_interest_sent) && count($all_interest_sent) > 0)
{
?>
	<div class="xxl-16 xl-16 m-16 l-16 xs-16 s-16 ne_pad_btm_10px ne_pad_tp_10px ne_bg_light_grey">
            <div class="row">
                <div class="xxl-16 xl-16 s-16 m-16 l-16 xs-16">
                	<?php
						if($this->session->flashdata('success_message'))
						{
							$success_message = $this->session->flashdata('success_message');
							if($success_message !='')
							{
								echo '<div id="remove_message1" class="alert alert-success  alert-dismissable"><div class="fa fa-check">&nbsp;</div><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>'.$success_message.'</div>';
							}
						}
						if($this->session->flashdata('error_message'))
						{
							$error_message = $this->session->flashdata('error_message');
							if($error_message !='')
							{
								echo '<div id="remove_message2" class="alert alert-danger alert-dismissable"><div class="fa fa-warning"></div><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>'.$error_message.'</div>';
							}
						}						
						//print_r($all_interest_sent);	
					?>
                    <div class="row">
                        <div class="xxl-4 xl-4 xs-8 m-8 s-8 l-6 padding-top-10px">
                            <input type="checkbox" id="<?php echo $mode_exp; ?>_chk" class="ne_mrg_ri8_10 <?php echo $mode_exp.'_all'; ?>" onClick="check_all_exp('<?php echo $mode_exp.'_all'; ?>','<?php echo $mode_exp; ?>')">
                            <label for="<?php echo $mode_exp; ?>_chk" class="margin-left-10"> Select All</label>
                        </div>
                        <div class="xxl-12 xl-12 xs-8 m-8 s-8 l-10">
                            <div class="row">
                            	<?php
								if($mode_exp !='' && in_array($mode_exp,array('reject_receive','pending_receive')))
								{?>
                                <div class="xxl-5 xl-5 xs-16 m-2 s-16 l-2">
                                    <a href="javascript:;" onClick="change_status('accept')" class="text-white btn-block btn-success font-12 exp-sent-btn-accept margin-right-10" title="Accept All">
                                        <i class="fa fa-check font-15"></i><span class="">&nbsp;Accept All</span>
                                    </a>
                                </div>
                                <?php
								}
								if($mode_exp !='' && in_array($mode_exp,array('accept_receive','pending_receive')))
								{
								?>
                                <div class="xxl-5 xl-5 xs-16 m-2 s-16 l-2">
                                    <a href="javascript:;" onClick="change_status('reject')" class="text-white btn-block btn-info font-12 exp-sent-btn-accept margin-right-10" title="Accept All">
                                        <i class="fa fa-ban font-15"></i><span class="">&nbsp;Reject All</span>
                                    </a>
                                 </div>
                                <?php	
								}
								?>
                                 <div class="xxl-5 xl-5 xs-16 m-12 s-16 l-12">
                                
                                    <a href="javascript:;" onClick="change_status('delete','')" class="text-white btn-block btn-danger font-12 exp-sent-btn-accept margin-right-10" title="Delete">
                                        <i class="fa fa-trash font-15"></i><span class="">&nbsp;Delete</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
foreach($all_interest_sent as $all_sent_ei)
{
	$deleted = $all_sent_ei['deleted'];
	$id = $all_sent_ei['id'];
	?>		   
        <div class="xs-16 xl-16 xxl-16 m-16 s-16 ne_result  padding-lr-zero margin-bottom-10px margin-top-20px border-top">
            <div class="row">
                <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne">
                    <div class="">
                        <div class="xxl-1 xl-1 l-1 m-1 s-16 xs-16">
                        	<input type="hidden" id="deleted" name="deleted" value="<?php echo $deleted; ?>">
							
                            	<input type="checkbox" class="pull-left checkbox_val <?php echo $mode_exp; ?>" name="exp_id[]" value="<?php echo $id;?>">
								
                        </div>
                        
                        <div class="margin-top-0px margin-bottom-0px xxl-4 xl-4 l-4 m-8 s-16 xs-16" style="padding:0px;">
                            <a target="_blank" href="<?php echo $base_url;?>search/view-profile/<?php echo $all_sent_ei['matri_id'];?>" class="name-title xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero ne_font_weight_nrm">
                            <?php echo $this->common_model->display_data_na($all_sent_ei['username']);?><span class="user-id"> (<?php echo $this->common_model->display_data_na($all_sent_ei['matri_id']);?>)</span>
                            </a>
                        </div>
                        
                        <div class="xxl-4 xl-4 l-4 m-7 s-16 xs-16">
                            <p class="font-13 text-darkgrey text-center-xs"><?php echo $this->common_model->displayDate($all_sent_ei['sent_date']);?></p>
                        </div>
                        
                        <div class="margin-top-0px margin-bottom-0px xxl-5 xl-5 l-5 m-16 s-16 xs-16">
                            <div class="online-status xxl-16 xl-16 l-16 m-16 s-16 xs-16" style="text-align:left;">
                                <a href="javascript:;" class="ne_exp_sended_detail font-12 text-darkgrey xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero ne_font_weight_nrm text-center-xs margin-top-5-xs">
                                    <i class="ne_mrg_ri8_10 active fa fa-circle"></i>
                                    <span>Last Online : <?php echo $this->common_model->displayDate($all_sent_ei['last_login'],' d M Y');?></span>
                                </a>
                            </div>
                        </div>
                        
                        <div class="xxl-2 xl-2 l-2 m-16 s-16 xs-16">

							<a class="btn-delete" data-toggle="modal" onClick="delete_particulare('<?php echo $id;?>')" data-target="#myModal_delete" title="Delete"><i class="fa fa-trash"></i></a>
						
                        </div>
                        
                        <?php 
						if($deleted=='Yes')
						{?>
							<div style="color:#e35120; padding-left:48px;"><strong>This member does not exist.</strong></div>
						<?php }?>
                        
                    </div>
                </div>
            </div>
            <hr>
            
            <div class="xxl-3 xxl-margin-left-0 xl-3 xl-margin-left-0 xs-12 xs-margin-left-2 l-3 l-margin-left-0 m-5 m-margin-left-0"> 
          
            <?php
				$photo1_disp = $this->common_model->member_photo_disp($all_sent_ei);
				$path_photos = $this->common_model->path_photos;
								
				if (isset($all_sent_ei['photo1']) && $all_sent_ei['photo1'] != '' && $all_sent_ei['photo1_approve'] == 'APPROVED' && file_exists($path_photos . $all_sent_ei['photo1']) && $all_sent_ei['photo_password'] != '' && $all_sent_ei['photo_protect'] != 'No' && $all_sent_ei['photo_view_status'] == 0) {
					?>
                    <a data-toggle="modal" data-target="#myModal_photoprotect" title="Photo Protected" onClick="addstyle('<?php echo $member_id;?>','<?php echo $all_sent_ei['matri_id']; ?>')">
						<img src="<?php echo $photopassword_image; ?>"class="xxl-16 xs-16 xl-16 l-16 m-16 s-16 img-responsive success-story-img text-align-center" title="<?php echo $comm_model->display_data_na($all_sent_ei['username']); ?>" alt="<?php echo $comm_model->display_data_na($all_sent_ei['matri_id']); ?>" style="width:112px; height:112px !important;" >
                </a>
                    
			<?php }
			else
			{?>
            
				<a target="_blank" href="<?php echo $base_url;?>search/view-profile/<?php echo $all_sent_ei['matri_id'];?>" class="ne_exp_sended"><img src="<?php echo $photo1_disp; ?>" class="img-responsive ne_result_img myimg" title="<?php echo $all_sent_ei['username'];?>" alt="" style="width:112px; height:112px !important;" ></a>
				<?php }?>
                <div class="clearfix margin-top-10"></div>
                <div class="text-center">
                	<?php
                    	$class_status  = '';
						if($all_sent_ei['receiver_response'] =='Accepted')
						{
							$class_status = 'fa fa-check';
						}
						else if($all_sent_ei['receiver_response'] =='Rejected')
						{
							$class_status = 'fa fa-ban';
						}
                    ?>
                    <button class="exp-sent-btn btn-block font-13 text-white bg-light-blue" style="cursor:auto">
                    	<i class="<?php echo $class_status; ?>"></i>
						<?php echo ucfirst($all_sent_ei['receiver_response']);?>
                    </button>
                    <?php
						if($mode_exp !='' && in_array($mode_exp,$rec_status_arr) && $all_sent_ei['reminder_status'] =='Yes')
						{
					?>
                    <button class="exp-sent-btn btn-block font-13 text-white bg-light-blue" style="background-color:yellow !important;color:Red !important;margin-top:10px;border-color:red !important;cursor:auto">
                    	<i class="fa fa-bell ne_mrg_ri8_5"></i> Reminder
                    </button>
                    <?php
						}
					?>
                </div>
                <ul class="xxl-16 xl-16 m-16 xs-16 l-16 s-16 padding-lr-zero margin-top-10px margin-bottom-10px neResultBottomIcons"></ul>
            </div> 
            
            <div class="xxl-13 xl-13 l-13 m-11 s-16 xs-16 padding-lr-zero-1199 padding-lr-zero-999 padding-lr-zero-768">
                <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-10px ne-bdr-btm-lgt-grey ne">
                    <div class="row">
                        <div class="xxl-8 xl-8 l-8 m-16 s-16 xs-16">
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
                                                : <?php 
														$birthdate = $this->common_model->birthdate_disp($all_sent_ei['birthdate'],0);
														echo $this->common_model->display_data_na($birthdate);?>, <?php	
														$height = $this->common_model->display_height($all_sent_ei['height']);
														echo $this->common_model->display_data_na($height);
												?>
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
                                            <div class="row">:  <?php echo $this->common_model->display_data_na($all_sent_ei['religion_name']);?>
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
                                                : <?php echo $this->common_model->display_data_na($all_sent_ei['caste_name']);?>
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
                                                : <?php echo $this->common_model->display_data_na($all_sent_ei['mtongue_name']);?>                                                                        		
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="xxl-8 xl-8 l-8 m-16 s-16 xs-16">
                            <div class="row">		
                                <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne_font_12 margin-bottom-6px">
                                    <div class="row">
                                        <div class="xxl-6 xl-6 l-6 m-6 s-6 ne_mrg_ri8_10">
                                            <div class="row label-title">
                                                Education
                                            </div>
                                        </div>
                                        <div class="xxl-9 xl-9 l-9 m-9 s-9 ne-word-wrap">
                                            <div class="row">
                                                : <?php 
												$education = $this->common_model->valueFromId('education_detail',$all_sent_ei['education_detail'],'education_name'); 
												echo $this->common_model->display_data_na($education);
												?>
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
                                                : <?php echo $this->common_model->display_data_na($all_sent_ei['country_name']);?>, <?php echo $this->common_model->display_data_na($all_sent_ei['state_name']);?>, <?php echo $this->common_model->display_data_na($all_sent_ei['city_name'])?>
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
                                                : <?php echo $this->common_model->display_data_na($all_sent_ei['occupation_name']);?>                                                                        		
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>       
                        </div>
                    </div>
                </div>
            
                <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-10">
                    <div class="row">
                        <div class="xxl-10 xl-10 l-10 m-16 s-16 xs-16 border-right">
                            <div class="">
                                <p class="small"><?php echo $all_sent_ei['message'];?></p>
                            </div>
                            <br/><br/>
                        </div>
                        <div class="xxl-6 xl-6 l-6 s-16 m-16 xs-16">
                            <div class="">
                                <?php
								
									if($mode_exp !='' && in_array($mode_exp,array('all_receive','accept_receive','pending_receive')) && $all_sent_ei['receiver_response'] !='Rejected')
									{
										if($deleted=='Yes')
										{
											?><a href="#" data-toggle="modal" data-target="#myModal_deleted" class="text-black btn-block font-12 exp-sent-btn"><span class="fa fa-ban"></span> Reject</a>
											<?php 
										}
										else
										{?>
											<a href="javascript:;" onClick="change_status('reject','<?php echo $id; ?>')" class="text-black btn-block font-12 exp-sent-btn margin-right-10" title="Reject"><span class="fa fa-ban"></span> Reject</a>
									<?php }	
									}
									
									
									if($mode_exp !='' && in_array($mode_exp,array('all_receive','reject_receive','pending_receive')) && $all_sent_ei['receiver_response'] !='Accepted')
									{
										if($deleted=='Yes')
										{
											?><a href="#" data-toggle="modal" data-target="#myModal_deleted" class="text-black btn-block font-12 exp-sent-btn"><span class="fa fa-ban"></span> Accept</a>
											<?php 
										}
										else
										{?>	
											<a href="javascript:;" onClick="change_status('accept','<?php echo $id; ?>')" class="text-black btn-block font-12 exp-sent-btn margin-right-10" title="Accept"><span class="fa fa-ban"></span> Accept</a>
									<?php }
									}
									
									
									if(($mode_exp !='' && in_array($mode_exp,array('pending_sent'))) || ($all_sent_ei['receiver_response'] =='Pending' && $all_sent_ei['reminder_status'] =='No' && $mode_exp =='all_sent'))
									{
										if($deleted=='Yes')
										{
											?><a href="#" data-toggle="modal" data-target="#myModal_deleted" class="text-black btn-block font-12 exp-sent-btn"><span class="fa fa-ban"></span> Accept</a>
											<?php 
										}
										else
										{?>
											<a href="javascript:;" onClick="change_status('reminder','<?php echo $id; ?>')" class="text-black btn-block font-12 exp-sent-btn margin-right-10" title="Send Reminder"><span class="bell"></span> Send Reminder</a>
									<?php }
									}
								?>
                            </div>
                        </div>
                        <div class="xxl-6 xl-6 l-6 s-16 m-16 xs-16 margin-top-10">
                            <div class="">
                                
                                <?php 
								if($deleted=='Yes')
								{
									?><a href="#" data-toggle="modal" data-target="#myModal_deleted" class="text-black btn-block font-12 exp-sent-btn" title="Send Message">
									<?php 
								}
								else
								{	?>
										<a href="#" onClick="message_particulare('<?php echo $all_sent_ei['matri_id']; ?>')" data-toggle="modal" data-target="#myModal_sms" class="text-black btn-block font-12 exp-sent-btn" title="Send Message">
									<?php 
								}?>
                                <span class="sticker_send-sms"></span>Send Message</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
<?php
}
?>
	<div class="clearfix"></div>    
<!-- for pagination-->
<?php
if(isset($all_interest_sent_count) && $all_interest_sent_count !='' && $all_interest_sent_count > 0)
{
?>
	<div class="xxl-16 xl-16 m-16 l-16 xs-16 s-16">
        <div class="row">
<?php
	echo $this->common_model->rander_pagination_front('express_interest/index',$all_interest_sent_count,10);
?>
		</div>
    </div>
<?php
}
?>
<!-- for pagination-->    	
<?php
}
else
{
?>
	<div class="clearfix"></div>
	<div class="alert alert-danger">No Data available</div>
<?php
}
?>
    </div>
</div>


<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id_temp" class="hash_tocken_id" />
<?php
	$this->common_model->js_extra_code_fr.="
	$(document).ready(function () {
		setTimeout(function(){
			$('#remove_message1').hide();
			$('#remove_message2').hide();
		}, 5000);
	});
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