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
                                     <?php if($this->session->userdata('emis_school_id')!='') { ?>
                                    <?php $this->load->view('emis_school_profile_header1.php'); ?>
                                 <?php } ?>
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
                                                      <span class="caption-subject font-green-haze bold uppercase">Non-Teaching Staff Details</span>
                                                      <span class="caption-helper"></span>
                                                   </div>
                                                </div>
                                                <div class="portlet-body form" id="dialogform">
                                       <!-- error displaying part -->
									   <!-- BEGIN PAGE CONTENT INNER -->
                                          <?php if ($this->session->flashdata('staff')){ ?> 
                                                <?php if($validation_error!=""){  echo "<div class='alert alert-warning' id='alert1' name='alert1'>".validation_errors()."</div>"; } ?>
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
                                                   <form class="form-horizontal" method="post" action="<?php echo base_url().'Udise_staff/staffinfogetting1';?>" name="emis_staff_reg_form" id="emis_staff_reg_form">
                                                      
														  <label><h3>Personal Information</h3></label>
														   <div class="form-body">
                                                         
                                                         <div class="row">
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
                                                                  <label class="control-label col-md-3">Name of the Staff*</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="emis_reg_staff_name" name="emis_reg_staff_name" placeholder="பணியாளர் பெயர் " maxlength="60" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" onkeyup='this.value=this.value.toUpperCase();hasWhiteSpace(this);' onfocus="textvalidate(this.id,'emis_reg_staff_name_alert');" onchange="textvalidate(this.id,'emis_reg_staff_name_alert');" autocomplete="off" required>
																	  
                                                                     <font style="color:#dd4b39;"><div id="emis_reg_staff_name_alert"></div></font>
                                                                  </div>
																  
																	<!--<label class="control-label col-md-1">Initials</label>
																<div class="col-md-3">
																<input type="text" class="form-control" id="emis_reg_staff_initial" name="emis_reg_staff_initial" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" onkeyup='this.value=this.value.toUpperCase();hasWhiteSpace(this);' onfocus="textvalidate(this.id,'emis_reg_staff_initial_alert');" onchange="textvalidate(this.id,'emis_reg_staff_initial_alert');" autocomplete="off" required placeholder="Initials" maxlength="5">
																<font style="color:#dd4b39;"><div id="emis_reg_staff_initial_alert"></div></font>-->
																</div>
                                                 </div>
                                                <div class="col-md-6">
                                                                <div class="form-group">
                                                                  <label class="control-label col-md-3">Name of the Staff*</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="emis_reg_staff_tname" name="emis_reg_staff_tname" placeholder="பணியாளர் பெயர் " maxlength="60" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" onkeyup='this.value=this.value.toUpperCase();hasWhiteSpace(this);' onfocus="textvalidate(this.id,'emis_reg_staff_name_alert');" onchange="textvalidate(this.id,'emis_reg_staff_name_alert');" autocomplete="off" required>
                                                     
                                                                     <font style="color:#dd4b39;"><div id="emis_reg_staff_name_alert"></div></font>
                                                                  </div>
                                                  
                                                   <!--<label class="control-label col-md-1">Initials</label>
                                                <div class="col-md-3">
                                                <input type="text" class="form-control" id="emis_reg_staff_initial" name="emis_reg_staff_initial" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" onkeyup='this.value=this.value.toUpperCase();hasWhiteSpace(this);' onfocus="textvalidate(this.id,'emis_reg_staff_initial_alert');" onchange="textvalidate(this.id,'emis_reg_staff_initial_alert');" autocomplete="off" required placeholder="Initials" maxlength="5">
                                                <font style="color:#dd4b39;"><div id="emis_reg_staff_initial_alert"></div></font>-->
                                                </div>
																
                                                           </div>
															
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3"> Aadhaar Number* </label>
                                                                  <div class="col-md-9">
                                                                    <input type="text" class="form-control" id="emis_reg_staff_aadhaar" name="emis_reg_staff_aadhaar" placeholder="ஆதார் எண்" maxlength="12" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onfocus="textvalidate(this.id,'emis_reg_staff_aadhaar_alert');" onchange="textvalidate(this.id,'emis_reg_staff_aadhaar_alert');" autocomplete="off" onblur="return aadharcheck(this);" required>
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
                                                                     <select class="form-control" id="emis_reg_staff_gender" name="emis_reg_staff_gender" required onfocus="textvalidate(this.id,'emis_reg_staff_gender_alert');" onchange="textvalidate(this.id,'emis_reg_staff_gender_alert');" autocomplete="off">
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
                                                                     <select class="form-control" data-placeholder="Choose Blood Group" id="emis_reg_staff_bg" onfocus="textvalidate(this.id,'emis_reg_staff_bg_alert');" onchange="textvalidate(this.id,'emis_reg_staff_bg_alert');" autocomplete="off" required>
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
																	<input class="form-control" id="emis_reg_staff_dob" name="emis_reg_staff_dob" placeholder="DD/MM/YYYY" min="<?php echo (date("Y-m-d",strtotime("now - 60Year"))); ?>" max="<?php echo (date("Y-m-d",strtotime("now - 18Year"))); ?>" type="date" onfocus="setmindoj(this,'emis_reg_staff_join',18,this.id,'emis_reg_staff_dob_alert');" onchange="setmindoj(this,'emis_reg_staff_join',18,this.id,'emis_reg_staff_dob_alert')" required />
																	<font style="color:#dd4b39;"><div id="emis_reg_staff_dob_alert"></div></font>
                                                                     
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3"> Social Category* </label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" id="emis_reg_staff_socialcategory" name="emis_reg_staff_socialcategory" onfocus="textvalidate(this.id,'emis_reg_staff_sc_alert');" onchange="textvalidate(this.id,'emis_reg_staff_sc_alert');" autocomplete="off" required>
                                                                       <option value="">Select Social Category</option>
                                                                       <?php foreach($teachersocial as $social){?>
                                                                        <option value="<?php echo $social->id; ?>"><?php echo $social->social_cat; ?></option>
                                                                        <?php }?>
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
                                                                  <label class="control-label col-md-3">Designation of Staff*</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" id="emis_reg_staff_teachertype" name ="emis_reg_staff_teachertype" onfocus="textvalidate(this.id,'emis_reg_staff_type_alert');" onchange="textvalidate(this.id,'emis_reg_staff_type_alert');" autocomplete="off" required>
                                                                        <option value="">Select type of staff</option>
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
                                                                     <input type="text" class="form-control" id="emis_reg_staff_fname" name="emis_reg_staff_fname" maxlength="30" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" onkeyup='this.value=this.value.toUpperCase();hasWhiteSpace(this);' onfocus="textvalidate(this.id,'emis_reg_staff_fname_alert');" onchange="textvalidate(this.id,'emis_reg_staff_fname_alert');" autocomplete="off" required>
																	  <!--<p>Name followed by Initial Eg. Ganesh R</p>-->
                                                                     <font style="color:#dd4b39;"><div id="emis_reg_staff_fname_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															 
														   
                                                         </div>
														 
														 <div class="row">
															<div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Spouse Name, if any.</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="emis_reg_staff_spname" name="emis_reg_staff_spname" maxlength="60" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" onkeyup='this.value=this.value.toUpperCase();hasWhiteSpace(this);'>
																	 
                                                                     <font style="color:#dd4b39;"><div id="emis_reg_staff_sname_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															
															<div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Mother's Name*</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="emis_reg_staff_mname" name="emis_reg_staff_mname" maxlength="60" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" onkeyup='this.value=this.value.toUpperCase();hasWhiteSpace(this);' onfocus="textvalidate(this.id,'emis_reg_staff_mname_alert');" onchange="textvalidate(this.id,'emis_reg_staff_mname_alert');" autocomplete="off" required>
																	
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
                                                                     <select class="form-control" name="emis_reg_staff_typeofdisability" id="emis_reg_sel" onchange="check(this.id,'emis_reg_staff_typedistype_alert');setRequiredField(this.value,'emis_reg_staff_distype','2,3')" onfocus="check(this.id,'emis_reg_staff_typedistype_alert');" autocomplete="off">
                                                                        <option value="">Select type of disability</option>
                                                                        <option value="1">Not applicable</option>
                                                                        <option value="2">Physically Challenged</option>
                                                                        <option value="3">Visually Impaired</option>
                                                                        <option value="4">Deaf and Dumb</option>
                                                                     </select>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_typedistype_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
														  
														  <div class="col-md-6" id="emis_reg_dis">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Differently abled Details(including percentage)*</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="emis_reg_staff_distype" name="emis_reg_staff_distype" maxlength="200" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" onChange="textvalidate(this.id,'emis_reg_staff_distype_alert');" onfocus="textvalidate(this.id,'emis_reg_staff_distype_alert');" autocomplete="off">
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
																  <input class="form-control" min="<?php echo (date("Y-m-d",strtotime("now - 40Year"))); ?>" max="<?php echo (date("Y-m-d",strtotime("now"))); ?>" id="emis_reg_staff_join" name="emis_reg_staff_join" placeholder="DD/MM/YYYY" type="date" onfocus="setmindoj(this,'emis_reg_staff_pjoin',0,this.id,'emis_reg_staff_join_alert')" onchange="setmindoj(this,'emis_reg_staff_pjoin',0,this.id,'emis_reg_staff_join_alert');setmindoj(this,'emis_reg_staff_psjoin',0,this.id,'emis_reg_staff_pjoin_alert')" disabled="true" onkeydown="return false" required />
																  <font style="color:#dd4b39;"><div id="emis_reg_staff_join_alert"></div></font>
                                                                     
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
															
															<div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Date of Joining in Present Post*</label>
                                                                  <div class="col-md-9">
																  <input class="form-control" min="<?php echo (date("Y-m-d",strtotime("now - 40Year"))); ?>" max="<?php echo (date("Y-m-d",strtotime("now"))); ?>" id="emis_reg_staff_pjoin" name="emis_reg_staff_pjoin" placeholder="DD/MM/YYYY" type="date" onfocus="textvalidate(this.id,'emis_reg_staff_pjoin_alert')" onchange="textvalidate(this.id,'emis_reg_staff_pjoin_alert')" disabled onkeydown="return false" required />
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
																  <input class="form-control" min="<?php echo (date("Y-m-d",strtotime("now - 40Year"))); ?>" max="<?php echo (date("Y-m-d",strtotime("now"))); ?>" id="emis_reg_staff_psjoin" name="emis_reg_staff_psjoin" placeholder="DD/MM/YYYY" type="date" onfocus="textvalidate(this.id,'emis_reg_staff_psjoin_alert')" onchange="textvalidate(this.id,'emis_reg_staff_psjoin_alert')" disabled onkeydown="return false" required />
																  <font style="color:#dd4b39;"><div id="emis_reg_staff_psjoin_alert"></div></font>
                                                                     
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
															
															<div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">GPF/CPS/EPF/TPF Details*</label>
                                                                  <div class="col-md-9">
																  <select class="form-control" name="emis_reg_cpsgps_details" id="emis_reg_cpsgps_details" onfocus="checkcps(this.id,'emis_reg_staff_cps_alert');" onchange="checkcps(this.id,'emis_reg_staff_cps_alert');setRequiredField(this.value,'emis_reg_staff_cps,emis_reg_staff_suffix','1,2,6')"  required>
                                                                        <option value="">Select type of GPF/CPS/EPF/TPF</option>
                                                                        <option value="1">GPF</option>
                                                                        <option value="2">CPS</option>
                                                                        <option value="6">TPF</option>
                                                                        <option value="5">EPF</option>
																		<option value="3">Applied</option>
                                                                        <option value="4">Not Applicable</option>
                                                                     </select>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_cps_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															<!--/span-->
															
															
														  </div>
														  
														  <div class="row" >
															
															
															<div class="col-md-6" id="epsnumber">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">GPF/CPS/EPF/TPF Number*</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="emis_reg_staff_cps" name="emis_reg_staff_cps" maxlength="25" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onchange="textvalidate(this.id,'emis_reg_staff_cpsnumber_alert');" onfocus="textvalidate(this.id,'emis_reg_staff_cpsnumber_alert');" autocomplete="off">
																	 <p>GPF/CPS/EPF/TPF Eg. 1234567</p>
                                                                     <font style="color:#dd4b39;"><div id="emis_reg_staff_cpsnumber_alert"></div></font>
                                                                  </div>
																  
                                                               </div>
                                                            </div>
															
															<div class="col-md-6" id="cpsnumber">
                                                               <div class="form-group" >
                                                                  <label class="control-label col-md-3">Suffix*</label>
                                                                  <div class="col-md-9">
																  <select class="form-control" name="emis_reg_staff_suffix" id="emis_reg_staff_suffix" onfocus="textvalidate(this.id,'emis_reg_staff_suffix_alert');" onchange="textvalidate(this.id,'emis_reg_staff_suffix_alert');">
                                                                        <option value="">Select type of GPF/CPS/TPF</option>
                                                                        <?php foreach($suffix as $res) {   ?>
																		<option value="<?php echo $res->id; ?>"><?php echo $res->suffix; ?></option>
																		<?php  } ?>
                                                                     </select>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_suffix_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															
															
															</div>
														  
														  
														  <div class="row">
															<div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Mode of Recruitment*</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" name="emis_reg_staff_mode" id="emis_reg_rect" onfocus="checkrecruitment(this.id,'emis_reg_staff_mode_alert');" onchange="checkrecruitment(this.id,'emis_reg_staff_mode_alert');setRequiredField(this.value,'emis_reg_staff_rank,emis_reg_staff_yearselection','1,2,11')" autocomplete="off" required>
                                                                        <option value="">Select type of Recruitment</option>
                                                                        <option value="1">TNPSC</option>
                                                                        <option value="2">TRB</option>
                                                                        <option value="11">TET</option>
                                                                        <option value="3">Compassionate Grounds</option>
                                                                        <option value="4">Transfer of Services</option>
																		<option value="5">Outsourcing</option>
																		<option value="6">Employment Seniority</option>
																		<option value="7">Retrenched Census Employees</option>
                                                                        <option value="8">Management</option>
                                                                        <option value="9">SSA</option>
                                                                        <option value="10">Direct Recruitment</option>
                                                                     </select>
																	 <font style="color:#dd4b39;"><div id="emis_reg_staff_mode_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															
															<div class="col-md-6" id="emis_reg_rectrank_enable">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Recruitment Rank</label>
                                                                  <div class="col-md-9">
                                                                    <input type="text" class="form-control" id="emis_reg_staff_rank" name="emis_reg_staff_rank" placeholder="Rank" maxlength="6" onkeypress="return( event.charCode >= 48 && event.charCode <= 57) || ( event.charCode > 64 && event.charCode < 91) || ( event.charCode > 96 && event.charCode < 123) || event.charCode == 0" onfocus="textvalidate(this.id,'emis_reg_staff_rank_alert');" onchange="textvalidate(this.id,'emis_reg_staff_rank_alert');"autocomplete="off">
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
																		<select class="form-control" data-placeholder="Choose a Category" id="emis_reg_staff_yearselection" name="emis_reg_staff_yearselection" onfocus="textvalidate(this.id,'emis_reg_staff_yearselection_alert');" onchange="textvalidate(this.id,'emis_reg_staff_yearselection_alert');"autocomplete="off">
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
                                                                     <select class="form-control" id="emis_reg_staff_appntmntnature" name="emis_reg_staff_appntmntnature" onfocus="textvalidate(this.id,'emis_reg_staff_np_alert');" onchange="textvalidate(this.id,'emis_reg_staff_np_alert');" autocomplete="off" required>
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
                                                                     <input type="email" placeholder="மின்னஞ்சல்" class="form-control" name="emis_reg_staff_email" id="emis_reg_staff_email" maxlength="60" onfocus="emailvalidate(this.id,'emis_reg_staff_email_alert');" onchange="emailvalidate(this.id,'emis_reg_staff_email_alert');" autocomplete="off" required  >
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
                                                                     <select class="form-control" data-placeholder="Choose a Category" id="emis_reg_staff_district" name="emis_reg_staff_district" placeholder=">மாவட்டம் *" onfocus="textvalidate(this.id,'emis_reg_staff_district_alert');" onchange="textvalidate(this.id,'emis_reg_staff_district_alert');" required>
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
                                                                     <input type="text" placeholder="அஞ்சல் குறியீட்டு எண் *" class="form-control" id="emis_reg_staff_pincode" maxlength="6" name="emis_reg_staff_pincode" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onchange="pinvalidate(this.id,'emis_reg_staff_pincode_alert');" onfocus="pinvalidate(this.id,'emis_reg_staff_pincode_alert');" autocomplete="off" required>
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
                                                                      <select class="form-control" id="emis_reg_staff_qualificationacademic" name="emis_reg_staff_qualificationacademic"  onfocus="academicvalidate(this.id,'emis_reg_staff_academic_alert');" onchange="academicvalidate(this.id,'emis_reg_staff_academic_alert');setRequiredField(this.value,'emis_reg_staff_ug,emis_reg_staff_pg',(this.value-3)+',5,6,7,8');setRequiredField(this.value,'emis_reg_staff_ug','4');" required>
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
                                                                     <select class="form-control" id="emis_reg_staff_qualificationprofessional" name="emis_reg_staff_qualificationprofessional" onfocus="textvalidate(this.id,'emis_reg_staff_prof_alert');" onchange="textvalidate(this.id,'emis_reg_staff_prof_alert');"  required>
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
                                                                     <select class="form-control" id="emis_reg_staff_ug" name="emis_reg_staff_ug"  onfocus="textvalidate(this.id,'emis_reg_staff_ug_alert');" onchange="textvalidate(this.id,'emis_reg_staff_ug_alert');" autocomplete="off"  >
																	 <option value="">Select type of UG</option>
																	 <?php foreach($ug as $res) {   ?>
																		<option value="<?php echo $res->id; ?>"><?php echo $res->ug_degree; ?></option>
																		<?php  } ?>
                                                                        
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
														  <label><h3>Bank Account Information</h3></label>
                                                         <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">IFSC Code</label>
                                                                  <div class="col-md-9">
                                                                      <input type="text" class="form-control" placeholder="IFSC Code" name="ifsc_code" id="ifsc_code" 
																	 onchange="ifsccode()"
																	  onchange="ifsccheck(ifsc_code);" autocomplete="off" required>
																	 <font style="color:#dd4b39;"><div id="ifsc_code_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Branch Name</label>
                                                                  <div class="col-md-9">
                                                                    <input type="text" class="form-control"  name="branch" id="branch" 
																	  readonly>
																	 <font style="color:#dd4b39;"><div id="branch_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->													
                                                         </div>
														 <div class="row">
														       <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Bank Name</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control"  name="bankname" id="bankname" 
																	  readonly>
																	 <font style="color:#dd4b39;"><div id="bankname_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															 <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Account Number</label>
                                                                  <div class="col-md-9">
                                                                    <input type="text" class="form-control"  name="accountnumber" id="accountnumber" 
																	  required>
																	 <font style="color:#dd4b39;"><div id="accountnumber_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
														 </div>
													<div class="row">
													<div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">PAN Number</label>
                                                                  <div class="col-md-9">
                                                                    <input type="text" class="form-control"  name="pannumber" id="pannumber" 
																	  maxlength="10" onkeyup='this.value=this.value.toUpperCase();hasWhiteSpace(this);' required>
																	 <font style="color:#dd4b39;"><div id="pannumber_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                             </div>      
												<input type="hidden" class="form-control"  name="bankid" id="bankid">

                                                        <hr>
														 <!--/span-->
                                                        
                                                         <!--/span-->
                                                        
                                                        <!--<label><h3>Deputation Details</h3></label>
                                                            
                                                            <div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr>
                                                                        <td colspan="2"  style="border-top: none;">
                                                                            <label>Whether the Staff has been Deputed ?</label>
                                                                        </td>
                                                                       <td style="border-top: none;">
                                                                           <label for="deputed_1">Yes</label>&nbsp;&nbsp;<input type="radio" id="deputed_1" value="1" onchange="sbcshow2(this,'deputeddetails');" name="deputedteacher"/>
                                                                            <label for="deputed_2">No</label>&nbsp;&nbsp;<input type="radio" id="deputed_2" value="0" onchange="reset();sbcshow2(this,'deputeddetails');sbcshow1(document.getElementById('deputeoffice_2'),'wtbetails');sbcshow1(document.getElementById('deputeoffice_2'),'wtdschooldetails');" name="deputedteacher" checked="checked"/>
                                                                        </td>
                                                                    
                                                                       
                                                                        <td style="border-top: none;" colspan="2" class="deputeddetails">Select the place to deputed the staff?</td>
                                                                       
                                                                        <td  class="deputeddetails" style="width: 165px;border-top: none;">
                                                                            <label for="deputeoffice_1">Office</label> &nbsp;&nbsp;<input type="radio" id="deputeoffice_1" name="deputedofficeteacher" value="1" onchange="sbcshow1(this,'wtbetails');sbcshow1(document.getElementById('deputeoffice_2'),'wtdschooldetails');" />
                                                                            <label for="deputeoffice_2">School</label> &nbsp;&nbsp;<input type="radio" id="deputeoffice_2" name="deputedofficeteacher" value="0" onchange="sbcshow1(document.getElementById('deputeoffice_1'),'wtdschooldetails');sbcshow1(this,'wtbetails')"/>
                                                                        </td>
                                                                        
                                                                        
                                                                    </tr>
                                                                    </table>
                                                                
                                                            </div>  
                                                            <div class="form-group col-md-12 wtbetails" id="dts">
                                                                <table class="table">
                                                                    <tr >
                                                                                                                        
                                                                        <td style="border-top: none;">
                                                                            <label>Select the District</label>
                                                                        </td>
                                                                        <td style="border-top: none;">
                                                                       
                                                                            <select id="districtstaff" name="districtstaff" onchange="deputoffice(this.parentNode);" class="form-control">
                                                                                <option value="">Choose</option>
                                                                                <?php
                                                                                    foreach($schooldist as $dist) {
                                                                                ?>
                                                                                <option value="<?php echo $dist->id; ?>"><?php echo $dist->district_name; ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </td>
                                                                        
                                                                        <td style="border-top: none;">
                                                                            <label>Select the Office</label>
                                                                        </td>
                                                                        <td style="border-top: none;">
                                                                        <select class="form-control" id="officeselect" name="officeselect" >
                                                                         
                                                                            <option value="">Select Office</option>
                                                                            
                                                                           
                                                                            </select>
                                                                        </td>
                                                                        <td style="border-top: none;"><label>Deputed from</label></td>
                                                                        <td style="border-top: none;"><input type="date" id="officedate" name="officedate" class="form-control" onkeydown="return false;" max="<?php echo (date('Y-m-d',strtotime('now')));?>"></td>
                                                                        
                                                                    </tr>
                                                                    </table>
                                                                
                                                            </div>  
                                                                
                                                                   
                                                            <div class="form-group col-md-12 wtdschooldetails" >
                                                            <table class="table">
                                                                  
                                                            
                                                              <tr >
                                                                        <td style="border-top: none;">
                                                                            <label>Select the District</label>
                                                                        </td>
                                                                        <td style="border-top: none;">
                                                                       
                                                                            <select id="districtstaff1" name="districtstaff1" onchange="deputdistrict(this.parentNode);" class="form-control">
                                                                                <option value="">Choose</option>
                                                                                 <?php
                                                                                    foreach($schooldist as $dist) {
                                                                                ?>
                                                                                <option value="<?php echo $dist->id; ?>"><?php echo $dist->district_name; ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </td>
                                                                        <td style="border-top: none;">
                                                                            <label>Select the Block</label>
                                                                        </td>
                                                                        <td style="border-top: none;">
                                                                            <select id="blockstaff1" name="blockstaff1" onchange="deputschooldetails(this.parentNode)" class="form-control">
                                                                                <option value="">Choose</option>
                                                                                
                                                                            </select>
                                                                        </td>
                                                                         <td style="border-top: none;">
                                                                            <label>Select the School</label>
                                                                        </td>
                                                                        <td style="border-top: none;">
                                                                            <select id="schoolstaff" name="schoolstaff" class="form-control">
                                                                                <option value="">Choose</option>
                                                                                
                                                                            </select>
                                                                        </td>
                                                                        
                                                                        <td style="border-top: none;"><label>Deputed from</label></td>
                                                                        <td style="border-top: none;"><input type="date" id="schooldate" name="schooldate" class="form-control" onkeydown="return false;" max="<?php echo (date('Y-m-d',strtotime('now')));?>"></td>
                                                                    </tr>
                                                                    
                                                                
                                                                   
                                                                </table>
                                                                
                                                            </div>-->
                                                        
                                                        
                                                        
                                                </div>
												
												 <div class="form-actions">
                                                    <!--<button type="submit" class="btn green" id="emis_staff_reg_sub" onclick="return popup()">Submit</button>-->
												    <button type="button" class="btn btn-primary" onclick="return checkRequired(this.parentNode.parentNode.id);">Submit</button>
                                                    <button type="button" onclick="location.href='<?php echo base_url().'Udise_staff/emis_school_staff4';?>'" class="btn default">Cancel</button>
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
			
				<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Confirm your Data</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="modalbody">
	  
		<table class="table">
			<thead>
				<tr class="bg-primary text-white"><th colspan="4">Personal Information</th></tr>
			</thead>
			<tbody>
				<tr>
					<th>Name of the Staff</th>
					<td style="max-width: 150px;">
						<span style="word-wrap:break-word;" id="emis_reg_staff_name_td"></span>
						<!--<span id="emis_reg_staff_initial_td"></span>-->
					</td>
               <th>Name of the Staff In Tamil</th>
               <td style="max-width: 150px;">
                  <span style="word-wrap:break-word;" id="emis_reg_staff_tname_td"></span>
                  <!--<span id="emis_reg_staff_initial_td"></span>-->
               </td>
            </tr>
            <tr>
					<th>Aadhaar Number</th>
					<td id="emis_reg_staff_aadhaar_td"></td>
				</tr>
				<tr>
					<th>Gender</th>
					<td id="emis_reg_staff_gender_td"></td>
					<th>Blood Group</th>
					<td id="emis_reg_staff_bg_td"></td>
				</tr>
				<tr>
					<th>Date of Birth</th>
					<td id="emis_reg_staff_dob_td"></td>
					<th>Social Category</th>
                    <td id="emis_reg_staff_socialcategory_td"></td>
				</tr>
				<tr>
					<th>Designation of Staff</th>
					<td id="emis_reg_staff_teachertype_td"></td>
					<th>Father's Name</th>
					<td style="max-width: 150px;">
                        <span id="emis_reg_staff_fname_td" style="word-wrap: break-word;"></span>
                    </td>
				</tr>
				<tr>
					
					<th>Mother's Name</th>
					<td style="max-width: 150px;"> 
                        <span id="emis_reg_staff_mname_td" style="word-wrap: break-word;"></span>
                    </td>
					<th>Differently abled type, If any</th>
					<td id="emis_reg_sel_td"></td>
				</tr>
				<tr>
					<th>Spouse Name, if any.</th>
					<td style="max-width: 150px;">
                    <span id="emis_reg_staff_spname_td" style="word-wrap: break-word;"></span>
                    </td>
					<th>Differently abled Details(including percentage)</th>
                    <td id="emis_reg_staff_distype_td"></td>
					
				</tr>
				
				
				<tr class="bg-primary text-white"><th colspan="4">Joining Details</th></tr>
				<tr>
					<th>Date of Joining in Service</th>
					<td id="emis_reg_staff_join_td"></td>
					<th>Date of Joining in Present Post</th>
					<td id="emis_reg_staff_pjoin_td"></td>
				</tr>
				<tr>
					<th>Date of Joining in Present School</th>
					<td id="emis_reg_staff_psjoin_td"></td>
					<th>GPF/CPS Number</th>
					<td>
						<span id="emis_reg_cpsgps_details_td"></span>&nbsp;
						<span id="emis_reg_staff_cps_td"></span>&nbsp;
						<span id="emis_reg_staff_suffix_td"></span>
					</td>
					
				</tr>
				<tr>
					<th>Mode of Recruitment</th>
					<td id="emis_reg_rect_td"></td>
					<th>Nature of appointment</th>
					<td id="emis_reg_staff_appntmntnature_td"></td>
				</tr>
				<tr>
					<th>Recruitment Rank</th>
					<td id="emis_reg_staff_rank_td"></td>
					<th>Year Selection</th>
					<td id="emis_reg_staff_yearselection_td"></td>
				</tr>
				<tr class="bg-primary text-white"><th colspan="4">Communication Details</th></tr>
				<tr>
					<th>Mobile</th>
					<td id="emis_reg_staff_contact_td"></td>
					<th>E-Mail Id</th>
					<td id="emis_reg_staff_email_td"></td>
				</tr>
				<tr>
					<th>Door no. / Building Name</th>
					<td id="emis_reg_staff_door_td"></td>
					<th>Street Name / Area name</th>
					<td id="emis_reg_staff_street_td"></td>
				</tr>
				<tr>
					<th>City name / Village name</th>
					<td id="emis_reg_staff_city_td"></td>
					<th>District</th>
					<td id="emis_reg_staff_district_td"></td>
				</tr>
				<tr>
					<th>Pincode</th>
					<td id="emis_reg_staff_pincode_td"></td>
				</tr>
				<tr class="bg-primary text-white"><th colspan="4">Academic Qualification</th></tr>
				<tr>
					<th>Academic</th>
					<td id="emis_reg_staff_qualificationacademic_td"></td>
					<th>Professional</th>
					<td id="emis_reg_staff_qualificationprofessional_td"></td>
				</tr>
                <tr>
					<th>U.G.</th>
					<td id="emis_reg_staff_ug_td"></td>
					<th>P.G.</th>
					<td id="emis_reg_staff_pg_td"></td>
				</tr>
                
               <!-- <tr class="bg-primary text-white"><th colspan="4">Deputed Details</th></tr>
				<tr>
					<th>Deputed</th>
					<td id="deputedteacher_td"></td>
					<th>Deputed Place</th>
					<td id="deputedofficeteacher_td"></td>
				</tr>
                <tr>
					<th>District</th>
					<td id="districtstaff_td"></td>
					<th>Office</th>
					<td id="officeselect_td"></td>
				</tr>
               
				<tr>
					<th>School District</th>
					<td id="districtstaff1_td"></td>
					<th>School Block</th>
					<td id="blockstaff1_td"></td>
				</tr>
                <tr>
					<th>School</th>
					<td id="schoolstaff_td"></td>
					
				</tr>-->
				
	  </tbody>
	  </table>
	
		
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
		<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="return popup()">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
	<?php $this->load->view('scripts.php'); ?>




		<script src="<?php echo base_url().'asset/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js';?>" type="text/javascript"></script>
		<script src="<?php echo base_url().'asset/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js';?>" type="text/javascript"></script>
		<script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js'?>" type="text/javascript"></script>	
		 <script src="<?php echo base_url().'asset/js/vivekrao/generate.js';?>" type="text/javascript"></script>
            <script>
            
            /*function deputdistrict(node) {
                var deputdistrict = document.getElementById('districtstaff1').value;
                //alert(deput);
                $.ajax({
                      type: "POST",
                      url:baseurl+'Udise_staff/deputeddetails',
                      data:"&deputdistrict="+deputdistrict,
                      success: function(resp){     

                      document.getElementById("blockstaff1").innerHTML=resp;
                      return true;  
                 
                     },
                    error: function(e){ 
                    alert('Error: ' + e.responseText);
                    return false;  
        
                  }
              });
            }
            
            function deputschooldetails(node) {
                
                    var deputdistrict = document.getElementById('districtstaff1').value;
                    var deputblk = document.getElementById('blockstaff1').value;
                //alert(deput);
                $.ajax({
                      type: "POST",
                      url:baseurl+'Udise_staff/deputedschooldetails',
                      data:"&deputdistrict="+deputdistrict+"&deputblk="+deputblk,
                      success: function(resp){     

                      document.getElementById("schoolstaff").innerHTML=resp;
                      return true;  
                 
                     },
                    error: function(e){ 
                    alert('Error: ' + e.responseText);
                    return false;  
        
                  }
              });
            }
            
            function deputoffice(node) {
                 var deputdistrict = document.getElementById('districtstaff').options.selectedIndex;
                // var deputblock = document.getElementById('blockstaff').options.selectedIndex;
                
                $.ajax({
                      type: "POST",
                      url:baseurl+'Udise_staff/deputoffice',
                      data:"&deputdistrict="+deputdistrict,
                      success: function(resp){     

                      document.getElementById("officeselect").innerHTML=resp;
                      return true;  
                 
                     },
                    error: function(e){ 
                    alert('Error: ' + e.responseText);
                    return false;  
        
                  }
              });
                
            }*/
            
            /**Function edited by Ramco Cements Magesh Elumalai*/ 
           /* sbcshow2(document.getElementById('deputed_2'),'deputeddetails');
            sbcshow1(document.getElementById('deputeoffice_2'),'wtbetails');
            document.getElementsByClassName('wtdschooldetails')[0].style.display='none';
			function sbcshow1(sbc,sbcclass) {
			 var x = document.getElementsByClassName(sbcclass);
             if(sbc.value==0 || sbc.value=='') {
                for(var i=0;i<x.length;i++){
                    x[i].style.display='none';
                }
             } else{
                for(var i=0;i<x.length;i++){
                    x[i].style.display='';
                }
             }
             
			}*/
            
            function reset() {
                document.getElementById('districtstaff').selectedIndex = 0;
                document.getElementById('officeselect').selectedIndex = 0;
                document.getElementById('districtstaff1').selectedIndex = 0;
                document.getElementById('blockstaff1').selectedIndex = 0;
                document.getElementById('schoolstaff').selectedIndex = 0;
            }
            
            function sbcshow2(sbc,sbcclass) {
			 var x = document.getElementsByClassName(sbcclass);
             if(sbc.value==0 || sbc.value=='') {
                for(var i=0;i<x.length;i++){
                    x[i].style.visibility='hidden';
                }
             } else{
                for(var i=0;i<x.length;i++){
                    x[i].style.visibility='';
                }
             }
             
			}
            
            
			 function hasWhiteSpace(s) {
				var str=s.value;
				if((str.charCodeAt(str.length-1)==32) && (str.charCodeAt(str.length-2)==32)){
				str = str.slice(0, -1);
				s.value=str;
			}
			}
			
			function textvalidate(id,alertid){
				
					var text = document.getElementById(id);
					var alt = document.getElementById(alertid);
					if(text.value==''){
						alt.innerHTML="This field is required";
					}else {
						alt.innerHTML="";
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
				
				function pinvalidate(id,alertid){
					var pinpattern = /^[6]\d{5}$/;
					var text = document.getElementById(id);
					var alt = document.getElementById(alertid);
					if(text.value==''){
						alt.innerHTML="This field is required";
						return false;
					}else if(!text.value.match(pinpattern)){
						alt.innerHTML="Enter valid Pincode. Starting with 6";
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
						alt.innerHTML="This field is required";
					}else {
						alt.innerHTML="";
					}
					var dropdown = document.getElementById("emis_reg_sel");
					var current_value = dropdown.options[dropdown.selectedIndex].value;
					if (current_value == "2" || current_value == "3" || current_value == "4") {
						document.getElementById("emis_reg_dis").style.display = "block";
					}else {
						document.getElementById("emis_reg_dis").style.display = "none";
                        $('#emis_reg_staff_distype').val('');
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
						alt.innerHTML="This field is required";
					}else {
						alt.innerHTML="";
					}
					var dropdown = document.getElementById("emis_reg_rect");
					var current_value = dropdown.options[dropdown.selectedIndex].value;
					if (current_value == "1" || current_value == "2" || current_value == "11") {
						document.getElementById("emis_reg_rectrank_enable").style.display = "block";
						document.getElementById("emis_reg_rectyear_enable").style.display = "block";
					}else {
						document.getElementById("emis_reg_rectrank_enable").style.display = "none";
						document.getElementById("emis_reg_rectyear_enable").style.display = "none";
                        $('#emis_reg_staff_yearselection option:selected').removeAttr('selected');
                        $('#emis_reg_staff_rank').val('');
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
						//alert('hi');
						document.getElementById("UG").style.display = "block";
						document.getElementById("PG").style.display = "none";
                        $('#PG option:selected').removeAttr('selected');
					}
						else if(current_value1 == "5" || current_value1 == "6" || current_value1 == "7" || current_value1 == "8"){

						document.getElementById("UG").style.display = "block";
						document.getElementById("PG").style.display = "block";
					}else{
						document.getElementById("UG").style.display = "none";
						document.getElementById("PG").style.display = "none";
                        $('#UG option:selected').removeAttr('selected');
                        $('#PG option:selected').removeAttr('selected');
					}
                   
				}
				
				var z = document.getElementById("cpsnumber");
                var e = document.getElementById("epsnumber");
				z.style.display = "none";
                e.style.display = "none";
				function checkcps(id,alertid) {
					var text = document.getElementById(id);
					var alt = document.getElementById(alertid);
					if(text.value==''){
						alt.innerHTML="This field is required";
					}else {
						alt.innerHTML="";
					}
					var current_value = document.getElementById("emis_reg_cpsgps_details").value;;
				    
					if (current_value == "1" || current_value == "2" || current_value == "6") {
					  // alert (current_value);
						document.getElementById("cpsnumber").style.display = "block";
                        document.getElementById("epsnumber").style.display = "block";
					}else if(current_value == "5"){
					   document.getElementById("epsnumber").style.display = "block";
                       document.getElementById("cpsnumber").style.display = "none";
					}else {
						document.getElementById("cpsnumber").style.display = "none";
                        document.getElementById("epsnumber").style.display = "none";
                        $('#emis_reg_staff_suffix option:selected').removeAttr('selected');
                        $('#emis_reg_staff_cps').val('');
					}
				}
				
				//Function Included By Vivek Rao Ramco Cements

function checkRequired(frmid){
	
    var frm=document.getElementById(frmid);
	//alert(frmid);
    var checkbit=0;var pt='';
    for(var i=0;i<frm.elements.length;i++){
		if((frm.elements[i].hasAttribute("required")) && (frm.elements[i].value=='' || frm.elements[i].value==null)){
		      pr=frm.elements[i].parentNode.parentNode;
              //alert('Check Field :'+pr.children[0].innerHTML);
		      frm.elements[i].focus();
              return false;
		}
        modalTDID(frm.elements[i].id+'_td',frm.elements[i]);
    }
    //alert('Checkbit ='+checkbit);
    if(checkbit==0)
        $('#myModal').modal({show: 'true'});
}



function checkPreviousLabelNode(node){
    //alert('Label :'+node.id+'-----'+node.value);
    var labelElement=node;
    if((labelElement instanceof HTMLLabelElement)){
        //console.log(labelElement);
        return labelElement;
    }
    else{
        //console.log(labelElement);
        if(labelElement.previousSibling!=null)
            return checkPreviousLabelNode(labelElement.previousSibling);
    }
}



function modalTDID(tdid,node){
    var dt,checkValue='';
    if(node.type=='text' || node.type=='email' || node.type=='number' || node.type=='tel' || node.type=='url'){
        checkValue=node.value;
    }else if(node.type=='date'){
        dt=node.value.split('-');
        checkValue=dt[2]+'-'+dt[1]+'-'+dt[0];   
    }
    else if(node.type=='select-one'){
        checkValue=node.options[node.selectedIndex].text;
    }
    else if(node.type=='radio'){
        if(node.checked){
            var lb=checkPreviousLabelNode(node);
            //alert(node.name+'_td');
            if(lb instanceof HTMLLabelElement)
                checkValue=lb.innerHTML;
            tdid=node.name+'_td';
        }
    }
    else{
        checkValue=node.type;
        //alert(node.id+' '+checkValue);
    }
    if(!document.getElementById(tdid))
        return false;
    else
        document.getElementById(tdid).innerHTML=checkValue;
}
		

		function popup(){
    //alert('Click Submit');
    swal({
        title: "Are you sure?",
        text: "You Have Validated The Form",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, Save!",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }, function(isConfirm){
    if (isConfirm) 
        document.getElementById('emis_staff_reg_form').submit();
    else
        swal("Cancelled", "Your cancelled the staff profile", "error");
    });	
}
		
		
			function setmindoj(currentnode,setnode,year,id,alertid) {
				var text = document.getElementById(id);
					var alt = document.getElementById(alertid);
					if(text.value==''){
						alt.innerHTML="This field is required";
					}else {
						alt.innerHTML="";
					}
				var dob = new Date(currentnode.value);
				var dobsp = currentnode.value.split('-');
				var doj = (dob.getFullYear()+ year)+'-'+dobsp[1]+'-'+dobsp[2];
				document.getElementById(setnode).disabled=false;
				document.getElementById(setnode).setAttribute('min',doj);
			}
            
  function setRequiredField(baseValue,enableids,whichValue){
    //alert(baseValue+'  '+enableids+'  '+whichValue);
    var wValue=whichValue.split(",");
    var ids=enableids.split(",");
    var i,id,checkbit=0;
    for(i in wValue){
        //alert(wValue[i]);
        if(baseValue==wValue[i]){
            //alert(Array.isArray(ids));
            for(id in ids){
                document.getElementById(ids[id]).setAttribute('required','required');
            }
            checkbit=1;
        }
    }
    
    if(checkbit==0 && wValue[0]!=0){
        //alert('remove');
        for(id in ids){
            document.getElementById(ids[id]).removeAttribute('required');
        }
    }
}


function aadharcheck(node) {
    var check=node.value;
      $.ajax({
            type:"POST",
            url:baseurl+'Udise_staff/checkaadhar',
            data:"&aadhar="+node.value,
            success: function(resp) {
              check = JSON.parse(resp);
              //alert(check.length);
              if(check!=null){
                alert('Aadhar linked to -'+check[0]['teacher_code']+'---'+check[0]['teacher_name']);
                node.value='';
                node.focus();
                return false;
              }
            },
            error: function(e) {
                alert('Error: ' + e.responseText);
                return false;
            }
      });

               
}
function ifsccode() {
  var ifsc=$("#ifsc_code").val();
  var length=ifsc.toString().length;
 //alert(length);
 if(ifsc !=0 && length>=10){
	// alert('correct');
    $.ajax(
    {
        type: "POST",
        url:baseurl+'Udise_staff/get_bank_details',
        data:{'ifsc':ifsc},
        success: function(resp){
      
	var bankdetails=JSON.parse(resp);
	console.log(bankdetails)
		if(bankdetails.length > 0)
		{
		
		var branch=bankdetails[0].branch;
		var bankname=bankdetails[0].bank_name;
		var id=bankdetails[0].id;
	    $('#branch').val(branch);
        $("#bankname").val(bankname);
		 $("#bankid").val(id);
		
         }
		 else
		 {
			 alert('please enter valid ifscode');
			  $('#ifsc_code').val('');
			    $('#branch').val('');
               $("#bankname").val('');
			    $("#bankid").val('');
		 }
        },  
    })
    }
}





			
			/*function popup(){
				//alert('Click Submit');
				swal({
					title: "Are you sure?",
					text: createJSON('emis_staff_reg_form',1),
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Yes, Save!",
					closeOnConfirm: false,
					showLoaderOnConfirm: true
				}, function(isConfirm){
					if (isConfirm) 
						teachersubmit();
					else
						 swal("Cancelled", "Your cancelled the staff profile", "error");
				
				});	
				
			}
			function isJson(restext){
    if(restext!=""){
        try{
            if(JSON.parse(restext)){
                return true;
            }    
        }
        catch(e){
            return false;
        }
    }
    else{
        return false;
    }
}
			
			function teachersubmit(){

            $.ajax({
				type: "POST",
				url:'<?php echo base_url().'Udise_staff/staffinfogetting1';?>',
				data:createJSON('emis_staff_reg_form',2),
				success:function(resp){ 
					//alert(resp);
				if(isJson(resp)){	
					var js=JSON.parse(resp);
					
					swal({
                      title: "Saved!",
                      type: "success",
					  text: "Staff Name:"+js['teacher_name']+'\n Staff Code:'+js['teacher_code'],
                      showCancelButton: false,
                      confirmButtonClass: "btn-success",
                      confirmButtonText: "OK",
                      closeOnConfirm: true,
                      },
                      function(isConfirm) {
                      if (isConfirm) {
                        window.location.href = '<?php echo base_url().'Udise_staff/emis_school_staff4';?>'; 
                      } 
                      });
					
					
					
				}	
				else{
					swal("ERROR", "Cannot be saved the staff profile, Check the entry", "error");
					//alert(resp);
				}
				},
				error: function(e){ 
					alert('Error: ' + e.responseText);
					return false;  
				}
            });
			}
			


function createJSON(frmid,id){
    var frmstr=document.getElementById(frmid);
	var jsIndex=['Name','Aadhaar','DOB','Father Name','Mother Name','Spouse Name','Differently abled type','Staff Join','Staff Present Join','Staff Present School Join','GPF/CPS Number','Rank','Mobile Number','Door','Street','City','Pincode'];
    var z=0;
	var text=''; var data='';
    for(var i=0;i<frmstr.elements.length;i++){
		if(frmstr.elements[i].type=='text' || frmstr.elements[i].type=='date'){
		if(frmstr.elements[i].value==''|| frmstr.elements[i].value=='NA'){
			z++;
			continue;
		}else{
			text+=jsIndex[z]+':'+frmstr.elements[i].value+'\n';
		
			//alert(frmstr.elements[i].name+'='+frmstr.elements[i].value);
			
		}
		z++;
        }
		data+='&'+frmstr.elements[i].name+'='+frmstr.elements[i].value;
    }
	if(id==1)
		return text;
	else if(id==2)
		return data;
}*/
			
			
			
			
			
				
			
			
				

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