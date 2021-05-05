
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
                                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="#">
                                            <div class="col-md-5">
                                                <div class="bs-callout-lightsteelblue dashboard-stat2" style="padding: inherit;">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h4 class="font-green-sharp">
                                                        <span class="bottom" data-counter="counterup" data-value="34" style="font-size: 23px;">Total Teacher</span></h4>
                                                      
                                                         <?php if(!empty($staff_transfer_req)){ $over_total = 0;
            foreach($staff_transfer_req as $staff_tnfr){ 

         $total = $staff_tnfr->BT_tam + $staff_tnfr->BT_eng + $staff_tnfr->BT_mat + $staff_tnfr->BT_sci + $staff_tnfr->BT_soc + $staff_tnfr->SG + $staff_tnfr->PG_bio + $staff_tnfr-> PG_bot + $staff_tnfr->PG_tam + $staff_tnfr->PG_eng + $staff_tnfr->PG_che + $staff_tnfr->PG_phy + $staff_tnfr->PG_zool  + $staff_tnfr->PG_static + $staff_tnfr->PG_geograp + $staff_tnfr->PG_micro + $staff_tnfr->PG_bioche + $staff_tnfr->PG_math + $staff_tnfr->PG_com + $staff_tnfr->PG_politsc + $staff_tnfr->PG_ecomic + $staff_tnfr->PG_hsc + $staff_tnfr->PG_his + $staff_tnfr->PG_sc + $staff_tnfr->PG_ssc + $staff_tnfr->HS+$staff_tnfr->HSS + $staff_tnfr->Oth;
         $over_total = $over_total + $total;
         } } ?>
             <h4 style="font-size: 30px;">  <?php echo number_format($over_total); ?></h4>
                                                        </div>
                                                        <div class="icon" style="margin-top:9%">
                                                            <i class="fa fa-university"></i>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div></a>
                                            </div>
                                        </div>
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i>DSE-Staff Trasfer Request (Block-Wise)</div>
                                                        
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
					          <th style="text-align: center;">PG-Biology</th>
							  <th style="text-align: center;">PG-Botany</th>
							  <th style="text-align: center;">PG-Tamil</th>
							  <th style="text-align: center;">PG-English</th>
							  <th style="text-align: center;">PG-Chemistry</th>
							  <th style="text-align: center;">PG-Physics</th>
							  <th style="text-align: center;">PG-Zoology</th>
							  <th style="text-align: center;">PG-Statistics</th>
							  <th style="text-align: center;">PG-Geography</th>
							  <th style="text-align: center;">PG-Micro-Biology</th>
							  <th style="text-align: center;">PG-Bio-Chemistry</th>
							  <th style="text-align: center;">PG-MatheMatics</th>
							  <th style="text-align: center;">PG-Commerce</th>
							  <th style="text-align: center;">PG-PoliticalScience</th>
							  <th style="text-align: center;">PG-Economics</th>
							  <th style="text-align: center;">PG-HomeScience</th>
							  <th style="text-align: center;">PG-History</th>
							  <th style="text-align: center;">PG-Science</th>
							  <th style="text-align: center;">PG-SocialScience</th>
                              <th style="text-align: center;">High School HM</th>
							  <th style="text-align: center;">Higher Secondary<br> School HM</th>
                              <th style="text-align: center;">Others</th>

                              </tr>
                              </thead>
                              <tbody>
                              <?php $total1=[];?>
                              <?php if(!empty($staff_transfer_req)){ 
							  $total1=[]; $BT_tam= [];$BT_eng= [];$BT_mat= [];$BT_sci= []; $BT_soc=[]; $SG=[]; $HS= [];$HSS= []; $oth=[]; $PG_bio =[]; $PG_bot=[]; $PG_tam =[]; $PG_eng =[]; $PG_che=[]; $PG_phy=[]; $PG_zool=[]; $PG_static=[]; $PG_geograp=[]; $PG_micro=[]; $PG_bioche=[]; $PG_math=[];$PG_com=[]; $PG_politsc=[];$PG_ecomic=[]; $PG_hsc=[]; $PG_his=[]; $PG_sc=[]; $PG_ssc=[];



							  $i=1;foreach($staff_transfer_req as $staff_tnfr){ 
                                                              
                                ?>
                              <tr>
                              <td style="text-align: center;"><?php echo $i;?></td>
                              <td><a href="<?php echo base_url().'Collector/emis_staff_transfer_dse_req_teacher/?block_id='.$staff_tnfr->block_id?>">
                              <?php echo $staff_tnfr->block_name; ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->BT_tam); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->BT_eng); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->BT_mat); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->BT_sci); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->BT_soc); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->SG); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($staff_tnfr->PG_bio); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->PG_bot); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->PG_tam); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->PG_eng); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->PG_che); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->PG_phy); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->PG_zool); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($staff_tnfr->PG_static); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->PG_geograp); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($staff_tnfr->PG_micro); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->PG_bioche); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->PG_math); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->PG_com); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->PG_politsc); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->PG_ecomic); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->PG_hsc); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($staff_tnfr->PG_his); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->PG_sc); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($staff_tnfr->PG_ssc); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->HS); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($staff_tnfr->HSS); ?></a></td>
                              <td style="text-align: center;"><?php echo number_format($staff_tnfr->Oth); ?></a></td>
                              
                              </tr>
                              <?php $i++;?>

                              
                               <?php
                                      array_push($BT_tam,$staff_tnfr->BT_tam);
                                      array_push($BT_eng,$staff_tnfr->BT_eng);
                                      array_push($BT_mat,$staff_tnfr->BT_mat);
                                      array_push($BT_sci,$staff_tnfr->BT_sci);
                                      array_push($BT_soc,$staff_tnfr->BT_soc);
                                      array_push($SG,$staff_tnfr->SG);
									  array_push($PG_bio,$staff_tnfr->PG_bio);
                                      array_push($PG_bot,$staff_tnfr->PG_bot);
                                      array_push($PG_tam,$staff_tnfr->PG_tam);
                                      array_push($PG_eng,$staff_tnfr->PG_eng);
                                      array_push($PG_che,$staff_tnfr->PG_che);
                                      array_push($PG_phy,$staff_tnfr->PG_phy);
                                      array_push($PG_zool,$staff_tnfr->PG_zool);
									  array_push($PG_static,$staff_tnfr->PG_static);
                                      array_push($PG_geograp,$staff_tnfr->PG_geograp);
									  array_push($PG_micro,$staff_tnfr->PG_micro);
                                      array_push($PG_bioche,$staff_tnfr->PG_bioche);
                                      array_push($PG_math,$staff_tnfr->PG_math);
                                      array_push($PG_com,$staff_tnfr->PG_com);
                                      array_push($PG_politsc,$staff_tnfr->PG_politsc);
                                      array_push($PG_ecomic,$staff_tnfr->PG_ecomic);
                                      array_push($PG_hsc,$staff_tnfr->PG_hsc);
									  array_push($PG_his,$staff_tnfr->PG_his);
                                      array_push($PG_sc,$staff_tnfr->PG_sc);
									  array_push($PG_ssc,$staff_tnfr->PG_ssc);
                                      array_push($HS,$staff_tnfr->HS);
									  array_push($HSS,$staff_tnfr->HSS);
                                      array_push($oth,$staff_tnfr->Oth);
                                    
                    
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
															
															 
															<th style="text-align: center;" ><?php 
                                                            $PG_bio = array_sum($PG_bio);
                                                            array_push($total1,$PG_bio);
                                                            echo number_format($PG_bio);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $PG_bot = array_sum($PG_bot);
                                                            array_push($total1,$PG_bot);
                                                            echo number_format($PG_bot);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $PG_tam = array_sum($PG_tam);
                                                            array_push($total1,$PG_tam);
                                                            echo number_format($PG_tam);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $PG_eng = array_sum($PG_eng);
                                                            array_push($total1,$PG_eng);
                                                            echo number_format($PG_eng);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $PG_che = array_sum($PG_che);
                                                            array_push($total1,$PG_che);
                                                            echo number_format($PG_che);?></th>
							                                <th style="text-align: center;" ><?php 
                                                            $PG_phy = array_sum($PG_phy);
                                                            array_push($total1,$PG_phy);
                                                            echo number_format($PG_phy);?></th>
                                                            <th style="text-align: center;" ><?php 
                                                            $PG_zool = array_sum($PG_zool);
                                                            array_push($total1,$PG_zool);
                                                            echo number_format($PG_zool);?></th>
															
															   <th style="text-align: center;" ><?php 
                                                            $PG_static = array_sum($PG_static);
                                                            array_push($total1,$PG_static);
                                                            echo number_format($PG_static);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $PG_geograp = array_sum($PG_geograp);
                                                            array_push($total1,$PG_geograp);
                                                            echo number_format($PG_geograp);?></th>
											
															<th style="text-align: center;" ><?php 
                                                            $PG_micro = array_sum($PG_micro);
                                                            array_push($total1,$PG_micro);
                                                            echo number_format($PG_micro);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $PG_bioche = array_sum($PG_bioche);
                                                            array_push($total1,$PG_bioche);
                                                            echo number_format($PG_bioche);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $PG_math = array_sum($PG_math);
                                                            array_push($total1,$PG_math);
                                                            echo number_format($PG_math);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $PG_com = array_sum($PG_com);
                                                            array_push($total1,$PG_com);
                                                            echo number_format($PG_com);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $PG_politsc = array_sum($PG_politsc);
                                                            array_push($total1,$PG_politsc);
                                                            echo number_format($PG_politsc);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $PG_ecomic = array_sum($PG_ecomic);
                                                            array_push($total1,$PG_ecomic);
                                                            echo number_format($PG_ecomic);?></th>
															
															<th style="text-align: center;" ><?php 
                                                            $PG_hsc = array_sum($PG_hsc);
                                                            array_push($total1,$PG_hsc);
                                                            echo number_format($PG_hsc);?></th>
															
															   <th style="text-align: center;" ><?php 
                                                            $PG_his = array_sum($PG_his);
                                                            array_push($total1,$PG_his);
                                                            echo number_format($PG_his);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $PG_sc = array_sum($PG_sc);
                                                            array_push($total1,$PG_sc);
                                                            echo number_format($PG_sc);?></th>
															 <th style="text-align: center;" ><?php 
                                                            $PG_ssc = array_sum($PG_ssc);
                                                            array_push($total1,$PG_ssc);
                                                            echo number_format($PG_ssc);?></th>
                                                            <th style="text-align: center;" ><?php 
                                                            $HS = array_sum($HS);
                                                            array_push($total1,$HS);
                                                            echo number_format($HS);?></th>
															
															   <th style="text-align: center;" ><?php 
                                                            $HSS = array_sum($HSS);
                                                            array_push($total1,$HSS);
                                                            echo number_format($HSS);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $oth = array_sum($oth);
                                                            array_push($total1,$oth);
                                                            echo number_format($oth);?></th>
															
															
															
															
															
                                                            
                                                           
                                                           
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