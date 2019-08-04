<!------------------<div class="container">----Start------------------------------------>
<div class="container margin-top-20 margin-bottom-20 padding-lr-zero-xs">
			<div class="bg-border" style="padding:0 0 15px 0">
				<div class="wizard">
					<div class="wizard-inner">
						<div class="connecting-line"></div>
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active" style="width:25%;">
								<a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Some Basic Information">
									<span class="round-tab">
										<i class="fa fa-info"></i>
									</span>
								</a>
							</li>
			
							<li role="presentation" class="disabled" style="width:25%;">
								<a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Education Qualification">
									<span class="round-tab">
										<img src="<?php echo $base_url; ?>assets/front_end/images/icon/graduation1.png" alt="horoscope" style="margin-top:-7px;" />
									</span>
								</a>
							</li>
							<li role="presentation" class="disabled" style="width:25%;">
								<a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Food / Lifestyle">
									<span class="round-tab">
										<img src="<?php echo $base_url; ?>assets/front_end/images/icon/cutlery.png" alt="horoscope" style="margin-top:-7px;" />
									</span>
								</a>
							</li>
			
							<li role="presentation" class="disabled" style="width:25%;">
								<a href="#horoscope" data-toggle="tab" aria-controls="horoscope" role="tab" title="Horoscope">
									<span class="round-tab margin-left-10">
										<img src="<?php echo $base_url; ?>assets/front_end/images/icon/horoscope.gif" alt="horoscope" style="width:63%;margin-top:-7px;" />
									</span>
								</a>
							</li>
						</ul>
					</div>			
					<form role="form">
						<div class="tab-content padding-lr-zero-xs">
							<div class="tab-pane active padding-lr-zero-xs" role="tabpanel" id="step1">
								<div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero-xs">
									<h4 class="text-center text-darkgrey bold font-18 font-weight-normal"><span class="partners"></span>Thanks for Registering, Now Update Partner Preference Information</h4>
									<div class="clearfix"></div>
									<div class="font-12 pull-right text-darkgrey"><span class="font-red">* </span> Mandatory fields</div>
								</div>
								
								<div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-20px-1200 margin-top-20px-1199 margin-top-20px-999 margin-top-15px-480px margin-top-10px-320px reg-main-title padding-lr-zero-xs" style="margin-top:5px;">
									<div class="padding-lr-zero-320">
										<h3 class="font-15-bold-arial text-white title-bg">
											<i class="fa fa-lg fa-info-circle"></i> Some Basic Information
										</h3>
									</div>
								</div>
								
								<div class="xxl-12 xs-16 s-16 m-16 l-12 xl-12 padding-lr-zero-xs">
									 <form id="ne_lft_pan_list7" name="ne_lft_pan_list7" action="<?php echo $base_url; ?>my-profile/save-profile/part-basic-detail" onSubmit="return validat_function('ne_lft_pan_list7')" class="collapse margin-top-10">
                         <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id"  class="hash_tocken_id" />
                        <input type="hidden" name="is_post" value="1" />
                        <input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />
                        
                        <?php
								$member_id = $this->common_front_model->get_session_data('id');
								if(isset($member_id) && $member_id != '' )
								{
									$row_data = $this->common_model->get_count_data_manual('register',array('id'=>$member_id,'is_deleted'=>'No'),1);
									$this->common_front_model->edit_row_data = $row_data;
									$this->common_model->edit_row_data = $row_data;
									$this->common_model->mode= 'edit';
									$this->common_front_model->mode= 'edit';
								}
               					$ele_array = array(
									'looking_for'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->get_list_ddr('marital_status'),'label'=>'Looking For','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','extra_style'=>'width:100%'),
									'part_complexion'=>array('type'=>'dropdown','value_arr'=>$this->common_model->get_list_ddr('complexion'),'label'=>'Partner Complexion','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','extra_style'=>'width:100%'),
									'part_frm_age'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->age_rang(),'label'=>"Partner From Age",'class'=>'select2','extra_style'=>'width:100%'),
									'part_to_age'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->age_rang(),'label'=>"Partner To Age",'class'=>'select2','extra_style'=>'width:100%'),
									'part_height'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->height_list(),'label'=>"Partner From Height",'class'=>'select2','extra_style'=>'width:100%'),
									'part_height_to'=>array('is_required'=>'required','type'=>'dropdown','value_arr'=>$this->common_model->height_list(),'label'=>"Partner To Height",'class'=>'select2','extra_style'=>'width:100%'),
									'part_bodytype'=>array('type'=>'dropdown','value_arr'=>$this->common_model->get_list_ddr('bodytype'),'label'=>'Partner Body type','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','extra_style'=>'width:100%'),
									'part_diet'=>array('type'=>'dropdown','value_arr'=>$this->common_model->get_list_ddr('diet'),'label'=>'Partner Eating Habit','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','extra_style'=>'width:100%'),
									'part_smoke'=>array('type'=>'dropdown','value_arr'=>$this->common_model->get_list_ddr('smoke'),'label'=>'Partner Smoking Habit','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','extra_style'=>'width:100%'),
									'part_drink'=>array('type'=>'dropdown','value_arr'=>$this->common_model->get_list_ddr('drink'),'label'=>'Partner Drinking Habit','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','extra_style'=>'width:100%'),
									'part_mother_tongue'=>array('type'=>'dropdown','is_multiple'=>'yes','display_placeholder'=>'No','class'=>'select2','value_arr'=>$mother_tongue_arr,'label'=>'Partner Mothertongue','extra_style'=>'width:100%'),
									
									'part_expect'=>array('type'=>'textarea','label'=>'Expectations','extra_style'=>'width:100%')
								);
								echo $this->common_front_model->generate_common_front_form($ele_array,array('page_type'=>'edit_profile'));
						?>
										<div class="clearfix"></div>
										<div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-bottom-20 padding-lr-zero-xs">
											<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px padding-0-xs">
												<div class="">
													<div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
														<label>
														Looking For <span class="font-red">* </span>:
													</label>
												   </div>
												   <div class="clearfix visible-xs visble-sm"></div>
												   <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
														<select class="chosen-select form-control">
														   <option value="Unmarried">Unmarried</option>
														   <option value="Widow/Widower">Widow/Widower</option>
														   <option value="Divorcee">Divorcee</option>
														   <option value="Separated">Separated</option>
														</select>
												   </div>
											   </div>
											</div>
											<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px padding-0-xs">
												<div class="">
													<div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
														<label>
														Partners Age <span class="font-red">* </span>:
													</label>
												   </div>
												   <div class="clearfix visible-xs visble-sm"></div>
												   <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
													<div class="row">
														<div class="xxl-8 xl-8 l-8 m-8 s-8 xs-8">
																<select class="form-control">
																   <option value="Select Age">Select Age</option>
																   <option value="18">18 Years</option>
																   <option value="19">19 Years</option>
																   <option value="20" selected="selected">20 Years</option>
																   <option value="21">21 Years</option>
																   <option value="22">22 Years</option>
																   <option value="23">23 Years</option>
																   <option value="24">24 Years</option>
																   <option value="25">25 Years</option>
																   <option value="26">26 Years</option>
																   <option value="27">27 Years</option>
																   <option value="28">28 Years</option>
																   <option value="29">29 Years</option>
																   <option value="30">30 Years</option>
																   <option value="31">31 Years</option>
																   <option value="32">32 Years</option>
																   <option value="33">33 Years</option>
																   <option value="34">34 Years</option>
																   <option value="35">35 Years</option>
																   <option value="36">36 Years</option>
																   <option value="37">37 Years</option>
																   <option value="38">38 Years</option>
																   <option value="39">39 Years</option>
																   <option value="40">40 Years</option>
																   <option value="41">41 Years</option>
																   <option value="42">42 Years</option>
																   <option value="43">43 Years</option>
																   <option value="44">44 Years</option>
																   <option value="45">45 Years</option>
																   <option value="46">46 Years</option>
																   <option value="47">47 Years</option>
																   <option value="48">48 Years</option>
																   <option value="49">49 Years</option>
																   <option value="50">50 Years</option>
																   <option value="51">51 Years</option>
																   <option value="52">52 Years</option>
																   <option value="53">53 Years</option>
																   <option value="54">54 Years</option>
																   <option value="55">55 Years</option>
																   <option value="56">56 Years</option>
																   <option value="57">57 Years</option>
																   <option value="58">58 Years</option>
																   <option value="59">59 Years</option>
																   <option value="60">60 Years</option>                                    		
																</select>
														   </div>
														   <div class="xxl-8 xl-8 l-8 m-8 s-8 xs-8">
																<select class="form-control">
																   <option value="Select Age">Select Age</option>
																   <option value="18">18 Years</option>
																   <option value="19">19 Years</option>
																   <option value="20">20 Years</option>
																   <option value="21">21 Years</option>
																   <option value="22">22 Years</option>
																   <option value="23">23 Years</option>
																   <option value="24">24 Years</option>
																   <option value="25">25 Years</option>
																   <option value="26">26 Years</option>
																   <option value="27">27 Years</option>
																   <option value="28">28 Years</option>
																   <option value="29">29 Years</option>
																   <option value="30" selected="selected">30 Years</option>
																   <option value="31">31 Years</option>
																   <option value="32">32 Years</option>
																   <option value="33">33 Years</option>
																   <option value="34">34 Years</option>
																   <option value="35">35 Years</option>
																   <option value="36">36 Years</option>
																   <option value="37">37 Years</option>
																   <option value="38">38 Years</option>
																   <option value="39">39 Years</option>
																   <option value="40">40 Years</option>
																   <option value="41">41 Years</option>
																   <option value="42">42 Years</option>
																   <option value="43">43 Years</option>
																   <option value="44">44 Years</option>
																   <option value="45">45 Years</option>
																   <option value="46">46 Years</option>
																   <option value="47">47 Years</option>
																   <option value="48">48 Years</option>
																   <option value="49">49 Years</option>
																   <option value="50">50 Years</option>
																   <option value="51">51 Years</option>
																   <option value="52">52 Years</option>
																   <option value="53">53 Years</option>
																   <option value="54">54 Years</option>
																   <option value="55">55 Years</option>
																   <option value="56">56 Years</option>
																   <option value="57">57 Years</option>
																   <option value="58">58 Years</option>
																   <option value="59">59 Years</option>
																   <option value="60">60 Years</option>
															</select>
														   </div>
													   </div>
												   </div>
											   </div>
											</div>
											<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px padding-0-xs">
												<div class="">
													<div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
														<label>
															Partners Country Livining In <span class="font-red">* </span>:
														</label>
													</div>
													<div class="clearfix visible-xs visble-sm"></div>
													<div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
														<select class="form-control">	
															<option value="Select Disability Type">Select Disability Type</option>
															<option>Select Partners Country Living in </option>
															<option value="12">Australia</option>
															<option value="18">Bangladesh</option>
															<option value="36">Canada</option>
															<option value="44">China</option>
															<option value="60">Western Sahara</option>
															<option value="91">Indonesia</option>
															<option value="95">India</option>
															<option value="104">Japan</option>
															<option value="145">Malaysia</option>
															<option value="216">Uruguay</option>
															<option value="217">Uzbekistan</option>
															<option value="219">Venezuela</option>
															<option value="221">Vietnam</option>
															<option value="222">Vanuatu</option>
															<option value="223">Wallis And Futuna</option>
															<option value="226">Yemen</option>
															<option value="229">Zambia</option>
															<option value="230">Zimbabwe</option>
															<option value="237">testing</option>
															<option value="238">srilanka</option>
															<option value="239">srilanka</option>
														</select>
													</div>
												</div>
											</div>
											<div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-20px padding-0-xs">
												<div class="">
													<div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
														<label>
															Partners State <span class="font-red">* </span>:
														</label>
													</div>
													<div class="clearfix visible-xs"></div>
													<div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
														<select class="form-control">
															<option value="Select City">Select State</option>
															<option value="">Gujarat</option>
															<option value="">Maharastra</option>
															<option value="">Tamil Nadu</option>
															<option value="">Uttar Pradesh</option>
															<option value="">Rajasthan</option>
															<option value="">Madhya Pradesh</option>
															<option value="">Assam</option>
															<option value="">Bihar</option>
															<option value="">Sikkim</option>
															<option value="">Jammu & Kashmir</option>
														</select>
													</div>
												</div>
											</div>
											<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px padding-0-xs">
												<div class="">
													<div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
														<label>
															Partners Religion <span class="font-red">* </span>:
														</label>
													</div>
													<div class="clearfix visible-xs visble-sm"></div>
													<div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
														<select class="chosen-select form-control">
															<option>Select Partners Religion</option>
															<option value="">abcd</option>
															<option value="">Bhudhism</option>
															<option value="">Christans</option>
															<option value="">Hindu</option>
															<option value="">Muslim</option>
															<option value="">Muslim</option>
														</select>
													</div>
												</div>
											</div>
											<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px padding-0-xs">
												<div class="">
													<div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
														<label>
														Partners Community <span class="font-red">* </span>:
													</label>
												   </div>
												   <div class="clearfix visible-xs visble-sm"></div>
												   <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
														<select class="form-control">
														   <option value="">Select First Partners Religion</option>
															<option value="">Patel</option>
															<option value="">Prajapati</option>
															<option value="">Panchal</option>
															<option value="">Sheilh</option>
															<option value="">Kachhad</option>
															<option value="">Thakar</option>
															<option value="">Pathak</option>
															<option value="">Godaad</option>
															<option value="">Barot</option>
															<option value="">Sharma</option>
															<option value="">Suthar</option>
															<option value="">Darji</option>
															<option value="">Nai</option>
													   </select>
													   <div class="clearfix margin-top-5"></div>
													   <input id="chk1" type="checkbox" name="photo_search" value="Yes" class=""> <label for="chk1" class="font-12 text-darkgrey margin-top-5px" style="display: inline;">Only members who selected 'Caste No Bar" <span class="tooltip_stay"><span class="text-left help-img-normal"></span> <span class="tooltiptext">Choosing this option will display profiles who are willing to marry into any caste. <br/><br/> <strong>Note:</strong> Number of results might be less if you select this option.</span></span></label>
												   </div>
											   </div>
											</div>
											<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px padding-0-xs">
												<div class="">
													<div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
														<label>
														Mother Tongue: <span class="font-red">* </span>:
													</label>
												   </div>
												   <div class="clearfix visible-xs visble-sm"></div>
												   <div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
														<select class="form-control">
															<option value="">Select Your Partners Religion</option>
															<option value="17">Aka</option>
															<option value="56">Arabic</option>
															<option value="18">Assamese</option>
															<option value="19">Awadhi</option>
															<option value="10">Bengali</option>
															<option value="20">Bhojpuri</option>
															<option value="21">Bhutia</option>
															<option value="22">Chatlisgarhi</option>
															<option value="23">Chinese</option>
															<option value="24">Dogri</option>
															<option value="5">English</option>
															<option value="25">French</option>
															<option value="26">Garhwali</option>
															<option value="27">Garo</option>
															<option value="3">Gujarati</option>
															<option value="28">Haryanvi</option>
															<option value="58">Hindi</option>
															<option value="29">Kakbarak</option>
															<option value="30">Kanauji</option>
															<option value="11">Kannada</option>
															<option value="31">Kashmiri</option>
															<option value="32">Khandesi</option>
															<option value="33">Khasi</option>
															<option value="13">Konkani</option>
															<option value="34">Koshali</option>
															<option value="35">Kumoani</option>
															<option value="36">Kutchi</option>
															<option value="37">Lepcha</option>
															<option value="38">Magahi</option>
															<option value="39">Maithili</option>
															<option value="40">Malay</option>
															<option value="9">Malayalam</option>
															<option value="7">Marathi</option>
															<option value="16">Marwari</option>
															<option value="41">Miji</option>
															<option value="42">Mizo</option>
															<option value="43">Monpa</option>
															<option value="44">Nepali</option>
															<option value="14">Oriya</option>
															<option value="54">Other</option>
															<option value="45">Persian</option>
															<option value="6">Punjabi</option>
															<option value="46">Rajasthani</option>
															<option value="47">Russian</option>
															<option value="48">Sanskrit</option>
															<option value="49">Santhali</option>
															<option value="55">Sindhi</option>
															<option value="12">Sindhi</option>
															<option value="50">Spanish</option>
															<option value="51">Swedish</option>
															<option value="52">Tagalog</option>
															<option value="1">Tamil</option>
															<option value="8">Telugu</option>
															<option value="64">Tulu</option>
															<option value="63">Urdu</option>
													   </select>
												   </div>
											   </div>
											</div>
											
											<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px padding-0-xs">
												<div class="">
													<div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
														<label>
															Marital Status <span class="font-red">* </span>:
														</label>
													</div>
													<div class="clearfix visible-xs"></div>
													<div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
														<select class="form-control">
															<option value="">Select Partners Marital Status</option>
															<option value="Unmarried">Unmarried</option>
															<option value="Widow/Widower">Widow/Widower</option>
															<option value="Divorcee">Divorcee</option>
															<option value="Separated">Separated</option>
														</select>
													</div>
												</div>
											</div>
											
											<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px padding-0-xs">
												<div class="">
													<div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
														<label>
														Partners have Children ? <span class="font-red">* </span>:
														</label>
													</div>
													<div class="clearfix visible-xs"></div>
													<div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
														<select class="form-control">
															<option value="">Select About Partners Children</option>
															<option value="">Doesn't Metter</option>
															<option value="">No</option>
															<option value="">Yes</option>
														</select>
													</div>
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
									</form>
								</div>
								
								<div class="xxl-4 xs-16 s-16 m-16 l-4 xl-4 margin-top-30 padding-lr-zero-xs hidden-xs">
									<div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-30 text-center">
										<h4 class="text-darkgrey font-13 bold">Why Register ?</h4>
										<hr>
										
										<div class="carousel slide" data-ride="carousel" id="quote-carousel_1">
											<div class="carousel-inner">
												<div class="item active">
													<div class="owl-carousel xxl-16 padding-lr-zero">
														<div class="margin-top-10">
															<div class="reg-sprtie profile"></div>
															<p class="sprite-caption">Lakhs of Genuine <br/>Profiles</p>
														</div>
														<div class="clearfix"></div>
														<center><hr style="width:50%;"></center>
														<div class="margin-top-15">
															<div class="reg-sprtie man"></div>
															<p class="sprite-caption">Many Verified by <br/>Personal Visit</p>
														</div>
													</div>
												</div>
												<div class="item">
													<div class="owl-carousel xxl-16 padding-lr-zero">
														<div class="margin-top-10">
															<div class="reg-sprtie secure"></div>
															<p class="sprite-caption">Secure & <br/>Family Friendly</p>
														</div>
														<div class="clearfix"></div>
														<center><hr style="width:50%;"></center>
														<div class="margin-top-15">
															<div class="reg-sprtie privacy-key"></div>
															<p class="sprite-caption">Strict <br/>Privacy Control</p>
														</div>
													</div>
												</div>
											</div>
											<a data-slide="prev" href="#quote-carousel_1" class="left carousel-control" style="color:#F9A630;"><img class="img-circle" src="<?php echo $base_url; ?>assets/front_end/images/icon/arrow-lft-mh.gif"></a>
											<a data-slide="next" href="#quote-carousel_1" class="right carousel-control" style="color:#F9A630;"><img class="img-circle" src="<?php echo $base_url; ?>assets/front_end/images/icon/arrow-rgt-mh.gif"></a>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<hr>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
									<a href="#" class="text-white font-15 bold btn pull-right btn-md next-step" style="padding:8px 10px;">Save and continue <i class="fa fa-chevron-right"></i></a>
								</div>
							</div>
							<div class="clearfix"></div>
							
							<div class="tab-pane padding-lr-zero-xs" role="tabpanel" id="step2">
								<div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero-xs">
									<h4 class="text-center text-darkgrey bold font-18 font-weight-normal">Add your Education Information to make stronger Your Profile</h4>
									<div class="clearfix"></div>
									<div class="font-12 pull-right text-darkgrey"><span class="font-red">* </span> Mandatory fields</div>
								</div>
								
								<div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-20px-1200 margin-top-20px-1199 margin-top-20px-999 margin-top-15px-480px margin-top-10px-320px reg-main-title padding-lr-zero-xs" style="margin-top:5px;">
									<h3 class="font-15-bold-arial title-bg">
										<a href="#" class="text-white">
											<i class="fa fa-graduation-cap"></i> Education / Occupation Details:
										</a>
									</h3>
								</div>
								<div class="clearfix"></div>
								
								<div class="xxl-12 xs-16 s-16 m-16 l-12 xl-12 padding-lr-zero-xs">
									<form>
										<div class="clearfix"></div>
										<div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-bottom-20 padding-lr-zero-xs">
											<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px padding-0-xs">
												<div class="row">
													<div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
														<label>
															Partners Education Level <span class="font-red">* </span>:
														</label>
													</div>
													<div class="clearfix visible-xs"></div>
													<div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
														<select class="form-control">
															<option value="Select Education Level">Select Education Level</option>
															<option value="">Doesn't metter</option>
															<option value="">Trade School</option>
															<option value="">High School</option>
															<option value="">Diploma</option>
															<option value="">Less than High School</option>
															<option value="">Degree</option>
															<option value="">Master Degree</option>
															<option value="">Doctorate</option>
															<option value="">Bachelor</option>
															<option value="">Undergraduate</option>
															<option value="">Associate Degree</option>
														</select>
													</div>
												</div>
											</div>
											
											<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px padding-0-xs">
												<div class="row">
													<div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
														<label>
															Partners Education Field <span class="font-red">* </span>:
														</label>
													</div>
													<div class="clearfix visible-xs"></div>
													<div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
														<select class="form-control">
															<option value="Select Education Field">Select Education Field</option>
															<option value="">Doesn't metter</option>
															<option value="">B Arch</option>
															<option value="">B Com</option>
															<option value="">B Phil</option>
															<option value="">B Plan</option>
															<option value="">B Tech</option>
															<option value="">B.Pharm</option>
															<option value="">BA</option>
															<option value="">Bachelor of engineering</option>
															<option value="">Bachelor Of Law</option>
															<option value="">Bachelor of Science</option>
															<option value="">Bachelor Of Veterinary Science</option>
															<option value="">BAMS</option>
															<option value="">BBA</option>
															<option value="">BCA</option>
															<option value="">BDS</option>
															<option value="">BE</option>
															<option value="">BEd</option>
															<option value="">BFA</option>
															<option value="">BFM (Financial Management)</option>
															<option value="">BGL</option>
															<option value="">BHM</option>
															<option value="">BHMS</option>
															<option value="">BLIS</option>
															<option value="">BMM (MASS MEDIA)</option>
															<option value="">BPT</option>
															<option value="">BSc Computer Science</option>
															<option value="">BSc IT</option>
															<option value="">BSc Nursing</option>
															<option value="">BSW</option>
															<option value="">CA Final</option>
															<option value="">CA Inter</option>
															<option value="">CFA (Chartered Financial Analyst)</option>
															<option value="">CNC OP</option>
															<option value="">Company Secretary (CS)</option>
															<option value="">Degree In Medicine</option>
															<option value="">Diploma</option>
															<option value="">Diploma In Nursing</option>
															<option value="">DM - Doctorate Of Medicine</option>
															<option value="">General-Help</option>
															<option value="">High School</option>
															<option value="">IAS</option>
															<option value="">ICWA</option>
															<option value="">IPS</option>
															<option value="">IRS</option>
															<option value="">Less Than High School</option>
															<option value="">LLB</option>
															<option value="">LLM</option>
															<option value="">M Arch</option>
															<option value="">M Com</option>
															<option value="">M Phil</option>
															<option value="">M Sc</option>
															<option value="">M Tech</option>
															<option value="">M.Pharm</option>
															<option value="">MA</option>
															<option value="">MAMS</option>
															<option value="">Master In Medicine</option>
															<option value="">Master of Arts (M.A.)</option>
															<option value="">Master Of Law</option>
															<option value="">Master Of Veterinary Science</option>
															<option value="">MBA</option>
															<option value="">MBBS</option>
															<option value="">MCA</option>
															<option value="">MCh - Master Of Chirurgiae</option>
															<option value="">MD / MS (Medical)</option>
															<option value="">MDS</option>
															<option value="">ME</option>
															<option value="">Mechanical engineering technology</option>
															<option value="">MEd</option>
															<option value="">Medical Laboratory Technology</option>
															<option value="">MFM (Financial Management)</option>
															<option value="">MHM</option>
															<option value="">MHMS</option>
															<option value="">MLIS</option>
															<option value="">MPT</option>
															<option value="">MSc Computer Science</option>
															<option value="">MSc IT</option>
															<option value="">MSc Nursing</option>
															<option value="">MSW</option>
															<option value="">Other Education</option>
															<option value="">PGDCA</option>
															<option value="">PGDM</option>
															<option value="">Ph D</option>
															<option value="">Polytechnic</option>
															<option value="">Registered Nurse</option>
															<option value="">Registered Practical Nurse</option>
															<option value="">Truck Driver</option>
															<option value="">Welder</option>
														</select>
													</div>
												</div>
											</div>
											
											<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px padding-0-xs">
												<div class="row">
													<div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
														<label>
															Partners Working with <span class="font-red">* </span>:
														</label>
													</div>
													<div class="clearfix visible-xs"></div>
													<div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
														<select class="form-control">
															<option value="Select Sector">Select Sector</option>
															<option value="">Does not matter</option>
															<option value="">Private Company</option>
															<option value="">Government / Public Sector</option>
															<option value="">Defense / Civil Service</option>
															<option value="">Business / Self employed</option>
															<option value="">Not Working</option>
															<option value="">Looking for work</option>
														</select>
													</div>
												</div>
											</div>
											
											<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px padding-0-xs">
												<div class="row">
													<div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
														<label>
															Partners Occupation <span class="font-red">* </span>:
														</label>
													</div>
													<div class="clearfix visible-xs"></div>
													<div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
														<select class="form-control">
															<option value="Select Partners Occupation">Select Partners Occupation</option>
															<option value="">Does not matter</option>
															<option value="">Accounts</option>
															<option value="">Banking</option>
															<option value="">Civil Engineer</option>
															<option value="">Clerical Official</option>
															<option value="">CNC OP</option>
															<option value="">Commercial Pilot</option>
															<option value="">Company Secretary</option>
															<option value="">Computer Professional</option>
															<option value="">Computer tech</option>
															<option value="">Consultant</option>
															<option value="">Contractor</option>
															<option value="">Cost Accountant</option>
															<option value="">Creative Person</option>
															<option value="">Customer Support Professional</option>
															<option value="">Defense Employee</option>
															<option value="">Dentist</option>
															<option value="">Designer</option>
															<option value="">Doctor</option>
															<option value="">Economist</option>
															<option value="">Engineer</option>
															<option value="">Engineer (Mechanical)</option>
															<option value="">Engineer (Project)</option>
															<option value="">Entertainment Professional</option>
															<option value="">Event Manager</option>
															<option value="">Executive</option>
															<option value="">Factory worker</option>
															<option value="">Farmer</option>
															<option value="">Fashion Designer</option>
															<option value="">Finance Professional</option>
															<option value="">Flight Attendant</option>
															<option value="2">Genral Helper</option>
															<option value="">Government Employee</option>
															<option value="">Health Care Professional</option>
															<option value="">Home Maker</option>
															<option value="">Hotel & Restaurant Professional</option>
															<option value="">Human Resources Professional</option>
															<option value="">Interior Designer</option>
															<option value="">Investment Professional</option>
															<option value="">IT / Telecom Professional</option>
															<option value="">Journalist</option>
															<option value="">Lawyer</option>
															<option value="">Lecturer</option>
															<option value="">Legal Professional</option>
															<option value="">Manager</option>
															<option value="">Marketing Professional</option>
															<option value="">Media Professional</option>
															<option value="">Medical Professional</option>
															<option value="">Medical Transcriptionist</option>
															<option value="">Merchant Naval Officer</option>
															<option value="">Nurse</option>
															<option value="">Occupational Therapist</option>
															<option value="">Optician</option>
															<option value="">Others</option>
															<option value="3">Own Business</option>
															<option value="">Pharmacist</option>
															<option value="">Physician Assistant</option>
															<option value="">Physicist</option>
															<option value="">Physiotherapist</option>
															<option value="">Pilot</option>
															<option value="">Politician</option>
															<option value="">Production professional</option>
															<option value="">Professor</option>
															<option value="">Psychologist</option>
															<option value="">Public Relations Professional</option>
															<option value="">Real Estate Professional</option>
															<option value="">Research Scholar</option>
															<option value="">Retail Professional</option>
															<option value="">Retired Person</option>
															<option value="">Risk analyst</option>
															<option value="">Sales Professional</option>
															<option value="">Scientist</option>
															<option value="">Self-employed Person</option>
															<option value="">Social Worker</option>
															<option value="">Software Engineer</option>
															<option value="">Sportsman</option>
															<option value="">Student</option>
															<option value="">Teacher</option>
															<option value="">Technician</option>
															<option value="">Training Professional</option>
															<option value="">Transportation Professional</option>
															<option value="">Truck Driver</option>
															<option value="">Veterinary Doctor</option>
															<option value="">Volunteer</option>
														</select>
													</div>
												</div>
											</div>
											
											<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px padding-0-xs">
												<div class="row">
													<div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
														<label>
															Annual Income <span class="font-red">* </span>:
														</label>
													</div>
													<div class="clearfix visible-xs"></div>
													<div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
														<select class="form-control">
															<option value="Select Annual Income">Select Annual Income</option>
															<option value="">Select Annual Income</option>
															<option value="">Does not matter</option>
															<option value="Rs 10,000 - 50,000">Rs 10,000 - 50,000</option>
															<option value="Rs 50,000 - 1,00,000">Rs 50,000 - 1,00,000</option>
															<option value="Rs 1,00,000 - 2,00,000">Rs 1,00,000 - 2,00,000</option>
															<option value="Rs 2,00,000 - 5,00,000">Rs 2,00,000 - 5,00,000</option>
															<option value="Rs 5,00,000 - 10,00,000">Rs 5,00,000 - 10,00,000</option>
															<option value="Rs 10,00,000 - 50,00,000">Rs 10,00,000 - 50,00,000</option>
															<option value="Rs 50,00,000 - 1,00,00,000">Rs 50,00,000 - 1,00,00,000</option>
															<option value="Above Rs 1,00,00,000">Above Rs 1,00,00,000</option>
														</select>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
								
								<div class="xxl-4 xs-16 s-16 m-16 l-4 xl-4 padding-lr-zero-xs hidden-xs">
									<div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-10 text-center">
										<h4 class="text-darkgrey font-13 bold">Why Register ?</h4>
										<hr>
										
										<div class="carousel slide" data-ride="carousel" id="quote-carousel_2">
											<div class="carousel-inner">
												<div class="item active">
													<div class="owl-carousel xxl-16 padding-lr-zero">
														<div class="margin-top-10">
															<div class="reg-sprtie profile"></div>
															<p class="sprite-caption">Lakhs of Genuine <br/>Profiles</p>
														</div>
														<div class="clearfix"></div>
														<center><hr style="width:50%;"></center>
														<div class="margin-top-15">
															<div class="reg-sprtie man"></div>
															<p class="sprite-caption">Many Verified by <br/>Personal Visit</p>
														</div>
													</div>
												</div>
												<div class="item">
													<div class="owl-carousel xxl-16 padding-lr-zero">
														<div class="margin-top-10">
															<div class="reg-sprtie secure"></div>
															<p class="sprite-caption">Secure & <br/>Family Friendly</p>
														</div>
														<div class="clearfix"></div>
														<center><hr style="width:50%;"></center>
														<div class="margin-top-15">
															<div class="reg-sprtie privacy-key"></div>
															<p class="sprite-caption">Strict <br/>Privacy Control</p>
														</div>
													</div>
												</div>
											</div>
											<a data-slide="prev" href="#quote-carousel_2" class="left carousel-control" style="color:#F9A630;"><img class="img-circle" src="<?php echo $base_url; ?>assets/front_end/images/icon/arrow-lft-mh.gif"></a>
											<a data-slide="next" href="#quote-carousel_2" class="right carousel-control" style="color:#F9A630;"><img class="img-circle" src="<?php echo $base_url; ?>assets/front_end/images/icon/arrow-rgt-mh.gif"></a>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<hr>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
									<a href="#" class="text-white font-15 bold btn pull-left btn-md prev-step" style="padding:8px 10px;"><i class="fa fa-chevron-left"></i> Previous</a>
									<a href="#" class="text-white font-15 bold btn pull-right btn-md next-step" style="padding:8px 10px;">Save and continue <i class="fa fa-chevron-right"></i></a>
								</div>
							</div>
							
							<div class="tab-pane padding-lr-zero-xs" role="tabpanel" id="step3">
								<div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero-xs">
									<h4 class="text-center text-darkgrey bold font-18 font-weight-normal">Add your Partners Eating habits / Drinking / Smoking</h4>
									<div class="clearfix"></div>
									<div class="font-12 pull-right text-darkgrey"><span class="font-red">* </span> Mandatory fields</div>
								</div>
								
								<div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-20px-1200 margin-top-20px-1199 margin-top-20px-999 margin-top-15px-480px margin-top-10px-320px reg-main-title padding-lr-zero-xs" style="margin-top:5px;">
									<h3 class="font-15-bold-arial title-bg">
										<a href="#" class="text-white">
											<i class="fa fa-cutlery"></i> Eating habits / Drinking / Smoking / Lifestyle Details:
										</a>
									</h3>
								</div>
								<div class="clearfix"></div>
								
								<div class="xxl-12 xs-16 s-16 m-16 l-12 xl-12 padding-lr-zero-xs">
									<form>
										<div class="clearfix"></div>
										<div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-bottom-20 padding-lr-zero-xs">
											<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px padding-0-xs">
												<div class="row">
													<div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
														<label>
															Partners Eating Habits <span class="font-red">* </span>: 
														</label>
														<span class="tooltip_stay"><span class="text-left help-img-normal"></span> <span class="tooltiptext">Vegan diet excludes all meat, fish and dairy products as well as any food derived from a living animal such as eggs. <br/><br/> A Vegan person is a strict vegetarian, who eats only foods of plant origin. </span></span>
													</div>
													<div class="clearfix visible-xs"></div>
													<div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
														<select class="form-control">
															<option value="Select Eating Habits">Select Eating Habits</option>
															<option value="Occasionally Non-Veg">Occasionally Non-Veg</option>
															<option value="Veg">Veg</option>
															<option value="Eggetarian">Eggetarian</option>
															<option value="Occasionally Non-Veg">Occasionally Non-Veg</option>
															<option value="Non-Veg">Non-Veg</option>
														</select>
													</div>
												</div>
											</div>
											
											<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px padding-0-xs">
												<div class="row">
													<div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
														<label>
															Drinking <span class="font-red">* </span>:
														</label>
													</div>
													<div class="clearfix visible-xs"></div>
													<div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
														<select class="form-control">
															<option value="Select about Drinking">Select about Drinking</option>
															<option value="No">No</option>
															<option value="Yes">Yes</option>
															<option value="Occasionally">Occasionally</option>
														</select>
													</div>
												</div>
											</div>
											
											<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px padding-0-xs">
												<div class="row">
													<div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
														<label>
															Smoking <span class="font-red">* </span>:
														</label>
													</div>
													<div class="clearfix visible-xs"></div>
													<div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
														<select class="form-control">
															<option value="Select about Smoking">Select about Smoking</option>
															<option value="No">No</option>
															<option value="Yes">Yes</option>
															<option value="Occasionally">Occasionally</option>
														</select>
													</div>
												</div>
											</div>
											
											<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px padding-0-xs">
												<div class="row">
													<div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
														<label>
															Height <span class="font-red">* </span>:
														</label>
													</div>
													<div class="clearfix visible-xs"></div>
													<div class="xxl-11 xs-16 s-16 m-11 l-11 xl-11 margin-top-5px">
														<div class="row">
															<div class="xxl-6 xs-7 s-7 m-7 l-6 xl-6">
																<select class="form-control" name="from_height">
																	<option value="">From</option>
																	<option value="48">Below 4ft</option>
																	<option value="54" selected>4ft 06in</option>
																	<option value="55">4ft 07in</option>
																	<option value="56">4ft 08in</option>
																	<option value="57">4ft 09in</option>
																	<option value="58">4ft 10in</option>
																	<option value="59">4ft 11in</option>
																	<option value="60">5ft</option>
																	<option value="61">5ft 01in</option>
																	<option value="62">5ft 02in</option>
																	<option value="63">5ft 03in</option>
																	<option value="64">5ft 04in</option>
																	<option value="65">5ft 05in</option>
																	<option value="66">5ft 06in</option>
																	<option value="67">5ft 07in</option>
																	<option value="68">5ft 08in</option>
																	<option value="69">5ft 09in</option>
																	<option value="70">5ft 10in</option>
																	<option value="71">5ft 11in</option>
																	<option value="72">6ft</option>
																	<option value="73">6ft 01in</option>
																	<option value="74">6ft 02in</option>
																	<option value="75">6ft 03in</option>
																	<option value="76">6ft 04in</option>
																	<option value="77">6ft 05in</option>
																	<option value="78">6ft 06in</option>
																	<option value="79">6ft 07in</option>
																	<option value="80">6ft 08in</option>
																	<option value="81">6ft 09in</option>
																	<option value="82">6ft 10in</option>
																	<option value="83">6ft 11in</option>
																	<option value="84">7ft</option>
																	<option value="85">Above 7ft</option>
																</select>
															</div>
															<div class="xxl-4 xs-2 s-2 m-2 l-4 xl-4 center-text margin-top-5px-320 margin-top-5">
																<label >To</label>
															</div>
															<div class="xxl-6 xs-7 s-7 m-7 l-6 xl-6">
																<select class="form-control" name="to_height">
																	<option value="">To</option>
																	<option value="48">Below 4ft</option>
																	<option value="54">4ft 06in</option>
																	<option value="55">4ft 07in</option>
																	<option value="56">4ft 08in</option>
																	<option value="57">4ft 09in</option>
																	<option value="58">4ft 10in</option>
																	<option value="59">4ft 11in</option>
																	<option value="60">5ft</option>
																	<option value="61">5ft 01in</option>
																	<option value="62">5ft 02in</option>
																	<option value="63">5ft 03in</option>
																	<option value="64">5ft 04in</option>
																	<option value="65">5ft 05in</option>
																	<option value="66">5ft 06in</option>
																	<option value="67">5ft 07in</option>
																	<option value="68">5ft 08in</option>
																	<option value="69">5ft 09in</option>
																	<option value="70">5ft 10in</option>
																	<option value="71">5ft 11in</option>
																	<option value="72" selected>6ft</option>
																	<option value="73">6ft 01in</option>
																	<option value="74">6ft 02in</option>
																	<option value="75">6ft 03in</option>
																	<option value="76">6ft 04in</option>
																	<option value="77">6ft 05in</option>
																	<option value="78">6ft 06in</option>
																	<option value="79">6ft 07in</option>
																	<option value="80">6ft 08in</option>
																	<option value="81">6ft 09in</option>
																	<option value="82">6ft 10in</option>
																	<option value="83">6ft 11in</option>
																	<option value="84">7ft</option>
																	<option value="85">Above 7ft</option>
																</select>
															</div>
														</div>
													</div>
												</div>
											</div>
											
											<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px padding-0-xs">
												<div class="row">
													<div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
														<label>
															Weight <span class="font-red">* </span>:
														</label>
													</div>
													<div class="clearfix visible-xs"></div>
													<div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
														<div class="row">
															<div class="xxl-6 xs-7 s-7 m-7 l-6 xl-6">
																<select class="form-control" name="weight" data-validetta="required">
																	<option value="">Your Weight From</option>
																	<option value="40">40 Kg</option>
																	<option value="41">41 Kg</option>
																	<option value="42">42 Kg</option>
																	<option value="43">43 Kg</option>
																	<option value="44">44 Kg</option>
																	<option value="45">45 Kg</option>
																	<option value="46">46 Kg</option>
																	<option value="47">47 Kg</option>
																	<option value="48">48 Kg</option>
																	<option value="49">49 Kg</option>
																	<option value="50">50 Kg</option>
																	<option value="51">51 Kg</option>
																	<option value="52">52 Kg</option>
																	<option value="53">53 Kg</option>
																	<option value="54">54 Kg</option>
																	<option value="55">55 Kg</option>
																	<option value="56">56 Kg</option>
																	<option value="57">57 Kg</option>
																	<option value="58">58 Kg</option>
																	<option value="59">59 Kg</option>
																	<option value="60">60 Kg</option>
																	<option value="61">61 Kg</option>
																	<option value="62">62 Kg</option>
																	<option value="63">63 Kg</option>
																	<option value="64">64 Kg</option>
																	<option value="65">65 Kg</option>
																	<option value="66">66 Kg</option>
																	<option value="67">67 Kg</option>
																	<option value="68">68 Kg</option>
																	<option value="69">69 Kg</option>
																	<option value="70">70 Kg</option>
																	<option value="71">71 Kg</option>
																	<option value="72">72 Kg</option>
																	<option value="73">73 Kg</option>
																	<option value="74">74 Kg</option>
																	<option value="75">75 Kg</option>
																	<option value="76">76 Kg</option>
																	<option value="77">77 Kg</option>
																	<option value="78">78 Kg</option>
																	<option value="79">79 Kg</option>
																	<option value="80">80 Kg</option>
																	<option value="81">81 Kg</option>
																	<option value="82">82 Kg</option>
																	<option value="83">83 Kg</option>
																	<option value="84">84 Kg</option>
																	<option value="85">85 Kg</option>
																	<option value="86">86 Kg</option>
																	<option value="87">87 Kg</option>
																	<option value="88">88 Kg</option>
																	<option value="89">89 Kg</option>
																	<option value="90">90 Kg</option>
																	<option value="91">91 Kg</option>
																	<option value="92">92 Kg</option>
																	<option value="93">93 Kg</option>
																	<option value="94">94 Kg</option>
																	<option value="95">95 Kg</option>
																	<option value="96">96 Kg</option>
																	<option value="97">97 Kg</option>
																	<option value="98">98 Kg</option>
																	<option value="99">99 Kg</option>
																	<option value="100">100 Kg</option>
																	<option value="101">101 Kg</option>
																	<option value="102">102 Kg</option>
																	<option value="103">103 Kg</option>
																	<option value="104">104 Kg</option>
																	<option value="105">105 Kg</option>
																	<option value="106">106 Kg</option>
																	<option value="107">107 Kg</option>
																	<option value="108">108 Kg</option>
																	<option value="109">109 Kg</option>
																	<option value="110">110 Kg</option>
																	<option value="111">111 Kg</option>
																	<option value="112">112 Kg</option>
																	<option value="113">113 Kg</option>
																	<option value="114">114 Kg</option>
																	<option value="115">115 Kg</option>
																	<option value="116">116 Kg</option>
																	<option value="117">117 Kg</option>
																	<option value="118">118 Kg</option>
																	<option value="119">119 Kg</option>
																	<option value="120">120 Kg</option>
																	<option value="121">121 Kg</option>
																	<option value="122">122 Kg</option>
																	<option value="123">123 Kg</option>
																	<option value="124">124 Kg</option>
																	<option value="125">125 Kg</option>
																	<option value="126">126 Kg</option>
																	<option value="127">127 Kg</option>
																	<option value="128">128 Kg</option>
																	<option value="129">129 Kg</option>
																	<option value="130">130 Kg</option>
																	<option value="131">131 Kg</option>
																	<option value="132">132 Kg</option>
																	<option value="133">133 Kg</option>
																	<option value="134">134 Kg</option>
																	<option value="135">135 Kg</option>
																	<option value="136">136 Kg</option>
																	<option value="137">137 Kg</option>
																	<option value="138">138 Kg</option>
																	<option value="139">139 Kg</option>
																	<option value="140">140 Kg</option>
																</select>
															</div>
															<div class="xxl-4 xs-2 s-2 m-2 l-4 xl-4 center-text margin-top-5px-320 margin-top-5">
																<label >To</label>
															</div>
															<div class="xxl-6 xs-7 s-7 m-7 l-6 xl-6">
																<select class="form-control" name="weight" data-validetta="required">
																	<option value="">Your Weight to</option>
																	<option value="40">40 Kg</option>
																	<option value="41">41 Kg</option>
																	<option value="42">42 Kg</option>
																	<option value="43">43 Kg</option>
																	<option value="44">44 Kg</option>
																	<option value="45">45 Kg</option>
																	<option value="46">46 Kg</option>
																	<option value="47">47 Kg</option>
																	<option value="48">48 Kg</option>
																	<option value="49">49 Kg</option>
																	<option value="50">50 Kg</option>
																	<option value="51">51 Kg</option>
																	<option value="52">52 Kg</option>
																	<option value="53">53 Kg</option>
																	<option value="54">54 Kg</option>
																	<option value="55">55 Kg</option>
																	<option value="56">56 Kg</option>
																	<option value="57">57 Kg</option>
																	<option value="58">58 Kg</option>
																	<option value="59">59 Kg</option>
																	<option value="60">60 Kg</option>
																	<option value="61">61 Kg</option>
																	<option value="62">62 Kg</option>
																	<option value="63">63 Kg</option>
																	<option value="64">64 Kg</option>
																	<option value="65">65 Kg</option>
																	<option value="66">66 Kg</option>
																	<option value="67">67 Kg</option>
																	<option value="68">68 Kg</option>
																	<option value="69">69 Kg</option>
																	<option value="70">70 Kg</option>
																	<option value="71">71 Kg</option>
																	<option value="72">72 Kg</option>
																	<option value="73">73 Kg</option>
																	<option value="74">74 Kg</option>
																	<option value="75">75 Kg</option>
																	<option value="76">76 Kg</option>
																	<option value="77">77 Kg</option>
																	<option value="78">78 Kg</option>
																	<option value="79">79 Kg</option>
																	<option value="80">80 Kg</option>
																	<option value="81">81 Kg</option>
																	<option value="82">82 Kg</option>
																	<option value="83">83 Kg</option>
																	<option value="84">84 Kg</option>
																	<option value="85">85 Kg</option>
																	<option value="86">86 Kg</option>
																	<option value="87">87 Kg</option>
																	<option value="88">88 Kg</option>
																	<option value="89">89 Kg</option>
																	<option value="90">90 Kg</option>
																	<option value="91">91 Kg</option>
																	<option value="92">92 Kg</option>
																	<option value="93">93 Kg</option>
																	<option value="94">94 Kg</option>
																	<option value="95">95 Kg</option>
																	<option value="96">96 Kg</option>
																	<option value="97">97 Kg</option>
																	<option value="98">98 Kg</option>
																	<option value="99">99 Kg</option>
																	<option value="100">100 Kg</option>
																	<option value="101">101 Kg</option>
																	<option value="102">102 Kg</option>
																	<option value="103">103 Kg</option>
																	<option value="104">104 Kg</option>
																	<option value="105">105 Kg</option>
																	<option value="106">106 Kg</option>
																	<option value="107">107 Kg</option>
																	<option value="108">108 Kg</option>
																	<option value="109">109 Kg</option>
																	<option value="110">110 Kg</option>
																	<option value="111">111 Kg</option>
																	<option value="112">112 Kg</option>
																	<option value="113">113 Kg</option>
																	<option value="114">114 Kg</option>
																	<option value="115">115 Kg</option>
																	<option value="116">116 Kg</option>
																	<option value="117">117 Kg</option>
																	<option value="118">118 Kg</option>
																	<option value="119">119 Kg</option>
																	<option value="120">120 Kg</option>
																	<option value="121">121 Kg</option>
																	<option value="122">122 Kg</option>
																	<option value="123">123 Kg</option>
																	<option value="124">124 Kg</option>
																	<option value="125">125 Kg</option>
																	<option value="126">126 Kg</option>
																	<option value="127">127 Kg</option>
																	<option value="128">128 Kg</option>
																	<option value="129">129 Kg</option>
																	<option value="130">130 Kg</option>
																	<option value="131">131 Kg</option>
																	<option value="132">132 Kg</option>
																	<option value="133">133 Kg</option>
																	<option value="134">134 Kg</option>
																	<option value="135">135 Kg</option>
																	<option value="136">136 Kg</option>
																	<option value="137">137 Kg</option>
																	<option value="138">138 Kg</option>
																	<option value="139">139 Kg</option>
																	<option value="140">140 Kg</option>
																</select>
															</div>
														</div>
													</div>
												</div>
											</div>
											
											<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px padding-0-xs">
												<div class="row">
													<div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
														<label>
															Skin Tone <span class="font-red">* </span>:
														</label>
													</div>
													<div class="clearfix visible-xs"></div>
													<div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
														<select class="form-control">
															<option value="Select about Skin Tone">Select about Skin Tone</option>
															<option value="Wheatish">Wheatish</option>
															<option value="Very Fair">Very Fair</option>
															<option value="Fair">Fair</option>
															<option value="Wheatish">Wheatish</option>
															<option value="Wheatish Brown">Wheatish Brown</option>
															<option value="Dark">Dark</option>
														</select>
													</div>
												</div>
											</div>
											
											<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px padding-0-xs">
												<div class="row">
													<div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
														<label>
															Body Type <span class="font-red">* </span>:
														</label>
													</div>
													<div class="clearfix visible-xs"></div>
													<div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
														<select class="form-control">
															<option value="Select Body Type">Select Body Type</option>
															<option value="Slim">Slim</option>
															<option value="Average">Average</option>
															<option value="Athletic">Athletic</option>
															<option value="Heavy">Heavy</option>
														</select>
													</div>
												</div>
											</div>
											
											<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px padding-0-xs">
												<div class="row">
													<div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
														<label>
															Any Disability ? <span class="font-red">* </span>: 
														</label>
													</div>
													<div class="clearfix visible-xs"></div>
													<div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
														<select class="form-control">
															<option value="Select Disability Type">Select Disability Type</option>
															<option value="">None</option>
															<option value="">Physical Disability</option>
														</select>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
								
								<div class="xxl-4 xs-16 s-16 m-16 l-4 xl-4 padding-lr-zero-xs hidden-xs">
									<div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-10 text-center">
										<h4 class="text-darkgrey font-13 bold">Why Register ?</h4>
										<hr>
										
										<div class="carousel slide" data-ride="carousel" id="quote-carousel_3">
											<div class="carousel-inner">
												<div class="item active">
													<div class="owl-carousel xxl-16 padding-lr-zero">
														<div class="margin-top-10">
															<div class="reg-sprtie profile"></div>
															<p class="sprite-caption">Lakhs of Genuine <br/>Profiles</p>
														</div>
														<div class="clearfix"></div>
														<center><hr style="width:50%;"></center>
														<div class="margin-top-15">
															<div class="reg-sprtie man"></div>
															<p class="sprite-caption">Many Verified by <br/>Personal Visit</p>
														</div>
													</div>
												</div>
												<div class="item">
													<div class="owl-carousel xxl-16 padding-lr-zero">
														<div class="margin-top-10">
															<div class="reg-sprtie secure"></div>
															<p class="sprite-caption">Secure & <br/>Family Friendly</p>
														</div>
														<div class="clearfix"></div>
														<center><hr style="width:50%;"></center>
														<div class="margin-top-15">
															<div class="reg-sprtie privacy-key"></div>
															<p class="sprite-caption">Strict <br/>Privacy Control</p>
														</div>
													</div>
												</div>
											</div>
											<a data-slide="prev" href="#quote-carousel_3" class="left carousel-control" style="color:#F9A630;"><img class="img-circle" src="<?php echo $base_url; ?>assets/front_end/images/icon/arrow-lft-mh.gif"></a>
											<a data-slide="next" href="#quote-carousel_3" class="right carousel-control" style="color:#F9A630;"><img class="img-circle" src="<?php echo $base_url; ?>assets/front_end/images/icon/arrow-rgt-mh.gif"></a>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<hr>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
									<a href="#" class="text-white font-15 bold btn pull-left btn-md prev-step" style="padding:8px 10px;"><i class="fa fa-chevron-left"></i> Previous</a>
									<a href="#" class="text-white font-15 bold btn pull-right btn-md next-step" style="padding:8px 10px;">Save and continue <i class="fa fa-chevron-right"></i></a>
									<a href="#" class="text-white font-15 bold btn pull-right btn btn-md next-step margin-right-10 skip hidden-xs" style="padding:8px 10px;">Skip <i class="fa fa-chevron-right"></i></a>
								</div>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-10 hidden-lg hidden-md hidden-sm">
									<a href="#" class="text-white font-15 bold btn pull-right btn btn-md next-step margin-top-10-sm pull-right" style="padding:8px 10px;">Skip <i class="fa fa-chevron-right"></i></a>
								</div>
							</div>
							<div class="clearfix"></div>
							
							<div class="tab-pane padding-lr-zero-xs" role="tabpanel" id="horoscope">
								<div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero-xs">
									<h4 class="text-center text-darkgrey bold font-18 font-weight-normal">Add Your Partners Horoscope Details for Better Match</h4>
									<div class="clearfix"></div>
									<div class="font-12 pull-right text-darkgrey"><span class="font-red">* </span> Mandatory fields</div>
								</div>
								
								<div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-20px-1200 margin-top-20px-1199 margin-top-20px-999 margin-top-15px-480px margin-top-10px-320px reg-main-title padding-lr-zero-xs" style="margin-top:5px;">
									<h3 class="font-15-bold-arial title-bg">
										<a href="#" class="text-white">
											<i class="fa fa-asterisk"></i> Horoscope Details:
										</a>
									</h3>
								</div>
								<div class="clearfix"></div>
								
								<div class="xxl-12 xs-16 s-16 m-16 l-12 xl-12 padding-lr-zero-xs">
									<form>
										<div class="clearfix"></div>
										<div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-bottom-20 padding-lr-zero-xs">
											<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px padding-0-xs">
												<div class="row">
													<div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
														<label>
															Star <span class="font-red">* </span>: 
														</label>
													</div>
													<div class="clearfix visible-xs"></div>
													<div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
														<select class="form-control">
															<option value="Select Star">Select Star</option>
															<option value="ANUSHAM">ANUSHAM</option>
															<option value="ASWINI">ASWINI</option>
															<option value="AVITTAM">AVITTAM</option>
															<option value="AYILYAM">AYILYAM</option>
															<option value="BHARANI">BHARANI</option>
															<option value="CHITHIRAI">CHITHIRAI</option>
															<option value="HASTHAM">HASTHAM</option>
															<option value="KETTAI">KETTAI</option>
															<option value="KRITHIGAI">KRITHIGAI</option>
															<option value="MAHAM">MAHAM</option>
															<option value="MOOLAM">MOOLAM</option>
															<option value="MRIGASIRISHAM">MRIGASIRISHAM</option>
															<option value="POOSAM">POOSAM</option>
															<option value="PUNARPUSAM">PUNARPUSAM</option>
															<option value="PURADAM">PURADAM</option>
															<option value="PURAM">PURAM</option>
															<option value="PURATATHI">PURATATHI</option>
															<option value="REVATHI">REVATHI</option>
															<option value="ROHINI">ROHINI</option>
															<option value="SADAYAM">SADAYAM</option>
															<option value="SWATHI">SWATHI</option>
															<option value="THIRUVADIRAI">THIRUVADIRAI</option>
															<option value="THIRUVONAM">THIRUVONAM</option>
															<option value="UTHRADAM">UTHRADAM</option>
															<option value="UTHRAM">UTHRAM</option>
															<option value="UTHRATADHI">UTHRATADHI</option>
															<option value="VISAKAM">VISAKAM</option>
														</select>
													</div>
												</div>
											</div>
											
											<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px padding-0-xs">
												<div class="row">
													<div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
														<label>
															Manglik <span class="font-red">* </span>: 
														</label>
													</div>
													<div class="clearfix visible-xs"></div>
													<div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
														<select class="form-control">
															<option value="Select Manglik type">Select Manglik type</option>
															<option value="">Simple Shani</option>
															<option value="Yes">Yes</option>
															<option value="No">No</option>
														</select>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
								
								<div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-top-20px-1200 margin-top-20px-1199 margin-top-20px-999 margin-top-15px-480px margin-top-10px-320px reg-main-title padding-lr-zero-xs">
									<h3 class="font-15-bold-arial title-bg">
										<i class="fa fa-user"></i> About your Partners:
									</h3>
								</div>
								<div class="xxl-12 xs-16 s-16 m-16 l-12 xl-12 padding-lr-zero-xs">
									<form>
										<div class="clearfix"></div>
										<div class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 margin-bottom-20 padding-lr-zero-xs">
											<div class="xxl-16 xl-16 xs-16 s-16  m-16 l-16 margin-top-20px padding-0-xs">
												<div class="row">
													<div class="xxl-5 xl-5 xs-16 s-16 m-16 l-4 margin-top-5px">
														<label>
															Write something about Partners <span class="font-red">* </span>: 
														</label>
													</div>
													<div class="clearfix visible-xs"></div>
													<div class="xxl-11 xl-11 xs-16 s-16 m-16 l-8">
														<textarea id="profile_text" class="form-control" rows="5" placeholder="" name="profile_text" data-validetta="required"></textarea>
														<p class="text-grey font-14 margin-top-3">Help me write About Partners<a class="ne-cursor" data-toggle="modal" data-target="#myModal111"> Click Here</a> <span class="tooltip_stay"><span class="text-left help-img-normal"></span> <span class="tooltiptext">If you don't want to write whole sentences than you can direct by suggestions</span></span></p>
													</div>
													
													<div class="modal fade-in" id="myModal111" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
														<div class="modal-dialog modal-lg">
															<div class="modal-content xxl-16 xl-16 m-16 l-16 s-16 xs-16 padding-0-xs">
																<div class="xxl-16 xl-16 m-16 l-16 s-16 xs-16 margin-top-10">
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close" >
																		<i class="glyphicon glyphicon-remove-circle" style="display:block;font-size:27px;"></i>
																	</button>
																</div>
																<div class="clearfix"></div>
																<div class="modal-body xxl-16 xl-16 m-16 l-16 s-16 xs-16 margin-bottom-10 padding-20-5-xs" style="padding-top:20px;">
																	<div class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 margin-top-10px-320px margin-top-10px-480px ne-mrg-top-10-768 margin-top-10px-999 margin-bottom-20px">
																		<h4 class="text-darkgrey">Write Aboute me:</h4>
																		 <textarea name="aboutemedemo" cols="46" rows="6" class="form-control" style="height:auto;box-shadow:5px 5px 0 0 #e2e2e2;" id="aboutemedemo">I Want Partners Who come from a/an <Type of Family> family. The most important thing in my life is <Ex. religious believes, moral values & respect for elders>.  My Partners modern thinker but also believe in <Ex. good> values given by our ancestors. I love __<Ex. trekking, going on trips with friends, listening to classical music & watching latest movies>.
																		 </textarea>                          							
																	</div>
																	<div class="clearfix"></div>
																	<div class="xxl-16 xl-16 m-16 l-16 s-16 xs-16">
																		<a class="btn btn-sm text-white font-15 bold margin-right-10 margin-right-0-xs" style="box-shadow:3px 3px 0 0 #ddd;" onClick="chkabouteme()"><i class="fa fa-check font-18"></i> Submit</a>
																		<a class="btn btn-sm btn-danger font-15 bold margin-top-10-xs margin-bottom-10-xs" style="box-shadow:3px 3px 0 0 #ddd;" data-dismiss="modal"><i class="fa fa-close font-18"></i> Close</a>
																	</div>	
																</div>
															</div>
														</div>  
													</div>
													
												</div>
											</div>
										</div>
									</form>
								</div>
								
								<div class="clearfix"></div>
								<hr>
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-bottom-10">
									<div class="xxl-8 xxl-margin-left-5 l-10 l-margin-left-2 xs-16 xs-margin-left-0 margin-top-10">
										<center><a href="member-profile.html" class="text-capitalize btn xs-16 xxl-9 xl-9 l-16 s-16 m-16 text-white font-16 next-step" type="submit"  style="box-shadow:3px 3px 0 0 #ddd;"><i class="fa fa-check font-16"></i> Submit</a></center>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
							
							<div class="tab-pane" role="tabpanel" id="complete">
								<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
									<div class="xxl-12 xl-12 l-12 m-16 s-16 xs-16 margin-bottom-20 box-shadow" style="border:8px outset #999;border-radius:3px;padding:20px;">
										<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
											<h3 class="text-center text-green">Add your photo and get much better responses!</h3>
										</div>
										<div class="clearfix"></div>
										<div class="colorgraph"></div>
										<div class="xxl-10 xl-10 l-10 m-16 s-16 xs-16 ne_photo_upload border-right margin-top-30 margin-bottom-10">
											<center>
												<div class="xxl-16 xl-16 xs-16 m-6 l-16 s-16">
													<a class="fileUpload btn btn-sm active font-15 bold text-white" style="background:#F58220;box-shadow:3px 3px 0 0 #e2e2e2;"><img src="https://imgs.gujaratimatrimony.com/bmimgs/add-photo-comp.gif" width="23" height="30" border="0" alt="" style="padding-top:6px;"> Upload from My Computer 
													<input type="file" id="image" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" class="upload xxl-16 xs-16 m-16 xs-16 padding-top-10px padding-bottom-10px" style="padding:5px;" />
													<img class="hidden-sm hidden-xs" width="23" height="23" border="0" alt="" src="<?php echo $base_url; ?>assets/front_end/images/icon/profile-completeness-arrow.png"></a> 
												</div>
												
												<div class="xxl-16 xl-16 s-16 xs-16 m-16 l-16 text-center margin-top-5">
													<h3 class="text-grey text-center" style="padding:8px 5px;text-shadow:2px 2px 1px rgba(203, 203, 203, 1);">OR</h3>
												</div>
											
												<a class="fileUpload btn btn-sm font-15 bold" style="background:#4D69A2;box-shadow:3px 3px 0 0 #e2e2e2;padding:8px 15px;" data-toggle="collapse" href="#collapse" aria-expanded="false" aria-controls="collapse">
													<i class="fa fa-link margin-top-10px margin-right-10" style="font-size:20px;"></i>
													<span class="text-white margin-right-10">
														Upload With Embed link
													</span>
													<img class="hidden-sm hidden-xs" width="23" height="23" border="0" alt="" src="<?php echo $base_url; ?>assets/front_end/images/icon/profile-completeness-arrow.png"></a>
												</a>
											</center>
											
											<div class="clearfix"></div>
											
											<div class="collapse margin-top-10 margin-bottom-20" id="collapse">									
												<div class="bg-border xxl-16 xl-16 l-16 m-16 s-16 xs-16 ne_pad_tp_10px padding-bottom-10px margin-top-10px border-top	" style="background:#ededed;">
													<div class="xxl-16 xl-16 m-16 s-16 xs-16 ne_pad_tp_10px">
														<div class="row">
															<form action="" method="post" enctype="multipart/form-data"> 
																<div class="form-group xxl-16 xl-16 m-16 s-16 l-16 xs-16">
																	<div class="row">
																		<div class="xxl-16 xl-16 m-16 s-16 l-16 xs-16 padding-lr-zero">
																			<label>
																				<h4 class="font-14 text-darkgrey">Enter Your Embeded Link Here</h4>
																			</label>
																			
																			<div class="xxl-16 xl-16 m-16 s-16 l-16 xs-16 margin-top-10px padding-lr-zero">
																				<textarea class="form-control" rows="4"  style="box-shadow:3px 3px 0 0 #e2e2e2;"></textarea>
																			</div>
																		</div>
																	</div>
																</div>
																
																<div class="xxl-16 xl-16 m-16 s-16 l-16 xs-16 padding-lr-zero">
																	<a type="submit" class="btn btn-sm"><i class="fa fa-check"></i> Submit</a>
																	<a type="submit" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</a>
																</div>
															</form>
															<div class="clearfix"></div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="xxl-6 xl-6 l-6 m-16 s-16 xs-16 ne_pad_btm_10px ne_pad_tp_10px">
											<div class="row">
												<div class="xxl-14 xxl-margin-left-1 xl-14 xl-margin-left-1 video-effect">
													<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
														<center>
															<h4 class="text-darkgrey">No horoscope Image available</h4>
															<div class="margin-top-10"></div>
															<img id="blah" src="#" class="blah border img-responsive" alt="your image" width="250" height="250" />
														</center>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<div class="xxl-4 xl-4 m-16 l-4 xs-16 s-16 hidden-xs" style="padding-top:0px;padding-bottom:0px;">
										<div class="panel panel-info margin-top-20" style="margin-bottom:0px;">
											<div class="panel-heading">
												<h4 class="panel-title" style="">Important Notes</h4>
											</div>
											<div class="panel-body">
												<ul>
													<li class="small"> - The maximum file size for uploads in this demo is <strong>999 KB</strong> (default file size is unlimited).</li>
													<li class="small"> - image files (<strong>JPG, GIF, PNG</strong>) are Not allowed in this demo (by default there is no file type restriction).</li>
													<li class="small"> - Only PDF or Word files are allowed in this demo (by default there is no file type restriction).</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<hr>
								<div class="xxl-16 m-16 s-16 xs-16">
									<div class="row margin-bottom-10">
										<div class="xxl-16 m-16 s-16 xs-16">
											<div class="row">
												<div class="xxl-10 xxl-margin-left-5 l-10 l-margin-left-2 xs-16 xs-margin-left-0">
													<input checked="" name="term_condition" data-validetta="required" type="checkbox"> I Accept <a href="cms5574.html?cms_id=7" target="_blank">Terms &amp; Condition</a>  and <a href="cmsb36d.html?cms_id=6" target="_blank">Privacy Policy</a>.
												</div>
											</div>
										</div>
										<div class="xxl-8 xxl-margin-left-5 l-10 l-margin-left-2 xs-16 xs-margin-left-0 margin-top-10">
											<center><a href="registration_successful.html" class="btn xs-16 xxl-9 xl-9 l-16 s-16 m-16 text-white font-15 bold next-step" type="submit">Register <i class="fa fa-chevron-right"></i></a></center>
										</div>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</form>
				</div>
			</div>			
		</div>
<script src="<?php echo $base_url; ?>assets/front_end/js/jquery.min.js?ver=1.0"></script>
<script src="<?php echo $base_url; ?>assets/front_end/js/bootstrap.min.js?ver=1.0"></script>
<script src="<?php echo $base_url; ?>assets/front_end/js/select2.min.js?ver=1.0"></script>
<script src="<?php echo $base_url; ?>assets/front_end/js/jquery.sticky.js?ver=1.0"></script>
	
<script>
	<!--Chosen Select2-->
	$( document ).ready(function() {
		$('select').select2();
		$('.nav-tabs > li a[title]').tooltip();
		$('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
			var $target = $(e.target);		
			if ($target.parent().hasClass('disabled')) {
				return false;
			}
		});
		$(".next-step").click(function (e) {
			var $active = $('.wizard .nav-tabs li.active');
			$active.next().removeClass('disabled');
			nextTab($active);
		});
		$(".prev-step").click(function (e) {
			var $active = $('.wizard .nav-tabs li.active');
			prevTab($active);
		});
	});
	function nextTab(elem) {
		$(elem).next().find('a[data-toggle="tab"]').click();
	}
	function prevTab(elem) {
		$(elem).prev().find('a[data-toggle="tab"]').click();
	}
</script>
</body>
</html>