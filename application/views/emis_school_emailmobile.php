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
        <h1>First Basic Details
            <small>school user First Entry</small>
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
       

           <!-- <div class="m-heading-1 border-green m-bordered">
            <h3>Basic Information</h3>
        </div> -->  

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mt-checkbox-inline">
                                                    <!-- <label class="mt-checkbox mt-checkbox-outline">
                                                        <input type="checkbox" id="autoopen">&nbsp;Auto-open next field
                                                        <span></span>
                                                    </label> -->
                                                   <!--  <label class="mt-checkbox mt-checkbox-outline">
                                                        <input type="checkbox" id="inline">&nbsp;Inline editing
                                                        <span></span>
                                                    </label> -->
                                                <!--  <button id="enable_first" class="btn green">Enable / Disable Editor Mode</button> -->
                                               
                                                </div>
                                            </div>
                                        </div>


                                     <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">school user First Entry</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                            <form action="<?php echo base_url().'Home/checkfirstuseemail';?>" method="post" >
                                                <div class="row">
                                                    <div class="col-md-12">
                                                    
                                                    <div class="caption">
                                                    <span class="caption-subject font-dark sbold uppercase">Communication Details</span>
                                                     </div><br/>

                                                     <font style="color:#dd4b39;"><div id="emis_reg_stu_date_alert"><?php if(isset($error)){ echo $error; } ?></div></font>
                                                        <table id="user" class="table table-bordered table-striped">
                                                            <tbody>

                                                                <tr>
                                                                    <td style="width:15%"> School Email </td>
                                                                    <td style="width:50%">

                                                                        <input type="text" id="sch_email" name="sch_email" class="form-contorl editusr" value="<?php if($email!=""){ echo $email; } ?>" />
                                                                    </td>
                                                                    <td style="width:35%">
                                                                         <font style="color:#dd4b39;"><div id="sch_email_alert"></div></font>
                                                                    </td>
                                                                </tr>
                                                               <tr>
                                                                    <td style="width:15%"> School Mobile: </td>
                                                                    <td style="width:50%">

                                                                        <input type="text" id="sch_mobile" name="sch_mobile" class="form-contorl editusr" value="<?php if($mobile!=""){ echo $mobile; } ?>" />
                                                                        
                                                                    </td>
                                                                    <td style="width:35%">
                                                                         <font style="color:#dd4b39;"><div id="sch_mobile_alert"></div></font>
                                                                    </td>
                                                                </tr>
                                                            

                                                                </tbody>
                                                                </table>

                                                    <div class="caption">
                                                    <span class="caption-subject font-dark sbold uppercase">School Enrollment Abstract</span>
                                                     </div><br/>
                                                            <table id="user" class="table table-bordered table-striped">
                                                            <tbody>

                                                                <tr>
                                                                    <td style="width:15%"> Class 1</td>
                                                                    <td style="width:50%">

                                                                        <input type="text" id="sch_class1" name="sch_class1" class="form-contorl editusr" value="<?php if($class1!=""){ echo $class1; } ?>" />
                                                                    </td>
                                                                    <td style="width:35%">
                                                                         <font style="color:#dd4b39;"><div id="sch_class1_alert"></div></font>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="width:15%"> Class 2</td>
                                                                    <td style="width:50%">

                                                                        <input type="text" id="sch_class2" name="sch_class2" class="form-contorl editusr" value="<?php if($class2!=""){ echo $class2; } ?>" />
                                                                    </td>
                                                                    <td style="width:35%">
                                                                         <font style="color:#dd4b39;"><div id="sch_class2_alert"></div></font>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="width:15%"> Class 3</td>
                                                                    <td style="width:50%">

                                                                        <input type="text" id="sch_class3" name="sch_class3" class="form-contorl editusr" value="<?php if($class3!=""){ echo $class3; } ?>" />
                                                                    </td>
                                                                    <td style="width:35%">
                                                                         <font style="color:#dd4b39;"><div id="sch_class3_alert"></div></font>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="width:15%"> Class 4</td>
                                                                    <td style="width:50%">

                                                                        <input type="text" id="sch_class4" name="sch_class4" class="form-contorl editusr" value="<?php if($class4!=""){ echo $class4; } ?>" />
                                                                    </td>
                                                                    <td style="width:35%">
                                                                         <font style="color:#dd4b39;"><div id="sch_class4_alert"></div></font>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="width:15%"> Class 5</td>
                                                                    <td style="width:50%">

                                                                        <input type="text" id="sch_class5" name="sch_class5" class="form-contorl editusr" value="<?php if($class5!=""){ echo $class5; } ?>" />
                                                                    </td>
                                                                    <td style="width:35%">
                                                                         <font style="color:#dd4b39;"><div id="sch_class5_alert"></div></font>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="width:15%"> Class 6</td>
                                                                    <td style="width:50%">

                                                                        <input type="text" id="sch_class6" name="sch_class6" class="form-contorl editusr" value="<?php if($class6!=""){ echo $class6; } ?>" />
                                                                    </td>
                                                                    <td style="width:35%">
                                                                         <font style="color:#dd4b39;"><div id="sch_class6_alert"></div></font>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:15%"> Class 7</td>
                                                                    <td style="width:50%">

                                                                        <input type="text" id="sch_class7" name="sch_class7" class="form-contorl editusr" value="<?php if($class7!=""){ echo $class7; } ?>" />
                                                                    </td>
                                                                    <td style="width:35%">
                                                                         <font style="color:#dd4b39;"><div id="sch_class7_alert"></div></font>
                                                                    </td>
                                                                </tr><tr>
                                                                    <td style="width:15%"> Class 8</td>
                                                                    <td style="width:50%">

                                                                        <input type="text" id="sch_class8" name="sch_class8" class="form-contorl editusr" value="<?php if($class8!=""){ echo $class8; } ?>" />
                                                                    </td>
                                                                    <td style="width:35%">
                                                                         <font style="color:#dd4b39;"><div id="sch_class8_alert"></div></font>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:15%"> Class 9</td>
                                                                    <td style="width:50%">

                                                                        <input type="text" id="sch_class9" name="sch_class9" class="form-contorl editusr" value="<?php if($class9!=""){ echo $class9; } ?>" />
                                                                    </td>
                                                                    <td style="width:35%">
                                                                         <font style="color:#dd4b39;"><div id="sch_class9_alert"></div></font>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:15%"> Class 10</td>
                                                                    <td style="width:50%">

                                                                        <input type="text" id="sch_class10" name="sch_class10" class="form-contorl editusr" value="<?php if($class10!=""){ echo $class10; } ?>" />
                                                                    </td>
                                                                    <td style="width:35%">
                                                                         <font style="color:#dd4b39;"><div id="sch_class10_alert"></div></font>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:15%"> Class 11</td>
                                                                    <td style="width:50%">

                                                                        <input type="text" id="sch_class11" name="sch_class11" class="form-contorl editusr" value="<?php if($class11!=""){ echo $class11; } ?>" />
                                                                    </td>
                                                                    <td style="width:35%">
                                                                         <font style="color:#dd4b39;"><div id="sch_class11_alert"></div></font>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:15%"> Class 12</td>
                                                                    <td style="width:50%">

                                                                        <input type="text" id="sch_class12" name="sch_class12" class="form-contorl editusr" value="<?php if($class12!=""){ echo $class12; } ?>" />
                                                                    </td>
                                                                    <td style="width:35%">
                                                                         <font style="color:#dd4b39;"><div id="sch_class12_alert"></div></font>
                                                                    </td>
                                                                </tr>
                                                            

                                                                </tbody>
                                                                </table>
                                                           <p style="color: red;">Note : If the class is not available in your school, please enter '0'.</p>     
                                                    </div>
                                                </div>
                                                 <center><button class="btn green subedituser" type="submit" >Save</button>
                                                 </center>
                                                 </form>
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
      

               <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/moment.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/jquery.mockjax.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js';?>" type="text/javascript"></script>

        <script src="<?php echo base_url().'asset/js/validations.js';?>" type="text/javascript"></script>

        <!-- BEGIN PAGE LEVEL SCRIPTS -->

        <!-- END PAGE LEVEL SCRIPTS -->

        <script type="text/javascript">
    $(document).ready(function(){  // function call for validate Email id
    $("#sch_email").keyup(function(){
      return validemailid('sch_email','sch_email_alert'); 
    });   });

    $(document).ready(function(){  // function call for validate Mobile number
    $("#sch_mobile").keyup(function(){
      return validmobile('sch_mobile','sch_mobile_alert'); 
    });   });  

    $(document).ready(function(){  // function call for validate Class count
    $("#sch_class1").keyup(function(){
      return validatenumber('sch_class1','sch_class1_alert'); 
    });   });  

    $(document).ready(function(){  // function call for validate Class count
    $("#sch_class2").keyup(function(){
      return validatenumber('sch_class2','sch_class2_alert'); 
    });   });  

    $(document).ready(function(){  // function call for validate Class count
    $("#sch_class3").keyup(function(){
      return validatenumber('sch_class3','sch_class3_alert'); 
    });   });   

    $(document).ready(function(){  // function call for validate Class count
    $("#sch_class4").keyup(function(){
      return validatenumber('sch_class4','sch_class4_alert'); 
    });   });   

    $(document).ready(function(){  // function call for validate Class count
    $("#sch_class5").keyup(function(){
      return validatenumber('sch_class5','sch_class5_alert'); 
    });   });   

    $(document).ready(function(){  // function call for validate Class count
    $("#sch_class6").keyup(function(){
      return validatenumber('sch_class6','sch_class6_alert'); 
    });   });   

    $(document).ready(function(){  // function call for validate Class count
    $("#sch_class7").keyup(function(){
      return validatenumber('sch_class7','sch_class7_alert'); 
    });   });   

    $(document).ready(function(){  // function call for validate Class count
    $("#sch_class8").keyup(function(){
      return validatenumber('sch_class8','sch_class8_alert'); 
    });   });   

    $(document).ready(function(){  // function call for validate Class count
    $("#sch_class9").keyup(function(){
      return validatenumber('sch_class9','sch_class9_alert'); 
    });   });   

    $(document).ready(function(){  // function call for validate Class count
    $("#sch_class10").keyup(function(){
      return validatenumber('sch_class10','sch_class10_alert'); 
    });   });   

    $(document).ready(function(){  // function call for validate Class count
    $("#sch_class11").keyup(function(){
      return validatenumber('sch_class11','sch_class11_alert'); 
    });   });   

    $(document).ready(function(){  // function call for validate Class count
    $("#sch_class12").keyup(function(){
      return validatenumber('sch_class12','sch_class12_alert'); 
    });   });   


    

   $(document).ready(function(){  // function call for validate Overall form while submit
    $(".subedituser").click(function(){     
   
  var schemail  = validemailid('sch_email','sch_email_alert');  
  var schmobile  = validmobile('sch_mobile','sch_mobile_alert'); 
  
  var class12  = validatenumber('sch_class12','sch_class12_alert'); 
  var class10  = validatenumber('sch_class10','sch_class10_alert'); 
  var class11  = validatenumber('sch_class11','sch_class11_alert'); 
  var class9   = validatenumber('sch_class9','sch_class9_alert'); 
  var class8   = validatenumber('sch_class8','sch_class8_alert'); 
  var class7   = validatenumber('sch_class7','sch_class7_alert'); 
  var class6   = validatenumber('sch_class6','sch_class6_alert'); 
  var class5   = validatenumber('sch_class5','sch_class5_alert'); 
  var class4   = validatenumber('sch_class4','sch_class4_alert'); 
  var class3   = validatenumber('sch_class3','sch_class3_alert'); 
  var class2   = validatenumber('sch_class2','sch_class2_alert'); 
  var class1   = validatenumber('sch_class1','sch_class1_alert'); 



  if(schemail == 0 || schmobile == 0 || class1 ==0 || class2 == 0 || class3 ==0 || class4 == 0 || class5 ==0 || class6 == 0 || class7 ==0 || class8 == 0 || class9 ==0 || class10 == 0 || class11 ==0 || class12 == 0   ){
    return false;
   }

   });    });

        </script>


    </body>

</html>