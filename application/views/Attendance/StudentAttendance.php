<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Attendance Report | Student</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
		<link rel="shortcut icon" href="<?php echo base_url().'asset/images/favicon.ico';?>" /> 
		<link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
	<?php $this->load->view('head.php'); ?>
	
	
</head>

<body class="page-container-bg-solid page-md">
	<div class="page-wrapper">
		<?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
        <?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
        <?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 9) { ?>
        <?php $this->load->view('Ceo_District/header.php'); }else if($this->session->userdata('emis_user_type_id') == 6) { ?>
        <?php $this->load->view('beo_Block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 10) { ?>
        <?php $this->load->view('Deo_District/header.php'); }else{ ?>
        <?php $this->load->view('header.php'); }?>
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
									<div class="portlet-body">
										<div class="row">
											<form action="<?php echo base_url().'Attendance/studentlist/'; ?>" method="post">
												<div class="col-md-5">
													<div>
														<i class="icon-settings font-dark"></i> 
														<label><b>From Date</b></label> 
													</div>
													<input type="date" class="form-control" name="fromdate" id="fromdate" max="<?php echo date('Y-m-d',strtotime("now")); ?>"/>
												</div>
												<div class="col-md-5">
													<div>
														<i class="icon-settings font-dark"></i> 
														<label><b>To Date</b></label> 
													</div>	
													<input type="date" class="form-control" name="todate" id="todate" max="<?php echo date('Y-m-d',strtotime("now")); ?>"/>
												</div>
												<div class="col-md-2">
													<div>
														<p></p>
													</div>
													<button class="btn btn-primary" name="list">Search</button>
												</div>
											</form>
										</div>
									</div>
                                </div>
                                <!-- END PAGE TITLE -->
                                <!-- BEGIN PAGE TOOLBAR -->
                                <div class="page-toolbar"></div>
							</div>
						</div>
						<!-- END PAGE HEAD-->
                        <!-- BEGIN PAGE CONTENT BODY -->
                        <div class="page-content">
							<div></div>
							<div class="container">
                              <!-- BEGIN PAGE CONTENT INNER -->
                               <div class="page-content-inner">
									<div class="row">
										<div class="portlet-body">
                                            <div class="row">
                                                <div class="col-md-12">
													<!-- BEGIN EXAMPLE TABLE PORTLET-->
													<div class="portlet box green">
														<div class="portlet-title">
															<div class="caption">
																<i class="fa fa-globe"></i>Student Attendance - Classwise: <?php echo date('d/m/Y',strtotime($_SESSION['frdate'])).' TO '.date('d/m/Y',strtotime($_SESSION['todate'])); ?></span>
															</div>
															<div class="tools"> </div>
														</div>
														<div class="portlet-body">
															<table class="table table-striped table-bordered table-hover" id="sample_2">
																<thead>
																	<tr>
																		<th class="center">S.No</th>
																		<th>Class</th>
																		<th>Total Students</th>
																		<!--<th>Present</th>
																		<th>Absent</th>-->
																		<th>Present%</th>
																		<!--<th>Absent%</th>-->
																	</tr>
                                                                </thead>
																<tbody>
																	<?php $i=1; foreach($studentlist as $classlist) {?>
																	 
																		<tr>
																			<td><?php echo $i; ?></td>
																			<td><a href="<?php echo base_url().'Attendance/classwiselist/'.$classlist['st_class'].'/'.$classlist['st_section'].'/'; ?>"><?php echo $classlist['class']; ?></a></td>
																			<td><?php echo $classlist['totalstudents']; ?></td>
																			<td style="color:green;"><?php echo $classlist['perpresent']; ?></td>
																			<!--<td style="color:red;"><?php //echo $classlist['perabsent']; ?></td>-->
																		</tr>
																	<?php $i++; } ?>
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view('footer.php'); ?>
	<?php $this->load->view('scripts.php'); ?>	
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	
    <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
    <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
	<script>
	</script>
</body>

</html>