<?php
if(!$is_ajax)
{
?>
    <style>
		.blog-card {
		transition: height 0.3s ease;
		-webkit-transition: height 0.3s ease;
		background: #fff;
		border-radius: 3px;
		box-shadow: 0 3px 7px -3px rgba(0, 0, 0, 0.3);
		margin: 0 auto 1.6%;
		overflow: hidden;
		position: relative;
		font-size: 14px;
		line-height: 1.45em;
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
		}
		.blog-card:hover .details {
		left: 0;
		}
		.blog-card:hover.alt .details {
		right: 0;
		}
		.blog-card.alt .details {
		right: -100%;
		left: inherit;
		}
		.blog-card .photo {
		height: 200px;
		position: relative;
		}
		.blog-card .photo.photo1 {
		background: url("images/nodata.jpg") center no-repeat;
		background-size: cover;
		}
		.blog-card .photo.photo2 {
		background: url("images/real-wedding-4.jpg") center no-repeat;
		background-size: cover;
		}
		.blog-card .details {
		transition: all 0.3s ease;
		-webkit-transition: all 0.3s ease;
		background: rgba(0, 0, 0, 0.6);
		box-sizing: border-box;
		color: #fff;
		font-family: "Open Sans";
		list-style: none;
		margin: 0;
		padding: 10px 15px;
		height: 200px;
		/*POSITION*/
		position: absolute;
		top: 0;
		left: -100%;
		}
		.blog-card .details > li {
		padding: 3px 0;
		padding: 3px 0;
        border: none !important;
        background: transparent !important;
		}
		.blog-card .details li:before, .blog-card .details .tags ul:before {
		font-family: FontAwesome;
		margin-right: 10px;
		vertical-align: middle;
		}
		.blog-card .details .author:before {
		content: "\f007";
		}
		.blog-card .details .date:before {
		content: "\f133";
		}
		.blog-card .details .tags ul {
		list-style: none;
		margin: 0;
		padding: 0;
		}
		.blog-card .details .tags ul:before {
		content: "\f02b";
		}
		.blog-card .details .tags li {
		display: inline-block;
		margin-right: 3px;
		}
		.blog-card .details a {
		color: inherit;
		border-bottom: 1px dotted;
		}
		.blog-card .details a:hover {
		color: #75D13B;
		}
		.blog-card .description {
		padding: 10px;
		box-sizing: border-box;
		position: relative;
		}
		.blog-card .description h1 {
		font-size:20px;
		line-height: 1em;
		margin: 0 0 10px 0;
		}
		.blog-card .description h2 {
		color: #9b9b9b;
		line-height: 1.2em;
		text-transform: uppercase;
		font-size: 1em;
		font-weight: 400;
		margin: 1.2% 0;
		}
		.blog-card .description p {
		position: relative;
		margin: 0;
		padding-top: 20px;
		}
		.blog-card .description p:after {
		content: "";
		background: #75D13B;
		height: 6px;
		width: 40px;
		/*POSITION*/
		position: absolute;
		top: 6px;
		left: 0;
		}
		.blog-card .description a {
		color: #75D13B;
		margin-bottom: 10px;
		float: right;
		}
		.blog-card .description a:after {
		transition: all 0.3s ease;
		-webkit-transition: all 0.3s ease;
		content: "\f061";
		font-family: FontAwesome;
		margin-left: -10px;
		opacity: 0;
		vertical-align: middle;
		}
		.blog-card .description a:hover:after {
		margin-left: 5px;
		opacity: 1;
		}
		
		@media screen and (min-width: 600px) {
		.blog-card {
		height: 200px;
		max-width: 600px;
		}
		.blog-card:hover .photo {
		
		}
		.blog-card:hover.alt .photo {
		-webkit-transform: rotate(-5deg) scale(1.3);
		transform: rotate(-5deg) scale(1.3);
		}
		.blog-card.alt .details {
		padding-left: 30px;
		}
		.blog-card.alt .description {
		float: right;
		}
		.blog-card.alt .description:before {
		-webkit-transform: skewX(5deg);
		transform: skewX(5deg);
		right: -15px;
		left: inherit;
		}
		.blog-card.alt .photo {
		float: right;
		}
		.blog-card .photo {
		transition: all 0.5s ease;
		-webkit-transition: all 0.5s ease;
		float: left;
		height: 100%;
		width: 40%;
		}
		.blog-card .details {
		width: 40%;
		}
		.blog-card .description {
		float: left;
		width: 60%;
		z-index: 0;
		}
		.blog-card .description:before {
		
		content: "";
		background: #fff;
		width: 100%;
		z-index: -1;
		/*POSITION*/
		position: absolute;
		
		top: 0;
		bottom: 0;
		}
		}
		
	</style>
	<!-- -webkit-transform: skewX(-5deg);
		transform: skewX(-5deg); -->
		<!-- left: -15px; -->
    <!-- ======= <div class="container"> Start======= -->		
    <div class="tp-page-head">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="page-header text-center">
                        <div class="icon-circle">
                            <i class="icon icon-size-60 icon-list-1 icon-white"></i>
                        </div>
                        <h1 class="text-shadow-black">Blog Listing</h1>
                        <!--<p class="text-white text-shadow-black text-center">Blog Listing</p>-->
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
                        <li class="active">Blog</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
	<div class="">
		<div class="container padding-lr-zero-xs">
			<div class="xxl-16 xl-16 s-16 m-16 l-16 xs-16 margin-top-20"></div>
			<div class="row margin-top-30">
            <div class="col-md-8 content-left"  id="main_content_ajax">
<?php
}
		  if(isset($blog_data) && $blog_data !='' && is_array($blog_data) && count($blog_data) > 0)
		  {
			  $ij=0;
			  foreach($blog_data as $blog_data_val)
			  {
				  //print_r($blog_data_val);
				  $blog_img = 'assets/front_end/images/nodata.jpg';
				  if(isset($blog_data_val['blog_image']) && $blog_data_val['blog_image'] !='' && file_exists($this->common_model->path_blog.$blog_data_val['blog_image']))
					{
						$blog_img = $this->common_model->path_blog.$blog_data_val['blog_image'];
					}
				  $content = strip_tags($blog_data_val['content']);
				  $content = substr($content,0,200);
		  ?>
          <style >
          .blog-card .photo.photo<?php echo $ij; ?> {
			background: url("<?php echo $base_url.$blog_img; ?>") center no-repeat;
			background-size: cover;
			}
          </style>
           <div class="blog-card">
                <div class="photo photo<?php echo $ij; ?>"></div>
                <div class="description">
                    <h1><?php echo $blog_data_val['title']; ?></h1>
                    <h2> <i class="fa fa-calendar"></i> <?php echo $this->common_model->displayDate($blog_data_val['created_on'],'jS F, Y');?> </h2>
                    <p class="summary"><?php echo $content;?></p>
                    <a href="<?php echo $base_url.'blog/'.$blog_data_val['alias']; ?>">Read More</a>
                </div>
            </div>
          <?php
				   $ij++;
			  }
		  }
		  else
		  {
		?>
        <div class="alert alert-danger">No Data avaialable</div>
        <?php
		  }
		  if(isset($blog_data_count) && $blog_data_count !='' && $blog_data_count > 0)
		  {
			  echo $this->common_model->rander_pagination_front('blog/index',$blog_data_count,$this->common_model->limit_per_page);
		  ?>	      
          <?php
		  }
		  ?>      
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id_temp" class="hash_tocken_id" />
<?php
if(!$is_ajax)
{
?>
			</div>	
				<div class="col-md-4 right-sidebar" style="margin-top:-20px;">
					<?php include_once("success_story_side_bar.php"); ?>
                    <?php include_once("sidebar_advertisement.php"); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>		
<?php
}
?>
<?php
	$this->common_model->js_extra_code_fr.="
    load_pagination_code_front_end();
	";
?>