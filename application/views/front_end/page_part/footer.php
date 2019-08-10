<style>
	h6.title-h6 {
    font-weight: 600;
    font-size: 20px;
    color: #cd7291;
	text-align:center;
	margin-bottom: 30px;
	}
	li.line-height-10 {
    line-height: 1.2em;
    list-style: none;
    text-align: center;
	}
	
	#footer a {
    font-size: 13px !important;
    color: #cd7291 !important;
    font-weight: 600;
    line-height: 24px;
	}
</style>

<?php 
	$this->common_model->user_ip_block();
	if(base_url()=='http://192.168.1.111/mega_matrimony/original_script/'){
		$uri_segment_check_red = $this->uri->segment(1);
		if(isset($uri_segment_check_red) && $uri_segment_check_red!=''){
			$uri_segment_check_red = $this->uri->segment(1);
		}
		else{
			$uri_segment_check_red = basename($_SERVER['PHP_SELF']);
		}
		if(isset($uri_segment_check_red) && $uri_segment_check_red!='' && $uri_segment_check_red!="blocked"){
			$details = $this->common_model->add_user_analysis();
		}
	}
	$ver_cont = '1.64512';
	$logo_url = 'front_end/images/logo/logo-3.png';
	if(isset($config_data['upload_logo']) && $config_data['upload_logo'] !=''){
		$logo_url = 'logo/'.$config_data['upload_logo'];
	}
	$is_login = $this->common_front_model->checkLogin('return');
?>
<!--<div class="clearfix"></div>
	<div class="container-fluid back-img">
    <div class="container">
	<?php
		$horizontal_banner_url='';
		$other_banner = $this->common_model->get_count_data_manual('other_banner',array('status'=>'APPROVED'),1,'','id desc');
		if(isset($other_banner) && $other_banner != '' && count($other_banner) > 0){
			$path_other_banner = $this->common_model->other_banner;
			if(isset($other_banner['horizontal_banner']) && $other_banner['horizontal_banner'] !='' && file_exists($path_other_banner.$other_banner['horizontal_banner'])){
				$horizontal_banner_url = $base_url.$path_other_banner.$other_banner['horizontal_banner'];
			}
		}
		else{
			$horizontal_banner_url='';
		}
	?>
	<?php if($horizontal_banner_url != ''){?>
		<img data-src="<?php echo $horizontal_banner_url; ?>" class="img-responsive text-center lazyload" src="<?php echo $horizontal_banner_url; ?>" alt="bm-usp" />
		<?php }else{?>
		<img data-src="<?php echo $base_url; ?>assets/front_end/images/bm-usp.png" class="img-responsive text-center lazyload" src="<?php echo $base_url; ?>assets/front_end/images/bm-usp.png" alt="bm-usp" />
	<?php } ?>
    </div>
</div>-->
<div class="clearfix"></div>
<div id="footer" class="section-space20" style="padding-bottom:0px;background-color:#fee0ec;">
    <div class="container">
        <?php
			$is_home_page = 'no';
			if(isset($this->common_model->class_name) && $this->common_model->class_name =='home'){
				$is_home_page = 'yes';
			}
			if($is_home_page == 'yes'){
			?>
		<?php }?>                
		<div class="row">
			
			<div class="col-md-4 col-sm-12 col-xs-12">
				<h6 class="title-h6 color-black">Quick Links</h6>
				<ul>
					<!--<li class="line-height-10">
						
						<a href="<?php //echo $base_url; ?>" class="font-12">24x7 Live help</a>
					</li>-->
					<li class="line-height-10">
						
						<a href="<?php echo $base_url; ?>contact" class="font-12">Contact us</a>
					</li>
					<li class="line-height-10">
						
						<a href="<?php echo $base_url; ?>faq" class="font-12">FAQs</a>
					</li>
					<li class="line-height-10">
						
						<a href="<?php echo $base_url;?>success-story" class="font-12">Success Stories</a>
					</li>
					<li class="line-height-10">
						
						<a href="<?php echo $base_url;?>mobile-matri" class="font-12">Mobile Matrimony</a>
					</li>
					<li class="line-height-10">
						
						<a href="<?php echo $base_url;?>premium-member" class="font-12">Payment Option</a>
					</li>
					<li class="line-height-10">
						
						<a href="<?php echo $base_url;?>demograph" class="font-12">Member Demographics</a>
					</li>
				</ul>
			</div>                    
			<div class="col-md-4 col-sm-12 col-xs-12">
				<h6 class="title-h6 color-black">Our Services</h6>
				<ul>
                    <?php
						$cms_pages_arr = $this->common_model->get_count_data_manual('cms_pages',array('is_deleted'=>'No','status'=>'APPROVED'),2,'page_title,page_url','page_title asc');
						if(isset($cms_pages_arr) && $cms_pages_arr !='' && is_array($cms_pages_arr) && count($cms_pages_arr) > 0){
							$cms_url_arr = array('about-us','refund-policy','report-misuse','privacy-policy','terms-condition');
							foreach($cms_pages_arr as $cms_pages_arr_val){
								if(in_array($cms_pages_arr_val['page_url'],array('faq-page','contact-us'))){
									continue;	
								}
								$cms_page_url = 'cms/index/'.$cms_pages_arr_val['page_url'];
								if(in_array($cms_pages_arr_val['page_url'],$cms_url_arr)){
									$cms_page_url = $cms_pages_arr_val['page_url'];
								}?>			
								<li class="line-height-10">
									
									<a href="<?php echo $base_url.$cms_page_url; ?>" class="font-12"><?php echo $cms_pages_arr_val['page_title']; ?></a>
								</li>
								<?php }
						}?>
						<li class="line-height-10">
                            
                            <a href="<?php echo $base_url.'blog'; ?>" class="font-12">Blog</a>
						</li>
				</ul>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12" style="background: #fdecf4;    padding: 16px;">
				<h6 class="title-h6 color-black">Contact Us</h6>
				<ul>
                   
                        <li class="line-height-10">
                            
                            <a href="javascript:void(0)" class="font-12" style="cursor:auto;"><?php if(isset($config_data['full_address']) && $config_data['full_address'] !='') {echo nl2br($config_data['full_address']);} ?>
							</a>
						</li>
                        
					
                    
				</ul>
			</div>
		</div>
        <?php if($is_home_page == 'yes'){?>
			
			<!--<div class="row row-center">
				<div class="col-md-12 col-sm-12 col-xs-12">						
                <div class="col-md-3 col-sm-12 col-xs-12">
				<h6 class="title-h6 color-black">PAYMENT METHOD :</h6>
				<div class="row">
				<a href="<?php echo $base_url;?>premium-member"><img data-src="<?php echo $base_url; ?>assets/front_end/images/money.png" class="img-responsive lazyload" src="<?php echo $base_url; ?>assets/front_end/images/money.png" alt="mobile-apps" /></a>
				</div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
				<div class="row">
				
				<img data-src="<?php echo $base_url; ?>assets/front_end/images/perc-secure.png" class="img-responsive lazyload" src="<?php echo $base_url; ?>assets/front_end/images/perc-secure.png" alt="mobile-apps" style="box-shadow:0 1px 2px rgba(43,59,93,0.29);" />
				
				</div>
				</div>
                <div class="col-md-3 col-sm-12 col-xs-12 hidden-xs hidden-sm">
				<div class="row pull-right">
				
				<img data-src="<?php echo $base_url; ?>assets/front_end/images/secure-payment1.png" class="img-responsive lazyload" src="<?php echo $base_url; ?>assets/front_end/images/secure-payment1.png" alt="mobile-apps" />
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
			</div>-->
			<?php
			}
		?>
	</div>
	
	<!--<div id="footer" class="section-space20" style="padding-bottom:0px;background-color:#f1f1f1;">
		<div class="container">
        <?php
			$is_home_page = 'no';
			if(isset($this->common_model->class_name) && $this->common_model->class_name =='home'){
				$is_home_page = 'yes';
			}
			if($is_home_page == 'yes'){
			?>
		<?php }?>                
		<div class="row">
		
		<div class="col-md-4 col-sm-12 col-xs-12">
		<h6 class="title-h6 color-black">Quick Links</h6>
		<ul>
		
		<li class="line-height-10">
		
		<a href="<?php echo $base_url; ?>contact" class="font-12">Contact us</a>
		</li>
		<li class="line-height-10">
		
		<a href="<?php echo $base_url; ?>faq" class="font-12">FAQs</a>
		</li>
		<li class="line-height-10">
		
		<a href="<?php echo $base_url;?>success-story" class="font-12">Success Stories</a>
		</li>
		<li class="line-height-10">
		
		<a href="<?php echo $base_url;?>mobile-matri" class="font-12">Mobile Matrimony</a>
		</li>
		<li class="line-height-10">
		
		<a href="<?php echo $base_url;?>premium-member" class="font-12">Payment Option</a>
		</li>
		<li class="line-height-10">
		
		<a href="<?php echo $base_url;?>demograph" class="font-12">Member Demographics</a>
		</li>
		</ul>
		</div>                    
		<div class="col-md-4 col-sm-12 col-xs-12">
		<h6 class="title-h6 color-black">Our Services</h6>
		<ul>
		<?php
			$cms_pages_arr = $this->common_model->get_count_data_manual('cms_pages',array('is_deleted'=>'No','status'=>'APPROVED'),2,'page_title,page_url','page_title asc');
			if(isset($cms_pages_arr) && $cms_pages_arr !='' && is_array($cms_pages_arr) && count($cms_pages_arr) > 0){
				$cms_url_arr = array('about-us','refund-policy','report-misuse','privacy-policy','terms-condition');
				foreach($cms_pages_arr as $cms_pages_arr_val){
					if(in_array($cms_pages_arr_val['page_url'],array('faq-page','contact-us'))){
						continue;	
					}
					$cms_page_url = 'cms/index/'.$cms_pages_arr_val['page_url'];
					if(in_array($cms_pages_arr_val['page_url'],$cms_url_arr)){
						$cms_page_url = $cms_pages_arr_val['page_url'];
					}?>			
                    <li class="line-height-10">
					
					<a href="<?php echo $base_url.$cms_page_url; ?>" class="font-12"><?php echo $cms_pages_arr_val['page_title']; ?></a>
                    </li>
					<?php }
			}?>
			<li class="line-height-10">
			
			<a href="<?php echo $base_url.'blog'; ?>" class="font-12">Blog</a>
			</li>
			</ul>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12">
			<h6 class="title-h6 color-black">Contact Us</h6>
			<ul>
			<?php
				if(!$is_login){?>
				<li class="line-height-10">
				
				<a href="<?php echo $base_url;?>register" class="font-12">Register</a>
				</li>
				<li class="line-height-10">
				
				<a href="<?php echo $base_url;?>login" class="font-12">Log In</a>
				</li>
			<?php }?>
			<li class="line-height-10">
			
			<a href="<?php echo $base_url;?>event" class="font-12">Events</a>
			</li>
			<li class="line-height-10">
			
			<a href="<?php echo $base_url;?>wedding-vendor" class="font-12">Vendor</a>
			</li>
			<li class="line-height-10">
			
			<a href="<?php echo $base_url;?>add-with-us" class="font-12">Advertise With us</a>
			</li>
			</ul>
            </div>
			</div>
			
			</div>
			
	</div>-->
    <div class="tiny-footer margin-top-0">
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
	function open_profile_chat(id)
	{
	window.open('<?php echo $base_url.'search/view-profile/' ?>'+id);
	}
</script>

<!--===========================FreiChat START=========================-->
<!--	For uninstalling ME , first remove/comment all FreiChat related code i.e below code Then remove FreiChat tables frei_session & frei_chat if necessary The best/recommended way is using the module for installation -->
<?php
	
	$user_data = $this->common_front_model->get_session_data();
	//print_r($user_data);
	$plan_status = '';
	if(isset($user_data['id']) && $user_data['id'] !='')
	{
		$user_id = $user_data['id'];
	}
	if(isset($user_data['plan_status']) && $user_data['plan_status'] !='')
	{
		$plan_status = $user_data['plan_status'];
	}
	if($plan_status =='Paid' && isset($user_data['plan_chat']) && $user_data['plan_chat'] =='No')
	{
		$plan_status ='Paid_NOCHAT';
	}
	
	if(isset($user_id) && $user_id !='')
	{
		$ses = $user_id;
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
	<script src="<?php echo $base_url;?>/freichat/client/main.php?id=<?php echo $ses;?>&xhash=<?php echo freichatx_get_hash($ses); ?>"></script>
	<link rel="stylesheet" href="<?php echo $base_url;?>/freichat/client/jquery/freichat_themes/freichatcss.php" type="text/css">    
	<?php
	}
	//echo '<pre>';
	//print_r($_SESSION);
	//print_r($_COOKIE);
	//echo '</pre>';
?>


<input type="hidden" id="hidd_plan_status" value="<?php if(isset($plan_status) && $plan_status !=''){ echo $plan_status;} ?>" />
<!--===========================FreiChatX END=========================-->
</body>
</html>