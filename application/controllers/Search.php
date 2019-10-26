<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Search extends CI_Controller {
	public $data = array();
	
	public function __construct()
	{
		parent::__construct();
		$this->base_url = base_url();
		$this->data['base_url'] = $this->base_url;
		$this->load->model('front_end/search_model');
		$this->load->model('front_end/my_profile_model');
		$this->common_front_model->last_member_activity();
	}
	public function index()
	{
		$this->quick();
	}
	public function quick()
	{
		$this->session->unset_userdata('member_online_data');
		$this->common_model->extra_css_fr= array('css/mdb.min.css','css/chosen.css','css/responsive.css');
		$this->common_model->extra_js_fr= array ('js/chosen.jquery.js','js/jquery.validate.min.js','js/photo_protect_js.js');
		$seo_data = $this->common_model->get_count_data_manual('seo_page_data',array('status'=>'APPROVED','page_title'=>'Quick Search'),1,'*','','');
		$seo_title='';
		$seo_description ='';
		$seo_keywords='';
		$og_title = '';
		$og_description = '';
		$og_image = '';
		if(isset($seo_data['seo_title']) && $seo_data['seo_title'] !='')
		{
			$seo_title = $seo_data['seo_title'];
		}
		if(isset($seo_data['seo_description']) && $seo_data['seo_description'] !='')
		{
			$seo_description = $seo_data['seo_description'];
		}
		if(isset($seo_data['seo_keywords']) && $seo_data['seo_keywords'] !='')
		{
			$seo_keywords = $seo_data['seo_keywords'];
		}
		if(isset($seo_data['og_title']) && $seo_data['og_title'] !='')
		{
			$og_title = $seo_data['og_title'];
		}
		if(isset($seo_data['og_description']) && $seo_data['og_description'] !='')
		{
			$og_description = $seo_data['og_description'];
		}
		if(isset($seo_data['og_image']) && $seo_data['og_image'] !='')
		{
			$og_image = $seo_data['og_image'];
		}
		$this->common_model->front_load_header('','',$seo_title,$seo_description,$seo_keywords,$og_title,$og_description,$og_image);
		$this->load->view('front_end/quick_search');
		$this->common_model->front_load_footer();
	}
	public function advance()
	{	
		$this->session->unset_userdata('member_online_data');
		$this->common_model->extra_css_fr= array('css/mdb.min.css','css/chosen.css','css/responsive.css');
		$this->common_model->extra_js_fr= array ('js/chosen.jquery.js','js/jquery.validate.min.js','js/photo_protect_js.js');
		$seo_data = $this->common_model->get_count_data_manual('seo_page_data',array('status'=>'APPROVED','page_title'=>'Advance Search'),1,'*','','');
		$seo_title='';
		$seo_description ='';
		$seo_keywords='';
		$og_title = '';
		$og_description = '';
		$og_image = '';
		if(isset($seo_data['seo_title']) && $seo_data['seo_title'] !='')
		{
			$seo_title = $seo_data['seo_title'];
		}
		if(isset($seo_data['seo_description']) && $seo_data['seo_description'] !='')
		{
			$seo_description = $seo_data['seo_description'];
		}
		if(isset($seo_data['seo_keywords']) && $seo_data['seo_keywords'] !='')
		{
			$seo_keywords = $seo_data['seo_keywords'];
		}
		if(isset($seo_data['og_title']) && $seo_data['og_title'] !='')
		{
			$og_title = $seo_data['og_title'];
		}
		if(isset($seo_data['og_description']) && $seo_data['og_description'] !='')
		{
			$og_description = $seo_data['og_description'];
		}
		if(isset($seo_data['og_image']) && $seo_data['og_image'] !='')
		{
			$og_image = $seo_data['og_image'];
		}
		$this->common_model->front_load_header('','',$seo_title,$seo_description,$seo_keywords,$og_title,$og_description,$og_image);
		$this->load->view('front_end/advance_search',$this->data);
		$this->common_model->front_load_footer();
	}
	public function keyword()
	{	
		$this->session->unset_userdata('member_online_data');
		$this->common_model->extra_css_fr= array('css/mdb.min.css','css/responsive.css');
		$this->common_model->extra_js_fr= array ('js/jquery.validate.min.js','js/photo_protect_js.js');
		$seo_data = $this->common_model->get_count_data_manual('seo_page_data',array('status'=>'APPROVED','page_title'=>'Keyword Search'),1,'*','','');
		$seo_title='';
		$seo_description ='';
		$seo_keywords='';
		$og_title = '';
		$og_description = '';
		$og_image = '';
		if(isset($seo_data['seo_title']) && $seo_data['seo_title'] !='')
		{
			$seo_title = $seo_data['seo_title'];
		}
		if(isset($seo_data['seo_description']) && $seo_data['seo_description'] !='')
		{
			$seo_description = $seo_data['seo_description'];
		}
		if(isset($seo_data['seo_keywords']) && $seo_data['seo_keywords'] !='')
		{
			$seo_keywords = $seo_data['seo_keywords'];
		}
		if(isset($seo_data['og_title']) && $seo_data['og_title'] !='')
		{
			$og_title = $seo_data['og_title'];
		}
		if(isset($seo_data['og_description']) && $seo_data['og_description'] !='')
		{
			$og_description = $seo_data['og_description'];
		}
		if(isset($seo_data['og_image']) && $seo_data['og_image'] !='')
		{
			$og_image = $seo_data['og_image'];
		}
		$this->common_model->front_load_header('','',$seo_title,$seo_description,$seo_keywords,$og_title,$og_description,$og_image);
		$this->load->view('front_end/keyword_search',$this->data);
		$this->common_model->front_load_footer();
	}
	public function id()
	{	
		$this->common_model->extra_css_fr= array('css/mdb.min.css','css/responsive.css');
		$this->common_model->extra_js_fr= array ('js/jquery.validate.min.js','js/photo_protect_js.js');
		$seo_data = $this->common_model->get_count_data_manual('seo_page_data',array('status'=>'APPROVED','page_title'=>'Id Search'),1,'*','','');
		$seo_title='';
		$seo_description ='';
		$seo_keywords='';
		$og_title = '';
		$og_description = '';
		$og_image = '';
		if(isset($seo_data['seo_title']) && $seo_data['seo_title'] !='')
		{
			$seo_title = $seo_data['seo_title'];
		}
		if(isset($seo_data['seo_description']) && $seo_data['seo_description'] !='')
		{
			$seo_description = $seo_data['seo_description'];
		}
		if(isset($seo_data['seo_keywords']) && $seo_data['seo_keywords'] !='')
		{
			$seo_keywords = $seo_data['seo_keywords'];
		}
		if(isset($seo_data['og_title']) && $seo_data['og_title'] !='')
		{
			$og_title = $seo_data['og_title'];
		}
		if(isset($seo_data['og_description']) && $seo_data['og_description'] !='')
		{
			$og_description = $seo_data['og_description'];
		}
		if(isset($seo_data['og_image']) && $seo_data['og_image'] !='')
		{
			$og_image = $seo_data['og_image'];
		}
		$this->common_model->front_load_header('','',$seo_title,$seo_description,$seo_keywords,$og_title,$og_description,$og_image);
		$this->load->view('front_end/id_search',$this->data);
		$this->common_model->front_load_footer();
	}
	
	public function online_now()
	{			
		$member_data = $this->search_model->get_online_member_result();
		
		if(isset($member_data) && $member_data != ''){
			$this->session->set_userdata('member_online_data', $member_data);
		}else{
			$no_online = "No-Online";
			$this->session->set_userdata('NoOnline', $no_online);
		}
		$this->search_model->set_search();
		redirect(base_url().'search/result');
	}
	
	public function home_search()
	{	
		$this->search_model->set_search();
		$data1['tocken'] = $this->security->get_csrf_hash();
		$data1['status'] = 'success';
		$data['data'] = json_encode($data1);
		$this->load->view('common_file_echo',$data);
	}
	
	public function add_saved_search()
	{	
		$this->search_model->save_search();
	}
	
	public function search_now()
	{	
		$this->search_model->set_search();
		redirect(base_url().'search/result');
	}
	public function refine_search()
	{
		$this->search_model->set_search();
		$this->result();
	}
	public function result($page=1)
	{
		$this->common_front_model->set_orgin();
		$is_ajax = 0;
		if($this->input->post('is_ajax') && $this->input->post('is_ajax') !='')
		{
			$is_ajax = $this->input->post('is_ajax');
		}		
		// for web API
		$user_agent = $this->input->post('user_agent') ? $this->input->post('user_agent') : 'NI-WEB';
		if($user_agent!='NI-WEB')
		{
			$member_data = $this->search_model->get_search_result($page);
			//echo $this->db->last_query();
			$member_data_count = $this->search_model->get_search_count();
			$data1['continue_request'] = TRUE;
			$data1['tocken'] = $this->security->get_csrf_hash();
			$data1['status'] = 'success';
			$data1['total_count'] = $member_data_count;
			if(isset($member_data) && $member_data!='')
			{
				$data1['errormessage'] = 'Total Result found('.$member_data_count.')';
				$data1['errmessage'] = 'Total Result found('.$member_data_count.')';
				$data1['data'] = $this->common_front_model->process_data_app($member_data);
				//$data1['data'] = $member_data;
			}
			else
			{
				$data1['errormessage'] = 'No data found';
				$data1['errmessage'] = 'No data found';
				$data1['data'] = '';
				$data1['continue_request'] = FALSE;
			}
			$data['data'] = json_encode($data1);
			$this->load->view('common_file_echo',$data);
		}// for web API
		else
		{
			$this->data['member_total_count'] 	= $this->search_model->get_search_count();
			$this->data['member_data'] 			= $this->search_model->get_search_result($page);
			//echo $this->db->last_query();
			
			if($is_ajax == 0)
			{
				//$this->common_model->limit_per_page = 10;
				//$this->common_model->display_top_menu_perm = 'No';
				$this->common_model->extra_css_fr= array('css/mdb.min.css','css/hover-img.css','css/responsive.css','css/BootSideMenu.css','css/bootstrap-touch-slider.css');
				$this->common_model->extra_js_fr= array ('js/BootSideMenu.js','js/editor.js','js/jquery.validate.min.js','js/photo_protect_js.js');
				$this->common_model->front_load_header();
				$this->load->view('front_end/search_result',$this->data);
				$this->common_model->front_load_footer();
			}
			else
			{
				$this->load->view('front_end/search_result_member_profile',$this->data);
			}
		}
	}
	public function view_profile($matri_id = '')
	{		
		$current_login_user = $this->common_front_model->get_session_data();
		//print_r($current_login_user);exit;
		if(isset($matri_id) && $matri_id !='' && is_numeric($matri_id))
		{
			$where_arra=array('id'=>$matri_id,'is_deleted'=>'No',"status !='UNAPPROVED' and status !='Suspended'");
			$user_data_arr_mem = $this->common_model->get_count_data_manual('register',$where_arra,1,'matri_id','','','','');
			if(isset($user_data_arr_mem) && $user_data_arr_mem !='' && count($user_data_arr_mem)> 0)
			{
				$matri_id = $user_data_arr_mem['matri_id'];
			}
		}
		if(isset($current_login_user) && $current_login_user!='' && $current_login_user > 0 && $matri_id !='')
		{
			$user_id = $current_login_user['matri_id'];
			$where_arra_payment=array('matri_id'=>$user_id,'is_deleted'=>'No','current_plan' =>'Yes');
			$payment_data = $this->common_model->get_count_data_manual('payments_view',$where_arra_payment,1,'*','','','','');
			$total_profile = 0;
			$profile_used = 0;
			if(isset($payment_data) && $payment_data != '' && is_array($payment_data) && count($payment_data) > 0)
			{
				$total_profile = $payment_data['profile'];
				$profile_used = $payment_data['profile_used'];
			}
			
			$where_array_checker = array('my_id'=>$user_id,'viewed_id'=>$matri_id);
			$profile_checker = $this->common_model->get_count_data_manual('profile_checker',$where_array_checker,0,'','','','','','');
			
			if($profile_checker > 0 || (isset($payment_data) && $payment_data != '' && is_array($payment_data) && count($payment_data) > 0 && isset($total_profile) && isset($profile_used) && $total_profile > $profile_used))
			{
				if(isset($matri_id) && $matri_id!='')
				{
					$check_membership_plab_exp_date = $this->search_model->view_profile_details($matri_id);
					if($check_membership_plab_exp_date==0)
					{
						redirect(base_url().'premium-member');
					}
					else
					{
						$this->common_model->display_top_menu_perm ='No';
						$this->common_model->extra_css_fr= array('css/hover-img.css','css/mdb.min.css','css/bootstrap-touch-slider.css','css/BootSideMenu.css','css/chosen.css','css/editor.css');
						$this->common_model->extra_js_fr= array('js/BootSideMenu.js','js/chosen.jquery.js','js/editor.js','js/jquery.validate.min.js','js/photo_protect_js.js');
						$gender_curr = $this->common_front_model->get_session_data('gender');
						$where_arra=array('matri_id'=>$matri_id,'is_deleted'=>'No',"status !='UNAPPROVED' and status !='Suspended' and gender !='$gender_curr' ");
						$user_data_arr = $this->common_model->get_count_data_manual('register_view',$where_arra,1,'*','','','','');
						if(isset($user_data_arr) && $user_data_arr!='' && $user_data_arr > 0)
						{
							if($profile_checker == 0)
							{
								$created_on = $this->common_model->getCurrentDate();
								$insert_profile_checker = $this->common_model->update_insert_data_common('profile_checker',array('my_id' => $user_id,'viewed_id' => $matri_id,'date' => $created_on),'',0);
								$this->common_front_model->update_plan_detail($current_login_user['matri_id'],'profile');
								$insert_who_viewed = $this->common_model->update_insert_data_common('who_viewed_my_profile',array('my_id' => $user_id,'viewed_member_id' => $matri_id,'created_on' => $created_on),'',0);
							}
							$data['member_data'] = $this->my_profile_model->get_my_profile();
							$data['user_data']= $user_data_arr;
							$check_permission_view=array('ph_requester_id'=>$user_id,'ph_receiver_id '=>$matri_id,'receiver_response'=>'Accepted','status'=>'1');
							$data['photo_view_count'] = $this->common_model->get_count_data_manual('photoprotect_request',$check_permission_view,0,'*','','','','');
							
							$this->common_model->front_load_header();
							$this->load->view('front_end/user_profile',$data);
							$this->load->view('front_end/photo_protect',$data);
							$this->common_model->front_load_footer();
						}
						else
						{
							redirect(base_url().'search');
						}
					}
				}
				else
				{
					redirect(base_url().'search');
				}
			}
			else
			{
				redirect(base_url().'premium-member');
			}
		}
		else
		{
			redirect($this->common_model->base_url.'login');
		}
	}
	
	public function get_list()
	{
		$from = $this->input->post('listfrom');
		$to = $this->input->post('listto');
		$value = $this->input->post('value');
		$value_to = $this->input->post('value_to');
		$this->data['data'] = $this->search_model->get_list($from,$to,$value,$value_to);
		$this->load->view('common_file_echo',$this->data);
	}
	public function saved($page=1)
	{
		$is_ajax = 0;
		if($this->input->post('is_ajax') && $this->input->post('is_ajax') !='')
		{
			$is_ajax = $this->input->post('is_ajax');
		}
		
		// for web API
		$user_agent = $this->input->post('user_agent') ? $this->input->post('user_agent') : 'NI-WEB';
		if($user_agent!='NI-WEB')
		{
			$saved_data = $this->search_model->saved_searches(1,$page);
			$saved_data_count = $this->search_model->saved_searches(0);
			
			$data1['continue_request'] = TRUE;
			$data1['tocken'] = $this->security->get_csrf_hash();
			$data1['status'] = 'success';
			$data1['total_count'] = $saved_data_count;
			if(isset($saved_data) && $saved_data!='')
			{
				$data1['errormessage'] = 'Total Result found('.$saved_data_count.')';
				$data1['errmessage'] = 'Total Result found('.$saved_data_count.')';
				$data1['data'] = $saved_data;
			}
			else
			{
				$data1['errormessage'] = 'No data found';
				$data1['errmessage'] = 'No data found';
				$data1['data'] = '';
				$data1['continue_request'] = FALSE;
			}
			$data['data'] = json_encode($data1);
			$this->load->view('common_file_echo',$data);
		
		}else{
		
			$data['base_url']=$this->data['base_url'];		
			$this->data['page_name'] = 'Saved Searches';
			$this->data['shortlist_data_count'] = $this->search_model->saved_searches(0);
			$this->data['shortlist_data'] = $this->search_model->saved_searches(1,$page);
			if($is_ajax == 0)
			{	
				$this->common_model->display_top_menu_perm ='No';
				$this->common_model->extra_css_fr= array('css/hover-img.css','css/bootstrap-touch-slider.css','css/BootSideMenu.css','css/mdb.min.css','css/chosen.css');
				$this->common_model->extra_js_fr= array('js/chosen.jquery.js','js/BootSideMenu.js','js/jquery.validate.min.js','js/photo_protect_js.js');
				$this->common_model->front_load_header('Saved Searches');
				$this->load->view('front_end/saved_searches',$this->data);
				$this->common_model->front_load_footer();
			}
			else
			{	
				$this->load->view('front_end/saved_searches_member_profile',$this->data);
			}
		}
	}
	public function saved_search_now($id='')
	{	
		if($id !='')
		{
			$_SERVER["REQUEST_METHOD"] = "POST";
			$return = $this->search_model->set_saved_search($id);
			if($return)
			{
				redirect(base_url().'search/result');
			}
			else
			{
				redirect(base_url().'search/quick');
			}
		}
		else
		{
			redirect(base_url().'search/quick');
		}
	}
	public function delete_saved_search()
    {
        $this->search_model->delete_saved_search();
    }
	
	public function add_remove_shortlist_app()
    {
		$shortlist_action = $this->input->post('shortlist_action');
		
		if($shortlist_action != 'add'){
			$response = $this->search_model->remove_shortlist();
			$this->load->view('common_file_echo',$response);
		}else{
			$response = $this->search_model->add_shortlist();
			$this->load->view('common_file_echo',$response);
		}
	}
	public function blocklist()
    {
		$blacklist_action = $this->input->post('blacklist_action');
		
		if(isset($blacklist_action) && $blacklist_action != 'add'){
			$response = $this->search_model->remove_blocklist();
			$this->load->view('common_file_echo',$response);
		}else{
			$response = $this->search_model->add_blocklist();
			$this->load->view('common_file_echo',$response);
		}
	}
	
	public function add_blocklist()
    {
		$response = $this->search_model->add_blocklist();
		$this->load->view('common_file_echo',$response);
    }
	public function remove_blocklist()
    {
		$response = $this->search_model->remove_blocklist();
		$this->load->view('common_file_echo',$response);
    }
	public function add_shortlist()
    {
		$response = $this->search_model->add_shortlist();
		$this->load->view('common_file_echo',$response);
    }
	public function remove_shortlist()
    {
		$response = $this->search_model->remove_shortlist();
		$this->load->view('common_file_echo',$response);
    }
	public function express_interest_sent()
    {
		$response = $this->search_model->express_interest_sent();
		$this->load->view('common_file_echo',$response);
    }
	
	public function send_email()
    {	
		$to_email='';
		$subject = '';
		$message = '';
		if($this->input->post('receiver_email') != ''){
			$to_email = $this->input->post('receiver_email');
		}
		if($this->input->post('email_subject') != ''){
			$subject = $this->input->post('email_subject');
		}
		if($this->input->post('email_message') != ''){
			$message = $this->input->post('email_message');
		}
		$data['result'] = $this->common_model->common_send_email($to_email,$subject,$message,'','','');
		
		
		if($data['result'] == 'Email sent.'){
			$data['response'] = 'Email Sent Successfully.';
			$data['status'] = 'success';
        }else{
			$data['response'] = 'Email Not Sent.';
			$data['status'] = 'fail';
		}
		$data['tocken'] = $this->security->get_csrf_hash();
		$data1 = json_encode($data);
		$data['data'] = $data1;
        $this->load->view('common_file_echo',$data);
    }
	
	function member_like()
	{
		$data = $this->search_model->member_like();
		$data1['data'] = json_encode($data);
		$this->load->view('common_file_echo',$data1);
	}
	
	function total_likes_unlikes()
	{
		$other_id = $this->input->post('other_id');
		$likes_array = array('like_status'=>'Yes','other_id'=>$other_id);
		$data['total_likes'] = $this->common_model->get_count_data_manual('member_likes',$likes_array,0,'');
		
		$unlikes_array = array('like_status'=>'No','other_id'=>$other_id);
		$data['total_unlikes'] = $this->common_model->get_count_data_manual('member_likes',$unlikes_array,0,'');
		
		//$may_be_array = array('like_status'=>'May be','other_id'=>$other_id);
		//$data['total_may_be'] = $this->common_model->get_count_data_manual('member_likes',$may_be_array,0,'');
		
		$data['tocken'] = $this->security->get_csrf_hash();
		$data['status'] = 'success';
		$data1['data'] = json_encode($data);
		$this->load->view('common_file_echo',$data1);
	}
	
	function view_contact_details(){
		$this->search_model->view_contact_details();
	}
	
	function view_video(){
		$this->search_model->view_video();
	}
	
	function photo_password($member_id=''){
		$current_login_user = $this->common_front_model->get_session_data();
		if(isset($current_login_user) && $current_login_user!='' && $current_login_user > 0)
		{
			if(isset($member_id) && $member_id != ''){
				$this->data['current_login_user'] = $this->common_front_model->get_session_data('matri_id');
				$this->data['member_id'] = $member_id;
			
				$this->load->view('front_end/send_photo_password',$this->data);
			}else{
				redirect(base_url().'my-dashboard');
			}
		}else{
			redirect($this->common_model->base_url.'login');
		}
	}
	
	function send_photo_password_request(){
		$response = $this->search_model->send_photo_password_request();
		$this->load->view('common_file_echo',$response);
	}

	function already_password($member_id=''){
		$current_login_user = $this->common_front_model->get_session_data();
		if(isset($current_login_user) && $current_login_user!='' && $current_login_user > 0)
		{
			if(isset($member_id) && $member_id != ''){
				$this->data['current_login_user'] = $this->common_front_model->get_session_data('matri_id');
				$this->data['member_id'] = $member_id;
			
				$this->load->view('front_end/view_protect_photo_form',$this->data);
			}else{
				redirect(base_url().'search/photo-password/'.$member_id);
			}
		}else{
			redirect($this->common_model->base_url.'login');
		}
	}
	
	function check_photo_request(){
		
		$member_id = $this->input->post('member_id');
		$my_id = $this->input->post('my_id');
		$data['data'] = $this->search_model->check_photo_request();
		$data1 = json_decode($data['data'], true);
		
		$is_post = 0;
		if($this->input->post('is_post'))
		{
			$is_post = trim($this->input->post('is_post'));
		}
		if($is_post == 0)
		{
			$this->load->view('common_file_echo',$data);
		}
		else
		{
			if(isset($data1['errmessage']) && $data1['errmessage'] !='')
			{
				$this->session->set_flashdata('error_message_arr', $data1['errmessage']);
			}
			redirect($this->base_url.'search/already-password/'.$member_id);
		}
	}

	function check_photo_password(){
		
		$member_id = $this->input->post('member_id');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('photo_pswd', 'Photo Password', 'required');

		if ($this->form_validation->run() == FALSE)
        {
			$data1['token'] = $this->security->get_csrf_hash();
			$data1['errmessage'] =  validation_errors();
			$data1['status'] = 'error';
			$data['data'] = json_encode($data1);
		}
		else
		{
			$data['data'] = $this->search_model->check_photo_password();
			$data1 = json_decode($data['data'], true);
		
		}
		$is_post = 0;
		if($this->input->post('is_post'))
		{
			$is_post = trim($this->input->post('is_post'));
		}
		if($is_post == 0)
		{
			$this->load->view('common_file_echo',$data);
		}
		else
		{
			if(isset($data1['errmessage']) && $data1['errmessage'] !='')
			{
				$this->session->set_flashdata('error_message_arr', $data1['errmessage']);
			}
			redirect($this->base_url.'search/already-password/'.$member_id);
		}
	}
	function view_photos()
	{
		$member_id = $this->input->post('member_id');
		$current_login_user = $this->common_front_model->get_session_data();
		if(isset($current_login_user) && $current_login_user!='' && $current_login_user > 0)
		{
			if(isset($member_id) && $member_id != '')
			{
				$this->data['member_id'] = $member_id;
				$this->data['base_url'] = $this->base_url;
				$this->data['member_data'] = $this->common_model->get_count_data_manual('register_view',array(" matri_id = '$member_id' "),1,'*','id desc','','');
				$path_photos = $this->common_model->path_photos_big;
				$member_data=$this->data['member_data'];
				
				if(isset($member_data['photo1']) && $member_data['photo1'] !='' && $member_data['photo1_approve'] =='APPROVED' && file_exists($path_photos.$member_data['photo1']))
				{
					$data1['content'] = '<center>
    					<a href="javascript:;" data-dismiss="modal" onClick="openModal();currentSlide(1)"><img src="'.$this->base_url.$path_photos.$member_data['photo1'].'" class="cursor img-thumbnail" alt="team-pic2" style="height:160px;width:200px;"></a>
    					<br><br>
    					<a class="text-center underline cursor" style="cursor:pointer;" onClick="openModal();currentSlide(1)" data-dismiss="modal"><i class="glyphicon glyphicon-pencil"></i> View Full Photo</a>
        			</center><br>';
				}
				else
				{
					$data1['content'] = '<center>
    		<a href="javascript:;"><img src="'.$this->common_model->member_photo_disp($member_data).'" class="cursor img-thumbnail text-center" alt="team-pic2"></a>
    	</center><br>';
				}
				//$this->load->view('front_end/view_photo',$this->data);
				
				$photos = array();
				$photo_upload_count = $this->common_model->photo_upload_count;
				if($photo_upload_count =='' || $photo_upload_count > 0  || $photo_upload_count < 8)
				{
					$photo_upload_count = 8;
				}
				for($i_photo = 1;$i_photo<=$photo_upload_count;$i_photo++)
				{
					$photos[] = array('photo'=>$member_data['photo'.$i_photo],'status'=>$member_data['photo'.$i_photo.'_approve']);
				}
				$data1['slider']='';
				foreach($photos as $photo_val) 
				{	
					if(isset($photo_val['photo']) && $photo_val['photo'] !='' && file_exists($path_photos.$photo_val['photo']) && $photo_val['status'] =='APPROVED')
					{
						$data1['slider'].='	
								<div class="mySlides"><img src="'.$this->base_url.$path_photos.$photo_val['photo'].'" class="slide-img img-responsive padding-top-10" alt="" style="box-shadow: 0 5px 11px 0 rgba(0,0,0,.38), 0 4px 15px 0 rgba(0,0,0,.55);padding: 0px;width: 600px !important;height: 500px !important;max-height:500px !important;" /></div>	';
					}
				}

				$data1['member_id']= $this->data['member_id'];
				$data1['token'] = $this->security->get_csrf_hash();
				$data['data'] = json_encode($data1);
				$this->load->view('common_file_echo',$data);
			}
		}
	}
	function member_photos($member_id='')
	{
		$current_login_user = $this->common_front_model->get_session_data();
		if(isset($current_login_user) && $current_login_user!='' && $current_login_user > 0)
		{
			if(isset($member_id) && $member_id != '')
			{
				$this->data['member_id'] = $member_id;
				$this->data['member_data'] = $this->common_model->get_count_data_manual('register_view',array(" matri_id = '$member_id' "),1,'*','id desc','','');
				
				$this->load->view('front_end/member_photos',$this->data);
			}
			else
			{
				redirect(base_url().'search/photo-password/'.$member_id);
			}
		}
		else
		{
			redirect($this->common_model->base_url.'login');
		}
	}
	
	function common_button_action(){
		$response = $this->search_model->common_button_action();
		$this->load->view('common_file_echo',$response);
	}
	
	function view_profile_app(){
		
		$user_agent = $this->input->post('user_agent') ? $this->input->post('user_agent') : 'NI-WEB';
		
		$current_login_user_id = $this->input->post('user_id');
		$member_id = $this->input->post('member_id');

		$check_membership_plab_exp_date = $this->search_model->view_profile_details($current_login_user_id);
		echo $check_membership_plab_exp_date;exit;
		if($check_membership_plab_exp_date==0)
		{
					$data1['status'] = 'expired';
					$data1['errormessage'] = 'Your account has been expired';
					$data1['errmessage'] = 'Your account has been expired';
					$data1['data'] = '';
		}
		else{
				if(isset($current_login_user_id) && $current_login_user_id != '' && isset($member_id) && $member_id != '' )
				{
					$login_where_arra=array('id'=>$current_login_user_id,'is_deleted'=>'No');
					$login_member_data = $this->common_model->get_count_data_manual('register',$login_where_arra,1,'matri_id','','','','');
					
					$member_where_arra=array('id'=>$member_id,'is_deleted'=>'No');
					$member_member_data = $this->common_model->get_count_data_manual('register',$member_where_arra,1,'matri_id','','','','');
					
					$user_id = $login_member_data['matri_id'];
					
					$matri_id = $member_member_data['matri_id'];
				
					if(isset($user_agent) && $user_agent!='NI-WEB' && isset($user_id) && $user_id!='' && isset($matri_id) && $matri_id!='')
					{
						$where_arra_payment=array('matri_id'=>$user_id,'is_deleted'=>'No','current_plan' =>'Yes');
						$payment_data = $this->common_model->get_count_data_manual('payments_view',$where_arra_payment,1,'*','','','','');
						
						$total_profile = $payment_data['profile'];
						$profile_used = $payment_data['profile_used'];
						
						
					
									
									
						if(isset($payment_data) && $payment_data != '' && $total_profile >= $profile_used)
						{
							if(isset($matri_id) && $matri_id!='')
							{
								$where_arra=array('matri_id'=>$matri_id,'is_deleted'=>'No',"status !='UNAPPROVED' and status !='Suspended'");
								$user_data_arr = $this->common_model->get_count_data_manual('register_view',$where_arra,1,'*','','','','');
								if(isset($user_data_arr) && $user_data_arr!='' && $user_data_arr > 0)
								{
									$where_array_checker = array('my_id'=>$user_id,'viewed_id'=>$matri_id);
									$profile_checker = $this->common_model->get_count_data_manual('profile_checker',$where_array_checker,0,'','','','','','');
									
									if($profile_checker == 0){
										$created_on = $this->common_model->getCurrentDate();
										
										$insert_profile_checker = $this->common_model->update_insert_data_common('profile_checker',array('my_id' => $user_id,'viewed_id' => $matri_id,'date' => $created_on),'',0);
										
										$this->common_front_model->update_plan_detail($user_id,'profile');
											
										$insert_who_viewed = $this->common_model->update_insert_data_common('who_viewed_my_profile',array('my_id' => $user_id,'viewed_member_id' => $matri_id,'created_on' => $created_on),'',0);
									}
								
									$where_arra=array('matri_id'=>$matri_id,'is_deleted'=>'No');
									$member_data = $this->common_model->get_count_data_manual('register',$where_arra,1,'id','','','','');
									$member_id = $member_data['id'];

									$where_arrays=array('matri_id'=>$user_id,'is_deleted'=>'No');
									$member_datass = $this->common_model->get_count_data_manual('register',$where_arrays,1,'id','','','','');
									$compare_from = $member_datass['id'];
									
									$user_data1 = $this->common_front_model->get_user_data('register_view',$member_id);
									$my_data = $this->common_front_model->get_user_data('register_view',$compare_from);
									
									$user_data = $this->common_front_model->set_member_profile_join_data($user_data1);
									$parampass = array('photo1' =>'assets/photos/','photo2' =>'assets/photos/','photo3' =>'assets/photos/','photo4' =>'assets/photos/','photo5' =>'assets/photos/','photo6' =>'assets/photos/','photo7' =>'assets/photos/','photo8' =>'assets/photos/','cover_photo'=>'assets/cover_photo/','horoscope_photo'=>'assets/horoscope-list/');
									$user_data = $this->common_front_model->dataimage_fullurl($user_data,$parampass,'single');
									
									$percentage_stored = $this->common_front_model->getprofile_completeness($member_id);
									$check_permission_view=array('ph_requester_id'=>$user_id,'ph_receiver_id '=>$matri_id,'receiver_response'=>'Accepted','status'=>'1');
									$user_data['photo_view_count'] = $this->common_model->get_count_data_manual('photoprotect_request',$check_permission_view,0,'*','','','','');
									//$user_data = $this->common_front_model->set_member_profile_data_category_wise($user_data);
									
									$user_data = $this->common_front_model->compare_to_other_user($user_data,$my_data);
									
									$user_data['percentage'] = $percentage_stored;
									
									if($user_data['allow_contact']==0){
										$user_data['mobile']="";
										$user_data['phone']="";
									}
									$data1['data'] = $user_data;
									$data1['status'] = 'success';
									
								}
								else
								{
									$data1['status'] = 'error';
									$data1['errormessage'] = 'Data not found.';
									$data1['errmessage'] = 'Data not found.';
									$data1['data'] = '';
								}
							}
							else
							{
								$data1['status'] = 'error';
								$data1['errormessage'] = 'Data not found.';
								$data1['errmessage'] = 'Data not found.';
								$data1['data'] = '';
							}
						}else{
							$data1['status'] = 'warning';
							$data1['errormessage'] = 'Your profile viewed count has been not available';
							$data1['errmessage'] = 'Your profile viewed count has been not available';
							$data1['data'] = '';
						}
					}else{
						$data1['status'] = 'error';
						$data1['errormessage'] = 'Data not found.';
						$data1['errmessage'] = 'Data not found.';
						$data1['data'] = '';
					}
				}else{
					$data1['status'] = 'error';
					$data1['errormessage'] = 'Sorry, Your session hase been time out, Please login Again.';
					$data1['errmessage'] = 'Sorry, Your session hase been time out, Please login Again.';
				}
		}		

		$data1['tocken'] = $this->security->get_csrf_hash();
		$data['data'] = json_encode($data1);
		$this->load->view('common_file_echo',$data);
	}
}