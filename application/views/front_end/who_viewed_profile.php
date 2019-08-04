<div class="clearfix"></div>
<div class="container margin-top-20 padding-lr-zero-xs">
	<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 padding-lr-zero margin-top-20 padding-0-5-xs">
		<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-5">
			 <?php $this->load->view('front_end/my_profile_sidebar'); ?>
		</div>
		<div class="xxl-12 xl-12 l-11 xs-16 m-16 s-16 padding-lr-zero-320 margin-top-10px-320px padding-lr-zero-480 margin-top-10px-480px ne-mrg-top-10-768 padding-0-5-xs">
			<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 bg-border padding-lr-zero" style="padding:4px;position:relative;">
				<div class="xxl-16 xl-16 m-16 s-16 l-16 xs-16 " style="padding:0px 4px;">
					<h3 class="upgrade-heading text-center font-18  xxl-16 xl-16 l-16 s-16 m-16 font-16 margin-top-0px margin-bottom-0px padding-lr-zero-320">
						<i class="fa fa-eye ne_mrg_ri8_10"></i> Members, Who Viewed My Profile
					</h3>
				</div>
				<!-------for ajax load member result ----->
            	<div class="" id="main_content_ajax">
					<?php include_once('short_listed_member_profile.php'); ?>
				</div>
           	   <!------for ajax load member result------>          
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
<div class="clearfix"></div>

<div class="clearfix"></div>
<!------------------<div class="container">----End------------------------------------>
<div class="margin-top-30"></div>
<?php
	$this->common_model->js_extra_code_fr.="
	$('.button-wrap').on('click', function(){
		$(this).toggleClass('button-active');
		$(".'"'."[data-toggle='tooltip']".'"'.").tooltip(); 
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
	load_choosen_code(); 
	load_pagination_code_front_end();
	";
?>