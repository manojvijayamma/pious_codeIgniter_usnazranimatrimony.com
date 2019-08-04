<!------------------<div class="container">----Start------------------------------------>	
    <?php echo $this->search_model->search_sub_menu('online'); ?>
    <div class="page-wrap ne-aft-log">
        <div class="container padding-0-5-xs">
            <?php redirect(base_url().'search/online-user');?>
        </div>
    </div>
    <div class="clearfix"></div>
<!------------------<div class="container">----End------------------------------------>
	<div class="margin-top-30"></div>
<?php
	$this->common_model->js_extra_code_fr.="var config = {
		'.chosen-select'           : {},
		'.chosen-select-deselect'  : {allow_single_deselect:true},
		'.chosen-select-no-single' : {disable_search_threshold:10},
		'.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
		'.chosen-select-width'     : {width:'100%'}
	}
	for (var selector in config) {
		$(selector).chosen(config[selector]);
	}

	$('.button-wrap').on('click', function(){
		$(this).toggleClass('button-active');
	});

	function change_img(id)
	{	
		var className = $('#img_'+id).attr('class');		
		if(className =='collapse-plus')
		{
			$('#img_'+id).attr('class','collapse-minus');
		}
		else
		{
			$('#img_'+id).attr('class','collapse-plus');				
		}
	} ";
?>