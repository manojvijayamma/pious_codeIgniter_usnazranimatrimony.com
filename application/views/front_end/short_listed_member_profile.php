<?php
if(!isset($shortlist_data_count) || $shortlist_data_count =='')
{
	$shortlist_data_count = 0;
}
$curre_gender = $this->common_front_model->get_session_data('gender');
if (isset($curre_gender) && $curre_gender == 'Male') {
    $photopassword_image = $base_url . 'assets/images/photopassword_female.png';
} else {
    $photopassword_image = $base_url . 'assets/images/photopassword_male.png';
}
?>
<div class="xxl-16 xl-16 m-16 l-16 s-16 xs-16 margin-bottom-20px" >
	<div class="row ne-bdr-btm-lgt-grey ne_pad_btm_10px">
        <h3 class="xxl-6 xl-6 l-6 xs-16 m-7 s-16 ne_font_weight_nrm margin-top-10px">
                <i class="fa fa-search"></i>Total Result : <?php echo $shortlist_data_count; ?> Found
        </h3>
    </div>
     <h4><div class="alert alert-success" id="unblock_success" style="display:none"></div></h4>
	 <h4><div class="alert alert-success" id="delete_success" style="display:none"></div></h4>
<?php
if(isset($shortlist_data) && $shortlist_data !='' && is_array($shortlist_data) && count($shortlist_data) > 0)
{
	foreach($shortlist_data as $shortlist_profile)
	{
		//print_r($shortlist_profile);
		$deleted = $shortlist_profile['deleted'];
	?>
	<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 featured-profile padding-lr-zero">
		
		<?php
		if(isset($shortlist_profile['photo1']) && $shortlist_profile['photo1'] !='' && $shortlist_profile['photo1_approve'] =='APPROVED' && $shortlist_profile['photo_view_status'] != 0)
		{?>	
			  <img src="<?php echo $base_url; ?>assets/photos/<?php echo $shortlist_profile['photo1'];?>" class="xxl-2 xs-16 xl-2 l-6 m-3 s-16 img-responsive img-circle padding-lr-zero" title="<?php echo $shortlist_profile['username'];?>" alt="" style="max-width:70px;" />
		<?php }
        else if(isset($shortlist_profile['photo1']) && $shortlist_profile['photo1'] !='' && $shortlist_profile['photo1_approve'] =='APPROVED' && $shortlist_profile['photo_view_status'] == 0)
        {?>
			<img src="<?php echo $photopassword_image; ?>" class="xxl-2 xs-16 xl-2 l-6 m-3 s-16 img-responsive img-circle padding-lr-zero" title="Sneha Sharma" alt="" style="max-width:70px;" />
			<?php }
		else
		{ ?>
			 <img src="<?php echo $this->common_model->member_photo_disp($shortlist_profile);?>" class="xxl-2 xs-16 xl-2 l-6 m-3 s-16 img-responsive img-circle padding-lr-zero" title="Sneha Sharma" alt="" style="max-width:70px;" />
<?php   } ?>
		<div class="xxl-9 xl-8 m-13 l-10 s-10 xs-10 margin-top-15 padding-right-0-xs">
			<div class="row">
				<div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16">
					<a href="<?php echo $base_url; ?>search/view-profile/<?php echo $shortlist_profile['matri_id'];?>" target="_blank" class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 font padding-lr-zero text_slider"><?php echo $shortlist_profile['username'];?> (<?php echo $shortlist_profile['matri_id'];?>)</a>
                    <?php 
						if($deleted=='Yes')
						{?>
							<div style="color:#e35120;"><strong>This member does not exists.</strong></div>
						<?php }?>
				</div>
				<div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16 ne_font_12 margin-top-5">
					 <?php if(isset($shortlist_profile['birthdate']) && $shortlist_profile['birthdate'] !='')
							{
								 $birthdate = $shortlist_profile['birthdate'];
								 echo $this->common_model->birthdate_disp($birthdate,0);
							}
							else
							{
								echo $this->common_model->display_data_na('');
							}?>, 
						  <?php	if(isset($shortlist_profile['height']) && $shortlist_profile['height'] !='')
							{
								$height = $shortlist_profile['height'];
								echo $this->common_model->display_height($height);
							}
							else
							{
								echo $this->common_model->display_data_na('');
							}?>,
							<?php if(isset($shortlist_profile['weight']) && $shortlist_profile['weight'] !='')
							{
								 $weight = $shortlist_profile['weight'].' Kg';
								 echo $weight;
							}
							else
							{
								echo $this->common_model->display_data_na('');
							}?>,  <?php if(isset($shortlist_profile['religion_name']) && $shortlist_profile['religion_name'] !=''){ echo $shortlist_profile['religion_name'];}else{echo $this->common_model->display_data_na($shortlist_profile['religion_name']);}?> - <?php if(isset($shortlist_profile['caste_name']) && $shortlist_profile['caste_name'] !=''){ echo $shortlist_profile['caste_name'];}else{echo $this->common_model->display_data_na($shortlist_profile['caste_name']);}?>, <?php if(isset($shortlist_profile['city_name']) && $shortlist_profile['city_name'] !='')
							{ echo $shortlist_profile['city_name'];}
							else{echo $this->common_model->display_data_na($shortlist_profile['country_name']);}?>, <?php if(isset($shortlist_profile['country_name']) && $shortlist_profile['country_name'] !=''){ echo $shortlist_profile['country_name'];}else{echo $this->common_model->display_data_na($shortlist_profile['country_name']);}?> 
				</div>
				<div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16 ne_font_12">
					<a href="<?php echo $base_url; ?>search/view-profile/<?php echo $shortlist_profile['matri_id'];?>" class="underline text_slider">View full Profile</a> <img src="<?php echo $base_url; ?>assets/front_end/images/icon/right-gray-arrow.png" class="right-gray-arrow" alt="view-arrow" />
				</div>
			</div>
		</div>
		<div class="xxl-5 xl-6 m-16 l-16 s-16 xs-16 margin-top-5 border-left margin-bottom-10">
			<div class="row">
				<div class="xxl-16 xl-16 m-10 xs-10 l-10 s-10 font-12 margin-top-5 text-darkgrey text-center padding-0-xs">
					<span class="date"><?php echo $this->common_model->displayDate($shortlist_profile['created_on'],'D, jS, F-Y');?></span>
				</div>
				<div class="xxl-16 xl-16 m-6 xs-6 l-6 s-6 font-12 margin-top-15px text-center padding-0-xs margin-top-5-xs margin-top-5-sm">
      <?php if(isset($page_name) && $page_name =='Short Listed Profile')
		   	{ 
				?>

					<a class="btn-delete" data-toggle="modal" onClick="delete_particulare('<?php echo $shortlist_profile['matri_id'];?>','<?php echo $page_name;?>');" data-target="#myModal_delete" title="Delete"><i class="fa fa-trash"></i></a>
       		<?php
			}
	   		else if(isset($page_name) && $page_name =='Block Listed Profile')
			{
				if($deleted == 'Yes')
				{?>
                    <a data-toggle="modal" data-target="#myModal_deleted" title="Block/Unblock" class="btn btn-sm margin-right-10">Unblock Now <i class="fa fa-chevron-right"></i></a> 
				<?php 
				}
				else
				{?>
					<a onClick="unblock_particulare('<?php echo $shortlist_profile['id'];?>','<?php echo $shortlist_profile['matri_id'];?>')" data-toggle="modal" data-target="#myModal_unblock" title="Block/Unblock" class="btn btn-sm margin-right-10">Unblock Now <i class="fa fa-chevron-right"></i></a>  
	  		<?php 
				}
			}
	  		else if(isset($page_name) && $page_name =='I Viewed Profiles')
		   	{ 
				?>
					<a class="btn-delete" data-toggle="modal" data-target="#myModal_delete" title="Delete" onClick="delete_particulare('<?php echo $shortlist_profile['matri_id'];?>','<?php echo $page_name;?>');"><i class="fa fa-trash"></i></a>
			<?php 
            }
			else if(isset($page_name) && $page_name =='Who Viewed My Profile')
			{ 
				?>
                
				<a class="btn-delete" data-toggle="modal" data-target="#myModal_delete" title="Delete" onClick="delete_particulare('<?php echo $shortlist_profile['matri_id'];?>','<?php echo $page_name;?>');"><i class="fa fa-trash"></i></a>
					
       <?php 
	   } 
	   		else if(isset($page_name) && $page_name =='Saved Searches')
		   	{ ?>
				<a class="btn-delete" data-toggle="modal" data-target="#myModal_delete" title="Delete" onClick="delete_particulare('<?php echo $shortlist_profile['matri_id'];?>','<?php echo $page_name;?>');"><i class="fa fa-trash"></i></a>
				
       <?php } 
	   		else if(isset($page_name) && $page_name =='Like Profile')
		   	{ 
			?>
				<a href="javascript:;" onclick="member_like('No','<?php echo $shortlist_profile['matri_id']; ?>','<?php echo $deleted;?>');" class="btn-sm  btn no-shadow" title="No" style="padding:5px 10px;">
					<i class="fa fa-thumbs-down ne_mrg_ri8_10" style="color:white;"></i>Unlike
				</a>
		<?php 
		} 
	   		else if(isset($page_name) && $page_name =='Unlike Profile')
		   	{ 
				?>
					<a href="javascript:;" onclick="member_like('Yes','<?php echo $shortlist_profile['matri_id'];?>','<?php echo $deleted;?>');" class="btn-sm btn no-shadow" title="Yes" style="padding:5px 10px;">
						<i class="fa fa-thumbs-up ne_mrg_ri8_10" style="color:white;"></i>Like
					</a>
		   <?php 
	   }?>
	   
      			</div>
			</div>
		</div>
	</div>
<?php
	}
} 
else
{
?>
	<div role="alert" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 alert margin-top-20" style="background:#fcf8e3;border:1px solid #faebcc; color: #8a6d3b;">
        <p class="margin-top-10px margin-bottom-10px">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            No Data Available.
        </p>
    </div>
    <div class="clearfix"></div>
<?php
}
?>
	<div id="myModal_unblock" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <input type="hidden" id="matri_id" name="matri_id" value="" />
                <input type="hidden" id="unblock_id" name="unblock_id" value="" />
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><span class="lock_medium"></span> Profile Currently Blocked</h4>
                </div>
                <div class="modal-body">
                    <div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16">
                        <div class="alert alert-danger" style="overflow:hidden;box-shadow:4px 4px 0 0 #ccc;">
                            <div class="xxl-2 xl-2 l-2 m-16 xs-16 s-16">
                                <img src="<?php echo $base_url; ?>assets/front_end/images/icon/user-block.png" alt="" class="margin-right-10" />
                            </div>
                            <div class="xxl-13 xl-13 l-13 m-16 xs-16 s-16 xxl-margin-left-1 xl-margin-left-1 margin-top-10">
                                <strong>This Profile Currently Blocked</strong><br />
                                <span class="small">This Profile has been Blocked Permanently.</span>
                            </div>
                        </div>
                        <div class="text-center">
                        <img src="<?php echo $base_url; ?>assets/front_end/images/icon/download.png" alt="" class="text-center" />
                        </div>
                        <div class="alert alert-success margin-top-10" style="overflow:hidden;box-shadow:4px 4px 0 0 #ccc;">
                            <div class="xxl-2 xl-2 l-2 m-16 xs-16 s-16">
                                <img src="<?php echo $base_url; ?>assets/front_end/images/icon/user-unblock.png" alt="" class="margin-right-10" />
                            </div>
                            <div class="xxl-13 xl-13 l-13 m-16 xs-16 s-16 xxl-margin-left-1 xl-margin-left-1 margin-top-10">
                                <strong class="text-black">Do you want to Unblock this Profile</strong><br />
                                <span class="small text-black">This Profile will be Unblock<em>(Show)</em> Permanently.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="modal-footer margin-top-10">
            <a href="javascript:;" class="btn btn-sm btn-success" onClick="unblock_profile('unblock','','')"><i class="fa fa-check"></i> Unblock</a>
                    <a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</a>
                </div>
            </div>
        </div>
    </div>
    
	<div id="myModal_visiblity" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><img src="<?php echo $base_url; ?>assets/front_end/images//icon/eye.png" alt="" class="" /> Profile Visiblity</h4>
				</div>
				<div class="modal-body">
					<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16">
						<div class="alert alert-success" style="overflow:hidden;box-shadow:4px 4px 0 0 #ccc;">
							<div class="xxl-2 xl-2 l-2 m-16 xs-16 s-16">
								<img src="<?php echo $base_url; ?>assets/front_end/images/icon/view.png" alt="" class="margin-right-10" />
							</div>
							<div class="xxl-13 xl-13 l-13 m-16 xs-16 s-16 xxl-margin-left-1 xl-margin-left-1 margin-top-10">
								<strong class="text-white">This Profile Currently visible</strong><br />
								<span class="small text-white">This Profile will be Visible Permanently.</span>
							</div>
						</div>
						<div class="text-center">
							 <img src="<?php echo $base_url; ?>assets/front_end/images/icon/download.png" alt="" class="text-center" />
							 </div>
						<div class="alert alert-danger margin-top-10" style="overflow:hidden;box-shadow:4px 4px 0 0 #ccc;">
							<div class="xxl-2 xl-2 l-2 m-16 xs-16 s-16">
								<img src="<?php echo $base_url; ?>assets/front_end/images//icon/hide.png" alt="" class="margin-right-10" />
							</div>
							<div class="xxl-13 xl-13 l-13 m-16 xs-16 s-16 xxl-margin-left-1 xl-margin-left-1 margin-top-10">
								<strong>Do you want to unvisible this Profile</strong><br />
								<span class="small">This Profile will be Unvisible(Hide) Permanently.</span>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="modal-footer margin-top-10">
					<a class="btn btn-sm btn-success"><i class="fa fa-eye-slash"></i> Disable</a>
					<a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</a>
				</div>
			</div>
		</div>
	</div>
	
	<div id="myModal_delete" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><img src="<?php echo $base_url; ?>assets/front_end/images//icon/alert.png" alt="" class="" /> Delete This Saved Profile</h4>
				</div>
				<div class="modal-body">
					<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16">
						<div class="alert alert-danger" style="overflow:hidden;box-shadow:4px 4px 0 0 #ccc;">
							<div class="xxl-2 xl-2 l-2 m-16 xs-16 s-16">
								<img src="<?php echo $base_url; ?>assets/front_end/images/icon/user-detele.png" alt="" class="margin-right-10" />
							</div>
							<div class="xxl-13 xl-13 l-13 m-16 xs-16 s-16 xxl-margin-left-1 xl-margin-left-1 margin-top-10">
								<strong>Are you sure you want to Remove this Profile?</strong><br />
								<span class="small">This Profile will be remove Permanently from your saved Records.</span>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="modal-footer margin-top-10">
					<a class="btn btn-sm btn-success" href="javascript:;" onclick="common_delete_list_all_profile()"><i class="fa fa-check"></i> Yes</a>
					<a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> No</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="myModal_deleted" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="color:red" class="modal-title"> Member Not Exists</h4>
            </div>
            <div class="modal-body" class="font-13">
                <div><strong>This member does not exists.</strong></div>
            </div>
        </div>
    </div>
</div>

<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 tp-pagination margin-top-20">
<!-- for pagination-->
	<?php
       if(isset($shortlist_data_count) && $shortlist_data_count !='' && $shortlist_data_count > 0)
        {	
			if(isset($page_name) && $page_name =='Short Listed Profile')
		   	{ 
				$url = 'my-profile/short-listed/';
		    }
	   		else if(isset($page_name) && $page_name =='Block Listed Profile')
			{
				$url = 'my-profile/block-listed/';
			}
			else if(isset($page_name) && $page_name =='I Viewed Profiles')
			{
				$url = 'my-profile/i-viewed/';
			}
			else if(isset($page_name) && $page_name =='Who Viewed My Profile')
			{
				$url = 'my-profile/who-viewed/';
			}
			else if(isset($page_name) && $page_name =='Saved Searches')
			{
				$url = 'my-profile/saved/';
			}
			else if(isset($page_name) && $page_name =='Like Profile')
			{
				$url = 'my-profile/like-profile/';
			}
			else if(isset($page_name) && $page_name =='Unlike Profile')
			{
				$url = 'my-profile/unlike-profile/';
			}
			echo $this->common_model->rander_pagination_front($url,$shortlist_data_count,10);
        }
    ?>
<!-- for pagination-->
</div>

<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id_temp" class="hash_tocken_id" />
<input type="hidden" name="page_name" value="<?php echo $page_name; ?>" id="page_name" />
<input type="hidden" name="delete_matri_id" value="" id="delete_matri_id" />
<?php
	
$this->common_model->js_extra_code_fr.="
	function unblock_particulare(id,matri_id)
	{
		$('#unblock_id').val(id);
		$('#matri_id').val(matri_id);
	}
	
	function delete_particulare(delete_matri_id,page_name)
	{
		$('#page_name').val(page_name);
		$('#delete_matri_id').val(delete_matri_id);
	}
	
	function member_like(like_status='',other_id='',deleted)
	{
		//alert(deleted);
		//alert(like_status);
		//alert(other_id);
		if(like_status == ''){
			alert('Please try again..!!!');
			return false;
		}
		if(other_id == ''){
			alert('Please try again..!!!');
			return false;
		}
		if(deleted == 'Yes'){
			alert('This member not exists!');
			return false;
		}
		
		var hash_tocken_id = $('#hash_tocken_id').val();
		var base_url = $('#base_url').val();
		var url = base_url+'search/member-like';
		show_comm_mask();
			$.ajax({
			  	url: url,
				type: 'POST',
				data: {'csrf_new_matrimonial':hash_tocken_id,'like_status':like_status,'other_id':other_id},
				dataType:'json',
				success: function(data)
				{
					if(data.status == 'success'){
						window.location.reload(true);
					}else{
						alert(data.errmessage);
					}
					update_tocken(data.tocken);
					hide_comm_mask();
			  	}
			});
		return false;
	}	
	";
?>