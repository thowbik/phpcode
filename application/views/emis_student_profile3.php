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
                                        <h1>Profile
                                            <small>Communication Information</small>
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
                                                <a href="<?php echo base_url().'Home/emis_student_profile3/'.$studentid;?>"><div class="col-md-3 bg-grey mt-step-col active">
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
                                                if($user_type_id==1 ){  
                                                
                                                $studentid = $this->session->userdata('emis_stud_id'); 
                                                $studentfalg = $this->Homemodel->getstuflag($studentid);
                                                if($studentfalg==0){

                                                 if($school_id==$getschoolid){
                                                $studentid = $this->session->userdata('emis_stud_id'); 
                                                $studentfalg = $this->Homemodel->getstuflag($studentid);
                                                ?> 
                                                <input type="hidden" id="emis_stu_transfer3_id" name="emis_stu_transfer3_id" value="<?php echo $studentid; ?>">

                                                <button id="emis_stu_transfer3" name="emis_stu_transfer3" class="btn green" >Transfer</button>
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
                                                    <span class="caption-subject font-dark sbold uppercase">Communication Information step 3</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table id="user" class="table table-bordered table-striped">
                                                            <tbody>
                                                                 <tr>
                                                                    <td style="width:15%"> Mobile number: </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="mobilenumber" data-type="text" data-pk="0" data-url="<?php echo base_url().'Home/updatestuprofile';?>"  data-original-title="Enter mobile number"> <?php echo $phone_number; ?> </a> 
                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>
                                                               <tr>
                                                                    <td style="width:15%"> Email id : </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="email" data-type="text" data-pk="0" data-url="<?php echo base_url().'Home/updatestuprofile';?>"  data-original-title="Enter Email id"> <?php echo $email; ?> </a> 
                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td> Door no. / Building Name : </td>
                                                                     <td style="width:50%">
                                                                        <a href="javascript:;" id="doorno" data-type="text" data-pk="0" data-url="<?php echo base_url().'Home/updatestuprofile';?>"  data-original-title="Enter Door no. / Building Name"> <?php echo $house_address; ?> </a> 
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted"> Select2 (dropdown mode) </span>
                                                                    </td>
                                                                </tr>
                                                                 <tr>
                                                                    <td style="width:15%">Street Name / Area name: </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="streetname" data-type="text" data-pk="0" data-url="<?php echo base_url().'Home/updatestuprofile';?>"  data-original-title="Enter Street Name / Area name"><?php echo $street_name; ?></a> 
                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>
                                                               <tr>
                                                                    <td style="width:15%"> City name / Village name: </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="cityname" data-type="text" data-pk="0" data-url="<?php echo base_url().'Home/updatestuprofile';?>"  data-original-title="Enter City name / Village name:"> <?php echo $area_village; ?></a> 
                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:15%"> District: </td>
                                                                    <td style="width:50%">
                                                                    <?php foreach ($district as $key) {?>
                                                                        
                                                                   
                                                                        <a href="javascript:;" id="district" data-type="select2" data-pk="1" data-url="<?php echo base_url().'Home/updatestuprofile';?>" data-value="<?php echo $key->id; ?>" data-original-title="Enter District"> <?php echo $key->district_name; ?></a>  <?php } ?>
                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:15%"> Pincode: </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="pincode" data-type="text" data-pk="0" data-url="<?php echo base_url().'Home/updatestuprofile';?>"  data-original-title="Enter Pincode:"><?php echo $pin_code; ?> </a> 
                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>
                                                                
                                                            </tbody>
                                                        </table>
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
                    window.location.href = baseurl+'Home/emis_student_profile3/'+studid;  
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
        

        

 $('#mobilenumber').editable({
            type: 'text',
            pk: 1,
            name: 'phone_number',
            title: 'Enter phone number' ,
            success: function(response, newValue) {
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                 if(! /^[0-9]{10}$/.test(value))
                {
                    return 'Enter Valid phone number';
                }
            }

        });
        $('#email').editable({
            type: 'text',
            pk: 1,
            name: 'email',
            title: 'Enter email id',
            success: function(response, newValue) {
            //alert("hello");
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             },

             validate: function(value){
                  if(! /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(value))
                {
                    return 'Enter Valid email id';
                }
            }
        });        
         $('#doorno').editable({
            type: 'text',
            pk: 1,
            name: 'house_address',
            title: 'Enter doorno / building name',
            success: function(response, newValue) {
            //alert("hello");
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             },
              validate: function(value){

                 if( /[^-., /A-Za-z0-9]/.test(value))
                {
                    return 'Enter Valid doorno / building name';
                }
            }
        });        
          $('#streetname').editable({
            type: 'text',
            pk: 1,
            name: 'street_name',
            title: 'Enter street name',
            success: function(response, newValue) {
            //alert("hello");
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             },
              validate: function(value){
                 if( /[^-., /A-Za-z0-9]/.test(value))
                {
                    return 'Enter Valid street name';
                }
            }
        });        
           $('#cityname').editable({
            type: 'text',
            pk: 1,
            name: 'area_village',
            title: 'Enter cityname',
            success: function(response, newValue) {
            //alert("hello");
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             },
             validate: function(value){
                 if( /[^-., /A-Za-z0-9]/.test(value))
                {
                    return 'Enter Valid city name';
                }
            }
        });     

        var districts = [];
        $.each({
        <?php foreach($schooldist as $res){  ?>
        "<?php echo $res->id;  ?>":"<?php echo $res->district_name;  ?>",
       <?php   }  ?>  
        }, function(l, p) {
            districts.push({
                id: l,
                text: p
            });
        });   

         $('#district').editable({
            inputclass: 'form-control input-medium',
            source: districts,
            type: 'select2',
            pk: 1,
            name: 'district_id',
            title: 'Enter School Name in Tamil',
            success: function(response, newValue) {
            //alert("hello");
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             }
        });        
       
             $('#pincode').editable({
            type: 'text',
            pk: 1,
            name: 'pin_code',
            title: 'Enter School Name in Tamil',
            success: function(response, newValue) {
            //alert("hello");
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             },
              validate: function(value){
                if(!  /^(6|5)\d{5}$/.test(value))
                {
                    return 'Invalid pin code';
                }
            }
        });        

            $('#user .editable').editable('toggleDisabled');
            // init editable toggler
            $('#enable').click(function() {
                $('#user .editable').editable('toggleDisabled');
            });


</script>


    </body>

</html>