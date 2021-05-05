
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
            

  <?php $this->load->view('Deo_District/header.php'); ?>

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
                                        <h1>Staff Strike Report
                                            
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
                                                            <i class="fa fa-globe"></i> Staff Strike Reports |  <?=$school_details->school_name;?><span></span> </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                                        
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th>Staff Name</th>
                                                                    <th>Gender</th>
                                                                    <th>Date of Join</th>
                                                                    <th>Staff Code</th>
                                                                    <th> <input type="checkbox" id="select_all"> Participated</th>
                                                                    <th>Date</th>

                                                                </tr>
                                                                </thead>
                                                               <tbody>
                                                            <?php if(!empty($teacher_list)){ $total1 = 0; foreach($teacher_list as $index=> $det){   ?>

                                                                <tr>
                                                                    <td><?=$index+1;?></td>
                                                                    <td> 
                                                                    <?php echo $det->teacher_name; ?></a><input type="hidden" name="teacher_code" value="<?=$det->teacher_code;?>">

                                                                </td>
                                                                    <td><?=($det->gender == 1)?'Male':'Female';?>
                                                                         <input type="hidden" name="school_id" value="<?=$det->school_key_id;?>">
                                                                    </td>
                                                                    <td><?=date('d-m-Y',strtotime($det->staff_join));?>
                                                                        <input type="hidden" value="<?=$index;?>" id="index">
                                                                    </td>
                                                                    <td><?=$det->teacher_code;?></td>
                                                                    <td style="text-align: center !important;"><input type="checkbox" class="checkbox" id="teacher_details" name="teach_count[]"></td>
                                                                    <td><input type="text" name="date" class="form-control date" id="date<?=$index;?>" value="<?=$date;?>"/></td>
                                                                </tr>
                                                                <?php  } } ?>
                                                                
                                                      
                                                            </tbody>

                                                        </table>
                                                            <div id="msg"></div>
<?php if(empty($teacher_list))
                                                            {?>
                                                                  <h3><center>Strike Details already Completed for this school</center></h3>
                                                            <?php }?>
                                                        
                                                        </div>
  
                                                    </div>

                                                </div>

                                                <!-- END EXAMPLE TABLE PORTLET-->           

                                                    </div>
                                             <?php if(!empty($teacher_list)){?>

                                            <div class="portlet light">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div>Selected Teachers Name : <span id="teacher_count"></span><br/><span id="teacher_name"> </span></div>
                                                    </div>
                                                       <div class="col-md-3">
        <button type="sumbit" class="btn green btn-lg sub" >Submit</button>
                             </div>  
                                                      
                                                    
                                                </div>
                                           
                                              
                                            </div>
                                            <?php } ?>
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
$('.date').datepicker("setStartDate","21-01-2019");

$('.date').datepicker("setEndDate","31-01-2019");


var teacher_list = new Array();
var teacher_name = new Array();
$("input[name='teach_count[]']").click(function(){
    // $(".date").attr('disabled',false);
    teacher_list = new Array();
    teacher_name = new Array();
       $.each($("input[name='teach_count[]']:checked"), function() {
           var data = $(this).parents('tr:eq(0)');
           // console.log($(data).find('td:eq(5)').find('input .date').prop('id'));
           // var index = $(data).find('td:eq(2)').find('input').val();
           // $("#date"+index).attr('readonly',false);

           teacher_name.push($(data).find('td:eq(1)').text().trim());
           teacher_list.push({ 'teacher_id':$(data).find('td:eq(0)').find('input').val(), 
            'school_key_id':$(data).find('td:eq(1)').find('input').val()
             , 'dates':$(data).find('td:eq(5)').find('input').val()});             
       });
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
    $(".date").attr('disabled',false);

    $("input[name='teach_count[]']").prop('checked', $(this).prop("checked"));
    teacher_list = new Array();
    teacher_name = new Array();

    $.each($("input[name='teach_count[]']:checked"), function() {
           var data = $(this).parents('tr:eq(0)');
           teacher_name.push($(data).find('td:eq(1)').text().trim());

           teacher_list.push({ 'teacher_id':$(data).find('td:eq(0)').find('input').val(), 
            'school_key_id':$(data).find('td:eq(1)').find('input').val()
             , 'dates':$(data).find('td:eq(5)').find('input').val()});             
       });
       $("#teacher_name").html('<b>'+teacher_name.toString()+'</b>');
       $("#teacher_count").html('<h5>'+teacher_name.length+' Selected</h5>');


       // console.log(teacher_list);
});

$('button').click( function() {
    // console.log(teacher_list);
 teacher_list = new Array();
    teacher_name = new Array();
    var current_date = new Date().toISOString().slice(0, 10);
        
      swal({
  title: "Details once submitted cannot be edited!",
  text: "Are you sure?",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-primary",
  confirmButtonText: "Yes, sure!",
  closeOnConfirm: false
},
function(){
    $('button').hide();
    $("#sample_2 tbody").find('input[name="teach_count[]"]').each(function(){
                    var data = $(this).parents("tr");
                
                if($(this).is(":checked")){
                    var par = 1;
                    // $(this).parents("tr").remove();
                    teacher_list.push({ 'teacher_id':$(data).find('td:eq(1)').find('input').val(), 
            'school_key_id':$(data).find('td:eq(2)').find('input').val()
             , 'dates':$(data).find('td:eq(6)').find('input').val(),
                'created_at':current_date,
                'partici':par,
                'archive':1,
            }); 

                }else
                {
                    var par = 0;
teacher_list.push({ 'teacher_id':$(data).find('td:eq(1)').find('input').val(), 
            'school_key_id':$(data).find('td:eq(2)').find('input').val()
             , 'dates':'',
               'created_at':current_date,
               'partici':par,
                'archive':1,

         }); 

                    console.log($(data).find('td:eq(0)').text().trim());

                    // console.log($(this).is(":checked"));

                }
            }); 
            // console.log(teacher_list);return false;
            // console.log($(data).find('td:eq(5)').find('input').val());
            $.ajax(
        {
            url:baseurl+'Deo_District/save_teacher_reports',
            data:{'records':teacher_list},
            dataType:'JSON',
            method:'POST',
            success:function(res)
            {
                // console.log();
                //     var teacher = res.filter(res=>res !=null);
                // console.log(teacher);
                // console.log(teacher);
                if(res)
                {
                    swal("Saved successfully","Duplicate Teacher Lists ",'success');
                    window.location.reload();
                }
            }

        })

});

        

        
    } );
// $('.date').datepicker('setDate',end);


        </script>
    </body>

</html>