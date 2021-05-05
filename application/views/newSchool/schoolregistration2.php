<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('head.php'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'asset/css/support/brdcum-magesh.css';?>"></link>
</head>

<body class="page-container-bg-solid page-md">
    <div class="page-wrapper">
        <div class="page-wrapper-row">
                <div class="page-wrapper-top">
                    <!-- BEGIN HEADER -->
                    <div class="page-header" style="height: 80px;">
                        <!-- BEGIN HEADER TOP -->
                        <div class="page-header-top">
                            <div class="container">
                                <!-- BEGIN LOGO -->
                                <div class="page-logo" style="min-width:50%;font-size: 18px;">
                                    <a href="<php echo base_url(); ?>">
                                        <img src="<?php echo base_url().'asset/pages/img/emis_logo.png';?>"  style="height: 100%;margin:0px;"  alt="logo" class="logo-default">
                                    </a>
                                </div>
                                 <div class="top-menu">
                                    <ul class="nav navbar-nav pull-right">
                                        
                                            <li><a onclick="location.href='<?php echo base_url().'';?>'">Logout</a></li>
                                            
                                            <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
                                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                              <span class="square"><font style="color:#dd4b39;">*</font> Note: Fill the Details carefully.</span>
                                            </a>
                                            </li>
                                            </ul>
                                            </div>
                                            
                                            
                                
                                
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                        <!-- BEGIN CARDS -->
                                        <div class="row">
                                        
                                             <div class="portlet-body">
                                             
                                              
                                                <div class="row">
                                                    <div class="col-md-12">
                                                    
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                              
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i>New School Registration Form</span>
                                                        </div>
                                                        <div class="tools"> </div>
                                                        
                                                    </div>
                                                        <div class="portlet-body">
                                                            <?php $this->load->view('newSchool/supportHeader'); ?>
                                                             <!-- BEGIN FORM-->
                                                             <div class="portlet-title">
                                                                <div class="caption col-md-12">
                                                                 <i class="fa fa-building font-dark"></i>
                                                                    <span class="caption-subject font-dark sbold uppercase">School Renewal Details - III</span>
                                                                    
                                                                </div>
                                                               
                                                            </div>
                                                             <form class="form-horizontal" id="schoolnew_register2" name="schoolnew_register2" onsubmit="event.preventDefault();return popup(this);" action="<?php echo base_url().'Newschool/formsubmit/'.$this->uri->segment(3,0);?>" enctype="multipart/form-data" method="post">
                                                                    <?php
                                                                        if($profile[0]['part_3']==1){
                                                                    ?> 
                                                                    <div class="col-md-9">
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                    <div class="form-group">
                                                                         <button type="button" id="btnedit" class="btn btn-primary" onclick="postRequest(createJSON(this.form),'<?php echo base_url().'Registration/getPartInformationByPost/'.$this->uri->segment(4,0);?>',this.form);">VIEW/EDIT</button>
                                                                    </div>
                                                                    </div>
                                                                 <?php } ?>
                                                                <div class="form-body">
                                                         
                                                                 <div class="row">
                                                                 
                                                                <!--/span-->
                                                                
                                                              <!--/span-->
                                                            </div>
                                                            
                                                            <table class="table">
                                                                <tr>
                                                                    <td colspan="2" class="bg-info"><b><i class="fa fa-cog fa-spin"></i> School Certificates Details</b>
                                                                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span>Whether Educational Agency proposes to open a New School in the Premises with Building</span></td>
                                                                    <td><input type="radio" name="with_premises" value="1" id="with_premises1" onchange="uploadcerticheck(this.value)" /><label for="with_premises1">&nbsp;Yes&nbsp;</label>
                                                                    <input type="radio" name="with_premises" value="0" checked id="with_premises2" onchange="uploadcerticheck(this.value)" /><label for="with_premises2">&nbsp;No&nbsp;</label></td>
                                                                </tr>
                                                            </table>
                                                            <div id="uploadcertificates">
                                                            <h5 style="color:#dd4b39;">Note: 1). File format: Upload file only for .jpeg/.jpg/.pdf/.doc/.docx extension. 2).File size Limit 0.8MB to each file. 3).Multiple File should not more than 800KB for each file.</h5>
                                                            <input type="hidden" id="hiddenrenewalfiles_0" name="hiddenrenewalfiles_0" value="schoolnew_renewalfiles"/>
                                                            
                                                            <?php 
                                                            $c = count($certificate);
                                                            for($i=0;$i<$c;$i=$i+2) { ?>    
                                                                <div class="row">
                                                                   <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">
                                                                                <?php echo $certificate[$i]['certificatename']; ?> <?php if($certificate[$i]['required'] == 1) { ?><font style="color:#dd4b39;">*</font><?php } ?>
                                                                            </label>
                                                                            <div class="col-md-8">
                                                                                <input type="file" class="form-control" id="certificate_<?php echo $certificate[$i]['id']; ?>" name="certificate_<?php echo $certificate[$i]['id']; ?>[]" multiple="multiple" <?php if($certificate[$i]['required'] == 1){echo('required="required"');$hasreq.="certificate_".$certificate[$i]['id'].",";} ?> accept=".jpg,.jpeg,.doc,.docx,.pdf" onchange="ExtSize(this.id,'buildstabalert');"/>
                                                                                <font style="color:#dd4b39;" id="buildstabalert"></font>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php if(($i+1)< $c){?>
                                                                     <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">
                                                                                <?php echo $certificate[$i+1]['certificatename']; ?>  <?php if($certificate[$i+1]['required'] == 1) { ?><font style="color:#dd4b39;">*</font><?php } ?>
                                                                            </label>
                                                                            <div class="col-md-8">
                                                                                <input type="file" class="form-control" id="certificate_<?php echo $certificate[$i+1]['id']; ?>" name="certificate_<?php echo $certificate[$i+1]['id']; ?>[]" multiple="multiple" <?php if($certificate[$i+1]['required'] == 1){echo('required="required"');$hasreq.="certificate_".$certificate[$i+1]['id'].",";} ?> accept=".jpg,.jpeg,.doc,.docx,.pdf" onchange="ExtSize(this.id,'buildlicalert');"/>
                                                                                <font style="color:#dd4b39;" id="buildlicalert"></font>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php }?>
                                                                </div>
                                                                 <?php } ?>
                                                            </div>
                                                            
                                                            <input type="hidden" id="hiddendoc_0" name="hiddendoc_0" value="newschool_documententry"/>
                                                            <table class="table">
                                                                <tr>
                                                                    <td>Document No.<font style="color:#dd4b39;">*</font></td>
                                                                    <td>Survey No.<font style="color:#dd4b39;">*</font></td>
                                                                    <td>Place of Registration<font style="color:#dd4b39;">*</font></td>
                                                                    <td>Date of Registration<font style="color:#dd4b39;">*</font></td>
                                                                    <td>Add (+)   Delete(-)</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <input type="text" class="form-control" id="docno_0" name="docno_0" placeholder="Document No" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required"/>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id="surveyno_0" name="surveyno_0" maxlength="6" placeholder="Eg: 24/24A" required="required"/>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id="placereg_0" name="placereg_0" placeholder="Land register place" required="required"/>
                                                                    </td>
                                                                    <td>
                                                                        <input type="date" class="form-control" id="datereg_0" name="datereg_0" max="<?php echo (date('Y-m-d',strtotime('now')));?>" required="required"/>
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" class="btn" id="btndocno_0" onclick="callTwoFunctions(this.parentNode.parentNode,1);" ><i class="fa fa-plus"></i></button>
                                                                        <button type="button" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,0);" ><i class="fa fa-minus"></i></button>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            
                                                           
                                                            <table class="table">
                                                                <tr>
                                                                    <td class="bg-info"><b><i class="fa fa-inr"></i> School Fund Details</b>
                                                                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                                                                    </td>
                                                                    
                                                                </tr>
                                                                
                                                            </table>
                                                                <h4>Endowment Fund Details</h4>
                                                              <div class="row">
                                                               <div class="col-md-5">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-6">
                                                                            Name of the Bank deposited <font style="color:#dd4b39;">*</font>
                                                                        </label>
                                                                        <div class="col-md-6">
                                                                            <select class="form-control" id="endow_bank_id" name="endow_bank_id" required="required">
                                                                                <option value="">Choose</option>
                                                                                <?php foreach($bank as $bnk) {?>
                                                                                    <option value="<?php  echo $bnk['id']; ?>"><?php echo $bnk['bank']; ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                 <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-6">
                                                                            Amount (in Rs.) <font style="color:#dd4b39;">*</font>
                                                                        </label>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control" id="endow_amt" name="endow_amt" maxlength="7" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Date of Deposit<font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-8">
                                                                            <input type="date" class="form-control" id="endow_date_deposit" name="endow_date_deposit" max="<?php echo (date('Y-m-d',strtotime('now'))); ?>" required="required"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                            <div class="row">
                                                               <div class="col-md-5">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Date of Maturity <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-8">
                                                                            <input type="date" class="form-control" id="endow_date_maturity" name="endow_date_maturity" min="<?php echo (date('Y-m-d',strtotime('now'))); ?>" required="required"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                 <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Bank Certificate Number <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" id="endow_certif" name="endow_certif" maxlength="20" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <h4>Corpus Fund Details</h4>
                                                              <div class="row">
                                                               <div class="col-md-5">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-6">
                                                                            Name of the Bank deposited <font style="color:#dd4b39;">*</font>
                                                                        </label>
                                                                        <div class="col-md-6">
                                                                            <select class="form-control" id="corp_bank_id" name="corp_bank_id" required="required">
                                                                                <option value="">Choose</option>
                                                                                <?php foreach($bank as $bnk) {?>
                                                                                    <option value="<?php  echo $bnk['id']; ?>"><?php echo $bnk['bank']; ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                 <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-6">
                                                                            Amount (in Rs.) <font style="color:#dd4b39;">*</font>
                                                                        </label>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control" id="corp_amt" name="corp_amt" maxlength="7" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Date of Deposit<font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-8">
                                                                            <input type="date" class="form-control" id="corp_date_deposit" name="corp_date_deposit" max="<?php echo (date('Y-m-d',strtotime('now'))); ?>" required="required"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Account Number <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" id="corp_accno" maxlength="18" name="corp_accno" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <table class="table">
                                                                <tr>
                                                                    <td class="bg-info"><b><i class="fa fa-newspaper-o"></i> School Management Details</b>
                                                                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                                                                    </td>
                                                                    
                                                                </tr>
                                                                
                                                            </table>
                                                            
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <div class="form-group">
                                                                         <label class="control-label col-md-5">Name of the Management Trust <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-7">
                                                                            <input type="text" class="form-control" id="trust_name" name="trust_name" placeholder="Trust Name" required="required"/>
                                                                        </div>
                                                                   </div>
                                                                </div>
                                                                 <div class="col-md-4">
                                                                    <div class="form-group">
                                                                         <label class="control-label col-md-4">Address <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-8">
                                                                            <textarea class="form-control" id="trust_address" name="trust_address" required="required"></textarea>
                                                                        </div>
                                                                   </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                         <label class="control-label col-md-4">Pincode <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" id="trust_pincode" name="trust_pincode" maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required"/>
                                                                        </div>
                                                                   </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                
                                                                 <div class="col-md-4">
                                                                    <div class="form-group">
                                                                         <label class="control-label col-md-8">Is the trust registered? <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-4">
                                                                            <label>YES</label>&nbsp;<input type="radio" value="1" id="trust" name="trust" onchange="sbcshow2(this,'trustdetails');setRequiredField(this.value,'trustdate,trustplacereg','1');"  />
                                                                            <label>NO</label>&nbsp;<input type="radio" value="0" id="trust1" name="trust" onchange="sbcshow2(this,'trustdetails');setRequiredField(this.value,'trustdate,trustplacereg','1');" checked="checked"/>
                                                                        </div>
                                                                   </div>
                                                                </div>
                                                                
                                                                
                                                                <div class="col-md-4 trustdetails">
                                                                    <div class="form-group">
                                                                         <label class="control-label col-md-4">Date of Registration <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-8">
                                                                            <input type="date" class="form-control" id="trustdate" name="trustdate" max="<?php echo (date('Y-m-d',strtotime('now')));?>"/>
                                                                        </div>
                                                                   </div>
                                                                </div>
                                                                
                                                                <div class="col-md-4 trustdetails">
                                                                    <div class="form-group">
                                                                         <label class="control-label col-md-4">Place of Registration <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" id="trustplacereg" name="trustplacereg"/>
                                                                        </div>
                                                                   </div>
                                                                </div>
                                                                
                                                                
                                                            </div>
                                                            
                                                            <h4>Name of other institutions to which the Management of Trust running</h4>
                                                            <input type="hidden" id="hiddentrustmgt_0" name="hiddentrustmgt_0" value="newschool_trustentry"/>
                                                            <table class="table">
                                                                <tr>
                                                                    <td>Name of Institution <font style="color:#dd4b39;">*</font></td>
                                                                    <td>Place <font style="color:#dd4b39;">*</font></td>
                                                                    <td>Add (+)   Delete(-)</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="text" class="form-control" id="trustname_0" name="trustname_0" required="required" /></td>
                                                                    <td><input type="text" class="form-control" id="trustplace_0" name="trustplace_0" required="required" /></td>
                                                                    <td>
                                                                        <button type="button" class="btn" id="btntrustname_0" onclick="callTwoFunctions(this.parentNode.parentNode,1);" ><i class="fa fa-plus"></i></button>
                                                                        <button type="button" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,0);" ><i class="fa fa-minus"></i></button>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            
                                                           
                                                            <table class="table">
                                                                <tr>
                                                                    <td class="bg-info"><b><i class="fa fa-book"></i> School Application Fee Details</b>
                                                                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                                                                    </td>
                                                                    
                                                                </tr>
                                                                
                                                            </table>
                                                            <table class="table">
                                                                <tr>
                                                                    <td>Amount to be paid <font style="color:#dd4b39;">*</font></td>
                                                                    <td>Challan No <font style="color:#dd4b39;">*</font></td>
                                                                    <td>Challan Date <font style="color:#dd4b39;">*</font></td>
                                                                    <td>IFSC <font style="color:#dd4b39;">*</font></td>
                                                                    <td></td>
                                                                    <td>Upload Challan <font style="color:#dd4b39;">*</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="text" class="form-control" id="feeamount_0" name="amount" maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required"/></td>
                                                                    <td><input type="text" class="form-control" id="feechallanno_0" name="challan_no" maxlength="18" required="required"/></td>
                                                                    <td><input type="date" class="form-control" id="feechallandate_0" name="challan_date" required="required"/></td>
                                                                    <td><input type="text" class="form-control" id="feeifsccode_0" maxlength="15" name="ifsc_code" onblur="return ifscsearch(this,this.parentNode.nextElementSibling);" pattern="[SBINsbin0-9]{11}" required="required"/></td>
                                                                    <td id="ifscfetch_0"></td>
                                                                    <td>
                                                                        <input type="file" class="form-control" id="feechallanpath_1" name="challan_filepath" accept=".jpg,.jpeg,.doc,.docx,.pdf" onchange="ExtSize(this.id,'feechallanalert');" required="required"/>
                                                                        <font style="color:#dd4b39;" id="feechallanalert"></font>
                                                                    </td>
                                                                    <input type="hidden" id="applied_category" name="applied_category" value="4"/>
                                                                </tr>
                                                            </table>
                                                          
                                                         
                                                         
                                                         </div>
                                                         <input type="hidden" name="createddate" id="createddate" value="">
                                                        <div class="form-actions text-center" >
                                                             <button type="button" onclick="location.href='<?php echo base_url().'Newschool/new_school/4';?>'" class="btn btn-success">Previous</button>
												            <button type="submit" class="btn btn-primary">Submit</button>
                                                            <button type="button" onclick="location.href='<?php echo base_url().'';?>'" class="btn default">Cancel</button>
                                                            <?php if($profile[0]['part_3']==1){
                                                            ?> 
                                                            <button type="button" onclick="location.href='<?php echo base_url().'Newschool/new_school/6';?>'" class="btn default">Next</button>
                                                            <?php } ?>
                                                        </div>
                                                             
                                                             </form>
                                                      
                                                        </div>
                                                    
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
    </div>
                     <?php $this->load->view('footer.php'); ?>
                     <?php $this->load->view('scripts.php'); ?>
                     <script src="<?php echo base_url().'asset/js/vivekrao/jsonpost.js';?>" type="text/javascript"></script>
</body> 

<script>
/*******************************************************************
Function done by Magesh 20-02-2019
********************************************************************/

    <?php
        if($renew[0]['applied_category']==5){
            $aug=1;
            $set=1;
        }else{
            $aug=0;$set=0;
        }
    ?>
    uploadcerticheck(<?php echo($aug.','.$set); ?>);
    function ExtSize(id,alertidcorrect){
          var a = document.getElementById(id); 
          var c = document.getElementById(alertidcorrect);
          var allowfile = a.value;
          var allowExtension = /(\.jpg|\.jpeg|\.doc|\.docx|\.pdf)$/i;
          if(!allowExtension.exec(allowfile)) {
                a.value='';
                c.innerHTML="Please upload file only for .jpeg/.jpg/.pdf/.doc/.docx extension <br>";
                return false;
            }else {
                 c.innerHTML = "";
            } 
             if(a.files.length > 0){
                for(var i=0; i<=a.files.length -1;i++)
                var fsize = a.files.item(i).size;
                    if((fsize > 8000000)){
                        c.innerHTML+='File size too Big. Limit 8MB to each file';
                        a.value='';
                    }
            }else {
                 c.innerHTML = "";
            }
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
                                alert("Not Valid IFSC Code - Eg.:SBIN0000930");
                                node.value="";
                                rtmnode.innerHTML='';
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
                alert("Not Valid IFSC Code - Eg.:SBIN0000930");
                node.value="";
                rtmnode.innerHTML='';
                return false;
            }
        }
    
    
        sbcshow2(document.getElementById('trust1'),'trustdetails');
    
    
    function sbcshow2(sbc,classname) {
        var x = document.getElementsByClassName(classname);
        if(sbc.value == 0 || sbc.value == '') {
            for(var i=0;i<x.length;i++) {
                x[i].style.visibility='hidden';
            }
        } else {
            for(var i=0;i<x.length;i++) {
                x[i].style.visibility='';
            }
        }
    }
    
    function callTwoFunctions(node,check){
            if(check==1){
                if(createRow(node))
                    showOthersText(node);
            }
            else{
                if(deleteRow(node))
                    showOthersText(node);
            }
    }
    
    function createRow(node){
            if(onScriptAddRowValidation(node)){
                var nodeInner=node.innerHTML;
                var tr=document.createElement('tr');
                tr.innerHTML=nodeInner;
                changeIdandName(node.parentNode);
                node.parentNode.appendChild(tr);
                return changeIdandName(node.parentNode);
            }
            else{
                alert('All Values Are Required!');
            }
    }
    
    function onScriptAddRowValidation(node){
    var ret=true,opt='';
    //alert(node.children.length);
    if(node.nextElementSibling!=null)
        return false;
    for(var i=0;i<node.children.length-1;i++){
        if(node.children[i].children[0] instanceof HTMLDivElement)
            opt=NodeDeepChildren(node.children[i].children[0]);
        else{
            opt=NodeDeepChildren(node.children[i]);
        }
        if(!opt)
            ret=opt;
    }
    if(ret)
        return true;
    else
        return false;
    }
    
    function NodeDeepChildren(node){
        //alert(node);
    var ret=true;
    for(var i=0;i<node.children.length;i++){
       // alert(node.children[i].id+'===='+checkInstanceof(node.children[i]) +' && '+ node.children[i].hasAttribute("required"));
        if(checkInstanceof(node.children[i]) && node.children[i].hasAttribute("required")){
            var st=window.getComputedStyle(node.children[i]);
            if(st.visibility!='hidden'){
                if(node.children[i].value=='' || node.children[i].value=='00:00' || node.children[i].value==0){
                    ret=false;
                }    
            }
        }
    }
    //alert(ret);
    return ret;
    }
    
    function checkInstanceof(element){
            if(element instanceof HTMLSelectElement)
                return true;
            else if(element instanceof HTMLInputElement)
                return true;
            else if(element instanceof HTMLButtonElement)
                return true;
            else if(element instanceof HTMLFormElement)
                return true;
            else if(element instanceof HTMLTextAreaElement)
                return true;
            else
                return false;
    }
    
    
    function deleteRow(node){
            var par=node.parentNode;
            //alert(par.children.length);
            //alert(par);
            if(par.children[0].children[0].hasAttribute('colspan') && !checkInstanceof(par.children[1].children[0].children[0])){
                if(par.children.length > 3)
                    par.removeChild(node);
                else
                    alert('Atlease 1 Should Be Entered');
            }else{
                //alert(par.children[1].children[0].children[0]);
                if(par.children.length >= 2){
                    if(checkInstanceof(par.children[1].children[0].children[0])){
                        if(par.children.length > 2)
                            par.removeChild(node);
                        else
                            alert('Atlease 1 Should Be Entered');
                    }
                     else{
                        if(par.children.length > 1)
                            par.removeChild(node);
                        else
                            alert('Atlease 1 Should Be Entered``');
                    }
                }
                else{
                    if(par.children.length > 1)
                        par.removeChild(node);
                    else
                        alert('Atlease 1 Should Be Entered!!!!!!!!!!!!');
                }
                
            }
            return changeIdandName(par);
        }
        
        function changeIdandName(node){
            //alert(node);
            var tRowCount=0,z=0,checkbit=0;
            for(var tr=0;tr<node.children.length;tr++){
                var trChild=node.children[tr];
                for(var th=0;th<trChild.children.length;th++){
                    var inputElement=trChild.children[th];
                    inputElement.hasAttribute('id')?(inputElement.id=inputElement.id.split('_')[0]+'_'+tRowCount):'';
                    for(var input=0;input<inputElement.children.length;input++){
                        if(checkInstanceof(inputElement.children[input])){
                            var inputid=inputElement.children[input].id;
                            var id=inputid.split('_');
                            if(inputElement.children[input].getAttribute('type')=='radio'){
                                if(z==0){
                                    inputElement.children[input].id=id[0]+'_'+(tRowCount);
                                    inputElement.children[input].name=id[0]+'_'+(tRowCount);
                                    z=tRowCount;
                                }
                                else{
                                    inputElement.children[input].id=id[0]+'_'+(z+1);
                                    inputElement.children[input].name=id[0]+'_'+(tRowCount);
                                    z=0;
                                }
                                //alert(inputElement.children[input].checked);
                            }
                            else{
                                inputElement.children[input].id=id[0]+'_'+(tRowCount);
                                inputElement.children[input].name=id[0]+'_'+(tRowCount); 
                                //alert(inputElement.children[input].id);  
                            }
                            checkbit=1;
                        }
                        else if(inputElement.children[input] instanceof HTMLDivElement){
                            nodeDeepChildren(inputElement.children[input],tRowCount);
                        }
                    }
                }
                tRowCount=checkbit!=0?(tRowCount=tRowCount+1):tRowCount;
                checkbit=0;
            }
            return true;
        }
    
    
    
    
    
    function showOthersText(node,sel=1,val=0){
            //alert(node.children[sel].id);
            if(node.children[sel].hasAttribute('id')){
                var id=node.children[sel].id.split('_');
                if(node.children[val].children[0].value==-1 || node.children[val].children[0].value==15){
                    if(node.children[val].children[0].options[node.children[val].children[0].selectedIndex].innerHTML=='NGO' && node.children[val].children[0].value==15)
                        document.getElementById(id[0]+'_'+id[1]).style.visibility='';
                    else if(node.children[val].children[0].value==-1)
                        document.getElementById(id[0]+'_'+id[1]).style.visibility='';
                }
                else{
                    document.getElementById(id[0]+'_'+id[1]).style.visibility='hidden';
                }
            }
			/*else{
				alert('hi');
				}*/
    }
    
    function setmindate(currentnode,setnode,year) {
        var dob = new Date(currentnode.value);
        var dobsp = currentnode.value.split('-');
        var doj = (dob.getFullYear()+ year)+'-'+dobsp[1]+'-'+dobsp[2];
        document.getElementById(setnode).setAttribute('min',doj);
        }
    
    
    function getalldetails(currentElement,targetElement,value,url,segment) {
        //alert("Current Element="+ currentElement +"TargetElement="+ targetElement +"Value="+ value +"url="+ url +"segment="+ segment);
     var management = currentElement.name;
      $.ajax({
            type: "POST",
            url:url+segment,
            data:"&"+management+"="+currentElement.value,
            success: function(resp){
               if($("#"+targetElement).attr('type')=='select'){
               }
               else{
                 $("#"+targetElement).html(resp);
                
               }  
               return true;   
            }
            });
     
    }
    
    
    function popup(node){
            //alert('Click Submit');
            document.getElementById('createddate').value = new Date().toISOString(); 
            swal({
                 title: "Are you sure?",
                 text: "You Have Validated The Form",
                 type: "warning",
                 showCancelButton: true,
                 confirmButtonColor: "#DD6B55",
                 confirmButtonText: "Yes, Save!",
                 closeOnConfirm: false,
                 showLoaderOnConfirm: true
            },function(isConfirm){
                if(isConfirm){
                    
                    //swal("OK", "SCHOOL LAND DETAILS - II Saved Successfully", "success");
                    node.submit();
                }else{
                    swal("Cancelled", "Your cancelled the profile1", "error");
                    return false;
                }
            });	
    }
    
    
    function uploadcerticheck(nval=0,fset=0){
        var hsreq="<?php echo($hasreq); ?>";
        var hssp=hsreq.split(',');
        var cnt=<?php echo($c); ?>
        //alert(hssp[hssp.length-2]);
        if(parseInt(nval)){
            document.getElementById("uploadcertificates").style.display="block";
            document.getElementById("applied_category").value=4;
            for(var i in hssp){
                if(hssp[i]!="")
                    document.getElementById(hssp[i]).setAttribute("required","required");
            }
            for(var i=1;i<=cnt;i++){
                document.getElementById('certificate_'+i).removeAttribute("disabled");
            }
            
        }else{
            document.getElementById("uploadcertificates").style.display="none";
            document.getElementById("applied_category").value=5;
            for(var i in hssp){
                if(hssp[i]!="")
                    document.getElementById(hssp[i]).removeAttribute("required");
            }
            for(var i=1;i<=cnt;i++){
                document.getElementById('certificate_'+i).setAttribute("disabled","disabled");
            }
            
        }
        if(fset){
            var with_premisis=document.getElementsByName('with_premises');
            for(var i in with_premisis){
                if(checkInstanceof(with_premisis[i])){
                    with_premisis[i].setAttribute("disabled","disabled");
                }
            }
            with_premisis[0].checked=true;
        }
    }
    
     
    function setRequiredField(baseValue,enableids,whichValue){
        //alert('Set Required'+'==='+baseValue+'  '+enableids+'  '+whichValue);
        var wValue=whichValue.split(",");
        var ids=enableids.split(",");
        var i,id,checkbit=0;
        for(i in wValue){
            //alert(wValue[i]);
            if(baseValue==wValue[i]){
                //alert(Array.isArray(ids));
                for(id in ids){
                    if(document.getElementById(ids[id])!=null)
                        document.getElementById(ids[id]).setAttribute('required','required');
                }
                checkbit=1;
            }
        }
        
        if(checkbit==0){
            for(id in ids){
                if(document.getElementById(ids[id])){
                    document.getElementById(ids[id]).removeAttribute('required');
                    document.getElementById(ids[id]).value='';
                }
            }
        }
    }

/*******************************************************************
        Function ended
********************************************************************/

</script>
</html>
