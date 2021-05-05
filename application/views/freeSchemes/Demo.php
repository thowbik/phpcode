<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('head.php'); ?>
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>asset/py/static/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>asset/py/static/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>asset/py/static/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>asset/py/static/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>asset/py/static/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>asset/py/static/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>asset/py/static/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url() ?>asset/py/static/build/css/custom.css" rel="stylesheet">
    <!-- END PAGE LEVEL STYLES -->
</head>
<!-- END HEAD -->

<body class="page-container-bg-solid page-md">
    <div class="page-wrapper">
        <?php $this->load->view('block/header.php'); ?>
          
           <div class="right_col" role="main">
             <div class="row">
                <a href="laptop"><div class="animated flipInY col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <div class="tile-stats">

                    <div class="count">25,000</div>

                    <h3>Laptops</h3>
                    <p>Budget: 12.5 Cr.</p>
       </div>
                </div></a>
                <a href="#"><div class="animated flipInY col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <div class="tile-stats">

                    <div class="count">14,000</div>

                    <h3>BiCycles</h3>
                    <p>Budget: 12.5 Cr.</p>
                  </div>
                </div></a>
                <a href="#"><div class="animated flipInY col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <div class="tile-stats">

                    <div class="count">63,11,000</div>

                    <h3>Books</h3>
                    <p>Budget: 12.5 Cr.</p>
                  </div>
                </div></a>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <div class="tile-stats">

                    <div class="count">58,31,790</div>

                    <h3>Notebooks</h3>
                    <p>Budget: 12.5 Cr.</p>
                  </div>
                </div>
              </div>



              <br />

              <!--second row-->

        <!--      <div class="row">-->
        <!--<div class="col-md-12">-->
        <!--  <div class="">-->
        <!--    <div class="x_content">-->
              <div class="row">
                  <div class="animated flipInY col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <div class="tile-stats">

                    <div class="count">58,31,790</div>

                    <h3>Uniforms</h3>
                    <p>Budget: 12.5 Cr.</p>
                  </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <div class="tile-stats">

                    <div class="count">57,52,000</div>

                    <h3>Bags</h3>
                    <p>Budget: 12.5 Cr.</p>
                  </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <div class="tile-stats">

                    <div class="count">30,56,000</div>

                    <h3>Footwear</h3>
                    <p>Budget: 12.5 Cr.</p>
                  </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <div class="tile-stats">

                    <div class="count">6,90,000</div>

                    <h3>Geometry Boxes</h3>
                    <p>Budget: 12.5 Cr.</p>
                  </div>
                </div>

              </div>



              <br />

              <!--third row-->


              <!--<div class="row">-->
        <!--<div class="col-md-12">-->
        <!--  <div class="">-->
        <!--    <div class="x_content">-->
              <div class="row">
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
                
                  <div class="tile-stats">

                    <div class="count">6,00,090</div>

                    <h3>Crayons/Sketch Pens</h3>
                    <p>Budget: 12.5 Cr.</p>
                  </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <div class="tile-stats">

                    <div class="count">2,56,000</div>

                    <h3>Atlas</h3>
                    <p>Budget: 12.5 Cr.</p>
                  </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-4 col-xs-12">
                  <div class="tile-stats">

                    <div class="count">67,000</div>

                    <h3>Woolen Sweaters</h3>
                    <p>Budget: 12.5 Cr.</p>
                  </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-4 col-xs-12">
                  <div class="tile-stats">

                    <div class="count">7,090</div>

                    <h3>Rain Coats & Boots</h3>
                    <p>Budget: 12.5 Cr.</p>
                  </div>
                </div>
              </div>



              <br />
    <!-- /top tiles -->

<!--second row tiles-->



  </div>

  <!-- Chart.js -->
  <script src="/static/vendors/Chart.js/dist/Chart.min.js"></script>
  <!-- gauge.js -->
  <script src="/static/vendors/gauge.js/dist/gauge.min.js"></script>
  <!-- Skycons -->
  <script src="/static/vendors/skycons/skycons.js"></script>
  <!-- Flot -->
  <script src="/static/vendors/Flot/jquery.flot.js"></script>
  <script src="/static/vendors/Flot/jquery.flot.pie.js"></script>
  <script src="/static/vendors/Flot/jquery.flot.time.js"></script>
  <script src="/static/vendors/Flot/jquery.flot.stack.js"></script>
  <script src="/static/vendors/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="/static/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="/static/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="/static/vendors/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="/static/vendors/DateJS/build/date.js"></script>
  <!-- JQVMap -->
  <script src="/static/vendors/jqvmap/dist/jquery.vmap.js"></script>
  <script src="/static/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="/static/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>

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

</body>
</html>