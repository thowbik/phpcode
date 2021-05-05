<!DOCTYPE html>
<html lang="en">
        <!-- BEGIN HEAD -->
    <head>
        <style type="text/css">
            
            .center
            {
                text-align: center;
            }
            /* .page-content-inner{
                padding: 15px 25px 25px;
                background: #fff !important;
            } */
            .page-head{
                background: #fff !important;
            }

            .panel .panel-body {
                padding: 15px 25px 25px;
            }

            .page-content-inner{
                
                padding: 20px;
                padding-top: 25px;
                border-top: 1px solid #F8F8F8;
            }

            .form-wizard .nav-tabs {
                border-bottom: none;
            }

            .form-wizard.condensed .nav>li.active>a, .form-wizard.condensed .nav>li.active>a:hover, .form-wizard.condensed .nav>li.active>a:focus {
                background: #4abba5;
                color: #FFF;
            }

            .tab-right h3 {
                border-bottom: 1px solid #EEEEEE;
            }

            .nav {
                padding-left: 0;
                margin-bottom: 0;
                list-style: none;
            }

            .form-wizard.condensed .nav >li>a {
                -webkit-border-radius: 0;
                -moz-border-radius: 0;
                border-radius: 0;
                background-color: #E5E5E5;
            }

            .form-wizard .nav > li > a {
                padding: 10px;
                margin-right: 0;
                text-align: left;
                color: #888888;
            }

                     .dista { position: relative; }

.dista::after { position: absolute;
                top: 7px;
                right: 7px;
                content: ' km ';
}

.dista:hover::after {
  right: 3px;
}

input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}   
        </style>

        <style type="text/css" media="print">
            @page { size: landscape; }
        </style>

        <style type="text/css" media="file">
            @page { size: landscape; }
        </style>

        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/js/croppie-VIT/croppie.css'?>" rel="stylesheet" type="text/css"/>
        <?php $this->load->view('head.php'); ?>        

    </head>
    <!-- END HEAD -->
    <?php   $Starting ='';
            $Ending ='';
            $Year = '';
            $Curr_month_no = date('m');
            if($Curr_month_no <= 06){ $Starting = date('Y'); $Ending = date('Y')+1; }
            else{ $Starting = date('Y')-1; $Ending = date('Y'); }
            $Year = $Starting." - ".$Ending ;
    ?>
    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
               <?php $this->load->view('header.php'); ?>
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
                                    <h1>Additional Details
                                       <small>Other Additional Details For Profiles</small>
                                    </h1>
                                 </div>
                                 <!-- END PAGE TITLE -->
                                 <!-- BEGIN PAGE TOOLBAR -->
                                 <div class="page-toolbar">
                                    <?php
                                        if($this->session->flashdata('teacher_update')) {
                                            $message = $this->session->flashdata('teacher_update');
                                    ?>
                                            <div class="alert alert-success" style="width: 300px;"><button class="close" data-close="alert"></button>
                                            <?=$message;?></div>
                                    <!-- BEGIN THEME PANEL -->
                                    <!-- END THEME PANEL -->
                                  <?php } ?>
                                 </div>
                                 <!-- END PAGE TOOLBAR -->
                              </div>
                           </div>
                           <!-- END PAGE HEAD-->
                           <!-- BEGIN PAGE CONTENT BODY -->
                           
                                 <!-- BEGIN PAGE CONTENT INNER -->
                                <div class="page-content-inner">
                                            <div class="row">
                                            <div class="col-sm-3 col-md-4 col-lg-3">
                                                <div class="form-wizard condensed mgbt-xs-20">
                                                <ul class="nav nav-tabs nav-stacked">
                                                    <li class="active"><a href="#boarding" data-toggle="tab"> <i class="fa fa-arrows append-icon"></i> Boarding Facilities </a></li>
                                                    <li><a href="#affiliation" data-toggle="tab"> <i class="fa fa-arrows append-icon"></i> Affiliation </a></li>
                                                    <li><a href="#schoollocation" data-toggle="tab"> <i class="fa fa-arrows append-icon"></i> School Location </a></li>
                                                    <li><a href="#anganwadidtls" data-toggle="tab"> <i class="fa fa-arrows append-icon"></i> Anganwadi Details </a></li>
                                                    <li><a href="#smdcdtls" data-toggle="tab"> <i class="fa fa-arrows append-icon"></i> SMC / SMDC Details </a></li>
                                                    <li><a href="#resources" data-toggle="tab"> <i class="fa fa-arrows append-icon"></i> Resources </a></li>
                                                    <li><a href="#tabcivil" data-toggle="tab"> <i class="fa fa-arrows append-icon"></i> Civil </a></li>
                                                    <li><a href="#tabother" data-toggle="tab"> <i class="fa fa-arrows append-icon"></i> Other General Information </a></li>
                                                </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-9 col-md-8 col-lg-9 tab-right">
                                                <div class="panel widget panel-bd-left light-widget">
                                                <div  class="panel-body">
                                                    <div class="tab-content no-bd mgbt-xs-20">
                                                    <div id="boarding" class="tab-pane active">
                                                        <form class="form-horizontal" role="form" id="boarding facilities_form"  method="post" action="<?php echo base_url().'Basic/save_additional_detials/1';?>">
                                                        <h3 class="mgtp-15 mgbt-xs-20"> <strong> Boarding Facilities </strong></h3>
                                                        <input type="hidden" name="hide_tab_name" class="form-control" value="boarding" />
                                                        <div class="form-group">
                                                        <label class="col-sm-5 control-label">Whether boarding facilities are available for Primary School</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <select class="width-40 form-control"  id="boarding_pri_yn" name="boarding_pri_yn">
                                                                                                        <option value="">Choose</option>
                                                                                                        <option value=1>Yes</option>
                                                                                                        <option value=0>No</option>
                                                                                                    </select> 
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->


                                                        <div class="form-group" style="display: none;" id="div1" >
                                                            <label class="col-sm-5 control-label">Number of  Boys Using Boarding facilities for Primary</label>
                                                            <div class="col-sm-7 controls">
                                                            <div class="row mgbt-xs-0">
                                                            <div class="col-xs-9">
                                                            <input type="number" min="0" id="boarding_pri_b" name="boarding_pri_b" class="form-control" placeholder="Number of  Boys Using Boarding facilities for Primary" onkeypress="return event.charCode >= 48"/>
                                                            </div>
                                                            <!-- col-xs-12 --> 
                                                            </div>
                                                            <!-- row --> 
                                                            </div>
                                                            <!-- col-sm-10 --> 
                                                        </div>
                                                        <!-- form-group -->                                
                                                        <div class="form-group" style="display: none;" id="div2" >
                                                                                                <label class="col-sm-5 control-label">Number of  Girls Using Boarding facilities for Primary</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <input type="number" min="0" id="boarding_pri_g" name="boarding_pri_g"  class="form-control" placeholder="Number of  Girls Using Boarding facilities for Primary" onkeypress="return event.charCode >= 48"/>
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                        </div>
                                                        <!-- form-group -->
                                                        <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Whether boarding facilities are available for  Upper primary </label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <select class="width-40 form-control"  id="boarding_upr_yn" name="boarding_upr_yn">
                                                                                                        <option value="">Choose</option>
                                                                                                        <option value=1>Yes</option>
                                                                                                        <option value=0>No</option>
                                                                                                    </select> 
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->
                                                                                            
                                                                                            <div class="form-group" style="display: none;" id="div3" >
                                                                                                <label class="col-sm-5 control-label">Number of  Boys Using Boarding Facilities for Upper Primary</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <input type="number" min="0" id="boarding_upr_b" name="boarding_upr_b" class="form-control" placeholder="Number of  Boys Using Boarding Facilities for Upper Primary" onkeypress="return event.charCode >= 48" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->


                                                                                            <div class="form-group" style="display: none;" id="div4" >
                                                                                                <label class="col-sm-5 control-label">Number of  Girls Using Boarding Facilities for Upper Primary</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <input type="number" min="0" id="boarding_upr_g" name="boarding_upr_g" class="form-control" placeholder="Number of  Girls Using Boarding Facilities for Upper Primary" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Whether boarding facilities are available for Secondary School </label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <select class="width-40 form-control"  id="boarding_sec_yn" name="boarding_sec_yn">
                                                                                                        <option value="">Choose</option>
                                                                                                        <option value=1>Yes</option>
                                                                                                        <option value=0>No</option>
                                                                                                    </select> 
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->
                                                                                            
                                                                                            <div class="form-group" style="display: none;" id="div5" >
                                                                                                <label class="col-sm-5 control-label">Number of  Boys Using Boarding Facilities for Secondary</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <input type="number" min="0" id="boarding_sec_b" name="boarding_sec_b" class="form-control" placeholder="Number of  Boys Using Boarding Facilities for Secondary" onkeypress="return event.charCode >= 48" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->


                                                                                            <div class="form-group" style="display: none;" id="div6" >
                                                                                                <label class="col-sm-5 control-label">Number of  Girls Using Boarding Facilities for Secondary</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <input type="number" min="0" id="boarding_sec_g" name="boarding_sec_g" class="form-control" placeholder="Number of  Girls Using Boarding Facilities for Secondary" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Whether boarding facilities are available for Higher Secondary  </label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <select class="width-40 form-control"  id="boarding_hsec_yn" name="boarding_hsec_yn">
                                                                                                        <option value="">Choose</option>
                                                                                                        <option value=1>Yes</option>
                                                                                                        <option value=0>No</option>
                                                                                                    </select> 
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->
                                                                                            
                                                                                            <div class="form-group" style="display: none;" id="div7" >
                                                                                                <label class="col-sm-5 control-label">Number of  Boys Using Boarding Facilities for Higher Secondary</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <input type="number" min="0" id="boarding_hsec_b" name="boarding_hsec_b" class="form-control" placeholder="Number of  Boys Using Boarding Facilities for Higher Secondary" onkeypress="return event.charCode >= 48"/>
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->


                                                                                            <div class="form-group" style="display: none;" id="div8" >
                                                                                                <label class="col-sm-5 control-label">Number of  Girls Using Boarding Facilities for Higher Secondary</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <input type="number" min="0" id="boarding_hsec_g" name="boarding_hsec_g" class="form-control" placeholder="Number of  Girls Using Boarding Facilities for Higher Secondary" onkeypress="return event.charCode >= 48" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="pd-20">
                                                                                           <button type="submit" class="btn btn-primary col-md-offset-11"><i class="fa fa-check"></i> Save</button>
                                                                                        </div>
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        </form>
                                                    </div>
                                                    <!-- #boarding -->
                                                    <div id="affiliation" class="tab-pane">
                                                    
                                                        <h3 class="mgtp-15 mgbt-xs-20"> <strong> Affiliation </strong> </h3>
                                                        <form class="form-horizontal" role="form" id="affiliation_form"  method="post" action="<?php echo base_url().'Basic/save_additional_detials/2';?>">
                                                        <input type="hidden" name="hide_tab_name" class="form-control" value="affiliation" />
                                                        <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Affiliation Board for Secondary Sections  </label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <select class="width-40 form-control"  id="board_sec" name="board_sec">
                                                                                                        <option value="">Choose</option>
                                                                                                        <option value=1>CBSE</option>
                                                                                                        <option value=2>State Board</option>
                                                                                                        <option value=3>ICSE</option>
                                                                                                        <option value=4>International Board</option>
                                                                                                        <option value=6>Both CBSE & State Board</option>
                                                                                                        <option value=5>Others</option>
                                                                                                    </select> 
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->
                                                                                            
                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Affiliation Number for  secondary</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <!--<input type="number" min="0" id="board_sec_no" name="board_sec_no" class="form-control" placeholder="Affiliation Number for secondary" onkeypress="return event.charCode >= 48"/>-->
                                                                                                    <input type="text" id="board_sec_no" name="board_sec_no" class="form-control" placeholder="Affiliation Number for secondary" />
																									</div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->


                                                                                            <div class="form-group" style="display: none;" id="div9" >
                                                                                                <label class="col-sm-5 control-label">If others, then name of the board</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                       <input type="text" id="board_sec_oth" name="board_sec_oth" class="form-control" placeholder="If others, then name of the board" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->
                                                                                            
                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Affiliation Board For Higher secondary Sections</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <select class="width-40 form-control"  id="board_hsec" name="board_hsec">
                                                                                                        <option value="">Choose</option>
                                                                                                        <option value=1>CBSE</option>
                                                                                                        <option value=2>State Board</option>
                                                                                                        <option value=3>ICSE</option>
                                                                                                        <option value=4>International Board</option>
                                                                                                        <option value=6>Both CBSE & State Board</option>
                                                                                                        <option value=5>Others</option>
                                                                                                    </select> 
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->
                                                                                            
                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Affiliation Number For Higher secondary</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <input type="text" id="board_hsec_no" name="board_hsec_no" class="form-control" placeholder="Affiliation Number for  secondary"  />
                                                                                                    
																									</div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->


                                                                                            <div class="form-group" style="display: none;" id="div10" >
                                                                                                <label class="col-sm-5 control-label">If others, then name of the board</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <input type="text" id="board_hsec_oth" name="board_hsec_oth" class="form-control" placeholder="If others, then name of the board" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            
                                                                                            <div class="pd-20">
                                                                                           <button type="submit" class="btn btn-primary col-md-offset-11"><i class="fa fa-check"></i> Save</button>
                                                                                        </div>
                                                                                        </form>
                                                    </div>
                                                    <!-- #tab-price -->
                                                    <div id="schoollocation" class="tab-pane">
                                                    
                                                        <h3 class="mgtp-15 mgbt-xs-20"> <strong> School Location </strong></h3>
                                                        <form class="form-horizontal" role="form" id="school_location_form"  method="post" action="<?php echo base_url().'Basic/save_additional_detials/3';?>">
                                                        <input type="hidden" name="hide_tab_name" class="form-control" value="schoollocation" />
                                                                <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Distance of the Nearest Primary School</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <div class="dista">
                                                                                                    <input type="number" min="0" id="distance_pri" name="distance_pri" class="form-control" placeholder="Distance of the Nearest Primary School" onkeypress="return event.charCode >= 48"/>
                                                                                                    </div>
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Distance of the Nearest Upper Primary School</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <div class="dista">
                                                                                                    <input type="number" min="0" id="distance_upr" name="distance_upr" class="form-control" placeholder="Distance of the Nearest Upper Primary School" /></div>
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Distance of the Nearest Secondary School</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <div class="dista">
                                                                                                    <input type="number" min="0" id="distance_sec" name="distance_sec" class="form-control" placeholder="Distance of the Nearest Secondary School" onkeypress="return event.charCode >= 48" />
                                                                                                    </div>
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Distance of the Nearest Higher Secondary School</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <div class="dista">
                                                                                                    <input type="number" min="0" id="distance_hsec" name="distance_hsec" class="form-control" placeholder="Distance of the Nearest Higher Secondary School" onkeypress="return event.charCode >= 48"/>
                                                                                                    </div>
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->
                                                        
                                                                                            <div class="pd-20">
                                                                                           <button type="submit" class="btn btn-primary col-md-offset-11"><i class="fa fa-check"></i> Save</button>
                                                                                        </div>
                                                                                        </form>
                                                    </div>
                                                    <!-- schoollocation -->
                                                    
                                                    <div id="anganwadidtls" class="tab-pane">
                                                    
                                                        <h3 class="mgtp-15 mgbt-xs-20"> <strong> Anganwadi Details </strong> </h3>
                                                        <form class="form-horizontal" role="form" id="anganwadi_details_form"  method="post" action="<?php echo base_url().'Basic/save_additional_detials/4';?>">
                                                        <input type="hidden" name="hide_tab_name" class="form-control" value="anganwadidtls" />    
                                                        <div class="form-group">
                                                                                                <!-- <label class="col-sm-5 control-label">Whether pre-primary section(other than Anganwadi) attached to school</label> -->
                                                                                                <label class="col-sm-5 control-label">Whether Anganwadi attached to school</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <select class="width-40 form-control"  id="ppsec_yn" name="ppsec_yn">
                                                                                                        <option value="">Choose</option>
                                                                                                        <option value=1>Yes</option>
                                                                                                        <option value=0>No</option>
                                                                                                    </select> 
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->
                                                                                            
                                                                                            <div class="form-group" style="display: none;" id="div11" >
                                                                                                <label class="col-sm-5 control-label">Total boy Children in Anganwadi Centre</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <input type="number" min="0" id="anganwadi_stu_b" name="anganwadi_stu_b" class="form-control" placeholder="Total boy Children in Anganwadi Centre" onkeypress="return event.charCode >= 48" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->
                                                                                            
                                                                                            <div class="form-group" style="display: none;" id="div12" >
                                                                                                <label class="col-sm-5 control-label">Total girl Children in Anganwadi Centre</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <input type="number" min="0" id="anganwadi_stu_g" name="anganwadi_stu_g"  class="form-control" placeholder="Total girl Children in Anganwadi Centre" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            
                                                                                            
                                                                                            <div class="pd-20">
                                                                                           <button type="submit" class="btn btn-primary col-md-offset-11"><i class="fa fa-check"></i> Save</button>
                                                                                        </div>
                                                                                            </form>
                                                    </div>
                                                    <div id="smdcdtls" class="tab-pane">
                                                    
                                                        <h3 class="mgtp-15 mgbt-xs-20"> <strong> SMC / SMDC Details </strong></h3>
                                                        <form class="form-horizontal" role="form" id="smc_details_form"  method="post" action="<?php echo base_url().'Basic/save_additional_detials/5';?>">
                                                        <input type="hidden" name="hide_tab_name" class="form-control" value="smdcdtls" />
                                                        <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Number of SC parents</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <input type="number" min="0" id="smc_par_sc" name="smc_par_sc" class="form-control" placeholder="Number of SC parents" onkeypress="return event.charCode >= 48" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->
                                                                                            
                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Number of ST parents</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <input type="number" min="0" id="smc_par_st" name="smc_par_st"  class="form-control" placeholder="Number of ST parents" onkeypress="return event.charCode >= 48" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Numbers of Male teachers</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <input type="number" min="0" id="smc_tch_m" name="smc_tch_m"  class="form-control" placeholder="Numbers of Male teachers" onkeypress="return event.charCode >= 48" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Numbers of Female teachers</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <input type="number" min="0" id="smc_tch_f" name="smc_tch_f"  class="form-control" placeholder="Numbers of Female teachers" onkeypress="return event.charCode >= 48" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Number of male members provided training (SMC)</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <input type="number" min="0" id="smc_trained_m" name="smc_trained_m"  class="form-control" placeholder="Number of male members provided training" onkeypress="return event.charCode >= 48"/>
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Number of Female members provided training (SMC)</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <input type="number" min="0" id="smc_trained_f" name="smc_trained_f"  class="form-control" placeholder="Number of Female members provided training" onkeypress="return event.charCode >= 48" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->
                                                                                            

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Number of meetings held by SMC during the previous academic year <?php echo'( '.$Year.' )';?></label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <input type="number" min="0" id="smc_meetings" name="smc_meetings"  class="form-control" placeholder="Number of meetings held by SMC during the previous academic year <?php echo'( '.$Year.' )';?> "  onkeypress="return event.charCode >= 48" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Number of EWS male parents</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <input type="number" min="0" id="smdc_par_ews_m" name="smdc_par_ews_m"  class="form-control" placeholder="Number of EWS male parents" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Number of EWS Female parents</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <input type="number" min="0" id="smdc_par_ews_f" name="smdc_par_ews_f"  class="form-control" placeholder="Number of EWS Female parents" onkeypress="return event.charCode >= 48"/>
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Whether School Management Committee (SMC) and School Management and Development Committee (SMDC) are same in the school?</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                <div class="col-xs-9">
                                                                                                    <select class="width-40 form-control"  id="smdc_smc_same_yn" name="smdc_smc_same_yn">
                                                                                                        <option value="">Choose</option>
                                                                                                        <option value=1>Yes</option>
                                                                                                        <option value=0>No</option>
                                                                                                    </select> 
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Male number of members provided training (SMDC)</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                <div class="col-xs-9">
                                                                                                   <input type="number" min="0" id="smdc_trained_m" name="smdc_trained_m"  class="form-control" placeholder="Male number of members provided training" onkeypress="return event.charCode >= 48" />
                                                                                                    <!-- <select class="width-40 form-control"  id="smdc_trained_m" name="smdc_trained_m">
                                                                                                        <option value="">Choose</option>
                                                                                                        <option value=1>Yes</option>
                                                                                                        <option value=0>No</option>
                                                                                                    </select>  -->
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Female number of members provided training (SMDC)</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                <div class="col-xs-9">
                                                                                                    <input type="number" min="0" id="smdc_trained_f" name="smdc_trained_f" class="form-control" placeholder="Female number of members provided training" onkeypress="return event.charCode >= 48" />
                                                                                                    <!-- <select class="width-40 form-control"  id="smdc_trained_f" name="smdc_trained_f">
                                                                                                        <option value="">Choose</option>
                                                                                                        <option value=1>Yes</option>
                                                                                                        <option value=0>No</option>
                                                                                                    </select>  -->
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->
                                                                                            
                                                                                            <div class="pd-20">
                                                                                            <strong>* EWS - Economically Weaker Section</strong>
                                                                                            <button type="submit" class="btn btn-primary col-md-offset-11"><i class="fa fa-check"></i> Save</button>
                                                                                        </div>
                                                        </form>
                                                    </div>
                                                    <!-- tab-pane -->
                                                    <div id="resources" class="tab-pane">
                                                    
                                                        <h3 class="mgtp-15 mgbt-xs-20"><strong> Resources </strong></h3>
                                                        <form class="form-horizontal" role="form" id="resources_form"  method="post" action="<?php echo base_url().'Basic/save_additional_detials/6';?>">
                                                        <input type="hidden" name="hide_tab_name" class="form-control" value="resources" />

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Whether ICT based tools are being used for teaching classes VI - XII</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-10">
                                                                                                    <select class="width-40 form-control"  id="ict_tools_yn" name="ict_tools_yn">
                                                                                                        <option value="">Choose</option>
                                                                                                        <option value=1>Yes</option>
                                                                                                        <option value=0>No</option>
                                                                                                    </select> 
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Number of hours spent/week</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-10">
                                                                                                    <input type="number" min="0" id="ict_teach_hrs" name="ict_teach_hrs"  class="form-control" placeholder="Number of hours spent/week" onkeypress="return event.charCode >= 48" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->
                                                                                            <?php if(!empty($library_entry)) { ?>
                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Total number of books from NCERT, NBT or any other Government publisher</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                <?php foreach($library_entry as $key=>$value){ ?>
                                                                                                    <div class="col-xs-5">
                                                                                                    <label><?php echo $value['name'] .' ( '.$value['num_books'].' books )' ; ?></label>
                                                                                                      <input type="number" min="0" id="<?php echo 'ncert_books'.$value['library_type'] ?>" name="<?php echo 'ncert_books_'.$value['library_type'] ?>"  class="form-control" placeholder="<?php echo $value['name'] .' ( '.$value['num_books'].' books )' ; ?>" onkeypress="return event.charCode >= 48" 
                                                                                                      onchange="Validate(event,<?php echo $value['num_books']; ?>)" />
                                                                                                    </div>
                                                                                                <?php } ?>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <?php } ?>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">PCs with Integrated Teaching Learning Devices</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-10">
                                                                                                    <input type="number" min="0" id="teachdev_yn" name="teachdev_yn"  class="form-control" placeholder="PCs with Integrated Teaching Learning Devices" onkeypress="return event.charCode >= 48" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">No. of PCs with Integrated Teaching Learning Devices available</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-10">
                                                                                                    <input type="number" min="0" id="teachdev_tot" name="teachdev_tot"  class="form-control" placeholder="No. of PCs with Integrated Teaching Learning Devices available" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">No. of Functional PCs with Integrated Teaching Learning Devices available</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-10">
                                                                                                    <input type="number" min="0" id="teachdev_fun" name="teachdev_fun"  class="form-control" placeholder="No. of Functional PCs with Integrated Teaching Learning Devices available" onkeypress="return event.charCode >= 48" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            
                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">is Hand washing facility with soap available near toilets/urinals blocks ? </label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-10">
                                                                                                    <select class="width-40 form-control"  id="handwash_toil_yn" name="handwash_toil_yn">
                                                                                                        <option value="">Choose</option>
                                                                                                        <option value=1>Yes</option>
                                                                                                        <option value=0>No</option>
                                                                                                    </select> 
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <h3 class="mgtp-15 mgbt-xs-20"> <strong>Water Resources</strong> </h3>
                                                                                            
                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Total number of Hand pumps</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-10">
                                                                                                    <input type="number" min="0" id="hand_pump_tot" name="hand_pump_tot"  class="form-control" placeholder="Total number of Hand pumps" onkeypress="return event.charCode >= 48" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->
                                                                                            
                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Total number of functional Hand pumps</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-10">
                                                                                                    <input type="number"  id="hand_pump_fun" name="hand_pump_fun"  class="form-control" placeholder="Total number of functional Hand pumps" onkeypress="return event.charCode >= 48" 
                                                                                                    onchange="Validate(event,'hand_pump_tot')" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Total number of Well</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-10">
                                                                                                    <input type="number" min="0" id="well_prot_tot" name="well_prot_tot"  class="form-control" placeholder="Total number of Well" onkeypress="return event.charCode >= 48" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Total number of functional Well</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-10">
                                                                                                    <input type="number" min="0" id="well_prot_fun" name="well_prot_fun"  class="form-control" placeholder="Total number of functional Well"  onkeypress="return event.charCode >= 48"
                                                                                                    onchange="Validate(event,'well_prot_tot')"/>
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Total number of Unprotected Well</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-10">
                                                                                                    <input type="number" min="0" id="well_unprot_tot" name="well_unprot_tot"  class="form-control" placeholder="Total number of Unprotected Well" onkeypress="return event.charCode >= 48" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Total number of Unprotected functional Well</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-10">
                                                                                                    <input type="number" min="0" id="well_unprot_fun" name="well_unprot_fun"  class="form-control" placeholder="Total number of Unprotected functional Well" onkeypress="return event.charCode >= 48"
                                                                                                    onchange="Validate(event,'well_unprot_tot')"/>
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Total number of Tap Water</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-10">
                                                                                                    <input type="number" min="0" id="tap_tot" name="tap_tot"  class="form-control" placeholder="Total number of Tap Water" onkeypress="return event.charCode >= 48"/>
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Total number of functional Tap Water</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-10">
                                                                                                    <input type="number" min="0" id="tap_fun" name="tap_fun"  class="form-control" placeholder="Total number of functional Tap Water" onkeypress="return event.charCode >= 48" 
                                                                                                    onchange="Validate(event,'tap_tot')"/>
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->
                                                                         
                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Total number of Packaged/Bottled Water</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-10">
                                                                                                    <input type="number" min="0" id="pack_water" name="pack_water"  class="form-control" placeholder="Total number of  Packaged/Bottled Water" onkeypress="return event.charCode >= 48" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Total number of functional Packaged/Bottled Water</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-10">
                                                                                                    <input type="number" min="0" id="pack_water_fun" name="pack_water_fun"  class="form-control" placeholder="Total number of functional Packaged/Bottled Water" onkeypress="return event.charCode >= 48" 
                                                                                                    onchange="Validate(event,'pack_water')"/>
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                   
                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Any Other water Resource</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-10">
                                                                                                    <input type="text" id="othsrc_name" name="othsrc_name"  class="form-control" placeholder="Any Other water Resource" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>

                                                                                            <!-- form-group -->
                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Total number of Others</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-10">
                                                                                                    <input type="number" min="0" id="othsrc_tot" name="othsrc_tot"  class="form-control" placeholder="Total number of Others" onkeypress="return event.charCode >= 48" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Total number of functional Others</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-10">
                                                                                                    <input type="number" min="0" id="othsrc_fun" name="othsrc_fun"  class="form-control" placeholder="Total number of functional Others" onkeypress="return event.charCode >= 48" 
                                                                                                    onchange="Validate(event,'othsrc_tot')"/>
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            


                                                                                            <div class="pd-20">
                                                                                           <button type="submit" class="btn btn-primary col-md-offset-11"><i class="fa fa-check"></i> Save</button>
                                                                                        </div>
                                                        </form>
                                                    </div>
                                                    <!-- tab-pane -->
                                                    
                                                    <div id="tabcivil" class="tab-pane">
                                                        <h3 class="mgtp-15 mgbt-xs-20"> <strong> Civil </strong></h3>
                                                        <form class="form-horizontal" role="form" id="civil_form"  method="post" action="<?php echo base_url().'Basic/save_additional_detials/7';?>">
                                                        <input type="hidden" name="hide_tab_name" class="form-control" value="tabcivil" />
                                                        <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Total Classrooms in dilapidated condition</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <input type="number" min="0" id="clsrms_dptd" name="clsrms_dptd"  class="form-control" placeholder="Total Classrooms in dilapidated condition" onkeypress="return event.charCode >= 48"/>
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            
                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Status of the school building</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <select class="width-40 form-control"  id="bld_status" name="bld_status">
                                                                                                        <option value="">Choose</option>
                                                                                                        <option value=1>Private</option>
                                                                                                        <option value=2>Rented</option>
                                                                                                        <option value=3>Government</option>
                                                                                                        <option value=4>Government school in a rent free building</option>
                                                                                                        <option value=5>No Building</option>
                                                                                                        <option value=7>Building Under Construction</option>
                                                                                                        <option value=10>School running in other Department Building</option>
                                                                                                    </select> 
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">No. of students for whom Furniture is available?</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <input type="number" min="0" id="stus_hv_furnt" name="stus_hv_furnt"  class="form-control" placeholder="No. of students for whom Furniture is available?" onkeypress="return event.charCode >= 48" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Separate room for Assistant Head Master/Vice Principal</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    <!-- <input type="number" min="0" id="ahmvp_room_yn" name="ahmvp_room_yn"  class="form-control" placeholder="Separate room for Assistant Head Master/Vice Principal" /> -->
                                                                                                    <select class="width-40 form-control"  id="ahmvp_room_yn" name="ahmvp_room_yn">
                                                                                                        <option value="">Choose</option>
                                                                                                        <option value=1>Yes</option>
                                                                                                        <option value=0>No</option>
                                                                                                    </select> 
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->
                                                                                            <div class="pd-20">
                                                                                           <button type="submit" class="btn btn-primary col-md-offset-11"><i class="fa fa-check"></i> Save</button>
                                                                                        </div>

                                                        </form>
                                                    </div>
                                                    <div id="tabother" class="tab-pane">
                                                        <h3 class="mgtp-15 mgbt-xs-20"> <strong> Other General Information </strong> </h3>
                                                        <form class="form-horizontal" role="form" id="additional_details_form"  method="post" action="<?php echo base_url().'Basic/save_additional_detials/8';?>">
                                                        <input type="hidden" name="hide_tab_name" class="form-control" value="tabother" />
                                                        <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Are the pupils at the primary stage taught through their mother tongue</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-12">
                                                                                                    <!-- <textarea rows="3" id="mtongue_pri" name="mtongue_pri" class="form-control"></textarea> -->
                                                                                                    <!-- <input type="number" min="0" id="mtongue_pri" name="mtongue_pri"  class="form-control" placeholder="Are the pupils at the primary stage taught through their mother tongue" onkeypress="return event.charCode >= 48"/> -->
                                                                                                    <select class="width-40 form-control"  id="mtongue_pri" name="mtongue_pri">
                                                                                                        <option value="">Choose</option>
                                                                                                        <option value=1>Yes</option>
                                                                                                        <option value=0>No</option>
                                                                                                    </select> 
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 -->
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <!-- <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Number of visits by CRC Co-ordinator in previous year <?php echo'( '.$Year.' )';?> </label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-9">
                                                                                                    !-- <textarea rows="3" id="pre_year_crc_visit" name="pre_year_crc_visit" class="form-control"></textarea> --
                                                                                                    <input type="number" min="0" id="pre_year_crc_visit" name="pre_year_crc_visit"  class="form-control" placeholder="Number of visits by CRC Co-ordinator in previous year" onkeypress="return event.charCode >= 48"/>
                                                                                                    </div>
                                                                                                    !-- col-xs-12 --
                                                                                                </div>
                                                                                                !-- row --
                                                                                                </div>
                                                                                                !-- col-sm-10 --
                                                                                            </div>
                                                                                            !-- form-group -->

                                                        <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Total number of Medical check-ups conducted in the school during last academic year</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                    <div class="col-xs-12">
                                                                                                    <input type="number" min="0" id="medchk_tot" name="medchk_tot"  class="form-control" placeholder="Total number of Medical check-ups conducted in the school during last academic year" />
                                                                                                    </div>
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            <!-- form-group -->

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Out of Total Students in Grade 1 <?php echo'( academic year : '.$Year.' )';?>  Number of children with pre-school experience in (Boys)</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                
                                                                                                    <div class="col-xs-4">
                                                                                                    <label><?php echo 'Same School' ; ?></label>
                                                                                                    <input type="number" min="0" id="grd1_samescl_b" name="grd1_samescl_b"  class="form-control" placeholder="Same School" onkeypress="return event.charCode >= 48" />
                                                                                                    </div>

                                                                                                    <div class="col-xs-4">
                                                                                                    <label><?php echo 'Another School' ; ?></label>
                                                                                                    <input type="number" min="0" id="grd1_othscl_b" name="grd1_othscl_b"  class="form-control" placeholder="Another School" onkeypress="return event.charCode >= 48" />
                                                                                                    </div>

                                                                                                    <div class="col-xs-4">
                                                                                                    <label><?php echo 'Anganwadi/ECCE center' ; ?></label>
                                                                                                    <input type="number" min="0" id="grd1_angan_b" name="grd1_angan_b"  class="form-control" placeholder="Anganwadi/ECCE center" onkeypress="return event.charCode >= 48" />
                                                                                                    </div>
                                                                                                
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>

                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-5 control-label">Out of Total Students in Grade 1 <?php echo'( academic year : '.$Year.' )';?>  Number of children with pre-school experience in (Girls)</label>
                                                                                                <div class="col-sm-7 controls">
                                                                                                <div class="row mgbt-xs-0">
                                                                                                
                                                                                                    <div class="col-xs-4">
                                                                                                    <label><?php echo 'Same School' ; ?></label>
                                                                                                    <input type="number" min="0" id="grd1_samescl_g" name="grd1_samescl_g"  class="form-control" placeholder="Same School" onkeypress="return event.charCode >= 48" />
                                                                                                    </div>

                                                                                                    <div class="col-xs-4">
                                                                                                    <label><?php echo 'Another School' ; ?></label>
                                                                                                    <input type="number" min="0" id="grd1_othscl_g" name="grd1_othscl_g"  class="form-control" placeholder="Another School" onkeypress="return event.charCode >= 48" />
                                                                                                    </div>

                                                                                                    <div class="col-xs-4">
                                                                                                    <label><?php echo 'Anganwadi/ECCE center' ; ?></label>
                                                                                                    <input type="number" min="0" id="grd1_angan_g" name="grd1_angan_g"  class="form-control" placeholder="Anganwadi/ECCE center" onkeypress="return event.charCode >= 48" />
                                                                                                    </div>
                                                                                                
                                                                                                    <!-- col-xs-12 --> 
                                                                                                </div>
                                                                                                <!-- row --> 
                                                                                                </div>
                                                                                                <!-- col-sm-10 --> 
                                                                                            </div>
                                                                                            
                                                                                            <!-- form-group -->

                                                                                            <!-- <div class="center">
                                                                                                <div> <a class="btn  btn-sm save-btn"><i class="fa fa-save append-icon"></i> Save Changes</a> <a class="btn btn-default btn-sm" ><i class="fa fa-times append-icon"></i> Cancel Changes</a></div>
                                                                                            </div> -->
                                                                                            <div class="pd-20">
                                                                                                <button type="submit" class="btn btn-primary col-md-offset-11"><i class="fa fa-check"></i> Save</button>
                                                                                            </div>
                                                        
                                                        </form>
                                                    </div>
                                                    </div>
                                                    <!-- tab-content --> 
                                                </div>
                                                <!-- panel-body --> 
                                                
                                                <!-- form-horizontal --> 
                                                </div>
                                                <!-- Panel Widget --> 
                                            </div>
                                            <!-- col-sm-12--> 
                                            </div>
                                            <!-- row -->       
                                </div>
                              <!-- END PAGE CONTENT INNER -->
                        
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
                <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
                <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js';?>" type="text/javascript"></script>
                <script src="<?php echo base_url().'asset/global/plugins/moment.min.js';?>" type="text/javascript"></script>
                <script src="<?php echo base_url().'asset/global/plugins/jquery.mockjax.js';?>" type="text/javascript"></script>
                <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js';?>" type="text/javascript"></script>
                <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.js';?>" type="text/javascript"></script>
                <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
                <script src="<?php echo base_url().'asset/global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js';?>" type="text/javascript"></script>
                <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js';?>" type="text/javascript"></script>
                <!-- END PAGE LEVEL PLUGINS -->
                <!-- BEGIN PAGE LEVEL SCRIPTS -->
                <script>
                $("#boarding_pri_yn").change(function () {    
                     var val = $(this).val();
                     if(val == 1){
                            $("#div1").show();
                            $("#div2").show();
                     }
                     else{
                            $('#boarding_pri_b').val('');
                            $("#div1").hide();
                            $('#boarding_pri_g').val('');
                            $("#div2").hide();
                     }
                });


                $("#boarding_upr_yn").change(function () {    
                     var val = $(this).val();
                     if(val == 1){
                            $("#div3").show();
                            $("#div4").show();
                     }
                     else{
                            $('#boarding_upr_b').val('');
                            $("#div3").hide();
                            $('#boarding_upr_g').val('');
                            $("#div4").hide();
                     }
                });
                $("#boarding_sec_yn").change(function () {    
                     var val = $(this).val();
                     if(val == 1){
                            $("#div5").show();
                            $("#div6").show();
                     }
                     else{
                            $('#boarding_sec_b').val('');
                            $("#div5").hide();
                            $('#boarding_sec_g').val('');
                            $("#div6").hide();
                     }
                });

                $("#boarding_hsec_yn").change(function () {    
                     var val = $(this).val();
                     if(val == 1){
                            $("#div7").show();
                            $("#div8").show();
                     }
                     else{
                            $('#boarding_hsec_b').val('');
                            $("#div7").hide();
                            $('#boarding_hsec_g').val('');
                            $("#div8").hide();
                     }
                });

                $("#board_sec").change(function () {    
                    var val = $(this).val();
                     if(val == 5){
                            $("#div9").show();
                     }
                     else{
                            $('#board_sec_oth').val('');
                            $("#div9").hide();
                     }
                });

                $("#board_hsec").change(function () {    
                    var val = $(this).val();
                     if(val == 5){
                            $("#div10").show();
                     }
                     else{
                            $('#board_hsec_oth').val('');
                            $("#div10").hide();
                     }
                });


                
                $("#ppsec_yn").change(function () {    
                     var val = $(this).val();
                     if(val == 1){
                            $("#div11").show();
                            $("#div12").show();
                     }
                     else{
                            $('#anganwadi_stu_b').val('');
                            $("#div11").hide();
                            $('#anganwadi_stu_g').val('');
                            $("#div12").hide();
                     }
                });

                
                
                    $(document).ready(function() {
                        var tabname = '<?php echo $this->uri->segment(3,0); ?>';
                        // alert(uriclass);
                        $('.nav-tabs a[href="#' + tabname + '"]').tab('show');
                        //   $('.nav-tabs a[href="#affiliation"]').tab('show');
                        
                        var arr =  (<?php echo json_encode($training_detail); ?>);
                        if(arr[0].ppsec_yn == 1){
                            $("#div11").show();
                            $("#div12").show();
                            $('#anganwadi_stu_b').val(arr[0].anganwadi_stu_b != null ? arr[0].anganwadi_stu_b : 0);
                            $('#anganwadi_stu_g').val(arr[0].anganwadi_stu_g != null ? arr[0].anganwadi_stu_g : 0);
                        }
                        if(arr[0].boarding_hsec_yn == 1){
                                $("#div7").show();
                                $("#div8").show();
                                $('#boarding_hsec_b').val(arr[0].boarding_hsec_b != null ? arr[0].boarding_hsec_b : 0);
                                $('#boarding_hsec_g').val(arr[0].boarding_hsec_g != null ? arr[0].boarding_hsec_g : 0);
                        }
                        $('#boarding_hsec_yn').val(arr[0].boarding_hsec_yn);
                        $('#boarding_pri_yn').val(arr[0].boarding_pri_yn);
                        if(arr[0].boarding_pri_yn == 1){
                                $("#div1").show();
                                $("#div2").show();
                                $('#boarding_pri_b').val(arr[0].boarding_pri_b != null ? arr[0].boarding_pri_b : 0);
                                $('#boarding_pri_g').val(arr[0].boarding_pri_g != null ? arr[0].boarding_pri_g : 0);
                        }
                        $('#boarding_sec_yn').val(arr[0].boarding_sec_yn);
                        if(arr[0].boarding_sec_yn == 1){
                                $("#div5").show();
                                $("#div6").show();
                                $('#boarding_sec_b').val(arr[0].boarding_sec_b != null ? arr[0].boarding_sec_b : 0);
                                $('#boarding_sec_g').val(arr[0].boarding_sec_g != null ? arr[0].boarding_sec_g : 0);
                        }
                        $('#boarding_upr_yn').val(arr[0].boarding_upr_yn);
                        if(arr[0].boarding_upr_yn == 1){
                                $("#div3").show();
                                $("#div4").show();
                                $('#boarding_upr_b').val(arr[0].boarding_upr_b  != null ? arr[0].boarding_upr_b : 0);
                                $('#boarding_upr_g').val(arr[0].boarding_upr_g  != null ? arr[0].boarding_upr_g : 0);
                        }
                        $('#ict_tools_yn').val(arr[0].ict_tools_yn);
                        $('#ict_teach_hrs').val(arr[0].ict_teach_hrs != null ? arr[0].ict_teach_hrs : 0);
                        
                        $('#medchk_tot').val(arr[0].medchk_tot != null ? arr[0].medchk_tot : 0 );
                        $('#ppsec_yn').val(arr[0].ppsec_yn);
                        $('#teachdev_fun').val(arr[0].teachdev_fun != null ? arr[0].teachdev_fun : 0);
                        $('#teachdev_tot').val(arr[0].teachdev_tot != null ? arr[0].teachdev_tot : 0);
                        $('#teachdev_yn').val(arr[0].teachdev_yn != null ? arr[0].teachdev_yn : 0);

                        $('#grd1_samescl_b').val(arr[0].grd1_samescl_b != null ? arr[0].grd1_samescl_b : 0);
                        $('#grd1_samescl_g').val(arr[0].grd1_samescl_g != null ? arr[0].grd1_samescl_g : 0);
                        $('#grd1_othscl_b').val(arr[0].grd1_othscl_b != null ? arr[0].grd1_othscl_b : 0);
                        $('#grd1_othscl_g').val(arr[0].grd1_othscl_g != null ? arr[0].grd1_othscl_g : 0);
                        $('#grd1_angan_b').val(arr[0].grd1_angan_b != null ? arr[0].grd1_angan_b : 0);
                        $('#grd1_angan_g').val(arr[0].grd1_angan_g != null ? arr[0].grd1_angan_g : 0);

                        var arr2 =  (<?php echo json_encode($academic_detail); ?>);
                        $('#mtongue_pri').val(arr2[0].mtongue_pri);
                        $('#board_sec').val(arr2[0].board_sec);
            			$('#board_sec_no').val(arr2[0].board_sec_no != null ? arr2[0].board_sec_no : 'nil');
                        if(arr2[0].board_sec == 5){
                            $("#div9").show();
                            $('#board_sec_oth').val(arr2[0].board_sec_oth != null ? arr2[0].board_sec_oth : 'nil');
                        }

                        $('#board_hsec').val(arr2[0].board_hsec);
                        $('#board_hsec_no').val(arr2[0].board_hsec_no != null ? arr2[0].board_hsec_no : 'nil');
                        if(arr2[0].board_hsec == 5){
                            $("#div10").show();
                            $('#board_hsec_oth').val(arr2[0].board_hsec_oth != null ? arr2[0].board_hsec_oth : 'nil');
                        }
                        
                        $('#distance_pri').val(arr2[0].distance_pri != null ? arr2[0].distance_pri : 0);
                        $('#distance_upr').val(arr2[0].distance_upr != null ? arr2[0].distance_upr : 0);
                        $('#distance_sec').val(arr2[0].distance_sec != null ? arr2[0].distance_sec : 0);
                        $('#distance_hsec').val(arr2[0].distance_hsec != null ? arr2[0].distance_hsec : 0);
        
                        var arr3 =  (<?php echo json_encode($committee_detail); ?>);
                        $('#smc_par_sc').val(arr3[0].smc_par_sc != null ? arr3[0].smc_par_sc : 0);
                        $('#smc_par_st').val(arr3[0].smc_par_st != null ? arr3[0].smc_par_st : 0);
                        $('#smc_tch_m').val(arr3[0].smc_tch_m != null ? arr3[0].smc_tch_m : 0);
                        $('#smc_tch_f').val(arr3[0].smc_tch_f != null ? arr3[0].smc_tch_f : 0);
                        $('#smc_trained_m').val(arr3[0].smc_trained_m != null ? arr3[0].smc_trained_m : 0);
                        $('#smc_trained_f').val(arr3[0].smc_trained_f != null ? arr3[0].smc_trained_f : 0);
                        $('#smc_meetings').val(arr3[0].smc_meetings != null ? arr3[0].smc_meetings : 0);
                        $('#smdc_par_ews_m').val(arr3[0].smdc_par_ews_m != null ? arr3[0].smdc_par_ews_m : 0);
                        $('#smdc_par_ews_f').val(arr3[0].smdc_par_ews_f != null ? arr3[0].smdc_par_ews_f : 0);
                        $('#smdc_smc_same_yn').val(arr3[0].smdc_smc_same_yn);
                        $('#smdc_trained_m').val(arr3[0].smdc_trained_m != null ? arr3[0].smdc_trained_m : 0);
                        $('#smdc_trained_f').val(arr3[0].smdc_trained_f != null ? arr3[0].smdc_trained_f : 0);

                        var arr4 =  (<?php echo json_encode($infra_detail); ?>);
                        $('#clsrms_dptd').val(arr4[0].clsrms_dptd != null ? arr4[0].clsrms_dptd : 0);
                        $('#bld_status').val(arr4[0].bld_status);
                        $('#stus_hv_furnt').val(arr4[0].stus_hv_furnt != null ? arr4[0].stus_hv_furnt : 0);
                        $('#ahmvp_room_yn').val(arr4[0].ahmvp_room_yn);
                        $('#hand_pump_tot').val(arr4[0].hand_pump_tot != null ? arr4[0].hand_pump_tot : 0);
                        $('#hand_pump_fun').val(arr4[0].hand_pump_fun != null ? arr4[0].hand_pump_fun : 0);
                        
                        $('#well_prot_tot').val(arr4[0].well_prot_tot != null ? arr4[0].well_prot_tot : 0);
                        $('#well_prot_fun').val(arr4[0].well_prot_fun != null ? arr4[0].well_prot_fun : 0);
                        $('#well_unprot_tot').val(arr4[0].well_unprot_tot != null ? arr4[0].well_unprot_tot : 0);
                        $('#well_unprot_fun').val(arr4[0].well_unprot_fun != null ? arr4[0].well_unprot_fun : 0);
                        $('#tap_tot').val(arr4[0].tap_tot != null ? arr4[0].tap_tot : 0);
                        $('#tap_fun').val(arr4[0].tap_fun != null ? arr4[0].tap_fun : 0);
                        $('#pack_water').val(arr4[0].pack_water != null ? arr4[0].pack_water : 0);
                        $('#pack_water_fun').val(arr4[0].pack_water_fun != null ? arr4[0].pack_water_fun : 0);
                        $('#othsrc_tot').val(arr4[0].othsrc_tot != null ? arr4[0].othsrc_tot : 0);
                        $('#othsrc_fun').val(arr4[0].othsrc_fun != null ? arr4[0].othsrc_fun : 0);
                        $('#othsrc_name').val(arr4[0].othsrc_name!=null ? arr4[0].othsrc_name : 'nil');

                        $('#handwash_toil_yn').val(arr4[0].handwash_toil_yn);
                        

                        var arr5 =  (<?php echo json_encode($lib_entry_detail); ?>);
                        $.each(arr5,function(i,data)
                        {
                            // $('#ncert_books'+data.library_type).val(data.ncert_books != null ? arr[0].ppsec_yn : 0);
							                            $('#ncert_books'+data.library_type).val(data.ncert_books != null ? data.ncert_books : 0);
                        });
                    });
                    // $('#hand_pump_fun').keyup(function(){
                    //     console.log('text');
                    //     this_min = 0;
                    //     this_max = parseInt($('#hand_pump_tot').val());
                    //     this_val = parseInt($(this).val());

                    //     if(this_val < this_min || this_val > this_max){
                    //         $(this).val('');
                    //         alert('\n please entered valid number \n minimum should be 0 and maximum should be '+this_max );
                    //         $(this).focus();
                    //     }
                    // });
                    function Validate(e,id){
                        // console.log(e);
                        // console.log(e.target.id);
                        this_min = 0;
                        this_max = $.isNumeric(id) ? parseInt(id) : parseInt($('#'+id).val());
                        this_val = parseInt(e.target.value);
                        // console.log(this_max);
                        if( this_max != '' && this_max !=NaN){
                                if(this_val < this_min || this_val > this_max){
                                    $('#'+e.target.id).val('');
                                    alert('\n please entered valid number \n minimum should be 0 and maximum should be '+this_max );
                                    $('#'+e.target.id).focus();
                                }
                        }
                        else{
                          alert('\n please check previous field');
                        }
                    }
                </script>
                <!-- END PAGE LEVEL SCRIPTS -->
    </body>

</html>
	  
	  