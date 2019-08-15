<!------------------<div class="container">----Start------------------------------------>
<div class="container padding-lr-zero-xs">
	<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-20 padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 padding-lr-zero">
		<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-5">
			<?php $this->load->view('front_end/my_profile_sidebar'); ?>
		</div>
		<div class="xxl-12 xl-12 l-11 xs-16 m-16 s-16 ne_inbox_right_pan padding-lr-zero-320 margin-top-10px-320px padding-lr-zero-480 margin-top-10px-480px ne-mrg-top-10-768 padding-lr-zero-xs">
			<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 bg-border padding-lr-zero ne_pad_tp_10px" style="padding-top:4px;">
            	<div id="reponse_match_making_form"></div>
				<div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16" style="padding:0px 4px;">
					<h2 class="font-16 upgrade-heading center-text margin-top-0px" style="padding:5px 0;">
						<img src="<?php echo $base_url; ?>assets/front_end/images/icon/couple-match.png" class="" alt=""/> Received Match From Admin
					</h2>
				</div>
				<div id="main_content_ajax">
					<?php include('received_match_result_from_admin.php'); ?>
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
<!------------------<div class="container">----End------------------------------------>
<<div class="margin-top-30"></div>
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

load_pagination_code_front_end();
";
?>