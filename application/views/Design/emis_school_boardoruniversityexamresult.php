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
                                                <a href="<?php echo base_url().'Design/emis_school_boardexamresult1';?>"><div class="col-md-4 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">2</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Board Exam Result</div>
                                                    <div class="mt-step-content font-grey-cascade">Secondary and Higher Secondary Levels</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Design/emis_school_boardoruniversityexamresult';?>"><div class="col-md-4 bg-grey mt-step-col  active">
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
                                                    <span class="caption-subject font-dark sbold uppercase">Board/University Examination</span> - <small>Results of the Grade XII Board/University Examination in previous academic year(for Regular Students)</small>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                      <form method="post" action="" id="boardorunivesityexamresultform1">
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
                                                                  <td>Arts</td>
                                                                  <td><input type="text" name="regboardorunivartstb1" id="regboardorunivartstb1" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivartstb2" id="regboardorunivartstb2" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivartstb3" id="regboardorunivartstb3" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivartstb4" id="regboardorunivartstb4" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivartstb5" id="regboardorunivartstb5" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivartstb6" id="regboardorunivartstb6" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivartstb7" id="regboardorunivartstb7" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivartstb8" id="regboardorunivartstb8" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivartstot1" id="regboardorunivartstot1" class="form-control" style="width: 70px;" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivartstot2" id="regboardorunivartstot2" class="form-control" style="width: 70px;" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivartstb9" id="regboardorunivartstb9" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivartstb10" id="regboardorunivartstb10" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivartstb11" id="regboardorunivartstb11" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivartstb12" id="regboardorunivartstb12" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivartstb13" id="regboardorunivartstb13" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivartstb14" id="regboardorunivartstb14" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivartstb15" id="regboardorunivartstb15" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivartstb16" id="regboardorunivartstb16" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivartstot3" id="regboardorunivartstot3" class="form-control" disabled="disabled" style="width: 70px;"></td>
                                                                  <td><input type="text" name="regboardorunivartstot4" id="regboardorunivartstot4" class="form-control" disabled="disabled" style="width: 70px;"></td>
                                                                </tr>
                                                                <tr>
                                                                  <td>Science</td>
                                                                  <td><input type="text" name="regboardorunivsciencetb1" id="regboardorunivsciencetb1" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb2" id="regboardorunivsciencetb2" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb3" id="regboardorunivsciencetb3" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb4" id="regboardorunivsciencetb4" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb5" id="regboardorunivsciencetb5" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb6" id="regboardorunivsciencetb6" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb7" id="regboardorunivsciencetb7" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb8" id="regboardorunivsciencetb8" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetot1" id="regboardorunivsciencetot1" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetot2" id="regboardorunivsciencetot2" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb9" id="regboardorunivsciencetb9" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb10" id="regboardorunivsciencetb10" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb11" id="regboardorunivsciencetb11" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb12" id="regboardorunivsciencetb12" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb13" id="regboardorunivsciencetb13" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb14" id="regboardorunivsciencetb14" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb15" id="regboardorunivsciencetb15" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb16" id="regboardorunivsciencetb16" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetot3" id="regboardorunivsciencetot3" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetot4" id="regboardorunivsciencetot4" class="form-control" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                  <td>Commerce</td>
                                                                  <td><input type="text" name="regboardorunivcommercetb1" id="regboardorunivcommercetb1" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb2" id="regboardorunivcommercetb2" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb3" id="regboardorunivcommercetb3" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb4" id="regboardorunivcommercetb4" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb5" id="regboardorunivcommercetb5" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb6" id="regboardorunivcommercetb6" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb7" id="regboardorunivcommercetb7" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb8" id="regboardorunivcommercetb8" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetot1" id="regboardorunivcommercetot1" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetot2" id="regboardorunivcommercetot2" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb9" id="regboardorunivcommercetb9" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb10" id="regboardorunivcommercetb10" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb11" id="regboardorunivcommercetb11" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb12" id="regboardorunivcommercetb12" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb13" id="regboardorunivcommercetb13" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb14" id="regboardorunivcommercetb14" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb15" id="regboardorunivcommercetb15" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb16" id="regboardorunivcommercetb16" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetot3" id="regboardorunivcommercetot3" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetot4" id="regboardorunivcommercetot4" class="form-control" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                  <td>Vocational</td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb1" id="regboardorunivvocationaltb1" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb2" id="regboardorunivvocationaltb2" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb3" id="regboardorunivvocationaltb3" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb4" id="regboardorunivvocationaltb4" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb5" id="regboardorunivvocationaltb5" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb6" id="regboardorunivvocationaltb6" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb7" id="regboardorunivvocationaltb7" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb8" id="regboardorunivvocationaltb8" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltot1" id="regboardorunivvocationaltot1" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltot2" id="regboardorunivvocationaltot2" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb9" id="regboardorunivvocationaltb9" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb10" id="regboardorunivvocationaltb10" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb11" id="regboardorunivvocationaltb11" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb12" id="regboardorunivvocationaltb12" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb13" id="regboardorunivvocationaltb13" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb14" id="regboardorunivvocationaltb14" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb15" id="regboardorunivvocationaltb15" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb16" id="regboardorunivvocationaltb16" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltot3" id="regboardorunivvocationaltot3" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltot4" id="regboardorunivvocationaltot4" class="form-control" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                  <td>Other Streams</td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb1" id="regboardorunivothstreamtb1" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb2" id="regboardorunivothstreamtb2" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb3" id="regboardorunivothstreamtb3" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb4" id="regboardorunivothstreamtb4" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb5" id="regboardorunivothstreamtb5" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb6" id="regboardorunivothstreamtb6" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb7" id="regboardorunivothstreamtb7" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb8" id="regboardorunivothstreamtb8" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtot1" id="regboardorunivothstreamtot1" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtot2" id="regboardorunivothstreamtot2" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb9" id="regboardorunivothstreamtb9" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb10" id="regboardorunivothstreamtb10" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb11" id="regboardorunivothstreamtb11" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb12" id="regboardorunivothstreamtb12" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb13" id="regboardorunivothstreamtb13" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb14" id="regboardorunivothstreamtb14" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb15" id="regboardorunivothstreamtb15" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb16" id="regboardorunivothstreamtb16" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtot3" id="regboardorunivothstreamtot3" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtot4" id="regboardorunivothstreamtot4" class="form-control" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                  <td>Total</td>
                                                                  <td><input type="text" name="regboardorunivgrandtotaltb1" id="regboardorunivgrandtotaltb1" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivgrandtotaltb2" id="regboardorunivgrandtotaltb2" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivgrandtotaltb3" id="regboardorunivgrandtotaltb3" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivgrandtotaltb4" id="regboardorunivgrandtotaltb4" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivgrandtotaltb5" id="regboardorunivgrandtotaltb5" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivgrandtotaltb6" id="regboardorunivgrandtotaltb6" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivgrandtotaltb7" id="regboardorunivgrandtotaltb7" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivgrandtotaltb8" id="regboardorunivgrandtotaltb8" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivgrandtotaltb9" id="regboardorunivgrandtotaltb9" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivgrandtotaltb10" id="regboardorunivgrandtotaltb10" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivgrandtotaltb11" id="regboardorunivgrandtotaltb11" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivgrandtotaltb12" id="regboardorunivgrandtotaltb12" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivgrandtotaltb13" id="regboardorunivgrandtotaltb13" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivgrandtotaltb14" id="regboardorunivgrandtotaltb14" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivgrandtotaltb15" id="regboardorunivgrandtotaltb15" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivgrandtotaltb16" id="regboardorunivgrandtotaltb16" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivgrandtotaltb17" id="regboardorunivgrandtotaltb17" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivgrandtotaltb18" id="regboardorunivgrandtotaltb18" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivgrandtotaltb19" id="regboardorunivgrandtotaltb19" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivgrandtotaltb20" id="regboardorunivgrandtotaltb20" class="form-control" disabled="disabled"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                      </div>
                                                      <!-- table scrollable ending -->
                                                        <div class="row">

                                                            <center><input type="button" id="boardexamcalculatebtn1" class="btn btn green" value="Calculate"> <input type="submit" value="submit" class="btn btn green"  id="submitbtnboardexam" name="" style="display: none;"></center>
                                                        </div>
                                                        <br>
                                                       </form>
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
                                                <div class="row">
                                                    <div class="col-md-12">
                                                      <form method="post" action="" id="boardorunivesityexamresultform2">
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
                                                                    <th>B</th>
                                                                    <th>G</th>
                                                                    <th>B</th>
                                                                    <th>G</th>
                                                                    <th>B</th>
                                                                    <th>G</th>
                                                                    <th>B</th>
                                                                    <th>G</th>
                                                                    <th>B</th>
                                                                    <th>G</th>
                                                                    <th>B</th>
                                                                    <th>G</th>
                                                                    <th>B</th>
                                                                    <th>G</th>
                                                                    <th>B</th>
                                                                    <th>G</th>
                                                                    <th>B</th>
                                                                    <th>G</th>
                                                                    <th>B</th>
                                                                    <th>G</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                  <td>Arts</td>
                                                                  <td><input type="text" name="otregboardorunivartstb1" id="otregboardorunivartstb1" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb2" id="otregboardorunivartstb2" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb3" id="otregboardorunivartstb3" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb4" id="otregboardorunivartstb4" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb5" id="otregboardorunivartstb5" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb6" id="otregboardorunivartstb6" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb7" id="otregboardorunivartstb7" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb8" id="otregboardorunivartstb8" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivartstot1" id="otregboardorunivartstot1" class="form-control" disabled="disabled" style="width: 70px;"></td>
                                                                  <td><input type="text" name="otregboardorunivartstot2" id="otregboardorunivartstot2" class="form-control" disabled="disabled" style="width: 70px;"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb9" id="otregboardorunivartstb9" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb10" id="otregboardorunivartstb10" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb11" id="otregboardorunivartstb11" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb12" id="otregboardorunivartstb12" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb13" id="otregboardorunivartstb13" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb14" id="otregboardorunivartstb14" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb15" id="otregboardorunivartstb15" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb16" id="otregboardorunivartstb16" class="form-control" style="width: 70px;" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivartstot3" id="otregboardorunivartstot3" class="form-control" disabled="disabled" style="width: 70px;"></td>
                                                                  <td><input type="text" name="otregboardorunivartstot4" id="otregboardorunivartstot4" class="form-control" disabled="disabled" style="width: 70px;"></td>
                                                                </tr>
                                                                <tr>
                                                                  <td>Science</td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb1" id="otregboardorunivsciencetb1" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb2" id="otregboardorunivsciencetb2" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb3" id="otregboardorunivsciencetb3" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb4" id="otregboardorunivsciencetb4" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb5" id="otregboardorunivsciencetb5" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb6" id="otregboardorunivsciencetb6" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb7" id="otregboardorunivsciencetb7" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb8" id="otregboardorunivsciencetb8" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetot1" id="otregboardorunivsciencetot1" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetot2" id="otregboardorunivsciencetot2" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb9" id="otregboardorunivsciencetb9" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb10" id="otregboardorunivsciencetb10" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb11" id="otregboardorunivsciencetb11" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb12" id="otregboardorunivsciencetb12" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb13" id="otregboardorunivsciencetb13" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb14" id="otregboardorunivsciencetb14" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb15" id="otregboardorunivsciencetb15" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb16" id="otregboardorunivsciencetb16" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetot3" id="otregboardorunivsciencetot3" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetot4" id="otregboardorunivsciencetot4" class="form-control" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                  <td>Commerce</td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb1" id="otregboardorunivcommercetb1" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb2" id="otregboardorunivcommercetb2" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb3" id="otregboardorunivcommercetb3" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb4" id="otregboardorunivcommercetb4" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb5" id="otregboardorunivcommercetb5" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb6" id="otregboardorunivcommercetb6" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb7" id="otregboardorunivcommercetb7" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb8" id="otregboardorunivcommercetb8" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetot1" id="otregboardorunivcommercetot1" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetot2" id="otregboardorunivcommercetot2" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb9" id="otregboardorunivcommercetb9" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb10" id="otregboardorunivcommercetb10" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb11" id="otregboardorunivcommercetb11" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb12" id="otregboardorunivcommercetb12" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb13" id="otregboardorunivcommercetb13" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb14" id="otregboardorunivcommercetb14" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb15" id="otregboardorunivcommercetb15" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb16" id="otregboardorunivcommercetb16" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetot3" id="otregboardorunivcommercetot3" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetot4" id="otregboardorunivcommercetot4" class="form-control" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                  <td>Vocational</td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb1" id="otregboardorunivvocationaltb1" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb2" id="otregboardorunivvocationaltb2" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb3" id="otregboardorunivvocationaltb3" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb4" id="otregboardorunivvocationaltb4" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb5" id="otregboardorunivvocationaltb5" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb6" id="otregboardorunivvocationaltb6" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb7" id="otregboardorunivvocationaltb7" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb8" id="otregboardorunivvocationaltb8" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltot1" id="otregboardorunivvocationaltot1" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltot2" id="otregboardorunivvocationaltot2" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb9" id="otregboardorunivvocationaltb9" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb10" id="otregboardorunivvocationaltb10" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb11" id="otregboardorunivvocationaltb11" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb12" id="otregboardorunivvocationaltb12" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb13" id="otregboardorunivvocationaltb13" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb14" id="otregboardorunivvocationaltb14" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb15" id="otregboardorunivvocationaltb15" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb16" id="otregboardorunivvocationaltb16" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltot3" id="otregboardorunivvocationaltot3" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltot4" id="otregboardorunivvocationaltot4" class="form-control" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                  <td>Other Streams</td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb1" id="otregboardorunivothstreamtb1" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb2" id="otregboardorunivothstreamtb2" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb3" id="otregboardorunivothstreamtb3" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb4" id="otregboardorunivothstreamtb4" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb5" id="otregboardorunivothstreamtb5" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb6" id="otregboardorunivothstreamtb6" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb7" id="otregboardorunivothstreamtb7" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb8" id="otregboardorunivothstreamtb8" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtot1" id="otregboardorunivothstreamtot1" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtot2" id="otregboardorunivothstreamtot2" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb9" id="otregboardorunivothstreamtb9" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb10" id="otregboardorunivothstreamtb10" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb11" id="otregboardorunivothstreamtb11" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb12" id="otregboardorunivothstreamtb12" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb13" id="otregboardorunivothstreamtb13" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb14" id="otregboardorunivothstreamtb14" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb15" id="otregboardorunivothstreamtb15" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb16" id="otregboardorunivothstreamtb16" class="form-control" maxlength="4"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtot3" id="otregboardorunivothstreamtot3" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtot4" id="otregboardorunivothstreamtot4" class="form-control" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                  <td>Total</td>
                                                                  <td><input type="text" name="otregboardorunivgrandtotaltb1" id="otregboardorunivgrandtotaltb1" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivgrandtotaltb2" id="otregboardorunivgrandtotaltb2" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivgrandtotaltb3" id="otregboardorunivgrandtotaltb3" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivgrandtotaltb4" id="otregboardorunivgrandtotaltb4" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivgrandtotaltb5" id="otregboardorunivgrandtotaltb5" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivgrandtotaltb6" id="otregboardorunivgrandtotaltb6" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivgrandtotaltb7" id="otregboardorunivgrandtotaltb7" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivgrandtotaltb8" id="otregboardorunivgrandtotaltb8" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivgrandtotaltb9" id="otregboardorunivgrandtotaltb9" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivgrandtotaltb10" id="otregboardorunivgrandtotaltb10" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivgrandtotaltb11" id="otregboardorunivgrandtotaltb11" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivgrandtotaltb12" id="otregboardorunivgrandtotaltb12" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivgrandtotaltb13" id="otregboardorunivgrandtotaltb13" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivgrandtotaltb14" id="otregboardorunivgrandtotaltb14" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivgrandtotaltb15" id="otregboardorunivgrandtotaltb15" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivgrandtotaltb16" id="otregboardorunivgrandtotaltb16" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivgrandtotaltb17" id="otregboardorunivgrandtotaltb17" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivgrandtotaltb18" id="otregboardorunivgrandtotaltb18" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivgrandtotaltb19" id="otregboardorunivgrandtotaltb19" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivgrandtotaltb20" id="otregboardorunivgrandtotaltb20" class="form-control" disabled="disabled"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                      </div>
                                                      <!-- table-scollable ending -->
                                                        <div class="row">

                                                            <center><input type="button" id="boardexamcalc1" class="btn btn green" value="Calculate"> <input type="submit" value="submit" class="btn btn green"  id="submitbtnboardexam2" name="" style="display: none;"></center>
                                                        </div>
                                                        <br>
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
                                                <div class="row">
                                                    <div class="col-md-12">
                                                      <form method="post" action="" id="boardexamsecondaryandhighersecondarygrade12form1">
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
                                                                    <td><input type="text" class="form-control" name="reggrade12egupto40percenttb1" id="reggrade12egupto40percenttb1" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12egupto40percenttb2" id="reggrade12egupto40percenttb2" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12egupto40percenttb3" id="reggrade12egupto40percenttb3" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12egupto40percenttb4" id="reggrade12egupto40percenttb4" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12egupto40percenttb5" id="reggrade12egupto40percenttb5" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12egupto40percenttb6" id="reggrade12egupto40percenttb6" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12egupto40percenttb7" id="reggrade12egupto40percenttb7" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12egupto40percenttb8" id="reggrade12egupto40percenttb8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12egupto40percenttot1" id="reggrade12egupto40percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12egupto40percenttot2" id="reggrade12egupto40percenttot2" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>41-60%</td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg41to60percenttb1" id="reggrade12eg41to60percenttb1" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg41to60percenttb2" id="reggrade12eg41to60percenttb2" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg41to60percenttb3" id="reggrade12eg41to60percenttb3" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg41to60percenttb4" id="reggrade12eg41to60percenttb4" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg41to60percenttb5" id="reggrade12eg41to60percenttb5" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg41to60percenttb6" id="reggrade12eg41to60percenttb6" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg41to60percenttb7" id="reggrade12eg41to60percenttb7" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg41to60percenttb8" id="reggrade12eg41to60percenttb8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg41to60percenttot1" id="reggrade12eg41to60percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg41to60percenttot2" id="reggrade12eg41to60percenttot2" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>61-80%</td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg61to80percenttb1" id="reggrade12eg61to80percenttb1" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg61to80percenttb2" id="reggrade12eg61to80percenttb2" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg61to80percenttb3" id="reggrade12eg61to80percenttb3" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg61to80percenttb4" id="reggrade12eg61to80percenttb4" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg61to80percenttb5" id="reggrade12eg61to80percenttb5" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg61to80percenttb6" id="reggrade12eg61to80percenttb6" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg61to80percenttb7" id="reggrade12eg61to80percenttb7" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg61to80percenttb8" id="reggrade12eg61to80percenttb8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg61to80percenttot1" id="reggrade12eg61to80percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg61to80percenttot2" id="reggrade12eg61to80percenttot2" disabled="disabled"></td>
                                                                </tr>
                                                                 <tr>
                                                                    <td>Above80%</td>
                                                                    <td><input type="text" class="form-control" name="reggrade12above80percenttb1" id="reggrade12above80percenttb1" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12above80percenttb2" id="reggrade12above80percenttb2" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12above80percenttb3" id="reggrade12above80percenttb3" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12above80percenttb4" id="reggrade12above80percenttb4" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12above80percenttb5" id="reggrade12above80percenttb5" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12above80percenttb6" id="reggrade12above80percenttb6" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12above80percenttb7" id="reggrade12above80percenttb7" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12above80percenttb8" id="reggrade12above80percenttb8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12above80percenttot1" id="reggrade12above80percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12above80percenttot2" id="reggrade12above80percenttot2" disabled="disabled"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Total</td>
                                                                    <td><input type="text" class="form-control" name="reggrade12grandtot1" id="reggrade12grandtot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12grandtot2" id="reggrade12grandtot2" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12grandtot3" id="reggrade12grandtot3" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12grandtot4" id="reggrade12grandtot4" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12grandtot5" id="reggrade12grandtot5" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12grandtot6" id="reggrade12grandtot6" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12grandtot7" id="reggrade12grandtot7" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12grandtot8" id="reggrade12grandtot8" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12grandtot9" id="reggrade12grandtot9" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12grandtot10" id="reggrade12grandtot10" disabled="disabled"></td>
                                                                </tr>
                                                          </tbody>
                                                        </table>
                                                      </div>
                                                      <!-- table-scrollable ending -->
                                                        <center>
                                                          <input type="button" class="btn btn green" id="boardexamform3calcbtn" value="Calculate">
                                                          <input type="submit" value="submit" class="btn btn green" id="boardexamform3submitcalc" name="boardexamform3submitcalc" style="display: none;">
                                                        </center>
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
                                                <div class="row">
                                                    <div class="col-md-12">
                                                      <form method="post" action="" id="boardexamsecondaryandhighersecondarygrade12form2">
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
                                                                    <td><input type="text" class="form-control" name="othreggrade12egupto40percenttb1" id="othreggrade12egupto40percenttb1" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12egupto40percenttb2" id="othreggrade12egupto40percenttb2" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12egupto40percenttb3" id="othreggrade12egupto40percenttb3" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12egupto40percenttb4" id="othreggrade12egupto40percenttb4" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12egupto40percenttb5" id="othreggrade12egupto40percenttb5" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12egupto40percenttb6" id="othreggrade12egupto40percenttb6" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12egupto40percenttb7" id="othreggrade12egupto40percenttb7" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12egupto40percenttb8" id="othreggrade12egupto40percenttb8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12egupto40percenttot1" id="othreggrade12egupto40percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12egupto40percenttot2" id="othreggrade12egupto40percenttot2" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>41-60%</td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg41to60percenttb1" id="othreggrade12eg41to60percenttb1" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg41to60percenttb2" id="othreggrade12eg41to60percenttb2" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg41to60percenttb3" id="othreggrade12eg41to60percenttb3" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg41to60percenttb4" id="othreggrade12eg41to60percenttb4" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg41to60percenttb5" id="othreggrade12eg41to60percenttb5" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg41to60percenttb6" id="othreggrade12eg41to60percenttb6" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg41to60percenttb7" id="othreggrade12eg41to60percenttb7" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg41to60percenttb8" id="othreggrade12eg41to60percenttb8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg41to60percenttot1" id="othreggrade12eg41to60percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg41to60percenttot2" id="othreggrade12eg41to60percenttot2" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>61-80%</td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg61to80percenttb1" id="othreggrade12eg61to80percenttb1" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg61to80percenttb2" id="othreggrade12eg61to80percenttb2" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg61to80percenttb3" id="othreggrade12eg61to80percenttb3" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg61to80percenttb4" id="othreggrade12eg61to80percenttb4" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg61to80percenttb5" id="othreggrade12eg61to80percenttb5" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg61to80percenttb6" id="othreggrade12eg61to80percenttb6" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg61to80percenttb7" id="othreggrade12eg61to80percenttb7" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg61to80percenttb8" id="othreggrade12eg61to80percenttb8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg61to80percenttot1" id="othreggrade12eg61to80percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg61to80percenttot2" disabled="disabled"></td>
                                                                </tr>
                                                                 <tr>
                                                                    <td>Above80%</td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12above80percenttb1" id="othreggrade12above80percenttb1" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12above80percenttb2" id="othreggrade12above80percenttb2" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12above80percenttb3" id="othreggrade12above80percenttb3" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12above80percenttb4" id="othreggrade12above80percenttb4" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12above80percenttb5" id="othreggrade12above80percenttb5" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12above80percenttb6" id="othreggrade12above80percenttb6" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12above80percenttb7" id="othreggrade12above80percenttb7" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12above80percenttb8" id="othreggrade12above80percenttb8" maxlength="4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12above80percenttot1" id="othreggrade12above80percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12above80percenttot2" id="othreggrade12above80percenttot2" disabled="disabled"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Total</td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12grandtot1" id="othreggrade12grandtot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12grandtot2" id="othreggrade12grandtot2" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12grandtot3" id="othreggrade12grandtot3" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12grandtot4" id="othreggrade12grandtot4" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12grandtot5" id="othreggrade12grandtot5" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12grandtot6" id="othreggrade12grandtot6" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12grandtot7" id="othreggrade12grandtot7" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12grandtot8" id="othreggrade12grandtot8" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12grandtot9" id="othreggrade12grandtot9" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12grandtot10" id="othreggrade12grandtot10" disabled="disabled"></td>
                                                                </tr>
                                                          </tbody>
                                                        </table>
                                                      </div>
                                                      <!-- table-scrollable ending -->
                                                      <center>
                                                        <input type="button" class="btn btn green" id="boardexamform4calcbtn" value="Calculate">
                                                          <input type="submit" value="submit" class="btn btn green" id="boardexamform4submitcalc" name="boardexamform4submitcalc" style="display: none;">
                                                      </center>
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
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js";></script>
        <script src="<?php echo base_url().'asset/global/plugins/emis2.js'?>"; type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->

        
    </body>

</html>