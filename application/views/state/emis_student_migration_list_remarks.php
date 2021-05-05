
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
                                        <h1>Students-Common Pool Report
                                            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                          <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist" style="width:max-content">
                                             <li role="presentation">
                                            <a href="<?php echo base_url().'State/get_district_migration'?>">
                                              <span class="text">School Type</span><br/>
                                            </a>
                                          </li>
                                           <li role="presentation">
                                            <a href="<?php echo base_url().'State/get_district_migration_reason'?>">
                                              <span class="text">Transfer Reason</span>
                                            </a>
                                          </li>
                                        <!--    <li role="presentation">
                                            <a href="<?php echo base_url().'State/get_district_migration_remarks'?>">
                                              <span class="text">Remark Not Updated</span>
                                            </a>
                                          </li>-->
                                          
                                                </ul>
                                            </div>
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
                          
                                        <!-- BEGIN CARDS -->
                                        <div class="row margin-bottom-20">
                                             <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i>Students in Common Pool-District wise </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                          <?php $Government=0;$fullyaid=0;$unaidteachtot=0;$PartiallyAided=0;$CentralGovt=0; ?>
                                  <table class="table table-striped table-bordered table-hover" id="sample_2">
                                  <thead>
                                 <tr>
                                <th style="text-align: center;">S.No</th>
                                <th>District</th>                        
                                <th style="text-align: center;">Total Students</th>
                                <th style="text-align: center;">Remark-Not Marked</th>
                           
                             
                              <!--<th>Total</th>-->
                                                                   
                              </tr>
                              </thead>
                              <tbody>
                              <?php $total1=[];?>
                              <?php if(!empty($student_migration_details)){ $Gov_tot= [];$FA_tot= []; $i=1;foreach($student_migration_details as $student_mig){ 
                                                              
                                                            $total = $student_mig->government +$student_mig->fullyaided + $student_mig->PartiallyAided + $student_mig->unaided; ?>
                              <tr>
                              <td style="text-align: center;"><?php echo $i;?></td>
                              <td><a href="<?php echo base_url().'State/get_block_migration_remarks/?dist_id='.$student_mig->district_name?>">
                              <?php echo $student_mig->district_name; ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_mig->tot_std); ?></td>
                              <td style="text-align: center;"><?php echo number_format($student_mig->not_marked_remarks); ?></td>

                           
                              <!--<td> <?php echo number_format($det->total); ?></td>-->
                              </tr>
                              <?php $i++;?>

                                                     <?php
                                                            array_push($Gov_tot,$student_mig->tot_std);
                                                            array_push($FA_tot,$student_mig->not_marked_remarks);
                                                          
                                                           
                                                       } ?>
                                                        
                                                 
                                                        <?php } ?>
                            </tbody>
                                                         <tfoot>
                                                                <tr>
                                                            <th>Total</th>
                                                            <th></th>
                                                            <th style="text-align: center;"><?php 
                                                            $Gov_tot = array_sum($Gov_tot);
                                                            array_push($total1,$Gov_tot);
                                                            echo number_format($Gov_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                                $FA_tot = array_sum($FA_tot);
                                                                array_push($total1,$FA_tot);
                                                            echo number_format($FA_tot);?></th>
                                                           
                                                          
                                                        </tr>
                                                            </tfoot> 
                             
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

</html>