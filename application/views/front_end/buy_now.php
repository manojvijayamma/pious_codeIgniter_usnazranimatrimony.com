
<div id="main_div">
<?php 
$plan_id = $plan_data['id'];
$display_detail ='No';
$plan_data_count = count($plan_data);
$config_data = $this->common_model->get_site_config();

if(isset($plan_data) && $plan_data !='' && $plan_data_count > 0)
{
	$display_detail ='Yes';
}
if(isset($plan_data['id']))
{
	$plan_id = $plan_data['id'];
}
if(isset($plan_data['plan_name']))
{
	$plan_name = $plan_data['plan_name'];
}
if(isset($plan_data['plan_amount_type']))
{
	$plan_amount_type = $plan_data['plan_amount_type'];
}
if(isset($plan_data['plan_amount']))
{
	$plan_amount = $plan_data['plan_amount'];
}

if(isset($display_detail) && $display_detail =='Yes')
	{
		$discount_amt = 0;
		$discount_display = 'No';
		$coupan_code = '';
		$coupan_data = $this->session->userdata('coupan_data_reddem');
		if(isset($coupan_data) && $coupan_data !='' && count($coupan_data) > 0)
		{
			$discount_display = 'Yes';
			if(isset($coupan_data['discount_amount']) && $coupan_data['discount_amount'] !='')
			{
				$discount_amt = $coupan_data['discount_amount'];
			}
			if(isset($coupan_data['coupan_code']) && $coupan_data['coupan_code'] !='')
			{
				$coupan_code = $coupan_data['coupan_code'];
			}
		}
		
		$service_tax = 0;
		$service_tax_amt = 0;
		$service_tax_per = '';
		$tax_name = '';
		
		if(isset($config_data['tax_applicable']) && $config_data['tax_applicable']== 'Yes')
		{
			$service_tax_per = $config_data['service_tax'];
			$tax_name = $config_data['tax_name'];
			
			if(isset($config_data['service_tax']) && $config_data['service_tax'] !='')
			{
				$service_tax =  $config_data['service_tax'];
			}
			if($plan_amount !='' && $plan_amount > 0 && $service_tax !='' && $service_tax > 0 )
			{
				$service_tax_amt = (($plan_amount - $discount_amt) * $service_tax) / 100;
			}
		}
		
		$total_pay = ($plan_amount - $discount_amt) + $service_tax_amt;
		
		$data_array = array('discount_amount'=>$discount_amt,'coupan_code'=>$coupan_code,'plan_id'=>$plan_id,'service_tax'=>$service_tax_amt,'plan_amount'=>$plan_amount,'total_pay'=>$total_pay,'plan_data_array'=>$plan_data);
		/*echo "<pre>";
		print_r($data_array);
		echo "</pre>";*/
		$this->session->set_userdata('plan_data_session',$data_array);
	}
?>
<!-- ======== <div class="container"> Start======== -->	
    <div class="tp-page-head">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="page-header text-center">
                        <div class="icon-circle">
                            <i class="icon icon-size-60 icon-lock icon-white"></i>
                        </div>
                        <h1>Plan Detail and Payment Overview</h1>
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
                                
                                <li class="payment-tabs active">
								<a href="#profile" data-toggle="tooltip" title="" data-original-title="View cart">
                                    <span class="round-tabs two">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        
                                    </span> 
                                </a>
                                </li>
                                <li class="payment-tabs"><a href="#messages" data-toggle="tooltip" title="" data-original-title="Choose payment option">
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
   <div class="sixteen columns">
        <div class="panel panel-success">
            <div class="panel-heading back-img"><span class="glyphicon glyphicon-credit-card" style="vertical-align:middle;"></span> Selected Plan - <strong><?php echo $plan_name;?></strong>               </div>
                <div class="panel-body th_bordercolor">
                    <div class="margin-top-10"></div>
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <div class="panel panel-default credit-card-box">
                                <div class="panel-heading display-table">
                                    <div class="row display-tr">
                                        <div class="col-md-6 col-xs-12" style="margin:0px;">
                                        <h3 class="panel-title display-td text-center">Payment Details</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form id="payment-form" method="POST" action="javascript:void(0);">
                                        <div class="row" style="margin-bottom: 0px;">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <div class="col-xs-6">Plan Amount </div>
                                                    <div class="col-xs-6 input-group"> : <?php echo $plan_amount_type.' '.$plan_amount;?>
                                                    </div>
                                                </div>
                                                 <?php
												if(isset($discount_display) && $discount_display !='' && $discount_display =='Yes')
												{
												?>    
                                                    <div class="form-group text-success">
                                                        <div class="col-xs-6  text-success">Discount Amount </div>
                                                        <div class="col-xs-6 input-group  text-success"> : <?php echo $plan_amount_type.' '.$discount_amt. ' ('.$coupan_code.')'; ?>
                                                        </div>
                                                    </div>
                                                    
                                                <?php 
												}
												if($service_tax_amt !='' && $service_tax_amt > 0)
												{
												?>
                                                
                                                <div class="form-group">
                                                    <div class="col-xs-6"><?php echo $tax_name;?>(<?php echo $service_tax_per;?>%)
                                                    </div>
                                                    <div class="col-xs-6 input-group"> : <?php echo $plan_amount_type.' '.$service_tax_amt;?></br>
												                                                     
                                                    </div>
                                                </div>
                                                <?php
												}
											   ?>
                                                <div class="form-group">
                                                    <div class="col-xs-6"><strong>Total Payable Amount</strong></div>
                                                    <div class="col-xs-6 input-group"><strong> : <?php echo $plan_amount_type.' '.$total_pay; ?></strong>                                                         </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
               	 <?php
						if(isset($discount_display) && $discount_display !='' && $discount_display =='No' && $total_pay > 0)
						{
				?>                             <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label>COUPON CODE <span>(if any)</span></label>
                                                    <input type="text" class="form-control" placeholder="Coupon Code" name="couponcode" id="couponcode" value="">
                                                    <span class="pull-right"><a onclick="return check_coupan_code()" class="text-success" href="javascript:;">Redeem Coupon</a></span>
                                                    <span id="err_couponcode" class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                        <?php } ?>
                                           <div class="row">
                                            <div class="col-xs-12">
                                             <button onClick="process_checkout()" class="subscribe btn btn-success btn-lg btn-block" type="button">Pay Now</button>
                                                <!--<a href="<?php echo $base_url; ?>premium-member/payment-option" class="subscribe btn btn-lg btn-block text-white" type="button" >Pay Now</a>-->
                                            </div>
                                        </div>
                                        <div class="row" style="display:none;">
                                            <div class="col-xs-12">
                                                <p class="payment-errors"></p>
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-8" style="font-size: 12pt; line-height: 2em;">                                <p class="lead">Plan Benefits </p>
                            <ul class="list-unstyled" style="line-height: 2">
                                                                   
                                 <?php
										$check_yes = '<span class="fa fa-check text-success"></span>';
										$check_no = '<span class="fa fa-times text-danger"></span>';
										$displ_yes_no_mess = '';
										$displ_yes_no_contact = '';
										$displ_yes_no_profile = '';
										if(isset($plan_data['plan_msg']) && $plan_data['plan_msg'] !='' && $plan_data['plan_msg'] > 0)
										{
											$displ_yes_no_mess = $check_yes;
										}
										else
										{
											$displ_yes_no_mess = $check_no;
										}
										if(isset($plan_data['plan_contacts']) && $plan_data['plan_contacts'] !='' && $plan_data['plan_contacts'] > 0)
										{
											$displ_yes_no_contact = $check_yes;
										}
										else
										{
											$displ_yes_no_contact = $check_no;
										}
										if(isset($plan_data['profile']) && $plan_data['profile'] !='' && $plan_data['profile'] > 0)
										{
											$displ_yes_no_profile = $check_yes;
										}
										else
										{
											$displ_yes_no_profile = $check_no;
										}
										if(isset($plan_data['chat']) && $plan_data['chat'] =='Yes')
										{ 
											$displ_yes_no_chat = $check_yes;
										}
										else
										{
											$displ_yes_no_chat = $check_no;
										}
										/*if(isset($plan_data['video']) && $plan_data['video'] =='Yes')
										{ 
											$displ_yes_no_video = $check_yes;
										}
										else
										{
											$displ_yes_no_video = $check_no;
										}*/
									?>
                              <li><?php echo $displ_yes_no_mess.' Allowed Message - '.$plan_data['plan_msg']; ?></li>
                              <li><?php echo $displ_yes_no_contact.' Allowed Contacts - '.$plan_data['plan_contacts']; ?></li>                              <li><?php echo $displ_yes_no_profile.' Allowed View Profiles - '.$plan_data['profile']; ?></li>																	
                              <li><?php echo $displ_yes_no_chat.' Live Chat '; ?> </li>
                              <!--<li><?php //echo $displ_yes_no_video.' Video '; ?> </li>-->                                 
                                                                   
                            </ul>
                            <p></p>
                            <p>Plan Duration - <?php if(isset($plan_data['plan_duration'])){echo $plan_data['plan_duration'];}?> Days</p>
                            </div>
                    </div>
                </div>
        </div>
    </div> 
     </div>
                        </div>   
</div>
<!-- ======== <div class="container"> End ======== -->
<form action="<?php echo $base_url.'premium-member/payment-option';?>" method="post" id="plan_submit" name="plan_submit">
	<input type="hidden" name="plan_id" id="plan_id" value="<?php echo $plan_id; ?>" />
     <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" class="hash_tocken_id" />
       <input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />
       <input type="hidden" name="is_post" id="is_post" value="1" />
</form>
<div class="margin-top-40"></div>
</div>
<?php
	$this->common_model->js_extra_code_fr.="var config = {
		'.chosen-select'           : {},
		'.chosen-select-deselect'  : {allow_single_deselect:true},
		'.chosen-select-no-single' : {disable_search_threshold:10},
		'.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
		'.chosen-select-width'     : {width:'100%'}
	}
	for (var selector in config) {
		$(selector).chosen(config[selector]);
	}

	$('.button-wrap').on('click', function(){
		$(this).toggleClass('button-active');
	});
	
	function process_checkout()
	{		
		$('#plan_submit').submit();	
	}

	function check_coupan_code()
	{
		$('#err_couponcode').html('');
		var couponcode = $('#couponcode').val();
		
		if(couponcode =='')
		{
			$('#err_couponcode').html('Please enter Coupon Code');
			$('#err_couponcode').slideDown();
		}
		else
		{
			var form_data = '';
			var hash_tocken_id = $('#hash_tocken_id').val();
			var plan_id = $('#plan_id').val();
			
			show_comm_mask();
			$.ajax({
			   url: '".$base_url."premium-member/check-coupan',
			   type: 'post',
			   data: {'".$this->security->get_csrf_token_name()."':hash_tocken_id, 'plan_id':plan_id,'couponcode':couponcode},
			   dataType:'json',
			   success:function(data)
			   {
				   if(data.status =='success')
				   {
						$('#main_div').html(data.message);
				   }
				   else
				   {
						$('#err_couponcode').html(data.message);
						$('#err_couponcode').slideDown();
				   }
				   hide_comm_mask();
			   }
			});
		}
		return false;
	}
";
?>