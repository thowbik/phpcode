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
            

  <?php $this->load->view('DC/header.php'); ?>

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
                                  <!--  <div class="page-title">
                                        <h1>Dashboard
                                            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                          <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
                                             <li role="presentation">
                                            <a href="<?php echo base_url().'State/emis_state_home'?>">
                                              <span class="text">All Students</span><br/>
                                            </a>
                                          </li>
                                           <li role="presentation">
                                            <a href="<?php echo base_url().'State/emis_state_DEE'?>">
                                              <span class="text">Directorate Of Elementary Education</span><br/>
                                            </a>
                                          </li>
                                           <li role="presentation">
                                            <a href="<?php echo base_url().'State/emis_state_DSE'?>">
                                              <span class="text">Directorate Of School Education</span>
                                            </a>
                                          </li>
                                          <li role="presentation" class="next">
                                                                              <a href="<?php echo base_url().'State/emis_state_DMS'?>">
                                              <span class="text" >Directorate Of Matriculation School</a></span>
                                          </a>
                                          </li>
                                                </ul>
                                            </div> -->
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

                                      <!--    <div class="portlet light">
                                            <form action="<?php echo base_url()?>State/emis_state_home" method="POST">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-2" style="width:6%;padding-top:5%;">

                                                            All <input type="checkbox" id="emis_state_report_schmanage"  value="all" name="school_manage">
                                                        </div>
                                                        <div class="col-md-8" >
                                                            
                                                              <div class="form-group" style="padding: 10px;padding-left: 8%">
                                                                <label class="control-label bold">
                                                                School Management</label><br/>
                                                                <?php //print_r($data['cate']); ?>
                                                                 <?php  foreach($getmanagecate as $det){ 

                                                                 ?>
                                                                 
            <input type="checkbox" name="school_manage[]" class="school_manage" id="emis_state_report_schmanage" autocomplete="off" <?php if($det->manage_name== $this->input->get('magt_type') && count($manage) == '0'){ 
                    echo ($det->manage_name== $this->input->get('magt_type') && count($manage) == '0'? 'checked' : '');
            }
            else  if($this->input->get('magt_type')=='' && count($manage) == '0')
            {
             echo ($det->manage_name== 'Government' && count($manage) == '0'? 'checked' : '');   
            } ?>  value="<?=$det->manage_name;?>"/><span class="label-text" ><?=$det->manage_name;?></span>&nbsp;
            
                                                                  <?php }  ?>
                                                            
                                                                <font style="color:#dd4b39;"><div id="emis_state_report_schcate_alert"></div></font>
                                                              </div>    
                                                              
                                                              <div style="padding: 4px;padding-left: 8%;margin-top: -2%;" class="form-group" style="padding: 10px;">
                                                                <label class="control-label bold">
                                                                 School Category </label>&nbsp;&nbsp;<input type="checkbox" id="select_all"/>Category All<br/>
                                                                <?php if(!empty($getsctype))
                                                                {
                                                                    foreach($getsctype as $school_type)
                                                                    {?>
                                                                
<input type="checkbox"  class="emis_state_report_schcate" name="school_cate[]" id="emis_state_report_schcate" autocomplete="off" value="<?=$school_type->category_name;?>" <?php echo (count($cate) == '0'? 'checked' : '');?>/><span class="label-text"><?=$school_type->category_name;?></span>

&nbsp;
                                                                <?php } ?>  <?php }?>
                                                              
                                                                <font style="color:#dd4b39;"><div id="emis_state_report_schcate_alert"></div></font>
                                                              </div>
                                                              </div>
                                                               <div class="col-md-1" >
                                                              <div class="form-group" style="padding: 10px;margin-top: 15px">
                                                                
                                                                <button type="submit" class="btn green btn-lg">Submit</button>
                                                              </div>
                                                              </div>
                                                      
                                                    </div>
                                                </div>
                                            </form>
                                              <?php if($manage!=""){ ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h5><b>Selected School Management :</b><?=implode(",",$manage);?> <b>Selected Categoty :</b>  <?=$cate!=''?implode(",",$cate):'';?></h5>
                                                        
                                                    </div>
                                                </div>
                                              <?php  }
$total1 = [];
                                               ?>
                                            </div> -->
                                       
                                        <div class="row">
                                         <!--   <div class="col-md-6">
                                                <a  href="#">
                                            <div class="col-md-5">
                                                <div class="bs-callout-lightsteelblue dashboard-stat2">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h4 class="font-green-sharp">
                                                         <span class="bottom" data-counter="counterup" data-value="34">Total Students</span></h4>
                                                               
                                                           <?php echo $studtotal ?>
        
            
                                                           <h4><?php echo $state_student[0]->total; ?></h4> 
        
                                                        </div> 
                                                        <div class="icon" style="margin-top:9%">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div></a>
                                            </div>-->
                                        </div>
                                   
                                                <div class="portlet box green">
                                                    <div class="portlet-title col-md-12">
                                                        <div class="caption col-md-4">
                                                            <i class="fa fa-globe"></i> Students Class wise </div>
                                                            <div class="col-md-6" style="margin-top: -1%;"><h3>Government Schools Total Enrollment</h3></div>
                                                        <div class="col-md-2 tools">  </div>
                                                        
                                                    </div>

                                                    <div class="portlet-body">
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th>Block </th> 
                                                                    <th>School Name</th>      <th>Pre-kg</th>
                                                                    <th>LKG</th>
                                                                    <th>UKG</th>
                                                                    <th>I</th>
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
                                                               <?php if(!empty($stud_school_admission_count)){ 
                                                                    $i=1;
                                                                    $prekg_tot= [];
                                                                    $lkg_tot =[];
                                                                    $ukg_tot =[];
                                                                    $c1_tot =[];
                                                                    $c2_tot =[];
                                                                    $c3_tot =[];
                                                                    $c4_tot =[];
                                                                    $c5_tot =[];
                                                                    $c6_tot =[];
                                                                    $c7_tot =[];
                                                                    $c8_tot =[];
                                                                    $c9_tot =[];
                                                                    $c10_tot =[];
                                                                    $c11_tot =[];
                                                                    $c12_tot =[];
                                                                    $over_total =[];
                                                                foreach($stud_school_admission_count as $det){ 
                                                                    
                                                                ?>
                                                                <tr>
                                                                    <td style="text-align: center;"><?php echo $i;?></td>
                                                                    <td><?=$det->district_name;?></td>
																	 <td><?=$det->school_name;?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->prekg);?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->lkg);?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->ukg);?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->c1);?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->c2);?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->c3);?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->c4);?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->c5);?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->c6);?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->c7);?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->c8);?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->c9);?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->c10);?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->c11);?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->c12);?></td> 
                                                                    <td style="text-align: center; font-weight: bold;"><?php echo number_format($det->noofstudents); ?></td>
                                                                </tr>
                                                                <?php $i++;?>

                                                            <?php 

                                                            array_push($prekg_tot,$det->prekg);
                                                            array_push($lkg_tot,$det->lkg); 
                                                            array_push($ukg_tot,$det->ukg);
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
                                                            array_push($over_total,$det->noofstudents);
                                                           

                                                        }?>
                                                        
                                                   <?php } ?>
                                                            </tbody>
                                                          <tfoot>
                                                                <tr>
                                                            <th>Total</th>
                                                            <th></th>
															 <th></th>
                                                            <th style="text-align: center;"><?php 
                                                            $prekg_tot = array_sum($prekg_tot);
                                                            array_push($total1,$prekg_tot);
                                                            echo number_format($prekg_tot);?></th>
                                                          <th style="text-align: center;"><?php 
                                                                $lkg_tot = array_sum($lkg_tot);
                                                                array_push($total1,$lkg_tot);
                                                            echo number_format($lkg_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $ukg_tot = array_sum($ukg_tot);
                                                                array_push($total1,$ukg_tot);
                                                                echo number_format($ukg_tot);?></th>
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
                                                         <th style="text-align: center;"> <?php 
                                                          $over_total = array_sum($over_total);
                                                          array_push($total1,$over_total);
                                                          echo number_format($over_total); ?></th> 

                                                        </tr>
                                                            </tfoot>
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
        url:baseurl+'State/savereport_schoolcatemanage',
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