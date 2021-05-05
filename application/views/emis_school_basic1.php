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
                                                <a href="<?php echo base_url().'Basic/emis_school_basic1';?>"><div class="col-md-4 bg-grey-steel mt-step-col active">
                                                    <div class="mt-step-number bg-white font-grey">1</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Basic Information</div>
                                                    <div class="mt-step-content font-grey-cascade">Step 1</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Basic/emis_school_basic2';?>"><div class="col-md-2 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">2</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Basic</div>
                                                    <div class="mt-step-content font-grey-cascade">Step 2</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Basic/emis_school_basic3';?>"><div class="col-md-2 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">3</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Basic</div>
                                                    <div class="mt-step-content font-grey-cascade">Step 3</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Basic/emis_school_basic4';?>"><div class="col-md-2 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">4</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Basic</div>
                                                    <div class="mt-step-content font-grey-cascade">Step 4</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Basic/emis_school_basic5';?>"><div class="col-md-2 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">5</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Basic</div>
                                                    <div class="mt-step-content font-grey-cascade">Step 5</div>
                                                </div></a>
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
                                                    <span class="caption-subject font-dark sbold uppercase">Basic Information step 1</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                            <div class ="row">
                                                <div class="col-md-4">
                                                <font style="color:#dd4b39;">
                                                    <?php echo $this->session->flashdata('errors'); ?>
                                                </font>
                                                </div>
                                            </div>
                                        </div>
                                           <?php $user_type_id = $this->session->userdata('emis_user_type_id'); ?> 
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table id="user" class="table table-bordered table-striped">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:15%"> Name of the School </td>
                                                                    <td style="width:50%">
                                                                    <?php if ($user_type_id == 1 || $user_type_id == 2) { ?>
                                                                    <?php echo $school_name; ?>  
                                                                    <?php } else { ?>
                                                                    <a href="javascript:;" id="schoolname" data-type="text" data-pk="0" data-url="<?php echo base_url().'Basic/updateschoolname';?>"  data-original-title="Enter SchoolName"> <?php echo $school_name; ?></a>
                                                                    <?php } ?>
                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>
                                                               <tr>
                                                                    <td style="width:15%"> Name of the School (in tamil): </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="schoolnametamil" data-type="text" data-pk="0" data-url="<?php echo base_url().'Basic/updateschoolnametamil';?>"  data-original-title="Enter SchoolName in Tamil"> <?php echo $school_name_tamil; ?></a>
                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:15%"> Udise code:</td>
                                                                    <td style="width:50%">
                                                                        <?php if ($user_type_id != 7) { ?>
                                                                        <?php echo $udise_code; ?> 
                                                                        <?php } else { ?>
                                                                        <a href="javascript:;" id="udisecode" data-type="text" data-pk="0" data-url="<?php echo base_url().'Home/updateudisecode';?>"  data-original-title="Enter username"> <?php echo $udise_code; ?>
                                                                         <?php } ?>
                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>
                                                                <?php if ($user_type_id == 1 || $user_type_id == 2) { ?>
                                                                <tr>
                                                                <td style="width:15%"> Revenue District:</td>
                                                                <td style="width:50%"> 
                                                                <?php echo $current_district_name; ?>
                                                                </td>
                                                                <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                 </td>
                                                                </tr>
                                                                <tr>
                                                                <td style="width:15%"> Block:</td>
                                                                <td style="width:50%"> 
                                                                <?php echo $current_block_name; ?>
                                                                </td>
                                                                <td style="width:35%">
                                                                 <?php if(isset($block_error)){  ?>
                                                                    <span class="text-muted"> <font style="color:#dd4b39;"><?php echo $block_error ; ?></font></span>
                                                                 <?php } else { ?>
                                                                       <span class="text-muted"> Help text </span>                                                                  

                                                                  <?php } ?>
                                                                 </td>
                                                                </tr>

                                                                <tr>
                                                                <td style="width:15%"> Cluster</td>
                                                                <td style="width:50%"> 
                                                                <?php echo $current_cluster_name; ?>
                                                                </td>
                                                                <td style="width:35%">
                                                                <?php if(isset($cluster_error)){  ?>
                                                                    <span class="text-muted"> <font style="color:#dd4b39;"> <?php echo $cluster_error ; ?></font></span>
                                                                 <?php } else { ?>
                                                                        <span class="text-muted"> Help text </span>
                                                                 <?php } ?>
                                                                 </td>
                                                                </tr>

                                                                <tr>
                                                                <td style="width:15%"> Educational district:</td>
                                                                <td style="width:50%"> 
                                                                    <?php echo $current_edu_district_name; ?>
                                                                </td>
                                                                <td style="width:35%">
                                                                <?php if(isset($edn_dist_error)){  ?>
                                                                    <span class="text-muted"> <font style="color:#dd4b39;"> <?php echo $edn_dist_error ;?> </font></span>
                                                                 <?php } else { ?>
                                                                        <span class="text-muted"> Help text </span>
                                                                <?php } ?>
                                                                 </td>
                                                                </tr>

                                                                <tr>
                                                                <td style="width:15%"> Assembly Constituency:</td>
                                                                <td style="width:50%"> 
                                                                 <?php echo $current_assembly_constituency_name; ?>
                                                                </td>
                                                                <td style="width:35%">
                                                                <?php if(isset($assembly_error)){  ?>
                                                                    <span class="text-muted"> <font style="color:#dd4b39;"> <?php echo $assembly_error ; ?> </font></span>
                                                                 <?php } else { ?>
                                                                        <span class="text-muted"> Help text </span>
                                                                 <?php } ?>
                                                                 </td>
                                                                 
                                                                </tr>

                                                                <tr>
                                                                <td style="width:15%"> Parliament Constituency:</td>
                                                                <td style="width:50%"> 
                                                                    <?php echo $current_parliament_constituency_name; ?>
                                                                </td>
                                                                <td style="width:35%">
                                                                <?php if(isset($parliament_error)){  ?>
                                                                    <span class="text-muted"> <font style="color:#dd4b39;"> <?php echo $parliament_error ?> </font></span>
                                                                 <?php } else { ?>
                                                                        <span class="text-muted"> Help text </span>
                                                                 <?php } ?>
                                                                 </td>
                                                                </tr>
                                                                <?php } ?>
                     
                                                            </tbody>
                                                        </table>
                                                        <!--<textarea id="typingarea" name="typingarea" rows="5" cols="64" class="bigger" spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off" autosuggest="off"></textarea> -->

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="portlet-body form">
                                            <?php if ($user_type_id == 1 || $user_type_id == 2) { ?>                                            
                                            <form  action="<?php echo base_url().'Basic/emis_location_registerforschool';?>" method="post" id="emis_bank_reg_form" name="emis_bank_reg_form">
                                            <?php } else { ?>
                                            <form  action="<?php echo base_url().'Basic/emis_location_register';?>" method="post" id="emis_bank_reg_form" name="emis_bank_reg_form">
                                            <?php } ?>
                                              <div class="form-body">
                                               <fieldset id="myFieldset" disabled="disabled">
                                                <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                            <?php if ($user_type_id != 1 && $user_type_id != 2) { ?>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Revenue District:</label>
                                                           <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_prof_revenue_district" name="emis_prof_revenue_district" required>
                                                           <option value="" >Select District</option>
                                                            <?php foreach($districts as $dis) {   ?>
                                                           <option value="<?php echo $dis->id;  ?>" <?php if($dis->id == $current_district) { ?>  selected <?php }   ?>><?php echo $dis->district_name  ?></option>

                                                            <?php   }  ?>
                                                           
                                                            </select>
                                                            
                                                             <font style="color:#dd4b39;"><div id="emis_prof_bank_revenue_alert"></div></font>

                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Block</label>
                                                            
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_prof_block_name" name="emis_prof_block_name" required>

                                                                
                                                                <option value="" >Select Block</option>
                                                                <?php foreach($blocks as $b) {   ?>
                                                          <option value="<?php echo $b->id;  ?>" <?php if($b->id == $current_block) { ?>  selected <?php }   ?>><?php echo $b->block_name  ?></option>
                                                          <?php   }  ?>
                                                             </select>
                                                             
                                                             <font style="color:#dd4b39;"><div id="emis_prof_block_name_alert"></div></font>
                                                    </div>
                                                </div>
                                                 
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Cluster: </label>
                                                            
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_prof_cluster_name" name="emis_prof_cluster_name" required>
                                                               
                                                                <option value="" >Select Cluster</option>
                                                                <?php foreach($clusters as $b) {   ?>

                                                               <option value="<?php echo $b->clus_code;  ?>" <?php if($b->clus_code == $current_cluster) { ?>  selected <?php }   ?> > 
                                                                <?php echo $b->clus_name; ?> 
                                                               </option>

                                                                 <?php   }  ?>
                                                                 

                                                            </select>
                                                            
                                                             <font style="color:#dd4b39;"><div id="emis_prof_cluster_name_alert"></div></font>
  
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Educational District: </label>
                                                            
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_prof_edu_district_name" name="emis_prof_edu_district_name" required>
                                                               
                                                                <option value="" >Select Educational District</option>
                                                                <?php foreach($edu_districts as $b) {   ?>
                                                               <option value="<?php echo $b->edn_dist_id;  ?>" <?php if($b->edn_dist_id == $current_edu_district) { ?>  selected <?php }   ?>><?php echo $b->edn_dist_name ?></option>
                                                                 <?php   }  ?>
                                                                 

                                                            </select>
                                                            
                                                             <font style="color:#dd4b39;"><div id="emis_prof_edu_district_name_alert"></div></font>
  
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            <div class="lbody">
                                                <div class="col-md-4">
                                                 
                                                    <div class="form-group">
                                                        <label class="control-label">Type of Local Body Administration: </label>
                                                          <?php if ($user_type_id == 1 || $user_type_id == 2) { ?> 
                                                            <?php foreach($localbody as $b) {   ?>
                                                            <?php if($b->id == $current_localbody) {?>
                                                             <div id ="localbodyadmin" data-value= "<?php echo $b->localbody_name;  ?>" >
                                                                <label class="form-control"> <?php echo $b->localbody_name;  ?> </label>
                                                             </div>
                                                             <?php } }if (is_null($current_localbody) || empty($current_localbody) || is_null($localbody) || empty($localbody)){ ?>
                                                               <div id ="localbodyadmin" data-value= "" ></div>
                                                               <label class="form-control"> </label> 
                                                             <?php } } else { ?> 

                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_prof_local_body_admin_name" name="emis_prof_local_body_admin_name" required>
                                                               
                                                                <option value="" >Select Local Body Administration</option>
                                                                <?php foreach($localbody as $b) {   ?>
                                                               <option value="<?php echo $b->id;  ?>" <?php if($b->id == $current_localbody) { ?>  selected <?php }   ?>><?php echo $b->localbody_name ?></option>
                                                                 <?php   }  ?>
                                                            </select>
                                                           <?php   }  ?> 
                                                             <font style="color:#dd4b39;"><div id="emis_prof_local_body_admin_name_alert"> <?php if(isset($localbody_error)) {  echo $localbody_error; }?> <div id ="localbodyadmin" data-value= "error" ></div></div></font>
  
                                                    </div>
                                                </div>
                                            </div>

                                                <!-- if value is village -->
                                            <div class ="villagediv" style="display:none;">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Village Panchayat: </label>
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_prof_village_panchayat_name" name="emis_prof_village_panchayat_name">
                                                               
                                                                <option value="" >Select Village Panchayat</option>
                                                                <?php foreach($villages as $b) {   ?>
                                                               <option value="<?php echo $b->id;  ?>" <?php if($b->id == $current_village) { ?>  selected <?php }   ?>><?php echo $b->name ?></option>
                                                                 <?php   }  ?>
                                                                 

                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_prof_village_panchayat_name_alert"></div></font>
  
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Village Habitation: </label>
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_prof_village_habitation_name" name="emis_prof_village_habitation_name">
                                                               
                                                                <option value="" >Select Village Habitation</option>
                                                                <?php foreach($hvillages as $b) {   ?>
                                                               <option value="<?php echo $b->id;  ?>" <?php if($b->id == $current_village_hab) { ?>  selected <?php }   ?>><?php echo $b->name ?></option>
                                                                 <?php   }  ?>
                                                                 

                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_prof_village_habitation_name_alert"></div></font>
  
                                                    </div>
                                                </div>
                                            </div><!--end of village div -->
                                                 
                                                <!-- end village -->

                                                <!--for corporation -->
                                            <div class="corporation"  style="display:none;">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Corporation  </label>
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_prof_corporation_name" name="emis_prof_corporation_name">
                                                               
                                                                <option value="" >Select Corporation</option>
                                                                <?php foreach($corporations as $b) {   ?>
                                                               <option value="<?php echo $b->id;  ?>" <?php if($b->id == $current_corporation) { ?>  selected <?php }   ?>><?php echo $b->corporation ?></option>
                                                                 <?php   }  ?>
                                                                 

                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_prof_corporation_name_alert"></div></font>
  
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Corporation Zone </label>
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_prof_corporation_zone_name" name="emis_prof_corporation_zone_name">
                                                               
                                                                <option value="" >Select Corporation Zone</option>
                                                                <?php foreach($zcorporations as $b) {   ?>
                                                               <option value="<?php echo $b->id;  ?>" <?php if($b->id == $current_corporation_zone) { ?>  selected <?php }   ?>><?php echo $b->corpn_zone ?></option>
                                                                 <?php   }  ?>
                                                                 

                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_prof_corporation_zone_name_alert"></div></font>
  
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Corporation Ward </label>
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_prof_corporation_ward_name" name="emis_prof_corporation_ward_name">
                                                               
                                                                <option value="" >Select Corporation Ward</option>
                                                                <?php foreach($wcorporations as $b) {   ?>
                                                               <option value="<?php echo $b->id;  ?>" <?php if($b->id == $current_coporation_ward) { ?>  selected <?php }   ?>><?php echo $b->name ?></option>
                                                                 <?php   }  ?>
                                                                 

                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_prof_corporation_ward_name_alert"></div></font>
  
                                                    </div>
                                                </div>
                                            </div><!--end of corporation div -->
                                                 
                                                <!--end of corporation -->

                                                <!--start of municipality -->
                                             
                                            <div class ="municipality"  style="display:none;">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Municipality </label>
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_municipality_name" name="emis_municipality_name">
                                                               
                                                                <option value="" >Select Municipality</option>
                                                                <?php foreach($municipalities as $b) {   ?>
                                                               <option value="<?php echo $b->id;  ?>" <?php if($b->id == $current_municipality) { ?>  selected <?php }   ?>><?php echo $b->municipality ?></option>
                                                                 <?php   }  ?>
                                                                 

                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_municipality_name_alert"></div></font>
  
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Municipality Ward </label>
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_municipality_ward_name" name="emis_municipality_ward_name">
                                                               
                                                                <option value="" >Select Municipality Ward </option>
                                                                <?php foreach($wmunicipalities as $b) {   ?>
                                                               <option value="<?php echo $b->id;  ?>" <?php if($b->id == $current_municipality_ward) { ?>  selected <?php }   ?>><?php echo $b->name ?></option>
                                                                 <?php   }  ?>
                                                                 

                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_municipality_ward_name_alert"></div></font>
  
                                                    </div>
                                                </div>
                                            </div><!--end of municipality div -->
                                                
                                                <!--end of municipality -->

                                                <!--town panchayat -->
                                                
                                            <div class = "townpanchayat"  style="display:none;">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Town Panchayat   </label>
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_prof_town_panchayat_name" name="emis_prof_town_panchayat_name">
                                                               
                                                                <option value="" >Select Town Panchayat</option>
                                                                <?php foreach($townpanchayats as $b) {   ?>
                                                               <option value="<?php echo $b->id;  ?>" <?php if($b->id == $current_town_panchayat) { ?>  selected <?php }   ?>><?php echo $b->townpanchayat ?></option>
                                                                 <?php   }  ?>
                                                                 

                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_prof_town_panchayat_name_alert"></div></font>
  
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Town Panchayat Ward </label>
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_prof_town_panchayat_ward_name" name="emis_prof_town_panchayat_ward_name">
                                                               
                                                                <option value="" >Select Town Panchayat Ward</option>
                                                                <?php foreach($wtownpanchayats as $b) {   ?>
                                                               <option value="<?php echo $b->id;  ?>" <?php if($b->id == $current_town_ward_panchayat) { ?>  selected <?php }   ?>><?php echo $b->name ?></option>
                                                                 <?php   }  ?>
                                                                 

                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_prof_town_panchayat_ward_name_alert"></div></font>
  
                                                    </div>
                                                </div>
                                            </div><!-- end of town panchayat -->
                                                


                                                <!--end of town panchayat -->

                                                <!---cantonment start -->
                                                
                                                <div class = "cantonment"  style="display:none;">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Cantonment</label>
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_prof_cantonement_name" name="emis_prof_cantonement_name">
                                                               
                                                                <option value="" >Select Cantonment</option>
                                                                <?php foreach($cantonments as $b) {   ?>
                                                               <option value="<?php echo $b->id;  ?>" <?php if($b->id == $current_cantonment) { ?>  selected <?php }   ?>><?php echo $b->contonment ?></option>
                                                                 <?php   }  ?>
                                                                 

                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_prof_cantonement_name_alert"></div></font>
  
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Cantonment ward </label>
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_prof_cantonement_ward_name" name="emis_prof_cantonement_ward_name">
                                                               
                                                                <option value="" >Select Cantonment ward</option>
                                                                <?php foreach($wcantonments as $b) {   ?>
                                                               <option value="<?php echo $b->id;  ?>" <?php if($b->id == $current_cantonment_ward) { ?>  selected <?php }   ?>><?php echo $b->name ?></option>
                                                                 <?php   }  ?>
                                                                 

                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_prof_cantonement_ward_name_alert"></div></font>
  
                                                    </div>
                                                </div>
                                                </div><!-- end of cantonment div -->
                                                
                                                <!--cantonment end -->
                                                <!--township -->
                                                
                                                <div class ="township"  style="display:none;">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Township </label>
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_prof_township_name" name="emis_prof_township_name">
                                                               
                                                                <option value="" >Select Township</option>
                                                                <?php foreach($townships as $b) {   ?>
                                                               <option value="<?php echo $b->id;  ?>" <?php if($b->id == $current_township) { ?>  selected <?php }   ?>><?php echo $b->township ?></option>
                                                                 <?php   }  ?>
                                                                 

                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_prof_township_name_alert"></div></font>
  
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Township ward</label>
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_prof_township_ward_name" name="emis_prof_township_ward_name">
                                                               
                                                                <option value="" >Select Township Ward </option>
                                                                <?php foreach($wtownships as $b) {   ?>
                                                               <option value="<?php echo $b->id;  ?>" <?php if($b->id == $current_township_ward) { ?>  selected <?php }   ?>><?php echo $b->name ?></option>
                                                                 <?php   }  ?>
                                                                 

                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_prof_township_ward_name_alert"></div></font>
  
                                                    </div>
                                                </div>
                                                </div><!--end of township div -->
                                                

                                                <!--township over -->

                                                <?php if ($user_type_id != 1 && $user_type_id != 2) { ?>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Assembly Constituency </label>
                                                         

                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_prof_assembly_name" name="emis_prof_assembly_name">
                                                               
                                                                <option value="" >Select Assembly Constituency</option>
                                                                <?php foreach($assembly as $b) {   ?>
                                                               <option value="<?php echo $b->id;  ?>" <?php if($b->id == $current_assembly) { ?>  selected <?php }   ?>><?php echo $b->assembly_name ?></option>
                                                                 <?php   }  ?>
                                                                 

                                                            </select>
                                                            
                                                             <font style="color:#dd4b39;"><div id="emis_prof_assembly_name_alert"></div></font>
  
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Parliament Constituency</label>
                                                           
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_prof_parliment_constituency_name" name="emis_prof_parliment_constituency_name">
                                                               
                                                                <option value="" >Select Parliament Constituency</option>
                                                                <?php foreach($parliaments as $b) {   ?>
                                                               <option value="<?php echo $b->id;  ?>" <?php if($b->id == $current_parliament_constituency) { ?>  selected <?php }   ?>><?php echo $b->parli_name ?></option>
                                                                 <?php   }  ?>
                                                                 

                                                            </select>
                                                           
                                                             <font style="color:#dd4b39;"><div id="emis_prof_parliment_constituency_name_alert"></div></font>
  
                                                    </div>
                                                </div>
                                                <?php }?>

                                            </div>

                                        </div>
                                        
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-offset-11 col-md-9">
                                                                <button type="submit" class="btn green" id="emis_bank_data_sub">Submit</button>
                                                            </div>
                                                        </div>


                                                </div>
                                                        <div class="col-md-6"> </div>
                                            </div>
                                        </div>
                                            
                                            

                                        </div>
                                            
                                            
                                         </fieldset>
                                        </div>

                                        </form>

                                       </div></div>
                                      
                             

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
      /*
        $('#typingarea').on("focus",function() {

            pramukhIME.addKeyboard,('PramukhIndic','tamil');
            pramukhIME.setLanguage("PramukhIndic","tamil"); 
            pramukhIME.enable();
            alert("hello");

        }); */
        
     
        

          var countries = [];
        $.each({
            "BD": "Bangladesh",
            "ID": "Indonesia",
            "UA": "Ukraine",
            "QA": "Qatar",
            "MZ": "Mozambique",
            "TV": "Tiruvallur",
            "VV": "Villivakkam",
            "PO": "Ponneri",
            "VP": "Village Panchayat",
            "PV": "PANDESWARAM",
            "PM": "Pandeswaram",
            "AM": "008 Ambattur",
            "SP": "05-SRIPERUMBUDUR",
            "CC": "330109001"
        }, function(k, v) {
            countries.push({
                id: k,
                text: v
            });
        });

        $('#district').editable({
            inputclass: 'form-control input-medium',
            source: countries
        });
         $('#block').editable({
            inputclass: 'form-control input-medium',
            source: countries
        }); 
         $('#cluster').editable({
            inputclass: 'form-control input-medium',
            source: countries
        }); 

        $('#eddistrict').editable({
            inputclass: 'form-control input-medium',
            source: countries
        });         
        $('#localbody').editable({
            inputclass: 'form-control input-medium',
            source: countries
        });
         $('#panchayat').editable({
            inputclass: 'form-control input-medium',
            source: countries
        }); 
        $('#habitation').editable({
            inputclass: 'form-control input-medium',
            source: countries
        });   
         $('#assembly').editable({
            inputclass: 'form-control input-medium',
            source: countries
        }); 
        $('#parliament').editable({
            inputclass: 'form-control input-medium',
            source: countries
        }); 
        $('#schoolnametamil').editable({
            type: 'text',
            pk: 1,
            name: 'school_name_tamil',
            title: 'Enter School Name in Tamil',
            success: function(response, newValue) {
            //alert("hello");
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("School Name in Tamil updated sucessfully", "Update Notifications");

            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             }
        });   
        $('#schoolname').editable({
            type: 'text',
            pk: 1,
            name: 'school_name',
            title: 'Enter School Name',
            success: function(response, newValue) {
            //alert("hello");
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("School Name  updated sucessfully", "Update Notifications");


            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             },
            validate: function(value){
                if( /[^-.?!,;:()&'/ A-Za-z0-9]/.test(value))
                {
                    return 'School name can contain only alphabets and spaces';
                }
            }
        });  
        $('#udisecode').editable({
            type: 'text',
            pk: 1,
            name: 'udise_code',
            title: 'Enter Udisecode',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else
                        toastr.success("Udise code updated sucessfully", "Update Notifications");

            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(! /^[0-9]{11}$/.test(value))
                {
                    return 'Invalid udise code';
                }
            }
        });  


             $('#user .editable').editable('toggleDisabled');
            // init editable toggler
            $('#enable').click(function() {
                $('#user .editable').editable('toggleDisabled');
                $("#myFieldset").prop('disabled', function () {
                    return ! $(this).prop('disabled');
                });
            });

        

</script>
<?php if ($user_type_id != 1 && $user_type_id != 2) { ?>
<script >
    $(document).ready(function() {  

             var val = $("#emis_prof_local_body_admin_name option:selected").text();
             //var val1 = document.getElementById('localbodyadmin').getAttribute('data-value'); 
             var val1 ="";
             

             if(val == "Village Panchayat" || val1 == "Village Panchayat")
             {
                $(".villagediv").show();
                document.getElementById("emis_prof_village_panchayat_name").required = true;
                document.getElementById("emis_prof_village_habitation_name").required = true;
             
             }
             else if(val == "Municipality" || val1 == "Municipality")
             {
                $(".municipality").show();
                document.getElementById("emis_municipality_name").required = true;
                document.getElementById("emis_municipality_ward_name").required = true;

             }
             else if(val == "Town Panchayat" || val1 == "Town Panchayat")
            {
                $(".townpanchayat").show();
                document.getElementById("emis_prof_town_panchayat_name").required = true;
                document.getElementById("emis_prof_town_panchayat_ward_name").required = true;
            }
            else if(val == "Cantonment" || val1 == "Cantonment")
            {
                $(".cantonment").show();
                document.getElementById("emis_prof_cantonement_name").required = true;
                document.getElementById("emis_prof_cantonement_ward_name").required = true;
            }
            else if(val == "Extended Chennai Corporation" || val == "Corporation" || val1 == "Extended Chennai Corporation" || val1 == "Corporation" )
            {
                $(".corporation").show();
                document.getElementById("emis_prof_corporation_name").required = true;
                document.getElementById("emis_prof_corporation_zone_name").required = true;
                document.getElementById("emis_prof_corporation_ward_name").required = true;
                
            }
            else if(val == "Township" || val1 == "Township")
            {
                $(".township").show();
                document.getElementById("emis_prof_township_name").required = true;
                document.getElementById("emis_prof_township_ward_name").required = true;
            }
    });  

</script>
<?php } ?>
<?php if ($user_type_id == 1 || $user_type_id == 2) { ?>
<script>

$(document).ready(function() {  

             if ( document.getElementById('localbodyadmin').hasAttribute('data-value') ) 

            {
                val1 = document.getElementById('localbodyadmin').getAttribute('data-value');
                        

             if(val1 == "Village Panchayat")
             {
                $(".villagediv").show();
                document.getElementById("emis_prof_village_panchayat_name").required = true;
                document.getElementById("emis_prof_village_habitation_name").required = true;
             
             }
             else if(val1 == "Municipality")
             {
                $(".municipality").show();
                document.getElementById("emis_municipality_name").required = true;
                document.getElementById("emis_municipality_ward_name").required = true;

             }
             else if(val1 == "Town Panchayat")
            {
                $(".townpanchayat").show();
                document.getElementById("emis_prof_town_panchayat_name").required = true;
                document.getElementById("emis_prof_town_panchayat_ward_name").required = true;
            }
            else if(val1 == "Cantonment")
            {
                $(".cantonment").show();
                document.getElementById("emis_prof_cantonement_name").required = true;
                document.getElementById("emis_prof_cantonement_ward_name").required = true;
            }
            else if(val1 == "Extended Chennai Corporation" || val1 == "Corporation" )
            {
                $(".corporation").show();
                document.getElementById("emis_prof_corporation_name").required = true;
                document.getElementById("emis_prof_corporation_zone_name").required = true;
                document.getElementById("emis_prof_corporation_ward_name").required = true;
                
            }
            else if(val1 == "Township")
            {
                $(".township").show();
                document.getElementById("emis_prof_township_name").required = true;
                document.getElementById("emis_prof_township_ward_name").required = true;
            }
            else if(val1 == "error")
            {
                //$(".lbody").hide();
                
                $("#emis_bank_data_sub").hide();
            }
            else
            {
             $(".lbody").hide();
                    
             $("#emis_bank_data_sub").hide();   
            }
        }
        else
        {
         $(".lbody").hide();
                
         $("#emis_bank_data_sub").hide();   
        }
    }); 
</script>
<?php } ?>
    </body>

</html>