<?php
	//echo "<pre>";
	//print_r($video_data['video_url']);exit;
?>
<!------------------<div class="container">----Start------------------------------------>
<div class="clearfix"></div>
<div class="container margin-top-20 padding-lr-zero-xs">
	<!--<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-0-5-xs">
		<div class="">
		<img src="<?php //echo $base_url; ?>assets/front_end/images/icon/register-header-female.jpg"  class=" full-width img-thumbnail" alt=""/> 
		</div>
	</div>-->
	<div class="margin-top-20 xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 padding-0-5-xs">
		<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-5">
			<?php $this->load->view('front_end/my_profile_sidebar'); ?>
		</div>
		
		<div class="xxl-12 xl-12 l-11 xs-16 m-16 s-16 ne_inbox_right_pan padding-lr-zero-320 margin-top-10px-320px padding-lr-zero-480 margin-top-10px-480px ne-mrg-top-10-768 padding-0-5-xs">	
			<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 bg-border padding-lr-zero padding-lr-zero-480" style="padding:4px !important;">
				<div class="xxl-16 xl-16 m-16 s-16 l-16 xs-16">
					<div class="row">
						<h2 class="font-16 upgrade-heading center-text margin-top-0px">
							<i class="fa fa-video-camera fa-lg"></i>  Upload Video
						</h2>			
					</div>
				</div>
				<?php 
					
					if(isset($video_data['video_url']) && $video_data['video_url']!='')
					{
						preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video_data['video_url'], $match);
						$youtube_id = $match[1];
						
					?>
					
					
					
					
                    <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne_pad_btm_10px ne_pad_tp_10px">
					    <div class="">
                            <div class="xxl-16 xl-16 video-effect embed-responsive embed-responsive-16by9" id="setvideo">
								<object width="800" height="450" data="https://www.youtube.com/v/<?php echo $youtube_id;?>"></object>
								
							</div>
						</div>
					</div>
                    <?php }else{?>
					<div id="novideo" style="display:none">
						<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne_pad_btm_10px ne_pad_tp_10px">
							<div class="">
								<div class="xxl-16 xl-16 video-effect embed-responsive embed-responsive-16by9" id="setvideo">
									<iframe id="ytiframe" class="" width="740" height="400"  style="box-shadow:3px 3px 0 0 #ccc;" src=""  allowfullscreen></iframe>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
				<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne_pad_btm_10px ne_pad_tp_10px padding-0-5-xs">
					<div class="">
						<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne_photo_upload margin-top-10px padding-0-5-xs">							
							<div class="xxl-16 xl-16 xs-16 m-6 l-16 s-16 text-center margin-top-20 margin-bottom-20 margin-top-0-xs">	
								<a class="fileUpload btn btn-sm" style="background:#4D69A2;box-shadow:3px 3px 0 0 #e2e2e2;padding:10px 15px;" data-toggle="collapse" href="#collapse" aria-expanded="false" aria-controls="collapse">
									<i class="fa fa-link hidden-xs margin-top-10px margin-right-10" style="font-size:20px;"></i>
									<span class="text-white margin-right-10">
										Upload With Youtube link
									</span>
								<img width="23" height="23" class="hidden-xs" alt="" src="<?php echo $base_url; ?>assets/images/profile-completeness-arrow.png"></a>
								
								
								<div class="clearfix"></div>
								<br>
								<div id="respond_message"> </div>
								<div class="collapse margin-top-10 margin-bottom-20" id="collapse">									
									<div class="bg-border xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne_pad_tp_10px padding-bottom-10px margin-top-10px border-top	" style="background:#ededed;">
										<div class="xxl-16 xl-16 m-16 s-16 xs-16 ne_pad_tp_10px">
											<div class="row">
												<form  method="post" action="" id="upload_video" name="upload_video"> 
													<div class="form-group xxl-16 xl-16 m-16 s-16 l-16 xs-16">
														<div class="row">
															<div class="xxl-16 xl-16 m-16 s-16 l-16 xs-16 padding-lr-zero">
																
																<h4 class="font-14 text-darkgrey">Enter Your Youtube link Here</h4>
																
																
																<div class="xxl-16 xl-16 m-16 s-16 l-16 xs-16 margin-top-10px padding-lr-zero">
																	<textarea class="form-control" rows="4" style="box-shadow:3px 3px 0 0 #e2e2e2;" name="videoUrl" id="videoUrl"></textarea>
																</div>
															</div>
														</div>
													</div>
													
													<div class="xxl-16 xl-16 m-16 s-16 l-16 xs-16 padding-lr-zero">
														<a onclick="add_video()" class="btn btn-sm"><i class="fa fa-check"></i> Submit</a>
														<a class="btn btn-sm btn-danger" onclick="cancle_video()" data-dismiss="modal" data-target="#collapse" data-toggle="collapse"><i class="fa fa-close"></i> Cancel</a>
													</div>
												</form>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>   
			</div>
		</div>
		<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-4 hidden-lg hidden-md">
			<?php $this->load->view('front_end/mobile_my_profile_sidebar'); ?>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<div class="clearfix"></div>

<div class="clearfix"></div>
<!------------------<div class="container">----End------------------------------------>
<div class="margin-top-30">
	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id_temp" class="hash_tocken_id" />
	<?php
		$this->common_model->js_extra_code_fr.="	
		var config = {
		'.chosen-select' : {},
		'.chosen-select-deselect' : {allow_single_deselect:true},
		'.chosen-select-no-single' : {disable_search_threshold:10},
		'.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
		'.chosen-select-width' : {width:'100%'}
		}
		for (var selector in config) {
		$(selector).chosen(config[selector]);
		}		
		function change_img(id)
	{	
	var className = $('#img_'+id).attr('class');		
	if(className =='collapse-plus')
	{
	$('#img_'+id).attr('class','collapse-minus');
	}
	else
	{
	$('#img_'+id).attr('class','collapse-plus');				
	}
	}
	$(document).ready(function () {
	$('#test').BootSideMenu({
	side: 'left',
	pushBody:false,
	width: '250px'
	});
	$(".'"'."[data-toggle='tooltip']".'"'.").tooltip();
	});
	
	
	
	
	function youtube_link_validation(url) {
	var p = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:watch\?v=))((\w|-){11})(?:\S+)?$/;
	
	return (url.match(p)) ? true : false;
	}
	
	function cancle_video(){
	document.getElementById('videoUrl').value = '';
	}
	";
	?>
	
	<script type="text/javascript">
	function add_video(){
	var videoUrl = $('#videoUrl').val();
	
	if(videoUrl != '')
	{
	var matches = youtube_link_validation(videoUrl);
	}
	else
	{
	alert('Please enter youtube link..!!!')
	return false;
	}
	
	if(matches) {
	var hash_tocken_id = $('#hash_tocken_id').val();
	var base_url = $('#base_url').val();
	var url = base_url+'upload/add-video';
	
	//debugger;
	
	show_comm_mask();
	$.ajax({
	type: 'POST',
	url: url,
	data: {'videoUrl':videoUrl,'csrf_new_matrimonial':hash_tocken_id},
	dataType:"json",
	success: function(data)
	{ 	
	$('#respond_message').html(data.errmessage);
	$('#respond_message').slideDown();
	if(data.status == 'success')
	{
	$('#respond_message').addClass('alert alert-success');
	$('#videoUrl').val('');
	$('#novideo').show();
	window.setTimeout(function() 
	{
	$('#respond_message').hide();
	$('#respond_message').html('');
	location.reload();
	}, 2000);
	}
	else
	{
	$('#respond_message').addClass('alert alert-danger');
	}
	update_tocken(data.tocken);
	hide_comm_mask();
	},
	error: function (jqXHR, exception) {
	var msg = '';
	if (jqXHR.status == 404) {
	msg = 'Requested page not found. [404]';
	} else if (jqXHR.status == 500) {
	msg = 'Internal Server Error [500].';
	} else if (exception === 'parsererror') {
	msg = 'Requested JSON parse failed.';
	} else if (exception === 'timeout') {
	msg = 'A time out error occured. Please try again';
	} else if (exception === 'abort') {
	msg = 'Ajax request aborted.';
	} else {
	msg = 'Uncaught Error.\n' + jqXHR.responseText;
	}
	hide_comm_mask();
	alert(msg);
	},
	timeout: 8000
	
	});
	return false;
	}
	else
	{
	alert('Please enter youtube link only..!!!');
	}
	}
	</script>	