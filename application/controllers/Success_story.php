<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Success_story extends CI_Controller {
	public $data = array();
	public function __construct()
	{
		parent::__construct();
		$this->base_url = base_url();
		$this->data['base_url'] = $this->base_url;
		$this->load->model('front_end/success_story_model');
		$this->common_front_model->last_member_activity();
	}	
	public function index($page=1)
	{	
		$data['base_url']=$this->data['base_url'];
		$is_ajax = 0;
		if($this->input->post('is_ajax') && $this->input->post('is_ajax') !='')
		{
			$is_ajax = $this->input->post('is_ajax');
		}
		$where_arra=array('is_deleted'=>'No','status'=>'APPROVED');
		$this->data['success_story_data_count']=$this->common_model->get_count_data_manual('success_story',$where_arra,0,'id');
		$this->data['success_story']=$this->common_model->get_count_data_manual('success_story',$where_arra,2,'*','id desc',$page);
		if($is_ajax == 0)
		{	
			$this->common_model->extra_css_fr= array('css/bootstrap-touch-slider.css','css/mdb.min.css','css/hover-img.css','css/jquery-ui.css','css/fontello.css');
			$seo_data = $this->common_model->get_count_data_manual('seo_page_data',array('status'=>'APPROVED','page_title'=>'Success Story'),1,'*','','');
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
			$this->common_model->front_load_header('Success Stories','',$seo_title,$seo_description,$seo_keywords,$og_title,$og_description,$og_image);
			$this->load->view('front_end/feature_success_story',$this->data);
			$this->common_model->front_load_footer();
		}
		else
		{	
			$this->load->view('front_end/feature_success_story_list_ajax',$this->data);
		}
	}
	public function details($id='')
	{	
		if($id !='')
		{	
			$this->common_model->extra_css_fr= array('css/mdb.min.css','css/responsive.css');
			$where_success_story= " (id ='".$id."')";
			$success_story_arr = $this->common_model->get_count_data_manual('success_story',$where_success_story,1,'id,		weddingphoto,weddingphoto_type,bridename,groomname,marriagedate,successmessage,created_on','','','',"");
			$success_story_data['success_story_item']= $success_story_arr;
			$this->common_model->front_load_header('Success Story Details');
			$this->load->view('front_end/success_story',$success_story_data);
			$this->common_model->front_load_footer();
		}
		else
		{
			redirect($this->common_model->base_url.'success_story');
		}
	}
	public function add_story()
	{	
		$this->common_model->extra_css_fr= array('css/mdb.min.css','css/responsive.css','css/zebra_datepicker.min.css');
		$this->common_model->extra_js_fr= array('js/zebra_datepicker.min.js');
		//'js/additional-methods.min.js',
		$this->common_model->front_load_header('Submit Success Story');
		$this->load->view('front_end/add_success_story',$this->data);
		$this->common_model->front_load_footer();
	}
	public function check_bride_groom()
	{	
		$this->success_story_model->check_bride_groom();
	}
	public function save_story()
	{		
	   $this->success_story_model->add_success_story();
	}
}