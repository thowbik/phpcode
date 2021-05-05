<!DOCTYPE html>

      <html lang="en">
             <!-- BEGIN HEAD -->
         <head>
            <?php $this->load->view('head.php'); ?>
            <!-- BEGIN PAGE LEVEL PLUGINS -->
			<link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
			<link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-table/bootstrap-table.min.css';?>" rel="stylesheet" type="text/css" />
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
               
               <?php $this->load->view('header.php'); ?>
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
                                    
                                    <!-- <div class="m-heading-1 border-green m-bordered">
                                       <h3>Basic Information</h3>
                                       </div> -->
                                    <div class="portlet-body">
                                       <div class="mt-element-step">
                                          <div class="row step-thin">
                                             <!--<a href="<?php echo base_url().'Udise_staff/emis_school_staff1';?>">
                                                <div class="col-md-6 bg-grey mt-step-col">
                                                   <div class="mt-step-number bg-white font-grey">1</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Step1</div>
                                                   <div class="mt-step-content font-grey-cascade">Staff Abstract</div>
                                                </div>
                                             </a>-->
											 <!--<a href="<?php echo base_url().'Udise_staff/emis_school_staff2';?>">
                                                <div class="col-md-6 bg-grey mt-step-col ">
                                                   <div class="mt-step-number bg-white font-grey">1</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Step 1</div>
                                                   <div class="mt-step-content font-grey-cascade">Staff Registration</div>
                                                </div>
                                             </a>
                                             <a href="<?php echo base_url().'Udise_staff/emis_school_staff3';?>">
                                                <div class="col-md-6 bg-grey mt-step-col active">
                                                   <div class="mt-step-number bg-white font-grey">2</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Step2</div>
                                                   <div class="mt-step-content font-grey-cascade">Staff Information</div>
                                                </div>
                                             </a>-->
                                             
                                          </div>
                                       </div>
                                    </div>
                                    <br>
                                    
									
									<div class="portlet-body">
                                           
                                            <div class="row">
											
												<div class="col-md-12">
													<div class="portlet box green">
														<div class="portlet-title">
																<!--<div class="caption">
																<i class="fa fa-globe"></i>Teacher Details - List</div>-->
																<div class="caption">
                                                                <i class="fa fa-globe"></i>
                                                                Staff List
																 
																
																
				              
																	
							  
							 <!-- <a href="<?php echo base_url().'Udise_staff/emis_school_staffcurd';?>" 
                                   class="btn btn-sm green delete-class-section" 
                                                                        > 
                                                                             Curd
                                                                        </a>-->
							 
                           
                                                                   
																	
                                                            </div>
															
																<div class="tools"> </div>
															</div>
															<div class="portlet-body">
															
															
															<table class="table table-striped table-bordered table-hover" id="sample_2">
															<thead>
															<tr>
															<th>Sno</th>
															<!--<th>Teacher code</th>-->
                                                            <th>Name</th>
															
                                                            <th>Mobile Number</th>                       
                                                            <th>Email ID</th>										
                                                            <th>Reset</th> 
                                                                   
															</tr>
															</thead>
                                <?php if(!empty($reset_password_list)){?>
                              <tbody>
                                <?php foreach($reset_password_list as $index=> $password_list){?>
                                  <tr>
                                  <td><?=$index+1;?></td>
                                  <td><?=$password_list->teacher_name;?></td>
                                  <td><?=$password_list->mbl_nmbr;?></td>
                                  <td><?=$password_list->email_id;?></td>
                                  <td><a href="javascript:void(0);" onclick="save_reset_password(<?=$password_list->id?>)"><button type="button" class="btn btn-success btn-md ">Reset</button></td>
                                </tr>
															
                                  <?php } ?>
														</tbody>
                          <?php } ?>
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
            <?php $this->load->view('scripts.php'); ?>
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/moment.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/jquery.mockjax.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js';?>" type="text/javascript"></script>
            <!-- Js for hide and show the tables and datas -->
            <script src="<?php echo base_url().'asset/global/plugins/jquery.validate.min.js';?>"></script>
            <script src="<?php echo base_url().'asset/global/plugins/emis2.js';?>" type="text/javascript"></script>
            <!-- Js for hide and show the tables and datas ending-->

            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <!-- END PAGE LEVEL SCRIPTS -->
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
			
		<script>
		// created by vit //
		var base_url = "<?php echo base_url()?>";
    var reset_password_data = <?php echo json_encode($reset_password_list)?>;
	  function save_reset_password(reset_id)
	 
	  {

        // alert(reset_id);
		 
		  var reset_data = reset_password_data.filter(pass=>pass.id==reset_id)[0];

      reset_data['reset_flag'] = 0;

      // console.log(reset_data);
    //alert('Click Submit');
    swal({
        title: "Are you sure?",
        text: "Do you want to Reset The Teacher's Password?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, Reset!",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }, function(isConfirm){
    if (isConfirm)
    // console.log('if'); 
		$.ajax(
		{
			data:{'records':reset_data},
			url: base_url+'Home/send_reset_password_request',
			type:"POST",
			dataType:"JSON",
			success:function(res)
			{

        if(res.status){
				swal("OK", res.message, "success");
				window.location.reload();
        }
			}
		});
       // document.getElementById(frmid).submit();
    else
        swal("Cancelled", "Your cancelled the Teacher Transfer", "error");
    });	

		 
	  }

	  //end of the script//
	  </script>
			
			<!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
		
		 <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url().'asset/global/plugins/amcharts/amcharts/amcharts.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/amcharts/amcharts/serial.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/amcharts/amcharts/themes/light.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/amcharts/amcharts/themes/patterns.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->

         </body>


      </html>
	  
	  