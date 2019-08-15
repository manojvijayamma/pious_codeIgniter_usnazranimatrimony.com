<?php 
	$base_url = base_url();
?>
<div class="xxl-12 xl-12 l-11 xs-16 m-16 s-16 padding-lr-zero-320 margin-top-10px-320px padding-lr-zero-480 margin-top-10px-480px ne-mrg-top-10-768 padding-0-5-xs">
			<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 bg-border padding-lr-zero" style="padding:4px;position:relative;">
				<div class="xxl-16 xl-16 m-16 s-16 l-16 xs-16 " style="padding:0px 4px;">
					<h3 class="upgrade-heading text-center font-18 xxl-16 xl-16 l-16 s-16 m-16 font-16 margin-top-0px margin-bottom-0px padding-lr-zero-320">
						<i class="fa fa-external-link-square ne_mrg_ri8_10"></i>Photo Request That I Received

					</h3>
				</div>
				<div class="xxl-16 xl-16 m-16 l-16 s-16 xs-16 margin-bottom-20px">
					
					<br/>
					<div class="alert alert-success" id="delete_success" style="display:none"></div>

					<?php
						if(isset($photo_pass_data) && $photo_pass_data !='' && is_array($photo_pass_data) && count($photo_pass_data) > 0)
						{
							foreach($photo_pass_data as $row_photo_pass)
							{
					?>
	
					<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 featured-profile padding-lr-zero">
						<div class="xxl-10 xl-8 m-16 l-16 s-16 xs-16 margin-top-15">
							<div class="row">
								<div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16">
									<p  class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 font padding-lr-zero text_slider"><i class="fa fa-bookmark"></i> <?php echo $row_photo_pass['ph_msg'];?></p>
								</div>
								<div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16 ne_font_12 margin-top-5">
									<i class="fa fa-calendar"></i> <?php echo $row_photo_pass['ph_reqdate'];?>
								</div>
								<br>
								<div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16 ne_font_12">
									Status : <?php echo $row_photo_pass['receiver_response'];?> <img src="<?php echo $base_url; ?>assets/images/right-gray-arrow.png" class="right-gray-arrow" alt="view-arrow" />
								</div>
							</div>
						</div>
						<div class="xxl-4 xl-6 m-16 l-16 s-16 xs-16 margin-top-5 border-left margin-bottom-10">
							<div class="row">
								
								<div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16 font-12 margin-top-15px text-center padding-0-xs margin-top-5-xs margin-top-5-sm">
									<a href="<?php echo $base_url; ?>search/view-profile/<?php echo $row_photo_pass['ph_requester_id'];?>" data-toggle="tooltip" data-placement="top" title="Received from <?php echo $row_photo_pass['ph_requester_id'];?>" class="btn-delete margin-right-10"><i class="glyphicon glyphicon-eye-open "></i></a>
									
									<a data-toggle="tooltip" data-placement="top" title="Accept Request" onclick="send_photo_pass('<?php echo $row_photo_pass['ph_requester_id']; ?>','<?php echo $row_photo_pass['receiver_response'];?>')" style="cursor:pointer;" class="btn-delete margin-right-10"><i class="fa fa fa fa-check" ></i></a>

									<a class="btn-delete" data-toggle="modal" data-target="#myModal_delete15" title="Reject Request" onClick="reject_photo_reqeust('<?php echo $row_photo_pass['ph_reqid']; ?>','receiver');"><i class="fa fa-ban"></i></a>
									
									<!--<a class="btn-delete" onclick="delete_reqeust('<?php //echo $row_photo_pass['ph_reqid']; ?>')" style="cursor:pointer;">  <i class="fa fa-trash"></i></a>-->
									<?php if(isset($row_photo_pass['receiver_response']) && $row_photo_pass['receiver_response']=='Pending'){?>
									<a class="btn-delete" data-toggle="modal" data-target="#myModal_delete12" title="Delete Request" onClick="delete_photo_reqeust('<?php echo $row_photo_pass['ph_reqid']; ?>','receiver');"><i class="fa fa-trash"></i></a>
									<?php }?>
								</div>
							</div>
						</div>
					</div>
					<?php
							}
						}else{
					?>
							<div role="alert" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 alert margin-top-20" style="background:#fcf8e3;border:1px solid #faebcc; color: #8a6d3b;">
								<p class="margin-top-10px margin-bottom-10px">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								No Data Available.
							</p>
						</div>
						<div class="clearfix"></div>
					<?php
						}
					?>
					
				</div> 
				
				<div id="myModal_delete15" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title"><img src="<?php echo $base_url; ?>assets/front_end/images//icon/alert.png" alt="" class="" /> Delete This Photo Request</h4>
							</div>
							<div class="modal-body">
								<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16">
									<div class="alert alert-danger" style="overflow:hidden;box-shadow:4px 4px 0 0 #ccc;">
										<div class="xxl-2 xl-2 l-2 m-16 xs-16 s-16">
											<img src="<?php echo $base_url; ?>assets/front_end/images/icon/user-detele.png" alt="" class="margin-right-10" />
										</div>
										<div class="xxl-13 xl-13 l-13 m-16 xs-16 s-16 xxl-margin-left-1 xl-margin-left-1 margin-top-10">
											<strong>Are you sure you want to Reject this request?</strong><br />
											<!-- <span class="small">This Profile will be removed permanently from your Records.</span> -->
										</div>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="modal-footer margin-top-10">
								<a class="btn btn-sm btn-success" href="javascript:;" onclick="reject_request()"><i class="fa fa-check"></i> Yes</a>
								<a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> No</a>
							</div>
						</div>
					</div>
				</div>

				<div id="myModal_delete12" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title"><img src="<?php echo $base_url; ?>assets/front_end/images//icon/alert.png" alt="" class="" /> Delete This Photo Request</h4>
							</div>
							<div class="modal-body">
								<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16">
									<div class="alert alert-danger" style="overflow:hidden;box-shadow:4px 4px 0 0 #ccc;">
										<div class="xxl-2 xl-2 l-2 m-16 xs-16 s-16">
											<img src="<?php echo $base_url; ?>assets/front_end/images/icon/user-detele.png" alt="" class="margin-right-10" />
										</div>
										<div class="xxl-13 xl-13 l-13 m-16 xs-16 s-16 xxl-margin-left-1 xl-margin-left-1 margin-top-10">
											<strong>Are you sure you want to Remove this request?</strong><br />
											<span class="small">This Profile will be removed permanently from your Records.</span>
										</div>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="modal-footer margin-top-10">
								<a class="btn btn-sm btn-success" href="javascript:;" onclick="delete_request()"><i class="fa fa-check"></i> Yes</a>
								<a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> No</a>
							</div>
						</div>
					</div>
				</div>
				
			</div>
			
			<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 tp-pagination margin-top-20">
				<!-- for pagination-->
				<?php
					if(isset($photo_pass_count) && $photo_pass_count !='' && $photo_pass_count > 0)
					{
						echo $this->common_model->rander_pagination_front('my-profile/photo-pass-request-received/',$photo_pass_count);
					}
				?>
				<!-- for pagination-->
			</div>
			
		<div class="clearfix"></div>
		
		<?php $this->load->view('front_end/member_slider_footer'); ?>
		<div class="clearfix"></div>
		</div>