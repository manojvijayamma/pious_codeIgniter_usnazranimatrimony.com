<div id="myModal_photoprotect" class="modal fade" role="dialog">
  		<div class="modal-dialog">
        
            <div class="modal-content" id="a1">
                <div class="modal-header">
                	<button type="button" class="close" data-dismiss="modal">×</button>
                	<h4 class="modal-title"><img src="<?php echo $base_url; ?>assets/front_end/images/icon/love-message.png" class="margin-right-5" alt=""> Send Photos Password Request</h4>
                </div>
		
                <div class="modal-body">
                <div id="Photo_message"></div>
                
                    <form name="ei_form" id="ei_form" action="" method="post">
                        <div class="modal-body">
                            <div id="ei_message"> </div>
                            <div class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 margin-top-10px-320px margin-top-10px-480px ne-mrg-top-10-768 margin-top-10px-999" id="ei_alt">
                                <ul  id="ul_li" class="list-unstyled" style="list-style: none;">                              
                                    <li class="margin-right-5">
                                        <label>
                                            <input name="interest_message" id="interest_message" class="radio-inline" type="radio" value="We found your profile to be a good match. Please send me Photo password to proceed further." checked> We found your profile to be a good match. Please send me Photo password to proceed further.
                                        </label>
                                    </li>
								
                                    <li class="margin-right-5">
                                        <label>
                                            <input name="interest_message" id="interest_message" class="radio-inline" type="radio" value="I am interested in your profile. I would like to view photo now, send me password."> I am interested in your profile. I would like to view photo now, send me password.
                                        </label>
                                    </li>
                                </ul>                                                  
                            </div>								
                        </div>
            
            				<input type="hidden" name="requester_id" value="" id="requester_id" />
                            <input type="hidden" name="receiver_id" value="" id="receiver_id" />
                        <div class="modal-footer">
                            <center>
                           
                                <a class="btn btn-sm btn-success" onclick="send_password_request()"><i class="fa fa-heart"></i> Send</a>
                                <!--<a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal_sendinterest" href="<?php echo base_url();?>search/already-password/<?php echo $member_id; ?>"> Click here if you have password</a>-->
                                
                                <a onClick="return remove(1);" class="btn btn-sm btn-danger"  title="Already have password"> Click here if you have password</a>
                            </center>
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
                <div id="message"></div>
                    <form action="<?php echo $base_url; ?>search/check-photo-password" method="post" id="password_form" name="password_form">
                        <div class="card">
                            <div class="xxl-16 xl-16 l-16 s-16 m-16 xs-16 margin-top-10px-320px margin-top-10px-480px ne-mrg-top-10-768 margin-top-10px-999">
                  		<br/>
						<p>The Photo has been protected by the owner of this profile. Members are given the feature to protect their Photo from viewing by anyone. If the Photo is protected, then you need a Photo Password to view it.</p>
						
						<?php
							if($this->session->flashdata('error_message_arr'))
							{ ?>
								<div class="alert alert-danger"><?php
									echo $this->session->flashdata('error_message_arr'); ?>
								</div>
						<?php } ?>
						
						<div class="alert alert-danger" id="message_err" style="display:none"></div>
						<div class="alert alert-success" id="message_succ" style="display:none"></div>
						
						<div class="col-md-12 margin-top-10" align="center">
                            <div class="md-form font-15 text-darkgrey">
								<div class="col-md-4 col-xs-4">
									<label>Enter Password</label>
								</div>
								<div class="col-md-6 col-xs-6">
									<input class="form-control" required type="text" name="photo_pswd" id="photo_pswd" autofocus />
								</div>	
							</div>
							<div class="clearfix"></div>
							<br/>
							
                            <input class="btn btn-primary" type="submit" name="submit" value="Submit">
							
							<a class="btn btn-primary" title="Photo Protected" <a onClick="return remove(2);" class="btn btn-sm btn-danger"  title="Already have password"> Don't have password</a>
                           
							<input type="hidden" name="is_post" id="is_post" value="1" />
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" />
                            
                            <input type="hidden" name="base_url" id="base_url" value="<?php echo $base_url; ?>" />
                            <!--<input type="hidden" name="member_id" id="member_id" value="<?php echo $result_member_matri_id;?>" />-->
                            <input type="hidden" name="user_id" id="user_id" value="" />
                            <input type="hidden" name="my_id" id="my_id" value="" />
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
<?php
$this->common_model->js_extra_code_fr.="
	function openModal()
	{
	  document.getElementById('myModal_new').style.display = 'block';
	  document.getElementById('a3').style.display = 'none';
	  document.getElementById('photo1_id').style.display = 'none';
	}
	function closeModal()
	{
	  document.getElementById('myModal_new').style.display = 'none';
	  document.getElementById('a3').style.display = 'block';
	  document.getElementById('photo1_id').style.display = 'block';
	}

	var slideIndex = 1;
	//showSlides(slideIndex);

	function plusSlides(n) {
	  showSlides(slideIndex += n);
	}

	function currentSlide(n) {
	  showSlides(slideIndex = n);
	}

	function showSlides(n) {
	  var i;
	  var slides = document.getElementsByClassName('mySlides');
	  //var dots = document.getElementsByClassName('demo');
	  var captionText = document.getElementById('caption');
	  if (n > slides.length) {slideIndex = 1}
	  if (n < 1) {slideIndex = slides.length}
	  for (i = 0; i < slides.length; i++) {
		  slides[i].style.display = 'none';
	  }
	 // for (i = 0; i < dots.length; i++) {
	//	  dots[i].className = dots[i].className.replace(' active', '');
	 // }
	  slides[slideIndex-1].style.display = 'block';
	  //dots[slideIndex-1].className += ' active';
	 // captionText.innerHTML = dots[slideIndex-1].alt;
	}";
?>
<!--<script src="<?php echo $base_url; ?>assets/front_end/js/jquery.min.js?ver=1.0"></script>
<script src="<?php echo $base_url; ?>assets/front_end/js/common.js"></script>
<script src="<?php echo $base_url; ?>assets/front_end/js/jquery.validate.min.js"></script>-->

<script type="text/javascript">
function addstyle(requester_id,receiver_id)
{
	document.getElementById("a1").style.display = "block";
	document.getElementById("a2").style.display = "none";
	document.getElementById("a3").style.display = "none";
	$('#requester_id').val(requester_id);
	$('#receiver_id').val(receiver_id);
	$('#user_id').val(receiver_id);
	$('#my_id').val(requester_id);
}
function send_password_request()
{
	var requester_id = $('#requester_id').val();
	var receiver_id = $('#receiver_id').val();
	if(requester_id == '')
	{
		alert('Please login first..');
		return false;
	}
	if(receiver_id == '')
	{
		alert('Please try again..');
		return false;
	}
	var interest_message = $('input[name=interest_message]:checked').val();
	
	if(interest_message == ''){
		alert('Please try again..');
		return false;
	}
			
	var hash_tocken_id = $('#hash_tocken_id').val();
	var base_url = $('#base_url').val();
	var url = base_url+'search/send-photo-password-request';
	show_comm_mask();
		$.ajax({
			url: url,
			type: 'POST',
			data: {'csrf_new_matrimonial':hash_tocken_id,'requester_id':requester_id,'receiver_id':receiver_id,'interest_message':interest_message },
			dataType:'json',
			success: function(data)
			{
				$('#Photo_message').html(data.errmessage);
				$('#Photo_message').slideDown();
				if(data.status == 'success')
				{
					$('#Photo_message').addClass('alert alert-success');
					$('#user_id').val(receiver_id);
					$('#my_id').val(requester_id);
				}else{
					$('#Photo_message').addClass('alert alert-danger');
				}
				setTimeout(function() {
					$('#Photo_message').fadeOut('fast');
				}, 5000);
				update_tocken(data.tocken);
				hide_comm_mask();
			}
		});
	return false;
}

function remove(id)
{
	if(id==1)
	{
		document.getElementById("a1").style.display = "none";
		document.getElementById("a2").style.display = "block";
	}
	else if(id==2)
	{
		document.getElementById("a1").style.display = "block";
		document.getElementById("a2").style.display = "none";
	}
}
	
$("#password_form").validate({
	submitHandler: function(form) 
	{
		check_validation();
	}
});
function check_validation()
{
    var photo_pswd = $("#photo_pswd").val();
	// var member_id = $("#member_id").val();
	var member_id = $('#user_id').val();
	var my_id = $('#my_id').val();

	if(my_id == '')
	{
		alert('Please login first..');
		return false;
	}
	//alert(user_id);
	show_comm_mask();
    var hash_tocken_id = $("#hash_tocken_id").val();
	
    var base_url = $("#base_url").val();
    var url = base_url+"search/check_photo_password";
	
	$("#message_succ").hide();
	$("#message_err").hide();
	
    $.ajax({
       url: url,
       type: "post",
       data: {'photo_pswd':photo_pswd,'<?php echo $this->security->get_csrf_token_name(); ?>':hash_tocken_id,'is_post':0,'member_id':member_id },
       dataType:"json",
       success:function(data)
       {
            if(data.status == 'success')
            {
				$("#message_succ").html(data.errmessage);
                $("#message_succ").slideDown();
				setTimeout(function()
				{
					$('#message_succ').fadeOut('fast');
				}, 1000);
				
				$('#photo_pswd').val('');
				document.getElementById("a2").style.display = "none";
				document.getElementById("a3").style.display = "block";
				$('#phtos_of_id').text(member_id);
				profile_pic(member_id);
            }
			else
			{
                $("#message_err").html(data.errmessage);
                $("#message_err").slideDown();
            }
			$("#hash_tocken_id").val(data.token);
            hide_comm_mask();
    	}
    });
    return false;
}
function profile_pic(member_id)
{
	var hash_tocken_id = $("#hash_tocken_id").val();
	var base_url = $("#base_url").val();
	var url = base_url+"search/view_photos";

	$.ajax({
		url: url,
		type: "post",
		data: {'<?php echo $this->security->get_csrf_token_name(); ?>':hash_tocken_id,'member_id':member_id},
		dataType:"json",
		success:function(data)
		{
		   $('#content').html(data.content);
		   $('#slider').html(data.slider);
		   showSlides(1);
		}
	});
	return false;
}
</script>