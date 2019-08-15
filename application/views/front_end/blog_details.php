<?php if(isset($blog_data) && $blog_data !='' && is_array($blog_data) && count($blog_data) > 0)
{
?>
    <div class="tp-page-head">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-2 col-md-8">
						<div class="page-header text-center">
							<div class="icon-circle">
								<i class="icon icon-size-60 icon-list-1 icon-white"></i>
							</div>
							<h1 class="text-shadow-black">Blog Details</h1>
						</div>
					</div>
				</div>
			</div>
		</div> 
    <div class="tp-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo $base_url; ?>">Home</a></li>
                        <li><a href="<?php echo $base_url; ?>blog">Blog Listing</a></li>
                        <li class="active">Blog Detail</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="container padding-lr-zero-xs">
			<div class="tab-content">
				<div>
					<div class="clearfix"></div>
					
					<div class="row margin-top-30">
					<div class="col-md-8 content-left">
						<div class="row">
							<div class="col-md-12 post-holder">
								<div class="bg-border">
								
								<h3 class="text-grey bold">
                                <?php
                                if(isset($blog_data['title']) && $blog_data['title'] !='')
								{
									echo $blog_data['title'];
								}
								$blog_img = 'assets/front_end/images/nodata.jpg';
								if(isset($blog_data['blog_image']) && $blog_data['blog_image'] !='' && file_exists($this->common_model->path_blog.$blog_data['blog_image']))
								{
									$blog_img = $this->common_model->path_blog.$blog_data['blog_image'];
								}
								?>
                                </h3>
									<div class="colorgraph"></div>
									<div class="clearfix"></div>
									<p class="font-14 margin-top-10px text-grey"><i class="fa fa-calendar"></i> 
                                    <?php echo $this->common_model->displayDate($blog_data['created_on'],'l jS F, Y');?>
                                    </p>
									<div class="sticky-sign"><i class="fa fa-bookmark"></i></div>    <br>
									<div class="post-image">
										<a href="javascript:;"><img src="<?php echo $base_url.$blog_img; ?>" class="img-responsive" alt=""></a>
									</div>
									<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-15px padding-lr-zero-320 padding-lr-zero-480">
										<?php
											if(isset($blog_data['content']) && $blog_data['content'] !='')
											{
												echo $blog_data['content'];
											}
										?>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="col-md-4 right-sidebar" style="margin-top:-20px;">
                        <?php include_once("success_story_side_bar.php"); ?>
						<?php include_once("sidebar_advertisement.php"); ?>
					</div>
					</div>
				</div>
				<div class="clearfix"></div>								
			</div>
			<hr>		
		</div>
	</div>
<?php
}
?>    