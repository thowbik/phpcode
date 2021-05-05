<!DOCTYPE html>

      <html lang="en">
         <!--<![endif]-->
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
                                                <div class="col-md-3 bg-grey mt-step-col active">
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
                                                                <span class="caption-subject font-dark bold uppercase">Facilities provided to children</span> <small>(Last academic year, primary Grade I-V)</small>
                                                            </div>
                                                            
                                                        </div>
                                                   <div class="portlet-body">
                                                    <form method="post" action="" id="schemestable1">
                                                      <!-- table-scrollable -->
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
                                                                  <td>free Text Books</td>
                                                                  <td><input type="text" class="form-control" name="freescheme1txtbooktb1" id="freescheme1txtbooktb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1txtbooktb2" id="freescheme1txtbooktb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1txtbooktb3" id="freescheme1txtbooktb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1txtbooktb4" id="freescheme1txtbooktb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1txtbooktb5" id="freescheme1txtbooktb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1txtbooktb6" id="freescheme1txtbooktb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1txtbooktb7" id="freescheme1txtbooktb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1txtbooktb8" id="freescheme1txtbooktb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1txtbooktb9" id="freescheme1txtbooktb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1txtbooktb10" id="freescheme1txtbooktb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1txtbooktb11" id="freescheme1txtbooktb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freescheme1txtbooktb12" id="freescheme1txtbooktb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1txtbooktb13" id="freescheme1txtbooktb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1txtbooktb14" id="freescheme1txtbooktb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>free Uniform</td>
                                                                   <td><input type="text" class="form-control" name="freescheme1uniformtb1" id="freescheme1uniformtb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1uniformtb2" id="freescheme1uniformtb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1uniformtb3" id="freescheme1uniformtb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1uniformtb4" id="freescheme1uniformtb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1uniformtb5" id="freescheme1uniformtb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1uniformtb6" id="freescheme1uniformtb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1uniformtb7" id="freescheme1uniformtb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1uniformtb8" id="freescheme1uniformtb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1uniformtb9" id="freescheme1uniformtb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1uniformtb10" id="freescheme1uniformtb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1uniformtb11" id="freescheme1uniformtb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freescheme1uniformtb12" id="freescheme1uniformtb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1uniformtb13" id="freescheme1uniformtb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1uniformtb14" id="freescheme1uniformtb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>free Footwear</td>
                                                                  <td><input type="text" class="form-control" name="freescheme1footweartb1" id="freescheme1footweartb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1footweartb2" id="freescheme1footweartb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1footweartb3" id="freescheme1footweartb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1footweartb4" id="freescheme1footweartb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1footweartb5" id="freescheme1footweartb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1footweartb6" id="freescheme1footweartb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1footweartb7" id="freescheme1footweartb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1footweartb8" id="freescheme1footweartb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1footweartb9" id="freescheme1footweartb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1footweartb10" id="freescheme1footweartb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1footweartb11" id="freescheme1footweartb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freescheme1footweartb12" id="freescheme1footweartb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1footweartb13" id="freescheme1footweartb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1footweartb14" id="freescheme1footweartb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>free School Bag</td>
                                                                  <td><input type="text" class="form-control" name="freescheme1schlbagtb1" id="freescheme1schlbagtb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1schlbagtb2" id="freescheme1schlbagtb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1schlbagtb3" id="freescheme1schlbagtb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1schlbagtb4" id="freescheme1schlbagtb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1schlbagtb5" id="freescheme1schlbagtb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1schlbagtb6" id="freescheme1schlbagtb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1schlbagtb7" id="freescheme1schlbagtb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1schlbagtb8" id="freescheme1schlbagtb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1schlbagtb9" id="freescheme1schlbagtb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1schlbagtb10" id="freescheme1schlbagtb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1schlbagtb11" id="freescheme1schlbagtb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freescheme1schlbagtb12" id="freescheme1schlbagtb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1schlbagtb13" id="freescheme1schlbagtb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1schlbagtb14" id="freescheme1schlbagtb14" maxlength="4"></td>
                                                               </tr> 

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>free Colour Pencils</td>
                                                                  <td><input type="text" class="form-control" name="freescheme1colorpenciltb1" id="freescheme1colorpenciltb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1colorpenciltb2" id="freescheme1colorpenciltb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1colorpenciltb3" id="freescheme1colorpenciltb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1colorpenciltb4" id="freescheme1colorpenciltb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1colorpenciltb5" id="freescheme1colorpenciltb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1colorpenciltb6" id="freescheme1colorpenciltb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1colorpenciltb7" id="freescheme1colorpenciltb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1colorpenciltb8" id="freescheme1colorpenciltb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1colorpenciltb9" id="freescheme1colorpenciltb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1colorpenciltb10" id="freescheme1colorpenciltb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1colorpenciltb11" id="freescheme1colorpenciltb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freescheme1colorpenciltb12" id="freescheme1colorpenciltb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1colorpenciltb13" id="freescheme1colorpenciltb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1colorpenciltb14" id="freescheme1colorpenciltb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>free Colour Crayons</td>
                                                                  <td><input type="text" class="form-control" name="freescheme1colorcrayonstb1" id="freescheme1colorcrayonstb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1colorcrayonstb2" id="freescheme1colorcrayonstb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1colorcrayonstb3" id="freescheme1colorcrayonstb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1colorcrayonstb4" id="freescheme1colorcrayonstb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1colorcrayonstb5" id="freescheme1colorcrayonstb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1colorcrayonstb6" id="freescheme1colorcrayonstb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1colorcrayonstb7" id="freescheme1colorcrayonstb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1colorcrayonstb8" id="freescheme1colorcrayonstb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1colorcrayonstb9" id="freescheme1colorcrayonstb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1colorcrayonstb10" id="freescheme1colorcrayonstb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1colorcrayonstb11" id="freescheme1colorcrayonstb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freescheme1colorcrayonstb12" id="freescheme1colorcrayonstb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1colorcrayonstb13" id="freescheme1colorcrayonstb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1colorcrayonstb14" id="freescheme1colorcrayonstb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>free Note Books</td>
                                                                  <td><input type="text" class="form-control" name="freescheme1notebooktb1" id="freescheme1notebooktb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1notebooktb2" id="freescheme1notebooktb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1notebooktb3" id="freescheme1notebooktb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1notebooktb4" id="freescheme1notebooktb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1notebooktb5" id="freescheme1notebooktb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1notebooktb6" id="freescheme1notebooktb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1notebooktb7" id="freescheme1notebooktb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1notebooktb8" id="freescheme1notebooktb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1notebooktb9" id="freescheme1notebooktb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1notebooktb10" id="freescheme1notebooktb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1notebooktb11" id="freescheme1notebooktb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freescheme1notebooktb12" id="freescheme1notebooktb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1notebooktb13" id="freescheme1notebooktb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1notebooktb14" id="freescheme1notebooktb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>free Bus Pass</td>
                                                                  <td><input type="text" class="form-control" name="freescheme1buspasstb1" id="freescheme1buspasstb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1buspasstb2" id="freescheme1buspasstb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1buspasstb3" id="freescheme1buspasstb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1buspasstb4" id="freescheme1buspasstb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1buspasstb5" id="freescheme1buspasstb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1buspasstb6" id="freescheme1buspasstb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1buspasstb7" id="freescheme1buspasstb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1buspasstb8" id="freescheme1buspasstb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1buspasstb9" id="freescheme1buspasstb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1buspasstb10" id="freescheme1buspasstb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1buspasstb11" id="freescheme1buspasstb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freescheme1buspasstb12" id="freescheme1buspasstb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1buspasstb13" id="freescheme1buspasstb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1buspasstb14" id="freescheme1buspasstb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>Noon - Meal Scheme</td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme1schemetb1" id="noonmealscheme1schemetb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme1schemetb2" id="noonmealscheme1schemetb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme1schemetb3" id="noonmealscheme1schemetb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme1schemetb4" id="noonmealscheme1schemetb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme1schemetb5" id="noonmealscheme1schemetb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme1schemetb6" id="noonmealscheme1schemetb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme1schemetb7" id="noonmealscheme1schemetb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme1schemetb8" id="noonmealscheme1schemetb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme1schemetb9" id="noonmealscheme1schemetb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme1schemetb10" id="noonmealscheme1schemetb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme1schemetb11" id="noonmealscheme1schemetb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="noonmealscheme1schemetb12" id="noonmealscheme1schemetb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme1schemetb13" id="noonmealscheme1schemetb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme1schemetb14" id="noonmealscheme1schemetb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>Financial Assistance for Students Who have lost their bread winning parents</td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme1tb1" id="financeassistscheme1tb1" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme1tb2" id="financeassistscheme1tb2" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme1tb3" id="financeassistscheme1tb3" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme1tb4" id="financeassistscheme1tb4" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme1tb5" id="financeassistscheme1tb5" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme1tb6" id="financeassistscheme1tb6" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme1tb7" id="financeassistscheme1tb7" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme1tb8" id="financeassistscheme1tb8" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme1tb9" id="financeassistscheme1tb9" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme1tb10" id="financeassistscheme1tb10" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme1tb11" id="financeassistscheme1tb11" maxlength="4"></td>   
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme1tb12" id="financeassistscheme1tb12" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme1tb13" id="financeassistscheme1tb13" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme1tb14" id="financeassistscheme1tb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>free Woollen Sweater</td>
                                                                  <td><input type="text" class="form-control" name="freescheme1woollensweatertb1" id="freescheme1woollensweatertb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1woollensweatertb2" id="freescheme1woollensweatertb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1woollensweatertb3" id="freescheme1woollensweatertb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1woollensweatertb4" id="freescheme1woollensweatertb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1woollensweatertb5" id="freescheme1woollensweatertb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1woollensweatertb6" id="freescheme1woollensweatertb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1woollensweatertb7" id="freescheme1woollensweatertb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1woollensweatertb8" id="freescheme1woollensweatertb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1woollensweatertb9" id="freescheme1woollensweatertb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1woollensweatertb10" id="freescheme1woollensweatertb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1woollensweatertb11" id="freescheme1woollensweatertb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freescheme1woollensweatertb12" id="freescheme1woollensweatertb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1woollensweatertb13" id="freescheme1woollensweatertb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme1woollensweatertb14" id="freescheme1woollensweatertb14" maxlength="4"></td>
                                                               </tr>

                                                            </tbody>
                                                         </table>
                                                      </div>
                                                      <!-- /table scrollable -->
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
           

         </body>


      </html>