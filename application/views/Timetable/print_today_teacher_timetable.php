


                                                             
                                                           
                                                      
																<div class="portlet box green">
													 <div class="portlet-title">
													   
                                                          <div class="caption">
														  
                                                            <strong class="center" style="margin-right:100px;">
															Teacher Timetable for <?php echo $c_date=date_format(date_create_from_format('Y-m-d', $currentdate), 'd-m-Y');?>
															 </center>
															</div>
                                                      		
                                                        <div class="tools"> </div>
                                                    </div>
													
													<br>
																<div class="row">
																
													
													<div class="col-md-12">
                                                         <table style="width: 100%; border-collapse: collapse;" border="1">
                                                            <thead>
															
                                                                <tr>
																 <th style="width: 25px; text-align: center;height: 50x;background-color: #aeb3b3;">S.No</th>
                                                                    <th style="width: 25px; text-align: center;height: 50x;background-color: #aeb3b3;">Teacher Name</th>
																	 
																<?php $noofperiods=8; ?>
                                                                    <?php  
                                        for ($x = 1; $x <= $noofperiods; $x++) { ?>
                                        <th style="width: 25px; text-align: center;height: 50x;background-color: #aeb3b3;"><strong>Period:</strong><?php echo $x ?></th>
                                        <?php
                                    } 
                                    ?>                          
                                                                </tr>
                                                            </thead>
                            <tbody>
                               <?php $total1=[]; ?>
                              <?php if(!empty($teacher_data) ){
								   
								 
								  $i=1;foreach($teacher_data as $key => $value){
                                    //print_r($teacher_data);
									 ?>
                                  <tr>
                                         <td style="width: 25px; text-align: center;height: 30x;"><strong><?php echo $i; ?></strong></td>
                                      <td style="width: 25px; text-align: center;height: 30x;"><strong><?php echo($key); ?></strong></td>
									  
                                  <?php 
                                 
                                     for ($x = 1; $x <= 8; $x++) { 
                                        							
                                    ?> 									 
                                      <td <?php if($value[0]['attstatus']==''){
									  ?>style="background-color:white;width: 25px; text-align: center;height: 30x;" <?php } else
										  {
										 
										  ?>  style="background-color:#aeb3b3;width: 25px; text-align: center;height: 30x;" <?php  } ?>><?php if($value[0]['status']==$x)
									  { 
								       
                                        echo($value[0]['classes'].'<br>');?>
										<?php
									  }
									   if($value[1]['status']==$x)
									  {
										 
                                        echo($value[1]['classes'].'<br>' );
									  }
									  if($value[2]['status']==$x)
									  {
										 
                                        echo($value[2]['classes'].'<br>' );
									  }
									  if($value[3]['status']==$x)
									  {
										 
                                        echo($value[3]['classes'].'<br>' );
									  }
									   if($value[4]['status']==$x)
									  {
										 
                                        echo($value[4]['classes'].'<br>' );
									  }
									  if($value[5]['status']==$x)
									  {
										 
                                        echo($value[5]['classes'].'<br>' );
									  }
									  if($value[6]['status']==$x)
									  {
										 
                                        echo($value[6]['classes'].'<br>' );
									  }
									  if($value[7]['status']==$x)
									  {
										 
                                        echo($value[7]['classes'].'<br>' );
									  }
									  if($value[8]['status']==$x)
									  {
										 
                                        echo($value[8]['classes'].'<br>' );
									  }
									  if($value[9]['status']==$x)
									  {
										 
                                        echo($value[9]['classes'].'<br>' );
									  }
									  if($value[10]['status']==$x)
									  {
										 
                                        echo($value[10]['classes'].'<br>' );
									  }
									  if($value[11]['status']==$x)
									  {
										 
                                        echo($value[11]['classes'].'<br>' );
									  }
									  if($value[12]['status']==$x)
									  {
										 
                                        echo($value[12]['classes'].'<br>' );
									  }
									  if($value[13]['status']==$x)
									  {
										 
                                        echo($value[13]['classes'].'<br>' );
									  }
									  if($value[14]['status']==$x)
									  {
										 
                                        echo($value[14]['classes'].'<br>' );
									  }
									  if($value[15]['status']==$x)
									  {
										 
                                        echo($value[15]['classes'].'<br>' );
									  }
									 
                                      }
									  
                               								  
                                        ?>
										</td>

                                    
                                                  <?php $i++; } } ?>          
                                                            
                              
                         
                            </tbody>
</table>