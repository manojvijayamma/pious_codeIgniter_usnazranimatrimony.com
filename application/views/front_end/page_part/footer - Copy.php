<?php $ver_cont = '1.555785';
$logo_url = 'front_end/images/logo/logo-3.png';
if(isset($config_data['upload_logo']) && $config_data['upload_logo'] !='')
{
	$logo_url = 'logo/'.$config_data['upload_logo'];
}
$is_login = $this->common_front_model->checkLogin('return');
?>
<div class="clearfix"></div>
<div class="container-fluid back-img">
    <div class="container">
		
		<?php
			$horizontal_banner_url='';
			$other_banner = $this->common_model->get_count_data_manual('other_banner',array('status'=>'APPROVED'),1,'','id desc');
			if($other_banner != ''){
				$path_other_banner = $this->common_model->other_banner;
				if(isset($other_banner['horizontal_banner']) && $other_banner['horizontal_banner'] !='' && file_exists($path_other_banner.$other_banner['horizontal_banner']))
				{
					$horizontal_banner_url = $base_url.$path_other_banner.$other_banner['horizontal_banner'];
				}
			}else{
				$horizontal_banner_url='';
			}
		?>
		<?php if($horizontal_banner_url != ''){?>
			<img data-src="<?php echo $horizontal_banner_url; ?>" class="img-responsive text-center lazyload" src="assets/front_end/images/xyz-t.png" alt="bm-usp" />
		<?php }else{?>
			<img data-src="<?php echo $base_url; ?>assets/front_end/images/bm-usp.png" class="img-responsive text-center lazyload" src="assets/front_end/images/xyz-t.png" alt="bm-usp" />
		<?php } ?>
    </div>
</div>
<div class="clearfix"></div>
<div id="footer" class="section-space20 bg-white" style="padding-bottom:0px;">
			<div class="container">
            	<?php
				$is_home_page = 'no';
				if($this->common_model->class_name =='home')
				{
					$is_home_page = 'yes';
				}
				if($is_home_page == 'yes')
				{
				?>
				<h6 class="title-h6">BROWSE MATRIMONIAL PROFILES BY</h6>
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<h5 class="bold color-black">Country :</h5>
						<!-- Note = 123456789 Means Country id in our database -->
						<!--<a href="javascript:;" onclick="search_country('123456789');" class="font-12">NRI</a> 
						<span class="line">|</span>-->
                        <?php $where_country_code = array('is_deleted'=>'No',"country_code !=''");
							$country_code_arr = $this->common_model->get_count_data_manual('country_master',$where_country_code,2,'country_code,country_name','rand()',1,8);
							
							foreach($country_code_arr as $country_code_arr)
							{	
								?>
                                <a href="javascript:;" class="font-12" onclick="search_country('<?php echo $country_code_arr['country_code'];?>');"><?php echo $country_code_arr['country_name'];?></a>
                                <span class="line">|</span>
                                <?php
							}
						?>
						<!--<a href="javascript:;" class="font-12" onclick="search_country('95');">India</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_country('215');">USA</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_country('2');">UAE</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_country('182');">Singapore</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_country('36');">Canada</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_country('154');">Nepal</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_country('31');">Bhutan</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_country('145');">Malasiya</a>-->
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<h5 class="bold color-black">Religion :</h5>
                        <?php $where_religion = array('is_deleted'=>'No');
							$religion_arr = $this->common_model->get_count_data_manual('religion',$where_religion,2,'id,religion_name','rand()',1,8);
							foreach($religion_arr as $religion_arr)
							{	
								?>
                                <a href="javascript:;" class="font-12" onclick="search_religion('<?php echo $religion_arr['id'];?>');"><?php echo $religion_arr['religion_name'];?></a>
                                <span class="line">|</span>
                                <?php
							}
						?>
						<!-- Note = 59 Means Religion id in our database -->
						<!--<a href="javascript:;" class="font-12" onclick="search_religion('59');">Hindu</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_religion('3');">Muslim</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_religion('77');">Jain</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_religion('32');">Buddhist</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_religion('30');">Christian</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_religion('4');">Sikh</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_religion('108');">Ishai</a>
						<span class="line">|</span>-->
						<!--<a href="javascript:;" class="font-12" onclick="search_religion('59');">View All</a>-->
					</div>
				</div>
				<div class="row margin-top-10">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<h5 class="bold color-black">Cities :</h5>
                        <?php $where_city= array('is_deleted'=>'No');
							$city_arr = $this->common_model->get_count_data_manual('city_master',$where_city,2,'id,city_name','rand()',1,8);
							foreach($city_arr as $city_arr)
							{	
								?>
                                <a href="javascript:;" class="font-12" onclick="search_city('<?php echo $city_arr['id'];?>');"><?php echo $city_arr['city_name'];?></a>
                                <span class="line">|</span>
                                <?php
							}
						?>
						<!-- Note = 998419 Means Cities id in our database -->
						<!--<a href="javascript:;" class="font-12" onclick="search_city('998419');">Ahmedabad</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_city('997012');">Banglore</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_city('995514');">Mumbai</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_city('1014186');">Chennai</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_city('996682');">Baroda</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_city('991185');">Jamnagar</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_city('994056');">Delhi</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_city('991578');">Hyderabad</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_city('983825');">Pune</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_city('991503');">Indore</a>-->
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<h5 class="bold color-black">Caste :</h5>
                        <?php $where_caste= array('is_deleted'=>'No');
							$caste_arr = $this->common_model->get_count_data_manual('caste',$where_caste,2,'id,caste_name','rand()',1,8);
							foreach($caste_arr as $caste_arr)
							{	
								?>
                                <a href="javascript:;" class="font-12" onclick="search_caste('<?php echo $caste_arr['id'];?>');"><?php echo $caste_arr['caste_name'];?></a>
                                <span class="line">|</span>
                                <?php
							}
						?>
						<!-- Note = 998419 Means Caste id in our database -->
						<!--<a href="javascript:;" class="font-12" onclick="search_caste('260');">Patel</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_caste('262');">Brahmin</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_caste('4');">Agrawal</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_caste('189');">Khatri</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_caste('103');">Nair</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_caste('194');">Rajput</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_caste('170');">Sunni</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_caste('118');">Reddy</a>-->
					</div>
				</div>
				<div class="row margin-top-10">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<h5 class="bold color-black">Mother Tongue :</h5>
						<?php $where_mother_tongue= array('is_deleted'=>'No');
							$mother_tongue_arr = $this->common_model->get_count_data_manual('mothertongue',$where_mother_tongue,2,'id,mtongue_name','rand()',1,8);
							foreach($mother_tongue_arr as $mother_tongue_arr)
							{	
								?>
                                <a href="javascript:;" class="font-12" onclick="search_caste('<?php echo $mother_tongue_arr['id'];?>');"><?php echo $mother_tongue_arr['mtongue_name'];?></a>
                                <span class="line">|</span>
                                <?php
							}
						?>
                        <!-- Note = 998419 Means Mother Tongue id in our database -->
						<!--<a href="javascript:;" class="font-12" onclick="search_mothertongue('3');">Gujarati</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_mothertongue('10');">Bengali</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_mothertongue('6');">Punjabi</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_mothertongue('11');">Kannada</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_mothertongue('9');">Malayalam</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_mothertongue('7');">Marathi</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_mothertongue('14');">Oriya</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_mothertongue('1');">Tamil</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_mothertongue('8');">Telugu</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_mothertongue('63');">Urdu</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_mothertongue('12');">Sindhi</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_mothertongue('58');">Hindi</a>
						<span class="line">|</span>
						<a href="javascript:;" class="font-12" onclick="search_mothertongue('16');">Marwadi</a>-->
					</div>
				</div>
                <hr>
				<?php
				}
				?>                
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<!--<h6 class="title-h6 color-black">ABOUT US</h6>-->
						<img data-src="<?php echo $base_url; ?>assets/<?php echo $logo_url; ?>" src="<?php echo $base_url; ?>assets/<?php echo $logo_url; ?>" class="lazyload" alt="" style="width:60%;">
						<p class="footer-p footer-para margin-f-p-m"><?php if(isset($config_data['website_description']) && $config_data['website_description'] !=''){ echo $config_data['website_description'];} ?></p>
					</div>
					<div class="col-md-2 col-sm-12 col-xs-12" style="border-left:1px solid #e9e6e0;border-right:1px solid #e9e6e0;">
						<h6 class="title-h6 color-black">HELP & SUPPORT</h6>
						<ul>
							<!--<li class="line-height-10">
								<span class="paddr8">&#8250;</span>
								<a href="<?php echo $base_url; ?>" class="font-12">24x7 Live help</a>
							</li>-->
							<li class="line-height-10">
								<span class="paddr8">&#8250;</span>
								<a href="<?php echo $base_url; ?>contact" class="font-12">Contact us</a>
							</li>
							<li class="line-height-10">
								<span class="paddr8">&#8250;</span>
								<a href="<?php echo $base_url; ?>faq" class="font-12">FAQs</a>
							</li>
                            <li class="line-height-10">
								<span class="paddr8">&#8250;</span>
								<a href="<?php echo $base_url;?>success-story" class="font-12">Success Stories</a>
							</li>
                            <li class="line-height-10">
								<span class="paddr8">&#8250;</span>
								<a href="<?php echo $base_url;?>mobile-matri" class="font-12">Mobile Matrimony</a>
							</li>
                            <li class="line-height-10">
								<span class="paddr8">&#8250;</span>
								<a href="<?php echo $base_url;?>premium-member" class="font-12">Payment Option</a>
							</li>
							<li class="line-height-10">
								<span class="paddr8">&#8250;</span>
								<a href="<?php echo $base_url;?>demograph" class="font-12">Member Demograph</a>
							</li>
						</ul>
					</div>                    
                    <div class="col-md-2 col-sm-12 col-xs-12" style="border-left:1px solid #e9e6e0;border-right:1px solid #e9e6e0;">
						<h6 class="title-h6 color-black">INFORMATION</h6>
						<ul>
                        <?php
                        	$cms_pages_arr = $this->common_model->get_count_data_manual('cms_pages',array('is_deleted'=>'No','status'=>'APPROVED'),2,'page_title,page_url','page_title asc');
							if(isset($cms_pages_arr) && $cms_pages_arr !='' && count($cms_pages_arr) > 0)
							{
								$cms_url_arr = array('about-us','refund-policy','report-misuse','privacy-policy','terms-condition');
								foreach($cms_pages_arr as $cms_pages_arr_val)
								{
									if(in_array($cms_pages_arr_val['page_url'],array('faq-page','contact-us')))
									{
										continue;	
									}
									$cms_page_url = 'cms/index/'.$cms_pages_arr_val['page_url'];
									if(in_array($cms_pages_arr_val['page_url'],$cms_url_arr))
									{
										$cms_page_url = $cms_pages_arr_val['page_url'];
									}
						?>			
                            <li class="line-height-10">
								<span class="paddr8">&#8250;</span>
								<a href="<?php echo $base_url.$cms_page_url; ?>" class="font-12"><?php echo $cms_pages_arr_val['page_title']; ?></a>
							</li>
                        <?php
								}
							}
						?>
	                         <li class="line-height-10">
								<span class="paddr8">&#8250;</span>
								<a href="<?php echo $base_url.'blog'; ?>" class="font-12">Blog</a>
							</li>
                        </ul>
					</div>
					<div class="col-md-2 col-sm-12 col-xs-12">
						<h6 class="title-h6 color-black">Others</h6>
						<ul>
                        <?php
							if(!$is_login)
							{
						?>
                            <li class="line-height-10">
								<span class="paddr8">&#8250;</span>
								<a href="<?php echo $base_url;?>register" class="font-12">Register</a>
							</li>
                            <li class="line-height-10">
								<span class="paddr8">&#8250;</span>
								<a href="<?php echo $base_url;?>login" class="font-12">Log In</a>
							</li>
                        <?php
							}
						?>
                            <li class="line-height-10">
								<span class="paddr8">&#8250;</span>
								<a href="<?php echo $base_url;?>event" class="font-12">Events</a>
							</li>
                            <li class="line-height-10">
								<span class="paddr8">&#8250;</span>
								<a href="<?php echo $base_url;?>wedding-vendor" class="font-12">Vendor</a>
							</li>
                            <li class="line-height-10">
								<span class="paddr8">&#8250;</span>
								<a href="<?php echo $base_url;?>add-with-us" class="font-12">Advertise With us</a>
							</li>
                        </ul>
					</div>
				</div>
                <?php
				if($is_home_page == 'yes')
				{
				?>
				<hr>
				<div class="row row-center">
					<div class="col-md-12 col-sm-12 col-xs-12">						
						<div class="col-md-3 col-sm-12 col-xs-12">
                        	<h6 class="title-h6 color-black">PAYMENT METHOD :</h6>
							<div class="row">
								<a href="<?php echo $base_url;?>premium-member"><img data-src="<?php echo $base_url; ?>assets/front_end/images/money.png" class="img-responsive lazyload" src="assets/front_end/images/xyz-t.png" alt="mobile-apps" /></a>
							</div>
						</div>
						<div class="col-md-3 col-sm-12 col-xs-12">
								<div class="row">
									<!--<a href="#">-->
										<img data-src="<?php echo $base_url; ?>assets/front_end/images/perc-secure.png" class="img-responsive lazyload" src="assets/front_end/images/xyz-t.png" alt="mobile-apps" style="box-shadow:0 1px 2px rgba(43,59,93,0.29);" />
										<!--</a>-->
								</div>
							</div>
						<div class="col-md-3 col-sm-12 col-xs-12 hidden-xs hidden-sm">
							<div class="row pull-right">
								<!--<a href="#">-->
								<img data-src="<?php echo $base_url; ?>assets/front_end/images/secure-payment1.png" class="img-responsive lazyload" src="assets/front_end/images/xyz-t.png" alt="mobile-apps" /><!--</a>-->
							</div>
						</div>
                        <div class="col-md-3 col-sm-12 col-xs-12 text-center">
						<h6 class="title-h6 color-black">FOLLOW US ON :</h6>
						<div class="social-icon" style="margin-top:15px;">
							<ul>
								<li><a href="<?php if(isset($config_data['facebook_link']) && $config_data['facebook_link'] !=''){ echo $config_data['facebook_link'];} ?>" target="_blank" data-toggle="tooltip" title="facebook"><i class="fa fa-facebook-square" style="font-size:25px !important;"></i></a></li>
								<li><a href="<?php if(isset($config_data['twitter_link']) && $config_data['twitter_link'] !=''){ echo $config_data['twitter_link'];} ?>" target="_blank" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter-square" style="font-size:25px !important;"></i></a></li>
								<li><a href="<?php if(isset($config_data['google_link']) && $config_data['google_link'] !=''){ echo $config_data['google_link'];} ?>" target="_blank" data-toggle="tooltip" title="Google Plus"><i class="fa fa-google-plus-square" style="font-size:25px !important;"></i></a></li>
								<li><a href="<?php if(isset($config_data['linkedin_link']) && $config_data['linkedin_link'] !=''){ echo $config_data['linkedin_link'];} ?>" target="_blank" data-toggle="tooltip" title="linkedin"><i class="fa fa-linkedin-square" style="font-size:25px !important;"></i></a></li>
							</ul>
						</div>
					</div>
					</div>
				</div>
                <?php
				}
				?>
			</div>
			<div class="tiny-footer margin-top-30">
				<div class="container">
					<div class="row">
						<div class="col-md-12">&#x000A9; <?php if(isset($config_data['footer_text']) && $config_data['footer_text'] !=''){ echo $config_data['footer_text'];} ?></div>
					</div>
				</div>
			</div>
		</div>
<div class="clearfix"></div>
<div id="lightbox-panel-mask"></div>
<div id="lightbox-panel-loader" style="text-align:center">
	<img alt="Please wait.." title="Please wait.." src="<?php echo $base_url; ?>assets/front_end/images/loading.gif" />
</div>
<?php
	$this->common_model->js_extra_code_fr.="
	
	function search_country(country='')
	{
		var hash_tocken_id = $('#hash_tocken_id').val();
		var base_url = $('#base_url').val();
		var url = base_url+'search/home_search';
		show_comm_mask();
			$.ajax({
			  	url: url,
				type: 'POST',
				data: {'csrf_new_matrimonial':hash_tocken_id,'country':country},
				dataType:'json',
				success: function(data)
				{ 	
					window.location.href = base_url+'search/result';
					update_tocken(data.tocken);
					hide_comm_mask();
			  	}
			});
		return false;
	}	
	
	function search_religion(religion='')
	{
		var hash_tocken_id = $('#hash_tocken_id').val();
		var base_url = $('#base_url').val();
		var url = base_url+'search/home_search';
		show_comm_mask();
			$.ajax({
			  	url: url,
				type: 'POST',
				data: {'csrf_new_matrimonial':hash_tocken_id,'religion':religion},
				dataType:'json',
				success: function(data)
				{ 	
					window.location.href = base_url+'search/result';
					update_tocken(data.tocken);
					hide_comm_mask();
			  	}
			});
		return false;
	}
	
	function search_city(city='')
	{
		var hash_tocken_id = $('#hash_tocken_id').val();
		var base_url = $('#base_url').val();
		var url = base_url+'search/home_search';
		show_comm_mask();
			$.ajax({
			  	url: url,
				type: 'POST',
				data: {'csrf_new_matrimonial':hash_tocken_id,'city':city},
				dataType:'json',
				success: function(data)
				{ 	
					window.location.href = base_url+'search/result';
					update_tocken(data.tocken);
					hide_comm_mask();
			  	}
			});
		return false;
	}
	
	function search_caste(caste='')
	{
		var hash_tocken_id = $('#hash_tocken_id').val();
		var base_url = $('#base_url').val();
		var url = base_url+'search/home_search';
		show_comm_mask();
			$.ajax({
			  	url: url,
				type: 'POST',
				data: {'csrf_new_matrimonial':hash_tocken_id,'caste':caste},
				dataType:'json',
				success: function(data)
				{ 	
					window.location.href = base_url+'search/result';
					update_tocken(data.tocken);
					hide_comm_mask();
			  	}
			});
		return false;
	}
	
	function search_mothertongue(mothertongue='')
	{
		var hash_tocken_id = $('#hash_tocken_id').val();
		var base_url = $('#base_url').val();
		var url = base_url+'search/home_search';
		show_comm_mask();
			$.ajax({
			  	url: url,
				type: 'POST',
				data: {'csrf_new_matrimonial':hash_tocken_id,'mothertongue':mothertongue},
				dataType:'json',
				success: function(data)
				{ 	
					window.location.href = base_url+'search/result';
					update_tocken(data.tocken);
					hide_comm_mask();
			  	}
			});
		return false;
	}
	
	";
?>

<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" class="hash_tocken_id" />
<input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />

<script src="<?php echo $base_url; ?>assets/front_end/js/jquery.min.js?ver=<?php echo $ver_cont;?>"></script>
<script src="<?php echo $base_url; ?>assets/front_end/js/bootstrap.min.js?ver=<?php echo $ver_cont;?>"></script>
<script src="<?php echo $base_url; ?>assets/front_end/js/jquery.sticky.js?ver=<?php echo $ver_cont;?>"></script>
<script src="<?php echo $base_url; ?>assets/front_end/js/common.js?ver=<?php echo $ver_cont;?>rand()"></script>
<?php
	if(isset($this->common_model->extra_js_fr) && $this->common_model->extra_js_fr !='' && count($this->common_model->extra_js_fr) > 0)
	{
		$extra_js_fr = $this->common_model->extra_js_fr;
		foreach($extra_js_fr as $extra_js_val)
		{			
		?>
			<script src="<?php echo $base_url.'assets/front_end/'.$extra_js_val; ?>?ver=<?php echo $ver_cont;?>"></script>
		<?php
		}
	}
?>
<script>
<?php
	if(isset($this->common_model->js_extra_code_fr) && $this->common_model->js_extra_code_fr !='')
	{
		echo $this->common_model->js_extra_code_fr;
	}
?>
</script>

<!--===========================FreiChat=======START=========================-->
<!--	For uninstalling ME , first remove/comment all FreiChat related code i.e below code Then remove FreiChat tables frei_session & frei_chat if necessary The best/recommended way is using the module for installation -->
<?php
$user_id = $this->common_front_model->get_session_data('id');
if(isset($user_id) && $user_id !='')
{
	$ses = $user_id;
	print_r($_COOKIE);
	setcookie("freichat_user", "LOGGED_IN", time()+3600, "/");
	if(!function_exists("freichatx_get_hash"))
	{
		function freichatx_get_hash($ses)
		{
			if(is_file("freichat/hardcode.php"))
			{
				require "freichat/hardcode.php";
				$temp_id =  $ses . $uid;
				return md5($temp_id);
		   }
		   else
		   {
				echo "<script>alert('module freichatx says: hardcode.php file not found!');</script>";
		   }
		   return 0;
		}
	}
	?>
		<script type="text/javascript" language="javascipt" src="http://localhost/megamatrymony/freichat/client/main.php?id=<?php echo $ses;?>&xhash=<?php echo freichatx_get_hash($ses); ?>"></script>
		<link rel="stylesheet" href="http://localhost/megamatrymony/freichat/client/jquery/freichat_themes/freichatcss.php" type="text/css">    
<?php
}
?>
<!--===========================FreiChatX=======END=========================-->
	</body>
</html>