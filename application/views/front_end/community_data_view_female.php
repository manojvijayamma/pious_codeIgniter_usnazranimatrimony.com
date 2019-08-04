<?php
			 					if(isset($matrimony_cnt) && $matrimony_cnt!='' && $matrimony_cnt > 0 && isset($matrimony_data) && is_array($matrimony_data) && count($matrimony_data) > 0)
                                 {
                                     foreach($matrimony_data as $matrimony_data_last) 
                                     {
                                         
                                         $matriidgroom=explode(",",$matrimony_data_last['matri_id_groom']);
                                         $matriidbride=explode(",",$matrimony_data_last['matri_id_bride']);
                                         
                                     }
                                 }
								//if(isset($matrimony_data_bride_home) && is_array($matrimony_data_bride_home) && count($matrimony_data_bride_home)>0)
								if(isset($data_row_matri_bride) && is_array($data_row_matri_bride) && is_array($data_row_matri_bride) && count($data_row_matri_bride)>0)
								{
										$member_data = $data_row_matri_bride;
										
										$path_photos = $this->common_model->path_photos;
										//foreach ($member_result as $member_data_val) {
                                        $gender = 'Male';
                                       
										include('community_data_view.php');
									
										//}
										?>
										<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 tp-pagination margin-top-20">
										<!-- for pagination-->
										<?php
											if(isset($data_row_matri_bride_count) && $data_row_matri_bride_count !='' && $data_row_matri_bride_count > 5)
											{
												echo $this->common_model->rander_pagination_front("matrimony/".$matrimony_data_last['matrimony_name']."-matrimony",$data_row_matri_bride_count);
											}
										?>
										<!-- for pagination-->
										</div>
								<?php }
								elseif(isset($matrimony_data_bride_home) && is_array($matrimony_data_bride_home) && is_array($matrimony_data_bride_home) && count($matrimony_data_bride_home)>0)
								{
										$member_data = $matrimony_data_bride_home;
										
										$path_photos = $this->common_model->path_photos;
										//foreach ($member_result as $member_data_val) {
										$gender = 'Male';
										include('community_data_view.php');
									
										//}
										?>
										<div class="xxl-16 xl-16 l-16 m-16 xs-16 s-16 tp-pagination margin-top-20">
										<!-- for pagination-->
										<?php
											if(isset($data_row_matri_bride_count) && $data_row_matri_bride_count !='' && $data_row_matri_bride_count > 5)
											{
												echo $this->common_model->rander_pagination_front("matrimony/".$matrimony_data_last['matrimony_name']."-matrimony",$data_row_matri_bride_count);
											}
										?>
										<!-- for pagination-->
										</div>
								<?php }
								else {
									?>
									<div role="alert" class="xxl-16 xl-16 l-16 m-16 s-16 xs-16 alert margin-top-20" style="background:#fcf8e3;border:1px solid #faebcc; color: #8a6d3b;">
										<p class="margin-top-10px margin-bottom-10px">
											No Data found to display.
										</p>
									</div>
								<?php } 
							?>