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
                                                <div class="col-md-3 bg-grey mt-step-col active">
                                                   <div class="mt-step-number bg-white font-grey">3</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Asset Info</div>
                                                   <div class="mt-step-content font-grey-cascade">Step 3</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Design/emis_school_asset4';?>">
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
                                          <div class="row">
                                             <div class="col-md-12">
                                                <!-- question1 -->
                                                <form id="asert3form" action="" method="post">
                                                   <table class="table table-bordered">
                                                      <tbody>
                                                         <tr id="bg-green">
                                                            <td class="col-md-6">
                                                               <b>Whether drinking water is available in the school premies?</b>
                                                            </td>
                                                            <td class="col-md-6">
                                                               <select class="form-control" id="drinkingwater">
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
                                                               <select class="form-control"  id="drinkingoptin1">
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
                                                               <select class="form-control" id="drinkingoptin2">
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
                                                               <select class="form-control" id="drinkingoptin3">
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
                                                               <select class="form-control"  id="playgroundfacility">
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
                                                               <select class="form-control" id="playgroundoption1">
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
                                                               <select class="form-control" id="cal">
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
                                                               <select class="form-control" id="caloption1">
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
                                                               <select class="form-control" id="caloption2">
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
                                                               <select class="form-control" id="caloption3">
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
                                                               <select class="form-control" id="medicalcheckup">
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
                                                               <select class="form-control" id="medicalcheckupoption2">
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
                                                               <select class="form-control" id="ramp">
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
                                                               <select class="form-control" id="rampoption">
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
               
               var asset1 = [];
               $.each({
                   "1": "Private",
                   "2": "Rented",
                   "3": "Government",
                   "4": "Government school in a rent free building",
                   "5": "No Building",
                   "6": "Dilapidated",
                   "7": "Under Construction"        
               }, function(k, v) {
                   asset1.push({
                       id: k,
                       text: v
                   });
               });
               
               $('#schoolbuildingstatus').editable({
                   inputclass: 'form-control input-medium',
                   source: asset1,
                   type: 'select2',
                   pk: 1,
                   name: 'schoolbuildingstatus',
                   title: 'Select the School building status',
                   success: function(response, newValue) {            
                            if(response == 0) return "Unable to update.Please try later"; 
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    }
               }); 
               
                
               
               $('#totalnoofcomputersfunctional').editable({
                   type: 'text',
                   pk: 1,
                   name: 'totalnoofcomputersfunctional',
                   title: 'Enter the Total Number of Computers Functional',
                   success: function(response, newValue) {
                   //alert("hello");
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Updated sucessfully", "Update Notifications");
               
               
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                   // validate: function(value){
                   //     if( /[^-.?!,;:()&'/ A-Za-z0-9]/.test(value))
                   //     {
                   //         return 'Textbox can contain only alphabets and spaces';
                   //     }
                   // }
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