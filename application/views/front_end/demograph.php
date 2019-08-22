<style>
	table th, table td {
	padding: 10px;
	/* background: ; */
	text-align: left;
	border-bottom: 1px solid #FFFFFF;
	}
	.table {
	width: 100%;
	max-width: 100%;
	margin-bottom: 20px;
	background-color: #fff;
	border: 1px solid #fff !important;
	}
	
	.table>thead>tr>th {
	vertical-align: bottom;
	border-bottom: 1px solid #fff !important;
	}
	.table-striped>tbody>tr:nth-of-type(odd) {
	background-color: #fff !important;
	}
	.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
	padding: 8px;
	line-height: 1.42857143;
	vertical-align: top;
	border-top: 1px solid #fff !important;
	}
	table tbody tr:last-child td {
	border: none;
	border: 2px solid #fff;
	text-align:center;
	border-radius: 3px;
	}
	
	#chart_wrap {
	position: relative;
	padding-bottom: 100%;
	height: 0;
	overflow:hidden;
	}
	
	#chart_div {
	position: absolute;
	top: 0;
	left: 0;
	width:100%;
	height:100%;
	}
	
	#chart_div-2 {
	position: absolute;
	top: 0;
	left: 0;
	width:100%;
	height:100%;
	}
	
	
	
	<!-- form {
		margin: 40px 0;
	} -->
	label:hover {
	color: rgb(255, 255, 255) !important;
	}
	
	label {
	width: 129px;
	border-radius: 28px;
	border: 1px solid #D1D3D4;
	background: #428bca;
	color: #fff !important;
	}
	
	/* hide input */
	input.radio:empty {
	margin-left: -999px;
	}
	
	/* style label */
	input.radio:empty ~ label {
	position: relative;
	float: left;
	line-height: 2.5em;
	text-indent: 3.5em;
	margin-top: -23px;
	cursor: pointer;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
	}
	
	input.radio:empty ~ label:before {
	position: absolute;
	display: block;
	top: 0;
	bottom: 0;
	left: 0;
	content: '';
	width: 2.5em;
	background: #4bcd6c;
	border-radius: 40px;
	}
	
	/* toggle hover */
	input.radio:hover:not(:checked) ~ label:before {
	content:'\2714';
	text-indent: .9em;
	color: #C2C2C2;
	}
	
	input.radio:hover:not(:checked) ~ label {
	color: #888;
	}
	
	/* toggle on */
	input.radio:checked ~ label:before {
	content:'\2714';
	text-indent: .9em;
	color: #ffffff;
	background-color: #4DCB6D;
	}
	
	input.radio:checked ~ label {
	color: #777;
	}
	.table>tbody>tr>td {
	padding: 10px 4px;
	font-weight: 300;
	font-family: 'Roboto', sans-serif;
	background: #428bca;
	color: white;
	text-align: center;
	}
	/* radio focus */
	input.radio:focus ~ label:before {
	box-shadow: 0 0 0 3px #999;
	}
</style>
<script>
	<?php
		$this->common_model->js_extra_code_fr.="
		
		// Load the Visualization API and the piechart package.
		google.charts.load('current', {'packages':['corechart']});
		
		// Set a callback to run when the Google Visualization API is loaded.
		google.charts.setOnLoadCallback(pie_chart);
		google.charts.setOnLoadCallback(pie_chart2);
		
		
		function pie_chart(gender='') {
		
		var base_url = $('#base_url').val();
		var url = base_url+'demograph/relegion-chart';
		var hash_tocken_id = $('#hash_tocken_id').val();
	    var jsonData = $.ajax({
		type:'POST',
		url: url,
		dataType: 'json',
		data : {'csrf_new_matrimonial':hash_tocken_id,'gender':gender},
		async: false
        }).responseText;
        
		// Create our data table out of JSON data loaded from server.
		// alert(jsonData);return false;
		var data = new google.visualization.DataTable(jsonData);
		
		// Instantiate and draw our chart, passing in some options.
		var chart = new google.visualization.PieChart(document.getElementById('piechart_div'));
		chart.draw(data, { height: 240, is3D: true});
		}
		
		function pie_chart2(gender='') {
		
		var base_url = $('#base_url').val();
		var url = base_url+'demograph/age-chart';
		var hash_tocken_id = $('#hash_tocken_id').val();
	    var jsonData = $.ajax({
		type:'POST',
		url: url,
		dataType: 'json',
		data : {'csrf_new_matrimonial':hash_tocken_id,'gender':gender},
		async: false
        }).responseText;
        
		// Create our data table out of JSON data loaded from server.
		// alert(jsonData);return false;
		var data = new google.visualization.DataTable(jsonData);
		
		// Instantiate and draw our chart, passing in some options.
		var chart = new google.visualization.PieChart(document.getElementById('piechart_div2'));
		chart.draw(data, { height: 240 ,is3D: true});
		}
		
		$('#show_response_gender').on('click','input[name=radio]', function(){
		
		var gender  = $('input[name=radio]:checked', '#myForm').val();
		//var country = $('input[name=country]:checked', '#myForm').val();
		if(gender != ''){
		var base_url = $('#base_url').val();
		var url = base_url+'demograph/gender-data';
		var hash_tocken_id = $('#hash_tocken_id').val();
		show_comm_mask();
		$.ajax({
			type:'POST',
			url: url,
			dataType: 'json',
			data : {'csrf_new_matrimonial':hash_tocken_id,'gender':gender},
			success: function(data)
			{ 
				/*$('#show_response_country').html(null);
				$('#show_response_country').html(data.progress);*/
		
				if(gender == 'Male'){
					var male = (document.getElementById('count_male'));
					var result_count =male.textContent;
				}
				if(gender == 'Female'){
					var female = (document.getElementById('count_female'));
					var result_count =female.textContent;
				}
				if(gender == 'Both'){
					var both = (document.getElementById('count_both'));
					var result_count =both.textContent;
				}
		
				if(result_count != 0){
					$('#member_religion_chart').show();
					$('#member_age_chart').show();
					pie_chart(gender);
					pie_chart2(gender);
				}else{
					$('#member_religion_chart').hide();
					$('#member_age_chart').hide();
				}
				update_tocken(data.tocken);
				hide_comm_mask();
			}
		});
		}else{
			alert('Please select gender..!!');
		}
	});
		
		/*$('#show_response_country').on('click','input[name=country]', function(){
		var gender  = $('input[name=radio]:checked', '#myForm').val();
		//var country = $('input[name=country]:checked', '#myForm').val();
		if(country != ''){		
			var base_url = $('#base_url').val();
			var url = base_url+'demograph/country-data';
			var hash_tocken_id = $('#hash_tocken_id').val();
			show_comm_mask();
			$.ajax({
				type:'POST',
				url: url,
				dataType: 'json',
				data : {'csrf_new_matrimonial':hash_tocken_id,'gender':gender},
				success: function(data){ 
					$('#show_response_gender').html(null);
					$('#show_response_gender').html(data.progress);
				
					//alert(country);
					if(country == 'All'){
						var all = (document.getElementById('count_all'));
						var result_count =all.textContent;
					}
					if(country == 'Pakistan'){
						var pakistan = (document.getElementById('count_pakistan'));
						var result_count =pakistan.textContent;
					}
					if(country == 'India'){
						var india = (document.getElementById('count_india'));
						var result_count =india.textContent;
					}
		
					if(country == 'Others'){
						var others = (document.getElementById('count_others'));
						var result_count =others.textContent;
					}
					if(country == 'Australia'){
						var australia = (document.getElementById('count_australia'));
						var result_count =australia.textContent;
					}
					if(country == 'United Kingdom'){
						var uk = (document.getElementById('count_uk'));
						var result_count =uk.textContent;
					}
					if(country == 'United States'){
						var usa = (document.getElementById('count_usa'));
						var result_count =usa.textContent;
					}
					if(country == 'Gulf'){
						var gulf = (document.getElementById('count_gulf'));
						var result_count =gulf.textContent;
					}
					if(country == 'Canada'){
						var canada = (document.getElementById('count_canada'));
						var result_count =canada.textContent;
					}
		
					//alert(result_count);
					if(result_count != 0){
						$('#member_religion_chart').show();
						$('#member_age_chart').show();
						pie_chart(gender);
						pie_chart2(gender);
					}else{
						$('#member_religion_chart').hide();
						$('#member_age_chart').hide();
					}
		
					update_tocken(data.tocken);
					hide_comm_mask();
				}
			});
		}else{
			alert('Please select country..!!');
		}
	});*/
	";?>
</script>


<!-- ======= <div class="container"> Start======= -->	
<div class="tp-page-head">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8">
				<div class="page-header text-center">
					<div class="icon-circle">
						<i class="icon icon-size-60 icon-lock icon-white"></i>
					</div>
					<h1>MEMBER DEMOGRAPHICS</h1>
					
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<br>

<div class="xxl-12 xxl-margin-left-2 xl-12 xl-margin-left-2 xs-16 xs-margin-left-0 s-16 xs-margin-left-0 m-16 m-margin-left-0 l-16 l-margin-left-0 margin-top-10px padding-15px border-1px-light-grey box-shadow-light border-radius-5px">
	<div class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 margin-top-10px">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-primary"><!-- panel panel-primary -->
					<div class="panel-heading">
						<!-- ====  ==== --><h3 class="panel-title" > <!-- MEMBER DEMOGRAPHICS --> <a href="#panel-title" class="anchorjs-link"><span class="anchorjs-icon"></span></a></h3>
					</div>
					<span id="loader"></span>
					
					<div class="panel-body">
						<form method="post" id="myForm">
							<div id="show_response_gender">
								<div data-delay="100" class="xs-16 xxl-6 xl-6 l-6 m-16 s-16 margin-top-5px text-center animated"> 
									<div class="service-sec">	
										<div class="panel panel-primary" style="height:254px;">
											<div class="panel-heading">
												<h3 class="panel-title">SELECT GENDER<a class="anchorjs-link" href="#panel-title"></a></h3>
											</div>
											<div class="panel-body">
												<div class="table-responsive" style="overflow-x: hidden;">
													<table class="table table-striped">
														<tbody>
															
															<tr>
																<th scope="row"><input type="radio" name="radio" id="radio1" class="radio" value="Male" />
																<label for="radio1">Male</label> </th>
																<td id="count_male"><?php echo $count = $this->demograph_model->demograph_data('Male','All','All','All');?></td>
															</tr>
															<tr>
																<th scope="row"><input type="radio" name="radio" id="radio2" class="radio" value="Female"/>
																<label for="radio2">Female</label></th> 
																
																<td id="count_female"><?php echo $count = $this->demograph_model->demograph_data('Female','All','All','All');?></td>
															</tr>
															<tr>
																<th scope="row"><input type="radio" name="radio" id="radio4" class="radio" value="Both" checked/>
																<label for="radio4">Both</label></th>
																<td id="count_both"><?php echo $count = $this->demograph_model->demograph_data('All','All','All','All');?></td>
															</tr> 
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
                            
							<div id="member_religion_chart" data-delay="500" class="xxl-8 xl-8 l-8 m-16 s-16 xs-16 margin-top-5px animated">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<h3  class="panel-title">MEMBERS BY  COMMUNITY</h3>
									</div>
									<div class="panel-body">
									<div id="piechart_div"></div>
								</div>
                            </div>
                        </div>
							
							<div  id="member_age_chart" class="xxl-8 xl-8 l-8 m-16 s-16 xs-16 margin-top-5px animated">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<h3  class="panel-title">MEMBERS BY AGE GROUP</h3>
									</div>
									<div class="panel-body">
										<div id="piechart_div2"></div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<br>
<!-- ======= <div class="container">   End======= -->
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="hash_tocken_id_temp" class="hash_tocken_id" />
<input type="hidden" name="base_url" value="<?php echo $base_url; ?>" id="base_url" />