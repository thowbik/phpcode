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
                                                            <i class="fa fa-globe"></i>DSE Need PG</div>
                                                            <div class="col-md-5" style="margin-top: -1%;"><h3></h3></div>
                                                        <div class="col-md-3 tools">  </div>
                                                        
                                                    </div>

                                                    <div class="portlet-body">
                                                    
                                                       <table class="table table-striped table-bordered table-hover" id="sample_2">
                                  <thead>
                                 <tr>
                                <th style="text-align: center;">S.No</th>
                              <th>School Name</th>                        
                            <th style="text-align: center;">Tamil</th>
                              <th style="text-align: center;">English</th>
                              <th style="text-align: center;">Physics</th>
                              <th style="text-align: center;">Chemistry</th>
                              <th style="text-align: center;">Biology</th>


                              <th style="text-align: center;">Botony</th>
                              <th style="text-align: center;">Zoology</th>
                              <th style="text-align: center;">Statistics</th>
                              <th style="text-align: center;">Computer Science</th>
                              <th style="text-align: center;">Geography</th>
                              <th style="text-align: center;">MICRO-BIOLOGY</th>
                              <th>BIO-CHEMISTRY</th>
                              <th>NURSING GENERAL</th>
                              <th>NUTRITION & DIETETICS</th>
                              <th>COMMUNICATIVE ENGLISH</th>
                              <th style="text-align: center;">Maths</th>
                              <th style="text-align: center;">Home Science</th>

                              <th style="text-align: center;">History</th>
                              <th style="text-align: center;">Economics</th>
                              <th style="text-align: center;">Political Science</th>
                              <th>COMMERCE</th>
                              <th style="text-align: center;">Accounts</th>
                              <th>ETHICS AND INDIAN CULTURE</th>
                              <th>ADVANCED LANGUAGE(TAMIL)</th>
                              <th>BUSINESS MATHEMATICS AND STATISTICS</th>
                              <th>COMPUTER APPLICATIONS</th>
                              <th>BASIC MECHANICAL ENGINEERING</th>
                              <th>BASIC ELECTRICAL ENGINEERING</th>
                              <th>BASIC ELECTRONICS ENGINEERING</th>
                              <th>BASIC CIVIL ENGINEERING</th>
                              <th>BASIC AUTOMOBILE ENGINEERING</th>
                              <th>TEXTILE TECHNOLOGY</th>
                              <th>NURSING</th>
                              <th>TEXTILES AND DRESS DESIGNING</th>
                              <th>FOOD SERVICE MANAGEMENT</th>
                              <th>AGRICULTURAL SCIENCE</th>
                              <th>OFFICE MANAGEMENT AND SECRETARYSHIP</th>
                              <th>COMPUTER TECHNOLOGY</th>
                              
                              <th>PD-1</th>
                              <th>HrSec-HM</th>
                             
 
                              </tr>
                              </thead>
                              <tbody>
                              <?php $total1=[]; ?>
                            
                              <?php if(!empty($need_dsereport)){  $i=1; 
                                foreach($need_dsereport as $needdse){ 
                                    //$pst=$this->input->post('emis_state_fix')==''?'elig_':$this->input->post('emis_state_fix');
                                    $sub=[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,43,44];  
                              ?>
                              <tr>
                              <td style="text-align: center;"><?php echo $i++;?></td>
                              <td> <?php echo $needdse->school_name; ?></td>
                              <?php
                                foreach ($sub as $s) { $comp='need_'.$s;
                              ?>
                              <td style="text-align: center;"><?php echo number_format($needdse->$comp); ?></a></td>
                      
                              <?php
                                $total1[$comp]+=$needdse->$comp;

                              }
                              ?>
                              </tr>
                            <?php  } ?>
                            </tbody>
                            <tfoot>
                              <tr>
                                <th colspan="2">TOTAL</th>
                                <?php
                                  foreach ($total1 as $t) { ?>
                                  <th style="text-align: center;"><?php echo number_format($t);?></th>
                                 <?php } ?>
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