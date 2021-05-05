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
                                             <a href="<?php echo base_url().'Udise_asset/emis_school_asset1';?>">
                                                <div class="col-md-3 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">1</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Asset</div>
                                                   <div class="mt-step-content font-grey-cascade">Step 1</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Udise_asset/emis_school_asset2';?>">
                                                <div class="col-md-3 bg-grey mt-step-col active">
                                                   <div class="mt-step-number bg-white font-grey">2</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Asset Info</div>
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
                                    <div class="portlet light portlet-fit">
                                       <div class="portlet-title">
                                          <div class="caption">
                                             <i class="icon-settings font-dark"></i>
                                             <span class="caption-subject font-dark sbold uppercase">Asset Information Step 2 - Details of classrooms available in the school</span>
                                          </div>
                                       </div>
                                       
                                       <div class="portlet-body">
                                          <!-- error displaying part -->
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
                                       <!-- error displaying part end -->
                                          <div class="row">
                                             <div class="col-md-12">
                                                <form id="asert2form1" method="post" action="<?php echo base_url().'Udise_asset/updateasset2form1'; ?>">
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
                                                               <input type="text" name="totclassromsforinstructionalpurps" class="input-sm form-control" id="totclassromsforinstructionalpurps" value="<?php echo $clsrms_usdfrinspurp; ?>" maxlength="3" style="display: none;">
                                                               <center><p id="ass2tb1"><?php echo $clsrms_usdfrinspurp; ?></p></center>
                                                            </td>
                                                            <td>
                                                               <input type="text" name="noofclasunderconstction" class="input-sm form-control" id="noofclasunderconstction" value="<?php echo $clsrms_undrcons; ?>" maxlength="3" style="display: none;">
                                                               <center><p id="ass2tb2"><?php echo $clsrms_undrcons; ?></p></center>
                                                            </td>
                                                            <td>
                                                               <input type="text" name="totnoofclassdilapdated" class="input-sm form-control" id="totnoofclassdilapdated" value="<?php echo $clsrms_dilap; ?>" maxlength="3" style="display: none;">
                                                               <center><p id="ass2tb3"><?php echo $clsrms_dilap; ?></p></center>
                                                            </td>
                                                            <td>
                                                               <input type="text" name="availoffurniture" class="input-sm form-control" id="availoffurniture" value="<?php echo $frnitravail_frstu; ?>" maxlength="3" style="display: none;">
                                                               <center><p id="ass2tb4"><?php echo $frnitravail_frstu; ?></p></center>
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
                                                               <input type="text" class="input-sm form-control" name="primary" id="primary" value="<?php echo $otofclsrms_pri; ?>" maxlength="3" style="display: none;">
                                                               <center><p id="ass2tb5"><?php echo $otofclsrms_pri; ?></p></center>
                                                            </td>
                                                            <td class="col-md-3">
                                                               <input type="text" class="input-sm form-control" name="secondary" id="secondary" value="<?php echo $otofclsrms_sec; ?>" maxlength="3" style="display: none;">
                                                               <center><p id="ass2tb5"><?php echo $otofclsrms_sec; ?></p></center>
                                                            </td>
                                                            <td class="col-md-3">
                                                               <input type="text" class="input-sm form-control" name="upperprimary" id="upperprimary" value="<?php echo $otofclsrms_uprpri ?>" maxlength="3" style="display: none;">
                                                               <center><p id="ass2tb6"><?php echo $otofclsrms_uprpri; ?></p></center>
                                                            </td>
                                                            <td class="col-md-3">
                                                               <input type="text" class="input-sm form-control" name="highersecondary" id="highersecondary" value="<?php echo $otofclsrms_hsc; ?>" maxlength="3" style="display: none;">
                                                               <center><p id="ass2tb7"><?php echo $otofclsrms_hsc; ?></p></center>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td colspan="2">
                                                               Total number of rooms other than classrooms available in the school
                                                            </td>
                                                            <td colspan="2">
                                                               <input type="text" class="input-sm form-control" name="totnoofromsavailotherthclsinschool" id="totnoofromsavailotherthclsinschool" value="<?php echo $totno_rmsavl_othrthclsrms; ?>" maxlength="5" style="display: none;">
                                                               <center><p id="ass2tb8"><?php echo $totno_rmsavl_othrthclsrms; ?></p></center>
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
                                          <!-- error displaying part -->
                                          <?php if ($this->session->flashdata('asset2')){ ?> 
                                                <!-- BEGIN PAGE CONTENT INNER -->
                                                   <div class="page-content-inner">
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="note note-danger note-bordered">
                                                               <?php echo $this->session->flashdata('asset2'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <!-- END PAGE CONTENT INNER -->
                                             <?php } ?>
                                       <!-- error displaying part end -->
                                          <div class="row">
                                             <div class="col-md-12">
                                                <form id="asert2form2" action="<?php echo base_url().'Udise_asset/updateasset2form2';?>" method="post" >
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
                                                               <input type="text" name="nooftoiletseatsavailinschoolboys" class="input-sm form-control" id="nooftoiletseatsavailinschoolboys" value="<?php echo $nooftoilts_avl_bys; ?>" maxlength="3" style="display: none;">
                                                               <center><p id="asturi1"><?php echo $nooftoilts_avl_bys; ?></p></center>
                                                            </td>
                                                            <td>
                                                               <input type="text" name="nooftoiletseatsavailinschoolgirls" class="input-sm form-control" id="nooftoiletseatsavailinschoolgirls" value="<?php echo $nooftoilts_avl_gls; ?>" maxlength="3" style="display: none;">
                                                               <center><p id="asturi2"><?php echo $nooftoilts_avl_gls; ?></p></center>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td>
                                                               Out of the above, total number of functional toilet: water available in the toilet, minimal odour, unbroken seat, regularly cleaned with working drainage system, accessible to users,closable door)
                                                            </td>
                                                            <td>
                                                               <input type="text" name="totnofunctionaltoiletsforboys" class="input-sm form-control" id="totnofunctionaltoiletsforboys" value="<?php echo $nooftoilts_func_bys; ?>" maxlength="3" style="display: none;">
                                                               <center><p id="asturi3"><?php echo $nooftoilts_func_bys; ?></p></center>
                                                            </td>
                                                            <td>
                                                               <input type="text" name="totnofunctionaltoiletsforgirls" class="input-sm form-control" id="totnofunctionaltoiletsforgirls" value="<?php echo $nooftoilts_func_gls; ?>" maxlength="3" style="display: none;">
                                                               <center><p id="asturi4"><?php echo $nooftoilts_func_gls; ?></p></center>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td>
                                                               No of CWSN friendly functional toilets
                                                            </td>
                                                            <td>
                                                               <input type="text" name="cwsnboys" class="input-sm form-control" id="cwsnboys" value="<?php echo $noofcwsnfrndly_func_toilts_bys; ?>" maxlength="3" style="display: none;">
                                                               <center><p id="asturi5"><?php echo $noofcwsnfrndly_func_toilts_bys; ?></p></center>
                                                            </td>
                                                            <td>
                                                               <input type="text" name="cwsngirls" class="input-sm form-control" id="cwsngirls" value="<?php echo $noofcwsnfrndly_func_toilts_gls; ?>" maxlength="3" style="display: none;">
                                                               <center><p id="asturi6"><?php echo $noofcwsnfrndly_func_toilts_gls; ?></p></center>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td>
                                                               How many of above toilets have running water available in the toilet for flusing and cleaning?
                                                            </td>
                                                            <td>
                                                               <input type="text" name="runningwateravailintoiletsforflusingandcleaningboys" class="input-sm form-control" id="runningwateravailintoiletsforflusingandcleaningboys" value="<?php echo $toiltsavl_rnigwtr_flshingndclning_bys; ?>" maxlength="3" style="display: none;">
                                                               <center><p id="asturi7"><?php echo $toiltsavl_rnigwtr_flshingndclning_bys; ?></p></center>
                                                            </td>
                                                            <td>
                                                               <input type="text" name="runningwateravailintoiletsforflusingandcleaninggirls" class="input-sm form-control" id="runningwateravailintoiletsforflusingandcleaninggirls" value="<?php echo $toiltsavl_rnigwtr_flshingndclning_gls; ?>" maxlength="3" style="display: none;">
                                                               <center><p id="asturi8"><?php echo $toiltsavl_rnigwtr_flshingndclning_gls; ?></p></center>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td>
                                                               Total number of urinals available
                                                            </td>
                                                            <td>
                                                               <input type="text" name="totnoofurinalsavailboys" class="input-sm form-control" id="totnoofurinalsavailboys" value="<?php echo $noofurnls_avl_bys; ?>" maxlength="3" style="display: none;">
                                                               <center><p id="asturi9"><?php echo $noofurnls_avl_bys; ?></p></center>
                                                            </td>
                                                            <td>
                                                               <input type="text" name="totnoofurinalsavailgirls" class="input-sm form-control" id="totnoofurinalsavailgirls" value="<?php echo $noofurnls_avl_gls; ?>" maxlength="3" style="display: none;">
                                                               <center><p id="asturi10"><?php echo $noofurnls_avl_gls; ?></p></center>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td>
                                                               Out of the above, how many urinals have water facility?
                                                            </td>
                                                            <td>
                                                               <input type="text" name="outofabovehowmanyurinalshavwaterfaciboys" class="input-sm form-control" id="outofabovehowmanyurinalshavwaterfaciboys" value="<?php echo $urnlshv_wtrfac_bys; ?>" maxlength="3" style="display: none;">
                                                               <center><p id="asturi11"><?php echo $urnlshv_wtrfac_bys; ?></p></center>
                                                            </td>
                                                            <td>
                                                               <input type="text" name="outofabovehowmanyurinalshavwaterfacigirls" class="input-sm form-control" id="outofabovehowmanyurinalshavwaterfacigirls" value="<?php echo $urnlshv_wtrfac_gls; ?>" maxlength="3" style="display: none;">
                                                               <center><p id="asturi12"><?php echo $urnlshv_wtrfac_gls; ?></p></center>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td>
                                                               Is hand washing facility available near toilets/urinals block?
                                                            </td>
                                                            <?php 
                                                                  $handwash= $hndwshfacavl_toiltsurnlsblck;
                                                            ?>
                                                            <td colspan="2" id="handwashfacilitynearurinalblock">
                                                               <select class="form-control" name="handwashfacilitynearurinalblockselect" id="handwashfacilitynearurinalblockselect" style="display: none;">
                                                                  <option value="">Select Availability</option>
                                                                  <option value="1" <?php if($handwash==="1") echo 'selected="selected"' ?>>Yes</option>
                                                                  <option value="2" <?php if($handwash==="2") echo 'selected="selected"' ?>>No</option>
                                                               </select>
                                                               <center><p id="asturi13"><?php 
                                                                     switch ($handwash) {
                                                                        case 1:
                                                                           echo "Yes";
                                                                           break;

                                                                        case 2:
                                                                           echo "No";
                                                                           break;
                                                                        
                                                                     }
                                                                ?></p></center>
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
                                                <form method="post" action="<?php echo base_url().'Udise_asset/updateasset2form3'; ?>" id="asert2form3">
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
                                                               <select class="form-control" name="library" id="library" style="display: none;">
                                                                  <option value="" selected="selected">Select Availability</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="2">No</option>
                                                               </select>
                                                                  <center>
                                                                     <p id="lib1">
                                                                           <?php 
                                                                              $library= $lib_avl;
                                                                              switch ($library) {
                                                                              case 1:
                                                                                 echo "Yes";
                                                                                 break;
                                                                              case 2:
                                                                                 echo "No";
                                                                                 break;
                                                                                 }
                                                                           ?>   
                                                                     </p>
                                                                  </center>
                                                                  
                                                            </td>
                                                            <td>
                                                               <input type="text" name="librarybookdata" value="<?php echo $lib_totnoboks; ?>" class="input-sm form-control" id="librarybook" maxlength="6">
                                                            </td>


                                                           
                                                         </tr>
                                                         <tr>
                                                            <td>
                                                               Book Bank
                                                            </td>
                                                            <td>
                                                                 
                                                               <select class="form-control" name="bookbank" id="bookbank" style="display: none;">
                                                                  <option value="" selected="selected">Select Availability</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="2">No</option>
                                                               </select>

                                                               <center>
                                                                     <p id="lib2">
                                                                         <?php 
                                                                           $bookbank= $bokbnk_avl;
                                                                           switch ($bookbank) {
                                                                              case 1:
                                                                                 echo "Yes";
                                                                                 break;
                                                                              case 2:
                                                                                 echo "No";
                                                                                 break;
                                                                           }
                                                                         ?>  
                                                                     </p>
                                                                  </center>
                                                            </td>
                                                            <td>
                                                               <input type="text" name="bookbankbook" value="<?php echo $bokbnk_totnoboks; ?>" class="input-sm form-control" id="bookbankbook" maxlength="6">
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td>
                                                               Reading Corner
                                                            </td>
                                                            <td>
                                                               <select class="form-control" name="readingcorner" id="readingcorner" style="display: none;">
                                                                  <option value="" selected="selected">Select Availability</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="2">No</option>
                                                               </select>
                                                               <center>
                                                                  <p id="lib3">
                                                                     <?php 
                                                                        $readingcorner= $redngcorn_avl;
                                                                        switch ($readingcorner) {
                                                                           case 1:
                                                                           echo "Yes";
                                                                           break;
                                                                           
                                                                           case 2:
                                                                           echo "No";
                                                                           break;
                                                                     }?>      
                                                                  </p>
                                                               </center>
                                                               
                                                            </td>
                                                            <td>
                                                               <input type="text" value="<?php echo $redngcorn_totnoboks; ?>" name="readingcornerbook" class="input-sm form-control" id="readingcornerbook" maxlength="6">
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
                                                               <center>
                                                                  <p>
                                                                  
                                                                  </p>
                                                               </center>
                                                              
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
            <script src="<?php echo base_url().'asset/global/plugins/jquery.validate.min.js';?>"></script>
            <script src="<?php echo base_url().'asset/global/plugins/emis2.js';?>" type="text/javascript"></script>
            <!-- Js for hide and show the tables and datas ending-->
            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <!-- END PAGE LEVEL SCRIPTS -->
            

            <script>
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
                                $("#totclassromsforinstructionalpurps,#noofclasunderconstction,#totnoofclassdilapdated,#availoffurniture,#primary,#secondary,#upperprimary,#highersecondary,#totnoofromsavailotherthclsinschool,#ass2tb1,#ass2tb2,#ass2tb3,#ass2tb4,#ass2tb5,#ass2tb6,#ass2tb7,#ass2tb8,#ass2tb9,#nooftoiletseatsavailinschoolboys,#nooftoiletseatsavailinschoolgirls,#totnofunctionaltoiletsforboys,#totnofunctionaltoiletsforgirls,#cwsnboys,#cwsngirls,#runningwateravailintoiletsforflusingandcleaningboys,#runningwateravailintoiletsforflusingandcleaninggirls,#totnoofurinalsavailboys,#totnoofurinalsavailgirls,#outofabovehowmanyurinalshavwaterfaciboys,#outofabovehowmanyurinalshavwaterfacigirls,#handwashfacilitynearurinalblockselect,#asturi1,#asturi2,#asturi3,#asturi4,#asturi5,#asturi6,#asturi7,#asturi8,#asturi9,#asturi10,#asturi11,#asturi12,#asturi13,#library,#bookbank,#readingcorner,#lib1,#lib2,#lib3").toggle();
                          });
                          $(document).ready(function(){
                      $(".handwashfacilitynearurinalblockselect").val("<?php echo $handwash; ?>");
                    }); 
               
                          $(document).ready(function(){
                          $("input").prop("disabled",true);
                      });
                          $(document).ready(function(){
                          $("select").prop("disabled",true);
                      });
            </script>
            <?php 
                  $fulltimelibrary= $schlhav_fultimlib;
            ?>
               
               <script type="text/javascript">
                  
                  // set1
                  $("#library").prop("selectedIndex", <?php echo $library; ?>);

                  //set2
                  $("#bookbank").prop("selectedIndex", <?php echo $bookbank; ?>);

                  // set3
                  $("#bookbank").prop("selectedIndex", <?php echo $bookbank; ?>);

                  // set4
                  $("#readingcorner").prop("selectedIndex", <?php echo $readingcorner; ?>);

                  // set5
                  $("#fulltimelibrary").prop("selectedIndex", <?php echo $fulltimelibrary; ?>);
               </script>

                <?php 
                     if ($library=="1") {
                ?>
                  <script type="text/javascript">
                        $('#librarybook,#totlabeltxt,#fulltimelibrary').show();
                           
                        $("#library").change(function() {
                              if ($('#library').val()=='1') {
                                       $("#librarybook").val('<?php echo $lib_totnoboks; ?>');
                                       $("#fulltimelibrary").prop("selectedIndex", <?php echo $fulltimelibrary; ?>);
                                       //$("#").val($("#fulltimelibrary option:").val());     
                              }
                              else{
                                    $("#librarybook").val('');       
                              } 
                            
                            });

          
                  </script>

               <?php }?>
                 

               <?php 
                     if ($bookbank=="1") {
                ?>
                  <script type="text/javascript">
                        $('#bookbankbook,#totlabeltxt').show();
                           
                           $("#bookbank").change(function() {
                              if ($('#bookbank').val()=='1') {
                                       $("#bookbankbook").val('<?php echo $bokbnk_totnoboks; ?>');     
                              }
                              else{
                                    $("#librarybook").val('');       
                              } 
                            
                            });

          
                  </script>

               <?php }?>


               <?php 
                     if ($readingcorner=="1") {
                ?>
                  <script type="text/javascript">
                        $('#readingcornerbook,#totlabeltxt').show();
                           
                        $("#readingcorner").change(function() {
                              if ($('#readingcorner').val()=='1') {
                                       $("#readingcornerbook").val('<?php echo $bokbnk_totnoboks; ?>');     
                              }
                              else{
                                    $("#readingcornerbook").val('');       
                              } 
                            
                            });

          
                  </script>

              <?php }?>
         </body>
      </html>