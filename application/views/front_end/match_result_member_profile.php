<?php if(!isset($member_total_count) && !isset($member_data)){
	$member_total_count = $this->matches_model->get_search_count();
	$member_data = $this->matches_model->get_search_result(1);
}
if(!isset($member_total_count) || $member_total_count =='')
{
	$member_total_count = 0;
}
?>
<div class="row">
	<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-lr-zero-320 padding-lr-zero-480 margin-top-10px-320px margin-top-10px-480px ne-mrg-top-10-768 padding-lr-zero-768 padding-0-5-xs">
<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-15px bg-border">
<div class="row ne-bdr-btm-lgt-grey ne_pad_btm_10px">
    <h3 class="xxl-6 xl-6 l-6 xs-16 m-7 s-16 ne_font_weight_nrm margin-top-10px">
        <i class="fa fa-search"></i> Match Result found(<?php echo $member_total_count; ?>)
    </h3>
</div>
<div class="clearfix"></div>
<?php include('search_result_member_profile_inc.php'); ?>
<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 tp-pagination margin-top-20">
<!-- for pagination-->
<?php
	if(isset($member_total_count) && $member_total_count !='' && $member_total_count > 0)
	{
		echo $this->common_model->rander_pagination_front('matches/search-now/',$member_total_count);
	}
?>
<!-- for pagination-->
</div>
</div>
<div class="clearfix"></div>
</div>
</div>
<?php include_once('page_part/common_front_button_ajaxcode.php'); ?>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id_temp" class="hash_tocken_id" />