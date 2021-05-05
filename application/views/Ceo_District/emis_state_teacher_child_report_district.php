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
    </style>
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->

        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
           

  <?php  $this->load->view('Ceo_District/header.php');  ?>

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
                         

                                    <div class="page-content-inner">

                                     <div class="portlet-body">
                             <div class="row">
                         <div class="col-md-8">
                         </div>
                         <div class="col-md-4">
                         <h5 style="color:blue;"><strong>Yes</strong> : Number of teachers whose children </br>are studying in government schools.<h5>
                         <span>
                         <h5 style="color:blue;"><strong>No</strong> :  Number of teachers whose children </br>do not study in government schools.</h5>
                         <span>
                         <h5 style="color:blue;"><strong>Percentage</strong> :  Percentage of teachers whose children are</br> studying in government schools.</h5>
                         </div>
                         </div>

                                                <div class="portlet box green">
                                                    <div class="portlet-title col-md-12">
                                                        <div class="caption col-md-4">
                                                            <i class="fa fa-globe"></i>Teacher's Children Report</div>
                                                            <div class="col-md-5" style="margin-top: -1%;"><h3></h3></div>
                                                        <div class="col-md-3 tools">  </div>
                                                       
                                                    </div>

                                                    <div class="portlet-body">
                                                   
                                                       <table class="table table-striped table-bordered table-hover" id="sample_2">
                                  <thead>
                                 <tr>
                                 <th style="text-align: center;">S.No</th>
                              <th >Block Name</th>
                              <th style="text-align: center;">Total Teachers</th>                      
                            <th style="text-align: center;">Yes</th>
                              <th style="text-align: center;">No</th>
                              <th style="text-align: center;">Not Applicable</th>
                              <!--<th style="text-align: center;">Not Filled</th>-->
                 <th style="text-align: center;">Percentage</th>
                             
                              </tr>
                              </thead>
                               <tbody>
                              <?php $total1=[]; ?>
                              <?php if(!empty($child_studying_status)){  $staff1= []; $yes1=[]; $no1=[]; $na1=[]; $remain1=[];$per1=[]; $i=1;foreach($child_studying_status as $key => $value){ $j=0; $staff=0; $yes=0; $no=0; $na=0; $remain=0; $per=0;//print_r($value); die();
                                foreach ($value as $dge) {
                                  $staff +=$dge['staff'];
                                 
                                  $yes +=$dge['Yes']!=0?$dge['Yes']:0;
                                  $no +=$dge['No']!=0?$dge['No']:0;
                                  $na +=$dge['NA']!=0?$dge['NA']:0;
                 
                               
                                }
                                ?>
                                  <tr>
                                      <td style="text-align: center;"><?php echo($i++); ?></td>
                                     
                                      <!--<td><a href="<?php echo base_url().'state/dge_2017_18_report_blk/?district_id='.$key?>"><?php echo($key); ?></a></td>-->
                    <td ><a href="<?php echo base_url().'state/teacher_child_studyingstatus_block/?block_id='.$key?>"><?php echo $key;?></td>
                                      <td style="text-align: center;"><?php echo $staff;?></td>
                                      <td style="text-align: center;"><?php echo number_format($yes); ?></td>
                                      <td style="text-align: center;"><?php echo number_format($no); ?></td>
                                      <td style="text-align: center;"><?php echo number_format($na); ?></td>
                                      <!--<td style="text-align: center;"><?php echo $remain=($staff-($yes+$no+$na)); ?></td>-->
                     <?php 
                         $x = $yes;
                                               $total = $staff-$na;
                                               $percentage = ($x*100)/$total;
?>
                     <td style="text-align: center;"><?php echo round($percentage, 2); ?></td>
                                     
                                    </tr>  
                                    <?php  
                                     array_push($staff1,$staff);
                                     array_push($yes1,$yes);
                                     array_push($no1,$no);
                                     array_push($na1,$na);
                    //array_push($remain1,$remain);
                                     array_push($per1,$percentage);
                                      }  ?>  
                            </tbody>
                            <tfoot>
                            <th  class="center">Total</th>
                                                              <th></th>
                                                           <th style="text-align: center;" ><?php
                                                            $staff1 = array_sum($staff1);
                                                            array_push($total1,$staff1);
                                                            echo number_format($staff1);?></th>
                                                             <th style="text-align: center;" ><?php
                                                            $yes1 = array_sum($yes1);
                                                            array_push($total1,$yes1);
                                                            echo number_format($yes1);?></th>
                                                               <th style="text-align: center;" ><?php
                                                            $no1 = array_sum($no1);
                                                            array_push($total1,$no1);
                                                            echo number_format($no1);?></th>
                                                              <th style="text-align: center;" ><?php
                                                            $na1 = array_sum($na1);
                                                            array_push($total1,$na1);
                                                            echo number_format($na1);?></th>
                                                             <!--<th style="text-align: center;" ><?php
                                                            $remain1 = array_sum($remain1);
                                                            array_push($total1,$remain1);
                                                            echo number_format($remain1);?></th>-->
                              <?php 
											             $x = $yes1;
                                                         $total = $staff1-$na1;
                                                        $percentage1 = ($x*100)/$total; ?>
															<th style="text-align: center;" ><?php
                                                           
                                                             echo round($percentage1, 2);?></th>
                                                             
                                                               
                            </tfoot>
              
                            <?php } ?>
                            </table>
              
                                                       
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->          

                                                    </div>
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
                </div>
            </div>


                  <?php $this->load->view('footer.php'); ?>
                   <?php $this->load->view('scripts.php'); ?>
        </body>
<script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
       
        <script src="<?php echo base_url().'asset/js/state.js';?>" type="text/javascript"></script>

        <script type="text/javascript">

            function saveclassid(value){
                var baseurl='<?php echo base_url(); ?>';
                // alert(value);
                $.ajax({
                type: "POST",
                url:baseurl+'Ceo_District/savedash_classidsession',
                data:"&class_id="+value,
                success: function(resp){
                if(resp==true){  
                window.location.href = baseurl+'Ceo_District/emis_dash_district_count';
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
      //   url:baseurl+'Ceo_District/get_school_management_data',
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

 $(document).ready(function(){  // function call for validate company name
    $("#emis_state_report_schcate").change(function(){
      return validatetext('emis_state_report_schcate','emis_state_report_schcate_alert');
});   });

// $(document).ready(function(){  // function call for validate company name
//     $("#emis_state_report_schmanage").change(function(){
//       return validatetext('emis_state_report_schmanage','emis_state_report_schmanage_alert');
// });   });


function checkmanagecate(){

var baseurl='<?php echo base_url(); ?>';

var manage = validatetext('emis_state_report_schmanage','emis_state_report_schmanage_alert');
var cate = validatetext('emis_state_report_schcate','emis_state_report_schcate_alert');

var manage1=$("#emis_state_report_schmanage").val();
var cate1 = $("#emis_state_report_schcate").val();

if(manage == 0 ){
    return false;
}

  $.ajax({
        type: "POST",
        url:baseurl+'Ceo_District/savereport_schoolcatemanage',
        data:"&cate="+cate1+"&manage="+manage1,
        success: function(resp){
        // alert(resp);  
        // location.reload(true);
        return true;              
         },
        error: function(e){
        alert('Error: ' + e.responseText);
        return false;  
       
        }
        });
       
}

function remove_catefilter(){

  $.ajax({
        type: "POST",
        url:baseurl+'Ceo_District/deletereport_schoolcatemanage',
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


 </script>  


    </body>

</html>