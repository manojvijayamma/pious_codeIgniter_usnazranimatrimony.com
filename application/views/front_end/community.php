<?php
	//include("modal.php");
	$matrimony=explode("-matrimony",$this->uri->segment(2));
	$matrimony_name=$matrimony[0];
	$comm_model = $this->common_model;
	$is_login = $this->common_front_model->checkLogin("return");
	$matri_id = $this->common_model->get_user_id("matri_id");
	//$gender_check = $this->common_model->get_user_id("gender");
	$email_id = $this->common_model->get_user_id("email");
	$user_id = $this->common_model->get_user_id("id");
	$get_user_data = $this->common_model->get_count_data_manual("register_view",array("id"=>$user_id),1);
//echo "<pre>";	print_r($ratting_list);exit;
//print_r($matrimony_name_list_religion);exit;
?>

<div class="container margin-top-20">
	<div class="row">
		<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-20px padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 padding-0-5-xs">
			<!-- for search side bar-->
			<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-5">
			<?php include('register_search_sidebar.php');?>
				<?php include('community_sidebar.php');?>
			</div>
			
			<!-- for search side bar-->
			<!-- for search result -->
			<div class="xxl-12 xl-12 xs-16 m-16 s-16 l-11 ne_myhome_tab ne_com_tab">
			<?php
		
		// photo part 1
		
		
			if(isset($matrimony_cnt) && $matrimony_cnt!='' && $matrimony_cnt > 0 && isset($matrimony_data) && is_array($matrimony_data) && count($matrimony_data) > 0)
			{
				foreach($matrimony_data as $matrimony_data_last) 
				{
					
					$matriidgroom=explode(",",$matrimony_data_last['matri_id_groom']);
					$matriidbride=explode(",",$matrimony_data_last['matri_id_bride']);
				
				?>
			
				<h3 class="main-title">
					<a href="<?php echo base_url();?>" style="color:#000;">Home</a> 
					
					<i class="fa fa-angle-double-right color-black-new"></i>
					
					<a href="<?php echo base_url();?>matrimony/<?php if(isset($matrimony_data_last['matrimony_name']) && $matrimony_data_last['matrimony_name']!=''){ echo str_ireplace(" ","-",$matrimony_data_last['matrimony_name']);}?>-matrimony" style="color:#000;"> 
							<?php if(isset($matrimony_data_last['matrimony_name']) && $matrimony_data_last['matrimony_name']!=''){echo str_replace("-"," ",$matrimony_data_last['matrimony_name']);}?> Matrimony
						</a>  
				</h3>
				<?php
						$path = base_url()."assets/community/banner/".$matrimony_data_last['banner'];

						if(isset($matrimony_data_last['banner']) && $matrimony_data_last['banner']!='' && @getimagesize($path))
						{
						?>	
                    	<img src="<?php echo base_url();?>assets/community/banner/<?php if(isset($matrimony_data_last['banner']) && $matrimony_data_last['banner']!=''){echo $matrimony_data_last['banner'];}?>" style="max-height:300px;width:100%" alt="<?php if(isset($matrimony_data_last['banner']) && $matrimony_data_last['banner']!=''){echo $matrimony_data_last['banner'];}?>"/>
						<?php
						}
						else
						{
						?>
                    	<img src="<?php echo base_url();?>assets/cover_photo/cover_photo.png" style="max-height:300px;width:100%"/>
						<?php
						}
					?>
				<!-- <img data-src="<?php //echo base_url();?>assets/banner/d33980b93b49db00bb1fd640c145b6c1.jpg" class="banner-home-1  img-responsive lazyloaded" src="<?php //echo base_url();?>assets/banner/d33980b93b49db00bb1fd640c145b6c1.jpg" alt="" style="max-height: 300px;
				width: 100%;">	 -->
				
				<div class="back-img-2">
					<div class="">
						<div class="row">
							<div class="xxl-16 xl-12 xs-16 m-16 s-16 l-16">
								<p> 
									<?php if(isset($matrimony_data_last['title']) && $matrimony_data_last['title']!='')
										{
											echo $matrimony_data_last['title'];
										}
										else
										{
											echo "Matrimony";
										}
									?> 
								</p>
							</div>
						</div>
					</div>
				</div>
				<?php include('register_search_sidebar_mob.php');?>
				<div class="row">
					<div class="xxl-16 xl-12 xs-16 m-16 s-16 l-16">
						<h1 class="comm-h2">
						<?php 
									if(isset($matrimony_data_last['matrimony_name']) && $matrimony_data_last['matrimony_name']!='')
									{
										echo str_replace("-"," ",$matrimony_data_last['matrimony_name'])." Matrimony";
									}
									
								?>
						</h1>
						<hr style="margin-top:5px;margin-bottom:10px">
						<p class="cmmup"><?php if(isset($matrimony_data_last['matrimony_description']) && $matrimony_data_last['matrimony_description']!='')
									{echo $matrimony_data_last['matrimony_description'];}?></p>
					</div>
				</div>
				<div class="row">
					<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-320 padding-lr-zero-480 margin-top-10px-320px margin-top-10px-480px ne-mrg-top-10-768 padding-lr-zero-768 padding-0-5-xs">
						<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-15px bg-border">
							<div class="row">
								<div class="xxl-16 xl-16 l-16 xs-16 m-16 s-16  margin-top-10px">
									<div class="panel-heading">
										<ul class="nav nav-tabs">
										<?php
										    //when user login with Male gender then this condition apply	
											if(isset($gender_check) && $gender_check=="Male")
											{
											?>
											<li class="active">
												<a href="#tab1primary" data-toggle="tab"><?php if(isset($matrimony_data_last['matrimony_name']) && $matrimony_data_last['matrimony_name']!=''){echo str_replace("-"," ",$matrimony_data_last['matrimony_name']);}else{ echo "Matrimony";} ?> <b>Female</b></a>
											</li>
											<?php
											}
											elseif(isset($gender_check) && $gender_check=="Female")
											{
												//when user login with Female gender then this condition apply	
											?>
											<li>
												<a href="#tab2primary" data-toggle="tab"><?php if(isset($matrimony_data_last) &&$matrimony_data_last['matrimony_name']!=''){echo str_replace("-"," ",$matrimony_data_last['matrimony_name']);}else{ echo "Matrimony";} ?> <b>Male</b></a>
											</li>
											<?php
											}
											else
											{
												//when user not login then this condition apply 
											?>
											<li class="active">
												<a href="#tab1primary" data-toggle="tab"><?php if(isset($matrimony_data_last['matrimony_name']) && $matrimony_data_last['matrimony_name']!=''){echo str_replace("-"," ",$matrimony_data_last['matrimony_name']);}else{ echo "Matrimony";} ?> <b>Female</b></a>
											</li>
											<li>
												<a href="#tab2primary" data-toggle="tab"><?php if(isset($matrimony_data_last) &&$matrimony_data_last['matrimony_name']!=''){echo str_replace("-"," ",$matrimony_data_last['matrimony_name']);}else{ echo "Matrimony";} ?> <b>Male</b></a>
											</li>
											<?php } ?>
										</ul>
									</div>
									
								</div>
								
							</div>
							
							<div class="clearfix"></div>
							<div class="tab-content" style="background: transparent;
							border:0;
							box-shadow:none;">
							<?php 
							//when user login with Male gender then this condition apply			    
							if(isset($gender_check) && $gender_check=="Male")
							{
							
							?>	
								<div class="tab-pane fade in active" id="tab1primary">
								<?php
								
								//if(isset($matrimony_data_bride_home) && is_array($matrimony_data_bride_home) && count($matrimony_data_bride_home)>0)
								if(isset($data_row_matri_bride) && is_array($data_row_matri_bride) && is_array($data_row_matri_bride) && count($data_row_matri_bride)>0)
								{
										$member_data = $data_row_matri_bride;
										
										$path_photos = $this->common_model->path_photos;
										//foreach ($member_result as $member_data_val) {
										$gender = 'Male';
										include('community_data_view.php');
									
										//}
										?>
										<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 tp-pagination margin-top-20">
										<!-- for pagination-->
										<?php
											if(isset($data_row_matri_bride_count) && $data_row_matri_bride_count !='' && $data_row_matri_bride_count > 5)
											{
												echo $this->common_model->rander_pagination_front("matrimony/".$matrimony_data_last['matrimony_name']."-matrimony",$data_row_matri_bride_count);
											}
										?>
										<!-- for pagination-->
										</div>
								<?php }
								else {
									?>
									<div role="alert" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 alert margin-top-20" style="background:#fcf8e3;border:1px solid #faebcc; color: #8a6d3b;">
										<p class="margin-top-10px margin-bottom-10px">
											No Data found to display.
										</p>
									</div>
								<?php } 
							
							?>
								</div>
							<?php } 		   
								//when user login with Female gender then this condition apply 
								elseif(isset($gender_check) && $gender_check=="Female")
								{
								
								?>
								<div class="tab-pane fade in active" id="tab2primary">
								<?php 
								
								//if(isset($matrimony_data_grrom_home) && is_array($matrimony_data_grrom_home) && count($matrimony_data_grrom_home)>0)
								if(isset($data_row_matri_groom) && is_array($data_row_matri_groom) && count($data_row_matri_groom)>0)
								{
									$member_data = $data_row_matri_groom;
									$path_photos = $this->common_model->path_photos;
									//foreach ($member_result as $member_data_val) {
										$gender = 'Female';
										include('community_data_view.php');
									
									//} 
									?>
										<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 tp-pagination margin-top-20">
										<!-- for pagination-->
										<?php
										if(isset($data_row_matri_groom_count) && $data_row_matri_groom_count !='' && $data_row_matri_groom_count > 5)
										{
										echo $this->common_model->rander_pagination_front_Male("matrimony/community_data/".$matrimony_data_last['matrimony_name']."-matrimony",$data_row_matri_groom_count);
										}
										?>
										<!-- for pagination-->
										</div>
										<?php
								}
								else {
								?>
								<div role="alert" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 alert margin-top-20" style="background:#fcf8e3;border:1px solid #faebcc; color: #8a6d3b;">
									<p class="margin-top-10px margin-bottom-10px">
										No Data found to display.
									</p>
								</div>
							<?php } 
						?>
								</div>
								<?php }
								else{
									//when user not login then this condition apply 
									?>
									
									<div class="tab-pane fade in active" id="tab1primary">
								<?php
								
								//if(isset($matrimony_data_bride_home) && is_array($matrimony_data_bride_home) && count($matrimony_data_bride_home)>0)
								if(isset($data_row_matri_bride) && is_array($data_row_matri_bride) && is_array($data_row_matri_bride) && count($data_row_matri_bride)>0)
								{
										$member_data = $data_row_matri_bride;
										
										$path_photos = $this->common_model->path_photos;
										//foreach ($member_result as $member_data_val) {
										$gender = 'Male';
										include('community_data_view.php');
									
										//}
										?>
										<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 tp-pagination margin-top-20">
										<!-- for pagination-->
										<?php
											if(isset($data_row_matri_bride_count) && $data_row_matri_bride_count !='' && $data_row_matri_bride_count > 5)
											{
												echo $this->common_model->rander_pagination_front("matrimony/".$matrimony_data_last['matrimony_name']."-matrimony",$data_row_matri_bride_count);
											}
										?>
										<!-- for pagination-->
										</div>
								<?php }
								else {
									?>
									<div role="alert" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 alert margin-top-20" style="background:#fcf8e3;border:1px solid #faebcc; color: #8a6d3b;">
										<p class="margin-top-10px margin-bottom-10px">
											No Data found to display.
										</p>
									</div>
								<?php } 
							
							?>
								</div>
								<div class="tab-pane fade" id="tab2primary">
								<?php 
								
								//if(isset($matrimony_data_grrom_home) && is_array($matrimony_data_grrom_home) && count($matrimony_data_grrom_home)>0)
								if(isset($data_row_matri_groom) && is_array($data_row_matri_groom) && count($data_row_matri_groom)>0)
								{
									$member_data = $data_row_matri_groom;
									$path_photos = $this->common_model->path_photos;
									//foreach ($member_result as $member_data_val) {
										$gender = 'Female';
										include('community_data_view.php');
									
									//} 
									?>
										<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 tp-pagination margin-top-20">
										<!-- for pagination-->
										<?php
										if(isset($data_row_matri_groom_count) && $data_row_matri_groom_count !='' && $data_row_matri_groom_count > 5)
										{
										echo $this->common_model->rander_pagination_front_Male("matrimony/community_data/".$matrimony_data_last['matrimony_name']."-matrimony",$data_row_matri_groom_count);
										}
										?>
										<!-- for pagination-->
										</div>
										<?php
								}
								else {
								?>
								<div role="alert" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 alert margin-top-20" style="background:#fcf8e3;border:1px solid #faebcc; color: #8a6d3b;">
									<p class="margin-top-10px margin-bottom-10px">
										No Data found to display.
									</p>
								</div>
							<?php } 
						
							}
								?>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				</div>
			<?php }
			}elseif(isset($matrimony_cnt12) && $matrimony_cnt12 > 0)
			{
				?>			
				<h3 class="main-title">
					<a href="<?php echo base_url();?>" style="color:#000;">Home</a> 
					
					<i class="fa fa-angle-double-right color-black-new"></i>
					
					<a href="<?php echo base_url();?>matrimony" style="color:#000;"> 
						Matrimony		
					</a>  
				</h3>
					<img src="<?php echo base_url();?>assets/cover_photo/cover_photo.png" style="max-height:300px;width:100%"/>
						
				<!-- <img data-src="<?php echo base_url();?>assets/banner/d33980b93b49db00bb1fd640c145b6c1.jpg" class="banner-home-1  img-responsive lazyloaded" src="<?php echo base_url();?>assets/banner/d33980b93b49db00bb1fd640c145b6c1.jpg" alt="" style="max-height: 300px;
				width: 100%;">	 -->
				
				<div class="back-img-2">
					<div class="">
						<div class="row">
							<div class="xxl-16 xl-12 xs-16 m-16 s-16 l-16">
								<p> 
									Matrimony
								</p>
							</div>
						</div>
					</div>
				</div>
				<?php include('register_search_sidebar_mob.php');?>
				<div class="row">
					<div class="xxl-16 xl-12 xs-16 m-16 s-16 l-16">
						<h1 class="comm-h2">
							Matrimony
						</h1>
						<hr style="margin-top:5px;margin-bottom:10px">
						<p class="cmmup">One of India's best known brands and the world's largest matrimonial service was founded with a simple objective - to help people find happiness. The company pioneered online matrimonials in 1996 and continues to lead the exciting matrimony category.</p>
					</div>
				</div>
				<div class="row">
					<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-320 padding-lr-zero-480 margin-top-10px-320px margin-top-10px-480px ne-mrg-top-10-768 padding-lr-zero-768 padding-0-5-xs">
						<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-15px bg-border">
							<div class="row">
								<div class="xxl-16 xl-16 l-16 xs-16 m-16 s-16  margin-top-10px">
									<div class="panel-heading">
										<ul class="nav nav-tabs">
										<?php
										    //when user login with Male gender then this condition apply	
											if(isset($gender_check) && $gender_check=="Male")
											{
											?>
											<li class="active">
												<a href="#tab1primary" data-toggle="tab"><?php if(isset($matrimony_data_last['matrimony_name']) && $matrimony_data_last['matrimony_name']!=''){echo str_replace("-"," ",$matrimony_data_last['matrimony_name']);}else{ echo "Matrimony";} ?> <b>Female</b></a>
											</li>
											<?php
											}
											elseif(isset($gender_check) && $gender_check=="Female")
											{
												//when user login with Female gender then this condition apply	
											?>
											<li>
												<a href="#tab2primary" data-toggle="tab"><?php if(isset($matrimony_data_last) &&$matrimony_data_last['matrimony_name']!=''){echo str_replace("-"," ",$matrimony_data_last['matrimony_name']);}else{ echo "Matrimony";} ?> <b>Male</b></a>
											</li>
											<?php
											}
											else
											{
												//when user not login then this condition apply 
											?>
											<li class="active">
												<a href="#tab1primary" data-toggle="tab"><?php if(isset($matrimony_data_last['matrimony_name']) && $matrimony_data_last['matrimony_name']!=''){echo str_replace("-"," ",$matrimony_data_last['matrimony_name']);}else{ echo "Matrimony";} ?> <b>Female</b></a>
											</li>
											<li>
												<a href="#tab2primary" data-toggle="tab"><?php if(isset($matrimony_data_last) &&$matrimony_data_last['matrimony_name']!=''){echo str_replace("-"," ",$matrimony_data_last['matrimony_name']);}else{ echo "Matrimony";} ?> <b>Male</b></a>
											</li>
											<?php } ?>
										</ul>
									</div>
									
								</div>
								
							</div>
							
							<div class="clearfix"></div>
							<div class="tab-content" style="background: transparent;
							border:0;
							box-shadow:none;">
							<?php 
							//when user login with Male gender then this condition apply			    
							if(isset($gender_check) && $gender_check=="Male")
							{
							
							?>	
								<div class="tab-pane fade in active" id="tab1primary">
								<?php
								
								if(isset($matrimony_data_bride_home) && is_array($matrimony_data_bride_home) && is_array($matrimony_data_bride_home) && count($matrimony_data_bride_home)>0)
								{
										$member_data = $matrimony_data_bride_home;
										
										$path_photos = $this->common_model->path_photos;
										//foreach ($member_result as $member_data_val) {
										$gender = 'Male';
										include('community_data_view.php');
									
										//}
										?>
										<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 tp-pagination margin-top-20">
										<!-- for pagination-->
										<?php
											if(isset($data_row_matri_bride_count) && $data_row_matri_bride_count !='' && $data_row_matri_bride_count > 5)
											{
												echo $this->common_model->rander_pagination_front("matrimony/".$matrimony_data_last['matrimony_name']."-matrimony",$data_row_matri_bride_count);
											}
										?>
										<!-- for pagination-->
										</div>
								<?php }
								else {
									?>
									<div role="alert" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 alert margin-top-20" style="background:#fcf8e3;border:1px solid #faebcc; color: #8a6d3b;">
										<p class="margin-top-10px margin-bottom-10px">
											No Data found to display.
										</p>
									</div>
								<?php } 
							
							?>
								</div>
							<?php } 		   
								//when user login with Female gender then this condition apply 
								elseif(isset($gender_check) && $gender_check=="Female")
								{
								
								?>
								<div class="tab-pane fade in active" id="tab2primary">
								<?php 
								
								if(isset($matrimony_data_grrom_home) && is_array($matrimony_data_grrom_home) && count($matrimony_data_grrom_home)>0)
								{
									$member_data = $matrimony_data_grrom_home;
									$path_photos = $this->common_model->path_photos;
									//foreach ($member_result as $member_data_val) {
										$gender = 'Female';
										include('community_data_view.php');
									
									//} 
									?>
										<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 tp-pagination margin-top-20">
										<!-- for pagination-->
										<?php
										if(isset($data_row_matri_groom_count) && $data_row_matri_groom_count !='' && $data_row_matri_groom_count > 5)
										{
										echo $this->common_model->rander_pagination_front_Male("matrimony/".$matrimony_data_last['matrimony_name']."-matrimony",$data_row_matri_groom_count);
										}
										?>
										<!-- for pagination-->
										</div>
										<?php
								}
								else {
								?>
								<div role="alert" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 alert margin-top-20" style="background:#fcf8e3;border:1px solid #faebcc; color: #8a6d3b;">
									<p class="margin-top-10px margin-bottom-10px">
										No Data found to display.
									</p>
								</div>
							<?php } 
						?>
								</div>
								<?php }
								else{
									//when user not login then this condition apply 
									?>
									
									<div class="tab-pane fade in active" id="tab1primary">
								<?php
								
								//if(isset($matrimony_data_bride_home) && is_array($matrimony_data_bride_home) && count($matrimony_data_bride_home)>0)
								if(isset($matrimony_data_bride_home) && is_array($matrimony_data_bride_home) && is_array($matrimony_data_bride_home) && count($matrimony_data_bride_home)>0)
								{
										$member_data = $matrimony_data_bride_home;
										
										$path_photos = $this->common_model->path_photos;
										//foreach ($member_result as $member_data_val) {
										$gender = 'Male';
										include('community_data_view.php');
									
										//}
										?>
										<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 tp-pagination margin-top-20">
										<!-- for pagination-->
										<?php
											if(isset($data_row_matri_bride_count) && $data_row_matri_bride_count !='' && $data_row_matri_bride_count > 5)
											{
												echo $this->common_model->rander_pagination_front("matrimony/".$matrimony_data_last['matrimony_name']."-matrimony",$data_row_matri_bride_count);
											}
										?>
										<!-- for pagination-->
										</div>
								<?php }
								else {
									?>
									<div role="alert" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 alert margin-top-20" style="background:#fcf8e3;border:1px solid #faebcc; color: #8a6d3b;">
										<p class="margin-top-10px margin-bottom-10px">
											No Data found to display.
										</p>
									</div>
								<?php } 
							
							?>
								</div>
								<div class="tab-pane fade" id="tab2primary">
								<?php 
								
								//if(isset($matrimony_data_grrom_home) && is_array($matrimony_data_grrom_home) && count($matrimony_data_grrom_home)>0)
								if(isset($matrimony_data_grrom_home) && is_array($matrimony_data_grrom_home) && count($matrimony_data_grrom_home)>0)
								{
									$member_data = $matrimony_data_grrom_home;
									$path_photos = $this->common_model->path_photos;
									//foreach ($member_result as $member_data_val) {
										$gender = 'Female';
										include('community_data_view.php');
									
									//} 
									?>
										<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 tp-pagination margin-top-20">
										<!-- for pagination-->
										<?php
										if(isset($data_row_matri_groom_count) && $data_row_matri_groom_count !='' && $data_row_matri_groom_count > 5)
										{
										echo $this->common_model->rander_pagination_front_Male("matrimony/".$matrimony_data_last['matrimony_name']."-matrimony",$data_row_matri_groom_count);
										}
										?>
										<!-- for pagination-->
										</div>
										<?php
								}
								else {
								?>
								<div role="alert" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 alert margin-top-20" style="background:#fcf8e3;border:1px solid #faebcc; color: #8a6d3b;">
									<p class="margin-top-10px margin-bottom-10px">
										No Data found to display.
									</p>
								</div>
							<?php } 
						
							}
								?>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
                </div>
				
							<?php
						}
						else{
				?>
				<h3 class="main-title">
					<a href="<?php echo base_url();?>" style="color:#000;">Home</a> 
					
					<i class="fa fa-angle-double-right color-black-new"></i>
					<?php
						$matname_show=explode("-matrimony",$this->uri->segment(2));
						$rr=str_replace("-"," ",$matname_show[0])." Matrimony";
					?>
					<a href="<?php echo base_url();?>matrimony/<?php echo $this->uri->segment(2);?>" style="color:#000;"> 
							
					<?php  echo $rr;?> 
							
						</a>  
				</h3>
				<div role="alert" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 alert margin-top-20" style="background:#fcf8e3;border:1px solid #faebcc; color: #8a6d3b;">
					<p class="margin-top-10px margin-bottom-10px">
						No Data found to display.
					</p>
				</div>
				<?php } include('community_sidebar_mob.php');?>
			
			</div>
	</div>
</div>
</div>
<br>
<br>		
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
	load_pagination_code_community();
";
 include_once('photo_protect.php'); ?>																																																																																																															