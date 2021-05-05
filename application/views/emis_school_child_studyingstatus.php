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
                            
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">
                                <div></div> 
                                <div >
                                    <!-- BEGIN PAGE CONTENT INNER -->
                          

                                    <div class="page-content-inner">
                                       
                                   
                                        

                                           <!-- <div class="m-heading-1 border-green m-bordered">
                                            <h3>Basic Information</h3>
                                        </div> -->
                                     
                                         
                                        <div class="portlet light portlet-fit ">
                                            
                                          
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

                                                 
                                             <div class="row">
											  <div class=" col-md-6">
                                                        
                                                          
                                                              
                                                    </div>
											 <div class="col-md-offset-2 col-md-4">
                                                        
                                                          <p style="color:blue;">Please choose 'NOT APPLICABLE' option if the teacher is not married / does not have children.</p>
                                                              
                                                    </div>
</div>

                                               


                                               <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i>Kindly fill in the EMIS ID of teacher's children who are studying only in Government School( NOT Government Aided School)
</div>
                                                        <div class="tools" style="margin-top: 20px;"> </div>
                                                    </div>
                                                    <div class="portlet-body">
													
                                                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                                                            <thead>
                                                                <tr>
																  
																  
                                                                   <th style="width:5%;padding-bottom: 70px;">S.No</th>
                                                                    <th style="width:11%;padding-bottom: 70px; text-align: center;">Teacher Name </th>
																	 
                                                                    <!--<th style="width:29%;" >Did any of your child study in government /government aided school in the past?
																	</br>
																	</br>உங்கள் பிள்ளைகளில் யாராவது கடந்த காலத்தில் அரசு / அரசு உதவி பெறும் பள்ளியில் படித்தார்களா?</th>-->
																	
																
																	<th style="width:23%;">Is any of your child studying in government school currently?
																	</br>
																	</br>உங்கள் பிள்ளைகளில் யாராவது தற்போது அரசு  பள்ளியில் படிக்கிறார்களா?</th>
																	<th style="width:15%;padding-bottom: 70px; text-align: center;">EMIS ID of Child 1</th>
																	<th style="width:15%;padding-bottom: 70px; text-align: center;">EMIS ID of Child 2</th>
																	<th style="width:15%;padding-bottom: 70px; text-align: center;">EMIS ID of Child 3</th>
                                                                    <th style="width:20%;padding-bottom: 70px; text-align: center;">Action</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                             <?php                                                           
                                                              $i=0;
                                                              foreach($teacherlist as $tl)
															   {
																 
																		?>
                                                               <tr>
                                                                     
                                                                    
																	<td><?php echo $i+1;  ?></td>															                                    <td><?php echo $tl->teacher_name;  ?></br>(<?php echo $tl->type_teacher;?>)</td>
																	                               
																	
																	<td><?php if($tl->question1==1)
																	{
																	echo 'YES';	
																	}else if($tl->question1==2)
																	{
																	echo 'NO';	
																	}else if($tl->question1==3)
																	{
																	echo 'NOT APPLICABLE';	
																	}else{
																		echo '';
																	}																		?><input type="hidden"  id="question<?php echo $i;?>" value="<?php echo $tl->question1;?>"></td>
																	<td><?php echo $tl->emis_no1;?> </td>
                                                                    <td><?php echo $tl->emis_no2;?> </td>
																	<td><?php echo $tl->emis_no3;?> </td>
                                                                     <td style="text-align: center;"><a href="javascript:;" class="btn btn-sm green edit-class-section" id="edit<?php echo $i; ?>"  contenteditable="false" data-class-section-id ="<?php echo $i;  ?>">Edit <!--<i class="fa fa-edit"></i>--></a>
																	
																	<span>
																	<button data-id="2" style="display:none;" id="save<?php echo $i;  ?>" class="btn btn-sm green save-class-section" onclick="save('<?php echo $tl->teacher_code;?>','<?php echo $tl->teacher_name;?>')" contenteditable="false">save</button>
																	<button data-id="3"  style="display:none; margin-left: 72px margin-top: -54px"; id="cancel<?php echo $i; ?>" class="btn btn-sm red cancel-class-section" onclick="cancel(<?php echo $i?>)">cancel</button>
																   </span>
                                                                    </td>
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
			 //var old_q1 = '';
			 var old_q2 = '';
			 var old_c1 = '';
			 var old_c2 = '';
			 var old_c3 = '';
  $("#sample_3 tbody").on('click', '.edit-class-section', function(e) {
	  
        index =  $(this).closest('tr').index();
		var save = $(this).closest('tr').children('td').find('button').attr('id');
		var cancel = $(this).closest('tr').children('td').find('.cancel-class-section').attr('id');
        var edit =  $(this).attr("id"); 
		 
		if(local_i!=-1){
		  
           $('#sample_3').find('tbody').find('tr').eq(local_i).find('td').eq(1).text(teachername);
            //$('#sample_3').find('tbody').find('tr').eq(local_i).find('td').eq(2).text(old_q1);
            $('#sample_3').find('tbody').find('tr').eq(local_i).find('td').eq(2).text(old_q2);
			$('#sample_3').find('tbody').find('tr').eq(local_i).find('td').eq(3).text(old_c1);
			$('#sample_3').find('tbody').find('tr').eq(local_i).find('td').eq(4).text(old_c2);
			$('#sample_3').find('tbody').find('tr').eq(local_i).find('td').eq(5).text(old_c3);
            
         }
		teachername =  $('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(1).text();
		ch1 =  $('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(3).text();
		ch2 =  $('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(4).text();
		ch3 =  $('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(5).text();
		 // var q1 = $(this).closest('tr').children('td').find('input').attr('id');
		 // alert(q1);
		//q1 =  $('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(1).val();
		//q2 =  $('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(2).val();
		
		 var ques=$('#question'+index).val(); 
		if(ques==1)
		{
		var child1 = '<input type="text" id="child1"  class="form-control"  minlength="1" maxlength="19" onKeypress="return isNumberKey(event);"; value="" >';
		var child2 = '<input type="text" id="child2"  class="form-control"  minlength="1" maxlength="19" onKeypress="return isNumberKey(event);"; value="" >';
	    var child3 = '<input type="text" id="child3"  class="form-control"  minlength="1" maxlength="19" onKeypress="return isNumberKey(event);"; value="" >';
		}
		
		 $('#'+edit).hide();
         $('#'+save).show();
		 $('#'+cancel).show();
		 	
		// var classid=$('#'+class_id).val();
		 
		
	   $(this).closest('tr').find('td').attr('contenteditable','true');
	   // var html = '<select id="classid" name="classid" vlaue="classid">'; 
	
	   
	   var tn = '<input type="text" id="teachername"  class="form-control" value="" readonly>';	
	        
		 var question='<select id="question" name="q"  class="form-control" ><option value=0>Select One</option><option value=1>YES</option><option value=2>NO</option><option value=3>NOT APPLICABLE</option></select>';	
		  	$(document).on("change","#question",function(){
		
		var addquestion = $(this).val();
		if(addquestion==1)
		{
		 var question='<select id="question" name="q"  class="form-control" ><option value=0>Select One</option><option value=1 >YES</option><option value=2>NO</option><option value=3>NOT APPLICABLE</option></select>';	
		var childadd1 = '<input type="text" id="child1"  class="form-control"  minlength="1" maxlength="19" onKeypress="return isNumberKey(event);"; value="" >';
		var childadd2 = '<input type="text" id="child2"  class="form-control"  minlength="1" maxlength="19" onKeypress="return isNumberKey(event);"; value="" >';
	    var childadd3 = '<input type="text" id="child3"  class="form-control"  minlength="1" maxlength="19" onKeypress="return isNumberKey(event);"; value="" >';
			
		}
		else
		{
		var question='<select id="question" name="q"  class="form-control" ><option value=0>Select One</option><option value=1 >YES</option><option value=2>NO</option><option value=3>NOT APPLICABLE</option></select>';	
		var childadd1 = '<input type="text" id="child1"  class="form-control"  value="" readonly>';
		var childadd2 = '<input type="text" id="child2"  class="form-control"  value="" readonly>';
	    var childadd3 = '<input type="text" id="child3"  class="form-control"  value="" readonly>';
			
		}
		$('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(1).html(tn);
		//$('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(2).html(fq);
		$('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(2).html(question);
		$('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(3).html(childadd1);
		$('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(4).html(childadd2);
		$('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(5).html(childadd3);
		$("#teachername").val(teachername);
		 $("#question").val(addquestion);
		
	});
		$('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(1).html(tn);
		//$('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(2).html(fq);
		$('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(2).html(question);
		$('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(3).html(child1);
		$('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(4).html(child2);
		$('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(5).html(child3);
		$("#teachername").val(teachername);
		 $("#question").val(ques);
		 $("#child1").val(ch1);
		 $("#child2").val(ch2);
		 $("#child3").val(ch3);
		// $("#question2").val(q2);
		
		  $(this).prop("id","edit"+local_i);
          $(this).closest('tr').children('td').find('span').prop('id','save'+local_i);
		  local_i = index;
		  //q11 =  $('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(2).val();
		  q22 =  $('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(2).val();
		   c1 =  $('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(3).val();
		    c2 =  $('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(4).val();
			 c3 =  $('#sample_3').find('tbody').find('tr').eq(index).find('td').eq(5).val();
		  old_q2 = q22;
		  old_c1 =c1;
		  old_c2 =c2;
		  old_c3 =c3;
          
      });
	   $("#sample_3 tbody").on('click', '.cancel-class-section', function(e) {
		   
		   
		  
		  location.reload();
		 	
		 
	   });

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
   	 


      $('#sample_3').on('click', 'input[type="button"]', function () {
        $(this).closest('tr').remove();
           })
    
		
	
	function save(teachercode,teachername)
	
		   {
			   
		var qus = $("#question").val();
		
		if(qus=='' ||  qus== 0 || qus== null)
		{
		 swal("OK", "Please Choose Atleast one option", "error");
			return false;	
		}
		var children1 = $("#child1").val();
		var children2 = $("#child2").val();
		var children3 = $("#child3").val();
		if(qus==1)
		{if(qus == '' || qus== 0 || children1 =='' || children1 ==0  )
		{
			
			swal("OK", "Please fill "+ teachername +"'s Child EMIS Id", "error");
			return false;
				
		}

		else
		{
			
		var records = {'teachercode':teachercode,'qus':qus,'children1':children1,'children2':children2,'children3':children3};
		            $.ajax(
		            {
			data:{'records':records},
			url:baseurl+'Udise_staff/emis_teacher_childstudying_status',
			type:"POST",
			dataType:"JSON",
			success:function(res)
			{
				
				swal("OK", "Data  Saved Successfully", "success");
				window.location.reload();
			}
		    });	
					
				 } }
				 else
				 {
					 if(qus == '' || qus== 0 )
		{
			
			swal("OK", "Please Choose Atleast one option", "error");
			return false;
				
		}

		else
		{
			
		var records = {'teachercode':teachercode,'qus':qus,'children1':children1,'children2':children2,'children3':children3};
		            $.ajax(
		            {
			data:{'records':records},
			url:baseurl+'Udise_staff/emis_teacher_childstudying_status',
			type:"POST",
			dataType:"JSON",
			success:function(res)
			{
				
				swal("OK", "Data  Saved Successfully", "success");
				window.location.reload();
			}
		    });	
					
				 }
				 }
		
		   
		}
		
	function isNumberKey(evt){
	
	
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
  				
        </script>



    </body>

</html>