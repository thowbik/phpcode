
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

    .fa-check-circle
    {
        color:green;
    }
    .fa-times-circle-o
    {
        color:red;
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
            

  <?php $this->load->view('DC/header.php'); ?>

            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <!-- BEGIN CONTAINER -->
                    <div class="page-container">
                        <!-- BEGIN CONTENT -->
                        <div class="page-content-wrapper">
                            <div class="portlet light">
                                            <div class="col-md-offset-10 col-md-2">
                                             <button onclick="goBack()" class="btn green"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
                                         </div>
                                           <form action="<?php echo base_url().'State/get_attendance_search'?>" method="post">
                                                <div class="row">
                                                    
        <!-- <button type="submit" class="btn green btn-lg" >Submit</button> -->
                             </div>                           
                                                </div>
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">
                                <div></div> 
                                <div class="container">
                                    <!-- BEGIN PAGE CONTENT INNER -->
                          

                                    <div class="page-content-inner">
                                     

                                       <?php 


                                       $class_roma = array
                                                            ('I'=>1,'II'=>'2','III'=>'3','IV'=>'4','V'=>'5','VI'=>'6','VII'=>'7','VIII'=>'8','IX'=>'9','X'=>'10','XI'=>'11','XII'=>'12','LKG'=>'13','UKG'=>'14','PreKG'=>'15');


                                       $class_name = array_search($class,$class_roma);
                                       ?>
           
                                        <!-- BEGIN CARDS -->
                                        <div class="row margin-bottom-20">
                                             <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> Attendance By Section | School Name -   <?=$school_details->school_name;?> | Class:<?=$class_name;?><span></span> </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                                        
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center">S.No</th>
                                                                    <th >Student Name</th>
                                                                    <th>Section</th>
                                                                    <th class="center"><?=$date;?></th>
                                                                   

                                                                </tr>
                                                                </thead>
                                                               <tbody>
                                                            <?php if(!empty($students_section_details)){ 

                                                                
                                                                $index =1;
                                                                $total_students = 0;
                                                                $present_students = 0;
                                                                 foreach($students_section_details as  $det){   

                                                                    
                                                                    $class_variable = '';
                                                                        $name = '';
                                                                        switch($det['present']){

                                                                            case -1:
                                                                            $class_variable = 'fa fa-minus';
                                                                            $name = 'NA';
                                                                            break;
                                                                            case 1:
                                                                            $class_variable = 'fa fa-check-circle';
                                                                            $name = 'P';
                                                                            break;
                                                                            case 0:
                                                                            $class_variable='fa fa-times-circle-o';
                                                                            $name = 'A';
                                                                            break;
                                                                        }
                                                                    ?>

                                                                <tr>
                                                                    <td class="center"><?=$index;?></td>
                                                                    <td><span style="color:<?=$det['gender']==1?'blue':'deeppink'?>"><?=$det['name'];?></span></td>
                                                                    <td><?=$det['section'];?></td>
                                                                   <td class="center"><i class="<?=$class_variable;?>" style="font-size:20px;" aria-hidden="true"></i><span style="display:none;text-align:center;"><?=$name;?></span></td>
                                                                   
                                                                   

                                                                </tr>
                                                                <?php  $index++;}  ?>
                                                                
                                                      
                                                            </tbody>
                                                            
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
            $(document).ready(function()
{
    sum_dataTable('#sample_3');
    var table = '';


function sum_dataTable(dataId){
    window.table = $(dataId).DataTable({
      dom: 'Blfrtip',
      
        buttons: [
                { extend: 'print', className: 'btn default' },
                { extend: 'pdf', className: 'btn default' },
                { extend: 'csv', className: 'btn default' }
            ],
            order: [[0, "asc"]],
            lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            pageLength: 10,

            
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
    $("#sample_3 thead th:eq(2)").each( function ( i ) {
        
        var select = $('<select class="form-control"><option value="" >All Section</option></select>')
            .appendTo( $(this).empty() )
            .on( 'change', function () {
                window.table.column( 2 )
                    .search( $(this).val() )
                    .draw();
            } );
 
        window.table.column( 2 ).data().unique().sort().each( function ( d, j ) {
            select.append( '<option value="'+d+'">'+d+'</option>' )
        } );

    });

});
        </script>
        <script>
function goBack() {
  window.history.back();
}
</script>
    </body>

</html>