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
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
		<style>
			td{text-align: center;}
			th{text-align: center;}
			.width1{width: 5%; }
			/* td(text-overflow: ellipsis;} */
		</style>		 
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
                                                    <span class="caption-subject font-dark sbold uppercase">Scholastic Achievement of Children</span>
                                                </div>
                                            </div> 
                                            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                          <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
                                           <li role="presentation">
                                            <a href="<?php echo base_url().'Home/emis_school_student_mark'; ?>" style="background-color: #bff6fb;">
                                              <span class="text">1<sup>th</sup> to 8<sup>th</sup> Standard</span>
                                            </a>
                                          </li>
                                           <li role="presentation">
                                            <a href="<?php echo base_url().'Home/emis_school_student_mark1'; ?>">
                                              <span class="text">9<sup>th</sup> and 10<sup>th</sup> Standard</span>
                                            </a>
                                          </li>
                                        
                                                </ul>
                                            </div> 
                                           
                                            <!-- form begin here -->
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                          				  
                                        				<center>
															<form method="post" action="<?php echo base_url().'Home/emis_school_student_mark';?>">
															
																<div class="form-group">
																	<div class="row">
																			<div class="col-md-2">  
																				<select style="width: 85%;" class="form-control" data-placeholder="Choose a Category" tabindex="1" id="termid" name="termid"  style="width: 80%" required="" >
																						
																						<option value="" >Select Term</option>
																						<option value="1" >Term 1</option>
																						<option value="2" >Term 2</option>
																						<option value="3" >Term 3</option>
																						
																					</select> 
																				
																			</div>
																			
																			<div class="col-md-2">  
																				<select style="width: 90%;" class="form-control" data-placeholder="Choose a Category" tabindex="1" id="schoolwiseclassid" name="schoolwiseclassid"  style="width: 20%" required="" >
																						
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
																				<select style="width: 90%;" class="form-control" data-placeholder="Choose a Section" tabindex="1" id="sectionid" name="sectionid"  style="width: 60%" required="" >
																					<option value="" >Select Section</option>
																				</select>
																			</div>

																			<div class="col-md-2">  
																				<select style="width: 90%;" class="form-control" data-placeholder="Choose a Subject" tabindex="1" id="subjectid" name="subjectid"  style="width: 60%" required="" >
																						<option value="" >Select Subject</option>
																						<!-- <option value="" >Select Subject</option>
																						<option value="1" >Tamil</option>
																						<option value="2" >English</option>
																						<option value="3" >Maths</option>
																						<option value="3" >Science</option>
																						<option value="3" >Social.Science</option> -->
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
                                            </div>
											<!-- form end here -->


                                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    
													<div class="portlet-title">
                                                       <div class="caption">
															<i class="fa fa-globe"></i>Term  :&nbsp;&nbsp;<?php echo $termid?> &nbsp;&nbsp;&nbsp; Class :&nbsp;&nbsp;<?php echo ($sectionid == '0') ? $classname.' / ALL Section' : $classname.' / '.$sectionid ;
															?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subject&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo $subjectname; ?>
															<!-- <?php if($subjectid==1){ echo 'Tamil';}
															 else if($subjectid==2){echo 'English';}  
															 else if($subjectid==3){echo 'Maths';}  
															 else if($subjectid==4){echo 'Science';}  
															 else if($subjectid==5){echo 'Social.Science';}?>	 -->
															<input type="hidden" class="medium" id="classid" value="<?php echo $classname?>">
															<input type="hidden" class="medium" id="subid" value="<?php echo $subjectid?>">
															<input type="hidden" class="medium" id="temid" value="<?php echo $termid?>">
															<input type="hidden" class="medium" id="secid" value="<?php echo $sectionid?>">
															</div> 
                                                        <div class="tools" style="margin-top: 20px;"> </div>
                                                    </div>

                                                    <div class="portlet-body">
													
														<div class="row">
														<br/>
														<!-- <table class="table  table-bordered table-hover" id="header_mark">
															        <tr><th style="display:none">Update ID</th>
																		<th rowspan="2" style="vertical-align : middle;" class="width1">S.No</th>
																		<th style="display:none;">student Id</th>
																		<th rowspan="2" style="vertical-align : middle;width:10%">Assessed ?</th>
																		<th rowspan="2" style="vertical-align : middle;width:25%">Student Name</th>
																		<th colspan="4"><center>FA(A) ACTIVITY</center></th>
																		<th colspan="4"><center>FA(B) ACTIVITY</center></th>
																		<th><center>FA (Out Of 40)</center></th>
																		<th><center>SA (Out Of 60)</center></th>
												                    </tr>																								
																	<tr>
																	    <th class='width1'>I</th>
																		<th class='width1'>II</th>
																		<th class='width1'>III</th>
																		<th class='width1'>IV</th>
																	    <th class='width1'>I</th>
																		<th class='width1'>II</th>
																		<th class='width1'>III</th>
																		<th class='width1'>IV</th>
																		<th>Mark</th>
																		<th>Mark</th>
																	</tr>
												        </table> -->
                                                            <table class="table table-striped table-bordered table-hover" id="student_mark" style="margin-top: -20px;">
                                                            <thead>
															        <!-- <tr><th colspan="3">&nbsp;</th>
																		<th colspan="4"></th>
																		<th colspan="4"><center>FA(B) ACTIVITY</center></th>
																		<th><center>FA (Out Of 40)</center></th>
																		<th><center>SA (Out Of 60)</center></th>
												                    </tr>												 -->
																	<tr>
																		<td style="display:none;">UpdateID</td>															
																		<td style="display:none;"><strong>s.no</strong></td>
																		<td style="display:none;"><strong>student_id</strong></td>
																		<td style="display:none;"><strong>No_assessed</strong></td>
																		<td style="display:none;"><strong>student_name</strong></td>
																		<td style="display:none;">section</td>
																		<td style="display:none;">A</td>
																		<td style="display:none;">B</td>
																		<td style="display:none;">C</td>
																		<td style="display:none;">D</td>
																		<td style="display:none;">E</td>
																		<td style="display:none;">F</td>
																		<td style="display:none;">G</td>
																		<td style="display:none;">H</td>
																		<td style="display:none;">I</td>
																		<td style="display:none;">J</td>
																	</tr>
																	<tr>	  
																		<th style="display:none">Update ID</th>
																		<th rowspan="2" style="vertical-align : middle;" class="width1">S.No</th>
																		<th style="display:none;">student Id</th>
																		<th rowspan="2" style="vertical-align : middle;width:10%">Whether Assessed?</th>
																		<th rowspan="2" style="vertical-align : middle;width:25%">Student Name</th>
																		<th rowspan="2" style="vertical-align : middle;" class="width1">Section</th>
																		<th colspan="4">FA(A) ACTIVITY</th>
																		<th colspan="4">FA(B) ACTIVITY</th>
																		<th>FA (Out Of 40)</th>
																		<th>SA (Out Of 60)</th>
																	</tr>
																	<tr>
																	    <th class='width1'>I</th>
																		<th class='width1'>II</th>
																		<th class='width1'>III</th>
																		<th class='width1'>IV</th>
																	    <th class='width1'>I</th>
																		<th class='width1'>II</th>
																		<th class='width1'>III</th>
																		<th class='width1'>IV</th>
																		<th>Mark</th>
																		<th>Mark</th>
																	</tr>
																	
                                                            </thead>
                                                            <tbody>
                                                             <?php                                                           
															  $i=1;
															  if(!empty($studentlist)){
                                                              foreach($studentlist as $sd)
															   { $studentattendance=$sd['student_attendance'];	   
															 ?>
                                                               <tr>
                                                                    <td style="display:none;"><?php echo $sd['updid']; ?></td>
																	<td><?php echo $i; ?></td>
																	<td style="display:none;"><?php echo $sd['stuid']; ?></td>
																	
																	<?php if($studentattendance==0) { ?>
																	      <td><input type="checkbox" class="myCheckbox"   name="att" id="att<?php echo $i;?>" onclick="attendance(<?php echo $sd['stuid'];?>,<?php echo $i;?>);"></td>
                                                                    <?php } else if($studentattendance==1) { ?>
															        	  <td style="background-color:lightblue;"><input type="checkbox" class="myCheckbox" checked name="att" id="att<?php echo $i;?>" onclick="absent(<?php echo $sd['stuid'];?>,<?php echo $i;?>);"></td>
																	<?php } else { ?>
																	   	  <td style="background-color:red;"> <input type="checkbox" name="att" id="att<?php echo $i;?>" onclick="present(<?php echo $sd['stuid'];?>,<?php echo $i;?>);"></td>
																	<?php } ?>
                                                                    <td style="text-align: left;"><?php echo $sd['name']; ?></td>
																	<td><?php echo $sd['class_section']; ?></td>
																	<td class='width1' contentEditable="true" id="FAA<?php echo $i;?>" onKeypress="return isNumberKey(event);" onblur="isBlur(event,<?php echo $i;?>,1);"><?php echo $sd['FAA']; ?></td>
                                                                    <td class='width1' contentEditable="true" id="FAB<?php echo $i;?>" onKeypress="return isNumberKey(event);" onblur="isBlur(event,<?php echo $i;?>,1);"><?php echo $sd['FAB']; ?></td>
																	<td class='width1' contentEditable="true" id="FAC<?php echo $i;?>" onKeypress="return isNumberKey(event);" onblur="isBlur(event,<?php echo $i;?>,1);"><?php echo $sd['FAC']; ?></td>
                                                                    <td class='width1' contentEditable="true" id="FAD<?php echo $i;?>" onKeypress="return isNumberKey(event);" onblur="isBlur(event,<?php echo $i;?>,1);"><?php echo $sd['FAD']; ?></td>
																	<td class='width1' contentEditable="true" id="FBA<?php echo $i;?>" onKeypress="return isNumberKey(event);" onblur="isBlur(event,<?php echo $i;?>,1);"><?php echo $sd['FBA']; ?></td>
																	<td class='width1' contentEditable="true" id="FBB<?php echo $i;?>" onKeypress="return isNumberKey(event);" onblur="isBlur(event,<?php echo $i;?>,1);"><?php echo $sd['FBB']; ?></td>
                                                                    <td class='width1' contentEditable="true" id="FBC<?php echo $i;?>" onKeypress="return isNumberKey(event);" onblur="isBlur(event,<?php echo $i;?>,1);"><?php echo $sd['FBC']; ?></td>
																	<td class='width1' contentEditable="true" id="FBD<?php echo $i;?>" onKeypress="return isNumberKey(event);" onblur="isBlur(event,<?php echo $i;?>,1);"><?php echo $sd['FBD']; ?></td>
																	<td contentEditable="true" id="FAM<?php echo $i;?>" onKeypress="return isNumberKey(event);" onblur="isBlur(event,<?php echo $i;?>,2);"><?php echo $sd['FAM']; ?></td>
																	<td contentEditable="true" id="SAM<?php echo $i;?>" onKeypress="return isNumberKey(event);" onblur="isBlur(event,<?php echo $i;?>,3);"><?php echo $sd['SAM']; ?></td>
                                                               </tr>
                                                               <?php $i++;  } } ?>
                                                            </tbody>
                                                        </table>
														<br><br>
														<br>
														 <div class="row">
														 <?php
														    if(!empty($studentlist)){
														        $status=$studentlist[0]['status'];
														          if($status==2 || $status==1){
															 ?>
															
															 				<div class="col-md-offset-10 col-md-2">
																				<a href="javascript:;" 
																				class="btn btn-sm green enableOnUpdateButton" style="margin-top: -79px; margin-left: 71px;" id="convert-table" onclick="update();"
																				data-class-section-id ="" > 
																					UPDATE <i class="fa fa-plus-o "></i>
																				</a>
																			</div>
																			
																			<!-- <div class=" col-md-2">
																				<a href="javascript:;" 
																					class="btn btn-sm red" style="margin-top: -79px; " id="final" onclick="finalsave();"
																					data-class-section-id ="<?php echo $d->id;  ?>" > 
																					Final Submit<i class="fa fa-plus-o "></i>
																				</a>
																			</div> -->
																		<?php }
																		 else {
														                ?>
															                  <div class="col-md-offset-10 col-md-2">
																						<a href="javascript:;" 
																						class="btn btn-sm green enableOnSaveButton" style="margin-top: -79px; margin-left: -17px;" id="save" onclick="save();"
																						> 
																							SAVE
																						</a>
																				</div>
																		<?php
																	      }}
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

			var status='';	
			var studentmarktable = <?php echo json_encode($studentlist, JSON_PRETTY_PRINT)?>;

			if(studentmarktable.length != 0 ){
				for (var i = 0; i < studentmarktable.length; i++) {
					var total = Number(studentmarktable[i].FAA)+Number(studentmarktable[i].FAB)+Number(studentmarktable[i].FAC)+Number(studentmarktable[i].FAD)+Number(studentmarktable[i].FBA)+Number(studentmarktable[i].FBB)+Number(studentmarktable[i].FBC)+Number(studentmarktable[i].FBD);
					inx = i+1;
					if(total > 0){
						$('#FAM'+inx).attr('contenteditable', false);
					}else{
						$('#FAM'+inx).attr('contenteditable', true);
					}				
					// console.log(total);
				}
			}

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
				//$(row).prop( "disabled", true);
				$(row).attr("contenteditable", false); 
				//$('#student_mark').find('tbody tr:eq(1)').hide();
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
				
			$('.enableOnSaveButton').attr('disabled', true).text('Loading ...');
			var table = $('#student_mark').tableToJSON(); // Convert the table into a javascript object
			var classname = <?php echo json_encode($classname, JSON_PRETTY_PRINT)?>;
			var subjectid = <?php echo json_encode($subjectid, JSON_PRETTY_PRINT)?>;
			var termid = <?php echo json_encode($termid, JSON_PRETTY_PRINT)?>;
			var tname = '';

			switch(termid){
                                case '1' : tname = 'schoolnew_qstudent_markdetails' ; break; 
                                case '2' : tname = 'schoolnew_qstudent_markterm2' ; break; 
                                case '3' : tname = 'schoolnew_qstudent_markterm3' ; break; 
            }

			var value=(JSON.stringify(table));
			
							$.ajax(
							{
								data:{'records':value,'classid':classname,'subjectid':subjectid,'termid':termid,'absentlist':Absentlist,'tname':tname},
								url:baseurl+'Home/emis_school_studentmark_add',
								type:"POST",
								dataType:"JSON",
								success:function(res)
								{
									
									swal("OK", "Student Mark Saved Successfully", "success");
									$('.enableOnSaveButton').attr('disabled', false).text('SAVE');
									window.location.reload();
									
								}
							});
							
			
			}

			function update()
			{
			$('.enableOnUpdateButton').attr('disabled', true).text('Loading ...');
			var table = $('#student_mark').tableToJSON(); // Convert the table into a javascript object
			var value=(JSON.stringify(table));
			
				var classid = $("#classid").val();
				var subjectid= $("#subid").val();
				var termid=$("#temid").val();
				var tname = '';

			switch(termid){
                                case '1' : tname = 'schoolnew_qstudent_markdetails' ; break; 
                                case '2' : tname = 'schoolnew_qstudent_markterm2' ; break; 
                                case '3' : tname = 'schoolnew_qstudent_markterm3' ; break; 
            }

				// var sectionid=$("#secid").val();
							$.ajax(
							{
								data:{'records':value,'classid':classid,'subjectid':subjectid,'termid':termid,'Absentlist':Absent,'Presentlist':Present,'tname':tname},
								url:baseurl+'Home/emis_school_studentmark_update',
								type:"POST",
								dataType:"JSON",
								success:function(res)
								{ 
									swal("OK", "Student Mark Updated Successfully", "success");
									$('.enableOnSaveButton').attr('disabled', false).text('UPDATE');
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
			// var sectionid=$("#secid").val();
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
							url:baseurl+'Home/emis_school_student_mark_update_final',
							type:"POST",
							dataType:"JSON",
							success:function(res)
							{ 
								swal("OK", "Student Marks Finally Updated Successfully", "success");
								window.location.reload();
								
							}
						});
						else
						
				swal("Cancelled", "Your cancelled the Final Submit","error");
			});	
			
		}
    
		//Maximum number of characters
		var max = 2;
		function isNumberKey(event){
	
			// var charCode = (evt.which) ? evt.which : event.keyCode
			// if (charCode > 31 && (charCode < 48 || charCode > 57))
			//     return false;
			// return true;

			if ((event.keyCode >= 48 && event.keyCode <= 57) || event.keyCode === 13) {
				if(event.target.innerText.length < max) {
					var value = Number(event.target.innerText);
					return true;
				}else{
				return false;
				}
			} else {
				return false;
			}
		}

		function isBlur(event,inx,flag){
			if(flag == 1){
			var arr_fa = [0,0,0,0];
			var arr_fb = [0,0,0,0];
			var ttl_fa = 0; 
			var ttl_fb = 0; 
			var fam = 0;

			var value = Number(event.target.innerText);

			if (value >= 11){
				alert('Please enter the value less than or equal to 10 ');
				$('#'+event.target.id).text('0');
			}

			arr_fa[0] = Number($('#FAA'+inx).text());
			arr_fa[1] = Number($('#FAB'+inx).text());
			arr_fa[2] = Number($('#FAC'+inx).text()); 
			arr_fa[3] = Number($('#FAD'+inx).text());

			arr_fb[0] = Number($('#FBA'+inx).text());
			arr_fb[1] = Number($('#FBB'+inx).text());
			arr_fb[2] = Number($('#FBC'+inx).text()); 
			arr_fb[3] = Number($('#FBD'+inx).text());

			ttl_fa = greaterNumber(arr_fa);
			ttl_fb = greaterNumber(arr_fb);

			fam = ttl_fa + ttl_fb;

				// $('#FAM'+inx).text(fam);
				if(fam > 0){
					$('#FAM'+inx).attr('contenteditable', false).text(fam);
				}else{
					$('#FAM'+inx).attr('contenteditable', true).text(fam);
				}

			}
			else if(flag == 2){
				var value = Number(event.target.innerText);

				if (value >= 41){
					alert('Please enter the value less than or equal to 40 ');
					$('#'+event.target.id).text('0');
				} 
			}
			else if(flag == 3){
				var value = Number(event.target.innerText);

				if (value >= 61){
					alert('Please enter the value less than or equal to 60 ');
					$('#'+event.target.id).text('0');
				}
			}
		}

		function greaterNumber(arr){
			
			var fLargeNum = 0;
			var sLargeNum = 0;
			
			for(var i=0; i<arr.length; i++){
				if(fLargeNum < arr[i]){
					sLargeNum = fLargeNum;
					fLargeNum = arr[i];			
				}else if(sLargeNum < arr[i]){
					sLargeNum = arr[i];
				}
			}
			
			return fLargeNum+sLargeNum;
			
		}

        $("#schoolwiseclassid").change(function () {    
               class_id = $(this).val();
               section_id = null;
			   term_id = $("#termid").val();
               get_section(class_id,section_id);
			   get_textbook(class_id,term_id);
        });

            function get_section(class_id,section_id)
            {
                    if(class_id != '' ){
                                    $.ajax(
                                    {
                                        type: "POST",
                                        url:baseurl+'Home/get_school_section_details',
                                        data:{'class_id':class_id},
                                        success: function(resp, textStatus, xhrContent) {
                                            // $(".alert-danger").hide();
                                            var section = JSON.parse(resp);
                                                                                
                                            $('#sectionid').empty().append('<option value=0>All</option>');
                                          
                                            $.each(section,function(id,val)
                                            {
                                                $('#sectionid').append($('<option></option>').text(val.section).attr('value', val.section));
                                            })

                                            if(section_id !=0 && section_id !=null){
                                               $("#sectionid").val(section_id).attr('selected','selected');   
                                            }else
                                            {
                                                $("#sectionid").val(0).attr('selected','selected');
                                            }      
                                        },
                                        error: OnError
                                    })
                    }
            }


			function get_textbook(class_id,term_id)
            {
                          
                    if(class_id != '' && term_id != ''){
                                    $.ajax(
                                    {
                                        type: "POST",
                                        url:baseurl+'Home/get_textbook_details',
                                        data:{'class_id':class_id,'term_id':term_id},
                                        success: function(resp, textStatus, xhrContent) {
                                            // $(".alert-danger").hide();
                                            var textbook = JSON.parse(resp);
											
											$('#subjectid').empty().append('<option value="" >Select Subject</option>');
                                            $.each(textbook,function(id,val)
                                            {
                                                $('#subjectid').append($('<option></option>').text(val.book_name).attr('value', val.id));
                                            })      
                                        },
                                        error: OnError
                                    })
                    }
            }


			function OnError(xhr, errorType, exception) {
                     try {   responseText = jQuery.parseJSON(xhr.responseText);
                        alert(errorType + " \t " + exception +
                                                + "\n\t• Exception: \t" + responseText.ExceptionType +
                                                + "\n\t• StackTrace: \t" + responseText.StackTrace +
                                                + "\n\t• Message: \t" + responseText.Message );
                     } catch (e) {
                        alert(xhr.status+' ( '+ xhr.statusText + ' ) ');
                     }
                     // alert('Error: ' + e.responseText);
                     return false;  
            }

        </script>
    </body>
</html>