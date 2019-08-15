<div class="xxl-16 xl-16 xs-16 m-16 s-16 l-16  bg-border margin-top-20px hidden-lg hidden-md" style="margin-bottom: 30px;">
<div class="row ne-bdr-btm-lgt-grey  ne_com_tab">
        <div class="xxl-16 xl-16 l-16 xs-16 m-16 s-16  margin-top-10px">
            <div class="panel-heading" style="padding:0px;">
                <ul class="nav nav-tabs" style="border-bottom:0px;">
                <?php
                    if(isset($is_login) && $is_login!=1)
                    { 
                    ?>
                    <li class="active"><a href="#reg1" data-toggle="tab">Register Free</a></li>
                    <li><a href="#search1" data-toggle="tab">Search</a></li>
                    <?php
                    }
                    else
                    {
                    ?>
                    <li><a href="#search1" data-toggle="tab">Search</a></li>
                    <?php
                    }
                ?>
                </ul>
            </div>
            
        </div>
        
    </div>
    <div class="tab-content xxl-16 xl-16 xs-16 l-16 m-16 s-16">
    <?php if(isset($is_login) && $is_login!=1){ ?>    
        <div class="tab-pane fade <?php if(isset($is_login) && $is_login!=1){ ?>in active<?php } else {}?>" id="reg1">
            <form method="post" id="home_register_form1" name="home_register_form" action="<?php echo $base_url;?>register">
            <div class=" row form-group  padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-xs">
                <div id="reponse_message_step2" style="margin-bottom: 0px;"></div>
                <div class="clearfix"></div>
                <?php
                if($this->session->flashdata('error_message'))
                {
                ?>
                <div class="alert alert-danger"><?php
                echo $this->session->flashdata('error_message'); ?>
                </div>
                <?php
                }
                ?>
               <div class="xxl-16 xs-16 m-12 l-12 xl-12 s-16">
                    <input type="text" name="firstname" id="firstname" placeholder="First Name" class="form-control padding-new-c input-border" required>
                </div>
                <div class="xxl-16 xs-16 m-12 l-12 xl-12 s-16">
                    <input type="text" name="lastname" id="lastname" placeholder="Last Name" class="form-control  padding-new-c input-border" required>
                </div>
                <div class="xxl-16 xs-16 m-12 l-12 xl-12 s-16">
                    <input type="email" class="form-control input-border padding-new-c" required id="email" name="email" placeholder="Email Address">
                    <input type="hidden" name="email_varifired" id="email_varifired" value="0" />
                    <!-- <input type="hidden" name="is_post" id="is_post" value="1" /> -->
                </div>
                <div class="xxl-16 xs-16 m-12 l-12 xl-12 s-16">
                    <input type="password" name="password" id="password" placeholder="Password" class="form-control input-border padding-new-c" required minlength="6">
                </div>
                <div class="xxl-16 xs-16 m-12 l-12 xl-12 s-16">
                    <div style="width:40%;float:left">
                        <select name="country_code" id="country_code" class="form-control select2">
                            <option value="Select Country Code">Select Country Code</option>
                            <?php echo $this->common_model->country_code_opt('+91');?>
                        </select>
                    </div>
                    <input type="text" class="form-control input-border padding-new-c" placeholder="Enter Mobile No" required name="mobile_number" id="mobile_number" minlength="7" maxlength="15"  style="width:60%;float:left" />
                </div>
                <div class="xxl-16 xs-16 m-12 l-12 xl-12 s-16">
                    <select name="gender" id="gender" class="form-control select2">
                        <option value="Select Country Code"> Select Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class="xxl-16 xs-16 m-12 l-12 xl-12 s-16 margin-top-10px">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" />
                    <input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>"/>
                    <input type="hidden" name="id" id="id" value="" />
                    <input type="hidden" name="mode" id="mode" value="add" />
                    <input type="hidden" name="status_front_page" id="status_front_page" value="Yes" />
                    <button type="submit" class="btn xxl-16 xl-16 xs-16 m-16 l-16" style="margin-left:0%;">Register</button>
                </div>
            </div>
            </form>
        </div>
        <?php }?>
        <div class="tab-pane fade <?php if(isset($is_login) && $is_login!=1){ } else {?>in active<?php }?>" id="search1">
            <div class=" row form-group  padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-xs">
            <form action="<?php echo base_url();?>search/search_now" method="post">
            <?php
                    if(isset($is_login) && $is_login!=1)
                    { 
                    ?>
                <div class="xxl-16 xl-16 m-16 xs-16 s-16 l-16 padding-lr-zero">
                    <div class="row">
                        <div class="xxl-5 xl-5 s-5 m-5 l-5 xs-5">
                            Gender:
                        </div>
                        <div class="xxl-6 xl-6 s-6 m-6 l-6 xs-6">
                            <div class="row">
                                <input type="radio" name="gender" checked value="Male"/>Male
                            </div>
                        </div>
                        
                        
                        <div class="xxl-5 xl-5 s-5 m-5 l-5 xs-5">
                            <div class="row">
                            <input type="radio" name="gender" value="Female"/>Female
                            </div>
                        </div>
                    </div>
                </div>
                    <?php }?>
                <div class="xxl-16 xl-16 m-16 xs-16 s-16 l-16 padding-lr-zero">
                    
                    <div class="clearfix"></div>
                    <div class="xxl-16 xl-16 m-4 s-16 l-4 xs-16 margin-top-10px">
                        <div class="row">
                            Age:
                        </div>
                    </div>
                    <div class="xxl-16 xl-16 m-12 s-16 l-12 xs-16 ne_font_12">
                        <div class="row">
                            <div class="xxl-7 xl-7 s-7 m-7 l-7 xs-7">
                                <div class="row">
                                    <select class="form-control" name="from_age" id="from_age">
                                        <option value="">From</option>
                                        <?php echo $this->common_model->array_optionstr($this->common_model->age_rang(),18);?>
                                    </select>
                                </div>
                            </div>
                            <div class="xxl-2 xs-2 s-2 xl-2 l-2 m-2 ne_pad_tp_5px padding-lr-zero center-text">
                                To
                                </div>
                            <div class="xxl-7 xl-7 s-7 m-7 l-7 xs-7">
                                <div class="row">
                                    <select class="form-control" name="to_age" id="to_age">
                                        <option value="">To</option>
                                        <?php echo $this->common_model->array_optionstr($this->common_model->age_rang(),30);?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="xxl-16 xl-16 m-16 xs-16 s-16 l-16 padding-lr-zero">
                    <div class="xxl-16 xl-16 m-4 s-16 l-4 xs-16 padding-top-10px">
                        <div class="row">
                            Height:
                        </div>
                    </div>
                    
                    <div class="xxl-16 xl-16 m-12 s-16 l-12 xs-16 ne_font_12">
                        <div class="row">
                            <div class="xxl-7 xl-7 s-7 m-7 l-7 xs-7">
                                <div class="row">
                                    <select class="form-control" name="from_height">
                                        <option value="">From</option>
                                        <?php echo $this->common_model->array_optionstr($this->common_model->height_list());?>
                                    </select>
                                </div>
                            </div>
                            <div class="xxl-2 xs-2 s-2 xl-2 l-2 m-2 ne_pad_tp_5px padding-lr-zero center-text">
                                To
                            </div>
                            <div class="xxl-7 xl-7 s-7 m-7 l-7 xs-7">
                                <div class="row">
                                    <select class="form-control " name="to_height">
                                        <option value="">To</option>
                                        <?php echo $this->common_model->array_optionstr($this->common_model->height_list());?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="xxl-16 xl-16 m-16 xs-16 s-16 l-16 padding-lr-zero">
                    <div class="xxl-16 xl-16 m-4 s-16 l-4 xs-16 padding-top-10px">
                        <div class="row">
                            Catholic Community:
                        </div>
                    </div>
                    
                    <div class="xxl-16 xl-16 m-12 s-16 l-12 xs-16 ne_font_12">
                        <div class="row">
                            <select data-placeholder="Select Catholic Community" id="search_religion" name="religion[]" class="chosen-select form-control" multiple >
                            <?php echo $this->common_model->array_optionstr($this->common_model->dropdown_array_table('religion'));?>
                        </select>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="margin-top-10 ne_font_13">
                        <input id="360" type="checkbox" value="photo_search" name="photo_search">
                        <label for="360" class="radio-clr font-13-normal">&nbsp;&nbsp;Only Profiles with photos</label>
                    </div>                            
                    <div class="xxl-16 xl-16 m-16 xs-16 s-16 l-16 padding-lr-zero margin-top-10px">
                        <div  class="xxl-16 xl-16 m-6 m-margin-left-5 s-16 l-6 l-margin-left-5 xs-16 ne_font_12">
                            <div class="row">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" />
                                <button type="submit" class="btn xxl-16 xl-16 xs-16 m-16 l-16"><i class="fa fa-search"></i> Search</button>
                            </div>
                        </div>
                    </div>  
                    <div class="clearfix"></div>
                </div>
                </form> 
            </div>
        </div>
        
    </div>
</div>
<?php
$this->common_model->js_extra_code_fr.='
if($("#home_register_form1").length > 0)
{
    $("#home_register_form1").validate({
        rules: {
            mobile_number: {
            required: true,
            number: true
            },
        },
        submitHandler: function(form)
        {
            //return true;
            /*if($("#email_varifired").val() == 0 && $("#email").val() !="")
            {
                $("#email-error").text("Duplicate Email address found, please enter another one");
                $("#email-error").show();
                $("#email").addClass("error");
                return false;
            }*/
            /*var validator = $( "#register_step1" ).validate();
            alert(validator);
            validator.showErrors({
            "mobile_number": "I know that your firstname is Pete, Pete!"
            });*/
            
            
            var mobile_number = $("#mobile_number").val();
            if(mobile_number !="")
            {
                var isnum = /^\d+$/.test(mobile_number);
                if(!isnum)
                {
                    alert("Please enter valid number only");
                    $("#mobile_number").val("");
                    $("#mobile_number").focus();
                    return false;
                }
            }
            var form_data = $("#home_register_form1").serialize();
            form_data = form_data+ "&is_post=0";
            var base_url = $("#base_url").val();
            var action = base_url+"register/check_duplicate";
           
            show_comm_mask();
            $.ajax({
            url: action,
            type: "post",
            dataType:"json",
            data: form_data,
            success:function(data)
            {
                
                    $("#reponse_message_step2").removeClass("alert alert-danger");
                    $("#reponse_message_step2").html(data.errmessage);
                    $("#reponse_message_step2").slideDown();
                    update_tocken(data.tocken);
                    hide_comm_mask();
                    
                    if(data.status == "success")
                    {
                        
                        $("#reponse_message_step2").html("");
                        form.submit(); 
                    }
                    else
                    {
                        $("#reponse_message_step2").addClass("alert alert-danger");
                    }
            }
            });
            return false;
        }
    });
}

$("#search_religion").chosen();
';
?>