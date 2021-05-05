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
            


<?php $this->load->view('Collector/header.php'); ?>


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
                               
                                <div class="container" style="width:1225px;">
                                    <!-- BEGIN PAGE CONTENT INNER -->
                          

                                   
                                       
                                    <!--<?php $this->load->view('emis_school_profile_header1.php'); ?>-->
                                        

                                           <!-- <div class="m-heading-1 border-green m-bordered">
                                            <h3>Basic Information</h3>
                                        </div> -->
                                     
                                         
                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    
                                                    <span class="caption-subject font-dark sbold uppercase">Teacher Monthly Utilization</span>
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
                                                  <form id="filter" method="post" action="<?php echo base_url().'Collector/emis_teacher_timetable_details';?>">
												   
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
                                                          <select style="width: 90%;" class="form-control" onchange="get_type();" data-placeholder="Choose a Category" tabindex="1" id="schooltype" name="schooltype"  style="width: 30%" required>
                                                               	
                                                                <option value="" >Select Department Type</option>
                                                               <option value="1" >DEE</option>
															   <option value="2" >DSE</option>
                                                                
                                                               </select> 
                                                        
                                                    </div>
													<div class="col-md-2">  
                                                          <select style="width: 90%;" class="form-control" data-placeholder="Choose a Category" tabindex="1" id="ttype" name="ttype"  style="width: 60%" required>
                                                               </select> 
                                                        
                                                    </div>
													<div class="col-md-3"> 
                                               <input class="form-control" id="month" type="month" name="month" value="">
                                                        
                                                    </div>
													<div class="col-md-3" > 
													 <div>
                                                                  <label class="col-md-8" style="padding-left: 0px;"><strong style="font-size:16px;">Teacher Lessthan </strong></label>
                                                                  <div class="col-md-4" style="padding-left: 0px;">
                                                                    <input type="text" class="form-control" id="periods" name="periods"  required>
                                                                  </div>
                                                               </div>   
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
                                                  <div class="portlet box green" style="margin-right: 17px;
    margin-left: 17px;">
                                                    <div class="portlet-title" style="padding-bottom: 9px;">
                                                          <div class="caption">
                                                            <i class="fa fa-globe"></i> &nbsp;&nbsp;&nbsp; School Department :&nbsp;&nbsp;<?php echo $type?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Teacher Type&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $teachertype?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Month&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo $month;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Periods Lessthan&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo $periods;?>
															
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
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
																    <th>District Name</th>
																	<th>Block Name</th>
                                                                    <th>School Name</th>
                                                                    <th>Teacher Name</th>
																	<th>Subjects</th>
                                                                    <th>Periods Taken</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                             <?php                                                           
                                                              $i=1;
                                                               foreach($teacher_details as $ds)
															    {
																		?>
                                                               <tr>
                                                                     
                                                                    <td><?php echo $ds->district_name; ?></td>
																	<td><?php echo $ds->block_name; ?></td>
																	<td><?php echo $ds->school_name; ?></td>
                                                                    <td><?php echo $ds->teacher_name; ?></td>
																	<td><?php echo $ds->subjects; ?></td>
                                                                    <td ><?php echo $ds->teacher_count; ?></td>
																	
                                                               </tr>
                                                               <?php $i++;  }  ?>
                                                             
                                                            </tbody>
															
                                                        </table>
                                                        </div>
														</div>
														<div class="row">
														
															   
																		
																</div>
																<br>
																<br>


															



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
		
    function get_type()
    {
  // alert(section_id);
  var schooltype=$("#schooltype").val();
      if(schooltype ==1){
            var section_drop = '<select name="section_id" class="form-control" id="section_id" required>';
			section_drop +='<option value="">Select Teacher Type</option>';
            section_drop +='<option value=41>SG</option>';
			section_drop +='<option value=11>BT</option>';
            section_drop +='</select>';
            $("#ttype").empty('');            
            $("#ttype").html(section_drop); 
    }
	else
	{
		var section_drop = '<select name="section_id" class="form-control" id="section_id" required>';
			section_drop +='<option value="">Select Teacher Type</option>';
            section_drop +='<option value=41>SG</option>';
			section_drop +='<option value=11>BT</option>';
			section_drop +='<option value=36>PG</option>';
            section_drop +='</select>';
            $("#ttype").empty('');            
            $("#ttype").html(section_drop); 
	}
    }  
        
        </script>
    </body>
</html>