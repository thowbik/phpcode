<!DOCTYPE html>

      <html lang="en">
         <!--<![endif]-->
         <!-- BEGIN HEAD -->
         <head>         
            <?php $this->load->view('head.php'); ?>
          
        <!-- BEGIN PAGE LEVEL PLUGINS -->
		<link href="<?php echo base_url().'asset/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css';?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url().'asset/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/css/support/custom-vivek.css';?>" rel="stylesheet" type="text/css" />
        <style>
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

         </style>
         </head>
         <!-- END HEAD -->
         <style type="text/css">
            label.error { float: none; color:#dd4b39; }
         </style>
         <body class="page-container-bg-solid page-md">
            <div class="page-wrapper">
               <?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
               <?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
               <?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 9) { ?>
               <?php $this->load->view('Ceo_District/header.php'); }else if($this->session->userdata('emis_user_type_id') == 6) { ?>
               <?php $this->load->view('beo_Block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 10) { ?>
               <?php $this->load->view('Deo_District/header.php'); }else{ ?>
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
                                   
                                    <!-- <div class="m-heading-1 border-green m-bordered">
                                       <h3>Basic Information</h3>
                                       </div> -->
                                    
									
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="tab-pane" id="tab_2">
                                             
                                       <!-- error displaying part -->
									   
											 <!-- END PAGE CONTENT INNER -->
                                       <!-- error displaying part end -->
                                                   <!-- BEGIN FORM-->
                                                   
												   <div id="London" class="tabcontent tab-pane fade in ">
                                                   
                                                        <!-- BEGIN PAGE CONTENT INNER -->
                                                      <?php if ($this->session->flashdata('staff')){ ?> 
                                                
                                                                <div class="page-content-inner">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="note note-danger note-bordered">
                                                                            <?php echo $this->session->flashdata('staff'); ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                      <?php } ?>
                                             
                                                      <div class="portlet light ">
                                                
                                                       <div class="portlet-body form" id="dialogform">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <i class=""></i>
                                                                <span class="caption-subject bold text-align"><h3>PINDICS HM Evaluation</h3></span>
                                                            </div>
                                                        </div>
														   <div class="form-body">                                                         
                                                                <div class="row">                                                           
                                                                <div class="row">
                                                                <div class="col-md-2">
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                    <font style="font-style:bold"><div id="">After observing classroom activities, students exercise and teacher self evaluation format, Headmaster has to provide remarks in the below gives 8 points in four parameters.</div></font> 
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                    </div>
                                                                </div> 
                                                                <br>
                                                                <div class="row">
                                                                <div class="col-md-4">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                    <font style="color:#dd4b39;"><div id="">Only teachers who have self evaluated will be listed here</div></font> 
                                                                    </div>
                                                                    <div class="col-md-4">
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
                                                                                <input type="hidden" name="school_key_id" id="school_key_id" value="<?php echo $this->session->userdata('emis_school_id');?>">
                                                                                <input type="hidden" name="hm_id" id="hm_id" value="<?php echo $hm_id;?>">
                                                                            
                                                                                <select class="form-control" data-placeholder="Choose a teacher" id="teacher_id" onchange="teacherinfo()" name="teacher_id" >                              <!---->
                                                                                    <option value="" >Select Teacher</option>                                                                                
                                                                                    <?php foreach($teacherinfo as $info) { ?>
                                                                                    <option value="<?php echo $info->u_id;  ?>"><?php echo $info->teacher_name; ?></option>
                                                                                    <?php   }  ?>
                                                                                </select>
                                                                                <font style="color:#dd4b39;"><div id="HM_EV_teacher_alert"></div></font>                                                                                
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
                                                                            <div class="col-md-4">
                                                                                <label class="control-label">1.Designing Learning Experiences for Children*</label>
                                                                            </div>    
                                                                            <div class="col-md-4">
                                                                            <select class="form-control" id="HM_EV_1" name="HM_EV_1" onfocus="//textvalidate(this.id,'emis_reg_staff_gender_alert');" onchange="//textvalidate(this.id,'emis_reg_staff_gender_alert');" required>
                                                                                <option value="" selected="selected">Select Option</option>
                                                                                <option value="1">Below Expectations</option>
                                                                                <option value="2">Closest to expectations</option>
                                                                                <option value="3">Meets expectations</option>
                                                                                <option value="4">Exceeds expectations</option>
                                                                            </select>
                                                                            <font style="color:#dd4b39;"><div id="HM_EV_1_alert"></div></font>
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
                                                                            <div class="col-md-4">
                                                                                <label class="control-label">2.Knowledge and Understanding of Subject Matter*</label>
                                                                            </div>    
                                                                            <div class="col-md-4">
                                                                            <select class="form-control" id="HM_EV_2" name="HM_EV_2" onfocus="//textvalidate(this.id,'emis_reg_staff_gender_alert');" onchange="//textvalidate(this.id,'emis_reg_staff_gender_alert');" required>
                                                                                <option value="" selected="selected">Select Option</option>
                                                                                <option value="1">Below Expectations</option>
                                                                                <option value="2">Closest to expectations</option>
                                                                                <option value="3">Meets expectations</option>
                                                                                <option value="4">Exceeds expectations</option>
                                                                            </select>
                                                                            <font style="color:#dd4b39;"><div id="HM_EV_2_alert"></div></font>
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
                                                                            <div class="col-md-4">
                                                                                <label class="control-label">3.Strategy for Facilitating learning*</label>
                                                                            </div>    
                                                                            <div class="col-md-4">
                                                                            <select class="form-control" id="HM_EV_3" name="HM_EV_3" onfocus="//textvalidate(this.id,'emis_reg_staff_gender_alert');" onchange="//textvalidate(this.id,'emis_reg_staff_gender_alert');" required>
                                                                                <option value="" selected="selected">Select Option</option>
                                                                                <option value="1">Below Expectations</option>
                                                                                <option value="2">Closest to expectations</option>
                                                                                <option value="3">Meets expectations</option>
                                                                                <option value="4">Exceeds expectations</option>
                                                                            </select>
                                                                            <font style="color:#dd4b39;"><div id="HM_EV_3_alert"></div></font>
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
                                                                            <div class="col-md-4">
                                                                                <label class="control-label">4.Interpersonal Relationship*</label>
                                                                            </div>    
                                                                            <div class="col-md-4">
                                                                            <select class="form-control" id="HM_EV_4" name="HM_EV_4" onfocus="//textvalidate(this.id,'emis_reg_staff_gender_alert');" onchange="//textvalidate(this.id,'emis_reg_staff_gender_alert');" required>
                                                                                <option value="" selected="selected">Select Option</option>
                                                                                <option value="1">Below Expectations</option>
                                                                                <option value="2">Closest to expectations</option>
                                                                                <option value="3">Meets expectations</option>
                                                                                <option value="4">Exceeds expectations</option>
                                                                            </select>
                                                                            <font style="color:#dd4b39;"><div id="HM_EV_4_alert"></div></font>
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
                                                                            <div class="col-md-4">
                                                                                <label class="control-label">5.Professional Development*</label>
                                                                            </div>    
                                                                            <div class="col-md-4">
                                                                            <select class="form-control" id="HM_EV_5" name="HM_EV_5" onfocus="//textvalidate(this.id,'emis_reg_staff_gender_alert');" onchange="//textvalidate(this.id,'emis_reg_staff_gender_alert');" required>
                                                                                <option value="" selected="selected">Select Option</option>
                                                                                <option value="1">Below Expectations</option>
                                                                                <option value="2">Closest to expectations</option>
                                                                                <option value="3">Meets expectations</option>
                                                                                <option value="4">Exceeds expectations</option>
                                                                            </select>
                                                                            <font style="color:#dd4b39;"><div id="HM_EV_2_alert"></div></font>
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
                                                                            <div class="col-md-4">
                                                                                <label class="control-label">6.School Development*</label>
                                                                            </div>    
                                                                            <div class="col-md-4">
                                                                            <select class="form-control" id="HM_EV_6" name="HM_EV_6" onfocus="//textvalidate(this.id,'emis_reg_staff_gender_alert');" onchange="//textvalidate(this.id,'emis_reg_staff_gender_alert');" required>
                                                                                <option value="" selected="selected">Select Option</option>
                                                                                <option value="1">Below Expectations</option>
                                                                                <option value="2">Closest to expectations</option>
                                                                                <option value="3">Meets expectations</option>
                                                                                <option value="4">Exceeds expectations</option>
                                                                            </select>
                                                                            <font style="color:#dd4b39;"><div id="HM_EV_6_alert"></div></font>
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
                                                                            <div class="col-md-4">
                                                                                <label class="control-label">7.Teacher Attendance*</label>
                                                                            </div>    
                                                                            <div class="col-md-4">
                                                                            <select class="form-control" id="HM_EV_7" name="HM_EV_7" onfocus="//textvalidate(this.id,'emis_reg_staff_gender_alert');" onchange="//textvalidate(this.id,'emis_reg_staff_gender_alert');" required>
                                                                                <option value="" selected="selected">Select Option</option>
                                                                                <option value="1">Below Expectations</option>
                                                                                <option value="2">Closest to expectations</option>
                                                                                <option value="3">Meets expectations</option>
                                                                                <option value="4">Exceeds expectations</option>
                                                                            </select>
                                                                            <font style="color:#dd4b39;"><div id="HM_EV_7_alert"></div></font>
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
                                                                            <div class="col-md-4">
                                                                                <label class="control-label">8.Promoting Health and Hygiene*</label>
                                                                            </div>    
                                                                            <div class="col-md-4">
                                                                            <select class="form-control" id="HM_EV_8" name="HM_EV_8" onfocus="//textvalidate(this.id,'emis_reg_staff_gender_alert');" onchange="//textvalidate(this.id,'emis_reg_staff_gender_alert');" required>
                                                                                <option value="" selected="selected">Select Option</option>
                                                                                <option value="1">Below Expectations</option>
                                                                                <option value="2">Closest to expectations</option>
                                                                                <option value="3">Meets expectations</option>
                                                                                <option value="4">Exceeds expectations</option>
                                                                            </select>
                                                                            <font style="color:#dd4b39;"><div id="HM_EV_8_alert"></div></font>
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
                                                                                <label class="control-label">It is found correct by verifying the school records of teacher handling the class
                                                                                        and subject and the number of days present in the school during working days
                                                                                        (2018-19) and certified that the entries are made correctly.</label>                                                                            
                                                                            </div>  
                                                                            <div class="col-md-2">
                                                                            </div>                                                          
                                                                        </div>
                                                                    </div>  
                                                                </div>
                                                                <br>

                                                
                                                     
                                                <div class="form-actions text-align" id="pindics_sub_can">
                                                    <!--<button type="submit" class="btn green" id="emis_staff_reg_sub" onclick="return popup()">Submit</button>-->
												    <button type="button" class="btn btn-primary" onclick="pindics_hm_eval();">Submit</button>
                                                    <button type="button"  onclick="location.href='<?php echo base_url().'Home/emis_school_dash';?>'" class="btn default" >Cancel</button>
                                                </div>
                                                </form>
												</div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
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
                                        <!--<div class="sa-icon sa-error animateErrorIcon" style="display: block;">
                                            <span class="sa-x-mark animateXMark">
                                                <span class="sa-line sa-left"></span>
                                                <span class="sa-line sa-right"></span>
                                            </span>
                                        </div>
                                        <div class="sa-icon sa-warning" style="display: none;">
                                            <span class="sa-body"></span>
                                            <span class="sa-dot"></span>
                                        </div>
                                        <div class="sa-icon sa-info" style="display: none;">
                                        </div>
                                        <div class="sa-icon sa-success" style="display: none;">
                                            <span class="sa-line sa-tip"></span>
                                            <span class="sa-line sa-long"></span>
                                            <div class="sa-placeholder"></div>
                                            <div class="sa-fix"></div>
                                        </div>
                                        <div class="sa-icon sa-custom" style="display: none;">
                                        </div>
                                        <h2>OK</h2>
                                        <p class="lead text-muted " style="display: block;">All field Required</p>
                                        <div class="form-group">
                                            <input type="text" class="form-control" tabindex="3" placeholder="">
                                            <span class="sa-input-error help-block">
                                            <span class="glyphicon glyphicon-exclamation-sign"></span> 
                                            <span class="sa-help-text">Not valid</span>
                                            </span>
                                        </div>-->
                                        <div role="tabpanel" class="tab-pane" id="pindics">                    
                                            <div style="text-align: center;">
                                                <h5 style="color:#4fbaa5;">Performance Indicators</h5>
                                                  <!-- <div class="alert-close">×</div> -->
                                                  <form class="form" method="post" id="teach_pindics_save" name="teach_pindics_save"
                                                         action="<?php echo base_url().'Udise_staff/pindics_insert';?>">     
                          
                          <input type="hidden" name="pi_id" id="pi_id" value="">
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
                                  </div>                                    
                            </div>
                          </div>


                          <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title" style="color: #000;"><i class="fa fa-calculator"></i> Calculation of days for Teaching Learning Process</h3>
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
                    </form>          
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
                           </div>
                           </div>
                           </div>
                        </div>
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

                           <!-- <form class="contact-form" id="myform" type="post" action="check.php">
                <input type="text" name="first_name"/>
                <input type="text" name="last_name" />
                <input type="text" name="email" id="email" />
                <input type="submit" /> -->
                <!-- <div class="form-errors"></div>
            </form> -->
            </div>
            <?php $this->load->view('footer.php'); ?>
            </div>
			<?php $this->load->view('scripts.php'); ?>




		<script src="<?php echo base_url().'asset/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js';?>" type="text/javascript"></script>
		<script src="<?php echo base_url().'asset/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js';?>" type="text/javascript"></script>
		<script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js'?>" type="text/javascript"></script>	
		 <script src="<?php echo base_url().'asset/js/vivekrao/generate.js';?>" type="text/javascript"></script>	
<script>
</script>      
            <script>
  $(document).ready(function(){
	  
    $("#orgtype").hide();
	//$("#London").show();
	var tabactive=$("#tabactive").val();
	//alert(tabactive);
	if(tabactive==1)
	{
	
	$("#Paris").show();
	$("#London").hide();
	}
   });
   function openCity(cityName) {
 
  var i;
  var x = document.getElementsByClassName("tabcontent");
  
  for(i=0;i<x.length;i++){
    x[i].style.display = "none";
  }
  document.getElementById(cityName).style.display ="block";
}
function getorgname()
	{
	  var drop= $('#emis_reg_staff_organization').val();
      if(drop == 'PTA'){
		$("#orgtype").hide();
		}
		else
		{
		$("#orgtype").show();	
		}
	}
			
/*var x = document.getElementById("UG");
				var y = document.getElementById("PG");
				x.style.display = "none";
				y.style.display = "none";
				function academicvalidate(id,alertid) {
					var text = document.getElementById(id);
					var alt = document.getElementById(alertid);
					if(text.value==''){
						alt.innerHTML="This field is required";
					}else {
						alt.innerHTML="";
					}
				
					
					var dropdown = document.getElementById("emis_reg_staff_qualificationacademic");
					var current_value1 = dropdown.options[dropdown.selectedIndex].value;
					
					if (current_value1 == "4") {
						
						document.getElementById("UG").style.display = "block";
						document.getElementById("PG").style.display = "none";
                        $('#PG option:selected').removeAttr('selected');
						
					}else if(current_value1 == "5" || current_value1 == "6" || current_value1 == "7" || current_value1 == "8"){
						document.getElementById("UG").style.display = "block";
						document.getElementById("PG").style.display = "block";
					}else{
						document.getElementById("UG").style.display = "none";
						document.getElementById("PG").style.display = "none";
                        $('#UG option:selected').removeAttr('selected');
                        $('#PG option:selected').removeAttr('selected');
					}
				}*/
function hasWhiteSpace(s) {
    var str=s.value;
    if((str.charCodeAt(str.length-1)==32) && (str.charCodeAt(str.length-2)==32)){
    str = str.slice(0, -1);
    s.value=str;
    }
}				
function mobilevalidate(id,alertid){
    var mobpattern = /^[6789]\d{9}$/;
    var text = document.getElementById(id);
    var alt = document.getElementById(alertid);
    if(text.value==''){
        alt.innerHTML="This field is required";
        return false;
    }else if(!text.value.match(mobpattern)){
        alt.innerHTML="Enter valid mobile number";
        return false;
    }else {
        alt.innerHTML="";
    }
}
function emailvalidate(id,alertid){
    var emailreg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var text = document.getElementById(id);
    var alt = document.getElementById(alertid);
    if(text.value==''){
        alt.innerHTML="This field is required";
        return false;
    }else if(!text.value.match(emailreg)){
        alt.innerHTML="Enter valid Email";
        return false;
    }else {
        alt.innerHTML="";
    }
}

function teacherinfo(){
      //  alert("hai");
        var teacher_id = document.getElementById("teacher_id").value;
      //  alert(teacher_id);
        if(teacher_id != ''){
            $("#teach_pindics_view").show();
            $.ajax(
		            {
			data:{'teacher_id':teacher_id},
			//alert(data);
            //url:baseurl+'Udise_staff/pindics_teacher_eval_insert',
            url:baseurl+'Udise_staff/pindics_single_teachr_data',
			type:"POST",
			dataType:"JSON",
			success:function(res)
			{	
                //console.log(res['0']['HM_EV_1']);		
				//swal("OK", "Teacher PINDICS updated Successfully", "success");
				//window.location.reload();	
                document.getElementById("HM_EV_1").value=res['0']['HM_EV_1'];
                document.getElementById("HM_EV_2").value=res['0']['HM_EV_2'];
                document.getElementById("HM_EV_3").value=res['0']['HM_EV_3'];
                document.getElementById("HM_EV_4").value=res['0']['HM_EV_4'];
                document.getElementById("HM_EV_5").value=res['0']['HM_EV_5'];
                document.getElementById("HM_EV_6").value=res['0']['HM_EV_6'];
                document.getElementById("HM_EV_7").value=res['0']['HM_EV_7'];
                document.getElementById("HM_EV_8").value=res['0']['HM_EV_8'];	                
                if(res[0]['hm_ev_status'] == "1"){
                    $("#pindics_sub_can").hide();
                    // $("#teach_pindics_view").show();
                }                	
			}
		    });
        }
    }

function pindics_hm_eval()
{
    
	var teacher_id=$("#teacher_id").val();
	var school_key_id=$("#school_key_id").val();
    var hm_id=$("#hm_id").val();
	var HM_EV_1=$("#HM_EV_1").val();
	var HM_EV_2=$("#HM_EV_2").val();
	var HM_EV_3=$("#HM_EV_3").val();
	//var HM_EV_3=document.getElementById("HM_EV_3").value; 
	var HM_EV_4=$("#HM_EV_4").val();
	var HM_EV_5=$("#HM_EV_5").val();
	var HM_EV_6=$("#HM_EV_6").val();
	var HM_EV_7=$("#HM_EV_7").val();
	var HM_EV_8=$("#HM_EV_8").val();
	//var ug=$("#emis_reg_staff_ug").val();
	//var pg=$("#emis_reg_staff_pg").val();
	if(teacher_id=='' || HM_EV_1=='' || HM_EV_2=='' || HM_EV_3=='' || HM_EV_4=='' || HM_EV_5=='' || HM_EV_6=='' || HM_EV_7=='' || HM_EV_8=='')
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
			data:{'teacher_id':teacher_id,'hm_id':hm_id,'HM_EV_1':HM_EV_1,'HM_EV_2':HM_EV_2,'HM_EV_3':HM_EV_3,'HM_EV_4':HM_EV_4,'HM_EV_5':HM_EV_5,'HM_EV_6':HM_EV_6,'HM_EV_7':HM_EV_7,'HM_EV_8':HM_EV_8},
			//alert(data);
            url:baseurl+'Udise_staff/pindics_hm_eval_insert',
			type:"POST",
			dataType:"JSON",
			success:function(res)
			{				
				// swal("OK", "Teacher PINDICS updated Successfully", "success");
                alert("Teacher PINDICS updated Successfully");
				window.location.reload();					
			}
		    });
	
	}	

    		
				
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
                // console.log(res);
                if(res[0]['class_1'] != null){
                $.each(res[0]['class_1'].split(","), function(i,e){
                    $("#class1 option[value='" + e + "']").prop("selected", true);
                });
                }
                if(res[0]['class_2'] != null){
                    $.each(res[0]['class_2'].split(","), function(i,e){
                    $("#class2 option[value='" + e + "']").prop("selected", true);
                });
                }
                if(res[0]['class_3'] != null){
                $.each(res[0]['class_3'].split(","), function(i,e){
                    $("#class3 option[value='" + e + "']").prop("selected", true);
                });
                }
                if(res[0]['class_4'] != null){
                $.each(res[0]['class_4'].split(","), function(i,e){
                    $("#class4 option[value='" + e + "']").prop("selected", true);
                });
                }
                if(res[0]['class_5'] != null){
                $.each(res[0]['class_5'].split(","), function(i,e){
                    $("#class5 option[value='" + e + "']").prop("selected", true);
                });
                }
                if(res[0]['class_6'] != null){  
                $.each(res[0]['class_6'].split(","), function(i,e){
                    $("#class6 option[value='" + e + "']").prop("selected", true);
                });
                }
                if(res[0]['class_7'] != null){
                $.each(res[0]['class_7'].split(","), function(i,e){
                    $("#class7 option[value='" + e + "']").prop("selected", true);
                });
                }
                if(res[0]['class_8'] != null){
                $.each(res[0]['class_8'].split(","), function(i,e){
                    $("#class8 option[value='" + e + "']").prop("selected", true);
                });
                }
              
                document.getElementById("availed_cl").value=res['0']['cl'];
                document.getElementById("availed_el").value=res['0']['el'];                
                document.getElementById("availed_ml").value=res['0']['ml'];
                document.getElementById("availed_maternity_leave").value=res['0']['maternity_leave'];
                document.getElementById("other_leave").value=res['0']['other_leave'];
                document.getElementById("training_attended").value=res['0']['traing_atnd'];
                document.getElementById("training_given").value=res['0']['traing_givn'];
                document.getElementById("election_duty").value=res['0']['electn_dty_atnd'];
                document.getElementById("on_duty").value=res['0']['duty_days'];
                document.getElementById("class_activity").value=res['0']['clas_rm_actvty_dys'];
                document.getElementById("tot_work_days").value=res['0']['tot_wrk_days'];
                
                if(res[0]['lesson_plan'] == '0'){
                    document.getElementById('lesson_plan_0').checked = res[0]['lesson_plan'];              
                }else{
                    document.getElementById('lesson_plan_1').checked = res[0]['lesson_plan'];
                }
                if(res[0]['teach_learn_matrl'] == '0'){
                    document.getElementById('teach_learn_matrl_0').checked = res[0]['teach_learn_matrl'];              
                }else{
                    document.getElementById('teach_learn_matrl_1').checked = res[0]['teach_learn_matrl'];
                }
                if(res[0]['lesson_act'] == '0'){
                    document.getElementById('lesson_act_0').checked = res[0]['lesson_act'];              
                }else{
                    document.getElementById('lesson_act_1').checked = res[0]['lesson_act'];
                }
                if(res[0]['life_skill_act'] == '0'){
                    document.getElementById('life_skill_act_0').checked = res[0]['life_skill_act'];              
                }else{
                    document.getElementById('life_skill_act_1').checked = res[0]['life_skill_act'];
                }
                if(res[0]['prj_based_act'] == '0'){
                    document.getElementById('prj_based_act_0').checked = res[0]['prj_based_act'];              
                }else{
                    document.getElementById('prj_based_act_1').checked = res[0]['prj_based_act'];
                }              
              
                document.getElementById('public_speaking').checked = res[0]['public_speaking'];
                document.getElementById('advertising').checked = res[0]['advertising'];
                document.getElementById('public_speaking').checked = res[0]['public_speaking'];
                document.getElementById('graphics').checked = res[0]['graphics'];
                document.getElementById('music').checked = res[0]['music'];
                document.getElementById('art_craft').checked = res[0]['art_craft'];
                document.getElementById('story_telling').checked = res[0]['story_telling'];
                document.getElementById('draw_paint').checked = res[0]['draw_paint'];
                document.getElementById('writing_poem').checked = res[0]['writing_poem'];
                document.getElementById('yoga').checked = res[0]['yoga'];
                document.getElementById('singing').checked = res[0]['singing'];
                document.getElementById('sports_act').checked = res[0]['sports_act'];
                document.getElementById('photography').checked = res[0]['photography'];
                document.getElementById('essay_writing').checked = res[0]['essay_writing'];
                document.getElementById('video_creation').checked = res[0]['video_creation'];
                document.getElementById('comp_skills').checked = res[0]['comp_skills'];
                document.getElementById('creativity').checked = res[0]['creativity'];
                document.getElementById('innovation').checked = res[0]['innovation'];
                document.getElementById('foreign_lang').checked = res[0]['foreign_lang'];
                document.getElementById('sign_lang').checked = res[0]['sign_lang'];
                document.getElementById('cultrl_act').checked = res[0]['cultrl_act'];
                document.getElementById('spk_many_lang').checked = res[0]['spk_many_lang'];

                document.getElementById('P1_1').value = res[0]['P1_1'];
                document.getElementById('P1_2').value = res[0]['P1_2'];
                document.getElementById('P1_3').value = res[0]['P1_3'];
                document.getElementById('P1_4').value = res[0]['P1_4'];
                document.getElementById('P1_5').value = res[0]['P1_5'];
                document.getElementById('P1_5').value = res[0]['P1_5'];
                document.getElementById('P1_6').value = res[0]['P1_6'];
                document.getElementById('P1_7').value = res[0]['P1_7'];
                document.getElementById('P2_1').value = res[0]['P2_1'];
                document.getElementById('P2_2').value = res[0]['P2_2'];
                document.getElementById('P2_3').value = res[0]['P2_3'];
                document.getElementById('P2_4').value = res[0]['P2_4'];
                document.getElementById('P2_5').value = res[0]['P2_5'];
                document.getElementById('P3_A_1').value = res[0]['P3_A_1'];
                document.getElementById('P3_A_2').value = res[0]['P3_A_2'];
                document.getElementById('P3_A_3').value = res[0]['P3_A_3'];
                document.getElementById('P3_A_4').value = res[0]['P3_A_4'];
                document.getElementById('P3_A_5').value = res[0]['P3_A_5'];
                document.getElementById('P3_A_6').value = res[0]['P3_A_6'];
                document.getElementById('P3_A_7').value = res[0]['P3_A_7'];
                document.getElementById('P3_A_8').value = res[0]['P3_A_8'];
                document.getElementById('P3_B_1').value = res[0]['P3_B_1'];
                document.getElementById('P3_B_2').value = res[0]['P3_B_2'];
                document.getElementById('P3_B_3').value = res[0]['P3_B_3'];
                document.getElementById('P3_B_4').value = res[0]['P3_B_4'];
                document.getElementById('P3_B_5').value = res[0]['P3_B_5'];
                document.getElementById('P3_B_6').value = res[0]['P3_B_6'];
                document.getElementById('P3_B_7').value = res[0]['P3_B_7'];
                document.getElementById('P3_B_8').value = res[0]['P3_B_8'];
                document.getElementById('P3_C_1').value = res[0]['P3_C_1'];
                document.getElementById('P3_C_2').value = res[0]['P3_C_2'];
                document.getElementById('P3_C_3').value = res[0]['P3_C_3'];
                document.getElementById('P3_C_4').value = res[0]['P3_C_4'];
                document.getElementById('P3_C_5').value = res[0]['P3_C_5'];
                document.getElementById('P4_A_1').value = res[0]['P4_A_1'];
                document.getElementById('P4_A_2').value = res[0]['P4_A_2'];
                document.getElementById('P4_A_3').value = res[0]['P4_A_3'];
                document.getElementById('P4_A_4').value = res[0]['P4_A_4'];
                document.getElementById('P4_A_5').value = res[0]['P4_A_5'];
                document.getElementById('P4_B_1').value = res[0]['P4_B_1'];
                document.getElementById('P4_B_2').value = res[0]['P4_B_2'];
                document.getElementById('P4_C_1').value = res[0]['P4_C_1'];
                document.getElementById('P4_C_2').value = res[0]['P4_C_2'];
                document.getElementById('P5_A_1').value = res[0]['P5_A_1'];
                document.getElementById('P5_A_2').value = res[0]['P5_A_2'];
                document.getElementById('P5_A_3').value = res[0]['P5_A_3'];
                document.getElementById('P5_B_1').value = res[0]['P5_B_1'];
                document.getElementById('P5_B_2').value = res[0]['P5_B_2'];
                document.getElementById('P5_B_3').value = res[0]['P5_B_3'];
                document.getElementById('P6_1').value = res[0]['P6_1'];
                document.getElementById('P6_2').value = res[0]['P6_2'];
                document.getElementById('P6_3').value = res[0]['P6_3'];
                document.getElementById('P6_4').value = res[0]['P6_4'];
                document.getElementById('P6_5').value = res[0]['P6_5'];
                document.getElementById('P7_1').value = res[0]['P7_1'];
                document.getElementById('P7_2').value = res[0]['P7_2'];
                document.getElementById('P8_1').value = res[0]['P8_1'];
                document.getElementById('P8_2').value = res[0]['P8_2'];
                document.getElementById('P8_3').value = res[0]['P8_3'];

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
$(document).ready(function() {
	$('.alert-close').on('click', function(){
		$("#teach_popup").hide();
	});	
});	
        </script>
    </body>
</html>