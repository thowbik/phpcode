<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    <style>
        .dashboard-stat2 {
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    -ms-border-radius: 2px;
    -o-border-radius: 2px;
    border-radius: 2px;
    background: #fff;
    padding: 15px 15px 14px !important;
}
    .dashboard-stat2 .display {
    margin-bottom: 2px !important;
}
.bottom
{
  border-bottom: 1px solid gray;
}
.bs-callout-lightsteelblue {
    border-left: 8px solid lightsteelblue;
    border-radius: 3% !important;
}
.bs-callout-darkseagreen {
    border-left: 8px solid darkseagreen;
    border-radius: 3% !important;
}
.bs-callout-mediumaquamarine {
    border-left: 8px solid mediumaquamarine;
    border-radius: 3% !important;
}
.bs-callout-lightblue {
    border-left: 8px solid lightblue;
    border-radius: 3% !important;
}

.x_panel
{
      padding: 0px 8px !important;
}
.x_title {
    border-bottom: 2px solid #E6E9ED;
    margin: 0px -7px 0px;
    margin-bottom: 10px;
}
.khaki
{
  background-color: khaki;
  color: black;
}
.lightgrey
{
  background-color: lightgrey;
  color: black;

}
.lightyellow
{
  background-color: #f3a84ea6;
  color: black;

}
.lightgreen
{
  background-color: #ceeabf;
  color: black;

}
</style>
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->

        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
       
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
                          

                                    <div class="page-content-inner">

                                     <div class="portlet-body">

                                      
                                       
                                  
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i>Action Items | <span>District :<?php echo $details[0]['district_name'];?></span> </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                                        <?php $prekg_tot=0;$lkg_tot=0;$ukg_tot=0;$c1_tot=0;$c2_tot=0;$c3_tot=0;$c4_tot=0;$c5_tot=0;$c6_tot=0;$c7_tot=0;$c8_tot=0;$c9_tot=0;$c10_tot=0;$c11_tot=0;$c12_tot=0; ?>
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                   <th style="text-align: center;">S.No</th>
                                                                   <th style="text-align: center;">Action Item Description</th>  
                                                                   <th style="text-align: center;">Number of schools</th>  
                                                                    
                                                                   
                                                                </tr>
                                                                </thead>
                                                               <tbody>
                                                            <?php if(!empty($details)){$prekg_tot= [];$lkg_tot= [];$ukg_tot= [];$c1_tot= [];$c2_tot= [];$c3_tot= [];$c4_tot= [];$c5_tot=[];$c6_tot= [];$c7_tot= [];$c8_tot= [];$c9_tot= [];$c10_tot= [];$c11_tot= [];$c12_tot= []; $i=1;// foreach($details as $det){ print_r($det); ?>

                                  <tr>
                                     <td style="text-align: center;"><?php echo $i++;?></td>
                                                                   
                                     <td><a href="<?php echo base_url().'Collector/boys_schl_with_girls_enrol';?>"><?php  echo ('Boys School With Girls Enrollment'); ?></a></td>
                                     <td style="text-align: center;"><?php echo ($details[0]['bys_enr_grls_cnt']); ?></td>
                                     
                                   
                                   </tr>
                                     <tr>
                                     <td style="text-align: center;"><?php echo $i++;?></td>
                                                                   
                                     <td><a href="<?php echo base_url().'Collector/girls_schl_with_boys_enrol';?>"><?php echo ('Girls School With Boys Enrollment'); ?><a href=""></td>
                                     <td style="text-align: center;"><?php echo ($details[1]['grls_enr_bys_cnt']); ?></td>
                                     
                                   
                                   </tr>
                                      <tr>
                                     <td style="text-align: center;"><?php echo $i++;?></td>
                                                                   
                                     <td><a href="<?php echo base_url().'Collector/primary_school_list';?>"><?php echo ('Primary School High Class > 5'); ?></a></td>
                                     <td style="text-align: center;"><?php echo ($detail[0]['cnt']); ?></td>
                                     
                                   
                                   </tr>
                                     </tr>
                                      <tr>
                                     <td style="text-align: center;"><?php echo $i++;?></td>
                                                                   
                                     <td><a href="<?php echo base_url().'Collector/middle_school_list';?>"><?php echo ('Middle School  High Class > 8'); ?></a></td>
                                     <td style="text-align: center;"><?php echo ($middle[0]['cnt']); ?></td>
                                     
                                   
                                   </tr>
                                     <tr>
                                     <td style="text-align: center;"><?php echo $i++;?></td>
                                                                   
                                     <td><a href="<?php echo base_url().'Collector/schools_with_zero_staff_profile';?>"><?php echo ('Schools With Zero Staff Profile'); ?></a></td>
                                     <td style="text-align: center;"><?php echo ($zerostaff[0]['cnt']); ?></td>
                                     
                                   
                                   </tr>
                                     <tr>
                                     <td style="text-align: center;"><?php echo $i++;?></td>
                                                                   
                                     <td><a href="<?php echo base_url().'Collector/schools_with_zero_enrollment';?>"><?php echo ('Schools With Zero Enrollment'); ?></a></td>
                                     <td style="text-align: center;"><?php echo ($zeroenroll[0]['cnt']); ?></td>
                                     
                                   
                                   </tr>
                                     <tr>
                                     <td style="text-align: center;"><?php echo $i++;?></td>
                                                                   
                                     <td><a href="<?php echo base_url().'Collector/emis_school_unrecognized_block';?>"><?php echo ('Unrecognized Schools'); ?></a></td>
                                     <td style="text-align: center;"><?php //echo ($zeroenroll[0]['cnt']); ?></td>
                                     
                                   
                                   </tr>
                                                               
                                                               
                                                            </tbody>
                                                          <?php } ?>
                                                        </table>

                                                        </table>
                                                        
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

                                                    </div>
                                                </div>
                                            </div>

                                           </div>

                                    </div>
                                          

           
                            

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
   <script src="<?php echo base_url().'asset/js/district.js';?>" type="text/javascript"></script>


    <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/moment.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/jquery.mockjax.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
             
    </body>

</html>