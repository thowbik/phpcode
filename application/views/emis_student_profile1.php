
<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
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
        
   <!--      <link href="<?php echo base_url().'asset/global/plugins/languages/css/pramukhindic.css';?>" rel="stylesheet" type="text/css" />
         <link href="<?php echo base_url().'asset/global/plugins/languages/css/pramukhtypepad.css';?>" rel="stylesheet" type="text/css" /> -->

         
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
          }else if($user_type_id==5){
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
                                            <small>Personal Information</small>
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
                                   <?php $studentid=$this->uri->segment(3,0); ?>

                                    <div class="page-content-inner">
                                    <center>
                                    <?php $dash_url="";
                          $user_type_id=$this->session->userdata('emis_user_type_id'); 
                          if($user_type_id==1){  $this->load->view('emis_school_profile_header1.php'); }
                          if($user_type_id==5){  $this->load->view('state/emis_state_profile_header1.php');  }?>
                                       
                               <?php ?>
                                    </center>    

                                           <!-- <div class="m-heading-1 border-green m-bordered">
                                            <h3>Basic Information</h3>
                                        </div> -->
                                         <div class="portlet-body">
                                         <div class="mt-element-step">
                                            <div class="row step-thin">
                                                <a href="<?php echo base_url().'Home/emis_student_profile1/'.$studentid;?>"><div class="col-md-3 bg-grey-steel mt-step-col active">
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
                                                <a href="<?php echo base_url().'Home/emis_student_profile4/'.$studentid;?>"><div class="col-md-3 bg-grey mt-step-col">
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
                                                 <button id="enable" class="btn green">Enable / Disable Editor Mode</button>
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
                                                <input type="hidden" id="emis_stu_transfer1_id" name="emis_stu_transfer1_id" value="<?php echo $studentid; ?>">

                                                <button id="emis_stu_transfer1" name="emis_stu_transfer1" class="btn green" >Transfer</button>
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
                                                    <span class="caption-subject font-dark sbold uppercase">Personal info step 1</span>
                                                </div>
                                            </div>
                                            
                                                
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table id="user" class="table table-bordered table-striped">
                                                            <tbody>

                                                                <!--<tr>
                                                                    <td style="width:15%"> Student Name as per Aadhaar Card </td>
                                                                    <td style="width:50%">

                                                                        <a href="javascript:;" id="name" data-type="text" data-pk="0" data-url="<?php echo base_url().'Home/updatestuprofile';?>"  data-original-title="Enter Student Name"><?php echo $name; ?></a> 
                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>
                                                               <tr>
                                                                    <td style="width:15%"> Student Name in tamil as per Aadhaar Card: </td>
                                                                    <td style="width:50%">

                                                                        <a href="javascript:;" id="nametamil" data-type="text" data-pk="0" data-url="<?php echo base_url().'Home/updatestuprofile';?>"  data-original-title="Enter Student Name in Tamil"> <?php echo $tname; ?></a> 

                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>-->
                                                                <tr>
                                                                    <td style="width:15%"> Student Name for ID card </td>
                                                                    <td style="width:50%">

                                                                        <a href="javascript:;" id="name" data-type="text" data-pk="0" data-url="<?php echo base_url().'Home/updatestuprofile';?>"  data-original-title="Enter Student Name for ID card"><?php echo $name; ?></a> 
                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>
                                                               <tr>
                                                                    <td style="width:15%"> Student Name in tamil for ID card </td>
                                                                    <td style="width:50%">

                                                                        <a href="javascript:;" id="name_tamil" data-type="text" data-pk="0" data-url="<?php echo base_url().'Home/updatestuprofile';?>"  data-original-title="Enter Student Name in tamil for ID card"> <?php echo $tname; ?></a> 

                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:15%"> Unique id number:</td>
                                                                    <td style="width:50%">

                                                                        <!-- <a href="javascript:;" id="unique_id_number" data-type="text" data-pk="0" data-url="<?php echo base_url().'Home/updatestuprofile';?>"  data-original-title="Enter Unique Number"> <?php echo $uniquenumber; ?></a>  -->
                                                                        <?php echo $uniquenumber; ?>

                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> Date of Birth: </td>
                                                                    <td style="width:50%">

                                                                        <a href="javascript:;" id="dob" data-type="date" data-pk="0" data-url="<?php echo base_url().'Home/updatestuprofile';?>"  data-original-title="Enter Date of Birth"> <?php echo $dob; ?></a> 

                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted"> Date of Birth </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> Gender: </td>
                                                                    <td style="width:50%">

                                                                      
                                                                    <a href="javascript:;" id="gender" data-type="select2" data-pk="0" data-url="<?php echo base_url().'Home/updatestuprofilegender';?>" data-value="<?php echo $gender; ?>" data-original-title="Enter gender"> <?php if($gender==1){ echo "Male"; }else if($gender==2){ echo "Female"; }else if($gender==3){ echo "Transgender"; } ?></a> 
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted"> Select2 (dropdown mode) </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> Blood group: </td>
                                                                   <td style="width:50%">
                                                                         
                                                                        <a href="javascript:;" id="bloodgroup" data-type="select2" data-pk="0" data-url="<?php echo base_url().'Home/updatestuprofile';?>" data-value="<?php echo $Bloodgpid; ?>" data-original-title="Select Blood Group"> <?php echo $Bloodgpname; ?> </a>  

                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted"> Select2 (dropdown mode) </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> Mother tongue: </td>
                                                                     <td style="width:50%">
                                                                        <?php   foreach($mother11 as $mth) {?> 

                                                                        <a href="javascript:;" id="mother" data-type="select2" data-pk="0" data-url="<?php echo base_url().'Home/updatestuprofile';?>" data-value="<?php echo $mth->id; ?>" data-original-title="Enter Mother tongue"> <?php echo $mth->language_name; ?></a>  <?php } ?>
                                                                   </td>
                                                                    <td>
                                                                        <span class="text-muted"> Select2 (dropdown mode) </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> Disadvantage group Name: </td>
                                                                   <td style="width:50%">
                                                                         
                                                                        <a href="javascript:;" id="disadvantagegroupname" data-type="select2" data-pk="0" data-url="<?php echo base_url().'Home/updatestuprofile';?>" data-value="<?php echo $DisadvantagegroupNameid; ?>" data-original-title="Select Disadvantage group Name"> <?php echo $DisadvantagegroupName; ?> </a>  

                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted"> Select2 (dropdown mode) </span>
                                                                    </td>
                                                                </tr>
                                                               
                                                                <tr>
                                                                    <td> Disability Group Name: </td>
                                                                     <td style="width:50%">
                                                                        
                                                                        <a href="javascript:;" id="disabilitygroupname" data-type="select2" data-pk="0" data-url="<?php echo base_url().'Home/updatestuprofile';?>" data-value="?php echo $DisabilityGroupNameid; ?>" data-original-title="Select Disability Group Name"> <?php echo $DisabilityGroupName; ?> </a>  
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted"> Select2 (dropdown mode) </span>
                                                                    </td>
                                                                </tr>
                                                               
                     
                                                            </tbody>
                                                        </table>
                                                        <?php $studentid =  $this->uri->segment(3,0); ?>



                                                         <div class="">
                                                  <center>

                                                 <!--     <label style="color:#dd4b39;">Note: Aadhaar Number is mandatory for the students who are all studying in 2nd standard to 12th standard</label>
                                                             <label style="color:#dd4b39;">குறிப்பு: 2 ஆம்  வகுப்பு முதல் 12ஆம் வகுப்பு வரை பயிலும் மாணவர்களின் ஆதார் எண்னை கட்டாயமாக பதிவு செய்ய வேண்டும்</label> -->
                                                <form class="form-horizontal" action="<?php echo base_url().'Home/emis_student_data_update1/'.$studentid;?>" method="post" id="emis_stu_reg_form1" name="emis_stu_reg_form1" >

                                                             <?php if($aadhaar_uid_number!="" && $aadhaar_uid_number!=NULL && $aadhaar_uid_number!=0) {  ?>
                                                            <div class="col-md-4" >
                                                              <div class="form-group" style="padding: 10px;">
                                                                <label class="control-label bold">
                                                                <input type="radio" id="emis_stu_idcard_adharadio" name="v1" onclick="EnableDisableTextBox(this)" checked > Aadhaar Number </label>
                                                                <input type="text" placeholder="ஆதார் எண்" class="form-control" id="emis_reg_stu_aadhaar" name="emis_reg_stu_aadhaar" value="<?php echo $aadhaar_uid_number; ?>" maxlength="12" enabled />
                                                                <font style="color:#dd4b39;"><div id="emis_reg_stu_aadhaar_alert"></div></font>
                                                              </div>
                                                              </div>
                                                               <div class="col-md-4">
                                                              <div class="form-group" style="padding: 10px;">
                                                                <label class="control-label bold">
                                                                    <input type="radio" name="v1"  id="emis_stu_idcard_enrolradio"  onclick="EnableDisableTextBox1(this)"  > Enrollment Number </label>
                                                                <input type="text" placeholder="ஆதார் பதிவு எண்" class="form-control" id="emis_stu_idcard_enroll" name="emis_stu_idcard_enroll" value="" maxlength="14"  disabled />
                                                                <font style="color:#dd4b39;"><div id="emis_stu_idcard_enroll_alert"></div></font>
                                                              </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                              <div class="form-group" style="padding: 10px;">
                                                                <label class="control-label bold">
                                                                    <input type="radio" name="v1"  id="emis_stu_idcard_noappliedradio" value="Aadhaar Enrollment not done"  onclick="EnableDisableTextBox2(this)" > Not Applied </label>
                                                                    <p>ஆதார் பதிவு செய்யப்படவில்லை</p>
                                                                <input type="hidden" placeholder="ஆதார் பதிவு செய்யப்படவில்லை" class="form-control" id="emis_stu_idcard_notapplied" name="emis_stu_idcard_notapplied"  value="Applied"  disabled />
                                                                <font style="color:#dd4b39;"><div id="emis_stu_idcard_notapplied_alert"></div></font>
                                                              </div>
                                                            </div>  <br/>
                                                            <?php } else if($enrollmentnumber!="" && $enrollmentnumber!=NULL && $enrollmentnumber!=0) { ?>
                                                            <div class="col-md-4" >
                                                              <div class="form-group" style="padding: 10px;">
                                                                <label class="control-label bold">
                                                                <input type="radio" id="emis_stu_idcard_adharadio" name="v1" onclick="EnableDisableTextBox(this)"> Aadhaar Number </label>
                                                                <input type="text" placeholder="ஆதார் எண்" class="form-control" id="emis_reg_stu_aadhaar" name="emis_reg_stu_aadhaar" value="" maxlength="12" disabled />
                                                                <font style="color:#dd4b39;"><div id="emis_reg_stu_aadhaar_alert"></div></font>
                                                              </div>
                                                              </div>
                                                              <div class="col-md-4">
                                                              <div class="form-group" style="padding: 10px;">
                                                                <label class="control-label bold">
                                                                    <input type="radio" name="v1"  id="emis_stu_idcard_enrolradio"  onclick="EnableDisableTextBox1(this)" checked > Enrollment Number </label>
                                                                <input type="text" placeholder="ஆதார் பதிவு எண்" class="form-control" id="emis_stu_idcard_enroll" name="emis_stu_idcard_enroll" value="<?php echo $enrollmentnumber; ?>" maxlength="14"  enabled />
                                                                <font style="color:#dd4b39;"><div id="emis_stu_idcard_enroll_alert"></div></font>
                                                              </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                              <div class="form-group" style="padding: 10px;">
                                                                <label class="control-label bold">
                                                                    <input type="radio" name="v1"  id="emis_stu_idcard_noappliedradio" value="Aadhaar Enrollment not done"  onclick="EnableDisableTextBox2(this)" > Not Applied </label>
                                                                    <p>ஆதார் பதிவு செய்யப்படவில்லை</p>
                                                                <input type="hidden" placeholder="ஆதார் பதிவு செய்யப்படவில்லை" class="form-control" id="emis_stu_idcard_notapplied" name="emis_stu_idcard_notapplied"  value="Applied"  disabled />
                                                                <font style="color:#dd4b39;"><div id="emis_stu_idcard_notapplied_alert"></div></font>
                                                              </div>
                                                            </div>  <br/>
                                                            <?php } else {  ?>    
                                                            <div class="col-md-4" >
                                                              <div class="form-group" style="padding: 10px;">
                                                                <label class="control-label bold">
                                                                <input type="radio" id="emis_stu_idcard_adharadio" name="v1" onclick="EnableDisableTextBox(this)"> Aadhaar Number </label>
                                                                <input type="text" placeholder="ஆதார் எண்" class="form-control" id="emis_reg_stu_aadhaar" name="emis_reg_stu_aadhaar" value="" maxlength="12" disabled />
                                                                <font style="color:#dd4b39;"><div id="emis_reg_stu_aadhaar_alert"></div></font>
                                                              </div>
                                                              </div>
                                                              <div class="col-md-4">
                                                              <div class="form-group" style="padding: 10px;">
                                                                <label class="control-label bold">
                                                                    <input type="radio" name="v1"  id="emis_stu_idcard_enrolradio"  onclick="EnableDisableTextBox1(this)"  > Enrollment Number </label>
                                                                <input type="text" placeholder="ஆதார் பதிவு எண்" class="form-control" id="emis_stu_idcard_enroll" name="emis_stu_idcard_enroll" value="" maxlength="14"  disabled />
                                                                <font style="color:#dd4b39;"><div id="emis_stu_idcard_enroll_alert"></div></font>
                                                              </div>
                                                            </div>
                                                          
                                                            <div class="col-md-4">
                                                              <div class="form-group" style="padding: 10px;">
                                                                <label class="control-label bold">
                                                                    <input type="radio" name="v1"  id="emis_stu_idcard_noappliedradio" value="Aadhaar Enrollment not done"  onclick="EnableDisableTextBox2(this)" checked > Not Applied </label>
                                                                    <p>ஆதார் பதிவு செய்யப்படவில்லை</p>
                                                                <input type="hidden" placeholder="ஆதார் பதிவு செய்யப்படவில்லை" class="form-control" id="emis_stu_idcard_notapplied" name="emis_stu_idcard_notapplied"  value="Notapplied"  disabled />
                                                                <font style="color:#dd4b39;"><div id="emis_stu_idcard_notapplied_alert"></div></font>
                                                              </div>
                                                            </div>  

                                                            <?php } ?>  
                                                            <span class="col-md-12">
                                                             <input type="submit" class="btn green profupdate1" id="emis_prof1_update1"  name="emis_prof1_update1" value="Update" >  
                                                           </span>
                                                          </form>

                                                        </center>
                                                </div>

                                                
        <!-- normal dependency options updating Starting -->
        <form class="form-horizontal" action="<?php echo base_url().'Home/emis_student_data_update/'.$studentid;?>" method="post" id="emis_stu_reg_form" name="emis_stu_reg_form">
            <div class="form-body col-md-12"><hr/>
                
                    <div class="row">
                      <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="form-group" style="width: 90%;">
                               
                                    <select class="form-control text-form-margin pro_edit" data-placeholder="Choose a Category" tabindex="1" id="emis_reg_religion" name="emis_reg_religion" style="display: none;">
                                        <?php foreach($religions as $rel) {   ?>
                                            <option value="<?php echo $rel->id;  ?>" <?php if($religion==$rel->religion_name){ ?>selected <?php } ?> ><?php echo $rel->religion_name  ?></option>
                                             <?php   }  ?>
                                    </select>
                                    <font style="color:#dd4b39;"><div id="emis_reg_religion_alert"></div></font>
                                     <label class="control-label">Religion  :  </label><?php echo '   '.$religion; ?>                  
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" style="width: 90%;">
                               
                                    <select class="form-control pro_edit" tabindex="1" id="emis_reg_community" name="emis_reg_community" style="display: none;">
                                        <?php foreach ($community as $key) {   ?>

                                        <option value="<?php echo $key->id; ?>" style="color:#bfbfbf;"><?php echo $key->community_name; ?></option><?php } ?>
                                    </select>
                                    <font style="color:#dd4b39;"><div id="emis_reg_community_alert"></div></font>
                                     <label class="control-label">Social Category :  </label><?php foreach($community as $com){  echo '   '.$com->community_name; } ?>                
                            </div>
                        </div>
                         <div class="col-md-4" >
                            <div class="form-group" style="width: 90%;">
                               

                                    <select class="form-control pro_edit" data-placeholder="Choose a Category" tabindex="1"  id="emis_reg_subcaste" name="emis_reg_subcaste" style="display: none;">
                                    <?php foreach ($subcaste as $key) {?> 
                                        <option value="<?php echo $key->id; ?>" style="color:#bfbfbf;"><?php echo $key->caste_name; ?></option><?php } ?>
                                    </select>
                                    <font style="color:#dd4b39;"><div id="emis_reg_subcaste_alert"></div></font>
                                     <label class="control-label">Community:  </label><?php foreach($subcaste as $sub){  echo '   '.$sub->caste_name; } ?>                          
                         </div>
                        </div>
                        </div>
                    </div>

                    <div class="col-md-12" ><center>
                    
                      <input type="submit" class="btn green profupdate1" id="emis_prof1_update" 
                      name="emis_prof1_update" value="Update" disabled>
                      </center> 
                    </div>                           

            </div>
        </form><!-- normal dependency options updating ending -->


 

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

                  <?php $this->load->view('footer.php'); ?>
        </div>

        <?php $this->load->view('scripts.php'); ?>

        <script type="text/javascript">
        function clicktransfer(value){
             var studid="<?php echo $student_id; ?>";
            if(!confirm('Are you sure want to Transfer this Student?')){
            e.preventDefault();
            return false;
            }

            $.ajax({
            type: "POST",
            url:baseurl+'Home/emis_student_transfer',
            data:"&stud_id="+value,
            success: function(resp){     
                  if(resp==true){
                    window.location.href = baseurl+'Home/emis_student_profile1/'+studid;  
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
        <!--<script src="<?php echo base_url().'asset/global/plugins/languages/js/pramukhime.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/languages/js/pramukhindic.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/languages/js/pramukhindic-i18n.js';?>" type="text/javascript"></script> -->
       
        
       <!-- <script type="text/javascript" src="https://www.google.com/jsapi"> -->
        </script>
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
        

        
         $('#name').editable({
            type: 'text',
            pk: 1,
            name: 'name',
            title: 'Enter Name' ,
            success: function(response, newValue) {
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
             validate: function(value){
                if(! /^[a-zA-Z ]*$/.test(value))
                {
                    return 'Name can contain only alphabets and spaces';
                }
            }
            
        });

        $('#name_tamil').editable({
            type: 'text',
            pk: 1,
            name: 'name_tamil',
            title: 'Enter Student Name in Tamil',
            success: function(response, newValue) {            
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             }
        });

                 $('#name_id_card').editable({
            type: 'text',
            pk: 1,
            name: 'name_id_card',
            title: 'Enter Name for id card' ,
            success: function(response, newValue) {
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
             validate: function(value){
                if(! /^[a-zA-Z ]*$/.test(value))
                {
                    return 'Name can contain only alphabets and spaces';
                }
            }
            
        });
         
        $('#name_tamil_id_card').editable({
            type: 'text',
            pk: 1,
            name: 'name_tamil_id_card',
            title: 'Enter Student Name in Tamil for id card',
            success: function(response, newValue) {            
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             }
        });        


        $('#aadhaar_uid_number').editable({
            type: 'text',
            pk: 1,
            name: 'aadhaar_uid_number',
            title: 'Enter aadhar Number',
            success: function(response, newValue) {
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },

            validate: function(value){
                 if(!validate(value))
                {
                    return 'Enter Valid aadhar Number';
                }
            }

        });

         $('#enrollmentnumber').editable({
            type: 'text',
            pk: 1,
            name: 'enrollmentnumber',
            title: 'Enter Aadhar Enrollment Number',
            success: function(response, newValue) {
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },


        });

         var genderr = [];
        $.each({
            "1": "Male",
            "2": "Female",
            "3": "Transgender"            
        }, function(k, v) {
            genderr.push({
                id: k,
                text: v
            });
        });
         
        $('#gender').editable({
            inputclass: 'form-control input-medium',
            source: genderr,
            type: 'select2',
            pk: 1,
            name: 'gender',
            title: 'Enter gender',
            success: function(response, newValue) {            
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             }
        });  

            $('#dob').editable({             
            type: 'date',
            pk:0 ,
            name: 'dob',
            title: 'Enter date',
            success: function(response, newValue) {            
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             }
        });  
       /* var rreligion = [];
        $.each({
        <?php foreach($religionlist as $res){  ?>
        "<?php echo $res->id;  ?>":"<?php echo $res->religion_name;  ?>",
       <?php   }  ?>   
        }, function(l, p) {
            rreligion.push({
                id: l,
                text: p
            });
        });   
        $('#religion').editable({
            inputclass: 'form-control input-medium',
            source: rreligion,
            type: 'select2',
            pk: 1,
            name: 'religion_id',
            title: 'Enter religion',
            success: function(response, newValue) {            
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             }
        });  

        var ccommunity = [];
        $.each({
        <?php foreach($communitylist as $res){  ?>
        "<?php echo $res->religion_id;  ?>":"<?php echo $res->community_name;  ?>",
       <?php   }  ?>   
        }, function(l, p) {
            ccommunity.push({
                id: l,
                text: p
            });
        });   
        $('#community').editable({
            inputclass: 'form-control input-medium',
            source: ccommunity,
            type: 'select2',
            pk: 1,
            name: 'community_id',
            title: 'Enter community',
            success: function(response, newValue) {            
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             }
        });        
        
        var ssubcaste = [];
        $.each({
        <?php foreach($subcaselist as $res){  ?>
        "<?php echo $res->community_id;  ?>":"<?php echo $res->caste_name;  ?>",
       <?php   }  ?>   
        }, function(l, p) {
            ssubcaste.push({
                id: l,
                text: p
            });
        });   
        $('#subcaste').editable({
            inputclass: 'form-control input-medium',
            source: ssubcaste,
            type: 'select2',
            pk: 1,
            name: 'subcaste_id',
            title: 'Enter subcaste',
            success: function(response, newValue) {            
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             }
        });        */
        
        var mmother = [];
        $.each({
        <?php foreach($mothertlist as $res){  ?>
        "<?php echo $res->id;  ?>":"<?php echo $res->language_name;  ?>",
       <?php   }  ?>   
        }, function(l, p) {
            mmother.push({
                id: l,
                text: p
            });
        });   
        $('#mother').editable({
            inputclass: 'form-control input-medium',
            source: mmother,
            type: 'select2',
            pk: 1,
            name: 'mothertounge_id',
            title: 'Enter Mother tongue ',
            success: function(response, newValue) {  
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             }
        });        

         var bgroup = [];
        $.each({
        <?php foreach($bloodgroup as $res){  ?>
        "<?php echo $res->id;  ?>":"<?php echo $res->group;  ?>",
        <?php   }  ?>   
        }, function(l, p) {
            bgroup.push({
                id: l,
                text: p
            });
        });   
        $('#bloodgroup').editable({
            inputclass: 'form-control input-medium',
            source: bgroup,
            type: 'select2',
            pk: 1,
            name: 'bloodgroup',
            title: 'Select Blood Group',
            success: function(response, newValue) {
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             }
        });

 
        var disabilitygroup = [];
        $.each({
             '0':'NA',
        <?php foreach($disabilitieslist as $res){  ?>
        "<?php echo $res->id;  ?>":"<?php echo $res->da_name;  ?>",
        <?php   }  ?>   
        }, function(l, p) {
            disabilitygroup.push({
                id: l,
                text: p
            });
        });   
        $('#disabilitygroupname').editable({
            inputclass: 'form-control input-medium',
            source: disabilitygroup,
            type: 'select2',
            pk: 1,
            name: 'differently_abled',
            title: 'Enter Disability Group Name ',
            success: function(response, newValue) {
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             }
        });


        var disadvantage = [];
        $.each({
        '0':'NA',
        <?php foreach($disadvantageslist as $res){  ?>
        "<?php echo $res->id;  ?>":"<?php echo $res->dis_group_name;  ?>",
         <?php   }  ?>   
        }, function(l, p) {
            disadvantage.push({
                id: l,
                text: p
            });
        });   
        $('#disadvantagegroupname').editable({
            inputclass: 'form-control input-medium',
            source: disadvantage,
            type: 'select2',
            pk: 1,
            name: 'disadvantaged_group',
            title: 'Enter Disadvantage Group Name ',
            success: function(response, newValue) {
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             }
        }); 

            $('#user .editable').editable('toggleDisabled');
            // init editable toggler
            $('#enable').click(function() {
                $('#user .editable').editable('toggleDisabled');
            });

            $('#test1').on('save', function(e, params) {
                 alert('Saved value: ' + params.newValue);
            });


      
         function EnableDisableTextBox(chkPassport) {
        var txtPassportNumber = document.getElementById("emis_reg_stu_aadhaar");
        var txtPassportNumber1 = document.getElementById("emis_stu_idcard_enroll");
       txtPassportNumber.disabled = chkPassport.checked ? false : true;
        if (!txtPassportNumber.disabled) {
            txtPassportNumber.focus();
            document.getElementById("emis_stu_idcard_enroll").value = "";
        }
          txtPassportNumber1.disabled=true;
          document.getElementById("emis_stu_idcard_enroll_alert").innerHTML = "";
    }

    function EnableDisableTextBox1(chkPassport) {
        var txtPassportNumber = document.getElementById("emis_stu_idcard_enroll");
         var txtPassportNumber1 = document.getElementById("emis_reg_stu_aadhaar");
       txtPassportNumber.disabled = chkPassport.checked ? false : true;
        if (!txtPassportNumber.disabled) {
            txtPassportNumber.focus();
            document.getElementById("emis_reg_stu_aadhaar").value = "";

        }
         txtPassportNumber1.disabled=true;
          document.getElementById("emis_reg_stu_aadhaar_alert").innerHTML = "";

    }

    function EnableDisableTextBox2(chkPassport) {
        var txtPassportNumber = document.getElementById("emis_stu_idcard_enroll");
         var txtPassportNumber1 = document.getElementById("emis_reg_stu_aadhaar");
         txtPassportNumber.disabled=true;
         txtPassportNumber1.disabled=true;
         document.getElementById("emis_reg_stu_aadhaar").value = "";
         document.getElementById("emis_stu_idcard_enroll").value = "";

         document.getElementById("emis_reg_stu_aadhaar_alert").innerHTML = "";
         document.getElementById("emis_stu_idcard_enroll_alert").innerHTML = "";
    }

  

</script>

    </body>

</html>