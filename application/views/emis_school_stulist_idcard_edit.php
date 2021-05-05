<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL STYLES -->
     <style type="text/css">
.circular--portrait {
  float:left;
  position: relative;
  width: 180px;
  height: 180px;
  overflow: hidden;
  border-radius: 50%;
}

.circular--portrait img {
  width: 100%;
  height: auto;
}

        </style>
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

<?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
<?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
<?php $this->load->view('block/header.php'); }else{ ?>
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
                                    <div class="page-title">
                                        <h1>All Student list
                                            
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
                                     <center>   
                                    <?php $this->load->view('emis_school_profile_header.php'); ?>
                                        </center>
           
                                        <!-- BEGIN CARDS -->
                                                         
                                               <?php $stud_id=$this->uri->segment(3,0); ?>
                                                  <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Student Data - <?php echo $name.' - '.$stud_id; ?></span>
                                                </div>
                                            </div>

                                           <div class="profile-content">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="portlet light ">
                                                                <div class="portlet-title tabbable-line">
                                                                    <div class="caption caption-md">
                                                                        <i class="icon-globe theme-font hide"></i>
                                                                        <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                                                    </div>
                                                                    <ul class="nav nav-tabs">
                                                                        <li class="active">
                                                                            <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                            <div class="portlet-body">
                                        <form class="form"  id="Academic_edit_form" name="Academic_edit_form" method="post" enctype="multipart/form-data" action="<?php echo base_url().'Home/emis_school_stulist_saveidcard_edit/'.$stud_id;?>" >
                                                <div class="tab-content">
                                                    <!-- PERSONAL INFO TAB -->
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        

                                                            <div class="col-md-12">
                                                                <div class="col-md-3">

                                                            <div class="form-group">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="circular--portrait" >
                                                                       <?php  if($photo!=""){ ?>
                                                                        <img  src="<?php echo 'data:image/jpeg;base64,'.base64_encode( $photo ); ?>";  alt="" />
                                                                        <?php }else{?> 
                                                                         <img   src="<?php echo base_url().'asset/images/avatar1.png';?>";  alt="" /> <?php } ?>
                                                                         </div>
                                                                  
                                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> Select image </span>
                                                                            
                                                                            <input type="file" name="idcardimage" id="idcardimage" onchange="return ValidateFileUpload()"> </span>
                                                                             <input type="hidden" id="emis_stu_idcard_image" name="emis_stu_idcard_image" value="<?php echo base64_encode( $photo ); ?>" /> 
                                                                            <font style="color:#dd4b39;"><div id="emis_stu_idcard_image_alert"></div></font>
                                                                         </div>
                                                                          <div class="clearfix margin-top-10">
                                                                    <span class="label label-danger">NOTE! </span>
                                                                    <span><br/> Upload Image should be in <br/> 1.Maximum size 20KB!<br/> 
                                                                    2.Support Formats JPG, PNG only! </span>
                                                                </div>
                                                               
                                                           
                                                                </div>
                                                               
                                                            </div>

                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <label class="control-label bold">Name</label>
                                                                <input type="text" id="emis_stu_idcard_name" name="emis_stu_idcard_name" placeholder="பெயர்" class="form-control" value="<?php echo $name; ?>" /> 
                                                                <font style="color:#dd4b39;"><div id="emis_stu_idcard_name_alert"></div></font> </div>
                                                            
                                                            <div class="form-group col-md-6">
                                                            <label class="control-label bold">Gender</label>
                                                             <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_stu_idcard_gender" name="emis_stu_idcard_gender" >
                                                              <option value="" style="color:#bfbfbf;">Gender </option>
                                                              <option value="1" <?php if($gender=="1"){?> selected<?php } ?>>(Male)</option>
                                                              <option value="2" <?php if($gender=="2"){?> selected<?php } ?>>(Female)</option>
                                                              <option value="3" <?php if($gender=="3"){?> selected <?php } ?>>(Transgender)</option>
                                                               
                                                             </select> 
                                                             <font style="color:#dd4b39;"><div id="emis_stu_idcard_gender_alert"></div></font>
                                                         </div>

                                                             <label style="color:#dd4b39;">Note: Father name or Mother name or Guardian name Either one is mandatory!</label>

                                                         </div>
                                                         <div class="row">
                                                             <div class="form-group col-md-4">
                                                                <label class="control-label bold">Fathername</label>
                                                                <input type="text" placeholder="Fathername"  id="emis_stu_idcard_father" name="emis_stu_idcard_father" class="form-control" value="<?php echo $father_name; ?>"/>
                                                                    <font style="color:#dd4b39;"><div id="emis_stu_idcard_father_alert"></div></font>
                                                                 </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="control-label bold">Mothername</label>
                                                                <input type="text" placeholder="Mothername"  id="emis_stu_idcard_mother" name="emis_stu_idcard_mother" class="form-control" value="<?php echo $mother_name; ?>"/>
                                                                    <font style="color:#dd4b39;"><div id="emis_stu_idcard_mother_alert"></div></font>
                                                                 </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="control-label bold">Guardianname</label>
                                                                <input type="text" placeholder="Guardianname"  id="emis_stu_idcard_guardian" name="emis_stu_idcard_guardian" class="form-control" value="<?php echo $guardian_name; ?>"/> 
                                                                <font style="color:#dd4b39;"><div id="emis_stu_idcard_guardian_alert"></div></font>
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                                <label class="control-label bold">
                                                                <input type="radio" id="emis_stu_idcard_adharadio" name="v1" onclick="EnableDisableTextBox(this)" <?php if($aadhaar_uid_number!=""){ ?> checked <?php  } ?> >Aadhaar Number </label>
                                                                <input type="text" placeholder="Aadhaar Number" class="form-control" id="emis_stu_idcard_adhaar" name="emis_stu_idcard_adhaar" value="<?php echo $aadhaar_uid_number; ?>" maxlength="12" disabled/>
                                                                <font style="color:#dd4b39;"><div id="emis_stu_idcard_adhaar_alert"></div></font>
                                                                </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="control-label bold">
                                                                    <input type="radio" name="v1"  id="emis_stu_idcard_enrolradio"  onclick="EnableDisableTextBox1(this)" <?php if($enrollmentnumber!=0){ ?> checked <?php  } ?> >Enrollment Number </label>
                                                                <input type="text" placeholder="Enrollment Number" class="form-control" id="emis_stu_idcard_enroll" name="emis_stu_idcard_enroll" value="<?php  if($enrollmentnumber!=0){ echo $enrollmentnumber; } ?>" maxlength="14" disabled/>
                                                                <font style="color:#dd4b39;"><div id="emis_stu_idcard_enroll_alert"></div></font>
                                                                  </div>
                                                                <div class="form-group col-md-4">
                                                                <label class="control-label bold">
                                                                    <input type="radio" name="v1"  id="emis_stu_idcard_noappliedradio" value="Aadhaar Enrollment not done"  onclick="EnableDisableTextBox2(this)" <?php if($adhaarappliedstatus=="Notapplied"){ ?> checked <?php  } ?> >Not Applied </label>
                                                                <input type="text" placeholder="Not Applied" class="form-control" id="emis_stu_idcard_notapplied" name="emis_stu_idcard_notapplied"  value="Aadhaar Enrollment not done" disabled/>
                                                                <font style="color:#dd4b39;"><div id="emis_stu_idcard_notapplied_alert"></div></font>
                                                                  </div>
                                                              </div>
                                                              <div class="row">
                                                                  <?php $dates = explode('-',$dob); ?>
                                                            <div class="form-group col-md-4">
                                                                <label class="control-label bold">DOB : Date</label>
                                                               <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_stu_idcard_date" name="emis_stu_idcard_date" >
                                                            <option value="" style="color:#bfbfbf;">Date </option>
                                                            <?php   $tempnumber = '';
                                                                       for($i=1;$i<32;$i++) { 
                                                                        $tempnumber = sprintf("%02s", $i);  ?>   
                                                                       
                                                                          <option value="<?php echo $tempnumber; ?>" <?php if($dates[2]==$tempnumber){ ?> selected <?php } ?>><?php echo $tempnumber; ?></option>
                                                                       <?php }  ?> 
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_stu_idcard_date_alert"></div></font>
                                                                  </div>
                                                            <div class="form-group col-md-4">
                                                    <label class="control-label bold"> Month</label>
                                                    <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_stu_idcard_month" name="emis_stu_idcard_month">
                                                        <option value="" style="color:#bfbfbf;">Month </option>
                                                          <option value="01"<?php if($dates[1]=="01"){ ?> selected <?php } ?>>January</option>
                                                          <option value="02"<?php if($dates[1]=="02"){ ?> selected <?php } ?>>February</option>
                                                          <option value="03"<?php if($dates[1]=="03"){ ?> selected <?php } ?>>March</option>
                                                          <option value="04"<?php if($dates[1]=="04"){ ?> selected <?php } ?>>April</option>
                                                          <option value="05"<?php if($dates[1]=="05"){ ?> selected <?php } ?>>May</option>
                                                          <option value="06"<?php if($dates[1]=="06"){ ?> selected <?php } ?>>June</option>
                                                          <option value="07"<?php if($dates[1]=="07"){ ?> selected <?php } ?>>July</option>
                                                          <option value="08"<?php if($dates[1]=="08"){ ?> selected <?php } ?>>August</option>
                                                          <option value="09"<?php if($dates[1]=="09"){ ?> selected <?php } ?>>September</option>
                                                          <option value="10"<?php if($dates[1]=="10"){ ?> selected <?php } ?>>October</option>
                                                          <option value="11"<?php if($dates[1]=="11"){ ?> selected <?php } ?>>November</option>
                                                          <option value="12"<?php if($dates[1]=="12"){ ?> selected <?php } ?>>December</option>
                                                        </select>
                                                           </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="control-label bold">Year</label>
                                                                <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_stu_idcard_year" name="emis_stu_idcard_year">
                                                            <option value="" style="color:#bfbfbf;">Year </option>
                                                              <?php
                                                              $year=date('Y');
                                                              $min=$year-21;
                                                              $max=$year-3;
                                                              for($i=$min;$i<$max;$i++)
                                                              {?>
                                                              <option value="<?php echo $i; ?>"<?php if($dates[0]==$i){ ?> selected <?php } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                            </select>

                                                                  </div>
                                                              </div>
                                                                  <div class="row">
                                                            <div class="form-group col-md-4">
                                                        <label class="control-label bold">Blood group</label>
                                                        <select class="form-control" data-placeholder="Choose a Blood" tabindex="1" id="emis_stu_idcard_blood" name="emis_stu_idcard_blood">
                                                        <option value="" style="color:#bfbfbf;">Select Blood Group</option>
                                                         <?php  
                                                    foreach($bloodgroups as $bg){ ?>
                                                 <option value="<?php echo $bg->id;  ?>"
                                                    <?php if($blood==$bg->id){ ?> selected<?php  } ?>><?php echo $bg->group;  ?></option>
                                                 <?php   }  ?>
                                                        </select> 
                                                            <font style="color:#dd4b39;"><div id="emis_stu_idcard_blood_alert"></div></font>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="control-label bold">Class</label>
                                                                <select class="form-control"  tabindex="1" id="emis_stu_idcard_class" name="emis_stu_idcard_class">
                                                        <option value="" style="color:#bfbfbf;">Select Class </option>
                                                        <?php  
                                                    foreach($classlist as $cl){ ?>
                                                 <option value="<?php echo $cl->id;  ?>"
                                                    <?php if($class_studying_id==$cl->class_studying){ ?> selected<?php  } ?>><?php echo $cl->class_studying;  ?></option>
                                                 <?php   }  ?>
                                                        </select> 
                                                        <font style="color:#dd4b39;"><div id="emis_stu_idcard_class_alert"></div></font> 

                                                    </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="control-label bold">Section</label>
                                                               <select class="form-control" data-placeholder="Choose a Blood" tabindex="1" id="emis_stu_idcard_section" name="emis_stu_idcard_section">
                                                        <option value="" style="color:#bfbfbf;">Select Section </option>
                                                        <?php   $a=explode(',',$sections);
                                                    foreach($a as $v){ ?>
                                                 <option value="<?php echo $v;  ?>" <?php if($v==$class_section){ ?> selected<?php  } ?>><?php echo $v;  ?></option>
                                                 <?php   }  ?>
                                                        </select> 
                                                    <font style="color:#dd4b39;"><div id="emis_stu_idcard_section_alert"></div></font>
                                                </div>
                                            </div>
                                            <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <label class="control-label bold">Door no. / Building Name </label>
                                                                 <input type="text" placeholder="Door no. / Building Name " id="emis_stu_idcard_door" name="emis_stu_idcard_door" class="form-control" value="<?php echo $house_address; ?>" /> 
                                                                 <font style="color:#dd4b39;"><div id="emis_stu_idcard_door_alert"></div></font>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="control-label bold">Street Name / Area name</label>
                                                                 <input type="text" placeholder="Street Name / Area name" id="emis_stu_idcard_area" name="emis_stu_idcard_area"
                                                                 class="form-control" value="<?php echo $street_name; ?>" /> 
                                                                 <font style="color:#dd4b39;"><div id="emis_stu_idcard_area_alert"></div></font>
                                                            </div>
                                                             </div>
                                                            <div class="row">
                                                            <div class="form-group col-md-4">
                                                                <label class="control-label bold">City name / Village name </label>
                                                                 <input type="text" placeholder="City name / Village name " id="emis_stu_idcard_city" name="emis_stu_idcard_city" class="form-control" value="<?php echo $area_village; ?>" /> 
                                                                 <font style="color:#dd4b39;"><div id="emis_stu_idcard_city_alert"></div></font>
                                                            </div>
                                                                                          
                                                              <div class="form-group col-md-4">
                                                                <label class="control-label bold">District</label>
                                                                 <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_stu_idcard_district" name="emis_stu_idcard_district" placeholder=">District *">
                                                        <option value="" >Select District</option>
                                                         <?php foreach($schooldist as $dist) {   ?>
                                                          <option value="<?php echo $dist->id;  ?>" <?php if($dist->id==$district){ ?>selected<?php } ?>><?php echo $dist->district_name  ?></option>
                                                          <?php   }  ?>
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_stu_idcard_district_alert"></div></font>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="control-label bold">Pincode </label>
                                                                 <input type="text" placeholder="Pincode" id="emis_stu_idcard_pincode" name="emis_stu_idcard_pincode" class="form-control" value="<?php echo $pin_code; ?>" /> 
                                                                 <font style="color:#dd4b39;"><div id="emis_stu_idcard_pincode_alert"></div></font>
                                                            </div>
                                                        </div>
                                                           
                                                        </div>
                                                    </div>
                                                    <center>
                                                     <div class="margin-top-12">
                                                                <button type="submit" class="btn green" id="emis_idcard_edit_sub">Save Changes</button>
                                                            </div>
                                                        </center>
                                                        <!-- </form> -->
                                                        <br/>
                                                    </div>

                                                </div>
                                            </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>                                        
</div>






                                        <!-- END CARDS -->

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
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
  <script type="text/javascript">
 function EnableDisableTextBox(chkPassport) {
        var txtPassportNumber = document.getElementById("emis_stu_idcard_adhaar");
        var txtPassportNumber1 = document.getElementById("emis_stu_idcard_enroll");
       txtPassportNumber.disabled = chkPassport.checked ? false : true;
        if (!txtPassportNumber.disabled) {
            txtPassportNumber.focus();
        }
          txtPassportNumber1.disabled=true;
    }

    function EnableDisableTextBox1(chkPassport) {
        var txtPassportNumber = document.getElementById("emis_stu_idcard_enroll");
         var txtPassportNumber1 = document.getElementById("emis_stu_idcard_adhaar");
       txtPassportNumber.disabled = chkPassport.checked ? false : true;
        if (!txtPassportNumber.disabled) {
            txtPassportNumber.focus();
        }
         txtPassportNumber1.disabled=true;
    }

    function EnableDisableTextBox2(chkPassport) {
        var txtPassportNumber = document.getElementById("emis_stu_idcard_enroll");
         var txtPassportNumber1 = document.getElementById("emis_stu_idcard_adhaar");
         txtPassportNumber.disabled=true;
         txtPassportNumber1.disabled=true;
    }

    function ValidateFileUpload() {

var fuData = document.getElementById('idcardimage');
var FileUploadPath = fuData.value;

var MAX_SIZE=20000;


if (FileUploadPath == '') {
    alert("Please upload an image");
     $("#idcardimage").val('');
   

} else {
    var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

    if (Extension == "gif" || Extension == "png" 
                || Extension == "jpeg" || Extension == "jpg") {


            if (fuData.files && fuData.files[0]) {

                var size = fuData.files[0].size;

                if(size > MAX_SIZE){
                    alert("Maximum file size exceeds 20KB");
                     $("#idcardimage").val('');
                    return;
                }else{
                    
            var reader = new FileReader();
            reader.onload = function (e) {
                var img = new Image();
                // img.onload = function() {
                //     var preview = document.getElementById('preview');
                //     preview.src = e.target.result;
                //     };
                img.onerror = function() {
                    alert('Please uploa valid Image only!');
                     $("#idcardimage").val('');
                      return;
                    };
                img.src = e.target.result;
                }
            reader.readAsDataURL(fuData.files[0]);
           
                }
            }

    } 


else {
        alert("Photo only allows file types of GIF, PNG, JPG, and JPEG. ");
        $("#idcardimage").val('');
       
    }
}}




  </script>

  <script>
function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var img = new Image();
                img.onload = function() {
                    var preview = document.getElementById('preview');
                    preview.src = e.target.result;
                    };
                img.onerror = function() {
                    alert('file format is not good,plz check');
                    input.value = '';
                    };
                img.src = e.target.result;
                }
            reader.readAsDataURL(input.files[0]);
            }
        }
   
    }
</script>
    </body>

</html>