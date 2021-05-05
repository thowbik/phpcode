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
                                                            <div class="portlet-title">
                                                                <div class="caption col-md-12">
                                                                 <i class="fa fa-building font-dark"></i>
                                                                    <span class="caption-subject font-dark sbold uppercase">School Basic Details - I</span>
                                                                    
                                                       
                                                      
                                                                </div>
                                                                 
                                                            </div>
                                                             <!-- BEGIN FORM-->
                                                             <form class="form-horizontal" id="schoolnew_register" name="schoolnew_register" onsubmit="event.preventDefault();return popup(this);" action="<?php echo base_url().'Newschool/formsubmit/'.$this->uri->segment(3,0);?>" method="post">
                                                                    <input type="hidden" id="chaingaddress" value="district_id,block_id,urbanrural,local_body_type_id,village_panchayat_id,vill_habitation_id,assembly_id,parliament_id,edu_dist_id,manage_cate_id,sch_management_id,sch_directorate_id" />
                                                                    <?php
                                                                    //print_r($profile);
                                                                    if($profile[0]['part_1']==1){
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
                                                              
														      	<div class="col-md-12">
																    <div class="form-group">
															     	   <label class="control-label col-md-2"><b>Name of the School</b> <font style="color:#dd4b39;">*</font></label>
															           <div class="col-md-10">
																         <input type="text" class="form-control" id="school_name" name="school_name" onchange="textvalidate(this.id,'schoolnamealert')" required="required" onfocus="textvalidate(this.id,'schoolnamealert')" placeholder="Name of the School" maxlength="60" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" onkeyup='this.value=this.value.toUpperCase();' value="<?php echo $schooldetails[0]['school_name'];?>" autocomplete="off"  >
															     	     <font id="schoolnamealert" style="color:#dd4b39;"></font>
																       </div>
																
																    </div>
																
															    </div>
                                                               
                                                                <!-- <div class="form-group col-md-12">
                                                                    <div class="col-md-4">
															     	   <label class="text-center">Select Management Category <font style="color:#dd4b39;">*</font></label>
																         <select class="form-control" id="manage_cate_id" name="manage_cate_id" onfocus="textvalidate(this.id,'manacatalert')"  onchange="textvalidate(this.id,'manacatalert'),getalldetails(this,'sch_management_id',this.value,'<?php echo base_url() ?>Registration/getalldetails/',0);" >
                                                                         <option value="">Choose</option>
                                                                         <option value="2">Fully Aided</option>
                                                                         <option value="3">Un-aided</option>
                                                                         <option value="4" >Partially Aided</option>
                                                                         </select>
															     	     <font id="manacatalert" style="color:#dd4b39;"></font>
                                                                    </div>
                                                                     <div class="col-md-4">
                                                                        <label class="text-center">Select Management <font style="color:#dd4b39;">*</font></label>
																         <select class="form-control" id="sch_management_id" name="sch_management_id" onfocus="textvalidate(this.id,'managealert');" onchange="textvalidate(this.id,'managealert');getalldetails(this,'sch_directorate_id',this.value,'<?php echo base_url() ?>Registration/getalldetails/',1);" >
                                                                             
                                                                         </select>
															     	     <font style="color:#dd4b39;" id="managealert"></font>
                                                                     </div>
                                                                     <div class="col-md-4">
                                                                        <label class="text-center">Select Directorate <font style="color:#dd4b39;">*</font></label>
																         <select class="form-control" id="sch_directorate_id" name="sch_directorate_id" onchange="textvalidate(this.id,'affilalert');" onfocus="textvalidate(this.id,'affilalert');" >
                                                                         </select>
															     	     <font style="color:#dd4b39;" id="affilalert"></font>
                                                                     </div>
                                                                    
                                                                </div>-->
                                                                
                                                                 
                                                                <!--/span-->
                                                                
                                                              <!--/span-->
                                                            </div>
                                                            <table class="table">
                                                                <tr>
                                                                    <td class="bg-info"><b><i class="fa fa-map-marker"></i> Location Details</b>
                                                                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                                                                    </td>
                                                                    
                                                                </tr>
                                                                
                                                            </table>
                                                             
                                                            <div class="row">
														      	<div class="col-md-3">
																    <div class="form-group">
															     	   <label class="control-label col-md-6" style="text-align: left;">District <font style="color:#dd4b39;">*</font></label>
															           <div class="col-md-12">
																         <select class="form-control" id="district_id" name="district_id" onfocus="textvalidate(this.id,'districtalert')" onchange="textvalidate(this.id,'districtalert');getalldetails(this,'block_id',this.value,'<?php echo base_url() ?>Registration/getalldetails/',2)" required="required">
                                                                         <option value="">Choose</option>
                                                                         <?php foreach($schooldist as $dist) {?>
                                                                         <option value="<?php echo $dist->id;?>" ><?php echo $dist->district_name;?></option>
                                                                         <?php }?>
                                                                         </select>
															     	     <font style="color:#dd4b39;" id="districtalert"></font>
																       </div>
																
																    </div>
																
															    </div>
															
                                                                <!--/span-->
                                                                <div class="col-md-3">
                                                                   <div class="form-group">
                                                                    <label class="control-label col-md-6" style="text-align: left;">Block <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-12">
                                                                            <select class="form-control" id="block_id" name="block_id" onchange="textvalidate(this.id,'blockalert');" onfocus="textvalidate(this.id,'blockalert');"  required="required">
                                                                                <option value="">Choose</option>
                                                                            </select>
																    	    <font style="color:#dd4b39;" id="blockalert"></font>
                                                                        </div>
                                                                  </div>
                                                               </div>
                                                              <!--/span-->
                                                              
                                                               <div class="col-md-3">
                                                                   <div class="form-group">
                                                                    <label class="control-label col-md-6" style="text-align: left;">Urban/Rural <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-12">
                                                                        <select id="urbanrural" name="urbanrural" class="form-control" onfocus="textvalidate(this.id,'urbanruralalert');" onchange="getalldetails(this,'local_body_type_id',this.value,'<?php echo base_url() ?>Registration/getalldetails/',3,'district_id='+document.getElementById('district_id').value);textvalidate(this.id,'urbanruralalert')" required="required">
                                                                            <option value="">Choose</option>
                                                                            <option value="1">RURAL</option>
                                                                            <option value="2">URBAN</option>
                                                                        </select>
                                                                            
																    	    <font style="color:#dd4b39;" id="urbanruralalert"></font>
                                                                        </div>
                                                                  </div>
                                                               </div>
                                                               
                                                                <div class="col-md-3">
                                                                   <div class="form-group">
                                                                    <label class="control-label col-md-6" style="text-align: left;">Local Body <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-12">
                                                                            <select class="form-control" id="local_body_type_id" name="local_body_type_id" onfocus="textvalidate(this.id,'localbodyalert')"  onchange="textvalidate(this.id,'localbodyalert');getalldetails(this,'village_panchayat_id',this.value,'<?php echo base_url() ?>Registration/getalldetails/',4,'district_id='+document.getElementById('district_id').value);" required="required">
                                                                                <option value="">Choose</option>
                                                                            </select>
																    	    <font style="color:#dd4b39;" id="localbodyalert"></font>
                                                                        </div>
                                                                  </div>
                                                               </div>
                                                              
                                                              
                                                            </div>
                                                            
                                                            
                                                            
                                                            <div class="row">
														      	<div class="col-md-3">
																    <div class="form-group">
															     	   <label class="control-label col-md-12" style="text-align: left;">Village/Town/Municipality <font style="color:#dd4b39;">*</font></label>
															           <div class="col-md-12">
																         <select class="form-control" id="village_panchayat_id" name="village_panchayat_id" onfocus="textvalidate(this.id,'villagetownalert')" onchange="textvalidate(this.id,'villagetownalert');getalldetails(this,'vill_habitation_id',this.value,'<?php echo base_url() ?>Registration/getalldetails/',5,'block_id='+document.getElementById('block_id').value);" required="required">
                                                                         <option value="">Choose</option>
                                                                         </select>
															     	     <font style="color:#dd4b39;" id="villagetownalert"></font>
																       </div>
																
																    </div>
																
															    </div>
															
                                                                <!--/span-->
                                                                <div class="col-md-3">
                                                                   <div class="form-group">
                                                                    <label class="control-label col-md-6" style="text-align: left;">Village/Ward <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-12">
                                                                            <select class="form-control" id="vill_habitation_id" name="vill_habitation_id" onfocus="textvalidate(this.id,'villagewardalert');" onchange="textvalidate(this.id,'villagewardalert');getalldetails(this,'assembly_id',this.value,'<?php echo base_url() ?>Registration/getalldetails/',6,'district_id='+document.getElementById('district_id').value);" required="required">
                                                                                <option value="">Choose</option>
                                                                            </select>
																    	    <font style="color:#dd4b39;" id="villagewardalert" ></font>
                                                                        </div>
                                                                  </div>
                                                               </div>
                                                              <!--/span-->
                                                              
                                                               <div class="col-md-3">
                                                                   <div class="form-group">
                                                                    <label class="control-label col-md-12" style="text-align: left;">Assembly Constituency <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-12">
                                                                            <select class="form-control" id="assembly_id" name="assembly_id" onfocus="textvalidate(this.id,'assemblyalert');" onchange="textvalidate(this.id,'assemblyalert');getalldetails(this,'parliament_id',this.value,'<?php echo base_url() ?>Registration/getalldetails/',7);" required="required">
                                                                                <option value="">Choose</option>
                                                                            </select>
																    	    <font style="color:#dd4b39;" id="assemblyalert"></font>
                                                                        </div>
                                                                  </div>
                                                               </div>
                                                               
                                                                <div class="col-md-3">
                                                                   <div class="form-group">
                                                                    <label class="control-label col-md-12" style="text-align: left;">Parliamentary Constituency <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-12">
                                                                            <select class="form-control" id="parliament_id" name="parliament_id" onfocus="textvalidate(this.id,'parliamentalert')" onchange="textvalidate(this.id,'parliamentalert');getalldetails(this,'edu_dist_id',this.value,'<?php echo base_url() ?>Registration/getalldetails/',8,'district_id='+document.getElementById('district_id').value);" required="required">
                                                                                <option value="">Choose</option>
                                                                            </select>
																    	    <font style="color:#dd4b39;" id="parliamentalert"></font>
                                                                        </div>
                                                                  </div>
                                                               </div>
                                                              
                                                              
                                                            </div>
                                                            
                                                            
                                                            
                                                            
                                                             <div class="row">
                                                                <div class="col-md-3">
                                                                   <div class="form-group">
                                                                    <label class="control-label col-md-12" style="text-align: left;">Educational District <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-12">
                                                                            <select class="form-control" id="edu_dist_id" name="edu_dist_id" onfocus="textvalidate(this.id,'edudistalert')" onchange="textvalidate(this.id,'edudistalert');" required="required">
                                                                                <option value="">Choose</option>
                                                                            </select>
																    	    <font style="color:#dd4b39;" id="edudistalert"></font>
                                                                        </div>
                                                                  </div>
                                                               </div>
                                                             
                                                                <div class="col-md-3">
                                                                   <div class="form-group">
                                                                    <label class="control-label col-md-6" style="text-align: left;">Address 1 <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control" id="addressline_1" name="addressline_1" placeholder="Address 1" maxlength="60" onchange="textvalidate(this.id,'addressalert');" onfocus="textvalidate(this.id,'addressalert');" autocomplete="off" required="required">
																    	    <font style="color:#dd4b39;" id="addressalert"></font>
                                                                        </div>
                                                                  </div>
                                                               </div>
                                                               
                                                               <div class="col-md-3">
                                                                   <div class="form-group">
                                                                    <label class="control-label col-md-6" style="text-align: left;">Address 2 <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control" id="addressline_2" name="addressline_2" placeholder="Address 2" maxlength="60" onchange="textvalidate(this.id,'address2alert');" onfocus="textvalidate(this.id,'address2alert');" autocomplete="off" required="required" >
																    	    <font style="color:#dd4b39;" id="address2alert"></font>
                                                                        </div>
                                                                  </div>
                                                               </div>
                                                             
                                                                <!--/span-->
                                                                <div class="col-md-3">
                                                                   <div class="form-group">
                                                                    <label class="control-label col-md-6" style="text-align: left;">Pincode <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Pincode" maxlength="6" onchange="pinvalidate(this.id,'pincodealert');" onfocus="pinvalidate(this.id,'pincodealert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  autocomplete="off" required="required">
																    	    <font style="color:#dd4b39;" id="pincodealert"></font>
                                                                        </div>
                                                                  </div>
                                                               </div>
                                                              <!--/span-->
                                                            </div>
                                                            
                                                            
                                                            
                                                             <table class="table">
                                                                <tr>
                                                                    <td class="bg-info"><b><i class="fa fa-phone"></i> Communication Details</b>
                                                                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                                                                    </td>
                                                                    
                                                                </tr>
                                                                
                                                            </table>
                                                             
                                                             
                                                              <div class="row">
														      	<div class="col-md-6">
																    <div class="form-group">
															     	   <label class="control-label col-md-3">School/Office STD Code <font style="color:#dd4b39;">*</font></label>
															           <div class="col-md-9">
																         <input type="text" class="form-control" id="school_stdcode" name="school_stdcode" onchange="textvalidate(this.id,'schoolstdalert');" onfocus="textvalidate(this.id,'schoolstdalert');" placeholder="STD Code" maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57" autocomplete="off" required="required" >
															     	     <font style="color:#dd4b39;" id="schoolstdalert"></font>
																       </div>
																
																    </div>
																
															    </div>
															
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                   <div class="form-group">
                                                                    <label class="control-label col-md-3">School/Office Landline <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" id="school_landline" name="school_landline" placeholder="Landline" onchange="textvalidate(this.id,'schlandalert');" onfocus="textvalidate(this.id,'schlandalert');" maxlength="8" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  autocomplete="off" required="required" >
																    	    <font style="color:#dd4b39;" id="schlandalert"></font>
                                                                        </div>
                                                                  </div>
                                                               </div>
                                                              <!--/span-->
                                                            </div>
                                                            
                                                            
                                                            <div class="row">
														      	<div class="col-md-6">
																    <div class="form-group">
															     	   <label class="control-label col-md-3">Correspondent/HM STD Code <font style="color:#dd4b39;">*</font></label>
															           <div class="col-md-9">
																         <input type="text" class="form-control" id="corr_hm_stdcode" name="corr_hm_stdcode" onchange="textvalidate(this.id,'corrstdalert')" onfocus="textvalidate(this.id,'corrstdalert');" placeholder="STD Code" maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57"   autocomplete="off"  required="required">
															     	     <font style="color:#dd4b39;" id="corrstdalert"></font>
																       </div>
																
																    </div>
																
															    </div>
															
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                   <div class="form-group">
                                                                    <label class="control-label col-md-3">Correspondent/HM LandLine <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" id="corr_hm_landline" name="corr_hm_landline" onchange="textvalidate(this.id,'corrlandalert');" onfocus="textvalidate(this.id,'corrlandalert')" placeholder="Landline" maxlength="8" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  autocomplete="off"  required="required">
																    	    <font style="color:#dd4b39;" id="corrlandalert"></font>
                                                                        </div>
                                                                  </div>
                                                               </div>
                                                              <!--/span-->
                                                            </div>
                                                            
                                                            
                                                            <div class="row">
														      	<div class="col-md-6">
																    <div class="form-group">
															     	   <label class="control-label col-md-3">School/Office Mobile <font style="color:#dd4b39;">*</font></label>
															           <div class="col-md-9">
																         <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" onchange="mobilevalidate(this.id,'offmobalert');" onfocus="mobilevalidate(this.id,'offmobalert');" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  autocomplete="off"  value="<?php echo $schooldetails[0]['mobile'];?>" required="required">
															     	     <font style="color:#dd4b39;" id="offmobalert"></font>
																       </div>
																
																    </div>
																
															    </div>
															
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                   <div class="form-group">
                                                                    <label class="control-label col-md-3">Correspondent/HM Mobile <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" id="corr_hm_mobile" name="corr_hm_mobile" onchange="mobilevalidate(this.id,'corrmobalert');" onfocus="mobilevalidate(this.id,'corrmobalert');" placeholder="Mobile" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  autocomplete="off" required="required" >
																    	    <font style="color:#dd4b39;" id="corrmobalert"></font>
                                                                        </div>
                                                                  </div>
                                                               </div>
                                                              <!--/span-->
                                                            </div>
                                                            
                                                            
                                                            
                                                             <div class="row">
														      	 <div class="col-md-6">
                                                                   <div class="form-group">
                                                                    <label class="control-label col-md-3">Email <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" id="email" name="email" onchange="emailvalidate(this.id,'emailalert');" onfocus="emailvalidate(this.id,'emailalert');" placeholder="Enter the Email" maxlength="30" autocomplete="off" value="<?php echo $schooldetails[0]['email'];?>" required="required">
																    	    <font style="color:#dd4b39;" id="emailalert"></font>
                                                                        </div>
                                                                  </div>
                                                               </div>
														
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                   <div class="form-group">
                                                                    <label class="control-label col-md-3">Website</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" id="website" name="website" onchange="websitevalidate(this.id,'websitealert');" onfocus="websitevalidate(this.id,'websitealert');" placeholder="Enter the website" maxlength="30" autocomplete="off"   >
																    	    <font style="color:#dd4b39;" id="websitealert"></font>
                                                                        </div>
                                                                  </div>
                                                               </div>
                                                              <!--/span-->
                                                            </div>
                                                             <table class="table">
                                                                <tr>
                                                                    <td class="bg-info"><b><i class="fa fa-map-marker"></i> School Details</b>
                                                                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                                                                    </td>
                                                                    
                                                                </tr>
                                                                
                                                            </table>
                                                            
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                   <div class="form-group">
                                                                    <label class="control-label col-md-12" style="text-align: left;">School Category <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-12">
                                                                            <select class="form-control" id="schoolcat" name="schoolcat" onchange="textvalidate(this.id,'catalert');" onfocus="textvalidate(this.id,'catalert');" required="required">
                                                                                <option value="">Choose</option>
                                                                                <?php foreach($schoolcategory as $dis){ if(($dis->id == 4) || ($dis->id==5)){ continue; } ?>                                                                                
                                                                                 <option value="<?php echo($dis->id)?>"><?php echo($dis->category_name)?></option>
                                                                                 <?php   }   ?>
                                                                            </select>
																    	    <font style="color:#dd4b39;" id="catalert"></font>
                                                                        </div>
                                                                  </div>
                                                               </div>
                                                             
                                                                <div class="col-md-3">
                                                                   <div class="form-group">
                                                                    <label class="control-label col-md-12" style="text-align: left;">Standard to be open From <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-12">
                                                                            <select class="form-control" id="low_class" name="low_class" onchange="textvalidate(this.id,'lowalert');" onfocus="textvalidate(this.id,'lowalert');" required="required">
                                                                                <option value="">Choose</option>
                                                                                <?php foreach($schoolclassstudying as $dis){if(($dis->id<=8) || (($dis->id>=13) && ($dis->id<=15))){ ?>
                                                                                 <option value="<?php echo($dis->id)?>"><?php echo($dis->class_studying)?></option>
                                                                                 <?php } }   ?>
                                                                            </select>
																    	    <font style="color:#dd4b39;" id="lowalert"></font>
                                                                        </div>
                                                                  </div>
                                                               </div>
                                                               
                                                               <div class="col-md-3">
                                                                   <div class="form-group">
                                                                    <label class="control-label col-md-6" style="text-align: left;">To <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-12">
                                                                            <select class="form-control" id="high_class" name="high_class" onchange="textvalidate(this.id,'highalert');" onfocus="textvalidate(this.id,'highalert')" required="required">
                                                                                <option value="">Choose</option>
                                                                                 <?php foreach($schoolclassstudying as $dis){ if($dis->id>8){continue;} ?>
                                                                                 <option value="<?php echo($dis->id)?>"><?php echo($dis->class_studying)?></option>
                                                                                 <?php   } ?>
                                                                            </select>
																    	    <font style="color:#dd4b39;" id="highalert"></font>
                                                                        </div>
                                                                  </div>
                                                               </div>
                                                             
                                                                <!--/span-->
                                                                <div class="col-md-3">
                                                                   <div class="form-group">
                                                                    <label class="control-label col-md-6" style="text-align: left;">School Type <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-12">
                                                                            <select class="form-control" id="schooltype" name="schooltype" onchange="textvalidate(this.id,'typealert');" onfocus="textvalidate(this.id,'typealert');">
                                                                                <option value="">Choose</option>
                                                                                <option value="Boys">Boys</option>
                                                                                <option value="Girls">Girls</option>
                                                                                <option value="Co-Ed">Co-Education</option>
                                                                            </select>
                                                                            <font style="color:#dd4b39;" id="typealert"></font>
                                                                        </div>
                                                                  </div>
                                                               </div>
                                                              <!--/span-->
                                                            </div>
                                                            
                                                            
                                                            
                                                         
                                                         
                                                         </div>
                                                        <div class="form-actions text-center" >
												            <button type="submit" class="btn btn-primary" >Save</button>
                                                            <button type="button" onclick="location.href='<?php echo base_url().'';?>'" class="btn default">Cancel</button>
                                                            <button type="button" onclick="location.href='<?php echo base_url().'Newschool/new_school/4';?>'" class="btn btn-success text-right">Next</button>
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
</body> 
<script src="<?php echo base_url().'asset/js/vivekrao/generate.js';?>" type="text/javascript"></script>
<script src="<?php echo base_url().'asset/js/vivekrao/jsonpost.js';?>" type="text/javascript"></script>
<script>
/*******************************************************************
Function done by Magesh 20-02-2019
********************************************************************/

    function getalldetails(currentElement,targetElement,value,url,segment,para) {
        //alert("Current Element="+ currentElement +"TargetElement="+ targetElement +"Value="+ value +"url="+ url +"segment="+ segment);
     var management = currentElement.name;
      $.ajax({
            type: "POST",
            url:url+segment,
            data:"&"+management+"="+currentElement.value+"&"+para,
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
    
    
    
    function textvalidate(id,alertid){
			//alert(alertid);	
			var text = document.getElementById(id);
			var alt = document.getElementById(alertid);
            if(alt!=null){
			if(text.value==''){
				alt.innerHTML="This field is required";
                text.value='';
                return true;
			}else {
				alt.innerHTML="";
			}
            }
    }
    
    function mobilevalidate(id,alertid){
			var mobpattern = /^[6789]\d{9}$/;
			var text = document.getElementById(id);
			var alt = document.getElementById(alertid);
			if(text.value==''){
				alt.innerHTML="This field is required";
				text.value='';
                return true;
			}else if(!text.value.match(mobpattern)){
				alt.innerHTML="Enter valid mobile number";
				text.value='';
                return true;
			}else {
				alt.innerHTML="";
			}
		}
			
		
		
		function pinvalidate(id,alertid){
			var pinpattern = /^[6]\d{5}$/;
			var text = document.getElementById(id);
			var alt = document.getElementById(alertid);
			if(text.value==''){
				alt.innerHTML="This field is required";
				text.value='';
                return true;
			}else if(!text.value.match(pinpattern)){
				alt.innerHTML="Enter valid Pincode. Starting with 6";
				text.value='';
                return true;
			}else {
				alt.innerHTML="";
			}
		}
				
		function emailvalidate(id,alertid){
			var emailreg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			var text = document.getElementById(id);
			var alt = document.getElementById(alertid);
			if(text.value==''){
				alt.innerHTML="This field is required";
				text.value='';
                return true;
			}else if(!text.value.match(emailreg)){
				alt.innerHTML="Enter valid Email";
				text.value='';
                return true;
			}else {
				alt.innerHTML="";
			}
		}
		
		function websitevalidate(id,alertid){
            var webreg=/^[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/;
            var webreg1 = /^https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/;
			var text = document.getElementById(id);
			var alt = document.getElementById(alertid);
			if(!text.value.match(webreg) && !text.value.match(webreg1) && text.value!=''){
				alt.innerHTML="Enter valid Website";
				text.value='';
                return true;
			}else{
			     webreg = /^https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/;
			     if(!text.value.match(webreg) && text.value!=''){
			         text.value='http://'+text.value;
			     }
				alt.innerHTML="";
                return true;
			}
		}
        
        
        
        function popup(node){
            //alert('Click Submit');
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
                    //swal("OK", "SCHOOL BASIC DETAILS - I Saved Successfully", "success");
                    node.submit();
                    //return true;
                    
                    
                }else{
                    swal("Cancelled", "Your cancelled the profile1", "error");
                    return false;
                }
            });	
        }
        
        
		

/*******************************************************************
        Function ended
********************************************************************/

</script>
</html>
