<style>
	.badge {
    
    background-color: #ffdbe7;
    border-radius: 2px;
    box-shadow: none !important;
}
</style>
<?php 
	$member_likes_count = 0;
	$member_likes_data = array();
	$member_id_like = $this->common_front_model->get_session_data('matri_id');
	if(isset($member_id_like) && $member_id_like !='' && isset($member_data_val) && $member_data_val !='' )
	{
		$where_array = array('my_id'=>$member_id_like,'other_id'=>$member_data_val['matri_id']);
		$member_likes_data = $this->common_model->get_count_data_manual('member_likes',$where_array,1,'');
		$member_likes_count = $this->common_model->get_count_data_manual('member_likes',$where_array,0,'');
	}
	
	$yes_style = 'display:inline-block;';
	$no_style = 'display:inline-block;';
	$image_yes_style = 'display:none';
	$image_no_style = 'display:none;';
	$like_unlike = "YN";
	if(isset($member_likes_data) && $member_likes_data != '' && isset($member_likes_count) && $member_likes_count > 0)
	{
		if($member_likes_data['like_status']=='Yes'){
			$like_unlike = "N";
			$yes_style = 'display:none;';
			$image_yes_style = 'display:inline-block;';
		}elseif($member_likes_data['like_status']=='No'){
			$like_unlike = "Y";
			$no_style = 'display:none;';
			$image_no_style = 'display:inline-block;';
		}
	}
?>

<div class="xxl-6 xl-6 l-6 m-16 s-16 xs-16  border-left">
    <div class="row text-center" style="">
        <h3 style="color:#d2267a;font-weight:bold;font-size:15px;">
			<span id="like_unlike_<?php echo $member_data_val['matri_id'];?>">
			<?php if(isset($like_unlike) && $like_unlike=='YN'){ echo 'Like/Unlike';}
				else if(isset($like_unlike) && $like_unlike=='Y'){ echo 'Like';}
				else if(isset($like_unlike) && $like_unlike=='N'){ echo 'Unlike';}?>
            </span>
				<?php if(isset($member_data_val['gender']) && $member_data_val['gender']=='Male'){echo ' Him';}
				else{echo ' Her';}?> Profile?
        </h3>
        
            <a id="Yes_id_<?php echo $member_data_val['matri_id'];?>" style="<?php echo $yes_style;?>" href="javascript:;" class="profile-complate-btn-like-unlike" onclick="member_like('Yes','<?php echo $member_data_val['matri_id'];?>');" ><i class="fa fa-thumbs-up ne_mrg_ri8_10"></i>Like</a>
			<a id="Image_Yes_<?php echo $member_data_val['matri_id'];?>" style="<?php echo $image_yes_style;?>">
				<i class="fa fa-thumbs-up ne_mrg_ri8_10" style="font-size:25px;color:#dba879;"></i>
			</a>
            <!--<a href="#" class="profile-complate-skip btn-sm" title="May be" style="background:#83E1ED !important;color:#fff !important;">May be</a>-->
            <a id="No_id_<?php echo $member_data_val['matri_id'];?>" style="<?php echo $no_style;?>" href="javascript:;" onclick="member_like('No','<?php echo $member_data_val['matri_id']; ?>');" class="profile-complate-btn-like-unlike"><i class="fa fa-thumbs-down ne_mrg_ri8_10"></i>Unlike</a>
			<a id="Image_No_<?php echo $member_data_val['matri_id'];?>" style="<?php echo $image_no_style;?>">
				<i class="fa fa-thumbs-down ne_mrg_ri8_10" style="font-size:25px;color:#dba879;"></i>
			</a>
			
        <div class="clearfix"></div>
        <div class="margin-top-5"></div>
		
		
		
		<?php 
			$likes_array = array('like_status'=>'Yes','other_id'=>$member_data_val['matri_id']);
			$total_likes = $this->common_model->get_count_data_manual('member_likes',$likes_array,0,'');
		?>
			<a href="javascript:;" class="">
				<i class="fa fa-thumbs-up" style="font-size:20px;color:#dba879;"></i> 
					<span id="total_likes<?php echo $member_data_val['matri_id'];?>" class="count badge badge-info" style="font-size:15px;"><?php echo $total_likes;?>
					</span>
			</a>
		
		<?php 
			$unlikes_array = array('like_status'=>'No','other_id'=>$member_data_val['matri_id']);
			$total_unlikes = $this->common_model->get_count_data_manual('member_likes',$unlikes_array,0,'');
		?>
			<a href="javascript:;" class="">
				<i class="fa fa-thumbs-down" style="font-size:20px; color:#dba879;"></i>
				<span id="total_unlikes<?php echo $member_data_val['matri_id'];?>"  class="count badge badge-info" style="font-size:15px;"><?php echo $total_unlikes;?></span>
			</a>
		
        <!--<a href="<?php //echo $base_url; ?>search/view-profile/<?php //echo $member_data_val['matri_id'];?>" class="small padding-lr-zero" title="view Profile">
			<img src="<?php //echo $base_url; ?>assets/front_end/images/icon/viewprofile-icon.gif" alt="viewprofile-icon" /> <span class="underline">View full Profile</span>
        </a>-->
    </div>
</div>
<?php
	//$this->common_model->js_extra_code_fr.="";
?>