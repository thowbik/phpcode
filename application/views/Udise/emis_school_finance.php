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
                                    <h1>Receipts and Expenditures <small>(Applicable only to Govt. and Aided Schools)</small>
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
                                                <div class="col-md-12 bg-grey mt-step-col active">
                                                   <div class="mt-step-number bg-white font-grey">1</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Finance</div>
                                                   <div class="mt-step-content font-grey-cascade">Receipts and Expenditures</div>
                                                </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- <br> -->
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="mt-checkbox-inline">
                                             
                                             <button id="enable1" class="btn green">Enable / Disable Editor Mode</button>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-12">
                                                    <div class="portlet light ">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <i class="icon-settings font-dark"></i>
                                                                <span class="caption-subject font-dark bold uppercase">Section - School funds</span> <small>(in last completed financial year) excluding MDM (for elementary schools/sections)</small>
                                                            </div>
                                                            
                                                        </div>
                                                   <div class="portlet-body">
                                                       <!-- error reporting start -->
                                                       <?php if ($this->session->flashdata('finance1')){ ?> 
                                                <!-- BEGIN PAGE CONTENT INNER -->
                                                   <div class="page-content-inner">
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="note note-danger note-bordered">
                                                               <?php echo $this->session->flashdata('finance1'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <!-- END PAGE CONTENT INNER -->
                                             <?php } ?>
                                             <!-- error reporting End -->
                                                     <!-- form1scheme4 -->
                                                     <form method="post" action="<?php echo base_url().'Udise_finance/updateschoolfinance_fund' ?>" id="schoolfundtable1">
                                                      <!-- table scrollable -->
                                                      <div class="table-scrollable">
                                                         <table class="table table-bordered table-striped">
                                                            <thead>
                                                               <tr>
                                                                  <th>School Grant</th>  
                                                                  <th>Receipt(`)</th>
                                                                  <th>Expenditure(`)</th>
                                                               </tr>
                                                            </thead>
                                                            <tbody>

                                                               <!-- Note:-->
                                                               <!-- Note:-->
                                                               <tr>
                                                                  <td>(a)School Development Grant(UnderSSA)</td>
                                                                  <td>
                                                                     <div id="schooldevelopmentgrand1">
                                                                        <center><?php echo $schl_dev_grnt_recpt; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundform1schldevgranttb1" id="schlfundform1schldevgranttb1" maxlength="10" value="<?php echo $schl_dev_grnt_recpt; ?>" style="display: none;">
                                                                  </td>
                                                                  <td>
                                                                     <div id="schooldevelopmentgrand2">
                                                                        <center><?php echo $schl_dev_grnt_expdtr; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundform1schldevgranttb2" id="schlfundform1schldevgranttb2" maxlength="10" value="<?php echo $schl_dev_grnt_expdtr; ?>" style="display: none;">
                                                                  </td>
                                                               </tr>
                                                               <tr>
                                                                  <td>(b)School Maintenance Grant(UnderSSA)</td>
                                                                  <td>
                                                                     <div id="schoolmaintenancegrant1">
                                                                        <center><?php echo $schl_maintnc_grnt_recpt; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundform1schlmaintenancegranttb1" id="schlfundform1schlmaintenancegranttb1" maxlength="10" value="<?php echo $schl_maintnc_grnt_recpt; ?>" style="display: none;">
                                                                  </td>
                                                                  <td>
                                                                      <div id="schoolmaintenancegrant2">
                                                                        <center><?php echo $schl_maintnc_grnt_expdtr; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundform1schlmaintenancegranttb2" id="schlfundform1schlmaintenancegranttb2" maxlength="10" value="<?php echo $schl_maintnc_grnt_expdtr; ?>" style="display: none;">
                                                                  </td>
                                                               </tr>
                                                               <tr>
                                                                  <td>(c)TLM/Teachers Grant(UnderSSA)</td>
                                                                  <td>
                                                                     <div id="tlm1">
                                                                        <center><?php echo $schl_tlm_grnt_recpt; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundform1schltlmorteachersgranttb1" id="schlfundform1schltlmorteachersgranttb1" maxlength="10" value="<?php echo $schl_tlm_grnt_recpt; ?>" style="display: none;">
                                                                  </td>
                                                                  <td>
                                                                     <div id="tlm2">
                                                                        <center><?php echo $schl_tlm_grnt_expdtr; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundform1schltlmorteachersgranttb2" id="schlfundform1schltlmorteachersgranttb2" maxlength="10" value="<?php echo $schl_tlm_grnt_expdtr; ?>" style="display: none;">
                                                                  </td>
                                                               </tr>


                                                            </tbody>
                                                         </table>
                                                      </div>
                                                      <!-- table scrollable ending -->
                                                         <div class="row">
                                                               <center><input type="submit" class="btn btn green" value="submit" name=""></center>
                                                         </div>
                                                      </form>
                                                      <!-- form1scheme4 -->
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
                                                                <span class="caption-subject font-dark bold uppercase">Section - Grants received by the school &amp; expenditures made during the last completed financial year
                                                            </div>
                                                            
                                                        </div>
                                                   <div class="portlet-body">

                                                       <!-- error reporting start -->
                                                       <?php if ($this->session->flashdata('finance2')){ ?> 
                                                <!-- BEGIN PAGE CONTENT INNER -->
                                                   <div class="page-content-inner">
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="note note-danger note-bordered">
                                                               <?php echo $this->session->flashdata('finance2'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <!-- END PAGE CONTENT INNER -->
                                             <?php } ?>
                                             <!-- error reporting End -->

                                                     <!-- form1scheme4 -->
                                                     <form method="post" action="<?php echo base_url().'Udise_finance/updateschool_expendit' ?>" id="schoolfundtable2">
                                                      <!-- table scrollable -->
                                                      <div class="table-scrollable">
                                                         <table class="table table-bordered table-striped">
                                                            <thead>
                                                               <tr>
                                                                  <th>SI. No</th>
                                                                  <th>Details of school level grants</th>  
                                                                  <th>Grants received(`)</th>
                                                                  <th>Grants utilized/spent(`)</th>
                                                                  <th>Spill over as on 1st April(`), current year</th>
                                                               </tr>
                                                            </thead>
                                                            <tbody>

                                                               <!-- Note:-->
                                                               <!-- Note:-->
                                                               <tr>
                                                                  <td>(i)</td>
                                                                  <td>Civil works</td>
                                                                  <td>
                                                                     <div id="civilwork1">
                                                                        <center><?php echo $cvlwrk_grntsrecv; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundcivilworktb1" id="schlfundcivilworktb1" maxlength="10" value="<?php echo $cvlwrk_grntsrecv;?>" style="display: none;">
                                                                  </td>
                                                                  <td>
                                                                     <div id="civilwork2">
                                                                        <center><?php echo $cvlwrk_grntsspnt; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundcivilworktb2" id="schlfundcivilworktb2" maxlength="10" value="<?php echo $cvlwrk_grntsspnt;?>" style="display: none;">
                                                                  </td>
                                                                  <td>
                                                                     <div id="civilwork3">
                                                                        <center><?php echo $cvlwrk_grntsspil; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundcivilworktb3" id="schlfundcivilworktb3" maxlength="10" value="<?php echo $cvlwrk_grntsspil; ?>" style="display: none;">
                                                                  </td>
                                                               </tr>
                                                               <tr>
                                                                  <td>(ii)</td>
                                                                  <td>Annual School Grants (recurring)</td>
                                                                  <td>
                                                                     <div id="annualschoolgrants1">
                                                                        <center><?php echo $anlsch_grntsrecv; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundannualgrantstb1" id="schlfundannualgrantstb1" maxlength="10" value="<?php echo $anlsch_grntsrecv; ?>" style="display: none;">
                                                                  </td>
                                                                  <td>
                                                                     <div id="annualschoolgrants2">
                                                                        <center><?php echo $anlsch_grntsspnt; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundannualgrantstb2" id="schlfundannualgrantstb2" maxlength="10" value="<?php echo $anlsch_grntsspnt; ?>" style="display: none;">
                                                                  </td>
                                                                  <td>
                                                                      <div id="annualschoolgrants3">
                                                                        <center><?php echo $anlsch_grntsspil; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundannualgrantstb3" id="schlfundannualgrantstb3" maxlength="10" value="<?php echo $anlsch_grntsspil; ?>" style="display: none;">
                                                                  </td>
                                                               </tr>
                                                               <tr>
                                                                  <td></td>
                                                                  <td>Minor repair/maintenance</td>
                                                                  <td>
                                                                     <div id="minorrepair1">
                                                                        <center><?php echo $minrpr_grntsrecv; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundminorrepairormaintenancetb1" id="schlfundminorrepairormaintenancetb1" maxlength="10" value="<?php echo $minrpr_grntsrecv; ?>" style="display: none;">
                                                                  </td>
                                                                  <td>
                                                                     <div id="minorrepair2">
                                                                        <center><?php echo $minrpr_grntsspnt; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundminorrepairormaintenancetb2" id="schlfundminorrepairormaintenancetb2" maxlength="10" value="<?php echo $minrpr_grntsspnt; ?>" style="display: none;">
                                                                  </td>
                                                                  <td>
                                                                     <div id="minorrepair3">
                                                                        <center><?php echo $minrpr_grntsspil; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundminorrepairormaintenancetb3" id="schlfundminorrepairormaintenancetb3" maxlength="10" value="<?php echo $minrpr_grntsspil; ?>" style="display: none;">
                                                                  </td>
                                                               </tr>
                                                               <tr>
                                                                  <td></td>
                                                                  <td>Repair and replacement of laboratory equipment's, purchase of laboratory consumables and articles, etc.</td>
                                                                  <td>
                                                                     <div id="repairreplac1">
                                                                        <center><?php echo $repndreplac_grntsrecv; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundrepairandmaintenancetb1" id="schlfundrepairandmaintenancetb1" maxlength="10" value="<?php echo $repndreplac_grntsrecv; ?>" style="display: none;">
                                                                  </td>
                                                                  <td>
                                                                     <div id="repairreplac2">
                                                                        <center><?php echo $repndreplac_grntsspnt; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundrepairandmaintenancetb2" id="schlfundrepairandmaintenancetb2" maxlength="10" value="<?php echo $repndreplac_grntsspnt; ?>" style="display: none;">
                                                                  </td>
                                                                  <td>
                                                                      <div id="repairreplac3">
                                                                        <center><?php echo $repndreplac_grntsspil ; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundrepairandmaintenancetb3" id="schlfundrepairandmaintenancetb3" maxlength="10" value="<?php echo $repndreplac_grntsspil; ?>" style="display: none;">
                                                                  </td>
                                                               </tr>
                                                               <tr>
                                                                  <td></td>
                                                                  <td>Purchase of books, periodicals, newspapers, etc.</td>
                                                                  <td>
                                                                     <div id="purchasebook1">
                                                                        <center><?php echo $purc_grntsrecv ; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundpurchasebookstb1" id="schlfundpurchasebookstb1" maxlength="10" value="<?php echo $purc_grntsrecv; ?>" style="display: none;">
                                                                  </td>
                                                                  <td>
                                                                     <div id="purchasebook2">
                                                                        <center><?php echo $purc_grntsspnt ; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundpurchasebookstb2" id="schlfundpurchasebookstb2" maxlength="10" value="<?php echo $purc_grntsspnt; ?>" style="display: none;">
                                                                  </td>
                                                                  <td>
                                                                     <div id="purchasebook3">
                                                                        <center><?php echo $purc_grntsspil ; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundpurchasebookstb3" id="schlfundpurchasebookstb3" maxlength="10" value="<?php echo $purc_grntsspil; ?>" style="display: none;">
                                                                  </td>
                                                               </tr>
                                                               <tr>
                                                                  <td></td>
                                                                  <td>Grant for meeting water, telephones and electricity charges.</td>
                                                                  <td>
                                                                     <div id="grantmeeting1">
                                                                        <center><?php echo $mtng_grntsrecv ; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundgrantformeetingtb1" id="schlfundgrantformeetingtb1" maxlength="10" value="<?php echo $mtng_grntsrecv; ?>" style="display: none;">
                                                                  </td>
                                                                  <td>
                                                                     <div id="grantmeeting2">
                                                                        <center><?php echo $mtng_grntsspnt ; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundgrantformeetingtb2" id="schlfundgrantformeetingtb2" maxlength="10" value="<?php echo $mtng_grntsspnt; ?>" style="display: none;">
                                                                  </td>
                                                                  <td>
                                                                     <div id="grantmeeting3">
                                                                        <center><?php echo $mtng_grntsspil ; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundgrantformeetingtb3" id="schlfundgrantformeetingtb3" maxlength="10" value="<?php echo $mtng_grntsspil; ?>" style="display: none;">
                                                                  </td>
                                                               </tr>
                                                               <tr>
                                                                  <td>(iii)</td>
                                                                  <td>Others</td>
                                                                  <td>
                                                                     <div id="others1">
                                                                        <center><?php echo $othr_grntsrecv ; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundotherstb1" id="schlfundotherstb1" maxlength="10" value="<?php echo $othr_grntsrecv; ?>" style="display: none;">
                                                                  </td>
                                                                  <td>
                                                                     <div id="others2">
                                                                        <center><?php echo $othr_grntsspnt ; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundotherstb2" id="schlfundotherstb2" maxlength="10" value="<?php echo $othr_grntsspnt; ?>" style="display: none;">
                                                                  </td>
                                                                  <td>
                                                                     <div id="others3">
                                                                        <center><?php echo $othr_grntsspil ; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundotherstb3" id="schlfundotherstb3" maxlength="10" value="<?php echo $othr_grntsspil; ?>" style="display: none;">
                                                                  </td>
                                                               </tr>
                                                               <tr>
                                                                  <td>(iv)</td>
                                                                  <td>Total (Grants at the school level)</td>
                                                                  <td>
                                                                     <div id="total1">
                                                                        <center><?php echo $tot_grntsrecv ; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundtotaltb1" id="schlfundtotaltb1" maxlength="10" value="<?php echo $tot_grntsrecv; ?>" style="display: none;">
                                                                  </td>
                                                                  <td>
                                                                     <div id="total2">
                                                                        <center><?php echo $tot_grntsspnt ; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundtotaltb2" id="schlfundtotaltb2" maxlength="10" value="<?php echo $tot_grntsspnt; ?>" style="display: none;">
                                                                  </td>
                                                                  <td>
                                                                     <div id="total3">
                                                                        <center><?php echo $tot_grntsspil ; ?></center>
                                                                     </div>
                                                                     <input type="text" class="form-control" name="schlfundtotaltb3" id="schlfundtotaltb3" maxlength="10" value="<?php echo $tot_grntsspil; ?>" style="display: none;">
                                                                  </td>
                                                               </tr>


                                                            </tbody>
                                                         </table>
                                                      </div>
                                                      <!-- table scrollable ending -->
                                                         <div class="row">
                                                               <center><input type="submit" class="btn btn green" value="submit" name=""></center>
                                                         </div>
                                                      </form>
                                                      <!-- form1scheme4 -->
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
                  
                   // jquery for enable and disable the textbox
               $('#user .editable').editable('toggleDisabled');
               
                   // init editable toggler
                   $('#enable1').click(function() {
                       $('#user .editable').editable('toggleDisabled');
                       $("#schemestable4").prop('disabled', function () {
                           return ! $(this).prop('disabled');
                           });
                       $("input").prop('disabled',function(){
                           return ! $(this).prop('disabled');
                       });
                        $("select").prop('disabled',function(){
                           return ! $(this).prop('disabled');
                       });

                        $("#schlfundform1schldevgranttb1,#schlfundform1schldevgranttb2,#schlfundform1schlmaintenancegranttb1,#schlfundform1schlmaintenancegranttb2,#schlfundform1schltlmorteachersgranttb1,#schlfundform1schltlmorteachersgranttb2,#schlfundcivilworktb1,#schlfundcivilworktb2,#schlfundcivilworktb3,#schlfundannualgrantstb1,#schlfundannualgrantstb2,#schlfundannualgrantstb3,#schlfundminorrepairormaintenancetb1,#schlfundminorrepairormaintenancetb2,#schlfundminorrepairormaintenancetb3,#schlfundrepairandmaintenancetb1,#schlfundrepairandmaintenancetb2,#schlfundrepairandmaintenancetb3,#schlfundpurchasebookstb1,#schlfundpurchasebookstb2,#schlfundpurchasebookstb3,#schlfundgrantformeetingtb1,#schlfundgrantformeetingtb2,#schlfundgrantformeetingtb3,#schlfundotherstb1,#schlfundotherstb2,#schlfundotherstb3,#schlfundtotaltb1,#schlfundtotaltb2,#schlfundtotaltb3").toggle();

                        $("#schooldevelopmentgrand1,#schooldevelopmentgrand2,#schoolmaintenancegrant1,#schoolmaintenancegrant2,#tlm1,#tlm2,#civilwork1,#civilwork2,#civilwork3,#annualschoolgrants1,#annualschoolgrants2,#annualschoolgrants3,#minorrepair1,#minorrepair2,#minorrepair3,#repairreplac1,#repairreplac2,#repairreplac3,#purchasebook1,#purchasebook2,#purchasebook3,#grantmeeting1,#grantmeeting2,#grantmeeting3,#others1,#others2,#others3,#total1,#total2,#total3").toggle();

                   });
               
               $(document).ready(function(){
                   $("input").prop("disabled",true);
                   //$("#freescheme4txtbooktb1").hide();

                        // $("#txtbook1").show();
               });
                $(document).ready(function(){
                            $("select").prop("disabled",true);
                      });

            </script>

         </body>


      </html>