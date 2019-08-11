var is_reload_page=0;

$('#total_children').parent().parent().parent().hide();
$('input[name="status_children"]').parent().parent().parent().hide();

function scroll_to_div(div_id)
{
	$('html, body').animate({
		scrollTop: $('#'+div_id).offset().top -100 }, 'slow');
}

function remove_element(element,timout)
{
	timout = typeof timout !== 'undefined' ? timout : 10000;
	setTimeout(function(){ $(element).remove(); }, timout);
}
function check_all()
{
	$(".checkbox_val").prop("checked",$("#all").prop("checked"));
}
function check_all_exp(all_cls,cls_chk)
{
	$("."+cls_chk).prop("checked",$("."+all_cls).prop("checked"));
}
function check_uncheck_all()
{
	var total_checked = $('input[name="checkbox_val[]"]:checked').length;
	var total = $('input[name="checkbox_val[]"]').length;
	if(total ==total_checked)
	{
		$("#all").prop("checked",true);
	}
	else
	{
		$("#all").prop("checked",false);
	}
}
function search_change_limit()
{
	get_ajax_search(1);
	return false;
}
function change_order(coloumn_name,order)
{
	//alert(coloumn_name);
	$("#default_order").val(order);
	$("#default_sort").val(coloumn_name);
	get_ajax_search(1);
}
function change_sort_order(order_col)
{
	if(order_col !='')
	{
		var order_arr = order_col.split('-');
		if(order_arr[0] !='' && order_arr[1] !='')
		{
			change_order(order_arr[0],order_arr[1]);
		}
	}
}
function get_ajax_search(page_number)
{
	var base_url = $("#base_url_ajax").val();
	var page_url = base_url + page_number;
	if(page_number == "" || page_number == 0 ||  base_url =='')
	{
		alert("Some issue arise please refress page.");
		return false;
	}
	curr_page_number = page_number;
	var limit_per_page = $("#limit_per_page").val();
	var search_filed = $("#search_filed").val();
	var hash_tocken_id = $("#hash_tocken_id").val();
	var default_sort = $("#default_sort").val();
	var default_order = $("#default_order").val();
	var status_mode = $("#status_mode").val();
	
	show_comm_mask();
	$.ajax({
	   url: page_url,
	   type: "post",
	   data: {'csrf_new_matrimonial':hash_tocken_id,'is_ajax':1,'search_filed':search_filed,'limit_per_page':limit_per_page,'default_order':default_order,'default_sort':default_sort,'status_mode':status_mode},
	   success:function(data){
			$("#main_content_ajax").html(data);
			hide_comm_mask();
			load_pagination_code();
			scroll_to_div("main_content_ajax");
			update_tocken($("#hash_tocken_id_temp").val());
			$("#hash_tocken_id_temp").remove();
			/*$("#hash_tocken_id").val($("#hash_tocken_id_temp").val());*/
			is_reload_page = 0;
	   }
	});
	return false;
}

function update_status(status_update)
{
	if(status_update =='')
	{
		alert('Somthing wrong, Please refress page and try again.')
		return false;
	}
	var total_checked = $('input[name="checkbox_val[]"]:checked').length;
	if(total_checked == 0 || total_checked =='')
	{
		alert("Please select at least one record to process");
		return false;
	}
	if(status_update =='DELETE')
	{
		if(!confirm("Are you sure to delete the record?"))
		{
			return false;
		}
	}
	var selected_val = Array();
	var i=0;
	$('input[name="checkbox_val[]"]:checked').each(function() 
	{
		selected_val[i] = this.value;
		i++;
	});

	var page_number = 1;
	var base_url = $("#base_url_ajax").val();
	var page_url = base_url + page_number;
	if(page_number == "" || page_number == 0 ||  base_url =='')
	{
		alert("Some issue arise please refress page.");
		return false;
	}
	curr_page_number = page_number;
	var limit_per_page = $("#limit_per_page").val();
	var search_filed = $("#search_filed").val();
	var hash_tocken_id = $("#hash_tocken_id").val();
	var default_sort = $("#default_sort").val();
	var default_order = $("#default_order").val();
	var status_mode = $("#status_mode").val();
	
	show_comm_mask();
	$.ajax({
	   url: page_url,
	   type: "post",
	   data: {'csrf_new_matrimonial':hash_tocken_id,'is_ajax':1,'search_filed':search_filed,'limit_per_page':limit_per_page,'default_order':default_order,'default_sort':default_sort,'status_mode':status_mode,'selected_val':selected_val,'status_update':status_update},
	   success:function(data){
			$("#main_content_ajax").html(data);
			hide_comm_mask();
			load_pagination_code();
			scroll_to_div("main_content_ajax");
			update_tocken($("#hash_tocken_id_temp").val());
			$("#hash_tocken_id_temp").remove();
			/*$("#hash_tocken_id").val($("#hash_tocken_id_temp").val());*/
	   }
	});
	return false;
}
function update_tocken(tocken)
{
	$(".hash_tocken_id").each(function()
	{
	   $(this).val(tocken);
	})
}
function change_sort()
{
	get_data_ajax(1,'');
}
function get_data_ajax(page_number,url_load)
{
	show_comm_mask();
	var hash_tocken_id = $("#hash_tocken_id").val();
	var search_order = $("#search_order").val();
	if(url_load =='')
	{
		var base_url = $("#base_url").val();
		url_load = base_url+ 'search/result';
	}
	
	$.ajax({
	   url: url_load,
	   type: "post",
	   data: {'csrf_new_matrimonial':hash_tocken_id,'page_number':page_number,'is_ajax':1,'search_order':search_order},
	   success:function(data)
	   {
			console.log(data);
			$("#main_content_ajax").html(data);
			hide_comm_mask();
			load_pagination_code_front_end();
			scroll_to_div("main_content_ajax");
			update_tocken($("#hash_tocken_id_temp").val());					
			$("#hash_tocken_id_temp").remove();
	   }
	});
}
function load_pagination_code_front_end()
{	
   $("#ajax_pagin_ul li a").click(function()
   {
		var url_load = $(this).attr("href");
		url_load = typeof url_load !== 'undefined' ? url_load : '';
		var page_number = $(this).attr("data-ci-pagination-page");
		
		page_number = typeof page_number !== 'undefined' ? page_number : 0;
		if(url_load == '#' || url_load == '' && page_number)
		{
			return false;
		}
		if(page_number != undefined && page_number !='' && page_number != 0 && url_load !='')
		{
			if($("#exp_status").length > 0)
			{
				get_express_intrest_data(page_number);
			}
			else
			{
				get_data_ajax(page_number,url_load);
			}
		}
		return false;
   });
}
function load_pagination_code_community()
{	
   $("#ajax_pagin_ul li a").click(function()
   {
		var url_load = $(this).attr("href");
		url_load = typeof url_load !== 'undefined' ? url_load : '';
		var page_number = $(this).attr("data-ci-pagination-page");
		var gender = 'Female';
		
		page_number = typeof page_number !== 'undefined' ? page_number : 0;
		if(url_load == '#' || url_load == '' && page_number)
		{
			return false;
		}
		if(page_number != undefined && page_number !='' && page_number != 0 && url_load !='')
		{
		
				get_data_ajax_community(page_number,url_load,gender);
		
		}
		return false;
	 });
	 $("#ajax_pagin_ul_male li a").click(function()
   {
		var url_load = $(this).attr("href");
		url_load = typeof url_load !== 'undefined' ? url_load : '';
		var page_number = $(this).attr("data-ci-pagination-page");
		var gender = 'Male';
		
		page_number = typeof page_number !== 'undefined' ? page_number : 0;
		if(url_load == '#' || url_load == '' && page_number)
		{
			return false;
		}
		if(page_number != undefined && page_number !='' && page_number != 0 && url_load !='')
		{
		
				get_data_ajax_community(page_number,url_load,gender);
		
		}
		return false;
   });
}
function get_data_ajax_community(page_number,url_load,gender)
{
	show_comm_mask();
	var hash_tocken_id = $("#hash_tocken_id").val();
	var search_order = $("#search_order").val();
	if(url_load =='')
	{
		var base_url = $("#base_url").val();
		url_load = base_url+ 'search/result';
	}
	
	$.ajax({
	   url: url_load,
	   type: "post",
	   data: {'csrf_new_matrimonial':hash_tocken_id,'page_number':page_number,'is_ajax':1,'data_divide':gender},
	   success:function(data)
	   {
				if(gender!='' && gender=='Female')
				{
					$("#tab1primary").html(data);
					hide_comm_mask();
					load_pagination_code_community();
					scroll_to_div("tab1primary");
				}
				else
				{
					$("#tab2primary").html(data);
					hide_comm_mask();
					load_pagination_code_community();
					scroll_to_div("tab2primary");
				}
			
			update_tocken($("#hash_tocken_id_temp").val());					
			$("#hash_tocken_id_temp").remove();
	   }
	});
}
function load_pagination_code()
{	
   $("#ajax_pagin_ul li a").click(function()
   {
		var page_number = $(this).attr("data-ci-pagination-page");
		page_number = typeof page_number !== 'undefined' ? page_number : 0;
		if(page_number == 0)
		{
			return false;
		}
		if(page_number != undefined && page_number !='' && page_number != 0)
		{
			get_ajax_search(page_number);
		}
		return false;
   });
   load_checkbo();
}
function form_reset(form_id)
{
	var elemet_not_resest = new Array();
	var i = 0;
	$('.not_reset').each(function() 
	{
		elemet_not_resest[i] = this.value;
		i++;
	});
	document.getElementById(form_id).reset();
	i = 0;
	$('.not_reset').each(function()
	{
		this.value = elemet_not_resest[i];
		i++;
	});
}
function dropdownChange_mul(currnet_id,disp_on,get_list)
{
	var base_url = $("#base_url").val();
	action = base_url+ 'common_request/get_list';
	var hash_tocken_id = $("#hash_tocken_id").val();
	currnet_val = $("#"+currnet_id).val();
	if(currnet_val !='' && currnet_val !=null)
	{
		show_comm_mask();
		$.ajax({
		   url: action,
		   type: "post",
		   dataType:"json",
		   data: {'csrf_new_matrimonial':hash_tocken_id,'get_list':get_list,'currnet_val':currnet_val,'multivar':'multi','tocken_val':1},
		   success:function(data)
		   {
				$("#"+disp_on).html(data.dataStr);
				update_tocken(data.tocken);
				$('#'+disp_on).trigger('chosen:updated');
				hide_comm_mask();
				if(get_list =='state_list')
				{
					if($(".city_list_update").length > 0)
					{
						$(".city_list_update").html('<option value="">Select City</option>');
						$('.city_list_update').trigger('chosen:updated');
					}
				}
		   }
		});
	}
	else
	{
		$("#"+disp_on).html('<option value="">Select Value</option>');
		$('#'+disp_on).trigger('chosen:updated');
		if($(".city_list_update").length > 0)
		{
			$(".city_list_update").html('<option value="">Select City</option>');
			$('.city_list_update').trigger('chosen:updated');
		}
	}
}

function dropdownChange(currnet_id,disp_on,get_list)
{
	var base_url = $("#base_url").val();
	action = base_url+ 'common_request/get_list';
	var hash_tocken_id = $("#hash_tocken_id").val();
	currnet_val = $("#"+currnet_id).val();
	if(currnet_val !='' && currnet_val != null )
	{
		show_comm_mask();
		$.ajax({
		   url: action,
		   type: "post",
		   dataType:"json",
		   data: {'csrf_new_matrimonial':hash_tocken_id,'get_list':get_list,'currnet_val':currnet_val},
		   success:function(data)
		   {
				$("#"+disp_on).html(data.dataStr);
				update_tocken(data.tocken);
				hide_comm_mask();
		   }
		});
	}
	else
	{
		$("#"+disp_on).html('<option value="">Select Option First</option>');
	}
}

function select2(list_id,label)
{
	$(list_id).select2({
 		placeholder: label
	});
}
function get_suggestion_list(list_id,label)
{
	var base_url = $("#base_url").val();
	var action = base_url+ 'common_request/get_list_select2';
	var hash_tocken_id = $("#hash_tocken_id").val();
	$('#'+list_id).select2({
	 placeholder: label,
	  ajax: {
		url: action,
		type: "POST",
		dataType:'json',
		data: function (params) {
		  return {
			q: params.term, // search term
			page: params.page,
			csrf_new_matrimonial: hash_tocken_id,
			list_id:list_id
		  };
		},
	  }
	});
}

var numDays = {
	'01': 31, '02': 28, '03': 31, '04': 30, '05': 31, '06': 30, 
    '07': 31, '08': 31, '09': 30, '10': 31, '11': 30, '12': 31
};

function setDays(oMonthSel, oDaysSel, oYearSel)
{ 
	var nDays, oDaysSelLgth, opt, i = 1;
	nDays = numDays[oMonthSel[oMonthSel.selectedIndex].value]; 
	if (nDays == 28 && oYearSel[oYearSel.selectedIndex].value % 4 == 0) 
		++nDays; 
	oDaysSelLgth = oDaysSel.length; 
	if (nDays != oDaysSelLgth)
	{ 
		if (nDays < oDaysSelLgth) 
			oDaysSel.length = nDays; 
		else for (i; i < nDays - oDaysSelLgth + 1; i++)
		{ 
			opt = new Option(oDaysSelLgth + i, oDaysSelLgth + i); 
                  	oDaysSel.options[oDaysSel.length] = opt;
		} 
	}
	var oForm = oMonthSel.form;
	var month = oMonthSel.options[oMonthSel.selectedIndex].value;
	var day = oDaysSel.options[oDaysSel.selectedIndex].value;
	var year = oYearSel.options[oYearSel.selectedIndex].value;	
	//oForm.datepicker.value = year + '-' + month + '-' + day;
}

function setDate_day(num_days)
	{
		var b_date = $("#birth_date").val();
		//alert(b_date);
		var html_days = '<option value="" selected="">Day</option>';
		if(num_days !='' && num_days > 0)
		{
			for(var ij = 1;ij<=num_days;ij++)
			{
				var sell_date = '';
				if(b_date !='' && b_date == ij)
				{
					sell_date = 'selected';
				}
				html_days+= '<option '+ sell_date +' value="'+ij+'">'+ij+'</option>';
			}
			$("#birth_date").html(html_days);
		}
	}
	function month_year_change()
	{
		var m_date = $("#birth_month").val();
		var y_date = $("#birth_year").val();
		//alert(m_date);
		//alert(y_date);
		var num_days = '';
		var update_date_ddr = 0;
		if(m_date !='')
		{
			num_days = numDays[m_date];
			if(num_days !='')
			{
				if(y_date !='' && y_date > 0 && y_date % 4 == 0 && num_days == 28)
				{
					num_days = 29;
				}
				setDate_day(num_days);
			}
		}
		//alert(num_days);
		return false;
	}

var temp_value_duplicate ='';
function check_duplicate(id_field,check_on)
{
	var id = $("#id").val();
	var mode = $("#mode").val();
	var field_value = $("#"+id_field).val();
	if(id_field === "mobile")
	{
		var country_code = $("#country_code").val();
		var mobile_number = $("#mobile_number").val();
		field_value = country_code+'-'+mobile_number;
	}
	var hash_tocken_id = $("#hash_tocken_id").val();
	var base_url = $("#base_url").val();
	var page_url = base_url+ 'common_request/check_duplicate';
	if(id_field !='' && check_on !=''&& field_value !='' && mode !='' && temp_value_duplicate != field_value)
	{
		$.ajax({
		   url: page_url,
		   type: "post",
		   dataType:"json",
		   data: {'csrf_new_matrimonial':hash_tocken_id,'id':id,'mode':mode,'field_value':field_value,'field_name':id_field,'check_on':check_on},
		   success:function(data)
		   {
				if(data.status == 'success')
				{
					if(id_field === "mobile"){
						id_field = 'mobile_number';
					}
					if($("#" + id_field+'-error').length == 0) 
					{
						$( "#"+ id_field ).after( '<label id="'+id_field+'-error" class="error" for="'+id_field+'"></label>' );
					}
					
					$("#"+id_field+'-error').text('Duplicate value found, please enter another one');
					$("#"+id_field+'-error').show();
					$("#"+id_field).addClass('error');
					var varifired_filed_val = 0;
					return false;
				}
				else
				{
					if($("#" + id_field+'-error').length > 0) 
					{
						$("#"+id_field+'-error').hide();
					}
					$("#"+id_field).removeClass('error');
					var varifired_filed_val = 1;
				}
				if($("#" + id_field+'_varifired').length > 0) 
				{
					$("#"+id_field+'_varifired').val(varifired_filed_val);
				}
				update_tocken(data.tocken);
		   }
		});
	}
	return false;
}

var myVar;
function stoptimeout() {
    clearTimeout(myVar);
}
function starttimeout(selected_target) {
    myVar = setTimeout(function(){ $(selected_target).slideUp(); }, 6000);
}

function common_ajax_request(form_id)
{
	var form_data = $('#'+form_id).serialize();
	form_data = form_data+ '&is_post=0';
	var action = $('#'+form_id).attr('action');
	if(action !='')
	{
		show_comm_mask();
		$.ajax({
		   url: action,
		   type: 'post',
		   dataType:'json',
		   data: form_data,
		   success:function(data)
		   {
				update_tocken(data.tocken);
				$('#reponse_'+form_id).removeClass('alert alert-success alert-danger alert-warning');
				$('#reponse_'+form_id).html(data.errmessage);
				$('#reponse_'+form_id).slideDown();
				scroll_to_div('reponse_'+form_id);
				hide_comm_mask();
				if(data.status == 'success')
				{
					$('#reponse_'+form_id).addClass('alert alert-success');
					stoptimeout();
					starttimeout('#reponse_'+form_id);
					// for matchmaking get data after update match detail
					if( form_id !='' && form_id =='match_making_form')
					{
						var base_url = $("#base_url").val();
						var page_url = base_url+ 'matches/search-now/';
						get_data_ajax(1,page_url);
					}
					// for matchmaking get data after update match detail
				}
				else
				{
					$('#reponse_'+form_id).addClass('alert alert-danger');
					stoptimeout();
					starttimeout('#reponse_'+form_id);
				}
		   }
		});
	}
}

function clear_refine(class_reset)
{
	if(class_reset !='' && (class_reset =='age' || class_reset =='height'))
	{
		$('.'+class_reset).val('');
	}
	else 
	{
		$('.'+class_reset).prop("checked",false);
		if(class_reset =='religion')
		{
			$('.caste').prop("checked",false);
			$('#list_disp_caste').html('<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero"><span class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search">First Select Catholic Community</span></li>');
		}
		else if(class_reset =='country')
		{
			$('.state').prop("checked",false);
			$('.city').prop("checked",false);
			$('#list_disp_state').html('<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero"><span class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search">First Select Country</span></li>');
			$('#list_disp_city').html('<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero"><span class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search">First Select State</span></li>');
		}
		else if(class_reset =='state')
		{
			$('.city').prop("checked",false);
			$('#list_disp_city').html('<li class="xxl-16 xl-16 xs-16 s-16 m-16 l-16 padding-lr-zero"><span class="xxl-12 xl-12 xs-12 s-12 m-12 l-12 label-search">First Select State</span></li>');
		}
	}
	refine_search();
}
function refine_search()
{
	show_comm_mask();
	var form_data = $('#frm_filter').serialize();
	var search_order = $("#search_order").val();
	form_data = form_data+ '&is_ajax=1&search_order='+search_order;
	var base_url = $("#base_url").val();
	$.ajax({
	   url: base_url+'search/refine-search',
	   type: "post",
	   data: form_data,
	   success:function(data)
	   {
			$("#main_content_ajax").html(data);
			hide_comm_mask();
			load_pagination_code_front_end();
			scroll_to_div("main_content_ajax");
			update_tocken($("#hash_tocken_id_temp").val());					
			$("#hash_tocken_id_temp").remove();
	   }
	});
}

function refine_search_mobile()
{
	show_comm_mask();
	var form_data = $('#frm_filter_mobile').serialize();
	var search_order = $("#search_order").val();
	form_data = form_data+ '&is_ajax=1&search_order='+search_order;
	var base_url = $("#base_url").val();
	$.ajax({
	   url: base_url+'search/refine-search',
	   type: "post",
	   data: form_data,
	   success:function(data)
	   {
			$("#main_content_ajax").html(data);
			hide_comm_mask();
			load_pagination_code_front_end();
			scroll_to_div("main_content_ajax");
			update_tocken($("#hash_tocken_id_temp").val());					
			$("#hash_tocken_id_temp").remove();
	   }
	});
}

function getlist_onchange(from,to)
{
	if(from !='' && to !='')
	{
		var selected_val = Array();
		var i=0;
		$('input[name="'+from+'[]"]:checked').each(function()
		{
			selected_val[i] = this.value;
			i++;
		});
		var selected_val_to = Array();
		var j=0;
		$('input[name="'+to+'[]"]:checked').each(function()
		{
			selected_val_to[j] = this.value;
			j++;
		});
		if(i==0)
		{
			$("#list_disp_"+to).html('Please select above data');
		}
		else
		{
			var base_url = $("#base_url").val();
			var hash_tocken_id = $("#hash_tocken_id").val();
			$.ajax({
			   url: base_url+'search/get-list',
			   type: "post",
			   data: {'csrf_new_matrimonial':hash_tocken_id,'listfrom':from,'listto':to,'value':selected_val,'value_to':selected_val_to},
			   success:function(data)
			   {
					$("#list_disp_"+to).html(data);
					hide_comm_mask();				
					update_tocken($("#hash_tocken_id_temp").val());
					$("#hash_tocken_id_temp").remove();
			   }
			});
		}
	}
}

function load_choosen_code()
{
	var config = {
		'.chosen-select'           : {},
		'.chosen-select-deselect'  : {allow_single_deselect:true},
		'.chosen-select-no-single' : {disable_search_threshold:10},
		'.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
		'.chosen-select-width'     : {width:'100%'}
	}
	for (var selector in config) {
		$(selector).chosen(config[selector]);
	};
}

function save_search(form_name)
{
	var search_name = $("#search_name").val();
	if(search_name == '')
	{
		alert("Please enter Save search name");
		return false;
	}
	$("#save_search").val(search_name);
	if(form_name !='' &&  $("#"+form_name).length > 0)
	{
		$("#"+form_name).submit();
	}
	return false;
}

function common_delete_list_all_profile()
{
	var matri_id = $("#delete_matri_id").val();
	var page_name = $("#page_name").val();
	
	//alert(matri_id);
	//alert(page_name);
	
	if(matri_id == '' && page_name == ''){
		alert('Please try again..!!!');
		return false;
	}
		
	var hash_tocken_id = $('#hash_tocken_id').val();
	var base_url = $('#base_url').val();
	var url = base_url+'my-profile/common-delete-list-all-profile/';
	show_comm_mask();
		$.ajax({
		  	url: url,
			type: 'POST',
			data: {'csrf_new_matrimonial':hash_tocken_id,'matri_id':matri_id,'page_name':page_name},
			dataType:'json',
			success: function(data)
			{
				$(".modal-backdrop").hide();
				$("#main_content_ajax").html(data.profile_code);
				hide_comm_mask();
				load_pagination_code_front_end();
				scroll_to_div("main_content_ajax");
				update_tocken($("#hash_tocken_id_temp").val());					
				$("#hash_tocken_id_temp").remove();
				$('#delete_success').html(data.message);
				$('#delete_success').slideDown();
				close_model('myModal_delete');
		  	}
		});
	return false;
}
function reject_request()
{
	var requester_id = $('#requester_id').val();
	var status = $('#status_sent_recieve').val();
	
	var hash_tocken_id = $('#hash_tocken_id').val();
	var base_url = $('#base_url').val();
	var url = base_url+'my_profile/reject_request';
	var sender = 1;
	show_comm_mask();
		$.ajax({
			url: url,
			type: 'POST',
			data: {'csrf_new_matrimonial':hash_tocken_id,'requester_id':requester_id,'status':status },
			dataType:'json',
			success: function(data)
			{ 	
				$(".modal-backdrop").hide();
				$("#main_content_ajax").html(data.profile_code);
				load_pagination_code_front_end();
				scroll_to_div("main_content_ajax");
				update_tocken($("#hash_tocken_id_temp").val());					
				$("#hash_tocken_id_temp").remove();
				$('#delete_success').html(data.response);
				$('#delete_success').slideDown();
				close_model('myModal_delete12');
				//update_tocken(data.tocken);
				hide_comm_mask();
			}
		});
	return false;
}
function delete_request()
{
	var requester_id = $('#requester_id').val();
	var status = $('#status_sent_recieve').val();
	
	var hash_tocken_id = $('#hash_tocken_id').val();
	var base_url = $('#base_url').val();
	var url = base_url+'my-profile/delete-request';
	var sender = 1;
	show_comm_mask();
		$.ajax({
			url: url,
			type: 'POST',
			data: {'csrf_new_matrimonial':hash_tocken_id,'requester_id':requester_id,'status':status },
			dataType:'json',
			success: function(data)
			{ 	
				$(".modal-backdrop").hide();
				$("#main_content_ajax").html(data.profile_code);
				load_pagination_code_front_end();
				scroll_to_div("main_content_ajax");
				update_tocken($("#hash_tocken_id_temp").val());					
				$("#hash_tocken_id_temp").remove();
				$('#delete_success').html(data.response);
				$('#delete_success').slideDown();
				close_model('myModal_delete12');
				//update_tocken(data.tocken);
				hide_comm_mask();
			}
		});
	return false;
}


function delete_saved_search_set_id(id)
{
	if(id !='')
	{
		$("#saved_search_id").val(id);
	}
}
function delete_saved_search()
{
	var id = $("#saved_search_id").val();
	if(id !='')
	{
		var base_url = $("#base_url").val();
		var hash_tocken_id = $("#hash_tocken_id").val();
		show_comm_mask();
		$.ajax({
		   url: base_url+'search/delete-saved-search',
		   type: "post",
		   dataType:"json",
		   data: {'csrf_new_matrimonial':hash_tocken_id,'saved_search_id':id},
		   success:function(data)
		   {
				update_tocken(data.tocken);
				hide_comm_mask();
				$("#saved_search_id").val('');
				//$('#myModal_delete').modal('hide');
				close_model('myModal_delete');
				get_data_ajax(1,base_url+'search/saved');
				setTimeout(function(){
					$('#flash_message_saved_search').hide();
				}, 5000);
		   }
		});
	}
	else
	{
		alert("Please try agian");
	}
}
function get_express_intrest(status)
{
	$("#exp_status").val(status);
	get_express_intrest_data(1);
}
function change_status(status,id)
{
	id = typeof id !== 'undefined' ? id : '';
	if(id =='' && status =='delete')
	{
		id = $("#delete_ex_id").val();
	}
	if(id == '')
	{
		var exp_status = $("#exp_status").val();
		var chk_class = '.'+exp_status;
		var total_checked = $(chk_class+':checked').length;
		if(total_checked == 0 || total_checked =='')
		{
			alert("Please select at least one record to process");
			return false;
		}
		var selected_val = Array();
		var i=0;
		$(chk_class+':checked').each(function() 
		{
			selected_val[i] = this.value;
			i++;
		});
		id = selected_val;
	}
	if(status !='' && id !='')
	{
		get_express_intrest_data(1,status,id);
	}
	else
	{
		alert("Please reload the page and try again");
		return false;
	}
}
function get_express_intrest_data(page_number,status,id)
{
	var exp_status = $("#exp_status").val();
	var hash_tocken_id = $("#hash_tocken_id").val();
	var base_url = $("#base_url").val();
	
	status = typeof status !== 'undefined' ? status : '';
	id = typeof status !== 'undefined' ? id : '';
	
	if(page_number =='')
	{
		page_number = 1;
	}
	url_load = base_url+ 'express-interest/index/'+page_number;
	show_comm_mask();
	$.ajax({
	   url: url_load,
	   type: "post",
	   data: {'csrf_new_matrimonial':hash_tocken_id,'is_ajax':1,'exp_status':exp_status,'status':status,'id':id},
	   success:function(data)
	   {
		   if(status == 'delete')
		   {
			   //$('#myModal_delete').modal('hide');
			   close_model('myModal_delete');
		   }
			hide_comm_mask();
			$("#"+exp_status+"_response").html(data);
			load_pagination_code_front_end();
			scroll_to_div("scroll_to_main");
			update_tocken($("#hash_tocken_id_temp").val());					
			$("#hash_tocken_id_temp").remove();
	   }
	});
}
function send_message(status='sent')
{
	$('#response_message').html('');
	$("#response_message").removeClass('alert alert-danger alert-success');
	$("#response_message").slideUp();
	var receiver_id = $('#message_id').val();
	var message = $('#message').val();
	var subject = $('#subject').val();
	if(message =='')
	{
		alert("Please enter message");
		$('#message').focus();
		return false;
	}
	if(message !='' && receiver_id !='')
	{
		var base_url = $("#base_url").val();
		var url_load = base_url+ 'message/send_message';
		var hash_tocken_id = $("#hash_tocken_id").val();
		show_comm_mask();
		$.ajax({
		   url: url_load,
		   type: "post",
		   dataType:"json",
		   data: {'csrf_new_matrimonial':hash_tocken_id,'is_ajax':1,'message':message,'receiver_id':receiver_id,'msg_status':status,'subject':subject},
		   success:function(data)
		   {
			    $("#response_message").html(data.error_message);
				$("#response_message").slideDown();
				if(data.status =='success')
				{
					$('#message').val('');
					$("#response_message").addClass('alert alert-success');
				}
				else
				{
					$("#response_message").addClass('alert alert-danger');
				}
				setTimeout(function(){
					$('#response_message').hide();
				}, 5000);
				update_tocken(data.tocken);
				hide_comm_mask();
		   }
		});
	}
	else
	{
		alert("Please try again");
	}
	return false;
}
function unblock_profile(status,id,matri_id)
{
	var hash_tocken_id = $("#hash_tocken_id").val();
	var base_url = $("#base_url").val();
	var matri_id = $("#matri_id").val();
	var url  = base_url+ 'my-profile/unblock-profile';
	$('#unblock_success').hide();

	id = typeof id !== 'undefined' ? id : '';
	if(id =='' && status =='unblock')
	{
		id = $("#unblock_id").val();
	}
	show_comm_mask();
	$.ajax({
		   url: url,
		   type: "post",
		   dataType:"json",
		   data: {'csrf_new_matrimonial':hash_tocken_id,'status':status,'id':id,'block_to':matri_id},
		   success:function(data)
		   {
				if(data.status == 'unblock')
				{
					$(".modal-backdrop").hide();
					$("#main_content_ajax").html(data.block_profile_code);
					hide_comm_mask();
					load_pagination_code_front_end();
					scroll_to_div("main_content_ajax");
					update_tocken($("#hash_tocken_id_temp").val());					
					$("#hash_tocken_id_temp").remove();
					$('#unblock_success').html(data.message);
					$('#unblock_success').slideDown();
					//$('#myModal_unblock').modal('hide');
				    close_model('myModal_unblock');
				}
		   }
		});
}
function generate_otp_verify()
{
	var hash_tocken_id = $("#hash_tocken_id").val();
	var base_url = $("#base_url").val();
	var url_req = base_url+'my_dashboard/generate_otp';
	show_comm_mask();
	
/*	$.magnificPopup.open({
		items: {
			src: '#varify_mobile_pop_up'
		},
	 	type: 'inline',
		closeBtnInside: true,
	});
	$(".mfp-content").css('width','450px');
*/
	
	var datastring = 'csrf_new_matrimonial='+hash_tocken_id;
	$.ajax({
		url : url_req,
		type: 'post',
		data: datastring,
		dataType:"json",
		success: function(data)
		{
			update_tocken(data.tocken);
			if(data.status == 'success')
			{
				$("#error_message_mv").hide();
				$("#success_message_mv").html(data.error_meessage);
				$("#success_message_mv").show();
				$("#resend_link").hide();
				setTimeout(function(){ $("#resend_link").show();},20000);
				$("#verify_mobile_cont").show();
				$("#displ_mobile_generate").hide();
			}
			else
			{
				$("#success_message_mv").hide();
				$("#error_message_mv").html(data.error_meessage);
				$("#error_message_mv").show();
			}
			hide_comm_mask();
		}
	});
}

function varify_mobile_check()
{
	var hash_tocken_id = $("#hash_tocken_id").val();
	var base_url = $("#base_url").val();
	var url_req = base_url+'my_dashboard/varify_mobile_check_otp';
	var otp_mobile = $("#otp_mobile").val();
	if(otp_mobile =='')
	{
		$("#error_message_mv").html("Please enter OTP Sent on your mobile.");
		$("#error_message_mv").show();
		$("#success_message_mv").hide();
		return false;
	}
	show_comm_mask();
	$("#error_message_mv").hide();
	var datastring = 'csrf_new_matrimonial='+hash_tocken_id+'&otp_mobile='+otp_mobile;
	$.ajax({
		url : url_req,
		type: 'post',
		data: datastring,
		dataType:"json",
		success: function(data)
		{
			update_tocken(data.tocken);
			if(data.status== 'success')
			{
				$("#verify_mobile_cont").hide();
				$("#error_message_mv").hide();
				$("#success_message_mv").html(data.error_meessage);
				$("#success_message_mv").show();
				$("#close_buttonn_div").show();
			}
			else
			{
				$("#success_message_mv").hide();
				$("#error_message_mv").html(data.error_meessage);
				$("#error_message_mv").show();
			}
			hide_comm_mask();
		}
	});
}

function message_system_st(mode)
{
	$("#message_search").val('');
	message_system(mode,1);
}
function message_system(mode,page_number)
{
	var page_type = $("#page_type").val();
	var base_url = $("#base_url").val();
	if(page_type == 'compose_message')
	{
		window.location = base_url + 'message/inbox/'+mode;
	}
	var hash_tocken_id = $("#hash_tocken_id").val();
	
	mode = typeof mode !== 'undefined' ? mode : '';
	page_number = typeof page_number !== 'undefined' ? page_number : 1;
	if(mode !='')
	{
		$("#mode").val(mode);
	}
	var mode = $("#mode").val();
	var message_search = $("#message_search").val();
	var url_req = base_url+'message/inbox/'+mode+'/'+page_number;
	show_comm_mask();
	$.ajax({
		url : url_req,
		type: 'post',
		data: {'csrf_new_matrimonial':hash_tocken_id,'mode':mode,'page_number':page_number,'is_ajax':1,'message_search':message_search},
		success: function(data)
		{
			$("#main_id_display").html(data);
			update_tocken($("#hash_tocken_id_temp").val());
			$("#hash_tocken_id_temp").remove();
			hide_comm_mask();
			load_pagination_message();
			tooltip_fun();
			scroll_to_div('main_id_display');
		}
	});
	return false;
}
function load_pagination_message()
{
   $("#ajax_pagin_ul li a").click(function()
   {
		var url_load = $(this).attr("href");
		url_load = typeof url_load !== 'undefined' ? url_load : '';
		var page_number = $(this).attr("data-ci-pagination-page");
		page_number = typeof page_number !== 'undefined' ? page_number : 0;
		if(url_load == '#' || url_load == '' && page_number)
		{
			return false;
		}
		if(page_number != undefined && page_number !='' && page_number != 0)
		{
			message_system('',page_number);
		}
		return false;
   });
}
function replay_forward(mode)
{
	if(mode !='reply' && mode !='forward')
	{
		alert('Please try again');
		return false;
	}
	var total_checked = $('input[name="checkbox_val[]"]:checked').length;
	if(total_checked == 0 || total_checked =='' ||  total_checked != 1)
	{
		alert("Please select only one message for "+mode);
		return false;
	}
	if(total_checked == 1 && mode !='')
	{
		$('input[name="checkbox_val[]"]:checked').each(function() 
		{
			selected_val = this.value;
		});	
		var msg_enc_id = $("#msg_enc_id_"+selected_val).val();
		if(msg_enc_id !='')
		{
			var base_url = $("#base_url").val();
			window.location = base_url + 'message/compose/'+ msg_enc_id +'/'+mode;
		}
	}
}
function update_msg_status(status)
{
	var selected_val = Array();
	var i=0;
	var total_checked = $('input[name="checkbox_val[]"]:checked').length;
	if(total_checked == 0 || total_checked =='')
	{
		alert("Please select at least one record to process");
		return false;
	}
	$('input[name="checkbox_val[]"]:checked').each(function() 
	{
		selected_val[i] = this.value;
		i++;
	});	
	var hash_tocken_id = $("#hash_tocken_id").val();
	var base_url = $("#base_url").val();
	$("#response_update_status").removeClass('alert alert-danger alert-success');
	var mode = $("#mode").val();
	var message_search = $("#message_search").val();
	var url_req = base_url+'message/inbox/'+mode;
	show_comm_mask();
	$.ajax({
		url : url_req,
		type: 'post',
		data: {'csrf_new_matrimonial':hash_tocken_id,'selected_val':selected_val,'status':status,'mode':mode,'page_number':1,'is_ajax':1,'message_search':message_search},
		success: function(data)
		{
			//debugger;
			$("#main_id_display").html(data);
			update_tocken($("#hash_tocken_id_temp").val());
			$("#hash_tocken_id_temp").remove();
			hide_comm_mask();			
			close_model('myModal_delete');
			load_pagination_message();
			tooltip_fun();
			scroll_to_div('main_id_display');
		}
	});
	return false;
}
var in_process_imp = 0;
function importantfun(message_id)
{
	if(message_id ==='')
	{
		alert("Please reload page and try again");
		return false;
	}
	if(in_process_imp == 0)
	{
		var curr_class_status = $("#msg_imp_"+message_id).hasClass('fa fa-star-o');
		var new_class = 'fa fa-star-o';
		var current_status = 'unimported';
		var curr_class = 'fa fa-star';
		if(curr_class_status)
		{
			new_class = 'fa fa-star';
			curr_class = 'fa fa-star-o';
			current_status = 'imported';
		}
		
		in_process_imp = 1;
		var hash_tocken_id = $("#hash_tocken_id").val();
		var base_url = $("#base_url").val();
		var url_req = base_url+'message/update_status_imp';
		var mode = $("#mode").val();
		show_comm_mask();
		$.ajax({
			url : url_req,
			type: 'post',
			data: {'csrf_new_matrimonial':hash_tocken_id,'selected_val':message_id,'status':current_status,'mode':mode},
			dataType:"json",
			success: function(data)
			{
				update_tocken(data.tocken);
				$("#msg_imp_"+message_id).removeClass(curr_class);
				$("#msg_imp_"+message_id).addClass(new_class);
				hide_comm_mask();
				in_process_imp = 0;
			}
		});
		return false;
	}
}

function save_draft_send_message(status)
{
	var hash_tocken_id = $("#hash_tocken_id").val();
	var to_message = $("#to_message").val();
	var subject = $("#subject").val();
	var cms_cont= $('div.Editor-editor').html();
	$('#msg_content').val(cms_cont);
	var message = $("#msg_content").val();
	$("#response_update_status").html('');
	
	if(status =='')
	{
		alert("Please try again");
		return false;
	}
	if(to_message =='')
	{
		alert("Please select atleast one message receiver");
		$("#to_message").focus();
		return false;
	}	
	if(subject =='')
	{
		alert("Please enter subject to send");
		$("#subject").focus();
		return false;
	}
	if(message =='')
	{
		alert("Please enter message to send");
		return false;
	}
	var base_url = $("#base_url").val();
	var message_id = $("#msg_id").val();
	var url_req = base_url+'message/send_message';
	show_comm_mask();
	$.ajax({
		url : url_req,
		type: 'post',
		data: {'csrf_new_matrimonial':hash_tocken_id,'msg_status':status,'message_id':message_id,'subject':subject,'message':message,'receiver_id':to_message},
		dataType:"json",
		success: function(data)
		{
			var resp_message = '';
			if(data.status =='success')
			{
				resp_message = '<div class="alert alert-success  alert-dismissable"><div class="fa fa-check">&nbsp;</div><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>'+ data.error_message +'</div>';
				
				form_reset('mes_content_form');
				$('div.Editor-editor').html('');
				$("#subject").val('');
				$("#to_message").empty().trigger('change');
			}
			else
			{
				resp_message = '<div class="alert alert-danger alert-dismissable"><div class="fa fa-check">&nbsp;</div><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>'+ data.error_message +'</div>';
			}
			$("#response_update_status").html(resp_message);
			scroll_to_div('sc_div_message');
			update_tocken(data.tocken);
			hide_comm_mask();
		}
	});
	return false;
}
function tooltip_fun()
{
	$("[data-toggle='tooltip']").tooltip();
	$('.tooltip1').tooltip();
}
function close_model(modal_id)
{
	if(modal_id !='')
	{
		$('#'+modal_id).modal('hide');
		$(".modal-backdrop").hide();
		$('body').removeClass('modal-open');
		$("body").css('padding-right','0px');
	}
}
function delete_message()
{
	var total_checked = $('input[name="checkbox_val[]"]:checked').length;
	if(total_checked == 0 || total_checked =='')
	{
		$(".delete_alt").show();
		$(".delete_conf").hide();
	}
	else
	{
		$(".delete_conf").show();
		$(".delete_alt").hide();
	}
}


function get_ViewContactDetails(receiver_matri_id)
{
	if(receiver_matri_id ==''){
		alert('Please try again..!!!');
		return false;
	}
		
	var hash_tocken_id = $('#hash_tocken_id').val();
	var base_url = $('#base_url').val();
	var url = base_url+'search/view-contact-details';
	show_comm_mask();
		$.ajax({
		  	url: url,
			type: 'POST',
			data: {'csrf_new_matrimonial':hash_tocken_id,'receiver_matri_id':receiver_matri_id},
			dataType:'json',
			success: function(data)
			{ 	
				if(data.success = 'success'){
					$('#myModal_ViewContactDetails').html(data.contact_details);
				}else{
					alert(data.errmessage);
				}
				update_tocken(data.tocken);
				hide_comm_mask();
		  	}
		});
	return false;
}
	
function get_ViewVideo(member_id)
{
	if(member_id ==''){
		alert('Please try again..!!!');
		return false;
	}
		
	var hash_tocken_id = $('#hash_tocken_id').val();
	var base_url = $('#base_url').val();
	var url = base_url+'search/view-video';
	show_comm_mask();
		$.ajax({
		  	url: url,
			type: 'POST',
			data: {'csrf_new_matrimonial':hash_tocken_id,'member_id':member_id},
			dataType:'json',
			success: function(data)
			{ 	
				if(data.success = 'success'){
					$('#myModal_ViewVideo').html(data.video_details);
				}else{
					alert(data.errmessage);
				}
				update_tocken(data.tocken);
				hide_comm_mask();
		  	}
		});
	return false;
}


function KeycheckOnlyCharacter(e)
{	
	//var charCode = e.keyCode;
	// || charCode == 32 ----- for space
	
	var charCode = (e.keyCode ? e.keyCode : e.which);
	if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || charCode == 8 || ( charCode == 37 && charCode == 38 && charCode == 39 && charCode == 40) || charCode == 46 || charCode == 13 || charCode == 9)
	{
		return true;
	}else{
		return false;
	}
}

function KeycheckOnlyPhonenumber(e)
{
	var _dom = 0;
	_dom = document.all ? 3 : (document.getElementById ? 1 : (document.layers ? 2 : 0));
	if (document.all)
		e = window.event; // for IE
	var ch = '';
	var KeyID = '';
	var charCode = (e.keyCode ? e.keyCode : e.which);
	if (_dom == 2)
	{ // for NN4
		if (e.which > 0)
			ch = '(' + String.fromCharCode(e.which) + ')';
		KeyID = e.which;
	}
	else
	{
		if (_dom == 3)
		{ // for IE
			
			KeyID = (window.event) ? event.keyCode : e.which;
		}
		else
		{ // for Mozilla
			if (e.charCode > 0)
				ch = '(' + String.fromCharCode(e.charCode) + ')';
			KeyID = e.charCode;
		}
	}
	
	if ((KeyID >= 65 && KeyID <= 90) || (KeyID >= 97 && KeyID <= 122) || (KeyID >= 33 && KeyID <= 40) || (KeyID >= 42 && KeyID <= 42) || (KeyID == 44) || (KeyID >= 46 && KeyID <= 47) || (KeyID >= 58 && KeyID <= 64) || (KeyID >= 91 && KeyID <= 96) || (KeyID >= 123 && KeyID <= 126) || charCode == 32)
	{
		return false;
	}
	return true;
}

function display_total_childern()
{
	var marital_status = $("[name='marital_status']:checked").val();
	if(marital_status !='' && marital_status !='Unmarried')
	{
		$("#total_children").removeAttr('disabled');
		$('#total_children').parent().parent().parent().show();
		$('input[name="status_children"]').parent().parent().parent().show();
		display_childern_status();
	}
	else
	{
		$("#total_children").attr('disabled','disabled');
		$("#total_children").val('');
		$("[name='status_children']").prop('checked', false);
		$("[name='status_children']").attr('disabled','disabled');
		$("#total_children").select2();
	}
}
function display_childern_status()
{
	var total_children = $("#total_children").val();
	if(total_children !='' && total_children !='0')
	{
		//$("input[name='status_children']").attr('disabled', true);
		 $("[name='status_children']").removeAttr('disabled');
	}
	else
	{
		//$("input[name='status_children']").attr('disabled', false);
		$("[name='status_children']").attr('disabled','disabled');
		$("[name='status_children']").prop('checked', false);
	}
}

function member_like(like_status='',other_id='')
{
	//alert(like_status);
	//alert(other_id);
	if(like_status == ''){
		alert('Please try again..!!!');
		return false;
	}
	if(other_id == ''){
		alert('Please try again..!!!');
		return false;
	}
	
	var hash_tocken_id = $('#hash_tocken_id').val();
	var base_url = $('#base_url').val();
	var url = base_url+'search/member-like';
	show_comm_mask();
	$.ajax({
		url: url,
		type: 'POST',
		data: {'csrf_new_matrimonial':hash_tocken_id,'like_status':like_status,'other_id':other_id},
		dataType:'json',
		success: function(data)
		{
			if(data.login == 'login'){
				window.location = base_url + 'login';
			}else{
			
				if(data.status == 'success'){
			
					var url2 = base_url+'search/total_likes_unlikes';
					$.ajax({
						url: url2,
						type: 'POST',
						data: {'csrf_new_matrimonial':hash_tocken_id,'other_id':other_id},
						dataType:'json',
						success: function(data1)
						{
							if(data1.status == 'success'){
								$('#total_likes'+other_id).html( data1.total_likes);
								$('#total_unlikes'+other_id).html( data1.total_unlikes);
							}
						}
					});
					if(data.image_name == 'Yes'){
						$('#like_unlike_'+other_id).html("");
						$('#like_unlike_'+other_id).html("Unlike");
						$('#Yes_id_'+other_id).hide();
						$('#No_id_'+other_id).show();
				
						$('#Image_Yes_'+other_id).show();
						$('#Image_No_'+other_id).hide();
					}
				
					if(data.image_name == 'No'){
						$('#like_unlike_'+other_id).html("");
						$('#like_unlike_'+other_id).html("Like");
						$('#No_id_'+other_id).hide();
						$('#Yes_id_'+other_id).show();

						$('#Image_No_'+other_id).show();
						$('#Image_Yes_'+other_id).hide();
					}
				}else{
					alert(data.errmessage);
				}
			}
			update_tocken(data.tocken);
			hide_comm_mask();
		}
	});
	return false;
}

function send_photo_pass(requester_id,status)
{
	if(status != 'Accepted')
	{
		var hash_tocken_id = $('#hash_tocken_id').val();
		var base_url = $('#base_url').val();
		var url = base_url+'my-profile/send-photo-pass';
		show_comm_mask();
			$.ajax({
				url: url,
				type: 'POST',
				data: {'csrf_new_matrimonial':hash_tocken_id,'requester_id':requester_id},
				dataType:'json',
				success: function(data)
				{ 	
					alert(data.response);
					update_tocken(data.tocken);
					hide_comm_mask();
					window.location.reload(true);
				}
			});
	}
	else
	{
			alert('Password already send..!!!');
	}
	return false;
}
function delete_photo_reqeust(id,status)
{
	$('#requester_id').val(id);
	$('#status_sent_recieve').val(status);
}
function reject_photo_reqeust(id,status)
{
	$('#requester_id').val(id);
	$('#status_sent_recieve').val(status);
}