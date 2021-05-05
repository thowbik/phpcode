
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
                                                            <i class="fa fa-globe"></i>Teacher Profile Completion Status(DEE Count vs EMIS Count) - District-Wise</div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                          <?php $Government=0;$fullyaid=0;$unaidteachtot=0;$PartiallyAided=0;$CentralGovt=0; ?>
                                  <table class="table table-striped table-bordered table-hover" id="sample_2">
                                  <thead>
                                 <tr>
                                <th style="text-align: center;">S.No</th>
                              <th>District</th>                        
                              <th style="text-align: center;">HM-Middle <br>In EMIS</th>
                              <th style="text-align: center;">HM-Middle<br>DEE Count</th>
                              <th style="text-align: center;">HM-Primary<br>In EMIS</th>
                              <th style="text-align: center;">HM-Primary<br>DEE Count</th>
                              <th style="text-align: center;">BT-Assistant<br>In EMIS</th>
                              <th style="text-align: center;">BT-Assistant<br>DEE Count</th>
                              <th style="text-align: center;">SG-teacher<br>In EMIS</th>
                              <th style="text-align: center;">SG-teacher<br>DEE Count</th>
                              <th style="text-align: center;">P.E.T<br>In EMIS</th>
                              <th style="text-align: center;">P.E.T<br>DEE</th>
                               <th style="text-align: center;">PD<br>In EMIS</th>
                              <th style="text-align: center;">Vocational<br>Teacher<br>In EMIS</th>
                              <th style="text-align: center;">Vocational<br>Teacher<br>DEE</th>
                             
                              </tr>
                              </thead>
                              <tbody>
                              <?php $total1=[];?>
                              <?php if(!empty($dee_teacher_profile)){ $total1=[]; $HM_middle= [];$dee_hm_middle= [];$HM_primary= [];$dee_hm_pri= [];$BT= []; $dee_BT= [];$SG= [];$dee_SG= [];$pet= [];$PET= []; $dee_PET= []; $voc=[]; $dee_voc=[];$PD=[]; $i=1;foreach($dee_teacher_profile as $teacher_pro){ 
                                                              
                                ?>
                              <tr>
                              <td style="text-align: center;"><?php echo $i;?></td>
                              <td><a href="#">
                              <?php echo $teacher_pro->district_name; ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($teacher_pro->HM_middle); ?></a></td>
                            
                             <td style="text-align: center;"> <?php echo number_format($teacher_pro->dee_hm_middle); ?></td>
                            
                            
                             <td style="text-align: center;"><?php echo number_format($teacher_pro->HM_primary); ?></td>
                              <td style="text-align: center;"><?php echo number_format($teacher_pro->dee_hm_pri); ?></td>
                              <td style="text-align: center;"><?php echo number_format($teacher_pro->BT); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($teacher_pro->dee_BT); ?></td>
                               <td style="text-align: center;"><?php echo number_format($teacher_pro->SG); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($teacher_pro->dee_SG); ?></td>
                              <td style="text-align: center;"><?php echo number_format($teacher_pro->PET); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($teacher_pro->dee_PET); ?></td>
                               <td style="text-align: center;"><?php echo number_format($teacher_pro->PD); ?></td>
                               <td style="text-align: center;"><?php echo number_format($teacher_pro->voc); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($teacher_pro->dee_voc); ?></td>
                              

                             
                            
                              </tr>
                              <?php $i++;?>

                              
                               <?php
                                      array_push($HM_middle,$teacher_pro->HM_middle);
                                      array_push($dee_hm_middle,$teacher_pro->dee_hm_middle);
                                      array_push($HM_primary,$teacher_pro->HM_primary);
                                      array_push($dee_hm_pri,$teacher_pro->dee_hm_pri);
                                      array_push($BT,$teacher_pro->BT);
                                      array_push($dee_BT,$teacher_pro->dee_BT);
                                      array_push($SG,$teacher_pro->SG);
                                      array_push($dee_SG,$teacher_pro->dee_SG);
                                      array_push($PET,$teacher_pro->PET);
                                      array_push($dee_PET,$teacher_pro->dee_PET);
                                      array_push($voc,$teacher_pro->voc);
                                      array_push($dee_voc,$teacher_pro->dee_voc);
                                       array_push($PD,$teacher_pro->PD);
                                     
                                     
                    
                                     ?>
                                                        
                                        <?php  } ?>         
                                                      
                            </tbody>
                                                         <tfoot>
                                                          <tr>
                                                            <th>Total</th>
                                                            <th></th>
                                                            <th style="text-align: center;" ><?php 
                                                            $HM_middle = array_sum($HM_middle);
                                                            array_push($total1,$HM_middle);
                                                            echo number_format($HM_middle);?></th>
                                                              <th style="text-align: center;" ><?php 
                                                            $dee_hm_middle = array_sum($dee_hm_middle);
                                                            array_push($total1,$dee_hm_middle);
                                                            echo number_format($dee_hm_middle);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $HM_primary = array_sum($HM_primary);
                                                            array_push($total1,$HM_primary);
                                                            echo number_format($HM_primary);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $dee_hm_pri = array_sum($dee_hm_pri);
                                                            array_push($total1,$dee_hm_pri);
                                                            echo number_format($dee_hm_pri);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $BT = array_sum($BT);
                                                            array_push($total1,$BT);
                                                            echo number_format($BT);?></th>
                                                            <th style="text-align: center;" ><?php 
                                                            $dee_BT = array_sum($dee_BT);
                                                            array_push($total1,$dee_BT);
                                                            echo number_format($dee_BT);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $SG = array_sum($SG);
                                                            array_push($total1,$SG);
                                                            echo number_format($SG);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $dee_SG = array_sum($dee_SG);
                                                            array_push($total1,$dee_SG);
                                                            echo number_format($dee_SG);?></th>
                                                            <th style="text-align: center;" ><?php 
                                                            $PET = array_sum($PET);
                                                            array_push($total1,$PET);
                                                            echo number_format($PET);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $dee_PET = array_sum($dee_PET);
                                                            array_push($total1,$dee_PET);
                                                            echo number_format($dee_PET);?></th>
                                                              <th style="text-align: center;" ><?php 
                                                            $PD = array_sum($PD);
                                                            array_push($total1,$PD);
                                                            echo number_format($PD);?></th>
                                                            <th style="text-align: center;" ><?php 
                                                            $voc = array_sum($voc);
                                                            array_push($total1,$voc);
                                                            echo number_format($voc);?></th>
                                                           <th style="text-align: center;" ><?php 
                                                            $dee_voc = array_sum($dee_voc);
                                                            array_push($total1,$dee_voc);
                                                            echo number_format($dee_voc);?></th>
                                                          
                                                            
                                                           
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

</html>