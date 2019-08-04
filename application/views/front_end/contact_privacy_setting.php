<div class="ne_tab_sub_tab_content ne_interest_sent_tab xxl-16 xl-16 m-16 l-16 s-16 xs-16 tab-content" style="border:0px;">
												
												<div class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 padding-20-5-xs">                   <?php
						if($this->session->flashdata('success_message_contact'))
						{
							$success_message = $this->session->flashdata('success_message_contact');
							if($success_message !='')
							{
								echo '<div id="mydivs" class="alert alert-success  alert-dismissable"><div class="fa fa-check">&nbsp;</div><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>'.$success_message.'</div>';
							}
						}
					?>
													<div class="">
														<h3 class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 margin-bottom-0px padding-bottom-10px ne-bdr-btm-lgt-grey text-darkgrey padding-lr-zero">
															<i class="fa fa-user ne_mrg_ri8_10"></i>Contact settings 
														</h3>
														<p class="xxl-16 xl-16 xs-16 l-16 m-16 s-16 font-14 text-darkgrey margin-top-10px padding-lr-zero padding-bottom-10px ne-bdr-btm-lgt-grey">
															Your opted settings for receiving alerts through emails are mentioned here. You may choose to edit the existing settings.
														</p>
														
														<div class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 padding-lr-zero ne_pad_btm_10px ne_pad_tp_10px">
															<div class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 padding-0-5-xs">
																<b class="xxl-4 xl-4 l-6 s-16 m-6 xs-16 padding-lr-zero-320 padding-lr-zero-480 ">
																	Current Status
																</b>
																<div class="xxl-8 xl-8 l-8 s-16 m-8 xs-16 padding-lr-zero-320 padding-lr-zero-480 margin-top-10px-320px margin-top-10-xs">
                                                                <?php
															
															if($user_data['contact_view_security']=='1'){ echo "Show to all paid members";}elseif($user_data['contact_view_security']=='0'){ echo "Show to only express interest accepted and paid members.";}
															?>
	                                                     	   </div>
																<a class="xxl-4 xl-4 l-2 s-16 m-2 xs-16 ne_pad_btm_10px margin-top-10px-320px padding-lr-zero-320 padding-lr-zero-480 margin-top-10px-480px collapsed margin-top-10-xs" data-toggle="collapse" href="#collapseExamplecontact" aria-expanded="false" aria-controls="collapseExamplecontact">
																	<i class="fa fa-edit"></i> Edit
																</a>
															</div> 
															<div class="clearfix"></div>
															
															<div class="collapse" id="collapseExamplecontact" aria-expanded="false" style="height: 0px;">
																<form  method="post" name="contact_setting" id="contact_setting">
																	<div class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 ne_pad_tp_10px ne_pad_btm_10px ne-bdr-tp-lgt-grey">
																		<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 padding-lr-zero">
																			<div class="xxl-6 xl-6 l-6 m-16 xs-16 s-16">
																				<label class="font-13-normal"><input type="radio" value="1" <?php if($user_data['contact_view_security']=='1'){echo "checked";}?> name="contact_view_security" class="ne_mrg_ri8_10"  onclick="contactvisbility('1');" required >&nbsp;&nbsp;Show to all paid members</label>
																			</div>
																			<div class="xxl-10 xl-10 l-10 m-16 xs-16 s-16">
																				<label class="font-13-normal"><input type="radio" value="0" <?php if($user_data['contact_view_security']=='0'){echo "checked";}?> name="contact_view_security" class="ne_mrg_ri8_10"  onclick="contactvisbility('0');" required>&nbsp;&nbsp;Show to only express interest accepted and paid members.</label>
																			</div>
																		</div>
																	</div>
																	<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 margin-top-15px">
																		<div class="text-center">	
																			<!--<a href="#" class="btn btn-success font-15 bold"><i class="fa fa-check"></i> Save Changes</a>-->
                                                                             <!--<input type="submit" value="Save Changes" class="btn btn-sm btn-success font-15 bold"  style="box-shadow:3px 3px 0 0 #ccc;"> 	-->	
																		</div>
																	</div> 
                                                                      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" class="hash_tocken_id" />                                        <input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />
                                                <input type="hidden" name="is_post" id="is_post" value="1" />
																</form>
																<div class="clearfix"></div>
															</div>
															<div class="clearfix"></div>
														</div>
														<div class="clearfix"></div>
													</div>
												</div>
											</div>