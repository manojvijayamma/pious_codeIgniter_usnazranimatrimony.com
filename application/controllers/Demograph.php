<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Demograph extends CI_Controller {
	public $data = array();
	
	public function __construct()
	{
		parent::__construct();
		$this->base_url = base_url();
		$this->data['base_url'] = $this->base_url;
		$this->load->model('front_end/demograph_model');
		$this->common_front_model->last_member_activity();
	}
	public function index()
	{
		$this->common_model->extra_css_fr= array('css/fontello.css');
		$this->common_model->extra_js_fr= array ('js/chart_loader.js');
		$this->data['demograph_data'] = $this->demograph_model->demograph_data('Both','All','All','All');
		$this->common_model->front_load_header('Demograph');
		$this->load->view('front_end/demograph',$this->data);
		$this->common_model->front_load_footer();
	}
	
	public function relegion_chart()
	{
		if($_POST['gender'] == 'Both'){
			$gender = 'Both';
		}else{
			$gender = $_POST['gender'];
		}
		
		/*if($_POST['country'] == 'All'){
			$country = 'All';
		}else{
			$country = $_POST['country'];
		}*/
		
		//$count_all_religion = $this->demograph_model->demograph_data($gender,'All','All');
		$count_Hindu_religion = $this->demograph_model->demograph_data($gender,'Knanaya','All');
		$count_Muslim_religion = $this->demograph_model->demograph_data($gender,'Latin','All');
		$count_Sikh_religion = $this->demograph_model->demograph_data($gender,'Syro Malabar','All');
		$count_Jain_religion = $this->demograph_model->demograph_data($gender,'Syro Malankara','All');
		//$count_Buddhist_religion = $this->demograph_model->demograph_data($gender,'Buddhist','All');
		//$count_Christian_religion = $this->demograph_model->demograph_data($gender,'Christian','All');
		$count_Other_religion = $this->demograph_model->demograph_data($gender,'Other','All');
		
		//$rows[]=array("c"=>array("0"=>array("v"=>'All',"f"=>NULL),"1"=>array("v"=>(int)$count_all_religion,"f" =>NULL)));
		$rows[]=array("c"=>array("0"=>array("v"=>'Knanaya',"f"=>NULL),"1"=>array("v"=>(int)$count_Hindu_religion,"f" =>NULL)));
		$rows[]=array("c"=>array("0"=>array("v"=>'Latin',"f"=>NULL),"1"=>array("v"=>(int)$count_Muslim_religion,"f" =>NULL)));
		$rows[]=array("c"=>array("0"=>array("v"=>'Syro Malabar',"f"=>NULL),"1"=>array("v"=>(int)$count_Sikh_religion,"f" =>NULL)));
		$rows[]=array("c"=>array("0"=>array("v"=>'Syro Malankara',"f"=>NULL),"1"=>array("v"=>(int)$count_Jain_religion,"f" =>NULL)));
		/*$rows[]=array("c"=>array("0"=>array("v"=>'Buddhist',"f"=>NULL),"1"=>array("v"=>(int)$count_Buddhist_religion,"f" =>NULL)));
		$rows[]=array("c"=>array("0"=>array("v"=>'Christian',"f"=>NULL),"1"=>array("v"=>(int)$count_Christian_religion,"f" =>NULL)));*/
		$rows[]=array("c"=>array("0"=>array("v"=>'Other',"f"=>NULL),"1"=>array("v"=>(int)$count_Other_religion,"f" =>NULL)));
		
		echo $format = '{
		"cols":
		[
		{"id":"","label":"Religion","pattern":"","type":"string"},
		{"id":"","label":"Count","pattern":"","type":"number"}
		],
		"rows":'.json_encode($rows).'}';
	}
	
	public function age_chart()
	{
		if($_POST['gender'] == 'Both'){
			$gender = 'Both';
		}else{
			$gender = $_POST['gender'];
		}
		$count_18_30 = $this->demograph_model->demograph_data($gender,'All','18-30');
		$count_31_40 = $this->demograph_model->demograph_data($gender,'All','31-40');
		$count_41_50 = $this->demograph_model->demograph_data($gender,'All','41-50');
		$count_51_60 = $this->demograph_model->demograph_data($gender,'All','51-60');
		$count_61_70 = $this->demograph_model->demograph_data($gender,'All','61-70');
		$count_71_80 = $this->demograph_model->demograph_data($gender,'All','71-80');
		$count_81_90 = $this->demograph_model->demograph_data($gender,'All','81-90');
				
		$rows[]=array("c"=>array("0"=>array("v"=>'18-30',"f"=>NULL),"1"=>array("v"=>(int)$count_18_30,"f" =>NULL)));
		$rows[]=array("c"=>array("0"=>array("v"=>'31-40',"f"=>NULL),"1"=>array("v"=>(int)$count_31_40,"f" =>NULL)));
		$rows[]=array("c"=>array("0"=>array("v"=>'41-50',"f"=>NULL),"1"=>array("v"=>(int)$count_41_50,"f" =>NULL)));
		$rows[]=array("c"=>array("0"=>array("v"=>'51-60',"f"=>NULL),"1"=>array("v"=>(int)$count_51_60,"f" =>NULL)));
		$rows[]=array("c"=>array("0"=>array("v"=>'61-70',"f"=>NULL),"1"=>array("v"=>(int)$count_61_70,"f" =>NULL)));
		$rows[]=array("c"=>array("0"=>array("v"=>'71-80',"f"=>NULL),"1"=>array("v"=>(int)$count_71_80,"f" =>NULL)));
		$rows[]=array("c"=>array("0"=>array("v"=>'81-90',"f"=>NULL),"1"=>array("v"=>(int)$count_81_90,"f" =>NULL)));
		
		echo $format = '{
		"cols":
		[
		{"id":"","label":"Age","pattern":"","type":"string"},
		{"id":"","label":"Count","pattern":"","type":"number"}
		],
		"rows":'.json_encode($rows).'}';
	}
	
	public function gender_data(){
		if($_POST['gender'] == 'Both'){
			$gender = 'Both';
		}else{
			$gender = $_POST['gender'];
		}
		$data = $this->demograph_model->country_data_gender_wise($gender);
		echo json_encode($data);
	}
	
	public function country_data(){
		if($_POST['gender'] == 'Both'){
			$gender = 'Both';
		}else{
			$gender = $_POST['gender'];
		}
		if($_POST['country'] == 'All'){
			$country = 'All';
		}else{
			$country = $_POST['country'];
		}
		$data = $this->demograph_model->gender_data_country_wise($gender,$country);
		echo json_encode($data);
	}
}