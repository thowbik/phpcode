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
            
            
         </head>

         <style type="text/css">
               label.error { float: none; color:#dd4b39; }
               .space{
                  width: 100px;
               }

               #blindnsrw{
                  display: none;
               }

            </style>
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
                                    <h1>Enrolment Information
                                       <small>New Admissions,Enrolment,Repeaters</small>
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
                                             <a href="<?php echo base_url().'Udise_enrolment/emis_school_enrolment1';?>">
                                                <div class="col-md-2 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">1</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade"><h5><b>Enrolment</b></h5></div>
                                                   <div class="mt-step-content font-grey-cascade">Step 1</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Udise_enrolment/emis_school_enrolment2';?>">
                                                <div class="col-md-2 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">2</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade"><h5><b>Enrolment</b></h5></div>
                                                   <div class="mt-step-content font-grey-cascade">Step 2</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Udise_enrolment/emis_school_enrolment3';?>">
                                                <div class="col-md-2 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">3</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade"><h5><b>Enrolment</b></h5></div>
                                                   <div class="mt-step-content font-grey-cascade">Step 3</div>
                                                </div>
                                             </a>

                                             <a href="<?php echo base_url().'Udise_enrolment/emis_school_enrolment4';?>">
                                                <div class="col-md-2 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">4</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade"><h5><b>Enrolment</b></h5></div>
                                                   <div class="mt-step-content font-grey-cascade">Step 4</div>
                                                </div>
                                             </a>

                                             <a href="<?php echo base_url().'Udise_enrolment/emis_school_enrolment5';?>">
                                                <div class="col-md-2 bg-grey mt-step-col active">
                                                   <div class="mt-step-number bg-white font-grey">5</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade"><h5><b>Enrolment</b></h5></div>
                                                   <div class="mt-step-content font-grey-cascade">Step 5</div>
                                                </div>
                                             </a>

                                             <a href="<?php echo base_url().'Udise_enrolment/emis_school_enrolment6';?>">
                                                <div class="col-md-2 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">6</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade"><h5><b>Enrolment</b></h5></div>
                                                   <div class="mt-step-content font-grey-cascade">Step 6</div>
                                                </div>
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- row for Enable or Disable -->
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="mt-checkbox-inline">
                                             <br>
                                          </div>
                                       </div>
                                    </div>
                                    
                                    <!-- ***** Table content start *****-->

                                    <div class="row">
                                       <div class="col-md-12">
                                                    <div class="portlet light ">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <i class="icon-settings font-dark"></i>
                                                                <span class="caption-subject font-dark bold uppercase">Enrolment by grade for Children with special needs</span>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="portlet-body">

                                                         <!-- error reporting start -->
                                                       <?php if ($this->session->flashdata('enrolment5frm1')){ ?> 
                                                <!-- BEGIN PAGE CONTENT INNER -->
                                                   <div class="page-content-inner">
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="note note-danger note-bordered">
                                                               <?php echo $this->session->flashdata('enrolment5frm1'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <!-- END PAGE CONTENT INNER -->
                                             <?php } ?>
                                             <!-- error reporting End -->

                                                         <!-- form3 Start -->
                                                         <form method="post" action="<?php echo base_url().'Udise_enrolment/emis_school_enrolment5' ?>" id="enrlmnt2frm3">
                                                           <!-- division for table scrollable -->
                                                           <div class="table-scrollable">
                                                            <table data-toggle="table" data-height="299" class="table table-responsive table-bordered table-striped">
                                                               <thead>
                                                                  <tr>
                                                                     <th>Select your Needs</th>
                                                                     <th colspan="4">
                                                                        <select class="form-control" name="enrlmnt2frm3cat" id="enrlmnt2frm3cat">
                                                                              <option value="">Select the Option</option>
                                                                              <option value="1">Blindness</option>
                                                                              <option value="2">Low-vision</option>
                                                                              <option value="3">Hearing impairment(deaf and hard of hearing)</option>
                                                                              <option value="4">Speech and Language disability</option>
                                                                              <option value="5">Locomotor Disability</option>
                                                                              <option value="6">Mental Illness</option>
                                                                              <option value="7">Specific Learning Disabilities</option>
                                                                              <option value="8">Cerebral palsy</option>
                                                                              <option value="9">Autism Spectrum Disorder</option>
                                                                              <option value="10">Multiple Disability including deaf, blindness</option>
                                                                              <option value="11">Leprosy Curved persons</option>
                                                                              <option value="12">Dwarfism</option>
                                                                              <option value="13">Intellectual Disability</option>
                                                                              <option value="14">Muscular Dystrophy</option>
                                                                              <option value="15">Chronic Neurological conditions</option>
                                                                              <option value="16">Multiple Sclerosis</option>
                                                                              <option value="17">Thalassemia</option>
                                                                              <option value="18">Hemophilia</option>
                                                                              <option value="19">Sickle Cell disease</option>
                                                                              <option value="20">Acid Attack victim</option>
                                                                              <option value="21">Parkinson's disease</option>
                                                                           </select>
                                                                     </th>
                                                                  </tr>
                                                                  <tr>
                                                                        
                                                                        <th colspan="2">I</th>
                                                                        <th colspan="2">II</th>
                                                                        <th colspan="2">III</th>
                                                                        <th colspan="2">IV</th>
                                                                        <th colspan="2">V</th>
                                                                        <th colspan="2">VI</th>
                                                                        <th colspan="2">VII</th>
                                                                        <th colspan="2">VIII</th>
                                                                        <th colspan="2">IX</th>
                                                                        <th colspan="2">X</th>
                                                                        <th colspan="2">XI</th>
                                                                        <th colspan="2">XII</th>
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
                                                                  
                                                                </tr>
                                                                   <!-- set1 -->
                                                                   <tr id="blindnsrw">
                                                                      <td>
                                                                         <input type="text" class="form-control space" name="tb1" maxlength="4">
                                                                      </td>
                                                                      <td>
                                                                         <input type="text" class="form-control space" name="tb2" maxlength="4">
                                                                      </td>
                                                                      <td>
                                                                         <input type="text" class="form-control space" name="tb3" maxlength="4">
                                                                      </td>
                                                                      <td>
                                                                         <input type="text" class="form-control space" name="tb4" maxlength="4">
                                                                      </td>
                                                                      <td>
                                                                         <input type="text" class="form-control space" name="tb5" maxlength="4">
                                                                      </td>
                                                                      <td>
                                                                         <input type="text" class="form-control space" name="tb6" maxlength="4">
                                                                      </td>
                                                                      <td>
                                                                         <input type="text" class="form-control space" name="tb7" maxlength="4">
                                                                      </td>
                                                                      <td>
                                                                         <input type="text" class="form-control space" name="tb8" maxlength="4">
                                                                      </td>
                                                                      <td>
                                                                         <input type="text" class="form-control space" name="tb9" maxlength="4">
                                                                      </td>
                                                                      <td>
                                                                         <input type="text" class="form-control space" name="tb10" maxlength="4">
                                                                      </td>
                                                                      <td>
                                                                         <input type="text" class="form-control space" name="tb11" maxlength="4">
                                                                      </td>
                                                                      <td>
                                                                         <input type="text" class="form-control space" name="tb12" maxlength="4">
                                                                      </td>
                                                                      <td>
                                                                         <input type="text" class="form-control space" name="tb13" maxlength="4">
                                                                      </td>
                                                                      <td>
                                                                         <input type="text" class="form-control space" name="tb14" maxlength="4">
                                                                      </td>
                                                                      <td>
                                                                         <input type="text" class="form-control space" name="tb15" maxlength="4">
                                                                      </td>
                                                                      <td>
                                                                         <input type="text" class="form-control space" name="tb16" maxlength="4">
                                                                      </td>
                                                                      <td>
                                                                         <input type="text" class="form-control space" name="tb17" maxlength="4">
                                                                      </td>
                                                                      <td>
                                                                         <input type="text" class="form-control space" name="tb18" maxlength="4">
                                                                      </td>
                                                                      <td>
                                                                         <input type="text" class="form-control space" name="tb19" maxlength="4">
                                                                      </td>
                                                                      <td>
                                                                         <input type="text" class="form-control space" name="tb20" maxlength="4">
                                                                      </td>
                                                                      <td>
                                                                         <input type="text" class="form-control space" name="tb21" maxlength="4">
                                                                      </td>
                                                                      <td>
                                                                         <input type="text" class="form-control space" name="tb22" maxlength="4">
                                                                      </td>
                                                                      <td>
                                                                         <input type="text" class="form-control space" name="tb23" maxlength="4">
                                                                      </td>
                                                                      <td>
                                                                         <input type="text" class="form-control space" name="tb24" maxlength="4">
                                                                      </td>
                                                                   </tr>
                                                                   <!-- set1 Ending -->
                                                               </tbody>
                                                            </table>
                                                           </div>
                                                           <!-- table scrollable Ending -->
                                                           <!-- division for row -->
                                                            <div class="row">
                                                               <center><input type="submit" value="Submit" class="btn green" name=""></center>
                                                            </div>
                                                           <!-- row Ending -->
                                                        </form>
                                                        <!-- ***** form3 Ending ***** -->

                                                         
                                                            

                                                          <div class="table-scrollable">
                                                            <table data-toggle="table" data-height="299" class="table table-responsive table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th rowspan="2">S.No</th>
                                                                        <th>Class</th>
                                                                        <th colspan="2">I</th>
                                                                        <th colspan="2">II</th>
                                                                        <th colspan="2">III</th>
                                                                        <th colspan="2">IV</th>
                                                                        <th colspan="2">V</th>
                                                                        <th colspan="2">VI</th>
                                                                        <th colspan="2">VII</th>
                                                                        <th colspan="2">VIII</th>
                                                                        <th colspan="2">IX</th>
                                                                        <th colspan="2">X</th>
                                                                        <th colspan="2">XI</th>
                                                                        <th colspan="2">XII</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Type of Impairment</th>
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
                                                                        
                                                                        <?php $i=0;  foreach ($records as $rcd) {?>
                                                                        <?php $i++; ?>
                                                                        <tr>
                                                                            <td><?php echo $i; ?></td>
                                                                            <td><?php echo $rcd->imprmnt_type; ?></td>
                                                                            <td><center><p><?php echo $rcd->i_b; ?></p></center></td>
                                                                            <td><center><p><?php echo $rcd->i_g; ?></p></td>
                                                                            <td><center><p><?php echo $rcd->ii_b; ?></p></td>
                                                                            <td><center><p><?php echo $rcd->ii_g; ?></p></td>
                                                                            <td><center><p><?php echo $rcd->iii_b; ?></p></td>
                                                                            <td><center><p><?php echo $rcd->iii_g; ?></p></td>
                                                                            <td><center><p><?php echo $rcd->iv_b; ?></p></td>
                                                                            <td><center><p><?php echo $rcd->iv_g; ?></p></td>
                                                                            <td><center><p><?php echo $rcd->v_b; ?></p></td>
                                                                            <td><center><p><?php echo $rcd->v_g; ?></p></td>
                                                                            <td><center><p><?php echo $rcd->vi_b; ?></p></td>
                                                                            <td><center><p><?php echo $rcd->vi_g; ?></p></td>
                                                                            <td><center><p><?php echo $rcd->vii_b; ?></p></td>
                                                                            <td><center><p><?php echo $rcd->vii_g; ?></p></td>
                                                                            <td><center><p><?php echo $rcd->viii_b; ?></p></td>
                                                                            <td><center><p><?php echo $rcd->viii_g; ?></p></td>
                                                                            <td><center><p><?php echo $rcd->ix_b; ?></p></td>
                                                                            <td><center><p><?php echo $rcd->ix_g; ?></p></td>
                                                                            <td><center><p><?php echo $rcd->x_b; ?></p></td>
                                                                            <td><center><p><?php echo $rcd->x_g; ?></p></td>
                                                                            <td><center><p><?php echo $rcd->xi_b; ?></p></td>
                                                                            <td><center><p><?php echo $rcd->xi_g; ?></p></td>
                                                                            <td><center><p><?php echo $rcd->xii_b; ?></p></td>
                                                                            <td><center><p><?php echo $rcd->xii_g; ?></p></td>
                                                                        </tr>
                                                                        <?php } ?>
                                                                       
                                                                </tbody>
                                                            </table>
                                                           
                                                          </div>
                                                          <!-- scrollable table division -->
                                                        </div>
                                                    </div>
                                                </div> 
                                          </div>


                                    <!-- ***** Table content Ending *****-->


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
    
            </script>

           
         </body>


      </html>