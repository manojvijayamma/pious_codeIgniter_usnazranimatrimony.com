<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends CI_Controller {
	public $data = array();
	
	public function __construct()
	{
		parent::__construct();
		$this->base_url = base_url();
		$this->data['base_url'] = $this->base_url;
		$this->common_front_model->last_member_activity();
		
	}
	public function contact_number($page_title='about-us')
	{
		$this->common_model->display_top_menu_perm ='No';
		$this->common_model->extra_css_fr= array('css/hover-img.css','css/mdb.min.css','css/bootstrap-touch-slider.css');
		$this->common_model->extra_js_fr= array('js/BootSideMenu.js');
		$this->common_model->front_load_header();
		$this->load->view('front_end/settings_contact');
		$this->common_model->front_load_footer();
		
	}

	public function save_contact_number(){
		 $allow_contact=isset($_POST['allow_contact']) ? $_POST['allow_contact'] : 0;
		 $member_id = $this->common_front_model->get_session_data('id');
		$this->db->where('id',$member_id);
		$this->db->update("register",array('allow_contact'=>$allow_contact));
		$data1['contact_setting_load'] = "Your contact setting is edited Successfully.";
		//$this->session->set_flashdata('success_message_contact',$success_message);
		$data1['token'] = $this->security->get_csrf_hash();
		$data1['status'] = 'success';
		//redirect(base_url().'settings/contact-number');
		echo json_encode($data1);
	}
	
}