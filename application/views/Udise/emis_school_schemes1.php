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
               .space{
                  width: 100px;
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
                                             <a href="<?php echo base_url().'Udise_schemes/emis_school_schemes1';?>">
                                                <div class="col-md-3 bg-grey mt-step-col active">
                                                   <div class="mt-step-number bg-white font-grey">1</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Schemes</div>
                                                   <div class="mt-step-content font-grey-cascade">Incentives and facilities</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Udise_schemes/emis_school_schemes2';?>">
                                                <div class="col-md-3 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">2</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Schemes</div>
                                                   <div class="mt-step-content font-grey-cascade">Incentives and facilities</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Udise_schemes/emis_school_schemes3';?>">
                                                <div class="col-md-3 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">3</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Schemes</div>
                                                   <div class="mt-step-content font-grey-cascade">Incentives and facilities</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Udise_schemes/emis_school_schemes4';?>">
                                                <div class="col-md-3 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">4</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Schemes</div>
                                                   <div class="mt-step-content font-grey-cascade">Incentives and facilities</div>
                                                </div>
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- <br> -->
                                   <div class="row">
                                       <div class="col-md-12">
                                          <div class="mt-checkbox-inline">
                                             <br>
                                          </div>
                                       </div>
                                    </div>
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
                                                      <!-- error reporting start -->
                                                       <?php if ($this->session->flashdata('schemes')){ ?> 
                                                <!-- BEGIN PAGE CONTENT INNER -->
                                                   <div class="page-content-inner">
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="note note-danger note-bordered">
                                                               <?php echo $this->session->flashdata('schemes'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <!-- END PAGE CONTENT INNER -->
                                             <?php } ?>
                                             <!-- error reporting End -->
                                                    <form method="post" action="<?php echo base_url().'Udise_schemes/emis_school_schemes1' ?>" id="schemestable1">
                                                      
                                                      <!-- division for scrollable -->
                                                         <div class="table-scrollable">
                                                            <table class="table table-bordered table-striped">
                                                               <thead>
                                                                  <tr>
                                                                  <th rowspan="2">Type of facility</th>
                                                                  <th colspan="2">General Students</th>
                                                                  <th colspan="2">SC Students</th>
                                                                  <th colspan="2">ST Students</th>
                                                                  <th colspan="2">OBC Students</th>
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
                                                               </tr>
                                                               </thead>
                                                               <tbody>
                                                                  <tr>
                                                                     <td>
                                                                        <select class="form-control" name="facility">
                                                                           <option value="">Select the option</option>
                                                                           <option value="1">Free Text Books</option>
                                                                           <option value="2">Free Uniform</option>
                                                                           <option value="3">Free Footwear</option>
                                                                           <option value="4">Free School Bag</option>
                                                                           <option value="5">Free Colour Pencils</option>
                                                                           <option value="6">Free Colour Crayons</option>
                                                                           <option value="7">Free Note Books</option>
                                                                           <option value="8">Free Bus Pass</option>
                                                                           <option value="9">Noon-Meal Schemes</option>
                                                                           <option value="10">Financial Assistance for Students Who have lost their bread winning parents</option>
                                                                           <option value="11">Free Woollen Sweater</option>
                                                                        </select>
                                                                     </td>
                                                                     <td>
                                                                        <input type="text" name="tb1" class="form-control space" maxlength="4">
                                                                     </td>
                                                                     <td>
                                                                        <input type="text" name="tb2" class="form-control space" maxlength="4">
                                                                     </td>
                                                                     <td>
                                                                        <input type="text" name="tb3" class="form-control space" maxlength="4">
                                                                     </td>
                                                                     <td>
                                                                        <input type="text" name="tb4" class="form-control space" maxlength="4">
                                                                     </td>
                                                                     <td>
                                                                        <input type="text" name="tb5" class="form-control space" maxlength="4">
                                                                     </td>
                                                                     <td>
                                                                        <input type="text" name="tb6" class="form-control space" maxlength="4">
                                                                     </td>
                                                                     <td>
                                                                        <input type="text" name="tb7" class="form-control space" maxlength="4">
                                                                     </td>
                                                                     <td>
                                                                        <input type="text" name="tb8" class="form-control space" maxlength="4">
                                                                     </td>
                                                                     <td>
                                                                        <input type="text" name="tb9" class="form-control space" maxlength="4">
                                                                     </td>
                                                                     <td>
                                                                        <input type="text" name="tb10" class="form-control space" maxlength="4">
                                                                     </td>
                                                                     <td>
                                                                        <input type="text" name="tb11" class="form-control space" maxlength="4">
                                                                     </td>
                                                                     <td>
                                                                        <input type="text" name="tb12" class="form-control space" maxlength="4">
                                                                     </td>
                                                                  </tr>
                                                               </tbody>
                                                            </table>
                                                         </div>
                                                      <!-- division for scrollable Ending-->
                                                       <div class="row">
                                                               <center><input type="submit" class="btn btn green" value="submit" name=""></center>
                                                         </div>
                                                      </form>
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
                                                               <?php 
                                                                  foreach ($scheme1dta as $data) {?>
                                                                  
                                                               <tr>
                                                                  <td><?php echo $data->facility_name; ?></td>
                                                                  <td>
                                                                     <center><?php echo $data->gen_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                     <center><?php echo $data->gen_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                     <center><?php echo $data->sc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                     <center><?php echo $data->sc_g; ?></center>
                                                                  </td>
                                                                 <td>
                                                                     <center><?php echo $data->st_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                     <center><?php echo $data->st_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                     <center><?php echo $data->obc_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                     <center><?php echo $data->obc_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                     <center><?php echo $data->tot_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                     <center><?php echo $data->tot_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                     <center><?php echo $data->musmin_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                     <center><?php echo $data->musmin_g; ?></center>
                                                                  </td>
                                                                  <td>
                                                                     <center><?php echo $data->othmin_b; ?></center>
                                                                  </td>
                                                                  <td>
                                                                     <center><?php echo $data->othmin_g; ?></center>
                                                                  </td>
                                                               </tr>
                                                               <?php } ?>
                                                            </tbody>
                                                         </table>
                                                      </div>
                                                      <!-- /table scrollable -->
                                                        
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
            
            

         </body>


      </html>