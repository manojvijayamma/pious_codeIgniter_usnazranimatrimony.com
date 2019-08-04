<?php $current_login_user = $this->common_front_model->get_session_data();?>
<!-- =========== <div class="container"> Start=========== -->
    <?php echo $this->search_model->search_sub_menu('keyword'); ?>
    <div class="page-wrap ne-aft-log">
        <div class="container padding-0-5-xs">
            <!--<div class="margin-top-15px xxl-16 xl-16 l-16 m-16 s-16 xs-16">
                <div class="row">
                    <a href="#"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/header-banner.jpg" class="full-width img-thumbnail" alt="" /></a>
                </div>
            </div>-->
            <div class="xxl-12 xl-12 m-16 s-16 l-12 xs-16 padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 padding-lr-zero-xs">
                <div class="xxl-16 xs-16 s-16 xs-margin-left-0 m-16 m-margin-left-0 l-16 l-margin-left-0 margin-top-10px padding-15px bg-border padding-0-5-xs">
                    <div class="">
                        <div class="xxl-16 xl-16 m-16 s-16 l-16 xs-16 margin-top-15px">
                            <div class="row">
                                <div class="xxl-16 xl-16 m-16 s-16 l-16 xs-16 padding-lr-zero-320 padding-lr-zero-480 margin-top-5px-480 padding-0-5-xs">
                                    <div class="xxl-16 xl-16 m-16 s-16 l-16 xs-16">
                                        <div class="row">
                                            <div class="xxl-16 xs-16 s-16 m-16 l-16 s-16 font-size-14 padding-lr-zero-320 text-grey">
                                                Find profiles based on keywords.Exp : Hindu, Muslim, Rajput, Ahmedabad, India, Software Eng, etc... 
                                            </div>
                                            <div class="clearfix"></div>
                                            <hr>
                                            <div class="xxl-16 xs-16 s-16 m-16 l-16 s-16 padding-lr-zero-320">
                                                <h3 class="font-15-bold-arial  title-bg">
                                                    <i class="fa fa-tag"></i> Keyword Search
                                                </h3>
                                            </div>
                                            
                                            <form action="<?php echo $base_url; ?>search/search_now" name="keyword_search_form" id="keyword_search_form" method="post" class="xxl-16 xl-16 m-16 s-16 l-16 xs-16 margin-top-10px ne-keyword-search padding-lr-zero-320 padding-lr-zero-480 padding-0-5-xs" >
                                                
                                                <div class="form-group xxl-16 xl-16 l-16 m-16 s-16 xs-16 padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-xs">
                                                    <div class="xxl-4 xl-4 s-16 m-4 xs-16 l-4 margin-top-5px src-label">
                                           
                                           
                                                        Keyword Search:
                                                    </div>
                                                    <div class="xxl-12 xl-12 s-16 m-12 l-12 xs-16">
                                                        <input type="text" class="form-control input-border" required name="keyword" /> 
                                                    </div>
                                                </div>
                                                <div class="form-group xxl-16 xl-16 l-16 m-16 s-16 xs-16  padding-lr-zero-320 padding-lr-zero-480 padding-bottom-10px padding-lr-zero-xs">
                                                    <div class="xxl-4 xs-16 s-16 m-4 xl-4 margin-top-5px l-4 src-label">
                                                        Photo Setting:
                                                    </div>
                                                    <div class="xxl-6 xs-16 s-16 m-12 l-12 xl-5 margin-top-5px-320 margin-top-5px-480 font-13-normal">
                                                        <input id="360" type="checkbox" value="photo_search" name="photo_search">
                                                        <label for="360" class="radio-clr font-13-normal">&nbsp;&nbsp;Show profiles with photo</label>
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
                                                 <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" />
                                                 <input type="hidden" name="search_page_nm" value="Keyword Search" />
                                                 <input type="hidden" name="save_search" id="save_search" value="" >
                                            </form>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                
                <div class="clearfix"></div>
                
                <?php $this->load->view('front_end/member_slider_footer'); ?>
            </div>
            
            <?php $this->load->view('front_end/search_sidebar'); ?>
        </div>
    </div>
    <div class="clearfix"></div>
<!-- ====== <div class="container"> end ====== -->

<!-- ====== for saved search data save ====== -->
 	<div id="myModal_visiblity" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><i class="fa fa-save"></i> Save Search</h4>
				</div>
                <form action="<?php echo $base_url; ?>search/search_now" name="saved_search_form" id="saved_search_form" method="post" class="" onSubmit="return save_search('keyword_search_form');">
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
                   <input type="button" name="id_search" value="Save and Search" class="btn btn-sm btn-success" onClick="return save_search('keyword_search_form');" />
					<a class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</a>
				</div>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" />
                </form>
			</div>
		</div>
	</div>
	<!-- ======for save search save data====== -->

<?php
	$this->common_model->js_extra_code_fr.="
	$('.button-wrap').on('click', function(){
		$(this).toggleClass('button-active');
	})
	
";
?>