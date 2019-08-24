<?php $ver_cont = '1.999999';?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php  if(isset($seo_title) && $seo_title !=''){ echo $seo_title; }else{ if(isset($page_title) && $page_title !=''){echo $page_title;} else { if(isset($config_data['website_title']) && $config_data['website_title'] !=''){ echo $config_data['website_title'];} } }?></title>
		<meta name="description" content="<?php  if(isset($seo_description) && $seo_description !=''){ echo $seo_description;}else{ if(isset($config_data['website_description']) && $config_data['website_description'] !=''){ echo $config_data['website_description'];} } ?>" />
		<meta name="keywords" content="<?php if(isset($seo_keywords) && $seo_keywords !=''){ echo $seo_keywords;}else{ if(isset($config_data['website_keywords']) && $config_data['website_keywords'] !=''){ echo $config_data['website_keywords'];} } ?>" />
		<meta property="og:title" content="<?php if(isset($og_title) && $og_title !=''){ echo $og_title; }else{ if(isset($page_title) && $page_title !=''){echo $page_title;} else { if(isset($config_data['website_title']) && $config_data['website_title'] !=''){ echo $config_data['website_title'];} } }?>">
		<meta property="og:description" content="<?php if(isset($og_description) && $og_description !=''){ echo $og_description;}else{ if(isset($config_data['website_description']) && $config_data['website_description'] !=''){ echo $config_data['website_description'];} } ?>">
		<meta property="og:image" content="<?php if(isset($og_image) && $og_image !=''){ echo $base_url.'assets/ogimg/'.$og_image;}else{ echo $base_url.'logo/'.$config_data['upload_logo'];}?>">
		
		<?php if(isset($config_data['upload_favicon']) && $config_data['upload_favicon'] !=''){ ?>
			<link rel="shortcut icon" href="<?php echo $base_url.'assets/logo/'.$config_data['upload_favicon']; ?>" />
		<?php } ?>
		<link href="<?php echo $base_url; ?>assets/front_end/css/bootstrap.css?ver=<?php echo $ver_cont;?>" rel="stylesheet"/>
		<link href="<?php echo $base_url; ?>assets/front_end/css/bootstrap.min.css?ver=<?php echo $ver_cont;?>" rel="stylesheet"/>
		<link href="<?php echo $base_url; ?>assets/front_end/css/style.css?ver=<?php echo $ver_cont;?>" rel="stylesheet"/>
		<link href="<?php echo $base_url; ?>assets/front_end/css/animate.css?ver=<?php echo $ver_cont;?>" rel="stylesheet"/>
		<link href="<?php echo $base_url; ?>assets/front_end/css/responsive.css?ver=<?php echo $ver_cont;?>" rel="stylesheet"/>
		<?php 
			
			$is_login = $this->common_front_model->checkLogin('return');
			if(isset($this->common_model->extra_css_fr) && $this->common_model->extra_css_fr !='' && count($this->common_model->extra_css_fr) > 0)
			{
				$extra_css_fr = $this->common_model->extra_css_fr;
				foreach($extra_css_fr as $extra_css_fr_val)
				{
				?>
				<link rel="stylesheet" href="<?php echo $base_url.'assets/front_end/'.$extra_css_fr_val; ?>" />
				<?php
				}
			}
			$body_class = '';
			if(isset($this->common_model->is_body_class) && $this->common_model->is_body_class !='' && $this->common_model->is_body_class =='Yes')
			{
				$body_class = 'body-banner';
			}
			if(isset($this->common_model->is_body1_class) && $this->common_model->is_body1_class !='' && $this->common_model->is_body1_class =='Yes')
			{
				$body_class = 'body-banner1';
			}
			$is_home_page = '';
			if(isset($this->common_model->is_home_page) && $this->common_model->is_home_page !='' && $this->common_model->is_home_page =='Yes')
			{
				$is_home_page = 'Yes';
			}
			$logo_url = 'front_end/images/logo/logo-3.png';
			if(isset($config_data['upload_logo']) && $config_data['upload_logo'] !='')
			{
				$logo_url = 'logo/'.$config_data['upload_logo'];
			}
			$website_title = 'Welcome to Matrimony';
			if(isset($config_data['website_title']) && $config_data['website_title'] !='')
			{
				$website_title = $config_data['website_title'];
			}
			if($is_login)
			{
				$user_name = $this->common_front_model->get_session_data('username');
				if(strlen($user_name) > 17)
				{
					$user_name = substr($user_name,0,14).'..';
				}
				$before_login_top_menu = $my_home = $my_match = $my_profile = $my_search = '';
				$change_password = $my_dashboard = $premium_member = $event = $contact = '';
				$profile_right = '';
				
				$class_name_curr = $this->common_model->class_name;
				
				if($class_name_curr == 'my_dashboard'){
					$my_dashboard = 'active';
					}elseif($class_name_curr == 'matches'){
					$my_match = 'active';
					}elseif($class_name_curr == 'my_profile' || $class_name_curr == 'message' || $class_name_curr == 'express_interest' || $class_name_curr == 'upload' || $class_name_curr == 'modify_photo' || $class_name_curr == 'express_interest'){
					$my_profile = 'active';
					}elseif($class_name_curr == 'search'){
					$my_search = 'active';
					}elseif($class_name_curr == 'change_password'){
					$change_password = 'active';
					}elseif($class_name_curr == 'premium_member'){
					$premium_member = 'active';
					}elseif($class_name_curr == 'event'){
					$event = 'active';
					}elseif($class_name_curr == 'contact'){
					$contact = 'active';
					}elseif($class_name_curr == 'privacy_setting'){
					$profile_right = 'active';
				}
				
				$main_menu_str = '
				<li class="'.$my_dashboard.'"><a href="'.$base_url.'my-dashboard">My Home</a></li>
				<li class="'.$my_profile.'"><a href="javascript:;">My Profile</a>
				<ul>
				<li><a href="'.$base_url.'my-profile">View Profile</a></li>
				<li><a href="'.$base_url.'my-profile/edit-profile">Edit Profile</a></li>
				<li><a href="'.$base_url.'message">My Messages</a></li>
				<li><a href="'.$base_url.'express-interest">My Express Interest</a></li>
				<li><a href="'.$base_url.'upload/video">Upload Video</a></li>
				<li><a href="'.$base_url.'modify-photo">Upload Photo</a></li>
				<li><a href="'.$base_url.'upload/cover-photo">Upload Cover Photo</a></li>
				
				<li><a href="'.$base_url.'upload/id_proof">Upload ID Proof</a></li>
				</ul>
				</li>
				
				<li class="'.$my_match.'"><a href="javascript:;">Matches</a>
				<ul>
				<li><a href="'.$base_url.'matches">Matches</a></li>
				<li><a href="'.$base_url.'matches/received-match-from-admin">Received Match From Admin</a></li>
				</ul>
				</li>
				<li class="'.$my_search.'"><a href="javascript:;">Search</a>
				<ul>
				<li><a href="'.$base_url.'search/quick">Quick Search</a></li>
				<li><a href="'.$base_url.'search/advance">Advance Search</a></li>
				<li><a href="'.$base_url.'search/keyword">Keyword Search</a></li>
				<li><a href="'.$base_url.'search/id">Id Search</a></li>
				<li><a href="'.$base_url.'search/saved">My Saved Searches</a></li>
				</ul>
				</li>
				<li class="'.$premium_member.'"><a href="javascript:;">UpGrade</a>
				<ul>
				<li><a href="'.$base_url.'premium-member">Payment Options</a></li>
				<li><a href="'.$base_url.'premium-member/current-plan">Current Plan</a></li>
				</ul>
				</li>
				<li class="'.$event.'"><a href="'.$base_url.'event">Events</a></li>
				<li class="'.$contact.'"><a href="javascript:;">Help?</a>
				<ul>
				<li><a href="'.$base_url.'contact">Contact Us</a></li>
				<li><a href="'.$base_url.'contact/admin">Contact To Admin</a></li>
				</ul>
				</li>
				<li class="'.$profile_right.'"><a href="javascript:;"><i class="fa fa-user"></i> '.$user_name.'</a>
				<ul>
				<li><a href="'.$base_url.'my-profile/edit-profile"><i class="glyphicon glyphicon-pencil ne_mrg_ri8_10 border-rgt-1px-lgt-grey"></i> Edit My Profile</a></li>
				<li class="">
				<a href="'.$base_url.'privacy-setting">
				<i class="glyphicon glyphicon-lock ne_mrg_ri8_10 border-rgt-1px-lgt-grey"></i>My Privacy Setting
				</a>
				</li>
				<li class="">
				<a href="'.$base_url.'privacy-setting/index/change-password">
				<i class="glyphicon glyphicon-wrench ne_mrg_ri8_10 border-rgt-1px-lgt-grey"></i>Change Password
				</a>
				</li>
				
				<li>
				<a href="'.$base_url.'my-profile/delete_request_to_admin">
				<i class="glyphicon glyphicon-trash ne_mrg_ri8_10 border-rgt-1px-lgt-grey"></i>Delete Profile
				</a>
				</li>
				<li class="">
				<a href="'.$base_url.'login/log-out">
				<i class="glyphicon glyphicon-log-out ne_mrg_ri8_10 border-rgt-1px-lgt-grey"></i>Logout
				</a>
				</li>
				</ul>
				</li>
				';
			}
			else
			{
				
				$home = $cms = $my_search = $register = $premium_member = $contact =  $success_story = '';
				
				$class_name_curr = $this->common_model->class_name;
				
				if($class_name_curr == 'home'){
					$home = 'active';
					}elseif($class_name_curr == 'cms'){
					$cms = 'active';
					}elseif($class_name_curr == 'search'){
					$my_search = 'active';
					}elseif($class_name_curr == 'register'){
					$register = 'active';
					}elseif($class_name_curr == 'premium_member'){
					$premium_member = 'active';
					}elseif($class_name_curr == 'contact'){
					$contact = 'active';
					}elseif($class_name_curr == 'success_story'){
					$success_story = 'active';
				}
				$contact_no = 'N/A';
				if(isset($config_data['contact_no']) && $config_data['contact_no'] !='') { $contact_no = $config_data['contact_no'];}
				$from_email = 'N/A';
				if(isset($config_data['from_email']) && $config_data['from_email'] !='') { $from_email = $config_data['from_email'];}
				$before_login_top_menu = '
				<li><a href="'.$base_url.'contact">Helpline '.$contact_no.' </a></li>
				<li><a href="'.$base_url.'contact">Email: '.$from_email.'</a></li>
				<li><a href="'.$base_url.'login" style="color:#d96d00;"><strong>Login</strong></a></li>
				<li><a href="'.$base_url.'register" style="color:#d96d00;"><strong>Free Registration</strong></a></li>
				';
				
				$main_menu_str = '
				<li class="'.$home.'"><a href="'.$base_url.'"> Home</a></li>
				<li class="'.$register.'"><a href="'.$base_url.'register">Register Now</a></li>
				<li class="'.$my_search.'"><a href="javascript:;">Search</a>
				<ul>
				<li><a href="'.$base_url.'search/quick">Quick Search</a></li>
				<li><a href="'.$base_url.'search/advance">Advance Search</a></li>
				<li><a href="'.$base_url.'search/keyword">Keyword Search</a></li>
				<li><a href="'.$base_url.'search/id">Id Search</a></li>
				</ul>
				</li>
				<li class="'.$premium_member.'"><a href="javascript:;">UpGrade</a>
				<ul>
				<li><a href="'.$base_url.'premium-member">Payment Options</a></li>
				</ul>
				</li>
				<li class="'.$success_story.'"><a href="'.$base_url.'success-story">Success Story</a></li>
				<li class="'.$contact.'"><a href="'.$base_url.'contact">Contact Us</a></li>
				';
			}
			
			$top_menu_str = '<div class="container">
			<div class="row">
			<div class="col-md-5 top-message">
			<p>'.$website_title.'</p>
			</div>
			<div class="col-md-7 top-links">
			<ul class="listnone">
			'.$before_login_top_menu.'
			</ul>
			</div>
			</div>
            </div>';			
			$top_secound_menu_str = '<div class="container">
            <div class="row">
			<div class="col-md-3 logo">
			<div class="navbar-brand brand-m">
			<a href="'.$base_url.'"><img data-src="'.$base_url.'assets/'.$logo_url.'" src="'.$base_url.'assets/'.$logo_url.'" alt="'.$website_title.'" class="img-responsive lazyload" style="margin-top:5px;
			width:67%;"></a>
			</div>
			</div>
			<div class="col-md-9">
			<div class="navigation" id="navigation">
			<ul>'.$main_menu_str.'</ul>
			</div>
			</div>
            </div>
			</div>';
			$display_top_menu_perm = 1;
			if(isset($this->common_model->display_top_menu_perm) && $this->common_model->display_top_menu_perm !='' && $this->common_model->display_top_menu_perm =='No')
			{
				$display_top_menu_perm = 0;
			}
		?>
	</head>
    
	<body class="<?php echo $body_class; ?>">    
		<?php
			if($is_home_page == 'Yes')
			{
				$style_trans ='';
				$nav_fix = 'navbar-fixed-top';
				if($body_class !='')
				{
					$nav_fix ='';
					$style_trans = 'style="background:transparent;"';
				}
			?>
			<div class="header-v2 <?php echo $nav_fix; ?>">
				<?php if($display_top_menu_perm == 1){ ?>
					<div class="top-bar-transparent" <?php echo $style_trans; ?> >
						<?php  echo $top_menu_str;?>
					</div>
					<?php 
					} 
				echo $top_secound_menu_str;?>
			</div>
			<?php			
			}
			else
			{
				if($display_top_menu_perm == 1)
				{
				?>
				<div class="top-bar-transparent">            
					<?php  echo $top_menu_str;?>
				</div>
				<?php 
				} 
			?>
			<div class="header">
				<?php  echo $top_secound_menu_str;?>
			</div>
			<?php
			}
		?>			

<style>
@media (min-width: 1000px) {
.tickertop{
	margin-top:80px;
}
}
</style>


<?php
$this->db->where('id','1');
$query = $this->db->get('ticker_master');			
$ticker = $query->row();
if(isset($ticker->title) && trim($ticker->title)!=''){
	if(isset($home)){
?>
<div class="tickertop"></div>
	<?php }?>
<div class="tiny-footer margin-top-0" style="padding-top:5px;padding-bottom:0px;background-color:#ec3483;clear:both;position:relative;">
        <div class="container">
			<marquee>
				<div class="row">
					<div class="col-md-12" style="color:#fec7df;font-weight:bold;"><?php echo $ticker->title?></div>
				</div>
			</marquee>
		</div>
</div>
<?php } ?>