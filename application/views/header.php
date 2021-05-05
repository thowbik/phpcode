<head>
<style>
.dropdown-menu>li>a {
	    white-space: nowrap !important;
}
</style>
</head> 
<div class="page-wrapper-row">
                <div class="page-wrapper-top">
                    <!-- BEGIN HEADER -->
                    <div class="page-header">
                        <!-- BEGIN HEADER TOP -->
                        <div class="page-header-top">
                            <div class="container">
                                <!-- BEGIN LOGO -->
                                <div class="page-logo" style="min-width:50%;font-size: 18px;">
                                    <a href="<php echo base_url(); ?>">
                                        <img src="<?php echo base_url().'asset/pages/img/emis_logo.png';?>"  style="height: 100%;margin:0px;"  alt="logo" class="logo-default">
                                    </a>
                                </div>
                                <!-- END LOGO -->
                                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                                <a href="javascript:;" class="menu-toggler"></a>
                                <!-- END RESPONSIVE MENU TOGGLER -->
                                <!-- BEGIN TOP NAVIGATION MENU -->
                                <?php $school_deails = $this->session->userdata('school_profile');
                                    // echo $school_deails[0]['school_name'];
                                ?>
                                <div class="top-menu">
                                <div class="row">
                                <div class="col-md-12" style="word-wrap: break-word;">   
                                <h3 class="panel-title" style="color: #000;"><i class="fa fa-university"></i> <?=$school_deails[0]['school_name'];?></h3>
                                </div>
                                </div>
                                    <ul class="nav navbar-nav pull-right"> 
                                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                                        <!-- DOC: Apply "dropdown-hoverable" class after "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                                        <!-- DOC: Remaove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                        
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
                                                        <strong>0 New</strong>Messages</h3>
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
                                                  $is_high_class=$this->session->userdata('emis_school_highclass');
                                                  $is_cbsc = $this->session->userdata('emis_school_board'); 
                                                  $school_id=$this->session->userdata('emis_school_id');
                                                  $manage_cate=$this->Datamodel->getmanagecatename($school_id);
                        						  $schcategory = $this->Datamodel->getmanagecateid($school_id);
                        						  $scate=$schcategory[0]->id;
                        						  //echo $scate;
                                                  $groupcateid = $manage_cate;
                        						  $schcategory = $this->Datamodel->getmanagecateid($school_id);
                        						  $scate=$schcategory[0]->id;
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
                                                <?php if($user_type_id==1){ ?>
                                                 <li>
                                                    <a href="<?php echo base_url().'Home/emis_school_resetpassword1';?>">
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
                          <?php $dash_url="";
                          $user_type_id=$this->session->userdata('emis_user_type_id'); 
                          ?>
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
                                            <!--<a href="<?php echo base_url().'Home/emis_school_home';?>"> -->
                                            <a href="<?php echo base_url().'Home/emis_school_dash';?>"> 
                                            
                                            <i class="fa fa-dashboard"></i> Dashboard
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                      
                                      
                                        <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown ">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-user"></i> Student
                                                <span class="arrow"></span>
                                            </a>

                                              <ul class="dropdown-menu pull-left" style="width: 250px;">
                                              <?php if($user_type_id==1){ ?>  
                                                 <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Registration/emis_student_reg';?>" class="nav-link  ">
                                                        Student Admission
                                                    </a>
                                                </li> 
                                                 <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Home/get_school_migration';?>" class="nav-link  ">
                                                        Students In Common Pool
                                                    </a>
                                                </li> 
                                                   <li aria-haspopup="true" class=" ">
                                                   <a href="<?php echo base_url().'Home/student_summary_classwise';?>" class="nav-link  ">  Students Summary</a>
                                                </li>
												
                                                    <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Home/get_stud_scheme_list';?>" class="nav-link"> 
                                                        Student Tagging
                                                     </a>
													  </li> 
                                                     
                                                <?php } ?>
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Home/emis_school_student_classwise';?>" class="nav-link  ">
                                                        Student list
                                                    </a>
                                                </li>
												
												<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'AllApprove/studentduplicationlist';?>" class="nav-link  ">
                                                        Student Duplication List
                                                    </a>
                                                </li>
												
                                                <?php if($this->session->userdata('school_manage')==1 || $this->session->userdata('school_manage')==2 || $this->session->userdata('school_manage')==4){?>
                                                 <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Home/get_slas_class7_report';?>" class="nav-link  ">
                                                        Class 7 SLAS Score-2019
                                                    </a>
                                                </li>
                                            <?php } ?>
                                                  <?php if($this->session->userdata('school_manage')==1 || $this->session->userdata('school_manage')==2 || $this->session->userdata('school_manage')==4){?>
                                                <li aria-haspopup="true" class="dropdown-submenu">
                                                    <a href="<?php echo base_url();?>" class="nav-link  ">Academic Records</a>
                                                    <ul class="dropdown-menu">
                                               <!-- <li aria-haspopup="true" class="">
                                                    <a href="<?php echo base_url().'Home/emis_school_markcardtable';?>" class="nav-link  ">Scholastic </a>
                                                </li>
                                                <li aria-haspopup="true" class="">
                                                    <a href="<?php echo base_url().'Home/emis_school_co_scholostic';?>" class="nav-link  ">Co-Scholastic </a>
                                                </li>
                                                <li aria-haspopup="true" class="">
                                                    <a href="<?php echo base_url().'Home/emis_school_monitoring_detail';?>" class="nav-link  ">School Monitoring Form</a>
                                                </li>-->
                                              
                                                <li aria-haspopup="true" class="">
                                                    <a href="<?php echo base_url().'Home/emis_school_student_mark';?>" class="nav-link  ">Subject-wise CCE Records</a>
                                                </li>
                                             <li aria-haspopup="true" class="">
                                                    <a href="<?php echo base_url().'Home/emis_school_student_co_scholastic';?>" class="nav-link  ">Co-scholastic CCE Record</a>
                                                </li>
                                                 
                                                </ul>
                                                </li>
                                                 <?php } ?>

                                                  <li aria-haspopup="true" class="dropdown-submenu">
                                                    <a href="<?php echo base_url();?>" class="nav-link  ">Transfer And Promotions</a>
                                                    <ul class="dropdown-menu">
                                                        <!--<li aria-haspopup="true" class=" ">
                                                            <a href="<?php echo base_url().'Home/get_student_pro_trans_details';?>" class="nav-link"> 
                                                                Promote Students
                                                            </a>
                                                        </li>-->
                                                        <li aria-haspopup="true" class=" ">
                                                            <a href="<?php echo base_url().'Home/emis_school_transferrequest';?>" class="nav-link"> 
                                                                Pending Student Transfer
                                                            </a>
                                                
                                                        </li>
                                                        <li aria-haspopup="true" class=" ">
                                                            <a href="<?php echo base_url().'Home/emis_school_get_students_transfer';?>" class="nav-link  ">
                                                                Transfer Student
                                                                </a>
                                                        </li>
                                                        <li aria-haspopup="true" class=" ">
                                                            <a href="<?php echo base_url().'Home/get_students_transfer_list';?>" class="nav-link"> 
                                                                Students Transfer Certificate
                                                            </a>
                                                
                                                        </li>
                                                        <li aria-haspopup="true" class=" ">
                                                            <a href="<?php echo base_url().'Home/student_request_raised';?>" class="nav-link"> 
                                                                Students Request Raised
                                                            </a>
                                                
                                                        </li>
                                                    </ul>
                                                    <?php 
                                                    if($this->session->userdata('school_manage') == 1 || $this->session->userdata('school_manage') == 2 || $this->session->userdata('school_manage') == 4 ){ 
                                                    $sessionschoolprofile = $this->session->userdata('school_profile');
                                                    if($sessionschoolprofile[0]['sch_cate_id'] == 3 || $sessionschoolprofile[0]['sch_cate_id'] == 5 || $sessionschoolprofile[0]['sch_cate_id'] == 9 || $sessionschoolprofile[0]['sch_cate_id'] == 10){
                                                    /*  3 5 9 10 */ 
                                                    ?>
                                                        <li aria-haspopup="true" class=" ">
                                                                <a href="<?php echo base_url().'Home/emis_previous_XII_dtls';?>" class="nav-link  ">
                                                                    <span>2017-18 & 2018-19 <br/> 12th Std. Student details</span>
                                                                </a>
                                                        </li>
                                                    <?php }} ?>
                                                  </li>

                                                  
                                                <!-- <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Home/emis_school_studentsearch';?>" class="nav-link  ">
                                                        Student search
                                                    </a>
                                                </li> -->
                                                
                                               
                                                <!-- <li aria-haspopup="true" class=" ">
                                                     <a href="<?php echo base_url().'Home/get_students_transfer_list';?>" class="nav-link"> 
                                                         Transfer Certificate
                                                     </a>
                                          
                                                </li> -->
												 <!--<li aria-haspopup="true" class=" ">
                                                     <a href="<?php echo base_url().'Home/get_student_scheme_list';?>" class="nav-link"> 
                                                        Scholorship Scheme
                                                     </a>
                                          
                                                </li>-->
                                                <?php $school_manage = $this->session->userdata('school_manage');
                                                if($school_manage !=1 && $school_manage !=5){ ?>
                                               
                                            <?php } ?>
                                               
                                                <!--  <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Home/emis_school_stulist_neet_jee';?>" class="nav-link  ">
                                                        NEET/JEE/CA Enrollment
                                                    </a>
                                                </li> -->
                                               
                                            </ul>
                                        </li> 
                                         <!-- echo $schcategory[0]->manage_name;
										 
										  <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-credit-card"></i> Student Id card
                                                <span class="arrow"></span>
                                            </a>
                                           <ul class="dropdown-menu pull-left">
                                              <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Home/emis_school_studentlist_idcard';?>" class="nav-link  ">
                                                        View student data
                                                    </a>
                                                </li> 
                                                 <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Home/emis_school_approove_idcard';?>" class="nav-link  ">
                                                        Approove Id card
                                                    </a>
                                                </li> 
										 
										 <?php if($user_type_id==1 || $user_type_id==2 || $user_type_id==3 ){ ?>
                                         <?php if($school_id!=""){ 
                                           $schcategory = $this->Datamodel->getmanagecateid($school_id);
                                          
                                           if($schcategory[0]->manage_name!="Un-aided"){ ?> 
                                       
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Home/emis_school_generate_idcard';?>" class="nav-link  ">
                                                        Print Id card
                                                    </a>
                                                </li>
                                            </ul>

                                        </li>
                                        <?php } } } ?>-->
                                       
                                        <!--<li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown">
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
                                                <?php if($is_high_class && $groupcateid!="11" && $groupcateid!="12" && $groupcateid!="28" && $groupcateid!="29" &&$groupcateid!="33" && $groupcateid!="34"){ ?>
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Schoolgroups/emis_school_groupfunctioning';?>" class="nav-link  ">
                                                        Groups Functioning in the School
                                                    </a>
                                                </li><?php  } ?>
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Admin/emis_school_admin1';?>" class="nav-link  ">
                                                        Administrative Information
                                                    </a>
                                                </li>
                                                 <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Udise_staff/emis_school_staff1';?>" class="nav-link  ">
                                                        Staff details
                                                    </a>
                                                </li>
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Staff_fixa/emis_staff_fixa';?>" class="nav-link  ">
                                                        Staff fixation
                                                    </a>
                                                </li> 

                                            </ul>
                                        </li>-->
                                        
                                        
                                         <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown">
                                           										
											<a href="javascript:;"> 
                                            <i class="fa fa-users"></i> Staff details
                                                <span class="arrow"></span>
                                            </a>
											
											
											<ul class="dropdown-menu pull-left">
											
												<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Udise_staff/emis_school_staff3';?>" class="nav-link  ">
                                                        Staff list
                                                    </a>
                                                </li>
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="https://forms.gle/fsbQ7B4breXiHsW9A" target="_blank" class="nav-link  ">
                                                        IFHRMS
                                                    </a>
                                                </li>
                                                <?php if($scate == 1 || $scate ==2){?>
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Udise_staff/school_staff_training_details';?>" class="nav-link  ">
                                                        Staff Training Details
                                                    </a>
                                                </li>
                                                <?php } ?>
                                                <?php if($scate == 1 || $scate ==2 || $scate ==4){?>
                                                <li aria-haspopup="true" class=" ">
                                                <a href="<?php echo base_url().'Udise_staff/pindics_hm_eval';?>" class="nav-link  ">
                                                         PINDICS HM Evaluation
                                                    </a>
                                                </li>
                                                <?php } ?>
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Home/teacher_login_details';?>" class="nav-link  ">
                                                        Teacher Login Details
                                                    </a>
                                                </li>
												
                                                 <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Udise_staff/emis_school_staff2';?>" class="nav-link  ">
                                                        Teaching Staff Registration
                                                    </a>
                                                </li> 
                                                
												
												<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Udise_staff/emis_school_staff4';?>" class="nav-link  ">
                                                        Non-Teaching Staff Registration
                                                    </a>
                                                </li>

                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Home/get_password_reset_request';?>" class="nav-link  ">
                                                        Staff Password Reset Request 
                                                    </a>
                                                </li>
												 <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Udise_staff/emis_school_volunteers_staff';?>" class="nav-link  ">
                                                        Volunteer Teachers
                                                    </a>
                                                </li> 
												<!--<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Udise_staff/emis_school_vocational_staff';?>" class="nav-link  ">
                                                        Vocational Staff Registration
                                                    </a>
                                                </li>--> 
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Udise_staff/teacherdeputation';?>" class="nav-link  ">
                                                        Deputation History
                                                    </a>
                                                </li>
												
                                                
                                               
                                                
                                               <?php if($this->session->userdata('school_manage')==1 || $this->session->userdata('school_manage')==2 || $this->session->userdata('school_manage')==4){?>
                                                 <!-- <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Udise_staff/emis_teacher_attendance_school';?>" class="nav-link  ">
                                                        Staff Attendance
                                                    </a>
                                                </li> -->
												
                                               <?php }?>
											   <?php if($scate == 1 ){?>
												<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Udise_staff/teachers_children_details';?>" class="nav-link  ">Teacher's Children Details</a>
                                                </li>
												<?php } ?>
                                            </ul>
											
                                          
                                        </li>
                                        
                                        
                                         <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown">
                                           										
											<a href="javascript:;"> 
                                            <i class="fa fa-building"></i>School
                                                <span class="arrow"></span>
                                            </a>
                                        
                                            <ul class="dropdown-menu pull-left">
                                                <li aria-haspopup="true" class="dropdown-submenu">
                                                    <a href="<?php echo base_url();?>" class="nav-link  ">School - Profile</a>
                                                    <ul class="dropdown-menu">
                                                        <li aria-haspopup="true" class=" ">
                                                            <a href="<?php echo base_url().'AllApprove/schoolProfileView/'.$this->session->userdata('emis_school_id');?>/1" class="nav-link  ">
                                                                Download Profile
                                                            </a>
                                                        </li>
                                                        
                                                        <li aria-haspopup="true">
                                                            <a id="p1" href="<?php echo base_url().'Basic/emis_school_details_entry/1/'.$this->uri->segment(4,0);?>" class="nav-link  ">
                                                           Basic Info
                                                            </a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a id="p2" href="<?php echo base_url().'Basic/emis_school_details_entry/2/'.$this->uri->segment(4,0);?>" class="nav-link  ">
                                                           School Details
                                                            </a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a id="p3" href="<?php echo base_url().'Basic/emis_school_details_entry/3/'.$this->uri->segment(4,0);?>" class="nav-link  ">
                                                            Training Details
                                                            </a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a id="p4" href="<?php echo base_url().'Basic/emis_school_details_entry/4/'.$this->uri->segment(4,0);?>" class="nav-link  ">
                                                           Committee Details
                                                            </a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a id="p5" href="<?php echo base_url().'Basic/emis_school_details_entry/5/'.$this->uri->segment(4,0); ?>" class="nav-link  ">
                                                          Land Details
                                                            </a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a id="p6" href="<?php echo base_url().'Basic/emis_school_details_entry/6/'.$this->uri->segment(4,0); ?>" class="nav-link  ">
                                                           School Inventory
                                                            </a>
                                                        </li>
                                                        <?php if(($this->session->userdata('school_manage')>1 && $this->session->userdata('school_manage')<5) || $this->session->userdata('emis_school_id')=='') { ?>
														<li aria-haspopup="true">
                                                            <a id="p7" href="<?php echo base_url().'Basic/emis_school_details_entry/7/'.$this->uri->segment(4,0); ?>" class="nav-link  ">
                                                            Fees &amp; Fund
                                                            </a>
                                                        </li>
                                                        <?php } ?>
                                                        
                                                        <?php if($this->session->userdata('school_manage')==1 || $this->session->userdata('school_manage')==2 || $this->session->userdata('school_manage')==4 || $this->session->userdata('emis_school_id')=='') { ?>
                                                        <li aria-haspopup="true">
                                                            <a id="p8" href="<?php echo base_url().'Basic/emis_school_details_entry/8/'.$this->uri->segment(4,0); ?>" class="nav-link  ">
                                                            Funds
                                                            </a>
                                                        </li>
                                                         <?php } ?>
                                                         <li>
                                                            <a href="<?php echo base_url().'Basic/additional_details/boarding';?>">Additional Profile Detail </a>
                                                        </li>
                                                         <li>
                                                    <a href="<?php echo base_url().'Home/emis_mhrd_dcf_form';?>">
                                                        UDISE + Declaration </a>
                                                </li>
                                                    </ul>
                                                </li>
                                                <li aria-haspopup="true" class="">
                                                    <a href="<?php echo base_url().'Section/emis_school_noofsections';?>" class="nav-link  ">Class &amp; Sections</a>
                                                </li>
												<!--<li aria-haspopup="true" class="">
													<a href="<?php echo base_url().'Attendance/attendanceallreport';?>" class="nav-link  ">Attendance Report</a>
												</li>-->
                                                <!-- <li aria-haspopup="true" class="">
                                                    <a href="<?php echo base_url().'Home/emis_student_profile_photo';?>" class="nav-link  ">Upload Profile Photo</a>
                                                </li>-->
												   <?php if($scate == 1 ){ ?>
												 <li aria-haspopup="true" class="">
                                                    <a href="<?php echo base_url().'Home/emis_school_needs_csr';?>" class="nav-link  ">School Needs CSR</a>
                                                </li>
													<?php }?>
              
                                                    <li aria-haspopup="true" class="dropdown-submenu">
												
				
                                                    <a href="<?php echo base_url();?>" class="nav-link  ">Time Table</a>
                                                    <ul class="dropdown-menu">
                                                       <!-- <li aria-haspopup="true">
                                                            <a id="p1" href="<?php echo base_url().'TimetableController/loadConfiguration';?>" class="nav-link  ">
                                                            Configuration
                                                            </a>
                                                        </li>-->
                                                       <!--<li aria-haspopup="true">
                                                            <a id="p2" href="<?php echo base_url().'TimetableController/TeacherAssignClassWise';?>" class="nav-link  ">
                                                            Assign Class to Teacher
                                                            </a>
                                                        </li>-->
													    <li aria-haspopup="true">
                                                            <a id="p4" href="<?php echo base_url().'TimetableController/copy_term_timetable';?>" class="nav-link  ">
                                                            Copy Timetable
                                                            </a>
                                                        </li>	
                                                      <li aria-haspopup="true">
                                                            <a id="p3" href="<?php echo base_url().'TimetableController/loadDefaultTimeTable';?>" class="nav-link  ">
                                                            Create Master Timetable
                                                            </a>
                                                        </li>
                                                    
                                                         <li aria-haspopup="true">
                                                            <a id="p5" href="<?php echo base_url().'TimetableController/loadWeeklyTimeTable'; ?>" class="nav-link ">
                                                            Create Weekly Timetable 
                                                            </a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a id="p6" href="<?php echo base_url().'TimetableController/todaytimetable'; ?>" class="nav-link ">
                                                            View Today's Timetable 
                                                            </a>
                                                        </li>														
                                                        <li aria-haspopup="true">
                                                            <a id="p6" href="<?php echo base_url().'TimetableController/viewWeeklyTimeTable'; ?>" class="nav-link ">
                                                            View Class Timetable 
                                                            </a>
                                                        </li>
														 <li aria-haspopup="true">
                                                            <a id="p6" href="<?php echo base_url().'TimetableController/loadTeacherTimeTable'; ?>" class="nav-link ">
                                                             View Teacher Timetable 
                                                            </a>
                                                        </li>
														<li aria-haspopup="true">
                                                            <a id="p6" href="<?php echo base_url().'TimetableController/weekwiseTeacherreport'; ?>" class="nav-link ">
                                                             Teacher Timetable Report 
                                                            </a>
                                                        </li>
														<li aria-haspopup="true">
                                                            <a id="p6" href="<?php echo base_url().'TimetableController/timetable_assign_class_list'; ?>" class="nav-link  ">
                                                           School Timetable Report
                                                            </a>
                                                        </li> 
                                                       	<li aria-haspopup="true">
                                                            <a id="p6" href="<?php echo base_url().'TimetableController/assign_holidays'; ?>" class="nav-link ">
                                                            Assign Holidays 
                                                            </a>
                                                        </li>													
														<!-- <li aria-haspopup="true">
                                                           <a id="p5" href="<?php echo base_url().'TimetableController/TeacherAssignClass'; ?>" class="nav-link ">
                                                            Assign Class to Teacher
                                                            </a>
                                                        </li>--> 
														<!--<li aria-haspopup="true">
                                                            <a id="p6" href="<?php echo base_url().'TimetableController/timetable_assign_classes'; ?>" class="nav-link  ">
                                                            TimeTable Assign  
                                                            </a>
                                                        </li> -->
														
                                                       														
                                                        
                                                        <!--<li aria-haspopup="true">
                                                            <a id="p6" href="<?php echo base_url().'TimetableController/loadHolidayView'; ?>" class="nav-link  ">
                                                            Assign Holiday
                                                            </a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a id="p6" href="<?php echo base_url().'TimetableController/loadReport'; ?>" class="nav-link  ">
                                                            Reports
                                                            </a>
                                                        </li>-->
                                                       
                                                    </ul>
                                                </li>
											
                                                <!--<li aria-haspopup="true" class="">
                                                    <a href="<?php echo base_url().'Schoolgroups/emis_school_groupfunctioning';?>" class="nav-link  ">Group Functioning</a>
                                                </li>-->
                                                 <li aria-haspopup="true" class="">
                                                 
                                                            <?php 
                                                        $school_id = $this->session->userdata('emis_school_id');
                                                        
                                                                $cate_type = Common::get_high_class($school_id); //load helper function
                                                               
                                                        $school_manage = $this->session->userdata('school_manage');
                                                  if($school_manage ==1 || $school_manage ==2 || $school_manage ==4 ){ ?>
                                                   <li aria-haspopup="true" class=" ">
                                                     <a href="<?php echo base_url().'Udise_staff/emis_schoolwise_staff_fixation';?>" class="nav-link"> 
                                                         Scale Register
                                                     </a>
                                          
                                                     </li>
                                                         <?php } ?>

                                                </li>
                                            </ul>
                                        </li>
										
                                       

                                        <!--<li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="<?php echo base_url().'Staff_fixa/emis_staff_fixa';?>">
                                                <i class="fa fa-street-view"></i> Staff fixation
                                                <span class="arrow"></span>
                                            </a>
                                          
                                        </li>
										
										<ul class="dropdown-menu pull-left">
											<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Home/emis_school_profile';?>" class="nav-link  ">Scheme Details</a>
                                                </li>
												<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Home/emis_school_profile';?>" class="nav-link  ">Total School Indent</a>
                                                </li>
												<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Home/emis_school_profile';?>" class="nav-link  ">Scheme Details</a>
                                                </li>
												</ul>-->
										
										
								
										
										
                                         
                                                
                                        
                                        

                                         <!--<li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown  mega-menu-full">
                                            <a href="https://goo.gl/CMkJLx" target="_blank"> 
                                            <i class="fa fa-wechat"></i> FAQ
                                                <span class="arrow"></span>
                                            </a>
                                          
                                        </li>-->
                                        
                                          <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown">
                                           										
											<a href="javascript:;"> 
                                            <i class="fa fa-file-archive-o"></i>Schemes
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu pull-left">
                                                 <?php if($this->session->userdata('school_manage')>1 && $this->session->userdata('school_manage')<5 && $this->session->userdata('sch_depart')!=29){ ?>
                                        
                                                    
													   <?php  } if($this->session->userdata('school_manage')<=2 || $this->session->userdata('school_manage')==4) {?>
                                                     
                                                <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/callgeneral1';?>" class="nav-link">Schemes Eligibility</a>
                                                </li>
                                                <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/noonmeal_indent/0/0';?>" class="nav-link">Noon Meals</a>
                                                </li>
												 <?php } ?>
                                                
                                                <li aria-haspopup="true" class="dropdown-submenu">
                                                
                                                        <a href="#" class="nav-link  ">Indenting</a>
                                                     
                                                           <ul class="dropdown-menu">
                                                               <?php if($this->session->userdata('school_manage')<=2 || $this->session->userdata('school_manage')==4) {?>
                                                        
                                                         <!-- <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/schemesummary';?>" class="nav-link">Schemes Summary</a>
                                                        </li> -->
                                                        
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/uniform_indent/0/0';?>" class="nav-link">Uniform </a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/essentials_indent/0/0';?>" class="nav-link">Footwear</a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/stationery_indent';?>" class="nav-link">Books & Stationery </a>
                                                        </li>
                                                        <!--<li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/callscheme';?>" class="nav-link">Special Schemes</a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/callgeneral';?>" class="nav-link">Scheme Indent</a>
                                                        </li>-->
                                                        
                                                    
                                                        <?php } if($this->session->userdata('emis_school_restriction') == 1){ ?>
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/hill_station_scheme/12/0/0/0';?>" class="nav-link">Hill Station </a>
                                                        </li>
                                                        <?php } ?>
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/callbusindent';?>" class="nav-link">BusPass </a>
                                                        </li>
                                                     </ul>
                                                        </li>
                                                        
                                                     	<li aria-haspopup="true" class="dropdown-submenu ">
                                                    <a href="#" class="nav-link">Distribution
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <?php if($this->session->userdata('school_manage')<=2 || $this->session->userdata('school_manage')==4) {?>
                                                       
                                                       
                                                        <li aria-haspopup="true">
                                                            <!-- <a href="<?php /** echo base_url().'Basic/calldis/0';*/ ?>" class="nav-link">Scheme Distribution</a> -->
                                                            <a href="<?php echo base_url().'Basic/essentials_dist/1/0/0'; ?>" class="nav-link">Scheme Distribution</a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Home/emis_school_book_distribution';?>" class="nav-link">Book Distribution</a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Home/emis_distribution_note_book';?>" class="nav-link">Note Book Distribution</a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/laptop_dist/0/0/0';?>" class="nav-link">Laptop Distribution</a>
                                                        </li>
                                                        <?php } if($this->session->userdata('emis_school_restriction') == 1){ ?>
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/hill_station_scheme/12/0/0/1';?>" class="nav-link">Hill Station Distribution</a>
                                                        </li>
														<?php } ?>
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/callbusdis';?>" class="nav-link">BusPass Distribution</a>
                                                        </li>
                                                        

                                          
                                                     </ul>
                                                      <!-- <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Home/get_student_scheme_list_nmms';?>?formid=<?php echo 1?>">NMMS Add Students</a>
                                                        </li>-->
                                                 </li>
                                                <li aria-haspopup="true" class="">
                                                 
                                                            <?php 
                                                        $school_id = $this->session->userdata('emis_school_id');
                                                        
                                                                $cate_type = Common::get_high_class($school_id); //load helper function
                                                               
                                                        $school_manage = $this->session->userdata('school_manage');
                                                  if($school_manage <4 && $cate_type->cate_type=='Higher Secondary School' || $cate_type->high_class=='12'){ ?>
                                                   <li aria-haspopup="true" class=" ">
                                                     <a href="<?php echo base_url().'Home/get_Students_special_cash';?>" class="nav-link"> 
                                                         Special Cash Incentive
                                                     </a>
                                          
                                                     </li>
                                                         <?php } ?>

                                                </li>
                                                
                                             </ul>

                                            </li>
                                               
                                        <?php if($scate == 1 || $scate ==2 ||$scate ==4){?>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                           
                                            <a href="<?php echo base_url().'Home/emis_school_register';?>"> 
                                            
                                            <i class="fa fa-registered"></i> Registers
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
										<?php }?>
                                          <?php if( $scate ==3 ||  $scate==2 || $scate==4) { ?>
                                         <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                         
                                             <a href="<?php echo base_url().'Home/renewalform';?>"> 
                                           
                                            <i class="fa fa-registered"></i> Renewal
                                                <span class="arrow"></span>
                                            </a>
                                        </li><?php } ?>
										
										
								<!--	<li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-globe"></i> TNTP
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu pull-left">
                                           
                                               <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'State/callteachercountreport/0/0';?>"> 
                                                    <i class="fa fa-globe"></i> Users Report
                                                        <span class="arrow"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>-->

                                       <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown">
                                           										
											<a href="javascript:;"> 
                                            <i class="fa fa-wechat"></i> Help
                                                <span class="arrow"></span>
                                            </a>
											
											
											<ul class="dropdown-menu pull-left">
												
												<li aria-haspopup="true" class=" ">
                                                    <a href="https://youtu.be/9G5NSP2XBso" class="nav-link" target="_blank">
                                                       School Profile Tutorial Video
                                                    </a>
                                                </li>
												
                                                 <li aria-haspopup="true" class=" ">
                                                    <a href="https://goo.gl/gnZx2Z" class="nav-link"  target="_blank">
                                                       School Profile Guidelines
                                                    </a>
                                                </li> 
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="https://youtu.be/r5vnPVqqjgg" class="nav-link"  target="_blank">
                                                       Staff Profile Tutorial Video
                                                    </a>
                                                </li> 
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="https://goo.gl/qhaXvm" class="nav-link"  target="_blank">
                                                       Staff Profile Guidelines
                                                    </a>
                                                </li> 
                                                
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="http://bit.ly/2MYHt5p" class="nav-link"  target="_blank">
                                                       Time Table Guidelines
                                                    </a>
                                                </li>
                                                
                                                 <?php if($this->session->userdata('school_manage')>1 && $this->session->userdata('school_manage')<5 && $this->session->userdata('sch_depart')!=29){ ?>
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="https://bit.ly/2WpeNqt" class="nav-link"  target="_blank">
                                                       Renewal Application Guidelines
                                                    </a>
                                                </li> 
                                                <?php } ?>
                                                </ul>
                                                </li>
												  <!--<li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                                    <a href="<?php echo base_url().'Home/gallery';?>">                                             
                                                    <i class="fa fa-picture-o"></i>Gallery<span class="arrow"></span>
                                                    </a>
                                                </li> -->
                                              
                                       
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