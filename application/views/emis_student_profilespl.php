
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
             <link href="<?php echo base_url().'assets/global/plugins/bootstrap-sweetalert/sweetalert.css';?>" rel="stylesheet" type="text/css" />
            <!--      <link href="<?php echo base_url().'asset/global/plugins/languages/css/pramukhindic.css';?>" rel="stylesheet" type="text/css" />
               <link href="<?php echo base_url().'asset/global/plugins/languages/css/pramukhtypepad.css';?>" rel="stylesheet" type="text/css" /> -->
                 <style type="text/css">
           .circular--portrait {
              float:left;
              position: relative;
              width: 100px;
              height: 100px;
              overflow: hidden;
              border-radius: 50%;
            }

            .circular--portrait img {
              width: 100%;
              height: auto;
            }

        </style>
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
                                    <h1>Student Profile
                                       <small>Information</small>
                                    </h1>
                                 </div>

                                 <!-- END PAGE TITLE -->
                                 <!-- BEGIN PAGE TOOLBAR -->
                                 <!-- END PAGE TOOLBAR -->
                   <?php $groupname="";  $disadvantage=""; $lauguage=""; $caste=""; $community1=""; ?> 
                   <?php if(!empty($community)) {   foreach ($community as $key) { $community1= $key->community_name;  } }  ?>
                   <?php if(!empty($subcaste)) {  foreach ($subcaste as $key) { $caste = $key->caste_name;   }  } ?>
                   <?php if(!empty($mother11)) {  foreach($mother11 as $mth){ $lauguage=$mth->language_name; }  }  ?>
                   <?php if(!empty($DisadvantagegroupName)) {  foreach ($DisadvantagegroupName as $key) { $groupname=$key->dis_group_name; } }  ?>
                   <?php if(!empty($DisabilityGroupName)) {  foreach ($DisabilityGroupName as $key) { $disadvantage=$key->da_name;  } } ?>

                        <?php  $userflag=0;
                        $studentid = $this->uri->segment(3,0);
                       $stuprofile1  = $this->Homemodel->getstuprofile1($studentid);
                       $school_id=$this->session->userdata('emis_school_id');
                       $getschoolid=$stuprofile1[0]->school_id; 

                       if($getschoolid==$school_id){
                        $userflag=1;
                       }             
                           ?>     
                              </div>
                           </div>
                           <!-- END PAGE HEAD-->
                           <!-- BEGIN PAGE CONTENT BODY -->
                           <div class="page-content">
                              <div class="container">
                                 <div class="col-md-12">
                                    <div class="row">
                                      <?php  if($photo == "" || $photo == NULL) { ?>
                                          <div class="col-md-2">
                                            <div class="circular--portrait">
                                               <img  src="<?php echo base_url().'asset/images/avat.jpg';?>";  alt="" /> 
                                            </div>
                                          </div>
                                      <?php } else {   ?>
                                          <div class="col-md-2">
                                            <div class="circular--portrait">
                                               <img  src="https://s3.ap-south-1.amazonaws.com/tnschoolsawsphoto/<?php echo $photo; ?>";  alt="" /> 
                                            </div>
                                          </div>
                                      <?php  }  ?>

                                       <div class="col-md-8" style="margin-left: -6%">
                                          <div class="pull-left">
                                             <span class="testimonials-name">
                                                <h3 style="margin-top:0px;"> <a style="text-decoration: none; color:red;"><?php echo $name.' - '.$uniquenumber; ?></a></h3>
                                               <ul class="list-inline">
                                               <li>
                                            <font style="color:#2AABB5;"><i class="fa fa-calendar"></i></font>  DOB :  <?php echo $dob; ?> </li>
                                                <li>
                                            <font style="color:#2AABB5;"><i class="fa fa-male"></i></font> Gender : <?php if($gender==1){ echo "Male"; }else if($gender==2){ echo "Female"; }else if($gender==3){ echo "Transgender"; } ?> </li>
                                            <?php if($aadhaar_uid_number!="" || $enrollmentnumber == "") { ?>
                                            <li>
                                            <font style="color:#2AABB5;"><i class="fa fa-credit-card"></i></font>  Aadhaar number :  <?php if($aadhaar_uid_number!=""){ echo 'XXXX-XXXX-'.substr($aadhaar_uid_number, -4); } ?> </li>
                                            <?php } else {  ?>
                                             <li>                                              
                                            <font style="color:#2AABB5;"><i class="fa fa-credit-card"></i></font>  Aadhaar Enrollment number :  <?php if($enrollmentnumber!=""){ echo $enrollmentnumber; } ?> </li>
                                            <?php  } ?>
                                            </ul>
                                            <ul class="list-inline">
                                            <li>
                                            <font style="color:#2AABB5;"><i class="fa fa-rebel"></i> </font> Religion - Community - Subcaste : <?php echo $religion.' - '.$community1.' - '.$caste; ?> </li>
                                            </ul>
                                            <ul class="list-inline">
                                            <li>
                                            <font style="color:#2AABB5;"><i class="fa fa-language"></i> </font>Mother tongue :   <?php echo $lauguage; ?> </li>
                                                <li>
                                            <font style="color:#2AABB5;"><i class="fa fa-circle"></i> </font> Disadvantage Group Name :
                                            <?php if($groupname!=""){ echo $groupname; } ?> </li>
                                            <li>
                                            <font style="color:#2AABB5;"><i class="fa fa-star"></i> </font> Disability Group Name :  <?php echo $disadvantage; ?> </li>
                                            </ul>
                                             </span>
                                             <br/>
                                             <!-- <span class="testimonials-post"><b>Aadhar number : </b> <?php echo $aadhaar_uid_number; ?> |  
                                             <b>Date of Birth : </b> <?php echo $dob; ?> | 
                                             <b>Gender : </b> <?php if($gender==1){ echo "Male"; }else if($gender==2){ echo "Female"; }else if($gender==3){ echo "Transgender"; } ?> | 
                                             
                                             <b> Religion : </b>  <?php echo $religion;  ?> | 
                                             <?php foreach ($community as $key) {   ?>
                                             <b>Community : </b> <?php echo $key->community_name; ?> <?php   }  ?>|
                                             <?php foreach ($subcaste as $key) {?> 
                                             <b>Subcaste : </b><?php echo $key->caste_name; ?> <?php   }  ?>|
                                             <?php   foreach($mother11 as $mth) {?>
                                             <b>Mother tongue : </b> <?php echo $mth->language_name; ?>  <?php   }  ?>|
                                             <?php foreach ($DisadvantagegroupName as $key) {?> 
                                             <b>Disadvantage Group Name : </b> <?php echo $key->dis_group_name; ?> <?php   }  ?> | 
                                             <?php foreach ($DisabilityGroupName as $key) {?>
                                             <b>Disability Group Name : </b> <?php echo $key->da_name; ?>  <?php   }  ?></span> -->
    
                                            <!--  <table class="table table-striped">
                                             <thead ><th colspan="4">Family Info</th></thead>
                                              <tbody>
                                             <tr>
                                                <td><b>Mother Name :</b> <?php echo $mother_name; ?></td>
                                                <td><b>Mother Name :</b> <?php echo $mother_name; ?></td>
                                                <td><b>Mother Name :</b> <?php echo $mother_name; ?></td>
                                                <td><b>Mother Name :</b> <?php echo $mother_name; ?></td>
                                             </tr>
                                             <tr>
                                                <td><b>Mother Name :</b> <?php echo $mother_name; ?></td>
                                                <td><b>Mother Name :</b> <?php echo $mother_name; ?></td>
                                                <td><b>Mother Name :</b> <?php echo $mother_name; ?></td>
                                                <td><b>Mother Name :</b> <?php echo $mother_name; ?></td>
                                             </tr>
                                           <tbody>
                                             </table> -->
                                          </div>
                                          
                                       </div>
                                       <div class="col-md-2" style="margin-left: 6%;">
                                       <?php if($user_type_id==1){ if($userflag==1){   

                                            $studentid = $this->session->userdata('emis_stud_id'); 
                                            $studentfalg = $this->Homemodel->getstuflag($studentid);

                                            if($studentfalg==0){?>
                                         <a href="<?php echo base_url().'Home/emis_student_profile1/'.$studentid;?>" class="pull-right"  > <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a><?php  }}} ?> 
                                          <?php  
                                             $this->load->database();
                                             $this->load->model('Homemodel');
                                             $user_type_id=$this->session->userdata('emis_user_type_id');
                                             $studentid = $this->session->userdata('emis_stud_id');
                                             $stuprofile1  = $this->Homemodel->getstuprofile1($studentid);
                                             $school_id=$this->session->userdata('emis_school_id');
                                             $getschoolid=$stuprofile1[0]->school_id;

                                            if($user_type_id==1 )
                                            {  
                                              if($userflag==1)
                                              {
                                                $studentid = $this->session->userdata('emis_stud_id'); 
                                                $studentfalg = $this->Homemodel->getstuflag($studentid);
                                                  if($studentfalg==0)
                                                  {
                                                 ?> 
                                                    <input type="hidden" id="emis_stu_transfer0_id" name="emis_stu_transfer0_id" value="<?php echo $studentid; ?>">

                                                    <button id="emis_stu_transferspl" name="emis_stu_transferspl" class="btn green">Transfer</button>

                                                  
                                            <?php }
                                                  else
                                                  { ?>
                                                    <button id="emis_stu_admit" name="emis_stu_admit" class="btn green">Admit</button> 
                                           <?php  }  
                                              } 
                                              else
                                              {
                                                  if($school_id!="")
                                                  {
                                                      $studentid = $this->session->userdata('emis_stud_id'); 
                                                      $studentfalg = $this->Homemodel->getstuflag($studentid);

                                                       if($studentfalg==1)
                                                       {                                                 
                                                         ?>
                                                          <button id="emis_stu_admit" name="emis_stu_admit" class="btn green">Admit
                                                          </button> 
                                                 <?php } 

                                                       else if($requestflag == 0)
                                                       { 

                                                            $studentid = $this->session->userdata('emis_stud_id'); 
                                                            $studentfalg = $this->Homemodel->getstuflag($studentid);
                                                               ?>
                                                                <input type="hidden" id="emis_stu_transfer0_id" name="emis_stu_transfer0_id" value="<?php echo $studentid; ?>">
                                                               <button id="emis_stu_raiserequest" name="emis_stu_raiserequest" class="btn btn-danger">Raise Request</button>  
                                                 <?php }  
                                               }  
                                             }   
                                           } 

                                       else if($user_type_id==3 && $requestflag == 1) { 

                                         $studentid = $this->session->userdata('emis_stud_id'); 
                                              $studentfalg = $this->Homemodel->getstuflag($studentid);

                                        $currentdate = date("Y-m-d");
                                        $date1=date_create($requestdate);
                                        $date2=date_create($currentdate);
                                        $diff=date_diff($date1,$date2);
                                        $diffnumformat =  $diff->format("%a");
                                          if($diffnumformat > 3) {
                                         ?>
                                         <input type="hidden" id="emis_stu_transferspl_id" name="emis_stu_transferspl_id" value="<?php echo $studentid; ?>">

                                         <div>
                                        <button id="emis_stu_transferspl" name="emis_stu_transferspl" class="btn green">Transfer</button>
                                      </div>
                                        <div style="padding-top: 20px;">
                                        <button id="emis_stu_rejectspl" name="emis_stu_rejectspl" class="btn red" >Reject</button>
                                      </div>
                                       <?php } }  ?>

                                         <!--  <?php if($requestflag == 0 && $studentfalg!=0) { ?>

                                          <button id="emis_stu_raiserequest" name="emis_stu_raiserequest" class="btn btn-danger">Raise Request</button> 

                                          <?php } ?>
                                                 -->
                                          </div>
                                    </div>
                                   
                                 <!--    <div>
                                      <form class="form"  id="student_image_form" name="student_image_form" method="POST" enctype="multipart/form-data" action="<?php echo base_url().'Home/updatephoto';?>">
                                        
                                              <a class="btn btn-success" id="selectphoto" onclick="document.getElementById('student_profile').click();"> Select New Profile Photo</a>
                                              <button type="submit" class="btn btn-success"> Update</button>
                                              <input type="hidden" id="unique_id_no" name="unique_id_no" value="<?php echo $studentid; ?>">
                                              <input type="file" name="student_profile" id="student_profile" style="display: none;" > 
                                            </form>
                                      </div> -->



                                    <div class="row">
                                       <div class="carousel-info container">
                                          <div class="col-md-12 thumbnail">
                                             <span class="col-md-6" >
                                              <?php if($user_type_id==1){ if($userflag==1){ 

                                              $studentid = $this->session->userdata('emis_stud_id'); 
                                            $studentfalg = $this->Homemodel->getstuflag($studentid);

                                            if($studentfalg==0){ ?>

                                             <a href="<?php echo base_url().'Home/emis_student_profile2/'.$studentid;?>" class="pull-right"  style="margin-top: 2%; margin-right: 25px;"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>  <?php } } } ?> 


                                                <center>
                                                   <h3 class="testimonials-name-in">Family Details</h3>
                                                </center>

                                                <table class="table table-striped">
                                                   <tbody>
                                                      <tr>
                                                         <td><b>Mother /Father/Guardian Name</b></td>
                                                         <td><?php echo $mother_name.'/'.$father_name.'/'.$guardian_name; ?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><b>Father's Occupation</b></td>
                                                         <td><?php echo $father_occupation; ?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><b>Mother's Occupation</b></td>
                                                         <td><?php echo $mother_occupation; ?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><b>Parents Annual income</b></td>
                                                         <td><?php echo $parent_income; ?></td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </span>
                                             <span class="col-md-6">
                                             <?php if($user_type_id==1){ if($userflag==1){ $studentid = $this->session->userdata('emis_stud_id'); 
                                            $studentfalg = $this->Homemodel->getstuflag($studentid);

                                            if($studentfalg==0){ ?>
                                             <a href="<?php echo base_url().'Home/emis_student_profile3/'.$studentid;?>" class="pull-right" style="margin-top: 2%; margin-right: 10px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a><?php }  } } ?> 
                                                <center>
                                                   <h3 class="testimonials-name-in">Communication Details</h3>
                                                </center>
                                                <table class="table table-striped">
                                                   <tbody>
                                                      <tr>
                                                         <td><b>Mobile number</b></td>
                                                         <td><?php  if($phone_number!=""){ echo  'XXXXXX'.substr($phone_number, -4); }?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><b>Email id</b></td>
                                                        <td><?php if($email!=""){ echo substr($email,0,4).'XXXXXXX'.substr($email, -9); } ?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><b>Address:</b></td>
                                                         <td><?php echo $house_address.' - '.$street_name
                                                         .' - '.$area_village; ?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><b>District</b></td>
                                                         <?php foreach ($district as $key) {?>
                                                         <td><?php echo $key->district_name.' - '.$pin_code; ?></td>
                                                         <?php } ?>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </span>
                                          
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="carousel-info container">
                                     <div class="col-md-12 thumbnail">
                                     <?php if($user_type_id==1){ if($userflag==1){ 
                                      $studentid = $this->session->userdata('emis_stud_id'); 
                                      $studentfalg = $this->Homemodel->getstuflag($studentid);

                                            if($studentfalg==0){?>
                                         <a href="<?php echo base_url().'Home/emis_student_profile4/'.$studentid;?>" class="pull-right" style="margin-top: 2%; margin-right: 25px;">
                                         <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a><?php  } } } ?> 
                                              <center>
                                                   <h3 class="testimonials-name-in">Academic info</h3>
                                                </center>
                                      <span class="col-md-6">
                                                <table class="table table-striped">
                                                   <tbody>
                                                    <tr>
                                                         <td><b>School name</b></td>
                                                         <td><?php echo $school_name; ?></td>
                                                      </tr>
                                                      
                                                      <tr>
                                                         <td><b>Class Studying</b></td>
                                                         <?php  if($classname == 13) { ?>
                                                         <td><?php echo 'LKG'; ?></td>
                                                         <?php } else if($classname == 14) { ?>
                                                          <td><?php echo 'UKG'; ?></td>
                                                         <?php } else if($classname == 15) { ?>
                                                          <td><?php echo 'PreKG'; ?></td>
                                                         <?php }  else { ?><td> <?php echo $class_studying_id; ?>  </td> <?php  } ?>
                                                      </tr>
                                                    
                                                      <tr>
                                                         <td><b>Previous class studied</b></td>
                                                         <td><?php echo $prev_class; ?></td>
                                                      </tr>
                                                     
                                                      <tr>
                                                         <td><b>Date of Joining</b></td>
                                                         <td><?php echo $doj; ?></td>
                                                      </tr>
                                                      <?php if($group_code_name!=""){ ?> 
                                                      <tr>
                                                         <td><b>Group code</b></td>
                                                         <td><?php echo $group_code_name; ?></td>
                                                      </tr><?php } ?>
                                                      <?php if($cbse_subject1_id!=""){ ?>
                                                      <tr>
                                                      <td><b>CBSC Subject 1:</b></td>
                                                      <td><?php echo $cbse_subject1_id; ?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><b>CBSC Subject 2:</b></td>
                                                         <td><?php echo $cbse_subject2_id; ?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><b>CBSC Subject 3:</b></td>
                                                         <td><?php echo $cbse_subject3_id; ?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><b>CBSC Subject 4:</b></td>
                                                         <td><?php echo $cbse_subject4_id; ?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><b>CBSC Optionl Subject:</b></td>
                                                         <td><?php echo $cbse_opt_subject_id; ?></td>
                                                      </tr><?php } ?>
                                                   </tbody>
                                                </table>
                                             </span>

                                             <span class="col-md-6">
                                                <table class="table table-striped">
                                                   <tbody>
                                                      <tr>
                                                         <td><b>School udise code</b></td>
                                                         <td><?php echo $school_udisecode; ?></td>
                                                      </tr>
                                                        <tr>
                                                         <td><b>Section</b></td>
                                                         
                                                            <td><?php echo $class_section; ?></td>
                                                      </tr>
                                                       <tr>
                                                         <td><b>Admission Number</b></td>
                                                         <td><?php echo $school_admission_no; ?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><b>Medium of instruction</b></td>
                                                         <td><?php echo $education_medium_name; ?></td>
                                                      </tr>
                                                      <?php if($rte!=""){ ?>
                                                      <tr>
                                                         <td><b>Came through RTE 25%:</b></td>
                                                         <td><?php echo $rte; ?></td>
                                                      </tr><?php } ?>
                                                      <?php if($aidunaid!=""){ ?>
                                                      <tr>
                                                         <td><b>Aided or Un-Aided Section</b></td>
                                                         <td><?php echo $aidunaid; ?></td>
                                                      </tr><?php } ?>
                                                     
                                                   </tbody>
                                                </table>
                                             </span>
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
               </div>
               <?php $this->load->view('footer.php'); ?>
            </div>
            <?php $this->load->view('scripts.php'); ?>

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
        <script src="<?php echo base_url().'assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js';?>" ></script>

        <script src="<?php echo base_url().'assets/pages/scripts/ui-sweetalert.min.js';?>" ></script>

        <script src="<?php echo base_url().'assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js';?>"></script>
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
                 $('#nametamil').editable({
                     type: 'text',
                     pk: 1,
                     name: 'name_tamil',
                     title: 'Enter School Name in Tamil',
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
                          if(! /^[0-9]{12}$/.test(value))
                         {
                             return 'Enter Valid aadhar Number';
                         }
                     }
               
                 });
               
                  var genderr = [];
                 $.each({
                     "1": "Male",
                     "2": "Female",
                     "3": "Other"            
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
               
                 var disabilitygroup = [];
                 $.each({
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
                     // init editable toggler
                     $('#enable').click(function() {
                         $('#user .editable').editable('toggleDisabled');
                     });
               
                     $('#test1').on('save', function(e, params) {
                          alert('Saved value: ' + params.newValue);
                     });
               
               
            </script>
         </body>
      </html>

