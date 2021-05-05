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
    
    <style type="text/css">
        .tooltip-inner {
            max-width:100% !important;
        }
    </style>
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
                                        <?php 
                                            if((empty($renew) || $this->uri->segment(3,0)!='' )){
                                                if(empty($pc)){
                                        ?>
                                        <script>
                                            alert('School May not be Active. Kindly contact with CEO');
                                            window.location.href="<?php echo base_url().'Home/emis_school_dash'; ?>";
                                        </script>
                                        <?php       
                                                }
                                                if($pc[0]['p1']==1 && $pc[0]['p2']==1 && $pc[0]['p3']==1 && $pc[0]['p4']==1 && $pc[0]['p5']==1 && $pc[0]['p6']==1 && $pc[0]['p7']==1){
                                        ?>
                                        <div class="portlet-body">
                                            <div class ="row">
                                                <div class="col-md-4">
                                                    <font style="color:#dd4b39;"><?php echo $this->session->flashdata('errors'); ?></font>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $user_type_id = $this->session->userdata('emis_user_type_id'); ?> 
                                        <div class="form-actions">
                                            <form id="schoolRenewalform" method="post" action="<?php echo base_url().'Basic/schoolRenewalsubmit/';?>" enctype="multipart/form-data" onsubmit="return filesizelimit(this.id);">
                                                <div class="portlet light portlet-fit ">
													
													<div class="portlet-title">
                                                        <div class="caption col-md-12">
                                                            <i class="fa fa-book font-dark"></i>
                                                            <span class="caption-subject font-dark sbold uppercase">Renewal Form</span>
                                                        </div>
                                                         <!--<div class="col-md-3">
                                                            <button type="button" id="btnedit" class="btn btn-primary" onclick="postRequest(createJSON(this.form),'<?php echo base_url().'Basic/getPartInformationByPost/';?>',this.form);">Apply Renewal</button>
                                                        </div>-->
                                                    </div>
													
                                                    <div class="form-group col-md-12">
                                                        <table class="table">
                                                            <tr>
                                                                <th colspan="6" class="bg-primary text-white">
                                                                    <i class="fa fa-book"></i>
                                                                    <span class="caption-subject text-white sbold uppercase" >School Details</span>
                                                                </th>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td><label>School Name</label></td>
                                                                <td><input type="text" class="form-control" id="school_name" name="school_name" onfocus="textvalidate(this.id,'emis_schoolname_alert');" onchange="textvalidate(this.id,'emis_schoolname_alert');" autocomplete="off"  placeholder="SCHOOL NAME" required="required" value="<?php echo $basic[0]->school_name; ?>" <?php if($basic[0]->school_name!=''){echo(' readonly="readonly"');} ?> /></td>
                                                                <td><label>Udise Code</label></td>
																<td>
                                                                    <input type="text" class="form-control" id="udise_code" onfocus="textvalidate(this.id,'emis_udisecode_alert');" onchange="textvalidate(this.id,'emis_udisecode_alert');" autocomplete="off"  name="udise_code" placeholder="UDISE CODE" required="required" value="<?php echo $basic[0]->udise_code; ?>" <?php if($basic[0]->udise_code!=''){echo(' readonly="readonly"');} ?> />
                                                                    <input type="hidden" name="school_key_id" id="school_key_id" value="<?php echo($this->session->userdata('emis_school_id')); ?>" />
                                                                    <input type="hidden" name="renewal_id" id="renewal_id" value="<?php echo($this->uri->segment(3,0)); ?>" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <?php
                                                                    $address=explode('\n',$basic[0]->address); 
                                                                ?>
                                                                <td><label>School <br /> Address Line 1</label></td>
																<td><input type="text" id="addressline_1" name="addressline_1" class="form-control" readonly="readonly" value="<?php echo($address[0]); ?>" /></td>
																<td><label>School <br /> Address Line 2</label></td>
																<td><input type="text" id="addressline_2" name="addressline_2" class="form-control" readonly="readonly" value="<?php echo($address[1]); ?>" /></td>
                                                            </tr>
                                                            <!--<tr>
                                                                
                                                                <td><label>Does the institution have minority status?</label></td>
																<td>
																	<div>
																		<input type="radio" value="1" id="minority_1" name="minorityinst"><label>YES</label>
                                                                        <input type="radio" value="0" id="minority_2" name="minorityinst" checked="checked" ><label>NO</label>
																	</div>
																</td>
                                                               
                                                                    <td><label>if yes, Upload Minority declaration</label></td>
																<td>
																	<div>
																		<input type="file" class="form-control">
																	</div>
																</td>
                                                                
                                                            </tr>-->
                                                            
                                                        </table>
                                                    
                                                    </div>
                                                    
                                                            <div class="form-group col-md-12">
                                                            <div class="col-md-4">
                                                                <label for="manage_cate_id">Select Management Category <font style="color:#dd4b39;">*</font></label>
                                                                <select id="manage_cate_id" name="manage_cate_id" class="form-control" required readonly>
                                                                    <option value="<?php echo $basic[0]->manage_cate_id; ?>"><?php echo($basic[0]->manage_name); ?></option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="sch_management_id">Select Management <font style="color:#dd4b39;">*</font></label>
                                                                <select id="sch_management_id" name="sch_management_id" class="form-control" required readonly>
                                                                <option value="<?php echo $basic[0]->sch_management_id; ?>"><?php echo($basic[0]->management); ?></option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="sch_directorate_id">Select Affiliation <font style="color:#dd4b39;">*</font></label>
                                                                <select id="sch_directorate_id" name="sch_directorate_id" class="form-control" required readonly><!--Directorate&nbsp;/&nbsp;Department&nbsp;/&nbsp;-->
                                                                <option value="<?php echo $basic[0]->sch_directorate_id; ?>"><?php echo($basic[0]->department); ?></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                       
                                                         
                                                    <!--<div class="form-group col-md-12">
                                                        <table class="table">
                                                            <tr>
                                                                <th colspan="6" class="bg-primary text-white">
                                                                    <i class="fa fa-book"></i>
                                                                    <span class="caption-subject text-white sbold uppercase" >Management Trust</span>
                                                                </th>
                                                            </tr>
                                                            <tr><th>Trust Details</th></tr>
                                                            <tr>
                                                                <td><label>Name of the Management Trust</label></td>
                                                                <td><div>
                                                                    <input type="text" class="form-control">
                                                                </div></td>
                                                                <td><label>Address of the Trust</label></td>
                                                                <td><div>
                                                                    <input type="text" class="form-control">
                                                                </div></td>
                                                                <td><label>Pincode</label></td>
                                                                <td><div>
                                                                    <input type="text" class="form-control">
                                                                </div></td>
                                                                
                                                            </tr>
                                                            <tr><th colspan="6">Registration details</th></tr>
                                                            <tr>
                                                            <td><label>Is the trust registered?</label></td>
                                                            <td>
																<div>
																	<input type="radio" value="1" id="trust_1" name="trustinst"><label>YES</label>
                                                                    <input type="radio" value="0" id="trust_2" name="trustinst" checked="checked" ><label>NO</label>
																</div>
															</td>
                                                            <td><label>if yes, Date of Registration</label></td>
                                                                <td><div>
                                                                    <input type="date" max="<?php echo (date('Y-m-d',strtotime('now'))); ?>" class="form-control">
                                                                </div></td>
                                                                
                                                                <td><label>Place of Registration</label></td>
                                                                <td><div>
                                                                    <input type="text" class="form-control">
                                                                </div></td>
                                                            </tr>
                                                            <tr><th colspan="6">Name of other institutions to which the Management Trust is running</th></tr>
                                                            <tr>
                                                                <td><label>Name of Institution</label></td>
                                                                <td><div>
                                                                    <input type="text" class="form-control">
                                                                </div></td>
                                                                <td><label>Place</label></td>
                                                                <td><div>
                                                                    <input type="text" class="form-control">
                                                                </div></td>
                                                                <td>
                                                                   <button type="button" class="btn" ><i class="fa fa-plus"></i></button>&nbsp;&nbsp;
                                                                   <button type="button" class="btn" ><i class="fa fa-minus"></i></button>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    
                                                    </div>-->
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-group col-md-12">
														<table class="table">
															<tr>
																<th colspan="8" class="bg-primary text-white">
                                                                    <i class="fa fa-book"></i>
                                                                    <span class="caption-subject text-white sbold uppercase" >School Recognition</span>
                                                                </th>
															</tr>
                                                            <!--<tr>
                                                                <th >
                                                                Upload previous recognition order 
                                                                </th>
                                                            </tr>-->
                                                            <!--<tr>
                                                                <td ><label>Upload latest permission / recognition order</label></td>
                                                                <td colspan="2"><div><input type="file" class="form-control"/></div></td>
                                                            </tr>-->
                                                            
                                                                <tr>
                                                                <td><label>Year of &nbsp; <strong><?php if($basic[0]->yr_last_renwl!=''){echo('Last Renewal');}else{echo('First Recognition');} ?></strong></label></td>
                                                                <td><input type="text" class="form-control" name="<?php if($basic[0]->yr_last_renwl!=''){echo('yr_last_renwl');}else{echo('yr_recgn_first');} ?>" id="<?php if($basic[0]->yr_last_renwl!=''){echo('yr_last_renwl');}else{echo('yr_recgn_first');} ?>" readonly="readonly" value="<?php if($basic[0]->yr_last_renwl!=''){echo($basic[0]->yr_last_renwl);}else{echo($basic[0]->yr_recgn_first);} ?>" /></td>
                                                                <td><label>Upload previous <strong><?php if($basic[0]->yr_last_renwl!=''){echo('renewal');}else{echo('recognition');} ?></strong> order </label></td>
																<td>
																	<div>
																		<input type="file" id="latestPermission" name="latestPermission_0" class="form-control" onchange="this.nextElementSibling.value=0;restrictImage(this.id);setFileSize();" accept=".jpg,.jpeg,.JPG,.JPEG,.pdf,.doc,.docx"  required="required"/>
                                                                        <input type="hidden" id="latestPermission_size" onchange="setFileSize()" value="0" />
																	</div>
																</td>
                                                                <td id="latestPermission_td">
                                                                    <?php if(!empty($renew)){ ?>
                                                                    <span class="badge badge-primary"><?php echo($renew[0]['lastrenewal_filename']); ?> &nbsp;<a href="javascript:;" onclick="removefile('<?php echo($renew[0]['id']); ?>',1)"><i class="fa fa-unlink" style="color:white !important;"></i></a></span> 
                                                                    <?php } ?>
                                                                </td>
                                                                <!--<td>
                                                                        <button type="button" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,1)"><i class="fa fa-plus"></i></button>&nbsp;&nbsp;
                                                                        <button type="button" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,0)"><i class="fa fa-minus"></i></button>
                                                                </td>-->
                                                            </tr>
                                                            <tr >
                                                                <td colspan="2"><label>Whether all the condition imposed at the time of granting recognition where fulfilled.</label></td>
                                                                <td colspan="2">
                                                                    <?php
                                                                        switch($renew[0]['conditionstatisfied']){
                                                                            case 'NOT APPLICABLE':$c4=' checked="checked" ';break;
                                                                            case 'FULLY SATISFIED':$c3=' checked="checked" ';break;
                                                                            case 'PARTLY SATISFIED':$c2=' checked="checked" ';break;
                                                                            case 'NONE SATISFIED':$c1=' checked="checked" ';break;
                                                                            default:$c4=' checked="checked" ';
                                                                        }                                                                     ?>
                                                                    <label for="condition_0">Fully Statisfied</label>
                                                                    <input type="radio" id="condition_0" name="condsatisfied" value="1" <?php echo($c1); ?> />
                                                                    <label for="condition_1">Partly Statisfied</label>
                                                                    <input type="radio" id="condition_1" name="condsatisfied" value="2" <?php echo($c2); ?> />
                                                                    <label for="condition_2">None Statisfied</label>
                                                                    <input type="radio" id="condition_2" name="condsatisfied" value="3" <?php echo($c3); ?> />
                                                                    <label for="condition_3">Not Applicable</label>
                                                                    <input type="radio" id="condition_3" name="condsatisfied" checked="checked" value="4" <?php echo($c4); ?> />
                                                                </td>
                                                            </tr>
                                                            
                                                            <!---->
                                                            
                                                        </table>
                                                            
                                                    </div>
                                                    <!--<div class="form-group col-md-12">
                                                        <table class="table">
                                                            <tr>
                                                                <tr>
                                                                    <th colspan="8">
                                                                        Recognition sought for Standards
                                                                    </th>
                                                                 </tr>
                                                                 <tr>
                                                                <td>
                                                                    <label>From</label>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <input type="text" id="schooltype" name="schooltype" maxlength="6"  onfocus="textvalidate(this.id,'emis_schooltype_alert');" onchange="textvalidate(this.id,'emis_schooltype_alert');" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" required="required" class="form-control">
                                                                        <font style="color:#dd4b39;"><div id="emis_schooltype_alert"></div></font>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td>
                                                                    <label>To</label>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <input type="text" id="schooltype" name="schooltype" maxlength="6"  onfocus="textvalidate(this.id,'emis_schooltype_alert');" onchange="textvalidate(this.id,'emis_schooltype_alert');" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" required="required" class="form-control">
                                                                        <font style="color:#dd4b39;"><div id="emis_schooltype_alert"></div></font>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td>
                                                                    <label>From the period</label>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <input type="text" id="schooltype" name="schooltype" maxlength="6"  onfocus="textvalidate(this.id,'emis_schooltype_alert');" onchange="textvalidate(this.id,'emis_schooltype_alert');" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" required="required" class="form-control">
                                                                        <font style="color:#dd4b39;"><div id="emis_schooltype_alert"></div></font>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td>
                                                                    <label>To the period</label>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <input type="text" id="schooltype" name="schooltype" maxlength="6"  onfocus="textvalidate(this.id,'emis_schooltype_alert');" onchange="textvalidate(this.id,'emis_schooltype_alert');" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" required="required" class="form-control">
                                                                        <font style="color:#dd4b39;"><div id="emis_schooltype_alert"></div></font>
                                                                    </div>
                                                                </td>
                                                                
                                                                
                                                            </tr>
                                                                 
                                                            </tr>
                                                        </table>
                                                    </div>-->
                                                    
                                                    
                                                    
													
													<div class="form-group col-md-12">
														<table class="table">
															<tr>
																<th colspan="3" class="bg-primary text-white">
                                                                    <i class="fa fa-book"></i>
                                                                    <span class="caption-subject text-white sbold uppercase" >Certificates</span>
                                                                </th>
															</tr>
                                                            <?php
                                                                //print_r($certificate);
                                                                $i=0;
                                                                foreach($certificate as $cer){ 
                                                            ?>
                                                            <tr>
                                                                <!--<th>Construction:</th>
                                                                <th >Floor</th>
                                                                <th>Class Rooms</th>
                                                                <th>Office room</th>
                                                                <th>Lab room</th>
                                                                <th>Library room</th>
                                                                <th>Computer room</th>
                                                                <th>Arts/Craft room</th>
                                                                <th>Staff Room</th>
                                                                <th>HM/AHM Room</th>
                                                                <th>Girls</th>
                                                                <th>Total Rooms</th>-->
                                                                <th><?php echo($cer->certificatename); ?><?php if($cer->required==1){?><font style="color:#dd4b39;">*</font><?php } ?></th>
                                                                <th><input type="file" id="cmp_file_<?php echo($cer->id); ?>" name="cmp_file_<?php echo($cer->id); ?>[]" class="form-control" onchange="this.nextElementSibling.value=0;restrictImage(this.id);setFileSize()" multiple="multiple" accept=".jpg,.jpeg,.JPG,.JPEG,.pdf,.doc,.docx" <?php if($cer->required==1){?>required="required"<?php } ?> />
                                                                <input type="hidden" id="cmp_file_<?php echo($cer->id); ?>_size" value="0" onchange="setFileSize()" /></th>
                                                                <th id="cmp_file_<?php echo($cer->id); ?>_td">
                                                                    <?php
                                                                    if(!empty($renew)){
                                                                        $result = array();$key='certificate_id';
                                                                        foreach($renew as $val) {
                                                                            if(array_key_exists($key, $val)){
                                                                                $result[$val[$key]][] = $val;
                                                                            }else{
                                                                                $result[""][] = $val;
                                                                            }
                                                                        }
                                                                        krsort($result);
                                                                        //print_r($result);
                                                                        if(isset($result[$cer->id])){
                                                                            foreach($result[$cer->id] as $r){
                                                                                if($r['certificate_id']==$cer->id && $r['approvedby']==-3){
                                                                    ?>
                                                                        <span class="badge badge-primary"><?php echo($r['certificate_filename']) ?> &nbsp;<a href="javascript:;" onclick="removefile('<?php echo($r['fileid']) ?>',2)"><i class="fa fa-unlink" style="color:white !important;"></i></a></span>   
                                                                    <?php
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                    ?>
                                                                </th>
                                                            </tr>
                                                            <?php $i++;} ?>
														</table>
													</div>
                                                    <div class="form-group col-md-12">
														<table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="7" class="bg-primary text-white">
                                                                        <i class="fa fa-book"></i>
                                                                        <span class="caption-subject text-white sbold uppercase" >Fee Details</span>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td colspan="3">
                                                                        <input type="checkbox" name="renewal" value="1" id="renewal" checked="checked" readonly="readonly" style="visibility: hidden;"/><label for="renewal" style="visibility: hidden;">Renewal</label>
                                                                        <input type="checkbox" name="upgrade" value="2" id="upgrade" disabled="disabled" style="visibility: hidden;"/><label for="upgrade" style="visibility: hidden;">Upgradation</label>
                                                                        <input type="checkbox" name="additional" value="3" id="additional" disabled="disabled" style="visibility: hidden;"/><label for="additional" style="visibility: hidden;">Additional Classes</label>
                                                                    </td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Amount to be paid:</td>
                                                                    <td>Challan No:</td>
                                                                    <td>Challan Date:</td>
                                                                    <td>IFSC:</td>
                                                                    <td></td>
                                                                    <td>Upload Challan:</td>
                                                                </tr>
                                                                <tr>  
                                                                    <td><input type="text" id="amount_0" name="amount_0" class="form-control" value="<?php echo($renew[0]['amount']); ?>" required /></td>
                                                                    <td><input type="text" id="challannumber_0" name="challannumber_0" class="form-control" value="<?php echo($renew[0]['challan_no']); ?>" required /></td>
                                                                    <td><input type="date" id="challandate_0" name="challandate_0" class="form-control" onkeydown="return false" min="<?php echo (date('Y-m-d',strtotime('now-3Years'))); ?>"  max="<?php echo (date('Y-m-d',strtotime('now'))); ?>" value="<?php echo($renew[0]['challan_date']); ?>" required /></td>
                                                                    <td>
                                                                        <input type="text" id="ifsc_0" name="ifsc_0" class="form-control" maxlength="11" onkeyup="this.value=this.value.toUpperCase();" onblur="return ifscsearch(this,this.parentNode.nextElementSibling)" pattern="^[A-Za-z]{4}[a-zA-Z0-9]{7}$" autocomplete="off" required />
                                                                    </td>
                                                                    <td id="ifscfetch_0"></td>
					                                                <td>
																        <input type="file" class="form-control" id="challan_0" name="challan_0" onchange="this.nextElementSibling.value=0;restrictImage(this.id);setFileSize();" accept=".jpg,.jpeg,.JPG,.JPEG,.pdf,.doc,.docx"  required="required"/>
                                                                        <input type="hidden" id="challan_0_size" onchange="setFileSize()" value="0" />
						                                            </td>
                                                                    <td id="challan_0_td">
                                                                        <?php if(!empty($renew)){ ?>
                                                                        <span class="badge badge-primary"><?php echo($renew[0]['challan_filename']) ?> &nbsp;<a href="#"><i class="fa fa-unlink" style="color:white !important;"></i></a></span>
                                                                        <?php } ?> 
                                                                    </td>
                                                                </tr>
                                                            </tbody> 
                                                        </table>
                                                    </div>
                                                    <!--<div class="form-group col-md-12">
                                                         <table class="table">
                                                            <tr>
                                                                <td><strong>School Remarks, if any:</strong></td>
                                                                <td><textarea class="form-control" id="schoolremarks" name="schoolremarks" maxlength="500" onkeypress="return (event.charCode >=48 && event.charCode <=57) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 65 && event.charCode <= 90) || event.charCode == 8 || event.charCode == 32 || event.charCode == 44 || event.charCode == 46"></textarea></td>
                                                            </tr>
                                                         </table>
                                                    </div>-->
                                                    <!--<div class="form-group col-md-12">
                                                        <table class="table">
                                                            <tr>
                                                                <th colspan="4" class="bg-primary text-white">
                                                                    <i class="fa fa-book"></i>
                                                                    <span class="caption-subject text-white sbold uppercase" >Management Trust Details</span>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <td>Is the institute run by Trust / Society</td>
                                                                <td>
                                                                    <input type="radio" value="1" name="trust"/><label>Trust</label>
                                                                    <input type="radio" value="0" name="trust" checked="checked"/><label>Society</label>
                                                                </td>
                                                                <td>Name of the Trust / Society</td>
                                                                <td><input type="text" class="form-control" id="name_trust" name="name_trust"></td>
                                                            </tr>
                                                            <tr >
                                                                <td style="border: none;">Is the Trust / Society Registered?</td>
                                                                <td style="border: none;">
                                                                    <input type="radio" value="1" name="register_trust"/><label>Yes</label>
                                                                    <input type="radio" value="0" name="register_trust" checked="checked"/><label>No</label>
                                                                </td>
                                                                 <td style="border: none;">Registration number of Trust / Society</td>
                                                                 <td style="border: none;"><input type="text" class="form-control" id="regno_trust" name="regno_trust"></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="border: none;">Date of Registration</td>
                                                                <td style="border: none;"><input type="date" class="form-control" id="date_trust" name="date_trust"></td>
                                                                <td style="border: none;">Place of Registration</td>
                                                                <td style="border: none;"><input type="text" class="form-control" id="place_trust" name="place_trust"></td>
                                                            </tr>
                                                            </table>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th style="text-align: center;">Name of the Trustee</th>
                                                                        <th style="text-align: center;">Phone number of the Trustee</th>
                                                                        <th style="text-align: center;">E-mail of the Trustee</th>
                                                                     </tr>
                                                                     <tr>
                                                                        <td><input type="text" class="form-control" id="name_trustee" name="name_trustee"></td>
                                                                        <td><input type="text" class="form-control" id="phone_trustee" name="phone_trustee"></td>
                                                                        <td><input type="text" class="form-control" id="email_trustee" name="email_trustee"></td>
                                                                     </tr>
                                                                </table>
                                                            </div>-->
                                                            
                                                        
                                                   
                                                        <table class="table">
                                                            <tr>
                                                                <th>Total Size of All Files Attached</th>
                                                                <th><span id="totsize"></span><input type="hidden" id="totsize_hidden" name="totsize_hidden" value="0" /></th>
                                                            </tr>
                                                        </table>
												</div>
                                                <div class="form-row text-center">
                                                    <?php if($this->uri->segment(4,0)=='success' && $this->uri->segment(4,0)!=''){ ?>
                                                    <div class="form-group col-md-9">
                                                        <button type="button" class="btn btn-primary" onclick="filesizelimit(this.parentNode.parentNode.parentNode.id);">Submit</button>
                                                        <button type="button" onclick="location.href='<?php echo $_SERVER['PHP_SELF'];?>'" class="btn default">Cancel</button>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <button type="button" class="btn btn-primary" onclick="location.href='<?php echo substr($_SERVER['PHP_SELF'], 0, -10)."/".(substr($_SERVER['PHP_SELF'], 53, -8)+1);?>'">NEXT</button>
                                                    </div>
                                                    <?php }
                                                        else{ 
                                                    ?>
                                                    <div class="form-group col-md-12">
                                                        <button type="button" class="btn btn-primary" onclick="filesizelimit(this.parentNode.parentNode.parentNode.id);">Submit</button>
                                                        <button type="button" onclick="location.href='<?php echo $_SERVER['PHP_SELF'];?>'" class="btn default">Cancel</button>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                                <button style="visibility:hidden;">DDDD</button>
                                            </form>
                                        </div>
                                        <?php 
                                                }
                                                else{
                                        ?> 
                                                    <h2>Kindly Complete All School Profile Forms And Apply For Renewal</h2>
                                        <?php
                                                }
                                            }
                                            else{ 
                                        ?>
                                        <ol class="track-progress">
                                            <li class="done">
                                                <em>1</em>
                                                <span>Applied <strong>(<?php echo(date('d/m/Y h:i:s',strtotime($renew[0]['createddate']))); ?>)</strong></span>
                                            </li>
                                        <?php 
                                            $res = array();$key='approveid';
                                            foreach($renew as $val) {
                                                if(array_key_exists($key, $val)){
                                                    $res[$val[$key]][] = $val;
                                                }else{
                                                    $res[""][] = $val;
                                                }
                                            }
                                            $result=array_reverse($res);
                                            
                                            $finValue=count($result);
                                            $finCount=1;
                                            foreach($result as $key => $arrvalue){
                                                $check=$arrvalue[0]['appprocess'];
                                                //echo(strpos($check,"WAITING"));die();
                                                if(strpos($check,"WAITING")!='' || strpos($check,"SENT")!=''){
                                                   $class='todo';
                                                }
                                                else{
                                                    $class='done'; 
                                                }
                                                foreach($user as $use){
                                                    if($arrvalue[0]['approvedby']==$use['id']){
                                                        $dis=$use['user_type'].'-';
                                                    }
                                                }
                                                
                                                if($arrvalue[0]['approvedby']==-1){
                                                    $dis='REJECTED-';
                                                    //$check='<a href="'.base_url().'Home/renewalform/'.$renew[0]['renewal_id'].'">REAPPLICATION</a>';
                                                }
                                                $displaycont=$dis.$check;
                                                
                                                $cre=explode("-",$displaycont);
                                                //print_r($cre);die();
                                                if($cre[0]!=''){ //echo(strpos($cre[0],"http"));die();
                                        ?>
                                            
                                            <li class="<?php echo($class); ?>" data-html="true" data-toggle="tooltip" title="<?php echo($arrvalue[0]['approveremarks']); ?><br><?php echo(date("d/m/Y H:i:s",strtotime($arrvalue[0]['ts']))); ?>">
                                                <em><?php echo($arrvalue[0]['approvedby']); ?></em>
                                                <span><?php 
                                                    //if(in_array($arrvalue[0]['sch_directorate_id'],$directorate_dee) && $arrvalue[0]['approvedby']==2){$temp=1;$check='';}
                                                    if($arrvalue[0]['appprocess']=='APPROVED'){$cre[0]='<a href="'.base_url().'Basic/pdf">RENEWAL</a>'.' / '.'<a href="'.$arrvalue[0]['contidion_file'].'">CONDITIONS</a>';}
                                                    if($arrvalue[0]['approvedby']==-1){$cre[0]='<a href="'.base_url().'Home/renewalform/'.$renew[0]['renewal_id'].'">REAPPLICATION</a>';}
                                                    //$check=$arrvalue[0]['approvedby']>0?(($arrvalue[0]['approvedby']!=1 && $arrvalue[0]['approvedby']!=-3)?' RECOMMENDED':''):(($arrvalue[0]['approvedby']<-1)?' RECOMMENDED':' REJECTED'); 
                                                    if(strpos($cre[0],"WAITING")!='' && strpos($cre[0],"SENT")!='' && (strpos($cre[0],"http")!='' || strpos($cre[0],"https")!='')){
                                                        $diss=$cre[0]." FORWARDED";
                                                    }else{
                                                        $diss=$cre[0];
                                                    }
                                                    
                                                    //echo($cre[0].(((strpos($cre[0],"WAITING")!='' && strpos($cre[0],"SENT")!='') || (strpos($cre[0],"http")!='' || strpos($cre[0],"https")!=''))?"":" FORWARDED"));
                                                    echo($diss); 
                                                ?></span>
                                            </li>
                                        <?php
                                                }
                                                if($cre[1]!='' && $finCount==$finValue && $cre[1]!='APPROVED' &&  $cre[1]!='REJECTED'){
                                        ?>
                                            <li class="todo" data-html="true" data-toggle="tooltip" title="<?php echo($arrvalue[0]['approveremarks']); ?><br><?php echo(date("d/m/Y H:i:s",strtotime($arrvalue[0]['ts']))); ?>">
                                                <em><?php echo($arrvalue[0]['approvedby']); ?></em>
                                                <span><?php 
                                                    //if(in_array($arrvalue[0]['sch_directorate_id'],$directorate_dee) && $arrvalue[0]['approvedby']==2){$temp=1;$check='';}
                                                    if($arrvalue[0]['appprocess']=='APPROVED'){$displaycont='<a href="'.base_url().'Basic/pdf">RENEWAL</a>'.' / '.'<a href="'.$arrvalue[0]['contidion_file'].'">CONDITIONS</a>';}
                                                    if($arrvalue[0]['approvedby']==-1){$dis='<a href="'.base_url().'Home/renewalform/'.$renew[0]['renewal_id'].'">REAPPLICATION</a>';}
                                                    //$check=$arrvalue[0]['approvedby']>0?(($arrvalue[0]['approvedby']!=1 && $arrvalue[0]['approvedby']!=-3)?' RECOMMENDED':''):(($arrvalue[0]['approvedby']<-1)?' RECOMMENDED':' REJECTED'); 
                                                    echo($cre[1]); 
                                                ?></span>
                                            </li>
                                        <?php
                                                }
                                                $finCount++;
                                            }
                                        } ?>
                                            <li style="clear:both;display:block;visibility:hidden;margin-bottom:5px;float:none;">&nbsp;</li>
                                        </ol>
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
        $(document).ready(function(){
             $('[data-toggle="tooltip"]').tooltip();   
        });
        function restrictImage(fileID){ 
            //alert(fileID);
            // GET THE FILE INPUT.
            var tot=0;
            var fi = document.getElementById(fileID);
            // VALIDATE OR CHECK IF ANY FILE IS SELECTED.
            if (fi.files.length > 0) {
                // THE TOTAL FILE COUNT.
                document.getElementById(fileID+'_td').innerHTML ='Total Files: <b>' + fi.files.length + '</b></br >';
                // RUN A LOOP TO CHECK EACH SELECTED FILE
                for (var i = 0; i <= fi.files.length - 1; i++) {
                    var fname = fi.files.item(i).name;      // THE NAME OF THE FILE.
                    var fsize = fi.files.item(i).size;      // THE SIZE OF THE FILE.
                    // SHOW THE EXTRACTED DETAILS OF THE FILE.
                    document.getElementById(fileID+'_td').innerHTML =document.getElementById(fileID+'_td').innerHTML + '<br /> ' + fname + ' (<b>' + fsize + '</b> bytes)';
                    fi.nextElementSibling.value=parseInt(fi.nextElementSibling.value)+fsize;
                    var ooo=fi.nextElementSibling;
                    if(ooo.hasAttribute('onchange')){
                        ooo.onchange();
                    }
                    else{
                        alert(fi.nextElementSibling.id);
                    }
                }
            }
            else{
               document.getElementById(fileID+'_td').innerHTML ='';
               fi.nextElementSibling.value=0;
               fi.nextElementSibling.onchange(); 
            }
        }    
        
        function filesizelimit(node){
            var fisize=parseInt(document.getElementById('totsize_hidden').value);
            if((fisize/1000/1000)>8){
                alert('Total File Size Limited to 8Mb');
                return false;
            }
            checkRequired(node);
        }
        
        function setFileSize(){
            document.getElementById('totsize_hidden').value=0;
            var hele=document.querySelectorAll('input[type="hidden"]');
            var sum=0,v;
            for(h in hele){
                if(checkInstanceof(hele[h])){
                    if(hele[h].id!=undefined && hele[h].id!=null && hele[h].id!='totsize_hidden' && hele[h].id!='renewal_id' && hele[h].id!='school_key_id')
                        sum+=parseInt(hele[h].value);
                }
            }
            document.getElementById('totsize_hidden').value=sum;
            document.getElementById('totsize').innerHTML=parseFloat(sum/1000/1000).toFixed(2)+' Mb';
        }
        
        function ifscsearch(node,rtmnode){
            var reg = node.getAttribute('pattern');
            var add='';
            if(node.value.match(reg)){
                var appli_class = $("#appli_class").val();
                    $.ajax({
                        type: "POST",
                        url:baseurl+'Basic/getBankByIFSC',
                        data:"&ifsc="+node.value,
                        success: function(resp){
                            var js=JSON.parse(resp);
                            if(js!=''){
                                add+='<strong>'+js[0]['bank_name']+'<br>'+js[0]['branch']+'<br>'+js[0]['branch_add']+'</strong>';
                                rtmnode.innerHTML=add;
                                return true;
                            }
                            else{
                                if(node.value.length>1){
                                    alert("Not Valid IFSC Code - Eg.:SBIN0000930");
                                    node.value="";
                                    rtmnode.innerHTML='';
                                }
                                return false;  
                            }              
                        },
                        error: function(e){ 
                            alert('Error: ' + e.responseText);
                            rtmnode.innerHTML='';
                            return false;  
                        }
                    });
            }
            else{
                alert("Not Valid IFSC Code - Eg.: CNRB0001285");
                node.value="";
                rtmnode.innerHTML='';
                return false;
            }
        }
        
        function removefile(fileid,filenode){
            alert(fileid+'   '+filenode);
            $.ajax({
                type: "POST",
                url:baseurl+'Basic/removeFiles',
                data:"&fileid="+fileid+"&filenode="+filenode,
                success: function(resp){
                    var js=JSON.parse(resp);
                    if(js!=''){
                        return true;
                    }
                    else{
                        return false;  
                    }              
                },
                error: function(e){ 
                    alert('Error: ' + e.responseText);
                    rtmnode.innerHTML='';
                    return false;  
                }
            });
        }
    </script>
</body>
</html>
