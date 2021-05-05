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
    
    <style>
        td,th{vertical-align: middle !important;}
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
                            <div class="container" style="width:95% !important;">
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
                                            <div class="row">
                                                <table class="table table-striped table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <th class="bg-primary" colspan="8">SCHOOL PROFILE PART I</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Udise Code</th>
                                                            <td id="udise_code"><?php echo($profile[0]->udise_code); ?></td>
                                                            <th>School Name</th>
                                                            <td id="school_name"><?php echo($profile[0]->school_name); ?></td>
                                                            <th>Latitude</th>
                                                            <td id="latitude"><?php echo($profile[0]->latitude); ?></td>
                                                           
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>Longitude</th>
                                                            <td id="logitude"><?php echo($profile[0]->longitude); ?></td>
                                                            <th>District</th>
                                                            <td id="district_id"><?php echo($profile[0]->district_name); ?></td>
                                                            <th>Block</th>
                                                            <td id="block_id"><?php echo($profile[0]->block_name); ?></td>
                                                           
                                                        </tr>
                                                        <tr>   
                                                            <th>Urban OR Rural</th>
                                                            <td id="urbanrural"><?php echo($profile[0]->block_type); ?></td>
                                                            <th>Local Body</th>
                                                            <td id="localbody_id"><?php echo($profile[0]->zone_type); ?></td>
                                                            <th>Village/Town/<br />Municipality</th>
                                                            <td id="village_ward"><?php echo($profile[0]->area_name); ?></td>
                                                        
                                                        </tr>
                                                        
                                                        <tr>
                                                            
                                                            <th>Village/Ward</th>
                                                            <td id="vill_habitation_id"><?php echo($profile[0]->name); ?></td>
                                                            <th>Assembly Constituency</th>
                                                            <td id="assembly_id"><?php echo($profile[0]->assembly_name); ?></td>
                                                            <th>Parliament Constituency</th>
                                                            <td id="parliment_id"><?php echo($profile[0]->parli_name); ?></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>Educational District</th>
                                                            <td id="edu_district_id"><?php echo($profile[0]->edn_dist_name); ?></td>
                                                            <th>Address Line 1</th>
                                                            <td id="addressline_1"><?php
                                                                $add=explode('\n',$profile[0]->address); 
                                                            echo($add[0]); ?></td>
                                                            <th>Address Line 2</th>
                                                            <td id="addressline_2"><?php echo($add[1]); ?></td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <th>Pincode</th>
                                                            <td id="pincode"><?php echo($profile[0]->pincode); ?></td>
                                                            <th>Office STD Code</th>
                                                            <td id="stdcode_id"><?php echo($profile[0]->std_code); ?></td>
                                                            <th>Office Landline</th>
                                                            <td id="landline"><?php echo($profile[0]->landline); ?></td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <th>Office Mobile</th>
                                                            <td id=""><?php echo($profile[0]->mobile); ?></td>
                                                            <th>Headmaster/<br/>Correspondent Mobile</th>
                                                            <td id=""><?php echo($profile[0]->mobile2); ?></td>
                                                            <th>Headmaster/<br/>Correspondent<br/> STD Code</th>
                                                            <td id=""><?php echo($profile[0]->std_code); ?></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            
                                                            <th>Headmaster/<br/>Correspondent<br/> Landline</th>
                                                            <td id=""><?php echo($profile[0]->landline2); ?></td>
                                                            <th>E-Mail</th>
                                                            <td id=""><?php echo($profile[0]->sch_email); ?></td>
                                                            <th>Website</th>
                                                            <td id=""><?php echo($profile[0]->website); ?></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>Year of Establishment</th>
                                                            <td id=""><?php echo($profile[0]->yr_estd_schl); ?></td>
                                                            <th>First Recognition</th>
                                                            <td id=""><?php echo($profile[0]->offcat_id); ?></td>
                                                            <th>Last Renewal School</th>
                                                            <td id=""><?php echo($profile[0]->office_email1); ?></td>
                                                            
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>Certificate</th>
                                                            <td><?php echo($profile[0]->office_email2); ?></td> 
                                                            <th>ELE-Reg.</th>
                                                            <td><?php echo($profile[0]->yr_rec_schl_elem); ?></td>
                                                            <th>SEC -Reg.</th>
                                                            <td><?php echo($profile[0]->yr_rec_schl_sec); ?></td>
                                                                                                               
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>HSC-Reg.</th>
                                                            <td><?php echo($profile[0]->yr_rec_schl_hsc); ?></td> 
                                                            <th>Children With Special Needs</th>
                                                            <td><?php if($profile[0]->spl_school==1)echo("YES");else echo("NO"); ?></td>
                                                            <th>Shift School</th>
                                                            <td><?php if($profile[0]->shftd_schl==1)echo("YES");else echo("NO"); ?></td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <th>Residential School</th>
                                                            <td><?php if($profile[0]->resid_schl==1)echo("YES");else echo("NO"); ?></td>
                                                            <th>Type of Residential</th>
                                                            <td><?php echo($profile[0]->RESITYPE_DESC); ?></td>
                                                            <th>School Situated</th>
                                                            <td><?php echo($profile[0]->district1); ?></td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <th>School Management Category</th>
                                                            <td><?php echo($profile[0]->manage_name); ?></td>
                                                            <th>Management</th>
                                                            <td><?php echo($profile[0]->management); ?></td>
                                                            <th>Directorate</th>
                                                            <td><?php echo($profile[0]->department); ?></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th class="bg-info" colspan="8"><a href="<?php echo base_url().'Basic/emis_school_details_entry/1/Edit';?>" class="btn btn-info" role="button">EDIT PART I</a></th>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th class="bg-primary" colspan="8">SCHOOL PROFILE PART II</th>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>School Category</th>
                                                            <td><?php echo($profile[0]->category_name); ?></td>
                                                            <th>Lower Class</th>
                                                            <td><?php echo($profile[0]->low_class); ?></td>
                                                            <th>Higher Class</th>
                                                            <td><?php echo($profile[0]->high_class); ?></td>
                                                            
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>School Type</th>
                                                            <td><?php echo($profile[0]->schooltype); ?></td>
                                                            <th>Minority Management</th>
                                                            <td><?php if($profile[0]->minority==1)echo("YES");else echo("NO"); ?></td>
                                                            <th>Minority Group</th>
                                                            <td><?php echo($profile[0]->rel_minority); ?></td>
                                                            
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>Validity Year</th>
                                                            <td><?php echo($profile[0]->min_ord_no); ?></td>
                                                            <th>Medium of Instruction</th>
                                                            <td>
                                                                <?php 
                                                                    if($profile[0]->tamil_med!=null || $profile[0]->tamil_med!='') echo("TAMIL\n"); 
                                                                    if($profile[0]->eng_med!=null || $profile[0]->eng_med!='') echo("ENGLISH\n");
                                                                    if($profile[0]->tel_med!=null || $profile[0]->tel_med!='') echo("TELUGU\n");
                                                                    if($profile[0]->mal_med!=null || $profile[0]->mal_med!='') echo("MALAYALAM\n");
                                                                    if($profile[0]->kan_med!=null || $profile[0]->kan_med!='') echo("KANADA\n");
                                                                    if($profile[0]->urdu_med!=null || $profile[0]->urdu_med!='') echo("URUDU\n");
                                                                    if($profile[0]->hin_med!=null || $profile[0]->hin_med!='') echo("HINDI\n");
                                                                    if($profile[0]->guj_med!=null || $profile[0]->guj_med!='') echo("GUJARATHI\n");
                                                                    if($profile[0]->arab_med!=null || $profile[0]->arab_med!='') echo("MARATHI\n");
                                                                    if($profile[0]->other_med!=null || $profile[0]->other_med!='') echo($profile[0]->other_med);
                                                                ?>
                                                            </td>
                                                            
                                                            <th>Language's Taught</th>
                                                            <td><?php echo("languagetaught_0"); ?></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th> Pre-Vocational Course</th>
                                                            <td><?php if ($profile[0]->schl_ofr_prevoc_cours==1) echo('YES');else echo('NO'); ?></td>
                                                            <th>Choose Trades</th>
                                                            <td><?php echo("prevocationaltrades_0"); ?></td>
                                                            <th>Wheather Roads</th>
                                                            <td><?php if($profile[0]->schl_aprch_alwther ==1) echo('YES'); else echo('NO'); ?></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>WHEATHER<br/>ROADS NO</th>
                                                            <td><?php 
                                                                if($profile[0]->brdng_fac_avl_stg ==1) 
                                                                    echo('Kutcha Road'); 
                                                                elseif($profile->brdng_fac_avl_stg ==2)?>
                                                                    echo('Partial Pucca Road');
                                                                    else
                                                                    echo ('No Road');
                                                                </td>
                                                            <th>DISTANCE IN METERS</th>
                                                            <td><?php echo($profile[0]->resid_pri_stud); ?></td>
                                                            <th>ANGANWADI</th>
                                                            <td><?php echo($profile[0]->angwdi_cntr_schlcmps); ?></td>
                                                            <th>TOT NO.TEACHERS</th>
                                                            <td><?php echo($profile[0]->tot_tchrs_angwdi_wrks); ?></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            
                                                            <th>TOT NO.STUDENTS</th>
                                                            <td><?php echo($profile[0]->profileangwdi_cntr_tot_chldrs); ?></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                        <th class="bg-info" colspan="8"><a href="<?php echo base_url().'Basic/emis_school_details_entry/1/Edit';?>" class="btn btn-info" role="button">EDIT PART II</a></th>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th class="bg-primary" colspan="8">SCHOOL PROFILE PART III</th>
                                                        </tr>
                                                          <tr>
                                                            <th>Primary Instruct. Days</th>
                                                            <td><?php echo("instructdays_0"); ?></td>
                                                            <th>Primary Working HRS Children</th>
                                                            <td><?php echo("childrenhours_0"); ?></td>
                                                            <th>Primary Working HRS Teacher</th>
                                                            <td><?php echo("teacherhours_0"); ?></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>Primary <br/>CCA Implemented</th>
                                                            <td><?php echo("ccesh_0"); ?></td>
                                                            <th>Upper Primary Instruct. Days</th>
                                                            <td><?php echo("instructdays_0"); ?></td>
                                                            <th>Upper Primary  Working HRS Children</th>
                                                            <td><?php echo("childrenhours_0"); ?></td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <th>Upper Primary Working HRS Teacher</th>
                                                            <td><?php echo("teacherhours_0"); ?></td>
                                                            <th>Upper Primary<br/>CCA Implemented</th>
                                                            <td><?php echo("ccesh_0"); ?></td>
                                                            <th>Sec. INSTRUCT. DAYS</th>
                                                            <td><?php echo("instructdays_0"); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Sec. Instruct. Days</th>
                                                            <td><?php echo("instructdays_0"); ?></td>
                                                            <th>Sec. Working HRS Children</th>
                                                            <td><?php echo("childrenhours_0"); ?></td>
                                                            <th>Sec. Working HRS Teacher</th>
                                                            <td><?php echo("teacherhours_0"); ?></td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <th>Sec. CCA Implemented</th>
                                                            <td><?php echo("ccesh_0"); ?></td>
                                                            <th>High Sec. Instruct. Days</th>
                                                            <td><?php echo("instructdays_0"); ?></td>
                                                            <th>High Sec. Working HRS Children</th>
                                                            <td><?php echo("childrenhours_0"); ?></td>
                                                            
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>High Sec. Working HRS Teacher</th>
                                                            <td><?php echo("teacherhours_0"); ?></td>
                                                            <th>High Sec.<br/>CCA Implemented</th>
                                                            <td><?php echo("ccesh_0"); ?></td>
                                                            <th>Cumulative Rec. Maintained</th>
                                                            <td><?php echo("crm_0"); ?></td>
                                                            <th>Cumulative Rec. Shared</th>
                                                            <td><?php echo("crs_0"); ?></td>
                                                            
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>Academic Session Start</th>
                                                            <td><?php echo("acd_sess_mnth"); ?></td>
                                                            <th>Special Training</th>
                                                            <td><?php echo("pri_schl"); ?></td>
                                                            <th>Spe. Tta. Current Academic Yr B</th>
                                                            <td><?php echo($profile[0]->no_chldrs_spectrng_utsep30_b); ?></td>
                                                        </tr>
                                                        <tr>
                                                            
                                                            <th>Spe. Tra. Current Academic Yr G</th>
                                                            <td><?php echo($profile[0]->no_chldrs_spectrng_utsep30_g); ?></td>
                                                            <th>Spe. Tra Conducted By </th>
                                                            <td><?php echo($profile[0]->who_condct_spec_trng); ?></td>
                                                             <th>Spe. Tra Conducted in </th>
                                                            <td><?php echo($profile[0]->spec_trng_cndt); ?></td>
                                                        </tr>
                                                        <tr>
                                                           
                                                            <th>Type of Training</th>
                                                            <td><?php echo($profile[0]->typ_trng_condct); ?></td>
                                                            <th>Provide Counselling To The Students</th>
                                                            <td><?php echo($profile[0]->uppri_schl); ?></td>
                                                            <th>Extra Curricular Activities </th>
                                                            <td><?php echo("club_0"); ?></td>
                                                        </tr>
                                                       
                                                        <tr>
                                                            <th class="bg-info" colspan="8"><a href="" class="btn btn-info" role="button">EDIT PART III</a></th>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-primary" colspan="8">SCHOOL PROFILE PART IV</th>
                                                        </tr>
                                                           <tr>
                                                            <th>Primary Received <br /> Text Book</th>
                                                            <td><?php echo($profile[0]->cmplt_txtbok_recvd_pri); ?></td>
                                                            <th>Primary TLE Grade</th>
                                                            <td><?php echo($profile[0]->hostel_boys); ?></td>
                                                            <th>Primary Equipment Each Grade</th>
                                                            <td><?php echo($profile[0]->ply_matrl_pri); ?></td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <th> Upper Primary Received <br /> Text Book</th>
                                                            <td><?php echo("cmplt_txtbok_recvd_uppri"); ?></td>
                                                            <th> Upper Primary TLE Grade</th>
                                                            <td><?php echo("tle_avl_grd_uppri"); ?></td>
                                                            <th>Upper Primary Equipment Each Grade</th>
                                                            <td><?php echo("ply_matrl_uppri"); ?></td>
                                                           
                                                        </tr>
                                                        <tr>
                                                            <th> Sec. Received<br /> Text Book</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th> Sec. TLE Grade</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>Sec. Equipment <br />Each Grade</th>
                                                            <td><?php echo(""); ?></td>
                                                           
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>Academic Inspection<br /> Officer</th>
                                                            <td><?php echo("officer000_0"); ?></td>
                                                            <th>Academic Inspection<br /> Purpose</th>
                                                            <td><?php echo("officer00_0"); ?></td>
                                                            <th>Academic Inspection<br /> Date</th>
                                                            <td><?php echo("visitdate_0"); ?></td>
                                                            
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>SMC Constituted</th>
                                                            <td><?php echo("smc_constud"); ?></td>
                                                            <th>Tot. No.of Members<br /> of SMC Male</th>
                                                            <td><?php echo("smc_tot_membr_mle"); ?></td>
                                                            <th>Tot. No.of Members<br /> of SMC Female</th>
                                                            <td><?php echo("smc_tot_membr_fmle"); ?></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            
                                                            <th>Parents/<br/>Guardians Male</th>
                                                            <td><?php echo("smc_membr_parnts_mle"); ?></td>
                                                            <th>Parents/<br/>Guardians Female </th>
                                                            <td><?php echo("smc_membr_parnts_fmle"); ?></td> 
                                                            <th>Rep. From Urban/<br /> Local Body Male</th>
                                                            <td><?php echo("smc_reprsnt_loc_auth_mle"); ?></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            
                                                            <th>Rep. From Urban/<br /> Local Body Female</th>
                                                            <td><?php echo("smc_reprsnt_loc_auth_fmle"); ?></td>
                                                            <td>Members From <br /> Weaker Section Male </td>
                                                            <td><?php echo("smc_disadv_grp_mle"); ?></td>
                                                            <td>Members From <br /> Weaker Section Female </td>
                                                            <td><?php echo("smc_disadv_grp_fmle"); ?></td>
                                                       </tr>
                                                       
                                                        <tr>
                                                            <th>SMS Meeting in<br /> Previous Academic Yr</th>
                                                            <td><?php echo("mtngs_smc_prev_acdyr"); ?></td>
                                                            <th>When Was SMC<br /> Constituted</th>
                                                            <td><?php echo("management_id"); ?></td>
                                                            <th>SMC Developement<br /> Plan</th>
                                                            <td><?php echo("smc_prep_sdp"); ?></td>
                                                            
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>SMC Maintained<br /> Bank A/C</th>
                                                            <td><?php echo("sep_bnk_smc_maintnd"); ?></td>
                                                            <th>Bank District</th>
                                                            <td><?php echo("bank_dist_id"); ?></td>
                                                            <th>Bank Name</th>
                                                            <td><?php echo("smc_bnk_nme"); ?></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>Bank Branch</th>
                                                            <td><?php echo("smc_brnch"); ?></td>
                                                            <th>IFSC Code</th>
                                                            <td><?php echo("smc_ifsc"); ?></td>
                                                            <th>A/C Holder Name</th>
                                                            <td><?php echo("smc_acc_nme"); ?></td>
                                                            <th>A/C Number</th>
                                                            <td><?php echo("smc_acc_no"); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>SMC Chairperson Name</th>
                                                            <td><?php echo("regis_by_office"); ?></td>
                                                            <th>Chairperson Mobile No.</th>
                                                            <td><?php echo("habitation_id"); ?></td>
                                                            <th>SMDC Constituted</th>
                                                            <td><?php echo("school_code"); ?>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>Tot.Members Male</th>
                                                            <td><?php echo("smdc_tot_membr_m"); ?></td>
                                                            <th>Tot.Members Female</th>
                                                            <td><?php echo("smdc_tot_membr_f"); ?></td>
                                                            <th>Rep From Parents/<br />Guardians/<br />PTA Male</th>
                                                            <td><?php echo("smdc_noof_repr_pta_m");?></td>
                                                       </tr>
                                                        
                                                        <tr>
                                                            <th>Rep From<br /> Parents/<br />Guardians/<br />PTA Female</th>
                                                            <td><?php echo("smdc_noof_repr_pta_f"); ?></td>
                                                            <th>Rep From Local/<br /> Urban Male</th>
                                                            <td><?php echo("smdc_noof_repr_lcbdy_m"); ?></td>
                                                            <th>Rep From Local/<br /> Urban Female</th>
                                                            <td><?php echo("smdc_noof_repr_lcbdy_f"); ?></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>Edu. Backward<br /> Minority<br /> Community Male</th>
                                                            <td><?php echo("smdc_noof_mebrs_edubckmin_m"); ?></td>
                                                            <th>Edu. Backward<br />  Minority<br /> Community Female</th>
                                                            <td><?php echo("smdc_noof_mebrs_edubckmin_f"); ?></td>
                                                            <th>MEMBERS FROM  <br /> WOMEN'S GROUP </th>
                                                            <td><?php echo("smdc_noof_mebrs_wms_f"); ?></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>Members From <br /> SC / ST  Community Male</th>
                                                            <td><?php echo("smdc_noof_mebrs_scst_m"); ?></td>
                                                            <th>Members From <br /> SC / ST Community Femnale</th>
                                                            <td><?php echo("smdc_noof_mebrs_scst_f"); ?></td>
                                                            <th>Nominees From DEO<br />Male</th>
                                                            <td><?php echo("smdc_noof_nmines_deo_m"); ?></td>
                                                       </tr>
                                                       
                                                        <tr>
                                                            <th>Nominees From DEO<br />Female</th>
                                                            <td><?php echo("smdc_noof_nmines_deo_f"); ?></td>
                                                            <th>Members From<br /> AAD Male</th>
                                                            <td><?php echo("smdc_noof_nmines_aad_m"); ?></td>
                                                            <th>Members From<br /> AAD Female</th>
                                                            <td><?php echo("smdc_noof_nmines_aad_f"); ?></td>
                                                        </tr>
                                                        
                                                         <tr>
                                                            <th>Subject Experts <br /> RMSA Male</th>
                                                            <td><?php echo("smdc_noof_subjt_exp_m"); ?></td>
                                                            <th>Subject Experts <br /> RMSA Female</th>
                                                            <td><?php echo("smdc_noof_subjt_exp_f"); ?></td>
                                                            <th>Teachers Each One Subject<br /> From The School <br />Male</th>
                                                            <td><?php echo("smdc_noof_techrs_m"); ?></td>
                                                         </tr>
                                                        
                                                        <tr>
                                                            <th>Teachers Each One Subject<br />From The School <br />Female</th>
                                                            <td><?php echo("smdc_noof_techrs_f"); ?></td>
                                                            <th>Vice-Principal / Asst. Headmaster<br /> as a <br /> Member Male</th>
                                                            <td><?php echo("block1"); ?></td>
                                                            <th>Vice-Principal / Asst. Headmaster<br /> as a <br /> Member Female</th>
                                                            <td><?php echo("district1"); ?></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                         
                                                            <th>Principal / Headmaster <br /> as Chairperson Male </th>
                                                            <td><?php echo("smdc_prnclorhm_cp_m"); ?></td>
                                                            <th>Principal / Headmaster <br />as Chairperson Female</th>
                                                            <td><?php echo("smdc_prnclorhm_cp_f"); ?></td>
                                                            <th>Principal / Headmaster <br />is Not The Chairperson Male </th>
                                                            <td><?php echo("smdc_chrprsn_m"); ?></td>
                                                       </tr>
                                                        
                                                        <tr>
                                                            <th>Principal / Headmaster  <br /> is Not The Chairperson Female </th>
                                                            <td><?php echo("smdc_chrprsn_f"); ?></td>
                                                            <th>SMDC Constituted <br /> Year </th>
                                                            <td><?php echo("smdc_metng_lstacd_yr"); ?></td>
                                                            <th>SMDC Meetings <br />Last Academic Year </th>
                                                            <td><?php echo("smdc_prpd_schl_imprv"); ?></td>
                                                        </tr>
                                                        
                                                         
                                                        <tr>
                                                            <th>SMDC Improvement<br /> Plan </th>
                                                            <td><?php echo("sep_bnk_smdc_maintnd"); ?></td>
                                                            <th>Bank Dist</th>
                                                            <td><?php echo("draw_off_code"); ?></td>
                                                            <th>Bank Name</th>
                                                            <td><?php echo("smdc_bnk_nme"); ?></td>
                                                            
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>Branch</th>
                                                            <td><?php echo("smdc_brnch"); ?></td>
                                                            <th>IFSC Code</th>
                                                            <td><?php echo("smdc_ifsc"); ?></td>
                                                            <th>A/C Name</th>
                                                            <td><?php echo("smdc_acc_nme"); ?></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>A/C No.</th>
                                                            <td><?php echo("smdc_acc_no"); ?></td>
                                                            <th>SMDC Contribution</th>
                                                            <td><?php echo("authenticate_3"); ?></td>
                                                            <th>SMDC Chairperson<br /> Name</th>
                                                            <td><?php echo("mgt_name"); ?></td>
                                                            
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>Chairperson  <br /> Mobile No.</th>
                                                            <td><?php echo("mgt_type"); ?></td>
                                                            <th>SBC Constituted</th>
                                                            <td><?php echo("sbc_constitd"); ?></td>
                                                            <th>Year</th>
                                                            <td><?php echo("mgt_opn_year"); ?></td>
                                                       </tr>
                                                        
                                                        <tr>
                                                            <th>Constituted AC</th>
                                                            <td><?php echo("authenticate_2"); ?></td>
                                                            <th>Year</th>
                                                            <td><?php echo("chk_manage"); ?></td> 
                                                            <tr>School has Constituted its PTA</tr>
                                                            <td><?php echo("chk_dept");?></td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <th>Year of <br /> Establishment</th>
                                                            <td><?php echo("pta_esta"); ?></td>
                                                            <th>PTA Meetings <br /> Last Academic<br />Year</th>
                                                            <td><?php echo("pta_metng_hld_yr"); ?></td>
                                                            <th>PTA Registration No.</th>
                                                            <td><?php echo("pta_no"); ?></td>
                                                       </tr>
                                                         
                                                        <tr>
                                                            <th>Last Year  <br /> Subscription <br />Paid Amount</th>
                                                            <td><?php echo("pta_sub_yr"); ?></td>
                                                            <th>PTA Chairperson <br /> Name</th>
                                                            <td><?php echo("mgt_address"); ?></td>
                                                            <th>Chairprson<br /> Mobile No.</th>
                                                            <td><?php echo("build_status"); ?></td>
                                                        </tr>
                                                        
                                                        
                                                        </tr>
                                                     
                                                        <tr>
                                                            <th class="bg-info" colspan="8"><a href="" class="btn btn-info" role="button">EDIT PART IV</a></th>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-primary" colspan="8">SCHOOL PROFILE PART V</th>
                                                        </tr>
                                                        
                                                         <tr>
                                                            <th>Total Land (Sq.ft)</th>
                                                            <td><?php echo("area_cent"); ?></td>
                                                            <th>Total Land (in Acre)</th>
                                                            <td><?php echo("area_cent_1"); ?></td>
                                                            <th>Playground Facility</th>
                                                            <td><?php echo("area_ground"); ?></td>
                                                                                                                 
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>Area of the Playground (in Sq.ft)</th>
                                                            <td><?php echo("area_cent"); ?></td>
                                                            <th>Area of the Playground (in Acre)</th>
                                                            <td><?php echo("area_cent_1"); ?></td>
                                                            <th>Land<br /> Expansion <br />of School<br />Facilities </th>
                                                            <td><?php echo("cwall_existbu"); ?></td>
                                                        </tr>
                                                        <tr>
                                                            
                                                            <th>Land Ownerhip</th>
                                                            <td><?php echo($profile[0]->own_type); ?></td>
                                                            <th>Type of <br /> Boundary Wall</th>
                                                            <td><?php echo("cwall"); ?></td>
                                                            <th>Boundary<br />(in meters)</th>
                                                            <td><?php echo("cwall_fence_len"); ?></td>    
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th> Length of <br /> Boundary Wall<br /> (in meters)</th>
                                                            <td><?php echo("cwall_concre_len"); ?></td>
                                                            <th> Tot. of Building/ <br /> Blocks</th>
                                                            <td><?php echo("ec_cer_no"); ?></td>
                                                            <th>Classrooms Under <br />Construction</th>
                                                            <td><?php echo("new_build"); ?></td>
                                                                                     
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>Disk / Table <br /> for Students</th>
                                                            <td><?php echo("open_mt"); ?></td>
                                                            <th>How Many <br /> Rooms</th>
                                                            <td><?php echo("hmr_0"); ?></td>
                                                            <th> RAMP for Differently Abled <br />children To <br />Access Classrooms</th>
                                                            <td><?php echo("cwall_fence"); ?></td>
                                                      </tr>
                                                      
                                                        <tr>
                                                            <th>Hand_Rails FOR <br />RAMP Available<br /> </th>
                                                            <td><?php echo("cwall_concre"); ?></td>
                                                            <th>Staff Quarters</th>
                                                            <td><?php echo("cwall_notcon_len"); ?></td>
                                                            <th>Library Facility</th>
                                                            <td><?php echo("lbrc_0"); ?></td>
                                                            
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>Tot. No.<br /> of Books</th>
                                                            <td><?php echo("lbr1_0"); ?></td>
                                                            <th>No. of Toilets<br />for  Staff Male</th>
                                                            <td><?php echo("cwall_existbu_len"); ?></td>
                                                            <th>No. of Toilets <br />for Staff Female</th>
                                                            <td><?php echo("cwall_nbarr"); ?></td>
                                                            
                                                        </tr>
                                                        
                                                        <tr>
                                                            
                                                            <th>No.of Urinals<br /> for Staff<br />Male</th>
                                                            <td><?php echo("fans"); ?></td>
                                                            <th>No. of Toilets<br /> in Use Male</th>
                                                            <td><?php echo(" hostel_floor"); ?></td>
                                                            <th>No. of Toilets<br /> Not in Use Male</th>
                                                            <td><?php echo("roof_type"); ?></td>
                                                                                                         
                                                        </tr>
                                                        <tr>
                                                            <td>Reason for Non-functional <br/>Toilets Male</td>
                                                            <tr><?php echo("bu_no"); ?></tr>
                                                        </tr>
                                                        
                                                        <tr>
                                                            
                                                            
                                                            <th>No.of CWSN Toilets<br /> in Use <br /> Male</th>
                                                            <td><?php echo("gu_no"); ?></td>
                                                            <th>No.of CWSN Toilets<br /> Not in Use <br /> Female</th>
                                                            <td><?php echo("gu_usable"); ?></td>
                                                            <td>Reason for Non-functional <br/> CWSN Toilets Male</td>
                                                            <tr><?php echo("gu_minrep"); ?></tr>
                                                            <th>No.of Urinals<br /> for Staff <br />Female</th>
                                                            <td><?php echo("room_cat"); ?></td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <th>NO.OF TOILETS<br />FOR STUDENT<br />FEMALE</th>
                                                            <td><?php echo("roof_type"); ?></td>
                                                            <td>Reason for Non-functional</td>
                                                            <tr><?php echo("bu_no"); ?></tr>
                                                            <th>NO.OF URINALS<br />FOR<br />STUDENT<br />MALE</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>NO.OF URINALS<br />FOR<br />STUDENT<br />FEMALE</th>
                                                            <td><?php echo(""); ?></td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <th>FUNCTIONAL TOILETS <br />FOR STUDENTS<br /> FEMALE</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>NO. OF CWSN <br/> FUNCTIONAL <br/>TOILETS <br /> MALE</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>NO.OF CWSN <br/> FUNCTIONAL <br/>TOILETS <br />FEMALE</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>WATER FACILITY IN THE<br/>TOILET FOR<br/>FLUSHING AND<br/>CLEANING MALE</th>
                                                            <td><?php echo(""); ?></td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <th>WATER FACILITY IN THE<br/>TOILET FOR<br/>FLUSHING AND<br/>CLEANING FEMALE</th>
                                                            <td><?php echo(" "); ?></td>
                                                            <th>URINALS HAVE <br />WATER FACILITY MALE</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>URINALS HAVE <br />WATER FACILITY FEMALE</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>SANITARY WORKER <br/> CLEAN THE TOILETS</th>
                                                            <td><?php echo(""); ?>
                                                        </tr>
                                                        
                                                       <tr>
                                                            <th>ADDTIONAL <br />TOILETS  <br />REQUIRED<br/></th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>LAND AVILABLE sq.ft</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>REASON FOR <br />NOT FUNCTIONAL <br />TOILET</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>NO.OF TOILET <br /> IN DILAPIDATED <br/>CONDITION </th>
                                                            <td><?php echo(""); ?>
                                                        </tr>
                                                        
                                                         <tr>
                                                            <th>NAPKIN VENDING <br />MACHINE <br />AVAILABLE <br /> FOR TOILETS</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>NO.OF HANDWASH <br /> SATION MALE</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>NO.OF HANDWASH <br /> SATION FEMALE</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>DRINKING WATER <br /> AVILABLE IN  <br />SCHOOL </th>
                                                            <td><?php echo(""); ?>
                                                        </tr>
                                                        <tr>
                                                            <th>SOURCE OF <br />DRINKING WATER<br />SCHOOL</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>OVERHEAD TANK <br /> PROVIDED</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>WATER PURIFIER<br /> IS AVAILABLE </th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>SCHOOL HAVE <br />RAIN WATER   <br />HARVESTING </th>
                                                            <td><?php echo(""); ?>
                                                        </tr>
                                                        
                                                        
                                                       
                                                        
                                                        
                                                        <tr>
                                                            <th class="bg-info" colspan="8"><a href="" class="btn btn-info" role="button">EDIT PART V</a></th>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-primary" colspan="8">SCHOOL PROFILE PART VI</th>
                                                        </tr>
                                                        
                                                         <tr>
                                                            <th>DEVICES NAME<br />TEACHING & LEARNING</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>DEVICE SUPPLIED BY</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>DEVICE PURPOSE</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>DEVICE AVAILABLE</th>
                                                            <td><?php echo(""); ?>
                                                        </tr>
                                                        
                                                         <tr>
                                                            <th>DEVICE FUNCTIONAL</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>SCHOOL HAVE <br />CAL LAB</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>SCHOOL HAVE<br />INTERNET FACILITY</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>INTERNET FACILITY<br />PROVIDED BY</th>
                                                            <td><?php echo($profile[0]->yr_rec_schl_hsc); ?>
                                                        </tr>
                                                        <tr>
                                                            <th>INTERNET<br />SERVICE PROVIDER</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>DATA SPEED</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>DATA RANGE</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>SCHOOL HAVE <br />ELECTRICITY</th>
                                                            <td><?php echo(""); ?>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th> MEDICAL CHECKUP <br />FOR STUDENTS LAST <br />ACADEMIC YEAR</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>MEDICAL CHECK UP<br /> CONDUCTED DATE</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>TOT.NO OF MEDICAL<br />CHECK UP CONDUCTED<br />LAST YEAR</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>DE-WORMING TABLETS<br /> GIVEN CHILDREN</th>
                                                            <td><?php echo(""); ?>
                                                        </tr>
                                                        
                                                        
                                                        <tr>
                                                            <th>IRON & FOLIC ACID<br />TABLETS GIVEN TO CHILDREN</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>SCHOOL HAVE<br />LAB FACILITY</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>SEPARTAE LAB<br />ROOM AVAILABLE<br />LAST YEAR</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>PRESENT<br />CONDITION OF LAB</th>
                                                            <td><?php echo(""); ?>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>INTEGRATED SCIENCE LAB<br />FOR SEC.SECTION</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>SCHOOL EQUIPMENTS<br />NAME</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>EQUIPMENT QUANTITY</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th> SCHOOL INVENTORY<br />NAME</th>
                                                            <td><?php echo(""); ?>
                                                        </tr>
                                                        <tr>
                                                            <th>SCHOOL INVENTORY<br />SUPPLIED BY</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>SCHOOL INVENTORY<br />AVAILABLE</th>
                                                            <td><?php echo(""); ?></td>
                                                            <th>SCHOOL INVENTORY<br />FUNCTIONAL</th>
                                                            <td><?php echo(""); ?></td>
                                                        </tr>
                                                        
                                                        
                                                        
                                                        
                                                        <tr>
                                                            <th class="bg-info" colspan="8"><a href="" class="btn btn-info" role="button">EDIT PART VI</a></th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <?php $user_type_id = $this->session->userdata('emis_user_type_id'); ?>
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
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <!-- END PAGE LEVEL SCRIPTS --> 
</body>
</html>