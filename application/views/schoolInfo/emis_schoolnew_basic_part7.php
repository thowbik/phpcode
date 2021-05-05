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
                                                            <span class="caption-subject font-dark sbold uppercase">Fund Details</span>
                                                        </div>
                                                        <?php 
                                                            if($profile[0]['part_7']==1){
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
                                                                if($this->session->userdata('sch_depart')!=29){ ?>
                                                                <table class="table">
                                                                    <tr>
                                                                        <th colspan="4" class="bg-primary text-white">
                                                                            <i class="fa fa-inr"></i>
                                                                            <span class="caption-subject text-white sbold uppercase" >Fund Details</span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Endowment Fund Details</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><label>Name of the Bank deposited <font style="color:#dd4b39;">*</font></label></td>
                                                                        <td>
                                                                            <div>
                                                                                <select id="endow_bank_id" name="endow_bank_id" class="form-control"  onfocus="textvalidate(this.id,'emis_bdepsc_alert');" onchange="textvalidate(this.id,'emis_bdepsc_alert');" required="required">
                                                                                    <option value="">Choose the Bank</option>
                                                                                    <?php foreach($bank as $bnk) {?>
                                                                                    <option value="<?php  echo $bnk['id']; ?>"><?php echo $bnk['bank']; ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                                <!--<input type="text" id="endow_bank_id" name="endow_bank_id" maxlength="50"  onfocus="textvalidate(this.id,'emis_bdepsc_alert');" onchange="textvalidate(this.id,'emis_bdepsc_alert');" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" required="required" class="form-control">-->
                                                                                <!--endow_bank_id-->
                                                                                <font style="color:#dd4b39;"><div id="emis_bdepsc_alert"></div></font>
                                                                            </div>
                                                                        </td>
                                                                        <td><label>Amount (in Rs.) <font style="color:#dd4b39;">*</font></label></td>
                                                                        <td>
                                                                            <div>                                                                          
                                                                               <input type="text" id="endow_amt" name="endow_amt" maxlength="9"  onfocus="textvalidate(this.id,'emis_efdrs_alert');" onchange="textvalidate(this.id,'emis_efdrs_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required" class="form-control">
                                                                               <!--endow_amt-->
                                                                               <font style="color:#dd4b39;"><div id="emis_efdrs_alert"></div></font>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><label>Date of Deposit <font style="color:#dd4b39;">*</font></label></td>
                                                                        <td>
                                                                            <div>
                                                                            <input type="date" id="endow_date_deposit" name="endow_date_deposit" maxlength="6" min="<?php echo (date('Y-m-d',strtotime('now - 10Years'))); ?>" max="<?php echo (date('Y-m-d',strtotime('now'))); ?>" onfocus="textvalidate(this.id,'emis_ddsc_alert');" onchange="textvalidate(this.id,'emis_ddsc_alert');" onkeydown="return false;" required="required" class="form-control">
                                                                            <!--endow_date_deposit-->
                                                                            <font style="color:#dd4b39;"><div id="emis_ddsc_alert"></div></font>
                                                                            </div>                                                                            
                                                                        </td>
                                                                        <td>Date of Maturity <font style="color:#dd4b39;">*</font></td>
                                                                        <?php
                                                                            $created_date= date('Y-m-d',strtotime("now"));
                                                                            $EndDateTime = DateTime::createFromFormat('Y-m-d', $created_date);
                                                                            $EndDateTime->modify('+30 years');
                                                                        ?>
                                                                        <td>
                                                                        <input type="date" id="endow_date_maturity" name="endow_date_maturity" min="<?php echo (date('Y-m-d',strtotime('now - 1Years'))); ?>" max="<?php echo $EndDateTime->format('Y-m-d'); ?>" onkeydown="return false;" onfocus="textvalidate(this.id,'emis_dmsc_alert');" onchange="textvalidate(this.id,'emis_dmsc_alert');" required="required" class="form-control">
                                                                         <!--endow_date_maturity-->
                                                                        <font style="color:#dd4b39;"><div id="emis_dmsc_alert"></div></font>
                                                                        </td>
                                                                    </tr> 
                                                                    <tr>
                                                                        
                                                                        <td>Bank Certificate Number <font style="color:#dd4b39;">*</font></td>
                                                                        <td>
                                                                        <input type="text" id="endow_certif" name="endow_certif" maxlength="25"  onfocus="textvalidate(this.id,'emis_bcn_alert');" onchange="textvalidate(this.id,'emis_bcn_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required" class="form-control">
                                                                        <!--endow_certif-->
                                                                        <font style="color:#dd4b39;"><div id="emis_bcn_alert"></div></font>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="4">Corpus Fund Details</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Amount (in Rs.) <font style="color:#dd4b39;">*</font></td>
                                                                        <td>
                                                                            <input type="text" id="corp_amt" name="corp_amt" maxlength="9"  onfocus="textvalidate(this.id,'emis_cfdsc_alert');" onchange="textvalidate(this.id,'emis_cfdsc_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required" class="form-control">
                                                                            <!--corp_amt-->
                                                                            <font style="color:#dd4b39;"><div id="emis_cfdsc_alert"></div></font>
                                                                        </td>
                                                                        <td>Name of the Bank deposited <font style="color:#dd4b39;">*</font></td>
                                                                        <td>
                                                                            <select id="corp_bank_id" name="corp_bank_id" class="form-control"  onfocus="textvalidate(this.id,'emis_nbdsc_alert');" onchange="textvalidate(this.id,'emis_nbdsc_alert');" required="required">
                                                                                    <option value="">Choose the Bank</option>
                                                                                    <?php foreach($bank as $bnk) {?>
                                                                                    <option value="<?php  echo $bnk['id']; ?>"><?php echo $bnk['bank']; ?></option>
                                                                                    <?php } ?>
                                                                            </select><!--corp_bank_id-->
                                                                            <font style="color:#dd4b39;"><div id="emis_nbdsc_alert"></div></font>
                                                                        </td>
                                                                    </tr> 
                                                                    <tr>
                                                                        <td>Date of Deposit <font style="color:#dd4b39;">*</font></td>
                                                                        <td>
                                                                            <input type="date" id="corp_date_deposit" name="corp_date_deposit" min="<?php echo (date('Y-m-d',strtotime('now - 10Years'))); ?>" max="<?php echo (date('Y-m-d',strtotime('now'))); ?>" onfocus="textvalidate(this.id,'emis_dodcf_alert');" onkeydown="return false;" onchange="textvalidate(this.id,'emis_dodcf_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required" class="form-control">
                                                                            <!--corp_date_deposit-->
                                                                            <font style="color:#dd4b39;"><div id="emis_dodcf_alert"></div></font>
                                                                        </td>
                                                                        <td>Account Number <font style="color:#dd4b39;">*</font></td>
                                                                        <td>
                                                                            <input type="text" id="corp_accno" name="corp_accno" maxlength="20"  onfocus="textvalidate(this.id,'emis_accfd_alert');" onchange="textvalidate(this.id,'emis_accfd_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required" class="form-control">
                                                                            <!--corp_accno-->
                                                                            <font style="color:#dd4b39;"><div id="emis_accfd_alert"></div></font>
                                                                        </td>
                                                                    </tr> 
                                                                </table>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                            <table class="table">
                                                            <tr>
                                                                        <th colspan="16" class="bg-primary text-white">
                                                                            <i class="fa fa-inr"></i>
                                                                            <span class="caption-subject text-white sbold uppercase" >Fee Structure - Per Annum</span>
                                                                        </th>
                                                            </tr>
                                                            <tr>
                                                                <th>Standard <font style="color:#dd4b39;">*</font></th>
                                                               
                                                                <th style="text-align: center;">Institution Fee <font style="color:#dd4b39;">*</font></th>
                                                                <th style="text-align: center;">Tution Fee <font style="color:#dd4b39;">*</font></th>
                                                                <th style="text-align: center;">Regular Fee <font style="color:#dd4b39;">*</font></th>
                                                                <th style="text-align: center;">Transport Fee <font style="color:#dd4b39;">*</font></th>
                                                                
                                                                <th style="text-align: center;">Annual Fee <font style="color:#dd4b39;">*</font></th>
                                                                
                                                                <th style="text-align: center;">Book Fee <font style="color:#dd4b39;">*</font></th>
                                                                
                                                                <th style="text-align: center;">Lab Fee <font style="color:#dd4b39;">*</font></th>
                                                                <th style="text-align: center;">Other Fee <font style="color:#dd4b39;">*</font></th>
                                                                <th style="text-align: center;">Total <font style="color:#dd4b39;">*</font></th>
																<!--<th style="width: 130px;"> Add (+) Delete (-)</th>-->
                                                                
                                                                <input type="hidden" id="hiddeninstifee_0" name="hiddeninstifee_0" value="schoolnew_feestruct"/>
                                                            </tr>
                                                                
                                                            <?php
                                                                $romanletter[-3]='Pre-KG'; 
                                                                $romanletter[-2]='LKG';
                                                                $romanletter[-1]='UKG';
                                                                $romanletter[0]='NA';
                                                                $romanletter[1]='I'; 
                                                                $romanletter[2]='II';
                                                                $romanletter[3]='III';
                                                                $romanletter[4]='IV';
                                                                $romanletter[5]='V'; 
                                                                $romanletter[6]='VI';
                                                                $romanletter[7]='VII';
                                                                $romanletter[8]='VIII';
                                                                $romanletter[9]='IX'; 
                                                                $romanletter[10]='X';
                                                                $romanletter[11]='XI';
                                                                $romanletter[12]='XII';
                                                                
                                                                $rCount=0;
                                                                if($basic[0]->low_class==15){$low=-3;}
                                                                elseif($basic[0]->low_class==14){$low=-2;}
                                                                elseif($basic[0]->low_class==13){$low=-1;}
                                                                
                                                                for($i=$low;$i<=$basic[0]->high_class;$i++){
                                                                    if($i==0){
                                                                        if($basic[0]->low_class!=0 || $basic[0]->high_class!=0)
                                                                            continue;
                                                                    }
                                                                        
                                                            ?>
                                                            <tr>
                                                                <th style="width: 135px !important;">
                                                                    <?php echo $romanletter[$i]; ?>
                                                                    <input type="hidden" id="classid_<?php echo($rCount); ?>" name="classid_<?php echo($rCount); ?>" value="<?php echo($i); ?>" />
                                                                </th>
                                                                <th>
                                                                    
																	<input type="text" class="form-control" id="instifee" name="instifee_<?php echo($rCount); ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onfocus="textvalidate(this.id,'emis_insti_alert');" onchange="textvalidate(this.id,'emis_insti_alert');sumofall(this.parentNode.parentNode);" required/>
																	<div id="emis_insti_alert" style="color:#dd4b39;"></div>
																</th>
                                                                <th>
																	<input type="text" class="form-control" id="tutfee" name="tutfee_<?php echo($rCount); ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onfocus="textvalidate(this.id,'emis_tut_alert');" onchange="textvalidate(this.id,'emis_tut_alert');sumofall(this.parentNode.parentNode);" required/>
																	<div id="emis_tut_alert" style="color:#dd4b39;"></div>
																</th>
                                                                <th>
																	<input type="text" class="form-control" id="regularfee" name="regularfee_<?php echo($rCount); ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onfocus="textvalidate(this.id,'emis_reg_alert');" onchange="textvalidate(this.id,'emis_reg_alert');sumofall(this.parentNode.parentNode);" required/>
																	<div id="emis_reg_alert" style="color:#dd4b39;"></div>
																</th>
                                                                <th>
																	<input type="text" class="form-control" id="transfee" name="transfee_<?php echo($rCount); ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onfocus="textvalidate(this.id,'emis_trans_alert');" onchange="textvalidate(this.id,'emis_trans_alert');sumofall(this.parentNode.parentNode);" required/>
																	<div id="emis_trans_alert" style="color:#dd4b39;"></div>
																</th>
                                                                <th>
																	<input type="text" class="form-control" id="annualfee" name="annualfee_<?php echo($rCount); ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onfocus="textvalidate(this.id,'emis_annual_alert');" onchange="textvalidate(this.id,'emis_annual_alert');sumofall(this.parentNode.parentNode);" required/>
																	<div id="emis_annual_alert" style="color:#dd4b39;"></div>
																</th>
                                                                <th>
																	<input type="text" class="form-control" id="bookfee" name="bookfee_<?php echo($rCount); ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onfocus="textvalidate(this.id,'emis_bookfee_alert');" onchange="textvalidate(this.id,'emis_bookee_alert');sumofall(this.parentNode.parentNode);" required/>
																	<div id="emis_bookfee_alert" style="color:#dd4b39;"></div>
																</th>
                                                                <th>
																	<input type="text" class="form-control" id="labfee" name="labfee_<?php echo($rCount); ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onfocus="textvalidate(this.id,'emis_labfee_alert');" onchange="textvalidate(this.id,'emis_labfee_alert');sumofall(this.parentNode.parentNode);" required/>
																	<div id="emis_labfee_alert" style="color:#dd4b39;"></div>
																</th>
                                                                <th>
																	<input type="text" class="form-control"  id="otherfee" name="otherfee_<?php echo($rCount); ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onfocus="textvalidate(this.id,'emis_otherfee_alert');" onchange="textvalidate(this.id,'emis_otherfee_alert');sumofall(this.parentNode.parentNode);" required/>
																	<div id="emis_otherfee_alert" style="color:#dd4b39;"></div>
																</th>
                                                                <th>
																	<input type="text" class="form-control" id="totfee" name="totfee_<?php echo($rCount); ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onfocus="textvalidate(this.id,'emis_totfee_alert');" onchange="textvalidate(this.id,'emis_totfee_alert');" readonly="readonly" required/>
																	<div id="emis_totfee_alert" style="color:#dd4b39;"></div>
																</th>
                                                            </tr>
                                                            <?php
                                                                    $rCount++; 
                                                                }
                                                            ?> 
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
</body>
</html>