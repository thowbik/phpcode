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
                                                <div class="col-md-3 bg-grey mt-step-col active">
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
                                                                <span class="caption-subject font-dark bold uppercase">Facilities provided to children</span> <small>(Last academic year, only for Upper Primary Grade VI-VIII)</small>
                                                            </div>
                                                            
                                                        </div>
                                                   <div class="portlet-body">
                                                     <form method="post" action="" id="schemestable2">
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
                                                                  <td>Free Text Books</td>
                                                                  <td><input type="text" class="form-control" name="freescheme2txtbooktb1" id="freescheme2txtbooktb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2txtbooktb2" id="freescheme2txtbooktb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2txtbooktb3" id="freescheme2txtbooktb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2txtbooktb4" id="freescheme2txtbooktb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2txtbooktb5" id="freescheme2txtbooktb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2txtbooktb6" id="freescheme2txtbooktb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2txtbooktb7" id="freescheme2txtbooktb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2txtbooktb8" id="freescheme2txtbooktb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2txtbooktb9" id="freescheme2txtbooktb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2txtbooktb10" id="freescheme2txtbooktb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2txtbooktb11" id="freescheme2txtbooktb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freescheme2txtbooktb12" id="freescheme2txtbooktb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2txtbooktb13" id="freescheme2txtbooktb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2txtbooktb14" id="freescheme2txtbooktb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>Free Uniform</td>
                                                                   <td><input type="text" class="form-control" name="freescheme2uniformtb1" id="freescheme2uniformtb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2uniformtb2" id="freescheme2uniformtb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2uniformtb3" id="freescheme2uniformtb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2uniformtb4" id="freescheme2uniformtb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2uniformtb5" id="freescheme2uniformtb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2uniformtb6" id="freescheme2uniformtb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2uniformtb7" id="freescheme2uniformtb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2uniformtb8" id="freescheme2uniformtb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2uniformtb9" id="freescheme2uniformtb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2uniformtb10" id="freescheme2uniformtb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2uniformtb11" id="freescheme2uniformtb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freescheme2uniformtb12" id="freescheme2uniformtb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2uniformtb13" id="freescheme2uniformtb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2uniformtb14" id="freescheme2uniformtb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>Free Footwear</td>
                                                                  <td><input type="text" class="form-control" name="freescheme2footweartb1" id="freescheme2footweartb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2footweartb2" id="freescheme2footweartb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2footweartb3" id="freescheme2footweartb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2footweartb4" id="freescheme2footweartb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2footweartb5" id="freescheme2footweartb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2footweartb6" id="freescheme2footweartb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2footweartb7" id="freescheme2footweartb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2footweartb8" id="freescheme2footweartb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2footweartb9" id="freescheme2footweartb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2footweartb10" id="freescheme2footweartb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2footweartb11" id="freescheme2footweartb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freescheme2footweartb12" id="freescheme2footweartb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2footweartb13" id="freescheme2footweartb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2footweartb14" id="freescheme2footweartb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>Free School Bag</td>
                                                                  <td><input type="text" class="form-control" name="freescheme2schlbagtb1" id="freescheme2schlbagtb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2schlbagtb2" id="freescheme2schlbagtb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2schlbagtb3" id="freescheme2schlbagtb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2schlbagtb4" id="freescheme2schlbagtb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2schlbagtb5" id="freescheme2schlbagtb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2schlbagtb6" id="freescheme2schlbagtb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2schlbagtb7" id="freescheme2schlbagtb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2schlbagtb8" id="freescheme2schlbagtb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2schlbagtb9" id="freescheme2schlbagtb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2schlbagtb10" id="freescheme2schlbagtb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2schlbagtb11" id="freescheme2schlbagtb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freescheme2schlbagtb12" id="freescheme2schlbagtb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2schlbagtb13" id="freescheme2schlbagtb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2schlbagtb14" id="freescheme2schlbagtb14" maxlength="4"></td>
                                                               </tr> 

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>Free Geometry Box</td>
                                                                  <td><input type="text" class="form-control" name="freescheme2geometryboxtb1" id="freescheme2geometryboxtb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2geometryboxtb2" id="freescheme2geometryboxtb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2geometryboxtb3" id="freescheme2geometryboxtb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2geometryboxtb4" id="freescheme2geometryboxtb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2geometryboxtb5" id="freescheme2geometryboxtb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2geometryboxtb6" id="freescheme2geometryboxtb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2geometryboxtb7" id="freescheme2geometryboxtb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2geometryboxtb8" id="freescheme2geometryboxtb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2geometryboxtb9" id="freescheme2geometryboxtb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2geometryboxtb10" id="freescheme2geometryboxtb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2geometryboxtb11" id="freescheme2geometryboxtb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freescheme2geometryboxtb12" id="freescheme2geometryboxtb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2geometryboxtb13" id="freescheme2geometryboxtb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2geometryboxtb14" id="freescheme2geometryboxtb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>Free Atlas</td>
                                                                  <td><input type="text" class="form-control" name="freescheme2atlastb1" id="freescheme2atlastb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2atlastb2" id="freescheme2atlastb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2atlastb3" id="freescheme2atlastb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2atlastb4" id="freescheme2atlastb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2atlastb5" id="freescheme2atlastb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2atlastb6" id="freescheme2atlastb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2atlastb7" id="freescheme2atlastb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2atlastb8" id="freescheme2atlastb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2atlastb9" id="freescheme2atlastb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2atlastb10" id="freescheme2atlastb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2atlastb11" id="freescheme2atlastb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freescheme2atlastb12" id="freescheme2atlastb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2atlastb13" id="freescheme2atlastb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2atlastb14" id="freescheme2atlastb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>Free Note Books</td>
                                                                  <td><input type="text" class="form-control" name="freescheme2notebooktb1" id="freescheme2notebooktb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2notebooktb2" id="freescheme2notebooktb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2notebooktb3" id="freescheme2notebooktb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2notebooktb4" id="freescheme2notebooktb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2notebooktb5" id="freescheme2notebooktb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2notebooktb6" id="freescheme2notebooktb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2notebooktb7" id="freescheme2notebooktb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2notebooktb8" id="freescheme2notebooktb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2notebooktb9" id="freescheme2notebooktb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2notebooktb10" id="freescheme2notebooktb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2notebooktb11" id="freescheme2notebooktb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freescheme2notebooktb12" id="freescheme2notebooktb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2notebooktb13" id="freescheme2notebooktb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2notebooktb14" id="freescheme2notebooktb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>Free Bus Pass</td>
                                                                  <td><input type="text" class="form-control" name="freescheme2buspasstb1" id="freescheme2buspasstb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2buspasstb2" id="freescheme2buspasstb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2buspasstb3" id="freescheme2buspasstb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2buspasstb4" id="freescheme2buspasstb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2buspasstb5" id="freescheme2buspasstb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2buspasstb6" id="freescheme2buspasstb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2buspasstb7" id="freescheme2buspasstb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2buspasstb8" id="freescheme2buspasstb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2buspasstb9" id="freescheme2buspasstb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2buspasstb10" id="freescheme2buspasstb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2buspasstb11" id="freescheme2buspasstb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freescheme2buspasstb12" id="freescheme2buspasstb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2buspasstb13" id="freescheme2buspasstb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2buspasstb14" id="freescheme2buspasstb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>Noon - Meal Scheme</td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme2schemetb1" id="noonmealscheme2schemetb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme2schemetb2" id="noonmealscheme2schemetb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme2schemetb3" id="noonmealscheme2schemetb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme2schemetb4" id="noonmealscheme2schemetb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme2schemetb5" id="noonmealscheme2schemetb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme2schemetb6" id="noonmealscheme2schemetb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme2schemetb7" id="noonmealscheme2schemetb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme2schemetb8" id="noonmealscheme2schemetb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme2schemetb9" id="noonmealscheme2schemetb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme2schemetb10" id="noonmealscheme2schemetb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme2schemetb11" id="noonmealscheme2schemetb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="noonmealscheme2schemetb12" id="noonmealscheme2schemetb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme2schemetb13" id="noonmealscheme2schemetb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="noonmealscheme2schemetb14" id="noonmealscheme2schemetb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>Financial Assistance for Students Who have lost their bread winning parents</td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme2tb1" id="financeassistscheme2tb1" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme2tb2" id="financeassistscheme2tb2" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme2tb3" id="financeassistscheme2tb3" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme2tb4" id="financeassistscheme2tb4" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme2tb5" id="financeassistscheme2tb5" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme2tb6" id="financeassistscheme2tb6" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme2tb7" id="financeassistscheme2tb7" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme2tb8" id="financeassistscheme2tb8" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme2tb9" id="financeassistscheme2tb9" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme2tb10" id="financeassistscheme2tb10" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme2tb11" id="financeassistscheme2tb11" maxlength="4"></td>   
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme2tb12" id="financeassistscheme2tb12" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme2tb13" id="financeassistscheme2tb13" maxlength="4"></td>
                                                                  <td><br><br><input type="text" class="form-control" name="financeassistscheme2tb14" id="financeassistscheme2tb14" maxlength="4"></td>
                                                               </tr>

                                                               <!-- Note:1,3,5,7,9,11,13 tbs  for boys fields-->
                                                               <!-- Note:2,4,6,8,10,12,14 tbs for girls fields-->
                                                               <tr>
                                                                  <td>Free Woollen Sweater</td>
                                                                  <td><input type="text" class="form-control" name="freescheme2woollensweatertb1" id="freescheme2woollensweatertb1" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2woollensweatertb2" id="freescheme2woollensweatertb2" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2woollensweatertb3" id="freescheme2woollensweatertb3" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2woollensweatertb4" id="freescheme2woollensweatertb4" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2woollensweatertb5" id="freescheme2woollensweatertb5" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2woollensweatertb6" id="freescheme2woollensweatertb6" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2woollensweatertb7" id="freescheme2woollensweatertb7" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2woollensweatertb8" id="freescheme2woollensweatertb8" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2woollensweatertb9" id="freescheme2woollensweatertb9" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2woollensweatertb10" id="freescheme2woollensweatertb10" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2woollensweatertb11" id="freescheme2woollensweatertb11" maxlength="4"></td>   
                                                                  <td><input type="text" class="form-control" name="freescheme2woollensweatertb12" id="freescheme2woollensweatertb12" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2woollensweatertb13" id="freescheme2woollensweatertb13" maxlength="4"></td>
                                                                  <td><input type="text" class="form-control" name="freescheme2woollensweatertb14" id="freescheme2woollensweatertb14" maxlength="4"></td>
                                                               </tr>

                                                            </tbody>
                                                         </table>
                                                      </div>
                                                      <!-- table scrollable ending -->
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