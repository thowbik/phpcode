
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
                                     
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i>Student OSC Report | School - <?php echo $student_osc[0]->school_name; ?> </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                          <?php $Government=0;$fullyaid=0;$unaidteachtot=0;$PartiallyAided=0;$CentralGovt=0; ?>
                                  <table class="table table-striped table-bordered table-hover" id="sample_2">
                                  <thead>
                                 <tr>
                                <th style="text-align: center;">S.No</th>
                              <th style="text-align: left;">Name</th>                        
                              <th style="text-align: center;">Unique ID</th>
                              <th style="text-align: center;">Class</th>
                              <th style="text-align: center;">Section</th>
                              <th style="text-align: center;">Present Status</th>
                            
                              <th style="text-align: center;">Training Type</th>
                              <th style="text-align: center;">Academic Year</th>
                              <!--   <th style="text-align: center;">Group</th>
                              <th style="text-align: center;">Total</th>-->
                             
                              </tr>
                              </thead>
                              <tbody>
                              <?php  $i=1;?>
                              <?php if(!empty($student_osc)){  
                         //  print_r($student_summary);di
                                $total1=[];  $male=[];  $Female=[];   foreach($student_osc as $student_osc){ 

       
        // echo $class_level['low_class'];
          $class_roma = array
                                                            ('I'=>1,'II'=>'2','III'=>'3','IV'=>'4','V'=>'5','VI'=>'6','VII'=>'7','VIII'=>'8','IX'=>'9','X'=>'10','XI'=>'11','XII'=>'12','LKG'=>'13','UKG'=>'14','PreKG'=>'15');
                                                    $class_no= array
                                                            ('4'=>'1','5'=>'2','6'=>'3','7'=>'4','8'=>'5','9'=>'6','10'=>'7','11'=>'8','12'=>'9','13'=>'10','14'=>'11','15'=>'12','3'=>'13','2'=>'14','1'=>'15');

                                                            $class_roman_name = array_search($student_osc->class_studying_id,$class_roma);
                                                            $class_roman_no = array_search($student_osc->class_studying_id,$class_no);
                                                            // echo $class_roman_no;
        
    
                             
                              ?>
                              <tr>

                              <td style="text-align: center; "><?=$i++;?></td>
                              <td><?php echo ($student_osc->name); ?></a></td>
                              <td style="text-align: center;"><?php echo ($student_osc->unique_id_no); ?></a></td>
                              <td style="text-align: center;"><?php echo ($student_osc->class_studying_id); ?></a></td>
                              <td style="text-align: center;"><?php echo ($student_osc->class_section); ?></a></td>

                              <td style=""><?php echo ($student_osc->pre_stus); ?></a></td>
                              <td style=""><?php echo ($student_osc->training_type); ?></a></td>
                            
                             <!-- <td style="text-align: center;"><?php echo ($student_osc->grp); ?></a></td>-->
                               <td style="text-align: center;"><?php echo ($student_osc->ac_year); ?></a></td>
                              </tr>
                              

                              
                     <?php 
                                    
                                    }

                    
                                     ?>
                                                        
                                      
                                                      
                            </tbody>  <tfoot>
                                                     
                                                        
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