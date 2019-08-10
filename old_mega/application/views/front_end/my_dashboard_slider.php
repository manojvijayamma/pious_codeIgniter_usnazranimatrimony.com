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
                //$field_array = $this->common_front_model->field_percentage_array();
				$field_array = $this->common_front_model->dashboard_slide_fill_filed_array();
			?>
                <div class="carousel slide" data-ride="carousel" id="quote-carousel_slide">
                    <div class="carousel-inner">
                    <?php 
						$i = 0;	
						$first_tab_active = 'active';
						foreach($field_array as $fields=>$val_arr)
                        {
							$point_plus = 0;
							$temp_label_array = array();
							foreach($val_arr as $key_c=>$val_per)
							{
								if(($key_c =='no_of_brothers' && $login_user_data[$key_c] =='0') || ($key_c =='no_of_sisters' && $login_user_data[$key_c] =='0'))
								{
									continue;
								}
								if(isset($login_user_data[$key_c]) && (trim($login_user_data[$key_c]) =='' || ($login_user_data[$key_c] =='0')) || $login_user_data[$key_c] == NULL)
								{
									$point_plus = $point_plus + $val_per;
									$temp_label_array[] = $this->common_model->get_label('',$key_c);
								}
							}
							if($point_plus > 0)
							{
								$temp_label_str = implode(', ',$temp_label_array);
								$i++;
					?>
                    	<div class="item <?php echo $first_tab_active; ?>">
                         	<div class="xxl-3 xl-3 xs-16 m-16 s-16 l-3 margin-top-10">
                                <p class="profile-update-img4"></p>
                            </div>
                            <div class="xxl-13 xl-13 xs-16 m-16 s-16 l-13">
                            	 <p class="bold small">Add your <?php echo str_replace(array('-','Part '),array(' ','Partner '),$this->common_model->get_label('',$fields));?>. <span class="text-green">(+<?php echo $point_plus; ?>%)</span></p>
                                 <div class="xxl-16 xl-15 xs-16 s-16 m-16 l-16 margin-top-10" style="padding:5px 5px 0 0px;">
                                 <?php 
								 $temp_label_str = str_replace('Part ','Partner ',$temp_label_str);
								 if(in_array($fields,array('cover-photo','horoscope-photo','photo','id-proof')))
								 {
									 if($fields == 'cover-photo')
									 {
										 ?>
	                                         <a href="<?php echo $base_url.'upload/cover-photo';?>">Click to upload Cover Photo</a>
                                         <?php
									 }
									 else if($fields == 'horoscope-photo')
									 {
										 ?>
	                                         <a href="<?php echo $base_url.'upload/horoscope';?>">Click to upload Horoscope</a>
                                         <?php
									 }
									 else if($fields == 'id-proof')
									 {
										 ?>
	                                         <a href="<?php echo $base_url.'upload/id-proof';?>">Click to upload ID Proof</a>
                                         <?php
									 }
									 else if($fields == 'photo')
									 {
										 ?>
	                                         <a href="<?php echo $base_url.'modify-photo';?>">Click to Upload Photo</a>
                                         <?php
									 }
								 }
								 else
								 {
									 echo $temp_label_str.'<br/>';
								 ?>
                                 <a href="<?php echo $base_url.'my-profile/edit-profile/'.$fields ?>">Click to Edit Detail</a>
                                 <?php
                                 }
                                 ?>
                                 </div>
                            </div>
                         </div>
                    <?php 
								$first_tab_active ='';
							}
						}
					?>
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
                        
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 compltele-profile compltele-profile_mobile margin-top-10-xs margin-1024-768" style="padding:4px 4px;width:30%;margin-left:10px;">
                            <div class="">
                                <div class="upgrade-heading"><i class="fa fa-user"></i> Profile Completeness</div>
                                    <div class="todo-percentage" id="progress_bar" data-percent="<?php echo $percentage_stored;?>"></div>
                                <div class="upgrade-footer"><div class="todo-value"> <span class="todo-done"><?php echo $percentage_stored; ?>% Complete</span> | <span class="todo-pending"><?php echo 100 -$percentage_stored; ?>% Remaining </span> </div></div>
                            </div>
                        </div>
                    </div>