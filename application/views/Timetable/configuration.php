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
		
   <div class="container">
   
 

  <!-- Modal -->
  <div class="modal fade" id="test" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width:140%">
        <div class="modal-header">
          <button type="button" class="close" onclick="refresh();" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Time Table</h4>
        </div>
		<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#aabcfe;}
.tg td{font-family:Arial,align:center; sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#669;
}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#039;background-color:#b9c9fe;}
.tg .tg-phtq{border-color:inherit;text-align:left;vertical-align:top}
.tg .tg-hmp3{text-align:left;vertical-align:top}
.tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-ydyv{border-color:inherit;text-align:right;vertical-align:top}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
.tg .tg-dvpl{border-color:inherit;text-align:right;vertical-align:top}
</style>
<center>

       <table class="tg" id="myTable">
  <tbody>
    <tr>
     
    </tr>
	
  </tbody>
  
  
</table>
	   </center>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick="refresh();" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

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
                                
                                 <div class="container" style="width: 1220px;">
                                    <!-- BEGIN PAGE CONTENT INNER -->
                          

                                   
                                       
                                    <?php $this->load->view('emis_school_profile_header1.php'); ?>
                                        

                                           <!-- <div class="m-heading-1 border-green m-bordered">
                                            <h3>Basic Information</h3>
                                        </div> -->
                                     
                                         
                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Time Table Configuration</span>
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
                                                            <i class="fa fa-globe"></i> School Periods Details</div>
                                                        <div class="tools" style="margin-top: 20px;"> </div>
                                                    </div>
                                                    <div class="portlet-body">
													
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
																    <th style="width:10%;"> Class</th>
                                                                    <!--<th contenteditable="false" style="width:10%;"> Term </th>-->
																	<th style="width:10%;">Section</th> 
																	<th style="width:10%;" >Peroids</th>
																	<th style="display:none">U-Id</th>
                                                                    <th style="width:10%;" >Action</th>
																	<th style="width:5%;" >View</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                             <?php                                                           
                                                              $i=1;
                                                              foreach($classDetails as $d)
															   {
																   $termid=$d->term_id;
																  $classid=$d->value;
																  switch ($classid) {
																case "1":$sta='1';$standard='I';break;
																case "2":$sta='2';$standard='II';break;
																case "3":$sta='3';$standard='III';break;	
																case "4":$sta='4';$standard='IV';break;	
																case "5":$sta='5';$standard='V';break;
																case "6":$sta='6';$standard='VI';break;	
																case "7":$sta='7';$standard='VII';break;	
																case "8":$sta='8';$standard='VIII';break;
																case "9":$sta='9';$standard='IX';break;	
																case "10":$sta='10';$standard='X';break;	
																case "11":$sta='11';$standard='XI';break;	
																case "12":$sta='12';$standard='XII';break;	
																case "13":$sta='13';$standard='Pre KG';break;	
																case "14":$sta='14';$standard='UKG';break;	
																case "15":$sta='15';$standard='LKG';break;	
																	
																}
																
																		?>
																		
                                                               <tr>
															 
                                                                     
                                                                   
																	<td><?php echo $standard; ?></td>
																	<td><?php echo $d->section; ?></td>
																	<!--<?php if($termid==1){$Term ='Term - 1';}
																	else if($termid==2){$Term= 'Term - 2'; }
																	else if($termid==3) {$Term= 'Term - 3';}
																	else if($termid==4){$Term= 'Term - All';}
																	else {$Term= '';}?> 
																	<td><?php echo $termid; ?></td>--> 
																	
																	<td><?php echo $d->periods ?></td>
															      
                                                                    <td style="display:none"><?php echo $d->u_id; ?></td>
                                                                     <td><a href="javascript:;" class="btn btn-sm green edit-class-section" id="edit<?php echo $i; ?>"  contenteditable="false" data-class-section-id ="<?php echo $i;  ?>">Edit / Update<!--<i class="fa fa-edit"></i>--></a>
																	 <!--<button type="button" class="btn btn-info btn-md" data-toggle="modal"  onclick="openmodel(<?php echo $d->periods?>)"; >View</button>-->
																	 
																	<span>
																	<button data-id="2" style="display:none;" id="save<?php echo $i;  ?>" class="btn btn-sm green save-class-section" onclick="save(<?php echo $d->id;?>)" contenteditable="false">Save</button>
																	
																	<button data-id="3"  style="display:none; margin-left: 72px margin-top: -54px"; id="cancel<?php echo $i; ?>" class="btn btn-sm red cancel-class-section" onclick="cancel(<?php echo $i?>)">cancel</button>
																   </span>
                                                                    </td>
																	<td><button type="button" class="btn btn-info btn-md" data-toggle="modal"  onclick="openmodel(<?php echo $d->periods?>)"; >View</button>
                                                                    </td>
																	
                                                                 
                                                               </tr>
                                                               <?php $i++; 
																  }
																  														   ?>
                                                             
                                                            </tbody>
															
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
function openmodel(periods)
{
var periods=periods;
 $('#periodscount').val(periods); 
 $('#myTable tbody').append("<th>Days</th>");
 
 for (var i = 1; i <= parseFloat(periods); i++) {
	// $('#myTable tbody').append("<th>Periods" + i +"</th>");
   $('#myTable tbody').append("<th>Periods" + i +"</th>");
   
}
$('#myTable tbody').append("<tr><td>Monday</td></tr>");
$('#myTable tbody').append("<tr><td>Tuesday</td></tr>");
$('#myTable tbody').append("<tr><td>Wednesday</td></tr>");
$('#myTable tbody').append("<tr><td>Thursday</td></tr>");
$('#myTable tbody').append("<tr><td>Firday</td></tr>");
$('#myTable tbody').append("<tr><td>Sturday</td></tr>");
$('#myTable tbody').append("<tr><td>Sunday</td></tr>");

$('#test').modal('show');
  //$('#myTable tbody').append('<tr class="child"><th>Days</th><th>Periods1</th></tr><tr><td>Monday</td></tr>');
} 
function refresh()
{
window.location.reload();            
}                //emis_no_sections
               
             $("#tbl").hide(); 
			 var local_i =-1;
			 var standard = '';
			 var medium='';
			 
			 
  $("#sample_2 tbody").on('click', '.edit-class-section', function(e) {
     index =  $(this).closest('tr').index();
	 
		
	    
		var save = $(this).closest('tr').children('td').find('button').attr('id');
		var view =$(this).closest('tr').children('td').find('.button').attr('id');

		var cancel = $(this).closest('tr').children('td').find('.cancel-class-section').attr('id');
		var class_id = $(this).closest('tr').children('td').find('input').attr('id');
		
        var edit =  $(this).attr("id"); 
		if(local_i!=-1){
		  
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(0).text(classes);
            //$('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(1).text(term);
			$('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(1).text(section);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(2).text(periods);
            
            
         }
		
		classes =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(0).text();
		section =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(1).text();
		//term =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(1).text();
		periods =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(2).text();
		
		 $('#'+edit).hide();
         $('#'+save).show();
		 $('#'+cancel).show();
		 	
		 
		 
	   $(this).closest('tr').find('td').attr('contenteditable','true');
	   // var html = '<select id="classid" name="classid" vlaue="classid">'; 
	  
					
	  var classes1= '<input type="text" id="classes" name="classes" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control"  disabled>';
	  
      // var term1 = '<select  id="term" name="term"  class="form-control "><option value="1">Term - 1</option><option value="2">Term - 2</option><option value="3">Term - 3</option></select>'; 
	  var sections1= '<input type="text" id="sections" name="sections" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control"  disabled>';
	    
	   var periods1 = '<input type="text" id="periods" name="periods"  minlength="1" maxlength="1" onKeypress="return isNumberKey(event);"; class="form-control" >';
	   
	    //var uid = '<input type="text" id="uid" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" disabled>';
		 
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(0).html(classes1);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(1).html(sections1);
		//$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(1).html(term1);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(2).html(periods1);
		
		//$("#term").val(term);
		$("#classes").val(classes);
		$("#sections").val(section);
		$("#periods").val(periods);
		
		
		  $(this).prop("id","edit"+local_i);
          $(this).closest('tr').children('td').find('span').prop('id','save'+local_i);
		  local_i = index;
          
      });
	   $("#sample_2 tbody").on('click', '.cancel-class-section', function(e) {
		
		  location.reload();
		 	
		 
	   });
	   /* this function saved the  data in database tablename:schoolnew_timetable_configuration*/
   
   function save(id)
    {
		
		var u_id=id;
		
	    //var term = $("#term").val();
        var periods =$("#periods").val();
		
		 $.ajax(
		            {
			data:{'u_id':u_id,'periods':periods},
			url:baseurl+'TimetableController/emis_school_timetable_configuration',
			type:"POST",
			dataType:"JSON",
			success:function(res)
			{
				swal("OK", "Class Periods Saved Successfully", "success");
				window.location.reload();
			}
			 
		    });
		
		
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