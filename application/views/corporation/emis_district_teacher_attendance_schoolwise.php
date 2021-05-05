 
<?php 
// print_r($blockwise_schoolinfo);
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

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

  <?php $this->load->view('corporation/header.php'); ?>

            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <!-- BEGIN CONTAINER -->
                    <div class="page-container">
                        <!-- BEGIN CONTENT -->
                        <div class="page-content-wrapper">
                            <!-- BEGIN CONTENT BODY -->
                            <!-- BEGIN PAGE HEAD-->
                            <div class="page-head">
                                <div class="portlet light">
                                            <div class="col-md-offset-10 col-md-2">
                                             <button onclick="goBack()" class="btn green"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
                                         </div>
                                           <form action="<?php echo base_url().'State/get_attendance_search'?>" method="post">
                                                <div class="row">
                                                    
        <!-- <button type="submit" class="btn green btn-lg" >Submit</button> -->
                             </div>                           
                                                </div>
                            </div>
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">
                                <div></div> 
                                <div class="container">
                                    <!-- BEGIN PAGE CONTENT INNER -->
                            <div class="row">
                                            <div class="col-md-12">
                                                <a href="#">
                                            <div class="col-md-3">
                                                <div class="bs-callout-lightsteelblue dashboard-stat2">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h4 class="font-green-sharp">
                                                         <span class="bottom" data-counter="counterup" data-value="34">Total Staff</span></h4>
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

                                    <div class="page-content-inner">
                                     

                                       
           
                                        <!-- BEGIN CARDS -->
                                        <div class="portlet box green">
                                                    <div class="portlet-title col-md-12">
                                                        <div class="caption col-md-4">
                                                            <i class="fa fa-globe"></i> Staff Attendance | <?=$dist;?></div>
                                                            <div class="col-md-5" style=""><h4>Day Wise Attendance Report - <?=date('d-m-Y',strtotime($date));?></h4></div>
                                                        <div class="col-md-3 tools">  </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th class="center">UDISE Code</th> 
                                                                    <th class="">School Name </th>

                                                                      <?php if($dist =='ALL Blocks'){?>
                                                            <th>Block Name</th>
                                                        <?php } ?>
                                                                    <th class="center">Marked / Total Staff</th>
                                                                    <th class="center sum">Marked Present Staff</th>
                                                                    <th class="center sum">Marked Absent Staff</th>
                                                                    <!-- <th>Total Not Marked</th> -->
                                                                    
                                                                </tr>
                                                                </thead>
                                                            <tbody>
                                                               <?php 

 
                                                               if(!empty($teacher_details_schoolwise)){ 
                                                        $total_staffs = 0;
                                                        $total_marked = 0;
                                                        $total_presents = 0;
                                                        $total_absent = 0;

                                                                // print_r($student_details_schoolwise);
                                                               
                                                                foreach($teacher_details_schoolwise as $index=> $det){ 
                                                                        
                                                                    $total_staffs += $det->total_teacher;
                                                                    
                                                                    $total_presents += $det->present;
                                                                    $total_absent += $det->absent;
                                                                    $marked_teacher = ($det->present+$det->absent);
                                                                    $total_marked += $marked_teacher;

                                                                ?>
                                                                <tr class="center">
                                                                    <td><?=$index+1;?></td>
                                                                    <?php if($det->school_code !=-1){ ?>
                                                                    <td ><a href="<?=base_url().'corporation/get_attendance_teacher_classwise?school='.$det->school_id.'&date='.$date?>"><?=$det->udise_code?></a>
                                                                    </td>
                                                               <?php }else { ?>
                                                               <td ><?=$det->udise_code?>
                                                                    </td>
                                                                <?php } ?>
                                                                    <td style="text-align: left;color: <?=($det->school_code==-1?'red':'green');?>"><?=$det->school_name;?></td>
                                                                    <?php if($dist =='ALL Blocks'){?>
                                                            <td><?=$det->block_name;?></td>
                                                        <?php } ?>
                                                                    

                                                                    <td><b><?=$marked_teacher;?><b> / <?=$det->total_teacher;?></td>
                                                                    <td><b style="color: green;"><?=$det->present;?></b></td>
                                                                    <td><b style="color: red;"><?=$det->absent;?></b></td>
                                                                    
                                                                </tr>

                                                            <?php 

                                                            
                                                            // array_push($over_not_marked,$not_marked);
                                                        } 

                                                            // $total_section = array_sum($total_section);
                                                            // $total_section_marked = array_sum($total_section_marked);
                                                            // $total_students = array_sum($total_students);
                                                            // $total_students_marked = array_sum($total_students_marked);
                                                            // $total_marked_persent = array_sum($total_marked_persent);
                                                            // $total_marked_absent = array_sum($total_marked_absent);
                                                        ?>
                                                        
                                                   
                                                            </tbody>
                                                            <tfoot >
                                                                <tr>
                                                            <?php if($dist =='ALL Blocks'){?>
                                                    <th colspan="4" class="center">Total</th>
                                                           
                                                        <?php }else{ ?>
                                                    <th colspan="3" class="center">Total</th>

                                                        <?php } ?>
                                                            <th class="center"><?=$total_marked .' / '.$total_staffs;?></th>
                                                            <th class="center" style="color:green;"><?=$total_presents;?></th>
                                                            <th class="center" style="color: red;"><?=$total_absent;?></th>

                                                            
                                                           
                                                        </tr>
                                                            </tfoot> 
                                                            <?php } ?>
                                            </table>
                                                        
                                                    </div>
                                                </div>
                                            <!-- <div class="portlet light">
                                            
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div>Selected Teachers Name : <span id="teacher_count"></span><br/><span id="teacher_name"> </span></div>
                                                    </div>
                                                       <div class="col-md-3">
        <button type="sumbit" class="btn green btn-lg" >Submit</button>
                             </div>  
                                                      
                                                    
                                                </div> -->
                                           
                                              
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
    
        // $(".date").attr('readonly','true');
var baseurl='<?php echo base_url(); ?>';

});

$(document).ready(function(){  // function call for validate company name 
    

    var total_teacher_marked =<?php echo json_encode($total_staffs);?>;
            // var total_teacher = <?php echo json_encode($total_marked);?>;
            // alert(total_student);
            var tot_teacher = total_student;
                   total_teacher_marked =  total_teacher_marked.toLocaleString(undefined, {maximumFractionDigits:3});

            
            var total_present = <?php echo json_encode($total_presents);?>;
                   // console.log((total_student)*100);

            console.log(total_teacher);
            
            var tot_pre = total_present;
            total_present = Math.round(total_present).toLocaleString(undefined, {maximumFractionDigits:2});
            var total_absent = <?php echo json_encode($total_absent);?>;
            var total_teacher = tot_pre + total_absent;
            var total_percentage = "<span style='color:green;'> 0% <span >/<span style='color:red;'>0%</span>";
            if(total_teacher !=0){
            total_percentage = "<span style='color:green;'>"+Math.round((tot_pre/total_teacher)*100)+'%</span> / <span style="color:red;">'+Math.round((total_absent/total_teacher)*100)+'%</span>'
            };
            total_absent = total_absent.toLocaleString(undefined, {maximumFractionDigits:2});
                
                    // console.log(total_percentage);
           $("#total_student").text(total_teacher_marked);

           $("#total_present").text(total_present);
           // $("#progress").html(total_present_progess);
           $("#total_absent").text(total_absent);
           $("#total_perncentage").html(total_percentage);


     });


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
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
             var date = new Date();
var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());
$('.date').datepicker({
    multidate: true,
    
   

});

$('.date').datepicker('setStartDate', "21-01-2019");
$('.date').datepicker('setEndDate',"31-01-2019");



// $('.date').datepicker('setDate',end);


        </script>

        <script type="text/javascript">
    $(document).ready(function()
{
    sum_dataTable('#sample_3');
    sum_dataTable('#sample_4');
});

function sum_dataTable(dataId){
    var table = $(dataId).DataTable({
      dom: 'Blfrtip',
      order: [[0, "asc"]],
            lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            pageLength: 10,
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