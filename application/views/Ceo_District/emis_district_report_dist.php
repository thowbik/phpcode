<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>

        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>



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
                                        <h1>Smart Card Report - Student Block wise
                                            
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
                                                                    <span class="caption-helper">Block wise</span>
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

                                          <div class="portlet light">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="col-md-4" >
                                                              <div class="form-group" style="padding: 10px;">
                                                                <label class="control-label bold">
                                                                School Management</label>
                                                                <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_dist_report_schcate" name="emis_dist_report_schcate" >
                                                                <option value="" >Select School Management</option>
                                                                 <?php  foreach($getmanagecate as $det){ ?>
                                                                 <option value="<?php echo $det->id; ?>" ><?php echo $det->manage_name; ?></option>
                                                                  <?php }  ?>
                                                                </select>
                                                                <font style="color:#dd4b39;"><div id="emis_dist_report_schcate_alert"></div></font>
                                                              </div>
                                                              </div>

                                                              <div class="col-md-4" >
                                                              <div class="form-group" style="padding: 10px;">
                                                                <label class="control-label bold">
                                                                 School category </label>
                                                                <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_dist_report_schmanage" name="emis_dist_report_schmanage" >
                                                                <option value="" >Select category</option>
                                                                </select>
                                                                <font style="color:#dd4b39;"><div id="emis_dist_report_schmanage_alert"></div></font>
                                                              </div>
                                                              </div>
                                                               <div class="col-md-4" >
                                                              <div class="form-group" style="padding: 10px;margin-top: 15px">
                                                                
                                                                <button type="button" class="btn green btn-lg" onclick="return checkmanagecate_dist();" >Submit</button>
                                                              </div>
                                                              </div>
                                                      
                                                    </div>
                                                </div>
                                              <?php  $manage =$this->session->userdata('emis_districtreport_schmanage'); 
                                              if($manage!=""){ ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4><b>Selected School Management Categoty : <?php echo $this->Datamodel->get_schmanagementname($manage); ?></b>
                                                        <button type="button" class="btn red btn-xs" onclick="remove_catefilter()">Remove Filter</button> </h4>
                                                    </div>
                                                </div>
                                              <?php  } ?>
                                            </div>
                                       
                                    <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> Student Block wise | <span>District : <?php if($distname!="") { echo $distname; } ?></span> </div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th>Blocks </th>                        
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
                                                                </tr>
                                                                </thead>
                                                               
                                                            <?php if(!empty($details)){ foreach($details as $det){ ?>

                                                                <tr>
                                                                    <td> <a onclick="saveblockid('<?php echo $det->id; ?> ')">
                                                                    <?php echo $det->block_name; ?></a></td>
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
                                                                   
                                                                </tr>
                                                                <?php } } ?>
                                                                
                                                      
                                                            </tbody>
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
        <script src="<?php echo base_url().'asset/js/district.js';?>" type="text/javascript"></script>

           <script type="text/javascript">
               function saveblockid(value){
                var baseurl='<?php echo base_url(); ?>';
                // alert(value);
                $.ajax({
                type: "POST",
                url:baseurl+'District/saveblockidsession',
                data:"&block_id="+value,
                success: function(resp){ 
                if(resp==true){  
                window.location.href = baseurl+'District/emis_student_report_block'; 
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
                "country": "<?php echo $det->block_name; ?>",
                "visits": <?php echo $total; ?>,
                "color": "#bb33ff"
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


             

    </body>

</html>