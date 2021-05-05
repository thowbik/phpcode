<?php 

    $this->load->library('session'); 
    $this->load->database(); 
    $this->load->model('Homemodel');
    $school_id=$this->session->userdata('emis_school_id');
    $schoolprofile = $this->Homemodel->getschoolprofiledetails($school_id);
    $schoolname  = $schoolprofile[0]->school_name;
    $udise_code  = $schoolprofile[0]->udise_code;
    $blockname  = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
    $schoolcate  = $this->Homemodel->getcatename($schoolprofile[0]->sch_cate_id);
    $schmanage  = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
    $schdirector  = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);
     $section_details = [];
     array_push($section_details,array('sections'=>1,'section_ids'=>'A'),array('sections'=>2,'section_ids'=>'B'),array('sections'=>3,'section_ids'=>'C'),array('sections'=>4,'section_ids'=>'D'),array('sections'=>'5','section_ids'=>'E'),array('sections'=>6,'section_ids'=>'F'),array('sections'=>7,'section_ids'=>'G'));
      

    //   print_r($this->session->userdata());
     // print_r($section_details);die;
     ?>     
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
.align
{
    text-align: center!important;
}
.toggle.btn {
   
    position: absolute; !important;
    height: 0px !important;
    min-height: 12px !important;
}

.btn:not(.md-skip):not(.bs-select-all):not(.bs-deselect-all) {
    font-size: 12px !important;
    font-weight: 600 !important;
    text-transform: uppercase !important;
    transition: box-shadow .28s cubic-bezier(.4, 0, .2, 1) !important;
    -webkit-border-radius: 2px !important;
    -moz-border-radius: 2px !important;
    -ms-border-radius: 2px !important;
    -o-border-radius: 2px !important;
    border-radius: 2px !important;
    overflow: hidden !important;
     position: none !important; 
    user-select: none !important;
    padding: 5px 12px 17px !important;
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
                        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-toggle-master/css/bootstrap-toggle.min.css';?>" rel="stylesheet">

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
                                    <!-- <div class="page-title">
                                        <h1>All Staff list
                                            
                                        </h1>
                                    </div> -->
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
<!-- <div class="col-lg-12">
        
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-university"></i> <?php if($schoolname!=""){ echo $schoolname; } ?> ( <?php if($udise_code!=""){ echo $udise_code; } ?> )</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                <div class="panel-body">
                    <div class="col-lg-12 col-md-9 ">
					
                                                <div class="col-lg-12 col-md-6 ">
                                                     <h3>Block : <?php if($blockname!=""){ echo $blockname; } ?> <br/></h3>
                                                    <font style="color:#9b9b9b;"><i class="fa fa-calendar"></i> Management :</font>  <?php if($schmanage!=""){ echo $schmanage; } ?> 
                                                    
                                                    <font style="color:#9b9b9b;"><i class="fa fa-map-marker"></i> Category :</font> 
                                                 <?php if($schoolcate!=""){ echo $schoolcate; } ?>
                                                    <br/>
                                                  <font style="color:#9b9b9b;"><i class="fa fa-briefcase"></i> Directorate :</font>  <?php if($schdirector!=""){ echo $schdirector; } ?> 
                                                
                                                   
                                                </div>
                                            </div>

                                                
                </div>
        </div>
    
    </div> -->
                                       
                                           

                                        </div>
                                       

                                </div>

                                    <!-- <div class="portlet light portlet-fit ">
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
                                                  <form action="<?=base_url().'Home/emis_school_student_classwise' ?>" method="post">
                                                    <div class="col-md-4">
                                                     
                                                        <!-- <?php print_r($class_roma);?> --
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
                                        </div> -->
           
                                        <!-- BEGIN CARDS -->
                                        
                                       
                                              
                                                  <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Staff Attendance List  - <?=date('d-m-Y');?> </span><span style="color:red">* Any Updates Made Will be Shown only after 15 mins </span>
                                                </div>

                                            </div>

                                                
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
  </div>
                                                           <!--  <div class="toggleswitch">
  <input type="checkbox" name="toggleswitch" class="toggleswitch-checkbox" id="myonoffswitch" checked>
  <label class="toggleswitch-label" for="myonoffswitch">
        <span class="toggleswitch-inner"></span>
        <span class="toggleswitch-switch"></span>
    </label>
</div> -->
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                    
                                                        <table class="table table-bordered table-hover" id="sample_3">
                                                            <thead>
                                                                <tr>
                                                                    <th class="align"> S.No </th>                        
                                                                    <th class="align"> Teacher Name</th>
                                                                    <!-- <th class="align">Teacher Code</th> -->
                                                                    <th class="align">Desgination </th>
                                                                    <th class="align">Subject</th>           
                                                                    <th class="align">Attendance Status </th>
                                                                    <th class="align" style="width: 135px;">Reason</th>
                                                                    <th class="align">Remarks</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php if(!empty($teacher_list)){
                                                                        $reason_arr = array(
                                                            array('id'=>'CL','name'=>'CL'),
                                                            array('id'=>'EL','name'=>'EL'),
                                                            array('id'=>'OD','name'=>'OD'),
                                                            array('id'=>'ML','name'=>'ML'),
                                                            array('id'=>'LO','name'=>'LOP'),
                                                            array('id'=>'UE','name'=>'UEL'),
                                                            array('id'=>'UA','name'=>'UnAuthorized'),
                                                            array('id'=>'OT','name'=>'Others'));
                                                        // print_r($teacher_list);
                                                                        foreach ($teacher_list as $index => $t_list) {
// CL, EL, OD, ML, LOP, UEL, Other
                                                        
                                                                        ?>
                                                                <tr>
                                                                    <td class="align"><?=$index+1;?></td>
                                                                    <td><?=$t_list->teacher_name;?></td>
                                                                    <!-- <td><?=$t_list->teacher_code;?></td> -->
                                                                    <td><?=$t_list->desgination;?></td>
                                                                    <td><?=$t_list->subjects;?>
                                                                        <input type="hidden" id="teach_att_id<?=$index;?>" value="<?=$t_list->id;?>">
                                                                    </td>
                                                                    <td>
<input type="checkbox" name="att_status[]" value="<?=$index;?>" class="att_toggle att_status" data-toggle="toggle" <?=$t_list->present==1?'data-on="Present" checked':'data-off="Absent"';?>  data-offstyle="danger" id="att_status<?=$index;?>">
                                                                       <input type="hidden" value="<?=$t_list->present?>" id="att_old_status<?=$index;?>">
                                                                        <input type="hidden" value="<?=$t_list->teacher_code;?>" id="teacher_id<?=$index;?>">
                                                                    </td>
                                                                    <td>
                                                                        <select name="att_reason"class="form-control att_reason" id="att_reason<?=$index;?>" onchange="status_res(<?=$index;?>,this.value)" >
                                                                        <option value="">Select Reason</option>
                                                                        <?php foreach($reason_arr as $reason){?>
                                                                            <option value="<?=$reason['id']?>" <?=$reason['id'] == $t_list->attstatus? ' selected="selected"' : '';?>><?=$reason['name'];?></option>
                                                                        <?php }?>
                                                                    </select>
                                                                    <td>
                                                                        
                                                                        <input type="text" class="form-control" value="<?=$t_list->attres;?>" name="other_status<?=$index;?>" id="other_status<?=$index;?>" ></td>
                                                                </tr>
                                                            
                                                      
                                                        <?php } }?>
                                                            </tbody>
                                                        </table>
                                                         
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           
                                                <div class="col-md-offset-9 col-md-3">
                                                <div id="confirm"><button class="btn btn-primary" onclick="save()" >Submit</button></div>
                                                <br/><font style="color:red"><span id="err_msg"></span></font>

                                            </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                        


                                               <br>





                                        <!-- END CARDS -->

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

        <div class="container">
  

  <!-- Modal -->
  


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
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-toggle-master/js/bootstrap-toggle.min.js';?>"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
                            <script src="<?php echo base_url().'asset/js/croppie-VIT/croppie.js'?>" type="text/javascript"></script>
                            <script src="<?php echo base_url().'asset/js/croppie-VIT/croppie.js'?>" type="text/javascript"></script>
                            <script src="<?php echo base_url().'asset/js/tamil-keyboard-VIT/js/utf.js'?>" type="text/javascript"></script>
                            <script src="<?php echo base_url().'asset/js/tamil-keyboard-VIT/js/tamil.js'?>" type="text/javascript"></script>

              <script type="text/javascript">

               function savestudentid1(value){
                var baseurl='<?php echo base_url(); ?>';
                $.ajax({
                type: "POST",
                url:baseurl+'Home/savestudentidsession',
                data:"&studid="+value,
                success: function(resp){ 
                if(resp==true){    
                window.open(baseurl+'Home/emis_student_profile1','_blank');
                 }
                 return true;  
                         
                 },
                error: function(e){ 
                return false;  

                }
                });
               }
              </script>
    </body>
    <script>
            $(document).ready(function(){
				
                $('#emis_reg_stu_idname').on('keydown',function(event){
                    if(event.which==121){
                        // alert();
                        $(this).toggleClass('tamil');
                        return false;
                    }
                    if($(this).hasClass('tamil')){
                        toggleKBMode(event);
                    }else{
                        return true;
                    }
                });
                $('#emis_reg_stu_idname').on('keypress',function(event){
                    if($(this).hasClass('tamil')){
                        convertThis(event);
                    }
                });
            });
			function getdropdown()
	{
	  var drop= $('#emis_reg_stu_rte').val();
      if(drop == 'Yes'){
		$("#rtetype").show();
		}
		else
		{
		$("#rtetype").hide();	
		}
	}
        </script>
        <script>
            function change_checkbox(id) {
                alert();
               // var this = $("#myonoffswitch"+id);
  $("#myonoffswitch"+id).find('.btn').toggleClass('active');
  console.log($("#myonoffswitch"+id).find('.btn').toggleClass('active'));
  if ($("#myonoffswitch"+id).find('.btn-primary').size() > 0) {
    $("#myonoffswitch"+id).find('.btn').toggleClass('btn-primary');
  }
  $("#myonoffswitch"+id).find('.btn').toggleClass('btn-default');
};
        </script>
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
    var table = '';
    $(document).ready(function()
{
   var table =  sum_dataTable('#sample_3',7);

   function sum_dataTable(dataId,col){
    // alert();
    table = $(dataId).DataTable({
      dom: 'Blfrtip',
      "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

      order: [[0, "asc"]],
            lengthMenu: [[ -1], [ "All"]],
            pageLength: -1,
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
        
        buttons: [
                { extend: 'print', className: 'btn default' },
                { extend: 'pdf', className: 'btn default' },
                { extend: 'csv', className: 'btn default' },
           //      {
           //    extend: 'colvis',
           //    columns: ':gt('+col+')',
           //    className: 'btn default',
           //    text:'Select Columns',
             
           // }
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

    var att_status = new Array();
    var att_count = new Array();
    var teacher_details = <?=json_encode($teacher_list);?>;

    $('.att_toggle').bootstrapToggle({
      on: 'Present',
      off: 'Absent'
    });


    $(".att_status").change(function()
    {
            // console.log($(this).is(':checked'));

                    var id = $(this).val();
                    var att_abs_status = $(this).is(':checked');
                    var teach_att_id = $("#teach_att_id"+id).val();
                    var teacher_id = $("#teacher_id"+id).val();
                    var att_old_status = $("#att_old_status"+id).val();
                     var teacher_detail = teacher_details.filter(teach=>teach.teacher_code==teacher_id)[0];
                     // var att_id = $("#att_id"+id).val();
                     // console.log(att_id);
                    if(att_abs_status==true && teach_att_id !='' && att_old_status ==0){
                     att_status.push({'teacher_code':teacher_id,'teacher_name':teacher_detail.teacher_name,'attstatus':'','attres':'','device_id':'Web'});
                        var data = {'records':att_status};
                    console.log(data);
                        swal({
                        title: "Are you sure?",
                        text: 'Marked This Teacher Present ',
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
                        $.ajax(
                        {
                            method:"POST",
                            datType:"JSON",
                            data:data,
                            url:"<?=base_url().'Udise_staff/emis_teacher_attendance_save'?>",
                            success:function(res)
                            {
                                if(res){
                               swal({
                                        title:"successfully Saved Staff Attendance",
                                        type:'success',
                                        confirmButtonText: "Ok",
                                    },function(isConfirm)
                                    {
                                        window.location.reload();
                                    })
                                }
                            }
                        })
                    }else
                    {
                        $("#att_status"+id).bootstrapToggle(att_old_status==1?'on':'off');
                    }

                  })
                    }

    })

    function status_res(i,val)
    {   

            var staff_status = $("#att_status"+i).is(':checked');

                    $("#other_status"+i).val(val); 
        if(val!='')
        {
            
                // if(val=='OT'){
            // console.log(staff_status);
                    // var old_attres = $("#old_attres"+i).val();
                    // console.log(i,val,old_attres,staff_status);
                    // $("#other_status"+i).prop('readonly',false);  
                $("#att_status"+i).bootstrapToggle('off');
                
           
                // $("#att_status"+i).bootstrapToggle('on');

                // swal('Select Staff','Please Select Absent Staff')
            
        }else
        {
                $("#att_status"+i).bootstrapToggle('on');
                
                    // $("#other_status"+i).prop('readonly',true);  

        }
    }
    function save()
    {
            // alert();
            $("#err_msg").html('');
            att_count = $("input[name='att_status[]']:checked").length; // Present Staff Count
            // console.log(teacher_details.length);
            att_absent_count = $("input[name='att_status[]']").not(':checked').length;
            att_status = new Array();
            // att_reason = new Array();
            if(att_count != teacher_details.length){
            $.each($("input[name='att_status[]']"),function()
            {
                    var id = $(this).val();
                    var att_abs_status = $(this).is(':checked');
                    // console.log(att_abs_status);
                    var teach_att_id = $("#teach_att_id"+id).val();
                    var teacher_id = $("#teacher_id"+id).val();
                    // console.log(id);
                    
                   var teacher_detail = teacher_details.filter(teach=>teach.teacher_code==teacher_id)[0];

                            var att_reason = $("#att_reason"+id).val();
                                console.log(att_reason);
                                var att_leave = '';
                                var att_other_status = '';
                                // att_reason.push(att_reason);
                                    att_leave = $("#other_status"+id).val();
                        if(att_reason!='')
                        {      
                            
                            
                                att_status.push({'teacher_code':teacher_id,'teacher_name':teacher_detail.teacher_name,'attstatus':att_reason,'attres':att_leave,'device_id':'Web'});
                        }else
                        {
                            if(att_abs_status==false){
                                $("#err_msg").html('Please Select Absent Staff Reason '+teacher_id);
                                $("#att_reason"+id).focus();
                                $("#att_reason"+id).css('background-color','red');
                                setTimeout(function(){
                                $("#att_reason"+id).css('background-color','');
                                },500);
                            att_status = [];
                                    return false;
                                }
                        }
                    

            });
        }else
        {
                        att_status.push({'teacher_code':'','teacher_name':'','attstatus':'','attres':'','device_id':'Web'});

        }

          // console.log(att_status);return false;
          if(att_status.length==0)
          {
            // $("#err_msg").
          }
          else
          {
            var data = {'records':att_status};
            console.log(data);
                swal({
                title: "Are you sure?",
                text: 'Total Staff Absent '+att_absent_count,
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
                $.ajax(
                {
                    method:"POST",
                    datType:"JSON",
                    data:data,
                    url:"<?=base_url().'Udise_staff/emis_teacher_attendance_save'?>",
                    success:function(res)
                    {
                        if(res){
                       swal({
                                title:"successfully Saved Staff Attendance",
                                type:'success',
                                confirmButtonText: "Ok",
                            },function(isConfirm)
                            {
                                window.location.reload();
                            })
                        }
                    }
                })
            }

          })



         }
    }
</script>
</html>