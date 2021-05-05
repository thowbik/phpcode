
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
            

  <?php $this->load->view('district/header.php'); ?>

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
                                                            <i class="fa fa-globe"></i>DEE Staff Fixation - Subject-Wise</div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                          <?php $Government=0;$fullyaid=0;$unaidteachtot=0;$PartiallyAided=0;$CentralGovt=0; ?>
                                  <table class="table table-striped table-bordered table-hover">
                                  <thead>
                                 <tr>
                              <th style="text-align: center;">S.No</th>
                              <th>Teachers </br>Subject </th>                        
                              <th style="text-align: center;">Eligible</th>
                              <th style="text-align: center;">sanctioned</th>
                              <th style="text-align: center;">Available</th>
                              <th style="text-align: center;">Needed</th>
                              <th style="text-align: center;">Surplus Post with person</th>
                              <th style="text-align: center;">Surplus Post without person</th>
                              </tr>
                              </thead>
                              <tbody>
                         <tbody>
    <tr>
      <td>1</td>
      <th scope="row">Tamil</th>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->eli_tamil?></td>
      <td style="text-align: center;" style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->sanc_tam?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->avail_tam?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->need_tam?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->surp_w_tam?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->surp_wo_tam?></td>
    </tr>

    <tr>
      <td>2</td>
      <th scope="row">English</th>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->eli_eng?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->sanc_eng?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->avail_eng?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->need_eng?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->surp_w_eng?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->surp_wo_eng?></td>
    </tr>

    <tr>
      <td>3</td>
      <th scope="row">Maths</th>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->eli_mat?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->sanc_mat?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->avail_mat?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->need_mat?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->surp_w_mat?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->surp_wo_mat?></td>
    </tr>

    <tr>
      <td>4</td>
      <th scope="row">Science</th>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->eli_sci?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->sanc_sci?></td>
      <td  style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->avail_sci?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->need_sci?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->surp_w_sci?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->surp_wo_sci?></td>
    </tr>

    <tr>
      <td>5</td>
      <th scope="row">Scocial</th>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->eli_soc?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->sanc_soc?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->avail_soc?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->need_soc?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->surp_w_soc?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->surp_wo_soc?></td>
    </tr>
     <tr>
      <td>6</td>
      <th scope="row">SG</th>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->elig_sg?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->sanc_sg?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->avail_sg?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->need_sg?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->surp_w_sg?></td>
      <td style="text-align: center;"><?php echo $staff_fixtation_sub_wise[0]->surp_wo_sg?></td>
    </tr>

  </tbody>
                                                      
                            </tbody>
                                                        
                             
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