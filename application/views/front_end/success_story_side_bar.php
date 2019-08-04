<?php
	$where_arra=array('is_deleted'=>'No','status'=>'APPROVED');
	$success_story_data = $this->common_model->get_count_data_manual('success_story',$where_arra,2,'*','id desc',1,4);
	if(isset($success_story_data) && $success_story_data !='' && count($success_story_data) > 0 )
	{
?>
<div class="xxl-16 xl-16 m-16 l-16 xs-16 s-16 compltele-profile margin-bottom-15px margin-top-20px" style="padding-top:0px;padding-bottom:0px;">
    <div class="row" style="padding:4px;">
        <div class="upgrade-heading"><span class="glyphicon glyphicon-user"></span> Success Stories 
            <div class="controls pull-right">
                <a class="nxt_active" href="#quote-carousel1" data-slide="next"></a>
                <a class="prv_active" href="#quote-carousel1" data-slide="prev"></a>
            </div>
        </div>
    </div>
    
    <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 bg-white" style="box-shadow: none;">
        <div class="row">
            <div class="xxl-16 xl-16 m-16 s-16 l-16 xs-16 ne_myhome_featured-pro">
                <div class="row">
                    <div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16">
                        <div class="row">
                            <div class="carousel slide" data-ride="carousel" id="quote-carousel1">
                                <div class="carousel-inner">
                                    <?php
									$first_act = 'active';
									$path_success = $this->common_model->path_success;
									foreach($success_story_data as $success_story_data_val)
									{	
										if(isset($success_story_data_val['weddingphoto']) && $success_story_data_val['weddingphoto'] !='' && file_exists($path_success.$success_story_data_val['weddingphoto']))
										{
											$weddingphoto = $base_url.$path_success.$success_story_data_val['weddingphoto'];
										}
										else
										{
											$weddingphoto = $base_url.'assets/front_end/images/real-wedding-2.jpg';
										}
									?>
                                    	<div class="item <?php echo $first_act; ?>">
                                        <div class="owl-carousel xxl-16 padding-lr-zero">
                                            <div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 padding-lr-zero">
                                                <a href="<?php echo $base_url; ?>success-story/details/<?php echo  $success_story_data_val['id'];?>" class="border-shadow-img"><img src="<?php echo $weddingphoto; ?>" style="width:333px!important; height:187px !important;" class="xxl-16 xs-16 xl-16 l-16 m-16 s-16 img-responsive success-story-img" title="Sneha Sharma" alt="real-wedding-3" /></a>
                                                <div class="xxl-16 xl-16 m-16 l-16 s-16 xs-16 padding-lr-zero padding-right-0">
                                                    <div class="row">
                                                        <div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16">
                                                           <h3 class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 success-story-heading"><?php if(isset($success_story_data_val['groomname'])) {echo $success_story_data_val['groomname'];}?> & <?php if(isset($success_story_data_val['bridename'])) {echo $success_story_data_val['bridename'];}?></h3>
                                                        </div>
                                                        <div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16">
                                                            <p class="ne_font_12">"<?php 
													$successmessage = strip_tags($success_story_data_val['successmessage']);
													echo $successmessage = substr($successmessage,0,175);
													?>... <a href="<?php echo $base_url; ?>success-story/details/<?php echo  $success_story_data_val['id'];?>" class="underline text_slider">View full Profile</a> <img src="<?php echo $base_url; ?>assets/front_end/images//icon/right-gray-arrow.png" class="right-gray-arrow" alt="view-arrow" /></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
										$first_act = '';
									}
									?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row" style="padding:4px;">
        <div class="upgrade-heading margin-top-5"> 
            <a class="view_all underline text_slider" href="<?php echo $base_url.'success-story'; ?>">View All <img src="<?php echo $base_url; ?>assets/front_end/images//icon/right-gray-arrow.png" alt="right-gray-arrow" /></a>
        </div>
    </div>
</div>
<?php
	}
?>