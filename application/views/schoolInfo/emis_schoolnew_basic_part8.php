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
                            <div class="container" >
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
                                            <form id="emis_schoolnew_basic_part7" method="post" action="<?php echo base_url().'Basic/schoolupdation/'.$this->uri->segment(3,0);?>">
                                                <div class="portlet light portlet-fit ">
                                                  <?php $this->load->view('schoolInfo/supportHeader'); ?>
                                                    <div class="portlet-title">
                                                        <div class="caption col-md-9">
                                                            <i class="fa fa-building font-dark"></i>
                                                            <span class="caption-subject font-dark sbold uppercase">FUND DETAILS</span>
                                                        </div>
                                                        <?php 
                                                            if($profile[0]['part_8']==1){
                                                        ?>
                                                       <div class="col-md-3">
                                                            <button type="button" class="btn btn-primary" onclick="postRequest(createJSON(this.form),'<?php echo base_url().'Basic/getPartInformationByPost/'.$this->uri->segment(4,0);?>',this.form);">VIEW/EDIT</button>
                                                        </div>
                                                        <?php } ?>
                                                    </div> 
                                                    <div class="portlet-body">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                            <?php 
                                                                //if($this->session->userdata('sch_depart')!=29){ ?>
                                                                <table class="table">
                                                                    <tr>
                                                                        <th colspan="7" class="bg-primary text-white">
                                                                            <i class="fa fa-television"></i>
                                                                            <span class="caption-subject text-white sbold uppercase" >Incentives & facilities provided to children</span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width: 200px;">Types of Facility</td>
                                                                        <td colspan="2" style="text-align: center;"><strong>Elementary</strong></td>
                                                                        <td colspan="2" style="text-align: center;"><strong>Secondary</strong></td>
                                                                        <td colspan="2" style="text-align: center;"><strong>Higher Secondary</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Gender</td>
                                                                        <td style="text-align: center;"><strong>Boys</strong></td>
                                                                        <td style="text-align: center;"><strong>Girls</strong></td>
                                                                        <td style="text-align: center;"><strong>Boys</strong></td>
                                                                        <td style="text-align: center;"><strong>Girls</strong></td>
                                                                        <td style="text-align: center;"><strong>Boys</strong></td>
                                                                        <td style="text-align: center;"><strong>Girls</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Braille books</td>
                                                                        <td>
                                                                        <input type="text" id="brlbks_elebys" name="brlbks_elebys" class="form-control" onfocus="textvalidate(this.id,'emis_booksbys_alert');" onchange="textvalidate(this.id,'emis_booksbys_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                        <font style="color:#dd4b39;" id="emis_booksbys_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="brlbks_elegls" name="brlbks_elegls" class="form-control" onfocus="textvalidate(this.id,'emis_brlbksgls_alert');" onchange="textvalidate(this.id,'emis_brlbksgls_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_brlbksgls_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="brailbks_secbys" name="brailbks_secbys" class="form-control" onfocus="textvalidate(this.id,'emis_booksbysec_alert');" onchange="textvalidate(this.id,'emis_booksbysec_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_booksbysec_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="brlbks_secgls" name="brlbks_secgls" class="form-control" onfocus="textvalidate(this.id,'emis_booksglsec_alert');" onchange="textvalidate(this.id,'emis_booksglsec_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_booksglsec_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="brailbks_hsecbys" name="brailbks_hsecbys" class="form-control" onfocus="textvalidate(this.id,'emis_booksbyshsec_alert');" onchange="textvalidate(this.id,'emis_booksbyshsec_alert');"   onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_booksbyshsec_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="brlbks_hsegls" name="brlbks_hsegls" class="form-control" onfocus="textvalidate(this.id,'booksglhsec');" onchange="textvalidate(this.id,'booksglhsec');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_booksglhsec_alert"></font>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Braille kit</td>
                                                                        <td>
                                                                            <input type="text" id="brlkit_elebys" name="brlkit_elebys" class="form-control" onfocus="textvalidate(this.id,'emis_brlkitby_alert');" onchange="textvalidate(this.id,'emis_brlkitby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_brlkitby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="brlkit_elegls" name="brlkit_elegls" class="form-control" onfocus="textvalidate(this.id,'emis_brlkitgl_alert');" onchange="textvalidate(this.id,'emis_brlkitgl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_brlkitgl_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="brailkit_secbys" name="brailkit_secbys" class="form-control" onfocus="textvalidate(this.id,'emis_brlkitsecby_alert');" onchange="textvalidate(this.id,'emis_brlkitsecby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_brlkitsecby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="brlkit_secgls" name="brlkit_secgls" class="form-control" onfocus="textvalidate(this.id,'emis_brlkitsecgl_alert');" onchange="textvalidate(this.id,'emis_brlkitsecgl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_brlkitsecgl_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="brailkit_hsecbys" name="brailkit_hsecbys" class="form-control" onfocus="textvalidate(this.id,'emis_brlkithsecby_alert');" onchange="textvalidate(this.id,'emis_brlkithsecby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_brlkithsecby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="brlkit_hsegls" name="brlkit_hsegls" class="form-control" onfocus="textvalidate(this.id,'emis_brlkithsecgl_alert');" onchange="textvalidate(this.id,'emis_brlkithsecgl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_brlkithsecgl_alert"></font>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Low vision kit</td>
                                                                        <td>
                                                                            <input type="text" id="lvnkit_elebys" name="lvnkit_elebys" class="form-control" onfocus="textvalidate(this.id,'emis_lvnbys_alert');" onchange="textvalidate(this.id,'emis_lvnbys_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_lvnbys_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="lvnkit_elegls" name="lvnkit_elegls" class="form-control" onfocus="textvalidate(this.id,'emis_lvngl_alert');" onchange="textvalidate(this.id,'emis_lvngl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_lvngl_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="lvnkit_secbys" name="lvnkit_secbys" class="form-control" onfocus="textvalidate(this.id,'emis_lvnsecby_alert');" onchange="textvalidate(this.id,'emis_lvnsecby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_lvnsecby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="lvnkit_secgls" name="lvnkit_secgls" class="form-control" onfocus="textvalidate(this.id,'emis_lvnsecgl_alert');" onchange="textvalidate(this.id,'emis_lvnsecgl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_lvnsecgl_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="lvnkit_hsecbys" name="lvnkit_hsecbys" class="form-control" onfocus="textvalidate(this.id,'emis_lvnhsecby_alert');" onchange="textvalidate(this.id,'emis_lvnhsecby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_lvnhsecby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="lvnkit_hsegls" name="lvnkit_hsegls" class="form-control" onfocus="textvalidate(this.id,'emis_lvnhsecgl_alert');" onchange="textvalidate(this.id,'emis_lvnhsecgl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_lvnhsecgl_alert"></font>
                                                                        </td>
                                                                    </tr>
                                                                     <tr>
                                                                        <td>Hearing Aid</td>
                                                                        <td>
                                                                            <input type="text" id="hearaid_elebys" name="hearaid_elebys" class="form-control" onfocus="textvalidate(this.id,'emis_aidby_alert');" onchange="textvalidate(this.id,'emis_aidby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_aidby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="hearaid_elegls" name="hearaid_elegls" class="form-control" onfocus="textvalidate(this.id,'emis_aidgl_alert');" onchange="textvalidate(this.id,'emis_aidgl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_aidgl_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="hearaid_secbys" name="hearaid_secbys" class="form-control" onfocus="textvalidate(this.id,'emis_aidsecby_alert');" onchange="textvalidate(this.id,'emis_aidsecby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_aidsecby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="hearaid_secgls" name="hearaid_secgls" class="form-control" onfocus="textvalidate(this.id,'emis_aidsecgl_alert');" onchange="textvalidate(this.id,'emis_aidsecgl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_aidsecgl_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="hearaid_hsecbys" name="hearaid_hsecbys" class="form-control" onfocus="textvalidate(this.id,'emis_aidhsecby_alert');" onchange="textvalidate(this.id,'emis_aidhsecby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_aidhsecby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="hearaid_hsegls" name="hearaid_hsegls" class="form-control" onfocus="textvalidate(this.id,'emis_aidhsecgl_alert');" onchange="textvalidate(this.id,'emis_aidhsecgl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_aidhsecgl_alert"></font>
                                                                        </td>
                                                                    </tr>
                                                                     <tr>
                                                                        <td>Braces</td>
                                                                        <td>
                                                                            <input type="text" id="braces_elebys" name="braces_elebys" class="form-control" onfocus="textvalidate(this.id,'emis_bcsby_alert');" onchange="textvalidate(this.id,'emis_bcsby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_bcsby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="braces_elegls" name="braces_elegls" class="form-control" onfocus="textvalidate(this.id,'emis_bcsgl_alert');" onchange="textvalidate(this.id,'emis_bcsgl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_bcsgl_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="braces_secbys" name="braces_secbys" class="form-control" onfocus="textvalidate(this.id,'emis_bcsecby_alert');" onchange="textvalidate(this.id,'emis_bcsecby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_bcsecby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="braces_secgls" name="braces_secgls" class="form-control" onfocus="textvalidate(this.id,'emis_bcsecgl_alert');" onchange="textvalidate(this.id,'emis_bcsecgl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_bcsecgl_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="braces_hsecbys" name="braces_hsecbys" class="form-control" onfocus="textvalidate(this.id,'emis_bchsecby_alert');" onchange="textvalidate(this.id,'emis_bchsecby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_bchsecby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="braces_hsegls" name="braces_hsegls" class="form-control" onfocus="textvalidate(this.id,'emis_bchsecgl_alert');" onchange="textvalidate(this.id,'emis_bchsecgl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_bchsecgl_alert"></font>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <td>Crutches</td>
                                                                        <td>
                                                                            <input type="text" id="crthes_elebys" name="crthes_elebys" class="form-control" onfocus="textvalidate(this.id,'emis_cthsby_alert');" onchange="textvalidate(this.id,'emis_cthsby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_cthsby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="crthes_elegls" name="crthes_elegls" class="form-control" onfocus="textvalidate(this.id,'emis_cthsgl_alert');" onchange="textvalidate(this.id,'emis_cthsgl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_cthsgl_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="crthes_secbys" name="crthes_secbys" class="form-control" onfocus="textvalidate(this.id,'emis_cthsecby_alert');" onchange="textvalidate(this.id,'emis_cthsecby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_cthsecby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="crthes_secgls" name="crthes_secgls" class="form-control" onfocus="textvalidate(this.id,'emis_cthsecgl_alert');" onchange="textvalidate(this.id,'emis_cthsecgl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_cthsecgl_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="crthes_hsecbys" name="crthes_hsecbys" class="form-control" onfocus="textvalidate(this.id,'emis_cthhsecby_alert');" onchange="textvalidate(this.id,'emis_cthhsecby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_cthhsecby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="crthes_hsegls" name="crthes_hsegls" class="form-control" onfocus="textvalidate(this.id,'emis_cthhsecgl_alert');" onchange="textvalidate(this.id,'emis_cthhsecgl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_cthhsecgl_alert"></font>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Wheel chair</td>
                                                                        <td>
                                                                            <input type="text" id="whlchr_elebys" name="whlchr_elebys" class="form-control" onfocus="textvalidate(this.id,'emis_whlbys_alert');" onchange="textvalidate(this.id,'emis_whlbys_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_whlbys_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="whlchr_elegls" name="whlchr_elegls" class="form-control" onfocus="textvalidate(this.id,'emis_whlgl_alert');" onchange="textvalidate(this.id,'emis_whlgl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_whlgl_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="whlchr_secbys" name="whlchr_secbys" class="form-control" onfocus="textvalidate(this.id,'emis_whlsecby_alert');" onchange="textvalidate(this.id,'emis_whlsecby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_whlsecby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="whlchr_secgls" name="whlchr_secgls" class="form-control" onfocus="textvalidate(this.id,'emis_whlsecgl_alert');" onchange="textvalidate(this.id,'emis_whlsecgl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_whlsecgl_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="whlchr_hsecbys" name="whlchr_hsecbys" class="form-control" onfocus="textvalidate(this.id,'emis_whlhsecby_alert');" onchange="textvalidate(this.id,'emis_whlhsecby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_whlhsecby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="whlchr_hsegls" name="whlchr_hsegls" class="form-control" onfocus="textvalidate(this.id,'emis_whlhsecgl_alert');" onchange="textvalidate(this.id,'emis_whlhsecgl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_whlhsecgl_alert"></font>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Tri-cycle</td>
                                                                        <td>
                                                                            <input type="text" id="tricyle_elebys" name="tricyle_elebys" class="form-control" onfocus="textvalidate(this.id,'emis_triby_alert');" onchange="textvalidate(this.id,'emis_triby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_triby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="tricyle_elegls" name="tricyle_elegls" class="form-control" onfocus="textvalidate(this.id,'emis_trigl_alert');" onchange="textvalidate(this.id,'emis_trigl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_trigl_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="tricyle_secbys" name="tricyle_secbys" class="form-control" onfocus="textvalidate(this.id,'emis_trisecby_alert');" onchange="textvalidate(this.id,'emis_trisecby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_trisecby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="tricyle_secgls" name="tricyle_secgls" class="form-control" onfocus="textvalidate(this.id,'emis_trisecgl_alert');" onchange="textvalidate(this.id,'emis_trisecgl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_trisecgl_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="tricyle_hsecbys" name="tricyle_hsecbys" class="form-control" onfocus="textvalidate(this.id,'emis_trihsecby_alert');" onchange="textvalidate(this.id,'emis_trihsecby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_trihsecby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="tricyle_hsegls" name="tricyle_hsegls" class="form-control" onfocus="textvalidate(this.id,'emis_trihsecgl_alert');" onchange="textvalidate(this.id,'emis_trihsecgl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_trihsecgl_alert"></font>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Caliper</td>
                                                                        <td>
                                                                            <input type="text" id="caliper_elebys" name="caliper_elebys" class="form-control" onfocus="textvalidate(this.id,'emis_calby_alert');" onchange="textvalidate(this.id,'emis_calby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_calby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="caliper_elegls" name="caliper_elegls" class="form-control" onfocus="textvalidate(this.id,'emis_calgl_alert');" onchange="textvalidate(this.id,'emis_calgl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_calgl_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="caliper_secbys" name="caliper_secbys" class="form-control" onfocus="textvalidate(this.id,'emis_calsecby_alert');" onchange="textvalidate(this.id,'emis_calsecby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_calsecby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="caliper_secgls" name="caliper_secgls" class="form-control" onfocus="textvalidate(this.id,'emis_calsecgl_alert');" onchange="textvalidate(this.id,'emis_calsecgl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_calsecgl_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="caliper_hsecbys" name="caliper_hsecbys" class="form-control" onfocus="textvalidate(this.id,'emis_calhsecby_alert');" onchange="textvalidate(this.id,'emis_calhsecby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_calhsecby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="caliper_hsegls" name="caliper_hsegls" class="form-control" onfocus="textvalidate(this.id,'emis_calhsecgl_alert');" onchange="textvalidate(this.id,'emis_calhsecgl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_calhsecgl_alert"></font>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Escort</td>
                                                                        <td>
                                                                            <input type="text" id="escort_elebys" name="escort_elebys" class="form-control" onfocus="textvalidate(this.id,'emis_estby_alert');" onchange="textvalidate(this.id,'emis_estby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_estby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="escort_elegls" name="escort_elegls" class="form-control" onfocus="textvalidate(this.id,'emis_estgl_alert');" onchange="textvalidate(this.id,'emis_estgl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_estgl_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="escort_secbys" name="escort_secbys" class="form-control" onfocus="textvalidate(this.id,'emis_estsecby_alert');" onchange="textvalidate(this.id,'emis_estsecby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_estsecby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="escort_secgls" name="escort_secgls" class="form-control" onfocus="textvalidate(this.id,'emis_estsecgl_alert');" onchange="textvalidate(this.id,'emis_estsecgl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_estsecgl_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="escort_hsecbys" name="escort_hsecbys" class="form-control" onfocus="textvalidate(this.id,'emis_esthsecby_alert');" onchange="textvalidate(this.id,'emis_esthsecby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_esthsecby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="escort_hsegls" name="escort_hsegls" class="form-control" onfocus="textvalidate(this.id,'emis_esthsecgl_alert');" onchange="textvalidate(this.id,'emis_esthsecgl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_esthsecgl_alert"></font>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Stipend</td>
                                                                        <td>
                                                                            <input type="text" id="stipend_elebys" name="stipend_elebys" class="form-control" onfocus="textvalidate(this.id,'emis_stiby_alert');" onchange="textvalidate(this.id,'emis_stiby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_stiby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="stipend_elegls" name="stipend_elegls" class="form-control" onfocus="textvalidate(this.id,'emis_stigl_alert');" onchange="textvalidate(this.id,'emis_stigl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_stigl_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="stipend_secbys" name="stipend_secbys" class="form-control" onfocus="textvalidate(this.id,'emis_stisecby_alert');" onchange="textvalidate(this.id,'emis_stisecby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_stisecby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="stipend_secgls" name="stipend_secgls" class="form-control" onfocus="textvalidate(this.id,'emis_stisecgl_alert');" onchange="textvalidate(this.id,'emis_stisecgl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_stisecgl_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="stipend_hsecbys" name="stipend_hsecbys" class="form-control" onfocus="textvalidate(this.id,'emis_stihsecby_alert');" onchange="textvalidate(this.id,'emis_stihsecby_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_stihsecby_alert"></font>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="stipend_hsegls" name="stipend_hsegls" class="form-control" onfocus="textvalidate(this.id,'emis_stihsecgl_alert');" onchange="textvalidate(this.id,'emis_stihsecgl_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                            <font style="color:#dd4b39;" id="emis_stihsecgl_alert"></font>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <?php // } ?>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                            <table class="table">
                                                            <tr>
                                                                        <th colspan="3" class="bg-primary text-white">
                                                                            <i class="fa fa-inr"></i>
                                                                            <span class="caption-subject text-white sbold uppercase" >Receipts and Expenditure Grants received by the school</span>
                                                                        </th>
                                                            </tr>
                                                            <tr><th colspan="3"><i class="fa fa-check font-dark"></i>School funds received excluding MDM for Elementary School/Sections(Govt and Aided Schools)</th></tr>
                                                            <tr>
                                                                <td>School Grant</td>
                                                                <td>Receipt (in Rs.)</td>
                                                                <td>Expenditure (in Rs.)</td>
                                                            </tr>
                                                            <tr>
                                                                <td>School Development Grant(under SSA)</td>
                                                                <td>
                                                                    <input type="text" id="ssadevep_recept" name="ssadevep_recept" class="form-control" onfocus="textvalidate(this.id,'emis_devrece_alert');" onchange="textvalidate(this.id,'emis_devrece_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_devrece_alert"></font>
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="ssadevep_expdtre" name="ssadevep_expdtre" class="form-control" onfocus="textvalidate(this.id,'emis_devexp_alert');" onchange="textvalidate(this.id,'emis_devexp_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_devexp_alert"></font>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>School Maintanence Grant(under SSA)</td>
                                                                <td>
                                                                    <input type="text" id="ssamntn_recept" name="ssamntn_recept" class="form-control" onfocus="textvalidate(this.id,'emis_mntn_alert');" onchange="textvalidate(this.id,'emis_mntn_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_mntn_alert"></font>
                                                                </td>
                                                                <td>    
                                                                    <input type="text" id="ssamntn_expdtre" name="ssamntn_expdtre" class="form-control" onfocus="textvalidate(this.id,'emis_mntnexp_alert');" onchange="textvalidate(this.id,'emis_mntnexp_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_mntnexp_alert"></font>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>TLM/TeachersGrant(under SSA)</td>
                                                                <td>
                                                                    <input type="text" id="ssatlm_recept" name="ssatlm_recept" class="form-control" onfocus="textvalidate(this.id,'emis_tlm_alert');" onchange="textvalidate(this.id,'emis_tlm_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_tlm_alert"></font>
                                                                </td>
                                                                <td>    
                                                                    <input type="text" id="ssatlm_expdtre" name="ssatlm_expdtre" class="form-control" onfocus="textvalidate(this.id,'emis_tlmexp_alert');" onchange="textvalidate(this.id,'emis_tlmexp_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_tlmexp_alert"></font>
                                                                </td>
                                                            </tr>
                                                            <tr><th colspan="3"><i class="fa fa-check font-dark"></i>Grants received by school & expenditure (Secondary & Higher Secondary Schools/Sections) (Govt and Aided Schools)</th></tr>
                                                            <tr>
                                                                <td>Details of school level grants</td>
                                                                <td>Receipt (in Rs.)</td>
                                                                <td>Expenditure (in Rs.)</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Civil works</td>
                                                                <td>
                                                                    <input type="text" id="ssacivil_recept" name="ssacivil_recept" class="form-control" onfocus="textvalidate(this.id,'emis_cvlwrks_alert');" onchange="textvalidate(this.id,'emis_cvlwrks_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_cvlwrks_alert"></font>
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="ssacivil_expdtre" name="ssacivil_expdtre" class="form-control" onfocus="textvalidate(this.id,'emis_cvlexp_alert');" onchange="textvalidate(this.id,'emis_cvlexp_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_cvlexp_alert"></font>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Annual School Grants(recurring)</td>
                                                                <td>
                                                                    <input type="text" id="ssaannual_recept" name="ssaannual_recept" class="form-control" onfocus="textvalidate(this.id,'emis_annual_alert');" onchange="textvalidate(this.id,'emis_annual_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_annual_alert"></font>
                                                                </td>
                                                                <td>    
                                                                    <input type="text" id="ssaannual_expdtre" name="ssaannual_expdtre" class="form-control" onfocus="textvalidate(this.id,'emis_anlexp_alert');" onchange="textvalidate(this.id,'emis_anlexp_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_anlexp_alert"></font>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Minor Repair/maintenance</td>
                                                                <td>
                                                                    <input type="text" id="ssamnr_recept" name="ssamnr_recept" class="form-control" onfocus="textvalidate(this.id,'emis_mnrmntn_alert');" onchange="textvalidate(this.id,'emis_mnrmntn_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_mnrmntn_alert"></font>
                                                                </td>
                                                                <td>    
                                                                    <input type="text" id="ssamnr_expdtre" name="ssamnr_expdtre" class="form-control" onfocus="textvalidate(this.id,'emis_mnrexp_alert');" onchange="textvalidate(this.id,'emis_mnrexp_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_mnrexp_alert"></font>
                                                                </td>
                                                            </tr>
                                                             <tr>
                                                                <td>Repair and replacement of laboratory equipments, purchase of laboratory consumable sand articles etc.</td>
                                                                <td>
                                                                    <input type="text" id="ssarpr_recept" name="ssarpr_recept" class="form-control" onfocus="textvalidate(this.id,'emis_reprecp_alert');" onchange="textvalidate(this.id,'emis_reprecp_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_reprecp_alert"></font>
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="ssarpr_expdtre" name="ssarpr_expdtre" class="form-control" onfocus="textvalidate(this.id,'emis_repexp_alert');" onchange="textvalidate(this.id,'emis_repexp_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_repexp_alert"></font>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Pruchase of books, periodicals, newspaper, etc.</td>
                                                                <td>
                                                                    <input type="text" id="ssapur_recept" name="ssapur_recept" class="form-control" onfocus="textvalidate(this.id,'emis_purrecp_alert');" onchange="textvalidate(this.id,'emis_purrecp_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_purrecp_alert"></font>
                                                                </td>
                                                                <td>    
                                                                    <input type="text" id="ssapur_expdtre" name="ssapur_expdtre" class="form-control" onfocus="textvalidate(this.id,'emis_purexp_alert');" onchange="textvalidate(this.id,'emis_purexp_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_purexp_alert"></font>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Grant for meeting water, telephone and electricity charges.</td>
                                                                <td>
                                                                    <input type="text" id="ssametwtr_recept" name="ssametwtr_recept" class="form-control" onfocus="textvalidate(this.id,'emis_chgerecp_alert');" onchange="textvalidate(this.id,'emis_chgerecp_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_chgerecp_alert"></font>
                                                                </td>
                                                                <td>    
                                                                    <input type="text" id="ssametwtr_expdtre" name="ssametwtr_expdtre" class="form-control" onfocus="textvalidate(this.id,'emis_chgeexp_alert');" onchange="textvalidate(this.id,'emis_chgeexp_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_chgeexp_alert"></font>
                                                                </td>
                                                            </tr>
                                                             <tr>
                                                                <td>Others</td>
                                                                <td>
                                                                    <input type="text" id="ssaoth_recept" name="ssaoth_recept" class="form-control" onfocus="textvalidate(this.id,'emis_othrecep_alert');" onchange="textvalidate(this.id,'emis_othrecep_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_othrecep_alert"></font>
                                                                </td>
                                                                <td>    
                                                                    <input type="text" id="ssaoth_expdtre" name="ssaoth_expdtre" class="form-control" onfocus="textvalidate(this.id,'emis_othexp_alert');" onchange="textvalidate(this.id,'emis_othexp_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_othexp_alert"></font>
                                                                </td>
                                                            </tr>
                                                             <tr>
                                                                <td>Total (Grants at the school level)</td>
                                                                <td>
                                                                    <input type="text" id="ssatot_recept" name="ssatot_recept" class="form-control" onfocus="textvalidate(this.id,'emis_totrecp_alert');" onchange="textvalidate(this.id,'emis_totrecp_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_totrecp_alert"></font>
                                                                </td>
                                                                <td>    
                                                                    <input type="text" id="ssatot_expdtre" name="ssatot_expdtre" class="form-control" onfocus="textvalidate(this.id,'emis_totexp_alert');" onchange="textvalidate(this.id,'emis_totexp_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_totexp_alert"></font>
                                                                </td>
                                                            </tr>
                                                            
                                                            <tr><th colspan="3"><i class="fa fa-check font-dark"></i>Grants received by the school & expenditure (Govt. Schools)</th></tr>
                                                            <tr>
                                                                <td>Grants under Samagra Shiksha</td>
                                                                <td>Receipt (in Rs.)</td>
                                                                <td>Expenditure (in Rs.)</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Composite School Grant</td>
                                                                <td>
                                                                    <input type="text" id="ssacmpste_recept" name="ssacmpste_recept" class="form-control" onfocus="textvalidate(this.id,'emis_csgrecp_alert');" onchange="textvalidate(this.id,'emis_csgrecp_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_csgrecp_alert"></font>
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="ssacmpste_expdtre" name="ssacmpste_expdtre" class="form-control" onfocus="textvalidate(this.id,'emis_csgexp_alert');" onchange="textvalidate(this.id,'emis_csgexp_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_csgexp_alert"></font>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Library Grant</td>
                                                                <td>
                                                                    <input type="text" id="ssalibg_recept" name="ssalibg_recept" class="form-control" onfocus="textvalidate(this.id,'emis_librecp_alert');" onchange="textvalidate(this.id,'emis_librecp_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required" />
                                                                    <font style="color:#dd4b39;" id="emis_librecp_alert"></font>
                                                                </td>
                                                                <td>    
                                                                    <input type="text" id="ssalibg_expdtre" name="ssalibg_expdtre" class="form-control" onfocus="textvalidate(this.id,'emis_libexp_alert');" onchange="textvalidate(this.id,'emis_libexp_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_libexp_alert"></font>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Grant for sports and physical education</td>
                                                                <td>
                                                                    <input type="text" id="ssaped_recept" name="ssaped_recept" class="form-control" onfocus="textvalidate(this.id,'emis_perecp_alert');" onchange="textvalidate(this.id,'emis_perecp_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_perecp_alert"></font>
                                                                </td>
                                                                <td>    
                                                                    <input type="text" id="ssaped_expdtre" name="ssaped_expdtre" class="form-control" onfocus="textvalidate(this.id,'emis_peexp_alert');" onchange="textvalidate(this.id,'emis_peexp_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_peexp_alert"></font>
                                                                </td>
                                                            </tr>
                                                             <tr>
                                                                <td>Grant for media and community mobilization</td>
                                                                <td>
                                                                    <input type="text" id="ssamedia_recept" name="ssamedia_recept" class="form-control" onfocus="textvalidate(this.id,'emis_mdiarecp_alert');" onchange="textvalidate(this.id,'emis_mdiarecp_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_mdiarecp_alert"></font>
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="ssamedia_expdtre" name="ssamedia_expdtre" class="form-control" onfocus="textvalidate(this.id,'emis_mdiaexp_alert');" onchange="textvalidate(this.id,'emis_mdiaexp_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_mdiaexp_alert"></font>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Grant for Training of SMC/SMDC</td>
                                                                <td>
                                                                    <input type="text" id="ssatrngsmcdc_recept" name="ssatrngsmcdc_recept" class="form-control" onfocus="textvalidate(this.id,'emis_tngrecp_alert');" onchange="textvalidate(this.id,'emis_tngrecp_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_tngrecp_alert"></font>
                                                                </td>
                                                                <td>    
                                                                    <input type="text" id="ssatrngsmcdc_expdtre" name="ssatrngsmcdc_expdtre" class="form-control" onfocus="textvalidate(this.id,'emis_tngexp_alert');" onchange="textvalidate(this.id,'emis_tngexp_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_tngexp_alert"></font>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Grant for support at Preschool Level (Only for primary schools/sections)</td>
                                                                <td>
                                                                    <input type="text" id="ssapreschl_recept" name="ssapreschl_recept" class="form-control" onfocus="textvalidate(this.id,'emis_prerecp_alert');" onchange="textvalidate(this.id,'emis_prerecp_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_prerecp_alert"></font>
                                                                </td>
                                                                <td>    
                                                                    <input type="text" id="ssapreschl_expdtre" name="ssapreschl_expdtre" class="form-control" onfocus="textvalidate(this.id,'emis_preexp_alert');" onchange="textvalidate(this.id,'emis_preexp_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_preexp_alert"></font>
                                                                </td>
                                                            </tr>
                                                            <tr><th colspan="3"><i class="fa fa-check font-dark"></i>Financial Assistance received by the school from NGO/PSU</th></tr>
                                                            <tr>
                                                                <td>Non - Govt. Organization (NGO) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <input type="radio" id="ngofince_1" name="ngo_fince" value="1" onchange="sbcshow1(this,'ngofncedetails');setRequiredField(this.value,'ngo_name,ngo_amt','1');"/><label for="">YES</label>
                                                                    <input type="radio" id="ngofince_2" name="ngo_fince" value="0" onchange="sbcshow1(this,'ngofncedetails');setRequiredField(this.value,'ngo_name,ngo_amt','1');" checked="checked"/><label for="">NO</label>
                                                                </td>
                                                                <td class="ngofncedetails">
                                                                   <label>Name</label>
                                                                   <input type="text" id="ngo_name" name="ngo_name" class="form-control" onfocus="textvalidate(this.id,'emis_ngoname_alert');" onchange="textvalidate(this.id,'emis_ngoname_alert');"  />
                                                                   <font style="color:#dd4b39;" id="emis_ngoname_alert"></font>
                                                                </td>
                                                                <td class="ngofncedetails"><label>Amount (in Rs.)</label>
                                                                     <input type="text" id="ngo_amt" name="ngo_amt" class="form-control" onfocus="textvalidate(this.id,'emis_ngoamnt_alert');" onchange="textvalidate(this.id,'emis_ngoamnt_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7"/></td>
                                                                     <font style="color:#dd4b39;" id="emis_ngoamnt_alert"></font>
                                                                </tr>
                                                            <tr>
                                                                <td>Public Sector Undertaking (PSU) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <input type="radio" id="psu_1" name="psu_fince" value="1" onchange="sbcshow1(this,'psufncedetails');setRequiredField(this.value,'psu_name,psu_amt','1');"/><label for="">YES</label>
                                                                    <input type="radio" id="psu_2" name="psu_fince" value="0" onchange="sbcshow1(this,'psufncedetails');setRequiredField(this.value,'psu_name,psu_amt','1');" checked="checked"/><label for="">NO</label>
                                                                </td>
                                                                <td class="psufncedetails">
                                                                   <label>Name</label> 
                                                                   <input type="text" id="psu_name" name="psu_name" class="form-control" onfocus="textvalidate(this.id,'emis_psuname_alert');" onchange="textvalidate(this.id,'emis_psuname_alert');"/>
                                                                   <font style="color:#dd4b39;" id="emis_psuname_alert"></font>
                                                                </td>
                                                                <td class="psufncedetails">
                                                                    <label>Amount (in Rs.)</label> 
                                                                    <input type="text" id="psu_amt" name="psu_amt" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onfocus="textvalidate(this.id,'emis_psuamt_alert');" onchange="textvalidate(this.id,'emis_psuamt_alert');"  maxlength="7" />
                                                                    <font style="color:#dd4b39;" id="emis_psuamt_alert"></font>
                                                                </td>
                                                            </tr>
                                                             <tr><th colspan="3"><i class="fa fa-check font-dark"></i>Whether school is maintaining inventory register for the following:</th></tr>
                                                             <tr>
                                                                <td>Computer</td>
                                                                <td>
                                                                    <input type="radio" id="maincom_1" name="main_com" value="1" /><label for="">YES</label>
                                                                    <input type="radio" id="maincom_2" name="main_com" value="0" checked="checked"/><label for="">NO</label>
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sports Equipments</td>
                                                                <td>
                                                                    <input type="radio" id="sprtsequip_1" name="sprts_equip" value="1" /><label for="">YES</label>
                                                                    <input type="radio" id="sprtsequip_2" name="sprts_equip" value="0" checked="checked"/><label for="">NO</label>
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Library Books</td>
                                                                <td>
                                                                    <input type="radio" id="libboks_1" name="lib_boks" value="1" /><label for="">YES</label>
                                                                    <input type="radio" id="libboks_2" name="lib_boks" value="0" checked="checked"/><label for="">NO</label>
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                       </table>
                                                       <table class="table">
                                                            <!--<tr>
                                                                <td>Number of teachers with Aadhar or whose unique ID is seeded in any electronic data base</td>
                                                                <td>
                                                                    <input type="text" id="noteacher_adhar" name="noteacher_adhar" class="form-control" onfocus="textvalidate(this.id,'emis_teacheradhar_alert');" onchange="textvalidate(this.id,'emis_teacheradhar_alert');"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="7" required="required"/>
                                                                    <font style="color:#dd4b39;" id="emis_teacheradhar_alert"></font>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Whether the school has in place a system to capture student attendance electronically</td>
                                                                <td>
                                                                    <input type="radio" id="stuatdnceelet_1" name="stuatdnce_elet" value="1" /><label for="">YES</label>
                                                                    <input type="radio" id="stuatdnceelet_2" name="stuatdnce_elet" value="0" checked="checked"/><label for="">NO</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Whether the school has in place a system to capture teacher attendance electronically</td>
                                                                <td>
                                                                    <input type="radio" id="tchratdnceelet_1" name="tchratdnce_elet" value="1" /><label for="">YES</label>
                                                                    <input type="radio" id="tchratdnceelet_2" name="tchratdnce_elet" value="0" checked="checked"/><label for="">NO</label>
                                                                </td>
                                                            </tr>-->
                                                            <tr>
                                                                <td>Has school evaluation been completed</td>
                                                                <td>
                                                                    <input type="radio" id="schlevlcmp_1" name="schlevl_cmp" value="1" /><label for="">YES</label>
                                                                    <input type="radio" id="schlevlcmp_2" name="schlevl_cmp" value="0" checked="checked"/><label for="">NO</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Has school made Improvement Plans on the basis of Evaluation?</td>
                                                                <td>
                                                                    <input type="radio" id="schlimp_1" name="schl_imp" value="1" /><label for="">YES</label>
                                                                    <input type="radio" id="schlimp_2" name="schl_imp" value="0" checked="checked"/><label for="">NO</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Is the school registered under PFMS?</td>
                                                                <td>
                                                                    <input type="radio" id="schlregpfms_1" name="schlreg_pfms" value="1" /><label for="">YES</label>
                                                                    <input type="radio" id="schlregpfms_2" name="schlreg_pfms" value="0" checked="checked"/><label for="">NO</label>
                                                                </td>
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
                                                    <button type="button" class="btn btn-primary" onclick="return checkRequired(this.form.id);">Submit</button>
                                                    <button type="button" onclick="location.href='<?php echo $_SERVER['PHP_SELF'];?>'" class="btn default">Cancel</button>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <button type="button" class="btn btn-primary" onclick="location.href='<?php echo substr($_SERVER['PHP_SELF'], 0, -10)."/".(substr($_SERVER['PHP_SELF'], 53, -8)+1);?>'">NEXT</button>
                                                </div>
                                                <?php }
                                                    else{ 
                                                ?>
                                                <div class="form-group col-md-12">
                                                    <button type="button" class="btn btn-primary" onclick="return checkRequired(this.form.id);">Submit</button>
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
        sbcshow1(document.getElementById('ngofince_2'),'ngofncedetails');
        sbcshow1(document.getElementById('psu_2'),'psufncedetails');
    </script>
</body>
</html>