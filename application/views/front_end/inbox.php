<?php
if(isset($first_load) && $first_load !='' && $first_load == true)
{
?>
<div id="main_id_display">
<?php
}
else
{
?>
<div>
<?php
}
?>
<style> .user { padding: 5px; margin-bottom: 5px; text-align: center; } </style>
<?php
	
	if(!isset($page_number) || $page_number  =='' )
	{
		$page_number = 1;
	}
	if($this->input->post('page_number') !='')
	{
		$page_number = $this->input->post('page_number');
	}
	
	$data_message = $this->message_model->get_message_list(1,$page_number,$message_type);
	$total_count = $this->message_model->get_message_list(0,$page_number,$message_type);
	
	$message_search = '';
	if($this->input->post('message_search') !='')
	{
		$message_search = $this->input->post('message_search');
	}
	
	if(!isset($message_type) || $message_type =='' )
	{
		$message_type = 'inbox';
	}
	if(isset($_REQUEST['mode']) && $_REQUEST['mode'] !='')
	{
		$message_type = $_REQUEST['mode'];
	}
	$matri_id = $this->common_front_model->get_user_id('matri_id');
?>
<!------------------<container>----End------------------------------------>
    <div class="clearfix"></div>
    <div class="container padding-lr-zero-xs">        
        <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-320 padding-lr-zero-480 padding-20-5-xs" style="padding:20px 20px;">
        	<input type="hidden" id="page_type" value="inbox_message" />
            <?php include_once('message_sidebar.php'); ?>
            <div class="xxl-12 xl-12 l-12 xs-16 m-16 s-16 ne_inbox_right_pan padding-lr-zero-320 margin-top-10px-320px padding-lr-zero-480 margin-top-10px-480px  ne-mrg-top-10-768 bg-border border-top padding-20-5-xs">
                <h3 class="upgrade-heading margin-top-0px font-18 text-brown text-center" style="padding:5px;margin-top:-15px !important">
                    <i class="fa fa-inbox ne_mrg_ri8_10"></i>
                     <?php echo ucfirst($message_type); ?>
                </h3>
                <div id="response_update_status">
                	<?php
						$class_alt = 'alert';
						if(isset($update_status['status']) && $update_status['status'] =='success')
						{
							$class_alt = 'alert alert-success';
						}
						else if(isset($update_status['status']) && $update_status['status'] =='error')
						{
							$class_alt = 'alert alert-danger';
						}
						if(isset($update_status['error_meessage']) && $update_status['error_meessage'] !='')
						{
					?>
                    	<div class="<?php echo $class_alt; ?> alert-dismissible"><?php echo $update_status['error_meessage'];?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
                    <?php
						}
					?>
                </div>
                <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 bg-offwhite ne-bdr-tpstrip-inbox ne_pad_tp_5px" style="background-image:-webkit-gradient(linear,left top,left bottom,from(#f5f5f5),to(#cfd1cf));border-radius:3px;border:1px solid #ddd;">
                    <div class="xxl-8 xl-8 xs-16 s-16 m-16 l-9 margin-top-5-xs">
                        <div class="row">
                            <span  class="ne_mrg_ri8_10" >
                                <div class="checkbox checkbox-success margin-top-10px margin-bottom-0px margin-left-5" style="display:inline-block;float:left;">
                                    <input onClick="check_all()" type="checkbox" name="checkbox" id="all" value="" class="styled all chk_comm">
                                    <label for="checkbox-c1" class="control-label"></label>
                                </div>
                            </span>
                            <?php 
								if($message_type !='sent' && $message_type !='draft' && $message_type !='trash')
								{
							?>
                            <div class="dropdown ne_disply-inline-blk">
                                <a class="dropdown-toggle  btn btn-default ne_msg_tp_strip" data-toggle="dropdown" style="border:1px solid #ccc;">
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li onClick="update_msg_status('read')"><a>Mark as Read</a></li>
                                    <li onClick="update_msg_status('unread')"><a>Mark as Unread</a></li>
                                </ul>
                            </div>
                            <a class="btn btn-warning ne_msg_tp_strip text-white" onClick="update_msg_status('imported')" data-toggle="tooltip" data-placement="top" title="Important" >
                                <i class="fa fa-star-o"></i>
                            </a>
                            <?php
                            }
                            ?>
                            <a class="ne_msg_tp_strip btn btn-danger text-white tooltip1" data-toggle="modal" data-target="#myModal_delete" title="Trash" onClick="delete_message()" >
                                <i class="fa fa-trash"></i>
                            </a>
                            <a class="btn btn-primary ne_msg_tp_strip text-white" data-toggle="tooltip" data-placement="top" title="Refresh" onClick="message_system('<?php echo $message_type ?>',1)" >
                                <i class="fa fa-refresh"></i>
                            </a>
                            <a onClick="replay_forward('reply')" class="btn btn-danger ne_msg_tp_strip text-white" data-toggle="tooltip" data-placement="top" title="" data-original-title="Reply">
                                <i class="fa fa-reply"></i>
                            </a>
                            <a onClick="replay_forward('forward')" class="btn btn-success ne_msg_tp_strip text-white" data-toggle="tooltip" data-placement="top" title="Forward" >
                                <i class="fa fa-share"></i>
                            </a>
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
                                                <div class="xxl-13 xl-13 l-13 m-16 xs-16 s-16 xxl-margin-left-1 xl-margin-left-1 margin-top-10 delete_conf">
                                                    <strong>Are you sure want to <?php if($message_type=='Trash'){ echo 'Delete ';}else{ echo 'Trash ';}?>Message?</strong><br />
                                                    <span class="small">This Records will be <?php if(isset($message_type) && $message_type=='trash'){echo 'Deleted Permanently';}else{ echo 'Trashed';}?> from your Entire Records.</span>
                                                </div>
                                                <div class="xxl-13 xl-13 l-13 m-16 xs-16 s-16 xxl-margin-left-1 xl-margin-left-1 margin-top-10 delete_alt" style="display:none">
                                                    <strong>Please select at least one message to delete</strong><br />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="modal-footer margin-top-10">
                                    	<div class="delete_conf">
                                        <a onClick="update_msg_status('delete')" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Yes</a>
                                        <a class="btn btn-sm btn-danger margin-left-0-xs margin-top-10-xs" data-dismiss="modal"><i class="fa fa-close"></i> No</a>
                                        </div>
                                        <div class="delete_alt">
                                        	<a class="btn btn-sm btn-danger margin-left-0-xs margin-top-10-xs delete_alt" data-dismiss="modal"><i class="fa fa-close"></i> Close</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="xxl-8 xl-8 m-16 xs-16 s-16 l-7 margin-top-10px-320px margin-top-10px-480px">
                        <div class="row">
                            <div class="xxl-7 xxl-margin-left-1 xs-8 s-8"></div>
                            <div class="xxl-14 xs-16 s-16 pull-right padding-lr-zero margin-top-10-xs">
                                <div class="xxl-14  s-14 m-14 xs-14 padding-lr-zero">
                                    <div class="inner-addon right-addon">
                                        
                                        <form action="" method="post" onSubmit="return message_system()">
                                        <input type="text" class="form-control search" id="message_search" name="message_search" placeholder="Search here Matri Id or message" style="padding:6px 10px;margin-bottom:5px;" value="<?php if(isset($message_search) && $message_search !=''){ echo $message_search;}?>" title="Type keyword and press enter button for search" />
										</form>
										
                                    </div>
                                </div>
								<div class="xxl-2 s-2 m-2 xs-2 padding-lr-zero">
									<a class="ne_msg_tp_strip btn btn-success text-white" onclick="return message_system()" >
									<i class="fa fa-search"></i>
									</a>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix margin-top-20px"></div>
                <form method="post" id="msg_data_form">
                    	<?php
						if(isset($data_message) && $data_message !='' && is_array($data_message) && count($data_message) > 0)
						{
						?>
                        <ul class="xxl-16 xl-16 s-16 l-16 m-16 xs-16 bg-white margin-top-10px ne_inbox_msg_section padding-lr-zero list" style="border:1px solid #ddd;">
                        	<?php
								$matri_id_clm = 'sender';
								$col_sub = 4;
								if($message_type =='sent' || $message_type =='draft')
								{
									$matri_id_clm = 'receiver';
									$col_sub = 5;
								}
								$view_link = 'view_message';
								if($message_type == 'draft')
								{
									$view_link = 'compose';	
								}
								foreach($data_message as $data_message_val)
								{
									$read_status_msg = '';
									if($message_type =='inbox' && $data_message_val['read_status'] =='No' )
									{
										$read_status_msg = 'text-bold';
									}
									$enc_msg_id = $this->common_model->encrypt_id($data_message_val['id']);
									
									if($message_type =='trash')
									{
										if(isset($matri_id) && $matri_id == $data_message_val['sender'])
										{
											$matri_id_clm = 'receiver';
											$col_sub = 4;
										}elseif(isset($matri_id) && $matri_id == $data_message_val['receiver']){
											$matri_id_clm = 'sender';
											$col_sub = 4;
										}
									}
									
							?>
                        		<li class="ne_inbox_msg xxl-16 xl-16 s-16 xs-16 m-16 l-16 msg_row_li_<?php echo $data_message_val['id']; ?> <?php echo $read_status_msg; ?>">
                                	<div class="row">
                                    	<div class="col-md-1">
                                        	<div class="checkbox checkbox-success margin-left-10" style="margin-top:0px">
                                                <input type="checkbox" name="checkbox_val[]" id="checkbox-<?php echo $data_message_val['id']; ?>" value="<?php echo $data_message_val['id']; ?>" class="styled checkbox_val chk_comm" onclick="check_uncheck(this.id)"/>
                                                <label for="checkbox-<?php echo $data_message_val['id']; ?>" class="control-label"></label>
                                                <input type="hidden" id="msg_enc_id_<?php echo $data_message_val['id']; ?>" value="<?php echo $enc_msg_id; ?>" />
                                            </div>
                                        </div>
                                        <?php
											if($message_type !='sent' && $message_type !='draft' && $message_type !='trash')
											{
												$imp_star = '';
												$important_status = $data_message_val['important_status'];
												if($important_status == 'No')
												{
													$imp_star = '-o';
												}
										?>
                                        <div class="col-md-1">
                                        	<a class="ne_inbox_msg_imp pull-left ne_mrg_ri8_5" onclick="importantfun('<?php echo $data_message_val['id']; ?>');">
                                                <i id="msg_imp_<?php echo $data_message_val['id']; ?>" class="fa fa-star<?php echo $imp_star; ?> ne_inbox_msg_imp_active" style="margin-left:5px;"></i>
                                            </a>
                                        </div>
                                        <?php
											}
										?>
                                        <div class="col-md-2" style="cursor:pointer" onClick="window.location='<?php echo $base_url.'message/'.$view_link.'/'.$enc_msg_id.'/'.$message_type; ?>'">
                                        	<?php echo ucfirst($this->common_model->display_data_na($data_message_val[$matri_id_clm])); ?>
                                        </div>
                                        <div class="col-md-<?php echo $col_sub; ?> " style="cursor:pointer" onClick="window.location='<?php echo $base_url.'message/'.$view_link.'/'.$enc_msg_id.'/'.$message_type; ?>'">
                                        	<?php //echo $this->common_model->display_data_na($data_message_val['subject']); ?>
											<?php $string = $this->common_model->display_data_na($data_message_val['content']); 
											echo $string = substr($string, 0, 10).'...';?>
											
                                        </div>
                                        <div class="col-md-4" style="cursor:pointer" onClick="window.location='<?php echo $base_url.'message/'.$view_link.'/'.$enc_msg_id.'/'.$message_type; ?>'">
                                        	<i class="fa fa-clock-o ne_mrg_ri8_5"></i><?php echo $this->common_model->displayDate($data_message_val['sent_on']); ?>
                                        	
                                        </div>
                                    </div>
		                        </li>
                        	<?php
								}
							?>
                        </ul>
                        <?php
						}
						else
						{
						?>
                        	<br/>
                            <div class="alert alert-danger">No Data available</div>
                        <?php
						}
						?>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id_temp" class="hash_tocken_id" />
                    <input type="hidden" name="mode" id="mode" value="<?php echo $message_type; ?>" />
                </form>
                <div>
                <div class="clearfix"></div>
                <?php
					if($total_count !='' && $total_count > 0)
					{
						echo $this->common_model->rander_pagination_front("message/inbox/$message_type",$total_count,10);
					}
				?>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="margin-top-30"></div>
</div>
<?php
	$this->common_model->js_extra_code_fr.="
		$(document).ready(function() {
			tooltip_fun();
		});
	
	function check_uncheck(id)
	{		
		var singlechecked= 'input[name=".'"'."'+$('#'+id).attr('name')+'".'"'."]';
		var checkall= 'input[name=".'"'."'+$('#all').attr('name')+'".'"'."]';
		
		var len = $('[name=".'"'."'+$('#'+id).attr('name')+'".'"'."]:checked').length;
		var single_len = $('[name=".'"'."'+$('#'+id).attr('name')+'".'"'."].checkbox_val').length;
		
		$(singlechecked).change(function()
		{
			if($(singlechecked).is(':checked'))
			{
				var checked = $(checkall).is(':checked');	
					
				if(checked == true && len!=single_len)
				{
					$(checkall).prop('checked',false);
				}
				if(checked == false && len==single_len)
				{
					$(checkall).prop('checked',true);
				}
			}
			else if($(singlechecked).is(':checked') == false && len!=single_len)
			{
				$(checkall).prop('checked',false);
			}
		});
	}";
?>