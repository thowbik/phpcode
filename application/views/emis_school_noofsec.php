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
            


<?php $userlogin=$this->session->userdata('emis_user_type_id'); 	?>            
<?php if($this->session->userdata('emis_user_type_id') == 3 ) 	
{?>
<?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
<?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 5){ ?>
<?php $this->load->view('state/header.php'); }else{ $this->load->view('header.php'); } ?>


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
										
                                            <small>School profile edit and update</small>
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
                                     
                                         
                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Class-wise No. of Sections Available in the School</span>
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
                                            <!--begin form -->
                                           

                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row"> 
                                                            <!--<div class="col-md-4"> 
                                                                <a href="javascript:;" class="btn btn-sm green add-class-section"> Add Class Section details <i class="fa fa-edit"></i></a>
                                                            </div>
                                                        </div>-->
                                                        <div class="row">
                                                            <br>
                                                        </div>

                                                <!-- Add Model -->

                                                 
                                             



                                               


                                               <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> Number of Sections Available in the School </div>
                                                        <div class="tools" style="margin-top: 20px;"> </div>
                                                    </div>
                                                    <div class="portlet-body">
													
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
																  
																   <th style="display:none"> School Id</th>
																   
                                                                    <th> Standard </th>
                                                                    <th style="width:15%;"> Sections  <br> Names </th>
                                                                    <th style="width:15%;" >Group Name</th>
																	<?php
																	$schoolcategory=$schoolcate[0]->manage_cate_id;
																	//$schoolcategory=2;
																	if($schoolcategory==2 ||$schoolcategory==4)
																		{
																			?>
																	<th style="width:20%;">School Options</th>
																	<?php
																		}
																		else
																		{
																			?>
																			<th style="display:none";></th>
																			<?php
																		}
																		?>	
																	<th>Medium of Instruction</th>
                                                                    <th style="width:25%;">Action</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                             <?php                                                           
                                                              $i=1;
                                                              foreach($details as $d)
															   {
																  $classid=$d->class_id;
																  switch ($classid) {
																case "1":$standard='I';break;
																case "2":$standard='II';break;
																case "3":$standard='III';break;	
																case "4":$standard='IV';break;	
																case "5":$standard='V';break;
																case "6":$standard='VI';break;	
																case "7":$standard='VII';break;	
																case "8":$standard='VIII';break;
																case "9":$standard='IX';break;	
																case "10":$standard='X';break;	
																case "11":$standard='XI';break;	
																case "12":$standard='XII';break;	
																case "13":$standard='LKG';break;	
																case "14":$standard='UKG';break;	
																case "15":$standard='Pre KG';break;	
																	
																}
																		?>
                                                               <tr>
                                                                     
                                                                    <td style="display:none";><?php echo $d->school_id;  ?></td>
																	
																	<td><?php echo $standard;  ?>
																	<input type="hidden" id="<?php echo $i;?>" value="<?php echo $classid?>">
																	</td>
                                                                    
                                                                    <td><?php echo $d->section; ?></td>
                                                                    <td><?php echo $d->group_name;  ?></td>
																	<?php
																  $schooltype=$d->school_type; 															 
                                                                  if($schooltype==1)
																		{
																		$aidedoption='Aided';	
																		}
																		elseif($schooltype==2)
																		{
																		$aidedoption='Self-financed';		
																		}else
																		{
																			$aidedoption='Not marked';
																		}
																		
																		
																		$schoolcategory=$schoolcate[0]->manage_cate_id;
																		//$schoolcategory=2;
																		if($schoolcategory==2 ||$schoolcategory==4)
																		{
																			?>
																		<td><?php echo $aidedoption;  ?>
																	<input type="hidden"  id="aided<?php echo $i;?>" value="<?php echo $d->school_type;?>"></td>
                                                                     <?php													
																		}
																		else
																		{
																			?>
																			<td style="display:none"></td>
																			<?php
																		}
																		 ?>
																																	
																	
																	
                                                                    
																	<td><?php echo $d->MEDINSTR_DESC;  ?>
																	<input type="hidden" class="medium" id="medium<?php echo $i;?>" value="<?php echo $d->school_language;?>"></td>
                                                                     <td><a href="javascript:;" class="btn btn-sm green edit-class-section" id="edit<?php echo $i; ?>"  contenteditable="false" data-class-section-id ="<?php echo $i;  ?>">Edit <!--<i class="fa fa-edit"></i>--></a>
																	 <a href="javascript:;" class="btn btn-sm red delete-class-section" id="deleted<?php echo $i; ?>"  onclick='deleteclass("<?php echo $d->id;?>","<?php echo $d->section;?>","<?php echo $classid;?>");' contenteditable="false" data-class-deleted-id ="<?php echo $i;?>">Delete </a>
																	<span>
																	<button data-id="2" style="display:none;" id="save<?php echo $i;  ?>" class="btn btn-sm green save-class-section" onclick="editsave(<?php echo $d->id;?>)" contenteditable="false">save</button>
																	<button data-id="3"  style="display:none; margin-left: 72px margin-top: -54px"; id="cancel<?php echo $i; ?>" class="btn btn-sm red cancel-class-section" onclick="cancel(<?php echo $i?>)">cancel</button>
																   </span>
                                                                    </td>
																	
																	
																	
                                                                   
																
																	
                                                                    

                                                               </tr>
                                                               <?php $i++;  }  ?>
                                                             
                                                            </tbody>
															
                                                        </table>
														 <div class="row">
															   <div class="col-md-offset-10 col-md-2">
													  					<a href="javascript:;" 
                                                                           class="btn btn-sm green add_another" style="margin-top: -79px; margin-left: -17px;"
                                                                           data-class-section-id ="<?php echo $d->id;  ?>" > 
                                                                             Add Class Section &nbsp;+<i class="fa fa-plus-o "></i>
                                                                        </a>
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

                 
        </div>
 <?php $this->load->view('footer.php'); ?>
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
           
      

           
               
               //emis_no_sections
               
             $("#tbl").hide(); 
			 var local_i =-1;
			 var standard = '';
			 var medium='';
			 
  $("#sample_2 tbody").on('click', '.edit-class-section', function(e) {
     index =  $(this).closest('tr').index();
	 
		 
		  
	    
		var save = $(this).closest('tr').children('td').find('button').attr('id');
		var cancel = $(this).closest('tr').children('td').find('.cancel-class-section').attr('id');
		var class_id = $(this).closest('tr').children('td').find('input').attr('id');
		//alert(class_id);
         var edit =  $(this).attr("id"); 
		 var deleted =  $(this).closest('tr').children('td').find('.delete-class-section').attr('id'); 
		if(local_i!=-1){
		   // $("#edit"+local_i).show();
           // $("#save"+local_i).hide();
           $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(1).text(standard);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(2).text(sectionname);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(3).text(groupname);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(4).text(schooltype);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(5).text(language);
            //$('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(6).text(DOJ);
         }
		standard1 =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(1).text();
		standard=standard1.trim();
		sectionname =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(2).text();
		groupname =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(3).text();
		schooltype1 =$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(4).text();
		schooltype=schooltype1.trim();
		language1 =$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(5).text();
		language=language1.trim();
		
		
		
		
		 $('#'+deleted).hide();
		 $('#'+edit).hide();
         $('#'+save).show();
		 $('#'+cancel).show();
		 	
		 var classid=$('#'+class_id).val();
		 
		
	   $(this).closest('tr').find('td').attr('contenteditable','true');
	   // var html = '<select id="classid" name="classid" vlaue="classid">'; 
	  var mediumdetails = <?php echo json_encode($mediumdetails, JSON_PRETTY_PRINT)?>;
		var medium_drop = "<select name='addmedium' id='addmedium' class='form-control'>";
		 var medium_val = '';
		 $.each(mediumdetails, function(idx, obj) {
				medium_drop +="<option value="+obj.MEDINSTR_ID+">"+obj.MEDINSTR_DESC+"</option>";
				if(obj.MEDINSTR_DESC == language)
				{
					medium_val = obj.MEDINSTR_ID;
				}	
		 });
		 if(standard=='XII' || standard=='XI')
					{
					 
					
		 var groupdetails = <?php echo json_encode($groupdetails, JSON_PRETTY_PRINT)?>;
		 var group_drop = "<select name='addgroup' id='addgroup' class='form-control'>";
		 var group_val = '';
		 //group_drop +="<option value=0>Select group</option>";
		 $.each(groupdetails, function(idx, obj) {
			 
				group_drop +="<option value="+obj.id+">"+obj.group_name+"</option>";
				if(obj.group_name == groupname)
				{
				group_val = obj.id;	
				$("#group").css("display", "");
				}
		    });
					}
						else
					{
				   group_val = '';
				   $("#group").css("display", "none");
					}
					
	   medium_drop +="</select>";
	   var lowclass;
	   var highclass;
	  var classtype = <?php echo json_encode($classtype, JSON_PRETTY_PRINT)?>;
	   $.each(classtype, function(idx, obj) {
		   lowclass=obj.low_class;
		   console.log(lowclass);
		   highclass=obj.high_class;
		  
			}); 
	   if(lowclass==13)
		  {
			lc=lowclass; 
			hc=highclass;
			var select_class = [];
			for (i = 1; i <= parseInt(hc); i++) { 
             switch (i) {
               case 1:classr = "I";break;
               case 2:classr = "II";break;
               case 3: classr = "III"; break;
               case 4:classr = "IV"; break;
               case 5: classr = "V"; break;
			   case 6:classr = "VI";break;
               case 7:classr = "VII";break;
               case 8: classr = "VIII"; break;
               case 9:classr = "IX"; break;
               case 10: classr = "X"; break;
			   case 11:classr = "XI"; break;
               case 12: classr = "XII"; break;
            } 				
	        var classes='<option value='+ i +'>'+classr+'</option>';
			select_class.push(classes);
            }
			var html='<select id="standard" name="standard"  class="form-control" >'+select_class+'<option value='+ 13 +'>LKG</option><option value='+ 14 +'>UKG</option></select>';	
	        
		  }
		  else if(lowclass==14)
		  {
			lc=1; 
			hc=highclass;
			var select_class = [];
           for (i = parseInt(lc); i <= parseInt(hc); i++) { 
		   switch (i) {
               case 1:classr = "I";break;
               case 2:classr = "II";break;
               case 3: classr = "III"; break;
               case 4:classr = "IV"; break;
               case 5: classr = "V"; break;
			   case 6:classr = "VI";break;
               case 7:classr = "VII";break;
               case 8: classr = "VIII"; break;
               case 9:classr = "IX"; break;
               case 10: classr = "X"; break;
			   case 11:classr = "XI"; break;
               case 12: classr = "XII"; break;
            }
	       var classes='<option value='+ i +'>'+classr+'</option>';
	       select_class.push(classes);
             }	
             var html='<select id="standard" name="standard"  class="form-control" >'+select_class+'<option value='+ 14 +'>UKG</option></select>';			 
		  }	
         else if(lowclass==15)
		 {
			lc=lowclass; 
			hc=highclass;
			var select_class = [];
			for (i = 1; i <= parseInt(hc); i++) {
           switch (i) {
               case 1:classr = "I";break;
               case 2:classr = "II";break;
               case 3:classr = "III"; break;
               case 4:classr = "IV"; break;
               case 5: classr = "V"; break;
			   case 6:classr = "VI";break;
               case 7:classr = "VII";break;
               case 8: classr = "VIII"; break;
               case 9:classr = "IX"; break;
               case 10: classr = "X"; break;
			   case 11:classr = "XI"; break;
               case 12: classr = "XII"; break;
            }				
	       var classes='<option value='+ i +'>'+classr+'</option>';
		   select_class.push(classes);
             }
           //console.log(select_class)			 
		   var html='<select id="standard" name="standard"  class="form-control" >'+select_class+'<option value='+ 13 +'>LKG</option><option value='+ 14 +'>UKG</option><option value='+ 15 +'>PRE KG</option></select>';
		   
		   		 }
        else
         {
			lc=lowclass;		
			var select_class = [];
			for (i = parseInt(lc); i <= parseInt(highclass); i++) {
             switch (i) {
               case 1:classr = "I";break;
               case 2:classr = "II";break;
               case 3: classr = "III"; break;
               case 4:classr = "IV"; break;
               case 5: classr = "V"; break;
			   case 6:classr = "VI";break;
               case 7:classr = "VII";break;
               case 8: classr = "VIII"; break;
               case 9:classr = "IX"; break;
               case 10: classr = "X"; break;
			   case 11:classr = "XI"; break;
               case 12: classr = "XII"; break;
            }				
	        var classes='<option value='+ i +'>'+classr+'</option>';
			select_class.push(classes);
			}
	        var html='<select id="standard" name="standard"  class="form-control" >'+select_class+'</select>';
		 }			

     // var html = '<select id="standard" name="standard"  class="form-control" ><option value="13">LKG</option><option value="14">UKG</option><option value="15">Pre KG</option><option value="1">I</option><option value="2">II</option><option value="3">III</option><option value="4" >IV</option><option value="5">V</option><option value="6">VI</option><option value="7">VII</option><option value="8">VIII</option><option value="9">IX</option><option value="10">X</option><option value="11">XI</option><option value="12">XII</option></select>'; 
	  // console.log(html); 
	   $(document).on("change","#standard",function(){
		   var tbl = $('#sample_2').DataTable();
           var elements = $('#sample_2 tbody tr').size();
		   var standard = $("#standard").val();
		   var groupdetails = <?php echo json_encode($groupdetails, JSON_PRETTY_PRINT)?>;
		    var group_drop = "<select name='addgroup' id='addgroup' class='form-control'>";
			group_drop +="<option value=0>Select group</option>";
		 $.each(groupdetails, function(idx, obj) {
			 
				group_drop +="<option value="+obj.id+">"+obj.group_name+"</option>";
            			
		 });
		  group_drop +="</select>";
	       if(standard==11|| standard==12)
					{
			
			$(".group").show();
			$(".empty").hide();
		    $('#sample_2').find('tbody').find('tr').eq(index).children('td').eq(3).html(group_drop);
					
					}
					else
			 {
				 $('#sample_2').find('tbody').find('tr').eq(index).children('td').eq(3).html('<td></td>');
				 $("#addgroup").val(1);
				 $(".group").hide();
				 $(".empty").show();
			 }
			  
			 
	   });
	   
	   var section = '<input type="text" id="section" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" >';
	   var group='<td class="group" style="display:none;"></td><td class="empty"></td>'
	   //var group = '<td id="group" style="display:none"> '+group_drop+'</td>';
		    
       var radio = '<input type="radio" class="aidedoption" name="radio" id="myRadio1"  checked="" value="1";>&nbsp;Aided <input type="radio" class="aidedoption" name="radio" checked="" value ="2" id="myRadio2"  >&nbsp;Self-financed';
	 var schoolcate = <?php echo json_encode($schoolcate,JSON_PRETTY_PRINT)?>;
		 schoolcategory=schoolcate[0].manage_cate_id;
			  if(schoolcategory==4 ||schoolcategory==4)
					{
			
			 $(".aidedoption").show();
		     $('#sample_2').find('tbody').find('tr').eq(index).children('td').eq(4).html(radio);
					
					}
					else
			     {
				 $('#sample_2').find('tbody').find('tr').eq(index).children('td').eq(4).html('<td></td>');
				 $("#addgroupname").val(1);
				 $(".aidedoption").hide();
				 
			     }
	   
	   var medium = '<td id="medium"> '+medium_drop+'</td>';
	   
		
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(1).html(html);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(2).html(section);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(3).html(group_drop);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(4).html(radio);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(5).html(medium);
		$("#addmedium").val(medium_val);
		$("#standard").val(classid);
		$("#section").val(sectionname);
		//$("#section").val(sectionname);
		$("#addgroup").val(group_val);
		
		//$("#medium").val(language);
		if(schooltype=='Self-financed')
		{
		$("#myRadio2").prop( "checked", true );
		}
		else{
		$("#myRadio1").prop( "checked", true );
		}
		
		  $(this).prop("id","edit"+local_i);
          $(this).closest('tr').children('td').find('span').prop('id','save'+local_i);
		  local_i = index;
          
      });
	   $("#sample_2 tbody").on('click', '.cancel-class-section', function(e) {
		   
		   
		  
		  location.reload();
		 	
		 
	   });
   function editsave(i)
    {
		
		var updateid=i;
	    var standard = $("#standard").val();
        var section =$("#section").val();
        var groupname=$("#addgroup").val();
        var medium=$("#addmedium").val();
        var aidedcheckbox = $("input[name='radio']:checked").val();	
		   /* check null value */  
		 if(section == '' || standard=='' || groupname=='')
	             {
				swal("OK", "All Field Is Required", "error");
		         }
			/* End of the Condition */  	 
         else
		{				 
		   var classdetails = <?php echo json_encode($details, JSON_PRETTY_PRINT)?>;	   
		   var i = 1;
			$.each(classdetails, function(idx, obj) {
				var aidedoption=obj.school_type;
				 if (aidedoption=='Aided')
				{
				var aidedvalue	=1;
				}
				else
				{
				var aidedvalue	=2;	
				}	
				 /* check existing value */
				if(standard == obj.class_id && section.toLowerCase() == obj.section.toLowerCase() && 
				groupname == obj.group_id  && medium == obj.school_medium_id  && aidedcheckbox == obj.school_type)
				{
				i = 0;
				return false;
				}
				/* End of the Condition */  
				});
      	      saveupdate(i,updateid);
		}
	 }
	 /* this function saved the edit data in database */
   function saveupdate(i,updateid)  
		 {
			if(i == 1)
		 {
        var standard = $("#standard").val();
		var updateid = updateid;
        var section =$("#section").val();	
        var groupname=$("#addgroup").val();
		var aidedcheckbox = $("input[name='radio']:checked").val();
		var medium=$("#addmedium").val();	
		    				
	var records = {'updateid':updateid,'classid':standard,'section':section,'groupname':groupname,'aidedoption':aidedcheckbox,'medium':medium};
				$.ajax(
				{
					data:{'records':records},
					url:baseurl+'section/emis_school_class_section_update',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						swal("OK", "Class Updated Successfully", "success");
						window.location.reload();
					}
				});
		 }
		 else if( i == 0)
              {
                   swal("OK", "Class is Already Exist",  "error");
					window.location.reload(); 
					
              }	
		 }
    function cancel(i)
	   {
		  $('#edit'+i).show();
		  $('#save'+i).hide();
		  $('#cancel'+i).hide();	
	   }
	$(document).ready(function(){
	$("#save").hide();
	$("#cancel").hide();
	  })
   	 

    $(".add_another").click(function() {
	
        $(".edit-class-section").css("display", "none");
         $(".delete-class-section").css("display", "none");
       
		  var schoolcate = <?php echo json_encode($schoolcate,JSON_PRETTY_PRINT)?>;
		 schoolcategory=schoolcate[0].manage_cate_id;
		 //schoolcategory=2
		  if(schoolcategory==4 || schoolcategory==2)
		{
			$("#gname").css("display", "");
	       var mediumdetails = <?php echo json_encode($mediumdetails, JSON_PRETTY_PRINT)?>;
		  
		var medium_drop = "<select name='addmedium' id='addmedium' class='form-control'>";
		 $.each(mediumdetails, function(idx, obj) {
				medium_drop +="<option value="+obj.MEDINSTR_ID+">"+obj.MEDINSTR_DESC+"</option>";
            			
		 });
		 
		   medium_drop +="</select>";
		   var classtype = <?php echo json_encode($classtype, JSON_PRETTY_PRINT)?>;
	   $.each(classtype, function(idx, obj) {
		   lowclass=obj.low_class;
		   highclass=obj.high_class;
			}); 
	   if(lowclass==13)
		  {
			lc=1; 
			hc=highclass;
			var select_class = [];
			for (i = parseInt(lc); i <= parseInt(hc); i++) {
             switch (i) {
               case 1:classr = "I";break;
               case 2:classr = "II";break;
               case 3: classr = "III"; break;
               case 4:classr = "IV"; break;
               case 5: classr = "V"; break;
			   case 6:classr = "VI";break;
               case 7:classr = "VII";break;
               case 8: classr = "VIII"; break;
               case 9:classr = "IX"; break;
               case 10: classr = "X"; break;
			   case 11:classr = "XI"; break;
               case 12: classr = "XII"; break;
            } 				
	        var classes='<option value='+ i +'>'+classr+'</option>';
			select_class.push(classes);
            }
			var html='<select id="addstandard" name="standard"  class="form-control" >'+select_class+'<option value='+ 13 +'>LKG</option><option value='+ 14 +'>UKG</option></select>';	
	        
		  }
		  else if(lowclass==14)
		  {
			lc=1; 
			hc=highclass;
			var select_class = [];
			for (i = parseInt(lc); i <= parseInt(hc); i++) {
		   switch (i) {
               case 1:classr = "I";break;
               case 2:classr = "II";break;
               case 3: classr = "III"; break;
               case 4:classr = "IV"; break;
               case 5: classr = "V"; break;
			   case 6:classr = "VI";break;
               case 7:classr = "VII";break;
               case 8: classr = "VIII"; break;
               case 9:classr = "IX"; break;
               case 10: classr = "X"; break;
			   case 11:classr = "XI"; break;
               case 12: classr = "XII"; break;
            }
	       var classes='<option value='+ i +'>'+classr+'</option>';
	       select_class.push(classes);
             }	
             var html='<select id="addstandard" name="standard"  class="form-control" >'+select_class+'<option value='+ 14 +'>UKG</option></select>';			 
		  }	
         else if(lowclass==15)
		 {
			 
			lc=1; 
			hc=highclass;
			var select_class = [];
			for (i = parseInt(lc); i <= parseInt(hc); i++) {
           switch (i) {
               case 1:classr = "I";break;
               case 2:classr = "II";break;
               case 3: classr = "III"; break;
               case 4:classr = "IV"; break;
               case 5: classr = "V"; break;
			   case 6:classr = "VI";break;
               case 7:classr = "VII";break;
               case 8: classr = "VIII"; break;
               case 9:classr = "IX"; break;
               case 10: classr = "X"; break;
			   case 11:classr = "XI"; break;
               case 12: classr = "XII"; break;
            }				
	       var classes='<option value='+ i +'>'+classr+'</option>';
		   select_class.push(classes);
             }
           //console.log(select_class)			 
		   var html='<select id="addstandard" name="standard"  class="form-control" >'+select_class+'<option value='+ 13 +'>LKG</option><option value='+ 14 +'>UKG</option><option value='+ 15 +'>PRE KG</option></select>';
		   
		   		 }
        else
         {
			
			lc=lowclass; 
			hc=highclass;
			var select_class = [];
			for (i = parseInt(lc); i <= parseInt(hc); i++) {
				  switch (i) {
               case 1:classr = "I";break;
               case 2:classr = "II";break;
               case 3: classr = "III"; break;
               case 4:classr = "IV"; break;
               case 5: classr = "V"; break;
			   case 6:classr = "VI";break;
               case 7:classr = "VII";break;
               case 8: classr = "VIII"; break;
               case 9:classr = "IX"; break;
               case 10: classr = "X"; break;
			   case 11:classr = "XI"; break;
               case 12: classr = "XII"; break;
            }				
	        var classes='<option value='+ i +'>'+classr+'</option>';
			select_class.push(classes);
			}
	        var html='<select id="addstandard" name="standard"  class="form-control" required>'+select_class+'</select>';
		 }			

           	
	      $("#sample_2").append('<tr><td>'+html+'</td><td style="width:15%;"><input type="text" id="addsection"  minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value=""  /></td><td class="group" style="display:none;"></td><td class="empty"></td><td id="aidedoption" class="aidedoption" style="width:15%;"><input type="radio"value="1" name="radio" id="myRadio1" checked="" class="aidedoption">&nbsp;Aided <input type="radio" name="radio" value = "2" id="myRadio2" >&nbsp;Self-financed</td><td style="width:20%;">'+medium_drop+'</td><td><input type="button"  class="btn btn-sm yellow save" onclick="save();" value="Save" /> <input type="button"  class="btn btn-sm red cancel" onclick="cancel();" value="Cancel" /> </td></tr>');
		}
		else
		{
			$("#gname").css("display", "");
	       var mediumdetails = <?php echo json_encode($mediumdetails, JSON_PRETTY_PRINT)?>;
		  
		var medium_drop = "<select name='addmedium' id='addmedium' class='form-control'>";
		 $.each(mediumdetails, function(idx, obj) {
				medium_drop +="<option value="+obj.MEDINSTR_ID+">"+obj.MEDINSTR_DESC+"</option>";
            			
		 });
		 
		   medium_drop +="</select>";
		   var classtype = <?php echo json_encode($classtype, JSON_PRETTY_PRINT)?>;
	   $.each(classtype, function(idx, obj) {
		   lowclass=obj.low_class;
		   highclass=obj.high_class;
			}); 
	   if(lowclass==13)
		  {
			hc=highclass;
			var select_class = [];
			for (i = 1; i <= hc; i++) {
             switch (i) {
               case 1:classr = "I";break;
               case 2:classr = "II";break;
               case 3: classr = "III"; break;
               case 4:classr = "IV"; break;
               case 5: classr = "V"; break;
			   case 6:classr = "VI";break;
               case 7:classr = "VII";break;
               case 8: classr = "VIII"; break;
               case 9:classr = "IX"; break;
               case 10: classr = "X"; break;
			   case 11:classr = "XI"; break;
               case 12: classr = "XII"; break;
            } 				
	        var classes='<option value='+ i +'>'+classr+'</option>';
			select_class.push(classes);
            }
			var html='<select id="addstandard" name="standard"  class="form-control" >'+select_class+'<option value='+ 13 +'>LKG</option><option value='+ 14 +'>UKG</option></select>';	
	        
		  }
		  else if(lowclass==14)
		  {
			hc=highclass;
			var select_class = [];
           for (i = 1; i <= hc; i++) { 
		   switch (i) {
               case 1:classr = "I";break;
               case 2:classr = "II";break;
               case 3: classr = "III"; break;
               case 4:classr = "IV"; break;
               case 5: classr = "V"; break;
			   case 6:classr = "VI";break;
               case 7:classr = "VII";break;
               case 8: classr = "VIII"; break;
               case 9:classr = "IX"; break;
               case 10: classr = "X"; break;
			   case 11:classr = "XI"; break;
               case 12: classr = "XII"; break;
            }
	       var classes='<option value='+ i +'>'+classr+'</option>';
	       select_class.push(classes);
             }	
            var html='<select id="addstandard" name="standard"  class="form-control" >'+select_class+'<option value='+ 14 +'>UKG</option></select>';			 
		  }	
         else if(lowclass==15)
		 {
			 
			hc=highclass;
			var select_class = [];
			for (i = 1; i <= hc; i++) {
           switch (i) {
               case 1:classr = "I";break;
               case 2:classr = "II";break;
               case 3: classr = "III"; break;
               case 4:classr = "IV"; break;
               case 5: classr = "V"; break;
			   case 6:classr = "VI";break;
               case 7:classr = "VII";break;
               case 8: classr = "VIII"; break;
               case 9:classr = "IX"; break;
               case 10: classr = "X"; break;
			   case 11:classr = "XI"; break;
               case 12: classr = "XII"; break;
            }				
	       var classes='<option value='+ i +'>'+classr+'</option>';
		   select_class.push(classes);
             }
           //console.log(select_class)			 
		   var html='<select id="addstandard" name="standard"  class="form-control" >'+select_class+'<option value='+ 13 +'>LKG</option><option value='+ 14 +'>UKG</option><option value='+ 15 +'>PRE KG</option></select>';
		   
		   		 }
        else
         {
			lc=1;
			var select_class = [];
			for (i = lc; i <= highclass; i++) {
             switch (i) {
               case 1:classr = "I";break;
               case 2:classr = "II";break;
               case 3: classr = "III"; break;
               case 4:classr = "IV"; break;
               case 5: classr = "V"; break;
			   case 6:classr = "VI";break;
               case 7:classr = "VII";break;
               case 8: classr = "VIII"; break;
               case 9:classr = "IX"; break;
               case 10: classr = "X"; break;
			   case 11:classr = "XI"; break;
               case 12: classr = "XII"; break;
            }				
	        var classes='<option value='+ i +'>'+classr+'</option>';
			select_class.push(classes);
			}
	        var html='<select id="addstandard" name="standard"  class="form-control" required>'+select_class+'</select>';
		 }			

           	
	      $("#sample_2").append('<tr><td>'+html+'</td><td style="width:15%;"><input type="text" id="addsection"  minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value=""  /></td><td class="group" style="display:none;"></td><td class="empty"></td><td id="aidedoption" class="aidedoption"  style="width:15%;"><input type="radio"value="1" name="radio" id="myRadio1" checked="" class="aidedoption">&nbsp;Aided <input type="radio" name="radio" value = "2" id="myRadio2" >&nbsp;Self-financed</td><td style="width:20%;">'+medium_drop+'</td><td><input type="button"  class="btn btn-sm yellow save" onclick="save();" value="Save" /> <input type="button"  class="btn btn-sm red cancel" onclick="cancel();" value="Cancel" /> </td></tr>');
		$(".aidedoption").hide();
			
		
			
		}
            });
      $('#sample_2').on('click', 'input[type="button"]', function () {
        $(this).closest('tr').remove();
           })
    
	$(document).on("change","#addstandard",function(){
		
		var tbl = $('#sample_2').DataTable();
        var elements = $('#sample_2 tbody tr').size();
		
		var total_row_count = <?php echo json_encode($details,JSON_PRETTY_PRINT);?>;
		var totol_row_len = total_row_count.length;
		//console.log(totol_row_len);
		var standard = $(this).val();
		if(standard==11 || standard==12)
		{
			$(".group").show();
			$(".empty").hide();
			
			var groupdetails = <?php echo json_encode($groupdetails, JSON_PRETTY_PRINT)?>;
		    var group_drop = "<select name='addgroupname' id='addgroupname' class='form-control'>";
			group_drop +="<option value=0>Select group</option>";
		 $.each(groupdetails, function(idx, obj) {
			 
				group_drop +="<option value="+obj.id+">"+obj.group_name+"</option>";
            			
		 });
		 group_drop +="</select>";
		  $('#sample_2').find('tbody').find('tr').eq(elements-1).children('td').eq(2).html(group_drop);
			 }
			 else
			 {
				 $("#addgroupname").val(1);
				 $(".group").hide();
				 $(".empty").show();
			 }
	});	
	
	function save()
		   {
			 
		   
		var standard = $("#addstandard").val();
		var section = $("#addsection").val();
		var groupname=$("#addgroupname").val();
		if(section == '' || standard== '' || standard==0 || groupname=='' || groupname==0)
		{
			swal("OK", "All Field Is Required", "error");
			return false;
		}
		else
		{
			
		var classdetails = <?php echo json_encode($details, JSON_PRETTY_PRINT)?>;
        
		  
		  var i = 1;
			$.each(classdetails, function(idx, obj) {
				
				if(standard == obj.class_id && section.toLowerCase() == obj.section.toLowerCase())
				{
				i = 0;
				return false;
				}
				});
				
				
				savedata(i);	
					
				 }
		   }  
		   
		   
		 function savedata(i)  
		 {
			if(i == 1)
			{
			var standard = $("#addstandard").val();
            var section = $("#addsection").val();
	        var groupname=$("#addgroupname").val();	
			
			var medium=$("#addmedium").val();
			
		    var aidedcheckbox = $("input[name='radio']:checked").val();
			/* aided =1
			unaided=2 */
		    
		     
              var records = {'classid':standard,'section':section,'groupname':groupname,'aidedoption':aidedcheckbox,'medium':medium};
		            $.ajax(
		            {
			data:{'records':records},
			url:baseurl+'section/emis_school_class_section_save',
			type:"POST",
			dataType:"JSON",
			success:function(res)
			{
				
				swal("OK", "Class is Saved Successfully", "success");
				window.location.reload();
			}
		    });
			}
           else if( i == 0)
              {
                   swal("OK", "Class is Already Exist",  "error");
					window.location.reload(); 
					
              }	
			  
		 }
		
		 function deleteclass(i,section,classno)  
		 { 
			 classid=i;
			 sectionname=section;
			 classname=classno;
			 var records = {'classid':classid,'sectionname':section,'classname':classname};
		            $.ajax(
		            {
			data:{'records':records},
			url:baseurl+'section/emis_school_class_section_delete',
			type:"POST",
			dataType:"JSON",
			success:function(res)
			{
				
				if(res==0)
				{
				swal("OK", "Section Deleted Successfully", "success");
				window.location.reload();
				}
				else
				{
				swal("OK","Can't Delete Class Which has Students Enrolled", "error");
				//window.location.reload();	
				}
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
      

        </script>



    </body>

</html>