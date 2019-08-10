<?php 
$config_data = $this->common_model->get_site_config();
$service_tax_per = $config_data['service_tax'];
$tax_name = $config_data['tax_name'];

$event_array = array();
$event_array = $this->session->userdata('event_data_session');

$total_amount = $no_of_ticket *$event_data['ticket'];
if(isset($total_amount) && $total_amount !=''){
	$service_tax_amt = ($total_amount * $service_tax_per) / 100;
	$total_payment = $service_tax_amt + $total_amount;
	$event_array['total_amount'] = $total_payment;
}
$this->session->set_userdata('event_data_session',$event_array);

	/*echo"<pre>";
	print_r($event_data);
	echo"</pre>";
	echo $no_of_ticket;*/
?><!------------------<div class="container">----Start-------------------->
	<div class="container margin-top-20 padding-0-5-xs">
		<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-xs">
			<div class="">
				<img src="<?php echo $base_url; ?>assets/front_end/images/icon/advrt.jpg" class="full-width img-thumbnail" alt=""> 
			</div>
		</div>
		<div class="xxl-16 xl-16 m-16 l-16 xs-16 s-16 margin-top-10 padding-lr-zero-xs">
			<div class="">      
				<div class="xxl-12 xl-12 l-16 s-16 m-16 xs-16 margin-top-10px bg-border" style="padding:4px;">
					<div class="">
						<h3 class="upgrade-heading margin-top-0px font-18 text-white  text-center" style="padding:5px;">
							<img src="<?php echo $base_url; ?>assets/front_end/images/icon/yes-remark.png" alt="" class="margin-right-5" />
							<span class="ne_mrg_ri8_10">checkout</span>
						</h3>
							
						<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 font-size-14 margin-top-5px">
							<div class="col-sm-12">
								<div class="row">
									<h3 class="col-xs-12 border-1px-btm-lgt-grey">Order Details :</h3>
									<div class="col-sm-12 margin-top-20 table-responsive">
										<table class="manage-table text-left margin-top-10-xs">
											<thead>
												<th><i class="fa fa-file-text"></i> Event</th>
												<th><i class="fa fa-ticket"></i> Tickets</th>
												<th><i class="fa fa-money"></i> Unit Price</th>
												<th><i class="fa fa-money"></i> Total</th>
                                                <th><i class="fa fa-money"></i><?php echo $tax_name;?>(<?php echo $service_tax_per;?>%)</th>						
                                                <th><i class="fa fa-money"></i>Payment</th>
											</thead>
											<tbody>
												<tr>
													<td><?php echo $event_data['title']; ?>-</br><?php echo $event_data['event_date']; ?></td>
													<td><?php if(isset($no_of_ticket) && $no_of_ticket!=''){echo $no_of_ticket;}?></td>
													<td><?php echo $event_data['ticket_currency'].' '.$event_data['ticket'];?></td>
													<td><?php 
															
																$total = $no_of_ticket *$event_data['ticket'];
																 echo $event_data['ticket_currency'].' '.$total;
															?>
                                                           </td>
                                                     <td><?php  $service_tax_amt = ($total * $service_tax_per) / 100;
															 echo $event_data['ticket_currency'].' '.$service_tax_amt;?></td>
                                                     <td><?php $total_payment = $service_tax_amt + $total;
													 echo $event_data['ticket_currency'].' '.$total_payment;?></td>
												</tr>
                                               
											</tbody>
										</table>
									</div>
									<a href="<?php echo $base_url; ?>event/details" class="btn btn-danger col-sm-2"><i class="fa fa-chevron-left font-14 margin-right-5"></i> Back</a>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<hr>
						<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 font-size-14 margin-top-5px padding-0-5-xs">
							<form class="col-lg-12 col-xs-12 thumbnail" action="<?php echo $base_url; ?>event/pay_now" name="event_transaction_form" method="post" id="event_transaction_form">
								<div class="col-xs-12 checkout-border">
									<div class="row">
										<div class="col-xs-12 text-center">
											<h4 class="text-light-red bold">Confirmation Details</h4>
                                            <div class="text-danger" align="center">
													<label>Event Tickets information will be send to this email id</label>
											</div>
										</div>
										<div class="col-md-12 margin-top-20 padding-0-5-xs">
											<div class="col-lg-6">
												<div class="row">
													<div class="form-group col-xs-12">
														<div class="row">
															<div class="col-lg-4 margin-top-5 text-darkgrey">
																<label>Email Address:</label>
															</div>
															<div class="col-lg-7">
																<input type="email" required class="required form-control" name="confirm_email" value="">
															</div>
														</div>
													</div>
													<div class="form-group col-xs-12 margin-top-20">
														<div class="row">
															<div class="col-lg-4 margin-top-5 text-darkgrey">
																<label>How did you hear about us?:</label>
															</div>
															<div class="col-lg-7">
																<select class="required form-control" required name="user_how_hear">
																	<option value="">Please select...</option>
																	<option value="google">Google</option>
																	<option value="flyer">Flyer</option>
																	<option value="word of mouth">Word of Mouth</option>
																	<option value="search engine">Search Engine</option>
																	<option value="other">Other</option>
																</select>
															</div>
														</div>
													</div>
												</div>
											</div>
											
                                           	<div class="col-lg-6">
												<div class="row">
                                                	
													<div class="form-group col-xs-12">
														<div class="row">
															<div class="col-lg-4 margin-top-5 text-darkgrey">
																<label>Enter your Mobile:</label>
															</div>
															<div class="col-lg-8">
																<div style="width:50% !important;float:left">
                                                                    <select name="country_code" id="country_code" class="form-control select2">
                                                                        <?php echo $this->common_model->country_code_opt('+91');?>
                                                                    </select>
                                                                    </div>
                                                                    <input type="text" class="form-control" required name="confirm_mobile" id="confirm_mobile" minlength="8" maxlength="12" style="width:50%;float:left" />
															</div>
														</div>
													</div>
													<input type="hidden" name="three" value="">
												</div>
                                                
											</div>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<hr>
								<div class="col-xs-12">
                                   <input type="submit" class="pull-right text-white btn col-sm-2 col-sm-offset-5 col-xs-12 col-xs-offset-0" value="Continue">
								</div>
               <?php
			    $event_id = $event_data['event_id'];
				$event_date = $this->common_model->displayDate($event_data['event_date'],' jS F - Y');
				$event_title = $event_data['title'];
				$location = $event_data['location'];
				$unit_price = $event_data['ticket'];
				$no_of_tickets = $no_of_ticket;
				$ticket_currency = $event_data['ticket_currency'];
				$total_amount = $total_payment;			
            	$data_array = array('event_id'=> $event_id,'event_date'=>$event_date,'title'=>$event_title,'location'=>$location,'unit_price'=>$unit_price,'no_of_tickets'=>$no_of_tickets,'tax_name'=>$tax_name,'service_tax_per'=>$service_tax_per,'service_tax_amt'=>$service_tax_amt,'total_amount'=>$total_amount,'ticket_currency'=>$ticket_currency);
				
				$this->session->set_userdata('event_payment_session',$data_array);
			   ?>
                                 <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" />
							</form>
						</div>
					</div>
				</div>
				
				<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-5 margin-bottom-15px hidden-xs hidden-sm" style="padding:4px;">
					<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-999 margin-left-10" style="box-shadow: none;">
						<div class="row">
							<img src="<?php echo $base_url; ?>assets/front_end/images/icon/bg-blue.gif" alt="" class="text-center img-responsive" style="position:absolute;border:1px solid #ddd;border-radius:3px;padding:4px;background:#fff;"/>
							<ul class="upgrade_benfits margin-top-30" style="position:relative;padding:5px;">
								<li>Send Emails directly</li>
								<li>Connect instantly via Shaadi Chat</li>
								<li>Initiate Calls / Send SMS</li>
								<li>Access detailed Profiles</li>
								<li>Get Noticed by more Members</li>
								<li>Send Emails directly</li>
								<li>Connect instantly via Shaadi Chat</li>
								<li>Initiate Calls / Send SMS</li>
								<li>Access detailed Profiles</li>
								<li>Get Noticed by more Members</li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-5 margin-bottom-15px margin-top-30px hidden-sm hidden-xs" style="padding:4px;">
					<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-999 margin-top-20px" style="box-shadow: none;">
						<!--<div class="row" style="padding:0px;">
							<a href="#" target="_blank">
								<img src="<?php //echo $base_url; ?>assets/front_end/images/icon/app-promo.jpg" class="bg-border text-center img-responsive" alt="">
							</a>
						</div>-->
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
<!------------------<div class="container">----End-------------------->
	<div class="margin-top-30"></div>
<?php
		$this->common_model->js_extra_code_fr.="
		if($('#event_transaction_form').length > 0)
		{
			$('#event_transaction_form').validate({
				rules: {
					confirm_mobile: {
					  required: true,
					  number: true
					},
				 },	
				submitHandler: function(form)
				{
					return true;
				}
			});
		} ";?>