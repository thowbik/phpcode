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
                                                            <i class="fa fa-globe"></i> Subject-Wise Completion Status 
															
															</div> 
                                                        <div class="tools" style="margin-top: 20px;"> </div>
                                                    </div>
                                                    <div class="portlet-body">
													
													<div class="row">
													
													
	                
                                                   
																<div class="portlet box green">
													
																

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
															<div class="row">
<div class="  col-md-6">
<center>
<table class="tg" style="width:90%;" border="1">
  <tr>
    <th  colspan="8" style="background-color:green;color:white;  font-size:12px;padding:7px;">TEACHER-WISE NO.OF PERIOD TAKEN PER SUBJECT (School Teachers)
	</th>
  </tr>
  <tr>
    <th style="background-color:lightblue; text-align: left; font-size:15px; font-family:serif;padding:7px; width:15%;">Teacher Name</th>
	 <th style="background-color:lightblue; text-align: center; font-size:15px; font-family:serif;padding:7px; width:15%;">Class </th>
	 <th style="background-color:lightblue; text-align: center;font-size:15px; font-family:serif;padding:7px; width:15%;">Subject</th>
	<th style="background-color:lightblue; text-align: center; font-size:15px; font-family:serif; padding:7px; width:15%;">Term Plan</th>
	<th style="background-color:lightblue; font-size:15px; font-family:serif;padding:7px; ">Planned Completion till Last Week</th>
    <th style="background-color:lightblue; text-align: center;  font-size:15px; font-family:serif;padding:7px; width:15%;">Completed till Last Week</th>
	
	<th style="background-color:lightblue; text-align: center; font-size:15px; font-family:serif;padding:7px; width:15%;">Scheduled This Week </th> 
	<th style="background-color:lightblue; text-align: center;  font-size:15px; font-family:serif;padding:7px; width:15%;">Remaining</th> 
	
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
  //$remaining=$termplan-$teac->teacher_count;?>
  
    <td style="text-align: left;padding:7px;"> <strong><?php echo $teac->teacher_name;?></strong></td>
	<td style="padding:7px;"> <?php echo $teac->classes;?></td>
	<td style="padding:7px;"> <?php echo $teac->subjects;?></td>
    <td style="padding:7px;"> <?php echo $termplan ?></td>
	<td style="padding:7px;"> <?php echo $i;?></td>
	<td style="padding:7px;"> <?php echo $teac->teacher_count_total;?></td>
	<td style="padding:7px;"> <?php echo $teac->teacher_count;?></td>
	<td style="padding:7px;"><?php echo $remaining=($termplan)-($teac->teacher_count_total);?></td>
    
  </tr>
  <?php $i++;  } } ?>
  </tbody>
</table>
</center>
</div>	
<div class="  col-md-6">
<table class="tg" style="width:90%;" border="1">
  <tr>
    <th  colspan="8" style="background-color:Red; color:white; font-size:12px;padding:7px;">TEACHER-WISE NO.OF PERIOD TAKEN PER SUBJECT (Volunteer Teachers)
	</th>
  </tr>
  <tr>
    <th style="background-color:lightblue; text-align: left; font-size:15px; font-family:serif;padding:7px; width:15%;">Teacher Name</th>
	 <th style="background-color:lightblue; text-align: center; font-size:15px; font-family:serif;padding:7px; width:15%;">Class </th>
	 <th style="background-color:lightblue; text-align: center; font-size:15px; font-family:serif;padding:7px; width:15%;">Subject</th>
	<th style="background-color:lightblue; text-align: center; font-size:15px; font-family:serif; padding:7px; width:15%;">Term Plan</th>
    <th style="background-color:lightblue; text-align: center;  font-size:15px; font-family:serif;padding:7px; width:15%;">Completed till <br>Last Week</th>	
	<th style="background-color:lightblue; text-align: center; font-size:15px; font-family:serif;padding:7px; width:15%;">Scheduled This Week </th> 
	<th style="background-color:lightblue; text-align: center;  font-size:15px; font-family:serif;padding:7px; width:15%;">Remaining</th> 
	
  </tr>
  <tbody>
   <?php                                                           
   $i=1;
   if(!empty($timetablecountvolunteacherteacher))
   {
   foreach($timetablecountvolunteacherteacher as $volteac)
	{    
?>	
  <tr>
  <?php $termplan=95;
  //$remaining=$termplan-$teac->teacher_count;?>
  
    <td style="text-align: left;padding:7px;"> <strong><?php echo $volteac->teacher_name;?></strong></td>
	<td style="padding:7px;"> <?php echo $volteac->classes;?></td>
	<td style="padding:7px;"> <?php echo $volteac->subjects;?></td>
    <td style="padding:7px;"> <?php echo $termplan ?></td>
	<td style="padding:7px;"> <?php echo $volteac->teacher_count_total;?></td>
	<td style="padding:7px;"> <?php echo $volteac->teacher_count;?></td>
	<td style="padding:7px;"><?php echo $remaining=($termplan)-($volteac->teacher_count_total);?></td>
    
  </tr>
  <?php $i++;  } } ?>
  </tbody>
</table>
</div>														

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

 for (var i = 1; i <= 8; i++) 
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
        
         
		</script>
    </body>
</html>