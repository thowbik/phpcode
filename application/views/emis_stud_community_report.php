
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
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
														
                                                            <i class="fa fa-globe"></i>Students Community Details<span> </span></div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                                      
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
														
                                                            <thead>
                                                                <tr>
															
                                                                    <th class="center">S.No</th>
                                                                    <th>Community</th>
                                                                    <th>PreKG-Boys</th>
                                                                    <th>PreKG-Girls</th>
                                                                    <th>LKG-Boys</th>
                                                                    <th>LKG-Girls</th>
                                                                    <th>UKG-Boys</th>
                                                                    <th>UKG-Girls</th>
                                                                    <th>I-Boys</th>
                                                                    <th>I-Girls</th>
																	<th>II-Boys</th>
																	<th>II-Girls</th>
																	<th>III-Boys</th>
																	<th>III-Girls</th>
																	<th>IV-Boys</th>
																    <th>IV-Girls</th>
																	<th>V-Boys</th>
                                                                    <th>V-Girls</th>
																	<th>VI-Boys</th>
																	<th>VI-Girls</th>
																	<th>VII-Boys</th>
																	<th>VII-Girls</th>
																	<th>VIII-Boys</th>
																    <th>VIII-Girls</th>
																	<th>IX-Boys</th>
																	<th>IX-Girls</th>
																	<th>X-Boys</th>
																	<th>X-Girls</th>
																	<th>XI-Boys</th>
																    <th>XI-Girls</th>
																	<th>XII-Boys</th>
																    <th>XII-Girls</th>
																	<th>Total</th>
																     
																	
                                                                </tr>
                                                                </thead>
                                                               <tbody>
                                                            <?php
                                                            														
															if(!empty($school_community)){ $total1 = []; $Prkg_b=[]; $Prkg_g=[]; $lkg_b=[]; $lkg_g=[]; $ukg_b=[]; $ukg_g=[]; $c1_b=[]; $c1_g=[]; $c2_b=[]; $c2_g=[]; $c3_b=[]; $c3_g=[]; $c4_b=[]; $c4_g=[]; $c5_b=[]; $c5_g=[]; $c6_b=[]; $c6_g=[]; $c7_b=[]; $c7_g=[]; $c8_b=[]; $c8_g=[]; $c9_b=[]; $c9_g=[]; $c10_b=[]; $c10_g=[]; $c11_b=[]; $c11_g=[]; $c12_b=[]; $c12_g=[]; $total_t=[]; $total_b=[]; $total_g=[]; foreach($school_community as $index=> $sd){   ?>

                                                                <tr>
                                                                    <td class="center"><?=$index+1;?></td>
																  <td  class="center"><?= $sd->community_name ?></td>		
																  <td  class="center"><?= $sd->Prkg_b ?></td>
                                  <td  class="center"><?= $sd->Prkg_g ?></td>
                                   <td  class="center"><?= $sd->lkg_b ?></td>
                                  <td  class="center"><?= $sd->lkg_g ?></td> 
                                  <td  class="center"><?= $sd->ukg_b ?></td>
                                   <td  class="center"><?= $sd->ukg_g ?></td> 
                                   <td  class="center"><?= $sd->c1_b ?></td>
                                    <td  class="center"><?= $sd->c1_g ?></td>
																   <td  class="center"><?= $sd->c2_b ?></td> 
																   <td  class="center"><?= $sd->c2_g ?></td>
																   <td  class="center"><?= $sd->c3_b ?></td> 
																   <td  class="center"><?= $sd->c3_g ?></td> 
																   <td  class="center"><?= $sd->c4_b ?></td> 
																   <td  class="center"><?= $sd->c4_g ?></td>
																    <td  class="center"><?= $sd->c5_b ?></td>
																	<td  class="center"><?= $sd->c5_g ?></td>
																	<td  class="center"><?= $sd->c6_b ?></td>
																	<td  class="center"><?= $sd->c6_g ?></td>
																	<td  class="center"><?= $sd->c7_b ?></td>
																	<td  class="center"><?= $sd->c7_g ?></td> 
																	<td  class="center"><?= $sd->c8_b ?></td> 
																	<td  class="center"><?= $sd->c8_g ?></td>
																 	 <td  class="center"><?= $sd->c9_b ?></td>
																	 <td  class="center"><?= $sd->c9_g ?></td>
																	 <td  class="center"><?= $sd->c10_b ?></td>
																	 <td  class="center"><?= $sd->c10_g ?></td>
																	 <td  class="center"><?= $sd->c11_b ?></td>
																	 <td  class="center"><?= $sd->c11_g ?></td>
																	 <td  class="center"><?= $sd->c12_b ?></td> 
																	 <td  class="center"><?= $sd->c12_g ?></td>
																	 <td  class="center"><?= $sd->total_b+$sd->total_g ?></td>											
                                                                  

                                                                </tr>
                                    <?php  
                                      array_push($Prkg_b,$sd->Prkg_b);
                                      array_push($Prkg_g,$sd->Prkg_g);
                                      array_push($lkg_b,$sd->lkg_b);
                                      array_push($lkg_g,$sd->lkg_g);
                                      array_push($ukg_b,$sd->ukg_b);
                                      array_push($ukg_g,$sd->ukg_g);
                                      array_push($c1_b,$sd->c1_b);
                                      array_push($c1_g,$sd->c1_g);
                                      array_push($c2_b,$sd->c2_b);
                                      array_push($c2_g,$sd->c2_g);
                                      array_push($c3_b,$sd->c3_b);
                                      array_push($c3_g,$sd->c3_g);
                                      array_push($c4_b,$sd->c4_b);
                                      array_push($c4_g,$sd->c4_g);
                                      array_push($c5_b,$sd->c5_b);
                                      array_push($c5_g,$sd->c5_g);
                                      array_push($c6_b,$sd->c6_b);
                                      array_push($c6_g,$sd->c6_g);
                                      array_push($c7_b,$sd->c7_b);
                                      array_push($c7_g,$sd->c7_g);
                                      array_push($c8_b,$sd->c8_b);
                                      array_push($c8_g,$sd->c8_g);
                                      array_push($c9_b,$sd->c9_b);
                                      array_push($c9_g,$sd->c9_g);
                                      array_push($c10_b,$sd->c10_b);
                                      array_push($c10_g,$sd->c10_g);
                                      array_push($c11_b,$sd->c11_b);
                                      array_push($c11_g,$sd->c11_g);
                                      array_push($c12_b,$sd->c12_b);
                                      array_push($c12_g,$sd->c12_g);
                                      array_push($total_b,$sd->total_b);
                                       array_push($total_g,$sd->total_g);
                                    
                                      
                                     
                                      }  ?>
                                                                
                                                      
                                                            </tbody>
                                                         <tfoot>
                                                                <th  class="center">Total</th>
                                                              <th></th>
																 <th style="text-align: center;" ><?php 
                                                            $Prkg_b = array_sum($Prkg_b);
                                                            array_push($total1,$Prkg_b);
                                                            echo number_format($Prkg_b);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $Prkg_g = array_sum($Prkg_g);
                                                            array_push($total1,$Prkg_g);
                                                            echo number_format($Prkg_g);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $lkg_b = array_sum($lkg_b);
                                                            array_push($total1,$lkg_b);
                                                            echo number_format($lkg_b);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $lkg_g = array_sum($lkg_g);
                                                            array_push($total1,$lkg_g);
                                                            echo number_format($lkg_g);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $ukg_b = array_sum($ukg_b);
                                                            array_push($total1,$ukg_b);
                                                            echo number_format($ukg_b);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $ukg_g = array_sum($ukg_g);
                                                            array_push($total1,$ukg_g);
                                                            echo number_format($ukg_g);?></th>
                                                            <th style="text-align: center;" ><?php 
                                                            $c1_b = array_sum($c1_b);
                                                            array_push($total1,$c1_b);
                                                            echo number_format($c1_b);?></th>
                                                               <th style="text-align: center;" ><?php 
                                                            $c1_g = array_sum($c1_g);
                                                            array_push($total1,$c1_g);
                                                            echo number_format($c1_g);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $c2_b= array_sum($c2_b);
                                                            array_push($total1,$c2_b);
                                                            echo number_format($c2_b);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c2_g = array_sum($c2_g);
                                                            array_push($total1,$c2_g);
                                                            echo number_format($c2_g);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c3_b = array_sum($c3_b);
                                                            array_push($total1,$c3_b);
                                                            echo number_format($c3_b);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c3_g = array_sum($c3_g);
                                                            array_push($total1,$c3_g);
                                                            echo number_format($c3_g);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c4_b = array_sum($c4_b);
                                                            array_push($total1,$c4_b);
                                                            echo number_format($c4_b);?></th>
                                                            <th style="text-align: center;" ><?php 
                                                            $c4_g = array_sum($c4_g);
                                                            array_push($total1,$c4_g);
                                                            echo number_format($c4_g);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $c5_b = array_sum($c5_b);
                                                            array_push($total1,$c5_b);
                                                            echo number_format($c5_b);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c5_g = array_sum($c5_g);
                                                            array_push($total1,$c5_g);
                                                            echo number_format($c5_g);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c6_b = array_sum($c6_b);
                                                            array_push($total1,$c6_b);
                                                            echo number_format($c6_b);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c6_g = array_sum($c6_g);
                                                            array_push($total1,$c6_g);
                                                            echo number_format($c6_g);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c7_b = array_sum($c7_b);
                                                            array_push($total1,$c7_b);
                                                            echo number_format($c7_b);?></th>
                                                            <th style="text-align: center;" ><?php 
                                                            $c7_g = array_sum($c7_g);
                                                            array_push($total1,$c7_g);
                                                            echo number_format($c7_g);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $c8_b = array_sum($c8_b);
                                                            array_push($total1,$c8_b);
                                                            echo number_format($c8_b);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c8_g = array_sum($c8_g);
                                                            array_push($total1,$c8_g);
                                                            echo number_format($c8_g);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c9_b = array_sum($c9_b);
                                                            array_push($total1,$c9_b);
                                                            echo number_format($c9_b);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c9_g = array_sum($c9_g);
                                                            array_push($total1,$c9_g);
                                                            echo number_format($c9_g);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c10_b = array_sum($c10_b);
                                                            array_push($total1,$c10_b);
                                                            echo number_format($c10_b);?></th>
                                                            <th style="text-align: center;" ><?php 
                                                            $c10_g = array_sum($c10_g);
                                                            array_push($total1,$c10_g);
                                                            echo number_format($c10_g);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $c11_b = array_sum($c11_b);
                                                            array_push($total1,$c11_b);
                                                            echo number_format($c11_b);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $c11_g = array_sum($c11_g);
                                                            array_push($total1,$c11_g);
                                                            echo number_format($c11_g);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c12_b = array_sum($c12_b);
                                                            array_push($total1,$c12_b);
                                                            echo number_format($c12_b);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c12_g = array_sum($c12_g);
                                                            array_push($total1,$c12_g);
                                                            echo number_format($c12_g);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $total_t = array_sum($total_b)+array_sum($total_g);
                                                            array_push($total1,$total_t);
                                                            echo number_format($total_t);?></th>
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