<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL STYLES -->
    
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

  <?php $this->load->view('state/header.php'); ?>

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
                                        <h1>Dashboard
                                            <small>Enrollment in Current year</small>
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
                               
                                       <div class="row">
                                        <div class="col-md-12">
										<div class="col-md-2">
										<div class="">
										<!--<div class="dashboard-stat2">
										                    
											<h4 class="glyphicon glyphicon-user"><b>STUDENT COUNT</b></h4>
											<hr>
										
										<div class="dashboard-content">
                            
										<h4>Govt - Total</h4>
										<h4>Aided - Total</h4>
										<h4>UnAided - Total</h4>
										
										</div>
										</div>-->
										</div>
										
										
										</div>
												
										 <div class="col-md-10">
										 
										 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="dashboard-stat2 ">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h4 class="font-green-sharp"><span class="glyphicon glyphicon-user"></span>STUDENT COUNT
                                                            </h4>
															<hr>
															<?php  foreach($total1 as $det){}?>
                                                            <small class="font-purple"> Govt - <a href="<?php echo base_url().'State/emis_student_classwise';?>"><?php echo $det->total; ?></a></small>
                                                        </div>
                                                        <div class="icon">
                                                            <!--<i class="icon-pie-chart"></i>-->
                                                        </div>
                                                    </div>
                                                    <div class="progress-info">
                                                       <!--  <div class="progress">
                                                            <span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                                                <span class="sr-only">76% progress</span>
                                                            </span>
                                                        </div> -->
                                                        <div class="status">
                                                            <div class="status-title">OVERALL STUDENT COUNT</div>
                                                            <!-- <div class="status-number"> 76% </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
										 
										 
										 
										 
										 
										 
										 
										
										
										<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
										<div class="dashboard-stat2">
										              
											<p style="font-size:15px;"><span class="glyphicon glyphicon-user"></span><b>STUDENT COUNT</b></p>
											<hr>
										
										
										
										<?php  foreach($total1 as $det){}?>
										
										<p> Govt - <a href="<?php echo base_url().'State/emis_student_classwise';?>"><?php echo $det->total; ?></a></p> 
										
										<p>Aided - <a href="<?php echo base_url().'State/emis_student_classwise';?>"><?php echo $det->school_id; ?></a></p>
										<p>UnAided - <a href="<?php echo base_url().'State/emis_student_classwise';?>"><?php echo $det->school_id; ?></a></p>
										<p>FullyAided - <a href="<?php echo base_url().'State/emis_student_classwise';?>"><?php echo $det->school_id; ?></a></p>
										<p>Total - <a href="<?php echo base_url().'State/emis_student_classwise';?>"><?php echo $det->total; ?></a></p>
										
										</div>
										</div>
										
										
										
										
										
										
										
										
										<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
										<div class="dashboard-stat2">
										              
											<p style="font-size:15px;"><span class="glyphicon glyphicon-user"></span><b>TEACHER COUNT</b></p>
											<hr>
										
										
                            
										<p> Govt - <a href="<?php echo base_url().'State/emis_teacher_details';?>"><?php echo $det->total; ?></a></p> 
										
										<p>Aided - <a href="<?php echo base_url().'State/emis_teacher_details';?>"><?php echo $det->school_id; ?></a></p>
										<p>UnAided - <a href="<?php echo base_url().'State/emis_teacher_details';?>"><?php echo $det->school_id; ?></a></p>
										<p>FullyAided - <a href="<?php echo base_url().'State/emis_teacher_details';?>"><?php echo $det->school_id; ?></a></p>
										<p>Total - <a href="<?php echo base_url().'State/emis_teacher_details';?>"><?php echo $det->school_id; ?></a></p>
										
										
										</div>
										</div>
										
										
										<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
										<div class="dashboard-stat2">
										              
											<p style="font-size:15px;"><span class="glyphicon glyphicon-user"></span><b>Attendance</b></p>
											<hr>
										
										
                            
										<p> Total No of Absentise - <a href="<?php echo base_url().'State/emis_student_classwise';?>"><?php echo $det->total; ?></a></p> 
										<p>Date:</p>
										
										<p>Top 5 Absentise - <a href="<?php echo base_url().'State/emis_student_classwise';?>"><?php echo $det->school_id; ?></a></p>
																			
										
										</div>
										</div>
										
										
										<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
										<div class="dashboard-stat2">
										              
											<p style="font-size:15px;"><span class="glyphicon glyphicon-user"></span><b>Renewal</b></p>
											<hr>
										
										
                            
										<p> Total No of Application Applied - <a href="<?php echo base_url().'State/emis_student_classwise';?>"><?php echo $det->total; ?></a></p> 
										<p>Date:</p>
										
										<p>Top 5 Absentise - <a href="<?php echo base_url().'State/emis_student_classwise';?>"><?php echo $det->school_id; ?></a></p>
																			
										
										</div>
										</div>
										
										
										
										
										
										</div>
										
										
										
										
										
										
										</div>
										</div>	
										
										
										
								
                                    <!-- END PAGE CONTENT INNER -->
                                
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
        <!--<script src="<?php echo base_url().'asset/js/state.js';?>" type="text/javascript"></script>-->

        </body>

</html>