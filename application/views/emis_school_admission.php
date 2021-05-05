<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>

        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->




        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

   <?php
          $user_type_id=$this->session->userdata('emis_user_type_id');

          if($user_type_id==1){
            $this->load->view('header.php');
          } else if($user_type_id==3){
             $this->load->view('district/header.php');
          } else if($user_type_id==2){
             $this->load->view('block/header.php');
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
        <h1>Profile
            <small>School profile edit and update</small>
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
                                    <?php $dash_url="";
                          $user_type_id=$this->session->userdata('emis_user_type_id'); 
                          if($user_type_id==1){  $this->load->view('emis_school_profile_header1.php'); }
                          if($user_type_id==5){  $this->load->view('state/emis_state_profile_header1.php');  }?>
                                       
                               <?php ?>
                                    </center>
        

           <!-- <div class="m-heading-1 border-green m-bordered">
            <h3>Basic Information</h3>
        </div> -->
        
         


        <div class="portlet light portlet-fit ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-users"></i>
                    <span class="caption-subject font-dark sbold uppercase">Student Admission Form</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-12">
                     <div class="tab-pane" id="tab_2">
                         
                            <div class="portlet light ">
                                
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                  <form class="form-horizontal" action="<?php echo base_url().'Home/Academic_stu_admission_update';?>" method="post" id="emis_stu_reg_form_admiss" name="emis_stu_reg_form_admiss"> 
                                  <!-- <form class="form-horizontal"  method="post" id="emis_stu_reg_form_admiss" name="emis_stu_reg_form_admiss"> -->
                                        <div class="form-body">
                                            <h3 class="form-section">Admission info</h3>

                                             <div class="row">
                                             <div class="form-group">
                                                        <label class="control-label col-md-2 pull-left">Enter Admission date *</label>
                                                        
                                                            <div class="col-md-3">
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_admiss_date" name="emis_admiss_date" >
                                                            <option value="" style="color:#bfbfbf;">Date *</option>
                                                            <?php   $tempnumber = '';
                                                                       for($i=1;$i<32;$i++) { 
                                                                        $tempnumber = sprintf("%02s", $i);  ?>   
                                                                       
                                                                          <option value="<?php echo $tempnumber; ?>"><?php echo $tempnumber; ?></option>
                                                                       <?php }  ?> 
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_admiss_date_alert"></div></font>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_admiss_month" name="emis_admiss_month">
                                                                 <option value="" style="color:#bfbfbf;">Month *</option>
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
                                                        <div class="col-md-3">
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_admiss_year" name="emis_admiss_year">
                                                            <option value="" style="color:#bfbfbf;">Year *</option>
                                                              <?php
                                                              $year=date('Y');
                                                              $min=$year-1;
                                                              $max=$year+1;
                                                              for($i=$min;$i<$max;$i++)
                                                              {?>
                                                              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                       
                                                    </div>

                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label class="control-label col-md-3">Class Studying *</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_class_studying_admiss" name="emis_class_studying_admiss">
                                                            <option value="" >Select Class Studying *</option>
                                                            <?php  
                                                            foreach($classlist as $cl){ ?>
                                                              <option value="<?php echo $cl['id'];  ?>"><?php echo $cl['class_studying'];  ?></option> 
                                                          <?php   }  ?>
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_class_studying_alert_admiss"></div></font>
                                                        </div>
                                                    </div>
                                                </div>

                                                            

                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Section *</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_reg_stu_section_admiss" name="emis_reg_stu_section_admiss">
                                                           <option value="" style="color:#bfbfbf;">Select Section *</option>
                                                         
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_section_alert_admiss"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                                <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label class="control-label col-md-3">Admission Number *</label>
                                                         <div class="col-md-9" >
                                                            <input type="text" class="form-control" id="emis_reg_stu_admission_admiss" name="emis_reg_stu_admission_admiss" placeholder="Admission number *"> </div>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_admission_alert_admiss"></div></font>
                                                    </div>
                                                </div>
                                             
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label class="control-label col-md-3">Medium of instruction *</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_reg_mediofinst_admiss" name="emis_reg_mediofinst_admiss">
                                                                <option value="" >Select Medium of instruction *</option>
                                                                 <?php foreach($mediumofinstruction as $moi){?>
                                                                    <option value="<?php echo $moi['medium_instrut'];?>"><?php echo $moi['MEDINSTR_DESC']; ?></option>

                                                                <?php } ?>
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_mediofinst_alert_admiss"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                               </div>
                                              <div class="row">
                                                <!--/span-->
                                                <?php if($groupcateid!=""){ if($groupcateid!="29"){ ?>
                                                <div class="col-md-6  groupcode11" style="display: none;">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Group code - for 11 and 12 </label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_reg_grup_code_admiss" name="emis_reg_grup_code_admiss">
                                                                <option value="" >Select Group code</option>
                                                         <?php foreach($groupcate as $gro) {   ?>
                                                          <option value="<?php echo $gro->id;  ?>"><?php echo 
                                                          $gro->group_code.' - '.$gro->group_name  ?></option>
                                                          <?php   }  ?>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_grup_code_alert_admiss"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <?php }} ?>
                                                <!--/span-->
                                           
                                             <input type="hidden" name="groupcateid_admiss" id="groupcateid_admiss" 
                                             value="<?php echo $groupcateid; ?>">
                                             <?php if($groupcateid!=""){ if($groupcateid=="29"){ ?>
                                            
                                            <div class="col-md-6 groupcode11">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">CBSC Subject 1</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_reg_cbsc_sub1_admiss" name="emis_reg_cbsc_sub1_admiss">
                                                                <option value="" >Select CBSC Subject 1</option>
                                                         <?php foreach($groupcate as $gro) {   ?>
                                                          <option value="<?php echo $gro->group_code;  ?>"><?php echo $gro->group_name  ?></option>
                                                          <?php   }  ?>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_cbsc_sub1_alert_admiss"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                              <div class="col-md-6 groupcode11">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">CBSC Subject 2</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_reg_cbsc_sub2_admiss" name="emis_reg_cbsc_sub2_admiss">
                                                                <option value="" >Select CBSC Subject 2</option>
                                                         <?php foreach($groupcate as $gro) {   ?>
                                                          <option value="<?php echo $gro->group_code;  ?>"><?php echo $gro->group_name  ?></option>
                                                          <?php   }  ?>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_cbsc_sub2_alert_admiss"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="row">
                                                <div class="col-md-6 groupcode11">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">CBSC Subject 3</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_reg_cbsc_sub3_admiss" name="emis_reg_cbsc_sub3_admiss">
                                                                <option value="" >Select CBSC Subject 3</option>
                                                         <?php foreach($groupcate as $gro) {   ?>
                                                          <option value="<?php echo $gro->group_code;  ?>"><?php echo $gro->group_name  ?></option>
                                                          <?php   }  ?>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_cbsc_sub3_alert_admiss"></div></font>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 groupcode11">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">CBSC Subject 4</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_reg_cbsc_sub4_admiss" name="emis_reg_cbsc_sub4_admiss">
                                                                <option value="" >Select CBSC Subject 4</option>
                                                         <?php foreach($groupcate as $gro) {   ?>
                                                          <option value="<?php echo $gro->group_code;  ?>"><?php echo $gro->group_name  ?></option>
                                                          <?php   }  ?>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_cbsc_sub4_alert_admiss"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="row">
                                                <div class="col-md-6 groupcode11">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">CBSC Optionl Subject</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_reg_cbsc_sub5_admiss" name="emis_reg_cbsc_sub5_admiss">
                                                                <option value="" >Select CBSC Optional Subject</option>
                                                         <?php foreach($groupcate as $gro) {   ?>
                                                          <option value="<?php echo $gro->group_code;  ?>"><?php echo $gro->group_name  ?></option>
                                                          <?php   }  ?>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_cbsc_sub5_alert_admiss"></div></font>
                                                        </div>
                                                    </div>
                                                </div>

                                            
                                             <?php }} ?>

                                             <?php $cateid=""; foreach($managecateid as $mid){ 
                                              $cateid= $mid->manage_name;  } ?>
                                             <input type="hidden"  name="emis_reg_stu_rte_hidden_admiss"
                                              id="emis_reg_stu_rte_hidden_admiss" value="<?php echo $cateid;  ?>">
                                             
                                             <?php if($cateid=="Un-aided"){?>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label class="control-label col-md-3">Came through RTE 25%</label>
                                                       <div class="col-md-9">
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_reg_stu_rte_admiss" name="emis_reg_stu_rte_admiss">
                                                               <option value="" >Select Came through RTE 25%</option>
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_rte_alert_admiss"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } else if($cateid=="Aided"){ ?> 
                                                <!--/span-->
                                                <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Aided or Un-Aided Section</label>
                                                        <div class="col-md-9">
                                                             <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_reg_stu_aidunaid_admiss" name="emis_reg_stu_aidunaid_admiss">
                                                               <option value="" >Select Aided or Un-Aided Section</option>
                                                                <option value="Aided">Aided</option>
                                                                <option value="Unaided">Unaided</option>
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_aidunaid_alert_admiss"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <!--/span--></div>
                                            </div>
                                            <!--/row-->
                                       
                                        <div class="form-actions">
                                           
                                                <div class="col-md-12" >
                                                     <button type="submit" class="btn green" id="emis_reg_stu_sub_admiss">Submit</button>
                                                           
                                                       </div>
                                                
                                           
                                        </div>
                                         </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
                            </div>
                        </div> 

                    </div>
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





        <!-- BEGIN PAGE LEVEL SCRIPTS -->

        <!-- END PAGE LEVEL SCRIPTS -->


    </body>

</html>