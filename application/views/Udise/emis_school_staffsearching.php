<!DOCTYPE html>
<!-- Created by Vit for staff transfer-->
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
               <?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
               <?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
               <?php $this->load->view('block/header.php'); }else{ ?>
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
                                    <h1>Debuted List
                                       <small>Created Debuted List</small>
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
									 <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Staff Unique Search</span>
                                                </div>
                                            </div>

                                           <div class="portlet-body">
                                    <div class="row">
									<div class="col-md-offset-4 col-md-4 thumbnail" ><center>
                                                   <form method="post" action="<?php echo base_url().'Udise_staff/emis_school_staffsearching';?>">
                                                    <div class="form-group">
                                                    <label class="control-label">Enter Aadhaar Number</label>
                                                        <input type="tel" max="12" min="12" class="form-control" id="emis_staff_search_adhaar" name="emis_staff_search_adhaar" style="width: 60%"  placeholder="Aadhaar Number" required="" >
                                                         <font style="color:#dd4b39;"><div id="emis_stu_search_adhaar_alert"></div></font>
                                                         <br/>
                                                          <button type="submit" class="btn green" id="emis_stu_searchsep_sub">Search</button> 
                                                    </div>
													
                                                    </form></center>
													<?php
													if(!empty($emis_staff_search_adhaar))
													{?>
													<div>
													<h4><center>Aadhar No&nbsp;&nbsp;:&nbsp;&nbsp;<?=$emis_staff_search_adhaar?></center></h4>
													</div>
													<?php }?>
                                                </div>
												</div>
												</div>
												</div>
												
									<div class="portlet-body">
                                           
                                            <div class="row">
											
												<div class="col-md-12">
													<div class="portlet box green">
														<div class="portlet-title">
																
																<div class="caption">
                                                                <i class="fa fa-globe"></i>
                                                                Transfer List
                                                            </div>
																<div class="tools"> </div>
															</div>
															<div class="portlet-body">
															
															
															<table class="table table-striped table-bordered table-hover" id="sample_2">
															<thead>
															<tr>
															<th>Sno</th>
															<th>Teacher code</th>
                                                            <th>Name</th>
															
                                                             <th>Category</th>
															<th>Designation</th>
															<th>Professional</th>
                                                            <th>Main Subjects</th>
															<th>DOJ(Present School)</th>
															<th>Admit</th>															 
                                                                   
															</tr>
															</thead>
															<tbody>
															<?php  $i=1; ?>
															
                                                               <?php if(!empty($transferstaffdetails)){foreach($transferstaffdetails as $sd) {  ?>
                                                               <tr>
                                                                    <td><?php echo $i;  ?> </td>
																	  <td><?php echo $sd->teacher_code; ?></td>
                                                                      <?php 
                                                                        $u_id = $sd->u_id;
                                                                       ?>
                                                                    <td>
																	<?php
																	$category = $sd->category;
																	 if ($category==1) { ?>
																	<a href="<?php echo base_url().'Udise_staff/emis_school_staffdata/'.$u_id;?>" target="_blank"><?php echo $sd->teacher_name;  ?></a>
																	 <?php }else{?>
																	 <a href="<?php echo base_url().'Udise_staff/emis_school_staffdatas/'.$u_id;?>" target="_blank"><?php echo $sd->teacher_name;  ?></a>
																	<?php 
																	 }?></td>
																	 
																    <td>
                                                                    <?php $category = $sd->category;
                                                                        if($category ==1) echo 'Teaching'; else echo 'Non-Teaching';
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                      <?php echo $sd->type_teacher; ?>
                                                                    </td>
                                                                    <td><?php $professional = $sd->professional;
                                                                        if($professional ==1) echo 'D.T.Ed./S.G.T.T.'; elseif($professional ==2) echo 'B.Ed.';
                                                                        else if($professional==3) echo 'M.Ed.';else if($professional==4) echo 'B.Ed.(Spl.Edn.)';
                                                                        else if($professional==5) echo 'B.P.Ed';else if($professional==6) echo 'B.P.E.S.';
                                                                        else if($professional==7) echo 'M.P.E.S.';else if($professional==8) echo 'Others';
                                                                        else if($professional==9) echo 'Not Applicable';else if($professional==10) echo 'B.M.S.';
                                                                        else if($professional==11) echo 'M.P.Ed.';
                                                                     ?></td>
                                                                    <td><?php echo $sd->subjects; ?></td>
                                                                    
                                                                    
                                                                    <td>
                                                                        <?php 
                                                                            $staff_psjoin= $sd->staff_psjoin;
                                                                            echo (date('d-m-Y', strtotime($staff_psjoin)));
                                                                        ?>
                                                                     </td>
																	 <!--'<?php echo $sd->u_id; ?>','<?php echo $sd->teacher_code; ?>'-->
                                                                   <td><a href="javascript:;" onclick="admittransfer('<?php echo $sd->u_id; ?>','<?php echo $sd->school_key_id; ?>','<?php echo $sd->teacher_code; ?>');" class="btn btn-sm green edit-class-section" data-class-section-id ="<?php echo $d->id;  ?>"> Admit <i class="fa fa-sign-in"></i></a>
                                                                    </td>

                                                               </tr>
                                                               <?php $i++;  } } ?>
                                                      
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
	  function admittransfer(uid,school_key_id,teacher_code)
	 
	  {
		
		 
		var u_id = {'uid':uid,'school_key_id':school_key_id,'teacher_code':teacher_code};
    //alert('Click Submit');
    swal({
        title: "Are you sure?",
        text: "Do you want to Admit?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, Admit!",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }, function(isConfirm){
    if (isConfirm) 
		$.ajax(
		{
			data:{u_id:u_id},
			url: base_url+'Udise_staff/admit_staff_transfer',
			type:"POST",
			dataType:"JSON",
			success:function(res)
			{
				swal("OK", "Your Admit Updated Successfully", "success");
				window.location.reload();
			}
		});
       // document.getElementById(frmid).submit();
    else
        swal("Cancelled", "Your cancelled the teacher Admit", "error");
    });	

		 // alert(uid);
		 // alert(teachercode);
	  }
	  //end of the script//
	  </script>-->
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