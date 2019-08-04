<?php ob_start(); 
// added in v4.0.0
//error_reporting(E_ALL);
if (version_compare(PHP_VERSION, '5.4.0', '<')) {
  throw new Exception('The Facebook SDK v4 requires PHP version 5.4 or higher.');
}

/**
 * Register the autoloader for the Facebook SDK classes.
 * Based off the official PSR-4 autoloader example found here:
 * https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader-examples.md
 *
 * @param string $class The fully-qualified class name.
 * @return void
 */
spl_autoload_register(function ($class)
{
  // project-specific namespace prefix
  $prefix = 'Facebook\\';

  // base directory for the namespace prefix
  $base_dir = defined('FACEBOOK_SDK_V4_SRC_DIR') ? FACEBOOK_SDK_V4_SRC_DIR : __DIR__ . '/src_facebook/Facebook/';

  // does the class use the namespace prefix?
  $len = strlen($prefix);
  if (strncmp($prefix, $class, $len) !== 0) {
    // no, move to the next registered autoloader
    return;
  }

  // get the relative class name
  $relative_class = substr($class, $len);

  // replace the namespace prefix with the base directory, replace namespace
  // separators with directory separators in the relative class name, append
  // with .php
  $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

  // if the file exists, require it
  if (file_exists($file)) {
    require $file;
  }
});

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;

// init app with app id and secret 
$client_key = "";
$client_secret = "";
if(isset($fb_detail['client_key']) && $fb_detail['client_key']!=''){
	$client_key = $fb_detail['client_key']; 
}
if(isset($fb_detail['client_secret']) && $fb_detail['client_secret']!=''){
	$client_secret = $fb_detail['client_secret'];
}
FacebookSession::setDefaultApplication( $client_key,$client_secret );
// login helper with redirect_uri	

    $helper = new FacebookRedirectLoginHelper(''.$base_url.'register/fb-signup' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest($session, 'GET', '/me?fields=email,first_name,last_name,gender,birthday' );
  $response = $request->execute();
  // get response
 
  		$graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	  	$first_name = $graphObject->getProperty('first_name'); // To Get Facebook first name
		$last_name = $graphObject->getProperty('last_name'); // To Get Facebook first name
	    $femail = $graphObject->getProperty("email");   // To Get Facebook email ID
		$gender = $graphObject->getProperty("gender");
		//$graphObject->getProperty("bio");
		$bio =  '';
		$fb_birthday = $graphObject->getProperty("birthday");
		$month='';
		$day='';
		$year='';
		if($fb_birthday!='')
		{
			$org=explode('/',$fb_birthday);
			if(isset($org[0]))
			{
				$month=$org[0];
			}
			if(isset($org[1]))
			{
				$day=$org[1];
			}
			if(isset($org[2]))
			{
				$year=$org[2];
			}
		}
		//$this->db->where('fb_id', $fbid);
		//$this->db->or_where('email', $femail);
		$where = "(fb_id='".$fbid."'  or email='".$femail."' ) AND is_deleted!='Yes'";
		$this->db->where($where);
		$this->db->limit(1);
		$query = $this->db->get('register');
			 if($query->num_rows() > 0)
			 {///exist=yes
			      //$this->session->set_flashdata('mega_user_data', "You are already register with us, please login now");
				  if($femail!='')
				  {

					$chkemail=" or email='".$femail."'";
				  }
				  else
				  {
					$chkemail= "";   
				  }
				   $where = "(fb_id='".$fbid."' $chkemail) AND is_deleted!='Yes'";
				   $this->db->where($where);
				   $this->db->select('id, matri_id, status, email, username, firstname, lastname, photo1, plan_name, plan_status, gender,  password, mobile, mobile_verify_status');
				   $query = $this->db->get('register');
				   $reg_data = $query->row_array();
				   if($query->num_rows() > 0 && count($reg_data) > 0)
         			{
						 if($reg_data['status']!='UNAPPROVED')
						 {
							$row_data = $reg_data;
							$this->db->set('last_login', $login_dt);
							$where_arra = array(
								'id'=>$row_data['id']
							);
							$this->table_name = 'register';
							$data_array = array('last_login'=>$login_dt);
							$row_data1 = $this->common_model->update_insert_data_common($this->table_name, $data_array, $where_arra);
							
							$ip_address = $_SERVER['REMOTE_ADDR'];
							$data_array123 = array(
								'matri_id'=>$row_data['matri_id'],
								'email'=>$row_data['email'],
								'login_at'=>$login_dt,
								'ip_address'=>$ip_address
							);
							$response1 = $this->common_front_model->save_update_data('user_login_history',$data_array123);
							$where_online_users = array('index_id'=>$row_data['id']);
							$row_data_online_users = $this->common_model->get_count_data_manual('online_users',$where_online_users,0,'','','','',0);
							if($row_data_online_users == 0 && $row_data_online_users == ''){
								$ip = $_SERVER['REMOTE_ADDR'];
								$dt = $this->common_model->getCurrentDate();
								$data_array1 = array('ip'=>$ip,'username'=>$row_data['username'],'gender'=>$row_data['gender'],'index_id'=>$row_data['id'],'dt'=>$dt);
								$row_data1 = $this->common_model->update_insert_data_common('online_users', $data_array1, '',0);
							}
							if(isset($row_data['photo1']) && $row_data['photo1'] !='' && file_exists($this->common_model->path_photos.$row_data['photo1']))
							{
								$row_data['photo1'] = base_url().$this->common_model->path_photos.$row_data['photo1'];
							}
							else
							{
								if(isset($row_data['gender']) && $row_data['gender'] =='Male')
								{
									$row_data['photo1'] = base_url().'assets/front_end/images/icon/border-male.gif';
								}
								else
								{
									$row_data['photo1'] = base_url().'assets/front_end/images/icon/border-female.gif';
								}
							}
							$this->session->set_userdata('mega_user_data', $row_data);
							
							redirect($this->base_url.'my-profile');
							exit();				
						  }
						  else
						  {
							 $this->session->set_flashdata('user_log_err', "Your account is under review, please contact to admin.");
							 redirect($base_url.'login');
						  }
        			 }
			 }
			 
    $url = 'http://graph.facebook.com/'.$fbid.'/picture?type=large';
	$data = file_get_contents($url);
	$fileName = time().'.jpg';
	$file = fopen('/home/narjireu/public_html/www.trialme.in/megamatrimony/assets/photos_big/'.$fileName, 'w+');
	$fl=fputs($file, $data);	
	fclose($file);//
	
	$file = fopen('/home/narjireu/public_html/www.trialme.in/megamatrimony/assets/photos/'.$fileName, 'w+');
	$fl=fputs($file, $data);	
	fclose($file);//
	
	$user_fb_array = array(
		'FBID'	=> $fbid,
		'fb_first_name'	=> $first_name,
		'fb_last_name'	=>$last_name,
		'fb_email'	=> $femail,
		'fb_gender'	=> $gender,
		'fb_image_name'	=> $fileName,
		'fb_image'	=> $url,
		'month' =>  $month,
		'day' => $day,
		'year' => $year
	);
   $this->session->set_userdata('member_fb_data', $user_fb_array);
   if($this->session->userdata('member_gplus_data'))
	{
		$this->session->unset_userdata('member_gplus_data');
	}
	redirect($base_url.'register');
} 
else
 {
	$loginUrl = $helper->getLoginUrl(array(
   'scope' => 'email'
 ));
 
 header("Location: ".$loginUrl);
}
ob_flush();	
?>