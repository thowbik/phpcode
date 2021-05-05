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
                                            <small><b>DGE Details</b></small>
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

                                     <div class="portlet-body">
										<div class="portlet-body">
										<div class="portlet light">
										<div class="row">
											<div class="col-md-12">
												<!--<center> <h2>Enrollment in current year - 2019</h2></center>-->

												<a  onclick="saveclassid(1)">
													<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
														<div class="dashboard-stat2 ">
															<div class="display">
																<div class="number">
																	<h3 class="font-green-sharp">
																		<span data-counter="counterup" data-value="34"><?php if(!empty($countdge)){  foreach($countdge as $det){}} ?>
																		<?php echo number_format($det->tenth); ?>
																		</span>
                                                               
																	</h3>
																	<!--<small class="font-purple">Total Teacher Count</small>-->
																</div>
																<div class="icon">
																	<i class="icon-pie-chart"></i>
																</div>
															</div>
															<div class="progress-info">
																<!--  <div class="progress">
																<span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                                                <span class="sr-only">76% progress</span>
																</span>
																</div> -->
																<div class="status">
																	<div class="status-title">OVERALL STUDENT COUNT 10TH</div>
																	<!-- <div class="status-number"> 76% </div> -->
																</div>
															</div>
														</div>
													</div>
												</a>
												<a  onclick="saveclassid(2)">

													<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
														<div class="dashboard-stat2 ">
															<div class="display">
																<div class="number">
																	<h3 class="font-green-sharp">
																		<span data-counter="counterup" data-value="34"><?php if(!empty($countdge)){  foreach($countdge as $det){}} ?>
																		<?php echo number_format($det->eleven); ?>
																		</span>
                                                               
																	</h3>
																	<!--<small class="font-purple">Total Teacher Count</small>-->
																</div>
																<div class="icon">
																	<i class="icon-pie-chart"></i>
																</div>
															</div>
															<div class="progress-info">
																<!--  <div class="progress">
																	<span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                                                <span class="sr-only">76% progress</span>
																</span>
																</div> -->
																<div class="status">
																	<div class="status-title">OVERALL STUDENT COUNT 11TH</div>
																	<!-- <div class="status-number"> 76% </div> -->
																</div>
															</div>
														</div>
													</div>
												</a>

												<a  onclick="saveclassid(3)">

													<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
														<div class="dashboard-stat2 ">
															<div class="display">
																<div class="number">
																	<h3 class="font-green-sharp">
																		<span data-counter="counterup" data-value="34"><?php if(!empty($countdge)){  foreach($countdge as $det){}} ?>
																		<?php echo number_format($det->twelve); ?>
																		</span>
                                                               
																	</h3>
																	<!--<small class="font-purple">Total Teacher Count</small>-->
																</div>
																<div class="icon">
																	<i class="icon-pie-chart"></i>
																</div>
															</div>
															<div class="progress-info">
																<!--  <div class="progress">
																<span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
																<span class="sr-only">76% progress</span>
																</span>
																</div> -->
																<div class="status">
																	<div class="status-title">OVERALL STUDENT COUNT 12TH</div>
																	<!-- <div class="status-number"> 76% </div> -->
																</div>
															</div>
														</div>
													</div>
												</a>


												<a  onclick="saveclassid(4)">

													<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
														<div class="dashboard-stat2 ">
															<div class="display">
																<div class="number">
																	<h3 class="font-green-sharp">
																		<span data-counter="counterup" data-value="34"><?php if(!empty($get_teacherdetails)){  foreach($get_teacherdetails as $det){}} ?>
																		<?php echo number_format($det->schoolcount); ?>
																		</span>
                                                               
																	</h3>
																	<!--<small class="font-purple">Total Teacher Count</small>-->
																</div>
																<div class="icon">
																	<i class="icon-pie-chart"></i>
																</div>
															</div>
															<div class="progress-info">
																<!--  <div class="progress">
																<span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
																<span class="sr-only">76% progress</span>
																</span>
																</div> -->
																<div class="status">
																	<div class="status-title">OVERALL SCHOOL COUNT</div>
																	<!-- <div class="status-number"> 76% </div> -->
																</div>
															</div>
														</div>
													</div>
												</a>
											</div>
											</div>
											</div>
											</div>
											
											<div class="portlet-body">
                                                <div class="row">
											
											<div class="col-md-12">
											<div class="portlet box green">
                                            <div class="portlet-title">
                                               <div class="caption">
                                                <i class="fa fa-globe"></i>DGE Details - All District</div>
                                                <div class="tools"> </div>
                                            </div>
                                            <div class="portlet-body"> 
												<div class="table-scrollable">
                                                <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                    <thead>
														<tr>
															<th>District</th>                        
                                                            <th>Student - 10th</th>
															<th>Student - 11th</th>
															<th>Student - 12th</th>
															<th>Student - School</th>
                                                                   
                                                        </tr>
                                                    </thead>
													<tbody>
														<?php if(!empty($countdistrictdge)){ foreach($countdistrictdge as $det){ ?>
														<tr>
                                                           <td><a onclick="savedistrictid('<?php echo $det->id; ?>')">
															<?php echo $det->district_name; ?></td></a>
                                                            <td> <?php echo number_format($det->tenth); ?></td>
															<td> <?php echo number_format($det->eleven); ?></td>
															<td> <?php echo number_format($det->twelve); ?></td>
															<td> <?php echo number_format($det->schoolcount); ?></td>
                                                        </tr>
                                                        <?php } } ?>
                                                      
                                                    </tbody>
                                                </table>
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
        <script src="<?php echo base_url().'asset/js/state.js';?>" type="text/javascript"></script>

        <script type="text/javascript">
            /*function saveclassid(value){
                var baseurl='<?php echo base_url(); ?>';
                // alert(value);
                $.ajax({
                type: "POST",
                url:baseurl+'State/savedash_classidsession',
                data:"&class_id="+value,
                success: function(resp){ 
                if(resp==true){  
                window.location.href = baseurl+'State/emis_teacher_list'; 
                return true;  
                 }else{
                    return false;
                 }
                 
                         
                 },
                error: function(e){ 
                alert('Error: ' + e.responseText);
                return false;  

                }
                });
               }*/
        </script>

    </body>

</html>