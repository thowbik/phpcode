<!DOCTYPE html>

      <html lang="en">
         <!--<![endif]-->
         <!-- BEGIN HEAD -->
         <head>
            <?php $this->load->view('head.php'); ?>
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-table/bootstrap-table.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
            
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
            
            <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
            
            
         </head>

         <style type="text/css">
               label.error { float: none; color:#dd4b39; }
               
               #entbl2 input{
                  width: 80px;
               }

               .mydivs{
                border: 1px solid #e7ecf1;width: 70px;height:35px;border-radius: 5px;background-color: #e7ecf1;padding-top: 7px;
               }

               .values{
                width: 70px;
                height: 35px;
                text-align: center;
               }
               #ld5rw1,#ld5rw2,#ld5rw3,#ld5rw4,#age5rw1,#age5rw2,#age5rw3,#age5rw4,#age6rw1,#age6rw2,#age6rw3,#age6rw4,#age7rw1,#age7rw2,#age7rw3,#age7rw4,#age8rw1,#age8rw2,#age8rw3,#age8rw4,#age9rw1,#age9rw2,#age9rw3,#age9rw4,#age10rw1,#age10rw2,#age10rw3,#age10rw4,#age10rw5,#age11rw1,#age11rw2,#age11rw3,#age11rw4,#age11rw5,#age12rw1,#age12rw2,#age12rw3,#age12rw4,#age12rw5,#age13rw1,#age13rw2,#age13rw3,#age13rw4,#age13rw5,#age14rw1,#age14rw2,#age14rw3,#age14rw4,#age14rw5,#age15rw1,#age15rw2,#age15rw3,#age15rw4,#age15rw5,#age16rw1,#age16rw2,#age16rw3,#age16rw4,#age16rw5,#age17rw1,#age17rw2,#age17rw3,#age17rw4,#age17rw5,#age18rw1,#age18rw2,#age18rw3,#age18rw4,#age18rw5,#age19rw1,#age19rw2,#age19rw3,#age19rw4,#age19rw5,#age20rw1,#age20rw2,#age20rw3,#age20rw4,#age20rw5,#age21rw1,#age21rw2,#age21rw3,#age21rw4,#age21rw5,#age22rw1,#age22rw2,#age22rw3,#age22rw4,#age22rw5,#gt22rw1,#gt22rw2,#gt22rw3,#gt22rw4,#gt22rw5{
                display: none;
               }
               .space{
                width: 100px;
               }

            </style>
         <!-- END HEAD -->
         <body class="page-container-bg-solid page-md">
            <div class="page-wrapper">
               <?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
               <?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
               <?php $this->load->view('block/header.php'); }else{ ?>
               <?php $this->load->view('header.php'); }?>
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
                                    <h1>Enrolment Information
                                       <small>New Admissions,Enrolment,Repeaters</small>
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
                                             <a href="<?php echo base_url().'Udise_enrolment/emis_school_enrolment1';?>">
                                                <div class="col-md-2 bg-grey mt-step-col active">
                                                   <div class="mt-step-number bg-white font-grey">1</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade"><h5><b>Enrolment</b></h5></div>
                                                   <div class="mt-step-content font-grey-cascade">Step 1</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Udise_enrolment/emis_school_enrolment2';?>">
                                                <div class="col-md-2 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">2</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade"><h5><b>Enrolment</b></h5></div>
                                                   <div class="mt-step-content font-grey-cascade">Step 2</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Udise_enrolment/emis_school_enrolment3';?>">
                                                <div class="col-md-2 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">3</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade"><h5><b>Enrolment</b></h5></div>
                                                   <div class="mt-step-content font-grey-cascade">Step 3</div>
                                                </div>
                                             </a>

                                             <a href="<?php echo base_url().'Udise_enrolment/emis_school_enrolment4';?>">
                                                <div class="col-md-2 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">4</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade"><h5><b>Enrolment</b></h5></div>
                                                   <div class="mt-step-content font-grey-cascade">Step 4</div>
                                                </div>
                                             </a>

                                             <a href="<?php echo base_url().'Udise_enrolment/emis_school_enrolment5';?>">
                                                <div class="col-md-2 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">5</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade"><h5><b>Enrolment</b></h5></div>
                                                   <div class="mt-step-content font-grey-cascade">Step 5</div>
                                                </div>
                                             </a>

                                             <a href="<?php echo base_url().'Udise_enrolment/emis_school_enrolment6';?>">
                                                <div class="col-md-2 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">6</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade"><h5><b>Enrolment</b></h5></div>
                                                   <div class="mt-step-content font-grey-cascade">Step 6</div>
                                                </div>
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- row for Enable or Disable -->
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="mt-checkbox-inline">
                                             
                                             <button id="table1" class="btn green">Enable / Disable Editor Mode</button>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- row for Enable or Disable Ended-->
                                    <div class="row">
                                       <div class="col-md-12">
                                                    <div class="portlet light ">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <i class="icon-settings font-dark"></i>
                                                                <span class="caption-subject font-dark bold uppercase">New Admissions in Grade I</span> <small>(only for schools having primary section)</small>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="portlet-body">

                                                          <!-- error reporting start -->
                                                       <?php if ($this->session->flashdata('enrolment1')){ ?> 
                                                <!-- BEGIN PAGE CONTENT INNER -->
                                                   <div class="page-content-inner">
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="note note-danger note-bordered">
                                                               <?php echo $this->session->flashdata('enrolment1'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <!-- END PAGE CONTENT INNER -->
                                             <?php } ?>
                                             <!-- error reporting End -->

                                                          <form action="<?php echo base_url().'Udise_enrolment/enrolmnt1frm1' ?>" method="post" id="enrolmnt1frm1">
                                                          <div class="table-scrollable">
                                                            <table data-toggle="table" data-height="299" class="table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th rowspan="2"></th>
                                                                        <th colspan="5">Age (in complete years)</th>
                                                                        <th rowspan="2">Total children admitted in grade 1</th>
                                                                        <th colspan="3">Out of the Total in Grade I Number of children with pre-school experience in</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Below 5</th>
                                                                        <th>Age 5</th>
                                                                        <th>Age 6</th>
                                                                        <th>Age 7</th>
                                                                        <th>Above 7</th>
                                                                        <th>Same School</th>
                                                                        <th>Another school</th>
                                                                        <th>Anganwadi/ECCE center</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                   <tr>
                                                                     <td>Boys</td>
                                                                     <td>
                                                                      <input type="text" class="form-control" name="enrlmnt1_b_tb1" id="enrlmnt1_b_tb1" style="width: 100px;display: none;" maxlength="6" value="<?php echo $age_blw5_b; ?>">
                                                                      <center><p id="boys1"><?php echo $age_blw5_b; ?></p></center>
                                                                    </td>
                                                                     <td>
                                                                      <input type="text" class="form-control" name="enrlmnt1_b_tb2" id="enrlmnt1_b_tb2" style="width: 100px;display: none;" maxlength="6" value="<?php echo $age_5_b; ?>">
                                                                      <center><p id="boys2"><?php echo $age_5_b; ?></p></center>
                                                                    </td>
                                                                     <td>
                                                                      <input type="text" class="form-control" name="enrlmnt1_b_tb3" id="enrlmnt1_b_tb3" style="width: 100px;display: none;" maxlength="6" value="<?php echo $age_6_b; ?>">
                                                                      <center><p id="boys3"><?php echo $age_6_b; ?></p></center>
                                                                    </td>
                                                                     <td>
                                                                      <input type="text" class="form-control" name="enrlmnt1_b_tb4" id="enrlmnt1_b_tb4" style="width: 100px;display: none;" maxlength="6" value="<?php echo $age_7_b; ?>">
                                                                      <center><p id="boys4"><?php echo $age_7_b; ?></p></center>
                                                                    </td>
                                                                     <td>
                                                                      <input type="text" class="form-control" name="enrlmnt1_b_tb5" id="enrlmnt1_b_tb5" style="width: 100px;display: none;" maxlength="6" value="<?php echo $age_abv7_b; ?>">
                                                                      <center><p id="boys5"><?php echo $age_abv7_b; ?></p></center>
                                                                    </td>
                                                                     <td>
                                                                      <input type="text" class="form-control" name="enrlmnt1_b_tb6" id="enrlmnt1_b_tb6" maxlength="6" value="<?php echo $tot_chldns_adgrd1_b; ?>" style="display: none;">
                                                                      <center><p id="boys6"><?php echo $tot_chldns_adgrd1_b; ?></p></center>
                                                                    </td>
                                                                     <td>
                                                                      <input type="text" class="form-control" name="enrlmnt1_b_tb7" id="enrlmnt1_b_tb7" maxlength="6" value="<?php echo $tot_grd1_smeschl_b; ?>" style="display: none;">
                                                                      <center><p id="boys7"><?php echo $tot_grd1_smeschl_b; ?></p></center>
                                                                    </td>
                                                                     <td>
                                                                      <input type="text" class="form-control" name="enrlmnt1_b_tb8" id="enrlmnt1_b_tb8" maxlength="6" value="<?php echo $tot_grd1_anthrschl_b; ?>" style="display: none;">
                                                                      <center><p id="boys8"><?php echo $tot_grd1_anthrschl_b; ?></p></center>
                                                                    </td>
                                                                     <td>
                                                                      <input type="text" class="form-control" name="enrlmnt1_b_tb9" id="enrlmnt1_b_tb9" maxlength="6" value="<?php echo $tot_grd1_ecce_b; ?>" style="display: none;">
                                                                      <center><p id="boys9"><?php echo $tot_grd1_ecce_b; ?></p></center>
                                                                    </td>
                                                                   </tr>
                                                                   <tr>
                                                                     <td>Girls</td>
                                                                     <td>
                                                                      <input type="text" class="form-control" name="enrlmnt1_g_tb1" id="enrlmnt1_g_tb1" style="width: 100px;display: none;" maxlength="6" value="<?php echo $age_blw5_g; ?>">
                                                                      <center><p id="girls1"><?php echo $age_blw5_g; ?></p></center>
                                                                    </td>
                                                                     <td>
                                                                      <input type="text" class="form-control" name="enrlmnt1_g_tb2" id="enrlmnt1_g_tb2" style="width: 100px;display: none;" maxlength="6" value="<?php echo $age_5_g; ?>">
                                                                      <center><p id="girls2"><?php echo $age_5_g; ?></p></center>
                                                                    </td>
                                                                     <td>
                                                                      <input type="text" class="form-control" name="enrlmnt1_g_tb3" id="enrlmnt1_g_tb3" style="width: 100px;display: none;" maxlength="6" value="<?php echo $age_6_g; ?>" >
                                                                      <center><p id="girls3"><?php echo $age_6_g; ?></p></center>
                                                                    </td>
                                                                     <td>
                                                                      <input type="text" class="form-control" name="enrlmnt1_g_tb4" id="enrlmnt1_g_tb4" style="width: 100px;display: none;" maxlength="6" value="<?php echo $age_7_g; ?>" >
                                                                      <center><p id="girls4"><?php echo $age_7_g; ?></p></center>
                                                                    </td>
                                                                     <td>
                                                                      <input type="text" class="form-control" name="enrlmnt1_g_tb5" id="enrlmnt1_g_tb5" style="width: 100px;display: none;" maxlength="6" value="<?php echo $age_abv7_g; ?>">
                                                                      <center><p id="girls5"><?php echo $age_abv7_g; ?></p></center>
                                                                    </td>
                                                                     <td>
                                                                      <input type="text" class="form-control" name="enrlmnt1_g_tb6" id="enrlmnt1_g_tb6"  maxlength="6" value="<?php echo $tot_chldns_adgrd1_g; ?>" style="display: none;">
                                                                      <center><p id="girls6"><?php echo $tot_chldns_adgrd1_g; ?></p></center>
                                                                    </td>
                                                                     <td>
                                                                      <input type="text" class="form-control" name="enrlmnt1_g_tb7" id="enrlmnt1_g_tb7" maxlength="6" value="<?php echo $tot_grd1_smeschl_g; ?>" style="display: none;">
                                                                      <center><p id="girls7"><?php echo $tot_grd1_smeschl_g; ?></p></center>
                                                                    </td>
                                                                     <td>
                                                                      <input type="text" class="form-control" name="enrlmnt1_g_tb8" id="enrlmnt1_g_tb8" maxlength="6" value="<?php echo $tot_grd1_anthrschl_g; ?>" style="display: none;">
                                                                      <center><p id="girls8"><?php echo $tot_grd1_anthrschl_g; ?></p></center>
                                                                    </td>
                                                                     <td>
                                                                      <input type="text" class="form-control" name="enrlmnt1_g_tb9" id="enrlmnt1_g_tb9" maxlength="6" value="<?php echo $tot_grd1_ecce_g; ?>" style="display: none;">
                                                                      <center><p id="girls9"><?php echo $tot_grd1_ecce_g; ?></p></center>
                                                                    </td>
                                                                   </tr>
                                                                </tbody>
                                                            </table>
                                                          </div>
                                                          <!-- scrollable table ending -->
                                                          <div class="row">
                                                              <center><input type="submit" value="Submit" class="btn green" name=""></center>
                                                          </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div> 
                                          </div>


                                    



                                          <div class="row">
                                       <div class="col-md-12">
                                                    <div class="portlet light ">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <i class="icon-settings font-dark"></i>
                                                                <span class="caption-subject font-dark bold uppercase">Enrolment by grade in the current academic session</span> <small>(By Age in completed years)</small>
                                                                <br>
                                                                <h6>Note: <font style="color: red;">Total students (classwise) should match with class wise enrolment block E of DCF</font></h6>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="portlet-body">

                                                          <!-- error reporting start -->
                                                       <?php if ($this->session->flashdata('enrolment2')){ ?> 
                                                <!-- BEGIN PAGE CONTENT INNER -->
                                                   <div class="page-content-inner">
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="note note-danger note-bordered">
                                                               <?php echo $this->session->flashdata('enrolment2'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <!-- END PAGE CONTENT INNER -->
                                             <?php } ?>
                                             <!-- error reporting End -->

                                                          <!-- table-scrollable -->
                                                          <div class="table-scrollable">
                                                            <form method="post" action="<?php echo base_url().'Udise_enrolment/enrolmnt1frm3' ?>" id="enrolmnt1frm3">
                                                            <table data-toggle="table" data-height="299" class="table table-responsive table-bordered table-striped">
                                                            
                                                              <tr>
                                                                <td colspan="2">
                                                                  <b>Please Select the Age</b>
                                                                </td>
                                                                <td colspan="2">
                                                                  <select class="form-control" name="myage"  id="myage">
                                                                    <option selected="selected">Select the Age</option>
                                                                    <option value="blw5">&lt;5</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                    <option value="11">11</option>
                                                                    <option value="12">12</option>
                                                                    <option value="13">13</option>
                                                                    <option value="14">14</option>
                                                                    <option value="15">15</option>
                                                                    <option value="16">16</option>
                                                                    <option value="17">17</option>
                                                                    <option value="18">18</option>
                                                                    <option value="19">19</option>
                                                                    <option value="20">20</option>
                                                                    <option value="21">21</option>
                                                                    <option value="22">22</option>
                                                                    <option value="gt22">&gt;22</option>
                                                                  </select>
                                                                </td>
                                                                <td colspan="22">
                                                                  
                                                                </td>
                                                              </tr>
                                                              <!-- age less than5 -->
                                                              <tr id="ld5rw1">
                                                                <th colspan="2">Class</th>
                                                                <th colspan="24">I</th>
                                                              </tr>
                                                              <tr  id="ld5rw2">
                                                                <th>Age</th>
                                                                <th>&lt; 5</th>
                                                                <th>Boys</th>
                                                                <th>Girls</th>
                                                              </tr>
                                                              <tr  id="ld5rw3">
                                                                <td colspan="2">
                                                                  
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="lt5tb1" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="lt5tb2" class="form-control" maxlength="5">
                                                                </td>
                                                              </tr>
                                                              <tr id="ld5rw4">
                                                                <td colspan="22">
                                                                  <center>
                                                                    <input type="submit" value="Submit" class="btn green">
                                                                  </center>
                                                                </td>
                                                              </tr>
                                                              <!-- age less than5 Ending-->

                                                              <!-- age 5 -->
                                                              <tr id="age5rw1">
                                                                <th colspan="2">Class</th>
                                                                <th colspan="2">I</th>
                                                                <th colspan="22">II</th>
                                                              </tr>
                                                              <tr  id="age5rw2">
                                                                <th>Age</th>
                                                                <th>5</th>
                                                                <th>Boys</th>
                                                                <th>Girls</th>

                                                                <th>Boys</th>
                                                                <th>Girls</th>

                                                              </tr>
                                                              <tr  id="age5rw3">
                                                                <td colspan="2">
                                                                  
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag5tb1" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag5tb2" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag5tb3" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag5tb4" class="form-control" maxlength="5">
                                                                </td>
                                                              </tr>
                                                              <tr id="age5rw4">
                                                                <td colspan="22">
                                                                  <center>
                                                                    <input type="submit" value="Submit" class="btn green">
                                                                  </center>
                                                                </td>
                                                              </tr>
                                                              <!-- age 5 Ending-->

                                                              <!-- age 6 -->
                                                              <tr id="age6rw1">
                                                                <th colspan="2">Class</th>
                                                                <th colspan="2">I</th>
                                                                <th colspan="22">II</th>
                                                              </tr>
                                                              <tr  id="age6rw2">
                                                                <th>Age</th>
                                                                <th>6</th>
                                                                <th>Boys</th>
                                                                <th>Girls</th>

                                                                <th>Boys</th>
                                                                <th>Girls</th>

                                                              </tr>
                                                              <tr  id="age6rw3">
                                                                <td colspan="2">
                                                                  
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag6tb1" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag6tb2" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag6tb3" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag6tb4" class="form-control" maxlength="5">
                                                                </td>
                                                              </tr>
                                                              <tr id="age6rw4">
                                                                <td colspan="22">
                                                                  <center>
                                                                    <input type="submit" name="ld6submt" value="Submit" class="btn green">
                                                                  </center>
                                                                </td>
                                                              </tr>
                                                              <!-- age 6 Ending-->

                                                              <!-- age 7 -->
                                                              <tr id="age7rw1">
                                                                <th colspan="2">Class</th>
                                                                <th colspan="2">I</th>
                                                                <th colspan="2">II</th>
                                                                <th colspan="20">III</th>
                                                              </tr>
                                                              <tr  id="age7rw2">
                                                                <th>Age</th>
                                                                <th>7</th>
                                                                <th>Boys</th>
                                                                <th>Girls</th>

                                                                <th>Boys</th>
                                                                <th>Girls</th>

                                                                <th>Boys</th>
                                                                <th>Girls</th>

                                                              </tr>
                                                              <tr  id="age7rw3">
                                                                <td colspan="2">
                                                                </td>
                                                                <!-- set1 -->
                                                                <td>
                                                                  <input type="text" name="ag7tb1" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag7tb2" class="form-control" maxlength="5">
                                                                </td>
                                                                <!-- set Ending -->

                                                                <!-- set2 -->
                                                                <td>
                                                                  <input type="text" name="ag7tb3" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag7tb4" class="form-control" maxlength="5">
                                                                </td>
                                                                <!-- set2 Ending -->

                                                                <!-- set3 -->
                                                                <td>
                                                                  <input type="text" name="ag7tb5" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag7tb6" class="form-control" maxlength="5">
                                                                </td>
                                                                <!-- set3 ending -->
                                                              </tr>

                                                              <tr id="age7rw4">
                                                                <td colspan="22">
                                                                  <center>
                                                                    <input type="submit" name="ld7submt" value="Submit" class="btn green">
                                                                  </center>
                                                                </td>
                                                              </tr>
                                                              <!-- age 7 Ending-->

                                                              <!-- age 8 -->
                                                              <tr id="age8rw1">
                                                                <th colspan="2">Class</th>
                                                                <th colspan="2">I</th>
                                                                <th colspan="2">II</th>
                                                                <th colspan="2">III</th>
                                                                <th colspan="16">IV</th>
                                                              </tr>
                                                              <tr  id="age8rw2">
                                                                <th>Age</th>
                                                                <th>8</th>
                                                                <th>Boys</th>
                                                                <th>Girls</th>

                                                                <th>Boys</th>
                                                                <th>Girls</th>

                                                                <th>Boys</th>
                                                                <th>Girls</th>

                                                                <th>Boys</th>
                                                                <th>Girls</th>

                                                              </tr>
                                                              <tr  id="age8rw3">
                                                                <td colspan="2">
                                                                </td>
                                                                <!-- set1 -->
                                                                <td>
                                                                  <input type="text" name="ag8tb1" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag8tb2" class="form-control" maxlength="5">
                                                                </td>
                                                                <!-- set Ending -->

                                                                <!-- set2 -->
                                                                <td>
                                                                  <input type="text" name="ag8tb3" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag8tb4" class="form-control" maxlength="5">
                                                                </td>
                                                                <!-- set2 Ending -->

                                                                <!-- set3 -->
                                                                <td>
                                                                  <input type="text" name="ag8tb5" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag8tb6" class="form-control" maxlength="5">
                                                                </td>
                                                                <!-- set3 ending -->

                                                                <!-- set3 -->
                                                                <td> 
                                                                  <input type="text" name="ag8tb7" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag8tb8" class="form-control" maxlength="5">
                                                                </td>
                                                                <!-- set3 ending -->
                                                              </tr>

                                                              <tr id="age8rw4">
                                                                <td colspan="22">
                                                                  <center>
                                                                    <input type="submit" name="ld8submt" value="Submit" class="btn green">
                                                                  </center>
                                                                </td>
                                                              </tr>
                                                              <!-- age 8 Ending-->

                                                              <!-- age 9 -->
                                                              <tr id="age9rw1">
                                                                <th colspan="2">Class</th>
                                                                <th colspan="2">I</th>
                                                                <th colspan="2">II</th>
                                                                <th colspan="2">III</th>
                                                                <th colspan="2">IV</th>
                                                                <th colspan="14">V</th>
                                                              </tr>
                                                              <tr  id="age9rw2">
                                                                <th>Age</th>
                                                                <th>9</th>
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
                                                              <tr  id="age9rw3">
                                                                <td colspan="2">
                                                                </td>
                                                                <!-- set1 -->
                                                                <td>
                                                                  <input type="text" name="ag9tb1" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag9tb2" class="form-control" maxlength="5">
                                                                </td>
                                                                <!-- set Ending -->

                                                                <!-- set2 -->
                                                                <td>
                                                                  <input type="text" name="ag9tb3" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag9tb4" class="form-control" maxlength="5">
                                                                </td>
                                                                <!-- set2 Ending -->

                                                                <!-- set3 -->
                                                                <td>
                                                                  <input type="text" name="ag9tb5" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag9tb6" class="form-control" maxlength="5">
                                                                </td>
                                                                <!-- set3 ending -->

                                                                <!-- set4 -->
                                                                <td> 
                                                                  <input type="text" name="ag9tb7" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag9tb8" class="form-control" maxlength="5">
                                                                </td>
                                                                <!-- set4 ending -->

                                                                <!-- set5 -->
                                                                <td> 
                                                                  <input type="text" name="ag9tb9" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag9tb10" class="form-control" maxlength="5">
                                                                </td>
                                                                <!-- set5 ending -->
                                                              </tr>

                                                              <tr id="age9rw4">
                                                                <td colspan="22">
                                                                  <center>
                                                                    <input type="submit" name="ld9submt" value="Submit" class="btn green">
                                                                  </center>
                                                                </td>
                                                              </tr>
                                                              <!-- age 9 Ending-->


                                                               <!-- age 10 -->
                                                              <tr id="age10rw1">
                                                                <th>Age</th>
                                                                <th>10</th>
                                                              </tr>

                                                             
                                                              <tr id="age10rw2">
                                                                
                                                                <th colspan="2">I</th>
                                                                <th colspan="2">II</th>
                                                                <th colspan="2">III</th>
                                                                <th colspan="2">IV</th>
                                                                <th colspan="2">V</th>
                                                                <th colspan="10">VI</th>
                                                              </tr>
                                                              <tr  id="age10rw3">
                                                                
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
                                                              <tr  id="age10rw4">
                                                                
                                                                <!-- set1 -->
                                                                <td>
                                                                  <input type="text" name="ag10tb1" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag10tb2" class="form-control" maxlength="5">
                                                                </td>
                                                                <!-- set Ending -->

                                                                <!-- set2 -->
                                                                <td>
                                                                  <input type="text" name="ag10tb3" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag10tb4" class="form-control" maxlength="5">
                                                                </td>
                                                                <!-- set2 Ending -->

                                                                <!-- set3 -->
                                                                <td>
                                                                  <input type="text" name="ag10tb5" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag10tb6" class="form-control" maxlength="5">
                                                                </td>
                                                                <!-- set3 ending -->

                                                                <!-- set4 -->
                                                                <td> 
                                                                  <input type="text" name="ag10tb7" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag10tb8" class="form-control" maxlength="5">
                                                                </td>
                                                                <!-- set4 ending -->

                                                                <!-- set5 -->
                                                                <td> 
                                                                  <input type="text" name="ag10tb9" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag10tb10" class="form-control" maxlength="5">
                                                                </td>
                                                                <!-- set5 ending -->

                                                                <!-- set6 -->
                                                                <td> 
                                                                  <input type="text" name="ag10tb11" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag10tb12" class="form-control" maxlength="5">
                                                                </td>
                                                                <!-- set6 ending -->
                                                              </tr>

                                                              <tr id="age10rw5">
                                                                <td colspan="22">
                                                                  <center>
                                                                    <input type="submit" name="ld10submt" value="Submit" class="btn green">
                                                                  </center>
                                                                </td>
                                                              </tr>
                                                              <!-- age 10 Ending-->


                                                              <!-- age 11 -->

                                                              <tr id="age11rw1">
                                                                <th>Age</th>
                                                                <th>11</th>
                                                              </tr>

                                                              <tr id="age11rw2">
                                                                
                                                                <th colspan="2">I</th>
                                                                <th colspan="2">II</th>
                                                                <th colspan="2">III</th>
                                                                <th colspan="2">IV</th>
                                                                <th colspan="2">V</th>
                                                                <th colspan="2">VI</th>
                                                                <th colspan="8">VII</th>
                                                              </tr>
                                                              <tr  id="age11rw3">
                                                                
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
                                                              <tr  id="age11rw4">
                                                                
                                                                <!-- set1 -->
                                                                <td>
                                                                  <input type="text" name="ag11tb1" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag11tb2" class="form-control" maxlength="5">
                                                                </td>
                                                                <!-- set Ending -->

                                                                <!-- set2 -->
                                                                <td>
                                                                  <input type="text" name="ag11tb3" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag11tb4" class="form-control" maxlength="5">
                                                                </td>
                                                                <!-- set2 Ending -->

                                                                <!-- set3 -->
                                                                <td>
                                                                  <input type="text" name="ag11tb5" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag11tb6" class="form-control" maxlength="5">
                                                                </td>
                                                                <!-- set3 ending -->

                                                                <!-- set4 -->
                                                                <td> 
                                                                  <input type="text" name="ag11tb7" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag11tb8" class="form-control" maxlength="5">
                                                                </td>
                                                                <!-- set4 ending -->

                                                                <!-- set5 -->
                                                                <td> 
                                                                  <input type="text" name="ag11tb9" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag11tb10" class="form-control" maxlength="5">
                                                                </td>
                                                                <!-- set5 ending -->

                                                                <!-- set6 -->
                                                                <td> 
                                                                  <input type="text" name="ag11tb11" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag11tb12" class="form-control" maxlength="5">
                                                                </td>
                                                                <!-- set6 ending -->

                                                                <!-- set7 -->
                                                                <td> 
                                                                  <input type="text" name="ag11tb13" class="form-control" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag11tb14" class="form-control" maxlength="5">
                                                                </td>
                                                                <!-- set7 ending -->
                                                            </tr>

                                                              <tr id="age11rw5">
                                                                <td colspan="22">
                                                                  <center>
                                                                    <input type="submit" name="ld11submt" value="Submit" class="btn green">
                                                                  </center>
                                                                </td>
                                                              </tr>
                                                              <!-- age 11 Ending-->

                                                              <!-- age 12 -->

                                                              <tr id="age12rw1">
                                                                <th>Age</th>
                                                                <th>12</th>
                                                              </tr>

                                                              <tr id="age12rw2">
                                                                
                                                                <th colspan="2">I</th>
                                                                <th colspan="2">II</th>
                                                                <th colspan="2">III</th>
                                                                <th colspan="2">IV</th>
                                                                <th colspan="2">V</th>
                                                                <th colspan="2">VI</th>
                                                                <th colspan="2">VII</th>
                                                                <th colspan="2">VIII</th>
                                                                <th colspan="4">IX</th>
                                                              </tr>
                                                              <tr  id="age12rw3">
                                                                
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
                                                              <tr  id="age12rw4">
                                                                
                                                                <!-- set1 -->
                                                                <td>
                                                                  <input type="text" name="ag12tb1" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag12tb2" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set Ending -->

                                                                <!-- set2 -->
                                                                <td>
                                                                  <input type="text" name="ag12tb3" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag12tb4" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set2 Ending -->

                                                                <!-- set3 -->
                                                                <td>
                                                                  <input type="text" name="ag12tb5" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag12tb6" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set3 ending -->

                                                                <!-- set4 -->
                                                                <td> 
                                                                  <input type="text" name="ag12tb7" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag12tb8" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set4 ending -->

                                                                <!-- set5 -->
                                                                <td> 
                                                                  <input type="text" name="ag12tb9" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag12tb10" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set5 ending -->

                                                                <!-- set6 -->
                                                                <td> 
                                                                  <input type="text" name="ag12tb11" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag12tb12" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set6 ending -->

                                                                <!-- set7 -->
                                                                <td> 
                                                                  <input type="text" name="ag12tb13" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag12tb14" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set7 ending -->


                                                                <!-- set8 -->
                                                                <td> 
                                                                  <input type="text" name="ag12tb15" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag12tb16" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set8 ending -->


                                                                <!-- set9 -->
                                                                <td> 
                                                                  <input type="text" name="ag12tb17" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag12tb18" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set9 ending -->
                                                            </tr>


                                                              <tr id="age12rw5">
                                                                <td colspan="22">
                                                                  <center>
                                                                    <input type="submit" value="Submit" class="btn green">
                                                                  </center>
                                                                </td>
                                                              </tr>
                                                              <!-- age 12 Ending-->


                                                              <!-- age 13 -->

                                                              <tr id="age13rw1">
                                                                <th>Age</th>
                                                                <th>13</th>
                                                              </tr>

                                                              <tr id="age13rw2">
                                                                
                                                                <th colspan="2">II</th>
                                                                <th colspan="2">III</th>
                                                                <th colspan="2">IV</th>
                                                                <th colspan="2">V</th>
                                                                <th colspan="2">VI</th>
                                                                <th colspan="2">VII</th>
                                                                <th colspan="2">VIII</th>
                                                                <th colspan="6">IX</th>
                                                              </tr>
                                                              <tr  id="age13rw3">
                                                                
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
                                                              <tr  id="age13rw4">
                                                                
                                                                <!-- set1 -->
                                                                <td>
                                                                  <input type="text" name="ag13tb1" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag13tb2" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set Ending -->

                                                                <!-- set2 -->
                                                                <td>
                                                                  <input type="text" name="ag13tb3" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag13tb4" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set2 Ending -->

                                                                <!-- set3 -->
                                                                <td>
                                                                  <input type="text" name="ag13tb5" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag13tb6" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set3 ending -->

                                                                <!-- set4 -->
                                                                <td> 
                                                                  <input type="text" name="ag13tb7" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag13tb8" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set4 ending -->

                                                                <!-- set5 -->
                                                                <td> 
                                                                  <input type="text" name="ag13tb9" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag13tb10" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set5 ending -->

                                                                <!-- set6 -->
                                                                <td> 
                                                                  <input type="text" name="ag13tb11" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag13tb12" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set6 ending -->

                                                                <!-- set7 -->
                                                                <td> 
                                                                  <input type="text" name="ag13tb13" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag13tb14" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set7 ending -->


                                                                <!-- set8 -->
                                                                <td> 
                                                                  <input type="text" name="ag13tb15" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag13tb16" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set8 ending -->
                                                            </tr>    

                                                              <tr id="age13rw5">
                                                                <td colspan="22">
                                                                  <center>
                                                                    <input type="submit" name="ld13submt" value="Submit" class="btn green">
                                                                  </center>
                                                                </td>
                                                              </tr>
                                                              <!-- age 13 Ending-->


                                                              <!-- age 14 -->

                                                              <tr id="age14rw1">
                                                                <th>Age</th>
                                                                <th>14</th>
                                                              </tr>

                                                              <tr id="age14rw2">
                                                                
                                                                <th colspan="2">III</th>
                                                                <th colspan="2">IV</th>
                                                                <th colspan="2">V</th>
                                                                <th colspan="2">VI</th>
                                                                <th colspan="2">VII</th>
                                                                <th colspan="2">VIII</th>
                                                                <th colspan="2">IX</th>
                                                                <th colspan="2">X</th>
                                                                <th colspan="2">XI</th>
                                                              </tr>
                                                              <tr  id="age14rw3">
                                                                
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
                                                              <tr  id="age14rw4">
                                                                
                                                                <!-- set1 -->
                                                                <td>
                                                                  <input type="text" name="ag14tb1" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag14tb2" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set Ending -->

                                                                <!-- set2 -->
                                                                <td>
                                                                  <input type="text" name="ag14tb3" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag14tb4" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set2 Ending -->

                                                                <!-- set3 -->
                                                                <td>
                                                                  <input type="text" name="ag14tb5" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag14tb6" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set3 ending -->

                                                                <!-- set4 -->
                                                                <td> 
                                                                  <input type="text" name="ag14tb7" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag14tb8" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set4 ending -->

                                                                <!-- set5 -->
                                                                <td> 
                                                                  <input type="text" name="ag14tb9" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag14tb10" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set5 ending -->

                                                                <!-- set6 -->
                                                                <td> 
                                                                  <input type="text" name="ag14tb11" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag14tb12" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set6 ending -->

                                                                <!-- set7 -->
                                                                <td> 
                                                                  <input type="text" name="ag14tb13" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag14tb14" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set7 ending -->


                                                                <!-- set8 -->
                                                                <td> 
                                                                  <input type="text" name="ag14tb15" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag14tb16" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set8 ending -->


                                                                <!-- set9 -->
                                                                <td> 
                                                                  <input type="text" name="ag14tb17" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag14tb18" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set9 ending -->


                                                            </tr>    

                                                              <tr id="age14rw5">
                                                                <td colspan="22">
                                                                  <center>
                                                                    <input type="submit" name="ld14submt" value="Submit" class="btn green">
                                                                  </center>
                                                                </td>
                                                              </tr>
                                                              <!-- age 14 Ending-->


                                                              <!-- age 15 -->

                                                              <tr id="age15rw1">
                                                                <th>Age</th>
                                                                <th>15</th>
                                                              </tr>

                                                              <tr id="age15rw2">
                                                                
                                                                <th colspan="2">III</th>
                                                                <th colspan="2">IV</th>
                                                                <th colspan="2">V</th>
                                                                <th colspan="2">VI</th>
                                                                <th colspan="2">VII</th>
                                                                <th colspan="2">VIII</th>
                                                                <th colspan="2">IX</th>
                                                                <th colspan="2">X</th>
                                                                <th colspan="2">XI</th>
                                                                <th colspan="2">XII</th>
                                                              </tr>
                                                              <tr  id="age15rw3">
                                                                
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
                                                              <tr  id="age15rw4">
                                                                
                                                                <!-- set1 -->
                                                                <td>
                                                                  <input type="text" name="ag15tb1" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag15tb2" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set Ending -->

                                                                <!-- set2 -->
                                                                <td>
                                                                  <input type="text" name="ag15tb3" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag15tb4" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set2 Ending -->

                                                                <!-- set3 -->
                                                                <td>
                                                                  <input type="text" name="ag15tb5" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag15tb6" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set3 ending -->

                                                                <!-- set4 -->
                                                                <td> 
                                                                  <input type="text" name="ag15tb7" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag15tb8" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set4 ending -->

                                                                <!-- set5 -->
                                                                <td> 
                                                                  <input type="text" name="ag15tb9" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag15tb10" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set5 ending -->

                                                                <!-- set6 -->
                                                                <td> 
                                                                  <input type="text" name="ag15tb11" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag15tb12" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set6 ending -->

                                                                <!-- set7 -->
                                                                <td> 
                                                                  <input type="text" name="ag15tb13" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag15tb14" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set7 ending -->


                                                                <!-- set8 -->
                                                                <td> 
                                                                  <input type="text" name="ag15tb15" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag15tb16" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set8 ending -->


                                                                <!-- set9 -->
                                                                <td> 
                                                                  <input type="text" name="ag15tb17" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag15tb18" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set9 ending -->


                                                                <!-- set10 -->
                                                                <td> 
                                                                  <input type="text" name="ag15tb19" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag15tb20" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set10 ending -->
                                                            </tr>    

                                                              <tr id="age15rw5">
                                                                <td colspan="22">
                                                                  <center>
                                                                    <input type="submit" name="ld15submt" value="Submit" class="btn green">
                                                                  </center>
                                                                </td>
                                                              </tr>
                                                              <!-- age 15 Ending-->


                                                              <!-- age 16 -->

                                                              <tr id="age16rw1">
                                                                <th>Age</th>
                                                                <th>16</th>
                                                              </tr>

                                                              <tr id="age16rw2">
                                                                
                                                                <th colspan="2">III</th>
                                                                <th colspan="2">IV</th>
                                                                <th colspan="2">V</th>
                                                                <th colspan="2">VI</th>
                                                                <th colspan="2">VII</th>
                                                                <th colspan="2">VIII</th>
                                                                <th colspan="2">IX</th>
                                                                <th colspan="2">X</th>
                                                                <th colspan="2">XI</th>
                                                                <th colspan="2">XII</th>
                                                              </tr>
                                                              <tr  id="age16rw3">
                                                                
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
                                                              <tr  id="age16rw4">
                                                                
                                                                <!-- set1 -->
                                                                <td>
                                                                  <input type="text" name="ag16tb1" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag16tb2" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set Ending -->

                                                                <!-- set2 -->
                                                                <td>
                                                                  <input type="text" name="ag16tb3" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag16tb4" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set2 Ending -->

                                                                <!-- set3 -->
                                                                <td>
                                                                  <input type="text" name="ag16tb5" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag16tb6" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set3 ending -->

                                                                <!-- set4 -->
                                                                <td> 
                                                                  <input type="text" name="ag16tb7" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag16tb8" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set4 ending -->

                                                                <!-- set5 -->
                                                                <td> 
                                                                  <input type="text" name="ag16tb9" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag16tb10" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set5 ending -->

                                                                <!-- set6 -->
                                                                <td> 
                                                                  <input type="text" name="ag16tb11" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag16tb12" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set6 ending -->

                                                                <!-- set7 -->
                                                                <td> 
                                                                  <input type="text" name="ag16tb13" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag16tb14" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set7 ending -->


                                                                <!-- set8 -->
                                                                <td> 
                                                                  <input type="text" name="ag16tb15" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag16tb16" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set8 ending -->


                                                                <!-- set9 -->
                                                                <td> 
                                                                  <input type="text" name="ag16tb17" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag16tb18" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set9 ending -->


                                                                <!-- set10 -->
                                                                <td> 
                                                                  <input type="text" name="ag16tb19" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag16tb20" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set10 ending -->
                                                            </tr>    

                                                              <tr id="age16rw5">
                                                                <td colspan="22">
                                                                  <center>
                                                                    <input type="submit" value="Submit" class="btn green">
                                                                  </center>
                                                                </td>
                                                              </tr>
                                                              <!-- age 16 Ending-->


                                                              <!-- age 17 -->

                                                              <tr id="age17rw1">
                                                                <th>Age</th>
                                                                <th>17</th>
                                                              </tr>

                                                              <tr id="age17rw2">
                                                                
                                                                <th colspan="2">III</th>
                                                                <th colspan="2">IV</th>
                                                                <th colspan="2">V</th>
                                                                <th colspan="2">VI</th>
                                                                <th colspan="2">VII</th>
                                                                <th colspan="2">VIII</th>
                                                                <th colspan="2">IX</th>
                                                                <th colspan="2">X</th>
                                                                <th colspan="2">XI</th>
                                                                <th colspan="2">XII</th>
                                                              </tr>
                                                              <tr  id="age17rw3">
                                                                
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
                                                              <tr  id="age17rw4">
                                                                
                                                                <!-- set1 -->
                                                                <td>
                                                                  <input type="text" name="ag17tb1" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag17tb2" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set Ending -->

                                                                <!-- set2 -->
                                                                <td>
                                                                  <input type="text" name="ag17tb3" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag17tb4" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set2 Ending -->

                                                                <!-- set3 -->
                                                                <td>
                                                                  <input type="text" name="ag17tb5" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag17tb6" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set3 ending -->

                                                                <!-- set4 -->
                                                                <td> 
                                                                  <input type="text" name="ag17tb7" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag17tb8" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set4 ending -->

                                                                <!-- set5 -->
                                                                <td> 
                                                                  <input type="text" name="ag17tb9" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag17tb10" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set5 ending -->

                                                                <!-- set6 -->
                                                                <td> 
                                                                  <input type="text" name="ag17tb11" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag17tb12" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set6 ending -->

                                                                <!-- set7 -->
                                                                <td> 
                                                                  <input type="text" name="ag17tb13" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag17tb14" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set7 ending -->


                                                                <!-- set8 -->
                                                                <td> 
                                                                  <input type="text" name="ag17tb15" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag17tb16" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set8 ending -->


                                                                <!-- set9 -->
                                                                <td> 
                                                                  <input type="text" name="ag17tb17" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag17tb18" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set9 ending -->


                                                                <!-- set10 -->
                                                                <td> 
                                                                  <input type="text" name="ag17tb19" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag17tb20" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set10 ending -->
                                                            </tr>    

                                                              <tr id="age17rw5">
                                                                <td colspan="22">
                                                                  <center>
                                                                    <input type="submit" value="Submit" class="btn green">
                                                                  </center>
                                                                </td>
                                                              </tr>
                                                              <!-- age 17 Ending-->


                                                              <!-- age 18 -->

                                                              <tr id="age18rw1">
                                                                <th>Age</th>
                                                                <th>18</th>
                                                              </tr>

                                                              <tr id="age18rw2">
                                                                
                                                                <th colspan="2">III</th>
                                                                <th colspan="2">IV</th>
                                                                <th colspan="2">V</th>
                                                                <th colspan="2">VI</th>
                                                                <th colspan="2">VII</th>
                                                                <th colspan="2">VIII</th>
                                                                <th colspan="2">IX</th>
                                                                <th colspan="2">X</th>
                                                                <th colspan="2">XI</th>
                                                                <th colspan="2">XII</th>
                                                              </tr>
                                                              <tr  id="age18rw3">
                                                                
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
                                                              <tr  id="age18rw4">
                                                                
                                                                <!-- set1 -->
                                                                <td>
                                                                  <input type="text" name="ag18tb1" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag18tb2" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set Ending -->

                                                                <!-- set2 -->
                                                                <td>
                                                                  <input type="text" name="ag18tb3" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag18tb4" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set2 Ending -->

                                                                <!-- set3 -->
                                                                <td>
                                                                  <input type="text" name="ag18tb5" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag18tb6" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set3 ending -->

                                                                <!-- set4 -->
                                                                <td> 
                                                                  <input type="text" name="ag18tb7" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag18tb8" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set4 ending -->

                                                                <!-- set5 -->
                                                                <td> 
                                                                  <input type="text" name="ag18tb9" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag18tb10" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set5 ending -->

                                                                <!-- set6 -->
                                                                <td> 
                                                                  <input type="text" name="ag18tb11" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag18tb12" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set6 ending -->

                                                                <!-- set7 -->
                                                                <td> 
                                                                  <input type="text" name="ag18tb13" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag18tb14" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set7 ending -->


                                                                <!-- set8 -->
                                                                <td> 
                                                                  <input type="text" name="ag18tb15" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag18tb16" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set8 ending -->


                                                                <!-- set9 -->
                                                                <td> 
                                                                  <input type="text" name="ag18tb17" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag18tb18" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set9 ending -->


                                                                <!-- set10 -->
                                                                <td> 
                                                                  <input type="text" name="ag18tb19" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag18tb20" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set10 ending -->
                                                              </tr> 

                                                              <tr id="age18rw5">
                                                                <td colspan="22">
                                                                  <center>
                                                                    <input type="submit" value="Submit" class="btn green">
                                                                  </center>
                                                                </td>
                                                              </tr>
                                                              <!-- age 18 Ending-->


                                                              <!-- age 19 -->

                                                              <tr id="age19rw1">
                                                                <th>Age</th>
                                                                <th>19</th>
                                                              </tr>

                                                              <tr id="age19rw2">
                                                                
                                                                <th colspan="2">III</th>
                                                                <th colspan="2">IV</th>
                                                                <th colspan="2">V</th>
                                                                <th colspan="2">VI</th>
                                                                <th colspan="2">VII</th>
                                                                <th colspan="2">VIII</th>
                                                                <th colspan="2">IX</th>
                                                                <th colspan="2">X</th>
                                                                <th colspan="2">XI</th>
                                                                <th colspan="2">XII</th>
                                                              </tr>
                                                              <tr  id="age19rw3">
                                                                
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
                                                              <tr  id="age19rw4">
                                                                
                                                                <!-- set1 -->
                                                                <td>
                                                                  <input type="text" name="ag19tb1" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag19tb2" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set Ending -->

                                                                <!-- set2 -->
                                                                <td>
                                                                  <input type="text" name="ag19tb3" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag19tb4" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set2 Ending -->

                                                                <!-- set3 -->
                                                                <td>
                                                                  <input type="text" name="ag19tb5" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag19tb6" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set3 ending -->

                                                                <!-- set4 -->
                                                                <td> 
                                                                  <input type="text" name="ag19tb7" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag19tb8" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set4 ending -->

                                                                <!-- set5 -->
                                                                <td> 
                                                                  <input type="text" name="ag19tb9" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag19tb10" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set5 ending -->

                                                                <!-- set6 -->
                                                                <td> 
                                                                  <input type="text" name="ag19tb11" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag19tb12" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set6 ending -->

                                                                <!-- set7 -->
                                                                <td> 
                                                                  <input type="text" name="ag19tb13" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag19tb14" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set7 ending -->


                                                                <!-- set8 -->
                                                                <td> 
                                                                  <input type="text" name="ag19tb15" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag19tb16" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set8 ending -->


                                                                <!-- set9 -->
                                                                <td> 
                                                                  <input type="text" name="ag19tb17" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag19tb18" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set9 ending -->


                                                                <!-- set10 -->
                                                                <td> 
                                                                  <input type="text" name="ag19tb19" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag19tb20" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set10 ending -->
                                                            </tr>    

                                                              <tr id="age19rw5">
                                                                <td colspan="22">
                                                                  <center>
                                                                    <input type="submit" value="Submit" class="btn green">
                                                                  </center>
                                                                </td>
                                                              </tr>
                                                              <!-- age 19 Ending-->

                                                              <!-- age 20 -->
                                                              <tr id="age20rw1">
                                                                <th>Age</th>
                                                                <th>20</th>
                                                              </tr>

                                                              <tr id="age20rw2">
                                                                
                                                                <th colspan="2">III</th>
                                                                <th colspan="2">IV</th>
                                                                <th colspan="2">V</th>
                                                                <th colspan="2">VI</th>
                                                                <th colspan="2">VII</th>
                                                                <th colspan="2">VIII</th>
                                                                <th colspan="2">IX</th>
                                                                <th colspan="2">X</th>
                                                                <th colspan="2">XI</th>
                                                                <th colspan="2">XII</th>
                                                              </tr>
                                                              <tr  id="age20rw3">
                                                                
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
                                                              <tr  id="age20rw4">
                                                                
                                                                <!-- set1 -->
                                                                <td>
                                                                  <input type="text" name="ag20tb1" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag20tb2" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set Ending -->

                                                                <!-- set2 -->
                                                                <td>
                                                                  <input type="text" name="ag20tb3" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag20tb4" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set2 Ending -->

                                                                <!-- set3 -->
                                                                <td>
                                                                  <input type="text" name="ag20tb5" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag20tb6" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set3 ending -->

                                                                <!-- set4 -->
                                                                <td> 
                                                                  <input type="text" name="ag20tb7" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag20tb8" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set4 ending -->

                                                                <!-- set5 -->
                                                                <td> 
                                                                  <input type="text" name="ag20tb9" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag20tb10" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set5 ending -->

                                                                <!-- set6 -->
                                                                <td> 
                                                                  <input type="text" name="ag20tb11" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag20tb12" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set6 ending -->

                                                                <!-- set7 -->
                                                                <td> 
                                                                  <input type="text" name="ag20tb13" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag20tb14" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set7 ending -->


                                                                <!-- set8 -->
                                                                <td> 
                                                                  <input type="text" name="ag20tb15" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag20tb16" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set8 ending -->


                                                                <!-- set9 -->
                                                                <td> 
                                                                  <input type="text" name="ag20tb17" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag20tb18" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set9 ending -->


                                                                <!-- set10 -->
                                                                <td> 
                                                                  <input type="text" name="ag20tb19" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag20tb20" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set10 ending -->
                                                            </tr>    

                                                              <tr id="age20rw5">
                                                                <td colspan="22">
                                                                  <center>
                                                                    <input type="submit" name="ld20submt" value="Submit" class="btn green">
                                                                  </center>
                                                                </td>
                                                              </tr>
                                                              <!-- age 20 Ending-->


                                                              <!-- age 21 -->
                                                              <tr id="age21rw1">
                                                                <th>Age</th>
                                                                <th>21</th>
                                                              </tr>

                                                              <tr id="age21rw2">
                                                                
                                                                <th colspan="2">III</th>
                                                                <th colspan="2">IV</th>
                                                                <th colspan="2">V</th>
                                                                <th colspan="2">VI</th>
                                                                <th colspan="2">VII</th>
                                                                <th colspan="2">VIII</th>
                                                                <th colspan="2">IX</th>
                                                                <th colspan="2">X</th>
                                                                <th colspan="2">XI</th>
                                                                <th colspan="2">XII</th>
                                                              </tr>
                                                              <tr  id="age21rw3">
                                                                
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
                                                              <tr  id="age21rw4">
                                                                
                                                                <!-- set1 -->
                                                                <td>
                                                                  <input type="text" name="ag21tb1" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag21tb2" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set Ending -->

                                                                <!-- set2 -->
                                                                <td>
                                                                  <input type="text" name="ag21tb3" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag21tb4" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set2 Ending -->

                                                                <!-- set3 -->
                                                                <td>
                                                                  <input type="text" name="ag21tb5" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag21tb6" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set3 ending -->

                                                                <!-- set4 -->
                                                                <td> 
                                                                  <input type="text" name="ag21tb7" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag21tb8" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set4 ending -->

                                                                <!-- set5 -->
                                                                <td> 
                                                                  <input type="text" name="ag21tb9" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag21tb10" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set5 ending -->

                                                                <!-- set6 -->
                                                                <td> 
                                                                  <input type="text" name="ag21tb11" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag21tb12" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set6 ending -->

                                                                <!-- set7 -->
                                                                <td> 
                                                                  <input type="text" name="ag21tb13" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag21tb14" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set7 ending -->


                                                                <!-- set8 -->
                                                                <td> 
                                                                  <input type="text" name="ag21tb15" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag21tb16" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set8 ending -->


                                                                <!-- set9 -->
                                                                <td> 
                                                                  <input type="text" name="ag21tb17" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag21tb18" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set9 ending -->


                                                                <!-- set10 -->
                                                                <td> 
                                                                  <input type="text" name="ag21tb19" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag21tb20" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set10 ending -->
                                                            </tr>    

                                                              <tr id="age21rw5">
                                                                <td colspan="22">
                                                                  <center>
                                                                    <input type="submit" name="ld21submt" value="Submit" class="btn green">
                                                                  </center>
                                                                </td>
                                                              </tr>
                                                              <!-- age 21 Ending-->


                                                              <!-- age 22 -->
                                                              <tr id="age22rw1">
                                                                <th>Age</th>
                                                                <th>22</th>
                                                              </tr>

                                                              <tr id="age22rw2">
                                                                
                                                                <th colspan="2">III</th>
                                                                <th colspan="2">IV</th>
                                                                <th colspan="2">V</th>
                                                                <th colspan="2">VI</th>
                                                                <th colspan="2">VII</th>
                                                                <th colspan="2">VIII</th>
                                                                <th colspan="2">IX</th>
                                                                <th colspan="2">X</th>
                                                                <th colspan="2">XI</th>
                                                                <th colspan="2">XII</th>
                                                              </tr>
                                                              <tr  id="age22rw3">
                                                                
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
                                                              <tr  id="age22rw4">
                                                                
                                                                <!-- set1 -->
                                                                <td>
                                                                  <input type="text" name="ag22tb1" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag22tb2" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set Ending -->

                                                                <!-- set2 -->
                                                                <td>
                                                                  <input type="text" name="ag22tb3" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag22tb4" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set2 Ending -->

                                                                <!-- set3 -->
                                                                <td>
                                                                  <input type="text" name="ag22tb5" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag22tb6" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set3 ending -->

                                                                <!-- set4 -->
                                                                <td> 
                                                                  <input type="text" name="ag22tb7" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag22tb8" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set4 ending -->

                                                                <!-- set5 -->
                                                                <td> 
                                                                  <input type="text" name="ag22tb9" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag22tb10" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set5 ending -->

                                                                <!-- set6 -->
                                                                <td> 
                                                                  <input type="text" name="ag22tb11" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag22tb12" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set6 ending -->

                                                                <!-- set7 -->
                                                                <td> 
                                                                  <input type="text" name="ag22tb13" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag22tb14" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set7 ending -->


                                                                <!-- set8 -->
                                                                <td> 
                                                                  <input type="text" name="ag22tb15" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag22tb16" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set8 ending -->


                                                                <!-- set9 -->
                                                                <td> 
                                                                  <input type="text" name="ag22tb17" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag22tb18" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set9 ending -->


                                                                <!-- set10 -->
                                                                <td> 
                                                                  <input type="text" name="ag22tb19" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="ag22tb20" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set10 ending -->
                                                            </tr>    

                                                              <tr id="age22rw5">
                                                                <td colspan="22">
                                                                  <center>
                                                                    <input type="submit" name="ld22submt" value="Submit" class="btn green">
                                                                  </center>
                                                                </td>
                                                              </tr>
                                                              <!-- age 22 Ending-->

                                                              <!-- age 22 -->
                                                              <tr id="gt22rw1">
                                                                <th>Age</th>
                                                                <th>&gt;22</th>
                                                              </tr>

                                                              <tr id="gt22rw2">
                                                                
                                                                <th colspan="2">III</th>
                                                                <th colspan="2">IV</th>
                                                                <th colspan="2">V</th>
                                                                <th colspan="2">VI</th>
                                                                <th colspan="2">VII</th>
                                                                <th colspan="2">VIII</th>
                                                                <th colspan="2">IX</th>
                                                                <th colspan="2">X</th>
                                                                <th colspan="2">XI</th>
                                                                <th colspan="2">XII</th>
                                                              </tr>
                                                              <tr  id="gt22rw3">
                                                                
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
                                                              <tr  id="gt22rw4">
                                                                
                                                                <!-- set1 -->
                                                                <td>
                                                                  <input type="text" name="gt22tb1" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="gt22tb2" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set Ending -->

                                                                <!-- set2 -->
                                                                <td>
                                                                  <input type="text" name="gt22tb3" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="gt22tb4" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set2 Ending -->

                                                                <!-- set3 -->
                                                                <td>
                                                                  <input type="text" name="gt22tb5" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="gt22tb6" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set3 ending -->

                                                                <!-- set4 -->
                                                                <td> 
                                                                  <input type="text" name="gt22tb7" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="gt22tb8" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set4 ending -->

                                                                <!-- set5 -->
                                                                <td> 
                                                                  <input type="text" name="gt22tb9" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="gt22tb10" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set5 ending -->

                                                                <!-- set6 -->
                                                                <td> 
                                                                  <input type="text" name="gt22tb11" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="gt22tb12" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set6 ending -->

                                                                <!-- set7 -->
                                                                <td> 
                                                                  <input type="text" name="gt22tb13" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="gt22tb14" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set7 ending -->


                                                                <!-- set8 -->
                                                                <td> 
                                                                  <input type="text" name="gt22tb15" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="gt22tb16" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set8 ending -->


                                                                <!-- set9 -->
                                                                <td> 
                                                                  <input type="text" name="gt22tb17" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="gt22tb18" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set9 ending -->


                                                                <!-- set10 -->
                                                                <td> 
                                                                  <input type="text" name="gt22tb19" class="form-control space" maxlength="5">
                                                                </td>
                                                                <td>
                                                                  <input type="text" name="gt22tb20" class="form-control space" maxlength="5">
                                                                </td>
                                                                <!-- set10 ending -->
                                                            </tr>

                                                              <tr id="gt22rw5">
                                                                <td colspan="22">
                                                                  <center>
                                                                    <input type="submit" name="ld22submt" value="Submit" class="btn green">
                                                                  </center>
                                                                </td>
                                                              </tr>
                                                              <!-- age 22 Ending-->


                                                            </tr>

                                                            </table>
                                                          </form>
                                                          </div>
                                                          <!-- table scrollable ending -->
                                                          <div class="table-scrollable">
                                                            <table data-toggle="table" data-height="299" class="table table-responsive table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Class</th>
                                                                        <th colspan="2">I</th>
                                                                        <th colspan="2">II</th>
                                                                        <th colspan="2">III</th>
                                                                        <th colspan="2">IV</th>
                                                                        <th colspan="2">V</th>
                                                                        <th colspan="2">VI</th>
                                                                        <th colspan="2">VII</th>
                                                                        <th colspan="2">VIII</th>
                                                                        <th colspan="2">IX</th>
                                                                        <th colspan="2">X</th>
                                                                        <th colspan="2">XI</th>
                                                                        <th colspan="2">XII</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Age</th>
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
                                                                        <th>Boys</th>
                                                                        <th>Girls</th>
                                                                        <th>Boys</th>
                                                                        <th>Girls</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                        <tr>
                                                                            <td>&lt; 5</td>
                                                                            <td><div class="values"><?php echo $blw5_i_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $blw5_i_g; ?></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>5</td>
                                                                            <td><div class="values"><?php echo $ag5_i_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag5_i_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag5_ii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag5_ii_g; ?></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>6</td>
                                                                            <td><div class="values"><?php echo $ag6_i_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag6_i_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag6_ii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag6_ii_g; ?></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>7</td>
                                                                            <td><div class="values"><?php echo $ag7_i_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag7_i_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag7_ii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag7_ii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag7_iii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag7_iii_g; ?></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>8</td>
                                                                            <td><div class="values"><?php echo $ag8_i_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag8_i_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag8_ii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag8_ii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag8_iii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag8_iii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag8_iv_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag8_iv_g; ?></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>9</td>
                                                                            <td><div class="values"><?php echo $ag9_i_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag9_i_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag9_ii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag9_ii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag9_iii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag9_iii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag9_iv_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag9_iv_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag9_v_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag9_v_g; ?></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>10</td>
                                                                            <td><div class="values"><?php echo $ag10_i_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag10_i_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag10_ii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag10_ii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag10_iii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag10_iii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag10_iv_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag10_iv_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag10_v_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag10_v_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag10_vi_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag10_vi_g; ?></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>11</td>
                                                                            <td><div class="values"><?php echo $ag11_i_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag11_i_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag11_ii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag11_ii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag11_iii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag11_iii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag11_iv_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag11_iv_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag11_v_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag11_v_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag11_vi_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag11_vi_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag11_vii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag11_vii_g; ?></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>12</td>
                                                                            <td><div class="values"><?php echo $ag12_i_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag12_i_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag12_ii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag12_ii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag12_iii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag12_iii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag12_iv_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag12_iv_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag12_v_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag12_v_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag12_vi_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag12_vi_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag12_vii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag12_vii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag12_viii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag12_viii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag12_ix_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag12_ix_g; ?></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>13</td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="values"><?php echo $ag13_ii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag13_ii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag13_iii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag13_iii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag13_iv_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag13_iv_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag13_v_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag13_v_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag13_vi_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag13_vi_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag13_vii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag13_vii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag13_viii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag13_viii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag13_ix_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag13_ix_g; ?></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>14</td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="values"><?php echo $ag14_iii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag14_iii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag14_iv_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag14_iv_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag14_v_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag14_v_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag14_vi_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag14_vi_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag14_vii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag14_vii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag14_viii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag14_viii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag14_ix_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag14_ix_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag14_x_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag14_x_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag14_xi_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag14_xi_g; ?></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>15</td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="values"><?php echo $ag15_iii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag15_iii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag15_iv_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag15_iv_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag15_v_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag15_v_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag15_vi_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag15_vi_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag15_vii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag15_vii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag15_viii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag15_viii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag15_ix_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag15_ix_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag15_x_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag15_x_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag15_xi_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag15_xi_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag15_xii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag15_xii_g; ?></div></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>16</td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="values"><?php echo $ag16_iii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag16_iii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag16_iv_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag16_iv_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag16_v_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag16_v_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag16_vi_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag16_vi_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag16_vii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag16_vii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag16_viii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag16_viii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag16_ix_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag16_ix_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag16_x_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag16_x_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag16_xi_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag16_xi_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag16_xii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag16_xii_g; ?></div></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>17</td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="values"><?php echo $ag17_iii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag17_iii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag17_iv_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag17_iv_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag17_v_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag17_v_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag17_vi_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag17_vi_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag17_vii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag17_vii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag17_viii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag17_viii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag17_ix_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag17_ix_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag17_x_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag17_x_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag17_xi_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag17_xi_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag17_xii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag17_xii_g; ?></div></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>18</td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="values"><?php echo $ag18_iii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag18_iii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag18_iv_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag18_iv_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag18_v_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag18_v_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag18_vi_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag18_vi_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag18_vii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag18_vii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag18_viii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag18_viii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag18_ix_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag18_ix_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag18_x_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag18_x_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag18_xi_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag18_xi_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag18_xii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag18_xii_g; ?></div></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>19</td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="values"><?php echo $ag19_iii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag19_iii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag19_iv_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag19_iv_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag19_v_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag19_v_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag19_vi_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag19_vi_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag19_vii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag19_vii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag19_viii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag19_viii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag19_ix_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag19_ix_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag19_x_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag19_x_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag19_xi_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag19_xi_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag19_xii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag19_xii_g; ?></div></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>20</td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="values"><?php echo $ag20_iii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag20_iii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag20_iv_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag20_iv_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag20_v_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag20_v_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag20_vi_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag20_vi_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag20_vii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag20_vii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag20_viii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag20_viii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag20_ix_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag20_ix_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag20_x_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag20_x_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag20_xi_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag20_xi_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag20_xii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag20_xii_g; ?></div></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>21</td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="values"><?php echo $ag21_iii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag21_iii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag21_iv_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag21_iv_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag21_v_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag21_v_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag21_vi_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag21_vi_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag21_vii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag21_vii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag21_viii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag21_viii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag21_ix_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag21_ix_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag21_x_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag21_x_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag21_xi_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag21_xi_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag21_xii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag21_xii_g; ?></div></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>22</td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="values"><?php echo $ag22_iii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag22_iii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag22_iv_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag22_iv_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag22_v_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag22_v_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag22_vi_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag22_vi_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag22_vii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag22_vii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag22_viii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag22_viii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag22_ix_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag22_ix_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag22_x_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag22_x_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag22_xi_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag22_xi_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag22_xii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $ag22_xii_g; ?></div></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>&gt;22</td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="mydivs"></div></td>
                                                                            <td><div class="values"><?php echo $gt22_iii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $gt22_iii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $gt22_iv_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $gt22_iv_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $gt22_v_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $gt22_v_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $gt22_vi_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $gt22_vi_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $gt22_vii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $gt22_vii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $gt22_viii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $gt22_viii_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $gt22_ix_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $gt22_ix_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $gt22_x_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $gt22_x_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $gt22_xi_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $gt22_xi_g; ?></div></td>
                                                                            <td><div class="values"><?php echo $gt22_xii_b; ?></div></td>
                                                                            <td><div class="values"><?php echo $gt22_xii_g; ?></div></td>
                                                                        </tr>
                                                                        <?php 
                                                                        $tot1 = (($blw5_i_b)+($ag5_i_b)+($ag6_i_b)+($ag7_i_b)+($ag8_i_b)+($ag9_i_b)+($ag10_i_b)+($ag11_i_b)+($ag12_i_b));
                                                                        $tot2 = (($blw5_i_g)+($ag5_i_g)+($ag6_i_g)+($ag7_i_g)+($ag8_i_g)+($ag9_i_g)+($ag10_i_g)+($ag11_i_g)+($ag12_i_g));
                                                                        $tot3 = (($ag5_ii_b)+($ag6_ii_b)+($ag7_ii_b)+($ag8_ii_b)+($ag9_ii_b)+($ag10_ii_b)+($ag11_ii_b)+($ag12_ii_b)+($ag13_ii_b));
                                                                        $tot4 = (($ag5_ii_g)+($ag6_ii_g)+($ag7_ii_g)+($ag8_ii_g)+($ag9_ii_g)+($ag10_ii_g)+($ag11_ii_g)+($ag12_ii_g)+($ag13_ii_g));
                                                                        $tot5 = (($ag7_iii_b)+($ag8_iii_b)+($ag9_iii_b)+($ag10_iii_b)+($ag11_iii_b)+($ag12_iii_b)+($ag13_iii_b)+($ag14_iii_b)+($ag15_iii_b)+($ag16_iii_b)+($ag17_iii_b)+($ag18_iii_b)+($ag19_iii_b)+($ag20_iii_b)+($ag21_iii_b)+($ag22_iii_b)+($gt22_iii_b));
                                                                        $tot6 = (($ag7_iii_g)+($ag8_iii_g)+($ag9_iii_g)+($ag10_iii_g)+($ag11_iii_g)+($ag12_iii_g)+($ag13_iii_g)+($ag14_iii_g)+($ag15_iii_g)+($ag16_iii_g)+($ag17_iii_g)+($ag18_iii_g)+($ag19_iii_g)+($ag20_iii_g)+($ag21_iii_g)+($ag22_iii_g)+($gt22_iii_g));
                                                                        $tot7 = (($ag8_iv_b)+($ag9_iv_b)+($ag10_iv_b)+($ag11_iv_b)+($ag12_iv_b)+($ag13_iv_b)+($ag14_iv_b)+($ag15_iv_b)+($ag16_iv_b)+($ag17_iv_b)+($ag18_iv_b)+($ag19_iv_b)+($ag20_iv_b)+($ag21_iv_b)+($ag22_iv_b)+($gt22_iv_b));
                                                                        $tot8 = (($ag8_iv_g)+($ag9_iv_g)+($ag10_iv_g)+($ag11_iv_g)+($ag12_iv_g)+($ag13_iv_g)+($ag14_iv_g)+($ag15_iv_g)+($ag16_iv_g)+($ag17_iv_g)+($ag18_iv_g)+($ag19_iv_g)+($ag20_iv_g)+($ag21_iv_g)+($ag22_iv_g)+($gt22_iv_g));

                                                                        $tot9 = (($ag9_v_b)+($ag10_v_b)+($ag11_v_b)+($ag12_v_b)+($ag13_v_b)+($ag14_v_b)+($ag15_v_b)+($ag16_v_b)+($ag17_v_b)+($ag18_v_b)+($ag19_v_b)+($ag20_v_b)+($ag21_v_b)+($ag22_v_b)+($gt22_v_b));

                                                                        $tot10 = (($ag9_v_g)+($ag10_v_g)+($ag11_v_g)+($ag12_v_g)+($ag13_v_g)+($ag14_v_g)+($ag15_v_g)+($ag16_v_g)+($ag17_v_g)+($ag18_v_g)+($ag19_v_g)+($ag20_v_g)+($ag21_v_g)+($ag22_v_g)+($gt22_v_g));
                                                                        $tot11 = (($ag10_vi_b)+($ag11_vi_b)+($ag12_vi_b)+($ag13_vi_b)+($ag14_vi_b)+($ag15_vi_b)+($ag16_vi_b)+($ag17_vi_b)+($ag18_vi_b)+($ag19_vi_b)+($ag20_vi_b)+($ag21_vi_b)+($ag22_vi_b)+($gt22_vi_b));
                                                                        $tot12 = (($ag10_vi_g)+($ag11_vi_g)+($ag12_vi_g)+($ag13_vi_g)+($ag14_vi_g)+($ag15_vi_g)+($ag16_vi_g)+($ag17_vi_g)+($ag18_vi_g)+($ag19_vi_g)+($ag20_vi_g)+($ag21_vi_g)+($ag22_vi_g)+($gt22_vi_g));

                                                                        $tot13 = (($ag11_vii_b)+($ag12_vii_b)+($ag13_vii_b)+($ag14_vii_b)+($ag15_vii_b)+($ag16_vii_b)+($ag17_vii_b)+($ag18_vii_b)+($ag19_vii_b)+($ag20_vii_b)+($ag21_vii_b)+($ag22_vii_b)+($gt22_vii_b));
                                                                        $tot14 = (($ag11_vii_g)+($ag12_vii_g)+($ag13_vii_g)+($ag14_vii_g)+($ag15_vii_g)+($ag16_vii_g)+($ag17_vii_g)+($ag18_vii_g)+($ag19_vii_g)+($ag20_vii_g)+($ag21_vii_g)+($ag22_vii_g)+($gt22_vii_g));
                                                                        $tot15 = (($ag12_viii_b)+($ag13_viii_b)+($ag14_viii_b)+($ag15_viii_b)+($ag16_viii_b)+($ag17_viii_b)+($ag18_viii_b)+($ag19_viii_b)+($ag20_viii_b)+($ag21_viii_b)+($ag22_viii_b)+($gt22_viii_b));
                                                                        $tot16 = (($ag12_viii_g)+($ag13_viii_g)+($ag14_viii_g)+($ag15_viii_g)+($ag16_viii_g)+($ag17_viii_g)+($ag18_viii_g)+($ag19_viii_g)+($ag20_viii_g)+($ag21_viii_g)+($ag22_viii_g)+($gt22_viii_g));
                                                                        $tot17 = (($ag12_ix_b)+($ag13_ix_b)+($ag14_ix_b)+($ag15_ix_b)+($ag16_ix_b)+($ag17_ix_b)+($ag18_ix_b)+($ag19_ix_b)+($ag20_ix_b)+($ag21_ix_b)+($ag22_ix_b)+($gt22_ix_b));
                                                                        $tot18 = (($ag12_ix_g)+($ag13_ix_g)+($ag14_ix_g)+($ag15_ix_g)+($ag16_ix_g)+($ag17_ix_g)+($ag18_ix_g)+($ag19_ix_g)+($ag20_ix_g)+($ag21_ix_g)+($ag22_ix_g)+($gt22_ix_g));
                                                                        $tot19 = (($ag14_x_b)+($ag15_x_b)+($ag16_x_b)+($ag17_x_b)+($ag18_x_b)+($ag19_x_b)+($ag20_x_b)+($ag21_x_b)+($ag22_x_b)+($gt22_x_b));
                                                                        $tot20 = (($ag14_x_g)+($ag15_x_g)+($ag16_x_g)+($ag17_x_g)+($ag18_x_g)+($ag19_x_g)+($ag20_x_g)+($ag21_x_g)+($ag22_x_g)+($gt22_x_g));
                                                                        $tot21 = (($ag14_xi_b)+($ag15_xi_b)+($ag16_xi_b)+($ag17_xi_b)+($ag18_xi_b)+($ag19_xi_b)+($ag20_xi_b)+($ag21_xi_b)+($ag22_xi_b)+($gt22_xi_b));
                                                                        $tot22 = (($ag14_xi_g)+($ag15_xi_g)+($ag16_xi_g)+($ag17_xi_g)+($ag18_xi_g)+($ag19_xi_g)+($ag20_xi_g)+($ag21_xi_g)+($ag22_xi_g)+($gt22_xi_g));
                                                                        $tot23 = (($ag15_xii_b)+($ag16_xii_b)+($ag17_xii_b)+($ag18_xii_b)+($ag19_xii_b)+($ag20_xii_b)+($ag21_xii_b)+($ag22_xii_b)+($gt22_xii_b));
                                                                        $tot24 = (($ag15_xii_g)+($ag16_xii_g)+($ag17_xii_g)+($ag18_xii_g)+($ag19_xii_g)+($ag20_xii_g)+($ag21_xii_g)+($ag22_xii_g)+($gt22_xii_g));

                                                                         ?>
                                                                        <tr>
                                                                            <td>Total</td>
                                                                            <td><div class="mydivs"><center><?php echo $tot1; ?></center></div></td>
                                                                            <td><div class="mydivs"><center><?php echo $tot2; ?></center></div></td>
                                                                            <td><div class="mydivs"><center><?php echo $tot3; ?></center></div></td>
                                                                            <td><div class="mydivs"><center><?php echo $tot4; ?></center></div></td>
                                                                            <td><div class="mydivs"><center><?php echo $tot5; ?></center></div></td>
                                                                            <td><div class="mydivs"><center><?php echo $tot6; ?></center></div></td>
                                                                            <td><div class="mydivs"><center><?php echo $tot7; ?></center></div></td>
                                                                            <td><div class="mydivs"><center><?php echo $tot8; ?></center></div></td>
                                                                            <td><div class="mydivs"><center><?php echo $tot9; ?></center></div></td>
                                                                            <td><div class="mydivs"><center><?php echo $tot10; ?></center></div></td>
                                                                            <td><div class="mydivs"><center><?php echo $tot11; ?></center></div></td>
                                                                            <td><div class="mydivs"><center><?php echo $tot12; ?></center></div></td>
                                                                            <td><div class="mydivs"><center><?php echo $tot13; ?></center></div></td>
                                                                            <td><div class="mydivs"><center><?php echo $tot14; ?></center></div></td>
                                                                            <td><div class="mydivs"><center><?php echo $tot15; ?></center></div></td>
                                                                            <td><div class="mydivs"><center><?php echo $tot16; ?></center></div></td>
                                                                            <td><div class="mydivs"><center><?php echo $tot17; ?></center></div></td>
                                                                            <td><div class="mydivs"><center><?php echo $tot18; ?></center></div></td>
                                                                            <td><div class="mydivs"><center><?php echo $tot19; ?></center></div></td>
                                                                            <td><div class="mydivs"><center><?php echo $tot20; ?></center></div></td>
                                                                            <td><div class="mydivs"><center><?php echo $tot21; ?></center></div></td>
                                                                            <td><div class="mydivs"><center><?php echo $tot22; ?></center></div></td>
                                                                            <td><div class="mydivs"><center><?php echo $tot23; ?></center></div></td>
                                                                            <td><div class="mydivs"><center><?php echo $tot24; ?></center></div></td>
                                                                        </tr>
                                                                </tbody>
                                                            </table>
                                                          </div>
                                                          <!-- scrollable table division -->
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
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/moment.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/jquery.mockjax.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js';?>" type="text/javascript"></script>
            <!-- Js for hide and show the tables and datas -->
            <script src="<?php echo base_url().'asset/global/plugins/jquery.validate.min.js';?>"></script>
            <script src="<?php echo base_url().'asset/global/plugins/emis2.js';?>" type="text/javascript"></script>
            <!-- Js for hide and show the tables and datas ending-->

            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <!-- END PAGE LEVEL SCRIPTS -->
            <script>
               var yesno = [];
               $.each({
                   "1": "Yes",
                   "2": "No"        
               }, function(k, v) {
                   yesno.push({
                       id: k,
                       text: v
                   });
               });
    
            </script>

           
         </body>


      </html>