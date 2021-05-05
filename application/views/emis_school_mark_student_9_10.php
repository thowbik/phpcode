
<?php //print_r($classdetails); die; ?>
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
                                                <br/>
                                              
                                            </div>
                                          <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                          <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
                                           <li role="presentation">
                                            <a href="<?php echo base_url().'Home/emis_school_student_mark'; ?>">
                                              <span class="text">1<sup>th</sup> to 8<sup>th</sup> Standard</span>
                                            </a>
                                          </li>
                                           <li role="presentation">
                                            <a href="<?php echo base_url().'Home/emis_school_student_mark1'; ?>" style="background-color: #bff6fb;">
                                              <span class="text">9<sup>th</sup> and 10<sup>th</sup> Standard</span>
                                            </a>
                                          </li>
                                        
                                                </ul>
                                            </div> 
															<div class="tab-content">
																<div class="tab-pane active" id="tab_default_1">
																	<!-- form start here -->
																		<div class="portlet-body">
																			<div class="row">
																				<div class="col-md-12">		
																					<center>
															<form method="post" action="<?php echo base_url().'Home/emis_school_student_mark1';?>">
															
																<div class="form-group">
																	<div class="row">
																			<div class="col-md-2">  
																				<select style="width: 85%;" class="form-control" data-placeholder="Choose a Category" tabindex="1" id="termid" name="termid"  style="width: 80%" required="" >
																						
															    <option value="" >Select Term</option>
																<option value="1">I - mid term</option>
																<option value="2" selected>Quarterly</option>
																<option value="3" >II - mid term</option>
																<option value="4">Half Yearly</option>
																<option value="5" >III - mid term</option>
																<option value="6">Annual</option>
																<!--<option value="7" >Annual</option>-->
																						
																					</select> 
																				
																			</div>
																			
			<div class="col-md-2">  
				<select style="width: 90%;" class="form-control" data-placeholder="Choose a Category" tabindex="1" id="schoolwiseclassid" name="schoolwiseclassid" onchange="get_section(this.value,'sectionid');get_textbook(this.value,document.getElementById('termid').value)"  style="width: 20%" required="" >
																						
						<option value="" >Select Class</option>
																							
						<?php  foreach($classdetails as $sc) {
							if($sc['id']>=9 && $sc['id']<=10){
								echo('<option value="'.$sc['id'].'"'.'>'.$sc['class_studying'].'</option>');
							}
						}?>
																						
				</select> 
		</div>

		<div class="col-md-2">
		<select style="width: 90%;" class="form-control" data-placeholder="Choose a Section" tabindex="1" id="sectionid" name="sectionid"  style="width: 60%" required="" >
		<option value="" >Select Section</option>
		</select>
		</div>

		<!--<div class="col-md-2">  
		<select style="width: 90%;" class="form-control" data-placeholder="Choose a Subject" tabindex="1" id="subjectid" name="subjectid"  style="width: 60%" required="" >
				<option value="" >Select Subject</option>
				<!-- <option value="" >Select Subject</option>
		        <option value="1" >Tamil</option>
			    <option value="2" >English</option>
			    <option value="3" >Maths</option>
				<option value="3" >Science</option>
				<option value="3" >Social.Science</option> -->
		<!--</select> 
																				
	</div>-->
		<div class="col-md-2">
				<button type="submit"  class="btn green" id="emis_stu_searchsep_sub" >SUBMIT</button>
		</div>

</div>
<br/>
 <div class="row"><h6 style="color: red; font-size: initial; text-align: ">NOTE: If any Student Absent for any subject Don't enter zero(0) for that subject.Leave the cell blank.</h6></div>
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
															<i class="fa fa-globe"></i>EXAM  :&nbsp;&nbsp;<?php
															if($termid==1){
															 echo 'I - Mid Term';
															}
															else if($termid==2)
															{
                                                            echo 'Quarterly';
															}
															else if($termid==3)
															{
                                                            echo 'II - Mid Term';
															}
															else if($termid==4)
															{
                                                            echo 'Half Yearly';
															}
															else if($termid==5)
															{
                                                            echo 'III - Mid Term';
															}
															else if($termid==6)
															{
                                                            echo 'Aunnal';
															}

															?> &nbsp;&nbsp;&nbsp; Class :&nbsp;&nbsp;<?php echo ($sectionid == '0') ? $classname.' / ALL Section' : $classname.' / '.$sectionid ;
															?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															<!--Subject&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo $subjectname; ?>-->
															<!-- <?php if($subjectid==1){ echo 'Tamil';}
															 else if($subjectid==2){echo 'English';}  
															 else if($subjectid==3){echo 'Maths';}  
															 else if($subjectid==4){echo 'Science';}  
															 else if($subjectid==5){echo 'Social.Science';}?>	 -->
															<input type="hidden" class="medium" id="classid" value="<?php echo $classname?>">
															<input type="hidden" class="medium" id="subid" value="<?php echo $subjectid?>">
															<input type="hidden" class="medium" id="subname" value="<?php echo $subjectname?>">
															<input type="hidden" class="medium" id="temid" value="<?php echo $termid?>">
															<input type="hidden" class="medium" id="secid" value="<?php echo $sectionid?>">
															</div> 
                                                        <div class="tools" style="margin-top: 20px;"> </div>
                                                    </div>

                                                    <div class="portlet-body">
													
														<div class="row"  style="overflow-x:scroll;">
														<br/>
														
             <table class="table table-striped table-bordered table-hover" id="student_mark" style="margin-top: -20px;" >
              <thead>
					
		                   <tr>
							  <td  style="display:none;">UpdateID</td>										
							  <td style="display:none;"><strong>s.no</strong></td>
							  <td style="display:none;"><strong>student_id</strong></td>
							  <td style="display:none;"><strong>No_assessed</strong></td>
							  <td style="display:none;">Reason</td>
							  <td style="display:none;"><strong>student_name</strong></td>
							  <td style="display:none;">section</td>
							  <td style="display:none;">A</td>
							  <td style="display:none;">B</td>
							  <td style="display:none;">C</td>
							  <td style="display:none;">D</td>
							  <td style="display:none;">E</td>
							  <td style="display:none;">F</td>
						      <td style="display:none;">G</td>
				             
						</tr>
						<tr>
							<th  style="display:none;">UPDATE ID</th>
					<th style="vertical-align : middle;"></th>
					<th style="display:none;"></th>
					<th  style="vertical-align : middle;"></th>
					<th style="vertical-align : middle;"></th>
					<th  style="vertical-align : middle;"></th>
					<th  style="vertical-align : middle;"></th>
					<th style="vertical-align : middle;">LANGUAGE-I</th>
				    <th style="vertical-align : middle;">ENGLISH</th>
					<th style="vertical-align : middle;">MATHS</th>
					<th colspan="2" style="vertical-align : middle;">SCIENCE</th>
				   
					<th style="vertical-align : middle;">SOCIAL</th>
					<th style="vertical-align : middle;">TOTAL</th>
						</tr>
				<tr>	  
					<th  style="display:none;">UPDATE ID</th>
					<th style="vertical-align : middle;">S.NO</th>
					<th style="display:none;">STUDENT ID</th>
					<th  style="vertical-align : middle;">WHETHER<br/>ASSESSED ?</th>
					<th style="vertical-align : middle;">REASON</th>
					<th  style="vertical-align : middle;">STUDENT NAME</th>
					<th  style="vertical-align : middle;">SECTION</th>
					<th style="vertical-align : middle;">Out Of 100</th>
				    <th style="vertical-align : middle;">Out Of 100</th>
					<th style="vertical-align : middle;">Out Of 100</th>
					<th style="vertical-align : middle;">Theory<br/>Out Of 75</th>
				    <th style="vertical-align : middle;">Practical<br/>Out Of 25</th>
					<th style="vertical-align : middle;">Out Of 100</th>
					<th style="vertical-align : middle;">Out Of 500</th>
				</tr>
																
																	
           </thead>
                 <tbody id="stdatten">
                 <?php                                                           
		  $i=1;
		  if(!empty($studentlist)){ 
             foreach($studentlist as $sd)
			  { $studentattendance=$sd['access'];	   //print_r($sd['access_reason']); print_r($sd['access']);
															 ?>
          <tr>
        <td  style="display:none;"><?php echo $sd['updid']; ?></td>

	    <td><?php echo $i; ?></td>

		<td style="display:none;"><?php echo $sd['stuid']; ?></td>
        
	   <?php if($studentattendance==0) { ?>
	    <td id="<?php echo $sd['stuid'];?>"><input type="checkbox" class="myCheckbox"   name="att" id="att<?php echo $i;?>" onclick="attendance(<?php echo $sd['stuid'];?>,<?php echo $i;?>); get_att(this,'<?php echo $sd['stuid'];?>');"></td>

            
       <?php } else if($studentattendance==1) { ?>
       <td id="<?php echo $sd['stuid'];?>" style="background-color:lightblue;"><input type="checkbox" class="myCheckbox" checked name="att" id="att<?php echo $i;?>" onclick="absent(<?php echo $sd['stuid'];?>,<?php echo $i;?>); get_att(this,'<?php echo $sd['stuid'];?>')"></td>

		<?php } else { ?>

       <td id="<?php echo $sd['stuid'];?>" style="background-color:red;"> <input type="checkbox" name="att" id="att<?php echo $i;?>" onclick="present(<?php echo $sd['stuid'];?>,<?php echo $i;?>); get_att(this,'<?php echo $sd['stuid'];?>')"></td>
		<?php } ?>
	    

       <td  style="text-align: left;"><?php echo $sd['acc_reason']; ?></td>

       <td style="text-align: left;"><?php echo $sd['name']; ?></td>
	   <td><?php echo $sd['class_section']; ?></td>

	  <td class='width1' contentEditable="true" id="FAA<?php echo $i;?>" onKeypress="return isNumberKey(event);" onblur="isBlur(event,<?php echo $i;?>,1);"><?php echo $sd['lang']; ?></td>

      <td class='width1' contentEditable="true" id="FAB<?php echo $i;?>" onKeypress="return isNumberKey(event);" onblur="isBlur(event,<?php echo $i;?>,1);"><?php echo $sd['eng']; ?></td>

	  <td class='width1' contentEditable="true" id="FAC<?php echo $i;?>" onKeypress="return isNumberKey(event);" onblur="isBlur(event,<?php echo $i;?>,1);"><?php echo $sd['maths']; ?></td>

      <td class='width1' contentEditable="true" id="FAD<?php echo $i;?>" onKeypress="return isNumberKey(event);" onblur="isBlur(event,<?php echo $i;?>,3);"><?php echo $sd['science']; ?></td>

	  <td class='width1' contentEditable="true" id="FBA<?php echo $i;?>" onKeypress="return isNumberKey(event);" onblur="isBlur(event,<?php echo $i;?>,2);"><?php echo $sd['pract']; ?></td>

	  <td class='width1' contentEditable="true" id="FBB<?php echo $i;?>" onKeypress="return isNumberKey(event);" onblur="isBlur(event,<?php echo $i;?>,1);"><?php echo $sd['social']; ?></td>
	 
	  <td contentEditable="true" id="FAM<?php echo $i;?>" onKeypress="return isNumberKey(event);" onblur="isBlur(event,<?php echo $i;?>,2);"><?php echo $sd['total']; ?></td>

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
			<a href="javascript:;" 	class="btn btn-sm green enableOnUpdateButton" style="margin-top: -79px; margin-left: 71px;" id="convert-table" onclick="update();"	data-class-section-id ="" > 
			UPDATE <i class="fa fa-plus-o "></i></a>
		</div>
																			
																			 <div class=" col-md-2">
																				<a href="javascript:;" 
																					class="btn btn-sm red" style="margin-top: -79px; " id="final" onclick="finalsave();"
																					data-class-section-id ="<?php echo $d->id;  ?>" > 
																					Final Submit<i class="fa fa-plus-o "></i>
																				</a>
																			</div> 
																		<?php }
																		 else {
														                ?>
 <div class="col-md-offset-10 col-md-2">
<a href="javascript:;" class="btn btn-sm green enableOnSaveButton" style="margin-top: -79px; margin-left: -17px;" id="save" onclick="save();"> SAVE</a>
</div>
<?php
}}
?>				
																					</div> 
																					</div>
																				</div>

																		</div>
																	<!-- END EXAMPLE TABLE PORTLET-->           						
																</div>
							
																	<!-- END EXAMPLE TABLE PORTLET-->           						
																</div>
															</div>
														</div>
													</div>

                                            

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
        	/* <?php  if(empty($studentlist)){   ?>
        	window.onload=function(){
        		document.getElementById('termid').value=2;
        		document.getElementById('schoolwiseclassid').value=9;
        		document.getElementById('schoolwiseclassid').onchange();
        		setTimeout(function(){
        			document.getElementById('emis_stu_searchsep_sub').click();
        		},1000);
        		
        	};
        <?php } ?>*/

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
			var subjectname = <?php echo json_encode($subjectname, JSON_PRETTY_PRINT)?>;
			var termid = <?php echo json_encode($termid, JSON_PRETTY_PRINT)?>;
			var tname = '';
    //  console.log(subjectid);
    var reson=JSON.stringify(get_chk());
			switch(termid){
                                case '1' : 
                                case '3' :
                                case '5' :
                                tname = 'schoolnew_qstudents_highsclterm' ; break; 
                                case '2' :
                                case '4' : 
                                case '6' :
                                tname = 'schoolnew_qstudents_highsclyrly' ; break; 
            }

			var value=(JSON.stringify(table));
			
							$.ajax(
							{
								data:{'records':value,'classid':classname,'subjectid':subjectid,'subjectname':subjectname,'termid':termid,'absentlist':Absentlist,'tname':tname,'reason':reson},
								//url:baseurl+'Home/emis_school_studentmark_add',
								url:baseurl+'Home/emis_school_studentmark_add1',
								type:"POST",
								dataType:"JSON",
								success:function(res)
								{
									if(res){
										swal("OK", "Student Mark Saved Successfully", "success");
										$('.enableOnSaveButton').attr('disabled', false).text('SAVE');
										window.location.reload();
									}else if(!res){
										swal("OK", "No Editing Found", "warning");
										$('.enableOnSaveButton').attr('disabled', false).text('SAVE');
										window.location.reload();
									}else if(res==-1){
										swal("OK", "Login Failed.. Relogin", "danger");
										$('.enableOnSaveButton').attr('disabled', false).text('SAVE');
										window.location.href='<?php echo(base_url()); ?>';
									}
									
								}
							});
							
			
			}

			function update()
			{
			//$('.enableOnUpdateButton').attr('disabled', true).text('Loading ...');
			var table = $('#student_mark').tableToJSON(); // Convert the table into a javascript object
			var value=(JSON.stringify(table));
			
				var classid = $("#classid").val();
				var subjectid= $("#subid").val();
				var subjectname= $("#subname").val();
				var termid=$("#temid").val();
				var tname = '';
          var reson=JSON.stringify(get_chk());
         // alert(reson);
         
			switch(termid){
                                case '1' : 
                                case '3' :
                                case '5' :
                                tname = 'schoolnew_qstudents_highsclterm' ; break; 
                                case '2' :
                                case '4' : 
                                case '6' :
                                tname = 'schoolnew_qstudents_highsclyrly' ; break; 
            }

				// var sectionid=$("#secid").val();
							$.ajax(
							{
								data:{'records':value,'classid':classid,'subjectid':subjectid,'subjectname':subjectname,'termid':termid,'Absentlist':Absent,'Presentlist':Present,'tname':tname,'reason':reson},
								//url:baseurl+'Home/emis_school_studentmark_update',
								url:baseurl+'Home/emis_school_studentmark_update1',

								type:"POST",
								dataType:"JSON",
								success:function(res)
								{ 
                                   
									if(res){
										swal("OK", "Student Mark Saved Successfully", "success");
										
										$('.enableOnUpdateButton').attr('disabled', false).text('SAVE');
										window.location.reload();
										
									}else if(!res){
										swal("OK", "No Editing Found", "warning");
										
										$('.enableOnUpdateButton').attr('disabled', false).text('SAVE');
										window.location.reload();
										
									}else {
										swal("OK", "Login Failed.. Relogin", "danger");

										$('.enableOnUpdateButton').attr('disabled', false).text('SAVE');
										 window.location.reload();
									
									}
									
								}

							});
							//swal("OK", "Student Mark Updated Successfully", "success");
							
			}

		function finalsave()
		{
			var table = $('#student_mark').tableToJSON(); // Convert the table into a javascript object
			var value=(JSON.stringify(table));
			var classid = $("#classid").val();
			var subjectid= $("#subid").val();
			var termid=$("#temid").val();
			// var sectionid=$("#secid").val();
			 var reson=JSON.stringify(get_chk());
         // alert(reson);
         
			switch(termid){
                                case '1' : 
                                case '3' :
                                case '5' :
                                tname = 'schoolnew_qstudents_highsclterm' ; break; 
                                case '2' :
                                case '4' : 
                                case '6' :
                                tname = 'schoolnew_qstudents_highsclyrly' ; break; 
            }
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
							data:{'records':value,'classid':classid,'subjectid':subjectid,'termid':termid,'Absentlist':Absent,'Presentlist':Present,'reason':reson,'tname':tname},
							url:baseurl+'Home/emis_school_student_mark_update_final1',
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
		var max = 3;
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
			var arr_fa = [0,0,0,0,0,0];
			//var arr_fb = [0,0,0,0];
			var ttl_fa = 0; 
			//var ttl_fb = 0; 
			var fam = 0;

			var value = Number(event.target.innerText);

			if (value >= 101){
				alert('Please enter the value less than or equal to 100');
				$('#'+event.target.id).text('');
			}

			arr_fa[0] = Number($('#FAA'+inx).text());
			arr_fa[1] = Number($('#FAB'+inx).text());
			arr_fa[2] = Number($('#FAC'+inx).text()); 
			arr_fa[3] = Number($('#FAD'+inx).text());

			arr_fa[4] = Number($('#FBA'+inx).text());
			arr_fa[5] = Number($('#FBB'+inx).text());
			//arr_fb[2] = Number($('#FBC'+inx).text()); 
			//arr_fb[3] = Number($('#FBD'+inx).text());
       for(i=0; i < arr_fa.length; i++){
       	ttl_fa +=arr_fa[i] << 0;
       }
			
			//ttl_fb = greaterNumber(arr_fb);

			fam = ttl_fa;

				// $('#FAM'+inx).text(fam);
				if(fam > 0){
					$('#FAM'+inx).attr('contenteditable', false).text(fam);
				}else{
					$('#FAM'+inx).attr('contenteditable', true).text(fam);
				}

			}
			else if(flag == 2){
				var value = Number(event.target.innerText);

				if (value >= 26){
					alert('Please enter the value less than or equal to 25 ');
					$('#'+event.target.id).text('0');
				} 
			}
			else if(flag == 3){
				var value = Number(event.target.innerText);

				if (value >= 76){
					alert('Please enter the value less than or equal to 76 ');
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

        /*$("#schoolwiseclassid").change(function () {    
               class_id = $(this).val();
               section_id = null;
			   term_id = $("#termid").val();
               get_section(class_id,section_id);
			   get_textbook(class_id,term_id);
        });*/

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
                                                                                
                                            $('#'+section_id).empty().append('<option value=0 selected>All</option>');
                                          
                                            $.each(section,function(id,val)
                                            {
                                                $('#'+section_id).append($('<option></option>').text(val.section).attr('value', val.section));
                                            })

                                            /*if(section_id !=0 && section_id !=null){
                                               $("#sectionid").val(section_id).attr('selected','selected');   
                                            }else
                                            {
                                                $("#sectionid").val(0).attr('selected','selected');
                                            }*/      
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
            function get_att(node,id)
            {

              var td=document.getElementById(id).nextElementSibling;
             var cmv="";
             var prnode=node.parentNode.parentNode;
	           //  alert(td);
	           if(!node.checked){
	             cmv='<select id="'+id+'" name="'+id+'" onchange="get_chk(this.value)"><option value="CWSN">CWSN</option> <option value="Dropped Out">Dropped Out</option> <option value="New Admission">New Admission</option> </select>';
	             	 //alert(prnode);
	             	 for(var i=7;i<prnode.children.length;i++){
	             	 	prnode.children[i].innerHTML=0;
	             	 }

	            }else{
	            	
	             	 for(var i=7;i<prnode.children.length;i++){
	             	 	prnode.children[i].innerHTML="";
	             	 }
	            }
             td.innerHTML=cmv;
            }


            
            function get_chk(){

            	var tb=document.getElementById('stdatten');
            	var bx=null;
            	var resArr=new Object();
            	for(var i=0;i<tb.children.length;i++){
            		bx=tb.children[i].children[4].children[0];
            		if(bx instanceof HTMLSelectElement){
            			//alert(bx.parentNode.previousElementSibling.id);
            			resArr[bx.parentNode.previousElementSibling.id]=bx.value;
            		}
            	}
            	return resArr;

            }

        </script>
    </body>
</html>