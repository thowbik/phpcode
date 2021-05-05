<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Attendance Report | Staff</title>
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
																<i class="fa fa-globe"></i>Facilities Report: <?php $school_name=$this->session->userdata('school_profile'); echo $this->session->userdata('emis_username').'-'.$school_name[0]['school_name'];?></span>
															</div>
															<div class="tools"> </div>
														</div>
														<div class="portlet-body">
															<table class="table table-striped table-bordered table-hover" id="sample_2">
																<thead>
																	<tr>
																		<th rowspan="3">S.No</th>
																		<th colspan="3" class="text-center" style="color:green;">Staff Toilets</th>
																		<th colspan="5" class="text-center" style="color:green;">Students Toilet</th>
																	</tr>
																	<tr>
																		<th>Total</th>
																		<th>Gents</th>
																		<th>Ladies</th>
																	
																		<th>Total</th>
																		<th>Boys</th>
																		<th>Girls</th>
																		<th>Functional</th>
																		<th>Non-Functional</th>
																	</tr>
                                                                </thead>
																<tbody>
																	<?php $i=1;																	
																	 foreach($facilities as $faci) {?>
																		<tr>
																			<td style="color:red;"><?php echo ($i); ?></td>
																			<td style="color:red;"><?php echo $faci['tottoilstaff']; ?></td>
																			<td style="color:red;"><?php echo $faci['staffgentstoil']; ?></td>
																			<td style="color:red;"><?php echo $faci['staffladiestoil']; ?></td>
																			<td style="color:red;"><?php echo $faci['tottoil']; ?></td>
																			<td style="color:red;"><?php echo $faci['bystottoil']; ?></td>
																			<td style="color:red;"><?php echo $faci['glstottoil']; ?></td>
																			<td style="color:red;"><?php echo $faci['totfun']; ?></td>
																			<td style="color:red;"><?php echo $faci['totnonfun']; ?></td>
																		</tr>
																	<?php $i++;} ?>
																</tbody>
															</table>
															
															
															<table class="table table-striped table-bordered table-hover" id="sample_2">
																<thead>
																	<tr>
																		<th rowspan="3">S.No</th>
																		<th colspan="3" class="text-center" style="color:green;">Staff Urinals</th>
																		<th colspan="5" class="text-center" style="color:green;">Students Urinals</th>
																	</tr>
																	<tr>
																		<th>Total</th>
																		<th>Gents</th>
																		<th>Ladies</th>
																	
																		<th>Total</th>
																		<th>Boys</th>
																		<th>Girls</th>
																		<th>Functional</th>
																		<th>Non-Functional</th>
																	</tr>
                                                                </thead>
																<tbody>
																	<?php $i=1;																	
																	 foreach($facilities as $faci) {?>
																		<tr>
																			<td style="color:red;"><?php echo ($i); ?></td>
																			<td style="color:red;"><?php echo $faci['toturnalstaff']; ?></td>
																			<td style="color:red;"><?php echo number_format($faci['urinal_gents_tot']); ?></td>
																			<td style="color:red;"><?php echo number_format($faci['urinals_tot_ladies']); ?></td>
																			<td style="color:red;"><?php echo $faci['toturi']; ?></td>
																			<td style="color:red;"><?php echo $faci['bystoturi']; ?></td>
																			<td style="color:red;"><?php echo $faci['glstoturi']; ?></td>
																			<td style="color:red;"><?php echo $faci['totfunuri']; ?></td>
																			<td style="color:red;"><?php echo $faci['totnonfunuri']; ?></td>
																		</tr>
																	<?php $i++;} ?>
																</tbody>
															</table>
															
															
															<table class="table table-bordered" style="table-border: 1px solid #000000;" id="sample_2">
																<thead>
																	<tr>
																		<th rowspan="2" >S.No</th>
																		<th colspan="2" class="text-center" style="color:green;">Drinking Water</th>
																		<th colspan="5" class="text-center" style="color:green;">Incinerator</th>
																	</tr>
																	<tr>
																		<th>Drinking Water</th>
																		<th>Drinking Water Types</th>
																	
																		<th>Incinerator</th>
																		<th>Auto Available</th>
																		<th>Auto Functional</th>
																		<th>Manual Available</th>
																		<th>Manual Functional</th>
																	</tr>
                                                                </thead>
																<tbody>
																	<?php $i=1;																	
																	 foreach($facilities as $faci) {?>
																		<tr>
																			<td style="color:red;"><?php echo ($i); ?></td>
																			<td style="color:red;"><?php echo $faci['drink']; ?></td>
																			<td style="color:red;"><?php echo $faci['drinktypes']; ?></td>
																			<td style="color:red;"><?php echo $faci['incinerator']; ?></td>
																			<td style="color:red;"><?php echo $faci['inci_auto_avail_no']; ?></td>
																			<td style="color:red;"><?php echo $faci['inci_auto_func_no']; ?></td>
																			<td style="color:red;"><?php echo $faci['inci_man_avail_no']; ?></td>
																			<td style="color:red;"><?php echo $faci['inci_man_func_no']; ?></td>
																		</tr> 
																	<?php $i++;} ?>
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