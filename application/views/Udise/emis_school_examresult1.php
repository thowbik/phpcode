<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
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
                                        <!--     <small>School edit and update</small> -->
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
                                                <a href="<?php echo base_url().'Udise_assesment/emis_school_examresult1';?>"><div class="col-md-4 bg-grey mt-step-col active">
                                                    <div class="mt-step-number bg-white font-grey">1</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Annual Exam Result</div>
                                                    <div class="mt-step-content font-grey-cascade">Elementry Level</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Udise_assesment/emis_school_boardexamresult1';?>"><div class="col-md-4 bg-grey mt-step-col">
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
                                                    <span class="caption-subject font-dark sbold uppercase">Annual Exam Result at Elementary Level</span> - <small>Grade promotion by social category and gender in 2017/18 for Grade V</small>
                                                </div>
                                            </div>
                                            <div class="portlet-body">

                                                 <!-- error reporting start -->
                                                       <?php if ($this->session->flashdata('assesmentfrm1')){ ?> 
                                                <!-- BEGIN PAGE CONTENT INNER -->
                                                   <div class="page-content-inner">
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="note note-danger note-bordered">
                                                               <?php echo $this->session->flashdata('assesmentfrm1'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <!-- END PAGE CONTENT INNER -->
                                             <?php } ?>
                                             <!-- error reporting End -->


                                                <div class="row">
                                                    <div class="col-md-12">
                                                      <form method="post" action="<?php echo base_url().'Udise_assesment/emis_school_examresult1' ?>" id="anl_exm_rsl_ele_lvl">
                                                        <div class="table-scrollable">
                                                        <table class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th rowspan="2">Category</th>
                                                                    <th colspan="2">Number of Students Appeared</th>
                                                                    <th colspan="2">Number of Students Passed/Qualified</th>
                                                                    <th colspan="2">Number of Students Passed with more than 60%</th>
                                                                </tr>
                                                                <tr>
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
                                                                        <select class="form-control" name="category">
                                                                            <option value="" selected="selected">Select the category</option>
                                                                            <option value="gen">General</option>
                                                                            <option value="sc">SC</option>
                                                                            <option value="st">ST</option>
                                                                            <option value="obc">OBC</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                       <input type="text" name="tb1" class="form-control" maxlength="4">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="tb2" class="form-control" maxlength="4">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="tb3" class="form-control" maxlength="4">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="tb4" class="form-control" maxlength="4">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="tb5" class="form-control" maxlength="4">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="tb6" class="form-control" maxlength="4">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- table 1 scrollable ending -->
                                                    <div class="row">
                                                        <center><input type="submit" value="submit" class="btn green" name=""></center>
                                                    </div>
                                                    </form>
                                                       <!-- table scrolling division -->
                                                       <div class="table-scrollable">
                                                        <table id="user" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th rowspan="2">Category</th>
                                                                    <th colspan="3">Number of Students Appeared</th>
                                                                    <th colspan="3">Number of Students Passed/Qualified</th>
                                                                    <th colspan="3">Number of Students Passed with more than 60%</th>
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
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>General</td>
                                                                    <td>
                                                                       <center><?php echo $gen_apprd_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $gen_apprd_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $gen_apprd_t; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $gen_passd_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $gen_passd_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $gen_passd_t; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $gen_mt60_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $gen_mt60_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $gen_mt60_t; ?></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>SC</td>
                                                                     <td>
                                                                       <center><?php echo $sc_apprd_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $sc_apprd_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $sc_apprd_t; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $sc_passd_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $sc_passd_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $sc_passd_t; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $sc_mt60_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $sc_mt60_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $sc_mt60_t; ?></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>ST</td>
                                                                     <td>
                                                                       <center><?php echo $st_apprd_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $st_apprd_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $st_apprd_t; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $st_passd_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $st_passd_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $st_passd_t; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $st_mt60_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $st_mt60_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $st_mt60_t; ?></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>OBC</td> 
                                                                     <td>
                                                                       <center><?php echo $obc_apprd_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $obc_apprd_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $obc_apprd_t; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $obc_passd_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $obc_passd_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $obc_passd_t; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $obc_mt60_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $obc_mt60_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $obc_mt60_t; ?></center>
                                                                    </td>
                                                                </tr>
                                                                <?php 
                                                                    $tot1 =  (($gen_apprd_b)+($sc_apprd_b)+($st_apprd_b)+($obc_apprd_b));
                                                                    $tot2 =  (($gen_apprd_g)+($sc_apprd_g)+($st_apprd_g)+($obc_apprd_g));
                                                                    $tot3 =  (($gen_apprd_t)+($sc_apprd_t)+($st_apprd_t)+($obc_apprd_t));

                                                                    $tot4 =  (($gen_passd_b)+($sc_passd_b)+($st_passd_b)+($obc_passd_b));
                                                                    $tot5 =  (($gen_passd_g)+($sc_passd_g)+($st_passd_g)+($obc_passd_g));
                                                                    $tot6 =  (($gen_passd_t)+($sc_passd_t)+($st_passd_t)+($obc_passd_t));

                                                                    $tot7 =  (($gen_mt60_b)+($sc_mt60_b)+($st_mt60_b)+($obc_mt60_b));
                                                                    $tot8 =  (($gen_mt60_g)+($sc_mt60_g)+($st_mt60_g)+($obc_mt60_g));
                                                                    $tot9 =  (($gen_mt60_t)+($sc_mt60_t)+($st_mt60_t)+($obc_mt60_t));
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



                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Annual Exam Result at Elementary Level</span> - <small>Grade promotion by social category and gender in 2017/18 for Grade VIII</small>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <!-- error reporting start -->
                                                       <?php if ($this->session->flashdata('assesmentfrm2')){ ?> 
                                                <!-- BEGIN PAGE CONTENT INNER -->
                                                   <div class="page-content-inner">
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="note note-danger note-bordered">
                                                               <?php echo $this->session->flashdata('assesmentfrm2'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <!-- END PAGE CONTENT INNER -->
                                             <?php } ?>
                                             <!-- error reporting End -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                      <form method="post" action="<?php echo base_url().'Udise_assesment/emis_school_examresult1'; ?>" id="anl_exm_rsl_ele_lvl_grd8">
                                                        <div class="table-scrollable">
                                                        <table class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th rowspan="2">Category</th>
                                                                    <th colspan="2">Number of Students Appeared</th>
                                                                    <th colspan="2">Number of Students Passed/Qualified</th>
                                                                    <th colspan="2">Number of Students Passed with more than 60%</th>
                                                                </tr>
                                                                <tr>
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
                                                                        <select class="form-control" name="category_tbl2">
                                                                            <option value="" selected="selected">Select the category</option>
                                                                            <option value="gen">General</option>
                                                                            <option value="sc">SC</option>
                                                                            <option value="st">ST</option>
                                                                            <option value="obc">OBC</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                       <input type="text" name="tb1" class="form-control" maxlength="4">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="tb2" class="form-control" maxlength="4">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="tb3" class="form-control" maxlength="4">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="tb4" class="form-control" maxlength="4">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="tb5" class="form-control" maxlength="4">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="tb6" class="form-control" maxlength="4">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- table 1 scrollable ending -->
                                                        <div class="row">
                                                            <center><input type="submit" value="submit" class="btn btn green"></center>
                                                        </div>
                                                </form>
                                                       <!-- table scrolling division -->
                                                       <div class="table-scrollable">
                                                        <table id="user" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th rowspan="2">Category</th>
                                                                    <th colspan="3">Number of Students Appeared</th>
                                                                    <th colspan="3">Number of Students Passed/Qualified</th>
                                                                    <th colspan="3">Number of Students Passed with more than 60%</th>
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
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>General</td>
                                                                    <td>
                                                                       <center><?php echo $grd8_gen_apprd_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_gen_apprd_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_gen_apprd_t; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_gen_passd_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_gen_passd_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_gen_passd_t; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_gen_mt60_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_gen_mt60_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_gen_mt60_t; ?></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>SC</td>
                                                                     <td>
                                                                       <center><?php echo $grd8_sc_apprd_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_sc_apprd_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_sc_apprd_t; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_sc_passd_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_sc_passd_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_sc_passd_t; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_sc_mt60_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_sc_mt60_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_sc_mt60_t; ?></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>ST</td>
                                                                     <td>
                                                                       <center><?php echo $grd8_st_apprd_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_st_apprd_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_st_apprd_t; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_st_passd_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_st_passd_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_st_passd_t; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_st_mt60_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_st_mt60_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_st_mt60_t; ?></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>OBC</td> 
                                                                     <td>
                                                                       <center><?php echo $grd8_obc_apprd_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_obc_apprd_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_obc_apprd_t; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_obc_passd_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_obc_passd_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_obc_passd_t; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_obc_mt60_b; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_obc_mt60_g; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <center><?php echo $grd8_obc_mt60_t; ?></center>
                                                                    </td>
                                                                </tr>
                                                                <?php 
                                                                    $tot1 =  (($grd8_gen_apprd_b)+($grd8_sc_apprd_b)+($grd8_st_apprd_b)+($grd8_obc_apprd_b));
                                                                    $tot2 =  (($grd8_gen_apprd_g)+($grd8_sc_apprd_g)+($grd8_st_apprd_g)+($grd8_obc_apprd_g));
                                                                    $tot3 =  (($grd8_gen_apprd_t)+($grd8_sc_apprd_t)+($grd8_st_apprd_t)+($grd8_obc_apprd_t));

                                                                    $tot4 =  (($grd8_gen_passd_b)+($grd8_sc_passd_b)+($grd8_st_passd_b)+($grd8_obc_passd_b));
                                                                    $tot5 =  (($grd8_gen_passd_g)+($grd8_sc_passd_g)+($grd8_st_passd_g)+($grd8_obc_passd_g));
                                                                    $tot6 =  (($grd8_gen_passd_t)+($grd8_sc_passd_t)+($grd8_st_passd_t)+($grd8_obc_passd_t));

                                                                    $tot7 =  (($grd8_gen_mt60_b)+($grd8_sc_mt60_b)+($grd8_st_mt60_b)+($grd8_obc_mt60_b));
                                                                    $tot8 =  (($grd8_gen_mt60_g)+($grd8_sc_mt60_g)+($grd8_st_mt60_g)+($grd8_obc_mt60_g));
                                                                    $tot9 =  (($grd8_gen_mt60_t)+($grd8_sc_mt60_t)+($grd8_st_mt60_t)+($grd8_obc_mt60_t));
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

            <p id="total"></p>

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