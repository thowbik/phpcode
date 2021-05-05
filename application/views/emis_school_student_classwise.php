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
            

<?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
<?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
<?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 5){ ?>
<?php $this->load->view('state/header.php'); }else{ $this->load->view('header.php'); } ?>


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
                                     <div class="row margin-bottom-20">
                                    <div class="">
<div class="col-lg-12">
        
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
    
    </div>
                                       
                                           

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
                                                  <form action="<?=base_url().'Home/emis_school_student_classwise' ?>" method="post">
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
                                                        <table class="table table-bordered table-hover" id="sample_3">
                                                            <thead>
                                                                <tr>
                                                                    <th> sno </th>                        
                                                                    <th class=""> Unique id</th>
                                                                    <th> Students Name Tamil </th>
                                                                    <th>Students Name English</th>           
                                                                    <th> Father Name </th>                                                     
                                                                    <th> Mother Name </th>                                                     
                                                                    <th class=""> DOB </th>
                                                                    <th >Blood Group </th>
                                                                    <th class="">Parent Mobile No</th>
                                                                    <th class="">Street Name</th>
                                                                    <th class="">Area Village</th>
                                                                    <th class="">Pin code</th>
                                                                    <th>Gender</th>
                                                                    <th class="detail"> Section </th>
                                                                    <!-- <th class="detail">Pass/Fail</th> -->
																	 <?php 
                                                    if($class_id == 11 || $class_id == 12){ ?>
                                  <th> Group Name </th><?php }?>
                                                                    <th class="detail">House Address</th>
                                                                    <th class="detail">Date of Join</th>
                                                                    <th class="detail"> Community Name </th>
                                                                    <th class="detail"> Religion Name </th>
                                                                    <th class="detail"> Sub Caste Name </th>

                                                                    <th class="detail">Aadhar Card</th>
                                                                    
                                                                    <th class="detail"> Admision number</th>
                                                                    <th class="detail">Father Occupation</th>
                                                                    <th class="detail">Mother Occupation</th>
                                                                    <th class="detail">Father Income</th>
                                                                    
                                                                    <th class="detail">Medium</th>
                                                                    
                                                                    <th class="detail">District Name</th>
                                                                    
                                                                    <!-- <th>Transfer</th> -->
                                                                    <th class="detail">Photo</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php $i=1; foreach($allstuds as $all){ ?>
                                                                <tr> 
                                                                    <td><?=$i?></td>
                                                                   <!--  <td><a onclick="savestudentid1('<?php echo $all->unique_id_no; ?>')"><?php echo $all->unique_id_no; ?></a></td> -->
                                                                    <td><a href="javascript:void(0);" 
                                                                        onclick="opentab(<?=$all->id;?>)"><?php echo $all->unique_id_no; ?></a></td>
                                                                     <td><?php echo $all->name_tamil; ?></td>
                                                                    <td><?php echo $all->name; ?></td>
                                                                    <td><?=$all->father_name; ?></td>
                                                                    <td><?=$all->mother_name; ?></td>
                                                                    <td><?php echo date('d-m-Y',strtotime($all->dob)); ?></td>

                                                                    <td><?=$all->group;?></td>
                                                                <td><?=$all->phone_number;?></td>
                                                                <td><?=$all->street_name;?></td>
                                                                <td><?=$all->area_village;?></td>

                                                                    <td><?=$all->pin_code;?></td>
                                                                    <td><?=($all->gender ==1?'Male':'Female');?></td>

                                                                    <td><?php echo $all->class_section; ?></td>
																	<!-- <td style='color:<?=($all->pass_fail=="PASS"?"green":"red");?>'><?=$all->pass_fail;?></td> -->
																	<?php if($class_id == 11 || $class_id ==12){?>
																	<td><?php $this->db->select('*'); 
                                                                   $this->db->from('baseapp_group_code');
                                                                   $this->db->where('id', $all->group_code_id);
                                                                   $query =  $this->db->get();
                                                                   $group=$query->row('group_name');
                                                                   echo $group; }?></td>
																    <td><?=$all->house_address;?></td>
                                                                    <td><?=($all->doj!=''?date('d-m-Y',strtotime($all->doj)):'XX-XX-XXXX');?></td>
																	  <!--<td><?php echo $all->group_code_id; ?></td>-->
																	
                                                                     <td><?php $this->db->select('*'); 
                                                                   $this->db->from('baseapp_community');
                                                                   $this->db->where('id', $all->community_id);
                                                                   $query =  $this->db->get();
                                                                   $commm=$query->row('community_name');
                                                                   echo $commm; ?></td>
                                                                   <td><?=$all->religion_name?></td>
                                                                   <td><?=$all->caste_name;?></td>

                                                                    <td><?=implode("-",str_split($all->aadhaar_uid_number,4));?></td> 
                                                                    <!-- <td>Aadhar Card</td> -->
                                                                    <td><?=$all->school_admission_no;?></td>
                                                                    <td><?=$all->father_occ;?>
                                                                </td>
                                                                <td><?=$all->mother_occ;?>
                                                                </td>
                                                                <td><?=$all->income_value;?>
                                                                </td>
                                                                <td><?=$all->MEDINSTR_DESC;?></td>
                                                                
                                                                <td><?=$all->district_name?></td>
                                                                 
                                                                 <!-- <td><a href="javascript:void(0)" onclick="transfertab(<?=$all->id;?>)"><i class="fa fa-exchange"></i></a>
                                                                 </td>  -->
                                                                 <td><?=($all->photo !=null || $all->photo !=''?'Yes':'No')?></td>
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
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span id="stu_id"></span></h4>
        </div>
        <div class="modal-body">
                    <form method="post" action="<?php echo base_url().'Home/update_student_profile'?>">
                        <div class="col-lg-12">
                        
                        <input type="hidden" id="emis_images_data" name="emis_image_data"/>
                        <input type="hidden" id="emis_image_name" name="emis_image_name"/>
                        <span id="students_profile"></span><input type="file" id="students_images" style="display: none;" accept="image/*">
                        <div id="img_msg">Click Photo to updated <span>Image  Width-150Px,Heigth-175Px,Size-25kb</span></div>
                         <div class="row upload_image">
                    <div class="col-md-8 text-center">
                          <div id="image_demo" style="width:350px; margin-top:30px"></div>
                    </div>
                    <div class="col-md-4" style="padding-top:30px;">
                        <br />
                        <br />
                        <br/>
                          <button type="button"class="btn btn-success crop_image">Crop & Upload Image</button>
                    </div>
                </div>

                    </div>
                <div class="col-lg-12">
        
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">Student Personal Information</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                <div class="panel-body">
                    
                    <div class="row">
                        <input type="hidden" id="emis_reg_stu_id" name="emis_reg_stu_id">
                        <input type="hidden" id="emis_reg_stu_uni_id" name="emis_reg_stu_uni_id">
                        <input type="hidden" id="emis_reg_stu_name_id_card" name="emis_reg_stu_idnametamil">


                        
                        <div class="col-md-6">
                                                  <label class="control-label">Name of the Student in English *</label>
                                                    <div class="form-group">
                                                    
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_reg_stu_name" name="emis_reg_stu_name" onkeypress="return  ((event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 65 && event.charCode <= 90) ||  (event.charCode == 32));" onkeyup='this.value=this.value.toUpperCase(); haswhitespace(this);'
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
                                                            <input type="text" class="form-control" id="emis_reg_stu_idname" name="emis_reg_stu_idname"  placeholder="தமிழில் மாணவர் பெயர்" required>
                                                            <!--<p>Name followed by Initial Eg. Ganesh R</p>-->
                                                             <span>Press F10 For Tamil Typing Tamil Special Charter (ஶ்ரீ)</span>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_stu_idname_alert"></div></font>
                                                             <!--மாணவர் பெயர் தமிழ்-->
                                                        </div>
                                                    </div>                                                  
                                                </div>
                                                <div class="col-md-6">
                                                  <label class="control-label">AADHAR Number</label>
                                                    <div class="form-group">
                                                    
                                                        <div class="">
                            <!--emis_reg_stu_aadhaar-->
                                                            <input type="text" class="form-control" id="emis_reg_stu_aadhaar_ed" name="emis_reg_stu_aadhaar" maxlength="12" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="ஆதார் எண்">
                                                             <font style="color:#dd4b39;"><div id="emis_reg_stu_aadhaar_alert"></div></font>
                                                        </div>
                                                    </div>                                                  
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="control-label">Date of Birth - பிறந்த தேதி *</label>
                                                    <div class="form-group">
                                                        <input type="text" name="emis_stu_dob"  class="form-control date" id="dat" value="" autocomplete="off" placeholder="DD-MM-YYYY" onfocus="textvalidate(this.id,'emis_reg_stu_dob_alert');" onchange="textvalidate(this.id,'emis_reg_stu_dob_alert');" onkeypress="return event.charCode >= 48"required />
    
                                                    
                                                     <font style="color:#dd4b39;"><div id="emis_reg_stu_dob_alert"></div></font>
                                                    </div>
                                                </div>

                                                
                                                  <div class="col-md-3">
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

                                                  <div class="col-md-3">
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
                                                  

            
            <div class="col-md-6">
                                                   <label class="control-label">Mother tongue *</label>
                                                    <div class="form-group">
                                                   
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category" id="emis_reg_stu_lang" name="emis_reg_stu_lang" required>
                                                               <option value="" style="color:#bfbfbf;">தாய்மொழி *</option>
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
                                            <div class="col-md-6">
                                                    <label class="control-label">Disability Group Name (இயலாமை குழுவின் பெயர்)</label>
                                                       <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category" id="emis_disability_type_name" name="emis_disability_type_name">
                                                            <!---->
                                                          <option value="0" >Select</option>
                                                         <?php foreach($disabilities as $disab) {   ?>
                                                          <option value="<?php echo $disab->id;  ?>"><?php echo $disab->da_name  ?></option>
                                                          <?php   }  ?>
                                                            </select>
                                                            <font style="color:#dd4b39;">
                                                            <div id="emis_disability_type_name_alert"></div></font>
                                                        </div>
                                                         
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                <label class="control-label">Religion *</label>
                                                <div class="form-group">
                                                
                                                    <div class="">
                                                       <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_stu_religion" name="emis_reg_religion" required>
                                                        <option value="" style="color:#bfbfbf;">மதம் *</option>
                                                         <?php foreach($religions as $rel) {   ?>
                                                          <option value="<?php echo $rel->id;  ?>"><?php echo $rel->religion_name  ?></option>
                                                          <?php   }  ?>
                                                        </select>
                                                        <font style="color:#dd4b39;"><div id="emis_reg_religion_alert"></div></font>
                                                        </div>
                                                         
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                  <label class="control-label">Community *</label>
                                                    <div class="form-group">
                                                    
                                                        <div class="community_group">
                                                            <select class="form-control"  id="emis_reg_stu_community" name="emis_reg_community" required>
                                                         <option value="" style="color:#bfbfbf;">சமூக வகை *</option>
                                                        
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_community_alert"></div></font>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <label class="control-label">Caste *</label>
                                                    <div class="form-group">
                                                        
                                                        <div class="caste_group">
                                                           <select class="form-control" data-placeholder="Choose a Category"   id="emis_reg_stu_subcaste" name="emis_reg_subcaste" required>
                                                        <option value="" style="color:#bfbfbf;">சாதி *</option>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_subcaste_alert"></div></font>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
        </div>
                                                
                </div>
        </div>
    
    </div>
        <!----- Personal Details-------->

    <div class="col-lg-12">
        
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">Family Details</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                <div class="panel-body">
                    
                    <div class="row">

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
                                                <div class="col-md-6">
                                                     <label class="control-label">Father's Occupation</label>
                                                    <div class="form-group">
                                                   
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category" id="emis_reg_fatheroccu" name="emis_reg_fatheroccu">
                                                          <option value="">தந்தையின் தொழில்</option>
                                                           <?php foreach($occpation as $res) {   ?>
                                                          <option value="<?=$res->id; ?>"><?php echo $res->occu_name; ?></option>
                                                          <?php  } ?>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_stu_bg_alert"></div></font>
                                                        </div>
                                                      
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                     <label class="control-label">Mother's Occupation</label>
                                                    <div class="form-group">
                                                   
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_motheroccu" name="emis_reg_motheroccu">
                                                          <option value="">தாயின் தொழில்</option>
                                                           <?php foreach($occpation as $res) {   ?>
                                                          <option value="<?=$res->id; ?>"><?php echo $res->occu_name; ?></option>
                                                          <?php  } ?>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_stu_bg_alert"></div></font>
                                                        </div>
                                                      
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="control-label">Guardian Name</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_reg_guardianname" name="emis_reg_guardianname" placeholder="பாதுகாவலர் பெயர்" onkeyup='this.value=this.value.toUpperCase();'>
                                                        </div>
                                                        
                                                    </div>
                                                    <label style="color:#dd4b39;">Note: Father name or Mother name or Guardian name Either one is mandatory!</label>
                                                </div>
                                                <div class="col-md-6">
                                                        <label class="control-label">Parents Annual income</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category" id="emis_reg_parents_income" name="emis_reg_parents_income" >
                                                              <option value="">பெற்றோரின் ஆண்டு வருமானம்</option>
                                                               <?php foreach($parentIncome as $income) {   ?>
                                                          <option value="<?php echo $income->id;  ?>"><?php echo $income->income_value  ?></option>
                                                          <?php   }  ?>
                                                          </select>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_parents_income_alert"></div></font>
                                                        </div>
                                                         
                                                    </div>

                                                </div>
                                             </div>
                                                
                </div>
        </div>
    
    </div>
                                    <!----- Family Details -------->

    <div class="col-lg-12">
        
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">Communication Details</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                <div class="panel-body">
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
                                                <div class="col-md-4">
                                                    <label class="control-label">City name / Village name *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_reg_stu_city" name="emis_reg_stu_city" placeholder="நகரம் / கிராமத்தின் பெயர் *" required>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_stu_city_alert"></div></font>
                                                        </div>
                                                       
                                                    </div>
                                                </div>  <div class="col-md-2">
                                                    <label class="control-label">Pincode *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_reg_stu_pincode" name="emis_reg_stu_pincode" maxlength="6" placeholder="அஞ்சல் குறியீட்டு எண் *" required>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_pincode_alert"></div></font>
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
                                                         <?php foreach($district as $dist) {   ?>
                                                          <option value="<?php echo $dist->id;  ?>"><?php echo $dist->district_name  ?></option>
                                                          <?php   }  ?>
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_district_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                             </div>

                                                
                </div>
        </div>
    
    </div>
                        <!--- Communitication Details End ----->

    <div class="col-lg-12">
        
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">Academic info</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                <div class="panel-body">
                    <label style="color:#dd4b39;">Note:  'Section' should be initiated in school profile first.!</label>
<div class="row">
                                                <div class="col-md-6">
                                                    
                                                    <input type="hidden" id="students_status" name="students_status">
                                                    <input type="hidden" id="current_class" name="current_class">
                                                    <label class="control-label">Class for which Admission is sought for *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                           
                                                            
                                                            <select disabled="disabled"  class="form-control" data-placeholder="Choose a Category" id="emis_class_study" name="emis_class_studying" required>
                                                                <option value="">வகுப்பு *</option>
                                                                <?php 
                                                                if(!empty($school_classwise)){
                                                            // print_r($school_classwise);
                                                            foreach($school_classwise as $class_wise)
                                                            {

                                                              $class_roman_names = array_search($class_wise->class_id,$class_roma);
                                                                ?>
                                                                    <option value="<?=$class_wise->class_id;?>"><?=$class_roman_names.'-'.$class_wise->class_id;?></option>
                                                                  <?php  } }?>
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_class_studying_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>

                                                            

                                                <!--/span-->
                                                <div class="col-md-6">
                                                        <label class="control-label">Date of Joining - சேர்க்கை தேதி *</label>
                                                    <div class="form-group">
                                                        <input type="text" name="emis_reg_stu_doj"  class="form-control date1" id="dat1" value="" autocomplete="off" placeholder="DD-MM-YYYY"  onkeypress="return event.charCode >= 48"required />
                                                     
                                                    </div>
                                                </div>
                                              
                                            </div>
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                        <label class="control-label">Section*</label>
                                                    <div class="form-group">
                                                        <div class="section_det">
                                                            
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_section_alert"></div></font>
                                                        </div>
                                                    </div>

                                                </div>
                                                  <div class="col-md-6">
                                                    <label class="control-label">Medium of Instruction *</label>
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
                                             </div>
                                             <div class="row">
                                                <?php $school_manage = $this->session->userdata('school_manage');
                                                if($school_manage !=1 && $school_manage !=5){ ?>

                                                <div class="col-md-6">
                                                    <label class="control-label">Came through RTE 25%</label>
                                                    <div class="form-group">
                                                       
                                                            <select class="form-control" data-placeholder="Choose a Category" id="emis_reg_stu_rte" name="emis_reg_stu_rte" onchange="getdropdown();">
                                                               <option value="0">Select Came through RTE 25%</option>
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_rte_alert"></div></font>
                                                        </div>
                                                    
                                                </div>
												<div class="col-md-6" id="rtetype">
                                                    <div class="form-group">
                                                    <label class="control-label col-md-3">RTE Type</label>
                                                       <div class="col-md-9">
                                                             <select style="width: 90%;" class="form-control"  data-placeholder="Select Teacher" tabindex="1" id="rte_type" name="rtetype"  style="width: 30%" >
                                                               	
                                                                <option value="" >Select type</option>
																	
                                                                 <?php foreach($rtetype as $rt) {
														 
														 ?>
                                                               <option value="<?php echo $rt->id;  ?>" ><?php echo  $rt->cate;?></option>
                                                                 <?php   }  ?>
																 
                                                               </select> 
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                                <div class="col-md-6">
                                                    <label class="control-label">Admission Number *</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_reg_stu_admission" name="emis_reg_stu_admission" maxlength="6" placeholder="" required>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_pincode_alert"></div></font>
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

                                             </div>
                                                
                </div>
        </div>
    
    </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" onclick="return save_valid();"class="btn btn-primary">Save</button>
          <div id="err_msg_save"></div>
        </div>
                  </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="transferModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span id="stu_trans_id"></span></h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
            <label class="control-label">Reason for The Transfer Student*</label>
            <select class="form-control" data-placeholder="Choose a Reason" id="emis_trans_stu" name="emis_trans_stu">
                                                               <option value="0" >Select Reason</option>
                                                                <option value="1">Long Absent</option>
                                                                <option value="2">Transfer Request by Parent</option>
                                                                <option value="4">Dropped Out</option>
                                                                <option value="5">Student Died</option>
                                                                <option value="6">Duplicate EMIS Entry</option>
                                                           </select>
        </div>
    </div>
</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" id="save_trans" onclick="save_transfer();"class="btn btn-primary">Save</button>
          <div id="err_msg"></div>
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
                            <script src="<?php echo base_url().'asset/js/croppie-VIT/croppie.js'?>" type="text/javascript"></script>
                            <script src="<?php echo base_url().'asset/js/croppie-VIT/croppie.js'?>" type="text/javascript"></script>
                            <script src="<?php echo base_url().'asset/js/tamil-keyboard-VIT/js/utf.js'?>" type="text/javascript"></script>
                            <script src="<?php echo base_url().'asset/js/tamil-keyboard-VIT/js/tamil.js'?>" type="text/javascript"></script>

              <script type="text/javascript">

               function savestudentid1(value){
                var baseurl='<?php echo base_url(); ?>';
                $.ajax({
                type: "POST",
                url:baseurl+'Home/savestudentidsession',
                data:"&studid="+value,
                success: function(resp){ 
                if(resp==true){    
                window.open(baseurl+'Home/emis_student_profile1','_blank');
                 }
                 return true;  
                         
                 },
                error: function(e){ 
                return false;  

                }
                });
               }
              </script>
    </body>
    <script>
            $(document).ready(function(){
				
                $('#emis_reg_stu_idname').on('keydown',function(event){
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
                $('#emis_reg_stu_idname').on('keypress',function(event){
                    if($(this).hasClass('tamil')){
                        convertThis(event);
                    }
                });
            });
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
    <script type="text/javascript">
        $(document).ready(function(){
    // $('.display').dataTable();
    
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
           
 var curr = new Date();

// console.log(curr.getFullYear()-19); 
var first = new Date(curr.getFullYear() -19,'01','01');
var end = new Date(curr.getFullYear() -3,curr.getMonth(), curr.getDate());

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
        
    var aadhar_status = false;
    var students_details = <?php echo json_encode($allstuds);?>;
    var blood_groups = <?php echo json_encode($bloodgroup)?>;
    var occupations = <?php echo json_encode($occpation)?>;
    var parentIncomes = <?php echo json_encode($parentIncome)?>;
    var district_details = <?php echo json_encode($district)?>;
    var class_wises = <?php echo json_encode($school_classwise)?>;
    var students_detail = '';
	
    function opentab(id)
    {		 
        aadhar_status = false;
        $(".upload_image").hide();
        $("#students_profile").show();
        $("#err_msg_save").html('');
        $("#emis_reg_stu_aadhaar_alert").html('');
    $(".group").hide();

        students_detail = students_details.filter(stu=>stu.id == id)[0];

        console.log(students_detail);
        var current_class_id = $("#class_id").val();
         get_s3_images(students_detail.photo);
            $("#emis_image_name").val(students_detail.photo);
        //student Personal
        $("#stu_id").text(students_detail.name +' - '+students_detail.unique_id_no);
        $("#emis_reg_stu_name").val(students_detail.name);
        $("#emis_reg_stu_idname").val(students_detail.name_tamil);
        $("#emis_reg_stu_aadhaar_ed").val(students_detail.aadhaar_uid_number);
        var date = new Date(students_detail.dob);
        var dob_month = date.getMonth()+1;
        var dob = (date.getDate() < 10 ? '0'+date.getDate():date.getDate())+'-'+(dob_month < 10 ? '0'+dob_month:dob_month)
+'-'+date.getFullYear();
        console.log(dob);
        $(".date").datepicker("update",dob);
        $("#emis_reg_stu_gender").val(students_detail.gender).attr('selected','selected');
		 $("#rte_type").val(students_detail.rte_type).attr('selected','selected');
        $("#emis_reg_stu_bg").val(students_detail.bloodgroup).attr('selected','selected');
        $("#emis_reg_stu_lang").val(students_detail.mothertounge_id).attr('selected','selected');
        $("#emis_disability_type_name").val((students_detail.differently_abled !=null?students_detail.differently_abled :0)).attr('selected','selected');
        // Family Details Append

        $("#emis_reg_fathername").val(students_detail.father_name);
        $("#emis_reg_mothername").val(students_detail.mother_name);
        $("#emis_reg_fatheroccu").val(students_detail.father_occupation).attr('selected','selected');
        $("#emis_reg_motheroccu").val(students_detail.mother_occupation).attr('selected','selected');
        $("#emis_reg_guardianname").val(students_detail.guardian_name);
        $("#emis_reg_parents_income").val(students_detail.parent_income).attr('selected','selected');
        $("#emis_reg_stu_religion").val(students_detail.religion_id).attr('selected','selected');
        get_community_caste(students_detail.religion_id,students_detail.community_id,null);
        get_community_caste(null,students_detail.community_id,students_detail.subcaste_id);
        
        // Communication Details
        $("#emis_reg_mobile").val(students_detail.phone_number);
        $("#emis_reg_email").val(students_detail.email);
        $("#emis_reg_stu_door").val(students_detail.house_address);
        $("#emis_reg_stu_street").val(students_detail.street_name);
        $("#emis_reg_stu_city").val(students_detail.area_village);
        $("#emis_reg_stu_pincode").val(students_detail.pin_code);
        $("#emis_reg_stu_district").val(students_detail.district_id).attr('selected','selected');
        //Academic info
        var date_join_year = (date.getFullYear() +2);
        date_join_year  ;
        var first = new Date(date.getFullYear() +2,'01','01');
        var date = new Date(); 
var end = new Date(date.getFullYear(),date.getMonth(), date.getDate());


        $(".date1").datepicker('setStartDate',first);
        $(".date1").datepicker('setEndDate',end);

        $("#emis_class_study").val(students_detail.class_studying_id).attr('selected','selected');
       
       $("#students_status").val((students_detail.pass_fail!=null?students_detail.pass_fail:'PASS'));
       $("#current_class").val(current_class_id);
        // $("#emis_reg_stu_section").val(students_detail.class_section).attr('selected','selected');
        get_stu_section(students_detail.class_studying_id,students_detail.class_section);
        var date_join = new Date(students_detail.doj);
        console.log(date_join);
        var doj_month = date_join.getMonth()+1;
        var doj = (date_join.getDate() < 10 ? '0'+date_join.getDate():date_join.getDate())+'-'+(doj_month < 10 ? '0'+doj_month:doj_month)+'-'+date_join.getFullYear();

// console.log(doj);
        $("#dat1").datepicker("update",doj);

        // console.log(students_detail.education_medium_id);
        $("#emis_reg_mediofinst").val(students_detail.education_medium_id).attr('selected','selected');
        $("#emis_reg_stu_admission").val(students_detail.school_admission_no);
        $("#emis_reg_stu_rte").val((students_detail.child_admitted_under_reservation !=null?students_detail.child_admitted_under_reservation:'0')).attr('selected','selected');
// var end = new Date(curr.getFullYear() -3,curr.getMonth(), curr.getDate());
       var status=students_detail.child_admitted_under_reservation;
	   if(status=='Yes')
		   {
	   $("#rtetype").show();
		   }
		   else
		   {
			 $("#rtetype").hide();   
		   }
        $("#emis_reg_stu_id").val(students_detail.id);
        $("#emis_reg_stu_uni_id").val(students_detail.unique_id_no);
        $("#emis_reg_stu_name_id_card").val(students_detail.name_id_card);

        if(students_detail.class_studying_id ==11 || students_detail.class_studying_id==12 )
        {
                $(".group").show();
                get_group(students_detail.class_studying_id.substr(1,2),students_detail.group_code_id);


        }
        
//         $(".date1").datepicker('setEndDate',end);
        $("#myModal").modal('show');

    }

    $("#emis_class_study").change(function()
    {
        var class_id = $(this).val();
        // console.log(students_detail);
        var pre_class_id = students_detail.prv_class_std;

        if(class_id ==11 || class_id ==12)
    {   
        // console.log('if');
        $(".group").show();
        get_group(class_id.substr(1,2),null);

    }else
    {
        $(".group").hide();
    }

    // pass or fail updation

    /*if(class_id >= pre_class_id){
    var old_class_id = $("#class_id").val();
        if(class_id )
        if(class_id < old_class_id)
        {
            $("#students_status").val('FAIL');
        }else if(class_id >= old_class_id)
        {
                $("#students_status").val('PASS')
        }
    }else
    {
            // alert('else');
            $("#students_status").val('old_Class')
    }*/


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
        // console.log(section);
            $(".section_det").empty('');            

        var section_drop = '<select name="emis_reg_stu_section" class="form-control" id="emis_reg_section_id">';

        section_drop += '<option value="">பிரிவு</option>';
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
                // $("#emis_reg_section_id").val(0).attr('selected','selected');
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


        var group_drop = '<select name="emis_reg_grup_code" class="form-control" id="emis_reg_grup_code">';

        group_drop += '<option value="">Select Group</option>';
        $.each(JSON.parse(resp),function(id,val)
        {
            group_drop +='<option value='+ val.id +'>'+val.group_code+'-'+val.group_name+'</option>';
        })
            group_drop +='</select>';
            
            $(".group_det").append(group_drop); 
            // alert(section_id);
            if(group_id !='' && group_id !=null){
            $("#emis_reg_grup_code").val(group_id).attr('selected','selected');   
            }else
            {
                // console.log('else');
                // $("#emis_reg_grup_code").val(0).attr('selected','selected');
            }  
        }

        })
    }


    $("#emis_reg_stu_religion").change(function(){
            var religon_id = $(this).val();
            get_community_caste(religon_id,null,null);
    });

    $(document).on('change','#emis_reg_stu_community',function(){
            var community_id = $(this).val();
            // alert();
            get_community_caste(null,community_id,null);
    });

    $("#emis_reg_stu_aadhaar_ed").change(function()
    {
        // alert();
        $("#emis_reg_stu_aadhaar_alert").html('');
        var aadhar = $(this).val();
        var uni_id = $("#emis_reg_stu_uni_id").val();
        if(aadhar !=null){
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
        })
            }
    });

    function save_valid()
    {
        // alert();
        /*else if(students_status=='old_Class' || students_status=='')
        {
            $("#err_msg_save").html('<p style="color:red">Plese Select Correct Class</p>');
            return false;
        }*/
            var students_status = $("#students_status").val();
        console.log(students_status);
        var section_id = $("#emis_reg_section_id").val();
        console.log(section_id);
        if(aadhar_status){
        $("#err_msg_save").html('<p style="color:red">AADHAR Already Exists in Database</p>');
            return false;
        }else if(section_id=='' || section_id ==null)
        {
            $("#err_msg_save").html('<p style="color:red">Plese Select Section</p>');
            return false;

        }else
        {
            $("#err_msg_save").html('');
            return true;
        }
    }

    // get community and caste

    function get_community_caste(religon_id,community_id,caste_id)
    {
        // console.log(religon_id,community_id,caste_id);
        if(religon_id !=null)
        {
            // alert();

            $.ajax({
                type: "POST",
                url:baseurl+'Home/get_common_tables',
                data:{'class_id':religon_id,'table':'baseapp_community','where_col':'religion_id'},
                success: function(resp){
                    $(".community_group").empty();
                    var community_drop = '<select name="emis_reg_community" class="form-control" id="emis_reg_stu_community" required>';
                    community_drop+='<option value="">சமூக வகை *</option>';

                    $.each(JSON.parse(resp),function(i,val)
                    {
                    community_drop +='<option value='+ val.id +'>'+val.community_name+'</option>';

                    });
                    community_drop +='</select>';
                    $(".community_group").append(community_drop);
                        if(community_id !='' && community_id !=null){
                                $("#emis_reg_stu_community").val(community_id).attr('selected','selected');   
                        }else
                        {
                            
                                // $("#emis_reg_stu_community").val(0).attr('selected','selected');
                        }  
                }
            });

        }else if(community_id !=null)
        {
            $.ajax({
                type: "POST",
                url:baseurl+'Home/get_common_tables',
                data:{'class_id':community_id,'table':'baseapp_sub_castes','where_col':'community_id'},
                success: function(resp){
                    $(".caste_group").empty();
                    var caste_drop = '<select name="emis_reg_subcaste" class="form-control" id="emis_reg_stu_caste" required>';
                    caste_drop+='<option value="">சாதி *</option>';

                    $.each(JSON.parse(resp),function(i,val)
                    {
                    caste_drop +='<option value='+ val.id +'>'+val.caste_name+'</option>';

                    });
                    caste_drop +='</select>';
                    $(".caste_group").append(caste_drop);
                        if(caste_id !='' && caste_id !=null){
                    // console.log(caste_id);
                            
                                $("#emis_reg_stu_caste").val(caste_id).attr('selected','selected');   
                        }else
                        {
                            
                                // $("#emis_reg_stu_caste").val(0).attr('selected','selected');
                        }  
                }
            });
        }else
        {

        }

    }

    function get_s3_images(students_data)
    {
        console.log(students_data);
        if(students_data !=''){
        var emis = '<?=Students_EMIS;?>';
            students_data = emis+'/'+students_data;
            if(students_data!=null)
            {
                $.ajax(
                {
                    type: "POST",
                    url:baseurl+'Home/get_aws_s3_image',
                    data:{'records':students_data},
                    dataType:"JSON",
                    success: function(image_data)
                    {
                            // console.log(resp);

                        var images = '<img  src="'+image_data+'" class="img-responsive image" alt="Select Image" id="image"  width="150" height="175" onerror=this.onerror=null;this.src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg">';
                        $("#students_profile").html(images);


                    }

                })
            }
        }else
        {
            var image_data = '';
            var images = '<img  src="'+image_data+'" class="img-responsive image" alt="Select Image" id="image"  width="150" height="175" onerror=this.onerror=null;this.src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg">';
                        $("#students_profile").html(images);
        }
    }

    $(document).ready(function(){
        $(".upload_image").hide();
        // console.log(croppie());return false;
        $image_crop = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
              width:150,
              height:175,
              type:'square' //circle
            },
            boundary:{
              width:200,
              height:200
            }
        });
        // console.log(croppie());
    })

    $(document).on('click','#image',function() {
        // alert();
    $("input[id='students_images']").click();
});


    
var _URL = window.URL || window.webkitURL;

$("#students_images").change(function(e) {
    // alert();
    
 
    // return false;
    var file, img;

    // console.log(this.files);
    file = '';
    if ((file = this.files[0])) {
        // alert('if')
        var width = '';
        var height = '';
        
        var size = this.files[0].size/1024;
            // alert(Math.round(size));
            // alert(img.width);
        if(size <=25){
        $(".upload_image").show();
    $("#students_profile").hide();
        croppie(this);
      // $('#students_profile').html(img);
      // $("#")
    }else
    {
        // $(this).empty();
        alert('Maximum File Size should be 25kb,Width:150px,Height:175px');
    }

    }
});

function croppie(file)
{
    
    var reader = new FileReader();
    console.log($image_crop);
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(file.files[0]);
    // $('#uploadimageModal').modal('show');
}

$('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
        console.log(response);
        img = new Image();
             
        img.onload = function() {
            }
        img.onerror = function() {
            alert( "not a valid file: " + file.type);
        };
        $('.upload_image').hide();
        
        var image = '<img  src="'+response+'" class="img-responsive image" alt="No Image" id="image">';
        $("#emis_images_data").val(response);
        $("#students_profile").show();

                        $("#students_profile").html(image);
    })
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


                    $("#transferModal").modal('show');
            }

            function save_transfer()
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
            }
</script>
</html>