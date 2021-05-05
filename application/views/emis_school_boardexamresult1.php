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
                                                <a href="<?php echo base_url().'Design/emis_school_examresult1';?>"><div class="col-md-4 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">1</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Annual Exam Result</div>
                                                    <div class="mt-step-content font-grey-cascade">Elementry Level</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Design/emis_school_boardexamresult1';?>"><div class="col-md-4 bg-grey mt-step-col active">
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
                                                    <span class="caption-subject font-dark sbold uppercase">Board Examination Results at Secondary and Higher Secondary Levels</span> - <small>Results of the GradeX Board Examination in the previous academic year</small>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                      <form method="post" action="<?php echo base_url().'Udise_assesment/updateasmntgrd10frm1;' ?>" id="boardexamsecondaryandhighersecondary">
                                                       <!-- table scrolling division -->
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
                                                                   <td><input type="text" class="form-control" name="gentb1" id="gentb1"></td>
                                                                   <td><input type="text" class="form-control" name="gentb2" id="gentb2"></td>
                                                                   <td><input type="text" class="form-control" name="gentot" id="gentot" disabled="disabled"></td>
                                                                   <td><input type="text" class="form-control" name="gentb3" id="gentb3"></td>
                                                                   <td><input type="text" class="form-control" name="gentb4" id="gentb4"></td>
                                                                   <td><input type="text" class="form-control" name="gentot1" id="gentot1" disabled="disabled"></td>
                                                                   <td><input type="text" class="form-control" name="gentb5" id="gentb5"></td>
                                                                   <td><input type="text" class="form-control" name="gentb6" id="gentb6"></td>
                                                                   <td><input type="text" class="form-control" name="gentot2" id="gentot2" disabled="disabled"></td>
                                                                   <td><input type="text" class="form-control" name="gentb7" id="gentb7"></td>
                                                                   <td><input type="text" class="form-control" name="gentb8" id="gentb8"></td>
                                                                   <td><input type="text" class="form-control" name="gentot3" id="gentot3" disabled="disabled"></td>
                                                               </tr>

                                                               <tr>
                                                                   <td>SC</td>
                                                                   <td><input type="text" class="form-control" name="sctb1" id="sctb1"></td>
                                                                   <td><input type="text" class="form-control" name="sctb2" id="sctb2"></td>
                                                                   <td><input type="text" class="form-control" name="sctot" id="sctot" disabled="disabled"></td>
                                                                   <td><input type="text" class="form-control" name="sctb3" id="sctb3"></td>
                                                                   <td><input type="text" class="form-control" name="sctb4" id="sctb4"></td>
                                                                   <td><input type="text" class="form-control" name="sctot1" id="sctot1" disabled="disabled"></td>
                                                                   <td><input type="text" class="form-control" name="sctb5" id="sctb5"></td>
                                                                   <td><input type="text" class="form-control" name="sctb6" id="sctb6"></td>
                                                                   <td><input type="text" class="form-control" name="sctot2" id="sctot2" disabled="disabled"></td>
                                                                   <td><input type="text" class="form-control" name="sctb7" id="sctb7"></td>
                                                                   <td><input type="text" class="form-control" name="sctb8" id="sctb8"></td>
                                                                   <td><input type="text" class="form-control" name="scttot3" id="sctot3" disabled="disabled"></td>
                                                               </tr>

                                                               <tr>
                                                                   <td>ST</td>
                                                                   <td><input type="text" class="form-control" name="sttb1" id="sttb1"></td>
                                                                   <td><input type="text" class="form-control" name="sttb2" id="sttb2"></td>
                                                                   <td><input type="text" class="form-control" name="sttot" id="sttot" disabled="disabled"></td>
                                                                   <td><input type="text" class="form-control" name="sttb3" id="sttb3"></td>
                                                                   <td><input type="text" class="form-control" name="sttb4" id="sttb4"></td>
                                                                   <td><input type="text" class="form-control" name="sttot" id="sttot1" disabled="disabled"></td>
                                                                   <td><input type="text" class="form-control" name="sttb5" id="sttb5"></td>
                                                                   <td><input type="text" class="form-control" name="sttb6" id="sttb6"></td>
                                                                   <td><input type="text" class="form-control" name="sttot2" id="sttot2" disabled="disabled"></td>
                                                                   <td><input type="text" class="form-control" name="sttb7" id="sttb7"></td>
                                                                   <td><input type="text" class="form-control" name="sttb8" id="sttb8"></td>
                                                                   <td><input type="text" class="form-control" name="stttot3" id="sttot3" disabled="disabled"></td>
                                                               </tr>

                                                               <tr>
                                                                   <td>OBC</td>
                                                                   <td><input type="text" class="form-control" name="obctb1" id="obctb1"></td>
                                                                   <td><input type="text" class="form-control" name="obctb2" id="obctb2"></td>
                                                                   <td><input type="text" class="form-control" name="obctot" id="obctot" disabled="disabled"></td>
                                                                   <td><input type="text" class="form-control" name="obctb3" id="obctb3"></td>
                                                                   <td><input type="text" class="form-control" name="obctb4" id="obctb4"></td>
                                                                   <td><input type="text" class="form-control" name="obctot1" id="obctot1" disabled="disabled"></td>
                                                                   <td><input type="text" class="form-control" name="obctb5" id="obctb5"></td>
                                                                   <td><input type="text" class="form-control" name="obctb6" id="obctb6"></td>
                                                                   <td><input type="text" class="form-control" name="obctot2" id="obctot2" disabled="disabled"></td>
                                                                   <td><input type="text" class="form-control" name="obctb7" id="obctb7"></td>
                                                                   <td><input type="text" class="form-control" name="obctb8" id="obctb8"></td>
                                                                   <td><input type="text" class="form-control" name="obctot3" id="obctot3" disabled="disabled"></td>
                                                               </tr>

                                                               <tr>
                                                                   <td>Total</td>
                                                                   <td><input type="text" name="grandtot1" id="grandtot1" disabled="disabled" class="form-control"></td>
                                                                   <td><input type="text" name="grandtot2" id="grandtot2" disabled="disabled"  class="form-control"></td>
                                                                   <td><input type="text" name="grandtot3" id="grandtot3" disabled="disabled"  class="form-control"></td>
                                                                   <td><input type="text" name="grandtot4" id="grandtot4" disabled="disabled"  class="form-control"></td>
                                                                   <td><input type="text" name="grandtot5" id="grandtot5" disabled="disabled"  class="form-control"></td>
                                                                   <td><input type="text" name="grandtot6" id="grandtot6" disabled="disabled"  class="form-control"></td>
                                                                   <td><input type="text" name="grandtot7" id="grandtot7" disabled="disabled" class="form-control"></td>
                                                                   <td><input type="text" name="grandtot8" id="grandtot8" disabled="disabled"  class="form-control"></td>
                                                                   <td><input type="text" name="grandtot9" id="grandtot9" disabled="disabled"  class="form-control"></td>
                                                                   <td><input type="text" name="grandtot10" id="grandtot10" disabled="disabled"  class="form-control"></td>
                                                                   <td><input type="text" name="grandtot11" id="grandtot11" disabled="disabled"  class="form-control"></td>
                                                                   <td><input type="text" name="grandtot12" id="grandtot12" disabled="disabled"  class="form-control"></td>
                                                               </tr>
                                                            </tbody>
                                                        </table>
                                                      </div>
                                                      <!-- table-scrollable ending -->
                                                        <div class="row">

                                                            <center><input type="button" id="boardexamcalc" class="btn btn green" value="Calculate"> <input type="submit" value="submit" class="btn btn green"  id="submitbtnboardexam" name="" style="display: none;"></center>
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
                                                    <span class="caption-subject font-dark sbold uppercase">Board Examination Results at Secondary and Higher Secondary Levels</span> - <small>Number of regular students passed / Qualified the Secondary School Board(Grade X) Examination by range of marks (inprevious academic year)</small>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                      <form method="post" action="" id="boardexamsecondaryandhighersecondarygrade10form2">
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
                                                                    <td><input type="text" class="form-control" name="regupto40percenttb1" id="regupto40percenttb1"></td>
                                                                    <td><input type="text" class="form-control" name="regupto40percenttb2" id="regupto40percenttb2"></td>
                                                                    <td><input type="text" class="form-control" name="regupto40percenttb3" id="regupto40percenttb3"></td>
                                                                    <td><input type="text" class="form-control" name="regupto40percenttb4" id="regupto40percenttb4"></td>
                                                                    <td><input type="text" class="form-control" name="regupto40percenttb5" id="regupto40percenttb5"></td>
                                                                    <td><input type="text" class="form-control" name="regupto40percenttb6" id="regupto40percenttb6"></td>
                                                                    <td><input type="text" class="form-control" name="regupto40percenttb7" id="regupto40percenttb7"></td>
                                                                    <td><input type="text" class="form-control" name="regupto40percenttb8" id="regupto40percenttb8"></td>
                                                                    <td><input type="text" class="form-control" name="regupto40percenttot1" id="regupto40percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="regupto40percenttot2" id="regupto40percenttot2" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>41-60%</td>
                                                                    <td><input type="text" class="form-control" name="reg41to60percenttb1" id="reg41to60percenttb1"></td>
                                                                    <td><input type="text" class="form-control" name="reg41to60percenttb2" id="reg41to60percenttb2"></td>
                                                                    <td><input type="text" class="form-control" name="reg41to60percenttb3" id="reg41to60percenttb3"></td>
                                                                    <td><input type="text" class="form-control" name="reg41to60percenttb4" id="reg41to60percenttb4"></td>
                                                                    <td><input type="text" class="form-control" name="reg41to60percenttb5" id="reg41to60percenttb5"></td>
                                                                    <td><input type="text" class="form-control" name="reg41to60percenttb6" id="reg41to60percenttb6"></td>
                                                                    <td><input type="text" class="form-control" name="reg41to60percenttb7" id="reg41to60percenttb7"></td>
                                                                    <td><input type="text" class="form-control" name="reg41to60percenttb8" id="reg41to60percenttb8"></td>
                                                                    <td><input type="text" class="form-control" name="reg41to60percenttot1" id="reg41to60percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reg41to60percenttot2" id="reg41to60percenttot2" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>61-80%</td>
                                                                    <td><input type="text" class="form-control" name="reg61to80percenttb1" id="reg61to80percenttb1"></td>
                                                                    <td><input type="text" class="form-control" name="reg61to80percenttb2" id="reg61to80percenttb2"></td>
                                                                    <td><input type="text" class="form-control" name="reg61to80percenttb3" id="reg61to80percenttb3"></td>
                                                                    <td><input type="text" class="form-control" name="reg61to80percenttb4" id="reg61to80percenttb4"></td>
                                                                    <td><input type="text" class="form-control" name="reg61to80percenttb5" id="reg61to80percenttb5"></td>
                                                                    <td><input type="text" class="form-control" name="reg61to80percenttb6" id="reg61to80percenttb6"></td>
                                                                    <td><input type="text" class="form-control" name="reg61to80percenttb7" id="reg61to80percenttb7"></td>
                                                                    <td><input type="text" class="form-control" name="reg61to80percenttb8" id="reg61to80percenttb8"></td>
                                                                    <td><input type="text" class="form-control" name="reg61to80percenttot1" id="reg61to80percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reg61to80percenttot2" id="reg61to80percenttot2" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Above80%</td>
                                                                    <td><input type="text" class="form-control" name="regabove80percenttb1" id="regabove80percenttb1"></td>
                                                                    <td><input type="text" class="form-control" name="regabove80percenttb2" id="regabove80percenttb2"></td>
                                                                    <td><input type="text" class="form-control" name="regabove80percenttb3" id="regabove80percenttb3"></td>
                                                                    <td><input type="text" class="form-control" name="regabove80percenttb4" id="regabove80percenttb4"></td>
                                                                    <td><input type="text" class="form-control" name="regabove80percenttb5" id="regabove80percenttb5"></td>
                                                                    <td><input type="text" class="form-control" name="regabove80percenttb6" id="regabove80percenttb6"></td>
                                                                    <td><input type="text" class="form-control" name="regabove80percenttb7" id="regabove80percenttb7"></td>
                                                                    <td><input type="text" class="form-control" name="regabove80percenttb8" id="regabove80percenttb8"></td>
                                                                    <td><input type="text" class="form-control" name="regabove80percenttot1" id="regabove80percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="regabove80percenttot2" id="regabove80percenttot2" disabled="disabled"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Total</td>
                                                                    <td><input type="text" class="form-control" name="reggrandtot1" id="reggrandtot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reggrandtot2" id="reggrandtot2" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reggrandtot3" id="reggrandtot3" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reggrandtot4" id="reggrandtot4" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reggrandtot5" id="reggrandtot5" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reggrandtot6" id="reggrandtot6" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reggrandtot7" id="reggrandtot7" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reggrandtot8" id="reggrandtot8" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reggrandtot9" id="reggrandtot9" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reggrandtot10" id="reggrandtot10" disabled="disabled"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                      </div>
                                                      <!-- table scrollable ending -->
                                                        <div class="row">

                                                            <center><input type="button" id="boardexamcalcform2" class="btn btn green" value="Calculate"> <input type="submit" value="submit" class="btn btn green"  id="submitbtnboardexamform2" name="" style="display: none;"></center>
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
                                                    <span class="caption-subject font-dark sbold uppercase">Board Examination Results at Secondary and Higher Secondary Levels</span> - <small>Number of Other than Regular Students(if any) passed / qualified the Secondary School Board(Grade X) Examination by range of marks (inprevious academic year)</small>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                      <form method="post" action="" id="boardexamsecondaryandhighersecondarygrade10form3">
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
                                                                    <td><input type="text" class="form-control" name="otregupto40percenttb1" id="otregupto40percenttb1"></td>
                                                                    <td><input type="text" class="form-control" name="otregupto40percenttb2" id="otregupto40percenttb2"></td>
                                                                    <td><input type="text" class="form-control" name="otregupto40percenttb3" id="otregupto40percenttb3"></td>
                                                                    <td><input type="text" class="form-control" name="otregupto40percenttb4" id="otregupto40percenttb4"></td>
                                                                    <td><input type="text" class="form-control" name="otregupto40percenttb5" id="otregupto40percenttb5"></td>
                                                                    <td><input type="text" class="form-control" name="otregupto40percenttb6" id="otregupto40percenttb6"></td>
                                                                    <td><input type="text" class="form-control" name="otregupto40percenttb7" id="otregupto40percenttb7"></td>
                                                                    <td><input type="text" class="form-control" name="otregupto40percenttb8" id="otregupto40percenttb8"></td>
                                                                    <td><input type="text" class="form-control" name="otregupto40percenttot1" id="otregupto40percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="otregupto40percenttot2" id="otregupto40percenttot2" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>41-60%</td>
                                                                    <td><input type="text" class="form-control" name="otreg41to60percenttb1" id="otreg41to60percenttb1"></td>
                                                                    <td><input type="text" class="form-control" name="otreg41to60percenttb2" id="otreg41to60percenttb2"></td>
                                                                    <td><input type="text" class="form-control" name="otreg41to60percenttb3" id="otreg41to60percenttb3"></td>
                                                                    <td><input type="text" class="form-control" name="otreg41to60percenttb4" id="otreg41to60percenttb4"></td>
                                                                    <td><input type="text" class="form-control" name="otreg41to60percenttb5" id="otreg41to60percenttb5"></td>
                                                                    <td><input type="text" class="form-control" name="otreg41to60percenttb6" id="otreg41to60percenttb6"></td>
                                                                    <td><input type="text" class="form-control" name="otreg41to60percenttb7" id="otreg41to60percenttb7"></td>
                                                                    <td><input type="text" class="form-control" name="otreg41to60percenttb8" id="otreg41to60percenttb8"></td>
                                                                    <td><input type="text" class="form-control" name="otreg41to60percenttot1" id="otreg41to60percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="otreg41to60percenttot2" id="otreg41to60percenttot2" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>61-80%</td>
                                                                    <td><input type="text" class="form-control" name="otreg61to80percenttb1" id="otreg61to80percenttb1"></td>
                                                                    <td><input type="text" class="form-control" name="otreg61to80percenttb2" id="otreg61to80percenttb2"></td>
                                                                    <td><input type="text" class="form-control" name="otreg61to80percenttb3" id="otreg61to80percenttb3"></td>
                                                                    <td><input type="text" class="form-control" name="otreg61to80percenttb4" id="otreg61to80percenttb4"></td>
                                                                    <td><input type="text" class="form-control" name="otreg61to80percenttb5" id="otreg61to80percenttb5"></td>
                                                                    <td><input type="text" class="form-control" name="otreg61to80percenttb6" id="otreg61to80percenttb6"></td>
                                                                    <td><input type="text" class="form-control" name="otreg61to80percenttb7" id="otreg61to80percenttb7"></td>
                                                                    <td><input type="text" class="form-control" name="otreg61to80percenttb8" id="otreg61to80percenttb8"></td>
                                                                    <td><input type="text" class="form-control" name="otreg61to80percenttot1" id="otreg61to80percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="otreg61to80percenttot2" id="otreg61to80percenttot2" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Above80%</td>
                                                                    <td><input type="text" class="form-control" name="otregabove80percenttb1" id="otregabove80percenttb1"></td>
                                                                    <td><input type="text" class="form-control" name="otregabove80percenttb2" id="otregabove80percenttb2"></td>
                                                                    <td><input type="text" class="form-control" name="otregabove80percenttb3" id="otregabove80percenttb3"></td>
                                                                    <td><input type="text" class="form-control" name="otregabove80percenttb4" id="otregabove80percenttb4"></td>
                                                                    <td><input type="text" class="form-control" name="otregabove80percenttb5" id="otregabove80percenttb5"></td>
                                                                    <td><input type="text" class="form-control" name="otregabove80percenttb6" id="otregabove80percenttb6"></td>
                                                                    <td><input type="text" class="form-control" name="otregabove80percenttb7" id="otregabove80percenttb7"></td>
                                                                    <td><input type="text" class="form-control" name="otregabove80percenttb8" id="otregabove80percenttb8"></td>
                                                                    <td><input type="text" class="form-control" name="otregabove80percenttot1" id="otregabove80percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="otregabove80percenttot2" id="otregabove80percenttot2" disabled="disabled"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Total</td>
                                                                    <td><input type="text" class="form-control" name="otreggrandtot1" id="otreggrandtot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="otreggrandtot2" id="otreggrandtot2" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="otreggrandtot3" id="otreggrandtot3" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="otreggrandtot4" id="otreggrandtot4" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="otreggrandtot5" id="otreggrandtot5" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="otreggrandtot6" id="otreggrandtot6" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="otreggrandtot7" id="otreggrandtot7" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="otreggrandtot8" id="otreggrandtot8" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="otreggrandtot9" id="otreggrandtot9" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="otreggrandtot10" id="otreggrandtot10" disabled="disabled"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                      </div>
                                                      <!-- table-scrollable ending -->
                                                        <div class="row">

                                                            <center><input type="button" id="boardexamcalcform3" class="btn btn green" value="Calculate"> <input type="submit" value="submit" class="btn btn green"  id="submitbtnboardexamform3" name="" style="display: none;"></center>
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
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js";></script>
        <!-- END PAGE LEVEL SCRIPTS -->


        <script type="text/javascript">
                    // admin page5 js validations
$("#boardexamsecondaryandhighersecondary").validate({

    
    rules: {
        gentb1:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        gentb2:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        gentb3:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        gentb4:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        gentb5:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        gentb6:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        gentb7:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        gentb8:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        sctb1:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        sctb2:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        sctb3:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        sctb4:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        sctb5:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        sctb6:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        sctb7:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        sctb8:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        sttb1:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        sttb2:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        sttb3:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        sttb4:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        sttb5:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        sttb6:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        sttb7:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        sttb8:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        obctb1:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        obctb2:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        obctb3:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        obctb4:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        obctb5:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        obctb6:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        obctb7:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        obctb8:{
            required:true,
            customvalidation:true,
            maxlength:4
        }

        
        },

            
        
             onfocusout: function(element) {
            this.element(element);


        },

   
   });



    $('#boardexamcalc').on('click',function() {

    $("#boardexamsecondaryandhighersecondary").valid();
});

$("#boardexamcalc").click(function(){

        $("#boardexamsecondaryandhighersecondary").validate();
            

        // General category adding set1 
         
        

         // var gentot = Number($("#gentb1").val()) + Number($("#gentb2").val()); 
         // $("#gentot").val(gentot);

      

        if ($("#gentb1").val()!='' && $("#gentb2").val()!='') {
            

             var gentot = Number($("#gentb1").val()) + Number($("#gentb2").val());    
            $("#gentot").val(gentot);

            // alert()
        }else{
            $("#gentot").val();
        }

        var gentot1 = Number($("#gentb3").val()) + Number($("#gentb4").val()); 
        $("#gentot1").val(gentot1);

        var gentot2 = Number($("#gentb5").val()) + Number($("#gentb6").val()); 
        $("#gentot2").val(gentot2);

        var gentot3 = Number($("#gentb7").val()) + Number($("#gentb8").val()); 
        $("#gentot3").val(gentot3);


        // General category adding set2
        var sctot = Number($("#sctb1").val()) + Number($("#sctb2").val()); 
        $("#sctot").val(sctot);

        var sctot1 = Number($("#sctb3").val()) + Number($("#sctb4").val()); 
        $("#sctot1").val(sctot1);

        var sctot2 = Number($("#sctb5").val()) + Number($("#sctb6").val()); 
        $("#sctot2").val(sctot2);

        var sctot3 = Number($("#sctb7").val()) + Number($("#sctb8").val()); 
        $("#sctot3").val(sctot3);


        // General category adding set3
        var sttot = Number($("#sttb1").val()) + Number($("#sttb2").val()); 
        $("#sttot").val(sttot);

        var sttot1 = Number($("#sttb3").val()) + Number($("#sttb4").val()); 
        $("#sttot1").val(sttot1);

        var sttot2 = Number($("#sttb5").val()) + Number($("#sttb6").val()); 
        $("#sttot2").val(sttot2);

        var sttot3 = Number($("#sttb7").val()) + Number($("#sttb8").val()); 
        $("#sttot3").val(sttot3);


        // General category adding set4
        var obctot = Number($("#obctb1").val()) + Number($("#obctb2").val()); 
        $("#obctot").val(obctot);

        var obctot1 = Number($("#obctb3").val()) + Number($("#obctb4").val()); 
        $("#obctot1").val(obctot1);

        var obctot2 = Number($("#obctb5").val()) + Number($("#obctb6").val()); 
        $("#obctot2").val(obctot2);

        var obctot3 = Number($("#obctb7").val()) + Number($("#obctb8").val()); 
        $("#obctot3").val(obctot3);



        // Grand tot set1
        var grandtot1 = Number($("#gentb1").val()) + Number($("#sctb1").val()) + Number($("#sttb1").val()) + Number($("#obctb1").val()); 
        $("#grandtot1").val(grandtot1);

        var grandtot2 = Number($("#gentb2").val()) + Number($("#sctb2").val()) + Number($("#sttb2").val()) + Number($("#obctb2").val()); 
        $("#grandtot2").val(grandtot2);

        var grandtot3 = Number($("#gentot").val()) + Number($("#sctot").val()) + Number($("#sttot").val()) + Number($("#obctot").val()); 
        $("#grandtot3").val(grandtot3);

       
        // Grand tot set2
        var grandtot4 = Number($("#gentb3").val()) + Number($("#sctb3").val()) + Number($("#sttb3").val()) + Number($("#obctb3").val()); 
        $("#grandtot4").val(grandtot4);

        var grandtot5 = Number($("#gentb4").val()) + Number($("#sctb4").val()) + Number($("#sttb4").val()) + Number($("#obctb4").val()); 
        $("#grandtot5").val(grandtot5);

        var grandtot6 = Number($("#gentot1").val()) + Number($("#sctot1").val()) + Number($("#sttot1").val()) + Number($("#obctot1").val()); 
        $("#grandtot6").val(grandtot6);


        // Grand tot set3
        var grandtot7 = Number($("#gentb5").val()) + Number($("#sctb5").val()) + Number($("#sttb5").val()) + Number($("#obctb5").val()); 
        $("#grandtot7").val(grandtot7);

        var grandtot8 = Number($("#gentb6").val()) + Number($("#sctb6").val()) + Number($("#sttb6").val()) + Number($("#obctb6").val()); 
        $("#grandtot8").val(grandtot8);

        var grandtot9 = Number($("#gentot2").val()) + Number($("#sctot2").val()) + Number($("#sttot2").val()) + Number($("#obctot2").val()); 
        $("#grandtot9").val(grandtot9);


        // Grand tot set4
        var grandtot10 = Number($("#gentb7").val()) + Number($("#sctb7").val()) + Number($("#sttb7").val()) + Number($("#obctb7").val()); 
        $("#grandtot10").val(grandtot10);

        var grandtot11 = Number($("#gentb8").val()) + Number($("#sctb8").val()) + Number($("#sttb8").val()) + Number($("#obctb8").val()); 
        $("#grandtot11").val(grandtot11);

        var grandtot12 = Number($("#gentot3").val()) + Number($("#sctot3").val()) + Number($("#sttot3").val()) + Number($("#obctot3").val()); 
        $("#grandtot12").val(grandtot12);



        var boardexformdata1= $("#gentot").val();
        var boardexformdata2= $("#gentot1").val();
        var boardexformdata3= $("#gentot2").val();
        var boardexformdata4= $("#gentot3").val();
        var boardexformdata5= $("#sctot").val();
        var boardexformdata6= $("#sctot1").val();
        var boardexformdata7= $("#sctot2").val();
        var boardexformdata8= $("#sctot3").val();   
        var boardexformdata9= $("#sttot").val();
        var boardexformdata10= $("#sttot1").val();
        var boardexformdata11= $("#sttot2").val();
        var boardexformdata12= $("#sttot3").val();
        var boardexformdata13= $("#obctot").val();
        var boardexformdata14= $("#obctot1").val();
        var boardexformdata15= $("#obctot2").val();
        var boardexformdata16= $("#obctot3").val();
        var boardexformdata17= $("#grandtot1").val();
        var boardexformdata18= $("#grandtot2").val();
        var boardexformdata19= $("#grandtot3").val();
        var boardexformdata20= $("#grandtot4").val();
        var boardexformdata21= $("#grandtot5").val();
        var boardexformdata22= $("#grandtot6").val();
        var boardexformdata23= $("#grandtot7").val();
        var boardexformdata24= $("#grandtot8").val();
        var boardexformdata25= $("#grandtot9").val();
        var boardexformdata26= $("#grandtot10").val();
        var boardexformdata20= $("#grandtot11").val();
        var boardexformdata21= $("#grandtot12").val();


        
        if ((Number(boardexformdata1) && Number(boardexformdata2) && Number(boardexformdata3) && Number(boardexformdata4) && Number(boardexformdata5) && Number(boardexformdata6) && Number(boardexformdata7) && Number(boardexformdata8) && Number(boardexformdata9) && Number(boardexformdata10) && Number(boardexformdata11) && Number(boardexformdata12) && Number(boardexformdata13) && Number(boardexformdata14) && Number(boardexformdata15) && Number(boardexformdata16) && Number(boardexformdata17) && Number(boardexformdata18) && Number(boardexformdata19) && Number(boardexformdata20) && Number(boardexformdata21))>=0) {
            $("#submitbtnboardexam").show();
        }
        else {
            
            $("#submitbtnboardexam").hide();
        }

        // var checkingcondition = ((boardexformdata1) && (boardexformdata2) && (boardexformdata3) && (boardexformdata4) && (boardexformdata5) && (boardexformdata6) && (boardexformdata7) && (boardexformdata8) && (boardexformdata9) && (boardexformdata10) && (boardexformdata11) && (boardexformdata12) && (boardexformdata13) && (boardexformdata14) && (boardexformdata15) && (boardexformdata16) && (boardexformdata17) && (boardexformdata18) && (boardexformdata19) && (boardexformdata20) && (boardexformdata21));

        // if (checkingcondition>=0) {
        //     $("#submitbtnboardexam").show();
        // }
        // else {
            
        //     $("#submitbtnboardexam").hide();
        // }


});




// form2

// admin page5 js validations
$("#boardexamsecondaryandhighersecondarygrade10form2").validate({

    
    rules: {
        regupto40percenttb1:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        regupto40percenttb2:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        regupto40percenttb3:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        regupto40percenttb4:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        regupto40percenttb5:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        regupto40percenttb6:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        regupto40percenttb7:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        regupto40percenttb8:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reg41to60percenttb1:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reg41to60percenttb2:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reg41to60percenttb3:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reg41to60percenttb4:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reg41to60percenttb5:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reg41to60percenttb6:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reg41to60percenttb7:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reg41to60percenttb8:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reg61to80percenttb1:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reg61to80percenttb2:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reg61to80percenttb3:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reg61to80percenttb4:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reg61to80percenttb5:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reg61to80percenttb6:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reg61to80percenttb7:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reg61to80percenttb8:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        regabove80percenttb1:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        regabove80percenttb2:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        regabove80percenttb3:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        regabove80percenttb4:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        regabove80percenttb5:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        regabove80percenttb6:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        regabove80percenttb7:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        regabove80percenttb8:{
            required:true,
            customvalidation:true,
            maxlength:4
        }

        },

            
        
             onfocusout: function(element) {
            this.element(element);


        },

   
   });


$('#boardexamcalcform2').on('click',function() {

    $("#boardexamsecondaryandhighersecondarygrade10form2").valid();
});

$('#boardexamcalcform2').on('click',function() {

    $("#boardexamsecondaryandhighersecondarygrade10form2").validate();

    // set1
        var regupto40percenttot1 = Number($("#regupto40percenttb1").val()) + Number($("#regupto40percenttb3").val()) + Number($("#regupto40percenttb5").val()) + Number($("#regupto40percenttb7").val()); 
        $("#regupto40percenttot1").val(regupto40percenttot1);

        var regupto40percenttot2 = Number($("#regupto40percenttb2").val()) + Number($("#regupto40percenttb4").val()) + Number($("#regupto40percenttb6").val()) + Number($("#regupto40percenttb8").val()); 
        $("#regupto40percenttot2").val(regupto40percenttot2);

        var reg41to60percenttot1 = Number($("#reg41to60percenttb1").val()) + Number($("#reg41to60percenttb3").val()) + Number($("#reg41to60percenttb5").val()) + Number($("#reg41to60percenttb7").val()); 
        $("#reg41to60percenttot1").val(reg41to60percenttot1);

        var reg41to60percenttot2 = Number($("#reg41to60percenttb2").val()) + Number($("#reg41to60percenttb4").val()) + Number($("#reg41to60percenttb6").val()) + Number($("#reg41to60percenttb8").val()); 
        $("#reg41to60percenttot2").val(reg41to60percenttot2);

        var reg61to80percenttot1 = Number($("#reg61to80percenttb1").val()) + Number($("#reg61to80percenttb3").val()) + Number($("#reg61to80percenttb5").val()) + Number($("#reg61to80percenttb7").val()); 
        $("#reg61to80percenttot1").val(reg61to80percenttot1);

        var reg61to80percenttot2 = Number($("#reg61to80percenttb2").val()) + Number($("#reg61to80percenttb4").val()) + Number($("#reg61to80percenttb6").val()) + Number($("#reg61to80percenttb8").val()); 
        $("#reg61to80percenttot2").val(reg61to80percenttot2);

        var regabove80percenttot1 = Number($("#regabove80percenttb1").val()) + Number($("#regabove80percenttb3").val()) + Number($("#regabove80percenttb5").val()) + Number($("#regabove80percenttb7").val()); 
        $("#regabove80percenttot1").val(regabove80percenttot1);

        var regabove80percenttot2 = Number($("#regabove80percenttb2").val()) + Number($("#regabove80percenttb4").val()) + Number($("#regabove80percenttb6").val()) + Number($("#regabove80percenttb8").val()); 
        $("#regabove80percenttot2").val(regabove80percenttot2);

        // Grand total set1
        var reggrandtot1 = Number($("#regupto40percenttb1").val()) + Number($("#reg41to60percenttb1").val()) + Number($("#reg61to80percenttb1").val()) + Number($("#regabove80percenttb1").val()); 
        $("#reggrandtot1").val(reggrandtot1);

        // Grand total set2
        var reggrandtot2 = Number($("#regupto40percenttb2").val()) + Number($("#reg41to60percenttb2").val()) + Number($("#reg61to80percenttb2").val()) + Number($("#regabove80percenttb2").val()); 
        $("#reggrandtot2").val(reggrandtot2);

        // Grand total set3
        var reggrandtot3 = Number($("#regupto40percenttb3").val()) + Number($("#reg41to60percenttb3").val()) + Number($("#reg61to80percenttb3").val()) + Number($("#regabove80percenttb3").val()); 
        $("#reggrandtot3").val(reggrandtot3);

        // Grand total set4
        var reggrandtot4 = Number($("#regupto40percenttb4").val()) + Number($("#reg41to60percenttb4").val()) + Number($("#reg61to80percenttb4").val()) + Number($("#regabove80percenttb4").val()); 
        $("#reggrandtot4").val(reggrandtot4);

        // Grand total set5
        var reggrandtot5 = Number($("#regupto40percenttb5").val()) + Number($("#reg41to60percenttb5").val()) + Number($("#reg61to80percenttb5").val()) + Number($("#regabove80percenttb5").val()); 
        $("#reggrandtot5").val(reggrandtot5);


        // Grand total set6
        var reggrandtot6 = Number($("#regupto40percenttb6").val()) + Number($("#reg41to60percenttb6").val()) + Number($("#reg61to80percenttb6").val()) + Number($("#regabove80percenttb6").val()); 
        $("#reggrandtot6").val(reggrandtot6);


        // Grand total set7
        var reggrandtot7 = Number($("#regupto40percenttb7").val()) + Number($("#reg41to60percenttb7").val()) + Number($("#reg61to80percenttb7").val()) + Number($("#regabove80percenttb7").val()); 
        $("#reggrandtot7").val(reggrandtot7);


        // Grand total set8
        var reggrandtot8 = Number($("#regupto40percenttb8").val()) + Number($("#reg41to60percenttb8").val()) + Number($("#reg61to80percenttb8").val()) + Number($("#regabove80percenttb8").val()); 
        $("#reggrandtot8").val(reggrandtot8);

        // grand boys count
        var reggrandtot9 = Number($("#reggrandtot1").val()) + Number($("#reggrandtot3").val()) + Number($("#reggrandtot5").val()) + Number($("#reggrandtot7").val()); 
        $("#reggrandtot9").val(reggrandtot9);

        // grand girls count
        var reggrandtot10 = Number($("#reggrandtot2").val()) + Number($("#reggrandtot4").val()) + Number($("#reggrandtot6").val()) + Number($("#reggrandtot8").val()); 
        $("#reggrandtot10").val(reggrandtot10);

});


  
  $("#boardexamsecondaryandhighersecondarygrade10form3").validate({

    
    rules: {
        otregupto40percenttb1:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otregupto40percenttb2:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otregupto40percenttb3:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otregupto40percenttb4:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otregupto40percenttb5:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otregupto40percenttb6:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otregupto40percenttb7:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otregupto40percenttb8:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otreg41to60percenttb1:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otreg41to60percenttb2:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otreg41to60percenttb3:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otreg41to60percenttb4:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otreg41to60percenttb5:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otreg41to60percenttb6:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otreg41to60percenttb7:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otreg41to60percenttb8:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otreg61to80percenttb1:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otreg61to80percenttb2:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otreg61to80percenttb3:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otreg61to80percenttb4:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otreg61to80percenttb5:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otreg61to80percenttb6:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otreg61to80percenttb7:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otreg61to80percenttb8:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otregabove80percenttb1:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otregabove80percenttb2:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otregabove80percenttb3:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otregabove80percenttb4:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otregabove80percenttb5:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otregabove80percenttb6:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otregabove80percenttb7:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        otregabove80percenttb8:{
            required:true,
            customvalidation:true,
            maxlength:4
        }

        },

            
        
             onfocusout: function(element) {
            this.element(element);


        },

   
   });


$('#boardexamcalcform3').on('click',function() {

    $("#boardexamsecondaryandhighersecondarygrade10form3").valid();
});

$('#boardexamcalcform3').on('click',function() {

    $("#boardexamsecondaryandhighersecondarygrade10form3").validate();

    // set1
        var otregupto40percenttot1 = Number($("#otregupto40percenttb1").val()) + Number($("#otregupto40percenttb3").val()) + Number($("#otregupto40percenttb5").val()) + Number($("#otregupto40percenttb7").val()); 
        $("#otregupto40percenttot1").val(otregupto40percenttot1);

        var otregupto40percenttot2 = Number($("#otregupto40percenttb2").val()) + Number($("#otregupto40percenttb4").val()) + Number($("#otregupto40percenttb6").val()) + Number($("#otregupto40percenttb8").val()); 
        $("#otregupto40percenttot2").val(otregupto40percenttot2);

        var otreg41to60percenttot1 = Number($("#otreg41to60percenttb1").val()) + Number($("#otreg41to60percenttb3").val()) + Number($("#otreg41to60percenttb5").val()) + Number($("#otreg41to60percenttb7").val()); 
        $("#otreg41to60percenttot1").val(otreg41to60percenttot1);

        var otreg41to60percenttot2 = Number($("#otreg41to60percenttb2").val()) + Number($("#otreg41to60percenttb4").val()) + Number($("#otreg41to60percenttb6").val()) + Number($("#otreg41to60percenttb8").val()); 
        $("#otreg41to60percenttot2").val(otreg41to60percenttot2);

        var otreg61to80percenttot1 = Number($("#otreg61to80percenttb1").val()) + Number($("#otreg61to80percenttb3").val()) + Number($("#otreg61to80percenttb5").val()) + Number($("#otreg61to80percenttb7").val()); 
        $("#otreg61to80percenttot1").val(otreg61to80percenttot1);

        var otreg61to80percenttot2 = Number($("#otreg61to80percenttb2").val()) + Number($("#otreg61to80percenttb4").val()) + Number($("#otreg61to80percenttb6").val()) + Number($("#otreg61to80percenttb8").val()); 
        $("#otreg61to80percenttot2").val(otreg61to80percenttot2);

        var otregabove80percenttot1 = Number($("#otregabove80percenttb1").val()) + Number($("#otregabove80percenttb3").val()) + Number($("#otregabove80percenttb5").val()) + Number($("#otregabove80percenttb7").val()); 
        $("#otregabove80percenttot1").val(otregabove80percenttot1);

        var otregabove80percenttot2 = Number($("#otregabove80percenttb2").val()) + Number($("#otregabove80percenttb4").val()) + Number($("#otregabove80percenttb6").val()) + Number($("#otregabove80percenttb8").val()); 
        $("#otregabove80percenttot2").val(otregabove80percenttot2);

        // Grand total set1
        var otreggrandtot1 = Number($("#otregupto40percenttb1").val()) + Number($("#otreg41to60percenttb1").val()) + Number($("#otreg61to80percenttb1").val()) + Number($("#otregabove80percenttb1").val()); 
        $("#otreggrandtot1").val(otreggrandtot1);

        // Grand total set2
        var otreggrandtot2 = Number($("#otregupto40percenttb2").val()) + Number($("#otreg41to60percenttb2").val()) + Number($("#otreg61to80percenttb2").val()) + Number($("#otregabove80percenttb2").val()); 
        $("#otreggrandtot2").val(otreggrandtot2);

        // Grand total set3
        var otreggrandtot3 = Number($("#otregupto40percenttb3").val()) + Number($("#otreg41to60percenttb3").val()) + Number($("#otreg61to80percenttb3").val()) + Number($("#otregabove80percenttb3").val()); 
        $("#otreggrandtot3").val(otreggrandtot3);

        // Grand total set4
        var otreggrandtot4 = Number($("#otregupto40percenttb4").val()) + Number($("#otreg41to60percenttb4").val()) + Number($("#otreg61to80percenttb4").val()) + Number($("#otregabove80percenttb4").val()); 
        $("#otreggrandtot4").val(otreggrandtot4);

        // Grand total set5
        var otreggrandtot5 = Number($("#otregupto40percenttb5").val()) + Number($("#otreg41to60percenttb5").val()) + Number($("#otreg61to80percenttb5").val()) + Number($("#otregabove80percenttb5").val()); 
        $("#otreggrandtot5").val(otreggrandtot5);


        // Grand total set6
        var otreggrandtot6 = Number($("#otregupto40percenttb6").val()) + Number($("#otreg41to60percenttb6").val()) + Number($("#otreg61to80percenttb6").val()) + Number($("#otregabove80percenttb6").val()); 
        $("#otreggrandtot6").val(otreggrandtot6);


        // Grand total set7
        var otreggrandtot7 = Number($("#otregupto40percenttb7").val()) + Number($("#otreg41to60percenttb7").val()) + Number($("#otreg61to80percenttb7").val()) + Number($("#otregabove80percenttb7").val()); 
        $("#otreggrandtot7").val(otreggrandtot7);


        // Grand total set8
        var otreggrandtot8 = Number($("#otregupto40percenttb8").val()) + Number($("#otreg41to60percenttb8").val()) + Number($("#otreg61to80percenttb8").val()) + Number($("#otregabove80percenttb8").val()); 
        $("#otreggrandtot8").val(otreggrandtot8);

        // grand boys count
        var otreggrandtot9 = Number($("#otreggrandtot1").val()) + Number($("#otreggrandtot3").val()) + Number($("#otreggrandtot5").val()) + Number($("#otreggrandtot7").val()); 
        $("#otreggrandtot9").val(otreggrandtot9);

        // grand girls count
        var otreggrandtot10 = Number($("#otreggrandtot2").val()) + Number($("#otreggrandtot4").val()) + Number($("#otreggrandtot6").val()) + Number($("#otreggrandtot8").val()); 
        $("#otreggrandtot10").val(otreggrandtot10);

});


$.validator.addMethod("customvalidationselectfield",
               function(){
               return $('').val()!="none";
            }
    );

$.validator.addMethod("customvalidation",
               function(value,element){
                     return /^[0-9]+$/.test(value);
               },
               "Allowed number value only"
      );
        </script>

    </body>

</html>