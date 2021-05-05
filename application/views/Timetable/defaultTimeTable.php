<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
	
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
                               
                                <div class="container" style="width:100%;">
                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Create Master Timetable</span>
													</br>
													
													<p style="color:green;"></p>
                                                </div>
                                            </div> 
                                           
                                            <!--begin form -->
                                           

                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                          
                                        									  
                                        <center>
                                                  <form id="filter" method="post" action="<?php echo base_url().'TimetableController/loadDefaultTimeTable';?>">
												   
                                                    <div class="form-group">
                                                    <div class="row">
													 <!--<div class="col-md-2"> 
                                                     													
                                                         <select style="width: 85%;" class="form-control" data-placeholder="Choose a Category" tabindex="1" id="termid" name="termid"  style="width: 80%" required="" >
                                                               	
                                                                <option value="" >Select Term</option>
																<option value="1" >Term 1</option>
                                                                <option value="2" >Term 2</option>
																<option value="3" >Term 3</option>
                                                               </select>
                                                        
                                                    </div>--> 
                                                                <div class="col-md-2">  
                                                          <select style="width: 90%;" class="form-control" onclick="get_section();" data-placeholder="Choose a Category" tabindex="1" id="classid" name="classid"  style="width: 30%" required="" >
                                                               	
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
																	   <?php }  ?>
																 
                                                               </select> 
                                                        
                                                    </div>
													<div class="col-md-2">  
                                                          <select style="width: 90%;" class="form-control" data-placeholder="Choose a Category" tabindex="1" id="section" name="section"  style="width: 60%" required="" >
                                                            <option>Select Section</option>    
                                                               
                                                               </select> 
                                                        
                                                    </div>
													
													<div class="col-md-2">
                                                        
                                                          <button type="submit"  class="btn green" id="emis_stu_searchsep_sub" >SUBMIT</button>
                                                              
                                                    </div>
													<div class="col-md-offset-2 col-md-4">
                                                        
                                                          <p style="color:blue;"><strong>A master timetable is the standard timetable for the entire year for the particular class. Once it is created, it can be copied as the weekly time table for any week of the year.</strong></p>
                                                              
                                                    </div>
													</div>
                                                    </form></center>
													
                                              
                                                </div>

                                              </div>
                                            </div>



                                                


                                               <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                       <div class="caption">
                                                            <i class="fa fa-globe"></i> Class :&nbsp;&nbsp;<?php echo $class?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Section&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $section?>
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
                                                    
                                                         <table class="table table-striped table-bordered table-hover" id="student_mark">
                                                            <thead>
															<input type="hidden"  id="periodscount" name="periodscount" value="<?php echo $noofperiods;?>">
															<input type="hidden"  id="term" name="term" value="<?php echo $term;?>">
															<input type="hidden"  id="class" name="class" value="<?php echo $class;?>">
															<input type="hidden"  id="sections" name="section" value="<?php echo $section;?>">
                                                                <tr>
                                                                    <th style="width:5%">Days</th>
																	<?php 
																				for ($x = 1; $x <= $noofperiods; $x++) { ?>
																				<th style="witdh:10%;">Period:<?php echo $x ?></th>
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
																				<td id="m<?php echo $x;?>"><select  class="form-control form_border"  data-placeholder="Choose a Category" tabindex="1" id="mpid<?php echo $x;?>" name="m[<?php echo $x; ?>]"   >
																				
																				
																
																<option value="0-999">Not - Assigned</option>
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
																				<td id="t<?php echo $x;?>"><select  class="form-control form_border" class="form-group" class="center" data-placeholder="Choose a Category" tabindex="1" id="tpid<?php echo $x;?>" name="t[<?php echo $x; ?>]"   >
																				<option value="0-999">Not - Assigned</option>
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
																				<td  id="w<?php echo $x;?>"><select  class="form-control form_border" class="form-group" class="center" data-placeholder="Choose a Category" tabindex="1" id="wpid<?php echo $x;?>" name="w[<?php echo $x; ?>]"   >
																				<option value="0-999">Not - Assigned</option>
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
																				<td id="th<?php echo $x;?>"><select  class="form-control form_border" class="form-group" class="center" data-placeholder="Choose a Category" tabindex="1" id="thpid<?php echo $x;?>" name="th[<?php echo $x; ?>]"   >
																				<option value="0-999">Not - Assigned</option>
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
																				<td id="f<?php echo $x;?>"><select  class="form-control form_border" class="form-group" class="center" data-placeholder="Choose a Category" tabindex="1" id="fpid<?php echo $x;?>" name="f[<?php echo $x; ?>]"   >
																				<option value="0-999">Not - Assigned</option>
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
																				<td id="sa<?php echo $x;?>"><select  class="form-control form_border" class="form-group" class="center" data-placeholder="Choose a Category" tabindex="1" id="sapid<?php echo $x;?>" name="sa[<?php echo $x; ?>]"   >
																				<option value="0-999">Not - Assigned</option>
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
																				<option value="0-999">Not - Assigned</option>
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
                                                 
														<br>
														<br>
														<br>
														<?php 
									if($section !='0' && $section !='')
															{
																?>
														 <div class="row">
														
															   <div class="col-md-offset-10 col-md-2">
													  					<a href="javascript:;" 
                                                                           class="btn btn-sm green" style="margin-top: -79px; margin-left: -17px;" id="save" onclick="save();"
                                                                          > 
                                                                            SAVE <i class="fa fa-plus-o "></i>
                                                                        </a>
																		</div>
																		
																		</div>
																		<?php } ?>
                                                                   </div>
																   </form>
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
		

$(document).ready(function(){
var section=<?php echo json_encode($section, JSON_PRETTY_PRINT)?>;

if(section==0 || section==null)
{
	var periodscount=$("#periodscount").val();
 for (var i = 1; i <= periodscount; i++) 
 {
	 $("#mpid"+i).prop("disabled", true);
	 $("#tpid"+i).prop("disabled", true);
	 $("#wpid"+i).prop("disabled", true);
	 $("#thpid"+i).prop("disabled", true);
	 $("#fpid"+i).prop("disabled", true);
	 $("#sapid"+i).prop("disabled", true);
	 $("#supid"+i).prop("disabled", true);
 }	
}	
else
{
var classid=<?php echo json_encode($class, JSON_PRETTY_PRINT)?>;	
$("#classid").val(classid).attr('selected','selected');	
	
var timetabledetailsm = <?php echo json_encode($timetabledetails_monday, JSON_PRETTY_PRINT)?>;

var timetabledetailst = <?php echo json_encode($timetabledetails_tuesday, JSON_PRETTY_PRINT)?>;

var timetabledetailsw = <?php echo json_encode($timetabledetails_wednesday, JSON_PRETTY_PRINT)?>;

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
	 
 ms=timetabledetailsm[i-1]['PS'];
 mt=timetabledetailsm[i-1]['PT'];
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
 }
 
 else
 {
 mst=mt+'-'+ms;
 $("#mpid"+i).val(mst);
 document.getElementById("m"+i).style.backgroundColor ="#2c730059"; 
 }
 ts=timetabledetailst[i-1]['PS'];
 tt=timetabledetailst[i-1]['PT'];
 if(ts=='' && tt=='')
 {
 var leave_drop = '<select name="leave" class="form-control form_border" id="leave">';
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
 }
 else
 {
 tst=tt+'-'+ts;
 $("#tpid"+i).val(tst);
 document.getElementById("t"+i).style.backgroundColor ="#2c730059";
 }
 ws=timetabledetailsw[i-1]['PS'];
 wt=timetabledetailsw[i-1]['PT'];
 if(ws=='' && wt=='')
 {
 var leave_drop = '<select name="leave" class="form-control form_border" id="leave">';
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
 }
 else
 {
 wst=wt+'-'+ws;
 $("#wpid"+i).val(wst);
 document.getElementById("w"+i).style.backgroundColor ="#2c730059";
 }
 
 ths=timetabledetailsth[i-1]['PS'];
 tht=timetabledetailsth[i-1]['PT'];
 if(ths=='' && tht=='')
 {
 var leave_drop = '<select name="leave" class="form-control form_border" id="leave">';
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
 }
 else
 {
 thst=tht+'-'+ths;
 $("#thpid"+i).val(thst);
 document.getElementById("th"+i).style.backgroundColor ="#2c730059";
 }
 
fs=timetabledetailsf[i-1]['PS'];
 ft=timetabledetailsf[i-1]['PT'];
 if(fs=='' && ft=='')
 {
 var leave_drop = '<select name="leave" class="form-control form_border" id="leave">';
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
 }
 else
 {
 fst=ft+'-'+fs;
 $("#fpid"+i).val(fst);
 document.getElementById("f"+i).style.backgroundColor ="#2c730059";
 }
 
sas=timetabledetailssa[i-1]['PS'];
 sat=timetabledetailssa[i-1]['PT'];
 if(sas=='' && sat=='')
 {
 var leave_drop = '<select name="leave" class="form-control form_border" id="leave">';
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
 } 
 else
 {
 sast=sat+'-'+sas;
 $("#sapid"+i).val(sast);
 document.getElementById("sa"+i).style.backgroundColor ="#2c730059";
 }

sus=timetabledetailssu[i-1]['PS'];
 sut=timetabledetailssu[i-1]['PT'];
 if(sus=='' && sut=='')
 {
 var leave_drop = '<select name="leave" class="form-control form_border" id="leave">';
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
 }
 else
 {
 sust=sut+'-'+sus;
 $("#supid"+i).val(sust);
 document.getElementById("su"+i).style.backgroundColor ="#2c730059";
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
}			
 });

function save()
{
	var Monday=[];
	var Tuesday=[];
	var Wednesday=[];
	var Thursday=[];
	var Friday=[];
	var Saturday=[];
	var Sunday=[];
	var periodscount=$("#periodscount").val();
	var term=$("#term").val();
	var classes=$("#class").val();
	var section =$("#sections").val();
	
	for (var i = 1; i <= periodscount; i++) { 
	monday=$("#mpid"+i).val();
	tuesday=$("#tpid"+i).val();
	wednesday=$("#wpid"+i).val();
	thursday=$("#thpid"+i).val();
	friday=$("#fpid"+i).val();
	saturday=$("#sapid"+i).val();
	sunday=$("#supid"+i).val();
	Monday[i] =monday;
	Tuesday[i] =tuesday;
	Wednesday[i] =wednesday;
	Thursday[i] =thursday;
	Friday[i] =friday;
	Saturday[i] =saturday;
	Sunday[i] =sunday;
	}
	$.ajax(
				{
					data:{'periodscount':periodscount,'term':term,'class':classes,'section':section,'monday':Monday,'tuesday':Tuesday,'wednesday':Wednesday,'thursday':Thursday,'friday':Friday,'saturday':Saturday,'sunday':Sunday},
					url:baseurl+'TimetableController/loadDefaultTimeTable',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{ 
						 swal("OK", "Master Time Table Saved Successfully", "success");
						 window.location.reload();
						
					}
				});
				swal("OK", "Master Time Table Saved Successfully", "success");
				 window.location.reload();
	
}              			

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
			class_id=val.id;
			 $('#classauto').val(class_id);
        })
            section_drop +='</select>';
            
            $("#section").empty('');            
            $("#section").html(section_drop);
         },
          
    })
    }
    } 
  $(document).ready(function(){ 
 var section1=<?php echo json_encode($section, JSON_PRETTY_PRINT)?>;   
  var section_drop1 = '<select name="section_id" class="form-control" id="section_id" required>';
 section_drop1 +='<option value='+section1 +'>'+section1+'</option>'; 
 section_drop1 +='</select>';
// $("#section_id").val(section1).attr('selected','selected');
$("#section").html(section_drop1); 
	});
        
     



	
   

        </script>
    </body>
</html>
