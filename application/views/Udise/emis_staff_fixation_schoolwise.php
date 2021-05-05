<!DOCTYPE html>

      <html lang="en">
             <!-- BEGIN HEAD -->
         <head>
          <style type="text/css">
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
.dt-button-collection a.buttons-columnVisibility:before,
.dt-button-collection a.buttons-columnVisibility.active span:before {
    display:block;
    position:absolute;
    top:1.2em;
    left:0;
    width:12px;
    height:12px;
    box-sizing:border-box;
}


.dt-button-collection a.buttons-columnVisibility:before {
    content:' ';
    margin-top:-6px;
    margin-left:10px;
    border:1px solid black;
    border-radius:3px;
}

.dt-button-collection a.buttons-columnVisibility.active span:before {
    content:'\2714';
    margin-top:-11px;
    margin-left:12px;
    text-align:center;
    text-shadow:1px 1px #DDD, -1px -1px #DDD, 1px -1px #DDD, -1px 1px #DDD;
}

.dt-button-collection a.buttons-columnVisibility span {
    margin-left:20px;    
}


.sweet-alert {
    background-color: #ffffff;
    width: 478px;
    padding: 17px;
    border-radius: 5px;
    text-align: center;
    position: fixed;
    left: 50%;
    top: 50%;
    margin-left: -256px;
    margin-top: -200px;
    overflow: hidden;
    display: none;
    z-index: 100000000000000!important;
}
</style>
</style>
    <style type="text/css" media="print">
  @page { size: landscape; }
</style>
 <style type="text/css" media="file">
  @page { size: landscape; }
</style>
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
               <link href="<?php echo base_url().'asset/js/croppie-VIT/croppie.css'?>" rel="stylesheet" type="text/css"/>
        <?php $this->load->view('head.php'); ?>
            
			
        

  </head>
         <!-- END HEAD -->
         <body class="page-container-bg-solid page-md">
            <div class="page-wrapper">
                <?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
               <?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
               <?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 9) { ?>
               <?php $this->load->view('Ceo_District/header.php'); }else if($this->session->userdata('emis_user_type_id') == 6) { ?>
               <?php $this->load->view('beo_Block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 10) { ?>
               <?php $this->load->view('Deo_District/header.php'); }else{ ?>
               <?php $this->load->view('header.php'); }?>
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
                                    <h1>Scale Register
                                       <small></small>
                                    </h1>
                                 </div>
                                 <!-- END PAGE TITLE -->
                                 <!-- BEGIN PAGE TOOLBAR -->
                                 <div class="page-toolbar">
                                   <?php
                                    if($this->session->flashdata('teacher_update')) {
$message = $this->session->flashdata('teacher_update');

// echo $message;

  
                                     ?>
                                   <div class="alert alert-success" style="width: 300px;"><button class="close" data-close="alert"></button>
                                <?=$message;?></div>
                                    <!-- BEGIN THEME PANEL -->
                                    <!-- END THEME PANEL -->
                                  <?php } ?>
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
                                    <!-- <?php $this->load->view('emis_school_profile_header1.php'); ?> -->
                                    <!-- <div class="m-heading-1 border-green m-bordered">
                                       <h3>Basic Information</h3>
                                       </div> -->
                                    <br>
                                    
                                   <!--  <ul class="nav nav-tabs" style="text-align: center;">
                                        <li class="active"><a data-toggle="tab" onclick="view('schoolstaff');">School Staff</a></li>
                                        <li><a data-toggle="tab" onclick="view('deputedstaff');">Staff on Deputation</a></li>
                                        <li><a data-toggle="tab" onclick="view('volunteerteacher');">Volunteer Teacher</a></li>
                                    </ul> -->
									
									<div class="tabcontent portlet-body" id="schoolstaff">
                                           
                                            <div class="row">
											
												<div class="col-md-12">
													<div class="portlet box green">
														<div class="portlet-title">
																<!--<div class="caption">
																<i class="fa fa-globe"></i>Teacher Details - List</div>-->
																<div class="caption">
                                                                <i class="fa fa-globe"></i>
                                                                Scale Register
																 
																
																
				            
																	
							  
							 <!-- <a href="<?php echo base_url().'Udise_staff/emis_school_staffcurd';?>" 
                                   class="btn btn-sm green delete-class-section" 
                                                                        > 
                                                                             Curd
                                                                        </a>-->
							 
                           <span style="padding-left:500px;">
                         
                           <a type="button" class="dt-button buttons-print btn default" data-target="#staff_modal" data-toggle="modal"> 
                                                                             Add 
                                                                        </a>
                                                                   
                                  </span>
                                                                   
																	
                                                            </div>
															
																<div class="tools"> </div>
															</div>

															<div class="portlet-body">
															<ul class="nav nav-tabs nav-tabs-success faq-cat-tabs " id="myTab">
                <li class="active"><a href="#faq-cat-1" data-toggle="tab">Scale Register List</a></li>
                <li><a href="#faq-cat-2" data-toggle="tab">Scale Register Summary</a></li>
            </ul>

            <div class="tab-content faq-cat-content">
                <div class="tab-pane active in fade" id="faq-cat-1">
                  <table class="table table-striped table-bordered table-hover" id="sample_2">
                              <thead>
                              <tr>
                                  <th>Sno</th>
                                  <th>Name</th>
                                  <th>G.O Number</th>
                                  <th>G.O Date</th>
                                  <th>Appointed Subject</th>
                                  <th>Designation</th>
                                  <th>Surplus</th>  
                                  <th>Action</th>              
                              </tr>
                              </thead>
                              <tbody>
                              <?php  $i=1; ?>
                                                               <?php  foreach($staffdetails as $sd) {  ?>
                                 
                                   <tr>
                                        <td><?php echo $i;  ?> </td>
                                        <td><?php echo ($sd->teacher_id!=''?$sd->teacher_name:'Vacant');?></td>
                                        <td><?=$sd->go_number?></td>
                                        <td><?=date('d-m-Y',strtotime($sd->go_date));?></td>
                                        <td><?=$sd->subjects;?></td>
                                        <td><?=$sd->type_teacher;?></td>
                                        <td><?php if($sd->teacher_id!=''){?>
                                          <select name="surplus" class="form-control" id="surplus" onchange="updateSurplus(this.value,<?=$sd->id;?>,'Surplus Staff Entry',1,'Updated Staff Entry');">
                                            <option value="0" <?=$sd->surplus == 0 ? ' selected="selected"' : '';?>>No</option>
                                            <option value="1" <?=$sd->surplus == 1 ? ' selected="selected"' : '';?>>Yes</option>
                                          </select>
                                        <?php }?>
                                        </td>
                                              <td>

                                            <a href="javascript:void(0);" onclick="staff_edit(<?=$sd->id?>);"><i style="font-size:20px;color:blue;"class="fa fa-pencil-square-o"></i></a> &nbsp;&nbsp;&nbsp;

                                            <a href="javascript:void(0);" onclick="updateSurplus(<?=$sd->isactive;?>,<?=$sd->id;?>,'Delete Staff Details',2,'Deleted Staff Entry');"><i style="font-size:20px;color:red;"class="<?=$sd->isactive==1?'fa fa-trash':''?>"></i></a></td>

        
                                   </tr>
                                                               <?php $i++;   } ?>
                                                      
                            </tbody>
                            </table>
                </div>
                <div class="tab-pane fade" id="faq-cat-2">
                    
                        <div class="panel panel-default panel-faq">
                            <?php if(!empty($staff_summary)){?>
                              <table class="table table-striped table-bordered table-hover" id="sample_3">
                              <thead>
                              <tr>
                                  <th>Sno</th>
                                  
                                  <th>Designation</th>
                                  <th>Subject</th>  
                                  <th class="sum">Sanctioned </th>              
                                  <th class="sum">In Position</th>   
                                  <th class="sum">Vacant</th>   
                                  <th class="sum">Surplus</th>           

                              </tr>
                              </thead>
                              <tbody>
                              <?php  $i=1; ?>
                                                               <?php  foreach($staff_summary as $sd) {  ?>
                                 
                                   <tr>
                                        <td><?php echo $i;  ?> </td>
                                        <td><?=$sd->type_teacher;?></td>
                                        <td><?=$sd->subjects;?></td>
                                        <td class="center"><?=$sd->sanc;?></td>
                                        <td class="center"><?=$sd->in_position;?></td>
                                        <td class="center"><?=$sd->vacent;?></td>
                                        <td class="center"><?=$sd->surplus;?></td>

        
                                   </tr>
                                                               <?php $i++;   } ?>
                                                      
                            </tbody>
                            <tfoot>
                                  <th colspan="3">Total</th>
                                  <th class="center"></th>
                                  <th class="center"></th>
                                  <th class="center"></th>
                                  <th class="center"></th>
                                  

                            </tfoot>
                            </table>
                          <?php } else{?>
                            <center>No data Available!..</center><?php } ?>
                        </div>
                      </div>
                    
              </div>
															
															
																							 
														</div>
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


            <!------------ Teacher Edit Moadl----------------->
        
  <div class="modal fade" id="staff_modal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
            <div class="modal-header">
              <div class="row">
                <div class="col-md-6">
                    <h4 class="modal-title"><span id="staff_id">Scale Register</span></h4></div>
                    <div class="col-md-5 " >
                    <div class="form-group" id="cat">
                    <label class="control-label col-md-3"> Sanctioned Details* </label>
                      <div class="col-md-9">
                        <select class="form-control" id="emis_category" autocomplete="off" required onchange="category(this.value);">
                         
                          <option value="1">Filled Post</option>
                          <option value="2">Vacant Post</option>
                        </select>
                        <font style="color:#dd4b39;"><div id="emis_reg_staff_gender_alert"></div></font>
                      </div>
                    </div>

                  </div>
                  <div class="col-md-1">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  </div>
            </div>
          <div class="modal-body">
            <form action="<?=base_url().'Udise_staff/save_schoolwise_staff_fixation'?>" method="post">

              <input type="hidden" id="fix_id" name="fix_id">
                        <div class="row">
                          <div class="col-md-6 nonVac">
                  <div class="form-group">
                    <label class="control-label col-md-3"> Staff Details* </label>
                      <div class="col-md-9">
                        <select class="form-control" id="emis_reg_staff_id" name="emis_reg_staff_id" autocomplete="off" onchange="getTeacherType(this.value);">
                          <option value="" selected="selected">Select Staff</option>
                          <?php if(!empty($staff_name)){
                                  foreach($staff_name as $name){
                            ?>
                            <option value="<?=$name->teacher_code;?>"><?=$name->teacher_name;?></option>
                          <?php } }?>
                        </select>
                        <font style="color:#dd4b39;"><div id="emis_reg_staff_gender_alert"></div></font>
                      </div>
                    </div>
                  </div> 

                  <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label col-md-3"> Post Sanctioned* </label>
                      <div class="col-md-9">
                        <select class="form-control" id="emis_reg_staff_type" name="emis_reg_staff_type" autocomplete="off" onchange="validate(this.value)">
                          <option value="">Select</option>
                          <?php if(!empty($staff_cat)){
                                  foreach($staff_cat as $cat){
                            ?>
                            <option value="<?=$cat->id?>"><?=$cat->type_teacher;?></option>

                          <?php }}?>

                        </select>
                        <font style="color:#dd4b39;"><div id="emis_reg_staff_gender_alert"></div></font>
                      </div>
                    </div>
                  </div>
                </div>

                        
              <!--- 2 Row ---->


              <div class="row">
                
                <div class="col-md-6 " id="sub">
                  <div class="form-group">
                    <label class="control-label col-md-3"> Subject* </label>
                      <div class="col-md-9">
                        <select class="form-control" id="emis_reg_staff_subject" name="emis_reg_staff_subject" autocomplete="off" >
                          <option value="-1">Select Subject</option>
                          <?php if(!empty($subjects)){
                                  foreach($subjects as $sub){
                            ?>
                            <option value="<?=$sub->id;?>"><?=$sub->subjects;?></option>
                          <?php }}?>
                        </select>
                        <font style="color:#dd4b39;"><div id="emis_reg_staff_gender_alert"></div></font>
                      </div>
                    </div>
                  </div>  

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label col-md-3"> Account Head* </label>
                        <div class="col-md-9">
                          <select class="form-control" data-placeholder="Choose Blood Group" id="emis_reg_staff_acc_head" name="emis_reg_staff_acc_head" autocomplete="off"   >
                             <option value="" style="color:#bfbfbf;">select</option>
                             <?php foreach($head_account as $res) {   ?>
                             <option value="<?php echo $res->id; ?>"><?php echo $res->head_of_account; ?></option>
                                    <?php  } ?>
                          </select>
                          <font style="color:#dd4b39;"><div id="emis_reg_staff_bg_alert"></div></font>
                        </div>
                    </div>
                  </div>    
                  
              </div>
              <!---- 3 Row ---->

              <div class="row">
                          <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">G.O Number*</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="emis_reg_staff_go_no" name="emis_reg_staff_go_no" maxlength="60"  autocomplete="off" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    
                                                                     <font style="color:#dd4b39;"><div id="emis_reg_staff_fname_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">G.O Dept*</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="emis_reg_staff_go_dept" name="emis_reg_staff_go_dept"  autocomplete="off" required onkeyup="this.value=this.value.toUpperCase()">
                                    
                                                                     <font style="color:#dd4b39;"><div id="emis_reg_staff_fname_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                          </div>
                                                          <!--- 4th Row -->
                                                          <div class="row">
                                                            

                <div class="col-md-6">
                  <div class="form-group">
                    
                        
                                                                  <label class="control-label col-md-3">G.O Date*</label>
                                                                  <div class="col-md-9">
                                                                    
                                                      <input type="text" name="emis_reg_staff_go_date"  class="form-control date" id="emis_reg_staff_go_date" value="" autocomplete="off" placeholder="DD-MM-YYYY" onkeypress="return event.charCode >= 48"required />  
                                  
                                  <font style="color:#dd4b39;"><div id="emis_reg_staff_dob_alert"></div></font>
                                                           
                                                       
                                                   
                                                                  </div>
                                                               
                     </div>
                  </div> 
                  <div class="col-md-6">
                    <div class="form-group">
                    <label class="control-label col-md-3"> G.O Type* </label>
                      <div class="col-md-9">
                        <select class="form-control" id="emis_go_type"  name="emis_go_type" autocomplete="off" required>
                         
                          <option value="1">Permanent</option>
                          <option value="2">Temporary</option>
                        </select>
                        <font style="color:#dd4b39;"><div id="emis_reg_staff_gender_alert"></div></font>
                      </div>
                    </div>
                  </div>
                </div>
                <br/>
                <div class="row 2">
                  <h4><center>Last Post Continuance  Details</center></h4>
                          <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">G.O Number*</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="emis_reg_staff_go_temp_no" name="emis_reg_staff_go_temp_no" maxlength="60"  autocomplete="off"  onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    
                                                                     <font style="color:#dd4b39;"><div id="emis_reg_staff_fname_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">G.O Dept*</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="emis_reg_staff_go_temp_dept" name="emis_reg_staff_go_temp_dept"  autocomplete="off"  onkeyup="this.value=this.value.toUpperCase()">
                                    
                                                                     <font style="color:#dd4b39;"><div id="emis_reg_staff_fname_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                          </div>
                


                                                          <!--- 6th Row -->
                                                          <div class="row 2">
                                                            

                <div class="col-md-6">
                  <div class="form-group">
                    
                        
                                                                  <label class="control-label col-md-3">G.O Date*</label>
                                                                  <div class="col-md-9">
                                                                    
                                                      <input type="text" name="emis_reg_staff_go_temp_date"  class="form-control date" id="emis_reg_staff_go_temp_date" value="" autocomplete="off" placeholder="DD-MM-YYYY" onkeypress="return event.charCode >= 48" />  
                                  
                                  <font style="color:#dd4b39;"><div id="emis_reg_staff_dob_alert"></div></font>
                                                           
                                                       
                                                   
                                                                  </div>
                                                               
                     </div>
                  </div> 
                  <div class="col-md-6">
                    <div class="form-group">
                    
                        
                                                                  <label class="control-label col-md-3">G.O Continuance upto Date*</label>
                                                                  <div class="col-md-9">
                                                                    
                                                      <input type="text" name="emis_reg_staff_go_temp_up_date"  class="form-control date1" id="emis_reg_staff_go_temp_up_date" value="" autocomplete="off" placeholder="DD-MM-YYYY" onkeypress="return event.charCode >= 48" />  
                                  
                                  <font style="color:#dd4b39;"><div id="emis_reg_staff_dob_alert"></div></font>
                                                           
                                                       
                                                   
                                                                  </div>
                                                               
                     </div>
                  </div>
                </div>


                

              <div class="modal-footer" id="final_save">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" onclick="return save_valid();"class="btn btn-primary">Save</button>
          <div id="err_msg_save"></div>
        </div>
                      </form>
          </div>
        </div>
      </div>
    </div>
            <?php $this->load->view('footer.php'); ?>
            </div>
      
      

            
       

  



        <!----------------- END -------------------------->




            <?php $this->load->view('scripts.php'); ?>
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
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
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
                            <script src="<?php echo base_url().'asset/js/croppie-VIT/croppie.js'?>" type="text/javascript"></script>
                            <script src="<?php echo base_url().'asset/js/croppie-VIT/croppie.js'?>" type="text/javascript"></script>
                            <script src="<?php echo base_url().'asset/js/tamil-keyboard-VIT/js/utf.js'?>" type="text/javascript"></script>
                            <script src="<?php echo base_url().'asset/js/tamil-keyboard-VIT/js/tamil.js'?>" type="text/javascript"></script>
                            <script src="<?php echo base_url().'asset/js/vivekrao/generate.js';?>" type="text/javascript"></script>
    
                           
            <!-- Js for hide and show the tables and datas ending-->

            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <!-- END PAGE LEVEL SCRIPTS -->
            <script>
    $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        console.log(activeTab);
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
});
    </script>
            <script>
               var yesno = [];
               $.each({
                   "1": "Yes",
                   "2": "No"        
               }, function(k, v) {
                   yesno.push({
                       id: k,
                       text: v
                   });
               });
    
            </script>

            <script type="text/javascript">
             var table = '';
    $(document).ready(function()
{
   var table =  sum_dataTable('#sample_3',6);
   var table1 =  sum_dataTable('#sample_4',6);

   function sum_dataTable(dataId,col){
    // alert();
    table = $(dataId).DataTable({
      dom: 'Blfrtip',
      "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

      order: [[0, "asc"]],
            lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            pageLength: 10,
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
        
        buttons: [
                { extend: 'print', className: 'btn default' },
                { extend: 'pdf', className: 'btn default' },
                { extend: 'csv', className: 'btn default' },
               
    //             {
    //     extend: 'colvis',
       
    //     className: 'btn default',
    //     columnText: function ( dt, idx, title ) {

    //         return (idx+1)+': '+title;
    //     }
    // }
            ],
           columnDefs: [
            
    ],

    "footerCallback": function ( row, data, start, end, display ) {
        this.api().columns('.sum').every(function () {
            var column = this;
          var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
            var sum = column
               .data()
               .reduce(function (a, b) { 
                // console.log(a);
                   a = intVal(a, 10);
                   if(isNaN(a)){ a = 0; }
                   
                   b = intVal(b, 10);
                   if(isNaN(b)){ b = 0; }
                   
                   return a + b;
               });
column.selector.opts.page='current';
               var currentPage = column
               .data()
               .reduce(function (a, b) { 
                   a = parseInt(a, 10);
                   if(isNaN(a)){ a = 0; }
                   
                   b = parseInt(b, 10);
                   if(isNaN(b)){ b = 0; }
                   
                   return a + b;
               });
               
            sum = sum.toLocaleString(undefined, {maximumFractionDigits:3});
            $(column.footer()).html(sum);
                        });
            }
        });
    return table;
    }


      
        // console.log(table);
      table.columns( '.detail' ).visible( false );
      // $("#sample_3").css('display','table');
      $($.fn.dataTable.tables( true ) ).DataTable().columns.adjust().draw();
    table.responsive.recalc();
  
  //       console.log('i');
  //     table.on( 'order.dt search.dt', function () {
  //       table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
  //           cell.innerHTML = i+1;
  //       } );
  //   } ).draw();
  // },1000);
    // table.column(0).visible(false);
    

});
		</script>
		<script>
		// created by vit //
		var base_url = "<?php echo base_url()?>";
	  function transferactivate(uid,teacher_code)
	 
	  {
		 
		var teacher_id = {'uid':uid,'teacher_code':teacher_code};
    //alert('Click Submit');
    swal({
        title: "Are you sure?",
        text: "Do you want to Transfer Teacher?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, Transfer!",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }, function(isConfirm){
    if (isConfirm) 
		$.ajax(
		{
			data:{teacher_id:teacher_id},
			url: base_url+'Udise_staff/transfer_staff',
			type:"POST",
			dataType:"JSON",
			success:function(res)
			{
				swal("OK", "Your Transfer Updated Successfully", "success");
				window.location.reload();
			}
		});
       // document.getElementById(frmid).submit();
    else
        swal("Cancelled", "Your cancelled the Teacher Transfer", "error");
    });	

		 
	  }

	  //end of the script//
	  </script>
			
		
         </body>



         <script type="text/javascript">

           $("#staff_modal").on("hidden.bs.modal", function(){
    window.location.reload();
});
          // -------------------------Date Picker -----------
        $(document).ready(function(){
    // $('.display').dataTable();
    
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
           
 var curr = new Date();

// console.log(curr.getFullYear()-19); 
var first = new Date(curr.getFullYear() -69,'01','01');
var end = new Date(curr.getFullYear(),curr.getMonth(), curr.getDate()+1);

set_date('date');

// console.log(first,end);
 $('.date').datepicker("setStartDate",first);

$('.date').datepicker("setEndDate",end);
 // $(".datepicker").val(new Date());

      });

        set_date('date1');
        set_date('date2');
        set_date('date3');
        
        function set_date(id)
        {
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
 var curr = new Date();

var end = new Date(curr.getFullYear() ,curr.getMonth(), curr.getDate()+1);

          $("."+id).datepicker({
              
            });
// $('.'+id).datepicker("setEndDate",end);

        }
    </script>
    <script>




      var staff_details = <?=json_encode($staff_name);?>;

      var staff_list = <?=json_encode($staffdetails);?>;
      var status = '';
      hide_col(2,2);
      // console.log(staff_details);
         
        
      $(document).ready(function()
      {
        
          changeAttr('emis_reg_staff_acc_head','required',true);
          changeAttr('emis_reg_staff_type','required',true);
          changeAttr('emis_reg_staff_id','required',true);
          hide_col('sub',1);
          
      })

      //------------------- Data Append ----------------
       
      
      // --------------- Hide Function ----------------------------
      function hide_col(id,flag=1)
      {
        if(flag==1)
        {
            $("#"+id).hide();
        }else
        {
            $("."+id).hide();
        }
      }
      //------------------- Show Function -------------------------
      function show_col(id,flag=1)
      {
        if(flag==1)
        {
          $("#"+id).show();
        }else
        {
          $("."+id).show();
        }
      }

      //---------------- value appen ------------------------------


      function textVal(id,val)
      {
          $("#"+id).val(val);
      }

      function dropVal(id,val)
      {
          $("#"+id).val(val).attr('selected','selected');
      }

      function changeAttr(id,val,flag)
      {
          $("#"+id).attr(val,flag);
      }



      //------------------- Change Date Format ---------------------
      function change_date_format(change_date)
      {
        var date = new Date(change_date);
        var dob_month = date.getMonth()+1;
        var date_change = (date.getDate() < 10 ? '0'+date.getDate():date.getDate())+'-'+(dob_month < 10 ? '0'+dob_month:dob_month)
+'-'+date.getFullYear();
        // console.log(date_change);
        return date_change;
      }

          

      //----------------------- Teacher Type -----------------------

      function category(id){
        // alert();
          var cat = id;
          hide_col('sub');
          if(cat==2)
          {
            hide_col('nonVac',2);
            
          changeAttr('emis_reg_staff_acc_head','required',true);
          changeAttr('emis_reg_staff_type','required',true);
          show_col('sub');
          changeAttr('emis_reg_staff_id','required',false);
          changeAttr('emis_reg_staff_type','disabled',false);
          changeAttr('emis_reg_staff_subject','disabled',false);
          changeAttr('emis_reg_staff_acc_head','disabled',false);
          $('#emis_reg_staff_type').val('');
          $('#emis_reg_staff_subject').val('');
          $('#emis_reg_staff_acc_head').val('');

          }else{
            show_col('nonVac',2);

          }
      

          
      };


      function validate(id)
      {
        console.log(id);
           
           hide_col('sub');

          if(id==36 || id==11)
          {
            show_col('sub');
          }
      } 


      $("#emis_go_type").change(function()
      {
          var type = $(this).val();
          hide_col(2,2);
          if(type==2)
          {
            // console.log(type);
              $("."+type).show();


          }else
          {
            $("#emis_reg_staff_go_temp_no").val('');
            $("#emis_reg_staff_go_temp_dept").val('');
            $("#emis_reg_staff_go_temp_date").val('');
            $("#emis_reg_staff_go_temp_up_date").val('');
          }
      })
      function getTeacherType(id)
      {

        console.log(id);

          if(id !=0)
          {
          status = staff_list.filter(list=>list.teacher_id==id);
          
          var staff_detail = staff_details.filter(staff=>staff.teacher_code==id)[0];
          console.log(staff_detail);

          dropVal('emis_reg_staff_type',staff_detail.teacher_type);
          dropVal('emis_reg_staff_subject',staff_detail.appointed_subject);
          dropVal('emis_reg_staff_acc_head',staff_detail.head_account);
          show_col('sub',1);
          changeAttr('emis_reg_staff_type','disabled',true);
          changeAttr('emis_reg_staff_subject','disabled',true);
          changeAttr('emis_reg_staff_acc_head','disabled',true);
          


          changeAttr('emis_reg_staff_subject','required',false);
          changeAttr('emis_reg_staff_acc_head','required',false);
          changeAttr('emis_reg_staff_type','required',false);
          changeAttr('emis_reg_staff_id','required',false);
        }else
        {
            $('#emis_reg_staff_type').val('');
          $('#emis_reg_staff_subject').val('');
          $('#emis_reg_staff_acc_head').val('');
          changeAttr('emis_reg_staff_type','disabled',false);
          changeAttr('emis_reg_staff_subject','disabled',false);
          changeAttr('emis_reg_staff_acc_head','disabled',false);
           
          changeAttr('emis_reg_staff_acc_head','required',true);
          changeAttr('emis_reg_staff_type','required',true);
          changeAttr('emis_reg_staff_id','required',true);
        }


      }


      function save_valid()
      {
        $("#err_msg_save").html('');

      
   

    var type = $("#emis_go_type").val();
      var teacher_id = $("#emis_reg_staff_id").val();
      var staff_id = $("#fix_id").val();
      var cate = $("#emis_category").val();
      var type_teach = $("#emis_reg_staff_type").val();
      var subject = $("#emis_reg_staff_subject").val();
      var go_number = $("#emis_reg_staff_go_no").val();
      var go_dept = $("#emis_reg_staff_go_dept").val();
      var go_date = $("#emis_reg_staff_go_date").val();
      var acc_head = $("#emis_reg_staff_acc_head").val();
      

      
      if(cate==1)
      {
        var exits_staff = staff_list.filter(list=>list.teacher_id==teacher_id)[0] 
        // console.log(exits_staff.id);
        if(teacher_id=='' || go_number =='' || go_date =='' || go_dept=='')
        {
          $("#err_msg_save").html('<h5 style="color:red">Please Enter All Field</h5>');
              return false;
        }else if(exits_staff!==undefined && exits_staff['id'] !=staff_id)
        {
            $("#err_msg_save").html('<h5 style="color:red">Staff Already Exists</h5>');

              return false;
        }else if(!$.isNumeric(go_number))
        {
          $("#err_msg_save").html('<h5 style="color:red">Please Enter G.O Number (Only Number) Ex:12345</h5>');
              return false;
        }
      
      }else
      {

          var type_teach = $("#emis_reg_staff_type").val();
          if(type_teach =='' || go_number =='' || go_date =='' || go_dept=='' || acc_head =='')
          {
                $("#err_msg_save").html('<h5 style="color:red">Please Enter All Field</h5>');
              return false;
          }
          else if(type_teach ==11 || type_teach==36)
          {
              var subject = $("#emis_reg_staff_subject").val();

              if(subject=='-1')
              {
                  $("#err_msg_save").html('<h5 style="color:red">Please Enter All Field</h5>');
              return false;
              }
          }else if(!$.isNumeric(go_number))
          {
            $("#err_msg_save").html('<h5 style="color:red">Please Enter G.O Number (Only Number) Ex:12345</h5>');
                return false;
          }
      }


       if(type==2)
      {
        var temp_go_no = $("#emis_reg_staff_go_temp_no").val();
      var temp_dept = $("#emis_reg_staff_go_temp_dept").val();
      var temp_date = $("#emis_reg_staff_go_temp_date").val();
      var temp_upto_date = $("#emis_reg_staff_go_temp_up_date").val();
          if(temp_go_no==''|| temp_dept =='' || temp_date=='' || temp_upto_date=='')
          {
            $("#err_msg_save").html('<h5 style="color:red">Please Enter All Field</h5>');
            return false;
          }else if(!$.isNumeric(temp_go_no))
          {
            $("#err_msg_save").html('<h5 style="color:red">Please Enter G.O Number (Only Number) Ex:12345</h5>');
                return false;
          }
      }

      $("#final_save").html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:16px"></i>');
       changeAttr('emis_reg_staff_type','disabled',false);
          changeAttr('emis_reg_staff_subject','disabled',false);
          changeAttr('emis_reg_staff_acc_head','disabled',false);
          changeAttr('emis_reg_staff_id','disabled',false);
      $("form").submit();
      
      return true;
    }


    //Edit Staff

    


    


    function staff_edit(id)
    {
        var fix_staff = staff_list.filter(list=>list.id==id)[0];
        $("#cat").hide();
        $("#staff_id").html((fix_staff.teacher_id !=''?fix_staff.teacher_name:'Vacant'));

        if(fix_staff.teacher_id ==0)
        {
            category(2);
            validate(fix_staff.designation);
        }else
        {
            category(1);
            show_col('sub');
        }
        textVal('emis_category',(fix_staff.teacher_id !=''?1:2));
        textVal('fix_id',fix_staff.id);
        getTeacherType(fix_staff.teacher_id);
        changeAttr('emis_reg_staff_id','disabled',true);
        dropVal('emis_reg_staff_type',fix_staff.designation);
        dropVal('emis_reg_staff_acc_head',fix_staff.ac_head);
        dropVal('emis_reg_staff_subject',fix_staff.appt_subject);
         dropVal('emis_reg_staff_id',fix_staff.teacher_id);
        textVal('emis_reg_staff_go_no',fix_staff.go_number);
        textVal('emis_reg_staff_go_dept',fix_staff.go_dept);
        textVal('emis_reg_staff_go_date',(fix_staff.go_date !='0000-00-00'?change_date_format(fix_staff.go_date):''));

        textVal('emis_go_type',fix_staff.go_type);
        textVal('emis_reg_staff_go_temp_no',fix_staff.temp_go_number);
        textVal('emis_reg_staff_go_temp_dept',fix_staff.temp_go_dept);
        textVal('emis_reg_staff_go_temp_date',(fix_staff.temp_go_date !='0000-00-00'?change_date_format(fix_staff.temp_go_date):''));
        textVal('emis_reg_staff_go_temp_up_date',(fix_staff.temp_go_upto_date !='0000-00-00'?change_date_format(fix_staff.temp_go_upto_date):''));

        show_col(fix_staff.go_type,2);

        
        console.log(fix_staff);
        

        $("#staff_modal").modal('show');
    }



 // update Surplus 


    function updateSurplus(val,id,text,flag,after_text)
    {


        swal({
                title: "Are you sure?",
                text: text,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#ff0000",
                confirmButtonText: "Confirm",
                cancelButtonText:'Cancel',
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function(isConfirm){
                if (isConfirm)
                {
                  if(flag==1)
                  {
                    var data = {'surplus':val,'id':id};
                  }else
                  {
                    var data = {'isactive':(val==1?0:1),'id':id};
                  }
                    $("#confirm").html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:16px"></i>');
                    $.ajax(
                    {
                        method:"POST",
                        url:"<?=base_url().'Udise_staff/updateFixation'?>",
                        dataType:'JSON',
                        data:{'records':data,'table':'teacher_post'},
                        success:function(res)
                        {
                            // console.log(res);
                            swal({
                                title:"Successfully "+after_text,
                                type:'success',
                                confirmButtonText: "Ok",
                            },function(isConfirm)
                            {
                                window.location.reload();
                            })
                        }
                    })
                }
              });
    }




      
          
        
    </script>

      </html>
            
            

