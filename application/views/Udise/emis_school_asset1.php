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
             .note{color:#dd4b39; }
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
                                                <div class="col-md-3 bg-grey mt-step-col active">
                                                   <div class="mt-step-number bg-white font-grey">1</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Asset Info</div>
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
                                             <span class="caption-subject font-dark sbold uppercase">Asset Information Step 1</span>
                                          </div>
                                       </div>
                                       
                                       <div class="portlet-body">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <table id="user" class="table table-bordered table-striped">
                                                   <tbody>
                                                      <tr>
                                                         <td> Status of the School Building: </td>
                                                         <td style="width:50%">
                                                            <a href="javascript:;" id="schoolbuildingstatus" data-type="select2" data-pk="1" data-value="<?php echo $buil_status; ?>" data-url="<?php echo base_url().'Udise_asset/updateschlbuildstatus';?>" data-original-title="Select school building status">  </a> 
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td> Type of the School Building: </td>
                                                         <td style="width:50%">
                                                            <a href="javascript:;" id="schoolbuildingtype" data-type="select2" data-pk="1"
                                                            data-value="<?php echo $buil_type; ?>" data-url="<?php echo base_url().'Udise_asset/updateschoolbuildingtype';?>" data-original-title="Select school building type">  </a> 
                                                         </td>
                                                      </tr>
                                                      
                                                      <tr>
                                                         <td> Type of Boundary Wall: </td>
                                                         <td style="width:50%">
                                                            <a href="javascript:;" id="boundarywalltype" data-type="select2" data-pk="1" data-value="<?php echo $bndrywl_type; ?>" data-url="<?php echo base_url().'Udise_asset/updateboundarywalltype';?>" data-original-title="Select boundary wall type">  </a> 
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td> Whether land is available for expansion of school facilities: </td>
                                                         <td style="width:50%">
                                                            <a href="javascript:;" id="landavailforschlexpnsion" data-type="select2" data-pk="1" data-value="<?php echo $landavail_expnsin; ?>" data-url="<?php echo base_url().'Udise_asset/updatelandavailforschlexpnsion';?>" data-original-title="Select land is available for expansion of school facilities">  </a> 
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td> Whether Separate room for Head Teacher / Principal available: </td>
                                                         <td style="width:50%">
                                                            <a href="javascript:;" id="seproomsforheadtchrandpriciavail" data-type="select2" data-pk="1" data-value="<?php echo $seprom_headteach; ?>" data-url="<?php echo base_url().'Udise_asset/updateseproomsforheadtchrandpriciavail';?>" data-original-title="Select separate room for Head Teacher / Principal available">  </a> 
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td> Whether Electricity connection is available in the school: </td>
                                                         <td style="width:50%">
                                                            <a href="javascript:;" id="electricitycnxnavailinschl" data-type="select2" data-pk="1"  data-value="<?php echo $elecon_avail; ?>" data-url="<?php echo base_url().'Udise_asset/updateelectricitycnxnavailinschl';?>" data-original-title="Select electricity connection is available
                                                               in the school">  </a> 
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td> Does the school subscribe to newspapers/magazines: </td>
                                                         <td style="width:50%">
                                                            <a href="javascript:;" id="schoolsubscibenewspprormagzine" data-type="select2" data-pk="1" data-value="<?php echo $substo_newsppr; ?>" data-url="<?php echo base_url().'Udise_asset/updateschoolsubscibenewspprormagzine';?>" data-value="" data-original-title="Select the school subscribe to newspapers/magazines">  </a> 
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td rowspan="2"> 
                                                            <br>
                                                            Details of Computers(For teaching and learning purposes): 
                                                         </td>
                                                         <td style="width:20%">
                                                            <a href="javascript:;" id="totalnoofcomputersavailable" data-type="text" data-pk="0" data-url="<?php echo base_url().'Udise_asset/updatetotnoofcomputersavailable';?>" data-original-title="Total number of computers available"><?php echo $noofcomp_avail; ?></a>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td>
                                                            <a href="javascript:;" id="totalnoofcomputersfunctional" data-type="text" data-pk="0" data-url="<?php echo base_url().'Udise_asset/updatecomputersfunctional';?>"  data-original-title="Total number of computers functional"><?php echo $noofcom_func; ?></a>
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
                                             <span class="caption-subject font-dark sbold uppercase">Asset Information Step 1 - Classrooms in the school by condition </span>
                                          </div>

                                             <?php if ($this->session->flashdata('error')){ ?> 
                                                <!-- BEGIN PAGE CONTENT INNER -->
                                                   <div class="page-content-inner">
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="note note-danger note-bordered">
                                                               <?php echo $this->session->flashdata('error'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <!-- END PAGE CONTENT INNER -->
                                             <?php } ?>


                                          <div class="row">
                                             <div class="col-md-12">
                                                 
                                                <form action="<?php echo base_url().'Udise_asset/updateclassroomschlbycondtion';?>" method="post" id="formas1">
                                                   <table class="table table-bordered">
                                                      <thead>
                                                         <tr>
                                                            <th rowspan="2">Type of building block</th>
                                                            <th colspan="3">
                                                               <center>No. of classrooms by condition</center>
                                                            </th>
                                                         </tr>
                                                         <tr>
                                                            <th>Good condition</th>
                                                            <th>Need minor repair</th>
                                                            <th>Need major repair</th>
                                                         </tr>
                                                      </thead>
                                                      <tr>
                                                         <td>Pucca</td>
                                                         <td>
                                                            <input type="text" maxlength="3" class="form-control" name="pucca1" id="pucca1" value="<?php echo $puc_gdcondt; ?>" style="display: none;">
                                                            <center><p id="cntpucca1"><?php echo $puc_gdcondt; ?></p></center>
                                                         </td>
                                                         <td>
                                                            <input type="text" maxlength="3" class="form-control" name="pucca2"
                                                                  id="pucca2" value="<?php echo $puc_minrpr; ?>" style="display: none;">
                                                               <center><p id="cntpucca2"><?php echo $puc_minrpr; ?></p></center>
                                                         </td>
                                                         <td>
                                                            <input type="text" maxlength="3" class="form-control" name="pucca3"
                                                               id="pucca3" value="<?php echo $puc_majrpr; ?>" style="display: none;">
                                                                <center><p id="cntpucca3"><?php echo $puc_majrpr; ?></p></center>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td>Partially pucca</td>
                                                         <td>
                                                            <input type="text" maxlength="3" class="form-control" name="partpucca1" id="partpucca1" value="<?php echo $par_puc_gdcondt; ?>" style="display: none;">
                                                            <center><p id="parpucca1"><?php echo $par_puc_gdcondt; ?></p></center>
                                                         </td>
                                                         <td>
                                                            <input type="text" maxlength="3" class="form-control" name="partpucca2" id="partpucca2" value="<?php echo $par_puc_minrpr; ?>" style="display: none;">
                                                            <center><p id="parpucca2"><?php echo $par_puc_minrpr; ?></p></center>
                                                         </td>
                                                         <td>
                                                            <input type="text" maxlength="3" class="form-control" name="partpucca3" id="partpucca3" value="<?php echo $par_puc_majrpr; ?>" style="display: none;">
                                                            <center><p id="parpucca3"><?php echo $par_puc_minrpr; ?></p></center>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td>Kuchcha</td>
                                                         <td>
                                                            <input type="text" maxlength="3" class="form-control" name="kuchcha1" id="kuchcha1" value="<?php echo $kuch_gdcondt; ?>" style="display: none;">
                                                            <center><p id="cntkuchcha1"><?php echo $kuch_gdcondt; ?></p></center>
                                                         </td>
                                                         <td>
                                                            <input type="text" maxlength="3" class="form-control" name="kuchcha2" id="kuchcha2" value="<?php echo $kuch_minrpr; ?>" style="display: none;">
                                                            <center><p id="cntkuchcha2"><?php echo $kuch_minrpr; ?></p></center>
                                                         </td>
                                                         <td>
                                                            <input type="text" maxlength="3" class="form-control" name="kuchcha3" id="kuchcha3" value="<?php echo $kuch_majrpr; ?>" style="display: none;">
                                                            <center><p id="cntkuchcha3"><?php echo $kuch_majrpr; ?></p></center>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td>Tent</td>
                                                         <td>
                                                            <input type="text" maxlength="3" class="form-control" name="tent1" id="tent1" value="<?php echo $tnt_gdcondt; ?>" style="display: none;">
                                                            <center><p id="cnttent1"><?php echo $tnt_gdcondt; ?></p></center>
                                                         </td>
                                                         <td>
                                                            <input type="text" maxlength="3" class="form-control" name="tent2" id="tent2" value="<?php echo $tnt_minrpr; ?>" style="display: none;">
                                                            <center><p id="cnttent2"><?php echo $tnt_minrpr; ?></p></center>
                                                         </td>
                                                         <td>
                                                            <input type="text" maxlength="3" class="form-control" name="tent3" id="tent3" value="<?php echo $tnt_majrpr; ?>" style="display: none;">
                                                            <center><p id="cnttent3"><?php echo $tnt_majrpr; ?></p></center>
                                                         </td>
                                                      </tr>
                                                   </table>
                                                   <div class="form-actions">
                                                      <center>
                                                         <input type="submit" class="btn green" value="Submit">
                                                      </center>
                                                   </div>
                                                </form>
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
               

               // school building status 
               $('#schoolbuildingstatus').editable({
                   inputclass: 'form-control input-medium',
                   source: asset1,
                   success:function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else
                        toastr.success("School building status updated sucessfully", "Update Notifications");
            }, //function(response, newValue) {            
            //                 if(response == 0) return "Unable to update.Please try later"; 
            //        },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                     if(value != "1" && value != "2" && value != "3" && value != "4" && value != "5" && value != "6" && value != "7")
                     {
                     return 'Required Field';
                     }
                  }
               }); 
               
               var asset2 = [];
               $.each({
                   "1": "Pucca (building with concrete roof)",
                   "2": "Partially pucca (pucca walls and floor without concrete roof)",
                   "3": "Kachcha",
                   "4": "Tent"
               }, function(k, v) {
                   asset2.push({
                       id: k,
                       text: v
                   });
               });


               // schoolbuilding type
               $('#schoolbuildingtype').editable({
                   inputclass: 'form-control input-medium',
                   source: asset2,
                   success: function(response, newValue) {  
                            var result = $.parseJSON(response);          
                            if(result.response_code != 1) return result.error_msg; 
                            else
                            toastr.success("School Building Type Updated Sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },validate: function(value){
                     if(value != "1" && value != "2" && value != "3" && value != "4")
                     {
                     return 'Required Field';
                     }
                  }
               });
               
               var asset3 = [];
               $.each({
                   "1": "Pucca",
                   "2": "Pucca but broken",
                   "3": "Barbed wire fencing",
                   "4": "Hedges",
                   "5": "No boundary walls"
               }, function(k, v) {
                   asset3.push({
                       id: k,
                       text: v
                   });
               });
               
               // boundary wall type
               $('#boundarywalltype').editable({
                   inputclass: 'form-control input-medium',
                   source: asset3,
                   success: function(response, newValue) { 
                            var result = $.parseJSON(response);           
                            if(result.response_code != 1) return result.error_msg; 
                            else
                            toastr.success("Boundary Wall Type Updated Sucessfully", "Update Notifications"); 
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },validate: function(value){
                     if(value != "1" && value != "2" && value != "3" && value != "4" && value != "5")
                     {
                     return 'Required Field';
                     }
                  }
               });
               
               
               // land available for expansion
               $('#landavailforschlexpnsion').editable({
                   inputclass: 'form-control input-medium',
                   source: yesno,
                   success: function(response, newValue) {            
                             var result = $.parseJSON(response);           
                            if(result.response_code != 1) return result.error_msg; 
                            else
                            toastr.success("Land Available for Expansion Updated Sucessfully", "Update Notifications"); 
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
               
               // Separate Room for Head Teacher/Principal Available
               $('#seproomsforheadtchrandpriciavail').editable({
                   inputclass: 'form-control input-medium',
                   source: yesno,
                   success: function(response, newValue) {            
                             var result = $.parseJSON(response);           
                            if(result.response_code != 1) return result.error_msg; 
                            else
                            toastr.success("Separate Room for Head Teacher/Principal Available Updated Sucessfully", "Update Notifications"); 
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
               
               var asset4 = [];
               $.each({
                   "1": "Yes",
                   "2": "No",
                   "3": "Yes but not functional",
               }, function(k, v) {
                   asset4.push({
                       id: k,
                       text: v
                   });
               });
               
               $('#electricitycnxnavailinschl').editable({
                   inputclass: 'form-control input-medium',
                   source: asset4,
                   success: function(response, newValue) {            
                             var result = $.parseJSON(response);           
                            if(result.response_code != 1) return result.error_msg; 
                            else
                            toastr.success("Electricity Connection Availability Updated Sucessfully", "Update Notifications");  
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },validate: function(value){
                     if(value != "1" && value != "2" && value != "3")
                     {
                     return 'Required Field';
                     }
                  }
               });
               
               
                $('#schoolsubscibenewspprormagzine').editable({
                   inputclass: 'form-control input-medium',
                   source: yesno,
                   success: function(response, newValue) {            
                             var result = $.parseJSON(response);           
                            if(result.response_code != 1) return result.error_msg; 
                            else
                            toastr.success("School Subscribe to Newspapers/Magazines Updated Sucessfully", "Update Notifications"); 
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
               

               $('#totalnoofcomputersavailable').editable({
            type: 'text',
            pk: 1,
            name: 'totalnoofcomputersavailable',
            title: 'Enter the Total Number of Computers Availability',
            success: function(response, newValue) {
            //alert("hello");
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("Total Number of Computers Available updated sucessfully", "Update Notifications");

            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             },validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,10}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 10 characters';
                       }
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
                               toastr.success("Total Number of Computers Functional updated sucessfully", "Update Notifications");
               
               
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,10}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 10 characters';
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

                       $('#pucca1,#pucca2,#pucca3,#partpucca1,#partpucca2,#partpucca3,#kuchcha1,#kuchcha2,#kuchcha3,#tent1,#tent2,#tent3,#cntpucca1,#cntpucca2,#cntpucca3,#parpucca1,#parpucca2,#parpucca3,#cntkuchcha1,#cntkuchcha2,#cntkuchcha3,#cnttent1,#cnttent2,#cnttent3').toggle()


                   });
               
               $(document).ready(function(){
                   $("input").prop("disabled",true);
               });
               
               
               
                   
               
               
            </script>
         </body>
      </html>