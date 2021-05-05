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
	<link href="<?php echo base_url().'asset/css/support/custom-vivek.css';?>" rel="stylesheet" type="text/css" />
    
    <style>
        .card{box-shadow:1px 1px 5px 1px #29abe2 0.5px !important;}
    </style>
</head>
<!-- END HEAD -->

<body class="page-container-bg-solid page-md">
    <div class="page-wrapper">
            <?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
            <?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
            <?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 5){ ?>
            <?php $this->load->view('state/header.php'); }else{ $this->load->view('header.php'); } ?>
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
                                    <h1>SCHOOL BASIC INFORMATION</h1>
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
                            <div class="container">
                                <!-- BEGIN PAGE CONTENT INNER -->
                                <div class="page-content-inner">
                                    <?php $user_type_id = $this->session->userdata('emis_user_type_id'); ?> 
                                    <div class ="row">
                                        <div class="col-md-4">
                                            <font style="color:#dd4b39;"><?php echo $this->session->flashdata('errors'); ?></font>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <a href="calllaptop">
                                            <div class="dashboard-stat2 ">
                                                <div class="display">
                                                    <div class="number">
                                                        <h3 class="font-green-sharp">
                                                            <span data-counter="counterup" data-value="34">25,000</span>
                                                        </h3>
                                                        <small class="font-purple">LAPTOPS</small>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="icon-pie-chart"></i>
                                                    </div>
                                                </div>
                                                <div class="progress-info">
                                                    <div class="status">
                                                        <div class="status-title" style="color: black;">BUDGET : 12.5 Cr</div>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="dashboard-stat2 ">
                                                <div class="display">
                                                    <div class="number">
                                                        <h3 class="font-green-sharp">
                                                            <span data-counter="counterup" data-value="34">14,000 </span>
                                                        </h3>
                                                        <small class="font-purple">BiCycles</small>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="icon-pie-chart"></i>
                                                    </div>
                                                </div>
                                                <div class="progress-info">
                                                    <div class="status">
                                                        <div class="status-title" style="color: black;">Budget: 12.5 Cr.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        
                                       
                                        
                                         
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="dashboard-stat2 ">
                                                <div class="display">
                                                    <div class="number">
                                                        <h3 class="font-green-sharp">
                                                            <span data-counter="counterup" data-value="34">63,11,000</span>
                                                        </h3>
                                                        <small class="font-purple">Books</small>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="icon-pie-chart"></i>
                                                    </div>
                                                </div>
                                                <div class="progress-info">
                                                    <div class="status">
                                                        <div class="status-title" style="color: black;">Budget: 12.5 Cr.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="dashboard-stat2 ">
                                                <div class="display">
                                                    <div class="number">
                                                        <h3 class="font-green-sharp">
                                                            <span data-counter="counterup" data-value="34">58,31,790 </span>
                                                        </h3>
                                                        <small class="font-purple">Notebooks</small>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="icon-pie-chart"></i>
                                                    </div>
                                                </div>
                                                <div class="progress-info">
                                                    <div class="status">
                                                        <div class="status-title" style="color: black;">Budget: 12.5 Cr.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                         
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="dashboard-stat2 ">
                                                <div class="display">
                                                    <div class="number">
                                                        <h3 class="font-green-sharp">
                                                            <span data-counter="counterup" data-value="34">58,31,790</span>
                                                        </h3>
                                                        <small class="font-purple">Uniforms</small>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="icon-pie-chart"></i>
                                                    </div>
                                                </div>
                                                <div class="progress-info">
                                                    <div class="status">
                                                        <div class="status-title" style="color: black;">Budget: 12.5 Cr.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="dashboard-stat2 ">
                                                <div class="display">
                                                    <div class="number">
                                                        <h3 class="font-green-sharp">
                                                            <span data-counter="counterup" data-value="34">57,52,000</span>
                                                        </h3>
                                                        <small class="font-purple">Bags</small>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="icon-pie-chart"></i>
                                                    </div>
                                                </div>
                                                <div class="progress-info">
                                                    <div class="status">
                                                        <div class="status-title" style="color: black;">Budget: 12.5 Cr.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                         
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="dashboard-stat2 ">
                                                <div class="display">
                                                    <div class="number">
                                                        <h3 class="font-green-sharp">
                                                            <span data-counter="counterup" data-value="34">30,56,000</span>
                                                        </h3>
                                                        <small class="font-purple">Footwear</small>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="icon-pie-chart"></i>
                                                    </div>
                                                </div>
                                                <div class="progress-info">
                                                    <div class="status">
                                                        <div class="status-title" style="color: black;">Budget: 12.5 Cr.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="dashboard-stat2 ">
                                                <div class="display">
                                                    <div class="number">
                                                        <h3 class="font-green-sharp">
                                                            <span data-counter="counterup" data-value="34">6,90,000 </span>
                                                        </h3>
                                                        <small class="font-purple">Geometry Boxes</small>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="icon-pie-chart"></i>
                                                    </div>
                                                </div>
                                                <div class="progress-info">
                                                    <div class="status">
                                                        <div class="status-title" style="color: black;">Budget: 12.5 Cr.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="dashboard-stat2 ">
                                                <div class="display">
                                                    <div class="number">
                                                        <h3 class="font-green-sharp">
                                                            <span data-counter="counterup" data-value="34">6,00,090</span>
                                                        </h3>
                                                        <small class="font-purple">Crayons/Sketch Pens</small>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="icon-pie-chart"></i>
                                                    </div>
                                                </div>
                                                <div class="progress-info">
                                                    <div class="status">
                                                        <div class="status-title" style="color: black;">Budget: 12.5 Cr.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="dashboard-stat2 ">
                                                <div class="display">
                                                    <div class="number">
                                                        <h3 class="font-green-sharp">
                                                            <span data-counter="counterup" data-value="34">67,000 </span>
                                                        </h3>
                                                        <small class="font-purple">Woolen Sweaters</small>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="icon-pie-chart"></i>
                                                    </div>
                                                </div>
                                                <div class="progress-info">
                                                    <div class="status">
                                                        <div class="status-title" style="color: black;">Budget: 12.5 Cr.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="dashboard-stat2 ">
                                                <div class="display">
                                                    <div class="number">
                                                        <h3 class="font-green-sharp">
                                                            <span data-counter="counterup" data-value="34">2,56,000 </span>
                                                        </h3>
                                                        <small class="font-purple">Atlas</small>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="icon-pie-chart"></i>
                                                    </div>
                                                </div>
                                                <div class="progress-info">
                                                    <div class="status">
                                                        <div class="status-title" style="color: black;">Budget: 12.5 Cr.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="dashboard-stat2 ">
                                                <div class="display">
                                                    <div class="number">
                                                        <h3 class="font-green-sharp">
                                                            <span data-counter="counterup" data-value="34">2,56,000 </span>
                                                        </h3>
                                                        <small class="font-purple">Rain Coats & Boots</small>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="icon-pie-chart"></i>
                                                    </div>
                                                </div>
                                                <div class="progress-info">
                                                    <div class="status">
                                                        <div class="status-title" style="color: black;">Budget: 12.5 Cr.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                       
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('footer.php'); ?>
        
    <?php $this->load->view('scripts.php'); ?>   
    <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
    <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>                                  
    </body>
</html>