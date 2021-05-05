<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
      <style type="text/css">
            #extend-check{
                min-height: 700px;
            }
            
 #mchart {
    width       : 100%;
    height      : 700px;
    font-size   : 11px;
}

        </style>
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL STYLES -->
    
       
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
                                        <h1>Dashbaord
                                            <small>State Dashboard</small>
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

                                        <?php $count1=0; $count2=0; $count3=0; $count4=0;

                                         if(!empty($schoolcount)) { foreach ($schoolcount as $sch) { 
                                           $count4=$count4 + $sch->total; 
                                         }} 

                                         if(!empty($details)) { foreach ($details as $det) { 
                                             $total = $det->class_1 + $det->class_2 + $det->class_3 + $det->class_4 + $det->class_5 + $det->class_6 + $det->class_7 + $det->class_8 + $det->class_9 + $det->class_10 + $det->class_11 + $det->class_12;
                                           $count1=$count1 + $total;
                                         }} 

                                        
                                         if(!empty($adhaarcount)) { foreach ($adhaarcount as $aha) { 
                                             $total = $aha->class_1 + $aha->class_2 + $aha->class_3 + $aha->class_4 + $aha->class_5 + $aha->class_6 + $aha->class_7 + $aha->class_8 + $aha->class_9 + $aha->class_10 + $aha->class_11 + $aha->class_12;
                                           $count2=$count2 + $total;
                                         }} 

                                        if(!empty($smartcardcount)) { foreach ($smartcardcount as $sma) { 
                                             $total = $sma->class_1 + $sma->class_2 + $sma->class_3 + $sma->class_4 + $sma->class_5 + $sma->class_6 + $sma->class_7 + $sma->class_8 + $sma->class_9 + $sma->class_10 + $sma->class_11 + $sma->class_12;
                                           $count3=$count3 + $total;
                                         }} 

                                         ?> 
                                   
           
                                       <div class="row">
                                            
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="dashboard-stat2 ">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h3 class="font-green-sharp">
                                                                <span data-counter="counterup" data-value="<?php echo $count1; ?>"><?php echo $count1; ?></span>
                                                               
                                                            </h3>
                                                            <small>STUDENT</small>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="icon-pie-chart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="progress-info">
                                                       <!--  <div class="progress">
                                                            <span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                                                <span class="sr-only">76% progress</span>
                                                            </span>
                                                        </div> -->
                                                        <div class="status">
                                                            <div class="status-title">OVERALL ENROLLMENT</div>
                                                            <!-- <div class="status-number"> 76% </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="dashboard-stat2 ">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h3 class="font-blue-sharp">
                                                                <span data-counter="counterup" data-value="<?php echo $count2; ?>"><?php echo $count2; ?></span>
                                                            </h3>
                                                            <small>STUDENT</small>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="icon-basket"></i>
                                                        </div>
                                                    </div>
                                                    <div class="progress-info">
                                                      <!--   <div class="progress">
                                                            <span style="width: 45%;" class="progress-bar progress-bar-success blue-sharp">
                                                                <span class="sr-only">45% grow</span>
                                                            </span>
                                                        </div> -->
                                                        <div class="status">
                                                            <div class="status-title">TOTAL AADHAAR ENROLLMENT</div>
                                                            <!-- <div class="status-number"> 45% </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="dashboard-stat2 ">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h3 class="font-red-haze">
                                                                <span data-counter="counterup" data-value="<?php echo $count3; ?>"><?php echo $count3; ?></span>
                                                            </h3>
                                                            <small>STUDENT</small>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="icon-like"></i>
                                                        </div>
                                                    </div>
                                                    <div class="progress-info">
                                                        <!-- <div class="progress">
                                                            <span style="width: 85%;" class="progress-bar progress-bar-success red-haze">
                                                                <span class="sr-only">85% change</span>
                                                            </span>
                                                        </div> -->
                                                        <div class="status">
                                                            <div class="status-title">TOTAL SMART CARD ENROLLMENT</div>
                                                            <!-- <div class="status-number"> 85% </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                           
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="dashboard-stat2 ">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h3 class="font-purple-soft">
                                                                <span data-counter="counterup" data-value="<?php echo $count4; ?>"><?php echo $count4; ?></span>
                                                            </h3>
                                                            <small>SCHOOL</small>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="icon-user"></i>
                                                        </div>
                                                    </div>
                                                    <div class="progress-info">
                                                      <!--   <div class="progress">
                                                            <span style="width: 57%;" class="progress-bar progress-bar-success purple-soft">
                                                                <span class="sr-only">56% change</span>
                                                            </span>
                                                        </div> -->
                                                        <div class="status">
                                                            <div class="status-title">TOTAL SCHOOL COUNT</div>
                                                            <!-- <div class="status-number"> 57% </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                     
                                        
                                               
                                               <div class="col-lg-6">
                                                <div class="portlet light portlet-fit" id="extend-check">
                                                    <div class="portlet-title">
                                                        
                                                         <div class="caption">
                                                            <i class="icon-film font-green"></i>
                                                            <span class="caption-subject font-green bold uppercase">Distrit wise school count</span>
                                                        </div>
                                                        <div class="tools">
                                                                    <a href="javascript:;" class="collapse"> </a>
                                                                    
                                                                    <a href="javascript:;" class="reload"> </a>
                                                                    <a href="javascript:;" class="fullscreen"> </a>
                                                                    
                                                                </div>
                                                     
                                                    </div>
                                                    <div class="portlet-body">
                                                    <div id="mchart"></div>                    
                                                    </div>
                                                </div>
                                            </div>

                                              <div class="col-lg-6">
                                                <div class="portlet light portlet-fit " id="extend-check">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="icon-bar-chart font-green"></i>
                                                            <span class="caption-subject font-green bold uppercase">District wise Student Count</span>
                                                        </div>
                                                        <div class="tools">
                                                                    <a href="javascript:;" class="collapse"> </a>
                                                                    
                                                                    <a href="javascript:;" class="reload"> </a>
                                                                    <a href="javascript:;" class="fullscreen"> </a>
                                                                    
                                                                </div>
                                                   </div>
                                                

                                                    <div class="portlet-body">
                                                  <div id="map" style="width: 500px; height:700px;" ></div>
                                                    </div>
                                                     
                                                </div>
                                            </div>

                                        </div>

                                      
                                        <div class="row">
                                <div class="col-md-12" >
                                                <div class="portlet mt-element-ribbon light portlet-fit ">
                                                    <div class="ribbon ribbon-left ribbon-clip ribbon-shadow ribbon-round ribbon-border-dash-hor ribbon-color-danger uppercase">
                                                                        <div class="ribbon-sub"></div> Student Registration wise Data Analysis </div>
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            
                                                          

                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>    
                              </div>


                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="portlet light portlet-fit ">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class=" icon-list font-green"></i>
                                                            <span class="caption-subject font-green bold uppercase">student registration District wise Analysis</span>
                                                        </div>
                                                        <div class="tools">
                                                                    <a href="javascript:;" class="collapse"> </a>
                                                                    
                                                                    <a href="javascript:;" class="reload"> </a>
                                                                    <a href="javascript:;" class="fullscreen"> </a>
                                                                    
                                                                </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div id="highchart_1" style="height:500px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                               <div class="row">
                                            <div class="col-md-12">
                                                <div class="portlet light portlet-fit ">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="icon-size-actual font-green"></i>
                                                            <span class="caption-subject font-green bold uppercase">student registration Gender wise Analysis</span>
                                                        </div>
                                                       <div class="tools">
                                                                    <a href="javascript:;" class="collapse"> </a>
                                                                    
                                                                    <a href="javascript:;" class="reload"> </a>
                                                                    <a href="javascript:;" class="fullscreen"> </a>
                                                                    
                                                                </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div id="highchart_4" style="height:800px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                          <!-- BEGIN BLOCK BUTTONS PORTLET-->
                                                                   <!--  <div class="portlet light">
                                                                        <div class="portlet-title">
                                                                            <div class="caption">
                                                                                <i class="icon-settings font-green-sharp"></i>
                                                                                <span class="caption-subject font-green-sharp bold uppercase">Customized Multi level analysis </span>
                                                                            </div>
                                                                            <div class="actions">
                                                                             <span class="caption-subject  bold uppercase" style="color: #ec1358;">Note: Yet to be approoved</span>
                                                                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                                                    <i class="icon-cloud-upload"></i>
                                                                                </a>
                                                                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                                                    <i class="icon-wrench"></i>
                                                                                </a>
                                                                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                                                    <i class="icon-trash"></i>
                                                                                </a>
                                                                            </div>
                                                                        </div>

                                                                        <div class="portlet-body col-md-12">
                                                                        <div class="thumbnail col-md-6">
                                                                        <div class="card-title">
                                                                                <span class=""> Directorate wise Selection </span>
                                                                        </div><br/>
                                                                        <center>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-star fa-spin"></i>
                                                                                <div> DMS</div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-star fa-spin"></i>
                                                                                <div> DSC </div>
                                                                                <span class=""> <input type="checkbox" name=""> </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-star fa-spin"></i>
                                                                                <div> DEE </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            </center>
                                                                        </div>
                                                                        <div class="thumbnail col-md-6">
                                                                        <div class="card-title">
                                                                                <span class=""> Gender wise Selection </span>
                                                                        </div><br/>
                                                                        <center>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-mars"></i>
                                                                                <div> Male</div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-venus"></i>
                                                                                <div> Female </div>
                                                                                <span class=""> <input type="checkbox" name=""> </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-transgender"></i>
                                                                                <div> Transgender </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            </center>
                                                                        </div>
                                                                        </div>

                                                                        <div class="portlet-body">
                                                                        <div class="card-title">
                                                                                <span class=""> Class wise Selection </span>
                                                                        </div><br/>
                                                                        <center>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-group"></i>
                                                                                <div> Class 1 </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-group"></i>
                                                                                <div> Class 2 </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-group"></i>
                                                                                <div> Class 3 </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-group"></i>
                                                                                <div> Class 4 </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-group"></i>
                                                                                <div> Class 5 </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-group"></i>
                                                                                <div> Class 6 </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-group"></i>
                                                                                <div> Class 7 </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-group"></i>
                                                                                <div> Class 8 </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-group"></i>
                                                                                 <div> Class 9 </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-group"></i>
                                                                                <div> Class 10 </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-group"></i>
                                                                                <div> Class 11 </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-group"></i>
                                                                                <div> Class 12 </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            </center>
                                                                        </div>

                                                                        <div class="portlet-body">
                                                                        <div class="card-title">
                                                                                <span class=""> Community wise Selection </span>
                                                                        </div><br/>
                                                                        <center>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-street-view"></i>
                                                                                <div>BC-Others</div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-street-view"></i>
                                                                                <div> BC-Muslim </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-street-view"></i>
                                                                                <div> MBC </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-street-view"></i>
                                                                                <div> ST </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-street-view"></i>
                                                                                <div> SC-Others </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-street-view"></i>
                                                                                <div> SC-Arunthathiyar </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-street-view"></i>
                                                                                <div> OC </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-street-view"></i>
                                                                                <div> DNC </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            </center>
                                                                        </div>
                                                                        <br/>
                                                                        <br/>
                                                                        <center><button type="button" class="btn dark btn green">Submit</button></center>
                                                                        
                                                                    </div> -->
                                                                    <!-- BEGIN BLOCK BUTTONS PORTLET-->

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
        <script src="<?php echo base_url().'asset/global/plugins/highcharts/js/highcharts.js';?>" type="text/javascript"></script>

         <script src="<?php echo base_url().'asset/global/plugins/amcharts/amcharts/amcharts.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/amcharts/amcharts/serial.js';?>" type="text/javascript"></script>
        
        <script src="<?php echo base_url().'asset/global/plugins/amcharts/amcharts/themes/light.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/amcharts/amcharts/themes/patterns.js';?>" type="text/javascript"></script>
         <script src="<?php echo base_url().'asset/pages/scripts/charts-amcharts.js';?>" type="text/javascript"></script>

         <!-- END THEME LAYOUT SCRIPTS -->
        <script type="text/javascript">
             
        $('#highchart_1').highcharts({
        chart : {
            style: {
                fontFamily: 'Open Sans'
            }
        },
        title: {
            text: 'District wise student registration',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20,

        },
        xAxis: {
            categories: [<?php foreach($details as $det){ ?> "<?php
             echo $det->district_name; ?>", <?php } ?>]
        },
        yAxis: {
            title: {
                text: 'District wise Candidate Count'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ''
        },
        legend: {
            layout: 'horizontal',
            align: 'right',
            verticalAlign: 'bottom',
            borderWidth: 0
        },
        series: [
        {
            name: 'Student Registration Count',
            data: [<?php foreach($details as $det){
             $total = $det->class_1 + $det->class_2 + $det->class_3 + $det->class_4 + $det->class_5 + $det->class_6 + $det->class_7 + $det->class_8 + $det->class_9 + $det->class_10 + $det->class_11 + $det->class_12; echo $total.','; } ?> ]
        }]
    });
</script>

<script type="text/javascript">
  
    var categories = [<?php foreach($gendercount as $gen){ ?> "<?php
             echo $gen->district_name; ?>", <?php } ?>];
   
    $('#highchart_4').highcharts({
        chart: {
            type: 'bar',
            style: {
                fontFamily: 'Open Sans'
            }
        },
        title: {
            text: 'Gender wise candidate registration'
        },
        subtitle: {
            text: ''
        },
        xAxis: [{
            categories: categories,
            reversed: false,
            labels: {
                step: 1
            }
        }, { // mirror axis on right side
            opposite: true,
            reversed: false,
            categories: categories,
            linkedTo: 0,
            labels: {
                step: 1
            }
        }],
        yAxis: {
            title: {
                text: null
            },
            labels: {
                formatter: function () {
                    return Math.abs(this.value);
                }
            }
        },

        plotOptions: {
            series: {
                stacking: 'normal'
            }
        },

        tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + ' - ' + this.point.category + '</b><br/>' +
                    'Registration: ' + Highcharts.numberFormat(Math.abs(this.point.y), 0);
            }
        },

        series: [{
             name: 'Male',
             data: [<?php if(!empty($gendercount)){ foreach($gendercount as $gen){ $total = $gen->class_1_b + $gen->class_2_b + $gen->class_3_b + $gen->class_4_b + $gen->class_5_b + $gen->class_6_b + $gen->class_7_b + $gen->class_8_b + $gen->class_9_b + $gen->class_10_b + $gen->class_11_b + $gen->class_12_b;  echo "-".$total.",";  }} ?>]
        }, {
            name: 'Female',
           data: [<?php if(!empty($gendercount)){ foreach($gendercount as $gen){ $total = $gen->class_1_g + $gen->class_2_g + $gen->class_3_g + $gen->class_4_g + $gen->class_5_g + $gen->class_6_g + $gen->class_7_g + $gen->class_8_g + $gen->class_9_g + $gen->class_10_g + $gen->class_11_g + $gen->class_12_g;  echo $total.",";  }} ?>]
        }]
    });

</script>

  <?php $maparray=array(); $i=1; foreach($details as $det){
         $total = $det->class_1 + $det->class_2 + $det->class_3 + $det->class_4 + $det->class_5 + $det->class_6 + $det->class_7 + $det->class_8 + $det->class_9 + $det->class_10 + $det->class_11 + $det->class_12; 
         array_push($maparray,$total); 
        $i++; } ?>

    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCMiCu_hDVP-mn_PODWP-CJNCbEWp4B_E8&sensor=false" type="text/javascript"></script>
   <script type="text/javascript">
    var locations = [
      ['Ariyalur',11.14345,79.080325, <?php echo $maparray[0];  ?>],
      ['chennai',13.057521,80.198703, <?php echo $maparray[1];  ?>],
      ['coimabatore', 11.025518,76.962426, <?php echo $maparray[2];  ?>],
      ['Cuddalore', 11.752705,79.767310, <?php echo $maparray[3];  ?>],
      ['Dharmapuri', 12.12166,78.147965, <?php echo $maparray[4];  ?>],
      ['Dindigul', 10.365577,77.972217, <?php echo $maparray[5];  ?>],
      ['Erode', 11.340902,77.706813, <?php echo $maparray[6];  ?>],
      ['Kanchipuram', 12.829012,79.703921, <?php echo $maparray[7];  ?>],
      ['Kaniyakumari',8.083895,77.545313, <?php echo $maparray[8];  ?>],
      ['Karur', 10.968689,78.060919, <?php echo $maparray[9];  ?>],
      ['Krishnagiri', 12.521965,78.210129, <?php echo $maparray[10];  ?>],
      ['Madurai', 9.918489,78.120248, <?php echo $maparray[11];  ?>],
      ['Nagapttinam',10.772329,79.836305, <?php echo $maparray[12];  ?>],
      ['Namakal', 11.214011,78.164977, <?php echo $maparray[13];  ?>],  
      ['Permabalur', 11.241651, 78.875463, <?php echo $maparray[14];  ?>],
      ['Pudukottai', 10.364989, 78.821411, <?php echo $maparray[15];  ?>],
      ['Ramanathapuram', 9.350551, 78.837730, <?php echo $maparray[16];  ?>],
      ['Salem', 11.634246, 78.157604, <?php echo $maparray[17];  ?>],
      ['Sivaganga', 9.841725, 78.494158, <?php echo $maparray[18];  ?>],
      ['Thanjavur',10.738483, 79.146212,<?php echo $maparray[19];  ?>],
      ['The Nilgris',11.420367, 76.659586, <?php echo $maparray[20];  ?>],
      ['Theni',9.896400, 77.447429, <?php echo $maparray[21];  ?>],
      ['Thoothukudi', 8.751370, 78.119075, <?php echo $maparray[22];  ?>],
      ['Tiruchiraplli',10.769802, 78.699326, <?php echo $maparray[23];  ?>],
      ['Tirunelveli',8.698653, 77.742006, <?php echo $maparray[24];  ?>],
      ['Tiruppur', 11.115655,77.350766, <?php echo $maparray[25];  ?>],
      ['Tiruvallur', 13.213425,79.925511, <?php echo $maparray[26];  ?>],
      ['Tiruvannamalai', 12.230957,79.077320, <?php echo $maparray[27];  ?>],
      ['Tiruvarur', 13.213425,79.925511, <?php echo $maparray[28];  ?>],
      ['Vellore',12.896622,79.115593, <?php echo $maparray[29];  ?>],
      ['Vilupuram', 11.940290,79.485397, <?php echo $maparray[30];  ?>],
      ['Virudhunagar',9.577333,77.956988, <?php echo $maparray[31];  ?>]

    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 7,
      center: new google.maps.LatLng(11.174881, 78.532694),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) { 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
            var iwContent = '<div id="iw_container">' +
     '<div class="iw_title"><b>' + 'District :</b>  '+locations[i][0]+ '</div>'+
     '<div class="iw_content"><b>'+'Student Registration count :</b>  '+locations[i][3]+'</div></div>';
          infowindow.setContent(iwContent);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>

  <script>

var chart = AmCharts.makeChart("mchart", {
    "type": "serial",
     "theme": "hard",
    "categoryField": "year",
    "rotate": true,
    "startDuration": 1,
    "categoryAxis": {
        "gridPosition": "start",
        "position": "left"
    },
    "trendLines": [],
    "graphs": [
        {
            "balloonText": " Count:[[value]]",
            "fillAlphas": 0.8,
            "id": "AmGraph-1",
            "lineAlpha": 0.2,
            "title": "Count",
            "type": "column",
            "valueField": "count"
        }
    ],
    "guides": [],
    "valueAxes": [
        {
            "id": "ValueAxis-1",
            "position": "top",
            "axisAlpha": 0
        }
    ],
    "allLabels": [],
    "balloon": {},
    "titles": [],
   "dataProvider": [
   <?php if(!empty($schoolcount)){ foreach($schoolcount as $sch){ ?> 
               {
            "year": "<?php echo $sch->district_name; ?>",
            "count": <?php echo $sch->total; ?>,
           
        },
        <?php }} ?>
      
    ],
    "export": {
        "enabled": true
     }

});
</script>





    </body>

</html>