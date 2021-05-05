
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
          <h4 class="modal-title">Profile completion status</h4>
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
														
                                                            <i class="fa fa-globe"></i> SchoolWise - Profile Completion Status<span> </span></div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                                       
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
															 <tr> 
															 <th></th>
															  <th></th>
															   <th></th>
                                                               <th colspan="3" style="text-align:center">Basic</th> 
															   <th colspan="3" style="text-align:center">School</th> 
															   <th colspan="3" style="text-align:center">Training</th> 
															   <th colspan="3" style="text-align:center">Committee</th> 
															   <th colspan="3" style="text-align:center">Land</th> 
															   <th colspan="3" style="text-align:center">Inventory</th> 
															   <th colspan="3" style="text-align:center">Funds & Fees</th> 
															   <th colspan="3" style="text-align:center">Funds</th> 
                                                            </tr>
                                                                <tr>
                                                                    <th>S.No</th>
																	 <th class="">Udise Code</th> 
                                                                    <th class="">School Name</th> 
																	
                                                                     <th class="center">Not Started</th>
                                                                     <th class="center">Saved</th>
                                                                     <th class="center">Submitted</th>
																	 
                                                                     <th class="center">Not Started</th>
                                                                     <th class="center">Saved</th>
																	 <th class="center">Submitted</th>
																	 
																	  <th class="center">Not Started</th>
																	  <th class="center">Saved</th>
                                                                     <th class="center">Submitted</th>
																	 
                                                                     <th class="center">Not Started</th>
                                                                     <th class="center">Saved</th>
                                                                    <th class="center">Submitted</th>
																	
																	 <th class="center">Not Started</th>
																	  <th class="center">Saved</th>
																	  <th class="center">Submitted</th>
																	  
                                                                     <th class="center">Not Started</th>
                                                                     <th class="center">Saved</th>
                                                                     <th class="center">Submitted</th>
																	 
                                                                    <th class="center">Not Started</th>
																	 <th class="center">Saved</th>
																	  <th class="center">Submitted</th>
																	  
																	  <th class="center">Not Started</th>
																	 <th class="center">Saved</th>
																	  <th class="center">Submitted</th>
                                                                </tr>
                                                                </thead>
                                                               <tbody>
															    <?php $total1=[];?>
                                                            <?php 
															if(!empty($block_profile_completion_status))
															{
															 
															  $f1notsave= [];
															  $f1save= [];
															  $f1finalsubmit= [];
															  $f2notsave= [];
															  $f2save= [];
															  $f2finalsubmit= [];
															  $f3notsave= [];
															  $f3save= [];
															  $f3finalsubmit= [];
															  $f4notsave= [];
															  $f4save= [];
															  $f4finalsubmit= [];
															  $f5notsave= [];
															  $f5save= [];
															  $f5finalsubmit= [];
															   $f6notsave= [];
															  $f6save= [];
															  $f6finalsubmit= [];
															   $f7notsave= [];
															  $f7save= [];
															  $f7finalsubmit= [];
															  $f8notsave= [];
															  $f8save= [];
															  $f8finalsubmit= [];
															 															  
														     
														foreach($block_profile_completion_status as $index=> $comp_status){   ?>
                                                              
                                                                <tr>
                                                                    <td ><?=$index+1;?></td>
                                                                        <td class="center"><?=$comp_status->udise_code;?></td>
																	    <td class="center"><?=$comp_status->school_name;?></td> 
                                                                        <td class="center"><?=number_format($comp_status->f1notsave);?></td>
                                                                        <td class="center"><?=number_format($comp_status->f1save);?></td>
                                                                        <td class="center"><?=number_format($comp_status->f1finalsubmit);?></td>
																		<td class="center"><?=number_format($comp_status->f2notsave);?></td>
                                                                        <td class="center"><?=number_format($comp_status->f2save);?></td>
                                                                        <td class="center"><?=number_format($comp_status->f2finalsubmit);?></td>
																		<td class="center"><?=number_format($comp_status->f3notsave);?></td>
																		<td class="center"><?=number_format($comp_status->f3save);?></td>
                                                                        <td class="center"><?=number_format($comp_status->f3finalsubmit);?></td>
                                                                        <td class="center"><?=number_format($comp_status->f4notsave);?></td>
																		<td class="center"><?=number_format($comp_status->f4save);?></td>
                                                                        <td class="center"><?=number_format($comp_status->f4finalsubmit);?></td>
                                                                        <td class="center"><?=number_format($comp_status->f5notsave);?></td>
																		<td class="center"><?=number_format($comp_status->f5save);?></td>
																		<td class="center"><?=number_format($comp_status->f5finalsubmit);?></td>
                                                                        <td class="center"><?=number_format($comp_status->f6notsave);?></td>
                                                                        <td class="center"><?=number_format($comp_status->f6save);?></td>
																		<td class="center"><?=number_format($comp_status->f6finalsubmit);?></td>
                                                                        <td class="center"><?=number_format($comp_status->f7notsave);?></td>
                                                                        <td class="center"><?=number_format($comp_status->f7save);?></td>
																		<td class="center"><?=number_format($comp_status->f7finalsubmit);?></td>
																		<td class="center"><?=number_format($comp_status->f8notsave);?></td>
                                                                        <td class="center"><?=number_format($comp_status->f8save);?></td>
																		<td class="center"><?=number_format($comp_status->f8finalsubmit);?></td>

                                                                </tr>
                                                                <?php 
                             
                             array_push($f1notsave,$comp_status->f1notsave);
							 array_push($f1save,$comp_status->f1save);
							 array_push($f1finalsubmit,$comp_status->f1finalsubmit);
							 array_push($f2notsave,$comp_status->f2notsave);
							 array_push($f2save,$comp_status->f2save);
							 array_push($f2finalsubmit,$comp_status->f2finalsubmit);
                             array_push($f3notsave,$comp_status->f3notsave);
							 array_push($f3save,$comp_status->f3save);
							 array_push($f3finalsubmit,$comp_status->f3finalsubmit);
                             array_push($f4notsave,$comp_status->f4notsave);
							 array_push($f4save,$comp_status->f4save);
							 array_push($f4finalsubmit,$comp_status->f4finalsubmit);
                             array_push($f5notsave,$comp_status->f5notsave);
							 array_push($f5save,$comp_status->f5save);
							 array_push($f6finalsubmit,$comp_status->f6finalsubmit);
                             array_push($f6notsave,$comp_status->f6notsave);
							 array_push($f6save,$comp_status->f6save);
							 array_push($f6finalsubmit,$comp_status->f6finalsubmit);
                             array_push($f7notsave,$comp_status->f7notsave);
							 array_push($f7save,$comp_status->f7save);
							 array_push($f7finalsubmit,$comp_status->f7finalsubmit);		
                             array_push($f8notsave,$comp_status->f8notsave);
							 array_push($f8save,$comp_status->f8save);
							 array_push($f8finalsubmit,$comp_status->f8finalsubmit);									 
							 }  ?>
                                                                
                                                      
                                                            </tbody>
                                                            <tfoot>
                                                          <tr>
                                                            <th>Total</th>
                                                            <th></th> 
															 <th></th> 
                                                           
															 <th style="text-align: center;" ><?php 
                                                            $f1notsave = array_sum($f1notsave);
                                                            array_push($total1,$f1notsave);
                                                            echo number_format($f1notsave);?></th>
															<th style="text-align: center;" ><?php 
                                                            $f1save = array_sum($f1save);
                                                            array_push($total1,$f1save);
                                                            echo number_format($f1save);?></th>
															<th style="text-align: center;" ><?php 
                                                            $f1finalsubmit = array_sum($f1finalsubmit);
                                                            array_push($total1,$f1finalsubmit);
                                                            echo number_format($f1finalsubmit);?></th>
															
															 <th style="text-align: center;" ><?php 
                                                            $f2notsave = array_sum($f2notsave);
                                                            array_push($total1,$f2notsave);
                                                            echo number_format($f2notsave);?></th>
															<th style="text-align: center;" ><?php 
                                                            $f2save = array_sum($f2save);
                                                            array_push($total1,$f2save);
                                                            echo number_format($f2save);?></th>
															<th style="text-align: center;" ><?php 
                                                            $f2finalsubmit = array_sum($f2finalsubmit);
                                                            array_push($total1,$f2finalsubmit);
                                                            echo number_format($f2finalsubmit);?></th>
															
															 <th style="text-align: center;" ><?php 
                                                            $f3notsave = array_sum($f3notsave);
                                                            array_push($total1,$f3notsave);
                                                            echo number_format($f3notsave);?></th>
															<th style="text-align: center;" ><?php 
                                                            $f3save = array_sum($f3save);
                                                            array_push($total1,$f3save);
                                                            echo number_format($f3save);?></th>
															<th style="text-align: center;" ><?php 
                                                            $f3finalsubmit = array_sum($f3finalsubmit);
                                                            array_push($total1,$f3finalsubmit);
                                                            echo number_format($f3finalsubmit);?></th>
															
															<th style="text-align: center;" ><?php 
                                                            $f4notsave = array_sum($f4notsave);
                                                            array_push($total1,$f4notsave);
                                                            echo number_format($f4notsave);?></th>
															<th style="text-align: center;" ><?php 
                                                            $f4save = array_sum($f4save);
                                                            array_push($total1,$f4save);
                                                            echo number_format($f4save);?></th>
															<th style="text-align: center;" ><?php 
                                                            $f4finalsubmit = array_sum($f4finalsubmit);
                                                            array_push($total1,$f4finalsubmit);
                                                            echo number_format($f4finalsubmit);?></th>
															
															
															 <th style="text-align: center;" ><?php 
                                                            $f5notsave = array_sum($f5notsave);
                                                            array_push($total1,$f5notsave);
                                                            echo number_format($f5notsave);?></th>
															<th style="text-align: center;" ><?php 
                                                            $f5save = array_sum($f5save);
                                                            array_push($total1,$f5save);
                                                            echo number_format($f5save);?></th>
															<th style="text-align: center;" ><?php 
                                                            $f5finalsubmit = array_sum($f5finalsubmit);
                                                            array_push($total1,$f5finalsubmit);
                                                            echo number_format($f5finalsubmit);?></th>
															
															
															 
															 <th style="text-align: center;" ><?php 
                                                            $f6notsave = array_sum($f6notsave);
                                                            array_push($total1,$f6notsave);
                                                            echo number_format($f6notsave);?></th>
															<th style="text-align: center;" ><?php 
                                                            $f6save = array_sum($f6save);
                                                            array_push($total1,$f6save);
                                                            echo number_format($f6save);?></th>
															<th style="text-align: center;" ><?php 
                                                            $f6finalsubmit = array_sum($f6finalsubmit);
                                                            array_push($total1,$f6finalsubmit);
                                                            echo number_format($f6finalsubmit);?></th>
															
															 <th style="text-align: center;" ><?php 
                                                            $f7notsave = array_sum($f7notsave);
                                                            array_push($total1,$f7notsave);
                                                            echo number_format($f7notsave);?></th>
															<th style="text-align: center;" ><?php 
                                                            $f7save = array_sum($f7save);
                                                            array_push($total1,$f7save);
                                                            echo number_format($f7save);?></th>
															<th style="text-align: center;" ><?php 
                                                            $f7finalsubmit = array_sum($f7finalsubmit);
                                                            array_push($total1,$f7finalsubmit);
                                                            echo number_format($f7finalsubmit);?></th>
															
															 <th style="text-align: center;" ><?php 
                                                            $f8notsave = array_sum($f8notsave);
                                                            array_push($total1,$f8notsave);
                                                            echo number_format($f8notsave);?></th>
															<th style="text-align: center;" ><?php 
                                                            $f8save = array_sum($f8save);
                                                            array_push($total1,$f8save);
                                                            echo number_format($f8save);?></th>
															<th style="text-align: center;" ><?php 
                                                            $f8finalsubmit = array_sum($f8finalsubmit);
                                                            array_push($total1,$f8finalsubmit);
                                                            echo number_format($f8finalsubmit);?></th>
															
															</tr>
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
        url:baseurl+'State/get_school_management_data',
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
        url:baseurl+'State/deletereport_schoolcatemanage',
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