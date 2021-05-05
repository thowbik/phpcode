
<?php 
// print_r($blockwise_schoolinfo);
?>
<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    <style> 
.center 
{
text-align: center;
}   
</style>
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL STYLES -->
    
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->
	   <div class="container">
   
 

  <!-- Modal -->
  <div class="modal fade" id="test" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width:140%">
        <div class="modal-header">
          <button type="button" class="close" onclick="refresh();" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Class And Sections</h4>
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
            

   <?php $this->load->view('header.php'); ?>

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
                                     

                                       
           
                                        <!-- BEGIN CARDS -->
                                        <div class="row margin-bottom-20">
                                             <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
													
													     <center>
                                                  <form id="filter" method="post" action="<?php echo base_url().'Home/emis_school_textbooks_Distribution_details';?>">
												  
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
                                                          <select style="width: 90%;" class="form-control" onchange="get_section(event);" data-placeholder="Choose a Category" tabindex="1" id="classno" name="classno"  style="width: 30%" required="" >
                                                               	
                                                                <option value="" >Select Class</option>
																	
                                                                 <?php foreach($classDetails as $sc) 
																 {
																	
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
													<!-- <div class="col-md-2">  
                                                          <select style="width: 90%;" class="form-control" data-placeholder="Choose a Category" tabindex="1" id="sectionname" name="sectionname"  style="width: 60%" required="" >
                                                              
                                                               
                                                               </select> 
                                                        
                                                    </div>  -->
													<!--	<div class="col-md-2" id="groups">  
                                                          <select style="width: 90%;" class="form-control"  onchange="group();"  tabindex="1" id="group1" name="group1"   required="" >
                                                               	
                                                                <option value="0">Select Group</option>
                                                                <option value="1">1</option>
																<option value="2">2</option>
																<option value="3">3</option>
								
                                                               </select> 
															   
                                                         </div> -->
													
													<div class="col-md-2" id="terms">  
                                                          <select style="width: 90%;" class="form-control"   tabindex="1" id="term1" name="term1"   required="" >
                                                               	
                                                                <option value="0">Select Term</option>
                                                                <option value="1">Term1</option>
																<option value="2">Term2</option>
																<option value="3">Term3</option>
								
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
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                  <div class="portlet-title">
                                                        <div class="caption">
													 	<?php 
														if(!empty($text_book_distribute_details)){
														foreach($text_book_distribute_details as $sd)
														{
															// echo $sd['class_studying_id'];
															$class_studying_id = $sd->class_studying_id;
														}
														}
														?>
                                                            <i class="fa fa-globe"></i>School Textbooks Distribution Register<span> </span></div>
                                                        
                                                    </div> 
                                                    <div class="portlet-body">

                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
													
                                                            <thead>
                                                                <tr>
                                                                    <th class="center">S.No</th>
                                                                   <th>EMIS ID</th>
                                                                    <th>Name Of The Student</th>
                                                                   <!-- <th>Community</th>
																	<th>Gender</th>  -->
																	<th>Class</th>
																	<th>Subject</th>
																	<th>Medium</th>
																	<?php if($class_studying_id ==1 ||$class_studying_id ==2 ||$class_studying_id ==3 ||$class_studying_id ==4 || $class_studying_id ==5 ||$class_studying_id ==6 ||$class_studying_id ==7 ||$class_studying_id == 8){
																		?>
																	<th id="t">Term</th>
																	<?php }?>
																	<?php
																	if($class_studying_id ==11||$class_studying_id ==12 ){
																	?>
																    <th id="g">Group</th>
																	<?php }?>
                                                                    <th>Distribution Date</th>
																	
                                                                   
                                                                </tr>
                                                                </thead>
                                                               <tbody>
                                                            <?php
                   
															if(!empty($text_book_distribute_details)){ $total1 = 0; foreach($text_book_distribute_details as $index=> $sd){ 

														?>

                                                                <tr>
                                                                    <td class="center"><?=$index+1;?></td>
                                                                   <td><?= $sd->unique_id_no; ?></td>
                                                                    <td><?= $sd->name ?></td>
                                                                  <!-- <td ><?= $sd->community_name?></td>
                                                                   <td><?php 
																  if ($sd->gender == 1){     echo Male;
																  }
																  else
																  {
																	  echo Female;
																  }?></td> -->
																   <td ><?= $sd->class_studying_id ?>- <?= $sd->class_section ?></td>
																   
																    <td ><?= $sd->book_name ?></td>
																   
																	<td ><?= $sd->MEDINSTR_DESC ?></td>
																		<?php if($class_studying_id ==1 ||$class_studying_id ==2 ||$class_studying_id ==3 ||$class_studying_id ==4 || $class_studying_id ==5 ||$class_studying_id ==6 ||$class_studying_id ==7 ||$class_studying_id == 8){ ?>
																	 <td id="t"><?= $sd->term ?></td>
																		<?php }
																		if($class_studying_id ==11 ||$class_studying_id ==12 ){
																		?>
																		
																	  <td id="g"><?= $sd->group_name ?></td>
																		<?php }?>
                                                                   <td ><?= date('d-m-Y',strtotime($sd->distribution_date)) ?></td>
																 													                                
                                                                  

                                                                </tr>
                                                                <?php  }  ?>
                                                                
                                                      
                                                            </tbody>
                                                       <!--  <tfoot>
                                                                <th  class="center">Total</th>
                                                              
																<th class="center"></th>
																 <th ><?php echo $aadharincount?></th>
                                                                <th ><?php echo $aadharnotincount?></th>
                                                            </tfoot> -->
                                                            <?php } ?>
                                                        </table>

                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END CARDS -->


                                         <!-- BEGIN BLOCK BUTTONS PORTLET-->
                                                                   
                                                                    <!-- BEGIN BLOCK BUTTONS PORTLET-->

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
   <script src="<?php echo base_url().'asset/js/district.js';?>" type="text/javascript"></script>


    <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/moment.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/jquery.mockjax.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
              <script>
	$("#groups").show();		  
	$("#term").show();
	
	function get_section(event) {

    var selectElement = event.target;
    var value = selectElement.value;
	
		  // alert(value);
			if(value ==9 || value ==10 )
				{
					// alert("if");
					$("#terms").hide();
					 $("#groups").hide();
					// $("#t").hide();
					// $("#g").hide();
				}
				else if(value ==11 ||value ==12)
				{
					 // alert("elif");
					$("#groups").show();
					$("#terms").hide();
					// $("#g").show();
					// $("#t").hide();
					
				}else
				{
					 // alert("else");
					$("#terms").show();
					$("#groups").hide();
					// $("#t").show();
					// $("#g").hide();
					
				}
				
				
			
    }		  
			  
			  
			  
			  
			  
			  
			  


$('#emis_state_report_schmanage').click(function () {    
        console.log(this.checked,$('input:checkbox').find(".school_manage").find());
     $('input:checkbox').prop('checked', this.checked);
     if(this.checked){    
     console.log($(this).val());
     }
 });

$("#select_all").change(function(){ 
 //"select all" change 
    $(".emis_state_report_schcate").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
});

//".checkbox" change 
$('.emis_state_report_schcate').change(function(){ 
    //uncheck "select all", if one of the listed checkbox item is unchecked
    if(false == $(this).prop("checked")){ //if this item is unchecked
        $("#select_all").prop('checked', false); //change "select all" checked status to false
    }
    //check "select all" if all checkbox items are checked
    if ($('.emis_state_report_schcate:checked').length == $('.checkbox').length ){
        $("#select_all").prop('checked', true);
    }
});

$(document).ready(function()
{
    sum_dataTable('#sample_3');
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