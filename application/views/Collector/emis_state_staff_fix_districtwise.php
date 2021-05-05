<?php 

    $this->load->library('session'); 
    $this->load->database(); 
    $this->load->model('Homemodel');
    $school_id=$this->session->userdata('emis_school_id');
    $schoolprofile = $this->Homemodel->getschoolprofiledetails($school_id);
/*    $schoolname  = $schoolprofile[0]->school_name;
    $udise_code  = $schoolprofile[0]->udise_code;
    $blockname  = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
    $schoolcate  = $this->Homemodel->getcatename($schoolprofile[0]->sch_cate_id);
    $schmanage  = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
    $schdirector  = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);*/
     $section_details = [];
     array_push($section_details,array('sections'=>1,'section_ids'=>'A'),array('sections'=>2,'section_ids'=>'B'),array('sections'=>3,'section_ids'=>'C'),array('sections'=>4,'section_ids'=>'D'),array('sections'=>'5','section_ids'=>'E'),array('sections'=>6,'section_ids'=>'F'),array('sections'=>7,'section_ids'=>'G'));
      
     // print_r($section_details);die;
     ?>     
<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
      <style type="text/css">
  .panel-heading span {
    margin-top: -20px;
    font-size: 15px;
}
.tablecolor
{
    background-color: #32c5d2; 
}
</style>
    
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL STYLES -->
    
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            


<?php $this->load->view($header.'/header.php');  ?>


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
                          

                               <!--     <div class="page-content-inner">
                                     <div class="row margin-bottom-20">
                                    <div class=" row page-content-inner">
<div class="col-lg-12">
        
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
    
    </div>
                                       
                                           

                                        </div>
                                       

                                </div>

                              <!--      <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Student Data - Class <?php
                                                      // echo $cls_id;
                                                      $cls_roma = array
                                                            ('I'=>1,'II'=>'2','III'=>'3','IV'=>'4','V'=>'5','VI'=>'6','VII'=>'7','VIII'=>'8','IX'=>'9','X'=>'10','XI'=>'11','XII'=>'12','LKG'=>'13','UKG'=>'14','PreKG'=>'15');
                                                            $cls_roman_name = array_search($cls_id,$cls_roma);
                                                            echo $cls_roman_name;
                                                    ?></span>
                                                </div>
                                                    
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row">
                                                  <form action="<?=base_url().'Home/emis_student_disablity_list' ?>" method="post">
                                                    <div class="col-md-4">
                                                     
                                                        <!-- <?php print_r($cls_roma);?> -->
                                                  <!--    <select name="cls_id" id="cls_id" class="form-control">
                                                          
                                                        <option value="0">--select--</option>
                                                        <?php if(!empty($school_classwise)){
                                                            foreach($school_classwise as $cls_wise)
                                                            {

                                                              $cls_roman_names = array_search($cls_wise->cls_id,$cls_roma);
                                                              // echo $cls_wise->cls_id; 
                                                          ?>
                                                           <option value="<?=$cls_wise->cls_id?>" <?php echo ($cls_wise->cls_id == $cls_id) ? 'selected' : ''; ?>><?=$cls_roman_names.'-'.$cls_wise->cls_id;?></option>
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
                                                    <button class="btn btn-primary" onclick="return cls_validation();">Search</button>
                                                    <div id="msg"></div>
                                                  </form>
                                                </div>
                                            </div>
                                        </div>
           
                                        <!-- BEGIN CARDS -->
                                        
                                       
                                              
                                                 <!-- <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Student Data - Class <?=$cls_roman_name?></span>
                                                </div>

                                            </div>-->
 <div class="row">
                                            <div class="col-md-6">
                                                <a href="#">
                                            <div class="col-md-5">
                                                <div class="bs-callout-lightsteelblue dashboard-stat2" style="padding: inherit;">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h4 class="font-green-sharp">
                                                         <span class="bottom" data-counter="counterup" data-value="34" style="font-size: 23px;">Total Schools</span></h4>
                                                      
                                                         <?php if(!empty($dist_details)){ $over_total = 0;
            foreach($dist_details as $det){ 

         $total = $det->tot_school ; ?>
      <?php  $over_total = $over_total + $total;
         } } ?>
                                                           <h4 style="
    font-size: 30px;
"> 
        <?php echo number_format($over_total); ?></h4>
                                                        </div>
                                                        <div class="icon" style="margin-top:9%">
                                                            <i class="fa fa-university"></i>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div></a>
                                            </div>
                                        </div>

                                                
                                           <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                             <i class="fa fa-globe"></i>Staff Fixation Monitoring - DEE</div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">

                                                       <?php $c1_tot=0;$c2_tot=0;$c3_tot=0;$c4_tot=0;$c5_tot=0;$c6_tot=0;$c7_tot=0;$c8_tot=0;$c9_tot=0;$c10_tot=0;$c11_tot=0;$c12_tot=0; ?>
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                                                            <thead>
                                                                <tr>
                                                                       <th >S.No</th>
                                                                        <th>Block Name</th>
                                                                       <th class="sum">Total School</th>
                                                                      
                                                                       <th class="sum">Marked School</th> 
                                                                        <th>Not Marked Schools</th>
                                                                </tr>
                                                                </thead>
                                                               
                                                                 
                                                            <?php  if(!empty($dist_details)){
                                                            $total_school_tot=[];$Completed_school_tot=[];$RTE_tot=[];$section_nos=[];
                                                              foreach($dist_details as $index=> $det){ 
                                                              
                                                             ?>

                                                                <tr>
                                                                     <td><?php echo $index+1;?></td>
                                                                     
                                                                     <td ><a href="<?=base_url().$link.'/get_staff_fix_schoolwise?block_id='.$det->block_id;?>"><?=$det->block_name;?></td>
                                                                     <td><?=$det->tot_school;?></td>
                                                                     <td><?=$det->mark_school;?></td>
                                                                      <td><?php
                                                                     echo $not_marked=$det->tot_school-$det->mark_school;
                                                                     ?></td>
                                                                   
                                                                </tr>
                                                                <?php 

                                                        }?>
                                                         <?php } ?>
                                                            </tbody>    
                                                            <tfoot>
                                                                 <tr>
                                                            <th colspan="2">Total</th>
                                                            <th></th>
                                                            <th></th>
                                                                 <?php if(!empty($dist_details)){ $over_total = 0;$over_total2=0;
            foreach($dist_details as $det){ 

         $total = $det->tot_school ;
          $total1 = $det->mark_school ;

          ?>
      <?php  $over_total = $over_total + $total;
      $over_total1 = $over_total1 + $total1;
         } } ?>
                                                             <th><?php echo $sub=$over_total-$over_total1;?></th>

                                                            </tr>
                                                            
                                                            
                                                            </tfoot> 
                                            </table>
                           
                                    <!-- END PAGE TITLE -->
                                    <!-- BEGIN PAGE TOOLBAR -->
                                    <div class="page-toolbar">
                                        <!-- BEGIN THEME PANEL -->
                           
                                        <!-- END THEME PANEL -->
                                    </div>
                                    <!-- END PAGE TOOLBAR -->
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


<script type="text/javascript">
  $(document).ready(function()
  {
      var table = sum_dataTable("#sample_3");
  })
  function sum_dataTable(dataId){
    // alert();
    table = $(dataId).DataTable({
      dom: 'Blfrtip',
      "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

      order: [[0, "asc"]],
            lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            pageLength: -1,
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
</html>