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
                                    <h1>Staff Information
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
                                             <a href="<?php echo base_url().'Design/emis_school_staff1';?>">
                                                <div class="col-md-4 bg-grey mt-step-col active">
                                                   <div class="mt-step-number bg-white font-grey">1</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Staff Info</div>
                                                   <div class="mt-step-content font-grey-cascade">Step 1</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Design/emis_school_staff2';?>">
                                                <div class="col-md-4 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">2</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Staff</div>
                                                   <div class="mt-step-content font-grey-cascade">Step 2</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Design/emis_school_staff3';?>">
                                                <div class="col-md-4 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">3</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Staff</div>
                                                   <div class="mt-step-content font-grey-cascade">Step 3</div>
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
                                             <span class="caption-subject font-dark sbold uppercase">Staff Information Step 1 - Number of Non-teaching/Administrative and Support staff in position</span>
                                          </div>
                                       </div>
                                       <?php $user_type_id = $this->session->userdata('emis_user_type_id'); ?> 
                                       <div class="portlet-body">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <table id="user" class="table table-bordered">
                                                      <thead>
                                                         <tr>
                                                            <th>
                                                               Staff Designation
                                                            </th>
                                                            <th>
                                                               No. of staff in position
                                                            </th>
                                                         </tr>
                                                      </thead>
                                                   <tbody>
                                                      <tr>
                                                         <td> Accountant: </td>
                                                         <td style="width:50%">
                                                            <a href="javascript:;" id="schoolstaffaccountant" data-type="text" data-pk="0" data-url="<?php echo base_url().'Design/updateschlstaffaccountant';?>" data-original-title="Enter No of accountant position">  </a> 
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td> Library Assistant: </td>
                                                         <td style="width:50%">
                                                            <a href="javascript:;" id="schoolstafflibraryassist" data-type="text" data-pk="0" data-url="<?php echo base_url().'Design/updateschlstafflibraryassist';?>" data-value="" data-original-title="Enter No of library assistant position">  </a> 
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td> Laboratory Assistant: </td>
                                                         <td style="width:50%">
                                                            <a href="javascript:;" id="schoolstafflabassist" data-type="text" data-pk="0" data-url="<?php echo base_url().'Design/updateschlstafflabassist';?>" data-value="" data-original-title="Enter No of Laboratory assistant position">  </a> 
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td> UDC/ Head Clerk: </td>
                                                         <td style="width:50%">
                                                           <a href="javascript:;" id="schoolstaffudcorheadclerk" data-type="text" data-pk="0" data-url="<?php echo base_url().'Design/updateschlstaffudcorheadclerk';?>" data-value="" data-original-title="Enter No of UDC/Head Clerk position">  </a>  
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td> LDC: </td>
                                                         <td style="width:50%">
                                                            <a href="javascript:;" id="schoolstaffldc" data-type="text" data-pk="0" data-url="<?php echo base_url().'Design/updateschlstaffldc';?>" data-value="" data-original-title="Enter No of LDC position">  </a>  
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td> Peon/MTS: </td>
                                                         <td style="width:50%">
                                                            <a href="javascript:;" id="schoolstaffpeonormts" data-type="text" data-pk="0" data-url="<?php echo base_url().'Design/updateschlstaffpeonormts';?>" data-value="" data-original-title="Enter no of Peon/MTS position">  </a>  
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td> Night Watchman: </td>
                                                         <td style="width:50%">
                                                           <a href="javascript:;" id="schoolstaffnightwatchman" data-type="text" data-pk="0" data-url="<?php echo base_url().'Design/updateschlstaffnightwatchman';?>" data-value="" data-original-title="Enter no of Nightwatchman position">  </a>  
                                                         </td>
                                                      </tr>
                                                      
                                                   </tbody>
                                                </table>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="portlet light portlet-fit ">
                                       <div class="portlet-title">
                                          <div class="caption">
                                             <i class="icon-settings font-dark"></i>
                                             <span class="caption-subject font-dark sbold uppercase">Staff Information Step 1 - Number of Teaching staff in position </span>
                                          </div>
                                          <div class="row">
                                             <div class="col-md-12">
                                                   <table class="table table-bordered" id="user">
                                                      <thead>
                                                         <tr>
                                                            <th>Teaching Staff in position</th>
                                                            <th>Total Number of Teaching Staff</th>
                                                         </tr>
                                                         
                                                      </thead>
                                                      <tr>
                                                         <td>Teaching Staff (Regular Teacher) :</td>
                                                         <td style="width:50%">
                                                            <a href="javascript:;" id="schoolstaffteachingregularteacher" data-type="text" data-pk="0" data-url="<?php echo base_url().'Design/updateschlstaffteachingregularteacher';?>" data-original-title="Enter total no of teaching regular staff">  </a> 
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td>Teaching Staff (Contract Teacher) :</td>
                                                         <td style="width:50%">
                                                            <a href="javascript:;" id="schoolstaffteachingcontractorteacher" data-type="text" data-pk="0" data-url="<?php echo base_url().'Design/updateschlstaffteachingcontractorteacher';?>" data-original-title="Enter total no of teaching contractor staff">  </a> 
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td>Part-time instructors for Arts, Health and Physical Education positioned as per RTE norms for upper primary section</td>
                                                         <td style="width:50%">
                                                            <a href="javascript:;" id="schoolstaffparttimeinstructorsforartshealthandpysicaleducation" data-type="text" data-pk="0" data-url="<?php echo base_url().'Design/updateschlstaffparttimeinstructorsforartshealthandpysicaleducation';?>" data-original-title="Enter total no of part-time instructors for Arts, Health and Physical Education positioned as per RTE norms for upper primary section">  </a> 
                                                         </td>
                                                      </tr>
                                                     
                                                   </table>
                                             </div>
                                             <!-- fieldset ending -->
                                          </div>
                                          <!-- row ending -->
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
               
              $('#schoolstaffaccountant').editable({
                   type: 'text',
                   pk: 1,
                   name: 'schoolstaffnoofaccountantposition',
                   title: 'Enter the no of staff position',
                   success: function(response, newValue) {
                   
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Updated sucessfully", "Update Notifications");
               
               
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,5}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 5 characters';
                       }
                       
                   }
                   
               });

               $('#schoolstafflibraryassist').editable({
                   type: 'text',
                   pk: 1,
                   name: 'schoolstaffnooflibraryassisttposition',
                   title: 'Enter the no of staff position',
                   success: function(response, newValue) {
                   
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Updated sucessfully", "Update Notifications");
               
               
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                    validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,5}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 5 characters';
                       }
                       
                   }
                   
               }); 

               $('#schoolstafflabassist').editable({
                   type: 'text',
                   pk: 1,
                   name: 'schoolstaffnooflabassisttposition',
                   title: 'Enter the no of staff position',
                   success: function(response, newValue) {
                   
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Updated sucessfully", "Update Notifications");
               
               
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                    validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,5}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 5 characters';
                       }
                       
                   }
                   
               });

               $('#schoolstaffudcorheadclerk').editable({
                   type: 'text',
                   pk: 1,
                   name: 'schoolstaffnoofudcorheadclerkposition',
                   title: 'Enter the no of staff position',
                   success: function(response, newValue) {
                   
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Updated sucessfully", "Update Notifications");
               
               
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                    validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,5}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 5 characters';
                       }
                       
                   }
                   
               });

               $('#schoolstaffldc').editable({
                   type: 'text',
                   pk: 1,
                   name: 'schoolstaffnoofldcposition',
                   title: 'Enter the no of staff position',
                   success: function(response, newValue) {
                   
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Updated sucessfully", "Update Notifications");
               
               
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                    validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,5}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 5 characters';
                       }
                       
                   }
                   
               });

               $('#schoolstaffpeonormts').editable({
                   type: 'text',
                   pk: 1,
                   name: 'schoolstaffnoofpeonormtsposition',
                   title: 'Enter the no of staff position',
                   success: function(response, newValue) {
                   
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Updated sucessfully", "Update Notifications");
               
               
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                    validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,5}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 5 characters';
                       }
                       
                   }
                   
               });

               $('#schoolstaffnightwatchman').editable({
                   type: 'text',
                   pk: 1,
                   name: 'schoolstaffnoofnightwatchmanposition',
                   title: 'Enter the no of staff position',
                   success: function(response, newValue) {
                   
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Updated sucessfully", "Update Notifications");
               
               
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                    validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,5}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 5 characters';
                       }
                       
                   }
                   
               });


               $('#schoolstaffteachingregularteacher').editable({
                   type: 'text',
                   pk: 1,
                   name: 'schoolstaffnoofteachingregularteacher',
                   title: 'Enter the no of staff position',
                   success: function(response, newValue) {
                   
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Updated sucessfully", "Update Notifications");
               
               
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                    validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,5}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 5 characters';
                       }
                       
                   }
                   
               });

                $('#schoolstaffteachingcontractorteacher').editable({
                   type: 'text',
                   pk: 1,
                   name: 'schoolstaffnoofteachingcontractorteacher',
                   title: 'Enter the no of staff position',
                   success: function(response, newValue) {
                   
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Updated sucessfully", "Update Notifications");
               
               
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                    validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,5}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 5 characters';
                       }
                       
                   }
                   
               });


                $('#schoolstaffparttimeinstructorsforartshealthandpysicaleducation').editable({
                   type: 'text',
                   pk: 1,
                   name: 'schoolstaffnoofparttimeinstructorsforartshealthandpysicaleducation',
                   title: 'Enter the no of staff position',
                   success: function(response, newValue) {
                   
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Updated sucessfully", "Update Notifications");
               
               
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                    validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,5}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 5 characters';
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