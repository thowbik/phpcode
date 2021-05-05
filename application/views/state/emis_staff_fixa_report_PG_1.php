
<?php 
//print_r(1);
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
                                                            <i class="fa fa-globe"></i>DSE-Staff Fixation Report Block-Wise</div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                          <?php $Government=0;$fullyaid=0;$unaidteachtot=0;$PartiallyAided=0;$CentralGovt=0; ?>
                                   <table class="table table-striped table-bordered table-hover" id="sample_2">
                                  <thead>
                                 <tr>
                                <th style="text-align: center;">S.No</th>
                              <th>Block</th>                        
                             
                             

                               <th style="text-align: center;">PG-Eligible</th>
                              <th style="text-align: center;">PG-Sanctioned</th>
                            
                              <th style="text-align: center;">PG-Teacher Working</th>
                                <th style="text-align: center;">PG-Eligible</br> Vacancy</br>To Fill Up</th>
                              <th style="text-align: center;">PG-Needed</th>
                              <th style="text-align: center;">PG-Surplus Post<br>with Person</th>
                              <th style="text-align: center;">PG-Surplus Post<br>without Person</th>

                             

    

                              </tr>
                              </thead>
                              <tbody>
                              <?php $total1=[];?>
                              <?php if(!empty($staff_fixa_report)){ $total1=[]; $eligible= [];$sanctioned= [];$available= [];$need= []; $SWS= []; $SWO= []; $sg_eligible= [];$sg_sanctioned= [];$sg_available= [];$sg_need= []; $sg_SWS= []; $sg_SWO= []; $bt_eli= [];$bt_sanc= [];$bt_avail= [];$bt_need= []; $bt_SWS= []; $bt_SWO= [];  $elig_hhm=[]; $sanc_hhm=[]; $avail_hhm=[]; $surp_w_hhm=[]; $surp_wo_hhm=[]; $need_hhm=[]; $vac_sg=[]; $bt_vac=[]; $vac_high_tot_pg=[]; $vac_hhm=[]; $i=1;foreach($staff_fixa_report as $student_fig){ 
                                                              
                                
                                ?>
                              <tr>
                              <td style="text-align: center;"><?php echo $i;?></td>
                              <td><a href="<?php echo base_url().'State/emis_staff_fixa_report_PG_block1/?district_id='.$student_fig->district_id?>">
                              <?php echo $student_fig->district_name; ?></a></td>
                             
                              
                               <td style="text-align: center;"><?php echo number_format($student_fig->eligible); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->sanctioned); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->available); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->vac_high_tot_pg); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->need); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->SWS); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($student_fig->SWO); ?></a></td>
                               
                            
                              </tr>
                              <?php $i++;?>

                              
                               <?php
                                      array_push($eligible,$student_fig->eligible);
                                      array_push($sanctioned,$student_fig->sanctioned);
                                      array_push($available,$student_fig->available);
                                      array_push($vac_high_tot_pg,$student_fig->vac_high_tot_pg);
                                      array_push($need,$student_fig->need);
                                      array_push($SWS,$student_fig->SWS);
                                      array_push($SWO,$student_fig->SWO);
                                     
                    
                                     ?>
                                                        
                                        <?php  } ?>         
                                                      
                            </tbody>
                                                         <tfoot>
                                                          <tr>
                                                            <th>Total</th>
                                                            <th></th>
                                                           
                              
                                                         
                                                             <th style="text-align: center;" ><?php 
                                                            $eligible = array_sum($eligible);
                                                            array_push($total1,$eligible);
                                                            echo number_format($eligible);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $sanctioned = array_sum($sanctioned);
                                                            array_push($total1,$sanctioned);
                                                            echo number_format($sanctioned);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $available = array_sum($available);
                                                            array_push($total1,$available);
                                                            echo number_format($available);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $vac_high_tot_pg = array_sum($vac_high_tot_pg);
                                                            array_push($total1,$vac_high_tot_pg);
                                                            echo number_format($vac_high_tot_pg);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $need = array_sum($need);
                                                            array_push($total1,$need);
                                                            echo number_format($need);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $SWS = array_sum($SWS);
                                                            array_push($total1,$SWS);
                                                            echo number_format($SWS);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $SWO = array_sum($SWO);
                                                            array_push($total1,$SWO);
                                                            echo number_format($SWO);?></th>
                                                          
                                                            
                                                           
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