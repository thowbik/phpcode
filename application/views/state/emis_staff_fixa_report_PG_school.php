
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
                                                            <i class="fa fa-globe"></i>DSE-Staff Fixation Report School-Wise</div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                          <?php $Government=0;$fullyaid=0;$unaidteachtot=0;$PartiallyAided=0;$CentralGovt=0; ?>
                                 <table class="table table-striped table-bordered table-hover" id="sample_2">
                                  <thead>
                                 <tr>
                                <th style="text-align: center;">S.No</th>
                              <th>School</th>                        
                             <th style="text-align: center;">SG-Eligible</br> Vacancy</br>To Fill Up</th>
                              <th style="text-align: center;">SG-Needed</th>
							  <th style="text-align: center;">BT-Eligible</br> Vacancy</br>To Fill Up</th>
                              <th style="text-align: center;">BT-Needed</th>
							  <th style="text-align: center;">SG-Surplus Post<br>with Person</th>
                              <th style="text-align: center;">SG-Surplus Post<br>without Person</th>
							   <th style="text-align: center;">BT-Surplus Post<br>with Person</th>
                              <th style="text-align: center;">BT-Surplus Post<br>without Person</th>
							  
                               <th style="text-align: center;">SG-Eligible</th>
                              <th style="text-align: center;">SG-Sanctioned</th>
                              <th style="text-align: center;">SG-Teacher Working</th>
                              
                              


                              <th style="text-align: center;">BT-Eligible</th>
                              <th style="text-align: center;">BT-Sanctioned</th>
                              <th style="text-align: center;">BT-Teacher Working</th>
                              
                             

                            

                               <th style="text-align: center;">High School HM<br>Eligible</th>
                              <th style="text-align: center;">High School  HM<br>Sanctioned</th>
                              <th style="text-align: center;">High School  HM<br>-Teacher Working</th>
                              <th style="text-align: center;">High School  HM<br>-Eligible</br> Vacancy</br>To Fill Up</th>
                              <th style="text-align: center;">High School  HM<br>Needed</th>
                              <th style="text-align: center;">High School  HM<br>Surplus Post<br>with Person</th>
                              <th style="text-align: center;">High School  HM<br>Surplus Post<br>without Person</th>


    

                             </tr>
                              </thead>
                              <tbody>
                              <?php $total1=[];?>
                              <?php if(!empty($staff_fixa_report)){ $total1=[]; $eligible= [];$sanctioned= [];$available= [];$need= []; $SWS= []; $SWO= []; $sg_eligible= [];$sg_sanctioned= [];$sg_available= [];$sg_need= []; $sg_SWS= []; $sg_SWO= []; $bt_eli= [];$bt_sanc= [];$bt_avail= [];$bt_need= []; $bt_SWS= []; $bt_SWO= [];  $elig_hhm=[]; $sanc_hhm=[]; $avail_hhm=[]; $surp_w_hhm=[]; $surp_wo_hhm=[]; $need_hhm=[]; $vac_sg=[]; $bt_vac=[]; $vac_high_tot_pg=[]; $vac_hhm=[]; $i=1;foreach($staff_fixa_report as $student_fig){ 
                                                              
                                
                                ?>
                              <tr>
                              <td style="text-align: center;"><?php echo $i;?></td>
                              <td><a href="#">
                              <?php echo $student_fig->school_name; ?></a></td>
                             <td style="text-align: center;"><?php echo number_format($student_fig->vac_sg); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->sg_need); ?></a></td>
							   <td style="text-align: center;"><?php echo number_format($student_fig->bt_vac); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->bt_need); ?></a></td>
							     <td style="text-align: center;"><?php echo number_format($student_fig->sg_SWS); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->sg_SWO); ?></a></td>
							   <td style="text-align: center;"><?php echo number_format($student_fig->bt_SWS); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->bt_SWO); ?></a></td>
							  
                                <td style="text-align: center;"><?php echo number_format($student_fig->sg_eligible); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->sg_sanctioned); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->sg_available); ?></a></td>
                               
                           
                              <td style="text-align: center;"><?php echo number_format($student_fig->bt_eli); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->bt_sanc); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->bt_avail); ?></a></td>
                              
                             
                            
                                <td style="text-align: center;"><?php echo number_format($student_fig->elig_hhm); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->sanc_hhm); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->avail_hhm); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->vac_hhm); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->need_hhm); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->surp_w_hhm); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->surp_wo_hhm); ?></a></td>
                            
                              </tr>
                              <?php $i++;?>

                              
                               <?php
                                     
                                      array_push($sg_eligible,$student_fig->sg_eligible);
                                      array_push($sg_sanctioned,$student_fig->sg_sanctioned);
                                      array_push($vac_sg,$student_fig->vac_sg);
                                      array_push($sg_available,$student_fig->sg_available);
                                      array_push($sg_need,$student_fig->sg_need);
                                      array_push($sg_SWS,$student_fig->sg_SWS);
                                      array_push($sg_SWO,$student_fig->sg_SWO);
                                      array_push($bt_eli,$student_fig->bt_eli);
                                      array_push($bt_sanc,$student_fig->bt_sanc);
                                      array_push($bt_avail,$student_fig->bt_avail);
                                      array_push($bt_vac,$student_fig->bt_vac);
                                      array_push($bt_need,$student_fig->bt_need);
                                      array_push($bt_SWS,$student_fig->bt_SWS);
                                      array_push($bt_SWO,$student_fig->bt_SWO);
                                      array_push($elig_hhm,$student_fig->elig_hhm);
                                      array_push($sanc_hhm,$student_fig->sanc_hhm);
                                      array_push($avail_hhm,$student_fig->avail_hhm);
                                      array_push($vac_hhm,$student_fig->vac_hhm);
                                      array_push($need_hhm,$student_fig->need_hhm);
                                      array_push($surp_w_hhm,$student_fig->surp_w_hhm);
                                      array_push($surp_wo_hhm,$student_fig->surp_wo_hhm);
                    
                                     ?>
                                                        
                                        <?php  } ?>         
                                                      
                            </tbody>
                                                         <tfoot>
                                                          <tr>
                                                            <th>Total</th>
                                                            <th></th>
                                                           
                               <th style="text-align: center;" ><?php 
                                                            $vac_sg = array_sum($vac_sg);
                                                            array_push($total1,$vac_sg);
                                                            echo number_format($vac_sg);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $sg_need = array_sum($sg_need);
                                                            array_push($total1,$sg_need);
                                                            echo number_format($sg_need);?></th>
															  <th style="text-align: center;" ><?php 
                                                            $bt_vac = array_sum($bt_vac);
                                                            array_push($total1,$bt_vac);
                                                            echo number_format($bt_vac);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $bt_need = array_sum($bt_need);
                                                            array_push($total1,$bt_need);
                                                            echo number_format($bt_need);?></th>
															 <th style="text-align: center;" ><?php 
                                                            $sg_SWS = array_sum($sg_SWS);
                                                            array_push($total1,$sg_SWS);
                                                            echo number_format($sg_SWS);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $sg_SWO = array_sum($sg_SWO);
                                                            array_push($total1,$sg_SWO);
                                                            echo number_format($sg_SWO);?></th>
															  <th style="text-align: center;" ><?php 
                                                            $bt_SWS = array_sum($bt_SWS);
                                                            array_push($total1,$bt_SWS);
                                                            echo number_format($bt_SWS);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $bt_SWO = array_sum($bt_SWO);
                                                            array_push($total1,$bt_SWO);
                                                            echo number_format($bt_SWO);?></th>
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
                                                            $elig_hhm = array_sum($elig_hhm);
                                                            array_push($total1,$elig_hhm);
                                                            echo number_format($elig_hhm);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $sanc_hhm = array_sum($sanc_hhm);
                                                            array_push($total1,$sanc_hhm);
                                                            echo number_format($sanc_hhm);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $avail_hhm = array_sum($avail_hhm);
                                                            array_push($total1,$avail_hhm);
                                                            echo number_format($avail_hhm);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $vac_hhm = array_sum($vac_hhm);
                                                            array_push($total1,$vac_hhm);
                                                            echo number_format($vac_hhm);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $need_hhm = array_sum($need_hhm);
                                                            array_push($total1,$need_hhm);
                                                            echo number_format($need_hhm);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $surp_w_hhm = array_sum($surp_w_hhm);
                                                            array_push($total1,$surp_w_hhm);
                                                            echo number_format($surp_w_hhm);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $surp_wo_hhm = array_sum($surp_wo_hhm);
                                                            array_push($total1,$surp_wo_hhm);
                                                            echo number_format($surp_wo_hhm);?></th>
                                                            
                                                           
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