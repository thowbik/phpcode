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
			<link href="<?php echo base_url().'asset/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css';?>" rel="stylesheet" type="text/css" />
			<link href="<?php echo base_url().'asset/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css';?>" rel="stylesheet" type="text/css" />
            <style type="text/css">
            label.error { float: none; color:#dd4b39; }
         </style>
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
                                    <h1>Staff Information
                                       <small>Edit/Update</small>
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
                                    <!-- <div class="m-heading-1 border-green m-bordered">
                                       <h3>Basic Information</h3>
                                       </div> -->
                                    <div class="portlet-body">
                                       <div class="mt-element-step">
                                          <div class="row step-thin">
                                             <!-- <a href="<?php// echo base_url().'Udise_staff/emis_school_staffdata1';?>"> -->
                                                <div class="col-md-12 bg-grey mt-step-col active">
                                                   <div class="mt-step-number bg-white font-grey">1</div>
                                                   <div class="mt-step-title uppercase font-grey-cascade">Staff Information </div>
                                                   <div class="mt-step-content font-grey-cascade">Step 1</div>
                                                </div>
                                             <!-- </a> -->
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="mt-checkbox-inline">
                                             
                                             <button id="enable1" class="btn red">Enable / Disable Editor Mode</button>
                                          </div>
                                       </div>
                                    </div>
									
									 <div class="portlet light portlet-fit ">
									<div class="portlet-title">
                                          <div class="caption">
                                             <i class="icon-settings font-dark"></i>
                                             <span class="caption-subject font-dark sbold uppercase">Staff Information - </span><small>Edit &amp; Update</small>
                                          </div>
                                       </div>
									   </div>
									
									
									<div class="row">
										<div class="carousel-info container">
											<div class="col-md-12 thumbnail">                                        
												<span class="col-md-6">
									  
													<center>
														<h3 class="testimonials-name-in">Personal Information</h3>
													</center>
													<table class="table table-striped" id="user">
														<tbody>
															
															<tr>
                                                         <td><b>Staff Name:</b></td>
                                                         <td ><!--<?php echo $staff[0]->teacher_name; ?>-->
                                                           <a href="javascript:;" id="teachername" data-type="text" data-pk="1" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/teacher_name';?>" data-original-title="Enter the Staff Name"><?php echo $staff[0]->teacher_name; ?>  </a>
                                                         </td>
                                                      </tr>
                                                    
                                                    
                                                      <tr>
                                                         <td><b>Gender:</b></td>
                                                         <td >
                                                            <a href="javascript:;" id="gender" data-type="select2" data-pk="1" data-value="<?php echo $staff[0]->gender; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/gender';?>" data-original-title="Select Gender"><?php  
                                                                          if ($staff[0]->gender==1) {
                                                                           echo "Male";
                                                                          }
                                                                          else if($staff[0]->gender== 2){
                                                                            echo "Female";
                                                                          }
                                                                          else if($staff[0]->gender==3){
                                                                                echo "Transgender";
                                                                              }else if($staff[0]->gender==''){
                                                                                echo "";
                                                                              }    
                                                                            
                                                            ?></a> 
                                                         </td>
                                                      </tr>
													  <tr>
                                                         <td><b>Blood Group:</b></td>
                                                         <td >
                                                            <a href="javascript:;" id="bloodgroup" data-type="select2" data-pk="1" data-value="<?php echo $staff[0]->e_blood_grp; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/e_blood_grp';?>" data-original-title="Select Gender"><?php echo $staff[0]->group; ?></a> 
                                                         </td>
                                                      </tr>
                                                     
                                                      <tr>
                                                         <td><b>Social Category:</b></td>
                                                         <td >
                                                            <a href="javascript:;" id="socialcategory" data-type="select2" data-pk="1" data-value="<?php echo $staff[0]->social_category; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/social_category';?>" data-original-title="Select social Category"><?php echo $staff[0]->social_cat; ?></a> 
                                                         </td>
                                                      </tr>
													  
													  <tr>
														<td><b>Date of Birth</b></td>
														<!--<td><?php echo (date('d-m-Y', strtotime($staff_dob))); ?></td>-->
														
													   <td><a href="javascript:;" id="dob" data-type="date"  data-pk="1" data-value="<?php echo $staff[0]->staff_dob; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/staff_dob';?>" data-original-title="Enter the date"></a></td>
														
														
														</tr>
														 
													  <tr>
																<td><b>Father's Name</b></td>
																<td>
                                                           <a href="javascript:;" id="teacherfname" data-type="text" data-pk="1" data-value="<?php echo $staff[0]->e_prnts_nme; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/e_prnts_nme';?>" data-original-title="Enter the Father Name"></a>
                                                         </td>
											
															</tr>
															<tr>
																<td><b>Mother's Name</b></td>
																<td>
                                                           <a href="javascript:;" id="teachermname" data-type="text" data-pk="1" data-value="<?php echo $staff[0]->teacher_mother_name; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/teacher_mother_name';?>" data-original-title="Enter the Father Name"></a>
                                                         </td>
											
															</tr>
															
															<tr>
                                                         <td><b>Spouse Name, if any.</b></td>
                                                         <td>
                                                           <a href="javascript:;" id="teacherspname" data-type="text" data-pk="1" data-value="<?php echo $staff[0]->teacher_spouse_name; ?>"  data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/teacher_spouse_name';?>" data-original-title="Enter the Spouse Name"></a>
                                                         </td>
                                                      </tr>
                                                      
                                                      
													  <tr>
                                                          <td><b>Type of Disability, If any:</b></td>
                                                         <td>
                                                            <a href="javascript:;" id="disabilitytype" data-type="select2" data-pk="1" data-value="<?php echo $staff[0]->disability_type; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/disability_type';?>"  data-original-title="Select the option"></a>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                        <td>
                                                            <b>Differently abled Details(including percentage)</b>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" id="disabilitypercentage" data-value="<?php echo $staff[0]->types_disability; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/types_disability';?>" data-pk="1" data-type="text"></a>
                                                        </td>
                                                      </tr>
													  </tbody>
														</table>
													</span>
													
													<span class="col-md-6">
									  
													<center>
														<h3 class="testimonials-name-in">Joining Details</h3>
													</center>
													<table class="table table-striped" id="user">
														<tbody>
														
														<tr>
														<td><b>Date of Joining in Service</b></td>
														<!--<td><?php echo (date('d-m-Y', strtotime($staff_join))); ?></td>-->
														
														<td><a href="javascript:;" id="datemonthyear" data-type="date"  data-pk="1" data-value="<?php echo $staff[0]->staff_join; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/staff_join';?>" data-original-title="Enter the date"></a></td>
														
														
														 </tr>
														<tr>
															<td><b>Date of Joining in Present Post</b></td>
															<!--<td><?php echo (date('d-m-Y', strtotime($staff_pjoin))); ?></td>-->
															<td>
                                                            <a href="javascript:;" id="datemonthyearpp" data-type="date" data-pk="1" data-value="<?php echo $staff[0]->staff_pjoin; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/staff_pjoin';?>"  data-original-title="Enter the date"></a></td>
														</tr>
														<tr>
															<td><b>Date of Joining in Present School</b></td>
															<!--<td><?php echo (date('d-m-Y', strtotime($staff_psjoin))); ?></td>-->
															<td >
                                                            <a href="javascript:;" id="datemonthyearps" data-type="date" data-pk="1" data-value="<?php echo $staff[0]->staff_psjoin; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/staff_psjoin';?>"  data-original-title="Select the date"></a> 
                                                         </td>
														</tr>
														
														<tr>
                                                         <td><b>GPF/CPS/EPF Details</b></td>
                                                       
														<td>
                                                            <b>Select type of GPF/CPS/EPF</b>
                                                            <a href="javascript:;" id="typeofcps" data-type="select2" data-pk="1" data-value="<?php echo $staff[0]->cps_gps_details; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/cps_gps_details';?>"></a>
                                                            <b>GPF/CPS/EPF Number</b>
                                                            <a href="javascript:;" id="cps_gps" data-type="text" data-pk="1" data-value="<?php echo $staff[0]->cps_gps; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/cps_gps';?>"  data-original-title="Enter the CPS-GPS"></a>
                                                            <b>Suffix</b>
                                                            <a href="javascript:;" id="suffix" data-type="select2" data-pk="1" data-value="<?php echo $staff[0]->suffix; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/suffix';?>"></a>
                                                         </td>
                                                      </tr>
													  
													  <tr>
                                                         <td><b>Nature of appointment:</b></td>
                                                         <td >
                                                            <a href="javascript:;" id="natureofappointment" data-type="select2" data-pk="1" data-value="<?php echo $staff[0]->appointment_nature; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/appointment_nature';?>" data-value="" data-original-title="Select the Appointment nature">  </a> 
                                                         </td>
                                                      </tr>
													  
													  <tr>
                                                         <td><b>Mode of Recruitment:</b></td>
                                                         <td >
                                                            <a href="javascript:;" id="modeofrect" data-type="select2" data-pk="1" data-value="<?php echo $staff[0]->recruit_type; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/recruit_type';?>"data-original-title="Select the Recruitment type"></a> <b>Rank:</b> <a href="javascript:;" id="modeofrankrect" data-type="text" data-pk="1" data-value="<?php echo $staff[0]->recruit_rank; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/recruit_rank';?>" data-value="" data-original-title="Enter the Rank"></a> <b>Year Selection</b> <a href="javascript:;" id="modeofyearrect" data-type="select2" data-pk="1" data-value="<?php echo $staff[0]->recruit_year; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/recruit_year';?>"   data-original-title="Select the Recruitment Year"></a>
                                                         </td>
                                                      </tr>
														<tr>
                                                         <td><b>Designation:</b></td>
                                                         <td >
                                                            <a href="javascript:;" id="teachertype" data-type="select2" data-pk="1"  data-value="<?php echo $staff[0]->teacher_type; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/teacher_type';?>" data-original-title="Select type of teacher"><?php echo $staff[0]->desgination; ?></a> 
                                                         </td>
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
											
												<span class="col-md-6">
                                                <center>
														<h3 class="testimonials-name-in">Communication Details</h3>
													</center>
													<table class="table table-striped" id="user">
														<tr>
                                                          <td><b>Mobile Number:</b></td>
                                                         <td>
                                                            <a href="javascript:;" id="mobilenumber" data-type="text" data-pk="1" data-value="<?php echo $staff[0]->mbl_nmbr; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/mbl_nmbr';?>"  data-original-title="Enter the mobile Number"></a>
                                                         </td>
                                                      </tr>

                                                      <tr>
                                                          <td><b>Email-id:</b></td>
                                                         <td>
                                                            <a href="javascript:;" id="email" data-type="text" data-pk="1" data-value="<?php echo $staff[0]->email_id; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/email_id';?>"  data-original-title="Enter the email-id"></a>
                                                         </td>
                                                      </tr>
													  
													  <tr>
                                                         <td><b>Address:</b></td>
														
                                                         <td >
														 <a href="javascript:;" id="doorno" data-type="text" data-pk="1" data-value="<?php echo $staff[0]->e_prsnt_doorno; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/e_prsnt_doorno';?>"  data-original-title="Enter the doorno"></a>
														 
														 <b> - </b> <a href="javascript:;" id="presentstreet" data-type="text" data-pk="1" data-value="<?php echo $staff[0]->e_prsnt_street;?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/e_prsnt_street';?>"  data-original-title="Enter the street"></a>
														 <b> - </b> <a href="javascript:;" id="presentplace" data-type="text" data-pk="1" data-value="<?php echo $staff[0]->e_prsnt_place; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/e_prsnt_place';?>"  data-original-title="Enter the place"></a><b> - </b><a href="javascript:;" id="district" data-type="select2" data-pk="1" data-value="<?php echo $staff[0]->e_prsnt_distrct;?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/e_prsnt_distrct';?>" data-original-title="Enter the district"><?php echo $staff[0]->district_name;?></a> <b> - </b> <a href="javascript:;" id="pincode" data-type="text" data-pk="1" data-value="<?php echo $staff[0]->e_prsnt_pincode; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/e_prsnt_pincode';?>"  data-original-title="Enter the pincode"></a>.</td>
                                                      </tr>
                                                      
													  <tr>
                                                         <td><b>Aadhar Number</b></td>
                                                         <td>
                                                            <?php echo $staff[0]->aadhar_no;?>        
															<!--<a href="javascript:;" id="aadhar" data-type="text" data-pk="1" data-value="<?php echo $staff[0]->aadhar_no; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/aadhar_no';?>" data-original-title="Enter the adhaar number">  </a> -->
                                                         </td>
                                                      </tr>
													  
													  
													 	
														</tbody>
													</table>
												</span>


											
												
												<span class="col-md-6">
									  
													<center>
														<h3 class="testimonials-name-in">Academic Details</h3>
													</center>
													<table class="table table-striped" id="user">
														<tbody>
															<tr>
															<td><b>Academic:</b></td>
															<td>
                                                            <a href="javascript:;" id="academic" data-type="select2" data-pk="1" data-value="<?php echo $staff[0]->academic; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/academic';?>"  data-original-title="Select the academic"><?php echo $staff[0]->academic_teacher; ?></a> 
                                                         </td>
                                                      </tr>
                                                      <tr>
															<td>
                                                            <b>UG:</b></td>
															<td>
                                                            <a href="javascript:;" id="e_ug" data-type="select2" data-pk="1" data-value="<?php echo $staff[0]->e_ug; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/e_ug';?>"  data-original-title="Select the UG"><?php echo $staff[0]->ug_degree; ?></a> 
                                                            </td>
                                                         </tr>
                                                          <tr>
															<td>
                                                            <b>PG:</b></td>
															<td>
                                                            <a href="javascript:;" id="e_pg" data-type="select2" data-pk="1" data-value="<?php echo $staff[0]->e_pg; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/e_pg';?>"  data-original-title="Select the PG"><?php echo $staff[0]->pg_degree; ?></a> 
                                                            </td>
                                                         </tr>
													  <tr>
                                                      	 <td><b>Professional:</b></td>
                                                         <td>
                                                            <a href="javascript:;" id="professional" data-type="select2" data-pk="1" data-value="<?php echo $staff[0]->tprofessional; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/professional';?>"  data-original-title="Select professional"><?php echo $staff[0]->professional; ?></a>
                                                         </td>
                                                      </tr>
													  <!--<tr>
                                                      	 <td><b>Appointed for Subject:</b></td>
                                                         <td>
                                                            <a href="javascript:;" id="appointsubject" data-type="select2" data-pk="1"  data-value="<?php echo $appointed_subject; ?>" data-url="<?php echo (base_url().'Udise_staff/updateappointsubject/'.$this->uri->segment(3,0));?>"  data-original-title="Enter Appointed for Subject"></a>
                                                         </td>
                                                      </tr>-->
														</tbody>
													</table>
												</span>
											</div>
										</div>
									</div>
										<!--<div class="row">
										<div class="carousel-info container">
											<div class="col-md-12 thumbnail"> 
											
												<span class="col-md-6">
									  
													<center>
														<h3 class="testimonials-name-in">Deputed Details</h3>
													</center>
													<table class="table table-striped" id="user">
														<tbody>
														
                                                      <tr>
                                                      	 <td><b>Place where Teacher Deputed:</b></td>
                                                         <td>
                                                            <a href="javascript:;" id="depplace" data-type="select2" data-pk="1" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/dep_place';?>" data-value="<?php echo $staff[0]->dep_place; ?>" data-original-title="Select Place"></a>
                                                         </td>
                                                      </tr>
													  
													<tr>
                                                      	 <td><b>Office:</b></td>
                                                         <td>
                                                            <b>Place:</b><a href="javascript:;" id="depofficeplace" data-type="select2" data-pk="1" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/dep_off';?>" data-value="<?php echo $staff[0]->dep_off;?>" data-original-title="Select Office"><?php echo $staff[0]->office_name;?></a>
                                                            
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                      	 <td><b>School:</b></td>
                                                         <td>
                                                            <b>District:</b><a href="javascript:;" id="depschooldistrict" data-type="select2" data-pk="1" data-value="<?php echo $staff[0]->dep_scldist;?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/dep_scldist';?>"><?php echo $staff[0]->dctname;?></a>
                                                            <b>Block:</b><a href="javascript:;" id="depschoolblock" data-type="select2" data-pk="1" data-value="<?php echo $staff[0]->dep_sclblk;?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/dep_sclblk';?>"><?php echo $staff[0]->block_name;?></a>
                                                            <br /><b>School:</b><a href="javascript:;" id="depschool" data-type="select2" data-pk="1" data-value="<?php echo  $staff[0]->depschid; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/dep_scl';?>">  <?php echo $staff[0]->depschname.'-'.$staff[0]->depschudise; ?></a>
                                                            
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                      <td><b>Depute from:</b></td>
                                                      <td><a href="javascript:;" id="officeschooldate" data-type="date" data-pk="1" data-value="<?php echo $staff[0]->dep_date; ?>" data-url="<?php echo (base_url().'Udise_staff/UpdateStaffData/'.$this->uri->segment(3,0)).'/dep_date';?>" data-original-title="Select Date"></a></td>
                                                      </tr>
													  
														</tbody>
													</table>
												</span>
											</div>
										</div>
									</div>-->
                                   
                                    
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
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/moment.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/jquery.mockjax.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.js';?>" type="text/javascript"></script>
            
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js';?>" type="text/javascript"></script>
			<script src="<?php echo base_url().'asset/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js';?>" type="text/javascript"></script>
			<script src="<?php echo base_url().'asset/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js';?>" type="text/javascript"></script>
			
            <script src="<?php echo base_url().'asset/js/validations.js'; ?>" type="text/javascript"></script> 

            <!-- Js for hide and show the tables and datas -->
            <script src="<?php echo base_url().'asset/global/plugins/jquery.validate.min.js';?>"></script>
            <script src="<?php echo base_url().'asset/global/plugins/emis2.js';?>" type="text/javascript"></script>
            <!-- Js for hide and show the tables and datas ending-->
            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <!-- END PAGE LEVEL SCRIPTS -->
            
       
            <script>
               var yesno = [];
               $.each({
                   "1": "Yes",
                   "2": "No"        
               }, function(k, v) {
                   yesno.push({
                       id: k,
                       text: v
                   });
               });
               
               
               var depschool = [];
               $.each({
                   <?php 
                    foreach($schools as $pro) { 
                        echo ('"'.$pro->school_id.'":"'.$pro->udise_code."-".htmlspecialchars($pro->school_name).'",'."\n");
                    } 
                    ?> 
                       
               }, function(k, v) {
                   depschool.push({
                       id: k,
                       text: v
                   });
               });
               

               // Deputed school
               $('#depschool').editable({
                   inputclass: 'form-control input-medium',
                   source: depschool,
                   success:function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else
                        toastr.success("School updated sucessfully", "Update Notifications");
                     }, 
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                     /*if(value != "1" && value != "2")
                     {
                     return 'Required Field';
                     }*/
                  }
               });
               
               
               var depschoolblock = [];
               $.each({
                   <?php 
                    foreach($schoolblk as $pro) { 
                        echo ('"'.$pro->id.'":"'.$pro->block_name.'",');
                    } 
                    ?> 
                       
               }, function(k, v) {
                   depschoolblock.push({
                       id: k,
                       text: v
                   });
               });
               

               // Deputed block 
               $('#depschoolblock').editable({
                   inputclass: 'form-control input-medium',
                   source: depschoolblock,
                   success:function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else
                        toastr.success("Block updated sucessfully", "Update Notifications");
                     }, 
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                     /*if(value != "1" && value != "2")
                     {
                     return 'Required Field';
                     }*/
                  }
               });
               
               var depplace = [];
               $.each({
                   "1": "Office",
                   "2": "School"
                       
               }, function(k, v) {
                   depplace.push({
                       id: k,
                       text: v
                   });
               });
               

               // Gender 
               $('#depplace').editable({
                   inputclass: 'form-control input-medium',
                   source: depplace,
                   success:function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else
                        toastr.success("Deputed updated sucessfully", "Update Notifications");
                     }, 
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                     if(value != "1" && value != "2")
                     {
                     return 'Required Field';
                     }
                  }
               });
               
                var depschooldistrict = [];
               $.each({
				   <?php 
                    foreach($schooldist as $pro) { 
                        echo ('"'.$pro->id.'":"'.$pro->district_name.'",');
                    } 
                    ?> 
						
               }, function(k, v) {
                   depschooldistrict.push({
                       id: k,
                       text: v
                   });
               });
              
               
                 // district 
               $('#depschooldistrict').editable({
                   inputclass: 'form-control input-medium',
                   source: depschooldistrict,
                   success:function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else{
                        //document.getElementById('depschooldistrict').setAttribute('data-value',result.district);
                        toastr.success("District updated sucessfully", "Update Notifications");
                     }
                     }, 
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                     if(value != "1" && value != "2" && value != "3" && value != "4" && value != "5" && value != "6" && value != "7" && value != "8" && value != "9" && value != "10" && value != "11" && value != "12" && value != "13" && value != "14" && value != "15" && value != "16" && value != "17" && value != "18" && value != "19" && value != "20" && value != "21" && value != "22" && value != "23" && value != "24" && value != "25" && value != "26" && value != "27" && value != "28" && value != "29" && value != "30" && value != "31" && value != "32")
                     {
                     return 'Required Field';
                     }
                  }
               });
               
               
               var depofficeplace = [];
               $.each({
                   <?php 
                    foreach($office as $pro) { 
                        echo ('"'.$pro->id.'":"'.$pro->office_name.'",');
                    } 
                    ?> 
                       
               }, function(k, v) {
                   depofficeplace.push({
                       id: k,
                       text: v
                   });
               }); 
               
               $('#depofficeplace').editable({
                   inputclass: 'form-control input-medium',
                   source: depofficeplace,
                   success:function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else
                        toastr.success("Deputed Office updated sucessfully", "Update Notifications");
                     }, 
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                     /*if(value != "1" && value != "2" && value != "3")
                     {
                     return 'Required Field';
                     }*/
                  }
               });
               
               
               $('#officeschooldate').editable({
			type: 'date',
			success: function(response, newValue) {
			// alert(newValue);
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("Depute Date Successfully", "Update Notifications");

            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             },validate: function(value){
                        if(/[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1]) (2[0-3]|[01][0-9]):[0-5][0-9]/.test(value))
                       {
                           return 'Enter Date/Month/Year only';
                       }
                       else if(! /[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1]) (2[0-3]|[01][0-9]):[0-5][0-9]/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                       }
                   }
			});
               
               
               
               var gender = [];
               $.each({
                   "1": "Male",
                   "2": "Female",
                   "3": "Transgender"        
               }, function(k, v) {
                   gender.push({
                       id: k,
                       text: v
                   });
               });
               

               // Gender 
               $('#gender').editable({
                   inputclass: 'form-control input-medium',
                   source: gender,
                   success:function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else
                        toastr.success("Gender updated sucessfully", "Update Notifications");
                     }, 
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                     if(value =="")
                     {
                     return 'Required Field';
                     }
                  }
               }); 



                var socialcategory = [];
               $.each({
                    <?php 
                    foreach($teachersocial as $pro) { 
                        echo ('"'.$pro->id.'":"'.$pro->social_cat.'",');
                    } 
                    ?>          
               }, function(k, v) {
                   socialcategory.push({
                       id: k,
                       text: v
                   });
               });

               // social category 
               $('#socialcategory').editable({
                   inputclass: 'form-control input-medium',
                   source: socialcategory,
                   success:function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else
                        toastr.success("Social Category updated sucessfully", "Update Notifications");
                     }, 
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                     if(value =="")
                     {
                     return 'Required Field';
                     }
                  }
               });

				
				 var bloodgroup = [];
               $.each({
                   <?php 
                    foreach($bloodgroup as $pro) { 
                        echo ('"'.$pro->id.'":"'.$pro->group.'",');
                    } 
                    ?> 
                  				   
               }, function(k, v) {
                   bloodgroup.push({
                       id: k,
                       text: v
                   });
               });

                // blood group
               $('#bloodgroup').editable({
                   inputclass: 'form-control input-medium',
                   source: bloodgroup,
                   success:function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else
                        toastr.success("Blood group updated sucessfully", "Update Notifications");
                     }, 
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                     if(value =="")
                     {
                     return 'Required Field';
                     }
                  }
               }); 
				
				
				

                var teachertype = [];
               $.each({
                   <?php 
                    foreach($staff_cat as $pro) { 
                        echo ('"'.$pro->id.'":"'.$pro->type_teacher.'",');
                    } 
                    ?> 
               }, function(k, v) {
                   teachertype.push({
                       id: k,
                       text: v
                   });
               });

                // teacher Type
               $('#teachertype').editable({
                   inputclass: 'form-control input-medium',
                   source: teachertype,
                   success:function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else
                        toastr.success("Teacher type updated sucessfully", "Update Notifications");
                     }, 
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                     if(value =="")
                     {
                     return 'Required Field';
                     }
                  }
               }); 

				
				 // Mode of Recruitment
               var modeofrect = [];
               $.each({
                   "TNPSC": "TNPSC",
                   "TRB": "TRB",
                   "Compassionate Grounds": "Compassionate Grounds",
				   "Transfer of Services": "Transfer of Services",
				   "Outsourcing": "Outsourcing",
				   "Employment Seniority": "Employment Seniority",
				   "Retrenched Census Employees": "Retrenched Census Employees",
                   "Management": "Management"
               }, function(k, v) {
                   modeofrect.push({
                       id: k,
                       text: v
                   });
               });

               // Mode of Recruitment
               $('#modeofrect').editable({
                   inputclass: 'form-control input-medium',
                   source: modeofrect,
                   success:function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else
                        toastr.success("Mode of Recruitment updated sucessfully", "Update Notifications");
                     }, 
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                     if(value == "")
                     {
                     return 'Required Field';
                     }
                  }
               });

               // nature of appointment
               var natureofappointment = [];
               $.each({
                   "1": "Regular",
                   "2": "Contract",
                   "3": "Part-Time"
               }, function(k, v) {
                   natureofappointment.push({
                       id: k,
                       text: v
                   });
               });

               // Nature of appointment
               $('#natureofappointment').editable({
                   inputclass: 'form-control input-medium',
                   source: natureofappointment,
                   success:function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else
                        toastr.success("Nature of Appointment updated sucessfully", "Update Notifications");
                     }, 
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                     if(value == "")
                     {
                     return 'Required Field';
                     }
                  }
               });

               // Academic
               var academic = [];
               $.each({
                    <?php 
                    foreach($academic as $pro) { 
                        echo ('"'.$pro['id'].'":"'.$pro['academic_teacher'].'",');
                    } 
                    ?> 
                    
               
               }, function(k, v) {
                   academic.push({
                       id: k,
                       text: v
                   });
               });

               // Academic
               $('#academic').editable({
                   inputclass: 'form-control input-medium',
                   source: academic,
                   success:function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else
                        toastr.success("Academic updated sucessfully", "Update Notifications");
                     }, 
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                     if(value == "")
                     {
                     return 'Required Field';
                     }
                  }
               });
                
               
                   // UG
               var e_ug = [];
               $.each({
                   <?php 
                    foreach($ug as $pro) { 
                        echo ('"'.$pro->id.'":"'.$pro->ug_degree.'",');
                    } 
                    ?> 
               }, function(k, v) {
                   e_ug.push({
                       id: k,
                       text: v
                   });
               });

               // ug
               $('#e_ug').editable({
                   inputclass: 'form-control input-medium',
                   source: e_ug,
                   success:function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else
                        toastr.success("UG updated sucessfully", "Update Notifications");
                     }, 
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                     if(value ="")
                     {
                     return 'Required Field';
                     }
                  }
               });
               
               
                // PG
               var e_pg = [];
               $.each({
                   <?php 
                    foreach($pg as $pro) { 
                        echo ('"'.$pro->id.'":"'.$pro->pg_degree.'",');
                    } 
                    ?> 
               }, function(k, v) {
                   e_pg.push({
                       id: k,
                       text: v
                   });
               });

               // pg
               $('#e_pg').editable({
                   inputclass: 'form-control input-medium',
                   source: e_pg,
                   success:function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else
                        toastr.success("UG updated sucessfully", "Update Notifications");
                     }, 
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                     if(value ="")
                     {
                     return 'Required Field';
                     }
                  }
               }); 
               
                
               
               
                
               // Professional
               var professional = [];
               $.each({
                   <?php 
                    foreach($professional as $pro) { 
                        echo ('"'.$pro->id.'":"'.$pro->professional.'",');
                    } 
                    ?> 
                   
               }, function(k, v) {
                   professional.push({
                       id: k,
                       text: v
                   });
               });

               // professional
               $('#professional').editable({
                   inputclass: 'form-control input-medium',
                   source: professional,
                   success:function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else
                        toastr.success("Professional updated sucessfully", "Update Notifications");
                     }, 
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                     if(value == "")
                     {
                     return 'Required Field';
                     }
                  }
               });
               
                      

             

                var district = [];
               $.each({
				  <?php 
                    foreach($schooldist as $pro) { 
                        echo ('"'.$pro->id.'":"'.$pro->district_name.'",');
                    } 
                    ?> 
						
               }, function(k, v) {
                   district.push({
                       id: k,
                       text: v
                   });
               });
               

               // district 
               $('#district').editable({
                   inputclass: 'form-control input-medium',
                   source: district,
                   success:function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else
                        toastr.success("District updated sucessfully", "Update Notifications");
                     }, 
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                     if(value == "")
                     {
                     return 'Required Field';
                     }
                  }
               });



             
			   

             
			   $('#modeofrankrect').editable({
            type: 'text',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("Rank Updated Successfully", "Update Notifications");

            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             },validate: function(value){
                        if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only ';
                       }
                       else if(! /^\d{1,5}$/.test(value)){
                           if((value).length<1){
                              return 'Required Field';
                           }
                           else if((value).length>5){
                            return 'Please enter no more than 5 characters';
                         }
                       }
                   }
        });

               // techer name
                $('#teachername').editable({
            type: 'text',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("Teachers Name Updated Successfully", "Update Notifications");

            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             },validate: function(value){
                       if(/[^a-z A-Z]/.test(value))
                       {
                           return 'Enter Text only ';
                       }
                       else if(! /^\d{1,50}$/.test(value)){
                           if((value).length<1){
                              return 'Required Field';
                           }
                           else if((value).length>50){
                            return 'Please enter no more than 50 characters';
                         }
                           // return 'Please enter no more than 10 characters';
                       }
                   }
        });


               $('#teacherfname').editable({
            type: 'text',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("Teachers Father's Name Updated Successfully", "Update Notifications");

            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             },validate: function(value){
                       if(/[^a-z A-Z]/.test(value))
                       {
                           return 'Enter Text only ';
                       }
                       else if(! /^\d{1,30}$/.test(value)){
                           if((value).length<1){
                              return 'Required Field';
                           }
                           else if((value).length>30){
                            return 'Please enter no more than 30 characters';
                         }
                           // return 'Please enter no more than 10 characters';
                       }
                   }
        });



               $('#teachermname').editable({
            type: 'text',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("Teachers Mother's Name Updated Successfully", "Update Notifications");

            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             },validate: function(value){
                        if(/[^a-z A-Z]/.test(value))
                       {
                           return 'Enter Text only ';
                       }
                       else if(! /^\d{1,30}$/.test(value)){
                           if((value).length<1){
                              return 'Required Field';
                           }
                           else if((value).length>30){
                            return 'Please enter no more than 30 characters';
                         }
                       }
                   }
        });

               $('#teacherspname').editable({
            type: 'text',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("Teachers Spouse Name Updated Successfully", "Update Notifications");

            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             },validate: function(value){
                        if(/[^a-z A-Z]/.test(value))
                       {
                           return 'Enter Text only';
                       }
                       else if(! /^\d{1,30}$/.test(value)){
                           if((value).length<1){
                              return 'Required Field';
                           }
                           else if((value).length>30){
                            return 'Please enter no more than 30 characters';
                         }
                       }
                   }
        });
		
		$('#doorno').editable({
            type: 'text',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("House/Door no updated Successfully", "Update Notifications");

            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             },validate: function(value){
                        if(/[^a-z A-Z 0-9 !@#$&()\\-`.+,\/"]/.test(value))
                       {
                           return 'Enter valid address only ';
                       }
                       else if(! /^\d{1,200}$/.test(value)){
                           if((value).length<1){
                              return 'Required Field';
                           }
                           else if((value).length>200){
                            return 'Please enter no more than 30 characters';
                         }
                       }
                   }
        });
		
		$('#presentstreet').editable({
            type: 'text',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("Present Street Updated Successfully", "Update Notifications");

            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             },validate: function(value){
                        if(/[^a-z A-Z 0-9 !@#$&()\\-`.+,\/"]/.test(value))
                       {
                           return 'Enter valid address only ';
                       }
                       else if(! /^\d{1,200}$/.test(value)){
                           if((value).length<1){
                              return 'Required Field';
                           }
                           else if((value).length>200){
                            return 'Please enter no more than 30 characters';
                         }
                       }
                   }
        });
		
		
		$('#presentplace').editable({
            type: 'text',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("Present Place Updated Successfully", "Update Notifications");

            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             },validate: function(value){
                        if(/[^a-z A-Z 0-9 !@#$&()\\-`.+,\/"]/.test(value))
                       {
                           return 'Enter valid address only ';
                       }
                       else if(! /^\d{1,200}$/.test(value)){
                           if((value).length<1){
                              return 'Required Field';
                           }
                           else if((value).length>200){
                            return 'Please enter no more than 30 characters';
                         }
                       }
                   }
        });
		
		
		$('#pincode').editable({
            type: 'text',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("Pincode Updated Successfully", "Update Notifications");

            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             },validate: function(value){
                        if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only ';
                       }
                       else if(! /^\d{1,6}$/.test(value)){
                           if((value).length<1){
                              return 'Required Field';
                           }
                           else if((value).length>6){
                            return 'Please enter no more than 6 characters';
                         }
                       }
                   }
        });


                $('#aadhar').editable({
            type: 'text',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("Aadhar Updated Successfully", "Update Notifications");

            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             },validate: function(value){
                        if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,12}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 12 characters';
                       }
                   }
        });

         // CPS
               var typeofcps = [];
               $.each({
                   "GPF": "GPF",
                   "CPS": "CPS",
                   "Applied": "Applied",
                   "Not Applicable": "Not Applicable",
                   "EPF": "EPF"
                   
               }, function(k, v) {
                   typeofcps.push({
                       id: k,
                       text: v
                   });
               });

             
               $('#typeofcps').editable({
                   inputclass: 'form-control input-medium',
                   source: typeofcps,
                   success:function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else
                        toastr.success("GPF/CPS/EPF Type updated sucessfully", "Update Notifications");
                     }, 
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                     if(value == "")
                     {
                     return 'Required Field';
                     }
                  }
               });



             $('#cps_gps').editable({
            type: 'text',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("CPS-GPS Updated Successfully", "Update Notifications");

            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             },validate: function(value){
                        if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,30}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 30 characters';
                       }
                   }
        });
        
        
          // suffix
               var suffix = [];
               $.each({
                  <?php 
                    foreach($suffix as $pro) { 
                        echo ('"'.$pro->id.'":"'.$pro->suffix.'",');
                    } 
                    ?> 
                   
               }, function(k, v) {
                   suffix.push({
                       id: k,
                       text: v
                   });
               });

             
               $('#suffix').editable({
                   inputclass: 'form-control input-medium',
                   source: suffix,
                   success:function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else
                        toastr.success("Suffix updated sucessfully", "Update Notifications");
                     }, 
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                     if(value == "")
                     {
                     return 'Required Field';
                     }
                  }
               });
		
		$('#dob').editable({
			type: 'date',
			success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("Staffjoin Updated Successfully", "Update Notifications");

            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             },validate: function(value){
                        if(/[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1]) (2[0-3]|[01][0-9]):[0-5][0-9]/.test(value))
                       {
                           return 'Enter Date/Month/Year only';
                       }
                       else if(! /[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1]) (2[0-3]|[01][0-9]):[0-5][0-9]/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                       }
                   }
			});
			
		
			
			
			
			//Year of Recruitment
               var modeofyearrect = [];
               $.each({
                   <?php
                                                              $year=date('Y');
                                                              $min=$year-42;
                                                              $max=$year+1;
                                                              for($i=$min;$i<$max;$i++)
                                                              {
                                                                 echo ('"'.$i.'":"'.$i.'",');
                                                                }?>
               }, function(k, v) {
                   modeofyearrect.push({
                       id: k,
                       text: v
                   });
               });
			
				$('#modeofyearrect').editable({
                   inputclass: 'form-control input-medium',
                   source: modeofyearrect,
                   success:function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else
                        toastr.success("Year Selection updated sucessfully", "Update Notifications");
                     }, 
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                     if(value == "")
                     {
                     return 'Required Field';
                     }
                  }
               });
			
			

			
		
		 $('#datemonthyear').editable({
			type: 'date',
			success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("Staffjoin Updated Successfully", "Update Notifications");

            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             },validate: function(value){
                        if(/[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1]) (2[0-3]|[01][0-9]):[0-5][0-9]/.test(value))
                       {
                           return 'Enter Date/Month/Year only';
                       }
                       else if(! /[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1]) (2[0-3]|[01][0-9]):[0-5][0-9]/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                       }
                   }
			});
			
			$('#datemonthyearpp').editable({
			type: 'date',
			success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("Staffjoin Present Post Updated Successfully", "Update Notifications");

            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             },validate: function(value){
                        if(/[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1]) (2[0-3]|[01][0-9]):[0-5][0-9]/.test(value))
                       {
                           return 'Enter Date/Month/Year only';
                       }
                       else if(! /[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1]) (2[0-3]|[01][0-9]):[0-5][0-9]/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                       }
                   }
			});
			
			$('#datemonthyearps').editable({
			type: 'date',
			success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("Staffjoin Present school Updated Successfully", "Update Notifications");

            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             },validate: function(value){
                        if(/[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1]) (2[0-3]|[01][0-9]):[0-5][0-9]/.test(value))
                       {
                           return 'Enter Date/Month/Year only';
                       }
                       else if(! /[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1]) (2[0-3]|[01][0-9]):[0-5][0-9]/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                       }
                   }
			});



            // training Need
               var trainingneed = [];
               $.each({
                   "1": "Subject knowledge",
                   "2": "Pedagogical Issues",
                   "3": "ICT Skills",
                   "4": "Knowledge and skills to engage with CWSN",
                   "5": "Leadership and management"
               }, function(k, v) {
                   trainingneed.push({
                       id: k,
                       text: v
                   });
               });

               // training Need
               $('#trainingneed').editable({
                   inputclass: 'form-control input-medium',
                   source: trainingneed,
                   success:function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else
                        toastr.success("Training Need updated sucessfully", "Update Notifications");
                     }, 
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                     if(value != "1" && value != "2" && value != "3" && value != "4" && value != "5")
                     {
                     return 'Required Field';
                     }
                  }
               });

                $('#workngspntnontechassign').editable({
            type: 'text',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("Working Days spend Updated Successfully", "Update Notifications");

            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             },validate: function(value){
                        if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,6}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 6 characters';
                       }
                   }
        });


              
            
        


                // Disability type
               var disability = [];
               $.each({
                   "1": "Not applicable",
                   "2": "Physical Handicaped",
                   "3": "Visual Blind",
                   "4": "Deaf and Dumb"
               }, function(k, v) {
                   disability.push({
                       id: k,
                       text: v
                   });
               });

               // Disability type
               $('#disabilitytype').editable({
                   inputclass: 'form-control input-medium',
                   source: disability,
                   success:function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else
                        toastr.success("Type of Disability updated sucessfully", "Update Notifications");
                     }, 
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
                    },
                   validate: function(value){
                     if(value =="")
                     {
                     return 'Required Field';
                     }
                  }
               });

           

               $('#mobilenumber').editable({
            type: 'text',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("Mobile Number Updated Successfully", "Update Notifications");

            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             },validate: function(value){
                        if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{10}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Enter Proper mobile Number';
                       }
                   }
        }); 


            // email
            $('#email').editable({
            type: 'text',
            // pk: 1,
            // name: 'schoolemailid',
            // title: 'Mention the school email id',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("Email-Id Updated Successfully", "Update Notifications");

            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },validate: function(value){
                       if(!/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/.test(value))
                       {
                           return 'Enter Valid Email';
                       }
                       else if(!/^\d{1,50}$/.test(value)){
                             // return 'Please enter no more than 50 characters';
                           if((value).length<1){
                              return 'Required Field';
                           }
                           else if((value).length>50){
                            return 'Please enter no more than 50 characters';
                         }
                       }
                      
                   }
        });
        
        
        
         $('#disabilitypercentage').editable({
            type: 'text',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("Disability Percentage Updated Successfully", "Update Notifications");

            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';

             },validate: function(value){
                        if(/[^a-z 0-9 A-Z]/.test(value))
                       {
                           return 'Enter Text only';
                       }
                       else if(! /^\d{1,100}$/.test(value)){
                           if((value).length<1){
                              return 'Required Field';
                           }
                           else if((value).length>100){
                            return 'Please enter no more than 100 characters';
                         }
                       }
                   }
        });
        
        

            $("#updatestaff").validate({

    
    rules: {
        // emis_reg_staff_teachercode:{
        //   // required:false,
        //   // teachercode:true,
        //   // maxlength:30
        // },
        emis_reg_staff_date:{
            required:true,
            customvalidationselectfield:true
        },
        emis_reg_staff_month:{
           required:true,
            customvalidationselectfield:true
        },
        emis_reg_staff_year:{
            required:true,
            customvalidationselectfield:true
        },
        emis_reg_staff_joindate:{
            required:true,
            customvalidationselectfield:true
        },
        emis_reg_staff_joinmonth:{
           required:true,
            customvalidationselectfield:true
        },
        emis_reg_staff_joinyear:{
            required:true,
            customvalidationselectfield:true
        },

        },

        messages: {
            

            emis_reg_staff_email:{
                        required:"Please enter your email",
                        email   :"your mail id should be in this format name@domain.com"
            }


         
        },

             onfocusout: function(element) {
            this.element(element);
        }
        
   });

             $.validator.addMethod("customvalidationselectfield",
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
                     return /^[0-9a-zA-Z]+$/.test(value);
               },
               "Allowed alphanumeric only");






               // jquery for enable and disable the textbox
               $('#user .editable').editable('toggleDisabled');
               
                   // init editable toggler
                   $('#enable1').click(function() {
                       $('#user .editable').editable('toggleDisabled');
                       $("#myFieldset").prop('disabled', function () {
                           return ! $(this).prop('disabled');
                           });
                       $("input").prop('disabled',function(){
                           return ! $(this).prop('disabled');
                       });
                        $("select").prop('disabled',function(){
                           return ! $(this).prop('disabled');
                       });

                        $("#staff_join,#emis_reg_staff_date,#emis_reg_staff_month,#emis_reg_staff_year,#emis_reg_staff_joindate,#emis_reg_staff_joinmonth,#emis_reg_staff_joinyear,#stafftb1,#stafftb2,#stafftb3,#stafftb4,#stafftb5,#stafftb6,#stafftb7,#btn").toggle();
                   });
               
               $(document).ready(function(){
                   $("input").prop("disabled",true);
               });
                $(document).ready(function(){
                            $("select").prop("disabled",true);
                      });
               
                 
               
            </script>
         </body>
      </html>