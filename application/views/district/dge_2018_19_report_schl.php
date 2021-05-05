
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
            

  <?php $this->load->view('Ceo_District/header.php'); ?>

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
                                       <h1><!--Past Class 12 Student Status-->Laptop Distribution Monitoring Report
                                            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                          <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
                                           <li role="presentation">
                                            <a href="<?php echo base_url().'Ceo_District/dge_2017_18_report_schl'; ?>">
                                              <span class="text">Class 12 Status-(2017-2018)</span>
                                            </a>
                                          </li>
                                           <li role="presentation">
                                            <a href="<?php echo base_url().'Ceo_District/dge_2018_19_report_schl'; ?>">
                                              <span class="text">Class 12 Status-(2018-2019)</span>
                                            </a>
                                          </li>
                                        
                                                </ul>
                                            </div> 
                                        </h1>
                                    <div class="row">
                         <div class="col-md-8">
                         </div>
                         <div class="col-md-12">
                         <h5 style="color:red;"><strong>Total students :</strong>All students in Government Schools, Aided Schools and Aided Sections in Partially Aided Schools. </h5>
                         <h5 style="color:red;"><strong>Distributed :</strong>Number of students for whom laptop has been distributed</h5>
                       
                         </div>
                         </div>
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
                                                            <i class="fa fa-globe"></i>Laptop Distribution-(2018-2019) </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                          <?php $Government=0;$fullyaid=0;$unaidteachtot=0;$PartiallyAided=0;$CentralGovt=0; ?>
                              <table class="table table-striped table-bordered table-hover" id="sample_2">
                              <thead>
                              <tr>
                                <th style="text-align: center;">S.No</th>
                                   <th style="text-align: center;">Block</th>  
                                <th style="text-align: center;">School</th>  

                                <th style="text-align: center;">UDISE Code</th>  
                                 <th style="text-align: center;">School Type</th>  
                                <th style="text-align: center;">Total Students</th>  
                                <th style="text-align: center;">Distributed</th>  
                                 <th style="text-align: center;">Not Distributed</th>  
                                                                   
                              </tr>
                              </thead>
                              <tbody>
                              <?php $total1=[]; ?>
                              <?php if(!empty($student_migration_details)){  $std_cnt1= [];$assigned1= [];$tot1= [];$PA_tot= []; $CG_tot= []; $sum1=[]; $assigned_sum1=[]; $not_marked1=[]; $i=1;foreach($student_migration_details as $key ){ $j=0; $sum=0; $tot=0; ?>
                                  <tr>
                                      <td style="text-align: center;"><?php echo($i++); ?></td>
                                       <td><?php echo($key->block_name); ?></td>
                                      <td><?php echo($key->school_name); ?></td>
                                       <td><?php echo($key->udise_code); ?></td>
                                        <td><?php echo($key->school_type); ?></td>
                                      <td style="text-align: center;"><?php echo $key->std_cnt;?></td>
                                      <td style="text-align: center;"><?php echo $key->assigned;?></td>
                                      <td style="text-align: center;"><?php echo $tot=$key->std_cnt-$key->assigned;?></td>
                                 </tr>  
                                   <?php  
                                      array_push($sum1,$key->std_cnt);
                                      array_push($assigned_sum1,$key->assigned);
                                      array_push($not_marked1,$tot);
                                      }  ?>  
                            </tbody>
                            <tfoot>
                              <th  class="center">Total</th>
                                                              <th></th>
                                                               <th></th>
                                                                <th></th>
                                                                 <th></th>
                                                           <th style="text-align: center;" ><?php 
                                                            $sum1 = array_sum($sum1);
                                                            array_push($total1,$sum1);
                                                            echo number_format($sum1);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $assigned_sum1 = array_sum($assigned_sum1);
                                                            array_push($total1,$assigned_sum1);
                                                            echo number_format($assigned_sum1);?></th>
                                                              <th style="text-align: center;" ><?php 
                                                            $not_marked1 = array_sum($not_marked1);
                                                            array_push($total1,$not_marked1);
                                                            echo number_format($not_marked1);?></th>
                           
                            </tfoot> 
                            <?php  } ?>
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