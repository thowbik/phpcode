<!DOCTYPE html> 

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    <style>
        .dashboard-stat2 {
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    -ms-border-radius: 2px;
    -o-border-radius: 2px;
    border-radius: 2px;
    background: #fff;
    padding: 15px 15px 14px !important;
}
    .dashboard-stat2 .display {
    margin-bottom: 2px !important;
}
.bottom
{
  border-bottom: 1px solid gray;
}
.bs-callout-lightsteelblue {
    border-left: 8px solid lightsteelblue;
    border-radius: 3% !important;
}
.bs-callout-darkseagreen {
    border-left: 8px solid darkseagreen;
    border-radius: 3% !important;
}
.bs-callout-mediumaquamarine {
    border-left: 8px solid mediumaquamarine;
    border-radius: 3% !important;
}
.bs-callout-lightblue {
    border-left: 8px solid lightblue;
    border-radius: 3% !important;
}

.x_panel
{
      padding: 0px 8px !important;
}
.x_title {
    border-bottom: 2px solid #E6E9ED;
    margin: 0px -7px 0px;
    margin-bottom: 10px;
}
.khaki
{
  background-color: khaki;
  color: black;
}
.lightgrey
{
  background-color: lightgrey;
  color: black;

}
.lightyellow
{
  background-color: #f3a84ea6;
  color: black;

}
.lightgreen
{
  background-color: #ceeabf;
  color: black;

}
    </style>
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->

        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
      
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
           

  <?php $this->load->view('Collector/header.php'); ?>

            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <!-- BEGIN CONTAINER -->
                    <div class="page-container">
                        <!-- BEGIN CONTENT -->
                        <div class="page-content-wrapper">
                            <!-- BEGIN CONTENT BODY -->
                            <!-- BEGIN PAGE HEAD-->
                         
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">
                                <div></div>
                                <div class="container">
     
                                    <div class="page-content-inner">

                                     <div class="portlet-body">



                                               
                                           <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                             <i class="fa fa-globe"></i> HM(HS)  Eligible for Promotion</div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">

                                                     
                                                   
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th>Name</th>
 <th>Teacher ID</th>
 <th>Gender</th>
 <th>Date Of <br>Appointment</th>
																	
																	<th>Date of join <br>Present School</th>
																	<th>Date of <br>Regularization<br>in Current Post</th> 
																	<th>Date of Birth</th>
																	<th>Subject</th>
																	<th>Designation</th>
                                                                    <th>Eligible of </br>Promotion?</th>
                                            <th>Major1</th>
											<th>Panel1</th>
											<th style="width:8px;" >Rank</th>
											<th>Major2</th>
											<th>Panel2</th>
											<th style="width:8px;" >Rank</th>
											<th>Major3</th>
											<th>Panel3</th>
											<th style="width:8px;" >Rank</th>



                                                                </tr>
                                                                </thead>
                                                              
                                                                
                                                            <?php $i=1;
                                                         if(!empty($dsehsschoolstaffpromot)){
                                                         
															foreach($dsehsschoolstaffpromot as $sd){
																
                                                             
                                                             ?>

                                                                              <tr>
								<td><?php echo $i;?></td>
								
								<td><?=$sd->teacher_name;?>
								<input type="hidden" id="teacher_id<?=$i?>" value="<?=$sd->teacher_id;?>">
								<input type="hidden" id="school_key_id<?=$i?>" value="<?=$sd->school_key_id;?>">
								<input type="hidden" id="district_id<?=$i?>" value="<?=$sd->district_id;?>">
								<input type="hidden" id="edu_dist_id<?=$i?>" value="<?=$sd->edu_dist_id;?>">
								<input type="hidden" id="block_id<?=$i?>" value="<?=$sd->block_id;?>">
								</td>
								<td><?=$sd->teacher_id;?></td>
								
								<td><?php echo $sd->gender==1?'Male':'Female'; ?>
								<input type="hidden" id="doj_pr_post<?=$i?>" 
								value="<?php echo $sd->doj_pr_post !='0000-00-00' && $sd->doj_pr_post != '' ?date('d-m-Y', strtotime($sd->doj_pr_post)):'--'; ?>">
								</td>
								
								
								<td ><?= date('d-m-Y',strtotime($sd->appointment_date))
														
								?>
								<input type="hidden" id="appointment_date<?=$i?>" value="<?php echo $sd->appointment_date !='0000-00-00' && $sd->appointment_date != '' ?date('d-m-Y', strtotime($sd->appointment_date)):'--'; 
								?>">
								
								</td>
								
								<td ><?= date('d-m-Y', strtotime($sd->doj_pr_school))
								?>
								
								<input type="hidden"id="doj_pr_school<?=$i?>" value="<?php echo $sd->doj_pr_school !='0000-00-00' && $sd->doj_pr_school != '' ?date('d-m-Y', strtotime($sd->doj_pr_school)):'--'; 
								?>">
								</td>
								
								<td><?php echo $sd->regularisation_date !='0000-00-00' && $sd->regularisation_date != '' ?date('d-m-Y', strtotime($sd->regularisation_date)):'--'; ?></td>
							
							
								<td><?=
								date('d-m-Y', strtotime($sd->dob))?>
								
								<input type="hidden"id="dob<?=$i?>" value="<?php echo $sd->dob !='0000-00-00' && $sd->dob != '' ?date('d-m-Y', strtotime($sd->dob)):'--';?>">
								</td>
								<td> <?= $sd->subject ?>
								  <input type="hidden" id="m_id<?= $i?>" value="<?=$sd->trans_id;?>">
								   </td>
								   
								<td><?=$sd->type_teacher;?>
								<input type="hidden" id="des<?=$i?>"value="<?=$sd->teacher_type;?>">
								<input type="hidden" id="appointed_subject<?= $i?>" value="<?=$sd->appointed_subject;?>">
								<input type="hidden" id="e_doj_prpost<?= $i?>" value="<?=$sd->teacher_type;?>">
								<input type="hidden" id="prof<?= $i?>" value="<?=$sd->professional;?>">
								<input type="hidden" id="regularisation_date<?= $i?>" value="<?php echo $sd->regularisation_date !='0000-00-00' && $sd->regularisation_date != '' ?date('d-m-Y', strtotime($sd->regularisation_date)):'--'; ?>">
								<input type="hidden" id="doj_block<?= $i?>" value="<?php echo $sd->doj_block !='0000-00-00' && $sd->doj_block != '' ?date('d-m-Y', strtotime($sd->doj_block)):'--';?>">
								
								</td>
										  
						  
							 
							 <td >
							 <select name="profile_count"id="profile<?php echo $i ?>" class="sur_class" >
							 
<option value="0" <?=$sd->promo_eligible == 1 ?'selected="selected"':'';?>>No</option>
<option value="1" <?=$sd->promo_eligible == 1 ?'selected="selected"':'';?>>Yes</option>

</select>

</td>
							 <td>
							 <select name="major_count1" id="major<?php echo $i ?>" class="major_class" >
							 
<option value="SameMajor" <?=$sd->major1 == 'SameMajor' ?'selected="selected"':'';?>>Same Major</option>
<option value="CrossMajor" <?=$sd->major1 == 'CrossMajor' ?'selected="selected"':'';?>>Cross Major</option>

</select>

</td>      
  
	 <td >
							 <select name="profile_count1"id="profile1<?php echo $i ?>" class="sur_class1" >
<option value="0" >select panel</option>							 
<option value="27HM(HSS)" <?=$sd->panel1 == 'HM(HSS)' ?'selected="selected"':'';?>>HM(HSS)</option>
<option value="26HM(HS)" <?=$sd->panel1 == 'HM(HS)' ?'selected="selected"':'';?>>HM(HS) </option>
<option value="50PG-Bio-Chemistry" <?=$sd->panel1 == 'PG-Bio-Chemistry' ?'selected="selected"':'';?> >PG-Bio-Chemistry</option>
<option value="11PG-Biology" <?=$sd->panel1 == 'PG-Biology' ?'selected="selected"':'';?>>PG-Biology</option>
<option value="26PG-Botany" <?=$sd->panel1 == 'PG-Botany' ?'selected="selected"':'';?> >PG-Botany</option>
<option value="13PG-Chemistry" <?=$sd->panel1 == 'PG-Chemistry' ?'selected="selected"':'';?>>PG-Chemistry</option>
<option value="51PG-Commerce" <?=$sd->panel1 == 'PG-Commerce' ?'selected="selected"':'';?>>PG-Commerce</option>
<option value="15PG-Economics" <?=$sd->panel1 == 'PG-Economics' ?'selected="selected"':'';?> >PG-Economics</option>
<option value="46PG-English" <?=$sd->panel1 == 'PG-English' ?'selected="selected"':'';?>>PG-English</option>
<option value="18PG-Geography" <?=$sd->panel1 == 'PG-Geography' ?'selected="selected"':'';?>>PG-Geography</option>
<option value="19PG-History" <?=$sd->panel1== 'PG-History' ?'selected="selected"':'';?>>PG-History</option>
<option value="20PG-Home Science" <?=$sd->panel1 == 'PG-Home Science' ?'selected="selected"':'';?>>PG-Home Science</option>
<option value="55PG-Indian Culture" <?=$sd->panel1 == 'PG-Indian Culture' ?'selected="selected"':'';?>>PG-Indian Culture</option>
<option value="3 PG-Mathematics" <?=$sd->panel1 == 'PG-Mathematics' ?'selected="selected"':'';?> >PG-Mathematics</option>
<option value="56PG-Micro Biology" <?=$sd->panel1 == 'PG-Micro Biology' ?'selected="selected"':'';?>>PG-Micro Biology</option>
<option value="57PG-Nutrition" <?=$sd->panel1 == 'PG-Nutrition' ?'selected="selected"':'';?>>PG-Nutrition</option>
<option value="22PG-Physics" <?=$sd->panel1 == 'PG-Physics' ?'selected="selected"':'';?> >PG-Physics</option>
<option value="23PG-Political Science" <?=$sd->panel1== 'PG-Political Science' ?'selected="selected"':'';?>>PG-Political Science</option>
<option value="48PG-Tamil" <?=$sd->panel1 == 'PG-Tamil' ?'selected="selected"':'';?>>PG-Tamil</option>
<option value="27PG-Zoology" <?=$sd->panel1 == 'PG-Zoology' ?'selected="selected"':'';?>>PG-Zoology</option>
<option value="37Physical Director Gr. I" <?=$sd->panel1== 'Physical Director Gr. I' ?'selected="selected"':'';?>>Physical Director Gr. I</option>
<option value="12Computer Instructor" <?=$sd->panel1 == 'Computer Instructor' ?'selected="selected"':'';?>>Computer Instructor</option>
<option value="48Agriculture Instructor " <?=$sd->panel1 == 'Agriculture Instructor' ?'selected="selected"':'';?>>Agriculture Instructor</option>
<option value="38Physical Director Gr. II"  <?=$sd->panel1 == 'Physical Director Gr. II' ?'selected="selected"':'';?>>Physical Director Gr. II</option>


</select>

</td>
<td><input type="text" style="width:60px !important;" id="rank<?php echo $i ?>" value ="<?= $sd->panel1_rank;?>" name="rank1" >
</td>

	 <td >
							 <select name="major_count2" id="major2<?php echo $i ?>" class="major_class2" >
							 
<option value="SameMajor" <?=$sd->major2 == 'SameMajor' ?'selected="selected"':'';?>>Same Major</option>
<option value="CrossMajor" <?=$sd->major2 == 'CrossMajor' ?'selected="selected"':'';?>>Cross Major</option>

</select>

</td>   
 	 <td >
							 <select name="profile_count2"id="profile2<?php echo $i ?>" class="sur_class2" >
<option value="0" >select panel</option>							 
<option value="27HM(HSS)" <?=$sd->panel2 == 'HM(HSS)' ?'selected="selected"':'';?>>HM(HSS)</option>
<option value="26HM(HS)" <?=$sd->panel2 == 'HM(HS)' ?'selected="selected"':'';?>>HM(HS) </option>
<option value="50PG-Bio-Chemistry" <?=$sd->panel2 == 'PG-Bio-Chemistry' ?'selected="selected"':'';?> >PG-Bio-Chemistry</option>
<option value="11PG-Biology" <?=$sd->panel2 == 'PG-Biology' ?'selected="selected"':'';?>>PG-Biology</option>
<option value="26PG-Botany" <?=$sd->panel2 == 'PG-Botany' ?'selected="selected"':'';?> >PG-Botany</option>
<option value="13PG-Chemistry" <?=$sd->panel2 == 'PG-Chemistry' ?'selected="selected"':'';?>>PG-Chemistry</option>
<option value="51PG-Commerce" <?=$sd->panel2 == 'PG-Commerce' ?'selected="selected"':'';?>>PG-Commerce</option>
<option value="15PG-Economics" <?=$sd->panel2 == 'PG-Economics' ?'selected="selected"':'';?> >PG-Economics</option>
<option value="46PG-English" <?=$sd->panel2 == 'PG-English' ?'selected="selected"':'';?>>PG-English</option>
<option value="18PG-Geography" <?=$sd->panel2 == 'PG-Geography' ?'selected="selected"':'';?>>PG-Geography</option>
<option value="19PG-History" <?=$sd->panel2 == 'PG-History' ?'selected="selected"':'';?>>PG-History</option>
<option value="20PG-Home Science" <?=$sd->panel2 == 'PG-Home Science' ?'selected="selected"':'';?>>PG-Home Science</option>
<option value="55PG-Indian Culture" <?=$sd->panel2 == 'PG-Indian Culture' ?'selected="selected"':'';?>>PG-Indian Culture</option>
<option value="3 PG-Mathematics" <?=$sd->panel2 == 'PG-Mathematics' ?'selected="selected"':'';?> >PG-Mathematics</option>
<option value="56PG-Micro Biology" <?=$sd->panel2 == 'PG-Micro Biology' ?'selected="selected"':'';?>>PG-Micro Biology</option>
<option value="57PG-Nutrition" <?=$sd->panel2 == 'PG-Nutrition' ?'selected="selected"':'';?>>PG-Nutrition</option>
<option value="22PG-Physics" <?=$sd->panel2 == 'PG-Physics' ?'selected="selected"':'';?> >PG-Physics</option>
<option value="23PG-Political Science" <?=$sd->panel2 == 'PG-Political Science' ?'selected="selected"':'';?>>PG-Political Science</option>
<option value="48PG-Tamil" <?=$sd->panel2 == 'PG-Tamil' ?'selected="selected"':'';?>>PG-Tamil</option>
<option value="27PG-Zoology" <?=$sd->panel2 == 'PG-Zoology' ?'selected="selected"':'';?>>PG-Zoology</option>
<option value="37Physical Director Gr. I" <?=$sd->panel2 == 'Physical Director Gr. I' ?'selected="selected"':'';?>>Physical Director Gr. I</option>
<option value="12Computer Instructor" <?=$sd->panel2 == 'Computer Instructor' ?'selected="selected"':'';?>>Computer Instructor</option>
<option value="48Agriculture Instructor" <?=$sd->panel2 == 'Agriculture Instructor' ?'selected="selected"':'';?>>Agriculture Instructor</option>
<option value="38Physical Director Gr. II"  <?=$sd->panel2 == 'Physical Director Gr. II' ?'selected="selected"':'';?>>Physical Director Gr. II</option>


</select>

</td>
<td><input type="text" style="width:60px !important;" name="rank2" id="rank2<?php echo $i ?>" value ="<?= $sd->panel2_rank;?>" class ="rank2"></td>

		 <td >
							 <select name="major_count3" id="major3<?php echo $i ?>" class="major_class3" >
							 
<option value="SameMajor" <?=$sd->major3 == 'SameMajor' ?'selected="selected"':'';?>>Same Major</option>
<option value="CrossMajor" <?=$sd->major3 == 'CrossMajor' ?'selected="selected"':'';?>>Cross Major</option>

</select>

</td>   
 	 <td >
							 <select name="profile_count3"id="profile3<?php echo $i ?>" class="sur_class3" >
<option value="0" >select panel</option>							 
<option value="27HM(HSS)" <?=$sd->panel3 == 'HM(HSS)' ?'selected="selected"':'';?>>HM(HSS)</option>
<option value="26HM(HS)" <?=$sd->panel3 == 'HM(HS)' ?'selected="selected"':'';?>>HM(HS) </option>
<option value="50PG-Bio-Chemistry" <?=$sd->panel3 == 'PG-Bio-Chemistry' ?'selected="selected"':'';?> >PG-Bio-Chemistry</option>
<option value="11PG-Biology" <?=$sd->panel3 == 'PG-Biology' ?'selected="selected"':'';?>>PG-Biology</option>
<option value="26PG-Botany" <?=$sd->panel3 == 'PG-Botany' ?'selected="selected"':'';?> >PG-Botany</option>
<option value="13PG-Chemistry" <?=$sd->panel3 == 'PG-Chemistry' ?'selected="selected"':'';?>>PG-Chemistry</option>
<option value="51PG-Commerce" <?=$sd->panel3 == 'PG-Commerce' ?'selected="selected"':'';?>>PG-Commerce</option>
<option value="15PG-Economics" <?=$sd->panel3 =='PG-Economics' ?'selected="selected"':'';?> >PG-Economics</option>
<option value="46PG-English" <?=$sd->panel3 == 'PG-English' ?'selected="selected"':'';?>>PG-English</option>
<option value="18PG-Geography" <?=$sd->panel3 == 'PG-Geography' ?'selected="selected"':'';?>>PG-Geography</option>
<option value="19PG-History" <?=$sd->panel3 == 'PG-History' ?'selected="selected"':'';?>>PG-History</option>
<option value="20PG-Home Science" <?=$sd->panel3 == 'PG-Home Science' ?'selected="selected"':'';?>>PG-Home Science</option>
<option value="55PG-Indian Culture" <?=$sd->panel3 == 'PG-Indian Culture' ?'selected="selected"':'';?>>PG-Indian Culture</option>
<option value="3 PG-Mathematics" <?=$sd->panel3 == 'PG-Mathematics' ?'selected="selected"':'';?> >PG-Mathematics</option>
<option value="56PG-Micro Biology" <?=$sd->panel3 == 'PG-Micro Biology'?'selected="selected"':'';?>>PG-Micro Biology</option>
<option value="57PG-Nutrition" <?=$sd->panel3 == 'PG-Nutrition' ?'selected="selected"':'';?>>PG-Nutrition</option>
<option value="22PG-Physics" <?=$sd->panel3 == 'PG-Physics' ?'selected="selected"':'';?>>PG-Physics</option>
<option value="23PG-Political Science" <?=$sd->panel3 == 'PG-Political Science' ?'selected="selected"':'';?>>PG-Political Science</option>
<option value="48PG-Tamil" <?=$sd->panel3 == 'PG-Tamil' ?'selected="selected"':'';?>>PG-Tamil</option>
<option value="27PG-Zoology" <?=$sd->panel3 == 'PG-Zoology' ?'selected="selected"':'';?>>PG-Zoology</option>
<option value="37Physical Director Gr. I" <?=$sd->panel3 == 'Physical Director Gr. I' ?'selected="selected"':'';?>>Physical Director Gr. I</option>
<option value="12Computer Instructor" <?=$sd->panel3 == 'Computer Instructor' ?'selected="selected"':'';?>>Computer Instructor</option>
<option value="48Agriculture Instructor" <?=$sd->panel3 == 'Agriculture Instructor' ?'selected="selected"':'';?>>Agriculture Instructor</option>
<option value="38Physical Director Gr. II"  <?=$sd->panel3 == 'Physical Director Gr. II' ?'selected="selected"':'';?>>Physical Director Gr. II</option>


</select>

</td>
<td><input type="text" style="width:60px !important;" name="rank3" id="rank3<?php echo $i ?>" value ="<?= $sd->panel3_rank;?>"class ="rank3"></td>	

										  
								  </tr>
                                                                <?php $i++;?>
                                                                  <?php
                                                          
                                                        }?>
                                                            
                                                      
                                                            </tbody>

                                                            <tfoot>
                                                              
                                                              
                                                            </tfoot>
                                                              <?php } ?>
 
                                            </table>
                          
                          
                                    <!-- END PAGE TITLE -->
                                    <!-- BEGIN PAGE TOOLBAR -->
                                    <div class="page-toolbar">
                                        <!-- BEGIN THEME PANEL -->
                          
                                        <!-- END THEME PANEL -->
                                    </div>
                                    <!-- END PAGE TOOLBAR -->
<div class ="row">
                                       <div class="col-md-12" >
                                                              <div class="form-group" style="padding: 10px;margin-top: 15px">
                                                               
                                                                <button type="submit" class="btn green btn-lg" onclick ="saveleaveperiods()">Submit</button>
                                                              </div>
                                                              </div>
                                </div>
                                </div>

                            </div>


                            </div>
                                                       
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->          

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

           
        </script>

         <script type="text/javascript">
//changes values


 
function saveleaveperiods()
{
		
	var dsegovsurplus_sgstaff = <?=json_encode($dsehsschoolstaffpromot);?>;
	
	school_promotion = new Array();

for(var i =1;i<=dsegovsurplus_sgstaff.length;i++)
{



var teach_id =$("#teacher_id"+i).val();
var school_id = $("#school_key_id"+i).val();
var dist_id = $("#district_id"+i).val();
var edu_dist_id = $("#edu_dist_id"+i).val();
var block =$("#block_id"+i).val();
var dpp =$("#doj_pr_post"+i).val();
var subject =$("#appointed_subject"+i).val();
var adate =$("#appointment_date"+i).val();
var dps =$("#doj_pr_school"+i).val();
var dob =$("#dob"+i).val();
var des =$("#des"+i).val();
var m_id =$("#m_id"+i).val();
var tetype =$("#e_doj_prpost"+i).val();
var prof  =$("#prof"+i).val();
var regdate =$("#regularisation_date"+i).val();
var dojb =$("#doj_block"+i).val();
var modeule_id1 = $("#profile"+i).val();
var panel1 = $("#profile1"+i).val();
var panel2 = $("#profile2"+i).val();
var panel3 = $("#profile3"+i).val();
var rank1 =$("#rank"+i).val();
var rank2 =$("#rank2"+i).val();
var rank3 =$("#rank3"+i).val();
var major1 =$("#major"+i).val();
var major2 =$("#major2"+i).val();
var major3 =$("#major3"+i).val();

    if(m_id ==''){
			if(modeule_id1 != 0)
			{
			school_promotion.push({'modeule_id1':modeule_id1,'school_id':school_id,'teach_id':teach_id,'subject':subject,'dist_id':dist_id,'edu_dist_id':edu_dist_id,'block':block
			,'dpp':dpp,'adate':adate,'dps':dps,'dob':dob,'des':des,'tetype':tetype,'prof':prof,'regdate':regdate,'dojb':dojb,'panel1':panel1,'panel2':panel2,'panel3':panel3,'rank1':rank1,'rank2':rank2,'rank3':rank3,'major1':major1,'major2':major2,'major3':major3});
			}
        }else
			{
				school_promotion.push({'modeule_id1':modeule_id1,'school_id':school_id,'teach_id':teach_id,'subject':subject,'dist_id':dist_id,'edu_dist_id':edu_dist_id,'block':block
			,'dpp':dpp,'adate':adate,'dps':dps,'dob':dob,'des':des,'tetype':tetype,'prof':prof,'regdate':regdate,'dojb':dojb,'panel1':panel1,'panel2':panel2,'panel3':panel3,'rank1':rank1,'rank2':rank2,'rank3':rank3,'major1':major1,'major2':major2,'major3':major3});
				 
			}
}
// console.log(school_promotion); 
// return false;

$.ajax(
{
data:{'school_promotion':school_promotion},
url:baseurl+'Collector/save_promotion',
type:"POST",
dataType:"JSON",

success:function(res)
{
swal("OK", "Save Successfully", "success");
location.reload();
}
});


}


$('#emis_state_report_schmanage').click(function () {   
console.log(this.checked,$('input:checkbox').find(".school_manage").find());
$('input:checkbox').prop('checked', this.checked);
if(this.checked){   
// console.log($(this).val());
}
});
</script> 

  
    </body>

</html>
