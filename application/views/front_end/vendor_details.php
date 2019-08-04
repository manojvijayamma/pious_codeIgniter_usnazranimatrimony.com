<?php $id_details = $wedding_planner_item['id'];?>
<style> .top-links li a { font-size: 12px; color: #ffffff; text-transform: uppercase; font-weight: 500;} </style>
<!-- ===== <div class="container"> =====Start===== -->
	<div class="tp-page-head">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-2 col-md-8">
						<div class="page-header text-center">
							
                            <div class="icon-circle"> <i class="icon icon-size-60  icon-list icon-white"></i> </div>
							<h1>Wedding Planner</h1>
							<p class="text-white text-center">Your vision. Our innovation. Wedding solutions.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="main-container">
			<div class="container tabbed-page st-tabs">
				<div class="row tab-page-header">
					<div class="col-md-7 title" style="word-break: break-word"> <a href="javascript:;" class="label-primary"><?php echo $this->common_model->display_data_na($wedding_planner_item['category_name']);?></a>
						<h1><?php echo $this->common_model->display_data_na($wedding_planner_item['title']);?></h1>
						<p class="location"><i class="fa fa-map-marker"></i><?php echo $this->common_model->display_data_na($wedding_planner_item['address']);?></p>
						<hr>
						<?php 
						if(isset($wedding_planner_reviews_count) && $wedding_planner_reviews_count > 0){
							$where_arra__count=array('vendor_id'=>$id_details,'is_deleted'=>'No','status'=>'APPROVED');
							$reviews_count = $this->common_model->get_count_data_manual('vendor_reviews',$where_arra__count,1,'sum(r_star) as reviews_count','id desc','');
							
							$total = $wedding_planner_reviews_count*5;
							$average = $reviews_count['reviews_count']/$total*5; 
						}else{
							$average = 0;
						}
						?>
						<div class="rating">
						<?php if($average > 0 && $average <= 1.5){?>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i> 
						<?php }elseif($average > 1.5 && $average <= 2.5){ ?>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
						<?php }elseif($average > 2.5 && $average <= 3.5){ ?>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
						<?php }elseif($average > 3.5 && $average <= 4.5){ ?>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
						<?php }elseif($average > 4.5 && $average <= 5){ ?>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						<?php }else{ ?>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
						<?php } ?>
						</div>
					</div>
					<div class="col-md-5 venue-data">
						<div class="venue-info">
							<div class="capacity">
								<div class="font-10-m">Capacity People:</div>
								<span class="cap-people font-12-m"><?php echo $this->common_model->display_data_na($wedding_planner_item['capacity']);?></span> 
							</div>
							<div class="pricebox">
								<div class="font-10-m">Avg price:</div>
								<span class="price font-12-m"><?php echo $wedding_planner_item['currency'];?><?php echo $wedding_planner_item['start_rate_range'];?> - <?php echo $wedding_planner_item['currency'];?><?php echo $wedding_planner_item['end_rate_range'];?></span>
							</div>
						</div>
						<a href="#inquiry" class="btn  btn-lg btn-block">Book Venue</a> 
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active">
								<a href="#photo" title="Gallery" aria-controls="photo" role="tab" data-toggle="tab"> <i class="fa fa-photo"></i> <span class="tab-title">Photo</span></a>
							</li>
							<li role="presentation">
								<a href="#about" title="about info" aria-controls="about" role="tab" data-toggle="tab">
									<i class="fa fa-info-circle"></i>
									<span class="tab-title">About</span>
								</a>
							</li>
							<!-- <li role="presentation">
								<a href="#onmap" title="Location" aria-controls="onmap" role="tab" data-toggle="tab"> <i class="fa fa-map-marker"></i> <span class="tab-title">On map</span></a>
							</li> -->
							<!--<li role="presentation">
								<a href="#video" title="Video" aria-controls="video" role="tab" data-toggle="tab"> <i class="fa fa-youtube-play"></i> <span class="tab-title">Video</span></a>
							</li>
							<li role="presentation">
								<a href="#amenities" title="Amenities" aria-controls="amenities" role="tab" data-toggle="tab"> <i class="fa fa-asterisk"></i> <span class="tab-title">Amenities</span></a>
							</li>-->
							<li role="presentation">
								<a href="#reviews" title="Review" aria-controls="reviews" role="tab" data-toggle="tab"> <i class="fa fa-commenting"></i> <span class="tab-title">Reviews</span></a>
							</li>
						</ul>
						
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="photo">
								<div id="sync1" class="owl-carousel">
			<?php $images = array('image'=>$wedding_planner_item['image'],
									'image_2'=>$wedding_planner_item['image_2'],
									'image_3'=>$wedding_planner_item['image_3'],
									'image_4'=>$wedding_planner_item['image_4'],
									'image_5'=>$wedding_planner_item['image_5']);			
				  $path_wedding = $this->common_model->path_wedding;
				  
				foreach($images as $image_val) 
				{	
				 	if(isset($image_val) && $image_val !='' && file_exists($path_wedding.$image_val))
					{ ?>
                                    <div class="item">
                                    	<div class="col-md-2 text-center margin-top-20">
										</div>
										<div class="col-md-8 row">
											<img src="<?php echo $base_url; ?><?php echo $path_wedding;?><?php echo $image_val;?>" style="width:721px; height:406px;" alt="" class="img-responsive border box-shadow"> 
										</div>
										<div class="col-md-2 text-center margin-top-20">
										</div>
									</div>
			 <?php }
				} ?>
								</div>
								<div id="sync2" class="owl-carousel margin-top-10">
                                
             <?php foreach($images as $image_val) 
					{		
						if(isset($image_val) && $image_val !='' && file_exists($path_wedding.$image_val))
						{ ?>
									<div class="item"> <img src="<?php echo $base_url; ?><?php echo $path_wedding;?><?php echo $image_val;?>" style="width:170px; height:98px;" alt="" class="img-responsive border box-shadow"></div>
                  <?php }
					} ?> 			
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="about">
								<div class="venue-details">
									<h2>Description</h2>
								<?php 
									if(isset($wedding_planner_item['description']))
									{
										echo $wedding_planner_item['description'];
									}
									?>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="onmap">
								<div id="googleMap" class="map"></div>
							</div>
						<!--<div role="tabpanel" class="tab-pane fade" id="video">
								<div class="embed-responsive embed-responsive-16by9">
									<a href="javascript:void(0)"><img src="<?php //echo $base_url; ?>assets/front_end/images/video.jpg" alt="" class="img-responsive"></a>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="amenities">
								<div class="row">
									<div class="col-md-6 venue-amenities">
										<h2>Venue Facilities</h2>
										<ul class="check-circle list-group">
											<li class="list-group-item">Wedding Hall </li>
											<li class="list-group-item">Dining </li>
											<li class="list-group-item">Liability Insurance </li>
											<li class="list-group-item">In House Catering</li>
											<li class="list-group-item">Dining </li>
											<li class="list-group-item">DJ Facilities </li>
											<li class="list-group-item">Personal Chef</li>
											<li class="list-group-item">Guest Parking</li>
											<li class="list-group-item">Seating Amenities</li>
										</ul>
									</div>
								</div>
							</div>-->
							<div role="tabpanel" class="tab-pane fade" id="reviews">
								<div class="customer-review">
									<div class="row">
										<div class="col-md-12">
										<?php if($wedding_planner_reviews_count > 0){ ?>
											<h1>Couples Review</h1>
											<div class="review-list">
											
											<?php 
												foreach($wedding_planner_reviews as $rows_reviews) 
												{		
											?>
												<div class="row">
													<!--<div class="col-md-2 col-sm-2 hidden-xs">
														<div class="user-pic"> <img class="img-responsive img-circle" src="<?php echo $base_url; ?>assets/front_end/images/userpic.jpg" alt=""> </div>
													</div>
													<div class="col-md-10 col-sm-10">-->
													<div class="col-md-12 col-sm-12">
														<div class="panel panel-default arrow left">
															<div class="panel-body">
																<div class="text-left">
																	<h3><?php echo $rows_reviews['r_title'];?></h3>
													<div class="rating">
													<?php //echo $rows_reviews['r_star'];
														if($rows_reviews['r_star'] == '1'){
													?>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
													<?php }elseif($rows_reviews['r_star'] == '2'){?>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
													<?php }elseif($rows_reviews['r_star'] == '3'){?>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
													
													<?php }elseif($rows_reviews['r_star'] == '4'){?>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
													<?php }elseif($rows_reviews['r_star'] == '5'){?>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													<?php }?>	
													</div>
																</div>
																<div class="review-post">
																	<p><?php echo $rows_reviews['r_message'];?> </p>
																</div>
																<div class="review-user">By <a href="javascript:;"><?php echo $rows_reviews['r_name'];?></a>, on <span class="review-date"></span><?php echo $newDate = date('d F Y', strtotime($rows_reviews['r_date']));?></div>
															</div>
														</div>
													</div>
												</div>
											<?php } ?> 
											</div>
											<?php }else{ ?>
												<div class="row-center">
													<h2 style="padding: 15px 0;color: #3121f8 !important;/*border: 1px ridge #3121f8 !important;*/">
														There is no any review..!!!
													</h2>
												</div>
											<?php } ?> 
											
										<div class="review"> <a class="btn tp-btn-primary btn-block tp-btn-lg" role="button" data-toggle="collapse" href="#review" aria-expanded="false" aria-controls="review"> Write A Review </a> </div>
											<div class="collapse review-list review-form" id="review">
											
											
												<div class="panel panel-default">
													<div class="panel-body">
														<h1>Write Your Review</h1>
														<div class="alert alert-success" id="review_success_message"  style="display:none"></div>
														<form class="margin-top-20" action="<?php echo $base_url; ?>wedding_vendor/send_review/<?php echo $id_details ;?>" method="post" name="review_form" id="review_form" enctype="multipart/form-data">
															<div class="rating-group">
																<div class="radio radio-success radio-inline">
																	<input type="radio" name="r_star" id="radio1" value="1">
																	<label for="radio1" class="radio-inline"> <span class="rating"><i class="fa fa-star"></i></span> </label>
																</div>
																<div class="radio radio-success radio-inline">
																	<input type="radio" name="r_star" id="radio2" value="2">
																	<label for="radio2" class="radio-inline"> <span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i></span> </label>
																</div>
																<div class="radio radio-success radio-inline">
																	<input type="radio" name="r_star" id="radio3" value="3">
																	<label for="radio3" class="radio-inline"> <span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> </label>
																</div>
																<div class="radio radio-success radio-inline">
																	<input type="radio" name="r_star" id="radio4" value="4">
																	<label for="radio4" class="radio-inline"> <span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> </label>
																</div>
																<div class="radio radio-success radio-inline">
																	<input type="radio" name="r_star" id="radio5" value="5">
																	<label for="radio5" class="radio-inline"> <span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> </label>
																</div>
															</div>
															
															<div class="form-group">
																<label class=" control-label" for="r_name">Name<span class="required">*</span></label>
																<div class="">
																	<input id="r_name" name="r_name" type="text" placeholder="Name" class="form-control input-md" required/>
																</div>
															</div>
															
															<div class="form-group">
																<label class=" control-label" for="r_email">E-Mail<span class="required">*</span></label>
																<div class="">
																	<input type="email" id="r_email" name="r_email" placeholder="E-Mail" class="form-control input-md" required/>
																</div>
															</div>
															
															<div class="form-group">
																<label class=" control-label" for="r_title">Review Title<span class="required">*</span></label>
																<div class=" ">
																	<input id="r_title" name="r_title" type="text" placeholder="Review Title" class="form-control input-md" required/>
																</div>
															</div>
															
															<div class="form-group">
																<label class=" control-label">Write Review<span class="required">*</span></label>
																<div class="">
																	<textarea class="form-control" name="r_message" id="r_message" rows="8" placeholder="Write your Review" required></textarea>
																</div>
															</div>
														<div class="form-group">
															<div style="float:left;width:20%">
																<img style="float:left;" alt="captch-code" src="<?php echo $base_url; ?>captcha.php?captch_code_front=yes&captch_code=<?php echo $this->session->userdata['captcha_vendor']; ?>"/>
															</div>
															<div style="float:left;width:50%">
																<input  type="number" name="code_captcha" id="code_captcha" class="font-weight-normal text-grey form-control" placeholder="Enter Captcha Code" value="" required /> 
															</div>
															</div>
														<div class="clearfix"><br/></div>
															<div class="form-group">
																<!--<a name="submit" onclick="submit_review_form()" class="btn tp-btn-default tp-btn-lg">Submit Review</a>-->
																<button type="submit" class="btn tp-btn-default tp-btn-lg">Submit Review</button>
															</div>
															<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" />
														</form>
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
				<div class="row">
					<div class="col-md-8">
						<div class="side-box" id="inquiry">
                        	
                        <?php	
							
								if($this->session->flashdata('email_success_message'))
								{
								?>
								<div class="alert alert-success"><?php
									echo $this->session->flashdata('email_success_message'); ?>
								</div>
								<?php
									}
								?>
								<?php
									if($this->session->flashdata('email_error_message'))
									{
								?>
								<div class="alert alert-danger">
									<?php echo $this->session->flashdata('email_error_message'); ?>
								</div>
								<?php
									}
								?>
                            <div class="alert alert-success" id="email_success_message"  style="display:none"></div>
                            <div class="alert alert-danger" id="email_error_message" style="display:none"></div>    
                            <div class="clearfix"><br/></div>
							<h2>Send Enquiry to Vendor</h2>
							<p>Fill in your details and a Venue Specialist will get back to you shortly.</p>
							<form class="margin-top-20" action="<?php echo $base_url; ?>wedding_vendor/send_enquiry_to_planner/<?php echo $id_details ;?>" method="post" name="enquiry_form" id="enquiry_form" enctype="multipart/form-data">
								<div class="form-group">
									<label class="control-label" for="name">Name:<span class="required">*</span></label>
									<div class="">
										<input id="name" name="name" type="text" placeholder="Name" class="form-control input-md" required/>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label" for="phone">Phone:<span class="required">*</span></label>
									<div class="row">
                                        <div class="col-md-3 col-xs-12">
                                            <select name="country_code" id="country_code" class="form-control select2">
                                                <?php echo $this->common_model->country_code_opt('+91');?>
                                            </select>
                                        </div>
                                        <div class="col-md-9 col-xs-12 margin-top-10-vd">
                                            <input id="phone" name="phone" type="number" placeholder="Phone" class="form-control input-md" minlength="8" maxlength="12" required="required" />
                                            <span class="help-block"> </span> 
                                        </div>
                                	</div>
								</div>
								
								<div class="form-group">
									<label class="control-label" for="email">E-Mail:<span class="required">*</span></label>
									<div class="">
										<input id="email" name="email" type="email" placeholder="E-Mail" class="form-control input-md" required/>
									</div>
								</div>
								
								<div class="default-calender">
									<div class="form-group">
										<label class="control-label" for="weddingdate">Wedding Date<span class="required">*</span></label>
										<div class="">
											<div class="form-group input-group">
												<input type="text" class="form-control" name="weddingdate" id="weddingdate" placeholder="Wedding Date" required readonly/>
												<span class="input-group-addon" id="basic-addon2"><i class="fa fa-calendar"></i></span> 
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label" for="guest">Number of Guests:<span class="required">*</span></label>
									<div class="">
										<select id="guest" name="guest" class="form-control" style="border:1px solid #dfe0e3;" required>
											<option value="">Select</option>
											<option value="50 to 100">50 to 100</option>
											<option value="101  to 150">101  to 150</option>
											<option value="151 to 200">151 to 200</option>
											<option value="200 and above">200 and above</option>
										</select>
									</div>
								</div>
                                <div class="default-calender">
									<div class="form-group">
										<label class="control-label" for="weddingdate">Description<span class="required">*</span></label>
										<div class="">
											<div >
                                            	<textarea class="form-control" name="description" id="description" rows="5" required ></textarea>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
								<div class="row">
                                    <div class="col-md-3 col-xs-12">
                                    	<img style="float:left;" alt="captch-code" src="<?php echo $base_url; ?>captcha.php?captch_code_front=yes&captch_code=<?php echo $this->session->userdata['captcha_vendor']; ?>" />
                                    </div>
                                    <div class="col-md-9 col-xs-12 margin-top-10-vd">
                                    <input  type="number" name="code_captcha" id="code_captcha" class="font-weight-normal text-grey form-control" placeholder="Enter Captcha Code" value="" required /> 
                                    </div>
                                    </div>
                                </div>
                                <div class="clearfix"><br/></div>
								<div class="form-group">
									<label class="control-label">Send me info via</label>
									<div class="checkbox checkbox-success">
										<input type="checkbox" name="send_inq_info[]" id="checkbox-0" value="E-Mail" class="styled">
										<label for="checkbox-0" class="control-label"> E-Mail </label>
									</div>
									<div class="checkbox checkbox-success">
										<input type="checkbox" name="send_inq_info[]" id="checkbox-1" value="Need Call back" class="styled">
										<label for="checkbox-1" class="control-label"> Need Call back </label>
									</div>
								</div>
								<div class="form-group margin-top-20">
                                
						<!--<a name="submit" class="btn  btn-lg btn-block"><i class="fa fa-check"></i> Book MY Venue now</a>-->
                   					<button type="submit" class="btn  btn-lg btn-block "><i class="fa fa-check"></i> Book MY Venue now</button>
								</div>
                                 <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" />
							</form>
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="profile-sidebar side-box">
							<div class="profile-userpic"> 
								<img src="<?php if(file_exists($this->common_model->path_wedding.$wedding_planner_item['image'])){ echo $base_url.$this->common_model->path_wedding.$wedding_planner_item['image']; }else{ echo $base_url.'assets/images/no_image.jpg'; }?>" style="width:154px; height:154px;" class="img-responsive img-circle" alt="profile_user" /> 
							</div>
							<div class="profile-usertitle" style="word-break: break-word">
								<div class="profile-usertitle-name">
									<h2><?php if(isset($wedding_planner_item['planner_name'])) {echo $wedding_planner_item['planner_name'];}?></h2>
								</div>
								<?php if(isset($wedding_planner_item['address']) && $wedding_planner_item['address'] != '') {?>
								<div class="profile-address"> <i class="fa fa-map-marker"></i><?php echo $wedding_planner_item['address'];?> </div>
								<?php } ?>
								
								<?php if(isset($wedding_planner_item['mobile']) && $wedding_planner_item['mobile'] != '') {?>
                                <div class="profile-address"> <i class="fa fa-mobile-phone"></i><?php if(isset($wedding_planner_item['mobile'])) {echo $wedding_planner_item['mobile'];}?> </div>
								<?php } ?>
								
								<?php if(isset($wedding_planner_item['email']) && $wedding_planner_item['email'] != '') {?>
								
                                <div class="profile-website"> <i class="fa fa-envelope"></i><?php if(isset($wedding_planner_item['email'])) {echo $wedding_planner_item['email'];}?></div> 
								<?php } ?>
								
								<?php if(isset($wedding_planner_item['website']) && $wedding_planner_item['website'] != '') {?>
								<div class="profile-website"> <i class="fa fa-link"></i> <a href="<?php if(isset($wedding_planner_item['website'])) {echo $wedding_planner_item['website'];}?>"><?php if(isset($wedding_planner_item['website'])) {echo $wedding_planner_item['website'];}?></a> </div>
								<?php } ?>
							</div>
						</div>
					</div>
					
					
					<?php if((isset($wedding_planner_item['facebook_link']) && $wedding_planner_item['facebook_link'] != '') || (isset($wedding_planner_item['google_link']) && $wedding_planner_item['google_link'] != '') || (isset($wedding_planner_item['linkedin_link']) && $wedding_planner_item['linkedin_link'] != '') || (isset($wedding_planner_item['twitter_link']) && $wedding_planner_item['twitter_link'] != '')){ ?>
					
					<div class="col-md-4 text-center">
						<div class="social-sidebar side-box">
							<ul class="listnone follow-icon">
								<?php if(isset($wedding_planner_item['facebook_link']) && $wedding_planner_item['facebook_link'] != ''){ ?>
									<li><a href="<?php if(isset($wedding_planner_item['facebook_link'])){ echo $wedding_planner_item['facebook_link']; }?>" data-toggle="tooltip" title="Facebook"><i class="fa fa-facebook-square" style="color: #4267b2 !important;"></i></a></li>
								<?php } ?>
								<?php if(isset($wedding_planner_item['google_link']) && $wedding_planner_item['google_link'] != ''){ ?>
									<li><a href="<?php if(isset($wedding_planner_item['google_link']))  {echo $wedding_planner_item['google_link'];}?>" data-toggle="tooltip" title="Google-Plus"><i class="fa fa-google-plus-square" style="color: #CC3333 !important;"></i></a></li>
								<?php } ?>
								<?php if(isset($wedding_planner_item['linkedin_link']) && $wedding_planner_item['linkedin_link'] != ''){ ?>
									<li><a href="<?php if(isset($wedding_planner_item['linkedin_link'])){echo $wedding_planner_item['linkedin_link'];}?>" data-toggle="tooltip" title="Linkedin"><i class="fa fa-linkedin-square" style="color: #0077B5 !important;"></i></a></li>
								<?php } ?>
								<?php if(isset($wedding_planner_item['twitter_link']) && $wedding_planner_item['twitter_link'] != ''){ ?>
									<li><a href="<?php if(isset($wedding_planner_item['twitter_link'])) {echo $wedding_planner_item['twitter_link'];}?>" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter-square" style="color: #38A1F3 !important;"></i></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
<!-- ===== <div class="container"> End===== -->
	<div class="margin-top-80"></div>
   
<?php
	$map_address = $wedding_planner_item['address'];
	$map_address = str_replace("\n", "", $map_address);
	$map_address = str_replace("\r", "", $map_address);

	$map_location = $wedding_planner_item['map_location'];
	$map_location = str_replace("\n", "", $map_location);
	$map_location = str_replace("\r", "", $map_location);

	$wedding_planner_item['address'] = $map_address;
	$wedding_planner_item['map_location'] = $map_location;
	
	$htpp_web = 'http';
	if(strpos(base_url(),'https') === false)
	{
		
	}
	else
	{
		$htpp_web = 'https';
	}
?>
<script src="<?php echo $htpp_web; ?>://maps.googleapis.com/maps/api/js?key=AIzaSyArZ7otxoqUtWWNbIW9-vBst3uevYRan7g"></script>

<?php
	$this->common_model->js_extra_code_fr.="
	(function($){
		$(document).ready(function(){
			$('#googleMap').gMap({
				maptype: 'ROADMAP',
				scrollwheel: false,
				zoom: 13,
				markers: [
					{
						address: '".strip_tags(nl2br($wedding_planner_item['address']))."',
						html: '".strip_tags(nl2br($wedding_planner_item['map_location']))."',
						popup: true,
					}
				],
			});
		   });
	})(this.jQuery);
	
	if($('#enquiry_form').length > 0)
	{
		$('#enquiry_form').validate({
			submitHandler: function(form)
			{
				submit_vendor_form();
				return false;
			}
		});
	}
	if($('#enquiry_form').length > 0)
	{
		$('#enquiry_form').validate({
			submitHandler: function(form)
			{
				submit_vendor_form();
				return false;
			}
		});
	}
	function submit_vendor_form()
	{
		show_comm_mask();
			
		var form_data = $('#enquiry_form').serialize();
		form_data = form_data+ '&is_post=0';
		var action = $('#enquiry_form').attr('action');
		
		$('#email_success_message').hide();
		$('#email_error_message').hide();
		
		$.ajax({
		   url: action,
		   type:'post',
		   data: form_data,
		   dataType:'json',
		   success:function(data)
		   {
				if(data.status == 'success')
				{
					$('#email_success_message').html(data.errmessage);
					$('#email_success_message').slideDown();
					form_reset('enquiry_form');
					setTimeout(function()
					{
						$('#email_success_message').fadeOut('fast');
					}, 10000);
				}
				else
				{
					$('#email_error_message').html(data.errmessage);
					$('#email_error_message').slideDown();
				}
				scroll_to_div('inquiry');
				$('#hash_tocken_id').val(data.token);
			   hide_comm_mask();
		   }
		});
		return false;
	}

	/* $('#weddingdate').datepicker({
		format: 'yyyy-mm-dd',
		autoclose: true,
		 minDate: 0,
	}); */
	$('#weddingdate').Zebra_DatePicker({
		default_position:'below',
		direction: 1
	});
	

	if($('#review_form').length > 0)
	{
		$('#review_form').validate({
			submitHandler: function(form)
			{
				submit_review_form();
				return false;
			}
		});
	}
	function submit_review_form()
	{
		var star = '';
		if(document.getElementById('radio1').checked == true){
			var star = $('input[name=r_star]:checked', '#review_form').val();
		}
		if(document.getElementById('radio2').checked == true){
			var star = $('input[name=r_star]:checked', '#review_form').val();
		}
		if(document.getElementById('radio3').checked == true){
			var star = $('input[name=r_star]:checked', '#review_form').val();
		}
		if(document.getElementById('radio4').checked == true){
			var star = $('input[name=r_star]:checked', '#review_form').val();
		}
		if(document.getElementById('radio5').checked == true){
			var star = $('input[name=r_star]:checked', '#review_form').val();
		}
		
		if(star == ''){
			alert('Please select star rating..!!!');
			$('input[name=r_star]').focus();
			return false;
		}
		
		show_comm_mask();
		
		var form_data = $('#review_form').serialize();
		form_data = form_data+ '&is_post=0';
		var url = $('#review_form').attr('action');
		
		$('#review_success_message').hide();
		
		$.ajax({
		   url: url,
		   type:'post',
		   data: form_data,
		   dataType:'json',
		   success:function(data)
		   {
				if(data.status == 'success')
				{
					$('#review_success_message').html(data.errmessage);
					$('#review_success_message').slideDown();
					$('#review_success_message').focus();
					form_reset('review_form');
					setTimeout(function()
					{
						$('#review_success_message').fadeOut('fast');
					}, 10000);
				}
				else
				{
					$('#review_success_message').html(data.errmessage);
					$('#review_success_message').slideDown();
				}
				$('#hash_tocken_id').val(data.token);
				hide_comm_mask();
		   }
		});
		return false;
	}
	";?>
<?php
	/*$this->common_model->js_extra_code_fr.="
	$(function()
	{
		var myCenter = new google.maps.LatLng(23.0203458, 72.5797426);
		function initialize() {
			var mapProp = {
				center: myCenter,
				zoom: 9,
				scrollwheel: false,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			var map = new google.maps.Map(document.getElementById('googleMap'), mapProp);
			var marker = new google.maps.Marker({
				position: myCenter,
				icon: '".$base_url."assets/front_end/images/pinkball.png'
			});
			marker.setMap(map);
			var infowindow = new google.maps.InfoWindow({
				content: 'Hello Address'
			});
		}
		google.maps.event.addDomListener(window, 'load', initialize);
	}); ";*/
?>

