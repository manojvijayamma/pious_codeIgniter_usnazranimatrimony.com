<?php $current_login_user = $this->common_front_model->get_session_data();?>
<!-- ====== <div class="container"> Start ========= -->	
	<?php echo $this->search_model->search_sub_menu(); ?>
	<div class="page-wrap ne-aft-log">
			<div class="container padding-0-5-xs">
				<div class="xxl-12 xl-12 m-16 s-16 l-12 xs-16 padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 padding-lr-zero-xs">
					<div class="xxl-16 xs-16 s-16 xs-margin-left-0 m-16 m-margin-left-0 l-16 l-margin-left-0 margin-top-10px padding-15px bg-border padding-0-5-xs">
						<div class="xxl-16 xl-16 m-16 s-16 l-16 xs-16">
							<div class="row">
								<div class="xxl-16 xl-16 m-16 s-16 l-16 xs-16 margin-top-15px">
									<div class="row">
										<div class="xxl-16 xl-16 m-16 s-16 l-16 xs-16 padding-lr-zero-320 padding-lr-zero-480 margin-top-5px-480 padding-lr-zero-xs">
											<div class="clearfix"></div>
											<div class="xxl-16 xl-16 m-16 s-16 l-16 xs-16 padding-lr-zero">
												<div>
													<div class="xxl-16 xl-16 xs-16 xs-margin-left-0 s-16 xs-margin-left-0 m-16 m-margin-left-0 l-16 l-margin-left-0 text-darkgrey  padding-lr-zero-320 padding-lr-zero-480">
														Quick Search is the most popular search based on a few important criteria one would look for in a life partner.
													</div>
													<div class="clearfix"></div>
													<div class="xxl-16 xs-16 s-16 m-16 l-16 s-16 padding-lr-zero-320">
														<h3 class="font-15-bold-arial  title-bg">
															<i class="fa fa-search"></i> Quick Search 
														</h3>
													</div>
													<form action="<?php echo $base_url; ?>search/search_now" method="post"  class="xxl-16 xl-16 m-16 s-16 l-16 xs-16 margin-top-10px ne-basic-search padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 padding-lr-zero-999" id="quick_search_form">
                                                    <?php
														$curre_gender = $this->common_front_model->get_session_data('gender');
														if($curre_gender =='')
														{
													?>
														<div class="form-group xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-320 padding-lr-zero-480 padding-bottom-10px padding-lr-zero-xs padding-lr-zero-xs">
															<div class="xxl-4 xl-4 xs-16 s-16 m-4 l-4 src-label">
																Gender:
															</div>
															<div class="xxl-12 xl-12 xs-16 s-16 m-12 l-12 margin-top-5px-320 margin-top-5px-480 font-13-normal">
																<div class="row">
																	<div class="xxl-6 xl-6 xs-8 s-8 m-6 l-6">
																		<input id="349" type="radio" value="Male" name="gender" checked>
																		<label for="349" class="font-13-normal margin-top-2 src-choosen margin-left-10">Male</label>
																	</div>
																	<div class="xxl-6 xl-6 xs-8 s-8 m-6 l-6">
																		<input id="350" type="radio" value="Female" name="gender">
																		<label for="350" class="font-13-normal margin-top-2 src-choosen margin-left-10">Female</label>
																	</div>
																</div>
															</div>
														</div>
                                                    <?php
														}
													?>
														<div class="form-group xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-320 padding-lr-zero-480 padding-bottom-10px padding-lr-zero-xs">
															<div class="xxl-4 xs-16 s-16 m-4 xl-4 margin-top-5px l-4 src-label">
																Age:
															</div>
															<div class="xxl-12 xs-16 s-16 m-12 l-12 xl-12 margin-top-5px-320 margin-top-5px-480">
																<div class="row">
																	<div class="xxl-6 xs-16 s-7 m-7 l-6 xl-6 padding-lr-zero-xs">
																		<select class="form-control" name="from_age" id="from_age">
                                                                        <option value="">From</option>
																		<?php echo $this->common_model->array_optionstr($this->common_model->age_rang(),18);?>
																		</select>
																	</div>
																	<div class="xxl-4 xs-16 m-2 s-2 l-4 xl-4 center-text margin-top-5px padding-lr-zero-xs">
																		<label>To</label>
																	</div>
																	<div class="xxl-6 xs-16 s-7 m-7 l-6 xl-6 padding-lr-zero-xs">
																		<select class="form-control" name="to_age" id="to_age">
                                                                        	<option value="">To</option>
																			<?php echo $this->common_model->array_optionstr($this->common_model->age_rang(),30);?>
																		</select>
																	</div>
																</div>
															</div>
														</div>
														<div class="form-group xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-320 padding-lr-zero-480 padding-bottom-10px padding-lr-zero-xs">
															<div class="xxl-4 xs-16 s-16 m-4 xl-4 margin-top-5px l-4 src-label">
																Height:
															</div>
															<div class="xxl-12 xs-16 s-16 m-12 l-12 xl-12 margin-top-5px">
																<div class="row">
																	<div class="xxl-6 xs-16 s-7 m-7 l-6 xl-6 padding-lr-zero-xs">
																		<select class="form-control" name="from_height">
                                                                        	<option value="">From</option>
                                                                        <?php echo $this->common_model->array_optionstr($this->common_model->height_list());?>
																		</select>
																	</div>
																	<div class="xxl-4 xs-16 s-2 m-2 l-4 xl-4 center-text margin-top-5px-320 padding-lr-zero-xs">
																		<label >To</label>
																	</div>
																	<div class="xxl-6 xs-16 s-7 m-7 l-6 xl-6 padding-lr-zero-xs">
																		<select class="form-control " name="to_height">
                                                                        	<option value="">To</option>
																			<?php echo $this->common_model->array_optionstr($this->common_model->height_list());?>
																		</select>
																	</div>
																</div>
															</div>
														</div>
														
                            							<div class="form-group xxl-16 xl-16 l-16 m-16 s-16 xs-16  padding-lr-zero-320 padding-lr-zero-480 padding-bottom-10px padding-lr-zero-xs">
															<div class="xxl-4 xs-16 s-16 m-4 xl-4 margin-top-5px l-4 src-label">
																Marital status:
															</div>
															<div class="xxl-12 xs-16 s-16 m-12 l-12 xl-12 margin-top-5px-320 margin-top-5px-480">
                                               
																<select data-placeholder="Select Marital Status" class="chosen-select form-control" multiple name="looking_for[]">
                                                                <?php echo $this->common_model->array_optionstr($this->common_model->get_list_ddr('marital_status'));?>
																</select>
															</div>
														</div>
														
														<div class="form-group xxl-16 xl-16 l-16 m-16 s-16 xs-16  padding-lr-zero-320 padding-lr-zero-480 padding-bottom-10px padding-lr-zero-xs">
															<div class="xxl-4 xs-16 s-16 m-4 xl-4 margin-top-5px l-4 src-label">
																Community:
															</div>
															<div class="xxl-12 xs-16 s-16 m-12 l-12 xl-12 margin-top-5px-320 margin-top-5px-480">
																<select data-placeholder="Select Community" id="religion" name="religion[]" class="chosen-select form-control" multiple onchange="dropdownChange_mul('religion','caste','caste_list')">
																	 <?php echo $this->common_model->array_optionstr($this->common_model->dropdown_array_table('religion'));?>
																</select>
																<div id="CasteDivloader"></div>
															</div>
														</div>
														<div class="form-group xxl-16 xl-16 l-16 m-16 s-16 xs-16  padding-lr-zero-320 padding-lr-zero-480 padding-bottom-10px padding-lr-zero-xs">
															<div class="xxl-4 xs-16 s-16 m-4 xl-4 margin-top-5px l-4 src-label">
																Diocese:
															</div>
															<div class="xxl-12 xs-16 s-16 m-12 l-12 xl-12 margin-top-5px-320 margin-top-5px-480" id="CasteDiv1">
																<select data-placeholder="Select Diocese" class="chosen-select form-control" id="caste" name="caste[]" multiple></select>
															</div>
														</div> 
														<div class="form-group xxl-16 xl-16 l-16 m-16 s-16 xs-16  padding-lr-zero-320 padding-lr-zero-480 padding-bottom-10px padding-lr-zero-xs">
															<div class="xxl-4 xs-16 s-16 m-4 xl-4 margin-top-5px l-4 src-label">
																Mother Tongue:
															</div>
															<div class="xxl-12 xs-16 s-16 m-12 l-12 xl-12 margin-top-5px-320 margin-top-5px-480">
																<select data-placeholder="Select Mother Tongue" class="chosen-select form-control" multiple name="mothertongue[]">
																 <?php echo $this->common_model->array_optionstr($this->common_model->dropdown_array_table('mothertongue'));?>
																</select>
															</div>
														</div>
														<div class="form-group xxl-16 xl-16 l-16 m-16 s-16 xs-16  padding-lr-zero-320 padding-lr-zero-480 padding-bottom-10px padding-lr-zero-xs">
															<div class="xxl-4 xs-16 s-16 m-4 xl-4 margin-top-5px l-4 src-label">
																Country:
															</div>
															<div class="xxl-12 xs-16 s-16 m-12 l-12 xl-12 margin-top-5px-320 margin-top-5px-480">
																<select data-placeholder="Select Country" id="country" name="country[]" class="chosen-select form-control" multiple onchange="dropdownChange_mul('country','state','state_list')" >
																    <?php echo $this->common_model->array_optionstr($this->common_model->dropdown_array_table('country_master'),'us');?>
																</select><div id="stateDivloader"></div>
															</div>
														</div>
														<div class="form-group xxl-16 xl-16 l-16 m-16 s-16 xs-16  padding-lr-zero-320 padding-lr-zero-480 padding-bottom-10px padding-lr-zero-xs">
															<div class="xxl-4 xs-16 s-16 m-4 xl-4 margin-top-5px l-4 src-label">
																State:
															</div>
															<div class="xxl-12 xs-16 s-16 m-12 l-12 xl-12 margin-top-5px-320 margin-top-5px-480" id="statediv">
																<select data-placeholder="Select State" class="chosen-select form-control" id="state" name="state[]" multiple onchange="dropdownChange_mul('state','city','city_list')">
																</select>
															</div>
															<div id="cityDivloader"></div>
														</div>
														<div class="form-group xxl-16 xl-16 l-16 m-16 s-16 xs-16  padding-lr-zero-320 padding-lr-zero-480 padding-bottom-10px padding-lr-zero-xs">
															<div class="xxl-4 xs-16 s-16 m-4 xl-4 margin-top-5px l-4 src-label">
																City:
															</div>
															<div class="xxl-12 xs-16 s-16 m-12 l-12 xl-12 margin-top-5px-320 margin-top-5px-480" id="citydiv">
																<select data-placeholder="Select City" class="chosen-select form-control" id="city" name="city[]" multiple>
																</select>
															</div>
														</div>
														<div class="form-group xxl-16 xl-16 l-16 m-16 s-16 xs-16  padding-lr-zero-320 padding-lr-zero-480 padding-bottom-10px padding-lr-zero-xs">
															<div class="xxl-4 xs-16 s-16 m-4 xl-4 margin-top-5px l-4 src-label">
																Education:
															</div>
															<div class="xxl-12 xs-16 s-16 m-12 l-12 xl-12 margin-top-5px-320 margin-top-5px-480">
																<select data-placeholder="Select Education" class="chosen-select form-control" multiple name="education[]">
																	<?php echo $this->common_model->array_optionstr($this->common_model->dropdown_array_table('education_detail'));?>
																</select>
															</div>
														</div>
														<div class="form-group xxl-16 xl-16 l-16 m-16 s-16 xs-16  padding-lr-zero-320 padding-lr-zero-480 padding-bottom-10px padding-lr-zero-xs">
															<div class="xxl-4 xs-16 s-16 m-4 xl-4 margin-top-5px l-4 src-label">
																Photo Setting:
															</div>
                                                            
															<div class="xxl-6 xs-16 s-16 m-12 l-12 xl-5 margin-top-5px-320 margin-top-5px-480 font-13-normal">
																<input id="360" type="checkbox" value="photo_search" name="photo_search">
																<label for="360" class="radio-clr font-13-normal">&nbsp;&nbsp;With Photo</label>
															</div>
														</div>
													
														<div class="clearfix"></div>
														<hr>
														<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-bottom-10px">
															<div class="xxl-4 xxl-margin-left-4 xl-6 xl-margin-left-1 xs-16 s-16 m-8 l-8 padding-lr-zero-xs">
                                                            <button type="submit" class="btn xxl-16 xl-16 xs-16 m-16 l-16"><i class="fa fa-search"></i> Search</button>
														</div>
                                  <?php if(isset($current_login_user) && $current_login_user!='' && $current_login_user > 0)
										{?>
															<div class="xxl-5 xxl-margin-left-2 xl-6 xl-margin-left- xs-16 s-16 m-8 l-8 padding-lr-zero-xs">
															<a data-toggle="modal" data-target="#myModal_visiblity" class="btn xxl-16 xl-16 xs-16 m-16 l-16"><i class="fa fa-save"></i> Save and Search</a>
															</div>
                                          <?php } ?>
														</div>
                                                        <input type="hidden" name="search_page_nm" value="Quick Search" />
                                                        <input type="hidden" name="save_search" id="save_search" value="" >
                                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" />
													</form>
												</div>
											</div>
										</div>  
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				
                	<?php $this->load->view('front_end/member_slider_footer'); ?>
                    
				</div>
                
				<?php $this->load->view('front_end/search_sidebar'); ?>
                
			</div>
			<div class="clearfix"></div>
		</div> 
<!-- =========== <div class="container"> End=========== -->	
	<div class="margin-top-30"></div>
	<!-- =========== for saved search data save =========== -->
 	<div id="myModal_visiblity" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><i class="fa fa-save"></i> Save Search</h4>
				</div>
                <form action="<?php echo $base_url; ?>search/search_now" name="saved_search_form" id="saved_search_form" method="post" class="" onSubmit="return save_search('quick_search_form');">
				<div class="modal-body">
					<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16">
						<div class="alert alert-success" style="overflow:hidden;box-shadow:4px 4px 0 0 #ccc;">
							<div class="xxl-13 xl-13 l-13 m-16 xs-16 s-16 xxl-margin-left-1 xl-margin-left-1 margin-top-10">
								<strong class="text-green">Save Search Name :</strong><br /><br/>
                                <input type="text" name="search_name" id="search_name" required placeholder="Enter Save Search Name"/>
                                <!--<input type="hidden" name="id_search_name" id="id_search_name">-->
							</div>
						</div>
					</div>
                    
				</div>
				<div class="clearfix"></div>
				<div class="modal-footer margin-top-10">
                    <!--<button type="submit" name="id_search" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i> Save Search</button>-->
                   <input type="button" name="id_search" value="Save and Search" class="btn btn-sm btn-success" onClick="save_search('quick_search_form');" />
					<a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</a>
				</div>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" />
                </form>
			</div>
		</div>
	</div>
	<!-- =========== for save search save data=========== -->
<?php
	$this->common_model->js_extra_code_fr.=" load_choosen_code();
	$('.button-wrap').on('click', function(){
		$(this).toggleClass('button-active');
	})
";
?>