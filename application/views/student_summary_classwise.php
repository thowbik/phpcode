
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
                                            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                          <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
                                             <li role="presentation">
                                            <a href="<?php echo base_url().'Home/student_summary_classwise'?>">
                                              <span class="text">Student Summary 1st-10th std</span><br/>
                                            </a>
                                          </li>
                                           <li role="presentation">
                                            <a href="<?php echo base_url().'Home/student_summary_classwise_11_12'?>">
                                              <span class="text">Student Summary 11th&12th std</span><br/>
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
                                     
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i>Student Summary Class-Wise(Pre_KG-10th)</div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                          <?php $Government=0;$fullyaid=0;$unaidteachtot=0;$PartiallyAided=0;$CentralGovt=0; ?>
                                  <table class="table table-striped table-bordered table-hover" id="sample_2">
                                  <thead>
                                 <tr>
                                <th style="text-align: center; display:none">S.No</th>
                              <th style="text-align: center;">Class</th>                        
                              <th style="text-align: center;">Section</th>
                              <th style="text-align: center;">Medium</th>
                            
                              <th style="text-align: center;">Boys</th>
                              <th style="text-align: center;">Girls</th>
                              <!--   <th style="text-align: center;">Group</th>-->
                              <th style="text-align: center;">Total</th>
                             
                              </tr>
                              </thead>
                              <tbody>
                              <?php  $i=1;?>
                              <?php if(!empty($student_summary)){  
                         //  print_r($student_summary);di
                                $total1=[];  $male=[];  $Female=[];   foreach($student_summary as $staff_tnfr){ 

       
        // echo $class_level['low_class'];
          $class_roma = array
                                                            ('I'=>1,'II'=>'2','III'=>'3','IV'=>'4','V'=>'5','VI'=>'6','VII'=>'7','VIII'=>'8','IX'=>'9','X'=>'10','XI'=>'11','XII'=>'12','LKG'=>'13','UKG'=>'14','PreKG'=>'15');
                                                    $class_no= array
                                                            ('4'=>'1','5'=>'2','6'=>'3','7'=>'4','8'=>'5','9'=>'6','10'=>'7','11'=>'8','12'=>'9','13'=>'10','14'=>'11','15'=>'12','3'=>'13','2'=>'14','1'=>'15');

                                                            $class_roman_name = array_search($staff_tnfr->class_studying_id,$class_roma);
                                                            $class_roman_no = array_search($staff_tnfr->class_studying_id,$class_no);
                                                            // echo $class_roman_no;
        
    
                             
                              ?>
                              <tr>

                              <td style="text-align: center;display:none "><?=$class_roman_no;?></td>
                         
                             <td style="text-align: center;">
                             <?php echo  $class_roman_name; ?></td>
                              <td style="text-align: center;"><?php echo ($staff_tnfr->class_section); ?></a></td>
                              <td style="text-align: center;"><?php echo ($staff_tnfr->edu_med); ?></a></td>

                              <td style="text-align: center;"><?php echo ($staff_tnfr->male); ?></a></td>
                              <td style="text-align: center;"><?php echo ($staff_tnfr->Female); ?></a></td>
                            
                             <!-- <td style="text-align: center;"><?php echo ($staff_tnfr->grp); ?></a></td>-->
                               <td style="text-align: center;"><?php echo ($staff_tnfr->male)+($staff_tnfr->Female); ?></a></td>
                              </tr>
                              

                              
                     <?php 
                                      array_push($male,$staff_tnfr->male);
                                      array_push($Female,$staff_tnfr->Female);
                                      
                                    }

                    
                                     ?>
                                                        
                                      
                                                      
                            </tbody>  <tfoot>
                                                          <tr>
                                                            <th>Total</th>
                                                            <th></th>
                                                            <th></th>
                                                            <th style="text-align: center;" ><?php 
                                                            $male = array_sum($male);
                                                            array_push($total1,$male);
                                                            echo number_format($male);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $Female = array_sum($Female);
                                                            array_push($total1,$Female);
                                                            echo number_format($Female);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            
                                                            echo number_format($male+$Female);?></th>
                                                            
                                                           
                                                           
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