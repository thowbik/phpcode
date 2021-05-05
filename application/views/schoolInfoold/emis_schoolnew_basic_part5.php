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
                                            <form id="emis_schoolnew_basic_part5" method="post" action="<?php echo base_url().'Basic/schoolupdation/'.$this->uri->segment(3,0);?>">
                                                <div class="portlet light portlet-fit ">
                                                <?php $this->load->view('schoolInfo/supportHeader'); ?>
                                                    <div class="portlet-title">
                                                        <div class="caption col-md-9">
                                                            <i class="fa fa-building font-dark"></i>
                                                            <span class="caption-subject font-dark sbold uppercase">School Details - Part V</span>
                                                        </div>
                                                        <?php
                                                            if($profile[0]['part_5']==1) {
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
                                                                        <th colspan="5" class="bg-primary text-white">
                                                                            <i class="fa fa-gear"></i>
                                                                            <span class="caption-subject text-white sbold uppercase" >School Land Details</span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th >Total land availability (Including Building area and Playground) <font style="color:#dd4b39;">*</font></th>
                                                                        <th>
                                                                            <div class="col-md-6">
                                                                                <input type="text" id="landa" name="tot_area" onfocus="textvalidate(this.id,'emis_landa_alert');" onchange="textvalidate(this.id,'emis_landa_alert');sqfttoacre(this);"  required="required" maxlength="7" minlength="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  class="form-control" placeholder="Sq.Ft."/>
                                                                                <font style="color:#dd4b39;"><div id="emis_landa_alert"></div></font>
                                                                                <!--'tot_area', 'bigint(20)' schoolnew_land-->
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <input type="text" id="landa_1" name="tot_area_1" onfocus="textvalidate(this.id,'emis_landa_alert1');" onchange="textvalidate(this.id,'emis_landa_alert');sqfttoacre(this);"  required="required" maxlength="6" minlength="1" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode==46"  class="form-control" placeholder="Acre"/>
                                                                                <font style="color:#dd4b39;"><div id="emis_landa_alert1"></div></font>
                                                                                <!--'tot_area', 'bigint(20)' schoolnew_land-->
                                                                            </div>
                                                                        </th>
                                                                        <!--<th>Area of the Buildings (in sq.ft)</th>
                                                                        <th> 
                                                                            <input type="text" id="areab" name="areab" onfocus="textvalidate(this.id,'emis_areab_alert');" onchange="textvalidate(this.id,'emis_areab_alert');"  maxlength="6" minlength="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="Landdetails" required="required" class="form-control">
                                                                            <font style="color:#dd4b39;"><div id="emis_areab_alert"></div></font>
                                                                        </th>-->
                                                                   
                                                                        <th>Whether the School has a Playground facility? <font style="color:#dd4b39;">*</font><br/>
                                                                            <input type="radio" id="spf_1" value="1" name="area_ground" onchange="sbcshow1(this,'spfdetails1');sbcshow1(document.getElementById('spf_2'),'spfdetails');setRequiredField(this.value,'areap','1')" checked="checked"/><label for="spf_1">YES</label>
                                                                            <input type="radio" id="spf_2" value="0" name="area_ground" onchange="sbcshow1(document.getElementById('spf_1'),'spfdetails');sbcshow1(this,'spfdetails1');setRequiredField(this.value,'areap','1')"  /><label for="spf_2">NO</label>
                                                                            <!--'area_ground', 'bigint(20)' schoolnew_land-->
                                                                        </th>                                                             
                                                                        <th class="spfdetails1">Area of the Playground (in sq.ft) <font style="color:#dd4b39;">*</font></th>
                                                                        <th class="spfdetails1">
                                                                           <div class="col-md-6">
                                                                                 <input type="text" id="areap" name="area_cent" onfocus="textvalidate(this.id,'emis_areap_alert');" onchange="textvalidate(this.id,'emis_areap_alert');sqfttoacre(this);"  maxlength="7" minlength="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" placeholder="Sq.Ft."/>
                                                                                <font style="color:#dd4b39;"><div id="emis_areap_alert"></div></font>
                                                                                <!--'area_cent', 'bigint(20)' schoolnew_land-->
                                                                           </div>
                                                                           <div class="col-md-6">
                                                                                 <input type="text" id="areap_1" name="area_cent_1" onfocus="textvalidate(this.id,'emis_areap_alert1');" onchange="textvalidate(this.id,'emis_areap_alert');sqfttoacre(this);"  maxlength="6" minlength="1" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode==46" class="form-control" placeholder="Acre"/>
                                                                                <font style="color:#dd4b39;"><div id="emis_areap_alert1"></div></font>
                                                                                <!--'area_cent', 'bigint(20)' schoolnew_land-->
                                                                           </div>
                                                                        </th>                                                            
                                                                    </tr>
                                                                    <tr class="spfdetails">
                                                                        <th style="width: 500px !important;" >Does the School have alternative arrangements for children to play outdoor games and other physical activities in adjoining playground/municipal park/other location? <font style="color:#dd4b39;">*</font></th>
                                                                        <th>
                                                                            <input type="radio" value="1" id="aa_1" name="tot_ft" onchange="document.getElementById('bgscdetails').style.display=(this.checked?'':'none');setRequiredField(this.value,'door,street,funcad,bp','1')"/><label for="aa_1">YES</label>
                                                                            <input type="radio" value="0" id="aa_2" name="tot_ft" onchange="document.getElementById('bgscdetails').style.display=(this.checked?'none':'');setRequiredField(this.value,'door,street,funcad,bp','1')" checked="checked"/><label for="aa_2">NO</label>
                                                                            <!--'tot_ft', 'bigint(20)' schoolnew_infradet-->
                                                                        </th>
                                                                        
                                                                        <th></th>
                                                                        <th></th>
                                                                    </tr>
                                                                </table>
                                                           </div>
                                                            <!--<div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th>Whether the School Building and Playground are in the same compound?</th>
                                                                        <th>
                                                                            <input type="radio" value="1" id="bgsc_1" name="bgsc"  checked="checked"/><label for="bgsc_1">YES</label>
                                                                            <input type="radio" value="0" id="bgsc_2" name="bgsc"  /><label for="bgsc_2">NO</label>
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                            </div>-->
                                                            <div class="form-group col-md-12" id="bgscdetails">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th>Address</th>
                                                                        <th>
                                                                            <textarea id="door" name="patta_no"  onfocus="textvalidate(this.id,'emis_door_alert');" onchange="textvalidate(this.id,'emis_door_alert');"  class="form-control"></textarea>
                                                                            <font style="color:#dd4b39;"><div id="emis_door_alert"></div></font>
                                                                            <!--'patta_no', 'varchar(50)' schoolnew_land-->
                                                                        </th>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <!--<th>Number of classes functioning in this address </th>
                                                                        <th>
                                                                            <input type="text" id="funcad" name="funcad" maxlength="3" minlength="1"  onfocus="textvalidate(this.id,'emis_funcad_alert');" onchange="textvalidate(this.id,'emis_funcad_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required" class="form-control">
                                                                            <font style="color:#dd4b39;"><div id="emis_funcad_alert"></div></font>
                                                                        </th>-->
                                                                        <th>Distance between the main building & playground (in meters)</th>
                                                                        <th>
                                                                            <input type="text" id="bp" name="play"  onfocus="textvalidate(this.id,'emis_bp_alert');" onchange="textvalidate(this.id,'emis_bp_alert');" maxlength="5" minlength="1" minlength="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  class="form-control">
                                                                            <font style="color:#dd4b39;"><div id="emis_bp_alert"></div></font>
                                                                            <!--'play', 'bigint(20)' schoolnew_infradet-->
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr>
                                                                       <th style="width: 500px;">Whether land is available for expansion of School facilities? <font style="color:#dd4b39;">*</font></th>
                                                                        <th>
                                                                            <input type="radio" value="1" id="schoolfaci_1" name="cwall_existbu" onchange="sbcshow1(this,'alanddetails');setRequiredField(this.value,'sf1','1')"/><label for="schoolfaci_1">YES</label>
                                                                            <input type="radio" value="0" id="schoolfaci_2" name="cwall_existbu" onchange="sbcshow1(this,'alanddetails');setRequiredField(this.value,'sf1','1')" checked="checked"/><label for="schoolfaci_2">NO</label>
                                                                            <!--'cwall_existbu', 'tinyint(4)' schoolnew_infradet-->
                                                                        </th>
                                                                        <th class="alanddetails" style="width: 176px !important;">If yes, area of land available (in Sq.ft)</th>
                                                                        <th class="alanddetails">
                                                                                 <input type="text" id="sf1" name="play_ft"  onfocus="textvalidate(this.id,'emis_sf_alert');"  maxlength="7" minlength="1" onchange="textvalidate(this.id,'emis_sf_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control">
                                                                                <font style="color:#dd4b39;"><div id="emis_sf_alert"></div></font>
                                                                                <!--'play_ft', 'bigint(20)' schoolnew_infradet-->
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <!--<div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th>Land owned by</th>
                                                                        <th>
                                                                            <input type="radio" value="0" id="lob1" name="landowned"/><label for="lob1">Trust</label>&nbsp;&nbsp;
                                                                            <input type="radio" value="1" id="lob2" name="landowned"/><label for="lob2">Society</label>&nbsp;&nbsp;
                                                                            <input type="radio" value="2" id="lob3" name="landowned"/><label for="lob3">Management</label>&nbsp;&nbsp;
                                                                            <input type="radio" value="3" id="lob4" name="landowned" checked="checked"/><label for="vc_4">Goverment</label>
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                            </div>-->
                                                            <div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th style="width: 140px;">Land Ownership <font style="color:#dd4b39;">*</font></th>
                                                                        <th>
                                                                            <select style="width: 140px;" class="form-control" id="lu" name="own_type" onfocus="textvalidate(this.id,'emis_lu_alert');" onchange="textvalidate(this.id,'emis_lu_alert');landusage(this.value)" required>
                                                                                    <option value="">Choose</option>
                                                                                    <option value="1">Rented</option>
                                                                                    <option value="2">Leased</option>
                                                                                    <option value="3">Owned</option>
                                                                                    <option value="4">Rental Free</option>
                                                                                </select>
                                                                                <font style="color:#dd4b39;"><div id="emis_lu_alert"></div></font>
                                                                                <!--own_type varchar(25) schoolnew_land-->
                                                                        </th>
                                                                        <th class="rentdetails">Amount of Rent per year (in Rs.)</th>
                                                                        <th class="rentdetails">
                                                                                <input type="text"  maxlength="7" minlength="1" id="ifrent_0" name="lease_yrs"  onfocus="textvalidate(this.id,'emis_rpy_alert');" onchange="textvalidate(this.id,'emis_rpy_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="Landdetails"  class="form-control">
                                                                                <font style="color:#dd4b39;"><div id="emis_rpy_alert"></div></font>
                                                                                <!--lease_yrs bigint(20) schoolnew_land-->
                                                                        </th>
                                                                        <th class="perioddetails">Period of Lease (in years)</th>
                                                                        <th class="perioddetails">
                                                                            <input type="text" maxlength="2" minlength="1" id="ifperiod_0" name="lease_name"  onfocus="textvalidate(this.id,'emis_ply_alert');" onchange="textvalidate(this.id,'emis_ply_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="Landdetails" class="form-control">
                                                                                <font style="color:#dd4b39;"><div id="emis_ply_alert"></div></font>
                                                                                 <!--lease_name varchar(15) schoolnew_land-->
                                                                        </th>
                                                                        <th class="perioddetails">Valid upto</th>
                                                                        <th class="perioddetails">
                                                                            <input type="date" id="periodyear" name="ec_cer_dt" min="<?php echo (date('Y-m-d',strtotime('now'))); ?>" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);"  class="form-control"/>
                                                                            <div id="emisperiodyear_0" style="color:#dd4b39;"></div>
                                                                            <!--ec_cer_dt date schoolnew_land-->
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                             <!--<div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th>Is the Land registered?</th>
                                                                        <th>
                                                                            <input type="radio" value="1" id="lr_1" name="lr"/><label for="lr_1">YES</label>
                                                                            <input type="radio" value="0" id="lr_2" name="lr" checked="checked"/><label for="lr_2">NO</label>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                </table>
                                                             </div>-->
                                                             <div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th colspan="4" class="bg-primary text-white">
                                                                            <i class="fa fa-gear"></i>
                                                                            <span class="caption-subject text-white sbold uppercase" >SCHOOL BUILDING AND BOUNDARY WALL DETAILS</span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Type of Boundary Wall <font style="color:#dd4b39;">*</font></th>
                                                                        <th>
                                                                            <select class="form-control" id="bw" name="cwall" onfocus="textvalidate(this.id,'emis_bw_alert');" onchange="textvalidate(this.id,'emis_bw_alert');" required><option value="">Choose</option>
                                                                                <option value="1">Pucca</option>
                                                                                <option value="2">Pucca but broken</option>
                                                                                <option value="3">Barbed wire fencing</option>
                                                                                <option value="4">Hedges</option>
                                                                                <option value="5">Under Construction</option>
                                                                                 <option value="6">No boundry wall</option>
                                                                                
                                                                            </select>
                                                                            <font style="color:#dd4b39;"><div id="emis_bw_alert"></div></font>
                                                                            <!--cwall tinyint(4) schoolnew_infradet-->
                                                                        </th>
                                                                        <th>Perimeter of boundary (in meters) <font style="color:#dd4b39;">*</font></th>
                                                                        <th>
                                                                            <input type="text" id="pbw" name="cwall_fence_len"  onfocus="textvalidate(this.id,'emis_pbw_alert');" onchange="textvalidate(this.id,'emis_pbw_alert');" maxlength="6" minlength="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required" class="form-control">
                                                                            <font style="color:#dd4b39;"><div id="emis_pbw_alert"></div></font>
                                                                             <!--cwall_fence_len bigint(20) schoolnew_infradet-->
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Length of the boundary wall constructed (in meters) <font style="color:#dd4b39;">*</font></th>
                                                                        <th>
                                                                            <input type="text" id="lbw" name="cwall_concre_len" maxlength="6" minlength="1"  onfocus="textvalidate(this.id,'emis_lbw_alert');" onchange="textvalidate(this.id,'emis_lbw_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  required="required" class="form-control">
                                                                            <font style="color:#dd4b39;"><div id="emis_lbw_alert"></div></font>
                                                                            <!--cwall_concre_len bigint(20) schoolnew_infradet-->
                                                                        </th>
                                                                        <th>Total no of Buildings / Blocks <font style="color:#dd4b39;">*</font></th>
                                                                        <th> 
                                                                            <input type="text" id="tnobb" name="ec_cer_no"  onfocus="textvalidate(this.id,'emis_tnobb_alert');" onchange="blockgenerate(this);textvalidate(this.id,'emis_tnobb_alert');" onblur="if(!restlength(this)){setMinandMax(this,'block_1');}blockgenerate(this);"  min="1" max="25" maxlength="2"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required" class="form-control">
                                                                            <font style="color:#dd4b39;"><div id="emis_tnobb_alert"></div></font>
                                                                              <!--ec_cer_no varchar(20) schoolnew_land-->
                                                                        </th>
                                                                     </tr>
                                                                        <!--<th>Status of School building</th>
                                                                        <th>
                                                                            <select class="form-control" id="ssb" name="ssb" required onfocus="textvalidate(this.id,'emis_ssb_alert');" onchange="textvalidate(this.id,'emis_ssb_alert');"><option value="">Choose</option>
                                                                                <option value="1">Privately owned</option>
                                                                                <option value="2">Rented</option>
                                                                                <option value="3">Government</option>
                                                                                <option value="4">Government School in a rent free building</option>
                                                                                <option value="5">No Building</option>
                                                                                <option value="6">Under Construction</option>
                                                                            </select>
                                                                            <font style="color:#dd4b39;"><div id="emis_ssb_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Type of School building</th>
                                                                        <th>
                                                                            <select class="form-control" id="tsb" name="tsb" required onfocus="textvalidate(this.id,'emis_tsb_alert');" onchange="textvalidate(this.id,'emis_tsb_alert');"><option value="">Choose</option>
                                                                                <option value="1">Pucca (building concrete roof)</option>
                                                                                <option value="2">Partially Pucca (pucca walls and floor without concrete roof)</option>
                                                                                <option value="3">Kachcha</option>
                                                                                <option value="4">Tent</option>
                                                                            </select>
                                                                            <font style="color:#dd4b39;"><div id="emis_tsb_alert"></div></font>
                                                                        </th>
                                                                    </tr>-->
                                                                </table>
                                                             </div>
                                                             <!--<div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Number of Pucca buildings </th>
                                                                        <th> 
                                                                            <input type="number" id="npb" name="npb"  onfocus="textvalidate(this.id,'emis_npb_alert');" onchange="textvalidate(this.id,'emis_npb_alert');" min="0" onkeydown="return restlength(this)"  max="15" maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required" class="form-control">
                                                                            <font style="color:#dd4b39;"><div id="emis_npb_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Number of partially Pucca buildings</th>
                                                                        <th>
                                                                            <input type="number" id="nppb" name="nppb" min="0" max="15"  onfocus="textvalidate(this.id,'emis_nppb_alert');" onchange="textvalidate(this.id,'emis_nppb_alert');" onkeydown="return restlength(this)"  maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required" class="form-control">
                                                                            <font style="color:#dd4b39;"><div id="emis_nppb_alert"></div></font>
                                                                        </th>                                                                
                                                                    </tr>
                                                                    <tr>                                                               
                                                                        <th>Number of kutcha buildings</th>
                                                                        <th>
                                                                            <input type="number" id="nkb" name="nkb" min="0" max="15"  onfocus="textvalidate(this.id,'emis_nkb_alert');" onchange="textvalidate(this.id,'emis_nkb_alert');" onkeydown="return restlength(this)"   maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required" class="form-control">
                                                                            <font style="color:#dd4b39;"><div id="emis_nkb_alert"></div></font>
                                                                        </th>                                                               
                                                                    </tr>                                                               
                                                                    <tr>
                                                                        <th>Number of Tents</th>
                                                                        <th>
                                                                            <input type="number" id="not" name="not"  onfocus="textvalidate(this.id,'emis_not_alert');" onchange="textvalidate(this.id,'emis_not_alert');" min="0" max="15" onkeydown="return restlength(this)"  maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required" class="form-control">
                                                                            <font style="color:#dd4b39;"><div id="emis_not_alert"></div></font>
                                                                        </th>                                                             
                                                                    </tr>
                                                                </table>
                                                             </div>-->
                                                             <div id="blockcreate"></div>
                                                             <input type="hidden" id="hiddennoc_0" name="hiddennoc_0" value="schoolnew_natureofconst_entry"/>
                                                             <div class="form-group col-md-12" id="block_1" style="display:none;">
                                                                <table class="table" id="blocktable_1">
                                                                    <tr>
                                                                        <th colspan="13" class="bg-primary text-white">
                                                                            
                                                                            <span class="caption-subject text-white sbold uppercase" >Block</span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Nature of Construction:</th>
                                                                        <th >Total no of floors (including ground floor)</th>
                                                                        <th colspan="2">Total no of class room</th>
                                                                        <th >Office room</th>
                                                                        <th >Lab room</th>
                                                                        <th>Library room</th>
                                                                        <th >Computer room</th>
                                                                        <th>Arts/Craft room</th>
                                                                        <th>Staff room</th>
                                                                        <th >HM/AHM/Vice Principal room</th>
                                                                        <th >Separate room for Girls</th>
                                                                        <th >Total no of rooms</th>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th></th>
                                                                        
                                                                        <th>In use</th>
                                                                        <th>Not in use</th>
                                                                        <th></th>
                                                                        <th></th>
                                                                        <th></th>
                                                                        <th></th>
                                                                        <th></th>
                                                                        <th></th>
                                                                        <th></th>
                                                                        <th></th>
                                                                        <th></th>
                                                                    </tr>
                                                                    <tr>
                                                                        
                                                                        <th>
                                                                        
                                                                        <select class="form-control" id="noc" name="noc"  onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);makereadonly(this.parentNode);">
                                                                        <option value="">Choose</option> 
                                                                        <option value="1">Pucca</option>
                                                                        <option value="2">Partially Pucca</option>
                                                                        <option value="3">Kutcha</option>
                                                                        
                                                                        <!--<option value="4">Tents</option>-->
                                                                        </select>
                                                                            
                                                                            <!--<select class="form-control" id="noc" name="noc"  onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="selectionValidation(this,this.parentNode.parentNode);textvalidate(this.id,this.nextElementSibling.id);" required>
                                                                                <option value="">Choose</option>
                                                                                <?php
                                                                                    foreach($constructlist as $dis){
                                                                                ?>
                                                                                    <option value="<?php echo($dis->id); ?>"><?php echo($dis->construct); ?></option>
                                                                                <?php
                                                                                    }
                                                                                ?>                                                                            
                                                                            </select>-->
                                                                            <div id="emisconstr_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        <th>
                                                                            <input type="text" id="totalarea" name="totalarea" minlength="1" maxlength="2"  min="0" max="10" onkeydown="return restlength(this)" onblur="return restlength(this)" id="totalarea" name="totalarea" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);sumofall(this.parentNode.parentNode,2);" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control">
                                                                            <div id="emistotalarea_0" style="color:#dd4b39;"></div>
                                                                            
                                                                        </th>
                                                                        
                                                                        <th >
                                                                            <input type="text" maxlength="2" minlength="1" id="classroominuse"  name="classroominuse" onkeyup="sum('noofrooms');" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);sumofall(this.parentNode.parentNode,2);" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control">
                                                                            <div id="emisclassroominuse_0" style="color:#dd4b39;"></div>
                                                                             
                                                                        </th>
                                                                        <th  >
                                                                           <input type="text" maxlength="2" minlength="1" id="classroomnotuse" name="classroomnotuse" onkeyup="sum('noofrooms');" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);sumofall(this.parentNode.parentNode,2);" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control">
                                                                           <div id="emisclassroomnotuse_0" style="color:#dd4b39;"></div>
                                                                           
                                                                        </th>
                                                                        
                                                                        <th >
                                                                            <input type="text" id="officeroom" maxlength="2" minlength="1" name="officeroom" onkeyup="sum('noofrooms');" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);sumofall(this.parentNode.parentNode,2);" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control">
                                                                            <div id="emisofficeroom_0" style="color:#dd4b39;"></div>
                                                                           
                                                                        </th>
                                                                        <th >
                                                                            <input type="text" id="labroom" name="labroom" maxlength="2" minlength="1" onkeyup="sum('noofrooms');" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);sumofall(this.parentNode.parentNode,2);"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" >
                                                                           <div id="emislabroom_0" style="color:#dd4b39;"></div>
                                                                          
                                                                        </th>
                                                                        <th>
                                                                            <input type="text" id="libraryroom" maxlength="2" minlength="1" name="libraryroom" onkeyup="sum('noofrooms');" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);sumofall(this.parentNode.parentNode,2);"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" >
                                                                            <div id="emislibraryroom_0" style="color:#dd4b39;"></div>
                                                                            
                                                                        </th>
                                                                        <th>
                                                                            <input type="text" id="com" name="com" maxlength="2" minlength="1" onkeyup="sum('noofrooms');" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);sumofall(this.parentNode.parentNode,2);" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" >
                                                                            <div id="emiscom_0" style="color:#dd4b39;"></div>
                                                                            
                                                                        </th>
                                                                        <th >
                                                                            <input type="text" id="gam" name="gam" maxlength="2" minlength="1" onkeyup="sum('noofrooms');" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);sumofall(this.parentNode.parentNode,2);"onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" >
                                                                            <div id="emisgam_0" style="color:#dd4b39;"></div>
                                                                            
                                                                        </th>
                                                                        <th>
                                                                            <input type="text" id="staffroom" maxlength="2" name="staffroom" minlength="1" onkeyup="sum('noofrooms');" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);sumofall(this.parentNode.parentNode,2);" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control">
                                                                            <div id="staffroom_0" style="color:#dd4b39;"></div>
                                                                            
                                                                        </th>
                                                                        <th>
                                                                            <input type="text" id="sra" name="sra" onkeyup="sum('noofrooms');" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);sumofall(this.parentNode.parentNode,2);" minlength="1" maxlength="2" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  class="form-control"/>
                                                                            <div id="emissra_0" style="color:#dd4b39;"></div>
                                                                            
                                                                        </th>
                                                                        <th>
                                                                            <input type="text" id="scrg1" name="scrg1" onkeyup="sum('noofrooms');" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);sumofall(this.parentNode.parentNode,2);" maxlength="2" minlength="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  class="form-control"/>
                                                                            <div id="emisscrg1_0" style="color:#dd4b39;"></div>
                                                                             
                                                                        </th>
                                                                        <th style="width: 80px !important;">
                                                                            <input type="text" maxlength="2" minlength="1" id="noofrooms" name="noofrooms"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" readonly>
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                             </div>
                                                             <div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th colspan="4" class="bg-primary text-white">
                                                                            <i class="fa fa-gear"></i>
                                                                            <span class="caption-subject text-white sbold uppercase" >Classroom DETAILS</span>
                                                                        </th>
                                                                    </tr>
                                                                    <!--<tr>
                                                                        <th>Total number of Classrooms currently available</th>
                                                                        <th>
                                                                            <input type="text" id="nocca" name="nocca"  onfocus="textvalidate(this.id,'emis_nocca_alert');" onchange="textvalidate(this.id,'emis_nocca_alert');" maxlength="3" minlength="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required" class="form-control">
                                                                            <font style="color:#dd4b39;"><div id="emis_nocca_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Number of Classrooms in dilapidated condition / requiring demolition</th>
                                                                        <th>
                                                                            <input type="text" id="ncdc" name="ncdc"  onfocus="textvalidate(this.id,'emis_ncdc_alert');" onchange="textvalidate(this.id,'emis_ncdc_alert');" maxlength="3" minlength="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  required="required" class="form-control">
                                                                            <font style="color:#dd4b39;"><div id="emis_ncdc_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Classrooms requiring major repair and not in use</th>
                                                                        <th>
                                                                            <input type="text" id="rmr" name="rmr"  onfocus="textvalidate(this.id,'emis_rmr_alert');" onchange="textvalidate(this.id,'emis_rmr_alert');" maxlength="3" minlength="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required" class="form-control">
                                                                            <font style="color:#dd4b39;"><div id="emis_rmr_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Classrooms used for instructional purposes </th>
                                                                        <th>
                                                                            <input type="text" id="crip" name="crip"  onfocus="textvalidate(this.id,'emis_crip_alert');" onchange="textvalidate(this.id,'emis_crip_alert');" maxlength="3" minlength="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required" class="form-control">
                                                                            <font style="color:#dd4b39;"><div id="emis_crip_alert"></div></font>
                                                                        </th>
                                                                    </tr>-->
                                                                    <tr>
                                                                        <th> Classrooms under construction <font style="color:#dd4b39;">*</font></th>
                                                                        <th>
                                                                            <input type="text" id="cuc" name="new_build"  onfocus="textvalidate(this.id,'emis_cuc_alert');" onchange="textvalidate(this.id,'emis_cuc_alert');" maxlength="3" minlength="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required" class="form-control">
                                                                            <font style="color:#dd4b39;"><div id="emis_cuc_alert"></div></font>
                                                                             <!--new_build var(20) schoolnew_basicinfo-->
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Do all the classrooms have desk / table for students? <font style="color:#dd4b39;">*</font></th>
                                                                        <th>
                                                                            <input type="radio" id="dtst_1" value="1" name="open_mt"><label for="dtst_1">YES</label>
                                                                            <input type="radio" id="dtst_2" value="0" name="open_mt" checked="checked"/><label for="dtst">NO</label>
                                                                            <!--open_mt bigint(20) schoolnew_infradet-->
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                             </div>
                                                             <div class="form-group col-md-12">
                                                                <input type="hidden" id="hiddenoac_0" name="hiddenoac_0" value="schoolnew_classroomlevel_entry" />
                                                                 <table class="table">
                                                                    <tr>
                                                                        <th>Out of the available classrooms, details by stage / level <font style="color:#dd4b39;">*</font></th>
                                                                        <th>
                                                                            <select class="form-control" id="oac_0" name="oac_0"  onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);selectionValidation(this,this.parentNode.parentNode,1);" required><option value="">Choose</option>
                                                                                <option value="1">Pre Primary</option>
                                                                                <option value="2">Primary</option>
                                                                                <option value="3">Upper Primary</option>
                                                                                <option value="4">Secondary</option>
                                                                                <option value="5">Higher Secondary</option>
                                                                            </select>
                                                                            
                                                                            <div id="emisoac_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        <th>How many rooms <font style="color:#dd4b39;">*</font></th>
                                                                        <th>
                                                                            <input type="text" id="hmr_0" name="hmr_0"  onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);" maxlength="3" minlength="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  class="form-control" required >
                                                                            <!--lib_eng_news,lib_periodic,trans_bus,trans_van bigint(20) schoolnew_infradet-->
                                                                            <div id="emishmr_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        <th>
                                                                            <button type="button" id="btnoac_0" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,1)"><i class="fa fa-plus"></i></button>
                                                                            <button type="button" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,0)"><i class="fa fa-minus"></i></button>
                                                                        </th>
                                                                    </tr>
                                                                    
                                                                 </table>
                                                             </div>
                                                             
                                                              <div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th >Whether there is a ramp for differently abled children to access classrooms? <font style="color:#dd4b39;">*</font></th><th>
                                                                            <input type="radio" id="dchac_1" name="cwall_fence" value="1" onchange="sbcshow2(this,'handrailsdetails');"/><label for="dchac">YES</label>
                                                                            <input type="radio" id="dchac_2" name="cwall_fence" value="0" onchange="sbcshow2(this,'handrailsdetails');" checked="checked"/><label for="dchac_2">NO</label>
                                                                            <!--cwall_fence tinyint(4) schoolnew_infradet-->
                                                                        </th>
                                                                    
                                                                        <th class="handrailsdetails">Whether hand-rails for ramp available? <font style="color:#dd4b39;">*</font></th>
                                                                        <th class="handrailsdetails">
                                                                            <input type="radio" value="1" id="rails_1" name="cwall_concre" /><label for="rails_1">YES</label>
                                                                            <input type="radio" value="0" id="rails_2" name="cwall_concre" checked="checked"/><label for="rails_2">NO</label>
                                                                            <!--cwall_concre tinyint(4) schoolnew_infradet-->
                                                                        </th>
                                                                        
                                                                    </tr>
                                                                </table>
                                                              </div>
                                                             <div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th colspan="4" class="bg-primary text-white">
                                                                            <i class="fa fa-gear"></i>
                                                                            <span class="caption-subject text-white sbold uppercase" >OTHER ROOM DETAILS</span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Facilities <font style="color:#dd4b39;">*</font></th>
                                                                        <th>Choose <font style="color:#dd4b39;">*</font></th>
                                                                        <th class="sqdetails">How many rooms</th>
                                                                    </tr>
                                                                    <!--<tr>
                                                                        <th>Separate room for Assistant Head Master/Vice Principal</th>
                                                                        <th>
                                                                            <input type="radio" id="mvcp_1" name="mvcp" value="1" onchange="sbcshow1(this,'hmvc');"/><label for="mvcp_1">YES</label>
                                                                            <input type="radio" id="mvcp_2" name="mvcp" value="0" onchange="sbcshow1(this,'hmvc');" checked="checked"/><label for="mvcp_2">NO</label>
                                                                        </th>
                                                                        <th class="hmvc">
                                                                            <input type="number" id="sra" name="sra" required onfocus="textvalidate(this.id,'emis_sra_alert');" onchange="textvalidate(this.id,'emis_sra_alert');" min="0" max="15" maxlength="2" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  class="form-control"/>
                                                                            <font style="color:#dd4b39;"><div id="emis_sra_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Separate common room for Girls</th>
                                                                        <th>
                                                                            <input type="radio" id="scr_1" name="scr" value="1" onchange="sbcshow1(this,'scrg');"/><label for="scr_1">YES</label>
                                                                            <input type="radio" id="scr_2" name="scr" value="0" onchange="sbcshow1(this,'scrg');" checked="checked"/><label for="scr_2">NO</label>
                                                                        </th>
                                                                        <th class="scrg">
                                                                            <input type="number" id="scrg1" name="scrg1" required onfocus="textvalidate(this.id,'emis_scrg1_alert');" onchange="textvalidate(this.id,'emis_scrg1_alert');" min="0" max="15" maxlength="2" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  class="form-control"/>
                                                                            <font style="color:#dd4b39;"><div id="emis_scrg1_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Staffroom for Teachers</th>
                                                                        <th>
                                                                            <input type="radio" id="sft_1" name="sft" value="1" onchange="sbcshow1(this,'stafft');" /><label for="sft_1">YES</label>
                                                                            <input type="radio" id="sft_2" name="sft" value="0" onchange="sbcshow1(this,'stafft');" checked="checked"/><label for="sft_2">NO</label>
                                                                        </th>
                                                                        <th class="stafft">
                                                                            <input type="number" id="sft1" name="sft1" required onfocus="textvalidate(this.id,'emis_sft1_alert');" onchange="textvalidate(this.id,'emis_sft1_alert');" min="0" max="15" maxlength="2" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  class="form-control"/>
                                                                            <font style="color:#dd4b39;"><div id="emis_sft1_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <th>Computer Lab</th><th>
                                                                            <input type="radio" id="cl_1" value="1" name="cl"  onchange="sbcshow1(this,'cldetails');"/><label for="cl_1">YES</label>
                                                                            <input type="radio" id="cl_2" value="0" name="cl"  onchange="sbcshow1(this,'cldetails');" checked="checked"/><label for="cl_2">NO</label></th>
                                                                        <th class="cldetails">


                                                                            <input type="number" id="cl1" name="cl1" required onfocus="textvalidate(this.id,'emis_cl1_alert');" onchange="textvalidate(this.id,'emis_cl1_alert');" min="0" max="15" maxlength="2" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  class="form-control"/>
                                                                            <font style="color:#dd4b39;"><div id="emis_cl1_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <th>Co-curricular/Activity Room/Arts and Crafts Room</th><th>
                                                                            <input type="radio" id="caac_1" name="caac" value="1" onchange="sbcshow1(this,'caacdetails');"/><label for="caac_1">YES</label>
                                                                            <input type="radio" id="caac_2" name="caac" value="0" onchange="sbcshow1(this,'caacdetails');" checked="checked"/><label for="caac_2">NO</label>
                                                                        </th>
                                                                        <th class="caacdetails">
                                                                            <input type="number" id="caac1" required onfocus="textvalidate(this.id,'emis_caac1_alert');" onchange="textvalidate(this.id,'emis_caac1_alert');" name="caac1" min="0" max="15" maxlength="2" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  class="form-control"/>
                                                                            <font style="color:#dd4b39;"><div id="emis_caac1_alert"></div></font>
                                                                        </th>
                                                                    </tr> -->   
                                                                    <tr>
                                                                        <th>Staff quarters (including Residential Quarters for Head Master/Principal and Others) <font style="color:#dd4b39;">*</font></th><th>
                                                                            <input type="radio" id="sq_1" value="1" name="cwall_notcon_len" onchange="sbcshow2(this,'sqdetails');" /><label for="sq_1">YES</label>
                                                                            <input type="radio" id="sq_2" value="0" name="cwall_notcon_len" onchange="sbcshow2(this,'sqdetails');" checked="checked"/><label for="sq_2">NO</label>
                                                                            <!--cwall_notcon_len bigint(20) schoolnew_infradet-->
                                                                        </th>
                                                                        <th class="sqdetails">
                                                                            <input type="text" id="sqhm" name="cwall_nbarr_len" onfocus="textvalidate(this.id,'emis_sqhm_alert');" onchange="textvalidate(this.id,'emis_sqhm_alert');" maxlength="2" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  class="form-control"/>
                                                                            <!--cwall_nbarr_len bigint(20) schoolnew_infradet-->
                                                                            <font style="color:#dd4b39;"><div id="emis_sqhm_alert"></div></font>
                                                                        </th>
                                                                    </tr>         
                                                                                    
                                                                   <!--<tr>
                                                                        <th>Library Room</th><th>
                                                                            <input type="radio" id="libr_1" value="1" name="libr"  onchange="sbcshow1(this,'lrdetails');" /><label for="lr_1">YES</label>
                                                                            <input type="radio" id="libr_2" value="0" name="libr"  onchange="sbcshow1(this,'lrdetails');" checked="checked"/><label for="lr_2">NO</label>
                                                                        </th>
                                                                        <th class="lrdetails">
                                                                            <input type="number" id="lr1" name="lr1" required onfocus="textvalidate(this.id,'emis_lr1_alert');" onchange="textvalidate(this.id,'emis_lr1_alert');" min="0" max="15" maxlength="2" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  class="form-control"/>
                                                                            <font style="color:#dd4b39;"><div id="emis_lr1_alert"></div></font>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Does the School have a full-time Librarian?</th>
                                                                        <th>
                                                                            <input type="radio" id="ftl_1" name="ftl"/><label for="ftl_1">YES</label>
                                                                            <input type="radio" id="ftl_2" name="ftl" checked="checked"/><label for="ftl_2">NO</label>
                                                                        </th>
                                                                        <th></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Does the School subcribe Newspapers/Magazines?</th>
                                                                        <th>
                                                                            <input type="radio" id="nwm_1" name="nwm"/><label for="nwm_1">YES</label>
                                                                            <input type="radio" id="nwm_2" name="nwm" checked="checked"/><label for="nwm_2">NO</label>
                                                                        </th>
                                                                        <th></th>
                                                                    </tr>-->
                                                                </table>
                                                             </div>
                                                             <div class="form-group col-md-12">
                                                                <input type="hidden" id="hiddenlbrc_0" name="hiddenlbrc_0" value="schoolnew_library_entry"/>
                                                                <table class="table">
                                                                    <tr>
                                                                        <th>Whether the School has Library facility/Book Bank/ Reading Corner? <font style="color:#dd4b39;">*</font></th>
                                                                        
                                                                        <th >Total number of books <font style="color:#dd4b39;">*</font></th>
                                                                        <th>Add (+)&nbsp;&nbsp; Delete(-)</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            
                                                                            <select class="form-control" id="lbrc" name="lbrc_0" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="selectionValidation(this,this.parentNode.parentNode);textvalidate(this.id,this.nextElementSibling.id);" required>
                                                                                <option value="">Choose</option>
                                                                                <option value="1">Library</option>
                                                                                <option value="2">Book Bank</option>
                                                                                <option value="3">Reading Corner</option>
                                                                                <option value="4">Newspapers/Magazines</option>
                                                                                <option value="5">None</option>
                                                                            </select>
                                                                            <div id="emislbrc_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                       
                                                                        <th>
                                                                            <input type="text" id="lbr1" name="lbr1_0"  onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);" maxlength="6" minlength="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                            <!--lib_tamil,lib_eng,lib_others,lib_tamil_news bigint(20) schoolnew_infradet-->
                                                                            <div id="emislbr1_0" style="color:#dd4b39;"></div>
                                                                        </th>
                                                                        <th>
                                                                            <button type="button" id="btnlbrc_0" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,1)"><i class="fa fa-plus"></i></button>&nbsp;&nbsp;
                                                                            <button type="button" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,0)"><i class="fa fa-minus"></i></button>
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                             </div>
                                                             <!--<div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th colspan="5" class="bg-primary text-white">
                                                                            <i class="fa fa-smile-o"></i>
                                                                            <span class="caption-subject text-white sbold uppercase" >School Toilets and Hand Wash Facility Details</span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>Constructed by:</th>
                                                                        <th class="ognamedetails">Organization name</th>
                                                                        <th>No. of Toilets</th>
                                                                        <th>Add (+)&nbsp;&nbsp; Delete(-)</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Toilets</th>
                                                                        <th>
                                                                            <select class="form-control" id="cby" name="cby"  onfocus="textvalidate(this.id,'emis_cby_alert');" onchange="selectshow(this,'ognamedetails');textvalidate(this.id,'emis_cby_alert');" required>
                                                                                <option value="">Choose</option>
                                                                                <?php
                                                                                    foreach($ictsuplier as $dis){
                                                                                ?>
                                                                                    <option value="<?php echo($dis->id); ?>"><?php echo($dis->supplier_name); ?></option>
                                                                                <?php
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                            <font style="color:#dd4b39;"><div id="emis_cby_alert"></div></font>
                                                                        </th>
                                                                        <th class="ognamedetails">
                                                                            <input type="text" id="ogname" name="ogname" onfocus="textvalidate(this.id,'emis_ogname_alert');" onchange="textvalidate(this.id,'emis_ogname_alert');" maxlength="100" minlength="1" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" class="form-control" required>
                                                                            <font style="color:#dd4b39;"><div id="emis_ogname_alert"></div></font>
                                                                        </th>
                                                                        <th>
                                                                            <input type="text" id="notoil" name="notoil" onfocus="textvalidate(this.id,'emis_notoil_alert');" onchange="textvalidate(this.id,'emis_notoil_alert');" maxlength="3" minlength="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" required>
                                                                            <font style="color:#dd4b39;"><div id="emis_notoil_alert"></div></font>
                                                                        </th>
                                                                        <th>
                                                                            <button type="button" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,1)"><i class="fa fa-plus"></i></button>&nbsp;&nbsp;
                                                                            <button type="button" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,0)"><i class="fa fa-minus"></i></button>
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                             </div>
                                                             <div class="form-group col-md-12">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th colspan="5" class="bg-primary text-white">
                                                                            <i class="fa fa-smile-o"></i>
                                                                            <span class="caption-subject text-white sbold uppercase" >School Toilets and Hand Wash Facility Details</span>
                                                                        </th>
                                                                    </tr>
                                                                    
                                                             </table>
                                                        </div>-->
                                                        <div class="form-group col-md-12">
                                                            <table class="table">
                                                                <tr>
                                                                        <th colspan="5" class="bg-primary text-white">
                                                                            <i class="fa fa-smile-o"></i>
                                                                            <span class="caption-subject text-white sbold uppercase" >School Toilets for Staff Details</span>
                                                                        </th>
                                                                    </tr>
                                                                <tr>
                                                                    <th>Details of Toilets and Urinals for Staff <font style="color:#dd4b39;">*</font></th>
                                                                    <th>Gents <font style="color:#dd4b39;">*</font></th>
                                                                    <th>Ladies <font style="color:#dd4b39;">*</font></th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Total number of Toilets available <font style="color:#dd4b39;">*</font></th>
                                                                    <th>
                                                                        <input type="number" id="tnotam" name="cwall_existbu_len"  onfocus="textvalidate(this.id,'emis_tnotam_alert');" onchange="textvalidate(this.id,'emis_tnotam_alert');" min="0" minlength="1" max="999"  maxlength="3" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" required/>
                                                                         <!--cwall_existbu_len bigint(20) schoolnew_infradet-->
                                                                        <font style="color:#dd4b39;"><div id="emis_tnotam_alert"></div></font>
                                                                    </th>
                                                                    <th>
                                                                        <input type="number" id="tnotaf" name="cwall_nbarr" required onfocus="textvalidate(this.id,'emis_tnotaf_alert');" onchange="textvalidate(this.id,'emis_tnotaf_alert');" min="0" max="999" minlength="1" maxlength="3" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >=48 && event.charCode <= 57" class="form-control"/>
                                                                         <!--cwall_nbarr bigint(20) schoolnew_infradet-->
                                                                        <font style="color:#dd4b39;"><div id="emis_tnotaf_alert"></div></font>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Total number of Urinals available <font style="color:#dd4b39;">*</font></th>
                                                                    <th>
                                                                        <input type="number" id="tnouam" name="fans" required onfocus="textvalidate(this.id,'emis_tnouam_alert');" onchange="textvalidate(this.id,'emis_tnouam_alert');" min="0" max="999" minlength="1" maxlength="3" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                        <!--fans varchar(50) schoolnew_infradet-->
                                                                        <font style="color:#dd4b39;"><div id="emis_tnouam_alert"></div></font>
                                                                    </th>
                                                                    <th>
                                                                        <input type="number" id="tnouaf" name="room_cat" required onfocus="textvalidate(this.id,'emis_tnouaf_alert');" onchange="textvalidate(this.id,'emis_tnouaf_alert');" min="0" max="999" minlength="1" maxlength="3" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >=48 && event.charCode <= 57" class="form-control"/>
                                                                        <!--room_cat varchar(50) schoolnew_building-->
                                                                        <font style="color:#dd4b39;"><div id="emis_tnouaf_alert"></div></font>
                                                                    </th>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <table class="table">
                                                                <tr>
                                                                        <th colspan="7" class="bg-primary text-white">
                                                                            <i class="fa fa-smile-o"></i>
                                                                            <span class="caption-subject text-white sbold uppercase" >School Toilets for Students Details</span>
                                                                        </th>
                                                                    </tr>
                                                                <tr>
                                                                    <th>Details of Toilets and Urinals for Students <font style="color:#dd4b39;">*</font></th>
                                                                    <th colspan="3" style="text-align: center !important; border-right: thin #ccc solid;">Boys Only <font style="color:#dd4b39;">*</font></th>
                                                                    
                                                                    <th colspan="3" style="text-align: center !important;">Girls Only <font style="color:#dd4b39;">*</font></th>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                <th></th>
                                                                <th style="text-align: center !important;">In use</th>
                                                                <th style="text-align: center !important;">Not in use</th>
                                                                <th style="text-align: center !important;border-right: thin #ccc solid;">Reason for Not in use</th>
                                                                <th style="text-align: center !important;">In use</th>
                                                                <th style="text-align: center !important;">Not in use</th>
                                                                <th style="text-align: center !important;">Reason for Not in use</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Total number of Toilets available (Definition of functional toilet: water available in the toilet, minimal odour, unbroken seat, regularly cleaned with working drainage system, accessible to users, closable door) <font style="color:#dd4b39;">*</font></th>
                                                                    <th style="width: 100px;">
                                                                        <input type="number" id="notsaisb" name="hostel_floor" onfocus="textvalidate(this.id,'emis_notsaisb_alert');" onkeydown="return restlength(this)" onblur="return restlength(this)" onchange="textvalidate(this.id,'emis_notsaisb_alert');" min="0" max="999" minlength="1" maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" required/>
                                                                        <!--hostel_floor bigint(20) schoolnew_academicinfo-->
                                                                        <font style="color:#dd4b39;"><div id="emis_notsaisb_alert"></div></font>
                                                                    </th>
                                                                    <th style="width: 100px;">
                                                                        <input type="number" id="notsaisg" name="roof_type" onfocus="textvalidate(this.id,'emis_notsaisg_alert');" onchange="textvalidate(this.id,'emis_notsaisg_alert');" min="0" max="999" minlength="1" maxlength="3" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >=48 && event.charCode <= 57" class="form-control" required/>
                                                                         <!--roof_type varchar(50) schoolnew_building-->
                                                                        <font style="color:#dd4b39;"><div id="emis_notsaisg_alert"></div></font>
                                                                    </th>
                                                                    <th style="width: 150px; border-right: thin #ccc solid;">
                                                                        <select class="form-control" id="rtnf" name="bu_no" onfocus="textvalidate(this.id,'emis_rtnf_alert');" onchange="textvalidate(this.id,'emis_rtnf_alert');" required>
                                                                            <option value="">Choose</option>
                                                                            <option value="1">Water Supply</option>
                                                                            <option value="2">Drainage Problem</option>
                                                                            <option value="3">Toilet Damaged</option>
                                                                            <option value="4">Not Applicable</option>
                                                                        </select>
                                                                        <!--bu_no bigint(20) schoolnew_infradet-->
                                                                        <font style="color:#dd4b39;"><div id="emis_rtnf_alert"></div></font>
                                                                    </th>
                                                                    <th style="width: 100px;">
                                                                        <input type="number" id="notsaisg" name="bu_usable" onfocus="textvalidate(this.id,'emis_bu_usable_alert');" onchange="textvalidate(this.id,'emis_bu_usable_alert');" min="0" max="999" minlength="1" maxlength="3" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >=48 && event.charCode <= 57" class="form-control" required/>
                                                                        <!--bu_usable bigint(20) schoolnew_infradet-->
                                                                        <font style="color:#dd4b39;"><div id="emis_bu_usable_alert"></div></font>
                                                                    </th>
                                                                    <th style="width: 100px;">
                                                                        <input type="number" id="notsaisg" name="bu_minrep" onfocus="textvalidate(this.id,'emis_bu_minrep_alert');" onchange="textvalidate(this.id,'emis_bu_minrep_alert');" min="0" max="999" minlength="1" maxlength="3" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >=48 && event.charCode <= 57" class="form-control" required/>
                                                                        <!--bu_minrep bigint(20) schoolnew_infradet-->
                                                                        <font style="color:#dd4b39;"><div id="emis_bu_minrep_alert"></div></font>
                                                                    </th>
                                                                    <th style="width: 150px;">
                                                                        <select class="form-control" id="rtnf" name="bu_majrep" onfocus="textvalidate(this.id,'emis_rtnf_alert');" onchange="textvalidate(this.id,'emis_rtnf_alert');" required>
                                                                            <option value="">Choose</option>
                                                                            <option value="1">Water Supply</option>
                                                                            <option value="2">Drainage Problem</option>
                                                                            <option value="3">Toilet Damaged</option>
                                                                            <option value="4">Not Applicable</option>
                                                                        </select>
                                                                        <!--bu_majrep bigint(20) schoolnew_infradet-->
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Number of CWSN friendly functional toilets <font style="color:#dd4b39;">*</font></th>
                                                                    <th>
                                                                        <input type="number" id="cwsnfftb" name="gu_no" required onfocus="textvalidate(this.id,'emis_cwsnfftb_alert');" onchange="textvalidate(this.id,'emis_cwsnfftb_alert');" min="0" max="999" minlength="1" maxlength="3" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >=48 && event.charCode <=57" class="form-control"/>
                                                                        <!--gu_no bigint(20) schoolnew_infradet-->
                                                                        <font style="color:#dd4b39;"><div id="emis_cwsnfftb_alert"></div></font>
                                                                    </th>
                                                                    <th>
                                                                        <input type="number" id="cwsnfftg" name="gu_usable" required onfocus="textvalidate(this.id,'emis_cwsnfftg_alert');" onchange="textvalidate(this.id,'emis_cwsnfftg_alert');" min="0" max="999" minlength="1" maxlength="3" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >=48 && event.charCode <=57" class="form-control"/>
                                                                        <!--gu_usable bigint(20) schoolnew_infradet-->
                                                                        <font style="color:#dd4b39;"><div id="emis_cwsnfftg_alert"></div></font>
                                                                    </th>
                                                                    <th style="border-right: thin #ccc solid;">
                                                                        <select class="form-control" id="rtnf" name="gu_minrep" onfocus="textvalidate(this.id,'emis_gu_minrep_alert');" onchange="textvalidate(this.id,'emis_gu_minrep_alert');" required>
                                                                            <option value="">Choose</option>
                                                                            <option value="1">Water Supply</option>
                                                                            <option value="2">Drainage Problem</option>
                                                                            <option value="3">Toilet Damaged</option>
                                                                            <option value="4">Not Applicable</option>
                                                                        </select>
                                                                        <!--gu_minrep bigint(20) schoolnew_infradet-->
                                                                        <font style="color:#dd4b39;"><div id="emis_gu_minrep_alert"></div></font>
                                                                    </th>
                                                                    <th>
                                                                        <input type="number" id="cwsnfftg" name="gu_majrep" required onfocus="textvalidate(this.id,'emis_cwsnfftg_alert');" onchange="textvalidate(this.id,'emis_cwsnfftg_alert');" min="0" max="999" minlength="1" maxlength="3" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >=48 && event.charCode <=57" class="form-control"/>
                                                                         <!--gu_majrep bigint(20) schoolnew_infradet-->
                                                                        <font style="color:#dd4b39;"><div id="emis_cwsnfftg_alert"></div></font>
                                                                    </th>
                                                                    <th>
                                                                        <input type="number" id="cwsnfftb" name="bl_no" required onfocus="textvalidate(this.id,'emis_cwsnfftb_alert');" onchange="textvalidate(this.id,'emis_cwsnfftb_alert');" min="0" max="999" minlength="1" maxlength="3" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >=48 && event.charCode <=57" class="form-control"/>
                                                                        <!--bl_no bigint(20) schoolnew_infradet-->
                                                                        <font style="color:#dd4b39;"><div id="emis_cwsnfftb_alert"></div></font>
                                                                    </th>
                                                                    <th>
                                                                        <select class="form-control" id="rtnf" name="bl_usable" onfocus="textvalidate(this.id,'emis_rtnf_alert');" onchange="textvalidate(this.id,'emis_rtnf_alert');" required>
                                                                            <option value="">Choose</option>
                                                                            <option value="1">Water Supply</option>
                                                                            <option value="2">Drainage Problem</option>
                                                                            <option value="3">Toilet Damaged</option>
                                                                            <option value="4">Not Applicable</option>
                                                                        </select>
                                                                         <!--bl_usable bigint(20) schoolnew_infradet-->
                                                                        <font style="color:#dd4b39;"><div id="emis_cwsnfftg_alert"></div></font>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Total number of Urinals available <font style="color:#dd4b39;">*</font></th>
                                                                    <th>
                                                                        <input type="number" id="tnouab" name="bl_minrep" required onfocus="textvalidate(this.id,'emis_tnouab_alert');" onchange="textvalidate(this.id,'emis_tnouab_alert');" onkeydown="return restlength(this)" onblur="return restlength(this)" min="0" max="999" minlength="1" maxlength="3" onkeypress="return event.charCode >=48 && event.charCode <=57" class="form-control"/>
                                                                        <!--bl_minrep bigint(20) schoolnew_infradet-->
                                                                        <font style="color:#dd4b39;"><div id="emis_tnouab_alert"></div></font>
                                                                    </th>
                                                                    <th>
                                                                        <input type="number" id="tnouag" name="bl_majrep" required onfocus="textvalidate(this.id,'emis_tnouag_alert');" onchange="textvalidate(this.id,'emis_tnouag_alert');" min="0" max="999" minlength="1" maxlength="3" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >=48 && event.charCode <=57" class="form-control"/>
                                                                        <!--bl_majrep bigint(20) schoolnew_infradet-->
                                                                        <font style="color:#dd4b39;"><div id="emis_tnouag_alert"></div></font>
                                                                    </th>
                                                                    <th style="border-right: thin #ccc solid;">
                                                                        <select class="form-control" id="rtnf" name="gl_no" onfocus="textvalidate(this.id,'emis_rtnf_alert');" onchange="textvalidate(this.id,'emis_rtnf_alert');" required>
                                                                            <option value="">Choose</option>
                                                                            <option value="1">Water Supply</option>
                                                                            <option value="2">Drainage Problem</option>
                                                                            <option value="3">Toilet Damaged</option>
                                                                            <option value="4">Not Applicable</option>
                                                                        </select>
                                                                         <!--gl_no bigint(20) schoolnew_infradet-->
                                                                        <font style="color:#dd4b39;"><div id="emis_tnouab_alert"></div></font>
                                                                    </th>
                                                                    <th>
                                                                        <input type="number" id="tnouag" name="gl_usable" required onfocus="textvalidate(this.id,'emis_tnouag_alert');" onchange="textvalidate(this.id,'emis_tnouag_alert');" min="0" max="999" minlength="1" maxlength="3" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >=48 && event.charCode <=57" class="form-control"/>
                                                                         <!--gl_usable bigint(20) schoolnew_infradet-->
                                                                        <font style="color:#dd4b39;"><div id="emis_tnouag_alert"></div></font>
                                                                    </th>
                                                                    <th>
                                                                        <input type="number" id="tnouab" name="gl_minrep" required onfocus="textvalidate(this.id,'emis_tnouab_alert');" onchange="textvalidate(this.id,'emis_tnouab_alert');" onkeydown="return restlength(this)" onblur="return restlength(this)" min="0" max="999" minlength="1" maxlength="3" onkeypress="return event.charCode >=48 && event.charCode <=57" class="form-control"/>
                                                                        <!--gl_minrep bigint(20) schoolnew_infradet-->
                                                                        <font style="color:#dd4b39;"><div id="emis_tnouab_alert"></div></font>
                                                                    </th>
                                                                    <th>
                                                                        <select class="form-control" id="rtnf" name="gl_majrep" onfocus="textvalidate(this.id,'emis_rtnf_alert');" onchange="textvalidate(this.id,'emis_rtnf_alert');" required>
                                                                            <option value="">Choose</option>
                                                                            <option value="1">Water Supply</option>
                                                                            <option value="2">Drainage Problem</option>
                                                                            <option value="3">Toilet Damaged</option>
                                                                            <option value="4">Not Applicable</option>
                                                                        </select>
                                                                        <!--gl_majrep bigint(20) schoolnew_infradet-->
                                                                        <font style="color:#dd4b39;"><div id="emis_tnouag_alert"></div></font>
                                                                    </th>
                                                                </tr>
                                                                <!--<tr>
                                                                    <th>Out of above, How many functional seats available? - (Definition of functional toilet: water available<br /> in the toilet, minimal odour, unbroken seat, regularly cleaned with working drainage system, accessible to users, closable door) <font style="color:#dd4b39;">*</font></th>
                                                                    <th>
                                                                        <input type="number" id="hmfsa" name="hmfsa"  onfocus="textvalidate(this.id,'emis_hmfsab_alert');" onchange="textvalidate(this.id,'emis_hmfsab_alert');" min="0" max="999" minlength="1" maxlength="3" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" required/>
                                                                        <font style="color:#dd4b39;"><div id="emis_hmfsab_alert"></div></font>
                                                                    </th>
                                                                    <th>
                                                                        <input type="number" id="hmfsag" name="hmfsag"  onfocus="textvalidate(this.id,'emis_hmfsag_alert');" onchange="textvalidate(this.id,'emis_hmfsag_alert');" min="0" max="999" minlength="1" maxlength="3" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" required/>
                                                                        <font style="color:#dd4b39;"><div id="emis_hmfsag_alert"></div></font>
                                                                    </th>
                                                                </tr>-->
                                                                
                                                                <tr>
                                                                    <th>How many of the above Toilets have running water facility for flushing and cleaning? <font style="color:#dd4b39;">*</font></th>
                                                                    <th colspan="3" style="border-right: thin #ccc solid;">
                                                                        <input type="number" id="hmatwfb" name="gentsu_no" required onfocus="textvalidate(this.id,'emis_hmatwfb_alert');" onchange="textvalidate(this.id,'emis_hmatwfb_alert');" min="0" max="999" minlength="1" maxlength="3" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >=48 && event.charCode <=57" class="form-control"/>
                                                                        <!--gentsu_no bigint(20) schoolnew_infradet-->
                                                                        <font style="color:#dd4b39;"><div id="emis_hmatwfb_alert"></div></font>
                                                                    </th>
                                                                    <th colspan="3">
                                                                        <input type="number" id="hmatfwg" name="gentsu_usable" required onfocus="textvalidate(this.id,'emis_hmatwfg_alert');" onchange="textvalidate(this.id,'emis_hmatwfg_alert');" min="0" max="999" minlength="1" maxlength="3" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >=48 && event.charCode <=57" class="form-control"/>
                                                                        <!--gentsu_usable bigint(20) schoolnew_infradet-->
                                                                        <font style="color:#dd4b39;"><div id="emis_hmatwfg_alert"></div></font>
                                                                    </th>
                                                                    
                                                                    
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <th>How many urinals have water facility? <font style="color:#dd4b39;">*</font></th>
                                                                    <th colspan="3" style="border-right: thin #ccc solid;">
                                                                        <input type="number" id="oouwfb" name="gentsu_minrep" required onfocus="textvalidate(this.id,'emis_oouwfb_alert');" onchange="textvalidate(this.id,'emis_oouwfb_alert');" min="0" max="999" minlength="1" maxlength="3" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >=48 && event.charCode <=57" class="form-control"/>
                                                                        <!--gentsu_minrep bigint(20) schoolnew_infradet-->
                                                                        <font style="color:#dd4b39;"><div id="emis_oouwfb_alert"></div></font>
                                                                    </th>
                                                                    <th colspan="3">
                                                                        <input type="number" id="oouwfg" name="gentsu_majrep" required onfocus="textvalidate(this.id,'emis_oouwfg_alert');" onchange="textvalidate(this.id,'emis_oouwfg_alert');" min="0" max="999" minlength="1" maxlength="3" onkeydown="return restlength(this)" onblur="return restlength(this)" onkeypress="return event.charCode >=48 && event.charCode <=57" class="form-control"/>
                                                                         <!--gentsu_majrep bigint(20) schoolnew_infradet-->
                                                                        <font style="color:#dd4b39;"><div id="emis_oouwfg_alert"></div></font>
                                                                    </th>
                                                                    
                                                                    
                                                                </tr>
                                                                
                                                                <tr>
                                                                        
                                                                        <th>Is a Sanitary Worker engaged to clean the Toilets? <font style="color:#dd4b39;">*</font></th>
                                                                        <th colspan="2">
                                                                            <input type="radio" id="clt_1" value="1" name="ladiesu_no"/><label for="clt_1">YES</label>
                                                                            <input type="radio" id="clt_2" value="0" name="ladiesu_no" checked="checked"/><label for="clt_2">NO</label>
                                                                            <!--ladiesu_no bigint(20) schoolnew_infradet-->
                                                                        </th>
                                                                        <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    </tr>
                                                                    <tr>
                                                                    <th>Is there Land available for construction of additional Toilets if required? <font style="color:#dd4b39;">*</font></th>
                                                                    <th colspan="2">
                                                                        <input type="radio" id="atr_1" value="1" name="ladiesu_usable" onchange="document.getElementById('adtoiletdetails').style.visibility=(this.checked?'':'hidden')"/><label for="atr_1">YES</label>
                                                                        <input type="radio" id="atr_1" value="0" name="ladiesu_usable" onchange="document.getElementById('adtoiletdetails').style.visibility=(this.checked?'hidden':'')" checked="checked"/><label for="atr_2">NO</label>
                                                                        <!--ladiesu_usable bigint(20) schoolnew_infradet-->
                                                                    </th>
                                                                    <th id="adtoiletdetails" colspan="2">Sq.ft
                                                                        <input type="text" id="adtoiletdetails1" name="ladiesu_minrep" maxlength="7" minlength="1"  onfocus="textvalidate(this.id,'emis_adtoiletdetails1_alert');" onchange="textvalidate(this.id,'emis_adtoiletdetails1_alert');"  class="form-control" onkeypress="return event.charCode >=48 &amp;&amp; event.charCode <=57" placeholder="(in Sq.ft)">
                                                                        <!--ladiesu_minrep bigint(20) schoolnew_infradet-->
                                                                        <font style="color:#dd4b39;"><div id="emis_adtoiletdetails1_alert"></div></font>
                                                                    </th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    
                                                                </tr>
                                                                <!--<tr>
                                                                    <th>Whether Incinerator is available in the Girls Toilet <font style="color:#dd4b39;">*</font></th>
                                                                    <th colspan="2">
                                                                        <input type="radio" id="gt_1" name="gt"/><label for="gt_1">YES</label>
                                                                        <input type="radio" id="gt_2" name="gt" checked="checked"/><label for="gt_2">NO</label></th>
                                                                
                                                                </tr>-->
                                                                <!--<tr>
                                                                    <th>Reason for Toilet not functional <font style="color:#dd4b39;">*</font></th>
                                                                    <th colspan="3">
                                                                        <select class="form-control" id="rtnf" name="rtnf" onfocus="textvalidate(this.id,'emis_rtnf_alert');" onchange="textvalidate(this.id,'emis_rtnf_alert');" required>
                                                                            <option value="">Choose</option>
                                                                            <option value="1">Water Supply</option>
                                                                            <option value="2">Drainage Problem</option>
                                                                            <option value="3">Toilet Damaged</option>
                                                                            <option value="4">Not Applicable</option>
                                                                        </select>
                                                                        <font style="color:#dd4b39;"><div id="emis_rtnf_alert"></div></font>
                                                                    </th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <th>No of Toilets in Dilapidated Condition <font style="color:#dd4b39;">*</font></th>
                                                                    <th colspan="3">
                                                                        <input type="number" id="notdc" name="notdc" required onfocus="textvalidate(this.id,'emis_notdc_alert');" onchange="textvalidate(this.id,'emis_notdc_alert');" min="0" max="999" minlength="1" maxlength="3"  onkeydown="return restlength(this)" onblur="return restlength(this)"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"/>
                                                                        <font style="color:#dd4b39;"><div id="emis_notdc_alert"></div></font>
                                                                    </th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                   
                                                                </tr>-->
                                                                <tr>
                                                                    <th>Whether the School has been provided with Napkin Vending Machine? <font style="color:#dd4b39;">*</font></th>
                                                                    <th colspan="2">
                                                                        <input type="radio" id="nvm_1" value="1" name="napkin_inc" onchange="sbcshow2(this,'nvmdetails');"/><label for="nvm_1">YES</label>
                                                                        <input type="radio" id="nvm_2" value="0" name="napkin_inc" onchange="sbcshow2(this,'nvmdetails');" checked="checked"/><label for="nvm_2">NO</label>
                                                                        <!--napkin_inc bigint(20) schoolnew_infradet-->
                                                                    </th>
                                                                    <th class="nvmdetails">Functional</th>
                                                                    <th class="nvmdetails"><input type="text" class="form-control" id="napkin_avail" name="napkin_avail" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" maxlength="1" min="0" max="9"/></th>
                                                                    <th class="nvmdetails">Non Functional</th>
                                                                    <th class="nvmdetails"><input type="text" class="form-control" id="napkin_func" name="napkin_func" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" onchange="" onfocus="" maxlength="1" min="0" max="9"/></th>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="2" class="incindetails"></th>
                                                                    <th colspan="2" class="incindetails">Manual (Choolas)</th>
                                                                    <th colspan="3" class="incindetails">Automatic (Electrical)</th>
                                                                </tr>
                                                                <tr>
                                                                   <th colspan="2" class="incindetails"></th>
                                                                   <th class="incindetails">Functional</th>
                                                                   <th class="incindetails">Non Functional</th>
                                                                   <th class="incindetails">Functional</th>
                                                                   <th class="incindetails">Non Functional</th>
                                                                   <th class="incindetails"></th>     
                                                                </tr>
                                                                <tr>
                                                                    <th>Whether the School has been provided with Incinerator? <font style="color:#dd4b39;">*</font></th>
                                                                    <th>
                                                                        <input type="radio" id="incin_1" value="1" name="inciner" onchange="sbcshow2(this,'incindetails');"/><label for="incin_1">YES</label>
                                                                        <input type="radio" id="incin_2" value="0" name="inciner" onchange="sbcshow2(this,'incindetails');" checked="checked"/><label for="incin_2">NO</label>
                                                                       
                                                                    </th>
                                                                    <th class="incindetails"><input type="text" class="form-control" id="inc_auto_avail" name="inc_auto_avail" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" maxlength="1" min="0" max="9"/></th>
                                                                    <th class="incindetails"><input type="text" class="form-control" id="inc_auto_func" name="inc_auto_func" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" maxlength="1" min="0" max="9"/></th>
                                                                    <th class="incindetails"><input type="text" class="form-control" id="inc_man_avail" name="inc_man_avail" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" maxlength="1"  min="0" max="9"/></th>
                                                                    <th class="incindetails" colspan="2"><input type="text" class="form-control" id="inc_man_func" name="inc_man_func" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" maxlength="1" min="0" max="9"/></th>
                                                                   
                                                                </tr>
                                                            
                                                                
                                                            </table>
                                                        </div>
                                                        
                                                         
                                                        
                                                        <div class="form-group col-md-12">
                                                            <table class="table">
                                                                <tr>
                                                                    <th colspan="3" class="bg-primary text-white">
                                                                        <i class="fa fa-smile-o"></i>
                                                                        <span class="caption-subject text-white sbold uppercase" >School Driniking Water  AND HAND WASH FACILITY DETAILS</span>
                                                                    </th>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <th>Handwash Station <font style="color:#dd4b39;">*</font></th>
                                                                    <th>Available <font style="color:#dd4b39;">*</font></th>
                                                                    <th>Functional <font style="color:#dd4b39;">*</font></th>
                                                                    
                                                                    
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <th>Total no of Handwash Tap in use <font style="color:#dd4b39;">*</font></th>
                                                                    <th >
																		<input type="text" id="handwashboys" name="gentsl_no" min="0" max="500" maxlength="3" minlength="1" onfocus="textvalidate(this.id,'totalhws_alert');" onchange="textvalidate(this.id,'totalhws_alert');" onkeydown="return restlength(this)"  onblur="return restlength(this)" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" />
																		 <!--gentsl_no bigint(20) schoolnew_infradet-->
                                                                        <font style="color:#dd4b39;"><div id="totalhws_alert"></div></font>
																	</th>
                                                                    <th >
																		<input type="text" id="handwashgirls" name="gentsl_usable" min="0" max="500" maxlength="3" minlength="1" onfocus="textvalidate(this.id,'totalhwsg_alert');" onchange="textvalidate(this.id,'totalhwsg_alert');" onkeydown="return restlength(this)"  onblur="return restlength(this)"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" />
																		<!--gentsl_usable bigint(20) schoolnew_infradet-->
                                                                        <font style="color:#dd4b39;"><div id="totalhwsg_alert"></div></font>
																	</th>
                                                                    
                                                                    
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <table class="table">
                                                                <tr>
                                                                    <th>Whether drinking water is available in School premises? <font style="color:#dd4b39;">*</font></th>
                                                                    <th style="width: 165px;">
                                                                        <input type="radio" id="dwa_1" name="well_close" value="1" onchange="document.getElementById('wdwsp').selectedIndex=0;sbcshow1(this,'dwdetails'); selectshow(document.getElementById('wdwsp'),'topwell');  showOthersText(this.parentNode.parentNode,4,3); "/><label for="dwa_1">YES</label>
                                                                        <input type="radio" id="dwa_2" name="well_close" value="0" onchange="document.getElementById('wdwsp').selectedIndex=0;sbcshow1(this,'dwdetails'); selectshow(document.getElementById('wdwsp'),'topwell'); showOthersText(this.parentNode.parentNode,4,3); " checked="checked"/><label for="dwa_2">NO</label>
                                                                        <!--well_close varchar(15) schoolnew_infradet-->
                                                                    </th>
                                                                    <th class="dwdetails">If Yes, source of drinking water</th>
                                                                    <th class="dwdetails">
                                                                        <select class="form-control" id="wdwsp" name="water_facility" onfocus="textvalidate(this.id,'emis_wdwsp_alert');" onchange="selectshow(this,'topwell');showOthersText(this.parentNode.parentNode,4,3);textvalidate(this.id,'emis_wdwsp_alert');">
                                                                            <option value="">Choose</option>
                                                                            <option value="1">Hand pumps</option>
                                                                            <option value="2">Well</option>
                                                                            <option value="3">Tap water</option>
                                                                            <option value="4">RO purifier</option>
                                                                            <option value="-1">Others</option>
                                                                        </select>
                                                                        <!--water_facility varchar(10) schoolnew_infradet-->
                                                                        <font style="color:#dd4b39;"><div id="emis_wdwsp_alert"></div></font>
                                                                    </th>
                                                                    <th id="ifothersth_0">
                                                                            
                                                                                <input type="text" maxlength="100" minlength="1" id="ifothersd_0" name="gentsl_minrep" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" class="form-control">
                                                                                 <!--gentsl_minrep varchar(15) schoolnew_infradet-->
                                                                                <div id="emisothdrinking_0" style="color:#dd4b39;"></div>
                                                                                
                                                                    
                                                                    </th>
                                                                    <th class="topwell">
                                                                  
                                                                                Whether well is being maintained as top closed?<br />
                                                                                     <input type="radio" id="welltop_1" value="1" name="well_dia" /><label for="welltop_1">YES</label>
                                                                                     <input type="radio" id="welltop_2" value="0" name="well_dia" checked/><label for="welltop_2">NO</label>
                                                                                    <!--well_dia 'bigint(20)'-->
                                                                            
                                                                    </th>
                                                                    
                                                                
                                                                <!--<tr class="topwell">
                                                                    <th>Whether well is being maintained as top closed?</th>
                                                                    <th>
                                                                         <input type="radio" id="welltop_1" name="welltop" /><label for="welltop_1">YES</label>
                                                                         <input type="radio" id="welltop_2" name="welltop" checked/><label for="welltop_2">NO</label>
                                                                    </th>
                                                                </tr>-->
                                                            </table>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <table class="table">
                                                                <!--<tr>
                                                                    <th>Water facility available for <font style="color:#dd4b39;">*</font></th>
                                                                    <th>
                                                                        <select class="form-control" id="wfaf" name="wfaf" required onfocus="textvalidate(this.id,'emis_wfaf_alert');" onchange="textvalidate(this.id,'emis_wfaf_alert');">
																			<option value="">Choose</option>
                                                                            <option value="1">Drinking only</option>
                                                                            <option value="2">Toilet usage only</option>
                                                                            <option value="3">For both</option>
                                                                            <option value="4">None</option>
                                                                        </select>
                                                                        <font style="color:#dd4b39;"><div id="emis_wfaf_alert"></div></font>
                                                                    </th>
                                                                </tr>-->
                                                                <tr>
                                                                    <th>Whether the School is provided with Overhead tank ? <font style="color:#dd4b39;">*</font></th>
                                                                    <th>
                                                                        <input type="radio" id="spot_1" value="1" name="water_access"/><label for="spot_1">YES</label>
                                                                        <input type="radio" id="spot_2" value="0" name="water_access" checked="checked"/><label for="spot_1">NO</label></th>
                                                                     <!--Fieldname: water_access 'varchar(35)' schoolnew_infradet-->
                                                                </tr>
                                                                <tr>
                                                                    <th>Whether water purifier is available in the School? <font style="color:#dd4b39;">*</font></th>
                                                                    <th>
                                                                        <input type="radio" id="wpac_1" value="1" name="water_puri"/><label for="wpac_1">YES</label>
                                                                        <input type="radio" id="wpac_2" value="0" name="water_puri" checked="checked"/><label for="wpac_2">NO</label>
                                                                        <!--Fieldname: water_puri 'varchar(15)' schoolnew_infradet-->
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Does the School have provision for Rain Water Harvesting? <font style="color:#dd4b39;">*</font></th>
                                                                    <th>
                                                                        <input type="radio" id="rwh_1" value="1" name="rainwater"/><label for="rwh_1">YES</label>
                                                                        <input type="radio" id="rwh_1" value="0" name="rainwater" checked="checked"/><label for="rwh_2">NO</label>
                                                                        <!--Fieldname: rainwater 'varchar(10)' schoolnew_infradet-->
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
        document.getElementById('ifothersth_0').style.visibility='hidden';
        document.getElementById('bgscdetails').style.display='none';
        document.getElementById('adtoiletdetails').style.visibility='hidden';
        
        
        sbcshow1(document.getElementById('spf_2'),'spfdetails');
        sbcshow1(document.getElementById('spf_1'),'spfdetails1');
        sbcshow1(document.getElementById('schoolfaci_2'),'alanddetails');
        sbcshow2(document.getElementById('dchac_2'),'handrailsdetails');
        sbcshow2(document.getElementById('nvm_2'),'nvmdetails');
        sbcshow2(document.getElementById('incin_2'),'incindetails');
        //sbcshow2(document.getElementById('inc_auto_2'),'manualdetails');
        //sbcshow2(document.getElementById('inc_manual_1'),'manualdetails1');
        
        sbcshow1(document.getElementById('dwa_2'),'dwdetails');
        sbcshow2(document.getElementById('sq_2'),'sqdetails');
        
        selectshow(document.getElementById('wdwsp'),'topwell');
        landusage(0);
        
        function sum() {
            
             var c1 = document.getElementById('classroominuse').value==''?0:document.getElementById('classroominuse').value;
             var c2 = document.getElementById('classroomnotuse').value==''?0:document.getElementById('classroomnotuse').value;
             var c3 = document.getElementById('officeroom').value==''?0:document.getElementById('officeroom').value;
             var c4 = document.getElementById('labroom').value==''?0:document.getElementById('labroom').value;
             var c5 = document.getElementById('libraryroom').value==''?0:document.getElementById('libraryroom').value;
             var c6 = document.getElementById('com').value==''?0:document.getElementById('com').value;
             var c7 = document.getElementById('gam').value==''?0:document.getElementById('gam').value;
             var c8 = document.getElementById('staffroom').value==''?0:document.getElementById('staffroom').value;
             var c9 = document.getElementById('sra').value==''?0:document.getElementById('sra').value;
             var c10 = document.getElementById('scrg1').value==''?0:document.getElementById('scrg1').value;
             var result = parseInt(c1) + parseInt(c2) + parseInt(c3) + parseInt(c4) + parseInt(c5) + parseInt(c6) + parseInt(c7) + parseInt(c8) + parseInt(c9) + parseInt(c10);
             document.getElementById('noofrooms').value = result;
        }
        
       
      /* 
      selectshow(document.getElementById('cby'),'ognamedetails');
      
      sbcshow1(document.getElementById('scr_2'),'scrg');
      sbcshow1(document.getElementById('mvcp_2'),'hmvc');
      sbcshow1(document.getElementById('sft_2'),'stafft');
      sbcshow1(document.getElementById('cl_2'),'cldetails');
      sbcshow1(document.getElementById('caac_2'),'caacdetails');
      sbcshow1(document.getElementById('lr_2'),'lrdetails');*/
       
     function landusage(landvalue) {
        var ele=Array();var sh=hd='none';
        ele[0] = document.getElementsByClassName('rentdetails');
        ele[1] = document.getElementsByClassName('perioddetails');
        if(landvalue==1){
            sh='';hd='none';
        }else if(landvalue==2) {
            
            
            
            
            sh='none';hd='';
        } 
        
        for(var i=0;i<ele.length;i++){
            for(var j=0;j<ele[i].length;j++){
               if(i==0){
                    ele[i][j].style.display=sh;
               } 
               else{
                    ele[i][j].style.display=hd;
               }
            }
        }
      }
    </script>
    <button style="visibility:hidden;">DDDD</button>
</body>
</html>