<?php 

    
      // echo"<pre>";print_r($staff_details);echo"</pre>";
     ?>           

<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    <style>
    .clickable{
    cursor: pointer;   
}

.panel-heading span {
    margin-top: -20px;
    font-size: 15px;
}
.tablecolor
{
    background-color: #32c5d2; 
}
.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 35px;
}
.btn-circle.btn-lgs {
  width: 50px;
  height: 50px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 25px;
  font-size:16px  !important;
}
.header-size
{
    font-size:11px !important ; 
}
small
{
  font-size:14px!important;
}
.btn
{
      text-transform: initial !important;

}
.btn-block
{
  width: 80% !important;
  border-radius: 10px !important; 
  font-size: 15px !important;
  margin-left :5px !important;
}
.custom
{
  width: 100px !important;
  margin-bottom: 5px !important;
}
.badge
{
  color:black !important;
}
.panel-title
{
  color:#000 !important;
}
.pull-right
{
  color:#000 !important;
}
.fa-stack-1x
{
  margin-left :-30% !important;
  /*color :black !important;*/
  margin-top: 2px !important;
  font-size:18px !important;
}
.space-2px
{
    padding-bottom: 23px !important;
}
.bs-callout-lightsteelblue {
        border-left: 8px solid lightsteelblue;
        border-radius: 3% !important;
    }
    
    .bs-callout-darkseagreen {
        border-left: 8px solid darkseagreen;
        border-radius: 3% !important;
    }
    
    .bs-callout-mediumaquamarine {
        border-left: 8px solid mediumaquamarine;
        border-radius: 3% !important;
    }
    
    .bs-callout-lightblue {
        border-left: 8px solid lightblue;
        border-radius: 3% !important;
    }
 .panel-success > .bs-callout-lightsteelblue {
        background-color:  lightsteelblue !important;
        /*border-radius: 3% !important;*/
            border-color: lightsteelblue !important;
            color :white !important;
    }
    .panel-success > .bs-callout-lightblue {
        background-color:  lightblue !important;
        /*border-radius: 3% !important;*/
            border-color: lightblue !important;
            color :white !important;
    }
    .panel-success > .bs-callout-darkseagreen {
        background-color:  darkseagreen !important;
        /*border-radius: 3% !important;*/
            border-color: darkseagreen !important;
            color :white !important;
    }
    .panel-success > .bs-callout-mediumaquamarine {
        background-color:  mediumaquamarine !important;
        /*border-radius: 3% !important;*/
            border-color: mediumaquamarine !important;
            color :white !important;
    }
.icon>i {
        color: #cbd4e0;
    font-size: 42px !important;
}
.icon
{
    margin-top:-16% !important;

}
.dashboard-stat2 {
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    -ms-border-radius: 2px;
    -o-border-radius: 2px;
    border-radius: 2px;
    background: #fff;
    padding: 15px 15px 3px!important;
}
</style>
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-table/bootstrap-table.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
            
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
            
            <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->


    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

 <?php  $this->load->view('Deo_District/header.php');  ?>
<div class="page-content">
                                <div></div> 
                                <br/>
                                <div class="container">
                                    <div class="row">
                                        <div class="row margin-bottom-20">
                                    <div class=" row page-content-inner">
                                    <!--<a href="<?php echo base_url().'State/getstudentsalltotal/1/0/'.$this->session->userdata('emis_deo_id'); ?>">-->
                                       <a href="<?php echo base_url().'Deo_District/emis_Deo_District_home'; ?>">
                    <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="bs-callout-lightsteelblue dashboard-stat2">
                            <div class="display">
                                <div class="number">
                                    <h3 class="font-green-sharp">
                                                         <span class="bottom" data-counter="counterup" data-value="34">Total Students</span>

                                                            </h3>

                                    <h3> 
        <?php echo number_format($total_count_details->student_total);?></h3>
                                </div>
                                <br/>
                                <br/>
                                <br/>

                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
                <!-- 1 Card End -->
                <a href="<?php echo base_url().'Deo_District/emis_teacher_classwise_district'; ?>">
                   <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="bs-callout-lightblue dashboard-stat2">
                            <div class="display">
                                <div class="number">
                                    <h3 class="font-green-sharp">
                                                         <span class="bottom" data-counter="counterup" data-value="30">Total Staff</span>

                                                            </h3>

                                    
                       <h3> <?php echo number_format($total_count_details->teacher_total); ?></h3>
                                </div>
                                  <br/>
                                <br/>
                                <br/>
                                <div class="icon">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
                <!-- 2 Card End -->
                <a href="#">
                    <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="bs-callout-mediumaquamarine dashboard-stat2">
                            <div class="display">
                                <div class="number">
                                    <h3 class="font-green-sharp">
                                                         <span class="bottom" data-counter="counterup" data-value="34">Total Schools</span>

                                                            </h3>

                                    <h3> 
        <?php echo number_format($total_count_details->school_total) ?></h3>
                                </div>
                                <br/>
                                <br/>
                                <br/>

                                <div class="icon">
                                    <i class="fa fa-university"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
                  <a href="#">
                    <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="bs-callout-mediumaquamarine dashboard-stat2">
                            <div class="display">
                                <div class="number">
                                    <h3 class="font-green-sharp">
                                                         <span class="bottom" data-counter="counterup" data-value="34">Govt PreKG-I Std</span>

                                                            </h3>

                                    <h3> 
        <?php echo number_format($Govt_detail[0]->total) ?></h3>
                                </div>
                                <br/>
                                <br/>
                                <br/>

                                <div class="icon">
                                    <i class=""></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
            </div>
        </div>
                                    </div>
                               <div class="row">
        
                                    <!-- BEGIN PAGE CONTENT INNER -->
                          
                    <div class="row margin-bottom-20">
                                    <div class=" row page-content-inner">

<div class="col-lg-3">
        
            <div class="panel panel-success">
                <div class="panel-heading bs-callout-lightsteelblue">
                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-users"></i> Students Details</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> </span>
                </div>
                <div class="panel-body">
                                   <div class="row">
                                    <?php if(!empty($school_type)) {
                                        $total_student = [];
                                            // print_r($school_based_count_details);
                                        ?>

                                    <?php foreach($school_type as $index => $student_details){
                                            $student_total = $school_based_count_details[$index][$student_details->school_type]->student_total;
                                            array_push($total_student,$student_total);
                                        ?>
                                                    <div class="col-md-7 space-2px">
                                                            <small><?=$student_details->school_type;?></small>
                                                    </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b>
                                                                <?=number_format($student_total);?>
                                                            </b></small>
                                                        </div>
                                                    <?php } ?>
                                                        <div class="col-md-7 space-2px">
                                                            <small>Total</small>
                                                    </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b>
                                                                    <?=number_format(array_sum($total_student));?>
                                                            </b></small>
                                                        </div>
                                              <?php   }?>
                                                        </div>

                                                
                </div>
        </div>
    
    </div>
    
    

  <!-- 2 page -->

    <div class="col-lg-3">
        
            <div class="panel panel-success">
                <div class="panel-heading bs-callout-lightblue">
                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-graduation-cap
"></i> Teachers</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> </span>
                </div>
                <div class="panel-body">
                   <div class="row">
                                    <?php if(!empty($school_type)) {
                                        $total_teacher = [];
                                            // print_r($school_based_count_details);
                                        ?>

                                    <?php foreach($school_type as $index => $student_details){
                                            $teacher_total = $school_based_count_details[$index][$student_details->school_type]->teacher_total;
                                            array_push($total_teacher,$teacher_total);
                                        ?>
                                                    <div class="col-md-7 space-2px">
                                                            <small><?=$student_details->school_type;?></small>
                                                    </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b>
                                                                <?=number_format($teacher_total);?>
                                                            </b></small>
                                                        </div>
                                                    <?php } ?>
                                                        <div class="col-md-7 space-2px">
                                                            <small>Total</small>
                                                    </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b>
                                                                    <?=number_format(array_sum($total_teacher));?>
                                                            </b></small>
                                                        </div>
                                              <?php   }?>
                                                        </div>

                                                
                </div>

                                                
                </div>
        </div>
    
    
    

    <!-- 3 Page -->

    <div class="col-lg-3">
        
            <div class="panel panel-success">
                <div class="panel-heading bs-callout-darkseagreen">
                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-university"></i> Non-Teaching Staff</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> </span>
                </div>
                <div class="panel-body">
                   <div class="row">
                                    <?php if(!empty($school_type)) {
                                        $total_school = [];
                                           //  print_r($school_based_count_details);
                                        ?>

                                    <?php foreach($school_type as $index => $student_details){
                                            $non_teach = $school_based_count_details[$index][$student_details->school_type]->non_teach;
                                            array_push($total_school,$non_teach);
                                        ?>
                                                    <div class="col-md-7 space-2px">
                                                            <small><?=$student_details->school_type;?></small>
                                                    </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b style="float: right;">
                                                                <?=number_format($non_teach);?>
                                                            </b></small>
                                                        </div>
                                                    <?php } ?>
                                                        <div class="col-md-7 space-2px">
                                                            <small>Total</small>
                                                    </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b style="float: right;">
                                                                    <?=number_format(array_sum($total_school));?>
                                                            </b></small>
                                                        </div>
                                              <?php   }?>
                                                        </div>

                                                
                </div>
        </div>
    
    </div>
    
    <!-- 4 page -->
      <div class="col-lg-3">
        
            <div class="panel panel-success">
                <div class="panel-heading bs-callout-darkseagreen">
                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-university"></i> Schools</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> </span>
                </div>
                <div class="panel-body">
                   <div class="row">
                                     <?php if(!empty($school_type)) {
                                        $total_school = [];
                                            // print_r($school_based_count_details);
                                        ?>

                                    <?php foreach($school_type as $index => $student_details){
                                            $school_total = $school_based_count_details[$index][$student_details->school_type]->school_total;
                                            array_push($total_school,$school_total);
                                        ?>
                                                    <div class="col-md-7 space-2px">
                                                            <small><?=$student_details->school_type;?></small>
                                                    </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b>
                                                                <?=number_format($school_total);?>
                                                            </b></small>
                                                        </div>
                                                    <?php } ?>
                                                        <div class="col-md-7 space-2px">
                                                            <small>Total</small>
                                                    </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b>
                                                                    <?=number_format(array_sum($total_school));?>
                                                            </b></small>
                                                        </div>
                                              <?php   }?>
                                                        </div>

                                                
                </div>
        </div>
    
    </div>
    

   
</div>

    <!-- 5 page -->
<div class=" row page-content-inner">
    <!--<div class="col-lg-3">
        
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-university"></i> Schemes</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> </span>
                </div>
                <div class="panel-body">
                   <div class="row">
                                                    <div class="col-md-7 space-2px">
                                                            <small>TextBooks &amp; Notebooks</small>
                                                    </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b><a href="<?php echo base_url().'Basic/calldashboard/0/0/3';?>"><?php echo($freeschemes[0]->txtandnote); ?></a></b></small>
                                                        </div>

                                                        <div class="col-md-7 space-2px">
                                                            <small>Uniforms</small>
                                                    </div>
                                                    
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b><a href="<?php echo base_url().'Basic/calldashboard/0/0/1';?>"><?php echo($freeschemes[0]->uniform); ?></a></b></small>
                                                        </div>
                                                        
                                                          <div class="col-md-7 space-2px">
                                                            <small>School Bags</small>
                                                    </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b><a href="<?php echo base_url().'Basic/calldashboard/0/0/4';?>"><?php echo($freeschemes[0]->school_bag); ?></a></b></small>
                                                        </div>
                                                        <div class="col-md-7 space-2px">
                                                            <small>Footware</small>
                                                    </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b><a href="<?php echo base_url().'Basic/calldashboard/0/0/2';?>"><?php echo($freeschemes[0]->footwear); ?></a></b></small>
                                                        </div>
                                                        <div class="col-md-7 space-2px">
                                                            <small>BiCycles</small>
                                                    </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b><a href="<?php echo base_url().'Basic/calldashboard/0/0/10';?>"><?php echo($freeschemes[0]->cycle); ?></a></b></small>
                                                        </div>
                                                        <div class="col-md-7 space-2px">
                                                            <small>Laptops</small>
                                                    </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b><a href="<?php echo base_url().'Basic/calldashboard/0/0/11';?>"><?php echo($freeschemes[0]->laptop); ?></a></b></small>
                                                    </div>
                                                        </div>

                                                
                </div>
        </div>
    
    </div>-->

    <!-- 6 Page -->

    <div class="col-lg-3">
        
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-university"></i> Renewal/Recognition</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> </span>
                </div>
                <div class="panel-body">
                   <div class="row">
                                                    <div class="col-md-9 space-2px">
                                                            <small>Total Pending Application</small>
                                                    </div>
                                                    <div class="col-md-3 space-2px">
                                               
                                                            <small>: &nbsp;&nbsp;<b><a href="<?php echo base_url().'Deo_District/dash_renewal';?>"><?php echo ($renewal_details[0]['TOTAL']); ?></a></b></small>
                                                        </div>

                                                        <div class="col-md-9 space-2px">
                                                            <small>Pending BEO Approval</small>
                                                    </div>
                                                    
                                                    <div class="col-md-3 space-2px">
                                                            <small>: &nbsp;&nbsp;<b><a href="<?php echo base_url().'Deo_District/dash_renewal_beo/';?>"> <?php echo ($renewal_details[0]['BEO']); ?></a></b></small>
                                                        </div>
                                                        
                                                          <div class="col-md-9 space-2px">
                                                            <small>Pending DEO Approval</small>
                                                    </div>
                                                    <div class="col-md-3 space-2px">
                                                            <small>: &nbsp;&nbsp;<b><a href="<?php echo base_url().'Deo_District/dash_renewal_deo/';?>"><?php echo ($renewal_details[0]['DE0']); ?></a></b></small>
                                                        </div>
                                                        <div class="col-md-9 space-2px">
                                                            <small>Pending CEO Approval</small>
                                                    </div>
                                                    <div class="col-md-3 space-2px">
                                                            <small>: &nbsp;&nbsp;<b><a href="<?php echo base_url().'Deo_District/dash_renewal_ceo/';?>"><?php echo ($renewal_details[0]['CE0']); ?></a></b></small>
                                                        </div>
                                                        <div class="col-md-9 space-2px">
                                                            <small></small>
                                                    </div>
                                                        <div class="col-md-9 space-2px">
                                                            <small>Approved List</small>
                                                    </div>
                                                     <div class="col-md-3 space-2px">
                                                            <small>: &nbsp;&nbsp;<b><a href="<?php echo base_url().'Block/getRenewalDash';?>"></small><?php echo ($renewal_details[0]['APPROVED']); ?></a></b></small>
                                                    </div>
                                                     <div class="col-md-9 space-2px">
                                                            <small>Rejected List</small>
                                                    </div>
                                                     <div class="col-md-3 space-2px">
                                                            <small>: &nbsp;&nbsp;<b><a href="#"></small><?php echo ($renewal_details[0]['REJECTED']); ?></a></b></small>
                                                    </div>
                                                        </div>

                                                
                </div>
        </div>
    
    </div> 

    <!-- 7 Page-->
     <div class="col-lg-3">
        
            <div class="panel panel-success">
                <div class="panel-heading mediumaquamarine">
                    <h3 class="panel-title"><i class="fa fa-cloud-download"></i> Downloads </h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> </span>
                </div>
                <div class="panel-body" style="height: 300px;overflow-y: scroll;">
                   <div class="row">
                                              


                                                          
                                                            <?php if(!empty($reports_csv)){
                                                        // Common::get_url();
                                                                // print_r($this->session->userdata());
                                                                $dist_id = $this->session->userdata('emis_deo_id');
                                                                $keyname = $reports_csv[0]->s3_parent.'/'.$reports_csv[0]->s3_folder.'/'.$dist_id.$reports_csv[0]->s3_file;
                                                            
                                                                foreach($reports_csv as $report){
                                                            $keyname = $report->s3_parent.'/'.$report->s3_folder.'/'.$dist_id.$report->s3_file;
                                                            $get_link = Common::get_url(EMIS_REPORT,$keyname,'+5 minutes');

                                                        ?>
<div class="col-md-12 space-2px">
                                                            <a href="<?=$get_link?>" style="text-decoration: underline;color:black;"><small><?=$report->report_name?></small> <i class="fa fa-file-excel-o"></i></a>
                                                    </div>
                                                    

                                                    <?php } }?>

                                                        </div>

                                                
                </div>
        </div>
    
    </div>

    <!-- 8 pages -->
    <div class="col-lg-3">
        
            <div class="panel panel-success">
                <div class="panel-heading mediumaquamarine">
                    <h3 class="panel-title"><i class="fa fa-envelope"></i> Messages &nbsp<span style="margin-top:-5px;background-color:yellow;"class="badge"><?=(!empty($old_flash_message)?sizeof($old_flash_message):'0');?></span> &nbsp;<a href="<?php echo base_url().'Deo_District/get_flash_news'?>"><i class="fa fa-plus"></i> </a></h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> </span>
                </div>
                <div class="panel-body">
                   <div class="row">
                                                      

                                                          <marquee behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start();" scrollamount="2">
                                                            <?php if(!empty($old_flash_message)){
                                                        foreach($old_flash_message as $news){
                                                        ?>
<a href="javascript:void(0);" onclick="show_data('<?=$news->id;?>');" style="text-align: center;"><h4><?=$news->title?> </h4> 
  <h5><?=$news->user_type.' - '.date('d-m-Y',strtotime($news->created_date));?></h5></a><br/>
                                                      <?php } }?>
</marquee>


                                                    
                                                        <!-- <div class="col-md-9">
                                                            <small>Students Without Bank Account</small>
                                                    </div>
                                                    <div class="col-md-3">
                                                            <small>: &nbsp;&nbsp;45</small>
                                                        </div>
                                                          <div class="col-md-9">
                                                            <small>Incomplete Teacher Profiles</small>
                                                    </div>
                                                    <div class="col-md-3">
                                                            <small>: &nbsp;&nbsp;12</small>
                                                        </div> -->
                                                        </div>

                                                
                </div>
        </div>
    
    </div>
                                       
                                           

                                        </div>
                                       

                                </div>

                     <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="title"></h4>
        </div>
        <div class="modal-body">
          <p class="content"></p>
        </div>
        <div class="modal-footer">
          <p id="create"></p>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>           
                    
            <?php $this->load->view('scripts.php'); ?>
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> -->
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/moment.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/jquery.mockjax.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js';?>" type="text/javascript"></script>
            <!-- Js for hide and show the tables and datas -->
            <script src="<?php echo base_url().'asset/global/plugins/jquery.validate.min.js';?>"></script>
            <script src="<?php echo base_url().'asset/global/plugins/emis2.js';?>" type="text/javascript"></script>
           
        </div>
    </div>
</div>
         <?php $this->load->view('footer.php'); ?>

</div>
</body>
<script type="text/javascript">
    $(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
    if(!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
    }
})
</script>

<script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
              <script type="text/javascript">
            $(document).ready(function(){
            $("#myModal").modal('hide');
        });
             

  </script>
        <script type="text/javascript">
            var flash_data = <?php echo json_encode($old_flash_message)?>;
  // console.log(flash_data);
  function show_data(data)
  {

    // console.log(data);
      var flash_details = flash_data.filter(flash=>flash.id == data)[0];
      // console.log(flash_details); 
      $(".modal-title").text(flash_details.title);
      $('.content').text(flash_details.content);
      // $('#create').text(flash_details.user_type +' - '+flash_details.created_date);
      $("#myModal").modal('show');
  }
        </script>
</html>