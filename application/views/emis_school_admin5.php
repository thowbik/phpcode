<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
        <link href="<?php echo base_url() . 'asset/global/plugins/datatables/datatables.min.css'; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() . 'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css'; ?>" rel="stylesheet" type="text/css" />
        <style type="text/css">
            label.error { float: none; color:#dd4b39; }
         </style>

        <?php $this
    ->load
    ->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->



        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            
<?php if ($this->session->userdata('emis_user_type_id') == 3){ ?>
<?php $this->load->view('district/header.php');}
else if ($this->session->userdata('emis_user_type_id') == 2){ ?>
<?php $this->load->view('block/header.php');}
else{ ?>
<?php $this->load->view('header.php');} ?>
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

                                                <a href="<?php echo base_url().'Admin/emis_school_admin5';?>"><div class="col-md-2 bg-grey mt-step-col active">
                                                    <div class="mt-step-number bg-white font-grey">4</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Admin</div>
                                                    <div class="mt-step-content font-grey-cascade">Information</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Admin/emis_school_admin6';?>"><div class="col-md-2 bg-grey mt-step-col">
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


                                        </div>
                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Administrative Information step 4</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <!-- form1 Starting -->
                                               <form method="post" action="<?php echo base_url() . 'Udise_admin/updateadmin5frm1' ?>" id="emis_admin5_form1">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td><b>Is this a residential school :</b></td>
                                                            <td colspan="3">
                                                                <select class="form-control" name="isthisresidentialschool" id="isthisresidentialschool">
                                                                    <option value="" selected="selected">Select the option</option>
                                                                    <option value="1">Yes</option>
                                                                    <option value="2">No</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr id="typeofresidential" style="display: none;">
                                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;(a)Type of residential school :</td>
                                                            <td colspan="3">
                                                                <select class="form-control" name="typeofresidentialschool" id="typeofresidentialschool">
                                                                    <option value="" selected="selected">Select the option</option>
                                                                    <option value="1">Ashram(Govt)</option>
                                                                    <option value="2">Non-ashram(Govt)</option>
                                                                    <option value="3">Private</option>
                                                                    <option value="4">KGBV</option>
                                                                    <option value="5">Eklavya model residential school</option>
                                                                    <option value="6">Others</option>
                                                                    <option value="7">Model School</option>
                                                                </select>
                                                            </td> 
                                                            
                                                        </tr>
                                                        <tr id="typeofresidential1" style="display:none">
                                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;(b)Whether boarding facilities are available for the following Stage/level:</td>
                                                            <td colspan="3">
                                                                <select class="form-control" name="brdngfacavlflwngstglvl" id="boardingfacilitiesareavailforthefollowingstageorlvl">
                                                                    <option value="" selected="selected">Select the option</option>
                                                                    <option value="1">Yes</option>
                                                                    <option value="2">No</option>
                                                                </select>
                                                                
                                                            </td>
                                                        </tr>
                                                        <tr  id="boadingfacilityavail1" style="display: none;" >
                                                            <td>Primary student :</td>
                                                            <td>
                                                                <br>
                                                                <select class="form-control" name="brdngfacavlflngpristud" id="boardingfacilitiesareavailforthefollowingprimarystudent">

                                                                    <option value="" selected="selected">Select the option</option>
                                                                    <option value="1">Yes</option>
                                                                    <option value="2">No</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <div id="admin5primarygirls" style="display: none;">
                                                                Number of girls
                                                                <input type="text" class="form-control" name="noofgirlsprimarystudent" id="noofgirlsprimarystudent" maxlength="3">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="admin5primaryboys" style="display: none;">
                                                                Number of boys 
                                                                <input type="text" class="form-control" name="noofboysprimarystudent" id="noofboysprimarystudent" maxlength="3">
                                                                </div>
                                                            </td>
                                                        </tr>


                                                        <tr id="boadingfacilityavail2" style="display: none;">
                                                            <td>Upper primary student :</td>
                                                            <td>
                                                                <br>
                                                                <select class="form-control" name="brdngfacavlflnguppristud" id="boardingfacilitiesareavailforthefollowingupperprimarystudent">

                                                                    <option value="" selected="selected">Select the option</option>
                                                                    <option value="1">Yes</option>
                                                                    <option value="2">No</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <div id="admin5upperprimaryboys" style="display: none;">
                                                                        Number of girls
                                                                        <input type="text" class="form-control" name="noofgirlsupperprimarystudent" id="noofgirlsupperprimarystudent" maxlength="3">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="admin5upperprimarygirls" style="display: none;">
                                                                Number of boys 
                                                                <input type="text" class="form-control" name="noofboysupperprimarystudent" id="noofboysupperprimarystudent" maxlength="3">
                                                                </div>
                                                            </td>
                                                        </tr>


                                                        <tr id="boadingfacilityavail3" style="display: none;">
                                                            <td>Secondary student :</td>
                                                            <td>
                                                                <br>
                                                                <select class="form-control" name="brdngfacavlflngsecstud" id="boardingfacilitiesareavailforthefollowingsecondarystudent">

                                                                    <option value="" selected="selected">Select the option</option>
                                                                    <option value="1">Yes</option>
                                                                    <option value="2">No</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <div id="admin5secondarygirls" style="display: none;">
                                                                        Number of girls
                                                                        <input type="text" class="form-control" name="noofgirlssecondarystudent" id="noofgirlssecondarystudent" maxlength="3">
                                                                </div>
                                                                
                                                            </td>
                                                            <td>
                                                                <div id="admin5secondaryboys" style="display: none;">
                                                                    Number of boys 
                                                                    <input type="text" class="form-control" name="noofboyssecondarystudent" id="noofboyssecondarystudent" maxlength="3">
                                                                </div>
                                                                
                                                            </td>
                                                        </tr>


                                                        <tr id="boadingfacilityavail4" style="display: none;">
                                                            <td>Higher secondary student :</td>
                                                            <td>
                                                                <br>
                                                                <select class="form-control" name="brdngfacavlflnghscstud" id="boardingfacilitiesareavailforthefollowinghighersecondarystudent">

                                                                    <option value="" selected="selected">Select the option</option>
                                                                    <option value="1">Yes</option>
                                                                    <option value="2">No</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <div id="admin5highersecondarygirls" style="display: none;">
                                                                    Number of girls
                                                                    <input type="text" class="form-control" name="noofgirlshighersecondarystudent" id="noofgirlshighersecondarystudent" maxlength="3">    
                                                                </div>
                                                                
                                                            </td>
                                                            <td>
                                                                <div id="admin5highersecondaryboys" style="display: none;">
                                                                    Number of boys 
                                                                    <input type="text" class="form-control" name="noofboyshighersecondarystudent" id="noofboyshighersecondarystudent" maxlength="3">    
                                                                </div>
                                                                
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4">
                                                                 <div class="row">
                                                                        <center><input type="submit" value="submit" class="btn green"></center>
                                                                 </div>
                                                            </td> 
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </form>
                                            <!-- form1 ending -->

                                            <form method="post" action="<?php echo base_url() . 'Udise_admin/updateadmin5frm2' ?>" id="emis_admin5_form2">
                                                <!-- table 2 -->
                                                <table class="table table-striped table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td><b>Is this a minority managed school :</b></td>
                                                            <td colspan="3">
                                                                <select class="form-control" name="isthisaminoritymanagedschool" id="isthisaminoritymanagedschool">
                                                                <option value="" selected="selected">Select the option</option>
                                                                <option value="1">Yes</option>
                                                                <option value="2">No</option>
                                                            </select>
                                                            </td>
                                                        </tr>
                                                        <tr id="minoritymanagedschooloptiona" style="display: none;">
                                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;(a)Type of minority community managing the school</td>
                                                            <td colspan="3">
                                                                <select class="form-control" name="typeofaminoritymanagedschool" id="typeofaminoritymanagedschool">
                                                                <option value="" selected="selected">Select the option</option>
                                                                <option value="1">Muslim</option>
                                                                <option value="2">Sikh</option>
                                                                <option value="3">Jain</option>
                                                                <option value="4">Christian</option>
                                                                <option value="5">Parsi</option>
                                                                <option value="6">Buddhist</option>
                                                                <option value="7">Others</option>
                                                                <option value="8">Linguistic Minority</option>
                                                            </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Whether preprimary section(other than Anganwadi) attached to school</b></td>
                                                            <td colspan="3">
                                                                <select class="form-control" name="preprisecattcdschl" id="preprimarysectionattachedtoschool">
                                                                    <option value="" selected="selected">Select the option</option>
                                                                    <option value="1">Yes</option>
                                                                    <option value="2">No</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                            <tr id="anganwadioption1" style="display: none;">
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;(a)Total students in the pre-primary grade preceding Grade I</td>
                                                                <td colspan="3">
                                                                    <input type="text" class="form-control" name="totstudpreprigrd1precd" id="totstudentsinpreprimarygrade1preceding">
                                                                </td>
                                                            </tr>
                                                            <tr id="anganwadioption2" style="display: none;">
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;(b)Total teachers</td>
                                                                <td colspan="3">
                                                                    <input type="text" class="form-control" id="preprimarytotteachers" name="preprimarytotteachers">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                               <td><b>Anganwadi center in or adjacent to school campus</b></td> 
                                                               <td colspan="3">
                                                                   <select class="form-control" name="anganwadicentrinschlcampus" id="anganwadicentrinschlcampus">
                                                                       <option value="" selected="selected">Select the option</option>
                                                                       <option value="1">Yes</option>
                                                                       <option value="2">No</option>
                                                                   </select>
                                                               </td>
                                                            </tr>
                                                            <tr id="anganwaditotchildren" style="display: none;">
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;(a)Total Children</td>
                                                                <td colspan="3"><input type="text" class="form-control" name="totchildrensinanganwadi" id="totchildrensinanganwadi"></td>
                                                            </tr>
                                                            <tr id="anganwaditotteacher" style="display: none;">
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;(b)Total Teachers/Anganwadi workers</td>
                                                                <td colspan="3"><input type="text" class="form-control" name="totteachersoranganwadiworkers" id="totteachersoranganwadiworkers"></td>
                                                            </tr>
                                                                <tr>
                                                                    <td rowspan="2">
                                                                        <b>Is CCE being implemented in school</b></td>
                                                                    <td colspan="3">
                                                                        <select class="form-control" name="ccebeingimplementedschool" id="ccebeingimplementedschool">
                                                                                <option value="" selected="selected">Select the option</option>
                                                                                <option value="1">Yes</option>
                                                                                <option value="2">No</option>
                                                                        </select>
                                                                    </td>
                                                                    
                                                                </tr>
                                                                <!-- section1 question -->
                                                                <tr>
                                                                    <td id="elementryset" style="display: none;">
                                                                        <label><b>Elementry</b></label>
                                                                        <select class="form-control" name="ccebeingimplmentedinschlelemntry" id="ccebeingimplmentedinschlelemntry">
                                                                            <option value="" selected="selected">Select the option</option>
                                                                            <option value="1">Yes</option>
                                                                            <option value="2">No</option>
                                                                        </select>
                                                                    </td>
                                                                    <td id="secondaryset" style="display: none;">
                                                                        <label><b>Secondary</b></label>
                                                                        <select class="form-control" name="ccebeingimplmentedinschlsecondary" id="ccebeingimplmentedinschlsecondary">
                                                                            <option value="" selected="selected">Select the option</option>
                                                                            <option value="1">Yes</option>
                                                                            <option value="2">No</option>
                                                                        </select>
                                                                    </td>
                                                                    <td id="highersecondaryset" style="display: none;">
                                                                        <label><b>Higher Secondary</b></label>
                                                                        <select class="form-control" name="ccebeingimplmentedinschlhighersecondary" id="ccebeingimplmentedinschlhighersecondary">
                                                                        <option value="" selected="selected">Select the option</option>
                                                                        <option value="1">Yes</option>
                                                                        <option value="2">No</option>
                                                                    </select>
                                                                    </td>
                                                                </tr>
                                                                <!-- /section1 question -->

                                                                <!-- section1option -->
                                                                <tr id="cceelementrymaintained" style="display: none;">
                                                                    <td>
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;Are cumulative records of pupil being maintained
                                                                    </td>
                                                                    <td colspan="3">
                                                                        <select class="form-control" name="cumltvercrdspuplmntnd" id="cumulativerecordsofpupilbeingmaintained">
                                                                            <option value="" selected="selected">Select the option</option>
                                                                            <option value="1">Yes</option>
                                                                            <option value="2">No</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr id="cceelementrycumulative" style="display: none;">
                                                                    <td>
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;Are cumulative records of pupils share with parents
                                                                    </td>
                                                                    <td colspan="3">
                                                                        <select class="form-control" name="cumrcrdpuplshrdwithprnts" id="cumulativerecordsofpupilsharewithparents">
                                                                            <option value="" selected="selected">Select the option</option>
                                                                            <option value="1">Yes</option>
                                                                            <option value="2">No</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <!-- /section1option -->
                                                                <tr>
                                                                    <td colspan="4">
                                                                        <div class="row">
                                                                            <center><input type="submit" value="submit" class="btn green"></center>
                                                                        </div>
                                                                    </td> 
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!-- table 2 ending -->
                                                    </form>
                                                    <!-- form 2 ending -->

                                                    <!-- form 3 -->
                                                    <form method="post" action="<?php echo base_url() . 'Udise_admin/updateadmin5frm3' ?>" id="emis_admin5_form3">
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <tbody>
                                                                <!-- school management committee -->
                                                                <tr>
                                                                    <td>
                                                                        <b>Whether school management committee (SMC) has been constituted (Only for Govt./Aided schools)</b>
                                                                    </td>
                                                                    <td colspan="3">
                                                                        <select class="form-control" name="smchasbeenconstituted" id="smchasbeenconstituted">
                                                                            <option value="" selected="selected">Select the option</option>
                                                                            <option value="1">Yes</option>
                                                                            <option value="2">No</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <!-- /school management committee -->
                                                                <!-- smc option1 -->
                                                                <tr id="totnoofmembrsinsmc" style="display: none;">
                                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;(a)Total number of memebers in SMC</td>
                                                                    <td>
                                                                        <label>Male</label>
                                                                        <input type="text" class="form-control" name="smctotnumbermale" id="smctotnumbermale" maxlength="4">
                                                                    </td>
                                                                    <td colspan="2">
                                                                        <label>Female</label>
                                                                        <input type="text" class="form-control" name="smctotnumberfemale" id="smctotnumberfemale" maxlength="4">
                                                                    </td>
                                                                </tr>
                                                                <!-- /smc option1 -->
                                                                <!-- smc option2 -->
                                                                <tr id="membrsofparentsorguardian" style="display: none;">
                                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;(b)Members of parents/guardians</td>
                                                                    <td>
                                                                        <label>Male</label>
                                                                        <input type="text" class="form-control" name="smcmembrofparentsorguardiansmale" id="smcmembrofparentsorguardiansmale" maxlength="4">
                                                                    </td>
                                                                    <td colspan="2">
                                                                        <label>Female</label>
                                                                        <input type="text" class="form-control" name="smcmembrofparentsorguardiansfemale" id="smcmembrofparentsorguardiansfemale" maxlength="4">
                                                                    </td>
                                                                </tr>
                                                                <!-- /smc option2 -->
                                                                <!-- smc option3 -->
                                                                <tr id="represenativesfromloclauthorities" style="display: none;">
                                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;(c)Representatives/nominees from local authority/local government/urban localbody</td>
                                                                    <td>
                                                                        <label>Male</label>
                                                                        <input type="text" class="form-control" name="smcrepresentativesmale" id="smcrepresentativesmale" maxlength="4">
                                                                    </td>
                                                                    <td colspan="2">
                                                                        <label>Female</label>
                                                                        <input type="text" class="form-control" name="smcrepresentativesfemale" id="smcrepresentativesfemale" maxlength="4">
                                                                    </td>
                                                                </tr>
                                                                <!-- /smc option -->
                                                                <tr>
                                                                    <td colspan="3">
                                                                        <div class="row">
                                                                            <center><input type="submit" value="submit" class="btn green"></center>
                                                                        </div>
                                                                    </td> 
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!-- table3 ending -->
                                                    </form>
                                                    <!-- form3  ending -->

                                                     <?php
                                                          $sepbankacountforsmcisbeingmaintained = $sep_bnk_smc_maintnd;
                                                          $smcaccountbranch = $smc_brnch;
                                                          $smcaccountbankname = $smc_bnk_nme;
                                                          $smcaccountno = $smc_acc_no;
                                                          $smcaccountifsc = $smc_ifsc;
                                                          $smcaccountname = $smc_acc_nme;
                                                      ?>

                                                    <!-- form4 -->
                                                    <form method="post" action="<?php echo base_url() . 'Udise_admin/updateadmin5frm4' ?>" id="emis_admin5_form4">
                                                        <!-- table4 start -->
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <b>Whether separate bank account for SMC is being maintained
                                                                        </b>
                                                                    </td>
                                                                    <td colspan="3">
                                                                        <select class="form-control" name="sepbnksmcmantnd" id="sepbankacountforsmcisbeingmaintained">
                                                                            <option value="" selected="selected">Select the option</option>
                                                                            <option value="1">Yes</option>
                                                                            <option value="2">No</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr id="smcdtlsbranchbank" style="display: none;">
                                                                    <td rowspan="3">
                                                                        <br/><br/><br/><br/><br/>
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;Account Details
                                                                    </td>
                                                                    <td>
                                                                         <label>Branch</label>
                                                                        <input type="text" class="form-control" name="smcaccountbranch" id="smcaccountbranch" value="<?php echo $smcaccountbranch; ?>" maxlength="100">
                                                                    </td>
                                                                    <td colspan="2">
                                                                        <label>Bank name</label>
                                                                        <input type="text" class="form-control" name="smcaccountbankname" id="smcaccountbankname" value="<?php echo $smcaccountbankname; ?>" maxlength="100">
                                                                    </td>
                                                                </tr>
                                                                <tr id="smcaccountnorow" style="display: none;">
                                                                    <td colspan="3">
                                                                        <label>Account No</label>
                                                                        <input type="text" class="form-control" name="smcaccountno" id="smcaccountno" value="<?php echo $smcaccountno; ?>" maxlength="40">
                                                                    </td>
                                                                </tr>
                                                                <tr id="smcifsccoderow" style="display: none">
                                                                    <td>
                                                                        <label>IFSC Code</label>
                                                                        <input type="text" class="form-control" name="smcaccountifsc" id="smcaccountifsc" value="<?php echo $smcaccountifsc; ?>" maxlength="40">
                                                                    </td>
                                                                    <td colspan="2">
                                                                        <label>Account Name</label>
                                                                        <input type="text" class="form-control" name="smcaccountname" id="smcaccountname" value="<?php echo $smcaccountname; ?>" maxlength="50">
                                                                    </td>
                                                                </tr>
                                                                <!-- /Account details -->
                                                                <tr>
                                                                    <td colspan="3">
                                                                        <div class="row">
                                                                            <center><input type="submit" value="submit" class="btn green"></center>
                                                                        </div>
                                                                    </td> 
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!-- table 4 ending -->
                                                    </form>
                                                    <!-- form 4 ending -->
                                                    <!-- Child enrolled in the school attending  question-->
                                                    
                                                    <!-- form 5 -->
                                                    <form method="post" action="<?php echo base_url() . 'Udise_admin/updateadmin5frm5' ?>" id="emis_admin5_form5">
                                                        <!-- table 5 start -->
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <b>Whether any child enrolled in the school is attending special training</b>
                                                                    </td>
                                                                    <td colspan="3">
                                                                        <select class="form-control" name="anychildenrldschlatndspcltrng" id="anychildenrolledintheschlattendingspecialtraining">
                                                                            <option value="" selected="selected">Select the option</option>
                                                                            <option value="1">Yes</option>
                                                                            <option value="2">No</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <!--/ Child enrolled in the school attending  question-->
                                                                <!-- Child enrolled in the school option1 -->
                                                                <tr id="noofschildrnsupto30thsep" style="display: none;">
                                                                    <td>
                                                                       &nbsp;&nbsp;&nbsp;&nbsp;(a)No. of children provided special training in current year(up to 30<sup>th</sup> Sep) 
                                                                    </td>
                                                                    <td>
                                                                        <label>Boys</label>
                                                                        <input type="text" class="form-control" name="no_chldrs_spectrng_utsep30_b" id="noofchildrensprovidedspltrainingupto30thsepboys" maxlength="4">
                                                                    </td>
                                                                    <td colspan="2">
                                                                        <label>Girls</label>
                                                                        <input type="text" class="form-control" name="no_chldrs_spectrng_utsep30_g" id="noofchildrensprovidedspltrainingupto30thsepgirls" maxlength="4">
                                                                    </td>
                                                                </tr>
                                                                <!-- Child enrolled in the school option1 -->
                                                                <!-- Child enrolled in the school option2 -->
                                                                <tr id="noofchildrnsinpreviousacdmicyr" style="display: none;">
                                                                    <td>
                                                                       &nbsp;&nbsp;&nbsp;&nbsp;(b)No. of children enrolled for special training in previous academic year 
                                                                    </td>
                                                                    <td>
                                                                        <label>Boys</label>
                                                                        <input type="text" class="form-control" name="no_chldrs_spectrng_enrld_acadyr_b" id="noofchildrensenroledforspcltringinprevyearboys" maxlength="4">
                                                                    </td>
                                                                    <td colspan="2">
                                                                        <label>Girls</label>
                                                                        <input type="text" class="form-control" name="no_chldrs_spectrng_enrld_acadyr_g" id="noofchildrensenroledforspcltringinprevyeargirls" maxlength="4">
                                                                    </td>
                                                                </tr>
                                                                <!-- Child enrolled in the school option2 -->
                                                                <!-- Child enrolled in the school option3 -->
                                                                <tr id="noofchildrnsinduringpreviousacademicyr" style="display: none;">
                                                                    <td>
                                                                       &nbsp;&nbsp;&nbsp;&nbsp;(c)No. of children completed special training during previous academic year 
                                                                    </td>
                                                                    <td>
                                                                        <label>Boys</label>
                                                                        <input type="text" class="form-control" name="no_chldrs_spectrng_cmpltd_prevacdyr_b" id="noofchildrenscompletdspcltraingduringpreviousacadmicyearboys" maxlength="4">
                                                                    </td>
                                                                    <td colspan="2">
                                                                        <label>Girls</label>
                                                                        <input type="text" class="form-control" name="no_chldrs_spectrng_cmpltd_prevacdyr_g" id="noofchildrenscompletdspcltraingduringpreviousacadmicyeargirls" maxlength="4">
                                                                    </td>
                                                                </tr>
                                                                <!-- Child enrolled in the school option3 -->

                                                                <!-- Child enrolled in the school option4 -->
                                                                <tr id="whoconductsspcltainingrow" style="display: none;">
                                                                    <td>
                                                                       &nbsp;&nbsp;&nbsp;&nbsp;(d)Who conducts special trainings
                                                                    </td>
                                                                    <td colspan="3">
                                                                      <select class="form-control" name="whoconductsspcltaining" id="whoconductsspcltaining">
                                                                          <option value="" selected="selected">Select the option</option>
                                                                          <option value="1">School teachers</option>
                                                                          <option value="2">Specially engaged teachers</option>
                                                                          <option value="3">Both 1&amp;2 </option>
                                                                          <option value="4">NGO</option>
                                                                          <option value="5">Others</option>
                                                                      </select>
                                                                    </td>
                                                                </tr>
                                                                <!-- Child enrolled in the school option4 -->

                                                                <!-- Child enrolled in the school option5 -->
                                                                <tr id="specialtraingisconductedinrow" style="display: none;">
                                                                    <td>
                                                                       &nbsp;&nbsp;&nbsp;&nbsp;(e)Special training is conducted in
                                                                    </td>
                                                                    <td colspan="3">
                                                                      <select class="form-control" name="spcltraingconductedin" id="spcltraingconductedin">
                                                                          <option value="" selected="selected">Select the option</option>
                                                                          <option value="1">School premises</option>
                                                                          <option value="2">Other than school premises</option>
                                                                          <option value="3">Both</option>
                                                                      </select>
                                                                    </td>
                                                                </tr>
                                                                <!-- Child enrolled in the school option5 -->

                                                                <!-- Child enrolled in the school option6 -->
                                                                <tr id="typeoftrainingbeingconductedrow" style="display: none;">
                                                                    <td>
                                                                       &nbsp;&nbsp;&nbsp;&nbsp;(f)Type of training being conducted
                                                                    </td>
                                                                    <td colspan="3">
                                                                      <select class="form-control" name="typeoftrainingbeingconducted" id="typeoftrainingbeingconducted">
                                                                          <option value="" selected="selected">Select the option</option>
                                                                          <option value="1">Residential</option>
                                                                          <option value="2">Non-Residential</option>
                                                                          <option value="3">Both</option>
                                                                      </select>
                                                                    </td>
                                                                </tr>
                                                                <!-- Child enrolled in the school option6 -->
                                                                <tr>
                                                                    <td colspan="3">
                                                                        <div class="row">
                                                                            <center><input type="submit" value="submit" class="btn green"></center>
                                                                        </div>
                                                                    </td> 
                                                                </tr>
                                                    </tbody>
                                                </table>
                                               <!-- table 5 Ending -->
                                              </form>
                                              <!-- form 5 Ending -->
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
        <script src="<?php echo base_url() . 'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js'; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js'; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'asset/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'asset/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js'; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'asset/global/plugins/moment.min.js'; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'asset/global/plugins/jquery.mockjax.js'; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'asset/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js'; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.js'; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js'; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'asset/global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js'; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'asset/global/plugins/select2/js/select2.full.min.js'; ?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url() . 'asset/global/scripts/datatable.js'; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'asset/global/plugins/datatables/datatables.min.js" type="text/javascript'; ?>"></script>
        <script src="<?php echo base_url() . 'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'; ?>" type="text/javascript"></script>
         <script src="<?php echo base_url() . 'asset/pages/scripts/table-datatables-colreorder.min.js'; ?>" type="text/javascript"></script>
         <script src="<?php echo base_url() . 'asset/global/plugins/jquery.validate.min.js'; ?>" type="text/javascript"></script>

         <script src="<?php echo base_url() . 'asset/pages/scripts/admin.js'; ?>" type="text/javascript"></script>
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

        <?php
           $isthisresidentialschool = $resid_schl;
        ?>
            <script type="text/javascript">
                $('#isthisresidentialschool').val(<?php echo $isthisresidentialschool; ?>);
            </script>
                <!-- set1 -->
                <?php if ($isthisresidentialschool == "1")
                { ?>
                        <script type="text/javascript">
                            $('#typeofresidential,#typeofresidential1').show();

                            $("#typeofresidentialschool").val(<?php echo $typ_resid_schl; ?>);

                            $("#boardingfacilitiesareavailforthefollowingstageorlvl").val(<?php echo $brdng_fac_avl_stg; ?>);
                                // 2nd option inner view
                                if ($('#boardingfacilitiesareavailforthefollowingstageorlvl').val()=='1') {
                                    $('#boadingfacilityavail1,#boadingfacilityavail2,#boadingfacilityavail3,#boadingfacilityavail4').show();

                                    $('#boardingfacilitiesareavailforthefollowingprimarystudent').val(<?php echo $resid_pri_stud; ?>);
                                    $('#boardingfacilitiesareavailforthefollowingupperprimarystudent').val(<?php echo $resid_uppri_stud; ?>);
                                    $('#boardingfacilitiesareavailforthefollowingsecondarystudent').val(<?php echo $resid_sec_stud; ?>);
                                    $('#boardingfacilitiesareavailforthefollowinghighersecondarystudent').val(<?php echo $resid_hsc_stud; ?>);
                                    if ($('#boardingfacilitiesareavailforthefollowingprimarystudent').val()=='1') {
                                        $('#admin5primarygirls,#admin5primaryboys').show()

                                        $('#noofgirlsprimarystudent').val(<?php echo $resid_pri_stud_g ?>);
                                        $('#noofboysprimarystudent').val(<?php echo $resid_pri_stud_b ?>);
                                    }

                                    if ($('#boardingfacilitiesareavailforthefollowingupperprimarystudent').val()=='1') {
                                        $('#admin5upperprimaryboys,#admin5upperprimarygirls').show()

                                        $('#noofgirlsupperprimarystudent').val(<?php echo $resid_uppri_stud_g ?>);
                                        $('#noofboysupperprimarystudent').val(<?php echo $resid_uppri_stud_b ?>);
                                    }

                                    if ($('#boardingfacilitiesareavailforthefollowingsecondarystudent').val()=='1') {
                                        $('#admin5secondaryboys,#admin5secondarygirls').show()

                                        $('#noofgirlssecondarystudent').val(<?php echo $resid_sec_stud_g ?>);
                                        $('#noofboyssecondarystudent').val(<?php echo $resid_sec_stud_b ?>);
                                    }else{
                                         $('#noofgirlssecondarystudent,#noofboyssecondarystudent').val();
                                    }

                                    if ($('#boardingfacilitiesareavailforthefollowinghighersecondarystudent').val()=='1') {
                                        $('#admin5highersecondaryboys,#admin5highersecondarygirls').show()

                                        $('#noofgirlshighersecondarystudent').val(<?php echo $resid_hsc_stud_g ?>);
                                        $('#noofboyshighersecondarystudent').val(<?php echo $resid_hsc_stud_b ?>);
                                    }else{
                                         $('#noofgirlshighersecondarystudent,#noofboyshighersecondarystudent').val();
                                    }

                                }
                                // 2nd Option inner view Ending
                            
                            $("#isthisresidentialschool").change(function() {
                              if ($('#isthisresidentialschool').val()=='1') {
                                        $('#boadingfacilityavail1,#boadingfacilityavail2,#boadingfacilityavail3,#boadingfacilityavail4').show();
                                      // option1
                                       $("#typeofresidentialschool").val(<?php echo $typ_resid_schl; ?>);
                                       $("#boardingfacilitiesareavailforthefollowingstageorlvl").val(<?php echo $brdng_fac_avl_stg; ?>);

                                       if ($('#boardingfacilitiesareavailforthefollowingstageorlvl').val()=='1') {
                                                $('#boadingfacilityavail1,#boadingfacilityavail2,#boadingfacilityavail3,#boadingfacilityavail4').show();
                                                $('#boardingfacilitiesareavailforthefollowingprimarystudent').val(<?php echo $resid_pri_stud; ?>);
                                                $('#boardingfacilitiesareavailforthefollowingupperprimarystudent').val(<?php echo $resid_uppri_stud; ?>);
                                                $('#boardingfacilitiesareavailforthefollowingsecondarystudent').val(<?php echo $resid_sec_stud; ?>);
                                                $('#boardingfacilitiesareavailforthefollowinghighersecondarystudent').val(<?php echo $resid_hsc_stud; ?>);
                                        if ($('#boardingfacilitiesareavailforthefollowingprimarystudent').val()=='1') {
                                                $('#admin5primarygirls,#admin5primaryboys').show()

                                                $('#noofgirlsprimarystudent').val(<?php echo $resid_pri_stud_g ?>);
                                                $('#noofboysprimarystudent').val(<?php echo $resid_pri_stud_b ?>);
                                    }else{
                                                $('#noofgirlsprimarystudent,#noofboysprimarystudent').val();
                                    }

                                       if ($('#boardingfacilitiesareavailforthefollowingupperprimarystudent').val()=='1') {
                                        $('#admin5upperprimaryboys,#admin5upperprimarygirls').show()

                                        $('#noofgirlsupperprimarystudent').val(<?php echo $resid_uppri_stud_g ?>);
                                        $('#noofboysupperprimarystudent').val(<?php echo $resid_uppri_stud_b ?>);
                                    }else{
                                         $('#noofgirlsupperprimarystudent,#noofboysupperprimarystudent').val();
                                    }

                                    if ($('#boardingfacilitiesareavailforthefollowingsecondarystudent').val()=='1') {
                                        $('#admin5secondaryboys,#admin5secondarygirls').show()

                                        $('#noofgirlssecondarystudent').val(<?php echo $resid_sec_stud_g ?>);
                                        $('#noofboyssecondarystudent').val(<?php echo $resid_sec_stud_b ?>);
                                    }else{
                                         $('#noofgirlssecondarystudent,#noofboyssecondarystudent').val();
                                    }

                                    if ($('#boardingfacilitiesareavailforthefollowinghighersecondarystudent').val()=='1') {
                                        $('#admin5highersecondaryboys,#admin5highersecondarygirls').show()

                                        $('#noofgirlshighersecondarystudent').val(<?php echo $resid_hsc_stud_g ?>);
                                        $('#noofboyshighersecondarystudent').val(<?php echo $resid_hsc_stud_b ?>);
                                    }else{
                                         $('#noofgirlshighersecondarystudent,#noofboyshighersecondarystudent').val();
                                    }


                                }

                              }
                              else{ 
                                       $('#typeofresidentialschool,#boardingfacilitiesareavailforthefollowingstageorlvl').val(function () {
                                       return $(this).find('option').filter(function () {
                                       return $(this).prop('defaultSelected');
                                             }).val();
                                       });
                                            
                              }

                              
                            
                            });

                            $('#boardingfacilitiesareavailforthefollowingstageorlvl').change(function(){
                                                if($('#boardingfacilitiesareavailforthefollowingstageorlvl').val()=='1'){

                                                    $('#boadingfacilityavail1,#boadingfacilityavail2,#boadingfacilityavail3,#boadingfacilityavail4').show();
                                                $('#boardingfacilitiesareavailforthefollowingprimarystudent').val(<?php echo $resid_pri_stud; ?>);
                                                $('#boardingfacilitiesareavailforthefollowingupperprimarystudent').val(<?php echo $resid_uppri_stud; ?>);
                                                $('#boardingfacilitiesareavailforthefollowingsecondarystudent').val(<?php echo $resid_sec_stud; ?>);
                                                $('#boardingfacilitiesareavailforthefollowinghighersecondarystudent').val(<?php echo $resid_hsc_stud; ?>);
                                                    
                                                    // set1
                                                    if ($('#boardingfacilitiesareavailforthefollowingprimarystudent').val()=='1') {
                                                        $('#admin5primarygirls,#admin5primaryboys').show()

                                                        $('#noofgirlsprimarystudent').val(<?php echo $resid_pri_stud_g ?>);
                                                        $('#noofboysprimarystudent').val(<?php echo $resid_pri_stud_b ?>);
                                                    }else{
                                                        $('#noofgirlsprimarystudent,#noofboysprimarystudent').val();          
                                                    }

                                                    // set2
                                                   if ($('#boardingfacilitiesareavailforthefollowingupperprimarystudent').val()=='1') {
                                                        $('#admin5upperprimaryboys,#admin5upperprimarygirls').show()

                                                        $('#noofgirlsupperprimarystudent').val(<?php echo $resid_uppri_stud_g ?>);
                                                        $('#noofboysupperprimarystudent').val(<?php echo $resid_uppri_stud_b ?>);
                                                    }else{
                                                        $('#noofgirlsupperprimarystudent,#noofboysupperprimarystudent').val();
                                                    }

                                                    // set3
                                                    if ($('#boardingfacilitiesareavailforthefollowingsecondarystudent').val()=='1') {
                                                            $('#admin5secondaryboys,#admin5secondarygirls').show()

                                                                $('#noofgirlssecondarystudent').val(<?php echo $resid_sec_stud_g ?>);
                                                                $('#noofboyssecondarystudent').val(<?php echo $resid_sec_stud_b ?>);
                                                    }else{
                                                                $('#noofgirlssecondarystudent,#noofboyssecondarystudent').val();
                                                    }


                                                    if ($('#boardingfacilitiesareavailforthefollowinghighersecondarystudent').val()=='1') {
                                                            $('#admin5highersecondaryboys,#admin5highersecondarygirls').show()

                                                                $('#noofgirlshighersecondarystudent').val(<?php echo $resid_hsc_stud_g ?>);
                                                                $('#noofboyshighersecondarystudent').val(<?php echo $resid_hsc_stud_b ?>);
                                                    }else{
                                                            $('#noofgirlshighersecondarystudent,#noofboyshighersecondarystudent').val();
                                                    }


                                                }else{

                                                    $('#boardingfacilitiesareavailforthefollowingprimarystudent,#boardingfacilitiesareavailforthefollowingupperprimarystudent,#boardingfacilitiesareavailforthefollowingsecondarystudent,#boardingfacilitiesareavailforthefollowinghighersecondarystudent').val(function () {
                                                                return $(this).find('option').filter(function () {
                                                                return $(this).prop('defaultSelected');
                                                            }).val();
                                                        });

                                                }
                                        });

                                        $('#boardingfacilitiesareavailforthefollowingprimarystudent').change(function(){
                                                if ($('#boardingfacilitiesareavailforthefollowingprimarystudent').val()=='1') {
                                                        $('#noofgirlsprimarystudent').val(<?php echo $resid_pri_stud_g ?>);
                                                        $('#noofboysprimarystudent').val(<?php echo $resid_pri_stud_b ?>);
                                                }else{

                                                    $('#noofgirlsprimarystudent,#noofboysprimarystudent').val();

                                                }
                                        });


                                        $('#boardingfacilitiesareavailforthefollowingupperprimarystudent').change(function(){
                                                if ($('#boardingfacilitiesareavailforthefollowingupperprimarystudent').val()=='1') {
                                                        $('#admin5upperprimaryboys,#admin5upperprimarygirls').show()

                                                        $('#noofgirlsupperprimarystudent').val(<?php echo $resid_uppri_stud_g ?>);
                                                        $('#noofboysupperprimarystudent').val(<?php echo $resid_uppri_stud_b ?>);
                                                    }else{
                                                        $('#noofgirlsupperprimarystudent,#noofboysupperprimarystudent').val();
                                                    }
                                        });


                                        $('#boardingfacilitiesareavailforthefollowingsecondarystudent').change(function(){
                                                if ($('#boardingfacilitiesareavailforthefollowingsecondarystudent').val()=='1') {
                                                         $('#admin5secondaryboys,#admin5secondarygirls').show()

                                                        $('#noofgirlssecondarystudent').val(<?php echo $resid_sec_stud_g ?>);
                                                        $('#noofboyssecondarystudent').val(<?php echo $resid_sec_stud_b ?>);
                                                    }else{
                                                        $('#noofgirlssecondarystudent,#noofboyssecondarystudent').val();
                                                    }
                                        });


                                        $('#boardingfacilitiesareavailforthefollowinghighersecondarystudent').change(function(){
                                                if ($('#boardingfacilitiesareavailforthefollowinghighersecondarystudent').val()=='1') {
                                                        $('#admin5highersecondaryboys,#admin5highersecondarygirls').show()

                                                        $('#noofgirlshighersecondarystudent').val(<?php echo $resid_hsc_stud_g ?>);
                                                        $('#noofboyshighersecondarystudent').val(<?php echo $resid_hsc_stud_b ?>);
                                                    }else{
                                                        $('#noofgirlshighersecondarystudent,#noofboyshighersecondarystudent').val();
                                                }
                                        });

                        </script>
                                            <?php
                                                } ?>
                                            <!-- set1 Ending -->

                                            <!-- set2 -->
                                            <?php
                                                $isthisaminoritymanagedschool = $min_mangd_schl;
                                                $preprimarysectionattachedtoschool = $prepri_sction_atchd_schl;
                                                $anganwadicentrinschlcampus = $angwdi_cntr_schlcmps;
                                                $ccebeingimplementedschool = $cce_imp_schl;
                                            ?>

                
                <script type="text/javascript">

                    $('#isthisaminoritymanagedschool').val(<?php echo $isthisaminoritymanagedschool; ?>);
                    $('#preprimarysectionattachedtoschool').val(<?php echo $preprimarysectionattachedtoschool; ?>);
                    $('#anganwadicentrinschlcampus').val(<?php echo $anganwadicentrinschlcampus; ?>);
                    $('#ccebeingimplementedschool').val(<?php echo $ccebeingimplementedschool; ?>);
                </script>

                    <?php if ($isthisaminoritymanagedschool == '1')
                      { ?>
                        <script type="text/javascript">
                            $('#minoritymanagedschooloptiona').show();
                            $('#typeofaminoritymanagedschool').val(<?php echo $typ_minrty_cmnty; ?>);

                            // Onchange 
                            $('#isthisaminoritymanagedschool').change(function(){
                                if ($('#isthisaminoritymanagedschool').val() == '1') {
                                    $('#typeofaminoritymanagedschool').val(<?php echo $typ_minrty_cmnty; ?>);
                                }else{
                                    $('#typeofaminoritymanagedschool').val(function () {
                                       return $(this).find('option').filter(function () {
                                       return $(this).prop('defaultSelected');
                                             }).val();
                                       });
                                }
                            });
                            // Onchange Ending

                        </script>
                    <?php
                        } ?>  

                    <?php if ($preprimarysectionattachedtoschool == '1')
                        { ?>
                        <script type="text/javascript">
                            $('#anganwadioption1,#anganwadioption2').show();
                            $('#totstudentsinpreprimarygrade1preceding').val(<?php echo $tot_stud_prepri_grd; ?>);
                            $('#preprimarytotteachers').val(<?php echo $tot_tchr_prepri; ?>);

                            // Onchange 
                            $('#preprimarysectionattachedtoschool').change(function(){
                                if ($('#preprimarysectionattachedtoschool').val() == '1') {
                                     $('#totstudentsinpreprimarygrade1preceding').val(<?php echo $tot_stud_prepri_grd; ?>);
                                     $('#preprimarytotteachers').val(<?php echo $tot_tchr_prepri; ?>);
                                }else{
                                    $('#totstudentsinpreprimarygrade1preceding,#preprimarytotteachers').val();
                                }
                            });
                            // Onchange Ending

                        </script>
                    <?php
                        } ?>

                    <?php if ($anganwadicentrinschlcampus == '1')
                        { ?>
                        <script type="text/javascript">
                            $('#anganwaditotchildren,#anganwaditotteacher').show();
                            $('#totchildrensinanganwadi').val(<?php echo $angwdi_cntr_tot_chldrs; ?>);
                            $('#totteachersoranganwadiworkers').val(<?php echo $tot_tchrs_angwdi_wrks; ?>);

                            // Onchange
                            $('#anganwadicentrinschlcampus').change(function(){
                                if ($('#anganwadicentrinschlcampus').val()=='1') {
                                      $('#totchildrensinanganwadi').val(<?php echo $angwdi_cntr_tot_chldrs; ?>);
                                      $('#totteachersoranganwadiworkers').val(<?php echo $tot_tchrs_angwdi_wrks; ?>);
                                }else{
                                      $('#totchildrensinanganwadi,#totteachersoranganwadiworkers').val();
                                }
                            });
                            // Onchange Ending
                        </script>
                    <?php
                        } ?>

                    <?php if ($ccebeingimplementedschool == '1')
                        { ?>
                        <script type="text/javascript">
                            $('#elementryset,#secondaryset,#highersecondaryset').show();

                            $('#ccebeingimplmentedinschlelemntry').val(<?php echo $cce_imp_schl_elem; ?>);
                            $('#ccebeingimplmentedinschlsecondary').val(<?php echo $cce_imp_schl_sec; ?>);
                            $('#ccebeingimplmentedinschlhighersecondary').val(<?php echo $cce_imp_schl_hsc; ?>);

                            // Onchange
                            $('#ccebeingimplementedschool').change(function(){
                                if ($('#ccebeingimplementedschool').val()=='1') {
                        <?php if ($cce_imp_schl_elem == 1 || $cce_imp_schl_sec == 1 || $cce_imp_schl_hsc == 1)
                        { ?>
                                                $('#cceelementrymaintained,#cceelementrycumulative').show();
                                                
                                                $('#cumulativerecordsofpupilbeingmaintained').val(<?php echo $cumm_rcrd_ppl_mntnd; ?>);
                                               $('#cumulativerecordsofpupilsharewithparents').val(<?php echo $cumm_rcrd_ppl_shrwthprnts; ?>);             

                        <?php
                        } ?>
                                      $('#ccebeingimplmentedinschlelemntry').val(<?php echo $cce_imp_schl_elem; ?>);
                                      $('#ccebeingimplmentedinschlsecondary').val(<?php echo $cce_imp_schl_sec; ?>);
                                      $('#ccebeingimplmentedinschlhighersecondary').val(<?php echo $cce_imp_schl_hsc; ?>);
                                }else{
                                      $('#ccebeingimplmentedinschlelemntry,#ccebeingimplmentedinschlsecondary,#ccebeingimplmentedinschlhighersecondary').val(function () {
                                       return $(this).find('option').filter(function () {
                                       return $(this).prop('defaultSelected');
                                             }).val();
                                       });
                                }
                            });
                            // Onchange Ending

                        </script>
                            <?php if ($cce_imp_schl_elem == 1 || $cce_imp_schl_sec == 1 || $cce_imp_schl_hsc == 1){ ?>
                            <script type="text/javascript">
                               $('#cceelementrymaintained,#cceelementrycumulative').show();
                               $('#cumulativerecordsofpupilbeingmaintained').val(<?php echo $cumm_rcrd_ppl_mntnd; ?>);
                               $('#cumulativerecordsofpupilsharewithparents').val(<?php echo $cumm_rcrd_ppl_shrwthprnts; ?>);
                               // Onchange
                                $('#ccebeingimplmentedinschlelemntry,#ccebeingimplmentedinschlsecondary,#ccebeingimplmentedinschlhighersecondary').change(function(){
                                    if ($('#ccebeingimplmentedinschlelemntry').val()=='1'|| $('#ccebeingimplmentedinschlsecondary').val()=='1' || $('#ccebeingimplmentedinschlhighersecondary').val()=='1') {
                                        $('#cumulativerecordsofpupilbeingmaintained').val(<?php echo $cumm_rcrd_ppl_mntnd; ?>);
                                        $('#cumulativerecordsofpupilsharewithparents').val(<?php echo $cumm_rcrd_ppl_shrwthprnts; ?>);
                                    }else{
                                        $('#cumulativerecordsofpupilbeingmaintained,#cumulativerecordsofpupilsharewithparents').val(function () {
                                       return $(this).find('option').filter(function () {
                                       return $(this).prop('defaultSelected');
                                             }).val();
                                       });
                                    }
                                });
                               // Onchange Ending
                            </script>
                            <?php
    } ?>
                        </script>
                    <?php
} ?>
    

                </script>
                
                <!-- set2 Ending -->


                <!-- set 3 -->
                <?php
                    $smchasbeenconstituted = $smc_constud;
                    $smctotnumbermale = $smc_tot_membr_mle;
                    $smctotnumberfemale = $smc_tot_membr_fmle;
                    $smcmembrofparentsorguardiansmale = $smc_membr_parnts_mle;
                    $smcmembrofparentsorguardiansfemale = $smc_membr_parnts_fmle;
                    $smcrepresentativesmale = $smc_reprsnt_loc_auth_mle;
                    $smcrepresentativesfemale = $smc_reprsnt_loc_auth_fmle;
                ?>
               
                
                <script type="text/javascript">
                   $('#smchasbeenconstituted').val(<?php echo $smchasbeenconstituted; ?>);    
                </script>

                <?php if ($smchasbeenconstituted == '1')
{ ?>
                        <script type="text/javascript">
                                $('#totnoofmembrsinsmc,#membrsofparentsorguardian,#represenativesfromloclauthorities').show();
                                
                                $('#smctotnumbermale').val(<?php echo $smctotnumbermale; ?>);
                                $('#smctotnumberfemale').val(<?php echo $smctotnumberfemale; ?>);

                                $('#smcmembrofparentsorguardiansmale').val(<?php echo $smcmembrofparentsorguardiansmale; ?>);
                                $('#smcmembrofparentsorguardiansfemale').val(<?php echo $smcmembrofparentsorguardiansfemale; ?>);

                                $('#smcrepresentativesmale').val(<?php echo $smcrepresentativesmale; ?>);
                                $('#smcrepresentativesfemale').val(<?php echo $smcrepresentativesfemale; ?>);

                                $('#smchasbeenconstituted').change(function(){

                                    if ($('#smchasbeenconstituted').val()=='1') {

                                        $('#smctotnumbermale').val(<?php echo $smctotnumbermale; ?>);
                                $('#smctotnumberfemale').val(<?php echo $smctotnumberfemale; ?>);

                                $('#smcmembrofparentsorguardiansmale').val(<?php echo $smcmembrofparentsorguardiansmale; ?>);
                                $('#smcmembrofparentsorguardiansfemale').val(<?php echo $smcmembrofparentsorguardiansfemale; ?>);

                                $('#smcrepresentativesmale').val(<?php echo $smcrepresentativesmale; ?>);
                                $('#smcrepresentativesfemale').val(<?php echo $smcrepresentativesfemale; ?>);
                                    }

                                });
                       </script>
                <?php
} ?>

                 <!-- set 3 Ending -->

                 <!-- set 4 -->
               
                <script type="text/javascript">
                   $('#sepbankacountforsmcisbeingmaintained').val(<?php echo $sepbankacountforsmcisbeingmaintained; ?>);    
                </script>

                <?php if ($sepbankacountforsmcisbeingmaintained == '1')
{ ?>
                        <script type="text/javascript">
                                $('#smcdtlsbranchbank,#smcaccountnorow,#smcaccountnorow,#smcifsccoderow').show();
                       </script>
                <?php
} ?>

                 <!-- set 4 Ending -->


                 <!-- set 5 -->
                <?php
$anychildenrolledintheschlattendingspecialtraining = $chld_enrld_attndspectrng;
$noofchildrensprovidedspltrainingupto30thsepboys = $no_chldrs_spectrng_utsep30_b;
$noofchildrensprovidedspltrainingupto30thsepgirls = $no_chldrs_spectrng_utsep30_g;
$noofchildrensenroledforspcltringinprevyearboys = $no_chldrs_spectrng_enrld_acadyr_b;
$noofchildrensenroledforspcltringinprevyeargirls = $no_chldrs_spectrng_enrld_acadyr_g;
$noofchildrenscompletdspcltraingduringpreviousacadmicyearboys = $no_chldrs_spectrng_cmpltd_prevacdyr_b;
$noofchildrenscompletdspcltraingduringpreviousacadmicyeargirls = $no_chldrs_spectrng_cmpltd_prevacdyr_g;
$whoconductsspcltaining = $who_condct_spec_trng;
$spcltraingconductedin = $spec_trng_cndt;
$typeoftrainingbeingconducted = $typ_trng_condct;
?>
               
                
                <script type="text/javascript">
                   $('#anychildenrolledintheschlattendingspecialtraining').val(<?php echo $anychildenrolledintheschlattendingspecialtraining; ?>);    
                </script>

                <?php if ($anychildenrolledintheschlattendingspecialtraining == '1')
{ ?>
                        <script type="text/javascript">

                                $('#noofschildrnsupto30thsep,#noofchildrnsinpreviousacdmicyr,#noofchildrnsinduringpreviousacademicyr,#whoconductsspcltainingrow,#specialtraingisconductedinrow,#typeoftrainingbeingconductedrow').show();
                                
                                $('#noofchildrensprovidedspltrainingupto30thsepboys').val(<?php echo $noofchildrensprovidedspltrainingupto30thsepboys; ?>);
                                $('#noofchildrensprovidedspltrainingupto30thsepgirls').val(<?php echo $noofchildrensprovidedspltrainingupto30thsepgirls; ?>);

                                $('#noofchildrensenroledforspcltringinprevyearboys').val(<?php echo $noofchildrensenroledforspcltringinprevyearboys; ?>);
                                $('#noofchildrensenroledforspcltringinprevyeargirls').val(<?php echo $noofchildrensenroledforspcltringinprevyeargirls; ?>);

                                $('#noofchildrenscompletdspcltraingduringpreviousacadmicyearboys').val(<?php echo $noofchildrenscompletdspcltraingduringpreviousacadmicyearboys; ?>);
                                $('#whoconductsspcltaining').val(<?php echo $whoconductsspcltaining; ?>);

                                $('#spcltraingconductedin').val(<?php echo $spcltraingconductedin; ?>);

                                $('#typeoftrainingbeingconducted').val(<?php echo $typeoftrainingbeingconducted; ?>);

                                $('#smchasbeenconstituted').change(function(){

                                    if ($('#smchasbeenconstituted').val()=='1') {

                                        $('#noofchildrensprovidedspltrainingupto30thsepboys').val(<?php echo $noofchildrensprovidedspltrainingupto30thsepboys; ?>);
                                $('#noofchildrensprovidedspltrainingupto30thsepgirls').val(<?php echo $noofchildrensprovidedspltrainingupto30thsepgirls; ?>);

                                $('#noofchildrensenroledforspcltringinprevyearboys').val(<?php echo $noofchildrensenroledforspcltringinprevyearboys; ?>);
                                $('#noofchildrensenroledforspcltringinprevyeargirls').val(<?php echo $noofchildrensenroledforspcltringinprevyeargirls; ?>);

                                $('#noofchildrenscompletdspcltraingduringpreviousacadmicyearboys').val(<?php echo $noofchildrenscompletdspcltraingduringpreviousacadmicyearboys; ?>);
                                $('#whoconductsspcltaining').val(<?php echo $whoconductsspcltaining; ?>);

                                $('#typeoftrainingbeingconducted').val(<?php echo $typeoftrainingbeingconducted; ?>);

                                $('#spcltraingconductedin').val(<?php echo $spcltraingconductedin; ?>);
                                    }

                                });
                       </script>
                <?php
} ?>

                 <!-- set 5 Ending -->

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
