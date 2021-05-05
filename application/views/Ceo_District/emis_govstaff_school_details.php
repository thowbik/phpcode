

<?php 
// print_r($blockwise_schoolinfo);
?>
<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    <style> 
.center 
{
text-align: center;
} 
body.modal-open {
    overflow-y: hidden !important;
    position: fixed;
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
    
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->
	   <div class="container">
   
 

  <!-- Modal -->
<div class="modal fade" id="test" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width:140%">
        <div class="modal-header">
          <button type="button" class="close" onclick="refresh();" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Class And Sections</h4>
        </div>
		<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#aabcfe;}
.tg td{font-family:Arial,align:center; sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#669;
}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#039;background-color:#b9c9fe;}
.tg .tg-phtq{border-color:inherit;text-align:left;vertical-align:top}
.tg .tg-hmp3{text-align:left;vertical-align:top}
.tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-ydyv{border-color:inherit;text-align:right;vertical-align:top}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
.tg .tg-dvpl{border-color:inherit;text-align:right;vertical-align:top}
</style>
<center>

       <table class="tg" id="myTable">
  <tbody>
    <tr>
     
    </tr>
	
  </tbody>
  
  
</table>
	   </center>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick="refresh();" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 
  
</div>

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

<?php $this->load->view('Ceo_District/header.php'); ?>

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
                                    <div class="page-title">
                                       
                                    </div>
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
                                     

                                       
           
                                        <!-- BEGIN CARDS -->
                                        <div class="row margin-bottom-20">
                                             <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
														
                                                            <i class="fa fa-globe"></i>Staffs Transfer Request<span> </span></div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                                      
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
														
                                                            <thead>
                                                                <tr>
																
                                                       <th class="center">S.No</th>
                                                      <th>Name</th>
													  <!--<th>TeacherCode</th> -->
                                                                    <th>Gender</th>
                                                                     
                                                       <th class=" ">Professional</th>
													<th>Date of Appointment</th>
																	<!-- <th class=" ">StaffPersentJoin</th>
																	  <th class=" ">staff_psjoin
																	  </th>-->
																	  <th class="center">Designation</th>
																	  <th class=" ">Subject</th>
																	 <!-- <th class=" ">Surplus</th>
																	 <th class=" ">Save</th> -->
																	 <th class=" ">PDF</th>
																	                                                                                             </tr>
                                                                </thead>
                                                               <tbody>
                                                            <?php
                                                          
                                                          $i=1;							  		
												 if(!empty($govstaff_school_details))
												 { foreach($govstaff_school_details as $sd){   
														  // print_r($sd->teacher_code);		
														   ?>

                                                                <tr>
                                                                    <td class="center"><?= $i;?></td>
																<td id="techname<?= $i;?>"  >	
																<a  
                                                                        onclick="opentab('<?= $sd->teacher_code;?>')">
																	
                                                                  <?php echo $sd->teacher_name;?></a></td> 

																	
                                                                    <td id="gen <?= $i;?>"><?php echo $sd->gender==1?'Male':'Female'; ?></td>
																	
                                                                    <!-- <td class="center"><?=$sd->staff_join;?></td>-->
																	  <td class="center"><?=$sd->professional;?></td>
									 <td class="center"><?= date('d-m-Y',strtotime($sd->staff_join))?></td>
																	<!--  <td class="center"><?=$sd->staff_pjoin;?></td>
																	  <td  class="center"><?=$sd->staff_psjoin;?></td> -->
																	  
																	  <td  class="center"><?=$sd->type_teacher;?></td>
																	  <td>
																	  <?php echo $sd->appsub; ?></td>
																	  <!--  <td id="check" <?= $i;?>>
																		<input type="checkbox" class="checkbox" id="profile<?= $i ?>" name="profile_counts[]"> 	
																   </td>
																 <td>
																 <button type="submit" onclick="savevalid(<?= $i ?>);"class="btn btn-primary">Save</button>
																   </td> -->
																   <td><a href="<?=base_url().'Ceo_District/generate_pdf/'.$sd->teacher_code?>"><i class="fa fa-file-pdf-o"></i></a></td>
																	
																	
                                                                  
                                                                
                                                                  

                                                                </tr>
                                                                <?php $i++;  }  ?>
                                                                
                                                      
                                                            </tbody>
                                                       
                                                            <?php }
													?>
															
                                                        </table>

                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END CARDS -->
										<!------------ Teacher Edit Moadl----------------->
        
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg" style="width: 1046px !important;">
      <div class="modal-content">
            <div class="modal-header">
              
            </div>
          <div class="modal-body">
		  <div class="panel panel-success">
                <div class="panel-heading">
                Transfer Application
                </div>
                 <div class="panel-body">
                <!-- <div class="row">
                 <div class="col-md-3 col-md-6" style="border-right: 2px solid #abe7ed;height: 90px;"> 
                  <span style="margin-right: 0px;"><input type="checkbox" name=" profile_count[]" class="check" value="1">Government School</span>
                  <span style="margin-right: 15px;"><input type="checkbox" name=" profile_count[]" class="check" value="2">Municipal School</span>                 
                  </div> 
                  <div class="col-md-1 col-md-6"> 
                  <span style="margin-right: 15px;"><input type="checkbox" name=" profile_count[]" class="checkbox"  value="1">Within Block</span>
                 <span style="margin-right: 15px;"><input type="checkbox" name=" profile_count[]" class="checkbox"  value="2">Block To Block</span>
                  <span style="margin-right: 15px;"><input type="checkbox" name=" profile_count[]" class="checkbox"  value="3">District To District </span>
                 <!-- <span style="margin-right: 0px; display: block; "><input type="checkbox" name=" profile_count[]" class="checkbox"  value="4">District To District</span> 
				 
				 
                  </div>
                  </div> -->
				  
				  <div class="row">
                 <div class="col-md-6" style="border-right: 2px solid #abe7ed;height: 30px;">  <div class="col-md-12">
                    <div class="col-md-6">
                        <span style="margin-right: 15px;"><input type="checkbox" name=" profile_count[]" class="check" value="1">Panchayat School</span>
                 </div>
                 <div class="col-md-6">
                    <span style="margin-right: 15px;"><input type="checkbox" name=" profile_count[]" class="check" value="2">Municipal School</span>
                 </div>
                 </div>
                                   
                  </div> 
                  <div class="col-md-6"> 
                    <div class="col-md-12">
                    <div class="col-md-4">
                         <span style="margin-right: 0px;"><input type="checkbox" name=" profile_count[]" class="checkbox"  value="1" style="display: inline-block;">Within Block</span>
                 </div>
                 <div class="col-md-4">
                   <span style="margin-right: 0px;"><input type="checkbox" name=" profile_count[]" class="checkbox"  value="2" style="display: inline-block;">Block To Block</span>
                 </div>
                 <div class="col-md-4">
                   <span style="margin-right: 0px;"><input type="checkbox" name=" profile_count[]" class="checkbox"  value="3" style="display: inline-block;">District To District </span>
                 </div>
                 </div>
                 
                 
                  
                 <!-- <span style="margin-right: 0px; display: block; "><input type="checkbox" name=" profile_count[]" class="checkbox"  value="4">District To District</span> -->
 
 
                  </div>
                  </div>
                  <hr>
                  <div class="row">
                  <div class="col-md-4"> 
                       <label class="control-label">Name of the Teacher</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control" id="name_teacher" name="name_teacher" placeholder="" required readonly>  
						<!--   <input type="hidden" class="form-control" id="code_teacher" name="code_teacher" placeholder="" required>
						   <input type="hidden" class="form-control" id="curschool_id" name="curschool_id" placeholder="" required> -->	                      
                       </div>                        
                  </div>
                  <div class="col-md-4"> 
                       <label class="control-label">Gender</label>
                       <div class="form-group">                     
                     <!--  <select class="form-control"  id="gerder" name="gerder" required="">
                            <option value="">Select Option *</option> 
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select> -->
						<input type="text" class="form-control" id="gerder" name="gerder" placeholder="" required readonly>   
                       </div>                        
                  </div>
                  <div class="col-md-4"> 
                       <label class="control-label">Date of Birth</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control" id="DOB" name="DOB" placeholder="" required readonly>                      
                       </div>                        
                  </div> 
                 <!-- <div class="col-md-4"> 
                       <label class="control-label">Date of Retirement</label>
                       <div class="form-group">                     
                          
 
                                                        <input type="text" name="emis_reg_stu_doj"  class="form-control date1" id="dat1" value="" autocomplete="off" placeholder="YYYY-DD-MM"  onkeypress="return event.charCode >= 48"required />
                                                     
                                                  					   
                       </div>                        
                  </div> -->
                  <div class="col-md-4"> 
                       <label class="control-label">Mobile Phone No</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control" id="phoneno" name="phoneno" placeholder="" required readonly>                      
                       </div>                        
                  </div>
                  <div class="col-md-4"> 
                       <label class="control-label">Designation</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control" id="designation" name="designation" placeholder="" required readonly>
						    <input type="hidden" class="form-control" id="designation_id" name="designation_id" placeholder="" required readonly>
						   
                       </div>                        
                  </div> 
                  <div class="col-md-4"> 
                       <label class="control-label">Subject</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control" id="subject" name="subject" placeholder="" required readonly>                      
                       </div>                        
                  </div>
                  <div class="col-md-4"> 
                       <label class="control-label">Education District</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control" id="education_district" name="education_district" placeholder="" required readonly>  
						   <input type="hidden" class="form-control" id="education_district_id" name="education_district_id" placeholder="" required readonly>  
					   
                       </div>                        
                  </div>
                  <div class="col-md-4"> 
                       <label class="control-label">Revenue District</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control" id="revenue_district" name="revenue_district" placeholder="" required readonly>
 <input type="hidden" class="form-control" id="revenue_district_id" name="revenue_district_id" placeholder="" required >   						   
                       </div>                        
                  </div> 
				  
				   <div class="col-md-4"> 
                       <label class="control-label">Block</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control" id="revenue_block" name="revenue_block" placeholder="" required readonly>
 <input type="hidden" class="form-control" id="revenue_block_id" name="revenue_block_id" placeholder="" required >   						   
                       </div>                        
                  </div>
                  <div class="col-md-4"> 
                       <label class="control-label">First date of joining in the present post</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control" id="firstdateofjoining" name="firstdateofjoining" placeholder="" required readonly>                      
                       </div>                        
                  </div>
                  <div class="col-md-4"> 
                       <label class="control-label">Date of regularisation in the present post</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control" id="firstdateofregularisation" name="firstdateofregularisation" placeholder="" required readonly>                      
                       </div>                        
                  </div>
                  <div class="col-md-4"> 
                       <label class="control-label">Date of joining in the present school</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control" id="school_office" name="school_office" placeholder="" required readonly>                      
                       </div>                        
                  </div> 
                  <div class="col-md-4"> 
                       <label class="control-label">Nature of joining in the present School</label>
                       <div class="form-group">
                       <select class="form-control"  id="joining_present_school" name="joining_present_school" required="" >
                           <option value="">Select Option *</option> 
                            <?php foreach($teacher_join_reason as $res) {   ?>
                                                          <option  value="<?php echo $res->id;?>">
														  <?php echo $res->joining_reason; ?></option>
                                                          <?php  } ?> 
                        </select>    
                       </div>                        
                  </div>
                  <div class="col-md-4"> 
                       <label class="control-label">Name and address of the present school</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control" id="address_present_school" name="address_present_school" placeholder="" required readonly>                      
                       </div>                        
                  </div>
                  <div class="col-md-4"> 
                       <label class="control-label">Reason for the transfer request</label>
                       <div class="form-group"> 
                            <input type="text" class="form-control" id="transfer_request" name="transfer_request" placeholder="" required>
                       </div>                        
                  </div> 
                <div class="col-md-4" id ="dissch"> 
                       <label class="control-label">Details of the district to which transfer is requested</label>
                       <div class="form-group"> 
					   
                        <!-- <select  class="form-control"  id="joining_present_school_name" name="joining_present_school_name" required="" onchange="getIndex(this.value)">
						 
						  
                            <option  value="">Select Option *</option> 
                           <?php foreach($staff_school as $res) {   ?>
						   
                                                          <option   
														  value="<?php echo $res->school_id;?>">
														  <?php echo $res->school_name; ?></option>
                                                          <?php  } ?>
                         </select>  -->

<select style="width: 90%;" class="form-control" data-placeholder="Choose a Category" tabindex="1" id="joining_present_school_name" name="joining_present_school_name"  style="width: 60%" required=""  onchange="getIndex(this.value)" >
                                                            <input type="hidden" class="form-control" id="sch_name" name="sch_name" placeholder="" required>
                                                               </select> 						 
                       </div> 
                  </div>  
                
                  <div class="col-md-4" id="Edn"> 
                       <label class="control-label">Edn. District</label>
                       <div class="form-group">    
                       <input type="text" class="form-control" id="edn_district" name="edn_district" placeholder="" required>
					     <input type="hidden" class="form-control" id="edn_district_id" name="edn_district_id" placeholder="" required>
						 
					   
                       </div>                        
                  </div>
                  <div class="col-md-4" id="Dis" > 
                       <label class="control-label">District</label>
                       <div class="form-group">    
                       <input type="text" class="form-control" id="district" name="district" placeholder="" required>
					   
					    <input type="hidden" class="form-control" id="district_id" name="district_id" placeholder="" required>
                       </div>                        
                  </div>
                   
				   
				     <div class="col-md-4" > 
                       <label class="control-label">Penal Type</label>
                       <div class="form-group">  
				       <select class="form-control"  id="panel_types" name="panel_types" required="">
                           <option value="">Select Panel</option>
                            <?php foreach($panel_type as $res) {   ?>
                                                          <option value="<?php echo $res->id;?>" ><?php echo $res->panel_type; ?></option>
                                                          <?php  } ?>   
														  
                        </select> 
                </div>                        
                  </div>
                  <div class="col-md-8"> 
                       <label class="control-label">Details of the priority if claimed</label>
                       <div class="form-group">   
                       <select class="form-control"  id="priority_if_claimed" name="priority_if_claimed" required="">
                           <option value="" >Select</option> 
                            <?php foreach($teacher_trans_priority as $res) {   ?>
                                                          <option value="<?php echo $res->priority;?>" ><?php echo $res->  description; ?></option>
                                                          <?php  } ?>  
                        </select>  
                         <span class="label-text" style="color:gray;">(should be supported by proper documents)</span>
                       </div>                        
                  </div> 
                  <div class="col-md-4 pro_clime" id="DOD"> 
                       <label class="control-label">Date of death</label>
                       <div class="form-group">    
                      
					   <input type="text" name="date_of_death"  class="form-control date1" id="date_of_death" value="" autocomplete="off" placeholder="YYYY-DD-MM"  onkeypress="return event.charCode >= 48"required />
                       </div>                        
                  </div> 
                  <div class="col-md-4 pro_clime" id="DOT"> 
                       <label class="control-label">Date of treatment</label>
                       <div class="form-group">    
                       <input type="text" name="date_of_treatment"  class="form-control date1" id="date_of_treatment" value="" autocomplete="off" placeholder="YYYY-DD-MM"  onkeypress="return event.charCode >= 48"required />
					   
                       </div>                        
                  </div> 
				 
				  
                  <div class="col-md-4 pro_clime" id="EHWW"> 
                       <label class="control-label">Either husband or wife working in State / Central / Govt. Undertakings office and which located in a place which is more than 30 K.m. of distance from another may be considered with necessary certification from the competent authority</label>
                       <div class="form-group">    
                       <input type="text" class="form-control" id="distkg" name="distkg" placeholder="" required>
                       </div>                        
                  </div>
				  
				   <div class="col-md-4 pro_clime" id="tr_dist"> 
                       <label class="control-label">District with Spouse Working</label>
                       <div class="form-group">   
                       <select class="form-control"  id="distkg1" name="distkg1" required="">
                           <option value="" > Select District</option> 
                            <?php foreach($dist_id as $res) {   ?>
                                                          <option value="<?php echo $res->id;?>" ><?php echo $res->district_name; ?></option>
                                                          <?php  } ?>  
														  
                        </select>  
                         <span class="label-text" style="color:gray;"></span>
                       </div>                        
                  </div> 

                  <div class="col-md-4 pro_clime"id="Swork"> 
                       <label class="control-label">Distance between the places of where the employee is working and his/her spouse is working</label>
                       <div class="form-group">    
                       <input type="text" class="form-control" id="distemp" name="distemp" placeholder="" required>
                       </div>                        
                  </div>
				  
				   <div class="col-md-4"> 
                      
                       <div class="form-group"> 
<label class="control-label">
</label>	</br>				   
                        <button type="submit" onclick="save_valid();"class="btn btn-primary">Save</button>
						
                       </div>                        
                  </div>
              </div>
            </div>
  </div>
		  </div>
		  </div>
		  </div>
		  </div>


                                         <!-- BEGIN BLOCK BUTTONS PORTLET-->
                                                                   
                                                                    <!-- BEGIN BLOCK BUTTONS PORTLET-->

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

                  <?php $this->load->view('footer.php'); ?>
        </div>

        <?php $this->load->view('scripts.php'); ?>
   <script src="<?php echo base_url().'asset/js/district.js';?>" type="text/javascript"></script>


    <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/moment.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/jquery.mockjax.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
              <script>
			  
			  
// var surplus_verification = new Array();
// var techcode = new Array();
// $(".checkbox").click(function(){
	

    // surplus_verification = new Array();
   
       // $.each($(".checkbox:checked"), function() {
		   
           // var data = $(this).parents('tr:eq(0)');

           // techcode.push($(data).find('td:eq(0)').text().trim());
           // surplus_verification.push({ 
		   // 'techcode':$(data).find('td:eq(2)').find('input').val(),
            // 'techcode':$(data).find('td:eq(2)').find('input').val()
             
// , sur:($(data).find('td:eq(10)').find('input[type="checkbox"]:checked').val())
// });            
       // });
       
       // $("#techcode").html('<h5>'+techcode.length+' Selected</h5>');
       // if ($("input[name='profile_counts[]']:checked").length == $(".checkbox").length ){
        // $("#select_all").prop('checked', true);
    // }else
    // {
        // $("#select_all").prop('checked', false);
       
    // }
// // console.log(school_verification);
   // });

			  
			  
			  
			  
	// function savevalid(i)
			// {
				// // alert(i);
				
				
				// surplus_verification =surplus_verification;
				
					// // console.log(surplus_verification);
                   // // return false;		
					// $.ajax(
          // {
// data:{'surplus':surplus_verification},

// url:baseurl+'Ceo_District/sur_plus',
// type:"POST",
// dataType:"JSON",

// success:function(res)
// {
// swal("OK", " Save Successfully", "success");

// }
// });
				
			// }		  

 $.fn.datepicker.defaults.format = "dd-mm-yyyy";
	
$(".date1").datepicker({
	
   
});	


var table = '';
$(document).ready(function()
{
     table = sum_dataTable('#sample_3');
});

function sum_dataTable(dataId){
    var table = $(dataId).DataTable({
      dom: 'Bfrtip',
        buttons: [
                { extend: 'print', className: 'btn default' },
                { extend: 'pdf', className: 'btn default' },
                { extend: 'csv', className: 'btn default' }
            ],
    "footerCallback": function ( row, data, start, end, display ) {
        this.api().columns('.sum').every(function () {
            var column = this;
          var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
            var sum = column
               .data()
               .reduce(function (a, b) { 
                console.log(a);
                   a = intVal(a, 10);
                   if(isNaN(a)){ a = 0; }
                   
                   b = intVal(b, 10);
                   if(isNaN(b)){ b = 0; }
                   
                   return a + b;
               });
column.selector.opts.page='current';
               var currentPage = column
               .data()
               .reduce(function (a, b) { 
                   a = parseInt(a, 10);
                   if(isNaN(a)){ a = 0; }
                   
                   b = parseInt(b, 10);
                   if(isNaN(b)){ b = 0; }
                   
                   return a + b;
               });
               
            
            $(column.footer()).html(sum);
                        });
            }
        });
		return table;
    }
	
	
	///this function used to dataentry
	 
	    var staffinfos = <?php echo json_encode($govstaff_school_details);?>;
		var stafftranschool = <?php echo json_encode($school);?>;
	 // console.log(stafftranschool);
		var teacher_join_reason = <?php echo json_encode($teacher_join_reason);?>;
		var teacher_trans_priority = <?php echo json_encode($teacher_trans_priority);?>;
		var dist_id = <?php echo json_encode($dist_id);?>;
		var panel_type = <?php echo json_encode($panel_type);?>;
		
		var staffinfo = '';
		var staffin ='';
		
	
     function opentab(id)
    {
		
		 $("#Edn").hide();
		 $("#Dis").hide();
		 $(".pro_clime").hide();
		 
		   
		   
		 staffinfo = staffinfos.filter(stu=>stu.teacher_code == id)[0];
		 
		 console.log(staffinfo);
		
		   
		 $("#name_teacher").val(staffinfo.teacher_name);
		 
		
		 $("#DOB").val(chnage_date_format(staffinfo.staff_dob));
		 
		  
		 $("#subject").val(staffinfo.appsub);
		 $("#designation").val(staffinfo.type_teacher);
		  $("#designation_id").val(staffinfo.des_id);
		 
    	 $("#gerder").val(staffinfo.gender);
		 
		var genter=staffinfo.gender;
         if(genter==1)
		 {
			  $("#gerder").val('Male');
		 }
			else
			{
				 $("#gerder").val('Female');
			}	
	    $("#phoneno").val(staffinfo.mbl_nmbr);
		 $("#education_district").val(staffinfo.edu_dist_name);
		 $("#revenue_district ").val(staffinfo.district_name);
		 $("#revenue_block").val(staffinfo.block_name);
		 $("#education_district_id").val(staffinfo.edu_dist_id);
		 $("#revenue_district_id ").val(staffinfo.district_id);
		 $("#firstdateofjoining").val(chnage_date_format(staffinfo.staff_pjoin));
		 // var x = <?php date('d-m-Y',strtotime(staffinfo.staff_join));?>
         // $("#firstdateofjoining").val(x);
		 $("#firstdateofregularisation").val(chnage_date_format(staffinfo.maxdates));
         $("#school_office").val(chnage_date_format(staffinfo.staff_psjoin));
		 $("#address_present_school").val(staffinfo.school_name + staffinfo. e_prsnt_doorno +staffinfo.e_prsnt_place);	
		 
        //,staffinfo.e_prsnt_distrct,staffinfo.e_prsnt_pincode	staffinfo.e_prsnt_doorno,udise_code	 
		$("#joining_present_school").val(staffinfo.joining_reason).attr('selected','selected');
        $("#priority_if_claimed").val(staffinfo.description).attr('selected','selected');
		$("#distkg1").val(staffinfo.district_id).attr('selected','selected');
		$("#penal_types").val(staffinfo.panel_type).attr('selected','selected');
		 $("#joining_present_school_name").val(staffin.district_name).attr('selected','selected');
		 // $("#district_id").val(staffin.district_id);
		 // $("#edn_district_id").val(staffin.edu_dist_id);
		
		
		
			$("#priority_if_claimed").change(function()
			
			{
				var pic = $(this).val();
				 $(".pro_clime").hide();
				 if(pic==3)
				{
				  $("#DOT").hide();	
				}
			    else if(pic==1)
				{
				 $("#DOD").hide();	
				}
				else if(pic==12)
				{
					 $("#tr_dist").show();
			         $("#Swork").show();
		
				}
			})
			
			 
			 
			 
		
		
		 $("#myModal").modal('show');
	
	}
	
	var dist_school = [];
$(".checkbox").click(function(){
dist_school = new Array();
$.each($(".checkbox:checked"), function() {
	
	var checkedValue = $(this).val();
	 
	 dist_school.push(checkedValue);

});	  
	var max_district = max(dist_school);
	var data = '';
	switch(parseInt(max_district))
	{
		case 1:
		data = {'school_id':staffinfo.school_id,'flag':1};
		$("#dissch").hide();
		break;
		case 2:
		data = {'school_id':staffinfo.school_id,'flag':2};
		$("#dissch").hide();
		break;
		case 3:
		data = {'school_id':staffinfo.school_id,'flag':3};
		$("#dissch").show();
		break;
		// case 4:
		// data = {'school_id':staffinfo.school_id,'flag':4};
		// break;
		
	}
	$.ajax({
		method:"POST",
		dataType:"JSON",
		data:data,
		url:"<?=base_url().'Ceo_District/get_dynamic_school_details'?>",
		success:function(resg)
		{
			stafftranschool = resg;
        var section_drop = '<select name="section_id" class="form-control" id="section_id">';
		
        section_drop += '<option value=0>Select Section</option>';
		
        $.each(resg,function(id,val)
        {
			
            section_drop +='<option value='+ val.id +'>'+val.district_name+'</option>';
        })
            section_drop +='</select>';
            
            $("#joining_present_school_name").empty('');            
            $("#joining_present_school_name").html(section_drop);
		},
	})
});			  

function max(input) {
     if (toString.call(input) !== "[object Array]")  
       return false;
  return Math.max.apply(null, input);
	}
	
	function getIndex(sa)
		{
			 
			staffin = stafftranschool.filter(stu=>stu.id == sa)[0];
			
			// $("#Edn").show();
		    // $("#Dis").show();
			// $("#edn_district").val(staffin.edu_dist_name);
			// $("#district").val(staffin.district_name);
			
			
			// $("#edn_district_id").val(staffin.edu_dist_id);
			$("#district_id").val(staffin.id);
			$("#sch_name").val(staffin.district_name);
			
		    // $("#joining_present_school_name").val(staffin.school_name);
		
		}
	
	function save_valid(){
	  // alert ("hi");
	  
	  var dist_school = [];
	  $.each($(".checkbox:checked"), function() {
	
	var checkedValue = $(this).val();
	 
	 dist_school.push(checkedValue);

});	




  var dist = [];
	  $.each($(".check:checked"), function() {
	
	var checkedValue = $(this).val();
	 
	 dist.push(checkedValue);
	

});	


	  
		$("#err_msg").html('');
		var trans_stu = $("#transfer_request").val();
		var teachername = $("#name_teacher").val();
		var Staffdob =  $("#DOB").val();
		var subject =  $("#subject").val();
		var designation =  $("#designation_id").val();
    	var genders =  $("#gerder").val();
		
		if(genders == 'Female')
		{
			var gender=2;
			
		}
		else{
			var gender=1;
			
		}
		var transfer = 1;
		var phoneno = $("#phoneno").val();
		var edist = $("#education_district_id").val();
		var redist = $("#revenue_district_id ").val();
		var fdjoin = $("#firstdateofjoining").val();
		var fdregulsr = $("#firstdateofregularisation").val();
        var soffice = staffinfo.staff_psjoin;
		//$("#school_office").val();
		var praddress = $("#address_present_school").val();		
	    var	jpschool =	$("#joining_present_school").val();
		// console.log(jpschool);
		// return false;
        var pic = $("#priority_if_claimed").val();
		var datereq =$("#dat1").val();
		
		
		var distkg =$("#distkg1").val();
		
		var distemp = $("#distemp").val();
	    var dod =$("#date_of_death").val();
		var dot =$("#date_of_treatment").val();
		
		var chagedistname= $("#edn_district").val();
		var	chagedistid =$("#district").val();
		var school_name =$("#sch_name").val();
		var transdistrict_id =$("#district_id").val();
		var transedndistrict_id= $("#edn_district_id").val();
		var appointed_subject= $("#appointed_subject").val();
		// alert(school_name );
		var panel_type = $("#panel_types").val();
	
		
		
                    data = {'trans_stu':trans_stu,'teachername' :teachername ,'Staffdob' :Staffdob ,'subject' :staffinfo.id ,'designation' :designation ,'gender' :gender ,'phoneno' :phoneno ,'edist' : edist,'redist' : redist,'fdjoin' :fdjoin ,'fdregulsr' :fdregulsr ,'soffice' : soffice,'praddress' :praddress ,'jpschool' : jpschool,'pic' :pic,'datereq':datereq,'school_type' :staffinfo.school_type_id,'school_id':staffinfo.school_id,'teacher_code':staffinfo.teacher_code,'distkg':distkg,'distemp':distemp,'school_name':school_name ,'chagedistid':chagedistid,'chagedistname':chagedistname,'block':staffinfo.block_id,'transschool_id':staffin.school_id,'dod':dod,'dot':dot,'transedndistrict_id':transedndistrict_id,'transdistrict_id':transdistrict_id,'sschool':dist,'transfer_location':dist_school,'appointed_subject':appointed_subject,'transfer':transfer,'panel_type':panel_type};
					// console.log(data);
					// return false;
					
                    $.ajax(
                    {
                        method:"POST",
                        dataType:"JSON",
                        url:'<?=base_url()."Ceo_District/staffs_transfer"?>',
                        data:data,
                        success:function(res)
                        {
							
							alert("saved Successfully", "success");
                           location.reload();;
                        }
                    })
                }
				
			function chnage_date_format(date)
            {
				if(date !='0000-00-00' && date !=null){
              var date_join = new Date(date);
              console.log(date_join);
              var doj_month = date_join.getMonth()+1;
              var doj = (date_join.getDate() < 10 ? '0'+date_join.getDate():date_join.getDate())+'-'+(doj_month < 10 ? '0'+doj_month:doj_month)+'-'+date_join.getFullYear();

              return doj;
				}else 
				{
					return '';
				}
            }
			
			$('input.check').on('change', function() {
            $('input.check').not(this).prop('checked', false);  
});
				

        </script>
    </body>

</html>