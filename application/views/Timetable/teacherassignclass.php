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
                               
                                <div class="container">
                                    <!-- BEGIN PAGE CONTENT INNER -->
                          

                                   
                                       
                                    <!--<?php $this->load->view('emis_school_profile_header1.php'); ?>-->
                                        

                                           <!-- <div class="m-heading-1 border-green m-bordered">
                                            <h3>Basic Information</h3>
                                        </div> -->
                                     
                                         
                                        <div class="portlet light portlet-fit ">
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
                                                          
                                        									  
                                                <!--<center>
                                                  <form id="filter" method="post" action="<?php echo base_url().'TimetableController/loadWeeklyTimeTable';?>">
												   
                                                    <div class="form-group">
                                                    <div class="row">
													<!--<div class="col-md-2">  
                                                          <select style="width: 85%;" class="form-control" data-placeholder="Choose a Category" tabindex="1" id="termid" name="termid"  style="width: 80%" required="" >
                                                               	
                                                                <option value="" >Select Term</option>
																<option value="1" >Term 1</option>
                                                                <option value="2" >Term 2</option>
																<option value="3" >Term 3</option>
                                                               </select> 
                                                        
                                                    </div>
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
																case $sta="3":$standard='VIII';break;
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
                                                              
                                                               
                                                               </select> 
                                                        
                                                    </div>
													<input type="hidden" style="color:red" id="classauto" name="classauto" value="1">
													<div class="col-md-2">
                                                        
                                                          <button type="submit"  class="btn green" id="emis_stu_searchsep_sub" >SUBMIT</button>
                                                              
                                                    </div>
													</div>
                                                    </form>
													</center>-->
													
                                              
                                                </div>

                                              </div>
                                            </div>
                                               <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                          <div class="caption">
                                                            <i class="fa fa-globe"></i>Assign Teacher to Class
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
															<input type="hidden"  id="clautoid" name="clautoid" value="<?php echo $classauto;?>">
															<input type="hidden"  id="class" name="class" value="<?php echo $class;?>">
															<input type="hidden"  id="sections" name="sections" value="<?php echo $section;?>">
                                                                <tr>
                                                                    <th style="width:5%">Days</th>
																	<?php $noofperiods=8; ?>
                                                                  <th>Tamil</th>
																   <th>English</th>
																   <th>Maths</th>
																   <th>Science</th>
																   <th>S.Science</th>
																   <th>Other 1</th>
																   <th>Other 2</th>
																   <th>Other 3</th>
																   
																		
                                                                   
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            
                                                               <tr>
                                                                     
                                                                   
																	<td style="background-color:#DEB887;"><strong>1A</strong></td>
																	
																				<?php for ($x = 1; $x <= $noofperiods; $x++) {
																					?>
																				<td style="background-color:#DEB887;"><select  class="form-control"  data-placeholder="Choose a Category" tabindex="1" id="mpid<?php echo $x;?>" name="m[<?php echo $x; ?>]"   >
																				<option value="" >Assign Teacher</option>
																				<?php
																
																				
                                                               	foreach($Teacherslist as $tl)
																{		
																								?>
																							
                                                                <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->subject1;?>"  > <?php echo $tl->s1;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																<?php
																
																if(!empty($tl->subject2))
																{?>
																 <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->subject2;?>"  > <?php echo $tl->s2;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																 <?php }
																 if(!empty($tl->subject3))
																{?>
																<option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->subject3;?>"  > <?php echo $tl->s3;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																<?php } }?>						
                                                               </select> </td>
																				<?php
																		 }
																		?>
																	
                                                               </tr>
															   
                                                              <tr>
															      
																	<td style="background-color:#F5DEB3;"><strong>1B</strong></td>
																	<?php 
																				for ($x = 1; $x <= $noofperiods; $x++) {
																								?>
																				<td style="background-color:#F5DEB3;"><select  class="form-control" class="form-group" class="center" data-placeholder="Choose a Category" tabindex="1" id="tpid<?php echo $x;?>" name="t[<?php echo $x; ?>]"   >
																				<option value="" >Assign Teacher</option>
																				<?php
                                                               	foreach($Teacherslist as $tl)
																{		
																								?>
																							
                                                                <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->subject1;?>"  > <?php echo $tl->s1;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																<?php
																
																if(!empty($tl->subject2))
																{?>
																 <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->subject2;?>"  > <?php echo $tl->s2;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																 <?php }
																 if(!empty($tl->subject3))
																{?>
																  <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->subject3;?>"  > <?php echo $tl->s3;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																<?php } }?>						
                                                               </select> </td>
																				<?php
																		 }
																		?>
                                                               </tr>
															    <tr>
																    
																	<td style="background-color:#DEB887;"><strong>2A</strong></td>
																	<?php 
																				for ($x = 1; $x <= $noofperiods; $x++) {
																								?>
																				<td style="background-color:#DEB887;"><select  class="form-control" class="form-group" class="center" data-placeholder="Choose a Category" tabindex="1" id="wpid<?php echo $x;?>" name="w[<?php echo $x; ?>]"   >
																				<option value="" >Assign Teacher</option>
																				<?php
                                                               	foreach($Teacherslist as $tl)
																{		
																								?>
																							
                                                                <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->subject1;?>"  > <?php echo $tl->s1;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																<?php
																
																if(!empty($tl->subject2))
																{?>
																 <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->subject2;?>"  > <?php echo $tl->s2;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																 <?php }
																 if(!empty($tl->subject3))
																{?>
																  <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->subject3;?>"  > <?php echo $tl->s3;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																<?php } }?>						
                                                               </select> </td>
																				<?php
																		 }
																		?>
                                                               </tr>
															    <tr>
																   
																	<td style="background-color:#F5DEB3	;"><strong>2B</strong></td>
																	<?php 
																				for ($x = 1; $x <= $noofperiods; $x++) {
																								?>
																				<td style="background-color:#F5DEB3;"><select  class="form-control" class="form-group" class="center" data-placeholder="Choose a Category" tabindex="1" id="thpid<?php echo $x;?>" name="th[<?php echo $x; ?>]"   >
																				<option value="" >Assign Teacher</option>
																				<?php
                                                               	foreach($Teacherslist as $tl)
																{		
																								?>
																							
                                                                <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->subject1;?>"  > <?php echo $tl->s1;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																<?php
																
																if(!empty($tl->subject2))
																{?>
																 <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->subject2;?>"  > <?php echo $tl->s2;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																 <?php }
																 if(!empty($tl->subject3))
																{?>
																  <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->subject3;?>"  > <?php echo $tl->s3;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																<?php } }?>							
                                                               </select> </td>
																				<?php
																		 }
																		?>
                                                               </tr>
															   <tr>
															     
																	<td style="background-color:#DEB887;"><strong>3</strong></td>
																	<?php 
																				for ($x = 1; $x <= $noofperiods; $x++) {
																								?>
																				<td style="background-color:#DEB887;"><select  class="form-control" class="form-group" class="center" data-placeholder="Choose a Category" tabindex="1" id="fpid<?php echo $x;?>" name="f[<?php echo $x; ?>]"   >
																				<option value="" >Assign Teacher</option>
																				<?php
                                                               	foreach($Teacherslist as $tl)
																{		
																								?>
																							
                                                                <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->subject1;?>"  > <?php echo $tl->s1;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																<?php
																
																if(!empty($tl->subject2))
																{?>
																 <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->subject2;?>"  > <?php echo $tl->s2;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																 <?php }
																 if(!empty($tl->subject3))
																{?>
																  <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->subject3;?>"  > <?php echo $tl->s3;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																<?php } }?>							
                                                               </select> </td>
																				<?php
																		 }
																		?>
                                                               </tr>
															   <tr>
															     
																	<td style="background-color:#F5DEB3;"><strong>4</strong></td>
																	<?php 
																				for ($x = 1; $x <= $noofperiods; $x++) {
																								?>
																				<td style="background-color:#F5DEB3;"><select  class="form-control" class="form-group" class="center" data-placeholder="Choose a Category" tabindex="1" id="sapid<?php echo $x;?>" name="sa[<?php echo $x; ?>]"   >
																				<option value="" >Assign Teacher</option>
																				<?php
                                                               	foreach($Teacherslist as $tl)
																{		
																								?>
																							
                                                                <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->subject1;?>"  > <?php echo $tl->s1;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																<?php
																
																if(!empty($tl->subject2))
																{?>
																 <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->subject2;?>"  > <?php echo $tl->s2;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																 <?php }
																 if(!empty($tl->subject3))
																{?>
																  <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->subject3;?>"  > <?php echo $tl->s3;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																<?php } }?>						
                                                               </select></td>
																				<?php
																		 }
																		?>
                                                               </tr>
															   <tr>
															     
																	<td style="background-color:#DEB887;"><strong>5</strong></td>
																	<?php 
																				for ($x = 1; $x <= $noofperiods; $x++) {
																								?>
																				<td style="background-color:#DEB887;  font-size:14px !important;"><select class="form-control" class="form-group" class="center" data-placeholder="Choose a Category" tabindex="1" id="supid<?php echo $x;?>" name="su[<?php echo $x; ?>]"   >
																				<option value="" >Assign Teacher</option>
																				<?php
                                                               foreach($Teacherslist as $tl)
																{		
																								?>
																							
                                                                <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->subject1;?>"  > <?php echo $tl->s1;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																<?php
																
																if(!empty($tl->subject2))
																{?>
																 <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->subject2;?>"  > <?php echo $tl->s2;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																 <?php }
																 if(!empty($tl->subject3))
																{?>
																  <option value="<?php echo $tl->teacher_code;?>-<?php echo $tl->subject3;?>"  > <?php echo $tl->s3;?>&nbsp;-&nbsp;<?php echo $tl->teacher_name?> </option>
																<?php } }?>							
                                                               </select> </td>
																				<?php
																		 }
																		?>
                                                               </tr>
                                                             
                                                            </tbody>
															
                                                        </table>
                                                        </div>
														</div>
														<div class="row">
														
															   <div class="col-md-offset-11 col-md-1">
													  					<a href="javascript:;" 
                                                                           class="btn btn-sm green" style="margin-left: -17px;" id="save" onclick="save();"
                                                                          > 
                                                                            SAVE <i class="fa fa-plus-o "></i>
                                                                        </a>
																		</div>
																		
																</div>
																<br>
																<br>
<style>
<style>
* {font-family: Helvetica Neue, Arial, sans-serif; }

body { background-image: linear-gradient(#aaa 25%, #000);}

h1, table { text-align: center; }

table {border-collapse: collapse;  width: 70%; margin: 0 auto 5rem;}

th, td { padding: 1.5rem; font-size: 1.1rem; }

tr {background: hsl(50, 50%, 80%); }

tr, td { transition: .4s ease-in; } 



tr:nth-child(even) { background: hsla(50, 50%, 80%, 0.7); }

td:empty {background: hsla(50, 25%, 60%, 0.7); }

tr:hover:not(#firstrow), tr:hover td:empty {background: #DEB887; pointer-events: visible;}
tr:hover:not(#firstrow) { transform: scale(1.0); font-weight: 600; box-shadow: 0px 3px 7px red;}



</style>
</style>																
														
<!--<div class="row">

<div class="col-md-12">
<table class="tg" style="width:100%;">
<tr>
<?php 
																	foreach($timetablecount as $tc)
	                                                                             {
																				?>
																				<th style="background-color:#ea6153; color:white; font-size:16px; font-family:serif;"><?php echo $tc->subjects;?></th>
																				
																				<?php
																		
																				}
																		?>
                                                                   
                                                                </tr>                                                                    
															
  
  <tbody>
  <tr>
                                                                    
																	<?php 
																	foreach($timetablecount as $tc)
	                                                                             {
																				?>
																				<td><?php echo $tc->subcount;?></th>
																				
																				<?php
																		
																				}
																		?>
                                                                   
                                                                </tr>
 
  </tbody>
</table>
</div>

</div>-->

<!--<div class="row">
<div class="col-md-10">
<table class="tg" style="width:116%;">
 
 <tr>
<?php 
																	foreach($timetablecountteacher as $teac)
	                                                                             {
																				?>
																				<th style="background-color:#27ae60; color:white; font-size:12px; font-family:serif;"><?php echo $teac->teacher_name;?></th>
																				
																				<?php
																		
																				}
																		?>
                                                                   
                                                                </tr>
 <tbody>
  <tr>
                                                                    
																	<?php 
																	foreach($timetablecountteacher as $teac)
	                                                                             {
																				?>
																				<td><?php echo $teac->teacher_count;?></th>
																				
																				<?php
																		
																				}
																		?>
                                                                   
                                                                </tr>
 
  </tbody>
</table>
</div>
</div>-->

<!--<div class="row">
<div class="col-md-5" style="width: 31.66667%;">
<table class="tg" style="width:80%;">
  <tr>
    <th  colspan="4" style="background-color:#2980b9; color:white; font-size:16px; font-family:serif;">Lesson Plan </th>
  </tr>
  <tr>
    <th style="background-color:lightblue; text-align: left;color:white; font-size:15px; font-family:serif;">Subject Name</th>
    <th style="background-color:lightblue;color:white; font-size:15px; font-family:serif; ">Term Plan </th>
    <th style="background-color:lightblue;color:white; font-size:15px; font-family:serif; ">Completed</th>	
	<th style="background-color:lightblue;color:white; font-size:15px; font-family:serif; ">Remaining</th>	
  </tr>
  <tbody>
   
 
  <tr>
    <td style="text-align: left;">Tamil</td>
    <td>46</td>
	<td>36</td>
	<td>16</td>
  </tr>
  <tr>
    <td style="text-align: left;">English</td>
    <td> 40</td>
    <td> 29</td>
	<td> 11</td>
  </tr>
  <tr>
    <td style="text-align: left;">Mathematics</td>
    <td>  43</td>
    <td>25</td>
	<td> 18</td>
  </tr>
  <tr>
    <td style="text-align: left;">Sciense</td>
    <td> 45</td>
    <td> 29</td>
	<td> 16</td>
  </tr>
  <tr>
    <td style="text-align: left;">Socialscience</td>
    <td> 38</td>
    <td> 30</td>
	<td> 08</td>
  </tr>
   <tr>
    <td style="text-align: left;">Sports</td>
    <td> <?php echo 15;?></td>
    <td> <?php echo 7;?></td>
	<td> <?php echo 8;?></td>
  </tr>
  
															  </tbody>
															</table>
															 </div>
															</div>-->
															

<div class="row">
<div class=" col-md-3">
<table class="tg" style="width:105%;">
  <tr>
    <th  colspan="8" style="background-color:#ea6153; color:white; font-size:12px;">SUBJECT LIST</th>
  </tr>
  <tr>
    <th style="background-color:lightblue; text-align: left;color:white; font-size:15px; font-family:serif;">Subjects</th>
    <th style="background-color:lightblue;color:white; font-size:15px; font-family:serif; ">Count</th> 
  </tr>
  <tbody>
   <?php                                                           
   $i=1;
   foreach($timetablecount as $tc)
	{    
?>	
  <tr>
    <td style="text-align: left;"> <?php echo $tc->subjects;?></td>
    <td> <?php echo $tc->subcount;?></td>
    
  </tr>
  <?php $i++;  }  ?>
  </tbody>
</table>
</div>
<div class="col-md-4">
<table class="tg" style="width:90%;">
  <tr>
    <th  colspan="4" style="background-color:#27ae60; color:white; font-size:12px;">TEACHER LIST</th>
  </tr>
  <tr>
    <th style="background-color:lightblue; text-align: left;color:white; font-size:15px; font-family:serif;">Teacher Name</th>
    <th style="background-color:lightblue;color:white; font-size:15px; font-family:serif; ">Assign Periods</th> 
  </tr>
  <tbody>
   <?php                                                           
   $i=1;
   foreach($timetablecountteacher as $teac)
	{    
?>	
  <tr>
    <td style="text-align: left;"> <?php echo $teac->teacher_name;?></td>
    <td> <?php echo $teac->teacher_count;?></td>
    
  </tr>
  <?php $i++;  }  ?>
  </tbody>
</table>
</div>
<div class="col-md-5" style="width: 31.66667%;">
<!--<table class="tg" style="width:80%;">
  <tr>
    <th  colspan="4" style="background-color:#2980b9; color:white; font-size:16px; font-family:serif;">Lesson Plan </th>
  </tr>
  <tr>
    <th style="background-color:lightblue; text-align: left;color:white; font-size:15px; font-family:serif;">Subject Name</th>
    <th style="background-color:lightblue;color:white; font-size:15px; font-family:serif; ">Term Plan </th>
    <th style="background-color:lightblue;color:white; font-size:15px; font-family:serif; ">Completed</th>	
	<th style="background-color:lightblue;color:white; font-size:15px; font-family:serif; ">Remaining</th>	
  </tr>
  <tbody>
   
 
  <tr>
    <td style="text-align: left;">Tamil</td>
    <td>46</td>
	<td>36</td>
	<td>16</td>
  </tr>
  <tr>
    <td style="text-align: left;">English</td>
    <td> 40</td>
    <td> 29</td>
	<td> 11</td>
  </tr>
  <tr>
    <td style="text-align: left;">Mathematics</td>
    <td>43</td>
    <td>25</td>
	<td>18</td>
  </tr>
  <tr>
    <td style="text-align: left;">Sciense</td>
    <td> 45</td>
    <td> 29</td>
	<td> 16</td>
  </tr>
  <tr>
    <td style="text-align: left;">Socialscience</td>
    <td> 38</td>
    <td> 30</td>
	<td> 08</td>
  </tr>
   <tr>
    <td style="text-align: left;">Sports</td>
    <td> <?php echo 15;?></td>
    <td> <?php echo 7;?></td>
	<td> <?php echo 8;?></td>
  </tr>
  
															  </tbody>
															</table>-->
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
		

$(document).ready(function(){ 
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
 ms = timetabledetailsm[i-1]['PS'];
 mt = timetabledetailsm[i-1]['PT'];
 mst=mt+'-'+ms;
 $("#mpid"+i).val(mst);
 
 ts = timetabledetailst[i-1]['PS'];
 tt = timetabledetailst[i-1]['PT'];
 tst=tt+'-'+ts;
 $("#tpid"+i).val(tst);
 
 ws = timetabledetailsw[i-1]['PS'];
 wt = timetabledetailsw[i-1]['PT'];
 wst=wt+'-'+ws;
 $("#wpid"+i).val(wst);
 
 ths = timetabledetailsth[i-1]['PS'];
 tht = timetabledetailsth[i-1]['PT'];
 thst=tht+'-'+ths;
 $("#thpid"+i).val(thst);
 
 fs = timetabledetailsf[i-1]['PS'];
 ft = timetabledetailsf[i-1]['PT'];
 fst=ft+'-'+fs;
 $("#fpid"+i).val(fst);
 
 sas = timetabledetailssa[i-1]['PS'];
 sat = timetabledetailssa[i-1]['PT'];
 sast=sat+'-'+sas;
 $("#sapid"+i).val(sast);
 
 sus = timetabledetailssu[i-1]['PS'];
 sut = timetabledetailssu[i-1]['PT'];
 sust=sut+'-'+sus;
 $("#supid"+i).val(sust);
 
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
function copylastweek()	
{
var copypreviousweek_monday = <?php echo json_encode($copypreviousweek_monday, JSON_PRETTY_PRINT)?>;

var copyprevoiusweek_tuesday = <?php echo json_encode($copyprevoiusweek_tuesday, JSON_PRETTY_PRINT)?>; 
var copypreviousweek_wednesday = <?php echo json_encode($copypreviousweek_wednesday, JSON_PRETTY_PRINT)?>; 
var copypreviousweek_thursday = <?php echo json_encode($copypreviousweek_thursday, JSON_PRETTY_PRINT)?>; 
var copypreviousweek_friday = <?php echo json_encode($copypreviousweek_friday, JSON_PRETTY_PRINT)?>; 
var copypreviousweek_saturday = <?php echo json_encode($copypreviousweek_saturday, JSON_PRETTY_PRINT)?>; 
var copypreviousweek_sunday = <?php echo json_encode($copypreviousweek_sunday, JSON_PRETTY_PRINT)?>; 
if(copypreviousweek_monday!='')	
{
var periodscount=$("#periodscount").val();

for (var i = 1; i <= periodscount; i++) { 

 ms = copypreviousweek_monday[i-1]['PS'];
 mt = copypreviousweek_monday[i-1]['PT'];
 mst=mt+'-'+ms;
 $("#mpid"+i).val(mst);
 ts = copyprevoiusweek_tuesday[i-1]['PS'];
 tt = copyprevoiusweek_tuesday[i-1]['PT'];
 tst=tt+'-'+ts;
 $("#tpid"+i).val(tst);
 
 ws = copypreviousweek_wednesday[i-1]['PS'];
 wt = copypreviousweek_wednesday[i-1]['PT'];
 wst=wt+'-'+ws;
 $("#wpid"+i).val(wst);
 
 ths = copypreviousweek_thursday[i-1]['PS'];
 tht = copypreviousweek_thursday[i-1]['PT'];
 thst=tht+'-'+ths;
 $("#thpid"+i).val(thst);
 
 fs = copypreviousweek_friday[i-1]['PS'];
 ft = copypreviousweek_friday[i-1]['PT'];
 fst=ft+'-'+fs;
 $("#fpid"+i).val(fst);
 
 sas = copypreviousweek_saturday[i-1]['PS'];
 sat = copypreviousweek_saturday[i-1]['PT'];
 sast=sat+'-'+sas;
 $("#sapid"+i).val(sast);
 
 sus = copypreviousweek_sunday[i-1]['PS'];
 sut = copypreviousweek_sunday[i-1]['PT'];
 sust=sut+'-'+sus;
 $("#supid"+i).val(sust);
 
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
	swal("OK", "No Data Available", "success");
}

}



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
	var classautoid =$("#clautoid").val();
	
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
					data:{'term':classautoid,'periodscount':periodscount,'term':term,'class':classes,'section':section,'monday':Monday,'tuesday':Tuesday,'wednesday':Wednesday,'thursday':Thursday,'friday':Friday,'saturday':Saturday,'sunday':Sunday},
					url:baseurl+'TimetableController/loadWeeklyTimeTable',
					type:"POST",
					dataType:"JSON",
					if(res)
					{ 
						 swal("OK", "Weekly Time Table Saved Successfully", "success");
						 window.location.reload();
						
					}
				});
				swal("OK", "Weekly Time Table Saved Successfully", "success");
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
        
 

</script>    



	
   

        </script>
    </body>
</html>