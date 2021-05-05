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
            

  <?php  $this->load->view('state/header.php');  ?>

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

                                                <div class="portlet box green">
                                                    <div class="portlet-title col-md-12">
                                                        <div class="caption col-md-4">
                                                            <i class="fa fa-globe"></i>DEE Vacancy</div>
                                                            <div class="col-md-5" style="margin-top: -1%;"><h3></h3></div>
                                                        <div class="col-md-3 tools">  </div>
                                                        
                                                    </div>

                                                    <div class="portlet-body">
                                                    
                                                       <table class="table table-striped table-bordered table-hover" id="sample_2">
                                  <thead>
                                 <tr>
                                 <th style="text-align: center;">S.No</th>
                              <th>District Name</th>                        
                            <th style="text-align: center;">SG</th>
                              <th style="text-align: center;">BT-Sciense</th>
                              <th style="text-align: center;">BT-Maths</th>
                              <th style="text-align: center;">BT-English</th>
                              <th style="text-align: center;">BT-Tamil</th>


                              <th style="text-align: center;">BT-Social</th>
                              <th style="text-align: center;">PHM</th>
                               <th style="text-align: center;">MHM</th>
                              <th style="text-align: center;">BT-Telugu</th>
                              <th style="text-align: center;">BT-Agri</th>
                              <th>BT-Computer</th>
                              <th>BT-pet</th>
                              <th>BT-sew</th>
                              <th>BT-music</th>
                              <th style="text-align: center;">BT-drawing</th>
                              <th style="text-align: center;">BT-pd2</th>

                              <th style="text-align: center;">BT-kannadam</th>
                              <th style="text-align: center;">BT-malayalam</th>
                              <th style="text-align: center;">BT-urudu</th>
                             
 
                              </tr>
                              </thead>
                              <tbody>
                              <?php $total1=[]; ?>
                            
                              <?php if(!empty($vacancy_deereportsgbt)){  $i=1; $vac_sg=[]; $sciense=[]; $maths=[];
                                $english=[]; $tamil=[]; $social=[]; $phm=[]; $mhm=[]; $telugu=[]; $agri=[]; $computer=[]; $pet=[]; $sew=[]; $music=[]; $drawing=[]; $pd2=[]; $kannadam=[]; $malayalam=[]; $urudu=[];
                                foreach($vacancy_deereportsgbt as $vacancydse){ 
								?>
								<tr>
                               <td style="text-align: center;"><?php echo $i++;?></td>
                               <td><a href="<?php echo base_url().'state/vacancy_district_dee_sgbtreport?districtid='.$vacancydse->district_id?>"><?=$vacancydse->district_name;?></a></td>
							  <td> <?php echo $vacancydse->vac_sg; ?></td>
							  <td> <?php echo $vacancydse->sciense; ?></td>
							  <td> <?php echo $vacancydse->maths; ?></td>
							  <td> <?php echo $vacancydse->english; ?></td>
							  <td> <?php echo $vacancydse->tamil; ?></td>
							  <td> <?php echo $vacancydse->social; ?></td>
                               <td> <?php echo $vacancydse->phm; ?></td>							  
							  <td> <?php echo $vacancydse->mhm; ?></td>
							  <td> <?php echo $vacancydse->telugu; ?></td>
							  <td> <?php echo $vacancydse->agri; ?></td>
							  <td> <?php echo $vacancydse->computer; ?></td>
							  <td> <?php echo $vacancydse->pet; ?></td>
							  <td> <?php echo $vacancydse->sew; ?></td>
							  <td> <?php echo $vacancydse->music; ?></td>
							  <td> <?php echo $vacancydse->drawing; ?></td>
							  <td> <?php echo $vacancydse->pd2; ?></td>
							  <td> <?php echo $vacancydse->kannadam; ?></td>
							  <td> <?php echo $vacancydse->malayalam; ?></td>
							  <td> <?php echo $vacancydse->urudu; ?></td>
							  
							  </tr>

                              <?php
                                 array_push($vac_sg,$vacancydse->vac_sg);
                                 array_push($sciense,$vacancydse->sciense);
                                 array_push($maths,$vacancydse->maths);
                                 array_push($english,$vacancydse->english);
                                 array_push($tamil,$vacancydse->tamil);
                                 array_push($social,$vacancydse->social);
								  array_push($phm,$vacancydse->phm);
                                 array_push($mhm,$vacancydse->mhm);
                                 array_push($telugu,$vacancydse->telugu);
                                 array_push($agri,$vacancydse->agri);
                                 array_push($computer,$vacancydse->computer);
                                 array_push($pet,$vacancydse->pet);
                                 array_push($sew,$vacancydse->sew);
                                 array_push($music,$vacancydse->music);
                                 array_push($drawing,$vacancydse->drawing);
                                 array_push($pd2,$vacancydse->pd2);
                                 array_push($kannadam,$vacancydse->kannadam);
                                 array_push($malayalam,$vacancydse->malayalam);
                                 array_push($urudu,$vacancydse->urudu);
                               
                                                           
                               }  ?>
                            
                            </tbody>
                            <tfoot>
                               <tr>
                                                  <th>Total</th>
                                                            <th></th>
                                                            <th ><?php 
                                                            $vac_sg = array_sum($vac_sg);
                                                            array_push($total1,$vac_sg);
                                                            echo number_format($vac_sg);?></th>
                                                            <th><?php 
                                                                $sciense = array_sum($sciense);
                                                                array_push($total1,$sciense);
                                                            echo number_format($sciense);?></th>
                                                            <th ><?php 
                                                             $maths = array_sum($maths);
                                                                array_push($total1,$maths);
                                                           echo number_format($maths);?></th>
                                                            <th><?php 
                                                            $english = array_sum($english);
                                                                array_push($total1,$english);
                                                                echo number_format($english);?></th>
                                                                 <th ><?php 
                                                            $tamil = array_sum($tamil);
                                                                array_push($total1,$tamil);
                                                                echo number_format($tamil);?></th>

                                                                 <th ><?php 
                                                            $social = array_sum($social);
                                                            array_push($total1,$social);
                                                            echo number_format($social);?></th>
															 <th ><?php 
                                                                $phm = array_sum($phm);
                                                                array_push($total1,$phm);
                                                            echo number_format($phm);?></th>
                                                            <th ><?php 
                                                                $mhm = array_sum($mhm);
                                                                array_push($total1,$mhm);
                                                            echo number_format($mhm);?></th>
                                                            <th ><?php 
                                                             $telugu = array_sum($telugu);
                                                                array_push($total1,$telugu);
                                                           echo number_format($maths);?></th>
                                                            <th><?php 
                                                            $agri = array_sum($agri);
                                                                array_push($total1,$agri);
                                                                echo number_format($agri);?></th>
                                                                 <th><?php 
                                                            $computer = array_sum($computer);
                                                                array_push($total1,$computer);
                                                                echo number_format($computer);?></th>

                                                                 <th><?php 
                                                            $pet = array_sum($pet);
                                                            array_push($total1,$pet);
                                                            echo number_format($pet);?></th>
                                                            <th><?php 
                                                                $sew = array_sum($sew);
                                                                array_push($total1,$sew);
                                                            echo number_format($sew);?></th>
                                                            <th><?php 
                                                             $music = array_sum($music);
                                                                array_push($total1,$music);
                                                           echo number_format($music);?></th>
                                                            <th><?php 
                                                            $drawing = array_sum($drawing);
                                                                array_push($total1,$drawing);
                                                                echo number_format($drawing);?></th>
                                                                 <th><?php 
                                                            $pd2 = array_sum($pd2);
                                                                array_push($total1,$pd2);
                                                                echo number_format($pd2);?></th>


                                                                 <th><?php 
                                                            $kannadam = array_sum($kannadam);
                                                            array_push($total1,$kannadam);
                                                            echo number_format($kannadam);?></th>
                                                            <th><?php 
                                                                $malayalam = array_sum($malayalam);
                                                                array_push($total1,$malayalam);
                                                            echo number_format($malayalam);?></th>
                                                            <th><?php 
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