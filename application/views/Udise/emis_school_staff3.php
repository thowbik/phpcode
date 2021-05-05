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


.sweet-alert {
    background-color: #ffffff;
    width: 478px;
    padding: 17px;
    border-radius: 5px;
    text-align: center;
    position: fixed;
    left: 50%;
    top: 50%;
    margin-left: -256px;
    margin-top: -200px;
    overflow: hidden;
    display: none;
    z-index: 100000000000000!important;
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
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
               <link href="<?php echo base_url().'asset/js/croppie-VIT/croppie.css'?>" rel="stylesheet" type="text/css"/>
        <?php $this->load->view('head.php'); ?>
            
			
        

  </head>
         <!-- END HEAD -->
         <body class="page-container-bg-solid page-md">
            <div class="page-wrapper">
                <?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
               <?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
               <?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 9) { ?>
               <?php $this->load->view('Ceo_District/header.php'); }else if($this->session->userdata('emis_user_type_id') == 6) { ?>
               <?php $this->load->view('beo_Block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 10) { ?>
               <?php $this->load->view('Deo_District/header.php'); }else{ ?>
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
                                    <h1>Staff List
                                       <small>Created Staff List</small>
                                    </h1>
                                 </div>
                                 <!-- END PAGE TITLE -->
                                 <!-- BEGIN PAGE TOOLBAR -->
                                 <div class="page-toolbar">
                                   <?php
                                    if($this->session->flashdata('teacher_update')) {
$message = $this->session->flashdata('teacher_update');

// echo $message;

  
                                     ?>
                                   <div class="alert alert-success" style="width: 300px;"><button class="close" data-close="alert"></button>
                                <?=$message;?></div>
                                    <!-- BEGIN THEME PANEL -->
                                    <!-- END THEME PANEL -->
                                  <?php } ?>
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
                                    <!-- <?php $this->load->view('emis_school_profile_header1.php'); ?> -->
                                    <!-- <div class="m-heading-1 border-green m-bordered">
                                       <h3>Basic Information</h3>
                                       </div> -->
                                    <br>
                                    
                                    <ul class="nav nav-tabs" style="text-align: center;">
                                        <li class="active"><a data-toggle="tab" onclick="view('schoolstaff');">School Staff</a></li>
                                        <li><a data-toggle="tab" onclick="view('deputedstaff');">Staff on Deputation</a></li>
                                        <li><a data-toggle="tab" onclick="view('volunteerteacher');">Volunteer Teacher</a></li>
                                    </ul>
									
									<div class="tabcontent portlet-body" id="schoolstaff">
                                           
                                            <div class="row">
											
												<div class="col-md-12">
													<div class="portlet box green">
														<div class="portlet-title">
																<!--<div class="caption">
																<i class="fa fa-globe"></i>Teacher Details - List</div>-->
																<div class="caption">
                                                                <i class="fa fa-globe"></i>
                                                                Staff List
																 
																
																
				              <span style="padding-left:500px;">
							          <?php if($this->session->userdata('emis_user_type_id') == 1 ) { ?> 
                           <a href="<?php echo base_url().'Udise_staff/emis_school_staffsearching';?>" 
                                   class="dt-button buttons-print btn default" 
                                                                        > 
                                                                             Fetch 
                                                                        </a>
                                                          <?php } ?>         
																	</span>
																	
							  
							 <!-- <a href="<?php echo base_url().'Udise_staff/emis_school_staffcurd';?>" 
                                   class="btn btn-sm green delete-class-section" 
                                                                        > 
                                                                             Curd
                                                                        </a>-->
							 
                           
                                                                   
																	
                                                            </div>
															
																<div class="tools"> </div>
															</div>

															<div class="portlet-body">
															
															
															<table class="table table-striped table-bordered table-hover" id="sample_3">
															<thead>
															<tr>
															<th>Sno</th>
                              <th>Name</th>
															<th>Category</th>
															<th>Designation</th>
															<th>Professional</th>
                              <th>Main Subjects</th>                         
															<th>DOJ(Present School)</th>
                              <th>Deputation Status</th>
                              <th class="detail">Teacher code</th>
                              <th class="detail">Aadhaar Number</th>
                              <th class="detail">Blood group</th>
                              <th class="detail">Social Category</th>
                              <th class="detail">Father's Name</th>
                              <th class="detail">Mother's Name</th>
                              <th class="detail">Appointed for the Subject</th>
                              <th class="detail">Differently abled</th>
                              <th class="detail">Differently abled Details</th>
                              <th class="detail">Spouse Name</th>
                              <th class="detail">DOJ in Service</th>
                              <th class="detail">DOJ in Present Post</th>
                              <th class="detail">Staff DOB</th>
                              <th class="detail">GPF/CPS/EPF Detail</th>
                              <th class="detail">GPF/CPS/EPF Number</th>
                              <th class="detail">Suffix</th>
                              <th class="detail">Mode of Recruitment</th>
                              <th class="detail">Recruitment Rank</th>
                              <th class="detail">Year Selection</th>
                              <th class="detail">Nature of appointment</th>
                              <th class="detail">Mobile Number</th>
                              <th class="detail">E--Mail Id</th>
                              <th class="detail">Door no. / Building Name</th>
                              <th class="detail">Street Name / Area Name</th>
                              <th class="detail">City name / Village Name</th>
                              <th class="detail">District</th>
                              <th class="detail">Pincode</th>
                              <th class="detail">Academic</th>
                              <th class="detail">UG</th>
                              <th class="detail">PG</th>
                              <th class="detail">Professional</th>
                              <th class="detail">Subject 1</th>
                              <th class="detail">Subject 2</th>
                              <th class="detail">Subject 3</th>

                              <th>Transfer</th>															 
                              <th>PDF</th> 
                              <th>Deputation</th>  
                              <th>Photo</th>                      
															</tr>
															</thead>
															<tbody>
															<?php  $i=1; ?>
                                                               <?php  foreach($staffdetails as $sd) {  ?>
															   
                                                               <tr>
                                                                    <td><?php echo $i;  ?> </td>
                                                                      <?php 
                                                                        $u_id = $sd->u_id;
                                                                       
                                                                       ?>
                                                                    <td>
																	
																	<a href="javascript:void(0)" onclick="staff_edit(<?=$sd->u_id?>);"><?php echo $sd->teacher_name;  ?></a>
																	 </td>
																	 
																    <td>
                                                                    <?php $category = $sd->category;
                                                                        if($category ==1) echo 'Teaching'; else echo 'Non-Teaching';
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                      <?php echo $sd->desgination; ?>
                                                                    </td>
                                                                    
                                                                    <td><?php echo $sd->professional; ?></td>
                                                                    <td><?php echo $sd->appsub; ?></td>
                                                                    
                                                                    
                                                                    <td>
                                                                        <?php 
                                                                            $staff_psjoin= $sd->staff_psjoin;
                                                                            echo (date('d-m-Y', strtotime($staff_psjoin)));
                                                                        ?>
                                                                     </td>
                                                                     <td>
                                                                        <?php if($sd->depute_todate =='0000-00-00'){echo 'On Deputation';}else{
                                                                        echo 'In School';}?>
                                                                     </td>
                                    <td ><?php echo $sd->teacher_code; ?></td>
                                    <td><?=$sd->aadhar_no;?></td>
                                    <td><?=$sd->group;?></td>
                                    <td><?=$sd->social_cat;?></td>
                                    <td><?=$sd->e_prnts_nme;?></td>
                                    <td><?=$sd->teacher_mother_name;?></td>
                                    <td><?=$sd->appsub;?></td>
                                    <td><?php 

                                    $dist_type = $sd->disability_type;
                                    $dist_name = '';
                                    switch ($dist_type) {
                                        case 1:
                                        $dist_name = 'Not applicable';
                                        break;
                                        case 2:
                                        $dist_name = 'Physically Challenged';
                                        break;
                                        case 3:
                                        $dist_name = 'Visually Impaired';
                                        break;

                                        default:
                                        $dist_name= '';
                                        break;

                                    }
                                    echo $dist_name;

                                    ?></td>

                                    <td><?=($sd->types_disability!=0?$sd->types_disability:'--');?></td>
                                    <td><?=$sd->teacher_spouse_name;?></td>
                                    <td><?=date('d-m-Y',strtotime($sd->staff_join));?></td>
                                    <td><?=date('d-m-Y',strtotime($sd->staff_pjoin));?></td>
                                    <td><?=date('d-m-Y',strtotime($sd->staff_dob));?></td>
                                    <td><?=$sd->cps_gps_details;?></td>
                                    <td><?=$sd->cps_gps;?></td>
                                    <td><?=$sd->suf_name;?></td>
                                    <td><?=$sd->recruit_type;?></td>
                                    <td><?=$sd->recruit_rank;?></td>
                                    <td><?=$sd->recruit_year;?></td>
                                    <td><?php 

                                    $nature_sub = $sd->appointment_nature;
                                    $nature_sub_name = '';
                                      switch ($nature_sub) {
                                          case 1:
                                          $nature_sub_name='Regular';
                                          break;
                                          case 2:
                                          $nature_sub_name='Contract';
                                          break;
                                          case 3:
                                          $nature_sub_name='Part-Time';
                                          break;
                                        
                                        default:
                                          $nature_sub_name = '';
                                          break;
                                      }
                                      echo $nature_sub_name;
                                    ?></td>
                                    <td><?=$sd->mbl_nmbr;?></td>
                                    <td><?=$sd->email_id;?></td>
                                    <td><?=$sd->e_prsnt_doorno;?></td>
                                    <td><?=$sd->e_prsnt_street;?></td>
                                    <td><?=$sd->e_prsnt_place;?></td>
                                    <td><?=$sd->district_name;?></td>

                                    <td><?=$sd->e_prsnt_pincode;?></td>
                                    <td><?=$sd->academic_teacher;?></td>
                                    <td><?=$sd->ug_degree;?></td>
                                    <td><?=$sd->pg_degree;?></td>
                                    <td><?=$sd->professional;?></td>
                                    <td><?=$sd->ts1;?></td>
                                    <td><?=$sd->ts2;?></td>
                                    <td><?=$sd->ts3;?></td>



                                     <td>
                                     <a href="javascript:;" onclick="transferactivate('<?php echo $sd->u_id; ?>','<?php echo $sd->teacher_code; ?>');" class=" edit-class-section" data-class-section-id ="<?php echo $sd->u_id;  ?>"> <i class="fa fa-exchange"></i></a>
                                     </td>
                                     <td><a href="<?=base_url().'Udise_staff/generate_staff_pdf/'.$sd->u_id?>"><i class="fa fa-file-pdf-o"></i></a></td>
                                      <td><a data-toggle="modal" data-target="#exampleModal" onclick="deputation('<?php echo $sd->teacher_code; ?>')"><i class="fa fa-users"></i></a></td>
                                  <td><?=($sd->photo !=null?'Yes':'No')?></td>
                                                               </tr>
                                                               <?php $i++;  }  ?>
                                                      
														</tbody>
														</table>
																							 
														</div>
													</div>
												</div>
											
											</div>
											
                                        </div>
                                        
                                        <div id="deputedstaff" class="tabcontent" style="display: none;">
                                             <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                             <i class="fa fa-globe"></i>Deputation Staff Details</div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover" id="sample_3">
															<thead>
                                                                <tr>
                                                                    <th>Sno</th>
                                                                    <th>Name</th>
                                                                    <th>Category</th>
                                                                    <th>Designation</th>
                                                                    <!--<th>Appointed Subjects</th>-->
																	<th>Subjects</th>
                                                                    <th>Deputed From</th>
                                                                    <th>From Date</th>
                                                                    <th>To Date</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i=1; foreach($deputedetails as $depute) { ?>
                                                                <tr>
                                                                    <td><?php echo $i++; ?></td>
                                                                    <td><?php echo $depute->teacher_name; ?></td>
                                                                    <td><?php echo $depute->category; ?></td>
                                                                    <td><?php echo $depute->type_teacher; ?></td>
                                                                    <!--<td><?php echo $depute->subjects; ?></td>-->
																	<td><?php echo $depute->s1; ?>&nbsp;,&nbsp;<?php echo $depute->s2; ?>&nbsp;,&nbsp;<?php echo $depute->s3; ?></td>
                                                                    <td><?php echo $depute->school_name; ?></td>
                                                                    <td><?php echo date("d-m-Y",strtotime($depute->depute_frmdate)); ?></td>
                                                                    <td><?php if(!empty($depute->depute_todate) && $depute->depute_todate!='0000-00-00')
																	{ echo date("d-m-Y",strtotime($depute->depute_todate));}else{ echo '0000-00-00';} ?></td>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                                    <tfoot>
                                                                    </tfoot>
                                                        </table>
                                                    </div>
                                             </div>
                                                    
                                            
                                            
                                            
                                        </div>
                                        <div id="volunteerteacher" class="tabcontent" style="display: none;">
                                            <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                             <i class="fa fa-globe"></i>Volunteer Teacher Details</div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover" id="sample_3">
															<thead>
                                                                <tr>
                                                                    <th>Sno</th>
                                                                    <th>Name</th>
                                                                    <th>Organization</th>
                                                                    <th>Organization Type</th>
																	<th>Subjects </th>
                                                                    <th>From</th>
                                                                    <th>To</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i=1; foreach($volunteerdetails as $volunte) {?>
                                                                <tr>
                                                                <td><?php echo $i++; ?></td>
                                                                <td><?php echo $volunte->teacher_name; ?></td>
                                                                <td><?php echo $volunte->organization_name; ?></td>
                                                                <td><?php echo $volunte->organization_type; ?></td>
																<td><?php echo $volunte->s1; ?>&nbsp;,&nbsp;<?php echo $volunte->s2; ?>&nbsp;,&nbsp;<?php echo $volunte->s3; ?></td>
                                                                <td><?php echo date("d-m-Y",strtotime($volunte->from_date)); ?></td>
                                                                <td><?php echo date("d-m-Y",strtotime($volunte->to_date)); ?></td>
                                                                <?php } ?>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                            </tfoot>
                                                        </table>
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
      
      
<!-------------------Teacher Deputation Modal--------------->

         <!-- Modal -->
         
            <div class="modal fade" id="exampleModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                
				<div class="modal-dialog" role="document">
                    <div id="loadmodalview" class="modal-content" style="width: 200%; margin:0px -310px;">
					<div id="loadmodeview" style="position:absolute;text-align:center;margin:0px;background-color:rgba(0,0,0,0.5);height:400px;width:100%;z-index:99999;display:none;">
						<h1 style="color: white; text-align:center">Loading Mode</h1>
					</div>
                    <form id="deputationaction" action="<?php echo base_url().'Udise_staff/deputesubmit/'; ?>" method="post">
                        <div class="modal-header">
                            <div class="row">
                                <div class="col-md-5">
                                    <h3 class="modal-title" id="exampleModalLabel">Deputation Details</h3>
                                    <h5 id="teacherdepute"></h5>
                                    <input type="hidden" id="teacher_code" name="teacher_code"/>
                                    <input type="hidden" id="u_id" name="u_id"/>
									<input type="hidden" id="teacher_name" name="teacher_name"/>
									<input type="hidden" id="sub_1" name="sub_1"/>
									<input type="hidden" id="sub_2" name="sub_2"/>
									<input type="hidden" id="sub_3" name="sub_3"/>
									<input type="hidden" id="sub_4" name="sub_4"/>
									<input type="hidden" id="sub_5" name="sub_5"/>
									<input type="hidden" id="sub_6" name="sub_6"/>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group col-md-4">
                                        <label class="control-label">Currently Deputed? <font style="color:red;">*</font></label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select class="form-control" id="deputed" name="deputed" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);" required="required">
                                            <option value="">Choose</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                        <div id="deputealert" style="color:#dd4b39;"></div>
                                    </div>
									<div>
										<button id="deputeview" class="btn btn-success" onclick="event.preventDefault();getalldepute(this.parentNode.parentNode.previousElementSibling.children[3]);">View</button>
									</div>
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="modalreset('deputetable');">
                                            <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                            </div>
                            
                        </div>
                        
                        <div class="modal-body">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h5 style="color: black;">Deputed Information</h5>
                                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                                </div>
                                <div class="panel-body">
                                   <div class="form-group col-md-12" >
                                        <table class="table">
                                            <tbody  id="deputetable">
                                            <tr>
                                                <td style="border-top: none;">
                                                    <div>
                                                    <label class="control-label">Deputed To <font style="color:red;">*</font></label>
                                                    <select class="form-control" id="deputedplace_0" name="deputedplace_0" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);deputeshow1(this.value,this.parentNode.parentNode.parentNode.children[2].children[0]);resetElement(this.parentNode.parentNode);setRequiredField(this.value,this.parentNode.parentNode.parentNode.children[2].children[0].children[1].id,'1');" required="required">
                                                       <option value="">Choose</option>
                                                       <option value="1">School</option>
                                                       <option value="2">Office</option>
                                                    </select>
                                                    <div id="deputedplacealert_1" style="color:#dd4b39;"></div> 
                                                    </div>     
                                                </td>
                                                <td style="border-top: none;">
                                                    <div>
                                                    <label>Select District <font style="color:red;">*</font></label>
                                                    <select id="districtstaff_0" name="districtstaff_0" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="if(this.parentNode.parentNode.previousElementSibling.children[0].children[1].value==1){deputealllist(this,this.parentNode.parentNode.nextElementSibling.children[0].children[1].id,this.value,'<?php echo base_url() ?>Udise_staff/deputealllist/',1);}else if(this.parentNode.parentNode.previousElementSibling.children[0].children[1].value==2){deputealllist(this,this.parentNode.parentNode.nextElementSibling.nextElementSibling.children[0].children[1].id,this.value,'<?php echo base_url() ?>Udise_staff/deputealllist/',3);}textvalidate(this.id,this.nextElementSibling.id);" class="form-control" style="width: 110px;" required="required">
                                                        <option value="">Choose</option>
                                                        <?php foreach($schooldist as $dist) { ?>
                                                        <option value="<?php echo $dist->id; ?>"><?php echo $dist->district_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <div id="districtstaffalert_1" style="color:#dd4b39;"></div>
                                                    </div>
                                                </td>
                                                <td style="border-top: none;" class="wtdschooldetails">
                                                    <div id="wtdschooldetails_0">
                                                        <label>Select Block <font style="color:red;">*</font></label>
                                                        <select id="blockid_0" name="blockid_0" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="deputealllist(this,this.parentNode.parentNode.nextElementSibling.children[0].children[1].id,this.value,'<?php echo base_url() ?>Udise_staff/deputealllist/',2);textvalidate(this.id,this.nextElementSibling.id);" class="form-control">
                                                            <option value="">Choose</option>
                                                        </select>
                                                        <div id="blockidalert_1" style="color:#dd4b39;"></div>
                                                    </div>
                                                </td>
                                                
                                                <td style="border-top: none;" >
                                                    <div>
                                                    <label>Select School/Office <font style="color:red;">*</font></label>
                                                
                                                    <select id="schoolid_0" name="schoolid_0" class="form-control" style="width: 110px;" onchange="textvalidate(this.id,this.nextElementSibling.id);" onfocus="textvalidate(this.id,this.nextElementSibling.id);" required="required">
                                                        <option value="">Choose</option>
                                                    </select>
                                                    <div id="schoolidalert_1" style="color:#dd4b39;"></div>
                                                    </div>
                                                </td>
                                                
                                                <!--<td style="border-top: none;" class="wtdschooldetails" id="wtdschooldetails">
                                                    <label>Select School <font style="color:red;">*</font></label>
                                                
                                                    <select id="schoolid" name="schoolid" class="form-control" style="width: 110px;" onchange="textvalidate(this.id,this.nextElementSibling.id);" onfocus="textvalidate(this.id,this.nextElementSibling.id);" required="required">
                                                        <option value="">Choose</option>
                                                    </select>
                                                    <div id="schoolidalert_1" style="color:#dd4b39;"></div>
                                                </td>
                                                 <td style="border-top: none;" class="wtbetails"  id="wtbetails>
                                                    <label>Select Office <font style="color:red;">*</font></label>
                                                
                                                   <select class="form-control" id="offkeyid" name="offkeyid" onchange="textvalidate(this.id,this.nextElementSibling.id)" onfocus="textvalidate(this.id,this.nextElementSibling.id);" style="width:245px;">
                                                        <option value="">Select Office</option>
                                                   </select>
                                                   <div id="offkeyidalert_1" style="color:#dd4b39;"></div>
                                                </td> -->
                                                
                                                <td style="border-top: none;">
                                                    <div>
                                                    <label>Deputed from <font style="color:red;">*</font></label>
                                                    <input type="date" id="deputedfmdate_0" name="deputedfmdate_0" class="form-control" onchange="textvalidate(this.id,this.nextElementSibling.id);" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onkeydown="return false;" max="<?php echo (date('Y-m-d',strtotime('now')));?>" required="required" />
                                                    <div id="deputedfmdatealert_1" style="color:#dd4b39;"></div>
                                                    </div>
                                                </td>
                                                
                                                <td style="border-top: none;">
                                                    <div>
                                                    <label>Deputed to</label>
                                                    <input type="date" id="deputedtodate_0" name="deputedtodate_0" class="form-control" onkeydown="return false;" max="<?php echo (date('Y-m-d',strtotime('now')));?>" />
                                                    </div>
                                                </td> 
                                                                       
                                                <td style="border-top: none;padding: 30px 0px;">
                                                    <button type="button" id="btnlbrc_0" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,1)"><i class="fa fa-plus"></i></button>&nbsp;&nbsp;
                                                    <button type="button" id="btnminus_0" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,0)"><i class="fa fa-minus"></i></button>
                                                </td>
                                            </tr>  
                                            </tbody>                     
                                        </table>                        
                                   </div>
                                   
                                   <!--<div class="form-group col-md-12 wtbetails" id="wtbetails">
                                        <table class="table">
                                            <tr >
                                                <td style="border-top: none;">
                                                   <label>Select District <font style="color:red;">*</font></label>
                                                
                                                    <select id="districtoff" name="districtoff" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);deputealllist(this,this.parentNode.nextElementSibling.children[1].id,this.value,'<?php echo base_url() ?>Udise_staff/deputealllist/',3);" class="form-control">
                                                        <option value="">Choose</option>
                                                            <?php foreach($schooldist as $dist) {?>
                                                        <option value="<?php echo $dist->id; ?>"><?php echo $dist->district_name; ?></option>
                                                            <?php } ?>
                                                    </select>
                                                    <div id="districtoffalert_1" style="color:#dd4b39;"></div>
                                                </td>
                                                <td style="border-top: none;">
                                                    <label>Select Office <font style="color:red;">*</font></label>
                                                
                                                   <select class="form-control" id="offkeyid" name="offkeyid" onchange="textvalidate(this.id,this.nextElementSibling.id)" onfocus="textvalidate(this.id,this.nextElementSibling.id);" style="width:245px;">
                                                        <option value="">Select Office</option>
                                                   </select>
                                                   <div id="offkeyidalert_1" style="color:#dd4b39;"></div>
                                                </td>                    
                                                <td style="border-top: none;">
                                                    <label>Deputed from <font style="color:red;">*</font></label>
                                                    <input type="date" id="officefmdate" name="officefmdate" onchange="textvalidate(this.id,this.nextElementSibling.id);" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onkeydown="return false;" max="<?php echo (date('Y-m-d',strtotime('now')));?>" class="form-control">
                                                    <div id="officefmdatealert_1" style="color:#dd4b39;"></div>
                                                </td>
                                                <td style="border-top: none;">
                                                    <label>Deputed to <font style="color:red;">*</font></label>
                                                    <input type="date" id="officetodate" name="officetodate" onchange="textvalidate(this.id,this.nextElementSibling.id);" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onkeydown="return false;" max="<?php echo (date('Y-m-d',strtotime('now')));?>" class="form-control">
                                                    <div id="officetodatealert_1" style="color:#dd4b39;"></div>
                                                </td>
                                                
                                                <td style="border-top: none;padding: 30px 0px;">
                                                    <button type="button" id="btnlbrc_0" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,1)"><i class="fa fa-plus"></i></button>&nbsp;&nbsp;
                                                    <button type="button" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,0)"><i class="fa fa-minus"></i></button>
                                                </td>
                                                                       
                                                                        
                                            </tr>
                                        </table>
                                                                
                                   </div> -->
                                   
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <input type="hidden" name="deputecount" id="deputecount" value="0"/>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="modalreset();">Close</button>
                            <button type="button" class="btn btn-primary" onclick="document.getElementById('deputecount').value=document.getElementById('deputetable').children.length;return checkRequired(this.form.id,'','',modalsubmit,'');">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            


<!------------------------End-------------------------->  
            
            
            

<!------------ Teacher Edit Moadl----------------->
        
  <div class="modal fade" id="staff_modal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
            <div class="modal-header">
              <div class="row">
                <div class="col-md-6">
                    <h4 class="modal-title"><span id="staff_id"></span></h4></div>
                    <div class="col-md-5">
                    <div class="form-group">
                    <label class="control-label col-md-3"> Category* </label>
                      <div class="col-md-9">
                        <select class="form-control" id="emis_category" autocomplete="off" required>
                         
                          <option value="1">Teaching</option>
                          <option value="2">Non-Teaching</option>
                        </select>
                        <font style="color:#dd4b39;"><div id="emis_reg_staff_gender_alert"></div></font>
                      </div>
                    </div>

                  </div>
                  <div class="col-md-1">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  </div>
            </div>
          <div class="modal-body">
            <div class="row">
        <div class="col-md-12">
            <!-- Nav tabs category -->
            <ul class="nav nav-tabs nav-tabs-success faq-cat-tabs " id="myTab">
                <li class="active"><a href="#faq-cat-1" data-toggle="tab">Part I</a></li>
                <li id="cat-2"><a href="#faq-cat-2" class="spa_date" data-toggle="tab">Part II</a></li>
                <li id="cat-3"><a href="#faq-cat-3" class="" data-toggle="tab">Part III</a></li>
            </ul>
    
            <!-- Tab panes -->
            <div class="tab-content faq-cat-content">
              <div class="tab-pane active in fade" id="faq-cat-1">
                    <div class="panel-group" id="accordion-cat-1">
                        <div class="" >
                            <div id="faq-cat-1-sub-1" class="" aria-expanded="true">
                              
                            
                      
            <form method="post" action="<?=base_url().'Udise_staff/update_staff_details'?>">
               <div class="row">
                <div  class="col-lg-12">
                        <input type="hidden" id="teacher_id" name="teacher_id"/>
                        <input type="hidden" id="emis_images_data" name="emis_image_data"/>
                        <input type="hidden" id="emis_image_name" name="emis_image_name"/>
                        <span id="staff_profile"></span><input type="file" id="staff_images" style="display: none;" accept="image/*">
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
                  </div>


              <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">Staff Personal Information</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                <div class="panel-body">

              <div class="row">
                <?php  ?>
                 <?php if($this->session->userdata('emis_user_type_id') == 9 || $this->session->userdata('emis_user_type_id') == 10 || $this->session->userdata('emis_user_type_id') == 6 ) { ?>        
                                             <input type="hidden" name="office_id" id="office_id" value="<?php echo $office_id[0]->office_id;?>"> 
                                             <input type="hidden" name="off_key_id" id="off_key_id" value="<?php echo $office_id[0]->off_key_id;?>">
                                              
                                              <input type="hidden" name="status" id="status" value="O">
                                                <?php } else { ?>
                                                      <input type="hidden" name="office_id" id="office_id" value=""> 
                                                <input type="hidden" name="off_key_id" id="off_key_id" value="<?php echo $this->session->userdata('emis_school_id');?>">
                                              
                                              <input type="hidden" name="status" id="status" value="S">
                                              <?php } ?>
                <input type="hidden" name="u1_id" id="u1_id">
                <div class="col-md-6">
                  <div class="form-group">
                      <label class="control-label col-md-3">Name of the Staff*</label>
                    <div class="col-md-9">
                          <input type="text" class="form-control" id="emis_reg_staff_name" name="emis_reg_staff_name" placeholder="பணியாளர் பெயர் " maxlength="60" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" onkeyup='this.value=this.value.toUpperCase();' autocomplete="off" required >        
                          <font style="color:#dd4b39;"><div id="emis_reg_staff_name_alert"></div></font>
                    </div>
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                      <label class="control-label col-md-3">Name InTamil*</label>
                    <div class="col-md-9">
                          <input type="text" class="form-control" id="emis_reg_staff_tname" name="emis_reg_staff_tname" placeholder="பணியாளர் பெயர் " maxlength="60" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" onkeyup='this.value=this.value.toUpperCase();' autocomplete="off" required >        
                          <font style="color:#dd4b39;"><div id="emis_reg_staff_name_alert"></div></font>
                    </div>
                  </div>
                </div>
				<input type="hidden" class="form-control"  name="teachercode" id="teachercode">
                <div class="col-md-6">
                  <div class="form-group">
                      <label class="control-label col-md-3"> Aadhaar Number* </label>
                      <div class="col-md-9">
                              <input type="text" class="form-control" id="emis_reg_staff_aadhaar" name="emis_reg_staff_aadhaar" placeholder="ஆதார் எண்" maxlength="12" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  autocomplete="off"required>
                                <font style="color:#dd4b39;"><div id="emis_reg_staff_aadhaar_alert"></div></font>
                      </div>
                    </div>
                </div>
              </div>
              <!----- 2 row---------->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label col-md-3"> Gender* </label>
                      <div class="col-md-9">
                        <select class="form-control" id="emis_reg_staff_gender" name="emis_reg_staff_gender" autocomplete="off" required>
                          <option value="" selected="selected">பாலினம்</option>
                          <option value="1">Male</option>
                          <option value="2">Female</option>
                          <option value="3">Transgender</option>
                        </select>
                        <font style="color:#dd4b39;"><div id="emis_reg_staff_gender_alert"></div></font>
                      </div>
                    </div>
                  </div>      
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label col-md-3"> Blood group* </label>
                        <div class="col-md-9">
                          <select class="form-control" data-placeholder="Choose Blood Group" id="emis_reg_staff_bg" name="emis_reg_staff_bg" autocomplete="off"  required >
                             <option value="" style="color:#bfbfbf;">இரத்த வகை</option>
                             <?php foreach($bloodgroup as $res) {   ?>
                             <option value="<?php echo $res->id; ?>"><?php echo $res->group; ?></option>
                                    <?php  } ?>
                          </select>
                          <font style="color:#dd4b39;"><div id="emis_reg_staff_bg_alert"></div></font>
                        </div>
                    </div>
                  </div>
              </div>
              <!----------- 3 Row---------->
              <div class="row">
                <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Date of Birth*</label>
                                                                  <div class="col-md-9">
                                                                    
                                                      <input type="text" name="emis_reg_staff_dob"  class="form-control date" id="dat" value="" autocomplete="off" placeholder="DD-MM-YYYY" onkeypress="return event.charCode >= 48"required />  
                                  
                                  <font style="color:#dd4b39;"><div id="emis_reg_staff_dob_alert"></div></font>
                                                           
                                                       
                                                   
                                                                  </div>
                                                               </div>
                                                            </div>
                <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3"> Social Category* </label>
                                                                  <div class="col-md-9">
                                                                     <select id="emis_reg_staff_socialcategory" class="form-control" name="emis_reg_staff_socialcategory"  autocomplete="off" required>
                                                                        <option value="">Select Social Category</option>
                                                                        <?php foreach($teachersocial as $social){?>
                                                                        <option value="<?php echo $social->id; ?>"><?php echo $social->social_cat; ?></option>
                                                                        <?php }?>
                                                                        
                                                                     </select>
                                   <font style="color:#dd4b39;"><div id="emis_reg_staff_sc_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>

              </div>
              <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Designation of Staff*</label>
                                                                  <div class="col-md-9 deg_group">
                                                                     <select class="form-control" id="emis_reg_staff_teachertype" name ="emis_reg_staff_teachertype" autocomplete="off" required>
                                                                        <option value="">Select type of Staff</option>
                                      <?php if (isset($staff_cat)) {
                                        foreach ($staff_cat as $categ) {?>
                                        <option value="<?php echo $categ->id; ?>"><?php echo $categ->type_teacher; ?></option>
                                      <?php } }?>
                                                                     </select>
                                   <font style="color:#dd4b39;"><div id="emis_reg_staff_type_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                              <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Father's Name*</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="emis_reg_staff_fname" name="emis_reg_staff_fname" maxlength="60" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" onkeyup='this.value=this.value.toUpperCase();' autocomplete="off" required>
                                    
                                                                     <font style="color:#dd4b39;"><div id="emis_reg_staff_fname_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                               
                               
                                                         </div>
                                                         <div class="row">
                             
                              
                                                            <!--/span-->
                                                            <div class="col-md-6" id="app_sub">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3"> Appointed for the Subject* </label>
                                                                  <div class="col-md-9">
                                   <select class="form-control" id="emis_reg_staff_appntedforsubject" name="emis_reg_staff_appntedforsubject"  autocomplete="off">
                                                                        <option value="">Select type of Subject</option>
                                                                       <?php foreach($subjects as $res) {   ?>
                                    <option value="<?php echo $res->id; ?>"><?php echo $res->subjects; ?></option>
                                    <?php  } ?>
                                                                     </select>
                                   <font style="color:#dd4b39;"><div id="emis_reg_staff_apnt_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                              <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Mother's Name*</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="emis_reg_staff_mname" name="emis_reg_staff_mname" maxlength="60" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" onkeyup='this.value=this.value.toUpperCase();'  autocomplete="off" required>
                                   
                                                                     <font style="color:#dd4b39;"><div id="emis_reg_staff_mname_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                             
                                
                             </div>
                             
                        
                              <div class="row">
                              
                              
                              
                              <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Differently abled type, If any*</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" name="emis_reg_staff_typeofdisability" id="emis_reg_sel"   required>
                                                                        <option value="">Select type of disability</option>
                                                                        <option value="1">Not applicable</option>
                                                                        <option value="2">Physically Challenged</option>
                                                                        <option value="3">Visually Impaired</option>
                                                                        <!--<option value="4">Deaf and Dumb</option>-->
                                                                     </select>
                                   <font style="color:#dd4b39;"><div id="emis_reg_staff_typedis_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                              <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Spouse Name, if any.</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="emis_reg_staff_spname" name="emis_reg_staff_spname" maxlength="60" onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32"  onkeyup='this.value=this.value.toUpperCase();'>
                                   
                                                                     <font style="color:#dd4b39;"><div id="emis_reg_staff_sname_alert"></div></font>
                                    
                                                                  </div>
                                                               </div>
                                                            </div>
                              
                              
                              <div class="col-md-6" id="emis_reg_dis">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Differently abled Details(including percentage)*</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="emis_reg_staff_distype" name="emis_reg_staff_distype" maxlength="200" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32"  autocomplete="off" >
                                                                     <font style="color:#dd4b39;"><div id="emis_reg_staff_distype_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                              </div>

            </div>
          </div>
          <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">Joining Details</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                <div class="panel-body">

                    <div class="row">
                              
                              <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Date of Joining in Service*</label>
                                                                  <div class="col-md-9">
                                                                    <input type="text" name="emis_reg_staff_join"  class="form-control date1" id="emis_reg_staff_join" value="" autocomplete="off" placeholder="DD-MM-YYYY" onkeypress="return event.charCode >= 48"required />
                                  
                                                          <font style="color:#dd4b39;"><div id="emis_reg_staff_join_alert"></div></font>
                                                                    
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                              
                              <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Date of Joining in Present Post*</label>
                                                                  <div class="col-md-9">
                                                                    <input type="text" name="emis_reg_staff_pjoin"  class="form-control date2" id="emis_reg_staff_pjoin" value="" autocomplete="off" placeholder="DD-MM-YYYY" onkeypress="return event.charCode >= 48"required />
                                  
                                  <font style="color:#dd4b39;"><div id="emis_reg_staff_pjoin_alert"></div></font>
                                                                    
                                                                  </div>
                                                               </div>
                                                            </div>
                              
                              
                              </div>
                              <div class="row">
                              
                                                            <!--/span-->
                              <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Date of Joining in Present School*</label>
                                                                  <div class="col-md-9">
                                                                    <input type="text" name="emis_reg_staff_psjoin"  class="form-control date3" id="emis_reg_staff_psjoin" value="" autocomplete="off" placeholder="DD-MM-YYYY" onkeypress="return event.charCode >= 48"required />
                                  
                                   <font style="color:#dd4b39;"><div id="emis_reg_staff_psjoin_alert"></div></font>
                                                                    
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                              
                              <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">GPF/CPS/EPF Details*</label>
                                                                  <div class="col-md-9">
                                  <select class="form-control" name="emis_reg_cpsgps_details" id="emis_reg_cpsgps_details" required>
                                                                        <option value="">Select type of GPF/CPS/EPF</option>
                                                                        <option value="1">GPF</option>
                                                                        <option value="2">CPS</option>
                                                                        <option value="6">TPF</option>
                                                                        <option value="5">EPF</option>
                                    <option value="3">Applied</option>
                                                                      <option value="4">Not Applicable</option>
                                                                     </select>
                                   <font style="color:#dd4b39;"><div id="emis_reg_staff_cps_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                              <!--/span-->
                              
                              
                              </div>
                              
                              <div class="row" >
                              
                              
                              <div class="col-md-6" id="epsnumber">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">GPF/CPS/EPF Number*</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" id="emis_reg_staff_cps" name="emis_reg_staff_cps" maxlength="25" onkeypress="return event.charCode >= 48 && event.charCode <= 57" autocomplete="off">
                                   <p style="color:#eee;font-size:18px;">GPF/CPS/EPF Eg. 1234567</p>
                                                                     <font style="color:#dd4b39;"><div id="emis_reg_staff_cpsnumber_alert"></div></font>
                                                                  </div>
                                  
                                                               </div>
                                                            </div>
                              
                              <div class="col-md-6" id="cpsnumber">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Suffix*</label>
                                                                  <div class="col-md-9">
                                  <select class="form-control" name="emis_reg_staff_suffix" id="emis_reg_staff_suffix" >
                                    
                                                                        <option value="">Select type of GPF/CPS/EPS Number</option>
                                                                        <?php foreach($suffix as $res) {   ?>
                                    <option value="<?php echo $res->id; ?>"><?php echo $res->suffix; ?></option>
                                    <?php  } ?>
                                                                     </select>
                                   <font style="color:#dd4b39;"><div id="emis_reg_staff_suffix_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                              
                              
                              </div>
                              
                              <div class="row">
                              <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Mode of Recruitment*</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" name="emis_reg_staff_mode" id="emis_reg_rect"  autocomplete="off" 
                                                                     required>
                                                                        <option value="">Select type of Recruitment</option>
                                                                        <option value="1">TNPSC</option>
                                                                        <option value="2">TRB</option>
                                                                        <option value="11">TET</option>
                                                                        <option value="3">Compassionate Grounds</option>
                                                                        <option value="4">Transfer of Services</option>
																		<option value="6">Employment Seniority</option>
																		<option value="7">Retrenched Census Employees</option>
                                                                        <option value="8">Management</option>
                                                                        <option value="9">SSA</option>
                                                                        <option value="10">Direct Recruitment</option>
                                                                     </select>
                                                                     
                                                                     
                                                                     
                                                                        
                                                                        
                                   <font style="color:#dd4b39;"><div id="emis_reg_staff_mode_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                              
                              <div class="col-md-6" id="emis_reg_rectrank_enable">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Recruitment Rank*</label>
                                                                  <div class="col-md-9">
                                                                    <input type="text" class="form-control" id="emis_reg_staff_rank" name="emis_reg_staff_rank" placeholder="Rank" maxlength="6" onkeypress="return( event.charCode >= 48 && event.charCode <= 57) || ( event.charCode > 64 && event.charCode < 91) || ( event.charCode > 96 && event.charCode < 123) || event.charCode == 0"  autocomplete="off" >
                                  <font style="color:#dd4b39;"><div id="emis_reg_staff_rank_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                              
                               <div class="col-md-6" id="emis_reg_rectyear_enable">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Year Selection*</label>
                                                                  <div class="col-md-9">
                                                                     <div class="form-group">
                              
                              
                                    
                                    <select class="form-control" data-placeholder="Choose a Category"  id="emis_reg_staff_yearselection" name="emis_reg_staff_yearselection" autocomplete="off" >
                                    <option value="" style="color:#bfbfbf;">Year</option>
                                                              <?php
                                                              $year=date('Y');
                                                              $min=$year-42;
                                                              $max=$year+1;
                                                              for($i=$min;$i<$max;$i++)
                                                              {?>
                                                              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                            <?php } ?>
                                                            </select>
                              <font style="color:#dd4b39;"><div id="emis_reg_staff_yearselection_alert"></div></font>
                                                        
                            </div>
                            </div>
                            </div>
                            </div>
                              <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3"> Nature of appointment* </label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" name="emis_reg_staff_appntmntnature" id="emis_reg_staff_appntmntnature"  autocomplete="off" required>
                                                                        <option value="">Select Nature of appointment</option>
                                                                        <option value="1">Regular</option>
                                                                        <option value="2">Contract</option>
                                                                        <option value="3">Part-Time</option>
                                                                     </select>
                                   <font style="color:#dd4b39;"><div id="emis_reg_staff_np_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                              </div>
                </div>
          </div>

          <!----------- Communication ------------------>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">Communication Details</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                <div class="panel-body">

                  <div class="row">
                               <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Mobile Number*</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control" placeholder="கைபேசி எண் *" name="emis_reg_staff_contact" id="emis_reg_staff_contact" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  autocomplete="off" required>
                                   <font style="color:#dd4b39;"><div id="emis_reg_staff_mobile_alert"></div></font>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                         </div>
                             
                             <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">E-Mail Id*</label>
                                                                  <div class="col-md-9"> 
                                                                     <input type="email" placeholder="மின்னஞ்சல்" class="form-control" name="emis_reg_staff_email" id="emis_reg_staff_email" maxlength="60" autocomplete="off" required >
                                   <font style="color:#dd4b39;"><div id="emis_reg_staff_email_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                              
                             </div>
                             
                             <div class="row">
                             <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Door no. / Building Name *</label>
                                                                  <div class="col-md-9"> 
                                                                     <input type="text" placeholder="கதவு எண் / கட்டிடத்தின் பெயர் *"  class="form-control" id="emis_reg_staff_door" name="emis_reg_staff_door"  autocomplete="off" required>
                                   <font style="color:#dd4b39;"><div id="emis_reg_staff_door_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                              <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Street Name / Area name *</label>
                                                                  <div class="col-md-9"> 
                                                                     <input type="text" placeholder="தெரு பெயர் / பகுதியின் பெயர் *"  class="form-control" id="emis_reg_staff_street" name="emis_reg_staff_street"  autocomplete="off" required>
                                   <font style="color:#dd4b39;"><div id="emis_reg_staff_street_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                             </div>
                             
                             <div class="row">
                             <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">City name / Village name *</label>
                                                                  <div class="col-md-9"> 
                                                                     <input type="text" placeholder="நகரம் / கிராமத்தின் பெயர் *" class="form-control" id="emis_reg_staff_city" name="emis_reg_staff_city"  autocomplete="off" required>
                                   <font style="color:#dd4b39;"><div id="emis_reg_staff_city_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                              <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">District *</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" data-placeholder="Choose a Category" id="emis_reg_staff_district" name="emis_reg_staff_district" placeholder="மாவட்டம் *" autocomplete="off" required>
                                    <option value="" >மாவட்டம் *</option>
                                    <?php foreach($schooldist as $dist) {   ?>
                                    <option value="<?php echo $dist->id;  ?>"><?php echo $dist->district_name  ?></option>
                                    <?php   }  ?>
                                  </select>
                                  <font style="color:#dd4b39;"><div id="emis_reg_staff_district_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                             </div>
                             
                             <div class="row">
                             <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Pincode *</label>
                                                                  <div class="col-md-9"> 
                                                                     <input type="text" placeholder="அஞ்சல் குறியீட்டு எண் *" class="form-control" id="emis_reg_staff_pincode" maxlength="6" name="emis_reg_staff_pincode" onkeypress="return event.charCode >= 48 && event.charCode <= 57" autocomplete="off" required>
                                   <font style="color:#dd4b39;"><div id="emis_reg_staff_pincode_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                             </div>
                </div>
            </div>
            <!----------- Academic Details--------------->
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">Academic Qualification</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                <div class="panel-body">
                  <div class="row">

                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Academic*</label>
                                                                  <div class="col-md-9 acd_drop">
                                                                     
                                   <font style="color:#dd4b39;"><div id="emis_reg_staff_academic_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3"> Professional* </label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" id="emis_reg_staff_qualificationprofessional" name="emis_reg_staff_qualificationprofessional" required>
                                                                        <option value="">Select type of Professional qualification</option>
                                                                         <?php foreach($professional as $pro) {
                                                                        ?>
                                                                        <option value="<?php echo $pro->id; ?>"><?php echo $pro->professional; ?></option>
                                                                        <?php }?>
                                                                     </select>
                                   <font style="color:#dd4b39;"><div id="emis_reg_staff_prof_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                         </div>
                                                         <br/>
                             <div class="row">
                              <div class="col-md-6" id="UG">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">UG*</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" id="emis_reg_staff_ug" name="emis_reg_staff_ug"    >
                                   <option value="">Select type of UG</option>
                                   <?php foreach($ug as $res) {   ?><option value="<?php echo $res->id; ?>"><?php echo $res->ug_degree; ?></option><?php  } ?>
                                   
                                  
                                                                     </select>
                                   <font style="color:#dd4b39;"><div id="emis_reg_staff_ug_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                              
                              <div class="col-md-6" id="PG">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">PG*</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" id="emis_reg_staff_pg" name="emis_reg_staff_pg"  >
                                                                        <option value="">Select type of PG</option>
                                                                         <?php foreach($pg as $res) {   ?>
                                    <option value="<?php echo $res->id; ?>"><?php echo $res->pg_degree; ?></option>
                                    <?php  } ?>
                                                                     </select>
                                   <font style="color:#dd4b39;"><div id="emis_reg_staff_pg_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                              
                             </div>
                </div>
            </div>
            <!------------------- Main Subject Details--------------->
            <div class="panel panel-success" id="sub_tab">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">Main Subjects Taught</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                <div class="panel-body">
                   <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Subject 1*</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" id="emis_reg_staff_mainsubjcttaughtsubj1" name="emis_reg_staff_mainsubjcttaughtsubj1">
                                                                        <option value="999">Select type of Subject</option>
                                                                          <?php foreach($subjects as $res) {   ?>
                                    <option value="<?php echo $res->id; ?>"><?php echo $res->subjects; ?></option>
                                    <?php  } ?>
                                                                       
                                                                     </select>
                                   <font style="color:#dd4b39;"><div id="emis_reg_staff_subj1_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Subject 2</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" id="emis_reg_staff_mainsubjcttaughtsubj2" name="emis_reg_staff_mainsubjcttaughtsubj2">
                                                                        <option value="999">Select type of Subject</option>
                                                                        <?php foreach($subjects as $res) {   ?>
                                    <option value="<?php echo $res->id; ?>"><?php echo $res->subjects; ?></option>
                                    <?php  } ?>
                                                                     </select>
                                   <font style="color:#dd4b39;"><div id="emis_reg_staff_subj2_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->                          
                                                         </div>
                                                         <br/>
                             <div class="row">
                                   <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Subject 3</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" id="emis_reg_staff_mainsubjcttaughtsubj3" name="emis_reg_staff_mainsubjcttaughtsubj3">
                                                                        <option value="999">Select type of Subject</option>
                                                                        <?php foreach($subjects as $res) {   ?>
                                    <option value="<?php echo $res->id; ?>"><?php echo $res->subjects; ?></option>
                                    <?php  } ?>
                                                                     </select>
                                   <font style="color:#dd4b39;"><div id="emis_reg_staff_subj3_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															 <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Subject 4</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" id="emis_reg_staff_mainsubjcttaughtsubj4" name="emis_reg_staff_mainsubjcttaughtsubj4">
                                                                        <option value="999">Select type of Subject</option>
                                                                        <?php foreach($subjects as $res) {   ?>
                                    <option value="<?php echo $res->id; ?>"><?php echo $res->subjects; ?></option>
                                    <?php  } ?>
                                                                     </select>
                                   <font style="color:#dd4b39;"><div id="emis_reg_staff_subj4_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                             </div>
							 <br>
							  <div class="row">
                                   <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Subject 5</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" id="emis_reg_staff_mainsubjcttaughtsubj5" name="emis_reg_staff_mainsubjcttaughtsubj5">
                                                                        <option value="999">Select type of Subject</option>
                                                                        <?php foreach($subjects as $res) {   ?>
                                    <option value="<?php echo $res->id; ?>"><?php echo $res->subjects; ?></option>
                                    <?php  } ?>
                                                                     </select>
                                   <font style="color:#dd4b39;"><div id="emis_reg_staff_subj5_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															 <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Subject 6</label>
                                                                  <div class="col-md-9">
                                                                     <select class="form-control" id="emis_reg_staff_mainsubjcttaughtsubj6" name="emis_reg_staff_mainsubjcttaughtsubj6">
                                                                        <option value="999">Select type of Subject</option>
                                                                        <?php foreach($subjects as $res) {   ?>
                                    <option value="<?php echo $res->id; ?>"><?php echo $res->subjects; ?></option>
                                    <?php  } ?>
                                                                     </select>
                                   <font style="color:#dd4b39;"><div id="emis_reg_staff_subj6_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                             </div>
                </div>
            </div>
			
			 <div class="panel panel-success" id="sub_tab">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">Bank Account Information</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                <div class="panel-body">
                   <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">IFS Code</label>
                                                                  <div class="col-md-9">
                                                                    <input type="text" class="form-control" placeholder="IFSC Code" name="ifsc_code" id="ifsc_code" 
																	 onchange="ifsccode()"
																	  onchange="ifsccheck(ifsc_code);" autocomplete="off" required>
																	 <font style="color:#dd4b39;"><div id="ifsc_code_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Branch Name</label>
                                                                  <div class="col-md-9">
                                                                     <input type="text" class="form-control"  name="branch" id="branch" 
																	  readonly>
																	 <font style="color:#dd4b39;"><div id="branch_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->                          
                                                         </div>
                                                         <br/>
                             <div class="row">
                                   <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Bank Name</label>
                                                                  <div class="col-md-9">
                                                                      <input type="text" class="form-control"  name="bankname" id="bankname" 
																	  readonly>
																	 <font style="color:#dd4b39;"><div id="bankname_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															 <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">Account Number</label>
                                                                  <div class="col-md-9">
                                                                      <input type="text" class="form-control"  name="accountnumber" id="accountnumber" 
																	  required>
																	 <font style="color:#dd4b39;"><div id="accountnumber_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <!--/span-->
                             </div>
							 <br>
							  <div class="row">
                                    <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">PAN Number</label>
                                                                  <div class="col-md-9">
                                                      <input type="text" class="form-control"  name="pannumber" id="pannumber" 
																	 maxlength="10" onkeyup='this.value=this.value.toUpperCase();hasWhiteSpace(this);' required>
																	 <font style="color:#dd4b39;"><div id="pannumber_alert"></div></font>
                                                                  </div>
                                                               </div>
                                                            </div>
															<input type="hidden" class="form-control"  name="bankid" id="bankid">
															
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
                      <div class="tab-pane in fade" id="faq-cat-2">
                    <div class="panel-group" id="accordion-cat-1">
                      <form method="post" action="<?=base_url().'Udise_staff/update_udise_staff_part2'?>">
                        <input type="hidden" id="teacher_id2" name="teacher_id">
                              <input type="hidden" id="d_id" name="d_id">
                              <input type="hidden" id="count" name="count">
                        <div class="" >
                            <div id="faq-cat-2-sub-1" class="" aria-expanded="true">
                             <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">Additional Details</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                <div class="panel-body">
                <div class="form-group col-md-12">
                  <input type="hidden" id="teach_name" name="teach_name">
<table class="table" id="regulation_table">
  <thead>
    <tr>
<th>Date of Regularisation</th>
<th>Date</th>
<th>Mode</th>
<th> &nbsp;&nbsp;&nbsp;&nbsp;Add&nbsp;&nbsp;&nbsp;Edit</th> 
<!-- <th>Edit</th> -->
</tr> 
  </thead>
<tbody>

</tbody></table>
</div>


 <div class="form-group col-md-12">
<table class="table" id="pro_regulation">
  <thead>
<tr>
<th>Date of Probation Declaration</th>
<th>Date</th>

</tr> 
</thead>
<tbody>
 <tr><td > <select id="prob_id" name="prob_id" class="form-control" ><option value="">Choose</option><option value="1">SGT</option><option value="2">PET</option><option value="3">Spl.Tr.</option><option value="4">BT</option><option value="5">PG</option><option value="6">Computer Instructor</option><option value="7">Headmaster HSS</option><option value="8">Headmaster HS</option><option value="9">Headmaster Middle School</option><option value="10">Headmaster Primary School</option><option value="11">Vocational Instructor</option><option value="12">PD Grade-I</option><option value="13">PD Grade-II</option><option value="14">BRTE</option></select></td>
  <td >
    <input type="text" id="prob_date" name="prob_date" class="form-control sdate" placeholder="DD-MM-YYYY" autocomplete="off" />
   </td>

 </tr>
</tbody>
</table>
</div>
<hr>
                          <div class="row" style="margin-bottom: 10px;">
                          <div class="col-md-12">
                              <div class="form-group">
                                <label class="control-label col-md-4">If Unit Transfer / Dept.Transfer Date of Joining in DSE / DEE</label>
                                <div class="col-md-4"> 
                                    <input type="text" placeholder="DD-MM-YYYY"  class="form-control sdate" id="doj_dept" name="doj_dept" autocomplete="off">
                                </div>
                               
                          </div>
                              </div>
                              <div class="row" style="margin-bottom: 10px;">
                              <div class="col-md-12">
                              <div class="form-group">
                                <label class="control-label col-md-4">10th Standard passed in Month / Year</label>
                                <div class="col-md-4"> 
                                    <input type="text" placeholder="DD-MM-YYYY"  class="form-control sdate" id="sslc_dop" name="sslc_dop" required autocomplete="off">
                                </div>
                              </div>
                          </div>
                              </div>
                             <div class="row" style="margin-bottom: 10px;">
                          <div class="col-md-12">
                              <div class="form-group">
                                <label class="control-label col-md-4">12th Standard passed in Month / Year</label>
                                <div class="col-md-4"> 
                                    <input type="text" placeholder="DD-MM-YYYY"  class="form-control sdate" id="higersec_dop" name="higersec_dop"  autocomplete="off">
                                </div>
                              </div>
                              
                             </div>
                           </div>
                             <div class="row" style="margin-bottom: 10px;">

                             <div class="col-md-12">
                              <div class="form-group">
                                <label class="control-label col-md-4">Date Of Joining Present Block</label>
                                <div class="col-md-4"> 
                                    <input type="text" placeholder="DD-MM-YYYY"  class="form-control sdate" id="doj_block" name="doj_block" autocomplete="off">
                                </div>
                              </div>
                             
                              
                          </div>
                        </div>
  
 

                
                  
      <!-- <div class="row" style="margin-bottom: 10px;">
        <div class="col-md-12">
          <div class="form-group">
            <label class="control-label col-md-8">Date on which he/she become eligible for promotion (in the cadre of secondary Gr. / PET / Spl.Tr)</label>
              <div class="col-md-4"> 
              <input type="text" placeholder=""  class="form-control sdate" id="promo_eligi_date" name="promo_eligi_date" autocomplete="off">
              </div>
          </div>
        </div>
      </div> -->
      <div class="row" style="margin-bottom: 10px;">
        <div class="col-md-12">
          <div class="form-group">
            <label class="control-label col-md-8">Whether he/she already relinquished the similar promotion ?</label>
              <div class="col-md-4"> 
              <span style="margin-right: 15px;"><input type="radio" name="relinguish" value="1">Yes</span>
              <span style="margin-right: 15px;"><input type="radio" name="relinguish" value="2">No</span>
              </div>
          </div>
        </div>
      </div>
      <div class="row ext_grp" style="margin-bottom: 10px;" id="date_grp">
        <div class="col-md-12">
          <div class="form-group">
            <label class="control-label col-md-8">Date of Relinquishment</label>
              <div class="col-md-4"> 
              <input type="text" placeholder=""  class="form-control sdate1" id="relinguish_date" name="relinguish_date" autocomplete="off">
              </div>
          </div>
        </div>
        <!-- <input type="text" name="e_id" id="e_id"> -->
      </div>
      <div class="row" style="margin-bottom: 10px;">
        <div class="col-md-12">
          <div class="form-group">
            <label class="control-label col-md-8">Pay Drawing Head</label>
              <div class="col-md-4"> 
      <select class="form-control" id="head_acc" name="head_acc">
                                                                        <option value="">Select type of Subject</option>
                                                                        <?php if(!empty($head_account)){ foreach($head_account as $res) {   ?>
                                    <option value="<?=$res->id; ?>"><?=$res->head_of_account?></option>
                                    <?php  }} ?>
                                                                     </select>
                                                                   </div>

                                                                      </div>
        </div>
        <!-- <input type="text" name="e_id" id="e_id"> -->
      </div>

      
               </div>
                </div>  
                <!--  <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">DP case stage wise</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                <div class="panel-body">
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label col-md-8">Details of dp initiated</label>
                          <div class="col-md-4"> 
                          <input type="text" placeholder=""  class="form-control" id="dp_initiated" name="dp_initiated" required>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label col-md-8">Details of enquiry held</label>
                          <div class="col-md-4"> 
                          <input type="text" placeholder=""  class="form-control" id="enquiry_held" name="enquiry_held" required>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label col-md-8">If final orders issued by the competent authority ?</label>
                          <div class="col-md-4"> 
                          <input type="text" placeholder=""  class="form-control" id="competent_authority" name="competent_authority" required>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label col-md-8">Details of final order</label>
                          <div class="col-md-4"> 
                          <input type="text" placeholder=""  class="form-control" id="final_order" name="final_order" required>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label col-md-8">Details of currency period (end date)</label>
                          <div class="col-md-4"> 
                          <input type="text" placeholder=""  class="form-control" id="currency_period" name="currency_period" required>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label col-md-8">If any appeal is given by the individual on the final order, if yes give details</label>
                          <div class="col-md-4"> 
                          <input type="text" placeholder=""  class="form-control" id="individual_final_order" name="individual_final_order" required>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label col-md-8">Details of appeal</label>
                          <div class="col-md-4"> 
                          <input type="text" placeholder=""  class="form-control" id="details_of_appeal" name="details_of_appeal" required>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label col-md-8">If any final orders issued by the appelate authority ? If yes details</label>
                          <div class="col-md-4"> 
                          <input type="text" placeholder=""  class="form-control" id="appelate_authority" name="appelate_authority" required>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label col-md-8">Present stage of appeal</label>
                          <div class="col-md-4"> 
                          <input type="text" placeholder=""  class="form-control" id="Present_stage_of_appeal" name="Present_stage_of_appeal" required>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label col-md-8">Details of review and present stage</label>
                          <div class="col-md-4"> 
                          <input type="text" placeholder=""  class="form-control" id="review_and_present_stage" name="review_and_present_stage" required>
                          </div>
                      </div>
                    </div>
                  </div>
                   <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label col-md-8">Details of court case if any</label>
                          <div class="col-md-4"> 
                          <input type="text" placeholder=""  class="form-control" id="court_case_if_any" name="court_case_if_any" required>
                          </div>
                      </div>
                    </div>
                  </div>
                   <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label col-md-8">a) Court case no.</label>
                          <div class="col-md-4"> 
                          <input type="text" placeholder=""  class="form-control" id="court_case_no" name="court_case_no" required>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label col-md-8">b) Gist of the case.</label>
                          <div class="col-md-4"> 
                          <input type="text" placeholder=""  class="form-control" id="gist_of_the_case" name="gist_of_the_case" required>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label col-md-8">c) Judgement Delivered</label>
                          <div class="col-md-4"> 
                          <input type="text" placeholder=""  class="form-control" id="judgement_delivered" name="judgement_delivered" required>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label col-md-8">Remarks</label>
                          <div class="col-md-4"> 
                          <textarea class="form-control" rows="5" id=""></textarea>
                          </div>
                      </div>
                    </div>
                  </div> -->

                </div>
                </div>  
                <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" onclick="return save_full_valid();"class="btn btn-primary">Save</button>
          <div id="err_msg_save"></div>
        </div>
                            </div>
      </form>
                          </div>
                        </div>
                        <div class="tab-pane in fade" id="faq-cat-3">
                    <div class="panel-group" id="accordion-cat-1">
                      <form method="post" action="<?=base_url().'Udise_staff/update_udise_staff_part3'?>">
                        <div class="" >
                            <div id="faq-cat-3-sub-1" class="" aria-expanded="true">
                             <div class="panel panel-success">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                  <input type="hidden" id="teach_id" name="teach_id">
                  <input type="hidden" id="teach3_name" name="teach_name">
                  <div class="row">
                    <div class="row">
                    
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label col-md-5"> Training Need* </label>
                        <div class="col-md-7">
                          <select class="form-control" id="emis_reg_train_need" name="emis_reg_train_need" autocomplete="off" required>
                          <option value="0" selected="selected">Not required</option>
                          <option value="1">Subject knowledge</option>
                          <option value="2">Pedagogical Issues</option>
                          <option value="3">ICT Skills</option>
                          <option value="4">Knowledge and skills to engage with CWSN</option>
                          <option value="5">Leadership and management skills</option>
                          <option value="6">Sanitation & Hygiene</option>
                          <option value="7">Others</option>
                        </select>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label col-md-5"> Classes Taught* </label>
                      <div class="col-md-7">
                        <select class="form-control" id="emis_reg_class_taught" name="emis_reg_class_taught" autocomplete="off" required>
                          <option value="" selected="selected">select</option>
                          <option value="1">Primary only</option>
                          <option value="2">Upper primary only</option>
                          <option value="3">Primary and Upper Primary</option>
                          <option value="4">Secondary only</option>
                          <option value="5">Higher Secondary only</option>
                          <option value="6">Upper primary and Secondary</option>
                          <option value="7">Secondary and Higher Secondary</option>
                          <option value="8">Pre-Primary Only</option>
                          <option value="9">Pre- Primary & Primary</option>
                        </select>
                        
                      </div>
                    </div>
                  </div> 
              </div><br/>

              <!---- 2 Row------->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label col-md-5"> No. of working days spent on non teaching assignments in Last Academic Year* </label>
                      <div class="col-md-7">
                        <input type="text" class="form-control" id="emis_reg_staff_non_teaching_assig" name="emis_reg_staff_non_teaching_assig" autocomplete="off" required="">
                         
                      
                        
                      </div>
                    </div>
                  </div>      
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label col-md-5"> Maths Studied upto* </label>
                        <div class="col-md-7">
                          <select class="form-control" data-placeholder="Choose Blood Group" id="emis_reg_mat_upto" name="emis_reg_mat_upto" autocomplete="off"  required >
                             <option value="" style="color:#bfbfbf;">Select</option>
                             <option value="1">Below secondary</option>
                             <option value="2">Secondary</option>
                             <option value="3">Higher secondary</option>
                             <option value="4">Graduate</option>
                             <option value="5">Post graduate</option>
                             <option value="6">M.Phil.</option>
                             <option value="7">Ph.D.</option>
                             <option value="8">Post-Doctoral</option>

                          </select>
                          
                        </div>
                    </div>
                  </div>
              </div>

              <!--------- 3 Row -------->

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label col-md-5"> Science Studied upto* </label>
                      <div class="col-md-7">
                        <select class="form-control" data-placeholder="Choose Blood Group" id="emis_reg_sci_upto" name="emis_reg_sci_upto" autocomplete="off"  required >
                             <option value="" style="color:#bfbfbf;">Select</option>
                             <option value="1">Below secondary</option>
                             <option value="2">Secondary</option>
                             <option value="3">Higher secondary</option>
                             <option value="4">Graduate</option>
                             <option value="5">Post graduate</option>
                             <option value="6">M.Phil.</option>
                             <option value="7">Ph.D.</option>
                             <option value="8">Post-Doctoral</option>

                          </select>
                          
                         
                      
                        
                      </div>
                    </div>
                  </div>      
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label col-md-5"> English studied up to* </label>
                        <div class="col-md-7">
                          <select class="form-control" data-placeholder="Choose Blood Group" id="emis_reg_eng_upto" name="emis_reg_eng_upto" autocomplete="off"  required >
                             <option value="" style="color:#bfbfbf;">Select</option>
                             <option value="1">Below secondary</option>
                             <option value="2">Secondary</option>
                             <option value="3">Higher secondary</option>
                             <option value="4">Graduate</option>
                             <option value="5">Post graduate</option>
                             <option value="6">M.Phil.</option>
                             <option value="7">Ph.D.</option>
                             <option value="8">Post-Doctoral</option>

                          </select>
                          
                        </div>
                    </div>
                  </div>
              </div>

              <!------ 4th Row -------->

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label col-md-5"> Language( as per Schedule VIII) studied up to* </label>
                      <div class="col-md-7">
                        <select class="form-control" data-placeholder="Choose Blood Group" id="emis_reg_lang_upto" name="emis_reg_lang_upto" autocomplete="off"  required >
                             <option value="" style="color:#bfbfbf;">Select</option>
                             <option value="1">Below secondary</option>
                             <option value="2">Secondary</option>
                             <option value="3">Higher secondary</option>
                             <option value="4">Graduate</option>
                             <option value="5">Post graduate</option>
                             <option value="6">M.Phil.</option>
                             <option value="7">Ph.D.</option>
                             <option value="8">Post-Doctoral</option>

                          </select>
                      </div>
                    </div>
                  </div>      
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label col-md-5"> Social Studies Studied upto* </label>
                        <div class="col-md-7">
                          <select class="form-control" data-placeholder="Choose Blood Group" id="emis_reg_soc_upto" name="emis_reg_soc_upto" autocomplete="off"  required >
                             <option value="" style="color:#bfbfbf;">Select</option>
                             <option value="1">Below secondary</option>
                             <option value="2">Secondary</option>
                             <option value="3">Higher secondary</option>
                             <option value="4">Graduate</option>
                             <option value="5">Post graduate</option>
                             <option value="6">M.Phil.</option>
                             <option value="7">Ph.D.</option>
                             <option value="8">Post-Doctoral</option>

                          </select>
                        </div>
                    </div>
                  </div>
              </div>
              <!--- 5th Row ---->


              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label col-md-5"> Tranined In Computers for Teaching* </label>
                      <div class="col-md-7">
                        <select class="form-control" id="emis_reg_comp_staff" name="emis_reg_comp_staff" autocomplete="off" required>
                          <option value="" selected="selected">select</option>
                          <option value="1">Yes</option>
                          <option value="2">No</option>
                         
                        </select>
                        
                      </div>
                    </div>
                  </div>      
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label col-md-5"> Trained to Teach CWSN Students* </label>
                        <div class="col-md-7">
                          <select class="form-control" data-placeholder="Choose Blood Group" id="emis_reg_cwsn" name="emis_reg_cwsn" autocomplete="off"  required >
                             <option value="" style="color:#bfbfbf;">Select</option>
                             <option value="1">Yes</option>
                             <option value="2">No</option>
                          </select>
                          <font style="color:#dd4b39;"><div id="emis_reg_staff_bg_alert"></div></font>
                        </div>
                    </div>
                  </div>
              </div>
                
                <!--- 6th Row --->
                <div class="row">
                     
                  <div class="col-md-6">
                    <!-- <div class="form-group">
                      <label class="control-label col-md-3"> Trained to Teach CWSN Students* </label>
                        <div class="col-md-9">
                          <select class="form-control" data-placeholder="Choose Blood Group" id="emis_reg_cwsn" name="emis_reg_cwsn" autocomplete="off"  required >
                             <option value="" style="color:#bfbfbf;">Select</option>
                             <option value="1">Yes</option>
                             <option value="2">No</option>
                          </select>
                          <font style="color:#dd4b39;"><div id="emis_reg_staff_bg_alert"></div></font>
                        </div>
                    </div>
                  </div> -->
              </div>
                </div>

              </div>
            </div>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" onclick="return save_full_valid();"class="btn btn-primary">Save</button>
          <div id="err_msg_save3"></div>
        </div>
        </form>
      </div>
    </div>
                      </div>
                    </div>
        </div>
      </div>
    </div>
  </div>

  



        <!----------------- END -------------------------->




            <?php $this->load->view('scripts.php'); ?>
            <!-- BEGIN PAGE LEVEL PLUGINS -->
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
                            <script src="<?php echo base_url().'asset/js/vivekrao/generate.js';?>" type="text/javascript"></script>
    
                           
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
    
            </script>

            <script type="text/javascript">
             var table = '';
    $(document).ready(function()
{
   var table =  sum_dataTable('#sample_3',6);

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
		<script>
		// created by vit //
		var base_url = "<?php echo base_url()?>";
	  function transferactivate(uid,teacher_code)
	 
	  {
		 
		var teacher_id = {'uid':uid,'teacher_code':teacher_code};
    //alert('Click Submit');
    swal({
        title: "Are you sure?",
        text: "Do you want to Transfer Teacher?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, Transfer!",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }, function(isConfirm){
    if (isConfirm) 
		$.ajax(
		{
			data:{teacher_id:teacher_id},
			url: base_url+'Udise_staff/transfer_staff',
			type:"POST",
			dataType:"JSON",
			success:function(res)
			{
				swal("OK", "Your Transfer Updated Successfully", "success");
				window.location.reload();
			}
		});
       // document.getElementById(frmid).submit();
    else
        swal("Cancelled", "Your cancelled the Teacher Transfer", "error");
    });	

		 
	  }

	  //end of the script//
	  </script>
			
		
         </body>



         <script type="text/javascript">

           $("#staff_modal").on("hidden.bs.modal", function(){
    window.location.reload();
});
          // -------------------------Date Picker -----------
        $(document).ready(function(){
    // $('.display').dataTable();
    
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
           
 var curr = new Date();

// console.log(curr.getFullYear()-19); 
var first = new Date(curr.getFullYear() -69,'01','01');
var end = new Date(curr.getFullYear() -12 ,curr.getMonth(), curr.getDate());

set_date('date');

// console.log(first,end);
 $('.date').datepicker("setStartDate",first);

$('.date').datepicker("setEndDate",end);
 // $(".datepicker").val(new Date());

      });

        set_date('date1');
        set_date('date2');
        set_date('date3');
        
        function set_date(id)
        {
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
 var curr = new Date();

var end = new Date(curr.getFullYear() ,curr.getMonth(), curr.getDate()+1);

          $("."+id).datepicker({
              
            });
$('.'+id).datepicker("setEndDate",end);

        }
    </script>
    <script>
      //------------------- Data Append ----------------
      hide_col('emis_reg_dis');
      hide_col('cpsnumber');
      hide_col('epsnumber');
      hide_col('emis_reg_rectrank_enable');
      hide_col('emis_reg_rectyear_enable');
      hide_col('UG');
      hide_col('PG');
      $('.ext_grp').hide();
      var staff_details = <?=json_encode($staffdetails);?>;
	 // console.log(staff_details,'emis-code');
      var staff_detail = '';
      var des_drops = <?=json_encode($staff_cat);?>;
      var aadhar_status = false;
      
      
		function getalldepute(node){
			var u_id = node.value;
			$.ajax({
				type: "POST",
				url:baseurl+'Udise_staff/deputelistall',
				data:"&u_id="+u_id,
				success: function(resp) {
					if(JSON.parse(resp)!=''){
						chaining(resp);
					}else{
						alert("No Record Found");
					}
				},
					error: function(e){ 
					alert('Error: ' + e.responseText);
					return false;  
				}
			});
		}
		function sleep(ms) {
			return new Promise(resolve => setTimeout(resolve, ms));
		}
		
		async function chaining(resp){
			//await sleep(500);
			var loadmode = document.getElementById('loadmodeview');
			var modalview = document.getElementById('loadmodalview');
			loadmode.style.display = 'block';
			
			var i;
			var frmlength = JSON.parse(resp);
			for(i=0; i<frmlength.length; i++){
				
				if(document.getElementById('deputedplace_'+i)!=null){
					if(document.getElementById('deputedplace_'+i).value==''){
						document.getElementById('deputedplace_'+i).value = frmlength[i]['deputed_place'];
						document.getElementById('deputedplace_'+i).onchange();
					}
					if(document.getElementById('districtstaff_'+i).value==''){
						document.getElementById('districtstaff_'+i).value = frmlength[i]['district_id'];
						document.getElementById('districtstaff_'+i).onchange();
						await sleep(500);
					}
					if(document.getElementById('deputedplace_'+i).value==1){
						if(document.getElementById('blockid_'+i).value==''){
							document.getElementById('blockid_'+i).value= frmlength[i]['block_id'];
							document.getElementById('blockid_'+i).onchange();
							await sleep(500);
							
						}
					}
					if(document.getElementById('schoolid_'+i).value==''){
						document.getElementById('schoolid_'+i).value= frmlength[i]['depute_key'];
					}
						
					if(document.getElementById('deputedfmdate_'+i).value==''){
						document.getElementById('deputedfmdate_'+i).value= frmlength[i]['depute_frmdate'];
					}
					if(document.getElementById('deputedtodate_'+i).value==''){
						document.getElementById('deputedtodate_'+i).value= frmlength[i]['depute_todate'];
					}
				}else{
					if(document.getElementById('deputedplace_'+(i-1)).value==1){
						if(document.getElementById('districtstaff_'+(i-1)).value=='' || document.getElementById('blockid_'+(i-1)).value=='' || 			document.getElementById('schoolid_'+(i-1)).value=='')
						{
							i=0;
						}else{
							document.getElementById('btnlbrc_'+(i-1)).onclick();
							loadmode.style.height = modalview.offsetHeight+'px';
							i=0;
						}
					}else if(document.getElementById('deputedplace_'+(i-1)).value ==2){
						if(document.getElementById('districtstaff_'+(i-1)).value=='' || document.getElementById('schoolid_'+(i-1)).value==''){
							i=0;
						}else{
							document.getElementById('btnlbrc_'+(i-1)).onclick();
							loadmode.style.height = modalview.offsetHeight+'px';
							i=0;
						}
					}	
				}
					
			}
			document.getElementById('deputed').value = frmlength[i-1]['deputed'];
			loadmode.style.display = 'none';
		}
      
      function deputation(id){
        
        staff_detail = staff_details.filter(stf=>stf.teacher_code==id)[0];
        
        $('#teacherdepute').text(staff_detail.teacher_name+' - '+staff_detail.teacher_code);
        $('#teacher_code').val(staff_detail.teacher_code);
        $('#u_id').val(staff_detail.u_id);
		$('#teacher_name').val(staff_detail.teacher_name);
		$('#sub_1').val(staff_detail.subject1);
		$('#sub_2').val(staff_detail.subject2);
		$('#sub_3').val(staff_detail.subject3);
		$('#sub_4').val(staff_detail.subject4);
		$('#sub_5').val(staff_detail.subject5);
		$('#sub_6').val(staff_detail.subject6);		
        $('#exampleModal').val(staff_detail.teacher_code);
        
        
      }
      
      
      function resetElement(node){
        var pnode = node.parentNode;
        var len = pnode.children.length;
        for(var i=1;i<len-1;i++){
            pnode.children[i].children[0].children[1].value='';
                
        }
      }
            deputeshow1(0,document.getElementById('wtdschooldetails_0'));
            function deputeshow1(deputevalue,disnode){
                var hd='none';
                if(deputevalue==1){
                    hd='';
                }else if(deputevalue==2){
                    hd='none';
                }
                disnode.style.display=hd;
                           
            }
      
      function deputealllist(currentElement,nextElement,currentValue,url,segmentaddress){
            var dist = currentElement.name;
            
            $.ajax({
                type: "POST",
                url: url+segmentaddress,
                data: "&"+dist+"="+currentElement.value,
                success: function(resp) {
                    var json = JSON.parse(resp);
                    var app = '';
                    var a=n='';
                    if(segmentaddress == 1){
                        a = 'block_id';
                        n = 'block_name';
                    }else if(segmentaddress == 2){
                        a = 'school_id'
                        n = 'school_name';
                    }else if(segmentaddress == 3){
                        a = 'off_key_id'
                        n = 'office_name';
                    }
                    
                    app +="<option value=''>Choose</option>" 
                    for (var j=0;j<json.length;j++){
                        app +="<option value='"+json[j][a]+"'>"+json[j][n]+"</option>";
                    }
                    //alert(nextElement);
                    $("#"+nextElement).html(app);
                    return true;   
                }
            });
      }
      
      function modalsubmit(frmid){
        document.getElementById(frmid).submit();
      }
      
      function modalreset(deputetable) {
		/*var len = document.getElementById(deputetable).children.length;
		alert(len);
		for(var i=len-1;i>0;i--){
			document.getElementById('btnminus_'+i).onclick();
		}*/
		$('#deputationaction').trigger("reset");
			
      }

      
      function textvalidate(id,alertid){
        var x = document.getElementById(id);
        var y = document.getElementById(alertid);
        if(y!=null){
            if(x.value==''){
                y.innerHTML = "This field is required";
            }else{
                y.innerHTML = "";
            }
        }
      }
      
      
      function staff_edit(id)
      {
		  
          staff_detail = staff_details.filter(stf=>stf.u_id==id)[0];

          console.log(staff_detail,'emis_code');
          $(".upload_image").hide();    
          $("#staff_profile").show();
          $("#u1_id").val(staff_detail.u_id);
          $("#teach_id").val(staff_detail.u_id);
          $("#teach3_name").val(staff_detail.teacher_name);
          $("#office_id").val(staff_detail.off_id);
          $("#teacher_id").val(staff_detail.teacher_code);
          $("#teacher_id2").val(staff_detail.teacher_code);
		  
          // Header Details
          $("#staff_id").text(staff_detail.teacher_name);
          $("#emis_category").val(staff_detail.category).attr('selected','selected');
          if(staff_detail.category ==2)
          {
            $("#cat-2").hide();
          }else
          {
            $("#cat-2").show();

          }
          // Personal Information
           get_s3_images(staff_detail.photo);
          $("#emis_image_name").val(staff_detail.photo);
          $("#emis_reg_staff_name").val(staff_detail.teacher_name);
          $("#emis_reg_staff_tname").val(staff_detail.teacher_name_tamil);
          $("#emis_reg_staff_aadhaar").val(staff_detail.aadhar_no);
		  


          designation_drop(staff_detail.category);

          $("#emis_reg_staff_gender").val(staff_detail.gender);
          $("#emis_reg_staff_bg").val(staff_detail.e_blood_grp);
          var dob = change_date_format(staff_detail.staff_dob);
          $(".date").datepicker("update",dob);
          $("#emis_reg_staff_socialcategory").val(staff_detail.social_category);
          $("#emis_reg_staff_fname").val(staff_detail.e_prnts_nme);
          $("#emis_reg_staff_appntedforsubject").val(staff_detail.appointed_subject);
          $("#emis_reg_staff_mname").val(staff_detail.teacher_mother_name);
          $("#emis_reg_sel").val(staff_detail.disability_type);
          if(staff_detail.disability_type !='1')
          {
            $("#emis_reg_dis").show();
          }
          $("#emis_reg_staff_spname").val(staff_detail.teacher_spouse_name);
          $("#emis_reg_staff_distype").val(staff_detail.types_disability);

          // Joining Details
          // $("#")
          var staff_join = change_date_format(staff_detail.staff_join);
          var staff_pjoin = change_date_format(staff_detail.staff_pjoin);
          var staff_psjoin = change_date_format(staff_detail.staff_psjoin);
          $(".date1").datepicker("update",staff_join);
          $(".date2").datepicker("update",staff_pjoin);
          $(".date3").datepicker("update",staff_psjoin);
          
          $("#emis_reg_staff_appntmntnature").val(staff_detail.appointment_nature).attr('selected','selected');
          // console.log(staff_detail.cps_gps_details);
          $("#emis_reg_cpsgps_details option:contains("+staff_detail.cps_gps_details+")").attr('selected','selected');
          gpf_cpf_check(staff_detail.cps_gps_details);
          $("#emis_reg_staff_cps").val(staff_detail.cps_gps);
          $("#emis_reg_staff_suffix").val(staff_detail.suffix).attr('selected','selected');
          $("#emis_reg_rect option:contains("+staff_detail.recruit_type+")").attr('selected','selected');
          check_mode_requ(staff_detail.recruit_type);
          $("#emis_reg_staff_rank").val(staff_detail.recruit_rank);
          $("#emis_reg_staff_yearselection").val(staff_detail.recruit_year).attr('selected','selected');
          // Communication Details
          $("#emis_reg_staff_contact").val(staff_detail.mbl_nmbr);
          $("#emis_reg_staff_email").val(staff_detail.email_id);
          $("#emis_reg_staff_door").val(staff_detail.e_prsnt_doorno);
          $("#emis_reg_staff_street").val(staff_detail.e_prsnt_street);
          $("#emis_reg_staff_city").val(staff_detail.e_prsnt_place);
          $("#emis_reg_staff_pincode").val(staff_detail.e_prsnt_pincode);
          $("#emis_reg_staff_district").val(staff_detail.e_prsnt_distrct).attr('selected','selected');
          
          // Academic Details
          $("#emis_reg_staff_qualificationacademic").val(staff_detail.academic);
          $("#emis_reg_staff_qualificationprofessional").val(staff_detail.tprofessional);
          check_Academic_details(staff_detail.academic);
          $("#emis_reg_staff_ug").val(staff_detail.e_ug);
          $("#emis_reg_staff_pg").val(staff_detail.e_pg);
          
		  //Bank Details
		    // Academic Details
          $("#ifsc_code").val(staff_detail.ifsc_code);
          $("#branch").val(staff_detail.branch);
         
          $("#bankname").val(staff_detail.bank_name);
          $("#accountnumber").val(staff_detail.bank_acc);
           $("#pannumber").val(staff_detail.pan_no);
		   $("#teachercode").val(staff_detail.teacher_code);
		   
          
          // part 2 Get Data
          get_full_staff_part2_data(1,'teacher_dates');
          get_full_staff_part2_data(2,'teacher_regu_dates');
          // part 3 
          select_drop('emis_reg_train_need',staff_detail.trng_needed);
          select_drop('emis_reg_class_taught',staff_detail.class_taught);
          text_val('emis_reg_staff_non_teaching_assig',staff_detail.nontch_days);
          select_drop('emis_reg_mat_upto',staff_detail.math_upto);
          select_drop('emis_reg_sci_upto',staff_detail.science_upto);
          select_drop('emis_reg_eng_upto',staff_detail.english_upto);
          select_drop('emis_reg_lang_upto',staff_detail.lang_study_upto);
          select_drop('emis_reg_soc_upto',staff_detail.soc_study_upto);
          select_drop('emis_reg_comp_staff',staff_detail.trained_cwsn);
          select_drop('emis_reg_cwsn',staff_detail.trained_comp);





          $('#staff_modal').modal('show');

      }

      //----------------------- Category Change -----------------
       $("#emis_category").change(function()
       {  

            designation_drop($(this).val());
            var cate = $(this).val();
            if( cate ==2)
          {
            $("#cat-2").hide();
          }else
          {
            $("#cat-2").show();

          }
       })
      //----------------------- drop create ---------------------
      function designation_drop(cate_id)
      {
        // alert();
        des_drop = des_drops.filter(deg=>deg.category==cate_id);
        // console.log(des_drop);
          $(".deg_group").empty('');
          var des_drop_det = '';
        des_drop_det = '<select name="emis_reg_staff_teachertype" id="emis_reg_staff_teachertype" class="form-control" required>'
          des_drop_det += '<option value>Select type of teacher</option>';
          $.each(des_drop,function(i,val)
          {
              des_drop_det +='<option value='+val.id+'>'+val.type_teacher+'</option>';
          });
          des_drop_det +='</select>';
          // console.log(des_drop_det);
          $(".deg_group").html(des_drop_det);
          if(cate_id == staff_detail.category){
          $("#emis_reg_staff_teachertype").val(staff_detail.teacher_type).attr('selected','selected');
          }else
          {
            $("#emis_reg_staff_teachertype").val('').attr('selected','selected');
          }
          // Chose The Category Change the value
          // Main Subjects Taught
          if(cate_id==1)
          {
            show_col('sub_tab');
            show_col('app_sub');
            acadamic_drop(0);
            $("#emis_reg_staff_mainsubjcttaughtsubj1").val(staff_detail.subject1).attr('selected','selected');
            $("#emis_reg_staff_mainsubjcttaughtsubj2").val(staff_detail.subject2).attr('selected','selected');
            $("#emis_reg_staff_mainsubjcttaughtsubj3").val(staff_detail.subject3).attr('selected','selected');
			 $("#emis_reg_staff_mainsubjcttaughtsubj4").val(staff_detail.subject4).attr('selected','selected');
			  $("#emis_reg_staff_mainsubjcttaughtsubj5").val(staff_detail.subject5).attr('selected','selected');
			   $("#emis_reg_staff_mainsubjcttaughtsubj6").val(staff_detail.subject6).attr('selected','selected');


          }else
          {
            hide_col('sub_tab');
            hide_col('app_sub');
            acadamic_drop(1);
          }
          
      }
      //-------------- Acadamic Drop ---------------------
      function acadamic_drop(vis_id)
      {
        // console.log(vis_id);
        var academic_det = <?=json_encode($academic);?>;
        var aca_drop = '';
        if(vis_id ==0)
        {
          academic_det = academic_det.filter(aca=>aca.visibility==0);
        }
        aca_drop = '<select class="form-control" id="emis_reg_staff_qualificationacademic" name="emis_reg_staff_qualificationacademic"    required>';

          $.each(academic_det,function(i,val)
          {
            // console.log(val);
              aca_drop +='<option value='+val.id+'>'+val.academic_teacher+'</option>';
              // if(val.visibility==vis_id)
              // {
                // aca_drop +='<option value='+val.id+'>'+val.academic_teacher+'</option>';

              // }
          });
          aca_drop +='</select>';

          $(".acd_drop").empty('');
          $('.acd_drop').append(aca_drop);

      }

      $("#emis_reg_sel").change(function()
      {
        var dis_val = $(this).val();
          $("#emis_reg_dis").hide();
          console.log(dis_val);
          if(dis_val !='1' && dis_val !='')
          {
            $("#emis_reg_dis").show();
          }
      });
      // --------------- Hide Function ----------------------------
      function hide_col(id)
      {
        $("#"+id).hide();
      }
      //------------------- Show Function -------------------------
      function show_col(id)
      {
        $("#"+id).show();
      }

      //-------------- CPF Change Function -------------------------

      $("#emis_reg_cpsgps_details").change(function()
      {
        // alert();
        // console.log($(this).find('option:selected').text());

          gpf_cpf_check($(this).find('option:selected').text());
      })

      //-------------------- Mode of Requ -------------------------
      $("#emis_reg_rect").change(function(){
          check_mode_requ($(this).find('option:selected').text());
      });
      //------------------ Change Acadamic Details -----------------
      $(document).on('change',"#emis_reg_staff_qualificationacademic",function()
      {
          check_Academic_details($(this).val());
      })
      //------------------- Change Date Format ---------------------
      function change_date_format(change_date)
      {
        var date = new Date(change_date);
        var dob_month = date.getMonth()+1;
        var date_change = (date.getDate() < 10 ? '0'+date.getDate():date.getDate())+'-'+(dob_month < 10 ? '0'+dob_month:dob_month)
+'-'+date.getFullYear();
        // console.log(date_change);
        return date_change;
      }

      //------------------ Check Aadhar -----------------------------

      $("#emis_reg_staff_aadhaar").change(function()
      {
          var aadhar_no = $(this).val();
          console.log(aadhar_no);
          $("#emis_reg_staff_aadhaar_alert").html('');
          if(aadhar_no !='')
          { 
            $("#emis_reg_staff_aadhaar_alert").html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:17px"></i>Loading...');
            data = {'aadhar_no':aadhar_no,'id':staff_detail.u_id};
            // console.log('if');
            $.ajax({
                method:"POST",
                dataType:"JSON",
                data:data,
                url:'<?=base_url()."Udise_staff/check_aadhar_no"?>',
                success:function(res)
                {

                    // console.log(res);
                    aadhar_status = res;
                    if(res)
                    {
                      $("#emis_reg_staff_aadhaar_alert").html('<p>AADHAR Already Exists in Database');
                      
                    }else
                    {
                       $("#emis_reg_staff_aadhaar_alert").html('');

                    }
                }
            })
          }
      })

      function gpf_cpf_check(val)
      {
        hide_col('cpsnumber');
      hide_col('epsnumber');
      $("#emis_reg_staff_cps").val('');
      $("#emis_reg_staff_suffix").val('').attr('selected','selected');
          switch(val)
          {
              case 'GPF':
              show_col('cpsnumber');
              show_col('epsnumber');
              break;
              case 'CPS':
              show_col('cpsnumber');
              show_col('epsnumber');
              break;
              case 'TPF':
              show_col('cpsnumber');
              show_col('epsnumber');
              case 'EPF':

              show_col('epsnumber');
              break;
              default:
              hide_col('cpsnumber');
      hide_col('epsnumber');
              break;
                 
          }
      }

      function check_mode_requ(mode_val)
      {
          hide_col('emis_reg_rectrank_enable');
          hide_col('emis_reg_rectyear_enable');
          $("#emis_reg_staff_rank").val('');
          $("#emis_reg_staff_yearselection").val('')
          switch(mode_val)
          {
              case 'TNPSC':
                show_col('emis_reg_rectrank_enable');
                show_col('emis_reg_rectyear_enable');
              break;
              case 'TRB':
                show_col('emis_reg_rectrank_enable');
                show_col('emis_reg_rectyear_enable');
              break;
              case 'TET':
                show_col('emis_reg_rectrank_enable');
                show_col('emis_reg_rectyear_enable');
              break;
              default:
                hide_col('emis_reg_rectrank_enable');
                hide_col('emis_reg_rectyear_enable');
              break;

          }
      }

      function check_Academic_details(acad_val)
      { 
          hide_col('UG');
          hide_col('PG');

          $("#emis_reg_staff_ug").val('');
          $("#emis_reg_staff_pg").val('');
          if(acad_val == 4)
          {
              show_col('UG');
          }else if(acad_val >=5 && acad_val<=8)
          {
            show_col('UG');
            show_col('PG');
          }else if(acad_val >=9)
          {

              hide_col('UG');
           hide_col('PG');
          }
          else
          {
            hide_col('UG');
           hide_col('PG');
          }
      }

      function save_valid()
      {
        var category = $("#emis_category").val();
        var sub1 = $("#emis_reg_staff_mainsubjcttaughtsubj1").val();
        var cpf_gpf_det = $("#emis_reg_cpsgps_details").val();
        var reg_cps = $("#emis_reg_staff_cps").val();
        var suffix = $("#emis_reg_staff_suffix").val();
        // console.log(cpf_gpf_det,reg_cps,suffix);
        var mode_requ = $("#emis_reg_rect").val();
        var rank_det = $("#emis_reg_staff_rank").val();
        var teacher_type = $("#emis_reg_staff_teachertype").val();
        var yearselection = $("#emis_reg_staff_yearselection").val(); 
        var academic_det = $("#emis_reg_staff_qualificationacademic").val();
        var UG = $("#emis_reg_staff_ug").val();
        var PG = $("#emis_reg_staff_pg").val();
		    var staff_name = $("#emis_reg_staff_name").val();
        var staff_tname = $("#emis_reg_staff_tname").val();
        $("#err_msg_save").html('');
		if(staff_name=='')
		{
			$("#err_msg_save").html('<p style="color:red">Please Enter The Staff Name</p>');
            return false;
		}else if(staff_tname=='')
    {
      $("#err_msg_save").html('<p style="color:red">Please Enter The Staff Name in tamil</p>');
            return false;
    }else if(aadhar_status){
        $("#err_msg_save").html('<p style="color:red">AADHAR Already Exists in Database</p>');
            return false;
        }else if(teacher_type =='')
        {
            $("#err_msg_save").html('<p style="color:red">Please Select Designation of Teacher</p>');
            return false;
        }else if(category==1 && sub1=='')
        {
            $("#err_msg_save").html('<p style="color:red">Please Select Subject1</p>');
            return false;
        }else if(cpf_gpf_det =='')
        {
           $("#err_msg_save").html('<p style="color:red">Please Select GPF/CPS/EPF Details</p>');
            return false;
        }else if(cpf_gpf_det ==5 && reg_cps =='')
        {
            $("#err_msg_save").html('<p style="color:red">Please Enter GPF/CPS/EPF Number</p>');
            return false;
        }else if(((cpf_gpf_det == 1 || cpf_gpf_det==2) && reg_cps =='') || ((cpf_gpf_det ==1 || cpf_gpf_det==2) &&suffix==''))
        {
            $("#err_msg_save").html('<p style="color:red">Please Enter GPF/CPS/EPF Number or  Select Suffix</p>');
            return false;
        }else if(mode_requ=='')
        {
           $("#err_msg_save").html('<p style="color:red">Please Select Mode Of Recruitment</p>');
            return false;
        }else if(((mode_requ ==1 || mode_requ==2) && rank_det=='') || ((mode_requ ==1 || mode_requ==2) && yearselection==''))
        {
           $("#err_msg_save").html('<p style="color:red">Please Enter The Recruitment Rank or Select Year</p>');
            return false;
        }else if(academic_det=='')
        {
          $("#err_msg_save").html('<p style="color:red">Please Select Academic</p>');
            return false;
        }else if(academic_det==4 && UG=='')
        {
          $("#err_msg_save").html('<p style="color:red">Please Select UG</p>');
            return false;
        }else if((academic_det >=5 && academic_det<=8 && UG=='') || (academic_det >=5 && academic_det<=8 && PG==''))
        {
            $("#err_msg_save").html('<p style="color:red">Please Select UG or Select PG</p>');
            return false;
        }
        else
        {
          return true;
        }
      }
    </script>
    <!-------------------------- Part 2 ----------------------------->
   <script type="text/javascript">
        

        var reg_grp = '';
        var count =0;
        var pro_count =0;
        var pro_dec_grp = '';
        var main = false;
        $(document).ready(function(){
          
        });
        function regulation_multi()
        { 

          


            reg_grp = '<tr id="regulation_tr'+count+'"><td style="width: 200px;"> <select id="regulation_drop'+count+'" name="regulation_drop'+count+'" class="form-control" ><option value="">Choose</option><option value="1">SGT</option><option value="2">PET</option><option value="3">Spl.Tr.</option><option value="4">BT</option><option value="5">PG</option><option value="6">Computer Instructor</option><option value="7">Headmaster HSS</option><option value="8">Headmaster HS</option><option value="9">Headmaster Middle School</option><option value="10">Headmaster Primary School</option><option value="11">Vocational Instructor</option><option value="12">PD Grade-I</option><option value="13">PD Grade-II</option><option value="14">BRTE</option></select></td><td style="width: 200px;"><input type="text" name="regulation_date'+count+'"  class="form-control sdate " id="regulation_date'+count+'" value="" autocomplete="off" placeholder="DD-MM-YYYY" onkeypress="return event.charCode >= 48" /><input type="hidden" name="rd_id'+count+'" class="rd_id" id="rd_id'+count+'"></td><td><select id="mode_drop'+count+'" name="mode_drop'+count+'" class="form-control" ><option value="">Choose</option><option value="1">TNPSC</option><option value="2">TRB</option><option value="11">TET</option><option value="3">Compassionate Grounds</option><option value="4">Transfer of Services</option><option value="6">Employment Seniority</option><option value="7" >Retrenched Census Employees</option><option value="8">Management</option><option value="9">SSA</option><option value="10">Direct Recruitment</option><option value="13">Promotion</option><option value="12">Unit Transfer</option></select></select></td><td style="text-align: center;"><button type="button" id="" class="btn spa_date"  name="" onclick="valid('+count+');"><i class="fa fa-plus"></i></button><button type="button" class="btn btn-remove" id="" name=""><i class="fa fa-minus"></i></button></td></tr>';
          count++; 
          $("#regulation_table tbody").append(reg_grp);
        }

        function valid(c_i)
        {
            var reg_drop = $("#regulation_drop"+c_i).val();
          var reg_date = $("#regulation_date"+c_i).val();
          // console.log(reg_drop);
          if(reg_date !='' && reg_date !='')
          {
            
            regulation_multi();
          }
        }

        
        $(document).on('click',".spa_date", function(){
          // setTimeout(function(){
    $('.sdate').on('focus').datepicker();
      var curr = new Date();

  var end = new Date(curr.getFullYear() ,curr.getMonth(), curr.getDate()+1);
    $('.sdate').datepicker("setEndDate",end);
          console.log($(this).datepicker());
          // alert();
        

        });

        $(document).on('focus',".sdate1", function(){
    $(this).datepicker();
          });


          $(document).on('click','.btn-remove',function(e){

            var r_id = $(this).closest("tr").find("td:eq(1)").find('.rd_id').val(); 

            var table_len = $("#regulation_table >tbody>tr").length;
            if(table_len !=1){
              console.log(r_id);
              if(r_id == ''){
              
                console.log('if');
              // count --;
            $(this).parent().parent().remove();

            }else
            {
              // console.log('else');
               remove_main_records(r_id,this);
              //   if(table_len !=1 && main =='true'){
              //   // count --;
              // $(this).parent().parent().remove();

              // }
              // console.log(main);

            }
          }
          

        })

        function remove_main_records(id,table_data)
        {

          // var rd_id = $("#rd_id"+id).val();
            
            swal({    
                        title: "Are you sure?",
                        text: "Do you want to Remove Data?",
                        type: "info",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes!",
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true
                    }, function(isConfirm){
                        if(isConfirm)
                        {
                          $.ajax({

                            method:"POST",
                            data:{'id':id},
                            url:'<?=base_url()."Udise_staff/remove_reg_data"?>',
                            dataType:"JSON",
                            success:function(res)
                            {
                              swal.close();
                               $(table_data).parent().parent().remove();
                            }
                          })
                        }else
                        {

                        }
                });
          
        }

        function probation_dec_multi()
        {
          // alert();
            // console.log($("#regulation >tbody>tr").length);
              pro_dec_grp = '';
              pro_dec_grp +='';

              pro_count++;

              // $("#pro_regulation tbody").append(pro_dec_grp);
        }

        $(document).on('click','.btn-pro-remove',function()
        {
            var table_len = $("#pro_regulation >tbody>tr").length;
            

            if(table_len !=1){
              
              // $("#probation_count").val(pro_count);
            $(this).parent().parent().remove();

            }

        });



        //-----------------Teacher Extra Part ------------------------- //

        $('input[type=radio][name=mother_tongue]').on('change', function() {
            
            var mother_tongue = $(this).val();
            $('.ext_grp').hide();
            switch(parseInt(mother_tongue))
            {
              case 1:
              hide_col('tamil_lang');
              break;
              case 2:
              show_col('tamil_lang');
              break;
            }
        });
        $('input[type=radio][name=tamil_pass]').on('change', function() {
            
            var tamil_pass = $(this).val();

            switch(parseInt(tamil_pass))
            {
              case 1:
              hide_col('tnpsc_lang');
              break;
              case 2:
              show_col('tnpsc_lang');
              break;
            }
        });
        $('input[type=radio][name=punish]').on('change', function() {
            
            var tamil_pass = $(this).val();

            switch(parseInt(tamil_pass))
            {
              case 1:
              hide_col('punish_grp');
              break;
              case 2:
              show_col('punish_grp');
              break;
            }
        });
        $('input[type=radio][name=relinguish]').on('change', function() {
            
            var tamil_pass = $(this).val();
            // alert(tamil_pass);
            switch(parseInt(tamil_pass))
            {
              case 1:
              show_col('date_grp');
              break;
              case 2:
              hide_col('date_grp');
              break;
            }
        });





        function get_full_staff_part2_data(flag,table)
        {
            var data = {'flag':flag,'table':table,'teacher_code':staff_detail.teacher_code};
            // alert();
            $.ajax({
              method:"POST",
              data:data,
              url:"<?=base_url().'Udise_staff/get_staff_secondpart_details'?>",
              dataType:"JSON",
              success:function(res)
              {
                // alert('res');
                // console.log(2385,res);
                  switch(flag)
                  {
                    case 1:
                      
                      if(res !=null){
                        text_val('d_id',res.id);
                      //date
                      

                      // 
                      text_val('sslc_dop',(res.sslc_dop !='0000-00-00'?change_date_format(res.sslc_dop):''));
                      text_val('higersec_dop',(res.higersec_dop !='0000-00-00'?change_date_format(res.higersec_dop):''));
                      text_val('doj_block',(res.doj_block !='0000-00-00'?change_date_format(res.doj_block):''));
                      text_val('doj_dept',(res.doj_dept !='0000-00-00'?change_date_format(res.doj_dept):''));
                      text_val('promo_eligi_date',res.promo_eligi_date !=''?change_date_format(res.promo_eligi_date):'');
                      select_drop('prob_id',res.prob_id);
                      text_val('prob_date',res.prob_date !='0000-00-00'?change_date_format(res.prob_date):'');
                      select_drop('head_acc',res.head_account);
                      $("input[name='relinguish'][value="+res.relinguish+"]").attr('checked',true);
                      if(res.relinguish==1)
                      {
                          show_col('date_grp');
                          text_val('relinguish_date',res.relinguish_date!='0000-00-00'?change_date_format(res.relinguish_date):'');

                      }
                      
                      }


                    break;
                    case 2:
                    console.log(res.length);
                    if(res.length !=0)
                    {
                        $.each(res,function(i,val){
                          regulation_multi();

                          select_drop('regulation_drop'+i,val.type_date);
                          select_drop('mode_drop'+i,val.appoint_nature);
                          text_val('regulation_date'+i,val.dates !='0000-00-00'?change_date_format(val.dates):'');
                          text_val('rd_id'+i,val.id);
                          $('.sdate').on('focus').datepicker();
                          
                        });
                    }else
                    {
                      regulation_multi();
                    }
                    break
                  }
              }

            })
        }


        function text_val(id,val)
        {
            $("#"+id).val(val);
        }

        function select_drop(id,val)
        {
            $("#"+id).val(val).attr('selected','selected');
        }


        function save_full_valid()
        {
            
            text_val("teacher_id",staff_detail.teacher_code);
            text_val("count",count);
            text_val('teach_name',staff_detail.teacher_name);
            // $("#school_key_id").val(staff_detail.)
          // console.log(staff_detail);

            return true;
        }
        
        function view(id) {
            var i=0;
            var x = document.getElementsByClassName('tabcontent'); 
            for(i=0;i<x.length;i++) {
                x[i].style.display='none';
            }
            document.getElementById(id).style.display='block';
        }



        /***************image upload teacher****************/

function get_s3_images(staff_data)
    {
        var emis = 'Teachers/photo_all';
            staff_data = emis+'/'+staff_data+'.jpgx';
            if(staff_data!=null)
            {
                $.ajax(
                {
                    type: "POST",
                    url:baseurl+'Home/get_aws_s3_image',
                    data:{'records':staff_data},
                    dataType:"JSON",
                    success: function(image_data)
                    {
                            // console.log(image_data);

                        var images = '<img  src="'+image_data+'" class="img-responsive image" alt="Select Image" id="image"  width="150" height="175" onerror=this.onerror=null;this.src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg">';
                        $("#staff_profile").html(images);


                    }

                })
            }
    }





          $(document).ready(function(){
        $(".upload_image").hide();
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
    })

    $(document).on('click','#image',function() {
        // alert();
    $("input[id='staff_images']").click();
});


    
var _URL = window.URL || window.webkitURL;

$("#staff_images").change(function(e) {
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
    $("#staff_profile").hide();
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
    // console.log($image_crop);
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
        $("#staff_profile").show();

                        $("#staff_profile").html(image);
    })
  });
          
		  
		  function ifsccode() {
  
  var ifsc=$("#ifsc_code").val();
  var length=ifsc.toString().length;
 //alert(length);
 if(ifsc !=0 && length>=10){
	// alert('correct');
    $.ajax(
    {
        type: "POST",
        url:baseurl+'Udise_staff/get_bank_details',
        data:{'ifsc':ifsc},
        success: function(resp){
       // console.log(resp);  
       
       // var section = JSON.parse(resp);
		//var bankdetails=JSON.parse(resp);
		//console.log(bankdetails);
		//console.log(resp.length);
	   var bankdetails=JSON.parse(resp);
	   console.log(bankdetails)
		if(bankdetails.length > 0)
		{
		
		var branch=bankdetails[0].branch;
		var bankname=bankdetails[0].bank_name;
		var id=bankdetails[0].id;
	    $('#branch').val(branch);
        $("#bankname").val(bankname);
		$("#bankid").val(id);
		$("#accountnumber").val('');
		
         }
		 else
		 {
			 alert('please enter valid ifscode');
			  $('#ifsc_code').val('');
			  // $('#branch').val('');
              // $("#bankname").val('');
			  // $("#bankid").val('');
		 }
        },  
    })
    }
}
        
    </script>

      </html>
	  
	  