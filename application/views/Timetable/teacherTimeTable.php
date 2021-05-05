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
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">View Teacher Timetable</span>
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
                                                  <form id="filter" method="post" action="<?php echo base_url().'TimetableController/loadTeacherTimeTable';?>">
												   
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
													 <div class="col-md-3">  
                                                          <select style="width: 90%;" class="form-control"  data-placeholder="Select Teacher" tabindex="1" id="teacherid" name="teacherid"  style="width: 30%" required="" >
                                                               	
                                                                <option value="" >Select Teacher</option>
																	
                                                                 <?php foreach($teacherDetails as $td) {
														 
														 ?>
                                                               <option value="<?php echo $td->teacher_code;  ?>" ><?php echo  $td->teacher_name;?></option>
                                                                 <?php   }  ?>
																 
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
														    
                                                            <i class="fa fa-globe"></i> &nbsp;&nbsp;&nbsp; Teacher Name:&nbsp;&nbsp;<?php echo $teacher?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;From: &nbsp;&nbsp;<?php echo $fromdate=date_format(date_create_from_format('Y-m-d', $this_week_fst), 'd-m-Y');?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															To : &nbsp;&nbsp;<?php echo $todate=date_format(date_create_from_format('Y-m-d', $this_week_ed), 'd-m-Y');?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															 <a  href="<?php echo base_url().'TimetableController/generate_teachertimetable_pdf?teacherid='. $teacherid;?>&fdate=<?php echo $this_week_fst?>&tdate=<?php echo $this_week_ed?>" class="btn btn-primary hidden-print"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>&nbsp;&nbsp;Print</a>
															 
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
                                                                    <th style="background-color:#ccc;vertical-align: middle;">Days</th>
																	<?php $noofperiods=8; ?>
                                                                    <?php  
																				for ($x = 1; $x <= $noofperiods; $x++) { ?>
																				<th style="background-color:#ccc;vertical-align: middle;">Periods:<?php echo $x ?></th>
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
																			<td>
																			<?php
																			if(!empty($Mondayclasses))
																			{
																			foreach($Mondayclasses as $r){
																				if($r['status']==$x)
																				{
																				   echo($r['classes'].'</br>');
																				  // echo '</br>';
																				}
																			}
																			}
																			?>
																			</td>
																		<?php } ?>
																	
                                                               </tr>
															   
                                                              <tr>
															      
																	<td style="background-color:#ccc;vertical-align: middle;"><strong>Tuesday</strong></td>
																	<?php 
																	
																	
																				for ($x = 1; $x <= $noofperiods; $x++) {
																								?>
																				<td>
																			<?php
																			if(!empty($Tuesdayclasses))
																			{
																			foreach($Tuesdayclasses as $r){
																				if($r['status']==$x){
																					echo($r['classes'].',');
																				}
																				
																			}
																			?>
																			</td>
																				<?php
																				}
																				}
																		?>
                                                               </tr>
															    <tr>
																    
																	<td style="background-color:#ccc;vertical-align: middle;"><strong>Wednesday</strong></td>
																	<?php 
																				for ($x = 1; $x <= $noofperiods; $x++) {
																								?>
																				<td>
																			<?php
																			if(!empty($Wednesdayclasses))
																			{
																			foreach($Wednesdayclasses as $r){
																				if($r['status']==$x){
																					echo($r['classes'].',');
																				}
																				
																			}
																			}
																			?>
																			</td>
																				<?php
																		 }
																		?>
                                                               </tr>
															    <tr>
																   
																	<td style="background-color:#ccc;vertical-align: middle;"><strong>Thursday</strong></td>
																	<?php 
																				for ($x = 1; $x <= $noofperiods; $x++) {
																								?>
																				<td>
																			<?php
																			if(!empty($Thursdayclasses))
																			{
																			foreach($Thursdayclasses as $r){
																				if($r['status']==$x){
																					echo($r['classes'].',');
																				}
																				
																			}
																			}
																			?>
																			</td>
																				<?php
																		 }
																		?>
                                                               </tr>
															   <tr>
															     
																	<td style="background-color:#ccc;vertical-align: middle;"><strong>Friday</strong></td>
																	<?php 
																				for ($x = 1; $x <= $noofperiods; $x++) {
																								?>
																				<td>
																			<?php
																			if(!empty($Fridayclasses))
																			{
																			foreach($Fridayclasses as $r){
																				if($r['status']==$x){
																					echo($r['classes'].',');
																				}
																				
																			}
																			}
																			?>
																			</td>
																				<?php
																		 }
																		?>
                                                               </tr>
															   <tr>
															     
																	<td style="background-color:#ccc;vertical-align: middle;"><strong>Saturday</strong></td>
																	<?php 
																				for ($x = 1; $x <= $noofperiods; $x++) {
																								?>
																				<td>
																			<?php
																			if(!empty($Saturdayclasses))
																			{
																			foreach($Saturdayclasses as $r){
																				if($r['status']==$x){
																					echo($r['classes'].',');
																				}
																				
																			}
																			}
																			?>
																			</td>
																				<?php
																		 }
																		?>
                                                               </tr>
															   <tr>
															     
																	<td style="background-color:#ccc;vertical-align: middle;"><strong>Sunday</strong></td>
																	<?php 
																				for ($x = 1; $x <= $noofperiods; $x++) {
																								?>
																				<td>
																			<?php
																			if(!empty($Sundayclasses))
																			{
																			foreach($Sundayclasses as $r){
																				if($r['status']==$x){
																					echo($r['classes'].',');
																				}
																				
																			}
																			}
																			?>
																			</td>
																				<?php
																		 }
																		?>
                                                               </tr>
                                                             
                                                            </tbody>
															
                                                        </table>
                                                        </div>
														</div>
														<!--<div class="row">
														
															   <div class="col-md-offset-11 col-md-1">
													  					<a href="javascript:;" 
                                                                           class="btn btn-sm green" style="margin-left: -17px;" id="save" onclick="save();"
                                                                          > 
                                                                            SAVE <i class="fa fa-plus-o "></i>
                                                                        </a>
																		</div>
																		
																</div>-->
																<br>
																<br>

<style> 
.table thead tr th {
    font-size: 12px;
}
.table td, .table th{
  font-size: 12px;
}
/* * {font-family: Helvetica Neue, Arial, sans-serif; }

body { background-image: linear-gradient(#aaa 25%, #000);}

h1, table { text-align: center; }

table {border-collapse: collapse;  width: 70%; margin: 0 auto 5rem;}

th, td { padding: 1.5rem; font-size: 1.1rem; }

tr {background: hsl(50, 50%, 80%); }

tr, td { transition: .4s ease-in; } 



tr:nth-child(even) { background: hsla(50, 50%, 80%, 0.7); }

td:empty {background: hsla(50, 25%, 60%, 0.7); }

tr:hover:not(#firstrow), tr:hover td:empty {background: #DEB887; pointer-events: visible;}
tr:hover:not(#firstrow) { transform: scale(1.0); font-weight: 600; box-shadow: 0px 3px 7px red;} */

</style>
<div class="row">
<div class=" col-md-3">
<table class="tg" style="width:105%;" border="1">
  <tr>
    <th  colspan="8" style="background-color:#b0d2f9;font-size:12px;padding:7px;">Classwise Periods Alotted</th>
  </tr>
  <tr>
    <th style=" text-align: left; font-size:15px; font-family:serif;padding:7px;">Class</th>
    <th style="font-size:15px; font-family:serif;padding:7px;">Periods Count</th> 
  </tr>
  <tbody>
    <?php                                                           
    $i=1;
	if(!empty($periodscount))
	{
   foreach($periodscount as $tc)
	{    
?>	
  <tr>
    <td style="text-align: left;padding:7px;"><?php echo $tc->classes?></td>
    <td style="padding:7px;"><?php echo $tc->assigned?></td>
    
  </tr>
  <?php 
 $i++;  }
	} 
 ?>
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
		

$(document).ready(function(){
$('#teacherid').select2({closeOnSelect:false});	

			
 });
          			

   
        
 

</script>    
 
    </body>
</html>