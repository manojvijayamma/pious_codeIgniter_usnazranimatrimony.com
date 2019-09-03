<?php
//$paid_status = $this->common_front_model->get_session_data('plan_status'); 
$paid_member_id = $this->common_front_model->get_session_data('id'); 
$where = array('id'=>$paid_member_id);
$pdata = $this->common_model->get_count_data_manual("register",$where,1,'plan_status','','',1);
$paid_status = $pdata['plan_status'];



$matri_id=$this->session->userdata('matri_id');


$sql="select count(*) as total from register_view join 
expressinterest on 
	expressinterest.receiver = register_view.matri_id where 
	expressinterest.sender='".$matri_id."' and expressinterest.trash_sender='No'";
$all_sent_q= $this->db->query($sql)->row();
$all_sent=$all_sent_q->total;



$sql="select count(*) as total from register_view join 
expressinterest on 
	expressinterest.receiver = register_view.matri_id where 
	expressinterest.sender='".$matri_id."' and expressinterest.trash_sender='No' AND
	expressinterest.receiver_response='Accepted'";
$accept_sent_q= $this->db->query($sql)->row();
$accept_sent=$accept_sent_q->total;



$sql="select count(*) as total from register_view join 
expressinterest on 
	expressinterest.receiver = register_view.matri_id where 
	expressinterest.sender='".$matri_id."' and expressinterest.trash_sender='No' AND
	expressinterest.receiver_response='Rejected'";
$reject_sent_q= $this->db->query($sql)->row();
$reject_sent=$reject_sent_q->total;



$sql="select count(*) as total from register_view join 
expressinterest on 
	expressinterest.receiver = register_view.matri_id where 
	expressinterest.sender='".$matri_id."' and expressinterest.trash_sender='No' AND
	expressinterest.receiver_response='Pending'";
$pending_sent_q= $this->db->query($sql)->row();
$pending_sent=$pending_sent_q->total;



$sql="select count(*) as total from register_view join 
expressinterest on 
	expressinterest.sender = register_view.matri_id where 
	expressinterest.receiver='".$matri_id."' and expressinterest.trash_receiver='No' AND
	register_view.is_deleted='No'
	";
$all_receive_q= $this->db->query($sql)->row();
$all_receive=$all_receive_q->total;



$sql="select count(*) as total from register_view join 
expressinterest on 
	expressinterest.sender = register_view.matri_id where 
	expressinterest.receiver='".$matri_id."' and expressinterest.trash_receiver='No' AND
	register_view.is_deleted='No' AND expressinterest.receiver_response='Accepted'
	";
$accept_receive_q= $this->db->query($sql)->row();
$accept_receive=$accept_receive_q->total;



$sql="select count(*) as total from register_view join 
expressinterest on 
	expressinterest.sender = register_view.matri_id where 
	expressinterest.receiver='".$matri_id."' and expressinterest.trash_receiver='No' AND
	register_view.is_deleted='No' AND expressinterest.receiver_response='Rejected'
	";
$reject_receive_q= $this->db->query($sql)->row();
$reject_receive=$reject_receive_q->total;



$sql="select count(*) as total from register_view join 
expressinterest on 
	expressinterest.sender = register_view.matri_id where 
	expressinterest.receiver='".$matri_id."' and expressinterest.trash_receiver='No' AND
	register_view.is_deleted='No' AND expressinterest.receiver_response='Pending'
	";
$pending_receive_q= $this->db->query($sql)->row();
$pending_receive=$pending_receive_q->total;


?>
<style> .user { padding: 5px; margin-bottom: 5px; text-align: center; } </style>
<!------------------<div class="container">----Start------------------------------------------------->	
	<!---<div class="tp-dashboard-nav">
		<div class="container">
			<div class="row">
				<div class="col-md-12 dashboard-nav">
					<ul class="nav nav-pills nav-justified">
						<li><a href="<?php echo $base_url; ?>member-dashboard"><i class="fa fa-dashboard db-icon"></i>My Dashboard</a></li>
						<li class="active"><a href="<?php echo $base_url; ?>member-full-profile"><i class="fa fa-user db-icon"></i>My Profile</a></li>
						<li><a href="#"><i class="fa fa-heart db-icon"></i>My Wishlist </a></li>
						<li><a href="#"><i class="fa fa-list db-icon"></i>Mutual Match</a></li>
						<li class="hidden-xs"><a href="#"><i class="fa fa-calculator db-icon"></i>My Budget</a></li>
						<li class="hidden-xs"><a href="#"><i class="fa fa-users db-icon"></i>Guest List</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>-->
	<div class="clearfix"></div>	
	<div class="container margin-top-20 padding-0-xs">
		<!--<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-0-5-xs">
			<div class="">
				<img src="<?php //echo $base_url; ?>assets/front_end/images/icon/register-header-female.jpg" class=" full-width img-thumbnail" alt=""> 
			</div>
		</div>-->
        <input type="hidden" name="exp_status" id="exp_status" value="all_sent" />
       
		<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 padding-0-5-xs" id="scroll_to_main">
			<!--<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-5 ne_exp_tab margin-top-15 padding-lr-zero hidden-xs">-->
			<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-5 ne_exp_tab margin-top-15 padding-lr-zero">
           		<div class="row">
                	<ul class="nav nav-tabs" role="tablist" style="text-align:left;">
    					<li role="presentation" class="active xxl-16 xl-16 l-16 m-16 s-16 xs-16" onClick="get_express_intrest('all_sent')">
                        	<a href="#all_sent" aria-controls="all_sent" role="tab" data-toggle="tab" class="text-left xxl-16 xl-16 l-16 m-16 s-16 xs-16" id="exp-link-1">
                            	<div class="row">
									<div class="xxl-2 xl-2 l-2 m-2 s-2 xs-2">
                                    <i class="fa fa-paper-plane"></i>
										<!--<img src="<?php echo $base_url; ?>assets/front_end/images/icon/select-all.png" alt="" class="" />-->
									</div>
									<div class="xxl-14 xl-14 l-14 m-14 s-14 xs-14">
										 All Interest Sent 
										    <span class="ne_left_msg_badge">
												<span><?php echo $all_sent?></span>
											</span>
									</div>
								</div>
                            </a>
                        </li>
    					<li role="presentation" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16"  onClick="get_express_intrest('accept_sent')">
                        	<a href="#accept_sent" aria-controls="accept_sent" role="tab" data-toggle="tab" class="text-left border-top xxl-16 xl-16 l-16 m-16 s-16 xs-16" id="exp-link-2">
                            	<div class="row">
									<div class="xxl-2 xl-2 l-2 m-2 s-2 xs-2">
										<img src="<?php echo $base_url; ?>assets/front_end/images/icon/interest-sent-black.png" alt="" class="" />
									</div>
									<div class="xxl-14 xl-14 l-14 m-14 s-14 xs-14">
										Interest Sent Accepted 
											<span class="ne_left_msg_badge">
												<span><?php echo $accept_sent?></span>
											</span>
									</div>
								</div>
                            </a>
						</li>
						<li role="presentation" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16" onClick="get_express_intrest('reject_sent')">
						   <a href="#reject_sent" aria-controls="reject_sent" role="tab" data-toggle="tab" class="text-left border-top xxl-16 xl-16 l-16 m-16 s-16 xs-16" id="exp-link-3">
							  <div class="row">
									<div class="xxl-2 xl-2 l-2 m-2 s-2 xs-2">
										<img src="<?php echo $base_url; ?>assets/front_end/images/icon/rejected_1.png" alt="" class="" />
									</div>
									<div class="xxl-14 xl-14 l-14 m-14 s-14 xs-14">
										Interest Sent Rejected
										<span class="ne_left_msg_badge">
												<span><?php echo $reject_sent?></span>
											</span>
									</div>
								</div>
						   </a>
						</li>
						<li role="presentation" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16" onClick="get_express_intrest('pending_sent')">
							<a href="#pending_sent" aria-controls="pending_sent" role="tab" data-toggle="tab" class="text-left border-top xxl-16 xl-16 l-16 m-16 s-16 xs-16" id="exp-link-4">
								<div class="row">
									<div class="xxl-2 xl-2 l-2 m-2 s-2 xs-2">
										<img src="<?php echo $base_url; ?>assets/front_end/images/icon/user-pending-black.png" alt="" class="" />
									</div>
									<div class="xxl-14 xl-14 l-14 m-14 s-14 xs-14">
										Interest Sent Pending
										<span class="ne_left_msg_badge">
												<span><?php echo $pending_sent?></span>
											</span>
									</div>
								</div>
							</a>
						</li>
                        <li role="presentation" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16" onClick="get_express_intrest('all_receive')">
                        	<a href="#all_receive" aria-controls="all_receive" role="tab" data-toggle="tab" class="text-left border-top xxl-16 xl-16 l-16 m-16 s-16 xs-16" id="exp-link-8">
                            	<div class="row">
									<div class="xxl-2 xl-2 l-2 m-2 s-2 xs-2">
                                    <i class="fa fa-inbox"></i>
										<!--<img src="<?php echo $base_url; ?>assets/front_end/images/icon/select-all.png" alt="" class="" />-->
									</div>
									<div class="xxl-14 xl-14 l-14 m-14 s-14 xs-14">
											All Interest Received
										 
											<span class="ne_left_msg_badge">
												<span><?php echo $all_receive?></span>
											</span>
										


									</div>
								</div>
                            </a>
                        </li>
						<li role="presentation" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16" onClick="get_express_intrest('accept_receive')">
							<a href="#accept_receive" aria-controls="accept_receive" role="tab" data-toggle="tab" class="text-left border-top xxl-16 xl-16 l-16 m-16 s-16 xs-16" id="exp-link-5">
								<div class="row">
									<div class="xxl-2 xl-2 l-2 m-2 s-2 xs-2">
										<img src="<?php echo $base_url; ?>assets/front_end/images/icon/interest-sent-black.png" alt="" class="" />
									</div>
									<div class="xxl-14 xl-14 l-14 m-14 s-14 xs-14">
										Interest Received Accepted
										<span class="ne_left_msg_badge">
												<span><?php echo $accept_receive?></span>
											</span>
									</div>
								</div>
							</a>
						</li>
						<li role="presentation" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16" onClick="get_express_intrest('reject_receive')">
							<a href="#reject_receive" aria-controls="reject_receive" role="tab" data-toggle="tab" class="text-left border-top xxl-16 xl-16 l-16 m-16 s-16 xs-16" id="exp-link-6">
								<div class="row">
									<div class="xxl-2 xl-2 l-2 m-2 s-2 xs-2">
										<img src="<?php echo $base_url; ?>assets/front_end/images/icon/rejected_1.png" alt="" class="" />
									</div>
									<div class="xxl-14 xl-14 l-14 m-14 s-14 xs-14">
										Interest Received Rejected
										<span class="ne_left_msg_badge">
												<span><?php echo $reject_receive?></span>
											</span>
									</div>
								</div>
							</a>
						</li>
						<li role="presentation" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16" onClick="get_express_intrest('pending_receive')">
							<a href="#pending_receive" aria-controls="pending_receive" role="tab" data-toggle="tab" class="text-left border-top xxl-16 xl-16 l-16 m-16 s-16 xs-16" id="exp-link-7">
								<div class="row">
									<div class="xxl-2 xl-2 l-2 m-2 s-2 xs-2">
										<img src="<?php echo $base_url; ?>assets/front_end/images/icon/user-pending-black.png" alt="" class="" />
									</div>
									<div class="xxl-14 xl-14 l-14 m-14 s-14 xs-14">
										Interest Received Pending
										<span class="ne_left_msg_badge">
												<span><?php echo $pending_receive?></span>
											</span>
									</div>
								</div>
							</a>
						</li>
					</ul>
           		</div>
           </div>
		   
           <div class="xxl-12 xl-12 xs-16 m-16 s-16 l-11 margin-top-5">
           		<div class="row">
                	<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-320 padding-lr-zero-768 ne_exp_tab_content padding-20-5-xs">
                    	<div role="tabpanel">
						   <div class="tab-content xxl-16 xl-16 m-16 l-16 s-16 xs-16 padding-lr-zero" style="background:none;border-radius:0px;padding:0px;">
                             <div role="tabpanel" class="tab-pane fade active" id="all_sent">
                              <div class="xxl-16 xl-16 m-16 l-16 s-16 xs-16 ne_exp_sub_tab bg-border" style="padding-top:0px;">
                                    <div class="row">
                                    <div class="nav ne_exp_interest_sended xxl-16 xl-16 m-16 l-16 s-16 xs-16 padding-lr-zero margin-top-0px">
                                            <div class="bg-light-blue text-center padding-5px">
                                                   <h3 class="text-white"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/interest-sent.png" alt="" class="margin-right-5" />All Interest Sent</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="" id="all_sent_response">
                                        <?php include_once('express_interest_result_ajax.php'); ?>
                                    </div>
								</div>
                              </div>                              
                              <div role="tabpanel" class="tab-pane fade" id="accept_sent">
                                	<div class="xxl-16 xl-16 m-16 l-16 s-16 xs-16 ne_exp_sub_tab bg-border" style="padding-top:0px;">
                                    <div class="row">
                                    	<div class="nav ne_exp_interest_sended xxl-16 xl-16 m-16 l-16 s-16 xs-16 padding-lr-zero margin-top-0px">
                                            <div class="bg-light-blue text-center padding-5px">
                                                   <h3 class="text-white"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/interest-sent.png" alt="" class="margin-right-5" />Interest Sent Accepted</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="" id="accept_sent_response">
                                    	<br/><br/>
                                    	Loading, Please wait...
                                        <?php //include_once('express_interest_result_ajax.php'); ?>
                                    </div>
									</div>
                                </div>
  								<div role="tabpanel" class="tab-pane fade" id="reject_sent">
                                	<div class="xxl-16 xl-16 m-16 l-16 s-16 xs-16 ne_exp_sub_tab bg-border" style="padding-top:0px;">
										<div class="row">
                                        	<div class="nav ne_exp_interest_sended xxl-16 xl-16 m-16 l-16 s-16 xs-16 padding-lr-zero margin-top-0px">
												<div class="bg-light-blue text-center padding-5px">
													   <h3 class="text-white"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/interest-reject.png" alt="" class="margin-right-5" /> Interest Sent Rejected</h3>
												</div>
											</div>
                                        </div>
                                        <div class="" id="reject_sent_response">
                                        	<br/><br/>
                                        	Loading, Please wait...
    	                                    <?php //include_once('express_interest_result_ajax.php'); ?>
	                                    </div>
									</div>
                                </div>
								
  								<div role="tabpanel" class="tab-pane fade" id="pending_sent">
                                	<div class="xxl-16 xl-16 m-16 l-16 s-16 xs-16 ne_exp_sub_tab bg-border" style="padding-top:0px;">
										<div class="row">
											<div class="nav ne_exp_interest_sended xxl-16 xl-16 m-16 l-16 s-16 xs-16 padding-lr-zero margin-top-0px">
												<div class="bg-light-blue text-center padding-5px">
													   <h3 class="text-white"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/user-pending.png" alt="" class="margin-right-5" /> Interest Sent Pending</h3>
												</div>
											</div>
                                          </div>
                                           <div class="" id="pending_sent_response">
                                           		<br/><br/>
		                                    	Loading, Please wait...
												<?php //include_once('express_interest_result_ajax.php'); ?>
                                           </div>                                           
									</div>
                                </div>
								<div role="tabpanel" class="tab-pane fade" id="all_receive">
                              		<div class="xxl-16 xl-16 m-16 l-16 s-16 xs-16 ne_exp_sub_tab bg-border" style="padding-top:0px;">
                                    <div class="row">
                                    	<div class="nav ne_exp_interest_sended xxl-16 xl-16 m-16 l-16 s-16 xs-16 padding-lr-zero margin-top-0px">
                                            <div class="bg-light-blue text-center padding-5px">
                                                   <h3 class="text-white"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/interest-sent.png" alt="" class="margin-right-5" />All Interest Received</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="" id="all_receive_response">
                                    	<br/><br/>
                                    	Loading, Please wait...
                                        <?php //include_once('express_interest_result_ajax.php'); ?>
                                    </div>
								</div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="accept_receive">
                                	<div class="xxl-16 xl-16 m-16 l-16 s-16 xs-16 ne_exp_sub_tab bg-border" style="padding-top:0px;">
										<div class="row">
											<div class="nav ne_exp_interest_sended xxl-16 xl-16 m-16 l-16 s-16 xs-16 padding-lr-zero margin-top-0px">
												<div class="bg-light-blue text-center padding-5px">
													   <h3 class="text-white"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/yes-remark.png" alt="" class="margin-right-5" /> Interest Received Accepted</h3>
												</div>
											</div>                                            
                                          </div>
                                          <div class="" id="accept_receive_response">
                                            	<br/><br/>
		                                    	Loading, Please wait...
												<?php //include_once('express_interest_result_ajax.php'); ?>
                                          </div>
									</div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="reject_receive">
                                	<div class="xxl-16 xl-16 m-16 l-16 s-16 xs-16 ne_exp_sub_tab bg-border" style="padding-top:0px;">
										<div class="row">
											<div class="nav ne_exp_interest_sended xxl-16 xl-16 m-16 l-16 s-16 xs-16 padding-lr-zero margin-top-0px">
												<div class="bg-light-blue text-center padding-5px">
													<h3 class="text-white"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/interest-reject.png" alt="" class="margin-right-5" />Interest Received Rejected</h3>
												</div>
											</div>
                                        </div>
                                        <div class="" id="reject_receive_response">
                                            	<br/><br/>
		                                    	Loading, Please wait...
												<?php //include_once('express_interest_result_ajax.php'); ?>
                                            
                                          </div>
									</div>
                                </div>
								
                                <div role="tabpanel" class="tab-pane fade" id="pending_receive">
                                	<div class="xxl-16 xl-16 m-16 l-16 s-16 xs-16 ne_exp_sub_tab bg-border" style="padding-top:0px;">
										<div class="row">
											<div class="nav ne_exp_interest_sended xxl-16 xl-16 m-16 l-16 s-16 xs-16 padding-lr-zero margin-top-0px">
												<div class="bg-light-blue text-center padding-5px">
													<h3 class="text-white"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/user-pending.png" alt="" class="margin-right-5" />Interest Received Pending</h3>
												</div>
											</div>
                                          </div>
                                          <div class="" id="pending_receive_response">
                                          		<br/><br/>
		                                    	Loading, Please wait...
												<?php //include_once('express_interest_result_ajax.php'); ?>
                                          </div>
									</div>
                                </div>
						   </div>
						</div>
                    </div>
                </div>
			</div>
			<div id="myModal_sms" class="modal fade" role="dialog" >
				<div class="modal-dialog">
                    <div class="modal-content">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<?php
							if(isset($paid_status) && $paid_status =='Paid')
							{
								?>
								<div class="modal-header">
									<h4 class="modal-title"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/message.png" class="margin-right-5" alt="">Send Sms</h4>
								</div>
								<div class="modal-body">
									<div id="response_message"></div>
									<form class="form-group">
										<input type="hidden" id="message_id" name="message_id" value="" />
										<input type="hidden" id="subject" name="subject" value="Express Interest" />
										<textarea placeholder="Type here your Message" id="message" name="message" class="form-control input-border-modal" rows="6" style="padding:5px" ></textarea>
										<div class="clearfix"></div>
									</form>
								</div>
								<div class="modal-footer">
									<a class="btn btn-sm" onClick="return send_message()"><i class="fa fa-send"></i> Send</a>
									<a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</a>
								</div>
								<?php		
							}
							else
							{
								?>
								<div class="modal-header">
									<h4 style="color:red" class="modal-title"> Upgrade Your Membership</h4>
								</div>
								<div class="modal-body">
									<h6 style="color:red" class="font-13">Please get the send message balance by upgrading your membership.</h6>
								</div>
								<div class="modal-footer">
									<a class="btn btn-sm" href="<?php echo $base_url.'premium-member'; ?>"><i class="fa fa-send"></i> Upgrade Now</a>
								</div>
								<?php
							}
						?>
						</div>
					</div>
                    
				</div>
			</div>
            
            <div id="myModal_deleted" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
                        	<h4 style="color:red" class="modal-title"> Member Not Exists</h4>
					  	</div>
						<div class="modal-body" class="font-13">
                        	<div><strong>This member does not exists.</strong></div>
                        </div>
					</div>
				</div>
			</div>
            
			<div id="myModal_reject" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/alert.png" alt="" class="" /> Delete This Saved Profile</h4>
						</div>
						<div class="modal-body">
							<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16">
								<div class="alert alert-danger" style="overflow:hidden;box-shadow:4px 4px 0 0 #ccc;">
									<div class="xxl-2 xl-2 l-2 m-16 xs-16 s-16">
										<img src="<?php echo $base_url; ?>assets/front_end/images/icon/user-detele.png" alt="" class="margin-right-10 margin-top-10" />
									</div>
									<div class="xxl-13 xl-13 l-13 m-16 xs-16 s-16 xxl-margin-left-1 xl-margin-left-1 margin-top-10">
										<strong>Are you sure want to Reject this Records?</strong><br />
										<span class="small">This Records will be Rejected Permanently from your Entire Records.</span>
									</div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="modal-footer margin-top-10">
							<a class="btn btn-sm btn-success"><i class="fa fa-check"></i> Yes</a>
							<a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> No</a>
						</div>
					</div>
				</div>
			</div>
			<div id="myModal_accept" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/user-simple.png" alt="" class="margin-right-5" /> Accept Request</h4>
						</div>
						<div class="modal-body">
							<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16">
								<div class="alert alert-success" style="overflow:hidden;box-shadow:4px 4px 0 0 #ccc;">
									<div class="xxl-2 xl-2 l-2 m-16 xs-16 s-16">
										<img src="<?php echo $base_url; ?>assets/front_end/images/icon/user-big.png" alt="" class="margin-right-10" />
									</div>
									<div class="xxl-13 xl-13 l-13 m-16 xs-16 s-16 xxl-margin-left-1 xl-margin-left-1 margin-top-10">
										<strong class="text-white">Do you want to Accept This Request</strong><br />
										<span class="small text-white">This Profile will be Visible you Permanently.</span>
									</div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="modal-footer margin-top-10">
							<a class="btn btn-sm btn-success"><i class="fa fa-check"></i> Accept</a>
							<a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> No</a>
						</div>
					</div>
				</div>
			</div>

			
			<div id="myModal_delete" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
                        	<input type="hidden" id="delete_ex_id" name="delete_ex_id" value="" />
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/alert.png" alt="" class="" /> Delete Express Interest</h4>
						</div>
						<div class="modal-body">
							<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16">
								<div class="alert alert-danger" style="overflow:hidden;box-shadow:4px 4px 0 0 #ccc;">
									<div class="xxl-2 xl-2 l-2 m-16 xs-16 s-16">
										<img src="<?php echo $base_url; ?>assets/front_end/images/icon/delete.png" alt="" class="margin-right-10 margin-top-10" />
									</div>
									<div class="xxl-13 xl-13 l-13 m-16 xs-16 s-16 xxl-margin-left-1 xl-margin-left-1 margin-top-10">
										<strong>Are you sure want to Delete this Express Interest?</strong><br />
										<span class="small">This Records will be Deleted Permanently from your Entire Records.</span>
									</div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="modal-footer margin-top-10">
							<a class="btn btn-sm btn-success" onClick="change_status('delete')"><i class="fa fa-check"></i> Yes</a>
							<a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> No</a>
						</div>
					</div>
				</div>
			</div>
            
        </div>
	</div>
	<div class="clearfix"></div>
<!------------------<div class="container">----End------------------------------>	
<div id="myModal_new" class="modal_new">
    <span class="close cursor padding-right-10" onclick="closeModal()" style="position:relative;color:#fff !important;opacity:2 !important;">&times;</span>
    <div class="modal-content_new margin-bottom-20px">
	    <div id="slider"></div>
	</div>
	<div class="clearfix"></div>
	<center style="margin-bottom:20px !important;">
		<span class="prev_p" onclick="plusSlides(-1)">&#10094;</span>
		<span class="next_n" onclick="plusSlides(1)">&#10095;</span>
	</center>
</div>
<div class="clearfix"></div>

<div class="margin-top-30"></div>
<?php
	$this->common_model->js_extra_code_fr.="
	$(document).ready(function () {
		setTimeout(function(){
			$('#remove_message1').hide();
			$('#remove_message2').hide();
		}, 5000);
		$('#test').BootSideMenu({
			side: 'left',
			pushBody:false,
			width: '250px'
		});
	});
	load_pagination_code_front_end();
	function delete_particulare(id)
	{
		$('#delete_ex_id').val(id);
	}
	function message_particulare(id)
	{
		$('#response_message').slideUp();
		$('#response_message').html('');
		$('#myModal_sms #message').val('');
		$('#response_message').removeClass('alert alert-danger alert-success');
		$('#message_id').val(id);
	}
";
?><?php //include_once('photo_protect.php'); ?>
<div class="clearfix"></div>