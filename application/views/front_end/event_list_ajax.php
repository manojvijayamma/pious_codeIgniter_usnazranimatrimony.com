<div class="container">
<?php
if(isset($events) && $events !='' && is_array($events) && $events_data_count > 0)
{	
	$datetime_bg_arr = array(
							'pink-gradient','blue-gradient','purple-gradient'
							);
	$class_event_disp = 'five';
	if($events_data_count == 3 )
	{
		$class_event_disp = ' four ';
	}
		$event_sr = 0;
							 
	?>
		<div class="">
			<div class="col-lg-12 col-sm-12 col-xs-12 col-sm-12 padding-0-xs">
				<ul class="event-list">
                	<?php
					  foreach($events as $events_value)
					  { 
					  	
						$displ_class = '';
						if(isset($datetime_bg_arr[$event_sr]) && $datetime_bg_arr[$event_sr] !='')
						{
							$displ_class = $datetime_bg_arr[$event_sr];
						}
						$event_sr++;
						?>
					<li class="">
                    
						<time datetime="2014-07-20" class="<?php if($displ_class !=''){ echo $displ_class;} ?> <?php echo $class_event_disp; ?>">
							<span class="day"><?php echo $this->common_model->displayDate($events_value['event_date'],'j');?></span>
							
                            <span class="month" style="font-size: 20pt !important; "><?php echo $this->common_model->displayDate($events_value['event_date'],' F');?></span>
							<span class="year">  <?php echo $this->common_model->displayDate($events_value['event_date'],'Y');?></span>
						</time>
						<img alt="" src="<?php echo $base_url; ?><?php echo $this->common_model->path_events;?><?php echo $events_value['image'];?>" />
						
						<div class="info">
							<h2 class="title text-shadow-black"><?php if(isset($events_value['title'])) {echo $events_value['title'];}?></h2>
							<hr>
							<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
								<?php 	
                                    $descri= $events_value['description'];
                                    $description = substr(strip_tags($descri),0,230);
                                    
									echo $description."...";
                                ?>
                                
								<h5 class="margin-top-20 font-16"><span class="bold text-color-light-red"><i class="fa fa-clock-o text-grey"></i> Time:</span> <span class="text-darkgrey"><?php if(isset($events_value['event_time'])) {echo $events_value['event_time'];}?></span></h5>
							</div>
							
							<ul>
								<li style="width:50%;"><a href="<?php echo $base_url; ?>event/details/<?php echo $events_value['id'];?>" class="custom-button"><span class="fa fa-globe"></span> Read more <i class="fa fa-chevron-right"></i></a></li>
								<li style="width:50%;"><a class="custom-button" href="<?php echo $base_url; ?>event/details/<?php echo $events_value['id'];?>"><i class="fa fa-registered"></i> Register Now <i class="fa fa-chevron-right"></i></a>
							</ul>
							<!-- === <div class="clearfix"></div> === -->
						</div>
						<div class="clearfix"></div>
						
						<div class="social">
							<ul>
								<?php if(isset($events_value['event_facebook_link']) && $events_value['event_facebook_link']!=''){ ?>
									<li class="facebook" style="width:33%;background: transparent;"><a href="<?php echo $events_value['event_facebook_link'];?>" target="_blank"><span class="fa fa-facebook"></span></a></li>
								<?php } ?>
								<?php if(isset($events_value['event_twitter_link']) && $events_value['event_twitter_link']!=''){ ?>
									<li class="twitter" style="width:34%;background: transparent;"><a href="<?php echo $events_value['event_twitter_link'];?>" target="_blank"><span class="fa fa-twitter"></span></a></li>
								<?php } ?>
								<?php if(isset($events_value['event_google_link']) && $events_value['event_google_link']!=''){ ?>
									<li class="google-plus" style="width:33%;background: transparent;"><a href="<?php echo $events_value['event_google_link'];?>" target="_blank"><span class="fa fa-google-plus"></span></a></li>
								<?php } ?>
							</ul>
						</div>
					</li>
                    <?php } ;?>
					<!-- === <div class="clearfix"></div> === -->
				</ul>
			</div>
			<div class="clearfix"></div>
            <!-- for pagination-->
			<?php
               if(isset($events_data_count) && $events_data_count !='' && $events_data_count > 0)
                {	
                    echo $this->common_model->rander_pagination_front('event/index',$events_data_count);
                }
            ?>
			<!-- for pagination-->
    </div>
<?php 
}
else 
{ ?>	
  	<div class="alert alert-danger" align="center">Sorry, No Events Available .</div> 
<?php
}?>
	</div>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id_temp" class="hash_tocken_id" />