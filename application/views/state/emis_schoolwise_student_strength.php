<?php 
   
  if($filter!=""){ 
    $build_name = array('Goverment'=>1,'Fully Aided'=>2,'Partially Aided' => 4);
    $filter_data = [];
    foreach($filter as $det){
         $data = array_search($det,$build_name);
        array_push($filter_data,$data);
    }
}

                             
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
            

        <?php $this->load->view('state/header.php');  ?>

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
                                    <h1>Section-Wise Strength Details (HSS)</h1>
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
                                                        <i class="fa fa-globe"></i> No.of
                                                            <?php if($filter!=""){  echo implode(",", $filter_data) .' Schools with less than '.  $minimum_stud .' Students in a Section'; } ?>
 
                                                              </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                                        
                                                    
                                                        <table class="table table-striped table-bordered table-hover " id="sample_3">
                                                            <thead>
                                                                <tr>
                                                                    <th rowspan="2" class="center">S.No</th>
                                                                    <th rowspan="2">UDISE Code</th>
                                                                    <th rowspan="2">School Name</th>
                                                                    <th rowspan="2">Total PG Teachers</th>
                                                                    <th colspan="3">No of Student</th> </tr>
                                                                    <tr>
                                                                     <th>IX</th>
                                                                     <th>X</th>
                                                                     <th> XI </th>
                                                                     <th> XII </th>
                                                                     <th> Total Students in both XI and XII </th>
                                                                    </tr>
                                                                </thead>
                                                               <tbody>
                                                            <?php if(!empty($school_details))
                                                            {  foreach($school_details as $index=>  $det){   
                                                                    
                                                                ?>  
                                                               
                                                                <tr>
                                                                    <td class="center"><?=$index+1;?></td>
                                                                    <td class="details-control"> <a href="javascript:void(0);"><?=$det->udise_code;?></a>
                                                                        <input type="hidden" id="school_id<?=$index?>" value="<?=$det->school_id;?>">
                                                                        <input type="hidden" id="class<?=$index?>" value="<?=$det->class_studying_id;?>">
                                                                    </td>
                                                                    <td><?=$det->school_name;?></td>
                                                                    <td><?=$det->total_pgteachers;?></td>
                                                                    <td <?php echo ($det->nineth <= $minimum_stud) ?  "style='color: #ff0000;'" : '' ; ?> ><?=$det->nineth;?></td>
                                                                    <td <?php echo ($det->tenth <= $minimum_stud) ?  "style='color: #ff0000;'" : '' ; ?> ><?=$det->tenth;?></td>
                                                                    <td <?php echo ($det->Plus1 <= $minimum_stud) ?  "style='color: #ff0000;'" : '' ; ?> ><?=$det->Plus1;?></td>
                                                                    <td <?php echo ($det->Plus2 <= $minimum_stud) ? "style='color: #ff0000;'" : ''; ?> ><?=$det->Plus2;?></td>
                                                                    <td <?php echo ($det->student_count <= $minimum_stud) ?  "style='color: #ff0000;'" : '' ; ?>><?=$det->student_count;?></td> 
                                                                    <!-- <td><?=$det->group_section;?></td> -->
                                                                </tr>
                                                                <?php  }?> 




                                                                
                                                      
                                                            </tbody>
                                                          
                                                        <?php }?>
                                                        </table>

                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           
                                                <?php echo "Note : Red highlighted data indicates sections with strength below minimum students specified " ?>
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
                   <!-- <script LANGUAGE="JavaScript">
  window.onload=getParams
  function getParams()
   {
   var idx = document.URL.indexOf('?');
   console.log(idx);
   var params = new Array();
   if (idx != -1) 
   {
   var pairs = document.URL.substring(idx+1, document.URL.length).split('&');
   console.log(document.URL.substring(idx+1, document.URL.length).split('&'));
   for (var i=0; i<pairs.length; i++)
   {
    nameVal = pairs[i].split('=');
    params[nameVal[0]] = nameVal[1];
   }
   }
return params;
 }
  params = getParams();
  console.log(params);
//   firstname = unescape(params["Name"]);
//   document.getElementById("d").value=firstname;
  </script> -->
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

//  $(document).ready(function(){  // function call for validate company name 
//     $("#emis_state_report_schcate").change(function(){
//       return validatetext('emis_state_report_schcate','emis_state_report_schcate_alert'); 
// });   });

// $(document).ready(function(){  // function call for validate company name 
//     $("#emis_state_report_schmanage").change(function(){
//       return validatetext('emis_state_report_schmanage','emis_state_report_schmanage_alert'); 
// });   });


// function checkmanagecate(){

// var baseurl='<?php echo base_url(); ?>';

// var manage = validatetext('emis_state_report_schmanage','emis_state_report_schmanage_alert');
// var cate = validatetext('emis_state_report_schcate','emis_state_report_schcate_alert'); 

// var manage1=$("#emis_state_report_schmanage").val();
// var cate1 = $("#emis_state_report_schcate").val();

// if(manage == 0 || cate == 0){
//     return false;
// }

  
       
// }

// function remove_catefilter(){

//   $.ajax({
//         type: "POST",
//         url:baseurl+'State/deletereport_schoolcatemanage',
//         data:"&test=1",
//         success: function(resp){
//         // alert(resp);  
//         location.reload(true);
//         return true;              
//          },
//         error: function(e){ 
//         alert('Error: ' + e.responseText);
//         return false;  
        
//         }
//         });
// }

// $('#emis_state_report_schmanage').click(function () {    
//         console.log(this.checked,$('input:checkbox').find(".school_manage").find());
//      $('input:checkbox').prop('checked', this.checked);
//      if(this.checked){    
//      console.log($(this).val());
//      }
//  });

// $("#select_all").change(function(){ 
//  //"select all" change 
//     $(".emis_state_report_schcate").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
// });

//".checkbox" change 
// $('.emis_state_report_schcate').change(function(){ 
//     //uncheck "select all", if one of the listed checkbox item is unchecked
//     if(false == $(this).prop("checked")){ //if this item is unchecked
//         $("#select_all").prop('checked', false); //change "select all" checked status to false
//     }
//     //check "select all" if all checkbox items are checked
//     if ($('.emis_state_report_schcate:checked').length == $('.checkbox').length ){
//         $("#select_all").prop('checked', true);
//     }
// });
var table = '';
$(document).ready(function()
{
   table = sum_dataTable('#sample_3');
   // var Otable = sum_dataTable("#sample_4");

    $('#sample_3').on('click', 'td.details-control', function () {
       var tr = $(this).closest('tr');
       var row = window.table.row(tr);
       var rowid = window.table.row(tr).index();
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
   function format(callback, id) {
        
    var school_id = $("#school_id"+id).val();
    var class_id =$("#class"+id).val();
    var minimum_stud = <?=$minimum_stud;?>;
    console.log(school_id);
    console.log(class_id);
        if($.fn.dataTable.isDataTable('#d')){
           $('#d').DataTable().clear().destroy();
        }
    var  thead= '',tbody='';
    var data = {'school_id':school_id,'class_studying_id':class_id };

       $.ajax({
           method:"POST",
           url: '<?=base_url()."State/get_group_details"?>',
           data:data,
           dataType: "json",
           success: function (response) {
            console.log(response);
            
               // var data = JSON.parse(response.responseText);
               var thead = '', tbody = '',tfoot='';
                   thead += '<thead><tr>'
                   thead += '<td>Group Code/Class </td>';
                   thead += '<td>Group Name</td>';
                   thead += '<td>Class/Section </td>';
                   thead += '<td>Total Student</td>';
                   
                   thead += '</tr>';
var total=0;color='';
               $.each(response, function (i, d) {
                console.log(d);
                i = i+1;
                color = d.students_name_count <= <?=$minimum_stud;?> ?"style='color: #ff0000;'" : '' ; 
                total = (total+ +d.students_name_count);
                tbody +='<tbody><tr>';
                tbody +='<td>'+(d.group_code_id!=null?d.group_code_id:d.class_studying_id)+'</td><td>'+(d.group_code_id!=null?d.group_name:'--')+'</td><td>'+d.class_studying_id+ ' / ' +d.class_section+'</td><td '+color+' >'+d.students_name_count+'</td>';
                tbody +='</tr></tbody>';
                

                                 });
                                 tfoot +='<tfoot><tr>';
                                 tfoot +='<td colspan="3">Total</td><td>'+total+'</td>';
                                 tfoot +='</tr>';
               
               callback($('<table id="d" style="background-color:gray;" class="table table-condensed table-bordered">' + thead + tbody + tfoot +'</table>')).show();
       // sum_dataTable("#d");

           },
           error: function () {
               $('#output').html('Bummer: there was an error!');
           }
           
       });
   }


function sum_dataTable(dataId){
    // alert();
    table = $(dataId).DataTable({
      dom: 'Blfrtip',
      "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

      order: [[0, "asc"]],
            lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            pageLength: 10,
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
        
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
           columnDefs: [
            
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
               
            sum = sum.toLocaleString(undefined, {maximumFractionDigits:3});
            $(column.footer()).html(sum);
                        });
            }
        });
    return table;
    }

    // $("#sample_3 thead th:eq(3)").each( function ( i ) {
        
    //     var select = $('<select class="form-control"><option value="" >All Block</option></select>')
    //         .appendTo( $(this).empty() )
    //         .on( 'change', function () {
    //             window.table.column( 3 )
    //                 .search( $(this).val() )
    //                 .draw();
    //         } );
 
    //     window.table.column( 3 ).data().unique().sort().each( function ( d, j ) {
    //         select.append( '<option value="'+d+'">'+d+'</option>' )
    //     } );

    // });
});

            // $("#d").dataTable();
            // $("#d").dataTable();
           
 
 
   
        </script>
    </body>

</html>