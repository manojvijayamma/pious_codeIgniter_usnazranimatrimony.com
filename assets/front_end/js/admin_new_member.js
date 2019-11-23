$('#total_children').parent().parent().hide();
$('input[name="status_children"]').parent().parent().hide();

dropdownChange('country_id','state_id','state_list');

function showChildern(){
    var marital_status = $("[name='marital_status']:checked").val();
	if(marital_status !='' && marital_status !='Unmarried')
	{
        $('#total_children').parent().parent().show();
		$('input[name="status_children"]').parent().parent().show();
    }
    else{
        $('#total_children').parent().parent().hide();
		$('input[name="status_children"]').parent().parent().hide();
    }
}