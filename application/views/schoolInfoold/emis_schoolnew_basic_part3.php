<!DOCTYPE html>

<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <?php $this->load->view('head.php'); ?>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="/css" />
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
                                            <form id="emis_schoolnew_basic_part3" method="post" action="<?php echo base_url().'Basic/schoolupdation/'.$this->uri->segment(3,0);?>">
                                                <div class="portlet light portlet-fit ">
                                                <?php $this->load->view('schoolInfo/supportHeader'); ?>
                                                    <div class="portlet-title">
                                                        <div class="caption col-md-9">
                                                            <i class="fa fa-building font-dark"></i>
                                                            <span class="caption-subject font-dark sbold uppercase">School Details - Part III</span>
                                                        </div>
                                                        <?php 
                                                            if($profile[0]['part_3']==1){
                                                        ?>
                                                       <div class="col-md-3">
                                                            <button type="button" class="btn btn-primary" onclick="postRequest(createJSON(this.form),'<?php echo base_url().'Basic/getPartInformationByPost/'.$this->uri->segment(4,0);?>',this.form);">VIEW/EDIT</button>
                                                        </div>
                                                        <?php } ?>
                                                    </div> 
                                                    
                                                   <div class="portlet-body">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th colspan="6" class="bg-primary text-white">
                                                                         <i class="fa fa-television"></i>
                                                                        <span class="caption-subject text-white sbold uppercase" >School Days and Hours Details</span>
                                                                         </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Category <font style="color:#dd4b39;">*</font></th>
                                                                        <th style="width:1px;">Number of Instructional days <font style="color:#dd4b39;">*</font></th>
                                                                        <th>Working Hours for<br />Children (per day)<br/>(HH:MM) <font style="color:#dd4b39;">*</font></th>
                                                                        <th>Working Hours for<br />Teachers (per day)<br/>(HH:MM) <font style="color:#dd4b39;">*</font></th>
                                                                        <th>Whether Continuous Comprehensive <br/>Evaluation (CCE) implemented? <font style="color:#dd4b39;">*</font></th>
                                                                        <th>Add (+) &nbsp;&nbsp; Delete (-)</th>
                                                                        <input type="hidden" id="hiddenhours_0" name="hiddenhours_0" value="schoolnew_dayswork_entry" />
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            <select class="form-control" id="sch_0" name="sch_0" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="selectionValidation(this,this.parentNode.parentNode);textvalidate(this.id,this.nextElementSibling.id);" required>
                                                                                <option value="">Choose</option>
                                                                                <option value="1">Pre Primary</option>
                                                                                <option value="2">Primary</option>
                                                                                <option value="3">Upper Primary</option>
                                                                                <option value="4">Secondary</option>
                                                                                <option value="5">Higher Secondary</option>
                                                                            </select>
                                                                            <div id="emiscategory_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        <th><input type="number" id="instructdays_0" name="instructdays_0" min="0" max="300" onkeydown="return restlength(this)" onblur="return restlength(this)" minlength="1" maxlength="3" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" required/>
                                                                         <div id="emisidays_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                         <th><input type="time" id="childrenhours_0" name="childrenhours_0" min="00:00" max="12:00"  onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);" value="00:00" class="form-control" required />
                                                                         <div id="whchild_0" style="color:#dd4b39;"></div>
                                                                         </th>
                                                                         <th><input type="time" id="teacherhours_0" name="teacherhours_0" min="00:00" max="12:00" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);"  value="00:00" class="form-control" required />
                                                                         <div id="emis_workhrsteach_0" style="color:#dd4b39;"></div>
                                                                         </th>
                                                                         <th>
                                                                            <div id="ccesch_0">
                                                                                <label style="visibility:hidden;">sad</label>
                                                                                <label class="custom-control-label" for="cce_1">YES</label>
                                                                                <input type="radio" class="custom-control-input" id="ccesch_0" name="ccesh_0" value="1" onchange="updateRadioCheck(this,this.parentNode.nextElementSibling);" />
                                                                                <label class="custom-control-label" for="cce_2">NO</label>
                                                                                <input type="radio" class="custom-control-input" id="ccesch_1" name="ccesh_0" value="0" onchange="updateRadioCheck(this,this.parentNode.nextElementSibling);" checked="checked" />
                                                                            </div>
                                                                            <div id="cceschools_0" class="viewOnCheck">
                                                                                <div>
                                                                                    <label for="cr"><strong>Are Cumulative Records maintained?</strong></label><br />
                                                                                    <label class="custom-control-label" for="crm_1">YES</label>
                                                                                    <input type="radio" class="custom-control-input"  id="crm_0" name="crm_0" value="1" onchange="updateRadioCheck(this,null)"  />
                                                                                    <label class="custom-control-label" for="crm_2">NO</label>
                                                                                    <input type="radio" class="custom-control-input"  id="crm_1" name="crm_0" value="0" onchange="updateRadioCheck(this,null)" checked="checked"  />
                                                                                </div>
                                                                                <div>
                                                                                    <label for="cr"><strong>Are Cumulative Records Shared with parents?</strong></label><br />
                                                                                    <label class="custom-control-label" for="crs_1">YES</label>
                                                                                    <input type="radio" class="custom-control-input"  id="crs_0" name="crs_0" value="1" onchange="updateRadioCheck(this,null)" />
                                                                                    <label class="custom-control-label" for="crs_2">NO</label>
                                                                                    <input type="radio" class="custom-control-input"  id="crs_1" name="crs_0" value="0" onchange="updateRadioCheck(this,null)" checked="checked" />
                                                                                </div>
                                                                            </div>
                                                                        </th> 
                                                                        <th>
                                                                            <button type="button" id="btninstructdays_0" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,1);updateDiv(this.parentNode.parentNode);"><i class="fa fa-plus"></i></button>&nbsp;&nbsp;
                                                                            <button type="button" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,0);updateDiv(this.parentNode.parentNode);"><i class="fa fa-minus"></i></button>
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            
                                                            <div class="form-group col-md-12">
                                                            
                                                                <table class="table">
                                                                    <tr>
                                                                       <th>When does the Academic Session start? Please indicate the month: <font style="color:#dd4b39;">*</font></th>
                                                                        <th><select class="form-control" id="sptass" name="acd_sess_mnth" required>
                                                                        <!--<option value=""></option>-->
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
                                                                        
                                                                        </select></th>
                                                                        <th></th>

                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            
                                                             <div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th colspan="3" class="bg-primary text-white">
                                                                         <i class="fa fa-television"></i>
                                                                        <span class="caption-subject text-white sbold uppercase" >School Special Training Center Details</span>
                                                                         </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Whether any child enrolled in the School is attending Special Training? <font style="color:#dd4b39;">*</font>
                                                                        <input type="radio"  id="spt_1" name="pri_schl" value="1" onchange="document.getElementById('specialtraining').style.display=(this.checked?'':'none');setRequiredField(this.value,'sptcyb,sptcyg,sptcby,sptstc,sptttbc','1')" /><label for="spt_1">YES</label>
                                                                        <input type="radio"  id="spt_2" name="pri_schl" value="0" onchange="document.getElementById('specialtraining').style.display=(this.checked?'none':'');setRequiredField(this.value,'sptcyb,sptcyg,sptcby,sptstc,sptttbc','1')" checked="checked" /><label for="spt_2">NO</label>
                                                                        <!--pri_schl int(11) schoolnew_academicinfo2-->
                                                                        </th>
                                                                    </tr>
                                                                    
                                                                </table>
                                                            </div>
                                                            
                                                            <div class="form-group col-md-12" id="specialtraining">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>Boys</th>
                                                                        <th>Girls</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>No. of children provided Special Training in the Current Academic Year</th>
                                                                        <th><input type="number" min="0" maxlength="4" max="9999" id="sptcyb" name="no_chldrs_spectrng_utsep30_b" onfocus="textvalidate(this.id,'emis_stcyb_alert');" onchange="textvalidate(this.id,'emis_stcyb_alert');" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control">
                                                                        <font style="color:#dd4b39;"><div id="emis_stcyb_alert"></div></font>
                                                                        </th>
                                                                        <th><input type="number" min="0" maxlength="4" max="9999" minlength="1" id="sptcyg" name="no_chldrs_spectrng_utsep30_g" onfocus="textvalidate(this.id,'emis_stcyg_alert');" onchange="textvalidate(this.id,'emis_stcyg_alert');" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control">
                                                                        <font style="color:#dd4b39;"><div id="emis_stcyg_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                    <!--<tr>
                                                                        <th>No. of children enrolled for Special Training in the Previous Academic Year</th>
                                                                        <th><input type="text" maxlength="4" minlength="1" id="sptpyb" name="no_chldrs_spectrng_enrld_acadyr_b" onfocus="textvalidate(this.id,'emis_sptpyb_alert');" onchange="textvalidate(this.id,'emis_sptpyb_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control">
                                                                        <font style="color:#dd4b39;"><div id="emis_sptpyb_alert"></div></font>
                                                                        </th>
                                                                        <th><input type="text" maxlength="4" minlength="1" id="sptpyg" name="no_chldrs_spectrng_enrld_acadyr_g" onfocus="textvalidate(this.id,'emis_sptpyg_alert');" onchange="textvalidate(this.id,'emis_sptpyg_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control">
                                                                        <font style="color:#dd4b39;"><div id="emis_sptpyg_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <th>No. of children completed Special Training during the Previous Academic Year</th>
                                                                        <th><input type="text" maxlength="4" minlength="1" id="sptcpyb" name="no_chldrs_spectrng_cmpltd_prevacdyr_b"  onfocus="textvalidate(this.id,'emis_sptcpyb_alert');" onchange="textvalidate(this.id,'emis_sptcpyb_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control">
                                                                        <font style="color:#dd4b39;"><div id="emis_sptcpyb_alert"></div></font>
                                                                        </th>
                                                                        <th><input type="text" maxlength="4" minlength="1" id="sptcpyg" name="no_chldrs_spectrng_cmpltd_prevacdyr_g"  onfocus="textvalidate(this.id,'emis_sptcpyg_alert');" onchange="textvalidate(this.id,'emis_sptcpyg_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control">
                                                                         <font style="color:#dd4b39;"><div id="emis_sptcpyg_alert"></div></font>
                                                                        </th>
                                                                    </tr>-->
                                                                    <tr>
                                                                        <th>Special Training is conducted by?</th>
                                                                        <th><select class="form-control" id="sptcby" name="who_condct_spec_trng" onfocus="textvalidate(this.id,'emis_sptcby_alert');" onchange="textvalidate(this.id,'emis_sptcby_alert');">
                                                                        <option value="">Choose</option>
                                                                        <option value="1">School Teachers</option>
                                                                        <option value="2">Specially Engaged Teachers</option>
                                                                        <option value="3">Both the above</option>
                                                                        <option value="4">NGO</option>
                                                                        <!--<option value="-1">Others</option>onchange="showOthersText(this.parentNode.parentNode,2,1);"-->
                                                                        </select> 
                                                                       <font style="color:#dd4b39;"><div id="emis_sptcby_alert"></div></font>
                                                                        </th>
                                                                        <!--<th id="ifothersth_0"><input type="text" maxlength="100" id="ifothers_0" name="ifothers_0" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" class="form-control"></th>-->
                                                                    </tr>
                                                                     <tr>
                                                                        <th>Special Training is conducted in </th>
                                                                        <th><select class="form-control" id="sptstc" name="spec_trng_cndt" onfocus="textvalidate(this.id,'emis_sptcin_alert');" onchange="textvalidate(this.id,'emis_sptcin_alert');">
                                                                        <option value="">Choose</option>
                                                                        <option value="1">School Premises</option>
                                                                        <option value="2">Other than School Premises</option>
                                                                        <option value="3">Both the above</option>
                                                                        </select> 
                                                                        <font style="color:#dd4b39;"><div id="emis_sptcin_alert"></div></font>
                                                                        </th>
                                                                        <th></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Type of Training being conducted</th>
                                                                        <th><select class="form-control" id="sptttbc" name="typ_trng_condct" onfocus="textvalidate(this.id,'emis_sptc_alert');" onchange="textvalidate(this.id,'emis_sptc_alert');">
                                                                        <option value="">Choose</option>
                                                                        <option value="1">Residential</option>
                                                                        <option value="2">Non-Residential</option>
                                                                        <option value="3">Both the above</option>
                                                                        </select> 
                                                                        <font style="color:#dd4b39;"><div id="emis_sptc_alert"></div></font>
                                                                        </th>
                                                                        <th></th>
                                                                    </tr>
                                                                    
                                                                </table>
                                                            </div>
                                                             <div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th colspan="2">
                                                                            Does the school provide Psychological counselling to the students? <font style="color:#dd4b39;">*</font>
                                                                        </th>
                                                                        <th>
                                                                           <input type="radio"  id="counsel_1" name="uppri_schl" value="1"  /><label for="counsel_1">YES</label>
                                                                           <input type="radio"  id="counsel_2" name="uppri_schl" value="0" checked="checked" /><label for="counsel_2">NO</label>
                                                                            <!--uppri_schl int(11) schoolnew_academicinfo2-->
                                                                        </th>
                                                                    </tr>
                                                                    
                                                                </table>
                                                             </div>
                                                              <div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th>Club Details</th>
                                                                        <th><input type="hidden" id="hiddenclub_0" name="hiddenclub_0" value="schoolnew_extracc_entry" /></th>
                                                                        <th>Add (+) &nbsp; &nbsp; Delete(-)</th>
                                                                    </tr> 
                                                                    <tr>
                                                                        <th style="width: 281px;">
                                                                            <select id="club_1" name="club_1" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="showOthersText(this.parentNode.parentNode);selectionValidation(this,this.parentNode.parentNode);textvalidate(this.id,this.nextElementSibling.id);" class="form-control" required>
                                                                                <option value="">Choose</option>
                                                                                <option value="1">Scouts & Guides</option>
                                                                                <option value="2">Junior Red Cross</option>
                                                                                <option value="3">National Service Scheme</option>
                                                                                <option value="4">National Cadet Corp</option>
                                                                                <option value="5">Red Ribbon Club</option>
                                                                                <option value="6">Eco-Club</option>
                                                                                <option value="7">Cubs</option>
                                                                                <option value="0">Not Applicable</option>
                                                                                <option value="-1">Others</option>
                                                                            </select>
                                                                            <div  style="color:#dd4b39;" id="emisextraac_0"></div>
                                                                        </th>
                                                                        <th id="ifothersth_1">
                                                                            <input type="text" id="ifothersd_1" name="ifothersd_1" onchange="textvalidate(this.id,this.nextElementSibling.id);" onfocus="textvalidate(this.id,this.nextElementSibling.id);" class="form-control"/>
                                                                            <div  style="color:#dd4b39;" id="emisoth_0"></div>
                                                                        </th>
                                                                       <th>
                                                                            <button type="button" id="btnclub_1" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,1)"><i class="fa fa-plus"></i></button>&nbsp;&nbsp;
                                                                            <button type="button" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,0)"><i class="fa fa-minus"></i></button>
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
         document.getElementById('cceschools_0').style.display='none';       
         document.getElementById('specialtraining').style.display='none';
         document.getElementById('ifothersth_1').style.visibility='hidden';
         window.onload=function(){
            var radios=document.querySelectorAll('input[type="radio"]');
            for(var i=0;i<radios.length;i++){
                if(radios[i].value==0){
                    radios[i].checked=true;
                }
                else{
                    radios[i].checked=false;
                }
            }
         };
    </script>
    <button style="visibility:hidden;">DDDD</button>
</body>
</html>