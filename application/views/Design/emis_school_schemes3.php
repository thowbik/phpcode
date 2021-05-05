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
                                                <div class="col-md-3 bg-grey mt-step-col active">
                                                   <div class="mt-step-number bg-white font-grey">3</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Schemes</div>
                                                   <div class="mt-step-content font-grey-cascade">Incentives and facilities</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Design/emis_school_schemes4';?>">
                                                <div class="col-md-3 bg-grey mt-step-col">
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
                                                                <span class="caption-subject font-dark bold uppercase">Facilities provided to children</span> <small>(Last academic year, Secondary Class IX-X)</small>
                                                            </div>
                                                            
                                                        </div>
                                                      <div class="portlet-body">
                                                       <form method="post" action="" id="schemestable3">
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
                                                                  <td><input type="text" class="form-control" name="freescheme3txtbooktb1" id="freescheme3txtbooktb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3txtbooktb2" id="freescheme3txtbooktb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3txtbooktb3" id="freescheme3txtbooktb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3txtbooktb4" id="freescheme3txtbooktb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3txtbooktb5" id="freescheme3txtbooktb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3txtbooktb6" id="freescheme3txtbooktb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3txtbooktb7" id="freescheme3txtbooktb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3txtbooktb8" id="freescheme3txtbooktb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3txtbooktb9" id="freescheme3txtbooktb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3txtbooktb10" id="freescheme3txtbooktb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3txtbooktb11" id="freescheme3txtbooktb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freescheme3txtbooktb12" id="freescheme3txtbooktb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3txtbooktb13" id="freescheme3txtbooktb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3txtbooktb14" id="freescheme3txtbooktb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>Free Uniform</td>
                                                                   <td><input type="text" class="form-control" name="freescheme3uniformtb1" id="freescheme3uniformtb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3uniformtb2" id="freescheme3uniformtb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3uniformtb3" id="freescheme3uniformtb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3uniformtb4" id="freescheme3uniformtb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3uniformtb5" id="freescheme3uniformtb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3uniformtb6" id="freescheme3uniformtb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3uniformtb7" id="freescheme3uniformtb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3uniformtb8" id="freescheme3uniformtb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3uniformtb9" id="freescheme3uniformtb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3uniformtb10" id="freescheme3uniformtb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3uniformtb11" id="freescheme3uniformtb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freescheme3uniformtb12" id="freescheme3uniformtb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3uniformtb13" id="freescheme3uniformtb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3uniformtb14" id="freescheme3uniformtb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>Free Footwear</td>
                                                                  <td><input type="text" class="form-control" name="freescheme3footweartb1" id="freescheme3footweartb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3footweartb2" id="freescheme3footweartb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3footweartb3" id="freescheme3footweartb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3footweartb4" id="freescheme3footweartb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3footweartb5" id="freescheme3footweartb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3footweartb6" id="freescheme3footweartb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3footweartb7" id="freescheme3footweartb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3footweartb8" id="freescheme3footweartb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3footweartb9" id="freescheme3footweartb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3footweartb10" id="freescheme3footweartb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3footweartb11" id="freescheme3footweartb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freescheme3footweartb12" id="freescheme3footweartb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3footweartb13" id="freescheme3footweartb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3footweartb14" id="freescheme3footweartb14" maxlength="4"></td>
                                                               </tr>


                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>Free School Bag</td>
                                                                  <td><input type="text" class="form-control" name="freescheme3schoolbagtb1" id="freescheme3schoolbagtb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3schoolbagtb2" id="freescheme3schoolbagtb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3schoolbagtb3" id="freescheme3schoolbagtb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3schoolbagtb4" id="freescheme3schoolbagtb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3schoolbagtb5" id="freescheme3schoolbagtb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3schoolbagtb6" id="freescheme3schoolbagtb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3schoolbagtb7" id="freescheme3schoolbagtb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3schoolbagtb8" id="freescheme3schoolbagtb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3schoolbagtb9" id="freescheme3schoolbagtb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3schoolbagtb10" id="freescheme3schoolbagtb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3schoolbagtb11" id="freescheme3schoolbagtb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freescheme3schoolbagtb12" id="freescheme3schoolbagtb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3schoolbagtb13" id="freescheme3schoolbagtb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3schoolbagtb14" id="freescheme3schoolbagtb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>Free Note Books</td>
                                                                  <td><input type="text" class="form-control" name="freescheme3notebooktb1" id="freescheme3notebooktb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3notebooktb2" id="freescheme3notebooktb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3notebooktb3" id="freescheme3notebooktb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3notebooktb4" id="freescheme3notebooktb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3notebooktb5" id="freescheme3notebooktb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3notebooktb6" id="freescheme3notebooktb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3notebooktb7" id="freescheme3notebooktb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3notebooktb8" id="freescheme3notebooktb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3notebooktb9" id="freescheme3notebooktb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3notebooktb10" id="freescheme3notebooktb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3notebooktb11" id="freescheme3notebooktb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freescheme3notebooktb12" id="freescheme3notebooktb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3notebooktb13" id="freescheme3notebooktb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3notebooktb14" id="freescheme3notebooktb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>Free Bus Pass</td>
                                                                  <td><input type="text" class="form-control" name="freescheme3buspasstb1" id="freescheme3buspasstb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3buspasstb2" id="freescheme3buspasstb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3buspasstb3" id="freescheme3buspasstb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3buspasstb4" id="freescheme3buspasstb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3buspasstb5" id="freescheme3buspasstb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3buspasstb6" id="freescheme3buspasstb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3buspasstb7" id="freescheme3buspasstb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3buspasstb8" id="freescheme3buspasstb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3buspasstb9" id="freescheme3buspasstb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3buspasstb10" id="freescheme3buspasstb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3buspasstb11" id="freescheme3buspasstb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freescheme3buspasstb12" id="freescheme3buspasstb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3buspasstb13" id="freescheme3buspasstb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme3buspasstb14" id="freescheme3buspasstb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>Noon - Meal Scheme</td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme3schemetb1" id="noonmealscheme3schemetb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme3schemetb2" id="noonmealscheme3schemetb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme3schemetb3" id="noonmealscheme3schemetb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme3schemetb4" id="noonmealscheme3schemetb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme3schemetb5" id="noonmealscheme3schemetb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme3schemetb6" id="noonmealscheme3schemetb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme3schemetb7" id="noonmealscheme3schemetb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme3schemetb8" id="noonmealscheme3schemetb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme3schemetb9" id="noonmealscheme3schemetb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme3schemetb10" id="noonmealscheme3schemetb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme3schemetb11" id="noonmealscheme3schemetb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="noonmealscheme3schemetb12" id="noonmealscheme3schemetb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme3schemetb13" id="noonmealscheme3schemetb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme3schemetb14" id="noonmealscheme3schemetb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>Financial Assistance for Students Who have lost their bread winning parents</td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme3tb1" id="financeassistscheme3tb1" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme3tb2" id="financeassistscheme3tb2" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme3tb3" id="financeassistscheme3tb3" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme3tb4" id="financeassistscheme3tb4" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme3tb5" id="financeassistscheme3tb5" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme3tb6" id="financeassistscheme3tb6" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme3tb7" id="financeassistscheme3tb7" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme3tb8" id="financeassistscheme3tb8" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme3tb9" id="financeassistscheme3tb9" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme3tb10" id="financeassistscheme3tb10" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme3tb11" id="financeassistscheme3tb11" maxlength="4"></td>   
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme3tb12" id="financeassistscheme3tb12" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme3tb13" id="financeassistscheme3tb13" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme3tb14" id="financeassistscheme3tb14" maxlength="4"></td>
                                                               </tr>

                                                            </tbody>
                                                         </table>
                                                      </div>
                                                         <div class="row">
                                                               <center><input type="submit" class="btn btn green" value="submit" name=""></center>
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