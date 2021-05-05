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
                                           <form id="emis_schoolnew_basic_part6" method="post" action="<?php echo base_url().'Basic/schoolupdation/'.$this->uri->segment(3,0);?>">
                                                <div class="portlet light portlet-fit ">
                                                <?php $this->load->view('schoolInfo/supportHeader'); ?>
                                                    <div class="portlet-title">
                                                        <div class="caption col-md-9">
                                                            <i class="fa fa-building font-dark"></i>
                                                            <span class="caption-subject font-dark sbold uppercase">School Details - Part VI</span>
                                                        </div>
                                                        <?php 
                                                            if($profile[0]['part_6']==1){
                                                        ?>
                                                       <div class="col-md-3">
                                                            <button type="button" class="btn btn-primary" onclick="postRequest(createJSON(this.form),'<?php echo base_url().'Basic/getPartInformationByPost/'.$this->uri->segment(4,0);?>',this.form);">VIEW/EDIT</button>
                                                        </div>
                                                        <?php } ?>
                                                        
                                                    </div> 
                                                    
                                                    
                                                    <div class="portlet-body">
                                                        <div class="form-row">
                                                           
                                                            <div class="form-group col-md-12">
                                                                <input type="hidden" id="hiddensd_0" name="hiddensd_0" value="schoolnew_ictentry"/>
                                                                <table class="table">
                                                                     <tr>
                                                                        <th colspan="7" class="bg-primary text-white">
                                                                            <i class="fa fa-television"></i>
                                                                             <span class="caption-subject text-white sbold uppercase" >Details of Equipments (For teaching and learning purpose)</span>
                                                                        </th>
                                                                     </tr>
                                                                
                                                                    <tr>
                                                                        <th  style="width: 165px !important;"> <i class=" font-dark"></i><b>List of Devices: <font style="color:#dd4b39;">*</font></b></th>
                                                                        <th style="width: 165px !important;"> <i class=" font-dark"></i><b>Supplied by: <font style="color:#dd4b39;">*</font></b></th>
                                                                        <th></th>
                                                                        <th><i class=" font-dark"></i>Purpose <font style="color:#dd4b39;">*</font></th>
                                                                        <th style="width: 103px !important;"> <i class=" font-dark"></i><b>Available: <font style="color:#dd4b39;">*</font></b></th>
                                                                        <th style="width: 103px !important;"> <i class=" font-dark"></i><b>Functional <font style="color:#dd4b39;">*</font></b></th>
                                                                        <th> Add (+) &nbsp;&nbsp; Delete (-)</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            <select class="form-control" id="sd_0" name="sd_0"  onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);setRequiredField(this.value,'supp,prupu,avai,func','1')" >
                                                                                <option value="">Select Devices</option>
                                                                                <?php
                                                                                 foreach($ictlist as $dis){
                                                                                ?>
                                                                                <option value="<?php echo($dis->id); ?>"><?php echo($dis->ict_type); ?></option>
                                                                                <?php
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                            <div id="emissd_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        <th>
                                                                            <select class="form-control" id="supp_0" name="supp_0"  onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="showOthersText(this.parentNode.parentNode,2,1);textvalidate(this.id,this.nextElementSibling.id);" >
                                                                                <option value="">Choose</option>
                                                                                <?php
                                                                                 foreach($ictsuplier as $dis){
                                                                                ?>
                                                                                <option value="<?php echo($dis->id); ?>"><?php echo($dis->supplier_name); ?></option>
                                                                                <?php
                                                                                 }
                                                                                ?>
                                                                            </select>
                                                                            <div id="emissupp_" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        <th id="ifothersth_0">
                                                                            <input type="text" maxlength="100" minlength="1" id="ifotherngo_0" name="ifotherngo_0" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" placeholder="NGO Name" class="form-control">
                                                                            <div id="emisoth2_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        <th>
                                                                            <select class="form-control" id="prupu" name="prupu_0" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);">
                                                                                <option value="">Choose</option>
                                                                                <option value="1">Teaching</option>
                                                                                <option value="2">Adminstrative</option>
                                                                                <option value="3">Academic</option>
                                                                                <option value="4">None</option>
                                                                            </select>
                                                                            <div id="emisprupu_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        <th>
                                                                            <input type="text" id="avai_0" name="avai_0" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onblur="setMinandMax(this,this.parentNode.nextElementSibling.children[0].id,1,'max');" onchange="textvalidate(this.id,this.nextElementSibling.id);" maxlength="2" minlength="1" onkeypress="return event.charCode >=48 && event.charCode <=57" class="form-control" >
                                                                            <div id="emisavai_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        <th>
                                                                            <input type="text" id="func_0" name="func_0" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);restlength(this);" maxlength="2" minlength="1" onkeypress="return event.charCode >=48 && event.charCode <=57" class="form-control">
                                                                            <div id="emisfunc_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        <th>
                                                                            <button type="button" id="btnsd_0" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,1)"><i class="fa fa-plus"></i></button>&nbsp;&nbsp;
                                                                            <button type="button" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,0)"><i class="fa fa-minus"></i></button>
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <!--<div class="form-group col-md-6"></div>-->
                                                            
                                                            <!--<div class="form-group col-md-6">
                                                                <table class="table">
                                                                    <tr>
                                                                    <th><i class="fa fa-check"></i><i class="fa fa-television font-dark" style="font-size: 15px;"></i>Total number of computers functional</th>
                                                                        <th><input type="text" class="form-control"></th>
                                                                    </tr>
                                                                </table>
                                                            </div>-->
                                                            
                                                             <div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th>
                                                                           
                                                                             Does the School have a Computer Aided Learning Lab (CAL)? <font style="color:#dd4b39;">*</font> 
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                                            
                                                                                <input type="radio" value="1" id="cal_1" name="furn_bench_no"><label for="cal_1">YES</label>
                                                                                <input type="radio" value="0" id="cal_2" name="furn_bench_no" checked="checked"><label for="cal_1">NO</label>
                                                                                 <!--furn_bench_no schoolnew_infradet-->
                                                                        </th>
                                                                        
                                                                    </tr>
                                                                </table>
                                                             </div>
                                                            
                                                            
                                                            <div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th>
                                                                            
                                                                                Does the School have Internet Facility? <font style="color:#dd4b39;">*</font> 
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                <input type="radio" id="sif_1" name="internet_yes" value="1" onchange="sbcshow1(this,'internetfacilitydetails');setRequiredField(this.value,'internetfacility,cmpname,speed,range','1')"><label for="sif_1">YES</label>
                                                                                <input type="radio" id="sif_2" name="internet_yes" value="0" onchange="sbcshow1(this,'internetfacilitydetails');setRequiredField(this.value,'internetfacility,cmpname,speed,range','1')" checked="checked"><label for="sif_2">NO</label>
                                                                                <!--internet_yes date schoolnew_infradet-->
                                                                         </th>
                                                                         
                                                                         
                                                                    </tr>
                                                                 </table>
                                                            </div>
                                                            
                                                            <div class="form-group col-md-12 internetfacilitydetails">
                                                                <input type="hidden" id="hiddencmpname_0" name="hiddencmpname_0" value="schoolnew_internet"/>
                                                                <table class="table">
                                                                    <tr>
                                                                        <th>Service Provider</th>
                                                                         <th><i class="fa fa-tachometer"></i> Data Speed</th>
                                                                        <th><i class="fa fa-wifi"></i> Range</th>
                                                                        <th>Internet Facility provided by</th>
                                                                        <th></th>
                                                                        <th> Add (+) Delete (-)</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            <input type="text" id="cmpname_0" name="cmpname_0"  onfocus="textvalidate(this.id,'emis_cmpname_alert');" onchange="textvalidate(this.id,'emis_cmpname_alert');" maxlength="100" minlength="1" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" class="form-control">
                                                                            <font style="color:#dd4b39;"><div id="emis_cmpname_alert"></div></font>
                                                                        </th>
                                                                        <th>
                                                                            <input style="width: 150px;" type="text" id="speed_0" name="speed_0"  onfocus="textvalidate(this.id,'emis_speed_alert');" onchange="textvalidate(this.id,'emis_speed_alert');" maxlength="3" minlength="1" onkeypress="return event.charCode >=48 && event.charCode <=57"  class="form-control">
                                                                            <font style="color:#dd4b39;"><div id="emis_speed_alert"></div></font>
                                                                        </th>
                                                                        <th>
                                                                            <select class="form-control" id="range_0" name="range_0" onfocus="textvalidate(this.id,'emis_range_alert');" onchange="textvalidate(this.id,'emis_range_alert');">
                                                                                <option value="">Choose</option> 
                                                                                <option value="1">Kbps</option> 
                                                                                <option value="2">KBps</option> 
                                                                                <option value="3">Mbps</option> 
                                                                                <option value="4">MBps</option> 
                                                                            </select>
                                                                            <font style="color:#dd4b39;"><div id="emis_range_alert"></div></font>
                                                                        </th>
                                                                        <th >
                                                                            <select style="width: 175px;" class="form-control" id="internetfacility_0" name="internetfacility_0" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="if(this.value==15){this.parentNode.nextElementSibling.children[0].style.visibility='';}else{this.parentNode.nextElementSibling.children[0].style.visibility='hidden';};textvalidate(this.id,this.nextElementSibling.id);">
                                                               
                                                                                <option value="">Choose</option>
                                                                                <?php
                                                                                    foreach($ictsuplier as $dis){
                                                                                ?>
                                                                                <option value="<?php echo($dis->id); ?>"><?php echo($dis->supplier_name); ?></option>
                                                                                <?php
                                                                                 }
                                                                                ?>
                                                                            </select>
                                                                            <div id="emisif_0" style="color:#dd4b39;"></div>
                                                                         </th>
                                                                        <th id="ifothersth_0">
                                                                            <input  type="text" id="ifother_0" name="ifother_0" maxlength="100" minlength="1" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" class="form-control"/>
                                                                            <div id="emisifother_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        <th>
                                                                            <button type="button" id="btncmpname_0" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,1)"><i class="fa fa-plus"></i></button>
                                                                            <button type="button" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,0)"><i class="fa fa-minus"></i></button>
                                                                        </th>
                                                                    </tr>
                                                                 
                                                                 
                                                                </table>
                                                            </div>
                                                            
                                                            <div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <!--<tr>
                                                                        <th >Does the School have a Smart Classroom? <font style="color:#dd4b39;">*</font> </th>
                                                                        <th style="width: 255px ;"> 
                                                                            <input type="radio" id="ssc_1" name="ssc" value="1" onchange="sbcshow2(this,'smartclassdetails');setRequiredField(this.value,'smart','1');"/><label for="ssc_1">YES</label>
                                                                            <input type="radio" id="ssc_2" name="ssc" value="0" onchange="sbcshow2(this,'smartclassdetails');setRequiredField(this.value,'smart','1');" checked="checked"/><label for="ssc_2">NO</label>
                                                                        </th>
                                                                        
                                                                        <th class="smartclassdetails" style="width: 142px !important;">How many rooms?</th>
                                                                        <th class="smartclassdetails" style="width: 130px !important;">
																		<input type="text" class="form-control" id="smart" name="smart" maxlength="3" minlength="1" min="0"  max="100" onchange="textvalidate(this.id,this.nextElementSibling.id);" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onkeypress="return event.charCode >=48 && event.charCode <=57"/>
                                                                        <div id="emismcheck_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                    </tr>-->
                                                                    <tr>
                                                                        <th style="width: 400px;">Does the School have Electricity? <font style="color:#dd4b39;">*</font> </th>
                                                                        <th> 
                                                                            <input type="radio" id="elec_1" name="furn_desk_use" value="1" /><label for="elec_1">YES</label>&nbsp;&nbsp;
                                                                            <input type="radio" id="elec_2" name="furn_desk_use" value="0" checked="checked"/><label for="elec_2">NO</label>&nbsp;&nbsp;
                                                                            <input type="radio" id="elec_3" name="furn_desk_use" value="2" /><label for="elec_3">Not Functional</label>
                                                                             <!--furn_desk_use date schoolnew_infradet-->
                                                                        </th>
                                                                        <!--<th >Does the School have a installed Building Lightning Arrester?</th>
                                                                        <th> 
                                                                            <input type="radio" id="light_1" name="light" value="1" /><label for="light_1">YES</label>
                                                                            <input type="radio" id="light_2" name="light" value="0" checked="checked"/><label for="light_2">NO</label>
                                                                        </th>-->
                                                                    </tr>
                                                                    <!--<tr>
                                                                        <th >Does the school have computer tablet for teaching</th><th>
                                                                            <input type="radio" id="tablet_1" name="tablet"/><label for="tablet_1">YES</label>
                                                                            <input type="radio" id="tablet_2" name="tablet" checked="checked"/><label for="tablet_2">NO</label>
                                                                        </th>
                                                                    </tr>-->
                                                                    </table>
                                                            </div>
                                                                    
                                                                    
                                                                    <div class="form-group col-md-12">
                                                                        
                                                                      <table class="table">
                                                                        <tr>
                                                                        <th colspan="3" class="bg-primary text-white">
                                                                        <i class="fa fa-suitcase"></i>
                                                                         <span class="caption-subject text-white sbold uppercase" >Details of Medical Check-up</span>
                                                                        </th>
                                                                        
                                                                      </tr>
                                                                      
                                                                     <tr>
                                                                        <th>Whether medical checkup for Students was conducted in the Last Academic Year? <font style="color:#dd4b39;">*</font></th><th>
                                                                            <input type="radio" id="medicalchkup_1" name="furn_desk_no" value="1" onchange="sbcshow1(this,'conducteddetails')"/><label for="medicalchkup_1">YES</label>
                                                                            <input type="radio" id="medicalchkup_2" name="furn_desk_no" value="0" onchange="sbcshow1(this,'conducteddetails')" checked="checked"/><label for="medicalchkup_2">NO</label>
                                                                             <!--furn_desk_no date schoolnew_infradet-->
                                                                        </th>
                                                                        <th></th>
                                                                    </tr>
                                                                    </table>
                                                                    </div>
                                                                   <div class="form-group col-md-12">
                                                                    <table class="table">
                                                                    <tr class="conducteddetails">
                                                                        <th>Medical Checkup conducted on </th>
                                                                        <th>
                                                                            <input type="hidden" id="hiddenconductedon_0" name="hiddenconductedon_0" value="schoolnew_medical"/>
                                                                            <input type="date" id="conductedon" name="ec_cer_fm" min="<?php echo date('Y-m-d',strtotime('now - 1Year')) ?>" max="<?php echo date('Y-m-d')?>" onchange="textvalidate(this.id,'emis_conductdate_alert');" onfocus="textvalidate(this.id,'emis_conductdate_alert');" onkeydown="return false;" class="form-control">
                                                                            <font style="color:#dd4b39;"><div id="emis_conductdate_alert"></div></font>
                                                                            <!--ec_cer_fm date schoolnew_land-->
                                                                        </th>
                                                                        <th>
                                                                            <input type="date" id="kitchenshed" name="kitchenshed" min="<?php echo date('Y-m-d',strtotime('now - 1Year')) ?>" max="<?php echo date('Y-m-d')?>" onkeydown="return false;" class="form-control">
                                                                            
                                                                            <!--kitchenshed varchar(10) schoolnew_infradet-->
                                                                        </th>
                                                                         <th>
                                                                            <input type="date" id="tot_tchr_prepri" name="ec_cer_to" min="<?php echo date('Y-m-d',strtotime('now - 1Year')) ?>" max="<?php echo date('Y-m-d')?>" onkeydown="return false;" class="form-control">
                                                                            
                                                                            <!--ec_cer_to int(11) schoolnew_land-->
                                                                        </th>
                                                                       
                                                                    </tr>
                                                                       
                                                                    
                                                                    <!--<tr>
                                                                        <th>Total number of medical checkup's conducted in the School during Last Academic Year: <font style="color:#dd4b39;">*</font></th>
                                                                        <th>
                                                                        <input type="text"  minlength="1" maxlength="2"  id="mcheck" name="kitchenshed" onfocus="textvalidate(this.id,'emis_mcheck_alert');" onchange="textvalidate(this.id,'emis_mcheck_alert');" onkeypress="return event.charCode >=48 && event.charCode <=57" class="form-control" required/>
                                                                        kitchenshed varchar(10) schoolnew_infradet
                                                                        <font style="color:#dd4b39;"><div id="emis_mcheck_alert"></div></font>
                                                                        </th>
                                                                        <th></th>
                                                                    </tr>-->
                                                                    
                                                                    </table>
                                                                    </div>
                                                                    
                                                                    <div class="form-group col-md-12">
                                                                    <table class="table">
                                                                    <tr>
                                                                        <th>Whether De-worming tablets were given to Children? <font style="color:#dd4b39;">*</font></th>
                                                                        
                                                                        <th><select class="form-control" id="dwt" name="firstaid_box" required onfocus="textvalidate(this.id,'emis_dwt_alert');" onchange="textvalidate(this.id,'emis_dwt_alert');" /><option value="">Choose</option>
                                                                        <option value="1">Complete (Two Doses)</option>
                                                                        <option value="2">Partially (One Dose)</option>
                                                                        <option value="3">Not Given</option>
                                                                        </select>
                                                                        <!--firstaid_box varchar(10) schoolnew_infradet-->
                                                                        <font style="color:#dd4b39;"><div id="emis_dwt_alert"></div></font>
                                                                        </th>
                                                                        <th></th>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <th >Whether Iron and Folic acid tablets given to children as per guidelines of WCD? <font style="color:#dd4b39;">*</font>
                                                                        </th>
                                                                        <th>
                                                                            <input type="radio" id="acid_1" value="1" name="fireext_w" /><label for="acid_1">YES</label>
                                                                            <input type="radio" id="acid_2" value="0" name="fireext_w" checked="checked"/><label for="acid_2">NO</label>
                                                                            <!--fireext_w int(11) schoolnew_infradet-->
                                                                        </th>
                                                                        <th></th>
                                                                    </tr>
                                                                    
                                                                     
                                                                    
                                                                    
                                                                </table>
                                                            </div>
                                                            
                                                            
                                                            
                                                            
                                                        </div> 
                                                        </div>
                                                        
                                                        
                                                    
                                                    
                                                    
                                                    <div class="portlet-body">
                                                        <div class="form-row">
                                                            

                                                            <div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr>
                                                                      <th colspan="4" class="bg-primary text-white">
                                                                        <i class="fa fa-cogs"></i>
                                                                          <span class="caption-subject text-white sbold uppercase" >Physical Facilities and Equipment in Schools with Secondary/Higher Secondary Sections</span>
                                                                      </th>
                                                                    </tr>
                                                                </table>
                                                                
                                                            </div>
                                                            
                                                            <div class="form-group col-md-12">
                                                                <input type="hidden" id="hiddenlablist_0" name="hiddenlablist_0" value="schoolnew_labentry"/>
                                                                <table class="table">
                                                                        <!--<tr>
                                                                      <th colspan="4" class="bg-primary text-white">
                                                                 <i class="fa fa-cogs"></i>
                                                                     <span class="caption-subject text-white sbold uppercase" >Physical Facilities and Equipment in Schools with Secondary/Higher Secondary Sections</span>
                                                                  </th>
                                                                     </tr>-->
                                                                        
                                                                     <tr>
                                                                        <th colspan="4"><i class="fa fa-ban font-dark"></i>School Laboratory Facilities (For Higher Secondary Sections only)</th>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Laboratory <font style="color:#dd4b39;">*</font></th>
                                                                        <th>Separate Room Available <font style="color:#dd4b39;">*</font></th>
                                                                        <th>Present Condition <font style="color:#dd4b39;">*</font></th>
                                                                        <th> Add (+) &nbsp;&nbsp; Delete (-)</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            
                                                                            <select class="form-control" id="lablist_0" name="lablist_0" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="selectionValidation(this,this.parentNode.parentNode);textvalidate(this.id,this.nextElementSibling.id);" required>
                                                                                <option value="">Choose</option>
                                                                                    <?php
                                                                                        foreach ($lablist as $des){
                                                                                    ?>
                                                                                 <option value="<?php echo $des->id ?>"><?php echo $des->Lab ?></option>
                                                                                 <?php
                                                                                    }
                                                                
                                                                                 ?>
                                                                            </select>
                                                                            <div id="emislaboratory_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        <th>
                                                                            <input type="radio" value="1" id="spr_1" name="spr_0"/><label for="spr_1">YES</label>
                                                                            <input type="radio" value="0" id="spr_2" name="spr_0" checked="checked"/><label for="spr_1">NO</label>
                                                                        </th>
                                                                        <th>
                                                                            <select class="form-control" id="equip_0" name="equip_0" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);" required><option value="">Choose</option>
                                                                                <option value="1">Fully Equipped</option>
                                                                                <option value="2">Partially Equipped</option>
                                                                                <option value="3">Not Applicable</option>
                                                                            </select>
                                                                            <div id="emisequpd_0" style="color:#dd4b39;"></div>
                                                                         </th>
                                                                        <th>
                                                                            <button type="button" id="btnlablist_0" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,1)"><i class="fa fa-plus"></i></button>&nbsp;&nbsp;
                                                                            <button type="button" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,0)"><i class="fa fa-minus"></i></button>
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            
                                                            <div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th>Integrated Science Laboratory for Secondary Sections available? <font style="color:#dd4b39;">*</font></th><th>
                                                                            <input type="radio" id="isl_1" value="1" name="fireext" onchange="sbcshow1(this,'isldetails');" /><label for="isl_1">YES</label>
                                                                            <input type="radio" id="isl_2" value="0" name="fireext" onchange="sbcshow1(this,'isldetails');" checked="checked"/><label for="isl_2">NO</label>
                                                                            <!--fireext tinyint(4) schoolnew_infradet-->
                                                                        </th>
                                                                        <th class="isldetails">How many rooms</th>
                                                                        <th class="isldetails">
                                                                            <input type="number" id="islss" name="fireext_no" onfocus="textvalidate(this.id,'emis_islss_alert');" onchange="textvalidate(this.id,'emis_islss_alert');" min="0" max="15" maxlength="2" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  class="form-control"/>
                                                                             <!--fireext_no int(11) schoolnew_infradet-->
                                                                            <font style="color:#dd4b39;"><div id="emis_islss_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                            </div>  
                                                            
                                                            
                                                            <div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr><th colspan="6"><i class="fa fa-check font-dark"></i>School Equipment Details</th></tr>
                                                                    <tr>
                                                                        <th style="width: 250px !important;"> <i class="font-dark"></i><b>List of Equipments: <font style="color:#dd4b39;">*</font></b></th>
                                                                        <th style="width: 185px !important;"> <i class="font-dark"></i><b>Supplied by: <font style="color:#dd4b39;">*</font></b></th>
                                                                        <th style="width: 205px !important;"></th>
                                                                        <!--<th style="width: 190px !important;"> <i class="font-dark"></i><b>Components:</b></th>-->
                                                                        <th style="width: 95px !important;"> <i class="font-dark"></i><b>Quantity: <font style="color:#dd4b39;">*</font></b></th>
                                                                        <th>Add (+) &nbsp;&nbsp; Delete (-)</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            <input type="hidden" id="hiddenkit_0" name="hiddenkit_0" value="schoolnew_equipment"/>
                                                                            <select class="form-control" id="kit_0" name="kit_0" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);" required><option value="">Choose</option>
                                                                                <?php
                                                                                    foreach ($ictlistofkits as $des){
                                                                                ?>
                                                                                <option value="<?php echo $des->id ?>"><?php echo $des->ict_type ?></option>
                                                                                    <?php
                                                                                        }
                                                                                    ?>
                                                                            </select>
                                                                            <div id="emiskit_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        <th>
                                                                             <select class="form-control" id="supp1_0" name="supp1_0" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="showOthersText(this.parentNode.parentNode,2,1);textvalidate(this.id,this.nextElementSibling.id);" required>
                                                                                  <option value="">Choose</option>
                                                                                    <?php
                                                                                        foreach($ictsuplier as $dis){
                                                                                    ?>
                                                                                     <option value="<?php echo($dis->id); ?>"><?php echo($dis->supplier_name); ?></option>
                                                                                        <?php
                                                                                            }
                                                                                        ?>
                                                                            </select>
                                                                            <div id="emissupp1_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        <th id="ifsupplyth_0">
                                                                            <input type="text" id="supplyth_0" name="supplyth_0" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);" maxlength="100" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" class="form-control"  placeholder="NGO Name" >
                                                                            <div id="emisoth_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        <!--selectionValidation(this,this.parentNode.parentNode);<th>
                                                                            <input type="text" maxlength="100" minlength="1" id="avai1" name="avai1" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" class="form-control" required>
                                                                            <div id="emisavai1_0" style="color:#dd4b39;"></div>
                                                                        </th>-->
                                                                        <th><input type="text" id="func1_0" name="func1_0" maxlength="2" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"  required>
                                                                            <div id="emisfunc1_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        <th>
                                                                            <button type="button" id="btnkit_0" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,1)"><i class="fa fa-plus"></i></button>&nbsp;&nbsp;
                                                                            <button type="button" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,0)"><i class="fa fa-minus"></i></button>
                                                                        </th>
                                                                    </tr>
                                                                </table> 
                                                             </div>
                                                            
                                                            
                                                            
                                                            
                                                            <div class="form-group col-md-12">
                                                                <div class="portlet-title">
                                                                    <div class="caption">
                                                                        <i class="fa fa-sitemap font-dark"></i>
                                                                        <span class="caption-subject font-dark sbold uppercase">School Inventory Details</span>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" id="hiddenlot_0" name="hiddenlot_0" value="schoolnew_inventry"/>
                                                                <table class="table">
                                                                    <tr>
                                                                         <th><i class="font-dark"></i>List of Things <font style="color:#dd4b39;">*</font></th>
                                                                        <th> <i class="font-dark"></i>Supplied by: <font style="color:#dd4b39;">*</font></th>
                                                                        <th ></th>
                                                                        <th style="width: 103px !important;"> <i class="font-dark"></i><b>Available: <font style="color:#dd4b39;">*</font></b></th>
                                                                        <th style="width: 103px !important;"> <i class="font-dark"></i><b>Functional/<br/>Usable: <font style="color:#dd4b39;">*</font></b></th>
                                                                        <th>Add (+) &nbsp;&nbsp; Delete (-)</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            <select class="form-control" id="lot_0" name="lot_0" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);" required>
                                                                                <option value="">Choose</option>
                                                                                 <?php
                                                                                    foreach ($ictlistofthings as $des){
                                                                                 ?>
                                                                                <option value="<?php echo $des->id ?>"><?php echo $des->ict_type ?></option>
                                                                                 <?php
                                                                                     }
                                                                
                                                                                ?>
                                                                            </select>
                                                                            <div id="emislot_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        <th>
                                                                            <select class="form-control" id="supply_0" name="supply_0" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="showOthersText(this.parentNode.parentNode,2,1);textvalidate(this.id,this.nextElementSibling.id);" required>
                                                                                <option value="">Choose</option>
                                                                                    <?php
                                                                                     foreach($ictsuplier as $dis){
                                                                                     ?>
                                                                                <option value="<?php echo($dis->id); ?>"><?php echo($dis->supplier_name); ?></option>
                                                                                <?php
                                                                                 }
                                                                                ?>
                                                                            
                                                                            </select>
                                                                            <div id="emissupply_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        <th id="iflistsupplyth_0">
                                                                            <input type="text" id="iflisup_0" name="iflisup_0" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" class="form-control"  placeholder="NGO Name" >
                                                                            <div id="emisoth1_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        <th>
                                                                            <input type="text" id="avail_0" name="avail_0" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onblur="setMinandMax(this,this.parentNode.nextElementSibling.children[0].id,1,'max');" onchange="textvalidate(this.id,this.nextElementSibling.id);" maxlength="5" minlength="1" onkeypress="return event.charCode >=48 && event.charCode <=57" class="form-control" >
                                                                            <div id="emisavail_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        <th>
                                                                            <input type="text" id="funct_0" name="funct_0" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);restlength(this);" maxlength="5" minlength="1" onkeypress="return event.charCode >=48 && event.charCode <=57" class="form-control">
                                                                            <div id="emisfunct_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        <th>
                                                                            <button type="button" id="btnlot_0" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,1)"><i class="fa fa-plus"></i></button>&nbsp;&nbsp;
                                                                            <button type="button" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,0)"><i class="fa fa-minus"></i></button>
                                                                        </th>
                                                                    </tr>
                                                            </table>
                                                        </div>
                                                            
                                                        <!--<div class="form-group col-md-12">
                                                          <table class="table">
                                                            <tr>
                                                                <th>Whether Maths Kit Received?</th>
                                                                <th><input type="radio" id="mkr_1" name="mkr"/><label for="mkr_1">YES</label>
                                                                <input type="radio" id="mkr_2" name="mkr" checked="checked"/><label for="mkr_2">NO</label></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <th><input type="hidden"/>No. of Teachers requiring Maths Kit Training</th>
                                                                <th>
                                                                <input type="text" id="notmkt" name="notmkt" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);" maxlength="3" onkeypress="return event.charCode >=48 && event.charCode <=57"  class="form-control" required>
                                                                 <div id="emisnotmkt_0" style="color:#dd4b39;"></div>
                                                                </th>
                                                                <th>Class Combination</th>
                                                                <th style="width: 177px;">
                                                                <select class="form-control" id="classcomb" name="classcomb" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="selectionValidation(this,this.parentNode.parentNode,3);textvalidate(this.id,this.nextElementSibling.id);" required>
                                                                <option value="">Choose</option>
                                                                <option value="1">Class 1 & 2, Class 3 & 4, Class 5</option>
                                                                <option value="2">Class 1 & 4, Class 5</option>
                                                                <option value="3">Class 1 & 2, Class 3, Class 4, Class 5</option>
                                                                <option value="4">Class 1 & 5</option></select>
                                                                 <div id="emisclasscomb_0"  style="color:#dd4b39;"></div>
                                                                </th>
                                                                <th>
                                                                        <button type="button" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,1)"><i class="fa fa-plus"></i></button>
                                                                        <button type="button" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,0)"><i class="fa fa-close"></i></button>
                                                                </th>
                                                            </tr>
                                                                
                                                          </table>
                                                        </div>   -->
                                                                    
                                                                    
                                                                    
                                                               
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
        document.getElementById('ifothersth_0').style.visibility='hidden';
        document.getElementById('ifsupplyth_0').style.visibility='hidden';
        document.getElementById('iflistsupplyth_0').style.visibility='hidden';
                

        sbcshow1(document.getElementById('isl_2'),'isldetails');
        sbcshow1(document.getElementById('sif_2'),'internetfacilitydetails');
        //sbcshow2(document.getElementById('ssc_2'),'smartclassdetails');
        sbcshow1(document.getElementById('medicalchkup_2'),'conducteddetails');
        document.getElementById('ifotherngo_0').style.visibility='hidden';
        
        
        function chklength(node,len){
            alert(node.children.length);
        }
        
    </script>
</body>
</html>