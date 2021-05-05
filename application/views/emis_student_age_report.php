
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
            

  <?php $this->load->view('header.php'); ?>

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
                                        <h1>
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
                                                            <i class="fa fa-globe"></i>Students Report-By Age  </div>
                                                        
                                                    </div>
                          <div class="portlet-body">

                                          <?php $Government=0;$fullyaid=0;$unaidteachtot=0;$PartiallyAided=0;$CentralGovt=0; ?>
                              <table class="table table-striped table-bordered table-hover" id="sample_3">
                              <thead>
                              <tr>
                                <th style="text-align: center;">S.No</th>
                                <th>Age</th>  
                                <th>PreKG-Boys</th>
                                <th>PreKG-Girls</th>
                                <th>LKG-Boys</th>
                                <th>LKG-Girls</th>
                                <th>UKG-Boys</th>
                                <th>UKG-Girls</th>
                                <th>I-Boys</th>
                                <th>I-Girls</th>
                                <th>II-Boys</th>
                                <th>II-Girls</th>
                                <th>III-Boys</th>
                                <th>III-Girls</th>
                                <th>IV-Boys</th>
                                <th>IV-Girls</th>
                                <th>V-Boys</th>
                                <th>V-Girls</th>
                                <th>VI-Boys</th>
                                <th>VI-Girls</th>
                                <th>VII-Boys</th>
                                <th>VII-Girls</th>
                                <th>VIII-Boys</th>
                                <th>VIII-Girls</th>
                                <th>IX-Boys</th>
                                <th>IX-Girls</th>
                                <th>X-Boys</th>
                                <th>X-Girls</th>
                                <th>XI-Boys</th>
                                <th>XI-Girls</th>
                                <th>XII-Boys</th>
                                <th>XII-Girls</th>
                                <th>Total</th>
                                                                   
                              </tr>
                              </thead>
                              <tbody>
                              <?php $total1=[]; ?>
                              <?php if(!empty($student_age)){ $Gov_tot= [];$FA_tot= [];$UA_tot= [];$PA_tot= []; $CG_tot= []; $total1 = []; $tot=[]; $Prkg_b=[]; $Prkg_g=[]; $lkg_b=[]; $lkg_g=[]; $ukg_b=[]; $ukg_g=[]; $c1_b=[]; $c1_g=[]; $c2_b=[]; $c2_g=[]; $c3_b=[]; $c3_g=[]; $c4_b=[]; $c4_g=[]; $c5_b=[]; $c5_g=[]; $c6_b=[]; $c6_g=[]; $c7_b=[]; $c7_g=[]; $c8_b=[]; $c8_g=[]; $c9_b=[]; $c9_g=[]; $c10_b=[]; $c10_g=[]; $c11_b=[]; $c11_g=[]; $c12_b=[]; $c12_g=[]; $total_t=[]; $total_b=[]; $total_g=[]; $total=[]; $i=1;foreach($student_age as $sd){ $j=0; $sum=0;  ?>
                                <tr>
                                   <td  class="center"><?php echo($i++); ?></td>
                                   <td  class="center"><?php echo($sd->Age); ?></td>
                                   <td  class="center"><?= $sd->PREKG_b ?></td>
                                   <td  class="center"><?= $sd->PREKG_g ?></td>
                                   <td  class="center"><?= $sd->LKG_b ?></td>
                                   <td  class="center"><?= $sd->LKG_g ?></td> 
                                   <td  class="center"><?= $sd->UKG_b ?></td>
                                   <td  class="center"><?= $sd->UKG_g ?></td> 
                                   <td  class="center"><?= $sd->c1_b ?></td>
                                   <td  class="center"><?= $sd->c1_g ?></td>
                                   <td  class="center"><?= $sd->c2_b ?></td> 
                                   <td  class="center"><?= $sd->c2_g ?></td>
                                   <td  class="center"><?= $sd->c3_b ?></td> 
                                   <td  class="center"><?= $sd->c3_g ?></td> 
                                   <td  class="center"><?= $sd->c4_b ?></td> 
                                   <td  class="center"><?= $sd->c4_g ?></td>
                                   <td  class="center"><?= $sd->c5_b ?></td>
                                   <td  class="center"><?= $sd->c5_g ?></td>
                                   <td  class="center"><?= $sd->c6_b ?></td>
                                   <td  class="center"><?= $sd->c6_g ?></td>
                                   <td  class="center"><?= $sd->c7_b ?></td>
                                   <td  class="center"><?= $sd->c7_g ?></td> 
                                   <td  class="center"><?= $sd->c8_b ?></td> 
                                   <td  class="center"><?= $sd->c8_g ?></td>
                                   <td  class="center"><?= $sd->c9_b ?></td>
                                   <td  class="center"><?= $sd->c9_g ?></td>
                                   <td  class="center"><?= $sd->c10_b ?></td>
                                   <td  class="center"><?= $sd->c10_g ?></td>
                                   <td  class="center"><?= $sd->c11_b ?></td>
                                   <td  class="center"><?= $sd->c11_g ?></td>
                                   <td  class="center"><?= $sd->c12_b ?></td> 
                                   <td  class="center"><?= $sd->c12_g ?></td>
                                   <td  class="center"><?= $sd->tot ?></td>
                                  
                                                                
                            </tr>
                                     <?php
                                      array_push($tot,$sd->cnt);
                                       array_push($Prkg_b,$sd->PREKG_b);
                                      array_push($Prkg_g,$sd->PREKG_g);
                                      array_push($lkg_b,$sd->LKG_b);
                                      array_push($lkg_g,$sd->LKG_g);
                                      array_push($ukg_b,$sd->UKG_b);
                                      array_push($ukg_g,$sd->UKG_g);
                                      array_push($c1_b,$sd->c1_b);
                                      array_push($c1_g,$sd->c1_g);
                                      array_push($c2_b,$sd->c2_b);
                                      array_push($c2_g,$sd->c2_g);
                                      array_push($c3_b,$sd->c3_b);
                                      array_push($c3_g,$sd->c3_g);
                                      array_push($c4_b,$sd->c4_b);
                                      array_push($c4_g,$sd->c4_g);
                                      array_push($c5_b,$sd->c5_b);
                                      array_push($c5_g,$sd->c5_g);
                                      array_push($c6_b,$sd->c6_b);
                                      array_push($c6_g,$sd->c6_g);
                                      array_push($c7_b,$sd->c7_b);
                                      array_push($c7_g,$sd->c7_g);
                                      array_push($c8_b,$sd->c8_b);
                                      array_push($c8_g,$sd->c8_g);
                                      array_push($c9_b,$sd->c9_b);
                                      array_push($c9_g,$sd->c9_g);
                                      array_push($c10_b,$sd->c10_b);
                                      array_push($c10_g,$sd->c10_g);
                                      array_push($c11_b,$sd->c11_b);
                                      array_push($c11_g,$sd->c11_g);
                                      array_push($c12_b,$sd->c12_b);
                                      array_push($c12_g,$sd->c12_g);
                                      array_push($total_b,$sd->total_b);
                                       array_push($total_g,$sd->total_g);
                                        array_push($tot,$sd->tot);
                                   }  ?>
                                                      
                                                            </tbody>
                                                         <tfoot>
                                                           <th  class="center">Total</th>
                                                              <th></th>
                                                         
                                                             
                                                             <th style="text-align: center;" ><?php 
                                                            $Prkg_b = array_sum($Prkg_b);
                                                            array_push($total1,$Prkg_b);
                                                            echo number_format($Prkg_b);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $Prkg_g = array_sum($Prkg_g);
                                                            array_push($total1,$Prkg_g);
                                                            echo number_format($Prkg_g);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $lkg_b = array_sum($lkg_b);
                                                            array_push($total1,$lkg_b);
                                                            echo number_format($lkg_b);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $lkg_g = array_sum($lkg_g);
                                                            array_push($total1,$lkg_g);
                                                            echo number_format($lkg_g);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $ukg_b = array_sum($ukg_b);
                                                            array_push($total1,$ukg_b);
                                                            echo number_format($ukg_b);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $ukg_g = array_sum($ukg_g);
                                                            array_push($total1,$ukg_g);
                                                            echo number_format($ukg_g);?></th>
                                                            <th style="text-align: center;" ><?php 
                                                            $c1_b = array_sum($c1_b);
                                                            array_push($total1,$c1_b);
                                                            echo number_format($c1_b);?></th>
                                                               <th style="text-align: center;" ><?php 
                                                            $c1_g = array_sum($c1_g);
                                                            array_push($total1,$c1_g);
                                                            echo number_format($c1_g);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $c2_b= array_sum($c2_b);
                                                            array_push($total1,$c2_b);
                                                            echo number_format($c2_b);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c2_g = array_sum($c2_g);
                                                            array_push($total1,$c2_g);
                                                            echo number_format($c2_g);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c3_b = array_sum($c3_b);
                                                            array_push($total1,$c3_b);
                                                            echo number_format($c3_b);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c3_g = array_sum($c3_g);
                                                            array_push($total1,$c3_g);
                                                            echo number_format($c3_g);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c4_b = array_sum($c4_b);
                                                            array_push($total1,$c4_b);
                                                            echo number_format($c4_b);?></th>
                                                            <th style="text-align: center;" ><?php 
                                                            $c4_g = array_sum($c4_g);
                                                            array_push($total1,$c4_g);
                                                            echo number_format($c4_g);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $c5_b = array_sum($c5_b);
                                                            array_push($total1,$c5_b);
                                                            echo number_format($c5_b);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c5_g = array_sum($c5_g);
                                                            array_push($total1,$c5_g);
                                                            echo number_format($c5_g);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c6_b = array_sum($c6_b);
                                                            array_push($total1,$c6_b);
                                                            echo number_format($c6_b);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c6_g = array_sum($c6_g);
                                                            array_push($total1,$c6_g);
                                                            echo number_format($c6_g);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c7_b = array_sum($c7_b);
                                                            array_push($total1,$c7_b);
                                                            echo number_format($c7_b);?></th>
                                                            <th style="text-align: center;" ><?php 
                                                            $c7_g = array_sum($c7_g);
                                                            array_push($total1,$c7_g);
                                                            echo number_format($c7_g);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $c8_b = array_sum($c8_b);
                                                            array_push($total1,$c8_b);
                                                            echo number_format($c8_b);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c8_g = array_sum($c8_g);
                                                            array_push($total1,$c8_g);
                                                            echo number_format($c8_g);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c9_b = array_sum($c9_b);
                                                            array_push($total1,$c9_b);
                                                            echo number_format($c9_b);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c9_g = array_sum($c9_g);
                                                            array_push($total1,$c9_g);
                                                            echo number_format($c9_g);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c10_b = array_sum($c10_b);
                                                            array_push($total1,$c10_b);
                                                            echo number_format($c10_b);?></th>
                                                            <th style="text-align: center;" ><?php 
                                                            $c10_g = array_sum($c10_g);
                                                            array_push($total1,$c10_g);
                                                            echo number_format($c10_g);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $c11_b = array_sum($c11_b);
                                                            array_push($total1,$c11_b);
                                                            echo number_format($c11_b);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $c11_g = array_sum($c11_g);
                                                            array_push($total1,$c11_g);
                                                            echo number_format($c11_g);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c12_b = array_sum($c12_b);
                                                            array_push($total1,$c12_b);
                                                            echo number_format($c12_b);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c12_g = array_sum($c12_g);
                                                            array_push($total1,$c12_g);
                                                            echo number_format($c12_g);?></th>
                                                               <th style="text-align: center;" ><?php 
                                                            $tot = array_sum($tot);
                                                            array_push($total1,$tot);
                                                            echo number_format($tot);?></th>
                                                            <!--  <th style="text-align: center;" ><?php 
                                                            $total = array_sum($total);
                                                            array_push($total1,$total);
                                                            echo number_format($total);?></th>-->
                                                                
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
    

        <?php $this->load->view('scripts.php'); ?>
 

        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
            <script type="text/javascript">
              $(document).ready(function() {
    $('#sample_3').DataTable( {
      
        "paging":   false,
        "ordering": false,
        "info":     false,
       
    } );
} );

            </script>   
             
    </body>

</html>