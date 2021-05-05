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
            width: 95px;
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
                                                <a href="<?php echo base_url().'Udise_assesment/emis_school_boardexamresult1';?>"><div class="col-md-4 bg-grey mt-step-col active">
                                                    <div class="mt-step-number bg-white font-grey">2</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Board Exam Result</div>
                                                    <div class="mt-step-content font-grey-cascade">Secondary and Higher Secondary Levels</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Udise_assesment/emis_school_boardoruniversityexamresult';?>"><div class="col-md-4 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">3</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Board/University</div>
                                                    <div class="mt-step-content font-grey-cascade">Exam in previous academic year</div>
                                                </div></a>
                                            </div>
                                         </div>
                                         </div>
                                         
                                    <div class="row">
                                      <br>
                                    </div>
                                        


                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Board Examination Results at Secondary and Higher Secondary Levels</span> - <small>Results of the GradeX Board Examination in the previous academic year</small>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                              <!-- error reporting start -->
                                                       <?php if ($this->session->flashdata('assesmentfrm3')){ ?> 
                                                <!-- BEGIN PAGE CONTENT INNER -->
                                                   <div class="page-content-inner">
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="note note-danger note-bordered">
                                                               <?php echo $this->session->flashdata('assesmentfrm3'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <!-- END PAGE CONTENT INNER -->
                                             <?php } ?>
                                             <!-- error reporting End -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                      <form method="post" action="<?php echo base_url().'Udise_assesment/emis_school_boardexamresult1';?>" id="brdexm_sec_hsc">
                                                        <div class="table-scrollable">
                                                          <table class="table table-bordered table-striped">
                                                            <thead>
                                                              <tr>
                                                                    <th rowspan="3">Category</th>
                                                                    <th colspan="4">Number of Students Appeared</th>
                                                                    <th colspan="4">Number of Students Passed/Qualified</th>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="2">Regular Students</th>
                                                                    <th colspan="2">Other than Regular Students (if any)</th>
                                                                    <th colspan="2">Regular Students</th>
                                                                    <th colspan="2">Other than Regular Students (if any)</th>
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
                                                                  <select class="form-control space" name="caten2_tb1">
                                                                    <option value="" selected="selected">Select the option</option>
                                                                    <option value="gen">General</option>
                                                                    <option value="sc">SC</option>
                                                                    <option value="st">ST</option>
                                                                    <option value="obc">OBC</option>
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
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                        </div>
                                                       <!-- table scrolling division -->
                                                       <div class="row">
                                                         <center><input type="submit" value="submit" class="btn green" name=""></center>
                                                       </div>
                                                    </form>
                                                       <div class="table-scrollable">
                                                        <table id="user" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th rowspan="3">Category</th>
                                                                    <th colspan="6">Number of Students Appeared</th>
                                                                    <th colspan="6">Number of Students Passed/Qualified</th>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="3">Regular Students</th>
                                                                    <th colspan="3">Other than Regular Students (if any)</th>
                                                                    <th colspan="3">Regular Students</th>
                                                                    <th colspan="3">Other than Regular Students (if any)</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Total</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Total</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Total</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                               <tr>
                                                                   <td>General</td>
                                                                   <td>
                                                                    <center><?php echo $gen_aprd_reg_b; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $gen_aprd_reg_g; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $gen_aprd_reg_t; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $gen_aprd_othreg_b; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $gen_aprd_othreg_g; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $gen_aprd_othreg_t; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $gen_pasd_reg_b; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $gen_pasd_reg_g; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $gen_pasd_reg_t; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $gen_pasd_othreg_b; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $gen_pasd_othreg_g; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $gen_pasd_othreg_t; ?></center>
                                                                   </td>
                                                               </tr>

                                                               <tr>
                                                                   <td>SC</td>
                                                                   <td>
                                                                    <center><?php echo $sc_aprd_reg_b; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $sc_aprd_reg_g; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $sc_aprd_reg_t; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $sc_aprd_othreg_b; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $sc_aprd_othreg_g; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $sc_aprd_othreg_t; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $sc_pasd_reg_b; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $sc_pasd_reg_g; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $sc_pasd_reg_t; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $sc_pasd_othreg_b; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $sc_pasd_othreg_g; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $sc_pasd_othreg_t; ?></center>
                                                                   </td>
                                                               </tr>

                                                               <tr>
                                                                   <td>ST</td>
                                                                   <td>
                                                                    <center><?php echo $st_aprd_reg_b; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $st_aprd_reg_g; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $st_aprd_reg_t; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $st_aprd_othreg_b; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $st_aprd_othreg_g; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $st_aprd_othreg_t; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $st_pasd_reg_b; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $st_pasd_reg_g; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $st_pasd_reg_t; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $st_pasd_othreg_b; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $st_pasd_othreg_g; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $st_pasd_othreg_t; ?></center>
                                                                   </td>
                                                               </tr>

                                                               <tr>
                                                                   <td>OBC</td>
                                                                   <td>
                                                                    <center><?php echo $obc_aprd_reg_b; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $obc_aprd_reg_g; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $obc_aprd_reg_t; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $obc_aprd_othreg_b; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $obc_aprd_othreg_g; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $obc_aprd_othreg_t; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $obc_pasd_reg_b; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $obc_pasd_reg_g; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $obc_pasd_reg_t; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $obc_pasd_othreg_b; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $obc_pasd_othreg_g; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $obc_pasd_othreg_t; ?></center>
                                                                   </td>
                                                               </tr>

                                                               <?php 
                                                                  $tot1  = (($gen_aprd_reg_b)+($sc_aprd_reg_b)+($st_aprd_reg_b)+($obc_aprd_reg_b));
                                                                  $tot2  = (($gen_aprd_reg_g)+($sc_aprd_reg_g)+($st_aprd_reg_g)+($obc_aprd_reg_g));
                                                                  $tot3  = (($gen_aprd_reg_t)+($sc_aprd_reg_t)+($st_aprd_reg_t)+($obc_aprd_reg_t));

                                                                  $tot4  = (($gen_aprd_othreg_b)+($sc_aprd_othreg_b)+($st_aprd_othreg_b)+($obc_aprd_othreg_b));
                                                                  $tot5  = (($gen_aprd_othreg_g)+($sc_aprd_othreg_g)+($st_aprd_othreg_g)+($obc_aprd_othreg_g));
                                                                  $tot6  = (($gen_aprd_othreg_t)+($sc_aprd_othreg_t)+($st_aprd_othreg_t)+($obc_aprd_othreg_t));

                                                                   $tot7  = (($gen_pasd_reg_b)+($sc_pasd_reg_b)+($st_pasd_reg_b)+($obc_pasd_reg_b));
                                                                  $tot8  = (($gen_pasd_reg_g)+($sc_pasd_reg_g)+($st_pasd_reg_g)+($obc_pasd_reg_g));
                                                                  $tot9  = (($gen_pasd_reg_t)+($sc_pasd_reg_t)+($st_pasd_reg_t)+($obc_pasd_reg_t));

                                                                  $tot10  = (($gen_pasd_othreg_b)+($sc_pasd_othreg_b)+($st_pasd_othreg_b)+($obc_pasd_othreg_b));
                                                                  $tot11  = (($gen_pasd_othreg_g)+($sc_pasd_othreg_g)+($st_pasd_othreg_g)+($obc_pasd_othreg_g));
                                                                  $tot12  = (($gen_pasd_othreg_t)+($sc_pasd_othreg_t)+($st_pasd_othreg_t)+($obc_pasd_othreg_t));
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
                                                                   <td>
                                                                    <center><?php echo $tot11; ?></center>
                                                                   </td>
                                                                   <td>
                                                                    <center><?php echo $tot12; ?></center>
                                                                   </td>
                                                               </tr>
                                                            </tbody>
                                                        </table>
                                                      </div>
                                                      <!-- table-scrollable ending -->
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>



                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Board Examination Results at Secondary and Higher Secondary Levels</span> - <small>Number of regular students passed / Qualified the Secondary School Board(Grade X) Examination by range of marks (inprevious academic year)</small>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                              <!-- error reporting start -->
                                                       <?php if ($this->session->flashdata('assesmentfrm4')){ ?> 
                                                <!-- BEGIN PAGE CONTENT INNER -->
                                                   <div class="page-content-inner">
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="note note-danger note-bordered">
                                                               <?php echo $this->session->flashdata('assesmentfrm4'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <!-- END PAGE CONTENT INNER -->
                                             <?php } ?>
                                             <!-- error reporting End -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                      <form method="post" action="<?php echo base_url().'Udise_assesment/emis_school_boardexamresult1';?>" id="brdexm_sec_hsc_grd10">

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
                                                                      <select class="form-control" name="en2tb2_cat" style="width: 150px;">
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
                                                      <!-- table scrollable ending -->
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>



                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Board Examination Results at Secondary and Higher Secondary Levels</span> - <small>Number of Other than Regular Students(if any) passed / qualified the Secondary School Board(Grade X) Examination by range of marks (inprevious academic year)</small>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                              <!-- error reporting start -->
                                                       <?php if ($this->session->flashdata('assesmentfrm5')){ ?> 
                                                <!-- BEGIN PAGE CONTENT INNER -->
                                                   <div class="page-content-inner">
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="note note-danger note-bordered">
                                                               <?php echo $this->session->flashdata('assesmentfrm5'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <!-- END PAGE CONTENT INNER -->
                                             <?php } ?>
                                             <!-- error reporting End -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                      <form method="post" action="<?php echo base_url().'Udise_assesment/emis_school_boardexamresult1';?>" id="brdexm_sec_hsc_grd10_othreg">

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
                                                                      <select class="form-control" name="en2tb3_cat" style="width: 150px;">
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
                                                                      <center><?php echo $otreg_ut40_gen_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_ut40_gen_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_ut40_sc_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_ut40_sc_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_ut40_st_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_ut40_st_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_ut40_obc_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_ut40_obc_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_ut40_tot_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_ut40_tot_g; ?></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>41-60%</td>
                                                                    <td>
                                                                      <center><?php echo $otreg_rng_41to60_gen_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_rng_41to60_gen_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_rng_41to60_sc_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_rng_41to60_sc_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_rng_41to60_st_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_rng_41to60_st_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_rng_41to60_obc_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_rng_41to60_obc_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_rng_41to60_tot_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_rng_41to60_tot_g; ?></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>61-80%</td>
                                                                    <td>
                                                                      <center><?php echo $otreg_rng_61to80_gen_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_rng_61to80_gen_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_rng_61to80_sc_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_rng_61to80_sc_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_rng_61to80_st_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_rng_61to80_st_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_rng_61to80_obc_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_rng_61to80_obc_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_rng_61to80_tot_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_rng_61to80_tot_g; ?></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Above80%</td>
                                                                    <td>
                                                                      <center><?php echo $otreg_abv80_gen_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_abv80_gen_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_abv80_sc_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_abv80_sc_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_abv80_st_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_abv80_st_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_abv80_obc_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_abv80_obc_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_abv80_tot_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                      <center><?php echo $otreg_abv80_tot_g; ?></center>
                                                                    </td>
                                                                </tr>

                                                                <?php 
                                                                $tot1 = (($otreg_ut40_gen_b)+($otreg_rng_41to60_gen_b)+($otreg_rng_61to80_gen_b)+($otreg_abv80_gen_b));
                                                                $tot2 = (($otreg_ut40_gen_g)+($otreg_rng_41to60_gen_g)+($otreg_rng_61to80_gen_g)+($otreg_abv80_gen_g));
                                                                $tot3 = (($otreg_ut40_sc_b)+($otreg_rng_41to60_sc_b)+($otreg_rng_61to80_sc_b)+($otreg_abv80_sc_b));
                                                                $tot4 = (($otreg_ut40_sc_g)+($otreg_rng_41to60_sc_g)+($otreg_rng_61to80_sc_g)+($otreg_abv80_sc_g));
                                                                
                                                                $tot5 = (($otreg_ut40_st_b)+($otreg_rng_41to60_st_b)+($otreg_rng_61to80_st_b)+($otreg_abv80_st_b));
                                                                $tot6 = (($otreg_ut40_st_g)+($otreg_rng_41to60_st_g)+($otreg_rng_61to80_st_g)+($otreg_abv80_st_g));

                                                                $tot7 = (($otreg_ut40_obc_b)+($otreg_rng_41to60_obc_b)+($otreg_rng_61to80_obc_b)+($otreg_abv80_obc_b));
                                                                $tot8 = (($otreg_ut40_obc_g)+($otreg_rng_41to60_obc_g)+($otreg_rng_61to80_obc_g)+($otreg_abv80_obc_g));

                                                                $tot9 = (($otreg_ut40_tot_b)+($otreg_rng_41to60_tot_b)+($otreg_rng_61to80_tot_b)+($otreg_abv80_tot_b));
                                                                $tot10 = (($otreg_ut40_tot_g)+($otreg_rng_41to60_tot_g)+($otreg_rng_61to80_tot_g)+($otreg_abv80_tot_g));
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
                                                      <!-- table scrollable ending -->
                                                       </form>
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
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js";></script>

        <script src="<?php echo base_url().'asset/global/plugins/jquery.validate.min.js';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/emis2.js'?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->


    </body>

</html>