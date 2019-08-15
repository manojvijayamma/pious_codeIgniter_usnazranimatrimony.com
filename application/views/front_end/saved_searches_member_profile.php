<?php
if(!isset($shortlist_data_count) || $shortlist_data_count =='')
{
	$shortlist_data_count = 0;
}
$success_message = $this->common_model->get_session_data_comm('success_message');
?>
<div class="xxl-16 xl-16 m-16 l-16 s-16 xs-16 margin-bottom-20px" >
	<?php
		if(isset($success_message) && $success_message !='')
		{
	?>	<br/>
    	<div id="flash_message_saved_search" class="alert alert-success  alert-dismissable"><div class="fa fa-check">&nbsp;</div><a href="#" class="close" data-dismiss="alert" aria-label="close" style="color:#000 !important">×</a><?php echo $success_message; ?></div>
    <?php
		}
	?>
	<div class="row ne-bdr-btm-lgt-grey ne_pad_btm_10px">
        <h3 class="xxl-6 xl-6 l-6 xs-16 m-7 s-16 ne_font_weight_nrm margin-top-10px">
                <i class="fa fa-search"></i>Total Result : <?php echo $shortlist_data_count; ?> Found
        </h3>
    </div>
<?php
if(isset($shortlist_data) && $shortlist_data !='' && is_array($shortlist_data) && count($shortlist_data) > 0)
{
	foreach($shortlist_data as $shortlist_profile)
	{
	?>
     <?php if(isset($page_name) && $page_name =='Saved Searches')
		   	{ ?>
	<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 featured-profile padding-lr-zero">
		<div class="xxl-10 xl-8 m-13 l-10 s-10 xs-10 margin-top-15 padding-right-0-xs">
			<div class="row">
				<div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16">
					<a href="" target="_blank" class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 font padding-lr-zero text_slider"><?php echo $shortlist_profile['search_name'];?></a>
				</div>
				<div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16 ne_font_12 margin-top-5">
					Save From <?php echo $shortlist_profile['search_page_nm'];?>
				</div>
				<div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16 ne_font_12">
					<a href="<?php echo $base_url; ?>search/saved-search-now/<?php echo $shortlist_profile['id'];?>" class="underline text_slider">Search Now</a> <img src="<?php echo $base_url; ?>assets/front_end/images/icon/right-gray-arrow.png" class="right-gray-arrow" alt="view-arrow" />
				</div>
                <div class="xxl-16 xl-16 m-16 xs-16 l-16 s-16 ne_font_12">
					 <a class="underline hook4 in" data-toggle="collapse" href=".hook<?php echo $shortlist_profile['id'];?>" aria-expanded="false" >Saved Search Deatils<span class="more_down_arrow" ></span></a></span>
				</div>
			</div>
		</div>
		<div class="xxl-4 xl-6 m-16 l-16 s-16 xs-16 margin-top-5 border-left margin-bottom-10">
			<div class="row">
				<div class="xxl-16 xl-16 m-10 xs-10 l-10 s-10 font-12 margin-top-5 text-darkgrey text-center padding-0-xs">
					<span class="date" style="border:0px !important;"><?php echo $this->common_model->displayDate($shortlist_profile['created_on'],'D,jS,F-Y');?></span>
				</div>
				<div class="xxl-16 xl-16 m-6 xs-6 l-6 s-6 font-12 margin-top-15px text-center padding-0-xs margin-top-5-xs margin-top-5-sm">
		            <a onclick="delete_saved_search_set_id('<?php echo $shortlist_profile['id'];?>')" class="btn-delete" data-toggle="modal" data-target="#myModal_delete" title="Delete"><i class="fa fa-trash"></i></a>
      			</div>
			</div>
		</div>
        <div class="clear-fix clearfix"></div>
        <div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 padding-right-0-xs collapse hook<?php echo $shortlist_profile['id'];?>" id="saved_search_details">
        	<?php if(isset($shortlist_profile['search_page_nm']) && $shortlist_profile['search_page_nm']=="Quick Search")
				  {?>
			<div class="row"> 
            	<div class="xxl-4 xl-8 m-13 l-10 s-10 xs-10 margin-top-5 padding-right-0-xs">
                    <b>From Age :</b> <?php if(isset($shortlist_profile['from_age']) && $shortlist_profile['from_age']!='') {echo $shortlist_profile['from_age'];}else{echo "N/A";}?> years
                </div>
                <div class="xxl-4 xl-8 m-13 l-10 s-10 xs-10 margin-top-5 padding-right-0-xs">
                    <b>To Age :</b> <?php if(isset($shortlist_profile['to_age']) && $shortlist_profile['to_age']!='') {echo $shortlist_profile['to_age'];}else{echo "N/A";}?> years
                </div>
                <div class="xxl-4 xl-8 m-13 l-10 s-10 xs-10 margin-top-5 padding-right-0-xs">
                    <b>From Height :</b> <?php if(isset($shortlist_profile['from_height']) && $shortlist_profile['from_height']!='') {$from_height = $shortlist_profile['from_height'];echo $this->common_model->display_height($from_height);}else{echo "N/A";}?>
                </div>
                <div class="xxl-4 xl-8 m-13 l-10 s-10 xs-10 margin-top-5 padding-right-0-xs">
                    <b>To Height :</b> <?php if(isset($shortlist_profile['to_height']) && $shortlist_profile['to_height']!='') {$to_height = $shortlist_profile['to_height'];echo $this->common_model->display_height($to_height);}else{echo "N/A";}?>
                </div>
              </div>
              <div class="row">
              <div class="xxl-4 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                   	 <b>With Photo :</b> <?php if(isset($shortlist_profile['with_photo']) && $shortlist_profile['with_photo']!='') {echo "Yes";}else{echo "N/A";}?>
                </div> 
              	<div class="xxl-12 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                      <b>Marital Status :</b> <?php if(isset($shortlist_profile['marital_status']) && $shortlist_profile['marital_status']!='') {$marital_status = $shortlist_profile['marital_status'];echo $marital_status_exp = str_replace(',',', ',$marital_status);}else{echo "N/A";}?>
                </div>	
              </div>
              <div class="row"> 
              	<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                    <b>Catholic Community :</b> <?php if(isset($shortlist_profile['religion']) && $shortlist_profile['religion']!='') {echo $this->common_model->valueFromId('religion',$shortlist_profile['religion'],'religion_name');}else{echo "N/A";}?>
                </div>	
              </div>
              <div class="row"> 
              	<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                    <b>Diocese :</b> <?php if(isset($shortlist_profile['caste']) && $shortlist_profile['caste']!='') {echo $this->common_model->valueFromId('caste',$shortlist_profile['caste'],'caste_name');}else{echo "N/A";}?>
                </div>	
              </div>
               <div class="row"> 
              	<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                    <b>Mother Tongue :</b> <?php 
					if(isset($shortlist_profile['mother_tongue']) && $shortlist_profile['mother_tongue']!='') {echo $this->common_model->valueFromId('mothertongue',$shortlist_profile['mother_tongue'],'mtongue_name');}else{echo "N/A";}?>
                </div>	
              </div>
               <div class="row"> 
              	<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                    <b>Country :</b> <?php if(isset($shortlist_profile['country']) && $shortlist_profile['country']!='') {echo $this->common_model->valueFromId('country_master',$shortlist_profile['country'],'country_name');}else{echo "N/A";}?>
                </div>	
              </div>
               <div class="row"> 
              	<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                    <b>State :</b> <?php if(isset($shortlist_profile['state']) && $shortlist_profile['state']!='') {echo $this->common_model->valueFromId('state_master',$shortlist_profile['state'],'state_name');}else{echo "N/A";}?>
                </div>	
              </div>
               <div class="row"> 
              	<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                    <b>City :</b> <?php if(isset($shortlist_profile['city']) && $shortlist_profile['city']!='') {echo $this->common_model->valueFromId('city_master',$shortlist_profile['city'],'city_name');}else{echo "N/A";}?>
                </div>	
              </div>
              <div class="row"> 
              	<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                    <b>Education :</b> <?php if(isset($shortlist_profile['education']) && $shortlist_profile['education']!='') {echo $this->common_model->valueFromId('education_detail',$shortlist_profile['education'],'education_name');}else{echo "N/A";}?>
                </div>	
              </div>
            <?php }?>
			
        	<?php if(isset($shortlist_profile['search_page_nm']) &&  $shortlist_profile['search_page_nm']=="Advance Search")
					{?>
			<div class="row"> 
            	<div class="xxl-4 xl-8 m-13 l-10 s-10 xs-10 margin-top-5 padding-right-0-xs">
                    <b>From Age :</b> <?php if(isset($shortlist_profile['from_age']) && $shortlist_profile['from_age']!='') {echo $shortlist_profile['from_age'];}else{echo "N/A";}?> years
                </div>
                <div class="xxl-4 xl-8 m-13 l-10 s-10 xs-10 margin-top-5 padding-right-0-xs">
                    <b>To Age :</b> <?php if(isset($shortlist_profile['to_age']) && $shortlist_profile['to_age']!='') {echo $shortlist_profile['to_age'];}else{echo "N/A";}?> years
                </div>
                <div class="xxl-4 xl-8 m-13 l-10 s-10 xs-10 margin-top-5 padding-right-0-xs">
                    <b>From Height :</b> <?php if(isset($shortlist_profile['from_height']) && $shortlist_profile['from_height']!='') {$from_height = $shortlist_profile['from_height'];echo $this->common_model->display_height($from_height);}else{echo "N/A";}?>
                </div>
                <div class="xxl-4 xl-8 m-13 l-10 s-10 xs-10 margin-top-5 padding-right-0-xs">
                    <b>To Height :</b> <?php if(isset($shortlist_profile['to_height']) && $shortlist_profile['to_height']!='') {$to_height = $shortlist_profile['to_height'];echo $this->common_model->display_height($to_height);}else{echo "N/A";}?>
                </div>
              </div>
              <div class="row">
              	<div class="xxl-4 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                   	 <b>With Photo :</b> <?php if(isset($shortlist_profile['with_photo']) && $shortlist_profile['with_photo']!='') {echo "Yes";}else{echo "N/A";}?>
                </div> 
              	<div class="xxl-12 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                      <b>Marital Status :</b> <?php if(isset($shortlist_profile['marital_status']) && $shortlist_profile['marital_status']!='') {$marital_status = $shortlist_profile['marital_status'];echo $marital_status_exp = str_replace(',',', ',$marital_status);}else{echo "N/A";}?>
                </div>	
              </div>
              <div class="row"> 
              	<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                    <b>Catholic Community :</b> <?php if(isset($shortlist_profile['religion']) && $shortlist_profile['religion']!='') {echo $this->common_model->valueFromId('religion',$shortlist_profile['religion'],'religion_name');}else{echo "N/A";}?>
                </div>	
              </div>
              <div class="row"> 
              	<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                    <b>Diocese :</b> <?php if(isset($shortlist_profile['caste']) && $shortlist_profile['caste']!='') {echo $this->common_model->valueFromId('caste',$shortlist_profile['caste'],'caste_name');}else{echo "N/A";}?>
                </div>	
              </div>
               <div class="row"> 
              	<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                    <b>Mother Tongue :</b> <?php 
					if(isset($shortlist_profile['mother_tongue']) && $shortlist_profile['mother_tongue']!='') {echo $this->common_model->valueFromId('mothertongue',$shortlist_profile['mother_tongue'],'mtongue_name');}else{echo "N/A";}?>
                </div>	
              </div>
               <div class="row"> 
              	<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                    <b>Country :</b> <?php if(isset($shortlist_profile['country']) && $shortlist_profile['country']!='') {echo $this->common_model->valueFromId('country_master',$shortlist_profile['country'],'country_name');}else{echo "N/A";}?>
                </div>	
              </div>
               <div class="row"> 
              	<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                    <b>State :</b> <?php if(isset($shortlist_profile['state']) && $shortlist_profile['state']!='') {echo $this->common_model->valueFromId('state_master',$shortlist_profile['state'],'state_name');}else{echo "N/A";}?>
                </div>	
              </div>
               <div class="row"> 
              	<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                    <b>City :</b> <?php if(isset($shortlist_profile['city']) && $shortlist_profile['city']!='') {echo $this->common_model->valueFromId('city_master',$shortlist_profile['city'],'city_name');}else{echo "N/A";}?>
                </div>	
              </div>
              <div class="row"> 
              	<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                    <b>Education :</b> <?php if(isset($shortlist_profile['education']) && $shortlist_profile['education']!='') {echo $this->common_model->valueFromId('education_detail',$shortlist_profile['education'],'education_name');}else{echo "N/A";}?>
                </div>	
              </div>
              <div class="row"> 
              	<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                    <b>Occupation :</b> <?php if(isset($shortlist_profile['occupation']) && $shortlist_profile['occupation']!='') {echo $this->common_model->valueFromId('occupation',$shortlist_profile['occupation'],'occupation_name');}else{echo "N/A";}?>
                </div>	
              </div>
              <div class="row"> 
              	<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                    <b>Income :</b><?php if(isset($shortlist_profile['income']) && $shortlist_profile['income']!=''){$income = $shortlist_profile['income']; echo $income_exp = str_replace('-|-',', ',$income);}else{echo "N/A";}?>
                </div>	
              </div>
              <!--<div class="row"> 
              	<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                    <b>Star :</b><?php //if(isset($shortlist_profile['star']) && $shortlist_profile['star']!=''){$star = $shortlist_profile['star'];echo $star_exp = str_replace(',',', ',$star);}else{echo "N/A";}?>
                </div>	
              </div>-->
              <div class="row"> 
              	<div class="xxl-10 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                      <b>Eating Habits :</b> <?php if(isset($shortlist_profile['diet']) && $shortlist_profile['diet']!='') {$diet = $shortlist_profile['diet'];echo $diet_exp = str_replace(',',', ',$diet);}else{echo "N/A";}?>
                </div>	
                <div class="xxl-6 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                     <b>Drink :</b> <?php if(isset($shortlist_profile['drink']) && $shortlist_profile['drink']!='') {$drink = $shortlist_profile['drink'];echo $drink_exp = str_replace(',',', ',$drink);}else{echo "N/A";}?>
                </div>
              </div>
              <div class="row"> 
              	<div class="xxl-10 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                    <b>Skin Tone :</b> <?php if(isset($shortlist_profile['complexion']) && $shortlist_profile['complexion']!='') {$complexion = $shortlist_profile['complexion'];echo $complexion_exp = str_replace(',',', ',$complexion);}else{echo "N/A";}?>
                </div>	
                <div class="xxl-6 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                    <b>Smoking :</b> <?php if(isset($shortlist_profile['smoking']) && $shortlist_profile['smoking']!='') {$smoking = $shortlist_profile['smoking'];echo $smoking_exp = str_replace(',',', ',$smoking);}else{echo "N/A";}?>
                </div>
              </div>
              <div class="row"> 
              	<div class="xxl-10 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                     <b>Body Type :</b> <?php if(isset($shortlist_profile['bodytype']) && $shortlist_profile['bodytype']!=''){$bodytype = $shortlist_profile['bodytype'];echo $bodytype_exp = str_replace(',',', ',$bodytype); }else{echo "N/A";}?>
                </div>	
                <!--<div class="xxl-6 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                    <b>Manglik :</b> <?php //if(isset($shortlist_profile['manglik']) && $shortlist_profile['manglik']!='') {$manglik = $shortlist_profile['manglik'];echo $manglik_exp = str_replace(',',', ',$manglik);}else{echo "N/A";}?>
                </div>-->
              </div>
            <?php } ?>
            
             <?php if(isset($shortlist_profile['search_page_nm']) && $shortlist_profile['search_page_nm']=="Keyword Search")
					{?>
                 <div class="row"> 
                    <div class="xxl-8 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                         <b>Keyword :</b> <?php if(isset($shortlist_profile['keyword']) && $shortlist_profile['keyword']!='') {echo $shortlist_profile['keyword'];}else{echo "N/A";}?>
                    </div>	
                    <div class="xxl-8 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                        <b>With Photo :</b> <?php if(isset($shortlist_profile['with_photo']) && $shortlist_profile['with_photo']!='') {echo "Yes";}else{echo "N/A";}?>
                    </div>
              	</div>
             <?php }?>
               <?php if(isset($shortlist_profile['search_page_nm']) && $shortlist_profile['search_page_nm']=="ID Search")
					{?>
              <div class="row"> 
              	<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 margin-top-5 padding-right-0-xs">
                    <b>Matri ID :</b> <?php if(isset($shortlist_profile['id_search']) && $shortlist_profile['id_search']!='') {echo $shortlist_profile['id_search'];}else{echo "N/A";}?>
                </div>	
              </div>
             <?php }?>
    </div>
 </div>
<?php
	} 
  }
} 
else
{
?>
	<div role="alert" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 alert margin-top-20" style="background:#fcf8e3;border:1px solid #faebcc; color: #8a6d3b;">
        <p class="margin-top-10px margin-bottom-10px">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">

            </button>
            No Data Available.
        </p>
    </div>
    <div class="clearfix"></div>
<?php
}
?>
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
								<img src="<?php echo $base_url; ?>assets/front_end/images//icon/view.png" alt="" class="margin-right-10" />
							</div>
							<div class="xxl-13 xl-13 l-13 m-16 xs-16 s-16 xxl-margin-left-1 xl-margin-left-1 margin-top-10">
								<strong class="text-white">This Profile Currently visible</strong><br />
								<span class="small text-white">This Profile will be Visible Permanently.</span>
							</div>
						</div>
						<div class="text-center">
							 <img src="<?php echo $base_url; ?>assets/front_end/images//icon/download.png" alt="" class="text-center" />
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
</div>
<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 tp-pagination margin-top-20">
<!-- for pagination-->
	<?php
       if(isset($shortlist_data_count) && $shortlist_data_count !='' && $shortlist_data_count > 0)
        {	
			echo $this->common_model->rander_pagination_front('search/saved/',$shortlist_data_count);
        }
    ?>
<!-- for pagination-->
</div>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id_temp" class="hash_tocken_id" />