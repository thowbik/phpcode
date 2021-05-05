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
                                    <div class="portlet box green">
                                        <div class="portlet-body">    
                                            <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                <thead>
                                                    <tr>
                                                        <th>First Name</th>               
                                                        <th>Last Name</th>
                                                        <th>Position</th>
                                                        <th>Office</th>
                                                        <th>Age</th>
                                                    <th>Start date</th>
                                                    <th>Salary</th>
                                                    <th>Extn.</th>
                                                    <th>E-mail</th>                                                               
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <tr>
                                                    <td>Tiger</td>
                                                    <td>Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                    <td>5421</td>
                                                    <td>t.nixon@datatables.net</td>
                                                 </tr>                      
                                            </tbody>                 
                                        </table> 
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