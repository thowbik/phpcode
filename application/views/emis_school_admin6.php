<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
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
<?php $is_high_class = $this->session->userdata('emis_school_highclass'); ?>

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
                                        <h1>Profile
                                            <small>School profile edit and update</small>
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
                                                <a href="<?php echo base_url().'Admin/emis_school_admin1';?>"><div class="col-md-2 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">1</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Admin</div>
                                                    <div class="mt-step-content font-grey-cascade">Information</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Admin/emis_school_admin2';?>"><div class="col-md-2 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">2</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Admin</div>
                                                    <div class="mt-step-content font-grey-cascade">Information</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Admin/emis_school_admin3';?>"><div class="col-md-2 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">3</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Admin</div>
                                                    <div class="mt-step-content font-grey-cascade">Information</div>
                                                </div></a>

                                                <a href="<?php echo base_url().'Admin/emis_school_admin5';?>"><div class="col-md-2 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">4</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Admin</div>
                                                    <div class="mt-step-content font-grey-cascade">Information</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Admin/emis_school_admin6';?>"><div class="col-md-2 bg-grey mt-step-col  active">
                                                    <div class="mt-step-number bg-white font-grey">5</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Admin</div>
                                                    <div class="mt-step-content font-grey-cascade">Information</div>
                                                </div></a>
                                                

                                                <?php if($is_high_class==1){ ?>
                                                

                                                 <a href="<?php echo base_url().'Admin/emis_school_admin4';?>"><div class="col-md-2 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">6</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Admin</div>
                                                    <div class="mt-step-content font-grey-cascade">Information</div>
                                                </div></a>
                                                
                                                <?php  }?>
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
                                                    <span class="caption-subject font-dark sbold uppercase">Administrative Information step 5</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                               <form method="post" action="<?php echo base_url().'Udise_admin/updateadmin6frm1' ?>" id="emis_admin6_form1">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 50%;">Whether full set of textbooks received in current academic year <b>(upto 30<sup>th</sup> September)</b> :</td>
                                                            <td colspan="2">    
                                                                <select class="form-control" name="fulsettxtbckrcvdcrntacadyr" id="fullsetoftextbooksreceivedincurrentacademic">
                                                                    <option value="" selected="selected">Select the option</option>
                                                                    <option value="1">Yes</option>
                                                                    <option value="2">No</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr id="fullsetoftextbooksreceivedincurrentacademicmonthandyear" style="display: none">
                                                            <td>
                                                                When was the textbooks received in the current academic year
                                                            </td>
                                                            <td>
                                                                <label>Month</label>
                                                               <input type="text" class="form-control" name="fulsettxtbckrcvdcrntacad_mnth" id="fullsetoftextbooksreceivedincurrentacademicmonth" maxlength="2"> 
                                                            </td>
                                                            <td>
                                                                <label>Year</label>
                                                               <input type="text" class="form-control" name="fulsettxtbckrcvdcrntacad_yr" id="fullsetoftextbooksreceivedincurrentacademicyear" maxlength="4"> 
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                                <div class="row">
                                                    <center><input type="submit" value="submit" class="btn green"></center>
                                                </div>
                                              </form>
                                            </div>
                                        </div>


                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Administrative Information step 5 - <small>Availability of free Textbooks, Teaching Learning Equipment(TLEs) and play material(in current academic year)</small></span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                               <form method="post" action="<?php echo base_url().'Udise_admin/updateadmin6frm2' ?>" id="emis_admin6_form2">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 50%;" rowspan="2"> Whether complete set of free textbooks received :</td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td id="freetextbookreceivedtddata1">
                                                                <label>Primary</label>
                                                                <select class="form-control" name="cmpltfretxtbokrcvd_pri" id="completesetoffreetextbooksreceivedprimary">
                                                                    <option value="" selected="selected">Select the option</option>
                                                                    <option value="0">Not applicable</option>
                                                                    <option value="1">Yes</option>
                                                                    <option value="2">No</option>
                                                                </select>
                                                            </td>
                                                            <td id="freetextbookreceivedtddata2" colspan="2">
                                                                <label>Upper Primary</label>
                                                                <select class="form-control" name="cmpltfretxtbokrcvd_uppri" id="completesetoffreetextbooksreceivedupperprimary">
                                                                    <option value="" selected="selected">Select the option</option>
                                                                    <option value="0">Not applicable</option>
                                                                    <option value="1">Yes</option>
                                                                    <option value="2">No</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr id="TLEavalable">
                                                            <td style="width: 50%;" rowspan="2"> Whether TLE available for each grade :</td>
                                                        </tr>
                                                        <tr id="TLEavalableselect">
                                                            <td id="tle1strow">
                                                                <label>Primary</label>
                                                                <select class="form-control" name="tle_avl_grd_pri" id="tleavailforeachgradeprimary">
                                                                    <option value="" selected="selected">Select the option</option>
                                                                    <option value="1">Yes</option>
                                                                    <option value="2">No</option>
                                                                </select>
                                                            </td>
                                                            <td id="tle2ndrow" colspan="2">
                                                                <label>Upper Primary</label>
                                                                <select class="form-control" name="tle_avl_grd_uppri" id="tleavailforeachgradeupperprimary">
                                                                    <option value="" selected="selected">Select the option</option>
                                                                    <option value="1">Yes</option>
                                                                    <option value="2">No</option>
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr id="wheterplaymaterialrow">
                                                            <td style="width: 50%;" rowspan="2"> Whether play material, games and sports equipment available for each grade:</td>
                                                        </tr>
                                                        <tr id="wheterplaymaterialselect">
                                                            <td id="playmetrialrow1">
                                                                <label>Primary</label>
                                                                <select class="form-control" name="ply_matrl_pri" id="playmaterialgamesandsportsequipavailprimary">
                                                                    <option value="" selected="selected">Select the option</option>
                                                                    <option value="1">Yes</option>
                                                                    <option value="2">No</option>
                                                                </select>
                                                            </td>
                                                            <td id="playmetrialrow2">
                                                                <label>Upper Primary</label>
                                                                <select class="form-control" name="ply_matrl_uppri" id="playmaterialgamesandsportsequipavailupperprimary">
                                                                    <option value="" selected="selected">Select the option</option>
                                                                    <option value="1">Yes</option>
                                                                    <option value="2">No</option>
                                                                </select>
                                                            </td>
                                                            <td id="playmetrialrow3">
                                                                <label>Secondary</label>
                                                                <select class="form-control" name="ply_matrl_sec" id="playmaterialgamesandsportsequipavailsecondary">
                                                                    <option value="" selected="selected">Select the option</option>
                                                                    <option value="1">Yes</option>
                                                                    <option value="2">No</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="row">
                                                    <center><input type="submit" value="submit" class="btn green"></center>
                                                </div>
                                              </form>
                                            </div>
                                        </div>



                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Administrative Information step 5 - <small>Profile of schools with secondary/Higher secondary section</small></span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                               <form method="post" action="<?php echo base_url().'Udise_admin/updateadmin6frm3' ?>" id="emis_admin6_form3">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 50%;"> <b>Whether School Management Committee(SMC) and School Management and Development Committee(SMDC) are same in the school:</b></td>
                                                            <td colspan="3">    
                                                                <label><br></label>
                                                                <select class="form-control" name="smdc" id="smdc">
                                                                    <option value="" selected="selected">Select the option</option>
                                                                    <option value="1">Yes</option>
                                                                    <option value="2">No</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr id="smdcnextoption" style="display: none;">
                                                            <td>
                                                                <b>(a)Whether School Management and Development Committee has been constituted</b>
                                                            </td>
                                                            <td>
                                                                <select class="form-control" name="smdcconstituted" id="smdcconstituted">
                                                                    <option value="" selected="selected">Select the option</option>
                                                                    <option value="1">Yes</option>
                                                                    <option value="2">No</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                        <!-- smdc user table -->
                                                            <table class="table table-bordered table-striped" id="myviewdata" style="display: none;">
                                                                <thead>
                                                                    <th>SI.No.</th>
                                                                    <th>Details of Members/Representatives</th>
                                                                    <th>Male</th>
                                                                    <th>Female</th>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Total Members</td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="smdcconstdtot_m" id="smdcconstitutedtotmembrmale" maxlength="4">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="smdcconstdtot_f" id="smdcconstitutedtotmembrfemale" maxlength="4">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>Number of Representatives of Parents/Guardians/PTA</td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="smdccondnofrepprnts_m" id="smdcconstitutednoofrepofparntsorguardorptamale" maxlength="4">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="smdccondnofrepprnts_f" id="smdcconstitutednoofrepofparntsorguardorptafemale" maxlength="4">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>Number of Representatives/nominees from local government/urban local body</td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="smdcconstdrepnmneloc_m" id="smdcconstitutednoofrepornominesforlocgovmale" maxlength="4">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="smdcconstdrepnmneloc_f" id="smdcconstitutednoofrepornominesforlocgovfemale" maxlength="4">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>4</td>
                                                                        <td>Number of members from Educationally Backward Minority Community</td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="smdcconstdbckwdcom_m" id="smdcconstitutenoofmembrfromebmcmale" maxlength="4">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="smdcconstdbckwdcom_f" id="smdcconstitutenoofmembrfromebmcfemale" maxlength="4">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>5</td>
                                                                        <td>Number of members from any Women's Group</td>
                                                                        <td>
                                                                            
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="smdcconstd_wmngrp_f" id="smdcconstitutenoofmembrfromanywomengroupfemale" maxlength="4">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>6</td>
                                                                        <td>Number of members from SC/ST community</td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="smdcconstdscst_m" id="smdcconstitutenoofmembrfromscorstmale" maxlength="4">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="smdcconstdscst_f" id="smdcconstitutenoofmembrfromscorstfemale" maxlength="4">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>7</td>
                                                                        <td>Number of nominees of the District Education Offer(DEO)</td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="smdcconstddeo_m" id="smdcconstitutenoofnomineesdeomale" maxlength="4">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="smdcconstddeo_f" id="smdcconstitutenoofnomineesdeofemale" maxlength="4">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>8</td>
                                                                        <td>Number of members from Audit and Accounts Department(AAD)</td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="smdcconstdaad_m" id="smdcconstitutenoofmembrsaadmale" maxlength="4">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="smdcconstdaad_f" id="smdcconstitutenoofmembrsaadfemale" maxlength="4">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>9</td>
                                                                        <td>Number of Subject experts (one each from Science, Humanities and arts/Crafts/Culture) nominated by District Programme Co-ordinator(RMSA)</td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="smdcconstdrmsa_m" id="smdcconstitutenoofsubjectsrmsamale" maxlength="4">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="smdcconstdrmsa_f" id="smdcconstitutenoofsubjectsrmsafemale" maxlength="4">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>10</td>
                                                                        <td>Number of teachers (one each from Social Science, Science and Mathematics) of the school</td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="smdcconstdmaths_m" id="smdcconstitutenoofteachrsofschlmale" maxlength="4">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="smdcconstdmaths_f" id="smdcconstitutenoofteachrsofschlfemale" maxlength="4">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>11</td>
                                                                        <td>Principal/Headmaster, as Chairperson</td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="smdcconstdprncyhm_m" id="smdcconstitutepricipalorhmaschairpersonmale" maxlength="4">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="smdcconstdprncyhm_f" id="smdcconstitutepricipalorhmaschairpersonfemale" maxlength="4">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>12</td>
                                                                        <td>Chairperson(If Principal/Headmaster is not the Chairperson)</td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="smdcconstdcharper_m" id="smdcconstitutechairpersonisnotpricipalorhmmale" maxlength="4">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="smdcconstdcharper_f" id="smdcconstitutechairpersonisnotpricipalorhmfemale" maxlength="4">
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </tr>
                                                        <!-- smdc table user end -->
                                                        <table class="table table-bordered table-striped" id="smdcnextoption1" style="display: none;">
                                                            <tbody>
                                                                <tr>
                                                                    <td><b>(b)Whether separate Bank Account for SMDC is being maintained:</b></td>
                                                                    <td colspan="2">
                                                                        <select class="form-control" name="smdcbankaccntdtls" id="smdcbankaccntdtls">
                                                                            <option value="" selected="selected">Select the option</option>
                                                                            <option value="1">Yes</option>
                                                                            <option value="2">No</option>
                                                                        </select>
                                                                    </td>
                                                                    
                                                                </tr>
                                                                <tr id="smdcbankrow1" style="display: none;">
                                                                    <td rowspan="3">
                                                                        <br/><br/><br/><br/><br/>
                                                                        Bank Details of the SMDC
                                                                    </td>
                                                                    <td>
                                                                         <label>Branch</label>
                                                                        <input type="text" class="form-control" name="smdcaccountbranch" id="smdcaccountbranch" value="<?php echo $smdc_brnch; ?>" maxlength="100">
                                                                    </td>
                                                                    <td colspan="2">
                                                                        <label>Bank name</label>
                                                                        <input type="text" class="form-control" name="smdcaccountbankname" id="smdcaccountbankname" value="<?php echo $smdc_bnk_nme; ?>" maxlength="100">
                                                                    </td>
                                                                </tr>
                                                                <tr id="smdcbankrow2" style="display: none;">
                                                                    <td colspan="3">
                                                                        <label>Account No</label>
                                                                        <input type="text" class="form-control" name="smdcaccountno" id="smdcaccountno" value="<?php echo $smdc_acc_no; ?>" maxlength="25">
                                                                    </td>
                                                                </tr>
                                                                <tr id="smdcbankrow3" style="display: none;">
                                                                    <td>
                                                                        <label>IFSC Code</label>
                                                                        <input type="text" class="form-control" name="smdcaccountifsc" id="smdcaccountifsc" value="<?php echo $smdc_ifsc; ?>" maxlength="40">
                                                                    </td>
                                                                    <td colspan="2">
                                                                        <label>Account Name</label>
                                                                        <input type="text" class="form-control" name="smdcaccountname" id="smdcaccountname" value="<?php echo $smdc_acc_nme; ?>" maxlength="50">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <b>(c)Whether the School has constituted its Parent-Teacher Association(PTA):</b>
                                                                    </td>
                                                                    <td colspan="2">
                                                                        <select class="form-control" name="pta" id="pta">
                                                                            <option value="" selected="selected">Select the option</option>
                                                                            <option value="1">Yes</option>
                                                                            <option value="2">No</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr id="ptarow" style="display: none;">
                                                                    <td>
                                                                        Number of PTA meetings held during the last academic year:
                                                                    </td>
                                                                    <td colspan="2">
                                                                        <input type="text" class="form-control" name="ptameetingsheld" id="ptameetingsheld" maxlength="4">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        
                                                       
                                                <div class="row">
                                                    <center><input type="submit" value="submit" class="btn green"></center>
                                                </div>
                                              </form>
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
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'asset/global/plugins/jquery.validate.min.js'; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/pages/scripts/admin.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->

        <script type="text/javascript">
                      
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

                     $("select").prop('disabled',function(){
                           return ! $(this).prop('disabled');
                       });
                   });
               
               $(document).ready(function(){
                   $("input").prop("disabled",true);
               });
               $(document).ready(function(){
                            $("select").prop("disabled",true);
                      });
                    
            </script>
        <!-- set1 -->
        <?php 
            $fullsetoftextbooksreceivedincurrentacademic = $fulset_txtbok_recvd;
         ?>

            <script type="text/javascript">
                $('#fullsetoftextbooksreceivedincurrentacademic').val(<?php echo $fullsetoftextbooksreceivedincurrentacademic ?>);
            </script>

            <?php if(($fullsetoftextbooksreceivedincurrentacademic) == '1') {?>
                <script type="text/javascript">
                    $('#fullsetoftextbooksreceivedincurrentacademicmonthandyear').show();

                    $('#fullsetoftextbooksreceivedincurrentacademicmonth').val(<?php echo $txtbok_recvd_crntacd_mnth ?>);
                    $('#fullsetoftextbooksreceivedincurrentacademicyear').val(<?php echo $txtbok_recvd_crntacd_yr ?>);

                    $('#fullsetoftextbooksreceivedincurrentacademic').change(function(){
                            if ($('#fullsetoftextbooksreceivedincurrentacademic').val()=='1') {
                                $('#fullsetoftextbooksreceivedincurrentacademicmonth').val(<?php echo $txtbok_recvd_crntacd_mnth ?>);
                                $('#fullsetoftextbooksreceivedincurrentacademicyear').val(<?php echo $txtbok_recvd_crntacd_yr ?>);
                            }else{
                                $('#fullsetoftextbooksreceivedincurrentacademicmonth,#fullsetoftextbooksreceivedincurrentacademicyear').val(function () {
                                       return $(this).find('option').filter(function () {
                                       return $(this).prop('defaultSelected');
                                             }).val();
                                       });
                            }
                    });

                </script>
            <?php } ?>
            
        <!-- set1 Ending -->

        <!-- set2 -->

            <?php 
               $completesetoffreetextbooksreceivedprimary        = $cmplt_txtbok_recvd_pri;
               $completesetoffreetextbooksreceivedupperprimary   = $cmplt_txtbok_recvd_uppri;
               $tleavailforeachgradeprimary                      = $tle_avl_grd_pri;
               $tleavailforeachgradeupperprimary                 = $tle_avl_grd_uppri;
               $playmaterialgamesandsportsequipavailprimary      = $ply_matrl_pri;
               $playmaterialgamesandsportsequipavailupperprimary = $ply_matrl_uppri;
               $playmaterialgamesandsportsequipavailsecondary    = $ply_matrl_sec;
             ?>


                <script type="text/javascript">
                    $('#completesetoffreetextbooksreceivedprimary').val(<?php echo $completesetoffreetextbooksreceivedprimary; ?>);
                    $('#completesetoffreetextbooksreceivedupperprimary').val(<?php echo $completesetoffreetextbooksreceivedupperprimary; ?>);
                    $('#tleavailforeachgradeprimary').val(<?php echo $tleavailforeachgradeprimary; ?>);
                    $('#tleavailforeachgradeupperprimary').val(<?php echo $tleavailforeachgradeupperprimary; ?>);
                    $('#playmaterialgamesandsportsequipavailprimary').val(<?php echo $playmaterialgamesandsportsequipavailprimary; ?>);
                    $('#playmaterialgamesandsportsequipavailupperprimary').val(<?php echo $playmaterialgamesandsportsequipavailupperprimary; ?>);
                    $('#playmaterialgamesandsportsequipavailsecondary').val(<?php echo $playmaterialgamesandsportsequipavailsecondary; ?>);
                </script>

        <!-- set2 Ending -->

        <!-- set3 -->

            <?php 
                $smdc = $smc_smdc_same_schl;

                //1st inner table datas

                $smdcconstitutedtotmembrmale                       = $smdc_tot_membr_m;
                $smdcconstitutedtotmembrfemale                     = $smdc_tot_membr_f;
                $smdcconstitutednoofrepofparntsorguardorptamale    = $smdc_noof_repr_pta_m;
                $smdcconstitutednoofrepofparntsorguardorptafemale  = $smdc_noof_repr_pta_f;
                $smdcconstitutednoofrepornominesforlocgovmale      = $smdc_noof_repr_lcbdy_m;
                $smdcconstitutednoofrepornominesforlocgovfemale    = $smdc_noof_repr_lcbdy_f;
                $smdcconstitutenoofmembrfromebmcmale               = $smdc_noof_mebrs_edubckmin_m;
                $smdcconstitutenoofmembrfromebmcfemale             = $smdc_noof_mebrs_edubckmin_f;
                $smdcconstitutenoofmembrfromanywomengroupfemale    = $smdc_noof_mebrs_wms_f;
                $smdcconstitutenoofmembrfromscorstmale             = $smdc_noof_mebrs_scst_m;
                $smdcconstitutenoofmembrfromscorstfemale           = $smdc_noof_mebrs_scst_f;
                $smdcconstitutenoofnomineesdeomale                 = $smdc_noof_nmines_deo_m;
                $smdcconstitutenoofnomineesdeofemale               = $smdc_noof_nmines_deo_f;
                $smdcconstitutenoofmembrsaadmale                   = $smdc_noof_nmines_aad_m;
                $smdcconstitutenoofmembrsaadfemale                 = $smdc_noof_nmines_aad_f;
                $smdcconstitutenoofsubjectsrmsamale                = $smdc_noof_subjt_exp_m;
                $smdcconstitutenoofsubjectsrmsafemale              = $smdc_noof_subjt_exp_f;
                $smdcconstitutenoofteachrsofschlmale               = $smdc_noof_techrs_m;
                $smdcconstitutenoofteachrsofschlfemale             = $smdc_noof_techrs_f;
                $smdcconstitutepricipalorhmaschairpersonmale       = $smdc_prnclorhm_cp_m;
                $smdcconstitutepricipalorhmaschairpersonfemale     = $smdc_prnclorhm_cp_f;
                $smdcconstitutechairpersonisnotpricipalorhmmale    = $smdc_chrprsn_m;
                $smdcconstitutechairpersonisnotpricipalorhmfemale  = $smdc_chrprsn_f;
             ?>
            <script type="text/javascript">
                $('#smdc').val(<?php echo $smdc ?>);
            </script>

            <?php if(($smdc)== '2'){?>
                <script type="text/javascript">
                   $('#smdcnextoption,#smdcnextoption1,#pta').show();

                   // option1
                   $('#smdcconstituted').val(<?php echo $smdc_constud; ?>);
                    // option1 Inner Table
                    <?php if ($smdc_constud == '1') { ?>
                        $('#myviewdata').show();

                        $('#smdcconstitutedtotmembrmale').val(<?php echo $smdcconstitutedtotmembrmale ?>);
                        $('#smdcconstitutedtotmembrfemale').val(<?php echo $smdcconstitutedtotmembrfemale ?>);
                        $('#smdcconstitutednoofrepofparntsorguardorptamale').val(<?php echo $smdcconstitutednoofrepofparntsorguardorptamale ?>);
                        $('#smdcconstitutednoofrepofparntsorguardorptafemale').val(<?php echo $smdcconstitutednoofrepofparntsorguardorptafemale ?>);
                        $('#smdcconstitutednoofrepornominesforlocgovmale').val(<?php echo $smdcconstitutednoofrepornominesforlocgovmale ?>);
                        $('#smdcconstitutednoofrepornominesforlocgovfemale').val(<?php echo $smdcconstitutednoofrepornominesforlocgovfemale ?>);
                        $('#smdcconstitutenoofmembrfromebmcmale').val(<?php echo $smdcconstitutenoofmembrfromebmcmale ?>);
                        $('#smdcconstitutenoofmembrfromebmcfemale').val(<?php echo $smdcconstitutenoofmembrfromebmcfemale ?>);
                        $('#smdcconstitutenoofmembrfromanywomengroupfemale').val(<?php echo $smdcconstitutenoofmembrfromanywomengroupfemale ?>);
                        $('#smdcconstitutenoofmembrfromscorstmale').val(<?php echo $smdcconstitutenoofmembrfromscorstmale ?>);
                        $('#smdcconstitutenoofmembrfromscorstfemale').val(<?php echo $smdcconstitutenoofmembrfromscorstfemale ?>);
                        $('#smdcconstitutenoofnomineesdeomale').val(<?php echo $smdcconstitutenoofnomineesdeomale ?>);
                        $('#smdcconstitutenoofnomineesdeofemale').val(<?php echo $smdcconstitutenoofnomineesdeofemale ?>);
                        $('#smdcconstitutenoofmembrsaadmale').val(<?php echo $smdcconstitutenoofmembrsaadmale ?>);
                        $('#smdcconstitutenoofmembrsaadfemale').val(<?php echo $smdcconstitutenoofmembrsaadfemale ?>);
                        $('#smdcconstitutenoofsubjectsrmsamale').val(<?php echo $smdcconstitutenoofsubjectsrmsamale ?>);
                        $('#smdcconstitutenoofsubjectsrmsafemale').val(<?php echo $smdcconstitutenoofsubjectsrmsafemale ?>);
                        $('#smdcconstitutenoofteachrsofschlmale').val(<?php echo $smdcconstitutenoofteachrsofschlmale ?>);
                        $('#smdcconstitutenoofteachrsofschlfemale').val(<?php echo $smdcconstitutenoofteachrsofschlfemale ?>);
                        $('#smdcconstitutepricipalorhmaschairpersonmale').val(<?php echo $smdcconstitutepricipalorhmaschairpersonmale ?>);
                        $('#smdcconstitutepricipalorhmaschairpersonfemale').val(<?php echo $smdcconstitutepricipalorhmaschairpersonfemale ?>);
                        $('#smdcconstitutechairpersonisnotpricipalorhmmale').val(<?php echo $smdcconstitutechairpersonisnotpricipalorhmmale ?>);
                        $('#smdcconstitutechairpersonisnotpricipalorhmfemale').val(<?php echo $smdcconstitutechairpersonisnotpricipalorhmfemale ?>);

                    <?php } ?>
                    // option1 Inner table ending
                    // option1 ending

                   $('#smdcbankaccntdtls').val(<?php echo $sep_bnk_smdc_maintnd; ?>);
                    if ($('#smdcbankaccntdtls').val() == '1') {
                            $('#smdcbankrow1,#smdcbankrow2,#smdcbankrow3').show();
                     }


                   $('#pta').val(<?php echo $schl_pta; ?>);

                    if ($('#pta').val() == '1') {
                        $('#ptarow').show();

                        $('#ptameetingsheld').val(<?php echo $pta_metng_hld_yr; ?>);

                        $('#pta').change(function(){
                            if ($('#pta').val() =='1') {
                                $('#ptameetingsheld').val(<?php echo $pta_metng_hld_yr; ?>);
                            }                            
                        });

                    }
                    

                   $('#smdc').change(function(){
                        $('#smdcbankrow1,#smdcbankrow2,#smdcbankrow3').show();
                        $('#ptarow').show();
                        if ($('#smdc').val()=='2') {
                            $('#myviewdata').show();
                            $('#smdcconstituted').val(<?php echo $smdc_constud; ?>);
                            $('#smdcbankaccntdtls').val(<?php echo $sep_bnk_smdc_maintnd; ?>);
                            $('#pta').val(<?php echo $schl_pta; ?>);   

                            $('#smdcconstitutedtotmembrmale').val(<?php echo $smdcconstitutedtotmembrmale ?>);
                            $('#smdcconstitutedtotmembrfemale').val(<?php echo $smdcconstitutedtotmembrfemale ?>);
                            $('#smdcconstitutednoofrepofparntsorguardorptamale').val(<?php echo $smdcconstitutednoofrepofparntsorguardorptamale ?>);
                            $('#smdcconstitutednoofrepofparntsorguardorptafemale').val(<?php echo $smdcconstitutednoofrepofparntsorguardorptafemale ?>);
                            $('#smdcconstitutednoofrepornominesforlocgovmale').val(<?php echo $smdcconstitutednoofrepornominesforlocgovmale ?>);
                            $('#smdcconstitutednoofrepornominesforlocgovfemale').val(<?php echo $smdcconstitutednoofrepornominesforlocgovfemale ?>);
                            $('#smdcconstitutenoofmembrfromebmcmale').val(<?php echo $smdcconstitutenoofmembrfromebmcmale ?>);
                            $('#smdcconstitutenoofmembrfromebmcfemale').val(<?php echo $smdcconstitutenoofmembrfromebmcfemale ?>);
                            $('#smdcconstitutenoofmembrfromanywomengroupfemale').val(<?php echo $smdcconstitutenoofmembrfromanywomengroupfemale ?>);
                            $('#smdcconstitutenoofmembrfromscorstmale').val(<?php echo $smdcconstitutenoofmembrfromscorstmale ?>);
                            $('#smdcconstitutenoofmembrfromscorstfemale').val(<?php echo $smdcconstitutenoofmembrfromscorstfemale ?>);
                            $('#smdcconstitutenoofnomineesdeomale').val(<?php echo $smdcconstitutenoofnomineesdeomale ?>);
                            $('#smdcconstitutenoofnomineesdeofemale').val(<?php echo $smdcconstitutenoofnomineesdeofemale ?>);
                            $('#smdcconstitutenoofmembrsaadmale').val(<?php echo $smdcconstitutenoofmembrsaadmale ?>);
                            $('#smdcconstitutenoofmembrsaadfemale').val(<?php echo $smdcconstitutenoofmembrsaadfemale ?>);
                            $('#smdcconstitutenoofsubjectsrmsamale').val(<?php echo $smdcconstitutenoofsubjectsrmsamale ?>);
                            $('#smdcconstitutenoofsubjectsrmsafemale').val(<?php echo $smdcconstitutenoofsubjectsrmsafemale ?>);
                            $('#smdcconstitutenoofteachrsofschlmale').val(<?php echo $smdcconstitutenoofteachrsofschlmale ?>);
                            $('#smdcconstitutenoofteachrsofschlfemale').val(<?php echo $smdcconstitutenoofteachrsofschlfemale ?>);
                            $('#smdcconstitutepricipalorhmaschairpersonmale').val(<?php echo $smdcconstitutepricipalorhmaschairpersonmale ?>);
                            $('#smdcconstitutepricipalorhmaschairpersonfemale').val(<?php echo $smdcconstitutepricipalorhmaschairpersonfemale ?>);
                            $('#smdcconstitutechairpersonisnotpricipalorhmmale').val(<?php echo $smdcconstitutechairpersonisnotpricipalorhmmale ?>);
                            $('#smdcconstitutechairpersonisnotpricipalorhmfemale').val(<?php echo $smdcconstitutechairpersonisnotpricipalorhmfemale ?>);                         
                        }

                    });

                   $('#smdcconstituted').change(function(){
                            if ($('#smdcconstituted').val() == '1') {
                                $('#smdcconstitutedtotmembrmale').val(<?php echo $smdcconstitutedtotmembrmale ?>);
                                $('#smdcconstitutedtotmembrfemale').val(<?php echo $smdcconstitutedtotmembrfemale ?>);
                                $('#smdcconstitutednoofrepofparntsorguardorptamale').val(<?php echo $smdcconstitutednoofrepofparntsorguardorptamale ?>);
                                $('#smdcconstitutednoofrepofparntsorguardorptafemale').val(<?php echo $smdcconstitutednoofrepofparntsorguardorptafemale ?>);
                                $('#smdcconstitutednoofrepornominesforlocgovmale').val(<?php echo $smdcconstitutednoofrepornominesforlocgovmale ?>);
                                $('#smdcconstitutednoofrepornominesforlocgovfemale').val(<?php echo $smdcconstitutednoofrepornominesforlocgovfemale ?>);
                                $('#smdcconstitutenoofmembrfromebmcmale').val(<?php echo $smdcconstitutenoofmembrfromebmcmale ?>);
                                $('#smdcconstitutenoofmembrfromebmcfemale').val(<?php echo $smdcconstitutenoofmembrfromebmcfemale ?>);
                                $('#smdcconstitutenoofmembrfromanywomengroupfemale').val(<?php echo $smdcconstitutenoofmembrfromanywomengroupfemale ?>);
                                $('#smdcconstitutenoofmembrfromscorstmale').val(<?php echo $smdcconstitutenoofmembrfromscorstmale ?>);
                                $('#smdcconstitutenoofmembrfromscorstfemale').val(<?php echo $smdcconstitutenoofmembrfromscorstfemale ?>);
                                $('#smdcconstitutenoofnomineesdeomale').val(<?php echo $smdcconstitutenoofnomineesdeomale ?>);
                                $('#smdcconstitutenoofnomineesdeofemale').val(<?php echo $smdcconstitutenoofnomineesdeofemale ?>);
                                $('#smdcconstitutenoofmembrsaadmale').val(<?php echo $smdcconstitutenoofmembrsaadmale ?>);
                                $('#smdcconstitutenoofmembrsaadfemale').val(<?php echo $smdcconstitutenoofmembrsaadfemale ?>);
                                $('#smdcconstitutenoofsubjectsrmsamale').val(<?php echo $smdcconstitutenoofsubjectsrmsamale ?>);
                                $('#smdcconstitutenoofsubjectsrmsafemale').val(<?php echo $smdcconstitutenoofsubjectsrmsafemale ?>);
                                $('#smdcconstitutenoofteachrsofschlmale').val(<?php echo $smdcconstitutenoofteachrsofschlmale ?>);
                                $('#smdcconstitutenoofteachrsofschlfemale').val(<?php echo $smdcconstitutenoofteachrsofschlfemale ?>);
                                $('#smdcconstitutepricipalorhmaschairpersonmale').val(<?php echo $smdcconstitutepricipalorhmaschairpersonmale ?>);
                                $('#smdcconstitutepricipalorhmaschairpersonfemale').val(<?php echo $smdcconstitutepricipalorhmaschairpersonfemale ?>);
                                $('#smdcconstitutechairpersonisnotpricipalorhmmale').val(<?php echo $smdcconstitutechairpersonisnotpricipalorhmmale ?>);
                                $('#smdcconstitutechairpersonisnotpricipalorhmfemale').val(<?php echo $smdcconstitutechairpersonisnotpricipalorhmfemale ?>);
                        }

                   });

                        
                </script>
            <?php } ?>

        <!-- set3 Ending -->

        <script type="text/javascript">
           
                    $.validator.addMethod("customvalidationselectfield",
                            function(){
                    return $('').val()!="none";
                    }
                );

                    $.validator.addMethod("customvalidation",
                            function(value,element){
                     return /^[0-9]+$/.test(value);
                    },
                    "Allowed number value only"
                );

                    $.validator.addMethod("textvalidation",
                                   function(value,element){
                                         return /^[a-zA-Z ]+$/.test(value);
                                   },
                                   "Allowed Text value only"
                          );

                    $.validator.addMethod("alphanumericvalidation",
                                   function(value,element){
                                         return /^[a-zA-Z0-9]+$/.test(value);
                                   },
                                   "Allowed Alphanumeric only"
                          );
       </script>
       
    </body>

</html>