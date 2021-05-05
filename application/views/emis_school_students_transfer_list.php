<?php 

    $this->load->library('session'); 
    $this->load->database(); 
    $this->load->model('Homemodel');
    $school_id=$this->session->userdata('emis_school_id');
    $schoolprofile = $this->Homemodel->getschoolprofiledetails($school_id);
    $schoolname  = $schoolprofile[0]->school_name;
    $udise_code  = $schoolprofile[0]->udise_code;
    $blockname  = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
    $schoolcate  = $this->Homemodel->getcatename($schoolprofile[0]->sch_cate_id);
    $schmanage  = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
    $schdirector  = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);
     $section_details = [];
     array_push($section_details,array('sections'=>1,'section_ids'=>'A'),array('sections'=>2,'section_ids'=>'B'),array('sections'=>3,'section_ids'=>'C'),array('sections'=>4,'section_ids'=>'D'),array('sections'=>'5','section_ids'=>'E'),array('sections'=>6,'section_ids'=>'F'),array('sections'=>7,'section_ids'=>'G'));
      

    //   print_r($this->session->userdata());
     // print_r($section_details);die;
     ?>     
<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
      <style type="text/css">
      .clickable{
    cursor: pointer;   
}
  .panel-heading span {
    margin-top: -20px;
    font-size: 15px;
}
.center
{
    text-align: center;
}
.tablecolor
{
    background-color: #32c5d2; 
}
body.modal-open {
    overflow-y: hidden !important;
    position: fixed;
}
.dt-button-collection a.buttons-columnVisibility:before,
.dt-button-collection a.buttons-columnVisibility.active span:before {
    display:block;
    position:absolute;
    top:1.2em;
    left:0;
    width:12px;
    height:12px;
    box-sizing:border-box;
}


.dt-button-collection a.buttons-columnVisibility:before {
    content:' ';
    margin-top:-6px;
    margin-left:10px;
    border:1px solid black;
    border-radius:3px;
}

.dt-button-collection a.buttons-columnVisibility.active span:before {
    content:'\2714';
    margin-top:-11px;
    margin-left:12px;
    text-align:center;
    text-shadow:1px 1px #DDD, -1px -1px #DDD, 1px -1px #DDD, -1px 1px #DDD;
}

.dt-button-collection a.buttons-columnVisibility span {
    margin-left:20px;    
}

.sweet-alert,.showSweetAlert visible
{
    display: block;
    margin-top: -155px;
    z-index: 2147483647!important;
}
</style>
</style>
    <style type="text/css" media="print">
  @page { size: landscape; }
</style>
 <style type="text/css" media="file">
  @page { size: landscape; }
</style>
    
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
                        <link href="<?php echo base_url().'asset/js/croppie-VIT/croppie.css'?>" rel="stylesheet" type="text/css"/>

        <!-- BEGIN PAGE LEVEL STYLES -->
    
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

<?php  $this->load->view('header.php'); ?>


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
                                        <h1>All Student Transfer list
                                            
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
                                     <div class="row margin-bottom-20">
                                    <div class="">
<!-- <div class="col-lg-12">
        
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-university"></i> <?php if($schoolname!=""){ echo $schoolname; } ?> ( <?php if($udise_code!=""){ echo $udise_code; } ?> )</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                <div class="panel-body">
                    <div class="col-lg-12 col-md-9 ">
                                                
                                                   
                                                <div class="col-lg-12 col-md-6 ">
                                                     <h3>Block : <?php if($blockname!=""){ echo $blockname; } ?> <br/></h3>
                                                    <font style="color:#9b9b9b;"><i class="fa fa-calendar"></i> Management :</font>  <?php if($schmanage!=""){ echo $schmanage; } ?> 
                                                    
                                                    <font style="color:#9b9b9b;"><i class="fa fa-map-marker"></i> Category :</font> 
                                                 <?php if($schoolcate!=""){ echo $schoolcate; } ?>
                                                    <br/>
                                                  <font style="color:#9b9b9b;"><i class="fa fa-briefcase"></i> Directorate :</font>  <?php if($schdirector!=""){ echo $schdirector; } ?> 
                                                
                                                   
                                                </div>
                                            </div>

                                                
                </div>
        </div>
    
    </div> -->
                                       
                                           

                                        </div>
                                       

                                </div>

                                    <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Student Data - Class 
                
                                                        <?php
                                                      // echo $class_id;
                                                      $class_roma = array
                                                            ('I'=>1,'II'=>'2','III'=>'3','IV'=>'4','V'=>'5','VI'=>'6','VII'=>'7','VIII'=>'8','IX'=>'9','X'=>'10','XI'=>'11','XII'=>'12','LKG'=>'13','UKG'=>'14','PreKG'=>'15');
                                                            $class_roman_name = array_search($class_id,$class_roma);
                                                            echo $class_roman_name;
                                                    ?></span>
                                                </div>
                                                <div class="col-md-offset-5 col-md-4"><?php if(isset($success)){?>
                            <div class="alert alert-success"><button class="close" data-close="alert"></button>
                                <?=$success;?></div>
                            <?php } ?></div>  
                            <div class="col-md-offset-5 col-md-4"><?php if(isset($error)){ ?>
                            <div class="alert alert-danger"><button class="close" data-close="alert"></button>
                            <?php  echo $error; ?> </div><?php } ?></div> 
                            <div class="col-md-offset-5 col-md-4"><?php if(!empty(validation_errors())){?>
                            <div class="alert alert-danger"><button class="close" data-close="alert"></button>
                            <?php echo validation_errors(); ?> </div> <?php } ?></div>   
                                                                           
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row">
                                                  <form action="<?=base_url().'Home/get_students_transfer_list' ?>" method="post">
                                                    <div class="col-md-4">
                                                     
                                                        <!-- <?php print_r($class_roma);?> -->
                                                      <select name="class_id" id="class_id" class="form-control">
                                                          
                                                        <option value="0">--select--</option>
                                                        <?php if(!empty($school_classwise)){
                                                            // print_r($school_classwise);
                                                            foreach($school_classwise as $class_wise)
                                                            {

                                                              $class_roman_names = array_search($class_wise->class_id,$class_roma);
                                                              // echo $class_wise->class_id; 
                                                          ?>
                                                           <option value="<?=$class_wise->class_id?>" <?php echo ($class_wise->class_id == $class_id) ? 'selected' : ''; ?>><?=$class_roman_names.'-'.$class_wise->class_id;?></option>
                                                         <?php } }?>
                                                      </select>
                                                     
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div id="section">
                                                            <select class="form-control" id="section_id">
                                                                <option value="<?=$section_id?>"><?=(!empty($section_id))?$section_id:'All'?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary" onclick="return class_validation();">Search</button>
                                                    <div id="msg"></div>
                                                  </form>
                                                </div>

                                            </div>
                                        </div>
           
                                        <!-- BEGIN CARDS -->
                                        
                                       
                                              
                                                  <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Student Data - Class <?=$class_roman_name?></span>
                                                </div>

                                            </div>

                                                
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> Student Data List </div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                    <?php if(!empty($allstuds)){  
                                                       // echo"<pre>";print_r($allstuds);echo"</pre>";?>
                                                        <table class="table table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th> sno </th>                        
                                                                    <th class=""> Unique id</th>
                                                                    <th> Students Name Tamil </th>
                                                                    <th>Students Name English</th>           
                                                                                                                       
                                                                    <th class=""> DOB </th>
                                                                    
                                                                    <th>Gender</th>
                                                                    <th class="detail"> Section </th>
                                                                    <!-- <th class="detail">Pass/Fail</th> -->
																	 <?php 
                                                    if($class_id == 11 || $class_id == 12){ ?>
                                  <th> Group Name </th><?php }?>
                                                                    
                                                                    <th class="detail">Photo</th>
                                                                    <th>Generate</th>

                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php $i=1; foreach($allstuds as $all){ ?>
                                                                <tr> 
                                                                    <td><?=$i?></td>
                                                                    <td><?php echo $all->unique_id_no; ?></td> 
                                                                    
                                                                     <td><?php echo $all->name_tamil; ?></td>
                                                                    <td><?php echo $all->name; ?></td>
                                                                    
                                                                    <td><?php echo date('d-m-Y',strtotime($all->dob)); ?></td>

                                                                    
                                                                
                                                                    <td><?=($all->gender ==1?'Male':'Female');?></td>

                                                                    <td><?php echo $all->class_section; ?></td>
																	
																	<?php if($class_id == 11 || $class_id ==12){?>
																	<td><?php $this->db->select('*'); 
                                                                   $this->db->from('baseapp_group_code');
                                                                   $this->db->where('id', $all->group_code_id);
                                                                   $query =  $this->db->get();
                                                                   $group=$query->row('group_name');
                                                                   echo $group; }?></td>
																    
                                                                 <td><?=($all->photo !=null?'Yes':'No')?></td>
                                                                 <?php if($all->student_id ==null){?>                                                                 <td style="font-size:20px;"><a href="javascript:void(0)" onclick="transfertab(<?=$all->id;?>)"><i class="fa fa-file-pdf-o"></i></a>
                                                                 </td> 
                                                             <?php }else{?>
                                                                <td style="font-size:20px;"><a href="<?=base_url().'Home/save_transfer_certificate_details?stu_id='.$all->student_id.'&class_id='.$class_id;?>"><i class="fa fa-file-pdf-o"></i></a>
                                                                 </td> 
                                                             <?php } ?>
                                                                </tr>
                                                                <?php $i++; } ?>
                                                            
                                                      
                                                            </tbody>
                                                        </table>
                                                         <?php } else { ?><center>No Data Available!</center><?php } ?>
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                        


                                               <br>





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

        <div class="container">
  

  <!-- Modal -->
  
<div class="modal fade" id="transferModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span id="stu_trans_id"></span></h4>
          <font style="color:red"><span>1.Verify All Details in Student Profile before Generating TC</span><br/><span>2.Scan QR Code And Verify All Details Before Printing TC</font>
        </div>
        <div class="modal-body">
            <form method="post" action="<?=base_url().'Home/save_transfer_certificate_details'?>">
                
                <input type="hidden" name="student_id" id="student_id">
            <div class="row">
                <div class="col-md-6">
                                                  <label class="control-label">Personal Mark of identification 1 *</label>
                                                    <div class="form-group">
                                                    
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_stu_identi1" name="emis_stu_identi1"  placeholder="" required>
                                                            <!--<p>Name followed by Initial Eg. Ganesh R</p>-->
                                                             
                                                             
                                                             <!--மாணவர் பெயர் தமிழ்-->
                                                        </div>
                                                    </div>                                                  
                                                </div>
                                                <div class="col-md-6">
                                                  <label class="control-label">Personal Mark of identification 2 *</label>
                                                    <div class="form-group">
                                                    
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_stu_identi2" name="emis_stu_identi2"  placeholder="" required>

                                                        </div>
                                                    </div>                                                  
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                  <label class="control-label">Details of Scholarship or Educational Concession Received  *</label>
                                                    <div class="form-group">
                                                    
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_stu_scholarship" name="emis_stu_scholarship"  placeholder="" required>

                                                        </div>
                                                    </div>                                                  
                                                </div>
                                                 <div class="col-md-6">
                                                  <label class="control-label">Date of Medical inspection during the last academic year *</label>
                                                    <div class="form-group">
                                                    
                                                        <div class="">
                                                            <input type="text" name="emis_stu_medical_checkup"  class="form-control date1" id="emis_stu_medical_checkup" value="" autocomplete="off" placeholder="DD-MM-YYYY" onkeypress="return event.charCode >= 48"/>

                                                        </div>
                                                    </div>                                                  
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                  <label class="control-label">Student's conduct and character *</label>
                                                    <div class="form-group">
                                                    
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_stu_char" name="emis_stu_char"  placeholder="" required>

                                                        </div>
                                                    </div>                                                  
                                                </div>
                                                <div class="col-md-6">
                                                   <label class="control-label">student is promoted to the next class *</label>
                                                    <div class="form-group">
                                                   
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_stu_promote" name="emis_reg_stu_promote" required>
                                                          <option value="" style="color:#bfbfbf;">Select *</option>
                                                          <option value="1">Yes</option>
                                                          <option value="2">No</option>
                                                          <option value="3">No-Discontinued</option>
                                                          
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_stu_gender_alert"></div></font>
                                                        </div>
                                                      
                                                    </div>
                                                  </div>
                                                </div>
                                            <div class="row">
                <div class="col-md-6">
            <label class="control-label">Student studying in the school from*</label>
            <select name="emis_stu_from_class" id="from_class_id" class="form-control">
                                                          
                                                        <option value="0">--select--</option>
                                                        <?php if(!empty($school_classwise)){
                                                            // print_r($school_classwise);
                                                            foreach($school_classwise as $class_wise)
                                                            {

                                                              $class_roman_names = array_search($class_wise->class_id,$class_roma);
                                                              // echo $class_wise->class_id; 
                                                          ?>
                                                           <option value="<?=$class_wise->class_id?>"><?=$class_roman_names.'-'.$class_wise->class_id;?></option>
                                                         <?php } }?>
                                                      </select>
                                                      <input type="hidden" id="emis_class_study_to" name="emis_class_study_to">
        </div>
        <div class="col-md-6">
                                                    <label class="control-label">Date of Joining</label>
                                                    <div class="form-group">
                                                        <input type="text" name="emis_stu_doj"  class="form-control date" id="emis_stu_doj" value="" autocomplete="off" placeholder="DD-MM-YYYY" onkeypress="return event.charCode >= 48"required />
    
                                                    
                                                     <font style="color:#dd4b39;"><div id="emis_reg_stu_dob_alert"></div></font>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="control-label">Last date on which Student attended school</label>
                                                    <div class="form-group">
                                                        <input type="text" name="emis_stu_study_to"  class="form-control date" id="emis_stu_study_to" value="" autocomplete="off" placeholder="DD-MM-YYYY"  onkeypress="return event.charCode >= 48"required />
    
                                                    
                                                     <font style="color:#dd4b39;"><div id="emis_reg_stu_dob_alert"></div></font>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <label class="control-label">First Language *</label>
                                                    <div class="form-group">
                                                   
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category" id="emis_reg_stu_lang" name="emis_reg_stu_lang" required>
                                                               <option value="" style="color:#bfbfbf;">Select Language *</option>
                                                         <?php 
                                                         if(!empty($mother_tang)){
                                                         foreach($mother_tang as $lng) {   ?>
                                                          <option value="<?php echo $lng->MEDINSTR_ID;  ?>"><?php echo $lng->MEDINSTR_DESC;  ?></option>
                                                          <?php   }  }?>
                                                        </select>
                                                           <font style="color:#dd4b39;"><div id="emis_reg_stu_lang_alert"></div></font>
                                                        </div>
                                                         
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="control-label">Medium of instruction *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_mediofinst" name="emis_reg_mediofinst" required>
                                                                <option value="" >பயிற்று மொழி *</option>
                                                        
                                                         <?php foreach($medium_sec as $moi){?>
                                                            <option value="<?=$moi->MEDINSTR_ID;?>"><?=$moi->MEDINSTR_DESC; ?></option>

                                                         <?php } ?>
                                                          
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_mediofinst_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="col-md-6">
                                                  <label class="control-label">DOB In Words</label><span id="dob_label"></span>
                                                    <div class="form-group">
                                                    
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_stu_dob_words" name="emis_stu_dob_words"  placeholder="" required>

                                                        </div>
                                                    </div>                                                  
                                                </div>
                                                <div class="col-md-6">
                                                  <label class="control-label">Student's Nationality*</label>
                                                    <div class="form-group">
                                                    
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_stu_nationality" name="emis_stu_nationality"  placeholder="" required>

                                                        </div>
                                                    </div>
                                                </div>
                                                    <?php if($this->session->userdata('school_manage')!=1 || $this->session->userdata('school_manage')!=5){ ?>                                           
                                                    <div class="col-md-6">
                                                  <label class="control-label">School Recognition Number(For Private Schools)</label>
                                                    <div class="form-group">
                                                    
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_sch_rec_no" name="emis_sch_rec_no"  placeholder="" required>

                                                        </div>
                                                    </div>          
                                                
                                                </div>
                                            <?php } ?>
    </div>  
                            <div class="row">
                                                <div class="col-md-6">
                                                  <label class="control-label">Caste / Community /Religion*</label>
                                                    <div class="form-group">
                                                    
                                                        <div class="">
                                                            <select name="emis_stu_community_tc" id="emis_stu_community_tc" required class="form-control">
                                                                <option value="">Select</option>
                                                                <option value="1">Leave Blank</option>
                                                                <option value="2">Refer Community Certificate</option>
                                                                <option value="3">No Caste / Community</option>

                                                            </select>

                                                        </div>
                                                    </div>                                                  
                                                </div>  
                                                </div>             
                                            
                                    
<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" id="save_transfer" class="btn btn-primary">Save</button>
          <div id="err_msg"></div>
        </div>
    </form>
</div>

    </div>
</div>
</div>


        <?php $this->load->view('scripts.php'); ?>


        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
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
        $(document).ready(function(){
    // $('.display').dataTable();
    
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
           
 var curr = new Date();

// console.log(curr.getFullYear()-19); 
var first = new Date(curr.getFullYear() -19,'01','01');
var end = new Date(curr.getFullYear(),curr.getMonth(), curr.getDate()+1);

$('.date').datepicker({
    // daysOfWeekDisabled: [0,6]
        
    

});
$(".date1").datepicker({
   
});
// console.log(first,end);
 $('.date').datepicker("setStartDate",first);

$('.date').datepicker("setEndDate",end);
 // $(".datepicker").val(new Date());

      });
        function textvalidate(id,alertid){
                
            var text = document.getElementById(id);
            var alt = document.getElementById(alertid);
            if(text.value==''){
                alt.innerHTML="Required Field";
            }else {
                alt.innerHTML="";
            }
        }
    </script>
    <script type="text/javascript">
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";

       
 var curr = new Date();

var end = new Date(curr.getFullYear(),curr.getMonth(), curr.getDate()+1);


$('.date1').datepicker("setEndDate",end);


    </script>
<script type="text/javascript">
  var class_id = 0;
    $(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
    if(!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
    }
})

$(document).ready(function(){
  class_id = $('#class_id').val();
  var section_id  =0;
 section_id = <?php echo json_encode($section_id,JSON_PRETTY_PRINT);?>;
  get_section(class_id,section_id);

})
    $(document).on('change','#class_id',function()
{
    class_id = $(this).val();
    section_id = null;


    get_section(class_id,section_id);



    // var school_id = $("#school_code").val();
    

})
    function get_section(class_id,section_id)
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
            $("#section").empty('');            

        var section_drop = '<select name="section_id" class="form-control" id="section_id">';

        section_drop += '<option value=0>All</option>';
        $.each(section,function(id,val)
        {
            section_drop +='<option value='+ val.section +'>'+val.section+'</option>';
        })
            section_drop +='</select>';
            
            $("#section").append(section_drop); 
            // alert(section_id);
            if(section_id !=0 && section_id !=null){
            $("#section_id").val(section_id).attr('selected','selected');   
            }else
            {
                console.log('else');
                $("#section_id").val(0).attr('selected','selected');
            }      
         },
          
    })
    }
    }

    
    function class_validation()
{
    // alert();
    var class_id = $("#class_id").val();
    // console.log(class_id);
    // var section = $("#section_id").val();
    // console.log(section);
    if(class_id =='0')
    {
        var msg = '<span style="color:red;">You must select your Class!</span><br /><br />';
                    document.getElementById('msg').innerHTML = msg;
                    return false;
    }else
    {
        return true;
    }
}

</script>

<!-- <script type="text/javascript">
    $(document).ready(function() {
    var t = $('#sample_3').DataTable( {
        dom: 'B',
        "buttons": [
           {
              extend: 'colvis',
              columns: ':gt(4)',
              postfixButtons: ['colvisRestore'],
           }
        ],

    } );
   
} );
</script>
 -->
<script type="text/javascript">
    var table = '';
    $(document).ready(function()
{
   var table =  sum_dataTable('#sample_3',7);

   function sum_dataTable(dataId,col){
    // alert();
    table = $(dataId).DataTable({
      dom: 'Blfrtip',
      "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

      order: [[0, "asc"]],
            lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            pageLength: 10,
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
        
        buttons: [
                { extend: 'print', className: 'btn default' },
                { extend: 'pdf', className: 'btn default' },
                { extend: 'csv', className: 'btn default' },
                {
              extend: 'colvis',
              columns: ':gt('+col+')',
              className: 'btn default',
              text:'Select Columns',
             
           }
    //             {
    //     extend: 'colvis',
       
    //     className: 'btn default',
    //     columnText: function ( dt, idx, title ) {

    //         return (idx+1)+': '+title;
    //     }
    // }
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


      
        // console.log(table);
      table.columns( '.detail' ).visible( false );
      // $("#sample_3").css('display','table');
      $($.fn.dataTable.tables( true ) ).DataTable().columns.adjust().draw();
    table.responsive.recalc();
  
  //       console.log('i');
  //     table.on( 'order.dt search.dt', function () {
  //       table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
  //           cell.innerHTML = i+1;
  //       } );
  //   } ).draw();
  // },1000);
    // table.column(0).visible(false);
    

});
    
</script>



<script type="text/javascript">
    var students_details = <?php echo json_encode($allstuds);?>;
    var students_detail = ''
            function transfertab(id)
            {
                    students_detail = students_details.filter(stu=>stu.id ==id)[0];


                    console.log(students_detail);

                $("#stu_trans_id").text(students_detail.name +' - '+students_detail.unique_id_no);
                
                $("#emis_reg_mediofinst").val(students_detail.education_medium_id).attr('selected','selected');
                $("#student_id").val(students_detail.id);
                var date_join = new Date(students_detail.doj);
        console.log(date_join);
        var doj_month = date_join.getMonth()+1;
        var doj = (date_join.getDate() < 10 ? '0'+date_join.getDate():date_join.getDate())+'-'+(doj_month < 10 ? '0'+doj_month:doj_month)+'-'+date_join.getFullYear();

        $("#emis_stu_doj").datepicker("update",doj);
var end = new Date(date_join.getFullYear(),date_join.getMonth(), date_join.getDate());
    
        $(".date1").datepicker("setStartDate",end);
         var date_join = new Date(students_detail.dob);
        console.log(date_join);
        var doj_month = date_join.getMonth()+1;
        var dob = (date_join.getDate() < 10 ? '0'+date_join.getDate():date_join.getDate())+'-'+(doj_month < 10 ? '0'+doj_month:doj_month)+'-'+date_join.getFullYear();
// console.log(doj);
        $("#dob_label").text(' - '+dob);
        $("#emis_class_study_to").val($("#class_id").val());
                // $("#students_data").val(JSON.stringify(students_detail));
                    $("#transferModal").modal('show');
            }

            /*function save_transfer()
            {
                    // console.log(students_detail);
                    $("#err_msg").html('');
                var trans_stu = $("#emis_trans_stu").val();
          var label = $("#emis_trans_stu").find('option:selected').text();
                
                if(trans_stu==0)
                {
                    $("#err_msg").html('<p style="color:red">Please Select The Transfer Reason');

                }else
                {
                    $("#save_trans").hide();    
                    var data = {'records':{'unique_id_no':students_detail.unique_id_no,'school_id_transfer':students_detail.school_id,'school_id_transfer':students_detail.school_id,'class_studying_id':students_detail.class_studying_id,'process_type':1,'admission_no':students_detail.school_admission_no,'medium_of_ins':students_detail.education_medium_id,'transfer_reason':trans_stu,'label':label}};
                    // data = {'records':data};
                    $.ajax(
                    {
                        method:"POST",
                        dataType:"JSON",
                        url:'<?=base_url()."Registration/update_students_transfer"?>',
                        data:data,
                        success:function(res)
                        {
                            if(res)
                            {
                                $("#transferModal").modal('hide');
                                swal({
                                    title: "Success",
                                    text: students_detail.name+"-"+students_detail.unique_id_no+' Students Transfered To Common Pole',
                                    type: "success",
                                    
                                    confirmButtonText: "ok",
                                    
                                    // showLoaderOnConfirm: true
                                }, function(isConfirm){
                                    location.reload();
                                             });

                            }
                        }
                    })
                }
            }*/
</script>

<script type="text/javascript">
    $("#save_transfer").on('click',function(e)
    {
        var form = $(this).parents('form');

    swal({
                title: "Are you sure?",
                text: "Do you want to Final Submit? Entries Can't Be Changed !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#ff0000",
                confirmButtonText: "Yes, Final Submit!",
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function(isConfirm){
                if (isConfirm)
                {
                    form.submit();
                }else
                {
                    return false;
                }
        });
    })
</script>
</html>