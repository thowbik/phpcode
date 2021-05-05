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
                                                    <h1>RENEWAL AND RECOGNITION</h1>
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

                                                    <div class="portlet light portlet-fit ">
                                                        <div class="portlet-body">
                                                            <div class="row">
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
                                                                            <i class="fa fa-globe"></i>APPLICATION PENDING DETAILS - DEO 
                                                                        </div>
                                                                        <div class="tools"> </div>
                                                                    </div>
                                                                    <div class="portlet-body">
                                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                                            <thead>
                                                                                <tr>
                                                                   <th>S.No</th>
                                                                  <th>District Name</th>
                                                                  <th>Education District</th>
                                                                  <th>Block Name</th>
                                                                  <th>Udise Code</th>
                                                                  <th>School Name</th>  
                                                                  <th>Number of days pending</th>
                                                                                                                        
                                                            </tr>
                                                                            </thead>

                                                                            <tbody>
                                                                                <?php 
                                                                    $i=1;
                                                                foreach($renewal_pending_detail_deo as $renew_pending_deo){ 
                                                            ?>
                                                                  <tr>
                                                                    <th style="font-weight: lighter;"><?php echo $i;?></th>
                                                                    <th style="font-weight: lighter;"><?php echo ($renew_pending_deo['district_name']);?></th>
                                                                    <th style="font-weight: lighter;"><?php echo ($renew_pending_deo['edu_dist_name']);?></th>
                                                                    <th style="font-weight: lighter;"> <?php echo ($renew_pending_deo['block_name']);?> </th>
                                                                    <th style="font-weight: lighter;"><?php echo ($renew_pending_deo['udise_code']);?> </th>
                                                                    <th style="font-weight: lighter;"><?php echo ($renew_pending_deo['school_name']);?> </th>
                                                                     <th style="font-weight: lighter; text-align: center;">  <?php 
                                                                $date1 = date('Y/m/d');
                                                                $date2 = $renew_pending_deo['createddate'];
                                                                $diff = abs(strtotime($date2) - strtotime($date1));
                                                                $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                                                  printf("%d",$days);
                                                                ?>
                                                                             </th>
                                                                                    </tr>
                                                                                     <?php $i++;?>
                                                                                    <?php } ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div </div>
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