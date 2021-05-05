<!DOCTYPE html>

      <html lang="en">
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
            
            <style type="text/css">
               #view{
                  display: none;
               }
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
                                                <div class="col-md-2 bg-grey mt-step-col">
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
                                                <div class="col-md-2 bg-grey mt-step-col active">
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
                                    
                                    <br>

                                    <div class="row">
                                       <div class="col-md-12">
                                                    <div class="portlet light ">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <i class="icon-settings font-dark"></i>
                                                                <span class="caption-subject font-dark bold uppercase">Enrolment Repeaters by academic stream</span><small> (By Minority groups)</small>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="portlet-body">

                                                          <!-- error reporting start -->
                                                       <?php if ($this->session->flashdata('enrolment4frm1')){ ?> 
                                                <!-- BEGIN PAGE CONTENT INNER -->
                                                   <div class="page-content-inner">
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="note note-danger note-bordered">
                                                               <?php echo $this->session->flashdata('enrolment4frm1'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <!-- END PAGE CONTENT INNER -->
                                             <?php } ?>
                                             <!-- error reporting End -->

                                                          <div class="table-scrollable">
                                                            <form id="enrolmnt4frm" method="post" action="<?php echo base_url().'Udise_enrolment/emis_school_enrolment4' ?>">
                                                              <table data-height="299" class="table table-bordered table-striped" id="">
                                                                <thead>
                                                                  <th colspan="3">Select the Stream</th>
                                                                  <th colspan="3">
                                                                    <select class="form-control" id="stream" name="stream">
                                                                        <option value="" selected="selected">Select the option</option>
                                                                        <option value="arts">Arts</option>
                                                                        <option value="science">Science</option>
                                                                        <option value="commerce">Commerce</option>
                                                                        <option value="vocational">Vocational</option>
                                                                        <option value="oth_stream">Other Stream</option>
                                                                    </select>
                                                                  </th>
                                                                  <th colspan="3">Select the Category</th>
                                                                  <th colspan="3">
                                                                    <select class="form-control" id="category" name="category">
                                                                        <option value="" selected="selected">Select the option</option>
                                                                        <option value="muslm">Muslim</option>
                                                                        <option value="christ">Christian</option>
                                                                        <option value="sikh">Sikh</option>
                                                                        <option value="budhst">Buddhist</option>
                                                                        <option value="parsi">Parsi</option>
                                                                        <option value="jain">Jain</option>
                                                                    </select>
                                                                  </th>
                                                                  <tr>
                                                                        
                                                                        <th colspan="6"><center>Enrolment</center></th>
                                                                        <th colspan="5"><center>Repeaters</center></th>
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                       <th colspan="2">ClassXI</th>
                                                                       <th colspan="4">ClassXII</th>
                                                                      
                                                                       <th colspan="2">ClassXI</th>
                                                                       <th colspan="4">ClassXII</th>
                                                                    </tr>
                                                                    <tr>
                                                                       <th>Boys</th>
                                                                       <th>Girls</th>
                                                                       <th>Boys</th>
                                                                       <th colspan="3">Girls</th>
                                                                       <th>Boys</th>
                                                                       <th>Girls</th>
                                                                       <th>Boys</th>
                                                                       <th colspan="2">Girls</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                 <tr id="view">
                                                                  <td><input type="text" class="form-control space" name="tb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control space" name="tb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control space" name="tb3" maxlength="4"></td>
                                                                  <td colspan="3"><input type="text" class="form-control space" value="" name="tb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control space" name="tb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control space" name="tb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control space" name="tb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control space" name="tb8" maxlength="4"></td>
                                                                </tr>
                                                               </tbody>
                                                              </table>
                                                          </div>
                                                          <div class="row">
                                                            <center><input type="submit" value="Submit" class="btn green"></center>
                                                          </div>
                                                        </form>
                                                          <div class="table-scrollable">
                                                            <table data-toggle="table" data-height="299" class="table table-bordered table-striped" id="enrlment_retrs_acadstrm_mingrps">
                                                                <thead>
                                                                    <tr>
                                                                        <th rowspan="3"><center>Stream</center></th>
                                                                    </tr>
                                                                    <tr>
                                                                       <th colspan="2" rowspan="2"><center>Social Category</center></th>
                                                                       <th colspan="2"><center>Enrolment(ClassXI)</center></th>
                                                                       <th colspan="2"><center>Enrolment(ClassXII)</center></th>
                                                                       <th colspan="2"><center>Repeaters(ClassXI)</center></th>
                                                                       <th colspan="2"><center>Repeaters(ClassXII)</center></th>
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
                                                                     <td rowspan="7"><br><br><br><br><center>Arts</center></td>
                                                                     
                                                                     <td colspan="2">Muslim</td>
                                                                     <td><?php echo $arts_muslm_enrol_xi_b; ?></td>
                                                                     <td><?php echo $arts_muslm_enrol_xi_g; ?></td>
                                                                     <td><?php echo $arts_muslm_enrol_xii_b; ?></td>
                                                                     <td><?php echo $arts_muslm_enrol_xii_g; ?></td>
                                                                     <td><?php echo $arts_muslm_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $arts_muslm_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $arts_muslm_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $arts_muslm_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Christian</td>
                                                                     <td><?php echo $arts_christ_enrol_xi_b; ?></td>
                                                                     <td><?php echo $arts_christ_enrol_xi_g; ?></td>
                                                                     <td><?php echo $arts_christ_enrol_xii_b; ?></td>
                                                                     <td><?php echo $arts_christ_enrol_xii_g; ?></td>
                                                                     <td><?php echo $arts_christ_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $arts_christ_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $arts_christ_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $arts_christ_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Sikh</td>
                                                                     <td><?php echo $arts_sikh_enrol_xi_b; ?></td>
                                                                     <td><?php echo $arts_sikh_enrol_xi_g; ?></td>
                                                                     <td><?php echo $arts_sikh_enrol_xii_b; ?></td>
                                                                     <td><?php echo $arts_sikh_enrol_xii_g; ?></td>
                                                                     <td><?php echo $arts_sikh_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $arts_sikh_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $arts_sikh_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $arts_sikh_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Buddhist</td>
                                                                     <td><?php echo $arts_budhst_enrol_xi_b; ?></td>
                                                                     <td><?php echo $arts_budhst_enrol_xi_g; ?></td>
                                                                     <td><?php echo $arts_budhst_enrol_xii_b; ?></td>
                                                                     <td><?php echo $arts_budhst_enrol_xii_g; ?></td>
                                                                     <td><?php echo $arts_budhst_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $arts_budhst_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $arts_budhst_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $arts_budhst_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Parsi</td>
                                                                     <td><?php echo $arts_parsi_enrol_xi_b; ?></td>
                                                                     <td><?php echo $arts_parsi_enrol_xi_g; ?></td>
                                                                     <td><?php echo $arts_parsi_enrol_xii_b; ?></td>
                                                                     <td><?php echo $arts_parsi_enrol_xii_g; ?></td>
                                                                     <td><?php echo $arts_parsi_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $arts_parsi_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $arts_parsi_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $arts_parsi_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Jain</td>
                                                                     <td><?php echo $arts_jain_enrol_xi_b; ?></td>
                                                                     <td><?php echo $arts_jain_enrol_xi_g; ?></td>
                                                                     <td><?php echo $arts_jain_enrol_xii_b; ?></td>
                                                                     <td><?php echo $arts_jain_enrol_xii_g; ?></td>
                                                                     <td><?php echo $arts_jain_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $arts_jain_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $arts_jain_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $arts_jain_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <?php 
                                                                     $tot1 = (($arts_muslm_enrol_xi_b)+($arts_christ_enrol_xi_b)+($arts_sikh_enrol_xi_b)+($arts_budhst_enrol_xi_b)+($arts_parsi_enrol_xi_b)+($arts_jain_enrol_xi_b));
                                                                     $tot2 = (($arts_muslm_enrol_xi_g)+($arts_christ_enrol_xi_g)+($arts_sikh_enrol_xi_g)+($arts_budhst_enrol_xi_g)+($arts_parsi_enrol_xi_g)+($arts_jain_enrol_xi_g));
                                                                     $tot3 = (($arts_muslm_enrol_xii_b)+($arts_christ_enrol_xii_b)+($arts_sikh_enrol_xii_b)+($arts_budhst_enrol_xii_b)+($arts_parsi_enrol_xii_b)+($arts_jain_enrol_xii_b));
                                                                     $tot4 = (($arts_muslm_enrol_xii_g)+($arts_christ_enrol_xii_g)+($arts_sikh_enrol_xii_g)+($arts_budhst_enrol_xii_g)+($arts_parsi_enrol_xii_g)+($arts_jain_enrol_xii_g));

                                                                     $tot5 = (($arts_muslm_reptrs_xi_b)+($arts_christ_reptrs_xi_b)+($arts_sikh_reptrs_xi_b)+($arts_budhst_reptrs_xi_b)+($arts_parsi_reptrs_xi_b)+($arts_jain_reptrs_xi_b));
                                                                     $tot6 = (($arts_muslm_reptrs_xi_g)+($arts_christ_reptrs_xi_g)+($arts_sikh_reptrs_xi_g)+($arts_budhst_reptrs_xi_g)+($arts_parsi_reptrs_xi_g)+($arts_jain_reptrs_xi_g));
                                                                     $tot7 = (($arts_muslm_reptrs_xii_b)+($arts_christ_reptrs_xii_b)+($arts_sikh_reptrs_xii_b)+($arts_budhst_reptrs_xii_b)+($arts_parsi_reptrs_xii_b)+($arts_jain_reptrs_xii_b));
                                                                     $tot8 = (($arts_muslm_reptrs_xii_g)+($arts_christ_reptrs_xii_g)+($arts_sikh_reptrs_xii_g)+($arts_budhst_reptrs_xii_g)+($arts_parsi_reptrs_xii_g)+($arts_jain_reptrs_xii_g));
                                                                      ?>
                                                                  <tr>
                                                                     <td colspan="2">Total</td>
                                                                     <td><?php echo $tot1; ?></td>
                                                                     <td><?php echo $tot2; ?></td>
                                                                     <td><?php echo $tot3; ?></td>
                                                                     <td><?php echo $tot4; ?></td>
                                                                     <td><?php echo $tot5; ?></td>
                                                                     <td><?php echo $tot6; ?></td>
                                                                     <td><?php echo $tot7; ?></td>
                                                                     <td><?php echo $tot8; ?></td>
                                                                  </tr>



                                                                  <tr>
                                                                     <td rowspan="7"><br><br><br><br><center>Science</center></td>
                                                                     <td colspan="2">Muslim</td>
                                                                     <td><?php echo $science_muslm_enrol_xi_b; ?></td>
                                                                     <td><?php echo $science_muslm_enrol_xi_g; ?></td>
                                                                     <td><?php echo $science_muslm_enrol_xii_b; ?></td>
                                                                     <td><?php echo $science_muslm_enrol_xii_g; ?></td>
                                                                     <td><?php echo $science_muslm_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $science_muslm_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $science_muslm_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $science_muslm_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Christian</td>
                                                                     <td><?php echo $science_christ_enrol_xi_b; ?></td>
                                                                     <td><?php echo $science_christ_enrol_xi_g; ?></td>
                                                                     <td><?php echo $science_christ_enrol_xii_b; ?></td>
                                                                     <td><?php echo $science_christ_enrol_xii_g; ?></td>
                                                                     <td><?php echo $science_christ_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $science_christ_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $science_christ_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $science_christ_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Sikh</td>
                                                                     <td><?php echo $science_sikh_enrol_xi_b; ?></td>
                                                                     <td><?php echo $science_sikh_enrol_xi_g; ?></td>
                                                                     <td><?php echo $science_sikh_enrol_xii_b; ?></td>
                                                                     <td><?php echo $science_sikh_enrol_xii_g; ?></td>
                                                                     <td><?php echo $science_sikh_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $science_sikh_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $science_sikh_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $science_sikh_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Buddhist</td>
                                                                     <td><?php echo $science_budhst_enrol_xi_b; ?></td>
                                                                     <td><?php echo $science_budhst_enrol_xi_g; ?></td>
                                                                     <td><?php echo $science_budhst_enrol_xii_b; ?></td>
                                                                     <td><?php echo $science_budhst_enrol_xii_g; ?></td>
                                                                     <td><?php echo $science_budhst_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $science_budhst_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $science_budhst_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $science_budhst_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Parsi</td>
                                                                     <td><?php echo $science_parsi_enrol_xi_b; ?></td>
                                                                     <td><?php echo $science_parsi_enrol_xi_g; ?></td>
                                                                     <td><?php echo $science_parsi_enrol_xii_b; ?></td>
                                                                     <td><?php echo $science_parsi_enrol_xii_g; ?></td>
                                                                     <td><?php echo $science_parsi_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $science_parsi_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $science_parsi_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $science_parsi_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Jain</td>
                                                                     <td><?php echo $science_jain_enrol_xi_b; ?></td>
                                                                     <td><?php echo $science_jain_enrol_xi_g; ?></td>
                                                                     <td><?php echo $science_jain_enrol_xii_b; ?></td>
                                                                     <td><?php echo $science_jain_enrol_xii_g; ?></td>
                                                                     <td><?php echo $science_jain_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $science_jain_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $science_jain_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $science_jain_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <?php 
                                                                     $tot1 = (($science_muslm_enrol_xi_b)+($science_christ_enrol_xi_b)+($science_sikh_enrol_xi_b)+($science_budhst_enrol_xi_b)+($science_parsi_enrol_xi_b)+($science_jain_enrol_xi_b));
                                                                     $tot2 = (($science_muslm_enrol_xi_g)+($science_christ_enrol_xi_g)+($science_sikh_enrol_xi_g)+($science_budhst_enrol_xi_g)+($science_parsi_enrol_xi_g)+($science_jain_enrol_xi_g));
                                                                     $tot3 = (($science_muslm_enrol_xii_b)+($science_christ_enrol_xii_b)+($science_sikh_enrol_xii_b)+($science_budhst_enrol_xii_b)+($science_parsi_enrol_xii_b)+($science_jain_enrol_xii_b));
                                                                     $tot4 = (($science_muslm_enrol_xii_g)+($science_christ_enrol_xii_g)+($science_sikh_enrol_xii_g)+($science_budhst_enrol_xii_g)+($science_parsi_enrol_xii_g)+($science_jain_enrol_xii_g));

                                                                     $tot5 = (($science_muslm_reptrs_xi_b)+($science_christ_reptrs_xi_b)+($science_sikh_reptrs_xi_b)+($science_budhst_reptrs_xi_b)+($science_parsi_reptrs_xi_b)+($science_jain_reptrs_xi_b));
                                                                     $tot6 = (($science_muslm_reptrs_xi_g)+($science_christ_reptrs_xi_g)+($science_sikh_reptrs_xi_g)+($science_budhst_reptrs_xi_g)+($science_parsi_reptrs_xi_g)+($science_jain_reptrs_xi_g));
                                                                     $tot7 = (($science_muslm_reptrs_xii_b)+($science_christ_reptrs_xii_b)+($science_sikh_reptrs_xii_b)+($science_budhst_reptrs_xii_b)+($science_parsi_reptrs_xii_b)+($science_jain_reptrs_xii_b));
                                                                     $tot8 = (($science_muslm_reptrs_xii_g)+($science_christ_reptrs_xii_g)+($science_sikh_reptrs_xii_g)+($science_budhst_reptrs_xii_g)+($science_parsi_reptrs_xii_g)+($science_jain_reptrs_xii_g));
                                                                      ?>
                                                                  <tr>
                                                                     <td colspan="2">Total</td>
                                                                     <td><?php echo $tot1; ?></td>
                                                                     <td><?php echo $tot2; ?></td>
                                                                     <td><?php echo $tot3; ?></td>
                                                                     <td><?php echo $tot4; ?></td>
                                                                     <td><?php echo $tot5; ?></td>
                                                                     <td><?php echo $tot6; ?></td>
                                                                     <td><?php echo $tot7; ?></td>
                                                                     <td><?php echo $tot8; ?></td>
                                                                  </tr>



                                                                  <tr>
                                                                     <td rowspan="7"><br><br><br><br><center>Commerce</center></td>
                                                                     <td colspan="2">Muslim</td>
                                                                     <td><?php echo $commerce_muslm_enrol_xi_b; ?></td>
                                                                     <td><?php echo $commerce_muslm_enrol_xi_g; ?></td>
                                                                     <td><?php echo $commerce_muslm_enrol_xii_b; ?></td>
                                                                     <td><?php echo $commerce_muslm_enrol_xii_g; ?></td>
                                                                     <td><?php echo $commerce_muslm_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $commerce_muslm_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $commerce_muslm_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $commerce_muslm_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Christian</td>
                                                                     <td><?php echo $commerce_christ_enrol_xi_b; ?></td>
                                                                     <td><?php echo $commerce_christ_enrol_xi_g; ?></td>
                                                                     <td><?php echo $commerce_christ_enrol_xii_b; ?></td>
                                                                     <td><?php echo $commerce_christ_enrol_xii_g; ?></td>
                                                                     <td><?php echo $commerce_christ_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $commerce_christ_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $commerce_christ_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $commerce_christ_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Sikh</td>
                                                                     <td><?php echo $commerce_sikh_enrol_xi_b; ?></td>
                                                                     <td><?php echo $commerce_sikh_enrol_xi_g; ?></td>
                                                                     <td><?php echo $commerce_sikh_enrol_xii_b; ?></td>
                                                                     <td><?php echo $commerce_sikh_enrol_xii_g; ?></td>
                                                                     <td><?php echo $commerce_sikh_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $commerce_sikh_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $commerce_sikh_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $commerce_sikh_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Buddhist</td>
                                                                     <td><?php echo $commerce_budhst_enrol_xi_b; ?></td>
                                                                     <td><?php echo $commerce_budhst_enrol_xi_g; ?></td>
                                                                     <td><?php echo $commerce_budhst_enrol_xii_b; ?></td>
                                                                     <td><?php echo $commerce_budhst_enrol_xii_g; ?></td>
                                                                     <td><?php echo $commerce_budhst_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $commerce_budhst_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $commerce_budhst_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $commerce_budhst_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Parsi</td>
                                                                     <td><?php echo $commerce_parsi_enrol_xi_b; ?></td>
                                                                     <td><?php echo $commerce_parsi_enrol_xi_g; ?></td>
                                                                     <td><?php echo $commerce_parsi_enrol_xii_b; ?></td>
                                                                     <td><?php echo $commerce_parsi_enrol_xii_g; ?></td>
                                                                     <td><?php echo $commerce_parsi_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $commerce_parsi_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $commerce_parsi_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $commerce_parsi_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Jain</td>
                                                                     <td><?php echo $commerce_jain_enrol_xi_b; ?></td>
                                                                     <td><?php echo $commerce_jain_enrol_xi_g; ?></td>
                                                                     <td><?php echo $commerce_jain_enrol_xii_b; ?></td>
                                                                     <td><?php echo $commerce_jain_enrol_xii_g; ?></td>
                                                                     <td><?php echo $commerce_jain_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $commerce_jain_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $commerce_jain_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $commerce_jain_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <?php 
                                                                     $tot1 = (($commerce_muslm_enrol_xi_b)+($commerce_christ_enrol_xi_b)+($commerce_sikh_enrol_xi_b)+($commerce_budhst_enrol_xi_b)+($commerce_parsi_enrol_xi_b)+($commerce_jain_enrol_xi_b));
                                                                     $tot2 = (($commerce_muslm_enrol_xi_g)+($commerce_christ_enrol_xi_g)+($commerce_sikh_enrol_xi_g)+($commerce_budhst_enrol_xi_g)+($commerce_parsi_enrol_xi_g)+($commerce_jain_enrol_xi_g));
                                                                     $tot3 = (($commerce_muslm_enrol_xii_b)+($commerce_christ_enrol_xii_b)+($commerce_sikh_enrol_xii_b)+($commerce_budhst_enrol_xii_b)+($commerce_parsi_enrol_xii_b)+($commerce_jain_enrol_xii_b));
                                                                     $tot4 = (($commerce_muslm_enrol_xii_g)+($commerce_christ_enrol_xii_g)+($commerce_sikh_enrol_xii_g)+($commerce_budhst_enrol_xii_g)+($commerce_parsi_enrol_xii_g)+($commerce_jain_enrol_xii_g));

                                                                     $tot5 = (($commerce_muslm_reptrs_xi_b)+($commerce_christ_reptrs_xi_b)+($commerce_sikh_reptrs_xi_b)+($commerce_budhst_reptrs_xi_b)+($commerce_parsi_reptrs_xi_b)+($commerce_jain_reptrs_xi_b));
                                                                     $tot6 = (($commerce_muslm_reptrs_xi_g)+($commerce_christ_reptrs_xi_g)+($commerce_sikh_reptrs_xi_g)+($commerce_budhst_reptrs_xi_g)+($commerce_parsi_reptrs_xi_g)+($commerce_jain_reptrs_xi_g));
                                                                     $tot7 = (($commerce_muslm_reptrs_xii_b)+($commerce_christ_reptrs_xii_b)+($commerce_sikh_reptrs_xii_b)+($commerce_budhst_reptrs_xii_b)+($commerce_parsi_reptrs_xii_b)+($commerce_jain_reptrs_xii_b));
                                                                     $tot8 = (($commerce_muslm_reptrs_xii_g)+($commerce_christ_reptrs_xii_g)+($commerce_sikh_reptrs_xii_g)+($commerce_budhst_reptrs_xii_g)+($commerce_parsi_reptrs_xii_g)+($commerce_jain_reptrs_xii_g));
                                                                      ?>
                                                                  <tr>
                                                                     <td colspan="2">Total</td>
                                                                     <td><?php echo $tot1; ?></td>
                                                                     <td><?php echo $tot2; ?></td>
                                                                     <td><?php echo $tot3; ?></td>
                                                                     <td><?php echo $tot4; ?></td>
                                                                     <td><?php echo $tot5; ?></td>
                                                                     <td><?php echo $tot6; ?></td>
                                                                     <td><?php echo $tot7; ?></td>
                                                                     <td><?php echo $tot8; ?></td>
                                                                  </tr>




                                                                  <tr>
                                                                     <td rowspan="7"><br><br><br><br><center>Vocational</center></td>
                                                                     <td colspan="2">Muslim</td>
                                                                     <td><?php echo $vocational_muslm_enrol_xi_b; ?></td>
                                                                     <td><?php echo $vocational_muslm_enrol_xi_g; ?></td>
                                                                     <td><?php echo $vocational_muslm_enrol_xii_b; ?></td>
                                                                     <td><?php echo $vocational_muslm_enrol_xii_g; ?></td>
                                                                     <td><?php echo $vocational_muslm_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $vocational_muslm_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $vocational_muslm_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $vocational_muslm_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Christian</td>
                                                                     <td><?php echo $vocational_christ_enrol_xi_b; ?></td>
                                                                     <td><?php echo $vocational_christ_enrol_xi_g; ?></td>
                                                                     <td><?php echo $vocational_christ_enrol_xii_b; ?></td>
                                                                     <td><?php echo $vocational_christ_enrol_xii_g; ?></td>
                                                                     <td><?php echo $vocational_christ_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $vocational_christ_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $vocational_christ_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $vocational_christ_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Sikh</td>
                                                                     <td><?php echo $vocational_sikh_enrol_xi_b; ?></td>
                                                                     <td><?php echo $vocational_sikh_enrol_xi_g; ?></td>
                                                                     <td><?php echo $vocational_sikh_enrol_xii_b; ?></td>
                                                                     <td><?php echo $vocational_sikh_enrol_xii_g; ?></td>
                                                                     <td><?php echo $vocational_sikh_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $vocational_sikh_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $vocational_sikh_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $vocational_sikh_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Buddhist</td>
                                                                     <td><?php echo $vocational_budhst_enrol_xi_b; ?></td>
                                                                     <td><?php echo $vocational_budhst_enrol_xi_g; ?></td>
                                                                     <td><?php echo $vocational_budhst_enrol_xii_b; ?></td>
                                                                     <td><?php echo $vocational_budhst_enrol_xii_g; ?></td>
                                                                     <td><?php echo $vocational_budhst_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $vocational_budhst_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $vocational_budhst_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $vocational_budhst_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Parsi</td>
                                                                     <td><?php echo $vocational_parsi_enrol_xi_b; ?></td>
                                                                     <td><?php echo $vocational_parsi_enrol_xi_g; ?></td>
                                                                     <td><?php echo $vocational_parsi_enrol_xii_b; ?></td>
                                                                     <td><?php echo $vocational_parsi_enrol_xii_g; ?></td>
                                                                     <td><?php echo $vocational_parsi_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $vocational_parsi_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $vocational_parsi_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $vocational_parsi_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Jain</td>
                                                                     <td><?php echo $vocational_jain_enrol_xi_b; ?></td>
                                                                     <td><?php echo $vocational_jain_enrol_xi_g; ?></td>
                                                                     <td><?php echo $vocational_jain_enrol_xii_b; ?></td>
                                                                     <td><?php echo $vocational_jain_enrol_xii_g; ?></td>
                                                                     <td><?php echo $vocational_jain_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $vocational_jain_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $vocational_jain_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $vocational_jain_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                 <?php 
                                                                     $tot1 = (($vocational_muslm_enrol_xi_b)+($vocational_christ_enrol_xi_b)+($vocational_sikh_enrol_xi_b)+($vocational_budhst_enrol_xi_b)+($vocational_parsi_enrol_xi_b)+($vocational_jain_enrol_xi_b));
                                                                     $tot2 = (($vocational_muslm_enrol_xi_g)+($vocational_christ_enrol_xi_g)+($vocational_sikh_enrol_xi_g)+($vocational_budhst_enrol_xi_g)+($vocational_parsi_enrol_xi_g)+($vocational_jain_enrol_xi_g));
                                                                     $tot3 = (($vocational_muslm_enrol_xii_b)+($vocational_christ_enrol_xii_b)+($vocational_sikh_enrol_xii_b)+($vocational_budhst_enrol_xii_b)+($vocational_parsi_enrol_xii_b)+($vocational_jain_enrol_xii_b));
                                                                     $tot4 = (($vocational_muslm_enrol_xii_g)+($vocational_christ_enrol_xii_g)+($vocational_sikh_enrol_xii_g)+($vocational_budhst_enrol_xii_g)+($vocational_parsi_enrol_xii_g)+($vocational_jain_enrol_xii_g));

                                                                     $tot5 = (($vocational_muslm_reptrs_xi_b)+($vocational_christ_reptrs_xi_b)+($vocational_sikh_reptrs_xi_b)+($vocational_budhst_reptrs_xi_b)+($vocational_parsi_reptrs_xi_b)+($vocational_jain_reptrs_xi_b));
                                                                     $tot6 = (($vocational_muslm_reptrs_xi_g)+($vocational_christ_reptrs_xi_g)+($vocational_sikh_reptrs_xi_g)+($vocational_budhst_reptrs_xi_g)+($vocational_parsi_reptrs_xi_g)+($vocational_jain_reptrs_xi_g));
                                                                     $tot7 = (($vocational_muslm_reptrs_xii_b)+($vocational_christ_reptrs_xii_b)+($vocational_sikh_reptrs_xii_b)+($vocational_budhst_reptrs_xii_b)+($vocational_parsi_reptrs_xii_b)+($vocational_jain_reptrs_xii_b));
                                                                     $tot8 = (($vocational_muslm_reptrs_xii_g)+($vocational_christ_reptrs_xii_g)+($vocational_sikh_reptrs_xii_g)+($vocational_budhst_reptrs_xii_g)+($vocational_parsi_reptrs_xii_g)+($vocational_jain_reptrs_xii_g));
                                                                      ?>
                                                                  <tr>
                                                                     <td colspan="2">Total</td>
                                                                     <td><?php echo $tot1; ?></td>
                                                                     <td><?php echo $tot2; ?></td>
                                                                     <td><?php echo $tot3; ?></td>
                                                                     <td><?php echo $tot4; ?></td>
                                                                     <td><?php echo $tot5; ?></td>
                                                                     <td><?php echo $tot6; ?></td>
                                                                     <td><?php echo $tot7; ?></td>
                                                                     <td><?php echo $tot8; ?></td>
                                                                  </tr>


                                                                  <tr>
                                                                     <td rowspan="7"><br><br><br><br><center>Other streams</center></td>
                                                                     <td colspan="2">Muslim</td>
                                                                     <td><?php echo $oth_stream_muslm_enrol_xi_b; ?></td>
                                                                     <td><?php echo $oth_stream_muslm_enrol_xi_g; ?></td>
                                                                     <td><?php echo $oth_stream_muslm_enrol_xii_b; ?></td>
                                                                     <td><?php echo $oth_stream_muslm_enrol_xii_g; ?></td>
                                                                     <td><?php echo $oth_stream_muslm_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $oth_stream_muslm_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $oth_stream_muslm_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $oth_stream_muslm_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Christian</td>
                                                                     <td><?php echo $oth_stream_christ_enrol_xi_b; ?></td>
                                                                     <td><?php echo $oth_stream_christ_enrol_xi_g; ?></td>
                                                                     <td><?php echo $oth_stream_christ_enrol_xii_b; ?></td>
                                                                     <td><?php echo $oth_stream_christ_enrol_xii_g; ?></td>
                                                                     <td><?php echo $oth_stream_christ_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $oth_stream_christ_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $oth_stream_christ_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $oth_stream_christ_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Sikh</td>
                                                                     <td><?php echo $oth_stream_sikh_enrol_xi_b; ?></td>
                                                                     <td><?php echo $oth_stream_sikh_enrol_xi_g; ?></td>
                                                                     <td><?php echo $oth_stream_sikh_enrol_xii_b; ?></td>
                                                                     <td><?php echo $oth_stream_sikh_enrol_xii_g; ?></td>
                                                                     <td><?php echo $oth_stream_sikh_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $oth_stream_sikh_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $oth_stream_sikh_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $oth_stream_sikh_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Buddhist</td>
                                                                     <td><?php echo $oth_stream_budhst_enrol_xi_b; ?></td>
                                                                     <td><?php echo $oth_stream_budhst_enrol_xi_g; ?></td>
                                                                     <td><?php echo $oth_stream_budhst_enrol_xii_b; ?></td>
                                                                     <td><?php echo $oth_stream_budhst_enrol_xii_g; ?></td>
                                                                     <td><?php echo $oth_stream_budhst_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $oth_stream_budhst_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $oth_stream_budhst_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $oth_stream_budhst_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Parsi</td>
                                                                     <td><?php echo $oth_stream_parsi_enrol_xi_b; ?></td>
                                                                     <td><?php echo $oth_stream_parsi_enrol_xi_g; ?></td>
                                                                     <td><?php echo $oth_stream_parsi_enrol_xii_b; ?></td>
                                                                     <td><?php echo $oth_stream_parsi_enrol_xii_g; ?></td>
                                                                     <td><?php echo $oth_stream_parsi_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $oth_stream_parsi_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $oth_stream_parsi_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $oth_stream_parsi_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Jain</td>
                                                                     <td><?php echo $oth_stream_jain_enrol_xi_b; ?></td>
                                                                     <td><?php echo $oth_stream_jain_enrol_xi_g; ?></td>
                                                                     <td><?php echo $oth_stream_jain_enrol_xii_b; ?></td>
                                                                     <td><?php echo $oth_stream_jain_enrol_xii_g; ?></td>
                                                                     <td><?php echo $oth_stream_jain_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $oth_stream_jain_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $oth_stream_jain_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $oth_stream_jain_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  <?php 
                                                                     $tot1 = (($oth_stream_muslm_enrol_xi_b)+($oth_stream_christ_enrol_xi_b)+($oth_stream_sikh_enrol_xi_b)+($oth_stream_budhst_enrol_xi_b)+($oth_stream_parsi_enrol_xi_b)+($oth_stream_jain_enrol_xi_b));
                                                                     $tot2 = (($oth_stream_muslm_enrol_xi_g)+($oth_stream_christ_enrol_xi_g)+($oth_stream_sikh_enrol_xi_g)+($oth_stream_budhst_enrol_xi_g)+($oth_stream_parsi_enrol_xi_g)+($oth_stream_jain_enrol_xi_g));
                                                                     $tot3 = (($oth_stream_muslm_enrol_xii_b)+($oth_stream_christ_enrol_xii_b)+($oth_stream_sikh_enrol_xii_b)+($oth_stream_budhst_enrol_xii_b)+($oth_stream_parsi_enrol_xii_b)+($oth_stream_jain_enrol_xii_b));
                                                                     $tot4 = (($oth_stream_muslm_enrol_xii_g)+($oth_stream_christ_enrol_xii_g)+($oth_stream_sikh_enrol_xii_g)+($oth_stream_budhst_enrol_xii_g)+($oth_stream_parsi_enrol_xii_g)+($oth_stream_jain_enrol_xii_g));

                                                                     $tot5 = (($oth_stream_muslm_reptrs_xi_b)+($oth_stream_christ_reptrs_xi_b)+($oth_stream_sikh_reptrs_xi_b)+($oth_stream_budhst_reptrs_xi_b)+($oth_stream_parsi_reptrs_xi_b)+($oth_stream_jain_reptrs_xi_b));
                                                                     $tot6 = (($oth_stream_muslm_reptrs_xi_g)+($oth_stream_christ_reptrs_xi_g)+($oth_stream_sikh_reptrs_xi_g)+($oth_stream_budhst_reptrs_xi_g)+($oth_stream_parsi_reptrs_xi_g)+($oth_stream_jain_reptrs_xi_g));
                                                                     $tot7 = (($oth_stream_muslm_reptrs_xii_b)+($oth_stream_christ_reptrs_xii_b)+($oth_stream_sikh_reptrs_xii_b)+($oth_stream_budhst_reptrs_xii_b)+($oth_stream_parsi_reptrs_xii_b)+($oth_stream_jain_reptrs_xii_b));
                                                                     $tot8 = (($oth_stream_muslm_reptrs_xii_g)+($oth_stream_christ_reptrs_xii_g)+($oth_stream_sikh_reptrs_xii_g)+($oth_stream_budhst_reptrs_xii_g)+($oth_stream_parsi_reptrs_xii_g)+($oth_stream_jain_reptrs_xii_g));
                                                                      ?>
                                                                  <tr>
                                                                     <td colspan="2">Total</td>
                                                                     <td><?php echo $tot1; ?></td>
                                                                     <td><?php echo $tot2; ?></td>
                                                                     <td><?php echo $tot3; ?></td>
                                                                     <td><?php echo $tot4; ?></td>
                                                                     <td><?php echo $tot5; ?></td>
                                                                     <td><?php echo $tot6; ?></td>
                                                                     <td><?php echo $tot7; ?></td>
                                                                     <td><?php echo $tot8; ?></td>
                                                                  </tr>
                                                                   
                                                                </tbody>
                                                            </table>
                                                           </div>
                                                           <!-- table Scollable Ending -->
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

            <!-- <script src="<?php //echo base_url().'asset/global/plugins/select2/js/FileSaver.min.js';?>" type="text/javascript"></script>
            <script src="<?php //echo base_url().'asset/global/plugins/select2/js/Blob.min.js';?>" type="text/javascript"></script>
            <script src="<?php //echo base_url().'asset/global/plugins/select2/js/xls.core.min.js';?>" type="text/javascript"></script>
            <script src="<?php //echo base_url().'asset/global/plugins/select2/js/tableexport.js';?>" type="text/javascript"></script>  -->
            <!-- <script>
                $("table").tableExport({formats: ["xls", "csv", "txt"],    });
            </script> -->


            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <!-- END PAGE LEVEL SCRIPTS -->
            <script>
                   var yesno = [];
               $.each({
                   "0":"Not Applicable",
                   "1": "Yes",
                   "2": "No"        
               }, function(k, v) {
                   yesno.push({
                       id: k,
                       text: v
                   });
               });
               
                $('#emis_school_enrolment_arts').editable({
                   inputclass: 'form-control input-medium',
                   source: yesno,
                   type: 'select2',
                   pk: 1,
                   name: 'emis_school_enrolment_arts',
                   title: 'Select the availability',
                   success: function(response, newValue) {            
                            if(response == 0) return "Unable to update.Please try later"; 
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    }
               });

                $('#emis_school_enrolment_science').editable({
                   inputclass: 'form-control input-medium',
                   source: yesno,
                   type: 'select2',
                   pk: 1,
                   name: 'emis_school_enrolment_science',
                   title: 'Select the availability',
                   success: function(response, newValue) {            
                            if(response == 0) return "Unable to update.Please try later"; 
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    }
               });

                $('#emis_school_enrolment_Commerce').editable({
                   inputclass: 'form-control input-medium',
                   source: yesno,
                   type: 'select2',
                   pk: 1,
                   name: 'emis_school_enrolment_Commerce',
                   title: 'Select the availability',
                   success: function(response, newValue) {            
                            if(response == 0) return "Unable to update.Please try later"; 
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    }
               });

               $('#emis_school_enrolment_vocational').editable({
                   inputclass: 'form-control input-medium',
                   source: yesno,
                   type: 'select2',
                   pk: 1,
                   name: 'emis_school_enrolment_vocational',
                   title: 'Select the availability',
                   success: function(response, newValue) {            
                            if(response == 0) return "Unable to update.Please try later"; 
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    }
               });                

               $('#emis_school_enrolment_otherstreams').editable({
                   inputclass: 'form-control input-medium',
                   source: yesno,
                   type: 'select2',
                   pk: 1,
                   name: 'emis_school_enrolment_otherstreams',
                   title: 'Select the availability',
                   success: function(response, newValue) {            
                            if(response == 0) return "Unable to update.Please try later"; 
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    }
               });
               
               
              $('#category,#stream').change(function(){
                  if(($('#stream').val()=='arts') && ($('#category').val()=='muslm') || ($('#stream').val()=='arts') && ($('#category').val()=='christ') || ($('#stream').val()=='arts') && ($('#category').val()=='sikh') || ($('#stream').val()=='arts') && ($('#category').val()=='budhst') || ($('#stream').val()=='arts') && ($('#category').val()=='parsi') || ($('#stream').val()=='arts') && ($('#category').val()=='jain') || ($('#stream').val()=='science') && ($('#category').val()=='muslm') || ($('#stream').val()=='science') && ($('#category').val()=='christ') || ($('#stream').val()=='science') && ($('#category').val()=='sikh') || ($('#stream').val()=='science') && ($('#category').val()=='budhst') || ($('#stream').val()=='science') && ($('#category').val()=='parsi') || ($('#stream').val()=='science') && ($('#category').val()=='jain') || ($('#stream').val()=='commerce') && ($('#category').val()=='muslm') || ($('#stream').val()=='commerce') && ($('#category').val()=='christ') || ($('#stream').val()=='commerce') && ($('#category').val()=='sikh') || ($('#stream').val()=='commerce') && ($('#category').val()=='budhst') || ($('#stream').val()=='commerce') && ($('#category').val()=='parsi') || ($('#stream').val()=='commerce') && ($('#category').val()=='jain') || ($('#stream').val()=='vocational') && ($('#category').val()=='muslm') || ($('#stream').val()=='vocational') && ($('#category').val()=='christ') || ($('#stream').val()=='vocational') && ($('#category').val()=='sikh') || ($('#stream').val()=='vocational') && ($('#category').val()=='budhst') || ($('#stream').val()=='vocational') && ($('#category').val()=='parsi') || ($('#stream').val()=='vocational') && ($('#category').val()=='jain') || ($('#stream').val()=='oth_stream') && ($('#category').val()=='muslm') || ($('#stream').val()=='oth_stream') && ($('#category').val()=='christ') || ($('#stream').val()=='oth_stream') && ($('#category').val()=='sikh') || ($('#stream').val()=='oth_stream') && ($('#category').val()=='budhst') || ($('#stream').val()=='oth_stream') && ($('#category').val()=='parsi') || ($('#stream').val()=='oth_stream') && ($('#category').val()=='jain') ){
                     $('#view').show();
                  }else{
                     $('#view').hide();
                  }
                  
               });

            </script>

         </body>


      </html>