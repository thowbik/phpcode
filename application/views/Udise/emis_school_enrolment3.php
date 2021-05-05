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
                                                <div class="col-md-2 bg-grey mt-step-col active">
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
                                 
                                     <div class="row">
                                       <div class="col-md-12">
                                          <div class="mt-checkbox-inline">
                                             <!-- <label class="mt-checkbox mt-checkbox-outline">
                                                <input type="checkbox" id="autoopen">&nbsp;Auto-open next field
                                                <span></span>
                                                </label> -->
                                             <!--  <label class="mt-checkbox mt-checkbox-outline">
                                                <input type="checkbox" id="inline">&nbsp;Inline editing
                                                <span></span>
                                                </label> -->
                                             <button id="enable1" class="btn green">Enable / Disable Editor Mode</button>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="portlet light portlet-fit ">
                                       <div class="portlet-title">
                                          <div class="caption">
                                             <i class="icon-settings font-dark"></i>
                                             <span class="caption-subject font-dark sbold uppercase">Availability of academics stream in the school</span><small>(Only for Higher Secondary Schools/junior Collages)</small>
                                          </div>
                                       </div>
                                        
                                       <div class="portlet-body">
                                          <div class="row">
                                             <div class="col-md-12">

                                                <table id="user" class="table table-bordered table-striped">
                                                   <thead>
                                                      <th>Stream</th>
                                                      <th>Available</th>
                                                   </thead>
                                                   <tbody>
                                                      <tr>
                                                         <td> Arts: </td>
                                                         <td style="width:50%">
                                                            <a href="javascript:;" id="emis_school_enrolment_arts" data-type="select2" data-pk="1" data-value="<?php echo $arts; ?>" data-url="<?php echo base_url().'Udise_enrolment/updatearts' ?>" data-original-title="Select Availability"> </a> 
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td> Science: </td>
                                                         <td style="width:50%">
                                                            <a href="javascript:;" id="emis_school_enrolment_science" data-type="select2" data-pk="1" data-url="<?php echo base_url().'Udise_enrolment/updatescience' ?>" data-value="<?php echo $science; ?>" data-original-title="Select Availability">  </a> 
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td> Commerce: </td>
                                                         <td style="width:50%">
                                                            <a href="javascript:;" id="emis_school_enrolment_Commerce" data-type="select2" data-pk="1" data-url="<?php echo base_url().'Udise_enrolment/updatecommerce' ?>" data-value="<?php echo $commerce; ?>" data-original-title="Select Availability">  </a> 
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td> Vocational: </td>
                                                         <td style="width:50%">
                                                            <a href="javascript:;" id="emis_school_enrolment_vocational" data-type="select2" data-pk="1" data-url="<?php echo base_url().'Udise_enrolment/updatevocational' ?>" data-value="<?php echo $vocational; ?>" data-original-title="Select Availability">  </a> 
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td> Other Streams: </td>
                                                         <td style="width:50%">
                                                            <a href="javascript:;" id="emis_school_enrolment_otherstreams" data-type="select2" data-pk="1" data-url="<?php echo base_url().'Udise_enrolment/updateothstream' ?>" data-value="<?php echo $oth_stream; ?>" data-original-title="Select Availability">  </a> 
                                                         </td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </div>
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
                                                                <span class="caption-subject font-dark bold uppercase">Enrolment Repeaters by academic stream</span>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="portlet-body">
                                                          <!-- error reporting start -->
                                                       <?php if ($this->session->flashdata('enrolment3frm1')){ ?> 
                                                <!-- BEGIN PAGE CONTENT INNER -->
                                                   <div class="page-content-inner">
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="note note-danger note-bordered">
                                                               <?php echo $this->session->flashdata('enrolment3frm1'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <!-- END PAGE CONTENT INNER -->
                                             <?php } ?>
                                             <!-- error reporting End -->

                                                         <!-- table 1 -->
                                                         <div class="table-scrollable">
                                                         <form method="post" action="<?php echo base_url().'Udise_enrolment/emis_school_enrolment3' ?>" id="enrlmnt3frm2">
                                                            <table data-height="299" class="table table-bordered table-striped">
                                                               <thead>
                                                                  <tr>
                                                                     <th colspan="3">
                                                                        <center>Select the Stream</center>
                                                                     </th>
                                                                     <th colspan="3">
                                                                        <select name="stream" id="stream" class="form-control">
                                                                           <option value="" selected="selected">Select the Option</option>
                                                                           <option value="arts">Arts</option>
                                                                           <option value="science">Science</option>
                                                                           <option value="commerce">Commerce</option>
                                                                           <option value="vocational">Vocational</option>
                                                                           <option value="oth_stream">Other Stream</option>
                                                                        </select>
                                                                     </th>
                                                                     <th colspan="3">
                                                                        <center>Select the Social Category</center>
                                                                     </th>
                                                                     <th colspan="3">
                                                                        <select name="category" id="category" class="form-control">
                                                                           <option value="" selected="selected">Select the Option</option>
                                                                           <option value="gen">General</option>
                                                                           <option value="sc">SC</option>
                                                                           <option value="st">ST</option>
                                                                           <option value="obc">obc</option>
                                                                        </select>
                                                                     </th>
                                                                  </tr>
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
                                                                  <td><input type="text" class="form-control space" value="" name="tb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control space" value="" name="tb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control space" value="" name="tb3" maxlength="4"></td>
                                                                  <td colspan="3"><input type="text" class="form-control space" value="" name="tb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control space" value="" name="tb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control space" value="" name="tb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control space" value="" name="tb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control space" value="" name="tb8" maxlength="4"></td>
                                                                </tr>
                                                               </tbody>
                                                            </table>
                                                            </div>
                                                            <!-- table1 Ending -->
                                                            <div class="row">
                                                               <center><input type="submit" class="btn green" value="submit" name=""></center>
                                                            </div>
                                                          </form>
                                                           <div class="table-scrollable">
                                                            <table data-toggle="table" data-height="299" class="table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th rowspan="3"><center>Stream</center></th>
                                                                        <th colspan="2"></th>
                                                                        <th colspan="4"><center>Enrolment</center></th>
                                                                        <th colspan="4"><center>Repeaters</center></th>
                                                                    </tr>
                                                                    <tr>
                                                                       <th colspan="2">Social Category</th>
                                                                       <th colspan="2">ClassXI</th>
                                                                       <th colspan="2">ClassXII</th>
                                                                       <th colspan="2">ClassXI</th>
                                                                       <th colspan="2">ClassXII</th>
                                                                    </tr>
                                                                    <tr>
                                                                       <th colspan="2"></th>
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
                                                                     <td rowspan="5"><br><br><br><br><center>Arts</center></td>
                                                                     <td colspan="2">General</td>
                                                                     <td><?php echo $arts_gen_enrol_xi_b; ?></td>
                                                                     <td><?php echo $arts_gen_enrol_xi_g; ?></td>
                                                                     <td><?php echo $arts_gen_enrol_xii_b; ?></td>
                                                                     <td><?php echo $arts_gen_enrol_xii_g; ?></td>
                                                                     <td><?php echo $arts_gen_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $arts_gen_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $arts_gen_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $arts_gen_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                
                                                      
                                                                  <tr>
                                                                     <td colspan="2">SC</td>
                                                                     <td><?php echo $arts_sc_enrol_xi_b; ?></td>
                                                                     <td><?php echo $arts_sc_enrol_xi_g; ?></td>
                                                                     <td><?php echo $arts_sc_enrol_xii_b; ?></td>
                                                                     <td><?php echo $arts_sc_enrol_xii_g; ?></td>
                                                                     <td><?php echo $arts_sc_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $arts_sc_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $arts_sc_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $arts_sc_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                 
                                                                  <tr>
                                                                     <td colspan="2">ST</td>
                                                                     <td><?php echo $arts_st_enrol_xi_b; ?></td>
                                                                     <td><?php echo $arts_st_enrol_xi_g; ?></td>
                                                                     <td><?php echo $arts_st_enrol_xii_b; ?></td>
                                                                     <td><?php echo $arts_st_enrol_xii_g; ?></td>
                                                                     <td><?php echo $arts_st_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $arts_st_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $arts_st_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $arts_st_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  
                                                                  <tr>
                                                                     <td colspan="2">OBC</td>
                                                                     <td><?php echo $arts_obc_enrol_xi_b; ?></td>
                                                                     <td><?php echo $arts_obc_enrol_xi_g; ?></td>
                                                                     <td><?php echo $arts_obc_enrol_xii_b; ?></td>
                                                                     <td><?php echo $arts_obc_enrol_xii_g; ?></td>
                                                                     <td><?php echo $arts_obc_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $arts_obc_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $arts_obc_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $arts_obc_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                     <?php 
                                                                     $tot1 = (($arts_gen_enrol_xi_b)+($arts_sc_enrol_xi_b)+($arts_st_enrol_xi_b)+($arts_obc_enrol_xi_b));
                                                                     $tot2 = (($arts_gen_enrol_xi_g)+($arts_sc_enrol_xi_g)+($arts_st_enrol_xi_g)+($arts_obc_enrol_xi_g));
                                                                     $tot3 = (($arts_gen_enrol_xii_b)+($arts_sc_enrol_xii_b)+($arts_st_enrol_xii_b)+($arts_obc_enrol_xii_b));
                                                                     $tot4 = (($arts_gen_enrol_xii_g)+($arts_sc_enrol_xii_g)+($arts_st_enrol_xii_g)+($arts_obc_enrol_xii_g));

                                                                     $tot5 = (($arts_gen_reptrs_xi_b)+($arts_sc_reptrs_xi_b)+($arts_st_reptrs_xi_b)+($arts_obc_reptrs_xi_b));
                                                                     $tot6 = (($arts_gen_reptrs_xi_g)+($arts_sc_reptrs_xi_g)+($arts_st_reptrs_xi_g)+($arts_obc_reptrs_xi_g));
                                                                     $tot7 = (($arts_gen_reptrs_xii_b)+($arts_sc_reptrs_xii_b)+($arts_st_reptrs_xii_b)+($arts_obc_reptrs_xii_b));
                                                                     $tot8 = (($arts_gen_reptrs_xii_g)+($arts_sc_reptrs_xii_g)+($arts_st_reptrs_xii_g)+($arts_obc_reptrs_xii_g));
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
                                                                     <td rowspan="5"><br><br><br><br><center>Science</center></td>
                                                                     <td colspan="2">General</td>
                                                                     <td><?php echo $science_gen_enrol_xi_b; ?></td>
                                                                     <td><?php echo $science_gen_enrol_xi_g; ?></td>
                                                                     <td><?php echo $science_gen_enrol_xii_b; ?></td>
                                                                     <td><?php echo $science_gen_enrol_xii_g; ?></td>
                                                                     <td><?php echo $science_gen_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $science_gen_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $science_gen_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $science_gen_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                 
                                                                  <tr>
                                                                     <td colspan="2">SC</td>
                                                                     <td><?php echo $science_sc_enrol_xi_b; ?></td>
                                                                     <td><?php echo $science_sc_enrol_xi_g; ?></td>
                                                                     <td><?php echo $science_sc_enrol_xii_b; ?></td>
                                                                     <td><?php echo $science_sc_enrol_xii_g; ?></td>
                                                                     <td><?php echo $science_sc_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $science_sc_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $science_sc_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $science_sc_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  
                                                                  <tr>
                                                                     <td colspan="2">ST</td>
                                                                     <td><?php echo $science_st_enrol_xi_b; ?></td>
                                                                     <td><?php echo $science_st_enrol_xi_g; ?></td>
                                                                     <td><?php echo $science_st_enrol_xii_b; ?></td>
                                                                     <td><?php echo $science_st_enrol_xii_g; ?></td>
                                                                     <td><?php echo $science_st_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $science_st_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $science_st_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $science_st_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  
                                                                  <tr>
                                                                     <td colspan="2">OBC</td>
                                                                     <td><?php echo $science_obc_enrol_xi_b; ?></td>
                                                                     <td><?php echo $science_obc_enrol_xi_g; ?></td>
                                                                     <td><?php echo $science_obc_enrol_xii_b; ?></td>
                                                                     <td><?php echo $science_obc_enrol_xii_g; ?></td>
                                                                     <td><?php echo $science_obc_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $science_obc_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $science_obc_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $science_obc_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  
                                                                 <?php 
                                                                     $tot1 = (($science_gen_enrol_xi_b)+($science_sc_enrol_xi_b)+($science_st_enrol_xi_b)+($science_obc_enrol_xi_b));
                                                                     $tot2 = (($science_gen_enrol_xi_g)+($science_sc_enrol_xi_g)+($science_st_enrol_xi_g)+($science_obc_enrol_xi_g));
                                                                     $tot3 = (($science_gen_enrol_xii_b)+($science_sc_enrol_xii_b)+($science_st_enrol_xii_b)+($science_obc_enrol_xii_b));
                                                                     $tot4 = (($science_gen_enrol_xii_g)+($science_sc_enrol_xii_g)+($science_st_enrol_xii_g)+($science_obc_enrol_xii_g));

                                                                     $tot5 = (($science_gen_reptrs_xi_b)+($science_sc_reptrs_xi_b)+($science_st_reptrs_xi_b)+($science_obc_reptrs_xi_b));
                                                                     $tot6 = (($science_gen_reptrs_xi_g)+($science_sc_reptrs_xi_g)+($science_st_reptrs_xi_g)+($science_obc_reptrs_xi_g));
                                                                     $tot7 = (($science_gen_reptrs_xii_b)+($science_sc_reptrs_xii_b)+($science_st_reptrs_xii_b)+($science_obc_reptrs_xii_b));
                                                                     $tot8 = (($science_gen_reptrs_xii_g)+($science_sc_reptrs_xii_g)+($science_st_reptrs_xii_g)+($science_obc_reptrs_xii_g));
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
                                                                     <td rowspan="5"><br><br><br><br><center>Commerce</center></td>
                                                                     <td colspan="2">General</td>
                                                                     <td><?php echo $commerce_gen_enrol_xi_b; ?></td>
                                                                     <td><?php echo $commerce_gen_enrol_xi_g; ?></td>
                                                                     <td><?php echo $commerce_gen_enrol_xii_b; ?></td>
                                                                     <td><?php echo $commerce_gen_enrol_xii_g; ?></td>
                                                                     <td><?php echo $commerce_gen_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $commerce_gen_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $commerce_gen_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $commerce_gen_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  
                                                                  <tr>
                                                                     <td colspan="2">SC</td>
                                                                     <td><?php echo $commerce_sc_enrol_xi_b; ?></td>
                                                                     <td><?php echo $commerce_sc_enrol_xi_g; ?></td>
                                                                     <td><?php echo $commerce_sc_enrol_xii_b; ?></td>
                                                                     <td><?php echo $commerce_sc_enrol_xii_g; ?></td>
                                                                     <td><?php echo $commerce_sc_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $commerce_sc_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $commerce_sc_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $commerce_sc_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  
                                                                  <tr>
                                                                     <td colspan="2">ST</td>
                                                                     <td><?php echo $commerce_st_enrol_xi_b; ?></td>
                                                                     <td><?php echo $commerce_st_enrol_xi_g; ?></td>
                                                                     <td><?php echo $commerce_st_enrol_xii_b; ?></td>
                                                                     <td><?php echo $commerce_st_enrol_xii_g; ?></td>
                                                                     <td><?php echo $commerce_st_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $commerce_st_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $commerce_st_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $commerce_st_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  
                                                                  <tr>
                                                                     <td colspan="2">OBC</td>
                                                                     <td><?php echo $commerce_obc_enrol_xi_b; ?></td>
                                                                     <td><?php echo $commerce_obc_enrol_xi_g; ?></td>
                                                                     <td><?php echo $commerce_obc_enrol_xii_b; ?></td>
                                                                     <td><?php echo $commerce_obc_enrol_xii_g; ?></td>
                                                                     <td><?php echo $commerce_obc_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $commerce_obc_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $commerce_obc_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $commerce_obc_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  
                                                                  <?php 
                                                                     $tot1 = (($commerce_gen_enrol_xi_b)+($commerce_sc_enrol_xi_b)+($commerce_st_enrol_xi_b)+($commerce_obc_enrol_xi_b));
                                                                     $tot2 = (($commerce_gen_enrol_xi_g)+($commerce_sc_enrol_xi_g)+($commerce_st_enrol_xi_g)+($commerce_obc_enrol_xi_g));
                                                                     $tot3 = (($commerce_gen_enrol_xii_b)+($commerce_sc_enrol_xii_b)+($commerce_st_enrol_xii_b)+($commerce_obc_enrol_xii_b));
                                                                     $tot4 = (($commerce_gen_enrol_xii_g)+($commerce_sc_enrol_xii_g)+($commerce_st_enrol_xii_g)+($commerce_obc_enrol_xii_g));

                                                                     $tot5 = (($commerce_gen_reptrs_xi_b)+($commerce_sc_reptrs_xi_b)+($commerce_st_reptrs_xi_b)+($commerce_obc_reptrs_xi_b));
                                                                     $tot6 = (($commerce_gen_reptrs_xi_g)+($commerce_sc_reptrs_xi_g)+($commerce_st_reptrs_xi_g)+($commerce_obc_reptrs_xi_g));
                                                                     $tot7 = (($commerce_gen_reptrs_xii_b)+($commerce_sc_reptrs_xii_b)+($commerce_st_reptrs_xii_b)+($commerce_obc_reptrs_xii_b));
                                                                     $tot8 = (($commerce_gen_reptrs_xii_g)+($commerce_sc_reptrs_xii_g)+($commerce_st_reptrs_xii_g)+($commerce_obc_reptrs_xii_g));
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
                                                                     <td rowspan="5"><br><br><br><br><center>Vocational</center></td>
                                                                     <td colspan="2">General</td>
                                                                     <td><?php echo $vocational_gen_enrol_xi_b; ?></td>
                                                                     <td><?php echo $vocational_gen_enrol_xi_g; ?></td>
                                                                     <td><?php echo $vocational_gen_enrol_xii_b; ?></td>
                                                                     <td><?php echo $vocational_gen_enrol_xii_g; ?></td>
                                                                     <td><?php echo $vocational_gen_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $vocational_gen_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $vocational_gen_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $vocational_gen_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                 
                                                                  <tr>
                                                                     <td colspan="2">SC</td>
                                                                     <td><?php echo $vocational_sc_enrol_xi_b; ?></td>
                                                                     <td><?php echo $vocational_sc_enrol_xi_g; ?></td>
                                                                     <td><?php echo $vocational_sc_enrol_xii_b; ?></td>
                                                                     <td><?php echo $vocational_sc_enrol_xii_g; ?></td>
                                                                     <td><?php echo $vocational_sc_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $vocational_sc_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $vocational_sc_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $vocational_sc_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  
                                                                  <tr>
                                                                     <td colspan="2">ST</td>
                                                                     <td><?php echo $vocational_st_enrol_xi_b; ?></td>
                                                                     <td><?php echo $vocational_st_enrol_xi_g; ?></td>
                                                                     <td><?php echo $vocational_st_enrol_xii_b; ?></td>
                                                                     <td><?php echo $vocational_st_enrol_xii_g; ?></td>
                                                                     <td><?php echo $vocational_st_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $vocational_st_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $vocational_st_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $vocational_st_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  
                                                                  <tr>
                                                                     <td colspan="2">OBC</td>
                                                                     <td><?php echo $vocational_obc_enrol_xi_b; ?></td>
                                                                     <td><?php echo $vocational_obc_enrol_xi_g; ?></td>
                                                                     <td><?php echo $vocational_obc_enrol_xii_b; ?></td>
                                                                     <td><?php echo $vocational_obc_enrol_xii_g; ?></td>
                                                                     <td><?php echo $vocational_obc_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $vocational_obc_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $vocational_obc_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $vocational_obc_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  
                                                                  <?php 
                                                                     $tot1 = (($vocational_gen_enrol_xi_b)+($vocational_sc_enrol_xi_b)+($vocational_st_enrol_xi_b)+($vocational_obc_enrol_xi_b));
                                                                     $tot2 = (($vocational_gen_enrol_xi_g)+($vocational_sc_enrol_xi_g)+($vocational_st_enrol_xi_g)+($vocational_obc_enrol_xi_g));
                                                                     $tot3 = (($vocational_gen_enrol_xii_b)+($vocational_sc_enrol_xii_b)+($vocational_st_enrol_xii_b)+($vocational_obc_enrol_xii_b));
                                                                     $tot4 = (($vocational_gen_enrol_xii_g)+($vocational_sc_enrol_xii_g)+($vocational_st_enrol_xii_g)+($vocational_obc_enrol_xii_g));

                                                                     $tot5 = (($vocational_gen_reptrs_xi_b)+($vocational_sc_reptrs_xi_b)+($vocational_st_reptrs_xi_b)+($vocational_obc_reptrs_xi_b));
                                                                     $tot6 = (($vocational_gen_reptrs_xi_g)+($vocational_sc_reptrs_xi_g)+($vocational_st_reptrs_xi_g)+($vocational_obc_reptrs_xi_g));
                                                                     $tot7 = (($vocational_gen_reptrs_xii_b)+($vocational_sc_reptrs_xii_b)+($vocational_st_reptrs_xii_b)+($vocational_obc_reptrs_xii_b));
                                                                     $tot8 = (($vocational_gen_reptrs_xii_g)+($vocational_sc_reptrs_xii_g)+($vocational_st_reptrs_xii_g)+($vocational_obc_reptrs_xii_g));
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
                                                                     <td rowspan="5"><br><br><br><br><center>Other Stream</center></td>
                                                                     <td colspan="2">General</td>
                                                                     <td><?php echo $oth_stream_gen_enrol_xi_b; ?></td>
                                                                     <td><?php echo $oth_stream_gen_enrol_xi_g; ?></td>
                                                                     <td><?php echo $oth_stream_gen_enrol_xii_b; ?></td>
                                                                     <td><?php echo $oth_stream_gen_enrol_xii_g; ?></td>
                                                                     <td><?php echo $oth_stream_gen_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $oth_stream_gen_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $oth_stream_gen_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $oth_stream_gen_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                 
                                                                  <tr>
                                                                     <td colspan="2">SC</td>
                                                                     <td><?php echo $oth_stream_sc_enrol_xi_b; ?></td>
                                                                     <td><?php echo $oth_stream_sc_enrol_xi_g; ?></td>
                                                                     <td><?php echo $oth_stream_sc_enrol_xii_b; ?></td>
                                                                     <td><?php echo $oth_stream_sc_enrol_xii_g; ?></td>
                                                                     <td><?php echo $oth_stream_sc_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $oth_stream_sc_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $oth_stream_sc_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $oth_stream_sc_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  
                                                                  <tr>
                                                                     <td colspan="2">ST</td>
                                                                     <td><?php echo $oth_stream_st_enrol_xi_b; ?></td>
                                                                     <td><?php echo $oth_stream_st_enrol_xi_g; ?></td>
                                                                     <td><?php echo $oth_stream_st_enrol_xii_b; ?></td>
                                                                     <td><?php echo $oth_stream_st_enrol_xii_g; ?></td>
                                                                     <td><?php echo $oth_stream_st_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $oth_stream_st_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $oth_stream_st_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $oth_stream_st_reptrs_xii_g; ?></td>
                                                                  </tr>
                                                                  
                                                                  <tr>
                                                                     <td colspan="2">OBC</td>
                                                                     <td><?php echo $oth_stream_obc_enrol_xi_b; ?></td>
                                                                     <td><?php echo $oth_stream_obc_enrol_xi_g; ?></td>
                                                                     <td><?php echo $oth_stream_obc_enrol_xii_b; ?></td>
                                                                     <td><?php echo $oth_stream_obc_enrol_xii_g; ?></td>
                                                                     <td><?php echo $oth_stream_obc_reptrs_xi_b; ?></td>
                                                                     <td><?php echo $oth_stream_obc_reptrs_xi_g; ?></td>
                                                                     <td><?php echo $oth_stream_obc_reptrs_xii_b; ?></td>
                                                                     <td><?php echo $oth_stream_obc_reptrs_xii_g; ?></td>
                                                                  </tr>

                                                                  <?php 
                                                                     $tot1 = (($oth_stream_gen_enrol_xi_b)+($oth_stream_sc_enrol_xi_b)+($oth_stream_st_enrol_xi_b)+($oth_stream_obc_enrol_xi_b));
                                                                     $tot2 = (($oth_stream_gen_enrol_xi_g)+($oth_stream_sc_enrol_xi_g)+($oth_stream_st_enrol_xi_g)+($oth_stream_obc_enrol_xi_g));
                                                                     $tot3 = (($oth_stream_gen_enrol_xii_b)+($oth_stream_sc_enrol_xii_b)+($oth_stream_st_enrol_xii_b)+($oth_stream_obc_enrol_xii_b));
                                                                     $tot4 = (($oth_stream_gen_enrol_xii_g)+($oth_stream_sc_enrol_xii_g)+($oth_stream_st_enrol_xii_g)+($oth_stream_obc_enrol_xii_g));

                                                                     $tot5 = (($oth_stream_gen_reptrs_xi_b)+($oth_stream_sc_reptrs_xi_b)+($oth_stream_st_reptrs_xi_b)+($oth_stream_obc_reptrs_xi_b));
                                                                     $tot6 = (($oth_stream_gen_reptrs_xi_g)+($oth_stream_sc_reptrs_xi_g)+($oth_stream_st_reptrs_xi_g)+($oth_stream_obc_reptrs_xi_g));
                                                                     $tot7 = (($oth_stream_gen_reptrs_xii_b)+($oth_stream_sc_reptrs_xii_b)+($oth_stream_st_reptrs_xii_b)+($oth_stream_obc_reptrs_xii_b));
                                                                     $tot8 = (($oth_stream_gen_reptrs_xii_g)+($oth_stream_sc_reptrs_xii_g)+($oth_stream_st_reptrs_xii_g)+($oth_stream_obc_reptrs_xii_g));
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
                                                           <!-- table scrollable Ending -->
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
                             var result = $.parseJSON(response);           
                            if(result.response_code != 1) return result.error_msg; 
                            else
                            toastr.success("Arts Updated Sucessfully", "Update Notifications"); 
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },validate: function(value){
                     if(value != "0" && value != "1" && value != "2")
                     {
                     return 'Required Field';
                     }
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
                             var result = $.parseJSON(response);           
                            if(result.response_code != 1) return result.error_msg; 
                            else
                            toastr.success("Science Updated Sucessfully", "Update Notifications"); 
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },validate: function(value){
                     if(value != "0" && value != "1" && value != "2")
                     {
                     return 'Required Field';
                     }
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
                             var result = $.parseJSON(response);           
                            if(result.response_code != 1) return result.error_msg; 
                            else
                            toastr.success("Commerce Updated Sucessfully", "Update Notifications"); 
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },validate: function(value){
                     if(value != "0" && value != "1" && value != "2")
                     {
                     return 'Required Field';
                     }
                  }
               });

               $('#emis_school_enrolment_vocational').editable({
                   inputclass: 'form-control input-medium',
                   source: yesno,
                   type: 'select2',
                   pk: 1,
                   name: 'emis_school_enrolment_vocational',
                   title: 'Select the availability',
                   success:function(response, newValue) {            
                             var result = $.parseJSON(response);           
                            if(result.response_code != 1) return result.error_msg; 
                            else
                            toastr.success("Vocational Updated Sucessfully", "Update Notifications"); 
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },validate: function(value){
                     if(value != "0" && value != "1" && value != "2")
                     {
                     return 'Required Field';
                     }
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
                             var result = $.parseJSON(response);           
                            if(result.response_code != 1) return result.error_msg; 
                            else
                            toastr.success("Other Stream Updated Sucessfully", "Update Notifications"); 
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },validate: function(value){
                     if(value != "0" && value != "1" && value != "2")
                     {
                     return 'Required Field';
                     }
                  }
               });
               
               
               // jquery for enable and disable the textbox
               $('#user .editable').editable('toggleDisabled');
                  
                   // init editable toggler
                   $('#enable1').click(function() {
                       $('#user .editable').editable('toggleDisabled');
                       $("#myFieldset").prop('disabled', function () {
                           return ! $(this).prop('disabled');
                           });
                       // $("input").prop('disabled',function(){
                       //     return ! $(this).prop('disabled');
                       // });
                   });
               
               $(document).ready(function(){

                   // $("input").prop("disabled",true);
               });

               $('#category,#stream').change(function(){
                  if(($('#stream').val()=='arts') && ($('#category').val()=='gen') || ($('#stream').val()=='arts') && ($('#category').val()=='sc') || ($('#stream').val()=='arts') && ($('#category').val()=='st') || ($('#stream').val()=='arts') && ($('#category').val()=='obc') || ($('#stream').val()=='science') && ($('#category').val()=='gen') || ($('#stream').val()=='science') && ($('#category').val()=='sc') || ($('#stream').val()=='science') && ($('#category').val()=='st') || ($('#stream').val()=='science') && ($('#category').val()=='obc') || ($('#stream').val()=='commerce') && ($('#category').val()=='gen') || ($('#stream').val()=='commerce') && ($('#category').val()=='sc') || ($('#stream').val()=='commerce') && ($('#category').val()=='st') || ($('#stream').val()=='commerce') && ($('#category').val()=='obc') || ($('#stream').val()=='vocational') && ($('#category').val()=='gen') || ($('#stream').val()=='vocational') && ($('#category').val()=='sc') || ($('#stream').val()=='vocational') && ($('#category').val()=='st') || ($('#stream').val()=='vocational') && ($('#category').val()=='obc') || ($('#stream').val()=='oth_stream') && ($('#category').val()=='gen') || ($('#stream').val()=='oth_stream') && ($('#category').val()=='sc') || ($('#stream').val()=='oth_stream') && ($('#category').val()=='st') || ($('#stream').val()=='oth_stream') && ($('#category').val()=='obc') ){
                     $('#view').show();
                  }else{
                     $('#view').hide();
                  }
                  
               });

            </script>

         </body>


      </html>