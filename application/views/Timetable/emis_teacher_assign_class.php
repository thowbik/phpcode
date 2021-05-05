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
                                        <h1>Teacher Profile
										
                                            <small>Teachers Assign Class</small>
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
                                                    <span class="caption-subject font-dark sbold uppercase">Assign Class To Teacher</span>
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
                                                           
                                                        

                                                <!-- Add Model -->

                                               



                                              


                                               <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i>Teachers Available in the School</div>
                                                        <div class="tools" style="margin-top: 20px;"> </div>
                                                    </div>
                                                    <div class="portlet-body">
													
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
																  
																  
																   
                                                                    <th contenteditable="false"> Teachers Name </th>
                                                                    <th style="width:15%;"> Subject1</th>
																	<th style="width:15%;" >Class</th>
																	 <th style="width:15%;"> Subject2</th>
																	 <th style="width:15%;" >Class</th>
																	  <th style="width:15%;"> Subject3</th>
                                                                    <th style="width:15%;" >Class</th>
																	<th style="display:none">U-Id</th>
																	
                                                                    <th>Action</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                             <?php                                                           
                                                              $i=1;
                                                              
																
																foreach($Teacherslist as $d)
															   {
																   
																	 ?>
                                                               <tr>
															   <?php
															  
															   ?>
                                                                     <td><?php echo $d->teacher_name; ?></td> 
                                                                   
																	<td><?php echo $d->s1; ?></td> 
																	
																	<?php
																	$array1=$d->class_name1;
																	$array2=$d->class_name2;
																	$array3=$d->class_name3;
																	 $array1 =  explode(",",$array1);
																	  $array2 =  explode(",",$array2);
																	   $array3 =  explode(",",$array3);
																	 $class_roma = array
                                                            ('I'=>1,'II'=>'2','III'=>'3','IV'=>'4','V'=>'5','VI'=>'6','VII'=>'7','VIII'=>'8','IX'=>'9','X'=>'10','XI'=>'11','XII'=>'12','LKG'=>'13','UKG'=>'14','PreKG'=>'15');

                                                       $res1 = array_intersect($class_roma,$array1);
													   $res2 = array_intersect($class_roma,$array2);
													   $res3 = array_intersect($class_roma,$array3);
															?>
															        <td><?php echo implode(",",array_flip($res1)); ?></td>
																	<td><?php echo $d->s2; ?></td>
                                                                    <td><?php echo implode(",",array_flip($res2)); ?></td>
																	<td><?php echo $d->s3; ?></td> 
																	<td><?php echo implode(",",array_flip($res3));  ?>
																	<input type="hidden" id="<?php echo $i;?>" value="<?php echo $classid?>">
																	</td>
                                                                    <td style="display:none"><?php echo $d->u_id; ?></td>
                                                                     <td><a href="javascript:;" class="btn btn-sm green edit-class-section" id="edit<?php echo $i; ?>"  contenteditable="false" data-class-section-id ="<?php echo $i;  ?>">Edit / Update<!--<i class="fa fa-edit"></i>--></a>
																	<span>
																	<button data-id="2" style="display:none;" id="save<?php echo $i;  ?>" class="btn btn-sm green save-class-section" onclick="editsave(<?php echo $d->teacher_code;?>,<?php echo $d->udise_code;?>,<?php echo $d->subject1;?>,<?php echo $d->subject2;?>,<?php echo $d->subject3;?>)" contenteditable="false">Save</button>
																	<button data-id="3"  style="display:none; margin-left: 72px margin-top: -54px"; id="cancel<?php echo $i; ?>" class="btn btn-sm red cancel-class-section" onclick="cancel(<?php echo $i?>)">cancel</button>
																   </span>
                                                                    </td>
                                                                 
                                                               </tr>
                                                               <?php $i++; 
																  }
																  //}														   ?>
                                                             
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
		
        var edit =  $(this).attr("id"); 
		if(local_i!=-1){
		  
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(0).text(teachername);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(1).text(subject_1);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(2).text(classname_1);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(3).text(subject_2);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(4).text(classname_2);
			$('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(5).text(subject_3);
			$('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(6).text(classname_3);
			$('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(7).text(u_id);
            //$('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(6).text(DOJ);
         }
		teachername =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(0).text();
		subject_1 =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(1).text();
		classname_1 =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(2).text();
		subject_2 =$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(3).text();
		classname_2=$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(4).text();
		subject_3 =$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(5).text();
		classname_3 =$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(6).text().trim();
		u_id =$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(7).text().trim();
		
		
		
		
		 $('#'+edit).hide();
         $('#'+save).show();
		 $('#'+cancel).show();
		 	
		 var classid=$('#'+class_id).val();
		  
		//  console.log(aidedoption);
		//var schooltype=$('#'+school_type).val();
		 
	   $(this).closest('tr').find('td').attr('contenteditable','true');
	   // var html = '<select id="classid" name="classid" vlaue="classid">'; 
	  
					
	
	  
       var class1 = '<select multiple id="class1" name="class1"  class="form-control multipleselect" ><option value="13">PreKG</option><option value="14">UKG</option><option value="15">LKG</option><option value="1">I</option><option value="2">II</option><option value="3">III</option><option value="4" >IV</option><option value="5">V</option><option value="6">VI</option><option value="7">VII</option><option value="8">VIII</option><option value="9">IX</option><option value="10">X</option><option value="11">XI</option><option value="12">XII</option><option disabled></option></select>'; 
	   if(subject_2=='')
		{
		var class2 = '<select multiple id="class2" name="class2"  class="form-control" disabled><option value="13">PreKG</option><option value="14">UKG</option><option value="15">LKG</option><option value="1">I</option><option value="2">II</option><option value="3">III</option><option value="4" >IV</option><option value="5">V</option><option value="6">VI</option><option value="7">VII</option><option value="8">VIII</option><option value="9">IX</option><option value="10">X</option><option value="11">XI</option><option value="12">XII</option></select>';
		}
		else
		{
	    var class2 = '<select multiple id="class2" name="class2"  class="form-control" ><option value="13">PreKG</option><option value="14">UKG</option><option value="15">LKG</option><option value="1">I</option><option value="2">II</option><option value="3">III</option><option value="4" >IV</option><option value="5">V</option><option value="6">VI</option><option value="7">VII</option><option value="8">VIII</option><option value="9">IX</option><option value="10">X</option><option value="11">XI</option><option value="12">XII</option><option disabled></option></select>';
		}		
		if(subject_3=='')
		{
		var class3 = '<select multiple id="class3" name="class3"  class="form-control" disabled><option value="13">PreKG</option><option value="14">UKG</option><option value="15">LKG</option><option value="1">I</option><option value="2">II</option><option value="3">III</option><option value="4" >IV</option><option value="5">V</option><option value="6">VI</option><option value="7">VII</option><option value="8">VIII</option><option value="9">IX</option><option value="10">X</option><option value="11">XI</option><option value="12">XII</option></select>'; 	
		}
		else
		{
		 var class3 = '<select multiple id="class3" name="class3"  class="form-control" ><option value="13">PreKG</option><option value="14">UKG</option><option value="15">LKG</option><option value="1">I</option><option value="2">II</option><option value="3">III</option><option value="4" >IV</option><option value="5">V</option><option value="6">VI</option><option value="7">VII</option><option value="8">VIII</option><option value="9">IX</option><option value="10">X</option><option value="11">XI</option><option value="12">XII</option><option disabled></option></select>'; 
		}
	   $(document).on("change","#standard",function(){
		   var tbl = $('#sample_2').DataTable();
           var elements = $('#sample_2 tbody tr').size();
		   var standard = $("#standard").val();

		  
	   });
	   
	   var teacher= '<input type="text" id="teacher" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" disabled>';
	   var subject1 = '<input type="text" id="subject1" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" disabled>';
		    
      var subject2 = '<input type="text" id="subject2" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" disabled>';
	   
	   var subject3 = '<input type="text" id="subject3" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" disabled>';
	   
	    var uid = '<input type="text" id="uid" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" disabled>';
	     
		 
		 
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(0).html(teacher);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(1).html(subject1);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(2).html(class1);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(3).html(subject2);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(4).html(class2);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(5).html(subject3);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(6).html(class3);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(7).html(uid);
		$("#teacher").val(teachername);
		$("#subject1").val(subject_1);
		$("#subject2").val(subject_2);
		$("#subject3").val(subject_3);
		$("#class1").val(classname_1);
		$("#uid").val(u_id);
		 var values1 = classname_1;
         options1 = Array.from(document.querySelectorAll('#class1 option'));
         values1.split(',').forEach(function(v) {
         options1.find(c => c.text == v).selected = true;
});
		$("#class2").val(classname_2);
		
		var values2 = classname_2;
         options2 = Array.from(document.querySelectorAll('#class2 option'));
         values2.split(',').forEach(function(j) {
         options2.find(c => c.text == j).selected = true;
});

		$("#class3").val(classname_3);
		
		var values2 = classname_3;
         options2 = Array.from(document.querySelectorAll('#class3 option'));
         values2.split(',').forEach(function(j) {
         options2.find(c => c.text == j).selected = true;
});
		
		  $(this).prop("id","edit"+local_i);
          $(this).closest('tr').children('td').find('span').prop('id','save'+local_i);
		  local_i = index;
          
      });
	   $("#sample_2 tbody").on('click', '.cancel-class-section', function(e) {
		
		  location.reload();
		 	
		 
	   });
   function editsave(teachercode,udisecode,sub1,sub2,sub3)
    {
		
	    var teachername = $("#teacher").val();
		var subid1=sub1;
        var subject1 =$("#subject1").val();
		var classname1=$("#class1").val();
		var subid2=sub2;
        var subject2 =$("#subject2").val();
		var classname2=$("#class2").val();
		var subid3=sub3;
		var subject3 =$("#subject3").val();
		var classname3=$("#class3").val();
		var teacheruid=$("#uid").val();
		
		
		var records = {'uid':teacheruid,'udisecode':udisecode,'teachercode':teachercode,'teachername':teachername,'subid1':subid1,'subject1':subject1,'classname1':classname1,'subid2':subid2,'subject2':subject2,'classname2':classname2,'subid3':subid3,'subject3':subject3,'classname3':classname3};
		console.log(records);
				$.ajax(
				{
					data:{'records':records},
					url:baseurl+'TimetableController/teacher_assign_class',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						swal("OK", "Class Assigned Successfully ", "success");
						 window.location.reload();
					}
				});
		  
         
		
	 }
	 /* this function saved the edit data in database */
   
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
      $('#sample_2').on('click', 'input[type="button"]', function () {
        $(this).closest('tr').remove();
           })
    
	
	
		   
		 
		 
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