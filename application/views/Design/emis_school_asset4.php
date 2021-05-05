<!DOCTYPE html>

      <html lang="en">
         <!-- BEGIN HEAD -->
         <head>
            <?php $this->load->view('head.php'); ?>
            <!-- BEGIN PAGE LEVEL PLUGINS -->
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
                                    <h1>Asset Information
                                       <small>Physical Facility and Equipment in schools</small>
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
                                             <a href="<?php echo base_url().'Design/emis_school_asset1';?>">
                                                <div class="col-md-3 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">1</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Asset</div>
                                                   <div class="mt-step-content font-grey-cascade">Step 1</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Design/emis_school_asset2';?>">
                                                <div class="col-md-3 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">2</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Asset</div>
                                                   <div class="mt-step-content font-grey-cascade">Step 2</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Design/emis_school_asset3';?>">
                                                <div class="col-md-3 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">3</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Asset</div>
                                                   <div class="mt-step-content font-grey-cascade">Step 3</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Design/emis_school_asset4';?>">
                                                <div class="col-md-3 bg-grey mt-step-col active">
                                                   <div class="mt-step-number bg-white font-grey">4</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Asset Info</div>
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
                                    <div class="portlet light portlet-fit">
                                       <div class="portlet-title">
                                          <div class="caption">
                                             <i class="icon-settings font-dark"></i>
                                             <span class="caption-subject font-dark sbold uppercase">Asset Information Step 4 - school have the following facilities</span>
                                          </div>
                                       </div>
                                       <div class="portlet-body">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <table  id="user" class="table table-bordered table-striped">
                                                   <tr>
                                                      <td>Separate room for Assistant Head Master/Vice Principal</td>
                                                      <td class="col-md-4"><a href="javascript:;" id="seprateroomforassisthmorviceprici" data-type="select2" data-pk="0" data-url="<?php echo base_url().'Design/updateseprateroomforassisthmorviceprici';?>"  data-original-title="Select the Availability">  </a></td>
                                                   </tr>
                                                   <tr>
                                                      <td>Separate common room for girls</td>
                                                      <td><a href="javascript:;" id="sepratecomonromforgirls" data-type="select2" data-pk="0" data-url="<?php echo base_url().'Design/updatesepratecomonromforgirls';?>" data-value="" data-original-title="Select the Availability">  </a></td>
                                                   </tr>
                                                   <tr>
                                                      <td>Staffroom for teachers</td>
                                                      <td><a href="javascript:;" id="staffroomforteachers" data-type="select2" data-pk="0" data-url="<?php echo base_url().'Design/updatestaffroomforteachers';?>" data-value="" data-original-title="Select the Availability">  </a></td>
                                                   </tr>
                                                   <tr>
                                                      <td>Computer lab</td>
                                                      <td><a href="javascript:;" id="computerlab" data-type="select2" data-pk="0" data-url="<?php echo base_url().'Design/updatecomputerlab';?>" data-value="" data-original-title="Select theAvailability">  </a></td>
                                                   </tr>
                                                   <tr>
                                                      <td>Co-curricular/activity room/arts and crafts room</td>
                                                      <td><a href="javascript:;" id="cocurricularactivtyartscraftroom" data-type="select2" data-pk="0" data-url="<?php echo base_url().'Design/updatecocurricularactivtyartscraftroom';?>" data-value="" data-original-title="Select the Availability">  </a></td>
                                                   </tr>
                                                   <tr>
                                                      <td>Staff quarters (including residential quarters for head Master/Principal and <br> Asst.Head Master/Vice Principal)</td>
                                                      <td><a href="javascript:;" id="staffquarters" data-type="select2" data-pk="0" data-url="<?php echo base_url().'Design/updatestaffquarters';?>" data-value="" data-original-title="Select the Availability">  </a></td>
                                                   </tr>
                                                   <tr>
                                                      <td>Integrated science laboratory (integrated laboratory is the one in which Physics,<br> Chemistry and Biology practical are held) for Secondary sections only</td>
                                                      <td><a href="javascript:;" id="integratedsciencelab" data-type="select2" data-pk="0" data-url="<?php echo base_url().'Design/updateintegratedsciencelab';?>" data-value="" data-original-title="Select the Availability">  </a></td>
                                                   </tr>
                                                   <tr>
                                                      <td>Library room</td>
                                                      <td><a href="javascript:;" id="libraryroom" data-type="select2" data-pk="0" data-url="<?php echo base_url().'Design/updatelibraryroom';?>" data-value="" data-original-title="Select the Availability">  </a></td>
                                                   </tr>
                                                </table>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="portlet-title">
                                          <div class="caption">
                                             <i class="icon-settings font-dark"></i>
                                             <span class="caption-subject font-dark sbold uppercase">Asset Information Step 4 - school have the following equipments in working/usable condition</span>
                                          </div>
                                       </div>
                                       <?php $user_type_id = $this->session->userdata('emis_user_type_id'); ?> 
                                       <div class="portlet-body">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <table id="user" class="table table-bordered">
                                                   <thead>
                                                      <tr>
                                                         <th>Equipment/Facility</th>
                                                         <th class="col-md-4">Availability</th>
                                                         </th>
                                                      </tr>
                                                   </thead>
                                                   <tr>
                                                      <td>Audio/Visual/Public Address System</td>
                                                      <td><a href="javascript:;" id="equipmntfacavail" data-type="select2" data-pk="0" data-url="<?php echo base_url().'Design/updateschoolequipmntfacavail';?>" data-value="" data-original-title="Select the Availability">  </a></td>
                                                   </tr>
                                                   <tr>
                                                      <td>Fire Extinguisher</td>
                                                      <td><a href="javascript:;" id="equipmntfacavailfireex" data-type="select2" data-pk="0" data-url="<?php echo base_url().'Design/updateschoolequipmntfacavailfireex';?>" data-value="" data-original-title="Select the Availability">  </a></td>
                                                   </tr>
                                                   <tr>
                                                      <td>Science Kit <sup>2</sup></td>
                                                      <td><a href="javascript:;" id="equipmntfacavailsciencekit" data-type="select2" data-pk="0" data-url="<?php echo base_url().'Design/updateschoolequipmntfacavailsciencekit';?>" data-value="" data-original-title="Select the Availability">  </a></td>
                                                   </tr>
                                                   <tr>
                                                      <td>Math's Kit <sup>3</sup></td>
                                                      <td><a href="javascript:;" id="equipmntfacavailmathkit" data-type="select2" data-pk="0" data-url="<?php echo base_url().'Design/updateschoolequipmntfacavailmathkit';?>" data-value="" data-original-title="Select theAvailability">  </a></td>
                                                   </tr>
                                                   <tr>
                                                      <td>Biometric device</td>
                                                      <td><a href="javascript:;" id="equipmntfacavailbiometricdevice" data-type="select2" data-pk="0" data-url="<?php echo base_url().'Design/updateschoolequipmntfacavailbiometricdevice';?>" data-value="" data-original-title="Select the Availability">  </a></td>
                                                   </tr>
                                                </table>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="portlet light portlet-fit">
                                       <div class="portlet-title">
                                          <div class="caption">
                                             <i class="icon-settings font-dark"></i>
                                             <span class="caption-subject font-dark sbold uppercase">Asset Information Step 4 - school have the following Laboratories</span>
                                          </div>
                                       </div>
                                       <div class="portlet-body">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <form id="form" method="post" action="<?php echo base_url().'Design/updatecomputersfunctional'; ?>">
                                                   <table id="user" class="table table-bordered">
                                                      <thead>
                                                         <tr>
                                                            <th>Laboratory</th>
                                                            <th>Separate Room Available</th>
                                                            <th><span id="presentheading">Present Condition</span></th>
                                                         </tr>
                                                      </thead>
                                                      <tbody>
                                                         <tr>
                                                            <td>Physics</td>
                                                            <td>
                                                               <select class="col-md-4 form-control" id="physicsroomavail">
                                                                  <option value="" selected="selected">Select the Availability</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="0">No</option>
                                                               </select>
                                                               <br>
                                                               <font style="color:#dd4b39;">
                                                               <span id="physicsroomavail_warning"></span>
                                                               </font>
                                                            </td>
                                                            <td>
                                                               <select class="col-md-4 form-control" id="physicspresentcondition">
                                                                  <option value="" selected="selected">Select the Present Condition</option>
                                                                  <option value="0">Not Applicable</option>
                                                                  <option value="1">Fully equipped</option>
                                                                  <option value="2">Partially equipped</option>
                                                                  <option value="3">Not equipped</option>
                                                                  <option value="4">Not Available</option>
                                                               </select>
                                                               <font style="color:#dd4b39;">
                                                               <span id="physicspresentcondition_warning"></span>
                                                               </font>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td>Chemistry</td>
                                                            <td>
                                                               <select class="col-md-4 form-control" id="chemistryroomavail">
                                                                  <option value="" selected="selected">Select the Availability</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="0">No</option>
                                                               </select>
                                                               <font style="color: #dd4b39;">
                                                               <span id="chemistryroomavail_warning"></span>
                                                               </font>
                                                            </td>
                                                            <td>
                                                               <select class="col-md-4 form-control" id="chemistrypresentcondtion">
                                                                  <option value="" selected="selected">Select the Present Condition</option>
                                                                  <option value="0">Not Applicable</option>
                                                                  <option value="1">Fully equipped</option>
                                                                  <option value="2">Partially equipped</option>
                                                                  <option value="3">Not equipped</option>
                                                                  <option value="4">Not Available</option>
                                                               </select>
                                                               <font style="color:#dd4b39;">
                                                               <span id="chemistrypresentcondition_warning"></span>
                                                               </font>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td>Biology</td>
                                                            <td>
                                                               <select class="col-md-4 form-control" id="biologyroomavail">
                                                                  <option value="" selected="selected">Select the Availability</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="0">No</option>
                                                               </select>
                                                               <font style="color: #dd4b39;">
                                                               <span id="biologyroomavail_warning"></span>
                                                               </font>
                                                            </td>
                                                            <td>
                                                               <select class="col-md-4 form-control" id="biologypresentcondition">
                                                                  <option value="" selected="selected">Select the Present Condition</option>
                                                                  <option value="0">Not Applicable</option>
                                                                  <option value="1">Fully equipped</option>
                                                                  <option value="2">Partially equipped</controption>
                                                                  <option value="3">Not equipped</option>
                                                                  <option value="4">Not Available</option>
                                                               </select>
                                                               <font style="color:#dd4b39;">
                                                               <span id="biologypresentcondition_warning"></span>
                                                               </font>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td>Computer</td>
                                                            <td>
                                                               <select class="col-md-4 form-control" id="computerroomavail">
                                                                  <option value="" selected="selected">Select the Availability</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="0">No</option>
                                                               </select>
                                                               <font style="color: #dd4b39;">
                                                               <span id="computerroomavail_warning"></span>
                                                               </font>
                                                            </td>
                                                            <td>
                                                               <select class="col-md-4 form-control" id="computerpresentcondition">
                                                                  <option value="" selected="selected">Select the Present Condition</option>
                                                                  <option value="0">Not Applicable</option>
                                                                  <option value="1">Fully equipped</option>
                                                                  <option value="2">Partially equipped</option>
                                                                  <option value="3">Not equipped</option>
                                                                  <option value="4">Not Available</option>
                                                               </select>
                                                               <font style="color: #dd4b39;">
                                                               <span id="computerpresentcondition_warning"></span>
                                                               </font>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td>Mathematics</td>
                                                            <td>
                                                               <select class="col-md-4 form-control" id="mathsroomavail">
                                                                  <option value="" selected="selected">Select the Availability</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="0">No</option>
                                                               </select>
                                                               <font style="color: #dd4b39;">
                                                               <span id="mathsroomavail_warning"></span>
                                                               </font>
                                                            </td>
                                                            <td>
                                                               <select class="col-md-4 form-control" id="mathspresentcondition">
                                                                  <option value="" selected="selected">Select the Present Condition</option>
                                                                  <option value="0">Not Applicable</option>
                                                                  <option value="1">Fully equipped</option>
                                                                  <option value="2">Partially equipped</option>
                                                                  <option value="3">Not equipped</option>
                                                                  <option value="4">Not Available</option>
                                                               </select>
                                                               <font style="color: #dd4b39;">
                                                               <span id="mathspresentcondition_warning"></span>
                                                               </font>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td>Language</td>
                                                            <td>
                                                               <select class="col-md-4 form-control" id="languageroomavail">
                                                                  <option value="" selected="selected">Select the Availability</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="0">No</option>
                                                               </select>
                                                               <font style="color: #dd4b39;">
                                                               <span id="languageroomavail_warning"></span>
                                                               </font>
                                                            </td>
                                                            <td>
                                                               <select class="col-md-4 form-control" id="languagepresentcondition">
                                                                  <option value="" selected="selected">Select the Present Condition</option>
                                                                  <option value="0">Not Applicable</option>
                                                                  <option value="1">Fully equipped</option>
                                                                  <option value="2">Partially equipped</option>
                                                                  <option value="3">Not equipped</option>
                                                                  <option value="4">Not Available</option>
                                                               </select>
                                                               <font style="color: #dd4b39;">
                                                               <span id="languagepresentcondition_warning"></span>
                                                               </font>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td>Geography</td>
                                                            <td>
                                                               <select class="col-md-4 form-control" id="geographyroomavail">
                                                                  <option value="" selected="selected">Select the Availability</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="0">No</option>
                                                               </select>
                                                               <font style="color: #dd4b39;">
                                                               <span id="geographyroomavail_warning"></span>
                                                               </font>
                                                            </td>
                                                            <td>
                                                               <select class="col-md-4 form-control" id="goegraphypresentcondition">
                                                                  <option value="" selected="selected">Select the Present Condition</option>
                                                                  <option value="0">Not Applicable</option>
                                                                  <option value="1">Fully equipped</option>
                                                                  <option value="2">Partially equipped</option>
                                                                  <option value="3">Not equipped</option>
                                                                  <option value="4">Not Available</option>
                                                               </select>
                                                               <font style="color: #dd4b39;">
                                                               <span id="goegraphypresentcondition_warning"></span>
                                                               </font>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td>Home Science</td>
                                                            <td>
                                                               <select class="col-md-4 form-control" id="homescienceroomavail">
                                                                  <option value="" selected="selected">Select the Availability</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="0">No</option>
                                                               </select>
                                                               <font style="color: #dd4b39;">
                                                               <span id="homescienceroomavail_warning"></span>
                                                               </font>
                                                            </td>
                                                            <td>
                                                               <select class="col-md-4 form-control" id="homesciencepresentcondition">
                                                                  <option value="" selected="selected">Select the Present Condition</option>
                                                                  <option value="0">Not Applicable</option>
                                                                  <option value="1">Fully equipped</option>
                                                                  <option value="2">Partially equipped</option>
                                                                  <option value="3">Not equipped</option>
                                                                  <option value="4">Not Available</option>
                                                               </select>
                                                               <font style="color: #dd4b39;">
                                                               <span id="homesciencepresentcondition_warning"></span>
                                                               </font>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td>Psychology</td>
                                                            <td>
                                                               <select class="col-md-4 form-control" id="psychologyroomavail">
                                                                  <option value="" selected="selected">Select the Availability</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="0">No</option>
                                                               </select>
                                                               <font style="color: #dd4b39;">
                                                               <span id="psychologyroomavail_warning"></span>
                                                               </font>
                                                            </td>
                                                            <td>
                                                               <select class="col-md-4 form-control" id="psychologypresentcondition">
                                                                  <option value="" selected="selected">Select the Present Condition</option>
                                                                  <option value="0">Not Applicable</option>
                                                                  <option value="1">Fully equipped</option>
                                                                  <option value="2">Partially equipped</option>
                                                                  <option value="3">Not equipped</option>
                                                                  <option value="4">Not Available</option>
                                                               </select>
                                                               <font style="color: #dd4b39;">
                                                               <span id="psychologypresentcondition_warning"></span>
                                                               </font>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                   <div class="form-actions">
                                                      <center>
                                                         <input type="submit" class="btn green" value="Submit">
                                                      </center>
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
                          "1": "Yes",
                          "2": "No"        
                      }, function(k, v) {
                          yesno.push({
                              id: k,
                              text: v
                          });
                      });
                       $('#equipmntfacavail').editable({
                          inputclass: 'form-control input-medium',
                          source: yesno,
                          type: 'select2',
                          pk: 1,
                          name: 'equipmntfacavail',
                          title: 'Select the Audio/video/public address system',
                          success: function(response, newValue) {            
                                   if(response == 0) return "Unable to update.Please try later"; 
                          },
                          error: function(response, newValue) {
                                   return 'Service unavailable. Please try later.';
                           },validate: function(value){
                            if(value != "1" && value != "2")
                              {
                              return 'Required Field';
                              }
                           }
                      });
               
                      
                       $('#equipmntfacavailfireex').editable({
                          inputclass: 'form-control input-medium',
                          source: yesno,
                          type: 'select2',
                          pk: 1,
                          name: 'equipmntfacavailfireex',
                          title: 'Select the Fire Extinguisher',
                          success: function(response, newValue) {            
                                   if(response == 0) return "Unable to update.Please try later"; 
                          },
                          error: function(response, newValue) {
                                   return 'Service unavailable. Please try later.';
                           },validate: function(value){
                            if(value != "1" && value != "2")
                              {
                              return 'Required Field';
                              }
                           }
                      });
               
                       
                       $('#equipmntfacavailsciencekit').editable({
                          inputclass: 'form-control input-medium',
                          source: yesno,
                          type: 'select2',
                          pk: 1,
                          name: 'equipmntfacavailsciencekit',
                          title: 'Select the Science Kit',
                          success: function(response, newValue) {            
                                   if(response == 0) return "Unable to update.Please try later"; 
                          },
                          error: function(response, newValue) {
                                   return 'Service unavailable. Please try later.';
                           },validate: function(value){
                            if(value != "1" && value != "2")
                              {
                              return 'Required Field';
                              }
                           }
                      });
               
                      
                       $('#equipmntfacavailmathkit').editable({
                          inputclass: 'form-control input-medium',
                          source: yesno,
                          type: 'select2',
                          pk: 1,
                          name: 'equipmntfacavailmathkit',
                          title: 'Select the Math Kit',
                          success: function(response, newValue) {            
                                   if(response == 0) return "Unable to update.Please try later"; 
                          },
                          error: function(response, newValue) {
                                   return 'Service unavailable. Please try later.';
                           },validate: function(value){
                            if(value != "1" && value != "2")
                              {
                              return 'Required Field';
                              }
                           }
                      });
               
               
                       $('#equipmntfacavailbiometricdevice').editable({
                          inputclass: 'form-control input-medium',
                          source: yesno,
                          type: 'select2',
                          pk: 1,
                          name: 'equipmntfacavailbiometricdevice',
                          title: 'Select the Biometric device',
                          success: function(response, newValue) {            
                                   if(response == 0) return "Unable to update.Please try later"; 
                          },
                          error: function(response, newValue) {
                                   return 'Service unavailable. Please try later.';
                           },validate: function(value){
                            if(value != "1" && value != "2")
                              {
                              return 'Required Field';
                              }
                           }
                      });
               
                      
               
                       $('#seprateroomforassisthmorviceprici').editable({
                          inputclass: 'form-control input-medium',
                          source: yesno,
                          type: 'select2',
                          pk: 1,
                          name: 'seprateroomforassisthmorviceprici',
                          title: 'Select the Availability',
                          success: function(response, newValue) {            
                                   if(response == 0) return "Unable to update.Please try later"; 
                          },
                          error: function(response, newValue) {
                                   return 'Service unavailable. Please try later.';
                           },validate: function(value){
                            if(value != "1" && value != "2")
                              {
                              return 'Required Field';
                              }
                           }
                      });
                       
                       
                       $('#sepratecomonromforgirls').editable({
                          inputclass: 'form-control input-medium',
                          source: yesno,
                          type: 'select2',
                          pk: 1,
                          name: 'sepratecomonroomforgirls',
                          title: 'Select the Availability',
                          success: function(response, newValue) {            
                                   if(response == 0) return "Unable to update.Please try later"; 
                          },
                          error: function(response, newValue) {
                                   return 'Service unavailable. Please try later.';
                           },validate: function(value){
                            if(value != "1" && value != "2")
                              {
                              return 'Required Field';
                              }
                           }
                      });
               
                       $('#staffroomforteachers').editable({
                          inputclass: 'form-control input-medium',
                          source: yesno,
                          type: 'select2',
                          pk: 1,
                          name: 'staffroomforteachers',
                          title: 'Select the Availability',
                          success: function(response, newValue) {            
                                   if(response == 0) return "Unable to update.Please try later"; 
                          },
                          error: function(response, newValue) {
                                   return 'Service unavailable. Please try later.';
                           },validate: function(value){
                            if(value != "1" && value != "2")
                              {
                              return 'Required Field';
                              }
                           }
                      });
                      
                      $('#computerlab').editable({
                          inputclass: 'form-control input-medium',
                          source: yesno,
                          type: 'select2',
                          pk: 1,
                          name: 'computerlab',
                          title: 'Select the Availability',
                          success: function(response, newValue) {            
                                   if(response == 0) return "Unable to update.Please try later"; 
                          },
                          error: function(response, newValue) {
                                   return 'Service unavailable. Please try later.';
                           },validate: function(value){
                            if(value != "1" && value != "2")
                              {
                              return 'Required Field';
                              }
                           }
                      });
                      
               
                      $('#cocurricularactivtyartscraftroom').editable({
                          inputclass: 'form-control input-medium',
                          source: yesno,
                          type: 'select2',
                          pk: 1,
                          name: 'cocurricularactivtyartscraftroom',
                          title: 'Select the Availability',
                          success: function(response, newValue) {            
                                   if(response == 0) return "Unable to update.Please try later"; 
                          },
                          error: function(response, newValue) {
                                   return 'Service unavailable. Please try later.';
                           },validate: function(value){
                            if(value != "1" && value != "2")
                              {
                              return 'Required Field';
                              }
                           }
                      });
                      
               
                      $('#staffquarters').editable({
                          inputclass: 'form-control input-medium',
                          source: yesno,
                          type: 'select2',
                          pk: 1,
                          name: 'staffquarters',
                          title: 'Select the Availability',
                          success: function(response, newValue) {            
                                   if(response == 0) return "Unable to update.Please try later"; 
                          },
                          error: function(response, newValue) {
                                   return 'Service unavailable. Please try later.';
                           },validate: function(value){
                            if(value != "1" && value != "2")
                              {
                              return 'Required Field';
                              }
                           }
                      });
               
                      $('#integratedsciencelab').editable({
                          inputclass: 'form-control input-medium',
                          source: yesno,
                          type: 'select2',
                          pk: 1,
                          name: 'integratedsciencelab',
                          title: 'Select the Availability',
                          success: function(response, newValue) {            
                                   if(response == 0) return "Unable to update.Please try later"; 
                          },
                          error: function(response, newValue) {
                                   return 'Service unavailable. Please try later.';
                           },validate: function(value){
                            if(value != "1" && value != "2")
                              {
                              return 'Required Field';
                              }
                           }
                      });
               
                      $('#libraryroom').editable({
                          inputclass: 'form-control input-medium',
                          source: yesno,
                          type: 'select2',
                          pk: 1,
                          name: 'libraryroom',
                          title: 'Select the Availability',
                          success: function(response, newValue) {            
                                   if(response == 0) return "Unable to update.Please try later"; 
                          },
                          error: function(response, newValue) {
                                   return 'Service unavailable. Please try later.';
                           },validate: function(value){
                            if(value != "1" && value != "2")
                              {
                              return 'Required Field';
                              }
                           }
                      });
               
                      // jquery for enable and disable the textbox
                      $('#user .editable').editable('toggleDisabled');
                          $('#physicspresentcondition,#chemistrypresentcondtion,#biologypresentcondition,#computerpresentcondition,#biologypresentcondition,#computerpresentcondition,#mathspresentcondition,#languagepresentcondition,#goegraphypresentcondition,#homesciencepresentcondition,#psychologypresentcondition,#presentheading').hide();
                          // init editable toggler
                          $('#enable1').click(function() {
               
                              $('#user .editable').editable('toggleDisabled');
                              $("#myFieldset").prop('disabled', function () {
                                  return ! $(this).prop('disabled');
                              });
                               $("input").prop('disabled',function(){
                                  return ! $(this).prop('disabled');
                              });
                               $("select").prop('disabled',function(){
                                  return ! $(this).prop('disabled');
                              });
                          });
               
                          $(document).ready(function(){
                          $("input").prop("disabled",true);
                      });
                          $(document).ready(function(){
                            $("select").prop("disabled",true);
                      });
                    
            </script>
         </body>
      </html>
                         
               