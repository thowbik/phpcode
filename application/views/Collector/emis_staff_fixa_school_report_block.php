
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
            

  <?php $this->load->view('Collector/header.php'); ?>

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
                                                            <i class="fa fa-globe"></i>DEE-Staff Fixation Report Block-Wise</div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                          <?php $Government=0;$fullyaid=0;$unaidteachtot=0;$PartiallyAided=0;$CentralGovt=0; ?>
                               <table class="table table-striped table-bordered table-hover" id="sample_2">
                                  <thead>
                                 <tr>
                                <th style="text-align: center;">S.No</th>
                              <th>Block</th>                        
                               <th style="text-align: center;">SG-Eligible</th>
                              <th style="text-align: center;">SG-Sanctioned</th>
                               <th style="text-align: center;">SG-Teacher Working</th>
                               <th style="text-align: center;">SG-Eligible</br> Vacancy</br>To Fill Up</th>
                              <th style="text-align: center;">SG-Needed</th>
                              <th style="text-align: center;">SG-Surplus Post<br>with Person</th>
                              <th style="text-align: center;">SG-Surplus Post<br>without Person</th>


                              <th style="text-align: center;">BT-Eligible</th>
                              <th style="text-align: center;">BT-Sanctioned</th>
                              <th style="text-align: center;">BT-Teacher Working</th>
                              <th style="text-align: center;">BT-Eligible</br> Vacancy</br>To Fill Up</th>
                              <th style="text-align: center;">BT-Needed</th>
                              <th style="text-align: center;">BT-Surplus Post<br>with Person</th>
                              <th style="text-align: center;">BT-Surplus Post<br>without Person</th>

                              <th style="text-align: center;">Primary HM<br>Eligible</th>
                              <th style="text-align: center;">Primary HM<br>Sanctioned</th>
                              <th style="text-align: center;">Primary HM<br>-Teacher Working</th>
                              <th style="text-align: center;">Primary HM<br>-Eligible</br> Vacancy</br>To Fill Up</th>
                              <th style="text-align: center;">Primary HM<br>Needed</th>
                              <th style="text-align: center;">Primary HM<br>Surplus Post<br>with Person</th>
                              <th style="text-align: center;">Primary HM<br>Surplus Post<br>without Person</th>

                              <th style="text-align: center;">Middle HM<br>Eligible</th>
                              <th style="text-align: center;">Middle HM<br>Sanctioned</th>
                              <th style="text-align: center;">Middle HM<br>-Teacher Working</th>
                              <th style="text-align: center;">Middle HM<br>-Eligible</br> Vacancy</br>To Fill Up</th>
                              <th style="text-align: center;">Middle HM<br>Needed</th>
                              <th style="text-align: center;">Middle HM<br>Surplus Post<br>with Person</th>
                              <th style="text-align: center;">Middle HM<br>Surplus Post<br>without Person</th>

                              </tr>
                              </thead>
                              <tbody>
                              <?php $total1=[];?>
                              <?php if(!empty($staff_fixa_report)){ $total1=[]; $sg_eligible= [];$sg_sanctioned= [];$sg_available= [];$sg_need= []; $sg_SWS= []; $sg_SWO= []; $bt_eli= [];$bt_sanc= [];$bt_avail= [];$bt_need= []; $bt_SWS= []; $bt_SWO= [];  $elig_mhm=[]; $sanc_mhm=[]; $avail_mhm=[]; $surp_w_mhm=[]; $surp_wo_mhm=[]; $need_mhm=[]; $elig_phm=[]; $sanc_phm=[]; $avail_phm=[]; $surp_w_phm=[]; $surp_wo_phm=[]; $need_phm=[]; $i=1; $vacancy=[]; $bt_vacancy=[]; $vac_mhm=[]; $vac_phm=[]; foreach($staff_fixa_report as $student_fig){ 
                                                              
                                ?>
                              <tr>
                              <td style="text-align: center;"><?php echo $i;?></td>
                              <td><a href="<?php echo base_url().'Collector/emis_staff_fixa_report_school/?block_id='.$student_fig->block_id?>">
                              <?php echo $student_fig->block_name; ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->sg_eligible); ?></a></td>
                         <td style="text-align: center;"><?php echo number_format($student_fig->sg_sanctioned); ?></a></td>
                          <td style="text-align: center;"><?php echo number_format($student_fig->sg_available); ?></a></td>
                             <td style="text-align: center;"><?php echo number_format($student_fig->vac_sg); ?></a></td>
                            <td style="text-align: center;"><?php echo number_format($student_fig->sg_need); ?></a></td>
                            <td style="text-align: center;"><?php echo number_format($student_fig->sg_SWS); ?></a></td>
                            <td style="text-align: center;"><?php echo number_format($student_fig->sg_SWO); ?></a></td>
                            <td style="text-align: center;"><?php echo number_format($student_fig->bt_eli); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->bt_sanc); ?></a></td>
                           <td style="text-align: center;"><?php echo number_format($student_fig->bt_avail); ?></a></td>
                           <td style="text-align: center;"><?php echo number_format($student_fig->bt_vac); ?></a></td>
                           <td style="text-align: center;"><?php echo number_format($student_fig->bt_need); ?></a></td>
                          <td style="text-align: center;"><?php echo number_format($student_fig->bt_SWS); ?></a></td>
                           <td style="text-align: center;"><?php echo number_format($student_fig->bt_SWO); ?></a></td>

                          


                               <td style="text-align: center;"><?php echo number_format($student_fig->elig_phm); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->sanc_phm); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->avail_phm); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->vac_phm); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->need_phm); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->surp_w_phm); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->surp_wo_phm); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->elig_mhm); ?></a></td>
                         <td style="text-align: center;"><?php echo number_format($student_fig->sanc_mhm); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->avail_mhm); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->vac_mhm); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->need_mhm); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->surp_w_mhm); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->surp_wo_mhm); ?></a></td>
                            
                              </tr>
                              <?php $i++;?>

                              
                               <?php
                                      array_push($sg_eligible,$student_fig->sg_eligible);
                                      array_push($sg_sanctioned,$student_fig->sg_sanctioned);
                                      array_push($sg_available,$student_fig->sg_available);
                                      array_push($vacancy,$student_fig->vac_sg);
                                      array_push($sg_need,$student_fig->sg_need);
                                      array_push($sg_SWS,$student_fig->sg_SWS);
                                      array_push($sg_SWO,$student_fig->sg_SWO);

                                      array_push($bt_eli,$student_fig->bt_eli);
                                      array_push($bt_sanc,$student_fig->bt_sanc);
                                      array_push($bt_avail,$student_fig->bt_avail);
                                      array_push($bt_vacancy,$student_fig->bt_vac);
                                      array_push($bt_need,$student_fig->bt_need);
                                      array_push($bt_SWS,$student_fig->bt_SWS);
                                      array_push($bt_SWO,$student_fig->bt_SWO);

                                      array_push($elig_mhm,$student_fig->elig_mhm);
                                      array_push($sanc_mhm,$student_fig->sanc_mhm);
                                      array_push($avail_mhm,$student_fig->avail_mhm);
                                      array_push($vac_mhm,$student_fig->vac_mhm);
                                      array_push($need_mhm,$student_fig->need_mhm);
                                      array_push($surp_w_mhm,$student_fig->surp_w_mhm);
                                      array_push($surp_wo_mhm,$student_fig->surp_wo_mhm);

                                      array_push($elig_phm,$student_fig->elig_phm);
                                      array_push($sanc_phm,$student_fig->sanc_phm);
                                      array_push($avail_phm,$student_fig->avail_phm);
                                      array_push($vac_phm,$student_fig->vac_phm);
                                      array_push($need_phm,$student_fig->need_phm);
                                      array_push($surp_w_phm,$student_fig->surp_w_phm);
                                      array_push($surp_wo_phm,$student_fig->surp_wo_phm);
                    
                                     ?>
                                                        
                                        <?php  } ?>         
                                                      
                            </tbody>
                                                         <tfoot>
                                                          <tr>
                                                            <th>Total</th>
                                                            <th></th>
                                                            <th style="text-align: center;" ><?php 
                                                            $sg_eligible = array_sum($sg_eligible);
                                                            array_push($total1,$sg_eligible);
                                                            echo number_format($sg_eligible);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $sg_sanctioned = array_sum($sg_sanctioned);
                                                            array_push($total1,$sg_sanctioned);
                                                            echo number_format($sg_sanctioned);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $sg_available = array_sum($sg_available);
                                                            array_push($total1,$sg_available);
                                                            echo number_format($sg_available);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $vacancy = array_sum($vacancy);
                                                            array_push($total1,$vacancy);
                                                            echo number_format($vacancy);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $sg_need = array_sum($sg_need);
                                                            array_push($total1,$sg_need);
                                                            echo number_format($sg_need);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $sg_SWS = array_sum($sg_SWS);
                                                            array_push($total1,$sg_SWS);
                                                            echo number_format($sg_SWS);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $sg_SWO = array_sum($sg_SWO);
                                                            array_push($total1,$sg_SWO);
                                                            echo number_format($sg_SWO);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $bt_eli = array_sum($bt_eli);
                                                            array_push($total1,$bt_eli);
                                                            echo number_format($bt_eli);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $bt_sanc = array_sum($bt_sanc);
                                                            array_push($total1,$bt_sanc);
                                                            echo number_format($bt_sanc);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $bt_avail = array_sum($bt_avail);
                                                            array_push($total1,$bt_avail);
                                                            echo number_format($bt_avail);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $bt_vacancy = array_sum($bt_vacancy);
                                                            array_push($total1,$bt_vacancy);
                                                            echo number_format($bt_vacancy);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $bt_need = array_sum($bt_need);
                                                            array_push($total1,$bt_need);
                                                            echo number_format($bt_need);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $bt_SWS = array_sum($bt_SWS);
                                                            array_push($total1,$bt_SWS);
                                                            echo number_format($bt_SWS);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $bt_SWO = array_sum($bt_SWO);
                                                            array_push($total1,$bt_SWO);
                                                            echo number_format($bt_SWO);?></th>

                                                           

                                                             <th style="text-align: center;" ><?php 
                                                            $elig_phm = array_sum($elig_phm);
                                                            array_push($total1,$elig_phm);
                                                            echo number_format($elig_phm);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $sanc_phm = array_sum($sanc_phm);
                                                            array_push($total1,$sanc_phm);
                                                            echo number_format($sanc_phm);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $avail_phm = array_sum($avail_phm);
                                                            array_push($total1,$avail_phm);
                                                            echo number_format($avail_phm);?></th>
                                                           <th style="text-align: center;" ><?php 
                                                            $vac_phm = array_sum($vac_phm);
                                                            array_push($total1,$vac_phm);
                                                            echo number_format($vac_phm);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $need_phm = array_sum($need_phm);
                                                            array_push($total1,$need_phm);
                                                            echo number_format($need_phm);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $surp_w_phm = array_sum($surp_w_phm);
                                                            array_push($total1,$surp_w_phm);
                                                            echo number_format($surp_w_phm);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $surp_wo_phm = array_sum($surp_wo_phm);
                                                            array_push($total1,$surp_wo_phm);
                                                            echo number_format($surp_wo_phm);?></th>

                                                              <th style="text-align: center;" ><?php 
                                                            $elig_mhm = array_sum($elig_mhm);
                                                            array_push($total1,$elig_mhm);
                                                            echo number_format($elig_mhm);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $sanc_mhm = array_sum($sanc_mhm);
                                                            array_push($total1,$sanc_mhm);
                                                            echo number_format($sanc_mhm);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $avail_mhm = array_sum($avail_mhm);
                                                            array_push($total1,$avail_mhm);
                                                            echo number_format($avail_mhm);?></th>
                                                            <th style="text-align: center;" ><?php 
                                                            $vac_mhm = array_sum($vac_mhm);
                                                            array_push($total1,$vac_mhm);
                                                            echo number_format($vac_mhm);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $need_mhm = array_sum($need_mhm);
                                                            array_push($total1,$need_mhm);
                                                            echo number_format($need_mhm);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $surp_w_mhm = array_sum($surp_w_mhm);
                                                            array_push($total1,$surp_w_mhm);
                                                            echo number_format($surp_w_mhm);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $surp_wo_mhm = array_sum($surp_wo_mhm);
                                                            array_push($total1,$surp_wo_mhm);
                                                            echo number_format($surp_wo_mhm);?></th>
                                                           
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