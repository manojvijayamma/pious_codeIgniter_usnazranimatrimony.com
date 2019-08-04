<?php
	$gender = $this->common_front_model->get_session_data('gender');
	$path_cover_photo = $this->common_model->path_cover_photo;
	if(isset($register_data['cover_photo']) && $register_data['cover_photo'] !='')
	{
		$cover_photo = $register_data['cover_photo'];
	}
	$defult_photo = $base_url.$path_cover_photo."cover_photo1.png";//'assets/front_end/images/icon/no-image.jpg';
	
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
						<i class="fa fa-file-image-o"></i> Upload Cover Photo
					</h3>
				</div>
				<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 padding-bottom-10px">
					
				</div>
				<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 margin-top-10px">
					<div class="row">
						<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 padding-lr-zero">
							<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16"> 
								<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16">
									<h3 class="ne_font_weight_nrm font-18 xxl-16 xl-16 l-16 m-16 xs-16 s-16 center-text">
										<b><span class="text_slider">Upload Your Cover Photo Here</span></b>
									</h3>
								</div>
							</div>
						</div>
						
						<div class="clearfix"></div>
						
						<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne_photo_upload margin-top-10px">							
							<center>
								<div class="xxl-16 xl-16 xs-16 m-6 l-16 s-16">
                                    <form method="post" name="cover_photo_form" id="cover_photo_form" enctype="multipart/form-data" action="<?php echo $base_url; ?>upload/upload-cover-photo" >
										<div class="reponse_photo"></div>
										<a class="fileUpload btn btn-sm active font-15 bold text-white" style="background:#F58220;box-shadow:3px 3px 0 0 #e2e2e2;"><img src="<?php echo $base_url;?>assets/front_end/images/add-photo-comp.gif" width="23" height="30"  alt="" style="padding-top:6px;"> Upload from My Computer
											
											<input type="file" id="cover_photo" name="cover_photo" class="upload xxl-16 xs-16 m-16 xs-16 padding-top-10px padding-bottom-10px" style="padding:5px;cursor:pointer;height:100%;" />
											
											<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id"  class="hash_tocken_id" />
											
											<input type="hidden" name="is_post" value="1" />
											<input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />
										<img class="hidden-sm hidden-xs" width="23" height="23"  alt="" src="<?php echo $base_url; ?>assets/front_end/images/icon/profile-completeness-arrow.png"></a> </form>
								</div> 
								
							</center>
							
							<div class="clearfix"></div>
						</div>
						<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 ne_font_12 margin-top-10 text-red" align="center">
							<b>(Note:-</b>Photo must be in .JPG, .GIF or .PNG format, not larger than 3MB.)</br>
							The optimal size for cover photo is 1,110 x 370 pixels.
						</div>
						<div class="clearfix"></div>
						<hr>
						
						<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne_pad_btm_10px ne_pad_tp_10px  margin-bottom-20px">
							<div class="row">
								<div class="xxl-14 xxl-margin-left-1 xl-14 xl-margin-left-1 margin-bottom-20px">
									<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-20px" id="main_content_ajax"> 
										<center>
											<input type="hidden" id="defult_photo_url" name="defult_photo_url" value="<?php echo $defult_photo; ?>" />
											<?php if(isset($cover_photo) &&  $cover_photo!='')
												{?>
												<img id="blah" src="<?php echo $base_url.$path_cover_photo.$cover_photo;?>" class="blah border img-responsive" alt="your image" style="box-shadow: 0 5px 11px 0 rgba(0,0,0,.18), 0 4px 15px 0 rgba(0,0,0,.15);margin:12px 12px;" />
                                                <?php }else{
												?>
                                                <!-- <div id="no_cover_msg"> <h4 class="text-darkgrey">No cover photo available</h4></div> -->
											<img id="blah" src="<?php echo $defult_photo;?>" class="blah border img-responsive" alt="your cover image" style="box-shadow: 0 5px 11px 0 rgba(0,0,0,.18), 0 4px 15px 0 rgba(0,0,0,.15);margin:12px 12px;" /><?php }?>
											
											<?php
												$display_del = 'none';
												if(isset($cover_photo) &&  $cover_photo!='')
												{
													$display_del='';
												}
											?>	
											<div onClick="set_cover_photo_del()" id="photo_delete_btn" style="display:<?php echo $display_del; ?>;"><a href="javascript:;" data-toggle="modal" data-target="#myModal_delete" class="text-red"><i class="fa fa-trash margin-right-10 font-15"></i>Delete Cover Photo</a></div>
										</center>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
			<hr>
			<?php //}?>
			<div class="clearfix"></div>
			<div id="myModal_delete" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							
							<h4 class="modal-title"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/alert.png" alt="" class="" /> Delete This Saved Cover Photo</h4>
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
										<strong>Are you sure you want to Remove this cover Photo?</strong><br />
										<span class="small">This Cover Photo will be Deleted Permanently.</span>
									</div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="modal-footer margin-top-10">
							<div id="delete_button">
								<a class="btn btn-sm btn-success" onClick="delete_cover_photo()"><i class="fa fa-check" ></i> Yes</a>
								<a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> No</a>
							</div>
							<div id="delete_button_close" style="display:none;">
								<a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</a>
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
</div>

<!------------------<div class="container">----End------------------------------------>
<div class="clearfix"></div>
<div class="margin-top-30"></div>

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
	
	$('#cover_photo').on('change', function(e)
	{
	var reader = new FileReader();
	var size = this.files[0].size;
	var name = this.files[0].name;
	var size_mb = size/(1024*1024);
	if(size_mb > 3.1)
	{
	alert('Please Upload max file upload upto 3MB');
	$('#cover_photo').val('');
	return false;
	}
	else
	{
	var ext = $('#cover_photo').val().split('.').pop().toLowerCase();
	if($.inArray(ext, ['gif','png','jpg','jpeg','bmp']) == -1)
	{
	alert( 'Please upload Valid image file like png, jpg ,jpeg ,bmp and gif allow.');
	$('#cover_photo').val('');
	return false;
	}
	else
	{
	var after_upload_url = window.URL.createObjectURL(this.files[0]);
	var form_data = new FormData(document.getElementById('cover_photo_form'));
	var action = $('#cover_photo_form').attr('action');
	show_comm_mask();
	$.ajax({
	url: action,
	type: 'POST',
	data: form_data,
	cache: false,
	dataType: 'json',
	processData: false,
	contentType: false,
	success: function(data)
	{ 	
	$('.reponse_photo').removeClass('alert alert-success alert-danger alert-warning');
	$('.reponse_photo').html(data.errmessage);
	$('.reponse_photo').slideDown();
	
	if(data.status == 'success')
	{
	$('.reponse_photo').addClass('alert alert-success');
	setTimeout(function() {
	$('.reponse_photo').fadeOut('fast');
	}, 4000);
	$('#hash_tocken_id_temp').remove();
	$('#photo_delete_btn').show();
	$('#no_cover_msg').hide();
	document.getElementById('blah').src = after_upload_url;
	}
	else
	{
	$('.reponse_photo').addClass('alert alert-danger');
	}
	update_tocken(data.tocken);
	hide_comm_mask();
	$('#cover_photo').val('');
	}
	});
	}
	}
    })
	function set_cover_photo_del()
	{
	$('#delete_photo_alt').show();
	$('#delete_photo_message').hide();
	$('#delete_photo_message').html('');
	$('#delete_button').show();
	$('#delete_button_close').hide();
	$('#no_cover_msg').hide();
	}
	function delete_cover_photo()
	{
	$('#delete_photo_message').removeClass('alert alert-success alert-danger alert-warning');
	$('#delete_photo_message').html('');
	
	var base_url = $('#base_url').val();
	var hash_tocken_id = $('#hash_tocken_id').val();
	var url_load = base_url+ 'upload/delete-cover-photo';
	show_comm_mask();
	$.ajax({
	url: url_load,
	type: 'post',
	dataType:'json',
	data: {'csrf_new_matrimonial':hash_tocken_id,'delete_cover_photo':'delete'},
	success:function(data)
	{
	$('#delete_photo_message').html(data.errmessage);
	$('#delete_photo_message').slideDown();
	if(data.status =='success')
	{
	$('#delete_photo_message').addClass('alert alert-success');
	$('#blah').attr('src',$('#defult_photo_url').val());
	$('#delete_photo_alt').hide();
	$('#delete_button_close').show();
	$('#delete_button').hide();
	$('#photo_delete_btn').hide();
	$('#no_cover_msg').show();
	}
	else
	{
	$('#delete_photo_message').addClass('alert alert-danger');
	}
	update_tocken(data.tocken);
	hide_comm_mask();
	}
	});
	}
	";
	?>	