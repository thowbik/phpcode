<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
	<!--.select2-container--bootstrap .select2-results__option--highlighted[aria-selected]{
		font-size:11px !important;-->
	 <style>
	
		.select2-container--bootstrap .select2-results>.select2-results__options {
		font-size:11px !important;
		color:green !important;
		
	}
 </style>

 
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL STYLES -->
    

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            


<?php $userlogin=$this->session->userdata('emis_user_type_id'); 	?>            
<?php if($this->session->userdata('emis_user_type_id') == 3 ) 	
{?>
<?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
<?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 5){ ?>
<?php $this->load->view('state/header.php'); }else{ $this->load->view('header.php'); } ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel" style="color:green;">Add Special Class</h4>
      </div>
      <div class="modal-body">
	  <tr>
	  <strong>Select Teacher</strong>
	  </br>
	  </br>
	  
        <td ><select  style="width: 90%;" class="form-control"  data-placeholder="Choose a Category"  id="splcla" name="splcla"   >
																				
																				
																
																<option value="0-999">Not - Assigned</option>
																<?php													
                                                               	foreach($Teacherslist as $tl)
																{		
																								?>
																							
                                                                <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->id;?>"  > <?php echo $tl->subjects;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																<?php }?>
                                                           																
                                                               </select> </td>
															   </tr>
															   <tr>
															   </br>
	                                                            </br>
															    <strong>Select Time</strong>
															  </br>
															  </br>
															   
															   <td class="form-control">&nbsp;&nbsp;&nbsp;<strong>From</strong>&nbsp;&nbsp;&nbsp;<input type="time" name="time" />
															   <span>&nbsp;&nbsp;&nbsp;<strong>To</strong>&nbsp;&nbsp;&nbsp;<input type="time" name="time" /></span></td>
															   </tr>
      </div>
      <div class="modal-footer">
	    <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

            <div class="page-wrapper-row full-height">
                
<div class="page-wrapper-middle">
                    <!-- BEGIN CONTAINER -->
                    <div class="page-container">
                        <!-- BEGIN CONTENT -->
                        <div class="page-content-wrapper">
                            <!-- BEGIN CONTENT BODY -->
                            <!-- BEGIN PAGE HEAD-->
                            
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">
							
                               
                                <div class="container" style="width:1325px;">
                                  
                                            <div class="page-title">
                                        <h1>
                                            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                              <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
                                             <li role="presentation">
                                            <a href="<?php echo base_url().'TimetableController/todaytimetable'?>">
                                              <span class="text"><strong>Today Timetable</strong></span><br/>
                                            </a>
                                          </li>
                                           <li role="presentation">
                                            <a href="<?php echo base_url().'TimetableController/todaytimetableteacherreport'?>">
                                              <span class="text"><strong> Subject-Wise Completion Status </strong></span><br/>
                                            </a>
                                          </li>
                                          <!-- <li role="presentation">
                                            <a href="<?php echo base_url().'Ceo_District/emis_state_school_dse'?>">
                                              <span class="text">Directorate Of School Education</span>
                                            </a>
                                          </li>
                                          <li role="presentation" class="next">
                                                <a href="<?php echo base_url().'Ceo_District/emis_state_school_dms'?>">
                                              <span class="text" >Directorate Of Matriculation School</a></span>
                                          </a>
                                          </li>
                                            <li role="presentation" class="next">
                                                <a href="<?php echo base_url().'Ceo_District/emis_state_school_others'?>">
                                              <span class="text" >Others</a></span>
                                          </a>
                                          </li>-->
                                                </ul>
                                            </div>
                                        </h1>
                                    </div> 
                                    <!--<?php $this->load->view('emis_school_profile_header1.php'); ?>-->
                                           <!-- <div class="m-heading-1 border-green m-bordered">
                                            <h3>Basic Information</h3>
                                        </div> -->
                                     
                                         
                                        <div class="portlet light portlet-fit ">
                                            
                                           
                                            <!--begin form -->
                                           

                                               <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                          <div class="caption">
                                                            <i class="fa fa-globe"></i>Today's Timetable 
															<?php echo $c_date=date_format(date_create_from_format('Y-m-d', $currentdate), 'd-m-Y');?>
															<a style="margin-left: 860px;" 
															href="<?php echo base_url().'TimetableController/generate_currendate_classpdf?currentdate='.$currentdate;?>"
															class="btn btn-primary hidden-print" >
															<span class="glyphicon glyphicon-print" aria-hidden="true"></span>&nbsp;&nbsp;Print</a>
															</div> 
                                                        <div class="tools" style="margin-top: 20px;"> </div>
                                                    </div>
                                                    <div class="portlet-body">
													<form id="save" >
													<div class="row">
													
													
	                
                                                    <div class="row">
													
													<div class="col-md-12">
                                                         <table class="table table-striped table-bordered table-hover" id="student_mark">
                                                            <thead>
															
                                                                <tr>
                                                                    <th style="width:5%"><strong>Class</strong></th>
																	<?php $noofperiods=8; ?>
                                                                    <?php 
																				for ($x = 1; $x <= $noofperiods; $x++) { ?>
																				<th style="text-align:center;">Period:<?php echo $x ?></th>
																				<?php
																		}
																		
																		?>
                                                                   <!--<th>Special Class</th>-->
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            
                                                            
                              
                              <?php if(!empty($timetabledetails_today)){
								   //print_r($timetabledetails_today);
								  $i=1;foreach($timetabledetails_today['clas'] as $key => $value){
									  
									     $class_name = $value['clas'];
																				 
										 if($timetabledetails_today['teach'][$class_name]['id1'] =='' && $timetabledetails_today['teach'][$class_name]['teacher_code1']=='')
										 {
											$teacher_code1=0;
											$subject_code1=999;
											
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
											$teacher_code2=0;
											$subject_code2=999;
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
											$teacher_code3=0;
											$subject_code3=999;
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
											$teacher_code4=0;
											$subject_code4=999;
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
											$teacher_code5=0;
											$subject_code5=999;
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
											$teacher_code6=0;
											$subject_code6=999;
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
											$teacher_code7=0;
											$subject_code7=999;
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
											// $sub_teach_name8='<strong style="color:red;">Not Assigned</strong>'; 
											$teacher_code8=0;
											$subject_code8=999;
											
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
									 
								 // echo $leave_status8;
								 // echo '</br>';
									   ?>
                                  <tr>
								  
                                   
                                      <td><strong><?php echo($class_name);?></strong></td>
									  
									  <td <?php if($leave_status1!='' && $teacher_code1!=''){ ?>
									  
										  
										  style="background-color:red;"
										  <?php
									  } else { ?>
										style="background-color:#F5DEB3;"
                                   <?php										
									  }
									  ?>
									  >
									  
									  <select  class="form-control" onchange="getfirstperiod(this.value,<?php echo $i; ?>,'<?php echo $class_name ?>')"; class="form-group" id="row<?php echo $i; ?>f" class="center" data-placeholder="Choose a Category" tabindex="1" id="row1<?php echo $i; ?>f" name="rowf[<?php echo $i; ?>]" >
																				
																				<option value="0-999">Not - Assigned</option>
																				<?php
                                                               	foreach($Teacherslist as $teach_list)
																{								?>
																							
                                                                <option  value="<?php echo $teach_list->teacher_code;?>-<?php echo $teach_list->id;?>" 
																 
																<?php if(($teach_list->attstatus =='')&&($teacher_code1 ==$teach_list->teacher_code) && ($subject_code1 ==$teach_list->id))
																{
																  echo 'selected="true" ';
																}
																 else if(($teach_list->attstatus !='' )&($teacher_code1 !=$teach_list->teacher_code)&&($subject_code1 !=$teach_list->id))
																{
																	
																echo 'disabled="disabled"';
																 
																}
																else if(($teach_list->attstatus !=''  )&&($teacher_code1 ==$teach_list->teacher_code)&&($subject_code1 !=$teach_list->id))
																{
																	
																 echo 'disabled="disabled" selected="true" ';
																}?> > <?php echo $teach_list->subjects;?>&nbsp;-&nbsp;<?php echo $teach_list->teacher_name.'-'.$t1['teacher_code'];?>
																</option>
																<?php }?>						
                                                               </select></td>
                                      <td  <?php if($leave_status2!='' && $teacher_code2!=''){ ?>
									  
										  
										  style="background-color:red;"
										  <?php
									  }  else { ?>
									  
										style="background-color:#F5DEB3;"
									 
									  
                                   <?php										
									  }
									  ?>>
									  
									  <select  class="form-control" onchange="getsecondperiod(this.value,<?php echo $i; ?>,'<?php echo $class_name ?>')"; class="form-group" id="row<?php echo $i; ?>s" class="center" data-placeholder="Choose a Category" tabindex="1" id="row1<?php echo $i; ?>f" name="rowf[<?php echo $i; ?>]"   >
																				
																				<option value="0-999">Not - Assigned</option>
																				<?php
                                                               	foreach($Teacherslist as $teach_list)
																{		
																
																								?>
																							
                                                                <option value="<?php echo $teach_list->teacher_code;?>-<?php echo $teach_list->id;?>" <?php if(($teach_list->attstatus =='')&&($teacher_code2 ==$teach_list->teacher_code) && ($subject_code2 ==$teach_list->id))
																{
																  echo 'selected="true" ';
																}
																else if(($teach_list->attstatus !='')&&($teacher_code2 != $teach_list->teacher_code)&&($subject_code2 !=$teach_list->id))
																{
																	
																echo 'disabled="disabled" ';
																 
																}
																else if(($teach_list->attstatus !='')&&($teacher_code2 ==$teach_list->teacher_code)&&($subject_code2 ==$teach_list->id))
																{
																	
																 echo 'disabled="disabled" selected="true" ';
																}?>  > <?php echo $teach_list->subjects;?>&nbsp;-&nbsp;<?php echo $teach_list->teacher_name.'-'.$t1['teacher_code'];?>
																</option>
																<?php }?>						
                                                               </select></td>
                                       <td  <?php if($leave_status3!='' && $teacher_code3!=''){ ?>
									  
										  
										  style="background-color:red;"
										  <?php  } else { ?>
									 
									  
										style="background-color:#F5DEB3;"
									  
                                   <?php										
									  }
									  ?>>
									  
									  <select  class="form-control"  onchange="getthirdperiod(this.value,<?php echo $i; ?>,'<?php echo $class_name ?>')";  class="form-group" id="row<?php echo $i; ?>t" class="center" data-placeholder="Choose a Category" tabindex="1" id="row1<?php echo $i; ?>f" name="rowf[<?php echo $i; ?>]"   >
																				
																				<option value="0-999">Not - Assigned</option>
																				<?php
                                                               	foreach($Teacherslist as $teach_list)
																{		
																
																								?>
																							
                                                                <option value="<?php echo $teach_list->teacher_code;?>-<?php echo $teach_list->id;?>" 
																<?php if(($teach_list->attstatus =='')&&($teacher_code3 ==$teach_list->teacher_code) && ($subject_code3 ==$teach_list->id))
																{
																  echo 'selected="true" ';
																}
																else if(($teach_list->attstatus !='')&&($teacher_code3 != $teach_list->teacher_code)&&($subject_code3 !=$teach_list->id))
																{
																	
																echo 'disabled="disabled" ';
																 
																}
																else if(($teach_list->attstatus !='')&&($teacher_code3 ==$teach_list->teacher_code)&&($subject_code3 ==$teach_list->id))
																{
																	
																 echo 'disabled="disabled" selected="true" ';
																}?>  > <?php echo $teach_list->subjects;?>&nbsp;-&nbsp;<?php echo $teach_list->teacher_name.'-'.$t1['teacher_code'];?>
																<?php }?>						
                                                               </select></td>
                                       <td  <?php if($leave_status4!='' && $teacher_code4!=''){ ?>
									  
										  
										  style="background-color:red;"
										  <?php
									  } else { ?>
									  
										style="background-color:#F5DEB3;"
									  
                                   <?php										
									  }
									  ?>>
									  
									  <select  class="form-control"  onchange="getfourthperiod(this.value,<?php echo $i; ?>,'<?php echo $class_name ?>')"; class="form-group" id="row<?php echo $i; ?>fo" class="center" data-placeholder="Choose a Category" tabindex="1" id="row1<?php echo $i; ?>f" name="rowf[<?php echo $i; ?>]"   >
																				
																				<option value="0-999">Not - Assigned</option>
																				<?php
                                                               	foreach($Teacherslist as $teach_list)
																{		
																
																								?>
																							
                                                                <option value="<?php echo $teach_list->teacher_code;?>-<?php echo $teach_list->id;?>" 
																<?php if(($teach_list->attstatus =='')&&($teacher_code4 ==$teach_list->teacher_code) && ($subject_code4 ==$teach_list->id))
																{
																  echo 'selected="true" ';
																}
																else if(($teach_list->attstatus !='')&&($teacher_code4 != $teach_list->teacher_code)&&($subject_code2 !=$teach_list->id))
																{
																	
																echo 'disabled="disabled" ';
																 
																}
																else if(($teach_list->attstatus !='')&&($teacher_code4 ==$teach_list->teacher_code)&&($subject_code4 ==$teach_list->id))
																{
																	
																 echo 'disabled="disabled" selected="true" ';
																}?> > <?php echo $teach_list->subjects;?>&nbsp;-&nbsp;<?php echo $teach_list->teacher_name.'-'.$t1['teacher_code'];?>
																
																
																</option>
																<?php }?>						
                                                               </select></td>
                                     <td  <?php if($leave_status5!='' && $teacher_code5!=''){ ?>
									  
										  
										  style="background-color:red;"
										  <?php
									  }  else { ?>
									  
										style="background-color:#F5DEB3;"
									 
                                   <?php										
									  }
									  ?>>
									  
									  <select  class="form-control" onchange="getfifthperiod(this.value,<?php echo $i; ?>,'<?php echo $class_name ?>')";  class="form-group" id="row<?php echo $i; ?>fi" class="center" data-placeholder="Choose a Category" tabindex="1" id="row1<?php echo $i; ?>f" name="rowf[<?php echo $i; ?>]"   >
																				
																				<option value="0-999">Not - Assigned</option>
																				<?php
                                                               	foreach($Teacherslist as $teach_list)
																{		
																
																								?>
																							
                                                                <option value="<?php echo $teach_list->teacher_code;?>-<?php echo $teach_list->id;?>" 
																<?php if(($teach_list->attstatus =='')&&($teacher_code5 ==$teach_list->teacher_code) && ($subject_code5 ==$teach_list->id))
																{
																  echo 'selected="true" ';
																}
																else if(($teach_list->attstatus !='')&&($teacher_code5 != $teach_list->teacher_code)&&($subject_code5 !=$teach_list->id))
																{
																	
																echo 'disabled="disabled" ';
																 
																}
																else if(($teach_list->attstatus !='')&&($teacher_code5 ==$teach_list->teacher_code)&&($subject_code5 ==$teach_list->id))
																{
																	
																 echo 'disabled="disabled" selected="true" ';
																}?> > <?php echo $teach_list->subjects;?>&nbsp;-&nbsp;<?php echo $teach_list->teacher_name.'-'.$t1['teacher_code'];?>
																
																
																</option>
																<?php }?>						
                                                               </select></td>
                                      <td  <?php if($leave_status6!='' && $teacher_code6!=''){ ?>
									  
										  
										  style="background-color:red;"
										  <?php
									  } else { ?>
									  
										style="background-color:#F5DEB3;"
									  
                                   <?php										
									  }
									  ?>>
									  
									  <select  class="form-control" 
									  onchange="getsixthperiod(this.value,<?php echo $i; ?>,'<?php echo $class_name ?>')"; class="form-group" id="row<?php echo $i; ?>si" class="center" data-placeholder="Choose a Category" tabindex="1" id="row1<?php echo $i; ?>f" name="rowf[<?php echo $i; ?>]"   >
																				
																				<option value="0-999">Not - Assigned</option>
																				<?php
                                                               	foreach($Teacherslist as $teach_list)
																{		
																
																								?>
																							
                                                                <option value="<?php echo $teach_list->teacher_code;?>-<?php echo $teach_list->id;?>" 
																<?php if(($teach_list->attstatus =='')&&($teacher_code6 ==$teach_list->teacher_code) && ($subject_code6 ==$teach_list->id))
																{
																  echo 'selected="true" ';
																}
																else if(($teach_list->attstatus !='')&&($teacher_code6 != $teach_list->teacher_code)&&($subject_code6 !=$teach_list->id))
																{
																	
																echo 'disabled="disabled" ';
																 
																}
																else if(($teach_list->attstatus !='')&&($teacher_code6 ==$teach_list->teacher_code)&&($subject_code6 ==$teach_list->id))
																{
																	
																 echo 'disabled="disabled" selected="true" ';
																}?> > <?php echo $teach_list->subjects;?>&nbsp;-&nbsp;<?php echo $teach_list->teacher_name.'-'.$t1['teacher_code'];?>
																
																
																</option>
																<?php }?>						
                                                               </select></td>
                                      <td  <?php if($leave_status7!='' && $teacher_code7!=''){ ?>
									  
										  
										  style="background-color:red;"
										  <?php
									  }  else { ?>
									  
										style="background-color:#F5DEB3;"
									 
                                   <?php										
									  }
									  ?>>
									  
									  <select  class="form-control" onchange="getseventhperiod(this.value,<?php echo $i; ?>,'<?php echo $class_name ?>')";  class="form-group" id="row<?php echo $i; ?>se" class="center" data-placeholder="Choose a Category" tabindex="1" id="row1<?php echo $i; ?>f" name="rowf[<?php echo $i; ?>]"   >
																				
																				<option value="0-999">Not - Assigned</option>
																				<?php
                                                               	foreach($Teacherslist as $teach_list)
																{		
																
																								?>
																							
                                                                <option value="<?php echo $teach_list->teacher_code;?>-<?php echo $teach_list->id;?>" 
																<?php if(($teach_list->attstatus =='')&&($teacher_code7 ==$teach_list->teacher_code) && ($subject_code7 ==$teach_list->id))
																{
																  echo 'selected="true" ';
																}
																else if(($teach_list->attstatus !='')&&($teacher_code7 != $teach_list->teacher_code)&&($subject_code7 !=$teach_list->id))
																{
																	
																echo 'disabled="disabled" ';
																 
																}
																else if(($teach_list->attstatus !='')&&($teacher_code7 ==$teach_list->teacher_code)&&($subject_code7 ==$teach_list->id))
																{
																	
																 echo 'disabled="disabled" selected="true" ';
																}?>  > <?php echo $teach_list->subjects;?>&nbsp;-&nbsp;<?php echo $teach_list->teacher_name.'-'.$t1['teacher_code'];?>
																
																
																</option>
																<?php }?>						
                                                               </select></td>
                                      <td  <?php if($leave_status8!='' && $teacher_code8!=''){ ?>
									  
										  
										  style="background-color:red;"
										  <?php
									  }else { ?>
									  
										style="background-color:#F5DEB3;"
									  
                                   <?php										
									  }
									  ?>>
									  
									  <select  class="form-control" onchange="geteighthperiod(this.value,<?php echo $i; ?>,'<?php echo $class_name ?>')"; class="form-group" id="row<?php echo $i; ?>e" class="center" data-placeholder="Choose a Category" tabindex="1" id="row1<?php echo $i; ?>f" name="rowf[<?php echo $i; ?>]" >
																				
																				<option value="0-999">Not - Assigned</option>
																				<?php
                                                               	foreach($Teacherslist as $teach_list)
																{		
																
																								?>
																							
                                                                <option value="<?php echo $teach_list->teacher_code;?>-<?php echo $teach_list->id;?>" 
																<?php if(($teach_list->attstatus =='')&&($teacher_code8 ==$teach_list->teacher_code) && ($subject_code8 ==$teach_list->id))
																{
																  echo 'selected="true" ';
																}
																else if(($teach_list->attstatus !='')&&($teacher_code8 != $teach_list->teacher_code)&&($subject_code8 !=$teach_list->id))
																{
																	
																echo 'disabled="disabled" ';
																 
																}
																else if(($teach_list->attstatus !='')&&($teacher_code8 ==$teach_list->teacher_code)&&($subject_code8 ==$teach_list->id))
																{
																	
																 echo 'disabled="disabled" selected="true" ';
																}
																
																?> > <?php echo $teach_list->subjects;?>&nbsp;-&nbsp;<?php echo $teach_list->teacher_name.'-'.$t1['teacher_code'];?>
																
																</option>
																<?php }?>						
                                                               </select></td>
															   <!--<td style="color: #337ab7;"><i  class="fa fa-plus-circle" onclick="showModal()">
															   </i>&nbsp;&nbsp;&nbsp;&nbsp;<span><i  class="fa fa-plus-circle" onclick="showModal()">
															   </i></span></td>-->
									 
                                        </tr>
										<?php $i++; }}  ?>
										
                            </tbody>
                                                             
                                                           
                                                        </table>
                                                        </div>
														<div class="row">
														
															   <div class="col-md-offset-11 col-md-1">
													  					<button type="button"  onclick="saveleaveperiods();"class="btn green"  >Save</button>
																		</div>
																		
																</div>
														</div>
														
																<br>
																<br>
																<div class="portlet box green">
													 <div class="portlet-title">
                                                          <div class="caption">
														  
                                                            <i class="fa fa-globe"></i>Teacher Timetable for <?php echo $c_date=date_format(date_create_from_format('Y-m-d', $currentdate), 'd-m-Y');?>
															<a style="margin-left: 890px;" 
															href="<?php echo base_url().'TimetableController/generate_currendate_teacherpdf?currentdate='.$currentdate;?>"
															class="btn btn-primary hidden-print" >
															<span class="glyphicon glyphicon-print" aria-hidden="true"></span>&nbsp;&nbsp;Print</a>
															</div> 
                                                        <div class="tools"> </div>
                                                    </div>
																<div class="row">
																
													
													<div class="col-md-12">
                                                         <table class="table table-striped table-bordered" id="student_mark" style="border-color:block">
                                                            <thead>
															
                                                                <tr>
                                                                    <th style="width:5%">Teacher Name</th>
																	 
																<?php $noofperiods=8; ?>
                                                                    <?php  
                                        for ($x = 1; $x <= $noofperiods; $x++) { ?>
                                        <th style="text-align:center;">Period:<?php echo $x ?></th>
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
                                  
                                      <td style="text-align:left;"><strong><?php echo($key); ?></strong></td>
									  
                                  <?php 
                                 
                                     for ($x = 1; $x <= 8; $x++) { 
                                        							
                                    ?> 									 
                                      <td <?php if($value[0]['attstatus']==''){
									  ?>style="background-color:white;" <?php } else
										  {
										  ?>style="background-color:red; color:white;" <?php } ?>><?php if($value[0]['status']==$x)
									  { 
								       
                                        echo($value[0]['classes'].'</br>' );
									  }
									   if($value[1]['status']==$x)
									  {
										 
                                        echo($value[1]['classes'].'</br>' );
									  }
									  if($value[2]['status']==$x)
									  {
										 
                                        echo($value[2]['classes'].'</br>' );
									  }
									  if($value[3]['status']==$x)
									  {
										 
                                        echo($value[3]['classes'].'</br>' );
									  }
									   if($value[4]['status']==$x)
									  {
										 
                                        echo($value[4]['classes'].'</br>' );
									  }
									  if($value[5]['status']==$x)
									  {
										 
                                        echo($value[5]['classes'].'</br>' );
									  }
									  if($value[6]['status']==$x)
									  {
										 
                                        echo($value[6]['classes'].'</br>' );
									  }
									  if($value[7]['status']==$x)
									  {
										 
                                        echo($value[7]['classes'].'</br>' );
									  }
									  if($value[8]['status']==$x)
									  {
										 
                                        echo($value[8]['classes'].'</br>' );
									  }
									  if($value[9]['status']==$x)
									  {
										 
                                        echo($value[9]['classes'].'</br>' );
									  }
									  if($value[10]['status']==$x)
									  {
										 
                                        echo($value[10]['classes'].'</br>' );
									  }
									  if($value[11]['status']==$x)
									  {
										 
                                        echo($value[11]['classes'].'</br>' );
									  }
									  if($value[12]['status']==$x)
									  {
										 
                                        echo($value[12]['classes'].'</br>' );
									  }
									  if($value[13]['status']==$x)
									  {
										 
                                        echo($value[13]['classes'].'</br>' );
									  }
									  if($value[14]['status']==$x)
									  {
										 
                                        echo($value[14]['classes'].'</br>' );
									  }
									  if($value[15]['status']==$x)
									  {
										 
                                        echo($value[15]['classes'].'</br>' );
									  }
									   if($value[16]['status']==$x)
									  {
										 
                                        echo($value[16]['classes'].'</br>' );
									  }
									 
                                      }
									  
                               								  
                                        ?>
										

                                    
                                                  <?php  } } ?>          
                                                            
                              
                         
                            </tbody>
							                                <!--<tbody>
							                                     <tr>
																	
																	<?php 
																	
																		 for ($x = 1; $x <= 8; $x++) {		
																		?>	 	
																			<td style="background-color:#30babf; color:white;">
																			<?php
																			if(!empty($teacher_data))
																			{
																			print_r($teacher_data);	
																			foreach($teacher_data as $r){
																				
																				echo $r[0]['status'];
																				if($r[0]['status']==$x)
																				{
																				   echo($r[0]['classes'].'</br>');
																				  // echo '</br>';
																				}
																			}
																			}
																			?>
																			</td>
																		<?php } ?>
																	
                                                               </tr>
															   </tbody>-->
															
                                                        </table>
                                                        </div>
														</div>

<style>
 {font-family: Helvetica Neue, Arial, sans-serif; }

body { background-image: linear-gradient(#aaa 25%, #000);}

h1, table { text-align: center; }

table {border-collapse: collapse;  width: 70%; margin: 0 auto 5rem;}

th, td { padding: 1.5rem; font-size: 1.1rem; }



tr, td { transition: .4s ease-in; } 


td:empty {background: hsla(50, 25%, 60%, 0.7); }

tr:hover:not(#firstrow), tr:hover td:empty {background: #DEB887; pointer-events: visible;}


</style>																
														

  
															  </tbody>
															</table>
															</div>
															
															 </div>
															</div>
															

                                                           </div>
                                                       </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

                                                  </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END PAGE CONTENT INNER -->
                                </div>
                            </div>
                            <!-- END PAGE CONTENT BODY -->
                            <!-- END CONTENT BODY -->
                        </div>
                        <!-- END CONTENT -->
                        <!-- BEGIN QUICK SIDEBAR -->

                        <!-- END QUICK SIDEBAR -->
                    </div>
					
					
                    <!-- END CONTAINER -->
               
                  <?php $this->load->view('footer.php'); ?>
              </div>
        <?php $this->load->view('scripts.php'); ?>




        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/moment.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/jquery.mockjax.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js';?>" type="text/javascript"></script>

        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.js';?>" type="text/javascript"></script        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js';?>" type="text/javascript"></script>
       
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
		<script src="<?php echo base_url().'asset/js/tabletojson-vit/src/jquery.tabletojson.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        
       



	
   

        </script>
		<script>
		$(document).ready(function(){ 

 for (var i = 1; i <= 40; i++) 
 {
	 
 
 $("#row"+i+'f').select2({closeOnSelect:false});
 $("#row"+i+'s').select2({closeOnSelect:false});
 $("#row"+i+'t').select2({closeOnSelect:false});
 $("#row"+i+'fo').select2({closeOnSelect:false});
 $("#row"+i+'fi').select2({closeOnSelect:false});
 $("#row"+i+'si').select2({closeOnSelect:false});
 $("#row"+i+'se').select2({closeOnSelect:false});
 $("#row"+i+'e').select2({closeOnSelect:false});
 
 
}

			
 });
 var periodsone=[];
 function getfirstperiod(teachersub,i,classsection)
{
	var teacher = teachersub.split("-");
	teachercode=teacher[0];
	subjectcode=teacher[1];
	var classsec=classsection.split("-");
	classid=classsec[0];
    section=classsec[1];
	classsection=teachercode+'-'+subjectcode+'-'+classid+'-'+section;
    
	if(teachersub != '')
	{
	 i = parseInt(i-1);
	 periodsone[i] =classsection;
	}
	
	else
	{
	i = parseInt(i-1);
    periodsone.splice(i,1);
    }
	
}
var periodstwo=[];
function getsecondperiod(teachersub,i,classsection)
{
	var teacher = teachersub.split("-");
	teachercode=teacher[0];
	subjectcode=teacher[1];
	var classsec=classsection.split("-");
	classid=classsec[0];
    section=classsec[1];
	classsection=teachercode+'-'+subjectcode+'-'+classid+'-'+section;
    
	if(teachersub != '')
	{
	 i = parseInt(i-1);
	 periodstwo[i] =classsection;
	}
	
	else
	{
	i = parseInt(i-1);
    periodstwo.splice(i,1);
    }
	
}
var periodsthree=[];
function getthirdperiod(teachersub,i,classsection)
{
	var teacher = teachersub.split("-");
	teachercode=teacher[0];
	subjectcode=teacher[1];
	var classsec=classsection.split("-");
	classid=classsec[0];
    section=classsec[1];
	classsection=teachercode+'-'+subjectcode+'-'+classid+'-'+section;
    
	if(teachersub != '')
	{
	 i = parseInt(i-1);
	 periodsthree[i] =classsection;
	}
	
	else
	{
	i = parseInt(i-1);
    periodsthree.splice(i,1);
    }
	
}
var periodsfour=[];
function getfourthperiod(teachersub,i,classsection)
{
	var teacher = teachersub.split("-");
	teachercode=teacher[0];
	subjectcode=teacher[1];
	var classsec=classsection.split("-");
	classid=classsec[0];
    section=classsec[1];
	classsection=teachercode+'-'+subjectcode+'-'+classid+'-'+section;
    
	if(teachersub != '')
	{
	 i = parseInt(i-1);
	 periodsfour[i] =classsection;
	}
	
	else
	{
	i = parseInt(i-1);
    periodsfour.splice(i,1);
    }
	
}
var periodsfive=[];
function getfifthperiod(teachersub,i,classsection)
{
	var teacher = teachersub.split("-");
	teachercode=teacher[0];
	subjectcode=teacher[1];
	var classsec=classsection.split("-");
	classid=classsec[0];
    section=classsec[1];
	classsection=teachercode+'-'+subjectcode+'-'+classid+'-'+section;
    
	if(teachersub != '')
	{
	 i = parseInt(i-1);
	 periodsfive[i] =classsection;
	}
	
	else
	{
	i = parseInt(i-1);
    periodsfive.splice(i,1);
    }
	
}
var periodssix=[];
function getsixthperiod(teachersub,i,classsection)
{
	var teacher = teachersub.split("-");
	teachercode=teacher[0];
	subjectcode=teacher[1];
	var classsec=classsection.split("-");
	classid=classsec[0];
    section=classsec[1];
	classsection=teachercode+'-'+subjectcode+'-'+classid+'-'+section;
    
	if(teachersub != '')
	{
	 i = parseInt(i-1);
	 periodssix[i] =classsection;
	}
	
	else
	{
	i = parseInt(i-1);
    periodssix.splice(i,1);
    }
	
}
var periodsseven=[];
function getseventhperiod(teachersub,i,classsection)
{
	var teacher = teachersub.split("-");
	teachercode=teacher[0];
	subjectcode=teacher[1];
	var classsec=classsection.split("-");
	classid=classsec[0];
    section=classsec[1];
	classsection=teachercode+'-'+subjectcode+'-'+classid+'-'+section;
    
	if(teachersub != '')
	{
	 i = parseInt(i-1);
	 periodsseven[i] =classsection;
	}
	
	else
	{
	i = parseInt(i-1);
    periodsseven.splice(i,1);
    }
	
}
var periodseight=[];
function geteighthperiod(teachersub,i,classsection)
{
	var teacher = teachersub.split("-");
	teachercode=teacher[0];
	subjectcode=teacher[1];
	var classsec=classsection.split("-");
	classid=classsec[0];
    section=classsec[1];
	classsection=teachercode+'-'+subjectcode+'-'+classid+'-'+section;
    
	if(teachersub != '')
	{
	 i = parseInt(i-1);
	 periodseight[i] =classsection;
	}
	
	else
	{
	i = parseInt(i-1);
    periodseight.splice(i,1);
    }
	
}

function saveleaveperiods()
{
	
    first=periodsone;
	second=periodstwo
	third=periodsthree;
	four=periodsfour;
	five=periodsfive;
	six=periodssix;
	seven=periodsseven;
	eight=periodseight;
	$.ajax(
	          {
					data:{'first':first,'second':second,'third':third,'four':four,'five':five,'six':six,'seven':seven,'eight':eight},
					//data:{'first':first},
					url:baseurl+'TimetableController/update_today_timetable',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						swal("OK", "Teacher Re Assigned Successfully", "success");
						window.location.reload();
						//$("#Tokyo").show();
					}
					
				});
				swal("OK", "Teacher Re Assigned Successfully", "success");
						window.location.reload();
			
}
function showModal() {
  $('#myModal').modal('show');
  $("#splcla").select2({closeOnSelect:false});
}
        
         
		</script>
    </body>
</html>