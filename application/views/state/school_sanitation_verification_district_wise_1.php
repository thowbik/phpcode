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
                                        <h1>Report
                                        
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
      
                                    <div class="page-content-inner">

                                     <div class="portlet-body">

                                         <div class="portlet light">
                                            <form action="<?php echo base_url().'State/school_sanitation_verification_district_wise_1'?>" method="POST">
                                                <div class="row">
                                                    <div class=" col-md-12">
                                                        <div class="col-md-2" style="width:6%;padding-top:5%;">

                                                            All <input type="checkbox" id="emis_state_report_schmanage"  value="all" name="school_manage">
                                                        </div>
                                                        <div class="col-md-offset-1 col-md-3" >
                                                            
                                                              <div class="form-group" id="list" style="padding: 10px;padding-left: 8%">
                                                                <label class="control-label bold">
                                                                School Management</label><br/>
                                                                <?php //print_r($data['cate']); ?>
                                                                 <?php  foreach($getmanagecate as $det){ 

                                                                 ?>
                                                                 
            <input type="checkbox" name="school_manage[]" class="school_manage" id="emis_state_report_schmanage" autocomplete="off" <?php 
            
             echo ($det->manage_name== 'Government' && count($manage) == '0'? 'checked' : '');   
            ?>  value="<?=$det->manage_name;?>"/>&nbsp;<span class="label-text" ><?=$det->manage_name;?></span><br/>
            
                                                                  <?php }  ?>
                                                            
                                                                <font style="color:#dd4b39;"><div id="emis_state_report_schcate_alert"></div></font>
                                                              </div> 
                                                              </div>
                                                              <div class="col-md-3">   
                                                              
                                                              <div style="padding: 4px;padding-left: 8%; class="form-group" style="padding: 10px;" id="cate">
                                                                <label class="control-label bold">
                                                                 School Category </label>&nbsp;&nbsp;<input type="checkbox" id="select_all"/>Category All

                                                                <?php if(!empty($getsctype))
                                                                {
                                                                    foreach($getsctype as $school_type)
                                                                    {?>
                                                                
<input type="checkbox"  class="emis_state_report_schcate" name="school_cate[]" id="emis_state_report_schcate" autocomplete="off" value="<?=$school_type->category_name;?>" <?php echo (count($cate) == '0'? 'checked' : '');?>/>&nbsp;<span class="label-text"><?=$school_type->category_name;?></span><br/>

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
                                              <?php 
                                                $sch_filter = array(
                                                  array('id'=>'toil_bys_inuse','value'=>'Total Boys Toilets'),
                                                  array('id'=>'toil_inuse_grls','value'=>'Total Girls Toilets'),
                                                  array('id'=>'urinls_notuse_bys','value'=>'Non Functional Boys Toilets'),
                                                  array('id'=>'toil_notuse_grls','value'=>'Non Functional Girls Toilets'),
                                                  array('id'=>5,'value'=>'Boys Toilet Ratio'),
                                                  array('id'=>6,'value'=>'Girls Toilet Ratio'),
                                                  array('id'=>'total_b','value'=>'Total Boys'),
                                                  array('id'=>'total_g','value'=>'Total Girls'),
                                                  array('id'=>'total','value'=>'Total Students')
                                                 
                                              );
                                              ?>
                                                <div class="row">
                                                  <div class="col-md-offset-1 col-md-3">
                                                    
                                                      <select class="form-control" name="school_toilet" id="school_toilet" >
                                                        <option value="">Select</option>
                                                        <?php foreach($sch_filter as $sch)
                                                        {?>
                                                          <option value="<?=$sch['id'];?>" <?=$school_toilet == $sch['id'] ? ' selected="selected"' : '';?>><?=$sch['value'];?></option>
                                                        <?php }?>
                                                      </select>
                                                    
                                                  </div>
                                                  <div class="col-md-3">
                                                    
                                                      <select class="form-control" name="school_comp" id="school_comp" >
                                                        <option value="">Select</option>
                                                        <option value="1">More Than</option>
                                                        <option value="2">Equal To</option>
                                                        <option value="3">Less Than</option>
                                                        
                                                      </select>
                                                    
                                                  </div>
                                                  <div class="col-md-3">
                                                    
                                                      <input type="text" class="form-control" name="school_ratio" id="school_ratio" placeholder="school Ratio" value="<?=$school_ratio;?>">
                                                    
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
                                                             <i class="fa fa-globe"></i>School WASH Details - Verification Report</div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">

                                                       <?php $c1_tot=0;$c2_tot=0;$c3_tot=0;$c4_tot=0;$c5_tot=0;$c6_tot=0;$c7_tot=0;$c8_tot=0;$c9_tot=0;$c10_tot=0;$c11_tot=0;$c12_tot=0; ?>
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                                                            <thead>
                                                                <tr>
                                                                    <th >S.No</th>
                                                                    <th>District Name</th> 

                                                                    <th style="text-align: center;">Total School Count</th>
                                                                     <th style="text-align: center;">Boys Toilets<br/> in use</th>
                                                                      <th style="text-align: center;">Boys<br/> Toilets<br/> Ratio</th>
                                                                    <th style="text-align: center;">Boys Toilets<br/>Not in use</th>
                                                                    <th style="text-align: center;">Girls Toilets<br/> in use</th>
                                                                     <th style="text-align: center;">Girls<br/> Toilets<br/> Ratio</th>
                                                                    <th style="text-align: center;">Girls Toilets<br/>Not in use</th>
                                                                    
                                                                 
                                                                  
                                                                    <!--<th>Verified</th>-->

                                                                </tr>
                                                                </thead>
                                                               
                                                                 
                                                            <?php if(!empty($school_land_verification)){
                                                           $total1 = []; $tot=[]; $std_count=[]; $toil_notuse_bys=[]; $toil_bys_inuse=[]; $toil_inuse_grls=[]; $toil_notuse_grls=[]; 
                                                            $total_b = [];$total_g = [];
                                                           $i=1;  foreach($school_land_verification as $det){ 
                                                              
                                                             ?>

                                                                <tr>
                                                                    <td><?php echo $i;?></td>
                                                                    <td ><a href="<?php echo base_url().'State/school_sanitation_verification_block_wise_1/?dist_id='.$det->district_id?>"><?=$det->district_name;?></a></td>
                                                                   <!---->
                                                                    <td style="text-align: center;"><?= number_format($det->std_count);?></td>
                                                                     <td style="text-align: center;"><?= number_format($det->toil_bys_inuse);?></td>



                                                                     <td style="text-align: center;"><?php 
                                                                     $bys_toil_tot = $det->toil_bys_inuse+$det->toil_notuse_bys;

                                                                     echo ($bys_toil_tot!=0?number_format(($det->total_b)/($bys_toil_tot),3):'NA');?></td>
                                                                     <td style="text-align: center;"><?= number_format($det->toil_notuse_bys);?></td>
                                                                      <td style="text-align: center;"><?php 
                                                                      echo 
                                                                      number_format($det->toil_inuse_grls);?></td>

                                                                      <td style="text-align: center;"><?php
                                                                      $girls_toil_tot = $det->toil_inuse_grls+$det->toil_notuse_grls;
                                                                      
                                                                      echo ($girls_toil_tot !=0? number_format(($det->total_g)/($girls_toil_tot),3):'NA');?></td>
                                                                      <td style="text-align: center;"><?= number_format($det->toil_notuse_grls);?></td>
                                                                       
                                                                      
                                                                    
                                                                  <!--  <td style="text-align: center;"><input type="checkbox" name=""></td>-->
                                                                  
                                                                    
                                                                </tr>
                                                                <?php $i++;?>
                                                                  <?php 
                                                                  array_push($std_count,$det->std_count);
                                                                  array_push($toil_notuse_bys,$det->toil_notuse_bys);
                                                                  array_push($toil_notuse_grls,$det->toil_notuse_grls);
                                                                   array_push($total_b,$det->total_b);
                                                                  array_push($total_g,$det->total_g);
                                                                  array_push($toil_bys_inuse,$det->toil_bys_inuse);
                                                                  array_push($toil_inuse_grls,$det->toil_inuse_grls);
                                                           
                                                        } ?>
                                                             
                                                       
                                                            </tbody>
                                                            <tfoot>
                                                              <th></th>
                                                              <th></th>
                                                                 <th style="text-align: center;" ><?php 
                                                            $std_count = array_sum($std_count);
                                                            array_push($total1,$std_count);
                                                            echo number_format($std_count);?></th>

                                                             <th style="text-align: center;" ><?php 
                                                            $toil_bys_inuse = array_sum($toil_bys_inuse);
                                                            array_push($total1,$toil_bys_inuse);
                                                            echo number_format($toil_bys_inuse);?></th>
                                                              <th>
                                                                <?php

                                                              // $toil_bys_inuse = array_sum($toil_bys_inuse);
                                                              $toil_notuse_bys = array_sum($toil_notuse_bys);
                                                              $total_b = array_sum($total_b);

                                                              if(($toil_bys_inuse+$toil_notuse_bys)!=0){
                                                                 echo number_format(($total_b)/($toil_bys_inuse+$toil_notuse_bys),1); 
                                                                }
                                                                else
                                                                {
                                                                  echo 0;
                                                                }
                                                               ?>
                                                              </th>
                                                             <th style="text-align: center;" ><?php 
                                                            // $toil_notuse_bys = array_sum($toil_notuse_bys);
                                                            array_push($total1,$toil_notuse_bys);
                                                            echo number_format($toil_notuse_bys);?></th>
                                                             <th style="text-align: center;" ><?php 
                                                            $toil_inuse_grls = array_sum($toil_inuse_grls);
                                                            array_push($total1,$toil_inuse_grls);
                                                            echo number_format($toil_inuse_grls);?></th>
                                                            <th>
                                                              
                                                              <?php 
                                                         // $toil_inuse_grls = array_sum($toil_inuse_grls);
                                                            array_push($total1,$toil_inuse_grls);
                                                         $toil_notuse_grls = array_sum($toil_notuse_grls);
                                                         $total_g = array_sum($total_g);
                                                            array_push($total1,$toil_notuse_grls);
                                                            echo number_format(($total_g)/($toil_inuse_grls+$toil_notuse_grls),1); 
                                                            ?>
                                                            </th>
                                                             <th style="text-align: center;" ><?php 
                                                            // $toil_notuse_grls = array_sum($toil_notuse_grls);
                                                            array_push($total1,$toil_notuse_grls);
                                                            echo number_format($toil_notuse_grls);?></th>
                                                               
                                                            </tfoot> 
                                                              <?php } ?>
                                            </table>
                           
                                    <!-- END PAGE TITLE -->
                                    <!-- BEGIN PAGE TOOLBAR -->
                                    <div class="page-toolbar">
                                        <!-- BEGIN THEME PANEL -->
                           
                                        <!-- END THEME PANEL -->
                                    </div>
                                    <!-- END PAGE TOOLBAR -->
                                </div>
                            </div>
                            </div>
                                                        
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

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
             <script type="text/javascript">

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
$(document).ready(function()
{
    sum_dataTable('#sample_3');

    var school_comp = <?=json_encode($school_comp);?>;
    var manage = <?=json_encode($manage)?>;
    var cate = <?=json_encode($cate)?>;
    if(school_comp!='')
    {
        $("#school_comp").val(school_comp).attr('selected','selected');
    }

    if(manage)
    {
      $("#list").find('[value="' + manage.join('"], [value="') + '"]').prop("checked", true);
    }

    if(cate)
    {
      $("#cate").find('[value="' + cate.join('"], [value="') + '"]').prop("checked", true)
    }
    // console.log("[value="' +"' + manage.join('], [value="') + '"]');
});

function sum_dataTable(dataId){
 var table = $(dataId).DataTable({
      dom: 'Blfrtip',
      "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

      order: [[0, "asc"]],
            lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            pageLength: -1,
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
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