											<div class="ne_tab_sub_tab_content ne_interest_sent_tab xxl-16 xl-16 m-16 l-16 s-16 xs-16 tab-content padding-0-5-xs" style="border:0px;">
												
												<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16">
                                                <?php
						if($this->session->flashdata('success_message'))
						{
							$success_message = $this->session->flashdata('success_message');
							if($success_message !='')
							{
								echo '<div id="mydivs" class="alert alert-success  alert-dismissable"><div class="fa fa-check">&nbsp;</div><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>'.$success_message.'</div>';
							}
						}?>
													<div class="">
														<h3 class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 margin-bottom-0px padding-bottom-10px ne-bdr-btm-lgt-grey text-darkgrey padding-lr-zero ">
															<i class="fa fa-picture-o ne_mrg_ri8_10"></i>Photo Visibility
														</h3>
														<p class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 margin-top-10px padding-lr-zero padding-bottom-10px ne-bdr-btm-lgt-grey">
															<!--Limit your visibility to others by selecting from three options below.You can password protect your photos so that only those to whom you send password can view them.-->
                                                            Limit your visibility to others by selecting from three options below.You can protect your photos so that only those to whom you accepted requests can view them.
														</p>
                                          
														<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 margin-top-10px padding-lr-zero">
														
															<div class="xxl-5 xl-5 s-16 m-5 l-16 xs-16"> 
															<label class="font-13-normal"><input  type="radio" value="0" <?php if($user_data['photo_view_status']=='0'){echo "checked";}?> name="photo_visiblity" class="ne_mrg_ri8_10 margin-top-5" onclick="photovisbility('0');" required> Hide For All</label>
															</div>
															<div class="xxl-6 xl-6 s-16 m-6 l-16 xs-16">
															<label class="font-13-normal"><input  type="radio" value="2" <?php if($user_data['photo_view_status']=='2'){echo "checked";}?> name="photo_visiblity" class="ne_mrg_ri8_10 margin-top-5" onclick="photovisbility('2');" required> Visible only to Paid Members</label>
															</div>
															<div class="xxl-5 xl-5 s-16 m-5 l-16 xs-16">
															<label class="font-13-normal"><input  type="radio" value="1" <?php if($user_data['photo_view_status']=='1'){echo "checked";}?> name="photo_visiblity" class="ne_mrg_ri8_10 margin-top-5" onclick="photovisbility('1');" required> Visible to All</label>
															</div>
											<?php 
												if($user_data['photo_view_status']=='0'){
													$display = 'display:block;';
												}else{
													$display = 'display:none;';
												}
											?>
											<div id="set_photo_password" style="<?php echo $display; ?>">
											<?php /* if($user_data['photo_password']=='' || $user_data['photo_password']=='0' ){?>
															<a class="xxl-6 xl-6 l-16 s-16 m-16 xs-16 ne_pad_btm_10px margin-top-10px-320px padding-lr-zero-320 padding-lr-zero-480 margin-top-10px-480px margin-top-10px" data-toggle="collapse" href="#collapseExamplephotopass" aria-expanded="false" aria-controls="collapseExamplephotopass">
															Set Password for protect photo
															</a>
                                            <?php }else{?>
                                            				<a class="xxl-6 xl-6 l-16 s-16 m-16 xs-16 ne_pad_btm_10px margin-top-10px-320px padding-lr-zero-320 padding-lr-zero-480 margin-top-10px-480px margin-top-10px" data-toggle="collapse" href="#collapseExamplephotopass" aria-expanded="false" aria-controls="collapseExamplephotopass">
                          							Edit Password for protect photo
                                                    </a>
                                                    <a class="xxl-2 xl-2 l-16 s-16 m-16 xs-16 ne_pad_btm_10px margin-top-10px-320px padding-lr-zero-320 padding-lr-zero-480 margin-top-10px-480px margin-top-10px" id="removephotopass" >
                          							OR
                                                    </a>
                                                    <a class="xxl-8 xl-8 l-16 s-16 m-16 xs-16 ne_pad_btm_10px margin-top-10px-320px padding-lr-zero-320 padding-lr-zero-480 margin-top-10px-480px margin-top-10px ne-cursor" onClick="removephotopass();">
                          							Remove Password from protect photo
                                                    </a>
                                                    
											<?php }*/?>	
													
														</div>
													</div>
														<div class="clearfix"></div>
														<div class="collapse" id="collapseExamplephotopass" aria-expanded="true">
																<form  method="post" name="set_photo_pass_form" id="set_photo_pass_form" onSubmit="return check_validation_photo()">
																	<div class="xxl-16 xl-16 xs-16 l-16 m-12 s-16 margin-top-15px padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 padding-lr-zero-999 padding-0-5-xs">
																		<span class="xxl-4 xl-6 xs-16 l-16 m-6 s-16 margin-top-5px">
																			Enter Your Password:
																		</span>
																		<div class="xxl-8 xl-8 xs-16 m-10 s-16">
																			<input type="password" class="form-control" name="photo_password" id="photo_password" minlength="6" style="box-shadow:1px 1px 0 0 #ccc;" required>
																		</div>
																	</div>
																			
																	<div class="xxl-16 xl-16 xs-16 l-16 m-4 s-16 margin-top-15px padding-0-5-xs">
																		<span class="xxl-4 xxl-margin-left-4 xl-4 xl-margin-left-4 xs-16 l-16 m-16 s-16">
																			<input type="submit" value="Confirm" class="btn btn-sm btn-success font-15 bold" style="box-shadow:3px 3px 0 0 #ccc;"> 		
																		</span>
																	</div>
																	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" class="hash_tocken_id"/>
																	<input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />
																</form>
															<div class="clearfix"></div>
														</div>
														<div class="clearfix"></div>
													</div>
												</div>
											</div> 