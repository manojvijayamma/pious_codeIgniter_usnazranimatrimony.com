
<!-- ======== <div class="container"> Start ======== -->
    <div class="tp-page-head hidden-sm hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="page-header text-center">
                        <div class="icon-circle">
                            <i class="icon icon-size-60 icon-lock icon-white"></i>
                        </div>
                        <h1>Payment Option</h1>
                        <p class="text-white text-center">Just simple steps and become premium member.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="container padding-0-5-xs">
        <div class="row">
            <div class="board" style="height:auto !important;">
                    <div class="board-inner">
                        <ul class="nav nav-tabs" id="myTab">
                            <!-- <div class="liner"></div> -->
                            <li class="payment-tabs active">
                                
                                <a href="#home" data-toggle="tooltip" title="" data-original-title="Select your plan">
                                    <span class="round-tabs one" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 #E52D31;">
                                        <i class="fa fa-check-square-o" aria-hidden="true"></i> 
                                    </span> 
                                </a></li>
                                
                                <li class="payment-tabs"><a href="#profile" data-toggle="tooltip" title="" data-original-title="View cart">
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
                    <div class="tab-content padding-0-5-xs"> <!-- style="background-color:#eee;" -->
                        <div class="tab-pane fade in active padding-0-5-xs" id="home">
                            <div class="padding-0-5-xs">
                                <div class="jumbotron" style="background-color:white;box-shadow: 0 1px 2px rgba(43,59,93,0.29);">
                                    <!--<button type="button" class="btn btn-primary pull-right">Skip</button>-->
                                    <h3 class="text-primary text-center">Upgrade Membership Plan</h3>
                                    <p class="text-center"><small>Select One Of the Packages below and pay using the payment method of your choice.</small></p>
                                    <hr>
                                    <div class="container text-center">
                                        <div class="row">
                                            <div class="col-md-3">			
                                                <h4 class="text-primary text-center fa fa-check"> Send,read and reply  to message</h4>
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <h4 class="text-primary text-center fa fa-check"> Send message and express interest</h4>
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <h4 class="text-primary text-center fa fa-check"> View member full profile with contact details</h4>
                                            </div>
                                            <div class="col-md-3">
                                                <h4 class="text-primary text-center fa fa-check"> 24 * 7 Support</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div></div></div>
                            <div class="clearfix"></div>
<?php 
if(isset($membership_plans) && $membership_plans !='' && is_array($membership_plans) && $membership_plan_data_count > 0)
{
	foreach($membership_plans as $membership_plan_item)
		{  ?>
            <div class="col-md-3 col-sm-6 padding-0-5-xs " style="padding-bottom: 20px;" >
                         <div class="pricingTable box-shadow">
                       <div class="pricingTable-header">
                        <h2 class="heading"><strong>
						<?php if(isset($membership_plan_item['plan_name'])){echo $membership_plan_item['plan_name'];}?></strong></h2>
                       <!-- <span class="price-value">
                            <span class="currency"><?php //if(isset($membership_plan_item['plan_amount_type'])){echo $membership_plan_item['plan_amount_type'];}?></span><?php //if(isset($membership_plan_item['plan_amount'])){echo $membership_plan_item['plan_amount'];}?>
                            <span class="month">/mo</span>
                        </span>-->
                        <span class="price-value">
                         <?php if(isset($membership_plan_item['plan_amount_type'])){echo $membership_plan_item['plan_amount_type'];}?> <?php if(isset($membership_plan_item['plan_amount'])){echo $membership_plan_item['plan_amount'];}?>
                        </span>
                    </div>

                    <div class="pricing-content">
                        <ul class="check-circle list-group">
                            <li class="list-group-item">
							<?php 
								if(isset($membership_plan_item['plan_duration']) && $membership_plan_item['plan_duration'] > 0 ){ ?>
								<i class="fa fa-check-circle pay_now" style="color:#3121f8;"></i>
							<?php }else{ ?>
								<i class="fa fa-times-circle pay_now" style="color:red;"></i>
							<?php } ?>
								Duration / <?php if(isset($membership_plan_item['plan_duration'])){echo $membership_plan_item['plan_duration'];}?>
							</li>
                            <li class="list-group-item">
							<?php 
								if(isset($membership_plan_item['plan_contacts']) && $membership_plan_item['plan_contacts'] > 0 ){ ?>
								<i class="fa fa-check-circle pay_now" style="color:#3121f8;"></i>
							<?php }else{ ?>
								<i class="fa fa-times-circle pay_now" style="color:red;"></i>
							<?php } ?>
							Contact / <?php if(isset($membership_plan_item['plan_contacts'])){echo $membership_plan_item['plan_contacts'];}?>
							</li>
                            <li class="list-group-item">
							<?php 
								if(isset($membership_plan_item['profile']) && $membership_plan_item['profile'] > 0 ){ ?>
								<i class="fa fa-check-circle pay_now" style="color:#3121f8;"></i>
							<?php }else{ ?>
								<i class="fa fa-times-circle pay_now" style="color:red;"></i>
							<?php } ?>
								View Profile / <?php if(isset($membership_plan_item['profile'])){echo $membership_plan_item['profile'];}?>
							</li>
                            <li class="list-group-item">
							<?php 
								if(isset($membership_plan_item['chat']) && $membership_plan_item['chat'] != 'Yes' ){ ?>
								<i class="fa fa-times-circle pay_now" style="color:red;"></i>
							<?php }else{ ?>
								<i class="fa fa-check-circle pay_now" style="color:#3121f8;"></i>
							<?php } ?>
								Live Chat / <?php if(isset($membership_plan_item['chat'])){echo $membership_plan_item['chat'];}?> 
							</li>
                            <li class="list-group-item">
							<?php 
								if(isset($membership_plan_item['plan_msg']) && $membership_plan_item['plan_msg'] > 0 ){ ?>
								<i class="fa fa-check-circle pay_now" style="color:#3121f8;"></i>
							<?php }else{ ?>
								<i class="fa fa-times-circle pay_now" style="color:red;"></i>
							<?php } ?>
								Personal Message / <?php if(isset($membership_plan_item['plan_msg'])){echo $membership_plan_item['plan_msg'];}?>
							</li>
                            <li class="list-group-item" style="height: 80px !important; overflow-y: scroll;"> 
							<?php 
								if(isset($membership_plan_item['plan_offers']) && $membership_plan_item['plan_offers'] != ''){ ?>
								<i class="fa fa-check-circle pay_now" style="color:#3121f8;"></i>
							<?php }else{ ?>
								<i class="fa fa-times-circle pay_now" style="color:red;"></i>
							<?php } ?>
								<span class="text-red text-center">Promotional Offer</span> <br><?php if(isset($membership_plan_item['plan_offers'])){echo $membership_plan_item['plan_offers'];}?>
                            </li>
                        </ul>
						<?php
							if(isset($membership_plan_item['plan_amount']) &&$membership_plan_item['plan_amount'] > 0){
						?>
								<a href="<?php echo $base_url; ?>premium-member/buy-now/<?php if(isset($membership_plan_item['id'])){echo $membership_plan_item['id'];}?>" class="read text-center btn btn-default btn-sm"><i class="fa fa-shopping-cart"></i> Buy Plan</a>
						<?php
							}else{
						?>
								<a href="<?php echo $base_url; ?>contact/admin" class="read text-center btn btn-default btn-sm"> Contact To Admin</a>
						<?php
							}
						?>
                    </div>
                </div>
            </div>
<?php  }

}
else 
{ ?>	
  	<div class="alert alert-danger" align="center">Sorry, Currently not any plan active.</div> 
<?php
}?>
                        </div>
                        </div>
        </div> 
<!-- ======== <div class="container"> End ======== -->
<div class="margin-top-40"></div>
<?php
	$this->common_model->js_extra_code_fr.="
$('.button-wrap').on('click', function(){
		$(this).toggleClass('button-active');
	});";
?>