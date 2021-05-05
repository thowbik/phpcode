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
                                    <h1>School Needs CSR
                                       <small>School Needs CSR List</small>
                                    </h1>
                                 </div>
                                 <!-- END PAGE TITLE -->
                                 <!-- BEGIN PAGE TOOLBAR -->
                                 <div class="page-toolbar">
                                   
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
																<div class="caption"> <i class="fa fa-globe"></i> School Needs CSR Detail List </div>
                                                                <span class="pull-right" style="padding: 4px 2px;">
                                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#traineeModal" data-id=""><i class="glyphicon glyphicon-plus"></i> Add Needs CSR Details </button></span>
														<div class="tools"> </div>
													</div>

													<div class="portlet-body">
                                                            <br/><br/><br/>
															<table class="table table-striped table-bordered table-hover" id="sample_2">
                                                                    <thead>
                                                                        <tr>
                                                                           <th style="text-align: center !important;">S.NO</th>
                                                                           <th style="text-align: center !important;">Items</th>
																		   	     <th style="text-align: center !important;">Description</th>
																		   <th style="text-align: center !important;">Quantity</th>
																	
																		   <th style="text-align: center !important;">Updated On</th>
																		   <th style="text-align: center !important;">Edit</th>
                                                                           
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $i=1; foreach($csr_material as  $ts) { 
                                                                            ?>
																			
                                                                        <tr>
																			<td style="text-align: center !important;"><?php echo $i++; ?></td>
																			<td><?php echo $ts->material_name; ?></td>
																			<td style="text-align: left"><?php echo $ts->DEscription; ?></td> 
																			<td style="text-align: center"><?php echo $ts->qty; ?></td> 
																			
																			<td><?php echo date('d-m-Y', strtotime($ts->created_on));?></td> 
																		
																			<td style="text-align: center !important;">
																			  <a href="#traineeModal" data-toggle="modal" data-id="<?php echo $ts->id; ?>">
																				<i class="fa 2x fa-edit"></i>
																			  </a>
																			  <a href="" onclick="trash(<?php echo $ts->id; ?>)">
																				<i class="fa 2x fa-trash" ></i>
																			  </a>
																			</td>
																			
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
                    <form id="traineeModalForm" action="<?php echo base_url().'Home/save_school_needs/' ?>" method="post">
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
                            
                            <?php// Print_r($csr_material_master); ?>
                                   <div class="form-group col-md-12" >
                                   <div class="row" >
                                        <div class="col-md-12">
                                            <label class="control-label">Items Name </label>
                                                <select class="form-control" id="itemnames" name="itemname"  required="required">
                                                <option value="" >Choose</option>
                                                            <?php foreach($csr_material_master as $t){ ?>
                                                              <option value="<?php echo($t->id);?>"><?php echo($t->material_name); ?></option>  
                                                             <?php } ?>
                                                </select>
                                        </div>     
                                    </div>
                 
                                    <div class="row"  id="item">
									<div class="col-md-12">
                                                    <label>Items</label>
                                                    <input type="text" id="itemname1" name ="itemname1" class="form-control"  />
                                        </div>
									</div>
                                    <div class="row" > 
                                        <div class="col-md-4">
                                                    <label>Quantity</label>
                                                    <input type="text" id="Quantity" name ="Quantity" class="form-control" maxlength ="1"  />
                                        </div>
										 <div class="col-md-4" id="cat">
                                                    <label>Category</label>
                                                    <select class="form-control" id="cate" name="cate" >
                                                <option value="" >Choose</option>
                                                            <?php foreach($cate as $c){ ?>
                                                              <option value="<?php echo($c->id);?>"><?php echo($c->cat_name); ?></option>  
                                                             <?php } ?>
                                                </select>
                                        </div>
										 <div class="col-md-4" id="scat">
                                                    <label>Sub Categorys</label>
                                                        <select class="form-control" id="sub_cate" name="sub_cate" >
                                                <option value="" >Choose</option>
                                                            <?php foreach($sub_cate as $s){ ?>
                                                              <option value="<?php echo($s->id);?>"><?php echo($s->sub_cat_name); ?></option>  
                                                             <?php } ?>
                                                </select>
                                        </div>
										 <div class="col-md-4" id="cate1">
                                                    <label>Category</label>
                                                     <input type="text" id="cate2" name ="cate2" class="form-control" readonly />
													 <input type="hidden" id="cate3" name ="cate3" class="form-control"  />
                                        </div>
										 <div class="col-md-4" id="sub_cate1">
                                                    <label>Sub Category</label>
                                                        <input type="text" id="sub_cate2" name ="sub_cate2" class="form-control" readonly />
														<input type="hidden" id="sub_cate3" name ="sub_cate3" class="form-control"  />
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
				
				
				$("#cate").change(function () 
				{  
					var category = $(this).val();
					
					 console.log(category);
								 
					var sub_category_arr = <?php echo json_encode($sub_cate); ?>;
					var sub_category_array = sub_category_arr.filter(function (e) {
									return e.cat_id == category;
							    });
									
					 $('#sub_cate').empty().append('<option value="">Select Sub Category</option>');
                                          
                     $.each(sub_category_array,function(id,val)
                             {
                               $('#sub_cate').append($('<option></option>').text(val.sub_cat_name).attr('value', val.sub_cat_id));
                             })
					
				});
				
				
				             $("#cat").hide();
							 $("#scat").hide();
							 $("#item").hide();
							 $("#cate1").hide();
							 $("#sub_cate1").hide();
							 
                $("#itemnames").change(function () 
				{  
				
                        var type = $(this).val();
					console.log(type);
						$("#scat").show();
						$("#cate1").val(0);
                        if(type == 500)
						{
							
							console.log(type);
							$("#item").show();
                            $("#cat").show();
							$("#scat").show(); 
							
							$("#cate1").hide();
							$("#sub_cate1").hide();	
							
							var arr = <?php echo json_encode($csr_material_master); ?>;
									var material_array = arr.filter(function (el) {
									return el.id == type ;
									 });
							console.log(material_array);		 
							$("#cate1").val(material_array[0].cat_id);
							$("#sub_cate1").val((material_array[0].sub_cat_id));
                        }
                        else
						{
							$("#item").hide();
                            $("#cat").hide();
							$("#scat").hide();
							
							$("#cate1").show();
							$("#sub_cate1").show();
							
						    var arr = <?php echo json_encode($csr_material_master); ?>;
							
							
							var material_array = arr.filter(function (e) {									
									  return e.id == type;
							});
								 
							if(material_array[0].cat_id != null && material_array[0].cat_id != "0"){
								var category_arr = <?php echo json_encode($cate); ?>;
								var category_array = category_arr.filter(function (e) {
                                console.log(category_arr);
										 return e.id == material_array[0].cat_id;
							        });
								$("#cate2").val(category_array[0].cat_name);
								$("#cate3").val(material_array[0].cat_id);
								
							}else{
								$("#cate2").val('');
							    $("#cate3").val('');
							}
							
                            if(material_array[0].sub_cat_id != null){							
								var sub_category_arr = <?php echo json_encode($sub_cate); ?>;
								var sub_category_array = sub_category_arr.filter(function (e) {
                                 console.log(sub_category_arr);
									return e.id == material_array[0].sub_cat_id;
							    });
								
								$("#sub_cate2").val(sub_category_array[0].sub_cat_name);
								$("#sub_cate3").val(material_array[0].sub_cat_id);
							}
							else{
								$("#sub_cate2").val('');	
								$("#sub_cate3").val('');
							}
									 
							// console.log(material_array);
							
						}
                        
                });
				
				 
				
				
                function modalreset() {
                       $('#traineeModalForm').trigger("reset");
                }
				
				function trash(id)
				{
				
				     $.ajax({
						 type: "POST",
						 url:baseurl+'Home/trash_needscsr_details',
                         data:{id:id}
						 })
				}
				
                $(document).ready(function() {
                    $('#traineeModal').on('show.bs.modal', function(e) {
                            var id = $(e.relatedTarget).data('id');
                            if(id != ''){
                                $.ajax({
                                        type: "POST",
                                        url:baseurl+'Home/get_needscsr_details',
                                        data:{'id':id},
                                        success: function(resp){
                                            $('#traineeModalLabel').text("Edit Needs CSR Details");
                                            var records = JSON.parse(resp);
                                            
                                           //console.log(records);
										   
                                            if(records.length>0){
												$("#scat").show();
						                        $("#cate1").val(0);
												
                                                for(var i=0;i<records.length;i++){
                                                    console.log(records);
                                                    $("#itemnames").val(records[i].mat_id);	                          
                                                    // var arr = <?php echo json_encode($csr_material_master); ?>;
															// var material_array = arr.filter(function (el) {
															// return el.id == records[i].mat_id ;
													// });
						
														if(records[i].mat_id == 500)
														{
															$("#cat").show();
															$("#scat").show(); 
															$("#item").show();
															$("#itemname1").val(records[i].created_by)
															$("#cate1").hide();
															$("#sub_cate1").hide();	
															$("#cate").val(records[i].cat_id);
															$("#sub_cate").val((records[i].sub_cat_id));
														}
														else
														{
														   
															$("#item").hide();
															$("#cate2").val(records[i].cat_name);
															$("#sub_cate2").val((records[i].sub_cat_name));
															$("#cate3").val(records[i].cat_id);
															$("#sub_cate3").val((records[i].sub_cat_id));
															$("#cat").hide();
															$("#scat").hide();
															$("#cate1").show();
															$("#sub_cate1").show();
														}
                                                    
                                                   
                                                    $('#Quantity').val(records[i].qty);
                                                    
                                                    
                                                }
                                            }  

											
                                        }
                                        
                                    })
                            }
                            else{
                                $('#traineeModalForm').trigger("reset");
                                $('#traineeModalLabel').text("Add Needs CSR Details");
								
                            }
                            
                    });
                });

                </script>
                <!-- END PAGE LEVEL SCRIPTS -->

		
    </body>

</html>
	  
	  