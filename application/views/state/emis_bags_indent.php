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
            

  <?php $this->load->view('state/header.php'); ?>

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

                                     <div class="portlet-body">

                                        
                                       
                                    
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i>DSE Bags Indent Summary All | <span>District-Wise</span> </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                                        <?php $prekg_tot=0;$lkg_tot=0;$ukg_tot=0;$c1_tot=0;$c2_tot=0;$c3_tot=0;$c4_tot=0;$c5_tot=0;$c6_tot=0;$c7_tot=0;$c8_tot=0;$c9_tot=0;$c10_tot=0;$c11_tot=0;$c12_tot=0; ?>
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                     <th></th>
                                                                    <th ></th>  

                                                                    
                                                                    <th style="text-align: center;" colspan="3" >small </th>
                                                                    <th colspan="4" style="text-align: center;">Medium </th>
                                                                    <th colspan="4" style="text-align: center;">Large </th>
                                                                

                                                                </tr>
                                                                <tr>
                                                                   <th>S.No</th>
                                                                    <th>District</th>  
                                                                    
                                                                    <th> I</th>
                                                                    <th>II</th>
                                                                    <th>III</th>
                                                                    <th>IV</th>
                                                                    <th>V</th>
                                                                    <th>VI</th>
                                                                    <th>VII</th>
                                                                    <th>VIII</th>
                                                                    <th>IX</th>
                                                                    <th>X</th>
                                                                    <th>XI</th>
                                                                    <th>XII</th>
                                                                    <th>Total</th>
                                                                </tr>
                                                                </thead>
                                                               <tbody>
                                                            <?php if(!empty($bag_indent)){$prekg_tot= [];$lkg_tot= [];$ukg_tot= [];$c1_tot= [];$c2_tot= [];$c3_tot= [];$c4_tot= [];$c5_tot=[];$c6_tot= [];$c7_tot= [];$c8_tot= [];$c9_tot= [];$c10_tot= [];$c11_tot= [];$c12_tot= []; $total1=[]; $total=[]; $tot=[]; $i=1; foreach($bag_indent as $det){   ?>

                                                                <tr>
                                                                  <td style="text-align: center;"><?php echo $i;?></td>
                                                                    <td> <a href="<?php //echo base_url().'Ceo_District/get_dash_blockwise_dee?dist='.$dist_id.'&block='.$det->block_name?>">
                                                                    <?php echo $det->district_name; ?></a></td>
                                                                    <td style="text-align: center;"><?php echo number_format($det->c1); ?></td>
                                                                    <td style="text-align: center;"><?php echo number_format($det->c2); ?></td>
                                                                    <td style="text-align: center;"><?php echo number_format($det->c3); ?></td>
                                                                    <td style="text-align: center;"><?php echo number_format($det->c4); ?></td>
                                                                     <td style="text-align: center;"><?php echo number_format($det->c5); ?></td>
                                                                    <td style="text-align: center;"><?php echo number_format($det->c6); ?></td>
                                                                   <td style="text-align: center;"><?php echo number_format($det->c7); ?></td>
                                                                    <td style="text-align: center;"><?php echo number_format($det->c8); ?></td>
                                                                     <td style="text-align: center;"><?php echo number_format($det->c9); ?></td>
                                                                    <td style="text-align: center;"><?php echo number_format($det->c10); ?></td>
                                                                   <td style="text-align: center;"><?php echo number_format($det->c11); ?></td>
                                                                     <td style="text-align: center;"><?php echo number_format($det->c12); ?></td>
                                                                     <td style="text-align: center;"><?php echo $total=number_format ($det->c1+$det->c2+$det->c3+$det->c4+$det->c5+$det->c6+$det->c7+$det->c8+$det->c9+$det->c10+$det->c11+$det->c12); ?></td>
                                                                   
                                                                </tr>
                                                                <?php $i++;?>
                                                                 <?php 
                                                            array_push($c1_tot,$det->c1);
                                                            array_push($c2_tot,$det->c2);
                                                            array_push($c3_tot,$det->c3);
                                                            array_push($c4_tot,$det->c4);
                                                            array_push($c5_tot,$det->c5);
                                                            array_push($c6_tot,$det->c6);
                                                            array_push($c7_tot,$det->c7);
                                                            array_push($c8_tot,$det->c8);
                                                            array_push($c9_tot,$det->c9);
                                                            array_push($c10_tot,$det->c10);
                                                            array_push($c11_tot,$det->c11);

                                                            array_push($c12_tot,$det->c12);
                                                            array_push($tot,($det->c1+$det->c2+$det->c3+$det->c4+$det->c5+$det->c6+$det->c7+$det->c8+$det->c9+$det->c10+$det->c11+$det->c12));


                                                        }?>
                                                        
                                                 
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                            <th>Total</th>
                                                            <th></th>
                                                           
                                                            <th style="text-align: center;"><?php 
                                                             $c1_tot = array_sum($c1_tot);
                                                                array_push($total1,$c1_tot);
                                                           echo number_format($c1_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $c2_tot = array_sum($c2_tot);
                                                                array_push($total1,$c2_tot);
                                                                echo number_format($c2_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $c3_tot = array_sum($c3_tot);
                                                                array_push($total1,$c3_tot);
                                                                echo number_format($c3_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $c4_tot = array_sum($c4_tot);
                                                                array_push($total1,$c4_tot);
                                                                echo number_format($c4_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                             $c5_tot = array_sum($c5_tot);
                                                                array_push($total1,$c5_tot);
                                                                echo number_format($c5_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $c6_tot = array_sum($c6_tot);
                                                                array_push($total1,$c6_tot);
                                                            echo number_format($c6_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $c7_tot = array_sum($c7_tot);
                                                                array_push($total1,$c7_tot);
                                                            echo number_format($c7_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $c8_tot = array_sum($c8_tot);
                                                                array_push($total1,$c8_tot);
                                                            echo number_format($c8_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $c9_tot = array_sum($c9_tot);
                                                                array_push($total1,$c9_tot);
                                                            echo number_format($c9_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $c10_tot = array_sum($c10_tot);
                                                                array_push($total1,$c10_tot);
                                                            echo number_format($c10_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                             $c11_tot = array_sum($c11_tot);
                                                                array_push($total1,$c11_tot);
                                                            echo number_format($c11_tot);?></th>
                                                            <th style="text-align: center;"><?php 

                                                             $c12_tot = array_sum($c12_tot);
                                                                array_push($total1,$c12_tot);
                                                                echo number_format($c12_tot);

                                                                ?></th>
                                                      <th style="text-align: center;"><?php 

                                                             $tot = array_sum($tot);
                                                                array_push($total1,$tot);
                                                                echo number_format($tot);

                                                                ?></th>
                                                        </tr>
                                                            </tfoot> 
                                                              <?php } ?>
                                                        </table>

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
        </script>
    </body>

</html>