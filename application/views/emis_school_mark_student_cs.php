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
                            <div class="page-head">
                                <div class="container">
                                    
                                    <div class="page-toolbar">
                                        <!-- BEGIN THEME PANEL -->
                           
                                        <!-- END THEME PANEL -->
                                    </div>
                                    <!-- END PAGE TOOLBAR -->
                                </div>
                            </div>
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">
                                <div></div> 
                                <div class="container">
                                    <!-- BEGIN PAGE CONTENT INNER -->
                          

                                    <div class="page-content-inner">
                                       
                                    <?php $this->load->view('emis_school_profile_header1.php'); ?>
                                        

                                           <!-- <div class="m-heading-1 border-green m-bordered">
                                            <h3>Basic Information</h3>
                                        </div> -->
                                     
                                         
                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Co Scholastic Achievement of Children</span>
                                                </div>
                                            </div> 
                                           
                                            <!--begin form -->
                                           

                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                          
                                        									  
                                        <center>
                                                  <form method="post" action="<?php echo base_url().'Home/emis_school_student_co_scholastic';?>">
												   
                                                    <div class="form-group">
                                                    <div class="row">
													<div class="col-md-2">  
                                                          <select style="width: 85%;" class="form-control" data-placeholder="Choose a Category" tabindex="1" id="termid" name="termid"  style="width: 80%" required="">
                                                               	
                                                                <option value="" >Select Term</option>
																<option value="1" >Term 1</option>
                                                                <option value="2" >Term 2</option>
																<option value="3" >Term 3</option>
																
                                                               </select> 
                                                        
                                                    </div>
                                                       <div class="col-md-2">  
                                                          <select style="width: 90%;" class="form-control" data-placeholder="Choose a Category" tabindex="2" id="schoolcat" name="schoolcate"  style="width: 20%" required="">
                                                               	
                                                                <option value="" >Select Class</option>
																	
                                                                 <?php foreach($classdetails as $sc) {
																	   $classid=$sc->class_id;
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
                                                        
                                                          <button type="submit"  class="btn green" id="emis_stu_searchsep_sub" >SUBMIT</button>
                                                              
                                                    </div>
													</div>
													</div>
                                                    </form>
													</center>
													
                                              
                                                

                                              </div>
                                            </div>



                                                


                                               <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                       <div class="caption">
                                                            <i class="fa fa-globe"></i>Term  :&nbsp;&nbsp;<?php echo $termid?> &nbsp;&nbsp;&nbsp; Class :&nbsp;&nbsp;<?php echo $classname?>
                                                             
															<input type="hidden" class="medium" id="classid" value="<?php echo $classname?>">
															<input type="hidden" class="medium" id="subid" value="<?php echo $subjectid?>">
															<input type="hidden" class="medium" id="temid" value="<?php echo $termid?>">
															</div> 
                                                        <div class="tools" style="margin-top: 20px;"> </div>
                                                    </div>
                                                    <div class="portlet-body">
													
													<div class="row">
													<table class="table table-striped table-bordered table-hover">
													<tr>
													<th style="display:none;">&nbsp;</th>
													<th style="display:none;">&nbsp;</th>
													
													 <th style="padding-left: 600px; color:green;">Grades</th>
                                                   	
												</tr>												
												</table>
													<style>
td{text-align: center}
th{text-align: center}
</style>		 
                                                      <table class="table table-striped table-bordered table-hover" id="student_mark" style="margin-top: -20px;">
                                                            <thead>
															<tr>
<td style="display:none;">UpdateID</td>															
<td style="display:none;"><strong>s.no</strong></td>
<td style="display:none;"><strong>student_id</strong></td>
<td style="display:none;"><strong>No_assessed</strong></td>
<td style="display:none;"><strong>student_name</strong></td>
<td style="display:none;"><strong>Section</strong></td>
<td style="display:none;">A</td>
<td style="display:none;">B</td>
<td style="display:none;">C</td>
<td style="display:none;">D</td>
<td style="display:none;">E</td>



</tr>
                                                                <tr>
																  
																   <th style="display:none">Update ID</th>
																    <th style="width:5%;">S.No</th>
																	<th style="display:none">student Id</th>
																	<th style="width:10%">Assessed ?</th>
                                 <th style="width:30%; text-align:left;">Student Name</th>
                                  <th maxlength="2">Section</th>
                                 <th maxlength="2">Physical Education</th>
																	<th maxlength="2">Life Skill</th>
																	<th maxlength="2">Attitudes & Values</th>
																	<th maxlength="2">Health & Yoga</th>
																	<th maxlength="2">Co-Curricular</th>
	
																
                                                                    
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                             <?php                                                           
                                                              $i=1;
															  if(!empty($studentcolist)){
                                                              foreach($studentcolist as $sd)
															   {
																   $studentattendance=$sd->student_attendance;
																   // echo $studentattendance;
																   // echo 'bala';
																   ?>
                                                               <tr>
                                                                     
                                                                    <!--<td style="display:none";><?php echo $d->school_id;  ?></td>-->
																	
																	<!--<td><?php echo $standard;  ?>
																	<input type="hidden" id="<?php echo $i;?>" value="<?php echo $classid?>">
																	</td>-->
                                                                    <td style="display:none";><?php echo $sd->updid; ?></td>
                                                                    <td><?php echo $i; ?></td>
																	<td style="display:none";><?php echo $sd->stuid; ?></td>
																	<?php
																	if($studentattendance==0)
																	{
																		?>
																	<td> <input type="checkbox" class="myCheckbox"   name="att" id="att<?php echo $i;?>" onclick="attendance(<?php echo $sd->stuid;?>,<?php echo $i;?>);"></td>
                                                                  <?php
																	}
															       else if($studentattendance==1)
																   {
																	   ?>
															        <td style="background-color:lightblue;"> <input type="checkbox" class="myCheckbox" checked name="att" id="att<?php echo $i;?>" onclick="absent(<?php echo $sd->stuid;?>,<?php echo $i;?>);"></td>
																	 <?php
																   } 
																   
															       else
																   {
																	   ?>
																	   <td style="background-color:red;"> <input type="checkbox" name="att" id="att<?php echo $i;?>" onclick="present(<?php echo $sd->stuid;?>,<?php echo $i;?>);"></td>
																	   <?php
																   } 
																   ?>
                                  <td style="text-align: left;" ><?php echo $sd->name; ?></td>
                                  <td style="text-align: center;" ><?php echo $sd->class_section; ?></td>

																	<td contentEditable="true" maxlength="2" onKeypress="return isNumberKey(event);" ;><?php echo $sd->PE; ?></td>
                                  <td contentEditable="true" onKeypress="return isNumberKey(event);";><?php echo $sd->LK; ?></td>
																	<td contentEditable="true" onKeypress="return isNumberKey(event);";><?php echo $sd->AV; ?></td>
																	<td contentEditable="true" onKeypress="return isNumberKey(event);";><?php echo $sd->HY; ?></td>
																	<td contentEditable="true" onKeypress="return isNumberKey(event);";><?php echo $sd->CC; ?></td>
                                                               </tr>
                                                               <?php $i++;  } } ?>
															  
                                                            </tbody>
															
                                                        </table>

														<br>
														<br>
														<br>
														 <div class="row">
														 <?php
														
														 $status=$studentcolist[1]->status;
												
														 if($status==2 || $status==1)
														 {
															 ?>
															
															 <div class="col-md-offset-8 col-md-2">
													  					<a href="javascript:;" 
                                                                           class="btn btn-sm green" style="margin-top: -79px; margin-left: 71px;" id="convert-table" onclick="update();"
                                                                           data-class-section-id ="" > 
                                                                            UPDATE <i class="fa fa-plus-o "></i>
                                                                        </a>
																		</div>
																		<div class=" col-md-2">
													  					<a href="javascript:;" 
                                                                           class="btn btn-sm red" style="margin-top: -79px; " id="final" onclick="finalsave();"
                                                                           data-class-section-id ="<?php echo $d->id;  ?>" > 
                                                                           Final Submit<i class="fa fa-plus-o "></i>
                                                                        </a>
																		</div>
																		<?php
														                 }
																		 else
																		 {
														                   ?>
															   <div class="col-md-offset-10 col-md-2">
													  					<a href="javascript:;" 
                                                                           class="btn btn-sm green" style="margin-top: -79px; margin-left: -17px;" id="save" onclick="save();"
                                                                           > 
                                                                            SAVE <i class="fa fa-plus-o "></i>
                                                                        </a>
																		</div>
																		<?php
																		 }
																		 ?>
																		
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
                </div>
            </div>
        </div>
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
	
$('.myCheckbox').prop('checked', true);
//var x = document.getElementById('checkboxcheckbox'+i).checked;
var status='';	
var studentmarktable = <?php echo json_encode($studentcolist, JSON_PRETTY_PRINT)?>;
if(studentmarktable.length !=0){
 status=studentmarktable[0].status;
 }else
 {
	 status = 0;
 }
if(status==3)
{

 $("#save").hide();
 $("#final").hide();
}

  }); 
var Absentlist=[];
function attendance(sid,i)
{
	var x = document.getElementById('att'+i).checked;
	if(x==false)
	{
	i = parseInt(i-1);
	var row = $("#student_mark").find('tbody').find('tr:eq('+i+')');
	 $(row).css('color', '#f00');
	 //$(row).prop( "disabled", true);
	 $(row).attr("contenteditable", false); 
	//$('#student_mark').find('tbody tr:eq(1)').hide();
	Absentlist[i] =sid;
	
   
	}
	else
	{
	
	i = parseInt(i-1);
	var row = $("#student_mark").find('tbody').find('tr:eq('+i+')');
	 $(row).css('color', 'black');
    Absentlist.splice(i,1);
	

}
}
var Present=[];
function present(sid,i)
{
	
	var x = document.getElementById('att'+i).checked;
	if(x==true)
	{
	i = parseInt(i-1);
	var row = $("#student_mark").find('tbody').find('tr:eq('+i+')');
	 $(row).css('color', 'green');
	 //$(row).prop( "disabled", true);
	 $(row).attr("contenteditable", false); 
	//$('#student_mark').find('tbody tr:eq(1)').hide();
	Present[i] =sid;
	}
	else
	{
	
	i = parseInt(i-1);
	var row = $("#student_mark").find('tbody').find('tr:eq('+i+')');
	 $(row).css('color', 'black');
    Present.splice(i,1);
	alert(Present); 

}
}
   var Absent=[];
function absent(sid,i)
{
	var x = document.getElementById('att'+i).checked;
	if(x==false)
	{
	i = parseInt(i-1);
	var row = $("#student_mark").find('tbody').find('tr:eq('+i+')');
	 $(row).css('color', '#f00');
	 
	 $(row).attr("contenteditable", false); 
	
	Absent[i] =sid;
	
   
	}
	else
	{
	
	i = parseInt(i-1);
	var row = $("#student_mark").find('tbody').find('tr:eq('+i+')');
	 $(row).css('color', 'black');
    Absent.splice(i,1);


    }
  }

        
     
function save() {
	
 
  var table = $('#student_mark').tableToJSON(); // Convert the table into a javascript object
  var classname = <?php echo json_encode($classname, JSON_PRETTY_PRINT)?>;
  var subjectid = <?php echo json_encode($subjectid, JSON_PRETTY_PRINT)?>;
  var termid = <?php echo json_encode($termid, JSON_PRETTY_PRINT)?>;
  var value=(JSON.stringify(table));
				$.ajax(
				{
					data:{'records':value,'classid':classname,'subjectid':subjectid,'termid':termid,'absentlist':Absentlist},
					url:baseurl+'Home/emis_school_co_studentmark_add',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						
						 
						 swal("OK", "Student Mark Saved Successfully", "success");
						 window.location.reload();
						
					}
				});
				
  
}
function update()
{
	
  var table = $('#student_mark').tableToJSON(); // Convert the table into a javascript object
  console.log(table);
  //return false;
  var value=(JSON.stringify(table));
  
    var classid = $("#classid").val();
	var subjectid= $("#subid").val();
    var termid=$("#temid").val();
				$.ajax(
				{
					data:{'records':value,'classid':classid,'subjectid':subjectid,'termid':termid,'Absentlist':Absent,'Presentlist':Present},
					url:baseurl+'Home/emis_school_co_studentmark_update',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{ 
						 swal("OK", "Student Mark Updated Successfully", "success");
						 window.location.reload();
						
					}
				});
}
function finalsave()
 {
	 var table = $('#student_mark').tableToJSON(); // Convert the table into a javascript object
     var value=(JSON.stringify(table));
     var classid = $("#classid").val();
	 var subjectid= $("#subid").val();
	 var termid=$("#temid").val();
   swal({
        title: "Are you sure?",
        text: "Do you want to Final Submit? Entries Can't Be Changed !",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ff0000",
        confirmButtonText: "Yes, Final Submit!",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
   }, function(isConfirm){
    if (isConfirm)
				$.ajax(
				{
					data:{'records':value,'classid':classid,'subjectid':subjectid,'termid':termid,'Absentlist':Absent,'Presentlist':Present},
					url:baseurl+'Home/emis_school_co_student_mark_update_final',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{ 
						 swal("OK", "Student Marks Finally Updated Successfully", "success");
						 window.location.reload();
						
					}
				});
				 else
				 
        swal("Cancelled", "Your cancelled the Final Submit", "error");
    });	
	
   }
	var max = 1;
function isNumberKey(evt)
       {
		  
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if(event.target.innerText.length < max) {
           if ((charCode > 64 && charCode < 68) || (charCode > 96 && charCode < 100)) {
        return true;  var value = Number(event.target.innerText);
    }
  }

          return false;
       }
          

        </script>
    </body>
</html>