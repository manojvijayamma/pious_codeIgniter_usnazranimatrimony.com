
<?php 
	//echo"<pre>";
	//print_r($plan_data);
	//print_r($payment_methods);
	
	$insert_id = $this->session->userdata('recent_reg_id');
	$current_login_user = $this->common_front_model->get_session_data();
	
	$selected_plan = $plan_data['plan_data_array'];
	if(isset($selected_plan) && $selected_plan != '' && is_array($selected_plan) && count($selected_plan) > 0)
	{
		$plan = $selected_plan['id'];
		$plan_name = $selected_plan['plan_name'];
		$plan_amount = $selected_plan['plan_amount'];
		$plan_amount_type = $selected_plan['plan_amount_type'];
		$plan_duration = $selected_plan['plan_duration'];
		$plan_contacts = $selected_plan['plan_contacts'];
		$profile = $selected_plan['profile'];
		$plan_msg = $selected_plan['plan_msg'];
	}
	
	$matri_id = $username = $address = $mobile = $email = '';
	$where_arra='';
	if(isset($insert_id) && $insert_id != ''){
		$where_arra=array('id'=>$insert_id);	
	}
	if(isset($current_login_user) && $current_login_user != ''){
		$where_arra=array('id'=>$current_login_user['id']);
	}

	if(isset($where_arra) && $where_arra!=''){
		$member_data = $this->common_model->get_count_data_manual('register',$where_arra,1,'id,matri_id,username,address,mobile,email');
		if(isset($member_data) && $member_data != ''){
			$matri_id = $member_data['matri_id'];
			$email = $member_data['email'];
			$username = $member_data['username'];
			$address = $member_data['address'];
			$mobile = '';
			// if($member_data['mobile'] !='')
			// {
			// 	$mo_arr = explode('-',$member_data['mobile']);
			// 	$mobile = $mo_arr[1];
			// }	
			if($member_data['mobile'] !='')
			{
				$mo_arr = explode('-',$member_data['mobile']);
				if(isset($mo_arr) && $mo_arr!='' && is_array($mo_arr) && count($mo_arr)>1)
				{
					$mobile = $mo_arr[1];
				}
				else
				{
					$mobile = $member_data['mobile'];
				}
			}	
		}
	}	
	$ccavenue = $this->common_model->get_count_data_manual('payment_method'," name = 'CCAvenue' ",1,'*','','','',"");
	$paypal = $this->common_model->get_count_data_manual('payment_method'," name = 'Paypal' ",1,'*','','','',"");
	$payumoney = $this->common_model->get_count_data_manual('payment_method'," name = 'PayUmoney' ",1,'*','','','',"");
	$payubizz = $this->common_model->get_count_data_manual('payment_method'," name = 'Paybizz' ",1,'*','','','',"");
	$BankDetails = $this->common_model->get_count_data_manual('payment_method'," name = 'BankDetails' ",1,'*','','','',"");
	$instamojo = $this->common_model->get_count_data_manual('payment_method'," name = 'Instamojo' ",1,'*','','','',"");
	
	$cancel_return = $base_url.'premium-member/payment-status/fail';
	
?>

<!-- ======= <div class="container"> Start =========== -->
	
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
    <div class="container padding-0-5-xs">
     <div class="row">
            <div class="board" style="height:auto !important;">
	<div class="board-inner">
                        <ul class="nav nav-tabs" id="myTab">
                            <!-- <div class="liner"></div> -->
                            <li class="payment-tabs ">
                                
                                <a href="#home" data-toggle="tooltip" title="" data-original-title="Select your plan">
                                    <span class="round-tabs one" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 #E52D31;">
                                        <i class="fa fa-check-square-o" aria-hidden="true"></i> 
                                    </span> 
                                </a></li>
                                
                                <li class="payment-tabs">
								<a href="#profile" data-toggle="tooltip" title="" data-original-title="View cart">
                                    <span class="round-tabs two">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        
                                    </span> 
                                </a>
                                </li>
                                <li class="payment-tabs active"><a href="#messages" data-toggle="tooltip" title="" data-original-title="Choose payment option">
                                    <span class="round-tabs three">
                                        <i class="fa fa-cc-visa" aria-hidden="true"></i>
                                    </span> </a>
                                </li>
                                
                                <li class="payment-tabs"><a href="#settings" data-toggle="tooltip" title="" data-original-title="Success payment">
                                    <span class="round-tabs four">
                                        <i class="fa fa-check-square" aria-hidden="true"></i>
                                    </span> 
                                </a></li>	
                        </ul>
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
						if(isset($payment_methods) && $payment_methods!='' && count($payment_methods)>0)
						{
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
									$actve_panel = $row_method['name'];
								}else{
									$active = '';
								}
						?>
							<li style="width:12% !important; <?php if(isset($row_method['name']) && $row_method['name']=='BankDetails'){echo 'padding-top: 10px;';}?>" class="card <?php echo $active;?>">
								<a style="color:#F7FFC1 !important;"  href="#<?php echo $row_method['name'];?>" data-toggle="tab" onclick="payment_option();">
								<?php 
									if(isset($payment_logo) && $payment_logo!= '')
									{ 
								?>
										<img src="<?php echo $payment_logo;?>" alt="Payment-logo" style="height:40px;width:70px;">
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
						}
					?>
				</div>
			</header> 
			
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane <?php if(isset($actve_panel) && $actve_panel =='Paypal'){ echo "active";}?>" id="Paypal">
					<div class="clearfix"></div>
					<div class="col-sm-12">
						<div class="col-sm-6">
							<div class="col-sm-12">
								<div class="col-xs-6"><h3>Plan</h3></div>
								<div class="col-xs-6 input-group"> : <?php echo $plan_name;?>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="col-xs-6"><h3>Plan Amount</h3></div>
								<div class="col-xs-6 input-group"> : <?php echo $plan_amount_type.' '.$plan_data['total_pay'];?>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="col-sm-12 text-right">
								<form action="https://www.paypal.com/cgi-bin/webscr" name="frmPayPal1" id="frmPayPal1" method="post" class="" onSubmit="return payment_paypal();">
									<input type="hidden" name="business" value="<?php echo $paypal['email_merchant_id']; ?>">
									<input type="hidden" name="cmd" value="_xclick">
									<input type="hidden" name="item_name" value="Membership Plan <?php echo $plan_data['total_pay'];?> Purchase">
									<input type="hidden" name="item_number" value="1">
									<input type="hidden" name="credits" value="510">
									<input type="hidden" name="userid" value="1">
									<input type="hidden" name="amount" value="<?php echo $plan_data['total_pay'];?>">
									<input type="hidden" name="no_shipping" value="1">
									<input type="hidden" name="currency_code" value="USD">
									<input type="hidden" name="handling" value="0">
									<input type="hidden" name="cancel_return" class="cancel_URL" value="<?php echo $cancel_return;?>" />
                                    <input type="hidden" name="return" class="success_URL" value="<?php echo $base_url.'premium-member/payment-status/Paypal';?>" />
									
									<button type="submit">
										<img src="<?php echo $base_url;?>assets/images/paypal-pay-now.png"  name="submit" alt="PayPal - The safer, easier way to pay online!" style="height: 50px; width: 220px;"/>
									</button>
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" />
								</form>
							</div>
						</div>
					</div>
					<br/>
				</div>
				<div role="tabpanel" class="tab-pane <?php if(isset($actve_panel) && $actve_panel =='Paybizz'){ echo "active";}?>" id="Paybizz">	
					<div class="clearfix"></div>
					<div class="col-sm-12">
						<div class="col-sm-6">
							<div class="col-sm-12">
								<div class="col-xs-6"><h3>Plan</h3></div>
								<div class="col-xs-6 input-group"> : <?php echo $plan_name;?>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="col-xs-6"><h3>Plan Amount</h3></div>
								<div class="col-xs-6 input-group"> : <?php echo $plan_amount_type.' '.$plan_data['total_pay'];?>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="col-sm-12 text-right">
								<form action="<?php echo $base_url;?>premium-member/payubizz" method="post" name="frmPayUbizz" id="frmPayUbizz" onSubmit="return payment_payubizz();">
									<input type="hidden" name="business" value="<?php echo $payubizz['email_merchant_id'];?>">
									<input type="hidden" name="cmd" value="_xclick">
									<input type="hidden" name="item_name" value="Membership Plan <?php echo $plan_name;?> Purchase">
									<input type="hidden" name="item_number" value="1">
									<input type="hidden" name="credits" value="510">
									<input type="hidden" name="userid" value="1">
									<input type="hidden" name="amount" value="<?php echo $plan_data['total_pay'];?>">
									<input type="hidden" name="no_shipping" value="1">
									<input type="hidden" name="currency_code" value="INR">
									<input type="hidden" name="handling" value="0">
									
									<button type="submit">
										<img src="<?php echo $base_url;?>assets/images/payubizz.jpg"  name="submit" alt="Paybizz - The safer, easier way to pay online!" style="height: 50px; width: 220px;"/>
									</button>
									
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" />
								</form>
							</div>
						</div>
					</div>
					<br/>
				</div>
				
				<div role="tabpanel" class="tab-pane <?php if(isset($actve_panel) && $actve_panel =='PayUmoney'){ echo "active";}?>" id="PayUmoney">
					<div class="clearfix"></div>
					<div class="col-sm-12">
						<div class="col-sm-6">
							<div class="col-sm-12">
								<div class="col-xs-6"><h3>Plan</h3></div>
								<div class="col-xs-6 input-group"> : <?php echo $plan_name;?>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="col-xs-6"><h3>Plan Amount</h3></div>
								<div class="col-xs-6 input-group"> : <?php echo $plan_amount_type.' '.$plan_data['total_pay'];?>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="col-sm-12 text-right">
								<form action="<?php echo $base_url;?>premium-member/payumoney" method="post" name="frmPayPal1">
									
									<input type="hidden" name="plan_name" value="<?php echo $plan_name;?>">
                                    <input type="hidden" name="plan_amount" value="<?php echo $plan_data['total_pay'];?>">
                                    <input type="hidden" name="plan_id" value="<?php echo $plan;?>">
                                    <input type="hidden" name="plan_amount_type" value="INR">
									<input type="hidden" name="service_provider" value="payu_paisa" size="64" >
									<input type="hidden" name="productinfo" value="<?php echo $plan_name;?>">
									
                                    <button type="submit">
										<img src="<?php echo $base_url;?>assets/images/payumoney.png"  name="submit" alt="PayUmoney - The safer, easier way to pay online!"  style="height: 50px; width: 220px;"/>
									</button>
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" />
								</form>
							</div>
						</div>
					</div>
					<br/>
				</div>
				
				<div role="tabpanel" class="tab-pane <?php if(isset($actve_panel) && $actve_panel =='CCAvenue'){ echo "active";}?>" id="CCAvenue">
					<div class="clearfix"></div>
					<div class="col-sm-12">
						<div class="col-sm-6">
							<div class="col-sm-12">
								<div class="col-xs-6"><h3>Plan</h3></div>
								<div class="col-xs-6 input-group"> : <?php echo $plan_name;?>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="col-xs-6"><h3>Plan Amount</h3></div>
								<div class="col-xs-6 input-group"> : <?php echo $plan_amount_type.' '.$plan_data['total_pay'];?>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="col-sm-12 text-right">
								<form method="post" name="customerData1" id="customerData1" action="<?php echo $base_url;?>premium-member/ccav-request-handler" enctype="multipart/form-data" onSubmit="return payment_ccavenue();">
									<input type="hidden" name="merchant_id" value="<?php echo $ccavenue['email_merchant_id']; ?>"/>
									<input type="hidden" name="order_id" value="<?php echo $matri_id.'-'.$plan;?>"/>
									<input type="hidden" name="currency" value="INR"/>
									<input type="hidden" name="redirect_url" value="<?php echo $base_url.'premium-member/payment-status/CCAvenue';?>"/>
									<input type="hidden" name="cancel_url" value="<?php echo $cancel_return;?>"/>
									<input type="hidden" name="language" value="EN"/>
									<input type="hidden" name="billing_name" value="<?php echo $username;?>"/>
									<input type="hidden" name="billing_address" value="<?php echo $address;?>"/>
									<input type="hidden" name="billing_state" value="<?php echo '';?>"/>
									<input type="hidden" name="billing_zip" value="<?php echo '';?>"/>
									<input type="hidden" name="billing_country" value="<?php echo '';?>"/>
									<input type="hidden" name="billing_tel" value="<?php echo $mobile;?>"/>
									<input type="hidden" name="billing_email" value="<?php echo $email;?>"/>
									<input type="hidden" name="udf1" value="<?php echo $plan_name;?>"/>
									<input type="hidden" name="udf2" value="<?php echo $plan;?>"/>
									<button type="submit">
										<img src="<?php echo $base_url;?>assets/images/ccavenue.png"  name="submit" alt="CCAvenue - The safer, easier way to pay online!"  style="height: 50px; width: 220px;"/>
									</button>
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" />
								</form>
							</div>
						</div>
					</div>
					<br/>
				</div>
				<div role="tabpanel" class="tab-pane <?php if(isset($actve_panel) && $actve_panel =='Instamojo'){ echo "active";}?>" id="Instamojo">
					<div class="clearfix"></div>
					<div class="col-sm-12">
						<div class="col-sm-6">
							<div class="col-sm-12">
								<div class="col-xs-6"><h3>Plan</h3></div>
								<div class="col-xs-6 input-group"> : <?php echo $plan_name;?>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="col-xs-6"><h3>Plan Amount</h3></div>
								<div class="col-xs-6 input-group"> : <?php echo $plan_amount_type.' '.$plan_data['total_pay'];?>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="col-sm-12 text-right">
								<a href="<?php echo $base_url.'premium-member/instamojo';?>">
									<img src="<?php echo $base_url;?>assets/images/instamojo-logo.png" name="submit" alt="CCAvenue - The safer, easier way to pay online!"  style="height: 50px; width: 220px;"/>
								</a>
							</div>
						</div>
					</div>
					<br/>
				</div>
				<div role="tabpanel" class="tab-pane <?php if(isset($actve_panel) && $actve_panel =='BankDetails'){ echo "active";}?>" id="BankDetails">
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
    </div>
		</div>
	</div>		
<!-- ========= <div class="container"> End ========== -->
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