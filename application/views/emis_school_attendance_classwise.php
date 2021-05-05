
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
                            <!-- <div class="page-head">
                                <div class="page-head">

                                <div class="container">

                                     BEGIN PAGE TITLE -->
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
                                                            <i class="fa fa-globe"></i> Attendance By Class | School Name -   <?=$school_details->school_name;?> - &nbsp;<?=$date;?><span></span> </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                                        
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                                                            <thead>
                                                                <tr>
                                                                    
                                                                    <th class="center">S.No</th>
                                                                    <th class="center">Class</th>
                                                                    <th class="center">Total</th>
                                                                    <th class="sum center">Boys Present</th>
                                                                    <th class="sum center">Girls Present</th>

                                                                    <th class="sum center">Boys Absent</th>
                                                                    <th class="sum center">Girls Absent</th>


                                                                </tr>
                                                                </thead>
                                                               <tbody>
                                                            <?php if(!empty($classwise_details)){ 

                                                                $class_roma = array
                                                            ('I'=>1,'II'=>'2','III'=>'3','IV'=>'4','V'=>'5','VI'=>'6','VII'=>'7','VIII'=>'8','IX'=>'9','X'=>'10','XI'=>'11','XII'=>'12','LKG'=>'13','UKG'=>'14','PreKG'=>'15');

                                                            $class_no = Common::get_classwise_order();
                                                            // print_r($class_no);
                                                            
                                                           // echo $class_roman_no;
       
                                                    
                            
                             
                                                                $index =1;
                                                                $total_students = 0;
                                                                $present_students = 0;
                                                                 foreach($classwise_details as  $det){   
                                                                    // if($det['class'] !=13 && $det['class'] !=14 && $det['class'] !=15){
                                                                    $class_name = array_search($det['class'],$class_roma);

                                                                    $present = $det['present'];
                                                                    $absent = $det['absent'];
                                                                    $tot_stu = $present+$absent;
                                                                    $total_students +=$det['total_class'];
                                                                    $present_students +=$tot_stu;
                                                                    $class_roman_no = array_search($det['class'],$class_no);
                                                                    ?>

                                                                <tr>
                                                                    
                                                                    <td class="center"><?=$class_roman_no;?></td>
                                                                    <td class="details-control"><a href="javascript:void(0)" >

                                                                    <?=$class_name;?></a>
                                                                    <input type="hidden" id="class<?=$index;?>" value="<?=$det['class']?>">
                                                                </td>
                                                                
                                                                   <td class="center">
                                                                    <b style="color:<?=($tot_stu >= $det['total_class'])?'green':'red'?>"><?=$tot_stu;?></b> / <b style="color: green;"><?=$det['total_class'];?></b></td>
                                                                   <td class="center" style="color:blue;"><?=$det['male_present']?></td>
                                                                   <td class="center" style="color:deeppink;"><?=$det['female_present']?></td>

                                                                   <td class="center" style="color:red;"><?=$det['male_absent'];?></td>
                                                                   <td class="center" style="color:red;"><?=$det['female_absent'];?></td>
                                                                   

                                                                </tr>
                                                                <?php  $index++;} ?>
                                                                
                                                      
                                                            </tbody>
                                                            <tfoot>
                                                                <th colspan="2" class="center">
                                                                Total</th>
                                                                <th class="center"><?=$present_students?> / <?=$total_students;?></th>
                                                                <th class="center"></th>
                                                                <th class="center"></th>
                                                                <th class="center"></th>
                                                                <th class="center"></th>

                                                            </tfoot>
                                                        <?php }?>
                                                        </table>
                                                            <div id="msg"></div>

                                                        
                                                        </div>
  
                                                    </div>

                                                </div>

                                                <!-- END EXAMPLE TABLE PORTLET-->           

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
        <script>
            var table ='';
            $(document).ready(function()
{
    table = sum_dataTable('#sample_3');



$('#sample_3').on('click', 'td.details-control', function () {
       var tr = $(this).closest('tr');
       var row = window.table.row(tr);
       var rowid = window.table.row(tr).index();
    // need to get row data here somehow
       // var rowId = ?????;
       // console.log(row.child);
       var class_id = $(tr).find('td:eq(1)').find('input').val();
       if (row.child.isShown()) {
           // This row is already open - close it
           row.child.hide();
           // tr.addClass('fa fa-plus');
           tr.removeClass('shown');
       } else {
           // Open this row
           format(row.child,rowid,class_id);
           // tr.addClass('fa fa-minus');

           tr.addClass('shown');
       }
   });
   function format(callback, id,class_id) {
        
    
if($.fn.dataTable.isDataTable('#d')){
           $('#d').DataTable().clear().destroy();


                   }
    var  thead= '',tbody='';
   
        var data = {'class_id':class_id};

             

       $.ajax({
           method:"POST",
           url: '<?=base_url()."Home/emis_attendance_sectionwise_details"?>',
           data:data,
           dataType: "JSON",
           success: function (response) {
            console.log(response);
          
               // var data = JSON.parse(response.responseText);
               var thead = '', tbody = '',tfoot='';
                   thead += '<thead><tr>'
                   // thead += '<th class="center">S.No </th>';
                   thead += '<th class="center">Section</th>';
                   thead += '<th class="center">Total</th>';

                   thead += '<th class="center">Boys Present</th>';
                   thead += '<th class="center">Girs Present</th>';
                   thead += '<th class="center">Boys Absent</th>';
                   thead += '<th class="center">Girls Absent</th>';
                   

                   thead += '</tr>';
 var type ='';
               $.each(response, function (i, d) {
                i = i+1;
                
                var total = +d.present + +d.absent;
                // console.log(type);
                tbody +='<tbody><tr>';
                tbody +='<td class="center" style="width:90px;"></td><td style="width:75px;">'+d.st_section+'</td><td class="center" style="width:149px;">'+total+'<td class="center" style="color:blue;width:189px;">'+d.male_present+'</td><td class="center" style="color:deeppink;width:187px;">'+d.female_present+'</td><td class="center" style="color:red;">'+d.male_Absent+'</td><td class="center" style="color:red;">'+d.female_Absent+'</td>';
                tbody +='</tr></tbody>';

                                 });
               tfoot +='<tfoot><tr>';
               // tfoot +='<td colspan="2">Total</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>';
               tfoot +='</tr>';
               callback($('<table id="a" style="background-color:gray;" class="table table-condensed table-bordered">'  + tbody + +'</table>')).show();
       sum_dataTable("#d",0);

           },
           error: function () {
               $('#output').html('Bummer: there was an error!');
           }
           
       });
   }
});
function sum_dataTable(dataId,id=1){
    if(id==1){
    var table = $(dataId).DataTable({
      dom: 'Blfrtip',
      
        buttons: [
                { extend: 'print', className: 'btn default' },
                { extend: 'pdf', className: 'btn default' },
                { extend: 'csv', className: 'btn default' }
            ],
        
            columnDefs: [ {
"targets": 1,
"orderable": false
} ],
            order: [[0, "asc"]],
            lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            pageLength: -1,
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
                // console.log(a);
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
    
    }else
    {
        var table = $(dataId).DataTable({
      dom: 'Blfrtip',
      
        buttons: [],
        
            columnDefs: [ {
"targets": 1,
"orderable": false
} ],
            order: [[0, "asc"]],
            lengthMenu: [[-1], ["All"]],
            pageLength: -1,
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
                // console.log(a);
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
    }


        </script>
        <script>
function goBack() {
  window.history.back();
}
</script>
    </body>

</html>