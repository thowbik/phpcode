<!DOCTYPE html>

<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <?php $this->load->view('head.php'); ?>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/css/support/custom-vivek.css';?>" rel="stylesheet" type="text/css" />
</head>
<!-- END HEAD -->

<body class="page-container-bg-solid page-md">
    <div class="page-wrapper">
            <?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
            <?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
            <?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 5){ ?>
            <?php $this->load->view('state/header.php'); }else{ $this->load->view('header.php'); } ?>
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
                                    <h1>SCHOOL BASIC INFORMATION</h1>
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
                            <div class="container">
                                <!-- BEGIN PAGE CONTENT INNER -->
                                <div class="page-content-inner">
                                       <?php $this->load->view('emis_school_profile_header1.php'); ?>
                                    <div class="portlet light portlet-fit ">
                                        <div class="portlet-body">
                                            <div class ="row">
                                                <div class="col-md-4">
                                                    <font style="color:#dd4b39;"><?php echo $this->session->flashdata('errors'); ?></font>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $user_type_id = $this->session->userdata('emis_user_type_id'); ?> 
                                        <div class="form-actions">
                                            <form id="emis_schoolnew_basic_part4" method="post" action="<?php echo base_url().'Basic/schoolupdation/'.$this->uri->segment(3,0);?>">
                                                <div class="portlet light portlet-fit ">
                                                 <?php $this->load->view('schoolInfo/supportHeader'); ?>
                                                    <div class="portlet-title">
                                                        <div class="caption col-md-9">
                                                            <i class="fa fa-building font-dark"></i>
                                                            <span class="caption-subject font-dark sbold uppercase">School Details - Part IV</span>
                                                        </div>
                                                        <?php
                                                            if($profile[0]['part_4']==1) {
                                                        ?>
                                                        <div class="col-md-3">
                                                            <button type="button" class="btn btn-primary" onclick="postRequest(createJSON(this.form),'<?php echo base_url().'Basic/getPartInformationByPost/';?>',this.form);">VIEW/EDIT</button>
                                                        </div>
                                                        <?php } ?>
                                                    </div> 
                                                    
                                                    
                                                    
                                                    <div class="portlet-body">
                                                            <div class="form-row">
                                                            
                                                            
                                                            <div class="form-group col-md-12">
                                                                                                                            
                                                                <table class="table">
                                                                    <tr>
                                                                        <th colspan="3" class="bg-primary text-white">
                                                                         <i class="fa fa-book"></i>
                                                                        <span class="caption-subject text-white sbold uppercase" >School Textbooks Details</span>
                                                                         </th>
                                                                    </tr>
                                                                    
                                                                    
                                                                   <!-- <tr>
                                                                        <th>Whether full set of Textbooks were received in Current Academic Year?</th>
                                                                        <th>
                                                                        <input id="txtbook_1" value="1" name="textbooksyear" onchange="document.getElementById('textbookdetails').style.visibility=(this.checked?'':'hidden');setRequiredField(this.value,'textbookcm,textbooky','1')" type="radio"><label for="txtbook_1">YES</label>
                                                                        <input id="txtbook_2" value="0" name="textbooksyear" onchange="document.getElementById('textbookdetails').style.visibility=(this.checked?'hidden':'');setRequiredField(this.value,'textbookcm,textbooky','1')" type="radio" checked="checked"><label for="txtbook_2">NO</label>
                                                                        </th>
                                                                        <th>&nbsp;</th>                                                                     
                                                                    </tr>
                                                                    <tr id="textbookdetails">
                                                                        <th>If Yes, when were the Textbook received in the Current Academic Year:</th>
                                                                        <th><label for="month">Month</label><select id="textbookcm" name="textbookcm" class="form-control" onfocus="textvalidate(this.id,'emis_textbookcm_alert');" onchange="textvalidate(this.id,'emis_textbookcm_alert');">
                                                                        <option value="">Choose</option>
                                                                          <?php
                                                                        $i=6; $z=1;
                                                                        
                                                                        for($i=6 ;$z<=12;$i++,$z++) {
                                                                        $dt='01-'.$i.'-2018';
                                                                        if($i>12){$i=1;}
                                                                        ?>
                                                                            
                                                                            <option value="<?php echo($i); ?>"><?php echo date('F',strtotime($dt)); ?></option>
                                                                            
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                        </select>
                                                                        <font style="color:#dd4b39;"><div id="emis_textbookcm_alert"></div></font>
                                                                        </th>
                                                                        <th><label for="year">Year</label> <input type="number" id="textbooky" name="textbooky" onfocus="textvalidate(this.id,'emis_textbooky_alert');" onchange="textvalidate(this.id,'emis_textbooky_alert');" onkeydown="return restlength(this)" onblur="return restlength(this)" <stro</strong>"2017" max="<?php echo date('Y'); ?>" maxlength="4" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                        <font style="color:#dd4b39;"><div id="emis_textbooky_alert"></div></font>
                                                                        </th>
                                                                    </tr>-->
                                                                </table>
                                                            </div>
                                                            
                                                             <div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr>
                                                                    
                                                                    <th>Availability of free Textbooks, Teaching Learning Equipment (TLE) and Play material (in Current Academic Year)</th>
                                                                    <th>Primary</th>
                                                                    <th>Upper Primary</th>
                                                                    <th>Secondary</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th >Whether complete set of free Textbooks received for the current year? <font style="color:#dd4b39;">*</font></th>
                                                                        <th><select class="form-control" id="tc" name="cmplt_txtbok_recvd_pri" required onfocus="textvalidate(this.id,'emis_tc_alert');" onchange="textvalidate(this.id,'emis_tc_alert');" >
                                                                        <option value="">Choose</option><option value="1">Yes</option><option value="2">No</option>
                                                                        <option value="3">Not Applicable</option>
                                                                        </select>
                                                                        <font style="color:#dd4b39;"><div id="emis_tc_alert"></div></font>
                                                                        </th>
                                                                        <th><select class="form-control" id="tc1" name="cmplt_txtbok_recvd_uppri" required onfocus="textvalidate(this.id,'emis_tc1_alert');" onchange="textvalidate(this.id,'emis_tc1_alert');">
                                                                        <option value="">Choose</option><option value="1">Yes</option><option value="2">No</option>
                                                                        <option value="3">Not Applicable</option></select>
                                                                       <font style="color:#dd4b39;"><div id="emis_tc1_alert"></div></font>
                                                                        </th>
                                                                        <th><select class="form-control" id="tc2" name="hostel_rooms" required onfocus="textvalidate(this.id,'emis_tc2_alert');" onchange="textvalidate(this.id,'emis_tc2_alert');">
                                                                        <option value="">Choose</option><option value="1">Yes</option><option value="2">No</option>
                                                                        <option value="3">Not Applicable</option></select>
                                                                        <!--hostel_rooms bigint(20) schoolnew_academicinfo-->
                                                                        <font style="color:#dd4b39;"><div id="emis_tc2_alert"></div></font>
                                                                        </th>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <th >Whether TLE available for each Grade? <font style="color:#dd4b39;">*</font></th>
                                                                        <th><select class="form-control" id="tle" name="hostel_boys" required onfocus="textvalidate(this.id,'emis_tle_alert');" onchange="textvalidate(this.id,'emis_tle_alert');">
                                                                        <option value="">Choose</option><option value="1">Yes</option><option value="2">No</option>
                                                                         <option value="3">Not Applicable</option>
                                                                       </select>
                                                                       <!--hostel_boys bigint(20) schoolnew_academicinfo-->
                                                                       <font style="color:#dd4b39;"><div id="emis_tle_alert"></div></font>
                                                                       </th>
                                                                        <th><select class="form-control" id="tle1" name="tle_avl_grd_uppri" required onfocus="textvalidate(this.id,'emis_tle1_alert');" onchange="textvalidate(this.id,'emis_tle1_alert');">
                                                                        <option value="">Choose</option><option value="1">Yes</option><option value="2">No</option>
                                                                        <option value="3">Not Applicable</option>
                                                                        </select>
                                                                        <font style="color:#dd4b39;"><div id="emis_tle1_alert"></div></font>
                                                                        </th>
                                                                        <th><select class="form-control" id="tle2" name="category_id" required onfocus="textvalidate(this.id,'emis_tle2_alert');" onchange="textvalidate(this.id,'emis_tle2_alert');">
                                                                        <option value="">Choose</option><option value="1">Yes</option><option value="2">No</option>
                                                                        <option value="3">Not Applicable</option>
                                                                        </select>
                                                                        <!--category_id bigint(20) schoolnew_academicinfo-->
                                                                        <font style="color:#dd4b39;"><div id="emis_tle2_alert"></div></font>
                                                                        </th>
                                                                        
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Whether Play materials, Games and Sports equipment are available for each Grade? <font style="color:#dd4b39;">*</font></th>
                                                                        <th><select class="form-control" id="pmgse" name="ply_matrl_pri" required onfocus="textvalidate(this.id,'emis_pmgse_alert');" onchange="textvalidate(this.id,'emis_pmgse_alert');">
                                                                        <option value="">Choose</option><option value="1">Yes</option><option value="2">No</option>
                                                                        <option value="3">Not Applicable</option>
                                                                        </select>
                                                                        <font style="color:#dd4b39;"><div id="emis_pmgse_alert"></div></font>
                                                                        </th>
                                                                        <th><select class="form-control" id="pmgse1" name="ply_matrl_uppri" required onfocus="textvalidate(this.id,'emis_pmgse1_alert');" onchange="textvalidate(this.id,'emis_pmgse1_alert');"><option value="">Choose</option><option value="1">Yes</option><option value="2">No</option>
                                                                        <option value="3">Not Applicable</option>
                                                                        </select>
                                                                        <font style="color:#dd4b39;"><div id="emis_pmgse1_alert"></div></font>
                                                                        </th>
                                                                        <th><select class="form-control" id="pmgse2" name="ply_matrl_sec" required onfocus="textvalidate(this.id,'emis_pmgse2_alert');" onchange="textvalidate(this.id,'emis_pmgse2_alert');"><option value="">Choose</option><option value="1">Yes</option><option value="2">No</option>
                                                                        <option value="3">Not Applicable</option>
                                                                        </select>
                                                                        <font style="color:#dd4b39;"><div id="emis_pmgse2_alert"></div></font>
                                                                        </th>
                                                                        
                                                                    </tr>
                                                                </table>
                                                             </div>
                                                             
                                                              <div class="form-group col-md-12">
                                                              
                                                               <table class="table">
                                                                     <tr>
                                                                        <th colspan="6" class="bg-primary text-white">
                                                                         <i class="fa fa-group"></i>
                                                                        <span class="caption-subject text-white sbold uppercase" >School Inspection Details</span>
                                                                         </th>
                                                                    </tr>
                                                               
                                                                    <tr>
                                                                        <th>School Inspection during Last and Current Academic Year:</th>
                                                                        <th>Officer <font style="color:#dd4b39;">*</font></th>
                                                                        <!--<th>School Category <font style="color:#dd4b39;">*</font></th>-->
                                                                        <th>Purpose <font style="color:#dd4b39;">*</font></th>
                                                                        <th>Date of Inspection <font style="color:#dd4b39;">*</font></th>
                                                                        <th>Add (+) &nbsp;&nbsp; Delete(-)</th>
                                                                    </tr>
                                                                    <tr>
                                                                    <th>Inspection done by <font style="color:#dd4b39;">*</font>
                                                                    <input type="hidden" id="hiddenofficer000_0" name="hiddenofficer000_0" value="schoolnew_inspection_entry">
                                                                    </th>
                                                                    <th>
																	   <select class="form-control" name="officer000_0" id="officer000" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="selectionValidation(this,this.parentNode.parentNode);setRequiredField(this.value,this.parentNode.nextElementSibling.children[0].id+','+this.parentNode.nextElementSibling.nextElementSibling.children[0].id,'1,2,3,4');textvalidate(this.id,this.nextElementSibling.id);if(this.value==0){this.parentNode.nextElementSibling.children[0].setAttribute('readonly','readonly'); this.parentNode.nextElementSibling.nextElementSibling.children[0].setAttribute('readonly','readonly');}else{this.parentNode.nextElementSibling.children[0].removeAttribute('readonly');this.parentNode.nextElementSibling.nextElementSibling.children[0].removeAttribute('readonly');}" required>
                                                                            <option value="">Choose</option>
                                                                            <option value="1">CEO</option>
                                                                            <option value="2">DEO</option>
                                                                            <option value="3">BEO</option>
                                                                            <option value="4">DDRO</option>
                                                                            <option value="5">Educational Officer(Corporation)</option>
                                                                            <option value="6">Asst. Educational Officer(Corporation)</option>
                                                                            <option value="0">Not Applicable</option>
                                                                            <!--<option value="-1">Others</option>-->
                                                                        </select>
                                                                    <div id="emisvisit_0" style="color:#dd4b39;"></div>
                                                                    </th>
                                                                    <th>
                                                                        <select class="form-control" name="officer00_0" id="officer00_0" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="selectionValidation(this,this.parentNode.parentNode);textvalidate(this.id,this.nextElementSibling.id);" >
                                                                            <option value="">Choose</option>
                                                                            <option value="1">Audit</option>
                                                                            <option value="2">Academic</option>
                                                                            <option value="3">Non-Academic</option>
                                                                            <!--<option value="4">None</option>-->
                                                                        </select>
                                                                   <div id="emispurpose_0" name="emispurpose_0" style="color:#dd4b39;"></div>
                                                                    </th>
                                                                    <th><input type="date" id="visitdate" name="visitdate_0" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);" onkeydown="return false;"  min="<?php echo (date("Y-m-d",strtotime("now - 6Years"))); ?>" max="<?php echo (date("Y-m-d",strtotime("now"))); ?>" class="form-control" >
                                                                     <div id="emisdatevisit_0" style="color:#dd4b39;"></div>
                                                                    </th>
                                                                    <th>
                                                                            <button type="button" id="btnofficer000_0" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,1)"><i class="fa fa-plus"></i></button>&nbsp;&nbsp;
                                                                            <button type="button" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,0)"><i class="fa fa-minus"></i></button>
                                                                        </th>
                                                                    </tr>
                                                                    
                                                               </table>
                                                              </div>
                                                              
                                                               <!--<div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr>
                                                                
                                                                <th>No. of Academic inspection made by CEO/DEO (RMSA Officials) for Secondary School</th>
                                                                <th><input type="text"  maxlength="2" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"></th>
                                                                 </tr>
                                                            
                                                                 <tr>
                                                                
                                                                <th>No. of Visits/Inspections made by ADPC/EDC (RMSA Officials) for Secondary School</th>
                                                                <th><input type="text"  maxlength="2" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"></th>
                                                                  </tr>
                                                                
                                                                </table>
                                                                </div>-->
                                                              
                                                             
                                                              
                                                                 <div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th colspan="5" class="bg-primary text-white">
                                                                         <i class="fa fa-television"></i>
                                                                        <span class="caption-subject text-white sbold uppercase" >School Management Committee (SMC) / School Management and Development Committee (SMDC) Details</span>
                                                                         </th>
                                                                         </tr>
                                                                    <tr>
                                                                        <th colspan="2">Whether School Management Committee (SMC) is constituted? <font style="color:#dd4b39;">*</font></th><th>
                                                                            <input type="radio"  id="smc_1" name="smc_constud" value="1" onchange="sbcshow1(this,'smchide');setRequiredField(this.value,'tnsmc,tnsmc1,mpg,mpg1,rnl,rnl1,smcmeet,smconst,smcchairname,smcchairmobile','1');closeInnerIDs(this.value,'banksmc','1')"/><label for="smc_1">YES</label>
                                                                            <input type="radio"  id="smc_2" name="smc_constud" value="0" onchange="sbcshow1(this,'smchide');setRequiredField(this.value,'tnsmc,tnsmc1,mpg,mpg1,rnl,rnl1,smcmeet,smconst,smcchairname,smcchairmobile','1');closeInnerIDs(this.value,'banksmc','0')" checked="checked" /><label for="smc_2">NO</label>
                                                                        </th>
                                                                        <th></th>
                                                                    </tr>
                                                                    
                                                                </table>
                                                            </div>
                                                            
                                                            <div class="form-group col-md-12 smchide">
                                                                <div class="form-group col-md-6"></div>
                                                                <div class="form-group col-md-3">
                                                                    <label><strong>Male</strong></label>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label><strong>Female</strong></label>
                                                                </div>
                                                                <div class="form-group col-md-6"> <label><strong>Total number of members in SMC</strong></label></div>
                                                                <div class="form-group col-md-3">
                                                                    <input type="text" maxlength="3" id="tnsmc" name="smc_tot_membr_mle" onfocus="textvalidate(this.id,'emis_tnsmc_alert');" onchange="textvalidate(this.id,'emis_tnsmc_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                    <font style="color:#dd4b39;"><div id="emis_tnsmc_alert"></div></font>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <input type="text" maxlength="3" id="tnsmc1" name="smc_tot_membr_fmle" onfocus="textvalidate(this.id,'emis_tnsmc1_alert');" onchange="textvalidate(this.id,'emis_tnsmc1_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                    <font style="color:#dd4b39;"><div id="emis_tnsmc1_alert"></div></font>
                                                                </div>
                                                                <div class="form-group col-md-6"> 
                                                                    <label><strong>Members of parents/guardians</strong></label></div>
                                                                    <div class="form-group col-md-3">
                                                                        <input type="text" maxlength="3" id="mpg" name="smc_membr_parnts_mle" onfocus="textvalidate(this.id,'emis_mpg_alert');" onchange="textvalidate(this.id,'emis_mpg_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                        <font style="color:#dd4b39;"><div id="emis_mpg_alert"></div></font>
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <input type="text" maxlength="3" id="mpg1" name="smc_membr_parnts_fmle" onfocus="textvalidate(this.id,'emis_mpg1_alert');" onchange="textvalidate(this.id,'emis_mpg1_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                        <font style="color:#dd4b39;"><div id="emis_mpg1_alert"></div></font>
                                                                    </div>
                                                                    <div class="form-group col-md-6"> 
                                                                        <label><strong>Representatives/nominees from local authority/local Government/urban local body</strong></label>
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <input type="text" maxlength="3" id="rnl" name="smc_reprsnt_loc_auth_mle"  onfocus="textvalidate(this.id,'emis_rnl_alert');" onchange="textvalidate(this.id,'emis_rnl_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                        <font style="color:#dd4b39;"><div id="emis_rnl_alert"></div></font>
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <input type="text" maxlength="3" id="rnl1" name="smc_reprsnt_loc_auth_fmle"  onfocus="textvalidate(this.id,'emis_rnl1_alert');" onchange="textvalidate(this.id,'emis_rnl1_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                        <font style="color:#dd4b39;"><div id="emis_rnl1_alert"></div></font>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <table class="table">
                                                                            <tr>
                                                                                <td>
                                                                                    <label><strong>Members from weaker section and disadvantage group?</strong></label>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" maxlength="3" id="wsdg" name="smc_disadv_grp_mle"  onfocus="textvalidate(this.id,'emis_wsdg_alert');" onchange="textvalidate(this.id,'emis_wsdg_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                                    <font style="color:#dd4b39;"><div id="emis_rnl_alert"></div></font>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" maxlength="3" id="wsdg" name="smc_disadv_grp_fmle"  onfocus="textvalidate(this.id,'emis_wsdg_alert');" onchange="textvalidate(this.id,'emis_wsdg_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                                    <font style="color:#dd4b39;"><div id="emis_rnl1_alert"></div></font>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-12 smchide">
                                                                    <table class="table">
                                                                     <!--<tr class="smchide">
                                                                        <th></th>
                                                                        <th>Male</th>
                                                                        <th>Female</th>
                                                                    </tr>
                                                                    <tr class="smchide">
                                                                        <th>Total number of members in SMC</th>
                                                                        <th><input type="text" maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/></th>
                                                                        <th><input type="text"  maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/></th>
                                                                    </tr>
                                                                    <tr class="smchide">
                                                                        <th>Members of parents/guardians</th>
                                                                        <th><input type="text"  maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/></th>
                                                                        <th><input type="text"  maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/></th>
                                                                    </tr>
                                                                    <tr class="smchide">
                                                                        <th>Represtative/nominees from local authority/local government/urban local body</th>
                                                                        <th><input type="text"  maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/></th>
                                                                        <th><input type="text"  maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/></th>
                                                                    </tr>-->
                                                                    <tr >
                                                                        <th>Number of SMC meetings held during the <u>Previous academic year</u></th>
                                                                        <th></th>
                                                                        <th><input type="text" id="smcmeet" name="mtngs_smc_prev_acdyr" onfocus="textvalidate(this.id,'emis_smcmeet_alert');" onchange="textvalidate(this.id,'emis_smcmeet_alert');"  maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                        <font style="color:#dd4b39;"><div id="emis_smcmeet_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                    
                                                                     <tr >
                                                                        <th>When was SMC constituted?</th>
                                                                        <th><input type="hidden" id="chaingaddress" value="bank_dist_id,smc_bnk_nme,smc_brnch,smc_ifsc,draw_off_code,smdc_bnk_nme,smdc_brnch,smdc_ifsc" /></th>
                                                                        <th>
                                                                            <input type="number" id="smconst" name="management_id"  onfocus="textvalidate(this.id,'emis_smconst_alert');" onchange="textvalidate(this.id,'emis_smconst_alert');"  maxlength="4" min="2000" minlength="1"  max="<?php echo date('Y'); ?>" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                            <!--management_id bigint(20) schoolnew_basicinfo-->
                                                                            <font style="color:#dd4b39;"><div id="emis_smconst_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <th>Whether SMC has prepared the School Development Plan?</th>
                                                                        <th></th>
                                                                        <th>
                                                                            <label for="smcplan_1">YES</label>
                                                                            <input type="radio" id="smcplan_1" name="smc_prep_sdp"/> 
                                                                            <label for="smcplan_2">NO</label>
                                                                            <input type="radio" id="smcplan_2" name="smc_prep_sdp" checked="checked"/>
                                                                        </th>
                                                                    </tr>
                                                                     <tr>
                                                                        <th>Whether Separate Bank Account for SMC is being maintained?</th>
                                                                        <th></th>
                                                                        <th>
                                                                            <label for="smcmaintain_1">YES</label>
                                                                            <input id="smcmaintain_1" value="1" name="sep_bnk_smc_maintnd" onchange="document.getElementById('banksmc').style.display=(this.checked?'':'none');setRequiredField(this.value,'bankdistrict_id,bankname_id,bankbranch_id,bank_ifsccode,smcaccountname,smcano','1')" type="radio"/> 
                                                                            <label for="smcmaintains_2">NO</label>
                                                                            <input type="radio" id="smcmaintain_2" value="0" name="sep_bnk_smc_maintnd" onchange="document.getElementById('banksmc').style.display=(this.checked?'none':'');setRequiredField(this.value,'bankdistrict_id,bankname_id,bankbranch_id,bank_ifsccode,smcaccountname,smcano','1');" checked="checked"/>
                                                                        </th>
                                                                    </tr>
                                                                    
                                                                </table>
                                                            </div>
                                                            <div class="form-group col-md-12" id="banksmc">
                                                                  <table class="table">
                                                                  
                                                                     <tr>
                                                                      
                                                                        <th>Bank District:</th>
                                                                        <th>
                                                                            <select class="form-control" id="bankdistrict_id" name="bank_dist_id" onfocus="textvalidate(this.id,'emis_smcbankdist_alert');" onchange="addressChainDetails(this,'bankname_id',1,'bankdistrict_id='+this.value,'<?php echo base_url() ?>Basic/bankaddressChainDetail/');textvalidate(this.id,'emis_smcbankdist_alert');">
                                                                                <option value="">Choose</option>
                                                                                <?php
                                                                                    foreach($bankdistrict as $bank){
                                                                                ?>
                                                                                        <option value="<?php echo($bank->id); ?>"><?php echo($bank->bank_dist); ?></option>
                                                                                <?php
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                            <font style="color:#dd4b39;"><div id="emis_smcbankdist_alert"></div></font>
                                                                        </th>
                                                                        <th>Bank Name:</th>
                                                                        <th>
                                                                            <select class="form-control" id="bankname_id" name="smc_bnk_nme" onfocus="textvalidate(this.id,'emis_smcbank_alert');" onchange="addressChainDetails(this,'bankbranch_id',2,'bankname_id='+this.value,'<?php echo base_url() ?>Basic/bankaddressChainDetail/');textvalidate(this.id,'emis_smcbank_alert');">
                                                                                <option value="">Choose</option>
                                                                            </select>
                                                                            <font style="color:#dd4b39;"><div id="emis_smcbank_alert"></div></font>
                                                                        </th>
                                                                        <th>Bank Branch</th>
                                                                        <th>
                                                                            <select class="form-control" id="bankbranch_id" name="smc_brnch" onfocus="textvalidate(this.id,'emis_smcbra_alert');" onchange="addressChainDetails(this,'bank_ifsccode',3,'bankbranch_id='+this.value,'<?php echo base_url() ?>Basic/bankaddressChainDetail/');textvalidate(this.id,'emis_smcbra_alert');">
                                                                                <option value="">Choose</option>
                                                                            </select>
                                                                            <font style="color:#dd4b39;"><div id="emis_smcbra_alert"></div></font>
                                                                        </th>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <th>IFS Code:</th>
                                                                        <th><input type="text" class="form-control" id="bank_ifsccode"  onfocus="textvalidate(this.id,'emis_smcifsc_alert');" onchange="textvalidate(this.id,'emis_smcifsc_alert');" name="smc_ifsc" readonly="readonly"/>
                                                                        <font style="color:#dd4b39;"><div id="emis_smcifsc_alert"></div></font>
                                                                        </th>
                                                                        <th>Account holder's Name:</th>
                                                                        <th><input type="text" maxlength="100" id="smc_acc_nme" name="smc_acc_nme"  onfocus="textvalidate(this.id,'emis_smcana_alert');" onchange="textvalidate(this.id,'emis_smcana_alert');" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" class="form-control"/>
                                                                        <font style="color:#dd4b39;"><div id="emis_smcana_alert"></div></font>
                                                                        </th>
                                                                        <th>Account Number:</th>
                                                                        <th><input type="text" maxlength="16" id="smcano" name="smc_acc_no" onfocus="textvalidate(this.id,'emis_smcano_alert');" onchange="textvalidate(this.id,'emis_smcano_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                        <font style="color:#dd4b39;"><div id="emis_smcano_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                     
                                                                    </table>
                                                            </div>
                                                            
                                                            <div class="form-group col-md-12 smchide">
                                                                <table class="table">
                                                                     <tr>
                                                                        <th>
                                                                            <label for="smcchairname"><b>SMC Chairperson Name</b></label>
                                                                         </th>
                                                                         <th>
                                                                            <input type="text" id="smcchairname" name="regis_by_office" onfocus="textvalidate(this.id,'emis_smcchairname_alert');" onchange="textvalidate(this.id,'emis_smcchairname_alert');"  class="form-control" maxlength="40" onkeypress="return  event.charCode >= 97 &amp;&amp; event.charCode <= 122 || event.charCode >= 65 &amp;&amp; event.charCode <= 90 || event.charCode == 32"  />
                                                                            <!--regis_by_office varchar(50) schoolnew_basicinfo-->
                                                                            <font style="color:#dd4b39;"><div id="emis_smcchairname_alert"></div></font>
                                                                         </th> 
                                                                         <th>
                                                                            <label for="smcchairmobile"><b>SMC Chairperson Mobile Number</b></label>
                                                                         </th>
                                                                         <th>
                                                                            <input type="tel" id="smcchairmobile" name="habitation_id" maxlength="10" onfocus="mobilevalidate1(this.id,'emis_smcchairmobile_alert');" onchange="mobilevalidate1(this.id,'emis_smcchairmobile_alert');"  class="form-control" maxlength="10"  onkeypress="return event.charCode >= 48 && event.charCode <= 57"  />
                                                                            <!--habitation_id varchar(50) schoolnew_basicinfo-->
                                                                            <font style="color:#dd4b39;"><div id="emis_smcchairmobile_alert"></div></font>
                                                                         </th> 
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            
                                                            
                                                            
                                                            
                                                                   
                                                                    <div class="form-group col-md-12">
                                                                    <table class="table">
                                                                      <!--<tr>
                                                                        <th class="bg-primary text-white">
                                                                         <i class="fa fa-television"></i>
                                                                        <span class="caption-subject text-white sbold uppercase" >Profile of Schools with Secondary/Higher Secondary Section</span>
                                                                         </th>
                                                                    </tr>-->
                                                                    <!--<tr>
                                                                        <th>Whether School Management Committee (SMC) and School Management and Development
                                                                        <input type="radio" id="smcdc_1" name="smdc" onchange="document.getElementById('smdcconstituted').style.display=(this.checked?'none':'');" checked="checked"><label for="smcdc_1">YES</label>
                                                                        <input type="radio" id="smcdc_2" name="smdc" onchange="document.getElementById('smdcconstituted').style.display=(this.checked?'':'none');" ><label for="smcdc_2">NO</label>
                                                                        </th>
                                                                    </tr>-->
                                                                    
                                                                    <tr>
                                                                        <th>Whether School Management and Development Committee has been constituted? <font style="color:#dd4b39;">*</font></th>
                                                                        <th style="width: 218px;">
                                                                        <input type="radio"  id="smcdcom_1" name="school_code" value="1"  onchange="sbcshow1(this,'smdcdetails');setRequiredField(this.value,'tm,tm1,rpta,rpta1,rnu,rnu1,meb,meb1,mwg,msc,msc1,deo,deo1,ma,ma1,se,se1,teacher,teacher1,vph,vph1,phc,phc1,pcn,pcn1,smdcc,smla,smdcrs,smdcchairname,smdcchairmobile','1');closeInnerIDs(this.value,'smdcbankdetails','1')" ><label for="smcdcom_1">YES</label>
                                                                        <input type="radio"  id="smcdcom_2" name="school_code" value="0" onchange="sbcshow1(this,'smdcdetails');setRequiredField(this.value,'tm,tm1,rpta,rpta1,rnu,rnu1,meb,meb1,mwg,msc,msc1,deo,deo1,ma,ma1,se,se1,teacher,teacher1,vph,vph1,phc,phc1,pcn,pcn1,smdcc,smla,smdcrs,,smdcchairname,smdcchairmobile','1');closeInnerIDs(this.value,'smdcbankdetails','0')" checked="checked"><label for="smcdcom_2">NO</label>
                                                                        <!--school_code bigint(20) schoolnew_basicinfo-->
                                                                        </th>
                                                                    </tr>
                                                                    
                                                                    
                                                                    </table>
                                                                    </div>
                                                                    
                                                                    <div class="form-group col-md-12 smdcdetails">
                                                                    <table class="table">
                                                                    <tr>
                                                                        <th >Details of Members / Representatives</th>
                                                                        <th >Male</th>
                                                                        <th >Female</th>
                                                                    </tr>
                                                                    <tr>
                                                                    <th style="font-weight: normal !important;">Total Members</th>
                                                                    <th><input type="text"  maxlength="3" id="tm" name="smdc_tot_membr_m" onfocus="textvalidate(this.id,'emis_tm_alert');" onchange="textvalidate(this.id,'emis_tm_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control">
                                                                    <font style="color:#dd4b39;"><div id="emis_tm_alert"></div></font>
                                                                    </th>
                                                                    <th><input type="text" maxlength="3" id="tm1" name="smdc_tot_membr_f" onfocus="textvalidate(this.id,'emis_tm1_alert');" onchange="textvalidate(this.id,'emis_tm1_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control">
                                                                    <font style="color:#dd4b39;"><div id="emis_tm1_alert"></div></font>
                                                                    </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th> Representatives from Parents / Guardians / PTA</th>
                                                                        <th><input type="text" maxlength="3" id="rpta" name="smdc_noof_repr_pta_m" onfocus="textvalidate(this.id,'emis_rpta_alert');" onchange="textvalidate(this.id,'emis_rpta_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control">
                                                                        <font style="color:#dd4b39;"><div id="emis_rpta_alert"></div></font>
                                                                        </th>
                                                                        <th><input type="text" maxlength="3" id="rpta1" name="smdc_noof_repr_pta_f" onfocus="textvalidate(this.id,'emis_rpta1_alert');" onchange="textvalidate(this.id,'emis_rpta1_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control">
                                                                        <font style="color:#dd4b39;"><div id="emis_rpta1_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Representatives / Nominees from Local Government / Urban Local Body</th>
                                                                        <th><input type="text" maxlength="3" id="rnu" name="smdc_noof_repr_lcbdy_m" onfocus="textvalidate(this.id,'emis_rnu_alert');" onchange="textvalidate(this.id,'emis_rnu_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control">
                                                                        <font style="color:#dd4b39;"><div id="emis_rnu_alert"></div></font>
                                                                        </th>
                                                                        <th><input type="text" onfocus="textvalidate(this.id,'emis_rnu1_alert');" onchange="textvalidate(this.id,'emis_rnu1_alert');"  id="rnu1" name="smdc_noof_repr_lcbdy_f" maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control">
                                                                        <font style="color:#dd4b39;"><div id="emis_rnu1_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                    
                                                                     <tr>
                                                                        <th>Members from Educationally Backward Minority Community</th>
                                                                        <th><input type="text" maxlength="3" id="meb" name="smdc_noof_mebrs_edubckmin_m" onfocus="textvalidate(this.id,'emis_meb_alert');" onchange="textvalidate(this.id,'emis_meb_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control">
                                                                        <font style="color:#dd4b39;"><div id="emis_meb_alert"></div></font>
                                                                        </th>
                                                                        <th><input type="text" maxlength="3" id="meb1" name="smdc_noof_mebrs_edubckmin_f" onfocus="textvalidate(this.id,'emis_meb1_alert');" onchange="textvalidate(this.id,'emis_meb1_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control">
                                                                        <font style="color:#dd4b39;"><div id="emis_meb1_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <th>Members from any Women's Group</th>
                                                                        <th></th>
                                                                        <th><input type="text" maxlength="3" id="mwg" name="smdc_noof_mebrs_wms_f" onfocus="textvalidate(this.id,'emis_mwg_alert');" onchange="textvalidate(this.id,'emis_mwg_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control">
                                                                        <font style="color:#dd4b39;"><div id="emis_mwg_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Members from SC / ST Community</th>
                                                                        <th><input type="text" maxlength="3" id="msc" name="smdc_noof_mebrs_scst_m" onfocus="textvalidate(this.id,'emis_msc_alert');" onchange="textvalidate(this.id,'emis_msc_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                        <font style="color:#dd4b39;"><div id="emis_msc_alert"></div></font>
                                                                        </th>
                                                                        <th><input type="text" maxlength="3" id="msc1" name="smdc_noof_mebrs_scst_f" onfocus="textvalidate(this.id,'emis_msc1_alert');" onchange="textvalidate(this.id,'emis_msc1_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                        <font style="color:#dd4b39;"><div id="emis_msc1_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                                                                                        
                                                                    
                                                                    <tr>
                                                                        <th>Nominees from the District Educational Office (DEO)</th>
                                                                        <th><input type="text" maxlength="3" id="deo" name="smdc_noof_nmines_deo_m" onfocus="textvalidate(this.id,'emis_deo_alert');" onchange="textvalidate(this.id,'emis_deo_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                        <font style="color:#dd4b39;"><div id="emis_deo_alert"></div></font>
                                                                        </th>
                                                                        <th><input type="text" maxlength="3" id="deo1" name="smdc_noof_nmines_deo_f" onfocus="textvalidate(this.id,'emis_deo1_alert');" onchange="textvalidate(this.id,'emis_deo1_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                        <font style="color:#dd4b39;"><div id="emis_deo1_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Members from Audit and Accounts Department (AAD)</th>
                                                                        <th><input type="text" maxlength="3" id="ma" name="smdc_noof_nmines_aad_m" onfocus="textvalidate(this.id,'emis_ma_alert');" onchange="textvalidate(this.id,'emis_ma_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                        <font style="color:#dd4b39;"><div id="emis_ma_alert"></div></font>
                                                                        </th>
                                                                        <th><input type="text" maxlength="3" id="ma1" name="smdc_noof_nmines_aad_f" onfocus="textvalidate(this.id,'emis_ma1_alert');" onchange="textvalidate(this.id,'emis_ma1_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                        <font style="color:#dd4b39;"><div id="emis_ma1_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <th>Subject experts (each one from Science, Humanities and Arts / Crafts / Culture) nominated by District Programme Co-ordinator (RMSA)</th>
                                                                        <th><input type="text" maxlength="3" id="se" name="smdc_noof_subjt_exp_m" onfocus="textvalidate(this.id,'emis_se_alert');" onchange="textvalidate(this.id,'emis_se_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                        <font style="color:#dd4b39;"><div id="emis_se_alert"></div></font>
                                                                        </th>
                                                                        <th><input type="text" maxlength="3" id="se1" name="smdc_noof_subjt_exp_f" onfocus="textvalidate(this.id,'emis_se1_alert');" onchange="textvalidate(this.id,'emis_se1_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                        <font style="color:#dd4b39;"><div id="emis_se1_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <th>Teachers (one each from Social Science, Science and Mathematics) of the School</th>
                                                                        <th><input type="text" maxlength="3" id="teacher" name="smdc_noof_techrs_m" onfocus="textvalidate(this.id,'emis_t_alert');" onchange="textvalidate(this.id,'emis_t_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                        <font style="color:#dd4b39;"><div id="emis_t_alert"></div></font>
                                                                        </th>
                                                                        <th><input type="text" maxlength="3" id="teacher1" name="smdc_noof_techrs_f" onfocus="textvalidate(this.id,'emis_t1_alert');" onchange="textvalidate(this.id,'emis_t1_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                        <font style="color:#dd4b39;"><div id="emis_t1_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <th>Vice-Principal / Asst. Headmaster, as a member</th>
                                                                        <th><input type="text" maxlength="3" id="vph" name="block1" onfocus="textvalidate(this.id,'emis_vph_alert');" onchange="textvalidate(this.id,'emis_vph_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                        <!--block1 bigint(20) schoolnew_basicinfo-->
                                                                        <font style="color:#dd4b39;"><div id="emis_vph_alert"></div></font>
                                                                        </th>
                                                                        <th><input type="text" maxlength="3" id="vph1" name="district1" onfocus="textvalidate(this.id,'emis_vph1_alert');" onchange="textvalidate(this.id,'emis_vph1_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                        <!--district1 bigint(20) schoolnew_basicinfo-->
                                                                        <font style="color:#dd4b39;"><div id="emis_vph1_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                    <th>Principal / Headmaster, as Chairperson</th>
                                                                    <th><input type="text" maxlength="3" id="phc" name="smdc_prnclorhm_cp_m" onfocus="textvalidate(this.id,'emis_phc_alert');" onchange="textvalidate(this.id,'emis_phc_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" />
                                                                    <font style="color:#dd4b39;"><div id="emis_phc_alert"></div></font>
                                                                    </th>
                                                                    <th><input type="text" maxlength="3" id="phc1" name="smdc_prnclorhm_cp_f" onfocus="textvalidate(this.id,'emis_phc1_alert');" onchange="textvalidate(this.id,'emis_phc1_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" />
                                                                    <font style="color:#dd4b39;"><div id="emis_phc1_alert"></div></font>
                                                                    </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Chairperson (If Principal / Headmaster is not the Chairperson)</th>
                                                                        <th><input type="text" maxlength="3" id="pcn" name="smdc_chrprsn_m" onfocus="textvalidate(this.id,'emis_pcn_alert');" onchange="textvalidate(this.id,'emis_pcn_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" />
                                                                        <font style="color:#dd4b39;"><div id="emis_pcn_alert"></div></font>
                                                                        </th>
                                                                        <th><input type="text" maxlength="3" id="pcn1" name="smdc_chrprsn_f" onfocus="textvalidate(this.id,'emis_pcn1_alert');" onchange="textvalidate(this.id,'emis_pcn1_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" />
                                                                        <font style="color:#dd4b39;"><div id="emis_pcn1_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                    </table>
                                                                    </div>
                                                                    
                                                                   
                                                                    
                                                                   
                                                                    
                                                                     
                                                                    
                                                                    <div class="form-group col-md-12 smdcdetails">
                                                                     <table class="table">
                                                                     <tr >
                                                                        <th>Year in which the SMDC was constituted?</th>
                                                                        
                                                                        <th><input type="text"  maxlength="4" min="2000"  max="<?php echo date('Y'); ?>" onkeydown="return restlength(this)" onblur="return restlength(this)" id="smdcc" name="mgt_regis_no" onfocus="textvalidate(this.id,'emis_smdcc_alert');" onchange="textvalidate(this.id,'emis_smdcc_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                        <!--mgt_regis_no varchar(20) schoolnew_basicinfo-->
                                                                        <font style="color:#dd4b39;"><div id="emis_smdcc_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Number of SMDC meetings held during the last academic year</th>
                                                                        <th><input type="text" maxlength="3" id="smla" name="smdc_metng_lstacd_yr" onfocus="textvalidate(this.id,'emis_smla_alert');" onchange="textvalidate(this.id,'emis_smla_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control">
                                                                        <font style="color:#dd4b39;"><div id="emis_smla_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Whether SMDC has prepared School Improvement Plan?
                                                                        
                                                                        </th>
                                                                        <th>
                                                                        <input type="radio" id="smdcplan_1" name="smdc_prpd_schl_imprv" value="1" /><label for="smdcplan_1">YES</label>
                                                                        <input type="radio" id="smdcplan_2" name="smdc_prpd_schl_imprv" value="0" checked="checked" /><label for="smdcplan_2">NO</label>
                                                                        </th>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Whether separate Bank Account for SMDC is being maintained?
                                                                        
                                                                    <th>
                                                                        <input type="radio" id="smdbmain_1" value="1" name="sep_bnk_smdc_maintnd" onchange="document.getElementById('smdcbankdetails').style.display=(this.checked?'':'none');setRequiredField(this.value,'smdcbankdistrict_id,smdcbankname_id,smdcbankbranch_id,smdcbank_ifsccode,smdcana,smdcano,smdcrs','1')"><label for="smdbmain_1">YES</label>
                                                                        <input type="radio" id="smdbmain_2" value="0" name="sep_bnk_smdc_maintnd" onchange="document.getElementById('smdcbankdetails').style.display=(this.checked?'none':'');setRequiredField(this.value,'smdcbankdistrict_id,smdcbankname_id,smdcbankbranch_id,smdcbank_ifsccode,smdcana,smdcano,smdcrs','1')" checked="checked"><label for="smdbmain_2">NO</label></th>
                                                                    </th>
                                                                    </tr>
                                                                    </table>
                                                                    </div>
                                                                    
                                                                    
                                                                    
                                                                    <div class="form-group col-md-12" id="smdcbankdetails">
                                                                
                                                                 <table class="table table-borderless">
                                                                  <thead></thead>
                                                                    <tbody>
                                                                     <tr>
                                                                      
                                                                        <td>Bank District:</td>
                                                                        <td>
                                                                            <select class="form-control" id="smdcbankdistrict_id" name="draw_off_code" onfocus="textvalidate(this.id,'emis_smdcbd_alert');" onchange="addressChainDetails(this,'smdcbankname_id',1,'bankdistrict_id='+this.value,'<?php echo base_url() ?>Basic/bankaddressChainDetail/');textvalidate(this.id,'emis_smdcbd_alert');">
                                                                                <option value="">Choose</option>
                                                                                <?php
                                                                                    foreach($bankdistrict as $bank){
                                                                                ?>
                                                                                        <option value="<?php echo($bank->id); ?>"><?php echo($bank->bank_dist); ?></option>
                                                                                <?php
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                             <!--draw_off_code varchar(10) schoolnew_basicinfo-->
                                                                            <font style="color:#dd4b39;"><div id="emis_smdcbd_alert"></div></font>
                                                                        </td>
                                                                        <td>Bank Name:</td>
                                                                        <td>
                                                                            <select class="form-control" id="smdcbankname_id" name="smdc_bnk_nme" onfocus="textvalidate(this.id,'emis_smdcbank_alert');" onchange="addressChainDetails(this,'smdcbankbranch_id',2,'bankname_id='+this.value,'<?php echo base_url() ?>Basic/bankaddressChainDetail/');textvalidate(this.id,'emis_smdcbank_alert');">
                                                                                <option value="">Choose</option>
                                                                            </select>
                                                                            <font style="color:#dd4b39;"><div id="emis_smdcbank_alert"></div></font>
                                                                        </td>
                                                                        <td>Bank Branch</td>
                                                                        <td>
                                                                            <select class="form-control" id="smdcbankbranch_id" name="smdc_brnch" onfocus="textvalidate(this.id,'emis_smdcbra_alert');" onchange="addressChainDetails(this,'smdcbank_ifsccode',3,'bankbranch_id='+this.value,'<?php echo base_url() ?>Basic/bankaddressChainDetail/');textvalidate(this.id,'emis_smdcbra_alert');">
                                                                                <option value="">Choose</option>
                                                                            </select>
                                                                            <font style="color:#dd4b39;"><div id="emis_smdcbra_alert"></div></font>
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>IFS Code:</td>
                                                                        <td><input type="text" class="form-control" id="smdcbank_ifsccode" name="smdc_ifsc"  onfocus="textvalidate(this.id,'emis_smdcifsc_alert');" onchange="textvalidate(this.id,'emis_smdcifsc_alert');" readonly="readonly"/>
                                                                        <font style="color:#dd4b39;"><div id="emis_smdcifsc_alert"></div></font>
                                                                        </td>
                                                                        <td>Account Name:</td>
                                                                        <td><input type="text" maxlength="100" id="smdcana" name="smdc_acc_nme"onfocus="textvalidate(this.id,'emis_smdcana_alert');" onchange="textvalidate(this.id,'emis_smdcana_alert');"  onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" class="form-control"/>
                                                                        <font style="color:#dd4b39;"><div id="emis_smdcana_alert"></div></font>
                                                                        </td>
                                                                        <td>Account Number:</td>
                                                                        <td><input type="text" maxlength="16" id="smdcano" name="smdc_acc_no" onfocus="textvalidate(this.id,'emis_smdcano_alert');" onchange="textvalidate(this.id,'emis_smdcano_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                        <font style="color:#dd4b39;"><div id="emis_smdcano_alert"></div></font>
                                                                        </td>
                                                                    </tr>
                                                                     </tbody>
                                                                    </table>
                                                            </div>
                                                            
                                                                 <div class="form-group col-md-12 smdcdetails">
                                                                
                                                                 <table class="table">
                                                                     <tr>
                                                                
                                                                 <th>SMDC Contribution (in Rs.)</th>
                                                                <th>
                                                                <input type="text" maxlength="8" id="smdcrs" name="authenticate_3" onfocus="textvalidate(this.id,'emis_smdcrs_alert');" onchange="textvalidate(this.id,'emis_smdcrs_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control">
                                                                <!--authenticate_3 varchar(30) schoolnew_basicinfo-->
                                                                <font style="color:#dd4b39;"><div id="emis_smdcrs_alert"></div></font>
                                                                </th>
                                                                <th>
                                                                            <label for="smdcchairname"><b>SMDC Chairperson Name</b></label>
                                                                         </th>
                                                                         <th>
                                                                             <input type="text" id="smdcchairname" name="mgt_name" onfocus="textvalidate(this.id,'emis_smdcchairname_alert');" onchange="textvalidate(this.id,'emis_smdcchairname_alert');"  class="form-control" maxlength="40" onkeypress="return  event.charCode >= 97 &amp;&amp; event.charCode <= 122 || event.charCode >= 65 &amp;&amp; event.charCode <= 90 || event.charCode == 32"  />
                                                                             <!--mgt_name varchar(50) schoolnew_basicinfo-->
                                                                            <font style="color:#dd4b39;"><div id="emis_smdcchairname_alert"></div></font>
                                                                         </th> 
                                                                         <th>
                                                                            <label for="smdcchairmobile"><b>SMDC Chairperson Mobile Number</b></label>
                                                                         </th>
                                                                         <th>
                                                                             <input type="tel" id="smdcchairmobile" name="mgt_type" maxlength="10" onfocus="mobilevalidate1(this.id,'emis_smdcchairmobile_alert');" onchange="mobilevalidate1(this.id,'emis_smdcchairmobile_alert');"  class="form-control" maxlength="10"  onkeypress="return event.charCode >= 48 && event.charCode <= 57"  />
                                                                            <!--mgt_type varchar(50) schoolnew_basicinfo-->
                                                                            <font style="color:#dd4b39;"><div id="emis_smdcchairmobile_alert"></div></font>
                                                                         </th> 
                                                                 </tr>
                                                                 </table>
                                                                 </div>
                                                            
                                                            <div class="form-group col-md-12">
                                                                
                                                                 <table class="table">
                                                                  
                                                                     <tr>
                                                                        <th >Whether the School Building Committee (SBC) has been constituted? <font style="color:#dd4b39;">*</font></th>
                                                                        <th style="width: 218px;">
                                                                        <input type="radio" id="sbc_1" name="sbc_constitd" value="1" onchange="sbcshow1(this,'sbcdetails');setRequiredField(this.value,'sbcy','1')"><label for="sbc_1">YES</label>
                                                                        <input type="radio" id="sbc_2" name="sbc_constitd" value="0" onchange="sbcshow1(this,'sbcdetails');setRequiredField(this.value,'sbcy','1')" checked="checked"><label for="sbc_2">NO</label>
                                                                        </th>
                                                                        <th class="sbcdetails"><label for="year"><b>Year</b></label></th>
                                                                        <th class="sbcdetails"><input type="number" id="sbcy" name="mgt_opn_year" maxlength="4" onfocus="textvalidate(this.id,'emis_sbcy_alert');" onchange="textvalidate(this.id,'emis_sbcy_alert');"  min="1947" max="<?php echo date('Y'); ?>" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" placeholder="1947"/>
                                                                        <!--mgt_opn_year varchar(25) schoolnew_basicinfo-->
                                                                        <font style="color:#dd4b39;"><div id="emis_sbcy_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                    </tr>
                                                                     
                                                                   </table>
                                                                   
                                                                    <table class="table">
                                                                  
                                                                     <tr>
                                                                        <th>Whether the School has constituted its Academic Committee (AC)? <font style="color:#dd4b39;">*</font></th>
                                                                        <th style="width: 218px;">
                                                                        <input type="radio" id="ac_1" name="authenticate_2" value="1" onchange="sbcshow1(this,'sacdetails');setRequiredField(this.value,'acy','1')"><label for="ac_1">YES</label>
                                                                        <input type="radio" id="ac_2" name="authenticate_2" value="0" onchange="sbcshow1(this,'sacdetails');setRequiredField(this.value,'acy','1')" checked="checked"><label for="ac_2">NO</label>
                                                                        <!--authenticate_2 varchar(30) schoolnew_basicinfo-->
                                                                        </th>
                                                                        <th class="sacdetails"><label for="year"><b>Year</b></label></th>
                                                                        <th class="sacdetails"><input type="number" id="acy" name="chk_manage" onfocus="textvalidate(this.id,'emis_acy_alert');" onchange="textvalidate(this.id,'emis_acy_alert');"  class="form-control" maxlength="4" min="1947"  max="<?php echo date('Y'); ?>" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" placeholder="1947"/>
                                                                        <!--chk_manage int(11) schoolnew_basicinfo-->
                                                                        <font style="color:#dd4b39;"><div id="emis_acy_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                                                                                         
                                                                   </table>
                                                                   </div>
                                                                   <div class="form-group col-md-12">
                                                                    <table class="table">
                                                                  
                                                                     <tr>
                                                                        <th colspan="3">Whether the School has constituted its Parent-Teacher Association (PTA)? <font style="color:#dd4b39;">*</font></th>
                                                                        <th style="width: 218px;">
                                                                        <input type="radio" id="pta_1" value="1" name="chk_dept" onchange="sbcshow1(this,'ptadetails');setRequiredField(this.value,'ptay,ptam,ptaregno,ptaamount,ptachairname,ptachairmobile','1')" /><label for="pta_1">YES</label>
                                                                        <input type="radio" id="pta_2" value="0" name="chk_dept" onchange="sbcshow1(this,'ptadetails');setRequiredField(this.value,'ptay,ptam,ptaregno,ptaamount,ptachairname,ptachairmobile','1')" checked="checked"><label for="pta_2">NO</label>
                                                                        <!--chk_dept int(11) schoolnew_basicinfo-->
                                                                        </th>
                                                                        
                                                                    </tr>
                                                                    <tr class="ptadetails">
                                                                      <th>
                                                                        <label for="year"><b>PTA Established Year</b></label>
                                                                      </th>
                                                                      <th>
                                                                        <input type="number" id="ptay" name="pta_esta" onfocus="textvalidate(this.id,'emis_ptay_alert');" onchange="textvalidate(this.id,'emis_ptay_alert');" min="1947" max="<?php echo date('Y'); ?>" class="form-control" maxlength="4" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" placeholder="1947"/>
                                                                        <font style="color:#dd4b39;"><div id="emis_ptay_alert"></div></font>
                                                                      </th>
                                                                      <th>
                                                                        <label for="number"><b>Number of PTA meetings held during the last academic year:</b></label>
                                                                      </th>
                                                                      <th>
                                                                         <input type="text" maxlength="2" id="ptam" name="pta_metng_hld_yr" onfocus="textvalidate(this.id,'emis_ptam_alert');" onchange="textvalidate(this.id,'emis_ptam_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  class="form-control"/>
                                                                         
                                                                         <font style="color:#dd4b39;"><div id="emis_ptam_alert"></div></font>
                                                                      </th>
                                                                         
                                                                    </tr>
                                                                    <tr class="ptadetails">
                                                                        <th>
                                                                            <label for="ptaregno"><b>PTA Registration No.</b></label>
                                                                         </th>
                                                                         <th>
                                                                             <input type="text" id="ptaregno" name="pta_no" onfocus="textvalidate(this.id,'emis_ptaregno_alert');" onchange="textvalidate(this.id,'emis_ptaregno_alert');"  class="form-control" maxlength="20" minlength="1" min="0" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return (event.charCode >=48 && event.charCode <=57) || (event.charCode >= 96 && event.charCode <= 123) || (event.charCode >= 64 && event.charCode <= 91) || event.charCode == 8 || event.charCode == 32" class="form-control" />
                                                                            <!--pta_no varchar(25) schoolnew_basicinfo-->
                                                                            <font style="color:#dd4b39;"><div id="emis_ptaregno_alert"></div></font>
                                                                         </th> 
                                                                         <th>
                                                                            <label for="ptaamount"><b>Academic Year for Last PTA Subscription Paid</b></label>
                                                                         </th>
                                                                         <th>
                                                                             <input type="number" id="ptaamount" name="pta_sub_yr" min="<?php echo (date('Y',strtotime('now - 10Years'))); ?>" max="<?php echo (date('Y',strtotime('now'))); ?>"  class="form-control" maxlength="4" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" />
                                                                            <!--pta_sub_yr varchar(25) schoolnew_basicinfo-->
                                                                            <font style="color:#dd4b39;"><div id="emis_ptaamount_alert"></div></font>
                                                                         </th> 
                                                                    </tr>
                                                                    
                                                                    <tr class="ptadetails">
                                                                        <th>
                                                                            <label for="ptachairname"><b>PTA Chairperson Name</b></label>
                                                                         </th>
                                                                         <th>
                                                                             <input type="text" id="ptachairname" name="mgt_address" onfocus="textvalidate(this.id,'emis_ptachairname_alert');" onchange="textvalidate(this.id,'emis_ptachairname_alert');"  class="form-control" maxlength="40" onkeypress="return  event.charCode >= 97 &amp;&amp; event.charCode <= 122 || event.charCode >= 65 &amp;&amp; event.charCode <= 90 || event.charCode == 32"  />
                                                                            <!--mgt_address varchar(250) schoolnew_basicinfo-->
                                                                            <font style="color:#dd4b39;"><div id="emis_ptachairname_alert"></div></font>
                                                                         </th> 
                                                                         <th>
                                                                            <label for="ptachairmobile"><b>PTA Chairperson Mobile Number</b></label>
                                                                         </th>
                                                                         <th>
                                                                             <input type="tel" id="ptachairmobile" name="build_status" maxlength="10" onfocus="mobilevalidate1(this.id,'emis_ptachairmobile_alert');" onchange="mobilevalidate1(this.id,'emis_ptachairmobile_alert');"  class="form-control" maxlength="10"  onkeypress="return event.charCode >= 48 && event.charCode <= 57"  />
                                                                             <!--build_status varchar(30) schoolnew_basicinfo-->
                                                                            <font style="color:#dd4b39;"><div id="emis_ptachairmobile_alert"></div></font>
                                                                         </th> 
                                                                    </tr>
                                                                     
                                                                   </table>
                                                            </div>
                                                            
                                                    
                                                            
                                                            </div>
                                                            </div>
                                                     
                                                </div>
                                                <?php if($this->uri->segment(4,0)==0) { ?>
                                                <div class="form-row text-center">
                                                    <?php if($this->uri->segment(4,0)=='success' && $this->uri->segment(4,0)!=''){ ?>
                                                    <div class="form-group col-md-9">
                                                        <button type="button" class="btn btn-primary" onclick="return checkRequired(this.parentNode.parentNode.parentNode.id);">Submit</button>
                                                        <button type="button" onclick="location.href='<?php echo $_SERVER['PHP_SELF'];?>'" class="btn default">Cancel</button>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <button type="button" class="btn btn-primary" onclick="location.href='<?php echo substr($_SERVER['PHP_SELF'], 0, -10)."/".(substr($_SERVER['PHP_SELF'], 53, -8)+1);?>'">NEXT</button>
                                                    </div>
                                                    <?php }
                                                        else{ 
                                                    ?>
                                                    <div class="form-group col-md-12">
                                                        <button type="button" class="btn btn-primary" onclick="return checkRequired(this.parentNode.parentNode.parentNode.id);">Submit</button>
                                                        <button type="button" onclick="location.href='<?php echo $_SERVER['PHP_SELF'];?>'" class="btn default">Cancel</button>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                                <?php } ?>
                                                <button style="visibility:hidden;">DDDD</button>
                                                                                                                             
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
    <script src="<?php echo base_url().'asset/js/vivekrao/generate.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/js/vivekrao/jsonpost.js';?>" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <!-- END PAGE LEVEL SCRIPTS --> 
    
    <script>
        //document.getElementById('textbookdetails').style.visibility='hidden';
        //document.getElementById('smdcconstituted').style.display='none';
        document.getElementById('banksmc').style.display='none';
       
        document.getElementById('smdcbankdetails').style.display='none';
        //document.getElementById('ptadetails').style.display='none';
        
        sbcshow1(document.getElementById('pta_2'),'ptadetails');
        sbcshow1(document.getElementById('smcdcom_2'),'smdcdetails');
        sbcshow1(document.getElementById('sbc_2'),'sbcdetails');
        sbcshow1(document.getElementById('ac_2'),'sacdetails');
        sbcshow1(document.getElementById('smc_2'),'smchide');
        
        
        
        
        
        
        /*function sbcshow1(sbc,sbcclass) {
           
            var x =document.getElementsByClassName(sbcclass);
            if(sbc.value==0){
                for(var i=0;i<x.length;i++) {
                    //alert(x[i]);
                    x[i].style.display='none';
                }
            }else {
                
                for(var i=0;i<x.length;i++) {
                    //alert(x[i]);
                    x[i].style.display='';
                }
                
            }
            
        }*/
        
        
       /* sac_1(document.getElementById('ac_2'));
        function sac_1(ac) {
            
            var y= document.getElementsByClassName('sacdetails');
            if(ac.value==0) {
                
                for(var i=0;i<y.length;i++){
                    alert(y[i]);
                    y[i].style.display='none';
                }
            }else {
                alert('hi');
                for(var i=0;i<y.length;i++){
                    alert(y[i]);
                    y[i].style.display='';
                }
            }
            
        }*/
        
        
        
    </script>
    <button style="visibility:hidden;">DDDD</button>
</body>
</html>