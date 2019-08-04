<div id="myModal_photoprotect" class="modal fade" role="dialog">
    <div class="modal-dialog">
    
        <div class="modal-content" id="a1">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/love-message.png" class="margin-right-5" alt=""> Send Photos Request</h4>
            </div>
    
            <div class="modal-body">
            <div id="Photo_message"></div>
            
                <form name="ei_form" id="ei_form"  method="post"><!-- ==== action="" ==== -->
                    <div class="modal-body">
                        <div id="ei_message"> </div>
                        <div class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 margin-top-10px-320px margin-top-10px-480px ne-mrg-top-10-768 margin-top-10px-999" id="ei_alt">
                            <ul  id="ul_li" class="list-unstyled" style="list-style: none;">                              
                                <li class="margin-right-5">
                                    <label>
                                        <input name="interest_message" id="interest_message" class="radio-inline" type="radio" value="We found your profile to be a good match. Please accept Photo request to proceed further." checked> We found your profile to be a good match. Please accept Photo request to proceed further.
                                    </label>
                                </li>
                            
                                <li class="margin-right-5">
                                    <label>
                                        <input name="interest_message" id="interest_message" class="radio-inline" type="radio" value="I am interested in your profile. I would like to view photo now, accept photo request."> I am interested in your profile. I would like to view photo now, accept photo request.
                                    </label>
                                </li>
                            </ul>                                                  
                        </div>								
                    </div>
        
                        <input type="hidden" name="requester_id" value="" id="requester_id" />
                        <input type="hidden" name="receiver_id" value="" id="receiver_id" />
                    <div class="modal-footer">
                       <div class="row-center">
                       
                            <a class="btn btn-sm btn-success" onclick="send_password_request()"><i class="fa fa-heart"></i> Send</a>
                            <?php /*?><!-- <form action="<?php //echo $base_url; ?>search/check-photo-request" method="post" id="password_form" name="password_form" onSubmit="return check_request_accept()">
                            <input type="hidden" name="is_post" id="is_post" value="1" />
                        <input type="hidden" name="<?php //echo $this->security->get_csrf_token_name(); ?>" value="<?php //echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" />
                            <input type="hidden" name="base_url" id="base_url" value="<?php //echo $base_url; ?>" />
                        <input type="hidden" name="user_id" id="user_id" value="" />
                        <input type="hidden" name="my_id" id="my_id" value="" /> --><?php */?>
                            <a onClick="return remove(1);" class="btn btn-sm btn-danger"  title="Already have password"> Click here for check your photo request status</a>
                     	     
                          <?php /*?> <!-- <input class="btn btn-primary" type="submit" name="submit" value="Check rquest is accepted or not"></form> --><?php */?>
                       </div>
                    </div>
                   
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" class="hash_tocken_id" />
                    <input type="hidden" name="base_url" value="<?php echo $base_url; ?>" id="base_url" />
                </form>
            </div>
        </div>

        <div class="modal-content" id="a2" style="display:none;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title text-center"> View Protected Photo</h4>
            </div>
    
            <div class="modal-body">
               <!-- <div id="message"></div>-->
                    <form action="<?php echo $base_url; ?>search/check-photo-request" method="post" id="password_form" name="password_form" onSubmit="return check_request_accept()">
                        <div class="card">
                            <div class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 margin-top-10px-320px margin-top-10px-480px ne-mrg-top-10-768 margin-top-10px-999">
                        <br/>
                        <p>The Photo has been protected by the owner of this profile. Members are given the feature to protect their Photo from viewing by anyone. If you send Photo request, then you need to check your request status to view it.</p>
                        <!-- <p>The Photo has been protected by the owner of this profile. Members are given the feature to protect their Photo from viewing by anyone. If the Photo is protected, then you need a Photo Password to view it.</p> -->
                        <?php
                            if($this->session->flashdata('error_message_arr'))
                            { ?>
                                <div class="alert alert-danger"><?php
                                    echo $this->session->flashdata('error_message_arr'); ?>
                                </div>
                        <?php } ?>
                        <div class="alert alert-danger" id="message_err" style="display:none"></div>
                        <div class="alert alert-success" id="message_succ" style="display:none"></div>
                        <div class="row-center">
                        <div class="col-md-12 margin-top-10">
                           <?php /*?> <!-- <div class="md-form font-15 text-darkgrey">
                                <div class="col-md-4 col-xs-4">
                                    <label>Enter Password</label>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <input class="form-control" type="text" name="photo_pswd" id="photo_pswd" autofocus />
                                </div>	
                            </div>
                            <div class="clearfix"></div>
                            <br/> --><?php */?>
                            
                            <input class="btn btn-primary" type="submit" name="submit" value="Check rquest is accepted or not">
                            <?php /*?><!-- === <a class="btn btn-primary" title="Photo Protected"></a> === --> 
                            <!-- <a onClick="return remove(2);" class="btn  btn-danger"  
                            title="Already have password"> Don't have password</a> --><?php */?>
                           
                            <input type="hidden" name="is_post" id="is_post" value="1" />
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" />
                            
                            <input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />
                            <input type="hidden" name="user_id" id="user_id" value="" />
                            <input type="hidden" name="my_id" id="my_id" value="" />
                        </div>
                        </div>
                    </div>
                </div>
            </form>		
        </div>
    </div>
        <div class="modal-content" id="a3" style="display:none;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title text-center"> Photos of <span id="phtos_of_id"></span> </h4>
            </div>
            <br/>
            <div id="photo1_id" style="display:block;">
                <div id="content"></div>
            </div>
        </div>    
    </div>
</div>