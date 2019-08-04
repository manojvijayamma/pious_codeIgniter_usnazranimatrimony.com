<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Express_interest_model extends CI_Model {
	public $data = array();
	public function __construct()
	{
		parent::__construct();
		$this->mode_exp = '';
		$this->table_name = 'expressinterest';
	}
	
	function all_sent_interest($post=0,$page='')
	{
		$mode_exp = '';	
		if($this->input->post('exp_status') !='')
		{
			$mode_exp = $this->input->post('exp_status');
		}
		if($mode_exp == '' )
		{
			$mode_exp = 'all_sent';
		}
		$this->mode_exp = $mode_exp;
		
		$member_id = $this->common_front_model->get_user_id();
		$where_arra = array('id'=>$member_id);  
		$row_data = $this->common_model->get_count_data_manual('register',$where_arra,1,'matri_id');
		$login_user_matri_id = $row_data['matri_id'];
		//$login_user_matri_id = $this->common_front_model->get_user_id('matri_id','matri_id');
		
		$this->common_model->set_table_name($this->table_name);
		if($mode_exp =='all_sent' || $mode_exp =='accept_sent' || $mode_exp =='reject_sent' || $mode_exp =='pending_sent')
		{
			$where_arra=array('expressinterest.sender'=>$login_user_matri_id,'expressinterest.trash_sender'=>'No');
			$this->db->join('register_view','expressinterest.receiver = register_view.matri_id ','left');
		}
		else if($mode_exp =='all_receive' || $mode_exp =='accept_receive' || $mode_exp =='reject_receive' || $mode_exp =='pending_receive')
		{
			$where_arra=array('expressinterest.receiver'=>$login_user_matri_id,'expressinterest.trash_receiver'=>'No',"register_view.is_deleted"=>'No');
			$this->db->join('register_view','expressinterest.sender = register_view.matri_id ','left');
		}
		if($mode_exp =='accept_sent' || $mode_exp =='accept_receive')
		{
			$where_arra['expressinterest.receiver_response']='Accepted';
		}
		else if($mode_exp =='reject_sent' || $mode_exp =='reject_receive')
		{
			$where_arra['expressinterest.receiver_response']='Rejected';
		}
		else if($mode_exp =='pending_sent' || $mode_exp =='pending_receive')
		{
			$where_arra['expressinterest.receiver_response']='Pending';
		}
		//$where_arra = array('register_view.is_deleted' => 'No', "register_view.status !='UNAPPROVED' and register_view.status !='Suspended'");
		if($post == 0)
		{	
			$data = $this->common_model->get_count_data_manual($this->table_name,$where_arra,0,'');
		}
		else
		{
			$data = $this->common_model->get_count_data_manual($this->table_name,$where_arra,2,'register_view.id as user_id,register_view.matri_id,register_view.username,register_view.gender,register_view.birthdate,register_view.height,register_view.weight,register_view.religion,register_view.religion_name,register_view.caste_name,register_view.caste,register_view.country_name,register_view.city_name,register_view.photo1,register_view.photo1_approve,register_view.photo2,register_view.photo3,register_view.photo4,register_view.photo5,register_view.photo6,register_view.photo_view_status,register_view.photo_password,register_view.photo_protect,register_view.last_login,register_view.birthdate,register_view.mtongue_name,register_view.occupation_name,register_view.education_detail,register_view.state_name,register_view.is_deleted as deleted,expressinterest.*','expressinterest.id desc',$page,10);
		}
		/*echo $this->common_model->last_query();
		echo '<br/><br/>';*/
		return $data;
	}
	public function check_for_update_status()
	{
		$user_agent = $this->input->post('user_agent') ? $this->input->post('user_agent') : 'NI-WEB';
		
		$status = '';
		$id = '';
		if($this->input->post('status') !='')
		{
			$status = $this->input->post('status');
		}
		if($this->input->post('id') !='')
		{
			$id = $this->input->post('id');
			$data_id = $this->input->post('id');
		}
		if($status !='' && $id !='')
		{
			$mode_exp = '';	
			if($this->input->post('exp_status') !='')
			{
				$mode_exp = $this->input->post('exp_status');
			}
			if($mode_exp == '' )
			{
				$mode_exp = 'all_sent';
			}
			if($status =='delete')
			{
				$coulmn_name = 'trash_sender';
				if($mode_exp !='' && in_array($mode_exp,array('all_receive','accept_receive','reject_receive','pending_receive')))
				{
					$coulmn_name = 'trash_receiver';
				}
				if($coulmn_name !='')
				{
					$data_array = array($coulmn_name=>'Yes','is_deleted'=>'Yes');
					$success_message = "Data Deleted Successfully";
				}
			}
			else if($status =='reject')
			{
				$data_array = array('receiver_response'=>'Rejected','reminder_status'=>'No');
				$success_message = "Express interest rejected successfully";
			}
			else if($status =='accept')
			{
				$data_array = array('receiver_response'=>'Accepted','reminder_status'=>'No');
				$success_message = "Express interest accepted successfully";
				$accept_status='Yes';
				// need to send sms and email 
			}
			else if($status =='reminder')
			{
				$data_array = array('reminder_status'=>'Yes');
				$success_message = "Reminder sent successfully";
			}
			if(isset($data_array) && $data_array !='' && count($data_array))
			{
				if($id !='' && !is_array($id))
				{
					$id = explode(',',$id);
				}
				$where_arra = array('is_deleted'=>'No');
				$this->db->where_in('id',$id);
				$return = $this->common_model->update_insert_data_common($this->table_name,$data_array,$where_arra,1,0);
				
				if($return == true)
				{
					if(isset($success_message) && $success_message !='')
					{
						$this->session->set_flashdata('success_message',$success_message);
					}
					if($user_agent !='NI-WEB')
					{
						$data1['status'] = 'success';
						if(isset($accept_status) && $accept_status!='')
						{
							$interest_data = $this->common_front_model->get_user_data('register',$data_id,'ios_device_id,android_device_id','id');
							if(isset($interest_data) && $interest_data!='' && count($interest_data)>0)
							{
								foreach ($interest_data as $key => $value) {
									if(isset($value) && $value!='' && isset($key) && $key!='')
									{
										$interest_message = 'You receive interest from ';
										$this->common_model->new_send_notification_android($value,$interest_message,'Interest Receive','interest_receive','send');
									}
								}	
							}
						}
						$data1['tocken'] = $this->security->get_csrf_hash();
						$data1['errormessage'] =  $success_message;
						$data1['errmessage'] =  $success_message;
						$data['data'] = json_encode($data1);
						$this->load->view('common_file_echo',$data);
					}
				}
				else
				{
					$this->session->set_userdata('error_message','Sorry Some error occurred, Please try again');
					
					if($user_agent !='NI-WEB')
					{
						$data1['status'] = 'error';
						$data1['tocken'] = $this->security->get_csrf_hash();
						$data1['errormessage'] =  "Sorry Some error occurred, Please try again";
						$data1['errmessage'] =  "Sorry Some error occurred, Please try again";
						$data['data'] = json_encode($data1);
						$this->load->view('common_file_echo',$data);
					}
				}
			}
		}
	}
}
?>