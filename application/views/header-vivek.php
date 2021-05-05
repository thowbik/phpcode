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
                          $is_high_class=$this->session->userdata('emis_school_highclass');
                          $is_cbsc = $this->session->userdata('emis_school_board'); 

                         $school_id=$this->session->userdata('emis_school_id');
                         $manage_cate=$this->Datamodel->getmanagecatename($school_id);
                         $groupcateid = $manage_cate;

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
                                            <a href="<?php echo base_url().'Home/emis_school_home';?>"> 
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
                                                <?php } ?>
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Home/emis_school_studentlist';?>" class="nav-link  ">
                                                        Student list
                                                    </a>
                                                </li>
                                               
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Home/emis_school_studentsearch';?>" class="nav-link  ">
                                                        Student search
                                                    </a>
                                                </li>
                                               
                                                <!--  <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Home/emis_school_stulist_neet_jee';?>" class="nav-link  ">
                                                        NEET/JEE/CA Enrollment
                                                    </a>
                                                </li> -->
                                               
                                            </ul>
                                        </li> 
                                         <?php if($user_type_id==1 || $user_type_id==2 || $user_type_id==3 ){ ?>
                                         <?php if($school_id!=""){ 
                                           $schcategory = $this->Datamodel->getmanagecateid($school_id);
                                           // echo $schcategory[0]->manage_name;
                                           if($schcategory[0]->manage_name!="Un-aided"){ ?> 
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-credit-card"></i> Student Id card
                                                <span class="arrow"></span>
                                            </a>
                                           <ul class="dropdown-menu pull-left">
                                              <!-- <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Home/emis_school_studentlist_idcard';?>" class="nav-link  ">
                                                        View student data
                                                    </a>
                                                </li> -->
                                               <!--  <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Home/emis_school_approove_idcard';?>" class="nav-link  ">
                                                        Approove Id card
                                                    </a>
                                                </li> -->
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Home/emis_school_generate_idcard';?>" class="nav-link  ">
                                                        Print Id card
                                                    </a>
                                                </li>
                                            </ul>

                                        </li>
                                        <?php } } } ?>
                                       
                                        <li aria-haspopup="true" class="dropdown-submenu">
                                            <a href="javascript:;"> 
                                                <i class="fa fa-building"></i>School<span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li aria-haspopup="true" class="dropdown-submenu">
                                                    <a href="<?php echo base_url().'Home/emis_school_profile';?>" class="nav-link  ">School - Profile</a>
                                                    <ul class="dropdown-menu">
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/emis_school_details_entry/1';?>" class="nav-link  ">
                                                            PART I
                                                            </a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/emis_school_details_entry/2';?>" class="nav-link  ">
                                                            PART II
                                                            </a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/emis_school_details_entry/3';?>" class="nav-link  ">
                                                            PART III
                                                            </a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/emis_school_details_entry/4';?>" class="nav-link  ">
                                                            PART IV
                                                            </a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/emis_school_details_entry/5';?>" class="nav-link  ">
                                                            PART V
                                                            </a>
                                                        </li>
                                                        <li aria-haspopup="true">
                                                            <a href="<?php echo base_url().'Basic/emis_school_details_entry/6';?>" class="nav-link  ">
                                                            PART VI
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>

                                       
                                      
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
                                                    <a href="<?php echo base_url().'Udise_staff/emis_school_staff2';?>" class="nav-link  ">
                                                        Teaching Staff Registration
                                                    </a>
                                                </li> 
                                                
												
												<li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Udise_staff/emis_school_staff4';?>" class="nav-link  ">
                                                        Non-Teaching Staff Registration
                                                    </a>
                                                </li>
												
                                                
                                               
                                                
                                               
                                                <!--  <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'Home/emis_school_stulist_neet_jee';?>" class="nav-link  ">
                                                        NEET/JEE/CA Enrollment
                                                    </a>
                                                </li> -->
                                               
                                            </ul>
											
                                          
                                        </li>

                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="<?php echo base_url().'Staff_fixa/emis_staff_fixa';?>">
                                                <i class="fa fa-street-view"></i> Staff fixation
                                                <span class="arrow"></span>
                                            </a>
                                          
                                        </li>

                                         <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown  mega-menu-full">
                                            <a href="https://goo.gl/CMkJLx" target="_blank"> 
                                            <i class="fa fa-wechat"></i> FAQ
                                                <span class="arrow"></span>
                                            </a>
                                          
                                        </li>

                                         <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown  mega-menu-full">
                                            <a href="<?php echo base_url().'Home/emis_school_transferrequest';?>" target="_blank"> 
                                            <i class="fa fa-info-circle"></i> Pending Transfer Requests
                                                <span class="arrow"></span>
                                            </a>
                                          
                                        </li>
                                        <li  >
                                       
                                         </li>
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