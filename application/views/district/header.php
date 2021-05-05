<div class="page-wrapper-row">
                <div class="page-wrapper-top">
                    <!-- BEGIN HEADER -->
                    <div class="page-header">
                        <!-- BEGIN HEADER TOP -->
                        <div class="page-header-top">
                            <div class="container">
                                <!-- BEGIN LOGO -->
                                <div class="page-logo" style="min-width:50%;font-size: 18px;">
                                    <a href="<?php echo base_url().'District/emis_district_dash';?>">
                                        <img src="<?php echo base_url().'asset/pages/img/emis_logo.png';?>"  style="height: 100%;margin:0px;"  alt="logo" class="logo-default">
                                    </a>
                                </div>
                                 <div class="page-logo" style="min-width:32%;font-size: 26px; padding:14px; ">
                                  <h6 style="font-size: 19px; color: #a90dc5; text-align:right;">DISTRICT,<?php        $dist_id = $this->session->userdata('emis_district_id');
                                      $district_details = $this->Homemodel->get_district_Name($dist_id);
                                     echo $district_details->district_name;?></h6>
                                </div>
                                <!-- END LOGO -->
                                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                                <a href="javascript:;" class="menu-toggler"></a>
                                <!-- END RESPONSIVE MENU TOGGLER -->
                                <!-- BEGIN TOP NAVIGATION MENU -->
                                <div class="top-menu">
                                    <ul class="nav navbar-nav pull-right">
                                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                                        <!-- DOC: Apply "dropdown-hoverable" class after "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                                        <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                        
                                        <!-- END NOTIFICATION DROPDOWN -->
                                        <!-- BEGIN TODO DROPDOWN -->
                       
                                        <!-- END TODO DROPDOWN -->
                                        <li class="droddown dropdown-separator">
                                            <span class="separator"></span>
                                        </li>
                                        <!-- BEGIN INBOX DROPDOWN -->
                                        <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
                                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                <span class="circle">0</span>
                                                <span class="corner"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class="external">
                                                    <h3>You have
                                                        <strong>0 New</strong> Messages</h3>
                                                    <a >view all</a>
                                                </li>
<!--                                                 <li>
                                                    <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                                        <li>
                                                            <a href="#">
                                                                <span class="photo">
                                                                    <img src="../asset/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                                                <span class="subject">
                                                                    <span class="from"> Lisa Wong </span>
                                                                    <span class="time">Just Now </span>
                                                                </span>
                                                                <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <span class="photo">
                                                                    <img src="../asset/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                                                <span class="subject">
                                                                    <span class="from"> Richard Doe </span>
                                                                    <span class="time">16 mins </span>
                                                                </span>
                                                                <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <span class="photo">
                                                                    <img src="../asset/layouts/layout3/img/avatar1.jpg" class="img-circle" alt=""> </span>
                                                                <span class="subject">
                                                                    <span class="from"> Bob Nilson </span>
                                                                    <span class="time">2 hrs </span>
                                                                </span>
                                                                <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <span class="photo">
                                                                    <img src="../asset/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                                                <span class="subject">
                                                                    <span class="from"> Lisa Wong </span>
                                                                    <span class="time">40 mins </span>
                                                                </span>
                                                                <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <span class="photo">
                                                                    <img src="../asset/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                                                <span class="subject">
                                                                    <span class="from"> Richard Doe </span>
                                                                    <span class="time">46 mins </span>
                                                                </span>
                                                                <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li> -->
                                            </ul>
                                        </li>

                                         <?php $user_id="";
                          $user_type_id=$this->session->userdata('emis_user_type_id');
                          $emis_username=$this->session->userdata('emis_username'); 
                         ?>
                                        <!-- END INBOX DROPDOWN -->
                                        <!-- BEGIN USER LOGIN DROPDOWN -->
                                        <li class="dropdown dropdown-user dropdown-dark">
                                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                <i class="fa fa-user"></i>
                                                <span class="username username-hide-mobile"><?php echo $emis_username; ?></span>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-default">
                                                <li>
                                                    <a href="<?php echo base_url().'District/emis_District_home';?>">
                                                        <i class="icon-user"></i> My Profile </a>
                                                </li>
                                                <!-- <li>
                                                    <a href="app_calendar.html">
                                                        <i class="icon-calendar"></i> My Calendar </a>
                                                </li> -->
                                                <li>
                                                    <a >
                                                        <i class="icon-envelope-open"></i> My Inbox
                                                        <span class="badge badge-danger"> 0 </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a >
                                                        <i class="icon-rocket"></i> My Tasks
                                                        <span class="badge badge-success"> 0 </span>
                                                    </a>
                                                </li>
                                                <li class="divider"> </li>
                                               <!--  <li>
                                                    <a href="page_user_lock_1.html">
                                                        <i class="icon-lock"></i> Lock Screen </a>
                                                </li> -->
                                                <?php if($user_type_id==3){ ?>
                                                 <li>
                                                    <a href="<?php echo base_url().'District/emis_District_resetpassword';?>">
                                                        <i class="icon-lock"></i> Reset Password </a>
                                                </li>
                                                 <?php  } ?>
                                                <li>
                                                    <a href="<?php echo base_url().'Authentication/logout';?>">
                                                        <i class="icon-key"></i> Log Out </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- END USER LOGIN DROPDOWN -->
                             
                                    </ul>
                                </div>
                                <!-- END TOP NAVIGATION MENU -->
                            </div>
                        </div>
                        <!-- END HEADER TOP -->
                        <!-- BEGIN HEADER MENU -->
                        <div class="page-header-menu">
                            <div class="container">
     
                                <!-- BEGIN MEGA MENU -->
                                <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
                                <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
                                <div class="hor-menu  ">
                                    <ul class="nav navbar-nav">
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="<?php echo base_url().'District/emis_District_dash';?>"> 
                                            <i class="fa fa-dashboard"></i> Dashboard
                                                <span class="arrow"></span>
                                            </a>
                                        </li>


                                        <!----------------Students------------------>

                                        <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown ">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-user"></i> Students
                                                <span class="arrow"></span>
                                            </a>
                                              <ul class="dropdown-menu pull-left">

                                                <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown  mega-menu-full">
                                            <a href="<?php echo base_url().'District/get_students_raise_request';?>"> 
                                             Pending Students Request
                                                <span class="arrow"></span>
                                            </a>
                                          
                                        </li>
                                        <li aria-haspopup="true" class=" ">
                                                   <a href="<?php echo base_url().'District/get_block_migration';?>" class="nav-link  ">  Students in Common Pool</a>
                                                </li>
                                                  <li aria-haspopup="true" class=" ">
                                                     <a href=" <?php echo base_url().'District/get_district_migration_details';?>" class="nav-link">Student Migration Report</a>
                                                </li>
												<li aria-haspopup="true" class=" ">
                                                     <a href=" <?php echo base_url().'District/aadhar_school_distic_based_count_details';?>" class="nav-link">Aadhar Enrollment Report   </a>
                                                </li>
												
												<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/meal_school_distic_based_count_details';?>" class="nav-link  ">Noonmeal Student Report                                                </a>
                                                </li>
                                                 <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/get_OSC_List';?>" class="nav-link  ">Out of school Children                                      </a>
                                                </li>
                                                  <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/emis_student_disablity_list';?>" class="nav-link  ">CWSN-Student Report
                                                    </a>
                                                </li>
                                                <li aria-haspopup="true" class=" ">
                                                     <a href=" <?php echo base_url().'District/dge_2017_18_report_blk';?>" class="nav-link">Past XII Student Status</a>
                                                </li>
                                         <li aria-haspopup="true" class="dropdown-submenu">
                                                    <a  class="nav-link  ">
                                                     SLAS Report-2019
                                                    </a>
                                                     <ul class="dropdown-menu">

                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'District/slas_report_blk';?>" class="nav-link">Student-Wise</a>
                                                        </li>
                                                         <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'District/slas_report_schl_blk';?>" class="nav-link">School-Wise</a>
                                                        </li>
                                                         
                                                                                            
                                                     </ul>
                                                    
                                                 </li>
                                                      <li aria-haspopup="true" class="dropdown-submenu">
                                                    <a  class="nav-link  ">
                                                     Academic Report
                                                    </a>
                                                     <ul class="dropdown-menu">

                                                
                                                         <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'State/student_co_scholastic_1_8_blk';?>" class="nav-link">1-8 Co-Scholastic Monitoring</a>
                                                        </li>
                                                         
                                                                                            
                                                     </ul>
                                                    
                                                 </li>
                                               <!--  <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/schoolcatemanagefil';?>">
                                                 Special Reports
                                                <span class="arrow"></span>
                                            </a>
                                                </li>
                                                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="<?php echo base_url().'District/get_renewal_district_block';?>" class="nav-link  ">
                                                        Renewal Status Reports
                                                    </a>
                                        </li> -->
                                            </ul>
                                        </li>

                                        <!-------------------Teacher----------------->

                                    <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown ">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-users"></i> Staff Details
                                                <span class="arrow"></span>
                                            </a>
                                              <ul class="dropdown-menu pull-left">
                                              <!-- <li aria-haspopup="true" class=" ">
                                                    <a href="https://forms.gle/fsbQ7B4breXiHsW9A" class="nav-link" target="_blank">
                                                        IFHRMS
                                                    </a>
                                                </li> -->
                                                <!-- <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/schoolcatemanagefil';?>">
                                                 Special Reports
                                                <span class="arrow"></span>
                                            </a>
                                                </li>
                                                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="<?php echo base_url().'District/get_renewal_district_block';?>" class="nav-link  ">
                                                        Renewal Status Reports
                                                    </a>
                                        </li> -->
                                        <!-- <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="<?php echo base_url().'District/emis_tech_transfer';?>">
                                                 Teacher Transfer
                                                <span class="arrow"></span>
                                            </a>
                                          
                                        </li> -->
											<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/emis_staff_district_school_count_details';?>" class="nav-link  ">
                                                        Staffs Details
                                                    </a>
                                                </li>
												<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/emis_staff_stud_dist_school_details';?>" class="nav-link  ">
                                                         Students Teachers Ratio
                                                    </a>
                                                </li>
                                                   <li aria-haspopup="true" class="dropdown-submenu">
                                                
                                                        <a href="#" class="nav-link  ">DEE Fixation Report</a>
                                                     
                                                       <ul class="dropdown-menu">
                                                         <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/emis_staff_fixa_tot_school_details';?>" class="nav-link  ">
                                                         DEE Staff Fixation Summary
                                                    </a>
                                                </li>
                                                     
                                               <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/emis_staff_fixa_report_block';?>" class="nav-link  ">
                                                         DEE Fixation Blockwise
                                                    </a>
                                                </li>
                                                 <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/staff_fixtation_sub_wise';?>" class="nav-link  ">
                                                         DEE Fixation Subjectwise
                                                    </a>
                                                </li>
                                                 <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/emis_staff_transfer_req_block';?>" class="nav-link  ">
                                                         DEE Transfer Request
                                                    </a>
                                                </li>

                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/get_staff_fix_district';?>" class="nav-link  ">
                                                         DEE Staff Fixation Monitoring
                                                    </a>
                                                </li>
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/emis_staff_surplus_tot_subject';?>" class="nav-link  ">
                                                        DEE Surplus Staff Details
                                                    </a>
                                                </li>
												<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/emis_total_surplus_teacher_dee';?>" class="nav-link  ">
                                                        DEE-Teacher SurPlus
                                                    </a>
                                                 </li>
                                                
                                              
                                                      
                                                     </ul>
                                             </li>
                                               <li aria-haspopup="true" class="dropdown-submenu">
                                                
                                                        <a href="#" class="nav-link  ">DSE Fixation Report</a>
                                                     
                                                     <ul class="dropdown-menu">
                                                       <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/emis_PG_fixation';?>" class="nav-link  ">
                                                         DSE-PG Fixation Subjectwise
                                                    </a>
                                                </li>
                                              
                                               <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/emis_staff_fixa_report_PG_block';?>" class="nav-link  ">
                                                         DSE Fixation Blockwise
                                                    </a>
                                                </li>
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/emis_staff_transfer_dse_req_block';?>" class="nav-link  ">
                                                         DSE Transfer Request
                                                    </a>
                                                </li>
                                                 <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/get_staff_fix_district_dse';?>" class="nav-link  ">
                                                         DSE Staff Fixation Monitoring
                                                    </a>
                                                </li>
                                               <!--  <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/emis_dsestaff_surplus_tot_subject';?>" class="nav-link  ">
                                                        DSE Surplus Staff Details
                                                    </a>
                                                </li>-->
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/emis_total_surplus_teacher';?>" class="nav-link  ">
                                                        DSE-Teacher SurPlus
                                                    </a>
                                                </li>      
                                                     </ul>
                                             </li>
                                              <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/teacher_child_studyingstatus_district';?>" class="nav-link  ">Teacher's Child List
                                                    </a>
                                             </li>
                                             <li aria-haspopup="true" class="dropdown-submenu">                                                
                                                    <a href="#" class="nav-link  ">PINDICS Monitoring</a>                                                     
                                                    <ul class="dropdown-menu">
                                                        <li aria-haspopup="true" class=" ">
                                                            <a href="<?php echo base_url().'District/pindics_teacher_status_reset';?>" class="nav-link  ">
                                                                Teacher's Status reset
                                                            </a>
                                                        </li>  
                                                    </ul>
                                                </li>    

                                            </ul>
                                        </li>

                                        <!-----------------------School-------------->

                                        <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown ">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-building"></i> School
                                                <span class="arrow"></span>
                                            </a>
                                              <ul class="dropdown-menu pull-left">
                                              <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown ">
                                            <a href="<?php echo base_url().'District/emis_district_slelectschool';?>"> 
                                             Search school
                                                <span class="arrow"></span>
                                            </a>
                                           
                                        </li>
                                           
                                        <li aria-haspopup="true" class="dropdown-submenu">
                                                
                                                        <a href="#" class="nav-link  ">Renewal Details</a>
                                                     
                                                       <ul class="dropdown-menu">
                                                     
                                                      <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="<?php echo base_url().'District/get_renewal_district_block';?>" class="nav-link  ">
                                                        Private School Verification
                                                    </a>
                                        </li>
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/emis_school_unrecognized_block';?>" class="nav-link  ">Unrecognized School List
                                                    </a>
                                                </li>
                                                      
                                                     </ul>
                                             </li>
                                         
                                             <li aria-haspopup="true" class="dropdown-submenu">
                                                
                                                        <a href="#" class="nav-link  ">School Profile Verification</a>
                                                     
                                                       <ul class="dropdown-menu">
                                                     
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'District/school_profile_verification_district';?>" class="nav-link">Academic Details</a>
                                                        </li>
                                                          <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'District/school_land_verification_district';?>" class="nav-link">Land Details</a>
                                                        </li>
                                                         <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'District/school_sanitation_verification_district';?>" class="nav-link">WASH Details</a>
                                                        </li>
                                                         <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'District/school_committee_verification_district';?>" class="nav-link">Committee Details</a>
                                                        </li>
														 <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'District/get_emis_state_school_building_school';?>" class="nav-link">Building Details</a>
                                                        </li>
                                                      
                                                     </ul>
                                             </li>
                                             <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown">
                                                
                                                <a href="<?php echo base_url().'District/get_emis_resend_password';?>" class="nav-link">Resend Password</a>
                                                     
                                                       
                                             </li>
                                        
                                                <!-- <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/schoolcatemanagefil';?>">
                                                 Special Reports
                                                <span class="arrow"></span>
                                            </a>
                                                </li>
                                                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="<?php echo base_url().'District/get_renewal_district_block';?>" class="nav-link  ">
                                                        Renewal Status Reports
                                                    </a>
                                        </li> -->
                                            </ul>
                                        </li>
                                        <!----------------------------Report---------->


                                        <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown ">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-file"></i> Reports
                                                <span class="arrow"></span>
                                            </a>
                                              <ul class="dropdown-menu pull-left">
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/schoolcatemanagefil';?>">
                                                 Special Reports
                                                <span class="arrow"></span>
                                            </a>
                                                </li>
												 <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/emis_staff_fixa_tot_school_details';?>" class="nav-link  ">
                                                         Staffs Fixation
                                                    </a>
                                                </li>
												 <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/profile_status_blockwise';?>" class="nav-link  ">
                                                         UDISE+ 19-20 Monitoring Reports
                                                    </a>
                                                </li>
                                             
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="<?php echo base_url().'District/get_attendance_blockwise_details';?>" class="nav-link  ">
                                                        Attendance Reports
                                                    </a>
                                   
                                        <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/emis_student_disability_blockwise';?>" class="nav-link  ">CWSN-Student Report
                                                    </a>
                                                </li>
                                                  <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/get_RTE_district';?>" class="nav-link  ">RTE-Student Report
                                                    </a>
                                                </li>
                                                 <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/schoolwise_class_timetable_report_blk';?>">
                                                 Timetable Report
                                                <span class="arrow"></span>
                                            </a>
                                                </li>
                                                  <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/emis_district_student_report_2018';?>" class="nav-link  ">Admissions In 2018-19                                                    </a>
                                                </li>
                                                
                                                <li aria-haspopup="true" class="dropdown-submenu">
                                                    <a href="<?php echo base_url().'state/schemeedureport/';?>" class="nav-link  ">
                                                     Scheme Reports
                                                    </a>
                                                     <ul class="dropdown-menu">
                                                     
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/calldashboard/0/0/1';?>" class="nav-link">Category Indent</a>
                                                        </li>
                                                        
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/dee_providing_list/0/0/0/0';?>" class="nav-link">DEE Distribution</a>
                                                        </li>

                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/dse_providing_list/0/0/0/0';?>" class="nav-link">DSE Distribution</a>
                                                        </li>
                                                        
                                                        <!-- <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/calldashboard/0/0/1/1';?>" class="nav-link">Category Distribution</a>
                                                        </li> -->
                                                     </ul>
                                                    
                                         </li>
                                            </ul>
                                             
                                            
                                        </li>
                                      <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-globe"></i> TNTP
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu pull-left">
                                                <!--<li aria-haspopup="true" class=" ">
                                                    <a href="https://tntp.tnschools.gov.in" target="_blank"> 
                                                     TNTP
                                                        
                                                    </a>
                                                </li>-->
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/callteachercountreport/0/0';?>"> 
                                                     Users Report
                                                    </a>
                                                </li>
                                            </ul>
                                          </li>
                                          
                                          <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown ">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-file"></i>Monitoring Reports
                                                <span class="arrow"></span>
                                            </a>
                                              <ul class="dropdown-menu pull-left">
                                             
                                             
                                      
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="<?php echo base_url().'District/get_edu_district_strick_report';?>" class="nav-link  ">
                                                        Strike Reports
                                                    </a>
                                        </li>
                                     
                                                
                                             <!--    <li aria-haspopup="true" class=" ">
                                                     <a href="<?php echo base_url().'District/get_district_migration_details';?>" class="nav-link">Student Migration Report</a>
                                                </li>-->
                                     
                                            </ul>
                                        </li>
 <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown ">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-internet-explorer"></i> Online Services
                                                <span class="arrow"></span>
                                            </a>
                                              <ul class="dropdown-menu pull-left">
                                                 <li aria-haspopup="true" class="">
                                            <a href="https://tngis.tn.gov.in/" target="_blank"> 
                                            <i class=""></i> GIS mapping
                                                <span class="arrow"></span>
                                            </a>
                                           
                                         </li>
                                           <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_gis_video';?>"> 
                                                     GIS Helping Video
                                                    </a>
                                                </li>
                                                   <li aria-haspopup="true" class=" ">
                                                    <a href="https://drive.google.com/file/d/1jyXbAfHJYZmd5Qklug2B67bMZ5FKDd4j/view"> GIS  User Guide </a>
                                                </li>
                                               <!--  <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Ceo_District/schoolcatemanagefil';?>">
                                                 Special Reports
                                                <span class="arrow"></span>
                                            </a>
                                                </li>
                                                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="<?php echo base_url().'Ceo_District/get_renewal_district_block';?>" class="nav-link  ">
                                                        Renewal Status Reports
                                                    </a>
                                        </li> -->

                                        <!-- <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown  mega-menu-full">
                                            <a href="<?php echo base_url().'Ceo_District/emis_district_request_schoollist';?>" target="_blank"> 
                                             Pending
                                                <span class="arrow"></span>
                                            </a>
                                          
                                        </li> -->

                                        
                                     <!--    <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="<?php echo base_url().'AllApprove/CheckForSubmission/1/0';?>">
                                                 Renewal Status
                                                <span class="arrow"></span>
                                            </a>
                                        </li>-->
                                        <!--<li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="<?php echo base_url().'AllApprove/allApproveStatus/4/-1';?>">
                                                 New School Status
                                                <span class="arrow"></span>
                                            </a>
                                        </li>-->
                                        
                                      <!--  <li aria-haspopup="true" class="dropdown-submenu">
                                                
                                            <a href="#" class="nav-link  ">Order Copy</a>
                                                     
                                               <ul class="dropdown-menu">
                                                     <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Newschool/Ordercopy/1/'.$this->session->userdata('emis_district_id');?>" class="nav-link">Renewal Copy</a>
                                                     </li>
                                                     <!--<li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Newschool/Ordercopy/4';?>" class="nav-link">New School Copy</a>
                                                     </li>--> 
                                              <!-- </ul>
                                         </li> -->
                                        <!-- <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="<?php echo base_url().'Newschool/newschoolreport/1/'.$this->session->userdata('emis_district_id').'/0';?>">
                                                 New School Report
                                                <span class="arrow"></span>
                                            </a>
                                        </li>--> 
                                        
                                    </ul>
                                        <?php if($user_type_id==1){ ?>
                                        <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-building"></i> School
                                                <span class="arrow"></span>
                                            </a>
                                              <ul class="dropdown-menu pull-left">
                                              <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Home/emis_school_profile';?>" class="nav-link  ">
                                                        School - Profile
                                                    </a>
                                                </li>
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Basic/emis_school_basic1';?>" class="nav-link  ">
                                                        Basic Information
                                                    </a>
                                                </li>
                            
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Section/emis_school_noofsections';?>" class="nav-link  ">
                                                        Class-wise No. of Sections Available in the School
                                                    </a>
                                                </li>
                                                <?php if($is_high_class==1){ ?>
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Schoolgroups/emis_school_groupfunctioning';?>" class="nav-link  ">
                                                        Groups Functioning in the School
                                                    </a>
                                                </li><?php  } ?>
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_school_admin1';?>" class="nav-link  ">
                                                        Administrative Information
                                                    </a>
                                                </li>

                                            </ul>
                                        </li>
                                       <?php  } ?>
                                     <!-- <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown ">
                                            <a href="<?php echo base_url().'District/emis_district_slelectschool';?>"> 
                                            <i class="fa fa-search"></i> Search school
                                                <span class="arrow"></span>
                                            </a>
                                           
                                        </li> -->
                                        
                                        
                                         
                                        
                                        
                                        
                                        <!-- <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="<?php echo base_url().'District/get_edu_district_strick_report';?>">
                                                <i class="fa fa-arrow-right"></i> Strike Report
                                                <span class="arrow"></span>
                                            </a>
                                          
                                        </li>
                                       
                                        
                                        <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown">
                                           										
											<a href="javascript:;"> 
                                            <i class="fa fa-wechat"></i> Help
                                                <span class="arrow"></span>
                                            </a>
											
											
										  <ul class="dropdown-menu pull-left">
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="https://bit.ly/2HKTrk6" class="nav-link" target="_blank">
                                                       Strike Report Guidelines
                                                     </a>
                                                </li>
                                                
                                           </ul>
                                        
                                        </li>
                                        
                                        </li> -->
                                  <?php 
                                  // echo $this->session->userdata('emis_school_id');
                                     $schoolselect =  $this->session->userdata('emis_school_id');
                                    if($schoolselect!=''){
                                     $this->load->model('District_model');
                                     $district_id = $this->session->userdata('emis_district_id');
                                     $schoolprofile=$this->District_model->get_school_by_id($schoolselect,$district_id);
                                     }
                                         if($schoolselect!=""){ ?>
                                         
                                         <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-building"></i> Selected School
                                                <span class="arrow"></span>
                                            </a>
                                              <ul class="dropdown-menu pull-left">
                                              <li aria-haspopup="true" class=" ">
                                              <a href="<?php echo base_url().'Home/emis_school_home';?>" class="nav-link">
                                                       <?php echo $schoolprofile[0]->school_name; ?>
                                                       </a>
                                                </li>
                                               <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Home/emis_school_profile';?>" class="nav-link  ">
                                                        School - Profile
                                                    </a>
                                                </li>
                                              <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'District/emis_Districtchange_school';?>" class="nav-link">
                                                        Change / Remove School
                                                    </a>
                                                </li>
                                              </ul>
                                         </li>
                                         <?php } ?>
                                    </ul>
                                </div>
                                 <!--  <div id="google_translate_element" class="pull-right" style="margin-top: 10px;"></div> -->
                                <!-- END MEGA MENU -->
                            </div>
                        </div>
                        <!-- END HEADER MENU -->
                    </div>
                    <!-- END HEADER -->
                </div>
            </div>