<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>

        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
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
                                <div class="container">
                                    <!-- BEGIN PAGE TITLE -->
                                    <div class="page-title">
                                        <h1>Pending Transfer request - Student list
                                             
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
                                       
                                    <div class="portlet-body">
                                          <div class="row" style="margin-left: 6px;">
                                             
                                                      <label class="control-label"></label>
                                                      <form  method="POST" >
                                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_state_fix" name="emis_state_fix" required="" onchange="this.form.submit()"   style="  width: inherit;">
                                                              <option value="0">District</option>
                                                               <?php  foreach($dist_id1 as $dist){?>
                                                               <option value="<?php echo $dist->district_name;?>"><?php echo $dist->district_name;?></option>
                                                             <?php } ?>
                                                         </select>
                                                         </form>
                                              </div>    
                                              <br/>
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> Requested Student list for Transfer | <span>District : <?php if($dist_name!="") { echo $dist_name; } ?></span> </div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th>Unique id</th>
                                                                    <th>Name</th>   
                                                                    <th>DOB</th>
                                                                    <th>Class</th>
                                                                    
                                                                    <th>Current School</th>           
                                                                    <th>Requested School Name</th>
                                                                    <th>Requested Date</th>
                                                                    <th>Transfer <input type="checkbox" id="select_all"> </th>
                                                                    <th>Action</th>
                                                                </tr>
                                                                </thead>
                                                               
                                                            <?php if(!empty($details)){ foreach($details as $index=> $det){ ?>

                                                                <tr>
                                                                    <td><?=$index+1;?></td>
                                                                    <td><?php echo $det->unique_id_no; ?></td>
                                                                    <td><?php echo $det->name; ?></td>
                                                                    <td><?php echo date('d-m-Y',strtotime($det->dob)); ?></td>
                                                                    <td><?php echo $det->class_studying_id; ?></td>
                                                                    <td><?=$det->old_school;?></td>
                                                                    
                                                                    <td><?php echo $det->school_name; ?></td>
                                                                    <td><?php echo date('d-m-Y',strtotime($det->request_date)); ?></td>
                                                                    <td style="text-align: center !important;"><input type="checkbox" class="checkbox" id="student_details" name="student_count[]"></td>
                                        <td>
                                        <button class="btn red" onclick="save_reject(<?=$det->unique_id_no;?>)">Reject</button></td>
                                                                   
                                                                   
                                                                </tr>
                                                                <?php } } ?>
                                                                
                                                      
                                                            </tbody>
                                                        </table>
                                                        <div class="row">
                                                    <div class="col-md-8">
                                                        <div>Selected Students Name : <span id="students_count"></span><br/><span id="students_name"> </span></div>
                                                    </div>
                                                       <div class="col-md-3">
        <button type="sumbit" class="btn green btn-lg sub" onclick="save_transfer();">Submit</button>
                             </div>  
                                                      
                                                    
                                                </div>
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

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
            </div>

                  <?php $this->load->view('footer.php'); ?>
        </div>

        <?php $this->load->view('scripts.php'); ?>
                <script src="<?php echo base_url().'asset/js/district.js';?>" type="text/javascript"></script>
           <script type="text/javascript">
               function saveblockid(value){
                var baseurl='<?php echo base_url(); ?>';
                // alert(value);
                $.ajax({
                type: "POST",
                url:baseurl+'corporation/saveblockidsession',
                data:"&block_id="+value,
                success: function(resp){ 
                if(resp==true){  
                window.location.href = baseurl+'corporation/emis_district_blocks_classwise'; 
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





        <!-- BEGIN PAGE LEVEL PLUGINS -->
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
        <!-- END PAGE LEVEL SCRIPTS -->

             

    </body>
    <script type="text/javascript">
       
             var table = '';
    $(document).ready(function()
{
   var table =  sum_dataTable('#sample_3');
});
   function sum_dataTable(dataId){
    // alert();
    table = $(dataId).DataTable({
      dom: 'Blfrtip',
      "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

      order: [[0, "asc"]],
            lengthMenu: [[5, 10, 15, 20, 100], [5, 10, 15, 20, 100]],
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
    </script>
    <script type="text/javascript">
        var students_details = <?=json_encode($details);?>;
        var students_list = new Array();
        var students_name = new  Array();
        $("input[name='student_count[]']").click(function(){
    // alert();
    // $(".date").attr('disabled',false);
    students_list = new Array();
    students_name = new Array();
       $.each($("input[name='student_count[]']:checked"), function() {
            var data = $(this).parents('tr:eq(0)');
            var trans_stu = 2;
            var label = 'Transfer Request by Parent';

           students_name.push($(data).find('td:eq(2)').text().trim());
           var stu_id = $(data).find('td:eq(1)').text().trim();
           var students_detail = students_details.filter(stu=>stu.unique_id_no==stu_id)[0];
           students_list.push({'unique_id_no':students_detail.unique_id_no,'school_id_transfer':students_detail.school_id,'school_id_transfer':students_detail.school_id,'class_studying_id':students_detail.class_studying_id,'process_type':1,'admission_no':students_detail.school_admission_no,'medium_of_ins':students_detail.education_medium_id,'transfer_reason':trans_stu,'label':label});             
       });
       $("#students_name").html('<b>'+students_name.toString()+'</b>');
       $("#students_count").html('<h5>'+students_name.length+' Selected</h5>');
       console.log('582',students_list);
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
           students_name.push($(data).find('td:eq(2)').text().trim());
           var trans_stu = 2;
           var label = 'Transfer Request by Parent';
           var stu_id = $(data).find('td:eq(1)').text().trim();
           var students_detail = students_details.filter(stu=>stu.unique_id_no==stu_id)[0];
           students_list.push({'unique_id_no':students_detail.unique_id_no,'school_id_transfer':students_detail.school_id,'school_id_transfer':students_detail.school_id,'class_studying_id':students_detail.class_studying_id,'process_type':1,'admission_no':students_detail.school_admission_no,'medium_of_ins':students_detail.education_medium_id,'transfer_reason':trans_stu,'label':label});               
                        
       });
       $("#students_name").html('<b>'+students_name.toString()+'</b>');
       $("#students_count").html('<h5>'+students_name.length+' Selected</h5>');


       
        // generate_promote_transfer();
       
});
            function save_transfer()
            {

                // console.log(students_list);return false;
                    console.log(students_name.length);
                  
                    $("#err_msg").html('');
                
                    if(students_name.length !=0){
                    swal({  
                        title: "Are you sure?",
                        text: "Do you want to Transfer To Common Pool?",
                        type: "info",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes!",
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true
                    }, function(isConfirm){
                        if(isConfirm){
                    $("#save_trans").hide();    
                    var data = {'records':students_list};
                    // data = {'records':data};
                    // console.log(data);return false;
                    $.ajax(
                    {
                        method:"POST",
                        dataType:"JSON",
                        url:'<?=base_url()."Registration/update_students_transfer_bulk"?>',
                        data:data,
                        success:function(res)
                        {
                            if(res)
                            {
                                $("#transferModal").modal('hide');
                                swal({
                                    title: "Success",
                                    text: students_name.length+' Students Transfered To Common Pool',
                                    type: "success",
                                    
                                    confirmButtonText: "ok",
                                    
                                    // showLoaderOnConfirm: true
                                }, function(isConfirm){
                                    location.reload();
                                             });

                            }
                        }
                    })
                }
            });
           }else
           {
                    swal('Requried','Please Select Any one Person','error');
           }  
                
        }

            function save_reject(id)
            {


                var students_detail = students_details.filter(stu=>stu.unique_id_no==id)[0];
                    $("#err_msg").html('');
                var trans_stu = 2;
                var label = 'Transfer Request by Parent';
                
                
                    $("#save_trans").hide();    
                    var data = {'id':students_detail.unique_id_no};
                    // data = {'records':data};
                    // console.log(data);return false;
                    swal({  
                        title: "Are you sure?",
                        text: "Do you want to Reject Student Request?",
                        type: "info",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes!",
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true
                    }, function(isConfirm){
                        if(isConfirm){
                    $.ajax(
                    {
                        method:"POST",
                        dataType:"JSON",
                        url:'<?=base_url()."Registration/update_students_reject"?>',
                        data:data,
                        success:function(res)
                        {
                            if(res)
                            {
                                $("#transferModal").modal('hide');
                                swal({
                                    title: "Success",
                                    text: students_detail.name+"-"+students_detail.unique_id_no+' Students Rejected',
                                    type: "success",
                                    
                                    confirmButtonText: "ok",
                                    
                                    // showLoaderOnConfirm: true
                                }, function(isConfirm){
                                    location.reload();
                                             });

                            }
                        }
                    })
                    }
                })
            }
    </script>

</html>