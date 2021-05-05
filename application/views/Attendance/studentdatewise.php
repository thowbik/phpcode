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
	<style>
		.card{
			box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
			transition: 0.3s;
			width: 10%;
			border-radius: 5px;
			height: 84px;
			display: inline-block;
		}
		.P{background-color:green;color:#fff;}
		.A{background-color:red;color:#fff;}
	</style>
	
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
									<span style="font-size:1.5em;background-color:lightblue;float:left;"><?php echo 'ID:'.$stud[0]['unique_id_no'].'<br/>Name:'.$stud[0]['name'].'<br/> Class and Section:'.$stud[0]['class'];?>
									</span>
                                </div>
								<div style="float:right;margin:25px 3px;">
									<span><i style="background-color: #ff0000;padding:1px 10px;border: 1px solid #ff0000;margin:0 5px">A</i><b>Absent</b>
									</span>
								</div>
								<div style="float:right;margin:25px 3px;">
									<i style="background-color: #008000;padding:1px 10px;border: 1px solid #008000;margin:0 5px;font-color:white;">P</i><b>Present</b>
								</div>
								<div style="float:right;margin:25px 3px;">
									<i style="background-color: #add8e6;padding:1px 10px;border: 1px solid #add8e6;margin:0 5px">H</i><b>Hoilday</b>
								</div>
                                <!-- END PAGE TITLE -->
                                <!-- BEGIN PAGE TOOLBAR -->
                                <div class="page-toolbar"></div>
							</div>
						</div>
						<!-- END PAGE HEAD-->
                        <!-- BEGIN PAGE CONTENT BODY -->
						<?php 
							$fdate=$stud[0]['rdate']; 
							$exdt=explode('-',$fdate);
							$exdt[2]=1;
							$fdate=implode('-',$exdt);
							
							
							
							$ldate=$stud[count($stud)-1]['rdate'];
							$exdt=explode('-',$ldate);
							$exdt[2]=date('t',strtotime($ldate));
							$ldate=implode('-',$exdt);
							
							$fm=date("Y-m-d",strtotime($fdate));
							$i=1;$ins=0;$z=0;
							for($cre=$fm;date("Y-m-d",strtotime($cre))<=date("Y-m-d",strtotime($ldate));$cre=date("Y-m-d",strtotime($fm."+ ".($i++)." Day"))){
								$ins=0;
								if(!empty($aldate)){
									foreach($aldate as $all){
										if(date("m-Y",strtotime($all))==date("m-Y",strtotime($cre))){
											$ins=1;
										}
									}
								}
								if($ins==0){
									$aldate[$z++]=$cre;
								}
							}
							
							//print_r($aldate);
							
							//$aldate=[0 => $fdate, 1 => $ldate];
						?>
                        <div class="page-content">
							<div></div>
							<div class="container">
                              <!-- BEGIN PAGE CONTENT INNER -->
                               <div class="page-content-inner">
									<div class="row">
										<div class="portlet-body text-center" style="height:400px;overflow-y:scroll;">
											<?php foreach($aldate as $dt){ $lastdate=date('t',strtotime($dt)); $datefix=1; ?>
											<div class="col-md-12">
												<h3><?php echo(date('M,Y',strtotime($dt))); ?></h3>
												<?php for($row=0;$row<date('t',strtotime($dt))/7;$row++){ ?>
												<div class="col-md-12">
													<?php for($col=1;($col<=7&&$lastdate!=0);$col++,$lastdate--){ $chk=1; ?>
													<div class="card">
												<h5 style="text-align:center;"><b><?php 
												$daycl=date('Y-m-',strtotime($dt)).$datefix;
												echo(date('D',strtotime($daycl))); ?></b></h5> 
														<p style="text-align:center;"><?php echo($datefix++); ?>
														<br><?php foreach($stud as $st){ if(date('Y-m-d',strtotime($st['rdate']))==date('Y-m-d',strtotime($daycl))){echo($st['abstatus']=='P'?'<span class="'.$st['abstatus'].'">PRESENT</span>':($st['abstatus']=='A'?'<span class="'.$st['abstatus'].'">ABSENT</span>':'')); $chk=0;} } 
														
														if($chk && date('Y-m-d',strtotime($daycl))<=date('Y-m-d',strtotime("now"))){echo('----');} ?>
														</p> 
													</div>
													<?php } ?>
												</div>
												<?php } ?>
											</div>
											<?php } ?>
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