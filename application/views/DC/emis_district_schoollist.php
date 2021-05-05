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
            

<?php $userlogin=$this->session->userdata('emis_user_type_id'); 	?>            
<?php if($this->session->userdata('emis_user_type_id') == 3 ) 	
{?>
<?php $this->load->view('DC/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
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
                                       
                                   
                                        

                                           <!-- <div class="m-heading-1 border-green m-bordered">
                                            <h3>Basic Information</h3>
                                        </div> -->
                                     
                                         
                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">District-wise No. of  Available in the District</span>
                                                </div>
                                            </div> 
                                           
                                             <!-- searchable -->
                                          <div class="row">   
                                         <div class="col-md-3">										  
                                        <center>
                                                   <form method="post">
                                                    <div class="form-group">
                                                    
                                                         <label class="control-label">Select School Type*</label>
                                                          <select style="width: 69%;" class="form-control" data-placeholder="Choose a Category" tabindex="1" id="schoolcat" name="schoolcat" style="width: 60%" required="">
                                                               
                                                                <option value="" >Select School Type</option>
                                                                 <?php foreach($schoolcate as $sc) {   ?>
                                                               <option value="<?php echo $sc->id;  ?>" ><?php echo $sc->manage_name?></option>
                                                                 <?php   }  ?>
																 
                                                               </select> 
                                                         <font style="color:#dd4b39;"><div id="emis_block_schoolsid_alert"><?php if(isset($error3)){ ?> <?php echo $error3;?> <?php } ?></div></font>
                                                         
                                                         
                                                         <div class="col-md-12">
                                                          <button type="submit" class="btn green" id="emis_stu_searchsep_sub" style="margin-top: 10px;" >Search</button>

                                                          </div>
                                                    </div>
                                                    </form>
													</center>
													</div>
                                               </div>
                                           

                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                       
                                                        <div class="row">
                                                            <br>
                                                        </div>

                                               
                                                 
                                               



                                                


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
                                                                    <th>Contact No</th>
                                                                    <th>School Mail </th>
																	<!--<th style="width:10%">Address</th>-->
																	<th>School Type</th>
                                                                    <th> Edit / Update </th>
                                                                    
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
													
																
                                                                     <td><?php echo $sl->udise_code;  ?></td>
                                                                    <td readonly><?php echo $sl->school_name;  ?>
																	<input type="hidden"  id="schoolid<?php echo $i;?>" value="<?php echo $sl->school_id;;?>"></td>
                                                                    <td><?php echo $sl->mobile;  ?></td>
																																		
																	
																	<td><?php echo $sl->sch_email;  ?>
																	</td>
                                                                    
																	<!--<td ><?php echo $sl->address;  ?>
																	<input type="hidden" class="medium" id="medium<?php echo $i;?>" value="<?php echo $sl->sch_email;?>"></td>-->
																	<td><?php echo $sl->manage_name;  ?></td>
                                                                    <td><a href="javascript:;" class="btn btn-sm green edit-class-section" id="edit<?php echo $i; ?>"  contenteditable="false" data-class-section-id ="<?php echo $i;  ?>"> Edit / Update <!--<i class="fa fa-edit"></i>--></a>
																	<span>
																	<button data-id="2" style="display:none;" id="save<?php echo $i;  ?>" class="btn btn-sm green save-class-section" onclick="editsave(<?php echo $sl->school_id;?>)" contenteditable="false">save</button>
																	<button data-id="3"  style="display:none; margin-top: -52px;
    margin-left: 74px;" id="cancel<?php echo $i; ?>" class="btn btn-sm red cancel-class-section" onclick="cancel(<?php echo $i?>)">cancel</button>
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
			 var school = '';
			 var contactno ='';
			 var medium='';
			 
   $("#sample_2 tbody").on('click', '.edit-class-section', function(e) {
     index =  $(this).closest('tr').index();
	 
	    
		var save = $(this).closest('tr').children('td').find('button').attr('id');
		var cancel = $(this).closest('tr').children('td').find('.cancel-class-section').attr('id');
		var class_id = $(this).closest('tr').children('td').find('input').attr('id');
        var edit =  $(this).attr("id"); 
		if(local_i!=-1){
		   // $("#edit"+local_i).show();
           // $("#save"+local_i).hide();
		    $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(1).text(udise);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(2).text(school);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(3).text(contactno);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(4).text(mailid);
            //$('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(5).text(address);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(5).text(schooltype);
            //$('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(6).text(DOJ);
         }
		 udise =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(1).text();
		school =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(2).text();
		contactno =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(3).text();
		mailid1 =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(4).text();
		mailid=mailid1.trim();
		
		//address1 =$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(5).text();
		//address=address1.trim();
		schooltype =$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(5).text();
		
		//pincode=pincode1.trim();
		
		
		
		
		 $('#'+edit).hide();
         $('#'+save).show();
		 $('#'+cancel).show();
		 	
		 var classid=$('#'+class_id).val();
		  
		//  console.log(aidedoption);
		//var schooltype=$('#'+school_type).val();
		 
	   $(this).closest('tr').find('td').attr('contenteditable','true');
	   
	  var schoolcate = <?php echo json_encode($schoolcate, JSON_PRETTY_PRINT)?>;
	    
		var cate_drop = "<select name='editcate' id='editcate' class='form-control' disabled>";
		
		var cate_val = '';
		 $.each(schoolcate, function(idx, obj) {
				cate_drop +="<option value="+obj.id+">"+obj.manage_name+" </option>";
				if(obj.manage_name == schooltype)
				{
					cate_val = obj.id;
				}
            		
            			
		 });
		cate_drop +="</select>";
		var udisecode = '<textarea id="udisecode" name="udisecode" class="form-control" value="" readonly></textarea>'; 
       var schoolname = '<textarea id="schoolname" name="schoolname" class="form-control" value="" readonly></textarea>'; 
	   
	   var schoolcontact = '<textarea type="text" id="schoolcontact" name="schoolcontact" minlength="10" maxlength="10" onKeypress="return isNumberKey(event);"; class="form-control" value="" readonly></textarea>';
	   
	    var schoolmailid = '<textarea type="email"  id="mailid" name="mailid"  class="form-control"  /></textarea>';
		
		
	   
       //var schooladdress = '<textarea type="text" id="address" name="address"  class="form-control" value="" readonly></textarea>';
	   
	   var cate_drop = '<td id="schoolcate" > '+cate_drop+'</td>';
	    $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(1).html(udisecode);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(2).html(schoolname);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(3).html(schoolcontact);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(4).html(schoolmailid);
		
		//$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(5).html(schooladdress);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(5).html(cate_drop);
		$("#udisecode").val(udise);
		$("#schoolname").val(school);
		$("#schoolcontact").val(contactno);
		$("#mailid").val(mailid);
		//$("#address").val(address);
		$("#editcate").val(cate_val);
		
		
		  $(this).prop("id","edit"+local_i);
          $(this).closest('tr').children('td').find('span').prop('id','save'+local_i);
		  local_i = index;
          
      });
	   $("#sample_2 tbody").on('click', '.cancel-class-section', function(e) {
		  
		    $(this).closest('tr').find('td').attr('contenteditable','false');
		    var save = $(this).closest('tr').children('td').find('button').attr('id');
			var cancel = $(this).closest('tr').children('td').find('.cancel-class-section').attr('id');
		    var edit =  $(this).closest('tr').children('td').find('.edit-class-section').attr('id');
		   var cancel = $(this).closest('tr').children('td').find('.cancel-class-section').attr('id');
		   var class_id = $(this).closest('tr').children('td').find('input').attr('id');
		    $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(1).text(udise);
		    $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(2).text(school);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(3).text(contactno);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(4).text(mailid);
            //$('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(5).text(address);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(6).text(schooltype);
			
		   $('#'+edit).show();
         $('#'+save).hide();
		 $('#'+cancel).hide();
		 	
		 
	   });
   function editsave(schid)
    {
		
		
		var schoolid = schid;
	    var schoolname = $("#schoolname").val();
        var schoolcontact =$("#schoolcontact").val();
        var schoolmail=$("#mailid").val();
        //var schooladdress =$("#address").val();
        var schooltype = $("#editcate").val();
		
		   /* check null value */  
		  // if(schoolname == '' || schoolcontact=='' || schoolmail=='' ||schooladdress=='' ||schooltype=='')
		 if( schoolmail=='')
	             {
				swal("OK", "All Field Is Required", "error");
		         }
			/* End of the Condition */  	 
         else
		{				 
		   var schoollist = <?php echo json_encode($schoollist, JSON_PRETTY_PRINT)?>;
		   
		   var i = 1;
			$.each(schoollist, function(idx, obj) {
				
				 /* check existing value */
				if(schoolcontact == obj.mobile && schoolmail == obj.sch_email && schooladdress== obj.address &&schooltype==obj.manage_cate_id)
				{
				i = 0;
				return false;
				}
				/* End of the Condition */  
				});
      	      saveupdate(i,schoolid);
		}
	 }
	 /* this function saved the edit data in database */
   function saveupdate(i,schoolid)  
		 {
			if(i == 1)
		 {
       var schoolname = $("#schoolname").val();
        var schoolcontact =$("#schoolcontact").val();
        var schoolmail=$("#mailid").val();
        var schooladdress =$("#address").val();
        var schooleditcate = $("#editcate").val();
		   
	var records = {'schoolid':schoolid,'schoolname':schoolname,'schoolcontact':schoolcontact,'schoolmail':schoolmail,'schooleditcate':schooleditcate};
				$.ajax(
				{
					data:{'records':records},
					url:baseurl+'DC/emis_district_schools_update',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						swal("OK", "School Information Updated Successfully", "success");
						window.location.reload();
					}
				});
		 }
		 else if( i == 0)
              {
                   swal("OK", "School Information is Already Exist",  "error");
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

        </script>



    </body>

</html>