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
		
	</head>
	<!-- END HEAD -->

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
																	<i class="fa fa-globe"></i>Student Duplication Entry</span>
																</div>
																<div class="tools"> </div>
															</div>
															<div class="portlet-body">
																
																<table class="table table-striped table-bordered table-hover" id="sample_2">
																	<thead>
																		
																		<tr>
																			<th class="center">S.No</th>
																			<th>Name</th>
																			<th>District</th>
																			<th>Block</th>
																			<th>School & Udise</th>
																			<th>Father Name</th>
																			<th>Mother Name</th>
																			<th>DOB</th>
																			<th>Gender</th>
																			<th>Class</th>
																			<th>Section</th>
																			<th>Operation</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																			
																			$school_list = array();$key='unique_id_no';
																			foreach($studentremoval as $val) {
																					if(array_key_exists($key, $val)){
																						$school_list[$val[$key]][] = $val;
																					}else{
																						$school_list[""][] = $val;
																					}
																			}
																			$i=1;
																			foreach($school_list as $idx => $studremoval) {  ?>
																		<tr>
																			<td id="<?php echo $studremoval[0]['student_id'];?>" name="<?php echo $studremoval[0]['student_id'];?>"><?php echo ($i++); ?></td>
																			<td id="<?php echo($studremoval[0]['photo']); ?>"><a onclick="modalpopup(this.parentNode,1);"><?php echo $studremoval[0]['student_name'].'-'.$studremoval[0]['unique_id_no'];?></a></td>
																			<td><?php echo $studremoval[0]['district_name'];?></td>
																			<td><?php echo $studremoval[0]['block_name'];?></td>
																			<td><?php echo $studremoval[0]['udise_code'].'-'.$studremoval[0]['school_name'];?></td>
																			<td><?php echo $studremoval[0]['father_name'];?></td>
																			<td><?php echo $studremoval[0]['mother_name'];?></td>
																			<td><?php echo date('d/m/Y',strtotime($studremoval[0]['dob']));?></td>
																			<td><?php echo ($studremoval[0]['gender']==1?"MALE":($studremoval[0]['gender']==2?"FEMALE":($studremoval[0]['gender']==3?"TRANSGENDER":"NO DATA")));?></td>
																			<td><?php echo $studremoval[0]['class_studying_id'];?></td>
																			<td><?php echo $studremoval[0]['class_section'];?></td>
																			<td><?php 
																			foreach($studremoval as $remov){
																			if($remov['rmk']==1) { ?><span><?php echo $remov['remarks'];?></span><a onclick="updatestudlist(this.parentNode.parentNode.children[0]);" class="btn btn-danger">Remove</a><?php } } ?></td>
																		</tr>
																		<?php } ?>
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
		
		<!-- The Modal -->
		<div id="myModal" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
					<div class="modal-header bg-success">
						<h4 style="float:left;"><strong>Student Information</strong></h4>
						<span style="font-size: 28px;font-weight: bold;cursor: pointer; float:right;" onclick="modalpopup('',0);">&times;</span>
					</div>
                    <div class="modal-body" style="width:100%;">
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-4">
									<img id="stu_photo" src="<?php echo base_url().'asset/images/unknown.jpg'?>" alt="" width="120" height="160">
								</div>
								<div class="col-md-8">
									<p id="uniq_id" style="font-size:20px;margin:0;padding:0;">Unique Id</p>
									<p style="margin:0;padding:3px 0;" id="stud_name" ><strong >Name</strong></p>
									<p style="margin:0;padding:3px 0;" id="stud_dob"><strong >DOB</strong></p>
									<p style="margin:0;padding:3px 0;" id="stud_father"><strong >Father Name</strong></p>
									<p style="margin:0;padding:3px 0;" id="stud_mother"><strong >Mother Name</strong></p>
									<p style="margin:0;padding:0;" id="stud_cls"><strong >Class & Section</strong></p>
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
			var baseurl='<?php echo(base_url()); ?>';
			function modalpopup(pNode,disp){
				var phURL="<?php echo base_url().'asset/images/unknown.jpg'?>";
				if(pNode!=""){
					document.getElementById("stu_photo").setAttribute("src",phURL);
					var idx = Array.prototype.indexOf.call(pNode.parentNode.children,pNode);
					if(pNode.id!=""){
						$.ajax({
							type: "POST",
							url:baseurl+'Home/get_aws_s3_image',
							data:"&records="+('Students_emis/'+pNode.id),
							success: function(resp){ 
								var js=JSON.parse(resp);
								phURL=js;
								document.getElementById("stu_photo").setAttribute("src",phURL);
							}
						});
					}
				}
				if(disp==1){
					
					document.getElementById("uniq_id").innerHTML=pNode.parentNode.children[idx].children[0].innerHTML;
					document.getElementById("stud_name").innerHTML=pNode.parentNode.children[idx+1].innerHTML;
					document.getElementById("stud_dob").innerHTML=pNode.parentNode.children[idx+4].innerHTML;
					document.getElementById("stud_father").innerHTML=pNode.parentNode.children[idx+2].innerHTML;
					document.getElementById("stud_mother").innerHTML=pNode.parentNode.children[idx+3].innerHTML;
					document.getElementById("stud_cls").innerHTML=pNode.parentNode.children[idx+6].innerHTML + '/' + pNode.parentNode.children[idx+7].innerHTML;
					document.getElementById('myModal').style.display="block";
				}else{
					document.getElementById('myModal').style.display="none";
				}
			}
			
			function updatestudlist(node){
				var stud=new Object();
				stud['dupstud']=node.id;
				$.ajax({
					type: "POST",
                    url:baseurl+'AllApprove/RemovalStudent',
                    data:"&dupstud="+JSON.stringify(stud),
                    success: function(resp){ 
						swal({
							title: "Duplication Student Removed",
							text: "Removed successfully",
							type: "success",
							confirmButtonColor: "#DD6B55",
							confirmButtonText: "OK",
							closeOnConfirm: false
						}, function(isConfirm){
						if (isConfirm) 
							window.location.reload();
						});	
                    }
                });
			}
		</script>
	</body>
	
</html>