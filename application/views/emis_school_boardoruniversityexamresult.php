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
                                                                  <td><input type="text" name="regboardorunivartstb1" id="regboardorunivartstb1" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="regboardorunivartstb2" id="regboardorunivartstb2" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="regboardorunivartstb3" id="regboardorunivartstb3" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="regboardorunivartstb4" id="regboardorunivartstb4" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="regboardorunivartstb5" id="regboardorunivartstb5" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="regboardorunivartstb6" id="regboardorunivartstb6" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="regboardorunivartstb7" id="regboardorunivartstb7" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="regboardorunivartstb8" id="regboardorunivartstb8" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="regboardorunivartstot1" id="regboardorunivartstot1" class="form-control" style="width: 70px;" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivartstot2" id="regboardorunivartstot2" class="form-control" style="width: 70px;" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivartstb9" id="regboardorunivartstb9" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="regboardorunivartstb10" id="regboardorunivartstb10" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="regboardorunivartstb11" id="regboardorunivartstb11" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="regboardorunivartstb12" id="regboardorunivartstb12" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="regboardorunivartstb13" id="regboardorunivartstb13" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="regboardorunivartstb14" id="regboardorunivartstb14" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="regboardorunivartstb15" id="regboardorunivartstb15" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="regboardorunivartstb16" id="regboardorunivartstb16" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="regboardorunivartstot3" id="regboardorunivartstot3" class="form-control" disabled="disabled" style="width: 70px;"></td>
                                                                  <td><input type="text" name="regboardorunivartstot4" id="regboardorunivartstot4" class="form-control" disabled="disabled" style="width: 70px;"></td>
                                                                </tr>
                                                                <tr>
                                                                  <td>Science</td>
                                                                  <td><input type="text" name="regboardorunivsciencetb1" id="regboardorunivsciencetb1" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb2" id="regboardorunivsciencetb2" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb3" id="regboardorunivsciencetb3" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb4" id="regboardorunivsciencetb4" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb5" id="regboardorunivsciencetb5" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb6" id="regboardorunivsciencetb6" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb7" id="regboardorunivsciencetb7" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb8" id="regboardorunivsciencetb8" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetot1" id="regboardorunivsciencetot1" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetot2" id="regboardorunivsciencetot2" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb9" id="regboardorunivsciencetb9" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb10" id="regboardorunivsciencetb10" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb11" id="regboardorunivsciencetb11" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb12" id="regboardorunivsciencetb12" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb13" id="regboardorunivsciencetb13" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb14" id="regboardorunivsciencetb14" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb15" id="regboardorunivsciencetb15" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetb16" id="regboardorunivsciencetb16" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetot3" id="regboardorunivsciencetot3" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivsciencetot4" id="regboardorunivsciencetot4" class="form-control" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                  <td>Commerce</td>
                                                                  <td><input type="text" name="regboardorunivcommercetb1" id="regboardorunivcommercetb1" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb2" id="regboardorunivcommercetb2" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb3" id="regboardorunivcommercetb3" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb4" id="regboardorunivcommercetb4" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb5" id="regboardorunivcommercetb5" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb6" id="regboardorunivcommercetb6" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb7" id="regboardorunivcommercetb7" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb8" id="regboardorunivcommercetb8" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetot1" id="regboardorunivcommercetot1" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetot2" id="regboardorunivcommercetot2" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb9" id="regboardorunivcommercetb9" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb10" id="regboardorunivcommercetb10" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb11" id="regboardorunivcommercetb11" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb12" id="regboardorunivcommercetb12" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb13" id="regboardorunivcommercetb13" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb14" id="regboardorunivcommercetb14" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb15" id="regboardorunivcommercetb15" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetb16" id="regboardorunivcommercetb16" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetot3" id="regboardorunivcommercetot3" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivcommercetot4" id="regboardorunivcommercetot4" class="form-control" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                  <td>Vocational</td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb1" id="regboardorunivvocationaltb1" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb2" id="regboardorunivvocationaltb2" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb3" id="regboardorunivvocationaltb3" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb4" id="regboardorunivvocationaltb4" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb5" id="regboardorunivvocationaltb5" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb6" id="regboardorunivvocationaltb6" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb7" id="regboardorunivvocationaltb7" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb8" id="regboardorunivvocationaltb8" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltot1" id="regboardorunivvocationaltot1" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltot2" id="regboardorunivvocationaltot2" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb9" id="regboardorunivvocationaltb9" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb10" id="regboardorunivvocationaltb10" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb11" id="regboardorunivvocationaltb11" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb12" id="regboardorunivvocationaltb12" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb13" id="regboardorunivvocationaltb13" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb14" id="regboardorunivvocationaltb14" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb15" id="regboardorunivvocationaltb15" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltb16" id="regboardorunivvocationaltb16" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltot3" id="regboardorunivvocationaltot3" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivvocationaltot4" id="regboardorunivvocationaltot4" class="form-control" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                  <td>Other Streams</td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb1" id="regboardorunivothstreamtb1" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb2" id="regboardorunivothstreamtb2" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb3" id="regboardorunivothstreamtb3" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb4" id="regboardorunivothstreamtb4" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb5" id="regboardorunivothstreamtb5" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb6" id="regboardorunivothstreamtb6" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb7" id="regboardorunivothstreamtb7" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb8" id="regboardorunivothstreamtb8" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtot1" id="regboardorunivothstreamtot1" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtot2" id="regboardorunivothstreamtot2" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb9" id="regboardorunivothstreamtb9" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb10" id="regboardorunivothstreamtb10" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb11" id="regboardorunivothstreamtb11" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb12" id="regboardorunivothstreamtb12" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb13" id="regboardorunivothstreamtb13" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb14" id="regboardorunivothstreamtb14" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb15" id="regboardorunivothstreamtb15" class="form-control"></td>
                                                                  <td><input type="text" name="regboardorunivothstreamtb16" id="regboardorunivothstreamtb16" class="form-control"></td>
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

                                                            <center><input type="button" id="boardexamcalc" class="btn btn green" value="Calculate"> <input type="submit" value="submit" class="btn btn green"  id="submitbtnboardexam" name=""></center>
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
                                                                  <td><input type="text" name="otregboardorunivartstb1" id="otregboardorunivartstb1" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb2" id="otregboardorunivartstb2" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb3" id="otregboardorunivartstb3" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb4" id="otregboardorunivartstb4" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb5" id="otregboardorunivartstb5" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb6" id="otregboardorunivartstb6" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb7" id="otregboardorunivartstb7" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb8" id="otregboardorunivartstb8" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="otregboardorunivartstot1" id="otregboardorunivartstot1" class="form-control" disabled="disabled" style="width: 70px;"></td>
                                                                  <td><input type="text" name="otregboardorunivartstot2" id="otregboardorunivartstot2" class="form-control" disabled="disabled" style="width: 70px;"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb9" id="otregboardorunivartstb9" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb10" id="otregboardorunivartstb10" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb11" id="otregboardorunivartstb11" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb12" id="otregboardorunivartstb12" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb13" id="otregboardorunivartstb13" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb14" id="otregboardorunivartstb14" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb15" id="otregboardorunivartstb15" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="otregboardorunivartstb16" id="otregboardorunivartstb16" class="form-control" style="width: 70px;"></td>
                                                                  <td><input type="text" name="otregboardorunivartstot3" id="otregboardorunivartstot3" class="form-control" disabled="disabled" style="width: 70px;"></td>
                                                                  <td><input type="text" name="otregboardorunivartstot4" id="otregboardorunivartstot4" class="form-control" disabled="disabled" style="width: 70px;"></td>
                                                                </tr>
                                                                <tr>
                                                                  <td>Science</td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb1" id="otregboardorunivsciencetb1" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb2" id="otregboardorunivsciencetb2" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb3" id="otregboardorunivsciencetb3" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb4" id="otregboardorunivsciencetb4" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb5" id="otregboardorunivsciencetb5" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb6" id="otregboardorunivsciencetb6" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb7" id="otregboardorunivsciencetb7" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb8" id="otregboardorunivsciencetb8" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetot1" id="otregboardorunivsciencetot1" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetot2" id="otregboardorunivsciencetot2" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb9" id="otregboardorunivsciencetb9" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb10" id="otregboardorunivsciencetb10" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb11" id="otregboardorunivsciencetb11" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb12" id="otregboardorunivsciencetb12" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb13" id="otregboardorunivsciencetb13" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb14" id="otregboardorunivsciencetb14" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb15" id="otregboardorunivsciencetb15" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetb16" id="otregboardorunivsciencetb16" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetot3" id="otregboardorunivsciencetot3" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivsciencetot4" id="otregboardorunivsciencetot4" class="form-control" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                  <td>Commerce</td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb1" id="otregboardorunivcommercetb1" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb2" id="otregboardorunivcommercetb2" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb3" id="otregboardorunivcommercetb3" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb4" id="otregboardorunivcommercetb4" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb5" id="otregboardorunivcommercetb5" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb6" id="otregboardorunivcommercetb6" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb7" id="otregboardorunivcommercetb7" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb8" id="otregboardorunivcommercetb8" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetot1" id="otregboardorunivcommercetot1" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetot2" id="otregboardorunivcommercetot2" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb9" id="otregboardorunivcommercetb9" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb10" id="otregboardorunivcommercetb10" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb11" id="otregboardorunivcommercetb11" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb12" id="otregboardorunivcommercetb12" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb13" id="otregboardorunivcommercetb13" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb14" id="otregboardorunivcommercetb14" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb15" id="otregboardorunivcommercetb15" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetb16" id="otregboardorunivcommercetb16" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetot3" id="otregboardorunivcommercetot3" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivcommercetot4" id="otregboardorunivcommercetot4" class="form-control" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                  <td>Vocational</td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb1" id="otregboardorunivvocationaltb1" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb2" id="otregboardorunivvocationaltb2" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb3" id="otregboardorunivvocationaltb3" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb4" id="otregboardorunivvocationaltb4" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb5" id="otregboardorunivvocationaltb5" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb6" id="otregboardorunivvocationaltb6" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb7" id="otregboardorunivvocationaltb7" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb8" id="otregboardorunivvocationaltb8" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltot1" id="otregboardorunivvocationaltot1" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltot2" id="otregboardorunivvocationaltot2" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb9" id="otregboardorunivvocationaltb9" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb10" id="otregboardorunivvocationaltb10" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb11" id="otregboardorunivvocationaltb11" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb12" id="otregboardorunivvocationaltb12" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb13" id="otregboardorunivvocationaltb13" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb14" id="otregboardorunivvocationaltb14" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb15" id="otregboardorunivvocationaltb15" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltb16" id="otregboardorunivvocationaltb16" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltot3" id="otregboardorunivvocationaltot3" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivvocationaltot4" id="otregboardorunivvocationaltot4" class="form-control" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                  <td>Other Streams</td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb1" id="otregboardorunivothstreamtb1" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb2" id="otregboardorunivothstreamtb2" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb3" id="otregboardorunivothstreamtb3" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb4" id="otregboardorunivothstreamtb4" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb5" id="otregboardorunivothstreamtb5" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb6" id="otregboardorunivothstreamtb6" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb7" id="otregboardorunivothstreamtb7" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb8" id="otregboardorunivothstreamtb8" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtot1" id="otregboardorunivothstreamtot1" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtot2" id="otregboardorunivothstreamtot2" class="form-control" disabled="disabled"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb9" id="otregboardorunivothstreamtb9" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb10" id="otregboardorunivothstreamtb10" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb11" id="otregboardorunivothstreamtb11" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb12" id="otregboardorunivothstreamtb12" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb13" id="otregboardorunivothstreamtb13" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb14" id="otregboardorunivothstreamtb14" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb15" id="otregboardorunivothstreamtb15" class="form-control"></td>
                                                                  <td><input type="text" name="otregboardorunivothstreamtb16" id="otregboardorunivothstreamtb16" class="form-control"></td>
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

                                                            <center><input type="button" id="boardexamcalc1" class="btn btn green" value="Calculate"> <input type="submit" value="submit" class="btn btn green"  id="submitbtnboardexam2" name=""></center>
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
                                                                    <td><input type="text" class="form-control" name="reggrade12egupto40percenttb1" id="reggrade12egupto40percenttb1"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12egupto40percenttb2" id="reggrade12egupto40percenttb2"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12egupto40percenttb3" id="reggrade12egupto40percenttb3"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12egupto40percenttb4" id="reggrade12egupto40percenttb4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12egupto40percenttb5" id="reggrade12egupto40percenttb5"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12egupto40percenttb6" id="reggrade12egupto40percenttb6"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12egupto40percenttb7" id="reggrade12egupto40percenttb7"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12egupto40percenttb8" id="reggrade12egupto40percenttb8"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12egupto40percenttot1" id="reggrade12egupto40percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12egupto40percenttot2" id="reggrade12egupto40percenttot2" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>41-60%</td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg41to60percenttb1" id="reggrade12eg41to60percenttb1"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg41to60percenttb2" id="reggrade12eg41to60percenttb2"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg41to60percenttb3" id="reggrade12eg41to60percenttb3"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg41to60percenttb4" id="reggrade12eg41to60percenttb4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg41to60percenttb5" id="reggrade12eg41to60percenttb5"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg41to60percenttb6" id="reggrade12eg41to60percenttb6"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg41to60percenttb7" id="reggrade12eg41to60percenttb7"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg41to60percenttb8" id="reggrade12eg41to60percenttb8"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg41to60percenttot1" id="reggrade12eg41to60percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg41to60percenttot2" id="reggrade12eg41to60percenttot2" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>61-80%</td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg61to80percenttb1" id="reggrade12eg61to80percenttb1"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg61to80percenttb2" id="reggrade12eg61to80percenttb2"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg61to80percenttb3" id="reggrade12eg61to80percenttb3"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg61to80percenttb4" id="reggrade12eg61to80percenttb4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg61to80percenttb5" id="reggrade12eg61to80percenttb5"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg61to80percenttb6" id="reggrade12eg61to80percenttb6"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg61to80percenttb7" id="reggrade12eg61to80percenttb7"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg61to80percenttb8" id="reggrade12eg61to80percenttb8"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg61to80percenttot1" id="reggrade12eg61to80percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12eg61to80percenttot2" disabled="disabled"></td>
                                                                </tr>
                                                                 <tr>
                                                                    <td>Above80%</td>
                                                                    <td><input type="text" class="form-control" name="reggrade12above80percenttb1" id="reggrade12above80percenttb1"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12above80percenttb2" id="reggrade12above80percenttb2"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12above80percenttb3" id="reggrade12above80percenttb3"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12above80percenttb4" id="reggrade12above80percenttb4"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12above80percenttb5" id="reggrade12above80percenttb5"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12above80percenttb6" id="reggrade12above80percenttb6"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12above80percenttb7" id="reggrade12above80percenttb7"></td>
                                                                    <td><input type="text" class="form-control" name="reggrade12above80percenttb8" id="reggrade12above80percenttb8"></td>
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
                                                        <center><input type="submit" value="submit" class="btn btn green" name=""></center>
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
                                                                    <td><input type="text" class="form-control" name="othreggrade12egupto40percenttb1" id="othreggrade12egupto40percenttb1"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12egupto40percenttb2" id="othreggrade12egupto40percenttb2"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12egupto40percenttb3" id="othreggrade12egupto40percenttb3"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12egupto40percenttb4" id="othreggrade12egupto40percenttb4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12egupto40percenttb5" id="othreggrade12egupto40percenttb5"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12egupto40percenttb6" id="othreggrade12egupto40percenttb6"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12egupto40percenttb7" id="othreggrade12egupto40percenttb7"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12egupto40percenttb8" id="othreggrade12egupto40percenttb8"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12egupto40percenttot1" id="othreggrade12egupto40percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12egupto40percenttot2" id="othreggrade12egupto40percenttot2" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>41-60%</td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg41to60percenttb1" id="othreggrade12eg41to60percenttb1"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg41to60percenttb2" id="othreggrade12eg41to60percenttb2"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg41to60percenttb3" id="othreggrade12eg41to60percenttb3"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg41to60percenttb4" id="othreggrade12eg41to60percenttb4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg41to60percenttb5" id="othreggrade12eg41to60percenttb5"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg41to60percenttb6" id="othreggrade12eg41to60percenttb6"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg41to60percenttb7" id="othreggrade12eg41to60percenttb7"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg41to60percenttb8" id="othreggrade12eg41to60percenttb8"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg41to60percenttot1" id="othreggrade12eg41to60percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg41to60percenttot2" id="othreggrade12eg41to60percenttot2" disabled="disabled"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>61-80%</td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg61to80percenttb1" id="othreggrade12eg61to80percenttb1"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg61to80percenttb2" id="othreggrade12eg61to80percenttb2"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg61to80percenttb3" id="othreggrade12eg61to80percenttb3"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg61to80percenttb4" id="othreggrade12eg61to80percenttb4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg61to80percenttb5" id="othreggrade12eg61to80percenttb5"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg61to80percenttb6" id="othreggrade12eg61to80percenttb6"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg61to80percenttb7" id="othreggrade12eg61to80percenttb7"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg61to80percenttb8" id="othreggrade12eg61to80percenttb8"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg61to80percenttot1" id="othreggrade12eg61to80percenttot1" disabled="disabled"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12eg61to80percenttot2" disabled="disabled"></td>
                                                                </tr>
                                                                 <tr>
                                                                    <td>Above80%</td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12above80percenttb1" id="othreggrade12above80percenttb1"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12above80percenttb2" id="othreggrade12above80percenttb2"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12above80percenttb3" id="othreggrade12above80percenttb3"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12above80percenttb4" id="othreggrade12above80percenttb4"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12above80percenttb5" id="othreggrade12above80percenttb5"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12above80percenttb6" id="othreggrade12above80percenttb6"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12above80percenttb7" id="othreggrade12above80percenttb7"></td>
                                                                    <td><input type="text" class="form-control" name="othreggrade12above80percenttb8" id="othreggrade12above80percenttb8"></td>
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
                                                        <center><input type="submit" value="submit" class="btn btn green" name=""></center>
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
        <!-- END PAGE LEVEL SCRIPTS -->

        <script type="text/javascript">
          $('#boardorunivesityexamresultform1').validate({
            rules:{
              regboardorunivartstb1:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               regboardorunivartstb2:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivartstb3:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivartstb4:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivartstb5:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivartstb6:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivartstb7:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivartstb8:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               regboardorunivartstb9:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               regboardorunivartstb10:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivartstb11:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivartstb12:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivartstb13:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivartstb14:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivartstb15:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivartstb16:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivsciencetb1:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               regboardorunivsciencetb2:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivsciencetb3:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivsciencetb4:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivsciencetb5:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivsciencetb6:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivsciencetb7:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivsciencetb8:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               regboardorunivsciencetb9:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               regboardorunivsciencetb10:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivsciencetb11:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivsciencetb12:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivsciencetb13:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivsciencetb14:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivsciencetb15:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivsciencetb16:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivcommercetb1:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               regboardorunivcommercetb2:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivcommercetb3:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivcommercetb4:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivcommercetb5:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivcommercetb6:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivcommercetb7:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivcommercetb8:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               regboardorunivcommercetb9:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               regboardorunivcommercetb10:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivcommercetb11:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivcommercetb12:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivcommercetb13:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivcommercetb14:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivcommercetb15:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivcommercetb16:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivvocationaltb1:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               regboardorunivvocationaltb2:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivvocationaltb3:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivvocationaltb4:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivvocationaltb5:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivvocationaltb6:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivvocationaltb7:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivvocationaltb8:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               regboardorunivvocationaltb9:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               regboardorunivvocationaltb10:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivvocationaltb11:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivvocationaltb12:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivvocationaltb13:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivvocationaltb14:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivvocationaltb15:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivvocationaltb16:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivothstreamtb1:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               regboardorunivothstreamtb2:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivothstreamtb3:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivothstreamtb4:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivothstreamtb5:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivothstreamtb6:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivothstreamtb7:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivothstreamtb8:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               regboardorunivothstreamtb9:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               regboardorunivothstreamtb10:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivothstreamtb11:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivothstreamtb12:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivothstreamtb13:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivothstreamtb14:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivothstreamtb15:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              regboardorunivothstreamtb16:{
                required:true,
                customvalidation:true,
                maxlength:4
              }

              // othstream

            },
             onfocusout: function(element) {
            this.element(element);
          },

          });
  
        $('#boardexamcalc').on('click',function(){
            $('#boardorunivesityexamresultform1').valid();
        });

        $('#boardexamcalc').click(function(){
            // $('#boardorunivesityexamresultform1').valid();   

            // arts calculation part
            var regboardorunivartstot1= Number($('#regboardorunivartstb1').val())+Number($('#regboardorunivartstb3').val())+Number($('#regboardorunivartstb5').val())+Number($('#regboardorunivartstb7').val());
            $('#regboardorunivartstot1').val(regboardorunivartstot1);

            var regboardorunivartstot2= Number($('#regboardorunivartstb2').val())+Number($('#regboardorunivartstb4').val())+Number($('#regboardorunivartstb6').val())+Number($('#regboardorunivartstb8').val());
            $('#regboardorunivartstot2').val(regboardorunivartstot2);

            var regboardorunivartstot3= Number($('#regboardorunivartstb9').val())+Number($('#regboardorunivartstb11').val())+Number($('#regboardorunivartstb13').val())+Number($('#regboardorunivartstb15').val());
            $('#regboardorunivartstot3').val(regboardorunivartstot3);

            var regboardorunivartstot4= Number($('#regboardorunivartstb10').val())+Number($('#regboardorunivartstb12').val())+Number($('#regboardorunivartstb14').val())+Number($('#regboardorunivartstb16').val());
            $('#regboardorunivartstot4').val(regboardorunivartstot4);
            // arts calculation part Ending

            // science calculation part
            var regboardorunivsciencetot1= Number($('#regboardorunivsciencetb1').val())+Number($('#regboardorunivsciencetb3').val())+Number($('#regboardorunivsciencetb5').val())+Number($('#regboardorunivsciencetb7').val());
            $('#regboardorunivsciencetot1').val(regboardorunivsciencetot1);

            var regboardorunivsciencetot2= Number($('#regboardorunivsciencetb2').val())+Number($('#regboardorunivsciencetb4').val())+Number($('#regboardorunivsciencetb6').val())+Number($('#regboardorunivsciencetb8').val());
            $('#regboardorunivsciencetot2').val(regboardorunivsciencetot2);

            var regboardorunivsciencetot3= Number($('#regboardorunivsciencetb9').val())+Number($('#regboardorunivsciencetb11').val())+Number($('#regboardorunivsciencetb13').val())+Number($('#regboardorunivsciencetb15').val());
            $('#regboardorunivsciencetot3').val(regboardorunivsciencetot3);

            var regboardorunivsciencetot4= Number($('#regboardorunivsciencetb10').val())+Number($('#regboardorunivsciencetb12').val())+Number($('#regboardorunivsciencetb14').val())+Number($('#regboardorunivsciencetb16').val());
            $('#regboardorunivsciencetot4').val(regboardorunivsciencetot4);
            // science calculation part Ending


            // commerce calculation part
            var regboardorunivcommercetot1= Number($('#regboardorunivcommercetb1').val())+Number($('#regboardorunivcommercetb3').val())+Number($('#regboardorunivcommercetb5').val())+Number($('#regboardorunivcommercetb7').val());
            $('#regboardorunivcommercetot1').val(regboardorunivcommercetot1);

            var regboardorunivcommercetot2= Number($('#regboardorunivcommercetb2').val())+Number($('#regboardorunivcommercetb4').val())+Number($('#regboardorunivcommercetb6').val())+Number($('#regboardorunivcommercetb8').val());
            $('#regboardorunivcommercetot2').val(regboardorunivcommercetot2);

            var regboardorunivcommercetot3= Number($('#regboardorunivcommercetb9').val())+Number($('#regboardorunivcommercetb11').val())+Number($('#regboardorunivcommercetb13').val())+Number($('#regboardorunivcommercetb15').val());
            $('#regboardorunivcommercetot3').val(regboardorunivcommercetot3);

            var regboardorunivcommercetot4= Number($('#regboardorunivcommercetb10').val())+Number($('#regboardorunivcommercetb12').val())+Number($('#regboardorunivcommercetb14').val())+Number($('#regboardorunivcommercetb16').val());
            $('#regboardorunivcommercetot4').val(regboardorunivcommercetot4);
            // commerce calculation part Ending


            // vocational calculation part
            var regboardorunivvocationaltot1= Number($('#regboardorunivvocationaltb1').val())+Number($('#regboardorunivvocationaltb3').val())+Number($('#regboardorunivvocationaltb5').val())+Number($('#regboardorunivvocationaltb7').val());
            $('#regboardorunivvocationaltot1').val(regboardorunivvocationaltot1);

            var regboardorunivvocationaltot2= Number($('#regboardorunivvocationaltb2').val())+Number($('#regboardorunivvocationaltb4').val())+Number($('#regboardorunivvocationaltb6').val())+Number($('#regboardorunivvocationaltb8').val());
            $('#regboardorunivvocationaltot2').val(regboardorunivvocationaltot2);

            var regboardorunivvocationaltot3= Number($('#regboardorunivvocationaltb9').val())+Number($('#regboardorunivvocationaltb11').val())+Number($('#regboardorunivvocationaltb13').val())+Number($('#regboardorunivvocationaltb15').val());
            $('#regboardorunivvocationaltot3').val(regboardorunivvocationaltot3);

            var regboardorunivvocationaltot4= Number($('#regboardorunivvocationaltb10').val())+Number($('#regboardorunivvocationaltb12').val())+Number($('#regboardorunivvocationaltb14').val())+Number($('#regboardorunivvocationaltb16').val());
            $('#regboardorunivvocationaltot4').val(regboardorunivvocationaltot4);
            // vocational calculation part Ending


            // othstream calculation part
            var regboardorunivothstreamtot1= Number($('#regboardorunivothstreamtb1').val())+Number($('#regboardorunivothstreamtb3').val())+Number($('#regboardorunivothstreamtb5').val())+Number($('#regboardorunivothstreamtb7').val());
            $('#regboardorunivothstreamtot1').val(regboardorunivothstreamtot1);

            var regboardorunivothstreamtot2= Number($('#regboardorunivothstreamtb2').val())+Number($('#regboardorunivothstreamtb4').val())+Number($('#regboardorunivothstreamtb6').val())+Number($('#regboardorunivothstreamtb8').val());
            $('#regboardorunivothstreamtot2').val(regboardorunivothstreamtot2);

            var regboardorunivothstreamtot3= Number($('#regboardorunivothstreamtb9').val())+Number($('#regboardorunivothstreamtb11').val())+Number($('#regboardorunivothstreamtb13').val())+Number($('#regboardorunivothstreamtb15').val());
            $('#regboardorunivothstreamtot3').val(regboardorunivothstreamtot3);

            var regboardorunivothstreamtot4= Number($('#regboardorunivothstreamtb10').val())+Number($('#regboardorunivothstreamtb12').val())+Number($('#regboardorunivothstreamtb14').val())+Number($('#regboardorunivothstreamtb16').val());
            $('#regboardorunivothstreamtot4').val(regboardorunivothstreamtot4);
            // othstream calculation part Ending


            // Grand total1
            var regboardorunivgrandtotaltb1= Number($('#regboardorunivartstb1').val())+Number($('#regboardorunivsciencetb1').val())+Number($('#regboardorunivcommercetb1').val())+Number($('#regboardorunivvocationaltb1').val())+Number($('#regboardorunivothstreamtb1').val());
            $('#regboardorunivgrandtotaltb1').val(regboardorunivgrandtotaltb1);
            // Grand total1 Ending

            // Grand total2
            var regboardorunivgrandtotaltb2= Number($('#regboardorunivartstb2').val())+Number($('#regboardorunivsciencetb2').val())+Number($('#regboardorunivcommercetb2').val())+Number($('#regboardorunivvocationaltb2').val())+Number($('#regboardorunivothstreamtb2').val());
            $('#regboardorunivgrandtotaltb2').val(regboardorunivgrandtotaltb2);
            // Grand total2 Ending

            // Grand total3
            var regboardorunivgrandtotaltb3= Number($('#regboardorunivartstb3').val())+Number($('#regboardorunivsciencetb3').val())+Number($('#regboardorunivcommercetb3').val())+Number($('#regboardorunivvocationaltb3').val())+Number($('#regboardorunivothstreamtb3').val());
            $('#regboardorunivgrandtotaltb3').val(regboardorunivgrandtotaltb3);
            // Grand total3 Ending

            // Grand total4
            var regboardorunivgrandtotaltb4= Number($('#regboardorunivartstb4').val())+Number($('#regboardorunivsciencetb4').val())+Number($('#regboardorunivcommercetb4').val())+Number($('#regboardorunivvocationaltb4').val())+Number($('#regboardorunivothstreamtb4').val());
            $('#regboardorunivgrandtotaltb4').val(regboardorunivgrandtotaltb4);
            // Grand total4 Ending


            // Grand total5
            var regboardorunivgrandtotaltb5= Number($('#regboardorunivartstb5').val())+Number($('#regboardorunivsciencetb5').val())+Number($('#regboardorunivcommercetb5').val())+Number($('#regboardorunivvocationaltb5').val())+Number($('#regboardorunivothstreamtb5').val());
            $('#regboardorunivgrandtotaltb5').val(regboardorunivgrandtotaltb5);
            // Grand total5 Ending


            // Grand total6
            var regboardorunivgrandtotaltb6= Number($('#regboardorunivartstb6').val())+Number($('#regboardorunivsciencetb6').val())+Number($('#regboardorunivcommercetb6').val())+Number($('#regboardorunivvocationaltb6').val())+Number($('#regboardorunivothstreamtb6').val());
            $('#regboardorunivgrandtotaltb6').val(regboardorunivgrandtotaltb6);
            // Grand total6 Ending


            // Grand total7
            var regboardorunivgrandtotaltb7= Number($('#regboardorunivartstb7').val())+Number($('#regboardorunivsciencetb7').val())+Number($('#regboardorunivcommercetb7').val())+Number($('#regboardorunivvocationaltb7').val())+Number($('#regboardorunivothstreamtb7').val());
            $('#regboardorunivgrandtotaltb7').val(regboardorunivgrandtotaltb7);
            // Grand total7 Ending


            // Grand total8
            var regboardorunivgrandtotaltb8= Number($('#regboardorunivartstb8').val())+Number($('#regboardorunivsciencetb8').val())+Number($('#regboardorunivcommercetb8').val())+Number($('#regboardorunivvocationaltb8').val())+Number($('#regboardorunivothstreamtb8').val());
            $('#regboardorunivgrandtotaltb8').val(regboardorunivgrandtotaltb8);
            // Grand total8 Ending

            // Grand total11
            var regboardorunivgrandtotaltb11= Number($('#regboardorunivartstb9').val())+Number($('#regboardorunivsciencetb9').val())+Number($('#regboardorunivcommercetb9').val())+Number($('#regboardorunivvocationaltb9').val())+Number($('#regboardorunivothstreamtb9').val());
            $('#regboardorunivgrandtotaltb11').val(regboardorunivgrandtotaltb11);
            // Grand total11 Ending

            // Grand total12
            var regboardorunivgrandtotaltb12= Number($('#regboardorunivartstb10').val())+Number($('#regboardorunivsciencetb10').val())+Number($('#regboardorunivcommercetb10').val())+Number($('#regboardorunivvocationaltb10').val())+Number($('#regboardorunivothstreamtb10').val());
            $('#regboardorunivgrandtotaltb12').val(regboardorunivgrandtotaltb12);
            // Grand total12 Ending

            // Grand total13
            var regboardorunivgrandtotaltb13= Number($('#regboardorunivartstb11').val())+Number($('#regboardorunivsciencetb11').val())+Number($('#regboardorunivcommercetb11').val())+Number($('#regboardorunivvocationaltb11').val())+Number($('#regboardorunivothstreamtb11').val());
            $('#regboardorunivgrandtotaltb13').val(regboardorunivgrandtotaltb13);
            // Grand total13 Ending

            // Grand total14
            var regboardorunivgrandtotaltb14= Number($('#regboardorunivartstb12').val())+Number($('#regboardorunivsciencetb12').val())+Number($('#regboardorunivcommercetb12').val())+Number($('#regboardorunivvocationaltb12').val())+Number($('#regboardorunivothstreamtb12').val());
            $('#regboardorunivgrandtotaltb14').val(regboardorunivgrandtotaltb14);
            // Grand total14 Ending

            // Grand total15
            var regboardorunivgrandtotaltb15= Number($('#regboardorunivartstb13').val())+Number($('#regboardorunivsciencetb13').val())+Number($('#regboardorunivcommercetb13').val())+Number($('#regboardorunivvocationaltb13').val())+Number($('#regboardorunivothstreamtb13').val());
            $('#regboardorunivgrandtotaltb15').val(regboardorunivgrandtotaltb15);
            // Grand total15 Ending

            // Grand total16
            var regboardorunivgrandtotaltb16= Number($('#regboardorunivartstb14').val())+Number($('#regboardorunivsciencetb14').val())+Number($('#regboardorunivcommercetb14').val())+Number($('#regboardorunivvocationaltb14').val())+Number($('#regboardorunivothstreamtb14').val());
            $('#regboardorunivgrandtotaltb16').val(regboardorunivgrandtotaltb16);
            // Grand total16 Ending

            // Grand total17
            var regboardorunivgrandtotaltb17= Number($('#regboardorunivartstb15').val())+Number($('#regboardorunivsciencetb15').val())+Number($('#regboardorunivcommercetb15').val())+Number($('#regboardorunivvocationaltb15').val())+Number($('#regboardorunivothstreamtb15').val());
            $('#regboardorunivgrandtotaltb17').val(regboardorunivgrandtotaltb17);
            // Grand total17 Ending

            // Grand total18
            var regboardorunivgrandtotaltb18= Number($('#regboardorunivartstb16').val())+Number($('#regboardorunivsciencetb16').val())+Number($('#regboardorunivcommercetb16').val())+Number($('#regboardorunivvocationaltb16').val())+Number($('#regboardorunivothstreamtb16').val());
            $('#regboardorunivgrandtotaltb18').val(regboardorunivgrandtotaltb18);
            // Grand total18 Ending

            // Grand total18
            // var regboardorunivgrandtotaltb18= Number($('#regboardorunivartstb18').val())+Number($('#regboardorunivsciencetb18').val())+Number($('#regboardorunivcommercetb18').val())+Number($('#regboardorunivvocationaltb18').val())+Number($('#regboardorunivothstreamtb18').val());
            // $('#regboardorunivgrandtotaltb18').val(regboardorunivgrandtotaltb18);
            // Grand total18 Ending

            //Grand total19
            // var regboardorunivgrandtotaltb19= Number($('#regboardorunivartstb19').val())+Number($('#regboardorunivsciencetb19').val())+Number($('#regboardorunivcommercetb19').val())+Number($('#regboardorunivvocationaltb19').val())+Number($('#regboardorunivothstreamtb19').val());
            // $('#regboardorunivgrandtotaltb19').val(regboardorunivgrandtotaltb19);
            //Grand total19 Ending

            //Grand total20
            // var regboardorunivgrandtotaltb20= Number($('#regboardorunivartstb20').val())+Number($('#regboardorunivsciencetb20').val())+Number($('#regboardorunivcommercetb20').val())+Number($('#regboardorunivvocationaltb20').val())+Number($('#regboardorunivothstreamtb20').val());
            // $('#regboardorunivgrandtotaltb20').val(regboardorunivgrandtotaltb20);
            //Grand total20 Ending

        });


        


          $('#boardorunivesityexamresultform2').validate({
            rules:{
              otregboardorunivartstb1:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               otregboardorunivartstb2:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivartstb3:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivartstb4:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivartstb5:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivartstb6:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivartstb7:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivartstb8:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               otregboardorunivartstb9:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               otregboardorunivartstb10:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivartstb11:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivartstb12:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivartstb13:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivartstb14:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivartstb15:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivartstb16:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivsciencetb1:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               otregboardorunivsciencetb2:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivsciencetb3:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivsciencetb4:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivsciencetb5:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivsciencetb6:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivsciencetb7:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivsciencetb8:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               otregboardorunivsciencetb9:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               otregboardorunivsciencetb10:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivsciencetb11:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivsciencetb12:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivsciencetb13:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivsciencetb14:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivsciencetb15:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivsciencetb16:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivcommercetb1:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               otregboardorunivcommercetb2:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivcommercetb3:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivcommercetb4:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivcommercetb5:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivcommercetb6:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivcommercetb7:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivcommercetb8:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               otregboardorunivcommercetb9:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               otregboardorunivcommercetb10:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivcommercetb11:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivcommercetb12:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivcommercetb13:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivcommercetb14:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivcommercetb15:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivcommercetb16:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivvocationaltb1:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               otregboardorunivvocationaltb2:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivvocationaltb3:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivvocationaltb4:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivvocationaltb5:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivvocationaltb6:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivvocationaltb7:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivvocationaltb8:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               otregboardorunivvocationaltb9:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               otregboardorunivvocationaltb10:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivvocationaltb11:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivvocationaltb12:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivvocationaltb13:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivvocationaltb14:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivvocationaltb15:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivvocationaltb16:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivothstreamtb1:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               otregboardorunivothstreamtb2:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivothstreamtb3:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivothstreamtb4:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivothstreamtb5:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivothstreamtb6:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivothstreamtb7:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivothstreamtb8:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               otregboardorunivothstreamtb9:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
               otregboardorunivothstreamtb10:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivothstreamtb11:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivothstreamtb12:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivothstreamtb13:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivothstreamtb14:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivothstreamtb15:{
                required:true,
                customvalidation:true,
                maxlength:4
              },
              otregboardorunivothstreamtb16:{
                required:true,
                customvalidation:true,
                maxlength:4
              }

              // othstream

            },
             onfocusout: function(element) {
            this.element(element);
          }

          });


          // form3

// admin page5 js validations
$("#boardexamsecondaryandhighersecondarygrade12form1").validate({

    
    rules: {
        reggrade12egupto40percenttb1:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12egupto40percenttb2:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12egupto40percenttb3:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12egupto40percenttb4:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12egupto40percenttb5:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12egupto40percenttb6:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12egupto40percenttb7:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12egupto40percenttb8:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12eg41to60percenttb1:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12eg41to60percenttb2:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12eg41to60percenttb3:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12eg41to60percenttb4:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12eg41to60percenttb5:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12eg41to60percenttb6:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12eg41to60percenttb7:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12eg41to60percenttb8:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12eg61to80percenttb1:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12eg61to80percenttb2:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12eg61to80percenttb3:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12eg61to80percenttb4:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12eg61to80percenttb5:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12eg61to80percenttb6:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12eg61to80percenttb7:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12eg61to80percenttb8:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12above80percenttb1:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12above80percenttb2:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12above80percenttb3:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12above80percenttb4:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12above80percenttb5:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12above80percenttb6:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12above80percenttb7:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        reggrade12above80percenttb8:{
            required:true,
            customvalidation:true,
            maxlength:4
        }

        },

            
        
             onfocusout: function(element) {
            this.element(element);


        },

   
   });


  

  // form4

  // admin page5 js validations
$("#boardexamsecondaryandhighersecondarygrade12form2").validate({

    
          rules: {
        othreggrade12egupto40percenttb1:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12egupto40percenttb2:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12egupto40percenttb3:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12egupto40percenttb4:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12egupto40percenttb5:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12egupto40percenttb6:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12egupto40percenttb7:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12egupto40percenttb8:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12eg41to60percenttb1:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12eg41to60percenttb2:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12eg41to60percenttb3:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12eg41to60percenttb4:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12eg41to60percenttb5:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12eg41to60percenttb6:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12eg41to60percenttb7:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12eg41to60percenttb8:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12eg61to80percenttb1:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12eg61to80percenttb2:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12eg61to80percenttb3:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12eg61to80percenttb4:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12eg61to80percenttb5:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12eg61to80percenttb6:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12eg61to80percenttb7:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12eg61to80percenttb8:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12above80percenttb1:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12above80percenttb2:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12above80percenttb3:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12above80percenttb4:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12above80percenttb5:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12above80percenttb6:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12above80percenttb7:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        othreggrade12above80percenttb8:{
            required:true,
            customvalidation:true,
            maxlength:4
        }

        },

            
        
             onfocusout: function(element) {
            this.element(element);


        },

   
   });

  


          $.validator.addMethod("customvalidationselectfield",
               function(){
               return $('').val()!="none";
            });

            

          $.validator.addMethod("customvalidation",
               function(value,element){
                     return /^[0-9]+$/.test(value);
               },
               "Allowed number value only");
        </script>

        
    </body>

</html>