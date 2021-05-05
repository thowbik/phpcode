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
											.select2-container--bootstrap .select2-results__option[aria-selected=true] {
    
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

<ul class="nav nav-tabs">
  <!--<li class="active"><a data-toggle="tab" onclick="openCity(event, 'London')">Add Student</a></li>-->
  <li><a data-toggle="tab" onclick="openCity(event, 'Paris')">View Register</a></li>
  
</ul>

    



</div>
<br>

                                                
                                                <center>
                                                  <form id="filter" method="post" action="<?php echo base_url().'Home/get_student_scheme_list_nmms';?>">
												  
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
																case $sta="3":$standard='VIII';break;
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
                                                     <button type="submit"  class="btn green" id="emis_stu_searchsep_sub" >SUBMIT</button>
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
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i>NMMS Scheme
															
															</div>
                                                        <div class="tools" style="margin-top: 20px;"> </div>
                                                    </div>
                                                    <div class="portlet-body" >
													<div id="London" class="tabcontent tab-pane fade in active">
                                                        <table class="table table-striped table-bordered table-hover  sample_2" id="national_scheme">
														
                                                            <thead>
                                                                <tr>
																   
																   <th>Student Id</th>
                                                                    <th>Student Name</th>
                                                                    <th style="width:0%;">Gender</th>
                                                                    <th style="width:0%;" >Class Studying</th>
																	<th style="width:0%;">NMMS Exam Passed on</th>
																
                                                                    <th style="width:0%;">Action</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody >
															<?php
                                                            $ii='';
															if(!empty($nmms_search))
															{
																$i=1;
																
                                                              foreach($nmms_search as $sd)
															   {
																   ?>
                                                               <tr>
															        
                                                                    <td><?php echo $sd->unique_id_no;?></td> 
                                                                    <td><?php echo $sd->name;?></td>
																	<?php 
																	if($sd->gender==1)
																	{
																		?>
																	<td>Male</td>
																	<?php 
																	}
																	?>
																	<?php 
																	if($sd->gender==2)
																	{
																		?>
																	<td>Female</td>
																	<?php 
																	}
																	?>
																	<?php 
																	if($sd->gender==3)
																	{
																		?>
																	<td>Others</td>
																	<?php 
																	}
																	?>
                                                                    <td><?php echo $sd->class_studying_id;?>-<?php echo $sd->class_section;?></td>
                                                                    <td><?php echo $sd->nmmsexam_passed; ?></td>
                                                                     <td><a href="javascript:;" class="btn btn-sm green edit-class-section" id="edit<?php echo $i; ?>"  contenteditable="false" data-class-section-id ="<?php echo $i;  ?>">Edit / Update <!--<i class="fa fa-edit"></i>--></a>
																	 <a href="javascript:;" class="btn btn-sm red delete-class-section" id="deleted<?php echo $i; ?>"  onclick='deletenmms(<?php echo $sd->id;?>);' contenteditable="false" data-class-deleted-id ="<?php echo $i;?>">Delete </a>
																	<span>
																	<button data-id="2" style="display:none;" id="save<?php echo $i;  ?>" class="btn btn-sm green save-class-section" onclick="savenational(<?php echo $d->id;?>)" contenteditable="false">save</button>
																	<button data-id="3"  style="display:none; margin-left: 72px margin-top: -54px"; id="cancel<?php echo $i; ?>" class="btn btn-sm red cancel-class-section" onclick="cancel(<?php echo $i?>)">cancel</button>
																   </span>
                                                                    </td>
                                                               </tr>
															   <?php  $i++; }
															  $ii=$i;
															}
															
                                                            $ii;
															if(!empty($nmms))
															{
                                                              foreach($nmms as $nms)
															   {
																   ?>
                                                               <tr>
															        
                                                                    <td><?php echo $nms->student_id;?></td> 
                                                                    <td><?php echo $nms->name;?></td>
																	<?php 
																	if($nms->gender==1)
																	{
																		?>
																	<td>Male</td>
																	<?php 
																	}
																	?>
																	<?php 
																	if($nms->gender==2)
																	{
																		?>
																	<td>Female</td>
																	<?php 
																	}
																	?>
																	<?php 
																	if($nms->gender==3)
																	{
																		?>
																	<td>Others</td>
																	<?php 
																	}
																	?>
                                                                    <td><?php echo $nms->class_studying_id;?>-<?php echo $nms->class_section;?></td>
                                                                    <td><?php echo $nms->nmmsexam_passed;?></td>
                                                                     <td><a href="javascript:;" class="btn btn-sm green edit-class-section" id="edit<?php echo  $ii; ?>"  contenteditable="false" data-class-section-id ="<?php echo  $ii;  ?>">Edit / Update <!--<i class="fa fa-edit"></i>--></a>
																	 <a href="javascript:;" class="btn btn-sm red delete-class-section" id="deleted<?php echo $ii; ?>"  onclick='deletenmms(<?php echo $nms->id;?>);' contenteditable="false" data-class-deleted-id ="<?php echo $i;?>">Delete </a>
																	<span>
																	<button data-id="2" style="display:none;" id="save<?php echo  $ii;  ?>" class="btn btn-sm green save-class-section" onclick="savenational(<?php echo $nms->id;?>)" contenteditable="false">save</button>
																	<button data-id="3"  style="display:none; margin-left: 72px margin-top: -54px"; id="cancel<?php echo  $ii; ?>" class="btn btn-sm red cancel-class-section" onclick="cancel(<?php echo  $ii?>)">cancel</button>
																   </span>
                                                                    </td>
                                                               </tr>
															   <?php  $ii++; }
															  
															}
															
                                                           ?>
                                                            </tbody>
															
                                                        </table>
														</div>
														<div id="Paris" class="tabcontent">
														<table class="table table-striped table-bordered table-hover  sample_2" id="all_national_scheme">
                                                            <thead>
                                                                <tr>
																   
																   <th>Student Id</th>
                                                                    <th>Student Name</th>
                                                                    <th style="width:0%;">Gender</th>
                                                                    <th style="width:0%;" >Class Studying</th>
																	<th style="width:0%;">NMMS Exam Passed on</th>
																
                                                                    <th style="width:0%;">Action</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
															<?php
                                                            $i=1;
															if(!empty($nmms_all))
															{
                                                              foreach($nmms_all as $na)
															   {
																   ?>
                                                               <tr>
															        
                                                                    <td><?php echo $na->student_id;?></td> 
                                                                    <td><?php echo $na->name;?></td>
																	<?php 
																	if($na->gender==1)
																	{
																		?>
																	<td>Male</td>
																	<?php 
																	}
																	?>
																	<?php 
																	if($na->gender==2)
																	{
																		?>
																	<td>Female</td>
																	<?php 
																	}
																	?>
																	<?php 
																	if($na->gender==3)
																	{
																		?>
																	<td>Others</td>
																	<?php 
																	}
																	?>
                                                                    <td><?php echo $na->class_studying_id;?>-<?php echo $na->class_section;?></td>
                                                                    <td><?php echo $na->nmmsexam_passed; ?></td>
                                                                     <td><a href="javascript:;" class="btn btn-sm green all_edit-class-section" id="alledit<?php echo $i; ?>"  contenteditable="false" data-class-section-id ="<?php echo $i;  ?>">Edit / Update <!--<i class="fa fa-edit"></i>--></a>
																	 <a href="javascript:;" class="btn btn-sm red all_delete-class-section" id="alldeleted<?php echo $i; ?>"  onclick='alldeletednmms(<?php echo $na->id;?>);' contenteditable="false" data-class-deleted-id ="<?php echo $i;?>">Delete </a>
																	<span>
																	<button data-id="2" style="display:none;" id="allsave<?php echo $i;  ?>" class="btn btn-sm green all_save-class-section" onclick="saveallnational(<?php echo $na->id;?>)" contenteditable="false">save</button>
																	<button data-id="3"  style="display:none; margin-left: 72px margin-top: -54px"; id="allcancel<?php echo $i; ?>" class="btn btn-sm red all_cancel-class-section">cancel</button>
																   </span>
                                                                    </td>
                                                               </tr>
															   <?php  $i++; }
															  
															}
															
                                                            ?>
                                                            </tbody>
															
                                                        </table>
														 </div>
														 <!--<div class="row">
															   <div class="col-md-offset-10 col-md-2">
													  					<a href="javascript:;" 
                                                                           class="btn btn-sm red add_another" style="margin-left: -17px;"
                                                                           data-class-section-id ="<?php echo $d->id;  ?>" > 
                                                                             Final Submit &nbsp;<i class="fa fa-plus-o "></i>
                                                                        </a>
																		</div>
																		</div>--> 
																		</div>
																
														 
														 <!--<div class="row">
															   <div class="col-md-offset-10 col-md-2">
													  					<a href="javascript:;" 
                                                                           class="btn btn-sm green add_another" style="margin-left: -17px;"
                                                                           data-class-section-id ="<?php echo $d->id;  ?>" > 
                                                                             Add Class Section &nbsp;+<i class="fa fa-plus-o "></i>
                                                                        </a>
																		</div>
																		</div>--> 
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
	$("#schemeid").select2({closeOnSelect:false});
	$("#save").hide();
	$("#cancel").hide();
	  })
	
 

           
               
/****************************************/
/*student nmms scholor scheme */
/**************************************/
			 var local_i =-1;
         $("#national_scheme tbody").on('click', '.edit-class-section', function(e) {
        index =  $(this).closest('tr').index();
		var nationalsave = $(this).closest('tr').children('td').find('button').attr('id');
		var nationalcancel = $(this).closest('tr').children('td').find('.cancel-class-section').attr('id');
		var nationalclass_id = $(this).closest('tr').children('td').find('input').attr('id');
         var nationaledit =  $(this).attr("id"); 
		 var nationaldeleted =  $(this).closest('tr').children('td').find('.delete-class-section').attr('id'); 
		if(local_i!=-1){
			
           $('#national_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(0).text(nationalstu_adid);
            $('#national_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(1).text(nationalstudent_name);
            $('#national_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(2).text(nationalgender);
            $('#national_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(3).text(nationalclassstudying);
            $('#national_scheme').find('tbody').find('tr').eq(local_i).find('td').eq(4).text(nationalschemedate);
            //$('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(6).text(DOJ);
         }
		nationalstu_adid =  $('#national_scheme').find('tbody').find('tr').eq(index).find('td').eq(0).text();
		nationalstudent_name =  $('#national_scheme').find('tbody').find('tr').eq(index).find('td').eq(1).text();
		nationalgender =  $('#national_scheme').find('tbody').find('tr').eq(index).find('td').eq(2).text();
		nationalclassstudying =$('#national_scheme').find('tbody').find('tr').eq(index).find('td').eq(3).text();
		nationalschemedate =$('#national_scheme').find('tbody').find('tr').eq(index).find('td').eq(4).text();
		 $('#'+nationaldeleted).hide();
		 $('#'+nationaledit).hide();
         $('#'+nationalsave).show();
		 $('#'+nationalcancel).show();
		 
	   $(this).closest('tr').find('td').attr('contenteditable','true');
       var nationalstudent_id =  '<input type="text" id="stuid" class="form-control" value="" disabled>';
	   var nationalstu_name = '<input type="text" id="stu_name"   class="form-control" value="" disabled>';
	   var nationalstu_gender = '<input type="text" id="gender" class="form-control" value="" disabled>';
	  var nationalclassid = '<input type="text" id="classid" class="form-control" value="" disabled>';
	  var nationalscheme_date = '<input type="date" id="schemedate" class="form-control" value="">';
		
		
		$('#national_scheme').find('tbody').find('tr').eq(index).find('td').eq(0).html(nationalstudent_id);
		$('#national_scheme').find('tbody').find('tr').eq(index).find('td').eq(1).html(nationalstu_name);
		$('#national_scheme').find('tbody').find('tr').eq(index).find('td').eq(2).html(nationalstu_gender);
		$('#national_scheme').find('tbody').find('tr').eq(index).find('td').eq(3).html(nationalclassid);
		$('#national_scheme').find('tbody').find('tr').eq(index).find('td').eq(4).html(nationalscheme_date);
		
		$("#stuid").val(nationalstu_adid);
		$("#stu_name").val(nationalstudent_name);
		$("#gender").val(nationalgender);
		$("#classid").val(nationalclassstudying);
		$("#schemedate").val(nationalschemedate);
		
		
		
		
		  $(this).prop("id","edit"+local_i);
          $(this).closest('tr').children('td').find('span').prop('id','save'+local_i);
		  local_i = index;
          
      });
	   $("#national_scheme tbody").on('click', '.cancel-class-section', function(e) {
		  location.reload();
	          });
   function savenational(i)
    {
		if(i==undefined)
		{
			
		
	    var nationalstudent_id = $("#stuid").val();
		var nationalstudent_name = $("#stu_name").val();
        var nationalclass_section =$("#classid").val();
        var nationalscheme_date =$("#schemedate").val();
		 if(nationalscheme_date == '')
	             {
				swal("OK", "All Field Is Required", "error");
		         }
			/* End of the Condition */  	 
         else
		{		
				$.ajax(
				{
					data:{'student_id':nationalstudent_id,'student_name':nationalstudent_name,'class_section':nationalclass_section,'scheme_date':nationalscheme_date,'updateid':updateid},
					url:baseurl+'Home/add_student_scholor_national',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						swal("OK", "Scholor Student Saved Successfully", "success");
						window.location.reload();
					}
				});
		}
	}
	else
		{
		  var updateid=i;
		  var nationalscheme_date =$("#schemedate").val();
		  if(nationalscheme_date == '')
	             {
				swal("OK", "All Field Is Required", "error");
		         }
			/* End of the Condition */  	 
         else
		{		
				$.ajax(
				{
					data:{'updateid':updateid,'scheme_date':nationalscheme_date,},
					url:baseurl+'Home/update_student_scholor_national',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						swal("OK", "Scholor Student Updated Successfully", "success");
						window.location.reload();
					}
				});
		}
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
			 var local_j =-1;
         $("#all_national_scheme tbody").on('click', '.all_edit-class-section', function(e) {
			 
        index =  $(this).closest('tr').index();
		var allnationalsave = $(this).closest('tr').children('td').find('button').attr('id');
		var allnationalcancel = $(this).closest('tr').children('td').find('.all_cancel-class-section').attr('id');
		var allnationalclass_id = $(this).closest('tr').children('td').find('input').attr('id');
         var allnationaledit =  $(this).attr("id"); 
		 var allnationaldeleted =  $(this).closest('tr').children('td').find('.all_delete-class-section').attr('id'); 
		if(local_j!=-1){
			
           $('#all_national_scheme').find('tbody').find('tr').eq(local_j).find('td').eq(0).text(all_nationalstu_adid);
            $('#all_national_scheme').find('tbody').find('tr').eq(local_j).find('td').eq(1).text(all_nationalstudent_name);
            $('#all_national_scheme').find('tbody').find('tr').eq(local_j).find('td').eq(2).text(all_nationalgender);
            $('#all_national_scheme').find('tbody').find('tr').eq(local_j).find('td').eq(3).text(all_nationalclassstudying);
            $('#all_national_scheme').find('tbody').find('tr').eq(local_j).find('td').eq(4).text(all_nationalschemedate);
            //$('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(6).text(DOJ);
         }
		all_nationalstu_adid =  $('#all_national_scheme').find('tbody').find('tr').eq(index).find('td').eq(0).text();
		all_nationalstudent_name =  $('#all_national_scheme').find('tbody').find('tr').eq(index).find('td').eq(1).text();
		all_nationalgender =  $('#all_national_scheme').find('tbody').find('tr').eq(index).find('td').eq(2).text();
		all_nationalclassstudying =$('#all_national_scheme').find('tbody').find('tr').eq(index).find('td').eq(3).text();
		all_nationalschemedate =$('#all_national_scheme').find('tbody').find('tr').eq(index).find('td').eq(4).text();
		 $('#'+allnationaldeleted).hide();
		 $('#'+allnationaledit).hide();
         $('#'+allnationalsave).show();
		 $('#'+allnationalcancel).show();
		 
	   $(this).closest('tr').find('td').attr('contenteditable','true');
       var all_nationalstudent_id =  '<input type="text" id="allstuid" class="form-control" value="" disabled>';
	   var all_nationalstu_name = '<input type="text" id="allstu_name"   class="form-control" value="" disabled>';
	   var all_nationalstu_gender = '<input type="text" id="allgender" class="form-control" value="" disabled>';
	  var all_nationalclassid = '<input type="text" id="allclassid" class="form-control" value="" disabled>';
	  var all_nationalscheme_date = '<input type="date" id="allschemedate" class="form-control" value="">';
		
		
		$('#all_national_scheme').find('tbody').find('tr').eq(index).find('td').eq(0).html(all_nationalstudent_id);
		$('#all_national_scheme').find('tbody').find('tr').eq(index).find('td').eq(1).html(all_nationalstu_name);
		$('#all_national_scheme').find('tbody').find('tr').eq(index).find('td').eq(2).html(all_nationalstu_gender);
		$('#all_national_scheme').find('tbody').find('tr').eq(index).find('td').eq(3).html(all_nationalclassid);
		$('#all_national_scheme').find('tbody').find('tr').eq(index).find('td').eq(4).html(all_nationalscheme_date);
		
		$("#allstuid").val(all_nationalstu_adid);
		$("#allstu_name").val(all_nationalstudent_name);
		$("#allgender").val(all_nationalgender);
		$("#allclassid").val(all_nationalclassstudying);
		$("#allschemedate").val(all_nationalschemedate);
		
		  $(this).prop("id","alledit"+local_i);
          $(this).closest('tr').children('td').find('span').prop('id','allsave'+local_j);
		  local_j = index;
          
      });
	   $("#all_national_scheme tbody").on('click','.all_cancel-class-section', function(e) {
		   window.location.reload();
	          });
			  
function saveallnational(i)
    {
		
		  var updateid=i;
		  var allnationalscheme_date =$("#allschemedate").val();
		  if(allnationalscheme_date == '')
	             {
				swal("OK", "All Field Is Required", "error");
		         }
			/* End of the Condition */  	 
         else
		{		
				$.ajax(
				{
					data:{'updateid':updateid,'scheme_date':allnationalscheme_date,},
					url:baseurl+'Home/update_student_scholor_national',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						swal("OK", "Scholor Student Updated Successfully", "success");
						window.location.reload();
					}
				});
		}
		
	 }
	 function alldeletednmms(i)  
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
		function isNumberKey(evt)
       {
		  
          var charCode = (evt.which) ? evt.which : evt.keyCode;
           if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122)) {
        return false;
    }

          return true;
       }
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
      

        </script>



    </body>

</html>