<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>

        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
		<link href="<?php echo base_url().'asset/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css';?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url().'asset/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
        </head>
		<style type="text/css">
		.alignment {
			margin: 0px 0px;
		}
    body.modal-open {
    overflow-y: hidden !important;
    position: fixed;
}
	</style>
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
        <h1>Create Student
            <small>Student profile creation</small>
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


        <div class="portlet light portlet-fit ">
            <div class="portlet-title row">
                <div class="caption">
                    <i class="fa fa-users"></i>
                    <span class="caption-subject font-dark sbold uppercase">Students Admission </span>
                </div>
                
                <?php $user_type_id=$this->session->userdata('emis_user_type_id'); 
                          if($user_type_id==3){ ?> 
                 <div class="pull-right">
                 <a href="<?php echo base_url().'District/emis_districtchange_school';?>" class="btn green">Change School</a>
               </div>
               <?php } ?>
               <div class="col-md-offset-1 col-md-8">
                                    <div class="form-group col-md-4">
                                        <label class="control-label">Has The Student Studied In any Other School in Tamil Nadu ?</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select class="form-control" id="emis_students">
                                            <option value="">Choose</option>
                                            <option value="2">Yes</option>
                                            <option value="1">No</option>
                                        </select>
                                        <!-- <div id="deputealert" style="color:#dd4b39;"></div> -->
                                    </div>
                                </div>
               
            </div>
            <div class="col-md-12 body">
            <!-- Nav tabs category -->
            <ul class="nav nav-tabs nav-tabs-success faq-cat-tabs " id="myTab">
                <li class="active"><a href="#faq-cat-1" data-toggle="tab">New Student Registration</a></li>
                <li><a href="#faq-cat-2" data-toggle="tab">Admit Student From Common Pool</a></li>
            </ul>
    
            <!-- Tab panes -->
            <div class="tab-content faq-cat-content">
                <div class="tab-pane active in fade" id="faq-cat-1">
                    <div class="panel-group" id="accordion-cat-1">
                        <div class="panel panel-success panel-faq" >
                            <div class="panel-heading active-faq">
                                <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#" aria-expanded="true" class>
                                    <h4 class="panel-title">
                                        <i class="fa fa-users"></i>
                    <span class="caption-subject font-dark sbold uppercase">Student Registration Form</span>
                                        <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                    </h4>
                                </a>
                            </div>
                            <div id="faq-cat-1-sub-1" class="panel-collapse panel-collapse collapse in" aria-expanded="true" style>
                                <div class="panel-body">
                                  <form class="form" method="post" id="emis_stu_reg_form" name="emis_stu_reg_form"
                                 action="<?php echo base_url().'Registration/emis_student_data_register';?>">
                                  
                                      <div class="form-body">
                                         
                                                   <h3 class="alignment">Student Personal Information</h3> <?php if($validation_error!=""){  echo "<div class='alert alert-warning' id='alert1' name='alert1'>".validation_errors()."</div>"; } ?>
                                                   <!--<center>  <label style="color:#dd4b39;">Note: For student Name id ID card - Please enter the student name that how it would be printed in id card.</label></center>-->
                                             <div class="row">
                                                <div class="col-md-6">
                                                  <label class="control-label">Name of the Student in English *</label>
                                                    <div class="form-group">
                                                    
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_reg_stu_name" name="emis_reg_stu_name" onkeypress="return  ((event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 65 && event.charCode <= 90) ||  (event.charCode == 32));" onkeyup='this.value=this.value.toUpperCase();'
                              placeholder=" ஆங்கிலத்தில்  மாணவர் பெயர்" required>
                              <!--<p>Name followed by Initial Eg. Ganesh R</p>-->
                                                             <font style="color:#dd4b39;"><div id="emis_reg_stu_name_alert"></div></font>
                               <!--மாணவர் பெயர் ஆங்கிலம்-->
                                                        </div>
                                                    </div>                                                  
                                                </div>
                                                <div class="col-md-6">
                                                  <label class="control-label">Name of the Student in Tamil *</label>
                                                    <div class="form-group">
                                                    
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_reg_stu_idname_ad" name="emis_reg_stu_idname" onkeypress="return  ((event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 65 && event.charCode <= 90) ||  (event.charCode == 32))"  placeholder="தமிழில் மாணவர் பெயர்" onkeyup='this.value=this.value.toUpperCase();' required autocomplete="off">
                                                            <span>Press F10 For Tamil Typing</span>
                              <!--<p>Name followed by Initial Eg. Ganesh R</p>-->
                                                             <font style="color:#dd4b39;"><div id="emis_reg_stu_idname_alert"></div></font>
                               <!--மாணவர் பெயர் தமிழ்-->
                                                        </div>
                                                    </div>                                                  
                                                </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                                                  <label class="control-label">Aadhaar Number</label>
                                                    <div class="form-group">
                                                    
                                                        <div class="">
                            <!--emis_reg_stu_aadhaar-->
                                                            <input type="text" class="form-control" id="emis_reg_stu_aadhaar_ed" name="emis_reg_stu_aadhaar"minlength="12" maxlength="12" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="ஆதார் எண்">
                                                             <font style="color:#dd4b39;"><div id="emis_reg_stu_aadhaar_alert"></div></font>
                                                        </div>
                                                    </div>                                                  
                                                </div>
                                                <!--/span-->
                                              
                                                <div class="col-md-6">
                                                <label class="control-label">Date of Birth - பிறந்த தேதி *</label>
                                                    <div class="form-group">
                            <!--min="<?php echo (date("Y-m-d",strtotime("now - 19Year"))); ?>"-->
                          <input class="form-control" id="emis_student_dob" name="emis_stu_dob" placeholder="DD/MM/YYYY" type="date"   onfocus="textvalidate(this.id,'emis_reg_stu_dob_alert');" onchange="textvalidate(this.id,'emis_reg_stu_dob_alert');"autocomplete="off" required />
                           <font style="color:#dd4b39;"><div id="emis_reg_stu_dob_alert"></div></font>
                                                    </div>
                                                </div>
                                            </div>
                                       <div class="row">
                                                <div class="col-md-6">
                                                  <div class="col-md-6">
                                                   <label class="control-label">Gender *</label>
                                                    <div class="form-group">
                                                   
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_stu_gender" name="emis_reg_stu_gender" required>
                                                          <option value="" style="color:#bfbfbf;">பாலினம் *</option>
                                                          <option value="1">Male</option>
                                                          <option value="2">Female</option>
                                                          <option value="3">Transgender</option>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_stu_gender_alert"></div></font>
                                                        </div>
                                                      
                                                    </div>
                                                  </div>

                                                  <div class="col-md-6">
                                                     <label class="control-label">Blood group</label>
                                                    <div class="form-group">
                                                   
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose Blood Group" id="emis_reg_stu_bg" name="emis_reg_stu_bg" >
                                                          <option value="" style="color:#bfbfbf;">இரத்த வகை</option>
                                                           <?php foreach($bloodgroup as $res) {   ?>
                                                          <option value="<?php echo $res->id; ?>"><?php echo $res->group; ?></option>
                                                          <?php  } ?>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_stu_bg_alert"></div></font>
                                                        </div>
                                                      
                                                    </div>
                                                  </div>
                                                </div>
                        
                                                <!--/span-->
                                                
                                                <!--/span-->
                                            
                                             
                                              <div class="col-md-6">
                                                <label class="control-label">Religion *</label>
                                                <div class="form-group">
                                                
                                                    <div class="">
                                                       <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_religion" name="emis_reg_religion" required>
                                                        <option value="" style="color:#bfbfbf;">மதம் *</option>
                                                         <?php foreach($religions as $rel) {   ?>
                                                          <option value="<?php echo $rel->id;  ?>"><?php echo $rel->religion_name  ?></option>
                                                          <?php   }  ?>
                                                        </select>
                                                        <font style="color:#dd4b39;"><div id="emis_reg_religion_alert"></div></font>
                                                        </div>
                                                         
                                                    </div>
                                                </div>
                        </div>
                        <div class="row">
                                                <div class="col-md-6">
                                                  <label class="control-label">Community *</label>
                                                    <div class="form-group">
                                                    
                                                        <div class="">
                                                            <select class="form-control"  id="emis_reg_community" name="emis_reg_community" required>
                                                         <option value="" style="color:#bfbfbf;">சமூக வகை *</option>
                                                        
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_community_alert"></div></font>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                
                                                <!--/span-->
                                            
                                             
                                              <div class="col-md-6">
                                                <label class="control-label">Caste *</label>
                                                    <div class="form-group">
                                                        
                                                        <div class="">
                                                           <select class="form-control" data-placeholder="Choose a Category"   id="emis_reg_subcaste" name="emis_reg_subcaste" required>
                                                        <option value="" style="color:#bfbfbf;">சாதி *</option>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_subcaste_alert"></div></font>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                        </div>
                        <div class="row">
                                                <div class="col-md-6">
                                                   <label class="control-label">Mother tongue *</label>
                                                    <div class="form-group">
                                                   
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category" id="emis_reg_stu_lang" name="emis_reg_stu_lang" required>
                                                               <option value="" style="color:#bfbfbf;">தாய்மொழி *</option>
                                                         <?php foreach($launguages as $lng) {   ?>
                                                          <option value="<?php echo $lng->MEDINSTR_ID;  ?>"><?php echo $lng->MEDINSTR_DESC;  ?></option>
                                                          <?php   }  ?>
                                                        </select>
                                                           <font style="color:#dd4b39;"><div id="emis_reg_stu_lang_alert"></div></font>
                                                        </div>
                                                         
                                                    </div>
                                                </div>
                                                

                                                <div class="col-md-6 disability">
                                                    <label class="control-label">Disability Group Name (இயலாமை குழுவின் பெயர்)</label>
                                                       <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category" id="" name="emis_disability_type_name">
                              <!---->
                                                          <option value="" >Select</option>
                                                         <?php foreach($disabilities as $disab) {   ?>
                                                          <option value="<?php echo $disab->id;  ?>"><?php echo $disab->da_name  ?></option>
                                                          <?php   }  ?>
                                                            </select>
                                                            <font style="color:#dd4b39;">
                                                            <div id="emis_disability_type_name_alert"></div></font>
                                                        </div>
                                                         
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="row">
                                                
                                                <!--/span-->
                                                
                                                <!--/span-->
                                            </div>
                                             <h3 class="alignment">Family Details</h3>
                                             <div class="row">
                                                
                                                <!--/span-->
                                                <div class="col-md-6">
                                                        <label class="control-label">Father Name</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_reg_fathername" name="emis_reg_fathername" placeholder="தந்தை பெயர்" onkeyup='this.value=this.value.toUpperCase();'>
                              <!--<p>Name followed by Initial Eg. Ganesh R</p>-->
                                                            <font style="color:#dd4b39;"><div id="emis_reg_fathername_alert"></div></font>
                                                        </div>
                                                         
                                                    </div>
                                                </div>
                                                <!--/span-->
                        <div class="col-md-6">
                                                    <label class="control-label">Mother Name </label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_reg_mothername" name="emis_reg_mothername" placeholder="தாய் பெயர்" onkeyup='this.value=this.value.toUpperCase();'>
                              <!--<p>Name followed by Initial Eg. Saraswathi R</p>-->
                                                             <font style="color:#dd4b39;"><div id="emis_reg_mothername_alert"></div></font>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="row">
                                                
                        
                        
                        
                                                <!--/span-->
                                                <div class="col-md-6">
                                                        <label class="control-label">Father's Occupation</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                             <select class="form-control" data-placeholder="Choose a Category" id="emis_reg_fatheroccu" name="emis_reg_fatheroccu">
                                                              <option value="">தந்தையின் தொழில்</option>
                                                                <option value="1">Government</option>
                                                                <option value="2">Private</option>
                                                                <option value="3">Self-employed</option>
                                                                <option value="4">Daily wages</option>
                                                                <!--<option value="5">Un-employed</option>-->
                                                                <option value="6">N/A</option>
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_fatheroccu_alert"></div></font>
                                                        </div>
                                                         
                                                    </div>
                                                </div>
                                                <!--/span-->
                        <div class="col-md-6">
                                                    <label class="control-label">Mother's Occupation</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                           <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_motheroccu" name="emis_reg_motheroccu">
                                                           <option value="">தாயின் தொழில்</option>
                                                                <option value="1">Government</option>
                                                                <option value="2">Private</option>
                                                                <option value="3">Self-employed</option>
                                                                <option value="4">Daily wages</option>
                                 <!--<option value="5">Un-employed</option>-->
                                                               <option value="6">N/A</option>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_motheroccu_alert"></div></font>
                                                        </div>
                                                        
                                                    </div>
                          
                                                </div>
                        
                        
                                            </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                    <label class="control-label">Guardian Name</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_reg_guardianname" name="emis_reg_guardianname" placeholder="பாதுகாவலர் பெயர்" onkeyup='this.value=this.value.toUpperCase();'>
                                                        </div>
                                                        
                                                    </div>
                          <label style="color:#dd4b39;">Note: Father name or Mother name or Guardian name Either one is mandatory!</label>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                        <label class="control-label">Parents Annual income</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category" id="emis_reg_parents_income" name="emis_reg_parents_income" >
                                                              <option value="">பெற்றோரின் ஆண்டு வருமானம்</option>
                                                               <?php foreach($incomes as $income) {   ?>
                                                          <option value="<?php echo $income->id;  ?>"><?php echo $income->income_value  ?></option>
                                                          <?php   }  ?>
                                                                <!-- <option value="0 to 12000">0 to 12000</option>
                                                                <option value="12-24">12-24</option>
                                                                <option value="24-50"> 24-50</option>
                                                                <option value="50-100">50-100</option>
                                                                <option value="100-200">100-200</option>
                                                                <option value="200-300">200-300</option>
                                                                <option value="300-400">300-400</option>
                                                                <option value="400-500">400-500</option>
                                                                <option value="500-600">500-600</option>
                                                                <option value="600-800">600-800</option>
                                                                <option value="800-1000">800-1000</option>
                                                                <option value="1000-1500">1000-1500</option>
                                                                <option value="1500 and above">1500 and above</option> -->
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_parents_income_alert"></div></font>
                                                        </div>
                                                         
                                                    </div>

                                                </div>
                                                <!--/span-->
                                                
                                            </div>
                                             <h3 class="alignment">Communication Details</h3>
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <label class="control-label">Mobile number *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_reg_mobile" name="emis_reg_mobile" placeholder="கைபேசி எண் *" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_mobile_alert"></div></font>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <label class="control-label">Email id </label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_reg_email" name="emis_reg_email" placeholder="மின்னஞ்சல் " maxlength="60" > 
                                                            <font style="color:#dd4b39;"><div id="emis_reg_email_alert"></div></font>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                    <label class="control-label">Door no. / Building Name *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_reg_stu_door" name="emis_reg_stu_door" placeholder="கதவு எண் / கட்டிடத்தின் பெயர் *" required>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_door_alert"></div></font>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                        <label class="control-label">Street Name / Area name *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_reg_stu_street" name="emis_reg_stu_street" placeholder="தெரு பெயர் / பகுதியின் பெயர் *" required>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_stu_street_alert"></div></font>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                    <label class="control-label">City name / Village name *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_reg_stu_city" name="emis_reg_stu_city" placeholder="நகரம் / கிராமத்தின் பெயர் *" required>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_stu_city_alert"></div></font>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                        <label class="control-label">District *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category" id="emis_reg_stu_district" name="emis_reg_stu_district" placeholder=">மாவட்டம் *" required>
                                                        <option value="" >மாவட்டம் *</option>
                                                         <?php foreach($schooldist as $dist) {   ?>
                                                          <option value="<?php echo $dist->id;  ?>"><?php echo $dist->district_name  ?></option>
                                                          <?php   }  ?>
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_district_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                    <label class="control-label">Pincode *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_reg_stu_pincode" name="emis_reg_stu_pincode" maxlength="6" placeholder="அஞ்சல் குறியீட்டு எண் *" required>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_pincode_alert"></div></font>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                
                                                <!--/span-->
                                            </div>
                                             <h3 class="alignment">Academic info</h3>
                                              <label style="color:#dd4b39;">Note:  'Section' should be initiated in school profile first.!</label>
                                             <div class="row">
                                                <div class="col-md-6">
                                                    <label class="control-label">Class for which Admission is sought for *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                           
                                                           <!-- <select class="form-control" data-placeholder="Choose a Category" id="emis_class_studying" name="emis_class_studying" required>
                                                            <option value="" >வகுப்பு *</option>
                                                           
                                                            <?php
                                                            if($lowestclass == 1)
                                                            { ?>
                                                              <option value="15">PreKG</option>
                                                              <option value="13">LKG</option>
                                                              <option value="14">UKG</option>


                                                            <?php }


                                                              if( $this->session->userdata('emis_school_templog1') == 2) {
                                                            foreach($classlist as $cl){ ?>
                                                              <option value="<?php echo $cl->id;  ?>"><?php echo $cl->class_studying;  ?></option> 
                                                          <?php  } } else { ?>

                                                           <option value="1">I</option>
                                                           <?php } ?>
                                                            </select>-->
                                                            
                                                            <select  class="form-control" data-placeholder="Choose a Category" id="emis_class_studying" name="emis_class_studying" required>
                                                                <option value="">வகுப்பு *</option>
                                                                <?php foreach($classstudying as $class ){ ?>
                                                                    <option value="<?php echo $class['id']; ?>"><?php echo $class['class_studying'];?></option>
                                                                  <?php  }?>
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_class_studying_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>

                                                            

                                                <!--/span-->
                                                <div class="col-md-6">
                                                        <label class="control-label">Section*</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category" id="emis_reg_stu_section" name="emis_reg_stu_section" required>
                                                           <option value="" style="color:#bfbfbf;">பிரிவு*</option>
                               
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_section_alert"></div></font>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!--/span-->
                                            </div>
                                             <div class="row">
                                               <!---<div class="col-md-6">
                                                    <label class="control-label">Previous class studied *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_prev_class" name="emis_prev_class" required>
                                                             <option value="" >முந்தய வகுப்பு *</option>
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_prev_class_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>--->
                                                <!--/span-->
                                                <!-- <div class="col-md-6 passfail" style="display:none;">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Promoted or Detaind *</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_reg_stu_passfail" name="emis_reg_stu_passfail">
                                                               <option value="" >Select Promoted</option>
                                                                <option value="Pass">Pass</option>
                                                                <option value="Fail">Fail</option>
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_passfail_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <label class="control-label">Admission Number </label>
                                                    <div class="form-group">
                                                         <div class="" >
                                                            <input type="text" class="form-control" id="emis_reg_stu_admission" name="emis_reg_stu_admission" placeholder="சேர்க்கை எண் *" > </div>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_admission_alert"></div></font>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                        <label class="control-label">Date of Joining - சேர்க்கை தேதி *</label>
                                                    <div class="form-group">
                                                     <input class="form-control" max="<?php echo (date("Y-m-d",strtotime("now"))); ?>" id="emis_reg_stu_doj" name="emis_reg_stu_doj" placeholder="DD/MM/YYYY" type="date" required />   
                                                    </div>
                                                </div>

                                                  <div class="col-md-6">
                                                    <label class="control-label">Medium of Instruction *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_mediofinst" name="emis_reg_mediofinst" required>
                                                                <option value="" >பயிற்று மொழி *</option>
                                                        
                             <?php foreach($mediumofinstruction as $moi){?>
                                                            <option value="<?php echo $moi['medium_instrut'];?>"><?php echo $moi['MEDINSTR_DESC']; ?></option>

                                                         <?php } ?>
                                                          
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_mediofinst_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                               </div>
                                              <div class="row"  >
                                                <!--/span-->
                                                <?php if($groupcateid!=""){ if($groupcateid!="11" && $groupcateid!="12" && $groupcateid!="28" && $groupcateid!="29" &&$groupcateid!="33" && $groupcateid!="34"){ ?>
                                                <div class="col-md-6 groupcode11" style="display: none;">
                                                  <label class="control-label">Group code - for 11 and 12 </label>
                                                    <div class="form-group">
                                                        
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category" id="emis_reg_grup_code" name="emis_reg_grup_code">
                                                                <option value="" >Select Group code</option>
                                                         <?php foreach($groupcate as $gro) {   ?>
                                                          <option value="<?php echo $gro->id;  ?>"><?php echo 
                                                          $gro->group_code.' - '.$gro->group_name  ?></option>
                                                          <?php   }  ?>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_grup_code_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <?php }} ?>
                                                <!--/span-->
                                           
                                             <input type="hidden" name="groupcateid" id="groupcateid" 
                                             value="<?php echo $groupcateid; ?>">
                                             <?php if($groupcateid!=""){ if($groupcateid=="11" || $groupcateid=="12" || $groupcateid=="28" || $groupcateid=="29" ||$groupcateid=="33" || $groupcateid=="34"){ ?>
                                            
                                            <div class="col-md-6 groupcode11" style="display: none;">
                                                       <label class="control-label">CBSC Subject 1</label>
                                                    <div class="form-group">
                                                       
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category" id="emis_reg_cbsc_sub1" name="emis_reg_cbsc_sub1">
                                                                <option value="" >Select CBSC Subject 1</option>
                                                         <?php foreach($groupcate as $gro) {   ?>
                                                          <option value="<?php echo $gro->id;  ?>"><?php echo $gro->group_name  ?></option>
                                                          <?php   }  ?>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_cbsc_sub1_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                              <div class="col-md-6 groupcode11" style="display: none;">
                                                        <label class="control-label">CBSC Subject 2</label>
                                                    
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category" id="emis_reg_cbsc_sub2" name="emis_reg_cbsc_sub2">
                                                                <option value="" >Select CBSC Subject 2</option>
                                                         <?php foreach($groupcate as $gro) {   ?>
                                                          <option value="<?php echo $gro->id;  ?>"><?php echo $gro->group_name  ?></option>
                                                          <?php   }  ?>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_cbsc_sub2_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6 groupcode11" style="display: none;">
                                                        <label class="control-label">CBSC Subject 3</label>
                                                 
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_cbsc_sub3" name="emis_reg_cbsc_sub3">
                                                                <option value="" >Select CBSC Subject 3</option>
                                                         <?php foreach($groupcate as $gro) {   ?>
                                                          <option value="<?php echo $gro->id;  ?>"><?php echo $gro->group_name  ?></option>
                                                          <?php   }  ?>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_cbsc_sub3_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 groupcode11" style="display: none;">
                                                        <label class="control-label">CBSC Subject 4</label>
                                                    
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category" id="emis_reg_cbsc_sub4" name="emis_reg_cbsc_sub4">
                                                                <option value="" >Select CBSC Subject 4</option>
                                                         <?php foreach($groupcate as $gro) {   ?>
                                                          <option value="<?php echo $gro->id;  ?>"><?php echo $gro->group_name  ?></option>
                                                          <?php   }  ?>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_cbsc_sub4_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6 groupcode11" style="display: none;">
                                                        <label class="control-label">CBSC Optionl Subject</label>
                                                   
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_cbsc_sub5" name="emis_reg_cbsc_sub5">
                                                                <option value="" >Select CBSC Optional Subject</option>
                                                         <?php foreach($groupcate as $gro) {   ?>
                                                          <option value="<?php echo $gro->id;  ?>"><?php echo $gro->group_name  ?></option>
                                                          <?php   }  ?>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_cbsc_sub5_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>

                                             </div>
                                             <?php } } ?>
                                             <div class="clearfix"></div>

                                                <div class="row" >

                                             <?php $cateid=""; foreach($managecateid as $mid){ 
                                              $cateid= $mid->manage_name;  } ?>
                                             <input type="hidden" name="emis_reg_stu_rte_hidden" id="emis_reg_stu_rte_hidden" value="<?php echo $cateid;  ?>">
                                            
                                             <?php if($cateid=="Un-aided"){?>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label class="control-label col-md-3">Admitted Through RTE</label>
                                                       <div class="col-md-9">
                                                            <select class="form-control" data-placeholder="Choose a Category" id="emis_reg_stu_rte" name="emis_reg_stu_rte" onchange="getdropdown();">
                                                               <option value="" >Select Yes Or No</option>
                                                                <option value="Yes" >Yes</option>
                                                                <option value="No">No</option>
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_rte_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
												<div class="col-md-6" id="rtetype">
                                                    <div class="form-group">
                                                    <label class="control-label col-md-3">RTE Type</label>
                                                       <div class="col-md-9">
                                                             <select style="width: 90%;" class="form-control"  data-placeholder="Select Teacher" tabindex="1" id="rtetype" name="rtetype"  style="width: 30%"  >
                                                               	
                                                                <option value="" >Select type</option>
																	
                                                                 <?php foreach($rtetype as $rt) {
														 
														 ?>
                                                               <option value="<?php echo $rt->id;  ?>" ><?php echo  $rt->cate;?></option>
                                                                 <?php   }  ?>
																 
                                                               </select> 
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } else if($cateid=="Aided"){ ?> 
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Aided or Un-Aided Section</label>
                                                        <div class="col-md-9">
                                                             <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_stu_aidunaid" name="emis_reg_stu_aidunaid">
                                                               <option value="" >Select Aided or Un-Aided Section</option>
                                                                <option value="Aided">Aided</option>
                                                                <option value="Unaided">Unaided</option>
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_aidunaid_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                <div class="col-md-offset-5">
                                                <button type="submit" class="btn green"  id="emis_stu_reg_sub" onclick="return save_valid();" >Submit</button>
                                                <button type="button" onclick="location.href='<?php echo base_url().'Registration/emis_student_reg';?>'" class="btn default">Cancel</button>
                                                <div id="err_msg_save"></div>
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6"> </div>
                                            </div>
                                        </div>
                                    </form>
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div><!--- Fab tab End-->
                        <div class="tab-pane fade" id="faq-cat-2">
                    <div class="panel-group" id="accordion-cat-2">
                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-cat-2" href="#" class="collapsed" aria-expanded="false">
                                    <h4 class="panel-title">
                                        Students Admission
                                        <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                    </h4>
                                </a>



                                
                            </div>
                            <div id="faq-cat-2-sub-1" class="panel-collapse collapse in" aria-expanded="true" style="">
                                <div class="panel-body">
                                    <!--- Here This Code Panel 2-->
                                    <form >
                                    <div class="row">
                                                    <div class="col-md-offset-2 col-md-4">
                                                      <label class="control-label"> Students Search Filter</label>
                                                             <select class="form-control" data-placeholder="Students Filter "  id="emis_students_admit" name="emis_students_admit">
                                                               <option value="-1" >Select</option>
                                                                <option value="1">Unique Number</option>
                                                                <option value="2">Aadhaar Number</option>
                                                                <option value="3">Mobile Number</option>
                                                                <option value="4">UDISE Code</option>


                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_aidunaid_alert"></div></font>
                                                        </div>
                                                      <div class="col-md-4">
                                                        <?php
                                    if($this->session->flashdata('students_update')) {
$message = $this->session->flashdata('students_update');

// echo $message;

  
                                     ?>
                                   <div class="alert alert-success" style="width: 300px;"><button class="close" data-close="alert"></button>
                                <?=$message;?></div>
                                    <!-- BEGIN THEME PANEL -->
                                    <!-- END THEME PANEL -->
                                  <?php } ?>
                                                      </div>
                                                      </div>

                                                      <div class="row">
                                                        <div class="filterGroup">
                                                        <div class="col-md-offset-2 col-md-4">
                                                          <label class="control-label" id="label"> </label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_filter" name="emis_filter" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="" required>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_pincode_alert"></div></font>
                                                        </div>
                                                        
                                                    </div>
                                                
                                                        </div>
                                                        <div class="col-md-4 classgroup">
                                                    <label class="control-label">Select Class</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                           
                                                           
                                                            
                                                            <select  class="form-control" data-placeholder="Choose a Category" id="class_id" name="emis_class_study" required>
                                                                <option value="-1">select Class</option>
                                                                
                                                                <?php 

                                                                $class_roma = array
                                                            ('I'=>1,'II'=>'2','III'=>'3','IV'=>'4','V'=>'5','VI'=>'6','VII'=>'7','VIII'=>'8','IX'=>'9','X'=>'10','XI'=>'11','XII'=>'12','LKG'=>'13','UKG'=>'14','PreKG'=>'15');
                                                            for($i=1;$i<=15;$i++){ 
                                                                $class_name = array_search($i, $class_roma);
                                                              ?>
                                                                    <option value="<?=$i;?>"><?=$class_name?></option>
                                                                  <?php  }?>
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_class_studying_alert"></div></font>
                                                        </div>

                                                    </div>
                                                </div>


                                                      <div class="col-md-offset-8 col-md-4">
                                                      <button type="button" class="btn btn-success search" onclick="student_search();"><span>Search</span></button>
                                                      <button type="button" class="btn btn-success search_archive" onclick="student_search_arch();"><span>Search archive</span></button>

                                                    <div id="err_msg"></div>
                                                    </div>
                                                      </div>
                                                      
                                                  </div>
                                                    </form>
                                                    <br/>
                                                    <div class="portlet box green filter_students_info">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> Student Data List </div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                    <div class="row ">
                                                      <div class="col-md-12">
                                                        <table class="table table-striped table-bordered table-hover district" id="sample_3">
                                                          <thead>
                                                            <tr>
                                                              <th>S.No.</th>
                                                              <th>Unique ID</th>
                                                              <th>Name</th>
                                                              <th>Gender</th>
                                                              <th>Date<br/>Of Birth</th>
                                                              <th>Class</th>
                                                              <th>Sec</th>
                                                              <th>School Name</th>
                                                              <th>Social Category</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody id="student_detail">
                                                            
                                                          </tbody>
                                                        </table>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>


                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                    </div>

            <div class="portlet-body">
                
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
<div class="modal fade" id="admitModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span id="stu_id"></span></h4>
        </div>
        <div class="modal-body">
         <form method="post" action="<?=base_url().'Registration/updated_emis_students_admitted'?>">
            <input type="hidden" id="students_id" name="id">
            <input type="hidden" id="emis_unique_id_no" name="emis_unique_id_no">

          <div class="row">
            <div class="col-md-6">
              <label> Enter Admission date *</label>
              <div class="input-group date">
   <input type="text" name="date" class="form-control date" id="dat" autocomplete="off" />
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div> 
</div>
            </div>
                        <div class="col-md-6">
                                                    <label class="control-label">Select Class</label>
                                                    <div class="form-group">
                                                        <div class="class_det">
                                                           
                                                           
                                                            
                                                            <select  class="form-control" data-placeholder="Choose a Category" id="emis_class_id" name="emis_class_study" required>
                                                                <option value="-1">select Class</option>
                                                                <?php foreach($classstudying1 as $class ){ ?>
                                                                    <option value="<?php echo $class['id']; ?>"><?php echo $class['class_studying']; ?></option>
                                                                  <?php  }?>
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_class_studying_alert"></div></font>
                                                        </div>

                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="control-label">Section*</label>
                                                    <div class="form-group">
                                                        <div class="section_det">
                                                            
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_section_alert"></div></font>
                                                        </div>
                                                    </div>

                                                </div>
                                             <div class="col-md-6 group">
                                                        <label class="control-label">Group Code*</label>
                                                    <div class="form-group">
                                                        <div class="group_det">
                                                            
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_section_alert"></div></font>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <label class="control-label">Medium of Instruction *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_mediofinst_ad" name="emis_reg_mediofinst" required>
                                                                <option value="" >பயிற்று மொழி *</option>
                                                        
                             <?php foreach($mediumofinstruction as $moi){?>
                                                            <option value="<?php echo $moi['medium_instrut'];?>"><?php echo $moi['MEDINSTR_DESC']; ?></option>

                                                         <?php } ?>
                                                          
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_mediofinst_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label>Admission Number *</label>
                                                         <div class="" >
                                                            <input type="text" class="form-control" id="emis_reg_stu_admission_admiss_ad" name="emis_reg_stu_admission_admiss" placeholder="Admission number *"> </div>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_admission_alert_admiss"></div></font>
                                                    </div>
                                                </div>
                                                <?php $school_manage = $this->session->userdata('school_manage');
                                                if($school_manage !=1 && $school_manage !=5){ ?>

                                               <!--  <div class="col-md-6">
                                                    <label class="control-label">Came through RTE 25%</label>
                                                    <div class="form-group">
                                                       
                                                            <select class="form-control" data-placeholder="Choose a Category" id="emis_reg_stu_rte_ad" name="emis_reg_stu_rte">
                                                               <option value="0" >Select Came through RTE 25%</option>
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_rte_alert"></div></font>
                                                        </div>
                                                    
                                                </div> -->
                                            <?php } ?>
                                                <div class="col-md-offset-9 col-md-2">
                                                      <button type="submit" class="btn btn-success"><span>save</span></button>

                                                 </div>  
          
        </div>
 
      </form>

    </div>
</div>
</div>



<!--<div class="modal fade" id="admitModal1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span id="stu_id1"></span></h4>
        </div>
        <div class="modal-body">
          <form method="post" action="<?=base_url().'Registration/updated_emis_students_admitted1'?>">
            <input type="hidden" id="students_id" name="id">
            <input type="hidden" id="students_name" name="name">
            <input type="hidden" id="name_tamil" name="name_tamil">
            <input type="hidden" id="name_id_card" name="name_id_card">
            <input type="hidden" id="name_tamil_id_card" name="name_tamil_id_card">
            <input type="hidden" id="aadhaar_uid_number" name="aadhaar_uid_number">
            <input type="hidden" id="gender" name="gender">
            <input type="hidden" id="dob" name="dob">
            <input type="hidden" id="community_id" name="community_id">
            <input type="hidden" id="religion_id" name="religion_id">
            <input type="hidden" id="mothertounge_id" name="mothertounge_id">

            <input type="hidden" id="phone_number" name="phone_number">
            <input type="hidden" id="differently_abled" name="differently_abled">
            <input type="hidden" id="disadvantaged_group" name="disadvantaged_group">
            <input type="hidden" id="subcaste_id" name="subcaste_id">
            <input type="hidden" id="house_address" name="house_address">
            <input type="hidden" id="pin_code" name="pin_code">
            <input type="hidden" id="mother_name" name="mother_name">
            <input type="hidden" id="mother_occupation" name="mother_occupation">
            <input type="hidden" id="father_name" name="father_name">
            <input type="hidden" id="father_occupation" name="father_occupation">
            <input type="hidden" id="class_studying_id" name="class_studying_id">

            <!-- <input type="hidden" id="student_admitted_section" name="student_admitted_section">
            <input type="hidden" id="group_code_id" name="group_code_id">
            <input type="hidden" id="education_medium_id" name="education_medium_id">
            <input type="hidden" id="district_id" name="district_id">
            <input type="hidden" id="unique_id_no" name="unique_id_no">
            <input type="hidden" id="school_id" name="school_id">
            <input type="hidden" id="transfer_flag" name="transfer_flag">
            <input type="hidden" id="class_section" name="class_section">
            <input type="hidden" id="guardian_name" name="guardian_name">
            <input type="hidden" id="parent_income" name="parent_income">
            <input type="hidden" id="street_name" name="street_name">

          <div class="row">
            <div class="col-md-6">
              <label> Enter Admission date *</label>
              <div class="input-group date">
   <input type="text" name="date" class="form-control date" id="dat" autocomplete="off" />
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div> 
</div>
            </div>
                        <div class="col-md-6">
                                                    <label class="control-label">Select Class</label>
                                                    <div class="form-group">
                                                        <div class="class_det">
                                                           
                                                           
                                                            
                                                            <select  class="form-control" data-placeholder="Choose a Category" id="emis_class_id" name="emis_class_study" required>
                                                                <option value="-1">select Class</option>
                                                                <?php foreach($classstudying as $class ){ ?>
                                                                    <option value="<?php echo $class['id']; ?>"><?php echo $class['class_studying']; ?></option>
                                                                  <?php  }?>
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_class_studying_alert"></div></font>
                                                        </div>

                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="control-label">Section*</label>
                                                    <div class="form-group">
                                                        <div class="section_det">
                                                            
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_section_alert"></div></font>
                                                        </div>
                                                    </div>

                                                </div>
                                             <div class="col-md-6 group">
                                                        <label class="control-label">Group Code*</label>
                                                    <div class="form-group">
                                                        <div class="group_det">
                                                            
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_section_alert"></div></font>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <label class="control-label">Medium of Instruction *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_mediofinst_ad" name="emis_reg_mediofinst" required>
                                                                <option value="" >பயிற்று மொழி *</option>
                                                        
                             <?php foreach($mediumofinstruction as $moi){?>
                                                            <option value="<?php echo $moi['medium_instrut'];?>"><?php echo $moi['MEDINSTR_DESC']; ?></option>

                                                         <?php } ?>
                                                          
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_mediofinst_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label>Admission Number *</label>
                                                         <div class="" >
                                                            <input type="text" class="form-control" id="emis_reg_stu_admission_admiss_ad" name="emis_reg_stu_admission_admiss" placeholder="Admission number *"> </div>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_admission_alert_admiss"></div></font>
                                                    </div>
                                                </div>
                                                <?php $school_manage = $this->session->userdata('school_manage');
                                                if($school_manage !=1 && $school_manage !=5){ ?>

                                               <!--  <div class="col-md-6">
                                                    <label class="control-label">Came through RTE 25%</label>
                                                    <div class="form-group">
                                                       
                                                            <select class="form-control" data-placeholder="Choose a Category" id="emis_reg_stu_rte_ad" name="emis_reg_stu_rte">
                                                               <option value="0" >Select Came through RTE 25%</option>
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_rte_alert"></div></font>
                                                        </div>
                                                    
                                                </div> 
                                            <?php } ?>
                                                <div class="col-md-offset-9 col-md-2">
                                                      <button type="submit" class="btn btn-success"><span>save</span></button>

                                                 </div>  
          
        </div>
 
      </form>

    </div>
</div>
</div>-->
        <?php $this->load->view('scripts.php'); ?>
		<script src="<?php echo base_url().'asset/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js';?>" type="text/javascript"></script>
		<script src="<?php echo base_url().'asset/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/js/tamil-keyboard-VIT/js/utf.js'?>" type="text/javascript"></script>
                            <script src="<?php echo base_url().'asset/js/tamil-keyboard-VIT/js/tamil.js'?>" type="text/javascript"></script>
        <!-- BEGIN PAGE LEVEL SCRIPTS -->

        <!-- END PAGE LEVEL SCRIPTS -->


    </body>
    <script type="text/javascript">

      $(".body").hide();
	


    $("#emis_students").change(function()
    {
       var emis_id =  $(this).val();
      $(".body").show();
      $("#faq-cat-"+emis_id).show();
      emis_hide = (emis_id==1?2:1);

       if(emis_id !='')
       { 

        $('#myTab a[href="#faq-cat-' + emis_id + '"]').tab('show');
        $('#myTab a[href="#faq-cat-' + emis_id + '"]').show();
        $('#myTab a[href="#faq-cat-' + emis_hide + '"]').hide();

        $("#faq-cat-"+emis_hide).hide();

       }else
       {
        $(".body").hide();
       }
    })
	/*function checkRequired(frmid){
    var frm=document.getElementById(frmid);
    var checkbit=0;var pt='';
	//alert(frm);
    for(var i=0;i<frm.elements.length;i++){
		if((frm.elements[i].hasAttribute("required")) && (frm.elements[i].value=='' || frm.elements[i].value==null)){
		      pr=frm.elements[i].parentNode.parentNode;
              alert('Check Field :'+pr.children[0].innerHTML);
		      frm.elements[i].focus();
              return false;
		}
        modalTDID(frm.elements[i].id+'_td',frm.elements[i]);
    }
    alert('Checkbit ='+checkbit);
    if(checkbit==0)
        $('#myModal').modal({show: 'true'});
}

function modalTDID(tdid,node){
    var dt,checkValue='';
    if(node.type=='text' || node.type=='email'){
        checkValue=node.value;
    }else if(node.type=='date'){
        dt=node.value.split('-');
        checkValue=dt[2]+'-'+dt[1]+'-'+dt[0];   
    }
    else if(node.type=='select-one'){
        checkValue=node.options[node.selectedIndex].text;
    }
    else{
        checkValue=node.type;
    }
    if(!document.getElementById(tdid))
        return false;
    else
        document.getElementById(tdid).innerHTML=checkValue;
    //alert(checkValue);    
}

function setmindoj(currentnode,setnode,year,id,alertid) {
	var text = document.getElementById(id);
					var alt = document.getElementById(alertid);
					if(text.value==''){
						alt.innerHTML="This field is required";
					}else {
						alt.innerHTML="";
					}
		
    var dob = new Date(currentnode.value);
    var dobsp = currentnode.value.split('-');
    var doj = (dob.getFullYear()+ year)+'-'+dobsp[1]+'-'+dobsp[2];
    document.getElementById(setnode).disabled=false;
    document.getElementById(setnode).setAttribute('min',doj);
}
function popup(){
    //alert('Click Submit');
    swal({
        title: "Are you sure?",
        text: "You Have Validated The Form",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, Save!",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }, function(isConfirm){
    if (isConfirm) 
        document.getElementById('emis_stu_reg_form').submit();
    else
        swal("Cancelled", "Your cancelled the student profile", "error");
    });	
}
*/
	
/*	function haswhitespace(space) {
		var str = space.value;
		if((str.charCodeAt(str.length-1) == 32) && (str.charCodeAt(str.length-2) == 32) ){
			str = str.slice(0,-1);
			space.value=str;
		}
	}
	
	function popup(){
				//alert('Click Submit');
				swal({
					title: "Are you sure?",
					text: createJSON('emis_stu_reg_form',1),
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Yes, Save!",
					closeOnConfirm: false,
					showLoaderOnConfirm: true
				}, function(isConfirm){
					if (isConfirm) 
						studentsubmit();
					else
						 swal("Cancelled", "Your cancelled the student profile", "error");
				
				});	
				
			}
			function isJson(restext){
    if(restext!=""){
        try{
            if(JSON.parse(restext)){
                return true;
            }    
        }
        catch(e){
            return false;
        }
    }
    else{
        return false;
    }
}
			
			function studentsubmit(){

            $.ajax({
				type: "POST",
				url:'<?php echo base_url().'Registration/emis_student_data_register';?>',
				data:createJSON('emis_stu_reg_form',2),
				success:function(resp){ 
					//alert(resp);
				if(isJson(resp)){	
					var js=JSON.parse(resp);
					
					swal({
                      title: "Saved!",
                      type: "success",
					  text: "Student Name:"+js['name']+'\n Student ID:'+js['unique_id_no'],
                      showCancelButton: false,
                      confirmButtonClass: "btn-success",
                      confirmButtonText: "OK",
                      closeOnConfirm: true
                      },
                      function(isConfirm) {
                      if (isConfirm) {
                        window.location.href = '<?php echo base_url().'Registration/emis_student_reg';?>'; 
                      } 
                      });
					
					
					
				}	
				else{
					swal("Cancelled", "Your cancelled the student profile", "error");
					//alert(resp);
				}
				},
				error: function(e){ 
					alert('Error: ' + e.responseText);
					return false;  
				}
            });
			}
			


function createJSON(frmid,id){
    var frmstr=document.getElementById(frmid);
	var jsIndex=['Name of the Student in English','Name of the Student in Tamil','Aadhaar','DOB','Father Name','Mother Name','Guardian Name','Mobile Number','Email','Door','Street','City','Pincode','Date of Joining'];
    var z=0;
	var text=''; var data='';
    for(var i=0;i<frmstr.elements.length;i++){
		if(frmstr.elements[i].type=='text' || frmstr.elements[i].type=='date'){
		if(frmstr.elements[i].value==''|| frmstr.elements[i].value=='NA'){
			z++;
			continue;
		}else{
			text+=jsIndex[z]+':'+frmstr.elements[i].value+'\n';
		
			//alert(frmstr.elements[i].name+'='+frmstr.elements[i].value);
			
		}
		z++;
        }
		data+='&'+frmstr.elements[i].name+'='+frmstr.elements[i].value;
    }
	if(id==1)
		return text;
	else if(id==2)
		return data;
}*/

	
		function textvalidate(id,alertid){
			//alert(alertid);	
			var text = document.getElementById(id);
			var alt = document.getElementById(alertid);
			if(text.value==''){
				alt.innerHTML="Required Field";
			}else {
				alt.innerHTML="";
			}
		}
		
    </script>


<script>
    $(document).ready(function(){
    $("#rtetype").hide();
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    console.log(activeTab);
    if(activeTab){
        // console.log(activeTab);
        $('#myTab a[href="' + activeTab + '"]').tab('show');
        localStorage.clear();
    }

});
    </script>

    <script type="text/javascript">
      $(".filterGroup").hide();
      $(".filter_students_info").hide();
      var textbox ='';
      var label = '';
      var db_col = '';
      var db_sub_col = '';
      
      $("#emis_students_admit").change(function()
      {
          var admit = $(this).val();
          label = $(this).find('option:selected').text();
          textbox = $("#emis_filter");
          $(textbox).val('');
          db_sub_col = '';
          switch(parseInt(admit))
          {
            case 1:
            $("#label").text(label+' *');
            $(textbox).attr('placeholder','Enter The '+label);
            $(textbox).attr('maxlength','20');
            db_col = 'unique_id_no';
            $(".filterGroup").show();
            $(".classgroup").hide();
            break;
            case 2:
            $("#label").text(label+' *');
            $(textbox).attr('placeholder','Enter The '+label);
            $(textbox).attr('maxlength','12');
            db_col = 'aadhaar_uid_number';
            $(".filterGroup").show();
            $(".classgroup").hide();

            break;
            case 3:
            $("#label").text(label+' *');
            $(textbox).attr('placeholder','Enter The '+label);
            $(textbox).attr('maxlength','10');
            db_col = 'phone_number';
            $(".filterGroup").show();
            $(".classgroup").hide();

            break;
            case 4:
            $("#label").text(label+' *');
            $(textbox).attr('placeholder','Enter The '+label);
            $(textbox).attr('maxlength','12');
            db_col = 'udise_code';
            db_sub_col = 'class_studying_id';

            $(".filterGroup").show();
            $(".classgroup").show();

            break;
            case -1:
            $(".filterGroup").hide();
            $(".classgroup").hide();

            break;
          }
      });

        var table = '';
        var students_data = '';
      function student_search()
      {
        // alert('function');
                    $("#err_msg").html('');
if($.fn.dataTable.isDataTable('#sample_3')){
           $('#sample_3').DataTable().clear().destroy();


                   }
          var filter_val = $(textbox).val();
          var class_id = $("#class_id").val();
          // console.log(class_id);
          if(filter_val =='' || filter_val ==null || filter_val==undefined)
          {
          // alert();
            $("#err_msg").html('<h4 style="color:red;">Please Enter The '+label+'</h4>');
            return false;
          }else if(label =='UDISE Code' && class_id =='-1')
          {
            $("#err_msg").html('<h4 style="color:red;">Please Enter The '+label+' And Select Class </h4>');

          }else{
          
              $('.search span').html('<i class="fa fa-spinner fa-spin"></i> Loading...');
              data = {'search_data':filter_val,'db_col':db_col,'db_sub_col':db_sub_col,'class_id':class_id};

              $.ajax(
              {
                method:"POST",
                url:'<?=base_url()."Registration/get_studetus_search"?>',
                dataType:'JSON',
                data:data,
                success:function(res)
                {
              $('.search span').html('search');
               //$('.search_archive span').html('search archive');
      $(".filter_students_info").hide();

                  if(res.status)
                  {
      $(".filter_students_info").show();

                    students_data = res.data;
                    // console.log(students_data);
                      // var student_detail = 
                      $("#student_detail").empty();
                       var tables = $("#sample_3 tbody");
                        tables.empty();
                        // console.log(students_data);
                      $.each(students_data,function(i,val)
                      {
                        i = i+1;
                        students_tbl = '<tr id="student_detail">';
                        var date = new Date(val.dob);
        var dob_month = date.getMonth()+1;
        var dob = (date.getDate() < 10 ? '0'+date.getDate():date.getDate())+'-'+(dob_month < 10 ? '0'+dob_month:dob_month)
+'-'+date.getFullYear();

                          students_tbl +='<td>'+ i +'</td>';
                          students_tbl +='<td><a href="javascript:void(0);" onclick="admission_tab('+val.id+')">'+val.unique_id_no+'</a></td>';
                          students_tbl +='<td><span style="color:'+(val.transfer_flag==0?'red':'green')+'">'+val.name+'</span></td>';
                          students_tbl +='<td style="text-align:center">'+(val.gender==1?'M':'F')+'</td>';
                          students_tbl +='<td>'+dob+'</td>';
                          students_tbl +='<td  style="text-align:center">'+val.class_studying_id+'</td>';
                          students_tbl +='<td style="text-align:center">'+val.class_section+'</td>';
                          students_tbl  +='<td>'+val.school_name+'</td>';
                          students_tbl +='<td>'+val.community_name+'</td>';
                          

                      students_tbl +='</tr>';
                      $("#student_detail").append(students_tbl);
                      });
          
   table =  sum_dataTable('#sample_3');
   // table.clear();
                   // table.ajax.url(students_data).load();

                  }else
                  {
                    $("#err_msg").html('<h3>'+res.message+'</h3>');
                  }
                }
              })

          }
      }


       var table = '';
        var students_data = '';
      function student_search_arch()
      {
        // alert('function');
                    $("#err_msg").html('');
if($.fn.dataTable.isDataTable('#sample_3')){
           $('#sample_3').DataTable().clear().destroy();


                   }
          var filter_val = $(textbox).val();
          var class_id = $("#class_id").val();
          // console.log(class_id);
          if(filter_val =='' || filter_val ==null || filter_val==undefined)
          {
          // alert();
            $("#err_msg").html('<h4 style="color:red;">Please Enter The '+label+'</h4>');
            return false;
          }else if(label =='UDISE Code' && class_id =='-1')
          {
            $("#err_msg").html('<h4 style="color:red;">Please Enter The '+label+' And Select Class </h4>');

          }else{
          
              $('.search_archive span').html('<i class="fa fa-spinner fa-spin"></i> Loading...');
              data = {'search_data':filter_val,'db_col':db_col,'db_sub_col':db_sub_col,'class_id':class_id};

              $.ajax(
              {
                method:"POST",
                url:'<?=base_url()."Registration/get_studetus_search_arch"?>',
                dataType:'JSON',
                data:data,
                success:function(res)
                {
              //$('.search span').html('search');
               $('.search_archive span').html('search archive');
      $(".filter_students_info").hide();

                  if(res.status)
                  {
      $(".filter_students_info").show();

                    students_data = res.data;
                    // console.log(students_data);
                      // var student_detail = 
                      $("#student_detail").empty();
                       var tables = $("#sample_3 tbody");
                        tables.empty();
                        // console.log(students_data);
                      $.each(students_data,function(i,val)
                      {
                        i = i+1;
                        students_tbl = '<tr id="student_detail">';
                        var date = new Date(val.dob);
        var dob_month = date.getMonth()+1;
        var dob = (date.getDate() < 10 ? '0'+date.getDate():date.getDate())+'-'+(dob_month < 10 ? '0'+dob_month:dob_month)
+'-'+date.getFullYear();

                          students_tbl +='<td>'+ i +'</td>';
                          students_tbl +='<td><a href="<?=base_url()."Registration/get_stud_insert/?unique_id="?>'+val.unique_id_no+'">'+val.unique_id_no+'</a></td>';
                          students_tbl +='<td><span style="color:'+(val.transfer_flag==0?'red':'green')+'">'+val.name+'</span></td>';
                          students_tbl +='<td>'+(val.gender==1?'M':'F')+'</td>';
                          students_tbl +='<td>'+dob+'</td>';
                          students_tbl +='<td>'+val.class_studying_id+'</td>';
                          students_tbl +='<td>'+val.class_section+'</td>';
                          students_tbl  +='<td>'+val.school_name+'</td>';
                          students_tbl +='<td>'+val.community_name+'</td>';
                          

                      students_tbl +='</tr>';
                      $("#student_detail").append(students_tbl);
                      });
          
   table =  sum_dataTable('#sample_3');
   // table.clear();
                   // table.ajax.url(students_data).load();

                  }else
                  {
                    $("#err_msg").html('<h3>'+res.message+'</h3>');
                  }
                }
              })

          }
      }
    
   // table =  sum_dataTable('#sample_3');

   function sum_dataTable(dataId){
    // alert();
    table = $(dataId).DataTable({
      dom: 'Blfrtip',
      retrieve: true,
      "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

      order: [[0, "asc"]],
            lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            pageLength: 10,
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
        
        buttons: [
                { extend: 'print', className: 'btn default' },
                { extend: 'pdf', className: 'btn default' },
                { extend: 'csv', className: 'btn default' },
             
            ],
           columnDefs: [
            
    ],

    "footerCallback": function ( row, data, start, end, display ) {
        this.api().columns('.sum').every(function () {
            var column = this;
          var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
            var sum = column
               .data()
               .reduce(function (a, b) { 
                // console.log(a);
                   a = intVal(a, 10);
                   if(isNaN(a)){ a = 0; }
                   
                   b = intVal(b, 10);
                   if(isNaN(b)){ b = 0; }
                   
                   return a + b;
               });
column.selector.opts.page='current';
               var currentPage = column
               .data()
               .reduce(function (a, b) { 
                   a = parseInt(a, 10);
                   if(isNaN(a)){ a = 0; }
                   
                   b = parseInt(b, 10);
                   if(isNaN(b)){ b = 0; }
                   
                   return a + b;
               });
               
            sum = sum.toLocaleString(undefined, {maximumFractionDigits:3});
            $(column.footer()).html(sum);
                        });
            }
        });
    return table;
    }


function admission_tab(id)
{
  console.log(students_data);
  var school_id = <?=json_encode($this->session->userdata('emis_school_id'));?>;
  // console.log(school_id);
  var students_det  = students_data.filter(stu=>stu.id == id)[0];
    
    if(students_det.transfer_flag==1){
    $(".group").hide();
    $.fn.datepicker.defaults.format = "dd-mm-yyyy";
           
 var curr = new Date();


var end = new Date(curr.getFullYear(), curr.getMonth(), curr.getDate());

$('.date').datepicker({
    
});
 

$('.date').datepicker("setEndDate",end);
    students_detail = students_data.filter(stu=>stu.id == id)[0];
    var dob_month = end.getMonth()+1
var dob = (end.getDate() < 10 ? '0'+end.getDate():end.getDate())+'-'+(dob_month < 10 ? '0'+dob_month:dob_month)
+'-'+end.getFullYear();
    // console.log(students_detail);



      $("#emis_unique_id_no").val(students_detail.unique_id_no);
    $("#stu_id").text(students_detail.name+'-'+students_detail.unique_id_no);
    $("#dat").datepicker("setDate",dob);
    // console.log(students_detail.class_studying_id);
      $("#students_id").val(students_detail.id);
		
		var optchi=document.getElementById("emis_class_id");
		for(var i=0;i<optchi.children.length;i++){
		      //alert(optchi.children[i].getAttribute("disabled"));
		      if(optchi.children[i].getAttribute("disabled"))
			     optchi.children[i].removeAttribute("disabled");
		}
        var check=0;
		for(var i=0;i<optchi.children.length;i++){
			if(parseInt(optchi.children[i].getAttribute("value"))==parseInt(students_detail.class_studying_id) || parseInt(optchi.children[i].getAttribute("value"))==parseInt(students_detail.class_studying_id)+1){
			     check=1;
				continue;
			}else{
				optchi.children[i].setAttribute("disabled","disabled");
			}
		}
        if(!check){alert("Student Class Not Found In the School");}
        
        $("#emis_class_id").val(students_detail.class_studying_id).attr('selected','selected');
        $("#emis_reg_mediofinst_ad").val(students_detail.education_medium_id).attr('selected','selected');
       
       $("#emis_reg_stu_admission_admiss_ad").val(students_detail.school_admission_no);
        get_stu_section(students_detail.class_studying_id,students_detail.class_section);
        $("#emis_reg_stu_rte_ad").val(students_detail.child_admitted_under_reservation).attr('selected','selected');
    if(students_detail.class_studying_id ==11 || students_detail.class_studying_id==12 )
        {
                $(".group").show();
                get_group(students_detail.class_studying_id.substr(1,2),students_detail.group_code_id);


        }
    $("#admitModal").modal('show');
  }else if(school_id == students_det.school_id){
        swal('Not Allowed','Student is already in the School','error');
        return false;
    }else if(students_det.request_flag ==null || students_det.request_flag==0 )
  {
    // console.log('else');
      var data = {'id':id};
    swal({  
        title: "Are you sure?",
        text: "Do you want to Raise Request for the Student?",
        type: "info",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes!",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }, function(isConfirm){
        if(isConfirm){
        $.ajax(
        {
            method:'POST',
            dataType:'JSON',
            data:data,
            url:'<?=base_url()."Registration/update_students_raise_request"?>',
            success:function(res)
            {
                if(res)
                {
                    swal({
                      title:'Requeted',
                      text:'Request Raised Successfully',
                      type:'success',
                      confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ok!",
                    },function(isConfirm){
                        window.location.reload();
                    })
                }
            }
        })
      }
    })
    
  }else
  {
    // console.log(requestflag);
    swal('Requested','Request Already Raised for This Student','error');

  }

}

$("#emis_class_id").change(function()
    {
		//alert('sample');
        var class_id = $(this).val();
        if(class_id ==11 || class_id ==12)
    {   
        // console.log('if');
        $(".group").show();
        get_group(class_id.substr(1,2),null);

    }else
    {
        $(".group").hide();
    }

        get_stu_section(class_id,null);
    })

    function get_stu_section(class_id,section_id)
    {
  // alert(section_id);

      if(class_id !=0){
    $.ajax(
    {
        type: "POST",
        url:baseurl+'Home/get_school_section_details',
        data:{'class_id':class_id},
        success: function(resp){
        // alert(resp);  
       
        var section = JSON.parse(resp);
        console.log(section);
            $(".section_det").empty('');            

        var section_drop = '<select name="emis_reg_stu_section" class="form-control" id="emis_reg_section_id">';

        section_drop += '<option value="0">பிரிவு</option>';
        $.each(section,function(id,val)
        {
            section_drop +='<option value='+ val.section +'>'+val.section+'</option>';
        })
            section_drop +='</select>';
            
            $(".section_det").append(section_drop); 
            // alert(section_id);
            if(section_id !='' && section_id !=null){
            $("#emis_reg_section_id").val(section_id).attr('selected','selected');   
            }else
            {
                // console.log('else');
                $("#emis_reg_section_id").val(0).attr('selected','selected');
            }      
         },
          
    })
    }
    }

    function get_group(class_id,group_id)
    {
        // alert(group_id);

        $.ajax({
        type: "POST",
        url:baseurl+'Home/get_common_tables',
        data:{'class_id':class_id,'table':'baseapp_group_code','where_col':'group_description'},
        success: function(resp){

    $(".group_det").empty('');  
            // $(".group").show();


        var group_drop = '<select name="emis_reg_grup_code" class="form-control" id="emis_reg_grup_code_ad">';

        group_drop += '<option value="">Select Group</option>';
        $.each(JSON.parse(resp),function(id,val)
        {
            group_drop +='<option value='+ val.id +'>'+val.group_code+'-'+val.group_name+'</option>';
        })
            group_drop +='</select>';
            
            $(".group_det").append(group_drop); 
            // console.log(group_id);
            if(group_id !='' && group_id !=null){
            $("#emis_reg_grup_code_ad").val(group_id).attr('selected','selected');   
            }else
            {
                // console.log('else');
                $("#emis_reg_grup_code_ad").val(0).attr('selected','selected');
            }  
        }

        })
    }


    


    
</script>
<script type="text/javascript">
  var aadhar_status = false;
  $("#emis_reg_stu_aadhaar_ed").change(function()
    {
        // alert();
        aadhar_status = false;
        $("#emis_reg_stu_aadhaar_alert").html('');
        var aadhar = $(this).val();
        var uni_id = $("#emis_reg_stu_uni_id").val();
        if(aadhar !=null){
          if(aadhar !=0 && aadhar.length ==12){
            var data = {'aadhar_no':aadhar,'unique_id':uni_id};
            $("#emis_reg_stu_aadhaar_alert").html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:17px"></i>Loading...');
        $.ajax({
            method:"POST",
            url:"<?=base_url().'Registration/check_aadhar_no'?>",
            data:data,
            dataType:'JSON',
            success:function(res)
            {
                // console.log(res);

                aadhar_status = res;
                if(res==2)
                {
                    $("#emis_reg_stu_aadhaar_alert").html('<p style="color:red">Invalid AADHAR Number</p>');
                    $("#emis_reg_stu_aadhaar_ed").val('');

                }else if(res)
                {
                    $("#emis_reg_stu_aadhaar_alert").html('<p style="color:red">AADHAR Already Exists in Database</p>');
                }else
                {
                    $("#emis_reg_stu_aadhaar_alert").html('');
                }
            }
        });
      }else
      {
                    $("#emis_reg_stu_aadhaar_alert").html('<p style="color:red">AADHAR Number Invalid</p>');

      }
            }else
            {
              $("#emis_reg_stu_aadhaar_alert").html('');
            }
    });
  function save_valid()
    {
        // alert();
        // console.log(aadhar_status);
        if(aadhar_status){
        $("#err_msg_save").html('<p style="color:red">AADHAR Already Exists in Database</p>');
            return false;
        }else
        {
            $("#err_msg_save").html('');
            return true;
        }
    }
	function getdropdown()
	{
	  var drop= $('#emis_reg_stu_rte').val();
      if(drop == 'Yes'){
		$("#rtetype").show();
		}
		else
		{
		$("#rtetype").hide();	
		}
	}
</script>
<script>
            $(document).ready(function(){
                $('#emis_reg_stu_idname_ad').on('keydown',function(event){
                    if(event.which==121){
                        // alert();
                        $(this).toggleClass('tamil');
                        return false;
                    }
                    if($(this).hasClass('tamil')){
                        toggleKBMode(event);
                    }else{
                        return true;
                    }
                });
                $('#emis_reg_stu_idname_ad').on('keypress',function(event){
                    if($(this).hasClass('tamil')){
                        convertThis(event);
                    }
                });
            });
        </script>
</html>