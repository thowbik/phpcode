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
                                             <a href="<?php echo base_url().'Design/emis_school_enrolment1';?>">
                                                <div class="col-md-3 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">1</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Enrolment</div>
                                                   <div class="mt-step-content font-grey-cascade">Step 1</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Design/emis_school_enrolment2';?>">
                                                <div class="col-md-3 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">2</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Enrolment</div>
                                                   <div class="mt-step-content font-grey-cascade">Step 2</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Design/emis_school_enrolment3';?>">
                                                <div class="col-md-3 bg-grey mt-step-col active">
                                                   <div class="mt-step-number bg-white font-grey">3</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Enrolment</div>
                                                   <div class="mt-step-content font-grey-cascade">Step 3</div>
                                                </div>
                                             </a>

                                             <a href="<?php echo base_url().'Design/emis_school_enrolment4';?>">
                                                <div class="col-md-3 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">3</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Enrolment</div>
                                                   <div class="mt-step-content font-grey-cascade">Step 4</div>
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
                                                            <a href="javascript:;" id="emis_school_enrolment_arts" data-type="select2" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_enrolment_arts" data-original-title="Select Availability">  </a> 
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td> Science: </td>
                                                         <td style="width:50%">
                                                            <a href="javascript:;" id="emis_school_enrolment_science" data-type="select2" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_enrolment_science" data-value="" data-original-title="Select Availability">  </a> 
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td> Commerce: </td>
                                                         <td style="width:50%">
                                                            <a href="javascript:;" id="emis_school_enrolment_Commerce" data-type="select2" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_enrolment_commerce" data-value="" data-original-title="Select Availability">  </a> 
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td> Vocational: </td>
                                                         <td style="width:50%">
                                                            <a href="javascript:;" id="emis_school_enrolment_vocational" data-type="select2" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_enrolment_vocational" data-value="" data-original-title="Select Availability">  </a> 
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td> Other Streams: </td>
                                                         <td style="width:50%">
                                                            <a href="javascript:;" id="emis_school_enrolment_otherstreams" data-type="select2" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_enrolment_otherstreams" data-value="" data-original-title="Select Availability">  </a> 
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
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">SC</td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">ST</td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">OBC</td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Total</td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                  </tr>
                                                                   <tr>
                                                                     <td rowspan="5"><br><br><br><br><center>Science</center></td>
                                                                     <td colspan="2">General</td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">SC</td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">ST</td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">OBC</td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Total</td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                  </tr>

                                                                  <tr>
                                                                     <td rowspan="5"><br><br><br><br><center>Commerce</center></td>
                                                                     <td colspan="2">General</td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">SC</td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">ST</td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">OBC</td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Total</td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                  </tr>


                                                                  <tr>
                                                                     <td rowspan="5"><br><br><br><br><center>Vocational</center></td>
                                                                     <td colspan="2">General</td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">SC</td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">ST</td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">OBC</td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Total</td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                  </tr>

                                                                  <tr>
                                                                     <td rowspan="5"><br><br><br><br><center>Other streams</center></td>
                                                                     <td colspan="2">General</td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">SC</td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">ST</td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">OBC</td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="2">Total</td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                     <td></td>
                                                                  </tr>
                                                                </tbody>
                                                            </table>
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
               
               
               // jquery for enable and disable the textbox
               $('#user .editable').editable('toggleDisabled');
                  
                   // init editable toggler
                   $('#enable1').click(function() {
                       $('#user .editable').editable('toggleDisabled');
                       $("#myFieldset").prop('disabled', function () {
                           return ! $(this).prop('disabled');
                           });
                       $("input").prop('disabled',function(){
                           return ! $(this).prop('disabled');
                       });
                   });
               
               $(document).ready(function(){

                   $("input").prop("disabled",true);
               });

               

            </script>

         </body>


      </html>