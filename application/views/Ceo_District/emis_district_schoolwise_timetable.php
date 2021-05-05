
<html>

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
.portlet.light .dataTables_wrapper .dt-buttons {
    margin-top: -32px!important;
}

.progress-bar {
    float: left;
    width: 0;
    height: 100%;
    font-size: 12px;
    line-height: 15px!important;
    color: #fff;
    text-align: center;
    background-color: #337ab7;
    -webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.15);
    box-shadow: inset 0 -1px 0 rgba(0,0,0,.15);
    -webkit-transition: width .6s ease;
    -o-transition: width .6s ease;
    transition: width .6s ease;
}
.progress
{
    height: 14px!important;
    margin-bottom:0px!important;

    text-indent:0px !important;
}
.progress-bar-success
{
    background-color:#5cb85c!important;
}
.center 
{
text-align: center;
}

.color-box-green
{
    
    cursor: pointer;
    width: 29px;
    height: 11px;
    border-radius: 3px;


}
div.dt-button-collection>a.dt-button>span
{
    color: red!important;
}
div.dt-button-collection>a.dt-button.active>span {
    color: green!important;
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
                                           <h1>Master Timetable Completion Status Report</h1>
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
                                            <form action="<?php echo base_url().'Ceo_District/schoolwise_class_timetable_report?dist_id='.$school_timetable_details[0]->district_id?>" method="POST">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                       
                                                        <div class="col-md-8" >
                                                         
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
                                              <?php if($cate!=""){ ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h5> <b>Selected Category :</b>  <?=$cate!=''?implode(",",$cate):'';?></h5>
                                                        
                                                    </div>
                                                </div>
                                              <?php  }
$total1 = [];
                                               ?>
                                            </div>
                                        <div class="row margin-bottom-20">
                                             <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                        <?php 
                                                        foreach($school_timetable_details as $sd)
                                                        {
                                                            
                                                        }
                                                        ?>
                                                            <i class="fa fa-globe"></i>Timetable  | District - <?php echo $sd->district_name; ?> | date : <?php echo $this_week_fst;?> to <?php echo $this_week_ed;?><span> </span></div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                                      
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center">S.No</th>
                                                                    <th>Block</th>
                                                                    <th class="center">Udise Code</th>
                                                                    <th class=" ">School Name</th>
                                                                    <th class="sum center">Total Sections</th>
                                                                    <th class="sum center">Assigned Sections</th>
                                                                                                      <th class="sum center">Not Assigned Sections</th>
                                                                    <th class=" center">Status</th>
                                                                    
                                                                </tr>
                                                                </thead>
                                                               <tbody>
                                                            <?php if(!empty($school_timetable_details)){ $total1 = 0; foreach($school_timetable_details as $index=> $sd){   ?>

                                                                <tr>
                                                                   <td class="center"><?=$index+1;?></td>
                                                                   <td><?php echo $sd->block_name ?></td>
                                                                   <td class="center"><?=$sd->udise_code;?></td>
                                                                   <td> <a href="<?php echo base_url().'Ceo_District/school_class_section_timetable?schoolid='.$sd->school_id?>&schoolname=<?php echo $sd->school_name ?>"><?=$sd->school_name;?></a></td>
                                                                   <td class="center"><?=$sd->totalclasssection?></td>
                                                                   <td class="center"><?=$sd->OUTPUT?></td>
                                                                   <td class="center"><?=$unmarked=$sd->totalclasssection-$sd->OUTPUT?></td>
                                                                    <td class="center">
                                                                                <?php 
                                                                                    $marked_school = round(($sd->OUTPUT/$sd->totalclasssection)*100);
                                                                                ?>
                                                                                <div class="progress">
    <div class="progress-bar progress-bar-success" role="progressbar" style="width:<?=$marked_school.'%'?>">
      <?=$marked_school.'%';?>
    </div>
    <div class="progress-bar progress-bar-danger" role="progressbar" style="width:<?=(100-$marked_school).'%'?>">
      <?=(100-$marked_school).'%'?>
    </div>
    
  </div>
                                                                            </td>
                                                                  
                                                                </tr>
                                                                <?php  }  ?>
                                                                
                                                      
                                                            </tbody>
                                                            <tfoot>
                                                                <th colspan="2" class="center">Total</th>
                                                                 <th class="center"></th>
                                                                <th class="center"></th>
                                                                <th class="center"></th>
                                                                <th class="center"></th>
                                                                <th class="center"></th>
                                                                <th class="center"></th>


                                                            </tfoot>
                                                            <?php } ?>
                                                        </table>
<div class="row">
                                                                  <div class="col-md-offset-4 col-md-2">
                                                            <div class="color-box-green" style="background-color:#5cb85c;" data-hex="#CD5C5C" data-rgb="205, 92, 92" data-hsl="0, 53%, 58%"></div>Timetable Marked 
                                                        </div>
                                                        
                                                        <div class="col-md-2">
                                                            <div class="color-box-green" style="background-color:#ed6b75;" data-hex="#CD5C5C" data-rgb="205, 92, 92" data-hsl="0, 53%, 58%"></div> Timetable Not Marked 
                                                        </div>

                                <!---------Table End----->
                               </div>
                                                        
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