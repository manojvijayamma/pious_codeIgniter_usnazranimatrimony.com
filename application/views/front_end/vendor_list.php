<style> .top-links li a { font-size: 12px; color: #ffffff; text-transform: uppercase; font-weight: 500;} </style>
<!-- ====== <div class="container">  Start ====== -->
	<div class="tp-page-head">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-2 col-md-8">
						<div class="page-header text-center">
							<div class="icon-circle"> <i class="icon icon-size-60  icon-list icon-white"></i> </div>
							<h1>Wedding Planner Listing</h1>
							<p class="text-white text-center">Contract with wedding planners to provide services.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		 <div class="tp-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo $base_url; ?>">Home</a></li>
                        <li class="active">Vendor List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>	
    <!-- ====== for vendor list====== -->
    <div class="" id="main_content_ajax">
        <?php include_once('vendor_list_ajax.php'); ?>
    </div>
    <!-- ====== for vendor list====== -->
	<!-- ======<div class="container">  End ====== -->
	<div class="margin-top-30"></div>
<?php 
	$this->common_model->js_extra_code_fr.="
		$(document).ready(function(){
			$(".'"'."[data-toggle='tooltip']".'"'.").tooltip();
		});
		
	   load_pagination_code_front_end();
	";
?>