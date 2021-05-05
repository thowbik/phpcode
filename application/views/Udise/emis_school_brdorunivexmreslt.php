<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>

        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />

        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->

        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />


        <style type="text/css">
            label.error { float: none; color:#dd4b39; }

            .space{
              width: 100px;
            }
         </style>

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            
<?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
<?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
<?php $this->load->view('block/header.php'); }else{ ?>
<?php $this->load->view('header.php'); }?>
  <?php $is_high_class = $this->session->userdata('emis_school_highclass'); ?>

                


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
                                        <h1>Periodical Assessment
                                            <!-- <small>School edit and update</small> -->
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
                                       
                                         <?php $this->load->view('emis_school_profile_header1.php'); ?>

                                           <!-- <div class="m-heading-1 border-green m-bordered">
                                            <h3>Basic Information</h3>
                                        </div> -->
                                         <div class="portlet-body">
                                         <div class="mt-element-step">
                                            <div class="row step-thin">
                                                <a href="<?php echo base_url().'Udise_assesment/emis_school_examresult1';?>"><div class="col-md-4 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">1</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Annual Exam Result</div>
                                                    <div class="mt-step-content font-grey-cascade">Elementry Level</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Udise_assesment/emis_school_boardexamresult1';?>"><div class="col-md-4 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">2</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Board Exam Result</div>
                                                    <div class="mt-step-content font-grey-cascade">Secondary and Higher Secondary Levels</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Udise_assesment/emis_school_boardoruniversityexamresult';?>"><div class="col-md-4 bg-grey mt-step-col  active">
                                                    <div class="mt-step-number bg-white font-grey">3</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Board/University</div>
                                                    <div class="mt-step-content font-grey-cascade">Exam in previous academic year</div>
                                                </div></a>
                                            </div>
                                         </div>
                                         </div>
                                         

                                        <div class="row">
                                       <div class="col-md-12">
                                          <div class="mt-checkbox-inline">
                                             <br>
                                          </div>
                                       </div>
                                    </div>
                                        


                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Board/University Examination</span> - <small>Results of the Grade XII Board/University Examination in previous academic year(for Regular Students)</small>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <!-- error reporting start -->
                                                       <?php if ($this->session->flashdata('assesmentfrm6')){ ?> 
                                                <!-- BEGIN PAGE CONTENT INNER -->
                                                   <div class="page-content-inner">
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="note note-danger note-bordered">
                                                               <?php echo $this->session->flashdata('assesmentfrm6'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <!-- END PAGE CONTENT INNER -->
                                             <?php } ?>
                                             <!-- error reporting End -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                      <form method="post" action="<?php echo base_url().'Udise_assesment/emis_school_boardoruniversityexamresult';?>" id="brd_univ_ex_rslt_frm1">
                                                        <!-- division for scrollable -->
                                                        <div class="table-scrollable">
                                                            <table class="table table-bordered table-striped">
                                                                <thead>
                                                                <tr>
                                                                    <th rowspan="3">Stream</th>
                                                                    <th colspan="8">Number of Students Appeared</th>
                                                                    <th colspan="8">Number of Students Passed</th>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="2">General</th>
                                                                    <th colspan="2">SC</th>
                                                                    <th colspan="2">ST</th>
                                                                    <th colspan="2">OBC</th>
                                                                    <th colspan="2">General</th>
                                                                    <th colspan="2">SC</th>
                                                                    <th colspan="2">ST</th>
                                                                    <th colspan="2">OBC</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                  <tr>
                                                                    <td>
                                                                      <select name="stream" class="form-control" style="width: 150px;">
                                                                          <option selected="selected" value="">Select the option</option>
                                                                          <option value="arts">Arts</option>
                                                                          <option value="science">Science</option>
                                                                          <option value="commerce">Commerce</option>
                                                                          <option value="vocational">Vocational</option>
                                                                          <option value="oth_stream">Other Stream</option>
                                                                      </select>
                                                                    </td>
                                                                    <td><input type="text" class="form-control space" name="tb1" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb2" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb3" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb4" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb5" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb6" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb7" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb9" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb10" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb11" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb12" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb13" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb14" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb15" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb16" maxlength="4"></td>
                                                                  </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- division for scrollable Ending-->
                                                        <!-- division for row -->
                                                        <div class="row">
                                                          <center><input type="submit" value="submit" class="btn green" name=""></center>
                                                        </div>
                                                        <!-- division for row Ending-->
                                                      </form>
                                                       <!-- division for table-scrollable -->
                                                       <div class="table-scrollable">
                                                        <table id="user" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th rowspan="3">Stream</th>
                                                                    <th colspan="10">Number of Students Appeared</th>
                                                                    <th colspan="10">Number of Students Passed</th>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="2">General</th>
                                                                    <th colspan="2">SC</th>
                                                                    <th colspan="2">ST</th>
                                                                    <th colspan="2">OBC</th>
                                                                    <th colspan="2">Total</th>
                                                                    <th colspan="2">General</th>
                                                                    <th colspan="2">SC</th>
                                                                    <th colspan="2">ST</th>
                                                                    <th colspan="2">OBC</th>
                                                                    <th colspan="2">Total</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                  <td>
                                                                  Arts
                                                                </td>
                                                                  <td>
                                                                    <center><?php echo $arts_apprd_gen_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $arts_apprd_gen_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $arts_apprd_sc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $arts_apprd_sc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $arts_apprd_st_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $arts_apprd_st_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $arts_apprd_obc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $arts_apprd_obc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $arts_apprd_tot_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $arts_apprd_tot_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $arts_pasd_gen_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $arts_pasd_gen_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $arts_pasd_sc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $arts_pasd_sc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $arts_pasd_st_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $arts_pasd_st_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $arts_pasd_obc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $arts_pasd_obc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $arts_pasd_tot_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $arts_pasd_tot_g; ?></center>
                                                                  </td>
                                                                </tr>
                                                                <tr>
                                                                  <td>
                                                                  Science
                                                                </td>
                                                                 <td>
                                                                    <center><?php echo $science_apprd_gen_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $science_apprd_gen_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $science_apprd_sc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $science_apprd_sc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $science_apprd_st_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $science_apprd_st_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $science_apprd_obc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $science_apprd_obc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $science_apprd_tot_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $science_apprd_tot_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $science_pasd_gen_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $science_pasd_gen_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $science_pasd_sc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $science_pasd_sc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $science_pasd_st_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $science_pasd_st_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $science_pasd_obc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $science_pasd_obc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $science_pasd_tot_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $science_pasd_tot_g; ?></center>
                                                                  </td>
                                                                </tr>
                                                                <tr>
                                                                  <td>
                                                                  Commerce
                                                                </td>
                                                                  <td>
                                                                    <center><?php echo $commerce_apprd_gen_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $commerce_apprd_gen_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $commerce_apprd_sc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $commerce_apprd_sc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $commerce_apprd_st_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $commerce_apprd_st_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $commerce_apprd_obc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $commerce_apprd_obc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $commerce_apprd_tot_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $commerce_apprd_tot_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $commerce_pasd_gen_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $commerce_pasd_gen_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $commerce_pasd_sc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $commerce_pasd_sc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $commerce_pasd_st_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $commerce_pasd_st_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $commerce_pasd_obc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $commerce_pasd_obc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $commerce_pasd_tot_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $commerce_pasd_tot_g; ?></center>
                                                                  </td>
                                                                </tr>
                                                                <tr>
                                                                  <td>
                                                                  Vocational
                                                                </td>
                                                                  <td>
                                                                    <center><?php echo $vocational_apprd_gen_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $vocational_apprd_gen_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $vocational_apprd_sc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $vocational_apprd_sc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $vocational_apprd_st_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $vocational_apprd_st_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $vocational_apprd_obc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $vocational_apprd_obc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $vocational_apprd_tot_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $vocational_apprd_tot_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $vocational_pasd_gen_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $vocational_pasd_gen_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $vocational_pasd_sc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $vocational_pasd_sc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $vocational_pasd_st_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $vocational_pasd_st_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $vocational_pasd_obc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $vocational_pasd_obc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $vocational_pasd_tot_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $vocational_pasd_tot_g; ?></center>
                                                                  </td>
                                                                </tr>
                                                                <tr>
                                                                  <td>
                                                                  Other Streams
                                                                </td>
                                                                  <td>
                                                                    <center><?php echo $oth_stream_apprd_gen_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $oth_stream_apprd_gen_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $oth_stream_apprd_sc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $oth_stream_apprd_sc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $oth_stream_apprd_st_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $oth_stream_apprd_st_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $oth_stream_apprd_obc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $oth_stream_apprd_obc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $oth_stream_apprd_tot_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $oth_stream_apprd_tot_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $oth_stream_pasd_gen_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $oth_stream_pasd_gen_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $oth_stream_pasd_sc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $oth_stream_pasd_sc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $oth_stream_pasd_st_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $oth_stream_pasd_st_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $oth_stream_pasd_obc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $oth_stream_pasd_obc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $oth_stream_pasd_tot_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $oth_stream_pasd_tot_g; ?></center>
                                                                  </td>
                                                                </tr>
                                                                <?php 
                                                                $tot1 = (($arts_apprd_gen_b)+($science_apprd_gen_b)+($commerce_apprd_gen_b)+($vocational_apprd_gen_b)+($oth_stream_apprd_gen_b));
                                                                $tot2 = (($arts_apprd_gen_g)+($science_apprd_gen_g)+($commerce_apprd_gen_g)+($vocational_apprd_gen_g)+($oth_stream_apprd_gen_g));
                                                                $tot3 = (($arts_apprd_sc_b)+($science_apprd_sc_b)+($commerce_apprd_sc_b)+($vocational_apprd_sc_b)+($oth_stream_apprd_sc_b));
                                                                $tot4 = (($arts_apprd_sc_g)+($science_apprd_sc_g)+($commerce_apprd_sc_g)+($vocational_apprd_sc_g)+($oth_stream_apprd_sc_g));
                                                                $tot5 = (($arts_apprd_st_b)+($science_apprd_st_b)+($commerce_apprd_st_b)+($vocational_apprd_st_b)+($oth_stream_apprd_st_b));
                                                                $tot6 = (($arts_apprd_st_g)+($science_apprd_st_g)+($commerce_apprd_st_g)+($vocational_apprd_st_g)+($oth_stream_apprd_st_g));
                                                                $tot7 = (($arts_apprd_obc_b)+($science_apprd_obc_b)+($commerce_apprd_obc_b)+($vocational_apprd_obc_b)+($oth_stream_apprd_obc_b));
                                                                $tot8 = (($arts_apprd_obc_g)+($science_apprd_obc_g)+($commerce_apprd_obc_g)+($vocational_apprd_obc_g)+($oth_stream_apprd_obc_g));
                                                                $tot9 = (($arts_apprd_tot_b)+($science_apprd_tot_b)+($commerce_apprd_tot_b)+($vocational_apprd_tot_b)+($oth_stream_apprd_tot_b));
                                                                $tot10 = (($arts_apprd_tot_g)+($science_apprd_tot_g)+($commerce_apprd_tot_g)+($vocational_apprd_tot_g)+($oth_stream_apprd_tot_g));

                                                                $tot11 = (($arts_pasd_gen_b)+($science_pasd_gen_b)+($commerce_pasd_gen_b)+($vocational_pasd_gen_b)+($oth_stream_pasd_gen_b));
                                                                $tot12 = (($arts_pasd_gen_g)+($science_pasd_gen_g)+($commerce_pasd_gen_g)+($vocational_pasd_gen_g)+($oth_stream_pasd_gen_g));
                                                                $tot13 = (($arts_pasd_sc_b)+($science_pasd_sc_b)+($commerce_pasd_sc_b)+($vocational_pasd_sc_b)+($oth_stream_pasd_sc_b));
                                                                $tot14 = (($arts_pasd_sc_g)+($science_pasd_sc_g)+($commerce_pasd_sc_g)+($vocational_pasd_sc_g)+($oth_stream_pasd_sc_g));
                                                                $tot15 = (($arts_pasd_st_b)+($science_pasd_st_b)+($commerce_pasd_st_b)+($vocational_pasd_st_b)+($oth_stream_pasd_st_b));
                                                                $tot16 = (($arts_pasd_st_g)+($science_pasd_st_g)+($commerce_pasd_st_g)+($vocational_pasd_st_g)+($oth_stream_pasd_st_g));
                                                                $tot17 = (($arts_pasd_obc_b)+($science_pasd_obc_b)+($commerce_pasd_obc_b)+($vocational_pasd_obc_b)+($oth_stream_pasd_obc_b));
                                                                $tot18 = (($arts_pasd_obc_g)+($science_pasd_obc_g)+($commerce_pasd_obc_g)+($vocational_pasd_obc_g)+($oth_stream_pasd_obc_g));
                                                                $tot19 = (($arts_pasd_tot_b)+($science_pasd_tot_b)+($commerce_pasd_tot_b)+($vocational_pasd_tot_b)+($oth_stream_pasd_tot_b));
                                                                $tot20 = (($arts_pasd_tot_g)+($science_pasd_tot_g)+($commerce_pasd_tot_g)+($vocational_pasd_tot_g)+($oth_stream_pasd_tot_g));
                                                                 ?>
                                                                <tr>
                                                                  <td>
                                                                     Total
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot1; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot2; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot3; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot4; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot5; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot6; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot7; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot8; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot9; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot10; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot11; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot12; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot13; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot14; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot15; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot16; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot17; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot18; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot19; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot20; ?></center>
                                                                  </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                      </div>
                                                      <!-- table scrollable ending -->
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>



                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Board/University Examination</span> - <small>Results of the Grade XII Board/University Examination in previous academic year(for other than Regular Students, if any)</small>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <!-- error reporting start -->
                                                       <?php if ($this->session->flashdata('assesmentfrm7')){ ?> 
                                                <!-- BEGIN PAGE CONTENT INNER -->
                                                   <div class="page-content-inner">
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="note note-danger note-bordered">
                                                               <?php echo $this->session->flashdata('assesmentfrm7'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <!-- END PAGE CONTENT INNER -->
                                             <?php } ?>
                                             <!-- error reporting End -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                      <form method="post" action="<?php echo base_url().'Udise_assesment/emis_school_boardoruniversityexamresult';?>" id="brd_univ_ex_rslt_frm2">

                                                        <!-- division for scrollable -->
                                                        <div class="table-scrollable">
                                                            <table class="table table-bordered table-striped">
                                                                <thead>
                                                                <tr>
                                                                    <th rowspan="3">Stream</th>
                                                                    <th colspan="8">Number of Students Appeared</th>
                                                                    <th colspan="8">Number of Students Passed</th>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="2">General</th>
                                                                    <th colspan="2">SC</th>
                                                                    <th colspan="2">ST</th>
                                                                    <th colspan="2">OBC</th>
                                                                    <th colspan="2">General</th>
                                                                    <th colspan="2">SC</th>
                                                                    <th colspan="2">ST</th>
                                                                    <th colspan="2">OBC</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                  <tr>
                                                                    <td>
                                                                      <select name="tb2stream2" class="form-control" style="width: 150px;">
                                                                          <option selected="selected" value="">Select the option</option>
                                                                          <option value="arts">Arts</option>
                                                                          <option value="science">Science</option>
                                                                          <option value="commerce">Commerce</option>
                                                                          <option value="vocational">Vocational</option>
                                                                          <option value="oth_stream">Other Stream</option>
                                                                      </select>
                                                                    </td>
                                                                    <td><input type="text" class="form-control space" name="tb1" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb2" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb3" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb4" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb5" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb6" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb7" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb9" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb10" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb11" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb12" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb13" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb14" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb15" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control space" name="tb16" maxlength="4"></td>
                                                                  </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- division for scrollable Ending-->
                                                        <!-- division for row -->
                                                        <div class="row">
                                                          <center><input type="submit" value="submit" class="btn green" name=""></center>
                                                        </div>
                                                        <!-- division for row Ending-->
                                                      </form>

                                                       <!-- table scrolling division -->
                                                       <div class="table-scrollable">
                                                        <table id="user" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th rowspan="3">Stream</th>
                                                                    <th colspan="10">Number of Students Appeared</th>
                                                                    <th colspan="10">Number of Students Passed</th>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="2">General</th>
                                                                    <th colspan="2">SC</th>
                                                                    <th colspan="2">ST</th>
                                                                    <th colspan="2">OBC</th>
                                                                    <th colspan="2">Total</th>
                                                                    <th colspan="2">General</th>
                                                                    <th colspan="2">SC</th>
                                                                    <th colspan="2">ST</th>
                                                                    <th colspan="2">OBC</th>
                                                                    <th colspan="2">Total</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                  <td>
                                                                  Arts
                                                                </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_arts_apprd_gen_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_arts_apprd_gen_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_arts_apprd_sc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_arts_apprd_sc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_arts_apprd_st_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_arts_apprd_st_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_arts_apprd_obc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_arts_apprd_obc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_arts_apprd_tot_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_arts_apprd_tot_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_arts_pasd_gen_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_arts_pasd_gen_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_arts_pasd_sc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_arts_pasd_sc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_arts_pasd_st_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_arts_pasd_st_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_arts_pasd_obc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_arts_pasd_obc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_arts_pasd_tot_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_arts_pasd_tot_g; ?></center>
                                                                  </td>
                                                                </tr>
                                                                <tr>
                                                                  <td>
                                                                  Science
                                                                </td>
                                                                 <td>
                                                                    <center><?php echo $othreg_science_apprd_gen_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_science_apprd_gen_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_science_apprd_sc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_science_apprd_sc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_science_apprd_st_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_science_apprd_st_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_science_apprd_obc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_science_apprd_obc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_science_apprd_tot_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_science_apprd_tot_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_science_pasd_gen_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_science_pasd_gen_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_science_pasd_sc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_science_pasd_sc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_science_pasd_st_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_science_pasd_st_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_science_pasd_obc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_science_pasd_obc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_science_pasd_tot_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_science_pasd_tot_g; ?></center>
                                                                  </td>
                                                                </tr>
                                                                <tr>
                                                                  <td>
                                                                  Commerce
                                                                </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_commerce_apprd_gen_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_commerce_apprd_gen_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_commerce_apprd_sc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_commerce_apprd_sc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_commerce_apprd_st_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_commerce_apprd_st_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_commerce_apprd_obc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_commerce_apprd_obc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_commerce_apprd_tot_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_commerce_apprd_tot_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_commerce_pasd_gen_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_commerce_pasd_gen_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_commerce_pasd_sc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_commerce_pasd_sc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_commerce_pasd_st_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_commerce_pasd_st_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_commerce_pasd_obc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_commerce_pasd_obc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_commerce_pasd_tot_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_commerce_pasd_tot_g; ?></center>
                                                                  </td>
                                                                </tr>
                                                                <tr>
                                                                  <td>
                                                                  Vocational
                                                                </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_vocational_apprd_gen_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_vocational_apprd_gen_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_vocational_apprd_sc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_vocational_apprd_sc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_vocational_apprd_st_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_vocational_apprd_st_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_vocational_apprd_obc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_vocational_apprd_obc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_vocational_apprd_tot_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_vocational_apprd_tot_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_vocational_pasd_gen_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_vocational_pasd_gen_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_vocational_pasd_sc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_vocational_pasd_sc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_vocational_pasd_st_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_vocational_pasd_st_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_vocational_pasd_obc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_vocational_pasd_obc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_vocational_pasd_tot_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_vocational_pasd_tot_g; ?></center>
                                                                  </td>
                                                                </tr>
                                                                <tr>
                                                                  <td>
                                                                  Other Streams
                                                                </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_oth_stream_apprd_gen_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_oth_stream_apprd_gen_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_oth_stream_apprd_sc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_oth_stream_apprd_sc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_oth_stream_apprd_st_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_oth_stream_apprd_st_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_oth_stream_apprd_obc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_oth_stream_apprd_obc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_oth_stream_apprd_tot_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_oth_stream_apprd_tot_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_oth_stream_pasd_gen_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_oth_stream_pasd_gen_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_oth_stream_pasd_sc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_oth_stream_pasd_sc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_oth_stream_pasd_st_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_oth_stream_pasd_st_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_oth_stream_pasd_obc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_oth_stream_pasd_obc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_oth_stream_pasd_tot_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $othreg_oth_stream_pasd_tot_g; ?></center>
                                                                  </td>
                                                                </tr>
                                                                <?php 
                                                                $tot1 = (($othreg_arts_apprd_gen_b)+($othreg_science_apprd_gen_b)+($othreg_commerce_apprd_gen_b)+($othreg_vocational_apprd_gen_b)+($othreg_oth_stream_apprd_gen_b));
                                                                $tot2 = (($othreg_arts_apprd_gen_g)+($othreg_science_apprd_gen_g)+($othreg_commerce_apprd_gen_g)+($othreg_vocational_apprd_gen_g)+($othreg_oth_stream_apprd_gen_g));
                                                                $tot3 = (($othreg_arts_apprd_sc_b)+($othreg_science_apprd_sc_b)+($othreg_commerce_apprd_sc_b)+($othreg_vocational_apprd_sc_b)+($othreg_oth_stream_apprd_sc_b));
                                                                $tot4 = (($othreg_arts_apprd_sc_g)+($othreg_science_apprd_sc_g)+($othreg_commerce_apprd_sc_g)+($othreg_vocational_apprd_sc_g)+($othreg_oth_stream_apprd_sc_g));
                                                                $tot5 = (($othreg_arts_apprd_st_b)+($othreg_science_apprd_st_b)+($othreg_commerce_apprd_st_b)+($othreg_vocational_apprd_st_b)+($othreg_oth_stream_apprd_st_b));
                                                                $tot6 = (($othreg_arts_apprd_st_g)+($othreg_science_apprd_st_g)+($othreg_commerce_apprd_st_g)+($othreg_vocational_apprd_st_g)+($othreg_oth_stream_apprd_st_g));
                                                                $tot7 = (($othreg_arts_apprd_obc_b)+($othreg_science_apprd_obc_b)+($othreg_commerce_apprd_obc_b)+($othreg_vocational_apprd_obc_b)+($othreg_oth_stream_apprd_obc_b));
                                                                $tot8 = (($othreg_arts_apprd_obc_g)+($othreg_science_apprd_obc_g)+($othreg_commerce_apprd_obc_g)+($othreg_vocational_apprd_obc_g)+($othreg_oth_stream_apprd_obc_g));
                                                                $tot9 = (($othreg_arts_apprd_tot_b)+($othreg_science_apprd_tot_b)+($othreg_commerce_apprd_tot_b)+($othreg_vocational_apprd_tot_b)+($othreg_oth_stream_apprd_tot_b));
                                                                $tot10 = (($othreg_arts_apprd_tot_g)+($othreg_science_apprd_tot_g)+($othreg_commerce_apprd_tot_g)+($othreg_vocational_apprd_tot_g)+($othreg_oth_stream_apprd_tot_g));

                                                                $tot11 = (($othreg_arts_pasd_gen_b)+($othreg_science_pasd_gen_b)+($othreg_commerce_pasd_gen_b)+($othreg_vocational_pasd_gen_b)+($othreg_oth_stream_pasd_gen_b));
                                                                $tot12 = (($othreg_arts_pasd_gen_g)+($othreg_science_pasd_gen_g)+($othreg_commerce_pasd_gen_g)+($othreg_vocational_pasd_gen_g)+($othreg_oth_stream_pasd_gen_g));
                                                                $tot13 = (($othreg_arts_pasd_sc_b)+($othreg_science_pasd_sc_b)+($othreg_commerce_pasd_sc_b)+($othreg_vocational_pasd_sc_b)+($othreg_oth_stream_pasd_sc_b));
                                                                $tot14 = (($othreg_arts_pasd_sc_g)+($othreg_science_pasd_sc_g)+($othreg_commerce_pasd_sc_g)+($othreg_vocational_pasd_sc_g)+($othreg_oth_stream_pasd_sc_g));
                                                                $tot15 = (($othreg_arts_pasd_st_b)+($othreg_science_pasd_st_b)+($othreg_commerce_pasd_st_b)+($othreg_vocational_pasd_st_b)+($othreg_oth_stream_pasd_st_b));
                                                                $tot16 = (($othreg_arts_pasd_st_g)+($othreg_science_pasd_st_g)+($othreg_commerce_pasd_st_g)+($othreg_vocational_pasd_st_g)+($othreg_oth_stream_pasd_st_g));
                                                                $tot17 = (($othreg_arts_pasd_obc_b)+($othreg_science_pasd_obc_b)+($othreg_commerce_pasd_obc_b)+($othreg_vocational_pasd_obc_b)+($othreg_oth_stream_pasd_obc_b));
                                                                $tot18 = (($othreg_arts_pasd_obc_g)+($othreg_science_pasd_obc_g)+($othreg_commerce_pasd_obc_g)+($othreg_vocational_pasd_obc_g)+($othreg_oth_stream_pasd_obc_g));
                                                                $tot19 = (($othreg_arts_pasd_tot_b)+($othreg_science_pasd_tot_b)+($othreg_commerce_pasd_tot_b)+($othreg_vocational_pasd_tot_b)+($othreg_oth_stream_pasd_tot_b));
                                                                $tot20 = (($othreg_arts_pasd_tot_g)+($othreg_science_pasd_tot_g)+($othreg_commerce_pasd_tot_g)+($othreg_vocational_pasd_tot_g)+($othreg_oth_stream_pasd_tot_g));
                                                                 ?>
                                                                <tr>
                                                                  <td>
                                                                     Total
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot1; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot2; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot3; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot4; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot5; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot6; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot7; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot8; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot9; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot10; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot11; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot12; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot13; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot14; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot15; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot16; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot17; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot18; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot19; ?></center>
                                                                  </td>
                                                                  <td>
                                                                    <center><?php echo $tot20; ?></center>
                                                                  </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                      </div>
                                                      <!-- table-scollable ending -->
                                                       </form>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>




                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Board/University Examination</span> - <small>Results of the Grade XII Board/University Examination in previous academic year by range of marks(for Regular Students)</small>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                 <!-- error reporting start -->
                                                       <?php if ($this->session->flashdata('assesmentfrm8')){ ?> 
                                                <!-- BEGIN PAGE CONTENT INNER -->
                                                   <div class="page-content-inner">
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="note note-danger note-bordered">
                                                               <?php echo $this->session->flashdata('assesmentfrm8'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <!-- END PAGE CONTENT INNER -->
                                             <?php } ?>
                                             <!-- error reporting End -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                      <form method="post" action="<?php echo base_url().'Udise_assesment/emis_school_boardoruniversityexamresult';?>" id="brd_ex_sechsc_frm1">

                                                        <div class="table-scrollable">
                                                          <table class="table table-bordered table-striped">
                                                              <thead>
                                                                  <tr>
                                                                    <th rowspan="2">Range of Marks</th>
                                                                    <th colspan="2">General</th>
                                                                    <th colspan="2">SC</th>
                                                                    <th colspan="2">ST</th>
                                                                    <th colspan="2">OBC</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                </tr>
                                                              </thead>
                                                              <tbody>
                                                                  <tr>
                                                                    <td>
                                                                      <select class="form-control" name="en3tb3_cat" style="width: 150px;">
                                                                        <option value="" selected="selected">Select the option</option>
                                                                        <option value="ut40">upto 40%</option>
                                                                        <option value="41to60">41 to 60%</option>
                                                                        <option value="61to80">61 to 80%</option>
                                                                        <option value="abv80">Above 80%</option>
                                                                      </select>
                                                                    </td>
                                                                    <td>
                                                                      <input type="text" class="form-control space" name="tb1" maxlength="4">
                                                                    </td>
                                                                    <td>
                                                                      <input type="text" class="form-control space" name="tb2" maxlength="4">
                                                                    </td>
                                                                    <td>
                                                                      <input type="text" class="form-control space" name="tb3" maxlength="4">
                                                                    </td>
                                                                    <td>
                                                                      <input type="text" class="form-control space" name="tb4" maxlength="4">
                                                                    </td>
                                                                    <td>
                                                                      <input type="text" class="form-control space" name="tb5" maxlength="4">
                                                                    </td>
                                                                    <td>
                                                                      <input type="text" class="form-control space" name="tb6" maxlength="4">
                                                                    </td>
                                                                    <td>
                                                                      <input type="text" class="form-control space" name="tb7" maxlength="4">
                                                                    </td>
                                                                    <td>
                                                                      <input type="text" class="form-control space" name="tb8" maxlength="4">
                                                                    </td>
                                                                  </tr>
                                                              </tbody>
                                                          </table>
                                                        </div>
                                                        <!-- table scrollable ending -->
                                                        <!-- division for row -->
                                                        <div class="row">
                                                          <center><input type="submit" value="submit" class="btn green" name=""></center>
                                                        </div>
                                                        <!-- division for row Ending-->
                                                      </form>

                                                       <!-- table scrolling division -->
                                                       <div class="table-scrollable">
                                                        <table id="user" class="table table-bordered table-striped">
                                                            <thead>

                                                                <tr>
                                                                    <th rowspan="2">Range of Marks</th>
                                                                    <th colspan="2">General</th>
                                                                    <th colspan="2">SC</th>
                                                                    <th colspan="2">ST</th>
                                                                    <th colspan="2">OBC</th>
                                                                    <th colspan="2">Total</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                </tr>
                                                                
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>up to  40%</td>
                                                                    <td>
                                                                      <center><?php echo $ut40_gen_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $ut40_gen_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $ut40_sc_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $ut40_sc_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $ut40_st_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $ut40_st_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $ut40_obc_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $ut40_obc_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $ut40_tot_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $ut40_tot_g; ?></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>41-60%</td>
                                                                    <td>
                                                                      <center><?php echo $rng_41to60_gen_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $rng_41to60_gen_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $rng_41to60_sc_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $rng_41to60_sc_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $rng_41to60_st_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $rng_41to60_st_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $rng_41to60_obc_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $rng_41to60_obc_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $rng_41to60_tot_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $rng_41to60_tot_g; ?></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>61-80%</td>
                                                                    <td>
                                                                      <center><?php echo $rng_61to80_gen_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $rng_61to80_gen_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $rng_61to80_sc_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $rng_61to80_sc_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $rng_61to80_st_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $rng_61to80_st_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $rng_61to80_obc_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $rng_61to80_obc_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $rng_61to80_tot_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $rng_61to80_tot_g; ?></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Above80%</td>
                                                                    <td>
                                                                      <center><?php echo $abv80_gen_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $abv80_gen_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $abv80_sc_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $abv80_sc_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $abv80_st_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $abv80_st_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $abv80_obc_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $abv80_obc_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $abv80_tot_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $abv80_tot_g; ?></center>
                                                                    </td>
                                                                </tr>

                                                                <?php 
                                                                $tot1 = (($ut40_gen_b)+($rng_41to60_gen_b)+($rng_61to80_gen_b)+($abv80_gen_b));
                                                                $tot2 = (($ut40_gen_g)+($rng_41to60_gen_g)+($rng_61to80_gen_g)+($abv80_gen_g));
                                                                $tot3 = (($ut40_sc_b)+($rng_41to60_sc_b)+($rng_61to80_sc_b)+($abv80_sc_b));
                                                                $tot4 = (($ut40_sc_g)+($rng_41to60_sc_g)+($rng_61to80_sc_g)+($abv80_sc_g));
                                                                
                                                                $tot5 = (($ut40_st_b)+($rng_41to60_st_b)+($rng_61to80_st_b)+($abv80_st_b));
                                                                $tot6 = (($ut40_st_g)+($rng_41to60_st_g)+($rng_61to80_st_g)+($abv80_st_g));

                                                                $tot7 = (($ut40_obc_b)+($rng_41to60_obc_b)+($rng_61to80_obc_b)+($abv80_obc_b));
                                                                $tot8 = (($ut40_obc_g)+($rng_41to60_obc_g)+($rng_61to80_obc_g)+($abv80_obc_g));

                                                                $tot9 = (($ut40_tot_b)+($rng_41to60_tot_b)+($rng_61to80_tot_b)+($abv80_tot_b));
                                                                $tot10 = (($ut40_tot_g)+($rng_41to60_tot_g)+($rng_61to80_tot_g)+($abv80_tot_g));
                                                                 ?>

                                                                <tr>
                                                                    <td>Total</td>
                                                                    <td>
                                                                      <center><?php echo $tot1; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $tot2; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $tot3; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $tot4; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $tot5; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $tot6; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $tot7; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $tot8; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $tot9; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $tot10; ?></center>
                                                                    </td>
                                                                </tr>
                                                          </tbody>
                                                        </table>
                                                      </div>
                                                      <!-- table-scrollable ending -->
                                                    </form>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <!-- form3 ending -->


                                          <!-- form4  -->
                                          <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Board/University Examination</span> - <small>Results of the Grade XII Board/University Examination in previous academic year range of marks(for other than Regular Students, if any)</small>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                 <!-- error reporting start -->
                                                       <?php if ($this->session->flashdata('assesmentfrm9')){ ?> 
                                                <!-- BEGIN PAGE CONTENT INNER -->
                                                   <div class="page-content-inner">
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="note note-danger note-bordered">
                                                               <?php echo $this->session->flashdata('assesmentfrm9'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <!-- END PAGE CONTENT INNER -->
                                             <?php } ?>
                                             <!-- error reporting End -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                      <form method="post" action="<?php echo base_url().'Udise_assesment/emis_school_boardoruniversityexamresult';?>" id="brd_ex_sechsc_frm2">

                                                        <div class="table-scrollable">
                                                          <table class="table table-bordered table-striped">
                                                              <thead>
                                                                  <tr>
                                                                    <th rowspan="2">Range of Marks</th>
                                                                    <th colspan="2">General</th>
                                                                    <th colspan="2">SC</th>
                                                                    <th colspan="2">ST</th>
                                                                    <th colspan="2">OBC</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                </tr>
                                                              </thead>
                                                              <tbody>
                                                                  <tr>
                                                                    <td>
                                                                      <select class="form-control" name="en3tb4_cat" style="width: 150px;">
                                                                        <option value="" selected="selected">Select the option</option>
                                                                        <option value="ut40">upto 40%</option>
                                                                        <option value="41to60">41 to 60%</option>
                                                                        <option value="61to80">61 to 80%</option>
                                                                        <option value="abv80">Above 80%</option>
                                                                      </select>
                                                                    </td>
                                                                    <td>
                                                                      <input type="text" class="form-control space" name="tb1" maxlength="4">
                                                                    </td>
                                                                    <td>
                                                                      <input type="text" class="form-control space" name="tb2" maxlength="4">
                                                                    </td>
                                                                    <td>
                                                                      <input type="text" class="form-control space" name="tb3" maxlength="4">
                                                                    </td>
                                                                    <td>
                                                                      <input type="text" class="form-control space" name="tb4" maxlength="4">
                                                                    </td>
                                                                    <td>
                                                                      <input type="text" class="form-control space" name="tb5" maxlength="4">
                                                                    </td>
                                                                    <td>
                                                                      <input type="text" class="form-control space" name="tb6" maxlength="4">
                                                                    </td>
                                                                    <td>
                                                                      <input type="text" class="form-control space" name="tb7" maxlength="4">
                                                                    </td>
                                                                    <td>
                                                                      <input type="text" class="form-control space" name="tb8" maxlength="4">
                                                                    </td>
                                                                  </tr>
                                                              </tbody>
                                                          </table>
                                                        </div>
                                                        <!-- table scrollable ending -->
                                                        <!-- division for row -->
                                                        <div class="row">
                                                          <center><input type="submit" value="submit" class="btn green" name=""></center>
                                                        </div>
                                                        <!-- division for row Ending-->

                                                       <!-- table scrolling division -->
                                                       <div class="table-scrollable">
                                                        <table id="user" class="table table-bordered table-striped">
                                                            <thead>

                                                                <tr>
                                                                    <th rowspan="2">Range of Marks</th>
                                                                    <th colspan="2">General</th>
                                                                    <th colspan="2">SC</th>
                                                                    <th colspan="2">ST</th>
                                                                    <th colspan="2">OBC</th>
                                                                    <th colspan="2">Total</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                </tr>
                                                                
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>up to  40%</td>
                                                                    <td>
                                                                      <center><?php echo $othreg_ut40_gen_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_ut40_gen_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_ut40_sc_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_ut40_sc_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_ut40_st_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_ut40_st_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_ut40_obc_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_ut40_obc_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_ut40_tot_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_ut40_tot_g; ?></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>41-60%</td>
                                                                    <td>
                                                                      <center><?php echo $othreg_41to60_gen_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_41to60_gen_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_41to60_sc_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_41to60_sc_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_41to60_st_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_41to60_st_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_41to60_obc_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_41to60_obc_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_41to60_tot_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_41to60_tot_g; ?></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>61-80%</td>
                                                                    <td>
                                                                      <center><?php echo $othreg_61to80_gen_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_61to80_gen_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_61to80_sc_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_61to80_sc_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_61to80_st_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_61to80_st_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_61to80_obc_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_61to80_obc_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_61to80_tot_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_61to80_tot_g; ?></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Above80%</td>
                                                                    <td>
                                                                      <center><?php echo $othreg_abv80_gen_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_abv80_gen_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_abv80_sc_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_abv80_sc_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_abv80_st_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_abv80_st_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_abv80_obc_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_abv80_obc_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_abv80_tot_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $othreg_abv80_tot_g; ?></center>
                                                                    </td>
                                                                </tr>

                                                                <?php 
                                                                $tot1 = (($othreg_ut40_gen_b)+($othreg_41to60_gen_b)+($othreg_61to80_gen_b)+($othreg_abv80_gen_b));
                                                                $tot2 = (($othreg_ut40_gen_g)+($othreg_41to60_gen_g)+($othreg_61to80_gen_g)+($othreg_abv80_gen_g));
                                                                $tot3 = (($othreg_ut40_sc_b)+($othreg_41to60_sc_b)+($othreg_61to80_sc_b)+($othreg_abv80_sc_b));
                                                                $tot4 = (($othreg_ut40_sc_g)+($othreg_41to60_sc_g)+($othreg_61to80_sc_g)+($othreg_abv80_sc_g));
                                                                
                                                                $tot5 = (($othreg_ut40_st_b)+($othreg_41to60_st_b)+($othreg_61to80_st_b)+($othreg_abv80_st_b));
                                                                $tot6 = (($othreg_ut40_st_g)+($othreg_41to60_st_g)+($othreg_61to80_st_g)+($othreg_abv80_st_g));

                                                                $tot7 = (($othreg_ut40_obc_b)+($othreg_41to60_obc_b)+($othreg_61to80_obc_b)+($othreg_abv80_obc_b));
                                                                $tot8 = (($othreg_ut40_obc_g)+($othreg_41to60_obc_g)+($othreg_61to80_obc_g)+($othreg_abv80_obc_g));

                                                                $tot9 = (($othreg_ut40_tot_b)+($othreg_41to60_tot_b)+($othreg_61to80_tot_b)+($othreg_abv80_tot_b));
                                                                $tot10 = (($othreg_ut40_tot_g)+($othreg_41to60_tot_g)+($othreg_61to80_tot_g)+($othreg_abv80_tot_g));
                                                                 ?>

                                                                <tr>
                                                                    <td>Total</td>
                                                                    <td>
                                                                      <center><?php echo $tot1; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $tot2; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $tot3; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $tot4; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $tot5; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $tot6; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $tot7; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $tot8; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $tot9; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $tot10; ?></center>
                                                                    </td>
                                                                </tr>
                                                          </tbody>
                                                        </table>
                                                      </div>
                                                      <!-- table-scrollable ending -->
                                                    </form>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <!-- /form4 -->


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
            <!-- <p id="total"></p> -->

                  <?php $this->load->view('footer.php'); ?>
        </div>

        <?php $this->load->view('scripts.php'); ?>

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        
        <!-- BEGIN PAGE LEVEL SCRIPTS -->


        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/jquery.validate.min.js';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/emis2.js'?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->

        
        
    </body>

</html>