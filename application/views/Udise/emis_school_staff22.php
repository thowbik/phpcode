<!DOCTYPE html>

      <html lang="en">
         <!--<![endif]-->
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
         <style type="text/css">
            label.error { float: none; color:#dd4b39; }
         </style>
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

 

                                    <h1>Create Staff
                                       <small>Staff profile create</small>
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
                              <div></div>
                              <div class="container">
                                 <!-- BEGIN PAGE CONTENT INNER -->
                                 <div class="page-content-inner">
                                    <?php $this->load->view('emis_school_profile_header1.php'); ?>
                                    <!-- <div class="m-heading-1 border-green m-bordered">
                                       <h3>Basic Information</h3>
                                       </div> -->
                                     <div class="portlet-body">
                                       <div class="mt-element-step">
                                          <div class="row step-thin">
                                             <!-- <a href="<?php echo base_url().'Udise_staff/emis_school_staff1';?>">
                                                <div class="col-md-6 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">1</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Step1</div>
                                                   <div class="mt-step-content font-grey-cascade">Staff Abstract</div>
                                                </div>
                                             </a>-->
											 <!--<a href="<?php echo base_url().'Udise_staff/emis_school_staff2';?>">
                                                <div class="col-md-12 bg-grey mt-step-col active">
                                                   <div class="mt-step-number bg-white font-grey">1</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Step 1</div>
                                                   <div class="mt-step-content font-grey-cascade">Staff Registration</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Udise_staff/emis_school_staff3';?>">
                                                <div class="col-md-6 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">2</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Step2</div>
                                                   <div class="mt-step-content font-grey-cascade">Staff Information</div>
                                                </div>
                                             </a>-->
                                              
                                          </div>
                                       </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="tab-pane" id="tab_2">
                                             <div class="portlet light ">
                                                <div class="portlet-title">
                                                   <div class="caption">
                                                      <i class="icon-equalizer font-green-haze"></i>
                                                      <span class="caption-subject font-green-haze bold uppercase">Teachers and Instructors</span>
                                                      <span class="caption-helper">(Including Head master/Mistress)</span>
                                                   </div>
                                                </div>
                                                <div class="portlet-body form">
                                       <!-- error displaying part -->
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
											 <!-- END PAGE CONTENT INNER -->
                                       <!-- error displaying part end -->
                                                   <!-- BEGIN FORM-->
                                                   <form class="form-horizontal" method="post" action="<?php echo base_url().'Udise_staff/staffinfogetting';?>" name="emis_staff_reg_form" id="">
                                                      
														  <label><h3>Personal Information</h3></label>
														   <div class="form-body">
                                                         
                                                         <div class="row">
                                                            
															<div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Name of the Teacher*</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="emis_reg_staff_name" name="emis_reg_staff_name" placeholder="ஆசிரியர் பெயர் " maxlength="60" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" required onfocus="textvalidate(this.id,'emis_reg_staff_name_alert');" onchange="textvalidate(this.id,'emis_reg_staff_name_alert');"autocomplete="off">
																	 <p>Name followed by Initial Eg. Ganesh R</p>
                                                                     <font style="color:#dd4b39;"><div id="emis_reg_staff_name_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3"> Aadhaar Number* </label>
                                                                  <div class="col-md-9">
                                                                    <input type="text" class="form-control" id="emis_reg_staff_aadhaar" name="emis_reg_staff_aadhaar" placeholder="ஆதார் எண்" maxlength="12" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required onfocus="textvalidate(this.id,'emis_reg_staff_aadhaar_alert');" onchange="textvalidate(this.id,'emis_reg_staff_aadhaar_alert');"autocomplete="off">
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
                                                                     <select class="form-control" id="emis_reg_staff_gender" name="emis_reg_staff_gender" required onfocus="textvalidate(this.id,'emis_reg_staff_gender_alert');" onchange="textvalidate(this.id,'emis_reg_staff_gender_alert');"autocomplete="off">
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
                                                                  <label class="control-label col-md-3"> Blood group* </label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" data-placeholder="Choose Blood Group" tabindex="1" id="emis_reg_staff_bg" name="emis_reg_staff_bg" required onfocus="textvalidate(this.id,'emis_reg_staff_bg_alert');" onchange="textvalidate(this.id,'emis_reg_staff_bg_alert');"autocomplete="off">
																		<option value="" style="color:#bfbfbf;">இரத்த வகை</option>
																		<?php foreach($bloodgroup as $res) {   ?>
																		<option value="<?php echo $res->id; ?>"><?php echo $res->group; ?></option>
																		<?php  } ?>
																	</select>
																	<font style="color:#dd4b39;"><div id="emis_reg_staff_bg_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                         </div>


                                                         <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Date of Birth*</label>
                                                                  <div class="col-md-9">
                                                                    
                                                        
																	<input class="form-control" id="emis_reg_staff_dob" name="emis_reg_staff_dob" placeholder="DD/MM/YYYY" type="date" min="<?php echo (date("Y-m-d",strtotime("now - 57Year"))); ?>" max="<?php echo (date("Y-m-d",strtotime("now - 18Year"))); ?>" onfocus="textvalidate(this.id,'emis_reg_staff_dob_alert');" onchange="textvalidate(this.id,'emis_reg_staff_dob_alert');"autocomplete="off" required />
																	<font style="color:#dd4b39;"><div id="emis_reg_staff_dob_alert"></div></font>
                                                            <!-- <div class="form-group">
															<div class="col-md-4">
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="" name="emis_reg_staff_date" required>
                                                                          <option value="" style="color:#bfbfbf;">Date</option>
                                                            <?php   $tempnumber = '';
                                                                       for($i=1;$i<32;$i++) { 
                                                                        $tempnumber = sprintf("%02s", $i);  ?>   
                                                                       
                                                                          <option value="<?php echo $tempnumber; ?>"><?php echo $tempnumber; ?></option>
                                                                       <?php }  ?> 
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_staff_date_alert"></div></font>
                                                           </div>
                                                        <div class="col-md-4">
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="" name="emis_reg_staff_month" required>
                                                                 <option value="" style="color:#bfbfbf;">Month</option>
                                                              <option value="01">January</option>
                                                              <option value="02">February</option>
                                                              <option value="03">March</option>
                                                              <option value="04">April</option>
                                                              <option value="05">May</option>
                                                              <option value="06">June</option>
                                                              <option value="07">July</option>
                                                              <option value="08">August</option>
                                                              <option value="09">September</option>
                                                              <option value="10">October</option>
                                                              <option value="11">November</option>
                                                              <option value="12">December</option>
                                                            </select>
															<font style="color:#dd4b39;"><div id="emis_reg_staff_month_alert"></div></font>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="" name="emis_reg_staff_year" required>
                                                             <option value="" style="color:#bfbfbf;">Year</option>
                                                              <?php
                                                              $year=date('Y');
                                                              $min=$year-80;
                                                              $max=$year-10;
                                                              for($i=$min;$i<$max;$i++)
                                                              {?>
                                                              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                            <?php } ?>
                                                            </select>
															<font style="color:#dd4b39;"><div id="emis_reg_staff_year_alert"></div></font>
                                                        </div></div>-->
                                                       
                                                   
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3"> Social Category* </label>
                                                                  <div class="col-md-9">
                                                                     <select id="emis_reg_staff_socialcategory" onfocus="textvalidate(this.id,'emis_reg_staff_sc_alert');" onchange="textvalidate(this.id,'emis_reg_staff_sc_alert');"autocomplete="off" class="form-control" name="emis_reg_staff_socialcategory" required>
                                                                        <option value="">Select Social Category</option>
                                                                        <option value="1">General</option>
                                                                        <option value="2">SC - Others</option>
                                                                        <option value="3">ST</option>
																		<option value="4">SC-Arunthathiyar</option>
																		<option value="6">BC - Muslim</option>
																		<option value="5">DNC (Denotified Communities)</option>
                                                                        <option value="10">MBC</option>
                                                                        <option value="11">BC-Others</option>
                                                                     </select>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_sc_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                         </div>
                                                         
                                                              
                                                           
                                                         <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Designation of Teacher*</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" id="emis_reg_staff_teachertype" name ="emis_reg_staff_teachertype" onfocus="textvalidate(this.id,'emis_reg_staff_type_alert');" onchange="textvalidate(this.id,'emis_reg_staff_type_alert');" autocomplete="off" required>
                                                                        <option value="">Select type of teacher</option>
																			<?php if (isset($staff_cat)) {
																				foreach ($staff_cat as $categ) {?>
																				<option value="<?php echo $categ->id; ?>"><?php echo $categ->type_teacher; ?></option>
																			<?php } }?>
                                                                     </select>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_type_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															<div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Father's Name*</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="emis_reg_staff_fname" name="emis_reg_staff_fname" maxlength="60" onfocus="textvalidate(this.id,'emis_reg_staff_fname_alert');" onchange="textvalidate(this.id,'emis_reg_staff_fname_alert');" autocomplete="off" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" required>
																	  <p>Name followed by Initial Eg. Ganesh R</p>
                                                                     <font style="color:#dd4b39;"><div id="emis_reg_staff_fname_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															 
														   
                                                         </div>
														 
														 <div class="row">
														 
															
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3"> Appointed for the Subject* </label>
                                                                  <div class="col-md-9">
																	 <select class="form-control" id="emis_reg_staff_appntedforsubject" name="emis_reg_staff_appntedforsubject" onfocus="textvalidate(this.id,'emis_reg_staff_apnt_alert');" onchange="textvalidate(this.id,'emis_reg_staff_apnt_alert');" autocomplete="off" required>
                                                                        <option value="">Select type of Subject</option>
                                                                        <option value="1">All subjects</option>
                                                                        <option value="3">Mathematics</option>
                                                                        <option value="4">Environment studies</option>
                                                                        <option value="5">Sports</option>
                                                                        <option value="6">Music</option>
                                                                        <option value="7">Science</option>
                                                                        <option value="8">Social studies</option>
                                                                        <option value="10">Accountancy</option>
                                                                        <option value="11">Biology</option>
                                                                        <option value="12">Business Studies</option>
                                                                        <option value="13">Chemistry</option>
                                                                        <option value="14">Computer Science</option>
                                                                        <option value="15">Economics</option>
                                                                        <option value="16">Engineering Drawing</option>
                                                                        <option value="17">Fine Arts</option>
                                                                        <option value="18">Geography</option>
                                                                        <option value="19">History</option>
                                                                        <option value="20">Home Science</option>
                                                                        <option value="21">Philosophy</option>
                                                                        <option value="22">Physics</option>
                                                                        <option value="23">Political Science</option>
                                                                        <option value="24">Psychology</option>
                                                                        <option value="25">Foreign Language</option>
                                                                        <option value="26">Botany</option>
                                                                        <option value="27">Zoology</option>
                                                                        <option value="41">Hindi</option>
                                                                        <option value="43">Sanskrit</option>
                                                                        <option value="45">Urdu</option>
                                                                        <option value="46">English</option>
                                                                        <option value="48">Tamil</option>
                                                                        <option value="94">Malayalam</option>
                                                                        <option value="95">Telugu</option>
                                                                        <option value="96">Kannada</option>
                                                                        <option value="91">Art education</option>
                                                                        <option value="92">Health &amp; physical education</option>
                                                                        <option value="93">Work education</option>
                                                                        <option value="0">Other</option>
                                                                     </select>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_apnt_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
															<div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Mother's Name*</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="emis_reg_staff_mname" name="emis_reg_staff_mname" maxlength="60" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" onfocus="textvalidate(this.id,'emis_reg_staff_mname_alert');" onchange="textvalidate(this.id,'emis_reg_staff_mname_alert');"autocomplete="off" required>
																	 <p>Name followed by Initial Eg. Saraswathi R</p>
                                                                     <font style="color:#dd4b39;"><div id="emis_reg_staff_mname_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
														 
															
														 
														 
														 
															
															
															
															
														 </div>
														 
												
														  <div class="row">
															
															
															
															<div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Differently abled type, If any*</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" name="emis_reg_staff_typeofdisability" id="emis_reg_sel" onChange="check(this.id,'emis_reg_staff_typedis_alert');" onfocus="check(this.id,'emis_reg_staff_typedis_alert');" autocomplete="off" required>
                                                                        <option value="">Select type of disability</option>
                                                                        <option value="1">Not applicable</option>
                                                                        <option value="2">Physically Challenged</option>
                                                                        <option value="3">Visually Impaired</option>
                                                                        <!--<option value="4">Deaf and Dumb</option>-->
                                                                     </select>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_typedis_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															<div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Spouse Name, if any.</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="emis_reg_staff_spname" name="emis_reg_staff_spname" maxlength="60" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32">
																	 
                                                                     <font style="color:#dd4b39;"><div id="emis_reg_staff_sname_alert"></div></font>
																	  <p>Name followed by Initial Eg. Ganesh.R</p>
                                                                  </div>
                                                               </div>
                                                            </div>
															
														  
														  <div class="col-md-6" id="emis_reg_dis">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Differently abled Details(including percentage)</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="emis_reg_staff_distype" name="emis_reg_staff_distype" maxlength="200" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" onChange="textvalidate(this.id,'emis_reg_staff_distype_alert');" onfocus="textvalidate(this.id,'emis_reg_staff_distype_alert');" autocomplete="off" >
                                                                     <font style="color:#dd4b39;"><div id="emis_reg_staff_distype_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															</div>
															
															
															
														  <hr>
														  <label><h3>Joining Details</h3></label>
														  
														  <div class="row">
															
															<div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Date of Joining in Service*</label>
                                                                  <div class="col-md-9">
																  <input class="form-control" id="emis_reg_staff_join" min="<?php echo (date("Y-m-d",strtotime("now - 40Year"))); ?>" max="<?php echo (date("Y-m-d",strtotime("now"))); ?>" name="emis_reg_staff_join" placeholder="DD/MM/YYYY" type="date" onfocus="textvalidate(this.id,'emis_reg_staff_join_alert');" onchange="textvalidate(this.id,'emis_reg_staff_join_alert');"autocomplete="off" required />
																  <font style="color:#dd4b39;"><div id="emis_reg_staff_join_alert"></div></font>
                                                                    
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
															
															<div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Date of Joining in Present Post*</label>
                                                                  <div class="col-md-9">
																  <input class="form-control" id="emis_reg_staff_pjoin" min="<?php echo (date("Y-m-d",strtotime("now - 40Year"))); ?>" max="<?php echo (date("Y-m-d",strtotime("now"))); ?>" name="emis_reg_staff_pjoin" placeholder="DD/MM/YYYY" type="date" onfocus="textvalidate(this.id,'emis_reg_staff_pjoin_alert');" onchange="textvalidate(this.id,'emis_reg_staff_pjoin_alert');"autocomplete="off" required />
																  <font style="color:#dd4b39;"><div id="emis_reg_staff_pjoin_alert"></div></font>
                                                                    
                                                                  </div>
                                                               </div>
                                                            </div>
															
															
														  </div>
														  <div class="row">
														  
                                                            <!--/span-->
															<div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Date of Joining in Present School*</label>
                                                                  <div class="col-md-9">
																	 <input class="form-control" id="emis_reg_staff_psjoin" min="<?php echo (date("Y-m-d",strtotime("now - 40Year"))); ?>" max="<?php echo (date("Y-m-d",strtotime("now"))); ?>" name="emis_reg_staff_psjoin" placeholder="DD/MM/YYYY" onfocus="textvalidate(this.id,'emis_reg_staff_psjoin_alert');" onchange="textvalidate(this.id,'emis_reg_staff_psjoin_alert');"autocomplete="off"  type="date" required />
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_psjoin_alert"></div></font>
                                                                    
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
															
															<div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">GPF/CPS Number*</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="emis_reg_staff_cps" name="emis_reg_staff_cps" maxlength="30" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onfocus="textvalidate(this.id,'emis_reg_staff_cps_alert');" onchange="textvalidate(this.id,'emis_reg_staff_cps_alert');" autocomplete="off"  required>
                                                                     <font style="color:#dd4b39;"><div id="emis_reg_staff_cps_alert"></div></font>
                                                                  </div>
																  <!--<label class="control-label col-md-2">Suffix*</label>
                                                                  <div class="col-md-3">
                                                                     <select class="form-control" id="emis_reg_staff_suffix" name="emis_reg_staff_suffix" onfocus="textvalidate(this.id,'emis_reg_staff_suffix_alert');" onchange="textvalidate(this.id,'emis_reg_staff_suffix_alert');" autocomplete="off" required>
																		<option value="">Select type of Recruitment</option>
                                                                        <option value="1">TNPSC					</option>
                                                                        <option value="2">TRB					</option>
                                                                        <option value="3">Compassionate Grounds	</option>
                                                                        <option value="4">Transfer of Services	</option>
																		<option value="6">Employment Seniority		</option>
																		<option value="7">Retrenched Census Employees</option>
																		
																		
                                                                     <font style="color:#dd4b39;"><div id="emis_reg_staff_suffix_alert"></div></font>
                                                                  </div>-->
                                                               </div>
                                                            </div>
															<!--/span-->
															
															
														  </div>
														  <div class="row">
															<div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Mode of Recruitment*</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" name="emis_reg_staff_mode" id="emis_reg_rect" onfocus="checkrecruitment(this.id,'emis_reg_staff_mode_alert');" onchange="checkrecruitment(this.id,'emis_reg_staff_mode_alert');" autocomplete="off" required>
                                                                        <option value="">Select type of Recruitment</option>
                                                                        <option value="1">TNPSC</option>
                                                                        <option value="2">TRB</option>
                                                                        <option value="3">Compassionate Grounds</option>
                                                                        <option value="4">Transfer of Services</option>
																		<option value="6">Employment Seniority</option>
																		<option value="7">Retrenched Census Employees</option>
                                                                     </select>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_mode_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															
															<div class="col-md-6" id="emis_reg_rectrank_enable">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Recruitment Rank</label>
                                                                  <div class="col-md-9">
                                                                    <input type="text" class="form-control" id="emis_reg_staff_rank" name="emis_reg_staff_rank" placeholder="Rank" maxlength="4" onkeypress="return( event.charCode >= 48 && event.charCode <= 57) || ( event.charCode > 64 && event.charCode < 91) || ( event.charCode > 96 && event.charCode < 123) || event.charCode == 0" onfocus="textvalidate(this.id,'emis_reg_staff_rank_alert');" onchange="textvalidate(this.id,'emis_reg_staff_rank_alert');" autocomplete="off" >
																	<font style="color:#dd4b39;"><div id="emis_reg_staff_rank_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															
															 <div class="col-md-6" id="emis_reg_rectyear_enable">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Year Selection</label>
                                                                  <div class="col-md-9">
                                                                     <div class="form-group">
															
															
																		<div class="col-md-4">
																		<select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_reg_staff_yearselection" name="emis_reg_staff_yearselection" onfocus="textvalidate(this.id,'emis_reg_staff_yearselection_alert');" onchange="textvalidate(this.id,'emis_reg_staff_yearselection_alert');" autocomplete="off" >
																		<option value="" style="color:#bfbfbf;">Year</option>
                                                              <?php
                                                              $year=date('Y');
                                                              $min=$year-42;
                                                              $max=$year+1;
                                                              for($i=$min;$i<$max;$i++)
                                                              {?>
                                                              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                            <?php } ?>
                                                            </select>
															<font style="color:#dd4b39;"><div id="emis_reg_staff_yearselection_alert"></div></font>
                                                        </div>
														</div>
														</div>
														</div>
														</div>
															<!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3"> Nature of appointment* </label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" name="emis_reg_staff_appntmntnature" id="emis_reg_staff_appntmntnature" onfocus="textvalidate(this.id,'emis_reg_staff_np_alert');" onchange="textvalidate(this.id,'emis_reg_staff_np_alert');" autocomplete="off" required>
                                                                        <option value="">Select Nature of appointment</option>
                                                                        <option value="1">Regular</option>
                                                                        <option value="2">Contract</option>
                                                                        <option value="3">Part-Time</option>
                                                                     </select>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_np_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
															</div>
															
																								 
														  
                                                         <hr>

                                                         <label><h3>Communication Details</h3></label>

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
                                                                     <input type="email" placeholder="மின்னஞ்சல்" class="form-control" name="emis_reg_staff_email" id="emis_reg_staff_email" maxlength="60" required onfocus="emailvalidate(this.id,'emis_reg_staff_email_alert');" onchange="emailvalidate(this.id,'emis_reg_staff_email_alert');" autocomplete="off" >
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_email_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															
														 </div>
														 
														 <div class="row">
														 <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Door no. / Building Name *</label>
                                                                  <div class="col-md-9"> 
                                                                     <input type="text" placeholder="கதவு எண் / கட்டிடத்தின் பெயர் *"  class="form-control" id="emis_reg_staff_door" name="emis_reg_staff_door" onfocus="textvalidate(this.id,'emis_reg_staff_door_alert');" onchange="textvalidate(this.id,'emis_reg_staff_door_alert');" autocomplete="off" required>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_door_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															<div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Street Name / Area name *</label>
                                                                  <div class="col-md-9"> 
                                                                     <input type="text" placeholder="தெரு பெயர் / பகுதியின் பெயர் *"  class="form-control" id="emis_reg_staff_street" name="emis_reg_staff_street" onfocus="textvalidate(this.id,'emis_reg_staff_street_alert');" onchange="textvalidate(this.id,'emis_reg_staff_street_alert');" autocomplete="off" required>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_street_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
														 </div>
														 
														 <div class="row">
														 <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">City name / Village name *</label>
                                                                  <div class="col-md-9"> 
                                                                     <input type="text" placeholder="நகரம் / கிராமத்தின் பெயர் *" class="form-control" id="emis_reg_staff_city" name="emis_reg_staff_city" onfocus="textvalidate(this.id,'emis_reg_staff_city_alert');" onchange="textvalidate(this.id,'emis_reg_staff_city_alert');" autocomplete="off" required>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_city_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															<div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">District *</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_reg_staff_district" name="emis_reg_staff_district" placeholder="மாவட்டம் *" onfocus="textvalidate(this.id,'emis_reg_staff_district_alert');" onchange="textvalidate(this.id,'emis_reg_staff_district_alert');" autocomplete="off" required>
																		<option value="" >மாவட்டம் *</option>
																		<?php foreach($schooldist as $dist) {   ?>
																		<option value="<?php echo $dist->id;  ?>"><?php echo $dist->district_name  ?></option>
																		<?php   }  ?>
																	</select>
																	<font style="color:#dd4b39;"><div id="emis_reg_staff_district_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
														 </div>
														 
														 <div class="row">
														 <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Pincode *</label>
                                                                  <div class="col-md-9"> 
                                                                     <input type="text" placeholder="அஞ்சல் குறியீட்டு எண் *" class="form-control" id="emis_reg_staff_pincode" maxlength="6" name="emis_reg_staff_pincode" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onfocus="pinvalidate(this.id,'emis_reg_staff_pincode_alert');" onchange="pinvalidate(this.id,'emis_reg_staff_pincode_alert');" autocomplete="off" required>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_pincode_alert"></div></font>
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
                                                                     <select class="form-control" id="emis_reg_staff_qualificationacademic" name="emis_reg_staff_qualificationacademic"  onfocus="academicvalidate(this.id,'emis_reg_staff_academic_alert');" onchange="academicvalidate(this.id,'emis_reg_staff_academic_alert');" autocomplete="off"  required>
                                                                        <option value="">Select type of Academic qualification</option>
																		<option value="1">SSLC</option>
                                                                        <option value="2">PUC</option>
                                                                        <option value="3">Higher Secondary</option>
                                                                        <option value="4">Graduate</option>
                                                                        <option value="5">Post Graduate</option>
                                                                        <option value="6">M.Phil.</option>
                                                                        <option value="7">Ph.D.</option>
                                                                        <option value="8">Post-Doctoral</option>
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
                                                                     <select class="form-control" id="emis_reg_staff_qualificationprofessional" name="emis_reg_staff_qualificationprofessional" onfocus="textvalidate(this.id,'emis_reg_staff_prof_alert');" onchange="textvalidate(this.id,'emis_reg_staff_prof_alert');" autocomplete="off"  required>
                                                                        <option value="">Select type of Professional qualification</option>
                                                                        <option value="1">Diploma or certificate in basic teachers' training of a duration not less than two years</option>
                                                                        <option value="2">Bachelor of Elementary Education(B.EL.Ed.)</option>
                                                                        <option value="3">B.Ed. or equivalent</option>
                                                                        <option value="4">M.Ed. or equivalent</option>
                                                                        <option value="5">Others</option>
                                                                        <option value="6">None</option>
                                                                        <option value="7">Diploma/degree in special education</option>
                                                                        <option value="8">Pursuing any relevant professional course</option>
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
                                                                     <select class="form-control" id="emis_reg_staff_ug" name="emis_reg_staff_ug"  onfocus="textvalidate(this.id,'emis_reg_staff_ug_alert');" onchange="textvalidate(this.id,'emis_reg_staff_ug_alert');" autocomplete="off"  >
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
                                                                     <select class="form-control" id="emis_reg_staff_pg" name="emis_reg_staff_pg"  onfocus="textvalidate(this.id,'emis_reg_staff_pg_alert');" onchange="textvalidate(this.id,'emis_reg_staff_pg_alert');" autocomplete="off"  >
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

                                                                                                                  
                                                         <label><h3>Main Subjects Taught</h3></label>
                                                         <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Subject 1*</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" id="emis_reg_staff_mainsubjcttaughtsubj1" name="emis_reg_staff_mainsubjcttaughtsubj1" onfocus="textvalidate(this.id,'emis_reg_staff_subj1_alert');" onchange="textvalidate(this.id,'emis_reg_staff_subj1_alert');" autocomplete="off" required>
                                                                        <option value="">Select type of Subject</option>
                                                                        <option value="1">All subjects</option>
                                                                        <option value="3">Mathematics</option>
                                                                        <option value="4">Environment studies</option>
                                                                        <option value="5">Sports</option>
                                                                        <option value="6">Music</option>
                                                                        <option value="7">Science</option>
                                                                        <option value="8">Social studies</option>
                                                                        <option value="10">Accountancy</option>
                                                                        <option value="11">Biology</option>
                                                                        <option value="12">Business Studies</option>
                                                                        <option value="13">Chemistry</option>
                                                                        <option value="14">Computer Science</option>
                                                                        <option value="15">Economics</option>
                                                                        <option value="16">Engineering Drawing</option>
                                                                        <option value="17">Fine Arts</option>
                                                                        <option value="18">Geography</option>
                                                                        <option value="19">History</option>
                                                                        <option value="20">Home Science</option>
                                                                        <option value="21">Philosophy</option>
                                                                        <option value="22">Physics</option>
                                                                        <option value="23">Political Science</option>
                                                                        <option value="24">Psychology</option>
                                                                        <option value="25">Foreign Language</option>
                                                                        <option value="26">Botany</option>
                                                                        <option value="27">Zoology</option>
                                                                        <option value="41">Hindi</option>
                                                                        <option value="43">Sanskrit</option>
                                                                        <option value="45">Urdu</option>
                                                                        <option value="46">English</option>
                                                                        <option value="48">Tamil</option>
                                                                        <option value="94">Malayalam</option>
                                                                        <option value="95">Telugu</option>
                                                                        <option value="96">Kannada</option>
                                                                        <option value="91">Art education</option>
                                                                        <option value="92">Health &amp; physical education</option>
                                                                        <option value="93">Work education</option>
                                                                        <option value="0">Other</option>
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
                                                                     <select class="form-control" id="emis_reg_staff_mainsubjcttaughtsubj2" name="emis_reg_staff_mainsubjcttaughtsubj2">
                                                                        <option value="">Select type of Subject</option>
                                                                        <option value="1">All subjects</option>
                                                                        <option value="3">Mathematics</option>
                                                                        <option value="4">Environment studies</option>
                                                                        <option value="5">Sports</option>
                                                                        <option value="6">Music</option>
                                                                        <option value="7">Science</option>
                                                                        <option value="8">Social studies</option>
                                                                        <option value="10">Accountancy</option>
                                                                        <option value="11">Biology</option>
                                                                        <option value="12">Business Studies</option>
                                                                        <option value="13">Chemistry</option>
                                                                        <option value="14">Computer Science</option>
                                                                        <option value="15">Economics</option>
                                                                        <option value="16">Engineering Drawing</option>
                                                                        <option value="17">Fine Arts</option>
                                                                        <option value="18">Geography</option>
                                                                        <option value="19">History</option>
                                                                        <option value="20">Home Science</option>
                                                                        <option value="21">Philosophy</option>
                                                                        <option value="22">Physics</option>
                                                                        <option value="23">Political Science</option>
                                                                        <option value="24">Psychology</option>
                                                                        <option value="25">Foreign Language</option>
                                                                        <option value="26">Botany</option>
                                                                        <option value="27">Zoology</option>
                                                                        <option value="41">Hindi</option>
                                                                        <option value="43">Sanskrit</option>
                                                                        <option value="45">Urdu</option>
                                                                        <option value="46">English</option>
                                                                        <option value="48">Tamil</option>
                                                                        <option value="94">Malayalam</option>
                                                                        <option value="95">Telugu</option>
                                                                        <option value="96">Kannada</option>
                                                                        <option value="91">Art education</option>
                                                                        <option value="92">Health &amp; physical education</option>
                                                                        <option value="93">Work education</option>
                                                                        <option value="0">Other</option>
                                                                     </select>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_subj2_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->													
                                                         </div>
														 <div class="row">
														       <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Subject 3</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" id="emis_reg_staff_mainsubjcttaughtsubj3" name="emis_reg_staff_mainsubjcttaughtsubj3" required>
                                                                        <option value="">Select type of Subject</option>
                                                                        <option value="1">All subjects</option>
                                                                        <option value="3">Mathematics</option>
                                                                        <option value="4">Environment studies</option>
                                                                        <option value="5">Sports</option>
                                                                        <option value="6">Music</option>
                                                                        <option value="7">Science</option>
                                                                        <option value="8">Social studies</option>
                                                                        <option value="10">Accountancy</option>
                                                                        <option value="11">Biology</option>
                                                                        <option value="12">Business Studies</option>
                                                                        <option value="13">Chemistry</option>
                                                                        <option value="14">Computer Science</option>
                                                                        <option value="15">Economics</option>
                                                                        <option value="16">Engineering Drawing</option>
                                                                        <option value="17">Fine Arts</option>
                                                                        <option value="18">Geography</option>
                                                                        <option value="19">History</option>
                                                                        <option value="20">Home Science</option>
                                                                        <option value="21">Philosophy</option>
                                                                        <option value="22">Physics</option>
                                                                        <option value="23">Political Science</option>
                                                                        <option value="24">Psychology</option>
                                                                        <option value="25">Foreign Language</option>
                                                                        <option value="26">Botany</option>
                                                                        <option value="27">Zoology</option>
                                                                        <option value="41">Hindi</option>
                                                                        <option value="43">Sanskrit</option>
                                                                        <option value="45">Urdu</option>
                                                                        <option value="46">English</option>
                                                                        <option value="48">Tamil</option>
                                                                        <option value="94">Malayalam</option>
                                                                        <option value="95">Telugu</option>
                                                                        <option value="96">Kannada</option>
                                                                        <option value="91">Art education</option>
                                                                        <option value="92">Health &amp; physical education</option>
                                                                        <option value="93">Work education</option>
                                                                        <option value="0">Other</option>
                                                                     </select>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_subj3_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
														 </div>


                                                         <hr/>
                                                         

                                                </div>
                                                     
                                                <div class="form-actions">
                                                <div class="row">
                                                <div class="col-md-12">
                                                <div class="row">
                                                <div class="col-md-offset-5">
                                                <button type="submit" class="btn green"  id="emis_staff_reg_sub">Submit</button>
                                                <button type="button" onclick="location.href='<?php echo base_url().'Udise_staff/emis_school_staff2';?>'" class="btn default">Cancel</button>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- <div class="col-md-6"> </div> -->
                                                </div>
                                                </div>
                                                </form>
                                                <!-- END FORM-->
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
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>

            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/moment.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/jquery.mockjax.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js'?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js'?>" type="text/javascript"></script>
            <!-- Js for hide and show the tables and datas -->
            <!-- Js for hide and show the tables and datas ending-->
            <script src="<?php echo base_url().'asset/global/plugins/jquery.validate.min.js';?>"></script>

             <script src="<?php echo base_url().'asset/global/plugins/emis2.js'?>" type="text/javascript"></script>
            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <!-- END PAGE LEVEL SCRIPTS -->
            <script>
			
				function textvalidate(id,alertid){
				
					var text = document.getElementById(id);
					var alt = document.getElementById(alertid);
					if(text.value==''){
						alt.innerHTML="Required Field";
					}else {
						alt.innerHTML="";
					}
				}
				
				function mobilevalidate(id,alertid){
					var mobpattern = /^[6789]\d{9}$/;
					var text = document.getElementById(id);
					var alt = document.getElementById(alertid);
					if(text.value==''){
						alt.innerHTML="Required Field";
						return false;
					}else if(!text.value.match(mobpattern)){
						alt.innerHTML="Enter valid mobile number";
						return false;
					}else {
						alt.innerHTML="";
					}
				}
				
				function pinvalidate(id,alertid){
					var pinpattern = /^[6]\d{5}$/;
					var text = document.getElementById(id);
					var alt = document.getElementById(alertid);
					if(text.value==''){
						alt.innerHTML="Required Field";
						return false;
					}else if(!text.value.match(pinpattern)){
						alt.innerHTML="Enter valid Pincode";
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
						alt.innerHTML="Required Field";
						return false;
					}else if(!text.value.match(emailreg)){
						alt.innerHTML="Enter valid Email";
						return false;
					}else {
						alt.innerHTML="";
					}
				}
				
				var x = document.getElementById("emis_reg_dis");
				x.style.display = "none";
				
				function check(id,alertid) {
					var text = document.getElementById(id);
					var alt = document.getElementById(alertid);
					if(text.value==''){
						alt.innerHTML="Required Field";
					}else {
						alt.innerHTML="";
					}
					var dropdown = document.getElementById("emis_reg_sel");
					var current_value = dropdown.options[dropdown.selectedIndex].value;
					if (current_value == "2" || current_value == "3" || current_value == "4") {
						document.getElementById("emis_reg_dis").style.display = "block";
					}else {
						document.getElementById("emis_reg_dis").style.display = "none";
					}
				}
				
				
				var a = document.getElementById("emis_reg_rectrank_enable");
				var b = document.getElementById("emis_reg_rectyear_enable");
				a.style.display = "none";
				b.style.display = "none";
				function checkrecruitment(id,alertid) {
					
					var text = document.getElementById(id);
					var alt = document.getElementById(alertid);
					if(text.value==''){
						alt.innerHTML="Required Field";
					}else {
						alt.innerHTML="";
					}
					
					var dropdown = document.getElementById("emis_reg_rect");
					var current_value = dropdown.options[dropdown.selectedIndex].value;
					if (current_value == "1" || current_value == "2") {
						document.getElementById("emis_reg_rectrank_enable").style.display = "block";
						document.getElementById("emis_reg_rectyear_enable").style.display = "block";
					}else {
						document.getElementById("emis_reg_rectrank_enable").style.display = "none";
						document.getElementById("emis_reg_rectyear_enable").style.display = "none";
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
						alt.innerHTML="Required Field";
					}else {
						alt.innerHTML="";
					}
					
					var dropdown = document.getElementById("emis_reg_staff_qualificationacademic");
					var current_value1 = dropdown.options[dropdown.selectedIndex].value;
					
					if (current_value1 == "4") {
						
						document.getElementById("UG").style.display = "block";
						document.getElementById("PG").style.display = "none";
						
					}else if(current_value1 == "5" || current_value1 == "6" || current_value1 == "7" || current_value1 == "8"){
						document.getElementById("UG").style.display = "block";
						document.getElementById("PG").style.display = "block";
					}else{
						document.getElementById("UG").style.display = "none";
						document.getElementById("PG").style.display = "none";
					}
				}
				
				

               /*var yesno = [];
               $.each({
                   "1": "Yes",
                   "2": "No"        
               }, function(k, v) {
                   yesno.push({
                       id: k,
                       text: v
                   });
               });*/



            </script>
         </body>
      </html>