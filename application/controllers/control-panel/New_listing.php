<?php defined('BASEPATH') OR exit('No direct script access allowed');
class New_listing extends CI_Controller {
	public $data = array();
	public function __construct()
	{
		parent::__construct();
		//$this->common_model->checkLogin(); // here check for login or not
		$this->common_model->check_admin_only_access();
	}
	public function index()
	{
		$this->city_list();
	}
		
	public function country_list($status ='ALL', $page =1)
	{
		$ele_array = array(
			'country_name'=>array('is_required'=>'required','check_duplicate'=>'Yes'),
			'country_code'=>array('is_required'=>'required','other'=>'maxlength="4" pattern="^([+]{1})+([0-9]{2,3})$"'),
			'status'=>array('type'=>'radio')
		);
		$this->common_model->js_validation_extra .= '
			rules: {
				country_name: {
					required: true,
					lettersonly: true
				},
			},
		';
		$other_config = array(
			'field_duplicate'=>array('country_name'),
		);
		$this->common_model->common_rander('country_master', $status, $page , 'Country',$ele_array,'country_name',1,$other_config);
	}
	
	public function mm_list($status ='ALL', $page =1)
	{
		$ele_array = array(
			'oldvalue'=>array('is_required'=>'required'),
			'status'=>array('type'=>'radio')
		);
		$this->common_model->common_rander('edit_history', $status, $page , 'Heading',$ele_array,'newvalue',0);
	}
	
	public function state_list($status ='ALL', $page =1)
	{
		$ele_array = array(
			'country_id'=>array('is_required'=>'required','class'=>' not_reset ','type'=>'dropdown','relation'=>array('rel_table'=>'country_master','key_val'=>'id','key_disp'=>'country_name')),	// for relation dropdown
			'state_name'=>array('is_required'=>'required'),
			'status'=>array('type'=>'radio')
		);
		$this->common_model->js_validation_extra.= '
			rules: {
				state_name: {
					required: true,
					lettersonly: true
				},				
			},
		';
		$join_tab_array = array();
		$join_tab_array[] = array( 'rel_table'=>'country_master', 'rel_filed'=>'id', 'rel_filed_disp'=>'country_name','rel_filed_org'=>'country_id');
		$this->common_model->dup_where_con = 'and';
		$other_config = array('default_order'=>'DESC','filed_notdisp'=>array(),'field_duplicate'=>array('country_id','state_name'));
		$this->common_model->common_rander('state_master', $status, $page , 'State',$ele_array,'state_name',1,$other_config,$join_tab_array);
	}	
	public function city_list($status ='ALL', $page =1)
	{
		$ele_array = array(
			'country_id'=>array('is_required'=>'required','class'=>' not_reset ','type'=>'dropdown','onchange'=>"dropdownChange('country_id','state_id','state_list')",
			'relation'=>array('rel_table'=>'country_master','key_val'=>'id','key_disp'=>'country_name')),	// for relation dropdown
			'state_id'=>array('is_required'=>'required','class'=>' not_reset ','type'=>'dropdown','relation'=>array('rel_table'=>'state_master','key_val'=>'id','key_disp'=>'state_name','not_load_add'=>'yes','cus_rel_col_name'=>'country_id')),	// for relation dropdown
			'city_name'=>array('is_required'=>'required'),
			'status'=>array('type'=>'radio')
		);
		$this->common_model->js_validation_extra.= '
			rules: {
				city_name: {
				  required: true,
				  lettersonly: true
				},				
			 },
		';
		$this->common_model->dup_where_con = 'and';
		$join_tab_array = array();
		$join_tab_array[] = array( 'rel_table'=>'state_master', 'rel_filed'=>'id', 'rel_filed_disp'=>'state_name','rel_filed_org'=>'state_id');
		
		$join_tab_array[] = array( 'rel_table'=>'country_master', 'rel_filed'=>'id', 'rel_filed_disp'=>'country_name',			'rel_filed_org'=>'country_id','join_manual'=>' country_master.id = state_master.country_id ');
		
		$other_config = array('default_order'=>'ASC','field_duplicate'=>array('country_id','state_id','city_name'));
		$this->common_model->common_rander('city_master', $status, $page , 'City',$ele_array,'city_name',1,$other_config,$join_tab_array);
	}
	
	// 'default_order'=>'desc'
	
	public function religion_man($status ='ALL', $page =1)
	{
		$ele_array = array(
			'religion_name'=>array('is_required'=>'required'),
			'status'=>array('type'=>'radio')
		);
		$this->common_model->js_validation_extra.= '
			rules: {
				religion_name: {
				  required: true,
				  lettersonly: true
				},				
			 },
		';
		$other_config = array('field_duplicate'=>array('religion_name'));
		$this->common_model->common_rander('religion', $status, $page , 'Religion',$ele_array,'religion_name',1,$other_config);
	}
	public function caste_man($status ='ALL', $page =1)
	{
		$ele_array = array(			
			'religion_id'=>array('is_required'=>'required','class'=>' not_reset ','type'=>'dropdown','relation'=>array('rel_table'=>'religion','key_val'=>'id','key_disp'=>'religion_name')),	// for relation dropdown
			'caste_name'=>array('is_required'=>'required'),
			'status'=>array('type'=>'radio')
		);
		$this->common_model->js_validation_extra.= '
			rules: {
				caste_name: {
				  required: true,
				  lettersonly: true
				},
			 },
		';
		$this->common_model->dup_where_con = 'and';
		$join_tab_array = array();
		$join_tab_array[] = array( 'rel_table'=>'religion', 'rel_filed'=>'id', 'rel_filed_disp'=>'religion_name','rel_filed_org'=>'religion_id');
		
		$other_config = array('default_order'=>'DESC','filed_notdisp'=>array(),'field_duplicate'=>array('religion_id','caste_name'));
		$this->common_model->common_rander('caste', $status, $page, 'Caste',$ele_array,'caste_name',1,$other_config,$join_tab_array);
	}
	public function occupation_man($status ='ALL', $page =1)
	{
		$ele_array = array(
			'occupation_name'=>array('is_required'=>'required'),
			'status'=>array('type'=>'radio')
		);
		$this->common_model->js_validation_extra.= '
			rules: {
				occupation_name: {
				  required: true,
				  lettersonly: true
				},				
			 },
		';
		$other_config = array('field_duplicate'=>array('occupation_name'));
		$this->common_model->common_rander('occupation', $status, $page , 'Occupation',$ele_array,'occupation_name',1,$other_config);
	}

	public function education_man($status ='ALL', $page =1)
	{
		$ele_array = array(
			'education_name'=>array('is_required'=>'required'),
			'status'=>array('type'=>'radio')
		);
		$other_config = array('field_duplicate'=>array('education_name'));
		$this->common_model->common_rander('education_detail', $status, $page , 'Education',$ele_array,'education_name',1,$other_config);
	}
			
	public function mothertongue_man($status ='ALL', $page =1)
	{
		$ele_array = array(
			'mtongue_name'=>array('is_required'=>'required'),
			'status'=>array('type'=>'radio')
		);
		$this->common_model->js_validation_extra.= '
			rules: {
				mtongue_name: {
				  required: true,
				  lettersonly: true
				},				
			 },
		';
		$other_config = array('field_duplicate'=>array('mtongue_name'));
		$this->common_model->common_rander('mothertongue', $status, $page , 'Mothertongue',$ele_array,'mtongue_name',1,$other_config);
	}
	public function designation_man($status ='ALL', $page =1)
	{
		$ele_array = array(
			'occupation_id'=>array('label'=>'Occupation','is_required'=>'required','class'=>' not_reset ','type'=>'dropdown','relation'=>array('rel_table'=>'occupation','key_val'=>'id','key_disp'=>'occupation_name')),	// for relation dropdown
			'designation_name'=>array('is_required'=>'required'),
			'status'=>array('type'=>'radio')
		);
		$this->common_model->js_validation_extra.= '
			rules: {
				designation_name: {
				  required: true,
				  lettersonly: true
				},				
			 },
		';
		
		//$other_config = array('field_duplicate'=>array('designation_name'));
		//$this->common_model->common_rander('designation', $status, $page , 'Designation',$ele_array,'designation_name',1,$other_config);

		$this->common_model->dup_where_con = 'and';
		$join_tab_array = array();
		$join_tab_array[] = array( 'rel_table'=>'occupation', 'rel_filed'=>'id', 'rel_filed_disp'=>'occupation_name','rel_filed_org'=>'occupation_id');
		
		$other_config = array('default_order'=>'DESC','filed_notdisp'=>array(),'field_duplicate'=>array('occupation_id','designation_name'));
		$this->common_model->common_rander('designation', $status, $page, 'Designation',$ele_array,'designation_name',1,$other_config,$join_tab_array);


	}
	public function star_man($status ='ALL', $page =1)
	{
		$ele_array = array(
			'star_name'=>array('is_required'=>'required'),
			'status'=>array('type'=>'radio')
		);
		$other_config = array('field_duplicate'=>array('star_name'));
		$this->common_model->common_rander('star', $status, $page , 'Star',$ele_array,'star_name',1,$other_config);
	}
	public function moonsign_man($status ='ALL', $page =1)
	{
		$ele_array = array(
			'moonsign_name'=>array('is_required'=>'required'),
			'status'=>array('type'=>'radio')
		);
		$other_config = array('field_duplicate'=>array('moonsign_name'));
		$this->common_model->common_rander('moonsign', $status, $page , 'Moonsign',$ele_array,'moonsign_name',1,$other_config);
	}
	public function industries_man($status ='ALL', $page =1)
	{
		$this->load->model('back_end/siteSetting_model');
		$font_list_arr = $this->siteSetting_model->font_aw_listing();
		
		if(isset($_REQUEST['icon_name']) && $_REQUEST['icon_name'] !='')
		{
			$icon_name = $_REQUEST['icon_name'];
			$icon_hash_code = $this->siteSetting_model->gethashcode_font($icon_name);
			$_REQUEST['icone_code'] = $icon_hash_code;
		}
		$ele_array = array(
			'industries_name'=>array('is_required'=>'required'),
			'is_featured'=>array('type'=>'radio','value_arr'=>array('Yes'=>'Yes','No'=>'No')),
			'icon_name'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$font_list_arr),
			'status'=>array('type'=>'radio')
		);
		$this->common_model->filed_notdisp = array('icone_code');
		$other_config = array('field_duplicate'=>array('industries_name'));
		$this->common_model->common_rander('industries_master', $status, $page , 'Industries',$ele_array,'industries_name',1,$other_config);
	}
	
	public function job_payment_man($status ='ALL', $page =1)
	{
		$ele_array = array(
			'job_payment'=>array('is_required'=>'required'),
			'status'=>array('type'=>'radio')
		);
		$other_config = array('field_duplicate'=>array('job_payment'));
		$this->common_model->common_rander('job_payment_master', $status, $page , 'Job Payment',$ele_array,'job_payment',1,$other_config);
	}
	public function job_type_man($status ='ALL', $page =1)
	{
		$ele_array = array(
			'job_type'=>array('is_required'=>'required'),
			'status'=>array('type'=>'radio')
		);
		$other_config = array('field_duplicate'=>array('job_type'));
		$this->common_model->common_rander('job_type_master', $status, $page , 'Job Type',$ele_array,'job_type',1,$other_config);
	}
	public function job_emp_type_man($status ='ALL', $page =1)
	{
		$ele_array = array(
			'education_name'=>array('type'=>'textarea','is_required'=>'required'),
			'status'=>array('type'=>'radio'),
		);
		$other_config = array('field_duplicate'=>array('education_name'));
		$this->common_model->save_job_emp_type_man();
		$this->common_model->common_rander('education_detail', $status, $page , 'Education',$ele_array,'education_name',0,$other_config);
	}
	public function employement_type_man($status ='ALL', $page =1)
	{
		$ele_array = array(
			'employement_type'=>array('is_required'=>'required'),
			'status'=>array('type'=>'radio')
		);
		$other_config = array('field_duplicate'=>array('employement_type'));
		$this->common_model->common_rander('employement_type', $status, $page , 'Employement Type',$ele_array,'employement_type',1,$other_config);
	}
	public function shift_type_man($status ='ALL', $page =1)
	{
		$ele_array = array(
			'shift_type'=>array('is_required'=>'required'),
			'status'=>array('type'=>'radio')
		);
		$other_config = array('field_duplicate'=>array('shift_type'));
		$this->common_model->common_rander('shift_type', $status, $page , 'Job Shift Type',$ele_array,'shift_type',1,$other_config);
	}
	
	public function marital_status_man($status ='ALL', $page =1)
	{
		$ele_array = array(
			'marital_status'=>array('is_required'=>'required'),
			'status'=>array('type'=>'radio')
		);
		$other_config = array('field_duplicate'=>array('marital_status'));
		$this->common_model->common_rander('marital_status_master', $status, $page , 'Marital Status',$ele_array,'marital_status',1,$other_config);
	}
	public function personal_titles_man($status ='ALL', $page =1)
	{
		$ele_array = array(
			'personal_titles'=>array('is_required'=>'required'),
			'status'=>array('type'=>'radio')
		);
		$other_config = array('field_duplicate'=>array('personal_titles'));
		$this->common_model->common_rander('personal_titles_master', $status, $page , 'Personal Titles',$ele_array,'personal_titles',1,$other_config);
	}
	public function skill_language_man($status ='ALL', $page =1)
	{
		$ele_array = array(
			'skill_language'=>array('is_required'=>'required'),
			'status'=>array('type'=>'radio')
		);
		$other_config = array('field_duplicate'=>array('skill_language'));
		$this->common_model->common_rander('skill_language_master', $status, $page , 'Human Language',$ele_array,'skill_language',1,$other_config);
	}
	public function skill_level_man($status ='ALL', $page =1)
	{
		$ele_array = array(
			
			'status'=>array('type'=>'radio')
		);
		$other_config = array('field_duplicate'=>array('skill_level'));
		$this->common_model->common_rander('skill_level_master', $status, $page , 'Skill Level',$ele_array,'skill_level',1,$other_config);
	}
	public function faq_list($status ='ALL', $page =1)
	{
		$ele_array = array(
			'question'=>array('is_required'=>'required'),
			'answer'=>array('type'=>'textarea'),
			'status'=>array('type'=>'radio')
		);
		
		$this->common_model->extra_js[] = 'vendor/ckeditor/ckeditor.js';
			$this->common_model->js_extra_code = " if($('#answer').length > 0) {  $('.answer_edit').removeClass(' col-lg-7 ');
			$('.answer_edit').addClass(' col-lg-10 ');
			CKEDITOR.replace( 'answer' ); } ";
		
		$this->common_model->data_tabel_filedIgnore = array('id','is_deleted');
		$this->common_model->common_rander('faq_master', $status, $page , 'Faqs',$ele_array,'question',0,'');
		
	}
	
	public function banner($status ='ALL', $page =1)
	{
		$ele_array = array(
			'banner'=>array('is_required'=>'required','type'=>'file','path_value'=>$this->common_model->path_banner),
			'status'=>array('type'=>'radio')
		);
		$this->common_model->extra_js[] = 'vendor/jquery-validation/dist/additional-methods.min.js';
		$this->common_model->js_extra_code.= ' if($(".magniflier").length > 0){OnhoverMove();}';
		$other_config = array('enctype'=>'enctype="multipart/form-data"','display_image'=>array('banner'),'searchAllow'=>'no');
		$this->common_model->common_rander('homepage_banner', $status, $page , 'Home Page Banner',$ele_array,'id',0,$other_config);
	}
	
	public function mobile_matri_bannner($status ='ALL', $page =1)
	{
		$ele_array = array(
			'banner'=>array('is_required'=>'required','type'=>'file','path_value'=>$this->common_model->path_mobile_matri_banner,'display_note'=>'Note: Preferred size of image is 230px * 430px for best result.'),
			'status'=>array('type'=>'radio')
		);
		$this->common_model->extra_js[] = 'vendor/jquery-validation/dist/additional-methods.min.js';
		$this->common_model->js_extra_code.= ' if($(".magniflier").length > 0){OnhoverMove();}';
		$other_config = array('enctype'=>'enctype="multipart/form-data"','display_image'=>array('banner'),'searchAllow'=>'no');
		$this->common_model->common_rander('mobile_matri_bannner', $status, $page , 'Mobile Matri Banner',$ele_array,'id',0,$other_config);
	}
	
	public function other_banner($status ='')
	{
		$this->label_page = 'Update Other Banner';
		$this->table_name = 'other_banner';// *need to set here tabel name //
		$this->common_model->set_table_name($this->table_name);
		
		if(isset($status) && $status == 'save-data')
		{
			$this->common_model->save_update_data();
			redirect($this->common_model->data['base_url_admin'].'new-listing/other_banner');
		}
		else
		{
			$this->common_model->extra_js[] = 'vendor/jquery-validation/dist/additional-methods.min.js';
			$ele_array = array(
				'other_banner1'=>array('is_required'=>'required','type'=>'file','path_value'=>$this->common_model->other_banner),
				'other_banner1_logo'=>array('is_required'=>'required','type'=>'file','path_value'=>$this->common_model->other_banner),
				'other_banner1_title'=>array('is_required'=>'required'),
				'other_banner1_description'=>array('is_required'=>'required','type'=>'textarea'),
				'other_banner2'=>array('is_required'=>'required','type'=>'file','path_value'=>$this->common_model->other_banner),
				'mobile_matrimony_description'=>array('is_required'=>'required','type'=>'textarea'),
				'horizontal_banner'=>array('is_required'=>'required','type'=>'file','path_value'=>$this->common_model->other_banner,'inline_style'=>'background:rgba(49,33,248,0.95);'),
				'status'=>array('type'=>'radio')
			);
			
			$other_config = array('mode'=>'edit','id'=>'1','enctype'=>'enctype="multipart/form-data"');
			$this->data['data'] = $this->common_model->generate_form_main($ele_array,$other_config);

			$this->common_model->__load_header($this->label_page);
			$this->load->view('common_file_echo',$this->data);
			$this->common_model->__load_footer();
		}	
	}
	
	public function reason_why_choose($status ='ALL', $page =1)
	{
		$ele_array = array(
			'title'=>array('is_required'=>'required'),
			'description'=>array('is_required'=>'required','type'=>'textarea'),
			'icon'=>array('is_required'=>'required','type'=>'file','path_value'=>'assets/images/'),
			'status'=>array('type'=>'radio')
		);
		$this->common_model->extra_js[] = 'vendor/jquery-validation/dist/additional-methods.min.js';
		
		$other_config = array('enctype'=>'enctype="multipart/form-data"','display_image'=>array('icon'),'searchAllow'=>'no');
		$this->common_model->common_rander('reason_why_choose', $status, $page , 'Reason Why Choose',$ele_array,'id',0,$other_config);
	}

	public function add_matrimoni_data($status ='ALL', $page =1)
	{
		// if(isset($status) && $status!=''){
		// 	print_r($data);
		// }
		$ele_array = array(
			'pagename'=>array('is_required'=>'required'),
			'title'=>array('is_required'=>'required'),
			'matrimony_description'=>array('is_required'=>'required','type'=>'textarea'),
			'banner'=>array('is_required'=>'required','type'=>'file','path_value'=>'assets/community/banner/'),
			'search_type'=>array('is_required'=>'required','class'=>' not_reset ','type'=>'dropdown','onchange'=>"dropdownChange_com('matrimony_name','search_type')", 'value_arr'=>array('Religion'=>'Religion','Caste'=>'Caste','Mother-Tongue'=>'Mother Tongue','Country'=>'Country')),
			'matrimony_name'=>array('is_required'=>'required','type'=>'dropdown','class'=>'select2','relation'=>array('rel_table'=>'matrimony_data','key_val'=>'matrimony_name','key_disp'=>'matrimony_name','rel_col_name'=>'search_type','not_load_add'=>'yes')),
			'og_title'=>array('is_required'=>'required'),
			'og_img'=>array('is_required'=>'required','type'=>'file','path_value'=>'assets/community/ogimg/'),
			'og_descrition'=>array('is_required'=>'required','type'=>'textarea'),
			'meta_keyword'=>array('is_required'=>'required','type'=>'textarea'),
			'meta_title'=>array('is_required'=>'required'),
			'meta_description'=>array('is_required'=>'required','type'=>'textarea'),
			'matri_id_groom'=>array('display_in'=>'2','type'=>'dropdown','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'chosen-select','relation'=>array('rel_table'=>'register','key_val'=>'matri_id','key_disp'=>'matri_id','rel_col_name'=>'gender','rel_col_val'=>'Male')),
			'matri_id_bride'=>array('display_in'=>'2','type'=>'dropdown','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'chosen-select','relation'=>array('rel_table'=>'register','key_val'=>'matri_id','key_disp'=>'matri_id','rel_col_name'=>'gender','rel_col_val'=>'Female')),
			'status'=>array('type'=>'radio')
		);
		$this->common_model->extra_css[] = 'vendor/chosen_v1.4.0/chosen.min.css';
		$this->common_model->extra_js[] = 'vendor/chosen_v1.4.0/chosen.jquery.min.js';
		$this->common_model->extra_js[] = 'vendor/jquery-validation/dist/additional-methods.min.js';
		$this->common_model->js_extra_code.= "
		var config = {
			'.chosen-select': {},
			'.chosen-select-deselect': { allow_single_deselect: true },
			'.chosen-select-no-single': { disable_search_threshold: 10 },
			'.chosen-select-no-results': { no_results_text: 'Oops, nothing found!' },
			'.chosen-select-width': { width: '100%' }			
			};
			$('#matri_id_groom').chosen({placeholder_text_multiple:'Select Matri Id Groom'});
			$('#matri_id_bride').chosen({placeholder_text_multiple:'Select Matri Id Bride'});

			var store = $('#matrimony_name').val();
			var base_url = $('#base_url').val();
			action = base_url+ 'common_request/get_list';
			var hash_tocken_id = $('#hash_tocken_id').val();
			var get_list = $('#search_type').val();
			if(get_list!='' && get_list=='Religion')
			{
				get_list = 'religion_lists';
			}
			else if(get_list!='' && get_list=='Caste')
			{
				get_list = 'caste_dropdown';
			}
			else if(get_list!='' && get_list=='Mother-Tongue')
			{
				get_list = 'mothertongue_lists';
			}
			else if(get_list!='' && get_list=='Country')
			{
				get_list = 'country_lists';
			}
			if(get_list !='' && get_list != null )
			{
				show_comm_mask();
				$.ajax({
				url: action,
				type: 'post',
				dataType:'json',
				data: {'csrf_new_matrimonial':hash_tocken_id,'get_list':get_list},
				success:function(data)
				{
					$('#matrimony_name').html(data.dataStr);
					$('#matrimony_name option[value=\"'+store+'\"]').attr('selected', 'selected');
					update_tocken(data.tocken);
					hide_comm_mask();
				}
				});
			}";
		$other_config = array('enctype'=>'enctype="multipart/form-data"','display_image'=>array('banner','og_img'),'searchAllow'=>'no');
		$this->common_model->common_rander('matrimony_data', $status, $page , 'Matrimony Data',$ele_array,'id',0,$other_config);
	}


	public function add_ticker($status ='')
	{
		$this->label_page = 'Update Ticker';
		$this->table_name = 'ticker_master';// *need to set here tabel name //
		$this->common_model->set_table_name($this->table_name);
		
		if($_POST)
		{	
			$id=$_POST['id'];
			if(isset($id)){
				$this->db->where('id',$id);
   				$q = $this->db->get('ticker_master');
			}

			$data=array('title'=>$_POST['title']);
			if ( $q->num_rows() > 0 ) 
			{
				$this->db->where('id',$id);
				$this->db->update('ticker_master',$data);

			} else {
				$this->db->set('id', $id);
				$this->db->insert('ticker_master',$data);
			}
			redirect($this->common_model->data['base_url_admin'].'new-listing/add_ticker');
		}
		else
		{
			$this->common_model->extra_js[] = 'vendor/jquery-validation/dist/additional-methods.min.js';
		
			
			$other_config = array('mode'=>'edit','id'=>'1','enctype'=>'enctype="multipart/form-data"');
			
			$this->db->where('id','1');
			$query = $this->db->get('ticker_master');			
			$this->data['ticker'] = $query->result();

			

			$this->common_model->__load_header($this->label_page);
			$this->load->view('back_end/add_ticker',$this->data);
			$this->common_model->__load_footer();
		}	
	}
}