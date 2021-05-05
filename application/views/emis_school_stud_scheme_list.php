<!DOCTYPE html>

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
		.dataTables_wrapper{
			overflow:auto;
		}
		
		</style>
        </head>
    <!-- END HEAD -->
   
    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            


<?php $userlogin=$this->session->userdata('emis_user_type_id');?>            
<?php if($this->session->userdata('emis_user_type_id') == 3 ) 	
{?>
<?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
<?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 5){ ?>
<?php $this->load->view('state/header.php'); }else{ $this->load->view('header.php'); } ?>



            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <!-- BEGIN CONTAINER -->
                    
                        <!-- BEGIN CONTENT -->
                        <div class="page-content-wrapper">
                            <!-- BEGIN CONTENT BODY -->
                            <!-- BEGIN PAGE HEAD-->
                            <div class="page-head">
                                
                            </div>
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                           
                               
                               
                          

                                    <div class="page-content-inner">
                                       
                                    
                                        

                                           <!-- <div class="m-heading-1 border-green m-bordered">
                                            <h3>Basic Information</h3>
                                        </div> -->
                                     
                                         
                                        <div class="portlet light portlet-fit ">
                                            
                                            <div class="portlet-body">
                                               <div class ="row">
                                                    <div class="col-md-4">
                                                        <font style="color:#dd4b39;">
                                                            <?php echo $this->session->flashdata('errors'); ?>
                                                        </font>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--begin form -->
                                           

                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row"> 
                                                            <!--<div class="col-md-4"> 
                                                                <a href="javascript:;" class="btn btn-sm green add-class-section"> Add Class Section details <i class="fa fa-edit"></i></a>
                                                            </div>
                                                        </div>-->
                                                       

                                                <!-- Add Model -->
<style>
				.select2-container--bootstrap 
				.select2-results__option[aria-selected=true] {
    
}

.select2-container--bootstrap {
    display: block;
   
}

</style>
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
<div class="row" style="padding-left: 34px;">
 <!--<div class="tab" style="padding-left: 34px;">
  <button class="btn btn-primary"  onclick="openCity(event, 'London')">Add Student</button>
  <button class="btn btn-primary" onclick="openCity(event, 'Paris')">View Register</button>
 
</div>-->

<!--<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" onclick="openCity(event, 'London')">Add Student</a></li>
  <li><a data-toggle="tab" onclick="openCity(event, 'Paris')">View Register</a></li>
  
</ul> -->

    



</div>
<br>

                                                
                                                <center>
                                                  <form id="filter" method="post" action="<?php echo base_url().'Home/get_stud_scheme_list';?>">
												  
                                                    <div class="form-group">
                                                    <div class="row">
													                    <!--<div class="col-md-3" >  
                                                          <select style="width: 90%;" class="form-control" class="center" onchange="get_scholor();"  tabindex="1" id="schemeid" name="schemeid"   required="" >
                                                               	
                                                                <option value="0">Select scheme</option>
                                                                <option value="1">NMMS Scheme</option>
																<option value="2">TRSTSE Scholarship Scheme</option>
																<option value="3">Inspire Award Details</option>
																<option value="4">Students Sports Participation</option>
                                                               </select> 
															   
                                                         </div>-->
							<div class="col-md-3" >  
                    <select style="width: 90%;" class="form-control" class="center"   tabindex="1" id="schemeid" name="schemeid"   required="" onchange="get_class(this);">
                                                               	
                                <option value="0">Select scheme</option>
                                <option value="1" <?php echo ($schemeid==1?'selected':''); ?>>RTE</option>
																<option value="2" <?php echo ($schemeid==2?'selected':''); ?>>CWSN</option>
																<option value="3" <?php echo ($schemeid==3?'selected':''); ?>>Awards</option>
                                <option value="4" <?php echo ($schemeid==4?'selected':''); ?>>Sports</option>
                                <option value="5" <?php echo ($schemeid==5?'selected':''); ?>>OSC</option>
							                 	<option value="6" <?php echo ($schemeid==6?'selected':''); ?>>Vocation (NSQF) </option>
                       </select> 
															   
                </div>
													 <div class="col-md-3">  
                     <select style="width: 90%;" class="form-control" onchange="get_section();" data-placeholder="Choose a Category" tabindex="1" id="classno" name="classno"  style="width: 30%" required="" >
                                                               	
                           <option value="" >Select Class</option>
																	
                              <?php foreach($classDetails as $sc) {
																	   $classid=$sc->value;
																  switch ($classid) {
																case $sta="1":$standard='I';break;
																case $sta="2":$standard='II';break;
																case $sta="3":$standard='III';break;	
																case $sta="4":$standard='IV';break;	
																case $sta="5":$standard='V';break;
																case $sta="6":$standard='VI';break;	
																case $sta="7":$standard='VII';break;	
																case $sta="8":$standard='VIII';break;
																case $sta="9":$standard='IX';break;	
																case $sta="10":$standard='X';break;	
																case $sta="11":$standard='XI';break;	
																case $sta="12":$standard='XII';break;	
																case $sta="13":$standard='Pre KG';break;	
																case $sta="14":$standard='UKG';break;	
																case $sta="15":$standard='LKG';break;
																}	 
														 ?>
                        <option value="<?php echo $sta;  ?>" ><?php echo $standard;?></option>
                                                                 <?php   }  ?>
																 
                    </select> 
                                                        
                                                    </div>
													<div class="col-md-2">  
                                                          <select style="width: 90%;" class="form-control" data-placeholder="Choose a Category" tabindex="1" id="sectionname" name="sectionname"  style="width: 60%" required="" >
                                                              
                                                               
                                                               </select> 
                                                        
                                                    </div>
													<div class="col-md-2">
                                                     <button type="submit"  class="btn green" id="emis_stu_searchsep_sub"  >SUBMIT</button>
                                                    </div>
													
													<div class="col-md-offset-2 col-md-2">
                                                    
                                                    </div>
													</div>
                                                    </form>
												</center>
                                                </div>

                                               <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
													<?php 
														if(!empty($student_tag)){
														foreach($student_tag as $sd)
														{
														
															$sid = $sd->school_type_id;
															$class =$sd->class_studying_id;
															$section =$sd->class_section;
															  // echo $sid;
															  // echo $class;
															  // echo $section;
															  break;
														}
														
														}
														?>
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i>Student Tagging : <?php echo $class ?> - <?php echo $section ?>
															
															</div>
                                                        <div class="tools" style="margin-top: 20px;"> </div>
                                                    </div>
                                                    <div class="portlet-body" >
													<div id="London" class="tabcontent tab-pane fade in active">
                            <table class="table table-striped table-bordered table-hover  sample_3" id="state_scheme">
														
                                     <thead>
                                          <tr>
															   
										  	<th style="display:none">Student Id</th>
												<!--<th style="width:0%;">S.No</th>-->
												<th style="width:10px !important;">Student Name</th>
												<th style="width:10%;">Gender</th>
												<th class="2" style="width:10px;">CWSN</th>
											 	<th class="1" style="width:10%;">RTE</th>
							          <th class="1" style="width:10%;">RTE Type</th>
											  <th class="3" style="width:12%;">NMMS   Exam <br> Passed on</th>
											  <th class="3" style="width:12%;">TRSTSE Exam <br>Passed on</th>
											  <th class="3" style="width:12%;">Inspire Award <br>Date</th>
											  <th class="3" style="width:10%;">Inspire Award Topic</th>

                        <th class="4" style="width:10%;">Game Participating</th>
												<th class="4" style="width:10%;">Participating <br>Date</th>
												<th class="4" style="width:10%;">Played Level</th>
												<th class="4" style="width:10%;">If Winner in any<br>Level, Details</th>

												<th class="5" style="width:10%;">Present Status</th>
                        <th class="5" style="width:10%;">Training Type</th>
                        <th class="5" style="width:10%;">Acadamic Year</th>
                       
						 
						 	  			  <th class="2"  style="width:10%;">National ID</th>
											  <th  class="2" style="width:10%;">Benefit</th>
											  <th  class="2" style="width:10%;">Provided By</th>
											 	<th class="2" style="width:10%;">Acad Year</th>
                        
                        <td class="5" style="display:none"></td>
                       <td class="5" style="display:none"></td>
                       <td class="5" style="display:none"></td>
												<th class="6" style="width:10%;">Sector</th>
												<th class="6" style="width:10%;">Job Role</th>											
						 
                        <th style="width:10%;">Action</th>

                        <th style="display:none">Class</th>
					              <th style="display:none">Section</th>
							          <th style="display:none">School Type</th>
                       <th style="display:none">community_id</th>
                                        </tr>
                                     </thead>
                                                            <tbody>
															<?php
                                                            	$ii='';
																if(!empty($student_tag))
																{
																	$i1=1;
																	// echo ($student_tag);
                                                              		foreach($student_tag as $sd)
															   		{
															?>
                                                            <tr>
											        
                               	<td style="display:none"><?php echo $sd->unique_id_no;?></td> 
                                  								<!--    <td><?php echo $i++;?></td>-->
                                <td style="width:12%;"><?php echo $sd->name;?></td>

																     <?php if($sd->gender==1) { ?>
																<td style="width:10%;">Male</td>
															         	<?php } ?>
																     <?php if($sd->gender==2) { ?>
																<td style="width:10%;">Female</td>
																     <?php } ?>
															     	<?php if($sd->gender==3) { ?>
															 <td style="width:10%;">Others</td>
															      	<?php } ?>
                                <td class="2" style="width:10%;"><?php echo $sd->da_name; ?></td>
				                    		<td class="1" style="width:10%;"><?php echo $sd->child_admitted_under_reservation; ?></td>
							        					<td class="1" style="width:10%;" id ="category_hide" <?= $sd->category ."-".$sd->sub_category ;?>
									 									<input type="hidden" value="<?=$sd->id?>">
							        								</td>	  
						        						<td  class="3" style="width:10%;">
										 									<?= $sd->nmmsexam_passed !='0000-00-00' && $sd->nmmsexam_passed !=''? date('d-m-Y', strtotime($sd->nmmsexam_passed)):' '?>
									 							</td>
								  							<td class="3" style="width:10%;">
																			<?= $sd->trstse !='0000-00-00' && $sd->trstse !=''? date('d-m-Y', strtotime($sd->trstse)):' '?>
								  										</td>
								  							<td class="3" style="width:10%;">
																			<?= $sd->inspire !='0000-00-00' && $sd->inspire !=''? date('d-m-Y', strtotime($sd->inspire)):' '?>
								  										</td> 
																<td class="3" style="width:10%;"><?php echo($sd->remarks); ?></td>
                  							<td class="4" style="width:10%;"><?php echo $sd->game_participating;?></td>
																<td class="4" style="width:10%;"><?php echo $sd->last_participating_date;?></td>
																<td class="4" style="width:10%;"><?php echo $sd->last_participating_level;?></td>
																<td class="4" style="width:10%;"><?php echo $sd->winner_level_details;?></td>

																<td class="2" style="width:10%;"><?php echo $sd->national_id; ?></td>
																<td class="2" style="width:10%;"><?php echo $sd->bf; ?></td>
																<td class="2" style="width:10%;"><?php echo $sd->provided_by; ?></td>
																<td class="2" style="width:10%;"><?php echo $sd->acad_year; ?></td>

																<td class="5" style="width:10%;"><?php ?></td>
																<td class="5" style="width:10%;"><?php ?></td>
																<td class="5" style="width:10%;"><?php ?></td>

																<td class="6" style="width:10%;"><?php echo $sd->nsqf_sector_name; ?></td>
																<td class="6" style="width:10%;"><?php echo $sd->nsqf_job_role_name; ?></td>
                              
          
									
                               <td style="width:10%;"><a href="javascript:;" class="btn btn-sm green edit-class-section" id="edit<?php echo $i; ?>"  contenteditable="false" data-class-section-id ="<?php echo $i;  ?>">Edit <!--<i     class="fa fa-edit"></i>--></a>
																	 <!--<a href="javascript:;" class="btn btn-sm red delete-class-section" id="deleted<?php echo $i; ?>"  onclick='deletenmms(<?php echo $sd->id;?>);' contenteditable="false" data-class-deleted-id ="<?php echo $i;?>">Delete </a>-->
																	<span>
				<button data-id="2" style="display:none;" id="save<?php echo $i;  ?>" class="btn btn-sm green save-class-section" onclick="savenational('<?php echo $sd->id;?>',this)" contenteditable="false">save</button>
				<button data-id="3"  style="display:none; margin-left: 72px margin-top: -54px"; id="cancel<?php echo $i; ?>" class="btn btn-sm red cancel-class-section" onclick="cancel(<?php echo $i?>)">cancel</button>
																	</span>
                                    							</td>										

																<td style="display:none"><?php echo $sd->class_studying_id ?></td>
																<td style="display:none"><?php echo $sd->class_section?></td>
																<td style="display:none"><?php echo $sd->school_type_id?></td>
                                <td style="display:none" ><?php echo $sd->community_id; ?></td>
                                						</tr>
							<?php }
															
															  
															}
															
                                                           ?>
                                                            </tbody>
															
                                                        </table>
														</div>
														
														
																		</div>
																
														 
														 
																		</div>
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
                          
                            <!-- END PAGE CONTENT BODY -->
                            <!-- END CONTENT BODY -->
                       

                        <!-- END QUICK SIDEBAR -->
                    </div>
                    <!-- END CONTAINER -->
                
            </div>

                  <?php $this->load->view('footer.php'); ?>
        </div>

        <?php $this->load->view('scripts.php'); ?>




        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
       <!--<script src="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js';?>" type="text/javascript"></script> -->
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
        	window.onload=function(){
            	if(document.getElementById('schemeid').value!=null){
            		get_scholor(document.getElementById('schemeid'));
            	}
        	};
        	function get_scholor(node)
        	{
            	var allclass=['1','2','3','4','5','6'];
            	for(var i in allclass)
            	{
            		if(allclass[i]!=node.value){
            			var ele=document.getElementsByClassName(allclass[i]);
            			for(var j in ele){
            				if(ele[j] instanceof HTMLTableCellElement)
            					ele[j].style.display="none";

            			}
            		}
            	}
        	}
	
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
	
$(document).ready(function(){
	 $("#London").show();
	// $("#schemeid").select2({closeOnSelect:false});
	$("#save").hide();
	$("#cancel").hide();
	  })
	
            
/****************************************/
/*student nmms scholor scheme */
/**************************************/
			 var local_i =-1;
			//  $('#state_scheme').DataTable().clear();
            //  $('#state_scheme').DataTable().destroy(); 

         $("#state_scheme tbody").on('click', '.edit-class-section', function(e) {
			 
        index =  $(this).closest('tr').index();

	   	  var nationalsave = $(this).closest('tr').children('td').find('button').attr('id');
		    var nationalcancel = $(this).closest('tr').children('td').find('.cancel-class-section').attr('id');
		    var nationalclass_id = $(this).closest('tr').children('td').find('input').attr('id');
        var nationaledit =  $(this).attr("id"); 
		    var nationaldeleted =  $(this).closest('tr').children('td').find('.delete-class-section').attr('id'); 
		if(local_i!=-1){
			
            $('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(0).text(stu_adid);

            $('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(1).text(student_name);
            $('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(2).text(gender);
            // $('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(3).text(classstudying);
            // $('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(3).text(schemedate);
            //$('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(6).text(DOJ);
		  $('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(3).text(cswn);
          $('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(4).text(rte);
		  $('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(5).text(rtetype);
          $('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(6).text(nmmsdate);
		  $('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(7).text(trstsedate);
			$('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(8).text(inspiredate);
			$('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(9).text(remark);
			$('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(10).text(gamename);
			$('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(11).text(sportsschemedate);
			$('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(12).text(particypy_level);
			$('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(13).text(winnerlevel);
	  
	    $('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(14).text(nation);
			$('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(15).text(benifit);
			$('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(16).text(provid);
			$('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(17).text(date);
      $('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(18).text(present_status);
      $('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(19).text(training_type);
      $('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(20).text(acadamic_year);
	    $('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(21).text(sector_name);
			$('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(22).text(jobrole_name);

			$('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(25).text(sclass);
			$('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(26).text(section);
			$('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(27).text(school);
      $('#state_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(28).text(community_id);
         }

		stu_adid =  $('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(0).text();
		student_name =  $('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(1).text();
		gender =  $('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(2).text();
		// classstudying =$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(3).text();
		// schemedate =$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(3).text();
		cswn =$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(3).text();
		
		rte =$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(4).text();
		school =$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(27).text();
			 
		if(school != 1)	  
		{
		 rtetype =$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(5).text();
	   rtetype1 =$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(5).find('input').val();
		}

		nmmsdate1 =$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(6).text().trim();
	    nmmsdate = nmmsdate1;
		
		
		trstsedate1 =$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(7).text().trim();
	    trstsedate = trstsedate1;
		
		
		
		inspiredate1 =$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(8).text().trim();
	    inspiredate = inspiredate1;
		
		
		
		remarks =$.trim($('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(9).text());
		//alert(remarks);
    gamename =$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(10).text();
    sportsschemedate =$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(11).text();
    particypy_level=$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(12).text();
    winnerlevel=$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(13).text();
	  nation =$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(14).text();
		benifit =$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(15).text();
		provid =$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(16).text();
		date =$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(17).text().trim();
    present_status =$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(18).text();
    training_type =$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(19).text();
    acadamic_year =$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(20).text().trim();

		sector_name =$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(21).text();	
		jobrole_name =$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(22).text();
		sclass =$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(24).text();
		section =$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(25).text();
   community_id =$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(27).text();
 // alert(community_id);

		
		 $('#'+nationaldeleted).hide();
		 $('#'+nationaledit).hide();
     $('#'+nationalsave).show();
		 $('#'+nationalcancel).show();
		  if(school !=1)
		  {
		  var rte_type = <?php echo json_encode($rte_type, JSON_PRETTY_PRINT)?>;
		   // console.log(rte_type);
		   rte_type_det =  rte_type.filter(rte=>rte.id==rtetype1)[0];
		   
		   var group_drop = "<select name='rtetype' id='rtetype' class='form-control'>";
			group_drop +="<option value=0>Select group</option>";
			
		 $.each(rte_type, function(idx, obj) {
			 
				group_drop +="<option value="+obj.id+">"+obj.category+"-"+obj.sub_category+"</option>";
				// if(obj.sub_category == )
				// {
					
					// rtetype_val = obj.obj.id;
					 // alert(group_drop);
				// }
            			
		 });
		  group_drop +="</select>";
		  }
		  
		   var cwse = <?php echo json_encode($cwse, JSON_PRETTY_PRINT)?>;
		   // console.log(cwse);
		   var cwse_drop = "<select name='cswn' id='cswn' class='form-control'>";
			cwse_drop +="<option value=0>Select group</option>";
			 cswn_val = '';
		 $.each(cwse, function(idx, obj) {
			
				cwse_drop +="<option value="+obj.da_code+">"+obj.da_name+"</option>";
				if(obj.da_name == cswn)
				{
					
					cswn_val = obj.da_code;
					// alert(cswn_val);
				}
            			
		 });
		     cwse_drop +="</select>";
		     var benefit = <?php echo json_encode($benefit, JSON_PRETTY_PRINT)?>;
		    // console.log(cwse);
		   var benefit_drop = "<select name='benifit' id='benifit' class='form-control'>";
			benefit_drop +="<option value=0>Select group</option>";
			 benefit_val = '';
		 $.each(benefit, function(idx, obj) {
			
				benefit_drop +="<option value="+obj.id+">"+obj.benefit+"</option>";
				if(obj.benefit == benifit)
				{
					
					benefit_val = obj.id;
					// alert(cswn_val);
				}
            			
		 });
		  benefit_drop +="</select>";

		       var sector_list = <?php echo json_encode($sector_list, JSON_PRETTY_PRINT)?>;
		    // console.log(cwse);
		   var sector_drop_down = "<select name='sector' id='sector' class='form-control'>";
			sector_drop_down +="<option value=0>Select Sector</option>";
			 sector_val = '';
		 $.each(sector_list, function(idx, obj) {
			
			    sector_drop_down +="<option value="+obj.id+">"+obj.sector+"</option>";
				if(obj.sector == sector_name)
				{
					sector_val = obj.id;
				}
            			
		 });
		 sector_drop_down +="</select>";

		 var job_role_list = <?php echo json_encode($job_role_list, JSON_PRETTY_PRINT)?>;
		    // console.log(cwse);
		   var jobrole_drop_down = "<select name='jobrole' id='jobrole' class='form-control'>";
		   jobrole_drop_down +="<option value=0>Select Job Role</option>";
			 jobrole_val = '';
			 
		 $.each(job_role_list, function(idx, obj) {
			
			jobrole_drop_down +="<option value="+obj.id+">"+obj.job_role+"</option>";
				if(obj.job_role == jobrole_name)
				{
					jobrole_val = obj.id;
				}
            			
		 });
		 jobrole_drop_down +="</select>";

       var present_status = <?php echo json_encode($present_status, JSON_PRETTY_PRINT)?>;
        console.log(present_status);
    var present_status_drop = "<select name='present_status' id='present_status' onchange=\"get_drop(\'training_type\',this)\" class='form-control'>";
      present_status_drop +="<option value=0>Select group</option>";
       present_status_val = '';
     $.each(present_status, function(idx, obj) {
      
        present_status_drop +="<option value="+obj.id+">"+obj.child_status+"</option>";
        if(obj.present_status == present_status)
        {
          
          present_status_val = obj.id;
          // alert(cswn_val);
        }
                  
     });
      present_status_drop +="</select>";
		  if(school !=1)
		  {
		  
		  var rtes = <?php echo json_encode($rte, JSON_PRETTY_PRINT)?>;
		  var  rte_val ='';
		    $.each(rtes, function(idx, obj) {
			 
				rte1 =obj.child_admitted_under_reservation;
				  // alert(rte1);
				// if(rte==null)
				// {
					// console.log('1');
					// //jQuery("#rte option:selected").val(2);
					// $("#rte1").val(2).attr("selected", "selected");
				// }
				// else
				// {
					// console.log('2');
				// }
				
		 });
		   var rte_drop = "<select name='rte1' id='rte1' onchange='handleSelectChange(event)'' class='form-control'>";
			rte_drop +="<option value=0>Select group</option>";
			rte_drop +="<option value='YES'>YES</option>";
			rte_drop +="<option value='NO'>NO</option>";
		
	

			if(rte == 'YES')
				{
					
					rte_val = 'YES';
					$("#rtetype").show();
					
					 
				}
				else
				{
					rte_val = 'NO';
					$("#rtetype").hide();
				}
			
		
		 rte_drop +="</select>";
		 
		  }
		    var pro_drop = "<select name='pro' id='pro' class='form-control'>";
			pro_drop +="<option value=0>Select Provided</option>";
			pro_drop +="<option value='ALIMCO'>ALIMCO</option>";
			pro_drop +="<option value='NON-ALIMCO'>NON-ALIMCO</option>";
		  pro_drop +="<option value='DDAWO'>DDAWO</option>";
	    pro_drop +="<option value='Others'>Others</option>";

		
		
		 pro_drop +="</select>";
		 
		  var acad_drop = "<select name='acad' id='acad' class='form-control'>";
			acad_drop +="<option value=0>Select Acad Year</option>";
			acad_drop +="<option value='2019-2020'>2019-2020</option>";
			acad_drop +="<option value='2018-2019'>2018-2019</option>";
		   

		
		
		 acad_drop +="</select>";
	
		 
	   $(this).closest('tr').find('td').attr('contenteditable','true');
       var sportslist = <?php echo json_encode($sportslist, JSON_PRETTY_PRINT)?>;
     console.log(sportslist);
     var game_drop = "<select name='addgame' id='addgame' class='form-control'>";
     var game_val = '';
     $.each(sportslist, function(idx, obj) {
        game_drop +="<option value="+obj.id+">"+obj.sport_name+"</option>";
        
        if(obj.sport_name == gamename)
        {
          game_val = obj.id;
        }
        
        
                  
     });
     var participating_level = <?php echo json_encode($participating_level, JSON_PRETTY_PRINT)?>;
     var participating_drop = "<select name='level' id='level' class='form-control'>";
     var participating_val = '';
     $.each(participating_level, function(idx, obj) {
        participating_drop +="<option value="+obj.id+">"+obj.participating_level+"</option>";
        
        if(obj.participating_level == sportsparticipatinglevel)
        {
          participating_val = obj.id;
        }
        
        
                  
     });
    
     var student_id =  '<input type="text" id="stuid" class="form-control" value="" disabled>';
	   var stu_name = '<input type="text" id="stu_name"   class="form-control" value="" disabled>';
	   var stu_gender = '<input type="text" id="gender" class="form-control" value="" disabled>';
     var stu_community_id = '<input type="text" id="community_id" class="form-control" value="">';
	  // var nationalclassid = '<in-put type="text" id="classid" class="form-control" value="" disabled>';
	  // var stu_cswn = '<input type="text" id="cswn" class="form-control" value="" >';
	  if(school !=1)
		  {
	   var stu_rte = '<input type="text" id="rte" class="form-control" >';
		  }
	  // var stu_rtetype = '<input type="text" id="rtetype" class="form-control" value="" placeholder="DD-MM-YYYY">';
	  var stu_nmmsdate = '<input type="text"  id="nmms_date" class="date1 form-control"  placeholder="d-m-Y">';
	  var stu_trstsedate = '<input type="text" id="trstse_date" class="date1 form-control"  placeholder="d-m-Y">';
	
	  var stu_inspiredate = '<input type="text" id="inspire_date" class="date1 form-control" value="" placeholder="d-m-Y">';

	  var stu_remark = '<input type="text" id="remark" class="form-control" value="">';
	  var stu_class = '<input type="text" id="sclass" class="form-control" value="">';
	  var stu_section = '<input type="text" id="section" class="form-control" value="">';
		  game_drop +="</select>";
    var sportsgame = '<td id="game"> '+game_drop+'</td>';
	  var sportsscheme_date = '<input type="date" id="sportsschemedate" class="form-control">';
 // participating_drop +="</select>";
    var particypy_level = '<select id="particypy_level" name="particypy_level"  class="form-control" ><option value="1">School</option><option value="2">Zone</option><option value="3">Division</option><option value="4">Block</option><option value="5">District</option><option value="6">State</option><option value="7">National</option></select>';
    var winnerlevel = '<select id="winnerlevel" name="winnerlevel"  class="form-control" ><option value="1">First (Gold)</option><option value="2">Second(Silver)</option><option value="3">Third(Bronze)</option></select>'; 
    
    var acadamic_year = '<select id="acadamic_year" name="acadamic_year"  class="form-control" ><option value="2018-19">2018-19</option><option value="2019-20">2019-20</option></select>'; 
 
   var training_type = '<select id="training_type" name="training_type"  class="form-control" ><option value="Non - residential Special training centres" data-value="3">Non - residential Special training centres</option><option value="Residential special training centes" data-value="3">Residential special training centes</option><option value="3.KGBVs" data-value="3">3.KGBVs</option><option value="Residential schools under Access" data-value="3">Residential schools under Access</option><option value="NCLP" data-value="3">NCLP</option><option value="Non- residential- seasonal migrants- inter- state" data-value="3">Non- residential- seasonal migrants- inter- state</option><option data-value="3" value="CWSN homebased (newly identified)">CWSN homebased (newly identified)</option><option data-value="1" value="Continuing studies">Continuing studies</option><option data-value="1" value="irregular / Long absentees">irregular / Long absentees</option><option data-value="1" value="discontinued">discontinued</option><option data-value="2" value="nil">nil</option></select>'; 

    var national = '<input type="text" id="nation" class="form-control" value="" onchange="checkwithexist(this)">';
		
		
		$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(0).html(student_id);
		$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(1).html(stu_name);
		$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(2).html(stu_gender);
		$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(3).html(cwse_drop);
		$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(4).html(rte_drop);
		$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(5).html(group_drop);
		$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(6).html(stu_nmmsdate);
		$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(7).html(stu_trstsedate);
		$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(8).html(stu_inspiredate);
		$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(9).html(stu_remark);
    $('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(10).html(game_drop);
    $('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(11).html(sportsscheme_date);
    $('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(12).html(particypy_level);
    $('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(13).html(winnerlevel);
  	$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(14).html(national);
		$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(15).html(benefit_drop);
		$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(16).html(pro_drop);
		$('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(17).html(acad_drop);
    $('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(18).html(present_status_drop);
    $('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(19).html(training_type);
    $('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(20).html(acadamic_year);
	  $('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(21).html(sector_drop_down);
	  $('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(22).html(jobrole_drop_down);
	
      $('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(24).html(stu_class);
	  $('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(25).html(stu_section);
    $('#state_scheme').find('tbody').find('tr').eq(index).find('td').eq(27).html(stu_community_id);
	   
		$("#stuid").val(stu_adid);
		$("#stu_name").val(student_name);
		$("#gender").val(gender);
		$("#cswn").val(cswn_val);
    $("#addgame").val(game_val);
    $("#sportsschemedate").val(sportsschemedate);
    $("#particypy_level").val(particypy_level);
    $("#winnerlevel").val(winnerlevel);
		
		$("#rte1").val(rte_val);
		// alert(rte_val);
		if(rte_val == 'YES')
		{
		$("#rtetype").val(rtetype1);
		$("#rtetype").show();
		}
		else{
		$("#rtetype").hide();
		
		}
			
		if(nmmsdate !=''){
			
		$("#nmms_date").val(nmmsdate);
		}
		$("#trstse_date").val(trstsedate);
		
		$("#inspire_date").val(inspiredate);
	  $("#remark").val(remarks);
    $("#sclass").val(sclass);
	  $("#section").val(section);
    $("#community_id").val(community_id);
		$("#nation").val(nation);
		$("#acad").val(date);
		$("#pro").val(provid);
		$("#benifit").val(benefit_val);
		$("#sector").val(sector_val);
		$("#jobrole").val(jobrole_val);
    $("#present_status").val(present_status_val);
    $("#acadamic_year").val(acadamic_year);

    $("#training_type").val(training_type);
		
	//alert(community_id);
		
		
		  $(this).prop("id","edit"+local_i);
          $(this).closest('tr').children('td').find('span').prop('id','save'+local_i);
		  local_i = index;
          
      });
	   $("#state_scheme tbody").on('click', '.cancel-class-section', function(e) {
		  location.reload();
	          });
			  $.fn.datepicker.defaults.format = "dd-mm-yyyy";
			  $(document).on("focus",".date1",function(){
				  // alert();	
	$('.date1').datepicker({
    // daysOfWeekDisabled: [0,6]
        
   });
			  });
			  
	$("#rtetype").show();
	function handleSelectChange(event) {

    var selectElement = event.target;
    var value = selectElement.value;
		
			if(value == 'YES')
				{
					
					rte_val = 'YES';
					$("#rtetype").show();
					
					 
				}
				else
				{
					rte_val = 'NO';
					$("#rtetype").hide();
				}
			
    
}

   function savenational(i,node)
    {

        var tb=node.parentNode.parentNode.parentNode;
        for(var i=2; i<tb.children.length; i++)
        {
            if((tb.children[i].children[0] instanceof HTMLSelectElement) || (tb.children[i].children[0] instanceof HTMLInputElement)){
                  if((tb.children[i].children[0].value=='') || (tb.children[i].children[0].value==null)){
                      if(tb.children[i].children[0].offsetParent !== null && tb.children[i].children[0].id!='nation'){

                          alert('Field Is required');
                          return true;
                      }
                      //alert(tb.children[i].children[0]);
                  }

            }
            //alert(tb.children[i].children[0]);
        }
     
     // return true;
		//alert(i);
		if(i==undefined || i=='' || i!=null)
		{ //alert();
        	 var stu_adid=	$("#stuid").val();
        	 console.log(stu_adid); 
        	
        	 var student_name=	$("#stu_name").val();
        	 var gender=$("#gender").val();
        	 var cswn =$("#cswn").val();
        	 var rte =$("#rte1").val();
        	 // alert(rte);
        	 if(rte == 'YES')
        	 {
        	 var rtetype =	$("#rtetype").val();
        	 }
        	 else
        	 {
        		 var rtetype =' '; 
        	 }
        	 var nmmsdate = $("#nmms_date").val();
        	 var trstsedate=	$("#trstse_date").val();
        	 var inspiredate =	$("#inspire_date").val();
        	 var remark =   $("#remark").val();
           var game =$("#addgame").val();
           var sportsschemedate = $("#sportsschemedate").val();
           var particypy_level = $("#particypy_level").val();
           var winnerlevel = $("#winnerlevel").val();
        	 var stuclass =   $("#sclass").val();
           
           var stusection =   $("#section").val();
		   
		       var nation= $("#nation").val();
		       var dates= $("#acad").val();
		       var pro =$("#pro").val();
		       var benifit = $("#benifit").val();
           var present_status = $("#present_status").val();
           var acadamic_year = $("#acadamic_year").val();
           var training_type = $("#training_type").val();
           var sector = $("#sector").val();
         	 var jobrole = $("#jobrole").val();
            var stu_community_id = $("#community_id").val();
      //alert(stu_community_id);
 
        	 //alert(winnerlevel);
        		  swal({
                title: "Are you sure?",
                text: "Do you want to Final Submit?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#ff0000",
                confirmButtonText: "Yes, Final Submit!",
                closeOnConfirm: false,
                showLoaderOnConfirm: true
           }, function(isConfirm){
            if (isConfirm)
        		 //return false;	
        				$.ajax(
        				{
        					data:{'stu_adid':stu_adid,'community_id':stu_community_id,'student_name':student_name,'gender':gender,'cswn':cswn,'rte':rte,'rtetype':rtetype,'nmmsdate':nmmsdate,'trstsedate':trstsedate,'inspiredate':inspiredate,'remark':remark,'stuclass':stuclass,'stusection':stusection,'game':game,'sportsschemedate':sportsschemedate,'particypy_level':particypy_level,'winnerlevel':winnerlevel,'nation':nation,'dates':dates,'pro':pro,'benifit':benifit,'present_status':present_status,'ac_year':acadamic_year,'training_type':training_type,'sector':sector,'jobrole':jobrole},
        					url:baseurl+'Home/add_student_scholor',
        					type:"POST",
        					dataType:"JSON",
        					success:function(res)
        					{

        						swal("OK", "Saved Successfully.Please Check in the Register", "success");
        						window.location.reload();
        					}
        				});
                 else
                 
                swal("Cancelled", "Your cancelled the Final Submit","error");
            }); 
		}
	}
	
	  function deletenmms(i)  
		 { 
			 deletedid=i;
			 
		            $.ajax(
		            {
			data:{'deleteid':deletedid},
			url:baseurl+'Home/delete_student_scholor_national',
			type:"POST",
			dataType:"JSON",
			success:function(res)
			{
				
			swal("OK", "Student Record Deleted Successfully", "success");
			window.location.reload();
				}
				
			
			 
			
		    });
		 }
		 function get_section()
    {
  // alert(section_id);
  var classid=$("#classno").val();
      if(classid !=0){
    $.ajax(
    {
        type: "POST",
        url:baseurl+'Home/get_school_section_details',
        data:{'class_id':classid},
        success: function(resp){
        // alert(resp);  
       
        var section = JSON.parse(resp);
        console.log(section);
        var section_drop = '<select name="section_id" class="form-control" id="section_id">';
        section_drop += '<option value=0>Select Section</option>';
        $.each(section,function(id,val)
        {
            section_drop +='<option value='+ val.section +'>'+val.section+'</option>';
        })
            section_drop +='</select>';
            
            $("#sectionname").empty('');            
            $("#sectionname").html(section_drop); 
           
            
         },
          
    })
    }
    }  
      
/**************************/
/*End of the all_nmms form */
/*************************/	
			
	   $(document).ready(function()
{
    sum_dataTable('.sample_2');

});

function sum_dataTable(dataId){
    var table = $(dataId).DataTable({
      dom: 'Bfrtip',
        buttons: [
                { extend: 'print', className: 'btn default' },
                { extend: 'pdf', className: 'btn default' },
                { extend: 'csv', className: 'btn default' }
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
                console.log(a);
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
               
            
            $(column.footer()).html(sum);
                        });
            }
        });
    }
      
		function checkwithexist(data){
					if(data.value){
					$.ajax({
							type: "POST",
							url:baseurl+'Home/check_nation_id_with_exist',
							data:"&rec="+data.value,
							success: function(resp){
							if(resp == 1 ){
								alert('Record already exists!');
								if(document.getElementById('nation')){
								document.getElementById('nation').value = "";
								}
							}
							}
						});
					}
		}

    function get_drop(optionnode,node){
        var optval=node.value;
        var optnode=document.getElementById(optionnode);
        for(var i=0;i<optnode.children.length;i++){
            if(optnode.children[i].getAttribute('data-value')!=optval){
                optnode.children[i].style.display="none";
            }else{
              optnode.children[i].style.display="";
            }
        }
        //alert(optval);
    }
    function get_class(node)
    {
     // alert(node.value);
   
        var classno=document.getElementById('classno');
      
        for(var i=0; i<classno.children.length; i++){
          if(classno.children[i].getAttribute('value')<=8 && classno.children[i].getAttribute('value')<=12  && node.value==6) 
          {
            classno.children[i].style.display="none";
          }
         else
         {
          classno.children[i].style.display="";
         }
        }
      }
    


  </script>



    </body>

</html>