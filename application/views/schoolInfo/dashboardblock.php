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
                                       <?php $this->load->view('emis_school_profile_header1.php'); ?>
                                    <div class="portlet light portlet-fit ">
                                        <div class="portlet-body">
                                            <div class ="row">
                                                <div class="col-md-4">
                                                    <font style="color:#dd4b39;"><?php echo $this->session->flashdata('errors'); ?></font>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $user_type_id = $this->session->userdata('emis_user_type_id'); ?> 
                                        
                                        
                                        
                                        
                                   <div class="form-actions">
                                            <div class="portlet box green">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-globe"></i>SCHOOL PROFILE COMPLETION - BLOCK</div>
                                                    <div class="tools"> </div>
                                                </div>
                                                <div class="portlet-body">    
                                                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                        <thead>
                                                            <tr>
                                                                <th>Block </th>                        
                                                                <th>Part I</th>   
                                                                <th>Part II</th>
                                                                <th>Part III</th>
                                                                <th>Part IV</th>
                                                                <th>Part V</th>
                                                                <th>Part VI</th>                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th><a href="<?php echo base_url().'Basic/emis_school_basic1/3';?>">Trichy</a> </th>                        
                                                                <th>205</th>   
                                                                <th>100</th>
                                                                <th>300</th>
                                                                <th>400</th>
                                                                <th>500</th>
                                                                <th>600</th>                                                                
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
        </div>
        <?php $this->load->view('footer.php'); ?>
    </div>
        <?php $this->load->view('scripts.php'); ?>                                     
    </body>
</html>