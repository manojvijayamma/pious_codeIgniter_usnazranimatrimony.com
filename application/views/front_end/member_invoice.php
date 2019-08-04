<?php $dna = $this->common_model->data_not_availabel;
$base_url = base_url();
?>
<div class="container">
<div class="pad margin no-print" style="margin-top:10px!important;">
	<div class="alert alert-info" style="margin-bottom: 0!important;">												
    <h4 style="font-weight:normal;"><i class="fa fa-info-circle"></i> <b>Note:</b>
    This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.</h4>
  </div>
</div>
<div id="printableArea">
<style type="text/css">
@media print
{
    .noprint {display:none;}
	h2{
		margin-top:0px !important;
		padding-top:0px !important;
	}
}

table td {
    text-align:left !important;
}
table th, table td{
	text-align:left !important;
}
</style>
<section class="invoice" style="padding: 0px 0 17px 0 !important;border: 2px solid #e6e1e1;">
	<div class="row">
    	<div class="col-xs-12">
      		<h2 class="page-header text-center" style="border-bottom: 1px solid #e8e4e4">
        		<i class="fa fa-globe"></i>&nbsp;<strong><?php echo $config_data['web_frienly_name'];?></strong>
	      	</h2>
    	</div>
  	</div>
  	<div class="invoice-info">
    	<div class="col-md-4 col-sm-4 col-xs-12 invoice-col">
	  		From
      		<address>
     			<strong><?php echo $config_data['web_frienly_name'];?></strong><br>
     			<div class="row">
     				<div class="col-xs-12">Contact No : <?php echo $config_data['contact_no'];?></div>
     				<div class="col-xs-12">Email : <?php echo $config_data['from_email'];?></div>
      			</div>
       		</address>
    	</div>
	    <div class="col-md-4 col-sm-4 col-xs-12 invoice-col">
    		&nbsp;&nbsp;&nbsp; To
     		<address>
    			<div class="col-xs-12"><strong><?php echo $payment_data['name'];?></strong></div> 
    			<div class="col-xs-12">Address : <?php echo $payment_data['address'];?></div>
    			<div class="col-xs-12">Mobile : <?php echo $payment_data['mobile'];?></div>
     			<div class="col-xs-12">Email : <?php echo $payment_data['email'];?></div>
      		</address>
    	</div>
    	<div class="col-md-4 col-sm-4 col-xs-12 invoice-col">
            <div class="col-xs-12"><strong>Invoice : </strong>INV001<?php echo $payment_data['id'];?></div>
            <div class="col-xs-12"><strong>Customer Id : </strong><?php echo $payment_data['matri_id'];?></div>
            <div class="col-xs-12"><strong>Payment Mode : </strong><?php echo $payment_data['payment_mode'];?></div>
    	</div>
	</div>

	<div class="row">
	<div class="col-xs-12 table-responsive invoice-t" style="width: 99%;
    margin-left: 6px;margin-top:10px;">
      <table class="table invoice-m-top">
        <thead>
          <tr>
            <th>Qty</th>
            <th>Product</th>           
            <th>Activated On</th>
            <th>Expired On</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
    		<td><?php echo $payment_data['plan_name'];?> Membership for <?php echo $payment_data['plan_duration'];?> Days</td>
            <td><?php echo $this->common_model->displayDate($payment_data['plan_activated']);?></td>
            <td><?php echo $this->common_model->displayDate($payment_data['plan_expired']);?></td>
            <td><?php echo $payment_data['currency'].' '.number_format($payment_data['plan_amount'],2);?></td>
         </tr>
         
         <?php 
             if($payment_data['discount_detail'] !='' && $payment_data['discount_amount'] !='' && $payment_data['discount_amount'] > 0)
             {
         ?>
          <tr>
            <td colspan="3"><b>&nbsp;</b></td>
            <td><b>Coupan Code (<?php echo $payment_data['discount_detail'];?>)</b></td>
            <td >-<?php echo $payment_data['currency'].' '.number_format($payment_data['discount_amount'],2);?></td>
          </tr>
         <?php 
            }
             $e = 0;
             if($payment_data['tax_name'] !='' && $payment_data['tax_amount'] !='' && $payment_data['tax_percentage'] !='')
             {
         ?>
          <tr>
            <td colspan="3"><b>&nbsp;</b></td>
            <td><b><?php echo $payment_data['tax_name'];?> (<?php echo $payment_data['tax_percentage'];?>%)</b></td>
            <td ><?php echo $payment_data['currency'].' '.number_format($payment_data['tax_amount'],2);?></td>
          </tr>
         <?php 
            }
         ?>
         <tr>
            <td colspan="3"><b>&nbsp;</b></td>
            <td><b>Grand Total</b></td>
            <td><?php echo $payment_data['currency'].' '.number_format($payment_data['grand_total'],2);?></td>
          </tr>
       	</tbody>
      </table>
      
     <p class="text-center">This is a computer generated invoice</p>
    	</div>
	</div>
</section>
</div>

<section class="invoice" style="padding: 0px 0 17px 0 !important;border-bottom: 2px solid #e6e1e1;border-left: 2px solid #e6e1e1;border-right: 2px solid #e6e1e1;">
	<br/>
<div class="row no-print">
    <div class="col-xs-12">
       	<div align="center">
			<img src="<?php echo $base_url; ?>assets/front_end/img/print.png" onClick="printDiv('printableArea')" style=" text-align:center; cursor:pointer;" ></br>
			<span><strong>Print Invoice</strong></span>
        </div>
    </div>
    </div>
</div>
</section>
<br>
<?php
	$this->common_model->js_extra_code_fr.="
	function printDiv(divName) {
		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;
				
		printContents = printContents.replace(/col-xs-12 invoice-col/gi, 'col-xs-4 invoice-col');	
		document.body.innerHTML = printContents;

		window.print();

		document.body.innerHTML = originalContents;
	}
	";
?>