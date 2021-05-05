
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
            

  <?php $this->load->view('corporation/header.php'); ?>

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
                                                            <i class="fa fa-globe"></i>DEE-Staff Trasfer Request (Block-Wise)</div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                          <?php $Government=0;$fullyaid=0;$unaidteachtot=0;$PartiallyAided=0;$CentralGovt=0; ?>
                                  <table class="table table-striped table-bordered table-hover" id="sample_2">
                                  <thead>
                                 <tr>
                                <th style="text-align: center;">S.No</th>
                              <th>Block</th>                        
                              <th style="text-align: center;">BT-Tamil</th>
                              <th style="text-align: center;">BT-English</th>
                               <th style="text-align: center;">BT-Maths</th>
                              <th style="text-align: center;">BT-Science</th>
                              <th style="text-align: center;">BT-Social</th>
                           
                               <th style="text-align: center;">SG</th>


                            

                              </tr>
                              </thead>
                              <tbody>
                              <?php $total1=[];?>
                              <?php if(!empty($staff_transfer_req)){ $total1=[]; $BT_tam= [];$BT_eng= [];$BT_mat= [];$BT_sci= []; $BT_soc= []; $SG= []; $i=1;foreach($staff_transfer_req as $staff_tnfr){ 
                                                              
                                ?>
                              <tr>
                              <td style="text-align: center;"><?php echo $i;?></td>
                              <td><a href="<?php echo base_url().'corporation/emis_staff_transfer_req_teacher/?block_id='.$staff_tnfr->block_id?>">
                              <?php echo $staff_tnfr->block_name; ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->BT_tam); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->BT_eng); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->BT_mat); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->BT_sci); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->BT_soc); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->SG); ?></a></td>
                              
                              
                            
                              </tr>
                              <?php $i++;?>

                              
                               <?php
                                      array_push($BT_tam,$staff_tnfr->BT_tam);
                                      array_push($BT_eng,$staff_tnfr->BT_eng);
                                      array_push($BT_mat,$staff_tnfr->BT_mat);
                                      array_push($BT_sci,$staff_tnfr->BT_sci);
                                      array_push($BT_soc,$staff_tnfr->BT_soc);
                                      array_push($SG,$staff_tnfr->SG);
                                    
                    
                                     ?>
                                                        
                                        <?php  } ?>         
                                                      
                            </tbody>
                                                         <tfoot>
                                                          <tr>
                                                            <th>Total</th>
                                                            <th></th>
                                                            <th style="text-align: center;" ><?php 
                                                            $BT_tam = array_sum($BT_tam);
                                                            array_push($total1,$BT_tam);
                                                            echo number_format($BT_tam);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $BT_eng = array_sum($BT_eng);
                                                            array_push($total1,$BT_eng);
                                                            echo number_format($BT_eng);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $BT_mat = array_sum($BT_mat);
                                                            array_push($total1,$available);
                                                            echo number_format($BT_mat);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $BT_sci = array_sum($BT_sci);
                                                            array_push($total1,$BT_sci);
                                                            echo number_format($BT_sci);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $BT_soc = array_sum($BT_soc);
                                                            array_push($total1,$BT_soc);
                                                            echo number_format($BT_soc);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $SG = array_sum($SG);
                                                            array_push($total1,$SG);
                                                            echo number_format($SG);?></th>
                                                           
                                                           
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