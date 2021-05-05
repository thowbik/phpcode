<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>

        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->

        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />



        <?php $this->load->view('head.php'); ?>



        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

<?php $this->load->view('corporation/header.php'); ?>


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
                                        <h1>Special Report for Schools</h1>
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
                                <div class=""><!--container-->
                                    <!-- BEGIN PAGE CONTENT INNER -->

                                    <div class="page-content-inner">
									
									<div class="portlet-body">
									
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-2">
												</div>
												<div class="col-md-10">
												<a  onclick="">
													<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
														<div class="dashboard-stat2 ">
															<div class="display">
																<div class="number">
																	<h3 class="font-green-sharp">
																	<?php $schoolcount=0; ?>
																		<span data-counter="counterup" data-value="34"><?php if(!empty($special_schools)){  foreach($special_schools as $det){
																			$schoolcount=$schoolcount+$det->schoolcount;
																		}} ?>
																		<?php echo number_format($schoolcount);?>
																		</span>
                                                               
																	</h3>
																	<!--<small class="font-purple">Total Teacher Count</small>-->
																</div>
																<div class="icon">
																	<i class="icon-pie-chart"></i>
																</div>
															</div>
															<div class="progress-info">
																<!--  <div class="progress">
																<span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                                                <span class="sr-only">76% progress</span>
																</span>
																</div> -->
																<div class="status">
																	<div class="status-title">SCHOOL RESULTS COUNT</div>
																	<!-- <div class="status-number"> 76% </div> -->
																</div>
															</div>
														</div>
													</div>
												</a>
												
												<a  onclick="">
													<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
														<div class="dashboard-stat2 ">
															<div class="display">
																<div class="number">
																	<h3 class="font-green-sharp">
																	<?php $teachercount=0; ?>
																		<span data-counter="counterup" data-value="34"><?php if(!empty($special_schools)){  foreach($special_schools as $det){$teachercount=$teachercount+$det->teachercount;}} ?>
																		<?php echo number_format($teachercount);?>
																		</span>
                                                               
																	</h3>
																	<!--<small class="font-purple">Total Teacher Count</small>-->
																</div>
																<div class="icon">
																	<i class="icon-pie-chart"></i>
																</div>
															</div>
															<div class="progress-info">
																<!--  <div class="progress">
																<span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                                                <span class="sr-only">76% progress</span>
																</span>
																</div> -->
																<div class="status">
																	<div class="status-title">TEACHER RESULTS COUNT</div>
																	<!-- <div class="status-number"> 76% </div> -->
																</div>
															</div>
														</div>
													</div>
												</a>

												<a  onclick="">
													<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
														<div class="dashboard-stat2 ">
															<div class="display">
																<div class="number">
																	<h3 class="font-green-sharp">
																	<?php $nonteachercount=0; ?>
																		<span data-counter="counterup" data-value="34"><?php if(!empty($special_schools)){  foreach($special_schools as $det){$nonteachercount=$nonteachercount+$det->nonteachercount;}} ?>
																		<?php echo number_format($nonteachercount);?>
																		</span>
                                                               
																	</h3>
																	<!--<small class="font-purple">Total Teacher Count</small>-->
																</div>
																<div class="icon">
																	<i class="icon-pie-chart"></i>
																</div>
															</div>
															<div class="progress-info">
																<!--  <div class="progress">
																<span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                                                <span class="sr-only">76% progress</span>
																</span>
																</div> -->
																<div class="status">
																	<div class="status-title">NON TEACHER RESULTS COUNT</div>
																	<!-- <div class="status-number"> 76% </div> -->
																</div>
															</div>
														</div>
													</div>
												</a>
												
												
											</div>
											
											
											</div>
										</div>
									</div>
								
										 
                                        <div class="col-md-12">
											<div class="col-md-2">
												<div class="portlet box" >
                                                    
														
													<div class="portlet-body" >
														<div class="form-group">
															<div class="page-title">
																<h4>Filter</h4>
																
															</div>
															<form action="<?php echo base_url(); ?>corporation/schoolcatemanagefil" method="POST">
															<label class="control-label bold">School Type</label>
															
                                                    
															<div class="">
															<input type="radio" id="emis_state_report_schcate1" name="emis_state_report_schcate" value="Government" <?php if($manage=='Government'){echo "checked=checked";}?>>Government<br/>
															<input type="radio" id="emis_state_report_schcate2" name="emis_state_report_schcate" value="Fully Aided" <?php if($manage=='Fully Aided'){echo "checked=checked";}?>>Fully Aided<br/>
															<input type="radio" id="emis_state_report_schcate3" name="emis_state_report_schcate" value="Un-aided" <?php if($manage=='Un-aided'){echo "checked=checked";}?>>Unaided<br/>
															<input type="radio" id="emis_state_report_schcate4" name="emis_state_report_schcate" value="Central Govt" <?php if($manage=='Central Govt'){echo "checked=checked";}?>>Central Govt<br/>
															<input type="radio" id="emis_state_report_schcate5" name="emis_state_report_schcate" value="Partially Aided" <?php if($manage=='Partially Aided'){echo "checked=checked";}?>>Partially Aided
															</div>
														
															
															<div class="form-group">
															<label class="control-label bold" id="category">Category Type</label>
															<div class="" >
															<input type="radio" id="emis_state_report_schmgtype1" name="emis_state_report_schmgtype" value="Primary School" <?php if($cate=='Primary School'){echo "checked=checked";}?>>Primary<br/>
															
															<input type="radio" id="emis_state_report_schmgtype2" name="emis_state_report_schmgtype" value="Middle School" <?php if($cate=='Middle School'){echo "checked=checked";}?> >Middle<br/>
															
															<input type="radio" id="emis_state_report_schmgtype3" name="emis_state_report_schmgtype" value="High School" <?php if($cate=='High School'){echo "checked=checked";}?>>High School<br/>
															
															<input type="radio" id="emis_state_report_schmgtype4" name="emis_state_report_schmgtype" value="Higher Secondary School" <?php if($cate=='Higher Secondary School'){echo "checked=checked";}?>>Higher Secondary
															<br/><input type="radio" id="emis_state_report_schmgtype5" name="emis_state_report_schmgtype" value="Special School" <?php if($cate=='Special School'){echo "checked=checked";}?> >Special School
															</div>

														</div>
															<div id="msg"></div>
															<!--<font style="color:#dd4b39;"><div id="msg"></div></font>-->
															
															<div class="form-group" >
															<label class="control-label bold">Student Total count - less than - <?=$id1 !=''?$id1:'';?></label>
                                                    
																<div class="">
																<input type="number" class="form-control" id="emis_state_special_search" name="emis_state_special_search"  placeholder="Type the number" min="1" maxlength="4"  onKeyDown="if(this.value.length==4 && event.keyCode!=8) return false;"value="<?=$id1;?>"/>
																<!-- <input class="bar" type="range" id="student_count" value="0"/> -->

																<!--<font style="color:#dd4b39;"><div id="emis_state_report_schmanage_alert"></div></font>-->
															</div>
															
															</div>
															<div class="form-group">
																<button type="submit" class="btn green btn-lg" onclick="return searchfilter();" >Submit</button><!---->
															</div>
															<!--<div id="msg1"></div><div id="msg2"></div><div id="msg3"></div><div id="msg4"></div><div id="msg5"></div><div id="msg6"></div><div id="msg7"></div><div id="msg8"></div>-->
														</form>

														</div>
														</div>
													
													</div>
													</div>
													
                                                    <div class="col-md-10">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> Student Class wise - Special Report </div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">

                                                        <?php $pre_tot=0;$lkg_tot=0;$ukg_tot=0;$c1_tot=0;$c2_tot=0;$c3_tot=0;$c4_tot=0;$c5_tot=0;$c6_tot=0;$c7_tot=0;$c8_tot=0;$c9_tot=0;$c10_tot=0;$c11_tot=0;$c12_tot=0; ?>
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.no</th>
                                                                    <th>Udise code</th>
																	<th>District</th>
																	<th>Block</th>
																	<!--<th>Education district name</th>
																	<th>Category name</th>-->
                                                                    <th>School name </th> 
																	<th> PREKG</th>
																	<th> LKG</th>
																	<th> UKG</th>
                                                                    <th> I</th>
                                                                    <th>II</th>
                                                                    <th>III</th>
                                                                    <th>IV</th>
                                                                    <th>V</th>
                                                                    <th>VI</th>
                                                                    <th>VII</th>
                                                                    <th>VIII</th>
                                                                    <th>IX</th>
                                                                    <th>X</th>
                                                                    <th>XI</th>
                                                                    <th>XII</th> 
                                                                    <th>Total</th>
																	<th>Teacher count</th>
																	<th>Non Teacher count</th>

                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                               
                                                            <?php if(!empty($special_schools)){ $total1 = 0; $count = 0; foreach($special_schools as $det){ 
														
																   $count+=1; ?>

                                                                <tr>
																<td><?php echo number_format($count); ?></td>
                                                                <td><?php echo $det->udise_code; ?><!--<a onclick="saveschoolid('<?php echo $det->school_id; ?> ')">        <?php echo $det->udise_code; ?></a>--></td>
                                                                <td><?php echo $det->district_name; ?></td>
																<td><?php echo $det->block_name; ?></td>
																<!--<td><?php echo $det->edn_dist_name; ?></td>
																<td><?php echo $det->category_name; ?></td>-->
																
																<td><?php echo $det->school_name; ?></td>
																	<td><?php echo number_format($det->PREKG); ?></td>
																	<td><?php echo number_format($det->LKG); ?></td>
																	<td><?php echo number_format($det->UKG); ?></td>
                                                                    <td><?php echo number_format($det->class_1); ?></td>
                                                                     <td><?php echo number_format($det->class_2); ?></td>
                                                                    <td><?php echo number_format($det->class_3); ?></td>
                                                                   <td><?php echo number_format($det->class_4); ?></td>
                                                                    <td><?php echo number_format($det->class_5); ?></td>
                                                                     <td><?php echo number_format($det->class_6); ?></td>
                                                                    <td><?php echo number_format($det->class_7); ?></td>
                                                                   <td><?php echo number_format($det->class_8); ?></td>
                                                                     <td><?php echo number_format($det->class_9); ?></td>
                                                                    <td><?php echo number_format($det->class_10); ?></td>
                                                                 <td><?php echo number_format($det->class_11); ?></td>
                                                                   <td><?php echo number_format($det->class_12); ?></td> 
                                                                   <td><?php echo number_format($det->total); ?></td>
																   <td><?php echo number_format($det->teachercount); ?></td>
																   <td><?php echo number_format($det->nonteachercount); ?></td>
                                                                </tr>
                                                                  <?php  $total1 = $total1 + $det->total;   } } ?>
                                                      
                                                            </tbody>
                                                        </table>
														
                                                         <?php if(!empty($special_schools)){  foreach($special_schools as $det){ 
															$pre_tot=$pre_tot+$det->PREKG;
															$lkg_tot=$lkg_tot+$det->LKG;
															$ukg_tot=$ukg_tot+$det->UKG;
                                                            $c1_tot=$c1_tot+$det->class_1;
                                                            $c2_tot=$c2_tot+$det->class_2;
                                                            $c3_tot=$c3_tot+$det->class_3; 
                                                            $c4_tot=$c4_tot+$det->class_4;
                                                            $c5_tot=$c5_tot+$det->class_5;
                                                            $c6_tot=$c6_tot+$det->class_6;
                                                            $c7_tot=$c7_tot+$det->class_7;
                                                            $c8_tot=$c8_tot+$det->class_8;
                                                            $c9_tot=$c9_tot+$det->class_9;
                                                            $c10_tot=$c10_tot+$det->class_10;
                                                            $c11_tot=$c11_tot+$det->class_11;
                                                            $c12_tot=$c12_tot+$det->class_12;
                                                                 }} ?>
														<div class="table-scrollable">
                                                         <table class="table table-striped table-bordered table-hover">
                                                             <thead>
                                                                <tr>
                                                                    <th>Class </th>
																	<th> PREKG</th>
																	<th> LKG</th>
																	<th> UKG</th>
                                                                    <th> I</th>
                                                                    <th>II</th>
                                                                    <th>III</th>
                                                                    <th>IV</th>
                                                                    <th>V</th>
                                                                   <th>VI</th>
                                                                     <th>VII</th>
                                                                    <th>VIII</th>
                                                                    <th>IX</th>
                                                                    <th>X</th>
                                                                    <th>XI</th>
                                                                    <th>XII</th> 
                                                                    <th>Total</th>
                                                                </tr>
                                                                </thead>
                                                            <tr>
                                                                    <td>Over all Total</td>
																	<td><?php echo $pre_tot; ?></td>
																	<td><?php echo $lkg_tot; ?></td>
																	<td><?php echo $ukg_tot; ?></td>
                                                                    <td><?php echo $c1_tot; ?></td>
                                                                    <td><?php echo $c2_tot; ?></td>
                                                                    <td><?php echo $c3_tot; ?></td>
                                                                    <td><?php echo $c4_tot; ?></td>
                                                                    <td><?php echo $c5_tot; ?></td>
                                                                   <td><?php echo $c6_tot; ?></td>
                                                                    <td><?php echo $c7_tot; ?></td>
                                                                    <td><?php echo $c8_tot; ?></td>
                                                                    <td><?php echo $c9_tot; ?></td>
                                                                    <td><?php echo $c10_tot; ?></td>
                                                                    <td><?php echo $c11_tot; ?></td>
                                                                    <td><?php echo $c12_tot; ?></td> 
                                                                    <td><b><?php echo number_format($total1); ?></b></td>
                                                                </tr>
                                                        </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

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
        <script src="<?php echo base_url().'asset/js/state.js';?>" type="text/javascript"></script>

        <script type="text/javascript">
			
					
			/*$(document).ready(function(){  // function call for validate total
			$("#emis_state_special_search").change(function(){
			return validatetext('emis_state_special_search','emis_state_report_schmanage_alert'); 
			});   });*/
			
			
			
			
			function searchfilter(emis_state_report_schcate,emis_state_report_schmgtype,emis_state_special_search) {
				//var id = validatetext('emis_state_special_search','emis_state_report_schmanage_alert');
				
				
				var id1 = $("#emis_state_special_search").val();
				var manage = $("input:radio[name=emis_state_report_schcate]:checked").val();
				var cate = $("input:radio[name=emis_state_report_schmgtype]:checked").val();
				
						

				if(!manage || !cate){

					var msg = '<span style="color:red;">You must select your both management and schooltype!</span><br /><br />';
                    document.getElementById('msg').innerHTML = msg;
                    return false;
				}else{
				
				
				var baseurl='<?php echo base_url(); ?>';
				return true;

				// $.ajax({
				// 	type: "POST",
				// 	url:baseurl+'State/schoolcatemanagefil',
				// 	data:'&id1='+id1+'&manage='+manage+'&cate='+cate,
				// 	success: function(resp){ 
				// 		// alert(resp);
				// 		 // window.location.href = baseurl+'State/schoolcatemanagefil';
				// 		//location.reload(true);
				// 		return true;
				// 	},
				// 	error: function(e){ 
				// 		alert('Error: ' + e.responseText);
				// 		return false;  
        
				// 	}
				// });
					/*if(manage == 1){
						var msg1 = '<span style="color:red;">You selected Government </span>';
                    document.getElementById('msg1').innerHTML = msg1;
					}else if(manage == 2){
						var msg2 = '<span style="color:red;">You selected Aided </span>';
                    document.getElementById('msg2').innerHTML = msg2;
					}else if(manage == 3){
						var msg3 = '<span style="color:red;">You selected Unaided </span>';
                    document.getElementById('msg3').innerHTML = msg3;
					}else if(manage == 4){
						var msg4 = '<span style="color:red;">You selected Central </span>';
                    document.getElementById('msg4').innerHTML = msg4;
					}
						
					if(cate == 1){
						var msg5 = '<span style="color:red;">and Primary!</span>';
                    document.getElementById('msg5').innerHTML = msg5;
					}else if(cate == 2){
						var msg6 = '<span style="color:red;">and Middle!</span>';
                    document.getElementById('msg6').innerHTML = msg6;
					}else if(cate == 3){
						var msg7 = '<span style="color:red;">and High!</span>';
                    document.getElementById('msg7').innerHTML = msg7;
					}else if(cate == 4){
						var msg8 = '<span style="color:red;">and High Secondary!</span>';
                    document.getElementById('msg8').innerHTML = msg8;
					}*/
				
	
				}
			}
			

               function saveschoolid(value){
                var baseurl='<?php echo base_url(); ?>';
                // alert(value);
                $.ajax({
                type: "POST",
                url:baseurl+'corporation/saveschoolidsession',
                data:"&school_id="+value,
                success: function(resp){ 
                if(resp==true){  
                window.location.href = baseurl+'corporation/emis_student_classwise_school'; 
                return true;  
                 }else{
                    return false;
                 }
                 
                         
                 },
                error: function(e){ 
                alert('Error: ' + e.responseText);
                return false;  

                }
                });
               }


             /**
             *
             *VIT
             */

            $(document).on('change','#student_count',function()
             {
             	// alert($(this).val());
             	$("#emis_state_special_search").val($(this).val());
             })
             $(document).on('change','#emis_state_special_search',function()
             {
             	$("#student_count").val($(this).val());
             })
			   
				   
            

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