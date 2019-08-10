<div class="main-container">
        <div class="container">
            <div class="row">
             	
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
             <?php if(isset($wedding_planner) && $wedding_planner !='' && is_array($wedding_planner) && $wedding_planner_data_count > 0)
					{
						foreach($wedding_planner as $wedding_planner_value)
						{	?>
                <div class="col-md-6">
                    <div class="vendor-list-block mb30">
                        <div class="vendor-img">
						<?php
							$wedding_vendor_image_url = $this->common_model->path_wedding.$wedding_planner_value['image'];
						?>
					        <a href="<?php echo $base_url; ?>wedding-vendor/details/<?php echo $wedding_planner_value['id'];?>">
								<?php if(file_exists(FCPATH."$wedding_vendor_image_url")){?>
									<img src="<?php echo $base_url.$wedding_vendor_image_url; ?>" style="width:100%; height:300px;" alt="wedding venue" class="img-responsive">
								<?php }else{ ?>
									<img src="assets/images/no_image.jpg" style="width:100%; height:300px;" alt="wedding venue" class="img-responsive">
								<?php } ?>
							</a>
						    <div class="category-badge category-badgerespo le0 col-md-6 col-xs-12 center768 pato8 pabo8">
								<a href="<?php echo $base_url; ?>wedding-vendor/details/<?php echo $wedding_planner_value['id'];?>" class="category-link">category-<?php echo $wedding_planner_value['category_name'];?>
								</a>
							</div>
                            <div class="category-badge category-badgerespo col-md-1 col-xs-12 center768">
                            </div>
                            <div class="price-lable col-md-5 col-xs-12 center768"> <?php echo $wedding_planner_value['currency'];?> <?php echo $wedding_planner_value['start_rate_range'];?> - <?php echo $wedding_planner_value['currency'];?> <?php echo $wedding_planner_value['end_rate_range'];?>
							</div>
                            <!--<div class="favorite-action">
								<a href="#" class="fav-icon">
									<i class="fa fa-heart"></i>
								</a>
							</div>-->
                        </div>
                        <div class="vendor-detail">
                            <div class="caption">
                                <h2>
									<a href="<?php echo $base_url; ?>wedding-vendor/details/<?php echo $wedding_planner_value['id'];?>" class="title">
									<?php echo $wedding_planner_value['title'];?>
									</a>
								</h2>
                                <div class="vendor-meta"> 
									<span class="location"> 
										<i class="fa fa-map-marker map-icon"></i>
										<?php echo $wedding_planner_value['city_name'];?>, <?php echo $wedding_planner_value['state_name'];?>
									</span>
                                    <?php 
                                        $vendor_id = $wedding_planner_value['id'];
                                        $where_arra_reviews=array('vendor_id'=>$vendor_id,'is_deleted'=>'No','status'=>'APPROVED');
                                        $vendor_review_count = $this->common_model->get_count_data_manual('vendor_reviews',$where_arra_reviews,0,'*','id desc','');
										if($vendor_review_count > 0)
										{
											$vendor_review_data = $this->common_model->get_count_data_manual('vendor_reviews',$where_arra_reviews,1,'sum(r_star) as total_reviews_count','id desc','');
											$total = $vendor_review_count*5;
											$average = $vendor_review_data['total_reviews_count']/$total*5; 
										}else{
											$average = 0;
										}
										
										?>
                                        <?php if(isset($vendor_review_count) && $vendor_review_count>0)
                                        {?>
                                            <span class="rating">                                                 
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

                                                <span class="rating-count">
                                                (<?php echo $vendor_review_count ;?>)
                                                </span> 
                                            </span>
                                     <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
				<?php 	}	?>
						<!-- for pagination-->
						<?php
                           if(isset($wedding_planner_data_count) && $wedding_planner_data_count !='' && $wedding_planner_data_count > 0)
                            {	
                                echo $this->common_model->rander_pagination_front('wedding-vendor/index',$wedding_planner_data_count);
                            }
                        ?>
				<!-- for pagination-->
				<?php } else 
				{ ?>	
					<div class="alert alert-danger" align="center">Sorry, No vendor available.</div> 
				<?php
				}?>
               </div>
              
        </div>
    </div>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id_temp" class="hash_tocken_id" />