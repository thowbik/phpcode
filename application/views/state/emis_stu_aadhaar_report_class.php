<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>

  
        <!-- BEGIN PAGE LEVEL PLUGINS -->

        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>



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
                                        <h1>Aadhaar Report - Student Class wise
                                            
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

                                             <!-- BEGIN ROW -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <!-- BEGIN CHART PORTLET-->
                                                        <div class="portlet light ">
                                                            <div class="portlet-title">
                                                                <div class="caption">
                                                                    <i class="icon-bar-chart font-green-haze"></i>
                                                                    <span class="caption-subject bold uppercase font-green-haze">Aadhaar Enrollment Report</span>
                                                                    <span class="caption-helper">district wise</span>
                                                                </div>
                                                            </div>
                                                            <div class="portlet-body">
                                                                <div id="chart_5" class="chart" style="height: 400px;"> </div>
                                                               
                                                            </div>
                                                        </div>
                                                        <!-- END CHART PORTLET-->
                                                    </div>
                                                </div>
                                                <!-- END ROW -->



                                    <div class="page-content-inner">
                                       
                                    <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                <div class="portlet light">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="col-md-4" >
                                                              <div class="form-group" style="padding: 10px;">
                                                                <label class="control-label bold">
                                                                School Management</label>
                                                                <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_state_report_schcate" name="emis_state_report_schcate" >
                                                                <option value="" >Select School Management</option>
                                                                 <?php  foreach($getmanagecate as $det){ ?>
                                                                 <option value="<?php echo $det->id; ?>" ><?php echo $det->manage_name; ?></option>
                                                                  <?php }  ?>
                                                                </select>
                                                                <font style="color:#dd4b39;"><div id="emis_state_report_schcate_alert"></div></font>
                                                              </div>
                                                              </div>

                                                              <div class="col-md-4" >
                                                              <div class="form-group" style="padding: 10px;">
                                                                <label class="control-label bold">
                                                                 School category </label>
                                                                <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_state_report_schmanage" name="emis_state_report_schmanage" >
                                                                <option value="" >Select category</option>
                                                                </select>
                                                                <font style="color:#dd4b39;"><div id="emis_state_report_schmanage_alert"></div></font>
                                                              </div>
                                                              </div>
                                                               <div class="col-md-4" >
                                                              <div class="form-group" style="padding: 10px;margin-top: 15px">
                                                                
                                                                <button type="button" class="btn green btn-lg" onclick="return checkmanagecate();" >Submit</button>
                                                              </div>
                                                              </div>
                                                      
                                                    </div>
                                                </div>
                                              <?php  $manage =$this->session->userdata('emis_statereport_schmanage'); 
                                              if($manage!=""){ ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4><b>Selected School Management Categoty : <?php echo $this->Datamodel->get_schmanagementname($manage); ?></b>
                                                        <button type="button" class="btn red btn-xs" onclick="remove_catefilter()">Remove Filter</button> </h4>
                                                    </div>
                                                </div>
                                              <?php  } ?>
                                            </div>
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> Student Class wise - All District </div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">

                                                        <?php $c1_tot=0;$c2_tot=0;$c3_tot=0;$c4_tot=0;$c5_tot=0;$c6_tot=0;$c7_tot=0;$c8_tot=0;$c9_tot=0;$c10_tot=0;$c11_tot=0;$c12_tot=0; ?>
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th>District </th>                        
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
                                                            <?php if(!empty($details)){ $total1 = 0; foreach($details as $det){ 

                                                             $total = $det->class_1 + $det->class_2 + $det->class_3 + $det->class_4 + $det->class_5 + $det->class_6 + $det->class_7 + $det->class_8 + $det->class_9 + $det->class_10 + $det->class_11 + $det->class_12;
                                                            
                                                                ?>

                                                                <tr>
                                                                <td><a onclick="savedistrictid('<?php echo $det->id; ?> ')">
                                                                    <?php echo $det->district_name; ?></a></td>
                                                                    <td><?php echo number_format($det->class_1); ?></td>
                                                                     <td><?php echo number_format($det->class_2); ?></td>
                                                                    <td><?php echo number_format($det->class_3); ?></td>
                                                                   <td><?php echo number_format($det->class_4); ?></td>
                                                                    <td><?php echo number_format($det->class_5); ?></td>
                                                                     <td><?php echo number_format($det->class_6); ?></td>
                                                                    <td><?php echo number_format($det->class_7); ?></td>
                                                                   <td><?php echo number_format($det->class_8); ?></td>
                                                                     <td><?php echo number_format($det->class_9); ?></td>
                                                                    <td><?php echo number_format($det->class_10); ?></td>
                                                                 <td><?php echo number_format($det->class_11); ?></td>
                                                                   <td><?php echo number_format($det->class_12); ?></td>
                                                                   <td><?php echo number_format($total); ?></td>
                                                                   
                                                                </tr>
                                                               
                                                                <?php  $total1 = $total1 + $total;   } } ?>
                                                                
                                                                

                                                            </tbody>
                                                        </table>
                                                        <?php if(!empty($details)){  foreach($details as $det){ 
                                                            $c1_tot=$c1_tot+$det->class_1;
                                                            $c2_tot=$c2_tot+$det->class_2;
                                                            $c3_tot=$c3_tot+$det->class_3; 
                                                            $c4_tot=$c4_tot+$det->class_4;
                                                            $c5_tot=$c5_tot+$det->class_5;
                                                            $c6_tot=$c6_tot+$det->class_6;
                                                            $c7_tot=$c7_tot+$det->class_7;
                                                            $c8_tot=$c8_tot+$det->class_8;
                                                            $c9_tot=$c9_tot+$det->class_9;
                                                            $c10_tot=$c10_tot+$det->class_10;
                                                            $c11_tot=$c11_tot+$det->class_11;
                                                            $c12_tot=$c12_tot+$det->class_12;
                                                                 }} ?>
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Class </th>                        
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
                                                            <tr>
                                                                    <td>Over all Total</td>
                                                                    <td><?php echo $c1_tot; ?></td>
                                                                    <td><?php echo $c2_tot; ?></td>
                                                                    <td><?php echo $c3_tot; ?></td>
                                                                    <td><?php echo $c4_tot; ?></td>
                                                                    <td><?php echo $c5_tot; ?></td>
                                                                    <td><?php echo $c6_tot; ?></td>
                                                                    <td><?php echo $c7_tot; ?></td>
                                                                    <td><?php echo $c8_tot; ?></td>
                                                                    <td><?php echo $c9_tot; ?></td>
                                                                    <td><?php echo $c10_tot; ?></td>
                                                                    <td><?php echo $c11_tot; ?></td>
                                                                    <td><?php echo $c12_tot; ?></td>
                                                                    <td><b><?php echo number_format($total1); ?></b></td>
                                                                </tr>
                                                        </table>
                                                        
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
        <script src="<?php echo base_url().'asset/js/state.js';?>" type="text/javascript"></script>

        <script type="text/javascript">
               function savedistrictid(value){
                var baseurl='<?php echo base_url(); ?>';
                // alert(value);
                $.ajax({
                type: "POST",
                url:baseurl+'State/savedistrictidsession',
                data:"&dist_id="+value,
                success: function(resp){ 
                if(resp==true){  
                window.location.href = baseurl+'State/emis_student_aadhaar_district'; 
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
 
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->

 <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url().'asset/global/plugins/amcharts/amcharts/amcharts.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/amcharts/amcharts/serial.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/amcharts/amcharts/themes/light.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/amcharts/amcharts/themes/patterns.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <script type="text/javascript">
            
            var ChartsAmcharts = function() {


    var initChartSample5 = function() {
        var chart = AmCharts.makeChart("chart_5", {
            "theme": "light",
            "type": "serial",
            "startDuration": 1,

            "fontFamily": 'Open Sans',
            
            "color":    '#888',

            "dataProvider": [ <?php   foreach($details as $det){ 

                                                             $total = $det->class_1 + $det->class_2 + $det->class_3 + $det->class_4 + $det->class_5 + $det->class_6 + $det->class_7 + $det->class_8 + $det->class_9 + $det->class_10 + $det->class_11 + $det->class_12;
                                                            
                                                                ?> 
                {
                "country": "<?php echo $det->district_name; ?>",
                "visits": <?php echo $total; ?>,
                "color": "#01579B"
            }, <?php   } ?> ],
            "valueAxes": [{
                "position": "left",
                "axisAlpha": 1,
                "gridAlpha": 0
            }],
            "graphs": [{
                "balloonText": "[[category]]: <b>[[value]]</b>",
                "colorField": "color",
                "fillAlphas": 0.85,
                "lineAlpha": 0.1,
                "type": "column",
                "topRadius": 1,
                "valueField": "visits"
            }],
            "depth3D": 40,
            "angle": 30,
            "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 1,
                "zoomable": false
            },
            "categoryField": "country",
            "categoryAxis": {
                "gridPosition": "start",
                "axisAlpha": 0,
                "gridAlpha": 0,
                "labelRotation": 90,
                "autoWrap":false, 
                "minHorizontalGap":0,

            },
            "exportConfig": {
                "menuTop": "20px",
                "menuRight": "20px",
                "menuItems": [{
                    "icon": '/lib/3/images/export.png',
                    "format": 'png'
                }]
            }
        }, 0);

        jQuery('.chart_5_chart_input').off().on('input change', function() {
            var property = jQuery(this).data('property');
            var target = chart;
            chart.startDuration = 0;

            if (property == 'topRadius') {
                target = chart.graphs[0];
            }

            target[property] = this.value;
            chart.validateNow();
        });

        $('#chart_5').closest('.portlet').find('.fullscreen').click(function() {
            chart.invalidateSize();
        });
    }


  

    return {
        //main function to initiate the module

        init: function() {

   
            initChartSample5();
        }

    };

}();

jQuery(document).ready(function() {    
   ChartsAmcharts.init(); 
});
        </script>  

        <script type="text/javascript">
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

  $.ajax({
        type: "POST",
        url:baseurl+'State/savereport_schoolcatemanage',
        data:"&cate="+cate1+"&manage="+manage1,
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
 </script>     

      

    </body>

</html>