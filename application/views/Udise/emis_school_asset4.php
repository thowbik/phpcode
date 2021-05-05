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
                                             <a href="<?php echo base_url().'Udise_asset/emis_school_asset1';?>">
                                                <div class="col-md-3 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">1</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Asset</div>
                                                   <div class="mt-step-content font-grey-cascade">Step 1</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Udise_asset/emis_school_asset2';?>">
                                                <div class="col-md-3 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">2</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Asset</div>
                                                   <div class="mt-step-content font-grey-cascade">Step 2</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Udise_asset/emis_school_asset3';?>">
                                                <div class="col-md-3 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">3</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Asset</div>
                                                   <div class="mt-step-content font-grey-cascade">Step 3</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Udise_asset/emis_school_asset4';?>">
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
                                             <span class="caption-subject font-dark sbold uppercase">Asset Information Step 4 - Physical Facilities and Equipment in Schools with Secondary/Higher Secondary Sections </span><small> (Does the school have the following facilities)</small>
                                          </div>
                                       </div>
                                       <div class="portlet-body">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <table  id="user" class="table table-bordered table-striped">
                                                   <tr>
                                                      <td>Separate room for Assistant Head Master/Vice Principal</td>
                                                      <td class="col-md-4"><a href="javascript:;" id="seprateroomforassisthmorviceprici" data-type="select2" data-value="<?php echo $seprm_asst_hmorvicpric; ?>" data-pk="1" data-url="<?php echo base_url().'Udise_asset/updateseprateroomforassisthmorviceprici';?>"  data-original-title="Select the Availability">  </a></td>
                                                   </tr>
                                                   <tr>
                                                      <td>Separate common room for girls</td>
                                                      <td><a href="javascript:;" id="sepratecomonromforgirls" data-type="select2" data-value="<?php echo $sepcomrom_gls; ?>" data-pk="1" data-url="<?php echo base_url().'Udise_asset/updatesepratecomonromforgirls';?>" data-original-title="Select the Availability">  </a></td>
                                                   </tr>
                                                   <tr>
                                                      <td>Staffroom for teachers</td>
                                                      <td><a href="javascript:;" id="staffroomforteachers" data-type="select2" data-pk="1" data-url="<?php echo base_url().'Udise_asset/updatestaffroomforteachers';?>" data-value="<?php echo $stfrom_tchrs; ?>" data-original-title="Select the Availability">  </a></td>
                                                   </tr>
                                                   <tr>
                                                      <td>Computer lab</td>
                                                      <td><a href="javascript:;" id="computerlab" data-type="select2" data-pk="1"  data-url="<?php echo base_url().'Udise_asset/updatecomputerlab';?>" data-value="<?php echo $comp_lab; ?>" data-original-title="Select theAvailability">  </a></td>
                                                   </tr>
                                                   <tr>
                                                      <td>Co-curricular/activity room/arts and crafts room</td>
                                                      <td><a href="javascript:;" id="cocurricularactivtyartscraftroom" data-type="select2" data-pk="0" data-url="<?php echo base_url().'Udise_asset/updatecocurricularactivtyartscraftroom';?>" data-value="<?php echo $cocriclractvtyartsrom; ?>" data-original-title="Select the Availability">  </a></td>
                                                   </tr>
                                                   <tr>
                                                      <td>Staff quarters (including residential quarters for head Master/Principal and <br> Asst.Head Master/Vice Principal)</td>
                                                      <td><a href="javascript:;" id="staffquarters" data-type="select2" data-pk="1" data-url="<?php echo base_url().'Udise_asset/updatestaffquarters';?>" data-value="<?php echo $staff_quarters; ?>" data-original-title="Select the Availability">  </a></td>
                                                   </tr>
                                                   <tr>
                                                      <td>Integrated science laboratory (integrated laboratory is the one in which Physics,<br> Chemistry and Biology practical are held) for Secondary sections only</td>
                                                      <td><a href="javascript:;" id="integratedsciencelab" data-type="select2" data-pk="1" data-url="<?php echo base_url().'Udise_asset/updateintegratedsciencelab';?>" data-value="<?php echo $integrtdscinc_lab; ?>" data-original-title="Select the Availability">  </a></td>
                                                   </tr>
                                                   <tr>
                                                      <td>Library room</td>
                                                      <td><a href="javascript:;" id="libraryroom" data-type="select2" data-pk="" data-url="<?php echo base_url().'Udise_asset/updatelibraryroom';?>" data-value="<?php echo $lib_room; ?>" data-original-title="Select the Availability">  </a></td>
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
                                                      <td><a href="javascript:;" id="equipmntfacavail" data-type="select2" data-pk="1" data-url="<?php echo base_url().'Udise_asset/updateschoolequipmntfacavail';?>" data-value="<?php echo $ado_visl_pub_addr_sys; ?>" data-original-title="Select the Availability">  </a></td>
                                                   </tr>
                                                   <tr>
                                                      <td>Fire Extinguisher</td>
                                                      <td><a href="javascript:;" id="equipmntfacavailfireex" data-type="select2" data-pk="1" data-url="<?php echo base_url().'Udise_asset/updateschoolequipmntfacavailfireex';?>" data-value="<?php echo $fire_exting; ?>" data-original-title="Select the Availability">  </a></td>
                                                   </tr>
                                                   <tr>
                                                      <td>Science Kit <sup>2</sup></td>
                                                      <td><a href="javascript:;" id="equipmntfacavailsciencekit" data-type="select2" data-pk="1" data-url="<?php echo base_url().'Udise_asset/updateschoolequipmntfacavailsciencekit';?>" data-value="<?php echo $scince_kit; ?>" data-original-title="Select the Availability">  </a></td>
                                                   </tr>
                                                   <tr>
                                                      <td>Math's Kit <sup>3</sup></td>
                                                      <td><a href="javascript:;" id="equipmntfacavailmathkit" data-type="select2" data-pk="1" data-url="<?php echo base_url().'Udise_asset/updateschoolequipmntfacavailmathkit';?>" data-value="<?php echo $math_kit; ?>" data-original-title="Select theAvailability">  </a></td>
                                                   </tr>
                                                   <tr>
                                                      <td>Biometric device</td>
                                                      <td><a href="javascript:;" id="equipmntfacavailbiometricdevice" data-type="select2" data-pk="1" data-url="<?php echo base_url().'Udise_asset/updateschoolequipmntfacavailbiometricdevice';?>" data-value="<?php echo $biomet_dev; ?>" data-original-title="Select the Availability">  </a></td>
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
                                          <!-- error displaying part -->
                                          <?php if ($this->session->flashdata('asset4')){ ?> 
                                                <!-- BEGIN PAGE CONTENT INNER -->
                                                   <div class="page-content-inner">
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="note note-danger note-bordered">
                                                               <?php echo $this->session->flashdata('asset4'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <!-- END PAGE CONTENT INNER -->
                                             <?php } ?>
                                       <!-- error displaying part end -->
                                          <div class="row">
                                             <div class="col-md-12">
                                                <form id="form" method="post" action="<?php echo base_url().'Udise_asset/updateasset4'; ?>">
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
                                                               <select class="col-md-4 form-control" name="physicsroomavail" id="physicsroomavail">
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
                                                               <select class="col-md-4 form-control" name="physicspresentcondition" id="physicspresentcondition">
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
                                                               <select class="col-md-4 form-control" name="chemistryroomavail" id="chemistryroomavail">
                                                                  <option value="" selected="selected">Select the Availability</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="0">No</option>
                                                               </select>
                                                               <font style="color: #dd4b39;">
                                                               <span id="chemistryroomavail_warning"></span>
                                                               </font>
                                                            </td>
                                                            <td>
                                                               <select class="col-md-4 form-control" name="chemistrypresentcondtion" id="chemistrypresentcondtion">
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
                                                               <select class="col-md-4 form-control" name="biologyroomavail" id="biologyroomavail">
                                                                  <option value="" selected="selected">Select the Availability</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="0">No</option>
                                                               </select>
                                                               <font style="color: #dd4b39;">
                                                               <span id="biologyroomavail_warning"></span>
                                                               </font>
                                                            </td>
                                                            <td>
                                                               <select class="col-md-4 form-control" name="biologypresentcondition" id="biologypresentcondition">
                                                                  <option value="" selected="selected">Select the Present Condition</option>
                                                                  <option value="0">Not Applicable</option>
                                                                  <option value="1">Fully equipped</option>
                                                                  <option value="2">Partially equipped</option>
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
                                                               <select class="col-md-4 form-control" name="computerroomavail" id="computerroomavail">
                                                                  <option value="" selected="selected">Select the Availability</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="0">No</option>
                                                               </select>
                                                               <font style="color: #dd4b39;">
                                                               <span id="computerroomavail_warning"></span>
                                                               </font>
                                                            </td>
                                                            <td>
                                                               <select class="col-md-4 form-control" name="computerpresentcondition" id="computerpresentcondition">
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
                                                               <select class="col-md-4 form-control" name="mathsroomavail" id="mathsroomavail">
                                                                  <option value="" selected="selected">Select the Availability</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="0">No</option>
                                                               </select>
                                                               <font style="color: #dd4b39;">
                                                               <span id="mathsroomavail_warning"></span>
                                                               </font>
                                                            </td>
                                                            <td>
                                                               <select class="col-md-4 form-control" name="mathspresentcondition" id="mathspresentcondition">
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
                                                               <select class="col-md-4 form-control" name="languageroomavail" id="languageroomavail">
                                                                  <option value="" selected="selected">Select the Availability</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="0">No</option>
                                                               </select>
                                                               <font style="color: #dd4b39;">
                                                               <span id="languageroomavail_warning"></span>
                                                               </font>
                                                            </td>
                                                            <td>
                                                               <select class="col-md-4 form-control" name="languagepresentcondition" id="languagepresentcondition">
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
                                                               <select class="col-md-4 form-control" name="geographyroomavail" id="geographyroomavail">
                                                                  <option value="" selected="selected">Select the Availability</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="0">No</option>
                                                               </select>
                                                               <font style="color: #dd4b39;">
                                                               <span id="geographyroomavail_warning"></span>
                                                               </font>
                                                            </td>
                                                            <td>
                                                               <select class="col-md-4 form-control" name="goegraphypresentcondition" id="goegraphypresentcondition">
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
                                                               <select class="col-md-4 form-control" name="homescienceroomavail" id="homescienceroomavail">
                                                                  <option value="" selected="selected">Select the Availability</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="0">No</option>
                                                               </select>
                                                               <font style="color: #dd4b39;">
                                                               <span id="homescienceroomavail_warning"></span>
                                                               </font>
                                                            </td>
                                                            <td>
                                                               <select class="col-md-4 form-control" name="homesciencepresentcondition" id="homesciencepresentcondition">
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
                                                               <select class="col-md-4 form-control" name="psychologyroomavail" id="psychologyroomavail">
                                                                  <option value="" selected="selected">Select the Availability</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="0">No</option>
                                                               </select>
                                                               <font style="color: #dd4b39;">
                                                               <span id="psychologyroomavail_warning"></span>
                                                               </font>
                                                            </td>
                                                            <td>
                                                               <select class="col-md-4 form-control" name="psychologypresentcondition" id="psychologypresentcondition">
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
                       $('#equipmntfacavail').editable({
                          inputclass: 'form-control input-medium',
                          source: yesno,
                          // type: 'select2',
                          // pk: 1,
                          // name: 'equipmntfacavail',
                          // title: 'Select the Audio/video/public address system',
                          success: function(response, newValue) {
                                    var result = $.parseJSON(response);
                                    if(result.response_code != 1) return result.error_msg;
                                    else
                                    toastr.success("Audio/Visual/Public Address System Updated Successfully", "Update Notifications"); 
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
                          // type: 'select2',
                          // pk: 1,
                          // name: 'equipmntfacavailfireex',
                          // title: 'Select the Fire Extinguisher',
                          success: function(response, newValue) {
                                    var result = $.parseJSON(response);
                                    if(result.response_code != 1) return result.error_msg;
                                    else
                                    toastr.success("Fire Extinguisher Updated Successfully", "Update Notifications"); 
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
                          // type: 'select2',
                          // pk: 1,
                          // name: 'equipmntfacavailsciencekit',
                          // title: 'Select the Science Kit',
                          success: function(response, newValue) {
                                    var result = $.parseJSON(response);
                                    if(result.response_code != 1) return result.error_msg;
                                    else
                                    toastr.success("Science Kit Updated Successfully", "Update Notifications"); 
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
                          // type: 'select2',
                          // pk: 1,
                          // name: 'equipmntfacavailmathkit',
                          // title: 'Select the Math Kit',
                          success:function(response, newValue) {
                                    var result = $.parseJSON(response);
                                    if(result.response_code != 1) return result.error_msg;
                                    else
                                    toastr.success("Math's Kit Updated Successfully", "Update Notifications"); 
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
                          // type: 'select2',
                          // pk: 1,
                          // name: 'equipmntfacavailbiometricdevice',
                          // title: 'Select the Biometric device',
                          success: function(response, newValue) {
                                    var result = $.parseJSON(response);
                                    if(result.response_code != 1) return result.error_msg;
                                    else
                                    toastr.success("Biometric device Updated Successfully", "Update Notifications"); 
                                    },tion(response, newValue) {
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
                          success: function(response, newValue) {
                                    var result = $.parseJSON(response);
                                    if(result.response_code != 1) return result.error_msg;
                                    else
                                    toastr.success("Separate room for Assistant Head Master/Vice Principal Updated Successfully", "Update Notifications"); 
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
                          success: function(response, newValue) {
                                    var result = $.parseJSON(response);
                                    if(result.response_code != 1) return result.error_msg;
                                    else
                                    toastr.success("Separate common room for girls Updated Successfully", "Update Notifications"); 
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
                          success:function(response, newValue) {
                                    var result = $.parseJSON(response);
                                    if(result.response_code != 1) return result.error_msg;
                                    else
                                    toastr.success("Staff Room for Teachers Updated Successfully", "Update Notifications"); 
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
                          // type: 'select2',
                          // pk: 1,
                          // name: 'computerlab',
                          // title: 'Select the Availability',
                          success: function(response, newValue) {
                                    var result = $.parseJSON(response);
                                    if(result.response_code != 1) return result.error_msg;
                                    else
                                    toastr.success("Computer Lab Updated Successfully", "Update Notifications"); 
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
                           success: function(response, newValue) {
                                    var result = $.parseJSON(response);
                                    if(result.response_code != 1) return result.error_msg;
                                    else
                                    toastr.success("Co-curricular/activity room/arts and crafts room Updated Successfully", "Update Notifications"); 
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
                          success: function(response, newValue) {
                                    var result = $.parseJSON(response);
                                    if(result.response_code != 1) return result.error_msg;
                                    else
                                    toastr.success("Staff Quarters Updated Successfully", "Update Notifications"); 
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
                          success: function(response, newValue) {
                                    var result = $.parseJSON(response);
                                    if(result.response_code != 1) return result.error_msg;
                                    else
                                    toastr.success("Integrated Science Lab Updated Successfully", "Update Notifications"); 
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
                                    var result = $.parseJSON(response);
                                    if(result.response_code != 1) return result.error_msg;
                                    else
                                    toastr.success("Library room Updated Successfully", "Update Notifications"); 
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

                  </script>

                  <script type="text/javascript">
                      
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


                  <?php 
                     $physicsroomavail = $phy_seprom_avl;
                     $physicspresentcondition = $phy_prsntcondit;

                     $chemistryroomavail = $che_seprom_avl;
                     $chemistrypresentcondtion = $che_prsntcondit;
                     $biologyroomavail = $bio_seprom_avl;
                     $biologypresentcondition = $bio_prsntcondit;
                     $computerroomavail = $comp_seprom_avl;
                     $computerpresentcondition = $comp_prsntcondit;
                     $mathsroomavail = $math_seprom_avl;
                     $mathspresentcondition = $math_prsntcondit;
                     $languageroomavail = $lng_seprom_avl;
                     $languagepresentcondition = $lng_prsntcondit;
                     $geographyroomavail = $geo_seprom_avl;
                     $goegraphypresentcondition = $geo_prsntcondit;
                     $homescienceroomavail = $hmescince_seprom_avl;
                     $homesciencepresentcondition = $hmescince_prsntcondit;
                     $psychologyroomavail = $psyc_seprom_avl;
                     $psychologypresentcondition = $psyc_prsntcondit;
                  ?>
                  <script type="text/javascript">
                  // set1
                  $("#physicsroomavail").val(<?php echo $physicsroomavail; ?>);
                     $("#physicspresentcondition").val(<?php echo $physicspresentcondition; ?>);

                  // set2
                  $("#chemistryroomavail").val(<?php echo $chemistryroomavail; ?>);
                     $("#chemistrypresentcondtion").val(<?php echo $chemistrypresentcondtion; ?>);


                  // set3
                  $("#biologyroomavail").val(<?php echo $biologyroomavail; ?>);
                     $("#biologypresentcondition").val(<?php echo $biologypresentcondition; ?>);


                  // set4
                  $("#computerroomavail").val(<?php echo $computerroomavail; ?>);
                     $("#computerpresentcondition").val(<?php echo $computerpresentcondition; ?>);

                  // set5
                  $("#mathsroomavail").val(<?php echo $mathsroomavail; ?>);
                     $("#mathspresentcondition").val(<?php echo $mathspresentcondition; ?>);


                  // set6
                  $("#languageroomavail").val(<?php echo $languageroomavail; ?>);
                     $("#languagepresentcondition").val(<?php echo $languagepresentcondition; ?>);


                  // set7
                  $("#geographyroomavail").val(<?php echo $geographyroomavail; ?>);
                     $("#goegraphypresentcondition").val(<?php echo $goegraphypresentcondition; ?>);


                  // set8
                  $("#homescienceroomavail").val(<?php echo $homescienceroomavail; ?>);
                     $("#homesciencepresentcondition").val(<?php echo $homesciencepresentcondition; ?>);


                  // set9
                  $("#psychologyroomavail").val(<?php echo $psychologyroomavail; ?>);
                     $("#psychologypresentcondition").val(<?php echo $psychologypresentcondition; ?>);
               </script>

               <!-- option1 -->
            <?php 
                     if ($physicsroomavail=="1") {
                ?>
                  <script type="text/javascript">
                        $('#physicspresentcondition,#presentheading').show();
                           
                        $("#physicsroomavail").change(function() {
                              if ($('#physicsroomavail').val()=='1') {
                                       // option1
                                       $("#physicspresentcondition").prop("selectedIndex", <?php echo $physicspresentcondition; ?>);
                              }
                              else{ 
                                       $('#physicspresentcondition').val(function () {
                                       return $(this).find('option').filter(function () {
                                       return $(this).prop('defaultSelected');
                                             }).val();
                                       });
                                            
                              } 
                            
                            });

          
                  </script>

               <?php }?>
               <!-- option1 ending -->

               <!-- option2 -->
            <?php 
                     if ($chemistryroomavail=="1") {
                ?>
                  <script type="text/javascript">
                        $('#chemistrypresentcondtion,#presentheading').show();
                           
                        $("#chemistryroomavail").change(function() {
                              if ($('#chemistryroomavail').val()=='1') {
                                       // option1
                                       $("#chemistrypresentcondtion").prop("selectedIndex", <?php echo $chemistrypresentcondtion; ?>);
                              }
                              else{ 
                                       $('#chemistrypresentcondtion').val(function () {
                                       return $(this).find('option').filter(function () {
                                       return $(this).prop('defaultSelected');
                                             }).val();
                                       });
                                            
                              } 
                            
                            });

          
                  </script>

               <?php }?>
               <!-- option2 ending -->



               <!-- option3 -->
            <?php 
                     if ($biologyroomavail=="1") {
                ?>
                  <script type="text/javascript">
                        $('#biologypresentcondition,#presentheading').show();
                           
                        $("#biologyroomavail").change(function() {
                              if ($('#biologyroomavail').val()=='1') {
                                       // option1
                                       $("#biologypresentcondition").prop("selectedIndex", <?php echo $biologypresentcondition; ?>);
                              }
                              else{ 
                                       $('#biologypresentcondition').val(function () {
                                       return $(this).find('option').filter(function () {
                                       return $(this).prop('defaultSelected');
                                             }).val();
                                       });
                                            
                              } 
                            
                            });

          
                  </script>

               <?php }?>
               <!-- option3 ending -->


               <!-- option4 -->
            <?php 
                     if ($computerroomavail=="1") {
                ?>
                  <script type="text/javascript">
                        $('#computerpresentcondition,#presentheading').show();
                           
                        $("#computerroomavail").change(function() {
                              if ($('#computerroomavail').val()=='1') {
                                       // option1
                                       $("#computerpresentcondition").prop("selectedIndex", <?php echo $computerpresentcondition; ?>);
                              }
                              else{ 
                                       $('#computerpresentcondition').val(function () {
                                       return $(this).find('option').filter(function () {
                                       return $(this).prop('defaultSelected');
                                             }).val();
                                       });
                                            
                              } 
                            
                            });

          
                  </script>

               <?php }?>
               <!-- option4 ending -->

                <!-- option5 -->
            <?php 
                     if ($mathsroomavail=="1") {
                ?>
                  <script type="text/javascript">
                        $('#mathspresentcondition,#presentheading').show();
                           
                        $("#mathsroomavail").change(function() {
                              if ($('#mathsroomavail').val()=='1') {
                                       // option1
                                       $("#mathspresentcondition").prop("selectedIndex", <?php echo $mathspresentcondition; ?>);
                              }
                              else{ 
                                       $('#mathspresentcondition').val(function () {
                                       return $(this).find('option').filter(function () {
                                       return $(this).prop('defaultSelected');
                                             }).val();
                                       });
                                            
                              } 
                            
                            });

          
                  </script>

               <?php }?>
               <!-- option5 ending -->


               <!-- option6 -->
            <?php 
                     if ($languageroomavail=="1") {
                ?>
                  <script type="text/javascript">
                        $('#languagepresentcondition,#presentheading').show();
                           
                        $("#languageroomavail").change(function() {
                              if ($('#languageroomavail').val()=='1') {
                                       // option1
                                       $("#languagepresentcondition").prop("selectedIndex", <?php echo $languagepresentcondition; ?>);
                              }
                              else{ 
                                       $('#languagepresentcondition').val(function () {
                                       return $(this).find('option').filter(function () {
                                       return $(this).prop('defaultSelected');
                                             }).val();
                                       });
                                            
                              } 
                            
                            });

          
                  </script>

               <?php }?>
               <!-- option6 ending -->


               <!-- option7 -->
            <?php 
                     if ($geographyroomavail=="1") {
                ?>
                  <script type="text/javascript">
                        $('#goegraphypresentcondition,#presentheading').show();
                           
                        $("#geographyroomavail").change(function() {
                              if ($('#geographyroomavail').val()=='1') {
                                       // option1
                                       $("#goegraphypresentcondition").prop("selectedIndex", <?php echo $goegraphypresentcondition; ?>);
                              }
                              else{ 
                                       $('#goegraphypresentcondition').val(function () {
                                       return $(this).find('option').filter(function () {
                                       return $(this).prop('defaultSelected');
                                             }).val();
                                       });
                                            
                              } 
                            
                            });

          
                  </script>

               <?php }?>
               <!-- option7 ending -->


               <!-- option8 -->
            <?php 
                     if ($homescienceroomavail=="1") {
                ?>
                  <script type="text/javascript">
                        $('#homesciencepresentcondition,#presentheading').show();
                           
                        $("#homescienceroomavail").change(function() {
                              if ($('#homescienceroomavail').val()=='1') {
                                       // option1
                                       $("#homesciencepresentcondition").prop("selectedIndex", <?php echo $homesciencepresentcondition; ?>);
                              }
                              else{ 
                                       $('#homesciencepresentcondition').val(function () {
                                       return $(this).find('option').filter(function () {
                                       return $(this).prop('defaultSelected');
                                             }).val();
                                       });
                                            
                              } 
                            
                            });

          
                  </script>

               <?php }?>
               <!-- option8 ending -->


               <!-- option8 -->
            <?php 
                     if ($psychologyroomavail=="1") {
                ?>
                  <script type="text/javascript">
                        $('#psychologypresentcondition,#presentheading').show();
                           
                        $("#psychologyroomavail").change(function() {
                              if ($('#psychologyroomavail').val()=='1') {
                                       // option1
                                       $("#psychologypresentcondition").prop("selectedIndex", <?php echo $psychologypresentcondition; ?>);
                              }
                              else{ 
                                       $('#psychologypresentcondition').val(function () {
                                       return $(this).find('option').filter(function () {
                                       return $(this).prop('defaultSelected');
                                             }).val();
                                       });
                                            
                              } 
                            
                            });

          
                  </script>

               <?php }?>
               <!-- option8 ending -->

                  
         </body>
      </html>
                         
               