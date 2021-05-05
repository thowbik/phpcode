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
            <?php $this->load->view('state/header.php'); }else if($this->session->userdata('emis_school_templog1')==2){ $this->load->view('header.php'); }
            else if($this->session->userdata('emis_school_templog1')==0){ $this->load->view('header1.php'); } ?>
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
                                            <form id="emis_schoolnew_basic_part2" method="post" action="<?php echo base_url().'Basic/schoolupdation/2';?>">
                                                <div class="portlet light portlet-fit ">
                                                <?php $this->load->view('schoolInfo/supportHeader'); ?>
                                                    <div class="portlet-title">
                                                        <div class="caption col-md-9">
                                                            <i class="fa fa-building font-dark"></i>
                                                            <span class="caption-subject font-dark sbold uppercase">School Details - Part II</span>
                                                        </div>
                                                        <?php 
                                                            if($profile[0]['part_2']==1){
                                                        ?>
                                                       <div class="col-md-3">
                                                            <button type="button" class="btn btn-primary" onclick="postRequest(createJSON(this.form),'<?php echo base_url().'Basic/getPartInformationByPost/'.$this->uri->segment(4,0);?>',this.form);">VIEW/EDIT</button>
                                                        </div>
                                                        <?php } ?>
                                                    </div> 
                                                    <div class="portlet-body">
                                                        <div class="form-group col-md-6">
                                                            <div class="col-md-5">
                                                                <label for="schoolcategory">School Category <font style="color:#dd4b39;">*</font></label>
                                                                <select disabled="disabled" id="schoolcategory" name="scl_category" onchange="document.getElementById('lowerclass').selectedIndex = 0;document.getElementById('higherclass').selectedIndex = 0;textvalidate(this.id,'emis_schoolcategory_alert');" onfocus="textvalidate(this.id,'emis_schoolcategory_alert');" class="form-control" required>
                                                                    <option value="">Choose.....</option>
                                                                    <?php foreach($schoolcategory as $dis){   ?>
                                                                    <option value="<?php echo($dis->id)?>"><?php echo($dis->category_name)?></option>
                                                                    <?php   }   ?>
                                                                </select>
                                                                 <font style="color:#dd4b39;"><div id="emis_schoolcategory_alert"></div></font>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="col-md-6">
                                                                    <label for="lowerclass">Lowest Class <font style="color:#dd4b39;">*</font></label>
                                                                    <select id="lowerclass" disabled="disabled" name="low_class" class="form-control" onchange="textvalidate(this.id,'emis_lclass_alert');" onfocus="textvalidate(this.id,'emis_lclass_alert');" required>
                                                                        <option value="">Choose...</option>
                                                                        <option value="15">Pre-KG</option>
                                                                        <option value="13">LKG</option>
                                                                        <option value="14">UKG</option>
                                                                        <option value="1">I</option>
                                                                        <option value="2">II</option>
                                                                        <option value="3">III</option>
                                                                        <option value="4">IV</option>
                                                                        <option value="5">V</option>
                                                                        <option value="6">VI</option>
                                                                        <option value="7">VII</option>
                                                                        <option value="8">VIII</option>
                                                                        <option value="9">IX</option>
                                                                        <option value="10">X</option>
                                                                        <option value="11">XI</option>
                                                                        <option value="12">XII</option>
                                                                        <option value="0">Not Applicable</option>
                                                                    </select>
                                                                    <!--<input type="text" id="lowerclass" name="lowerclass" onchange="textvalidate(this.id,'emis_lclass_alert');" onfocus="textvalidate(this.id,'emis_lclass_alert');" required="required" class="form-control" readonly="readonly" />-->
                                                                     <font style="color:#dd4b39;"><div id="emis_lclass_alert"></div></font>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="higherclass">Highest Class <font style="color:#dd4b39;">*</font></label>
                                                                    <select id="higherclass" disabled="disabled" name="high_class" class="form-control" onchange="textvalidate(this.id,'emis_hclass_alert');" onfocus="textvalidate(this.id,'emis_hclass_alert');" required>
                                                                        <option value="">Choose...</option>
                                                                        <option value="15">Pre-KG</option>
                                                                        <option value="13">LKG</option>
                                                                        <option value="14">UKG</option>
                                                                        <option value="1">I</option>
                                                                        <option value="2">II</option>
                                                                        <option value="3">III</option>
                                                                        <option value="4">IV</option>
                                                                        <option value="5">V</option>
                                                                        <option value="6">VI</option>
                                                                        <option value="7">VII</option>
                                                                        <option value="8">VIII</option>
                                                                        <option value="9">IX</option>
                                                                        <option value="10">X</option>
                                                                        <option value="11">XI</option>
                                                                        <option value="12">XII</option>
                                                                        <option value="0">Not Applicable</option>
                                                                    </select>
                                                                    <!--<input type="text" id="higherclass" onchange="textvalidate(this.id,'emis_hclass_alert');" onfocus="textvalidate(this.id,'emis_hclass_alert');" name="higherclass" required="required" class="form-control" readonly="readonly" />-->
                                                                     <font style="color:#dd4b39;"><div id="emis_hclass_alert"></div></font>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="col-md-12">
                                                                <label for="schooltype_radio"><strong>School Type <font style="color:#dd4b39;">*</font></strong></label><br />
                                                                <label for="schooltype_1">Boys</label>&nbsp;&nbsp;
                                                                <input type="radio" disabled="disabled" id="schooltype_1" name="school_type" value="Boys" onchange="document.getElementById('schooltype').value=this.value" />
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="schooltype_1">Girls</label>&nbsp;&nbsp;
                                                                <input type="radio" disabled="disabled" id="schooltype_2" name="school_type" value="Girls" onchange="document.getElementById('schooltype').value=this.value" />
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="schooltype_1">Co-Education</label>&nbsp;&nbsp;
                                                                <input type="radio" disabled="disabled" id="schooltype_3" name="school_type" value="Co-Ed" onchange="document.getElementById('schooltype').value=this.value" />
                                                                <label style="display:none;">Boys/Girls/Co-Education</label>
                                                                <input type="hidden" id="schooltype" name="school_type" required />
                                                                <!---<select id="management_category" class="form-control" onchange="textvalidate(this.id,'emis_mc_alert');" onfocus="textvalidate(this.id,'emis_mc_alert');" name="management_category">
                                                                    <option value="">Select Management</option>
                                                                    <?php   foreach($schoolmanagement as $dis){   ?>
                                                                    <option value="<?php echo($dis->id)?>"><?php echo($dis->manage_name)?></option>
                                                                    <?php   }   ?>
                                                                </select>--->
                                                                 <font style="color:#dd4b39;"><div id="emis_mc_alert"></div></font>
                                                            </div>
                                                            <!--<div class="col-md-6">
                                                                <label for="schoolmanagement">Management of School</label>
                                                                <select id="schoolmanagement" class="form-control" onchange="textvalidate(this.id,'emis_mschool_alert');" onfocus="textvalidate(this.id,'emis_mschool_alert');" name="schoolmanagement">
                                                                    <option value="">Select Management</option>
                                                                </select>
                                                                 <font style="color:#dd4b39;"><div id="emis_mschool_alert"></div></font>
                                                            </div>-->
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <table class="table" id="minortableall">
                                                                    <tr>
                                                                        <th style="width: 390px;">
                                                                            <label for="minoritygroup">School Managed By <strong>Minority Group</strong> <font style="color:#dd4b39;">*</font></label>
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                            <label for="minority">Yes</label>
                                                                            <input type="radio" disabled="disabled" id="minority_1" name="minority_sch" required="required" class="custom-control-input" value="1" onchange="document.getElementById('minoritygroup_0').selectedIndex = 0;sbcshow1(this,'minorityvisible');selectshowminor(document.getElementById('minoritygroup_0'),'minoritygroupdetails'); setRequiredField(this.value,'minoritygroup_0,minoryear','1');" />
                                                                            &nbsp;
                                                                            <label for="minority">No</label>
                                                                            <input type="radio" disabled="disabled" id="minority_2" name="minority_sch" required="required" class="custom-control-input" value="0" onchange="document.getElementById('minoritygroup_0').selectedIndex = 0;sbcshow1(this,'minorityvisible');selectshowminor(document.getElementById('minoritygroup_0'),'minoritygroupdetails');resetItems('minortableall'); setRequiredField(this.value,'minoritygroup_0,minoryear','1');" checked="checked" />
                                                                        </th>
                                                                        <th class="minorityvisible">Select <strong>Minority Group</strong> <font style="color:#dd4b39;">*</font></th>
                                                                        <th class="minorityvisible">
                                                                                <select class="form-control" disabled="disabled" id="minoritygroup_0" name="minority_grp" onchange="selectshowminor(this,'minoritygroupdetails');textvalidate(this.id,'emis_min_alert');resetItems('minorityothers');setRequiredField(this.value,'min_ord_no','13');" onfocus="textvalidate(this.id,'emis_min_alert');">
                                                                                    <option value="">Select Minority Group</option>
                                                                                    <!--<option value="1">Muslim</option>
                                                                                    <option value="2">Christian</option>
                                                                                    <option value="3">Jain</option>
                                                                                    <option value="4">Sikh</option>
                                                                                    <option value="5">Parsi</option>
                                                                                    <option value="6">Buddhist</option>
                                                                                    <option value="7">Linguistic-Telugu</option>
                                                                                    <option value="8">Linguistic-Malayalam</option>
                                                                                    <option value="9">Linguistic-Kannada</option>
                                                                                    <option value="10">Linguistic-Urudu</option>
                                                                                    <option value="11">Linguistic-Sowrashtra</option>
                                                                                    <option value="12">Linguistic-others</option>-->
                                                                                    <?php
                                                                                        foreach($minority as $minor) 
                                                                                        { 
                                                                                    ?>
                                                                                    <option value="<?php echo $minor->id; ?>"><?php echo $minor->minority; ?></option>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </select> 
                                                                                
                                                                                <font style="color:#dd4b39;"><div id="emis_min_alert"></div></font>
                                                                            
                                                                        </th>
                                                                        <th class="minoritygroupdetails minorityvisible" id="minorityothers">
                                                                            <input type="text" disabled="disabled" maxlength="25" minlength="1" id="min_ord_no" name="minority_other" placeholder="Enter the language" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" class="form-control">
                                                                            <div id="emisoth2_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        
                                                                        <th class="minorityvisible">Valid up to year:</th>
                                                                        <th class="minorityvisible">
                                                                             <?php
                                                                             $created_date= date('Y-m-d',strtotime("now"));
                                                                             $EndDateTime = DateTime::createFromFormat('Y-m-d', $created_date);
                                                                             $EndDateTime->modify('+30 years');
                                                                             ?>
                                                                            <input type="number" disabled="disabled" maxlength="4" minlength="1" id="minoryear" name="minority_yr" min="<?php echo (date('Y',strtotime("now"))); ?>" max="<?php echo $EndDateTime->format('Y'); ?>" placeholder="Enter the year" onkeydown="return restlength(this)"  onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);" onblur="return restlength(this)" class="form-control">
                                                                           
                                                                            <div id="emisminyear_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        
                                                                    </tr>
                                                                   
                                                                    
                                                                    
                                                                </table>
                                                            </div>
                                                            <div class="form-group col-md-6"><input type="hidden" id="hiddenmedium_0" name="hiddenmedium_0" value="schoolnew_mediumentry" />
                                                                <table class="table">
                                                                    <tr>
                                                                        <th colspan="3">Medium of Instruction <font style="color:#dd4b39;">*</font></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            
                                                                            <select class="form-control" id="instructedlang_0" name="instructedlang_0" onfocus="textvalidate(this.id,this.nextElementSibling.id);"  onchange="showOthersText(this.parentNode.parentNode);selectionValidation(this,this.parentNode.parentNode);textvalidate(this.id,this.nextElementSibling.id);setRequiredField(this.value,this.parentNode.nextElementSibling.children[0].id,'-1')" required>
                                                                                <option value="">Select Medium</option>
                                                                                <?php
                                                                                    foreach($mediumInstruct as $dis){
                                                                                ?>
                                                                                    <option value="<?php echo($dis->MEDINSTR_ID)?>"><?php echo($dis->MEDINSTR_DESC)?></option>
                                                                                <?php
                                                                                    }
                                                                                ?>
                                                                                <option value="-1">Others</option>
                                                                            </select>
                                                                            <div id="emismediumalert_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        <th id="ifothersth_0" style="width: 140px !important;">
                                                                            <input type="text" onfocus="textvalidate(this.id,this.nextElementSibling.id);"  id="ifothers_0" name="ifothers_0" class="form-control" />
                                                                            <div style="color:#dd4b39;" id="emismedotheralert_0"></div>
                                                                        </th>
                                                                        <th>
                                                                            <button type="button" id="btninstructedlang_0" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,1)"><i class="fa fa-plus"></i></button>
                                                                            <button type="button" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,0)"><i class="fa fa-minus"></i></button>
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <table class="table"><input type="hidden" id="hiddenlanguage_0" name="hiddenlanguage_0" value="schoolnew_langtaught_entry" />
                                                                    <tr>
                                                                        <th colspan="2">Languages Taught <font style="color:#dd4b39;">*</font></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            
                                                                            <select class="form-control" id="languagetaught_0" name="languagetaught_0" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="selectionValidation(this,this.parentNode.parentNode);textvalidate(this.id,this.nextElementSibling.id);" required>
                                                                                <option value="">Select language</option>
                                                                                <?php
                                                                                    foreach($languagesubject as $dis){
                                                                                ?>
                                                                                    <option value="<?php echo($dis->MEDINSTR_ID)?>"><?php echo($dis->MEDINSTR_DESC)?></option>
                                                                                <?php
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                            <div id="emislanguagealert_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        <th>
                                                                            <button type="button" id="btnlanguagetaught_0" class="btn" onclick="createRow(this.parentNode.parentNode)"><i class="fa fa-plus"></i></button>
                                                                            <button type="button" class="btn" onclick="deleteRow(this.parentNode.parentNode)"><i class="fa fa-minus"></i></button>
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="prevocational">Does the School offer any <u><strong>Pre-Vocational course at Secondary Stage? <font style="color:#dd4b39;">*</font></strong></u></label>
                                                            </div>
                                                            <div class="form-group col-md-6">  
                                                                <label for="prevocational_1">Yes</label>
                                                                <input type="radio" id="prevocational_1" name="prevoc_course" required="required" class="custom-control-input" value="1" onchange="document.getElementById('prevocationalvisible').style.display=(this.checked?'':'none'); setRequiredField(this.value,'prevocationaltrades_0','1');" />
                                                                &nbsp; 
                                                                <label for="prevocational_2">No</label>
                                                                <input type="radio" id="prevocational_2" name="prevoc_course" required="required" class="custom-control-input" value="0" onchange="document.getElementById('prevocationalvisible').style.display=(this.checked?'none':'');resetItems('prevocationalvisible'); setRequiredField(this.value,'prevocationaltrades_0','1');" checked="checked" />
                                                            </div>
                                                            <div class="form-group col-md-12" id="prevocationalvisible">
                                                                <input type="hidden" id="hiddenvoctrades_0" name="hiddenvoctrades_0" value="schoolnew_voctrade_entry" />
                                                                <table class="table" id="voctradestab">
                                                                    <tr>
                                                                        <th style="font-weight: normal;"><span>If Yes, Choose Trades</span></th>
                                                                        <th style="width:245px;">
                                                                            <select id="prevocationaltrades_0" name="prevocationaltrades_0" class="form-control" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="selectionValidation(this,this.parentNode.parentNode,1);textvalidate(this.id,this.nextElementSibling.id);">
                                                                                <option value="">Choose</option>
                                                                                <option value="1">Electronics</option>
                                                                                <option value="2">Automobile</option>
                                                                                <option value="3">Agriculture</option>
                                                                                <option value="4">Apparel</option>
                                                                                <option value="5">Beauty and Wellness</option>
                                                                                <option value="6">Multi Skill Foundation Course</option>
                                                                            </select>
                                                                            <div id="emisprevoalert_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        <th>
                                                                            <button type="button" id="btnprevocationaltrades_0" class="btn" onclick="createRow(this.parentNode.parentNode)"><i class="fa fa-plus"></i></button>
                                                                            <button type="button" id="rmvvoctradestab" class="btn" onclick="deleteRow(this.parentNode.parentNode)"><i class="fa fa-minus"></i></button>
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            
                                                            <div class="col-md-12">
                                                            <div class="col-md-4"><label for="allweather">Whether School is approachable by <u><strong>All-Weather Roads? <font style="color:#dd4b39;">*</font></strong></u></ul></label></div>
                                                            <div class="col-md-2">
                                                                <label for="allweather_1">Yes</label>
                                                                <input type="radio" id="allweather_1" name="weather_roads" onchange="sbcshow2(this,'allweatherroads');setRequiredField(this.value,'weatherdetails,distancedetails','1');" required="required" class="custom-control-input" value="0" checked="checked" />
                                                                &nbsp;
                                                                <label for="allweather_2">No</label>
                                                                <input type="radio" id="allweather_2" name="weather_roads" onchange="sbcshow2(this,'allweatherroads');setRequiredField(this.value,'weatherdetails,distancedetails','1');textvalidate(this.id,'emis_landa_alert');" required="required" class="custom-control-input" value="1" />
                                                            </div>
                                                            <div class="col-md-6 allweatherroads">
                                                                <div class="col-md-12">if No, School is connected to All Weather road</div>
                                                                <div class="col-md-12">
                                                                    <div class="col-md-6">
                                                                        <label>Roads Connected Through</label>
                                                                        <select id="weatherdetails" name="road_connect" onchange="textvalidate(this.id,'emis_weatherdetails_alert');"  onfocus="textvalidate(this.id,'emis_weatherdetails_alert');" class="form-control">
                                                                            <option value="">Choose</option>
                                                                            <option value="1">Kutcha Road</option>
                                                                            <option value="2">Partial Pucca Road</option>
                                                                            <option value="3">No Road</option>
                                                                        </select>
                                                                        <font style="color:#dd4b39;"><div id="emis_weatherdetails_alert"></div></font>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Distance to Road in Meters</label>
                                                                        <input type="text" id="distancedetails" name="distance_road" maxlength="5" min="0" max="15000" onkeydown="return restlength(this)" onblur="return restlength(this)" onchange="textvalidate(this.id,'emis_distance_alert');" onfocus="textvalidate(this.id,'emis_distance_alert');" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57"/>
                                                                        <font style="color:#dd4b39;"><div id="emis_distance_alert"></div></font>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="col-md-4"><label for="anganwadi">Whether <strong><u>Anganwadi</u></strong> is attached to the School? <font style="color:#dd4b39;">*</font></label></div>
                                                            <div class="col-md-2 ">
                                                                <label for="anganwadi_1">Yes</label>
                                                                <input type="radio" disabled="disabled" id="anganwadi_1" name="anganwadi" required="required" class="custom-control-input" value="1" onchange="document.getElementById('anganvadivisible').style.display=(this.checked?'':'none');setRequiredField(this.value,'anganwadi_teachers,anganwadi_students,anganwadi_center','1');"  />
                                                                    &nbsp;
                                                                <label for="anganwadi_2">No</label>
                                                                <input type="radio" disabled="disabled" id="anganwadi_2" name="anganwadi" required="required" class="custom-control-input" value="0" checked="checked" onchange="document.getElementById('anganvadivisible').style.display=(this.checked?'none':'');resetItems('anganvadivisible');setRequiredField(this.value,'anganwadi_teachers,anganwadi_students,anganwadi_center','1');" />
                                                            </div>
                                                            <div class="col-md-6" >
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12" id="anganvadivisible">
                                                            <div class="col-md-12">If Yes ! Total No. of Anganwadi Workers &amp; Children</div>
                                                                <div class="col-md-12">
                                                                    <div class="col-md-6">
                                                                        <label>Total No. of Workers</label>
                                                                        <input type="text" disabled="disabled" maxlength="2" minlength="1" onfocus="textvalidate(this.id,'emis_noteacher_alert');" onchange="textvalidate(this.id,'emis_noteacher_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="anganwadi_teachers" name="angan_wrks" class="form-control" />
                                                                        <font style="color:#dd4b39;"><div id="emis_noteacher_alert"></div></font>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Total No. of Children</label>
                                                                        <input type="text" disabled="disabled" maxlength="3" minlength="1" onfocus="textvalidate(this.id,'emis_nostudent_alert');" onchange="textvalidate(this.id,'emis_nostudent_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57"  id="anganwadi_students" name="angan_childs" class="form-control" />
                                                                        <font style="color:#dd4b39;"><div id="emis_nostudent_alert"></div></font>
                                                                    </div>
                                                                </div>
                                                        
                                                               <div class="col-md-12" style="margin: 15px 0;">
                                                                <div class="col-md-6">
                                                                    <label>Code of the Anganwadi Centre <font style="color:#dd4b39;">*</font></label>
                                                                </div>
                                                                <div class="col-md-6" >
                                                                    <input type="text" disabled="disabled" id="anganwadi_center" class="form-control" name="anganwadi_center" onchange="textvalidate(this.id,'emis_anganwadicenter_alert');" onfocus="textvalidate(this.id,'emis_anganwadicenter_alert');" onkeypress="return (event.charCode >=48 && event.charCode <=57) || (event.charCode >= 96 && event.charCode <= 123) || (event.charCode >= 65 && event.charCode <= 91) || event.charCode == 8 || event.charCode == 32"/>
                                                                    <font style="color:#dd4b39;"><div id="emis_anganwadicenter_alert"></div></font>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-12">
                                                                <div class="col-md-6">
                                                                    <label>Is the Anganwadi Worker trained in early childhood education <font style="color:#dd4b39;">*</font></label>
                                                                </div>
                                                                <div class="col-md-6" >
                                                                    <input type="radio" disabled="disabled" id="anganwaditrain_1" value="1" name="anganwadi_train"/><label for="anganwaditrain_1">YES</label>
                                                                    <input type="radio" disabled="disabled" id="anganwaditrain_2" value="0" name="anganwadi_train" checked="checked"/><label for="anganwaditrain_2">NO</label>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>                                                            
                                                            
                                                                                                                                                                                    
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body" style="margin-top: 25px;">
                                                    
                                                        
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
        document.getElementById('prevocationalvisible').style.display='none';
        sbcshow1(document.getElementById('minority_2'),'minorityvisible');
        document.getElementById('anganvadivisible').style.display='none';
        document.getElementById('ifothersth_0').style.visibility='hidden';
        sbcshow2(document.getElementById('allweather_1'),'allweatherroads');
        
        var baseurl='<?php echo base_url() ?>';
        
        $(document).ready(function(){ 
                $("#management_category").change(function(){ 
                    var mana_cate_id = $("#management_category").val();
                    $.ajax({
                        type: "POST",
                        url:baseurl+'Basic/getsubbymajorcategory/opt',
                        data:"&mana_cate_id="+mana_cate_id,
                        success: function(resp){
                            //alert(resp);  
                            $("#schoolmanagement").html(resp);  
                            return true;              
                        },
                        error: function(e){ 
                            alert('Error: ' + e.responseText);
                            return false;  
                        }
                    });
                });  
            }); 
          
         selectshowminor(document.getElementById('minoritygroup_0'),'minoritygroupdetails');  
         function selectshowminor(sbc,sbcclass) {
          //alert(sbc.value);
            var x =document.getElementsByClassName(sbcclass);
            if(sbc.value==13){
				
				for(var i=0;i<x.length;i++) {
                    //alert(x[i]);
                    x[i].style.display='';
                }
				
                
            }else {
                
                for(var i=0;i<x.length;i++) {
                    //alert(x[i]);
                    x[i].style.display='none';
                }
                
            }
            
        }  
        
        
       
        /*function setlowhighclass(node) {
        	var low=node.nextElementSibling;
        	var setlow=document.getElementById('schoolcategory').options.selectedIndex;
            //document.getElementById('higherclass').selectedIndex=0;
           alert(setlow);
           if(setlow==6){  
                low.children[0].children[1]=document.getElementById('lowerclass').options.selectedIndex=0;
               
	        }

}*/
          
    </script>
    
    
</body>
</html>