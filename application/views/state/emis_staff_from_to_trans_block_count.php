
<?php 
// print_r($blockwise_schoolinfo);
?>
<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
<style> 
.center 
{
text-align: center;
}   
</style>
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
                                        
                                        </h1>
                                    </div>
									<!--	 <div class="col-md-12 col-md-offset-12">
									 <label> </label>
    <a href="<?php echo base_url() ?>State/emis_staff_from_to_trans_dist_count" class="btn btn-primary" value="Back"/>Back</a>
  </div> -->
  
  	 <div style="text-align:right;">
									 <label> </label>
    <!--<a href="<?php echo base_url() ?>State/emis_staff_from_to_trans_block_count" class="btn btn-primary" value="Back"/>Back</a> -->
	
	 <button onclick="goBack()" class="btn green"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
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
                          
                                        <!-- BEGIN CARDS -->
                                        <div class="row margin-bottom-20">
                                             <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                   <div class="row">
                                            <div class="col-md-6">
                                                <a href="#">
                                            <div class="col-md-5">
                                                <div class="bs-callout-lightsteelblue dashboard-stat2" style="padding: inherit;">
                                                  <!--  <div class="display">
                                                        <div class="number">
                                                            <h4 class="font-green-sharp">
                                                         <span class="bottom" data-counter="counterup" data-value="34" style="font-size: 23px;">Total Teacher</span></h4>
                                                      
                                                 
             <h4 style="font-size: 30px;"> </h4>
                                                        </div> 
                                                        <div class="icon" style="margin-top:9%">
                                                            <i class="fa fa-university"></i>
                                                        </div>
                                                    </div>-->
                                                    
                                                </div>
                                            </div></a>
                                            </div>
                                        </div>
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> Transfer Details (Block-Wise): <?= $fdate; ;?> TO <?= $tdate; ?></div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                         
                                  <table class="table table-striped table-bordered table-hover" id="sample_2">
								  
								   <thead>
                                 <tr>
                                <th style="text-align: center;"></th>
                              <th></th>
                              <th style="text-align: center;" colspan="4"> Directorate Of Elementary Education</th>
						 
							
							  <th style="text-align: center;"  colspan="3">Directorate Of School Education</th>
							 
							  <th style="text-align: center;"></th>
							  <th></th>
							  
                           
                              


                            

                              </tr>
                              </thead>
                                  <thead>
                                 <tr>
                                <th style="text-align: center;">S.No</th>
                              <th style="text-align: center;">Block</th>
                              <th style="text-align: center;">Within Block</th>
						      <th style="text-align: center;">Block to Block</th>
							  <th style="text-align: center;">District to District</th>
							   <th style="text-align: center;">Total</th>
							  <th style="text-align: center;">Within District</th>
							  <th style="text-align: center;">District to District</th>
							   <th style="text-align: center;">Total</th>
							  <th style="text-align: center;">School To Office</th>
							  <th style="text-align: center;">Total</th>
                           
                              


                            

                              </tr>
                              </thead>
                              <tbody>
                              <?php $total1=[];?>
                              <?php if(!empty($block_staff_count)){
								  $i=1;
								  $withinblock= [];
								  $blocktoblock= [];
								  $disttodist= [];
								  $dseblocktoblock= [];
								  $dsedisttodist= [];
								  $school_off= [];
								   // print_r($block_staff_count);
								  foreach($block_staff_count as $staff_tnfr){ 
                                                              
                                ?>
								
        
                              <tr>
                              <td style="text-align: center;"><?php echo $i;?></td>
                              <td><a href="<?php echo base_url().'State/emis_state_teacher_transhistory/?block_name='.$staff_tnfr->FROM_block.'&fdate='.$fdate.'&tdate='.$tdate?>">
                              <?php echo $staff_tnfr->FROM_block; ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->withinblock); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($staff_tnfr->blocktoblock); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($staff_tnfr->disttodist); ?></a></td> 
							   <td style="text-align: center;"><?php echo number_format($staff_tnfr->withinblock + $staff_tnfr->blocktoblock +$staff_tnfr->disttodist); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($staff_tnfr->dseblocktoblock); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($staff_tnfr->dsedisttodist); ?></a></td>
							   <td style="text-align: center;"><?php echo number_format($staff_tnfr->dseblocktoblock + $staff_tnfr->dsedisttodist ); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($staff_tnfr->school_off); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format( $staff_tnfr->school_off+$staff_tnfr->dseblocktoblock + $staff_tnfr->dsedisttodist +$staff_tnfr->withinblock + $staff_tnfr->blocktoblock +$staff_tnfr->disttodist); ?></a></td>
							   
                              
                              
                              
                            
                              </tr>
                              <?php $i++;?>
<?php
                             array_push($withinblock,$staff_tnfr->withinblock);
							 array_push($blocktoblock,$staff_tnfr->blocktoblock);
							 array_push($disttodist,$staff_tnfr->disttodist);
							 array_push($dseblocktoblock,$staff_tnfr->dseblocktoblock);
							 array_push($dsedisttodist,$staff_tnfr->dsedisttodist);
							 array_push($school_off,$staff_tnfr->school_off);
							                      ?>      
                                        <?php  } ?>         
                                                      
                            </tbody>
							 <tfoot>
                                                          <tr>
                                                            <th>Total</th>
                                                            <th></th> 
                                                            <th style="text-align: center;" ><?php 
                                                            $withinblock = array_sum($withinblock);
                                                            array_push($total1,$withinblock);
                                                            echo number_format($withinblock);?></th>
															<th style="text-align: center;" ><?php 
                                                            $blocktoblock = array_sum($blocktoblock);
                                                            array_push($total1,$blocktoblock);
                                                            echo number_format($blocktoblock);?></th>
															<th style="text-align: center;" ><?php 
                                                            $disttodist = array_sum($disttodist);
                                                            array_push($total1,$disttodist);
                                                            echo number_format($disttodist);?></th>
															
															<th style="text-align: center;" >
															<?php 
                                                            echo number_format($withinblock +$blocktoblock+$disttodist  );
                                                            ?></th>
															<th style="text-align: center;" ><?php 
                                                            $dseblocktoblock = array_sum($dseblocktoblock);
                                                            array_push($total1,$dseblocktoblock);
                                                            echo number_format($dseblocktoblock);?></th>
															<th style="text-align: center;" ><?php 
                                                            $dsedisttodist = array_sum($dsedisttodist);
                                                            array_push($total1,$dsedisttodist);
                                                            echo number_format($dsedisttodist);?></th>
															<th style="text-align: center;" >
															<?php 
                                                            echo number_format($dseblocktoblock+$dsedisttodist );
                                                            ?></th>
															<th style="text-align: center;" ><?php 
                                                            $school_off = array_sum($school_off);
                                                            array_push($total1,$school_off);
                                                            echo number_format($school_off);?></th>
															<th style="text-align: center;" >
															<?php 
                                                            echo number_format( $withinblock +$blocktoblock+$disttodist +$school_off+$dseblocktoblock+$dsedisttodist );
                                                            ?></th>
															</tr>
															</tfoot>
                                                        
                                                              <?php } ?>
                             
                            </table>
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

                                                    </div>
                                                </div>
                                            </div>
                                        
                                        <!-- END CARDS -->


                                         <!-- BEGIN BLOCK BUTTONS PORTLET-->
                                                                   
                                                                    <!-- BEGIN BLOCK BUTTONS PORTLET-->

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
 

        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
               
             
    </body>
	<script>
	function goBack() {
  window.history.back();
}
	</script>

</html>