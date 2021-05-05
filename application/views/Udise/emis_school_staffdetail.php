<!DOCTYPE html>

      <html lang="en">
         <!-- BEGIN HEAD -->
         <head>
            <?php $this->load->view('head.php'); ?>
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-table/bootstrap-table.min.css';?>" rel="stylesheet" type="text/css" />
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
               <?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
               <?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
               <?php $this->load->view('block/header.php'); }else{ ?>
               <?php $this->load->view('header.php'); }?>
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
                                    <h1>Staff Information
                                       <small>Staff profile edit and update</small>
                                    </h1>
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
                              <div class="container">
                                 <div class="col-md-12">
                                    
									<div class="row">
                                          <?php  if($picid == "" || $picid == NULL) { ?>
                                          <div class="col-md-2">
                                            <div class="circular--portrait">
                                               <img  src="<?php echo base_url().'asset/images/avat.jpg';?>";  alt="" /> 
                                            </div>
                                          </div>
                                      <?php } else {   ?>
                                          <div class="col-md-2">
                                            <div class="circular--portrait">
                                               <img  src="https://s3.ap-south-1.amazonaws.com/tnschoolsawsphoto/<?php echo $picid; ?>";  alt="" /> 
                                            </div>
                                          </div>
                                      <?php  }  ?>
                                       <div class="col-md-9" style="margin-left: -6%">
                                          <div class="pull-left">
                                             <span class="testimonials-name">

                                                <h3 style="margin-top:0px;"> <a style="text-decoration: none; color:red;"><?php echo $staff[0]->teacher_name.' - '.$staff[0]->teacher_code; ?></a></h3>
												<!--<h3 style="margin-top:0px;"> <a style="text-decoration: none; color:red;"><?php echo $staff[0]->teacher_name; ?></a></h3>
												<h3 style="margin-top:0px;"> <a style="text-decoration: none; color:red;"><?php echo $staff[0]->udise_code; ?></a></h3>-->
                                               <ul class="list-inline">
                                               <li>
												<font style="color:#2AABB5;"><i class="fa fa-calendar"></i></font>  DOB :  <?php echo (date('d-m-Y', strtotime($staff[0]->staff_dob)));?> 
												</li>
                                                <li>
                                                   <font style="color:#2AABB5;"><i class="fa fa-male"></i></font> Gender : <td>
                                                           <?php
                                                                          if ($staff[0]->gender==1) {
                                                                           echo "Male";
                                                                          }
                                                                          else if($staff[0]->gender== 2){
                                                                            echo "Female";
                                                                          }
                                                                          else{

                                                                              if($staff[0]->gender==3){
                                                                                echo "Transgender";
                                                                              }else if($staff[0]->gender==''){
                                                                                echo "";
                                                                              }    
                                                                            }
                                                             ?>
                                                         </td>
                                                </li>
                                           
                                            </ul>
                                            <ul class="list-inline">
                                              <li>
                                                <font style="color:#2AABB5;"><i class="fa fa-credit-card"></i></font>  Aadhaar number :   <?php 
                                                                          $aadhar = $staff[0]->aadhar_no;
                                                                           if($aadhar!=""){ echo 'XXXX-XXXX-'.substr($aadhar, -4); 
                                                                    } ?> 
                                              </li>
                                            </ul>
                                            <!-- <ul class="list-inline">
                                            <li>
                                            <font style="color:#2AABB5;"><i class="fa fa-rebel"></i> </font> Religion - Community - Subcaste : Hindu - OC - General </li>
                                            </ul> -->
                                            
                                             </span>
                                             <br/>
                                            
                                          </div>
                                          
                                       </div>
                                       <!-- <div class="col-md-1" style="margin-left: 6%;">
                                                <a href="" class="pull-right"  > <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a> 
                                           
                                            <input type="hidden" id="emis_stu_transfer0_id" name="emis_stu_transfer0_id" value="66025018976231720031">
                                            
                                                
                                          </div> -->
                                    </div>
                                   
                                    
                                    <div class="row">
                                       <div class="carousel-info container">
                                     <div class="col-md-12 thumbnail">                                        
                                      <span class="col-md-6">
									  
											<center>
                                                <h3 class="testimonials-name-in">Personal Information</h3>
                                            </center>
                                                <table class="table table-striped">
                                                   <tbody>
														
													  
													  <tr>
                                                        <td><b>Blood Group</b></td>
														 
                                                        <td><?php echo $staff[0]->group; ?></td>
														
                                                      </tr>
													  <!--<tr>
                                                         <td><b>Date of birth</b></td>
                                                         <td><?php echo $staff[0]->staff_dob; ?></td>
                                                      </tr>-->
													  <tr>
                                                         <td><b>Social Category</b></td>
                                                         <td><?php echo $staff[0]->social_cat;?></td>
                                                      </tr>
													  <tr>
                                                         <td><b>Type of Teacher</b></td>
                                                       
                                                        <td><?php echo $staff[0]->desgination; ?></td>
														 
                                                      </tr>
													   <tr>
                                                        <td><b>Appointed for Subject</b></td>
                                                        <td><?php echo $staff[0]->appsub; ?>
                                                        </td>
													</tr>

                                                      <tr>
                                                         <td><b>Father's Name</b></td>
                                                         <td><?php echo $staff[0]->e_prnts_nme; ?></td>
                                                      </tr>
													  <tr>
                                                         <td><b>Mother's Name</b></td>
                                                         <td><?php echo $staff[0]->teacher_mother_name; ?></td>
                                                      </tr>
													  <tr>
                                                         <td><b>Spouse Name, if any.</b></td>
                                                         <td><?php echo $staff[0]->teacher_spouse_name; ?></td>
                                                      </tr>
                                                      
                                                       <tr>
                                                         <td><b>Type of Disability, If any:</b></td>
                                                         <td>
                                                         <?php if($staff[0]->disability_type=1) echo 'Not applicable';
                                                         else if($staff[0]->disability_type=2) echo 'Physically Challenged'; else echo 'Visually Impaired'; ?></td>
                                                      </tr>
                                                    
                                                     <tr>
                                                        <td>
                                                            <b>Differently abled Details(including percentage)</b>
                                                        </td>
                                                         <td><?php echo $staff[0]->types_disability; ?></td>
                                                      </tr>
                                                    
                                                    
                                                      
                                                    </tbody>
                                                </table>
                                             </span>
											 
											 <span class="col-md-6">
											 <a href="<?php echo base_url().'Udise_staff/emis_school_staffdata1/'.$staff[0]->u_id?>" class="pull-right" style="margin-top: 2%; margin-right: 25px;" target="_blank">
												<i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>
										<center>
                                            <h3 class="testimonials-name-in">Joining Details</h3>
                                        </center>
										
                                            <table class="table table-striped">
                                                <tbody>
													<tr>
                                                        <td><b>Date of Joining in Service</b></td>
                                                        <td><?php echo (date('d-m-Y', strtotime($staff[0]->staff_join))); ?></td>
													</tr>
													<tr>
                                                        <td><b>Date of Joining in Present Post</b></td>
                                                        <td><?php echo (date('d-m-Y', strtotime($staff[0]->staff_pjoin))); ?></td>
													</tr>
													<tr>
                                                        <td><b>Date of Joining in Present School</b></td>
                                                        <td><?php echo (date('d-m-Y', strtotime($staff[0]->staff_psjoin))); ?></td>
													</tr>
													
													 <tr>
                                                          <td><b>GPF/CPS/EPF Details</b></td>
                                                          <td>
                                                            <b>Select type of GPF/CPS/EPF</b>
                                                            <?php echo $staff[0]->cps_gps_details; ?>
                                                            <b>GPF/CPS/EPF Number</b>
                                                            <?php echo $staff[0]->cps_gps; ?>
                                                            <b>Suffix</b>
                                                            <?php echo $staff[0]->suffix; ?>
                                                         </td>
                                                      </tr>
													
													 <tr>
                                                         <td><b>Nature of appointment</b></td>
                                                         <td>
                                                           <?php 
                                                              if (!$staff[0]->appointment_nature=='') {
                                                                  switch ($staff[0]->appointment_nature) {
                                                                    case 1:
                                                                        echo "Regular";
                                                                      break;

                                                                    case 2:
                                                                        echo "Contract";
                                                                      break;
                                                                    
                                                                    case 3:
                                                                        echo "Part-Time";
                                                                      break;
                                                                    
                                                                  }
                                                              }
                                                            ?>
                                                         </td>
                                                      </tr>
													  
													 <tr>
                                                         <td><b>Mode of Recruitment</b></td>
                                                        <td><?php echo $staff[0]->recruit_type; ?> <b>Rank:</b> <?php echo $staff[0]->recruit_rank; ?> <b>Year:</b> <?php echo $staff[0]->recruit_year; ?></td>
                                                      </tr>
													   	
												</tbody>
											</table>
										</span>

                                             
										</div>
	       							</div>
    						    </div> 
								<div class="row">
                                    <div class="carousel-info container">
                                     <div class="col-md-12 thumbnail">
										<span class="col-md-6">
												
														<center>
															<h3 class="testimonials-name-in">Communication Details</h3>
														</center>
														<table class="table table-striped">
														<tbody>
                                                      <tr>
                                                         <td><b>Mobile number</b></td>
                                                         <td><?php  if($staff[0]->mbl_nmbr!=""){ echo  'XXXXXX'.substr($staff[0]->mbl_nmbr, -4); }?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><b>Email id</b></td>
                                                        <td><?php if($staff[0]->email_id!=""){ echo substr($staff[0]->email_id,0,4).'XXXXXXX'.substr($staff[0]->email_id, -9); } ?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><b>Address:</b></td>
                                                         <td><?php echo $staff[0]->e_prsnt_doorno.' - '.$staff[0]->e_prsnt_street
                                                         .' - '.$staff[0]->e_prsnt_place.' - '.$staff[0]->district_name.' - '.$staff[0]->e_prsnt_pincode; ?>.</td>
                                                      </tr>
                                                      <!--<tr>
                                                         <td><b>District</b></td>
                                                         
                                                         <td><?php echo $e_prsnt_distrct.' - '.$e_prsnt_pincode; ?></td>
                                                        
                                                      </tr>-->
													  
													  
													 
													  
													  
													  
                                                   </tbody>
                                                </table>
                                                
                                             </span>
										
										<center>
                                            <h3 class="testimonials-name-in">Academic Details</h3>
                                        </center>
										<span class="col-md-6">
                                            <table class="table table-striped">
                                                <tbody>
													<tr>
                                                        <td><b>Academic</b></td>
                                                        <td><?php echo $staff[0]->academic_teacher; ?></td>
													</tr>
                                                     <tr>
															<td>
                                                            <b>UG:</b></td>
															<td>
                                                             <?php echo $staff[0]->ug_degree; ?>
                                                            </td>
                                                         </tr>
                                                          <tr>
															<td>
                                                            <b>PG:</b></td>
															<td>
                                                             <?php echo $staff[0]->pg_degree; ?>
                                                            </td>
                                                         </tr>
													<tr>
                                                        <td><b>Professional</b></td>
                                                        <td><?php echo $staff[0]->professional; ?></td>
													</tr>
													
												</tbody>
											</table>
										</span>
									</div>
									</div>
								</div>
								<div class="row">
                                    <div class="carousel-info container">
                                     <div class="col-md-12 thumbnail">
										
										<span class="col-md-6">
										<center>
                                            <h3 class="testimonials-name-in">Main Subjects Taught</h3>
                                        </center>
										
                                            <table class="table table-striped">
                                                <tbody>
													<tr>
                                                        <td><b>Subject 1:</b></td>
                                                        
                                                        
                                                        <td> <?php echo $staff[0]->ts1; ?></td> 
                                                             
													</tr>
                                                    <tr>
                                                    <td><b>Subject 2:</b></td>
                                                     <td> <?php echo $staff[0]->ts2; ?></td> 
                                                    </tr>
													<tr>
                                                        <td><b>Subject 3:</b></td>
                                                        <td> <?php echo $staff[0]->ts3; ?></td>
                                                         
													</tr>
												</tbody>
											</table>
										</span>
										</div>
										</div>
										</div>
								
                              </div>
                            </div>
                          </div>
                          <!-- END PAGE CONTENT BODY -->
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
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/moment.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/jquery.mockjax.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js';?>" type="text/javascript"></script>
            <!-- Js for hide and show the tables and datas -->
            <script src="<?php echo base_url().'asset/global/plugins/emis2.js';?>" type="text/javascript"></script>
            <!-- Js for hide and show the tables and datas ending-->
            <script src="<?php echo base_url().'asset/global/plugins/jquery.validate.min.js';?>"></script>
            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <!-- END PAGE LEVEL SCRIPTS -->
            <script>
               var yesno = [];
               $.each({
                   "1": "Yes",
                   "2": "No"        
               }, function(k, v) {
                   yesno.push({
                       id: k,
                       text: v
                   });
               });
               
   	           
               
                   
               
               
            </script>

         </body>


      </html>