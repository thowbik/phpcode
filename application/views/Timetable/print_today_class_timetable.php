


                                                             
                                                           
                                                      
																<div class="portlet box green">
													 <div class="portlet-title">
													   
                                                          <div class="caption">
														  
                                                            <strong class="center" style="margin-right:100px;">
															Today Class Timetable for <?php echo $c_date=date_format(date_create_from_format('Y-m-d', $currentdate), 'd-m-Y');?>
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
                                                                    <th style="width:5%"><strong>Class</strong></th>
																	<?php $noofperiods=8; ?>
                                                                    <?php 
																				for ($x = 1; $x <= $noofperiods; $x++) { ?>
																				<th style="width: 25px; text-align: center;height: 50x;background-color: #aeb3b3;">Period:<?php echo $x ?></th>
																				<?php
																		} 
																		?>
                                                                   
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            
                                                            
                              
                              <?php if(!empty($timetabledetails_today)){
								   //print_r($timetabledetails_today);
								  $i=1;foreach($timetabledetails_today['clas'] as $key => $value){
									  
									     $class_name = $value['clas'];
										 // print_r($timetabledetails_today['teach'][$class_name]['id1']);
                                         // print_r($timetabledetails_today['teach'][$class_name]['teacher_code1']);										 
										 if($timetabledetails_today['teach'][$class_name]['id1'] =='' && $timetabledetails_today['teach'][$class_name]['teacher_code1']=='')
										 {
											$sub_teach_name1='<strong style="color:red;">Not Assigned</strong>';
										 }
										 
										 
										 else
										 {
										 $leave_status1=$timetabledetails_today['teach'][$class_name]['attstatus1'];	 
										 $subject_code1=$timetabledetails_today['teach'][$class_name]['id1'];
                                         $teacher_code1=$timetabledetails_today['teach'][$class_name]['teacher_code1'];
										 									 
										 $sub_teach_name1 = $timetabledetails_today['teach'][$class_name]['subjects1'].'-'.$timetabledetails_today['teach'][$class_name]['teacher_name1'];
										 }
										 if($timetabledetails_today['teach'][$class_name]['id2'] =='' && $timetabledetails_today['teach'][$class_name]['teacher_code2']=="")
										 {
											$sub_teach_name2='<strong style="color:red;">Not Assigned</strong>'; 
										 }
										 else
										 {
										$leave_status2=$timetabledetails_today['teach'][$class_name]['attstatus2'];	 
										$subject_code2=$timetabledetails_today['teach'][$class_name]['id2'];
                                        $teacher_code2=$timetabledetails_today['teach'][$class_name]['teacher_code2'];
									
										 $sub_teach_name2 = $timetabledetails_today['teach'][$class_name]['subjects2'].'-'.$timetabledetails_today['teach'][$class_name]['teacher_name2'];
										 }
										 if($timetabledetails_today['teach'][$class_name]['id3'] =='' && $timetabledetails_today['teach'][$class_name]['teacher_code3']=='')
										 {
											$sub_teach_name3='<strong style="color:red;">Not Assigned</strong>'; 
										 }
										 else
										 {
										$leave_status3=$timetabledetails_today['teach'][$class_name]['attstatus3'];
										$subject_code3=$timetabledetails_today['teach'][$class_name]['id3'];
                                        $teacher_code3=$timetabledetails_today['teach'][$class_name]['teacher_code3'];	 
										 $sub_teach_name3 = $timetabledetails_today['teach'][$class_name]['subjects3'].'-'.$timetabledetails_today['teach'][$class_name]['teacher_name3'];
										 }
										 if($timetabledetails_today['teach'][$class_name]['id4'] =='' && $timetabledetails_today['teach'][$class_name]['teacher_code4']=='')
										 {
											$sub_teach_name4='<strong style="color:red;">Not Assigned</strong>';
										 }
										 else
										 {
										$leave_status4=$timetabledetails_today['teach'][$class_name]['attstatus4'];
										$subject_code4=$timetabledetails_today['teach'][$class_name]['id4'];
                                        $teacher_code4=$timetabledetails_today['teach'][$class_name]['teacher_code4'];	 
										 $sub_teach_name4 = $timetabledetails_today['teach'][$class_name]['subjects4'].'-'.$timetabledetails_today['teach'][$class_name]['teacher_name4'];
										 }
										 if($timetabledetails_today['teach'][$class_name]['id5'] =='' && $timetabledetails_today['teach'][$class_name]['teacher_code5']=='')
										 {
											$sub_teach_name5='<strong style="color:red;">Not Assigned</strong>'; 
										 }
										 else
										 {
										$leave_status5=$timetabledetails_today['teach'][$class_name]['attstatus5'];	 
										$subject_code5=$timetabledetails_today['teach'][$class_name]['id5'];
                                        $teacher_code5=$timetabledetails_today['teach'][$class_name]['teacher_code5'];	 
										 $sub_teach_name5 = $timetabledetails_today['teach'][$class_name]['subjects5'].'-'.$timetabledetails_today['teach'][$class_name]['teacher_name5'];
										 }
										 if($timetabledetails_today['teach'][$class_name]['id6'] =='' && $timetabledetails_today['teach'][$class_name]['teacher_code6']=='')
										 {
											$sub_teach_name6='<strong style="color:red;">Not Assigned</strong>';
										 }
										 else
										 {
										$leave_status6=$timetabledetails_today['teach'][$class_name]['attstatus6'];		 
										$subject_code6=$timetabledetails_today['teach'][$class_name]['id6'];
                                        $teacher_code6=$timetabledetails_today['teach'][$class_name]['teacher_code6'];	 
										 $sub_teach_name6 = $timetabledetails_today['teach'][$class_name]['subjects6'].'-'.$timetabledetails_today['teach'][$class_name]['teacher_name6'];
										 }
										 if($timetabledetails_today['teach'][$class_name]['id7'] =='' && $timetabledetails_today['teach'][$class_name]['teacher_code7']=='')
										 {
											$sub_teach_name7='<strong style="color:red;">Not Assigned</strong>';
										 }
										 else
										 {
										$leave_status7=$timetabledetails_today['teach'][$class_name]['attstatus7'];	
										$subject_code7=$timetabledetails_today['teach'][$class_name]['id7'];
                                        $teacher_code7=$timetabledetails_today['teach'][$class_name]['teacher_code7'];
										$sub_teach_name7 = $timetabledetails_today['teach'][$class_name]['subjects7'].'-'.$timetabledetails_today['teach'][$class_name]['teacher_name7'];
										 }
										 if($timetabledetails_today['teach'][$class_name]['id8'] =='' && $timetabledetails_today['teach'][$class_name]['teacher_code8']=='')
										 {
											$sub_teach_name8='<strong style="color:red;">Not Assigned</strong>'; 
										 }
										 else
										 {
										$leave_status8=$timetabledetails_today['teach'][$class_name]['attstatus8'];	
										$subject_code8=$timetabledetails_today['teach'][$class_name]['id8'];
                                        $teacher_code8=$timetabledetails_today['teach'][$class_name]['teacher_code8'];
										 $sub_teach_name8 = $timetabledetails_today['teach'][$class_name]['subjects8'].'-'.$timetabledetails_today['teach'][$class_name]['teacher_name8'];
										 ;
										 }
									 // echo $class_name.'-'.$sub_teach_name.'<br/>';
									 
								// echo $teacher_code1.'-'.$subject_code1;
									   ?>
                                  <tr>
								  
                                   
                                      <td><strong><?php echo($class_name);?></strong></td>
									  
									  <td style="width: 25px; text-align: center;height: 30x;"
									  >
									  
									  
                                                               <?php if($timetabledetails_today['teach'][$class_name]['subjects1']=='')
															   {
																   echo 'Not Assigned';
															   }
															   else{									echo 							   $timetabledetails_today['teach'][$class_name]['subjects1'];?>
															   <br>
															   <?php echo $timetabledetails_today['teach'][$class_name]['teacher_name1']; }?>						
                                                              </td>
                                      <td style="width: 25px; text-align: center;height: 30x;">
									 
									  
                                  
									  
									   <?php if($timetabledetails_today['teach'][$class_name]['subjects2']=='')
															   {
																   echo 'Not Assigned';
															   }else{																   echo  $timetabledetails_today['teach'][$class_name]['subjects2'];?>
															   <br>
															   <?php echo $timetabledetails_today['teach'][$class_name]['teacher_name2']; }?></td>
                                       <td style="width: 25px; text-align: center;height: 30x;">
									  
									   <?php if($timetabledetails_today['teach'][$class_name]['subjects3']=='')
															   {
																   echo 'Not Assigned';
															   }else{																   echo  $timetabledetails_today['teach'][$class_name]['subjects3'];?>
															   <br>
															   <?php echo $timetabledetails_today['teach'][$class_name]['teacher_name3']; }?></td>
                                       <td  style="width: 25px; text-align: center;height: 30x;">
									  
									   <?php if($timetabledetails_today['teach'][$class_name]['subjects4']=='')
															   {
																   echo 'Not Assigned';
															   }else{																   echo  $timetabledetails_today['teach'][$class_name]['subjects4'];?>
															   <br>
															   <?php echo $timetabledetails_today['teach'][$class_name]['teacher_name4']; }?></td>
                                     <td  style="width: 25px; text-align: center;height: 30x;">
									  
									  <?php if($timetabledetails_today['teach'][$class_name]['subjects5']=='')
															   {
																   echo 'Not Assigned';
															   }else{																   echo  $timetabledetails_today['teach'][$class_name]['subjects5'];?>
															   <br>
															   <?php echo $timetabledetails_today['teach'][$class_name]['teacher_name5']; }?></td>
                                      <td style="width: 25px; text-align: center;height: 30x;">
									  
									   <?php if($timetabledetails_today['teach'][$class_name]['subjects6']=='')
															   {
																   echo 'Not Assigned';
															   }else{																   echo  $timetabledetails_today['teach'][$class_name]['subjects6'];?>
															   <br>
															   <?php echo $timetabledetails_today['teach'][$class_name]['teacher_name6']; }?></td>
                                      <td style="width: 25px; text-align: center;height: 30x;">
									  
									   <?php if($timetabledetails_today['teach'][$class_name]['subjects7']=='')
															   {
																   echo 'Not Assigned';
															   }else{																   echo  $timetabledetails_today['teach'][$class_name]['subjects7'];?>
															   <br>
															   <?php echo $timetabledetails_today['teach'][$class_name]['teacher_name7']; }?></td>
                                      <td style="width: 25px; text-align: center;height: 30x;">
									  
									    <?php if($timetabledetails_today['teach'][$class_name]['subjects8']=='')
															   {
																   echo 'Not Assigned';
															   }else{																   echo  $timetabledetails_today['teach'][$class_name]['subjects8'];?>
															   <br>
															   <?php echo $timetabledetails_today['teach'][$class_name]['teacher_name8']; }?></td>
									 
                                        </tr>
										<?php $i++; }}  ?>
										
                            </tbody>
                                                             
                                                           
                                                        </table>
                                                        </div>
														</div>