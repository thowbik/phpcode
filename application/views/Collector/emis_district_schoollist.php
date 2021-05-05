
<?php 
$class_roma = array
                                                            (
                                                                ['name'=>'LKG','id'=>'13'],
                                                                ['name'=>'UKG','id'=>'14'],
                                                                ['name'=>'PreKG','id'=>'15'],
                                                                ['name'=>'I','id'=>1],
                                                                ['name'=>'II','id'=>'2'],
                                                                ['name'=>'III','id'=>'3'],
                                                                ['name'=>'IV','id'=>'4'],
                                                                ['name'=>'V','id'=>'5'],
                                                                ['name'=>'VI','id'=>'6'],
                                                                ['name'=>'VII','id'=>'7'],
                                                                ['name'=>'VIII','id'=>'8'],
                                                                ['name'=>'IX','id'=>'9'],
                                                                ['name'=>'X','id'=>'10'],
                                                                ['name'=>'XI','id'=>'11'],
                                                                ['name'=>'XII','id'=>'12'],
                                                                
                                                            );


?>
<!DOCTYPE html>
 <!-- This View created by venba TamilMaran for listing  the school edit option -->
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
        <style>
              .clickable{
    cursor: pointer;   
}
  .panel-heading span {
    margin-top: -20px;
    font-size: 15px;
}
.center
{
    text-align: center;
}
.tablecolor
{
    background-color: #32c5d2; 
}
body.modal-open {
    overflow-y: hidden !important;
    position: fixed;
}
        </style>

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            


<?php $this->load->view('Collector/header.php');
?>

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
                                    
                                        <div class="portlet light portlet-fit">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Update School Management Details</span>
                                                </div>
                                            </div> 
                                           
                                             <!-- searchable -->
                                         								  
                                        <center>
                                                    <div class="row">   
                                                   <form method="post">
                                            <div class="col-md-3">		
                                                    <div class="form-group">
                                                      
                                                        
                                                          <select style="width: 69%;" class="form-control" data-placeholder="Choose a Category" tabindex="1" id="schoolcat" name="schoolcat"  required="">
                                                               
                                                                <option value="" >Select School Type</option>
                                                                 <?php foreach($schoolcate as $sc) {   ?>
                                                               <option value="<?php echo $sc->id;  ?>" ><?php echo $sc->manage_name?></option>
                                                                 <?php   }  ?>
																 
                                                               </select> 
                                                         <font style="color:#dd4b39;"><div id="emis_block_schoolsid_alert"><?php if(isset($error3)){ ?> <?php echo $error3;?> <?php } ?></div></font>
                                                         
                                                         
                                                        
                                                    </div>
													</div>
													 <div class="col-md-1">
                                                          <button type="submit" class="btn green" id="emis_stu_searchsep_sub" >Search</button>

                                                          </div>
                                                    </form>
                                                 </div>
                                                 <div class="col-md-offset-4 col-md-4">
                                                    <?php

if($this->session->flashdata('success')) {
$message = $this->session->flashdata('success');

?>

<div class="alert alert-success"><button class="close" data-close="alert"></button>
                                <?=$message;?></div>
                            <?php } ?>
                                                 </div>
													</center>
													
                                           

                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                       
                                                       
                                               <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> Number of School Available</div>
                                                        <div class="tools" style="margin-top: 20px;"> </div>
                                                    </div>
                                                    <div class="portlet-body">
													
                                                        <table class="table  table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
																   <td>S.No</td>
																   
																    <th >Udise Code</th>
                                                                    <th>School Name</th>
                                                                    <th>Minority</th>
                                                                    <th>School Mail</th>
																	<th>School Type</th>
																	<th>School Management</th>
																	<th>Affiliation</th>
																	<th>RTE</th>
                                                                    <!-- <th> Edit </th> -->
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                             <?php                                                           
                                                              // $i=1;
                                                              foreach($schoollist as $index=> $sl)
															   {
																 
																		?>
                                                               <tr>
                                                                <td><?=$index+1;?>
                                                                     
                                                                    
													
																
                                                                     <td><a href="javascript:void(0);" onclick="schooltab(<?=$sl->school_id?>);"><?=$sl->udise_code;  ?></a></td>
                                                                    <td readonly><?php echo $sl->school_name;  ?>
																	</td>
																	<?php
																	 $minority=$sl->minority_sch;
																	if($minority==0)
																	{
																	$minority_det='NO';	
																	}
																	else
																	{
																	$minority_det='YES';		
																	}
																	?>
                                                                    <td><?php echo $minority_det;?></td>
																																		
																	
																	<td style="width:10%;"><?php echo $sl->sch_email;  ?>
																	</td>
                                                                    
																	<!--<td ><?php echo $sl->address;  ?>
																	<input type="hidden" class="medium" id="medium<?php echo $i;?>" value="<?php echo $sl->sch_email;?>"></td>-->
																	<td><?php echo $sl->manage_name;  ?></td>
																	<td><?php echo $sl->management; ?></td>
						                                            <td><?php echo $sl->department; ?></td>
                                                                    <?php
																	 $sch_rte=$sl->rte;
																	if($sch_rte=='' || $sch_rte==0)
																	{
																	$rte='NO';	
																	}
																	else
																	{
																	$rte='YES';		
																	}
																	?>
																	 <td><?php echo $rte;  ?></td> 
                                                                    
                                                                  </tr>
                                                               <?php }  ?>
                                                            </tbody>
                                                        </table>
                                                     </div>
                                                  </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

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
        <div class="modal fade" id="schoolModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <div class="row">
                <div class="col-md-6">
          <h4 class="modal-title" id="sch_id"></h4>

                </div>
                
                <div class="col-md-offset-5 col-md-1">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
            </div>
        </div>
        <div class="modal-body">
            <form action="<?php echo base_url().'Collector/emis_district_schools_update'?>" method="post">
                <div class="row">
                <div class="col-md-offset-6 col-md-4">
                        <span> School Status</span>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_sch_status" name="emis_reg_sch_status" required>
                                                          
                                                            <option value="1">Active</option>
                                                            <option value="0">In-Active</option>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_type_alert"></div></font>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="emis_reg_sch_old_status" id="emis_reg_sch_old_status">
                </div>
            </div>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">School Management Details</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                <div class="panel-body">

                                        <div class="row">
                                            <input type="hidden" name="school_id" id="school_id">
                                                <div class="col-md-6">
                                                  <label class="control-label">Name of the School in English *</label><span style="color:red">Maximum Charter (100)</span>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_reg_sch_name" name="emis_reg_sch_name" 
                                                            placeholder=" School Name" maxlength ="100" required>
                                                           
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_name_alert"></div></font>
                                                             
                                                        </div>
                                                    </div> 
                                                </div>
                                                <div class="col-md-6">
                                                  <label class="control-label">Short Name of the School in English  *</label><span style="color:red">Maximum Charter (36)</span>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_reg_sch_short_name" name="emis_reg_sch_short_name" 
                                                            placeholder=" School Name" maxlength ="36"required>
                                                           
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_name_alert"></div></font>
                                                             
                                                        </div>
                                                    </div> 
                                                </div> 
                                                <div class="col-md-6">
                                                   <label class="control-label">School Management Category *</label>
                                                    <div class="form-group">
                                                        <div class="" id="manage_cate_group">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_sch_manage_cate" name="emis_reg_sch_manage_cate" required>
                                                          <option value="" style="color:#bfbfbf;">select *</option>
                                                          <?php if(!empty($schoolcate)){
                                                                foreach ($schoolcate as $key => $sm) {?>
                                                                    <option value="<?=$sm->id?>"><?=$sm->manage_name;?></option>
                                                          <?php }}?>
                                                            </select> 
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_manage_cate_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <label class="control-label">School Management *</label>
                                                    <div class="form-group">
                                                        <div class="" id="management_group">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_sch_manage" name="emis_reg_sch_manage" required>
                                                          <option value="" style="color:#bfbfbf;">select *</option>
                                                          
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_manage_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <label class="control-label">School Department *</label>
                                                    <div class="form-group">
                                                        <div class="" id="department_group">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_sch_department" name="emis_reg_sch_department" required>
                                                          <option value="" style="color:#bfbfbf;">select *</option>
                                                          
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_department_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                   <label class="control-label">School Category *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_sch_category" name="emis_reg_sch_category" required>
                                                          <option value="" style="color:#bfbfbf;">select *</option>
                                                          <?php if(!empty($category)){
                                                                foreach ($category as $key => $sm) {?>
                                                                    <option value="<?=$sm->id?>"><?=$sm->category_name;?></option>
                                                          <?php }}?>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_department_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                        
                                            <div class="col-md-6">
                                                   <label class="control-label">School Type *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_sch_type" name="emis_reg_sch_type" required>
                                                          <option value="" style="color:#bfbfbf;">select *</option>
                                                            <option value="Boys">Boys</option>
                                                            <option value="Girls">Girls</option>
                                                            <option value="Co-Ed">Co-Ed</option>

                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_type_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <label class="control-label">Minority School *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_sch_minority" name="emis_reg_sch_minority" required>
                                                          <option value="" style="color:#bfbfbf;">select *</option>
                                                            <option value="1">Yes</option>
                                                            <option value="0">No</option>
                                                            <!-- <option value="Co-ed">Co-Ed</option> -->

                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_minority_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6" id="minority_group">
                                                   <label class="control-label">Minority School Group *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_sch_minority_group" name="emis_reg_sch_minority_group" >
                                                          <option value="" style="color:#bfbfbf;">select *</option>
                                                            
                                                            <!-- <option value="Co-ed">Co-Ed</option> -->
                                                            <?php if(!empty($minority_list)){
                                                                foreach ($minority_list as $key => $sm) {?>
                                                                    <option value="<?=$sm->id?>"><?=$sm->minority;?></option>
                                                          <?php }}?>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_minority_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6" id="minority_group1">
                                                   <label class="control-label">Vaild Upto Year *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_reg_sch_valid_upto" name="emis_reg_sch_valid_upto" 
                                                            placeholder="Renewal Valid" maxlength="4" onkeydown="return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )">
                                                           
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_valid_upto_alert"></div></font>
                                                             
                                                        </div>
                                                    </div> 
                                                </div>
                                                <div class="col-md-6">
                                                   <label class="control-label">RTE School *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_sch_rte" name="emis_reg_sch_rte">
                                                          <option value="" style="color:#bfbfbf;">select *</option>
                                                            <option value="1">Yes</option>
                                                            <option value="0">No</option>
                                                            <!-- <option value="Co-ed">Co-Ed</option> -->

                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_rte_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <label class="control-label">Lowest Class *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_sch_low" name="emis_reg_sch_low" required>
                                                          <option value="" style="color:#bfbfbf;">select *</option>
                                                            
                                                            <!-- <option value="Co-ed">Co-Ed</option> -->
                                                            <?php if(!empty($class_roma)){
                                                                foreach ($class_roma as $key => $sm) {?>
                                                                    <option value="<?=$sm['id']?>"><?=$sm['name'];?></option>
                                                          <?php }}?>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_minority_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <label class="control-label">Highest Class *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_sch_high" name="emis_reg_sch_high" required>
                                                          <option value="" style="color:#bfbfbf;">select *</option>
                                                            
                                                            <!-- <option value="Co-ed">Co-Ed</option> -->
                                                            <?php if(!empty($class_roma)){
                                                                foreach ($class_roma as $key => $sm) {?>
                                                                    <option value="<?=$sm['id']?>"><?=$sm['name'];?></option>
                                                          <?php }}?>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_minority_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-6">
                                                   <label class="control-label">Year Of Last Renewal *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <input type="text" patten="[0-9]"class="form-control" id="emis_reg_sch_renewal" name="emis_reg_sch_renewal"  maxlength="4" 
                                                            placeholder=" Last Renewal" >
                                                           
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_renewal_alert"></div></font>
                                                             
                                                        </div>
                                                    </div> 
                                                </div> 
                                                <div class="col-md-6">
                                                   <label class="control-label">Renewal Certificate Number / File Number *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_reg_sch_renewal_no" name="emis_reg_sch_renewal_no" 
                                                            placeholder=" Renewal File Number" >
                                                           
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_renewal_no_alert"></div></font>
                                                             
                                                        </div>
                                                    </div> 
                                                </div> 
                                                 <div class="col-md-6">
                                                   <label class="control-label">Latitude *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_reg_sch_Latitude" name="emis_reg_sch_Latitude"  
                                                            placeholder=" Latitude" required>
                                                           
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_Latitude_alert"></div></font>
                                                             
                                                        </div>
                                                    </div> 
                                                </div> 
                                                 <div class="col-md-6">
                                                   <label class="control-label">Longitude *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_reg_sch_Longitude" name="emis_reg_sch_Longitude"  
                                                            placeholder=" Longitude" required>
                                                           
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_Longitude_alert"></div></font>
                                                             
                                                        </div>
                                                    </div> 
                                                </div> 
                                                <div class="col-md-6">
                                                   <label class="control-label">Education District Name *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_sch_edu_id" name="emis_reg_sch_edu_id" required onchange="get_block(this.value);">
                                                          <option value="" style="color:#bfbfbf;">select *</option>
                                                            
                                                            <!-- <option value="Co-ed">Co-Ed</option> -->
                                                            <?php if(!empty($edu_dist_details)){
                                                                foreach ($edu_dist_details as $key => $sm) {?>
                                                                    <option value="<?=$sm->edu_dist_id;?>"><?=$sm->edu_dist_name;?></option>
                                                          <?php }}?>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_minority_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 ">
                                                   <label class="control-label">Block Name *</label>
                                                    <div class="form-group ">
                                                        <div class="block_group">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_sch_block_id" name="emis_reg_sch_block_id" required>
                                                          
                                                            </select>
                                                             
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>

                                        <br>
                                        </div>
                                    </div>
                                    <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">School Details</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                <div class="panel-body">
               
                                        <div class="row">
                                            <div class="col-md-6">
                                                   <label class="control-label">School Situated IN*</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" id="schoolarea" name="hill_frst" required="required">
                                                                        <option value="">Choose</option>
                                                                        <option value="1">In Forest/Hill area</option>
                                                                        <option value="2">Near Forest/Hill area</option>
                                                                        <option value="3">Near the High ways</option>
                                                                        <option value="4">Near Coastal Area</option>
                                                                        <option value="0">Not Applicable</option>
                                                                    </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_situated_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <label class="control-label">Email Address *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_reg_sch_email" name="emis_reg_sch_email" 
                                                            placeholder=" Email Address" required>
                                                           
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_email_alert"></div></font>
                                                             
                                                        </div>
                                                    </div> 
                                                </div> 
                                                <div class="col-md-6">
                                                   <label class="control-label">Residential School *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_sch_residential" name="emis_reg_sch_residential" required>
                                                          <option value="" style="color:#bfbfbf;">select *</option>
                                                            <option value="1">Yes</option>
                                                            <option value="0">No</option>
                                                            <!-- <option value="Co-ed">Co-Ed</option> -->

                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_weather_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6" id="resident_group">
                                                   <label class="control-label">Type of Residential School*</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_sch_residential_type" name="emis_reg_sch_residential_type" >
                                                          <option value="" style="color:#bfbfbf;">select *</option>
                                                            
                                                            <!-- <option value="Co-ed">Co-Ed</option> -->
                                                            <?php if(!empty($resitype)){
                                                                foreach ($resitype as $key => $sm) {?>
                                                                    <option value="<?=$sm->RESITYPE_ID?>"><?=$sm->RESITYPE_DESC;?></option>
                                                          <?php }}?>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_residential_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                   <label class="control-label">Anganwadi is Attached To School *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_sch_anganwadi" name="emis_reg_sch_anganwadi" required>
                                                          <option value="" style="color:#bfbfbf;">select *</option>
                                                            <option value="1">Yes</option>
                                                            <option value="0">No</option>
                                                            <!-- <option value="Co-ed">Co-Ed</option> -->

                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_weather_anganwadi_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="anganwadi_group">
                                                <div class="col-md-6" >
                                                   <label class="control-label">Anganwadi Number *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_reg_sch_anaganwadi_no" name="emis_reg_sch_anaganwadi_no" 
                                                            placeholder="Anganwadi Number" >
                                                           
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_anaganwadi_no_alert"></div></font>
                                                             
                                                        </div>
                                                    </div> 
                                                </div> 
                                                <div class="col-md-6">
                                                   <label class="control-label">Total Number of Workers *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_reg_sch_workers" name="emis_reg_sch_workers" 
                                                            placeholder="Total Number of Workers" >
                                                           
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_workers_alert"></div></font>
                                                             
                                                        </div>
                                                    </div> 
                                                </div> 
                                                <div class="col-md-6">
                                                   <label class="control-label">Total Number of Children *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_reg_sch_children"i name="emis_reg_sch_children" 
                                                            placeholder="Number of Children" >
                                                           
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_children_alert"></div></font>
                                                             
                                                        </div>
                                                    </div> 
                                                </div>
                                                </div> 
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                   <label class="control-label">Shift School *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_sch_shift" name="emis_reg_sch_shift" required>
                                                          <option value="" style="color:#bfbfbf;">select *</option>
                                                            <option value="1">Yes</option>
                                                            <option value="0">No</option>
                                                            <!-- <option value="Co-ed">Co-Ed</option> -->

                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_weather_anganwadi_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <label class="control-label">School for CWSN *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_sch_cwsn" name="emis_reg_sch_cwsn" required>
                                                          <option value="" style="color:#bfbfbf;">select *</option>
                                                            <option value="1">Yes</option>
                                                            <option value="0">No</option>
                                                            <!-- <option value="Co-ed">Co-Ed</option> -->

                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_sch_cwsn_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                         </div>
            </div>
             <div class="modal-footer">
          <button type="submit" class="btn btn-primary" >Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>
        </form>

        </div>
       
      </div>
      
    </div>
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

        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.js';?>" type="text/javascript"></script        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        
        

        <script type="text/javascript">
            $(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
    if(!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
    }
})
        </script>

        <script type="text/javascript">

            var school_details = <?=json_encode($schoollist);?>;
            var schoolmanagement = <?=json_encode($schoolmanagement);?>;
            var schooldepartment = <?=json_encode($schooldepartment);?>;
            function schooltab(school_id)
            {
                // console.log(school_details);
                var school_detail  = school_details.filter(sch=>sch.school_id == school_id)[0];
                    console.log(school_detail);
                    $("#sch_id").text(school_detail.school_name +'-'+school_detail.udise_code);
                    select_drop_value('emis_reg_sch_status',school_detail.curr_stat);
                    text_value('emis_reg_sch_old_status',school_detail.curr_stat);
                    text_value('emis_reg_sch_short_name',school_detail.sch_shortname);
                    text_value('school_id',school_id);
                    //School Management Details 
                    text_value('emis_reg_sch_name',school_detail.school_name);
                    $("#emis_reg_sch_manage_cate").val(school_detail.manage_cate_id).attr('selected','selected');
                    school_manage(school_detail.manage_cate_id,school_detail.sch_management_id);
                    school_department(school_detail.sch_management_id,school_detail.sch_directorate_id);
                    $("#emis_reg_sch_category").val(school_detail.sch_cate_id).attr('selected','selected');
                    select_drop_value('emis_reg_sch_type',school_detail.school_type);
                    select_drop_value('emis_reg_sch_minority',school_detail.minority_sch);
                    if(school_detail.minority_sch !=0){
                        id_show("minority_group");
                        id_show("minority_group1");
                        property_enable('emis_reg_sch_valid_upto','required',true);
                        property_enable('emis_reg_sch_minority_group','required',true);

                    select_drop_value('emis_reg_sch_minority_group',school_detail.minority_grp);
                    }else
                    {
                        id_hide("minority_group");
                        id_hide("minority_group1");
                        // property_enable('emis_reg_sch_valid_upto','required',false);
                        // property_enable('emis_reg_sch_minority','required',false);

                    }
                    select_drop_value('emis_reg_sch_edu_id',school_detail.edu_dist_id);
                    get_block(school_detail.edu_dist_id,school_detail.block_id);
                    text_value('emis_reg_sch_valid_upto',school_detail.renewal_valid);
                    select_drop_value('emis_reg_sch_rte',school_detail.rte);
                    select_drop_value('emis_reg_sch_low',school_detail.low_class);
                    select_drop_value('emis_reg_sch_high',school_detail.high_class);
                    text_value('emis_reg_sch_renewal',school_detail.yr_last_renwl);
                    text_value('emis_reg_sch_renewal_no',school_detail.certifi_no);
                    text_value('emis_reg_sch_Latitude',school_detail.latitude);
                    text_value('emis_reg_sch_Longitude',school_detail.longitude);
                    // School Details
                    select_drop_value('schoolarea',school_detail.hill_frst);
                    text_value('emis_reg_sch_email',school_detail.sch_email);
                    select_drop_value('emis_reg_sch_residential',school_detail.resid_schl);
                    if(school_detail.resid_schl !=0)
                    {
                        id_show("resident_group");
                        select_drop_value('emis_reg_sch_residential_type',school_detail.typ_resid_schl)
                        property_enable('emis_reg_sch_residential_type','required',true);
                    }else
                    {
                        id_hide('resident_group');
                    }
                    select_drop_value('emis_reg_sch_shift',school_detail.shftd_schl);
                    text_value('emis_reg_sch_anaganwadi_no',school_detail.anganwadi_center);
                    select_drop_value('emis_reg_sch_cwsn',school_detail.cwsn_scl);
                    select_drop_value('emis_reg_sch_anganwadi',school_detail.anganwadi);
                    if(school_detail.anganwadi !=0)
                    {
                        id_show('anganwadi_group');
                        property_enable('emis_reg_sch_anaganwadi_no','required',true);
                        property_enable('emis_reg_sch_workers','required',true);
                        property_enable('emis_reg_sch_children','required',true);
                    }else
                    {
                        id_hide('anganwadi_group');
                    }
                    text_value('emis_reg_sch_workers',school_detail.angan_wrks);
                    text_value('emis_reg_sch_children',school_detail.angan_childs);
                    $("#schoolModal").modal('show');
            }

            function select_drop_value(id,val)
            {
                $("#"+id).val(val).attr('selected','selected');
            }

            function text_value(id,val)
            {
                $("#"+id).val(val);
            }

            function property_enable(id,prop,flag)
            {
                $("#"+id).prop(prop,flag);
            }

            $("#emis_reg_sch_manage_cate").change(function()
            {
                var manage_data = $(this).val();
                school_manage(manage_data,'');
            })
            function school_manage(manage_cate_data,manage_id)
            {
                var manage = schoolmanagement.filter(mag=>mag.mana_cate_id == manage_cate_data);
                // console.log(manage);

                    var manage_data = '<select class="form-control" data-placeholder="Choose a Category" id="emis_reg_sch_manage" name="emis_reg_sch_manage" required="" ><option value="" style="color:#bfbfbf;">select *</option>';
                    $.each(manage,function(i,val)
                    {
                        manage_data += '<option value='+val.id+'>'+val.management+'</option>';
                    })
                    manage_data +="</select>";
                    $("#management_group").html(manage_data);
                    if(manage_id !='')
                    {
                        $("#emis_reg_sch_manage").val(manage_id).attr('selected','selected');
                    }
                    // school_department(manage_id,)
            }


            $(document).on('change','#emis_reg_sch_manage',function()
            {
                    var manage_id = $(this).val();
                    school_department(manage_id,'');
            })
            function school_department(manage_data,department_id)
            {
                // alert();
                console.log(manage_data);
                var department_data = schooldepartment.filter(dep=>dep.school_mana_id == manage_data);
                console.log(department_data);
                    var department_drop = '<select class="form-control" data-placeholder="Choose a Category" id="emis_reg_sch_department" name="emis_reg_sch_department" required=""><option value="" style="color:#bfbfbf;">select *</option>';
                $.each(department_data,function(i,val)
                {
                        department_drop +='<option value='+val.id+'>'+val.department+'</option>';
                })
                department_drop +='</select>';
                $('#department_group').html(department_drop);
                if(department_id !='')
                {
                    $("#emis_reg_sch_department").val(department_id).attr('selected','selected');
                }
            }
            function id_show(id)
            {
                $("#"+id).show();
            }
            function id_hide(id)
            {
                $("#"+id).hide();
            }


            function get_block(dist_id,block_id)
            {
                // console.log(block_id);

                if(dist_id !=''){

                    var data = {'table':'students_school_child_count','where':{'edu_dist_id':dist_id},'group':'block_id','select':['block_id','block_name']};
                    // console.log(data);
                    $(".block_group").empty();
                $.ajax({
                    method:"POST",
                    url:'<?=base_url()."Collector/get_drop_list"?>',
                    data:data,
                    dataType:'JSON',
                    success:function(res)
                    {
                        // console.log(res);
                        var block_drop = '<select class="form-control" data-placeholder="Choose a Category" id="emis_reg_sch_block_id" name="emis_reg_sch_block_id" required="">';
                            block_drop +='<option value="">Select</option>'
                        $.each(res,function(i,val)
                        {
                            block_drop += '<option value='+val.block_id+'>'+val.block_name+'</option>';
                        });

                        block_drop +='</select>';

                        $(".block_group").append(block_drop);

                        if(block_id !='')
                        {
                            select_drop_value('emis_reg_sch_block_id',block_id);
                        }

                    }
                    })
                }
            }

            $("#emis_reg_sch_residential").change(function()
            {
                if($(this).val() ==1){
                id_show('resident_group');
                        property_enable('emis_reg_sch_residential_type','required',true);

                }else
                {
                    id_hide('resident_group');
                        property_enable('emis_reg_sch_residential_type','required',false);

                }
            })
            $("#emis_reg_sch_minority").change(function()
            {
                if($(this).val()==1){
                 id_show('minority_group');
                 id_show('minority_group1');
                 property_enable('emis_reg_sch_valid_upto','required',true);
                        property_enable('emis_reg_sch_minority_group','required',true);

                }else
                {
                    id_hide('minority_group');
                    id_hide('minority_group1');
property_enable('emis_reg_sch_valid_upto','required',false);
                        property_enable('emis_reg_sch_minority_group','required',false);


                }
            })

            $("#emis_reg_sch_anganwadi").change(function()
            {
                if($(this).val()==1){
                 id_show('anganwadi_group');
                        property_enable('emis_reg_sch_anaganwadi_no','required',true);
                        property_enable('emis_reg_sch_workers','required',true);
                        property_enable('emis_reg_sch_children','required',true);

                }else
                {
                    id_hide('anganwadi_group');
                    property_enable('emis_reg_sch_anaganwadi_no','required',false);
                        property_enable('emis_reg_sch_workers','required',false);
                        property_enable('emis_reg_sch_children','required',false);

                }
            })
        </script>

    </body>

</html>