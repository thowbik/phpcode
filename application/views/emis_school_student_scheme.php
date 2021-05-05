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
                                                
                                                <center>
                                                  <form id="filter" method="post" action="<?php echo base_url().'Home/get_student_scheme_list';?>">
												   
                                                    <div class="form-group">
                                                    <div class="row">
													                    <!--<div class="col-md-3" >  
                                                          <select style="width: 90%;" class="form-control" class="center" onchange="get_scholor();"  tabindex="1" id="schemeid" name="schemeid"   required="" >
                                                               	
                                                                <option value="0">Select scheme</option>
                                                                <option value="1">NMMS Scheme</option>
																<option value="2">TRSTSE Scholarship Scheme</option>
																<option value="3">Inspire Award Details</option>
																<option value="4">Students Sports Participation</option>
                                                               </select> 
															   
                                                         </div>-->
													<input type="hidden"  id="schemeidform" name="schemeidform" value="<?php echo $schemeid;?>">	
													 <div class="col-md-3">  
                                                          <select style="width: 90%;" class="form-control" onchange="get_section();" data-placeholder="Choose a Category" tabindex="1" id="classno" name="classno"  style="width: 30%" required="" >
                                                               	
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
                                                          <select style="width: 90%;" class="form-control" data-placeholder="Choose a Category" tabindex="1" id="sectionname" name="sectionname"  style="width: 60%" required="" >
                                                              
                                                               
                                                               </select> 
                                                        
                                                    </div>
													<div class="col-md-2">
                                                     <button type="submit"  class="btn green" id="emis_stu_searchsep_sub" >SUBMIT</button>
                                                    </div>
													</div>
                                                    </form>
												</center>
													
                                              
                                                </div>

                                             
                                             



                                               


                                               <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i>Scholarship and Sports Participation</div>
                                                        <div class="tools" style="margin-top: 20px;"> </div>
                                                    </div>
                                                    <div class="portlet-body">
													<div id="national_scheme" class="national_scheme">
                                                        <table class="table table-striped table-bordered table-hover" id="national_scheme">
                                                            <thead>
                                                                <tr>
																   
																   <th>Student Id</th>
                                                                    <th>Student Name</th>
                                                                    <th style="width:15%;">Gender</th>
                                                                    <th style="width:15%;" >Class Studying</th>
																	<th style="width:20%;">NMMS Exam Passed on</th>
																
                                                                    <th style="width:25%;">Action</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
															<?php
                                                            $i=1;
															if(!empty($nmms_search))
															{
                                                              foreach($nmms_search as $sd)
															   {
																   ?>
                                                               <tr>
															        
                                                                    <td><?php echo $sd->unique_id_no;?></td> 
                                                                    <td><?php echo $sd->name;?></td>
																	<?php 
																	if($sd->gender==1)
																	{
																		?>
																	<td>Male</td>
																	<?php 
																	}
																	?>
																	<?php 
																	if($sd->gender==2)
																	{
																		?>
																	<td>Female</td>
																	<?php 
																	}
																	?>
																	<?php 
																	if($sd->gender==3)
																	{
																		?>
																	<td>Others</td>
																	<?php 
																	}
																	?>
                                                                    <td><?php echo $sd->class_studying_id;?>-<?php echo $sd->class_section;?></td>
                                                                    <td><?php echo $sd->nmmsexam_passed; ?></td>
                                                                     <td><a href="javascript:;" class="btn btn-sm green edit-class-section" id="edit<?php echo $i; ?>"  contenteditable="false" data-class-section-id ="<?php echo $i;  ?>">Edit / Update <!--<i class="fa fa-edit"></i>--></a>
																	 <a href="javascript:;" class="btn btn-sm red delete-class-section" id="deleted<?php echo $i; ?>"  onclick='deletenmms(<?php echo $sd->id;?>);' contenteditable="false" data-class-deleted-id ="<?php echo $i;?>">Delete </a>
																	<span>
																	<button data-id="2" style="display:none;" id="save<?php echo $i;  ?>" class="btn btn-sm green save-class-section" onclick="savenational(<?php echo $d->id;?>)" contenteditable="false">save</button>
																	<button data-id="3"  style="display:none; margin-left: 72px margin-top: -54px"; id="cancel<?php echo $i; ?>" class="btn btn-sm red cancel-class-section" onclick="cancel(<?php echo $i?>)">cancel</button>
																   </span>
                                                                    </td>
                                                               </tr>
															   <?php  $i++; }
															  
															}
															
                                                            $i=2;
															if(!empty($nmms))
															{
                                                              foreach($nmms as $nms)
															   {
																   ?>
                                                               <tr>
															        
                                                                    <td><?php echo $nms->student_id;?></td> 
                                                                    <td><?php echo $nms->name;?></td>
																	<?php 
																	if($nms->gender==1)
																	{
																		?>
																	<td>Male</td>
																	<?php 
																	}
																	?>
																	<?php 
																	if($nms->gender==2)
																	{
																		?>
																	<td>Female</td>
																	<?php 
																	}
																	?>
																	<?php 
																	if($nms->gender==3)
																	{
																		?>
																	<td>Others</td>
																	<?php 
																	}
																	?>
                                                                    <td><?php echo $nms->class_studying_id;?>-<?php echo $nms->class_section;?></td>
                                                                    <td><?php echo $nms->nmmsexam_passed;?></td>
                                                                     <td><a href="javascript:;" class="btn btn-sm green edit-class-section" id="edit<?php echo $i; ?>"  contenteditable="false" data-class-section-id ="<?php echo $i;  ?>">Edit / Update <!--<i class="fa fa-edit"></i>--></a>
																	 <a href="javascript:;" class="btn btn-sm red delete-class-section" id="deleted<?php echo $i; ?>"  onclick='deletenmms(<?php echo $nms->id;?>);' contenteditable="false" data-class-deleted-id ="<?php echo $i;?>">Delete </a>
																	<span>
																	<button data-id="2" style="display:none;" id="save<?php echo $i;  ?>" class="btn btn-sm green save-class-section" onclick="savenational(<?php echo $nms->id;?>)" contenteditable="false">save</button>
																	<button data-id="3"  style="display:none; margin-left: 72px margin-top: -54px"; id="cancel<?php echo $i; ?>" class="btn btn-sm red cancel-class-section" onclick="cancel(<?php echo $i?>)">cancel</button>
																   </span>
                                                                    </td>
                                                               </tr>
															   <?php  $i++; }
															  
															}
															
															else
															{
																?>
                                                             <p>No Data Available</p>
															 <?php
															}
															   ?>
                                                            </tbody>
															
                                                        </table>
														 
														 <!--<div class="row">
															   <div class="col-md-offset-10 col-md-2">
													  					<a href="javascript:;" 
                                                                           class="btn btn-sm red add_another" style="margin-left: -17px;"
                                                                           data-class-section-id ="<?php echo $d->id;  ?>" > 
                                                                             Final Submit &nbsp;<i class="fa fa-plus-o "></i>
                                                                        </a>
																		</div>
																		</div>--> 
																		</div>
																		<div id="state_scheme" class="state_scheme">
                                                        <table class="table table-striped table-bordered table-hover" id="state_scheme">
                                                            <thead>
                                                                <tr>
																  
																   <th style="display:none"> School Id</th>
																   <th>Student Id</th>
                                                                    <th>Student Name</th>
                                                                    <th >Gender</th>
                                                                    <th style="width:15%;" >Class Studying</th>
																	
																	<th style="width:20%;">TRSTSE Exam Passed on</th>
																
                                                                    <th style="width:25%;">Action</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                             <tbody>
															<?php
                                                            $i=1;
															if(!empty($trstse_search))
															{
                                                              foreach($trstse_search as $state)
															   {
																   ?>
                                                               <tr>
                                                                    <td><?php echo $state->unique_id_no;?></td> 
                                                                    <td><?php echo $state->name;?></td>
																	<?php 
																	if($state->gender==1)
																	{
																		?>
																	<td>Male</td>
																	<?php 
																	}
																	?>
																	<?php 
																	if($state->gender==2)
																	{
																		?>
																	<td>Female</td>
																	<?php 
																	}
																	?>
																	<?php 
																	if($state->gender==3)
																	{
																		?>
																	<td>Others</td>
																	<?php 
																	}
																	?>
                                                                    <td><?php echo $state->class_studying_id;?>-<?php echo $sd->class_section;?></td>
                                                                    <td><?php echo $state->trstseexam_passed; ?></td>
                                                                     <td><a href="javascript:;" class="btn btn-sm green editstate-class-section" id="editstate<?php echo $i; ?>"  contenteditable="false" data-class-section-id ="<?php echo $i;  ?>">Edit / Update <!--<i class="fa fa-edit"></i>--></a>
																	 <a href="javascript:;" class="btn btn-sm red deletestate-class-section" id="deletedstate<?php echo $i; ?>"  onclick='deletetrstse(<?php echo $state->id;?>);'  contenteditable="false" data-class-deletedstate-id ="<?php echo $i;?>">Delete </a>
																	<span>
																	<button data-id="2" style="display:none;" id="savestate<?php echo $i;  ?>" class="btn btn-sm green savestate-class-section" onclick="savestate(<?php echo $d->id;?>)" contenteditable="false">save</button>
																	<button data-id="3"  style="display:none; margin-left: 72px margin-top: -54px"; id="cancelstate<?php echo $i; ?>" class="btn btn-sm red cancelstate-class-section" onclick="cancel(<?php echo $i?>)">cancel</button>
																   </span>
                                                                    </td>
                                                               </tr>
															   <?php $i++; }
															   
															}
															
                                                            $i=2;
															if(!empty($trstse))
															{
                                                              foreach($trstse as $state1)
															   {
																   ?>
                                                               <tr>
                                                                    <td><?php echo $state1->student_id;?></td> 
                                                                    <td><?php echo $state1->name;?></td>
																	<?php 
																	if($state1->gender==1)
																	{
																		?>
																	<td>Male</td>
																	<?php 
																	}
																	?>
																	<?php 
																	if($state1->gender==2)
																	{
																		?>
																	<td>Female</td>
																	<?php 
																	}
																	?>
																	<?php 
																	if($state1->gender==3)
																	{
																		?>
																	<td>Others</td>
																	<?php 
																	}
																	?>
                                                                    <td><?php echo $state1->class_studying_id;?>-<?php echo $state1->class_section;?></td>
                                                                    <td><?php echo $state1->trstseexam_passed; ?></td>
                                                                     <td><a href="javascript:;" class="btn btn-sm green editstate-class-section" id="editstate<?php echo $i; ?>"  contenteditable="false" data-class-section-id ="<?php echo $i;  ?>">Edit / Update <!--<i class="fa fa-edit"></i>--></a>
																	 <a href="javascript:;" class="btn btn-sm red deletestate-class-section" id="deletedstate<?php echo $i; ?>"  onclick='deletetrstse(<?php echo $state->id;?>);'  contenteditable="false" data-class-deletedstate-id ="<?php echo $i;?>">Delete </a>
																	<span>
																	<button data-id="2" style="display:none;" id="savestate<?php echo $i;  ?>" class="btn btn-sm green savestate-class-section" onclick="savestate(<?php echo $state1->id;?>)" contenteditable="false">save</button>
																	<button data-id="3"  style="display:none; margin-left: 72px margin-top: -54px"; id="cancelstate<?php echo $i; ?>" class="btn btn-sm red cancelstate-class-section" onclick="cancel(<?php echo $i?>)">cancel</button>
																   </span>
                                                                    </td>
                                                               </tr>
															   <?php $i++; }
															   
															}

															else
															{
																?>
                                                             <p>No Data Available</p>
															 <?php
															}
															   ?>
                                                            </tbody>
															
                                                        </table>
														 
														 <!--<div class="row">
															   <div class="col-md-offset-10 col-md-2">
													  					<a href="javascript:;" 
                                                                           class="btn btn-sm green add_another" style="margin-left: -17px;"
                                                                           data-class-section-id ="<?php echo $d->id;  ?>" > 
                                                                             Add Class Section &nbsp;+<i class="fa fa-plus-o "></i>
                                                                        </a>
																		</div>
																		</div>--> 
																		</div>
																		<div id="inspire_award" class="inspire_award" style="width:100%;">
                                                        <table class="table table-striped table-bordered table-hover" id="inspire_award" >
                                                            <thead>
                                                                <tr>
																  
																    <th style="display:none"> School Id</th>
																    <th>Student ID</th>
                                                                    <th>Student Name</th>
                                                                    <th>Gender</th>
                                                                    <th>Class Studying</th>
																	<th>Community</th>
																    <th style="width:10%">Exhibition <br> Title</th>
																	 <th style="width:10%">Award Winner<br>Announcement Details</th>
																	 <th style="width:10%">Date of issue of the Award</th>
                                                                    <th style="width:20%">Action</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $i=1;
															if(!empty($inspire_search))
															{
                                                              foreach($inspire_search as $ip)
															   {
																   ?>
                                                               <tr>
                                                                    <td><?php echo $ip->unique_id_no;?></td> 
                                                                    <td><?php echo $ip->name;?></td>
																	<?php 
																	if($ip->gender==1)
																	{
																		?>
																	<td>Male</td>
																	<?php 
																	}
																	?>
																	<?php 
																	if($ip->gender==2)
																	{
																		?>
																	<td>Female</td>
																	<?php 
																	}
																	?>
																	<?php 
																	if($ip->gender==3)
																	{
																		?>
																	<td>Others</td>
																	<?php 
																	}
																	?>
                                                                    <td><?php echo $ip->class_studying_id;?>-<?php echo $sd->class_section;?></td>
																	<td><?php echo $ip->community_name;?></td>
																	<td><?php echo $ip->title;?></td>
																	<td><?php echo $ip->award_details;?></td>
																	<td><?php echo $ip->award_issue_date;?></td>
                                                                     <td><a href="javascript:;" class="btn btn-sm green editinspire-class-section" id="editinspire<?php echo $i; ?>"  contenteditable="false" data-class-section-id ="<?php echo $i;  ?>">Edit / Update <!--<i class="fa fa-edit"></i>--></a>
																	 <a href="javascript:;" class="btn btn-sm red deleteinspire-class-section" id="deletedinspire<?php echo $i; ?>"  onclick='deleteinspire("<?php echo $ip->id;?>","<?php echo $d->section;?>","<?php echo $classid;?>");' contenteditable="false" data-class-deleted-id ="<?php echo $i;?>">Delete </a>
																	<span>
																	<button data-id="2" style="display:none;" id="saveinspire<?php echo $i;  ?>" class="btn btn-sm green saveinspire-class-section" onclick="saveinspire(<?php echo $d->id;?>)" contenteditable="false">save</button>
																	<button data-id="3"  style="display:none; margin-left: 72px margin-top: -54px"; id="cancelinspire<?php echo $i; ?>" class="btn btn-sm red cancelinspire-class-section" onclick="cancelinspire(<?php echo $i?>)">cancel</button>
																   </span>
                                                                    </td>
                                                               </tr>
															    <?php $i++; }
															   
															}
                                                            $i=2;
															if(!empty($inspire))
															{
                                                              foreach($inspire as $ip1)
															   {
																   ?>
                                                               <tr>
                                                                    <td><?php echo $ip1->student_id;?></td> 
                                                                    <td><?php echo $ip1->name;?></td>
																	<?php 
																	if($ip1->gender==1)
																	{
																		?>
																	<td>Male</td>
																	<?php 
																	}
																	?>
																	<?php 
																	if($ip1->gender==2)
																	{
																		?>
																	<td>Female</td>
																	<?php 
																	}
																	?>
																	<?php 
																	if($ip1->gender==3)
																	{
																		?>
																	<td>Others</td>
																	<?php 
																	}
																	?>
                                                                    <td><?php echo $ip1->class_studying_id;?>-<?php echo $ip1->class_section;?></td>
																	<td><?php echo $ip1->community_name;?></td>
																	<td><?php echo $ip1->title;?></td>
																	<td><?php echo $ip1->award_details;?></td>
																	<td><?php echo $ip1->award_issue_date;?></td>
                                                                    <td><a href="javascript:;" class="btn btn-sm green editinspire-class-section" id="editinspire<?php echo $i; ?>"  contenteditable="false" data-class-section-id ="<?php echo $i;  ?>">Edit / Update <!--<i class="fa fa-edit"></i>--></a>
																	 <a href="javascript:;" class="btn btn-sm red deleteinspire-class-section" id="deletedinspire<?php echo $i; ?>"  onclick='deleteinspire("<?php echo $ip->id;?>","<?php echo $d->section;?>","<?php echo $classid;?>");' contenteditable="false" data-class-deleted-id ="<?php echo $i;?>">Delete </a>
																	<span>
																	<button data-id="2" style="display:none;" id="saveinspire<?php echo $i;  ?>" class="btn btn-sm green saveinspire-class-section" onclick="saveinspire(<?php echo $ip1->id;?>)" contenteditable="false">save</button>
																	<button data-id="3"  style="display:none; margin-left: 72px margin-top: -54px"; id="cancelinspire<?php echo $i; ?>" class="btn btn-sm red cancelinspire-class-section" onclick="cancelinspire(<?php echo $i?>)">cancel</button>
																   </span>
                                                                    </td>
                                                               </tr>
															    <?php $i++; }
															   
															}
															else
															{
																?>
                                                             <p>No Data Available</p>
															 <?php
															}
															   ?>
                                                            </tbody>
															
                                                        </table>
														 
														 <!--<div class="row">
															   <div class="col-md-offset-10 col-md-2">
													  					<a href="javascript:;" 
                                                                           class="btn btn-sm green add_another" style="margin-left: -17px;"
                                                                           data-class-section-id ="<?php echo $d->id;  ?>" > 
                                                                             Add Class Section &nbsp;+<i class="fa fa-plus-o "></i>
                                                                        </a>
																		</div>
																		</div>--> 
																		</div>
																		<div id="sports_details" class="sports_details">
                                                        <table class="table table-striped table-bordered table-hover" id="sports_award">
                                                            <thead>
                                                                <tr>
																  
																    <th style="display:none"> School Id</th>
																    <th>Student Id</th>
                                                                    <th>Student Name</th>
                                                                    <th style="width: 7%;">Gender</th>
                                                                    <th>Class Studying</th>
																	<th>Game Participating</th>
																    <th>Participating <br>Date</th>
																	<th style="width:10%;">Played Level</th>
																	 <th style="width:10%;">If Winner in any<br>Level, Details</th>
                                                                    <th style="width:18%;">Action</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $i=1;
															if(!empty($sports_search))
															{
                                                              foreach($sports_search as $sp)
															   {
																   ?>
                                                               <tr>
                                                                    <td><?php echo $sp->unique_id_no;?></td> 
                                                                    <td><?php echo $sp->name;?></td>
																	<?php 
																	if($sp->gender==1)
																	{
																		?>
																	<td>Male</td>
																	<?php 
																	}
																	?>
																	<?php 
																	if($sp->gender==2)
																	{
																		?>
																	<td>Female</td>
																	<?php 
																	}
																	?>
																	<?php 
																	if($sp->gender==3)
																	{
																		?>
																	<td>Others</td>
																	<?php 
																	}
																	?>
                                                                    <td><?php echo $sp->class_studying_id;?>-<?php echo $sd->class_section;?></td>
																	<td><?php echo $sp->game_participating;?></td>
																	<td><?php echo $sp->last_participating_date;?></td>
																	<td><?php echo $sp->last_participating_level;?></td>
																	<td><?php echo $sp->winner_level_details;?></td>
																	
                                                                     <td><a href="javascript:;" class="btn btn-sm green editsports-class-section" id="editsports<?php echo $i; ?>"  contenteditable="false" data-class-section-id ="<?php echo $i;  ?>">Edit / Update</a>
																	
																	 <a href="javascript:;" class="btn btn-sm red deletesports-class-section" id="deletedsports<?php echo $i; ?>"  onclick='deletesports("<?php echo $d->id;?>","<?php echo $d->section;?>","<?php echo $classid;?>");' contenteditable="false" datasports-class-deleted-id ="<?php echo $i;?>">Delete</a>
																	<span>
																	<button data-id="2" style="display:none;" id="savesports<?php echo $i;  ?>" class="btn btn-sm green savesports-class-section" onclick="savesports(<?php echo $d->id;?>)" contenteditable="false">Save</button>
																	<button data-id="3"  style="display:none;" id="cancelsports<?php echo $i; ?>" class="btn btn-sm red cancelsports-class-section" onclick="cancel(<?php echo $i?>)">Cancel</button>
																   </span>
                                                                    </td>
                                                               </tr>
															   <?php $i++; }
															   
															}
															
                                                            $i=2;
															if(!empty($sports))
															{
                                                              foreach($sports as $sp1)
															   {
																  
																   ?>
                                                               <tr>
                                                                    <td><?php echo $sp1->student_id;?></td> 
                                                                    <td><?php echo $sp1->name;?></td>
																	<?php 
																	if($sp1->gender==1)
																	{
																		?>
																	<td>Male</td>
																	<?php 
																	}
																	?>
																	<?php 
																	if($sp1->gender==2)
																	{
																		?>
																	<td>Female</td>
																	<?php 
																	}
																	?>
																	<?php 
																	if($sp1->gender==3)
																	{
																		?>
																	<td>Others</td>
																	<?php 
																	}
																	?>
                                                                    <td><?php echo $sp1->class_studying_id;?>-<?php echo $sp1->class_section;?></td>
																	<td><?php echo $sp1->sport_name;?></td>
																	<td><?php echo $sp1->last_participating_date;?></td>
																	<td><?php echo $sp1->participating_level;?></td>
																	<td><?php echo $sp1->winner_level_details;?></td>
                                                                     <td><a href="javascript:;" class="btn btn-sm green editsports-class-section" id="editsports<?php echo $i; ?>"  contenteditable="false" data-class-section-id ="<?php echo $i;  ?>">Edit /Update</a>
																	
																	 <a href="javascript:;" class="btn btn-sm red deletesports-class-section" id="deletedsports<?php echo $i; ?>"  onclick='deletesports("<?php echo $d->id;?>","<?php echo $d->section;?>","<?php echo $classid;?>");' contenteditable="false" datasports-class-deleted-id ="<?php echo $i;?>">Delete</a>
																	<span>
																	<button data-id="2" style="display:none;" id="savesports<?php echo $i;  ?>" class="btn btn-sm green savesports-class-section" onclick="savesports(<?php echo $sp1->id;?>)" contenteditable="false">Save</button>
																	<button data-id="3"  style="display:none;" id="cancelsports<?php echo $i; ?>" class="btn btn-sm red cancelsports-class-section" onclick="cancel(<?php echo $i?>)">Cancel</button>
																   </span>
                                                                    </td>
                                                               </tr>
															   <?php $i++; }
															   
															}
															else
															{
																?>
                                                             <p>No Data Available</p>
															 <?php
															}
															   ?>
                                                            </tbody>
															
                                                        </table>
														 
														 <!--<div class="row">
															   <div class="col-md-offset-10 col-md-2">
													  					<a href="javascript:;" 
                                                                           class="btn btn-sm green add_another" style="margin-left: -17px;"
                                                                           data-class-section-id ="<?php echo $d->id;  ?>" > 
                                                                             Add Class Section &nbsp;+<i class="fa fa-plus-o "></i>
                                                                        </a>
																		</div>
																		</div>--> 
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
	
$(document).ready(function(){
	$("#schemeid").select2({closeOnSelect:false});
	$("#save").hide();
	$("#cancel").hide();
	  })
	schemeid=$("#schemeidform").val();
	if(schemeid==0)
	{
    $(".state_scheme").hide();
	$('.national_scheme').hide();
	$('.sports_details').hide();
	$('.inspire_award').hide();
		
	}
	get_scheme(schemeid);
	
function get_scheme(schemeid) 
{
	
	if(schemeid==1)
	{
	 $('.national_scheme').show();
	 $('.state_scheme').hide();	
	 $('.sports_details').hide();	
	  $('.inspire_award').hide();	
	}
	else if(schemeid==2)
	{
	$('.state_scheme').show();
    $('.national_scheme').hide();
    $('.sports_details').hide();	
	$('.inspire_award').hide();	
	}
	else if(schemeid==3)
	{
	$('.inspire_award').show();
    $('.national_scheme').hide();
    $('.sports_details').hide();	
	$('.state_scheme').hide();	
	}
	else 
	{
	$('.sports_details').show();
    $('.national_scheme').hide();	
	$('.state_scheme').hide();
    $('.inspire_award').hide();	
	}
} 

           
               
/****************************************/
/*student nmms scholor scheme */
/**************************************/
			 var local_i =-1;
         $("#national_scheme tbody").on('click', '.edit-class-section', function(e) {
        index =  $(this).closest('tr').index();
		var nationalsave = $(this).closest('tr').children('td').find('button').attr('id');
		var nationalcancel = $(this).closest('tr').children('td').find('.cancel-class-section').attr('id');
		var nationalclass_id = $(this).closest('tr').children('td').find('input').attr('id');
         var nationaledit =  $(this).attr("id"); 
		 var nationaldeleted =  $(this).closest('tr').children('td').find('.delete-class-section').attr('id'); 
		if(local_i!=-1){
			
           $('#national_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(0).text(nationalstu_adid);
            $('#national_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(1).text(nationalstudent_name);
            $('#national_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(2).text(nationalgender);
            $('#national_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(3).text(nationalclassstudying);
            $('#national_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(4).text(nationalschemedate);
            //$('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(6).text(DOJ);
         }
		nationalstu_adid =  $('#national_scheme').find('tbody').find('tr').eq(index).find('td').eq(0).text();
		nationalstudent_name =  $('#national_scheme').find('tbody').find('tr').eq(index).find('td').eq(1).text();
		nationalgender =  $('#national_scheme').find('tbody').find('tr').eq(index).find('td').eq(2).text();
		nationalclassstudying =$('#national_scheme').find('tbody').find('tr').eq(index).find('td').eq(3).text();
		nationalschemedate =$('#national_scheme').find('tbody').find('tr').eq(index).find('td').eq(4).text();
		 $('#'+nationaldeleted).hide();
		 $('#'+nationaledit).hide();
         $('#'+nationalsave).show();
		 $('#'+nationalcancel).show();
		 
	   $(this).closest('tr').find('td').attr('contenteditable','true');
       var nationalstudent_id =  '<input type="text" id="stuid" class="form-control" value="" disabled>';
	   var nationalstu_name = '<input type="text" id="stu_name"   class="form-control" value="" disabled>';
	   var nationalstu_gender = '<input type="text" id="gender" class="form-control" value="" disabled>';
	  var nationalclassid = '<input type="text" id="classid" class="form-control" value="" disabled>';
	  var nationalscheme_date = '<input type="date" id="schemedate" class="form-control" value="">';
		
		
		$('#national_scheme').find('tbody').find('tr').eq(index).find('td').eq(0).html(nationalstudent_id);
		$('#national_scheme').find('tbody').find('tr').eq(index).find('td').eq(1).html(nationalstu_name);
		$('#national_scheme').find('tbody').find('tr').eq(index).find('td').eq(2).html(nationalstu_gender);
		$('#national_scheme').find('tbody').find('tr').eq(index).find('td').eq(3).html(nationalclassid);
		$('#national_scheme').find('tbody').find('tr').eq(index).find('td').eq(4).html(nationalscheme_date);
		
		$("#stuid").val(nationalstu_adid);
		$("#stu_name").val(nationalstudent_name);
		$("#gender").val(nationalgender);
		$("#classid").val(nationalclassstudying);
		$("#schemedate").val(nationalschemedate);
		
		
		
		
		  $(this).prop("id","edit"+local_i);
          $(this).closest('tr').children('td').find('span').prop('id','save'+local_i);
		  local_i = index;
          
      });
	   $("#national_scheme tbody").on('click', '.cancel-class-section', function(e) {
		  location.reload();
	          });
   function savenational(i)
    {
		if(i==undefined)
		{
			
		
	    var nationalstudent_id = $("#stuid").val();
		var nationalstudent_name = $("#stu_name").val();
        var nationalclass_section =$("#classid").val();
        var nationalscheme_date =$("#schemedate").val();
		 if(nationalscheme_date == '')
	             {
				swal("OK", "All Field Is Required", "error");
		         }
			/* End of the Condition */  	 
         else
		{		
				$.ajax(
				{
					data:{'student_id':nationalstudent_id,'student_name':nationalstudent_name,'class_section':nationalclass_section,'scheme_date':nationalscheme_date,'updateid':updateid},
					url:baseurl+'Home/add_student_scholor_national',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						swal("OK", "Scholor Student Saved Successfully", "success");
						window.location.reload();
					}
				});
		}
	}
	else
		{
		  var updateid=i;
		  var nationalscheme_date =$("#schemedate").val();
		  if(nationalscheme_date == '')
	             {
				swal("OK", "All Field Is Required", "error");
		         }
			/* End of the Condition */  	 
         else
		{		
				$.ajax(
				{
					data:{'updateid':updateid,'scheme_date':nationalscheme_date,},
					url:baseurl+'Home/update_student_scholor_national',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						swal("OK", "Scholor Student Updated Successfully", "success");
						window.location.reload();
					}
				});
		}
		}
	 }
	 
	  function deletenmms(i)  
		 { 
			 deletedid=i;
			 
		            $.ajax(
		            {
			data:{'deleteid':deletedid},
			url:baseurl+'Home/delete_student_scholor_national',
			type:"POST",
			dataType:"JSON",
			success:function(res)
			{
				
			swal("OK", "Student Record Deleted Successfully", "success");
			window.location.reload();
				}
				
			
			 
			
		    });
		 }
/**************************/
/*End of the nmms form */
/*************************/	
	 
	 
/****************************************/
/*student trstse scholor scheme */
/**************************************/

			 var local_j =-1;
			 
	   $("#state_scheme tbody").on('click', '.editstate-class-section', function(e) {
       index =  $(this).closest('tr').index();
		var statesave = $(this).closest('tr').children('td').find('button').attr('id');
		var statecancel = $(this).closest('tr').children('td').find('.cancelstate-class-section').attr('id');
		var class_id = $(this).closest('tr').children('td').find('input').attr('id');
         var stateedit =  $(this).attr("id"); 
		 var statedeleted =  $(this).closest('tr').children('td').find('.deletestate-class-section').attr('id'); 
		if(local_j!=-1){
           $('#state_scheme').find('tbody').find('tr').eq(local_j).find('td').eq(0).text(statestu_adid);
            $('#state_scheme').find('tbody').find('tr').eq(local_j).find('td').eq(1).text(statestudent_name);
            $('#state_scheme').find('tbody').find('tr').eq(local_j).find('td').eq(2).text(stategender);
            $('#state_scheme').find('tbody').find('tr').eq(local_j).find('td').eq(3).text(stateclassstudying);
            $('#state_scheme').find('tbody').find('tr').eq(local_j).find('td').eq(4).text(stateschemedate);
            
         }
		statestu_adid =  $('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(0).text();
		statestudent_name =  $('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(1).text();
		stategender =  $('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(2).text();
		stateclassstudying =$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(3).text();
		stateschemedate =$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(4).text();
	    
		 $('#'+statedeleted).hide();
		 $('#'+stateedit).hide();
         $('#'+statesave).show();
		 $('#'+statecancel).show();
		 	
		 //var classid=$('#'+class_id).val();
		
	   $(this).closest('tr').find('td').attr('contenteditable','true');
	 
       var statestudent_id =  '<input type="text" id="statestuid" class="form-control" value="" disabled>';
	   var statestu_name = '<input type="text" id="statestu_name"   class="form-control" value="" disabled>';
	   var statestu_gender = '<input type="text" id="stategender" class="form-control" value="" disabled>';
	  var stateclassid = '<input type="text" id="stateclassid" class="form-control" value="" disabled>';
	  var statescheme_date = '<input type="date" id="stateschemedate" class="form-control">';
		
		
		$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(0).html(statestudent_id);
		$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(1).html(statestu_name);
		$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(2).html(statestu_gender);
		$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(3).html(stateclassid);
		$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(4).html(statescheme_date);
		
		$("#statestuid").val(statestu_adid);
		$("#statestu_name").val(statestudent_name);
		$("#stategender").val(stategender);
		$("#stateclassid").val(stateclassstudying);
		$("#stateschemedate").val(stateschemedate);
		  $(this).prop("id","edit"+local_j);
          $(this).closest('tr').children('td').find('span').prop('id','save'+local_j);
		  local_j = index;
          
      });
	   $("#state_scheme tbody").on('click', '.cancelstate-class-section', function(e) {
		  location.reload();
	          });

    function cancel(j)
	   {
		  $('#edit'+j).show();
		  $('#save'+j).hide();
		  $('#cancel'+j).hide();	
	   }
	
   	 

	function savestate(j)
		   {
		 
		 if(j==undefined)
		{
	     var statestudent_id = $("#statestuid").val();
		 var statestudent_name = $("#statestu_name").val();
         var stateclass_section =$("#stateclassid").val();
         var statescheme_date =$("#stateschemedate").val();
		 if(statescheme_date == '')
	             {
				swal("OK", "All Field Is Required", "error");
		         }
			/* End of the Condition */  	 
         else
		{		
				$.ajax(
				{
					data:{'student_id':statestudent_id,'student_name':statestudent_name,'class_section':stateclass_section,'scheme_date':statescheme_date,'updateid':updateid},
					url:baseurl+'Home/add_student_scholor_state',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						swal("OK", "Scholor Student Saved Successfully", "success");
						window.location.reload();
					}
				});
		}
		}
		else
		{
			var updateid=j;
			var statescheme_date =$("#stateschemedate").val();
		  if(statescheme_date == '')
	             {
				swal("OK", "All Field Is Required", "error");
		         }
			/* End of the Condition */  	 
         else
		{		
				$.ajax(
				{
					data:{'updateid':updateid,'scheme_date':statescheme_date,},
					url:baseurl+'Home/update_student_scholor_state',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						swal("OK", "Scholor Student Updated Successfully", "success");
						window.location.reload();
					}
				});
		}
		}
	 } 
		   
		   function deletetrstse(i)  
		 { 
			 deletedid=i;
			 
		            $.ajax(
		            {
			data:{'deleteid':deletedid},
			url:baseurl+'Home/delete_student_scholor_state',
			type:"POST",
			dataType:"JSON",
			success:function(res)
			{
				
			swal("OK", "Student Record Deleted Successfully", "success");
			window.location.reload();
				}
				
			
			 
			
		    });
		 }
		   
/**************************/
/*End of the trstse form */
/*************************/	


/****************************************/
/*student inspire Award details */
/**************************************/		   
		 
			 var local_k =-1;
			
 $("#inspire_award tbody").on('click', '.editinspire-class-section', function(e) {
		 
     index =  $(this).closest('tr').index();
		var inspiresave = $(this).closest('tr').children('td').find('button').attr('id');
		var inspirecancel = $(this).closest('tr').children('td').find('.cancelinspire-class-section').attr('id');
		var inspireclass_id = $(this).closest('tr').children('td').find('input').attr('id');
         var inspireedit =  $(this).attr("id"); 

		 var inspiredeleted =  $(this).closest('tr').children('td').find('.deleteinspire-class-section').attr('id'); 
		if(local_k!=-1){
		   // $("#edit"+local_i).show();
           // $("#save"+local_i).hide();
           $('#inspire_award').find('tbody').find('tr').eq(local_k).find('td').eq(0).text(inspirestu_adid);
            $('#inspire_award').find('tbody').find('tr').eq(local_k).find('td').eq(1).text(inspirestudent_name);
            $('#inspire_award').find('tbody').find('tr').eq(local_k).find('td').eq(2).text(inspiregender);
            $('#inspire_award').find('tbody').find('tr').eq(local_k).find('td').eq(3).text(inspireclassstudying);
			$('#inspire_award').find('tbody').find('tr').eq(local_k).find('td').eq(4).text(inspirecommunity);
			$('#inspire_award').find('tbody').find('tr').eq(local_k).find('td').eq(5).text(inspireexhipition);
			$('#inspire_award').find('tbody').find('tr').eq(local_k).find('td').eq(6).text(inspireawardwinner);
			$('#inspire_award').find('tbody').find('tr').eq(local_k).find('td').eq(7).text(inspireschemedate);
            
            //$('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(6).text(DOJ);
         }
		inspirestu_adid =  $('#inspire_award').find('tbody').find('tr').eq(index).find('td').eq(0).text();
		inspirestudent_name =  $('#inspire_award').find('tbody').find('tr').eq(index).find('td').eq(1).text();
		inspiregender =  $('#inspire_award').find('tbody').find('tr').eq(index).find('td').eq(2).text();
		inspireclassstudying =$('#inspire_award').find('tbody').find('tr').eq(index).find('td').eq(3).text();
		inspirecommunity =$('#inspire_award').find('tbody').find('tr').eq(index).find('td').eq(4).text();
		inspireexhipition =$('#inspire_award').find('tbody').find('tr').eq(index).find('td').eq(5).text();
		inspireawardwinner =$('#inspire_award').find('tbody').find('tr').eq(index).find('td').eq(6).text();
		inspireschemedate =$('#inspire_award').find('tbody').find('tr').eq(index).find('td').eq(7).text();
	   
		 $('#'+inspiredeleted).hide();
		 $('#'+inspireedit).hide();
         $('#'+inspiresave).show();
		 $('#'+inspirecancel).show();
		
	     $(this).closest('tr').find('td').attr('contenteditable','true');
	 
       var inspirestudent_id =  '<input type="text" id="inspirestuid" class="form-control" value="" disabled>';
	   var inspirestu_name = '<input type="text" id="inspirestu_name"   class="form-control" value="" disabled>';
	   var inspirestu_gender = '<input type="text" id="inspiregender" class="form-control" value="" disabled>';
	  var inspireclassid = '<input type="text" id="inspireclassid" class="form-control" value="" disabled>';
	  var inspirestu_community = '<input type="text" id="inspirecommunity" class="form-control" value="" disabled>';
	  var inspireexhipition_title = '<input type="text" id="inspiretitle" class="form-control">';
	  var inspireaward_winner = '<input type="text" id="inspireaward" class="form-control">';
	  var inspirescheme_date = '<input type="date" id="awarddate" class="form-control">';
		
		
		$('#inspire_award').find('tbody').find('tr').eq(index).find('td').eq(0).html(inspirestudent_id);
		$('#inspire_award').find('tbody').find('tr').eq(index).find('td').eq(1).html(inspirestu_name);
		$('#inspire_award').find('tbody').find('tr').eq(index).find('td').eq(2).html(inspirestu_gender);
		$('#inspire_award').find('tbody').find('tr').eq(index).find('td').eq(3).html(inspireclassid);
		$('#inspire_award').find('tbody').find('tr').eq(index).find('td').eq(4).html(inspirestu_community);
		$('#inspire_award').find('tbody').find('tr').eq(index).find('td').eq(5).html(inspireexhipition_title);
		$('#inspire_award').find('tbody').find('tr').eq(index).find('td').eq(6).html(inspireaward_winner);
		$('#inspire_award').find('tbody').find('tr').eq(index).find('td').eq(7).html(inspirescheme_date);
		
		$("#inspirestuid").val(inspirestu_adid);
		$("#inspirestu_name").val(inspirestudent_name);
		$("#inspiregender").val(inspiregender);
		$("#inspireclassid").val(inspireclassstudying);
		$("#inspirecommunity").val(inspirecommunity);
		$("#inspiretitle").val(inspireexhipition)
		$("#inspireaward").val(inspireawardwinner)
		$("#inspireschemedate").val(inspireschemedate);
		
		
		
		
		  $(this).prop("id","edit"+local_i);
          $(this).closest('tr').children('td').find('span').prop('id','save'+local_k);
		  local_k = index;
          
      });
	   $("#inspire_award tbody").on('click', '.cancelinspire-class-section', function(e) {
		  location.reload();
	          });

    function cancel(k)
	   {
		  $('#edit'+k).show();
		  $('#save'+k).hide();
		  $('#cancel'+k).hide();	
	   }
	
   	 

	function saveinspire(k)
		   {
		
		 if(k==undefined)
		 {
	    var student_id = $("#inspirestuid").val();
		 var student_name = $("#inspirestu_name").val();
        var class_section =$("#inspireclassid").val();
		var inspire_title =$("#inspiretitle").val();
		var inspire_award =$("#inspireaward").val();
        var award_date =$("#awarddate").val();
		 if(award_date == '')
	             {
				swal("OK", "All Field Is Required", "error");
		         }
			/* End of the Condition */  	 
         else
		{		
				$.ajax(
				{
					data:{'i_student_id':student_id,'i_student_name':student_name,'i_class_section':class_section,'i_inspire_title':inspire_title,'i_inspire_award':inspire_award,'i_award_date':award_date,'updateid':updateid},
					url:baseurl+'Home/add_student_inspire_awards',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						swal("OK", "Student Inspire Awrds Saved Successfully", "success");
						window.location.reload();
					}
				});
		}
		}
		else
		{
			var updateid=k;
			var awarddate =$("#awarddate").val();
			var inspiretitle =$("#inspiretitle").val();
			var inspireaward =$("#inspireaward").val();
		  if(awarddate == '' && inspiretitle=='' && inspireaward=='')
	             {
				swal("OK", "All Field Is Required", "error");
		         }
			/* End of the Condition */  	 
         else
		{		
				$.ajax(
				{
					data:{'updateid':updateid,'awarddate':awarddate,'inspiretitle':inspiretitle,'inspireaward':inspireaward},
					url:baseurl+'Home/update_student_scholor_inspire',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						swal("OK", "Scholor Student Updated Successfully", "success");
						window.location.reload();
					}
				});
		}
			
		}
		   }
 function deleteinspire(i)  
		 { 
			 deletedid=i;
			 
		            $.ajax(
		            {
			data:{'deleteid':deletedid},
			url:baseurl+'Home/delete_student_scholor_inspire',
			type:"POST",
			dataType:"JSON",
			success:function(res)
			{
				
			swal("OK", "Student Record Deleted Successfully", "success");
			window.location.reload();
				}
				
			
			 
			
		    });
		 }		   
/**************************/
/*End of the inspire form */
/*************************/	

		   
/****************************************/
/*student sports participation details */
/**************************************/
	      
 var local_l =-1;
$("#sports_award tbody").on('click', '.editsports-class-section', function(e) {
		 
        index =  $(this).closest('tr').index();
		
		var sportssave = $(this).closest('tr').children('td').find('button').attr('id');
		var sportscancel = $(this).closest('tr').children('td').find('.cancelsports-class-section').attr('id');
		var sportsclass_id = $(this).closest('tr').children('td').find('input').attr('id');
        var sportsedit =  $(this).attr("id"); 
		var sportsdeleted =  $(this).closest('tr').children('td').find('.deletesports-class-section').attr('id'); 
		if(local_l!=-1){
		   // $("#edit"+local_i).show();
           // $("#save"+local_i).hide();
            $('#sports_award').find('tbody').find('tr').eq(local_l).find('td').eq(0).text(sportsstu_adid);
            $('#sports_award').find('tbody').find('tr').eq(local_l).find('td').eq(1).text(sportsstudent_name);
            $('#sports_award').find('tbody').find('tr').eq(local_l).find('td').eq(2).text(sportsgender);
            $('#sports_award').find('tbody').find('tr').eq(local_l).find('td').eq(3).text(sportsclassstudying);
            $('#sports_award').find('tbody').find('tr').eq(local_l).find('td').eq(4).text(sportsschemedate);
			$('#sports_award').find('tbody').find('tr').eq(local_l).find('td').eq(5).text(sportsschemedate);
		    $('#sports_award').find('tbody').find('tr').eq(local_l).find('td').eq(6).text(sportsparticipatinglevel);
			$('#sports_award').find('tbody').find('tr').eq(local_l).find('td').eq(7).text(sportsschemedate);
            //$('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(6).text(DOJ);
         }
		sportsstu_adid =  $('#sports_award').find('tbody').find('tr').eq(index).find('td').eq(0).text();
		sportsstudent_name =  $('#sports_award').find('tbody').find('tr').eq(index).find('td').eq(1).text();
		sportsgender =  $('#sports_award').find('tbody').find('tr').eq(index).find('td').eq(2).text();
		sportsclassstudying =$('#sports_award').find('tbody').find('tr').eq(index).find('td').eq(3).text();
		gamename =$('#sports_award').find('tbody').find('tr').eq(index).find('td').eq(4).text();
		sportsschemedate =$('#sports_award').find('tbody').find('tr').eq(index).find('td').eq(5).text();
		sportsparticipatinglevel =$('#sports_award').find('tbody').find('tr').eq(index).find('td').eq(6).text();
		winner_level =$('#sports_award').find('tbody').find('tr').eq(index).find('td').eq(7).text();
	  
		 $('#'+sportsdeleted).hide();
		 $('#'+sportsedit).hide();
         $('#'+sportssave).show();
		 $('#'+sportscancel).show();
		 
	     $(this).closest('tr').find('td').attr('contenteditable','true');
	   var sportslist = <?php echo json_encode($sportslist, JSON_PRETTY_PRINT)?>;
	   console.log(sportslist);
	   var game_drop = "<select name='addgame' id='addgame' class='form-control'>";
		 var game_val = '';
		 $.each(sportslist, function(idx, obj) {
				game_drop +="<option value="+obj.id+">"+obj.sport_name+"</option>";
				
				if(obj.sport_name == gamename)
				{
					game_val = obj.id;
				}
				
				
            			
		 });
		 var participating_level = <?php echo json_encode($participating_level, JSON_PRETTY_PRINT)?>;
	   var participating_drop = "<select name='level' id='level' class='form-control'>";
		 var participating_val = '';
		 $.each(participating_level, function(idx, obj) {
				participating_drop +="<option value="+obj.id+">"+obj.participating_level+"</option>";
				
				if(obj.participating_level == sportsparticipatinglevel)
				{
					participating_val = obj.id;
				}
				
				
            			
		 });
		
	   
        var sportsstudent_id = '<input type="text" id="sportsstuid" class="form-control" value="" disabled>';
	    var sportsstu_name = '<input type="text" id="sportsstu_name"   class="form-control" value="" disabled>';
	    var sportsstu_gender = '<input type="text" id="sportsgender" class="form-control" value="" disabled>';
	    var sportsclassid = '<input type="text" id="sportsclassid" class="form-control" value="" disabled>';
		game_drop +="</select>";
		var sportsgame = '<td id="game"> '+game_drop+'</td>';
		var sportsscheme_date = '<input type="date" id="sportsschemedate" class="form-control">';
		var winnerlevel = '<select id="winnerlevel" name="winnerlevel"  class="form-control" ><option value="1">First (Gold)</option><option value="2">Second(Silver)</option><option value="3">Third(Bronze)</option></select>'; 
		participating_drop +="</select>";
		var particypy_level = '<td id="par_level"> '+participating_drop+'</td>';
		
		$('#sports_award').find('tbody').find('tr').eq(index).find('td').eq(0).html(sportsstudent_id);
		$('#sports_award').find('tbody').find('tr').eq(index).find('td').eq(1).html(sportsstu_name);
		$('#sports_award').find('tbody').find('tr').eq(index).find('td').eq(2).html(sportsstu_gender);
		$('#sports_award').find('tbody').find('tr').eq(index).find('td').eq(3).html(sportsclassid);
		$('#sports_award').find('tbody').find('tr').eq(index).find('td').eq(4).html(game_drop);
		$('#sports_award').find('tbody').find('tr').eq(index).find('td').eq(5).html(sportsscheme_date);
		$('#sports_award').find('tbody').find('tr').eq(index).find('td').eq(6).html(participating_drop);
		$('#sports_award').find('tbody').find('tr').eq(index).find('td').eq(7).html(winnerlevel);
		
		$("#sportsstuid").val(sportsstu_adid);
		$("#sportsstu_name").val(sportsstudent_name);
		$("#sportsgender").val(sportsgender);
		$("#sportsclassid").val(sportsclassstudying);
		$("#addgame").val(game_val);
		$("#sportsschemedate").val(sportsschemedate);
		$("#level").val(participating_val);
		$("#winnerlevel").val(winner_level);
		
		
		
		
		  $(this).prop("id","edit"+local_l);
          $(this).closest('tr').children('td').find('span').prop('id','save'+local_l);
		  local_l = index;
          
      });
	   $("#sports_award tbody").on('click', '.cancelsports-class-section', function(e) {
		  location.reload();
	          });

    function cancel(l)
	   {
		  $('#edit'+l).show();
		  $('#save'+l).hide();
		  $('#cancel'+l).hide();	
	   }
	
   	 

	function savesports(l)
		   {
		alert(l);
		if(l==undefined)
		{
	     var sportsstudent_id = $("#sportsstuid").val();
		 var sportsstudent_name = $("#sportsstu_name").val();
         var sportsclass_section =$("#sportsclassid").val();
         var sportsscheme_date =$("#sportsschemedate").val();
		 var participating_game =$("#addgame").val();
		 var participating_level =$("#level").val();
		 var winner_level =$("#winnerlevel").val();
		 if(sportsscheme_date == '')
	             {
				swal("OK", "All Field Is Required", "error");
		         }
			/* End of the Condition */  	 
         else
		{		
				$.ajax(
				{
					data:{'p_student_id':sportsstudent_id,'p_class_section':sportsclass_section,'p_scheme_date':sportsscheme_date,'p_participating_game':participating_game,'p_participating_level':participating_level,'p_winner_level':winner_level,'updateid':updateid},
					url:baseurl+'Home/add_student_sports_participate',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						swal("OK", "Scholor Student Saved Successfully", "success");
						window.location.reload();
					}
				});
		}
		 }
		 else
		 {
			 var updateid=l;
			 var sportsschemedate =$("#sportsschemedate").val();
			 var participating_game =$("#addgame").val();
			 var participating_level =$("#level").val();
		     var winner_level =$("#winnerlevel").val();
		  if(sportsschemedate == '' && winner_level=='' && participating_level=='' &&participating_game=='')
	             {
				swal("OK", "All Field Is Required", "error");
		         }
			/* End of the Condition */  	 
         else
		{		
				$.ajax(
				{
					data:{'updateid':updateid,'sportsschemedate':sportsschemedate,'participating_game':participating_game,'participating_level':participating_level,'winner_level':winner_level},
					url:baseurl+'Home/update_student_scholor_sports',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						swal("OK", "Scholor Student Updated Successfully", "success");
						window.location.reload();
					}
				});
		}
			 
		 }
		   } 
function deletesports(i)  
		 { 
			 deletedid=i;
			 
		            $.ajax(
		            {
			data:{'deleteid':deletedid},
			url:baseurl+'Home/delete_student_scholor_sports',
			type:"POST",
			dataType:"JSON",
			success:function(res)
			{
				
			swal("OK", "Student Record Deleted Successfully", "success");
			window.location.reload();
				}
				
			
			 
			
		    });
		 }
function get_section()
    {
  // alert(section_id);
  var classid=$("#classno").val();
      if(classid !=0){
    $.ajax(
    {
        type: "POST",
        url:baseurl+'Home/get_school_section_details',
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
            
            $("#sectionname").empty('');            
            $("#sectionname").html(section_drop); 
           
            
         },
          
    })
    }
    }  
      		 
		
/**************************/
/*End of the sports form */
/*************************/			

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