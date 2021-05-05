

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
            

<?php $this->load->view('Ceo_District/header.php'); ?>

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
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
														
                                                            <i class="fa fa-globe"></i> Staffs SanctionedFixation<span> </span></div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                                      
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
														
														
                                                            <thead>
                                                                <tr>
                                                                    <th class="center">S.No</th>
                                                                   
                                                                    <th>Block</th>
                                                                    <th class=" center">UDISE Code</th>
																	
                                                                    <th class=" ">School Name</th>
																	<th class=" ">SG Teachers</th>
																	 <th class=" ">Science</th>
																	  <th class=" ">Maths</th>
																	 <th class=" ">English</th>
																	<th class=" ">Tamil</th>
																	 <th class=" ">SocialScience</th>
																	  <th class=" ">Total</th>
																	                                                                                             </tr>
                                                                </thead>
                                                               <tbody>
                                                            <?php
                                                             //$aadharincount =0;
															//$aadharnotincount =0;
															
															// "<?php echo base_url().'district/emis_staff_school_count_details?schoolid='.$sd->school_id
                                                            $sgtot=0;
														    $scitot =0;
															 $mattot=0;
														    $engtot =0;
															 $tamtot=0;
														    $soctot =0;
														   $toteligible =0;									
														   if(!empty($staff_sanctpost)){ $total1 = 0; foreach($staff_sanctpost as $index=> $sd){   ?>

                                                                <tr>
                                                                    <td class="center"><?=$index+1;?></td>
                                                                    
                                                                    <td><?php echo $sd->block_name; ?></td>
                                                                    <td class="center"><?=$sd->udise_code;?></td>
																	
																	
                                                                   <td class="details-control">
																  <!--<a href="javascript:void(0);" >
																  </a> -->
																 
																  
																   <?=$sd->school_name;?>
																    <input type="hidden" id="school_id<?=$index?>" value="<?=$sd->school_id;?>">
																   </td>
																
                                                                 <td><?php echo $sd->sanc_sg;?><?php $sgtot=$sgtot+$sd->sanc_sg;?></td>
																	<td><?php echo $sd->sanc_sci;?><?php $scitot=$scitot+$sd->sanc_sci;?> </td>
																	<td><?php echo $sd->sanc_mat;?> <?php $mattot=$mattot+$sd->sanc_mat;?></td>
																	<td><?php echo $sd->sanc_eng;?> <?php $engtot=$engtot+$sd->sanc_eng;?></td>
																	<td><?php echo $sd->sanc_tam;?><?php $tamtot=$tamtot+$sd->sanc_tam;?> </td>
																	<td><?php echo $sd->sanc_soc;?> <?php $soctot=$soctot+$sd->sanc_soc;?></td>
																	  <td><?php echo $sd->sanc_tot;?>
																	 <?php $toteligible=$toteligible+$sd->sanc_tot;?>  </td>

                                                                </tr>
                                                                <?php  }  ?>
                                                                
                                                      
                                                            </tbody>
                                                         <tfoot>
                                                                <th  class="center">Total</th>
                                                                
                                                                <th class="center"></th>
                                                                <th class="center"></th>
                                                                <th class="center"></th>
																
															  <th class="center"><?php echo $sgtot?></th>
                                                                <th class="center"><?php echo $scitot?></th>
                                                                <th class="center"><?php echo $mattot?></th>
                                                                <th class="center"><?php echo $engtot?></th>
															  <th class="center"><?php echo $tamtot?></th>
                                                                <th class="center"><?php echo $soctot?></th>
                                                              
															    <th ><?php echo $toteligible?></th>
                                                            </tfoot>
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
				  <?php $this->load->view('scripts.php'); ?>
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
   
 			 
function openmodel(school)
{
	school_id=school;
	$.ajax(
    {
        type: "POST",
        url:baseurl+'Deo_District/get_school_class_section_details',
        data:{'schoolid':school_id},
        success: function(resp){
         alert(resp);  
       
        var section = JSON.parse(resp);
        console.log(section);
        var section_drop = '<select name="section_id" class="form-control" id="section_id">';
        section_drop += '<option value=0>Select Section</option>';
        $.each(section,function(id,val)
        {
            section_drop +='<option value='+ val.section +'>'+val.section+'</option>';
        })
            section_drop +='</select>';
            
            $("#section").empty('');            
            $("#section").html(section_drop); 
           
            
         },
          
    })
// var periods=periods;
 // $('#periodscount').val(periods); 
 // $('#myTable tbody').append("<th>Days</th>");
 
 // for (var i = 1; i <= parseFloat(periods); i++) {
	// // $('#myTable tbody').append("<th>Periods" + i +"</th>");
   // $('#myTable tbody').append("<th>Periods" + i +"</th>");
   
// }
// $('#myTable tbody').append("<tr><td>Monday</td></tr>");
// $('#myTable tbody').append("<tr><td>Tuesday</td></tr>");
// $('#myTable tbody').append("<tr><td>Wednesday</td></tr>");
// $('#myTable tbody').append("<tr><td>Thursday</td></tr>");
// $('#myTable tbody').append("<tr><td>Firday</td></tr>");
// $('#myTable tbody').append("<tr><td>Sturday</td></tr>");
// $('#myTable tbody').append("<tr><td>Sunday</td></tr>");

$('#test').modal('show');
  //$('#myTable tbody').append('<tr class="child"><th>Days</th><th>Periods1</th></tr><tr><td>Monday</td></tr>');
} 			  
  $(document).ready(function(){ 
  $("#emis_state_report_schcate").change(function(){ 

    var emis_state_report_schcate = $("#emis_state_report_schcate").val();

      $.ajax({
        type: "POST",
        url:baseurl+'Ceo_District/get_school_management_data',
        data:"&emis_state_report_schcate="+emis_state_report_schcate,
        success: function(resp){
        // alert(resp);  
        $("#emis_state_report_schmanage").html(resp);  
        return true;              
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

  });  }); 

 $(document).ready(function(){  // function call for validate company name 
    $("#emis_state_report_schcate").change(function(){
      return validatetext('emis_state_report_schcate','emis_state_report_schcate_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_state_report_schmanage").change(function(){
      return validatetext('emis_state_report_schmanage','emis_state_report_schmanage_alert'); 
});   });


function checkmanagecate(){

var baseurl='<?php echo base_url(); ?>';

var manage = validatetext('emis_state_report_schmanage','emis_state_report_schmanage_alert');
var cate = validatetext('emis_state_report_schcate','emis_state_report_schcate_alert'); 

var manage1=$("#emis_state_report_schmanage").val();
var cate1 = $("#emis_state_report_schcate").val();

if(manage == 0 || cate == 0){
    return false;
}

  
       
}

function remove_catefilter(){

  $.ajax({
        type: "POST",
        url:baseurl+'Ceo_District/deletereport_schoolcatemanage',
        data:"&test=1",
        success: function(resp){
        // alert(resp);  
        location.reload(true);
        return true;              
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });
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
var table = '';
$(document).ready(function()
{
     table = sum_dataTable('#sample_3');
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
		return table;
    }
	
	
	
	  var table = '';
// $(document).ready(function()
// {
   // table = sum_dataTable('#sample_3');
   // var Otable = sum_dataTable("#sample_4");

    $('#sample_3').on('click', 'td.details-control', function () {
		// alert();
       var tr = $(this).closest('tr');
       var row = window.table.row(tr);
       var rowid = window.table.row(tr).index();
	   console.log(rowid);
    // need to get row data here somehow
       // var rowId = ?????;
       // console.log(row.child);
       if (row.child.isShown()) {
           // This row is already open - close it
           row.child.hide();
           tr.removeClass('shown');
       } else {
           // Open this row
           format(row.child,rowid);
           tr.addClass('shown');
       }
   });
   
   
    /*function format(callback, id) {
        
    var school_id = $("#school_id"+id).val();
	console.log(school_id);
    if($.fn.dataTable.isDataTable('#d'))
	{
    $('#d').DataTable().clear().destroy();
     }
    var  thead= '',tbody='';
   
    

               // var data = {'table':'schoolnew_natureofconst_entry','where':{'school_key_id':school_id}};

       $.ajax({
           method:"POST",
		   data:{'school_id':school_id},
           url: '<?=base_url()."State/emis_district_staff_data"?>',
           
           dataType: "json",
           success: function (response) {
            console.log(response);
          
               // var data = JSON.parse(response.responseText);
                   var thead = '', tbody = '',tfoot='';
                   thead += '<thead><tr>'
                   thead += '<td><b>S.No </b></td>';
                   thead += '<td><b>Staff Name</b></td>';
                   thead += '<td><b>Gender</b></td>';
                   thead += '<td><b>Join_Date</b></td>';
                   thead += '<td><b>Professional</b></td>';
                   thead += '<td><b>CategoryName</b></td>';
                   thead += '<td><b>MobileNumber</b></td>';
                   thead += '<td><b>Email_ID</b></td>';
                   thead += '<td><b>Type_Teacher</b></td>';
                   thead += '<td><b>Category</b></td></thead>';

                   thead += '</tr>';
                
                $.each(response, function (i, d) {
                i = i+1;
				console.log(d.gender);
                tbody +='<tbody><tr>';
                tbody +='<td>'+i+'</td><td>'+d.teacher_name+'</td><td>'+(d.gender==1?'Male':'Female')+'</td><td>'+d.staff_join+'</td><td>'+d.professional+'</td><td>'+d.categoryname+'</td><td>'+d.mbl_nmbr+'</td><td>'+d.email_id+'</td><td>'+d.type_teacher+'</td><td>'+(d.category==1?'Teaching Staff':'Non Teaching Staff')+'</td>';
                tbody +='</tr></tbody>';

                                 });
               tfoot +='<tfoot><tr>';
             
               tfoot +='</tr>';
               callback($('<table id="d" style="background-color:gray;" class="table table-condensed table-bordered">' + thead + tbody + +'</table>')).show();
       

           },
           error: function () {
               $('#output').html('Bummer: there was an error!');
           }
           
       });
   }*/

        </script>
    </body>

</html>