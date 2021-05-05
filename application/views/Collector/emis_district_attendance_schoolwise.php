
<?php 

// if(!empty($this->input->get()))
// {
//     $dist = $this->input->get('block');
// }
?>
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
</style>
<link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
<?php $this->load->view('head.php'); ?>
<!-- BEGIN PAGE LEVEL PLUGINS -->

<link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />

<!-- END PAGE LEVEL STYLES -->

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
                    <iv class="page-head">
                        
                    <div class="page-content">
                        <div></div> 
                        <div class="container">
                            <!-- BEGIN PAGE CONTENT INNER -->
                  

                            <div class="page-content-inner">

                             <div class="portlet-body">

                                  <div class="portlet light">
                                   
                                        <div class="row">
                                            <div class="page-head">
                               <div class="container">
                                    <!-- BEGIN PAGE TITLE -->
                                      <div class="row">
                                       <div class="col-md-offset-10 col-md-2">
                                    <div class="page-title">
                                             <button onclick="goBack()" class="btn green"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
                                         </div>
                                     </div>
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
<!-- <button type="submit" class="btn green btn-lg" >Submit</button> -->
                     </div>                           
                                        </div>
                                    
                                      
                                    </div>
                               
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="#">
                                    <div class="col-md-3">
                                        <div class="bs-callout-lightsteelblue dashboard-stat2">
                                            <div class="display">
                                                <div class="number">
                                                    <h4 class="font-green-sharp">
                                                 <span class="bottom" data-counter="counterup" data-value="34">Total Students</span></h4>
                                                   <h4 id="total_student">0</h4>
                                                </div>
                                                <div class="icon" style="margin-top:9%">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </a>
                                        
                                     <a href="#">
                                    <div class="col-md-3">
                                        <div class="bs-callout-lightsteelblue dashboard-stat2">
                                            <div class="display">
                                                <div class="number">
                                                    <h4 class="font-green-sharp">
                                                 <span class="bottom" data-counter="counterup" data-value="34">Total Absent</span></h4>
                                                   <h4 id="total_absent">0</h4>
                                                </div>
                                                <div class="icon" style="margin-top:9%">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div></a>

                                    <a  href="#">
                                    <div class="col-md-3">
                                        <div class="bs-callout-lightsteelblue dashboard-stat2">
                                            <div class="display">
                                                <div class="number">
                                                    <h4 class="font-green-sharp">
                                                 <span class="bottom" data-counter="counterup" data-value="34">Total Present</span></h4>
                                                   <h4 id="total_present">0</h4>

                                                   
                                                </div>
                                                <div class="icon" style="margin-top:9%">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div></a>

                                    <a  href="#">
                                    <div class="col-md-3">
                                        <div class="bs-callout-lightsteelblue dashboard-stat2">
                                            <div class="display">
                                                <div class="number">
                                                    <h4 class="font-green-sharp">
                                                 <span class="bottom" data-counter="counterup" data-value="34">Total Percentage</span></h4>
                                                   <h4 id="total_perncentage">0</h4>

                                                   
                                                </div>
                                                <div class="icon" style="margin-top:9%">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div></a>
                                     
                                    </div>
                                </div>
                            <!-- <?php echo $dist;?> -->
                                        <div class="portlet box green">
                                            <div class="portlet-title col-md-12">
                                                <div class="caption col-md-4">
                                                    <i class="fa fa-globe"></i> Student Attendance | <?=$dist;?></div>
                                                    <div class="col-md-5" style=""><h4>Day Wise Attendance Report - <?=date('d-m-Y',strtotime($date));?></h4></div>
                                                <div class="col-md-3 tools">  </div>
                                                
                                            </div>
                                            <div class="portlet-body">
                                            
                                                <table class="table table-striped table-bordered table-hover" id="sample_3">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th class="center">UDISE Code</th> 
                                                            <th class="">School Name </th>
                                                            <?php if($dist =='ALL Blocks'){?>
                                                            <th>Block Name</th>
                                                        <?php } ?>
                                                            <th class="center">Marked / Total Section </th>
                                                            <th class="center">Total Students</th>
                                                            <th class="center">Marked Present</th>
                                                            <th class="center">Marked Absent </th>
                                                            <!-- <th>Total Not Marked</th> -->
                                                            
                                                        </tr>
                                                        </thead>
                                                    <tbody>
                                                       <?php 

$total_section = []; $total_section_marked = []; $total_students = []; $total_students_marked=[];
$total_marked_persent = []; $total_marked_absent = [];
                                                       if(!empty($student_details_schoolwise)){ 
                                                        // print_r($student_details_schoolwise);
                                                       
                                                        foreach($student_details_schoolwise as $index=> $det){ 
                                                                
                                                            array_push($total_section,$det->section_nos);
                                                            array_push($total_section_marked, $det->marked_section);
                                                            array_push($total_students,$det->today_total_student);
                                                            array_push($total_students_marked,$det->total_persent);
                                                            array_push($total_marked_persent,$det->today_present);
                                                            array_push($total_marked_absent,$det->today_absent);
                                                        ?>
                                                        <tr class="center">
                                                            <td><?=$index+1;?></td>
                                                            <td ><a href="<?=base_url().'Collector/get_attendance_classwise_details?school='.$det->school_id.'&date='.$date?>"><?=$det->udise_code?>
                                                            </td>
                                                            <td style="text-align: left;"><?=$det->school_name;?></td>
                                                            <?php if($dist =='ALL Blocks'){?>
                                                                <td><?=$det->block_name;?></td>
                                                            <?php } ?>
                                                            <td><b style="color:<?=($det->marked_section == $det->section_nos)?'green':'red'?>"><?=$det->marked_section;?></b>&nbsp;&nbsp;/&nbsp;&nbsp;<b style="color: green;"><?=$det->section_nos;?></b></td>
                                                            

                                                            <td><b><?=$det->total_persent;?><b> / <?=$det->today_total_student;?></td>
                                                            <td><b style="color: green;"><?=$det->today_present;?></b></td>
                                                            <td><b style="color: red;"><?=$det->today_absent;?></b></td>
                                                            
                                                        </tr>

                                                    <?php 

                                                    
                                                    // array_push($over_not_marked,$not_marked);
                                                } 
                                                // echo sizeof($total_section_marked);
                                                    $total_section = array_sum($total_section);
                                                    $total_section_marked = array_sum($total_section_marked);
                                                    $total_students = array_sum($total_students);
                                                    $total_students_marked = array_sum($total_students_marked);
                                                    $total_marked_persent = array_sum($total_marked_persent);
                                                    $total_marked_absent = array_sum($total_marked_absent);
                                                ?>
                                                
                                           
                                                    </tbody>
                                                    <tfoot >
                                                        <tr>
                                                            <?php if($dist =='ALL Blocks'){?>
                                                    <th colspan="4" class="center">Total</th>
                                                <?php }else{ ?>
                                                    <th colspan="3" class="center">Total</th>
                                                <?php } ?>
                                                    <th class="center"><?=number_format($total_section_marked);?> / <?=number_format($total_section);?></th>
                                                    <th class="center"><?=number_format($total_students_marked)?> / <?=number_format($total_students);?></th>
                                                    <th class="center"><?=number_format($total_marked_persent);?></th>
                                                   <th class="center"   ><?=number_format($total_marked_absent);?></th>
                                                    

                                                </tr>
                                                    </tfoot> 
                                                    <?php } ?>
                                    </table>
                                                
                                            </div>
                                        </div>
                                        <!-- END EXAMPLE TABLE PORTLET-->           

                                            </div>
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

$(document).ready(function(){
    $.fn.datepicker.defaults.format = "dd-mm-yyyy";
    var total_students_marked =<?php echo json_encode($total_students);?>;
    var total_student = <?php echo json_encode($total_students_marked);?>;
    // alert(total_student);
    var tot_stu = total_student;
           total_students_marked =  total_students_marked.toLocaleString(undefined, {maximumFractionDigits:3});

    
    var total_present = <?php echo json_encode($total_marked_persent);?>;
           // console.log((total_student)*100);

    // console.log(total_present);
    
    var tot_pre = total_present;
    total_present = Math.round(total_present).toLocaleString(undefined, {maximumFractionDigits:2});
    var total_absent = <?php echo json_encode($total_marked_absent);?>;
    var total_percentage = "<span style='color:green;'> 0% <span >/<span style='color:red;'>0%</span>";
    if(total_student !=0){
    total_percentage = "<span style='color:green;'>"+Math.round((tot_pre/tot_stu)*100)+'%</span> / <span style="color:red;">'+Math.round((total_absent/tot_stu)*100)+'%</span>'
    };
    total_absent = total_absent.toLocaleString(undefined, {maximumFractionDigits:2});
        var total_present_progess = "<div class='progress'><div class='progress-bar-success' role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100' style='width:"+total_present+"%'>"+total_present+"%</div></div>";
            // console.log(total_percentage);
   $("#total_student").text(total_students_marked);

   $("#total_present").text(total_present);
   $("#progress").html(total_present_progess);
   $("#total_absent").text(total_absent);
   $("#total_perncentage").html(total_percentage);



$(document).on('click','.datepicker',function(){
// startDate: '-3d',
$(this).bootstrapDP({
      container: '#mydatepicker-custom-position'
    }).bootstrapDP( "show");


}); 
// $(".datepicker").val(new Date());
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
<script type="text/javascript">
    $(document).ready(function()
{
    sum_dataTable('#sample_3');
    
});

function sum_dataTable(dataId){
    var table = $(dataId).DataTable({
      dom: 'Blfrtip',
      order: [[0, "asc"]],
            lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            pageLength: 20,
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
        buttons: [
            'colvis'
        ],
        buttons: [
                { extend: 'print', className: 'btn default' },
                { extend: 'pdf', className: 'btn default' },
                { extend: 'csv', className: 'btn default' },
    //             {
    //     extend: 'colvis',
       
    //     className: 'btn default',
    //     columnText: function ( dt, idx, title ) {

    //         return (idx+1)+': '+title;
    //     }
    // }
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
               
            sum = sum.toLocaleString(undefined, {maximumFractionDigits:3});
            $(column.footer()).html(sum);
                        });
            }
        });
    // table.column(0).visible(false);
    }
</script>
<script>
function goBack() {
  window.history.back();
}
</script>


</body>

</html>