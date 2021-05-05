<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    
 
        <!-- BEGIN PAGE LEVEL PLUGINS -->

        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />



        <?php $this->load->view('head.php'); ?>

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
                                            <small><b>Government Non-Teacher Details</b></small>
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
											<div class="portlet light">
                                                <div class="row">

													<div class="col-md-12">
														<!--<center> <h2>Enrollment in current year - 2019</h2></center>
														-->
															<!--saveclassid(1)-->
														<a  onclick="">
															<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
															<div class="dashboard-stat2 ">
															<div class="display">
																<div class="number">
																	<h3 class="font-green-sharp">
																		<span data-counter="counterup" data-value="34"><?php if(!empty($get_teacherdetails)){  foreach($get_teacherdetails as $det){}} ?>
																		<?php echo number_format($det->Govteacher); ?>
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
																	<div class="status-title">OVERALL Non TEACHER COUNT GOVERNMENT</div>
																	<!-- <div class="status-number"> 76% </div> -->
																</div>
															</div>
															</div>
															</div>
														</a>
														<!--saveclassid(2)-->
														<a  onclick="">

															<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
															<div class="dashboard-stat2 ">
															<div class="display">
																<div class="number">
																	<h3 class="font-green-sharp">
																		<span data-counter="counterup" data-value="34"><?php if(!empty($get_teacherdetails)){  foreach($get_teacherdetails as $det){}} ?>
																		<?php echo number_format($det->JUNIOR_ASSISTANT); ?>
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
																	<div class="status-title">OVERALL TEACHER COUNT JA</div>
																	<!-- <div class="status-number"> 76% </div> -->
																</div>
															</div>
															</div>
															</div>
														</a>
														<!--saveclassid(3)-->
														<a  onclick="">

															<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
															<div class="dashboard-stat2 ">
																<div class="display">
																<div class="number">
																	<h3 class="font-green-sharp">
																		<span data-counter="counterup" data-value="34"><?php if(!empty($get_teacherdetails)){  foreach($get_teacherdetails as $det){}} ?>
																		<?php echo number_format($det->LAB_ASSISTANT); ?>
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
																	<div class="status-title">OVERALL TEACHER COUNT LAB ASSISTANT</div>
																	<!-- <div class="status-number"> 76% </div> -->
																</div>
																</div>
															</div>
															</div>
														</a>

                                                                    <a  onclick="">

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat2 ">
                <div class="display">
                <div class="number">
                    <h3 class="font-green-sharp">
                        <span data-counter="counterup" data-value="34"><?php if(!empty($get_teacherdetails)){  foreach($get_teacherdetails as $det){}} ?>
                        <?php echo number_format($det->LIBRARIAN); ?>
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
                    <div class="status-title">OVERALL TEACHER COUNT LIBRARIAN</div>
                    <!-- <div class="status-number"> 76% </div> -->
                </div>
                </div>
            </div>
            </div>
            </a>

             <a  onclick="">

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="dashboard-stat2 ">
<div class="display">
<div class="number">
<h3 class="font-green-sharp">
<span data-counter="counterup" data-value="34"><?php if(!empty($get_teacherdetails)){  foreach($get_teacherdetails as $det){}} ?>
<?php echo number_format($det->OFFICE_ASSISTANT); ?>
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
<div class="status-title">OVERALL TEACHER COUNT OFFICE ASSISTANT</div>
<!-- <div class="status-number"> 76% </div> -->
</div>
</div>
</div>
</div>
</a>

														<!--saveclassid(4)-->
														<!-- <a  onclick="">

															<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
																<div class="dashboard-stat2 ">
																<div class="display">
																<div class="number">
																	<h3 class="font-green-sharp">
																		<span data-counter="counterup" data-value="34"><?php if(!empty($get_teacherdetails)){  foreach($get_teacherdetails as $det){}} ?>
																		<?php echo number_format($det->PGteacher); ?>
																		</span>
                                                               
																	</h3>
																	<!--<small class="font-purple">Total Teacher Count</small>
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
																</div> 
																<div class="status">
																	<div class="status-title">OVERALL TEACHER COUNT PG</div>
																	<!-- <div class="status-number"> 76% </div> 
																</div>
															</div>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>
										</div>
									</a> -->
									
									
									 
										<div class="portlet-body">
                                           
                                            <div class="row">
											
												<div class="col-md-12">
													<div class="portlet box green">
														<div class="portlet-title">
																<div class="caption">
																<i class="fa fa-globe"></i>Government Teacher Details - District wise</div>
																<div class="tools"> </div>
															</div>
															<div class="portlet-body">
															<?php $Govteacher=0;$BTteacher=0;$SGteacher=0;$PGteacher=0; ?>
															
															<table class="table table-striped table-bordered table-hover" id="sample_3">
															<thead>
															<tr>
															<th>District</th>                        
                                                            <th>Government - Teacher</th>
															<th>JUNIOR ASSISTANT</th>
															<th>LAB ASSISTANT</th>
															<th>LIBRARIAN</th>
															<th>OFFICE ASSISTANT</th>
                                                                   
															</tr>
															</thead>
															<tbody>
															<?php if(!empty($teacherdistrictdetails)){ $total1 = 0; foreach($teacherdistrictdetails as $det){ 
                                                            $total = $det->Govteacher + $det->JUNIOR_ASSISTANT + $det->LAB_ASSISTANT + $det->LIBRARIAN + $det->OFFICE_ASSISTANT; 
                                                                // print_r($teacherdistrictdetails);
                                                            ?>
															<tr>
                                                           <td>
															<?php echo $det->district_name; ?></td>
                                                            <td> <?php echo number_format($det->Govteacher); ?></td>
															<td> <?php echo number_format($det->JUNIOR_ASSISTANT); ?></td>
															<td> <?php echo number_format($det->LAB_ASSISTANT); ?></td>
															<td> <?php echo number_format($det->LIBRARIAN); ?></td>
															<td> <?php echo number_format($det->OFFICE_ASSISTANT); ?></td>
															</tr>
															<?php  $total1 = $total1 + $total; } } ?>
                                                      
														</tbody>
                                                        <tfoot>
            <tr>
                <th style="text-align:right">Total:</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                
            </tr>
        </tfoot>
														</table>
																							 
														</div>
													</div>
												</div>
											
											</div>
											
                                        </div>
                                  
										<!-- END PAGE CONTENT INNER -->	
																	
									</div>
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
			function savedistrictid(value){
              var baseurl='<?php echo base_url(); ?>';
                //alert(value);
                $.ajax({
                type: "POST",
                url:baseurl+'State/savedistrictidsession',
                data:"&dist_id="+value,
                success: function(resp){ 
                if(resp==true){  
                window.location.href = baseurl+'State/emis_teacher_classwise_district'; 
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
            }
        </script>
		<!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
		
		 <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url().'asset/global/plugins/amcharts/amcharts/amcharts.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/amcharts/amcharts/serial.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/amcharts/amcharts/themes/light.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/amcharts/amcharts/themes/patterns.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->

    </body>
    <script>
    $(document).ready(function() {
    $('#sample_3').DataTable( {
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column(1 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column(1, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column(1 ).footer() ).html(
                pageTotal + (' (TP '+total+')')
            );
            
            total = api
                .column(2 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column(2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column(2 ).footer() ).html(
                pageTotal + (' (TP '+total+')')
            );
            
            total = api
                .column(3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column(3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column(3 ).footer() ).html(
                pageTotal + (' (TP '+total+')')
            );

            total = api
                .column(4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column(4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column(4).footer() ).html(pageTotal + (' (TP '+total+')'));

            total = api
                .column(5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column(5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column(5 ).footer() ).html(
                pageTotal + (' (TP '+total+')')
            );
                
        }
        
    } );
    
} );
    </script>

</html>