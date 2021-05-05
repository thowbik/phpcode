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
                                <div class="hor-menu">
                                    <ul class="nav navbar-nav">
                                         <ul class="nav navbar-nav">
										 
										 
										  <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'csr_admin_controller/CsrDash';?>" class="nav-link  ">
                                                      Home
                                                    </a>
                                                </li> 
										 
                                         <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'csr_admin_controller/csr_admin';?>">
                                                      Contribution Management
                                                    </a>
                                                </li> 
                                                 <li aria-haspopup="true" class=" ">
                                                    <a href="<?php echo base_url().'csr_admin_controller/csr_email_page';?>" >
                                                        Email Template
                                                    </a>
                                                </li> 
												 <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown ">
                                                        <a href="<?php echo base_url().'State/school_needs_csr';?>"> 
                                                         School Needs CSR Report
                                                            <span class="arrow"></span>
                                                       </a>
                                           
                                                 </li> 
												 
												 <li aria-haspopup="true" class="">
                                                    <a href="<?php echo base_url().'csr_admin_controller/csr_load_user';?>" class="nav-link  ">User Management</a>
                                                </li> 
                                        
                                      </ul>
                                    </ul>
                                      
                                      
                                       

                                       
										
										
									

										
                                

                                         
                                          
                                          
                                       
                                        

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
                <form method="post" id="att_form">
                    <input type="hidden" name="lid" value="tnpsdse">
                    <input type="hidden" name="lpw" value="d315d1fc2296fb9578235c89e55cc3cd">
                    <input type="hidden" name="lsc" value="1357">

                </form>
<script type="text/javascript">
        
   function bio_att()
    {
        $.post('https://aebas.tnschools.gov.in/aebasv1',$("#att_form").serialize(),function(data)
        {
                alert(data);
        })
    }
</script>
            </div>
