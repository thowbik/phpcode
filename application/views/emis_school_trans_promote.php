<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
      <style type="text/css">
      .clickable{
    cursor: pointer;   
}
  .panel-heading span {
    margin-top: -20px;
    font-size: 15px;
}
.center
{
    text-align: center;
}
.tablecolor
{
    background-color: #32c5d2; 
}
body.modal-open {
    overflow-y: hidden !important;
    position: fixed;
}
.dt-button-collection a.buttons-columnVisibility:before,
.dt-button-collection a.buttons-columnVisibility.active span:before {
    display:block;
    position:absolute;
    top:1.2em;
    left:0;
    width:12px;
    height:12px;
    box-sizing:border-box;
}

.sweet-alert {
    background-color: #ffffff;
    width: 478px;
    padding: 17px;
    border-radius: 5px;
    text-align: center;
   
    left: 50%;
    top: 10%;
    margin-left: -256px;
    margin-top: -250px!important;
    
    display: none;
    z-index: 100000!important;
    overflow-y: hidden !important;
    position: fixed!important;
}
.dt-button-collection a.buttons-columnVisibility:before {
    content:' ';
    margin-top:-6px;
    margin-left:10px;
    border:1px solid black;
    border-radius:3px;
}

.dt-button-collection a.buttons-columnVisibility.active span:before {
    content:'\2714';
    margin-top:-11px;
    margin-left:12px;
    text-align:center;
    text-shadow:1px 1px #DDD, -1px -1px #DDD, 1px -1px #DDD, -1px 1px #DDD;
}

.dt-button-collection a.buttons-columnVisibility span {
    margin-left:20px;    
}

</style>
</style>
    <style type="text/css" media="print">
  @page { size: landscape; }
</style>
 <style type="text/css" media="file">
  @page { size: landscape; }
</style>
    
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
                        <link href="<?php echo base_url().'asset/js/croppie-VIT/croppie.css'?>" rel="stylesheet" type="text/css"/>

        <!-- BEGIN PAGE LEVEL STYLES -->
    
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

<?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
<?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
<?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 5){ ?>
<?php $this->load->view('state/header.php'); }else{ $this->load->view('header.php'); } ?>


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
                                        <h1>Promote Student
                                            
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
                                     <div class="row margin-bottom-20">
                                    <div class="">

                                       
                                           

                                        </div>
                                       

                                </div>

                                    <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Student Data - Class 
                
                                                        <?php
                                                      // echo $class_id;
                                                      $class_roma = array
                                                            ('I'=>1,'II'=>'2','III'=>'3','IV'=>'4','V'=>'5','VI'=>'6','VII'=>'7','VIII'=>'8','IX'=>'9','X'=>'10','XI'=>'11','XII'=>'12','LKG'=>'13','UKG'=>'14','PreKG'=>'15');
                                                            $class_roman_name = array_search($class_id,$class_roma);
                                                            echo $class_roman_name;
                                                    ?></span>
                                                </div>
                                                <div class="col-md-offset-5 col-md-4"><?php if(isset($success)){?>
                            <div class="alert alert-success"><button class="close" data-close="alert"></button>
                                <?=$success;?></div>
                            <?php } ?></div>  
                            <div class="col-md-offset-5 col-md-4"><?php if(isset($error)){ ?>
                            <div class="alert alert-danger"><button class="close" data-close="alert"></button>
                            <?php  echo $error; ?> </div><?php } ?></div> 
                            <div class="col-md-offset-5 col-md-4"><?php if(!empty(validation_errors())){?>
                            <div class="alert alert-danger"><button class="close" data-close="alert"></button>
                            <?php echo validation_errors(); ?> </div> <?php } ?></div>   
                                                                           
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row">
                                                  <form action="<?=base_url().'Home/get_student_pro_trans_details' ?>" method="post">
                                                    <div class="col-md-4">
                                                     
                                                        <!-- <?php print_r($class_roma);?> -->
                                                      <select name="class_id" id="class_id" class="form-control">
                                                          
                                                        <option value="0">--select--</option>
                                                        <?php if(!empty($school_classwise)){
                                                            // print_r($school_classwise);
                                                            foreach($school_classwise as $class_wise)
                                                            {

                                                              $class_roman_names = array_search($class_wise->class_id,$class_roma);
                                                              // echo $class_wise->class_id; 
                                                          ?>
                                                           <option value="<?=$class_wise->class_id?>" <?php echo ($class_wise->class_id == $class_id) ? 'selected' : ''; ?>><?=$class_roman_names.'-'.$class_wise->class_id;?></option>
                                                         <?php } }?>
                                                      </select>
                                                     
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div id="section">
                                                            <select class="form-control" id="section_id">
                                                                <option value="<?=$section_id?>"><?=(!empty($section_id))?$section_id:'All'?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary" onclick="return class_validation();">Search</button>
                                                    <div id="msg"></div>
                                                  </form>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> Student Data List </div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                    <?php 
                                                       // echo"<pre>";print_r($allstuds);echo"</pre>";?>
                                                        <table class="table table-bordered table-hover" id="sample_3">
                                                            <thead>
                                                                <th>S.No</th>
                                                                <th>Students Unique No</th>
                                                                <th>Name In Tamil</th>
                                                                <th>Name</th>
                                                                <th>Date Of Birth</th>
                                                                <th>Date Of Join</th>
                                                                <th>Medium</th>
                                                               
                                                                <th>Section</th>

                                                                <?php 
                                                    if($class_id == 11 || $class_id == 12){ ?>
                                                                <th> Group Name </th><?php }?>
                                                                <th>Promote <input type="checkbox" id="select_all"> </th>
                                                            </thead>
                                                            <tbody>
                                                                <?php if(!empty($allstuds)){
                                                                    foreach ($allstuds as $i => $all) {
                                                                        
                                                                    
                                                                    ?>
                                                                    <tr>
                                                                        <td><?=$i+1;?>
                                                                            
                                                                        </td>
                                                                        <td><?=$all->unique_id_no;?></td>
                                                                        <td><?php echo $all->name_tamil; ?></td>
                                                                    <td><?php echo $all->name; ?></td>

                                                                    <td><?php echo date('d-m-Y',strtotime($all->dob)); ?></td>
                                                                    <td><?php echo date('d-m-Y',strtotime($all->doj)); ?>
                                                                        <input type="hidden" value="<?=$all->school_admission_no;?>" id="school_admission_no">
                                                                    </td>
                                                                <td><?=$all->MEDINSTR_DESC;?>
                                                                    <input type="hidden" value="<?=$all->education_medium_id;?>"id="education_medium_id">
                                                                </td>

                                                                    <td><?php echo $all->class_section; ?></td>
                                                                        
                                                                    <?php if($class_id == 11 || $class_id ==12){?>
                                                                    <td><?php $this->db->select('*'); 
                                                                   $this->db->from('baseapp_group_code');
                                                                   $this->db->where('id', $all->group_code_id);
                                                                   $query =  $this->db->get();
                                                                   $group=$query->row('group_name');
                                                                   echo $group; }?></td>
                                                                   <td style="text-align: center !important;"><input type="checkbox" class="checkbox" id="student_details" name="student_count[]"></td>
                                                                    </tr>

                                                                <?php } }?>
                                                            </tbody>
                                                        </table>
                                                        <div class="row">
                                                    <div class="col-md-8">
                                                        <div>Selected Students Name : <span id="students_count"></span><br/><span id="students_name"> </span></div>
                                                    </div>
                                                       <div class="col-md-3">
        <button type="sumbit" class="btn green btn-lg sub" onclick="promote_modal();">Submit</button>
                             </div>  
                                                      
                                                    
                                                </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="promote_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Promote The Class</h4>
        </div>
        <div class="modal-body">
            <div class="row">
            <div class="col-md-6">
                                                    <label class="control-label">Class for which Admission is sought for *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                           
                                                            
                                                            <select  class="form-control" data-placeholder="Choose a Category" id="emis_class_study_promote" name="emis_class_study_promote" required>
                                                                <option value="">வகுப்பு *</option>
                                                                <?php 
                                                                if(!empty($school_classwise)){
                                                            // print_r($school_classwise);
                                                            foreach($school_classwise as $class_wise)
                                                            {

                                                              $class_roman_names = array_search($class_wise->class_id,$class_roma);
                                                                ?>
                                                                    <option value="<?=$class_wise->class_id;?>"><?=$class_roman_names.'-'.$class_wise->class_id;?></option>
                                                                  <?php  } }?>
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_class_studying_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 section_group">
                                                        <label class="control-label">Section*</label>
                                                    <div class="form-group">
                                                        <div class="section_det">
                                                            
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_section_alert"></div></font>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6 group">
                                                        <label class="control-label">Group Code*</label>
                                                    <div class="form-group">
                                                        <div class="group_det">
                                                            
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_section_alert"></div></font>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" onclick="generate_promote();">Save</button>
          <font style="color: red;"><div class="err_msg"></div></font>
        </div>
      </div>
      
    </div>
  </div>
        <?php $this->load->view('scripts.php'); ?>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
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
                  <?php $this->load->view('footer.php'); ?>

    </body>
 <script type="text/javascript">
        $(document).ready(function(){
    // $('.display').dataTable();
    
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
           
 var curr = new Date();

// console.log(curr.getFullYear()-19); 
var first = new Date(curr.getFullYear() -19,'01','01');
var end = new Date(curr.getFullYear() -3,curr.getMonth(), curr.getDate());

$('.date').datepicker({
    // daysOfWeekDisabled: [0,6]
        
    

});
$(".date1").datepicker({
   
});
// console.log(first,end);
 $('.date').datepicker("setStartDate",first);

$('.date').datepicker("setEndDate",end);
 // $(".datepicker").val(new Date());

      });
        function textvalidate(id,alertid){
                
            var text = document.getElementById(id);
            var alt = document.getElementById(alertid);
            if(text.value==''){
                alt.innerHTML="Required Field";
            }else {
                alt.innerHTML="";
            }
        }
           </script>
<script type="text/javascript">
  var class_id = 0;
    $(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
    if(!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
    }
})

$(document).ready(function(){
  class_id = $('#class_id').val();
  var section_id  =0;
 section_id = <?php echo json_encode($section_id,JSON_PRETTY_PRINT);?>;
  get_section(class_id,section_id);

})
    $(document).on('change','#class_id',function()
{
    class_id = $(this).val();
    section_id = null;


    get_section(class_id,section_id);

    // var school_id = $("#school_code").val();
    

})
    function get_section(class_id,section_id)
    {
  // alert(section_id);

      if(class_id !=0){
        $("#msg").html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:16px"></i> Loading...');
    $.ajax(
    {
        type: "POST",
        url:baseurl+'Home/get_school_section_details',
        data:{'class_id':class_id},
        success: function(resp){
        // alert(resp);  
        $("#msg").html('');
       
        var section = JSON.parse(resp);
        console.log(section);
            $("#section").empty('');            

        var section_drop = '<select name="section_id" class="form-control" id="section_id">';

        section_drop += '<option value=0>All</option>';
        $.each(section,function(id,val)
        {
            section_drop +='<option value='+ val.section +'>'+val.section+'</option>';
        })
            section_drop +='</select>';
            
            $("#section").append(section_drop); 
            // alert(section_id);
            if(section_id !=0 && section_id !=null){
            $("#section_id").val(section_id).attr('selected','selected');   
            }else
            {
                console.log('else');
                $("#section_id").val(0).attr('selected','selected');
            }      
         },
          
    })
    }
    }

    
    function class_validation()
{
    // alert();
    var class_id = $("#class_id").val();
    // console.log(class_id);
    // var section = $("#section_id").val();
    // console.log(section);
    if(class_id =='0')
    {
        var msg = '<span style="color:red;">You must select your Class!</span><br /><br />';
                    document.getElementById('msg').innerHTML = msg;
                    return false;
    }else
    {
        return true;
    }
}

</script>

<!-- <script type="text/javascript">
    $(document).ready(function() {
    var t = $('#sample_3').DataTable( {
        dom: 'B',
        "buttons": [
           {
              extend: 'colvis',
              columns: ':gt(4)',
              postfixButtons: ['colvisRestore'],
           }
        ],

    } );
   
} );
</script>
 -->
<script type="text/javascript">
    var table = '';
    $(document).ready(function()
{
   var table =  sum_dataTable('#sample_3');

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


      
        // console.log(table);
      table.columns( '.detail' ).visible( false );
      // $("#sample_3").css('display','table');
      $($.fn.dataTable.tables( true ) ).DataTable().columns.adjust().draw();
    table.responsive.recalc();
  
  //       console.log('i');
  //     table.on( 'order.dt search.dt', function () {
  //       table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
  //           cell.innerHTML = i+1;
  //       } );
  //   } ).draw();
  // },1000);
    // table.column(0).visible(false);
    

});
    
</script>

<script type="text/javascript">
     var students_list = new Array();
var students_name = new Array();
var old_class_id = null;
var identity = null;
var old_class_section = null;
$(".group").hide();


function class_validation()
{
    $("#msg").html('');
    old_class_section = $("#section_id").val();

    if(old_class_section !=0)
    {
        return true;
    }else
    {
        $("#msg").html('<p style="color:red">Please Select Section</p>');
        return false;
    }
}


$("input[name='student_count[]']").click(function(){
    // alert();
    // $(".date").attr('disabled',false);
    students_list = new Array();
    students_name = new Array();
       $.each($("input[name='student_count[]']:checked"), function() {
           var data = $(this).parents('tr:eq(0)');
           // console.log($(data).find('td:eq(5)').find('input .date').prop('id'));
           // var index = $(data).find('td:eq(2)').find('input').val();
           // $("#date"+index).attr('readonly',false);
           // console.log(data);
           // console.log($(data).find('td:eq(2)').text());
           students_name.push($(data).find('td:eq(3)').text().trim());
           students_list.push({'students_id':$(data).find('td:eq(1)').text().trim()});             
       });
       $("#students_name").html('<b>'+students_name.toString()+'</b>');
       $("#students_count").html('<h5>'+students_name.length+' Selected</h5>');
       console.log('582',students_name);
       if ($("input[name='student_count[]']:checked").length == $(".checkbox").length ){
        $("#select_all").prop('checked', true);
        
    }else
    {
        $("#select_all").prop('checked', false);
        
    }
   });

$("#select_all").change(function(){ 
 //"select all" change 
    $(".date").attr('disabled',false);

    $("input[name='student_count[]']").prop('checked', $(this).prop("checked"));
    students_list = new Array();
    students_name = new Array();

    $.each($("input[name='student_count[]']:checked"), function() {
           var data = $(this).parents('tr:eq(0)');
           students_name.push($(data).find('td:eq(3)').text().trim());

           students_list.push({'students_id':$(data).find('td:eq(1)').text().trim()});             
                        
       });
       $("#students_name").html('<b>'+students_name.toString()+'</b>');
       $("#students_count").html('<h5>'+students_name.length+' Selected</h5>');


       
        // generate_promote_transfer();
       
});


function generate_transfer()
{
    $(".group").hide();  
    $(".section_group").hide();
     students_list = new Array();
    // students_name = new Array();
        if(students_name.length !=0){
                swal({
              title: "Are you sure?",
              text: "All Selected Students will be Promoted or Transfered",
              type: "info",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Move To Common Pool!",
              cancelButtonText: "Promote!",
              closeOnConfirm: false,
              closeOnCancel: false,

            },
            function(isConfirm){
              if (isConfirm) { //transfer
                swal({
              title: "Are you sure?",
              text: "All Selected Students will be Moved To Common Pool!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes!",
              cancelButtonText: "No",
              closeOnConfirm: false,
              closeOnCancel: false,
        showLoaderOnConfirm: true,

            },
            function(isConfirm){
                  if (isConfirm) {
                     identity = {'identity':'transfer'};
                     students_list = new Array();
                  $("#sample_3 tbody").find('input[name="student_count[]"]').each(function(){
                    var data = $(this).parents("tr");
                    // console.log(data);
                if($(this).is(":checked")){
                    // console.log('if');
                    students_list.push({
                            'unique_id_no':$(data).find('td:eq(1)').text().trim(),
                            'transfer_flag':1,
                            'transfer_reason':3,
                            'class_id':$("#class_id").val(),
                            'medium_of_ins':$(data).find('td:eq(6)').find('input').val(),
                            'admission_no':$(data).find('td:eq(5)').find('input').val(),

                    })
                }
            });
                  // console.log(students_list);

                  save_promote_transfer(students_list,identity);
                  }else
                  {
                    swal.close();

                  }
            })
              } else { // promote
                swal.close();

        promote_modal();

                   
               
              }
            });
        }
    
}

function promote_modal()
{
        if(students_name.length !=0){
        old_class_id = $("#class_id").val();
        old_class_section = $("#section_id").val();
        get_stu_section(old_class_id,old_class_section);

        if(old_class_id==11 || old_class_id==12)
        {
            get_group(old_class_id.substr(1,2),null);
            $(".group").show();
        }
        $("#emis_class_study_promote").val(old_class_id).attr('selected','selected');
     $("#promote_modal").modal('show');
    }
}

$("#emis_class_study_promote").change(function(){
        var new_class_id = $(this).val();

        get_stu_section(new_class_id,null);

        if(new_class_id==11 || new_class_id==12)
        {
            $(".group").show();

            get_group(new_class_id.substr(1,2),null);
        }else
        {
    $(".group_det").empty('');  

            $(".group").hide();
        }
})
function get_group(class_id,group_id)
    {
        // alert(group_id);

        $.ajax({
        type: "POST",
        url:baseurl+'Home/get_common_tables',
        data:{'class_id':class_id,'table':'baseapp_group_code','where_col':'group_description'},
        success: function(resp){

    $(".group_det").empty('');  
            // $(".group").show();


        var group_drop = '<select name="emis_reg_grup_code" class="form-control" id="emis_reg_grup_code">';

        group_drop += '<option value="">Select Group</option>';
        $.each(JSON.parse(resp),function(id,val)
        {
            group_drop +='<option value='+ val.id +'>'+val.group_code+'-'+val.group_name+'</option>';
        })
            group_drop +='</select>';
            
            $(".group_det").append(group_drop); 
            // alert(section_id);
            if(group_id !='' && group_id !=null){
            $("#emis_reg_grup_code").val(group_id).attr('selected','selected');   
            }else
            {
                // console.log('else');
                // $("#emis_reg_grup_code").val().attr('selected','selected');
            }  
        }

        })
    }

    function get_stu_section(class_id,section_id)
    {
  // alert(section_id);

      if(class_id !=0){
        $(".section_group").show();
    $.ajax(
    {
        type: "POST",
        url:baseurl+'Home/get_school_section_details',
        data:{'class_id':class_id},
        success: function(resp){
        // alert(resp);  
       
        var section = JSON.parse(resp);
        // console.log(section);
            $(".section_det").empty('');            

        var section_drop = '<select name="emis_reg_stu_section" class="form-control" id="emis_reg_section_id">';

        section_drop += '<option value="">பிரிவு</option>';
        $.each(section,function(id,val)
        {
            section_drop +='<option value='+ val.section +'>'+val.section+'</option>';
        })
            section_drop +='</select>';
            
            $(".section_det").append(section_drop); 
            // alert(section_id);
            if(section_id !='' && section_id !=null){
            $("#emis_reg_section_id").val(section_id).attr('selected','selected');   
            }else
            {
                // console.log('else');
                // $("#emis_reg_section_id").val(0).attr('selected','selected');
            }      
         },
          
    })
    }
    }
function generate_promote()
{
     students_list = new Array();

     swal({
              title: "Are you sure?",
              text: "All Selected Students will be Promoted!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes!",
              cancelButtonText: "No",
              closeOnConfirm: false,
              closeOnCancel: false,
        // showLoaderOnConfirm: true,

            },
            function(isConfirm){
                  if (isConfirm) {
     students_list = new Array();

                    identity = {'identity':'promote'};
                    var old_class_id = $("#class_id").val();
                     var new_class_id = $("#emis_class_study_promote").val();
                     var new_section_id = $("#emis_reg_section_id").val();
                     var group_code_id = ''
                     if(new_class_id ==11 || new_class_id  ==12)
                     {
                        group_code_id = $("#emis_reg_grup_code").val();
                     }else
                     {
                        group_code_id = null;
                     }
                     console.log(old_class_id,new_class_id);
                     if(new_section_id !=''){

                    if(parseInt(new_class_id) > parseInt(old_class_id))
                    {
                        console.log('if');
                           $("#sample_3 tbody").find('input[name="student_count[]"]').each(function(){
                    var data = $(this).parents("tr");
                    
                if($(this).is(":checked")){
                    
                                students_list.push({
                                        'unique_id_no':$(data).find('td:eq(1)').text().trim(),
                                        'pass_fail':'PASS',
                                        'prv_class_std':old_class_id,
                                        'class_studying_id':new_class_id,
                                        'class_section':new_section_id,
                                        'group_code_id':group_code_id,

                                })
                            }
                        });
                  
                    }else if(parseInt(new_class_id) == parseInt(old_class_id))
                    {
                        console.log('else if');

                                $("#sample_3 tbody").find('input[name="student_count[]"]').each(function(){
                    var data = $(this).parents("tr");
                    
                if($(this).is(":checked")){
                    
                                students_list.push({
                                        'unique_id_no':$(data).find('td:eq(1)').text().trim(),
                                        'pass_fail':'PASS',
                                        'prv_class_std':old_class_id,
                                        'class_studying_id':new_class_id,
                                        'class_section':new_section_id,
                                        'group_code_id':group_code_id,

                                })
                            }
                        });
                    }else if(parseInt(old_class_id) == 13 || parseInt(old_class_id) ==14 || parseInt(old_class_id) ==15)
                    {
                        $("#sample_3 tbody").find('input[name="student_count[]"]').each(function(){
                    var data = $(this).parents("tr");
                    
                if($(this).is(":checked")){
                    
                                students_list.push({
                                        'unique_id_no':$(data).find('td:eq(1)').text().trim(),
                                        'pass_fail':'FAIL',
                                        'prv_class_std':old_class_id,
                                        'class_studying_id':new_class_id,
                                        'class_section':new_section_id,
                                        'group_code_id':group_code_id,

                                })
                            }
                        });
                    }else if(parseInt(new_class_id) < parseInt(old_class_id))
                    {
                        // console.log('else');

                        swal('Not Allowed','Please Select Valid Class','error');
                        return false;
                    }
                  save_promote_transfer(students_list,identity);
                }else
                {
                    // console.log('else');
                    swal('Required','Please Select Section','error');
                }
                  }else
                  {
                    swal.close();

                  }
                })
}



function save_promote_transfer(data,identity)
{
        if(data.length !=0)
        {
            // console.log('714',data);return false;

            $.ajax(
            {
                method:"POST",
                dataType:"JSON",
                url:'<?=base_url()."Home/update_students_promote_transfer_details"?>',
                data:{data,identity},
                success:function(res)
                {
                    // console.log(res);
                    if(res)
                    {
                        swal({
                          title: "Student Transfer/Promote",
                          text: "Updated Successfully",
                          type: "success",
                            
                          confirmButtonColor: "#DD6B55",
                          confirmButtonText: "OK",
                        },
                        function(isConfirm)
                        {
                                window.location.reload();
                        })
                    }
                }
            })
        }
}

</script>