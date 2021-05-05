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
                                        <h1>
                                            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                              <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
                                              <li role="presentation">
                                            <a href="<?php echo base_url().'Ceo_District/need_dse_pgreport'?>">
                                              <span class="text">Need Teachers DSE-PG</span><br/>
                                            </a>
                                          </li>
                                           <li role="presentation">
                                            <a href="<?php echo base_url().'Ceo_District/need_dse_sgbtreport'?>">
                                              <span class="text">Need Teachers DSE-SG</span><br/>
                                            </a>
                                          </li>
                                          <!-- <li role="presentation">
                                            <a href="<?php echo base_url().'Ceo_District/emis_state_school_dse'?>">
                                              <span class="text">Directorate Of School Education</span>
                                            </a>
                                          </li>
                                          <li role="presentation" class="next">
                                                <a href="<?php echo base_url().'Ceo_District/emis_state_school_dms'?>">
                                              <span class="text" >Directorate Of Matriculation School</a></span>
                                          </a>
                                          </li>
                                            <li role="presentation" class="next">
                                                <a href="<?php echo base_url().'Ceo_District/emis_state_school_others'?>">
                                              <span class="text" >Others</a></span>
                                          </a>
                                          </li>-->
                                                </ul>
                                            </div>
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

                                                <div class="portlet box green">
                                                    <div class="portlet-title col-md-12">
                                                        <div class="caption col-md-4">
                                                            <i class="fa fa-globe"></i>DSE Need SG & BT </div>
                                                            <div class="col-md-5" style="margin-top: -1%;"><h3></h3></div>
                                                        <div class="col-md-3 tools">  </div>
                                                        
                                                    </div>

                                                    <div class="portlet-body">
                                                    
                                                       <table class="table table-striped table-bordered table-hover" id="sample_2">
                                  <thead>
                                 <tr>
                                 <th style="text-align: center;">S.No</th>
                              <th>School Name</th>                        
                            <th style="text-align: center;">SG</th>
                              <th style="text-align: center;">BT-Sciense</th>
                              <th style="text-align: center;">BT-Maths</th>
                              <th style="text-align: center;">BT-English</th>
                              <th style="text-align: center;">BT-Tamil</th>


                              <th style="text-align: center;">BT-Social</th>
							  
                              <th style="text-align: center;">HHM</th>
                              
                              <th style="text-align: center;">BT-Telugu</th>
                              
                              <!--<th>BT-Computer</th>
                              <th>BT-pet</th>
                              <th>BT-sew</th>
                              <th>BT-music</th>
                              <th style="text-align: center;">BT-drawing</th>
                              <th style="text-align: center;">BT-pd2</th>-->

                              <th style="text-align: center;">BT-kannadam</th>
                              <th style="text-align: center;">BT-malayalam</th>
                              <th style="text-align: center;">BT-urudu</th>
                             
 
                              </tr>
                              </thead>
                              <tbody>
                              <?php $total1=[]; ?>
                            
                              <?php if(!empty($need_dsereportsgbt)){  $i=1; $need_sg=[]; $sciense=[]; $maths=[];
                                $english=[]; $tamil=[]; $social=[];  $hhm=[]; $telugu=[];  $kannadam=[]; $malayalam=[]; $urudu=[];
                                foreach($need_dsereportsgbt as $needdse){ 
								?>
								<tr>
                               <td style="text-align: center;"><?php echo $i++;?></td>
                              <td> <?php echo $needdse->school_name; ?></td>
							  <td> <?php echo $needdse->need_sg; ?></td>
							  <td> <?php echo $needdse->sciense; ?></td>
							  <td> <?php echo $needdse->maths; ?></td>
							  <td> <?php echo $needdse->english; ?></td>
							  <td> <?php echo $needdse->tamil; ?></td>
							  <td> <?php echo $needdse->social; ?></td>
							  <td> <?php echo $needdse->hhm; ?></td>
							  <td> <?php echo $needdse->telugu; ?></td>
							  <td> <?php echo $needdse->kannadam; ?></td>
							  <td> <?php echo $needdse->malayalam; ?></td>
							  <td> <?php echo $needdse->urudu; ?></td>
							  
							  </tr>
                             <?php
                                 array_push($need_sg,$needdse->need_sg);
                                 array_push($sciense,$needdse->sciense);
                                 array_push($maths,$needdse->maths);
                                 array_push($english,$needdse->english);
                                 array_push($tamil,$needdse->tamil);
                                 array_push($social,$needdse->social);
                                 array_push($hhm,$needdse->hhm);
                                 array_push($telugu,$needdse->telugu);
                                
                                 array_push($kannadam,$needdse->kannadam);
                                 array_push($malayalam,$needdse->malayalam);
                                 array_push($urudu,$needdse->urudu);
                               
                                                           
                               }  ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                                  <th>Total</th>
                                                            <th></th>
                                                            <th><?php 
                                                            $need_sg = array_sum($need_sg);
                                                            array_push($total1,$need_sg);
                                                            echo number_format($need_sg);?></th>
                                                            <th><?php 
                                                                $sciense = array_sum($sciense);
                                                                array_push($total1,$sciense);
                                                            echo number_format($sciense);?></th>
                                                            <th><?php 
                                                             $maths = array_sum($maths);
                                                                array_push($total1,$maths);
                                                           echo number_format($maths);?></th>
                                                            <th><?php 
                                                            $english = array_sum($english);
                                                                array_push($total1,$english);
                                                                echo number_format($english);?></th>
                                                                 <th><?php 
                                                            $tamil = array_sum($tamil);
                                                                array_push($total1,$tamil);
                                                                echo number_format($tamil);?></th>

                                                                 <th><?php 
                                                            $social = array_sum($social);
                                                            array_push($total1,$social);
                                                            echo number_format($social);?></th>
                                                            <th><?php 
                                                                $hhm = array_sum($hhm);
                                                                array_push($total1,$hhm);
                                                            echo number_format($hhm);?></th>
															
                                                            <th><?php 
                                                             $telugu = array_sum($telugu);
                                                                array_push($total1,$telugu);
                                                           echo number_format($maths);?></th>
                                                            


                                                                 <th style="text-align: center;"><?php 
                                                            $kannadam = array_sum($kannadam);
                                                            array_push($total1,$kannadam);
                                                            echo number_format($kannadam);?></th>
                                                            <th style="text-align: center;"><?php 
                                                                $malayalam = array_sum($malayalam);
                                                                array_push($total1,$malayalam);
                                                            echo number_format($malayalam);?></th>
                                                            <th style="text-align: center;"><?php 
                                                             $urudu = array_sum($urudu);
                                                                array_push($total1,$urudu);
                                                           echo number_format($urudu);?></th>
                                                           
                                                         
                                                          
                                                        </tr>
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