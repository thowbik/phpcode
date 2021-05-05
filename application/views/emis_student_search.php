<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>

        <?php $this->load->view('head.php'); ?>
         <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>



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
                                        <h1>Student Search
                                            
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
                                       
                            <?php $this->load->view('emis_school_profile_header1.php'); ?>

                                       <?php if(!empty($allstuds)){  ?> 
                                         <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                    <?php 
                                                    $school_name = "";
                                                    $school_udise = "";
                                                    foreach($allstuds as $all){  
                                                    $school_name = $this->Homemodel->getschoolnamesep($all->school_id);
                                                    $school_udise = $this->Homemodel->getschooludisesep($all->school_id);
                                                      } ?>
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                              <p>Colour Description of Student Name : <i class="fa fa-circle" style="color: green"> </i> Student in School <i class="fa fa-circle" style="color: red"> </i> Student in Common Area </p>
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> Student Data List 
                                                          <!--   <?php if($school_name!="" || $school_udise!=""){ echo $school_name.' - '.$school_udise; } ?>  -->
                                                             </div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th> sno </th>                        
                                                                    <th> Unique id</th>
                                                                    <th> Admision number</th>
                                                                    <th> Name </th>
                                                                   
                                                                    <th> DOB </th>
                                                                    <th> Class</th>
                                                                    <th> Section </th>
                                                                    <th> Community </th>
                                                                </tr>
                                                                </thead>
                                                                <?php $i=1; foreach($allstuds as $all){ ?>
                                                                <tr>
                                                                    <td><?php echo $i; ?></td>
                                                                   <!--  <td><a  onclick="savestudentid('<?php echo $all->unique_id_no; ?>')"><?php echo $all->unique_id_no; ?></a></td> -->
                                                                    <td><a  href="<?php echo base_url().'Home/emis_student_profile/'.$all->unique_id_no;?>" target="_blank"><?php echo $all->unique_id_no; ?></a></td>
                                                                    <td><?php echo $all->school_admission_no; ?></td>
                                                                    <?php if($all->transfer_flag == 0) {   ?>
                                                                    <td style="color: green;"><b><?php echo $all->name; ?></b></td>
                                                                    <?php  } else { ?>  
                                                                    <td style="color: red;"><b><?php echo $all->name; ?></b></td>
                                                                    <?php } ?>
                                                                    <td><?php echo $all->dob; ?></td>
                                                                     <td><?php $this->db->select('*'); 
                                                                   $this->db->from('baseapp_class_studying');
                                                                   $this->db->where('id', $all->class_studying_id);  
                                                                   $query =  $this->db->get();
                                                                   $classs=$query->row('class_studying'); echo $classs;  ?></td>
                                                                    <td><?php echo $all->class_section; ?></td>
                                                                     <td><?php $this->db->select('*'); 
                                                                   $this->db->from('baseapp_community');
                                                                   $this->db->where('id', $all->community_id);
                                                                   $query =  $this->db->get();
                                                                   $commm=$query->row('community_name');
                                                                   echo $commm; ?></td>
                                                                </tr>
                                                                <?php $i++; } ?>
                                                            <tbody>
                                                      
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

                                                    </div>
                                                </div>
                                            </div>

                                            <?php } else { ?>
                                            <center>
                                            <div class="alert alert-danger"><button class="close" data-close="alert"></button>
                                             <label>No data available! Please use  filter!</label></div>
                                             </center>
                                            <?php } ?>
 
                                         <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Student Unique Search</span>
                                                </div>
                                            </div>

                                           <div class="portlet-body">
                                           <div class="row">
                                            <div class="col-md-12">
                                            
                                                <div class="col-md-4 thumbnail" style="margin-left: 10px; width: 30%; height: 150px;"><center>
                                                    <form method="post" action="<?php echo base_url().'Home/emis_school_studentsearch_seperate';?>">
                                                    <div class="form-group">
                                                    <label class="control-label">Enter Unique Number</label>
                                                        <input type="text" class="form-control" id="emis_stu_search_unique" name="emis_stu_search_unique" style="width: 60%" placeholder="Unique Number" required="">
                                                         <font style="color:#dd4b39;"><div id="emis_stu_search_unique_alert"></div></font>
                                                         <br/>
                                                          <button type="submit" class="btn green" id="emis_stu_searchsep_sub">Search</button> 
                                                    </div>
                                                    </form></center>
                                                </div>
                                                  <div class="col-md-4 thumbnail" style="margin-left: 10px; width: 30%;height: 150px;"><center>
                                                   <form method="post" action="<?php echo base_url().'Home/emis_school_studentsearch_seperate';?>">
                                                    <div class="form-group">
                                                    <label class="control-label">Enter Aadhaar Number</label>
                                                        <input type="text" class="form-control" id="emis_stu_search_adhaar" name="emis_stu_search_adhaar" style="width: 60%"  placeholder="Aadhaar Number" required="">
                                                         <font style="color:#dd4b39;"><div id="emis_stu_search_adhaar_alert"></div></font>
                                                         <br/>
                                                          <button type="submit" class="btn green" id="emis_stu_searchsep_sub">Search</button> 
                                                    </div>
                                                    </form></center>
                                                </div>
                                                 <div class="col-md-4 thumbnail" style="margin-left: 10px; width: 30%;height: 150px;  "><center>
                                                    <div class="form-group">
                                                     <form method="post" action="<?php echo base_url().'Home/emis_school_studentsearch_seperate';?>">
                                                    <label class="control-label">Enter Mobile Number</label>
                                                        <input type="text" class="form-control" id="emis_stu_search_mobile" name="emis_stu_search_mobile" style="width: 60%"  placeholder="Mobile Number" required="">
                                                         <font style="color:#dd4b39;"><div id="emis_stu_search_mobile_alert"></div></font>
                                                         <br/>
                                                          <button type="submit" class="btn green" id="emis_stu_searchsep_sub">Search</button> 
                                                    </div>
                                                     </form></center>
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                             </div>
                                        
                                       <!--  <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Student Filters Search 1</span>
                                                </div>
                                            </div>

                                            <div class="portlet-body">
                                            <form method="post" action="<?php echo base_url().'Home/emis_school_studentsearch';?>">
                                           <div class="row">
                                            <div class="col-md-12">
                                            
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label class="control-label">Select District</label>
                                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_stu_search_dist" name="emis_stu_search_dist" required="">
                                                      <option value="" style="color:#bfbfbf;">Select District</option>
                                                        <?php foreach($districts as $dis) {   ?>
                                                          <option value="<?php echo $dis->id;  ?>"><?php echo $dis->district_name  ?></option>
                                                          <?php   }  ?>
                                                        </select>
                                                         <font style="color:#dd4b39;"><div id="emis_stu_search_dist_alert"></div></font>
                                                    </div>
                                                </div>
                                                 <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label class="control-label">Select Block</label>
                                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_stu_search_block" name="emis_stu_search_block" >
                                                      <option value="" style="color:#bfbfbf;">Select Block</option>
                                                        </select>
                                                         <font style="color:#dd4b39;"><div id="emis_stu_search_block_alert"></div></font>
                                                    </div>
                                                </div>
                                                 <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label class="control-label">Select school</label>
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_stu_search_school" name="emis_stu_search_school" >
                                                          <option value="" style="color:#bfbfbf;">Select School</option>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_stu_search_school_alert"></div></font>
                                                      
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                   <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label class="control-label">Select class</label>
                                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_stu_search_class" name="emis_stu_search_class" >
                                                      <option value="" style="color:#bfbfbf;">Select class</option>
                                                        </select>
                                                         <font style="color:#dd4b39;"><div id="emis_stu_search_class_alert"></div></font>
                                                    </div>
                                                </div>
                                                 <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label class="control-label">Select section</label>
                                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_stu_search_section" name="emis_stu_search_section" >
                                                      <option value="" style="color:#bfbfbf;">Select section</option>
                                                        </select>
                                                         <font style="color:#dd4b39;"><div id="emis_stu_search_section_alert"></div></font>
                                                    </div>
                                                </div>
                                                 <div class="col-md-4">
                                                  <div class="form-group" style="margin-top: 25px;">
                                                            <button type="submit" class="btn green" id="emis_stu_search_sub">Search</button> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                             </div> -->


                                       <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Student Filters Search 1</span>
                                                </div>
                                            </div>



                                           <div class="portlet-body">
                                           <div class="row">
                                               <div class="col-md-12">
                                             <form method="post" action="<?php echo base_url().'Home/emis_school_studentsearch_seperate2';?>">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                    <label class="control-label">Enter udise code *</label>
                                                        <input type="text" class="form-control" id="emis_stu_search_udise" name="emis_stu_search_udise" placeholder="Udise code *" required="">
                                                         <font style="color:#dd4b39;"><div id="emis_stu_search_udise_alert"></div></font>
                                                    </div>
                                                </div>
                                                 <div class="col-md-3">
                                                    <div class="form-group">
                                                    <label class="control-label">Select Class *</label>
                                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_stu_search_class" name="emis_stu_search_class" required="">
                                                          <option value="" style="color:#bfbfbf;">Select Class *</option>
                                                          <option value="1" >I</option>
                                                          <option value="2" >II</option>
                                                          <option value="3" >III</option>
                                                          <option value="4" >IV</option>
                                                          <option value="5" >V</option>
                                                          <option value="6" >VI</option>
                                                          <option value="7" >VII</option>
                                                          <option value="8" >VIII</option>
                                                          <option value="9" >IX</option>
                                                          <option value="10" >X</option>
                                                          <option value="11" >XI</option>
                                                          <option value="12" >XII</option>
                                                        </select>
                                                         <font style="color:#dd4b39;"><div id="emis_stu_search_class_alert"></div></font>
                                                    </div>
                                                </div>
                                                 <div class="col-md-3">
                                                    <div class="form-group">
                                                    <label class="control-label">Select Section</label>
                                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_stu_search_section2" name="emis_stu_search_section2" >
                                                          <option value="" style="color:#bfbfbf;">Select Section</option>
                                                        <?php  foreach (range('A', 'Z') as $column){ if($column!="Q"){ ?>
                                                          <option value="<?php echo $column ?>" ><?php echo $column ?></option>
                                                          <?php } } ?>
                                                        </select>
                                                         <font style="color:#dd4b39;"><div id="emis_stu_search_section2_alert"></div></font>
                                                    </div>
                                                </div>
                                                 <div class="col-md-3">
                                                    <div class="form-group">
                                                     <button type="submit" class="btn green" id="emis_stu_searchsep2_sub"  style="margin-top: 25px;">Search</button> 
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                       
                                    </div>
                             </div>

                                  <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Student Filters Search 2</span>
                                                </div>
                                            </div>

                                            <div class="portlet-body">
                                          
                                       <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-12 thumbnail">
                                                <center>
                                            <form method="post" action="<?php echo base_url().'Home/emis_school_studentsearch_seperate1';?>">

                                            <div class="form-group">
                                                    <div class="col-md-3">  
                                                    <label class="control-label">Enter pincode *</label>
                                                        <input type="text" class="form-control" 
                                                        id="emis_stu_search_pincode1" name="emis_stu_search_pincode1"  maxlength="6" placeholder="Pincode *" required="">
                                                         <font style="color:#dd4b39;"><div id="emis_stu_search_pincode1_alert"></div></font>
                                                         <br/>
                                                        
                                                       </div>
                                                           <div class="col-md-9">
                                                           <label class="control-label col-md-12">Select Date of birth *</label>
                                                            <div class="col-md-4">
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_reg_stu_date" name="emis_reg_stu_date"  required="">
                                                            <option value="" style="color:#bfbfbf;">Date *</option>
                                                            <?php   $tempnumber = '';
                                                                       for($i=1;$i<32;$i++) { 
                                                                        $tempnumber = sprintf("%02s", $i);  ?>   
                                                                       
                                                                          <option value="<?php echo $tempnumber; ?>"><?php echo $tempnumber; ?></option>
                                                                       <?php }  ?> 
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_stu_date_alert"></div></font>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_reg_stu_month" name="emis_reg_stu_month" required="">
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
                                                        <div class="col-md-4">
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_reg_stu_year" name="emis_reg_stu_year" required="">
                                                            <option value="" style="color:#bfbfbf;">Year *</option>
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
                                                        <div class="clearfix"></div>
                                                        <br/>
                                                         <button type="submit" class="btn green" id="emis_stu_searchsep0_sub"  style="margin-top: 20px;">Search</button> 
                                                    </div>
                                                         </form></center> 
                                                         
                                                </div>
                                           <!--  <div class="col-md-4 thumbnail" style="margin-left: 10px; width: 30%">
                                            <center>
                                            <form method="post" action="<?php echo base_url().'Home/emis_school_studentsearch_seperate2';?>">
                                                    <div class="form-group">
                                                     
                                                    <label class="control-label">Enter pincode</label>
                                                        <input type="text" class="form-control" 
                                                        id="emis_stu_search_pincode1" name="emis_stu_search_pincode1" style="width: 60%" maxlength="6" required="">
                                                         <font style="color:#dd4b39;"><div id="emis_stu_search_pincode1_alert"></div></font>
                                                         <br/>
                                                          <button type="submit" class="btn green" id="emis_stu_searchsep1_sub">Search</button> 
                                                    </div>
                                                     </form></center>
                                                </div> -->
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
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->

              <script type="text/javascript">
               function savestudentid(value){
                var baseurl='<?php echo base_url(); ?>';
                $.ajax({
                type: "POST",
                url:baseurl+'Home/savestudentidsession',
                data:"&studid="+value,
                success: function(resp){ 
                if(resp==true){  
                // window.open.location.href = baseurl+'Home/emis_student_profile1'; 
                window.open(baseurl+'Home/emis_student_profile1','_blank');
                return true;  
                 }else{
                    return false;
                 }
                 
                         
                 },
                error: function(e){ 
                return false;  

                }
                });
               }
              </script>

         <script>
        $('#schooladdress').editable({
            type: 'text',
            pk: 1,
            name: 'address',
            title: 'Enter School Address',
              success: function(response, newValue) {
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if( /[^-.?!,;:() A-Za-z0-9]/.test(value))
                {
                    return 'Invalid address';
                }
            }
        });
        $('#pincode').editable({
            type: 'text',
            pk: 1,
            name: 'pincode',
            title: 'Enter pincode',
            success: function(response, newValue) {
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
        $('#landline1').editable({
            type: 'text',
            pk: 1,
            name: 'landline',
            title: 'Enter Landline Number 1',
            success: function(response, newValue) {
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(! /^\d{6,8}$/.test(value))
                {
                    return 'Invalid landline number';
                }
            }

        });
            $('#landline2').editable({
            type: 'text',
            pk: 1,
            name: 'landline2',
            title: 'Enter Landline Number 2',
            success: function(response, newValue) {
                     if(response == 0) return "Unable to update.Please try later"; 
                },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(! /^\d{6,8}$/.test(value))
                {
                    return 'Invalid landline number';
                }
            }
        });
        $('#headmastermobile').editable({
            type: 'text',
            pk: 1,
            name: 'mobile',
            title: 'Enter Headmaster mobile number',
            success: function(response, newValue) {
                     if(response == 0) return "Unable to update.Please try later"; 
                },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(! /^[+][9][1][\-][789]\d{9}$/.test(value))
                {
                    return 'Invalid Mobile Number';
                }
            }
        });        
        $('#schoolmailid').editable({
            type: 'text',
            pk: 1,
            name: 'sch_email',
            title: 'Enter School Email id',
            success: function(response, newValue) {
                     if(response == 0) return "Unable to update.Please try later"; 
                },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(! /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value))
                {
                    return 'Invalid Mobile Number';
                }
            }
        });
        $('#website').editable({
            type: 'text',
            pk: 1,
            name: 'website',
            title: 'Enter Website URL',
            success: function(response, newValue) {
                     if(response == 0) return "Unable to update.Please try later"; 
                },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(! /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/.test(value))
                {
                    return 'Invalid website';
                }
            }
        });        


        var stdcode = new Array();
        <?php foreach($std_details as $k => $v){ ?>
                stdcode.push({id: '<?php echo $k; ?>', text: '<?php echo $v; ?>'});
            <?php } ?>

        $('#stdcode').editable({
            inputclass: 'form-control input-medium',
            source: stdcode
        });  


                    // init editable toggler
            $('#enable').click(function() {
                $('#user .editable').editable('toggleDisabled');
            });
</script>

    </body>

</html>