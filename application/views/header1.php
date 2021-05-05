<div class="page-wrapper-row">
                <div class="page-wrapper-top">
                    <!-- BEGIN HEADER -->
                    <div class="page-header">
                        <!-- BEGIN HEADER TOP -->
                        <div class="page-header-top">
                            <div class="container">
                                <!-- BEGIN LOGO -->
                                <div class="page-logo" style="min-width:50%;font-size: 18px;">
                                    <a >
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

                                            </ul>
                                        </li>

                                         <?php $user_id="";
                          $user_type_id=$this->session->userdata('emis_user_type_id');
                          $emis_username=$this->session->userdata('emis_username'); 
                          $is_high_class=$this->session->userdata('emis_school_highclass');

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
                                                    <a >
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
                                                <li>
                                                    <a >
                                                        <i class="icon-lock"></i> Reset Password </a>
                                                </li>
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
                          if($user_type_id==1){ $dash_url='Home/emis_school_home'; }
                          if($user_type_id==5){ $dash_url='State/emis_state_home'; }?>
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
                                            <a "> 
                                            <i class="fa fa-dashboard"></i> Dashboard
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                      
                                       <?php if($user_type_id==1){ ?>
                                        <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown ">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-user"></i> Student
                                                <span class="arrow"></span>
                                            </a>
                                              <ul class="dropdown-menu pull-left">
                                                <!-- <li aria-haspopup="true" class=" ">
                                                    <a class="nav-link  ">
                                                        Create Student
                                                    </a>
                                                </li> -->
                                                <li aria-haspopup="true" class=" ">
                                                    <a class="nav-link  ">
                                                        Student list
                                                    </a>
                                                </li>
                                                <li aria-haspopup="true" class=" ">
                                                    <a  class="nav-link  ">
                                                        Student search
                                                    </a>
                                                </li>
                                            </ul>
                                        </li> <?php  } ?>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-credit-card"></i> Student Id card
                                                <span class="arrow"></span>
                                            </a>

                                        </li>
                                        <?php if($user_type_id==1){ ?>
                                        <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-building"></i> School
                                                <span class="arrow"></span>
                                            </a>
                                              <ul class="dropdown-menu pull-left">
                                              <li aria-haspopup="true" class=" ">
                                                    <a  class="nav-link  ">
                                                        School - Profile
                                                    </a>
                                                </li>
                                                <li aria-haspopup="true" class=" ">
                                                    <a  class="nav-link  ">
                                                        Basic Information
                                                    </a>
                                                </li>
                            
                                                <li aria-haspopup="true" class=" ">
                                                    <a  class="nav-link  ">
                                                        Class-wise No. of Sections Available in the School
                                                    </a>
                                                </li>
                                                <?php if($is_high_class==1){ ?>
                                                <li aria-haspopup="true" class=" ">
                                                    <a  class="nav-link  ">
                                                        Groups Functioning in the School
                                                    </a>
                                                </li><?php  } ?>
                                                <li aria-haspopup="true" class=" ">
                                                    <a  class="nav-link  ">
                                                        Administrative Information
                                                    </a>
                                                </li>

                                            </ul>
                                        </li>
                                       <?php  } ?>
                                        <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown  mega-menu-full">
                                            <a href="javascript:;"> 
                                            <i class="fa fa-bar-chart"></i> Report
                                                <span class="arrow"></span>
                                            </a>
                                          
                                        </li>

                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="javascript:;">
                                                <i class="fa fa-envelope-o"></i> Message box
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