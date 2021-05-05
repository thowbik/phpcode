<!DOCTYPE html>

      <html lang="en">
         <!--<![endif]-->
         <!-- BEGIN HEAD -->
         <head>
            <?php $this->load->view('head.php'); ?>
          
        <!-- BEGIN PAGE LEVEL PLUGINS -->
		<link href="<?php echo base_url().'asset/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css';?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url().'asset/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/css/support/custom-vivek.css';?>" rel="stylesheet" type="text/css" />

         </head>
         <!-- END HEAD -->
         <style type="text/css">
            label.error { float: none; color:#dd4b39; }
         </style>
         <body class="page-container-bg-solid page-md">
            <div class="page-wrapper">
               <?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
               <?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
               <?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 9) { ?>
               <?php $this->load->view('Ceo_District/header.php'); }else if($this->session->userdata('emis_user_type_id') == 6) { ?>
               <?php $this->load->view('beo_Block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 10) { ?>
               <?php $this->load->view('Deo_District/header.php'); }else{ ?>
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
                                   
                                    <!-- <div class="m-heading-1 border-green m-bordered">
                                       <h3>Basic Information</h3>
                                       </div> -->
                                    
									<div id="tabs"  style="padding-left: 34px;">
 
                                        <ul class="nav nav-tabs">
                                            <li <?php if($tabactive=='')
											{ ?> 	class="active";
												
											
												<?php
											}
                     ?>							 id="tabset1">
                                                <a data-toggle="tab" onclick="openCity('London')"><b>Volunteer Teachers Registaration</b></a>
                                            </li>
                                            <li <?php if($tabactive==1)
											{ ?> 	class="active";
												
											
												<?php
											}
                     ?>											 id="tabset2">
                                                <a data-toggle="tab" onclick="openCity('Paris')"><b>Volunteer Teachers Subject Details</b></a>
                                            </li>
 
                                        </ul>
                                    </div>
                                    <br />
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="tab-pane" id="tab_2">
                                             
                                       <!-- error displaying part -->
									   
											 <!-- END PAGE CONTENT INNER -->
                                       <!-- error displaying part end -->
                                                   <!-- BEGIN FORM-->
                                                   
												   <div id="London" class="tabcontent tab-pane fade in ">
                                                   
                                                        <!-- BEGIN PAGE CONTENT INNER -->
                                                      <?php if ($this->session->flashdata('staff')){ ?> 
                                                
                                                                <div class="page-content-inner">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="note note-danger note-bordered">
                                                                            <?php echo $this->session->flashdata('staff'); ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                      <?php } ?>
                                             
                                                      <div class="portlet light ">
                                                
                                                       <div class="portlet-body form" id="dialogform">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <i class="icon-equalizer font-green-haze"></i>
                                                                <span class="caption-subject font-green-haze bold uppercase">Volunteer Teachers Registration</span>
                                                            </div>
                                                        </div>
														  <label><h3>Personal Information</h3></label>
														   <div class="form-body">
                                                         
                                                           <div class="row">
                                                            
															<!--<div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Name of the Teacher*</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="emis_reg_staff_name" name="emis_reg_staff_name" placeholder="ஆசிரியர் பெயர் " maxlength="60" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" onkeyup='this.value=this.value.toUpperCase();hasWhiteSpace(this);' onfocus="textvalidate(this.id,'emis_reg_staff_name_alert');" onchange="textvalidate(this.id,'emis_reg_staff_name_alert');" autocomplete="off" required />
																	 <p>Name followed by Initial Eg. Ganesh R</p>
                                                                     <font style="color:#dd4b39;"><div id="emis_reg_staff_name_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>-->
                                                            <?php if($this->session->userdata('emis_user_type_id') == 9 || $this->session->userdata('emis_user_type_id') == 10 || $this->session->userdata('emis_user_type_id') == 6 ) { ?>        
															     <input type="hidden" name="office_id" id="office_id" value="<?php echo $office_id[0]->office_id;?>"> 
                                                                 <input type="hidden" name="off_key_id" id="off_key_id" value="<?php echo $office_id[0]->off_key_id;?>">
                                              
                                                                 <input type="hidden" name="status" id="status" value="O">
                                                            <?php } else { ?>
                                                                <input type="hidden" name="office_id" id="office_id" value=""> 
                                                                <input type="hidden" name="off_key_id" id="off_key_id" value="<?php echo $this->session->userdata('emis_school_id');?>">
                                              
                                                                <input type="hidden" name="status" id="status" value="S">
                                                            <?php } ?>
															<div class="col-md-6">
																 <div class="form-group">
																<label class="control-label col-md-3">Name of the Teacher*</label>
																<div class="col-md-9">
																<input type="text" class="form-control" id="emis_reg_staff_name" name="emis_reg_staff_name" placeholder="பணியாளர் பெயர் " maxlength="60" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" onkeyup='this.value=this.value.toUpperCase();hasWhiteSpace(this);' onfocus="textvalidate(this.id,'emis_reg_staff_name_alert');" onchange="textvalidate(this.id,'emis_reg_staff_name_alert');" autocomplete="off" required >
																
																<font style="color:#dd4b39;"><div id="emis_reg_staff_name_alert"></div></font>
																</div>
																
																</div>
																
															</div>
															
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3"> Aadhaar Number* </label>
                                                                  <div class="col-md-9">
                                                                    <input type="text" class="form-control" id="emis_reg_staff_aadhaar" name="emis_reg_staff_aadhaar" placeholder="ஆதார் எண்" maxlength="12" onfocus="textvalidate(this.id,'emis_reg_staff_aadhaar_alert');" onchange="textvalidate(this.id,'emis_reg_staff_aadhaar_alert');" autocomplete="off" onblur="return aadharcheck(this);"  required>
																	<font style="color:#dd4b39;"><div id="emis_reg_staff_aadhaar_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                         </div>
                                                     

                                                      <div class="row">
                                                            
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3"> Gender* </label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" id="emis_reg_staff_gender" name="emis_reg_staff_gender" onfocus="textvalidate(this.id,'emis_reg_staff_gender_alert');" onchange="textvalidate(this.id,'emis_reg_staff_gender_alert');" autocomplete="off" required>
                                                                        <option value="" selected="selected">பாலினம்</option>
                                                                        <option value="1">Male</option>
                                                                        <option value="2">Female</option>
                                                                        <option value="3">Transgender</option>
                                                                     </select>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_gender_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
															
                                                           <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Date of Birth*</label>
                                                                  <div class="col-md-9">
                                                                    
                                                        
																	<input class="form-control" id="emis_reg_staff_dob" name="emis_reg_staff_dob" placeholder="DD/MM/YYYY" type="date" min="<?php echo (date("Y-m-d",strtotime("now - 67Year"))); ?>" max="<?php echo (date("Y-m-d",strtotime("now - 18Year"))); ?>"  required />
																	<font style="color:#dd4b39;"><div id="emis_reg_staff_dob_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                         </div>
														 <br>
														  <div class="row">
                                                            
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3"> Organization* </label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" id="emis_reg_staff_organization" name="emis_reg_staff_organization" onfocus="textvalidate(this.id,'emis_reg_staff_gender_alert');" onchange="getorgname();" required>
                                                                        <option value="" selected="selected">Organization</option>
                                                                        <option value="PTA">PTA</option>
                                                                        <option value="NGO">NGO</option>
                                                                        <option value="CSR">CSR</option>
																		<option value="Others">Others</option>
                                                                     </select>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_gender_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
															
                                                           <div class="col-md-6" id="orgtype">
														   <label class="control-label col-md-3"> Organization Name</label>
														   <div class="col-md-9">
                                                              <input type="text" class="form-control" id="orgname" name="orgname" placeholder="Organization"  required>
                                                             </div>															  
                                                            </div>
                                                            <!--/span-->
                                                         </div>
														 <br>
														 <div class="row">
														  <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Date of Joining <br> Volunteering In the School*</label>
                                                                  <div class="col-md-9">
                                                                    
                                                        
																	<input class="form-control" id="emis_reg_staff_doj" name="emis_reg_staff_doj" placeholder="DD/MM/YYYY" type="date"   required />
																	<font style="color:#dd4b39;"><div id="emis_reg_staff_dob_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
														</div>
                                                    <div class="row">
															 <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Mobile Number*</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" placeholder="கைபேசி எண் *" name="emis_reg_staff_contact" id="emis_reg_staff_contact" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onfocus="mobilevalidate(this.id,'emis_reg_staff_mobile_alert');" onchange="mobilevalidate(this.id,'emis_reg_staff_mobile_alert');" autocomplete="off" required>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_mobile_alert"></div></font>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                         </div>
														 
														 <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">E-Mail Id*</label>
                                                                  <div class="col-md-9"> 
                                                                     <input type="email" placeholder="மின்னஞ்சல்" class="form-control" name="emis_reg_staff_email" id="emis_reg_staff_email" maxlength="60" onfocus="emailvalidate(this.id,'emis_reg_staff_email_alert');" onchange="emailvalidate(this.id,'emis_reg_staff_email_alert');" autocomplete="off" required >
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_email_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															
														 </div>
														 														
														
														<hr>
                                                         <label><h3>Academic Qualification</h3></label>

                                                         <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Academic*</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" id="emis_reg_staff_qualificationacademic" name="emis_reg_staff_qualificationacademic"  onfocus="academicvalidate(this.id,'emis_reg_staff_academic_alert');" onchange="academicvalidate(this.id,'emis_reg_staff_academic_alert');setRequiredField(this.value,'emis_reg_staff_ug,emis_reg_staff_pg',(this.value-3)+',5,6,7,8');setRequiredField(this.value,'emis_reg_staff_ug','4');"  required>
                                                                        
                                                                        <option value="">Select type of Academic qualification</option>
                                                                        <?php foreach($academic as $aca) {
                                                                        ?>
                                                                        <option value="<?php echo $aca['id']; ?>"><?php echo $aca['academic_teacher']; ?></option>
                                                                        <?php }?>
																		
																	   </select>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_academic_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3"> Professional* </label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" id="emis_reg_staff_qualificationprofessional" name="emis_reg_staff_qualificationprofessional" onfocus="textvalidate(this.id,'emis_reg_staff_prof_alert');" onchange="textvalidate(this.id,'emis_reg_staff_prof_alert');" required>
                                                                        <option value="">Select type of Professional qualification</option>
                                                                         <?php foreach($professional as $pro) {
                                                                        ?>
                                                                        <option value="<?php echo $pro->id; ?>"><?php echo $pro->professional; ?></option>
                                                                        <?php }?>
                                                                     </select>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_prof_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                         </div>
														 <div class="row">
														  <div class="col-md-6" id="UG">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">UG*</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" id="emis_reg_staff_ug" name="emis_reg_staff_ug"  onfocus="textvalidate(this.id,'emis_reg_staff_ug_alert');" onchange="textvalidate(this.id,'emis_reg_staff_ug_alert');"  >
																	 <option value="">Select type of UG</option>
																	 <?php foreach($ug as $res) {   ?><option value="<?php echo $res->id; ?>"><?php echo $res->ug_degree; ?></option><?php  } ?>
																	 
																	
                                                                     </select>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_ug_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															
															<div class="col-md-6" id="PG">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">PG*</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" id="emis_reg_staff_pg" name="emis_reg_staff_pg"  onfocus="textvalidate(this.id,'emis_reg_staff_pg_alert');" onchange="textvalidate(this.id,'emis_reg_staff_pg_alert');"  >
                                                                        <option value="">Select type of PG</option>
                                                                         <?php foreach($pg as $res) {   ?>
																		<option value="<?php echo $res->id; ?>"><?php echo $res->pg_degree; ?></option>
																		<?php  } ?>
                                                                     </select>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_pg_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															
														 </div>


                                                        <hr>

                                                                                                                  
                                                        
                                                </div>
                                                     
                                                <div class="form-actions">
                                                    <!--<button type="submit" class="btn green" id="emis_staff_reg_sub" onclick="return popup()">Submit</button>-->
												    <button type="button" class="btn btn-primary" onclick="volunteers_register();">Submit</button>
                                                    <button type="button"  class="btn default">Cancel</button>
                                                </div>
                                                </form>
												</div>
                                                
												
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- END PAGE CONTENT INNER -->
                             
                                        
                                            
                                        <div id="Paris" class="tabcontent" style="display: none;">
                                        
                                         <div class="portlet light ">
                                
                                            <div class="portlet-body">
                                        
                                                  <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="icon-equalizer font-green-haze"></i>
                                                        <span class="caption-subject font-green-haze bold uppercase">Volunteer Teachers Registration</span>
                                                        </div>
                                                   </div>
                                                        <div class="row">
                                                    <div class="col-md-12">
                                                          
                                        									  
                                                <center>
                                                  <form id="aadharinsert" action="<?php echo base_url().'Udise_staff/emis_school_volunteers_staff_get';?>" method="post" >
												  
                                                    <div class="form-group">
                                                    <div class="row">
													
													<div class="col-md-6">
																 <div class="form-group">
																<label class="control-label col-md-3">Enter Aadhar*</label>
																 <div class="col-md-9">
                                                                    <input type="text" class="form-control" id="submit_aadhaar" name="submit_aadhaar"  placeholder="ஆதார் எண்" maxlength="12" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onfocus="textvalidate(this.id,'emis_reg_staff_aadhaar_alert');" onchange="textvalidate(this.id,'emis_reg_staff_aadhaar_alert');" autocomplete="off"  required>
																	<font style="color:#dd4b39;"><div id="emis_reg_staff_aadhaar_alert"></div></font>
                                                                  </div>
																</div>
															</div>
													<div class="col-md-2">
                                                        
                                                          <button type="submit"  class="btn green" id="emis_stu_searchsep_sub" >SUBMIT</button>
                                                              
                                                    </div>
													
                                                    </form>
													</center>
													
                                              
                                                

                                             
                                            
														  <label><h3>Personal Information</h3></label>
														   <div class="form-body">
                                                          <form id="2" class="form-horizontal" action="<?php echo base_url().'Udise_staff/emis_school_volunteers_staff_get';?>" method="post" >
                                                         <div class="row">
                                                            
															
                                                 <?php if($this->session->userdata('emis_user_type_id') == 9 || $this->session->userdata('emis_user_type_id') == 10 || $this->session->userdata('emis_user_type_id') == 6 ) { ?>        
															<input type="hidden" name="office_id" id="office_id" value="<?php echo $office_id[0]->office_id;?>"> 
                                             <input type="hidden" name="off_key_id" id="off_key_id" value="<?php echo $office_id[0]->off_key_id;?>">
                                              
                                              <input type="hidden" name="status" id="status" value="O">
                                                <?php } else { ?>
                                                      <input type="hidden" name="volunteers_id" id="volunteers_id" value="<?php echo $volunteers_teacher[0]->id?>"> 
													  <input type="hidden" name="tabactive" id="tabactive" value="<?php echo $tabactive?>"> 
													 
                                                <input type="hidden" name="off_key_id" id="off_key_id" value="<?php echo $this->session->userdata('emis_school_id');?>">
                                              
                                              <input type="hidden" name="status" id="status" value="S">
                                              <?php } ?>
															<div class="col-md-6">
																 <div class="form-group">
																<label class="control-label col-md-3">Name of the Teacher*</label>
																<div class="col-md-9">
																<input type="text" class="form-control" id="staff_name" name="staff_name" placeholder="பணியாளர் பெயர் " value="<?php echo $volunteers_teacher[0]->teacher_name?>"  readonly>
																
																<font style="color:#dd4b39;"><div id="emis_reg_staff_name_alert"></div></font>
																</div>
																
																</div>
																
															</div>
															
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3"> Aadhaar Number* </label>
                                                                  <div class="col-md-9">
                                                                    <input type="text" class="form-control" id="staff_aadhaar" name="staff_aadhaar" placeholder="ஆதார் எண்" value="<?php echo $volunteers_teacher[0]->aadhar_no?>" readonly>
																	<font style="color:#dd4b39;"><div id="emis_reg_staff_aadhaar_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															<div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3"> Organization Name</label>
                                                                  <div class="col-md-9">
                                                                    <input type="text" class="form-control" id="organiname" name="organiname"  value="<?php echo $volunteers_teacher[0]->organization_name?>" readonly>
																	<font style="color:#dd4b39;"><div id="emis_reg_staff_aadhaar_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                         </div>
                                                     

                                                      <div class="row">
                                                            
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">From Date*</label>
                                                                  <div class="col-md-9">
                                                                    
                                                        
																	<input class="form-control" id="from_date" name="from_date" placeholder="DD/MM/YYYY" type="date"  required />
																	<font style="color:#dd4b39;"><div id="emis_reg_staff_dob_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
															
                                                           <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">To Date*</label>
                                                                  <div class="col-md-9">
                                                                    
                                                        
																	<input class="form-control" id="to_date" name="to_date" placeholder="DD/MM/YYYY" type="date"  required/>
																	<font style="color:#dd4b39;"><div id="emis_reg_staff_dob_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                         </div>
														 <br>
														  

                                                        <hr>

                                                                                                                  
                                                         <label><h3>Main Subjects Taught</h3></label>
                                                         <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Subject 1*</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" id="subj1" name="subj1" onfocus="textvalidate(this.id,'emis_reg_staff_subj1_alert');" onchange="textvalidate(this.id,'emis_reg_staff_subj1_alert');" required>
                                                                        <option value="999">Select type of Subject</option>
                                                                        	<?php foreach($subjects as $res) {   ?>
																		<option value="<?php echo $res->id; ?>"><?php echo $res->subjects; ?></option>
																		<?php  } ?>
                                                                       
                                                                     </select>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_subj1_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Subject 2</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" id="subj2" name="subj2">
                                                                        <option value="999">Select type of Subject</option>
                                                                        <?php foreach($subjects as $res) {   ?>
																		<option value="<?php echo $res->id; ?>"><?php echo $res->subjects; ?></option>
																		<?php  } ?>
                                                                     </select>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_subj2_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															</div>
															
                                                            <!--/span-->													
                                                        
														 <br>
														 <div class="row">
														       <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Subject 3</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" id="subj3" name="subj3">
                                                                        <option value="999">Select type of Subject</option>
                                                                        <?php foreach($subjects as $res) {   ?>
																		<option value="<?php echo $res->id; ?>"><?php echo $res->subjects; ?></option>
																		<?php  } ?>
                                                                     </select>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_subj3_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															<div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Subject 4</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" id="subj4" name="subj4">
                                                                        <option value="999">Select type of Subject</option>
                                                                        <?php foreach($subjects as $res) {   ?>
																		<option value="<?php echo $res->id; ?>"><?php echo $res->subjects; ?></option>
																		<?php  } ?>
                                                                     </select>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_subj4_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															</div>
															 <br>
															<div class="row">
														       <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Subject 5</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" id="subj5" name="subj5">
                                                                        <option value="999">Select type of Subject</option>
                                                                        <?php foreach($subjects as $res) {   ?>
																		<option value="<?php echo $res->id; ?>"><?php echo $res->subjects; ?></option>
																		<?php  } ?>
                                                                     </select>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_subj5_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															<div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Subject 6</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" id="subj6" name="subj6">
                                                                        <option value="999">Select type of Subject</option>
                                                                        <?php foreach($subjects as $res) {   ?>
																		<option value="<?php echo $res->id; ?>"><?php echo $res->subjects; ?></option>
																		<?php  } ?>
                                                                     </select>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_subj6_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															</div>
                                                            <!--/span-->
														
                                                  <br>   
                                                <div class="form-actions">
                                                    <!--<button type="submit" class="btn green" id="emis_staff_reg_sub" onclick="return popup()">Submit</button>-->
												    <button type="button" class="btn btn-primary" onclick="volunteers_subjects();">Submit</button>
                                                    <button type="button"  class="btn default">Cancel</button>
                                                </div>
                                                </form>
												</div>
                                                <!-- END FORM-->
                                             </div>
                              
                              
                           </div>
                           </div>
                           </div>
                           </div>
                        </div>
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

                           <!-- <form class="contact-form" id="myform" type="post" action="check.php">
                <input type="text" name="first_name"/>
                <input type="text" name="last_name" />
                <input type="text" name="email" id="email" />
                <input type="submit" /> -->
                <!-- <div class="form-errors"></div>
            </form> -->
            </div>
            <?php $this->load->view('footer.php'); ?>
            </div>
			<?php $this->load->view('scripts.php'); ?>




		<script src="<?php echo base_url().'asset/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js';?>" type="text/javascript"></script>
		<script src="<?php echo base_url().'asset/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js';?>" type="text/javascript"></script>
		<script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js'?>" type="text/javascript"></script>	
		 <script src="<?php echo base_url().'asset/js/vivekrao/generate.js';?>" type="text/javascript"></script>	
<script>			
.mystyle {
  
}		
</script>      
            <script>
  $(document).ready(function(){
	  
    $("#orgtype").hide();
	//$("#London").show();
	var tabactive=$("#tabactive").val();
	//alert(tabactive);
	if(tabactive==1)
	{
	
	$("#Paris").show();
	$("#London").hide();
	}
   });
   function openCity(cityName) {
 
  var i;
  var x = document.getElementsByClassName("tabcontent");
  
  for(i=0;i<x.length;i++){
    x[i].style.display = "none";
  }
  document.getElementById(cityName).style.display ="block";
}
function getorgname()
	{
	  var drop= $('#emis_reg_staff_organization').val();
      if(drop == 'PTA'){
		$("#orgtype").hide();
		}
		else
		{
		$("#orgtype").show();	
		}
	}
			
var x = document.getElementById("UG");
				var y = document.getElementById("PG");
				x.style.display = "none";
				y.style.display = "none";
				function academicvalidate(id,alertid) {
					var text = document.getElementById(id);
					var alt = document.getElementById(alertid);
					if(text.value==''){
						alt.innerHTML="This field is required";
					}else {
						alt.innerHTML="";
					}
				
					
					var dropdown = document.getElementById("emis_reg_staff_qualificationacademic");
					var current_value1 = dropdown.options[dropdown.selectedIndex].value;
					
					if (current_value1 == "4") {
						
						document.getElementById("UG").style.display = "block";
						document.getElementById("PG").style.display = "none";
                        $('#PG option:selected').removeAttr('selected');
						
					}else if(current_value1 == "5" || current_value1 == "6" || current_value1 == "7" || current_value1 == "8"){
						document.getElementById("UG").style.display = "block";
						document.getElementById("PG").style.display = "block";
					}else{
						document.getElementById("UG").style.display = "none";
						document.getElementById("PG").style.display = "none";
                        $('#UG option:selected').removeAttr('selected');
                        $('#PG option:selected').removeAttr('selected');
					}
				}
function hasWhiteSpace(s) {
				var str=s.value;
				if((str.charCodeAt(str.length-1)==32) && (str.charCodeAt(str.length-2)==32)){
				str = str.slice(0, -1);
				s.value=str;
			}
			}
				
				function mobilevalidate(id,alertid){
					var mobpattern = /^[6789]\d{9}$/;
					var text = document.getElementById(id);
					var alt = document.getElementById(alertid);
					if(text.value==''){
						alt.innerHTML="This field is required";
						return false;
					}else if(!text.value.match(mobpattern)){
						alt.innerHTML="Enter valid mobile number";
						return false;
					}else {
						alt.innerHTML="";
					}
				}
				function emailvalidate(id,alertid){
					var emailreg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
					var text = document.getElementById(id);
					var alt = document.getElementById(alertid);
					if(text.value==''){
						alt.innerHTML="This field is required";
						return false;
					}else if(!text.value.match(emailreg)){
						alt.innerHTML="Enter valid Email";
						return false;
					}else {
						alt.innerHTML="";
					}
				}
								
function aadharcheck(node) {
    
    var check=node.value;
    if(node.value != ''){
      $.ajax({
            type:"POST",
            url:baseurl+'Udise_staff/checkaadharvolunteers',
            data:"&aadhar="+node.value,
            success: function(resp) {
                
              check = JSON.parse(resp);
              //alert(check.length);
              if(check!=null){
                alert('Aadhar linked to -'+check[0]['id']+'---'+check[0]['teacher_name']);
                node.value='';
                node.focus();
                return false;
              }
            },
            // error: function(e) {
                // alert('Error: ' + e.responseText);
                // return false;
            // }
      });

    }
}

function aadhar1(){
    var check=document.getElementById('submit_aadhaar').value;
    
    $.ajax({
            type:"POST",
            url:baseurl+'Udise_staff/checkaadharvolunteers',
            data:"&aadhar="+check,
            success: function(resp) {
                
              check = JSON.parse(resp);
              alert(check.length);
              
              if(check!=null){
                
                alert('Aadhar linked to -'+check[0]['id']+'---'+check[0]['teacher_name']);
                document.getElementById('staff_name').value=check[0]['teacher_name'];
                document.getElementById('staff_aadhaar').value=check[0]['aadhar_no'];
                document.getElementById('organiname').value=check[0]['organization_name'];
                return true;
              }
            },
            // error: function(e) {
                // alert('Error: ' + e.responseText);
                // return false;
            // }
      });
}
				
				
function volunteers_register()
{
	var teachername=$("#emis_reg_staff_name").val();
	var aadhar=$("#emis_reg_staff_aadhaar").val();
	var gender=$("#emis_reg_staff_gender").val();
	var dob=$("#emis_reg_staff_dob").val();
	var orgtype=$("#emis_reg_staff_organization").val();
	var orgname=document.getElementById("orgname").value; 
	var doj=$("#emis_reg_staff_doj").val();
	var contact=$("#emis_reg_staff_contact").val();
	var email=$("#emis_reg_staff_email").val();
	var qulafication_academic=$("#emis_reg_staff_qualificationacademic").val();
	var qualification_professional=$("#emis_reg_staff_qualificationprofessional").val();
	var ug=$("#emis_reg_staff_ug").val();
	var pg=$("#emis_reg_staff_pg").val();
	if(teachername=='' || aadhar=='' || gender=='' || dob=='' || orgtype=='' || doj=='' || contact=='' || email=='' || qulafication_academic=='' || qualification_professional=='')
	{
		swal("OK", "All field Required", "error");
		return false;
				//window.location.reload();
	}
	else
	{	
		            $.ajax(
		            {
			data:{'teachername':teachername,'aadhar':aadhar,'gender':gender,'dob':dob,'orgtype':orgtype,'orgname':orgname,'doj':doj,'contact':contact,'email':email,'qulafication_academic':qulafication_academic,'qualification_professional':qualification_professional,'ug':ug,'pg':pg},
			url:baseurl+'Udise_staff/emis_school_volunteers_staff_data',
			type:"POST",
			dataType:"JSON",
			success:function(res)
			{
				
				swal("OK", "Volunteers teachers Data Saved Successfully", "success");
				window.location.reload();
					
			}
		    });
	
	}
				
				
}
function volunteers_subjects()
{
	
	var teacherid=$("#volunteers_id").val();
	var teachername=$("#staff_name").val();
	var fromdate=$("#from_date").val();
	var todate=$("#to_date").val();
	var subj1=$("#subj1").val();
	var subj2=$("#subj2").val();
	var subj3=$("#subj3").val();
	var subj4=$("#subj4").val();
	var subj5=$("#subj5").val();
	var subj6=$("#subj6").val();
	
	if(fromdate=='' || todate=='' || subj1=='')
	{
		swal("OK", "All field Required", "error");
		return false;
				//window.location.reload();
	}
	else
	{	
		            $.ajax(
		            {
			data:{'teacherid':teacherid,'teachername':teachername,'fromdate':fromdate,'todate':todate,'subj1':subj1,'subj2':subj2,'subj3':subj3,'subj4':subj4,'subj5':subj5,'subj6':subj6},
			url:baseurl+'Udise_staff/emis_school_volunteers_staff_get',
			type:"POST",
			dataType:"JSON",
			success:function(res)
			{
				
				swal("OK", "Volunteers teachers Subject Saved Successfully", "success");
				window.location.reload();
					
			}
		    });
			swal("OK", "Volunteers teachers Subject Saved Successfully", "success");
			$("#staff_name").val('');	
            $("#staff_aadhaar").val('');
			$("#from_date").val('');	
            $("#to_date").val('');
			$("#subj1").val('');	
            $("#subj2").val('');
			$("#subj3").val('');
			$("#organiname").val('');
			$("#Paris").show();
	       
							
	}						
}		
				
				
				









            </script>
         </body>
      </html>