<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>

        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />



        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

<?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
<?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
<?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 5){ ?>
<?php $this->load->view('state/header.php'); }else{ $this->load->view('header.php'); } ?>
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
                                                <a href="<?php echo base_url().'Admin/emis_school_admin3';?>"><div class="col-md-2 bg-grey mt-step-col   active">
                                                    <div class="mt-step-number bg-white font-grey">3</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Admin</div>
                                                    <div class="mt-step-content font-grey-cascade">Information</div>
                                                </div></a>

                                                <a href="<?php echo base_url().'Admin/emis_school_admin5';?>"><div class="col-md-2 bg-grey mt-step-col">
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
                                                    <button id="enable" class="btn green">Enable / Disable Editor Mode</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Administrative Information step 3</span>
                                                </div>
                                                <h4 class="pull-right">Extra Curricular Activities</h4>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table id="user" class="table table-bordered table-striped">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width: 50%;"> Scout and Guides: </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="scoutandguide" data-type="select2" data-pk="1" data-value="<?php echo $current_extra_scout; ?>" data-url="<?php echo base_url().'Admin/updatescoutstatus';?>" data-original-title="Select"> </a>
                                                                    </td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 50%;"> Junior Red Cross (JRC): </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="juniorredcross" data-type="select2" data-pk="1" data-value="<?php echo $current_extra_jrc; ?>" data-url="<?php echo base_url().'Admin/updatejrcstatus';?>" data-original-title="Select"> </a>
                                                                    </td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 50%;"> National Service Scheme (NSS): </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="nationalservice" data-type="select2" data-pk="1" data-value="<?php echo $current_extra_nss; ?>" data-url="<?php echo base_url().'Admin/updatenssstatus';?>" data-original-title="Select"> </a>
                                                                    </td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 50%;"> National Cadet Corps (NCC): </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="nationalcadet" data-type="select2" data-pk="1" data-value="<?php echo $current_extra_ncc; ?>" data-url="<?php echo base_url().'Admin/updatenccstatus';?>" data-original-title="Select"> </a>
                                                                    </td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 50%;"> Red Ribbon Club: </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="redribbonclub" data-type="select2" data-pk="1" data-value="<?php echo $current_extra_rrc; ?>" data-url="<?php echo base_url().'Admin/updaterrcstatus';?>"  data-original-title="Select"> </a>
                                                                    </td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 50%;"> Eco Club: </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="ecoclub" data-type="select2" data-pk="1" data-value="<?php echo $current_extra_ec; ?>" data-url="<?php echo base_url().'Admin/updateecstatus';?>"  data-original-title="Select"> </a>
                                                                    </td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 50%;"> CUBs: </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="cubs" data-type="select2" data-pk="1" data-value="<?php echo $current_extra_cub; ?>" data-url="<?php echo base_url().'Admin/updatecubstatus';?>"  data-original-title="Select"> </a>
                                                                    </td>
                                                                    
                                                                </tr>
                     
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>





                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Administrative Information step 3 - Profile of the schools</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table id="user" class="table table-bordered table-striped">
                                                            <tbody>
                                                                <tr>
                                                                   <td colspan="2">
                                                                        <b>Number of instructional days (previous academic year)</b>
                                                                   </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 50%;"> Primary :</td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="noofinstrdyspri" data-type="text" data-pk="1" data-url="<?php echo base_url().'Udise_admin/updatenoofinstrdyspri';?>" data-original-title="Enter the days" data-value="<?php echo $instr_dys_pri; ?>"> </a>
                                                                    </td>
                                                                    
                                                                </tr>

                                                                <tr>
                                                                    <td style="width: 50%;"> Upper primary :</td>
                                                                        <td style="width:50%">
                                                                            <a href="javascript:;" id="noofinstrdysuppri" data-type="text" data-pk="1" data-value="<?php echo $instr_dys_uppri; ?>" data-url="<?php echo base_url().'Udise_admin/updatenoofinstrdysuppri';?>" data-original-title="Enter the days"> </a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="width: 50%;"> Secondary :</td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="noofinstrdyssec" data-type="text" data-pk="1" data-value="<?php echo $instr_dys_sec; ?>" data-url="<?php echo base_url().'Udise_admin/updatenoofinstrdyssec';?>" data-original-title="Enter the days"> </a>
                                                                    </td>
                                                                </tr>   

                                                                
                                                                <tr>
                                                                    <td style="width: 50%;"> Higher Secondary : </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="noofinstrdyshsc" data-type="text" data-pk="1" data-value="<?php echo $instr_dys_hsc; ?>" data-url="<?php echo base_url().'Udise_admin/updatenoofinstrdyshsc';?>" data-original-title="Enter the days"> </a>
                                                                    </td>
                                                                </tr>
                                                                
                                                            </tbody>
                                                        </table>



                                                        <table id="user" class="table table-bordered table-striped">
                                                            <tbody>
                                                                <tr>
                                                                   <td colspan="2">
                                                                        <b>Average school hours for children(per day) - Number of hours children stay in school</b>
                                                                   </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 50%;"> Primary :</td>
                                                                    <td style="width:50%">
                                                                            <a href="javascript:;" id="avgschlhrschldrspri" data-type="text" data-pk="1" data-value="<?php echo $hrs_chldrn_sty_schl_pri; ?>" data-url="<?php echo base_url().'Udise_admin/updateavgschlhrschldrspri';?>" data-original-title="Enter the hour"></a>.<a href="javascript:;" id="avgschlminschldrspri" data-type="text" data-pk="1" data-value="<?php echo $mins_chldrn_sty_schl_pri; ?>" data-url="<?php echo base_url().'Udise_admin/updateavgschlminschldrspri';?>" data-original-title="Enter the minute"></a> 
                                                                        
                                                                    </td>
                                                                    
                                                                </tr>

                                                                <tr>
                                                                    <td style="width: 50%;"> Upper primary :</td>
                                                                        <td style="width:50%">
                                                                        
                                                                            <a href="javascript:;" id="avgschlhrschluppri" data-type="text" data-pk="1" data-value="<?php echo $hrs_chldrn_sty_schl_uppri; ?>" data-url="<?php echo base_url().'Udise_admin/updateavgschlhrschluppri';?>" data-original-title="Enter the hour"> </a>.<a href="javascript:;" id="avgschlminsschluppri" data-type="text" data-pk="1" data-value="<?php echo $mins_chldrn_sty_schl_uppri; ?>" data-url="<?php echo base_url().'Udise_admin/updateavgschlminsschluppri';?>" data-original-title="Enter the minute"> </a> 
                                                                        
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="width: 50%;"> Secondary :</td>
                                                                    <td style="width:50%">
                                                                            <a href="javascript:;" id="avgschlhrschlsec" data-type="text" data-pk="1" data-value="<?php echo $hrs_chldrn_sty_schl_sec; ?>" data-url="<?php echo base_url().'Udise_admin/updateavgschlhrschlsec';?>" data-original-title="Enter the hour"> </a>.<a href="javascript:;" id="avgschlminsschldrssec" data-type="text" data-pk="1" data-value="<?php echo $mins_chldrn_sty_schl_sec; ?>" data-url="<?php echo base_url().'Udise_admin/updateavgschlminsschldrssec';?>" data-original-title="Enter the minute"> </a> 
                                                                        
                                                                    </td>
                                                                </tr>   

                                                                
                                                                <tr>
                                                                    <td style="width: 50%;"> Higher Secondary : </td>
                                                                    <td style="width:50%">
                                                                            <a href="javascript:;" id="avgschlhrschlhsc" data-type="text" data-pk="1" data-value="<?php echo $hrs_chldrn_sty_schl_hsc; ?>" data-url="<?php echo base_url().'Udise_admin/updateavgschlhrschlhsc';?>" data-original-title="Enter the hour"> </a>.<a href="javascript:;" id="avgschlminsschlhsc" data-type="text" data-pk="1" data-value="<?php echo $mins_chldrn_sty_schl_hsc; ?>" data-url="<?php echo base_url().'Udise_admin/updateavgschlminsschlhsc';?>" data-original-title="Enter the minute"> </a> 
                                                                        
                                                                    </td>
                                                                </tr>
                                                                
                                                            </tbody>
                                                        </table>


                                                         <table id="user" class="table table-bordered table-striped">
                                                            <tbody>
                                                                <tr>
                                                                   <td colspan="2">
                                                                        <b>Average working hours for Teachers(per day) - Number of hours teachers stay in school</b>
                                                                   </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 50%;"> Primary :</td>
                                                                    <td style="width:50%">
                                                                            <a href="javascript:;" id="avgwrknghrstchrspri" data-type="text" data-pk="1" data-value="<?php echo $hrs_tchrs_sty_schl_pri; ?>" data-url="<?php echo base_url().'Udise_admin/updateavgwrknghrstchrspri';?>" data-original-title="Enter the hour"></a>.<a href="javascript:;" id="avgwrkngminstchrspri" data-type="text" data-pk="1" data-value="<?php echo $mins_tchrs_sty_schl_pri; ?>" data-url="<?php echo base_url().'Udise_admin/updateavgwrkngminstchrspri';?>" data-original-title="Enter the minute"> </a> 
                                                                        
                                                                    </td>
                                                                    
                                                                </tr>

                                                                <tr>
                                                                    <td style="width: 50%;"> Upper primary :</td>
                                                                        <td style="width:50%">
                                                                            <a href="javascript:;" id="avgwrknghrstchrsuppri" data-type="text" data-pk="1" data-value="<?php echo $hrs_tchrs_sty_schl_uppri; ?>" data-url="<?php echo base_url().'Udise_admin/updateavgwrknghrstchrsuppri';?>" data-original-title="Enter the hour"> </a>.<a href="javascript:;" id="avgwrkngminstchrsuppri" data-type="text" data-pk="1" data-value="<?php echo $mins_tchrs_sty_schl_uppri; ?>" data-url="<?php echo base_url().'Udise_admin/updateavgwrkngminstchrsuppri';?>" data-original-title="Enter the minute"> </a> 
                                                                        
                                                                    </td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td style="width: 50%;"> Secondary :</td>
                                                                    <td style="width:50%">
                                                                            <a href="javascript:;" id="avgwrknghrstchrssec" data-type="text" data-pk="1" data-value="<?php echo $hrs_tchrs_sty_schl_sec; ?>" data-url="<?php echo base_url().'Udise_admin/updateavgwrknghrstchrssec';?>" data-original-title="Enter the hour"> </a>.<a href="javascript:;" id="avgwrkngminstchrssec" data-type="text" data-pk="1" data-value="<?php echo $mins_tchrs_sty_schl_sec; ?>" data-url="<?php echo base_url().'Udise_admin/updateavgwrkngminstchrssec';?>" data-original-title="Enter the minute"> </a> 
                                                                    </td>
                                                                </tr>   

                                                                
                                                                <tr>
                                                                    <td style="width: 50%;"> Higher Secondary : </td>
                                                                    <td style="width:50%">
                                                                            <a href="javascript:;" id="avgwrknghrstchrshsc" data-type="text" data-pk="1" data-value="<?php echo $hrs_tchrs_sty_schl_hsc; ?>" data-url="<?php echo base_url().'Udise_admin/updateavgwrknghrstchrshsc';?>" data-original-title="Enter the hour"> </a>.<a href="javascript:;" id="avgwrkngminstchrshsc" data-type="text" data-pk="1" data-value="<?php echo $mins_tchrs_sty_schl_hsc; ?>" data-url="<?php echo base_url().'Udise_admin/updateavgwrkngminstchrshsc';?>" data-original-title="Enter the minute"> </a> 
                                                                        
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <b>Only for private unaided schools</b>(provide information for current academic year)
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 50%;">
                                                                        Number of children enrolled at entry level under 25% quota as per RTE
                                                                    </td>
                                                                    <td style="width: 50%;">
                                                                        <a href="javascript:;" id="noofchldrnsenrld25prcnt" data-type="text" data-pk="1" data-value="<?php echo $chldrns_enrld_25prcnt_rte; ?>" data-url="<?php echo base_url().'Udise_admin/updatenoofchldrnsenrld25prcnt';?>" data-original-title="Enter the Count"> </a>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="width: 50%;">
                                                                        Number of students continuing who got admission under 25% quota in previous year
                                                                    </td>
                                                                    <td style="width: 50%;">
                                                                        <a href="javascript:;" id="noofstdntscontigtadmsnundr25prcntqta" data-type="text" data-pk="1" data-value="<?php echo $stud_admsn_25prcnt_prv_yr; ?>" data-url="<?php echo base_url().'Udise_admin/updatenoofstdntscontigtadmsnundr25prcntqta';?>" data-original-title="Enter the Count"> </a>
                                                                    </td>
                                                                </tr>
                                                                
                                                            </tbody>
                                                        </table>

                                                        <table id="user" class="table table-bordered table-striped">
                                                            <tr>
                                                                <td style="width: 50%;">
                                                                    Number of meetings held by SMC during the previous academic year
                                                                </td>
                                                                <td style="width: 50%">
                                                                    <a href="javascript:;" id="noofmtnghldbysmc" data-type="text" data-pk="1" data-value="<?php echo $mtngs_smc_prev_acdyr; ?>" data-url="<?php echo base_url().'Udise_admin/updatenoofmtnghldbysmc';?>" data-original-title="Enter the Count"> </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 50%;">
                                                                    Whether SMC has prepared the School Development Plan
                                                                </td>
                                                                <td style="width: 50%">
                                                                    <a href="javascript:;" id="smcprplndsdp" data-type="select2" data-pk="1" data-value="<?php echo $smc_prep_sdp; ?>" data-url="<?php echo base_url().'Udise_admin/updatesmcprplndsdp';?>" data-original-title="Select the option"> </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><b>Details of visits to the school during the previous academic year</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 50%">
                                                                    Number of visits for academic inspections
                                                                </td>
                                                                <td style="width: 50%">
                                                                    <a href="javascript:;" id="noofvistsacadinspect" data-type="text" data-pk="1" data-value="<?php echo $vists_acd_inspec; ?>" data-url="<?php echo base_url().'Udise_admin/updatenoofvistsacadinspect';?>" data-original-title="Enter the Count"> </a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td style="width: 50%">
                                                                    Number of visits by CRC Co-ordinator
                                                                </td>
                                                                <td style="width: 50%">
                                                                    <a href="javascript:;" id="noofvistscrccordntr" data-type="text" data-pk="1" data-value="<?php echo $vists_crc_cord; ?>" data-url="<?php echo base_url().'Udise_admin/updatenoofvistscrccordntr';?>" data-original-title="Enter the Count"> </a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td style="width: 50%">
                                                                    Number of visits by Block level officer (BRC/BEO)
                                                                </td>
                                                                <td style="width: 50%">
                                                                    <a href="javascript:;" id="noofvistsblcklvlcrs" data-type="text" data-pk="1" data-value="<?php echo $vists_blcklvl_brc; ?>" data-url="<?php echo base_url().'Udise_admin/updatenoofvistsblcklvlcrs';?>" data-original-title="Enter the Count"> </a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td style="width: 50%">
                                                                    Number of SMDC meetings held during the last academic year
                                                                </td>
                                                                <td style="width: 50%">
                                                                    <a href="javascript:;" id="noofsmdcmetnghldlstacadyr" data-type="text" data-pk="1" data-value="<?php echo $smdc_metng_lstacd_yr; ?>" data-url="<?php echo base_url().'Udise_admin/updatenoofsmdcmetnghldlstacadyr';?>" data-original-title="Enter the Number of SMDC meetings held"> </a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td style="width: 50%">
                                                                    Whether SMDC has prepared school improvement plan
                                                                </td>
                                                                <td style="width: 50%">
                                                                    <a href="javascript:;" id="smdcprpdschlimprvmntpln" data-type="select2" data-pk="1" data-value="<?php echo $smdc_prpd_schl_imprv; ?>" data-url="<?php echo base_url().'Udise_admin/updatesmdcprpdschlimprvmntpln';?>" data-original-title="Select the option"> </a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td style="width: 50%">
                                                                    Whether the school building committee (SBC) has been constituted
                                                                </td>
                                                                <td style="width: 50%">
                                                                    <a href="javascript:;" id="sbcconstitd" data-type="select2" data-pk="1" data-value="<?php echo $sbc_constitd; ?>" data-url="<?php echo base_url().'Udise_admin/updatesbcconstitd';?>" data-original-title="Select the option"> </a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td style="width: 50%">
                                                                    Whether the School has Constituted its Academic Committee
                                                                </td>
                                                                <td style="width: 50%">
                                                                    <a href="javascript:;" id="schlhasconstitdacadcomte" data-type="select2" data-pk="1" data-value="<?php echo $schl_constitd_acd; ?>" data-url="<?php echo base_url().'Udise_admin/updateschlhasconstitdacadcomte';?>" data-original-title="Select the option"> </a>
                                                                </td>
                                                            </tr>

                                                        </table>
                                                    </div>
                                                </div>
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

        <!-- END PAGE LEVEL SCRIPTS -->



         <script>

        var stat = [];
        $.each({
            "Established and Functioning": "Established and Functioning",
            "Not established": "Not Established"
        }, function(k, v) {
            stat.push({
                id: k,
                text: v
            });
        });


        var status_new = [];
        $.each({
            "Established": "Established",
            "Not established": "Not Established"
        }, function(k, v) {
            status_new.push({
                id: k,
                text: v
            });
        });

        $('#scoutandguide').editable({
            inputclass: 'form-control input-medium',
            source: stat,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else 
                     toastr.success("Status updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(value != "Established and Functioning" && value != "Not established")
                {
                     return 'Required Field';

                }
            }
        });
         $('#juniorredcross').editable({
            inputclass: 'form-control input-medium',
            source: status_new,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else 
                     toastr.success("Status updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            //validate: function(value){
//                if(value != "Established" && value != "Not established")
//                {
//                     return 'Required Field';

//                }
//            }
        }); 
        $('#nationalservice').editable({
            inputclass: 'form-control input-medium',
            source: status_new,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else 
                     toastr.success("Status updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            //validate: function(value){
//                if(value != "Established" && value != "Not established")
//                {
//                     return 'Required Field';

//                }
//            }
        });         
        $('#nationalcadet').editable({
            inputclass: 'form-control input-medium',
            source: status_new,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else 
                     toastr.success("Status updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            //validate: function(value){
//                if(value != "Established" && value != "Not established")
//                {
//                     return 'Required Field';

//                }
//            }
        });
         $('#redribbonclub').editable({
            inputclass: 'form-control input-medium',
            source: status_new,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else 
                     toastr.success("Status updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            //validate: function(value){
//                if(value != "Established" && value != "Not established")
//                {
//                     return 'Required Field';

//                }
//            }
        }); 
        $('#ecoclub').editable({
            inputclass: 'form-control input-medium',
            source: status_new,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else 
                     toastr.success("Status updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            //validate: function(value){
//                if(value != "Established" && value != "Not established")
//                {
//                     return 'Required Field';

//                }
//            }
        });   
         $('#cubs').editable({
            inputclass: 'form-control input-medium',
            source: status_new,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else 
                     toastr.success("Status updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            //validate: function(value){
//                if(value != "Established" && value != "Not established")
//                {
//                     return 'Required Field';

//                }
//            }
        }); 



         $('#noofinstrdyspri').editable({
                   type: 'text',
                   success: function(response, newValue) {
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Primary days updated sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,3}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 3 characters';
                       }
                       
                   }
               });



         $('#noofinstrdysuppri').editable({
                   type: 'text',
                   success: function(response, newValue) {
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Upper primary days updated sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,3}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 3 characters';
                       }
                       
                   }
               });



          $('#noofinstrdyssec').editable({
                   type: 'text',
                   success: function(response, newValue) {
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Secondary days updated sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,3}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 3 characters';
                       }
                       
                   }
               });




               $('#noofinstrdyshsc').editable({
                   type: 'text',
                   success: function(response, newValue) {
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Higher secondary days updated sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,3}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 3 characters';
                       }
                       
                   }
               });



               $('#avgschlhrschldrspri').editable({
                   type: 'text',
                   success: function(response, newValue) {
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("hour updated sucessfully", "Update Notifications");
                             
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,2}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 2 characters';
                       }
                       
                   }
               });  


                $('#avgschlminschldrspri').editable({
                   type: 'text',
                   success: function(response, newValue) {
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("minute updated sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,2}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 2 characters';
                       }
                       
                   }
               });



                 $('#avgschlhrschlsec').editable({
                   type: 'text',
                   success: function(response, newValue) {
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("hour updated sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,2}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 2 characters';
                       }
                       
                   }
               });  


                $('#avgschlminsschldrssec').editable({
                   type: 'text',
                   success: function(response, newValue) {
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("minute updated sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,2}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 2 characters';
                       }
                   }
               });


                    $('#avgschlhrschluppri').editable({
                   type: 'text',
                   success: function(response, newValue) {
                   //alert("hello");
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("hour updated sucessfully", "Update Notifications");
               
               
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,2}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 2 characters';
                       }
                       
                   }
               });  


                $('#avgschlminsschluppri').editable({
                   type: 'text',
                   success: function(response, newValue) {
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("minute updated sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,2}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 2 characters';
                       }
                   }
               });






                $('#avgschlhrschlhsc').editable({
                   type: 'text',
                   pk: 1,
                   name: 'avgschlhrsforchildrenshighersecondaryhour',
                   title: 'Enter the hour',
                   success: function(response, newValue) {
                   //alert("hello");
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("hour updated sucessfully", "Update Notifications");
               
               
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                  validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,2}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 2 characters';
                       }
                       
                   }
               });  


                $('#avgschlminsschlhsc').editable({
                   type: 'text',
                   pk: 1,
                   name: 'avgschlhrsforchildrenshighersecondaryminute',
                   title: 'Enter the minute',
                   success: function(response, newValue) {
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("minute updated sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,2}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 2 characters';
                       }
                       
                   }
               });




                 $('#avgwrknghrstchrspri').editable({
                   type: 'text',
                   success: function(response, newValue) {
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("hour updated sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,2}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 2 characters';
                       }
                       
                   }
               });  


                $('#avgwrkngminstchrspri').editable({
                   type: 'text',
                   success: function(response, newValue) {
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("minute updated sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,2}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 2 characters';
                       }
                       
                   }
               });



                 $('#avgwrknghrstchrsuppri').editable({
                   success: function(response, newValue) {
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("hour updated sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,2}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 2 characters';
                       }
                       
                   }
               });  


                $('#avgwrkngminstchrsuppri').editable({
                   type: 'text',
                   success: function(response, newValue) {
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("minute updated sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,2}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 2 characters';
                       }
                       
                   }
               });


                    $('#avgwrknghrstchrssec').editable({
                   type: 'text',
                   success: function(response, newValue) {
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("hour updated sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,2}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 2 characters';
                       }
                       
                   }
               });  


                $('#avgwrkngminstchrssec').editable({
                   type: 'text',
                   success: function(response, newValue) {
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("minute updated sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,2}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 2 characters';
                       }
                       
                   }
               });



                $('#avgwrknghrstchrshsc').editable({
                   type: 'text',
                   success: function(response, newValue) {
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("hour updated sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,2}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 2 characters';
                       }
                       
                   }
               });  


                $('#avgwrkngminstchrshsc').editable({
                   type: 'text',
                   success: function(response, newValue) {
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("minute updated sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,2}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 2 characters';
                       }
                       
                   }
               });



                $('#noofchldrnsenrld25prcnt').editable({
                   type: 'text',
                   success: function(response, newValue) {
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Number of childrens enrolled at entry level updated sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,4}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 4 characters';
                       }
                   }
               });



                 $('#noofstdntscontigtadmsnundr25prcntqta').editable({
                   type: 'text',
                   success: function(response, newValue) {
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Number of students continuing updated sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,4}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 4 characters';
                       }
                   }
               });

                 $('#noofmtnghldbysmc').editable({
                   type: 'text',
                   success: function(response, newValue) {
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Number of meetings held by SMC updated sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,4}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 4 characters';
                       }
                       
                   }
               });

                 var admin2 = [];
        $.each({
            "1": "Yes",
            "2": "No",
        }, function(k, v) {
            admin2.push({
                id: k,
                text: v
            });
        });


                 $('#smcprplndsdp').editable({
            inputclass: 'form-control input-medium',
            source: admin2,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else 
                     toastr.success("Whether SMC has prepared the School Development Plan updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
               if(value != "1" && value != "2")
               {
                    return 'Required Field';
               }
           }
        });



                 $('#noofvistsacadinspect').editable({
                   type: 'text',
                   success: function(response, newValue) {
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Number of visits for academic inspections Updated sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,4}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 4 characters';
                       }
                   }
               });





                 $('#noofvistscrccordntr').editable({
                   type: 'text',
                   success: function(response, newValue) {
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Number of visits by CRC Co-ordinator Updated sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,4}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 4 characters';
                       }
                   }
               });




                 $('#noofvistsblcklvlcrs').editable({
                   type: 'text',
                   success: function(response, newValue) {
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Number of visits by Block level officer (BRC/BEO) Updated sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,4}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 4 characters';
                       }
                   }
               });



                 $('#noofsmdcmetnghldlstacadyr').editable({
                   type: 'text',
                   success: function(response, newValue) {
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Number of SMDC meetings held during the last academic year Updated sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,4}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 4 characters';
                       }
                   }
               });

                 $('#smdcprpdschlimprvmntpln').editable({
                    inputclass: 'form-control input-medium',
                    source: admin2,
                    success: function(response, newValue) {
                    var result = $.parseJSON(response);
                         if(result.response_code != 1) return result.error_msg;
                         else 
                         toastr.success("Whether SMDC has prepared school improvement plan updated sucessfully", "Update Notifications");
                        },
                        error: function(response, newValue) {
                        return 'Service unavailable. Please try later.';
                        },
                        validate: function(value){
                        if(value != "1" && value != "2")
                        {
                            return 'Required Field';
                        }
                    }
                });


            $('#sbcconstitd').editable({
            inputclass: 'form-control input-medium',
            source: admin2,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else 
                     toastr.success("Whether the school building committee (SBC) has been constituted Updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
               if(value != "1" && value != "2")
               {
                    return 'Required Field';

               }
           }
        });


              $('#schlhasconstitdacadcomte').editable({
            inputclass: 'form-control input-medium',
            source: admin2,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else 
                     toastr.success("Whether the School has Constituted its Academic Committee Updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
               if(value != "1" && value != "2")
               {
                    return 'Required Field';

               }
           }
        });

                 


                 
                 
         

            // init editable toggler
             $('#user .editable').editable('toggleDisabled');
            $('#enable').click(function() {
                $('#user .editable').editable('toggleDisabled');
            });


</script>

    </body>

</html>