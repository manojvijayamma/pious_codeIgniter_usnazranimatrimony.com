<?php $subject = '';
	$message = '';
	$message_id = '';
	$receiver_id ='';
	$sent_on = '';
	if(!isset($mode))
	{
		$mode = 'inbox';
	}
	if(isset($msg_id) && $msg_id !='')
	{
		$msg_id = $this->common_model->descrypt_id($msg_id);
		$matri_id = $this->common_front_model->get_user_id('matri_id');
		
		if(isset($mode) && $mode =='sent')
		{
			$where_arra = array('id'=>$msg_id,'sender'=>$matri_id,'sender_delete'=>'No','trash_sender'=>'No');
			$where_arra[] = " status != 'draft' ";
		}
		else if(isset($mode) && $mode =='trash')
		{
			//$where_arra = array('id'=>$msg_id,'receiver'=>$matri_id,'status'=>'trash','is_deleted'=>'No','trash_receiver'=>'No');
			
			$where_arra[] = " id = '$msg_id' and (( sender = '$matri_id' and trash_sender != 'No' and sender_delete = 'No') or ( receiver = '$matri_id' and trash_receiver != 'No' and receiver_delete = 'No' ))  ";
		}
		else
		{
			$where_arra = array('id'=>$msg_id,'receiver'=>$matri_id,'status'=>'sent','receiver_delete'=>'No','trash_receiver'=>'No');
		}
		
		$data_arr_message = $this->common_front_model->get_count_data_manual('message',$where_arra,1);
		//print_r($data_arr_message);exit;
		
		if(isset($data_arr_message) && $data_arr_message !='' && is_array($data_arr_message) && count($data_arr_message) > 0)
		{
			$gender = $this->common_front_model->get_user_id('gender');
			$subject = $data_arr_message['subject'];
			$message = $data_arr_message['content'];
			$message_id = $data_arr_message['id'];
			$sent_on = $data_arr_message['sent_on'];
			/*if(isset($mode) && $mode =='sent')
			{
				$receiver_id =$data_arr_message['receiver'];
			}
			else
			{
				$receiver_id = $data_arr_message['sender'];
			}*/
			
			if($data_arr_message['receiver'] != $matri_id){
				$receiver_id =$data_arr_message['receiver'];
				
			}else{
				$receiver_id = $data_arr_message['sender'];
			}
			if($mode == 'inbox' && $data_arr_message['read_status'] =='No')
			{
				$this->common_model->update_insert_data_common('message',array('read_status' => 'Yes'),array('id'=>$message_id));
			}
		}
	}
	if($message_id =='')
	{
?>
	<script type="text/javascript">window.location ='<?php echo $base_url.'message/index' ?>'</script>
<?php		
	}
?>
<div id="main_id_display">
<style> .user { padding: 5px; margin-bottom: 5px; text-align: center; } 
.select2 input { margin-top: 10px !important; margin-bottom: 4px !important;}
</style>
<!------------------<div class="container">----Start-------------------->
    <div class="container padding-lr-zero-xs">
        <!--<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-0-5-xs">
            <div class="">
                <img src="<?php //echo $base_url; ?>assets/front_end/images//icon/register-header-female.jpg" class="ful-width img-thumbnail" alt="" style="width:100%;" /> 
            </div>
        </div>-->
        <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 padding-20-5-xs" style="padding:20px 20px;">
            <input type="hidden" value="compose_message" id="page_type" />
            <input type="hidden" value="<?php echo $mode; ?>" id="mode" />
            <?php 
			$message_type = $mode;
			include_once('message_sidebar.php'); ?>
            
            <div id="sc_div_message" class="xxl-12 xl-12 l-12 xs-16 m-16 s-16 ne_inbox_right_pan padding-lr-zero-320 margin-top-10px-320px padding-lr-zero-480 margin-top-10px-480px  ne-mrg-top-10-768 bg-border border-top padding-20-5-xs" style="">
                <h3 class="upgrade-heading margin-top-0px font-18 text-brown  text-center" style="padding:5px;margin-top:-15px !important">
                    <i class="fa fa-plus ne_mrg_ri8_10"></i>
                    View Message
                </h3>
                <div id="response_update_status">
                
                </div>                
                
                <div id="Borge" class="w3-container person col-md-12">
				<br>
				<div class="col-md-12" style="display:-webkit-inline-box;">
					<a href="<?php echo $base_url.'message/inbox/'.$mode; ?>" class="margin-right-10"><img class="" src="<?php echo $base_url; ?>assets/front_end/images/icon/mail_back.png" title="Back"></a>
					<h5 class="w3-opacity color-red bold margin-top-5 w3-animate-zoom">Subject: <?php echo $this->common_model->display_data_na($subject); ?></h5>
				</div>
				<div class="clearfix"></div>
				<hr style="border:1px solid #ccc;" />
				<div class="col-md-7">
				<h6 class="text-darkgrey font-13 w3-animate-right" style="margin-top:0px"> <i class="fa fa-map"></i> 
                <?php 
					if(isset($data_arr_message['receiver']) && $data_arr_message['receiver'] == $matri_id){
						echo 'From: ';
					}else{
						echo 'To: ';
					}
						echo $this->common_model->display_data_na(ucfirst($receiver_id));
				?></h6>
				<h6 class="text-darkgrey margin-top-0 font-13 w3-animate-right"> <i class="fa fa-calendar"></i> <?php echo $this->common_model->displayDate($sent_on); ?></h6>
				</div>
				
				<div class="col-md-5 pull-right w3-animate-bottom">
                	<div class="pull-right">
					<!--<div class="btn-group">
						<a class="btn btn-md btn-primary dropdown-toggle" data-toggle="dropdown" style="padding:9px 17px 9px 17px;">
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><i class="fa fa-mail-reply margin-right-5"></i>Reply</a></li>
							<li><a href="#"><i class="fa fa-mail-forward margin-right-5"></i>Forward</a></li>
							<li><a href="#"><i class="fa fa-print margin-right-5"></i>Print</a></li>
							<li><a data-toggle="modal" data-target="#myModal_delete" href="javascript:;"><i class="fa fa-trash margin-right-5"></i> Delete</a></li>
							<li><a href="#"><i class="fa fa-ban margin-right-5"></i> Block</a></li>
						</ul>
					</div>-->
					<?php
					if($mode =='inbox')
					{
						$imp_star = '';
						if(isset($data_arr_message['important_status']) && $data_arr_message['important_status'] !='')
						{
							$important_status = $data_arr_message['important_status'];
						}
						if($important_status == 'No')
						{
							$imp_star = '-o';
						}
					?>
                    <a class="w3-button w3-dark-grey font-13-normal border" data-toggle="tooltip" onClick="importantfun('<?php echo $message_id; ?>')" title="Imported" href="#" style="box-shadow: 0 1px 1px rgba(43,59,93,0.29);"><i id="msg_imp_<?php echo $message_id; ?>" style="color:rgba(244,189,0,1.00)" class="fa fa-star<?php echo $imp_star; ?>"></i></a>
                    <?php
					}
					$enc_msg_id = $this->common_model->encrypt_id($message_id);
					?>
                    <a class="w3-button w3-dark-grey font-13-normal border tooltip1" title="Delete Message" data-toggle="modal" data-target="#myModal_delete" style="box-shadow: 0 1px 1px rgba(43,59,93,0.29);"><i class="fa fa-trash"></i></a>
                    
                    <a class="w3-button w3-dark-grey font-13-normal border" data-toggle="tooltip" title="Reply" href="<?php echo $base_url.'message/compose/'.$enc_msg_id.'/reply';?>" style="box-shadow: 0 1px 1px rgba(43,59,93,0.29);"><i class="fa fa-mail-reply"></i></a>
					
					<a class="w3-button w3-dark-grey font-13-normal border " data-toggle="tooltip" title="forward" href="<?php echo $base_url.'message/compose/'.$enc_msg_id.'/forward';?>" style="box-shadow: 0 1px 1px rgba(43,59,93,0.29);"><i class="fa fa-mail-forward"></i></a>
                    </div>
				</div>
				<div class="clearfix"></div>
				
				<div style="padding:0px 15px;">
                	<?php echo $this->common_model->display_data_na($message); ?>
                </div>
				
				<div class="clearfix"></div>
				<hr style="border:1px solid #ccc;">
			</div>
            
            
                <div class="clearfix"></div>
				<div id="myModal_delete" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/alert.png" alt="" class="" /> Delete Message</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16">
                                        <div class="alert alert-danger" style="overflow:hidden;box-shadow:4px 4px 0 0 #ccc;">
                                            <div class="xxl-2 xl-2 l-2 m-16 xs-16 s-16">
                                                <img src="<?php echo $base_url; ?>assets/front_end/images/icon/delete.png" alt="" class="margin-right-10 margin-top-10" />
                                            </div>
                                            <div class="xxl-13 xl-13 l-13 m-16 xs-16 s-16 xxl-margin-left-1 xl-margin-left-1 margin-top-10">
                                                <strong>Are you sure want to Delete Message?</strong><br />
                                                <span class="small">This Records will be Deleted Permanently from your Entire Records.</span>
                                                <input style="display:none" type="checkbox" name="checkbox_val[]" value="<?php echo $message_id; ?>" checked />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="modal-footer margin-top-10">
                                    <a onClick="update_msg_status('delete')" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Yes</a>
                                    <a class="btn btn-sm btn-danger margin-left-0-xs margin-top-10-xs" data-dismiss="modal"><i class="fa fa-close"></i> No</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
<!------------------<div class="container">----End-------------------->
	<div class="margin-top-30"></div>
<?php
	$this->common_model->js_extra_code_fr.="
		$(document).ready(function(){
			tooltip_fun();
		});
	";
?>
</div>