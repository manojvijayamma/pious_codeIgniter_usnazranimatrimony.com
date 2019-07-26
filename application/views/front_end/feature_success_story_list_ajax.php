<?php
if(isset($success_story) && $success_story !='' && is_array($success_story) && $success_story_data_count > 0)
{
?>
						<div class="row">
                         <?php foreach($success_story as $success_story_value){?>
							<div class="xxl-8 xl-8 l-8 xs-16 m-16 s-16" style="margin-bottom:10px;">
								
								<div class="xxl-16 xl-16 s-16 m-16 l-16 xs-16 bg-border margin-top-15-xs" style="border-top:1px solid #ddd;">
									<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-bottom-20px padding-lr-zero-320 padding-lr-zero-480">
										<h2 class="text-darkgrey"><?php echo $success_story_value['groomname'];?> & <?php echo $success_story_value['bridename'];?></h2>
										<div class="colorgraph"></div>
										<div class="clearfix"></div>
										<p class="font-14 margin-top-10px text-grey"><i class="fa fa-calendar"></i><?php echo $this->common_model->displayDate($success_story_value['created_on'],' jS F, Y');?></p>
									</div>
									<div class="clearfix"></div>
									
									<div class="xxl-16 xl-16 s-16 m-16 l-16 center-text padding-lr-zero-320 padding-lr-zero-480 xxl-margin-left-2">
                                    <?php
                                    $path_wedding = $this->common_model->path_success;
									if(isset($success_story_value['weddingphoto']) && $success_story_value['weddingphoto'] !='' && file_exists($path_wedding.$success_story_value['weddingphoto'])){
										$weddingphoto = $base_url.$path_wedding.$success_story_value['weddingphoto'];
									}
									else{
										$weddingphoto = $base_url.'assets/images/no_image.jpg';
									}?>
										<a href="<?php echo $base_url; ?>success_story/details/<?php echo  $success_story_value['id'];?>"><img src="<?php echo $weddingphoto; ?>" style="width:360px; height:270px;" class="img-border-nrml img-responsive" alt="" /></a>
									</div>
									<div class="xxl-16 xl-16 s-16 m-16 l-16 margin-top-15px">
										<p class="font-14 text-darkgrey" style="min-height:100px!important;">
                                        <?php 	
											$descri= $success_story_value['successmessage'];
											$description = substr(strip_tags($descri),0,280);
											echo $description."...";
										?>
                                        </p>
										<a href="<?php echo $base_url; ?>success_story/details/<?php echo  $success_story_value['id'];?>" class="btn btn-sm font-12">Read more</a>
										<h3 class="font-15 margin-top-10px text-grey"><i class="fa fa-calendar"></i> Wedding Date: <?php echo $this->common_model->displayDate($success_story_value['marriagedate'],' jS F, Y');?></h3>
									</div>
								</div>
							</div>
                            <?php } 
} 
else 
{ ?>	
			<div class="alert alert-danger" align="center">Sorry, No Success Stories Available .</div> 
<?php
}?>
						</div>
                <!-- ===== for pagination====== -->
				<?php
                   if(isset($success_story_data_count) && $success_story_data_count !='' && $success_story_data_count > 0)
                    {	
                        echo $this->common_model->rander_pagination_front('success_story/index',$success_story_data_count);
                    }
                ?>
                <!-- ====== for pagination ==== -->
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id_temp" class="hash_tocken_id" />
					