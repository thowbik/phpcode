<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL STYLES -->

       
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->


    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

 <?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
<?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
<?php $this->load->view('block/header.php'); }else{ ?>
<?php $this->load->view('header.php'); }?>

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
                                        <h1>Dashboard
                                            <small>School Dashboard</small>
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
                                     <center>   
                                <?php $this->load->view('emis_school_profile_header.php'); ?>
                                        </center>
           
                                        <!-- BEGIN CARDS -->
                                        <div class="row margin-bottom-20">
                                 
                                            <a href="<?php echo base_url().'Registration/emis_student_reg';?>" target="_blank" class="">
                                            <div class="col-lg-3 col-md-3">
                                                <div class="portlet light">
                                                    <div class="card-icon" style="padding-top: 13%;padding-bottom: 13%;">
                                                        <img src="<?php echo base_url().'asset/images/createstudent.png'?>" style="width: 60%;height: 60%;">
                                                    </div>
                                                    <div class="card-title">
                                                        <span> Create Student </span>
                                                    </div>
                                                    <!-- <div class="card-desc">
                                                        <span> The best way to find yourself is
                                                            <br> to lose yourself in the service of others </span>
                                                    </div> -->
                                                </div>
                                            </div>
                                            </a>
                                            <a href="<?php echo base_url().'Home/emis_school_studentlist';?>" target="_blank" class="">
                                            <div class="col-lg-3 col-md-3">
                                                <div class="portlet light">
                                                    <div class="card-icon" style="padding-top: 13%;padding-bottom: 13%;">
                                                        <img src="<?php echo base_url().'asset/images/studentlist.png'?>" style="width: 60%;height: 60%;">
                                                    </div>
                                                    <div class="card-title">
                                                        <span> Student List </span>
                                                    </div>
                                                   <!--  <div class="card-desc">
                                                        <span> The best way to find yourself is
                                                            <br> to lose yourself in the service of others </span>
                                                    </div> -->
                                                </div>
                                            </div>
                                            </a>
                                            <a href="<?php echo base_url().'Home/emis_school_profile';?>" target="_blank" class="">
                                            <div class="col-lg-3 col-md-3">
                                                <div class="portlet light">
                                                    <div class="card-icon" style="padding-top: 13%;padding-bottom: 13%;">
                                                        <img src="<?php echo base_url().'asset/images/schoolprofile.png'?>" style="width: 60%;height: 60%;">
                                                    </div>
                                                    <div class="card-title">
                                                        <span> School Profile </span>
                                                    </div>
                                                   <!--  <div class="card-desc">
                                                        <span> The best way to find yourself is
                                                            <br> to lose yourself in the service of others </span>
                                                    </div> -->
                                                </div>
                                            </div>
                                            </a>
                                            <a href="<?php echo base_url().'Design/emis_school_asset1';?>" target="_blank" class="">
                                            <div class="col-lg-3 col-md-3">
                                                <div class="portlet light">
                                                    <div class="card-icon" style="padding-top: 13%;padding-bottom: 13%;">
                                                        <img src="<?php echo base_url().'asset/images/asset.png'?>" style="width: 60%;height: 60%;">
                                                    </div>
                                                    <div class="card-title">
                                                        <span> Assets </span>
                                                    </div>
                                                   <!--  <div class="card-desc">
                                                        <span> The best way to find yourself is
                                                            <br> to lose yourself in the service of others </span>
                                                    </div> -->
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        <!-- first row ending -->
                                        <!-- second row Begin -->
                                        <div class="row margin-bottom-20">
                                            </a>
                                            <a href="<?php echo base_url().'Design/emis_school_staff1';?>" target="_blank" class="">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="portlet light">
                                                    <div class="card-icon" style="padding-top: 13%;padding-bottom: 13%;">
                                                        <img src="<?php echo base_url().'asset/images/staff.png'?>" style="width: 60%;height: 60%;">
                                                    </div>
                                                    <div class="card-title">
                                                        <span> Staff </span>
                                                    </div>
                                                   <!--  <div class="card-desc">
                                                        <span> The best way to find yourself is
                                                            <br> to lose yourself in the service of others </span>
                                                    </div> -->
                                                </div>
                                            </div>
                                            </a>
                                            </a>
                                            <a href="<?php echo base_url().'Design/emis_school_schemes1';?>" target="_blank" class="">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="portlet light">
                                                    <div class="card-icon" style="padding-top: 13%;padding-bottom: 13%;">
                                                        <img src="<?php echo base_url().'asset/images/schemes.png'?>" style="width: 60%;height: 60%;">
                                                    </div>
                                                    <div class="card-title">
                                                        <span> Schemes </span>
                                                    </div>
                                                   <!--  <div class="card-desc">
                                                        <span> The best way to find yourself is
                                                            <br> to lose yourself in the service of others </span>
                                                    </div> -->
                                                </div>
                                            </div>
                                            </a>
                                            </a>
                                            <a href="<?php echo base_url().'Design/emis_school_examresult1';?>" target="_blank" class="">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="portlet light">
                                                    <div class="card-icon" style="padding-top: 13%;padding-bottom: 13%;">
                                                        <img src="<?php echo base_url().'asset/images/assessment.png'?>" style="width: 60%;height: 60%;">
                                                    </div>
                                                    <div class="card-title">
                                                        <span> Periodical Assessment </span>
                                                    </div>
                                                   <!--  <div class="card-desc">
                                                        <span> The best way to find yourself is
                                                            <br> to lose yourself in the service of others </span>
                                                    </div> -->
                                                </div>
                                            </div>
                                            </a>
                                            </a>
                                            <a href="<?php echo base_url().'Design/emis_school_finance';?>" target="_blank" class="">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="portlet light">
                                                    <div class="card-icon" style="padding-top: 13%;padding-bottom: 13%;">
                                                        <img src="<?php echo base_url().'asset/images/finance.png'?>" style="width: 60%;height: 60%;">
                                                    </div>
                                                    <div class="card-title">
                                                        <span> Finance </span>
                                                    </div>
                                                   <!--  <div class="card-desc">
                                                        <span> The best way to find yourself is
                                                            <br> to lose yourself in the service of others </span>
                                                    </div> -->
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        <!-- END CARDS -->

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


    </body>

</html>