<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
 
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL STYLES -->
    
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->
    <style type="text/css">
            label.error { float: left; color:#dd4b39;padding-left: 5%; }
             .note{color:#dd4b39; }
         </style>

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            
    <?php  
    $usertype = $this->session->userdata('emis_user_type_id');
    if($usertype == 3) { $username = 'District'; } else if($usertype ==5) { $username = 'State'; }
    ?>
  <?php if($usertype== 3) { $this->load->view('corporation/header.php'); } else if($usertype== 5) { $this->load->view('state/header.php');  } ?>

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
                                        <h1>Teacher Transfer
                                            <!-- <small>Transfer</small> -->
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
                                   <?php /* ?><?php $this->load->view('corporation/emis_district_profile_header.php'); ?> <?php */ ?>
                                        </center>

                                       <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Teacher Transfer</span>
                                                </div>
                                            </div>

                                           <div class="portlet-body">
                                           <div class="row">
                                            <div class="col-md-12">
                                                    <form action="#" method="post" id="tech_trans_frm">
                                            
                                                <div class="col-md-6 thumbnail"><center>
                                                    <div class="form-group panel-heading" style="background-color: #32c5d2;color: #fff;">
                                                    <label class="control-label"><b>Present School</b></label>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        
                                                        <div class="col-md-2">
                                                            <label class="pull-left">District</label>    
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select class="form-control" style="width: 90%;" onchange="getdst(this.value),getdst_anthr(this.value)" name="t_dist" id="t_dist">
                                                                <option value="">Select the District</option>
                                                                <?php if(isset($get_dist_dtls)){  foreach($get_dist_dtls as $dist){?>            
                                                                <option value="<?php echo $dist->district_id; ?>"><?php echo $dist->district_name; ?></option>
                                                                <?php }}?>
                                                            </select>    
                                                        </div>
                                                    </div>
                                                    
                                                    <br><br>
                                                    <div class="form-group" style="margin-top: 1%;">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">Block </label>    
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select class="form-control" style="width: 90%;" id="blockdtl" onchange="get_schl(this.value)" name="t_block">
                                                            <option value="">Block</option>
                                               
                                                        </select>    
                                                        </div>
                                                        
                                                    </div>
                                                    <br><br>
                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">School</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select class="form-control" style="width: 90%;" id="getschl" onchange="get_tech_cat(this.value),get_school_key(this.value)" name="t_school">
                                                                <option value="">School</option>
                                                            </select>    
                                                        </div>
                                                    </div>
                                                    <br><br>



                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">Type of Teacher</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select class="form-control" name ="techtype" style="width: 90%;" id="type_tech" onchange="get_tchr(this.value)">
                                                                        <option value="">Select type of teacher</option>
                                                                        <!-- <option value="1">Head teacher</option>
                                                                        <option value="2">Acting head teacher</option>
                                                                        <option value="3">Teacher</option>
                                                                        <option value="5">Instructor positioned as per RTE</option>
                                                                        <option value="7">Principal</option>
                                                                        <option value="8">Lecturer</option>,get_tchr_type_only(this.value) -->
                                                                     </select>
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">Teacher</label>    
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select class="form-control" style="width: 90%;" id="gettchr" onchange="tech_nme_only(this.value)" name="t_name">
                                                                <option value="">Teacher Name</option>
                                                            </select>    
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div class="form-group">
                                                    <div class="col-md-2">
                                                        <label class="pull-left">Category</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <select class="form-control" style="width: 90%;" name="t_cat" id="t_cat">
                                                            <option value="">Category</option>
                                                            <option value="Administrative Transfer">Administrative Transfer</option>
                                                            <option value="Offline">Offline</option>
                                                            <option value="Serious Illness">Serious Illness</option>
                                                            <option value="Spouse Death">Spouse Death</option>
                                                            <option value="Deputation">Deputation</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                    </div>
                                                    </div>
                                                    <br><br>

                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">Remarks</label>    
                                                        </div>
                                                        <div class="col-md-10">
                                                            <textarea class="form-control" style="width: 90%;" name="t_remark" id="t_remark"></textarea>    
                                                        </div>
                                                        
                                                    </div>
                                                    <br><br>
                                                       <br>
                                                       <br>

                                                    </center>
                                                </div>

                                                  <div class="col-md-6 thumbnail" ><center>
                                                   <div class="form-group panel-heading" style="background-color: #32c5d2;color: #fff;">
                                                    <label class="control-label"><b>New School</b></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <!-- <br> -->
                                                         <div class="col-md-2">
                                                            <label class="pull-left">District </label>    
                                                        </div>
                                                         <?php if($usertype== 3) {  ?>


                                                        <div class="col-md-10">
                                                            <p id="showdist" class="pull-left" style="padding-left: 5%;">
                                                                
                                                            </p>
                                                        </div>

                                                      <?php   } else if($usertype== 5) { ?> 
                                                      <div class="col-md-10">
                                                            <select class="form-control" style="width: 90%;" onchange="getdst2(this.value),getdst_anthr2(this.value)" name="t_dist" id="t_dist">
                                                                <option value="">Select the District</option>
                                                                <?php if(isset($get_dist_dtls)){  foreach($get_dist_dtls as $dist){?>            
                                                                <option value="<?php echo $dist->district_id; ?>"><?php echo $dist->district_name; ?></option>
                                                                <?php }}?>
                                                            </select>    
                                                        </div>


                                                      <?php } ?>

                                                    </div>
                                                    <br><br>
                                                    <div class="form-group" style="margin-top: 1%;">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">Block </label>    
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select class="form-control"  style="width: 90%;" id="subblck" onchange="get_another_block(this.value)" name="blocknxt">
                                                            <option value="">Block</option>
                                                        </select>    
                                                        </div>
                                                        
                                                    </div>
                                                    <br><br>
                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">School</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select class="form-control" style="width: 90%;" id="anothr_blck_dtls" onchange="get_schl_key(this.value)" name="next_school">
                                                                <option value="">School</option>
                                                            </select>    
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">Teacher </label>    
                                                        </div>
                                                        <div class="col-md-10">
                                                            <p id="shownme" class="pull-left" style="padding-left: 5%;"></p>
                                                        </div>
                                                    </div>
                                                    <br><br>

                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">Designation Type </label>    
                                                        </div>
                                                        <div class="col-md-10">
                                                            <!--<p id="design_txt" class="pull-left" style="padding-left: 5%;"></p>-->
															<select class="form-control" style="width: 90%;" name="techtype1" id="techtype1">
                                                                <option value="">Select the Teacher type</option>
                                                                <?php foreach($get_teach_type as $type){?>            
                                                                <option value="<?php echo $type->id; ?>"><?php echo $type->type_teacher; ?></option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    

                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">Transfer Date </label>    
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                        <div class="col-md-4" >
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="trans_date" name="trans_date">
                                                                  <option value="" style="color:#bfbfbf;">தேதி *</option>
                                                            <?php   $tempnumber = '';
                                                                       for($i=1;$i<32;$i++) { 
                                                                        $tempnumber = sprintf("%02s", $i);  ?>   
                                                                       
                                                                          <option value="<?php echo $tempnumber; ?>"><?php echo $tempnumber; ?></option>
                                                                       <?php }  ?>
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_doj_date_alert"></div></font>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="trans_month" name="trans_month">
                                                                <option value="" style="color:#bfbfbf;">மாதம் *</option>
                                                              <option value="01">January</option>
                                                              <option value="02">February</option>
                                                              <option value="03">March</option>
                                                              <option value="04">April</option>
                                                              <option value="05">May</option>
                                                              <option value="06">June</option>
                                                              <option value="07">July</option>
                                                              <option value="08">August</option>
                                                              <option value="09">September</option>
                                                              <option value="10">October</option>
                                                              <option value="11">November</option>
                                                              <option value="12">December</option>
                                                            </select>
                                                           
                                                        </div>
                                                        <div class="col-md-4">
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="trans_year" name="trans_year">
                                                                <option value="" style="color:#bfbfbf;">வருடம் *</option>
                                                              <?php
                                                              $year=date('Y');
                                                              $min=$year-21;
                                                              $max=$year+1;
                                                              for($i=$min;$i<$max;$i++)
                                                              {?>
                                                              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                            <?php } ?>
                                                            </select>
                                                            
                                                        </div>
                                                    </div>

                                                          <!--  <input type="date" class="form-control" name="trans_date" style="width: 90%;"> -->
                                                                        <!-- /input-group -->
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <input type="hidden" id="schl_key" name="school_key">
                                                    <input type="hidden" id="hid_school_key" name="old_key_id">
                                                    <!-- <input type="text" name="newtxt"> -->
                                                    <div class="form-group" style="margin-bottom: 17%;">
                                                        <!-- <button type="submit" class="btn green" id="emis_stu_searchsep_sub">Transfer <i class="fa fa-arrow-circle-right"></i></button>  -->
                                                         <button type="submit" id="emis_staff_transferspl" name="emis_staff_transferspl" class="btn green">Transfer <i class="fa fa-arrow-circle-right"></i></button>
                                                    </div>     
                                                    </center>
                                                   <!--  <p id="schl_key123"></p> -->
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

                  <?php $this->load->view('footer.php'); ?>
        </div>

        <?php $this->load->view('scripts.php'); ?>
       
   <script src="<?php echo base_url().'asset/js/district.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/jquery.validate.min.js';?>"></script>



   <script type="text/javascript">
       function getdst(distid){
             $.post('<?php echo base_url(); ?>corporation/get_dist/'+distid, function(data) {
              if(data!='')
              {
                 $('#blockdtl').html(data);
                 // $('#subblck').html(data);
              }
              else
              {
                 $('#blockdtl').html('');
                 // $('#subblck').html('');
              }
   });   
       }

           function getdst2(distid){
             $.post('<?php echo base_url(); ?>corporation/get_dist/'+distid, function(data) {
              if(data!='')
              {
                 // $('#blockdtl').html(data);
                 $('#subblck').html(data);
              }
              else
              {
                 // $('#blockdtl').html('');
                 $('#subblck').html('');
              }
   });   
       }

       function get_school_key(udise){
        $.post('<?php echo base_url(); ?>corporation/school_key/'+udise, function(data) {
              if(data!='')
              {
                $('#hid_school_key').val(data);
              }
              else
              {
                 $('#hid_school_key').val('');
              }
   });  
       }

       function get_schl(blckid){
        // alert();

            $.post('<?php echo base_url(); ?>corporation/get_schol/'+blckid, function(data) {
              if(data!='')
              {
                // alert(data);
                 $('#getschl').html(data);
               }
              else
              {
                 $('#getschl').html('');
              }
   });
          
       }

       function get_tech_cat(myschl_id){

            // alert(myschl_id);

            $.post('<?php echo base_url(); ?>corporation/tech_cat_only/'+myschl_id, function(data) {
              if(data!='')
              {
                // alert(data);
                 $('#type_tech').html(data);
               }
              else
              {
                 $('#type_tech').html('');
              }
        });

       }

       function get_tchr(schl_id){
            // alert(schl_id);

              
        if(schl_id == "")
        {
            schl_id = 'empty';
        }

            $.post('<?php echo base_url(); ?>corporation/get_tchr/'+schl_id, function(data) {
              if(data!='')
              {
                // alert(data);
                 $('#gettchr').html(data);
               }
              else
              {
                 $('#gettchr').html('');
              }
   });
              
       }

       function getdst_anthr(dist_id){

                $.post('<?php echo base_url(); ?>corporation/get_dist_nme/'+dist_id, function(data) {
              if(data!='')
              {
                 $('#showdist').html(data);
              }
              else
              {
                 $('#showdist').html('');
              }
   });   

       }


       /*function get_tchr_type_only(tech_id){

        tech_id1 = "";
        if(tech_id == "")
        {
            tech_id = 'empty';
        }

        $.post('<?php echo base_url(); ?>corporation/get_desig/'+tech_id, function(data) {
              if(data!='')
              {
                // alert(data);
                 $('#design_txt').html(data);
              }
              else
              {
                 $('#design_txt').html('');
              }
   });       
            

       }*/


       function tech_nme_only(tech_id){

        if(tech_id == "")
        {
            tech_id = 'empty';
        }
        
        $.post('<?php echo base_url(); ?>corporation/get_nme_only/'+tech_id, function(data) {
              if(data!='')
              {
                // alert(data);
                 $('#shownme').html(data);
              }
              else
              {
                 $('#shownme').html('');
              }
        });
       }


       function get_another_block(blck_id){
        $.post('<?php echo base_url(); ?>corporation/get_block_dtls/'+blck_id, function(data) {
              if(data!='')
              {
                // alert(data);
                 $('#anothr_blck_dtls').html(data);
              }
              else
              {
                 $('#anothr_blck_dtls').html('');
              }
        });
       }


       function get_schl_key(schl_id){
        // alert(schl_id);
        $.post('<?php echo base_url(); ?>corporation/get_schl_keyval/'+schl_id, function(data) {
              if(data!='')
              {
                //alert(data);
                 $('#schl_key').val(data);
              }
              else
              {
                 $('#schl_key').val('');
              }
        });
       }


       // function get_udise(get_udise){
       //  alert(get_udise);
       // }

   </script>


   <script type="text/javascript">
       // function call for auto pop subcaste
    
    function  valid(){
        
    // alert(tech_id);

swal({
  title: "Are you sure?",
  text: "You want to transfer this Teacher!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, Transfer!",
  cancelButtonText: "No, cancel!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
    transferteacher();
  } else {
    swal("Cancelled", "Your calcelled transfer", "error");
  }
});

}





function transferteacher(){
 var tech_id = $("#gettchr").val();

  // var studid="";
  var form = $("#tech_trans_frm").serialize()

      $.ajax({
      type: "POST",
      url:baseurl+'corporation/proced',
      data:form,
      success: function(resp){  
         //alert(resp);
            if(resp==true){
              swal({
                title: "Transferred!",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "OK",
                closeOnConfirm: true,
                },
                function(isConfirm) {
                if (isConfirm) {
                  window.location.href = baseurl+'<?php echo $username; ?>'+'/emis_tech_transfer/'; 
                  window.open(baseurl+'corporation/emis_teacher_transfer_form/'+tech_id, '_blank');
                } else {
                  
                }
                });
            } else {
              swal("Cancelled", "You have not privilages to transfer this Teacher! Please Try some one.", "error");
              // alert('You have not privilages to transfer this student! Please Try some one.');
              return false;
            }        
       },
      error: function(e){ 
      alert('Error: ' + e.responseText);
      return false;  

      }
      });
}


        // Enrolment4 Form
$("#tech_trans_frm").validate({

    
                        rules: {
                          t_dist:{
                            required:true,
                            customvalidationselectfield:true,
                          },
                          t_block:{
                            required:true,
                            customvalidationselectfield:true,
                          },
                          t_school:{
                            required:true,
                            customvalidationselectfield:true,
                          },
                          t_name:{
                            required:true,
                            customvalidationselectfield:true,
                          },
                          t_cat:{
                            required:true,
                            customvalidationselectfield:true,
                          },

                          blocknxt:{
                            required:true,
                            customvalidationselectfield:true,
                          },
                          next_school:{
                            required:true,
                            selectvalid:true,
                          },
                          techtype:{
                            required:true,
                            selectvalid:true,
                          },
						  techtype1:{
                            required:true,
                            selectvalid:true,
                          },
                          t_remark:{
                              required:true,
                              teachercode:true,
                              maxlength:140,
                            },
                            trans_date:{
                              required:true,
                            },
                            trans_month:{
                                required:true,
                            },
                            trans_year:{
                                required:true,
                            }                            

                      },
             onfocusout: function(element) {
            this.element(element);
        },
        submitHandler : function(form){ 
            valid();



        }
        // success: function(element) {
        //     valid();
        // },

   });
        
             $.validator.addMethod("customvalidationselectfield",
               function(){
               return $('').val()!="none";
            });

             $.validator.addMethod("selectvalid",
               function(){
               return $('').val()!="none";
            });

            

          $.validator.addMethod("customvalidation",
               function(value,element){
                     return /^[0-9]+$/.test(value);
               },
               "Allowed number value only");


           $.validator.addMethod("teachercode",
               function(value,element){
                     return /^[0-9 a-zA-Z,/]+$/.test(value);
               },
               "Allowed alphanumeric only");





   </script>

    </body>


</html>