<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class More_details extends CI_Controller {
	public $data = array();
	function __construct()
  {
		parent::__construct();
		$this->base_url = base_url();
		$this->data['base_url'] = $this->base_url;
		$this->load->model('front_end/More_details_model');
		$this->load->model('front_end/Matrimony_model');
  }
	public function index()
	{
		
	}
	function community_page_list($page_name="")
	{
		
		$is_login = $this->common_front_model->checkLogin('return');
		$gender = $this->common_front_model->get_session_data('gender');
		$data["gender_check"] = $gender;
		$data["page_list_community"]=$this->More_details_model->page_name_list($page_name);
		
		$data["matrimony_name_list_religion"]=$this->Matrimony_model->community_name_list('Religion');
		
		$data["matrimony_name_list_caste"]=$this->Matrimony_model->community_name_list('Caste');
		$data["matrimony_name_list_mtong"]=$this->Matrimony_model->community_name_list('Mother-Tongue');
		$data["matrimony_name_list_country"]=$this->Matrimony_model->community_name_list('Country');
		$data["page_name"] = $page_name;
	
		$this->common_model->extra_css_fr= array('css/bootstrap-touch-slider.css','css/mdb.min.css','css/hover-img.css','css/owl.carousel.css','css/chosen.css');
		$this->common_model->extra_js_fr= array('js/owl.carousel.min.js','js/slider.js','js/chosen.jquery.js');
		$this->common_model->front_load_header();
		
		$this->load->view('front_end/more_details',$data);
		$this->common_model->front_load_footer();
	}
	
}
?>