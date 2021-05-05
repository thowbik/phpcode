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
                                                      <form method="post" action="" id="boardexamsecondaryandhighersecondary">
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
                                                                   <td><input type="text" class="form-control" name="gentb1" id="gentb1" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="gentb2" id="gentb2" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="gentot" id="gentot" disabled="disabled"></td>
                                                                   <td><input type="text" class="form-control" name="gentb3" id="gentb3" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="gentb4" id="gentb4" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="gentot1" id="gentot1" disabled="disabled"></td>
                                                                   <td><input type="text" class="form-control" name="gentb5" id="gentb5" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="gentb6" id="gentb6" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="gentot2" id="gentot2" disabled="disabled"></td>
                                                                   <td><input type="text" class="form-control" name="gentb7" id="gentb7" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="gentb8" id="gentb8" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="gentot3" id="gentot3" disabled="disabled"></td>
                                                               </tr>

                                                               <tr>
                                                                   <td>SC</td>
                                                                   <td><input type="text" class="form-control" name="sctb1" id="sctb1" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="sctb2" id="sctb2" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="sctot" id="sctot" disabled="disabled"></td>
                                                                   <td><input type="text" class="form-control" name="sctb3" id="sctb3" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="sctb4" id="sctb4" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="sctot1" id="sctot1" disabled="disabled"></td>
                                                                   <td><input type="text" class="form-control" name="sctb5" id="sctb5" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="sctb6" id="sctb6" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="sctot2" id="sctot2" disabled="disabled"></td>
                                                                   <td><input type="text" class="form-control" name="sctb7" id="sctb7" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="sctb8" id="sctb8" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="scttot3" id="sctot3" disabled="disabled"></td>
                                                               </tr>

                                                               <tr>
                                                                   <td>ST</td>
                                                                   <td><input type="text" class="form-control" name="sttb1" id="sttb1" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="sttb2" id="sttb2" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="sttot" id="sttot" disabled="disabled"></td>
                                                                   <td><input type="text" class="form-control" name="sttb3" id="sttb3" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="sttb4" id="sttb4" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="sttot" id="sttot1" disabled="disabled"></td>
                                                                   <td><input type="text" class="form-control" name="sttb5" id="sttb5" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="sttb6" id="sttb6" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="sttot2" id="sttot2" disabled="disabled"></td>
                                                                   <td><input type="text" class="form-control" name="sttb7" id="sttb7" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="sttb8" id="sttb8" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="stttot3" id="sttot3" disabled="disabled"></td>
                                                               </tr>

                                                               <tr>
                                                                   <td>OBC</td>
                                                                   <td><input type="text" class="form-control" name="obctb1" id="obctb1" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="obctb2" id="obctb2" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="obctot" id="obctot" disabled="disabled"></td>
                                                                   <td><input type="text" class="form-control" name="obctb3" id="obctb3" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="obctb4" id="obctb4" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="obctot1" id="obctot1" disabled="disabled"></td>
                                                                   <td><input type="text" class="form-control" name="obctb5" id="obctb5" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="obctb6" id="obctb6" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="obctot2" id="obctot2" disabled="disabled"></td>
                                                                   <td><input type="text" class="form-control" name="obctb7" id="obctb7" maxlength="4"></td>
                                                                   <td><input type="text" class="form-control" name="obctb8" id="obctb8" maxlength="4"></td>
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
                                                                    <td><input type="text" class="form-control" name="regupto40percenttb1" id="regupto40percenttb1" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="regupto40percenttb2" id="regupto40percenttb2" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="regupto40percenttb3" id="regupto40percenttb3" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="regupto40percenttb4" id="regupto40percenttb4" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="regupto40percenttb5" id="regupto40percenttb5" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="regupto40percenttb6" id="regupto40percenttb6" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="regupto40percenttb7" id="regupto40percenttb7" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="regupto40percenttb8" id="regupto40percenttb8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="regupto40percenttot1" id="regupto40percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="regupto40percenttot2" id="regupto40percenttot2" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>41-60%</td>
                                                                    <td><input type="text" class="form-control" name="reg41to60percenttb1" id="reg41to60percenttb1" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reg41to60percenttb2" id="reg41to60percenttb2" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reg41to60percenttb3" id="reg41to60percenttb3" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reg41to60percenttb4" id="reg41to60percenttb4" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reg41to60percenttb5" id="reg41to60percenttb5" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reg41to60percenttb6" id="reg41to60percenttb6" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reg41to60percenttb7" id="reg41to60percenttb7" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reg41to60percenttb8" id="reg41to60percenttb8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reg41to60percenttot1" id="reg41to60percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reg41to60percenttot2" id="reg41to60percenttot2" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>61-80%</td>
                                                                    <td><input type="text" class="form-control" name="reg61to80percenttb1" id="reg61to80percenttb1" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reg61to80percenttb2" id="reg61to80percenttb2" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reg61to80percenttb3" id="reg61to80percenttb3" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reg61to80percenttb4" id="reg61to80percenttb4" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reg61to80percenttb5" id="reg61to80percenttb5" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reg61to80percenttb6" id="reg61to80percenttb6" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reg61to80percenttb7" id="reg61to80percenttb7" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reg61to80percenttb8" id="reg61to80percenttb8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reg61to80percenttot1" id="reg61to80percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reg61to80percenttot2" id="reg61to80percenttot2" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Above80%</td>
                                                                    <td><input type="text" class="form-control" name="regabove80percenttb1" id="regabove80percenttb1" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="regabove80percenttb2" id="regabove80percenttb2" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="regabove80percenttb3" id="regabove80percenttb3" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="regabove80percenttb4" id="regabove80percenttb4" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="regabove80percenttb5" id="regabove80percenttb5" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="regabove80percenttb6" id="regabove80percenttb6" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="regabove80percenttb7" id="regabove80percenttb7" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="regabove80percenttb8" id="regabove80percenttb8" maxlength="4"></td>
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
                                                                    <td><input type="text" class="form-control" name="otregupto40percenttb1" id="otregupto40percenttb1" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otregupto40percenttb2" id="otregupto40percenttb2" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otregupto40percenttb3" id="otregupto40percenttb3" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otregupto40percenttb4" id="otregupto40percenttb4" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otregupto40percenttb5" id="otregupto40percenttb5" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otregupto40percenttb6" id="otregupto40percenttb6" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otregupto40percenttb7" id="otregupto40percenttb7" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otregupto40percenttb8" id="otregupto40percenttb8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otregupto40percenttot1" id="otregupto40percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="otregupto40percenttot2" id="otregupto40percenttot2" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>41-60%</td>
                                                                    <td><input type="text" class="form-control" name="otreg41to60percenttb1" id="otreg41to60percenttb1" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otreg41to60percenttb2" id="otreg41to60percenttb2" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otreg41to60percenttb3" id="otreg41to60percenttb3" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otreg41to60percenttb4" id="otreg41to60percenttb4" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otreg41to60percenttb5" id="otreg41to60percenttb5" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otreg41to60percenttb6" id="otreg41to60percenttb6" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otreg41to60percenttb7" id="otreg41to60percenttb7" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otreg41to60percenttb8" id="otreg41to60percenttb8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otreg41to60percenttot1" id="otreg41to60percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="otreg41to60percenttot2" id="otreg41to60percenttot2" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>61-80%</td>
                                                                    <td><input type="text" class="form-control" name="otreg61to80percenttb1" id="otreg61to80percenttb1" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otreg61to80percenttb2" id="otreg61to80percenttb2" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otreg61to80percenttb3" id="otreg61to80percenttb3" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otreg61to80percenttb4" id="otreg61to80percenttb4" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otreg61to80percenttb5" id="otreg61to80percenttb5" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otreg61to80percenttb6" id="otreg61to80percenttb6" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otreg61to80percenttb7" id="otreg61to80percenttb7" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otreg61to80percenttb8" id="otreg61to80percenttb8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otreg61to80percenttot1" id="otreg61to80percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="otreg61to80percenttot2" id="otreg61to80percenttot2" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Above80%</td>
                                                                    <td><input type="text" class="form-control" name="otregabove80percenttb1" id="otregabove80percenttb1" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otregabove80percenttb2" id="otregabove80percenttb2" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otregabove80percenttb3" id="otregabove80percenttb3" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otregabove80percenttb4" id="otregabove80percenttb4" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otregabove80percenttb5" id="otregabove80percenttb5" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otregabove80percenttb6" id="otregabove80percenttb6" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otregabove80percenttb7" id="otregabove80percenttb7" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="otregabove80percenttb8" id="otregabove80percenttb8" maxlength="4"></td>
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
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        <script src="<?php echo base_url().'asset/global/plugins/emis2.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->


    </body>

</html>