
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
                                          <!--  <li role="presentation">
                                            <a href="<?php echo base_url().'State/get_district_migration_remarks'?>">
                                              <span class="text">Remarks Update</span>
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
                                                            <i class="fa fa-globe"></i>Students in Common Pool-Block wise(Transfer Reason) </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                          <?php $Government=0;$fullyaid=0;$unaidteachtot=0;$PartiallyAided=0;$CentralGovt=0; ?>
                              <table class="table table-striped table-bordered table-hover" id="sample_2">
                              <thead>
                              <tr>
                              <th style="text-align: center;">S.No</th>
                              <th>District</th>                        
                              <th style="text-align: center;">Long_Absent</th>
                              <th style="text-align: center;">Transfered_by_Parents</th>
                               <th style="text-align: center;">Terminal_Class</th>
                             <th style="text-align: center;">Dropped_Out</th>
                            <!--  <th style="text-align: center;">Student_Expired</th>-->
                            <!--  <th style="text-align: center;">Duplicate_Entry</th>
                              <th style="text-align: center;"> No_Reason</th>-->
                              <th style="text-align: center;"> Total</th>   
                                                                   
                              </tr>
                              </thead>
                              <tbody>
                              <?php $total1=[];?>
                                 <?php if(!empty($student_migration_details)){ $Long_Absent= [];$Transfered_by_Parents= [];$Terminal_Class= [];$Dropped_Out= []; $Student_Expired= []; $Duplicate_Entry=[]; $No_Reason=[];  $i=1;foreach($student_migration_details as $student_mig){  
                                                              
                                                            $total = $student_mig->government +$student_mig->fullyaided + $student_mig->PartiallyAided + $student_mig->unaided; ?>
                              <tr>
                              <td style="text-align: center;"><?php echo $i;?></td>
                            <td><a href="<?php echo base_url().'State/get_school_migration_reason/?block_name='.$student_mig->block_name?>">
                              <?php echo $student_mig->block_name; ?></a></td>
                             <td style="text-align: center;"> <?php echo number_format($student_mig->Long_Absent); ?></td>
                              <td style="text-align: center;"> <?php echo number_format($student_mig->Transfered_by_Parents); ?></td>
                               <td style="text-align: center;"> <?php echo number_format($student_mig->Terminal_Class); ?></td>
                              <td style="text-align: center;"> <?php echo number_format($student_mig->Dropped_Out); ?></td>
                             <!-- <td style="text-align: center;"> <?php echo number_format($student_mig->Student_Expired); ?></td>-->
                             <!-- <td style="text-align: center;"> <?php echo number_format($student_mig->Duplicate_Entry);?></td>
                              <td style="text-align: center;"> <?php echo number_format($det->No_Reason); ?></td>-->
                              <td style="text-align: center;"> <?php echo number_format($student_mig->district_name+$student_mig->Long_Absent+$student_mig->Transfered_by_Parents+$student_mig->Terminal_Class+$student_mig->Dropped_Out); ?></td>
                              <!--<td> <?php echo number_format($det->total); ?></td>-->
                              </tr>
                              <?php $i++;?>

                              <?php
                                                            array_push($Long_Absent,$student_mig->Long_Absent);
                                                            array_push($Transfered_by_Parents,$student_mig->Transfered_by_Parents);
                                                            array_push($Terminal_Class,$student_mig->Terminal_Class);
                                                            array_push($Dropped_Out,$student_mig->Dropped_Out);
                                                            array_push($Student_Expired,$student_mig->Student_Expired);
                                                            array_push($Duplicate_Entry,$student_mig->Duplicate_Entry);
                                                            array_push($No_Reason,$student_mig->No_Reason);
                                                           
                                                       } ?>
                                                        
                                                 
                                                        <?php } ?>
                            </tbody>
                                                         <tfoot>
                                                                <tr>
                                                            <th>Total</th>
                                                            <th></th>
                                                            <th style="text-align: center;"><?php 
                                                            $Long_Absent = array_sum($Long_Absent);
                                                            array_push($total1,$Long_Absent);
                                                            echo number_format($Long_Absent);?></th>
                                                            <th style="text-align: center;"><?php 
                                                                $Transfered_by_Parents = array_sum($Transfered_by_Parents);
                                                                array_push($total1,$Transfered_by_Parents);
                                                            echo number_format($Transfered_by_Parents);?></th>
                                                            <th style="text-align: center;"><?php 
                                                             $Terminal_Class = array_sum($Terminal_Class);
                                                                array_push($total1,$Terminal_Class);
                                                           echo number_format($Terminal_Class);?></th>
                                                        <!--    <th style="text-align: center;"><?php 
                                                            $Dropped_Out = array_sum($Dropped_Out);
                                                                array_push($total1,$Dropped_Out);
                                                                echo number_format($Dropped_Out);?></th>-->
                                                                 <th style="text-align: center;"><?php 
                                                            $Student_Expired = array_sum($Student_Expired);
                                                                array_push($total1,$Student_Expired);
                                                                echo number_format($Student_Expired);?></th>
                                                                   <!--<th style="text-align: center;"><?php 
                                                            $Duplicate_Entry = array_sum($Duplicate_Entry);
                                                                array_push($total1,$Duplicate_Entry);
                                                                echo number_format($Duplicate_Entry);?></th>
                                                                  <th style="text-align: center;"><?php 
                                                            $No_Reason = array_sum($No_Reason);
                                                                array_push($total1,$No_Reason);
                                                                echo number_format($No_Reason);?></th>-->
                                                            
                                                           
                                                           <th style="text-align: center;"><?php echo number_format($total=$Long_Absent+ $Transfered_by_Parents+$Terminal_Class+$Dropped_Out);?></th>
                                                          
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