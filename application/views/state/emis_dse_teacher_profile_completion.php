
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
                                                            <i class="fa fa-globe"></i>Teacher Profile Completion Status(DSE Count vs EMIS Count) - District-Wise</div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                          <?php $Government=0;$fullyaid=0;$unaidteachtot=0;$PartiallyAided=0;$CentralGovt=0; ?>
                                  <table class="table table-striped table-bordered table-hover" id="sample_2">
                                  <thead>
                                 <tr>
                                <th style="text-align: center;">S.No</th>
                              <th>District</th>                        
                              <th style="text-align: center;">HM-High School <br>In EMIS</th>
                              <th style="text-align: center;">HM-High School<br>DSE</th>
                              <th style="text-align: center;">HM-H.Scr<br>In EMIS</th>
                              <th style="text-align: center;">HM-H.Scr<br>DSE </th>
                              <th style="text-align: center;">PG<br>In EMIS</th>
                              <th style="text-align: center;">PG<br>DSE </th>
                              <th style="text-align: center;">BT-Assistant<br>In EMIS</th>
                              <th style="text-align: center;">BT-Assistant<br>DSE </th>
                              <th style="text-align: center;">SG-teacher<br>In EMIS</th>
                              <th style="text-align: center;">SG-teacher<br>DSE </th>
                              <th style="text-align: center;">P.E.T<br>In EMIS</th>
                              <th style="text-align: center;">P.E.T<br>DSE</th>
                               <th style="text-align: center;">PD<br>In EMIS</th>
                              <th style="text-align: center;">Vocational<br>Teacher<br>In EMIS</th>
                              <th style="text-align: center;">Vocational<br>Teacher<br>DSE</th>
                             

                              </tr>
                              </thead>
                              <tbody>
                              <?php $total1=[];?>
                              <?php if(!empty($dse_teacher_profile)){ $total1=[]; $emis_hs_hm= [];$dse_hs_hm= [];$emis_hrd_hm= [];$dse_hrs_hm= [];$emis_pg= []; $dse_pg= [];$emis_sg= [];$dse_sg= [];$emis_bt= [];$dse_bt= []; $PET= [];$dse_PET= []; $voc=[]; $PD=[]; $dse_voc=[]; $i=1;foreach($dse_teacher_profile as $teacher_pro){ 
                                                              
                                ?>
                              <tr>
                              <td style="text-align: center;"><?php echo $i;?></td>
                              <td><a href="#">
                              <?php echo $teacher_pro->district_name; ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($teacher_pro->emis_hs_hm); ?></a></td>
                            
                             <td style="text-align: center;"> <?php echo number_format($teacher_pro->dse_hs_hm); ?></td>
                            
                            
                             <td style="text-align: center;"><?php echo number_format($teacher_pro->emis_hrd_hm); ?></td>
                              <td style="text-align: center;"><?php echo number_format($teacher_pro->dse_hrs_hm); ?></td>
                              <td style="text-align: center;"><?php echo number_format($teacher_pro->emis_pg); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($teacher_pro->dse_pg); ?></td>
                               <td style="text-align: center;"><?php echo number_format($teacher_pro->emis_bt); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($teacher_pro->dse_bt); ?></td>
                               <td style="text-align: center;"><?php echo number_format($teacher_pro->emis_sg); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($teacher_pro->dse_sg); ?></td>
                             
                             <td style="text-align: center;"><?php echo number_format($teacher_pro->PET); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($teacher_pro->dse_PET); ?></td>
                              <td style="text-align: center;"><?php echo number_format($teacher_pro->PD); ?></td>
                               <td style="text-align: center;"><?php echo number_format($teacher_pro->voc); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($teacher_pro->dse_voc); ?></td>
                               

                             
                            
                              </tr>
                              <?php $i++;?>

                              
                               <?php
                                      array_push($emis_hs_hm,$teacher_pro->emis_hs_hm);
                                      array_push($dse_hs_hm,$teacher_pro->dse_hs_hm);
                                      array_push($emis_hrd_hm,$teacher_pro->emis_hrd_hm);
                                      array_push($dse_hrs_hm,$teacher_pro->dse_hrs_hm);
                                      array_push($emis_pg,$teacher_pro->emis_pg);
                                      array_push($dse_pg,$teacher_pro->dse_pg);
                                      array_push($emis_sg,$teacher_pro->emis_sg);
                                      array_push($dse_sg,$teacher_pro->dse_sg);
                                      array_push($emis_bt,$teacher_pro->emis_bt);
                                      array_push($dse_bt,$teacher_pro->dse_bt);
                                      array_push($PET,$teacher_pro->PET);
                                      array_push($dse_PET,$teacher_pro->dse_PET);
                                      array_push($voc,$teacher_pro->voc);
                                      array_push($dse_voc,$teacher_pro->dse_voc);
                                       array_push($PD,$teacher_pro->PD);
                                     
                                     
                    
                                     ?>
                                                        
                                        <?php  } ?>         
                                                      
                            </tbody>
                                                         <tfoot>
                                                          <tr>
                                                            <th>Total</th>
                                                            <th></th>
                                                            <th style="text-align: center;" ><?php 
                                                            $emis_hs_hm = array_sum($emis_hs_hm);
                                                            array_push($total1,$emis_hs_hm);
                                                            echo number_format($emis_hs_hm);?></th>
                                                              <th style="text-align: center;" ><?php 
                                                            $dse_hs_hm = array_sum($dse_hs_hm);
                                                            array_push($total1,$dse_hs_hm);
                                                            echo number_format($dse_hs_hm);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $emis_hrd_hm = array_sum($emis_hrd_hm);
                                                            array_push($total1,$emis_hrd_hm);
                                                            echo number_format($emis_hrd_hm);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $dse_hrs_hm = array_sum($dse_hrs_hm);
                                                            array_push($total1,$dse_hrs_hm);
                                                            echo number_format($dse_hrs_hm);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $emis_pg = array_sum($emis_pg);
                                                            array_push($total1,$emis_pg);
                                                            echo number_format($emis_pg);?></th>
                                                               <th style="text-align: center;" ><?php 
                                                            $dse_pg = array_sum($dse_pg);
                                                            array_push($total1,$dse_pg);
                                                            echo number_format($dse_pg);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $emis_bt = array_sum($emis_bt);
                                                            array_push($total1,$emis_bt);
                                                            echo number_format($emis_bt);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $dse_bt = array_sum($dse_bt);
                                                            array_push($total1,$dse_bt);
                                                            echo number_format($dse_bt);?></th>
                                                            <th style="text-align: center;" ><?php 
                                                            $emis_sg = array_sum($emis_sg);
                                                            array_push($total1,$emis_sg);
                                                            echo number_format($emis_sg);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $dse_sg = array_sum($dse_sg);
                                                            array_push($total1,$dse_sg);
                                                            echo number_format($dse_sg);?></th>
                                                            
                                                           <th style="text-align: center;" ><?php 
                                                            $PET = array_sum($PET);
                                                            array_push($total1,$PET);
                                                            echo number_format($PET);?></th>
                                                           <th style="text-align: center;" ><?php 
                                                            $dse_PET = array_sum($dse_PET);
                                                            array_push($total1,$dse_PET);
                                                            echo number_format($dse_PET);?></th>
                                                               <th style="text-align: center;" ><?php 
                                                            $PD = array_sum($PD);
                                                            array_push($total1,$PD);
                                                            echo number_format($PD);?></th>
                                                            
                                                             <th style="text-align: center;" ><?php 
                                                            $voc = array_sum($voc);
                                                            array_push($total1,$voc);
                                                            echo number_format($voc);?></th>
                                                           <th style="text-align: center;" ><?php 
                                                            $dse_voc = array_sum($dse_voc);
                                                            array_push($total1,$dse_voc);
                                                            echo number_format($dse_voc);?></th>
                                                          
                                                           
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