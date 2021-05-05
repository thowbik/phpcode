<!DOCTYPE html>
<html lang="en">
        <!-- BEGIN HEAD -->
    <head>
          <style type="text/css">
            
            .center
            {
                text-align: center;
            }
            
            body.modal-open {
                overflow-y: hidden !important;
                position: fixed;
            }

.days { position: relative; }

.days::after { position: absolute;
                top: 7px;
                right: 3px;
                content: 'days';
}

.days:hover::after {
  right: 3px;
}

input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
            
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
                                    <h1>Training Details
                                       <small>Staff Training List</small>
                                    </h1>
                                 </div>
                                 <!-- END PAGE TITLE -->
                                 <!-- BEGIN PAGE TOOLBAR -->
                                 <div class="page-toolbar">
                                    <?php
                                        if($this->session->flashdata('teacher_update')) {
                                            $message = $this->session->flashdata('teacher_update');
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
                                    <br>
                                    
									<div class="tabcontent portlet-body" id="schoolstaff">
                                           
                                            <div class="row">
											
												<div class="col-md-12">
													<div class="portlet box green">
														<div class="portlet-title">
																<!--<div class="caption">
																<i class="fa fa-globe"></i>Teacher Details - List</div>-->
																<div class="caption"> <i class="fa fa-globe"></i> Staff Training Detail List </div>
                                                                <span class="pull-right" style="padding: 4px 2px;">
                                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#traineeModal" data-id=""><i class="glyphicon glyphicon-plus"></i> Add Training Details </button></span>
														<div class="tools"> </div>
													</div>

													<div class="portlet-body">
                                                            <br/><br/><br/>
															<table class="table table-striped table-bordered table-hover" id="sample_2">
                                                                    <thead>
                                                                        <tr>
                                                                           <th style="text-align: center !important;">S.NO</th>
                                                                           <th style="text-align: center !important;">Teacher Code</th>
                                                                           <th style="text-align: center !important;">Teacher Name</th>
                                                                           <th style="text-align: center !important;">Training Type</th>
                                                                           <th style="text-align: center !important;">Trained at</th>
                                                                           <th style="text-align: center !important;">Date</th>
                                                                           <th style="text-align: center !important;">No of Days In Training</th>
                                                                           <th style="text-align: center !important;">Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                       <?php $i=1; foreach($training_staff_list as $ts) { 
                                                                           $type = $ts->training_type_id == "0" ? 'Others ( '.$ts->training_other.' )':$ts->training_type; ?>
                                                                        <tr>
                                                                        <td style="text-align: center !important;"><?php echo $i++; ?></td>
                                                                        <td style="text-align: center !important;"><?php echo $ts->teacher_code; ?></td>
                                                                        <td><?php echo $ts->teacher_name; ?></td>
                                                                        <td><?php echo $type; ?></td>
                                                                        <td><?php echo $ts->trained_at; ?></td>
                                                                        <td><?php echo $ts->training_date; ?></td> 
                                                                        <td style="text-align: center !important;"><?php echo $ts->training_days; ?></td> 
                                                                        <td style="text-align: center !important;"><a href="#traineeModal" data-toggle="modal" data-id="<?php echo $ts->id; ?>"><i class="fa 2x fa-edit"></i></a></td>
                                                                        </tr>
                                                                       <?php } ?>
                                                                        
                                                                    
                                                                    </tbody>
														    </table>					 
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
        <?php $this->load->view('footer.php'); ?>
        </div>
      
         <!-- Modal -->
            <!------------------------Starts add Modal-------------------------->  
            <div class="modal fade" id="traineeModal"  role="dialog" aria-labelledby="traineeModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form id="traineeModalForm" action="<?php echo base_url().'Udise_staff/save_school_staff_training_details/' ?>" method="post">
                        <div class="modal-header">
                            <div class="row">
                                <div class="col-md-11">
                                    <h3 class="modal-title" id="traineeModalLabel"></h3>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="modalreset();">
                                            <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="modal-body">
                            
                            
                                   <div class="form-group col-md-12" >
                                   <div class="row" >
                                        <div class="col-md-12">
                                            <label class="control-label">Teacher Name </label>
                                                <select class="form-control" id="teachername" name="teachername" required="required">
                                                <option value="">Choose</option>
                                                            <?php foreach($staff_list as $t){ ?>
                                                                    <option value="<?php echo($t->teacher_code); ?>"><?php echo($t->teacher_name); ?></option>
                                                            <?php } ?>
                                                </select>
                                        </div>     
                                    </div>
                                    <div class="row" >
                                        <div class="col-md-6">
                                            <label class="control-label">Training Type </label>
                                            <select class="form-control" id="trainingtype" name="trainingtype" required="required">
                                                            <option value="">Choose</option>
                                                            <?php foreach($teacher_training_master_list as $ttm){ ?>
                                                                    <option value="<?php echo($ttm->id); ?>"><?php echo($ttm->training); ?></option>
                                                            <?php } ?>
                                                            <option value="0">Others</option>
                                                       <!-- <option value="CWSN Training Name">CWSN Training Name</option>
                                                       <option value="Computer and Training">Computer and Training</option>
                                                       <option value="Teaching Through Computers">Teaching Through Computers</option>
                                                       <option value="Others">Others</option> -->
                                            </select>
                                        </div>     

                                        <div id="specify_div" class="col-md-6" style="display: none;">
                                            <label class="control-label">Specify Other Training Type</label>
                                                <input type="text" id="othertrainingtype" name="othertrainingtype" class="form-control" />
                                        </div>     
                                    </div>
                                    <div class="row" >
                                        <div class="col-md-4">
                                            <label class="control-label">Trained at </label>
                                            <select class="form-control" id="trainedat" name="trainedat" required="required">
                                                       <option value="">Choose</option>
                                                       <option value="BRC">BRC</option>
                                                       <option value="CRC">CRC</option>
                                                       <option value="DIET">DIET</option>
                                                       <option value="Others">Others</option>
                                            </select>
                                        </div>     
                                        <div class="col-md-4">
                                                    <label>Start Date</label>
                                                    <input type="date" id="traineddate" name="traineddate" class="form-control" onkeydown="return false;" max="<?php echo (date('Y-m-d',strtotime('now')));?>" />
                                        </div>
                                        <div class="col-md-4">
                                                    <label>No of Days</label>
                                                    <div >
                                                        <input type="number" id="noofdays" name="noofdays"  class="form-control" onkeypress="return event.charCode >= 48"/>
                                                    </div>
                                        </div>
                                   </div>
                                   </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="hide_id" name="hdid"  value="0" />
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="modalreset();">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!------------------------End add Modal-------------------------->  

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
                <script>
                $("#trainingtype").change(function () {    
                        var type = $(this).val();
                        if(type == "0"){
                            $("#specify_div").show();
                        }
                        else{
                            $('#othertrainingtype').val('');
                            $("#specify_div").hide();
                        }
                        
                });
                function modalreset() {
                       $('#traineeModalForm').trigger("reset");
                }
                $(document).ready(function() {
                    $('#traineeModal').on('show.bs.modal', function(e) {
                            var id = $(e.relatedTarget).data('id');
                            if(id != ''){
                                $.ajax({
                                        type: "POST",
                                        url:baseurl+'Udise_staff/get_trainee_details',
                                        data:{'id':id},
                                        success: function(resp){
                                            $('#traineeModalLabel').text("Edit Training Details");
                                            var records = JSON.parse(resp);
                                            
                                           
                                            if(records.length>0){
                                                for(var i=0;i<records.length;i++){
                                                    $('#teachername').val(records[i].teacher_code);
                                                    $('#trainingtype').val(records[i].training_type);
                                                    if(records[i].training_type == "0"){
                                                        $('#othertrainingtype').val(records[i].training_other);
                                                        $("#specify_div").show();
                                                    }
                                                    else{
                                                        $('#othertrainingtype').val('');
                                                        $("#specify_div").hide();
                                                    }
                                                    $('#trainedat').val(records[i].trained_at);
                                                    $('#traineddate').val(records[i].training_date);
                                                    $('#traineddate').val(records[i].training_date);
                                                    $('#noofdays').val(records[i].training_days);
                                                    $('#hide_id').val(records[i].id);
                                                    
                                                }
                                            }                           
                                        }
                                        
                                    })
                            }
                            else{
                                $('#traineeModalForm').trigger("reset");
                                $('#traineeModalLabel').text("Add Training Details");
                            }
                            
                    });
                });

                </script>
                <!-- END PAGE LEVEL SCRIPTS -->

		
    </body>

</html>
	  
	  