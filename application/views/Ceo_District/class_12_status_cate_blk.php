
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
                                        <h1>Past Class 12 Student Status (Category-Wise)
                                            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                          <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist" style="width:max-content">
                                             <li role="presentation">
                                            <a href="<?php echo base_url().'Ceo_District/class_12_status_cate_17_18_blk'?>">
                                              <span class="text">Class 12 Status -(2017-2018)  </span><br/>
                                            </a>
                                          </li>
                                           <li role="presentation">
                                            <a href="<?php echo base_url().'Ceo_District/class_12_status_cate_blk'?>">
                                              <span class="text">Class 12 Status-(2018-2019)</span>
                                            </a>
                                          </li>
                                          
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
                                                            <i class="fa fa-globe"></i>Class 12 Status - (Category-wise) - (2018-2019)   </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                          <?php $Government=0;$fullyaid=0;$unaidteachtot=0;$PartiallyAided=0;$CentralGovt=0; ?>
                              <table class="table table-striped table-bordered table-hover" id="sample_2">
                              <thead>
                              <tr>
                              <th style="text-align: center;">S.No</th>
                              <th>Block</th>                        
                              <th style="text-align: center;">joined<br/> arts and science</th>
                              <th style="text-align: center;">joined <br/> arts and science / law college</th>
                               <th style="text-align: center;">joined <br/> engineering college</th>
                              <th style="text-align: center;">joined<br/> medical college</th>
                             <th style="text-align: center;">joined <br/>polytechnic college</th>
                              <th style="text-align: center;">Not studying <br/> / working</th>
                              <th style="text-align: center;">Other</th>
                              <th style="text-align: center;">Working</th>   
                              <th style="text-align: center;"> Total</th>   
                                                                   
                              </tr>
                              </thead>
                              <tbody>
                              <?php $total1=[];?>
                                 <?php if(!empty($student_migration_details)){ $arts_sci= [];$arts_sci_law= [];$eng= [];$medi_clg= []; $poly_clg= []; $stud_work=[]; $working=[]; $other=[];  $i=1;foreach($student_migration_details as $student_mig){  
                                                              
                                                            $total = $student_mig->government +$student_mig->fullyaided + $student_mig->PartiallyAided + $student_mig->unaided; ?>
                              <tr>
                              <td style="text-align: center;"><?php echo $i;?></td>
                            <td>
                              <?php echo $student_mig->block_name; ?></td>
                             <td style="text-align: center;"> <?php echo number_format($student_mig->arts_sci); ?></td>
                             <td style="text-align: center;"> <?php echo number_format($student_mig->arts_sci_law); ?></td>
                             <td style="text-align: center;"> <?php echo number_format($student_mig->eng); ?></td>
                              <td style="text-align: center;"> <?php echo number_format($student_mig->medi_clg); ?></td>
                              <td style="text-align: center;"> <?php echo number_format($student_mig->poly_clg); ?></td>
                              <td style="text-align: center;"> <?php echo number_format($student_mig->stud_work);?></td>
                              <td style="text-align: center;"> <?php echo number_format($student_mig->other); ?></td>
                              <td style="text-align: center;"> <?php echo number_format($student_mig->working); ?></td>
                              <td style="text-align: center;"> <?php echo number_format($student_mig->arts_sci+$student_mig->arts_sci_law+$student_mig->eng+$student_mig->medi_clg+$student_mig->poly_clg+$student_mig->stud_work+$student_mig->working+$student_mig->other); ?></td>
                              <!--<td> <?php echo number_format($det->total); ?></td>-->
                              </tr>
                              <?php $i++;?>

                              <?php
                                                            array_push($arts_sci,$student_mig->arts_sci);
                                                            array_push($arts_sci_law,$student_mig->arts_sci_law);
                                                            array_push($eng,$student_mig->eng);
                                                            array_push($medi_clg,$student_mig->medi_clg);
                                                            array_push($poly_clg,$student_mig->poly_clg);
                                                            array_push($stud_work,$student_mig->stud_work);
                                                            array_push($working,$student_mig->working);
                                                            array_push($other,$student_mig->other);
                                                           
                                                       } ?>
                                                        
                                                 
                                                        <?php } ?>
                            </tbody>
                                                         <tfoot>
                                                                <tr>
                                                            <th>Total</th>
                                                            <th></th>
                                                            <th style="text-align: center;"><?php 
                                                            $arts_sci = array_sum($arts_sci);
                                                            array_push($total1,$arts_sci);
                                                            echo number_format($arts_sci);?></th>
                                                            <th style="text-align: center;"><?php 
                                                                $arts_sci_law = array_sum($arts_sci_law);
                                                                array_push($total1,$arts_sci_law);
                                                            echo number_format($arts_sci_law);?></th>
                                                            <th style="text-align: center;"><?php 
                                                             $eng = array_sum($eng);
                                                                array_push($total1,$eng);
                                                           echo number_format($eng);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $medi_clg = array_sum($medi_clg);
                                                                array_push($total1,$medi_clg);
                                                                echo number_format($medi_clg);?></th>
                                                                 <th style="text-align: center;"><?php 
                                                            $poly_clg = array_sum($poly_clg);
                                                                array_push($total1,$poly_clg);
                                                                echo number_format($poly_clg);?></th>
                                                                   <th style="text-align: center;"><?php 
                                                            $stud_work = array_sum($stud_work);
                                                                array_push($total1,$stud_work);
                                                                echo number_format($stud_work);?></th>
                                                                  <th style="text-align: center;"><?php 
                                                            $working = array_sum($working);
                                                                array_push($total1,$working);
                                                                echo number_format($working);?></th>
                                                                   <th style="text-align: center;"><?php 
                                                            $other = array_sum($other);
                                                                array_push($total1,$other);
                                                                echo number_format($other);?></th>
                                                             <th style="text-align: center;"><?php echo number_format($total=$arts_sci+ $arts_sci_law+$eng+$medi_clg+$poly_clg+$stud_work+$working+$other);?></th>
                                                          
                                                          
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