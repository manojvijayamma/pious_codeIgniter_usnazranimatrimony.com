<?php
	//$subject = '';
	$message = '';
	$message_id = '';
	$receiver_id ='';
	if(isset($msg_id) && $msg_id !='')
	{
		$msg_id = $this->common_model->descrypt_id($msg_id);
		$matri_id = $this->common_front_model->get_user_id('matri_id');
		$where_arra = array('id'=>$msg_id,'is_deleted'=>'No');
		$data_arr_message = $this->common_front_model->get_count_data_manual('message',$where_arra,1);
		if(isset($data_arr_message) && $data_arr_message !='' && is_array($data_arr_message) && count($data_arr_message) > 0)
		{
			$gender = $this->common_front_model->get_user_id('gender');
			
			if(isset($mode) && (($mode=='draft' && $data_arr_message['sender'] == $matri_id && $data_arr_message['status'] =='draft') || $mode=='forward'))
			{
				//$subject = $data_arr_message['subject'];
				$message = $data_arr_message['content'];
			}
			if(isset($mode) && ($mode=='draft' || $mode=='reply'))
			{
				if(isset($data_arr_message['receiver']) && $matri_id != $data_arr_message['receiver'])
				{
					$receiver_id = $data_arr_message['receiver'];
				}
				else if(isset($data_arr_message['sender']) && $matri_id != $data_arr_message['sender'])
				{
					$receiver_id = $data_arr_message['sender'];
				}
				
				if($mode =='draft')
				{
					$message_id = $data_arr_message['id'];
				}
				$where_arra = array('is_deleted'=>'No',"status !='Suspended' and status!='Inactive' and matri_id = '".$receiver_id."' and gender!='".$gender."' ");
				$rec_count = $this->common_front_model->get_count_data_manual('register',$where_arra,0,'matri_id');
				if($rec_count == 0)
				{
					$receiver_id = '';
				}
			}
		}
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
			$message_type = '';
			include_once('message_sidebar.php'); ?>
            
            <div id="sc_div_message" class="xxl-12 xl-12 l-12 xs-16 m-16 s-16 ne_inbox_right_pan padding-lr-zero-320 margin-top-10px-320px padding-lr-zero-480 margin-top-10px-480px  ne-mrg-top-10-768 bg-border border-top padding-20-5-xs" style="">
                <h3 class="upgrade-heading margin-top-0px font-18 text-brown  text-center" style="padding:5px;margin-top:-15px !important">
                    <i class="fa fa-plus ne_mrg_ri8_10"></i>
                    Compose Message
                </h3>
                <div id="response_update_status">
                
                </div>
                
                <form id="mes_content_form" method="post" action="<?php echo $base_url.'message/send_message'; ?>">
                    <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-tpstrip-inbox ne_pad_tp_5px ne_pad_btm_5px"  style="    background-image:-webkit-gradient(linear,left top,left bottom,from(#f5f5f5),to(#cfd1cf));border-radius:3px;border:1px solid #ddd;">
                        <a onClick="return save_draft_send_message('sent')" class="ne_msg_tp_strip center-text btn btn-success" data-toggle="tooltip" data-placement="top" title="Send Message">
                            <i class="fa fa-paper-plane"></i>
                        </a>
                        <a onClick="return save_draft_send_message('draft')" class="ne_msg_tp_strip btn btn-primary" data-toggle="tooltip" data-placement="top" title="Draft" >
                            <i class="fa fa-download"></i>
                        </a>
                        <?php
							if($mode =='draft' && $message_id !='')
							{
						?>
                        <a class="ne_msg_tp_strip btn btn-danger tooltip1" data-toggle="modal" data-target="#myModal_delete" title="Trash" >
                            <i class="fa fa-trash"></i>
                        </a>
                        <?php
							}
						?>
                    </div>
                    
                    <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne_pad_tp_5px ne_pad_btm_5px padding-lr-zero margin-top-10px">
                        <label class="xxl-2 xl-2 l-3 m-3 s-3 xs-3 compose_msg_addon" style="padding:7.5px 16px;">
                            To <span class="hidden-sm hidden-xs">:</span>
                        </label>
                        <div class="xxl-14 xl-14 l-13 m-13 s-13 xs-13 padding-lr-zero">
                            <select data-placeholder="Choose Receiver Matri ID" class="select form-control margin-top-0-xs" multiple name="to_message[]" data-validetta="required" id="to_message">
                            <?php
								if(isset($receiver_id) && $receiver_id !='')
								{
							?>
                            <option selected value="<?php echo $receiver_id; ?>"><?php echo $receiver_id; ?></option>
                            <?php
								}
							?>
                            </select>
                        </div>
                    </div>
                    
                    <!-- <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne_pad_tp_5px ne_pad_btm_5px padding-lr-zero">
                        <label class="xxl-2 xl-2 l-3 m-3 s-5 xs-5 compose_msg_addon" style="padding:6px 16px;">
                            Subject <span class="hidden-sm hidden-xs">:</span>
                        </label>
                        <div class="xxl-14 xl-14 l-13 m-13 s-11 xs-11 padding-lr-zero" style="height:33px">
                            <input type="text" class="form-control subject-input" placeholder="Enter Your Subject" name="subject" id="subject" data-validetta="required" required style="border:1px solid #DFDFDF;margin:0px;height:34px" value="<?php //if(isset($subject) && $subject !='') { echo $subject; }?>" />
                        </div>
                    </div> -->
                    <ul class="xxl-16 xl-16 s-16 l-16 m-16 xs-16 ne_inbox_msg_section padding-lr-zero" style="border:1px solid #ddd;">
                        <li class="xxl-16 xl-16 s-16 l-16 m-16 xs-16 padding-lr-zero ne_pad_tp_15px">
                            <div class="xxl-16 xl-16 s-16 l-16 m-16 xs-16 ne_pad_btm_15px">
                                Enter Your Message:
                            </div>
                            <div class="xxl-16 xl-16 s-16 l-16 m-16 xs-16 padding-lr-zero ne-editor">
                                <div id="txtEditor"></div>
                            </div>
                        </li>
                    </ul>
                    <textarea style="display:none" id="msg_content" name="msg_content"><?php if(isset($message) && $message !='') { echo $message; }?></textarea>
                    <!--<input type="hidden" id="msg_content" name="msg_content" value="<?php if(isset($message) && $message !='') { echo $message; }?>" data-validetta="required" required />-->
                    <input type="hidden" id="msg_staus" name="msg_status" value="">
                    <input type="hidden" id="msg_id" name="msg_id" value="<?php if(isset($message_id) && $message_id !='') { echo $message_id; }?>">
                    
                    <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne-bdr-tpstrip-inbox ne_pad_tp_5px ne_pad_btm_5px margin-top-10px"  style="    background-image:-webkit-gradient(linear,left top,left bottom,from(#f5f5f5),to(#cfd1cf));border-radius:3px;border:1px solid #ddd;">
                        <a onClick="return save_draft_send_message('sent')" class="ne_msg_tp_strip center-text btn btn-success" data-toggle="tooltip" data-placement="top" title="Send Message">
                            <i class="fa fa-paper-plane"></i>
                        </a>
                        <a onClick="return save_draft_send_message('draft')" class="ne_msg_tp_strip btn btn-primary" data-toggle="tooltip" data-placement="top" title="Draft" >
                            <i class="fa fa-download"></i>
                        </a>
                        <?php
							if($mode =='draft' && $message_id !='')
							{
						?>
                        <a class="ne_msg_tp_strip btn btn-danger tooltip1" data-toggle="modal" data-target="#myModal_delete" title="Trash" >
                            <i class="fa fa-trash"></i>
                        </a>
                        <?php
							}
						?>
                    </div>
                </form>
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
		function select2_int()
		{	
			var base_url = '".$base_url."';
			$('#to_message').select2({
			 placeholder: 'Select Member Matri ID',
			  ajax: {
				url: base_url+'message/get_member_list',
				type: 'POST',
				dataType:'json',
				data: function (params)
				{
				  return {
					q: params.term,
					page: params.page,
				  };
				},
			  }
			});
		}
		$(document).ready(function() {			
			select2_int();
			
			$('#txtEditor').Editor(); 
			$('div.Editor-editor').html($('#msg_content').val()); 
			$('div.Editor-editor').blur(function(){
				var cms_cont= $('div.Editor-editor').html();
				$('#msg_content').val(cms_cont);
			});
			tooltip_fun();
		});	
	";
?>
</div>