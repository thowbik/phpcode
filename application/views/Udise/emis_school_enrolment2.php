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
               .space{
                  width: 100px;
               }

               #row1{
                  display: none;
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
                                                <div class="col-md-2 bg-grey mt-step-col  active">
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
                                                <div class="col-md-2 bg-grey mt-step-col">
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
                                    <br>
                                    <div class="row">
                                       <div class="col-md-12">
                                                    <div class="portlet light ">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <i class="icon-settings font-dark"></i>
                                                                <span class="caption-subject font-dark bold uppercase">Enrolment by grade in the current academic session</span> <small>(By medium of instruction)</small>
                                                                <!-- <br>
                                                                <h6>Note: <font style="color: red;">Total students (classwise) should match with class wise enrolment block E of DCF</font></h6> -->
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="portlet-body">

                                                          <!-- error reporting start -->
                                                       <?php if ($this->session->flashdata('enrolment2frm1')){ ?> 
                                                <!-- BEGIN PAGE CONTENT INNER -->
                                                   <div class="page-content-inner">
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="note note-danger note-bordered">
                                                               <?php echo $this->session->flashdata('enrolment2frm1'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <!-- END PAGE CONTENT INNER -->
                                             <?php } ?>
                                             <!-- error reporting End -->

                                                         <!-- form1 -->
                                                         <form method="post" action="<?php echo base_url().'Udise_enrolment/enrlmnt2frm1' ?>" id="enrlmnt2frm1">
                                                         <div class="table-scrollable">
                                                         <table data-height="299" class="table table-bordered table-striped">
                                                            <thead>
                                                               <tr>
                                                                  <th colspan="26">Enrolment by grade in the current academic session (By medium of instruction)</th>
                                                               </tr>
                                                            </thead>
                                                            <tbody>
                                                              
                                                                    <tr>
                                                                        <th>Classes</th>
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
                                                                        <th>Medium of instruction</th>
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
                                                                    <tr>
                                                                       <td> <select class="form-control" name="medium">
                                                                     <option selected="selected" value="">Select the Option</option>
                                                                     <?php foreach ($dropdwnmedium as $medium){  ?>
                                                                     <option value="<?php echo $medium;?>"><?php echo $medium;?></option>
                                                                     <?php  }?>
                                                                  </select></td>
                                                                     <!-- set1 -->
                                                                     <td>
                                                                        <input type="text" class="form-control space" name="tb1" maxlength="5">
                                                                     </td>
                                                                     <td>
                                                                        <input type="text" class="form-control space" name="tb2" maxlength="5">
                                                                     </td>
                                                                     <!-- set1 Ending -->

                                                                     <!-- set2 -->
                                                                     <td>
                                                                        <input type="text" class="form-control space" name="tb3" maxlength="5">
                                                                     </td>
                                                                     <td>
                                                                        <input type="text" class="form-control space" name="tb4" maxlength="5">
                                                                     </td>
                                                                     <!-- set2 Ending -->

                                                                     <!-- set3 -->
                                                                     <td>
                                                                        <input type="text" class="form-control space" name="tb5" maxlength="5">
                                                                     </td>
                                                                     <td>
                                                                        <input type="text" class="form-control space" name="tb6" maxlength="5">
                                                                     </td>
                                                                     <!-- set3 Ending -->

                                                                     <!-- set4 -->
                                                                     <td>
                                                                        <input type="text" class="form-control space" name="tb7" maxlength="5">
                                                                     </td>
                                                                     <td>
                                                                        <input type="text" class="form-control space" name="tb8" maxlength="5">
                                                                     </td>
                                                                     <!-- set4 Ending -->

                                                                     <!-- set5 -->
                                                                     <td>
                                                                        <input type="text" class="form-control space" name="tb9" maxlength="5">
                                                                     </td>
                                                                     <td>
                                                                        <input type="text" class="form-control space" name="tb10" maxlength="5">
                                                                     </td>
                                                                     <!-- set5 Ending -->

                                                                     <!-- set6 -->
                                                                     <td>
                                                                        <input type="text" class="form-control space" name="tb11" maxlength="5">
                                                                     </td>
                                                                     <td>
                                                                        <input type="text" class="form-control space" name="tb12" maxlength="5">
                                                                     </td>
                                                                     <!-- set6 Ending -->

                                                                     <!-- set7 -->
                                                                     <td>
                                                                        <input type="text" class="form-control space" name="tb13" maxlength="5">
                                                                     </td>
                                                                     <td>
                                                                        <input type="text" class="form-control space" name="tb14" maxlength="5">
                                                                     </td>
                                                                     <!-- set7 Ending -->

                                                                     <!-- set8 -->
                                                                     <td>
                                                                        <input type="text" class="form-control space" name="tb15" maxlength="5">
                                                                     </td>
                                                                     <td>
                                                                        <input type="text" class="form-control space" name="tb16" maxlength="5">
                                                                     </td>
                                                                     <!-- set8 Ending -->

                                                                     <!-- set9 -->
                                                                     <td>
                                                                        <input type="text" class="form-control space" name="tb17" maxlength="5">
                                                                     </td>
                                                                     <td>
                                                                        <input type="text" class="form-control space" name="tb18" maxlength="5">
                                                                     </td>
                                                                     <!-- set9 Ending -->

                                                                     <!-- set10 -->
                                                                     <td>
                                                                        <input type="text" class="form-control space" name="tb19" maxlength="5">
                                                                     </td>
                                                                     <td>
                                                                        <input type="text" class="form-control space" name="tb20" maxlength="5">
                                                                     </td>
                                                                     <!-- set10 Ending -->

                                                                     <!-- set11 -->
                                                                     <td>
                                                                        <input type="text" class="form-control space" name="tb21" maxlength="5">
                                                                     </td>
                                                                     <td>
                                                                        <input type="text" class="form-control space" name="tb22" maxlength="5">
                                                                     </td>
                                                                     <!-- set11 Ending -->

                                                                     <!-- set12 -->
                                                                     <td>
                                                                        <input type="text" class="form-control space" name="tb23" maxlength="5">
                                                                     </td>
                                                                     <td>
                                                                        <input type="text" class="form-control space" name="tb24" maxlength="5">
                                                                     </td>
                                                                     <!-- set12 Ending -->

                                                                    </tr>
                                                               
                                                            </tbody>
                                                         </table>
                                                         </div>
                                                         <!-- table 1 scrollable Ending -->
                                                         <div class="row">
                                                            <center><input type="submit" value="Submit" class="btn green" name=""></center>
                                                         </div>
                                                      </form>
                                                      
                                                     
                                                           

                                                      <!-- table1 form Ending -->
                                                          <!-- division for responsive -->
                                                          <div class="table-scrollable">
                                                            <table data-toggle="table" data-height="299" class="table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Classes</th>
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
                                                                        <th colspan="2"></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Medium of instruction</th>
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
                                                                        <th><center>Status</center></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                   <?php 
                                                      foreach ($tbl1datas as $data1) {?>
                                                                   <tr>
                                                                     <td><?php echo $data1->med_instrct; ?></td>
                                                                     <td><?php echo $data1->med_i_b;?></td>
                                                                     <td><?php echo $data1->med_i_g; ?></td>
                                                                     <td><?php echo $data1->med_ii_b; ?></td>
                                                                     <td><?php echo $data1->med_ii_g; ?></td>
                                                                     <td><?php echo $data1->med_iii_b; ?></td>
                                                                     <td><?php echo $data1->med_iii_g; ?></td>
                                                                     <td><?php echo $data1->med_iv_b; ?></td>
                                                                     <td><?php echo $data1->med_iv_g; ?></td>
                                                                     <td><?php echo $data1->med_v_b; ?></td>
                                                                     <td><?php echo $data1->med_v_g; ?></td>
                                                                     <td><?php echo $data1->med_vi_b; ?></td>
                                                                     <td><?php echo $data1->med_vi_g; ?></td>
                                                                     <td><?php echo $data1->med_vii_b; ?></td>
                                                                     <td><?php echo $data1->med_vii_g; ?></td>
                                                                     <td><?php echo $data1->med_viii_b; ?></td>
                                                                     <td><?php echo $data1->med_viii_g; ?></td>
                                                                     <td><?php echo $data1->med_ix_b; ?></td>
                                                                     <td><?php echo $data1->med_ix_g; ?></td>
                                                                     <td><?php echo $data1->med_x_b; ?></td>
                                                                     <td><?php echo $data1->med_x_g; ?></td>
                                                                     <td><?php echo $data1->med_xi_b; ?></td>
                                                                     <td><?php echo $data1->med_xi_g; ?></td>
                                                                     <td><?php echo $data1->med_xii_b; ?></td>
                                                                     <td><?php echo $data1->med_xii_g; ?></td>
                                                                     <td>
                                                                        <a href="<?php echo base_url().'Udise_enrolment/tbl1remove/'.$data1->uniq_id; ?>" class="btn red"> Remove
                                                                                            <i class="fa fa-close"></i>
                                                                                        </a>
                                                                     </td>
                                                                   </tr>
                                                                   <?php  

                                                                   $medium1_boys[]= $data1->med_i_b; 
                                                                   $medium1_girls[]= $data1->med_i_g; 
                                                                  
                                                                   $medium2_boys[]= $data1->med_ii_b; 
                                                                   $medium2_girls[]= $data1->med_ii_g;

                                                                   $medium3_boys[]= $data1->med_iii_b; 
                                                                   $medium3_girls[]= $data1->med_iii_g;

                                                                   $medium4_boys[]= $data1->med_iv_b; 
                                                                   $medium4_girls[]= $data1->med_iv_g; 

                                                                   $medium5_boys[]= $data1->med_v_b; 
                                                                   $medium5_girls[]= $data1->med_v_g; 

                                                                   $medium6_boys[]= $data1->med_vi_b; 
                                                                   $medium6_girls[]= $data1->med_vi_g;


                                                                   $medium7_boys[]= $data1->med_vii_b; 
                                                                   $medium7_girls[]= $data1->med_vii_g; 

                                                                   $medium8_boys[]= $data1->med_viii_b; 
                                                                   $medium8_girls[]= $data1->med_viii_g; 

                                                                   $medium9_boys[]= $data1->med_ix_b; 
                                                                   $medium9_girls[]= $data1->med_ix_g; 

                                                                   $medium10_boys[]= $data1->med_x_b; 
                                                                   $medium10_girls[]= $data1->med_x_g; 

                                                                   $medium11_boys[]= $data1->med_xi_b; 
                                                                   $medium11_girls[]= $data1->med_xi_g; 

                                                                   $medium12_boys[]= $data1->med_xii_b; 
                                                                   $medium12_girls[]= $data1->med_xii_g;

                                                                   ?>

                                                                  <?php } ?>

                                                                   <?php 
                                                                    
                                                                   $rowcount=count($tbl1datas);

                                                                    $med_i_b_tot  = 0;
                                                                    $med_i_g_tot  = 0;

                                                                    $med_ii_b_tot  = 0;
                                                                    $med_ii_g_tot  = 0;

                                                                    $med_iii_b_tot  = 0;
                                                                    $med_iii_g_tot  = 0;

                                                                    $med_iv_b_tot  = 0;
                                                                    $med_iv_g_tot  = 0;

                                                                    $med_v_b_tot  = 0;
                                                                    $med_v_g_tot  = 0;

                                                                    $med_vi_b_tot  = 0;
                                                                    $med_vi_g_tot  = 0;

                                                                    $med_vii_b_tot  = 0;
                                                                    $med_vii_g_tot  = 0;

                                                                    $med_viii_b_tot  = 0;
                                                                    $med_viii_g_tot  = 0;

                                                                    $med_ix_b_tot  = 0;
                                                                    $med_ix_g_tot  = 0;

                                                                    $med_x_b_tot  = 0;
                                                                    $med_x_g_tot  = 0;

                                                                    $med_xi_b_tot  = 0;
                                                                    $med_xi_g_tot  = 0;

                                                                    $med_xii_b_tot  = 0;
                                                                    $med_xii_g_tot  = 0;


                                                                   for($i=0;$i<$rowcount;$i++){
                                                                      $med_i_b_tot = $med_i_b_tot + $medium1_boys[$i];
                                                                      $med_i_g_tot = $med_i_g_tot + $medium1_girls[$i];

                                                                      $med_ii_b_tot = $med_ii_b_tot + $medium2_boys[$i];
                                                                      $med_ii_g_tot = $med_ii_g_tot + $medium2_girls[$i];

                                                                      $med_iii_b_tot = $med_iii_b_tot + $medium3_boys[$i];
                                                                      $med_iii_g_tot = $med_iii_g_tot + $medium3_girls[$i];

                                                                      $med_iv_b_tot = $med_iv_b_tot + $medium4_boys[$i];
                                                                      $med_iv_g_tot = $med_iv_g_tot + $medium4_girls[$i];

                                                                      $med_v_b_tot = $med_v_b_tot + $medium5_boys[$i];
                                                                      $med_v_g_tot = $med_v_g_tot + $medium5_girls[$i];

                                                                      $med_vi_b_tot = $med_vi_b_tot + $medium6_boys[$i];
                                                                      $med_vi_g_tot = $med_vi_g_tot + $medium6_girls[$i];

                                                                      $med_vii_b_tot = $med_vii_b_tot + $medium7_boys[$i];
                                                                      $med_vii_g_tot = $med_vii_g_tot + $medium7_girls[$i];

                                                                      $med_viii_b_tot = $med_viii_b_tot + $medium8_boys[$i];
                                                                      $med_viii_g_tot = $med_viii_g_tot + $medium8_girls[$i];

                                                                      $med_ix_b_tot = $med_ix_b_tot + $medium9_boys[$i];
                                                                      $med_ix_g_tot = $med_ix_g_tot + $medium9_girls[$i];

                                                                      $med_x_b_tot = $med_x_b_tot + $medium10_boys[$i];
                                                                      $med_x_g_tot = $med_x_g_tot + $medium10_girls[$i];

                                                                      $med_xi_b_tot = $med_xi_b_tot + $medium11_boys[$i];
                                                                      $med_xi_g_tot = $med_xi_g_tot + $medium11_girls[$i];

                                                                      $med_xii_b_tot = $med_xii_b_tot + $medium12_boys[$i];
                                                                      $med_xii_g_tot = $med_xii_g_tot + $medium12_girls[$i];
                                                                   }
                                                                    ?>
                                                                   <tr>
                                                                     <td>Total</td>
                                                                     <td><?php echo $med_i_b_tot; ?></td>
                                                                     <td><?php echo $med_i_g_tot; ?></td>
                                                                     <td><?php echo $med_ii_b_tot; ?></td>
                                                                     <td><?php echo $med_ii_g_tot; ?></td>
                                                                     <td><?php echo $med_iii_b_tot; ?></td>
                                                                     <td><?php echo $med_iii_g_tot; ?></td>
                                                                     <td><?php echo $med_iv_b_tot; ?></td>
                                                                     <td><?php echo $med_iv_g_tot; ?></td>
                                                                     <td><?php echo $med_v_b_tot; ?></td>
                                                                     <td><?php echo $med_v_g_tot; ?></td>
                                                                     <td><?php echo $med_vi_b_tot; ?></td>
                                                                     <td><?php echo $med_vi_g_tot; ?></td>
                                                                     <td><?php echo $med_vii_b_tot; ?></td>
                                                                     <td><?php echo $med_vii_g_tot; ?></td>
                                                                     <td><?php echo $med_viii_b_tot; ?></td>
                                                                     <td><?php echo $med_viii_g_tot; ?></td>
                                                                     <td><?php echo $med_ix_b_tot; ?></td>
                                                                     <td><?php echo $med_ix_g_tot; ?></td>
                                                                     <td><?php echo $med_x_b_tot; ?></td>
                                                                     <td><?php echo $med_x_g_tot; ?></td>
                                                                     <td><?php echo $med_xi_b_tot; ?></td>
                                                                     <td><?php echo $med_xi_g_tot; ?></td>
                                                                     <td><?php echo $med_xii_b_tot; ?></td>
                                                                     <td><?php echo $med_xii_g_tot; ?></td>
                                                                     <td></td>
                                                                   </tr>

                                                                </tbody>
                                                            </table>
                                                          </div>
                                                          <!-- division for responsive -->

                                                          

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
                                                                <span class="caption-subject font-dark bold uppercase">Repeaters by grade in the current academic session</span> <small>(By social category)</small>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="portlet-body">

                                                         <!-- error reporting start -->
                                                       <?php if ($this->session->flashdata('enrolment2frm2')){ ?> 
                                                <!-- BEGIN PAGE CONTENT INNER -->
                                                   <div class="page-content-inner">
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="note note-danger note-bordered">
                                                               <?php echo $this->session->flashdata('enrolment2frm2'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <!-- END PAGE CONTENT INNER -->
                                             <?php } ?>
                                             <!-- error reporting End -->

                                                         <!-- form2 Start -->
                                                         <form action="<?php echo base_url().'Udise_enrolment/emis_school_enrolment2' ?>" method="post" id="enrlmnt2frm2">
                                                        <!-- table scrollable -->
                                                        <div class="table-scrollable">
                                                               <table data-height="299" class="table table-bordered table-striped">
                                                                  <thead>
                                                                     <tr>
                                                                        <th>Select Social category</th>
                                                                        <th colspan="4">
                                                                           <select class="form-control" name="enrlmnt2frm2cat" id="enrlmnt2frm2cat">
                                                                              <option value="">Select the Option</option>
                                                                              <option value="gen">General</option>
                                                                              <option value="sc">SC</option>
                                                                              <option value="st">ST</option>
                                                                              <option value="obc">OBC</option>
                                                                              <option value="muslm">Muslim</option>
                                                                              <option value="chrst">Christian</option>
                                                                              <option value="sikh">Sikh</option>
                                                                              <option value="budhst">Buddhist</option>
                                                                              <option value="parsi">Parsi</option>
                                                                              <option value="jain">Jain</option>
                                                                              <option value="othrs">Others</option>
                                                                           </select>
                                                                        </th>
                                                                        <th colspan="20"></th>
                                                                     </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                    

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
                                                                    <tr id="row1">
                                                                        <td><input type="text" class="form-control space" name="tb1" maxlength="5"></td>
                                                                        <td><input type="text" class="form-control space" name="tb2" maxlength="5"></td>
                                                                        <td><input type="text" class="form-control space" name="tb3" maxlength="5"></td>
                                                                        <td><input type="text" class="form-control space" name="tb4" maxlength="5"></td>
                                                                        <td><input type="text" class="form-control space" name="tb5" maxlength="5"></td>
                                                                        <td><input type="text" class="form-control space" name="tb6" maxlength="5"></td>
                                                                        <td><input type="text" class="form-control space" name="tb7" maxlength="5"></td>
                                                                        <td><input type="text" class="form-control space" name="tb8" maxlength="5"></td>
                                                                        <td><input type="text" class="form-control space" name="tb9" maxlength="5"></td>
                                                                        <td><input type="text" class="form-control space" name="tb10" maxlength="5"></td>
                                                                        <td><input type="text" class="form-control space" name="tb11" maxlength="5"></td>
                                                                        <td><input type="text" class="form-control space" name="tb12" maxlength="5"></td>
                                                                        <td><input type="text" class="form-control space" name="tb13" maxlength="5"></td>
                                                                        <td><input type="text" class="form-control space" name="tb14" maxlength="5"></td>
                                                                        <td><input type="text" class="form-control space" name="tb15" maxlength="5"></td>
                                                                        <td><input type="text" class="form-control space" name="tb16" maxlength="5"></td>
                                                                        <td><input type="text" class="form-control space" name="tb17" maxlength="5"></td>
                                                                        <td><input type="text" class="form-control space" name="tb18" maxlength="5"></td>
                                                                        <td><input type="text" class="form-control space" name="tb19" maxlength="5"></td>
                                                                        <td><input type="text" class="form-control space" name="tb20" maxlength="5"></td>
                                                                        <td><input type="text" class="form-control space" name="tb21" maxlength="5"></td>
                                                                        <td><input type="text" class="form-control space" name="tb22" maxlength="5"></td>
                                                                        <td><input type="text" class="form-control space" name="tb23" maxlength="5"></td>
                                                                        <td><input type="text" class="form-control space" name="tb24" maxlength="5"></td>
                                                                    </tr>

                                                                  </tbody>
                                                               </table>
                                                        </div>
                                                        <!-- table scrollable Ending -->
                                                        <!-- division for row -->
                                                        <div class="row">
                                                            <center>
                                                               <input type="Submit" value="Submit" class="btn green" name="">   
                                                            </center>
                                                        </div>
                                                        <!-- division row ending -->
                                                        </form>
                                                        <!-- form2 Ending -->

                                                          <div class="table-scrollable">
                                                        <table data-toggle="table" data-height="299" class="table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Classes</th>
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
                                                                        <th></th>
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
                                                                     <td>General</td>
                                                                     <td><center><?php echo $gen_i_b; ?></center></td>
                                                                     <td><center><?php echo $gen_i_g; ?></td>
                                                                     <td><center><?php echo $gen_ii_b; ?></td>
                                                                     <td><center><?php echo $gen_ii_g; ?></td>
                                                                     <td><center><?php echo $gen_iii_b; ?></td>
                                                                     <td><center><?php echo $gen_iii_g; ?></td>
                                                                     <td><center><?php echo $gen_iv_b; ?></td>
                                                                     <td><center><?php echo $gen_iv_g; ?></td>
                                                                     <td><center><?php echo $gen_v_b; ?></td>
                                                                     <td><center><?php echo $gen_v_g; ?></td>
                                                                     <td><center><?php echo $gen_vi_b; ?></td>
                                                                     <td><center><?php echo $gen_vi_g; ?></td>
                                                                     <td><center><?php echo $gen_vii_b; ?></td>
                                                                     <td><center><?php echo $gen_vii_g; ?></td>
                                                                     <td><center><?php echo $gen_viii_b; ?></td>
                                                                     <td><center><?php echo $gen_viii_g; ?></td>
                                                                     <td><center><?php echo $gen_ix_b; ?></td>
                                                                     <td><center><?php echo $gen_ix_g; ?></td>
                                                                     <td><center><?php echo $gen_x_b; ?></td>
                                                                     <td><center><?php echo $gen_x_g; ?></td>
                                                                     <td><center><?php echo $gen_xi_b; ?></td>
                                                                     <td><center><?php echo $gen_xi_g; ?></td>
                                                                     <td><center><?php echo $gen_xii_b; ?></td>
                                                                     <td><center><?php echo $gen_xii_g; ?></td>
                                                                   </tr>
                                                                   <tr>
                                                                     <td>SC</td>
                                                                     <td><center><?php echo $sc_i_b; ?></center></td>
                                                                     <td><center><?php echo $sc_i_g; ?></td>
                                                                     <td><center><?php echo $sc_ii_b; ?></td>
                                                                     <td><center><?php echo $sc_ii_g; ?></td>
                                                                     <td><center><?php echo $sc_iii_b; ?></td>
                                                                     <td><center><?php echo $sc_iii_g; ?></td>
                                                                     <td><center><?php echo $sc_iv_b; ?></td>
                                                                     <td><center><?php echo $sc_iv_g; ?></td>
                                                                     <td><center><?php echo $sc_v_b; ?></td>
                                                                     <td><center><?php echo $sc_v_g; ?></td>
                                                                     <td><center><?php echo $sc_vi_b; ?></td>
                                                                     <td><center><?php echo $sc_vi_g; ?></td>
                                                                     <td><center><?php echo $sc_vii_b; ?></td>
                                                                     <td><center><?php echo $sc_vii_g; ?></td>
                                                                     <td><center><?php echo $sc_viii_b; ?></td>
                                                                     <td><center><?php echo $sc_viii_g; ?></td>
                                                                     <td><center><?php echo $sc_ix_b; ?></td>
                                                                     <td><center><?php echo $sc_ix_g; ?></td>
                                                                     <td><center><?php echo $sc_x_b; ?></td>
                                                                     <td><center><?php echo $sc_x_g; ?></td>
                                                                     <td><center><?php echo $sc_xi_b; ?></td>
                                                                     <td><center><?php echo $sc_xi_g; ?></td>
                                                                     <td><center><?php echo $sc_xii_b; ?></td>
                                                                     <td><center><?php echo $sc_xii_g; ?></td>
                                                                   </tr>
                                                                   <tr>
                                                                     <td>ST</td>
                                                                     <td><center><?php echo $st_i_b; ?></center></td>
                                                                     <td><center><?php echo $st_i_g; ?></td>
                                                                     <td><center><?php echo $st_ii_b; ?></td>
                                                                     <td><center><?php echo $st_ii_g; ?></td>
                                                                     <td><center><?php echo $st_iii_b; ?></td>
                                                                     <td><center><?php echo $st_iii_g; ?></td>
                                                                     <td><center><?php echo $st_iv_b; ?></td>
                                                                     <td><center><?php echo $st_iv_g; ?></td>
                                                                     <td><center><?php echo $st_v_b; ?></td>
                                                                     <td><center><?php echo $st_v_g; ?></td>
                                                                     <td><center><?php echo $st_vi_b; ?></td>
                                                                     <td><center><?php echo $st_vi_g; ?></td>
                                                                     <td><center><?php echo $st_vii_b; ?></td>
                                                                     <td><center><?php echo $st_vii_g; ?></td>
                                                                     <td><center><?php echo $st_viii_b; ?></td>
                                                                     <td><center><?php echo $st_viii_g; ?></td>
                                                                     <td><center><?php echo $st_ix_b; ?></td>
                                                                     <td><center><?php echo $st_ix_g; ?></td>
                                                                     <td><center><?php echo $st_x_b; ?></td>
                                                                     <td><center><?php echo $st_x_g; ?></td>
                                                                     <td><center><?php echo $st_xi_b; ?></td>
                                                                     <td><center><?php echo $st_xi_g; ?></td>
                                                                     <td><center><?php echo $st_xii_b; ?></td>
                                                                     <td><center><?php echo $st_xii_g; ?></td>
                                                                   </tr>
                                                                   <tr>
                                                                     <td>OBC</td>
                                                                     <td><center><?php echo $obc_i_b; ?></center></td>
                                                                     <td><center><?php echo $obc_i_g; ?></td>
                                                                     <td><center><?php echo $obc_ii_b; ?></td>
                                                                     <td><center><?php echo $obc_ii_g; ?></td>
                                                                     <td><center><?php echo $obc_iii_b; ?></td>
                                                                     <td><center><?php echo $obc_iii_g; ?></td>
                                                                     <td><center><?php echo $obc_iv_b; ?></td>
                                                                     <td><center><?php echo $obc_iv_g; ?></td>
                                                                     <td><center><?php echo $obc_v_b; ?></td>
                                                                     <td><center><?php echo $obc_v_g; ?></td>
                                                                     <td><center><?php echo $obc_vi_b; ?></td>
                                                                     <td><center><?php echo $obc_vi_g; ?></td>
                                                                     <td><center><?php echo $obc_vii_b; ?></td>
                                                                     <td><center><?php echo $obc_vii_g; ?></td>
                                                                     <td><center><?php echo $obc_viii_b; ?></td>
                                                                     <td><center><?php echo $obc_viii_g; ?></td>
                                                                     <td><center><?php echo $obc_ix_b; ?></td>
                                                                     <td><center><?php echo $obc_ix_g; ?></td>
                                                                     <td><center><?php echo $obc_x_b; ?></td>
                                                                     <td><center><?php echo $obc_x_g; ?></td>
                                                                     <td><center><?php echo $obc_xi_b; ?></td>
                                                                     <td><center><?php echo $obc_xi_g; ?></td>
                                                                     <td><center><?php echo $obc_xii_b; ?></td>
                                                                     <td><center><?php echo $obc_xii_g; ?></td>
                                                                   </tr>
                                                                   <?php 
                                                                     $tot1 = (($gen_i_b)+($sc_i_b)+($st_i_b)+($obc_i_b));
                                                                     $tot2 = (($gen_i_g)+($sc_i_g)+($st_i_g)+($obc_i_g));
                                                                     $tot3 = (($gen_ii_b)+($sc_ii_b)+($st_ii_b)+($obc_ii_b));
                                                                     $tot4 = (($gen_ii_g)+($sc_ii_g)+($st_ii_g)+($obc_ii_g));
                                                                     $tot5 = (($gen_iii_b)+($sc_iii_b)+($st_iii_b)+($obc_iii_b));
                                                                     $tot6 = (($gen_iii_g)+($sc_iii_g)+($st_iii_g)+($obc_iii_g));
                                                                     $tot7 = (($gen_iv_b)+($sc_iv_b)+($st_iv_b)+($obc_iv_b));
                                                                     $tot8 = (($gen_iv_g)+($sc_iv_g)+($st_iv_g)+($obc_iv_g));
                                                                     $tot9 = (($gen_v_b)+($sc_v_b)+($st_v_b)+($obc_v_b));
                                                                     $tot10 = (($gen_v_g)+($sc_v_g)+($st_v_g)+($obc_v_g));
                                                                     $tot11 = (($gen_vi_b)+($sc_vi_b)+($st_vi_b)+($obc_vi_b));
                                                                     $tot12 = (($gen_vi_g)+($sc_vi_g)+($st_vi_g)+($obc_vi_g));
                                                                     $tot13 = (($gen_vii_b)+($sc_vii_b)+($st_vii_b)+($obc_vii_b));
                                                                     $tot14 = (($gen_vii_g)+($sc_vii_g)+($st_vii_g)+($obc_vii_g));
                                                                     $tot15 = (($gen_viii_b)+($sc_viii_b)+($st_viii_b)+($obc_viii_b));
                                                                     $tot16 = (($gen_viii_g)+($sc_viii_g)+($st_viii_g)+($obc_viii_g));
                                                                     $tot17 = (($gen_ix_b)+($sc_ix_b)+($st_ix_b)+($obc_ix_b));
                                                                     $tot18 = (($gen_ix_g)+($sc_ix_g)+($st_ix_g)+($obc_ix_g));
                                                                     $tot19 = (($gen_x_b)+($sc_x_b)+($st_x_b)+($obc_x_b));
                                                                     $tot20 = (($gen_x_g)+($sc_x_g)+($st_x_g)+($obc_x_g));
                                                                     $tot21 = (($gen_xi_b)+($sc_xi_b)+($st_xi_b)+($obc_xi_b));
                                                                     $tot22 = (($gen_xi_g)+($sc_xi_g)+($st_xi_g)+($obc_xi_g));
                                                                     $tot23 = (($gen_xii_b)+($sc_xii_b)+($st_xii_b)+($obc_xii_b));
                                                                     $tot24 = (($gen_xii_g)+($sc_xii_g)+($st_xii_g)+($obc_xii_g));

                                                                    ?>
                                                                   <tr>
                                                                     <td>Total Repeaters</td>
                                                                     <td><?php echo $tot1; ?></td>
                                                                     <td><?php echo $tot2; ?></td>
                                                                     <td><?php echo $tot3; ?></td>
                                                                     <td><?php echo $tot4; ?></td>
                                                                     <td><?php echo $tot5; ?></td>
                                                                     <td><?php echo $tot6; ?></td>
                                                                     <td><?php echo $tot7; ?></td>
                                                                     <td><?php echo $tot8; ?></td>
                                                                     <td><?php echo $tot9; ?></td>
                                                                     <td><?php echo $tot10; ?></td>
                                                                     <td><?php echo $tot11; ?></td>
                                                                     <td><?php echo $tot12; ?></td>
                                                                     <td><?php echo $tot13; ?></td>
                                                                     <td><?php echo $tot14; ?></td>
                                                                     <td><?php echo $tot15; ?></td>
                                                                     <td><?php echo $tot16; ?></td>
                                                                     <td><?php echo $tot17; ?></td>
                                                                     <td><?php echo $tot18; ?></td>
                                                                     <td><?php echo $tot19; ?></td>
                                                                     <td><?php echo $tot20; ?></td>
                                                                     <td><?php echo $tot21; ?></td>
                                                                     <td><?php echo $tot22; ?></td>
                                                                     <td><?php echo $tot23; ?></td>
                                                                     <td><?php echo $tot24; ?></td>
                                                                   </tr>
                                                                   <tr>
                                                                     <td colspan="27"><b>Out of the total Repeaters,</b>provide details of repeaters belonging to following Minority groups*</td>
                                                                   </tr>
                                                                   <tr>
                                                                     <td>Muslim</td>
                                                                     <td><center><?php echo $muslm_i_b; ?></center></td>
                                                                     <td><center><?php echo $muslm_i_g; ?></td>
                                                                     <td><center><?php echo $muslm_ii_b; ?></td>
                                                                     <td><center><?php echo $muslm_ii_g; ?></td>
                                                                     <td><center><?php echo $muslm_iii_b; ?></td>
                                                                     <td><center><?php echo $muslm_iii_g; ?></td>
                                                                     <td><center><?php echo $muslm_iv_b; ?></td>
                                                                     <td><center><?php echo $muslm_iv_g; ?></td>
                                                                     <td><center><?php echo $muslm_v_b; ?></td>
                                                                     <td><center><?php echo $muslm_v_g; ?></td>
                                                                     <td><center><?php echo $muslm_vi_b; ?></td>
                                                                     <td><center><?php echo $muslm_vi_g; ?></td>
                                                                     <td><center><?php echo $muslm_vii_b; ?></td>
                                                                     <td><center><?php echo $muslm_vii_g; ?></td>
                                                                     <td><center><?php echo $muslm_viii_b; ?></td>
                                                                     <td><center><?php echo $muslm_viii_g; ?></td>
                                                                     <td><center><?php echo $muslm_ix_b; ?></td>
                                                                     <td><center><?php echo $muslm_ix_g; ?></td>
                                                                     <td><center><?php echo $muslm_x_b; ?></td>
                                                                     <td><center><?php echo $muslm_x_g; ?></td>
                                                                     <td><center><?php echo $muslm_xi_b; ?></td>
                                                                     <td><center><?php echo $muslm_xi_g; ?></td>
                                                                     <td><center><?php echo $muslm_xii_b; ?></td>
                                                                     <td><center><?php echo $muslm_xii_g; ?></td>
                                                                   </tr>
                                                                   <tr>
                                                                     <td>Christian</td>
                                                                     <td><center><?php echo $chrst_i_b; ?></center></td>
                                                                     <td><center><?php echo $chrst_i_g; ?></td>
                                                                     <td><center><?php echo $chrst_ii_b; ?></td>
                                                                     <td><center><?php echo $chrst_ii_g; ?></td>
                                                                     <td><center><?php echo $chrst_iii_b; ?></td>
                                                                     <td><center><?php echo $chrst_iii_g; ?></td>
                                                                     <td><center><?php echo $chrst_iv_b; ?></td>
                                                                     <td><center><?php echo $chrst_iv_g; ?></td>
                                                                     <td><center><?php echo $chrst_v_b; ?></td>
                                                                     <td><center><?php echo $chrst_v_g; ?></td>
                                                                     <td><center><?php echo $chrst_vi_b; ?></td>
                                                                     <td><center><?php echo $chrst_vi_g; ?></td>
                                                                     <td><center><?php echo $chrst_vii_b; ?></td>
                                                                     <td><center><?php echo $chrst_vii_g; ?></td>
                                                                     <td><center><?php echo $chrst_viii_b; ?></td>
                                                                     <td><center><?php echo $chrst_viii_g; ?></td>
                                                                     <td><center><?php echo $chrst_ix_b; ?></td>
                                                                     <td><center><?php echo $chrst_ix_g; ?></td>
                                                                     <td><center><?php echo $chrst_x_b; ?></td>
                                                                     <td><center><?php echo $chrst_x_g; ?></td>
                                                                     <td><center><?php echo $chrst_xi_b; ?></td>
                                                                     <td><center><?php echo $chrst_xi_g; ?></td>
                                                                     <td><center><?php echo $chrst_xii_b; ?></td>
                                                                     <td><center><?php echo $chrst_xii_g; ?></td>
                                                                   </tr>
                                                                   <tr>
                                                                     <td>Sikh</td>
                                                                     <td><center><?php echo $sikh_i_b; ?></center></td>
                                                                     <td><center><?php echo $sikh_i_g; ?></td>
                                                                     <td><center><?php echo $sikh_ii_b; ?></td>
                                                                     <td><center><?php echo $sikh_ii_g; ?></td>
                                                                     <td><center><?php echo $sikh_iii_b; ?></td>
                                                                     <td><center><?php echo $sikh_iii_g; ?></td>
                                                                     <td><center><?php echo $sikh_iv_b; ?></td>
                                                                     <td><center><?php echo $sikh_iv_g; ?></td>
                                                                     <td><center><?php echo $sikh_v_b; ?></td>
                                                                     <td><center><?php echo $sikh_v_g; ?></td>
                                                                     <td><center><?php echo $sikh_vi_b; ?></td>
                                                                     <td><center><?php echo $sikh_vi_g; ?></td>
                                                                     <td><center><?php echo $sikh_vii_b; ?></td>
                                                                     <td><center><?php echo $sikh_vii_g; ?></td>
                                                                     <td><center><?php echo $sikh_viii_b; ?></td>
                                                                     <td><center><?php echo $sikh_viii_g; ?></td>
                                                                     <td><center><?php echo $sikh_ix_b; ?></td>
                                                                     <td><center><?php echo $sikh_ix_g; ?></td>
                                                                     <td><center><?php echo $sikh_x_b; ?></td>
                                                                     <td><center><?php echo $sikh_x_g; ?></td>
                                                                     <td><center><?php echo $sikh_xi_b; ?></td>
                                                                     <td><center><?php echo $sikh_xi_g; ?></td>
                                                                     <td><center><?php echo $sikh_xii_b; ?></td>
                                                                     <td><center><?php echo $sikh_xii_g; ?></td>
                                                                   </tr>
                                                                   <tr>
                                                                     <td>Buddhist</td>
                                                                     <td><center><?php echo $budhst_i_b; ?></center></td>
                                                                     <td><center><?php echo $budhst_i_g; ?></td>
                                                                     <td><center><?php echo $budhst_ii_b; ?></td>
                                                                     <td><center><?php echo $budhst_ii_g; ?></td>
                                                                     <td><center><?php echo $budhst_iii_b; ?></td>
                                                                     <td><center><?php echo $budhst_iii_g; ?></td>
                                                                     <td><center><?php echo $budhst_iv_b; ?></td>
                                                                     <td><center><?php echo $budhst_iv_g; ?></td>
                                                                     <td><center><?php echo $budhst_v_b; ?></td>
                                                                     <td><center><?php echo $budhst_v_g; ?></td>
                                                                     <td><center><?php echo $budhst_vi_b; ?></td>
                                                                     <td><center><?php echo $budhst_vi_g; ?></td>
                                                                     <td><center><?php echo $budhst_vii_b; ?></td>
                                                                     <td><center><?php echo $budhst_vii_g; ?></td>
                                                                     <td><center><?php echo $budhst_viii_b; ?></td>
                                                                     <td><center><?php echo $budhst_viii_g; ?></td>
                                                                     <td><center><?php echo $budhst_ix_b; ?></td>
                                                                     <td><center><?php echo $budhst_ix_g; ?></td>
                                                                     <td><center><?php echo $budhst_x_b; ?></td>
                                                                     <td><center><?php echo $budhst_x_g; ?></td>
                                                                     <td><center><?php echo $budhst_xi_b; ?></td>
                                                                     <td><center><?php echo $budhst_xi_g; ?></td>
                                                                     <td><center><?php echo $budhst_xii_b; ?></td>
                                                                     <td><center><?php echo $budhst_xii_g; ?></td>
                                                                   </tr>
                                                                   <tr>
                                                                     <td>Parsi</td>
                                                                     <td><center><?php echo $parsi_i_b; ?></center></td>
                                                                     <td><center><?php echo $parsi_i_g; ?></td>
                                                                     <td><center><?php echo $parsi_ii_b; ?></td>
                                                                     <td><center><?php echo $parsi_ii_g; ?></td>
                                                                     <td><center><?php echo $parsi_iii_b; ?></td>
                                                                     <td><center><?php echo $parsi_iii_g; ?></td>
                                                                     <td><center><?php echo $parsi_iv_b; ?></td>
                                                                     <td><center><?php echo $parsi_iv_g; ?></td>
                                                                     <td><center><?php echo $parsi_v_b; ?></td>
                                                                     <td><center><?php echo $parsi_v_g; ?></td>
                                                                     <td><center><?php echo $parsi_vi_b; ?></td>
                                                                     <td><center><?php echo $parsi_vi_g; ?></td>
                                                                     <td><center><?php echo $parsi_vii_b; ?></td>
                                                                     <td><center><?php echo $parsi_vii_g; ?></td>
                                                                     <td><center><?php echo $parsi_viii_b; ?></td>
                                                                     <td><center><?php echo $parsi_viii_g; ?></td>
                                                                     <td><center><?php echo $parsi_ix_b; ?></td>
                                                                     <td><center><?php echo $parsi_ix_g; ?></td>
                                                                     <td><center><?php echo $parsi_x_b; ?></td>
                                                                     <td><center><?php echo $parsi_x_g; ?></td>
                                                                     <td><center><?php echo $parsi_xi_b; ?></td>
                                                                     <td><center><?php echo $parsi_xi_g; ?></td>
                                                                     <td><center><?php echo $parsi_xii_b; ?></td>
                                                                     <td><center><?php echo $parsi_xii_g; ?></td>
                                                                   </tr>
                                                                   <tr>
                                                                     <td>Jain</td>
                                                                     <td><center><?php echo $jain_i_b; ?></center></td>
                                                                     <td><center><?php echo $jain_i_g; ?></td>
                                                                     <td><center><?php echo $jain_ii_b; ?></td>
                                                                     <td><center><?php echo $jain_ii_g; ?></td>
                                                                     <td><center><?php echo $jain_iii_b; ?></td>
                                                                     <td><center><?php echo $jain_iii_g; ?></td>
                                                                     <td><center><?php echo $jain_iv_b; ?></td>
                                                                     <td><center><?php echo $jain_iv_g; ?></td>
                                                                     <td><center><?php echo $jain_v_b; ?></td>
                                                                     <td><center><?php echo $jain_v_g; ?></td>
                                                                     <td><center><?php echo $jain_vi_b; ?></td>
                                                                     <td><center><?php echo $jain_vi_g; ?></td>
                                                                     <td><center><?php echo $jain_vii_b; ?></td>
                                                                     <td><center><?php echo $jain_vii_g; ?></td>
                                                                     <td><center><?php echo $jain_viii_b; ?></td>
                                                                     <td><center><?php echo $jain_viii_g; ?></td>
                                                                     <td><center><?php echo $jain_ix_b; ?></td>
                                                                     <td><center><?php echo $jain_ix_g; ?></td>
                                                                     <td><center><?php echo $jain_x_b; ?></td>
                                                                     <td><center><?php echo $jain_x_g; ?></td>
                                                                     <td><center><?php echo $jain_xi_b; ?></td>
                                                                     <td><center><?php echo $jain_xi_g; ?></td>
                                                                     <td><center><?php echo $jain_xii_b; ?></td>
                                                                     <td><center><?php echo $jain_xii_g; ?></td>
                                                                   </tr>
                                                                   <tr>
                                                                     <td>Others</td>
                                                                     <td><center><?php echo $othrs_i_b; ?></center></td>
                                                                     <td><center><?php echo $othrs_i_g; ?></td>
                                                                     <td><center><?php echo $othrs_ii_b; ?></td>
                                                                     <td><center><?php echo $othrs_ii_g; ?></td>
                                                                     <td><center><?php echo $othrs_iii_b; ?></td>
                                                                     <td><center><?php echo $othrs_iii_g; ?></td>
                                                                     <td><center><?php echo $othrs_iv_b; ?></td>
                                                                     <td><center><?php echo $othrs_iv_g; ?></td>
                                                                     <td><center><?php echo $othrs_v_b; ?></td>
                                                                     <td><center><?php echo $othrs_v_g; ?></td>
                                                                     <td><center><?php echo $othrs_vi_b; ?></td>
                                                                     <td><center><?php echo $othrs_vi_g; ?></td>
                                                                     <td><center><?php echo $othrs_vii_b; ?></td>
                                                                     <td><center><?php echo $othrs_vii_g; ?></td>
                                                                     <td><center><?php echo $othrs_viii_b; ?></td>
                                                                     <td><center><?php echo $othrs_viii_g; ?></td>
                                                                     <td><center><?php echo $othrs_ix_b; ?></td>
                                                                     <td><center><?php echo $othrs_ix_g; ?></td>
                                                                     <td><center><?php echo $othrs_x_b; ?></td>
                                                                     <td><center><?php echo $othrs_x_g; ?></td>
                                                                     <td><center><?php echo $othrs_xi_b; ?></td>
                                                                     <td><center><?php echo $othrs_xi_g; ?></td>
                                                                     <td><center><?php echo $othrs_xii_b; ?></td>
                                                                     <td><center><?php echo $othrs_xii_g; ?></td>
                                                                   </tr>
                                                                   <tr>
                                                                     <td colspan="27" style="color: red;"><h6>*Minority as defined in the Constitution</h6></td>
                                                                   </tr>
                                                                </tbody>
                                                            </table>
                                                          </div>
                                                          <!-- scrollable table division -->
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