<!-- ======= <div class="container"> Start ========== -->
<div class="tp-page-head">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="page-header text-center">
                    <div class="icon-circle">
                        <i class="icon icon-size-60 icon-lock icon-white"></i>
                    </div>
                    <h1><?php if(isset($cms_pages['page_title']) && $cms_pages['page_title'] !=''){echo $cms_pages['page_title'];}?></h1>
                    <!--<p class="text-white text-center">Just simple steps and become premium member.</p>-->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb">
                    <li><a href="<?php if(isset($base_url) && $base_url !=''){echo $base_url;}?>">Home</a></li>
                    <li class="active"> <?php if(isset($cms_pages['page_title']) && $cms_pages['page_title'] !=''){echo $cms_pages['page_title'];}?></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<style>
.dashboard-nav .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
    color: #fff;
    background-color: #337ab7;
    border-bottom: 0px solid !important;
    transition: color .2s ease 0s;
}
</style>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div role="tabpanel">
                <div class="col-sm-3 margin-top-10-xs border-right">
                    <ul class="nav nav-pills brand-pills nav-stacked ">
                        <?php
							$displ_sing_menu = 0;
							$cms_pages_arr = $this->common_model->get_count_data_manual('cms_pages',array('is_deleted'=>'No','status'=>'APPROVED'),2,'page_title,page_url','page_title asc');
							if(isset($cms_pages_arr) && $cms_pages_arr !='' && is_array($cms_pages_arr) && count($cms_pages_arr) > 0)
							{
								$cms_url_arr = array('about-us','refund-policy','report-misuse','privacy-policy','terms-condition');
								foreach($cms_pages_arr as $cms_pages_arr_val)
								{
									if(in_array($cms_pages_arr_val['page_url'],array('faq-page','contact-us')))
									{
										continue;	
									}
									$active = '';
									if($cms_pages['page_title'] == $cms_pages_arr_val['page_title'])
									{
										$active = 'active';
										$displ_sing_menu = 1;
									}
									$cms_page_url = 'cms/index/'.$cms_pages_arr_val['page_url'];
									if(in_array($cms_pages_arr_val['page_url'],$cms_url_arr))
									{
										$cms_page_url = $cms_pages_arr_val['page_url'];
									}
						?>
                        <li class="brand-nav <?php echo $active;?>">
	                        <a href="<?php echo $base_url.$cms_page_url; ?>"><i class="fa fa-arrow-right fa-lg"></i> <span style="margin-left:10px;"><?php echo $cms_pages_arr_val['page_title']; ?></span></a>
                        </li>
                        <?php
								}
							}
							if($displ_sing_menu == 0)
							{
						?>
                        <li class="brand-nav active">
	                        <a href="<?php echo $base_url.'cms/index/'.$cms_pages['page_url']; ?>"><i class="fa fa-arrow-right fa-lg"></i> <span style="margin-left:10px;"><?php echo $cms_pages['page_title']; ?></span></a>
                        </li>
                        <?php
							}
						?>
                    </ul>
                    
                    <?php
						include_once("sidebar_advertisement.php");
						$this->load->view('front_end/member_feature_slider_in_sidebar');
					?>
                </div>
                <div class="col-md-9 col-xs-12 col-sm-12 ">
                    <div class="tab-content">
	                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="aboutus padding-10" style="padding-top:0px" id="aboutus">
                            <?php if(isset($cms_pages['page_content']) && $cms_pages['page_content'] !='')
                            {	
                                echo $cms_pages['page_content'];
                            }
                            else
                            {	?>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="padding-lr-zero-xs" style="margin-bottom:0px;">
                                    <div class="new_reg">
                                        <header class="header_bg" style="margin-bottom:0px;">
                                            <h1 style="margin: 0px !important;">No Data Available</h1>
                                        </header> 
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="margin-top:30px;"></div>