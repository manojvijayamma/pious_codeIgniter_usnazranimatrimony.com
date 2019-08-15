<div class="container">
<?php 
if(isset($plan_data_all) && $plan_data_all !='' && is_array($plan_data_all) && count($plan_data_all)>0)
{
	foreach($plan_data_all as $plan_data)
	{
		if(isset($plan_data['current_plan']) && $plan_data['current_plan'] =='Yes')
		{
?>
	<div class="padding-0-5-xs margin-top-30">
        <div class="jumbotron xxl-16 xl-16 s-16 m-16 l-16 xs-16" style="background-color:white;box-shadow: 0 1px 2px rgba(43,59,93,0.29); ">
            <div class="col-xs-12 col-md-8">
                <h2 class="text-left text-primary text-shadow">Your current active plan - <?php echo $plan_data['plan_name'];?></h2>
            </div>
            <div class="col-xs-10 col-md-4">
                <a href="<?php echo $base_url.'premium-member';?>" class="btn btn-primary pull-right">Upgrade Now</a>
            </div>
        </div>
	</div>
    <?php
		}
	?>
    <div class="sixteen columns">
        <div class="row">
        	<div class="col-xs-12 col-md-3 text-center margin-top-15">
            	Plan Amount
                <hr class="margin-bottom-10"/>
                <?php echo $plan_data['currency'].' '.$plan_data['plan_amount']; ?>
        	</div>
            <div class="col-xs-12 col-md-3 text-center margin-top-15">
            	Discount
                <hr class="margin-bottom-10"/>
                 <?php
					if($plan_data['discount_amount'] !='' && $plan_data['discount_detail'] !='')
					{
						echo $plan_data['currency'].' '.$plan_data['discount_amount']; 
						if(isset($plan_data['discount_detail']) && $plan_data['discount_detail'] !='')
						{
							echo ' ('.$plan_data['discount_detail'].')';
						}
					}
					else
					{
						echo 'N/A';
					}
				?>
        	</div>
            <div class="col-xs-12 col-md-3 text-center margin-top-15">
            	<?php if($plan_data['tax_name'] !=''){ echo $plan_data['tax_name']; } else{ echo 'Tax';}
				?> (<?php echo $plan_data['tax_percentage'];?>%)
                <hr class="margin-bottom-10"/>
                <?php echo $plan_data['currency'].' '.$plan_data['tax_amount']; ?>
        	</div>
            
            <div class="col-xs-12 col-md-3 text-center margin-top-15">
            	Total Amount
                <hr class="margin-bottom-10"/>
                <?php echo $plan_data['currency'].' '.$plan_data['grand_total']; ?>
        	</div>
        </div>
        <div class="row margin-top-10">
        	<div class="col-xs-12 col-md-4 text-center margin-top-15">
            	Plan Duration
                <hr class="margin-bottom-10"/>
                <?php echo $plan_data['plan_duration'].' Days'; ?>
        	</div>
            <div class="col-xs-12 col-md-4 text-center margin-top-15">
            	Plan Activated On
                <hr class="margin-bottom-10"/>
                 <?php echo $this->common_model->displayDate($plan_data['plan_activated'],'F j, Y'); ?>
        	</div>
            <div class="col-xs-12 col-md-4 text-center margin-top-15">
            	Plan Expired On
                <hr class="margin-bottom-10"/>
                 <span class="text-danger text-bold"><?php echo $this->common_model->displayDate($plan_data['plan_expired'],'F j, Y'); ?></span>
        	</div>
         </div>
         <div class="row margin-top-10">
            <div class="col-xs-12 col-md-3 text-center margin-top-15">
            	<i class="fa fa-comments"></i>&nbsp;&nbsp;Allowed Chat
                <hr class="margin-bottom-10"/>
                 <?php echo $plan_data['chat']; ?>
        	</div>
            <div class="col-xs-12 col-md-3 text-center margin-top-15">
            	<i class="fa fa-inbox"></i>&nbsp;&nbsp;Allowed Message (Remaining)
                <hr class="margin-bottom-10"/>
                 <?php echo ($plan_data['message'] - $plan_data['message_used']).' out of '.$plan_data['message']; ?>
        	</div>
            <div class="col-xs-12 col-md-3 text-center margin-top-15">
            	<i class="fa fa-phone"></i>&nbsp;&nbsp;Allowed Contacts (Remaining)
                <hr class="margin-bottom-10"/>
                <?php echo ($plan_data['contacts'] - $plan_data['contacts_used']).' out of '.$plan_data['contacts']; ?>
             </div>
            <div class="col-xs-12 col-md-3 text-center margin-top-15">
            	<i class="fa fa-user"></i>&nbsp;&nbsp;View Profile (Remaining)
                <hr class="margin-bottom-10"/>
                <?php echo ($plan_data['profile'] - $plan_data['profile_used']).' out of '.$plan_data['profile']; ?>
        	</div>
        </div>
    </div>
	<div class="sixteen columns  margin-top-30" align="center">
			<!--<button class="btn btn-info ne-cursor" > View Invoice</button>-->
            <a target="_blank" href="<?php echo $base_url.'premium-member/view-invoice/'.$plan_data['id'] ?>" class="btn btn-primary">View Invoice</a>
	</div>
    <hr style="border-color:#000 !important"/>
 <?php 
	}
}
else
{?>      
		<div class="padding-0-5-xs margin-top-30">
			<div class="jumbotron xxl-16 xl-16 s-16 m-16 l-16 xs-16" style="background-color:white;box-shadow: 0 1px 2px rgba(43,59,93,0.29); ">
                <div class="col-xs-12 col-md-8">
                    <h2 class="text-left text-primary text-shadow">You have currently no active plan</h2>
                </div>
                <div class="col-xs-10 col-md-4">
                	<a href="<?php echo $base_url.'premium-member';?>" class="btn btn-primary pull-right">Upgrade Now</a>
                </div>
			</div>
	</div> 
       
<?php }?>
</div>
</div>
<div class="margin-top-40"></div>