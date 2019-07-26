<?php
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
        <i class="fa fa-search"></i> Search Result Found (<?php echo $member_total_count; ?>)
    </h3>
    <div class="xxl-4 xl-4 l-4 xs-16 m-8 s-16 pull-right">
        <select class="form-control" style="border:1px solid #dfe0e3;" name="search_order" id="search_order" onChange="change_sort()">
        	<?php
				$search_order = 'latest_first';
				if(isset($_REQUEST['search_order']) && $_REQUEST['search_order'] !='')
				{
					$search_order = $_REQUEST['search_order'];
				}
			?>
            <option <?php if(isset($search_order) && $search_order =='latest_first'){ echo 'selected';} ?> value="latest_first">Latest First</option>
            <option <?php if(isset($search_order) && $search_order =='latest_last'){ echo 'selected';} ?> value="latest_last">Oldest First</option>
            <option <?php if(isset($search_order) && $search_order =='last_login_first'){ echo 'selected';} ?> value="last_login_first">Latest Login First</option>
            <option <?php if(isset($search_order) && $search_order =='last_login_last'){ echo 'selected';} ?> value="last_login_last">Last Login First</option>
        </select>
    </div>
</div>
<div class="clearfix"></div>
<div id="remove_left_panel_message" role="alert" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 alert margin-top-20" style="background:#fcf8e3;border:1px solid #faebcc; color: #8a6d3b;">
    <p class="margin-top-10px margin-bottom-10px">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        You can refine your search with left panel and get perfect search result.
    </p>
</div>
<?php include('search_result_member_profile_inc.php'); ?>
</div>

<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 tp-pagination margin-top-20">
<!-- for pagination-->
<?php
	if(isset($member_total_count) && $member_total_count !='' && $member_total_count > 0)
	{
		echo $this->common_model->rander_pagination_front('search/result/',$member_total_count,10);
	}
?>
<!-- for pagination-->
</div>
<div class="clearfix"></div>
</div>
</div>

<?php include_once('page_part/common_front_button_ajaxcode.php'); ?>