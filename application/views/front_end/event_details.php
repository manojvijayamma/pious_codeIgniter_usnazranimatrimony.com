<!-- ====== style for event details last paragraph color start====== -->
<style>
p:last-child {
    margin-bottom: 0px;
    color: white;
    font-size: 100%;
    line-height: 1.8em;
}
table{
	width:100%!important;
}
</style>
<!-- ======= style for event details last paragraph color======= -->
<!-- ======= <div class="container"> Start ======= -->	
<div id="slider" class="margin-top-0-xs">
<?php $images = array('image'=>$event_item['image'],
									'image_2'=>$event_item['image_2'],
									'image_3'=>$event_item['image_3'],
									'image_4'=>$event_item['image_4']);	
				  $path_events = $this->common_model->path_events;
				  
				foreach($images as $image_val) 
				{	
				 	if(isset($image_val) && $image_val !='' && file_exists($path_events.$image_val))
					{ ?>

    <div class="item">
        <div class="slider-pic"><img src="<?php echo $base_url; ?><?php echo $path_events;?><?php echo $image_val;?>" style="width:1349px; height:421px;" alt="The Last of us"></div>
    </div>
 <?php }
			} ?>
</div>
<div class="container venue-header">
    <div class="row venue-head">
        <div class="col-md-12 title">
           <!--<h1 class="text-shadow-black font-25-xs" style="font-size:40px;">EVERY <span class="text-color-default">EVENT</span> SHOULD <br> BE <span class="text-color-light-red">PERFECT</span></h1>-->
           <h1 class="text-shadow-black font-25-xs" style="font-size:40px;"><span class="text-color-default"><?php if(isset($event_item['title'])) {echo $event_item['title'];}?></span></h1>
           
               </div>
        <div class="col-md-8 rating-box">
            <h3 class="location font-18 margin-top-0-xs text-center-xs font-17-xs" style="font-size:25px;"><i class="fa fa-map"></i><?php if(isset($event_item['venue'])) {echo $event_item['venue'];}?></h3>
           <!-- <h4 class="text-white font-15 text-grey-xs text-center-xs"><i class="fa fa-calendar margin-right-10"></i> 16<sup>th</sup>, December - 2016, ( 10:00 a.m. )</h4>-->
            <h4 class="text-w font-15 text-grey-xs text-center-xs"><i class="fa fa-calendar margin-right-10"></i><?php echo $this->common_model->displayDate($event_item['event_date'],' jS F - Y');?> (<?php if(isset($event_item['event_time'])) {echo $event_item['event_time'];}?> )</h4>
			
			<?php if(isset($event_item['external_link']) && $event_item['external_link']!=''){ ?>
				<h4 class="text-w font-15 text-grey-xs text-center-xs"><i class="fa fa-link margin-right-10"></i><a target="_blank" href="<?php echo $event_item['external_link']; ?>"><?php if(isset($event_item['external_link'])) {echo $event_item['external_link'];}?></a></h4>
			<?php } ?>
        </div>
		<?php 
			if(isset($event_item['map_address']) && $event_item['map_address'] != ''){
			?>
				<div class="col-md-4 venue-action"> <a href="#googleMap" class="btn btn-sm btn-primary font-15 bold" style="box-shadow:2px 2px 0 0 #888;"><i class="fa fa-map"></i> VIEW MAP</a></div>
			<?php } ?>	
    </div>
</div>
<div class="clearfix"></div>	
<div class="container-fluid" style="background:url(<?php echo $base_url; ?>assets/front_end/images/bg/flower7.png) !important;">
    <div class="container">
        <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-20px margin-bottom-20px">
            <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
                <h1 class="text-center text-darkgrey text-shadow-black text-uppercase" style="font-size:30px !important;"><span class="text-color-light-red">Detail</span>  Of <span class="text-color-default">Event</span></h1>
            </div>
        </div>
        <div class="clearfix"></div>
        
    </div>
</div>
<div class="clearfix"></div>

<div class="container-fluid padding-lr-zero body-banner2">
    <div class="padding-bottom-20" style="background:rgba(0,0,0,0.7)">
        <div class="container padding-top-30">
            <div class="xxl-10 xl-10 xs-16 l-10 xs-margin-left-0 s-16 xs-margin-left-0 m-16 m-margin-left-0 l-margin-left-0 margin-top-20 padding-15px" style="">
                <div class="row">
                    <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 font-size-14 border-1px-btm-lgt-grey">
                        <h2 class="margin-top-0px margin-bottom-0px padding-bottom-5px text-shadow-black" style="color:#FEC25B;"><?php if(isset($event_item['title'])) {echo $event_item['title'];}?></h2>
                    </div>
                    <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 font-size-14 margin-top-30px margin-bottom-20px padding-0-xs">
                        <div class="col-xs-12"> 
                        <?php 	
							$descri= $event_item['description'];
							//$description = substr(strip_tags($descri));
							echo '
							<div class="font-15 text-white margin-top-10 text-shadow-black">'.$descri.'</div>';
						?>	
                        	<!--<p class="font-15 text-white margin-top-10 text-shadow-black"><i class="glyphicon glyphicon-hand-right"></i>&nbsp; This is where we celebrate Narjis Enterprise Upcoming Events. This section is devoted to the innumerable Narjis Enterprise members who have found their soul-mates. Here's wishing them the very best for a happy and successful married life.
								</p>-->
                            <form>
                                <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-left-right-zero-small">
                                    <div class="row margin-top-20px text-shadow-black">
                                                
                                            <p class="text-color-light-red font-18"><strong>Event Date : </strong><span class="text-white"><?php echo $this->common_model->displayDate($event_item['event_date'],' jS F - Y');?></span></p> 
                                            <p class="text-color-light-red font-18"><strong>Event Time :</strong> <span class="text-white"><?php if(isset($event_item['event_time'])) {echo $event_item['event_time'];}?></span></p>
                                            <p class="text-color-light-red font-18" style="text-align: inherit;"><strong>Event Venue :</strong> <span class="text-white"><?php if(isset($event_item['venue'])) {echo $event_item['venue'];}?></span></p>
                                       		<!-- <p class="margin-top-10px mb10px text-white pull-left">
                                           <?php //if(isset($event_item['venue'])) {echo $event_item['venue'];}?> 
                                       		 </p>-->

                                        <div class="clearfix"></div>
                                    </div> 
                                </div>
                                <div class="clearfix "></div>
                            </form> 
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 font-size-14">
                        <h3 class="pull-left">
                            <a data-toggle="modal" data-target="#event_deatils" class="btn btn-warning btn-sm font-15 bold" style="box-shadow:3px 3px 0 0 #ccc;"> Register Now </a>
                        </h3>
                    </div>
                </div>
            </div> 
            <div class="xxl-6 xl-6 l-6 m-16 s-16 xs-16 margin-top-30">
                <div class="row-center"><?php //$this->load->view('front_end/sidebar_advertisement');?>
                	<?php $where_arra=array('is_deleted'=>'No','status'=>'APPROVED','level'=>'Level 2','type'=>'Image');
						$advertisement_data = $this->common_model->get_count_data_manual('advertisement_master',$where_arra,1,'*','rand()');
						if(isset($advertisement_data) && $advertisement_data !='' && is_array($advertisement_data) && count($advertisement_data) > 0 ){?>
						<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-999" style="box-shadow: none;">
							<div class="row" style="padding:0px;">
								<?php if(isset($advertisement_data['type']) && $advertisement_data['type'] =='Image' && isset($advertisement_data['link']) && $advertisement_data['link'] !='' && isset($advertisement_data['image']) && $advertisement_data['image'] !=''){?>
								<a href="<?php echo $advertisement_data['link']; ?>" target="_blank">
									<img data-src="<?php echo $base_url.$this->common_model->path_advertise.$advertisement_data['image']; ?>" class="text-center img-responsive lazyload" src="<?php echo $base_url.$this->common_model->path_advertise.$advertisement_data['image']; ?>" alt="<?php echo $advertisement_data['link']; ?>" style="width: 75%;height: auto;" />
								</a>
								<?php }else{
									if(isset($advertisement_data['google_adsense']) && $advertisement_data['google_adsense'] !=''){echo $advertisement_data['google_adsense'];}
								}?>
							</div>
						</div>
					<?php }?>
                </div>
            </div>
        </div>
        <div class="margin-top-20"></div>
    </div>
</div>
   
<div class="modal fade event_deatils" id="event_deatils">
	<form method="post" action="<?php echo $base_url; ?>event/checkout" name="check" id="check" enctype="multipart/form-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove font-white"></span></a>
                <h3 class="modal-title">Book Your Place</h3>
            </div>
            <div class="modal-body">
                <div class="row margin-bottom-20px">
                    <div class="col-md-6">
                        <img src="<?php echo $base_url; ?><?php echo $path_events;?><?php echo $event_item['image'];?>" class="img-responsive" style="box-shadow: 0 5px 11px 0 rgba(0,0,0,.18), 0 4px 15px 0 rgba(0,0,0,.15);" alt="">
                       <!--  <img src="<?php //echo $base_url; ?>assets/front_end/images/event-list/event3.jpg" class="img-responsive" style="box-shadow: 0 5px 11px 0 rgba(0,0,0,.18), 0 4px 15px 0 rgba(0,0,0,.15);" alt="">-->
                        
                        
                    </div>
                    <div class="col-md-6 product_content margin-top-10-xs">
                        <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
                            <div class="row">
                                <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
                                    <div class="row border-1px-btm-lgt-grey">
                                        <h4 class="xxl-6 xl-6 l-6 m-8 s-8 xs-8 margin-bottom-zero margin-top-zero text-grey font-15">
                                            <i class="fa fa-map margin-right-5"></i> Venue <span class="hidden-lg hidden-md hidden-sm">:</span>
                                        </h4>
                                        <h4 class="xxl-10 xl-10 l-10 m-8 s-8 xs-8 margin-bottom-zero margin-top-zero line-break text-darkgrey font-15">
                                             <?php if(isset($event_item['venue'])) {echo $event_item['venue'];}?>	 							
                                        </h4>
                                    </div>
                                    <div class="row border-1px-btm-lgt-grey">
                                        <h4 class="xxl-6 xl-6 l-6 m-8 s-8 xs-8 margin-bottom-zero margin-top-zero text-grey font-15">
                                            <i class="fa fa-calendar margin-right-5"></i> Date <span class="hidden-lg hidden-md hidden-sm">:</span>
                                        </h4>
                                        <h4 class="xxl-10 xl-10 l-10 m-8 s-8 xs-8 margin-bottom-zero margin-top-zero line-break text-darkgrey font-15">
                                         <?php if(isset($event_item['event_date'])) {echo $event_item['event_date'];}?>								
                                        </h4>
                                    </div>
                                    <div class="row border-1px-btm-lgt-grey">
                                        <h4 class="xxl-6 xl-6 l-6 m-8 s-8 xs-8 margin-bottom-zero margin-top-zero text-grey font-15">
                                            <i class="fa fa-crosshairs margin-right-5"></i> Limited <span class="hidden-lg hidden-md hidden-sm">:</span>
                                        </h4>
                                        <h4 class="xxl-10 xl-10 l-10 m-8 s-8 xs-8 margin-bottom-zero margin-top-zero line-break text-darkgrey font-15">
                                         Up to <?php if(isset($event_item['limited'])) {echo $event_item['limited'];}?> Peoples
                                        </h4>
                                    </div>
                                    <div class="row border-1px-btm-lgt-grey">
                                        <h4 class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-bottom-zero margin-top-zero text-grey font-15">
                                            <i class="fa fa-history margin-right-5"></i> Time <span>(Please arrive on time) :</span> <?php if(isset($event_item['event_time'])) {echo $event_item['event_time'];}?>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
                            <div class="row">
                                <h4 class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 text-grey"><i class="fa fa-list margin-right-5"></i> Description:</h4>
                                <p class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 text-darkgrey font-16" style="margin:5px 0px;">
                                <?php 	
											$descri= $event_item['description'];
											$description = substr(strip_tags($descri),0,163);
											echo $description."...";
									?></p>
                            </div>
                        </div>	
                        <div class="clearfix"></div>
                        <hr>
                        <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
                            <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    <h4 class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 text-darkgrey">Ticket : <?php if(isset($event_item['currency'])) {echo $event_item['currency'];}?> <?php if(isset($event_item['ticket'])) {echo $event_item['ticket'];}?></h4>
                               </div>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <select class="form-control pull-right" id="no_of_ticket" name="no_of_ticket">
                                    		<option value="" selected="">QTY</option>
                                            <option value="1">1</option>
                                            <option value="2" >2</option>
                                            <option value="3">3</option>
                                            <option value="4" >4</option>
                                            <option value="5" >5</option>
                                            <option value="6" >6</option>
                                            <option value="7">7</option>
                                            <option value="8" >8</option>
                                            <option value="9" >9</option>
                                            <option value="10" >10</option>
                                       </select>
                                       </div>
                                </div>
                            </div>
                            <hr>
                            <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label class="pull-right text-darkgrey font-16" ><strong>Total <?php if(isset($event_item['currency'])) {echo $event_item['currency'];}?> <span class="badge" id="Total"></span></strong></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
					<a href="javascript:;" data-dismiss="modal" class="btn btn-danger btn-sm pull-left font-15 bold"><i class="fa fa-chevron-left"></i> Back</a>
                    <!--<a href="<?php //echo $base_url; ?>event" class="btn btn-danger btn-sm pull-left font-15 bold"><i class="fa fa-chevron-left"></i> Back</a>-->
                    <input type="submit" class="btn btn-sm pull-right font-15 bold text-white" value="Booking Now" onClick="return check_number()">
                </div>
            </div>
            <?php
				$event_id = $event_item['id'];
				$event_title = $event_item['title'];
				$ticket_currency = $event_item['currency'];
				$ticket = $event_item['ticket'];
				$date = $this->common_model->displayDate($event_item['event_date'],' jS F - Y');
				$location = $event_item['venue'];			
            	$data_array = array('event_id'=>$event_id,'title'=>$event_title,'ticket_currency'=>$ticket_currency,'ticket'=>$ticket,'event_date'=>$date,'location'=>$location);
				/*echo "<pre>";
				print_r($data_array);
				echo "</pre>";*/
				$this->session->set_userdata('event_data_session',$data_array);
			?>
        </div>
    </div>
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" />
	</form>
 <!-- === </div> === -->

<div class="clearfix"></div>
<?php if(isset($event_item['map_address']) && $event_item['map_address']!='')
{ ?>	
<div class="container-fluid" style="background:#fff !important;">
    <div class="container padding-0-xs">
        <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-20px margin-bottom-20px padding-0-xs">
            <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-0-xs">
            <h1 class="text-center text-darkgrey text-shadow-black text-uppercase" style="font-size:30px !important;">FIND <span class="text-color-default">Location</span> From <span class="text-color-light-red">MAP</span></h1>
            </div>
        </div>
        <div class="clearfix"></div>
        
    </div>
</div>
<div class="clearfix"></div>
<!-- ====== <div class="container">  End ====== -->
<div id="googleMap" class="map"></div>
<?php 
}
else
{ ?>
	<div class="margin-top-30px">
<?php 
}?>
<div class="margin-top-0"></div>
<?php
$map_address = $event_item['map_address'];
$map_address = str_replace("\n", "", $map_address);
$map_address = str_replace("\r", "", $map_address);

$map_tooltip = $event_item['map_tooltip'];
$map_tooltip = str_replace("\n", "", $map_tooltip);
$map_tooltip = str_replace("\r", "", $map_tooltip);

$event_item['map_address'] = $map_address;
$event_item['map_tooltip'] = $map_tooltip;

$htpp_web = 'http';
if(strpos(base_url(),'https') === false)
{
	
}
else
{
	$htpp_web = 'https';
}
?>
<script src="<?php echo $htpp_web; ?>://maps.googleapis.com/maps/api/js?key=AIzaSyArZ7otxoqUtWWNbIW9-vBst3uevYRan7g"></script>

<?php
	$this->common_model->js_extra_code_fr.="
	(function($){
		$(document).ready(function(){
			$('#googleMap').gMap({
				maptype: 'ROADMAP',
				scrollwheel: false,
				zoom: 13,
				markers: [
					{
						address: '".$event_item['map_address']."',
						html: '".$event_item['map_tooltip']."',
						popup: true,
					}
				],
			});
		   });
	})(this.jQuery);
	
	if($('#enquiry_form').length > 0)
		{
			$('#enquiry_form').validate({
				submitHandler: function(form)
				{
					return true;
				}
			});
		}
		
	$(document).ready(function() {		
		$('#no_of_ticket').change(function()
		{		
			var no_of_ticket = $('#no_of_ticket').val();
			//alert(no_of_ticket);
			var totalTotal2 = ((no_of_ticket * '".$event_item['ticket']."'));
			//alert(totalTotal2);
				var totalTotal=totalTotal2;		
			$('#Total').text(totalTotal);
		});
	});
	function check_number()
	{
		 if( document.check.no_of_ticket.value == '' )
		 {
			 alert('Please select how many tickets you would like to buy');
			 document.check.no_of_ticket.focus() ;
			 return false;
		  }	
	}
";?>
<?php
    /*$this->common_model->js_extra_code_fr.="var myCenter = new google.maps.LatLng(23.0203458, 72.5797426);
        function initialize() {
            var mapProp = {
                center: myCenter,
                zoom: 9,
                scrollwheel: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById('googleMap'), mapProp);
            var marker = new google.maps.Marker({
                position: myCenter,
                icon: '".$base_url."assets/front_end/images/pinkball.png'
            });
            marker.setMap(map);
            var infowindow = new google.maps.InfoWindow({
                content: 'Hello Address'
            });
        }
    google.maps.event.addDomListener(window, 'load', initialize);";*/
?>