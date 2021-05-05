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
                                                <a href="<?php echo base_url().'Design/emis_school_examresult1';?>"><div class="col-md-4 bg-grey mt-step-col active">
                                                    <div class="mt-step-number bg-white font-grey">1</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Annual Exam Result</div>
                                                    <div class="mt-step-content font-grey-cascade">Elementry Level</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Design/emis_school_boardexamresult1';?>"><div class="col-md-4 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">2</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Board Exam Result</div>
                                                    <div class="mt-step-content font-grey-cascade">Secondary and Higher Secondary Levels</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Design/emis_school_boardoruniversityexamresult';?>"><div class="col-md-4 bg-grey mt-step-col">
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
                                                <div class="row">
                                                    <div class="col-md-12">
                                                      <form method="post" action="" id="annualexamresultatelementrylevel">
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
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentsappeared_genboys" id="annualexamresult_elemtrylvl_noofstudentsappeared_genboys" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentsappeared_gengirls" id="annualexamresult_elemtrylvl_noofstudentsappeared_gengirls" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentsappeared_gentotal" id="annualexamresult_elemtrylvl_noofstudentsappeared_gentotal" readonly="readonly"  disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedqualified_genboys" id="annualexamresult_elemtrylvl_noofstudentspaasedqualified_genboys" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedqualified_gengirls" id="annualexamresult_elemtrylvl_noofstudentspaasedqualified_gengirls" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedqualified_gentotal" id="annualexamresult_elemtrylvl_noofstudentspaasedqualified_gentotal" readonly="readonly"  disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_genboys" id="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_genboys" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_gengirls" id="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_gengirls" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_gentotal" id="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_gentotal" readonly="readonly"  disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>SC</td>        
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentsappeared_scboys" id="annualexamresult_elemtrylvl_noofstudentsappeared_scboys" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentsappeared_scgirls" id="annualexamresult_elemtrylvl_noofstudentsappeared_scgirls" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentsappeared_sctotal" id="annualexamresult_elemtrylvl_noofstudentsappeared_sctotal" readonly="readonly"  disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedqualified_scboys" id="annualexamresult_elemtrylvl_noofstudentspaasedqualified_scboys" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedqualified_scgirls" id="annualexamresult_elemtrylvl_noofstudentspaasedqualified_scgirls" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedqualified_sctotal" id="annualexamresult_elemtrylvl_noofstudentspaasedqualified_sctotal" readonly="readonly"  disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_scboys" id="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_scboys" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_scgirls" id="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_scgirls" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_sctotal" id="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_sctotal" readonly="readonly"  disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>ST</td>        
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentsappeared_stboys" id="annualexamresult_elemtrylvl_noofstudentsappeared_stboys" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentsappeared_stgirls" id="annualexamresult_elemtrylvl_noofstudentsappeared_stgirls" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentsappeared_sttotal" id="annualexamresult_elemtrylvl_noofstudentsappeared_sttotal" readonly="readonly"  disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedqualified_stboys" id="annualexamresult_elemtrylvl_noofstudentspaasedqualified_stboys" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedqualified_stgirls" id="annualexamresult_elemtrylvl_noofstudentspaasedqualified_stgirls" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedqualified_sttotal" id="annualexamresult_elemtrylvl_noofstudentspaasedqualified_sttotal" readonly="readonly"  disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_stboys" id="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_stboys" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_stgirls" id="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_stgirls" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_sttotal" id="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_sttotal" readonly="readonly"  disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>OBC</td>        
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentsappeared_obcboys" id="annualexamresult_elemtrylvl_noofstudentsappeared_obcboys" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentsappeared_obcgirls" id="annualexamresult_elemtrylvl_noofstudentsappeared_obcgirls" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentsappeared_obctotal" id="annualexamresult_elemtrylvl_noofstudentsappeared_obctotal" readonly="readonly"  disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedqualified_obcboys" id="annualexamresult_elemtrylvl_noofstudentspaasedqualified_obcboys" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedqualified_obcgirls" id="annualexamresult_elemtrylvl_noofstudentspaasedqualified_obcgirls" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedqualified_obctotal" id="annualexamresult_elemtrylvl_noofstudentspaasedqualified_obctotal" readonly="readonly"  disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_obcboys" id="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_obcboys" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_obcgirls" id="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_obcgirls" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_obctotal" id="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_obctotal" readonly="readonly"  disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total</td>        
                                                                    <td><input type="text" class="form-control" name="Grandtotalnoofstudapprdboys" id="Grandtotalnoofstudapprdboys" readonly="readonly"  disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="Grandtotalnoofstudapprdgirls" id="Grandtotalnoofstudapprdgirls" readonly="readonly"  disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="Grandtotalnoofstudapprdtot" id="Grandtotalnoofstudapprdtot" readonly="readonly"  disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="Grandtotalnoofstudpassedboys" id="Grandtotalnoofstudpassedboys" readonly="readonly"  disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="Grandtotalnoofstudpassedgirls" id="Grandtotalnoofstudpassedgirls" readonly="readonly"  disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="Grandtotalnoofstudpassedtot" id="Grandtotalnoofstudpassedtot" readonly="readonly"  disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="Grandtotalmorethan60percentboys" id="Grandtotalmorethan60percentboys" readonly="readonly"  disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="Grandtotalmorethan60percentgirls" id="Grandtotalmorethan60percentgirls" readonly="readonly"  disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="Grandtotalmorethan60percenttot" id="Grandtotalmorethan60percenttot" readonly="readonly"  disabled="disabled"></td> 
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                      </div>
                                                      <!-- table scrollable ending -->
                                                        <div class="row">

                                                            <center><input type="button" id="calc" class="btn btn green" value="Calculate"> <input type="submit" value="submit" class="btn btn green"  id="submitbtn" name="" style="display: none;"></center>
                                                        </div>
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
                                                <div class="row">
                                                    <div class="col-md-12">
                                                      <form method="post" action="" id="annualexamresultatelementrylevelgrade8">
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
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentsappeared_genboys8" id="annualexamresult_elemtrylvl_noofstudentsappeared_genboys8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentsappeared_gengirls8" id="annualexamresult_elemtrylvl_noofstudentsappeared_gengirls8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentsappeared_gentotal8" id="annualexamresult_elemtrylvl_noofstudentsappeared_gentotal8" readonly="readonly"  disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedqualified_genboys8" id="annualexamresult_elemtrylvl_noofstudentspaasedqualified_genboys8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedqualified_gengirls8" id="annualexamresult_elemtrylvl_noofstudentspaasedqualified_gengirls8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedqualified_gentotal8" id="annualexamresult_elemtrylvl_noofstudentspaasedqualified_gentotal8" readonly="readonly"  disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_genboys8" id="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_genboys8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_gengirls8" id="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_gengirls8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_gentotal8" id="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_gentotal8" readonly="readonly"  disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>SC</td>        
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentsappeared_scboys8" id="annualexamresult_elemtrylvl_noofstudentsappeared_scboys8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentsappeared_scgirls8" id="annualexamresult_elemtrylvl_noofstudentsappeared_scgirls8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentsappeared_sctotal8" id="annualexamresult_elemtrylvl_noofstudentsappeared_sctotal8" readonly="readonly"  disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedqualified_scboys8" id="annualexamresult_elemtrylvl_noofstudentspaasedqualified_scboys8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedqualified_scgirls8" id="annualexamresult_elemtrylvl_noofstudentspaasedqualified_scgirls8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedqualified_sctotal8" id="annualexamresult_elemtrylvl_noofstudentspaasedqualified_sctotal8" readonly="readonly"  disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_scboys8" id="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_scboys8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_scgirls8" id="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_scgirls8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_sctotal8" id="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_sctotal8" readonly="readonly"  disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>ST</td>        
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentsappeared_stboys8" id="annualexamresult_elemtrylvl_noofstudentsappeared_stboys8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentsappeared_stgirls8" id="annualexamresult_elemtrylvl_noofstudentsappeared_stgirls8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentsappeared_sttotal8" id="annualexamresult_elemtrylvl_noofstudentsappeared_sttotal8" readonly="readonly"  disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedqualified_stboys8" id="annualexamresult_elemtrylvl_noofstudentspaasedqualified_stboys8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedqualified_stgirls8" id="annualexamresult_elemtrylvl_noofstudentspaasedqualified_stgirls8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedqualified_sttotal8" id="annualexamresult_elemtrylvl_noofstudentspaasedqualified_sttotal8" readonly="readonly"  disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_stboys8" id="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_stboys8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_stgirls8" id="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_stgirls8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_sttotal8" id="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_sttotal8" readonly="readonly"  disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>OBC</td>        
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentsappeared_obcboys8" id="annualexamresult_elemtrylvl_noofstudentsappeared_obcboys8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentsappeared_obcgirls8" id="annualexamresult_elemtrylvl_noofstudentsappeared_obcgirls8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentsappeared_obctotal8" id="annualexamresult_elemtrylvl_noofstudentsappeared_obctotal8" readonly="readonly"  disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedqualified_obcboys8" id="annualexamresult_elemtrylvl_noofstudentspaasedqualified_obcboys8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedqualified_obcgirls8" id="annualexamresult_elemtrylvl_noofstudentspaasedqualified_obcgirls8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedqualified_obctotal8" id="annualexamresult_elemtrylvl_noofstudentspaasedqualified_obctotal8" readonly="readonly"  disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_obcboys8" id="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_obcboys8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_obcgirls8" id="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_obcgirls8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_obctotal8" id="annualexamresult_elemtrylvl_noofstudentspaasedwithmorethan60percent_obctotal8" readonly="readonly"  disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total</td>        
                                                                    <td><input type="text" class="form-control" name="Grandtotalnoofstudapprdboys" id="Grandtotalnoofstudapprdboys8" readonly="readonly"  disabled="disabled" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="Grandtotalnoofstudapprdgirls" id="Grandtotalnoofstudapprdgirls8" readonly="readonly"  disabled="disabled" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="Grandtotalnoofstudapprdtot8" id="Grandtotalnoofstudapprdtot8" readonly="readonly"  disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="Grandtotalnoofstudpassedboys8" id="Grandtotalnoofstudpassedboys8" readonly="readonly"  disabled="disabled" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="Grandtotalnoofstudpassedgirls8" id="Grandtotalnoofstudpassedgirls8" readonly="readonly"  disabled="disabled" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="Grandtotalnoofstudpassedtot8" id="Grandtotalnoofstudpassedtot8" readonly="readonly"  disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="Grandtotalmorethan60percentboys" id="Grandtotalmorethan60percentboys8" readonly="readonly"  disabled="disabled" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="Grandtotalmorethan60percentgirls" id="Grandtotalmorethan60percentgirls8" readonly="readonly"  disabled="disabled" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="Grandtotalmorethan60percenttot" id="Grandtotalmorethan60percenttot8" readonly="readonly"  disabled="disabled"></td> 
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                      </div>
                                                      <!-- table scrollable ending -->
                                                        <div class="row">

                                                            <center><input type="button" id="calctable2" class="btn btn green" value="Calculate"> <input type="submit" value="submit" class="btn btn green"  id="submitbtnform2" name="" style="display: none;"></center>
                                                        </div>
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
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        <script src="<?php echo base_url().'asset/global/plugins/emis2.js'?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->


    </body>

</html>