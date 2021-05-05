

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
         </head>
         <!-- END HEAD -->
         <body class="page-container-bg-solid page-md">
            <div class="page-wrapper">
              <?php
          $user_type_id=$this->session->userdata('emis_user_type_id');

          if($user_type_id==1){
            $this->load->view('header.php');
          } else if($user_type_id==2){
             $this->load->view('block/header.php');
          } else if($user_type_id==3){
             $this->load->view('district/header.php');
          } else if($user_type_id==5){
             $this->load->view('state/header.php');
          }
         ?>
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
                                    <h1>StudentProfile
                                       <small>Academic Information</small>
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
                                    <!-- <div class="m-heading-1 border-green m-bordered">
                                       <h3>Basic Information</h3>
                                       </div> -->
                                        <?php $studentid=$this->uri->segment(3,0); ?>
                              <center>
                                    <?php $dash_url="";
                          $user_type_id=$this->session->userdata('emis_user_type_id'); 
                          if($user_type_id==1){  $this->load->view('emis_school_profile_header1.php'); }
                          if($user_type_id==5){  $this->load->view('state/emis_state_profile_header1.php');  }?>
                                       
                               <?php ?>
                                    </center>
                                    <div class="portlet-body">
                                         <div class="mt-element-step">
                                            <div class="row step-thin">
                                                <a href="<?php echo base_url().'Home/emis_student_profile1/'.$studentid;?>"><div class="col-md-3 bg-grey-steel mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">1</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Step 1</div>
                                                    <div class="mt-step-content font-grey-cascade">Personal info</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Home/emis_student_profile2/'.$studentid;?>"><div class="col-md-3 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">2</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Step 2</div>
                                                    <div class="mt-step-content font-grey-cascade">Family</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Home/emis_student_profile3/'.$studentid;?>"><div class="col-md-3 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">3</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Step 3</div>
                                                    <div class="mt-step-content font-grey-cascade">Communication</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Home/emis_student_profile4/'.$studentid;?>"><div class="col-md-3 bg-grey mt-step-col active">
                                                    <div class="mt-step-number bg-white font-grey">4</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Step 4</div>
                                                    <div class="mt-step-content font-grey-cascade">Academic</div>
                                                </div></a>
                                                
                                            </div>
                                         </div>
                                         </div>

                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="mt-checkbox-inline">
                                             <!-- <label class="mt-checkbox mt-checkbox-outline">
                                                <input type="checkbox" id="autoopen">&nbsp;Auto-open next field
                                                <span></span>
                                                </label> -->
                                             <!--  <label class="mt-checkbox mt-checkbox-outline">
                                                <input type="checkbox" id="inline">&nbsp;Inline editing
                                                <span></span>
                                                </label> -->
                                          <button id="enable" class="btn green edit1122">Enable / Disable Editor Mode</button>
                                               <?php  
                                                 $this->load->database();
                                                 $this->load->model('Homemodel');
                                                 $user_type_id=$this->session->userdata('emis_user_type_id');
                                                 $studentid = $this->session->userdata('emis_stud_id');
                                                 $stuprofile1  = $this->Homemodel->getstuprofile1($studentid);
                                                 $school_id=$this->session->userdata('emis_school_id');
                                                 $getschoolid=$stuprofile1[0]->school_id;
                                                if($user_type_id==1){  
                                                
                                                $studentid = $this->session->userdata('emis_stud_id'); 
                                                $studentfalg = $this->Homemodel->getstuflag($studentid);
                                                if($studentfalg==0){

                                                 if($school_id==$getschoolid){
                                                $studentid = $this->session->userdata('emis_stud_id'); 
                                                $studentfalg = $this->Homemodel->getstuflag($studentid);
                                                ?> 
                                                <input type="hidden" id="emis_stu_transfer4_id" name="emis_stu_transfer4_id" value="<?php echo $studentid; ?>">

                                                <button id="emis_stu_transfer4" name="emis_stu_transfer4" class="btn green" >Transfer</button>
                                                 <?php } ?>


                                                <?php } else {
                                                     $studentid = $this->session->userdata('emis_stud_id'); 
                                                  $studentfalg = $this->Homemodel->getstuflag($studentid);
                                                 ?>
                                                <button id="emis_stu_admit" name="emis_stu_admit" class="btn green">Admit
                                                </button>
                                                <?php }  } ?>
                                          </div>
                                       </div>
                                    </div>

                                    
                                    <div class="portlet light portlet-fit ">
                                       <div class="portlet-title">
                                          <div class="caption">
                                             <i class="icon-settings font-dark"></i>
                                             <span class="caption-subject font-dark sbold uppercase">Academic Information step 4</span>
                                          </div>
                                       </div>
                                       <div class="portlet-body">
                                         <!-- error reporting start -->
                                                       <?php if ($this->session->flashdata('schemes')){ ?> 
                                                <!-- BEGIN PAGE CONTENT INNER -->
                                                   <div class="page-content-inner">
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="note note-danger note-bordered">
                                                               <?php echo $this->session->flashdata('schemes'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <!-- END PAGE CONTENT INNER -->
                                             <?php } ?>
                                             <!-- error reporting End -->
                                          <div class="row">
                                             <div class="col-md-12">
                                                <table id="user" class="table table-bordered table-striped">
                                                   <tbody>
                                                   <tr>
                                                         <td style="width:15%"> School name : </td>
                                                         <td style="width:50%">
                                                             <?php echo $school_name; ?>  
                                                         </td>
                                                         <td style="width:35%">
                                                            <span class="text-muted"> Help text </span>
                                                         </td>  
                                                      </tr>
                                                    <tr>
                                                     <td style="width:15%"> School Udise Code : </td>
                                                         <td style="width:50%">
                                                            <?php echo $school_udisecode; ?>  
                                                         </td>
                                                         <td style="width:35%">
                                                            <span class="text-muted"> Help text </span>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td style="width:15%"> Admission Number : </td>
                                                         <td style="width:50%">
                                                            <a href="javascript:;" id="emsi_school_admission_no" data-type="text" data-pk="0" data-url="<?php echo base_url().'Home/updatestuprofile';?>"  data-original-title="Enter Admission number"> <?php echo $school_admission_no; ?> </a> 
                                                         </td>
                                                         <td style="width:35%">
                                                            <span class="text-muted"> Help text </span>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td style="width:15%"> Date of Joining: </td>
                                                         <td style="width:50%">
                                                            <a href="javascript:;" id="doj" data-type="date" data-pk="2" data-url="<?php echo base_url().'Home/updatestuprofile';?>"  data-original-title="Enter Date of Joining"><?php echo $doj; ?></a> 
                                                         </td>
                                                         <td style="width:35%">
                                                            <span class="text-muted"> Help text </span>
                                                         </td>
                                                      </tr>
                                                    <!--   <tr>
                                                         <td>  Medium of instruction: </td>
                                                         <td style="width:50%">
                                                            <a href="javascript:;" id="education_medium_name" data-type="text" data-pk="1" data-url="<?php echo base_url().'Home/updatestuprofile';?>"  data-original-title="Enter Pincode"> <?php echo $education_medium_name; ?> </a> 
                                                         </td>
                                                         <td>
                                                            <span class="text-muted"> Select2 (dropdown mode) </span>
                                                         </td>
                                                      </tr> -->
                                                   </tbody>
                                                </table>
                                               <?php $studentid =  $this->uri->segment(3,0); ?>

                                                <form class="form-horizontal"  id="Academic_edit_form" name="Academic_edit_form" method="post" action="<?php echo base_url().'Home/Academic_edit/'.$studentid;?>">
                                                
                                                   <div class="form-body col-md-12">
                                                      <div class="row">
                                                         
                                                            <div class="col-md-4">
                                                               <div class="form-group col-md-12" >
                                                                  <label class="control-label">Class Studying :  <?php if($classname == 13) { echo 'LKG'; } else if($classname == 14) { echo 'UKG'; } else if($classname == 15) { echo 'PreKG'; } else { echo $class_studying_id; } ?></label>
                                                                  <select class="form-control acedit" data-placeholder="Choose a Category" tabindex="1" id="emis_class_studying_edit" name="emis_class_studying_edit" style="display: none;">
                                                                     <option value="" >Select Class Studying</option>
                                                                   

                                                                  <?php 
                                                                       
                                                                        foreach($classlist as $cl){ ?>
                                                                     <option value="<?php echo $cl['id'];  ?>"><?php echo $cl['class_studying'];  ?></option>
                                                                     <?php   }  ?>
                                                                  </select>
                                                                  <font style="color:#dd4b39;">
                                                                     <div id="emis_class_studying_edit_alert"></div>
                                                                  </font>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                               <div class="form-group col-md-12" >
                                                                  <label class="control-label">Section : <?php echo $class_section; ?></label>
                                                                  <select class="form-control acedit" data-placeholder="Choose a Category" tabindex="1" id="emis_reg_stu_section_edit" name="emis_reg_stu_section_edit" style="display: none;">
                                                                     <option value="" style="color:#bfbfbf;">Select Section</option>
                                                                     
                                                                     <?php   $a=explode(',',$sections);
                                                                        foreach($a as $v){ ?>
                                                                     <option value="<?php echo $v;  ?>" <?php if($v==$class_section){ ?> selected<?php  } ?>><?php echo $v;  ?></option>
                                                                     <?php   }  ?>
                                                                  </select>
                                                                  <font style="color:#dd4b39;">
                                                                     <div id="emis_reg_stu_section_edit_alert"></div>
                                                                  </font>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-4" >
                                                               <div class="form-group col-md-12" >
                                                                  <label class="control-label">Previous class studied:<?php echo $prev_class; ?></label>
                                                                  <select class="form-control acedit" data-placeholder="Choose a Category" tabindex="1" id="emis_prev_class_edit" name="emis_prev_class_edit" style="display: none;">
                                                                  <option value="" style="color:#bfbfbf;">Select Previous Class</option>
                                                                     <?php if(!empty($prvclasslist)){  foreach ($prvclasslist as $prv) { 
                                                                        ?>
                                                                     <option value="<?php echo $prv->id; ?>" <?php if($prev_class_id==$prv->id){ ?> selected<?php } ?>><?php echo $prv->class_studying; ?></option>
                                                                     <?php  } } ?>
                                                                  </select>
                                                                  <font style="color:#dd4b39;">
                                                                     <div id="emis_prev_class_edit_alert"></div>
                                                                  </font>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-4" >
                                                               <div class="form-group col-md-12" >
                                                                  <label class="control-label">Medium of instruction: <?php foreach($education_medium_name as $medium); { echo $medium['MEDINSTR_DESC'];} ?></label>
                                                                  <select class="form-control acedit" data-placeholder="Choose a Category" tabindex="1" id="emis_reg_mediofinst_edit" name="emis_reg_mediofinst_edit" style="display: none;">
                                                                     <option value="" >Select Medium of instruction </option>
                                                                       <?php foreach($mediumofinstruction as $moi){?>
                                                                         <option value="<?php echo $moi['medium_instrut'];?>"><?php echo $moi['MEDINSTR_DESC']; ?></option>

                                                                        <?php } ?>

                                                                  </select>
                                                                  <font style="color:#dd4b39;">
                                                                     <div id="emis_reg_mediofinst_edit_alert"></div>
                                                                  </font>
                                                               </div>
                                                            </div>
															
																												
															

                                                            <?php if($groupcateid!=""){  if(($groupcateid!="11" && $groupcateid!="12" && $groupcateid!="28" && $groupcateid!="29" &&$groupcateid!="33" && $groupcateid!="34") && ($class_studying_id=='XI' || $class_studying_id == 'XII') ){   ?>
                                                            <div class="col-md-4 groupcode11" >
                                                               <div class="form-group col-md-12" >
                                                                  <label class="control-label">Group code - for 11 and 12 : <?php echo $group_code_name; ?></label>
                                                                  
                                                                  <select class="form-control acedit" data-placeholder="Choose a Category" tabindex="1" id="emis_reg_grup_code_edit" name="emis_reg_grup_code_edit" style="display: none;">
                                                                     <option value="" >Select Group code</option>
                                                                     <?php foreach($groupcate as $gro) {   ?>
                                                                     <option value="<?php echo $gro->id;  ?>" <?php if($group_code_id==$gro->id){ ?> selected<?php } ?>><?php echo 
                                                          $gro->group_code.' - '.$gro->group_name  ?></option>
                                                                     <?php   }  ?>
                                                                  </select>
                                                                  <font style="color:#dd4b39;">
                                                                     <div id="emis_reg_grup_code_edit_alert"></div>
                                                                  </font>
                                                                  
                                                               </div>
                                                            </div>
                                                            <?php } } ?>

                                                            <input type="hidden" name="groupcateid_edit" id="groupcateid_edit" 
                                                               value="<?php echo $groupcateid; ?>">
                                                            <?php if($groupcateid!=""){ if(($groupcateid=="11" || $groupcateid=="12" || $groupcateid=="28" || $groupcateid=="29" ||$groupcateid=="33" || $groupcateid=="34") && ($class_studying_id=='XI' || $class_studying_id == 'XII')){ ?>
                                                            <div class="col-md-4 groupcode11" >
                                                               <div class="form-group col-md-12" >
                                                                  <label class="control-label">CBSC Subject 1:<?php echo $cbse_subject1_id; ?></label>
                                                                  <select class="form-control acedit" data-placeholder="Choose a Category" tabindex="1" id="emis_reg_cbsc_sub1_edit" name="emis_reg_cbsc_sub1_edit" style="display: none;">
                                                                     <option value="" >Select CBSC Subject 1</option>
                                                                     <?php foreach($groupcate as $gro) {   ?>
                                                                     <option value="<?php echo $gro->id;  ?>" <?php if($cbse_subject1_id==$gro->group_name){ ?> selected<?php } ?>><?php echo $gro->group_name  ?></option>
                                                                     <?php   }  ?>
                                                                  </select>
                                                                  <font style="color:#dd4b39;">
                                                                     <div id="emis_reg_cbsc_sub1_edit_alert"></div>
                                                                  </font>
                                                               </div>
                                                            </div>
                                                            
                                                            
                                                            <div class="col-md-4 groupcode11" >
                                                               <div class="form-group col-md-12" >
                                                                  <label class="control-label">CBSC Subject 2:<?php echo $cbse_subject2_id; ?></label>
                                                                  <select class="form-control acedit" data-placeholder="Choose a Category" tabindex="1" id="emis_reg_cbsc_sub2_edit" name="emis_reg_cbsc_sub2_edit" style="display: none;">
                                                                     <option value="" >Select CBSC Subject 2</option>
                                                                     <?php foreach($groupcate as $gro) {   ?>
                                                                     <option value="<?php echo $gro->id;  ?>" <?php if($cbse_subject2_id==$gro->group_name){ ?> selected<?php } ?>><?php echo $gro->group_name  ?></option>
                                                                     <?php   }  ?>
                                                                  </select>
                                                                  <font style="color:#dd4b39;">
                                                                     <div id="emis_reg_cbsc_sub2_edit_alert"></div>
                                                                  </font>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-4 groupcode11" >
                                                               <div class="form-group col-md-12">
                                                                  <label class="control-label">CBSC Subject 3:<?php echo $cbse_subject3_id; ?></label>
                                                                  <select class="form-control acedit" data-placeholder="Choose a Category" tabindex="1" id="emis_reg_cbsc_sub3_edit" name="emis_reg_cbsc_sub3_edit" style="display: none;">
                                                                     <option value="" >Select CBSC Subject 3</option>
                                                                     <?php foreach($groupcate as $gro) {   ?>
                                                                     <option value="<?php echo $gro->id;  ?>" <?php if($cbse_subject3_id==$gro->group_name){ ?> selected<?php } ?>><?php echo $gro->group_name  ?></option>
                                                                     <?php   }  ?>
                                                                  </select>
                                                                  <font style="color:#dd4b39;">
                                                                     <div id="emis_reg_cbsc_sub3_edit_alert"></div>
                                                                  </font>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-4 groupcode11" >
                                                               <div class="form-group col-md-12" >
                                                                  <label class="control-label">CBSC Subject 4:<?php echo $cbse_subject4_id; ?></label>
                                                                  <select class="form-control acedit" data-placeholder="Choose a Category" tabindex="1" id="emis_reg_cbsc_sub4_edit" name="emis_reg_cbsc_sub4_edit" style="display: none;">
                                                                     <option value="" >Select CBSC Subject 4</option>
                                                                     <?php foreach($groupcate as $gro) {   ?>
                                                                     <option value="<?php echo $gro->id;  ?>" <?php if($cbse_subject4_id==$gro->group_name){ ?> selected<?php } ?>><?php echo $gro->group_name  ?></option>
                                                                     <?php   }  ?>
                                                                  </select>
                                                                  <font style="color:#dd4b39;">
                                                                     <div id="emis_reg_cbsc_sub4_edit_alert"></div>
                                                                  </font>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-4 groupcode11" >
                                                               <div class="form-group col-md-12" >
                                                                  <label class="control-label">CBSC Optionl Subject:<?php echo $cbse_opt_subject_id; ?></label>
                                                                  <select class="form-control  acedit" data-placeholder="Choose a Category" tabindex="1" id="emis_reg_cbsc_sub5_edit" name="emis_reg_cbsc_sub5_edit" style="display: none;">
                                                                     <option value="" >Select CBSC Optional Subject</option>
                                                                     <?php foreach($groupcate as $gro) {   ?>
                                                                     <option value="<?php echo $gro->id;  ?>" <?php if($cbse_opt_subject_id==$gro->group_name){ ?> selected<?php } ?>><?php echo $gro->group_name  ?></option>
                                                                     <?php   }  ?>
                                                                  </select>
                                                                  <font style="color:#dd4b39;">
                                                                     <div id="emis_reg_cbsc_sub5_edit_alert"></div>
                                                                  </font>
                                                               </div>
                                                            </div>
                                                            <?php }   } ?>
                                                            <?php $cateid=""; foreach($managecateid as $mid){ 
                                                               $cateid= $mid->manage_name;  } ?>
                                                            <input type="hidden" name="emis_reg_stu_rte_hidden_edit" id="emis_reg_stu_rte_hidden_edit" value="<?php echo $cateid;  ?>">
                                                            <?php if($cateid=="Un-aided"){?>
                                                            <div class="col-md-4" >
                                                               <div class="form-group col-md-12" >
                                                                  <label class="control-label">Came through RTE 25%: <?php echo $rte; ?></label>
                                                                  <select class="form-control acedit" data-placeholder="Choose a Category" tabindex="1" id="emis_reg_stu_rte_edit" name="emis_reg_stu_rte_edit" style="display: none;">
                                                                     <option value="" >Select Came through RTE 25%</option>
                                                                     <option value="Yes" <?php if($rte=="Yes"){ ?> selected<?php } ?>>Yes</option>
                                                                     <option value="No" <?php if($rte=="No"){ ?> selected<?php } ?>>No</option>
                                                                  </select>
                                                                  <font style="color:#dd4b39;">
                                                                     <div id="emis_reg_stu_rte_edit_alert"></div>
                                                                  </font>
                                                               </div>
                                                            </div>
                                                            <?php } else if($cateid=="Aided"){ ?> 
                                                            <div class="col-md-4" >
                                                               <div class="form-group col-md-12" >
                                                                  <label class="control-label">Aided or Un-Aided Section  : <?php echo $aidunaid; ?></label>
                                                                  <select class="form-control acedit" data-placeholder="Choose a Category" tabindex="1" id="emis_reg_stu_aidunaid_edit" name="emis_reg_stu_aidunaid_edit" style="display: none;">
                                                                     <option value="" >Select Aided or Un-Aided Section</option>
                                                                     <option value="Aided"  <?php if($aidunaid=="Aided"){ ?> selected<?php } ?>>Aided</option>
                                                                     <option value="Unaided" <?php if($aidunaid=="Unaided"){ ?> selected<?php } ?>>Unaided</option>
                                                                  </select>
                                                                  <font style="color:#dd4b39;">
                                                                     <div id="emis_reg_stu_aidunaid_edit_alert"></div>
                                                                  </font>
                                                               </div>
                                                            </div>
                                                            <?php } ?>
                                                            </div>
                                                         </div>
                                                      <!--<div class="row">
													  <div class="col-md-12">
													  <div class="col-md-4">
															 <div class="form-group col-md-12" >
															 <label class="control-label">Out of school children</label>
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="" id="" name="" >
                                                                 <option value="" style="color:#bfbfbf;">Select the Category</option>
                                                              <option value="01">Enrolled in special training centres</option>
                                                              <option value="02">Directly enrolled in schools</option>
                                                              <option value="03">Dropped out again</option>
                                                              <option value="04">Migrated</option>
                                                              <option value="05">Continue schooling after mainstreaming</option>
                                                            </select>
                                                        </div>
														</div>
														</div>
													  </div>
													  
													  <label><h3>Bank Details</h3></label>
                                                         <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Name of the Bank:</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="" name="" maxlength="100" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" >
                                                                     <font style="color:#dd4b39;"><div id="emis_reg_staff_name_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															
															
															
															<div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">IFSC Code:</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="" name="" maxlength="11" onkeypress="return event.charCode >= 48 && event.charCode <= 57" >
                                                                     <font style="color:#dd4b39;"><div id="emis_reg_staff_cps_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
														
															
															
															
															</div>
															<div class="row">
															
														
															
															<div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">A/c no:</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="" name="" maxlength="30" onkeypress="return event.charCode >= 48 && event.charCode <= 57" >
                                                                     <font style="color:#dd4b39;"><div id="emis_reg_staff_cps_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															
															
															<div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Bank Address:</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="" name="" maxlength="200">
                                                                     <font style="color:#dd4b39;"><div id="emis_reg_staff_cps_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															
															
															</div>-->
													  
													  
													  <hr>
													  
                                                      <div class="col-md-12">
                                                         <center>
                                               
                                                            <button  type="submit" id="Academic_update_edit" name="Academic_update_edit"  class="btn green" disabled
                                                            >Update</button>
                                                         </center>
                                                      </div>
                                                   
                                                </form>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
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
               <input type="hidden" id="classstudying1" value="<?php echo $class_studying_id; ?>" />
              <input type="hidden" id="created_at1" value="<?php echo $created_at; ?>" />
               <?php $this->load->view('footer.php'); ?>
            </div>
            <?php $this->load->view('scripts.php'); ?>
            

            <script type="text/javascript">
        function clicktransfer1(value){
          var studid="<?php echo $student_id; ?>";
            if(!confirm('Are you sure want to Transfer this Student?')){
            e.preventDefault();
            return false;
            }

            // alert(studid);

            $.ajax({
            type: "POST",
            url:baseurl+'Home/emis_student_transfer',
            data:"&stud_id="+value,
            success: function(resp){     
                  if(resp==true){
                    window.location.href = baseurl+'Home/emis_student_profile4/'+studid;  
                  } else {
                    alert('You have not privilages to transfer this student! Please Try some one.');
                    return false;
                  }        
             },
            error: function(e){ 
            alert('Error: ' + e.responseText);
            return false;  

            }
            });
    }
        </script>
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js';?>" type="text/javascript"></script>
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
            <!-- END PAGE LEVEL SCRIPTS -->
            <script>
               /*
                 $('#typingarea').on("focus",function() {
               
                     pramukhIME.addKeyboard,('PramukhIndic','tamil');
                     pramukhIME.setLanguage("PramukhIndic","tamil"); 
                     pramukhIME.enable();
                     alert("hello");
               
                 }); */
                 
               
                 
               
               $('#emsi_school_admission_no').editable({
                     type: 'text',
                     pk: 0,
                     name: 'school_admission_no',
                     title: 'Enter Admission number' ,
                     success: function(response, newValue) {
                              if(response == 0) return "Unable to update.Please try later"; 
                     },
                     error: function(response, newValue) {
                              return 'Service unavailable. Please try later.';
                      }
                     // validate: function(value){
                     //      if(! /^[0-9]{10}$/.test(value))
                     //     {
                     //         return 'Enter Valid phone number';
                     //     }
                     // }
               
                 });
                 $('#doj').editable({
                     type: 'date',
                     pk: 0,
                     name: 'doj',
                     title: 'Enter Date of Joining',
                     success: function(response, newValue) {
                     //alert("hello");
                              if(response == 0) return "Unable to update.Please try later"; 
                     },
                     error: function(response, newValue) {
                              return 'Service unavailable. Please try later.';
               
                      }
               
                      // validate: function(value){
                      //      if(! /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(value))
                      //    {
                      //        return 'Enter Valid email id';
                      //    }
                     // }
                 });        
                 //  $('#education_medium_name').editable({
                 //     type: 'text',
                 //     pk: 1,
                 //     name: 'education_medium_name',
                 //     title: 'Enter house address',
                 //     success: function(response, newValue) {
                 //     //alert("hello");
                 //              if(response == 0) return "Unable to update.Please try later"; 
                 //     },
                 //     error: function(response, newValue) {
                 //              return 'Service unavailable. Please try later.';
               
                 //      }
                 //       // validate: function(value){
                 //       //    if( /[^-,/A-Za-z0-9]/.test(value))
                 //       //   {
                 //       //       return 'Enter Valid house address';
                 //       //   }
                 //     // }
                 // });        
                  
               
                           $('#user .editable').editable('toggleDisabled');
                     // init editable toggler
                     $('#enable').click(function() {
                         $('#user .editable').editable('toggleDisabled');
                     });
               
               $(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_class_studying_edit").change(function(){   

     var classstd = $("#emis_class_studying_edit").val();

      // if(classstd>=Number(10)){
      // $('.passfail').css('display','block');
      // }else{
      // $('.passfail').css('display','none');
      // }

      var prevclass=Number(classstd)-Number(1);
      var prevclasstd=getclassstd(prevclass);

      var valuess="";
      var indexval=0;
      prevclasstd.forEach(function(entry) {
         indexval=prevclasstd.indexOf(entry)+1;
         valuess= valuess+"<option value='"+indexval+"'>"+entry+"</option>" 
      });

      $comms="<select  class='form-control' tabindex='1' id='emis_prev_class_edit' name='emis_prev_class_edit'><option value=''>Select Previous class</option>"+valuess+"</select> ";

      document.getElementById("emis_prev_class_edit").innerHTML=$comms;
         // alert(baseurl+'Registration/getallsectionsbyclass');


      if(classstd==11 || classstd==12 ){
       $('.groupcodediv1').css('display','block');
       $('.groupcode11').css('display','block');
       }else{
       $('.groupcodediv1').css('display','none');
       $('.groupcode11').css('display','none');
      }

      
      $.ajax({
        type: "POST",
        url:baseurl+'Registration/getallsectionsbyclass',
        data:"&classid="+classstd,
        success: function(resp){     
       // alert(resp);

        document.getElementById("emis_reg_stu_section_edit").innerHTML=resp;
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

});   });
               
            </script>
         </body>
      </html>

