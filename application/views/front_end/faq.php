<?php $faq_arr = $this->common_model->get_count_data_manual('faq_master',array('status'=>'APPROVED'),2,'*','id asc'); ?>
    <div class="tp-page-head">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="page-header text-center">
                        <div class="icon-circle">
                            <i class="icon icon-size-60 icon-padlock-1 icon-white"></i>
                        </div>
                        <h1>FAQ</h1>
                        <p class="text-white"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>		
    <div class="tp-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ol class="breadcrumb">
                        <li><a href="<?php if(isset($base_url) && $base_url !=''){echo $base_url; }?>">Home</a></li>
                        <li class="active"> FAQ</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="st-accordion">
                    
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php
					if(isset($faq_arr) && $faq_arr !='' && is_array($faq_arr) && count($faq_arr) > 0)
					{
						$sirst_tab = 'in';
						foreach($faq_arr as $faq_arr_val)
						{
					?>
                        <div class="panel panel-default" onClick="change_img('<?php echo $faq_arr_val['id'];?>')">
                            <div class="panel-heading" role="tab" id="heading<?php echo $faq_arr_val['id'];?>">
                                <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $faq_arr_val['id']; ?>" aria-expanded="true" aria-controls="collapse<?php echo $faq_arr_val['id']; ?>">
                                <i class="fa fa-chevron-circle-right fa-lg"></i> <?php echo $faq_arr_val['question']; ?> </a> </h4>
                            </div>
                            <div id="collapse<?php echo $faq_arr_val['id'];?>" class="accordion-body panel-collapse collapse <?php echo $sirst_tab; ?>" role="tabpanel" aria-labelledby="heading<?php echo $faq_arr_val['id']; ?>">
                                <div class="panel-body">
                                   <?php echo $faq_arr_val['answer']; ?>
                                </div>
                            </div>
                        </div>
                    <?php
							$sirst_tab = '';
						}
					}
					else
					{
						?>	
                        <div class="container padding-lr-zero-xs" style="margin-bottom: 00px;">
							<div class="new_reg">
								<header class="header_bg" style="margin-bottom: 00px;">
									<h1>No Data Available</h1>
								</header> 
							</div>
					    </div>
                        
                        <?php
					}?>			
					                                                                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="margin-top-40"></div>
<?php
	$this->common_model->js_extra_code_fr.="
	/*jQuery(function ($) {
		$('div.accordion-body').on('show.bs.collapse', function () {
			$(this).parent('div').find('.fa').removeClass('fa-angle-double-down').addClass('fa-angle-double-up');
		});
		$('div.accordion-body').on('hide.bs.collapse', function () {
			$(this).parent('div').find('.fa').removeClass('fa-angle-double-up').addClass('fa-angle-double-down');
		});
	});*/
		function change_img(id){
			$('#collapse'+id).parent('div').find('.fa').removeClass('fa-angle-double-down').addClass('fa-angle-double-up');
			$('div.accordion-body').on('hide.bs.collapse', function () {
				$(this).parent('div').find('.fa').removeClass('fa-angle-double-up').addClass('fa-angle-double-down');
			});
		}
		jQuery(document).ready(function($){
			//update these values if you change these breakpoints in the style.css file (or _layout.scss if you use SASS)
			var MqM= 768,
			MqL = 1024;
			
			var faqsSections = $('.cd-faq-group'),
			faqTrigger = $('.cd-faq-trigger'),
			faqsContainer = $('.cd-faq-items'),
			faqsCategoriesContainer = $('.cd-faq-categories'),
			faqsCategories = faqsCategoriesContainer.find('a'),
			closeFaqsContainer = $('.cd-close-panel');
			
			//select a faq section 
			faqsCategories.on('click', function(event){
				event.preventDefault();
				var selectedHref = $(this).attr('href'),
				target= $(selectedHref);
				if( $(window).width() < MqM) {
					faqsContainer.scrollTop(0).addClass('slide-in').children('ul').removeClass('selected').end().children(selectedHref).addClass('selected');
					closeFaqsContainer.addClass('move-left');
					$('body').addClass('cd-overlay');
					} else {
					$('body,html').animate({ 'scrollTop': target.offset().top - 19}, 200); 
				}
			});
			
			//close faq lateral panel - mobile only
			$('body').bind('click touchstart', function(event){
				if( $(event.target).is('body.cd-overlay') || $(event.target).is('.cd-close-panel')) { 
					closePanel(event);
				}
			});
			faqsContainer.on('swiperight', function(event){
				closePanel(event);
			});
			
			//show faq content clicking on faqTrigger
			faqTrigger.on('click', function(event){
				event.preventDefault();
				$(this).next('.cd-faq-content').slideToggle(200).end().parent('li').toggleClass('content-visible');
			});
			
			//update category sidebar while scrolling
			$(window).on('scroll', function(){
				if ( $(window).width() > MqL ) {
					(!window.requestAnimationFrame) ? updateCategory() : window.requestAnimationFrame(updateCategory); 
				}
			});
			
			$(window).on('resize', function(){
				if($(window).width() <= MqL) {
					faqsCategoriesContainer.removeClass('is-fixed').css({
						'-moz-transform': 'translateY(0)',
						'-webkit-transform': 'translateY(0)',
						'-ms-transform': 'translateY(0)',
						'-o-transform': 'translateY(0)',
						'transform': 'translateY(0)',
					});
				}	
				if( faqsCategoriesContainer.hasClass('is-fixed') ) {
					faqsCategoriesContainer.css({
						'left': faqsContainer.offset().left,
					});
				}
			});
			
			function closePanel(e) {
				e.preventDefault();
				faqsContainer.removeClass('slide-in').find('li').show();
				closeFaqsContainer.removeClass('move-left');
				$('body').removeClass('cd-overlay');
			}
			
			function updateCategory(){
				updateCategoryPosition();
				updateSelectedCategory();
			}
			
			function updateCategoryPosition() {
				var top = $('.cd-faq').offset().top,
				height = jQuery('.cd-faq').height() - jQuery('.cd-faq-categories').height(),
				margin = 80;
				if( top - margin <= $(window).scrollTop() && top - margin + height > $(window).scrollTop() ) {
					var leftValue = faqsCategoriesContainer.offset().left,
					widthValue = faqsCategoriesContainer.width();
					faqsCategoriesContainer.addClass('is-fixed').css({
						'left': leftValue,
						'top': margin,
						'-moz-transform': 'translateZ(0)',
						'-webkit-transform': 'translateZ(0)',
						'-ms-transform': 'translateZ(0)',
						'-o-transform': 'translateZ(0)',
						'transform': 'translateZ(0)',
					});
					} else if( top - margin + height <= $(window).scrollTop()) {
					var delta = top - margin + height - $(window).scrollTop();
					faqsCategoriesContainer.css({
						'-moz-transform': 'translateZ(0) translateY('+delta+'px)',
						'-webkit-transform': 'translateZ(0) translateY('+delta+'px)',
						'-ms-transform': 'translateZ(0) translateY('+delta+'px)',
						'-o-transform': 'translateZ(0) translateY('+delta+'px)',
						'transform': 'translateZ(0) translateY('+delta+'px)',
					});
					} else { 
					faqsCategoriesContainer.removeClass('is-fixed').css({
						'left': 0,
						'top': 0,
					});
				}
			}
			
			function updateSelectedCategory() {
				faqsSections.each(function(){
					var actual = $(this),
					margin = parseInt($('.cd-faq-title').eq(1).css('marginTop').replace('px', '')),
					activeCategory = $('.cd-faq-categories a[href=".'"'."#'+actual.attr('id')+'".'"'."]'),
					topSection = (activeCategory.parent('li').is(':first-child')) ? 0 : Math.round(actual.offset().top);
					if ( ( topSection - 20 <= $(window).scrollTop() ) && ( Math.round(actual.offset().top) + actual.height() + margin - 20 > $(window).scrollTop() ) ) {
						activeCategory.addClass('selected');
						}else {
						activeCategory.removeClass('selected');
					}
				});
			}
		}); ";
?>
