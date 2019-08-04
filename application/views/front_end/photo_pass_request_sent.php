<?php if(!isset($photo_pass_count) || $photo_pass_count =='')
{
	$photo_pass_count = 0;
}
?>
<!------------------<div class="container">----Start------------------------------------>
<div class="container margin-top-20 padding-lr-zero-xs">
	<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 margin-top-20 padding-0-5-xs">
		<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-5">
			<?php $this->load->view('front_end/my_profile_sidebar'); ?>
		</div>
		
		<div class="" id="main_content_ajax">
			<?php include_once('photo_pass_request_sent_ajax.php'); ?>
		</div>
		<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-4 hidden-lg hidden-md">
			<?php $this->load->view('front_end/mobile_my_profile_sidebar'); ?>
		</div>
	</div>
</div>

<!--------------------<div class="container">---End-------------------->
<div class="clearfix"></div>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id_temp" class="hash_tocken_id" />
<input type="hidden" name="base_url" value="<?php echo $base_url; ?>" id="base_url"/>
<input type="hidden" name="requester_id" value="" id="requester_id"/>
<input type="hidden" name="status_sent_recieve" value="" id="status_sent_recieve"/>
<?php
$this->common_model->js_extra_code_fr.="
	function delete_photo_reqeust(id,status)
	{
		$('#requester_id').val(id);
		$('#status_sent_recieve').val(status);
	}
	";
	$this->common_model->js_extra_code_fr.=" load_pagination_code_front_end(); ";
?>