<div class="wide-post-image"> <img src="<?php echo $base_url; ?>assets/front_end/images/hero-image-3.jpg" alt="" class="img-responsive"></div>
<div class="container blog-header">
    <div class="row blog-head">
        <div class="col-md-12 title">
            <h1 class="font-25-xs">The wedding story - "life is a fairytale"</h1>
            <h3 class="font-14 margin-top-10px text-white text-center text-grey-xs"><i class="fa fa-calendar"></i> Wedding Date: <?php if(isset($success_story_item['marriagedate'])) {echo $this->common_model->displayDate($success_story_item['marriagedate'],' jS F, Y');}?></h3>
        </div>
    </div>
</div>    
<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb">
                    <li><a href="<?php if(isset($base_url) && $base_url !=''){echo $base_url;}?>">Home</a></li>
                    <li class="active">Success Story</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="">
    <div class="container padding-lr-zero-xs">
        <div class="xxl-16 xl-16 s-16 m-16 l-16 xs-16 margin-top-20">
            <div class="row">
            <div class="pull-right"><a href="<?php echo $base_url; ?>success-story" aria-controls="ne-post-success-story" class="bg-tabs tabs btn"><i class="fa fa-angle-double-left"></i>&nbsp;Back</a></div>
                <div class="text-center">
                    <a href="#ne-success-story" aria-controls="ne-success-story" data-toggle="tab" class="bg-tabs tabs btn">Success Story</a>
                    <a href="<?php echo $base_url; ?>success-story/add-story" aria-controls="ne-post-success-story"  class="btn btn-skyblue">Post Success Story</a>
                </div>
                
            </div>
        </div>
    
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="ne-success-story">
                <div class="xxl-16 xl-16 s-16 m-16 l-16 xs-16 margin-top-20 back-img">
                    <h2 class="text-center text-white text-shadow">Welcome to <?php if(isset($config_data['website_title'])) {echo $config_data['website_title'];}?>.</h2>
                    <!--<h3 class="text-center text-white text-shadow">This is where we celebrate <?php //if(isset($config_data['web_name'])) {echo $config_data['web_name'];}?> Success Stories.</h3>-->
                    <h3 class="text-center text-white text-shadow">This is where we celebrate Success Stories.</h3>
                </div>
                <div class="clearfix"></div>
                
                <div class="row margin-top-30">
                <div class="col-md-8 content-left">
                    <div class="row">
                        <div class="col-md-12 post-holder">
                            <div class="bg-border">
                                <div class="sticky-sign"><i class="fa fa-bookmark"></i></div>    
                                <div class="post-image">
                                <?php 
								$path_wedding = $this->common_model->path_success;
								if(isset($success_story_item['weddingphoto']) && $success_story_item['weddingphoto'] !='' && file_exists($path_wedding.$success_story_item['weddingphoto']))
								{
									$weddingphoto = $base_url.$path_wedding.$success_story_item['weddingphoto'];
								}
								else
								{
									$weddingphoto = $base_url.'assets/images/no_image.jpg';
								}
								?>
                                    <a href="#"><img src="<?php echo $weddingphoto;?>" style="width:700px; height:400px;" class="img-responsive" alt="success"></a>
                                </div>
                                <h3 class="font-darkorange"><?php if(isset($success_story_item['groomname'])) {echo $success_story_item['groomname'];}?> & <?php if(isset($success_story_item['bridename'])) {echo $success_story_item['bridename'];}?></h3>
                                <div class="colorgraph"></div>
                                <div class="clearfix"></div>
                                <p class="font-14 margin-top-10px text-grey"><i class="fa fa-calendar"></i> Wedding Date: <?php if(isset($success_story_item['marriagedate'])) {echo $this->common_model->displayDate($success_story_item['marriagedate'],' jS F, Y');}?></p>
                                
                                <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 bg-light-grey border-radius-top-5px margin-top-30px margin-bottom-20px">
                                    <h3 class="center-text font-darkorange">
                                        Success Story
                                    </h3>
                                </div>
                                <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-15px padding-lr-zero-320 padding-lr-zero-480">
                                    <div id="short_story"></div>
                                    <p class="font-14"><?php if(isset($success_story_item['successmessage'])) {echo $success_story_item['successmessage'];}?></p>
                               </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                </div>
                
                <div class="col-md-4 right-sidebar">
                    <div class="row">
                        <?php /*<div class="clearfix"></div> 
                        <div class="col-md-12 widget widget-recent-post">
                             <div class="" style="box-shadow: none; margin-top: -20px;">
                      			  <?php //$this->load->view('front_end/success_story_side_bar'); ?>
                   			</div>  
                        </div> */ ?>
                       <div class="clearfix"></div> 
					   <?php /* for margin <div class="col-md-12 widget widget-recent-post margin-top-30">*/ ?>
                        <div class="col-md-12 widget widget-recent-post">
                             <div class="" style="box-shadow: none;">
                      			  <?php $this->load->view('front_end/member_feature_slider_in_sidebar'); ?>
                   			</div>  
                        </div>
                        <div class="clearfix"></div> 
                        <div class="col-md-12 widget widget-recent-post margin-top-30">
                             
                      			  <a href="http://narjisenterprise.com/" target="_blank">
        	 <?php $this->load->view('front_end/sidebar_advertisement'); ?>
         <!--<img src="<?php echo $base_url; ?>assets/front_end/images/molly_and_ray.gif" class="img-responsive" alt="" />-->
        </a>
                   			
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <hr>
        <!--<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero need-help-img hidden-sm hidden-xs">
            <img src="<?php echo $base_url; ?>assets/front_end/images/icon/need-help.gif" class="img-responsive text-center" alt="" style="box-shadow: 0 1px 2px rgba(43,59,93,0.29);border-radius:3px;" />
        <p class="help-text text-center">Need help? Here's one click assistance! <a href="#">Click here</a> <span class="text-grey">and we will get in touch with you right away.</span></p>
        </div>-->
    </div>
</div>
<div class="clearfix"></div>
<div class="margin-top-30"></div>


 <?php
		$this->common_model->js_extra_code_fr.="
		if($('#success_story_form').length > 0)
		{
			$('#success_story_form').validate({
				submitHandler: function(form)
				{
					return true;
				}
			});
		} ";?>