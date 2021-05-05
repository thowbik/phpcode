<br /><div class="page-wrapper-row">
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
						<?php
						$type =$this->session->userdata('emis_user_type_id');
	 $usertype = $this->session->userdata('user_type');
						$header_menu = Common::emis_dynamic_header($type,$usertype);
						// echo"<pre>";print_r($header_menu);echo"</pre>";
            if(!empty($header_menu))
		    {			
		
						 ?>
						
						
                        <div class="page-header-menu">
                            <div class="container">
     
                                <!-- BEGIN MEGA MENU -->
                               <div class="hor-menu  ">
							   <?php foreach($header_menu as $menu){?>
                                    <ul class="nav navbar-nav">
                                        <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown ">
                                            <a href="<?=base_url().$menu->link;?>"> 
                                            <i class="fa fa-user"></i> <?=$menu->description;?>
                                                <span class="arrow"></span>
                                            </a>
											<?php if($menu->link=='#'){
												$level_child_one = $menu->level2;
												
												
												?>
												
                                              <ul class="dropdown-menu pull-left" style="width: 250px;">
                                              <?php foreach($level_child_one as $child_one){
												  
													if($child_one->link!="#"){
												  ?>
                                                 <li aria-haspopup="true" class=" ">
                                                    <a href="<?=base_url().$child_one->link;?>" class="nav-link  ">
                                                        <?=$child_one->description;?>
                                                    </a>
													</li>
													<?php }else{ ?>
														<li aria-haspopup="true" class="dropdown-submenu">
														<a href="<?php echo base_url();?>" class="nav-link  ">Academic Records</a>
														<?php $level_child_two = $child_one->level3;
															
														?>
                                                    <ul class="dropdown-menu">
														<?php foreach($level_child_two as $child_two){?>
														<li aria-haspopup="true" class="">
															<a href="<?php echo base_url().$child_two->link;?>" class="nav-link  "><?=$child_two->description;?></a>
														</li>
														<?php } ?>
													</ul>
                                                </li>
													<?php } ?>
                                                 
                                                 
											  <?php } ?>
                                            </ul>
                                        </li> 
												<?php  }else{?>
											</li><?php }?>
										
								 </ul>
							   <?php } ?>
                               </div>								 
                                <!-- END MEGA MENU -->
                            </div>
                        </div>
			<?php } ?>
                        <!-- END HEADER MENU -->
                    </div>
                    <!-- END HEADER -->
                </div>
            </div>