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
                                    <h1>Staff Information
                                       <small>Physical Facility and Equipment in schools</small>
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
                                             <a href="<?php echo base_url().'Design/emis_school_staff1';?>">
                                                <div class="col-md-4 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">1</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Staff</div>
                                                   <div class="mt-step-content font-grey-cascade">Step 1</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Design/emis_school_staff2';?>">
                                                <div class="col-md-4 bg-grey mt-step-col active">
                                                   <div class="mt-step-number bg-white font-grey">2</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Staff Registration</div>
                                                   <div class="mt-step-content font-grey-cascade">Step 2</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Design/emis_school_staff3';?>">
                                                <div class="col-md-4 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">3</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Staff</div>
                                                   <div class="mt-step-content font-grey-cascade">Step 3</div>
                                                </div>
                                             </a>
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
                                                   <!-- BEGIN FORM-->
                                                   <form class="form-horizontal" method="post" id="emis_staff_reg_form" name="emis_staff_reg_form"
                                                      action="<?php ?>">
                                                      <!-- <form class="form-horizontal" method="post" id="emis_stu_reg_form" name="emis_stu_reg_form"
                                                         > -->
                                                      <div class="form-body">
                                                         
                                                         <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Teacher Code (if available)</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="emis_reg_staff_teachercode" name="emis_reg_staff_teachercode" maxlength="30">
                                                                     <font style="color:#dd4b39;">
                                                                        <div id="emis_reg_staff_teachercode_alert"></div>
                                                                     </font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3"> Aadhar Number </label>
                                                                  <div class="col-md-9">
                                                                    <input type="text" class="form-control" id="emis_reg_stu_aadhaar" name="emis_reg_stu_aadhaar" placeholder="ஆதார் எண்" maxlength="12">
                                                             <!-- <font style="color:#dd4b39;"><div id="emis_reg_stu_aadhaar_alert"></div></font> -->

                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                         </div>
                                                     

                                                      <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Name of the teacher</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="" name="emis_reg_staff_name" maxlength="30">
                                                                     
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3"> Gender </label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" id="" name="emis_reg_staff_gender">
                                                                        <option value="" selected="selected">Select Gender</option>
                                                                        <option value="1">Male</option>
                                                                        <option value="2">Female</option>
                                                                        <option value="3">Transgender</option>
                                                                     </select>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                         </div>


                                                         <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Date of Birth</label>
                                                                  <div class="col-md-9">
                                                                     <div class="form-group">
                                                        
                                                        
                                                            <div class="col-md-4">
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="" name="emis_reg_staff_date" >
                                                                          <option value="" style="color:#bfbfbf;">Date</option>
                                                            <?php   $tempnumber = '';
                                                                       for($i=1;$i<32;$i++) { 
                                                                        $tempnumber = sprintf("%02s", $i);  ?>   
                                                                       
                                                                          <option value="<?php echo $tempnumber; ?>"><?php echo $tempnumber; ?></option>
                                                                       <?php }  ?> 
                                                            </select>
                                                            
                                                        </div>
                                                        <div class="col-md-4">
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="" name="emis_reg_staff_month">
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
                                                        </div>
                                                        <div class="col-md-4">
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="" name="emis_reg_staff_year">
                                                             <option value="" style="color:#bfbfbf;">Year</option>
                                                              <?php
                                                              $year=date('Y');
                                                              $min=$year-21;
                                                              $max=$year-3;
                                                              for($i=$min;$i<$max;$i++)
                                                              {?>
                                                              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                       
                                                    </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3"> Social Category </label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" name="emis_reg_staff_socialcategory">
                                                                        <option value="">Select Social Category</option>
                                                                        <option value="1">General</option>
                                                                        <option value="2">SC</option>
                                                                        <option value="3">ST</option>
                                                                        <option value="10">MBC</option>
                                                                        <option value="11">BC</option>
                                                                     </select>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                         </div>

                                                         <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Type of teacher</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" name ="emis_reg_staff_teachertype">
                                                                        <option value="">Select type of teacher</option>
                                                                        <option value="1">Head teacher</option>
                                                                        <option value="2">Acting head teacher</option>
                                                                        <option value="3">Teacher</option>
                                                                        <option value="5">Instructor positioned as per RTE</option>
                                                                        <option value="7">Principal</option>
                                                                        <option value="8">Lecturer</option>
                                                                     </select>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3"> Nature of appointment </label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" name="emis_reg_staff_appntmntnature">
                                                                        <option value="">Select Nature of appointment</option>
                                                                        <option value="1">Regular</option>
                                                                        <option value="2">Contract</option>
                                                                        <option value="3">Part-Time</option>
                                                                     </select>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                         </div>
                                                         <hr>

                                                         <label><h3>Highest Qualification</h3></label>

                                                         <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Academic</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" name="emis_reg_staff_qualificationacademic">
                                                                        <option value="">Select type of Academic qualification</option>
                                                                        <option value="1">Below Secondary</option>
                                                                        <option value="2">Secondary</option>
                                                                        <option value="3">Higher Secondary</option>
                                                                        <option value="4">Graduate</option>
                                                                        <option value="5">Post Graduate</option>
                                                                        <option value="6">M.Phil.</option>
                                                                        <option value="7">Ph.D.</option>
                                                                        <option value="8">Post-Doctoral</option>
                                                                     </select>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3"> Professional </label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" name="emis_reg_staff_qualificationprofessional">
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
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                         </div>


                                                        <hr>

                                                         <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Classes Taught</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" name="emis_reg_staff_classestaught">
                                                                        <option value="">Select type of Classes taught</option>
                                                                        <option value="1">Primary only</option>
                                                                        <option value="2">Upper primary only</option>
                                                                        <option value="3">Primary and Upper primary</option>
                                                                        <option value="5">Secondary only</option>
                                                                        <option value="6">Higher Secondary only</option>
                                                                        <option value="7">Upper primary and secondary</option>
                                                                        <option value="8">Secondary and Higher secondary</option>
                                                                     </select>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3"> Appointed for Subject </label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" name="emis_reg_staff_appntedforsubject" maxlength="6">
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                         </div>

                                                         <hr>

                                                         <label><h3>Main Subjects Taught</h3></label>
                                                         <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Subject 1</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" name="emis_reg_staff_mainsubjcttaughtsubj1">
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
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Subject 2</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" name="emis_reg_staff_mainsubjcttaughtsubj2">
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
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                         </div>


                                                         <hr>
                                                          <label><h3>Total days of inservice training received in last academic year</h3></label>

                                                         <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-offset-1"><h4>Only for teachers teaching in elementary</h4></label>
                                                                  <div class="col-md-9 col-md-offset-1">
                                                                     <div class="col-md-3">
                                                                     <label>BRC</label>
                                                                     <input type="text" name="emis_reg_staff_brc" class="form-control" maxlength="6">
                                                                  </div>
                                                                  <div class="col-md-3">
                                                                     <label>CRC</label>
                                                                     <input type="text" name="emis_reg_staff_crc" class="form-control" maxlength="6">
                                                                  </div>
                                                                  <div class="col-md-3">
                                                                     <label class="control-label">
                                                                        DIET
                                                                     </label>
                                                                     <input type="text" name="emis_reg_staff_diet" class="form-control" maxlength="6">
                                                                  </div>  
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                            <br><br><br>
                                                                <div class="form-group">
                                                                  <label class="control-label col-md-3">Others</label>
                                                                  <div class="col-md-9">
                                                                    <input type="text" class="form-control" name="emis_reg_staff_subjectother" maxlength="6">
                                                                  </div>
                                                               </div>

                                                            </div>
                                                            <!--/span-->
                                                         </div>

                                                         <hr>

                                                         <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Training need</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" name="emis_reg_staff_trainingneed">
                                                                        <option value="">Select training need</option>
                                                                        <option value="1">Subject knowledge</option>
                                                                        <option value="2">Pedagogical Issues</option>
                                                                        <option value="3">ICT Shills</option>
                                                                        <option value="4">Knowledge and skills to engage with CWSN</option>
                                                                        <option value="5">Leadership and management</option>
                                                                        
                                                                     </select>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">No. of working days spent on non-teaching assignments</label>
                                                                  <div class="col-md-9">
                                                                    <input type="text" class="form-control" name="emis_reg_staff_noofworkingdaysspntonNTassignment" maxlength="6">
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                         </div>

                                                         <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Maths/Science studied up to</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" name="emis_reg_staff_mathsorsciencestdiedupto">
                                                                        <option value="">Select type of qualification</option>
                                                                        <option value="1">Below Secondary</option>
                                                                        <option value="2">Secondary</option>
                                                                        <option value="3">Higher Secondary</option>
                                                                        <option value="4">Graduate</option>
                                                                        <option value="5">Post Graduate</option>
                                                                        <option value="6">M.Phil.</option>
                                                                        <option value="7">Ph.D.</option>
                                                                        <option value="8">Post-Doctoral</option>
                                                                     </select>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">English/Language <br>(as per schedule VIII) studied up to</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" name="emis_reg_staff_englishorlanguagestdiedupto">
                                                                        <option value="">Select type of qualification</option>
                                                                        <option value="1">Below Secondary</option>
                                                                        <option value="2">Secondary</option>
                                                                        <option value="3">Higher Secondary</option>
                                                                        <option value="4">Graduate</option>
                                                                        <option value="5">Post Graduate</option>
                                                                        <option value="6">M.Phil.</option>
                                                                        <option value="7">Ph.D.</option>
                                                                        <option value="8">Post-Doctoral</option>
                                                                     </select>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                         </div>


                                                         <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Social studies studied up to</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" name="emis_reg_staff_socialstdiedupto">
                                                                        <option value="">Select type of qualification</option>
                                                                        <option value="1">Below Secondary</option>
                                                                        <option value="2">Secondary</option>
                                                                        <option value="3">Higher Secondary</option>
                                                                        <option value="4">Graduate</option>
                                                                        <option value="5">Post Graduate</option>
                                                                        <option value="6">M.Phil.</option>
                                                                        <option value="7">Ph.D.</option>
                                                                        <option value="8">Post-Doctoral</option>
                                                                     </select>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Working in present school since(year)</label>
                                                                  <div class="col-md-9">
                                                                    <input type="text" class="form-control" name="emis_reg_staff_workingpresentschoolsinceyear" id="emis_reg_staff_workingpresentschoolsinceyear" maxlength="60">
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                         </div>


                                                         <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Type of Disability, If any</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" name="emis_reg_staff_typeofdisability">
                                                                        <option value="">Select type of disability</option>
                                                                        <option value="1">Not applicable</option>
                                                                        <option value="2">Loco motor</option>
                                                                        <option value="3">Visual</option>
                                                                        <option value="4">Others</option>
                                                                     </select>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Trained for teaching CWSN</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" name="emis_reg_staff_trainedforteachingcwsn">
                                                                        <option value="">Select Option</option>
                                                                        <option value="1">Yes</option>
                                                                        <option value="2">No</option>
                                                                     </select>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                         </div>

                                                      </div>
                                                          <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Trained in use of computer and teaching through Computer</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" name="emis_reg_staff_trainedinuseofcomputerandteachingthroughcomputer">
                                                                        <option value="">Select Option</option>
                                                                        <option value="1">Yes</option>
                                                                        <option value="2">No</option>
                                                                     </select>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Mobile Number</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" placeholder="Enter your Mobile number" name="emis_reg_staff_contact" maxlength="10">
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                         </div>
                                                      </div>


                                                      
                                                          <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">E-Mail Id</label>
                                                                  <div class="col-md-9"> 
                                                                     <input type="email" placeholder="Enter your email" class="form-control" name="emis_reg_staff_email" maxlength="60">
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                           
                                                         </div>

                                                      
                                                      </div>
                                                </div>
                                                <hr>
                                                <div class="form-actions">
                                                <div class="row">
                                                <div class="col-md-12">
                                                <div class="row">
                                                <div class="col-md-offset-5">
                                                <input type="submit" class="btn green" value="submit">
                                                <button type="button" class="btn default">Cancel</button>
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
                <!-- <div class="form-errors"></div> -->
            </form>
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
            <!-- Js for hide and show the tables and datas ending-->
            <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js";></script>

             <script src="<?php echo base_url().'asset/global/plugins/emis2.js'?>"; type="text/javascript"></script>
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