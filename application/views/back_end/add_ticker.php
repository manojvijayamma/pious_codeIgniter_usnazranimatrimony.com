

					<div class="panel-inner-d padding-20px">
						<div class="row no-margin">
							<div class="col-lg-12">
								<form method="post" id="common_insert_update" name="common_insert_update" class="form-horizontal bordered-group  " role=form action="<?php echo $base_url.$admin_path?>/new-listing/add_ticker/ALL/1/yes"  ><div id="reponse_message"></div>
				<div class="form-group ">
				  <label class="col-sm-2 col-lg-2 control-label">Text<span class='sub_title_mem'>*</span></label>
				  <div class="col-sm-10 col-lg-10" ><input  type="text"    name="title" id="title" class="form-control  "  placeholder="Ticker text" value ="<?php echo $ticker[0]->title?>" />	
				  </div>
				</div>
				
							<div class=form-group>
							  <label class="col-sm-3"></label>
							  <div class="col-sm-9">
							  	<button type="submit" class="btn btn-primary mr10">Submit</button>
							  
										</div>
							<input type="hidden" name="csrf_new_matrimonial" value="575ee9b18ffac0f392662515c54b9533" id="hash_tocken_id" class="hash_tocken_id" />
							<input type="hidden" name="mode" value="edit" id="mode" />
							<input type="hidden" name="id" value="<?php echo $ticker[0]->id?>" id="id" />
							
						</form>
						</div>
					</div>
				</div>
					  </div>
    
