<div class="page-wrapper-row">
                <div class="page-wrapper-top">
                    <!-- BEGIN HEADER -->
                    <div class="page-header">
                        <!-- BEGIN HEADER TOP -->
                        <div class="page-header-top">
                            <div class="container">
                                <!-- BEGIN LOGO -->
                                <div class="page-logo" style="min-width:50%;font-size: 18px;">
                                   <a href="<?php echo base_url().'Collector/emis_Collector_dash';?>">
                                        <img src="<?php echo base_url().'asset/pages/img/emis_logo.png';?>"  style="height: 100%;margin:0px;"  alt="logo" class="logo-default">
                                    </a>
                                </div>
                                 <div class="page-logo" style="min-width:32%;font-size: 26px; padding:14px;">
                                  <h6 style="font-size: 19px; color: #a90dc5; text-align:right;">COLLECTOR,<?php  $dist_id = $this->session->userdata('emis_district_id');   $district_details = $this->Homemodel->get_districtName($dist_id); echo $district_details->district_name; ?></h6>
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
                                                    <a href="<?php echo base_url().'Collector/emis_Collector_home';?>">
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
                                                <?php if($user_type_id==9){ ?>
                                                 <li>
                                                    <a href="<?php echo base_url().'Collector/emis_ceo_resetpassword';?>">
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
                                            <a href="<?php echo base_url().'Collector/emis_Collector_dash';?>"> 
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
                                                <!--  <li aria-haspopup="true" class=" ">
                                                   <a href="<?php echo base_url().'Collector/get_block_migration';?>" class="nav-link  ">  Students in Common Pool</a>
                                          </li>
                                           <li aria-haspopup="true" class=" ">
                                                     <a href=" <?php echo base_url().'Collector/get_district_migration_details';?>" class="nav-link">Student Migration Report</a>
                                                </li>
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Collector/schoolwise_special_cash';?>" class="nav-link ">Special Cash Incentive Report                                                  </a>
                                                </li>
                                                 <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Collector/stud_community_report';?>" class="nav-link ">Student Community Report                                                  </a>
                                                </li>-->
												<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Collector/aadhar_school_distic_based_count_details';?>" class="nav-link ">Aadhar Enrollment Report                                                    </a>
                                                </li>
												
												<!--<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Collector/meal_school_distic_based_count_details';?>" class="nav-link  ">Noonmeal Student Report                                                </a>
                                                </li>-->
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Collector/get_OSC_List';?>" class="nav-link  ">Out of school Children                                      </a>
                                                </li>
                                                   <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Collector/emis_student_disablity_list';?>" class="nav-link  ">CWSN-Student Report
                                                    </a>
                                                </li>
                                         <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Collector/get_RTE_school';?>" class="nav-link  ">RTE-Student Report
                                                    </a>
                                                </li>
                                                <!--<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Collector/emis_rte_verification_districtwise';?>" class="nav-link  ">RTE Applicant Verification </a>
                                                </li>-->
                                                <!-- <li aria-haspopup="true" class=" ">
                                                   <a href="<?php echo base_url().'Collector/dge_2017_18_report_blk';?>" class="nav-link  ">Past XII Student Status</a>
                                          </li>
                                                 <li aria-haspopup="true" class="dropdown-submenu">
                                                    <a href="<?php echo base_url().'state/schemeedureport/';?>" class="nav-link  ">
                                                     Scheme Reports
                                                    </a>
                                                     <ul class="dropdown-menu">
                                                     
                                                        <!--<li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/calldashboard/0/0/1';?>" class="nav-link">Indent Summary</a>
                                                        </li>-->
                                                           <!--  <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Collector/indents_summary';?>" class="nav-link">Indent Summary Report</a>
                                                        </li>
                                                        <!-- <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/calldashboard/0/0/1/1';?>" class="nav-link">Distribution Summary</a>
                                                        </li> -->
                                                       <!-- <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/dee_providing_list/0/0/0/0';?>" class="nav-link">DEE Distribution</a>
                                                        </li>

                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/dse_providing_list/0/0/0/0';?>" class="nav-link">DSE Distribution</a>
                                                        </li>
                                                        
                                                         <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Collector/get_state_laptop_district';?>" class="nav-link">Laptop Distribution</a>
                                                        </li>
                                                     </ul>
                                                    
                                                 </li>-->

                                               <!--  <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Collector/schoolcatemanagefil';?>">
                                                 Special Reports
                                                <span class="arrow"></span>
                                            </a>
                                                </li>
                                                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="<?php echo base_url().'Collector/get_renewal_district_block';?>" class="nav-link  ">
                                                        Renewal Status Reports
                                                    </a>
                                        </li> -->
                                            </ul>
                                        </li>

                                        <!-------------------Teacher----------------->

                                    <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown ">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-users"></i> Staff 
                                                <span class="arrow"></span>
                                            </a>
                                              <ul class="dropdown-menu pull-left">
                                               
										
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Collector/emis_staff_BRTE_list';?>"
                                                class="nav-link  ">
                                                      BRTE Details
                                                    </a>
                                                       </li>
											<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Collector/emis_staff_district_school_count_details';?>" class="nav-link  ">
                                                        Schoolwise Details
                                                    </a>
                                                </li>
                                               <!--<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Collector/emis_staff_stud_dist_school_details';?>" class="nav-link  ">
                                                         Students Teachers Ratio
                                                    </a>
                                                </li>-->
											
                                               
												
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
                                            <a href="<?php echo base_url().'Collector/emis_district_slelectschool';?>"> 
                                             Search school
                                                <span class="arrow"></span>
                                            </a>
                                           
                                        </li> 
										
										 <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown ">
                                            <a href="<?php echo base_url().'Collector/school_needs_csr';?>"> 
                                            School Needs CSR Report
                                                <span class="arrow"></span>
                                            </a>
                                           
                                        </li> 
                                       
                                       
                                              <li aria-haspopup="true" class="dropdown-submenu">
                                                
                                                        <a href="#" class="nav-link  ">School Profile Reports</a>
                                                     
                                                       <ul class="dropdown-menu">
                                                     
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Collector/school_profile_verification_district';?>" class="nav-link">Academic Reports</a>
                                                        </li>
                                                         <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Collector/school_land_verification_district';?>" class="nav-link">Land Reports</a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'State/school_lab_details/1/0/'.$this->session->userdata('emis_district_id');?>" class="nav-link">LAB Reports</a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'State/school_device_details/1/0/0/'.$this->session->userdata('emis_district_id');?>" class="nav-link">Device Reports</a>
                                                        </li>
                                                          <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Collector/school_sanitation_verification_district';?>" class="nav-link">WASH Reports</a>
                                                        </li>
                                                           <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Collector/school_committee_verification_district';?>" class="nav-link">Committee Reports</a>
                                                        </li>
														 <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Collector/get_emis_state_school_building_school';?>" class="nav-link">Building Details</a>
                                                        </li>
                                                      
                                                     </ul>
                                             </li>


                                        <li aria-haspopup="true" class="dropdown-submenu">
                                                
                                                        <a href="#" class="nav-link  ">Sections and Groups</a>
                                                     
                                                       <ul class="dropdown-menu">
                                                     
                                                         <li aria-haspopup="true" class=" ">
                                                            <a href="<?php echo base_url().'Collector/schoolwise_class_section';?>" class="nav-link  ">Sections in Aided Schools  </a>
                                                         </li>
                                                         <li aria-haspopup="true" class=" ">
                                                             <a href="<?php echo base_url().'Collector/schoolwise_higher_class_section';?>" class="nav-link  ">Higher Secondary Groups</a>
                                                        </li>
                                                       
                                                      
                                                     </ul>
                                             </li>
                                               <li aria-haspopup="true" class="dropdown-submenu">
                                                
                                                        <a href="#" class="nav-link  ">Private Schools</a>
                                                     
                                                       <ul class="dropdown-menu">
                                                       
                                                       <!--    <li aria-haspopup="true" class=" ">
                                                             <a href="<?php echo base_url().'Collector/emis_school_unrecognized_block';?>" class="nav-link  ">Unrecognized Schools
                                                             </a>
                                                        </li>-->
                                                      
                                                          <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                                            <a href="<?php echo base_url().'Collector/get_renewal_district_block';?>" class="nav-link  ">
                                                        Renewal and Recognition
                                                    </a>
                                              </li>
                                                       
                                                      
                                                     </ul>
                                             </li>
                                              <!--<li aria-haspopup="true" class="">
                                                <a href="<?php echo base_url().'State/schoolprofileverifcation/0/'.$this->session->userdata('emis_district_id');?>" class="nav-link">School Profle Verification</a>
                                            </li>-->

                                               
												<!--<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Collector/schoolwise_class_timetable_report_blk';?>" class="nav-link  ">Timetable Marking Report</a>
                                                </li>-->
												 <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                             <a href="<?php echo base_url().'Collector/emis_teacher_timetable_details';?>" class="nav-link  ">
                                               Teacher Timetable Report
                                                <span class="arrow"></span>
                                            </a>
                                          
                                        </li>
                                       
                                                
                                           
										
                                        <!-- <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown ">
                                            <a href="<?php echo base_url().'Collector/get_districtwise_school_short_name';?>"> 
                                             School Short Name
                                                <span class="arrow"></span>
                                            </a>
                                           
                                        </li> -->
                                                <!-- <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Collector/schoolcatemanagefil';?>">
                                                 Special Reports
                                                <span class="arrow"></span>
                                            </a>
                                                </li>
                                                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="<?php echo base_url().'Collector/get_renewal_district_block';?>" class="nav-link  ">
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
                                                    <a href="<?php echo base_url().'Collector/schoolcatemanagefil';?>">
                                                 Special Reports
                                                <span class="arrow"></span>
                                            </a>
                                                </li>
												
												  
                                           
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="<?php echo base_url().'Collector/get_attendance_blockwise_details';?>" class="nav-link  ">
                                                        Attendance Reports
                                                    </a>
                                        </li>
                                        
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Collector/emis_Collector_2018';?>" class="nav-link  ">Admissions In 2018-19                                                    </a>
                                                </li>

                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="http://125.21.192.32/dashboard/" target="_blank">
                                                 14417 Report
                                                <span class="arrow"></span>
                                            </a>
                                          
                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="http://tn14417.emri.in:8888/complaint/login.php" target="_blank">
                                                 14417 Complaint Call
                                                <span class="arrow"></span>
                                            </a>
                                          
                                        </li>
                                       
                                        
                                            </ul>
                                        </li>

                                      


                                        <!--------------Online Services----------------->
                                   
                                    <!--   <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown">
                                               <a href="javascript:;"> 
                                                   <i class="fa fa-globe"></i> TNTP
                                                     <span class="arrow"></span>
                                                </a>
                                                <ul class="dropdown-menu pull-left">
                                                    <li aria-haspopup="true" class=" ">
                                                        <a href="https://tntp.tnschools.gov.in" target="_blank"> 
                                                        TNTP
                                                        </a>
                                                    </li>
                                                    <li aria-haspopup="true" class=" ">
                                                        <a href="<?php echo base_url().'State/callteachercountreport/0/0';?>"> 
                                                         Users Report
                                                        </a>
                                                    </li>
                                            </ul>
                                          </li>-->
                                            <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="<?php echo base_url().'Collector/get_flash_news';?>"> 
                                            <i class="fa fa-envelope"></i> Messages
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu pull-left">
                                                
                                            </ul>
                                        </li>
										
                                        </li>



                                       <!--  <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown ">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-user"></i> Student
                                                <span class="arrow"></span>
                                            </a>
                                              <ul class="dropdown-menu pull-left">
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Collector/emis_district_createstudent';?>" class="nav-link  ">
                                                        Create Student
                                                    </a>
                                                </li>
                                            </ul>
                                        </li> -->


                                        <!-- <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                            <a href="<?php echo base_url().'Collector/emis_district_student_report';?>"> 
                                            <i class="fa fa-credit-card"></i> Student Id card
                                                <span class="arrow"></span>
                                            </a>

                                        </li> -->
                                        <!-- <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <!-- <a href="http://attendance.tnschools.gov.in/index.php?l=dG5hZG1pbjoxMjM0NVNJWA==" target="_blank">
                                                <i class="fa fa-users"></i> Attendance
                                                <span class="arrow"></span>
                                            </a> 
                                            <a href="<?php echo base_url().'Collector/get_attendance_blockwise_details';?>" class="nav-link  ">
                                                      <i class="fa fa-users"></i>  Attendance Reports
                                                    </a>
                                            <!-- <ul class="dropdown-menu pull-left">
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/get_attendance_details';?>" class="nav-link  ">
                                                        Attendance Reports
                                                    </a>
                                                </li>
                                            </ul> 
                                          
                                        </li> -->
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
                                            <a href="<?php echo base_url().'Collector/emis_district_slelectschool';?>"> 
                                            <i class="fa fa-search"></i> Search school
                                                <span class="arrow"></span>
                                            </a>
                                           
                                        </li> -->
                                        
                                        
                                         
                                        
                                        
                                        
                                        <!-- <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="<?php echo base_url().'Collector/get_edu_district_strick_report';?>">
                                                <i class="fa fa-arrow-right"></i> Strike Report
                                                <span class="arrow"></span>
                                            </a>
                                          
                                        </li> -->
                                  <?php 
                                  // echo $this->session->userdata('emis_school_id');
                                     $schoolselect =  $this->session->userdata('emis_school_id');
                                    if($schoolselect!=''){
                                     $this->load->model('Collector_model');
                                     $district_id = $this->session->userdata('emis_district_id');
                                     $schoolprofile=$this->Collector_model->get_school_by_id($schoolselect,$district_id);
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
                                                    <a href="<?php echo base_url().'Collector/emis_Collectorchange_school';?>" class="nav-link">
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