<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Attendance Report | Dashboard</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link rel="shortcut icon" href="<?php echo base_url().'asset/images/favicon.ico';?>" /> 
	<?php $this->load->view('head.php'); ?>
	<style>
		.truncate {
		  white-space: nowrap;
		  overflow: hidden;
		  text-overflow: ellipsis;
		}
	</style>
</head>

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
                                    <h1>Report List
                                       <small>All List</small>
                                    </h1>
                                </div>
                                <!-- END PAGE TITLE -->
                                <!-- BEGIN PAGE TOOLBAR -->
                                <div class="page-toolbar"></div>
							</div>
						</div>
						<!-- END PAGE HEAD-->
                        <!-- BEGIN PAGE CONTENT BODY -->
                        <div class="page-content">
							<div></div>
							<div class="container">
                              <!-- BEGIN PAGE CONTENT INNER -->
                               <div class="page-content-inner">
									<div class="row">
										<div class="col-lg-4">
											<div class="panel panel-success">
												<div class="panel-heading">
													<span class="close">x</span>
													
													<h3 class="panel-title" style="color:black;">Student-Attendance</h3>
												</div>
												<div class="panel-body">
													<!-- <h3>Task Details</h3> -->
													<div class="row">
														<div class="col-md-12">
															<div class="col-md-12">
																<div class="btn-group" id="allbtn">
																	<a id="day" value="1" class="btn btn-default" onclick="changeclass(this);day(this,1);">Day</a>
																	<a id="week" value="2" class="btn btn-default" onclick="changeclass(this);day(this,2);">Week</a>
																	<a id="month" value="3" class="btn btn-default" onclick="changeclass(this);day(this,3);">Month</a>
																	<a id="quartely" value="4" class="btn btn-default" onclick="changeclass(this);day(this,4);">Quaterly</a>
																	
																</div>
															</div>
															<div><p></p></div>
															<div>
																<div class="col-md-12">
																	<div class="table-responsive">
																		<table class="table table-striped m-b-0 table-bordered">
																			<thead>
																				<tr>
																					<th>Student</th>
																					<th>Boys</th>
																					<th>Girls</th>
																					<th>Overall</th>
																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td>Present</td>
																					<td style="color:#00b100;" id="boys">-</td>
																					<td style="color:#00b100;" id="girls">-</td>
																					<td style="color:#00b100;" id="overall">-</td>
																				</tr>
																				<tr>
																					<td>Absent</td>
																					<td style="color:red;" id="boysab">-</td>
																					<td style="color:red;" id="girlsab">-</td>
																					<td style="color:red;" id="overallab">-</td>
																				</tr>
																				
																			</tbody>
																		</table>
																	</div>
																</div>
																<div class="col-md-12">
																	<table width="300" >
																		
																			<tr>
																				<td colspan="3" style="text-align:center;"><strong>Top 5</strong></td>
																				<td colspan="3" style="text-align:center;"><strong>Bottom 5</strong></td>
																			</tr>
																		<tbody id="studentpercentage">
																			<tr>
																				<td colspan="2" >-</td>
																				<td ><strong></strong>-</td>
																				<td colspan="2">-</td>
																				<td ><strong></strong>-</td>
																			</tr>
																			
																		</tbody>
																		<tfoot>
																			<tr><td colspan="6"><a href="<?php echo base_url().'Attendance/studentlist';?>">More -></a></td></tr>
																		</tfoot>
																	</table>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										
										
										<div class="col-lg-4">
											<div class="panel panel-success">
												<div class="panel-heading">
													<span class="close">x</span>
													
													<h3 class="panel-title" style="color:black;">Staff-Attendance</h3>
												</div>
												<div class="panel-body">
													<!-- <h3>Task Details</h3> -->
													<div class="row">
														<div class="col-md-12">
															<div class="col-md-12">
																<div class="btn-group" id="allbtn">
																	<a id="staffday" value="1" class="btn btn-default" onclick="changeclass(this);staffdaylist(this,1);">Day</a>
																	<a id="staffweek" value="2" class="btn btn-default" onclick="changeclass(this);staffdaylist(this,2);">Week</a>
																	<a id="staffmonth" value="3" class="btn btn-default" onclick="changeclass(this);staffdaylist(this,3);">Month</a>
																	<a id="staffquartely" value="4" class="btn btn-default" onclick="changeclass(this);staffdaylist(this,4);">Quaterly</a>
																</div>
															</div>
															<div><p></p></div>
															<div>
																
																<div class="col-md-12">
																	<div class="table-responsive">
																		<table  class="table table-striped m-b-0 table-bordered">
																			<thead>
																				<tr>
																					<th>Teaching</th>
																					<th>Non Teaching</th>
																					<th>Overall</th>
																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td style="color:#00b100;" id="teach">-</td>
																					<td style="color:#00b100;" id="nonteach">-</td>
																					<td style="color:#00b100;" id="totoverall">-</td>
																				</tr>
																			</tbody>
																		</table>
																	</div>
																</div>
																
																<div><p></p></div>
																<div class="col-md-12">
																	<table>
																			<tr>
																				<td colspan="2" style="text-align:center;"><strong>Top 5</strong></td>
																				<td colspan="2" style="text-align:center;"><strong>Bottom 5</strong></td>
																			</tr>
																		<tbody  id="staffpersonlist">
																			<tr>
																				<td colspan="2">-</td>
																				<td><strong>-</strong></td>
																				<td colspan="2">-</td>
																				<td><strong>-</strong></td>
																			</tr>
																		</tbody>
																		<tfoot>
																			<tr><td colspan="4"></td></tr>
																		</tfoot>
																	</table>
																</div>
																<a href="<?php echo base_url().'Attendance/staffwise'; ?>">More -></a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										
										
										
										<div class="col-lg-4">
											<div class="panel panel-success">
												<div class="panel-heading">
													<span class="close">x</span>
													
													<h3 class="panel-title" style="color:black;">Time Table</h3>
												</div>
												<div class="panel-body">
													<!-- <h3>Task Details</h3> -->
													<div class="row">
														<div class="col-md-12">
															<div class="col-md-12">
																<div class="btn-group" id="allbtn">
																	<a id="timetableday" value="1" class="btn btn-default" onclick="changeclass(this);timetable(this,1);">Day</a>
																	<a id="timetableweek" value="2" class="btn btn-default" onclick="changeclass(this);timetable(this,2);">Week</a>
																	<a id="timetablemonth" value="3" class="btn btn-default" onclick="changeclass(this);timetable(this,3);">Month</a>
																	<a id="timetablequartely" value="4" class="btn btn-default" onclick="changeclass(this);timetable(this,4);">Quaterly</a>
																	
																</div>
															</div>
															<div><p></p></div>
															<div>
																<div class="col-md-12">
																	
																	<div class="table-responsive">
																		<table  class="table table-striped m-b-0 table-bordered">
																			<thead>
																				<tr>
																					<th>Teaching</th>
																					<th>Volunteers</th>
																					<th>Overall</th>
																				</tr>
																			</thead>
																			<tbody id="timetablelist">
																				<tr>
																					<td style="color:#00b100;"> </td>
																					<td style="color:#00b100;"></td>
																					<td style="color:#00b100;"></td>
																				</tr>
																				
																			</tbody>
																		</table>
																	</div>
																</div>
																<div class="col-md-12">
																	<table width="300" >
																		
																		<thead>
																			<tr>
																				<td colspan="3" style="text-align:center;"><strong>Class-wise</strong></td>
																				<td colspan="3" style="text-align:center;"><strong>Occupancy</strong></td>
																			</tr>
																		</thead>
																		<tbody id="timetableslist">
																			<tr>
																				<td colspan="2" >Class - X</td>
																				<td ><strong>60%</strong></td>
																				<td colspan="2" id="">Ramu -</td>
																				<td ><strong>80%</strong></td>
																			</tr>
																			
																		</tbody>
																		<tfoot>
																			<tr><td colspan="6"><a href="javascript:;">More -></a></td></tr>
																		</tfoot>
																	</table>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										
									</div>
									
									<div class="row">
										<div class="col-lg-4">
											<div class="panel panel-success">
												<div class="panel-heading">
													<span class="close">x</span>
													
													<h3 class="panel-title" style="color:black;">Schemes</h3>
												</div>
												<div class="panel-body">
													<!-- <h3>Task Details</h3> -->
													<div class="row">
														<div class="col-md-12">
															
															<div><p></p></div>
															<div>
																<div class="col-md-12">
																	
																	<div class="table-responsive">
																		<table  class="table table-striped m-b-0 table-bordered">
																			<thead>
																				<tr>
																					<th>Indent</th>
																					<th>Distribution</th>
																					<th>Overall</th>
																				</tr>
																			</thead>
																			<tbody id="schemelist">
																				<tr>
																					<td style="color:#00b100;" id="boys"> </td>
																					<td style="color:#00b100;" id="girls"></td>
																					<td style="color:#00b100;" id="overall"></td>
																				</tr>
																				
																			</tbody>
																		</table>
																	</div>
																</div>
																<div class="col-md-12">
																	<table width="300" >
																		<thead>
																			<tr>
																				<td colspan="3" style="text-align:center;"><strong>Schemelist</strong></td>
																				<td colspan="3" style="text-align:center;"><strong>Schemelist</strong></td>
																			</tr>
																		</thead>	
																		<tbody id="schemeindentlist">
																			<tr>
																				<td colspan="2" >Text books -</td>
																				<td ><strong>80%</strong></td>
																				<td colspan="2" id="">Text books -</td>
																				<td ><strong>80%</strong></td>
																			</tr>
																			
																		</tbody>
																		<tfoot>
																			<tr><td colspan="6"><a href="<?php echo base_url().'Attendance/schemeswise' ?>">More -></a></td></tr>
																		</tfoot>
																	</table>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										
										<div class="col-lg-4">
											<div class="panel panel-success">
												<div class="panel-heading">
													<span class="close">x</span>
													
													<h3 class="panel-title" style="color:black;">Performance</h3>
												</div>
												<div class="panel-body">
													<!-- <h3>Task Details</h3> -->
													<div class="row">
														<div class="col-md-12">
															<div class="col-md-12">
																<div class="btn-group" id="allbtn">
																	<a id="performanceday" value="1" class="btn btn-default" onclick="changeclass(this);performance(this,1);">Quaterly</a>
																	<a id="performanceweek" value="2" class="btn btn-default" onclick="changeclass(this);performance(this,2);">Halferly</a>
																	<a id="performancemonth" value="3" class="btn btn-default" onclick="changeclass(this);performance(this,3);">Yearly</a>
																	
																</div>
															</div>
															<div><p></p></div>
															<div>
																<div class="col-md-12">
																	<div class="table-responsive">
																		<table  class="table table-striped m-b-0 table-bordered">
																			<thead>
																				<tr>
																					<th>2018-2019</th>
																					<th>2019-2020</th>
																					<th>Overall</th>
																				</tr>
																			</thead>
																			<tbody id="performancelist">
																				<tr>
																					<td style="color:#00b100;" id="boys"> </td>
																					<td style="color:#00b100;" id="girls"></td>
																					<td style="color:#00b100;" id="overall"></td>
																				</tr>
																				
																			</tbody>
																		</table>
																	</div>
																</div>
																<div class="col-md-12">
																	<table width="300" >
																		<thead>
																			<tr>
																				<td colspan="3" style="text-align:center;"><strong>Schemelist</strong></td>
																				<td colspan="3" style="text-align:center;"><strong>Schemelist</strong></td>
																			</tr>
																		</thead>
																		<tbody>	
																			<tr>
																				<td colspan="2" >Class - X</td>
																				<td ><strong>80%</strong></td>
																				<td colspan="2" id="">Class - IX</td>
																				<td ><strong>80%</strong></td>
																			</tr>
																		</tbody>
																		<tfoot>
																			<tr><td colspan="6"><a href="javascript:;">More -></a></td></tr>
																		</tfoot>
																	</table>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										
										
										<div class="col-lg-4">
											<div class="panel panel-success">
												<div class="panel-heading">
													<span class="close">x</span>
													
													<h3 class="panel-title" style="color:black;">Facilities</h3>
												</div>
												<div class="panel-body">
													<!-- <h3>Task Details</h3> -->
													<div class="row">
														<div class="col-md-12">
															<div class="col-md-12">
																<div class="btn-group" id="allbtn">
																	<a id="functionalday" value="1" class="btn btn-default" onclick="changeclass(this);facilities(this,1);">Functional</a>
																	<a id="nonfunctionalday" value="2" class="btn btn-default" onclick="changeclass(this);facilities(this,2);">Non-Functional</a>
																</div>
															</div>
															<div><p></p></div>
															<div>
																<div class="col-md-12">
																	<div class="table-responsive">
																		<p></p>
																	</div>
																</div>
																<div class="col-md-12">
																	<table width="300" >
																		<thead>
																			<tr>
																				<td colspan="3" style="text-align:center;"><strong>Facilities List</strong></td>
																				<td colspan="3" style="text-align:center;"><strong>Facilities List</strong></td>
																			</tr>
																		</thead>
																		<tbody id="facilitieslist">	
																			<tr>
																				<td colspan="2" > - </td>
																				<td ><strong>-</strong></td>
																				<td colspan="2" id=""> - </td>
																				<td ><strong>-</strong></td>
																			</tr>
																		</tbody>
																		<tfoot>
																			<tr><td colspan="6"><a href="<?php echo base_url().'Attendance/facilities' ?>">More -></a></td></tr>
																		</tfoot>
																	</table>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										
									
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php $this->load->view('footer.php'); ?>
<?php $this->load->view('scripts.php'); ?>	

</body>
<script>
	window.onload=function(){
		schemelist();
		document.getElementById('functionalday').onclick();
		document.getElementById('day').onclick();
		document.getElementById('staffday').onclick();
		//document.getElementById('timetableday').onclick();
		//document.getElementById('performanceday').onclick();
		//document.getElementById('tntpday').onclick();
		
		
	};
	function changeclass(node){
		var pnode = node.parentNode;
		//alert(pnode);
		for(var i=0;i<pnode.children.length;i++){
			pnode.children[i].className='btn btn-default';
		}
		node.className='btn btn-primary';
	}
	
	function day(node,segment){
		$.ajax({
			type: "POST",
			url:baseurl+'AttendanceApi/daylist/'+segment,
			success: function(resp) {
				var output = JSON.parse(resp);
				
				document.getElementById('boys').innerHTML=(output['overall'][0]['malepre']!=null?output['overall'][0]['malepre']:0)+'%';
				document.getElementById('girls').innerHTML=(output['overall'][0]['femalepre']!=null?output['overall'][0]['femalepre']:0)+'%';
				document.getElementById('overall').innerHTML=((parseFloat(output['overall'][0]['malepre']!=null?output['overall'][0]['malepre']:'0.00')+parseFloat(output['overall'][0]['femalepre']!=null?output['overall'][0]['femalepre']:'0.00'))).toFixed(2)+'%';
				
				document.getElementById('boysab').innerHTML=(output['overall'][0]['maleab']!=null?output['overall'][0]['maleab']:0)+'%';
				document.getElementById('girlsab').innerHTML=(output['overall'][0]['femaleab']!=null?output['overall'][0]['femaleab']:0)+'%';
				document.getElementById('overallab').innerHTML=
				((parseFloat(output['overall'][0]['maleab']!=null?output['overall'][0]['maleab']:'0.00')+parseFloat(output['overall'][0]['femaleab']!=null?output['overall'][0]['femaleab']:'0.00'))).toFixed(2)+'%';
				
				
				var table = '';
				var classwise= output['overallclasswise'];
				//alert(JSON.stringify(classwise));
				//alert(classwise[0]['st_class']+'  '+classwise[0]['st_section']);
				var len=new Array(); 
				for(var i=0;i<(classwise.length/2);i++){
					len[i]=classwise[i];
					len[(classwise.length-1)-i]=classwise[classwise.length-(i+1)];
				}
				for(var i=0; i<((classwise.length/2)>5?5:(classwise.length/2));i++){
					table+='<tr><td colspan="2">Class: '+len[i]['st_class']+'-'+len[i]['st_section']+'</td><td><strong style="color:green;">'+len[i]['clspre']+'%</strong></td><td>Class: '+len[(classwise.length-1)-i]['st_class']+'-'+len[(classwise.length-1)-i]['st_section']+'</td><td><strong style="color:red;">'+len[(classwise.length-1)-i]['clsab']+'%</strong></td></tr>';
				}
				document.getElementById('studentpercentage').innerHTML=table;
			},
				error: function(e){ 
				alert('Error: ' + e.responseText);
				return false;  
			}
		});
	}
	
	function staffdaylist(node,segment){
		$.ajax({
			type: "POST",
			url:baseurl+'AttendanceApi/stafflist/'+segment,
			success: function(resp) {
				var output = JSON.parse(resp);
				
				if(segment==1){
					document.getElementById('teach').innerHTML=(output['staffoverall'][0]['day_teachabper']!=null?output['staffoverall'][0]['day_teachabper']:0)+'%';
					document.getElementById('nonteach').innerHTML=(output['staffoverall'][0]['day_nontabper']!=null?output['staffoverall'][0]['day_nontabper']:0)+'%';
					document.getElementById('totoverall').innerHTML=(output['staffoverall'][0]['day_overall']!=null?output['staffoverall'][0]['day_overall']:0)+'%';
				}else if(segment==2){
					document.getElementById('teach').innerHTML=(output['staffoverall'][0]['weekly_teach_per']!=null?output['staffoverall'][0]['weekly_teach_per']:0)+'%';
					document.getElementById('nonteach').innerHTML=(output['staffoverall'][0]['weekly_nonteach_per']!=null?output['staffoverall'][0]['weekly_nonteach_per']:0)+'%';
					document.getElementById('totoverall').innerHTML=(output['staffoverall'][0]['weekly_overall']!=null?output['staffoverall'][0]['weekly_overall']:0)+'%';					//document.getElementById('totoverall').innerHTML=((parseFloat(output['staffoverall'][0]['teachingpre'])+parseFloat(output['staffoverall'][0]['nteachingpre']))/2).toFixed(2)+'%';
				}else if(segment==3){
					document.getElementById('teach').innerHTML=(output['staffoverall'][0]['monthly_teach_per']!=null?output['staffoverall'][0]['monthly_teach_per']:0)+'%';
					document.getElementById('nonteach').innerHTML=(output['staffoverall'][0]['monthly_nonteach_per']!=null?output['staffoverall'][0]['monthly_nonteach_per']:0)+'%';
					document.getElementById('totoverall').innerHTML=(output['staffoverall'][0]['monthly_overall']!=null?output['staffoverall'][0]['monthly_overall']:0)+'%';
				}else if(segment==4){
					document.getElementById('teach').innerHTML=(output['staffoverall'][0]['yearly_teach_per']!=null?output['staffoverall'][0]['yearly_teach_per']:0)+'%';
					document.getElementById('nonteach').innerHTML=(output['staffoverall'][0]['yearly_nonteach_per']!=null?output['staffoverall'][0]['yearly_nonteach_per']:0)+'%';
					document.getElementById('totoverall').innerHTML=(output['staffoverall'][0]['yearly_overall']!=null?output['staffoverall'][0]['yearly_overall']:0)+'%';
				}
				
				table='';
				var staffper = output['staff'];	
				var all=new Array(); 
				for(var i=0;i<(staffper.length/2);i++){
					all[i]=staffper[i];
					all[(staffper.length-1)-i]=staffper[staffper.length-(i+1)];
				}
				
				for(var i=0;i<((staffper.length/2)>5?5:(staffper.length/2));i++){
					if(segment==1){
					//alert(i+' '+all[i]['teacher_name'].split(" ")[0]);
						table+='<tr style="font-size:12px;"><td>'+all[i]['teacher_name']+' - </td><td style="color:#00b100; padding-right:5px;">'+(all[i]['pper']!=null?all[i]['pper']:0)+'%'+'</td><td>'+all[(staffper.length-1)-i]['teacher_name']+' - </td><td style="color:red;padding-right:5px;">'+(all[(staffper.length-1)-i]['pper']!=null?all[(staffper.length-1)-i]['pper']:0)+'</td></tr>';
					}else if(segment==2){
						table+='<tr style="font-size:12px;"><td>'+all[i]['teacher_name']+' - </td><td style="color:#00b100; padding-right:5px;">'+(all[i]['teach_weekly_pre']!=null?all[i]['teach_weekly_pre']:100)+'%'+'</td><td>'+all[(staffper.length-1)-i]['teacher_name']+' - </td><td style="color:red;padding-right:5px;">'+(all[(staffper.length-1)-i]['teach_weekly_pre']!=null?all[(staffper.length-1)-i]['teach_weekly_pre']:100)+'%'+'</td></tr>';
					}else if(segment==3){
						table+='<tr style="font-size:12px;"><td>'+all[i]['teacher_name']+' - </td><td style="color:#00b100; padding-right:5px;">'+(all[i]['teach_monthly_pre']!=null?all[i]['teach_monthly_pre']:100)+'%'+'</td><td>'+all[(staffper.length-1)-i]['teacher_name']+' - </td><td style="color:red;padding-right:5px;">'+(all[(staffper.length-1)-i]['teach_monthly_pre']!=null?all[(staffper.length-1)-i]['teach_monthly_pre']:100)+'%'+'</td></tr>';
					}else if(segment==4){
						table+='<tr style="font-size:12px;"><td>'+all[i]['teacher_name']+' - </td><td style="color:#00b100; padding-right:5px;">'+(all[i]['teach_yearly_pre']!=null?all[i]['teach_yearly_pre']:100)+'%'+'</td><td>'+all[(staffper.length-1)-i]['teacher_name']+' - </td><td style="color:red;padding-right:5px;">'+(all[(staffper.length-1)-i]['teach_yearly_pre']!=null?all[(staffper.length-1)-i]['teach_yearly_pre']:100)+'%'+'</td></tr>';
					}
				}
				document.getElementById('staffpersonlist').innerHTML=table;
				
			},
				error: function(e){ 
				alert('Error: ' + e.responseText);
				return false;  
			}
		});
	}
	
	function timetable(){
	}
	
	
	function schemelist(segment=1){
		$.ajax({
			type: "POST",
			url:baseurl+'AttendanceApi/schemelist/'+segment,
			success:function(resp){
				var output = JSON.parse(resp);
				var table ="";
				var sum = 0;
				var schemelist = output['schemelist'];
				for(var i=0; i<schemelist.length;i+=2){
					table+='<tr><td colspan="2">'+schemelist[i]['scheme_name']+' - </td><td style="color:green;">' + schemelist[i]['overall']+'</td><td colspan="2">'+schemelist[i+1]['scheme_name']+' - </td><td style="color:green;">' + schemelist[i+1]['overall']+'</td></tr>';
				}
				document.getElementById('schemeindentlist').innerHTML=table;
			},error: function(e){
				alert('Error:'+e.reponseText);
				return false;
			}
		});
	}
	
	function performance(){
	}
	
	
	function facilities(node,segment){
		//alert(segment);
		$.ajax({
			type: "POST",
			url:baseurl+'AttendanceApi/facilities/'+segment,
			success:function(resp){
				var output = JSON.parse(resp);
				var table ="";
				var sum = 0;
				var facilities = output['facilities'];
				
				if(segment==1){
					for(var i in facilities){
						table+='<tr><td colspan="2">Drinking Water  </td><td style="color:green;">' + facilities[i]['drinkingwater']+'</td><td colspan="2">Incinerator  </td><td style="color:green;">' + facilities[i]['incinerator']+'</td></tr><tr><td colspan="2">Gents Toilet  </td><td style="color:green;">' + facilities[i]['staffgentstoil']+'</td><td colspan="2">Ladies Toilet  </td><td style="color:green;">' + facilities[i]['staffladiestoil']+'</td></tr><tr><td colspan="2">Boys Toilet  </td><td style="color:green;">' + facilities[i]['usetoilboys']+'</td><td colspan="2">Girls Toilet  </td><td style="color:green;">' + facilities[i]['usetoilgirls']+'</td></tr><tr><td colspan="2">Boys Urinals  </td><td style="color:green;">' + facilities[i]['urinalinuseboys']+'</td><td colspan="2">Girls Urinals  </td><td style="color:green;">' + facilities[i]['urinalinusegirls']+'</td></tr>';
					}
				}else if(segment==2){
					for(var i in facilities){
						table+='<tr><td colspan="2">Toilet Boys<strong>(Not in use)</strong> - </td><td style="color:red;">' + facilities[i]['toilnotuseboys']+'</td><td colspan="2">Toilet Girls<strong>(Not in use)</strong> - </td><td style="color:red;">' + facilities[i]['toilnotusegirls']+'</td></tr><tr><td colspan="2">Urinal Boys<strong>(Not in use)</strong> - </td><td style="color:red;">' + facilities[i]['urinalnotinuseboys']+'</td><td colspan="2">Urinal Girls<strong>(Not in use)</strong> - </td><td style="color:red;">' + facilities[i]['urinalnotinusegirls']+'</td></tr>';
					}
				}
				document.getElementById('facilitieslist').innerHTML=table;
			},error: function(e){
				alert('Error:'+e.reponseText);
				return false;
			}
		});
	}
	
	function tntp(){
	}
	
	
	
</script>
</html>