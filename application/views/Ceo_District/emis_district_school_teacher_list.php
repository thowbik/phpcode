
<?php 
// print_r($blockwise_schoolinfo);
?>
<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    
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
                                        <h1>Teacher List
                                            <small></small>  <label style="color:red;"></label>
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
                                     

                                       
           
                                        <!-- BEGIN CARDS -->
                                        <div class="row margin-bottom-20">
                                             <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> Teacher Schoolwise |  <?=$school_details->school_name;?><span></span> </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                                        
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                                                            <thead>
                                                                <tr>
                                                                    <th>Teacher Name</th>
                                                                    <th>Gender</th>
                                                                    <th>Staff Join</th>
                                                                    <th>Teacher Code</th>
                                                                    <th>Date</th>
                                                                    <th> <input type="checkbox" id="select_all"> Verified</th>

                                                                </tr>
                                                                </thead>
                                                               <tbody>
                                                            <?php if(!empty($teacher_list)){ $total1 = 0; foreach($teacher_list as $det){  


                                                             ?>

                                                                <tr>
                                                                    
                                                                    <td> 
                                                                    <?php echo $det->teacher_name; ?></a><input type="hidden" name="teacher_code" value="<?=$det->teacher_code;?>">

                                                                </td>
                                                                    <td><?=($det->gender == 1)?'Male':'Female';?>
                                                                         <input type="hidden" name="school_id" value="<?=$det->school_key_id;?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="hidden" name="strick_id" id="strick_id" value="<?=$det->id;?>">
                                                                        <?php echo (date('d-m-Y', strtotime($det->staff_join)));?></td>
                                                                    <td><?=$det->teacher_code;?>
                                                                        <input type="hidden" name="archive" value="<?=$det->archive;?>">
                                                                    </td>
                                                                    <td><input type="text" name="date" class="form-control date" value="<?=($det->partici==1?$det->dates:$date);?>"/></td>
                                                                    <td style="text-align: center !important;"><input type="checkbox" class="checkbox" id="teacher_details" name="teach_count[]" <?=$det->partici==1?'checked':''?>></td>
                                                                </tr>
                                                                <?php  } } ?>
                                                                
                                                      
                                                            </tbody>

                                                        </table>
                                                            <div id="msg"></div>

                                                        
                                                        </div>
  
                                                    </div>

                                                </div>

                                                <!-- END EXAMPLE TABLE PORTLET-->           

                                                    </div>
                                            <div class="portlet light">
                                            
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div>Selected Teachers Name : <span id="teacher_count"></span><br/><span id="teacher_name"> </span></div>
                                                    </div>
                                                       <div class="col-md-3">
        <button type="sumbit" class="btn green btn-lg" >Submit</button>
                             </div>  
                                                      
                                                    
                                                </div>
                                           
                                              
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
    
    endDate: end,

});


var teacher_list = new Array();
var teacher_name = new Array();
$("input[name='teach_count[]']").click(function(){
    teacher_list = new Array();
    teacher_name = new Array();
       $.each($("input[name='teach_count[]']"), function() {

           var data = $(this).parents('tr:eq(0)');
           var teach_parti = $(this).is(":checked");
           if(teach_parti)
           {
                teacher_name.push($(data).find('td:eq(0)').text().trim());
           }
           teacher_list.push({ 'teacher_id':$(data).find('td:eq(0)').find('input').val(), 
            'school_key_id':$(data).find('td:eq(1)').find('input').val()
             , 'dates':$(data).find('td:eq(4)').find('input').val(),'id':$(data).find('td:eq(2)').find('input').val(),'partici':teach_parti,'archive':$(data).find('td:eq(3)').find('input').val()});             
       });
       console.log(teacher_list);

       $("#teacher_name").html('<b>'+teacher_name.toString()+'</b>');
       $("#teacher_count").html('<h5>'+teacher_name.length+' Selected</h5>');
       if ($("input[name='teach_count[]']:checked").length == $(".checkbox").length ){
        $("#select_all").prop('checked', true);
    }else
    {
        $("#select_all").prop('checked', false);
        
    }
   });

$("#select_all").change(function(){ 
 //"select all" change 
    $("input[name='teach_count[]']").prop('checked', $(this).prop("checked"));
    teacher_list = new Array();
    teacher_name = new Array();

    $.each($("input[name='teach_count[]']"), function() {

           var data = $(this).parents('tr:eq(0)');
           teacher_name.push($(data).find('td:eq(0)').text().trim());

          teacher_list.push({ 'teacher_id':$(data).find('td:eq(0)').find('input').val(), 
            'school_key_id':$(data).find('td:eq(1)').find('input').val()
             , 'dates':$(data).find('td:eq(4)').find('input').val(),'id':$(data).find('td:eq(2)').find('input').val(),'partici':$(data).find('td:eq(5)').find('input').prop('checked')==1,'archive':$(data).find('td:eq(3)').find('input').val()});

       });
       $("#teacher_name").html('<b>'+teacher_name.toString()+'</b>');
       $("#teacher_count").html('<h5>'+teacher_name.length+' Selected</h5>');


       console.log(teacher_list);
});

$('button').click( function() {
    // console.log(teacher_list);
       // alert(teacher_list);
       teacher_list = new Array();
       teacher_name = new Array();
            $.each($("input[name='teach_count[]']"), function() {
           var data = $(this).parents('tr:eq(0)');

                teacher_list.push({ 'teacher_id':$(data).find('td:eq(0)').find('input').val(), 
            'school_key_id':$(data).find('td:eq(1)').find('input').val()
             , 'dates':$(data).find('td:eq(4)').find('input').val(),'id':$(data).find('td:eq(2)').find('input').val(),'partici':$(data).find('td:eq(5)').find('input').prop('checked')==1,'archive':$(data).find('td:eq(3)').find('input').val()});
                     var teach_parti = $(this).is(":checked");
           if(teach_parti)
           {
                teacher_name.push($(data).find('td:eq(0)').text().trim());
           }     
       });
            // console.log(teacher_list);return false;
            swal({
                title: "Are you sure?",
                text:  teacher_name.length+' Teachers participated in Strike ',
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#ff0000",
                confirmButtonText: "Confirm",
                cancelButtonText:'Cancel',
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function(isConfirm){
                if (isConfirm)
                {
        $.ajax(
        {
            url:baseurl+'Ceo_District/save_teacher_reports',
            data:{'records':teacher_list},
            dataType:'JSON',
            method:'POST',
            success:function(res)
            {
                swal({
                                title:"successfully Saved",
                                type:'success',
                                confirmButtonText: "Ok",
                            },function(isConfirm)
                            {
                                window.location.reload();
                            })
                        }
                    })
                }
              });
        
    });
// $('.date').datepicker('setDate',end);


        </script>
        <script>
            $(document).ready(function()
{
    sum_dataTable('#sample_3');
});

function sum_dataTable(dataId){
    var table = $(dataId).DataTable({
      dom: 'Blfrtip',
      
        buttons: [
                { extend: 'print', className: 'btn default' },
                { extend: 'pdf', className: 'btn default' },
                { extend: 'csv', className: 'btn default' }
            ],
            columnDefs: [ {
"targets": 5,
"orderable": false
} ],
            order: [[0, "asc"]],
            lengthMenu: [[20], [20]],
            pageLength: 20,
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