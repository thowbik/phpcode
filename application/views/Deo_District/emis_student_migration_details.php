
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
            

  <?php $this->load->view('Deo_District/header.php'); ?>

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
                                                            <i class="fa fa-globe"></i>Student Migration  Report - District-Wise</div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                          <?php $Government=0;$fullyaid=0;$unaidteachtot=0;$PartiallyAided=0;$CentralGovt=0; ?>
                                  <table class="table table-striped table-bordered table-hover" id="sample_2">
                                  <thead>
                                 <tr>
                                <th style="text-align: center;">S.No</th>
                                <th>District</th>                        
                                <th style="text-align: center;">Gov-Aid</th>
                                <th style="text-align: center;">Gov-Pvt</th>
                                <th style="text-align: center;">Gov-Otr</th>

                                <th>Total Outflow</th>
                                <th style="text-align: center;">Pvt-Gov</th>
                                <th style="text-align: center;">Aid-Gov</th>
                                <th style="text-align: center;">Otr-Gov</th>
                                <th style="text-align: center;">Total Inflow</th>
                                <th style="text-align: center;">Net Change</th>
                              <!--<th>Total</th>-->
                                                                   
                              </tr>
                              </thead>
                              <tbody>
                              <?php $total1=[];?>
                              <?php if(!empty($student_migration_details)){ $gtofa= [];$gtoua= [];$gtopa= [];$fatog= []; $uatog= []; $patog= []; $i=1;foreach($student_migration_details as $student_mig){ 
                                                              
                                                            $total = $student_mig->gtofa +$student_mig->gtoua + $student_mig->gtopa; 
                                                            $tot_inflow=$student_mig->fatog +$student_mig->uatog + $student_mig->patog;
                                                            $Net_change=$tot_inflow-$total;?>
                              <tr>
                              <td style="text-align: center;"><?php echo $i;?></td>
                            <td>
                              <?php echo $student_mig->block_name; ?></td>
                              <td style="text-align: center;"><?php echo number_format($student_mig->gtofa); ?></a></td>

                           <td style="text-align: center;"><?php echo number_format($student_mig->gtoua); ?></a></td>

                            <td style="text-align: center;"><?php echo number_format($student_mig->gtopa); ?></a></td>
                <td style="text-align: center; font-weight: bold; color: red"> <?php echo number_format($total);?></td>
                           <td style="text-align: center;"> <?php echo number_format($student_mig->uatog); ?></td>
                           <td style="text-align: center;"> <?php echo number_format($student_mig->fatog); ?></td>
                        <td style="text-align: center;"> <?php echo number_format($student_mig->patog); ?></td>

          <td style="text-align: center; font-weight: bold ;color:green;"> <?php echo number_format($tot_inflow);?></td>
                                 <?php 
                               if($Net_change>=0)
                               {
                                ?>
                               <td style="text-align: center; font-weight: bold; color:green"> 

                                <?php echo number_format($Net_change);?></td>
                                <?php
                                }

                                else
                                {
                                  ?>
                                  <td style="text-align: center; font-weight: bold;color:red"> 

                                <?php echo number_format($Net_change);?></td>
                                  <?php
                                }
                                ?>
                              <!--<td> <?php echo number_format($det->total); ?></td>-->
                              </tr>
                              <?php $i++;?>

                              <?php
                                                            array_push($gtofa,$student_mig->gtofa);
                                                            array_push($gtoua,$student_mig->gtoua);
                                                            array_push($gtopa,$student_mig->gtopa);
                                                            array_push($fatog,$student_mig->fatog);
                                                            array_push($uatog,$student_mig->uatog);
                                                            array_push($patog,$student_mig->patog);

                                                            
                                                           
                                                       } ?>
                                                        
                                                 
                                                      
                            </tbody>
                                                         <tfoot>
                                                                <tr>
                                                            <th>Total</th>
                                                            <th></th>
                                                            <th style="text-align: center;" ><a href="<?php echo base_url().'Deo_District/get_migration_detail_student/?school_type_from='.'Government'.'&school_type_to='.'Fully Aided'?>"> <?php 
                                                            $gtofa = array_sum($gtofa);
                                                            array_push($total1,$gtofa);
                                                            echo number_format($gtofa);?></a></th>
                                                            <th style="text-align: center;"><a href="<?php echo base_url().'Deo_District/get_migration_detail_student/?school_type_from='.'Government'.'&school_type_to='.'Un-aided'?>"> <?php 
                                                                $gtoua = array_sum($gtoua);
                                                                array_push($total1,$gtoua);
                                                            echo number_format($gtoua);?></a></th>
                                                            <th style="text-align: center;"><a href="<?php echo base_url().'Deo_District/get_migration_detail_student/?school_type_from='.'Government'.'&school_type_to='.'Partially Aided'?>"><?php 
                                                             $gtopa = array_sum($gtopa);
                                                                array_push($total1,$gtopa);
                                                           echo number_format($gtopa);?></a></th>
                                                               <th style="text-align: center; color: red"><?php echo $tot=$gtofa+$gtoua+ $gtopa;?></th>

                                                             <th style="text-align: center;"><a href="<?php echo base_url().'Deo_District/get_migration_detail_student/?school_type_from='.'Un-aided'.'&school_type_to='.'Government'?>"><?php 
                                                             $uatog = array_sum($uatog);
                                                                array_push($total1,$uatog);
                                                           echo number_format($uatog);?></a></th>
                                                             <th style="text-align: center;"><a href="<?php echo base_url().'Deo_District/get_migration_detail_student/?school_type_from='.'Fully Aided'.'&school_type_to='.'Government'?>"><?php 
                                                             $fatog = array_sum($fatog);
                                                                array_push($total1,$fatog);
                                                           echo number_format($fatog);?></a></th>
                                                           
                                                             <th style="text-align: center;"><a href="<?php echo base_url().'Deo_District/get_migration_detail_student/?school_type_from='.'Partially Aided'.'&school_type_to='.'Government'?>"><?php 
                                                             $patog = array_sum($patog);
                                                                array_push($total1,$patog);
                                                           echo number_format($patog);?></a></th>
                                                            <th style="text-align: center; color:green;"><?php echo $total_inflow=$fatog+$uatog+ $patog;?></th>

                                                           
                                                          
                                                           <?php $Net_change=$total_inflow-$tot;
                               if($Net_change>=0)
                               {
                                ?>
                               <th style="text-align: center; font-weight: bold; color:green"> 

                                <?php echo number_format($Net_change);?></th>
                                <?php
                                }

                                else
                                {
                                  ?>
                                  <th style="text-align: center; font-weight: bold;color:red"> 

                                <?php echo number_format($Net_change);?></th>
                                  <?php
                                }
                                ?>
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