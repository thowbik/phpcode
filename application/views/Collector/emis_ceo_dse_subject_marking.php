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
            


<?php $this->load->view('Collector/header.php'); ?>


            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <!-- BEGIN CONTAINER -->
                    <div class="page-container">
                        <!-- BEGIN CONTENT -->
                        <div class="page-content-wrapper">
                            <!-- BEGIN CONTENT BODY -->
                            <!-- BEGIN PAGE HEAD-->
                            <div class="page-head">
                                <div >
                                   
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
                                <div >
                                    <!-- BEGIN PAGE CONTENT INNER -->
                          

                                    <div class="page-content-inner">
                                       
                                    

                                           <!-- <div class="m-heading-1 border-green m-bordered">
                                            <h3>Basic Information</h3>
                                        </div> -->
                                     
                                         
                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                               
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
                                                            <i class="fa fa-globe"></i> Special Teacher Vacancy</div>
                                                        <div class="tools" style="margin-top: 20px;"> </div>
                                                    </div>
                                                    <div class="portlet-body">
													
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
																   
																   <th>Udise Code</th>
																  
                                                                    <th style="width:5%;">School Name</th>
																	 
                                                                    <th>Hr Sec </br>HM</th>
                                                                    <th>Indian </br>Culture</th>
																	<th>Nutrition</th>
																	<th>Agricultural </br>Instructor </br>(VOC)</th>
                                                                    <th>Computer </br>Instructor </br>(VOC)</th>
																	<th style="width:5%;">PET</th>
																	<th>Sewing</th>
                                                                    <th>Music</th>
																	<th>Drawing</th>
																	<th>PD-2</th>
                                                                     <th style="display:none;">School id</th>
                                                                    <th style="width:15%;">Action</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                             <?php                                                           
                                                              $i=1;
                                                              foreach($dse_school as $ds)
															   {
																		?>
                                                               <tr>
                                                                     
                                                                    <td><?php echo $ds->udise_code;  ?></td>
																	
																	<td><?php echo $ds->school_name; ?></td>
                                                                    <td id="sone<?php echo $i;?>" contentEditable="false"><?php echo $ds->vac_44;?></td>
                                                                    <td id="sone<?php echo $i;?>" contentEditable="false"><?php echo $ds->vac_23;?></td>
																	<td id="sone<?php echo $i;?>"><?php echo $ds->vac_14;?></td>
                                                                    <td id="sone<?php echo $i;?>"><?php echo $ds->vac_agr;?></td>
																	<td id="sone<?php echo $i;?>"><?php echo $ds->vac_com;?></td>
                                                                    <td style="width:5%;" id="sone<?php echo $i;?>"><?php echo $ds->vac_pet;?></td>
																	<td id="sone<?php echo $i;?>"><?php echo $ds->vac_sew;?></td>
                                                                    <td id="sone<?php echo $i;?>"><?php echo $ds->vac_mus;?></td>
																	<td id="sone<?php echo $i;?>"><?php echo $ds->vac_dra;?></td>
                                                                    <td id="sone<?php echo $i;?>"><?php echo $ds->vac_pd2;?></td>
																	<td  style="display:none;" id="sone<?php echo $i;?>"><?php echo $ds->school_id;?></td>
                                                                     <td><a href="javascript:;" class="btn btn-sm green edit-class-section" id="edit<?php echo $i; ?>"  contenteditable="false" data-class-section-id ="<?php echo $i;  ?>">Edit <!--<i class="fa fa-edit"></i>--></a>
																	
																	<span>
																	<button data-id="2" style="display:none;" id="save<?php echo $i;?>" class="btn btn-sm green save-class-section" onclick="saveupdate(<?php echo $i;?>)" contenteditable="false">save</button>
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
			 var standard = '';
			 var medium='';
			 
  $("#sample_2 tbody").on('click', '.edit-class-section', function(e) {
     index =  $(this).closest('tr').index();
	 
		 
		  
	    
		var save = $(this).closest('tr').children('td').find('button').attr('id');
		var cancel = $(this).closest('tr').children('td').find('.cancel-class-section').attr('id');
		var class_id = $(this).closest('tr').children('td').find('input').attr('id');
		//alert(class_id);
         var edit =  $(this).attr("id"); 
		 
		if(local_i!=-1){
		   // $("#edit"+local_i).show();
           // $("#save"+local_i).hide();
           $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(0).text(udise_code);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(1).text(school_name);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(2).text(sub1);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(3).text(sub2);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(4).text(sub3);
			$('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(5).text(sub4);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(6).text(sub5);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(7).text(sub6);
			$('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(8).text(sub7);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(9).text(sub8);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(10).text(sub9);
			$('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(11).text(sub10);
			$('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(12).text(schoolid);
            
         }
		udise_code =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(0).text();
		school_name =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(1).text();
		sub1 =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(2).text();
		sub2 =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(3).text();
		sub3 =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(4).text();
		sub4 =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(5).text();
		sub5 =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(6).text();
		sub6 =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(7).text();
		sub7 =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(8).text();
		sub8 =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(9).text();
		sub9 =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(10).text();
		sub10 =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(11).text();
		schoolid =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(12).text();
		
		 $('#'+edit).hide();
         $('#'+save).show();
		 $('#'+cancel).show();
		 	
		 var classid=$('#'+class_id).val();
		
	   $(this).closest('tr').find('td').attr('contenteditable','true');
	   
		var udisecode =  '<input type="text" id="udise_code" class="form-control" value="" disabled>';
	   var schoolname = '<input type="text" id="school_name"   class="form-control" value="" disabled>';
	   var subj1 = '<input type="text" id="s1" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" >';
	  var subj2 = '<input type="text" id="s2" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" >';
	  var subj3 = '<input type="text" id="s3" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" >';
	   var subj4 = '<input type="text" id="s4" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" >';
	  var subj5 = '<input type="text" id="s5" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" >';
	  var subj6 = '<input type="text" id="s6" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" >';
	   var subj7 = '<input type="text" id="s7" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" >';
	  var subj8 = '<input type="text" id="s8" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" >';
	  var subj9 = '<input type="text" id="s9" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" >';
	   var subj10 = '<input type="text" id="s10" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" >';
	   var school_id = '<input type="text" id="schid" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" >';
	   
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(0).html(udisecode);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(1).html(schoolname);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(2).html(subj1);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(3).html(subj2);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(4).html(subj3);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(5).html(subj4);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(6).html(subj5);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(7).html(subj6);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(8).html(subj7);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(9).html(subj8);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(10).html(subj9);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(11).html(subj10);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(12).html(school_id);
		$("#udise_code").val(udise_code);
		$("#school_name").val(school_name);
		$("#s1").val(sub1);
		$("#s2").val(sub2);
		$("#s3").val(sub3);
		$("#s4").val(sub4);
		$("#s5").val(sub5);
		$("#s6").val(sub6);
		$("#s7").val(sub7);
		$("#s8").val(sub8);
		$("#s9").val(sub9);
		$("#s10").val(sub10);
		$("#schid").val(schoolid);
		
		  $(this).prop("id","edit"+local_i);
          $(this).closest('tr').children('td').find('span').prop('id','save'+local_i);
		  local_i = index;
          
      });
	   $("#sample_2 tbody").on('click', '.cancel-class-section', function(e) {
		  location.reload();
	   });

	 /* this function saved the edit data in database */
   function saveupdate(i)  
		 {
		i=1;
        var udise_code = $("#udise_code").val();
		var school = $("#school_name").val();
		school_name=school.trim();
		var sub1=document.getElementById("s1").value;  
		var sub2=document.getElementById("s2").value;  
		var sub3=document.getElementById("s3").value;  
		var sub4=document.getElementById("s4").value;  
		var sub5=document.getElementById("s5").value;  
		var sub6=document.getElementById("s6").value;  
		var sub7=document.getElementById("s7").value;  
		var sub8=document.getElementById("s8").value;  
		var sub9=document.getElementById("s9").value; 
        var sub10=document.getElementById("s10").value; 
        var schoolid=$("#schid").val();	
	
		
		
				 $.ajax(
		            {
			data:{'schoolid':schoolid,'sub1':sub1,'sub2':sub2,'sub3':sub3,'sub4':sub4,'sub5':sub5,'sub6':sub6,'sub7':sub7,'sub8':sub8,'sub9':sub9,'sub10':sub10},
			url:baseurl+'Collector/save_school_subjects',
			type:"POST",
			dataType:"JSON",
			success:function(res)
			{
				
			swal("OK", "Data Saved Successfully", "success");
			window.location.reload();
				}
		    });
		 
		 
		 }
    
	$(document).ready(function(){
	$("#save").hide();
	$("#cancel").hide();
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