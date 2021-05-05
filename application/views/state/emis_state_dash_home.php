<?php 

    
     ?>           

<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    <style>
    .clickable{
    cursor: pointer;   
}

.fa-check-circle
    {
        color:green;
    }
    .fa-times-circle-o
    {
        color:red;
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
  
  line-height: 1.33;
  border-radius: 25px;
  font-size:15px  !important;
}
.header-size
{
    font-size:11px !important ; 
    text-align: center;
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
.center
{
  text-align:center;
}
.timetablecard{
  width: 140px;
  height: 50px;
  border-radius: 5px;
  padding:2px !important;
  text-align:center;
  color:#fff;
}
.attendancecard{
  width: 230px;
  height: 50px;
  border-radius: 5px;
  padding:2px !important;
  text-align:center;
  color:#fff;
}

/* Slider */

.slick-slide {
    margin: 0px 20px;
}

.slick-slide img {
    width: 100%;
}

.slick-slider
{
    position: relative;
    display: block;
    box-sizing: border-box;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
            user-select: none;
    -webkit-touch-callout: none;
    -khtml-user-select: none;
    -ms-touch-action: pan-y;
        touch-action: pan-y;
    -webkit-tap-highlight-color: transparent;
}

.slick-list
{
    position: relative;
    display: block;
    overflow: hidden;
    margin: 0;
    padding: 0;
}
.slick-list:focus
{
    outline: none;
}
.slick-list.dragging
{
    cursor: pointer;
    cursor: hand;
}

.slick-slider .slick-track,
.slick-slider .slick-list
{
    -webkit-transform: translate3d(0, 0, 0);
       -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
         -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
}

.slick-track
{
    position: relative;
    top: 0;
    left: 0;
    display: block;
}
.slick-track:before,
.slick-track:after
{
    display: table;
    content: '';
}
.slick-track:after
{
    clear: both;
}
.slick-loading .slick-track
{
    visibility: hidden;
}

.slick-slide
{
    display: none;
    float: left;
    height: 100%;
    min-height: 1px;
}
[dir='rtl'] .slick-slide
{
    float: right;
}
.slick-slide img
{
    display: block;
}
.slick-slide.slick-loading img
{
    display: none;
}
.slick-slide.dragging img
{
    pointer-events: none;
}
.slick-initialized .slick-slide
{
    display: block;
}
.slick-loading .slick-slide
{
    visibility: hidden;
}
.slick-vertical .slick-slide
{
    display: block;
    height: auto;
    border: 1px solid transparent;
}
.slick-arrow.slick-hidden {
    display: none;
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
            

  <?php $this->load->view($header.'/header.php');?>
<div class="page-content">
                                <div></div> 
                                <br/>
                                <div class="container">
                                    <div class="row">
        
                                    <!-- BEGIN PAGE CONTENT INNER -->
                          
                    <div class="row margin-bottom-20">
                                    <div class=" row page-content-inner">
<div class="col-lg-12">
        
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-user"></i>   Students Details</h3>
                    <span class="pull-right "> <i class="glyphicon glyphicon-chevron-up"></i> View Details</span>
                </div>
                <div class="panel-body ">
                    
                                                <div class="row">
                                                  <div class="col-md-3">
                    <div class="col-md-6" style="text-align:-webkit-right;">
                    <a href="<?php echo base_url().'State/get_attendance_details'; ?>" style="text-decoration: none;">
                    <div class="dashboard-stat2 attendancecard" style="background-color:beige;box-shadow:0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgb(172, 213, 250);">
                          <h3 style="margin-top: 15px;font-size: 16px;color:#000">Attendance</h3>
                        </div>
                      </a>
                    </div>
                  </div>
                               <div class="col-md-3">
                    <div class="col-md-6" style="text-align:-webkit-right;">
                    <a href="<?php echo base_url().'Home/get_attendance_classwise_details'; ?>" style="text-decoration: none;">
                    <div class="dashboard-stat2 attendancecard" style="background-color:#64b5f68c;box-shadow:0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgb(172, 213, 250);">
                          <h3 style="margin-top: 15px;font-size: 16px;color:#000">Academic</h3>
                        </div>
                      </a>
                    </div>
                  </div>           <div class="col-md-3">
                    <div class="col-md-6" style="text-align:-webkit-right;">
                    <a href="<?php echo base_url().'Home/get_attendance_classwise_details'; ?>" style="text-decoration: none;">
                    <div class="dashboard-stat2 attendancecard" style="background-color:beige;box-shadow:0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgb(172, 213, 250);">
                          <h3 style="margin-top: 15px;font-size: 16px;color:#000">Health</h3>
                        </div>
                      </a>
                    </div>
                  </div>           <div class="col-md-3">
                    <div class="col-md-6" style="text-align:-webkit-right;">
                    <a href="<?php echo base_url().'Home/get_attendance_classwise_details'; ?>" style="text-decoration: none;">
                    <div class="dashboard-stat2 attendancecard" style="background-color:#64b5f68c;box-shadow:0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgb(172, 213, 250);">
                          <h3 style="margin-top: 15px;font-size: 16px;color:#000">Home Work</h3>
                        </div>
                      </a>
                    </div>
                  </div>

                                            </div>

                                                
                
        </div>
        
    </div>

    <!--- 2nd Card--->

    <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-users"></i>   Teacher Details</h3>
                    <span class="pull-right "> <i class="glyphicon glyphicon-chevron-up"></i> View Details</span>
                </div>
                <div class="panel-body ">
                    
                                                <div class="row">
                                                  <div class="col-md-3">
                    <div class="col-md-6" style="text-align:-webkit-right;">
                    <a href="<?php echo base_url().'State/get_attendance_details'; ?>" style="text-decoration: none;">
                    <div class="dashboard-stat2 attendancecard" style="background-color:beige;box-shadow:0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgb(172, 213, 250);">
                          <h3 style="margin-top: 15px;font-size: 16px;color:#000">Attendance</h3>
                        </div>
                      </a>
                    </div>
                  </div>
                               <div class="col-md-3">
                    <div class="col-md-6" style="text-align:-webkit-right;">
                    <a href="<?php echo base_url().'Home/get_attendance_classwise_details'; ?>" style="text-decoration: none;">
                    <div class="dashboard-stat2 attendancecard" style="background-color:#64b5f68c;box-shadow:0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgb(172, 213, 250);">
                          <h3 style="margin-top: 15px;font-size: 16px;color:#000">Seniority List</h3>
                        </div>
                      </a>
                    </div>
                  </div>           <div class="col-md-3">
                    <div class="col-md-6" style="text-align:-webkit-right;">
                    <a href="<?php echo base_url().'Home/get_attendance_classwise_details'; ?>" style="text-decoration: none;">
                    <div class="dashboard-stat2 attendancecard" style="background-color:beige;box-shadow:0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgb(172, 213, 250);">
                          <h3 style="margin-top: 15px;font-size: 16px;color:#000">Utilization</h3>
                        </div>
                      </a>
                    </div>
                  </div>           <div class="col-md-3">
                    <div class="col-md-6" style="text-align:-webkit-right;">
                    <a href="<?php echo base_url().'Home/get_attendance_classwise_details'; ?>" style="text-decoration: none;">
                    <div class="dashboard-stat2 attendancecard" style="background-color:#64b5f68c;box-shadow:0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgb(172, 213, 250);">
                          <h3 style="margin-top: 15px;font-size: 16px;color:#000">Vacancy</h3>
                        </div>
                      </a>
                    </div>
                  </div>
                  
                                            </div>

                                                
                
        </div>
        
    </div>

    <!-- 3rd Card--->

    <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-building"></i>   School Infrastucture</h3>
                    <span class="pull-right "> <i class="glyphicon glyphicon-chevron-up"></i> View Details</span>
                </div>
                <div class="panel-body ">
                    
                                                <div class="row">
                                                  <div class="col-md-3">
                    <div class="col-md-6" style="text-align:-webkit-right;">
                    <a href="<?php echo base_url().'State/school_sanitation_verification_district_wise_1'; ?>" style="text-decoration: none;">
                    <div class="dashboard-stat2 attendancecard" style="background-color:beige;box-shadow:0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgb(172, 213, 250);">
                          <h3 style="margin-top: 15px;font-size: 16px;color:#000">Toilets</h3>
                        </div>
                      </a>
                    </div>
                  </div>
                               <div class="col-md-3">
                    <div class="col-md-6" style="text-align:-webkit-right;">
                    <a href="<?php echo base_url().'Home/get_attendance_classwise_details'; ?>" style="text-decoration: none;">
                    <div class="dashboard-stat2 attendancecard" style="background-color:#64b5f68c;box-shadow:0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgb(172, 213, 250);">
                          <h3 style="margin-top: 15px;font-size: 16px;color:#000">Compound Wall</h3>
                        </div>
                      </a>
                    </div>
                  </div>           <div class="col-md-3">
                    <div class="col-md-6" style="text-align:-webkit-right;">
                    <a href="<?php echo base_url().'Home/get_attendance_classwise_details'; ?>" style="text-decoration: none;">
                    <div class="dashboard-stat2 attendancecard" style="background-color:beige;box-shadow:0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgb(172, 213, 250);">
                          <h3 style="margin-top: 15px;font-size: 16px;color:#000">Drinking Water</h3>
                        </div>
                      </a>
                    </div>
                  </div>           <div class="col-md-3">
                    <div class="col-md-6" style="text-align:-webkit-right;">
                    <a href="<?php echo base_url().'Home/get_attendance_classwise_details'; ?>" style="text-decoration: none;">
                    <div class="dashboard-stat2 attendancecard" style="background-color:#64b5f68c;box-shadow:0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgb(172, 213, 250);">
                          <h3 style="margin-top: 15px;font-size: 16px;color:#000">Equipment</h3>
                        </div>
                      </a>
                    </div>
                  </div>
                  
                                            </div>

                                                
                
        </div>
        
    </div>

    <!-- 4th Card--->

    <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-bar-chart"></i>   School Need</h3>
                    <span class="pull-right "> <i class="glyphicon glyphicon-chevron-up"></i> View Details</span>
                </div>
                <div class="panel-body ">
                    
                                                <div class="row">
                                                  <div class="col-md-3">
                    <div class="col-md-6" style="text-align:-webkit-right;">
                    <a href="<?php echo base_url().'Home/get_attendance_classwise_details'; ?>" style="text-decoration: none;">
                    <div class="dashboard-stat2 attendancecard" style="background-color:beige;box-shadow:0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgb(172, 213, 250);">
                          <h3 style="margin-top: 15px;font-size: 16px;color:#000">Toilets</h3>
                        </div>
                      </a>
                    </div>
                  </div>
                               <div class="col-md-3">
                    <div class="col-md-6" style="text-align:-webkit-right;">
                    <a href="<?php echo base_url().'Home/get_attendance_classwise_details'; ?>" style="text-decoration: none;">
                    <div class="dashboard-stat2 attendancecard" style="background-color:#64b5f68c;box-shadow:0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgb(172, 213, 250);">
                          <h3 style="margin-top: 15px;font-size: 16px;color:#000">Compound Wall</h3>
                        </div>
                      </a>
                    </div>
                  </div>           <div class="col-md-3">
                    <div class="col-md-6" style="text-align:-webkit-right;">
                    <a href="<?php echo base_url().'Home/get_attendance_classwise_details'; ?>" style="text-decoration: none;">
                    <div class="dashboard-stat2 attendancecard" style="background-color:beige;box-shadow:0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgb(172, 213, 250);">
                          <h3 style="margin-top: 15px;font-size: 16px;color:#000">Drinking Water</h3>
                        </div>
                      </a>
                    </div>
                  </div>           <div class="col-md-3">
                    <div class="col-md-6" style="text-align:-webkit-right;">
                    <a href="<?php echo base_url().'Home/get_attendance_classwise_details'; ?>" style="text-decoration: none;">
                    <div class="dashboard-stat2 attendancecard" style="background-color:#64b5f68c;box-shadow:0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgb(172, 213, 250);">
                          <h3 style="margin-top: 15px;font-size: 16px;color:#000">Equipment</h3>
                        </div>
                      </a>
                    </div>
                  </div>
                  
                                            </div>

                                                
                
        </div>
        
    </div>


                                       
                                      


                                        </div>
                                       

                                </div>

                                <div class="row margin-bottom-20">
                                    <div class=" row page-content-inner">
<div class="col-lg-9">
        
            
    
    </div>
    <div class="col-lg-3 col-md-4">
        
                </div>
    <div class="col-lg-3 col-md-4">
        
                </div>
                
                                       
                                           

                                        </div>
                                       

                                </div>

                    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="title"></h4>
        </div>
        <div class="modal-body">
          <p id="content"></p>
        </div>
        <div class="modal-footer">
          <p id="create"></p>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


  <!--- Staff Attendance Details--->
  <div class="modal fade" id="staff_absent" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="title"></h4>
        </div>
        <div class="modal-body">
          <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center">S.No</th>
                                                                    
                                                                    <th class="">Staff Name</th>
                                                                    <th class="center"><?=$date;?></th>
                                                                    

                                                                </tr>
                                                                </thead>
                                                               <tbody>
                                                            <?php sort($teacher_absent);if(!empty($teacher_absent)){ 

                                                                
                                                                
                                                                 foreach($teacher_absent as $index=> $det){   

                                                                    $class_variable = '';
                                                                        $name = '';
                                                                        switch($det->present){

                                                                            case -1:
                                                                            $class_variable = 'fa fa-minus';
                                                                            $name = 'NA';
                                                                            $sty='0%';

                                                                            break;
                                                                            case 1:
                                                                            $class_variable = 'fa fa-check-circle';
                                                                            $name = 'P';
                                                                            $sty='0%';

                                                                            break;
                                                                            case 0:
                                                                            $class_variable='fa fa-times-circle-o';
                                                                            $name = ' A / '.$det->attres;
                                                                            $sty='13%';
                                                                            break;
                                                                        }
                                                                    
                                                                    ?>

                                                                <tr>
                                                                    <td class="center"><?=$index+1;?></td>
                                                                    <td>
                                                                    <?=$det->teacher_name;?></a>

                                                                </td>
                                                                   <td class="center"><i class="<?=$class_variable;?>" style="font-size:20px;margin-left:<?=$sty?>" aria-hidden="true"></i> <span><?=$det->present==0?'/&nbsp;&nbsp;&nbsp;'.$det->attres:''?></span><span style="display:none;text-align:center;"><?=$name;?></span></td>
                                                                    
                                                                   

                                                                </tr>
                                                                <?php  }  ?>
                                                                
                                                      
                                                            </tbody>
                                                            
                                                        <?php }?>
                                                        </table>
        </div>
        <div class="modal-footer">
          <p id="create"></p>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 
  
</div>

<!---- school profile zoom --->
<div id="imageModal" class="modal" style="text-align: center;">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01" width="66%">
  <div id="caption"></div>
</div>
                    
            <?php $this->load->view('scripts.php'); ?>

<!------ dashboard image slider start ---------->
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script src="<?php echo base_url().'asset/global/plugins/slick/slick.js';?>" type="text/javascript"></script>
<!------ dashboard image slider End ---------->
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> -->
            <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
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
function image_zoom(image)
          {
            // console.log(image); 
            $("#img01").attr('src',image);
            $("#imageModal").modal('show');
          }
$(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: true,
        dots: false,
        pauseOnHover: true,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});
  $(document).ready(function()
  {
    $("#myModal").modal('hide');
    $(".close-body").css('display','none');
        $('.panel-heading').find('span').find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');

  })
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

<script type="text/javascript">
$(document).ready(function(){
$('#teacherid').select2({closeOnSelect:false});	

			
 });
     function get_section()
    {
  // alert(section_id);
  var classid=$("#classid").val();
      if(classid !=0){
    $.ajax(
    {
        type: "POST",
        url:baseurl+'TimetableController/get_school_section_details',
        data:{'class_id':classid},
        success: function(resp){
        // alert(resp);  
       
        var section = JSON.parse(resp);
        console.log(section);
        var section_drop = '<select name="section_id" class="form-control" id="section_id">';
		
        section_drop += '<option value=0>Select Section</option>';
        $.each(section,function(id,val)
        {
            section_drop +='<option value='+ val.section +'>'+val.section+'</option>';
			class_id=val.id;
			 $('#classauto').val(class_id);
        })
            section_drop +='</select>';
            
            $("#section").empty('');            
            $("#section").html(section_drop);
         },
          
    })
    }
    }
  var flash_data = <?php echo json_encode($flash_data)?>;
  // console.log(flash_data);
  function show_data(data)
  {

    console.log(data);
      var flash_details = flash_data.filter(flash=>flash.id == data)[0];
      // console.log(falsh); 
      $('#title').text(flash_details.title);
      $('#content').text(flash_details.content);
      // $('#create').text(flash_details.user_type +' - '+flash_details.created_date);
      $("#myModal").modal('show');
  }
</script>
</html>