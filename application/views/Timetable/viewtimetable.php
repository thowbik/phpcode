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
 <style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color:#DEB887;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 14px;
  color:white;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #BC8F8F;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
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
                               
                                <div class="container" style="width:1286px;">
                                   
                                    <!--<?php $this->load->view('emis_school_profile_header1.php'); ?>-->
                                           <!-- <div class="m-heading-1 border-green m-bordered">
                                            <h3>Basic Information</h3>
                                        </div> -->
                                     
                                         
                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">View Class TimeTable</span>
                                                </div>
                                            </div> 
                                           
                                            <!--begin form -->
                                           

                                            <div class="portlet-body">
											<!--<div class="row">
											 <form id="filter" method="post" action="<?php echo base_url().'TimetableController/loadWeeklyTimeTable';?>">
											<div class="tab">
											 <?php foreach($classsectionDetails as $csd) {
																	   $classsection=$csd->classsection;
																	   ?>
  <strong><button class="tablinks" title="your Class <?php echo $classsection;  ?>" value="<?php echo $classsection; ?>"><?php echo $classsection;  ?> </button></strong>
   <?php				 
																 }
											
																 ?>
</div>

</form>
</div>-->
											 
                                                <div class="row">
                                                    <div class="col-md-12">
                                                          
                                        									  
                                                <center>
                                                  <form id="filter" method="post" action="<?php echo base_url().'TimetableController/viewWeeklyTimeTable';?>">
												   
                                                    <div class="form-group">
                                                    <div class="row">
													
													                                    <div class="col-md-2">  
                                                          <select style="width: 90%;" class="form-control" onchange="get_section();" data-placeholder="Choose a Category" tabindex="1" id="classid" name="classid"  style="width: 30%" required="" >
                                                               	
                                                                <option value="" >Select Class</option>
																	
                                                                 <?php foreach($classDetails as $sc) {
																	   $classid=$sc->value;
																  switch ($classid) {
																case $sta="1":$standard='I';break;
																case $sta="2":$standard='II';break;
																case $sta="3":$standard='III';break;	
																case $sta="4":$standard='IV';break;	
																case $sta="5":$standard='V';break;
																case $sta="6":$standard='VI';break;	
																case $sta="7":$standard='VII';break;	
																case $sta="8":$standard='VIII';break;
																case $sta="9":$standard='IX';break;	
																case $sta="10":$standard='X';break;	
																case $sta="11":$standard='XI';break;	
																case $sta="12":$standard='XII';break;	
																case $sta="13":$standard='Pre KG';break;	
																case $sta="14":$standard='UKG';break;	
																case $sta="15":$standard='LKG';break;
																}	 
														 ?>
                                                               <option value="<?php echo $sta;  ?>" ><?php echo $standard;?></option>
                                                                 <?php   }  ?>
																 
                                                               </select> 
                                                        
                                                    </div>
													<div class="col-md-2">  
                                                          <select style="width: 90%;" class="form-control" data-placeholder="Choose a Category" tabindex="1" id="section" name="section"  style="width: 60%" required="" >
                                                              <option >Select Section</option>  
                                                               
                                                               </select> 
                                                        
                                                    </div>
													<div class="col-md-3">  
                                                       
                                               <input class="form-control" id="week" type="week" name="week" value="">
                                                        
                                                    </div>
													<div class="col-md-2">
                                                        
                                                          <button type="submit"  class="btn green" id="emis_stu_searchsep_sub" >SUBMIT</button>
                                                              
                                                    </div>
													</div>
                                                    </form>
													</center>
													
                                              
                                                </div>

                                              </div>
                                            </div>
                                               <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                          <div class="caption">
                                                            <i class="fa fa-table"></i> &nbsp;&nbsp;&nbsp; Class :&nbsp;&nbsp;<?php echo $class?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Section&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $section?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;From :&nbsp;&nbsp;<?php echo $fromdate=date_format(date_create_from_format('Y-m-d', $this_week_fst), 'd-m-Y');?>&nbsp;&nbsp;&nbsp; To :&nbsp;&nbsp;<?php echo $todate=date_format(date_create_from_format('Y-m-d', $this_week_ed), 'd-m-Y');?>
															<?php
															
															if($section!='')
															{
																?>
															<a style="margin-left: 10px;" href="<?php echo base_url().'TimetableController/generate_weeklytimetable_pdf?class='. $class;?>&section=<?php echo $section?>&fdate=<?php echo $this_week_fst?>&tdate=<?php echo $this_week_ed?>" class="btn btn-primary hidden-print"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>&nbsp;&nbsp;Print</a>
															<?php } ?>
															<input type="hidden" class="medium" id="classid" value="<?php echo $classname?>">
															<input type="hidden" class="medium" id="subid" value="<?php echo $subjectid?>">
															<input type="hidden" class="medium" id="termid" value="<?php echo $termid?>">
															</div> 
                                                        <div class="tools" style="margin-top: 20px;"> </div>
                                                    </div>
                                                    <div class="portlet-body">
													<form id="save" >
													<div class="row"> 
													<style>
td{text-align: center}
th{text-align: center}
td(text-overflow: ellipsis}
.center 
{
text-align: center!important;
}
.select2-container--bootstrap .select2-results__option[aria-selected=true] {
    background-color: #f6f681 !important;
    color: #262626;
	font-size:20px;
}

.select2-container--bootstrap {
    display: block;
    width: auto !important;
}
</style>	
													
	                
                                                    <div class="row">
													
													<div class="col-md-12">
                                                         <table class="table table-striped table-bordered table-hover" id="student_mark">
                                                            <thead>
															<input type="hidden"  id="periodscount" name="periodscount" value="<?php echo $noofperiods;?>">
															<input type="hidden"  id="term" name="term" value="<?php echo $term;?>">
															<input type="hidden"  id="class" name="class" value="<?php echo $class;?>">
															<input type="hidden"  id="sections" name="sections" value="<?php echo $section;?>">
                                                                <tr>
                                                                    <th style="background-color:#ccc;vertical-align: middle;">Day</th>
																	<?php $noofperiods=8; ?>
                                                                    <?php 
																				for ($x = 1; $x <= $noofperiods; $x++) { ?>
																				<th style="background-color:#ccc;vertical-align: middle;">Period:<?php echo $x ?></th>
																				<?php
																		} 
																		?>
                                                                   
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            
                                                               <tr>
                                                                     
                                                                   
																	<td style="background-color:#ccc;vertical-align: middle;"><strong>Monday</strong></td>
																	<?php 
																	
																		 for ($x = 1; $x <= $noofperiods; $x++) {
																					?>
																				<td  id="m<?php echo $x;?>"><select  class="form-control form_border"  data-placeholder="Choose a Category" tabindex="1" id="mpid<?php echo $x;?>" name="m[<?php echo $x; ?>]"   >
																				<option value="">Assign Teacher</option>
																				<?php
																
																				
                                                               	foreach($Teacherslist as $tl)
																{		
																								?>
																							
                                                                <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->id;?>"  > <?php echo $tl->subjects;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																<?php }?>
                                                           																
                                                               </select> </td>
																	<?php	
																	}
																  
																		?>
																	
                                                               </tr>
															   
                                                              <tr>
															      
																	<td style="background-color:#ccc;vertical-align: middle;"><strong>Tuesday</strong></td>
																	<?php 
																	
																	
																				for ($x = 1; $x <= $noofperiods; $x++) {
																								?>
																				<td  id="t<?php echo $x;?>"><select  class="form-control form_border" class="form-group" class="center" data-placeholder="Choose a Category" tabindex="1" id="tpid<?php echo $x;?>" name="t[<?php echo $x; ?>]"   >
																				<option value="" >Assign Teacher</option>
																				<?php
                                                               	foreach($Teacherslist as $tl)
																{		
																								?>
																							
                                                                 <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->id;?>"  > <?php echo $tl->subjects;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																<?php }?>
																
                                                               </select> </td>
																				<?php
																				}
																	
																		?>
                                                               </tr>
															    <tr>
																    
																	<td style="background-color:#ccc;vertical-align: middle;"><strong>Wednesday</strong></td>
																	<?php 
																				for ($x = 1; $x <= $noofperiods; $x++) {
																								?>
																				<td   id="w<?php echo $x;?>"><select  class="form-control form_border" class="form-group" class="center" data-placeholder="Choose a Category" tabindex="1" id="wpid<?php echo $x;?>" name="w[<?php echo $x; ?>]"   >
																				<option value="" >Assign Teacher</option>
																				<?php
                                                               	foreach($Teacherslist as $tl)
																{		
																								?>
																							
                                                                <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->id;?>"  > <?php echo $tl->subjects;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																<?php }?>					
                                                               </select> </td>
																				<?php
																		 }
																		?>
                                                               </tr>
															    <tr>
																   
																	<td style="background-color:#ccc;vertical-align: middle;"><strong>Thursday</strong></td>
																	<?php 
																				for ($x = 1; $x <= $noofperiods; $x++) {
																								?>
																				<td  id="th<?php echo $x;?>"><select  class="form-control form_border" class="form-group" class="center" data-placeholder="Choose a Category" tabindex="1" id="thpid<?php echo $x;?>" name="th[<?php echo $x; ?>]"   >
																				<option value="" >Assign Teacher</option>
																				<?php
                                                               	foreach($Teacherslist as $tl)
																{		
																								?>
																							
                                                                 <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->id;?>"  > <?php echo $tl->subjects;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																<?php }?>						
                                                               </select> </td>
																				<?php
																		 }
																		?>
                                                               </tr>
															   <tr>
															     
																	<td style="background-color:#ccc;vertical-align: middle;"><strong>Friday</strong></td>
																	<?php 
																				for ($x = 1; $x <= $noofperiods; $x++) {
																								?>
																				<td  id="f<?php echo $x;?>"><select  class="form-control form_border" class="form-group" class="center" data-placeholder="Choose a Category" tabindex="1" id="fpid<?php echo $x;?>" name="f[<?php echo $x; ?>]"   >
																				<option value="" >Assign Teacher</option>
																				<?php
                                                               	foreach($Teacherslist as $tl)
																{		
																								?>
																							
                                                                 <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->id;?>"  > <?php echo $tl->subjects;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																<?php }?>							
                                                               </select> </td>
																				<?php
																		 }
																		?>
                                                               </tr>
															   <tr>
															     
																	<td style="background-color:#ccc;vertical-align: middle;"><strong>Saturday</strong></td>
																	<?php 
																				for ($x = 1; $x <= $noofperiods; $x++) {
																								?>
																				<td  id="sa<?php echo $x;?>"><select  class="form-control form_border" class="form-group" class="center" data-placeholder="Choose a Category" tabindex="1" id="sapid<?php echo $x;?>" name="sa[<?php echo $x; ?>]"   >
																				<option value="" >Assign Teacher</option>
																				<?php
                                                               	foreach($Teacherslist as $tl)
																{		
																								?>
																							
                                                                <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->id;?>"  > <?php echo $tl->subjects;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																<?php }?>						
                                                               </select></td>
																				<?php
																		 }
																		?>
                                                               </tr>
															   <tr>
															     
																	<td style="background-color:#ccc;vertical-align: middle;"><strong>Sunday</strong></td>
																	<?php 
																				for ($x = 1; $x <= $noofperiods; $x++) {
																								?>
																				<td id="su<?php echo $x;?>"><select class="form-control form_border" class="form-group" class="center" data-placeholder="Choose a Category" tabindex="1" id="supid<?php echo $x;?>" name="su[<?php echo $x; ?>]"   >
																				<option value="" >Assign Teacher</option>
																				<?php
                                                               foreach($Teacherslist as $tl)
																{		
																								?>
																							
                                                                <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->id;?>"  > <?php echo $tl->subjects;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																<?php }?>						
                                                               </select> </td>
																				<?php
																		 }
																		?>
                                                               </tr>
                                                             
                                                            </tbody>
															
                                                        </table>
                                                        </div>
														</div>
														
																<br>
																<br>
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
														
<div class="row">
<div class=" col-md-6">
<table class="tg" style="width:90%;" border="1">
  <tr>
    <th  colspan="8" style="background-color:green; color:white; font-size:12px;padding:7px;">NO.OF PERIOD TAKEN PER SUBJECTS 
	(School Teachers)</th>
  </tr>
  <tr>
    <th style="background-color:lightblue; text-align: left; font-size:15px; font-family:serif;padding:7px;">Teacher Name</th>
	 <th style="background-color:lightblue; text-align: left; font-size:15px; font-family:serif;padding:7px;">Subject Name</th>
	<th style="background-color:lightblue; font-size:15px; font-family:serif; padding:7px;">Term Plan</th>
	<th style="background-color:lightblue; font-size:15px; font-family:serif;padding:7px; ">Planned Completion till Last Week</th>
    <th style="background-color:lightblue; font-size:15px; font-family:serif;padding:7px; ">Completed till Date</th>
    <th style="background-color:lightblue; font-size:15px; font-family:serif;padding:7px; ">Remaining</th> 	
	<th style="background-color:lightblue; font-size:15px; font-family:serif;padding:7px; ">This Week Shedule</th> 
	
	
  </tr>
  <tbody>
   <?php                                                           
   $i=1;
   if(!empty($timetablecountteacher))
   {
   foreach($timetablecountteacher as $teac)
	{    
?>	
  <tr>
  <?php $termplan=95;
  $remaining=$termplan-$teac->teacher_count;?>
  
    <td style="text-align: left;padding:7px;"> <?php echo $teac->teacher_name;?></td>
	<td style="text-align: left;padding:7px;"> <?php echo $teac->subjects;?></td>
    <td style="padding:7px;"> <?php echo $termplan ?></td>
	<td style="padding:7px;"> <?php echo $i?></td>
	<td style="padding:7px;"> <?php echo $teac->teacher_count_total;?></td>
	<td style="padding:7px;"><?php echo $remaining=($termplan)-($teac->teacher_count_total);?></td>
	<td style="padding:7px;"> <?php echo $teac->teacher_count;?></td>
	
    
  </tr>
  <?php $i++;  } } ?>
  </tbody>
</table>
</div>	
<div class=" col-md-6">
<table class="tg" style="width:90%;" border="1">
  <tr>
    <th  colspan="8" style="background-color:red;color:white;  font-size:12px;padding:7px;">NO.OF PERIOD TAKEN PER SUBJECTS 
	(Volunteers Teachers)</th>
  </tr>
  <tr>
    <th style="background-color:lightblue; text-align: left;font-size:15px; font-family:serif;padding:7px;">Teacher Name</th>
	 <th style="background-color:lightblue; text-align: left; font-size:15px; font-family:serif;padding:7px;">Subject Name</th>
	<th style="background-color:lightblue; font-size:15px; font-family:serif; padding:7px;">Term Plan</th>
    <th style="background-color:lightblue; font-size:15px; font-family:serif;padding:7px; ">Completed till Last Week</th>	
	<th style="background-color:lightblue; font-size:15px; font-family:serif;padding:7px; ">Remaining</th> 
	<th style="background-color:lightblue; font-size:15px; font-family:serif;padding:7px; ">This Week Shedule</th> 
	
	
  </tr>
  <tbody>
   <?php                                                           
   $i=1;
   if(!empty($countvolunteacherteacher))
   {
   foreach($countvolunteacherteacher as $volteac)
	{    
?>	
  <tr>
  <?php $termplan=95;
  $remaining=$termplan-$teac->teacher_count;?>
  
    <td style="text-align: left;padding:7px;"> <?php echo $volteac->teacher_name;?></td>
	<td style="text-align: left;padding:7px;"> <?php echo $volteac->subjects;?></td>
    <td style="padding:7px;"> <?php echo $termplan ?></td>
	<td style="padding:7px;"> <?php echo $volteac->teacher_count_total;?></td>
	<td style="padding:7px;"><?php echo $remaining=($termplan)-($volteac->teacher_count_total);?></td>
	<td style="padding:7px;"> <?php echo $volteac->teacher_count;?></td>
	
    
  </tr>
  <?php $i++;  } } ?>
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
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
		<script src="<?php echo base_url().'asset/js/tabletojson-vit/src/jquery.tabletojson.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        
        <script type="text/javascript">
		
var weekControl = document.querySelector('input[type="week"]');
weekControl.value = '';
$(document).ready(function(){ 
var timetabledetailsm = <?php echo json_encode($timetabledetails_monday, JSON_PRETTY_PRINT)?>;
console.log(timetabledetailsm);
var timetabledetailst = <?php echo json_encode($timetabledetails_tuesday, JSON_PRETTY_PRINT)?>;

var timetabledetailsw = <?php echo json_encode($timetabledetails_wednesday, JSON_PRETTY_PRINT)?>;
console.log(timetabledetailsw); 
var timetabledetailsth = <?php echo json_encode($timetabledetails_thursday, JSON_PRETTY_PRINT)?>; 
var timetabledetailsf = <?php echo json_encode($timetabledetails_friday, JSON_PRETTY_PRINT)?>; 


var timetabledetailssa = <?php echo json_encode($timetabledetails_saturday, JSON_PRETTY_PRINT)?>; 
var timetabledetailssu = <?php echo json_encode($timetabledetails_sunday, JSON_PRETTY_PRINT)?>; 
var length=timetabledetailsm.length;

if(timetabledetailsm!='')	
{
 var periodscount=$("#periodscount").val();
 for (var i = 1; i <= periodscount; i++) 
 {
if(timetabledetailsm[i-1]['PS']=='undefined' && timetabledetailsm[i-1]['PT']=='undefined')
{
 ms=1;
 mt=1;
}	 
 else
 {	 
 ms = timetabledetailsm[i-1]['PS'];
 mt = timetabledetailsm[i-1]['PT'];
 }
 //leavedatem = timetabledetailsm[i-1]['leavedate'];
 if(ms=='' && mt=='')
 {
 var leave_dropm = '<select name="leave" class="form-control" id="leave">';
 leave_dropm += '<option value=0>Leave</option>';
 leave_dropm +='</select>';
 $("#mpid"+i).empty('');            
 $("#mpid"+i).html(leave_dropm);
 $("#mpid"+i).prop("disabled", true);
 document.getElementById("m"+i).style.backgroundColor ="#EBF51F";
 }
 else if(ms==null && mt==0 || ms==999 && mt==0)
 {
	 document.getElementById("m"+i).style.backgroundColor ="#fff";
	 $("#mpid"+i).prop("disabled", true);
 }
 
 else
 {
 mst=mt+'-'+ms;
 $("#mpid"+i).val(mst);
 document.getElementById("m"+i).style.backgroundColor ="#2c730059";
 $("#mpid"+i).prop("disabled", true);
 }
 if(timetabledetailst['PS']=='undefined' && timetabledetailst['PT']=='undefined')
{
 ts=1;
 tt=1;
}	 
 else
 {	 
 ts = timetabledetailst[i-1]['PS'];
 tt = timetabledetailst[i-1]['PT'];
 }
 
 
 if(ts=='' && tt=='')
 {
 var leave_drop = '<select name="leave" class="form-control" id="leave">';
 leave_drop += '<option value=0>Leave</option>';
 leave_drop +='</select>';
 $("#tpid"+i).empty('');            
 $("#tpid"+i).html(leave_drop);
 $("#tpid"+i).prop("disabled", true);
 document.getElementById("t"+i).style.backgroundColor ="#EBF51F";
 }
 else if(ts==null && tt==0 || ts==999 && tt==0)
 {
	 document.getElementById("t"+i).style.backgroundColor ="#fff";
	 $("#tpid"+i).prop("disabled", true);
 }
 else
 {
 tst=tt+'-'+ts;
 $("#tpid"+i).val(tst);
 document.getElementById("t"+i).style.backgroundColor ="#2c730059";
 $("#tpid"+i).prop("disabled", true);
 }
 if(timetabledetailsw['PS']=='undefined' && timetabledetailsw['PT']=='undefined')
{
 ws=1;
 wt=1;
}
else
{
 ws = timetabledetailsw[i-1]['PS'];
 wt = timetabledetailsw[i-1]['PT'];
}
 if(ws=='' && wt=='')
 {
 var leave_drop = '<select name="leave" class="form-control" id="leave">';
 leave_drop += '<option value=0>Leave</option>';
 leave_drop +='</select>';
 $("#wpid"+i).empty('');            
 $("#wpid"+i).html(leave_drop);
$("#wpid"+i).prop("disabled", true);
document.getElementById("w"+i).style.backgroundColor ="#EBF51F";
 }
 else if(ws==null && wt==0 || ws==999 && wt==0)
 {
	 document.getElementById("w"+i).style.backgroundColor ="#fff";
	 $("#wpid"+i).prop("disabled", true);
 }
 else
 {
 wst=wt+'-'+ws;
 $("#wpid"+i).val(wst);
 document.getElementById("w"+i).style.backgroundColor ="#2c730059";
 $("#wpid"+i).prop("disabled", true);
 }
 if(timetabledetailsth['PS']=='undefined' && timetabledetailsth['PT']=='undefined')
{
 ths=1;
 tht=1;
}
else
{
 ths = timetabledetailsth[i-1]['PS'];
 tht = timetabledetailsth[i-1]['PT'];
}
 if(ths=='' && tht=='')
 {
 var leave_drop = '<select name="leave" class="form-control" id="leave">';
 leave_drop += '<option value=0>Leave</option>';
 leave_drop +='</select>';
 $("#thpid"+i).empty('');            
 $("#thpid"+i).html(leave_drop);
$("#thpid"+i).prop("disabled", true);
document.getElementById("th"+i).style.backgroundColor ="#EBF51F";
 }
  else if(ths==null && tht==0 || ths==999 && tht==0)
 {
	 document.getElementById("th"+i).style.backgroundColor ="#fff";
	 $("#thpid"+i).prop("disabled", true);
 }
 else
 {
 thst=tht+'-'+ths;
 $("#thpid"+i).val(thst);
 document.getElementById("th"+i).style.backgroundColor ="#2c730059";
 $("#thpid"+i).prop("disabled", true);
 }
 if(timetabledetailsf['PS']=='undefined' && timetabledetailsf['PT']=='undefined')
{
 fs=1;
 ft=1;
}
else
{
 fs = timetabledetailsf[i-1]['PS'];
 ft = timetabledetailsf[i-1]['PT'];
}
 if(fs=='' && ft=='')
 {
 var leave_drop = '<select name="leave" class="form-control" id="leave">';
 leave_drop += '<option value=0>Leave</option>';
 leave_drop +='</select>';
 $("#fpid"+i).empty('');            
 $("#fpid"+i).html(leave_drop);
$("#fpid"+i).prop("disabled", true);
document.getElementById("f"+i).style.backgroundColor ="#EBF51F";
 }
 else if(fs==null && ft==0 || fs==999 && ft==0)
 {
	 document.getElementById("f"+i).style.backgroundColor ="#fff";
	 $("#fpid"+i).prop("disabled", true);
 }
 else
 {
 fst=ft+'-'+fs;
 $("#fpid"+i).val(fst);
 document.getElementById("f"+i).style.backgroundColor ="#2c730059";
 $("#fpid"+i).prop("disabled", true);
 }
 if(timetabledetailssa['PS']=='undefined' && timetabledetailssa['PT']=='undefined')
{
 sas=1;
 sat=1;
}
else
{
 sas = timetabledetailssa[i-1]['PS'];
 sat = timetabledetailssa[i-1]['PT'];
}
 if(sas=='' && sat=='')
 {
 var leave_drop = '<select name="leave" class="form-control" id="leave">';
 leave_drop += '<option value=0>Leave</option>';
 leave_drop +='</select>';
 $("#sapid"+i).empty('');            
 $("#sapid"+i).html(leave_drop);
$("#sapid"+i).prop("disabled", true);
document.getElementById("sa"+i).style.backgroundColor ="#EBF51F";
 }
 else if(sas==null && sat==0 || sas==999 && sat==0)
 {
	 document.getElementById("sa"+i).style.backgroundColor ="#fff";
	 $("#sapid"+i).prop("disabled", true);
 } 
 else
 {
 sast=sat+'-'+sas;
 $("#sapid"+i).val(sast);
 document.getElementById("sa"+i).style.backgroundColor ="#2c730059";
 $("#sapid"+i).prop("disabled", true);
 }
 if(timetabledetailssu['PS']=='undefined' && timetabledetailssu['PT']=='undefined')
{
 sus=1;
 sut=1;
}
else
{
 sus = timetabledetailssu[i-1]['PS'];
 sut = timetabledetailssu[i-1]['PT'];
}
 if(sus=='' && sut=='')
 {
 var leave_drop = '<select name="leave" class="form-control" id="leave">';
 leave_drop += '<option value=0>Leave</option>';
 leave_drop +='</select>';
 $("#supid"+i).empty('');            
 $("#supid"+i).html(leave_drop);
$("#supid"+i).prop("disabled", true);
document.getElementById("su"+i).style.backgroundColor ="#EBF51F";
 }
 else if(sus==null && sut==0 || sus==999 && sut==0)
 {
	 document.getElementById("su"+i).style.backgroundColor ="#fff";
	 $("#supid"+i).prop("disabled", true);
 }
 else
 {
 sust=sut+'-'+sus;
 $("#supid"+i).val(sust);
 document.getElementById("su"+i).style.backgroundColor ="#2c730059";
 $("#supid"+i).prop("disabled", true);
 }
 $("#mpid"+i).select2({closeOnSelect:false});
 $("#tpid"+i).select2({closeOnSelect:false});
 $("#wpid"+i).select2({closeOnSelect:false});
 $("#thpid"+i).select2({closeOnSelect:false});
 $("#fpid"+i).select2({closeOnSelect:false});
 $("#sapid"+i).select2({closeOnSelect:false});
 $("#supid"+i).select2({closeOnSelect:false});
}
}
else
{
	var periodscount=$("#periodscount").val();

for (var i = 1; i <= periodscount; i++) { 

 $("#mpid"+i).select2({closeOnSelect:false});
 $("#tpid"+i).select2({closeOnSelect:false});
 $("#wpid"+i).select2({closeOnSelect:false});
 $("#thpid"+i).select2({closeOnSelect:false});
 $("#fpid"+i).select2({closeOnSelect:false});
 $("#sapid"+i).select2({closeOnSelect:false});
 $("#supid"+i).select2({closeOnSelect:false});
 }
}
			
 });

              			

    function get_section()
    {
  // alert(section_id);
  var classid=$("#classid").val();
      if(classid !=0){
    $.ajax(
    {
        type: "POST",
        url:baseurl+'TimetableController/get_school_section_details',
        data:{'class_id':classid},
        success: function(resp){
        // alert(resp);  
       
        var section = JSON.parse(resp);
        console.log(section);
        var section_drop = '<select name="section_id" class="form-control" id="section_id">';
        section_drop += '<option value=0>Select Section</option>';
        $.each(section,function(id,val)
        {
            section_drop +='<option value='+ val.section +'>'+val.section+'</option>';
        })
            section_drop +='</select>';
            
            $("#section").empty('');            
            $("#section").html(section_drop); 
           
            
         },
          
    })
    }
    }  
        
 
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>    



	
   

        </script>
    </body>
</html>