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
            



<?php $this->load->view('state/header.php');?>


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
                                    <!-- BEGIN PAGE TITLE -->
                                    
                                    <!-- END PAGE TITLE -->
                                    <!-- BEGIN PAGE TOOLBAR -->
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
                                                    <span class="caption-subject font-dark sbold uppercase">Number Of Periods to be taught per week</span>
                                                </div>
                                            </div> 
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
                                                          
                                        									  
                                        <center>
                                                  
												   
                                                   

                                              </div>
                                            </div>



                                                


                                               <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                         <div class="caption">
                                                            <i class="fa fa-globe"></i>School Lesson Plan 
															
															</div> 
                                                        <div class="tools" style="margin-top: 20px;"> </div>
                                                    </div>
                                                    <div class="portlet-body">
													
													
													<div class="row">
													
													
<br>												
												
															
                                                      
															 
                                                        <table class="table table-striped table-bordered table-hover" id='lessonplan-table' border="3" style="margin-top: -21px; text-align:center;">

														
                                              
                                                            <tbody>
														

<tr>



<td style="display:none;">SubjectName</td>
<td style="display:none;">SubjectId</td>
<td style="display:none;">1</td>
<td style="display:none;">2</td>
<td style="display:none;">3</td>
<td style="display:none;">4</td>
<td style="display:none;">5</td>
<td style="display:none;">6</td>
<td style="display:none;">7</td>
<td style="display:none;">8</td>
<td style="display:none;">9</td>
<td style="display:none;">10</td>
<td style="display:none;">11</td>
<td style="display:none;">12</td>


</tr>
<tr>

<th style="display:none;" contentEditable="false"><strong>Subjectname</strong></th>
<td  contentEditable="false"  style="color:green; width:10%;"><strong>வகுப்பு </strong></td>
<th style="color:green;text-align:center;" contentEditable="false"><strong>I</strong></th>
<th style="color:green;text-align:center;" contentEditable="false"><strong>II</strong></th>
<th style="color:green;text-align:center;" contentEditable="false"><strong>III</strong></th>

<th style="color:green;text-align:center;" contentEditable="false"><strong>IV</strong></th>
<th style="color:green;text-align:center;" contentEditable="false"><strong>V</strong></th>
<th style="color:green;text-align:center;" contentEditable="false"><strong>VI</strong></th>

<th style="color:green;text-align:center;" contentEditable="false"><strong>VII</strong></th>
<th style="color:green;text-align:center;" contentEditable="false"><strong>VIII</strong></th>
<th style="color:green;text-align:center;" contentEditable="false"><strong>IX</strong></th>
<th style="color:green;text-align:center;" contentEditable="false"><strong>X</strong></th>
<th style="color:green;text-align:center;" contentEditable="false"><strong>XI</strong></th>
<th style="color:green;text-align:center;" contentEditable="false"><strong>XII</strong></th>

</tr>
<tr>
															   <?php
															   $i=1;
															   foreach($week_lesson_plan as $lp)
																{		
																	?>
																
                                                            <td><?php echo $lp->subjects?></td>
															 <td style="display:none;"><?php echo $lp->id?></td>
                                                            <td style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?php echo $lp->c1?></td>
                                                            <td style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?php echo $lp->c2?></td>
                                                             <td style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?php echo $lp->c3?></td>
                                                             <td style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?php echo $lp->c4?></td>
                                                               <td style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?php echo $lp->c5?></td>
                                                               <td style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?php echo $lp->c6?></td>
                                                               <td style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?php echo $lp->c7?></td>
														       <td style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?php echo $lp->c8?></td>
                                                                <td style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?php echo $lp->c9?></td>
                                                                 <td style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?php echo $lp->c10?></td>
                                                                 <td style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?php echo $lp->c11?></td>
																 <td style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?php echo $lp->c12?></td>
                                                               </tr>
															   <?php
															   $i++;
																}
																
																?>
</tbody>
															
                                                        </table>
														<div class="row">
														 
																	
															   <div class="col-md-offset-10 col-md-2">
													  					<a href="javascript:;" 
                                                                           class="btn btn-sm green" id="save1" onclick="savelessonplan();"
                                                                           data-class-section-id ="<?php echo $d->id;  ?>" > 
                                                                            SAVE <i class="fa fa-plus-o "></i>
                                                                        </a>
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
		

function savelessonplan() {
  var table = $('#lessonplan-table').tableToJSON(); // Convert the table into a javascript object
  var value=(JSON.stringify(table));
  // console.log(value);
  // return false;
				$.ajax(
				{
					data:{'records':value},
					url:baseurl+'State/emis_school_lesson_plan_add',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						
						 
						 swal("OK", "Lesson Plan Saved Successfully", "success");
						 window.location.reload();
						
					}
				});
  
}
function updatestudentreg()
{
  var table = $('#studentreg-table').tableToJSON();
  var value=(JSON.stringify(table));
  console.log(value);
  return false;
				$.ajax(
				{
					data:{'records':value},
					url:baseurl+'Home/emis_school_lesson_plan_add',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						
						 
						 swal("OK", "School Student Data Update Successfully", "success");
						 window.location.reload();
						
					}
				});
}






function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}      

       
               
               //emis_no_sections
               
            
      

        </script>



    </body>

</html>