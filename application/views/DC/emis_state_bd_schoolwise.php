
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
            

  <?php $this->load->view($header.'/header.php'); ?>

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
                                        <h1>School Building Details
                                            
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
                                     <div class="portlet light">

                                            <form action='<?php echo base_url().$link."/get_emis_state_school_building_school?dist=".$dist_id?>' method="POST">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-2" style="width:6%;padding-top:5%;">

                                                            
                                                        </div>
                                                        <div class="col-md-8" >
                                                            
                                                              <div class="form-group" style="padding: 10px;padding-left: 8%">
                                                                <label class="control-label bold">
                                                               School Building  <input type="checkbox" id="emis_state_report_schmanage"  value="all" name="build_type"> All</label><br/></label><br/>
                                                               
                                                                 
                                                                 
            <input type="checkbox" name="build_type[]" class="school_manage" id="emis_state_report_schmanage" autocomplete="off" value="1"/><span class="label-text" >Pucca</span>&nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="build_type[]" class="school_manage" id="emis_state_report_schmanage" autocomplete="off" value="2"/><span class="label-text" >Partially Pucca</span>&nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="build_type[]" class="school_manage" id="emis_state_report_schmanage" autocomplete="off" value="3"/><span class="label-text" >Kutcha</span>&nbsp;&nbsp;&nbsp;
            
                                                                  

                                                               
                                                                <font style="color:#dd4b39;"><div id="emis_state_report_schcate_alert"></div></font>
                                                              </div>
                                                              
                                                              <div style="padding: 4px;padding-left: 8%;margin-top: -2%;" class="form-group" style="padding: 10px;">
                                                                
                                                              
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
                                              <?php if($block_filter_data!=""){ 
                                                $build_name = array('Pucca'=>1,'Partially Pucca'=>2,'Kutcha'=>3);
                                                $filter_data = [];
                                                foreach($block_filter_data as $det){
                                                    $data = array_search($det,$build_name);
                                                    array_push($filter_data,$data);
                                                }
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h5><b>Selected School Building :</b>
                                                            <?=implode(",", $filter_data);?></h5>
                                                        
                                                    </div>
                                                </div>
                                              <?php  }
$total1 = [];
                                               ?> 
                                            </div>

                                       
           
                                        <!-- BEGIN CARDS -->
                                        <div class="row margin-bottom-20">
                                             <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> School Building Reports  </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                                        <?php $prekg_tot=0;$lkg_tot=0;$ukg_tot=0;$c1_tot=0;$c2_tot=0;$c3_tot=0;$c4_tot=0;$c5_tot=0;$c6_tot=0;$c7_tot=0;$c8_tot=0;$c9_tot=0;$c10_tot=0;$c11_tot=0;$c12_tot=0; ?>
                                                    
                                                        <table class="table table-striped table-bordered table-hover " id="sample_3">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center">S.No</th>
                                                                    <th>UDISE Code</th>
                                                                    <th>School Name</th>
                                                                    <th>Block Name</th>
                                                                    <th class="sum center">Total Block</th>
                                                                    <th class="sum center">Pucca Block</th>
                                                                    <th class="sum center">Partially Pucca Block</th>
                                                                    <th class="sum center">Kutcha Block</th>
                                                                    
                                                                    
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
                                                                    </td>
                                                                    <td><?=$det->school_name;?></td>
                                                                    <td><?=$det->block_name;?></td>
                                                                    <td><?=$det->build_block_no;?></td>
                                                                    <td><?=$det->pucca;?></td>
                                                                    <td><?=$det->partially_pucca;?></td>

                                                                   <td class="center"><?=$det->kutcha;?></td>

                                                                </tr>
                                                                <?php  }?> 




                                                                
                                                      
                                                            </tbody>
                                                            <tfoot>
                                                                <th class="center" colspan="4">Total</th>
                                                                
                                                                <th class="center"></th>
                                                                <th class="center"></th>
                                                                <th class="center"></th>
                                                                <th class="center"></th>
                                                                

                                                            </tfoot>
                                                        <?php }?>
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
  $(document).ready(function(){ 
  $("#emis_state_report_schcate").change(function(){ 

    var emis_state_report_schcate = $("#emis_state_report_schcate").val();

      $.ajax({
        type: "POST",
        url:baseurl+'DC/get_school_management_data',
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
if($.fn.dataTable.isDataTable('#d')){
           $('#d').DataTable().clear().destroy();


                   }
    var  thead= '',tbody='';
   
    

               var data = {'table':'schoolnew_natureofconst_entry','where':{'school_key_id':school_id}};

       $.ajax({
           method:"POST",
           url: '<?=base_url()."DC/get_school_nature_details"?>',
           data:data,
           dataType: "json",
           success: function (response) {
            console.log(response);
          
               // var data = JSON.parse(response.responseText);
               var thead = '', tbody = '',tfoot='';
                   thead += '<thead><tr>'
                   thead += '<td>S.No </td>';
                   thead += '<td>construct type</td>';
                   thead += '<td>Total Floor</td>';
                   thead += '<td>Total Class Room</td>';
                   thead += '<td>Total Class Room Nouse</td>';
                   thead += '<td>Office Room</td>';
                   thead += '<td>Lab Room</td>';
                   thead += '<td>Library Room</td>';
                   thead += '<td>Computer Room</td>';
                   thead += '<td>Art Room</td>';
                   thead += '<td>Staff Room</td>';
                   thead += '<td>HM Room</td>';
                   thead += '<td>Girls Room</td>';
                   thead += '<td>Total Room</td></thead>';

                   thead += '</tr>';
 var type ='';
               $.each(response, function (i, d) {
                i = i+1;
                
                switch(parseInt(d.construct_type))
                {
                    case 1:
                    type = 'Pucca';
                    break;
                    case 2:
                    type = 'Partially Pucca';
                    break;
                    case 3:
                    type = 'Kutcha';
                    break;
                    default:
                    type = '';
                    break;

                }
                // console.log(type);
                tbody +='<tbody><tr>';
                tbody +='<td>'+i+'</td><td>'+type+'</td><td>'+d.total_flrs+'</td><td>'+d.tot_classrm_use+'</td><td>'+d.tot_classrm_nouse+'</td><td>'+d.off_room+'</td><td>'+d.lab_room+'</td><td>'+d.library_room+'</td><td>'+d.comp_room+'</td><td>'+d.art_room+'</td><td>'+d.staff_room+'</td><td>'+d.hm_room+'</td><td>'+d.girl_room+'</td><td>'+d.total_room+'</td>';
                tbody +='</tr></tbody>';

                                 });
               tfoot +='<tfoot><tr>';
               // tfoot +='<td colspan="2">Total</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>';
               tfoot +='</tr>';
               callback($('<table id="d" style="background-color:gray;" class="table table-condensed table-bordered">' + thead + tbody + +'</table>')).show();
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

    $("#sample_3 thead th:eq(3)").each( function ( i ) {
        
        var select = $('<select class="form-control"><option value="" >All Block</option></select>')
            .appendTo( $(this).empty() )
            .on( 'change', function () {
                window.table.column( 3 )
                    .search( $(this).val() )
                    .draw();
            } );
 
        window.table.column( 3 ).data().unique().sort().each( function ( d, j ) {
            select.append( '<option value="'+d+'">'+d+'</option>' )
        } );

    });
});

            // $("#d").dataTable();
            // $("#d").dataTable();
           
 
 
   
        </script>
    </body>

</html>