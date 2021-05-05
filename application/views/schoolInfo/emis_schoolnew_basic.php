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
                                            <form id="emis_schoolnew_basic_part1" method="post" action="<?php echo base_url().'Basic/schoolupdation/'.$this->uri->segment(3,0);?>">
                                                <div class="portlet light portlet-fit ">
													<?php $this->load->view('schoolInfo/supportHeader'); ?>
                                                     <div class="portlet-title">
                                                        <div class="caption col-md-9">
                                                            <i class="fa fa-building font-dark"></i>
                                                            <span class="caption-subject font-dark sbold uppercase">SCHOOL DETAILS - PART I</span>
                                                        </div>
                                                        
                                                        <?php 
                                                            if($profile[0]['part_1']==1){
                                                        ?>
                                                       <div class="col-md-3">
                                                            <button type="button" id="btnedit" class="btn btn-primary" onclick="postRequest(createJSON(this.form),'<?php echo base_url().'Basic/getPartInformationByPost/'.$this->uri->segment(4,0);?>',this.form);">VIEW/EDIT</button>
                                                        </div>
                                                        <?php } ?>
                                                        
                                                    </div>
                                                    <!--<div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-building font-dark"></i>
                                                            <span class="caption-subject font-dark sbold uppercase">Preliminary Details</span>
                                                        </div>
                                                    </div>-->
                                                    
                                                
                                                    
                                                    <div class="portlet-body">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                            <table class="table">
                                                                    <tr>
                                                                        <th colspan="4" class="bg-primary text-white">
                                                                         <i class="fa fa-building"></i>
                                                                        <span class="caption-subject text-white sbold uppercase" >Preliminary Details</span>
                                                                         </th>
                                                                         
                                                                    </tr>
                                                                </table>
                                                                </div>
                                                            <div class="form-group col-md-12">
                                                                <label for="udise_code">U-DISE Code <font style="color:#dd4b39;">*</font></label>
                                                                <input type="number" class="form-control" id="udise_code" onfocus="textvalidate(this.id,'emis_udisecode_alert');" onchange="textvalidate(this.id,'emis_udisecode_alert');" autocomplete="off"  name="udise_code" placeholder="UDISE CODE" required="required" value="<?php echo $basic[0]->udise_code; ?>" <?php if($basic[0]->udise_code!=''){echo(' readonly="readonly"');} ?> />
                                                                <font style="color:#dd4b39;"><div id="emis_udisecode_alert"></div></font>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="latitude">Latitude <font style="color:#dd4b39;">*</font></label>
                                                                <input type="number" class="form-control" id="latitude" name="latitude"  onfocus="textvalidate(this.id,'emis_latitude_alert');" onchange="textvalidate(this.id,'emis_latitude_alert');" autocomplete="off"  placeholder="LATITUDE" value="<?php echo $basic[0]->latitude; ?>" readonly="readonly" required="required" />
                                                                <font style="color:#dd4b39;"><div id="emis_latitude_alert"></div></font>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="logitude">Longitude <font style="color:#dd4b39;">*</font></label>
                                                                <input type="number" class="form-control" id="logitude" name="longitude"  onfocus="textvalidate(this.id,'emis_longitude_alert');" onchange="textvalidate(this.id,'emis_longitude_alert');" autocomplete="off"  placeholder="LONGITUDE" value="<?php echo $basic[0]->longitude; ?>" readonly="readonly" required="required" />
                                                                <font style="color:#dd4b39;"><div id="emis_longitude_alert"></div></font>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label for="school_name">School Name (In Capital Letters) <font style="color:#dd4b39;">*</font></label>
                                                                <input type="text" class="form-control" id="school_name" name="school_name" onfocus="textvalidate(this.id,'emis_schoolname_alert');" onchange="textvalidate(this.id,'emis_schoolname_alert');" autocomplete="off"  placeholder="SCHOOL NAME" required="required" value="<?php echo $basic[0]->school_name; ?>" <?php if($basic[0]->school_name!=''){echo(' readonly="readonly"');} ?> />
                                                                <font style="color:#dd4b39;"><div id="emis_schoolname_alert"></div></font>
                                                            </div>
                                                            
                                                        </div>
                                                         <div class="form-row">
                                                            <div class="form-row col-md-12">
                                                            <div class="col-md-4">
                                                                <label for="manage_cate_id">Select Management Category <font style="color:#dd4b39;">*</font></label>
                                                                <select id="" name="" class="form-control" required readonly>
                                                                    <option value="<?php echo $basic[0]->manage_cate_id; ?>"><?php echo($basic[0]->manage_name); ?></option>
                                                                    <!--<option value="">Choose......</option>
                                                                    <?php   foreach($schoolmanagement as $dis){   ?>
                                                                    <option value="<?php echo($dis->id)?>"><?php echo($dis->manage_name)?></option>
                                                                    <?php   }   ?>-->
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="sch_management_id">Select Management <font style="color:#dd4b39;">*</font></label>
                                                                <select id="" name="" class="form-control" required readonly>
                                                                <option value="<?php echo $basic[0]->sch_management_id; ?>"><?php echo($basic[0]->management); ?></option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="sch_directorate_id">Select Affiliation <font style="color:#dd4b39;">*</font></label>
                                                                <select id="" name="" class="form-control" required readonly><!--Directorate&nbsp;/&nbsp;Department&nbsp;/&nbsp;-->
                                                                <option value="<?php echo $basic[0]->sch_directorate_id; ?>"><?php echo($basic[0]->department); ?></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <button style="visibility:hidden;">DDDD</button>
                                                    </div>
                                                </div>
                                                
                                                <div class="portlet light portlet-fit ">
                                                
                                                    <div class="portlet-body">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                            <table class="table">
                                                                    <tr>
                                                                        <th colspan="4" class="bg-primary text-white">
                                                                         <i class="fa fa-map-marker"></i>
                                                                        <span class="caption-subject text-white sbold uppercase" >Location Details</span>
                                                                         </th>
                                                                         
                                                                    </tr>
                                                                </table>
                                                                </div>
                                                            <input type="hidden" id="chaingaddress" value="district_id,block_id,urbanrural,localbody_id,village_ward,vill_habitation_id,assembly_id,parliament_id,edu_dist_id" />
                                                            <div class="form-group col-md-3">
                                                                <label for="district_id">District <font style="color:#dd4b39;">*</font></label>
                                                                <select id="district_id" name="district_id" class="form-control" required="required" onfocus="textvalidate(this.id,'emis_schooldistrict_alert');" onchange="textvalidate(this.id,'emis_schooldistrict_alert');" readonly="readonly">
                                                                    <option value="<?php echo $basic[0]->district_id; ?>" selected="selected"><?php echo $basic[0]->district_name; ?></option>
                                                                   <!---<?php
                                                                        foreach($districts as $dis){
                                                                   ?>
                                                                            <option value="<?php echo($dis->id)?>"><?php echo($dis->district_name)?></option>
                                                                   <?php
                                                                        }
                                                                   ?>-->
                                                                </select>
                                                                <font style="color:#dd4b39;"><div id="emis_schooldistrict_alert"></div></font>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="block_id">Block <font style="color:#dd4b39;">*</font></label>
                                                                <select id="block_id" name="block_id" class="form-control" onfocus="textvalidate(this.id,'emis_block_alert');" onchange="textvalidate(this.id,'emis_block_alert');" required="required" readonly="readonly">
                                                                    <option value="<?php echo $basic[0]->bid; ?>" selected="selected"><?php echo $basic[0]->block_name; ?></option>
                                                                </select>
                                                                 <font style="color:#dd4b39;"><div id="emis_block_alert"></div></font>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="urbanrural"><strong>Urban/Rural <font style="color:#dd4b39;">*</font></strong></label>
                                                              <!-- <div class="col-md-12" id="urbanrural1">
                                                                    <label for="urban_1" >&nbsp;URBAN</label>
                                                                    <input type="radio" id="urban_1" name="urbanrural" value="2" onchange="addressChainDetails(this,'localbody_id',0,'district_id='+document.getElementById('district_id').value,'<?php echo base_url() ?>Basic/addressChainDetails/');document.getElementById('urbanruraltext').value='Urban';" />
                                                                    <label for="urban_2" >&nbsp;RURAL</label>
                                                                    <input type="radio" id="urban_2" name="urbanrural" value="1" onchange="addressChainDetails(this,'localbody_id',0,'district_id='+document.getElementById('district_id').value,'<?php echo base_url() ?>Basic/addressChainDetails/');document.getElementById('urbanruraltext').value='Rural';" />
                                                                    <label for="urbanruraltext" style="display:none;">URBAN OR RURAL</label>
                                                                    <input type="hidden" id="urbanruraltext" required="required" />
                                                                    <font style="color:#dd4b39;"><div id="emis_urbanrural_alert"></div></font>
                                                                </div>-->
                                                                <div class="col-md-12">
                                                                    <select id="urbanrural" class="form-control" name="urbanrural" onchange="addressChainDetails(this,'localbody_id',0,'district_id='+document.getElementById('district_id').value,'<?php echo base_url() ?>Basic/addressChainDetails/');if(this.value==1){document.getElementById('urbanruraltext').value='Rural';}else if(this.value==2){document.getElementById('urbanruraltext').value='Urban';}" required="required">
                                                                        <option value="">Choose</option>
                                                                        <option value="1">RURAL</option>
                                                                        <option value="2">URBAN</option>
                                                                    </select>
                                                                    <label for="urbanruraltext" style="display:none;">URBAN OR RURAL</label>
                                                                    <input type="hidden" id="urbanruraltext" required="required" />
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="localbody_id">Local Body <font style="color:#dd4b39;">*</font></label>
                                                                <select id="localbody_id" name="local_body_id" class="form-control" onfocus="textvalidate(this.id,'emis_localbody_alert');"  onchange="addressChainDetails(this,'village_ward',this.value,'district_id='+document.getElementById('district_id').value+'&urbanrural='+document.getElementById('urbanruraltext').value,'<?php echo base_url() ?>Basic/addressChainDetails/');textvalidate(this.id,'emis_localbody_alert');document.getElementById('pincode').value='';" required="required">
                                                                </select>
                                                                <font style="color:#dd4b39;"><div id="emis_localbody_alert"></div></font>
                                                                
                                                            </div>
                                                            
                                                            
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-3">
                                                                <label for="village_ward">Village/Town/Municipality <font style="color:#dd4b39;">*</font></label>
                                                                <select id="village_ward" name="lb_vill_town_muni" class="form-control" onfocus="textvalidate(this.id,'emis_villageward_alert');" onchange="addressChainDetails(this,'vill_habitation_id',13,'localbody_id='+this.value,'<?php echo base_url() ?>Basic/addressChainDetails/');textvalidate(this.id,'emis_villageward_alert');document.getElementById('pincode').value='';" required="required">
                                                                   
                                                                </select>
                                                                <font style="color:#dd4b39;"><div id="emis_villageward_alert"></div></font>
                                                            </div>
                                                            <div class="form-group col-md-3"> 
                                                                <label for="vill_habitation_id">Village/Ward <font style="color:#dd4b39;">*</font></label>
                                                                <select id="vill_habitation_id" name="lb_habitation_id" class="form-control" onfocus="textvalidate(this.id,'vill_habitation_alert');" onchange="addressChainDetails(this,'assembly_id',10,'district_id='+document.getElementById('district_id').value,'<?php echo base_url() ?>Basic/addressChainDetails/');textvalidate(this.id,'vill_habitation_alert');" required="required">
                                                                    
                                                                </select>
                                                                <font style="color:#dd4b39;"><div id="vill_habitation_alert"></div></font>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="assembly_id">Assembly Constituency <font style="color:#dd4b39;">*</font></label>
                                                                <select id="assembly_id" onfocus="textvalidate(this.id,'emis_assembly_alert');" onchange="addressChainDetails(this,'parliament_id',11,'district_id='+document.getElementById('district_id').value,'<?php echo base_url() ?>Basic/addressChainDetails/');textvalidate(this.id,'emis_assembly_alert');" name="assembly_id" class="form-control" required="required">
                                                                    
                                                                </select>
                                                                <font style="color:#dd4b39;"><div id="emis_assembly_alert"></div></font>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="parliment_id">Parliamentary Constituency <font style="color:#dd4b39;">*</font></label>
                                                                <select id="parliament_id" name="parliament_id" class="form-control" onfocus="textvalidate(this.id,'emis_parliament_alert');" onchange="addressChainDetails(this,'edu_dist_id',12,'district_id='+document.getElementById('district_id').value,'<?php echo base_url() ?>Basic/addressChainDetails/');document.getElementById('pincode').value='';textvalidate(this.id,'emis_parliament_alert');" required="required">
                                                                    
                                                                </select>
                                                                <font style="color:#dd4b39;"><div id="emis_parliament_alert"></div></font>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-3">
                                                                <label for="edu_district_id">Educational District <font style="color:#dd4b39;">*</font></label>
                                                                <select id="edu_dist_id" name="edu_dist_id" class="form-control"  onfocus="textvalidate(this.id,'emis_edudistrict_alert');" onchange="textvalidate(this.id,'emis_edudistrict_alert');document.getElementById('pincode').value='';" required="required">
                                                                   
                                                                </select>
                                                                <font style="color:#dd4b39;"><div id="emis_edudistrict_alert"></div></font>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="addressline_1">Address Line 1 <font style="color:#dd4b39;">*</font></label>
                                                                <input type="text" id="addressline_1" name="addressline_1" onfocus="textvalidate(this.id,'emisaddressline_1alert');" onchange="textvalidate(this.id,'emisaddressline_1alert');" required="required" class="form-control" />
                                                                
                                                                <font style="color:#dd4b39;"><div id="emisaddressline_1alert"></div></font>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="addressline_1">Address Line 2 <font style="color:#dd4b39;">*</font></label>
                                                                <input type="text" id="addressline_2" name="addressline_2" onfocus="textvalidate(this.id,'addressline_2alert');" onchange="textvalidate(this.id,'addressline_2alert');" required="required" class="form-control" />
                                                                
                                                                <font style="color:#dd4b39;"><div id="addressline_2alert"></div></font>
                                                            </div>
                                                            <!--<div class="form-group col-md-3">
                                                                <label for="addressline_1">Address Line 3</label>
                                                                <input type="text" id="addressline_3" name="addressline_3" onfocus="textvalidate(this.id,'emis_edudistrict_alert');" onchange="textvalidate(this.id,'emis_edudistrict_alert');" required="required" class="form-control" />
                                                                
                                                                <font style="color:#dd4b39;"><div id="addressline_2"></div></font>
                                                            </div>-->
                                                            <div class="form-group col-md-3">
                                                                <label for="pincode">Pincode <font style="color:#dd4b39;">*</font></label>
                                                                <input type="text" maxlength="6" id="pincode" onfocus="pinvalidate(this.id,'emis_pincode_alert');" onchange="pinvalidate(this.id,'emis_pincode_alert');" name="pincode" class="form-control" value="<?php echo($basic[0]->pincode); ?>" onkeypress="return event.charCode >=48 && event.charCode <=57" required="required" />
                                                                 <font style="color:#dd4b39;"><div id="emis_pincode_alert"></div></font>
                                                            </div>
                                                            
                                                        </div>
                                                        <button style="visibility:hidden;">DDDD</button>
                                                    </div>
                                                </div>
                                                <div class="portlet light portlet-fit ">
                                                   
                                                   <!-- <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-phone font-dark"></i>
                                                            <span class="caption-subject font-dark sbold uppercase">Communication Details</span>
                                                        </div>
                                                    </div>-->
                                                    <div class="portlet-body">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                            <table class="table">
                                                                    <tr>
                                                                        <th colspan="4" class="bg-primary text-white">
                                                                         <i class="fa fa-phone"></i>
                                                                        <span class="caption-subject text-white sbold uppercase" >Communication Details</span>
                                                                         </th>
                                                                         
                                                                    </tr>
                                                                </table>
                                                                </div>
                                                            <p><font style="color:#dd4b39;">Either one is mandatory Correspondent/ Head Master Mobile or Email</font></p>
                                                            <div class="form-group col-md-4">
															
                                                                <label for="stdcode_id">Office STD Code</label>
                                                                <select id="stdcode_id" name="office_std_code" class="form-control"  required>
                                                                    <!--<option value="<?php echo $basic[0]->sid; ?>" selected="selected"><?php echo $basic[0]->std_code; ?></option>--->
                                                                    <?php
                                                                        foreach($stdcode as $dis){
                                                                    ?>
                                                                            <option value="<?php echo($dis->id)?>" <?php if($basic[0]->office_std_code==$dis->id){echo('selected="selected"');}?> ><?php echo($dis->std_code)?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                                 <font style="color:#dd4b39;"><div id="emis_stdcode_alert"></div></font>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="landline">Office Landline</label>
                                                                <input type="tel" class="form-control" maxlength="0" onkeypress="return event.charCode >=48 && event.charCode <=57" id="landline" name="office_landline" placeholder="LandLine" value="<?php echo($basic[0]->office_landline) ?>" />
                                                                
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="mobile">Office Mobile</label>
                                                                <input type="tel" class="form-control" id="mobile" maxlength="10" onfocus="mobilevalidate(this.id,'emis_mobile_alert');" onchange="mobilevalidate(this.id,'emis_mobile_alert');" autocomplete="off" onkeypress="return event.charCode >=48 && event.charCode <=57" name="office_mobile" placeholder="Mobile" value="<?php echo($basic[0]->office_mobile) ?>"/>
                                                                <font style="color:#dd4b39;"><div id="emis_mobile_alert"></div></font>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label for="stdcode_id2">Correspondent STD Code</label>
                                                                <select id="stdcode_id2" name="corr_std_code" class="form-control" >
                                                                    <!--<option value="<?php echo $basic[0]->sid; ?>" selected="selected"><?php echo $basic[0]->std_code; ?></option>-->
                                                                    <?php
                                                                        foreach($stdcode as $dis){
                                                                    ?>
                                                                            <option value="<?php echo($dis->id)?>" <?php if($basic[0]->corr_std_code==$dis->id){echo('selected="selected"');}?> ><?php echo($dis->std_code)?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <font style="color:#dd4b39;"><div id="emis_correstdcode_alert"></div></font>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="landline">Correspondent LandLine</label>
                                                                <input type="tel" class="form-control" maxlength="0"  onkeypress="return event.charCode >=48 && event.charCode <=57" id="landline2" name="corr_landlline" placeholder="LandLine" value="<?php echo($basic[0]->corr_landlline) ?>" />
                                                                <font style="color:#dd4b39;"><div id="emis_corresline_alert"></div></font>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="mobile">Correspondent/ Head Master Mobile</label>
                                                                <input type="tel" class="form-control" maxlength="10" onfocus="mobilevalidate1(this.id,'emis_corresmobile_alert');" onchange="mobilevalidate1(this.id,'emis_corresmobile_alert');" onkeypress="return event.charCode >=48 && event.charCode <=57" id="mobile2" name="corr_mobile" placeholder="Mobile"  value="<?php echo($basic[0]->corr_mobile) ?>"  />
                                                                <font style="color:#dd4b39;"><div id="emis_corresmobile_alert"></div></font>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="schemail">Email</label>
                                                                <input type="email" class="form-control" disabled="disabled" id="schemail" name="sch_email" onfocus="emailvalidate(this.id,'emis_schoolemail_alert');" onchange="emailvalidate(this.id,'emis_schoolemail_alert');" autocomplete="off" placeholder="example@example.com" value="<?php echo($basic[0]->sch_email) ?>" required="required"/>
                                                                <font style="color:#dd4b39;"><div id="emis_schoolemail_alert"></div></font>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="website">Website</label>
                                                                <input type="url" class="form-control" id="website" name="website"  onfocus="websitevalidate(this.id,'emis_schoolsite_alert');" onchange="websitevalidate(this.id,'emis_schoolsite_alert');" autocomplete="off" onblur="websitevalidate(this.id,'emis_schoolsite_alert')" placeholder="https://www.example.com" value="<?php echo($basic[0]->website) ?>" />
                                                                <font style="color:#dd4b39;"><div id="emis_schoolsite_alert"></div></font>
                                                            </div>
                                                        </div>
                                                        <button style="visibility:hidden;">DDDD</button>
                                                    </div>
                                                </div>
                                                <div class="portlet light portlet-fit ">
                                                    <!--<div class="portlet-title ">
                                                        <div class="caption">
                                                            <i class="fa fa-globe font-dark"></i>
                                                            <span class="caption-subject font-dark sbold uppercase">Establishment Details</span>
                                                        </div>
                                                    </div>-->
                                                    <div class="portlet-body">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th colspan="4" class="bg-primary text-white">
                                                                         <i class="fa fa-globe"></i>
                                                                        <span class="caption-subject text-white sbold uppercase" >Establishment Details</span>
                                                                         </th>
                                                                         
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="yearofestablishment">Year of establishment of School <font style="color:#dd4b39;">*</font></label>
                                                                <input type="number" class="form-control" min="1700" max="<?php echo date('Y'); ?>" maxlength="4" onfocus="textvalidate(this.id,'emis_establish_alert');" onchange="textvalidate(this.id,'emis_establish_alert');" onkeydown="return restlength(this)"  onblur="if(!restlength(this)){setMinandMax(this,'firstRecognition');}" onkeypress="return event.charCode >=48 && event.charCode <=57" id="yearofestablishment" name="yr_estd_schl" placeholder="1700" required="required" autocomplete="off" value="<?php echo $basic[0]->yr_estd_schl ?>" />
                                                                <font style="color:#dd4b39;"><div id="emis_establish_alert"></div></font>
                                                            </div>
                                                            <div class="form-group col-md-9">
                                                                <?php if(($this->session->userdata('school_manage')>1 && $this->session->userdata('school_manage')<5)) { ?>
                                                                <div class="form-group col-md-4">
                                                                    <label for="firstRecognition">Year of first recognition of School <font style="color:#dd4b39;">*</font></label>
                                                                    <input type="number" class="form-control" min="1900"  max="<?php echo date('Y'); ?>" maxlength="4" onfocus="textvalidate(this.id,'emis_recognition_alert');" onchange="textvalidate(this.id,'emis_recognition_alert');" onkeydown="return restlength(this)" onblur="if(!restlength(this)){setMinandMax(this,'lastrenewal');setMinandMax(this,'cwsn_lastrenewal');}" onkeypress="return event.charCode >=48 && event.charCode <=57" id="firstRecognition" name="yr_recgn_first" placeholder="1947" autocomplete="off" value="<?php echo $basic[0]->yr_recgn_first ?>" required="required"/>
                                                                     <font style="color:#dd4b39;"><div id="emis_recognition_alert"></div></font>
                                                                </div>
                                                                <div class="form-group col-md-8">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="lastrenewal">Year of last renewal of School<font style="color:#dd4b39;">*</font></label>
                                                                        <input type="number" disabled="disabled" class="form-control" min="<?php echo date('Y',strtotime('now - 3Years')); ?>" max="<?php echo date('Y'); ?>" maxlength="4" onfocus="textvalidate(this.id,'emis_renewal_alert');" onchange="textvalidate(this.id,'emis_renewal_alert');" onkeydown="return restlength(this)" onblur="return restlength(this); " onkeypress="return event.charCode >=48 && event.charCode <=57" id="lastrenewal" name="yr_last_renwl" placeholder="1947" autocomplete="off" value="<?php echo $basic[0]->yr_last_renwl ?>" required="required"/>
                                                                        <font style="color:#dd4b39;"><div id="emis_renewal_alert"></div></font>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="lastrenewalcertificatenumber">Certificate Number <font style="color:#dd4b39;">*</font></label>
                                                                        <input type="text" disabled="disabled" class="form-control" maxlength="40" minlength="1" onfocus="textvalidate(this.id,'emis_certificate_alert');" onchange="textvalidate(this.id,'emis_certificate_alert');" onkeypress="return ((event.charCode >=48 && event.charCode <=57) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 65 && event.charCode <= 90) || event.charCode == 32)" id="lastrenewalcertificatenumber" name="certifi_no" placeholder="1234567890" required="required" value="<?php echo $basic[0]->certifi_no; ?>" />
                                                                        <font style="color:#dd4b39;"><div id="emis_certificate_alert"></div></font>
                                                                    </div>
                                                                </div>
                                                                <?php }?>
                                                                <button style="visibility:hidden;">DDDD</button>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th>Year of Upgradation / Recognition <font style="color:#dd4b39;">*</font></th>
                                                                        <th>
                                                                            <select id="yearofrec" name="yearofrec_0" class="form-control" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);selectionValidation(this,this.parentNode.parentNode,1);setRequiredField(this.value,this.parentNode.nextElementSibling.children[0].id,'1,2,3');if(this.value==0){this.parentNode.nextElementSibling.children[0].setAttribute('readonly','readonly');}else{this.parentNode.nextElementSibling.children[0].removeAttribute('readonly');}" required>
                                                                                <option value="">Choose</option>
                                                                                <option value="1">Middle School</option>
                                                                                <option value="2">High School</option>
                                                                                <option value="3">Higher Secondary School</option>
                                                                                <option value="0">Not Applicable</option>
                                                                                
                                                                            </select>
                                                                             <div id="emisyearofrec_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        <th>
                                                                            <input type="number" class="form-control" min="1800"  max="<?php echo date('Y'); ?>" maxlength="4" onfocus="textvalidate(this.id,'emis_management_alert');" onchange="textvalidate(this.id,'emis_management_alert');" onkeydown="return restlength(this)" onblur="if(!restlength(this)){setMinandMax(this,'lastrenewal');setMinandMax(this,'cwsn_lastrenewal');}" onkeypress="return event.charCode >=48 && event.charCode <=57" id="firstRecognition_0" name="firstRecognition_0" placeholder="1800" required="required" autocomplete="off" value="<?php echo $basic[0]->yr_recgn_first ?>" />
                                                                            <font style="color:#dd4b39;"><div id="emis_management_alert"></div></font> 
                                                                        </th>
                                                                        <th>
                                                                            <button type="button" id="btnyearofrec_0" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,1)"><i class="fa fa-plus"></i></button>&nbsp;&nbsp;
                                                                            <button type="button" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,0)"><i class="fa fa-minus"></i></button>
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <!--<div class="form-group col-md-4">
                                                                <label for="yearofelementary">Year of Secondary <font style="color:#dd4b39;">*</font></label>
                                                                <input type="number" class="form-control" min="1825" max="<?php echo date('Y'); ?>" maxlength="4" onfocus="textvalidate(this.id,'emis_secondary_alert');" onchange="textvalidate(this.id,'emis_secondary_alert');" onkeydown="return restlength(this)"  onblur="if(!restlength(this)){setMinandMax(this,'firstRecognition');}" onkeypress="return event.charCode >=48 && event.charCode <=57" id="yearofsecondary" name="yearofsecondary" placeholder="1947" required="required" autocomplete="off" value="" />
                                                                <font style="color:#dd4b39;" id="emis_secondary_alert"></font>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="yearofelementary">Year of Higher Secondary <font style="color:#dd4b39;">*</font></label>
                                                                <input type="number" class="form-control" min="1825" max="<?php echo date('Y'); ?>" maxlength="4" onfocus="textvalidate(this.id,'emis_higher_alert');" onchange="textvalidate(this.id,'emis_higher_alert');" onkeydown="return restlength(this)"  onblur="if(!restlength(this)){setMinandMax(this,'firstRecognition');}" onkeypress="return event.charCode >=48 && event.charCode <=57" id="yearofhighersecond" name="yearofhighersecond" placeholder="1947" required="required" autocomplete="off" value="" />
                                                                <font style="color:#dd4b39;" id="emis_higher_alert"></font>
                                                            </div>-->
                                                            
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6"><label for="cwsn">Whether School for <strong>C</strong>hildren <strong>W</strong>ith <strong>S</strong>pecial <strong>N</strong>eeds <strong>(CWSN)</strong> <font style="color:#dd4b39;">*</font></label></div>
                                                                <div class="col-md-6">
                                                                    <label for="cwsn_1">YES &nbsp;</label>
                                                                    <input type="radio" disabled="disabled" id="cwsn_1" name="cwsn_scl" value="1" />
                                                                    <label for="cwsn_2">NO &nbsp;</label>
                                                                    <input type="radio" disabled="disabled" id="cwsn_2" name="cwsn_scl" value="0"  checked="checked" />
                                                                    <font style="color:#dd4b39;"><div id="emis_cwsn_alert"></div></font>
                                                                </div>
                                                            </div>
                                                           <!--onchange="document.getElementById('cwsnvisible').style.visibility=(this.checked?'':'hidden');setRequiredField(this.value,'cwsn_lastrenewal,cwsn_refrenceno','1')"
                                                           onchange="document.getElementById('cwsnvisible').style.visibility=(this.checked?'hidden':'');setRequiredField(this.value,'cwsn_lastrenewal,cwsn_refrenceno','1')"
                                                            <div class="form-group col-md-6" id="cwsnvisible">
                                                                <div class="form-group col-md-6">
                                                                    <label for="cwsn_lastrenewal">Validity upto - <strong>(CWSN)</strong></label>
                                                                    <input type="number" class="form-control" min="1920" max="<?php echo date('Y'); ?>" maxlength="4" onfocus="textvalidate(this.id,'emis_cwsnvalidity_alert');" onchange="textvalidate(this.id,'emis_cwsnvalidity_alert');" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >=48 && event.charCode <=57" id="cwsn_lastrenewal" name="spl_type" placeholder="1947" />
                                                                     <font style="color:#dd4b39;"><div id="emis_cwsnvalidity_alert"></div></font>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="cwsn_refrenceno">Certificate Number for <strong>(CWSN)</strong></label>
                                                                    <input type="text" class="form-control" maxlength="40" minlength="1" onfocus="textvalidate(this.id,'emis_cwsnnumber_alert');" onchange="textvalidate(this.id,'emis_cwsnnumber_alert');"  onkeypress="return event.charCode >=48 && event.charCode <=57 event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32"  id="cwsn_refrenceno" name="cwsn_refrenceno" placeholder="1234567890" />
                                                                    <font style="color:#dd4b39;"><div id="emis_cwsnnumber_alert"></div></font>
                                                                </div>
                                                            </div>-->
                                                            
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6"><label for="shiftschool" style="width: 387px;"><strong>Whether Shift School<font style="color:#dd4b39;">*</font></strong></label></div>
                                                                <div class="col-md-6">
                                                                    <label for="shift_1">YES &nbsp;</label>
                                                                    <input type="radio" disabled="disabled" id="shift_1" name="shftd_schl" value="1" />
                                                                    <label for="shift_2">NO &nbsp;</label>
                                                                    <input type="radio" disabled="disabled" id="shift_2" name="shftd_schl" value="0" checked="checked" />
                                                                    <font style="color:#dd4b39;"><div id="emis_shiftschool_alert"></div></font>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6">
                                                                    <label for="residential" style="width: 387px;"><strong>Whether Residential School <font style="color:#dd4b39;">*</font></strong></label>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label for="resi_1">YES &nbsp;</label>
                                                                    <input type="radio" disabled="disabled" id="resi_1" name="resid_schl" value="1" onchange="document.getElementById('resivisible').style.visibility=(this.checked?'':'hidden');setRequiredField(this.value,'resitype','1')"/>
                                                                    <label for="resi_2">NO &nbsp;</label>
                                                                    <input type="radio" disabled="disabled" id="resi_2" name="resid_schl" value="0" onchange="document.getElementById('resivisible').style.visibility=(this.checked?'hidden':'');setRequiredField(this.value,'resitype','1')" checked="checked"/>
                                                                    <font style="color:#dd4b39;"><div id="emis_resischool_alert"></div></font>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group col-md-12"  style="margin-top: -25px;" id="resivisible">
                                                                        <label for="resitype"><strong>Type of Residential</strong></label>
                                                                        <select style="width: 300px;" disabled="disabled" id="resitype" name="typ_resid_schl" class="form-control" onfocus="textvalidate(this.id,'emis_resitypeschool_alert');" onchange="textvalidate(this.id,'emis_resitypeschool_alert');">
                                                                            <option value="">Select Residential</option>
                                                                            <?php foreach($resitype as $dis){ ?>
                                                                            <option value="<?php echo($dis->RESITYPE_ID)?>"><?php echo($dis->RESITYPE_DESC)?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                        <font style="color:#dd4b39;"><div id="emis_resitypeschool_alert"></div></font>
                                                                    </div>
                                                                </div>
                                                              </div>
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6">
                                                                    <label for="schoolarea">Is the School situated in Hill/Forest/Others Area? <font style="color:#dd4b39;">*</font></label>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <select disabled="disabled" style="width: 300px;" class="form-control" id="schoolarea" name="hill_frst"  onfocus="textvalidate(this.id,'emis_schoolarea_alert');" onchange="textvalidate(this.id,'emis_schoolarea_alert');" required="required">
                                                                        <option value="">Choose</option>
                                                                        <option value="1">In Forest/Hill area</option>
                                                                        <option value="2">Near Forest/Hill area</option>
                                                                        <option value="3">Near the High ways</option>
                                                                        <option value="4">Near Coastal Area</option>
                                                                        <option value="0">Not Applicable</option>
                                                                    </select>
                                                                    <!--pri_stg_mothr_tngue  int(11) schoolnew_academicinfo_2-->
                                                                    <font style="color:#dd4b39;"><div id="emis_schoolarea_alert"></div></font>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group col-md-6">
                                                                    <label>Whether School has special educator ? <font style="color:#dd4b39;">*</font></label>
                                                                </div>
                                                                <div class="form-group col-md-6" style="width: 300px;">
                                                                    <input type="radio" id="spledtor_1" name="spl_edtor" value="2" ><label>Dedicated</label>
                                                                    <input type="radio" id="spledtor_2" name="spl_edtor" value="1" ><label>At cluster level</label>
                                                                    <input type="radio" id="spledtor_3" name="spl_edtor" value="0" checked="checked"><label>No</label>
                                                                </div>
                                                            </div>
                                                           
                                                        </div>
                                                        <button style="visibility:hidden;">DDDD</button>
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
        <!--<div class="modal" id="myModal">
            <div class="modal-dialog" style="width:80% !important;">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <h4 class="modal-title">Premilinary Details</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <div class="modal-body" id="modalbody">
                        <table class="table">
                            <thead>
                                <tr class="bg-primary text-white"><th colspan="4">Personal information</th></tr>
                            </thead>
                            <tbody>
                                <tr>
				                    <th>U-DISE Code</th>
				                    <td id="udise_code_td">hi</td>
                                    <th>School Name</th>
				                    <td id="school_name_td">hi</td>
                                </tr>   
                                <tr>
                                    <th>Latitude</th>
                                    <td id="latitude_td">hi</td>
                                    <th>Longitude</th>
				                    <td id="logitude_td">hi</td>
                                </tr>    
                                <tr class="bg-primary text-white"><th colspan="4">Location Details</th></tr>
                                <tr>
				                    <th>District</th>
				                    <td id="district_id_td">hi</td>
				                    <th>Local Body</th>
				                    <td id="localbody_id_td">hi</td>
                                </tr>
                                <tr>
                                    <th>Urban/Rural</th>
                                    <td id="urbanrural_td">&nbsp;</td>
                                    <th>Block</th>
				                    <td id="block_id_td">hi</td>
                                </tr>
                                <tr>
                                    <th>Village/Ward</th>
				                    <td id="village_ward_td">hi</td>
                                    <th>Cluster</th>
                                    <td id="cluster_id_td">hi</td>
                                </tr>
                                <tr>
                                    <th>Assembly Constituency</th>
                                    <td id="assembly_id_td">hi</td>
                                    <th>Parliment Constituency</th>
                                    <td id="parliment_id_td">hi</td>
                                </tr>
                                <tr>
                                    <th>Educational District</th>
                                    <td id="edu_district_id_td">hi</td>
                                    <th>Zip Code</th>
                                    <td id="pincode_td">hi</td>
                                </tr>
                                <tr class="bg-primary text-white"><th colspan="4">Communication Details</th></tr>
                                <tr>
                                    <th>Office STD Code</th>
                                    <td id="stdcode_id_td">hi</td>
                                    <th>Office LandLine</th>
                                    <td id="landline_td">hi</td>
                                </tr>
                                <tr>
                                    <th>Office Mobile</th>
                                    <td id="mobile_td">hi</td>
                                    <th>Correspondent STD Code</th>
                                    <td id="stdcode_id2_td">hi</td>
                                </tr>
                                <tr>
                                    <th>Correspondent LandLine</th>
                                    <td id="landline2_td">hi</td>
                                    <th>Correspondent Mobile</th>
                                    <td id="mobile2_td">hi</td>
                                </tr>
                                <tr>
                                    <th>E-Mail</th>
                                    <td id="schemail_td">hi</td>
                                    <th>Website</th>
                                    <td id="website_td">hi</td>
                                </tr>
                                <tr class="bg-primary text-white"><th colspan="4">Establishment Details</th></tr>
                                <tr>
                                    <th>Year of Establishment of School</th>
                                    <td id="yearofestablishment_td">hi</td>
                                    <th>Year of First Recognition of School</th>
                                    <td id="firstRecognition_td">hi</td>
                                </tr>
                                <tr>
                                    <th>Last Renewal</th>
                                    <td id="lastrenewal_td">hi</td>
                                    <th>Certificate Number</th>
                                    <td id="lastrenewalcertificatenumber_td">hi</td>
                                </tr>
                                <tr class="bg-primary text-white"><th colspan="4">CWSN(Child With Special Needs)</th></tr>
                                <tr>
                                    <th>CWSN(Child With Special Needs)</th>
                                    <td id="cwsn_td">hi</td>
                                    <th>Validity</th>
                                    <td id="cwsn_lastrenewal_td">hi</td>
                                </tr>
                                <tr>
                                    <th>Certificate Number</th>
                                    <td id="cwsn_refrenceno_td">hi</td>	 
                                    <th>Shift School</th>
                                    <td id="shiftschool_td"></td> 
                                </tr>
                                <tr>
                                    <th>Affilication Board</th>
                                    <td id="affilication_td">hi</td>
                                    <th>Residential School</th>
                                    <td id="residential_td">&nbsp;</td>
                                </tr>
                                <tr>
                                    <th>Type of Residential</th>
                                    <td id="resitype_td">hi</td>
                                    <th>School situated</th>
                                    <td id="schoolarea_td">hi</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="return popup('emis_schoolnew_basic_part1')">Submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>---->
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
        document.getElementById('resivisible').style.visibility='hidden';
        stdandlenthrest();
        //document.getElementById('cwsnvisible').style.visibility='hidden';
        /*$(document).ready(function(){ 
                $("#district_id").change(function(){ 
                    var district_id = $("#district_id").val();
                    $.ajax({
                        type: "POST",
                        url:baseurl+'Basic/getSTDCodeByDistrictID',
                        data:"&district_id="+district_id,
                        success: function(resp){
                            //alert(resp);  
                            $("#stdcode_id").html(resp);  
                            $("#stdcode_id2").html(resp);
                            return true;              
                        },
                        error: function(e){ 
                            alert('Error: ' + e.responseText);
                            return false;  
                        }
                    });
                });  
            }); */
            $(document).ready(function(){ 
                $("#manage_cate_id").change(function(){ 
                    var mana_cate_id = $("#manage_cate_id").val();
                    $.ajax({
                        type: "POST",
                        url:baseurl+'Basic/getsubbymajorcategory/opt',
                        data:"&mana_cate_id="+mana_cate_id,
                        success: function(resp){
                            //alert(resp);  
                            $("#sch_management_id").html(resp);  
                            return true;              
                        },
                        error: function(e){ 
                            alert('Error: ' + e.responseText);
                            return false;  
                        }
                    });
                });  
            }); 
            $(document).ready(function(){ 
                $("#sch_management_id").change(function(){ 
                    var mana_cate_id = $("#sch_management_id").val();
                    $.ajax({
                        type: "POST",
                        url:baseurl+'Basic/getdirectoratebysub/opt',
                        data:"&school_mana_id="+mana_cate_id,
                        success: function(resp){
                            //alert(resp);  
                            $("#sch_directorate_id").html(resp);  
                            return true;              
                        },
                        error: function(e){ 
                            alert('Error: ' + e.responseText);
                            return false;  
                        }
                    });
                });  
            }); 
            
            function stdandlenthrest(){
                var std1=document.getElementById('stdcode_id');
                var stdval=std1.options[std1.selectedIndex].text;
                var stdlen=stdval.length;
                var asslen=11-stdlen;
                document.getElementById('landline').setAttribute('maxlength',asslen);
                document.getElementById('landline2').setAttribute('maxlength',asslen);
            }
    </script>
</body>
</html>