<div class="wide-post-image"> <img src="<?php echo $base_url; ?>assets/front_end/images/hero-image-3.jpg" alt="" class="img-responsive"> </div>
<div class="container blog-header">
    <div class="row blog-head">
        <div class="col-md-12 title">
          <!--  <h2 class="font-25-xs">Tell Us Your Story</h2>-->
             <h2 class="text-center text-white text-shadow">Tell Us Your Story</h2>
        </div>
    </div>
</div>    
<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb">
                    <li><a href="<?php if(isset($base_url) && $base_url !=''){echo $base_url;}?>">Home</a></li>
                    <li class="active">Success Story</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="">
    <div class="container padding-lr-zero-xs">
        <div class="">           
            <div class="clearfix"></div>
            
            <div role="tabpanel" class="tab-pane active" id="ne-post-success-story">
                <div class="margin-top-20">
                    <div class="bg-border" style="overflow:hidden;padding:0px;">
                        <div class="xxl-16 xl-16 s-16 m-16 l-16 xs-16 padding-lr-zero back-img">
                            <h3 class="text-center text-white text-shadow">Thank you for sharing your Story with us!</h3>
                             
                        </div>
                       
                        <div class="clearfix"></div>
                        
                    </div>
                     <div align="center">
                        <h3 class="text-center">
                        	<?php
									if($this->session->flashdata('success_message'))
									{
								?>
								<div id="flash-messages1" class="alert alert-success"><?php
									echo $this->session->flashdata('success_message'); ?>
								</div>
								<?php
									}
								?>
								<?php
									if($this->session->flashdata('error_message'))
									{
								?>
								<div id="flash-messages2" class="">
									<?php echo $this->session->flashdata('error_message'); ?>
								</div>
								<?php
									}
								?>
                                <?php
									if($this->session->flashdata('bride_id_message'))
									{
								?>
								<div id="flash-messages3" class=""><?php
									echo $this->session->flashdata('bride_id_message'); ?>
								</div>
								<?php
									}
									if($this->session->flashdata('groom_id_message'))
									{
								?>
								<div id="flash-messages4" class=""><?php
									echo $this->session->flashdata('groom_id_message'); ?>
								</div>
								<?php
									}
								?>
                           </h3>
                        </div>
                    <div class="clearfix"></div>
                    
                    <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
                        <div class="row">
                            <div class="bg-border xxl-12 xl-12 l-12 m-16 s-16 xs-16 margin-top-20 padding-0-5-xs">	
                                <form class="xxl-16 xl-16 l-16 margin-bottom-30 margin-top-20px m-16 s-16 xs-16 padding-15px padding-lr-zero-320 padding-lr-zero-480 padding-lr-zero-768 padding-lr-zero-999 padding-lr-zero-1199" action="<?php echo $base_url; ?>success-story/save-story" method="post" name="success_story_form" id="success_story_form" enctype="multipart/form-data">
                                    <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16">
                                        <h4 class="text-center bold font-darkorange">Give us details of you & your partner</h4>
                                    </div>
                                   
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="row">
                                        <div class="xxl-8 xl-8 l-8 m-16 s-16 xs-16 ">
                                            <div class="form-group xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-15px">
                                                <input type="text" name="brideid" id="brideid"  class="form-control" placeholder="Bride's ID*" required onChange="check_bride_groom(this.value,'Female')"/>
                                            </div>
                                            <div class="form-group xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-15px" style="display:none;" id="ferror">
                                          <p style=" color:red;">Please Enter Valid Bride Matri Id</p>                                            </div>
                                            
                                            <div class="form-group xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-15px">
                                                <input type="text" name="bridename" id="bridename" class="form-control" placeholder="Bride's Name*" required />
                                            </div>
                                            <div class="form-group xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-15px">
                                                <input type="text" name="marriagedate" id="marriagedate" class="form-control" placeholder="Your Marriage date*" pattern="(19|20)\d\d[\-\/.](0[1-9]|1[012])[\-\/.](0[1-9]|[12][0-9]|3[01])$" required />
                                            </div>
                                            
                                        </div>
                                        <div class="xxl-8 xl-8 l-8 m-16 s-16 xs-16">
                                            <div class="form-group xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-15px">
                                                <input type="text" name="groomid" id="groomid" class="form-control" placeholder="Groom's ID*" required  onChange="check_bride_groom(this.value,'Male')"/>
                                            </div>
                                            <div class="form-group xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-15px" style="display:none;" id="merror">
                                          <p style=" color:red;">Please Enter Valid Groom Matri Id</p>                                            </div>
                                            <div class="form-group xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-15px">
                                                <input type="text" name="groomname" id="groomname" class="form-control" placeholder="Groom's Name*" required />
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-10px">
                                            <div class="form-group xxl-16 xl-16 l-16 m-16 s-16 xs-16">
                                                <textarea class="form-control" name="successmessage" rows="5" placeholder="Tell us how you meet each other on <?php if(isset($config_data['website_title'])) {echo $config_data['website_title'];}?>." required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group xxl-16 xl-16 l-16 m-16 s-16 xs-16">
                                            <div class="xxl-4 xl-8 xs-16 s-16 m-6 l-6 margin-top-5px">
                                                Upload Your Wedding Photo:<span class="font-red">&nbsp;*</span>
                                            </div>
                                           <div class="xxl-9 xl-8 xs-16 s-16 m-10 l-10 margin-top-10px-320 margin-top-5px-480">
                                           
                                               <input type="file" extension="jpg|png|jpeg|gif|bmp" value="Upload Photo" name="weddingphoto" id="weddingphoto" class="form-control" required/>
                                              <label for="351" class="font-13-normal  src-choosen">&nbsp;&nbsp;Allowed File type jpg | png | jpeg | gif | bmp.&nbsp;&nbsp;</label>
                                            </div>
                                        </div>

                                        <div class="form-group xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-0-xs text-center">
                                            <div class="xxl-10 xxl-margin-left-2 xl-10 xl-margin-left-3 l-10 l-margin-left-4 m-margin-left-4 m-10 margin-top-15px font-14px-320 margin-top-0-xs">
                                                
                                                <input id="366" type="checkbox" value="yes" name="terms_condition" class="" checked>
                                                <label for="366" class="radio-clr font-13-normal margin-top-3">&nbsp;I accept licence</label><a target="_blank" href="<?php echo $base_url;?>terms-condition" class="text-decoration-none">Terms And Conditions</a>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group xxl-16 xl-16 l-16 m-16 s-16 xs-16">
                                            <div class="xxl-7 xxl-margin-left-4 xl-6 xl-margin-left-4 l-8 l-margin-left-4 m-margin-left-3 m-10 margin-top-15px margin-top-0-xs">
                                            
                                     			<input type="submit" class="btn xxl-16 xs-16 text-white" value="submit">
                                           
                        <!--<a href="" class="btn xxl-16 xs-16 text-white"><i class="fa fa-check"></i> Submit</a>	-->			
                                               
                                            <!--<input id="398" required type="checkbox" value="yes" name="photo_search" class="#" checked>
                                            <label for="398" class="radio-clr font-13-normal" style="font-size: 11px;display: inline;" >I would like to feature in <?php if(isset($config_data['website_title'])) {echo $config_data['website_title'];}?> ads and stories</label>
                                            -->
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id" />
                                </form>
                            </div>
                            
                            <div class="xxl-4 xl-4 l-4 m-16 xs-16 s-16 hidden-sm hidden-xs margin-top-10">
                                <!--<div class="row">
                                    <a href="#" class="pull-right">
                                        <img src="<?php //echo $base_url; ?>assets/front_end/images/icon/matrimony-directory.gif" class="text-center img-responsive advert-img" style="border-top:1px solid #ddd;" alt="" />
                                    </a>
                                </div>
                                <div class="clearfix"></div>-->
                                <div class="">
                            <img src="<?php echo $base_url; ?>assets/front_end/images/icon/appdownload-bg.png" class="img-responsive mobile-app-img" alt="" />
                                    <span class="mobile-app-text">Search for your match<br />anytime, anywhere.</span>
                                    <a href="<?php echo $base_url.'mobile-matri';?>" class="mobile-app-btn">Install Mobile App</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <hr>
    </div>
</div>
<div class="clearfix"></div>
<div class="margin-top-30"></div>
<?php 
$year=date("Y");
$day_mnth=date("d-m");
?>
 <?php
		$this->common_model->js_extra_code_fr.="
		$( document ).ready(function() {
			setTimeout(function(){
				$('#flash-messages1').hide();
				$('#flash-messages2').hide();
				$('#flash-messages3').hide();
				$('#flash-messages4').hide();
			}, 5000);
		});
		if($('#success_story_form').length > 0)
		{
			$('#success_story_form').validate({
				rules: {
					groomname: {
					  required: true,
					  lettersonly: true
					},
					bridename: {
					  required: true,
					  lettersonly: true
					},
				 },
				submitHandler: function(form)
				{
					return true;
				}
			});
		} 
		// $('#marriagedate').datepicker({ 
		// 	format: 'yyyy-mm-dd',
        // });
        $('#marriagedate').Zebra_DatePicker({
			//default_position:'below',
			format: 'd-m-Y',
			direction: [false, '".$day_mnth."-".$year."'],
			
		});
		
		function check_bride_groom(matri_id,type)
		{	
			//var matri_id = matri_id;
			var hash_tocken_id = $('#hash_tocken_id').val();
			$.ajax({
					url: '".$base_url.'success-story/check_bride_groom'."',
	  				type: 'post',
	   				data: {'csrf_new_matrimonial':hash_tocken_id,'type':type,'matri_id':matri_id},
					dataType:'json',
					success: function(data)
					{ 	
						if(data.status == 'success')
						{	
							if(type == 'Female')
							{	
								 $(ferror).hide();
								 $('#bridename').val(data.username);
								
							}
							else if(type == 'Male')
							{
								$(merror).hide();
								$('#groomname').val(data.username);
							}
							return false;
						}
						if(data.status == 'error')
						{	
							if(type == 'Female')
							{	
								$(ferror).show();
								$('#bridename').val('');
							}
							else if(type == 'Male')
							{	
								$(merror).show();
								$('#groomname').val('');
							}
							return false;
						}
  					}
				}); 
			return false;
		}
";?>
<!-- <style>
.Zebra_DatePicker_Icon {
        display:none !important;
}
</style>
<script>
$( document ).ready(function() {
    $('.Zebra_DatePicker').css('');
    $('.Zebra_DatePicker').css('top',"957px");
//$('.Zebra_DatePicker').attr('style','width:257px;top:957px;right:843px;');
});
</script> -->