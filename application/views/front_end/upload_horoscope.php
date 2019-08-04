<?php
	$gender = $this->common_front_model->get_session_data('gender');
	$path_horoscope = $this->common_model->path_horoscope;
	if(isset($register_data['horoscope_photo']) && $register_data['horoscope_photo'] !='')
	{
		$horoscope_photo = $register_data['horoscope_photo'];
	}
	$defult_photo = $base_url.'assets/front_end/images/icon/no-image.jpg';
	
?>
<!------------------<div class="container">----Start------------------------------------>
<div class="container margin-top-10 padding-lr-zero-xs">
	<!--<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-0-5-xs">
		<div class="">
		<img src="<?php // echo $base_url; ?>assets/front_end/images/icon/header-banner.jpg" class="full-width img-thumbnail" alt=""> 
		</div>
	</div>-->
	<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 margin-top-20px padding-0-5-xs">
		<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-5">
			<?php $this->load->view('front_end/my_profile_sidebar'); ?>
		</div>
		
		<div class="st-tabs">
			<div class="xxl-12 xl-12 l-12 xs-16 m-16 s-16 ne_inbox_right_pan padding-lr-zero-320 margin-top-10px-320px padding-lr-zero-480 margin-top-10px-480px ne-mrg-top-10-768 padding-0-5-xs">
				<ul class="nav nav-tabs" role="tablist">					
					<li role="presentation" class="active"><a href="#h-upload" aria-controls="h-upload" role="tab" data-toggle="tab"><i class="fa fa-upload font-16 margin-right-5"></i> Upload <span class="hidden-xs">Horoscope</span></a></li>
				</ul>
				<div class="tab-content" style="overflow:hidden;">
					<div role="tabpanel" class="tab-pane active" id="h-upload">
						<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 bg-border padding-lr-zero padding-lr-zero-480 border-top" style="padding:4px !important;">
							<div class="xxl-16 xl-16 m-16 s-16 l-16 xs-16">
								<div class="row">
									<h2 class="font-18 upgrade-heading  center-text margin-top-0px" style="text-shadow:2px 2px 1px rgba(203, 203, 203, 1);padding:5px 0;">
										<img src="<?php echo $base_url; ?>assets/front_end/images/icon/astrology.png" alt=""/> Upload Horoscope
									</h2>			
								</div>
							</div>
							<div class="clearfix"></div>
							
							<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne_photo_upload margin-top-10px">							
								<center>
									<div class="xxl-16 xl-16 xs-16 m-6 l-16 s-16">
										<form method="post" name="horoscope_photo_form" id="horoscope_photo_form" enctype="multipart/form-data" action="<?php echo $base_url; ?>upload/upload-horoscope-photo" >
											<div class="reponse_photo"></div>
											<a class="fileUpload btn btn-sm active font-15 bold text-white" style="background:#F58220;box-shadow:3px 3px 0 0 #e2e2e2;"><img src="<?php echo $base_url;?>assets/front_end/images/add-photo-comp.gif" width="23" height="30"  alt="" style="padding-top:6px;"> Upload from My Computer 
												<input type="file" id="horoscope_photo" name="horoscope_photo"  class="upload xxl-16 xs-16 m-16 xs-16 padding-top-10px padding-bottom-10px" style="padding:5px;cursor:pointer;height:100%;" />
												
												<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id"  class="hash_tocken_id" />
												<input type="hidden" name="is_post" value="1" />
												<input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />
											<img class="hidden-sm hidden-xs" width="23" height="23"  alt="" src="<?php echo $base_url; ?>assets/front_end/images/icon/profile-completeness-arrow.png"></a> 
										</form>
									</div>
								</center>
								
								<div class="clearfix"></div>
							</div>
                            <div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 ne_font_12 margin-top-10 text-red" align="center">
								<b>(Note:-</b>Photo must be in .JPG, .GIF or .PNG format, not larger than 3MB.)
							</div>
							<div class="clearfix"></div>
							<hr>
							
							<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne_pad_btm_10px ne_pad_tp_10px margin-bottom-20px">
								<div class="row">
									<div class="xxl-14 xxl-margin-left-1 xl-14 xl-margin-left-1 video-effect">
										<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
											<center>
												<input type="hidden" id="defult_photo_url" value="<?php echo $defult_photo; ?>" />
                                                <?php if(isset($horoscope_photo) &&  $horoscope_photo!='')
													{?>
													<img id="blah" src="<?php echo $base_url.$path_horoscope.$horoscope_photo;?>" class="blah border img-responsive" alt="your image" style="box-shadow: 0 5px 11px 0 rgba(0,0,0,.18), 0 4px 15px 0 rgba(0,0,0,.15);margin:12px 12px;" />
													<?php }else{
													?>
													<div id="no_horo_msg"> <h4 class="text-darkgrey">No horoscope Image available</h4></div>
												<img id="blah" src="<?php echo $defult_photo;?>" class="blah border img-responsive" alt="your image" style="box-shadow: 0 5px 11px 0 rgba(0,0,0,.18), 0 4px 15px 0 rgba(0,0,0,.15);margin:12px 12px;" /><?php }?>
                                                
                                                <?php
													$display_del = 'none';
													if(isset($horoscope_photo) &&  $horoscope_photo!='')
													{
														$display_del='';
													}
												?>	
												<div onClick="set_horoscope_photo_del()" id="photo_delete_btn" style="display:<?php echo $display_del; ?>;"><a href="javascript:;" data-toggle="modal" data-target="#myModal_delete" class="text-red"><i class="fa fa-trash margin-right-10 font-15"></i>Delete Horoscope Photo</a></div>
											</center>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-4 hidden-lg hidden-md">
				<?php $this->load->view('front_end/mobile_my_profile_sidebar'); ?>
			</div>
		</div>
        <div id="myModal_delete" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						
						<h4 class="modal-title"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/alert.png" alt="" class="" /> Delete This Saved Horoscope Photo</h4>
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
							<strong>Are you sure you want to Remove this horoscope Photo?</strong><br />
							<span class="small">This Horoscope Photo will be Deleted Permanently.</span>
							</div>
							</div>
							</div>
							</div>
							<div class="clearfix"></div>
							<div class="modal-footer margin-top-10">
							<div id="delete_button">
							<a class="btn btn-sm btn-success" onClick="delete_horoscope_photo()"><i class="fa fa-check" ></i> Yes</a>
							<a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> No</a>
							</div>
							<div id="delete_button_close" style="display:none;">
							<a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</a>
							</div>
							</div>
							</div>
							</div>
							</div>
							<div class="clearfix"></div>
							<hr>
							</div>
							</div>
							<div class="clearfix"></div>
							
							<div class="clearfix"></div>
							<!------------------<div class="container">----End------------------------------------>
							<div class="margin-top-30"></div>
							<?php
							$this->common_model->js_extra_code_fr.="var config = {
							'.chosen-select' : {},
							'.chosen-select-deselect' : {allow_single_deselect:true},
							'.chosen-select-no-single' : {disable_search_threshold:10},
							'.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
							'.chosen-select-width' : {width:'100%'}
							}
							for (var selector in config) {
							$(selector).chosen(config[selector]);
							}
							function myFunction() {
							var x = document.getElementById('myDIV');
							if (x.style.display === 'none') {
							x.style.display = 'block';
							} else {
							x.style.display = 'none';
							}
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
							$('#myDIV').hide();
							$('#test').BootSideMenu({
							side: 'left',
							pushBody:false,
							width: '250px'
							});
							$(".'"'."[data-toggle='tooltip']".'"'.").tooltip(); 
							})
							$('#horoscope_photo').on('change', function(e)
							{
							var reader = new FileReader();
							var size = this.files[0].size;
							var name = this.files[0].name;
							var size_mb = size/(1024*1024);
							if(size_mb > 3.1)
							{
							alert('Please Upload max file upload upto 3MB');
							$('#horoscope_photo').val('');
							return false;
							}
							else
							{
							var ext = $('#horoscope_photo').val().split('.').pop().toLowerCase();
							if($.inArray(ext, ['gif','png','jpg','jpeg','bmp']) == -1)
							{
							alert( 'Please upload Valid image file like png, jpg ,jpeg ,bmp and gif allow.');
							$('#horoscope_photo').val('');
							return false;
							}
							else
							{
							var after_upload_url = window.URL.createObjectURL(this.files[0]);
							var form_data = new FormData(document.getElementById('horoscope_photo_form'));
							var action = $('#horoscope_photo_form').attr('action');
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
							}, 10000);
							$('#hash_tocken_id_temp').remove();
							$('#photo_delete_btn').show();
							$('#no_horo_msg').hide();
							document.getElementById('blah').src = after_upload_url;
							}
							else
							{
							$('.reponse_photo').addClass('alert alert-danger');
							}
							update_tocken(data.tocken);
							hide_comm_mask();
							$('#horoscope_photo').val('');
							}
							});
							}
							}
							})
							function set_horoscope_photo_del()
							{
							$('#delete_photo_alt').show();
							$('#delete_photo_message').hide();
							$('#delete_photo_message').html('');
							$('#delete_button').show();
							$('#delete_button_close').hide();
							}
							function delete_horoscope_photo()
							{
							$('#delete_photo_message').removeClass('alert alert-success alert-danger alert-warning');
							$('#delete_photo_message').html('');
							
							var base_url = $('#base_url').val();
							var hash_tocken_id = $('#hash_tocken_id').val();
							var url_load = base_url+ 'upload/delete-horoscope-photo';
							show_comm_mask();
							$.ajax({
							url: url_load,
							type: 'post',
							dataType:'json',
							data: {'csrf_new_matrimonial':hash_tocken_id,'delete_horoscope_photo':'delete'},
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
							$('#no_horo_msg').show();
							}
							else
							{
							$('#delete_photo_message').addClass('alert alert-danger');
							}
							update_tocken(data.tocken);
							hide_comm_mask();
							}
							});
							};";
							?>							