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
                                    <h1>Incentives and facilities provided to children
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
                                             <a href="<?php echo base_url().'Design/emis_school_schemes1';?>">
                                                <div class="col-md-3 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">1</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Schemes</div>
                                                   <div class="mt-step-content font-grey-cascade">Incentives and facilities</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Design/emis_school_schemes2';?>">
                                                <div class="col-md-3 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">2</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Schemes</div>
                                                   <div class="mt-step-content font-grey-cascade">Incentives and facilities</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Design/emis_school_schemes3';?>">
                                                <div class="col-md-3 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">3</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Schemes</div>
                                                   <div class="mt-step-content font-grey-cascade">Incentives and facilities</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Design/emis_school_schemes4';?>">
                                                <div class="col-md-3 bg-grey mt-step-col active">
                                                   <div class="mt-step-number bg-white font-grey">4</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Schemes</div>
                                                   <div class="mt-step-content font-grey-cascade">Incentives and facilities</div>
                                                </div>
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                       <div class="col-md-12">
                                                    <div class="portlet light ">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <i class="icon-settings font-dark"></i>
                                                                <span class="caption-subject font-dark bold uppercase">Facilities provided to children</span> <small>(Last academic year, Higher Secondary Class XI-XII)</small>
                                                            </div>
                                                            
                                                        </div>
                                                   <div class="portlet-body">
                                                     <!-- form1scheme4 -->
                                                     <form method="post" action="" id="schemestable4">
                                                      <!-- table scrollable -->
                                                      <div class="table-scrollable">
                                                         <table class="table table-bordered table-striped">
                                                            <thead>
                                                               <tr>
                                                                  <th rowspan="2">Type of facility</th>
                                                                  <th colspan="2">General Students</th>
                                                                  <th colspan="2">SC Students</th>
                                                                  <th colspan="2">ST Students</th>
                                                                  <th colspan="2">OBC Students</th>
                                                                  <th colspan="2">Total Students</th>
                                                                  <th colspan="2">Muslim Minority</th>
                                                                  <th colspan="2">Other Minority Groups</th>   
                                                               </tr>
                                                               <tr>
                                                                  <th>Boys</th>
                                                                  <th>Girls</th>
                                                                  <th>Boys</th>
                                                                  <th>Girls</th>
                                                                  <th>Boys</th>
                                                                  <th>Girls</th>
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

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>Free Text Books</td>
                                                                  <td><input type="text" class="form-control" name="freescheme4txtbooktb1" id="freescheme4txtbooktb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4txtbooktb2" id="freescheme4txtbooktb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4txtbooktb3" id="freescheme4txtbooktb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4txtbooktb4" id="freescheme4txtbooktb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4txtbooktb5" id="freescheme4txtbooktb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4txtbooktb6" id="freescheme4txtbooktb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4txtbooktb7" id="freescheme4txtbooktb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4txtbooktb8" id="freescheme4txtbooktb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4txtbooktb9" id="freescheme4txtbooktb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4txtbooktb10" id="freescheme4txtbooktb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4txtbooktb11" id="freescheme4txtbooktb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freescheme4txtbooktb12" id="freescheme4txtbooktb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4txtbooktb13" id="freescheme4txtbooktb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4txtbooktb14" id="freescheme4txtbooktb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>Free Uniform</td>
                                                                  <td><input type="text" class="form-control" name="freescheme4uniformtb1" id="freescheme4uniformtb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4uniformtb2" id="freescheme4uniformtb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4uniformtb3" id="freescheme4uniformtb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4uniformtb4" id="freescheme4uniformtb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4uniformtb5" id="freescheme4uniformtb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4uniformtb6" id="freescheme4uniformtb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4uniformtb7" id="freescheme4uniformtb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4uniformtb8" id="freescheme4uniformtb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4uniformtb9" id="freescheme4uniformtb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4uniformtb10" id="freescheme4uniformtb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4uniformtb11" id="freescheme4uniformtb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freescheme4uniformtb12" id="freescheme4uniformtb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4uniformtb13" id="freescheme4uniformtb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4uniformtb14" id="freescheme4uniformtb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>Laptop</td>
                                                                  <td><input type="text" class="form-control" name="laptopscheme4tb1" id="laptopscheme4tb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="laptopscheme4tb2" id="laptopscheme4tb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="laptopscheme4tb3" id="laptopscheme4tb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="laptopscheme4tb4" id="laptopscheme4tb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="laptopscheme4tb5" id="laptopscheme4tb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="laptopscheme4tb6" id="laptopscheme4tb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="laptopscheme4tb7" id="laptopscheme4tb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="laptopscheme4tb8" id="laptopscheme4tb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="laptopscheme4tb9" id="laptopscheme4tb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="laptopscheme4tb10" id="laptopscheme4tb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="laptopscheme4tb11" id="laptopscheme4tb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="laptopscheme4tb12" id="laptopscheme4tb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="laptopscheme4tb13" id="laptopscheme4tb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="laptopscheme4tb14" id="laptopscheme4tb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>Free School Bag</td>
                                                                  <td><input type="text" class="form-control" name="freescheme4schoolbagtb1" id="freescheme4schoolbagtb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4schoolbagtb2" id="freescheme4schoolbagtb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4schoolbagtb3" id="freescheme4schoolbagtb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4schoolbagtb4" id="freescheme4schoolbagtb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4schoolbagtb5" id="freescheme4schoolbagtb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4schoolbagtb6" id="freescheme4schoolbagtb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4schoolbagtb7" id="freescheme4schoolbagtb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4schoolbagtb8" id="freescheme4schoolbagtb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4schoolbagtb9" id="freescheme4schoolbagtb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4schoolbagtb10" id="freescheme4schoolbagtb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4schoolbagtb11" id="freescheme4schoolbagtb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freescheme4schoolbagtb12" id="freescheme4schoolbagtb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4schoolbagtb13" id="freescheme4schoolbagtb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme4schoolbagtb14" id="freescheme4schoolbagtb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>Bi-Cycle</td>
                                                                  <td><input type="text" class="form-control" name="bicyclescheme4tb1" id="bicyclescheme4tb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="bicyclescheme4tb2" id="bicyclescheme4tb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="bicyclescheme4tb3" id="bicyclescheme4tb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="bicyclescheme4tb4" id="bicyclescheme4tb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="bicyclescheme4tb5" id="bicyclescheme4tb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="bicyclescheme4tb6" id="bicyclescheme4tb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="bicyclescheme4tb7" id="bicyclescheme4tb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="bicyclescheme4tb8" id="bicyclescheme4tb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="bicyclescheme4tb9" id="bicyclescheme4tb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="bicyclescheme4tb10" id="bicyclescheme4tb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="bicyclescheme4tb11" id="bicyclescheme4tb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="bicyclescheme4tb12" id="bicyclescheme4tb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="bicyclescheme4tb13" id="bicyclescheme4tb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="bicyclescheme4tb14" id="bicyclescheme4tb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>Free Bus Pass</td>
                                                                  <td><input type="text" class="form-control" name="freebuspassscheme4tb1" id="freebuspassscheme4tb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freebuspassscheme4tb2" id="freebuspassscheme4tb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freebuspassscheme4tb3" id="freebuspassscheme4tb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freebuspassscheme4tb4" id="freebuspassscheme4tb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freebuspassscheme4tb5" id="freebuspassscheme4tb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freebuspassscheme4tb6" id="freebuspassscheme4tb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freebuspassscheme4tb7" id="freebuspassscheme4tb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freebuspassscheme4tb8" id="freebuspassscheme4tb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freebuspassscheme4tb9" id="freebuspassscheme4tb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freebuspassscheme4tb10" id="freebuspassscheme4tb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freebuspassscheme4tb11" id="freebuspassscheme4tb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freebuspassscheme4tb12" id="freebuspassscheme4tb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freebuspassscheme4tb13" id="freebuspassscheme4tb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freebuspassscheme4tb14" id="freebuspassscheme4tb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>Financial Assistance for Students Who have lost their bread winning parents</td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme4tb1" id="financeassistscheme4tb1" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme4tb2" id="financeassistscheme4tb2" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme4tb3" id="financeassistscheme4tb3" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme4tb4" id="financeassistscheme4tb4" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme4tb5" id="financeassistscheme4tb5" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme4tb6" id="financeassistscheme4tb6" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme4tb7" id="financeassistscheme4tb7" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme4tb8" id="financeassistscheme4tb8" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme4tb9" id="financeassistscheme4tb9" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme4tb10" id="financeassistscheme4tb10" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme4tb11" id="financeassistscheme4tb11" maxlength="4"></td>   
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme4tb12" id="financeassistscheme4tb12" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme4tb13" id="financeassistscheme4tb13" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme4tb14" id="financeassistscheme4tb14" maxlength="4"></td>
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
                                                                <span class="caption-subject font-dark bold uppercase">Facilities provided to CWSN</span> <small>(Last academic year)</small>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="portlet-body">
                                                         <form method="post" action="" id="schemestable5">
                                                         <!-- table scrolling division -->
                                                         <div class="table-scrollable">
                                                         <table class="table table-bordered table-striped">
                                                            <thead>
                                                               <tr>
                                                                  <th rowspan="2">Type of facility</th>
                                                                  <th colspan="2">Elementary</th>
                                                                  <th colspan="2">Secondary</th>
                                                                  <th colspan="2">Higher Secondary</th>
                                                               </tr>
                                                               <tr>
                                                                  <th>Boys</th>
                                                                  <th>Girls</th>
                                                                  <th>Boys</th>
                                                                  <th>Girls</th>
                                                                  <th>Boys</th>
                                                                  <th>Girls</th>
                                                               </tr>
                                                            </thead>
                                                            <tbody>
                                                               <!-- Note:textbox tb1,tb3,tb5 are boys -->
                                                               <!-- Note:textbox tb2,tb4,tb6 are girls -->
                                                               <tr>
                                                                  <td>Brailbooks</td>
                                                                  <td><input type="text" class="form-control" name="brailbookscheme4tb1" id="brailbookscheme4tb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="brailbookscheme4tb2" id="brailbookscheme4tb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="brailbookscheme4tb3" id="brailbookscheme4tb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="brailbookscheme4tb4" id="brailbookscheme4tb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="brailbookscheme4tb5" id="brailbookscheme4tb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="brailbookscheme4tb6" id="brailbookscheme4tb6" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:textbox tb1,tb3,tb5 are boys -->
                                                               <!-- Note:textbox tb2,tb4,tb6 are girls -->
                                                               <tr>
                                                                  <td>Brailkit</td>
                                                                  <td><input type="text" class="form-control" name="brailkitscheme4tb1" id="brailkitscheme4tb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="brailkitscheme4tb2" id="brailkitscheme4tb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="brailkitscheme4tb3" id="brailkitscheme4tb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="brailkitscheme4tb4" id="brailkitscheme4tb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="brailkitscheme4tb5" id="brailkitscheme4tb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="brailkitscheme4tb6" id="brailkitscheme4tb6" maxlength="4"></td>
                                                               </tr>
                                                               <tr>
                                                                  <td>Low Vision Kit</td>
                                                                  <td><input type="text" class="form-control" name="lowvisionkitscheme4tb1" id="lowvisionkitscheme4tb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="lowvisionkitscheme4tb2" id="lowvisionkitscheme4tb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="lowvisionkitscheme4tb3" id="lowvisionkitscheme4tb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="lowvisionkitscheme4tb4" id="lowvisionkitscheme4tb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="lowvisionkitscheme4tb5" id="lowvisionkitscheme4tb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="lowvisionkitscheme4tb6" id="lowvisionkitscheme4tb6" maxlength="4"></td>
                                                               </tr>
                                                               <tr>
                                                                  <td>Hearing Aid</td>
                                                                  <td><input type="text" class="form-control" name="hearingaidscheme4tb1" id="hearingaidscheme4tb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="hearingaidscheme4tb2" id="hearingaidscheme4tb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="hearingaidscheme4tb3" id="hearingaidscheme4tb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="hearingaidscheme4tb4" id="hearingaidscheme4tb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="hearingaidscheme4tb5" id="hearingaidscheme4tb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="hearingaidscheme4tb6" id="hearingaidscheme4tb6" maxlength="4"></td>
                                                               </tr>
                                                               <tr>
                                                                  <td>Braces</td>
                                                                  <td><input type="text" class="form-control" name="bracesscheme4tb1" id="bracesscheme4tb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="bracesscheme4tb2" id="bracesscheme4tb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="bracesscheme4tb3" id="bracesscheme4tb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="bracesscheme4tb4" id="bracesscheme4tb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="bracesscheme4tb5" id="bracesscheme4tb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="bracesscheme4tb6" id="bracesscheme4tb6" maxlength="4"></td>
                                                               </tr>
                                                               <tr>
                                                                  <td>Crutches</td>
                                                                  <td><input type="text" class="form-control" name="crutchesscheme4tb1" id="crutchesscheme4tb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="crutchesscheme4tb2" id="crutchesscheme4tb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="crutchesscheme4tb3" id="crutchesscheme4tb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="crutchesscheme4tb4" id="crutchesscheme4tb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="crutchesscheme4tb5" id="crutchesscheme4tb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="crutchesscheme4tb6" id="crutchesscheme4tb6" maxlength="4"></td>
                                                               </tr>
                                                               <tr>
                                                                  <td>Wheelchair</td>
                                                                  <td><input type="text" class="form-control" name="wheelchairscheme4tb1" id="wheelchairscheme4tb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="wheelchairscheme4tb2" id="wheelchairscheme4tb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="wheelchairscheme4tb3" id="wheelchairscheme4tb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="wheelchairscheme4tb4" id="wheelchairscheme4tb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="wheelchairscheme4tb5" id="wheelchairscheme4tb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="wheelchairscheme4tb6" id="wheelchairscheme4tb6" maxlength="4"></td>
                                                               </tr>
                                                               <tr>
                                                                  <td>Tri-cycle</td>
                                                                  <td><input type="text" class="form-control" name="tricyclescheme4tb1" id="tricyclescheme4tb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="tricyclescheme4tb2" id="tricyclescheme4tb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="tricyclescheme4tb3" id="tricyclescheme4tb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="tricyclescheme4tb4" id="tricyclescheme4tb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="tricyclescheme4tb5" id="tricyclescheme4tb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="tricyclescheme4tb6" id="tricyclescheme4tb6" maxlength="4"></td>
                                                               </tr>
                                                               <tr>
                                                                  <td>Caliper</td>
                                                                  <td><input type="text" class="form-control" name="caliperscheme4tb1" id="caliperscheme4tb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="caliperscheme4tb2" id="caliperscheme4tb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="caliperscheme4tb3" id="caliperscheme4tb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="caliperscheme4tb4" id="caliperscheme4tb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="caliperscheme4tb5" id="caliperscheme4tb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="caliperscheme4tb6" id="caliperscheme4tb6" maxlength="4"></td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </div>
                                                      <!-- table scrollable -->
                                                         <div class="row">
                                                               <center><input type="submit" class="btn btn green" value="submit" name=""></center>
                                                         </div>
                                                       </form>
                                                       <!-- form completed -->
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
            <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
            <script src="<?php echo base_url().'asset/global/plugins/emis2.js';?>" type="text/javascript"></script>
            <!-- Js for hide and show the tables and datas ending-->

            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <!-- END PAGE LEVEL SCRIPTS -->
            <script>
               
            </script>

         </body>


      </html>