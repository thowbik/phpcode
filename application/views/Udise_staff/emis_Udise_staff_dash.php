<?php 
$teacher_lists ='';
      if(!empty($teacher_list)){
        
    $teacher_lists = $teacher_list[0];
    }

    function get_date_format($date)
    {
        if(!empty($date)){
       return date('d-m-Y',strtotime($date));
      }
    }
 ?>           

<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    <style>
    .clickable{
    cursor: pointer;   
}
body.modal-open {
    overflow-y: hidden !important;
    position: fixed;
}
.panel-heading span {
    margin-top: -20px;
    font-size: 15px;
}
.tablecolor
{
    background-color: #32c5d2; 
}
.cke_dialog {
    visibility: visible;
    z-index: 1000000000000000000000!important;
}
.sweet-alert {
    background-color: #ffffff;
    width: 478px;
    padding: 17px;
    border-radius: 5px;
    text-align: center;
    position: fixed;
    left: 50%;
    top: 50%;
    margin-left: -256px;
    margin-top: -200px;
    overflow: hidden;
    display: none;
    z-index: 10000000000 !important;
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
  margin-left :25px !important;
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
.box-content {
  display: inline-block;
  width: 200px;
    padding: 10px;
}
/*******************************************/
.emp-profile{
    /*padding: 3%;*/
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
    box-shadow:0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgb(2, 2, 2) !important;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    margin-bottom: 15px; 
        
    /*margin-top: -62px;
    width: 50%;
    height: 136px;
    border-radius: 50%;*/
    margin-top: -84px;
    width: 63%;
    height: 168px;
    border-radius: 5px;
    box-shadow:0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgba(70, 69, 67, 0.49);
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
/********Profile Starts*******/
.portlet.light{
  box-shadow: 0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgb(2, 2, 2) !important;
  border-radius: 10px;
      padding: 12px 0px 15px !important;
    background-color: #fff;
}
.list-group-item{
  border:none !important;
}
 .nav-tabs {
    display: inline-flex !important;
    width: 100% !important;
    overflow-x: auto !important;
    } 

 .nav-tabs {
        /* display: inline-flex; */
        /* width: 100%; */
        /* overflow-x: auto; */
        border-bottom: 2px solid #DDD;
        -ms-overflow-style: none; /*// IE 10+*/
        overflow: -moz-scrollbars-none;/*// Firefox*/}
        .nav-tabs>li.active>a,
        .nav-tabs>li.active>a:focus,
        .nav-tabs>li.active>a:hover {
            border-width: 0;
        }
        .nav-tabs>li>a {
            border: none;
            color: #666;
        }
        .nav-tabs>li.active>a,
        .nav-tabs>li>a:hover {
            border: none;
            color: #4fbaa5 !important;
            background: transparent;
        }
        .nav-tabs>li>a::after {
            content: "";
            background: #4fbaa5;
            height: 2px;
            position: absolute;
            width: 100%;
            left: 0px;
            bottom: 1px;
            transition: all 250ms ease 0s;
            transform: scale(0);
        }
        .nav-tabs>li.active>a::after,
        .nav-tabs>li:hover>a::after {
            transform: scale(1);
        }
        .tab-nav>li>a::after {
            background: #21527d none repeat scroll 0% 0%;
            color: #fff;
        }
        /*.tab-pane {
            padding: 15px 0;
        }*/
        /*.tab-content {
            padding: 20px
        }*/

        .nav-tabs::-webkit-scrollbar {
            display: none; /*Safari and Chrome*/
        }
        .card {
            background: #FFF none repeat scroll 0% 0%;
            box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3);
            margin-bottom: 30px;
        }
        /***************Tab_Icons_CSS**************/
        .tabbable-line>.nav-tabs>li:hover>a>i{
          color:#4fbaa5 !important;
        }
        .tabbable-line>.nav-tabs>li.active>a>i{
          color:#4fbaa5 !important;
        }
        .tabbable-line>.nav-tabs>li>a>i {
          font-size: 40px;
        }
        .portlet.light>.portlet-title>.nav-tabs>li {
          margin-left: 16px !important;
          margin-top:3px !important;
        }
        .portlet.light>.portlet-title>.nav-tabs>li {
          margin-left: 16px !important;
          margin-top:3px !important;
        }
        /***************Profile Ends*******************/
/*.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}*/
.imple-con{
  height:20px !important;
}
.checkbx{
  height:20px !important;
}
.teachr_eval_sub_title{
  margin-top:10px;
}
.teachr_eval_quest{
  margin-top:35px;
}
.self_eva_quest{
  text-align:left;
}
.spcl_talnts{
  margin-top:15px;
}
/**CRTE Starts**/
.text-align{
             text-align:center !important;
         }
         .teach-popup{
            width: 778px !important; left: 18% !important; top: 28% !important; margin-left: 0px !important; 
         }
         #teach_popup_scroll{
            width: 400px;
            height: 600px;
            overflow-y: scroll;
         }
         .sweet-alert .form-group{
             display:inherit !important;
         }
         .alert-close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            position: fixed; 
            background-color: #abe7ed;
            }

        .alert-close:hover,
        .alert-close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
        }
         .pindics-view{
             padding: 0px !important;
         } 
         .align-close{
             text-align:right !important;
         } 
/**CRTE Ends**/

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
            

 
<?php $this->load->view('Udise_staff/header.php'); ?>
<div class="page-content" style="background-color: #EEEEEE;padding: 15px;">
                                <div></div> 
                                <br/>
                                <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                      <div class="page-toolbar">
                                          <?php
                                              if($this->session->flashdata('pindics_update')) {
                                                  $message = $this->session->flashdata('pindics_update');
                                          ?>
                                                  <div class="alert alert-success" style="width: 300px;"><button class="close" data-close="alert"></button>
                                                  <?=$message;?></div>
                                          <!-- BEGIN THEME PANEL -->
                                          <!-- END THEME PANEL -->
                                        <?php } ?>
                                      </div>
                                    </div> 
                                    <div class="col-md-4">
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                      <div class="page-toolbar">
                                          <?php
                                              if($this->session->flashdata('pindics_alert')) {
                                                  $message = $this->session->flashdata('pindics_alert');
                                          ?>
                                                  <div class="alert alert-failure" style="width: 300px;"><button class="close" data-close="alert"></button>
                                                  <?=$message;?></div>
                                          <!-- BEGIN THEME PANEL -->
                                          <!-- END THEME PANEL -->
                                        <?php } ?>
                                      </div>
                                    </div> 
                                    <div class="col-md-4">
                                    </div> 
                                </div>
                                    <div class="row">
                                    <div class="container">
            
                <div class="row" style="margin-top:50px;">
                    <div class="col-md-3 emp-profile">
                        <div class="profile-img">
                            <img src="<?=$img_data;?>" name="aboutme" alt="No Image" onerror="this.onerror=null;this.src='http://gaslightgathering.org/wp-content/uploads/2019/03/1024px-No_image_available.svg.png'"/>
                            <!-- <?=$img_data;?>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div> -->
                        </div> 
                        <form action="https://tntp.tnschools.gov.in/lms/login/index.php" target="_self" method="post" name="form" id="form">
                            <input type="hidden" name="username" size="15" value="<?=$password->emis_username;?>"/> 
                            <input type="hidden" name="password" size="15" value="<?=$password->ref?>"/> 
                            <button type="submit" class="btn btn-outline-primary btn btn-success btn-md btn-block" formtarget="_blank"><i class="fa fa-sign-in fa-stack-1x"></i> TNTP Login </button>
                            </form>
                            <div style="text-align: center;">
                                <h5>Personal Information</h5>
                                <hr style="border-top: 1px solid #4fbaa5;margin:0px 60px;">
                            </div>
                        <ul class="list-group list-group-unbordered">
                          <li class="list-group-item">
                            <b><i class="fa fa-user" aria-hidden="true" style="color: #4fbaa5;"></i></b>:<span>&nbsp;<?=$teacher_lists->teacher_name;?></span>
                          </li>
                          <li class="list-group-item">
                            <!-- <b><i class="fa fa-credit-card" aria-hidden="true" style="color: #4fbaa5;"></i></b>:<span>&nbsp;<?=$teacher_lists->teacher_code;?></span> -->
                            <b><i class="fa fa-credit-card" aria-hidden="true" style="color: #4fbaa5;"></i></b>:<span>&nbsp;<?=$teacher_lists->teacher_id;?></span>
                          </li>
                          <li class="list-group-item">
                            <b><i class="fa fa-calendar" aria-hidden="true" style="color: #4fbaa5;"></i></b>:<span>&nbsp;<?=$teacher_lists->staff_dob;?></span>
                          </li>
                          <li class="list-group-item">
                            <span><?=($teacher_lists->gender==1?'<b><i class="fa fa-male" aria-hidden="true" style="color: #4fbaa5;"></i></b>:&nbsp;Male':'<b><i class="fa fa-female" aria-hidden="true" style="color: #4fbaa5;"></i></b>:&nbsp;Female');?></span>
                          </li>
                          <li class="list-group-item">
                            <b><i class="fa fa-tint" aria-hidden="true" style="color: #4fbaa5;"></i></b>:<span>&nbsp;<?=$teacher_lists->group;?></span>
                          </li>
                          <li class="list-group-item">
                            <b><i class="fa fa-graduation-cap" aria-hidden="true" style="color: #4fbaa5;"></i></b>:<span>&nbsp;<?=$teacher_lists->desgination;?></span>
                          </li>
                          <li class="list-group-item">
                            <b><i class="fa fa-university" aria-hidden="true" style="color: #4fbaa5;"></i></b>:<span>&nbsp;<?=$teacher_lists->school_name;?></span>
                          </li>
                        </ul>                       
                    </div>

                    <!-- /.col -->
  <div class="col-md-offset-1 col-md-8" style="padding: 0px;margin-top: 3%;">
    <div class="portlet light ">
      <div class="portlet-title tabbable-line">
         <!--  <div class="caption caption-md">
              <i class="icon-globe theme-font hide"></i>
              <span class="caption-subject bold uppercase" style="color:#4fbaa5;">Profile Details</span>
          </div> -->
           <ul class="nav nav-tabs" role="tablist">
                  <li style="border-bottom: none;" role="presentation" class="active"><a  style="inline-size: max-content;"  href="#joiningdetails" aria-controls="joiningdetails" role="tab" data-toggle="tab"><i data-toggle="tooltip" title="Joining Details" class="fa fa-info-circle"></i></a></li>
                  <li style="border-bottom: none;" role="presentation"><a style="inline-size: max-content;"  href="#communicationdetails" aria-controls="communicationdetails" role="tab" data-toggle="tab"><i data-toggle="tooltip" title="Communication Details" class="fa fa-phone-square"></i></a></li>
                  <li style="border-bottom: none;" role="presentation"><a style="inline-size: max-content;"  href="#academicqualic" aria-controls="academicqualic" role="tab" data-toggle="tab"><i data-toggle="tooltip" title="Academic Qualification" class="fa fa-graduation-cap"></i></a></li>
                  <li style="border-bottom: none;" role="presentation"><a style="inline-size: max-content;"  href="#mainsubtaught" aria-controls="mainsubtaught" role="tab" data-toggle="tab"><i data-toggle="tooltip" title="Main Subjects Taught" class="fa fa-book"></i></a></li>
                  <?php if($this->session->userdata('emis_usertype1')>90000){?>
                    <li style="border-bottom: none;" role="presentation"><a style="inline-size: max-content;"  href="#obs_data" aria-controls="timetable" role="tab" data-toggle="tab"><i data-toggle="tooltip" title="Obaservation Data" class="fa fa-table"></i></a></li>
                    <li style="border-bottom: none;" role="presentation"><a style="inline-size: max-content;"  href="#CRTEEva" aria-controls="mainsubtaught" role="tab" data-toggle="tab"><i data-toggle="tooltip" title="REMARKS OF CLUSTER RESOURCE TEACHER EDUCATOR" class="fa fa-eye"></i></a></li>
                   <?php }else{?>
                   <li style="border-bottom: none;" role="presentation"><a style="inline-size: max-content;"  href="#timetable" aria-controls="timetable" role="tab" data-toggle="tab"><i data-toggle="tooltip" title="Time Table" class="fa fa-table"></i></a></li>
                   <li style="border-bottom: none;" role="presentation" ><a style="inline-size: max-content;"  href="#homework" aria-controls="homework" role="tab" data-toggle="tab"><i data-toggle="tooltip" title="Home Work" class="fa fa-sticky-note-o"></i></a></li> 
                   <li style="border-bottom: none;" role="presentation"><a style="inline-size: max-content;"  href="#pindics" onclick="teach_pindics_init( <?php echo $this->session->userdata('emis_teacher_id'); ?>)" aria-controls="performanceindicators" role="tab" data-toggle="tab"><i data-toggle="tooltip" title="Performance Indicators" class="fa fa-bar-chart"></i></a></li>
                 <?php }?>
                     
              </ul>
      </div>
      <div class="portlet-body" style="padding: 0px;">
           <!-- Nav tabs -->                    
              <!-- Tab panes -->
               <?php if(!empty($teacher_lists)){
                    // print_r($teacher_lists);
                    ?>
              <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="joiningdetails">
                     <div style="text-align: center;">
                        <h5 style="color:#4fbaa5;">Joining Details</h5>
                    </div>
                     <ul class="list-group list-group-unbordered">
                          <li class="list-group-item">
                            <b>Appointed for the Subject :</b><span>
                            <span>&nbsp;<?=$teacher_lists->appsub;?></span>
                          </li>
                          <li class="list-group-item">
                            <b>Date of Joining in Service :</b><span>
                            <span>&nbsp;<?=get_date_format($teacher_lists->staff_join);?></span>
                          </li>
                          <li class="list-group-item">
                            <b>Date of Joining in Present Post :</b><span>
                            <span>&nbsp;<?php get_date_format($teacher_lists->staff_pjoin);?></span>
                          </li>
                          <li class="list-group-item">
                            <b>Present School :</b><span>
                            <span>&nbsp;<?=get_date_format($teacher_lists->staff_psjoin);?></span>
                          </li>
                          <li class="list-group-item">
                            <b>Nature of appointment :</b><span>
                            <span>&nbsp;<?php
                              switch($teacher_lists->appointment_nature)
                              {
                                case 1 :
                                echo "Regular";
                                break;
                                case 2 :
                                echo "Contract";

                                break;
                                case 3 :
                                echo "Part-Time";

                                break;
                              }
                              ?>
                              </span>
                          </li>
                          <li class="list-group-item">
                            <b>GPF/CPS/EPF Details :</b><span>
                            <span>&nbsp;<?=$teacher_lists->cps_gps_details;?></span>
                          </li>
                          <li class="list-group-item">
                            <b>GPF/CPS/EPF Number :</b><span>
                            <span>&nbsp;<?=$teacher_lists->cps_gps;?></span>
                          </li>
                          <li class="list-group-item">
                            <b>Suffix :</b><span>
                            <span>&nbsp;<?=$teacher_lists->suffix;?></span>
                          </li>
                          <li class="list-group-item">
                            <b>Mode of Recruitment :</b><span>
                            <span>&nbsp;<?=$teacher_lists->recruit_type;?></span>
                          </li>
                          <li class="list-group-item">
                            <b>Recruitment Rank :</b><span>
                            <span>&nbsp;<?=$teacher_lists->recruit_rank;?></span>
                          </li>
                           <li class="list-group-item">
                            <b>Year Selection :</b><span>
                            <span>&nbsp;<?=get_date_format($teacher_lists->recruit_year);?></span>
                          </li>
                        </ul>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="communicationdetails">
                        <div style="text-align: center;">
                        <h5 style="color:#4fbaa5;">Communication Details</h5>
                         </div>
                     <ul class="list-group list-group-unbordered">
                          <li class="list-group-item">
                            <b>Mobile Number :</b>
                            <span>&nbsp;<?=$teacher_lists->mbl_nmbr;?></span>
                          </li>
                          <li class="list-group-item">
                            <b>E-Mail ID :</b>
                            <span>&nbsp;<?=$teacher_lists->email_id;?></span>
                          </li>
                          <li class="list-group-item">
                            <b>Door no. / Building Name :</b><span>
                            <span>&nbsp;<?=$teacher_lists->e_prsnt_doorno;?></span>
                          </li>
                          <li class="list-group-item">
                            <b>Street Name / Area name :</b><span>
                            <span>&nbsp;<?=$teacher_lists->e_prsnt_street;?></span>
                          </li>
                          <li class="list-group-item">
                            <b>City name / Village name :</b><span>
                            <span>&nbsp;<?=$teacher_lists->e_prsnt_place;?></span>
                          </li>
                          <li class="list-group-item">
                            <b>District :</b><span>
                            <span>&nbsp;<?=$teacher_lists->e_prsnt_distrct;?></span>
                          </li>
                          <li class="list-group-item">
                            <b>Pincode :</b><span>
                            <span>&nbsp;<?=$teacher_lists->e_prsnt_pincode;?></span>
                          </li>
                        </ul>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="academicqualic">
                       <div style="text-align: center;">
                        <h5 style="color:#4fbaa5;">Academic Qualification</h5>
                         </div>
                     <ul class="list-group list-group-unbordered">
                          <li class="list-group-item">
                            <b>Academic :</b>
                            <span>&nbsp;<?=$teacher_lists->academic_teacher;?></span>
                          </li>
                          <li class="list-group-item">
                            <b>Professional :</b>
                            <span>&nbsp;<?=$teacher_lists->professional;?></span>
                          </li>
                          <li class="list-group-item">
                            <b>UG :</b><span>
                            <span>&nbsp;<?=$teacher_lists->ug_degree;?></span>
                          </li>
                          <li class="list-group-item">
                            <b>PG :</b><span>
                            <span>&nbsp;<?=$teacher_lists->pg_degree;?></span>
                          </li>                          
                        </ul>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="mainsubtaught">
                    <div style="text-align: center;">
                        <h5 style="color:#4fbaa5;">Main Subjects Taught</h5>
                         </div>
                     <ul class="list-group list-group-unbordered">
                          <li class="list-group-item">
                            <b>Subject 1 :</b>
                            <span>&nbsp;<?=$teacher_lists->ts1;?></span>
                          </li>
                          <li class="list-group-item">
                            <b>Subject 2 :</b>
                            <span>&nbsp;<?=$teacher_lists->ts2;?></span>
                          </li>
                          <li class="list-group-item">
                            <b>Subject 3 :</b><span>
                            <span>&nbsp;<?=$teacher_lists->ts3;?></span>
                          </li>                         
                        </ul>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="CRTEEva">
                     <div style="text-align: center;">
                        <h5 style="color:#4fbaa5;">REMARKS OF CLUSTER RESOURCE TEACHER EDUCATOR</h5>
                        <h5 style=""></h5>
                      </div>
                     <ul class="list-group list-group-unbordered">
                        <div class="">                                                
                          <div class="portlet-body form" id="dialogform">
                              <!--<div class="portlet-title">
                                  <div class="caption">
                                      <i class=""></i>
                                      <span class="caption-subject bold text-align"><h3>REMARKS OF CLUSTER RESOURCE TEACHER EDUCATOR</h3></span>
                                  </div>
                              </div>-->
                          <form name="brte_eval_form" id="brte_eval_form">
                          <input type="hidden" name="brte_id" id="brte_id" value="<?php print_r($this->session->userdata('emis_user_id')); ?>">
                              <div class="form-body">                                                         
                                  <div class="row"> 
                                  <!--<div class="row">
                                      <div class="col-md-2">
                                      </div>
                                      <div class="col-md-8">
                                      <font style="font-style:bold"><div id="">After observing classroom activities, students exercise and teacher self evaluation format, Headmaster has to provide remarks in the below gives 8 points in four parameters.</div></font> 
                                      </div>
                                      <div class="col-md-2">
                                      </div>
                                  </div>--> 
                                  <br>
                                  <div class="row">
                                      <div class="col-md-3">
                                      </div>
                                      <div class="col-md-6">
                                      <!--<font style="color:#dd4b39;"><div id="">Only teachers who have self evaluated will be listed here</div></font>--> 
                                      </div>
                                      <div class="col-md-3">
                                      </div>
                                  </div>   
                                  <br>
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <div class="col-md-3">
                                              </div>
                                              <div class="col-md-3">
                                                  <label class="control-label">Block List*<?php // echo $this->session->userdata('emis_school_id'); ?></label>
                                              </div>    
                                              <div class="col-md-3">
                                                  <!--<input type="hidden" name="school_key_id" id="school_key_id" value="<?php //echo $this->session->userdata('emis_school_id');?>">
                                                  <input type="hidden" name="hm_id" id="hm_id" value="<?php// echo $hm_id;?>"> -->                                                                                 
                                                  <select class="form-control" data-placeholder="Choose a block" id="block_id" onchange="schoollist(this)" name="block_id" required>                              <!---->
                                                      <option value="" >Select Block</option>                                                                                
                                                      <?php foreach($brte_block_list as $info) { ?>
                                                      <option value="<?php echo $info->block_id;  ?>"><?php echo $info->block_name; ?></option>
                                                      <?php   }  ?>
                                                  </select>
                                                  <font style="color:#dd4b39;"><div id="BRTE_EV_block_alert"></div></font>                                                                                
                                              </div>	
                                              <!--<div class="col-md-3">
                                                  <div class="form-actions text-align pindics-view" id="teach_pindics_view" style="display:none">
                                                      <button type="button" class="btn btn-primary" value="modal" id="view" onclick="teacherinfoview();">View Self Evaluation</button>
                                                  </div>
                                              </div>-->															
                                          </div>
                                      </div>	
                                  </div>
                                  <br>                                                  
                                   
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <div class="col-md-3">
                                              </div>
                                              <div class="col-md-3">
                                                  <label class="control-label">School List*<?php // echo $this->session->userdata('emis_school_id'); ?></label>
                                              </div>    
                                              <div class="col-md-3">
                                                  <!--<input type="hidden" name="school_key_id" id="school_key_id" value="<?php //echo $this->session->userdata('emis_school_id');?>">
                                                  <input type="hidden" name="hm_id" id="hm_id" value="<?php// echo $hm_id;?>"> -->                                                                                 
                                                  <!--<select class="form-control" data-placeholder="Choose a teacher" id="school_id" onchange="teacherlist(this)" name="school_id" required>                              
                                                      <option value="" >Select School</option>                                                                                
                                                      <?php //foreach($school_details as $info) { ?>
                                                      <option value="<?php //echo $info->school_id;  ?>"><?php //echo $info->school_name; ?></option>
                                                      <?php  // }  ?>
                                                  </select>-->
                                                  <select class="form-control" data-placeholder="Choose a School" id="school_id" onchange="teacherlist(this)" name="school_id" required>
                                                  <option >Select School</option>  
                                                  </select>
                                                  <font style="color:#dd4b39;"><div id="HM_EV_teacher_alert"></div></font>                                                                                
                                              </div>	
                                              <!--<div class="col-md-3">
                                                  <div class="form-actions text-align pindics-view" id="teach_pindics_view" style="display:none">
                                                      <button type="button" class="btn btn-primary" value="modal" id="view" onclick="teacherinfoview();">View Self Evaluation</button>
                                                  </div>
                                              </div>-->															
                                          </div>
                                      </div>	
                                  </div>
                                  <br>                                                  
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <div class="col-md-3">
                                              </div>
                                              <div class="col-md-3">
                                                  <label class="control-label">Teachers List* <?php // echo $this->session->userdata('emis_school_id'); ?></label>
                                              </div>    
                                              <div class="col-md-3">
                                                 <!-- <input type="hidden" name="school_key_id" id="school_key_id" value="<?php //echo $this->session->userdata('emis_school_id');?>">
                                                  <input type="hidden" name="hm_id" id="hm_id" value="<?php //echo $hm_id;?>">  -->                                                                                
                                                  
                                                  <select class="form-control" data-placeholder="Choose a teacher" id="teacher_id" onchange="teacherinfo()" name="teacher_id" required>
                                                  <option >Select Teacher</option>  
                                                  </select>
                                                  <font style="color:#dd4b39;"><div id="HM_EV_teacher_alert"></div></font>                                                                                
                                                  <div class="form-actions text-align pindics-view" id="teach_pindics_empty" style="display:none">
                                                      <!--<button type="submit" class="btn green" id="emis_staff_reg_sub" onclick="return popup()">Submit</button>-->
                                                      <font style="color:#dd4b39;"><div id="">Self evaluation Pending</div></font>
                                                  </div> 
                                                  <div class="form-actions text-align pindics-view" id="hm_pindics_empty" style="display:none">
                                                      <!--<button type="submit" class="btn green" id="emis_staff_reg_sub" onclick="return popup()">Submit</button>-->
                                                      <font style="color:#dd4b39;"><div id="">HM evaluation Pending</div></font>
                                                  </div>       
                                              </div>	
                                              <div class="col-md-3">
                                                  <div class="form-actions text-align pindics-view" id="teach_pindics_view" style="display:none">
                                                      <!--<button type="submit" class="btn green" id="emis_staff_reg_sub" onclick="return popup()">Submit</button>-->
                                                      <button type="button" class="btn btn-primary" value="modal" id="view" onclick="teacherinfoview();">View Self Evaluation</button>
                                                  </div>                                                       
                                              </div>															
                                          </div>
                                      </div>	
                                  </div>
                                  <br><br><br><br>

                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <div class="col-md-2">
                                              </div>
                                              <div class="col-md-5">
                                                  <label class="control-label">1.Designing Learning Experiences for Children*</label>
                                              </div>    
                                              <div class="col-md-3">
                                              <select class="form-control" id="BRTE_EV_1" name="BRTE_EV_1" onfocus="//textvalidate(this.id,'emis_reg_staff_gender_alert');" onchange="//textvalidate(this.id,'emis_reg_staff_gender_alert');" required>
                                                  <option value="" selected="selected">Select Option</option>
                                                  <option value="1">Below Expectations</option>
                                                  <option value="2">Closest to expectations</option>
                                                  <option value="3">Meets expectations</option>
                                                  <option value="4">Exceeds expectations</option>
                                              </select>
                                              <font style="color:#dd4b39;"><div id="BRTE_EV_1_alert"></div></font>
                                              </div>	
                                              <div class="col-md-2">
                                              </div>															
                                          </div>
                                      </div>	
                                  </div>
                                  <br>

                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <div class="col-md-2">
                                              </div>
                                              <div class="col-md-5">
                                                  <label class="control-label">2.Knowledge and Understanding of Subject Matter*</label>
                                              </div>    
                                              <div class="col-md-3">
                                              <select class="form-control" id="BRTE_EV_2" name="BRTE_EV_2" onfocus="//textvalidate(this.id,'emis_reg_staff_gender_alert');" onchange="//textvalidate(this.id,'emis_reg_staff_gender_alert');" required>
                                                  <option value="" selected="selected">Select Option</option>
                                                  <option value="1">Below Expectations</option>
                                                  <option value="2">Closest to expectations</option>
                                                  <option value="3">Meets expectations</option>
                                                  <option value="4">Exceeds expectations</option>
                                              </select>
                                              <font style="color:#dd4b39;"><div id="BRTE_EV_2_alert"></div></font>
                                              </div>	
                                              <div class="col-md-2">
                                              </div>															
                                          </div>
                                      </div>	
                                  </div>
                                  <br>

                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <div class="col-md-2">
                                              </div>
                                              <div class="col-md-5">
                                                  <label class="control-label">3.Strategy for Facilitating learning*</label>
                                              </div>    
                                              <div class="col-md-3">
                                              <select class="form-control" id="BRTE_EV_3" name="BRTE_EV_3" onfocus="//textvalidate(this.id,'emis_reg_staff_gender_alert');" onchange="//textvalidate(this.id,'emis_reg_staff_gender_alert');" required>
                                                  <option value="" selected="selected">Select Option</option>
                                                  <option value="1">Below Expectations</option>
                                                  <option value="2">Closest to expectations</option>
                                                  <option value="3">Meets expectations</option>
                                                  <option value="4">Exceeds expectations</option>
                                              </select>
                                              <font style="color:#dd4b39;"><div id="BRTE_EV_3_alert"></div></font>
                                              </div>	
                                              <div class="col-md-2">
                                              </div>															
                                          </div>
                                      </div>	
                                  </div>
                                  <br>

                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <div class="col-md-2">
                                              </div>
                                              <div class="col-md-5">
                                                  <label class="control-label">4.Interpersonal Relationship*</label>
                                              </div>    
                                              <div class="col-md-3">
                                              <select class="form-control" id="BRTE_EV_4" name="BRTE_EV_4" onfocus="//textvalidate(this.id,'emis_reg_staff_gender_alert');" onchange="//textvalidate(this.id,'emis_reg_staff_gender_alert');" required>
                                                  <option value="" selected="selected">Select Option</option>
                                                  <option value="1">Below Expectations</option>
                                                  <option value="2">Closest to expectations</option>
                                                  <option value="3">Meets expectations</option>
                                                  <option value="4">Exceeds expectations</option>
                                              </select>
                                              <font style="color:#dd4b39;"><div id="BRTE_EV_4_alert"></div></font>
                                              </div>	
                                              <div class="col-md-2">
                                              </div>															
                                          </div>
                                      </div>	
                                  </div>
                                  <br>

                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <div class="col-md-2">
                                              </div>
                                              <div class="col-md-5">
                                                  <label class="control-label">5.Professional Development*</label>
                                              </div>    
                                              <div class="col-md-3">
                                              <select class="form-control" id="BRTE_EV_5" name="BRTE_EV_5" onfocus="//textvalidate(this.id,'emis_reg_staff_gender_alert');" onchange="//textvalidate(this.id,'emis_reg_staff_gender_alert');" required>
                                                  <option value="" selected="selected">Select Option</option>
                                                  <option value="1">Below Expectations</option>
                                                  <option value="2">Closest to expectations</option>
                                                  <option value="3">Meets expectations</option>
                                                  <option value="4">Exceeds expectations</option>
                                              </select>
                                              <font style="color:#dd4b39;"><div id="BRTE_EV_5_alert"></div></font>
                                              </div>	
                                              <div class="col-md-2">
                                              </div>															
                                          </div>
                                      </div>	
                                  </div>
                                  <br>

                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <div class="col-md-2">
                                              </div>
                                              <div class="col-md-5">
                                                  <label class="control-label">6.School Development*</label>
                                              </div>    
                                              <div class="col-md-3">
                                              <select class="form-control" id="BRTE_EV_6" name="BRTE_EV_6" onfocus="//textvalidate(this.id,'emis_reg_staff_gender_alert');" onchange="//textvalidate(this.id,'emis_reg_staff_gender_alert');" required>
                                                  <option value="" selected="selected">Select Option</option>
                                                  <option value="1">Below Expectations</option>
                                                  <option value="2">Closest to expectations</option>
                                                  <option value="3">Meets expectations</option>
                                                  <option value="4">Exceeds expectations</option>
                                              </select>
                                              <font style="color:#dd4b39;"><div id="BRTE_EV_6_alert"></div></font>
                                              </div>	
                                              <div class="col-md-2">
                                              </div>															
                                          </div>
                                      </div>	
                                  </div>
                                  <br>

                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <div class="col-md-2">
                                              </div>
                                              <div class="col-md-5">
                                                  <label class="control-label">7.Teacher Attendance*</label>
                                              </div>    
                                              <div class="col-md-3">
                                              <select class="form-control" id="BRTE_EV_7" name="BRTE_EV_7" onfocus="//textvalidate(this.id,'emis_reg_staff_gender_alert');" onchange="//textvalidate(this.id,'emis_reg_staff_gender_alert');" required>
                                                  <option value="" selected="selected">Select Option</option>
                                                  <option value="1">Below Expectations</option>
                                                  <option value="2">Closest to expectations</option>
                                                  <option value="3">Meets expectations</option>
                                                  <option value="4">Exceeds expectations</option>
                                              </select>
                                              <font style="color:#dd4b39;"><div id="BRTE_EV_7_alert"></div></font>
                                              </div>	
                                              <div class="col-md-2">
                                              </div>															
                                          </div>
                                      </div>	
                                  </div>
                                  <br>
                                  
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <div class="col-md-2">
                                              </div>
                                              <div class="col-md-5">
                                                  <label class="control-label">8.Promoting Health and Hygiene*</label>
                                              </div>    
                                              <div class="col-md-3">
                                              <select class="form-control" id="BRTE_EV_8" name="BRTE_EV_8" onfocus="//textvalidate(this.id,'emis_reg_staff_gender_alert');" onchange="//textvalidate(this.id,'emis_reg_staff_gender_alert');" required>
                                                  <option value="" selected="selected">Select Option</option>
                                                  <option value="1">Below Expectations</option>
                                                  <option value="2">Closest to expectations</option>
                                                  <option value="3">Meets expectations</option>
                                                  <option value="4">Exceeds expectations</option>
                                              </select>
                                              <font style="color:#dd4b39;"><div id="BRTE_EV_8_alert"></div></font>
                                              </div>	
                                              <div class="col-md-2">
                                              </div>															
                                          </div>
                                      </div>	
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <div class="col-md-2">
                                              </div>   
                                              <div class="col-md-8">
                                                  <label class="control-label">It is found correct by verifying the school records
                                                    of teacher handling the class and subject and  the number of days present in the 
                                                    school during working days (2019-20) and certified that the entries are made correctly.</label>                                                                            
                                              </div>	
                                              <div class="col-md-2">
                                              </div>															
                                          </div>
                                      </div>	
                                  </div>
                                  <br>                                                
                      
                                  <div class="form-actions text-align" id="BRTE_pindics_sub_can">
                                      <!--<button type="submit" class="btn green" id="emis_staff_reg_sub" onclick="return popup()">Submit</button>-->
                                      <button type="button" class="btn btn-primary" onclick="pindics_brte_eval();">Submit</button>
                                      <button type="button"  onclick="location.href='<?php echo base_url().'Udise_staff/emis_Udise_staff_dash';?>'" class="btn default" >Cancel</button>
                                  </div>
                          </form>
                          <!-- END PAGE CONTENT INNER -->
                              <!--Modal popup starts-->
                              <div id="teach_popup" class="message" style="display:none">                                
                                <div class="sweet-overlay" tabindex="-1" style="opacity: 1.08; display: block; margin-top: 0px;"></div>                                                                                   
                                    <div id="teach_popup_scroll" class="sweet-alert teach-popup showSweetAlert visible " tabindex="-1" data-custom-class="" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="false" data-animation="pop" data-timer="null" style="display: block; margin-top: -157px;">
                                        <div class="row align-close">      
                                            <div class="col-md-11">                                                        
                                            </div>
                                            <div class="col-md-1">  
                                                <div class="alert-close">×</div>                                                      
                                            </div>
                                        </div>  
                                        
                                        <div role="tabpanel" class="tab-pane" id="pindicss">                    
                                        <div style="text-align: center;">                                                                                      
                                            <h5 style="color:#4fbaa5;">Performance Indicators</h5>                        
                                            <!--<form class="form" method="post" id="teach_pindics_save" name="teach_pindics_save"
                                                    action="<?php// echo base_url().'Udise_staff/pindics_insert';?>">  -->   
                                            
                                            <!--<input type="hidden" name="pi_id" id="pi_id" value="">-->
                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-calendar"></i> Handling Class / Details of Subject</h3>
                                                    <!--<span class="pull-right clickable"> <i class="glyphicon glyphicon-chevron-up"></i> View Details</span>-->
                                                </div>
                                                <div class="panel-body">    
                                                        
                                                    <div class="form-body">                                         
                                                            <!-- <h3 class="alignment">Student Personal Information</h3> <?php //if($validation_error!=""){  echo "<div class='alert alert-warning' id='alert1' name='alert1'>".validation_errors()."</div>"; } ?> -->
                                                            <!--<center>  <label style="color:#dd4b39;">Note: For student Name id ID card - Please enter the student name that how it would be printed in id card.</label></center>-->
                                                        <div class="row">
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Class 1</label>
                                                                    <div class="form-group">
                                                                        <div class="">
                                                                        <select multiple class="form-control" data-placeholder="Choose a Category"  id="BRTE_class1" name="BRTE_class1[]">
                                                                                <option value="1">Tamil</option>
                                                                                <option value="2">English</option>
                                                                                <option value="3">Maths</option>
                                                                                <option value="4">EVS/Science</option>
                                                                                <option value="5">Social Science</option>
                                                                                <option value="6">Telugu</option>
                                                                                <option value="7">Malayalam</option>
                                                                                <option value="8">Urudu</option>
                                                                                <option value="9">Hindi</option>
                                                                                <option value="10">Kannada</option>                                                                
                                                                            </select>
                                                                            <font style="color:#dd4b39;"><div id="BRTE_class1_alert"></div></font>
                                                                        </div>                                                        
                                                                    </div>                          
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Class 2</label>
                                                                    <div class="form-group">
                                                                        <div class="">
                                                                        <select multiple class="form-control" data-placeholder="Choose a Category"  id="BRTE_class2" name="BRTE_class2[]">
                                                                                <option value="1">Tamil</option>
                                                                                <option value="2">English</option>
                                                                                <option value="3">Maths</option>
                                                                                <option value="4">EVS/Science</option>
                                                                                <option value="5">Social Science</option>
                                                                                <option value="6">Telugu</option>
                                                                                <option value="7">Malayalam</option>
                                                                                <option value="8">Urudu</option>
                                                                                <option value="9">Hindi</option>
                                                                                <option value="10">Kannada</option>                                                              
                                                                            </select>
                                                                            <font style="color:#dd4b39;"><div id="BRTE_class2_alert"></div></font>
                                                                        </div>                                                        
                                                                    </div>                          
                                                                </div>
                                                        </div>
                                                        <div class="row">
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Class 3</label>
                                                                    <div class="form-group">
                                                                        <div class="">
                                                                        <select multiple class="form-control" data-placeholder="Choose a Category"  id="BRTE_class3" name="BRTE_class3[]">
                                                                                <option value="1">Tamil</option>
                                                                                <option value="2">English</option>
                                                                                <option value="3">Maths</option>
                                                                                <option value="4">EVS/Science</option>
                                                                                <option value="5">Social Science</option>
                                                                                <option value="6">Telugu</option>
                                                                                <option value="7">Malayalam</option>
                                                                                <option value="8">Urudu</option>
                                                                                <option value="9">Hindi</option>
                                                                                <option value="10">Kannada</option>                                                               
                                                                            </select>
                                                                            <font style="color:#dd4b39;"><div id="BRTE_class3_alert"></div></font>
                                                                        </div>                                                        
                                                                    </div>                          
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Class 4</label>
                                                                    <div class="form-group">
                                                                        <div class="">
                                                                        <select multiple class="form-control" data-placeholder="Choose a Category"  id="BRTE_class4" name="BRTE_class4[]">
                                                                                <option value="1">Tamil</option>
                                                                                <option value="2">English</option>
                                                                                <option value="3">Maths</option>
                                                                                <option value="4">EVS/Science</option>
                                                                                <option value="5">Social Science</option>
                                                                                <option value="6">Telugu</option>
                                                                                <option value="7">Malayalam</option>
                                                                                <option value="8">Urudu</option>
                                                                                <option value="9">Hindi</option>
                                                                                <option value="10">Kannada</option>                                                                 
                                                                            </select>
                                                                            <font style="color:#dd4b39;"><div id="BRTE_class4_alert"></div></font>
                                                                        </div>                                                        
                                                                    </div>                          
                                                                </div>                    
                                                        </div>
                                                        <div class="row">
                                                                <div class="col-md-6">
                                                                    <label class="control-label">class 5</label>
                                                                    <div class="form-group">
                                                                        <div class="">
                                                                        <select multiple class="form-control" data-placeholder="Choose a Category"  id="BRTE_class5" name="BRTE_class5[]">
                                                                                <option value="1">Tamil</option>
                                                                                <option value="2">English</option>
                                                                                <option value="3">Maths</option>
                                                                                <option value="4">EVS/Science</option>
                                                                                <option value="5">Social Science</option>
                                                                                <option value="6">Telugu</option>
                                                                                <option value="7">Malayalam</option>
                                                                                <option value="8">Urudu</option>
                                                                                <option value="9">Hindi</option>
                                                                                <option value="10">Kannada</option>                                                               
                                                                            </select>
                                                                            <font style="color:#dd4b39;"><div id="BRTE_class5_alert"></div></font>
                                                                        </div>                                                        
                                                                    </div>                          
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Class 6</label>
                                                                    <div class="form-group">
                                                                        <div class="">
                                                                        <select multiple class="form-control" data-placeholder="Choose a Category"  id="BRTE_class6" name="BRTE_class6[]">
                                                                                <option value="1">Tamil</option>
                                                                                <option value="2">English</option>
                                                                                <option value="3">Maths</option>
                                                                                <option value="4">EVS/Science</option>
                                                                                <option value="5">Social Science</option>
                                                                                <option value="6">Telugu</option>
                                                                                <option value="7">Malayalam</option>
                                                                                <option value="8">Urudu</option>
                                                                                <option value="9">Hindi</option>
                                                                                <option value="10">Kannada</option>                                                              
                                                                            </select>
                                                                            <font style="color:#dd4b39;"><div id="BRTE_class6_alert"></div></font>
                                                                        </div>                                                        
                                                                    </div>                          
                                                                </div>                    
                                                        </div>
                                                        <div class="row">                                              
                                                                <div class="col-md-6">
                                                                    <label class="control-label">class 7</label>
                                                                    <div class="form-group">
                                                                        <div class="">
                                                                        <select multiple class="form-control" data-placeholder="Choose a Category"  id="BRTE_class7" name="BRTE_class7[]">
                                                                                <option value="1">Tamil</option>
                                                                                <option value="2">English</option>
                                                                                <option value="3">Maths</option>
                                                                                <option value="4">EVS/Science</option>
                                                                                <option value="5">Social Science</option>
                                                                                <option value="6">Telugu</option>
                                                                                <option value="7">Malayalam</option>
                                                                                <option value="8">Urudu</option>
                                                                                <option value="9">Hindi</option>
                                                                                <option value="10">Kannada</option>                                                                
                                                                            </select>
                                                                            <font style="color:#dd4b39;"><div id="BRTE_class7_alert"></div></font>
                                                                        </div>                                                        
                                                                    </div>                          
                                                                </div> 
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Class 8</label>
                                                                    <div class="form-group">
                                                                        <div class="">
                                                                        <select multiple class="form-control" data-placeholder="Choose a Category"  id="BRTE_class8" name="BRTE_class8[]">
                                                                                <option value="1">Tamil</option>
                                                                                <option value="2">English</option>
                                                                                <option value="3">Maths</option>
                                                                                <option value="4">EVS/Science</option>
                                                                                <option value="5">Social Science</option>
                                                                                <option value="6">Telugu</option>
                                                                                <option value="7">Malayalam</option>
                                                                                <option value="8">Urudu</option>
                                                                                <option value="9">Hindi</option>
                                                                                <option value="10">Kannada</option>                                                                 
                                                                            </select>
                                                                            <font style="color:#dd4b39;"><div id="BRTE_class8_alert"></div></font>
                                                                        </div>                                                        
                                                                    </div>                          
                                                                </div>                   
                                                        </div>
                                                    </div>                                    
                                                </div>
                                            </div>


                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-calculator"></i> Calculation of days for Teaching Learning Process (01.06.2018 to 30.04.2019)</h3>
                                                    <!--<span class="pull-right clickable"> <i class="glyphicon glyphicon-chevron-up"></i> View Details</span>-->
                                                </div>
                                                <div class="panel-body">    
                                                            
                                                    <div class="form-body">
                                                            <!-- <h3 class="alignment">Student Personal Information</h3> <?php //if($validation_error!=""){  echo "<div class='alert alert-warning' id='alert1' name='alert1'>".validation_errors()."</div>"; } ?> -->
                                                            <!--<center>  <label style="color:#dd4b39;">Note: For student Name id ID card - Please enter the student name that how it would be printed in id card.</label></center>-->
                                                                                            
                                                        <div class="row">
                                                                <div class="col-md-6">
                                                                    <label class="control-label"><h4><strong>Leave Particulars</strong></h4></label>
                                                                    <div class="form-group self_eva_quest">
                                                                        <div class="row">
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 1. No. of Days Availed CL :</label>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                        <input type="text" class="form-control" id="BRTE_availed_cl" name="BRTE_availed_l" value="20">
                                                                            <font style="color:#dd4b39;"><div id="BRTE_teacher_availed_cl_alert"></div></font>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>
                                                                    <div class="form-group self_eva_quest">
                                                                        <div class="row"> 
                                                                        <div class="col-md-1">
                                                                        </div>                                                                                                       
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 2. No. of Days Availed EL :</label>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                        <input type="text" class="form-control" id="BRTE_availed_el" name="BRTE_availed_el" value="" onkeypress="" value="" placeholder="" required>
                                                                            <font style="color:#dd4b39;"><div id="BRTE_teacher_availed_el_alert"></div></font>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>
                                                                    <div class="form-group self_eva_quest">
                                                                        <div class="row">
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 3. No. of Days Availed ML :</label>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                        <input type="text" class="form-control" id="BRTE_availed_ml" name="BRTE_availed_ml"  value="" onkeypress="" placeholder="" required>
                                                                            <font style="color:#dd4b39;"><div id="BRTE_teacher_availed_ml_alert"></div></font>
                                                                        </div>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                        </div>                                                        
                                                                    </div>
                                                                    <div class="form-group self_eva_quest">
                                                                        <div class="row">
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 4. No. of Days Maternity Leave Availed :</label>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                        <input type="text" class="form-control" id="BRTE_availed_maternity_leave" name="BRTE_availed_maternity_leave" value="" onkeypress="" placeholder="">
                                                                            <font style="color:#dd4b39;"><div id="BRTE_teachers_maternity_leave_alert"></div></font>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>
                                                                    <div class="form-group self_eva_quest">
                                                                        <div class="row">
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 5. Other Leave :</label>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                        <input type="text" class="form-control" id="BRTE_other_leave" name="BRTE_other_leave" value="" onkeypress="" placeholder="" required>
                                                                            <font style="color:#dd4b39;"><div id="BRTE_teachers_other_leave_alert"></div></font>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>                          
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="control-label"><h4><strong>Job particulars</strong></h4></label>
                                                                    <div class="form-group self_eva_quest">
                                                                        <div class="row">
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 6. No. of Days attended Training :</label>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                        <input type="text" class="form-control" id="BRTE_training_attended" name="BRTE_training_attended" value="" onkeypress="" placeholder="" required>
                                                                            <font style="color:#dd4b39;"><div id="BRTE_teacher_training_attended_alert"></div></font>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>
                                                                    <div class="form-group self_eva_quest">
                                                                        <div class="row">
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 7. No. of Days training given :</label>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                        <input type="text" class="form-control" id="BRTE_training_given" name="BRTE_training_given" value="" onkeypress="" placeholder="" required>
                                                                            <font style="color:#dd4b39;"><div id="BRTE_teacher_training_given_alert"></div></font>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>
                                                                    <div class="form-group self_eva_quest">
                                                                        <div class="row">
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 8. No. of days attended Election duty :</label>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                        <input type="text" class="form-control" id="BRTE_election_duty" name="BRTE_election_duty" value="" onkeypress="" placeholder="" required>
                                                                            <font style="color:#dd4b39;"><div id="BRTE_teacher_election_duty_alert"></div></font>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>
                                                                    <div class="form-group self_eva_quest">
                                                                        <div class="row">
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 9. No. of days on duty :</label>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                        <input type="text" class="form-control" id="BRTE_on_duty" name="BRTE_on_duty" value="" onkeypress="" placeholder="" required>
                                                                            <font style="color:#dd4b39;"><div id="BRTE_teachers_on_duty_alert"></div></font>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>
                                                                    <div class="form-group self_eva_quest">
                                                                        <div class="row">
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 10. No. of days used for Classroom activity :</label>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                        <input type="text" class="form-control" id="BRTE_class_activity" name="BRTE_class_activity" value="" onkeypress="" placeholder="" required>
                                                                            <font style="color:#dd4b39;"><div id="BRTE_class_activity_alert"></div></font>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>                          
                                                                </div> 
                                                                <div class="row">
                                                                <div class="col-md-4">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label class="control-label"><strong>Total Working Days : </strong></label>
                                                                    <div class="form-group">
                                                                        <div class="">
                                                                        <input type="text" class="form-control" id="BRTE_tot_work_days" name="BRTE_tot_work_days" onchange="days_validate();"  placeholder="">
                                                                            <font style="color:#dd4b39;"><div id=""></div></font>
                                                                        </div>                                                        
                                                                    </div>                          
                                                                </div>  
                                                                <div class="col-md-4">
                                                                </div>                                          
                                                        </div>                    
                                                        </div>                                      
                                                    </div>                                    
                                                </div>
                                            </div>


                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-paperclip"></i> Implementation of concepts undertaken in training</h3>
                                                    <!--<span class="pull-right clickable"> <i class="glyphicon glyphicon-chevron-up"></i> View Details</span>-->
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-body">                                         
                                                            <!-- <h3 class="alignment">Student Personal Information</h3> <?php //if($validation_error!=""){  echo "<div class='alert alert-warning' id='alert1' name='alert1'>".validation_errors()."</div>"; } ?> -->
                                                            <!--<center>  <label style="color:#dd4b39;">Note: For student Name id ID card - Please enter the student name that how it would be printed in id card.</label></center>-->
                                                        
                                                        <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">                                                    
                                                                        <div class="row">
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        <div class="col-md-6 self_eva_quest">
                                                                        <label class="control-label"><h5> 1. Designing and incorporation of training content in Lesson plan.</h5></label>
                                                                        </div>
                                                                        <div class="col-md-4">                                                      
                                                                            <div class="col-md-6">
                                                                            <input type="radio" class="form-control radio inline imple-con" id="BRTE_lesson_plan_1" name="BRTE_lesson_plan" onkeypress="" placeholder="" required value="1"> Yes<br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                            <input type="radio" class="form-control radio inline imple-con" id="BRTE_lesson_plan_0" name="BRTE_lesson_plan" onkeypress="" placeholder="" required value="0"> No<br>
                                                                            </div>
                                                                            <font style="color:#dd4b39;"><div id="BRTE_lesson_plan_alert"></div></font>
                                                                            
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>                                                                          
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">                                                    
                                                                        <div class="row">
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        <div class="col-md-6 self_eva_quest">
                                                                        <label class="control-label"><h5> 2. Designing of Teaching Learning Material following the instruction given in the training.</h5></label>
                                                                        </div>
                                                                        <div class="col-md-4">                                                      
                                                                            <div class="col-md-6">
                                                                            <input type="radio" class="form-control radio inline imple-con" id="BRTE_teach_learn_matrl_1" name="BRTE_teach_learn_matrl" onkeypress="" placeholder="" required value="1"> Yes<br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                            <input type="radio" class="form-control radio inline imple-con" id="BRTE_teach_learn_matrl_0" name="BRTE_teach_learn_matrl" onkeypress="" placeholder="" required value="0"> No<br>
                                                                            </div>
                                                                            <font style="color:#dd4b39;"><div id="BRTE_teach_learn_matrl_alert"></div></font>                                                         
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>                                                                          
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">                                                    
                                                                        <div class="row">
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        <div class="col-md-6 self_eva_quest">
                                                                        <label class="control-label"><h5> 3. Designing Lesson activities based on training content.</h5></label>
                                                                        </div>
                                                                        <div class="col-md-4">                                                      
                                                                            <div class="col-md-6">
                                                                            <input type="radio" class="form-control radio inline imple-con" id="BRTE_lesson_act_1" name="BRTE_lesson_act" onkeypress="" placeholder="" required value="1"> Yes<br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                            <input type="radio" class="form-control radio inline imple-con" id="BRTE_lesson_act_0" name="BRTE_lesson_act" onkeypress="" placeholder="" required value="0"> No<br>
                                                                            </div>
                                                                            <font style="color:#dd4b39;"><div id="BRTE_lesson_act_alert"></div></font>
                                                                            
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>                                                                          
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">                                                    
                                                                        <div class="row">
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        <div class="col-md-6 self_eva_quest">
                                                                        <label class="control-label"><h5> 4. Designing Life Skill Orientation activities based on the training content.</h5></label>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                        
                                                                            <div class="col-md-6">
                                                                            <input type="radio" class="form-control radio inline imple-con" id="BRTE_life_skill_act_1" name="BRTE_life_skill_act" onkeypress="" placeholder="" required value="1"> Yes<br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                            <input type="radio" class="form-control radio inline imple-con" id="BRTE_life_skill_act_0" name="BRTE_life_skill_act" onkeypress="" placeholder="" required value="0"> No<br>
                                                                            </div>
                                                                            <font style="color:#dd4b39;"><div id="BRTE_life_skill_act_alert"></div></font>
                                                                            
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>                                                                          
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">                                                    
                                                                        <div class="row">
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        <div class="col-md-6 self_eva_quest">
                                                                        <label class="control-label"><h5> 5. Designing of Project based activities on the Training Content.</h5></label>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                        
                                                                            <div class="col-md-6">
                                                                            <input type="radio" class="form-control radio inline imple-con" id="BRTE_prj_based_act_1" name="BRTE_prj_based_act" onkeypress="" placeholder="" required value="1"> Yes<br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                            <input type="radio" class="form-control radio inline imple-con" id="BRTE_prj_based_act_0" name="BRTE_prj_based_act" onkeypress="" placeholder="" required value="0"> No<br>
                                                                            </div>
                                                                            <font style="color:#dd4b39;"><div id="BRTE_prj_based_act_alert"></div></font>
                                                                            
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>                                                                          
                                                                </div>                                                           
                                                        </div>
                                                        
                                                    </div>                                    
                                                </div>
                                            </div> 

                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-music"></i> Talents of Teachers</h3>
                                                    <!--<span class="pull-right clickable"> <i class="glyphicon glyphicon-chevron-up"></i> View Details</span>-->
                                                </div>
                                                <div class="panel-body">    
                                                            
                                                    <div class="form-body">
                                                            
                                                            <!-- <h3 class="alignment">Student Personal Information</h3> <?php //if($validation_error!=""){  echo "<div class='alert alert-warning' id='alert1' name='alert1'>".validation_errors()."</div>"; } ?> -->
                                                            <!--<center>  <label style="color:#dd4b39;">Note: For student Name id ID card - Please enter the student name that how it would be printed in id card.</label></center>-->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label class="control-label"><h4><strong>Special Talents of Teachers</strong></h4></label>
                                                            </div>                                        
                                                        </div>
                                                        <div class="row spcl_talnts">                                            
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 1. Public Speaking</label>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                        <input type="checkbox" value="1" class="form-control checkbx" id="BRTE_public_speaking" name="BRTE_public_speaking" onkeypress="" placeholder="">
                                                                        <font style="color:#dd4b39;"><div id="BRTE_public_speaking_alert"></div></font>
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 2. Advertising</label>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                        <input type="checkbox" value="1" class="form-control checkbx" id="BRTE_advertising" name="BRTE_advertising" onkeypress="" placeholder="">
                                                                            <font style="color:#dd4b39;"><div id="BRTE_advertising_alert"></div></font>
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 3. Graphics</label>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                        <input type="checkbox" value="1" class="form-control checkbx" id="BRTE_graphics" name="BRTE_graphics" onkeypress="" placeholder="">
                                                                            <font style="color:#dd4b39;"><div id="BRTE_graphics_alert"></div></font>
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 4. Music</label>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                        <input type="checkbox" value="1" class="form-control checkbx" id="BRTE_music" name="BRTE_music" onkeypress="" placeholder="">
                                                                            <font style="color:#dd4b39;"><div id="BRTE_music_alert"></div></font>
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 5. Art & Craft</label>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                        <input type="checkbox" value="1" class="form-control checkbx" id="BRTE_art_craft" name="BRTE_art_craft" onkeypress="" placeholder="">
                                                                            <font style="color:#dd4b39;"><div id="BRTE_art_craft_alert"></div></font>
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>  
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 6. Story telling</label>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                        <input type="checkbox" value="1" class="form-control checkbx" id="BRTE_story_telling" name="BRTE_story_telling" onkeypress="" placeholder="">
                                                                            <font style="color:#dd4b39;"><div id="BRTE_story_telling_alert"></div></font>
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div> 
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 7. Drawing & Painting</label>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                        <input type="checkbox" value="1" class="form-control checkbx" id="BRTE_draw_paint" name="BRTE_draw_paint" onkeypress="" placeholder="">
                                                                            <font style="color:#dd4b39;"><div id="BRTE_draw_paint_alert"></div></font>
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 8. Writing Poems</label>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                        <input type="checkbox" value="1" class="form-control checkbx" id="BRTE_writing_poem" name="BRTE_writing_poem" onkeypress="" placeholder="">
                                                                            <font style="color:#dd4b39;"><div id="BRTE_writing_poem_alert"></div></font>
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 9. Yoga</label>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                        <input type="checkbox" value="1" class="form-control checkbx" id="BRTE_yoga" name="BRTE_yoga" onkeypress="" placeholder="">
                                                                            <font style="color:#dd4b39;"><div id="BRTE_yoga_alert"></div></font>
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div> 
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 10. Singing</label>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                        <input type="checkbox" value="1" class="form-control checkbx" id="BRTE_singing" name="BRTE_singing" onkeypress="" placeholder="">
                                                                            <font style="color:#dd4b39;"><div id="BRTE_singing_alert"></div></font>
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div> 
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 11. Sports Activities</label>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                        <input type="checkbox" value="1" class="form-control checkbx" id="BRTE_sports_act" name="BRTE_sports_act" onkeypress="" placeholder="">
                                                                            <font style="color:#dd4b39;"><div id="BRTE_sports_act_alert"></div></font>
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>                          
                                                                </div>
                                                                <div class="col-md-6">                                                
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 12. Photography</label>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                        <input type="checkbox" value="1" class="form-control checkbx" id="BRTE_photography" name="BRTE_photography" onkeypress="" placeholder="">
                                                                            <font style="color:#dd4b39;"><div id="BRTE_photography_alert"></div></font>
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 13. Essay writing</label>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                        <input type="checkbox" value="1" class="form-control checkbx" id="BRTE_essay_writing" name="BRTE_essay_writing" onkeypress="" placeholder="">
                                                                            <font style="color:#dd4b39;"><div id="BRTE_essay_writing_alert"></div></font>
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 14. Video Creation</label>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                        <input type="checkbox" value="1" class="form-control checkbx" id="BRTE_video_creation" name="BRTE_video_creation" onkeypress="" placeholder="">
                                                                            <font style="color:#dd4b39;"><div id="BRTE_video_creation_alert"></div></font>
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 15. Computer Skills</label>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                        <input type="checkbox" value="1" class="form-control checkbx" id="BRTE_comp_skills" name="BRTE_comp_skills" onkeypress="" placeholder="">
                                                                            <font style="color:#dd4b39;"><div id="BRTE_comp_skills_alert"></div></font>
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 16. Creativity</label>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                        <input type="checkbox" value="1" class="form-control checkbx" id="BRTE_creativity" name="BRTE_creativity" onkeypress="" placeholder="">
                                                                            <font style="color:#dd4b39;"><div id="creativity_alert"></div></font>
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 17. Innovation</label>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                        <input type="checkbox" value="1" class="form-control checkbx" id="BRTE_innovation" name="BRTE_innovation" onkeypress="" placeholder="">
                                                                            <font style="color:#dd4b39;"><div id="BRTE_innovation_alert"></div></font>
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 18. Foreign Language</label>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                        <input type="checkbox" value="1" class="form-control checkbx" id="BRTE_foreign_lang" name="BRTE_foreign_lang" onkeypress="" placeholder="">
                                                                            <font style="color:#dd4b39;"><div id="BRTE_foreign_lang_alert"></div></font>
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div> 
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 19. Sign Language</label>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                        <input type="checkbox" value="1" class="form-control checkbx" id="BRTE_sign_lang" name="BRTE_sign_lang" onkeypress="" placeholder="">
                                                                            <font style="color:#dd4b39;"><div id="BRTE_sign_lang_alert"></div></font>
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div> 
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 20. Cultural Activities</label>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                        <input type="checkbox" value="1" class="form-control checkbx" id="BRTE_cultrl_act" name="BRTE_cultrl_act" onkeypress="" placeholder="">
                                                                            <font style="color:#dd4b39;"><div id="BRTE_cultrl_act_alert"></div></font>
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div> 
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                        <div class="col-md-7">
                                                                        <label class="control-label"> 21. Able to speak many languages.</label>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                        <input type="checkbox" value="1" class="form-control checkbx" id="BRTE_spk_many_lang" name="BRTE_spk_many_lang" onkeypress="" placeholder="">
                                                                            <font style="color:#dd4b39;"><div id="BRTE_spk_many_lang_alert"></div></font>
                                                                        </div>
                                                                        </div>                                                        
                                                                    </div>                          
                                                                </div>                    
                                                        </div>                                      
                                                    </div>                                    
                                                </div>
                                            </div> 

                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-user"></i> Teachers Self Evaluation format</h3>
                                                    <!--<span class="pull-right clickable"> <i class="glyphicon glyphicon-chevron-up"></i> View Details</span>-->
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-body">    
                                                            <div class="teachr_eval_sub_title"> 
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                    <h5 class=""><strong>1. Designing Learning Experiences for Children (P1)</strong></h5> 
                                                                    </div>
                                                                </div>
                                                                <div class="teachr_eval_quest">
                                                                    <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">                                                    
                                                                                    <div class="row">
                                                                                    <div class="col-md-1">
                                                                                    </div>
                                                                                    <div class="col-md-7 self_eva_quest">
                                                                                    <label class="control-label"><h5> 1. I plan the teaching and learning process using textbook and other related resource materials..</h5></label>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <!--<input type="text" class="form-control inline" id="P1_1" name="P1_1" onkeypress="" placeholder="" required value="">-->                                                                       
                                                                                        <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P1_1" name="BRTE_P1_1" value="1" required="">
                                                                                            <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                            <option value="1">Below Expectation</option>
                                                                                            <option value="2">Closest to expectations</option>
                                                                                            <option value="3">Meets expectations</option>
                                                                                            <option value="4">Exceeds expectations</option>
                                                                                        </select>
                                                                                        <font style="color:#dd4b39;"><div id="BRTE_P1_1_alert"></div></font>                                                         
                                                                                    </div>
                                                                                    <div class="col-md-1">
                                                                                    </div>
                                                                                    </div>                                                        
                                                                                </div>                                                                          
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">                                                    
                                                                                    <div class="row">
                                                                                    <div class="col-md-1">
                                                                                    </div>
                                                                                    <div class="col-md-7 self_eva_quest">
                                                                                    <label class="control-label"><h5> 2. I involve all children in the teaching learning process.</h5></label>
                                                                                    </div>
                                                                                    <div class="col-md-3"> 
                                                                                        <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P1_2" name="BRTE_P1_2" required="">
                                                                                            <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                            <option value="1">Below Expectation</option>
                                                                                            <option value="2">Closest to expectations</option>
                                                                                            <option value="3">Meets expectations</option>
                                                                                            <option value="4">Exceeds expectations</option>
                                                                                        </select>
                                                                                        <font style="color:#dd4b39;"><div id="BRTE_P1_2_alert"></div></font>                                                         
                                                                                    </div>
                                                                                    <div class="col-md-1">
                                                                                    </div>
                                                                                    </div>                                                        
                                                                                </div>                                                                          
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">                                                    
                                                                                    <div class="row">
                                                                                    <div class="col-md-1">
                                                                                    </div>
                                                                                    <div class="col-md-7 self_eva_quest">
                                                                                    <label class="control-label"><h5> 3. I am logging in the TNTP and know the information uploaded in the site.</h5></label>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P1_3" name="BRTE_P1_3" required="">
                                                                                            <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                            <option value="1">Below Expectation</option>
                                                                                            <option value="2">Closest to expectations</option>
                                                                                            <option value="3">Meets expectations</option>
                                                                                            <option value="4">Exceeds expectations</option>
                                                                                        </select>
                                                                                        <font style="color:#dd4b39;"><div id="BRTE_P1_3_alert"></div></font>                                                         
                                                                                    </div>
                                                                                    <div class="col-md-1">
                                                                                    </div>
                                                                                    </div>                                                        
                                                                                </div>                                                                          
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">                                                    
                                                                                    <div class="row">
                                                                                    <div class="col-md-1">
                                                                                    </div>
                                                                                    <div class="col-md-7 self_eva_quest">
                                                                                    <label class="control-label"><h5> 4. I am uploading my strategies in TNTP.</h5></label>
                                                                                    </div>
                                                                                    <div class="col-md-3"> 
                                                                                        <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P1_4" name="BRTE_P1_4" required="">
                                                                                            <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                            <option value="1">Below Expectation</option>
                                                                                            <option value="2">Closest to expectations</option>
                                                                                            <option value="3">Meets expectations</option>
                                                                                            <option value="4">Exceeds expectations</option>
                                                                                        </select>
                                                                                        <font style="color:#dd4b39;"><div id="BRTE_P1_4_alert"></div></font>                                                         
                                                                                    </div>
                                                                                    <div class="col-md-1">
                                                                                    </div>
                                                                                    </div>                                                        
                                                                                </div>                                                                          
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">                                                    
                                                                                    <div class="row">
                                                                                    <div class="col-md-1">
                                                                                    </div>
                                                                                    <div class="col-md-7 self_eva_quest">
                                                                                    <label class="control-label"><h5> 5. I plan my classroom activities to make the children enjoy the classroom atmosphere.</h5></label>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P1_5" name="BRTE_P1_5" required="">
                                                                                            <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                            <option value="1">Below Expectation</option>
                                                                                            <option value="2">Closest to expectations</option>
                                                                                            <option value="3">Meets expectations</option>
                                                                                            <option value="4">Exceeds expectations</option>
                                                                                        </select>
                                                                                        <font style="color:#dd4b39;"><div id="BRTE_P1_5_alert"></div></font>                                                         
                                                                                    </div>
                                                                                    <div class="col-md-1">
                                                                                    </div>
                                                                                    </div>                                                        
                                                                                </div>                                                                          
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">                                                    
                                                                                    <div class="row">
                                                                                    <div class="col-md-1">
                                                                                    </div>
                                                                                    <div class="col-md-7 self_eva_quest">
                                                                                    <label class="control-label"><h5> 6. I design my notes of lesson with inbuilt activities to achieve the expected learning outcome by all the children.</h5></label>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P1_6" name="BRTE_P1_6" required="">
                                                                                            <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                            <option value="1">Below Expectation</option>
                                                                                            <option value="2">Closest to expectations</option>
                                                                                            <option value="3">Meets expectations</option>
                                                                                            <option value="4">Exceeds expectations</option>
                                                                                        </select>
                                                                                        <font style="color:#dd4b39;"><div id="BRTE_P1_6_alert"></div></font>                                                         
                                                                                    </div>
                                                                                    <div class="col-md-1">
                                                                                    </div>
                                                                                    </div>                                                        
                                                                                </div>                                                                          
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">                                                    
                                                                                    <div class="row">
                                                                                    <div class="col-md-1">
                                                                                    </div>
                                                                                    <div class="col-md-7 self_eva_quest">
                                                                                    <label class="control-label"><h5> 7. I focus on children with learning difficulties and plan remedial measures to bridge them to standards throughout the year.</h5></label>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P1_7" name="BRTE_P1_7" required="">
                                                                                            <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                            <option value="1">Below Expectation</option>
                                                                                            <option value="2">Closest to expectations</option>
                                                                                            <option value="3">Meets expectations</option>
                                                                                            <option value="4">Exceeds expectations</option>
                                                                                        </select>
                                                                                        <font style="color:#dd4b39;"><div id="BRTE_P1_7_alert"></div></font>                                                         
                                                                                    </div>
                                                                                    <div class="col-md-1">
                                                                                    </div>
                                                                                    </div>                                                        
                                                                                </div>                                                                          
                                                                            </div>                                                                                                              
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                            <div class="teachr_eval_sub_title">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                    <h5 class=""><strong>2. Knowledge and Understanding of Subject Matter (P2)</strong></h5> 
                                                                    </div>
                                                                </div>
                                                                <div class="row teachr_eval_quest">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 1. I deliver the content of the lesson to the children with appropriate example, according to the level of the child.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3"> 
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P2_1" name="BRTE_P2_1" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select>
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P2_1_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 2. I complete the prescribed syllabus in appropriate time by using proper TLM.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P2_2" name="BRTE_P2_2" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select>
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P2_2_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 3. I use the quick response code (QR Code) for all subjects wherever prescribed in the textbook, in the right time in the teaching learning process, to make the children understand the concept acquire skills.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P2_3" name="BRTE_P2_3" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select>
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P2_3_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 4. I use library books as a resource material in the classroom for better understanding of the content.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P2_4" name="BRTE_P2_4" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select>
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P2_4_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 5. I use ICT in the classroom to enhance understanding.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P2_5" name="BRTE_P2_5" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P2_5_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>                                                    
                                                                </div> 
                                                            </div> 
                                                            <div class="teachr_eval_sub_title">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                    <h5 class=""><strong>3. Strategy for Facilitating learning (P3)</strong></h5> 
                                                                    <h5 class=""><strong>A. Enabling learning environment and  class room management</strong></h5> 
                                                                    </div>
                                                                </div>
                                                                <div class="row teachr_eval_quest">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 1. The teaching learning materials available in the school is used and exhibited in the classroom adequately.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P3_A_1" name="BRTE_P3_A_1" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P3_A_1_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 2. I treat all my children alike and never hurt them physically and mentally.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P3_A_2" name="BRTE_P3_A_2" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P3_A_2_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 3. I identify the absentee/drop out children and special children and I take steps to ensure their regular attendance.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P3_A_3" name="BRTE_P3_A_3" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select>
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P3_A_3_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 4. I ensure inclusive education for CWSN in my classroom.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P3_A_4" name="BRTE_P3_A_4" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select>
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P3_A_4_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 5. I modify my classroom environment to develop leadership qualities among children.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P3_A_5" name="BRTE_P3_A_5" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select>
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P3_A_5_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 6. I create the classroom infrastructure and follow the methodology in the classroom.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P3_A_6" name="BRTE_P3_A_6" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select>
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P3_A_6_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 7. I do ensure that children have their class work notebook done for all subjects to improve the achievement level of children.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P3_A_7" name="BRTE_P3_A_7" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P3_A_7_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 8. I encourage my children by gifting them simple things in classroom activities.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P3_A_8" name="BRTE_P3_A_8" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P3_A_8_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>                                                                                                              
                                                                </div> 
                                                            </div> 
                                                            <div class="teachr_eval_sub_title">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                    <h5 class=""><strong>B. Learning strategies and activities</strong></h5> 
                                                                    </div>
                                                                </div>
                                                                <div class="row teachr_eval_quest">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 1. I use child centered activities in the classroom.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P3_B_1" name="BRTE_P3_B_1" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P3_B_1_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 2. I give ample opportunities to children in identifying, observing and experimenting tasks.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P3_B_2" name="BRTE_P3_B_2" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select>  
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P3_B_2_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 3. I encourage the children's participation and recognize their answers.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P3_B_3" name="BRTE_P3_B_3" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select>  
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P3_B_3_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 4. I write legibly in the blackboard.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P3_B_4" name="BRTE_P3_B_4" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select>  
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P3_B_4_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 5. I prepare action plan to ensure the students understanding.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P3_B_5" name="BRTE_P3_B_5" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select>  
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P3_B_5_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 6. I use technology to improvise my remedial teaching for the children with difficulties in learning.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P3_B_6" name="BRTE_P3_B_6" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select>  
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P3_B_6_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 7. I give productive home works to make the students think.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P3_B_7" name="BRTE_P3_B_7" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select>  
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P3_B_7_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 8. I know to use TNTP, Workplace and I understand the need and usage of these sites.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P3_B_8" name="BRTE_P3_B_8" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select>  
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P3_B_8_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>                                                    
                                                                </div> 
                                                            </div> 
                                                            <div class="teachr_eval_sub_title">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                    <h5 class=""><strong>C. Assessment and Feed back</strong></h5> 
                                                                    </div>
                                                                </div>
                                                                <div class="row teachr_eval_quest">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 1. I assess children's learning and give them immediate feedback.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P3_C_1" name="BRTE_P3_C_1" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select>  
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P3_C_1_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 2. I properly record the achievement level of the students in CCE records. (Through written test and assignments)</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P3_C_2" name="BRTE_P3_C_2" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select>
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P3_C_2_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 3. I share the achievement level of the children to their parents and to the school management committee members.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P3_C_3" name="BRTE_P3_C_3" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P3_C_3_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 4. I plan a proper Formative Assessment for all the lessons.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P3_C_4" name="BRTE_P3_C_4" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P3_C_4_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 5. I give opportunity to the students to give immediate feedback, group feedback and peer feedback during Evaluation.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P3_C_5" name="BRTE_P3_C_5" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P3_C_5_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>                                                    
                                                                </div> 
                                                            </div> 
                                                            <div class="teachr_eval_sub_title">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                    <h5 class=""><strong>4. Interpersonal Relationship (P4)</strong></h5> 
                                                                    <h5 class=""><strong>A. Relationship with Students</strong></h5> 
                                                                    </div>
                                                                </div>
                                                                <div class="row teachr_eval_quest">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 1. I am friendly to the students with care and respect so as to ensure that the students approach me without any fear.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P4_A_1" name="BRTE_P4_A_1" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select>  
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P4_A_1_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 2. I appreciate the student’s special talents and encourage them to develop their skills and discuss with their parents about their talents and proficiencies.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P4_A_2" name="BRTE_P4_A_2" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P4_A_2_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 3. Apart from Teaching and learning process, I advise my students regarding their personal hygiene, health, citizenship, eating habits and pursuing life skills.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P4_A_3" name="BRTE_P4_A_3" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P4_A_3_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 4. I encourage my students to develop research skills.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P4_A_4" name="BRTE_P4_A_4" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P4_A_4_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 5. I encourage bright students to use higher order thinking skills in their daily classroom activities.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P4_A_5" name="BRTE_P4_A_5" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P4_A_5_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>                                                   
                                                                </div> 
                                                            </div> 
                                                            <div class="teachr_eval_sub_title">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                    <h5 class=""><strong>B. Relationship with Colleagues</strong></h5> 
                                                                    </div>
                                                                </div>
                                                                <div class="row teachr_eval_quest">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 1. I respect my colleagues and accept their involvement and valuable suggestions in my work</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P4_B_1" name="BRTE_P4_B_1" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P4_B_1_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 2. I share my best strategies to my colleagues.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P4_B_2" name="BRTE_P4_B_2" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select>  
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P4_B_2_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>                                                   
                                                                </div> 
                                                            </div> 
                                                            <div class="teachr_eval_sub_title">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                    <h5 class=""><strong>C. Relation with parents and community</strong></h5> 
                                                                    </div>
                                                                </div>
                                                                <div class="row teachr_eval_quest">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 1. I participate in the public functions and National special functions organized in the society.  I encourage and coordinate public to take part in school functions.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P4_C_1" name="BRTE_P4_C_1" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select>  
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P4_C_1_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 2. I pursue the public contribution and develop my school by all means.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P4_C_2" name="BRTE_P4_C_2" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select>  
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P4_C_2_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>                                                   
                                                                </div> 
                                                            </div> 
                                                            <div class="teachr_eval_sub_title">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                    <h5 class=""><strong>5. Professional Development (P5)</strong></h5> 
                                                                    <h5 class=""><strong>A. Self –study participation in in-service education programmes</strong></h5> 
                                                                    </div>
                                                                </div>
                                                                <div class="row teachr_eval_quest">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 1. I renew my subject knowledge through self learning.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P5_A_1" name="BRTE_P5_A_1" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select>  
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P5_A_1_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 2. I participate in the in-service trainings and share my views in the block and cluster level meetings.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P5_A_2" name="BRTE_P5_A_2" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P4_A_2_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 3. I use the new techniques and approaches learned in the trainings in my classroom.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P5_A_3" name="BRTE_P5_A_3" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P5_A_3_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>                                                 
                                                                </div> 
                                                            </div> 
                                                            <div class="teachr_eval_sub_title">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                    <h5 class=""><strong>B. Engagement in innovation and research</strong></h5> 
                                                                    </div>
                                                                </div>
                                                                <div class="row teachr_eval_quest">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 1. I involve in innovative activities and in research activities.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P5_B_1" name="BRTE_P5_B_1" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P5_B_1_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 2. I participate and present my articles at District, State, and National and in International Conferences.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P5_B_2" name="BRTE_P5_B_2" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P4_B_2_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 3. I participate in the block, district and in state level competitions conducted for teachers.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P5_B_3" name="BRTE_P5_B_3" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P5_B_3_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>                                                 
                                                                </div> 
                                                            </div> 
                                                            <div class="teachr_eval_sub_title">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                    <h5 class=""><strong>6. School Development (P6)</strong></h5> 
                                                                    </div>
                                                                </div>
                                                                <div class="row teachr_eval_quest">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 1. I help in organizing school management committee meetings and other public meetings and discuss with School Management Committee members for school development.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P6_1" name="BRTE_P6_1" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P6_1_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 2. I help in organizing daily assembly, cultural programs, sports day, national festivals and other functions with responsibility in my school.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P6_2" name="BRTE_P6_2" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P6_2_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 3. I Coordinate with others and take part in school activities in Gardening, maintaining health, Cleanliness and supply of Mid day meals in school.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P6_3" name="BRTE_P6_3" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P6_3_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 4. I encourage my students in participating group activities.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P6_4" name="BRTE_P6_4" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P6_4_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div> 
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 5. I update all my class details in the EMIS site personally.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P6_5" name="BRTE_P6_5" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P6_5_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>                                                 
                                                                </div> 
                                                            </div> 
                                                            <div class="teachr_eval_sub_title">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                    <h5 class=""><strong>7.  Teacher Attendance (P7)</strong></h5> 
                                                                    </div>
                                                                </div>
                                                                <div class="row teachr_eval_quest">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 1. I attend my school on time and leave the school on time.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P7_1" name="BRTE_P7_1" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P7_1_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 2. I use Tamil Nadu Schools Attendance App to mark my student’s daily attendance regularly without fail.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P7_2" name="BRTE_P7_2" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P7_2_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>                                                
                                                                </div> 
                                                            </div> 
                                                            <div class="teachr_eval_sub_title">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                    <h5 class=""><strong>8.  Promoting Health and Hygiene (P8)</strong></h5> 
                                                                    </div>
                                                                </div>
                                                                <div class="row teachr_eval_quest">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 1. I check my students' personal hygiene and assess them accordingly.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P8_1" name="BRTE_P8_1" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P8_1_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 2. I keep my campus clean and create awareness to the students to separate and dispose the waste in the right basket degradable and     non degradable and ensure that every class has a dustbin.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P8_2" name="BRTE_P8_2" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select>  
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P8_2_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>  
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">                                                    
                                                                                <div class="row">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-7 self_eva_quest">
                                                                                <label class="control-label"><h5> 3. I stick pictures creating awareness about personal hygiene, proper usage of toilet, following healthy habits and make the children realize it.</h5></label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" data-placeholder="Choose a Category" id="BRTE_P8_3" name="BRTE_P8_3" required="">
                                                                                        <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                                        <option value="1">Below Expectation</option>
                                                                                        <option value="2">Closest to expectations</option>
                                                                                        <option value="3">Meets expectations</option>
                                                                                        <option value="4">Exceeds expectations</option>
                                                                                    </select> 
                                                                                    <font style="color:#dd4b39;"><div id="BRTE_P8_3_alert"></div></font>                                                         
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                </div>                                                        
                                                                            </div>                                                                          
                                                                        </div>                                                
                                                                </div> 
                                                            </div> 

                                                    </div>                                    
                                                </div>
                                            </div>  
                                            <!--<div class="form-actions">
                                                <div class="row" id="pindics_sub_can">
                                                    <div class="col-md-12">
                                                                <button type="submit" formnovalidate id="save" name="sav" value="save" id="save" class="btn green">Save</button>                                    
                                                                <button type="submit" class="btn green"  onclick="return confirm('After SUBMIT data could not be edit')"  name="sub" value="submit" id="udise_pindics_sub"  >Submit</button>
                                                                <button type="button" onclick="location.href='<?php //echo base_url().'Registration/emis_student_reg';?>'" class="btn default">Cancel</button>
                                                                <div id="err_msg_save"></div>                                      
                                                        
                                                    </div>
                                                </div>
                                            </div>-->
                                        </div>  
                                       <!-- </form>    -->      
                                    </div>
                                       <!-- <div class="sa-button-container">
                                            <button class="cancel btn btn-lg btn-default" tabindex="2" style="display: none;">Cancel</button>
                                        <div class="sa-confirm-button-container">
                                            <button class="confirm btn btn-lg btn-primary" tabindex="1" style="display: inline-block;">OK</button>
                                            <div class="la-ball-fall">
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                              <!--Modal popup ends-->
                      </div>                        
                    </ul>
                  </div>
                   <div role="tabpanel" class="tab-pane" id="timetable">
                      <div style="text-align: center;">
                        <h5 style="color:#4fbaa5;">Time Table</h5>
                      </div>                    
                  </div>
                  <!--Performance indicator starts-->                                                      
                  <div role="tabpanel" class="tab-pane" id="pindics">                    
                      <div style="text-align: center;">
                        <h5 style="color:#4fbaa5;">Performance Indicators</h5>
                          <form class="form" method="post" id="teach_pindics_save" name="teach_pindics_save"
                                 action="<?php echo base_url().'Udise_staff/pindics_insert';?>">     
                          
                          <input type="hidden" name="pi_id" id="pi_id" value="">
                          <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title" style="color: #000;"><i class="fa fa-calendar"></i> Handling Class / Details of Subject</h3>
                                <span class="pull-right clickable"> <i class="glyphicon glyphicon-chevron-up"></i> View Details</span>
                            </div>
                            <div class="panel-body">    
                                  <div class="row">
                                  <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                      <div class="form-group">
                                      <font style="color:#dd4b39;"><div id="">Note : All fields are mandatory.Use "Save" option to save updates.</div></font>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                      <div class="form-group">
                                      <font style="color:#dd4b39;"><div id="">Use "Submit" option after filling and verifying all details.</div></font>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                  </div> 
                                  <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                      <div class="form-group">
                                      <font style="color:#dd4b39;"><div id="">Use "Ctrl+Click" to select more than one subject.</div></font>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                  </div>
 
                                  <div class="form-body">
                                         
                                         <!-- <h3 class="alignment">Student Personal Information</h3> <?php //if($validation_error!=""){  echo "<div class='alert alert-warning' id='alert1' name='alert1'>".validation_errors()."</div>"; } ?> -->
                                         <!--<center>  <label style="color:#dd4b39;">Note: For student Name id ID card - Please enter the student name that how it would be printed in id card.</label></center>-->
                                      <div class="row">
                                            <div class="col-md-6">
                                                <label class="control-label">Class 1</label>
                                                <div class="form-group">
                                                    <div class="">
                                                      <select multiple class="form-control" data-placeholder="Choose a Category"  id="class1" name="class1[]">
                                                            <option value="1">Tamil</option>
                                                            <option value="2">English</option>
                                                            <option value="3">Maths</option>
                                                            <option value="4">EVS/Science</option>
                                                            <option value="5">Social Science</option>
                                                            <option value="6">Telugu</option>
                                                            <option value="7">Malayalam</option>
                                                            <option value="8">Urudu</option>
                                                            <option value="9">Hindi</option>
                                                            <option value="10">Kannada</option>                                                                
                                                        </select>
                                                        <font style="color:#dd4b39;"><div id="class1_alert"></div></font>
                                                    </div>                                                        
                                                </div>                          
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Class 2</label>
                                                <div class="form-group">
                                                    <div class="">
                                                      <select multiple class="form-control" data-placeholder="Choose a Category"  id="class2" name="class2[]">
                                                            <option value="1">Tamil</option>
                                                            <option value="2">English</option>
                                                            <option value="3">Maths</option>
                                                            <option value="4">EVS/Science</option>
                                                            <option value="5">Social Science</option>
                                                            <option value="6">Telugu</option>
                                                            <option value="7">Malayalam</option>
                                                            <option value="8">Urudu</option>
                                                            <option value="9">Hindi</option>
                                                            <option value="10">Kannada</option>                                                              
                                                        </select>
                                                        <font style="color:#dd4b39;"><div id="class2_alert"></div></font>
                                                    </div>                                                        
                                                </div>                          
                                            </div>
                                      </div>
                                      <div class="row">
                                              <div class="col-md-6">
                                                <label class="control-label">Class 3</label>
                                                <div class="form-group">
                                                    <div class="">
                                                      <select multiple class="form-control" data-placeholder="Choose a Category"  id="class3" name="class3[]">
                                                            <option value="1">Tamil</option>
                                                            <option value="2">English</option>
                                                            <option value="3">Maths</option>
                                                            <option value="4">EVS/Science</option>
                                                            <option value="5">Social Science</option>
                                                            <option value="6">Telugu</option>
                                                            <option value="7">Malayalam</option>
                                                            <option value="8">Urudu</option>
                                                            <option value="9">Hindi</option>
                                                            <option value="10">Kannada</option>                                                               
                                                        </select>
                                                        <font style="color:#dd4b39;"><div id="class3_alert"></div></font>
                                                    </div>                                                        
                                                </div>                          
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Class 4</label>
                                                <div class="form-group">
                                                    <div class="">
                                                      <select multiple class="form-control" data-placeholder="Choose a Category"  id="class4" name="class4[]">
                                                            <option value="1">Tamil</option>
                                                            <option value="2">English</option>
                                                            <option value="3">Maths</option>
                                                            <option value="4">EVS/Science</option>
                                                            <option value="5">Social Science</option>
                                                            <option value="6">Telugu</option>
                                                            <option value="7">Malayalam</option>
                                                            <option value="8">Urudu</option>
                                                            <option value="9">Hindi</option>
                                                            <option value="10">Kannada</option>                                                                 
                                                        </select>
                                                        <font style="color:#dd4b39;"><div id="class4_alert"></div></font>
                                                    </div>                                                        
                                                </div>                          
                                            </div>                    
                                      </div>
                                      <div class="row">
                                              <div class="col-md-6">
                                                <label class="control-label">class 5</label>
                                                <div class="form-group">
                                                    <div class="">
                                                      <select multiple class="form-control" data-placeholder="Choose a Category"  id="class5" name="class5[]">
                                                            <option value="1">Tamil</option>
                                                            <option value="2">English</option>
                                                            <option value="3">Maths</option>
                                                            <option value="4">EVS/Science</option>
                                                            <option value="5">Social Science</option>
                                                            <option value="6">Telugu</option>
                                                            <option value="7">Malayalam</option>
                                                            <option value="8">Urudu</option>
                                                            <option value="9">Hindi</option>
                                                            <option value="10">Kannada</option>                                                               
                                                        </select>
                                                        <font style="color:#dd4b39;"><div id="class5_alert"></div></font>
                                                    </div>                                                        
                                                </div>                          
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Class 6</label>
                                                <div class="form-group">
                                                    <div class="">
                                                      <select multiple class="form-control" data-placeholder="Choose a Category"  id="class6" name="class6[]">
                                                            <option value="1">Tamil</option>
                                                            <option value="2">English</option>
                                                            <option value="3">Maths</option>
                                                            <option value="4">EVS/Science</option>
                                                            <option value="5">Social Science</option>
                                                            <option value="6">Telugu</option>
                                                            <option value="7">Malayalam</option>
                                                            <option value="8">Urudu</option>
                                                            <option value="9">Hindi</option>
                                                            <option value="10">Kannada</option>                                                              
                                                        </select>
                                                        <font style="color:#dd4b39;"><div id="class6_alert"></div></font>
                                                    </div>                                                        
                                                </div>                          
                                            </div>                    
                                      </div>
                                      <div class="row">                                              
                                            <div class="col-md-6">
                                                <label class="control-label">class 7</label>
                                                <div class="form-group">
                                                    <div class="">
                                                      <select multiple class="form-control" data-placeholder="Choose a Category"  id="class7" name="class7[]">
                                                            <option value="1">Tamil</option>
                                                            <option value="2">English</option>
                                                            <option value="3">Maths</option>
                                                            <option value="4">EVS/Science</option>
                                                            <option value="5">Social Science</option>
                                                            <option value="6">Telugu</option>
                                                            <option value="7">Malayalam</option>
                                                            <option value="8">Urudu</option>
                                                            <option value="9">Hindi</option>
                                                            <option value="10">Kannada</option>                                                                
                                                        </select>
                                                        <font style="color:#dd4b39;"><div id="class7_alert"></div></font>
                                                    </div>                                                        
                                                </div>                          
                                            </div> 
                                            <div class="col-md-6">
                                                <label class="control-label">Class 8</label>
                                                <div class="form-group">
                                                    <div class="">
                                                      <select multiple class="form-control" data-placeholder="Choose a Category"  id="class8" name="class8[]">
                                                            <option value="1">Tamil</option>
                                                            <option value="2">English</option>
                                                            <option value="3">Maths</option>
                                                            <option value="4">EVS/Science</option>
                                                            <option value="5">Social Science</option>
                                                            <option value="6">Telugu</option>
                                                            <option value="7">Malayalam</option>
                                                            <option value="8">Urudu</option>
                                                            <option value="9">Hindi</option>
                                                            <option value="10">Kannada</option>                                                                 
                                                        </select>
                                                        <font style="color:#dd4b39;"><div id="class8_alert"></div></font>
                                                    </div>                                                        
                                                </div>                          
                                            </div>                   
                                      </div>
                                      <div class="row">
                                        <div class="col-md-9">
                                          <div class="form-group">
                                          <font style="color:#dd4b39;"><div id="">Note : Select all applicable subjects.More than 1 subject can be selected for each class. </div></font>
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                        </div>
                                      </div>
                                  </div>                                    
                            </div>
                          </div>


                          <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title" style="color: #000;"><i class="fa fa-calculator"></i> Calculation of days for Teaching Learning Process (01.06.2018 to 30.04.2019)</h3>
                                <span class="pull-right clickable"> <i class="glyphicon glyphicon-chevron-up"></i> View Details</span>
                            </div>
                            <div class="panel-body">    
                                           
                                  <div class="form-body">
                                         <!-- <h3 class="alignment">Student Personal Information</h3> <?php //if($validation_error!=""){  echo "<div class='alert alert-warning' id='alert1' name='alert1'>".validation_errors()."</div>"; } ?> -->
                                         <!--<center>  <label style="color:#dd4b39;">Note: For student Name id ID card - Please enter the student name that how it would be printed in id card.</label></center>-->
                                                                           
                                      <div class="row">
                                            <div class="col-md-6">
                                                <label class="control-label"><h4><strong>Leave Particulars</strong></h4></label>
                                                <div class="form-group self_eva_quest">
                                                    <div class="row">
                                                      <div class="col-md-1">
                                                      </div>
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 1. No. of Days Availed CL :</label>
                                                      </div>
                                                      <div class="col-md-3">
                                                      <input type="text" class="form-control" id="availed_cl" name="availed_cl" value="" onkeypress="" placeholder="" required>
                                                          <font style="color:#dd4b39;"><div id="teacher_availed_cl_alert"></div></font>
                                                      </div>
                                                      <div class="col-md-1">
                                                      </div>
                                                    </div>                                                        
                                                </div>
                                                <div class="form-group self_eva_quest">
                                                    <div class="row"> 
                                                      <div class="col-md-1">
                                                      </div>                                                                                                       
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 2. No. of Days Availed EL :</label>
                                                      </div>
                                                      <div class="col-md-3">
                                                      <input type="text" class="form-control" id="availed_el" name="availed_el" value="" onkeypress="" value="" placeholder="" required>
                                                          <font style="color:#dd4b39;"><div id="teacher_availed_el_alert"></div></font>
                                                      </div>
                                                      <div class="col-md-1">
                                                      </div>
                                                    </div>                                                        
                                                </div>
                                                <div class="form-group self_eva_quest">
                                                    <div class="row">
                                                      <div class="col-md-1">
                                                      </div>
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 3. No. of Days Availed ML :</label>
                                                      </div>
                                                      <div class="col-md-3">
                                                      <input type="text" class="form-control" id="availed_ml" name="availed_ml"  value="" onkeypress="" placeholder="" required>
                                                          <font style="color:#dd4b39;"><div id="teacher_availed_ml_alert"></div></font>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                    </div>                                                        
                                                </div>
                                                <div class="form-group self_eva_quest">
                                                    <div class="row">
                                                      <div class="col-md-1">
                                                      </div>
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 4. No. of Days Maternity Leave Availed :</label>
                                                      </div>
                                                      <div class="col-md-3">
                                                      <input type="text" class="form-control" id="availed_maternity_leave" name="availed_maternity_leave" value="" onkeypress="" placeholder="">
                                                          <font style="color:#dd4b39;"><div id="teachers_maternity_leave_alert"></div></font>
                                                      </div>
                                                      <div class="col-md-1">
                                                      </div>
                                                    </div>                                                        
                                                </div>
                                                <div class="form-group self_eva_quest">
                                                    <div class="row">
                                                      <div class="col-md-1">
                                                      </div>
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 5. Other Leave :</label>
                                                      </div>
                                                      <div class="col-md-3">
                                                      <input type="text" class="form-control" id="other_leave" name="other_leave" value="" onkeypress="" placeholder="" required>
                                                          <font style="color:#dd4b39;"><div id="teachers_other_leave_alert"></div></font>
                                                      </div>
                                                      <div class="col-md-1">
                                                      </div>
                                                    </div>                                                        
                                                </div>                          
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label"><h4><strong>Job particulars</strong></h4></label>
                                                <div class="form-group self_eva_quest">
                                                    <div class="row">
                                                      <div class="col-md-1">
                                                      </div>
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 6. No. of Days attended Training :</label>
                                                      </div>
                                                      <div class="col-md-3">
                                                      <input type="text" class="form-control" id="training_attended" name="training_attended" value="" onkeypress="" placeholder="" required>
                                                          <font style="color:#dd4b39;"><div id="teacher_training_attended_alert"></div></font>
                                                      </div>
                                                      <div class="col-md-1">
                                                      </div>
                                                    </div>                                                        
                                                </div>
                                                <div class="form-group self_eva_quest">
                                                    <div class="row">
                                                      <div class="col-md-1">
                                                      </div>
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 7. No. of Days training given :</label>
                                                      </div>
                                                      <div class="col-md-3">
                                                      <input type="text" class="form-control" id="training_given" name="training_given" value="" onkeypress="" placeholder="" required>
                                                          <font style="color:#dd4b39;"><div id="teacher_training_given_alert"></div></font>
                                                      </div>
                                                      <div class="col-md-1">
                                                      </div>
                                                    </div>                                                        
                                                </div>
                                                <div class="form-group self_eva_quest">
                                                    <div class="row">
                                                      <div class="col-md-1">
                                                      </div>
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 8. No. of days attended Election duty :</label>
                                                      </div>
                                                      <div class="col-md-3">
                                                      <input type="text" class="form-control" id="election_duty" name="election_duty" value="" onkeypress="" placeholder="" required>
                                                          <font style="color:#dd4b39;"><div id="teacher_election_duty_alert"></div></font>
                                                      </div>
                                                      <div class="col-md-1">
                                                      </div>
                                                    </div>                                                        
                                                </div>
                                                <div class="form-group self_eva_quest">
                                                    <div class="row">
                                                      <div class="col-md-1">
                                                      </div>
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 9. No. of days on duty :</label>
                                                      </div>
                                                      <div class="col-md-3">
                                                      <input type="text" class="form-control" id="on_duty" name="on_duty" value="" onkeypress="" placeholder="" required>
                                                          <font style="color:#dd4b39;"><div id="teachers_on_duty_alert"></div></font>
                                                      </div>
                                                      <div class="col-md-1">
                                                      </div>
                                                    </div>                                                        
                                                </div>
                                                <div class="form-group self_eva_quest">
                                                    <div class="row">
                                                      <div class="col-md-1">
                                                      </div>
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 10. No. of days used for Classroom activity :</label>
                                                      </div>
                                                      <div class="col-md-3">
                                                      <input type="text" class="form-control" id="class_activity" name="class_activity" value="" onkeypress="" placeholder="" required>
                                                          <font style="color:#dd4b39;"><div id="class_activity_alert"></div></font>
                                                      </div>
                                                      <div class="col-md-1">
                                                      </div>
                                                    </div>                                                        
                                                </div>                          
                                            </div> 
                                            <div class="row">
                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label"><strong>Total Working Days : </strong></label>
                                                <div class="form-group">
                                                    <div class="">
                                                    <input type="text" class="form-control" id="tot_work_days" name="tot_work_days" onchange="days_validate();"  placeholder="">
                                                        <font style="color:#dd4b39;"><div id=""></div></font>
                                                    </div>                                                        
                                                </div>                          
                                            </div>  
                                            <div class="col-md-4">
                                            </div>                                          
                                      </div>                    
                                      </div>
                                      <div class="row">
                                        <div class="col-md-10">
                                          <div class="form-group">
                                          <font style="color:#dd4b39;"><div id="">Note : Sum of leave particulars and Sum of job particulars should be equal to total working days. </div></font>
                                          </div>
                                        </div>
                                        <div class="col-md-2">
                                        </div>
                                      </div>
                                  </div>                                    
                            </div>
                          </div>


                          <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title" style="color: #000;"><i class="fa fa-paperclip"></i> Implementation of concepts undertaken in training</h3>
                                <span class="pull-right clickable"> <i class="glyphicon glyphicon-chevron-up"></i> View Details</span>
                            </div>
                            <div class="panel-body">
                                  <div class="form-body">                                         
                                         <!-- <h3 class="alignment">Student Personal Information</h3> <?php //if($validation_error!=""){  echo "<div class='alert alert-warning' id='alert1' name='alert1'>".validation_errors()."</div>"; } ?> -->
                                         <!--<center>  <label style="color:#dd4b39;">Note: For student Name id ID card - Please enter the student name that how it would be printed in id card.</label></center>-->
                                      
                                      <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">                                                    
                                                    <div class="row">
                                                      <div class="col-md-1">
                                                      </div>
                                                      <div class="col-md-6 self_eva_quest">
                                                      <label class="control-label"><h5> 1. Designing and incorporation of training content in Lesson plan.</h5></label>
                                                      </div>
                                                      <div class="col-md-4">                                                      
                                                        <div class="col-md-6">
                                                          <input type="radio" class="form-control radio inline imple-con" id="lesson_plan_1" name="lesson_plan" onkeypress="" placeholder="" required value="1"> Yes<br>
                                                        </div>
                                                        <div class="col-md-6">
                                                          <input type="radio" class="form-control radio inline imple-con" id="lesson_plan_0" name="lesson_plan" onkeypress="" placeholder="" required value="0"> No<br>
                                                        </div>
                                                          <font style="color:#dd4b39;"><div id="lesson_plan_alert"></div></font>
                                                         
                                                      </div>
                                                      <div class="col-md-1">
                                                      </div>
                                                    </div>                                                        
                                                </div>                                                                          
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">                                                    
                                                    <div class="row">
                                                      <div class="col-md-1">
                                                      </div>
                                                      <div class="col-md-6 self_eva_quest">
                                                      <label class="control-label"><h5> 2. Designing of Teaching Learning Material following the instruction given in the training.</h5></label>
                                                      </div>
                                                      <div class="col-md-4">                                                      
                                                        <div class="col-md-6">
                                                          <input type="radio" class="form-control radio inline imple-con" id="teach_learn_matrl_1" name="teach_learn_matrl" onkeypress="" placeholder="" required value="1"> Yes<br>
                                                        </div>
                                                        <div class="col-md-6">
                                                          <input type="radio" class="form-control radio inline imple-con" id="teach_learn_matrl_0" name="teach_learn_matrl" onkeypress="" placeholder="" required value="0"> No<br>
                                                        </div>
                                                          <font style="color:#dd4b39;"><div id="teach_learn_matrl_alert"></div></font>                                                         
                                                      </div>
                                                      <div class="col-md-1">
                                                      </div>
                                                    </div>                                                        
                                                </div>                                                                          
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">                                                    
                                                    <div class="row">
                                                      <div class="col-md-1">
                                                      </div>
                                                      <div class="col-md-6 self_eva_quest">
                                                      <label class="control-label"><h5> 3. Designing Lesson activities based on training content.</h5></label>
                                                      </div>
                                                      <div class="col-md-4">                                                      
                                                        <div class="col-md-6">
                                                          <input type="radio" class="form-control radio inline imple-con" id="lesson_act_1" name="lesson_act" onkeypress="" placeholder="" required value="1"> Yes<br>
                                                        </div>
                                                        <div class="col-md-6">
                                                          <input type="radio" class="form-control radio inline imple-con" id="lesson_act_0" name="lesson_act" onkeypress="" placeholder="" required value="0"> No<br>
                                                        </div>
                                                          <font style="color:#dd4b39;"><div id="lesson_act_alert"></div></font>
                                                         
                                                      </div>
                                                      <div class="col-md-1">
                                                      </div>
                                                    </div>                                                        
                                                </div>                                                                          
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">                                                    
                                                    <div class="row">
                                                      <div class="col-md-1">
                                                      </div>
                                                      <div class="col-md-6 self_eva_quest">
                                                      <label class="control-label"><h5> 4. Designing Life Skill Orientation activities based on the training content.</h5></label>
                                                      </div>
                                                      <div class="col-md-4">
                                                      
                                                        <div class="col-md-6">
                                                          <input type="radio" class="form-control radio inline imple-con" id="life_skill_act_1" name="life_skill_act" onkeypress="" placeholder="" required value="1"> Yes<br>
                                                        </div>
                                                        <div class="col-md-6">
                                                          <input type="radio" class="form-control radio inline imple-con" id="life_skill_act_0" name="life_skill_act" onkeypress="" placeholder="" required value="0"> No<br>
                                                        </div>
                                                          <font style="color:#dd4b39;"><div id="life_skill_act_alert"></div></font>
                                                         
                                                      </div>
                                                      <div class="col-md-1">
                                                      </div>
                                                    </div>                                                        
                                                </div>                                                                          
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">                                                    
                                                    <div class="row">
                                                      <div class="col-md-1">
                                                      </div>
                                                      <div class="col-md-6 self_eva_quest">
                                                      <label class="control-label"><h5> 5. Designing of Project based activities on the Training Content.</h5></label>
                                                      </div>
                                                      <div class="col-md-4">
                                                      
                                                        <div class="col-md-6">
                                                          <input type="radio" class="form-control radio inline imple-con" id="prj_based_act_1" name="prj_based_act" onkeypress="" placeholder="" required value="1"> Yes<br>
                                                        </div>
                                                        <div class="col-md-6">
                                                          <input type="radio" class="form-control radio inline imple-con" id="prj_based_act_0" name="prj_based_act" onkeypress="" placeholder="" required value="0"> No<br>
                                                        </div>
                                                          <font style="color:#dd4b39;"><div id="prj_based_act_alert"></div></font>
                                                         
                                                      </div>
                                                      <div class="col-md-1">
                                                      </div>
                                                    </div>                                                        
                                                </div>                                                                          
                                            </div>                                                           
                                      </div>
                                     
                                  </div>                                    
                            </div>
                          </div> 

                          <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title" style="color: #000;"><i class="fa fa-music"></i> Talents of Teachers</h3>
                                <span class="pull-right clickable"> <i class="glyphicon glyphicon-chevron-up"></i> View Details</span>
                            </div>
                            <div class="panel-body">    
                                           
                                  <div class="form-body">
                                         
                                         <!-- <h3 class="alignment">Student Personal Information</h3> <?php //if($validation_error!=""){  echo "<div class='alert alert-warning' id='alert1' name='alert1'>".validation_errors()."</div>"; } ?> -->
                                         <!--<center>  <label style="color:#dd4b39;">Note: For student Name id ID card - Please enter the student name that how it would be printed in id card.</label></center>-->
                                      <div class="row">
                                          <div class="col-md-12">
                                              <label class="control-label"><h4><strong>Special Talents of Teachers</strong></h4></label>
                                          </div>                                        
                                      </div>
                                      <div class="row spcl_talnts">                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 1. Public Speaking</label>
                                                      </div>
                                                      <div class="col-md-5">
                                                      <input type="checkbox" value="1" class="form-control checkbx" id="public_speaking" name="public_speaking" onkeypress="" placeholder="">
                                                      <font style="color:#dd4b39;"><div id="public_speaking_alert"></div></font>
                                                      </div>
                                                    </div>                                                        
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 2. Advertising</label>
                                                      </div>
                                                      <div class="col-md-5">
                                                      <input type="checkbox" value="1" class="form-control checkbx" id="advertising" name="advertising" onkeypress="" placeholder="">
                                                          <font style="color:#dd4b39;"><div id="advertising_alert"></div></font>
                                                      </div>
                                                    </div>                                                        
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 3. Graphics</label>
                                                      </div>
                                                      <div class="col-md-5">
                                                      <input type="checkbox" value="1" class="form-control checkbx" id="graphics" name="graphics" onkeypress="" placeholder="">
                                                          <font style="color:#dd4b39;"><div id="graphics_alert"></div></font>
                                                      </div>
                                                    </div>                                                        
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 4. Music</label>
                                                      </div>
                                                      <div class="col-md-5">
                                                      <input type="checkbox" value="1" class="form-control checkbx" id="music" name="music" onkeypress="" placeholder="">
                                                          <font style="color:#dd4b39;"><div id="music_alert"></div></font>
                                                      </div>
                                                    </div>                                                        
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 5. Art & Craft</label>
                                                      </div>
                                                      <div class="col-md-5">
                                                      <input type="checkbox" value="1" class="form-control checkbx" id="art_craft" name="art_craft" onkeypress="" placeholder="">
                                                          <font style="color:#dd4b39;"><div id="art_craft_alert"></div></font>
                                                      </div>
                                                    </div>                                                        
                                                </div>  
                                                <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 6. Story telling</label>
                                                      </div>
                                                      <div class="col-md-5">
                                                      <input type="checkbox" value="1" class="form-control checkbx" id="story_telling" name="story_telling" onkeypress="" placeholder="">
                                                          <font style="color:#dd4b39;"><div id="story_telling_alert"></div></font>
                                                      </div>
                                                    </div>                                                        
                                                </div> 
                                                <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 7. Drawing & Painting</label>
                                                      </div>
                                                      <div class="col-md-5">
                                                      <input type="checkbox" value="1" class="form-control checkbx" id="draw_paint" name="draw_paint" onkeypress="" placeholder="">
                                                          <font style="color:#dd4b39;"><div id="draw_paint_alert"></div></font>
                                                      </div>
                                                    </div>                                                        
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 8. Writing Poems</label>
                                                      </div>
                                                      <div class="col-md-5">
                                                      <input type="checkbox" value="1" class="form-control checkbx" id="writing_poem" name="writing_poem" onkeypress="" placeholder="">
                                                          <font style="color:#dd4b39;"><div id="writing_poem_alert"></div></font>
                                                      </div>
                                                    </div>                                                        
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 9. Yoga</label>
                                                      </div>
                                                      <div class="col-md-5">
                                                      <input type="checkbox" value="1" class="form-control checkbx" id="yoga" name="yoga" onkeypress="" placeholder="">
                                                          <font style="color:#dd4b39;"><div id="yoga_alert"></div></font>
                                                      </div>
                                                    </div>                                                        
                                                </div> 
                                                <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 10. Singing</label>
                                                      </div>
                                                      <div class="col-md-5">
                                                      <input type="checkbox" value="1" class="form-control checkbx" id="singing" name="singing" onkeypress="" placeholder="">
                                                          <font style="color:#dd4b39;"><div id="singing_alert"></div></font>
                                                      </div>
                                                    </div>                                                        
                                                </div> 
                                                <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 11. Sports Activities</label>
                                                      </div>
                                                      <div class="col-md-5">
                                                      <input type="checkbox" value="1" class="form-control checkbx" id="sports_act" name="sports_act" onkeypress="" placeholder="">
                                                          <font style="color:#dd4b39;"><div id="sports_act_alert"></div></font>
                                                      </div>
                                                    </div>                                                        
                                                </div>                          
                                            </div>
                                            <div class="col-md-6">                                                
                                                <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 12. Photography</label>
                                                      </div>
                                                      <div class="col-md-5">
                                                      <input type="checkbox" value="1" class="form-control checkbx" id="photography" name="photography" onkeypress="" placeholder="">
                                                          <font style="color:#dd4b39;"><div id="photography_alert"></div></font>
                                                      </div>
                                                    </div>                                                        
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 13. Essay writing</label>
                                                      </div>
                                                      <div class="col-md-5">
                                                      <input type="checkbox" value="1" class="form-control checkbx" id="essay_writing" name="essay_writing" onkeypress="" placeholder="">
                                                          <font style="color:#dd4b39;"><div id="essay_writing_alert"></div></font>
                                                      </div>
                                                    </div>                                                        
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 14. Video Creation</label>
                                                      </div>
                                                      <div class="col-md-5">
                                                      <input type="checkbox" value="1" class="form-control checkbx" id="video_creation" name="video_creation" onkeypress="" placeholder="">
                                                          <font style="color:#dd4b39;"><div id="video_creation_alert"></div></font>
                                                      </div>
                                                    </div>                                                        
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 15. Computer Skills</label>
                                                      </div>
                                                      <div class="col-md-5">
                                                      <input type="checkbox" value="1" class="form-control checkbx" id="comp_skills" name="comp_skills" onkeypress="" placeholder="">
                                                          <font style="color:#dd4b39;"><div id="comp_skills_alert"></div></font>
                                                      </div>
                                                    </div>                                                        
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 16. Creativity</label>
                                                      </div>
                                                      <div class="col-md-5">
                                                      <input type="checkbox" value="1" class="form-control checkbx" id="creativity" name="creativity" onkeypress="" placeholder="">
                                                          <font style="color:#dd4b39;"><div id="creativity_alert"></div></font>
                                                      </div>
                                                    </div>                                                        
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 17. Innovation</label>
                                                      </div>
                                                      <div class="col-md-5">
                                                      <input type="checkbox" value="1" class="form-control checkbx" id="innovation" name="innovation" onkeypress="" placeholder="">
                                                          <font style="color:#dd4b39;"><div id="innovation_alert"></div></font>
                                                      </div>
                                                    </div>                                                        
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 18. Foreign Language</label>
                                                      </div>
                                                      <div class="col-md-5">
                                                      <input type="checkbox" value="1" class="form-control checkbx" id="foreign_lang" name="foreign_lang" onkeypress="" placeholder="">
                                                          <font style="color:#dd4b39;"><div id="foreign_lang_alert"></div></font>
                                                      </div>
                                                    </div>                                                        
                                                </div> 
                                                <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 19. Sign Language</label>
                                                      </div>
                                                      <div class="col-md-5">
                                                      <input type="checkbox" value="1" class="form-control checkbx" id="sign_lang" name="sign_lang" onkeypress="" placeholder="">
                                                          <font style="color:#dd4b39;"><div id="sign_lang_alert"></div></font>
                                                      </div>
                                                    </div>                                                        
                                                </div> 
                                                <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 20. Cultural Activities</label>
                                                      </div>
                                                      <div class="col-md-5">
                                                      <input type="checkbox" value="1" class="form-control checkbx" id="cultrl_act" name="cultrl_act" onkeypress="" placeholder="">
                                                          <font style="color:#dd4b39;"><div id="cultrl_act_alert"></div></font>
                                                      </div>
                                                    </div>                                                        
                                                </div> 
                                                <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-7">
                                                      <label class="control-label"> 21. Able to speak many languages.</label>
                                                      </div>
                                                      <div class="col-md-5">
                                                      <input type="checkbox" value="1" class="form-control checkbx" id="spk_many_lang" name="spk_many_lang" onkeypress="" placeholder="">
                                                          <font style="color:#dd4b39;"><div id="spk_many_lang_alert"></div></font>
                                                      </div>
                                                    </div>                                                        
                                                </div>                          
                                            </div>                    
                                      </div>
                                      <div class="row">
                                        <div class="col-md-5">
                                          <div class="form-group">
                                          <font style="color:#dd4b39;"><div id="">Note : Tick all applicable options. </div></font>
                                          </div>
                                        </div>
                                        <div class="col-md-9">
                                        </div>
                                      </div>
                                  </div>                                    
                            </div>
                          </div> 

                          <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title" style="color: #000;"><i class="fa fa-user"></i> Teachers Self Evaluation format</h3>
                                <span class="pull-right clickable"> <i class="glyphicon glyphicon-chevron-up"></i> View Details</span>
                            </div>
                            <div class="panel-body">
                                  <div class="form-body">                                         
                                         <!-- <h3 class="alignment">Student Personal Information</h3> <?php //if($validation_error!=""){  echo "<div class='alert alert-warning' id='alert1' name='alert1'>".validation_errors()."</div>"; } ?> -->
                                         <!--<center>  <label style="color:#dd4b39;">Note: For student Name id ID card - Please enter the student name that how it would be printed in id card.</label></center>-->
                                         <!--<div class="row">
                                            <div class="col-md-3">
                                            </div>  
                                            <div class="col-md-6">
                                              <table class="table" border="2"> 
                                                <tbody > 
                                                  <tr>
                                                    <td>1.Below Expectations</td>
                                                    <td>2.Closest to expectations</td>
                                                  </tr>
                                                  <tr>
                                                    <td>3.Meets expectations</td>
                                                    <td>4.Exceeds expectations</td>
                                                  </tr>    
                                                </tbody>
                                              </table>
                                            </div>
                                            <div class="col-md-3">
                                            </div> 
                                          </div> -->
                                          <div class="teachr_eval_sub_title"> 
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <h5 class=""><strong>1. Designing Learning Experiences for Children (P1)</strong></h5> 
                                                </div>
                                              </div>
                                              <div class="teachr_eval_quest">
                                                  <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">                                                    
                                                                <div class="row">
                                                                  <div class="col-md-1">
                                                                  </div>
                                                                  <div class="col-md-7 self_eva_quest">
                                                                  <label class="control-label"><h5> 1. I plan the teaching and learning process using textbook and other related resource materials..</h5></label>
                                                                  </div>
                                                                  <div class="col-md-3">
                                                                      <!--<input type="text" class="form-control inline" id="P1_1" name="P1_1" onkeypress="" placeholder="" required value="">-->                                                                       
                                                                      <select class="form-control" data-placeholder="Choose a Category" id="P1_1" name="P1_1" value="1" required="">
                                                                          <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                          <option value="1">Below Expectation</option>
                                                                          <option value="2">Closest to expectations</option>
                                                                          <option value="3">Meets expectations</option>
                                                                          <option value="4">Exceeds expectations</option>
                                                                      </select>
                                                                      <font style="color:#dd4b39;"><div id="P1_1_alert"></div></font>                                                         
                                                                  </div>
                                                                  <div class="col-md-1">
                                                                  </div>
                                                                </div>                                                        
                                                            </div>                                                                          
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">                                                    
                                                                <div class="row">
                                                                  <div class="col-md-1">
                                                                  </div>
                                                                  <div class="col-md-7 self_eva_quest">
                                                                  <label class="control-label"><h5> 2. I involve all children in the teaching learning process.</h5></label>
                                                                  </div>
                                                                  <div class="col-md-3"> 
                                                                      <select class="form-control" data-placeholder="Choose a Category" id="P1_2" name="P1_2" required="">
                                                                          <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                          <option value="1">Below Expectation</option>
                                                                          <option value="2">Closest to expectations</option>
                                                                          <option value="3">Meets expectations</option>
                                                                          <option value="4">Exceeds expectations</option>
                                                                      </select>
                                                                      <font style="color:#dd4b39;"><div id="P1_2_alert"></div></font>                                                         
                                                                  </div>
                                                                  <div class="col-md-1">
                                                                  </div>
                                                                </div>                                                        
                                                            </div>                                                                          
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">                                                    
                                                                <div class="row">
                                                                  <div class="col-md-1">
                                                                  </div>
                                                                  <div class="col-md-7 self_eva_quest">
                                                                  <label class="control-label"><h5> 3. I am logging in the TNTP and know the information uploaded in the site.</h5></label>
                                                                  </div>
                                                                  <div class="col-md-3">
                                                                      <select class="form-control" data-placeholder="Choose a Category" id="P1_3" name="P1_3" required="">
                                                                          <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                          <option value="1">Below Expectation</option>
                                                                          <option value="2">Closest to expectations</option>
                                                                          <option value="3">Meets expectations</option>
                                                                          <option value="4">Exceeds expectations</option>
                                                                      </select>
                                                                      <font style="color:#dd4b39;"><div id="P1_3_alert"></div></font>                                                         
                                                                  </div>
                                                                  <div class="col-md-1">
                                                                  </div>
                                                                </div>                                                        
                                                            </div>                                                                          
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">                                                    
                                                                <div class="row">
                                                                  <div class="col-md-1">
                                                                  </div>
                                                                  <div class="col-md-7 self_eva_quest">
                                                                  <label class="control-label"><h5> 4. I am uploading my strategies in TNTP.</h5></label>
                                                                  </div>
                                                                  <div class="col-md-3"> 
                                                                      <select class="form-control" data-placeholder="Choose a Category" id="P1_4" name="P1_4" required="">
                                                                          <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                          <option value="1">Below Expectation</option>
                                                                          <option value="2">Closest to expectations</option>
                                                                          <option value="3">Meets expectations</option>
                                                                          <option value="4">Exceeds expectations</option>
                                                                      </select>
                                                                      <font style="color:#dd4b39;"><div id="P1_4_alert"></div></font>                                                         
                                                                  </div>
                                                                  <div class="col-md-1">
                                                                  </div>
                                                                </div>                                                        
                                                            </div>                                                                          
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">                                                    
                                                                <div class="row">
                                                                  <div class="col-md-1">
                                                                  </div>
                                                                  <div class="col-md-7 self_eva_quest">
                                                                  <label class="control-label"><h5> 5. I plan my classroom activities to make the children enjoy the classroom atmosphere.</h5></label>
                                                                  </div>
                                                                  <div class="col-md-3">
                                                                      <select class="form-control" data-placeholder="Choose a Category" id="P1_5" name="P1_5" required="">
                                                                          <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                          <option value="1">Below Expectation</option>
                                                                          <option value="2">Closest to expectations</option>
                                                                          <option value="3">Meets expectations</option>
                                                                          <option value="4">Exceeds expectations</option>
                                                                      </select>
                                                                      <font style="color:#dd4b39;"><div id="P1_5_alert"></div></font>                                                         
                                                                  </div>
                                                                  <div class="col-md-1">
                                                                  </div>
                                                                </div>                                                        
                                                            </div>                                                                          
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">                                                    
                                                                <div class="row">
                                                                  <div class="col-md-1">
                                                                  </div>
                                                                  <div class="col-md-7 self_eva_quest">
                                                                  <label class="control-label"><h5> 6. I design my notes of lesson with inbuilt activities to achieve the expected learning outcome by all the children.</h5></label>
                                                                  </div>
                                                                  <div class="col-md-3">
                                                                      <select class="form-control" data-placeholder="Choose a Category" id="P1_6" name="P1_6" required="">
                                                                          <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                          <option value="1">Below Expectation</option>
                                                                          <option value="2">Closest to expectations</option>
                                                                          <option value="3">Meets expectations</option>
                                                                          <option value="4">Exceeds expectations</option>
                                                                      </select>
                                                                      <font style="color:#dd4b39;"><div id="P1_6_alert"></div></font>                                                         
                                                                  </div>
                                                                  <div class="col-md-1">
                                                                  </div>
                                                                </div>                                                        
                                                            </div>                                                                          
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">                                                    
                                                                <div class="row">
                                                                  <div class="col-md-1">
                                                                  </div>
                                                                  <div class="col-md-7 self_eva_quest">
                                                                  <label class="control-label"><h5> 7. I focus on children with learning difficulties and plan remedial measures to bridge them to standards throughout the year.</h5></label>
                                                                  </div>
                                                                  <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P1_7" name="P1_7" required="">
                                                                          <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                          <option value="1">Below Expectation</option>
                                                                          <option value="2">Closest to expectations</option>
                                                                          <option value="3">Meets expectations</option>
                                                                          <option value="4">Exceeds expectations</option>
                                                                      </select>
                                                                      <font style="color:#dd4b39;"><div id="P1_7_alert"></div></font>                                                         
                                                                  </div>
                                                                  <div class="col-md-1">
                                                                  </div>
                                                                </div>                                                        
                                                            </div>                                                                          
                                                        </div>                                                                                                              
                                                  </div>
                                              </div>
                                          </div> 
                                          <div class="teachr_eval_sub_title">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <h5 class=""><strong>2. Knowledge and Understanding of Subject Matter (P2)</strong></h5> 
                                                </div>
                                              </div>
                                              <div class="row teachr_eval_quest">
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 1. I deliver the content of the lesson to the children with appropriate example, according to the level of the child.</h5></label>
                                                              </div>
                                                              <div class="col-md-3"> 
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P2_1" name="P2_1" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select>
                                                                  <font style="color:#dd4b39;"><div id="P2_1_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 2. I complete the prescribed syllabus in appropriate time by using proper TLM.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P2_2" name="P2_2" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select>
                                                                  <font style="color:#dd4b39;"><div id="P2_2_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 3. I use the quick response code (QR Code) for all subjects wherever prescribed in the textbook, in the right time in the teaching learning process, to make the children understand the concept acquire skills.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P2_3" name="P2_3" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select>
                                                                  <font style="color:#dd4b39;"><div id="P2_3_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 4. I use library books as a resource material in the classroom for better understanding of the content.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P2_4" name="P2_4" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select>
                                                                  <font style="color:#dd4b39;"><div id="P2_4_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 5. I use ICT in the classroom to enhance understanding.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P2_5" name="P2_5" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P2_5_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>                                                    
                                              </div> 
                                          </div> 
                                          <div class="teachr_eval_sub_title">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <h5 class=""><strong>3. Strategy for Facilitating learning (P3)</strong></h5> 
                                                  <h5 class=""><strong>A. Enabling learning environment and  class room management</strong></h5> 
                                                </div>
                                              </div>
                                              <div class="row teachr_eval_quest">
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 1. The teaching learning materials available in the school is used and exhibited in the classroom adequately.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P3_A_1" name="P3_A_1" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P3_A_1_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 2. I treat all my children alike and never hurt them physically and mentally.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P3_A_2" name="P3_A_2" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P3_A_2_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 3. I identify the absentee/drop out children and special children and I take steps to ensure their regular attendance.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P3_A_3" name="P3_A_3" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select>
                                                                  <font style="color:#dd4b39;"><div id="P3_A_3_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 4. I ensure inclusive education for CWSN in my classroom.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P3_A_4" name="P3_A_4" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select>
                                                                  <font style="color:#dd4b39;"><div id="P3_A_4_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 5. I modify my classroom environment to develop leadership qualities among children.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P3_A_5" name="P3_A_5" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select>
                                                                  <font style="color:#dd4b39;"><div id="P3_A_5_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 6. I create the classroom infrastructure and follow the methodology in the classroom.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P3_A_6" name="P3_A_6" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select>
                                                                  <font style="color:#dd4b39;"><div id="P3_A_6_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 7. I do ensure that children have their class work notebook done for all subjects to improve the achievement level of children.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P3_A_7" name="P3_A_7" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P3_A_7_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 8. I encourage my children by gifting them simple things in classroom activities.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P3_A_8" name="P3_A_8" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P3_A_8_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>                                                                                                              
                                              </div> 
                                          </div> 
                                          <div class="teachr_eval_sub_title">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <h5 class=""><strong>B. Learning strategies and activities</strong></h5> 
                                                </div>
                                              </div>
                                              <div class="row teachr_eval_quest">
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 1. I use child centered activities in the classroom.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P3_B_1" name="P3_B_1" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P3_B_1_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 2. I give ample opportunities to children in identifying, observing and experimenting tasks.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P3_B_2" name="P3_B_2" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select>  
                                                                  <font style="color:#dd4b39;"><div id="P3_B_2_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 3. I encourage the children's participation and recognize their answers.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P3_B_3" name="P3_B_3" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select>  
                                                                  <font style="color:#dd4b39;"><div id="P3_B_3_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 4. I write legibly in the blackboard.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P3_B_4" name="P3_B_4" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select>  
                                                                  <font style="color:#dd4b39;"><div id="P3_B_4_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 5. I prepare action plan to ensure the students understanding.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P3_B_5" name="P3_B_5" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select>  
                                                                  <font style="color:#dd4b39;"><div id="P3_B_5_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 6. I use technology to improvise my remedial teaching for the children with difficulties in learning.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P3_B_6" name="P3_B_6" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select>  
                                                                  <font style="color:#dd4b39;"><div id="P3_B_6_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 7. I give productive home works to make the students think.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P3_B_7" name="P3_B_7" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select>  
                                                                  <font style="color:#dd4b39;"><div id="P3_B_7_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 8. I know to use TNTP, Workplace and I understand the need and usage of these sites.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P3_B_8" name="P3_B_8" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select>  
                                                                  <font style="color:#dd4b39;"><div id="P3_B_8_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>                                                    
                                              </div> 
                                          </div> 
                                          <div class="teachr_eval_sub_title">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <h5 class=""><strong>C. Assessment and Feed back</strong></h5> 
                                                </div>
                                              </div>
                                              <div class="row teachr_eval_quest">
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 1. I assess children's learning and give them immediate feedback.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P3_C_1" name="P3_C_1" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select>  
                                                                  <font style="color:#dd4b39;"><div id="P3_C_1_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 2. I properly record the achievement level of the students in CCE records. (Through written test and assignments)</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P3_C_2" name="P3_C_2" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select>
                                                                  <font style="color:#dd4b39;"><div id="P3_C_2_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 3. I share the achievement level of the children to their parents and to the school management committee members.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P3_C_3" name="P3_C_3" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P3_C_3_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 4. I plan a proper Formative Assessment for all the lessons.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P3_C_4" name="P3_C_4" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P3_C_4_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 5. I give opportunity to the students to give immediate feedback, group feedback and peer feedback during Evaluation.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P3_C_5" name="P3_C_5" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P3_C_5_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>                                                    
                                              </div> 
                                          </div> 
                                          <div class="teachr_eval_sub_title">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <h5 class=""><strong>4. Interpersonal Relationship (P4)</strong></h5> 
                                                  <h5 class=""><strong>A. Relationship with Students</strong></h5> 
                                                </div>
                                              </div>
                                              <div class="row teachr_eval_quest">
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 1. I am friendly to the students with care and respect so as to ensure that the students approach me without any fear.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P4_A_1" name="P4_A_1" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select>  
                                                                  <font style="color:#dd4b39;"><div id="P4_A_1_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 2. I appreciate the student’s special talents and encourage them to develop their skills and discuss with their parents about their talents and proficiencies.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P4_A_2" name="P4_A_2" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P4_A_2_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 3. Apart from Teaching and learning process, I advise my students regarding their personal hygiene, health, citizenship, eating habits and pursuing life skills.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P4_A_3" name="P4_A_3" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P4_A_3_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 4. I encourage my students to develop research skills.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P4_A_4" name="P4_A_4" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P4_A_4_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 5. I encourage bright students to use higher order thinking skills in their daily classroom activities.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P4_A_5" name="P4_A_5" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P4_A_5_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>                                                   
                                              </div> 
                                          </div> 
                                          <div class="teachr_eval_sub_title">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <h5 class=""><strong>B. Relationship with Colleagues</strong></h5> 
                                                </div>
                                              </div>
                                              <div class="row teachr_eval_quest">
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 1. I respect my colleagues and accept their involvement and valuable suggestions in my work</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P4_B_1" name="P4_B_1" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P4_B_1_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 2. I share my best strategies to my colleagues.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P4_B_2" name="P4_B_2" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select>  
                                                                  <font style="color:#dd4b39;"><div id="P4_B_2_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>                                                   
                                              </div> 
                                          </div> 
                                          <div class="teachr_eval_sub_title">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <h5 class=""><strong>C. Relation with parents and community</strong></h5> 
                                                </div>
                                              </div>
                                              <div class="row teachr_eval_quest">
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 1. I participate in the public functions and National special functions organized in the society.  I encourage and coordinate public to take part in school functions.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P4_C_1" name="P4_C_1" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select>  
                                                                  <font style="color:#dd4b39;"><div id="P4_C_1_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 2. I pursue the public contribution and develop my school by all means.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P4_C_2" name="P4_C_2" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select>  
                                                                  <font style="color:#dd4b39;"><div id="P4_C_2_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>                                                   
                                              </div> 
                                          </div> 
                                          <div class="teachr_eval_sub_title">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <h5 class=""><strong>5. Professional Development (P5)</strong></h5> 
                                                  <h5 class=""><strong>A. Self –study participation in in-service education programmes</strong></h5> 
                                                </div>
                                              </div>
                                              <div class="row teachr_eval_quest">
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 1. I renew my subject knowledge through self learning.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P5_A_1" name="P5_A_1" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select>  
                                                                  <font style="color:#dd4b39;"><div id="P5_A_1_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 2. I participate in the in-service trainings and share my views in the block and cluster level meetings.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P5_A_2" name="P5_A_2" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P4_A_2_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 3. I use the new techniques and approaches learned in the trainings in my classroom.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P5_A_3" name="P5_A_3" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P5_A_3_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>                                                 
                                              </div> 
                                          </div> 
                                          <div class="teachr_eval_sub_title">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <h5 class=""><strong>B. Engagement in innovation and research</strong></h5> 
                                                </div>
                                              </div>
                                              <div class="row teachr_eval_quest">
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 1. I involve in innovative activities and in research activities.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P5_B_1" name="P5_B_1" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P5_B_1_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 2. I participate and present my articles at District, State, and National and in International Conferences.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P5_B_2" name="P5_B_2" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P4_B_2_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 3. I participate in the block, district and in state level competitions conducted for teachers.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P5_B_3" name="P5_B_3" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P5_B_3_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>                                                 
                                              </div> 
                                          </div> 
                                          <div class="teachr_eval_sub_title">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <h5 class=""><strong>6. School Development (P6)</strong></h5> 
                                                </div>
                                              </div>
                                              <div class="row teachr_eval_quest">
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 1. I help in organizing school management committee meetings and other public meetings and discuss with School Management Committee members for school development.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P6_1" name="P6_1" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P6_1_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 2. I help in organizing daily assembly, cultural programs, sports day, national festivals and other functions with responsibility in my school.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P6_2" name="P6_2" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P6_2_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 3. I Coordinate with others and take part in school activities in Gardening, maintaining health, Cleanliness and supply of Mid day meals in school.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P6_3" name="P6_3" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P6_3_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 4. I encourage my students in participating group activities.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P6_4" name="P6_4" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P6_4_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div> 
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 5. I update all my class details in the EMIS site personally.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P6_5" name="P6_5" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P6_5_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>                                                 
                                              </div> 
                                          </div> 
                                          <div class="teachr_eval_sub_title">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <h5 class=""><strong>7.  Teacher Attendance (P7)</strong></h5> 
                                                </div>
                                              </div>
                                              <div class="row teachr_eval_quest">
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 1. I attend my school on time and leave the school on time.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P7_1" name="P7_1" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P7_1_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 2. I use Tamil Nadu Schools Attendance App to mark my student’s daily attendance regularly without fail.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P7_2" name="P7_2" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P7_2_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>                                                
                                              </div> 
                                          </div> 
                                          <div class="teachr_eval_sub_title">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <h5 class=""><strong>8.  Promoting Health and Hygiene (P8)</strong></h5> 
                                                </div>
                                              </div>
                                              <div class="row teachr_eval_quest">
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 1. I check my students' personal hygiene and assess them accordingly.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P8_1" name="P8_1" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P8_1_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 2. I keep my campus clean and create awareness to the students to separate and dispose the waste in the right basket degradable and     non degradable and ensure that every class has a dustbin.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P8_2" name="P8_2" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select>  
                                                                  <font style="color:#dd4b39;"><div id="P8_2_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>  
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                    
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                              </div>
                                                              <div class="col-md-7 self_eva_quest">
                                                              <label class="control-label"><h5> 3. I stick pictures creating awareness about personal hygiene, proper usage of toilet, following healthy habits and make the children realize it.</h5></label>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <select class="form-control" data-placeholder="Choose a Category" id="P8_3" name="P8_3" required="">
                                                                      <option value="" style="color:#bfbfbf;">Select Input*</option>
                                                                      <option value="1">Below Expectation</option>
                                                                      <option value="2">Closest to expectations</option>
                                                                      <option value="3">Meets expectations</option>
                                                                      <option value="4">Exceeds expectations</option>
                                                                  </select> 
                                                                  <font style="color:#dd4b39;"><div id="P8_3_alert"></div></font>                                                         
                                                              </div>
                                                              <div class="col-md-1">
                                                              </div>
                                                            </div>                                                        
                                                        </div>                                                                          
                                                    </div>                                                
                                              </div> 
                                          </div> 

                                  </div>                                    
                            </div>
                          </div>  
                          <div class="form-actions">
                              <div class="row" id="pindics_sub_can">
                                  <div class="col-md-12">
                                            <button type="submit" formnovalidate id="save" name="sav" value="save" id="save" class="btn green">Save</button>                                    
                                            <button type="submit" class="btn green"  onclick="return confirm('After SUBMIT data could not be edit')"  name="sub" value="submit" id="udise_pindics_sub"  >Submit</button>
                                            <button type="button" onclick="location.href='<?php //echo base_url().'Registration/emis_student_reg';?>'" class="btn default">Cancel</button>
                                            <div id="err_msg_save"></div>                                      
                                    
                                  </div>
                              </div>
                          </div>
                      </div>  
                    </form>          
                  </div>
                  <!--Performance indicator ends-->

                  <div role="tabpanel" class="tab-pane" id="homework">
                    <div style="text-align: center;">
                        <!-- <h5 style="color:#4fbaa5;">Home Work</h5> -->
                                                    

                        <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> Student Homework List </div>
                                                            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add <i class="fa fa-plus"></i></button>
                                                        <div class="tools">
                                                         </div>
                                                    </div>
                                                    <div class="portlet-body">

                           <table class="table table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                  <th>S.No</th>
                                                                  <th>Subjects</th>
                                                                  <th>Assign Class</th>
                                                                  <th>Edit</th>

                                                                </tr>
                                                              </thead>
                                                              <tbody>
                                                                <?php if(!empty($home_work_detail)){
                                                                    foreach($home_work_detail as $index=> $home_work){
                                                                  ?>
                                                                <tr>
                                                                  <td><?=$index+1;?></td>
                                                                  <td><?=$home_work->book_name;?></td>
                                                                  <td><?=$home_work->class_id.' ('.$home_work->section.')';?></td>
                                                                  <td>Edit</td>

                                                                </tr>
                                                              <?php } }?>
                                                              </tbody>
                                                            </table>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                </div>  
                         </div>
                    
                  </div>
                  <div role="tabpanel" class="tab-pane" id="obs_data">                    
                    <div style="text-align: center;">
                        <h5 style="color:#4fbaa5;">Observation Data</h5>
                         </div>
                    <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> Class Room Observation Data </div>
                                                            
                                                        <div class="tools">
                                                         </div>
                                                    </div>
                                                    <div class="portlet-body">

                           <table class="table table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                  <th>S.No</th>
                                                                  <th>School Name</th>
                                                                  <th>Created Date</th>
                                                                </tr>
                                                              </thead>
                                                              <tbody>
                                                                <?php if(!empty($obs_data)){
                                                                    foreach($obs_data as $index=> $all){
                                                                  ?>
                                                                <tr>
                                                                  <td><?=$index+1;?></td>
                                                                  <td><?=$all->school_name.' - ('.$all->udise_code.')';?></td>
                                                                  <td><?=date('d-m-Y',strtotime($all->createdon));?></td>
                                                                </tr>
                                                              <?php } }?>
                                                              </tbody>
                                                            </table>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                </div> 
                  </div>

              </div> 
              <?php } ?>
      </div>
  </div>
  </div>
  <!-- /.col -->
                   
                </div>
                      
        </div>
                                    <!-- BEGIN PAGE CONTENT INNER -->
                          

                                

                    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="title"></h4>
        </div>
        <div class="modal-body">
        <div class="row">
                                                  <form method="post">
                                                    <div class="row">
                                                    
                                        <div class="col-md-6">
                                                  <label class="control-label">Select Class *</label>
                                                    <div class="form-group">
                                                    
                                                        <div class="">
                                                            <select name="class_id" id="class_id" class="form-control">
                                                          
                                                        <option value="0">--select--</option>
                                                        <?php 
                                                        $class_roma = array
                                                            ('I'=>1,'II'=>'2','III'=>'3','IV'=>'4','V'=>'5','VI'=>'6','VII'=>'7','VIII'=>'8','IX'=>'9','X'=>'10','XI'=>'11','XII'=>'12','LKG'=>'13','UKG'=>'14','PreKG'=>'15');
                                                            // $class_roman_name = array_search($class_id,$class_roma);
                                                        if(!empty($school_classwise)){
                                                            // print_r($school_classwise);
                                                            foreach($school_classwise as $class_wise)
                                                            {

                                                              $class_roman_names = array_search($class_wise->class_id,$class_roma);
                                                              // echo $class_wise->class_id; 
                                                          ?>
                                                           <option value="<?=$class_wise->class_id?>" <?php echo ($class_wise->class_id == $class_id) ? 'selected' : ''; ?>><?=$class_roman_names.'-'.$class_wise->class_id;?></option>
                                                         <?php } }?>
                                                      </select>
                                                             <!--மாணவர் பெயர் ஆங்கிலம்-->
                                                        </div>
                                                    </div> 
                                        </div>
                                        <div class="col-md-6">
                                                  <label class="control-label">Section *</label>
                                                    <div class="form-group">
                                                    
                                                        <div class="">
                                        <div id="section">
                                                            <select class="form-control" id="section_id">
                                                                <option value="<?=$section_id?>"><?=(!empty($section_id))?$section_id:'All'?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                     </div>
                                                    </div> 
                                                  </div>
                                                  <div class="row">
                                        
                                        <div class="col-md-6">
                                                  <label class="control-label">Subject *</label>
                                                    <div class="form-group">
                                                    
                                                        <div id="subjects">
                                                            <select class="form-control" id="subject_det">
                                                                <option value="">Select Subject</option>

                                                            </select>
                                                        </div>
                                                    </div> 
                                        </div>
                                        <div class="col-md-12">

                                                  <label class="control-label">Home Work * <span style="color: red">Maximum 1000 charaters</span></label>
                                                    <div class="form-group">
                                                    
                                                        <div class="">
                                                            <textarea id="content" rows="4" cols="50">
 
</textarea>
                                                             <!--மாணவர் பெயர் ஆங்கிலம்-->
                                                        </div>
                                                    </div> 
                                        </div>
                                      </div>
                                                    
                                                    <div id="err_msg"></div>
                                                  </form>
                                                </div>
        </div>
        <div class="modal-footer">
          <p id="create"></p>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="confirm" onclick="save()">Save</button>

        </div>
      </div>
      
    </div>
  </div>
  
</div>
                    
            <?php $this->load->view('scripts.php'); ?>
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
            <script src="<?php echo base_url().'asset/global/plugins/ckeditor/ckeditor.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/ckeditor/adapters/jquery.js';?>" type="text/javascript"></script>

           
        </div>
    </div>
</div>
         <?php $this->load->view('footer.php'); ?>

</div>
</body>
<script type="text/javascript">
  var editor = '';
  $(document).ready(function()
  {
    $("#myModal").modal('hide');
    $(".close-body").css('display','none');
        $('.panel-heading').find('span').find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');

     editor =    CKEDITOR.replace( 'content', {
  height: 300,
  maxLength:10,
  extraPlugins:'wordcount',
  countSpacesAsChars: false,
countHTML: false,
clipboard_defaultContentType:'text',
  wordcount: {
               
                    showCharCount: true,
              
              // maxCharCount: 1000,
              paragraphsCountGreaterThanMaxLengthEvent: function (currentLength, maxLength) {
                  $("#informationparagraphs").css("background-color", "crimson").css("color", "white").text(currentLength + "/" + maxLength + " - paragraphs").show();
              },
            },
  uiColor :'#4fbaa5',
  toolbarCanCollapse:true,
  
  toolbar: [
    { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
  { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', '-', 'Undo', 'Redo' ] },
  { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
  //{ name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
  '/',
  { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
  { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
  { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
  { name: 'insert', items: [ 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] }, //'Image', 'Flash', 
  '/',
  // { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
  // { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
  // { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
  // { name: 'others', items: [ '-' ] },
  // { name: 'about', items: [ 'About' ] }
  ],
 });

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

    function save()
  {
     var content = editor.getData();
     // console.log(content);
     var title = $("#subject_id").val();
     var section_id = $("#section_id").val();
     console.log(title,section_id);

     if(section_id =='' || section_id==0)
     {
       $("#err_msg").html('<p style="color:red">Please Select Section');
     }else if(title=='' || title==0)
     {
       $("#err_msg").html('<p style="color:red">Please Select Subject');

     }else if(content=='' )
     {
       $("#err_msg").html('<p style="color:red">Please Enter Content');

     }else
     {

        var data = {'records':{'id':'','class_section_id':section_id,'subject':title,'information':content,'status':1}};
        // console.log(data);return false;
        $.ajax(
        {
            method:"POST",
            url:'<?=base_url()."Udise_staff/save_home_work"?>',
            dataType:'JSON',
            data:data,
            success:function(res)
            {
              console.log(res);

              if(res)
              {
                          swal({
                                title:"successfully Saved Home Work",
                                type:'success',
                                confirmButtonText: "Ok",
                            },function(isConfirm)
                            {
                                window.location.reload();
                            })
              }
            }


        })
     }



  }

</script>

<script type="text/javascript">
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
<script type="text/javascript">
  var class_id = 0;
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

$(document).ready(function(){
  class_id = $('#class_id').val();
  var section_id  =0;
  var subject_id = 0;
 // section_id = <?php echo json_encode($section_id,JSON_PRETTY_PRINT);?>;
  get_section(class_id,section_id);

})
    $(document).on('change','#class_id',function()
{
    class_id = $(this).val();
    section_id = null;
    subject_id = null;

    get_section(class_id,section_id);
    get_subjects(class_id,subject_id);



    // var school_id = $("#school_code").val();
    

})
    function get_section(class_id,section_id)
    {
  // alert(section_id);

      if(class_id !=0){
    $.ajax(
    {
        type: "POST",
        url:baseurl+'Udise_staff/get_school_section_details',
        data:{'class_id':class_id},
        success: function(resp){
        // alert(resp);  
       
        var section = JSON.parse(resp);
        // console.log(section);
            $("#section").empty('');            

        var section_drop = '<select name="section_id" class="form-control" id="section_id">';

        section_drop += '<option value=0>Select Section</option>';
        $.each(section,function(id,val)
        {
            section_drop +='<option value='+ val.id +'>'+val.section+'</option>';
        })
            section_drop +='</select>';
            
            $("#section").append(section_drop); 
            // alert(section_id);
            if(section_id !=0 && section_id !=null){
            $("#section_id").val(section_id).attr('selected','selected');   
            }else
            {
                console.log('else');
                $("#section_id").val(0).attr('selected','selected');
            }      
         },
          
    })
    }
    }

    function get_subjects(class_id,subject_id)
    {
      // var class_id = $("#class_id").val();
      if(class_id !=0){
    $.ajax(
    {
        type: "POST",
        url:baseurl+'Udise_staff/get_subjects_details',
        data:{'class_id':class_id},
        success: function(resp){
        // alert(resp);  
       
        var subject = JSON.parse(resp);
        // console.log(section);
            $("#subjects").empty('');            

        var section_drop = '<select name="subject_id" class="form-control" id="subject_id">';

        section_drop += '<option value=0>Select Subject</option>';
        $.each(subject,function(id,val)
        {
            section_drop +='<option value='+ val.id +'>'+val.book_name+'</option>';
        })
            section_drop +='</select>';
            
            $("#subjects").append(section_drop); 
            // alert(section_id);
            if(subject_id !=0 && subject_id !=null){
            $("#subject_det").val(subject_id).attr('selected','selected');   
            }else
            {
                console.log('else');
                $("#subject_det").val(0).attr('selected','selected');
            }      
         },
          
    })
    }
    }

    
    function class_validation()
{
    // alert();
    var class_id = $("#class_id").val();
    // console.log(class_id);
    // var section = $("#section_id").val();
    // console.log(section);
    if(class_id =='0')
    {
        var msg = '<span style="color:red;">You must select your Class!</span><br /><br />';
                    document.getElementById('msg').innerHTML = msg;
                    return false;
    }else
    {
        return true;
    }
}

  
function days_validate(){
  var tot_days = document.getElementById("tot_work_days").value;    
  var availed_cl = document.getElementById("availed_cl").value;
  var availed_el = document.getElementById("availed_el").value;
  var availed_ml = document.getElementById("availed_ml").value;
  var availed_maternity_leave = document.getElementById("availed_maternity_leave").value;
  var other_leave = document.getElementById("other_leave").value;
  var training_attended = document.getElementById("training_attended").value;
  var training_given = document.getElementById("training_given").value;
  var election_duty = document.getElementById("election_duty").value;
  var on_duty = document.getElementById("on_duty").value;
  var class_activity = document.getElementById("class_activity").value;
  //alert(tot_days);
  var total_wrk_days = (+availed_cl + +availed_el + +availed_ml + +availed_maternity_leave + +other_leave + +training_attended+
  +training_given + +election_duty + +on_duty + +class_activity);
  //alert(total_wrk_days);
  if(total_wrk_days != tot_days){
    alert("Total working days mismatch");
  }
}
function teach_pindics_init(teacher_id){  
  $.ajax(
    {
        type: "POST",
        url:baseurl+'Udise_staff/get_pindics_details',
        data:{'teacher_id':teacher_id},
        success: function(resp){
          if(resp!=''){
              var pindics_data =  JSON.parse(resp);
              document.getElementById('pi_id').value = pindics_data[0]['pi_id'];
              if(pindics_data[0]['status'] == "1"){
                $("#pindics_sub_can").hide();
              }   
              if(pindics_data[0]['class_1'] != null){
              $.each(pindics_data[0]['class_1'].split(","), function(i,e){
                  $("#class1 option[value='" + e + "']").prop("selected", true);
              });
              }
              if(pindics_data[0]['class_2'] != null){
                $.each(pindics_data[0]['class_2'].split(","), function(i,e){
                  $("#class2 option[value='" + e + "']").prop("selected", true);
              });
              }
              if(pindics_data[0]['class_3'] != null){
              $.each(pindics_data[0]['class_3'].split(","), function(i,e){
                  $("#class3 option[value='" + e + "']").prop("selected", true);
              });
              }
              if(pindics_data[0]['class_4'] != null){
              $.each(pindics_data[0]['class_4'].split(","), function(i,e){
                  $("#class4 option[value='" + e + "']").prop("selected", true);
              });
              }
              if(pindics_data[0]['class_5'] != null){
              $.each(pindics_data[0]['class_5'].split(","), function(i,e){
                  $("#class5 option[value='" + e + "']").prop("selected", true);
              });
              }
              if(pindics_data[0]['class_6'] != null){  
              $.each(pindics_data[0]['class_6'].split(","), function(i,e){
                  $("#class6 option[value='" + e + "']").prop("selected", true);
              });
              }
              if(pindics_data[0]['class_7'] != null){
              $.each(pindics_data[0]['class_7'].split(","), function(i,e){
                  $("#class7 option[value='" + e + "']").prop("selected", true);
              });
              }
              if(pindics_data[0]['class_8'] != null){
              $.each(pindics_data[0]['class_8'].split(","), function(i,e){
                  $("#class8 option[value='" + e + "']").prop("selected", true);
              });
              }
              document.getElementById('tot_work_days').value = pindics_data[0]['tot_wrk_days'];
              document.getElementById('availed_cl').value = pindics_data[0]['cl'];
              document.getElementById('availed_el').value = pindics_data[0]['el'];
              document.getElementById('availed_ml').value = pindics_data[0]['ml'];
              document.getElementById('availed_maternity_leave').value = pindics_data[0]['maternity_leave'];
              document.getElementById('other_leave').value = pindics_data[0]['other_leave'];
              document.getElementById('training_attended').value = pindics_data[0]['traing_atnd'];
              document.getElementById('training_given').value = pindics_data[0]['traing_givn'];
              document.getElementById('election_duty').value = pindics_data[0]['electn_dty_atnd'];
              document.getElementById('on_duty').value = pindics_data[0]['duty_days'];
              document.getElementById('class_activity').value = pindics_data[0]['clas_rm_actvty_dys'];

              if(pindics_data[0]['lesson_plan'] == '0'){
                document.getElementById('lesson_plan_0').checked = pindics_data[0]['lesson_plan'];              
              }else{
                document.getElementById('lesson_plan_1').checked = pindics_data[0]['lesson_plan'];
              }
              if(pindics_data[0]['teach_learn_matrl'] == '0'){
                document.getElementById('teach_learn_matrl_0').checked = pindics_data[0]['teach_learn_matrl'];              
              }else{
                document.getElementById('teach_learn_matrl_1').checked = pindics_data[0]['teach_learn_matrl'];
              }
              if(pindics_data[0]['lesson_act'] == '0'){
                document.getElementById('lesson_act_0').checked = pindics_data[0]['lesson_act'];              
              }else{
                document.getElementById('lesson_act_1').checked = pindics_data[0]['lesson_act'];
              }
              if(pindics_data[0]['life_skill_act'] == '0'){
                document.getElementById('life_skill_act_0').checked = pindics_data[0]['life_skill_act'];              
              }else{
                document.getElementById('life_skill_act_1').checked = pindics_data[0]['life_skill_act'];
              }
              if(pindics_data[0]['prj_based_act'] == '0'){
                document.getElementById('prj_based_act_0').checked = pindics_data[0]['prj_based_act'];              
              }else{
                document.getElementById('prj_based_act_1').checked = pindics_data[0]['prj_based_act'];
              }              
              
              document.getElementById('public_speaking').checked = pindics_data[0]['public_speaking'];
              document.getElementById('advertising').checked = pindics_data[0]['advertising'];
              document.getElementById('public_speaking').checked = pindics_data[0]['public_speaking'];
              document.getElementById('graphics').checked = pindics_data[0]['graphics'];
              document.getElementById('music').checked = pindics_data[0]['music'];
              document.getElementById('art_craft').checked = pindics_data[0]['art_craft'];
              document.getElementById('story_telling').checked = pindics_data[0]['story_telling'];
              document.getElementById('draw_paint').checked = pindics_data[0]['draw_paint'];
              document.getElementById('writing_poem').checked = pindics_data[0]['writing_poem'];
              document.getElementById('yoga').checked = pindics_data[0]['yoga'];
              document.getElementById('singing').checked = pindics_data[0]['singing'];
              document.getElementById('sports_act').checked = pindics_data[0]['sports_act'];
              document.getElementById('photography').checked = pindics_data[0]['photography'];
              document.getElementById('essay_writing').checked = pindics_data[0]['essay_writing'];
              document.getElementById('video_creation').checked = pindics_data[0]['video_creation'];
              document.getElementById('comp_skills').checked = pindics_data[0]['comp_skills'];
              document.getElementById('creativity').checked = pindics_data[0]['creativity'];
              document.getElementById('innovation').checked = pindics_data[0]['innovation'];
              document.getElementById('foreign_lang').checked = pindics_data[0]['foreign_lang'];
              document.getElementById('sign_lang').checked = pindics_data[0]['sign_lang'];
              document.getElementById('cultrl_act').checked = pindics_data[0]['cultrl_act'];
              document.getElementById('spk_many_lang').checked = pindics_data[0]['spk_many_lang'];

              document.getElementById('P1_1').value = pindics_data[0]['P1_1'];
              document.getElementById('P1_2').value = pindics_data[0]['P1_2'];
              document.getElementById('P1_3').value = pindics_data[0]['P1_3'];
              document.getElementById('P1_4').value = pindics_data[0]['P1_4'];
              document.getElementById('P1_5').value = pindics_data[0]['P1_5'];
              document.getElementById('P1_5').value = pindics_data[0]['P1_5'];
              document.getElementById('P1_6').value = pindics_data[0]['P1_6'];
              document.getElementById('P1_7').value = pindics_data[0]['P1_7'];
              document.getElementById('P2_1').value = pindics_data[0]['P2_1'];
              document.getElementById('P2_2').value = pindics_data[0]['P2_2'];
              document.getElementById('P2_3').value = pindics_data[0]['P2_3'];
              document.getElementById('P2_4').value = pindics_data[0]['P2_4'];
              document.getElementById('P2_5').value = pindics_data[0]['P2_5'];
              document.getElementById('P3_A_1').value = pindics_data[0]['P3_A_1'];
              document.getElementById('P3_A_2').value = pindics_data[0]['P3_A_2'];
              document.getElementById('P3_A_3').value = pindics_data[0]['P3_A_3'];
              document.getElementById('P3_A_4').value = pindics_data[0]['P3_A_4'];
              document.getElementById('P3_A_5').value = pindics_data[0]['P3_A_5'];
              document.getElementById('P3_A_6').value = pindics_data[0]['P3_A_6'];
              document.getElementById('P3_A_7').value = pindics_data[0]['P3_A_7'];
              document.getElementById('P3_A_8').value = pindics_data[0]['P3_A_8'];
              document.getElementById('P3_B_1').value = pindics_data[0]['P3_B_1'];
              document.getElementById('P3_B_2').value = pindics_data[0]['P3_B_2'];
              document.getElementById('P3_B_3').value = pindics_data[0]['P3_B_3'];
              document.getElementById('P3_B_4').value = pindics_data[0]['P3_B_4'];
              document.getElementById('P3_B_5').value = pindics_data[0]['P3_B_5'];
              document.getElementById('P3_B_6').value = pindics_data[0]['P3_B_6'];
              document.getElementById('P3_B_7').value = pindics_data[0]['P3_B_7'];
              document.getElementById('P3_B_8').value = pindics_data[0]['P3_B_8'];
              document.getElementById('P3_C_1').value = pindics_data[0]['P3_C_1'];
              document.getElementById('P3_C_2').value = pindics_data[0]['P3_C_2'];
              document.getElementById('P3_C_3').value = pindics_data[0]['P3_C_3'];
              document.getElementById('P3_C_4').value = pindics_data[0]['P3_C_4'];
              document.getElementById('P3_C_5').value = pindics_data[0]['P3_C_5'];
              document.getElementById('P4_A_1').value = pindics_data[0]['P4_A_1'];
              document.getElementById('P4_A_2').value = pindics_data[0]['P4_A_2'];
              document.getElementById('P4_A_3').value = pindics_data[0]['P4_A_3'];
              document.getElementById('P4_A_4').value = pindics_data[0]['P4_A_4'];
              document.getElementById('P4_A_5').value = pindics_data[0]['P4_A_5'];
              document.getElementById('P4_B_1').value = pindics_data[0]['P4_B_1'];
              document.getElementById('P4_B_2').value = pindics_data[0]['P4_B_2'];
              document.getElementById('P4_C_1').value = pindics_data[0]['P4_C_1'];
              document.getElementById('P4_C_2').value = pindics_data[0]['P4_C_2'];
              document.getElementById('P5_A_1').value = pindics_data[0]['P5_A_1'];
              document.getElementById('P5_A_2').value = pindics_data[0]['P5_A_2'];
              document.getElementById('P5_A_3').value = pindics_data[0]['P5_A_3'];
              document.getElementById('P5_B_1').value = pindics_data[0]['P5_B_1'];
              document.getElementById('P5_B_2').value = pindics_data[0]['P5_B_2'];
              document.getElementById('P5_B_3').value = pindics_data[0]['P5_B_3'];
              document.getElementById('P6_1').value = pindics_data[0]['P6_1'];
              document.getElementById('P6_2').value = pindics_data[0]['P6_2'];
              document.getElementById('P6_3').value = pindics_data[0]['P6_3'];
              document.getElementById('P6_4').value = pindics_data[0]['P6_4'];
              document.getElementById('P6_5').value = pindics_data[0]['P6_5'];
              document.getElementById('P7_1').value = pindics_data[0]['P7_1'];
              document.getElementById('P7_2').value = pindics_data[0]['P7_2'];
              document.getElementById('P8_1').value = pindics_data[0]['P8_1'];
              document.getElementById('P8_2').value = pindics_data[0]['P8_2'];
              document.getElementById('P8_3').value = pindics_data[0]['P8_3'];
              /*document.getElementById("lesson_plan").checked = true;
              document.getElementByName("teach_learn_matrl").checked = false;
              document.getElementById("lesson_act").checked = pindics_data[0]['lesson_act'];
              document.getElementById("life_skill_act").checked = pindics_data[0]['life_skill_act'];
              document.getElementById("prj_based_act").checked = pindics_data[0]['prj_based_act'];*/
          }else{
            $("#pindics").show();
          }
         
         
        }    
    })
  
}
function schoollist(block_id){
    $('#school_id')
    .empty()
    .append('<option value="">Select School</option>');
    $('#teacher_id')
    .empty()
    .append('<option value="">Select Teacher</option>');
    $("#teach_pindics_view").hide();
    $("#teach_pindics_empty").hide();
    $("#hm_pindics_empty").hide();
  var block_id = (block_id.value || block_id.options[block_id.selectedIndex].value);
  $.ajax(
    {
        type: "POST",
        url:baseurl+'Udise_staff/school_list',
        data:{'block_id':block_id},
        success: function(resp){  
        var data = JSON.parse(resp);
        $.each(data , function (i, slaveValue) {            
        $('#school_id').append(
        $('<option></option>').val(slaveValue.school_id).html(slaveValue.school_name)
            )});
        }
    })
}

function teacherlist(school_id){
    $('#teacher_id')
    .empty()
    .append('<option value="">Select Teacher</option>');
    $("#teach_pindics_view").hide();
    $("#teach_pindics_empty").hide();
    $("#hm_pindics_empty").hide();
  var school_id = (school_id.value || school_id.options[school_id.selectedIndex].value); 
  $.ajax(
    {
        type: "POST",
        url:baseurl+'Udise_staff/teachers_list',
        data:{'school_id':school_id},
        success: function(resp){  
        var data = JSON.parse(resp);
        $.each(data , function (i, slaveValue) {            
        $('#teacher_id').append(
        $('<option></option>').val(slaveValue.teacher_id).html(slaveValue.teacher_name)
            )});
        }
    })
} 


function teacherinfoview(){
    var teacher_id = document.getElementById("teacher_id").value;
        if(teacher_id != ''){
            $.ajax(
		            {
			data:{'teacher_id':teacher_id},
            url:baseurl+'Udise_staff/pindics_single_teachr_data',
			type:"POST",
			dataType:"JSON",
			success:function(res)
			{	
                if(res[0]['class_1'] != null){
                $.each(res[0]['class_1'].split(","), function(i,e){
                    $("#BRTE_class1 option[value='" + e + "']").prop("selected", true);
                });
                }
                if(res[0]['class_2'] != null){
                    $.each(res[0]['class_2'].split(","), function(i,e){
                    $("#BRTE_class2 option[value='" + e + "']").prop("selected", true);
                });
                }
                if(res[0]['class_3'] != null){
                $.each(res[0]['class_3'].split(","), function(i,e){
                    $("#BRTE_class3 option[value='" + e + "']").prop("selected", true);
                });
                }
                if(res[0]['class_4'] != null){
                $.each(res[0]['class_4'].split(","), function(i,e){
                    $("#BRTE_class4 option[value='" + e + "']").prop("selected", true);
                });
                }
                if(res[0]['class_5'] != null){
                $.each(res[0]['class_5'].split(","), function(i,e){
                    $("#BRTE_class5 option[value='" + e + "']").prop("selected", true);
                });
                }
                if(res[0]['class_6'] != null){  
                $.each(res[0]['class_6'].split(","), function(i,e){
                    $("#BRTE_class6 option[value='" + e + "']").prop("selected", true);
                });
                }
                if(res[0]['class_7'] != null){
                $.each(res[0]['class_7'].split(","), function(i,e){
                    $("#BRTE_class7 option[value='" + e + "']").prop("selected", true);
                });
                }
                if(res[0]['class_8'] != null){
                $.each(res[0]['class_8'].split(","), function(i,e){
                    $("#BRTE_class8 option[value='" + e + "']").prop("selected", true);
                });
                }

                document.getElementById("BRTE_availed_cl").value=res['0']['cl'];  
                document.getElementById("BRTE_availed_el").value=res['0']['el'];                
                document.getElementById("BRTE_availed_ml").value=res['0']['ml'];
                document.getElementById("BRTE_availed_maternity_leave").value=res['0']['maternity_leave'];
                document.getElementById("BRTE_other_leave").value=res['0']['other_leave'];
                document.getElementById("BRTE_training_attended").value=res['0']['traing_atnd'];
                document.getElementById("BRTE_training_given").value=res['0']['traing_givn'];
                document.getElementById("BRTE_election_duty").value=res['0']['electn_dty_atnd'];
                document.getElementById("BRTE_on_duty").value=res['0']['duty_days'];
                document.getElementById("BRTE_class_activity").value=res['0']['clas_rm_actvty_dys'];
                document.getElementById("BRTE_tot_work_days").value=res['0']['tot_wrk_days'];
                
                if(res[0]['lesson_plan'] == '0'){
                    document.getElementById('BRTE_lesson_plan_0').checked = res[0]['lesson_plan'];              
                }else{
                    document.getElementById('BRTE_lesson_plan_1').checked = res[0]['lesson_plan'];
                }
                if(res[0]['teach_learn_matrl'] == '0'){
                    document.getElementById('BRTE_teach_learn_matrl_0').checked = res[0]['teach_learn_matrl'];              
                }else{
                    document.getElementById('BRTE_teach_learn_matrl_1').checked = res[0]['teach_learn_matrl'];
                }
                if(res[0]['lesson_act'] == '0'){
                    document.getElementById('BRTE_lesson_act_0').checked = res[0]['lesson_act'];              
                }else{
                    document.getElementById('BRTE_lesson_act_1').checked = res[0]['lesson_act'];
                }
                if(res[0]['life_skill_act'] == '0'){
                    document.getElementById('BRTE_life_skill_act_0').checked = res[0]['life_skill_act'];              
                }else{
                    document.getElementById('BRTE_life_skill_act_1').checked = res[0]['life_skill_act'];
                }
                if(res[0]['prj_based_act'] == '0'){
                    document.getElementById('BRTE_prj_based_act_0').checked = res[0]['prj_based_act'];              
                }else{
                    document.getElementById('BRTE_prj_based_act_1').checked = res[0]['prj_based_act'];
                }              
              
                document.getElementById('BRTE_public_speaking').checked = res[0]['public_speaking'];
                document.getElementById('BRTE_advertising').checked = res[0]['advertising'];
                document.getElementById('BRTE_public_speaking').checked = res[0]['public_speaking'];
                document.getElementById('BRTE_graphics').checked = res[0]['graphics'];
                document.getElementById('BRTE_music').checked = res[0]['music'];
                document.getElementById('BRTE_art_craft').checked = res[0]['art_craft'];
                document.getElementById('BRTE_story_telling').checked = res[0]['story_telling'];
                document.getElementById('BRTE_draw_paint').checked = res[0]['draw_paint'];
                document.getElementById('BRTE_writing_poem').checked = res[0]['writing_poem'];
                document.getElementById('BRTE_yoga').checked = res[0]['yoga'];
                document.getElementById('BRTE_singing').checked = res[0]['singing'];
                document.getElementById('BRTE_sports_act').checked = res[0]['sports_act'];
                document.getElementById('BRTE_photography').checked = res[0]['photography'];
                document.getElementById('BRTE_essay_writing').checked = res[0]['essay_writing'];
                document.getElementById('BRTE_video_creation').checked = res[0]['video_creation'];
                document.getElementById('BRTE_comp_skills').checked = res[0]['comp_skills'];
                document.getElementById('BRTE_creativity').checked = res[0]['creativity'];
                document.getElementById('BRTE_innovation').checked = res[0]['innovation'];
                document.getElementById('BRTE_foreign_lang').checked = res[0]['foreign_lang'];
                document.getElementById('BRTE_sign_lang').checked = res[0]['sign_lang'];
                document.getElementById('BRTE_cultrl_act').checked = res[0]['cultrl_act'];
                document.getElementById('BRTE_spk_many_lang').checked = res[0]['spk_many_lang'];

                document.getElementById('BRTE_P1_1').value = res[0]['P1_1'];
                document.getElementById('BRTE_P1_2').value = res[0]['P1_2'];
                document.getElementById('BRTE_P1_3').value = res[0]['P1_3'];
                document.getElementById('BRTE_P1_4').value = res[0]['P1_4'];
                document.getElementById('BRTE_P1_5').value = res[0]['P1_5'];
                document.getElementById('BRTE_P1_5').value = res[0]['P1_5'];
                document.getElementById('BRTE_P1_6').value = res[0]['P1_6'];
                document.getElementById('BRTE_P1_7').value = res[0]['P1_7'];
                document.getElementById('BRTE_P2_1').value = res[0]['P2_1'];
                document.getElementById('BRTE_P2_2').value = res[0]['P2_2'];
                document.getElementById('BRTE_P2_3').value = res[0]['P2_3'];
                document.getElementById('BRTE_P2_4').value = res[0]['P2_4'];
                document.getElementById('BRTE_P2_5').value = res[0]['P2_5'];
                document.getElementById('BRTE_P3_A_1').value = res[0]['P3_A_1'];
                document.getElementById('BRTE_P3_A_2').value = res[0]['P3_A_2'];
                document.getElementById('BRTE_P3_A_3').value = res[0]['P3_A_3'];
                document.getElementById('BRTE_P3_A_4').value = res[0]['P3_A_4'];
                document.getElementById('BRTE_P3_A_5').value = res[0]['P3_A_5'];
                document.getElementById('BRTE_P3_A_6').value = res[0]['P3_A_6'];
                document.getElementById('BRTE_P3_A_7').value = res[0]['P3_A_7'];
                document.getElementById('BRTE_P3_A_8').value = res[0]['P3_A_8'];
                document.getElementById('BRTE_P3_B_1').value = res[0]['P3_B_1'];
                document.getElementById('BRTE_P3_B_2').value = res[0]['P3_B_2'];
                document.getElementById('BRTE_P3_B_3').value = res[0]['P3_B_3'];
                document.getElementById('BRTE_P3_B_4').value = res[0]['P3_B_4'];
                document.getElementById('BRTE_P3_B_5').value = res[0]['P3_B_5'];
                document.getElementById('BRTE_P3_B_6').value = res[0]['P3_B_6'];
                document.getElementById('BRTE_P3_B_7').value = res[0]['P3_B_7'];
                document.getElementById('BRTE_P3_B_8').value = res[0]['P3_B_8'];
                document.getElementById('BRTE_P3_C_1').value = res[0]['P3_C_1'];
                document.getElementById('BRTE_P3_C_2').value = res[0]['P3_C_2'];
                document.getElementById('BRTE_P3_C_3').value = res[0]['P3_C_3'];
                document.getElementById('BRTE_P3_C_4').value = res[0]['P3_C_4'];
                document.getElementById('BRTE_P3_C_5').value = res[0]['P3_C_5'];
                document.getElementById('BRTE_P4_A_1').value = res[0]['P4_A_1'];
                document.getElementById('BRTE_P4_A_2').value = res[0]['P4_A_2'];
                document.getElementById('BRTE_P4_A_3').value = res[0]['P4_A_3'];
                document.getElementById('BRTE_P4_A_4').value = res[0]['P4_A_4'];
                document.getElementById('BRTE_P4_A_5').value = res[0]['P4_A_5'];
                document.getElementById('BRTE_P4_B_1').value = res[0]['P4_B_1'];
                document.getElementById('BRTE_P4_B_2').value = res[0]['P4_B_2'];
                document.getElementById('BRTE_P4_C_1').value = res[0]['P4_C_1'];
                document.getElementById('BRTE_P4_C_2').value = res[0]['P4_C_2'];
                document.getElementById('BRTE_P5_A_1').value = res[0]['P5_A_1'];
                document.getElementById('BRTE_P5_A_2').value = res[0]['P5_A_2'];
                document.getElementById('BRTE_P5_A_3').value = res[0]['P5_A_3'];
                document.getElementById('BRTE_P5_B_1').value = res[0]['P5_B_1'];
                document.getElementById('BRTE_P5_B_2').value = res[0]['P5_B_2'];
                document.getElementById('BRTE_P5_B_3').value = res[0]['P5_B_3'];
                document.getElementById('BRTE_P6_1').value = res[0]['P6_1'];
                document.getElementById('BRTE_P6_2').value = res[0]['P6_2'];
                document.getElementById('BRTE_P6_3').value = res[0]['P6_3'];
                document.getElementById('BRTE_P6_4').value = res[0]['P6_4'];
                document.getElementById('BRTE_P6_5').value = res[0]['P6_5'];
                document.getElementById('BRTE_P7_1').value = res[0]['P7_1'];
                document.getElementById('BRTE_P7_2').value = res[0]['P7_2'];
                document.getElementById('BRTE_P8_1').value = res[0]['P8_1'];
                document.getElementById('BRTE_P8_2').value = res[0]['P8_2'];
                document.getElementById('BRTE_P8_3').value = res[0]['P8_3'];

                /*document.getElementById("HM_EV_2").value=res['0']['HM_EV_2'];
                document.getElementById("HM_EV_3").value=res['0']['HM_EV_3'];
                document.getElementById("HM_EV_4").value=res['0']['HM_EV_4'];
                document.getElementById("HM_EV_5").value=res['0']['HM_EV_5'];
                document.getElementById("HM_EV_6").value=res['0']['HM_EV_6'];
                document.getElementById("HM_EV_7").value=res['0']['HM_EV_7'];
                document.getElementById("HM_EV_8").value=res['0']['HM_EV_8'];*/	                
                if(res[0]['status'] == "1"){
                   // $("#pindics_sub_can").hide();
                    //$("#teach_pindics_view").show();
                    $("#teach_popup").show();
                }                	
			}
		    });
        }
}

function teacherinfo(){
        var teacher_id = document.getElementById("teacher_id").value;
        if(teacher_id != ''){            
            $.ajax(
		            {
			data:{'teacher_id':teacher_id},
            url:baseurl+'Udise_staff/pindics_single_teachr_data',
			type:"POST",
			dataType:"JSON",
			success:function(res)
			{  
				//swal("OK", "Teacher PINDICS updated Successfully", "success");
				//window.location.reload();
                // console.log(res);	                
                if(res!='EMPTY'){
                    $("#teach_pindics_empty").hide();
                    $("#teach_pindics_view").show();
                    // console.log("data");
                    document.getElementById("BRTE_EV_1").value=res['0']['BRTE_EV_1'];
                    document.getElementById("BRTE_EV_2").value=res['0']['BRTE_EV_2'];
                    document.getElementById("BRTE_EV_3").value=res['0']['BRTE_EV_3'];
                    document.getElementById("BRTE_EV_4").value=res['0']['BRTE_EV_4'];
                    document.getElementById("BRTE_EV_5").value=res['0']['BRTE_EV_5'];
                    document.getElementById("BRTE_EV_6").value=res['0']['BRTE_EV_6'];
                    document.getElementById("BRTE_EV_7").value=res['0']['BRTE_EV_7'];
                    document.getElementById("BRTE_EV_8").value=res['0']['BRTE_EV_8'];	                
                    
                    if(res[0]['hm_ev_status'] == "1"){
                        $("#hm_pindics_empty").hide();
                        $("#BRTE_pindics_sub_can").hide();
                    }else{
                        $("#hm_pindics_empty").show();
                        $("#BRTE_pindics_sub_can").hide();
                    }     
                    if(res[0]['brte_ev_status'] == "1"){         
                        $("#BRTE_pindics_sub_can").hide();                      
                    } else if (res[0]['brte_ev_status'] == "0" && res[0]['hm_ev_status'] == "1"){
                        $("#BRTE_pindics_sub_can").show();
                    }
                }else{
                    $("#teach_pindics_view").hide();
                    $("#teach_pindics_empty").show();
                    $("#hm_pindics_empty").hide();
                    $("#BRTE_pindics_sub_can").hide();
                    document.getElementById("BRTE_EV_1").value = '';
                    document.getElementById("BRTE_EV_2").value = '';
                    document.getElementById("BRTE_EV_3").value = '';
                    document.getElementById("BRTE_EV_4").value = '';
                    document.getElementById("BRTE_EV_5").value = '';
                    document.getElementById("BRTE_EV_6").value = '';
                    document.getElementById("BRTE_EV_7").value = '';
                    document.getElementById("BRTE_EV_8").value = '';                    
                }
                               	
			}
		    });
        }
    }

$(document).ready(function() {
	$('.alert-close').on('click', function(){
		$("#teach_popup").hide();
	});	
});

function pindics_brte_eval()
{     
	var teacher_id=$("#teacher_id").val();
	var school_key_id=$("#school_id").val();
    var brte_id=$("#brte_id").val();
	var BRTE_EV_1=$("#BRTE_EV_1").val();
	var BRTE_EV_2=$("#BRTE_EV_2").val();
	var BRTE_EV_3=$("#BRTE_EV_3").val();
	//var HM_EV_3=document.getElementById("HM_EV_3").value; 
	var BRTE_EV_4=$("#BRTE_EV_4").val();
	var BRTE_EV_5=$("#BRTE_EV_5").val();
	var BRTE_EV_6=$("#BRTE_EV_6").val();
	var BRTE_EV_7=$("#BRTE_EV_7").val();
	var BRTE_EV_8=$("#BRTE_EV_8").val();
	//var ug=$("#emis_reg_staff_ug").val();
	//var pg=$("#emis_reg_staff_pg").val();
	if(teacher_id=='' || school_key_id=='' || BRTE_EV_1=='' || BRTE_EV_2=='' || BRTE_EV_3=='' || BRTE_EV_4=='' || BRTE_EV_5=='' || BRTE_EV_6=='' || BRTE_EV_7=='' || BRTE_EV_8=='')
	{
		//swal("OK", "All field Required", "error");
        alert("All field Required");
		return false;
		//window.location.reload();
	}
	else
	{	
		            $.ajax(
		            {
			data:{'teacher_id':teacher_id,'brte_id':brte_id,'BRTE_EV_1':BRTE_EV_1,'BRTE_EV_2':BRTE_EV_2,'BRTE_EV_3':BRTE_EV_3,'BRTE_EV_4':BRTE_EV_4,'BRTE_EV_5':BRTE_EV_5,'BRTE_EV_6':BRTE_EV_6,'BRTE_EV_7':BRTE_EV_7,'BRTE_EV_8':BRTE_EV_8},
			//alert(data);
            url:baseurl+'Udise_staff/pindics_brte_eval_insert',
			type:"POST",
			dataType:"JSON",
			success:function(res)
			{				
				//swal("OK", "Teacher PINDICS updated Successfully", "success");
                alert("Your PINDICS Evaluation Added Successfully");
				window.location.reload();					
			}
		    });
	
	}	   		
				
}
</script>
</html>