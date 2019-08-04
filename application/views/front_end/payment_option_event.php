<?php 
/*	echo"<pre>";
	print_r($event_data);
	exit;*/
	
	$email = '';
	$mobile = '';
	$username = '';
	
	if(isset($event_data) && $event_data != ''){
		$plan = $event_data['event_id'];
		$plan_name = $event_data['title'];
		$plan_amount = $event_data['total_amount'];
		$plan_amount_type = $event_data['ticket_currency'];
		
		$username = $event_data['confirm_email'];
		$email = $event_data['confirm_email'];
		$mobile = $event_data['confirm_mobile'];
	}
	
	$ccavenue = $this->common_model->get_count_data_manual('payment_method'," name = 'CCAvenue' ",1,'*','','','',"");
	$paypal = $this->common_model->get_count_data_manual('payment_method'," name = 'Paypal' ",1,'*','','','',"");
	$payumoney = $this->common_model->get_count_data_manual('payment_method'," name = 'PayUmoney' ",1,'*','','','',"");
	$payubizz = $this->common_model->get_count_data_manual('payment_method'," name = 'Paybizz' ",1,'*','','','',"");
	$BankDetails = $this->common_model->get_count_data_manual('payment_method'," name = 'BankDetails' ",1,'*','','','',"");
	
	$cancel_return = $base_url.'event/payment-status/fail';
	
?>

<!------------------<div class="container">----Start------------------------------------>
	
	<div class="tp-page-head hidden-sm hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="page-header text-center">
                        <div class="icon-circle">
                            <i class="icon icon-size-60 icon-lock icon-white"></i>
                        </div>
                        <h1> Payment Options</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <br> 
	<div class="container padding-lr-zero-xs">
		<div class="new_reg">
			<header class="header_bg">
				<div class="card-type">
					<?php 
						$i=1;
						$path_payment_logo = $this->common_model->path_payment_logo;
						foreach($payment_methods as $row_method)
						{
							if(isset($row_method['logo']) && $row_method['logo'] !='' && file_exists($path_payment_logo.$row_method['logo']))
							{
								$payment_logo = $base_url.$path_payment_logo.$row_method['logo'];
							}
							else
							{
								$payment_logo = '';
							}
							
							if($i == 1){
								$active = 'active';
							}else{
								$active = '';
							}
					?>
						<li style="width:12% !important;" class="card <?php echo $active;?>">
                            <a style="color:#F7FFC1 !important;"  href="#<?php echo $row_method['name'];?>" data-toggle="tab" onclick="payment_option();">
							<?php 
								if(isset($payment_logo) && $payment_logo!= '')
								{ 
							?>
									<img src="<?php echo $payment_logo;?>" style="height:40px;width:70px;">
							<?php
								}else{ 
									echo $row_method['name'];
								}
							?>
							</a>
                        </li>
					<?php 
						$i++;
						}
					?>
				</div>
			</header> 
			
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="Paypal">
					<div class="clearfix"></div>
					<div class="col-sm-12">
						<div class="col-sm-6">
							<div class="col-sm-12">
								<div class="col-xs-6"><h3>Event Name<h3></div>
								<div class="col-xs-6 input-group"> : <?php echo $plan_name;?>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="col-xs-6"><h3>Event Amount<h3></div>
								<div class="col-xs-6 input-group"> : <?php echo $plan_amount_type.' '.$plan_amount;?>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="col-sm-12 text-right">
								<form action="https://www.paypal.com/cgi-bin/webscr" name="frmPayPal1" id="frmPayPal1" method="post" class="" onSubmit="return payment_paypal();">
									<input type="hidden" name="business" value="<?php echo $paypal['email_merchant_id']; ?>">
									<input type="hidden" name="cmd" value="_xclick">
									<input type="hidden" name="item_name" value="Membership Plan <?php echo $plan_amount;?> Purchase">
									<input type="hidden" name="item_number" value="1">
									<input type="hidden" name="credits" value="510">
									<input type="hidden" name="userid" value="1">
									<input type="hidden" name="amount" value="<?php echo $plan_amount;?>">
									<input type="hidden" name="no_shipping" value="1">
									<input type="hidden" name="currency_code" value="USD">
									<input type="hidden" name="handling" value="0">
									<input type="hidden" name="cancel_return" class="cancel_URL" value="<?php echo $cancel_return;?>" />
                                    <input type="hidden" name="return" class="success_URL" value="<?php echo $base_url.'event/payment-status/Paypal';?>" />
									
									<button type="submit">
										<img src="<?php echo $base_url;?>assets/images/paypal-pay-now.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" style="height: 50px; width: 220px;"/>
									</button>
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" />
								</form>
							</div>
						</div>
					</div>
					<br/>
				</div>
				<div role="tabpanel" class="tab-pane" id="Paybizz">	
					<div class="clearfix"></div>
					<div class="col-sm-12">
						<div class="col-sm-6">
							<div class="col-sm-12">
								<div class="col-xs-6"><h3>Event Name<h3></div>
								<div class="col-xs-6 input-group"> : <?php echo $plan_name;?>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="col-xs-6"><h3>Event Amount<h3></div>
								<div class="col-xs-6 input-group"> : <?php echo $plan_amount_type.' '.$plan_amount;?>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="col-sm-12 text-right">
								<form action="<?php echo $base_url;?>event/payubizz" method="post" name="frmPayUbizz" id="frmPayUbizz" onSubmit="return payment_payubizz();">
									<input type="hidden" name="business" value="<?php echo $payubizz['email_merchant_id'];?>">
									<input type="hidden" name="cmd" value="_xclick">
									<input type="hidden" name="item_name" value="Membership Plan <?php echo $plan_name;?> Purchase">
									<input type="hidden" name="item_number" value="1">
									<input type="hidden" name="credits" value="510">
									<input type="hidden" name="userid" value="1">
									<input type="hidden" name="amount" value="<?php echo $plan_amount;?>">
									<input type="hidden" name="no_shipping" value="1">
									<input type="hidden" name="currency_code" value="INR">
									<input type="hidden" name="handling" value="0">
									
									<button type="submit">
										<img src="<?php echo $base_url;?>assets/images/payubizz.jpg" border="0" name="submit" alt="Paybizz - The safer, easier way to pay online!" style="height: 50px; width: 220px;"/>
									</button>
									
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" />
								</form>
							</div>
						</div>
					</div>
					<br/>
				</div>
				
				<div role="tabpanel" class="tab-pane" id="PayUmoney">
					<div class="clearfix"></div>
					<div class="col-sm-12">
						<div class="col-sm-6">
							<div class="col-sm-12">
								<div class="col-xs-6"><h3>Event Name<h3></div>
								<div class="col-xs-6 input-group"> : <?php echo $plan_name;?>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="col-xs-6"><h3>Event Amount<h3></div>
								<div class="col-xs-6 input-group"> : <?php echo $plan_amount_type.' '.$plan_amount;?>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="col-sm-12 text-right">
								<form action="<?php echo $base_url;?>event/payumoney" method="post" name="frmPayPal1">
									
									<input type="hidden" name="plan_name" value="<?php echo $plan_name;?>">
                                    <input type="hidden" name="plan_amount" value="<?php echo $plan_amount;?>">
                                    <input type="hidden" name="plan_id" value="<?php echo $plan;?>">
                                    <input type="hidden" name="plan_amount_type" value="INR">
									<input type="hidden" name="service_provider" value="payu_paisa" size="64" >
									<input type="hidden" name="productinfo" value="<?php echo $plan_name;?>">
									
                                    <button type="submit">
										<img src="<?php echo $base_url;?>assets/images/payumoney.png" border="0" name="submit" alt="PayUmoney - The safer, easier way to pay online!"  style="height: 50px; width: 220px;"/>
									</button>
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" />
								</form>
							</div>
						</div>
					</div>
					<br/>
				</div>
				
				<div role="tabpanel" class="tab-pane" id="CCAvenue">
					<div class="clearfix"></div>
					<div class="col-sm-12">
						<div class="col-sm-6">
							<div class="col-sm-12">
								<div class="col-xs-6"><h3>Event Name<h3></div>
								<div class="col-xs-6 input-group"> : <?php echo $plan_name;?>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="col-xs-6"><h3>Event Amount<h3></div>
								<div class="col-xs-6 input-group"> : <?php echo $plan_amount_type.' '.$plan_amount;?>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="col-sm-12 text-right">
								<form method="post" name="customerData1" id="customerData1" action="<?php echo $base_url;?>event/ccav-request-handler" enctype="multipart/form-data" onSubmit="return payment_ccavenue();">
									<input type="hidden" name="merchant_id" value="<?php echo $ccavenue['email_merchant_id']; ?>"/>
									<input type="hidden" name="order_id" value="<?php echo $plan;?>"/>
									<input type="hidden" name="currency" value="INR"/>
									<input type="hidden" name="redirect_url" value="<?php echo $base_url.'event/payment-status/CCAvenue';?>"/>
									<input type="hidden" name="cancel_url" value="<?php echo $cancel_return;?>"/>
									<input type="hidden" name="language" value="EN"/>
									<input type="hidden" name="billing_name" value="<?php echo $username;?>"/>
									<input type="hidden" name="billing_address" value=""/>
									<input type="hidden" name="billing_state" value="<?php echo '';?>"/>
									<input type="hidden" name="billing_zip" value="<?php echo '';?>"/>
									<input type="hidden" name="billing_country" value="<?php echo '';?>"/>
									<input type="hidden" name="billing_tel" value="<?php echo $mobile;?>"/>
									<input type="hidden" name="billing_email" value="<?php echo $email;?>"/>
									<input type="hidden" name="udf1" value="<?php echo $plan_name;?>"/>
									<input type="hidden" name="udf2" value="<?php echo $plan;?>"/>
									<button type="submit">
										<img src="<?php echo $base_url;?>assets/images/ccavenue.png" border="0" name="submit" alt="CCAvenue - The safer, easier way to pay online!"  style="height: 50px; width: 220px;"/>
									</button>
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" />
								</form>
							</div>
						</div>
					</div>
					<br/>
				</div>
				<div role="tabpanel" class="tab-pane" id="Instamojo">
					<div class="clearfix"></div>
					<div class="col-sm-12">
						<div class="col-sm-6">
							<div class="col-sm-12">
								<div class="col-xs-6"><h3>Event Name<h3></div>
								<div class="col-xs-6 input-group"> : <?php echo $plan_name;?>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="col-xs-6"><h3>Event Amount<h3></div>
								<div class="col-xs-6 input-group"> : <?php echo $plan_amount_type.' '.$plan_amount;?>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="col-sm-12 text-right">
								<a href="<?php echo $base_url.'event/instamojo';?>">
									<img src="<?php echo $base_url;?>assets/images/instamojo-logo.png" border="0" name="submit" alt="CCAvenue - The safer, easier way to pay online!"  style="height: 50px; width: 220px;"/>
								</a>
							</div>
						</div>
					</div>
					<br/>
				</div>
				<div role="tabpanel" class="tab-pane" id="BankDetails">
					<div class="col-sm-12">
						<div class="col-xs-2">
							<h3>Address : </h3>
						</div>
						<div class="col-xs-10">
							<?php echo nl2br($BankDetails['description']);?> 
						</div>
						<br>
					</div>
				</div>
				
			</div>
		</div>
	</div>		
<!------------------<div class="container">----End------------------------------------>
	<div class="margin-top-40"></div>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js?ver=1.0"></script>  
<?php
	$this->common_model->js_extra_code_fr.="
	$('.button-wrap').on('click', function(){
			$(this).toggleClass('button-active');
		});
	
	function payment_option(method_name){
		$('.card').removeClass('active');
		$(this).addClass('active');
	}
	
	function payment_payubizz(){
		$('#frmPayUbizz').submit();
	}
	function payment_paypal(){
		$('#frmPayPal1').submit();
	}
	function payment_ccavenue(){
		$('#customerData1').submit();
	}
	 ";
?>