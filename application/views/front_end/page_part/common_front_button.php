<div class="clearfix"></div>
<input type="hidden" id="matri_id_for_action" name="matri_id_for_action" value="" />
<?php 
$member_id = $this->common_front_model->get_session_data('matri_id');
$comm_model = $this->common_model;

?>
<?php if(isset($member_id) && $member_id!='' && isset($member_data_val) && $member_data_val !=''  && is_array($member_data_val))
	{
		$result_member_matri_id = $member_data_val['matri_id'];
		//echo $member_data_val['matri_id'];exit;
	?>
    <div class="collapse hook1 margin-top-10 <?php echo $member_data_val['matri_id'];?>">
        <div class="xxl-4 xl-4 l-8 m-8">
            <a data-toggle="modal" data-target="#myModal_sms" class="xxl-16 xl-16 l-16 s-16 m-16 xs-16  btn-block font-14 exp-sent-btn" title="Send Message" onClick="get_member_matri_id('<?php echo $member_data_val['matri_id'];?>')">
                <span class="sticker_send-sms"></span>Send Message
            </a>
        </div>
        
        <div class="xxl-4 xl-4 l-8 m-8">
        <?php 
				$where_arra=array('to_id'=>$result_member_matri_id,'from_id'=>$member_id);
				$data = $this->common_model->get_count_data_manual('shortlist',$where_arra,1,'id');
				$is_short_list = 0;
				if(isset($data) && $data !='' && $data > 0)
				{
					$is_short_list = 1;
				}
		?>
        	<div id ="add_shortlist_<?php echo $member_data_val['matri_id'];?>" style="display:<?php if($is_short_list != 0){ echo 'none';} ?>">
            <a data-toggle="modal" data-target="#myModal_shortlist" class="xxl-16 xl-16 l-16 s-16 m-16 xs-16  btn-block font-14 exp-sent-btn" title="Add to Shortlist" onClick="add_shortlist_matri_id('<?php echo $member_data_val['matri_id'];?>')">
                <img src="<?php echo $base_url; ?>assets/front_end/images/icon/filter.png" class="" alt=""> <span>Shortlist</span>
            </a>
            </div>
            <div id ="remove_shortlist_<?php echo $member_data_val['matri_id'];?>" style="display:<?php if($is_short_list == 0){ echo 'none';} ?>;">
           <a data-toggle="modal" data-target="#myModal_shortlisted" class="xxl-16 xl-16 l-16 s-16 m-16 xs-16  btn-block font-14 exp-sent-btn" title="Remove to Shortlist" onClick="remove_shortlist_matri_id('<?php echo $member_data_val['matri_id'];?>')">
                <img src="<?php echo $base_url; ?>assets/front_end/images/icon/filter.png" class="" alt=""> <span>Shortlisted</span>
            </a>
            </div>
        </div>
        <div class="xxl-4 xl-4 l-8 m-8 ne_mrg_tp_10px_l ne-mrg-top-10-768 margin-top-5-xs">
       	  	<?php 
				$where_arra=array('block_to'=>$result_member_matri_id,'block_by'=>$member_id);
				$data = $this->common_model->get_count_data_manual('block_profile',$where_arra,1,'id');
				$is_block_list = 0;
				if(isset($data) && $data > 0)
				{
					$is_block_list = 1;
				}
			?>
                	<div id ="add_blocklist_<?php echo $member_data_val['matri_id'];?>" style="display:<?php if($is_block_list != 0){ echo 'none';} ?>">
						<a data-toggle="modal" data-target="#myModal_block" class="xxl-16 xl-16 l-16 s-16 m-16 xs-16  btn-block font-14 exp-sent-btn" title="Add to Blocklist" onClick="add_block_list_matri_id('<?php echo $member_data_val['matri_id'];?>')">
						<img src="<?php echo $base_url; ?>assets/front_end/images/icon/ban-block.png" class="" alt=""><span> Blocklist</span></a>
					</div>
					<div id ="remove_blocklist_<?php echo $member_data_val['matri_id'];?>" style="display:<?php if($is_block_list == 0){ echo 'none';} ?>;">
						<a data-toggle="modal" data-target="#myModal_unblock" title="Remove to Blocklist" class="xxl-16 xl-16 l-16 s-16 m-16 xs-16  btn-block font-14 exp-sent-btn" onClick="remove_block_list_id('<?php echo $member_data_val['matri_id'];?>')"> <img src="<?php echo $base_url; ?>assets/front_end/images/icon/ban-block.png" class="" alt=""><span> Blocklisted</span></a>
                  </div>
				  <input type="hidden" id="is_member_block_<?php echo $member_data_val['matri_id'];?>" name="is_member_block_<?php echo $member_data_val['matri_id'];?>" value="<?php if($is_block_list != 0){ echo 'is_member_block_'.$member_data_val['matri_id']; } ?>" />
                 
        </div>
        <div class="xxl-4 xl-4 l-8 m-8 ne_mrg_tp_10px_l ne-mrg-top-10-768 margin-top-5-xs">
            <a data-toggle="modal" data-target="#myModal_sendinterest" class="xxl-16 xl-16 l-16 s-16 m-16 xs-16  btn-block font-14 exp-sent-btn padding-lr-zero" onClick="express_interest('<?php echo $member_data_val['matri_id'];?>')" title="Send Interest">
                <img src="<?php echo $base_url; ?>assets/front_end/images/icon/heart-sprite.png" class="" alt=""> <span>Send Interest</span>
            </a>
        </div>
        <div class="clearfix"></div>
    </div>
    <?php }else
	{?>
	 <div class="collapse hook1 margin-top-10 <?php echo $member_data_val['matri_id'];?>">
    	<div class="xxl-16 xl-16 l-16 m-16 text-center">
			<h3>If you want to know more details about this member please login.</h3>
        </div>
     </div>
	<?php }?>
<div class="clearfix"></div>