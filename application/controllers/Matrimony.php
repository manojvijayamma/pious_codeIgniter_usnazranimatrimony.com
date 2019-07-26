<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Matrimony extends CI_Controller {
    public $data = array();
	function __construct()
    {
        parent::__construct();
        $this->base_url = base_url();
		$this->data['base_url'] = $this->base_url;		
		$this->common_model->limit_per_page=5;
		$this->common_front_model->last_member_activity();
		$this->load->model('front_end/Matrimony_model');
    }
	public function index()
	{
		$is_login = $this->common_front_model->checkLogin('return');
		$gender = $this->common_front_model->get_session_data('gender');

		$data["gender_check"] = $gender;
		$gender_check_male="Male";
		$gender_check_female="Female";
		$data["matrimony_data_grrom_home"]=$this->Matrimony_model->member_data_list($gender_check_male);
		
		$data["matrimony_data_bride_home"]=$this->Matrimony_model->member_data_list($gender_check_female);
		
		$data["matrimony_cnt12"]=$this->Matrimony_model->member_data_count();
		

		$data["matrimony_name_list_religion"]=$this->Matrimony_model->community_name_list('Religion');
		
		$data["matrimony_name_list_caste"]=$this->Matrimony_model->community_name_list('Caste');
		$data["matrimony_name_list_mtong"]=$this->Matrimony_model->community_name_list('Mother-Tongue');
		$data["matrimony_name_list_country"]=$this->Matrimony_model->community_name_list('Country');
		
		$this->common_model->extra_css_fr= array('css/bootstrap-touch-slider.css','css/mdb.min.css','css/hover-img.css','css/owl.carousel.css','css/chosen.css');
		$this->common_model->extra_js_fr= array('js/owl.carousel.min.js','js/slider.js','js/photo_protect_js.js','js/chosen.jquery.js');
		$this->common_model->front_load_header_matrimony();
		$this->load->view('front_end/community',$data);
		$this->common_model->front_load_footer();
	}
	function community_data($matrimony_name="",$page=1)
	{
		$is_ajax = 0;
		if($this->input->post('is_ajax') && $this->input->post('is_ajax') !='')
		{
			$is_ajax = $this->input->post('is_ajax');
		}
		$data_divide = 'Female';
		if($this->input->post('data_divide') && $this->input->post('data_divide') !='')
		{
			$data_divide = $this->input->post('data_divide');
		}	
		
		//$page = 1;
		if($this->input->post('page_number') && $this->input->post('page_number') !='')
		{
			$page = $this->input->post('page_number');
		}
		$matrimony=explode("-matrimony",$matrimony_name);
		$matrimony_name=$matrimony[0];
		$gender = $this->common_front_model->get_session_data('gender');
		
		$data["page"] = $page;
		$data["base_url"] = $this->base_url;
		$data["gender_check"] = $gender;
		$data["matrimony_data"]=$this->Matrimony_model->community_data_list($matrimony_name);
		

		$data["data_row_matri_bride"]=$this->Matrimony_model->community_data_bride($data["matrimony_data"],$page);
		$data["data_row_matri_bride_count"]=$this->Matrimony_model->community_data_bride_count($data["matrimony_data"]);

		$data["data_row_matri_groom"]=$this->Matrimony_model->community_data_groom($data["matrimony_data"],$page);
		$data["data_row_matri_groom_count"]=$this->Matrimony_model->community_data_groom_count($data["matrimony_data"]);

		$data["matrimony_cnt"]=$this->Matrimony_model->community_data_count($matrimony_name);
		$data["match_member_result"]=$this->Matrimony_model->community_data_count($matrimony_name);
		//$data["ratting_cnt"]=$this->Matrimony_model->ratting_count();
		//$data["ratting_avg"]=$this->Matrimony_model->ratting_avg();
		//$data["ratting_list"]=$this->Matrimony_model->ratting_list($matrimony_name,$page=1);
		
		$data["matrimony_name_list_religion"]=$this->Matrimony_model->community_name_list('Religion');
		$data["matrimony_name_list_caste"]=$this->Matrimony_model->community_name_list('Caste');
		$data["matrimony_name_list_mtong"]=$this->Matrimony_model->community_name_list('Mother-Tongue');
		$data["matrimony_name_list_country"]=$this->Matrimony_model->community_name_list('Country');
		if($is_ajax == 0)
		{
			$this->common_model->extra_css_fr= array('css/bootstrap-touch-slider.css','css/mdb.min.css','css/hover-img.css','css/owl.carousel.css','css/chosen.css');
			$this->common_model->extra_js_fr= array('js/owl.carousel.min.js','js/common.js','js/slider.js','js/photo_protect_js.js','js/chosen.jquery.js');
			$this->common_model->front_load_header_matrimony($data["matrimony_data"]);
			
			$this->load->view('front_end/community',$data);
			$this->common_model->front_load_footer();
		}
		else
		{
			if($data_divide == 'Female')
			{
				$this->load->view('front_end/community_data_view_female',$data);
			}
			else
			{
				$this->load->view('front_end/community_data_view_male',$data);	
			}
			
		}
	}
	// function ratting_list_data($page)
	// {
	// 	//$page=$this->input->post('page');
	// 	$matrimony_name=$this->input->post('mat_name');
	// 	$data['ratting_list_new'] = $this->Matrimony_model->ratting_list($matrimony_name,$page);
	// 	$data["tocken"]		= $this->security->get_csrf_hash();
	// 	$data["page_incremnet"]		= $page+1;
	// 	$data["matrimony_name"]		= $matrimony_name;
	// 	$this->load->view('ratting_list',$data);
	// }
	// function add_ratting()
	// {
	// 	$response = array();
	// 	$this->load->library('form_validation');		
	// 	$response["status"] = "error";
	// 	$response["statuscode"] = 300;
	// 	$response["message"] = "Please try again";
	// 	//$this->Matrimony_model->ratting_count();
	// 	$data=array();
	// 	$this->form_validation->set_rules('username','Username','required');
	// 	$this->form_validation->set_rules('review_text','Review text','required');
	// 	if($this->form_validation->run()==FALSE)
	// 	{
	// 		$response["message"] = validation_errors();
	// 	}
	// 	else
	// 	{
	// 		$username=$this->input->post('username');
	// 		$email=$this->input->post('email');
	// 		$review_text=$this->input->post('review_text');
	// 		$matrimony_name=$this->input->post('matrimony_name');
	// 		$mat_id=$this->input->post('mat_id');
	// 		$countexisting=$this->input->post('countexisting');
	// 		if(isset($countexisting) && $countexisting != '')
	// 		{
	// 			$count_ratting=$this->input->post('countexisting');
	// 		}
	// 		else
	// 		{
	// 			$count_ratting=$this->input->post('defaultvalue');
	// 		}
	// 		$insert_data=array(
	// 						"email"=>$email,
	// 						"name"=>$username,
	// 						"content"=>$review_text,
	// 						"rating"=>$count_ratting,
	// 						"date"=>date('Y:m:d h:i:s'),
	// 						"status"=>"N",
	// 						"c_page_name"=>$matrimony_name,
	// 						"c_page_id"=>$mat_id
	// 					);
	// 		$this->Common_model->update_insert_data_common("user_rating",$insert_data,"",'',0);
	// 		$details = $this->Common_model->add_user_analysis();
	// 		$response["message"] 	= "You add review successfully";
	// 		$response["status"] 	= "success";
	// 		$response["statuscode"] = 200;
	// 	}
	// 	$response["tocken"] = $this->security->get_csrf_hash();
	// 	$this->output->set_output(json_encode($response));
	// }
	
}
?>