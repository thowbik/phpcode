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
                                            <small>Family Information</small>
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
                                                <a href="<?php echo base_url().'Home/emis_student_profile2/'.$studentid;?>"><div class="col-md-3 bg-grey mt-step-col active">
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
                                                if($user_type_id==1 ){  
                                                
                                                $studentid = $this->session->userdata('emis_stud_id'); 
                                                $studentfalg = $this->Homemodel->getstuflag($studentid);
                                                if($studentfalg==0){

                                                 if($school_id==$getschoolid){
                                                $studentid = $this->session->userdata('emis_stud_id'); 
                                                $studentfalg = $this->Homemodel->getstuflag($studentid);
                                                ?> 
                                                <input type="hidden" id="emis_stu_transfer2_id" name="emis_stu_transfer2_id" value="<?php echo $studentid; ?>">

                                                <button id="emis_stu_transfer2" name="emis_stu_transfer2" class="btn green" >Transfer</button>
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
                                                    <span class="caption-subject font-dark sbold uppercase">Family Information step 2</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table id="user" class="table table-bordered table-striped">
                                                            <tbody>
                                                                 <tr>
                                                                    <td style="width:15%"> Mother Name: </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="mothername" data-type="text" data-pk="0" data-url="<?php echo base_url().'Home/updatestuprofile';?>"  data-original-title="Enter mothername"><?php echo $mother_name; ?></a> 
                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>
                                                               <tr>
                                                                    <td style="width:15%"> Father Name : </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="fathername" data-type="text" data-pk="0" data-url="<?php echo base_url().'Home/updatestuprofile';?>"  data-original-title="Enter Father Name"> <?php echo $father_name; ?></a> 
                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td> Gaurdian Name : </td>
                                                                     <td style="width:50%">
                                                                        <a href="javascript:;" id="gaurdianname" data-type="text" data-pk="0" data-url="<?php echo base_url().'Home/updatestuprofile';?>"  data-original-title="Enter Gaurdian Name"> <?php echo $guardian_name; ?></a> 
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted"> Select2 (dropdown mode) </span>
                                                                    </td>
                                                                </tr>
                                                                 <tr>
                                                                    <td style="width:15%"> Father's Occupation: </td>
                                                                     <td style="width:50%">
                                                                        <a href="javascript:;" id="fatheroccupation" data-type="select2" data-pk="1" data-url="<?php echo base_url().'Home/updatestuprofile';?>" data-value="<?php echo $father_occupation1; ?>" data-original-title="Select Father Occupation"> <?php echo $father_occupation; ?></a> 
                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>
                                                               <tr>
                                                                    <td style="width:15%"> Mother's Occupation: </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="motheroccupation" data-type="select2" data-pk="1" data-url="<?php echo base_url().'Home/updatestuprofile';?>" data-value="<?php echo $mother_occupation1; ?>" data-original-title="Enter Mother's Occupation"> <?php echo $mother_occupation; ?></a> 
                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:15%"> Parents Annual income: </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="parentsannualincom" data-type="select2" data-pk="1" data-url="<?php echo base_url().'Home/updatestuprofile';?>" data-value="<?php echo $parent_income1; ?>" data-original-title="Enter Parents Annual income"> <?php echo $parent_income; ?></a> 
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
        function clicktransfer(value){
             var studid="<?php echo $student_id; ?>";
            if(!confirm('Are you sure want to Transfer this Student?')){
            e.preventDefault();
            return false;
            }

            alert(value);

            $.ajax({
            type: "POST",
            url:baseurl+'Home/emis_student_transfer',
            data:"&stud_id="+value,
            success: function(resp){     
                  if(resp==true){
                    window.location.href = baseurl+'Home/emis_student_profile2/'+studid;  
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
        
        var occupations = [];
        $.each({
           <?php foreach($parentoccupation as $res1){  ?>
        "<?php echo $res1->id;  ?>":"<?php echo $res1->occu_name;  ?>",
       <?php   }  ?> 
        }, function(k, v) {
            occupations.push({
                id: k,
                text: v
            });
        });


         var income = [];
        $.each({
        <?php foreach($dateparentincome as $res){  ?>
        "<?php echo $res->id;  ?>":"<?php echo $res->income_value;  ?>",
       <?php   }  ?>   
        }, function(l, p) {
            income.push({
                id: l,
                text: p
            });
        }); 

        

        // $('#fatheroccupation').editable({
        //     inputclass: 'form-control input-medium',
        //     source: countries
        // });

        

          $('#mothername').editable({
            type: 'text',
            pk: 1,
            name: 'mother_name',
            title: 'Enter Mother name' ,
            success: function(response, newValue) {
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(! /^[a-zA-Z ]*$/.test(value))
                {
                    return 'Mother name can contain only alphabets and spaces';
                }
            }

        });
        $('#fathername').editable({
            type: 'text',
            pk: 1,
            name: 'father_name',
            title: 'Enter father name',
            success: function(response, newValue) {
            //alert("hello");
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             },
            validate: function(value){
                if(! /^[a-zA-Z ]*$/.test(value))
                {
                    return 'Father name can contain only alphabets and spaces';
                }
            }
        });        
         $('#gaurdianname').editable({
            type: 'text',
            pk: 1,
            name: 'guardian_name',
            title: 'Enter Guardian Name ',
            success: function(response, newValue) {
            //alert("hello");
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
             validate: function(value){
                if(! /^[a-zA-Z ]*$/.test(value))
                {
                    return 'Guardian name can contain only alphabets and spaces';
                }
            }
        });       
          $('#fatheroccupation').editable({
            inputclass: 'form-control input-medium',
            source: occupations,
            type: 'select2',
            pk: 1,
            name: 'father_occupation',
            title: 'Enter School Name in Tamil',
            success: function(response, newValue) {
            //alert("hello");
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             }
        });        
           $('#motheroccupation').editable({
            inputclass: 'form-control input-medium',
            source: occupations,
            type: 'select2',
            pk: 1,
            name: 'mother_occupation',
            title: 'Enter Mothers Occupation',
            success: function(response, newValue) {
            //alert("hello");
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             }
        });        
            $('#parentsannualincom').editable({
            inputclass: 'form-control input-medium',
            source: income,
            type: 'select2',
            pk: 1,
            name: 'parent_income',
            title: 'Enter Parents income',
            success: function(response, newValue) {
            //alert("hello");
                     if(response == 0) return "Unable to update.Please try later"; 
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


</script>

    </body>

</html>