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


        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            


            
<?php $this->load->view('block/header.php'); ?>


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
										
                                            <small>School profile Verification</small>
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
                                     
                                         
                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Class-wise No. of Student Available in Class</span>
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
                                             <!-- searchable -->
                                          <div class="row">   
                                         <div class="col-md-3">										  
                                        
													</div>
                                               </div>
                                           

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
													
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
																  
																   <th style="display:none">School Id</th>
																   <th>Udise Code</th>
                                                                    <th>School Name</th>
                                                                    <th>Pre KG</th>
                                                                    <th>LKG</th>
																	<th>UKG</th>
																	<th>I</th>
																	<th>II</th>
																	<th>III</th>
																	<th>IV</th>
																	<th>V</th>
																	<th>VI</th>
																	<th>VII</th>
																	<th>VIII</th>
                                                                    <th> Action </th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                             <?php                                                           
                                                              $i=1;
                                                              foreach($schoollist as $sl)
															   {
																   
																 
																		?>
                                                               <tr>
                                                                     
                                                                    <td style="display:none";><?php echo $sl->school_id;  ?></td>
													
																    <td><?php echo $sl->udise_code;  ?>
                                                                    
                                                                    <td readonly><?php echo $sl->school_name;  ?>
																	<input type="hidden"  id="schoolid<?php echo $i;?>" value="<?php echo $sl->school_id;;?>"></td>
                                                                    
																	<td><?php echo $sl->PREKG;  ?>
																	</td>
                                                                   
																	<td ><?php echo $sl->LKG;  ?>
																	<input type="hidden" class="medium" id="medium<?php echo $i;?>" value="<?php echo $sl->UKG;?>"></td>
																	<td><?php echo $sl->UKG;  ?></td>
																	<td><?php echo $sl->class_1;  ?></td>
																	<td><?php echo $sl->class_2;  ?></td>
																	<td><?php echo $sl->class_3;  ?></td>
																	<td><?php echo $sl->class_4;  ?></td>
																	<td><?php echo $sl->class_5;  ?></td>
																	<td><?php echo $sl->class_6;  ?></td>
																	<td><?php echo $sl->class_7;  ?></td>
																	<td><?php echo $sl->class_8;  ?></td>
																	<?php
																	if($sl->verification_status==1)
																	{
																		?>
																		<td ><a href="javascript:;" class="btn btn-sm yellow edit-class-section" id="edit<?php echo $i; ?>" style="background: green;"  contenteditable="false" data-class-section-id ="<?php echo $i;  ?>">Verified <!--<i class="fa fa-edit"></i>--></a>
																	
                                                                    </td>
																	<?php	
																	}
																	
																	else
																	{
																		?>
                                                                    <td><a href="javascript:;" class="btn btn-sm green edit-class-section" id="edit<?php echo $i; ?>" onclick="verification(<?php echo $sl->udise_code ?>)"  contenteditable="false" data-class-section-id ="<?php echo $i;  ?>">Verification <!--<i class="fa fa-edit"></i>--></a>
																	
                                                                    </td>
																	<?php
																	}
																?>
																	
                                                                    

                                                               </tr>
                                                               <?php $i++;  }  ?>
                                                             
                                                            </tbody>
															
                                                        </table>
														 
                                                    </div>
													
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

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
           
          

           
               
               
             
   
	 /* this function saved the edit data in database */
   function verification(udise_code)  
		 {
			
	var records = {'udise_code':udise_code};
				$.ajax(
				{
					data:{'records':records},
					url:baseurl+'Block/emis_block_verification',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						swal("OK", "School verified Successfully", "success");
						window.location.reload();
					}
				});
		 
		 // else if( i == 0)
              // {
                   // swal("OK", "School Information is Already Exist",  "error");
					// window.location.reload(); 
					
              // }	
		 }
    

        </script>

    </body>

</html>