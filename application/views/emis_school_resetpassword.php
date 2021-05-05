<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>

        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script type="text/javascript">
  function password_strength(password)
        {
            var desc = new Array();
            desc[0] = "Weak";
            desc[1] = "Weak";
            desc[2] = "Better";
            desc[3] = "Medium";
            desc[4] = "Strong";
            desc[5] = "Strongest";

            var points = 0;

            //---- if password is bigger than 4 , give 1 point.
            if (password.length > 2) points++;

            //---- if password has both lowercase and uppercase characters , give 1 point.  
            if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) points++;

            //---- if password has at least one number , give 1 point.
            if (password.match(/\d+/)) points++;

            //---- if password has at least one special caracther , give 1 point.
            if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) points++;

            //---- if password is bigger than 12 ,  give 1 point.
            if (password.length > 5) points++;


            //---- Showing  description for password strength.
            document.getElementById("password_description").innerHTML = desc[points];
            
            //---- Changeing CSS class.
            document.getElementById("password_strength").className = "strength" + points;
        }
        </script>
        <style type="text/css">
        #password_description
        {
            font-size: 12px;    
        }

        #password_strength
        {
            height:10px;
            display:block;
        }

        #password_strength_border
        {
            width: 144px;
            height: 10px;
            border: 1px solid black;
        }
        .strength0
        {
            width:200px;
            background:#cccccc;
        }

        .strength1
        {
            width:40px;
            background:#ff0000;
        }

        .strength2
        {
            width:80px; 
            background:#ff5f5f;
        }

        .strength3
        {
            width:100px;
            background:#56e500;
        }

        .strength4
        {
            background:#4dcd00;
            width:140px;
        }

        .strength5
        {
            background:#399800;
            width:200px;
        }
        </style>

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

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
                                                 <?php if($user_type_id==1){ ?>
                                                  <li>
                                                    <a >
                                                        <i class="icon-lock"></i> Reset Password </a>
                                                </li>
                                                <?php } ?>
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
        <h1>Reset Password
            <small>school user reset password</small>
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


        <div class="portlet light portlet-fit ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-users"></i>
                    <span class="caption-subject font-dark sbold uppercase">Reset Password Form</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-12">
                     <div class="tab-pane" id="tab_2">
                         
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-equalizer font-green-haze"></i>
                                        <span class="caption-subject font-green-haze bold uppercase">Reset Password</span>
                                        <span class="caption-helper"></span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                 <form class="form-horizontal" method="post" id="emis_stu_reg_form" name="emis_stu_reg_form"
                                >
                                  <!-- <form class="form-horizontal" method="post" id="emis_stu_reg_form" name="emis_stu_reg_form"
                                > --><center>
                                        <div class="form-body">
                                            <h3 class="form-section">Change Password</h3>
                                            <center>
                                             <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label class="control-label col-md-4">Old password *</label>
                                                        <div class="col-md-4">
                                                            <input type="password" class="form-control" id="emis_rest_user_oldpass" name="emis_rest_user_oldpass"  placeholder="Old Password *" >
                                                             <font style="color:#dd4b39;"><div id="emis_rest_user_oldpass_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                             <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label class="control-label col-md-4">New password *</label>
                                                        <div class="col-md-4">
                                                            <input type="password" class="form-control" id="emis_rest_user_newpass" name="emis_rest_user_newpass"  placeholder="New Password *" onkeyup='password_strength(this.value)'>
                                                             <font style="color:#dd4b39;"><div id="emis_rest_user_newpass_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label class="control-label col-md-4">Confirm New password *</label>
                                                        <div class="col-md-4">
                                                            <input type="password" class="form-control" id="emis_rest_user_cnfpass" name="emis_rest_user_cnfpass"  placeholder="Confirm New password *">
                                                             <font style="color:#dd4b39;"><div id="emis_rest_user_cnfpass_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                       <label>Password Strength</label>
                                <div id="password_description" ></div>
                                <div id="password_strength" class="strength0"></div>

                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-6">
                                                            <button type="button" class="btn green" id="emis_school_reset_pass">Submit</button>
                                                           <!--  <a href="<?php echo base_url().'Home/emis_school_home';?>" type="button" class="btn default">Skip</a> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6"> </div>
                                            </div>
                                        </div>
                                        </div>
                                        </center> 
                                    </form>
                                    <!-- END FORM-->
                                </div>
                            </div>
                        </div> 

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
            </div>

                  <?php $this->load->view('footer.php'); ?>
        </div>

        <?php $this->load->view('scripts.php'); ?>





        <!-- BEGIN PAGE LEVEL SCRIPTS -->

        <!-- END PAGE LEVEL SCRIPTS -->


    </body>

</html>