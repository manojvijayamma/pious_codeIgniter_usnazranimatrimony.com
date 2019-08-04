<?php
	//include("modal.php");
	$matrimony=explode("-matrimony",$this->uri->segment(2));
	$matrimony_name=$matrimony[0];
	$comm_model = $this->common_model;
	$is_login = $this->common_front_model->checkLogin("return");
	$matri_id = $this->common_model->get_user_id("matri_id");
	//$gender_check = $this->common_model->get_user_id("gender");
	$email_id = $this->common_model->get_user_id("email");
	$user_id = $this->common_model->get_user_id("id");
	$get_user_data = $this->common_model->get_count_data_manual("register_view",array("id"=>$user_id),1);
//echo "<pre>";	print_r($ratting_list);exit;
//print_r($matrimony_name_list_religion);exit;
?>
<div class="container margin-top-20">
	<div class="row">
		<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-20px padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 padding-0-5-xs">
			<!-- for search side bar-->
			<div class="xxl-4 xl-4 xs-16 m-16 s-16 l-5">
				<?php include('register_search_sidebar.php');?>
				<?php include('community_sidebar.php');?>
			</div>
			
			<!-- for search side bar-->
			<!-- for search result -->
			<div class="xxl-12 xl-12 xs-16 m-16 s-16 l-11 ne_myhome_tab ne_com_tab">
			
				<div class="back-img-2">
					<div class="">
						<div class="row margin-top-20px">
							<div class="xxl-16 xl-12 xs-16 m-16 s-16 l-16">
								<h3 class="main-title main-2-new">
									<a href="<?php echo base_url();?>" style="color:#fff;">Home</a> 
									
									<i class="fa fa-angle-double-right"style="color:#fff;"></i>
									
									<a href="<?php echo base_url();?>more-details/<?php echo $page_name;?>" style="color:#fff;"> 
									<?php 
										$page_name1 = str_replace('-',' ',$page_name);
										echo ucfirst($page_name1).' Matrimonials';?>
									</a> 
								</h3>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row margin-top-20px">
				<?php
					if(isset($page_list_community) && is_array($page_list_community) && count($page_list_community) > 0){
						foreach($page_list_community as $matrimony_name_lists){
                    ?>
					<div class="xxl-4 xl-4  l-4 xs-16 m-4 s-8">
					    <a href="<?php echo base_url();?>matrimony/<?php echo str_ireplace(" ","-",$matrimony_name_lists['matrimony_name']);?>-matrimony" class="btn xxl-16 xl-16 xs-16 m-16 l-16" style="margin-left:0%;border-radius: 6px;">
                                <?php echo str_replace("-"," ",$matrimony_name_lists['matrimony_name']);?>
					    </a>
						<!-- <button type="submit" class="btn xxl-16 xl-16 xs-16 m-16 l-16" style="margin-left:0%;">Sikh</button> -->
					</div>
					<?php
						}
					}else{?>
					<p class=" margin-top-20 margin-bottom-10px alert" role="alert" style="background:#fcf8e3;border:1px solid #faebcc; color: #8a6d3b;">
						No Data found to display.
					</p>
					
					
					<?php
					}
					?>
					<!-- <div class="xxl-4 xl-4  l-4 xs-16 m-4 s-8">
						<button type="submit" class="btn xxl-16 xl-16 xs-16 m-16 l-16" style="margin-left:0%;">Jain</button>
					</div>
					<div class="xxl-4 xl-4  l-4 xs-16 m-4 s-8">
						<button type="submit" class="btn xxl-16 xl-16 xs-16 m-16 l-16" style="margin-left:0%;">Hindu</button>
					</div>
					<div class="xxl-4 xl-4  l-4 xs-16 m-4 s-8">
						<button type="submit" class="btn xxl-16 xl-16 xs-16 m-16 l-16" style="margin-left:0%;">Jain</button>
					</div> -->
				</div>
				
        
       
				<!-- <div class="row margin-top-0px">
					<div class="xxl-4 xl-4  l-4 xs-16 m-4 s-8">
						<button type="submit" class="btn xxl-16 xl-16 xs-16 m-16 l-16" style="margin-left:0%;">Sikh</button>
					</div>
					<div class="xxl-4 xl-4  l-4 xs-16 m-4 s-8">
						<button type="submit" class="btn xxl-16 xl-16 xs-16 m-16 l-16" style="margin-left:0%;">Jain</button>
					</div>
					<div class="xxl-4 xl-4  l-4 xs-16 m-4 s-8">
						<button type="submit" class="btn xxl-16 xl-16 xs-16 m-16 l-16" style="margin-left:0%;">Hindu</button>
					</div>
					<div class="xxl-4 xl-4  l-4 xs-16 m-4 s-8">
						<button type="submit" class="btn xxl-16 xl-16 xs-16 m-16 l-16" style="margin-left:0%;">Jain</button>
					</div>
				</div> -->
				<?php include('register_search_sidebar_mob.php');?>
				<?php include('community_sidebar_mob.php');?>
			</div>
		</div>
	</div>
</div>
<br>
<br>																																																																																																																	