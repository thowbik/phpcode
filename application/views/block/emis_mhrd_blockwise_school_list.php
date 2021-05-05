
<?php 

// if(!empty($this->input->get()))
// {
//     $dist = $this->input->get('block');
// }
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
<link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />

<!-- END PAGE LEVEL STYLES -->

</head>
<!-- END HEAD -->

<body class="page-container-bg-solid page-md">
<div class="page-wrapper">
    

<?php $this->load->view('block/header.php'); ?>

    <div class="page-wrapper-row full-height">
        <div class="page-wrapper-middle">
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <!-- BEGIN PAGE HEAD-->
                    <iv class="page-head">
                        <!-- <div class="container"> --
                            <!-- BEGIN PAGE TITLE 
                            <div class="page-title">
                                <!-- <h1>Dashboard
                                    <small>Enrollment in Current year</small>
                                </h1> 
                            </div>
                            END PAGE TITLE
                            <!-- BEGIN PAGE TOOLBAR 
                            <div class="page-toolbar">
                                <!-- BEGIN THEME PANEL 
                   
                                <!-- END THEME PANEL --
                            </div>
                            <!-- END PAGE TOOLBAR --
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

                                  <div class="portlet light">
                                    <center><h3 class="form-section"> I hereby certify that the data submitted is complete and correct to the best of my knowledge</h3></center>
                                   <!--<div class="row">
                                       <div class="col-md-offset-10 col-md-2">
                                    <div class="page-title">
                                             <button onclick="goBack()" class="btn green"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
                                         </div>
                                     </div>
                                    </div>
                                    </div>
                               
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="#">
                                    <div class="col-md-3">
                                        <div class="bs-callout-lightsteelblue dashboard-stat2">
                                            <div class="display">
                                                <div class="number">
                                                    <h4 class="font-green-sharp">
                                                 <span class="bottom" data-counter="counterup" data-value="34">Total Students</span></h4>
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
                                    </div></a>-->
                                     
                                    </div>
                                </div> 
                            <!-- <?php echo $dist;?> -->
                                        <div class="portlet box green">
                                            <div class="portlet-title col-md-12">
                                                <div class="caption col-md-4">
                                                    <i class="fa fa-globe"></i> School Declaration </div>
                                                    <div class="col-md-5" style=""><h4></h4></div>
                                                <div class="col-md-3 tools">  </div>
                                                
                                            </div>
                                            <div class="portlet-body">
                                            
                                                <table class="table table-striped table-bordered table-hover" id="sample_3">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th class="center">UDISE Code</th> 
                                                            <th class="">School Name </th>
                                                           
                                                            
                                                        
                                                            <th class="center">School Auth Name </th>
                                                            <th class="center">School Auth Desig</th>
                                                            <th class="center">School Auth Date</th>
                                                            <th class="center">DCF Auth Name </th>
                                                            <th class="center">DCF Auth Desig </th>
                                                            <th class="center">DCF Auth Date </th>

                                                            <!-- <th>Total Not Marked</th> -->
                                                            
                                                        </tr>
                                                        </thead>
                                                    <tbody>
                                                       <?php 

                                                       if(!empty($mhrd_details)){ 
                                                        // print_r($student_details_schoolwise);
                                                       
                                                        foreach($mhrd_details as $index=> $det){ 
                                                                
                                                            
                                                        ?>
                                                        <tr class="center">
                                                            <td><?=$index+1;?></td>
                                                            <td ><?=$det->udise_code?>
                                                            </td>
                                                            <td style="text-align: left;"><?=$det->school_name;?></td>
                                                            
                                                            <td><?=$det->dcf_certify_by_school_auth_name;?>
                                                                <input type="hidden" value="<?=$det->id;?>" id="id<?=$index;?>">
                                                            </td>
                                                            

                                                            <td><?=$det->dcf_certify_by_school_auth_desig;?></td>
                                                            <td><?=date('d-m-Y',strtotime($det->dcf_certify_by_school_auth_date));?></td>
                                                            <td><input type="text" id="crc_auth_name<?=$index;?>" value="<?=$det->dcf_certify_by_crc_auth_name;?>" class="form-control"></td>
                                                            <td><input type="text" id="crc_auth_desig<?=$index;?>" value="<?=$det->dcf_certify_by_crc_auth_desig;?>" class="form-control"></td>
                                                            <td><input type="text" id="crc_auth_date<?=$index;?>" value="<?=($det->dcf_certify_by_crc_auth_date !=''?date('d-m-Y',strtotime($det->dcf_certify_by_crc_auth_date)):'');?>" class="form-control date"></td>
                                                            
                                                        </tr>

                                                    <?php 

                                                    
                                                    // array_push($over_not_marked,$not_marked);
                                                } 

                                                    ?>
                                                
                                           
                                                    </tbody>
                                                     
                                                    <?php } ?>
                                    </table>

                                    <?php if(!empty($mhrd_details)){?>
                                                    <div class="row mhrd_final_status" id="mhrd_completed">
                                                        <div class="col-md-offset-9 col-md-2">
                                                            <button type="button" class="btn btn-primary" onclick="save(1);">Save</button>
                                                            <font style="color:red;"><span id="err_msg"></span></font>
                                                        </div>
                                                    </div>
                                                <?php }?>

                                        </div>
                                            </div>
                                        <div class="portlet light mhrd_final_status" id="final_mhrd_data">
                                
                                            <div class="portlet-body form">
                                                <div class="form-body">
                                            <h3 class="form-section"></h3>
                                            <center>
                                             <div class="row">
                                              <input type="hidden" name="id" value="<?=$decleartion_data->id;?>">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label class="control-label col-md-4">Data Entry Operator Name *</label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" id="block_auth_name" name="block_auth_name"  placeholder="Name *"  required=true>
                                                             <font style="color:#dd4b39;"><div id=""></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <br/>
                                             <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label class="control-label col-md-4">Authority Name *</label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" id="block_auth_desig" name="sch_auth_desi"  placeholder="Authority Name"   required=true>
                                                             <font style="color:#dd4b39;"><div id=""></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <br/>
                                        <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label class="control-label col-md-4">Authority Designation *</label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" id="block_auth_date" name="sch_auth_date"  placeholder="Designation *" autocomplete="off" required=true>
                                                             <font style="color:#dd4b39;"><div id=""></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                       </div>
                                       <br/>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-6">
                                                            <button type="button" onclick="save(2);"class="btn green" id="confirm">Submit</button>
                                                           <font style="color:red"> <span id="final_err_msg"></span></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6"> </div>
                                            </div>
                                        </div>
                                        </div>
                                            </div>
                                        </div>
                                            </div>
                                        </div>
                                        <!-- END EXAMPLE TABLE PORTLET-->           
                                        </div>
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
          <?php $this->load->view('footer.php'); ?>
            
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

<script type="text/javascript">

    function saveclassid(value){
        var baseurl='<?php echo base_url(); ?>';
        // alert(value);
        $.ajax({
        type: "POST",
        url:baseurl+'State/savedash_classidsession',
        data:"&class_id="+value,
        success: function(resp){ 
        if(resp==true){  
        window.location.href = baseurl+'State/emis_dash_district_count'; 
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

 <script type="text/javascript">
      $(document).ready(function(){ 
$("#emis_state_report_schcate").change(function(){ 

var emis_state_report_schcate = $("#emis_state_report_schcate").val();

// $.ajax({
//   type: "POST",
//   url:baseurl+'State/get_school_management_data',
//   data:"&emis_state_report_schcate="+emis_state_report_schcate,
//   success: function(resp){
//   // alert(resp);  
//   $("#emis_state_report_schmanage").html(resp);  
//   return true;              
//    },
//   error: function(e){ 
//   alert('Error: ' + e.responseText);
//   return false;  

//   }
//   });

});  }); 

$(document).ready(function(){
    $.fn.datepicker.defaults.format = "dd-mm-yyyy";
   var curr = new Date();

// console.log(curr.getFullYear()-19); 
// var first = new Date(curr.getFullYear(),'01','01');
var end = new Date(curr.getFullYear(),curr.getMonth(), curr.getDate()+1);
$('.date').datepicker({
    // daysOfWeekDisabled: [0,6]
        autoclose:true,
    

// });


}); 
$('.date').datepicker("setEndDate",end);


});



</script>  
<script>
    var table = '';
            $(document).ready(function()
{
   table =  sum_dataTable('#sample_3');

   var total_school = <?=json_encode($total_school);?>;
   var mhrd_details = <?=json_encode($mhrd_details);?>;
   $("#final_mhrd_data").hide();
   // console.log(total_school);
   if(total_school.count == mhrd_details.length)
   {
        
        total_completed_schools = mhrd_details.filter(mhrd=>mhrd.dcf_certify_by_crc_auth_name !=null);
        final_completed_schools = mhrd_details.filter(mhrd=>mhrd.dcf_entry_operator_name!=null);
        if(total_school.count==final_completed_schools.length)
        {
                $(".mhrd_final_status").hide();
        }else
        {
            if(total_school.count == total_completed_schools.length)
            {
                // alert();
                    // $("#mhrd_completed").hide();
                    $("#final_mhrd_data").show();


            }
    }


   }else
   {
        
   }
});

function sum_dataTable(dataId){
    var table = $(dataId).DataTable({
      dom: 'Blfrtip',
      
        buttons: [
                { extend: 'print', className: 'btn default' },
                { extend: 'pdf', className: 'btn default' },
                { extend: 'csv', className: 'btn default' }
            ],
            order: [[0, "asc"]],
            lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
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
    return table;
    }

    function save(id)
    {
        var data = table.rows().data();
        var final_list = new Array();
        switch(id){
            // console.log(data);
            case 1:
        data.each(function(val,index)
        {
            $("#err_msg").html('');
            
                    var crc_name = $("#crc_auth_name"+index).val();
                    var crc_desig = $("#crc_auth_desig"+index).val();
                    var crc_date = $("#crc_auth_date"+index).val();
                    var id = $("#id"+index).val();
                    if(crc_name =='' || crc_desig==''|| crc_date=='')
                    {
                            $("#err_msg").html('<p>Please Enter Text Box</p>');
                            return false;
                            
                    }else
                    {
                        final_list.push({'dcf_certify_by_crc_auth_name':crc_name,'dcf_certify_by_crc_auth_desig':crc_desig,'dcf_certify_by_crc_auth_date':crc_date,'id':id});
                        
                    }

                

        });

            if(final_list.length!=0)
            {
                var data ={'records':final_list};
                $.ajax(
                {
                    method:"POST",
                    data:data,
                    dataType:"JSON",
                    url:'<?=base_url()."Block/save_mhrd_dcf"?>',
                    success:function(res)
                    {
                        swal({
                                    title:"successfully Saved Declaration Details",
                                    type:'success',
                                    confirmButtonText: "Ok",
                                },function(isConfirm)
                                {
                                    window.location.reload();
                                })
                    }
                })
            }
            break;
            case 2:
            var block_auth_name =  $("#block_auth_name").val();
               var block_auth_desig = $("#block_auth_desig").val();
               var block_auth_date = $("#block_auth_date").val();
               $("#final_err_msg").html('');
               if(block_auth_date =='' || block_auth_desig =='' || block_auth_date=='')
               {
                    $("#final_err_msg").html('<p> Please Enter The All Field</p>');
               }else
               {
                data.each(function(val,index)
                {
                    $("#err_msg").html('');
            
                    
                    
                        final_list.push({'dcf_entry_operator_name':block_auth_name,'dcf_certify_by_block_auth_name':block_auth_desig,'dcf_certify_by_block_auth_desig':block_auth_date});
                        
                    

                

                });
                swal({
                title: "Are you sure?",
                text: 'Final School Declaration ',
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
                    $("#confirm").html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:16px"></i>');
                    var data = {'records':final_list};
                    $.ajax({
                    method:"POST",
                    data:data,
                    dataType:"JSON",
                    url:'<?=base_url()."Block/save_mhrd_dcf_final"?>',
                    success:function(res)
                        {
                            swal({
                                        title:"successfully Finaly Saved Declaration Details",
                                        type:'success',
                                        confirmButtonText: "Ok",
                                    },function(isConfirm)
                                    {
                                        window.location.reload();
                                    })
                        }
                    });
                    }
                });
            }
               break;
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