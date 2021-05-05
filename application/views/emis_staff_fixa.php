<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>

        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />

        <style type="text/css">

            table{
                border-collapse: collapse;
            }

            /*table td, table th{
                border: 1px solid black;
            }*/

            /*th{
                background: grey child[0];
            }*/
            .th_bg{
                background: #dedede !important;
                /*color: #fff;*/
            }
            .th_clr{
                color:#06656e !important;
            }
            /*td{
                background: #b0a9a1e6;
                color: #fff;   
            }*/

            /*th{
                background: red;
            }*/
            
        </style>

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
                                        <h1>School
                                            <small>Staff Fixation</small>
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
                          
            <?php $is_high_class = $this->session->userdata('emis_school_highclass');

                ?>
            <?php $user_type_id = $this->session->userdata('emis_user_type_id'); ?> 
                                    <div class="page-content-inner">
                                       
                                        <?php $this->load->view('emis_school_profile_header1.php'); ?>
                                        

                                           <!-- <div class="m-heading-1 border-green m-bordered">
                                            <h3>Basic Information</h3>
                                        </div> -->
                                        <div class="portlet-body">
                                               <div class ="row">
                                                    <div class="col-md-4">
                                                        <font style="color:#dd4b39;">
                                                            <?php echo $this->session->flashdata('errors'); ?>
                                                        </font>
                                                    </div>
                                                </div>
                                            </div>
                                         <div class="portlet-body">
                                         <div class="mt-element-step">
                                            <div class="row step-thin">
                                                <!-- <a href="<?php echo base_url().'Admin/emis_school_admin1';?>"> --><div class="col-md-12 bg-grey mt-step-col active">
                                                    <div class="mt-step-number bg-white font-grey">1</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Staff fixation</div>
                                                    <div class="mt-step-content font-grey-cascade">Information</div>
                                                </div><!-- </a> -->
                                            </div>
                                         </div>
                                         </div>
                                         
                                        <br>
                                <?php 

                                if(isset($details)){
                                    foreach ($details as $fxa) {

                                        if ($fxa->med == "TM") { ?>
                                           
                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Staff Fixation Information - Tamil Medium</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table id="user" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr class="th_bg">
                                                                    <th colspan="7">Standards</th>
                                                                </tr>
                                                                <tr>
                                                                    <th class="th_clr">6th</th>
                                                                    <th class="th_clr">7th</th>
                                                                    <th class="th_clr">8th</th>
                                                                    <th class="th_clr">Total 6th - 8th</th>
                                                                    <th class="th_clr">9th</th>
                                                                    <th class="th_clr">10th</th>
                                                                    <th class="th_clr">Total 9th - 10th</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><?php echo $fxa->std_6; ?></td>
                                                                    <td><?php echo $fxa->std_7; ?></td>
                                                                    <td><?php echo $fxa->std_8; ?></td>
                                                                    <td><?php echo $fxa->tot_6_8; ?></td>
                                                                    <td><?php echo $fxa->std_9; ?></td>
                                                                    <td><?php echo $fxa->std_10; ?></td>
                                                                    <td><?php echo $fxa->tot_9_10; ?></td>
                                                                </tr>

                                                                <thead>
                                                                    <tr class="th_bg">
                                                                        <th colspan="7">Eligible Post</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="th_clr">1st  - 5th</th>
                                                                        <th class="th_clr">Per RTE Norms 6th - 8th</th>
                                                                        <th class="th_clr">Per 525 GO 9th - 10th</th>
                                                                        <th class="th_clr" colspan="4">Total Eligible Post <br/>(6+7+8)</th>
                                                                    </tr>
                                                                    <tr class="tr_bg">
                                                                        <td><?php echo $fxa->elg_pst_1_5; ?></td>
                                                                        <td><?php echo $fxa->elg_pst_rte_6_8; ?></td>
                                                                        <td><?php echo $fxa->elg_pst_go_9_10; ?></td>
                                                                        <td colspan="4"><?php echo $fxa->tot_elg_pst; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="7" class="th_bg">
                                                                            Eligible
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="th_clr">SGT</th>
                                                                        <th class="th_clr">SCI</th>
                                                                        <th class="th_clr">MAT</th>
                                                                        <th class="th_clr">ENG</th>
                                                                        <th class="th_clr">TAM</th>
                                                                        <th class="th_clr">SOC</th>
                                                                        <th class="th_clr">TOTAL</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $fxa->elg_sgt; ?></td>
                                                                        <td><?php echo $fxa->elg_sci; ?></td>
                                                                        <td><?php echo $fxa->elg_mat; ?></td>
                                                                        <td><?php echo $fxa->elg_eng; ?></td>
                                                                        <td><?php echo $fxa->elg_tam; ?></td>
                                                                        <td><?php echo $fxa->elg_soc; ?></td>
                                                                        <td><?php echo $fxa->elg_tot; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="7" class="th_bg">
                                                                            PG Handling
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="th_clr">SCI</th>
                                                                        <th class="th_clr">MAT</th>
                                                                        <th class="th_clr">ENG</th>
                                                                        <th class="th_clr">TAM</th>
                                                                        <th class="th_clr">SOC</th>
                                                                        <th class="th_clr" colspan="2">TOTAL</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $fxa->pg_hnlg_sci; ?></td>
                                                                        <td><?php echo $fxa->pg_hnlg_mat; ?></td>
                                                                        <td><?php echo $fxa->pg_hnlg_eng; ?></td>
                                                                        <td><?php echo $fxa->pg_hnlg_tam; ?></td>
                                                                        <td><?php echo $fxa->pg_hnlg_soc; ?></td>
                                                                        <td colspan="2"><?php echo $fxa->pg_hnlg_tot; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="7" class="th_bg">
                                                                            NET_BT
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="th_clr">SGT</th>
                                                                        <th class="th_clr">SCI</th>
                                                                        <th class="th_clr">MAT</th>
                                                                        <th class="th_clr">ENG</th>
                                                                        <th class="th_clr">TAM</th>
                                                                        <th class="th_clr">SOC</th>
                                                                        <th class="th_clr">TOTAL</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $fxa->net_bt_sgt; ?></td>
                                                                        <td><?php echo $fxa->net_bt_sci; ?></td>
                                                                        <td><?php echo $fxa->net_bt_mat; ?></td>
                                                                        <td><?php echo $fxa->net_bt_eng; ?></td>
                                                                        <td><?php echo $fxa->net_bt_tam; ?></td>
                                                                        <td><?php echo $fxa->net_bt_soc; ?></td>
                                                                        <td><?php echo $fxa->net_bt_tot; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="7" class="th_bg">
                                                                            Post Sanctioned
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="th_clr">SGT</th>
                                                                        <th class="th_clr">SCI</th>
                                                                        <th class="th_clr">MAT</th>
                                                                        <th class="th_clr">ENG</th>
                                                                        <th class="th_clr">TAM</th>
                                                                        <th class="th_clr">SOC</th>
                                                                        <th class="th_clr">TOTAL</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $fxa->post_sanc_sgt; ?></td>
                                                                        <td><?php echo $fxa->post_sanc_sci; ?></td>
                                                                        <td><?php echo $fxa->post_sanc_mat; ?></td>
                                                                        <td><?php echo $fxa->post_sanc_eng; ?></td>
                                                                        <td><?php echo $fxa->post_sanc_tam; ?></td>
                                                                        <td><?php echo $fxa->post_sanc_soc; ?></td>
                                                                        <td><?php echo $fxa->post_sanc_tot; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="7" class="th_bg">
                                                                            Surplus
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="th_clr">SGT</th>
                                                                        <th class="th_clr">SCI</th>
                                                                        <th class="th_clr">MAT</th>
                                                                        <th class="th_clr">ENG</th>
                                                                        <th class="th_clr">TAM</th>
                                                                        <th class="th_clr">SOC</th>
                                                                        <th class="th_clr">TOTAL</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $fxa->surpls_sgt; ?></td>
                                                                        <td><?php echo $fxa->surpls_sci; ?></td>
                                                                        <td><?php echo $fxa->surpls_mat; ?></td>
                                                                        <td><?php echo $fxa->surpls_eng; ?></td>
                                                                        <td><?php echo $fxa->surpls_tam; ?></td>
                                                                        <td><?php echo $fxa->surpls_soc; ?></td>
                                                                        <td><?php echo $fxa->surpls_tot; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="7" class="th_bg">
                                                                            Need
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="th_clr">SGT</th>
                                                                        <th class="th_clr">SCI</th>
                                                                        <th class="th_clr">MAT</th>
                                                                        <th class="th_clr">ENG</th>
                                                                        <th class="th_clr">TAM</th>
                                                                        <th class="th_clr" colspan="2">SOC</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $fxa->ned_sgt; ?></td>
                                                                        <td><?php echo $fxa->ned_sci; ?></td>
                                                                        <td><?php echo $fxa->ned_mat; ?></td>
                                                                        <td><?php echo $fxa->ned_eng; ?></td>
                                                                        <td><?php echo $fxa->ned_tam; ?></td>
                                                                        <td colspan="2"><?php echo $fxa->ned_soc; ?></td>
                                                                    </tr>   
                                                                </thead>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                 <?php }else if($fxa->med == "EM"){?>

                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Staff Fixation Information - English Medium</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                         <table id="user" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr class="th_bg">
                                                                    <th colspan="7">Standards</th>
                                                                </tr>
                                                                <tr>
                                                                    <th class="th_clr">6th</th>
                                                                    <th class="th_clr">7th</th>
                                                                    <th class="th_clr">8th</th>
                                                                    <th class="th_clr">Total 6th - 8th</th>
                                                                    <th class="th_clr">9th</th>
                                                                    <th class="th_clr">10th</th>
                                                                    <th class="th_clr">Total 9th - 10th</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><?php echo $fxa->std_6; ?></td>
                                                                    <td><?php echo $fxa->std_7; ?></td>
                                                                    <td><?php echo $fxa->std_8; ?></td>
                                                                    <td><?php echo $fxa->tot_6_8; ?></td>
                                                                    <td><?php echo $fxa->std_9; ?></td>
                                                                    <td><?php echo $fxa->std_10; ?></td>
                                                                    <td><?php echo $fxa->tot_9_10; ?></td>
                                                                </tr>

                                                                <thead>
                                                                    <tr class="th_bg">
                                                                        <th colspan="7">Eligible Post</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="th_clr">1st  - 5th</th>
                                                                        <th class="th_clr">Per RTE Norms 6th - 8th</th>
                                                                        <th class="th_clr">Per 525 GO 9th - 10th</th>
                                                                        <th class="th_clr" colspan="4">Total Eligible Post <br/>(6+7+8)</th>
                                                                    </tr>
                                                                    <tr class="tr_bg">
                                                                        <td><?php echo $fxa->elg_pst_1_5; ?></td>
                                                                        <td><?php echo $fxa->elg_pst_rte_6_8; ?></td>
                                                                        <td><?php echo $fxa->elg_pst_go_9_10; ?></td>
                                                                        <td colspan="4"><?php echo $fxa->tot_elg_pst; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="7" class="th_bg">
                                                                            Eligible
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="th_clr">SGT</th>
                                                                        <th class="th_clr">SCI</th>
                                                                        <th class="th_clr">MAT</th>
                                                                        <th class="th_clr">ENG</th>
                                                                        <th class="th_clr">TAM</th>
                                                                        <th class="th_clr">SOC</th>
                                                                        <th class="th_clr">TOTAL</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $fxa->elg_sgt; ?></td>
                                                                        <td><?php echo $fxa->elg_sci; ?></td>
                                                                        <td><?php echo $fxa->elg_mat; ?></td>
                                                                        <td><?php echo $fxa->elg_eng; ?></td>
                                                                        <td><?php echo $fxa->elg_tam; ?></td>
                                                                        <td><?php echo $fxa->elg_soc; ?></td>
                                                                        <td><?php echo $fxa->elg_tot; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="7" class="th_bg">
                                                                            PG Handling
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="th_clr">SCI</th>
                                                                        <th class="th_clr">MAT</th>
                                                                        <th class="th_clr">ENG</th>
                                                                        <th class="th_clr">TAM</th>
                                                                        <th class="th_clr">SOC</th>
                                                                        <th class="th_clr" colspan="2">TOTAL</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $fxa->pg_hnlg_sci; ?></td>
                                                                        <td><?php echo $fxa->pg_hnlg_mat; ?></td>
                                                                        <td><?php echo $fxa->pg_hnlg_eng; ?></td>
                                                                        <td><?php echo $fxa->pg_hnlg_tam; ?></td>
                                                                        <td><?php echo $fxa->pg_hnlg_soc; ?></td>
                                                                        <td colspan="2"><?php echo $fxa->pg_hnlg_tot; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="7" class="th_bg">
                                                                            NET_BT
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="th_clr">SGT</th>
                                                                        <th class="th_clr">SCI</th>
                                                                        <th class="th_clr">MAT</th>
                                                                        <th class="th_clr">ENG</th>
                                                                        <th class="th_clr">TAM</th>
                                                                        <th class="th_clr">SOC</th>
                                                                        <th class="th_clr">TOTAL</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $fxa->net_bt_sgt; ?></td>
                                                                        <td><?php echo $fxa->net_bt_sci; ?></td>
                                                                        <td><?php echo $fxa->net_bt_mat; ?></td>
                                                                        <td><?php echo $fxa->net_bt_eng; ?></td>
                                                                        <td><?php echo $fxa->net_bt_tam; ?></td>
                                                                        <td><?php echo $fxa->net_bt_soc; ?></td>
                                                                        <td><?php echo $fxa->net_bt_tot; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="7" class="th_bg">
                                                                            Post Sanctioned
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="th_clr">SGT</th>
                                                                        <th class="th_clr">SCI</th>
                                                                        <th class="th_clr">MAT</th>
                                                                        <th class="th_clr">ENG</th>
                                                                        <th class="th_clr">TAM</th>
                                                                        <th class="th_clr">SOC</th>
                                                                        <th class="th_clr">TOTAL</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $fxa->post_sanc_sgt; ?></td>
                                                                        <td><?php echo $fxa->post_sanc_sci; ?></td>
                                                                        <td><?php echo $fxa->post_sanc_mat; ?></td>
                                                                        <td><?php echo $fxa->post_sanc_eng; ?></td>
                                                                        <td><?php echo $fxa->post_sanc_tam; ?></td>
                                                                        <td><?php echo $fxa->post_sanc_soc; ?></td>
                                                                        <td><?php echo $fxa->post_sanc_tot; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="7" class="th_bg">
                                                                            Surplus
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="th_clr">SGT</th>
                                                                        <th class="th_clr">SCI</th>
                                                                        <th class="th_clr">MAT</th>
                                                                        <th class="th_clr">ENG</th>
                                                                        <th class="th_clr">TAM</th>
                                                                        <th class="th_clr">SOC</th>
                                                                        <th class="th_clr">TOTAL</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $fxa->surpls_sgt; ?></td>
                                                                        <td><?php echo $fxa->surpls_sci; ?></td>
                                                                        <td><?php echo $fxa->surpls_mat; ?></td>
                                                                        <td><?php echo $fxa->surpls_eng; ?></td>
                                                                        <td><?php echo $fxa->surpls_tam; ?></td>
                                                                        <td><?php echo $fxa->surpls_soc; ?></td>
                                                                        <td><?php echo $fxa->surpls_tot; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="7" class="th_bg">
                                                                            Need
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="th_clr">SGT</th>
                                                                        <th class="th_clr">SCI</th>
                                                                        <th class="th_clr">MAT</th>
                                                                        <th class="th_clr">ENG</th>
                                                                        <th class="th_clr">TAM</th>
                                                                        <th class="th_clr" colspan="2">SOC</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $fxa->ned_sgt; ?></td>
                                                                        <td><?php echo $fxa->ned_sci; ?></td>
                                                                        <td><?php echo $fxa->ned_mat; ?></td>
                                                                        <td><?php echo $fxa->ned_eng; ?></td>
                                                                        <td><?php echo $fxa->ned_tam; ?></td>
                                                                        <td colspan="2"><?php echo $fxa->ned_soc; ?></td>
                                                                    </tr>   
                                                                </thead>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                 <?php }}}?>
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




        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->



         <script>



      /*  $('#loweststd').editable({
            type: 'text',
            pk: 1,
            name: 'low_class',
            title: 'Enter Lowest Standard',
            success: function(response, newValue) {
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             }/*,
            validate: function(value){
                if(! /^[a-zA-Z ]*$/.test(value))
                {
                    return 'Invalid Standard Name';
                }
            } 
        });    */    
        /*$('#higheststd').editable({
            type: 'text',
            pk: 1,
            name: 'higheststd',
            title: 'Enter Hightest Standard',
            success: function(response, newValue) {
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             }/*,
            validate: function(value){
                if(! /^[a-zA-Z ]*$/.test(value))
                {
                    return 'Invalid Standard Name';
                }
            } 
        }); */
      /*  $('#boardofedu').editable({
            type: 'text',
            pk: 1,
            name: 'board',
            title: 'Enter Board of Education',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             }/*,
            validate: function(value){
                if(! /^[a-zA-Z ]*$/.test(value))
                {
                    return 'Invalid board name';
                }
            } 
        });     */    
        $('#noofmedium').editable({
            type: 'text',
            pk: 1,
            name: 'noof_med',
            title: 'Enter the number of mediums in school',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(! /^\d+$/.test(value))
                {
                    return 'Invalid number';
                }
            }
        });

        var countries = [];
        $.each({
            "YE": "YES",
            "NO": "NO",
            "CO": "Co-Ed",
        }, function(k, v) {
            countries.push({
                id: k,
                text: v
            });
        });

        var std = [];
        $.each({
            "1": "I Std",
            "2": "II Std",
            "3": "III Std",
            "4": "IV Std",
            "5": "V Std",
            "6": "VI Std",
            "7": "VII Std",
            "8": "VIII Std",
            "9": "IX Std",
            "10": "X Std",
            "11": "XI Std",
            "12": "XII Std"



        }, function(k, v) {
            std.push({
                id: k,
                text: v
            });
        });
        
        var yesno = [];

        $.each({
            "Yes": "YES",
            "No": "NO",
            
            }, function(k, v) {
            yesno.push({
                id: k,
                text: v
            });
        });

        var yesnonew = [];

        $.each({
            "1": "YES",
            "0": "NO",
            
            }, function(k, v) {
            yesnonew.push({
                id: k,
                text: v
            });
        });

        var board = []
        $.each({
            "State Board": "State Board",
            "CBSC": "CBSC"
            
            }, function(k, v) {
            board.push({
                id: k,
                text: v
            });
        });

        var type=[]
        $.each({
            "Co-Ed":"Co-Ed",
            "Girls":"Girls",
            "Boys":"Boys"
            
            }, function(k, v) {
            type.push({
                id: k,
                text: v
            });
        });


        var medium=[]
        <?php foreach($mediums as $k => $v){ ?>
                medium.push({value: '<?php echo $k; ?>', text: '<?php echo $v; ?>'});
        <?php } ?>

        $('#higheststd').editable({
            inputclass: 'form-control input-medium',
            source: std,
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else
                     {
                        location.reload();
                     }
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(! /^([1-9]|1[0-2])$/.test(value))
                {
                    return 'Invalid Standard';
                }
            }
        }); 

        $('#loweststd').editable({
            inputclass: 'form-control input-medium',
            source: std,
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else 
                     toastr.success("Lowest Standard updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(! /^([1-9]|1[0-2])$/.test(value))
                {
                    return 'Invalid Standard';
                }
            }
        }); 

         $('#typeofschool').editable({
            inputclass: 'form-control input-medium',
            source: type,
             success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else 
                     toastr.success("Type of school updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(!value.trim())
                {
                    return 'School type cannot be empty';
                }
            }
        }); 
         $('#smcsmdc').editable({
            inputclass: 'form-control input-medium',
            source: yesno,
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else 
                     toastr.success("Status updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(value != "Yes" && value != "No")
                {
                     return 'Invalid data';

                }
            }
        }); 
         $('#minorityschool').editable({
            inputclass: 'form-control input-medium',
            source: yesnonew,
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                      else 
                     toastr.success("Status updated sucessfully", "Update Notifications");
            
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(value != "0" && value != "1")
                {
                     return 'Invalid data';

                }
            }
        }); 
        $('#boardofedu').editable({
            inputclass: 'form-control input-medium',
            source: board,
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    if(result.response_code == 1)  return location.reload();
            
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(! /^[a-zA-Z ]*$/.test(value))
                {
                    return 'Invalid Board';
                }
            }
        });
         $('#schoolid').editable({
            type: 'text',
            pk: 1,
            name: 'school_key_id',
            title: 'Enter School ID',
            success: function(response, newValue) {
                     if(response == 0) return "Unable to update.Please try later"; 
                      else 
                     toastr.success("School id updated sucessfully", "Update Notifications");
            
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(! /^\d+$/.test(value))
                {
                    return 'Invalid school id';
                }
            }
            });
         
  
        $('#mediumofins').editable({
            pk: 1,
            limit: 3,
            source: medium,

            success: function(response, newValue) {
              document.getElementById('noof').innerHTML = $('input:checkbox:checked').length;
             
                    
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
        });



         $('#languagestaughtasasubject').editable({
            pk: 1,
            limit: 3,
            source: medium,

            success: function(response, newValue) {
              // document.getElementById('noof').innerHTML = $('input:checkbox:checked').length;
             
                    
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
        });


            // init editable toggler
             $('#user .editable').editable('toggleDisabled');
            $('#enable').click(function() {
                $('#user .editable').editable('toggleDisabled');
            });


</script>

    </body>

</html>