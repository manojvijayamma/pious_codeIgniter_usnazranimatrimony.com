<!------------------<div class="container">----Start------------------------------------>
<div class="container padding-lr-zero-xs">
	<!--<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-0-5-xs">
		<div class="">
		<img src="<?php echo $base_url; ?>assets/front_end/images/icon/register-header-female.jpg" class="full-width img-thumbnail" alt=""/> 
		</div>
	</div>-->
	<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 margin-top-20 padding-0-5-xs">
		<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-5">
			<?php $this->load->view('front_end/my_profile_sidebar'); ?>
		</div>
		
		<div class="xxl-12 xl-12 l-11 xs-16 m-16 s-16 padding-lr-zero-320 margin-top-10px-320px padding-lr-zero-480 margin-top-10px-480px ne-mrg-top-10-768 padding-0-5-xs">
			<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 bg-border padding-lr-zero" style="padding:4px;position:relative;">
				<div class="xxl-16 xl-16 m-16 s-16 l-16 xs-16 " style="padding:0px 4px;">
					<h3 class="upgrade-heading text-center font-18 xxl-16 xl-16 l-16 s-16 m-16 font-16 margin-top-0px margin-bottom-0px padding-lr-zero-320">
						<i class="fa fa-floppy-o ne_mrg_ri8_10"></i>Saved Searches
					</h3>
				</div>
				<!------- for search result ----->
            	<div class="" id="main_content_ajax">
					<?php include_once('saved_searches_member_profile.php'); ?>
				</div>
				
				<!------ for search result ------>           
			</div>
			
			<div class="clearfix"></div>
			<?php $this->load->view('front_end/member_slider_footer'); ?>
			<div class="clearfix"></div>
		</div>
		<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-4 hidden-lg hidden-md">
			<?php $this->load->view('front_end/mobile_my_profile_sidebar'); ?>
		</div>
	</div>
</div>

<div id="myModal_delete" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<input type="hidden" name="saved_search_id" id="saved_search_id" value="" />
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title"><img src="<?php echo $base_url; ?>assets/front_end/images//icon/alert.png" alt="" class="" /> Delete This Saved Search</h4>
			</div>
			<div class="modal-body">
			<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16">
			<div class="alert alert-danger" style="overflow:hidden;box-shadow:4px 4px 0 0 #ccc;">
			<div class="xxl-2 xl-2 l-2 m-16 xs-16 s-16">
			<img src="<?php echo $base_url; ?>assets/front_end/images//icon/user-detele.png" alt="" class="margin-right-10" />
			</div>
			<div class="xxl-13 xl-13 l-13 m-16 xs-16 s-16 xxl-margin-left-1 xl-margin-left-1 margin-top-10">
			<strong>Are you sure you want to Remove this Saved Search?</strong><br />
			<span class="small">This Profile will be remove Permanently from your saved Records.</span>
			</div>
			</div>
			</div>
			</div>
			<div class="clearfix"></div>
			<div class="modal-footer margin-top-10">
			<a class="btn btn-sm btn-success" href="javascript:;" onClick="delete_saved_search()"><i class="fa fa-check"></i> Yes</a>
			<a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> No</a>
			</div>
			</div>
			</div>
			</div>
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
			$('.button-wrap').on('click', function(){
			$(this).toggleClass('button-active');
			});
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
			
			load_pagination_code_front_end(); ";
			?>			