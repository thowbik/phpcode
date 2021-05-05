<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>

        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
		<link href="<?php echo base_url().'asset/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css';?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url().'asset/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css';?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
		
		<style>
			body {font-family: Arial, Helvetica, sans-serif;}

		/* The Modal (background) */
		.modal {
		  display: none; /* Hidden by default */
		  position: fixed; /* Stay in place */
		  z-index: 1; /* Sit on top */
		  padding-top: 100px; /* Location of the box */
		  left: 0;
		  top: 0;
		  width: 100%; /* Full width */
		  height: 100%; /* Full height */
		  overflow: auto; /* Enable scroll if needed */
		  background-color: rgb(0,0,0); /* Fallback color */
		  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content {
		  background-color: #fefefe;
		  margin: auto;
		  padding: 20px;
		  border: 1px solid #888;
		  width: 80%;
		}

		/* The Close Button */
		.close {
		  color: #aaaaaa;
		  float: right;
		  font-size: 28px;
		  font-weight: bold;
		}

		.close:hover,
		.close:focus {
		  color: #000;
		  text-decoration: none;
		  cursor: pointer;
		}
		</style>
		
	</head>
	<!-- END HEAD -->

	<body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            <?php if($this->session->userdata('user_type')==5){ 
				$this->load->view('state/header.php');
				}elseif($this->session->userdata('user_type')==9){
					$this->load->view('Ceo_District/header.php');
				}elseif($this->session->userdata('user_type')==10){
					$this->load->view('Deo_District/header.php');
				}elseif($this->session->userdata('user_type')==6){
					$this->load->view('beo_Block/header.php');
				}elseif($this->session->userdata('user_type')==2){
					$this->load->view('block/header.php');
				}  ?>
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
										<h1>Duplication List</h1>
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
										<div class="row">
											<div class="portlet-body">
												<div class="row">
													<div class="col-md-12">
														<!-- BEGIN EXAMPLE TABLE PORTLET-->
														<div class="portlet box green">
															<div class="portlet-title">
																<div class="caption">
																	<i class="fa fa-globe"></i>Student Duplication Finder</span>
																</div>
																<div class="tools"> </div>
															</div>
															<div class="portlet-body">
																
																<table class="table table-striped table-bordered table-hover" id="sample_2">
																	<thead>
																		
																		<tr>
																			<th class="center">S.No</th>
																			<th>Name</th>
																			
																			<th>Total School</th>
																			
																			<th>Total Student count</th>
																			<th>Total Duplication count</th>
																			
																			
																			
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																			$stud=array();
																			$groupname = array();
																			$key=$group['group'];
																			foreach($stulist as $val) {
																				if(array_key_exists($key, $val)){
																					$groupname[$val[$key]][] = $val;
																				}else{
																					$groupname[""][] = $val;
																				}
																			}
																			$i=1; foreach($groupname as $studentlist) { ?>
																		<tr>
																			<td><?php echo($i++);?></td>
																			<td>
																				<?php if($group['next']!=''){ ?>
																				<a href="<?php echo base_url().'AllApprove/get_duplicationlist/'.$this->uri->segment(3,0).'/'.$studentlist[0][$group['group']].'/'.$group['next'];?>">
																				<?php } echo $studentlist[0][$group['groupname']];?>
																				</a>
																			</td>
																		
																			<td><?php echo $studentlist[0]['total']; $total[0]+=$studentlist[0]['total'];?> </td>
																			
																			<td><?php echo $studentlist[0]['totalstudent']; $total[1]+=$studentlist[0]['totalstudent'];?></td>
																			<td><?php echo $studentlist[0]['duplicatecount']; $total[2]+=$studentlist[0]['duplicatecount'];?></td>
																		</tr>
																		<?php } ?>
																	</tbody>
																	<tfoot>
																		<tr>
																			<td colspan="2">Total</td>
																			<?php foreach($total as $tot){?>
																			<td><?php echo $tot; ?></td>
																			<?php } ?>
																			
																		</tr>
																	</tfoot>
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
		
	</body>
	
</html>