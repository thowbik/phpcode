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
            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
            <!-- Js for hide and show the tables and datas -->
            <script src="<?php echo base_url().'asset/global/plugins/emis2.js';?>" type="text/javascript"></script>
            <!-- Js for hide and show the tables and datas ending-->
            <style type="text/css">
               .margin-top-bottom10{
               padding-top: 10px;
               padding-bottom: 10px;
               }
               #bg-green{
               background-color: rgba(187, 208, 226, 0.21);
               }
               #bg-green1{
               background-color: rgba(207, 218, 228, 0.18);
               }
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
                                                <div class="col-md-3 bg-grey mt-step-col active">
                                                   <div class="mt-step-number bg-white font-grey">3</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Asset Info</div>
                                                   <div class="mt-step-content font-grey-cascade">Step 3</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Udise_asset/emis_school_asset4';?>">
                                                <div class="col-md-3 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">4</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Asset</div>
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
                                             <span class="caption-subject font-dark sbold uppercase">Asset Information Step 3</span>
                                          </div>
                                       </div>
                                       <div class="portlet-body">
                                          <!-- error displaying part -->
                                          <?php if ($this->session->flashdata('asset3')){ ?> 
                                                <!-- BEGIN PAGE CONTENT INNER -->
                                                   <div class="page-content-inner">
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="note note-danger note-bordered">
                                                               <?php echo $this->session->flashdata('asset3'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <!-- END PAGE CONTENT INNER -->
                                             <?php } ?>
                                       <!-- error displaying part end -->
                                          <div class="row">
                                             <div class="col-md-12">
                                                <!-- question1 -->
                                                <form id="asert3form" action="<?php echo base_url().'Udise_asset/updateasset3'; ?>" method="post">
                                                   <table class="table table-bordered">
                                                      <tbody>
                                                         
                                                         <tr id="bg-green">
                                                            <td class="col-md-6">
                                                               <b>Whether drinking water is available in the school premies?</b>
                                                            </td>
                                                            <td class="col-md-6">
                                                               <select class="form-control" name="drinkingwater" id="drinkingwater">
                                                                  <option value="">Select the option</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="2">No</option>
                                                               </select>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td colspan="2">
                                                               <font style="color: #dd4b39"><span id="drinkingwatertxt"></span></font>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                   <!-- question1 ending -->
                                                   <table class="table table-hover table-bordered table-striped"  id="drinkingwatertableshow" style="display: none;">
                                                      <tbody>
                                                         <tr>
                                                            <td class="col-md-6">
                                                               What is the main source of drinking water
                                                            </td>
                                                            <td class="col-md-6 margin-top-bottom10">
                                                               <select class="form-control" name="drinkingoptin1"  id="drinkingoptin1">
                                                                  <option value="" selected="selected" >Select the option</option>
                                                                  <option value="1">Hand Pumps</option>
                                                                  <option value="2">Well</option>
                                                                  <option value="3">Tap Water</option>
                                                                  <option value="4">Others</option>
                                                               </select>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td colspan="2">
                                                               <font style="color: orange;"><span id="drinkingoptin1txt"></span></font>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td class="col-md-6">
                                                               Whether water purifier available
                                                            </td>
                                                            <td class="col-md-6 margin-top-bottom10">
                                                               <select class="form-control" name="drinkingoptin2" id="drinkingoptin2">
                                                                  <option value="" selected="selected">Select the option</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="2">No</option>
                                                                  <option value="3">Yes but not functional</option>
                                                               </select>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td colspan="2">
                                                               <font style="color: orange;"><span id="drinkingoptin2txt"></span></font>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td class="col-md-6">
                                                               Does the school have provision for rain water harvesting?
                                                            </td>
                                                            <td class="col-md-6 margin-top-bottom10">
                                                               <select class="form-control" name="drinkingoptin3" id="drinkingoptin3">
                                                                  <option value="" selected="selected">Select the option</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="2">No</option>
                                                                  <option value="3">Yes but not functional</option>
                                                               </select>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td colspan="2">
                                                               <font style="color: orange;"><span id="drinkingoptin3txt"></span></font>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                   <!-- question2 -->
                                                   <table class="table table-bordered">
                                                      <tbody>
                                                         <tr id="bg-green1">
                                                            <td class="col-md-6">
                                                               <b>Whether the school have Playground facility?</b>
                                                            </td>
                                                            <td class="col-md-6">
                                                               <select class="form-control" name="playgroundfacility" id="playgroundfacility">
                                                                  <option value="">Select the option</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="2">No</option>
                                                               </select>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td  colspan="2"><font style="color: #dd4b39"><span id="playgroundfacilitytxt"></span></font></td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                   <!-- question2 ending -->
                                                   <table class="table table-hover table-bordered table-striped" style="display: none;" id="playgroundfacilitytable">
                                                      <tbody>
                                                         <tr>
                                                            <td class="col-md-6">
                                                               Whether school has alternative arrangements for children to play outdoor games and other physical activities in an adjourning playground/muncipal park etc.
                                                            </td>
                                                            <td class="col-md-6 margin-top-bottom10">
                                                               <select class="form-control" name="playgroundoption1" id="playgroundoption1">
                                                                  <option selected="select" value="">Select the option</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="2">No</option>
                                                               </select>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td colspan="2">
                                                               <font style="color: orange;"><span id="playgroundoptin1txt"></span></font>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                   <!-- question3 -->
                                                   <table class="table table-bordered">
                                                      <tbody>
                                                         <tr id="bg-green1">
                                                            <td class="col-md-6">
                                                               <b>Does the school have Computer Aided learning(CAL) Lab?</b>
                                                            </td>
                                                            <td class="col-md-6">
                                                               <select class="form-control" name="cal" id="cal">
                                                                  <option value="">Select the option</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="2">No</option>
                                                                  <option value="3">But not functional</option>
                                                               </select>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td colspan="2">
                                                               <font style="color: #dd4b39"><span id="caltxt"></span></font>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                   <!-- question3 ending -->
                                                   <table class="table table-hover table-bordered table-striped"  id="caltable" style="display: none;">
                                                      <tbody>
                                                         <tr>
                                                            <td class="col-md-6">
                                                               Does the school have smart classroom (availability of Internet/LAN, computers, software solutions with trainers)
                                                            </td>
                                                            <td class="col-md-6 margin-top-bottom10">
                                                               <select class="form-control" name="caloption1" id="caloption1">
                                                                  <option selected="selected" value="">Select the option</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="2">No</option>
                                                                  <option value="3">But not functional</option>
                                                               </select>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td colspan="2">
                                                               <font style="color: orange;">
                                                               <span id="caloption1txt"></span>
                                                               </font>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td class="col-md-6">
                                                               Does the school have computer tablet for teaching
                                                            </td>
                                                            <td class="col-md-6 margin-top-bottom10">
                                                               <select class="form-control" name="caloption2" id="caloption2">
                                                                  <option value="" selected="selected">Select the option</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="2">No</option>
                                                                  <option value="3">But not functional</option>
                                                               </select>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td colspan="2">
                                                               <font style="color: orange;">
                                                               <span id="caloption2txt"></span>
                                                               </font>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td class="col-md-6">
                                                               Does the school have internet facility
                                                            </td>
                                                            <td class="col-md-6 margin-top-bottom10">
                                                               <select class="form-control" name="caloption3" id="caloption3">
                                                                  <option value="" selected="selected">Select the option</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="2">No</option>
                                                                  <option value="3">But not functional</option>
                                                               </select>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td colspan="2">
                                                               <font style="color: orange;">
                                                               <span id="caloption3txt"></span>
                                                               </font>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                   <!-- question4 -->
                                                   <table class="table table-bordered">
                                                      <tbody>
                                                         <tr id="bg-green1">
                                                            <td class="col-md-6">
                                                               <b>Whether Medical check-up of students was conducted in last academic year?</b>
                                                            </td>
                                                            <td class="col-md-6">
                                                               <select class="form-control" name="medicalcheckup" id="medicalcheckup">
                                                                  <option value="">Select the option</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="2">No</option>
                                                               </select>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td colspan="2">
                                                               <font style="color: #dd4b39"><span id="medicalcheckuptxt"></span></font>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                   <!-- question4 ending -->
                                                   <table class="table table-hover table-bordered table-striped" id="medicalcheckuptable" style="display: none;">
                                                      <tbody>
                                                         <tr>
                                                            <td class="col-md-6">
                                                               Total number of Medical check-ups conducted in the school during last academic year
                                                            </td>
                                                            <td class="col-md-6 margin-top-bottom10">
                                                               <input type="text" class="form-control" placeholder="Enter the number value" name="medicalcheckupoption" id="medicalcheckupoption" maxlength="5">
                                                               <font style="color: #dd4b39"><span id="medicalcheckuptextlimiterror"></span></font>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td colspan="2">
                                                               <font style="color: orange"><span id="medicalcheckupoptiontxt"></span></font>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td class="col-md-6">
                                                               De-worming tablets given to children
                                                            </td>
                                                            <td class="col-md-6 margin-top-bottom10">
                                                               <select class="form-control" name="medicalcheckupoption1" id="medicalcheckupoption1">
                                                                  <option value="" selected="selected">Select the option</option>
                                                                  <option value="1">Complete (two doses)</option>
                                                                  <option value="2">Partially (one dose)</option>
                                                                  <option value="3">Given</option>
                                                               </select>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td colspan="2">
                                                               <font style="color: orange"><span id="medicalcheckupoption1txt"></span></font>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td class="col-md-6">
                                                               Iron and Folic acid tablets given to children as per guideliness of WCD
                                                            </td>
                                                            <td class="col-md-6 margin-top-bottom10">
                                                               <select class="form-control" name="medicalcheckupoption2" id="medicalcheckupoption2">
                                                                  <option value="" selected="selected">Select the option</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="2">No</option>
                                                               </select>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td colspan="2">
                                                               <font style="color: orange"><span id="medicalcheckupoption2txt"></span></font>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                   <!-- question5 -->
                                                   <table class="table table-hover table-bordered table-striped" >
                                                      <tbody>
                                                         <tr id="bg-green1">
                                                            <td class="col-md-6">
                                                               <b>Whether ramp for disabled children to access classrooms exits?</b>
                                                            </td>
                                                            <td class="col-md-6">
                                                               <select class="form-control" name="ramp" id="ramp">
                                                                  <option value="" selected="selected">Select the option</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="2">No</option>
                                                               </select>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td colspan="2">
                                                               <font style="color: #dd4b39"><span id="ramptxt"></span></font>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                   <!-- question5 ending -->
                                                   <table class="col-sm-12 table-bordered" id="ramptable" style="display: none;">
                                                      <tbody>
                                                         <tr>
                                                            <td class="col-md-6">
                                                               Whether Hand-rails for ramp is available
                                                            </td>
                                                            <td class="col-md-6 margin-top-bottom10">
                                                               <select class="form-control" name="rampoption" id="rampoption">
                                                                  <option selected="selected" value="">Select the option</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="2">No</option>
                                                               </select>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td colspan="2">
                                                               <font style="color:orange;">
                                                               <span id="rampoptiontxt"></span>
                                                               </font>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                   <table>
                                                      <tbody>
                                                         <tr>
                                                            <td colspan="2">
                                                               <div class="form-actions">
                                                                  <br>
                                                                  <center>
                                                                     <input type="submit" class="btn green" value="Submit">
                                                                  </center>
                                                               </div>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
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
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/moment.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/jquery.mockjax.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js';?>" type="text/javascript"></script>
            <!-- Js for hide and show the tables and datas -->
            <!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
            <script src="<?php echo base_url().'asset/global/plugins/jquery.validate.min.js';?>"></script>
            <script src="<?php echo base_url().'asset/global/plugins/emis2.js';?>" type="text/javascript"></script>
            <!-- Js for hide and show the tables and datas ending-->
            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <!-- END PAGE LEVEL SCRIPTS -->
            <script>
               
                  <?php 
                     $drinkingwater = $drnkingwtravl_schprmis;
                     $drinkingoptin1 = $mnsrc_drnkingwtr;
                     $drinkingoptin2 = $wtrpur_avl;
                     $drinkingoptin3 = $hvprov_rainwtrharvst;

                     $playgroundfacility = $schlhv_plygrnd;
                     $playgroundoption1 = $schlhv_alt_arngmnts;

                     $cal = $schlhv_cal;
                     $caloption1 = $schlhv_smtclsrms; 
                     $caloption2 = $schlhv_comptab;
                     $caloption3 = $schlhv_netfac;


                     $medicalcheckup = $medchckupcondct_lstacdmicyr;
                     $medicalcheckupoption = $totnoofmedchckupcondct_lastacademicyear;
                     $medicalcheckupoption1 = $dewormtablts_chldrns;
                     $medicalcheckupoption2 = $irnflictblts_wcd;

                     $ramp = $rmp_disbledchldrs;
                     $rampoption = $hndrlrmp_avl; 
                  ?>
                  // set1
                  $("#drinkingwater").prop("selectedIndex", <?php echo $drinkingwater; ?>);
                     // option1
                     $("#drinkingoptin1").prop("selectedIndex", <?php echo $drinkingoptin1; ?>);
                     // option2
                     $("#drinkingoptin2").prop("selectedIndex", <?php echo $drinkingoptin2; ?>);
                     // option3
                     $("#drinkingoptin3").prop("selectedIndex", <?php echo $drinkingoptin3; ?>);

                  // set2
                  $("#playgroundfacility").prop("selectedIndex", <?php echo $playgroundfacility; ?>);
                     // option1
                     $("#playgroundoption1").prop("selectedIndex", <?php echo $playgroundoption1; ?>);

                  // set3
                  $("#cal").prop("selectedIndex", <?php echo $cal; ?>);
                     // option1
                     $("#caloption1").prop("selectedIndex", <?php echo $caloption1; ?>);
                     // option2
                     $("#caloption2").prop("selectedIndex", <?php echo $caloption2; ?>);
                     // option3
                     $("#caloption3").prop("selectedIndex", <?php echo $caloption3; ?>);


                  // set4
                  $("#medicalcheckup").prop("selectedIndex", <?php echo $medicalcheckup; ?>);
                     // option1
                     $("#medicalcheckupoption").val(<?php echo $medicalcheckupoption; ?>);
                     // option2
                     $("#medicalcheckupoption1").prop("selectedIndex", <?php echo $medicalcheckupoption1; ?>);
                     // option3
                     $("#medicalcheckupoption2").prop("selectedIndex", <?php echo $medicalcheckupoption2; ?>);


                  // set5
                  $("#ramp").prop("selectedIndex", <?php echo $ramp; ?>);
                     // option1
                     $("#rampoption").val(<?php echo $rampoption; ?>);
            </script>

            <!-- option1 -->
            <?php 
                     if ($drinkingwater=="1") {
                ?>
                  <script type="text/javascript">
                        $('#drinkingwatertableshow').show();
                           
                        $("#drinkingwater").change(function() {
                              if ($('#drinkingwater').val()=='1') {
                                       // option1
                                       $("#drinkingoptin1").prop("selectedIndex", <?php echo $drinkingoptin1; ?>);
                                       // option2
                                       $("#drinkingoptin2").prop("selectedIndex", <?php echo $drinkingoptin2; ?>);
                                       // option3
                                       $("#drinkingoptin3").prop("selectedIndex", <?php echo $drinkingoptin3; ?>);
                              }
                              else{ 
                                       $('#drinkingoptin1,#drinkingoptin2,#drinkingoptin3').val(function () {
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
                     if ($playgroundfacility=="2") {
                ?>
                  <script type="text/javascript">
                        $('#playgroundfacilitytable').show();
                           
                        $("#playgroundfacility").change(function() {
                              if ($('#playgroundfacility').val()=='2') {
                                       // option1
                                       $("#playgroundoption1").prop("selectedIndex", <?php echo $playgroundoption1; ?>);
                              }
                              else{ 
                                       $('#playgroundoption1').val(function () {
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
                     if ($cal=="1") {
                ?>
                  <script type="text/javascript">
                        $('#caltable').show();
                           
                        $("#cal").change(function() {
                              if ($('#cal').val()=='1') {
                                       // option1
                                       $("#caloption1").prop("selectedIndex", <?php echo $caloption1; ?>);
                                       // option2
                                       $("#caloption2").prop("selectedIndex", <?php echo $caloption2; ?>);
                                       // option3
                                       $("#caloption3").prop("selectedIndex", <?php echo $caloption3; ?>);
                              }
                              else{ 
                                       $('#caloption1,#caloption2,#caloption3').val(function () {
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
                     if ($medicalcheckup=="1") {
                ?>
                  <script type="text/javascript">
                        $('#medicalcheckuptable').show();
                           
                        $("#medicalcheckup").change(function() {
                              if ($('#medicalcheckup').val()=='1') {
                                       // option1
                                       $("#medicalcheckupoption").val(<?php echo $medicalcheckupoption; ?>);
                                       // option2
                                       $("#medicalcheckupoption1").prop("selectedIndex", <?php echo $medicalcheckupoption1; ?>);
                                       // option3
                                       $("#medicalcheckupoption2").prop("selectedIndex", <?php echo $medicalcheckupoption2; ?>);
                              }
                              else{ 
                                       $('#medicalcheckupoption').val('');
                                       $('#medicalcheckupoption1,#medicalcheckupoption2').val(function () {
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
                     if ($ramp=="1") {
                ?>
                  <script type="text/javascript">
                        $('#ramptable').show();
                           
                        $("#ramp").change(function() {
                              if ($('#ramp').val()=='1') {
                                       // option1
                                       $("#rampoption").val(<?php echo $rampoption; ?>);
                              }
                              else{ 
                                       $('#rampoption').val(function () {
                                       return $(this).find('option').filter(function () {
                                       return $(this).prop('defaultSelected');
                                             }).val();
                                       });
                                            
                              } 
                            
                            });

          
                  </script>

               <?php }?>
               <!-- option5 ending -->


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
         </body>
      </html>