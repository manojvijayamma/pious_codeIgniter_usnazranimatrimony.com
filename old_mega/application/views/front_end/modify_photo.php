<?php /*echo "<pre>";
	print_r($register_data);
echo "</pre>";*/
$gender = $this->common_front_model->get_session_data('gender');
$path_photos = $this->common_model->path_photos;
if($gender == 'Male')
{
	$defult_photo = $base_url.'assets/front_end/img/default-photo/male.gif';
}
else
{
	$defult_photo = $base_url.'assets/front_end/img/default-photo/female.gif';
}
if(isset($this->common_model->photo_upload_count))
{
	$photo_upload_count = $this->common_model->photo_upload_count;
}
if($photo_upload_count =='' || $photo_upload_count ==0 || $photo_upload_count > 8)
{
	$photo_upload_count = 8;
}
$photo_view_status = 1;
if(isset($register_data['photo_view_status']) && $register_data['photo_view_status'] !='')
{
	$photo_view_status = $register_data['photo_view_status'];
}
?>
<!------------------<div class="container">----Start------------------------------------>
<div class="container margin-top-20 padding-lr-zero-xs">
	<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-20 padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 padding-0-5-xs">
		<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-5">
			<?php $this->load->view('front_end/my_profile_sidebar'); ?>
		</div>
		<div class="xxl-12 xl-12 l-11 xs-16 m-16 s-16 ne_inbox_right_pan padding-lr-zero-320 margin-top-10px-320px padding-lr-zero-480 margin-top-10px-480px ne-mrg-top-10-768 padding-0-5-xs">
			<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 bg-border padding-lr-zero" style="padding:4px;">
				<div class="xxl-16 xl-16 m-16 s-16 l-16 xs-16 " style="padding:0px 4px;">
					<h3 class="upgrade-heading xxl-16 xl-16 l-16 s-16 m-16 font-16 margin-top-0px margin-bottom-0px padding-lr-zero-320">
						<i class="fa fa-file-image-o"></i> Upload Photo
					</h3>
				</div>
				<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 padding-bottom-10px"></div>
				<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 margin-top-10px">
					<div class="row">
						<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 padding-lr-zero">
							<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16"> 
								<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16">
									<h3 class="ne_font_weight_nrm font-18 xxl-16 xl-16 l-16 m-16 xs-16 s-16 center-text">
										<b><span class="text_slider">Upload Your Profile Picture Here</span></b>
									</h3>
								</div>
							</div>
							<div class="clearfix"></div>
							<hr>
							
							<div class="xxl-10 xl-10 l-10 m-16 s-16 xs-16 ne_photo_upload margin-top-10px border-right" data-toggle="modal" data-target="#myModal_pic" onClick="set_photo_number(1)">
								<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16">
									<div class="row">
										<center><a class="btn btn-lg" style="background:#F58220 !important;box-shadow:3px 3px 0 0 #e2e2e2;"><i class="fa fa-upload"></i> Upload Photo <img width="23" height="23" alt="" src="<?php echo $base_url; ?>assets/front_end/images/icon/profile-arrow.png"></a></center>
									</div>
								</div>
							</div>
                            <div class="xxl-6 xl-6 l-6 m-16 s-16 xs-16 margin-top-20px ">
                            	<select class="form-control" id="view_photo" name="view_photo" onChange="update_photo_status()">
                                    <option <?php if(isset($photo_view_status) && $photo_view_status == 1){ echo 'selected';} ?> value="1" selected>View To All</option>
                                    <option <?php if(isset($photo_view_status) && $photo_view_status == 0){ echo 'selected';} ?> value="0" >Hide For All</option>
                                    <option <?php if(isset($photo_view_status) && $photo_view_status == 2){ echo 'selected';} ?> value="2" >Only For Upgrade Members</option>
								</select>
							</div>
						</div>
						
						<div id="myModal_pic" class="modal fade" role="dialog">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title"><i class="fa fa-file-image-o"></i> Upload Image</h4>
									</div>
									<div class="modal-body padding-0-5-xs">
                                    	<div class="container_photo">
                                        	<div class="row">
                                                <div class="col-md-12" style="padding:10px;">
                                                    <div id="response_message"></div>
												</div>
											</div>
											<div class="imageBox" style="display:none">
												<div class="mask"></div>
												<div class="thumbBox"></div>
												<div class="spinner" style="display: none">Loading...</div>
											</div>
											<div class="tools clearfix">
												<span class="show_btn" id="rotateLeft">rotate Left</span>
												<span class="show_btn" id="rotateRight">rotate Right</span>
												<span class="show_btn" id="zoomOut">zoom In</span>
												<span class="show_btn" id="zoomIn">zoom Out</span>
												<div class="upload-wapper">
													Browse Image
													<input type="file" id="upload_file" value="Upload" />
												</div>
												<span class="show_btn" id="crop" style="background-color: rgb(7, 90, 133); margin-left: 5px; display: inline;">Crop</span>
												
												<input type="hidden" id="croped_base64" name="croped_base64" value="" />
												<input type="hidden" id="orig_base64" name="orig_base64" value="" />
												<input type="hidden" id="photo_number" name="photo_number" value="" />
												
											</div>
											<span class="show_btn">Drag image and select proper image</span>
											<div class="tools clearfix">
											</div>
										</div>
										<div class="row">
                                            <div class="col-md-12" style="padding:10px;">
                                                <div id="croped_img"></div>
											</div>
										</div>
									</div>
                                    
									<div class="clearfix"></div>
									<div class="modal-footer margin-top-10">
										<a onClick="update_photo()" id="upload_btn" class="btn btn-sm"><i class="fa fa-upload"></i> Upload</a>
										<a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</a>
									</div>
								</div>
							</div>
						</div>
						
						<form method="post" action="#" id="profile_image" name="profile_image">
							<div class="xxl-5 xxl-margin-left-0 xl-5 xl-margin-left-0 l-5 l-margin-left-0 xs-16 s-8 xs-margin-left-4 margin-top-10px-320px m-5 m-marging-left-0 l-5 l-margin-left-0 margin-top-10px-480px photo" id="demo_photo"></div>
						</form> 
					</div>
				</div>
				<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 ne_font_12 margin-top-10 text-red">
					<b>(Note:-</b>Photo must be in .JPG, .GIF or .PNG format, not larger than 3 MB.)
				</div>
				<div class="clearfix"></div>
				<hr>
				<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 ne_pad_tp_10px padding-bottom-10px margin-bottom-20px text-center-xs">
					<input type="hidden" id="defult_photo_url" value="<?php echo $defult_photo; ?>" />
					<div class="row">
						<?php
							for($ij=1;$ij<=$photo_upload_count;$ij++)
							{
								$photo_clm = 'photo'.$ij;
							?>
							<div class="xxl-4 xl-4 l-8 m-8 xs-8 s-8">
								<div class="img-thumbnail" style="box-shadow:3px 3px 0 0 #e2e2e2;">
									<?php
										if(isset($register_data[$photo_clm]) && $register_data[$photo_clm] !='' && file_exists($path_photos.$register_data[$photo_clm]))
										{
										?>
										<img id="member_photo_<?php echo $ij; ?>" src="<?php echo $base_url.$path_photos.$register_data[$photo_clm];?>" class="img-responsive"  style="width:160px; height:160px;" />
										<?php }
										else
										{ ?>
										<img id="member_photo_<?php echo $ij; ?>" src="<?php echo $defult_photo;?>" class="img-responsive" style="width:160px; height:160px;" />
										<?php
										} 
									?>
									<div class="dropdown margin-top-5">
										<a class="btn btn-sm btn-block dropdown-toggle" data-toggle="dropdown" onClick="return show_btn()"><i class="fa fa-cog"> Action </i> <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li onClick="set_photo_number('<?php echo $ij; ?>')" data-toggle="modal" data-target="#myModal_pic" class="text-grey"><a href="#" class="font-darkblue"><i class="fa fa-edit margin-right-5"></i> Edit</a></li>
											<?php
												$display_del = 'none';
												if(isset($register_data[$photo_clm]) && $register_data[$photo_clm] !='' && file_exists($path_photos.$register_data[$photo_clm]))
												{
													$display_del='';
												}
											?>		
											<li id="photo_delete_btn_<?php echo $ij; ?>" style="display:<?php echo $display_del; ?>" onClick="set_photo_number_del('<?php echo $ij; ?>')" ><a href="javascript:;" data-toggle="modal" data-target="#myModal_delete" class="text-red"><i class="fa fa-trash margin-right-10 font-15"></i>Delete</a></li>
											<li id="photo_profile_btn_<?php echo $ij; ?>" style="display:<?php echo $display_del; ?>" onClick="set_profile_pic('<?php echo $ij; ?>')" ><a class="font-darkblue" href="javascript:;">Set As Profile Pic</a></li>
										</ul>
									</div>
								</div>
							</div>
							<?php
								if($ij%4 == 0)
								{
								?>
							</div>
							<div class="clearfix"></div>
							<div class="row margin-top-30px margin-top-15-xs"></div>
                            <div class="row">
								<?php
								}
							}
						?>
					</div>         
					<div class="clearfix"></div>					
					<div class="row margin-top-30px margin-top-15-xs">
					</div>
				</div>
				<?php //}?>
				<div class="clearfix"></div>
				
				<div id="myModal_delete" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/alert.png" alt="" class="" /> Delete This Saved Profile Picture</h4>
							</div>
							<div class="modal-body padding-20-5-xs">
								<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16">
                                	<div id="delete_photo_message">
									</div>
									<div id="delete_photo_alt" class="alert alert-danger" style="overflow:hidden;box-shadow:4px 4px 0 0 #ccc;">
										<div class="xxl-2 xl-2 l-2 m-16 xs-16 s-16 margin-top-10">
											<img src="<?php echo $base_url; ?>assets/front_end/images/icon/user-detele.png" alt="" class="margin-right-10" />
										</div>
										<div class="xxl-13 xl-13 l-13 m-16 xs-16 s-16 xxl-margin-left-1 xl-margin-left-1">
											<strong>Are you sure you want to Remove this Profile Picture?</strong><br />
											<span class="small">This Profile Picture will be Deleted Permanently from your saved Profile Picture.</span>
										</div>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="modal-footer margin-top-10">
                            	<div id="delete_button">
                                    <a class="btn btn-sm btn-success" onClick="delete_photo()"><i class="fa fa-check" ></i> Yes</a>
                                    <a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> No</a>
								</div>
                                <div id="delete_button_close">
                                    <a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</a>
								</div>
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

<!------------------<div class="container">----End------------------------------------>
<div class="clearfix"></div>

<div class="clearfix"></div>
<div class="margin-top-30"></div>
<?php
	$this->common_model->js_extra_code_fr.="
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
	
	var imageupload = $('.imageupload');
	imageupload.imageupload();
	$('#imageupload-disable').on('click', function() {
	imageupload.imageupload('disable');
	$(this).blur();
	})
	
	$('#imageupload-enable').on('click', function() {
	imageupload.imageupload('enable');
	$(this).blur();
	})
	
	$('#imageupload-reset').on('click', function() {
	imageupload.imageupload('reset');
	$(this).blur();
	});
	
	$(document).ready(function(){
	$(".'"'."[data-toggle='tooltip']".'"'.").tooltip(); 	
	$('#test').BootSideMenu({
	side: 'left',
	pushBody:false,
	width: '250px'
	});
	});
	
	function show_btn(){
	$('#upload_btn').hide();
	}
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
	";
?>