<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

        <head>
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        </head>
    <!-- END HEAD -->
   
    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            


<?php $userlogin=$this->session->userdata('emis_user_type_id');?>            
<?php if($this->session->userdata('emis_user_type_id') == 3 ) 	
{?>
<?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
<?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 5){ ?>
<?php $this->load->view('state/header.php'); }else{ $this->load->view('header.php'); } ?>


            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <!-- BEGIN CONTAINER -->
                    
                        <!-- BEGIN CONTENT -->
                        <div class="page-content-wrapper">
                            <!-- BEGIN CONTENT BODY -->
                            <!-- BEGIN PAGE HEAD-->
                            <div class="page-head">
                                
                            </div>
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                           
                               
                               
                          

                                    <div class="page-content-inner">
                                       
                                    
                                        

                                           <!-- <div class="m-heading-1 border-green m-bordered">
                                            <h3>Basic Information</h3>
                                        </div> -->
                                     
                                         
                                        <div class="portlet light portlet-fit ">
                                            
                                            <div class="portlet-body">
                                               <div class ="row">
                                                    <div class="col-md-4">
                                                        <font style="color:#dd4b39;">
                                                            <?php echo $this->session->flashdata('errors'); ?>
                                                        </font>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--begin form -->
                                           

                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row"> 
                                                            <!--<div class="col-md-4"> 
                                                                <a href="javascript:;" class="btn btn-sm green add-class-section"> Add Class Section details <i class="fa fa-edit"></i></a>
                                                            </div>
                                                        </div>-->
                                                       

                                                <!-- Add Model -->
<style>
											.select2-container--bootstrap .select2-results__option[aria-selected=true] {
    
}

.select2-container--bootstrap {
    display: block;
   
}
</style>
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
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
<div class="row" style="padding-left: 34px;">
 
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" onclick="openCity(event, 'London')"><b>To Selected Periods</b></a></li>
  <li><a data-toggle="tab" onclick="openCity(event, 'Paris')"><b>To Selected Class</b></a></li>
  <li><a data-toggle="tab" onclick="openCity(event, 'Tokyo')"><b>To Full School</b></a></li>
   <li><a data-toggle="tab" onclick="openCity(event, 'Edit')"><b>Edit Assigned Holidays</b></a></li>
  <li><a data-toggle="tab" onclick="openCity(event, 'Leave')"><b>Assigned Holidays List</b></a></li>
  
</ul>
</div>
<br>

                                                
                                               
                                                </div>
                                               <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i>Assign Holidays
														</div>
                                                        <div class="tools" style="margin-top: 20px;"> </div>
                                                    </div>
                                                    <div class="portlet-body">
													<div id="London" class="tabcontent tab-pane fade in active">
													<div class="row">
														<div class="col-md-2">
                                                     <b>Select Date</b><input type="date" class="form-control" id="perioddate" name="perioddate" placeholder="DD-MM-YYYY"> 
                                                    </div>
													<div class="col-md-4">
                                                     <b>Type Reason</b><input type="text" class="form-control" id="periodreason" name="reason" placeholder="type reason for holidays"> 
                                                    </div>
															<div class="col-md-offset-5 col-md-1">
                                                     <button type="submit"  onclick="saveleaveperiods();"class="btn green" id="emis_stu_searchsep_sub" >Save</button>
                                                    </div>
													
														</div>
														<br>
														<br>
                                                        <table class="table table-striped table-bordered table-hover" id="assignperiods">
                                                            <thead>
                                                                <tr>
																    
                                                                    <th>Class</th>
                                                                    <th>p1</th>
                                                                    <th>p2</th>
																	<th>p3</th>
                                                                    <th>p4</th>
                                                                    <th>p5</th>
                                                                    <th>p6</th>
                                                                    <th>p7</th>
                                                                    <th>p8</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            
                                                               <tr>
															   <?php
															   $i=1;
															   foreach($details as $dt)
																{
																	$classid=$dt->class_id;
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
																<td><?php echo $standard?>-<?php echo $dt->section?></td>
														
                                                        <td><input type="checkbox" name="pone" id="pone<?php echo $i?>" 
														value="firstp<?php echo $i?>" onclick="getfirstperiod(<?php echo $i?>,<?php echo $dt->class_id?>,'<?php echo $dt->section?>','<?php echo $dt->id?>')"></td>
                                                        <td><input type="checkbox" id="ptwo<?php echo $i?>" value="secondp<?php echo $i?>" onclick="getsecondperiod(<?php echo $i?>,<?php echo $dt->class_id?>,'<?php echo $dt->section?>','<?php echo $dt->id?>')"></td>
                                                        <td><input type="checkbox" id="pthree<?php echo $i?>" value="thirdp<?php echo $i?>" onclick="getthirdperiod(<?php echo $i?>,<?php echo $dt->class_id?>,'<?php echo $dt->section?>','<?php echo $dt->id?>')"></td>
                                                        <td><input type="checkbox" id="pfour<?php echo $i?>" value="fourthp<?php echo $i?>" onclick="getfourthperiod(<?php echo $i?>,<?php echo $dt->class_id?>,'<?php echo $dt->section?>','<?php echo $dt->id?>')"></td>
                                                        <td><input type="checkbox" id="pfive<?php echo $i?>" value="fifthp<?php echo $i?>" onclick="getfifthperiod(<?php echo $i?>,<?php echo $dt->class_id?>,'<?php echo $dt->section?>','<?php echo $dt->id?>')"></td>
                                                        <td><input type="checkbox" id="psix<?php echo $i?>" value="sixthp<?php echo $i?>" onclick="getsixthperiod(<?php echo $i?>,<?php echo $dt->class_id?>,'<?php echo $dt->section?>','<?php echo $dt->id?>')"></td>
                                                        <td><input type="checkbox" id="pseven<?php echo $i?>" value="seventhp<?php echo $i?>" onclick="getseventhperiod(<?php echo $i?>,<?php echo $dt->class_id?>,'<?php echo $dt->section?>','<?php echo $dt->id?>')"></td>
                                                        <td><input type="checkbox" id="peight<?php echo $i?>" value="eighthp<?php echo $i?>" onclick="geteighthperiod(<?php echo $i?>,<?php echo $dt->class_id?>,'<?php echo $dt->section?>','<?php echo $dt->id?>')"></td>
                                                               </tr>
															   <?php
															   $i++;
																}
																
																?>
                                                            </tbody>
															
                                                        </table>
														</div>
														<div id="Paris" class="tabcontent">
														<div class="row">
														<div class="col-md-2">
                                                     <b>Select Date</b><input type="date" id="selectdate" name="selectdate" class="form-control" name="assigndate" placeholder="DD-MM-YYYY"> 
                                                    </div>
													<div class="col-md-4">
                                                     <b>Type Reason</b><input type="text" class="form-control" id="selectreason" name="selectreason" placeholder="type reason for holidays"> 
                                                    </div>
															<div class="col-md-offset-5 col-md-1">
                                                     <button type="submit"  onclick="select_class();"class="btn green" id="emis_stu_searchsep_sub" >Save</button>
                                                    </div>
													
														</div>
														<br>
														<br>
														
														 <table class="table table-striped table-bordered table-hover" id="classlist">
                                                            <thead>
                                                                <tr>
                                                                    <th>Class List</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            
                                                               <tr>
															  
															   <?php
															    $i=1;
															   foreach($details as $dt)
																{
                                                                 $classid=$dt->class_id;
                                                                   switch ($classid) 
																   {
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
																	<td onclick="selectedclass(<?php echo $i?>,<?php echo $dt->class_id?>,'<?php echo $dt->section?>','<?php echo $dt->id?>');"><input type="checkbox" name="selectall" id="att<?php echo $i;?>"><?php echo $standard?>-<?php echo $dt->section?></td>
																	
                                                                    
																	
                                                               </tr>
															   <?php
															   $i++;
																}
																?>
                                                            </tbody>
                                                        </table>
														
														 </div>
														 <div id="Tokyo" class="tabcontent">
														<div class="row">
														<div class="col-md-2">
                                                     <b>Select Date</b><input type="date" class="form-control" id="alldate"name="alldate" placeholder="DD-MM-YYYY"> 
                                                    </div>
													<div class="col-md-4">
                                                     <b>Reason for holidays</b><input type="text" class="form-control" id="allreason" name="reason" placeholder="type reason for holidays"> 
                                                    </div>
													<div class="col-md-offset-5 col-md-1">
                                                     <button type="submit"  onclick="assignall();"class="btn green" id="emis_stu_searchsep_sub" >Save</button>
                                                    </div>
														</div>
														<br>
														<br>
														
														
														
														 </div>
														 <div id="Edit" class="tabcontent tab-pane fade in active">
													
                                                        <table class="table table-striped table-bordered table-hover" id="sample_3">
														<!--<div class="row" style="padding-left: 34px;">
 
                                        <ul class="nav nav-tabs">
                                            <li class="active" id="tabset1">
                                                <a data-toggle="tab" onclick="opentag('leave1')"><b>To Selected Periods</b></a>
                                            </li>
                                            <li id="tabset2">
                                                <a data-toggle="tab" onclick="opentag('leave2')"><b>To Selected Class</b></a>
                                            </li>
											<li id="tabset3">
                                                <a data-toggle="tab" onclick="opentag('leave3')"><b>To Full School</b></a>
                                            </li>
											
 
                                        </ul>
                                    </div>-->
                                                           <thead>
                                                                <tr>
                                                                    <th>class - Section</th>
                                                                    <th>Leave Date</th>
																	<th>Reason</th>
																	<th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            
                                                               <tr>
															    <?php
															   $i=1;
															   foreach($leavelistweek as $llw)
																{
                                                                 $classid=$llw->class_id;
                                                                   switch ($classid) 
																   {
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
																<td><?php echo $standard ?>-<?php echo $llw->section?></td>
														         <td><?php echo $llw->leavedate?></td>
                                                                  <td><?php echo $llw->reason?></td>
																   <td><a href="javascript:;" class="btn btn-sm green edit-class-section" id="edit<?php echo $i; ?>"  contenteditable="false" data-class-section-id ="<?php echo $i;  ?>">Edit <!--<i class="fa fa-edit"></i>--></a>
																	 <a href="javascript:;" class="btn btn-sm red delete-class-section" id="deleted<?php echo $i; ?>"  onclick='deleteleave("<?php echo $llw->id;?>");' contenteditable="false" data-class-deleted-id ="<?php echo $i;?>">Delete </a>
																	<span>
																	<button data-id="2" style="display:none;" id="save<?php echo $i;  ?>" class="btn btn-sm green save-class-section" onclick='saveupdate("<?php echo $llw->id;?>");' contenteditable="false">save</button>
																	<button data-id="3"  style="display:none; margin-left: 72px margin-top: -54px"; id="cancel<?php echo $i; ?>" class="btn btn-sm red cancel-class-section" onclick="cancel(<?php echo $i?>)">cancel</button>
																   </span>
                                                                    </td>
																  
                                                               </tr>
															   <?php
															   $i++;
																}
																
																?>
                                                            </tbody>
															
                                                        </table>
														</div>
														 <div id="Leave" class="tabcontent tab-pane fade in active">
													
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th>class - Section</th>
                                                                    <th>Leave Date</th>
																	<th>Reason </th>
                                                                   
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            
                                                               <tr>
															    <?php
															   $i=1;
															   foreach($leavelist as $ll)
																{
                                                               $classid=$ll->class_id;
                                                                   switch ($classid) 
																   {
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
																<td><?php echo $standard ?>-<?php echo $ll->section?></td>
														         <td><?php echo $ll->leavedate?></td>
                                                                  <td><?php echo $ll->reason?></td>
                                                               </tr>
															   <?php
															   $i++;
																}
																
																?>
                                                            </tbody>
															
                                                        </table>
														</div>
														
																		</div>
																		
                                                    </div>
													
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                         
           
                             

                                    </div>
                                    <!-- END PAGE CONTENT INNER -->
                                </div>
                          
                            <!-- END PAGE CONTENT BODY -->
                            <!-- END CONTENT BODY -->
                       

                        <!-- END QUICK SIDEBAR -->
                    </div>
                    <!-- END CONTAINER -->
                
            </div>

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
        <!-- END PAGE LEVEL SCRIPTS -->
        
        <script type="text/javascript">

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
function opentag(cityName) {
 
  var i;
  var x = document.getElementsByClassName("tabcontent");
  for(i=0;i<x.length;i++){
    x[i].style.display = "none";
  }
  document.getElementById(cityName).style.display ="block";
}
function toggle(source) {
  checkboxes = document.getElementsByName('classselect');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
 var periodsone=[];
function getfirstperiod(i,classid,section,id)
{
	
	classsection=classid+'-'+section+'-'+id;
    var x = document.getElementById('pone'+i).checked;	
	if(x==true)
	{
	 i = parseInt(i-1);
	 var row = $("#assignperiods").find('tbody').find('tr:eq('+i+')');
	 $(row).css('color', '#f00');
	 $(row).attr("contenteditable", false); 
	 periodsone[i] =classsection;
	}
	
	else
	{
	i = parseInt(i-1);
	var row = $("#assignperiods").find('tbody').find('tr:eq('+i+')');
	$(row).css('color', 'black');
    periodsone.splice(i,1);
    }
	console.log(periodsone);
}
var periodstwo=[];
function getsecondperiod(i,classid,section,id)
{
	
	classsection=classid+'-'+section+'-'+id;
    var x = document.getElementById('ptwo'+i).checked;	
	if(x==true)
	{
	 i = parseInt(i-1);
	 var row = $("#assignperiods").find('tbody').find('tr:eq('+i+')');
	 $(row).css('color', '#f00');
	 $(row).attr("contenteditable", false); 
	 periodstwo[i] =classsection;
	}
	else
	{
	i = parseInt(i-1);
	var row = $("#assignperiods").find('tbody').find('tr:eq('+i+')');
	$(row).css('color', 'black');
    periodstwo.splice(i,1);
    }
	
}
var periodsthree=[];
function getthirdperiod(i,classid,section,id)
{
	
	classsection=classid+'-'+section+'-'+id;
    var x = document.getElementById('pthree'+i).checked;	
	if(x==true)
	{
	 i = parseInt(i-1);
	 var row = $("#assignperiods").find('tbody').find('tr:eq('+i+')');
	 $(row).css('color', '#f00');
	 $(row).attr("contenteditable", false); 
	 periodsthree[i] =classsection;
	}
	else
	{
	i = parseInt(i-1);
	var row = $("#assignperiods").find('tbody').find('tr:eq('+i+')');
	$(row).css('color', 'black');
    periodsthree.splice(i,1);
    }
	
}
var periodsfour=[];
function getfourthperiod(i,classid,section,id)
{
	
	classsection=classid+'-'+section+'-'+id;
    var x = document.getElementById('pfour'+i).checked;	
	if(x==true)
	{
	 i = parseInt(i-1);
	 var row = $("#assignperiods").find('tbody').find('tr:eq('+i+')');
	 $(row).css('color', '#f00');
	 $(row).attr("contenteditable", false); 
	 periodsfour[i] =classsection;
	}
	else
	{
	i = parseInt(i-1);
	var row = $("#assignperiods").find('tbody').find('tr:eq('+i+')');
	$(row).css('color', 'black');
    periodsfour.splice(i,1);
    }
	
}
var periodsfive=[];
function getfifthperiod(i,classid,section,id)
{
	
	classsection=classid+'-'+section+'-'+id;
    var x = document.getElementById('pfive'+i).checked;	
	if(x==true)
	{
	 i = parseInt(i-1);
	 var row = $("#assignperiods").find('tbody').find('tr:eq('+i+')');
	 $(row).css('color', '#f00');
	 $(row).attr("contenteditable", false); 
	 periodsfive[i] =classsection;
	}
	else
	{
	i = parseInt(i-1);
	var row = $("#assignperiods").find('tbody').find('tr:eq('+i+')');
	$(row).css('color', 'black');
    periodsfive.splice(i,1);
    }
	console.log(periodsfive);
}
var periodssix=[];
function getsixthperiod(i,classid,section,id)
{
	
	classsection=classid+'-'+section+'-'+id;
    var x = document.getElementById('psix'+i).checked;	
	if(x==true)
	{
	 i = parseInt(i-1);
	 var row = $("#assignperiods").find('tbody').find('tr:eq('+i+')');
	 $(row).css('color', '#f00');
	 $(row).attr("contenteditable", false); 
	 periodssix[i] =classsection;
	}
	else
	{
	i = parseInt(i-1);
	var row = $("#assignperiods").find('tbody').find('tr:eq('+i+')');
	$(row).css('color', 'black');
    periodssix.splice(i,1);
    }
	
}
var periodsseven=[];
function getseventhperiod(i,classid,section,id)
{
	
	classsection=classid+'-'+section+'-'+id;
    var x = document.getElementById('pseven'+i).checked;	
	if(x==true)
	{
	 i = parseInt(i-1);
	 var row = $("#assignperiods").find('tbody').find('tr:eq('+i+')');
	 $(row).css('color', '#f00');
	 $(row).attr("contenteditable", false); 
	 periodsseven[i] =classsection;
	}
	else
	{
	i = parseInt(i-1);
	var row = $("#assignperiods").find('tbody').find('tr:eq('+i+')');
	$(row).css('color', 'black');
    periodsseven.splice(i,1);
    }
	
}
var periodseight=[];
function geteighthperiod(i,classid,section,id)
{
	
	classsection=classid+'-'+section+'-'+id;
    var x = document.getElementById('peight'+i).checked;	
	if(x==true)
	{
	 i = parseInt(i-1);
	 var row = $("#assignperiods").find('tbody').find('tr:eq('+i+')');
	 $(row).css('color', '#f00');
	 $(row).attr("contenteditable", false); 
	 periodseight[i] =classsection;
	}
	else
	{
	i = parseInt(i-1);
	var row = $("#assignperiods").find('tbody').find('tr:eq('+i+')');
	$(row).css('color', 'black');
    periodseight.splice(i,1);
    }
	
}
function saveleaveperiods()
{
	var holidaysdate =$("#perioddate").val();
		
   $.ajax(
    {
        type: "POST",
        url:baseurl+'TimetableController/get_leave_details',
        data:{'holidays_date':holidaysdate},
        success: function(resp){
        // alert(resp);  
       
        var leavedate = JSON.parse(resp);
		 $.each(leavedate,function(id,val)
        {
            leavedate=val.leavedate;
			
        })
		if(holidaysdate==leavedate)
		{
			swal("OK","Already Full School Leave On This Date", "success");
			return false;
		}
		else
		{
			var reason=$("#periodreason").val();
	if(holidaysdate=='' || reason=='')
	{
	swal("OK", "Please select Date and Reason", "error");
    return false;	
	}
	else
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
					data:{'holidays_date':holidaysdate,'reason':reason,'first':first,'second':second,'third':third,'four':four,'five':five,'six':six,'seven':seven,'eight':eight},
					url:baseurl+'TimetableController/Assignholidays_school_selectedperiod',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						swal("OK", "Holidays Assigned Particular Class and Particular Periods Successfully", "success");
						window.location.reload();
						//$("#Tokyo").show();
					}
					
				});
				swal("OK", "Holidays Assigned Particular Class and Particular Periods Successfully", "success");
						window.location.reload();
	}		
		}
        
         },
          
    })	
	
}
var classlist=[];
function selectedclass(i,classid,section,masterid)
{
	
	classsection=classid+'-'+section+'-'+masterid;
	console.log(classsection);
	//return false;
	var x = document.getElementById('att'+i).checked;
	
	if(x==true)
	{
	i = parseInt(i-1);
	var row = $("#classlist").find('tbody').find('tr:eq('+i+')');
	 $(row).css('color', '#f00');
	 $(row).attr("contenteditable", false); 
	 classlist[i] =classsection;
	}
	else
	{
	i = parseInt(i-1);
	var row = $("#classlist").find('tbody').find('tr:eq('+i+')');
	$(row).css('color', 'black');
    classlist.splice(i,1);
    }
	
}
function select_class()
       {
	var holidaysdate =$("#selectdate").val();
	var reason=$("#selectreason").val();
	if(holidaysdate=='' || reason=='')
	{
	swal("OK", "Please select Date and Reason", "error");	
	}
	else
	{
	var selectedclass=classlist;
	
	$.ajax(
	          {
					data:{'selected_class':selectedclass,'holidays_date':holidaysdate,'reason':reason},
					url:baseurl+'TimetableController/Assignholidays_school_selectedclass',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						swal("OK", "Holidays Assigned Particular Class Successfully", "success");
						window.location.reload();
						//$("#Tokyo").show();
					}
				});
	}		
	   }
	   
      
function assignall()
       {
	var holidaysdate =$("#alldate").val();
	var reason=$("#allreason").val();
	if(holidaysdate=='' || reason=='')
	{
	swal("OK", "Please select Date and Reason", "error");	
	return false;
	}
	else
	{
	$.ajax(
				{
					data:{'holidays_date':holidaysdate,'reason':reason},
					url:baseurl+'TimetableController/Assignholidays_school',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						
						swal("OK", "Holidays Assigned Successfully", "success");
						window.location.reload();
						$("#Tokyo").show();
					}
				});
	}			
        }		
   
$(document).ready(function(){
	 $("#London").show();
	
	  })
 var local_i =-1;	  
 $("#sample_3 tbody").on('click', '.edit-class-section', function(e) {
	
     index =  $(this).closest('tr').index();
		var save = $(this).closest('tr').children('td').find('button').attr('id');
		var cancel = $(this).closest('tr').children('td').find('.cancel-class-section').attr('id');
		var class_id = $(this).closest('tr').children('td').find('input').attr('id');
		
         var edit =  $(this).attr("id"); 
		 var deleted =  $(this).closest('tr').children('td').find('.delete-class-section').attr('id'); 
		if(local_i!=-1){
		   // $("#edit"+local_i).show();
           // $("#save"+local_i).hide();
            $('#sample_3').find('tbody').find('tr').eq(local_i).find('td').eq(0).text(classsection);
            $('#sample_3').find('tbody').find('tr').eq(local_i).find('td').eq(1).text(leavedate);
            $('#sample_3').find('tbody').find('tr').eq(local_i).find('td').eq(2).text(reason);
            
         }
		classsection =  $('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(0).text();
		leavedate =  $('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(1).text();
		reason =  $('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(2).text();
		
		
		 $('#'+deleted).hide();
		 $('#'+edit).hide();
         $('#'+save).show();
		 $('#'+cancel).show();
	   var classid = '<input type="text" id="classid"  onKeypress="return isNumberKey(event);"; class="form-control" value="" readonly>';
	  var leave_date = '<input type="date" id="leavedate"  onKeypress="return isNumberKey(event);"; class="form-control" value="" >';
	  var leave_reason = '<input type="text" id="leavereason" onKeypress="return isNumberKey(event);"; class="form-control" value="" >';
	   
		$('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(0).html(classid);
		$('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(1).html(leave_date);
		$('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(2).html(leave_reason);
		
		$("#classid").val(classsection);
		$("#leavedate").val(leavedate);
		$("#leavereason").val(reason);
		
		$(this).prop("id","edit"+local_i);
        $(this).closest('tr').children('td').find('span').prop('id','save'+local_i);
		local_i = index;
          
      });
	    $("#sample_3 tbody").on('click','.cancel-class-section', function(e) {
		  location.reload();
	   });
	   
	function saveupdate(updateid)  
		 {
			
        var classsection = $("#classid").val();
		var updateid = updateid;
		alert(updateid);
        var leavedate =$("#leavedate").val();	
        var leavereason=$("#leavereason").val();
		alert(classsection);
		alert(leavedate);
		alert(leavereason);
		return false;
	   var records = {'updateid':updateid,'classid':standard,'section':section,'groupname':groupname,'aidedoption':aidedcheckbox,'medium':medium};
				$.ajax(
				{
					data:{'records':records},
					url:baseurl+'section/emis_school_class_section_update',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						swal("OK", "Class Updated Successfully", "success");
						window.location.reload();
					}
				});
		 
		 
		 }  
function deleteleave(id)
{
	did=id;
	$.ajax(
				{
					data:{'deleteid':did},
					url:baseurl+'TimetableController/deleteleave',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						swal("OK", "Assigned Leave Deleted Successfully", "success");
						window.location.reload();
					}
				});
}
		 
	   
	 
		function isNumberKey(evt)
       {
		  
          var charCode = (evt.which) ? evt.which : evt.keyCode;
           if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122)) {
        return false;
    }

          return true;
       }
      

        </script>



    </body>

</html>