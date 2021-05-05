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
                                                <div class="col-md-3 bg-grey mt-step-col active">
                                                   <div class="mt-step-number bg-white font-grey">2</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Asset Info</div>
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
                                    <div class="portlet light portlet-fit">
                                       <div class="portlet-title">
                                          <div class="caption">
                                             <i class="icon-settings font-dark"></i>
                                             <span class="caption-subject font-dark sbold uppercase">Asset Information Step 2 - Details of classrooms available in the school</span>
                                          </div>
                                       </div>
                                       <div class="portlet-body">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <form id="asert2form1" method="post" action="<?php echo base_url().'Design/updatecomputersfunctional'; ?>">
                                                   <table class="table table-bordered">
                                                      <thead>
                                                         <tr>
                                                            <th>
                                                               Total classrooms used for instructional purposes
                                                            </th>
                                                            <th>
                                                               No of classrooms under construction
                                                            </th>
                                                            <th>
                                                               Total classrooms in dilapidated condition
                                                            </th>
                                                            <th>
                                                               Available of furniture(desk/table) for students
                                                            </th>
                                                         </tr>
                                                      </thead>
                                                      <tbody>
                                                         <tr>
                                                            <td>
                                                               <input type="text" name="totclassromsforinstructionalpurps" class="input-sm form-control" id="totclassromsforinstructionalpurps" maxlength="3">
                                                            </td>
                                                            <td>
                                                               <input type="text" name="noofclasunderconstction" class="input-sm form-control" id="noofclasunderconstction" maxlength="3">
                                                            </td>
                                                            <td>
                                                               <input type="text" name="totnoofclassdilapdated" class="input-sm form-control" id="totnoofclassdilapdated" maxlength="3">
                                                            </td>
                                                            <td>
                                                               <input type="text" name="availoffurniture" class="input-sm form-control" id="availoffurniture" maxlength="3">
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                   <div class="caption">
                                                      <span class="caption-subject font-dark sbold uppercase">Out of the Classrooms, the details by stage/Level</b></span>
                                                   </div>
                                                   <table class="table table-bordered" style="margin-top: 10px;">
                                                      <thead>
                                                         <tr>
                                                            <th>Primary</th>
                                                            <th>Secondary</th>
                                                            <th>Upper Primary</th>
                                                            <th>Higher Secondary</th>
                                                         </tr>
                                                      </thead>
                                                      <tbody>
                                                         <tr>
                                                            <td class="col-md-3">
                                                               <input type="text" class="input-sm form-control" name="primary" id="primary" maxlength="3">
                                                            </td>
                                                            <td class="col-md-3">
                                                               <input type="text" class="input-sm form-control" name="secondary" id="secondary" maxlength="3">
                                                            </td>
                                                            <td class="col-md-3">
                                                               <input type="text" class="input-sm form-control" name="upperprimary" id="upperprimary" maxlength="3">
                                                            </td>
                                                            <td class="col-md-3">
                                                               <input type="text" class="input-sm form-control" name="highersecondary" id="highersecondary" maxlength="3">
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td colspan="2">
                                                               Total number of rooms other than classrooms available in the school
                                                            </td>
                                                            <td colspan="2">
                                                               <input type="text" class="input-sm form-control" name="totnoofromsavailotherthclsinschool" id="totnoofromsavailotherthclsinschool" maxlength="5">
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                   <div class="form-actions">
                                                      <center>
                                                         <input type="submit" id="form1btn" class="btn green" value="Submit">
                                                      </center>
                                                   </div>
                                                </form>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="portlet light portlet-fit">
                                       <div class="portlet-title">
                                          <div class="caption">
                                             <i class="icon-settings font-dark"></i>
                                             <span class="caption-subject font-dark sbold uppercase">Asset Information Step 2 - Toilets and urinals details</span>
                                          </div>
                                       </div>
                                       <div class="portlet-body">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <form id="asert2form2" action="<?php echo base_url().'Design/updatecomputersfunctional';?>" method="post" >
                                                   <table class="table table-bordered">
                                                      <thead>
                                                         <tr>
                                                            <th>
                                                               Details of toilets and urinals
                                                            </th>
                                                            <th>
                                                               Boys only
                                                            </th>
                                                            <th>
                                                               Girls only
                                                            </th>
                                                         </tr>
                                                      </thead>
                                                      <tbody>
                                                         <tr>
                                                            <td>
                                                               No of Toilets seats available in school
                                                            </td>
                                                            <td>
                                                               <input type="text" name="nooftoiletseatsavailinschoolboys" class="input-sm form-control" id="nooftoiletseatsavailinschoolboys" maxlength="3">
                                                            </td>
                                                            <td>
                                                               <input type="text" name="nooftoiletseatsavailinschoolgirls" class="input-sm form-control" id="nooftoiletseatsavailinschoolgirls" maxlength="3">
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td>
                                                               Out of the above, total number of functional toilet: water available in the toilet, minimal odour, unbroken seat, regularly cleaned with working drainage system, accessible to users,closable door)
                                                            </td>
                                                            <td>
                                                               <input type="text" name="totnofunctionaltoiletsforboys" class="input-sm form-control" id="totnofunctionaltoiletsforboys" maxlength="3">
                                                            </td>
                                                            <td>
                                                               <input type="text" name="totnofunctionaltoiletsforgirls" class="input-sm form-control" id="totnofunctionaltoiletsforgirls" maxlength="3">
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td>
                                                               No of CWSN friendly functional toilets
                                                            </td>
                                                            <td>
                                                               <input type="text" name="cwsnboys" class="input-sm form-control" id="cwsnboys" maxlength="3">
                                                            </td>
                                                            <td>
                                                               <input type="text" name="cwsngirls" class="input-sm form-control" id="cwsngirls" maxlength="3">
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td>
                                                               How many of above toilets have running water available in the toilet for flusing and cleaning?
                                                            </td>
                                                            <td>
                                                               <input type="text" name="runningwateravailintoiletsforflusingandcleaningboys" class="input-sm form-control" id="runningwateravailintoiletsforflusingandcleaningboys" maxlength="3">
                                                            </td>
                                                            <td>
                                                               <input type="text" name="runningwateravailintoiletsforflusingandcleaninggirls" class="input-sm form-control" id="runningwateravailintoiletsforflusingandcleaninggirls" maxlength="3">
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td>
                                                               Total number of urinals available
                                                            </td>
                                                            <td>
                                                               <input type="text" name="totnoofurinalsavailboys" class="input-sm form-control" id="totnoofurinalsavailboys" maxlength="3">
                                                            </td>
                                                            <td>
                                                               <input type="text" name="totnoofurinalsavailgirls" class="input-sm form-control" id="totnoofurinalsavailgirls" maxlength="3">
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td>
                                                               Out of the above, how many urinals have water facility?
                                                            </td>
                                                            <td>
                                                               <input type="text" name="outofabovehowmanyurinalshavwaterfaciboys" class="input-sm form-control" id="outofabovehowmanyurinalshavwaterfaciboys" maxlength="3">
                                                            </td>
                                                            <td>
                                                               <input type="text" name="outofabovehowmanyurinalshavwaterfacigirls" class="input-sm form-control" id="outofabovehowmanyurinalshavwaterfacigirls" maxlength="3">
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td>
                                                               Is hand washing facility available near toilets/urinals block?
                                                            </td>
                                                            <td colspan="2" id="handwashfacilitynearurinalblock">
                                                               <select class="form-control" name="handwashfacilitynearurinalblockselect" id="handwashfacilitynearurinalblockselect">
                                                                  <option value="">Select Availability</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="2">No</option>
                                                               </select>
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
                                    <div class="portlet light portlet-fit">
                                       <div class="portlet-title">
                                          <div class="caption">
                                             <i class="icon-settings font-dark"></i>
                                             <span class="caption-subject font-dark sbold uppercase">Asset Information Step 2 - Whether the school have Library facility/Book Bank/Reading Corner</span>
                                          </div>
                                       </div>
                                       <div class="portlet-body">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <form method="post" action="<?php echo base_url().'Design/updatecomputersfunctional'; ?>" id="asert2form3">
                                                   <table class="table table-bordered">
                                                      <thead>
                                                         <tr>
                                                            <th>
                                                               Facilities
                                                            </th>
                                                            <th>
                                                               Available
                                                            </th>
                                                            <th>
                                                               <span id="totlabeltxt">Total number of books</span>
                                                            </th>
                                                         </tr>
                                                      </thead>
                                                      <tbody>
                                                         <tr>
                                                            <td>
                                                               Library
                                                            </td>
                                                            <td>
                                                               <select class="form-control" name="library" id="library">
                                                                  <option value="" selected="selected">Select Availability</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="2">No</option>
                                                               </select>
                                                            </td>
                                                            <td>
                                                               <input type="text" name="librarybook" class="input-sm form-control" id="librarybook" maxlength="6">
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td>
                                                               Book Bank
                                                            </td>
                                                            <td>
                                                               <select class="form-control" name="bookbank" id="bookbank">
                                                                  <option value="" selected="selected">Select Availability</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="2">No</option>
                                                               </select>
                                                            </td>
                                                            <td>
                                                               <input type="text" name="bookbankbook" class="input-sm form-control" id="bookbankbook" maxlength="6">
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td>
                                                               Reading Corner
                                                            </td>
                                                            <td>
                                                               <select class="form-control" name="readingcorner" id="readingcorner">
                                                                  <option value="" selected="selected">Select Availability</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="2">No</option>
                                                               </select>
                                                            </td>
                                                            <td>
                                                               <input type="text" name="readingcornerbook" class="input-sm form-control" id="readingcornerbook" maxlength="6">
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td>
                                                               Does the school have a full-time library?
                                                            </td>
                                                            <td colspan="2">
                                                               <select class="form-control" name="fulltimelibrary" id="fulltimelibrary">
                                                                  <option value="" selected="selected">Select Availability</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="2">No</option>
                                                               </select>
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
            <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
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
                           }
                      });
               
                       // jquery for enable and disable the textbox
                      $('#user .editable').editable('toggleDisabled');
                      $("#librarybook,#bookbankbook,#readingcornerbook,#fulltimelibrary,#totlabeltxt").hide();
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
                               // $("#librarybook,#bookbankbook,#readingcornerbook").hide();
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