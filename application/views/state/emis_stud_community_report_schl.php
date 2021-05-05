<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    <style>
        .dashboard-stat2 {
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    -ms-border-radius: 2px;
    -o-border-radius: 2px;
    border-radius: 2px;
    background: #fff;
    padding: 15px 15px 14px !important;
}
    .dashboard-stat2 .display {
    margin-bottom: 2px !important;
}
.bottom
{
  border-bottom: 1px solid gray;
}
.bs-callout-lightsteelblue {
    border-left: 8px solid lightsteelblue;
    border-radius: 3% !important;
}
.bs-callout-darkseagreen {
    border-left: 8px solid darkseagreen;
    border-radius: 3% !important;
}
.bs-callout-mediumaquamarine {
    border-left: 8px solid mediumaquamarine;
    border-radius: 3% !important;
}
.bs-callout-lightblue {
    border-left: 8px solid lightblue;
    border-radius: 3% !important;
}

.x_panel
{
      padding: 0px 8px !important;
}
.x_title {
    border-bottom: 2px solid #E6E9ED;
    margin: 0px -7px 0px;
    margin-bottom: 10px;
}
.khaki
{
  background-color: khaki;
  color: black;
}
.lightgrey
{
  background-color: lightgrey;
  color: black;

}
.lightyellow
{
  background-color: #f3a84ea6;
  color: black;

}
.lightgreen
{
  background-color: #ceeabf;
  color: black;

}
    </style>
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->

        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

  <?php $this->load->view('state/header.php'); ?>

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
                                        <h1>Student Community Details
                                          <!--  <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                          <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
                                             <li role="presentation">
                                            <a href="<?php echo base_url().'State/emis_state_home'?>">
                                              <span class="text">All Students</span><br/>
                                            </a>
                                          </li>
                                           <li role="presentation">
                                            <a href="<?php echo base_url().'State/emis_state_DEE'?>">
                                              <span class="text">Directorate Of Elementary Education</span><br/>
                                            </a>
                                          </li>
                                           <li role="presentation">
                                            <a href="<?php echo base_url().'State/emis_state_DSE'?>">
                                              <span class="text">Directorate Of School Education</span>
                                            </a>
                                          </li>
                                          <li role="presentation" class="next">
                                                                              <a href="<?php echo base_url().'State/emis_state_DMS'?>">
                                              <span class="text" >Directorate Of Matriculation School</a></span>
                                          </a>
                                          </li>
                                                </ul>
                                            </div>-->
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

                                     <div class="portlet-body">

                                          <div class="portlet light">
                                            <form action="<?php echo base_url().'State/stud_community_report_schl?community_name='.$community_name.'&blk='.$blk?>" method="POST">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-2" style=" width:6%; padding-top:5%;">

                                                            All <input type="checkbox" id="emis_state_report_schmanage"  value="all" name="school_manage">
                                                        </div>
                                                        <div class="col-md-8" >
                                                            
                                                              <div class="form-group" style="padding: 10px;padding-left: 8%">
                                                                <label class="control-label bold">
                                                                School Management</label><br/>
                                                                <?php //print_r($data['cate']); ?>
                                                                 <?php  foreach($getmanagecate as $det){ 

                                                                 ?>
                                                                 
            <input type="checkbox" name="school_manage[]" class="school_manage" id="emis_state_report_schmanage" autocomplete="off" <?php if($det->manage_name== $this->input->get('magt_type') && count($manage) == '0'){ 
                    echo ($det->manage_name== $this->input->get('magt_type') && count($manage) == '0'? 'checked' : '');
            }
            else  if($this->input->get('magt_type')=='' && count($manage) == '0')
            {
             echo ($det->manage_name== 'Government' && count($manage) == '0'? 'checked' : '');   
            } ?>  value="<?=$det->manage_name;?>"/><span class="label-text" ><?=$det->manage_name;?></span>&nbsp;
            
                                                                  <?php }  ?>
                                                            
                                                                <font style="color:#dd4b39;"><div id="emis_state_report_schcate_alert"></div></font>
                                                              </div>    
                                                              
                                                              <div style="padding: 4px;padding-left: 8%;margin-top: -2%;" class="form-group" style="padding: 10px;">
                                                                <label class="control-label bold">
                                                                 School Category </label>&nbsp;&nbsp;<input type="checkbox" id="select_all"/>Category All<br/>
                                                                <?php if(!empty($getsctype))
                                                                {
                                                                    foreach($getsctype as $school_type)
                                                                    {?>
                                                                
<input type="checkbox"  class="emis_state_report_schcate" name="school_cate[]" id="emis_state_report_schcate" autocomplete="off" value="<?=$school_type->category_name;?>" <?php echo (count($cate) == '0'? 'checked' : '');?>/><span class="label-text"><?=$school_type->category_name;?></span>

&nbsp;
                                                                <?php } ?>  <?php }?>
                                                              
                                                                <font style="color:#dd4b39;"><div id="emis_state_report_schcate_alert"></div></font>
                                                              </div>
                                                              </div>
                                                               <div class="col-md-1" >
                                                              <div class="form-group" style="padding: 10px;margin-top: 15px">
                                                                
                                                                <button type="submit" class="btn green btn-lg">Submit</button>
                                                              </div>
                                                              </div>
                                                      
                                                    </div>
                                                </div>
                                            </form>
                                              <?php if($manage!=""){ ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h5><b>Selected School Management :</b><?=implode(",",$manage);?> <b>Selected Categoty :</b>  <?=$cate!=''?implode(",",$cate):'';?></h5>
                                                        
                                                    </div>
                                                </div>
                                              <?php  }
$total1 = [];
                                               ?>
                                            </div>
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
														
                                                            <i class="fa fa-globe"></i>Students Community Details | Block -<?php echo ($this->input->get('blk')); ?> | community - (<?php echo $details[0]->community_name; ?>)<span> </span></div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                                      
                                                    
                         <table class="table table-striped table-bordered table-hover" id="sample_2">
														
                               <thead>
                                     <tr>
															
                                          <th class="center">S.No</th>
                                          <th class="center">School</th>
                                          <th class="center">PreKG</th>
                                          <th class="center">LKG</th>
                                          <th class="center">UKG</th>
                                          <th class="center">I</th>
                                          <th class="center">II</th>
																	        <th class="center">III</th>
																	        <th class="center">IV</th>
																	        <th class="center">V</th>
																	        <th class="center">VI</th>
																	        <th class="center">VII</th>
																          <th class="center">VIII</th>
																         	<th class="center">IX</th>
                                          <th class="center">X</th>
																          <th class="center">XI</th>
                                          <th class="center">XII</th>
                                          <th class="center">Total</th>
																        </tr>
                                </thead>
                         <tbody>
                         <?php
                                                            														
															if(!empty($details)){ $total1 = []; $prekg_t=[]; $lkg_t=[];  $ukg_t=[];  $c1=[];  $c2=[]; $c3=[];  $c4=[]; $c5=[];  $c6=[];  $c7=[];  $c8=[]; $c8_g=[]; $c9=[];  $c10=[];  $c11=[];  $c12=[];  $total=[]; foreach($details as $index=> $sd){  ?>

                              <tr>
                                  <td style="text-align: center"><?=$index+1;?></td>
																  <td><?= $sd->school_name ?></td>		
															 <td  style="text-align: center"><?= number_format($sd->prekg_t) ?></td>
                                  <td   style="text-align: center"><?= number_format($sd->lkg_t) ?></td>
                                  <td  style="text-align: center"><?= number_format($sd->ukg_t) ?></td>
                                  <td   style="text-align: center"><?= number_format($sd->c1) ?></td> 
                                  <td   style="text-align: center"><?= number_format($sd->c2) ?></td>
                                  <td   style="text-align: center"><?= number_format($sd->c3) ?></td> 
                                  <td   style="text-align: center"><?= number_format($sd->c4) ?></td>
                                  <td   style="text-align: center"><?= number_format($sd->c5) ?></td>
                                  <td   style="text-align: center"><?= number_format($sd->c6) ?></td> 
                                  <td   style="text-align: center"><?= number_format($sd->c7) ?></td>
                                  <td   style="text-align: center"><?= number_format($sd->c8) ?></td> 
                                  <td   style="text-align: center"><?= number_format($sd->c9) ?></td> 
                                  <td   style="text-align: center"><?= number_format($sd->c10) ?></td> 
                                  <td   style="text-align: center"><?= number_format($sd->c11) ?></td>
                                  <td   style="text-align: center"><?= number_format($sd->c12) ?></td>
                                  <td   style="text-align: center"><?= number_format($sd->total)?></td> 									
                              </tr>
                                    <?php  
                                      array_push($prekg_t,$sd->prekg_t);
                                      array_push($lkg_t,$sd->lkg_t);
                                      array_push($ukg_t,$sd->ukg_t);
                                      array_push($c1,$sd->c1);
                                      array_push($c2,$sd->c2);
                                      array_push($c3,$sd->c3);
                                      array_push($c4,$sd->c4);
                                      array_push($c5,$sd->c5);
                                      array_push($c6,$sd->c6);
                                      array_push($c7,$sd->c7);
                                      array_push($c8,$sd->c8);
                                      array_push($c9,$sd->c9);
                                      array_push($c10,$sd->c10);
                                      array_push($c11,$sd->c11);
                                      array_push($c12,$sd->c12);
                                       array_push($total,$sd->total);
                                     
                                      }  ?>
                                                                
                                                      
                                                            </tbody>
                                                         <tfoot>
                                                                <th  class="center">Total</th>
                                                              <th></th>
															                          	 <th style="text-align: center;" ><?php 
                                                            $prekg_t = array_sum($prekg_t);
                                                            array_push($total1,$prekg_t);
                                                            echo number_format($prekg_t);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $lkg_t = array_sum($lkg_t);
                                                            array_push($total1,$lkg_t);
                                                            echo number_format($lkg_t);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $ukg_t = array_sum($ukg_t);
                                                            array_push($total1,$ukg_t);
                                                            echo number_format($ukg_t);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c1 = array_sum($c1);
                                                            array_push($total1,$c1);
                                                            echo number_format($c1);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c2 = array_sum($c2);
                                                            array_push($total1,$c2);
                                                            echo number_format($c2);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c3 = array_sum($c3);
                                                            array_push($total1,$c3);
                                                            echo number_format($c3);?></th>
                                                            <th style="text-align: center;" ><?php 
                                                            $c4 = array_sum($c4);
                                                            array_push($total1,$c4);
                                                            echo number_format($c4);?></th>
                                                               <th style="text-align: center;" ><?php 
                                                            $c5 = array_sum($c5);
                                                            array_push($total1,$c5);
                                                            echo number_format($c5);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $c6= array_sum($c6);
                                                            array_push($total1,$c6);
                                                            echo number_format($c6);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c7 = array_sum($c7);
                                                            array_push($total1,$c7);
                                                            echo number_format($c7);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c8 = array_sum($c8);
                                                            array_push($total1,$c8);
                                                            echo number_format($c8);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c9 = array_sum($c9);
                                                            array_push($total1,$c9);
                                                            echo number_format($c9);?></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $c10 = array_sum($c10);
                                                            array_push($total1,$c10);
                                                            echo number_format($c10);?></th>
                                                            <th style="text-align: center;" ><?php 
                                                            $c11 = array_sum($c11);
                                                            array_push($total1,$c11);
                                                            echo number_format($c11);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $c12 = array_sum($c12);
                                                            array_push($total1,$c12);
                                                            echo number_format($c12);?></th>
                                                                 
                                                                 <th style="text-align: center;" ><?php 
                                                            $total = array_sum($total);
                                                            array_push($total1,$total);
                                                            echo number_format($total);?></th>
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
	
        </script>    <script type="text/javascript">

            function saveclassid(value){
                var baseurl='<?php echo base_url(); ?>';
                // alert(value);
                $.ajax({
                type: "POST",
                url:baseurl+'State/savedash_classidsession',
                data:"&class_id="+value,
                success: function(resp){ 
                if(resp==true){  
                window.location.href = baseurl+'State/emis_dash_district_count'; 
                return true;  
                 }else{
                    return false;
                 }
                 
                         
                 },
                error: function(e){ 
                alert('Error: ' + e.responseText);
                return false;  

                }
                });
               }
        </script>

         <script type="text/javascript">
              $(document).ready(function(){ 
  $("#emis_state_report_schcate").change(function(){ 

    var emis_state_report_schcate = $("#emis_state_report_schcate").val();

      // $.ajax({
      //   type: "POST",
      //   url:baseurl+'State/get_school_management_data',
      //   data:"&emis_state_report_schcate="+emis_state_report_schcate,
      //   success: function(resp){
      //   // alert(resp);  
      //   $("#emis_state_report_schmanage").html(resp);  
      //   return true;              
      //    },
      //   error: function(e){ 
      //   alert('Error: ' + e.responseText);
      //   return false;  
        
      //   }
      //   });

  });  }); 

 $(document).ready(function(){  // function call for validate company name 
    $("#emis_state_report_schcate").change(function(){
      return validatetext('emis_state_report_schcate','emis_state_report_schcate_alert'); 
});   });

// $(document).ready(function(){  // function call for validate company name 
//     $("#emis_state_report_schmanage").change(function(){
//       return validatetext('emis_state_report_schmanage','emis_state_report_schmanage_alert'); 
// });   });


function checkmanagecate(){

var baseurl='<?php echo base_url(); ?>';

var manage = validatetext('emis_state_report_schmanage','emis_state_report_schmanage_alert');
var cate = validatetext('emis_state_report_schcate','emis_state_report_schcate_alert'); 

var manage1=$("#emis_state_report_schmanage").val();
var cate1 = $("#emis_state_report_schcate").val();

if(manage == 0 ){
    return false;
}

  $.ajax({
        type: "POST",
        url:baseurl+'State/savereport_schoolcatemanage',
        data:"&cate="+cate1+"&manage="+manage1,
        success: function(resp){
        // alert(resp);  
        // location.reload(true);
        return true;              
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });
       
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


 </script>  


    </body>

</html>