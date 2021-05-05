
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
.panel-heading span {
    margin-top: -20px;
    font-size: 15px;
}
body.modal-open {
    overflow-y: hidden !important;
    position: fixed;
}
   .clickable{
    cursor: pointer;   
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
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg" style="width:1015px !important;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="sch_id"></h4>
       <!--<h4 class="modal-title" id="hid" value=""></h4>-->
        </div>
        <div class="modal-body">
                 <table class="table table-striped table-bordered table-hover" id="sample_3">
                  <thead>
                    <tr>
            <th>Medium</th> <th class="">Class 11</th> <th class="">Class 12</th> 
                  </tr>
                  </thead>
                <tbody>
                  
                </tbody> 
                <!-- <tfoot>
                  <tr>
                    <th>Total</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>

                  </tr>
                </tfoot> -->
            </table>

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">Eligible  Post SubjectWise</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                 <div class="panel-body">
                  <div class="row" id="elig_group">
                  
                     </div>
                </div>
                
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
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
														<?php 
													
														?>
                                                            <i class="fa fa-globe"></i>Staff Fixation  Higher Secondary- <?php echo $dist_id; ?><span> </span></div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                                       
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center">S.No</th>
																	 <th class=" center">block_name</th>
                                                                     <th class=" center">Udise Code</th>
                                                                     <th class=" ">School Name</th>
																	 <th class=" center">Enr<br> 11st</th>
																	   <th class=" center">Enr <br>12nd</th>
																	   
                                                                    
                                                                </tr>
                                                                </thead>
                                                               <tbody>
                                                            <?php if(!empty($school_details)){ 
															foreach($school_details as $index=> $sd){   
                                // echo $sd->teach_status;
                                ?>

                                                                <tr>
                                                                   <td class="center"><?=$index+1;?></td>
																   <td class="center"><?=$sd->block_name;?></td>
                                                                   <td class="center">
                                                                    <?php if($sd->teach_status!=2){?>
                                                                    <a href="javascript:void(0);"onclick="openmodel(<?=$sd->school_id?>)"><?=$sd->udise_code;?></a>
                                                                    <?php }else{
                                                                      echo $sd->udise_code;}
                                                                      ?>
                                                                     
                                                                  
                                                                  </td>
                                                                   <td><?=$sd->school_name;?></td>
                                                                    
																   <td class="center"><?=$sd->class11?></td>
                                                                   <td class="center"><?=$sd->class12?></td>
																   
                                                                </tr>
                                                                <?php  }  ?>
                                                                
                                                      
                                                            </tbody>
                                                           <!-- <tfoot>
                                                                <th colspan="2" class="center">Total</th>
                                                                <th class="center"></th>
                                                                <th class="center"></th>
                                                                <th class="center"></th>
                                                                <th class="center"></th>

                                                            </tfoot>-->
                                                            <?php } ?>
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
              <script type="text/javascript">
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
        </script>
             
<script type="text/javascript">
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

$(document).ready(function()
{
    _dataTable('#sample_3');
});

function _dataTable(dataId){
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
            // console.log(column.data());
            var  sum = column
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
               
            
            $(column.footer()).html();
                        });
            }
        });
    }
        </script>

         <script>

                var students_info_details = <?php echo json_encode($school_details);?>;
                var class_1_5 = [];
                var class_6 = [];
                var class_7 = [];
                var class_8 = [];
                var class_9 = [];
                var class_10 = [];
                var class_6_8 =0;
                var class_9_10 =0; 
                var sch_id = '';
                var stu_count = [];
function openmodel(school_id)
{

    var stu_info_detail = students_info_details.filter(stu=>stu.school_id==school_id)[0];
    console.log(stu_info_detail);
    get_tamil_engilsh_stu_count(school_id);

    text_val('id',stu_info_detail.id);

    //Post Subjectwise
    text_val('elig_sg',stu_info_detail.elig_sg);
    text_val('elig_sci',stu_info_detail.elig_sci);
    text_val('elig_mat',stu_info_detail.elig_mat);
    text_val('elig_eng',stu_info_detail.elig_eng);
    text_val('elig_tam',stu_info_detail.elig_tam);
    text_val('elig_soc',stu_info_detail.elig_soc);
    text_val('elig_sub_tot',stu_info_detail.elig_tot);

    //sanc
    text_val('sanc_sg',stu_info_detail.sanc_sg);
    text_val('sanc_sci',stu_info_detail.sanc_sci);
    text_val('sanc_mat',stu_info_detail.sanc_mat);
    text_val('sanc_eng',stu_info_detail.sanc_eng);
    text_val('sanc_tam',stu_info_detail.sanc_tam);
    text_val('sanc_soc',stu_info_detail.sanc_soc);
    text_val('sanc_tot',stu_info_detail.sanc_tot);

    //avail Data
    text_val('avail_sg',stu_info_detail.avail_sg);
    text_val('avail_sci',stu_info_detail.avail_sci);
    text_val('avail_mat',stu_info_detail.avail_mat);
    text_val('avail_eng',stu_info_detail.avail_eng);
    text_val('avail_tam',stu_info_detail.avail_tam);
    text_val('avail_soc',stu_info_detail.avail_soc);
    text_val('avail_tot',stu_info_detail.avail_tot);

    //need post
    text_val('need_sg',stu_info_detail.need_sg);
    text_val('need_sci',stu_info_detail.need_sci);
    text_val('need_mat',stu_info_detail.need_mat);
    text_val('need_eng',stu_info_detail.need_eng);
    text_val('need_tam',stu_info_detail.need_tam);
    text_val('need_soc',stu_info_detail.need_soc);
    text_val('need_tot',stu_info_detail.need_tot);

    //surpuls wp
    text_val('surp_w_sg',stu_info_detail.surp_w_sg);
    text_val('surp_w_sci',stu_info_detail.surp_w_sci);
    text_val('surp_w_mat',stu_info_detail.surp_w_mat);
    text_val('surp_w_eng',stu_info_detail.surp_w_eng);
    text_val('surp_w_tam',stu_info_detail.surp_w_tam);
    text_val('surp_w_soc',stu_info_detail.surp_w_soc);
    text_val('surp_w_tot',stu_info_detail.surp_w_tot);

    // surpuls wop
    text_val('surp_wo_sg',stu_info_detail.surp_wo_sg);
    text_val('surp_wo_sci',stu_info_detail.surp_wo_sci);
    text_val('surp_wo_mat',stu_info_detail.surp_wo_mat);
    text_val('surp_wo_eng',stu_info_detail.surp_wo_eng);
    text_val('surp_wo_tam',stu_info_detail.surp_wo_tam);
    text_val('surp_wo_soc',stu_info_detail.surp_wo_soc);
    text_val('surp_wo_tot',stu_info_detail.surp_wo_tot);

    //edit data 
    // if(stu_info_detail.length !=0){
    //             elig_text +=generate_text_box('','hidden','id'+i,i,true,(res.teacher_panel1.length !=0?res.teacher_panel1[i].id:''))
    //           }
    $("#sch_id").text(stu_info_detail.school_name+'-'+stu_info_detail.udise_code);
    sch_id = school_id;


$('#myModal').modal('show');
}         


function get_tamil_engilsh_stu_count(school_id)
{
    var data = {'sch_id':school_id};
    if($.fn.dataTable.isDataTable('#sample_3')){
           $('#sample_3').DataTable().clear().destroy();


                   }

                   stu_count =[];
    $.ajax({

        method:"POST",
        url:"<?=base_url().'Ceo_District/get_mediumwise_school_students_count'?>",
        data:data,
        dataType:'json',
        success:function(res)
        {
            var stu_list = res.stu_count;
            var student_table = '';
            var sub_count = res.sub_count;
            var elig_text = '';
            $("#sample_3 tbody").empty();
            var j = 0;
            stu_list.map(function(val,i)
            {
              // console.log(val);
              if(val.Medium != 'None'){
                i = j;
              student_table +='<tr>';
              student_table +='<td>'+val.Medium+'</td><td>'+val.Class11+'</td><td>'+val.Class12+'</td></tr>';

              
              //text box 

              // elig_text += generate_text_box('Eligible Post (1-5)','text','elig_1_5'+i,i,false,(res.teacher_panel1.length !=0?res.teacher_panel1[i].elig_1_5:''));
              // elig_text += generate_text_box('Eligible post as per RTE (6-8)','text','elig_6_8'+i,i,false,(res.teacher_panel1.length !=0?res.teacher_panel1[i].elig_6_8:''));
              // elig_text += generate_text_box('Eligible Post as per 525 GO (9-10)','text','elig_9_10'+i,i,false,(res.teacher_panel1.length !=0?res.teacher_panel1[i].elig_9_10:''));
              // elig_text += generate_text_box(val.Medium+' Medium Total Eligible Post ','text','elig_tot'+i,i,true,(res.teacher_panel1.length !=0?res.teacher_panel1[i].elig_tot:''));
              // if(res.teacher_panel1.length !=0){
              //   elig_text +=generate_text_box('','hidden','id'+i,i,true,(res.teacher_panel1.length !=0?res.teacher_panel1[i].id:''))
              // }
              j++;
              }


            });

            sub_count.map(function(val,i)
            {
                elig_text += generate_text_box(val.subject,'None');
                elig_text += generate_text_box('Eligible','text','elig'+i,i,false,'');
                elig_text += generate_text_box('Sanctioned','text','elig'+i,i,false,'');
                elig_text += generate_text_box('Available','text','elig'+i,i,false,'');
                elig_text += generate_text_box('Need','text','elig'+i,i,false,'');
                elig_text += generate_text_box('Surplus W/P','text','elig'+i,i,false,'');
                elig_text += generate_text_box('Surplus WO/P','text','elig'+i,i,false,'');
                
            })

            // console.log(class_6);
            $("#sample_3 tbody").html(student_table);
            $("#elig_group").html(elig_text);
            // var table = _dataTable("#sample_3");
        }
    })
}

function generate_text_box(label,type,id,field_no,read,value)
  {
      var text_val  = ''
      // console.log(read);
      if(type=='hidden')
          {
            text_val = '<input type='+type+' class="form-control" id="'+id+'" name="'+id+'" placeholder="" value='+value+'>'
          }
        else if(read==false){
      // text_val += '';

          
      text_val = '<div class="col-md-2" style="width:13.666667%"><label class="control-label">'+label+'</label><div class="form-group"><input type="text" class="form-control elig_class'+field_no+'" id="'+id+'" name="'+id+'" placeholder="" onkeydown="return number_format()" maxlength="3" onchange="dynamic_grand_sum('+"'elig_tot'"+',this.value,'+field_no+');" value='+value+'></div></div>';
          
        // text_val +='</div>'; 
      }else if(type=='None')
      {
        text_val = '<div class="col-md-2" ><label class="control-label" style="margin-top:35px;">'+label+'</label></div>'
      }
      else
      {
        text_val = '<div class="col-md-3"><label class="control-label">'+label+'</label><div class="form-group"><input type='+type+' class="form-control" id="'+id+'" name="'+id+'" placeholder="" readonly value='+value+'></div></div>';                  
      }
      return text_val;
  }


  var grand_sum =0;
  
function grand_total(id,val,flag)
{
  // console.log(flag);
  var tot = '';
  grand_sum = 0;

      switch(parseInt(flag))
      {
        case 1:
          $('.elig_class').map(function()
          {
              if($(this).val() !=''){
              grand_sum += parseInt($(this).val());
              }
          })  
          // console.log(grand_sum);
            text_val(id+flag,grand_sum);
        break;
        case 2:
          $('.elig_type').map(function()
          {
              if($(this).val() !=''){
              grand_sum += parseInt($(this).val());
              }
          })  
          // console.log(grand_sum);
         text_val(id,grand_sum);

        break;
        case 3:
          $('.sanc_class').map(function()
          {
              if($(this).val() !=''){
              grand_sum += parseInt($(this).val());
              }
          })  
         text_val(id,grand_sum);

        break;
        case 4:
          $('.avai_class').map(function()
          {
              if($(this).val() !=''){
              grand_sum += parseInt($(this).val());
              }
          })  
         text_val(id,grand_sum);

        break;
        case 5:
          $('.need_class').map(function()
          {
              if($(this).val() !=''){
              grand_sum += parseInt($(this).val());
              }
          })  
         text_val(id,grand_sum);

        break;
        case 6:
          $('.surp_w_class').map(function()
          {
              if($(this).val() !=''){
              grand_sum += parseInt($(this).val());
              }
          })  
         text_val(id,grand_sum);

        break;
        case 7:
          $('.surp_wo_class').map(function()
          {
              if($(this).val() !=''){
              grand_sum += parseInt($(this).val());
              }
          })  
         text_val(id,grand_sum);

        break;
      }
      // $("#elig_tot1").val(2);
      // console.log(tot);
}

function dynamic_grand_sum(id,val,flag)
{
  // alert();
    grand_sum = 0;
      

    console.log(stu_count);
    for(var i=0;i<stu_count.result.length;i++){
      // console.log(i);
      switch(parseInt(flag)){
        case i:
          $('.elig_class'+flag).map(function()
          {
              if($(this).val() !=''){
              grand_sum += parseInt($(this).val());
              }
          })  
          console.log(grand_sum);
            text_val(id+flag,grand_sum);
          
        break;
          }


    }
    // total_grand_sum += get_text_value(id+flag);

    // console.log(total_grand_sum);

}

function text_val(id,value)
{
  // console.log(id);
    $("#"+id).val(value);

}

function number_format()
{
                return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )
}

function add_sum(sanc_id,avai_id,surplus_id){
  // alert();


  var sanc_val = get_text_value(sanc_id);
  var avai_val = get_text_value(avai_id);
  var total = '';
    if(sanc_val !='' && avai_val !='')
    {
      total = +sanc_val - +avai_val;
      // console.log(total);
    }else
    {
      text_val(surplus_id,'');
    }
  
  // sup_need_value(surplus_id,total);
}

function sup_need_value(id,value)
{
    var color = '';
    grand_sum = 0;
    if(value >0)
    {
      color = 'green';
    }else
    {
      color = 'red';
    }

      $("#"+id).val(value).attr('style','color:'+color);

      $('.surp_class').map(function()
          {
              if($(this).val() !=''){
              grand_sum += parseInt($(this).val());
              }
          })  
         text_val('tot',grand_sum);
}


function get_text_value(id)
{
   return  $("#"+id).val();
}
var status = false;
var total_grand_sum = 0;
$("#save").click(function()
{
    // alert();
    total_grand_sum = 0;
    console.log(medium_id);
      for(var i=0;i<medium_id.length;i++)
       {
          // if(stu_count.result[i].Medium !="None"){
        // console.log(stu_count.result[i].Medium);
        // console.log(i);
          total_grand_sum += +get_text_value('elig_tot'+i);
          // }
       } 

       var elig_sub_tot = +get_text_value('elig_sub_tot');
        // console.log(total_grand_sum);return false;
        console.log(elig_sub_tot,total_grand_sum);
    $("#err_msg").html('');
    status = false;

    
    var save_val = $("form").serializeArray();
$(save_val).each(function( index, element ) {
    if(element.value =='')
    {
       // var name = element.name.replace(/[_-]/g, " ");
       // name = name.toUpperCase();
       // console.log(element);
       if(element.name!='id'){
        $("#err_msg").html('<h5 style="color:red">Please Enter All Filed </h5>');
        status = false;
        return false;
        }
    }else if(total_grand_sum != elig_sub_tot)
    {
        $("#err_msg").html('<h5 style="color:red">Eligible Post SubjectWise Total should be Equal to Gradewise Total</h5>');

        status =false;
        return false;
    }
        // alert();
        status = true;
     

});
// console.log(status);
    if(status=='true')
    {
      // console.log($("form").serializeArray());

      // console.log(stu_count);return false;
      swal({
                title: "Are you sure?",
                text: "Staff Details Cannot be Edited after Final Sumbit.Are You Sure?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#ff0000",
                confirmButtonText: "Yes, Final Submit!",
                cancelButtonText:'Save',
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function(isConfirm){
                if (isConfirm)
                {
       var data = {'records':$("form").serialize(),'sch_id':sch_id,'stu_1':class_1_5,'class_6':class_6,'class_7':class_7,'class_8':class_8,'class_9':class_9,'class_10':class_10,'count':medium_id.length,'medium':medium_id,'status':2};

      $.ajax({
        method:"POST",
        url:"<?=base_url().'Ceo_District/save_staff_schoollist_count'?>",
        data:data,
        dataType:'JSON',
        success:function(res)
        {
          // console.log(res);
          if(res)
          {
            swal({
                title: "Successfully Added Staff Details!",
                type: "success",
                showCancelButton: false,
                confirmButtonColor: "#ff0000",
                confirmButtonText: "ok!",


            }, function(isConfirm){
                if (isConfirm)
                {
                  window.location.reload();
                }
              })
          }
        }
      })

      }else
      {
        // alert();
          var data = {'records':$("form").serialize(),'sch_id':sch_id,'stu_1':class_1_5,'class_6':class_6,'class_7':class_7,'class_8':class_8,'class_9':class_9,'class_10':class_10,'count':medium_id.length,'medium':medium_id,'status':1};

      $.ajax({
        method:"POST",
        url:"<?=base_url().'Ceo_District/save_staff_schoollist_count'?>",
        data:data,
        dataType:'JSON',
        success:function(res)
        {
          // console.log(res);
          if(parseInt(res))
          {
            swal({
                title: "Successfully Added Staff Details!",
                type: "success",
                showCancelButton: false,
                confirmButtonColor: "#ff0000",
                confirmButtonText: "ok!",


            }, function(isConfirm){
                if (isConfirm)
                {
                  window.location.reload();
                }
              })
          }
        }
      })
      }
    })
  }

})




</script>
    </body>

</html>