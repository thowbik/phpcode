<?php 

    $this->load->library('session'); 
    $this->load->database(); 
    $this->load->model('Homemodel');
    $school_id=$this->session->userdata('emis_school_id');
    $schoolprofile = $this->Homemodel->getschoolprofiledetails($school_id);
    $schoolname  = $schoolprofile[0]->school_name;
    $udise_code  = $schoolprofile[0]->udise_code;
    $blockname  = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
    $schoolcate  = $this->Homemodel->getcatename($schoolprofile[0]->sch_cate_id);
    $schmanage  = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
    $schdirector  = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);
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
  border-radius: 15px !important;
  padding:2px !important;
  text-align:center;
  color:#fff;
}
.attendancecard{
  width: 230px;
  height: 50px;
  border-radius: 15px !important;
  padding:2px !important;
  text-align:center;
  color:#fff;
}


.gallery
{
    display: inline-block;
    margin-top: 20px;
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
.fancybox-skin{
  padding:0px !important;
}
</style>
<link rel="stylesheet" href="<?php echo base_url().'asset/global/plugins/fancybox/source/jquery.fancybox.css';?>" media="screen">


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
            

 <?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
<?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
<?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 5){ ?>
<?php $this->load->view('state/header.php'); }else{ $this->load->view('header.php'); } ?>
<div class="page-content">
                                <div></div> 
                                <br/>
                                <div class="container">
                                    <div class="row">
        
                                    <!-- BEGIN PAGE CONTENT INNER -->
                          
                    <div class="row margin-bottom-20">
                                    <div class=" row page-content-inner">
<div class="col-lg-9">
        
            <!-- <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-university"></i> <?php if($schoolname!=""){ echo $schoolname; } ?> ( <?php if($udise_code!=""){ echo $udise_code; } ?> )</h3>
                    <span class="pull-right clickable panel-collapsed"> <i class="glyphicon glyphicon-chevron-up"></i> View Details</span>
                </div>
                <div class="panel-body close-body">
                    <div class="col-lg-12 col-md-9 ">
                                                
                                                   
                                                <div class="col-lg-12 col-md-6 ">
                                                     <h3>Block : <?php if($blockname!=""){ echo $blockname; } ?> <br/></h3>
                                                    <font style="color:#9b9b9b;"><i class="fa fa-calendar"></i> Management :</font>  <?php if($schmanage!=""){ echo $schmanage; } ?> 
                                                    
                                                    <font style="color:#9b9b9b;"><i class="fa fa-map-marker"></i> Category :</font> 
                                                 <?php if($schoolcate!=""){ echo $schoolcate; } ?>
                                                    <br/>
                                                  <font style="color:#9b9b9b;"><i class="fa fa-briefcase"></i> Directorate :</font>  <?php if($schdirector!=""){ echo $schdirector; } ?> 
                                                
                                                   
                                                </div>
                                            </div>

                                                
                </div>
        </div> -->
         <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-picture-o"></i> School Photos</h3>
                    <span class="pull-right clickable panel-collapsed"> <i class="glyphicon glyphicon-chevron-up"></i> View Details</span>
                </div>
                <div class="panel-body close-body"> 
               
                <div style="text-align: right;"> 
                        <a href="<?php echo base_url().'home/emis_school_home'; ?>" style="text-decoration: none;">
                    Click Here to Upload Image</a> 
                    </div>
                <?php 
    $keyname1 = 'School_Profile/'.$this->session->userdata('emis_school_id').'_1.jpg';
    $keyname2 = 'School_Profile/'.$this->session->userdata('emis_school_id').'_2.jpg';
    $keyname3 = 'School_Profile/'.$this->session->userdata('emis_school_id').'_3.jpg';
    $keyname4 = 'School_Profile/'.$this->session->userdata('emis_school_id').'_4.jpg';
    $keyname5 = 'School_Profile/'.$this->session->userdata('emis_school_id').'_5.jpg';
         
   // print_r($img_path);
    $image1 = Common::get_url(TEACHER_BUCKET_NAME,$keyname1,'+5 minutes');
    $image2 = Common::get_url(TEACHER_BUCKET_NAME,$keyname2,'+5 minutes');
    $image3 = Common::get_url(TEACHER_BUCKET_NAME,$keyname3,'+5 minutes');
    $image4 = Common::get_url(TEACHER_BUCKET_NAME,$keyname4,'+5 minutes');
    $image5 = Common::get_url(TEACHER_BUCKET_NAME,$keyname5,'+5 minutes');
   

    ?>               <!-- <a data-fancybox="gallery" href="<?=$image1;?>">
  <img id="img1" width="200" height="150" src="<?=$image1;?>" onerror=this.onerror=null;this.src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png" />
</a>

<a data-fancybox="gallery" href="<?=$image2;?>">
      <img id="img2"  width="200" height="150"  src="<?=$image2;?>" onerror=this.onerror=null;this.src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png" />
</a>-->
                <section class="customer-logos slider"> 
      <div class="slide">
        <a class="thumbnail fancybox" rel="ligthbox" href="<?=$image1;?>" onerror=this.onerror=null;this.src="data:image/png;base64,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">
          <img id="img1"   width="200" height="153" src="<?=$image1;?>" onerror=this.onerror=null;this.src="data:image/png;base64,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" />
        </a>
      </div>
      <div class="slide">
        <a class="thumbnail fancybox" rel="ligthbox" href="<?=$image2;?>" onerror=this.onerror=null;this.src="data:image/png;base64,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">
          <img id="img2"   width="200" height="153" src="<?=$image2;?>" onerror=this.onerror=null;this.src="data:image/png;base64,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" />
        </a>
      </div>
      <div class="slide">
        <a class="thumbnail fancybox" rel="ligthbox" href="<?=$image3;?>" onerror=this.onerror=null;this.src="data:image/png;base64,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">
          <img id="img3"   width="200" height="153" src="<?=$image3;?>" onerror=this.onerror=null;this.src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQMAAADCCAMAAAB6zFdcAAAAeFBMVEX///8AAAD8/PyxsbH19fVmZmZwcHCcnJx+fn5YWFjm5uY1NTWKior5+fnu7u7U1NTb29sUFBTJyclMTEy5ubkbGxsPDw/FxcXp6emPj49ISEi7u7suLi54eHioqKhvb2+WlpYkJCRdXV0/Pz8yMjKhoaEnJydBQUHIxIu3AAAJHUlEQVR4nO2ba3uiPBCGkwAqKAdRxBN4qvr//+E7hwTQ6m7fL4Vt595rq0Cg5EkyM0mmSgmCIAiCIAiCIAiCIAiCIAiCIAiCIAiCIAiCIAiCIAiCIAiCIAiCIAiCIAiC8A9iYkMfxh3Tvz/dYPD/H4v8a9jaxM2x+osEDx8/A2Mm4Tn0muNr2Dl4VV5twvD6szRQKtTA2h3NtB7/qbRRgdaTH6lB4I5+sQa6tEe/VYPVXeu9b8guthpgNemc6bqBRw3QqVAR8i5x4zL4ZxzTSf5ur/NDrOW1PqZ/QaEflNARNlwvpwHUPtpsi2J/KDues9XAqGgEl9azaVGEHhym1b4ozktX48SbXIriNirdzeVoX5wuo6qqRhs6sT7ei2I6yVjofgEN/BGIkNFR2w/G2hIm6pUGmdaHzBYJVG2/VVx2527WQUytHeiWBd7uuaNZ/90ANYiSFVTVYGdtNCAJptsCfl78V2MB6l/c9OoypZrCwZa+7ahYhFWtRnvuYOBQtZ5fs3SCKnnQ9GqJz51tFihC/9YFNEipVTx8F6cBtvACuoZf01s2PGgAVxJjSmrOo6/MznkYo45eAp8xPPwEgSdqTOJUqAmI4kPJEVa97jrm3ghpGECDzPFdnAbwsquErkMT6qQp/ahBSIMZW/eg7F0nKmVtqUq5ivgBh7HKwfriNehl05gMTfgXR/QtoAY0umksOw32jfWPmg6OPGpAXYf6dU5XoVVXVMpZUWzviEqc6DSIcfP5l9rOVXeCk96gfkAjFsaE0yChirN7vFD/tTxqkFGRvOkpXqOB8rNdXY9nrAH1A7wA42aPJhLGxqgmoOtsv73Oz7AGxp9S97QaRE3TGhwmVVP6UYM1NThqwGbTaaCiatW4gUgZ/6b11f6yCXzEusv0m2v8mdC6RTRtx64GKV2mEftOA2591IB9PGsAIwsVWIXVhPsBu4HAuy7sPahBUcwLYj6QfoAvfsCGvbIG6074vOW2Y95p4NM31w+griu6PWENQISC23xLesedxw8Bp4GJoPGCmjUwJ+wUBPq1uin9JQ2w5leyCpHTwFvp6jA6pjbonHJY4ALmvnFjgX312fqFgIapsQFd1pT+kgZsTdAXXu1YSNGH0P1c5QnOUHiu8Jd1q2/AdDTAXq+tBqm2HSE6PRjuL2hgqB9wpFVYDcZOAwvefOB74tzvWYSOBoYq40IWnEKEx3oyb6yj5Y0GHb9g1A0fk+ZgEVesAUaQ+wVwnrDxwbhqutnt6mrficD6ou0H/GZWg84sZ/fQWwNrIt9rwFETsaysPZi0rnCD82l0QI6+NSD3b9sZgoTCaQAj1aM5kA7SjtkyTgPzpEETI3Es5J3I8e9QDYwPZrdOPJDS80pevNGXcd/2AN7P9+0EHurtI2St8X+U52miHlaRIQAE0JDFvp/YRWn8Zuyz7N1xlueZoWvwWAyNIvjqJ+Welyqw/DqFMskPW6R+R9mZE9TdaOMXce3MDcfNktXvosZZNoPeMv2FElDMNPXytKwhBNOj39gNOr5S4/rhEKLjHkg2C/CWq2l4XQ9jhtAPfpL4/a+i94l53OL/nZhmd0kQho1dz/hft9jbXt8Vm+eNxPdlB8L/fbl8s8S9ObM4zZcvC1RFcXw8symKgU8VrmEY5l8uHbl1hY+nFaKGoLstQUzcdtRQiXGGH3zZe6W00AClSYNXfv+zBjOMk4cM75z6Xx6woS4iNCDTr/eDwWsAr7x1G4hfwUS0LvxzNKCl4KJsp7jdS+rJYHbzOZ0GL5QLmh0Kd4vToP/V9FcYnOKfVWGXV814NnPGPt5sZiV6gKw+bO+L0dLnLCQ4HXU0gHql18P2sq2WMdc4QIORThb38Jo8aQAPO4b3beD5Q0jEsdDKam0zJBTlEdzspZzW1k2ycHPfD1wrp031vLUHRkUXV+CeOA28DZ/ZN3k+diy4ReV9OqAuEVHKRU5ZI4qtfkaNq2hv3JBI+zD4wBfHErgCjRtnjT0woMGNC9zpkWxgCjyhT7TsbDXghfbLZFQ87GD1zpH8YnyiHXcwdVtOvDLKn5OhNCYPUkwcOWrelMfzDxqo5SjHAjNXMdyfKEo/TrDGM8VbCtQPsGvhgjr2rc8GqC/MXuslNzq3FJiHE2UW7mjvwIW98NNmEnzWwOYaJgU+SrEGOel4xu5l2rFw5pQX3qKI+qnxZ0raMeTNNjJpuGNIm+Nnfu+48QYBrxE/aWDaXMuFFQUKXtgH2JHlNFi3u3eLd471uzG0ucjWaupChADjWuPyEKh+flbuvOv9tQZ4j5/lUGDaamBTN1xWmtUAhfZ2xH0ICVlITJlywfg4Ho+3lGumuGfEtHm2t3mm52ZV9LUGu8ZzNBoc+RfgSBu3/aDJzrS7j0PAPL0VjdD4g9oudBWpyJUtFtXtzVigLdoPKFA8acDzqicN5iuLfXz/hA8aHOncBgfD2hl5yr6MDJd9oQGtnh+owL3VgNLvjEJ3g5ksVgMsmvh+wvjfXttXGJwHH3dLZHe2nZ9OxhQ94iGcnhpyD4vXGoSYhkyG49JqYB2fTUtxGqQPYcFAVlXA56/cm5TW/1NQVAYuPXNBU390fW/swcUlGEUde7BKyJpiQs669Y1466bxJMOQwOzbrWCDyViVsonl1V7PObkidAk5s9caoEgBVajqaMCPxWyeUHXig5lustLigcSJuXb5mIo77MrHBgVnASbLJuxieFhl2S584xeoXrMsWy66fgHqXu+OBVW5jRMN3qurZZp7kyIcQEcwFByemj8xodiNk2/IFdhgZt1MiJY2TnTzhQ+OpSNXIKw7fsGdxECh1UCl88YAD0GDmEZ4+ycE1LBb49KQL+5sxtPCke+z4/C58xicb9d4d06TIz2JE5vOCGZUpS7Tzdipks3sT2Y2lfeyHIQGfhRFzRIahEUJHHNmDXxZN+fjbOmVuGIQRYm9iBMKs17j3WjhUs8rMf0fHocF1tEaImy4K0/4L5lM0jwPRlq+9Jb5ehA28fUrtAbbfL7A06Putcdlpj/+lufnfflFBUEQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEH49/gPHzlklf9oizQAAAAASUVORK5CYII=" />
        </a>
      </div>
      <div class="slide">
        <a class="thumbnail fancybox" rel="ligthbox" href="<?=$image4;?>" onerror=this.onerror=null;this.src="data:image/png;base64,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">
          <img id="img3"   width="200" height="153" src="<?=$image4;?>" onerror=this.onerror=null;this.src="data:image/png;base64,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" />
        </a>
      </div>
      <div class="slide">
        <a class="thumbnail fancybox" rel="ligthbox" href="<?=$image5;?>" onerror=this.onerror=null;this.src="data:image/png;base64,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">
          <img id="img3"   width="200" height="153" src="<?=$image5;?>" onerror=this.onerror=null;this.src="data:image/png;base64,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" />
        </a>
      </div>
   </section>                                             
                </div>
        </div> 
        <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-calendar"></i> Students And Staff Attendance</h3>
                    <span class="pull-right clickable"> <i class="glyphicon glyphicon-chevron-up"></i> View Details</span>
                </div>
                <div class="panel-body">                    
                   <div class="row">
						<div class="col-md-12">
							<div class="col-md-6" style="text-align:-webkit-right;">
							<a href="<?php echo base_url().'Home/get_attendance_classwise_details'; ?>" style="text-decoration: none;">
							<div class="dashboard-stat2 attendancecard" style="background-color:#64b5f68c;box-shadow:0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgb(172, 213, 250);">
							<h3 style="margin-top: 15px;font-size: 16px;color:#000">Student Attendance</h3>
							</div>
							</a>
							</div>
                        <!-- <div class="col-md-6" style="text-align:center;">
                        <a href="<?php echo base_url().'Udise_staff/emis_teacher_attendance_school'; ?>" style="text-decoration: none;">
                    <div class="dashboard-stat2 attendancecard" style="background-color:#81c7848a;box-shadow:0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgb(184, 224, 189);">
                    <h3 class="panel-title" style="margin-top: 15px;">Staff Attendance</h3>
                        </div>
                        </a>
                        </div> -->
						</div>
						<?php if(in_array($this->session->userdata('school_manage'),[1,2,4])){ ?>
						<div class="col-md-12">
							
							<div class="col-md-6">
							<div class="panel panel-success" style="height:355px;">
								<div class="panel-heading">
									<h3 class="panel-title" style="color:black;">Student-Attendance</h3>
								</div>
								<div class="panel-body">
									<!-- <h3>Task Details</h3> -->
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-12" style="text-align:center;">
												<div class="btn-group" id="allbtn">
													<a id="day" value="1" class="btn btn-default" onclick="changeclass(this);day(this,1);">Day</a>
													<a id="week" value="2" class="btn btn-default" onclick="changeclass(this);day(this,2);">Week</a>
													<a id="month" value="3" class="btn btn-default" onclick="changeclass(this);day(this,3);">Month</a>
													<a id="quartely" value="4" class="btn btn-default" onclick="changeclass(this);day(this,4);">Quaterly</a>
													
												</div>
											</div>
											<div><p></p></div>
											<div>
												<div class="col-md-12">
													<div class="table-responsive">
														<table class="table table-striped m-b-0 table-bordered">
															<thead>
																<tr>
																	<th style="text-align:center;">Student</th>
																	<th style="text-align:center;">Boys</th>
																	<th style="text-align:center;">Girls</th>
																	<th style="text-align:center;">Overall</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td style="text-align:center;">Present</td>
																	<td style="color:#00b100;text-align:center;" id="boys">-</td>
																	<td style="color:#00b100;text-align:center;" id="girls">-</td>
																	<td style="color:#00b100;text-align:center;" id="overall">-</td>
																</tr>
																<tr>
																	<td style="text-align:center;">Absent</td>
																	<td style="color:red;text-align:center;" id="boysab">-</td>
																	<td style="color:red;text-align:center;" id="girlsab">-</td>
																	<td style="color:red;text-align:center;" id="overallab">-</td>
																</tr>
																
															</tbody>
														</table>
													</div>
												</div>
												<div class="col-md-12">
													<table width="300" >
														
															<tr>
																<td colspan="3" style="text-align:center;"><strong>Top 5</strong></td>
																<td colspan="3" style="text-align:center;"><strong>Bottom 5</strong></td>
															</tr>
														<tbody id="studentpercentage">
															<tr>
																<td colspan="2" style="text-align:center;">-</td>
																<td style="text-align:center;"><strong></strong>-</td>
																<td colspan="2" style="text-align:center;">-</td>
																<td style="text-align:center;"><strong></strong>-</td>
															</tr>
															
														</tbody>
														
													</table>
													
												</div>
												
											</div>
											
										</div>
									</div>
								</div>
							</div>
							<p style="float:right;bottom:30px;position:absolute;right:27px;"><a href="<?php echo base_url().'Attendance/studentlist';?>">More -></a></p>
						</div>
						
						
						
						
						<div class="col-md-6">
							<div class="panel panel-success" style="height:355px;">
								<div class="panel-heading">
									
									<h3 class="panel-title" style="color:black;">Staff-Attendance</h3>
								</div>
								<div class="panel-body">
									<!-- <h3>Task Details</h3> -->
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-12" style="text-align:center;">
												<div class="btn-group" id="allbtn">
													<a id="staffday" value="1" class="btn btn-default" onclick="changeclass(this);staffdaylist(this,1);">Day</a>
													<a id="staffweek" value="2" class="btn btn-default" onclick="changeclass(this);staffdaylist(this,2);">Week</a>
													<a id="staffmonth" value="3" class="btn btn-default" onclick="changeclass(this);staffdaylist(this,3);">Month</a>
													<a id="staffquartely" value="4" class="btn btn-default" onclick="changeclass(this);staffdaylist(this,4);">Quaterly</a>
												</div>
											</div>
											<div><p></p></div>
											<div>
												
												<div class="col-md-12">
													<div class="table-responsive">
														<table  class="table table-striped m-b-0 table-bordered">
															<thead>
																<tr>
																	<th style="text-align:center;">Teaching</th>
																	<th style="text-align:center;">Non Teaching</th>
																	<th style="text-align:center;">Overall</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td style="color:#00b100;text-align:center;" id="teach">-</td>
																	<td style="color:#00b100;text-align:center;" id="nonteach">-</td>
																	<td style="color:#00b100;text-align:center;" id="totoverall">-</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												
												<div><p></p></div>
												<div class="col-md-12">
													<table width="300">
															<tr>
																<td colspan="3" style="text-align:center;"><strong>Top 5</strong></td>
																<td colspan="3" style="text-align:center;"><strong>Bottom 5</strong></td>
															</tr>
														<tbody  id="staffpersonlist">
															<tr>
																<td colspan="2" style="text-align:center;">-</td>
																<td style="text-align:center;"><strong>-</strong></td>
																<td colspan="2" style="text-align:center;">-</td>
																<td style="text-align:center;"><strong>-</strong></td>
															</tr>
														</tbody>
														<tfoot>
															<tr><td colspan="4"></td></tr>
														</tfoot>
													</table>
												</div>
												
											</div>
										</div>
										
									</div>
									
								</div>
								<p style="float:right;bottom:30px;position:absolute;right:27px;"><a href="<?php echo base_url().'Attendance/staffwise'; ?>">More -></a></p>
							</div>
							
						</div>
							
							
					</div>
					<?php } ?>
                  </div>   
                </div>
        </div>
		
		
		
		<div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title" style="color: #000;"><i class="fa fa-cog"></i> Facilities List</h3>
                <span class="pull-right clickable"> <i class="glyphicon glyphicon-chevron-up"></i> View Details</span>
            </div>
            <div class="panel-body">                    
                <div class="row">
					<div class="col-md-12">
						<div class="col-lg-6">
							<div class="panel panel-success" style="height:355px;">
								<div class="panel-heading">
									<h3 class="panel-title" style="color:black;">Facilities</h3>
								</div>
								<div class="panel-body">
									<!-- <h3>Task Details</h3> -->
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-12" style="text-align:center;">
												<div class="btn-group" id="allbtn">
													<a id="functionalday" value="1" class="btn btn-default" onclick="changeclass(this);facilities(this,1);">Functional</a>
													<a id="nonfunctionalday" value="2" class="btn btn-default" onclick="changeclass(this);facilities(this,2);">Non-Functional</a>
												</div>
											</div>
											<div><p></p></div>
											<div>
												<div class="col-md-12">
													<div class="table-responsive">
														<p></p>
													</div>
												</div>
												<div class="col-md-12">
													<table class="table">
														<thead>
															<tr>
																<td colspan="3" style="text-align:center;"><strong>Facilities List</strong></td>
																<td colspan="3" ><strong>Facilities List</strong></td>
															</tr>
														</thead>
														<tbody id="facilitieslist">	
															<tr>
																<td colspan="2" > - </td>
																<td ><strong>-</strong></td>
																<td colspan="2" id=""> - </td>
																<td ><strong>-</strong></td>
															</tr>
														</tbody>
														
													</table>
												</div>
											</div>
										</div>
										<p style="float:right;padding:0px 20px;"><a href="<?php echo base_url().'Attendance/facilities' ?>">More -></a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				
				
			</div>
		</div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		


        <!--<div class="panel panel-success">
                <div class="panel-heading">
                  
                  <?php foreach ($school_total_requirements as $school_key => $school_value) {?>
                    
                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-calendar"></i> CSR DASHBOARD</h3>
                    <span class="pull-right clickable"> <i class="glyphicon glyphicon-chevron-up"></i> View Details</span>
                </div>
                <div class="panel-body">                    
                   <div class="row">
                    <div class="col-md-6" style="text-align:-webkit-right;">
                    <a href="<?php echo base_url("Home/get_school_contribution_details") ?>" style="text-decoration: none;">
                    <div class="dashboard-stat2 attendancecard" style="background-color:#64b5f68c;box-shadow:0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgb(172, 213, 250);">
                          <h3 style="margin-top: 15px;margin-bottom: 25px;font-size: 16px;color:#000;display: inline">Total School Requirements<div style="color:white;font-size:15px;padding-top: 10px"><span  class="badge" style="background-color:white;font-size:15px"> <?php $need = number_format($school_value->req_amount)."<br>";?>
                                                                   <?php echo 'Rs.'.$need; ?></span></div></h3>
                      
                        </div><?php }?>
                        </a>
                        </div>
                        <div class="col-md-6" style="text-align:center;">
                        <a href="<?php echo base_url("Home/school_wise_contributers")?>" style="text-decoration: none;">
                    <div class="dashboard-stat2 attendancecard" style="background-color:#81c7848a;box-shadow:0 15px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgb(184, 224, 189);">
       <h3 style="margin-top: 15px;margin-bottom: 25px;font-size: 16px;color:#000;display: inline">Total Received Contributions<div style="color:white;font-size:8px;padding-top: 10px"><span  style="background-color:white" class="badge"> <?php foreach ($total_school as $key => $value) {?>
      
       <?php $need = number_format($value->received_amt)."<br>";?>
                                                                   <?php echo 'Rs.'.$need; ?><?php }?></span></div></h3>
                      
                        </div>
                        </a>
                        </div>
                        
                  </div>
                                                
                </div>
        </div> -->


        <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-calendar"></i> Time Table</h3>
                    <span class="pull-right clickable"> <i class="glyphicon glyphicon-chevron-up"></i> View Details</span>
                </div>
                <div class="panel-body">                    
                   <div class="row">
                    <div class="col-md-offset-1 col-md-2" style="text-align:center;">
                    <a href="<?php echo base_url().'TimetableController/viewWeeklyTimeTable'; ?>" style="text-decoration: none;">
                    <div class="dashboard-stat2 timetablecard" style="background-color:#64b5f68c;box-shadow:0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgb(172, 213, 250);">
                          <h3 class="panel-title" style="margin-top: 15px;">Class-wise</h3>
                        </div>
                        </a>
                        </div>
                        <div class="col-md-offset-2 col-md-2" style="text-align:center;">
                        <a href="<?php echo base_url().'TimetableController/loadTeacherTimeTable'; ?>" style="text-decoration: none;">
                    <div class="dashboard-stat2 timetablecard" style="background-color:#81c7848a;box-shadow:0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgb(184, 224, 189);">
                    <h3 class="panel-title" style="margin-top: 15px;">Teacher-wise</h3>
                        </div>
                        </a>
                        </div>
                        <div class="col-md-offset-2 col-md-2" style="text-align:center;">
                        <a href="<?php echo base_url().'TimetableController/todaytimetable'; ?>" style="text-decoration: none;">
                    <div class="dashboard-stat2 timetablecard" style="background-color:#e24d4d94;box-shadow:0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgb(235, 143, 150);">
                    <h3 class="panel-title" style="margin-top: 15px;">Today's</h3>
                        </div>
                        </a>
                        </div>
                  </div>
                                                
                </div>
        </div>
        
    <!--- Second Panel -->
    <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">Student & Staff Details</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> View Details</span>
                </div>
                <div class="panel-body close-body">
                    <div class="col-lg-6 col-md-12 ">
                        <?php $total_arr = [];
                              $total_att = [];
                        ?>
                                                <table class="table table-bordered center">
    <thead>
         <tr>
            <th colspan="7" class="tablecolor"><center>Student Details <?=date('d-m-Y');?></center></th>
            
        </tr>
      <tr >
        <th class="header-size">Class</th>
        <th class="header-size">Boys</th>
        <!-- <th class="header-size">Boys P</th> -->

        <th class="header-size">Girls</th>
        <!-- <th class="header-size">Girls P</th> -->
        
        <th class="header-size">Total</th>
        <!-- <th class="header-size ">Total P</th> -->

      </tr>
    </thead>
    <tbody>
      <?php if(!empty($students_classwise_count) && $class_level['low_class'] !=0 && $class_level['high_class'] !=0){
        // print_r($student_attendance);
        // echo $class_level['high_class'];
        if($class_level['high_class'] ==13)
        {
          $high_class = 14;
        }else
        {
          $high_class = $class_level['high_class'];
        }
        // echo $class_level['low_class'];
          $class_roma = array
                                                            ('I'=>1,'II'=>'2','III'=>'3','IV'=>'4','V'=>'5','VI'=>'6','VII'=>'7','VIII'=>'8','IX'=>'9','X'=>'10','XI'=>'11','XII'=>'12','LKG'=>'13','UKG'=>'14','PreKG'=>'15');
                                                    for($i=$class_level['low_class'];$i<=$high_class;$i++){
                                                            $class_roman_name = array_search($i,$class_roma);
                                                            // echo $class_roman_name;
        
        
            if($i==13)
            {
              $class_get_b = 'lkg_b';
              $class_get_g = 'lkg_g';
              // $class_att_b = $student_attendance[$class_get_b]['male_present'];
              // $class_att_g = $student_attendance[$class_get_g]['female_present'];


            }else if($i==14)
            {
              $class_get_b = 'ukg_b';
              $class_get_g = 'ukg_g';
              // $class_att_b = $student_attendance[$class_get_b]['male_present'];
              // $class_att_g = $student_attendance[$class_get_g]['female_present'];


            }else if($i==15)
            {
              $class_get_b = 'Prkg_b';
              $class_get_g = 'Prkg_g';
              // $class_att_b = $student_attendance[$class_get_b]['male_present'];
              // $class_att_g = $student_attendance[$class_get_g]['female_present'];

            }else{                             
      $class_get_b = 'c'.$i.'_b';
      $class_get_g = 'c'.$i.'_g';
              //       $class_att_b = $student_attendance[$i]['male_present'];
              // $class_att_g = $student_attendance[$i]['female_present'];

    }

// echo $students_classwise_count->$class_get;
        if($i == 13 || $i == 14 || $i ==15){?>
      

        <tr>
        <td ><a href="<?php echo base_url().'Home/emis_school_student_classwise/'.$i;?>"><?=$class_roman_name;?></a></td>
        
       <td><?=$students_classwise_count->$class_get_b;?></td>

        
       <!-- <td ><?=$class_att_b;?></td> -->
       <td><?=$students_classwise_count->$class_get_g;?></td>
       <!-- <td><?=$class_att_g;?></td> -->
       <td><?php 
              $total_class = ($students_classwise_count->$class_get_b + $students_classwise_count->$class_get_g);
                  array_push($total_arr, $total_class);
                  echo $total_class;
              ?>
       </td>
       <!-- <td><?php 
              $total_present = ($class_att_b + $class_att_g);
                  array_push($total_att, $total_present);
                  echo $total_present;
              ?></td> -->
      

      </tr>
      
        <?php } }
for($i=$class_level['low_class'];$i<=$high_class;$i++){
                                                            $class_roman_name = array_search($i,$class_roma);
                                                            // echo $class_roman_name;
        
        
            if($i==13)
            {
              $class_get_b = 'lkg_b';
              $class_get_g = 'lkg_g';
              // $class_att_b = $student_attendance[$class_get_b]['male_present'];
              // $class_att_g = $student_attendance[$class_get_g]['female_present'];


            }else if($i==14)
            {
              $class_get_b = 'ukg_b';
              $class_get_g = 'ukg_g';
              // $class_att_b = $student_attendance[$class_get_b]['male_present'];
              // $class_att_g = $student_attendance[$class_get_g]['female_present'];


            }else if($i==15)
            {
              $class_get_b = 'Prkg_b';
              $class_get_g = 'Prkg_g';
              // $class_att_b = $student_attendance[$class_get_b]['male_present'];
              // $class_att_g = $student_attendance[$class_get_g]['female_present'];

            }else{                             
      $class_get_b = 'c'.$i.'_b';
      $class_get_g = 'c'.$i.'_g';
              //       $class_att_b = $student_attendance[$i]['male_present'];
              // $class_att_g = $student_attendance[$i]['female_present'];

    }
        if($i !=13 && $i != 14 && $i !=15){ ?>
        <tr>
        <td ><a href="<?php echo base_url().'Home/emis_school_student_classwise/'.$i;?>"><?=$class_roman_name;?></a></td>
        
       <td><?=$students_classwise_count->$class_get_b;?></td>

        
       <!-- <td><?=$class_att_b;?></td> -->
       <td><?=$students_classwise_count->$class_get_g;?></td>
       <!-- <td><?=$class_att_g;?></td> -->
       <td><?php 
              $total_class = ($students_classwise_count->$class_get_b + $students_classwise_count->$class_get_g);
                  array_push($total_arr, $total_class);
                  echo $total_class;
              ?>
       </td>
       <!-- <td><?php 
              $total_present = ($class_att_b + $class_att_g);
                  array_push($total_att, $total_present);
                  echo $total_present;
              ?></td> -->
      

      </tr>
      <?php } } ?>
    </tbody>

        <tfoot>
      <tr>
        <th colspan="3">Total</th>
        <!-- <th></th>
        <th>0</th>
        <th>0</th>
        <th>0</th>
        <th></th>  -->
        <th class="center"><?=array_sum($total_arr);?></th>
        <!-- <th class="center"><?=array_sum($total_att);?></th> -->
        
      </tr>
    </tfoot>
      <?php }?>

    
        
    
  </table>   
                                                   
                                                </div>

                                                <!-- <div class="col-lg-3 col-md-12 "> -->
                                                <!-- <table class="table table-bordered">
    <thead>
         <tr>
            <th colspan="4" class="tablecolor"><center>Student Attendance Details</center></th>
            
        </tr>
      <tr class="header-size">
        <th class="header-size">Class</th>
        <th class="header-size">Boys</th>
        <th class="header-size">Girls</th>
        <th class="header-size">Total</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><a href="#">I</a></td>
        <td>14</td>
        <td>25</td>
        <td>39</td>

      </tr>
      <tr>
        <td><a href="#">II</a></td>
        <td>14</td>
        <td>25</td>
        <td>39</td>

      </tr>
      <tr>
        <td><a href="#">III</a></td>
        <td>14</td>
        <td>25</td>
        <td>39</td>

      </tr>
      <tr>
        <td><a href="#">VI</a></td>
        <td>14</td>
        <td>25</td>
        <td>39</td>

      </tr>
      <tr>
        <td><a href="#">V</a></td>
        <td >14</td>
        <td>25</td>
        <td>39</td>

      </tr>
      <tr>
        <th colspan="3">Total</th>
        <th>495</th>
      </tr>
    </tbody>
     
  </table>    -->
                                                   
                                                <!-- </div> -->
                                                <div class="col-lg-6 col-md-12">
                                                <table class="table table-bordered center">
    <thead>
         <tr>
            <th colspan="7" class="tablecolor "><center>Staff Details</center></th>
            
        </tr>
      <tr >
        <th class="header-size">Class</th>
        <th class="header-size center">Male</th>
       

        <th class="header-size center">Female</th>
        

        <th class="header-size center">Total</th>
        

      </tr>
    </thead>
    <tbody>
      <?php 
         if(!empty($staff_details))
         {
            $total = 0;
            
             // echo $male['non_tech_male'];
            // foreach ($staff_details as  $staff_detail) {
                // print_r($staff_detail);
                ?>
            
        <tr>
          <td><a href="<?=base_url().'Udise_staff/emis_school_staff3'?>">BT</a></td>
          <td><?=$staff_details->teach_bt_mle;?></td>
        
          <td><?=$staff_details->teach_bt_fmle;?></td>
          
          <td><?=($staff_details->teach_bt_mle+$staff_details->teach_bt_fmle);?></td>
          
          
        </tr>
        
      <?php 
      $total += $staff_details->teach_bt_mle+$staff_details->teach_bt_fmle;
    ?>
    <tr>
          <td><a href="<?=base_url().'Udise_staff/emis_school_staff3'?>">HM</a></td>
          <td><?=$staff_details->teach_hm_mle;?></td>
        
          <td><?=$staff_details->teach_hm_fmle;?></td>
          
          <td><?=($staff_details->teach_hm_mle+$staff_details->teach_hm_fmle);?></td>
          
          
        </tr>
        
      <?php 
      $total += $staff_details->teach_hm_mle+$staff_details->teach_hm_fmle;
    ?>
    <tr>
          <td><a href="<?=base_url().'Udise_staff/emis_school_staff3'?>">Non-Teach</a></td>
          <td><?=$staff_details->nonteach_mle;?></td>
        
          <td><?=$staff_details->nonteach_fmle;?></td>
          
          <td><?=($staff_details->nonteach_mle+$staff_details->nonteach_fmle);?></td>
          
          
        </tr>
        
      <?php 
      $total += $staff_details->nonteach_mle+$staff_details->nonteach_fmle;
    ?>
    <tr>
          <td><a href="<?=base_url().'Udise_staff/emis_school_staff3'?>">Others</a></td>
          <td><?=$staff_details->teach_othr_mle;?></td>
        
          <td><?=$staff_details->teach_othr_fmle;?></td>
          
          <td><?=($staff_details->teach_othr_mle+$staff_details->teach_othr_fmle);?></td>
          
          
        </tr>
        
      <?php 
      $total += $staff_details->teach_othr_mle+$staff_details->teach_othr_fmle;
    ?>
    <tr>
          <td><a href="<?=base_url().'Udise_staff/emis_school_staff3'?>">SG</a></td>
          <td><?=$staff_details->teach_sg_mle;?></td>
        
          <td><?=$staff_details->teach_sg_fmle;?></td>
          
          <td><?=($staff_details->teach_sg_mle+$staff_details->teach_sg_fmle);?></td>
          
          
        </tr>
        
      <?php 
      $total += $staff_details->teach_sg_mle+$staff_details->teach_sg_fmle;
    ?>
    <tr>
          <td><a href="<?=base_url().'Udise_staff/emis_school_staff3'?>">PG</a></td>
          <td><?=$staff_details->teach_pg_mle;?></td>
        
          <td><?=$staff_details->teach_pg_fmle;?></td>
          
          <td><?=($staff_details->teach_pg_mle+$staff_details->teach_pg_fmle);?></td>
          
          
        </tr>
        
      <?php 
      $total += $staff_details->teach_pg_mle+$staff_details->teach_pg_fmle;
    ?>
        
                <tr>
                    <th colspan="3"class="center">Total</th>
                    <!-- <th class="center">0</th> -->
                    <th class="center"><?=$total?></th>
                </tr>
            <?php }
            ?>
    </tbody>
    
  </table>   
                                                   
                                                </div>
                                               
                                                   
                                                
                </div>

        </div>
        <!---!>


        <!--- End Second -->
        <!-- Start Third Panel -->
        <!--<div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">Time Table</h3>
                    <span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-up"></i> View Details</span>
                </div>
                <div class="panel-body close-body">
                  
                    <div class="row">
                      
                                       
                                       <div class="col-md-12">         
                                                <?php 
                                                if($class_level['low_class'] !=0 && $class_level['high_class'] !=0){

                                                  if($class_level['high_class'] ==13)
        {
          $high_class = 14;
        }else
        {
          $high_class = $class_level['high_class'];
        }
                        $class_roma = array
                                                            ('I'=>1,'II'=>'2','III'=>'3','IV'=>'4','V'=>'5','VI'=>'6','VII'=>'7','VIII'=>'8','IX'=>'9','X'=>'10','XI'=>'11','XII'=>'12','LKG'=>'13','UKG'=>'14','PrKG'=>'15');
                                                    for($i=$class_level['low_class'];$i<=$high_class;$i++){
                                                                   
                                                                    $class_roman_name = array_search($i,$class_roma);
                      ?>   
                                                <button style="padding-left:8px;"type="button" class="btn btn-success btn-circle btn-lgs"><?=$class_roman_name;?></button>&nbsp;
                                                
                                                <?php  } }?>
                                                <br/><br/>
                                                </div>

                                                <div class="col-md-offset-4 col-md-7">
                                                <button type="button" class="btn btn-outline-primary btn btn-success btn-lg">Teacher</button>&nbsp;&nbsp;
                                                <button type="button" class="btn btn-outline-primary btn btn-success btn-lg">Substitution</button>
                                                
                                                </div>
                                                </div>

                </div>
        </div>
        <!-- End third Panel -->
    </div>
                                       
                                           <div class="col-lg-3 col-md-4">
                                            <div class="row">
        
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Attendance Details</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Details..</span>
                </div>
                <div class="panel-body">

                                                  
                                                    <div class="row">
                                                    
                                                        <div class="col-md-9">
                                                            <small style="color:blue;">Boys Absent</small>
                                                    </div>
                                                    <div class="col-md-3">
                                                            :<small style="color:red;"> &nbsp;&nbsp;<?=$attendance_details->ma_present;?></small>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <small style="color:deeppink;">Girls  Absent</small>
                                                    </div>
                                                    <div class="col-md-3">
                                                            :<small style="color:red;"> &nbsp;&nbsp;<?=$attendance_details->fe_present;?></small>
                                                        </div>
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
                                                       <!--  <hr/>
                                                        <div class="row">
                                                          <?php $teacher_absent = array_filter($teacher_attendance,function($att)
                                                          {
                                                              if($att->present==0)
                                                              {
                                                                  return $att;
                                                              }
                                                          });
                                                          
                                                          ?>
                                                          <div class="col-md-9">
                                                            <small style="">Staff  Absent</small>
                                                    </div>

                                                    <div class="col-md-3">
                                                            :<a href="#" data-toggle="modal" data-target="#staff_absent"><small > &nbsp;&nbsp;<?=sizeof($teacher_absent);?></small></a>
                                                        </div>
                                                        </div> -->
                                              </div>
                                            </div>
                                        </div>


                                        <!------Added Attendance ----->
        <div class="row">
        
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Messages &nbsp<span style="margin-top:-5px;background-color:yellow;"class="badge">

                      <?=(!empty($flash_data)?sizeof($flash_data):'0');?></span></h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Details..</span>
                </div>
                <div class="panel-body">
                                                  
                                                    <div class="row">
                                                      

                                                          <marquee behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start();" scrollamount="2" style="height: 100px">
                                                            <?php if(!empty($flash_data)){
                                                        foreach($flash_data as $news){
                                                        ?>
<a href="javascript:void(0);" onclick="show_data('<?=$news->id;?>');" style="text-align: center;"><h4><?=$news->title?> <h4> 
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
                                         <!-- First Panel End -->

										<div class="row">
        
											<div class="panel panel-success">
												<div class="panel-heading">
													<h3 class="panel-title">To do List</h3>
														<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Details..</span>
										
												</div>
												<div class="panel-body">
													<?php if(!empty($student_invalid_aadhar_no)){
														foreach($student_invalid_aadhar_no as $field){
													?> 
													<div class="row">
														<div class="col-md-9">
															<small style="color:red;">Invalid Aadhar - Students</small>
														</div>
														<div class="col-md-3">:<a href="<?=base_url().'Home/student_invalid_aadhar_no';?>"><small> 
														<?php if($field->cnt!=null){echo $field->cnt;}else{echo 0;}?></small></a>
														</div>
													</div>
													<?php } } ?>
													<?php if(!empty($student_invalid_phn_no)){
														foreach($student_invalid_phn_no as $field){
													?> 
													<div class="row">
														<div class="col-md-9">
															<small style="color:red;">Invalid Phone Number-Students</small>
														</div>
														<div class="col-md-3">:<a href="<?=base_url().'Home/student_invalid_phn_no_list';?>"><small> 
														<?php if($field->cnt!=null){ echo $field->cnt;}else{echo 0;}?></small></a>
														</div>
														
													</div>
													<?php } } ?>
												</div>
											</div>
										</div>
										<!-- Second Panel Start -->
                                         
                                        <div class="row">
        
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Other Links</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Details..</span>
                </div>
                <div class="panel-body">
                                                    <!-- <h3>Task Details</h3> -->
                                                    <div class="row">
                                                   
                                                <div class="col-md-offset-1 col-md-12">
                                                <button type="button" class="btn btn-outline-primary btn btn-success btn-md btn-block"> <a href="<?=base_url().'Basic/stationery_indent';?>" style="
    color: white;
    text-decoration: none;
"><i class="fa fa-bicycle fa-stack-1x" ></i> Schemes</a></button>
                                               <?php $school_manage = $this->session->userdata('school_manage');
                                                if($school_manage !=1 && $school_manage !=5){  ?>
                                                <button type="button" class="btn btn-outline-primary btn btn-success btn-md btn-block"><a href="<?=base_url().'Home/get_RTI_students_list'?>" style="
    color: white;
    text-decoration: none;
"> <i class="fa fa-stack-exchange fa-stack-1x"></i> RTE <span class="badge"><?=(!empty($RTE_count1))?sizeof($RTE_count1):'0';?></span></a></button>
                                                  <?php } ?>
                                              <!--  <button type="button" class="btn btn-outline-primary btn btn-success btn-md btn-block">
                                                   <i class="fa-stack-1x">&#8377</i> Scholarship</button>
                                                 
                                                <button type="button" class="btn btn-outline-primary btn btn-success btn-md btn-block"><i class="fa fa-calendar-check-o fa-stack-1x"></i> &nbsp;&nbsp;&nbsp;School Calendar</button>
                                                <button type="button" class="btn btn-outline-primary btn btn-success btn-md btn-block">
                                                  <i class="fa fa-bookmark fa-stack-1x"></i> Certificate</button>
                                                <button type="button" class="btn btn-outline-primary btn btn-success btn-md btn-block"><i class="fa fa-calendar fa-stack-1x"></i> &nbsp;&nbsp;Exam TimeTable</button>
                                                <button type="button" class="btn btn-outline-primary btn btn-success btn-md btn-block"> <i class="fa fa-gavel fa-stack-1x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Government Orders</button>
                                                <button type="button" class="btn btn-outline-primary btn btn-success btn-md btn-block"><i class="fa fa-user-plus fa-stack-1x"></i> Registers</button>
                                                <button type="button" class="btn btn-outline-primary btn btn-success btn-md btn-block"> 
                                                  <a href="<?=base_url().'Home/emis_school_transferrequest'?>" style="
    color: white;
    text-decoration: none;
"><i class="fa fa-clock-o fa-stack-1x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pending Students<span class="badge"><?=(!empty($request_count)?$request_count->count:'0');?></span></a></button>-->
                                               
                                                
                                                      </div>
                                                    
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Second Pannel End -->
                                        <!-- Thrid Panel Start -->
                                        <div class="row">
        
            <div class="panel panel-success">
               <!-- <div class="panel-heading">
                    <h3 class="panel-title">Performance Indicator</h3>
                    <span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-up"></i> Details..</span>
                </div>
                <div class="panel-body close-body">
                                                    <!-- <h3>Task Details</h3> 
                                                    <div class="row">
                                                    <div class="col-md-9">
                                                            <small>Assessments</small>
                                                    </div>
                                                    <div class="col-md-3">
                                                            <small>: &nbsp;&nbsp;SSA</small>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <small>Pass Percentage</small>
                                                    </div>
                                                    <div class="col-md-3">
                                                            <small>: &nbsp;&nbsp;45</small>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <small>Term End Exams</small>
                                                    </div>
                                                    <div class="col-md-3">
                                                            <small>: &nbsp;&nbsp;45</small>
                                                        </div>
                                                          <div class="col-md-9">
                                                            <small>NAS</small>
                                                    </div>
                                                    <div class="col-md-3">
                                                            <small>: &nbsp;&nbsp;12</small>
                                                        </div>
                                                        </div>
                                                </div> -->
                                            </div>
                                        </div>
                                        <!-- Thrid Panel End -->
                                        <!-- Fourth Panel Start -->
                                        <div class="row">
        
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Community Wise</h3>
                    <span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-up"></i> Details..</span>
                </div>
                <div class="panel-body close-body">
                                                    <!-- <h3>Task Details</h3> -->
                                                    <div class="row" style="padding-bottom: 3px;">
                                                  
                                                <div class="col-md-offset-1 col-md-5">
                                                  
                                                    
                                                  
                                                <button type="button" class="btn btn-success custom"><b>BC&nbsp;<span class="badge"><?=$student_castwise->bc;?></span></b></button>
                                                </div>
                                                <div class="col-md-offset-1 col-md-5">
                                                    <button type="button" class="btn btn-success custom"><b>MBC&nbsp;<span class="badge"><?=$student_castwise->mbc;?></span></b></button>
                                                  </div>
                                                <div class="col-md-offset-1 col-md-5">

                                                    <button type="button" class="btn btn-success custom"><b>ST&nbsp;<span class="badge"><?=$student_castwise->st;?></span></b></button>
                                                  </div>
                                                <div class="col-md-offset-1 col-md-5">

                                                    <button type="button" class="btn btn-success custom"><b>SC&nbsp;<span class="badge"><?=$student_castwise->sc;?></span></b></button>
                                                  </div>
                                                <div class="col-md-offset-1 col-md-5">

                                                    <button type="button" class="btn btn-success custom"><b>OC&nbsp;<span class="badge"><?=$student_castwise->oc;?></span></b></button>
                                                  </div>
                                                <div class="col-md-offset-1 col-md-5">

                                                    <button type="button" class="btn btn-success custom"><b>DNC&nbsp;<span class="badge"><?=$student_castwise->dnc;?></span></b></button>
                                                      </div>
                                                     
                                                      
                                                      
                                                    
                                                        </div>
                                                        <br/>  
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fourth Panel End -->
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
<script src="<?php echo base_url().'/asset/global/plugins/fancybox/source/jquery.fancybox.js';?>" type="text/javascript"></script>

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

window.onload=function(){
		//schemelist();
		document.getElementById('functionalday').onclick();
		document.getElementById('day').onclick();
		document.getElementById('staffday').onclick();
		//document.getElementById('timetableday').onclick();
		//document.getElementById('performanceday').onclick();
		//document.getElementById('tntpday').onclick();
};

function changeclass(node){
	var pnode = node.parentNode;
	//alert(pnode);
	for(var i=0;i<pnode.children.length;i++){
		pnode.children[i].className='btn btn-default';
	}
	node.className='btn btn-primary';
}

function day(node,segment){
		$.ajax({
			type: "POST",
			url:baseurl+'AttendanceApi/daylist/'+segment,
			success: function(resp) {
				var output = JSON.parse(resp);
				
				document.getElementById('boys').innerHTML=(output['overall'][0]['malepre']!=null?output['overall'][0]['malepre']:0)+'%';
				document.getElementById('girls').innerHTML=(output['overall'][0]['femalepre']!=null?output['overall'][0]['femalepre']:0)+'%';
				document.getElementById('overall').innerHTML=((parseFloat(output['overall'][0]['malepre']!=null?output['overall'][0]['malepre']:'0.00')+parseFloat(output['overall'][0]['femalepre']!=null?output['overall'][0]['femalepre']:'0.00'))).toFixed(2)+'%';
				
				document.getElementById('boysab').innerHTML=(output['overall'][0]['maleab']!=null?output['overall'][0]['maleab']:0)+'%';
				document.getElementById('girlsab').innerHTML=(output['overall'][0]['femaleab']!=null?output['overall'][0]['femaleab']:0)+'%';
				document.getElementById('overallab').innerHTML=
				((parseFloat(output['overall'][0]['maleab']!=null?output['overall'][0]['maleab']:'0.00')+parseFloat(output['overall'][0]['femaleab']!=null?output['overall'][0]['femaleab']:'0.00'))).toFixed(2)+'%';
				
				
				var table = '';
				var classwise= output['overallclasswise'];
				//alert(JSON.stringify(classwise));
				//alert(classwise[0]['st_class']+'  '+classwise[0]['st_section']);
				var len=new Array(); 
				for(var i=0;i<(classwise.length/2);i++){
					len[i]=classwise[i];
					len[(classwise.length-1)-i]=classwise[classwise.length-(i+1)];
				}
				for(var i=0; i<((classwise.length/2)>5?5:(classwise.length/2));i++){
					table+='<tr><td colspan="2">Class: '+len[i]['st_class']+'-'+len[i]['st_section']+'</td><td><strong style="color:green;">'+len[i]['clspre']+'%</strong></td><td>Class: '+len[(classwise.length-1)-i]['st_class']+'-'+len[(classwise.length-1)-i]['st_section']+'</td><td><strong style="color:red;">'+len[(classwise.length-1)-i]['clsab']+'%</strong></td></tr>';
				}
				document.getElementById('studentpercentage').innerHTML=table;
			},
				error: function(e){ 
				alert('Error: ' + e.responseText);
				return false;  
			}
		});
	}
	
	
	function facilities(node,segment){
		//alert(segment);
		$.ajax({
			type: "POST",
			url:baseurl+'AttendanceApi/facilities/'+segment,
			success:function(resp){
				var output = JSON.parse(resp);
				var table ="";
				var sum = 0;
				var facilities = output['facilities'];
				//alert(facilities[0]['drinkingwater']);
				if(segment==1){
					for(var i in facilities){
						table+='<tr><td colspan="2">Drinking Water  </td><td style="color:green;">' + facilities[i]['drinkingwater']+'</td><td colspan="2">Incinerator  </td><td style="color:green;">' + facilities[i]['incinerator']+'</td></tr><tr><td colspan="2">Gents Toilet  </td><td style="color:green;">' + facilities[i]['staffgentstoil']+'</td><td colspan="2">Ladies Toilet  </td><td style="color:green;">' + facilities[i]['staffladiestoil']+'</td></tr><tr><td colspan="2">Boys Toilet  </td><td style="color:green;">' + facilities[i]['usetoilboys']+'</td><td colspan="2">Girls Toilet  </td><td style="color:green;">' + facilities[i]['usetoilgirls']+'</td></tr><tr><td colspan="2">Boys Urinals  </td><td style="color:green;">' + facilities[i]['urinalinuseboys']+'</td><td colspan="2">Girls Urinals  </td><td style="color:green;">' + facilities[i]['urinalinusegirls']+'</td></tr>';
					}
				}else if(segment==2){
					for(var i in facilities){
						table+='<tr><td colspan="2">Toilet Boys<strong>(Not in use)</strong> - </td><td style="color:red;">' + facilities[i]['toilnotuseboys']+'</td><td colspan="2">Toilet Girls<strong>(Not in use)</strong> - </td><td style="color:red;">' + facilities[i]['toilnotusegirls']+'</td></tr><tr><td colspan="2">Urinal Boys<strong>(Not in use)</strong> - </td><td style="color:red;">' + facilities[i]['urinalnotinuseboys']+'</td><td colspan="2">Urinal Girls<strong>(Not in use)</strong> - </td><td style="color:red;">' + facilities[i]['urinalnotinusegirls']+'</td></tr>';
					}
				}
				document.getElementById('facilitieslist').innerHTML=table;
			},error: function(e){
				alert('Error:'+e.reponseText);
				return false;
			}
		});
	}
	
	
	function staffdaylist(node,segment){
		$.ajax({
			type: "POST",
			url:baseurl+'AttendanceApi/stafflist/'+segment,
			success: function(resp) {
				var output = JSON.parse(resp);
				
				if(segment==1){
					document.getElementById('teach').innerHTML=(output['staffoverall'][0]['day_teachabper']!=null?output['staffoverall'][0]['day_teachabper']:0)+'%';
					document.getElementById('nonteach').innerHTML=(output['staffoverall'][0]['day_nontabper']!=null?output['staffoverall'][0]['day_nontabper']:0)+'%';
					document.getElementById('totoverall').innerHTML=(output['staffoverall'][0]['day_overall']!=null?output['staffoverall'][0]['day_overall']:0)+'%';
				}else if(segment==2){
					document.getElementById('teach').innerHTML=(output['staffoverall'][0]['weekly_teach_per']!=null?output['staffoverall'][0]['weekly_teach_per']:0)+'%';
					document.getElementById('nonteach').innerHTML=(output['staffoverall'][0]['weekly_nonteach_per']!=null?output['staffoverall'][0]['weekly_nonteach_per']:0)+'%';
					document.getElementById('totoverall').innerHTML=(output['staffoverall'][0]['weekly_overall']!=null?output['staffoverall'][0]['weekly_overall']:0)+'%';					//document.getElementById('totoverall').innerHTML=((parseFloat(output['staffoverall'][0]['teachingpre'])+parseFloat(output['staffoverall'][0]['nteachingpre']))/2).toFixed(2)+'%';
				}else if(segment==3){
					document.getElementById('teach').innerHTML=(output['staffoverall'][0]['monthly_teach_per']!=null?output['staffoverall'][0]['monthly_teach_per']:0)+'%';
					document.getElementById('nonteach').innerHTML=(output['staffoverall'][0]['monthly_nonteach_per']!=null?output['staffoverall'][0]['monthly_nonteach_per']:0)+'%';
					document.getElementById('totoverall').innerHTML=(output['staffoverall'][0]['monthly_overall']!=null?output['staffoverall'][0]['monthly_overall']:0)+'%';
				}else if(segment==4){
					document.getElementById('teach').innerHTML=(output['staffoverall'][0]['yearly_teach_per']!=null?output['staffoverall'][0]['yearly_teach_per']:0)+'%';
					document.getElementById('nonteach').innerHTML=(output['staffoverall'][0]['yearly_nonteach_per']!=null?output['staffoverall'][0]['yearly_nonteach_per']:0)+'%';
					document.getElementById('totoverall').innerHTML=(output['staffoverall'][0]['yearly_overall']!=null?output['staffoverall'][0]['yearly_overall']:0)+'%';
				}
				
				table='';
				var staffper = output['staff'];
				var all=new Array(); 
				for(var i=0;i<(staffper.length/2);i++){
					all[i]=staffper[i];
					all[(staffper.length-1)-i]=staffper[staffper.length-(i+1)];
				}
				
				for(var i=0;i<((staffper.length/2)>5?5:(staffper.length/2));i++){
					if(segment==1){
					//alert(i+' '+all[i]['teacher_name'].split(" ")[0]);
						table+='<tr style="font-size:12px;"><td>'+all[i]['teacher_name']+' - </td><td style="color:#00b100; padding-right:5px;">'+(all[i]['pper']!=null?all[i]['pper']:0)+'%'+'</td><td>'+all[(staffper.length-1)-i]['teacher_name']+' - </td><td style="color:red;padding-right:5px;">'+(all[(staffper.length-1)-i]['pper']!=null?all[(staffper.length-1)-i]['pper']:0)+'%'+'</td></tr>';
					}else if(segment==2){
						table+='<tr style="font-size:12px;"><td>'+all[i]['teacher_name']+' - </td><td style="color:#00b100; padding-right:5px;">'+(all[i]['teach_weekly_pre']!=null?all[i]['teach_weekly_pre']:100)+'%'+'</td><td>'+all[(staffper.length-1)-i]['teacher_name']+' - </td><td style="color:red;padding-right:5px;">'+(all[(staffper.length-1)-i]['teach_weekly_pre']!=null?all[(staffper.length-1)-i]['teach_weekly_pre']:100)+'%'+'</td></tr>';
					}else if(segment==3){
						table+='<tr style="font-size:12px;"><td>'+all[i]['teacher_name']+' - </td><td style="color:#00b100; padding-right:5px;">'+(all[i]['teach_monthly_pre']!=null?all[i]['teach_monthly_pre']:100)+'%'+'</td><td>'+all[(staffper.length-1)-i]['teacher_name']+' - </td><td style="color:red;padding-right:5px;">'+(all[(staffper.length-1)-i]['teach_monthly_pre']!=null?all[(staffper.length-1)-i]['teach_monthly_pre']:100)+'%'+'</td></tr>';
					}else if(segment==4){
						table+='<tr style="font-size:12px;"><td>'+all[i]['teacher_name']+' - </td><td style="color:#00b100; padding-right:5px;">'+(all[i]['teach_yearly_pre']!=null?all[i]['teach_yearly_pre']:100)+'%'+'</td><td>'+all[(staffper.length-1)-i]['teacher_name']+' - </td><td style="color:red;padding-right:5px;">'+(all[(staffper.length-1)-i]['teach_yearly_pre']!=null?all[(staffper.length-1)-i]['teach_yearly_pre']:100)+'%'+'</td></tr>';
					}
				}
				document.getElementById('staffpersonlist').innerHTML=table;
				
			},
				error: function(e){ 
				alert('Error: ' + e.responseText);
				return false;  
			}
		});
	}


$(document).ready(function(){
    //FANCYBOX
    //https://github.com/fancyapps/fancyBox
    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
});
// function image_zoom(image)
//           {
//             // console.log(image); 
//             $("#img01").attr('src',image);
//             $("#imageModal").modal('show');
//           }
$(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
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