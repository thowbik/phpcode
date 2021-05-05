<!DOCTYPE html>

      <html lang="en">
             <!-- BEGIN HEAD -->
         <head>
         <style type="text/css">
            .panel-heading span {
             margin-top: -20px;
             font-size: 15px;
            }
            .tablecolor
            {
                background-color: #32c5d2; 
            }
        </style>
          
            
            <!-- BEGIN PAGE LEVEL PLUGINS -->
			<link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
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
                                    <h1>Staff List
                                       <small>Teacher on Deputation</small>
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
                                    <div class="portlet-body">
                                       <div class="mt-element-step">
                                          <div class="row step-thin">
                                          </div>
                                       </div>
                                    </div>
                                    <br>
                                    <div class="portlet-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i>
                                                            Teachers on Deputation (Past & Present)
                                                        </div>
                                                        <div class="tools"></div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th>Sno</th>
                                                                    <th>Name</th>
                                                                    <th>Category</th>
															        <th>Designation</th>
															        <th>Subjects</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i=1; foreach($staffdetails as $list){ ?>
                                                                <tr> 
                                                                    <td><?php echo $i++; ?></td>
                                                                    <td><a data-toggle="modal" data-target="#exampleModal" onclick="modelpopup('<?php echo $list->teacher_code;?>');"><?php echo $list->teacher_name;?></a></td>
                                                                    <td><?php echo $list->category;?></td>
                                                                    <td><?php echo $list->type_teacher;?></td>
                                                                    <td><?php echo $list->subjects;?></td>
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
         
            <div class="modal fade" id="exampleModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="width: 200%; margin:0px -310px;">
                        <div class="modal-header">
                            <div class="row">
                                <div class="col-md-5">
                                    <h3 class="modal-title" id="exampleModalLabel">Deputation Details</h3>
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-1">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                            </div>
                            
                        </div>
                        
                         <div class="modal-body">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h5 style="color: black;">Deputed Information</h5>
                                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                                </div>
                                <div class="panel-body">
                                     <div class="portlet-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i>
                                                            Deputed Staff List
                                                        </div>
                                                        <div class="tools"></div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover" id="sample_1">
							                              <thead>
											                 <tr>
                                                                <th>Sno</th>
                                                                <th>Teacher Code</th>
                                                                <th>Name</th>
                                                                <th>Deputation Place</th>
                                                                <th>District</th>
                                                                <th>School / Office</th>
                                                                <th>Deputed From</th>
                                                                <th>Deputed To</th>                 
			                                                  </tr>
				                                        </thead>
                                                                
						                               <tbody id="deputebody">
                                                            
                                                        </tbody>
                                                    </table>
                                                  </div>
                                                </div>
                                            </div>
                                         </div>
                                     </div>
                                  </div>
            
            
            
            
            <?php $this->load->view('scripts.php'); ?>
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
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
         <script>
            function modelpopup(teacher_code) {
               var a = teacher_code;
               $.ajax({
                    type:"POST",
                    url: baseurl+'Udise_staff/teacherdeputationview',
                    data: "&teacher_code="+a,
                    success: function(resp) {
                        var json = JSON.parse(resp);
                        var app = '';
                        var i=1;
                        for(var j=0;j<json.length;j++){
                            app+="<tr><td>"+i+"</td>"+
                            "<td>"+json[j]['teacher_code']+"</td>"+
                            "<td>"+json[j]['teacher_name']+"</td>"+
                            "<td>"+json[j]['place']+"</td>"+
                            "<td>"+json[j]['district_name']+"</td>"+
                            "<td>"+json[j]['school_name']+"</td>"+
                            "<td>"+json[j]['depute_frmdate']+"</td>"+
                            "<td>"+json[j]['depute_todate']+"</td>"+
                            "</tr>";
                        i++;}
                        document.getElementById('deputebody').innerHTML=app;
                        return true;
                    },
                    error: function(e){
                        alert('Error:' + e.responseText);
                        return false;
                    }
               })
            }
         </script>
         </body>
         
      </html>
	  
	  