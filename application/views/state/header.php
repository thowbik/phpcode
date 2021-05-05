<div class="page-wrapper-row">
                <div class="page-wrapper-top">
                    <!-- BEGIN HEADER -->
                    <div class="page-header">
                        <!-- BEGIN HEADER TOP -->
                        <div class="page-header-top">
                            <div class="container">
                                <!-- BEGIN LOGO -->
                                <div class="page-logo" style="min-width:50%;font-size: 18px;">
                                    <a href="<?php echo base_url().'State/baseDash';?>">
                                        <img src="<?php echo base_url().'asset/pages/img/emis_logo.png';?>"  style="height: 100%;margin:0px;"  alt="logo" class="logo-default">
                                    </a>
                                </div>
                                <!-- END LOGO -->
                                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                                <a href="javascript:;" class="menu-toggler"></a>
                                <!-- END RESPONSIVE MENU TOGGLER -->
                                <!-- BEGIN TOP NAVIGATION MENU -->
                                <div class="top-menu">
                                    <ul class="nav navbar-nav pull-right">
                                       
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
                                                    <a href="<?php echo base_url().'Home/emis_school_home';?>">
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
                                                 <?php if($user_type_id==5){ ?>
                                                 <li>
                                                    <a href="<?php echo base_url().'State/emis_state_resetpassword';?>">
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
                        <div class="page-header page-header-menu">
                            <div class="container" style="width: 1300px;">
     
                                <!-- BEGIN MEGA MENU -->
                                <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
                                <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
                                <div class="hor-menu  ">
                                    <ul class="nav navbar-nav">
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="<?php echo base_url().'State/baseDash';?>"> 
                                            <i class="fa fa-dashboard"></i> Dashboard
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu pull-left">
                                                
                                            </ul>
                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown  ">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-user"></i> Students
                                                <span class="arrow"></span>
                                            </a>
                                          <ul class="dropdown-menu pull-left">
												  <li aria-haspopup="true" class=" ">
                                                   <a href="<?php echo base_url().'State/get_district_migration';?>" class="nav-link  ">  Students in Common Pool</a>
                                                </li>
                                              
                                                 <li aria-haspopup="true" class=" ">
                                                     <a href="<?php echo base_url().'State/get_district_migration_details';?>" class="nav-link">Student Migration Report</a>
                                                </li>
												
												<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'AllApprove/get_duplicationlist/0/';?>" class="nav-link  ">
                                                        Student Duplication List
                                                    </a>
                                                </li>
												
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/state_district_special_cash';?>" class="nav-link  ">Special Cash Incentive Report                                                   </a>
                                                </li>
                                                 <li aria-haspopup="true" class=" ">
                                                     <a href="<?php echo base_url().'State/stud_community_report';?>" class="nav-link">Student Community Details</a>
                                                </li>
                                                <li aria-haspopup="true" class=" ">
                                                     <a href="<?php echo base_url().'State/get_student_search_details';?>" class="nav-link">Student Search Details</a>
                                                </li>
												<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_state_district_aadhar_count';?>" class="nav-link  ">Aadhar Enrollment Report                                                </a>
                                                </li>
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/get_OSC_List';?>" class="nav-link  ">Out of School Children                          </a>
                                                </li>
												
												<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_state_district_noonmeal_count_details';?>" class="nav-link  ">Noonmeal Student Report                                                </a>
                                                </li>
                                                  <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_student_disablity_list';?>" class="nav-link  ">CWSN-Student Report
                                                    </a>
                                                </li>
                                                  <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_student_RTE_list';?>" class="nav-link  ">RTE-Student Report
                                                    </a>
                                                </li>
                                               <li aria-haspopup="true" class=" ">
                                                     <a href=" <?php echo base_url().'state/districtwise_student_strength_rpt';?>" class="nav-link">Section-Wise Strength Report</a>
                                                </li>
                                              <!--  <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/schoolwise_class_question_report_dist';?>" class="nav-link  ">CCE Monitoring Report
                                                    </a>
                                                </li>-->
                                                 <li aria-haspopup="true" class="dropdown-submenu">
                                                    <a  class="nav-link  ">
                                                     Academic Report
                                                    </a>
                                                     <ul class="dropdown-menu">

                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'State/schoolwise_class_question_report_dist';?>" class="nav-link">1 - 8 Monitoring</a>
                                                        </li>
                                                         <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'State/student_marks_9_10';?>" class="nav-link">9 & 10 Monitoring</a>
                                                        </li>
                                                         <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'State/student_co_scholastic_1_8';?>" class="nav-link">1-8 Co-Scholastic Monitoring</a>
                                                        </li>
                                                         
                                                                                            
                                                     </ul>
                                                    
                                                 </li>
                                               
                                                 <li aria-haspopup="true" class="dropdown-submenu">
                                                    <a  class="nav-link  ">
                                                     SLAS Report-2019
                                                    </a>
                                                     <ul class="dropdown-menu">

                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'State/slas_report_dist';?>" class="nav-link">Student-Wise</a>
                                                        </li>
                                                         <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'State/slas_report_schl_dist';?>" class="nav-link">School-Wise</a>
                                                        </li>
                                                         
                                                                                            
                                                     </ul>
                                                    
                                                 </li>
                                                  <li aria-haspopup="true" class="dropdown-submenu">
                                                    <a  class="nav-link  ">
                                                     Past XII Student Status
                                                    </a>
                                                     <ul class="dropdown-menu">

                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'State/dge_2017_18_report';?>" class="nav-link">Labtop Distribution Monitoring Report</a>
                                                        </li>
                                                         <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'State/class_12_status_cate_17_18';?>" class="nav-link">Category-Wise Report</a>
                                                        </li>
                                                          <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'State/dge_2017_18_cate';?>" class="nav-link">Detailed Report</a>
                                                        </li>
                                                                                            
                                                     </ul>
                                                    
                                                 </li>
                                                <li aria-haspopup="true" class="dropdown-submenu">
                                                    <a href="<?php echo base_url().'state/schemeedureport/';?>" class="nav-link  ">
                                                     Scheme Reports
                                                    </a>
                                                     <ul class="dropdown-menu">
                                                     
<!--                                                         <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/calldashboard/0/0/1';?>" class="nav-link">Indent Summary</a>
                                                        </li> -->
                                                        
														 <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Home/emis_indent_summary_register';?>" class="nav-link">Indent Summary Register</a>
                                                        </li>
                                                        <!-- <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/calldashboard/0/0/1/1';?>" class="nav-link">Distribution Summary</a>
                                                        </li> -->
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/dee_providing_list/0/0/0/0';?>" class="nav-link">DEE Distribution</a>
                                                        </li>

                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/dse_providing_list/0/0/0/0';?>" class="nav-link">DSE Distribution</a>
                                                        </li>
                                                         <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'state/emis_computerindent';?>" class="nav-link">Laptop Distribution</a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/textbook_providing_list/0/0/0/1';?>" class="nav-link">Textbook Distribution</a> 
                                                        </li>
                                                     </ul>
                                                    
                                                 </li>

											
                                            </ul>
                                        </li>
                                         

                                        <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown  ">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-building"></i> Schools
                                                <span class="arrow"></span>
                                            </a>
                                          <ul class="dropdown-menu pull-left">
												
                                                <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown  mega-menu-full">
                                            <a href="<?php echo base_url().'State/emis_state_school_srch';?>"> 
                                             School search
                                                <span class="arrow"></span>
                                            </a>
                                          
                                        </li>
										 <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown  mega-menu-full">
                                            <a href="<?php echo base_url().'State/emis_state_schools_list';?>"> 
                                             School approval
                                                <span class="arrow"></span>
                                            </a>
                                          
                                        </li>
									 <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown ">
                                            <a href="<?php echo base_url().'State/school_needs_csr';?>"> 
                                            School Needs CSR Report
                                                <span class="arrow"></span>
                                            </a>
                                           
                                        </li> 
										 <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="<?php echo base_url().'State/schoolwise_class_timetable_report_dist';?>" class="nav-link  ">
                                                       MasterTimetable Report
                                                    </a>
                                        </li>
										
										<li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown ">
                                            <a href="<?php echo base_url().'State/emis_csr_report';?>"> 
                                             CSR Contributions
                                                <span class="arrow"></span>
                                            </a>
                                           
                                        </li> 
                                       
                                          <li aria-haspopup="true" class="dropdown-submenu">
                                                
                                                <a href="#" class="nav-link  ">Private Schools</a>
                                                     
                                                       <ul class="dropdown-menu">
                                                     
                                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="<?php echo base_url().'State/get_renewal_state_district';?>" class="nav-link  ">
                                                        Recognition & Renewal
                                                    </a>
                                                    <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                                        <a href="<?php echo base_url().'AllApprove/RenewalResetQueue';?>" class="nav-link  ">
                                                        Reset Renewal
                                                    </a>
                                                     </li>
                                                        
                                               <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'state/emis_school_unrecognized_list';?>" class="nav-link  ">Unrecognized Schools
                                                    </a>
                                                </li>
                                                    <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_student_RTE_allocation';?>" class="nav-link  ">RTE Intake Capacity
                                                                             </a>
                                               </li>
                                                     </ul>
                                             </li>
                                          <li aria-haspopup="true" class="dropdown-submenu">
                                                
                                                        <a href="#" class="nav-link  ">School Profile Reports</a>
                                                     
                                                       <ul class="dropdown-menu">
                                                     
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'State/school_profile_verification_district_wise';?>" class="nav-link">Academic Reports</a>
                                                        </li>
                                                        
                                                         <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'State/school_land_verification_district_wise';?>" class="nav-link">Land Reports</a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'State/school_lab_details/1';?>" class="nav-link">LAB Reports</a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'State/school_device_details/1';?>" class="nav-link">Device Reports</a>
                                                        </li>
                                                          <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'State/school_sanitation_verification_district_wise';?>" class="nav-link">WASH Reports</a>
                                                        </li>
                                                           <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'State/school_committee_verification_district_wise';?>" class="nav-link">Committee Reports</a>
                                                        </li>
                                                       <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'State/get_emis_state_school_building_district';?>" class="nav-link">Building Reports</a>
                                                        </li>
                                                     </ul>
                                             </li>
                                             
                                            <!--<li aria-haspopup="true" class="dropdown-submenu">
                                                 <a href="#" class="nav-link  ">School Null Reports</a>
                                                    <ul class="dropdown-menu">
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'State/infranull';?>" class="nav-link">Infra Null Report</a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'State/trainingnull';?>" class="nav-link">Training Null Report</a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'State/smcnull';?>" class="nav-link">SMC Null Report</a>
                                                        </li>
                                                    </ul>
                                             </li>-->
                                             
                                             
                                             
                                              <li aria-haspopup="true" class="dropdown-submenu">
                                                
                                                        <a href="#" class="nav-link  ">Sections and Groups</a>
                                                     
                                                       <ul class="dropdown-menu">
                                                     
                                                       
                                                 <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/district_schoolwise_class_section';?>" class="nav-link  ">Sections In Aided Schools                                                   </a>
                                                </li>
												<!-- <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/district_schoolwise_timetable_report';?>" class="nav-link  ">Timetable Reports  </a>
                                                </li>-->
												<li aria-haspopup="true" class=" ">
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/district_schoolwise_higher_section';?>" class="nav-link  ">Higher Secondary Groups                                                </a>
                                                </li>
                                                      
                                                     </ul>
                                             </li>

                                            <!--<li aria-haspopup="true" class="">
                                                <a href="<?php echo base_url().'State/schoolprofileverifcation/0'; ?>" class="nav-link">School Profle Verification</a>
                                            </li>-->
                                        
												<!--<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/lession_plan';?>" class="nav-link  ">Lession                                                </a> 
                                                </li>-->
												<!--<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/timetable_lesson_plan';?>" class="nav-link  ">Timetable - Lesson Plan                                               </a>
                                                </li>-->
												<!--<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/timetable_term_plan';?>" class="nav-link  ">Timetable - Term Plan Plan                                               </a>
                                                </li>-->
												<!--<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/district_schoolwise_timetable_created';?>" class="nav-link  ">Timetable Report                                               </a>
                                                </li>-->
                                               
												<!-- <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_teacher_details';?>" class="nav-link  ">
                                                        Teacher Details
                                                    </a>
                                                </li>
												<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_nonteacher_details';?>" class="nav-link  ">
                                                        Non-Teacher Details
                                                    </a>
                                                </li>
												
                                                 <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_tech_transfer';?>" class="nav-link  ">
                                                        Transfer a Teacher
                                                    </a>
                                                </li> 
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_state_teacher_transhistory';?>" class="nav-link  ">
                                                        Transferred list
                                                    </a>
                                                </li> -->
                                            </ul>
                                        </li>
										
										</li>
										<li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown  ">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-users"></i> Staffs
                                                <span class="arrow"></span>
                                            </a>
                                          <ul class="dropdown-menu pull-left">
												
											
												<!--<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_teacher_surplus_details';?>" class="nav-link  ">
                                                        Teacher SurPlus
                                                    </a>
                                                </li>-->
											
												<!--<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_nonteacher_details';?>" class="nav-link  ">
                                                        Non-Teacher Details
                                                    </a>
                                                </li>-->
												
												<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_staff_district_count_details';?>" class="nav-link  ">
                                                        Staffs Details
                                                    </a>
                                                </li>
												
												 <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown ">
                                            <a href="<?php echo base_url().'State/staff_list';?>"> 
                                            Search Staff Details
                                                <span class="arrow"></span>
                                            </a>
                                           
                                        </li>
                                               <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/BRTE_List';?>" class="nav-link  ">
                                                        BRTE details
                                                    </a>
                                                </li>
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_teacher_gt_5years';?>" class="nav-link  ">
                                                        Teacher Posting Duration
                                                    </a>
                                                </li>
                                              
													<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_staff_stud_district_details';?>" class="nav-link  ">
                                                         Students Teachers Ratio
                                                    </a>
                                                </li>
												
												<!--<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_nonteacher_details';?>" class="nav-link  ">
                                                        Non-Teacher Details
                                                    </a>
                                                </li>-->
												
                                                 <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_tech_transfer';?>" class="nav-link  ">
                                                        Transfer a Teacher
                                                    </a>
                                                </li> 
                                                
                                              
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_staff_from_to_trans_dist_count';?>" class="nav-link  ">
                                                        Transferred list
                                                    </a>
                                                </li>
												<!-- <li aria-haspopup="true" class="dropdown-submenu">
emis_state_teacher_transhistory
                                                        <a href="#" class="nav-link  "> Teacher Request</a>
                                                     
                                                       <ul class="dropdown-menu">
                                                         <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_staff_transfer_req';?>" class="nav-link  ">
                                                        DEE-Teacher Request
                                                    </a>
                                                </li>
                                                   <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_staff_transfer_dse_req';?>" class="nav-link  ">
                                                        DSE-Teacher Request
                                                    </a>
                                                </li>
                                            </ul>
                                       
                                        </li>-->
                                                   <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                             <a href="<?php echo base_url().'State/emis_teacher_timetable_detail_district';?>" class="nav-link  ">
                                               Teacher Timetable Report
                                                <span class="arrow"></span>
                                            </a>
                                          
                                        </li>
										 <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                             <a href="<?php echo base_url().'State/teacher_child_studyingreport';?>" class="nav-link  ">
                                               Teacher's Children Report
                                                <span class="arrow"></span>
                                            </a>
                                          
                                        </li>
                                            <li aria-haspopup="true" class="dropdown-submenu">                                                
                                                <a href="#" class="nav-link  ">PINDICS Monitoring</a>                                                     
                                                <ul class="dropdown-menu">                                                     
                                                    <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                                        <a href="<?php echo base_url().'State/emis_state_pindics_report';?>" class="nav-link  ">
                                                        Self Evaluation
                                                        </a>
                                                </ul>
                                            </li>             
                                            </ul>
                                        </li>
										<li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown  ">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-users"></i> Staffs Fixation
                                                <span class="arrow"></span>
                                            </a>
                                          <ul class="dropdown-menu pull-left">
										


                                      <li aria-haspopup="true" class="submenu">
                                                
                                                        <a href="<?php echo base_url().'State/emis_teacher_panel_mainpage';?>" class="nav-link  ">DEE Monitoring</a>
                                                     
                                                    
                                             </li>
                                                    <li aria-haspopup="true" class="submenu">
                                                
                                                        <a href="<?php echo base_url().'State/emis_teacher_panel_mainpage_dse';?>" class="nav-link  ">DSE Monitoring</a>
                                                     
                                                      
                                             </li>


                                      <li aria-haspopup="true" class="dropdown-submenu">
                                                
                                                        <a href="#" class="nav-link  ">DEE Fixation Report</a>
                                                     
                                                       <ul class="dropdown-menu">
                                                     
                                                        <li aria-haspopup="true">
                                                             <a href="<?php echo base_url().'State/emis_staff_fixa_tot_school_details';?>" class="nav-link  ">
                                                         DEE-Staffs Fixation Summary
                                                         </a>
                                                        </li>
                                                        
                                                         <li aria-haspopup="true">
                                                           <a href="<?php echo base_url().'State/emis_staff_fixa_report';?>" class="nav-link  ">
                                                         DEE-Fixation Districtwise
                                                    </a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'State/staff_fixtation_sub_wise';?>" class="nav-link  ">
                                                          DEE-Fixation Subjectwise
                                                    </a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'State/teacher_profile_complition_stus';?>"class="nav-link  ">
                                               DEE-Teacher Profile completion Status
                                                       
                                                  </a>
                                                        </li>
                                                          <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'State/emis_staff_transfer_req';?>" class="nav-link  ">
                                                       Transfer Applied Teachers list
                                                    </a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'State/beo_staff_list';?>" class="nav-link  ">
                                                       Transfer Applied BEO list
                                                    </a>
                                                        </li>
														<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_total_surplus_teacher_dee';?>" class="nav-link  ">
                                                        DEE-Teacher SurPlus
                                                    </a>
                                                        </li>
                                                           <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'State/get_staff_fix_district';?>" class="nav-link  ">
                                                DEE-Staff Fixation Monitoring
                                                     
                                                  </a>
                                                        </li>
														<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/promotion_deereport';?>" class="nav-link  ">
                                                        Promotion Eligibile Teachers List
                                                    </a>
                                                 </li>
												 <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/vacancy_dee_sgbtreport';?>" class="nav-link  ">
                                                        Vacancy Report
                                                    </a>
                                                 </li>
												  <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/need_dee_sgbtreport';?>" class="nav-link  ">
                                                        Need Report
                                                    </a>
                                                 </li>
												  <!--<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/live_vacancy_dee_sgbtreport';?>" class="nav-link  ">
                                                       Live Vacancy 
                                                    </a>
                                                 </li>-->
                                                     </ul>
                                             </li>


                                          <li aria-haspopup="true" class="dropdown-submenu">
                                                
                                                        <a href="#" class="nav-link  ">DSE Fixation Report</a>
                                                     
                                                       <ul class="dropdown-menu">
                                                         <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_staff_fixa_tot_school_details_dse';?>" class="nav-link  ">
                                                         DSE-Staffs Fixation Summary
                                                    </a>
                                                </li>
                                                  <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_PG_fixation';?>" class="nav-link  ">
                                                          DSE-PG fixtation Subjectwise
                                                    </a>
                                                </li>
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_staff_fixa_report_PG';?>" class="nav-link  ">
                                                          DSE-Fixation Districtwise(SG & BT)
                                                    </a>
                                                </li>
                                                  <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_staff_fixa_report_PG1';?>" class="nav-link  ">
                                                          DSE-Fixation Districtwise(PG)
                                                    </a>
                                                </li>
                                                 <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'State/staff_fixtation_sub_wise_dse';?>" class="nav-link  ">
                                                          DSE-Fixation Subjectwise(BT)
                                                    </a>
                                                        </li>
                                                   <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/teacher_profile_complition_stus_dse';?>" class="nav-link  ">
                                                        DSE-Teacher Profile completion Status
                                                    </a>
                                                </li>
                                                 <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_staff_transfer_dse_req';?>" class="nav-link  ">
                                                        DSE-Transfer Request
                                                    </a>
                                                </li>
												<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_total_surplus_teacher';?>" class="nav-link  ">
                                                        DSE-Teacher SurPlus
                                                    </a>
                                                </li>
                                                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                                 <a href="<?php echo base_url().'State/get_staff_fix_district_dse';?>">
                                              DSE-Staff Fixation Monitoring
                                                        <span class="arrow"></span>
                                            </a>
                                          
                                        </li>
                                         <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/promotion_dsereport';?>" class="nav-link  ">
                                                       Promotion Eligible Teachers List  
                                                    </a>
                                                 </li>
                                          <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/vacancy_dse_pgreport';?>" class="nav-link  ">
                                                        Vacancy Report
                                                    </a>
                                                 </li>	
                                          <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/need_dse_pgreport';?>" class="nav-link  ">
                                                        Need Report
                                                    </a>
                                                 </li>	
                                              <!--<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/live_vacancy_dse_pgreport';?>" class="nav-link  ">
                                                        Live Vacancy
                                                    </a>
                                                 </li>-->												 
                                                     </ul>
                                             </li>


                                                  
                                            </ul>
                                        </li>

										<!--<li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown  ">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-dashboard"></i> Dashboard
                                                <span class="arrow"></span>
                                            </a>
                                          <ul class="dropdown-menu pull-left">
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Home/profileCount/dist';?>" class="nav-link  ">
                                                       Profile Complete
                                                    </a>
                                                </li>
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_state_dash2';?>" class="nav-link  ">
                                                       Dashboard 2
                                                    </a>
                                                </li>
												
                                            </ul>
										</li>-->

                                      <!--   <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                            <a href="<?php echo base_url().'State/emis_student_reportclass';?>"> 
                                            <i class="fa fa-credit-card"></i> Student Id card
                                                <span class="arrow"></span>
                                            </a>

                                        </li> -->
                                       
                                        <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown  ">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-bar-chart"></i> Reports
                                                <span class="arrow"></span>
                                            </a>
                                          <ul class="dropdown-menu pull-left">
                                                 <!--<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_chart_reports';?>" class="nav-link  ">
                                                        Chart reports
                                                    </a>
                                                </li> -->
                                               <!-- <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_state_reports';?>" class="nav-link  ">
                                                        Categorise reports
                                                    </a>
                                                </li>-->
												<li aria-haspopup="true" class="dropdown-submenu">
                                                    <a href="" class="nav-link">
                                                        Indicators
                                                    </a>
													
													
													<ul class="dropdown-menu pull-left">
														<li aria-haspopup="true" class=" ">
															<a href="<?php echo base_url().'AllApprove/indicators';?>" class="nav-link  ">
																Reports
															</a>
														</li>
														<li aria-haspopup="true" class=" ">
															<a href="<?php echo base_url().'AllApprove/ranksheet/1';?>" class="nav-link  ">
															   Rank Sheet
															</a>
														</li>
												
													</ul>
													
                                                </li>
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_state_special_reports';?>" class="nav-link  ">
                                                        Special reports
                                                    </a>
                                                   </li>
                                                    <li aria-haspopup="true" class=" ">
                                                    <a href="#" class="nav-link  " onclick="bio_att()">
                                                       Teachers Biometric Attendance
                                                    </a>
                                                </li>
												<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_school_profile_completed';?>" class="nav-link  ">
                                                         UDISE+ 19-20 Monitoring Reports
                                                    </a>
                                                   </li>
												
												
												<!-- <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_student_countdg';?>" class="nav-link  ">
                                                        DGE reports
                                                    </a>
                                                </li> -->
                                               
                                                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="<?php echo base_url().'State/get_attendance_details';?>" class="nav-link  ">
                                                        Attendance Reports
                                                    </a>
                                        </li>
                                          
                                          <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/get_district_strick_report';?>" class="nav-link  ">
                                                        Teacher Strike Report
                                                    </a>
                                                </li>
                                        
                                       
                                              
                                              <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_enrollment_2018';?>" class="nav-link  ">Admissions In 2018-19                                                    </a>
                                                </li>
                                                
                                                
                                                <!--  <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_enrollment_2019';?>" class="nav-link  ">Admissions In 2019                                                    </a>
                                                </li>-->
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="http://125.21.192.32/dashboard/" target="_blank">
                                                14417 Report
                                                <span class="arrow"></span>
                                            </a>
                                          
                                        </li>
                                        
                                       

                                        <!-- <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Home/profileCount/dist';?>" class="nav-link  ">
                                                       Profile Complete
                                                    </a>
                                                </li> -->
                                            </ul>
											</li>
                                          <!--    <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown  ">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-bar-chart"></i>Monitoring Reports
                                                <span class="arrow"></span>
                                            </a>
                                          <ul class="dropdown-menu pull-left">
                                                               
                                            </ul>
											</li>-->

                                             <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-globe"></i> GIS
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu pull-left">
                                                <!--<li aria-haspopup="true" class=" ">
                                                    <a href="https://tntp.tnschools.gov.in" target="_blank"> TNTP </a>
                                                </li>-->
                                               <li aria-haspopup="true" class=" ">
                                                    <a href="https://tngis.tn.gov.in/"> GIS mapping </a>
                                                </li>
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/emis_gis_video';?>">  GIS Helping Video</a>
                                                </li>
                                                   <li aria-haspopup="true" class=" ">
                                                    <a href="https://drive.google.com/file/d/1jyXbAfHJYZmd5Qklug2B67bMZ5FKDd4j/view"> GIS  User Guide </a>
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
                                                    <a href="https://tntp.tnschools.gov.in" target="_blank"> TNTP </a>
                                                </li>-->
                                               <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/callteachercountreport/0/0';?>"> Users Report </a>
                                                </li>
                                            </ul>
                                          </li>
                                          <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-envelope"></i> Messages
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu pull-left">
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/get_flash_news';?>">  Message </a>
                                                </li>
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/get_flash_SMS';?>"> SMS </a>
                                                </li>
                                            </ul>
                                          </li>
                                          
                                        </li>
                                        

                                        <!-- <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="javascript:;">
                                                <i class="fa fa-envelope-o"></i> Message box
                                                <span class="arrow"></span>
                                            </a>
                                          
                                        </li> -->
                                         <?php 
                                         $schoolselect =  $this->session->userdata('emis_school_id');
                                         if($schoolselect!=''){
                                      $this->load->model('Districtmodel');
                                     
                                     $schoolprofile=$this->Districtmodel->getschoolprofiledetails($schoolselect);}
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
                                                    <a href="<?php echo base_url().'State/emis_statechange_school';?>" class="nav-link">
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
                <form  method="post" id="att_form" action="https://aebas.tnschools.gov.in/aebasv1/slindex.php">
                     <input type="hidden" name="lid" value="tnpsdse">
                     <input type="hidden" name="lpw" value="d315d1fc2296fb9578235c89e55cc3cd">
                     <input type="hidden" name="lsc" value="1357">
  
                     </form>

                
<script type="text/javascript">
        
   function bio_att()
    {
        document.getElementById('att_form').submit();
    }
</script>
            </div>
