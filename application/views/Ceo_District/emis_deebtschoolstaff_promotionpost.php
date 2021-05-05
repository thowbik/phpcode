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


<?php $this->load->view('Ceo_District/header.php'); ?>

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
									 <i class="fa fa-globe"></i> BT Teacher  Eligible for Promotion</div>
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
											<!--<th>Subject</th> -->
											<th>Eligible of </br>Promotion?</th>
                                            <th>Panel1</th>
											<th style="width:8px;" >Senority No.</th>
											
											<th>Panel2</th>
											<th style="width:8px;" >Senority No.</th>
											
											<th>Panel3</th>
											<th style="width:8px;" >Senority No.</th>



										</tr>
										</thead>
									  
										
									<?php $i=1;
								 if(!empty($deebtschoolstaffpromot)){
								
									foreach($deebtschoolstaffpromot as $sd){
										
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
		 <!-- <td>
							 <select name="major_count1" id="major<?php echo $i ?>" class="major_class" >
							 
<option value="SameMajor" <?=$sd->major1 == 'SameMajor' ?'selected="selected"':'';?>>Same Major</option>
<option value="CrossMajor" <?=$sd->major1 == 'CrossMajor' ?'selected="selected"':'';?>>Cross Major</option>

</select>

</td>  --> 
  
	 <td >
							 <select name="profile_count1"id="profile1<?php echo $i ?>" class="sur_class1" >
<option value="0" >select panel</option>							 
<option value="28  HM(MiddleSchool)" <?=$sd->panel1 == 'HM(MiddleSchool)' ?'selected="selected"':'';?>>HM(MiddleSchool)</option>
<option value="29  HM(PrimarySchool)" <?=$sd->panel1 == 'HM(PrimarySchool)' ?'selected="selected"':'';?>>HM(PrimarySchool) </option>
<option value="1146BT Asst-English" <?=$sd->panel1 == 'BT Asst-English' ?'selected="selected"':'';?> >BT Asst-English</option>
<option value="1148BT Asst-Tamil" <?=$sd->panel1 == 'BT Asst-Tamil' ?'selected="selected"':'';?>>BT Asst-Tamil</option>
<option value="113 BT Asst-Mathematics" <?=$sd->panel1 == 'BT Asst-Mathematics' ?'selected="selected"':'';?> >BT Asst-Mathematics</option>
<option value="117 BT Asst-Science" <?=$sd->panel1 == 'BT Asst-Science' ?'selected="selected"':'';?>>BT Asst-Science</option>
<option value="118 BT Asst-Social Science" <?=$sd->panel1 == 'BT Asst-Social Science' ?'selected="selected"':'';?>>BT Asst-Social Science</option>




</select>

</td>
<td><input type="text" style="width:60px !important;" id="rank<?php echo $i ?>" value ="<?= $sd->panel1_rank;?>" name="rank1" >
</td>

	 <!-- <td >
							 <select name="major_count2" id="major2<?php echo $i ?>" class="major_class2" >
							 
<option value="SameMajor" <?=$sd->major2 == 'SameMajor' ?'selected="selected"':'';?>>Same Major</option>
<option value="CrossMajor" <?=$sd->major2 == 'CrossMajor' ?'selected="selected"':'';?>>Cross Major</option>

</select>

</td>   -->
 	 <td >
							 <select name="profile_count2"id="profile2<?php echo $i ?>" class="sur_class2" >
<option value="0" >select panel</option>							 
<option value="28  HM(MiddleSchool)" <?=$sd->panel2 == 'HM(MiddleSchool)' ?'selected="selected"':'';?>>HM(MiddleSchool)</option>
<option value="29  HM(PrimarySchool)" <?=$sd->panel2 == 'HM(PrimarySchool)' ?'selected="selected"':'';?>>HM(PrimarySchool) </option>
<option value="1146BT Asst-English" <?=$sd->panel2 == 'BT Asst-English' ?'selected="selected"':'';?> >BT Asst-English</option>
<option value="1148BT Asst-Tamil" <?=$sd->panel2 == 'BT Asst-Tamil' ?'selected="selected"':'';?>>BT Asst-Tamil</option>
<option value="113 BT Asst-Mathematics" <?=$sd->panel2 == 'BT Asst-Mathematics' ?'selected="selected"':'';?> >BT Asst-Mathematics</option>
<option value="117 BT Asst-Science" <?=$sd->panel2 == 'BT Asst-Science' ?'selected="selected"':'';?>>BT Asst-Science</option>
<option value="118 BT Asst-Social Science" <?=$sd->panel2 == 'BT Asst-Social Science' ?'selected="selected"':'';?>>BT Asst-Social Science</option>



</select>

</td>
<td><input type="text" style="width:60px !important;" name="rank2" id="rank2<?php echo $i ?>" value ="<?= $sd->panel2_rank;?>" class ="rank2"></td>

		 <!-- <td >
							 <select name="major_count3" id="major3<?php echo $i ?>" class="major_class3" >
							 
<option value="SameMajor" <?=$sd->major3 == 'SameMajor' ?'selected="selected"':'';?>>Same Major</option>
<option value="CrossMajor" <?=$sd->major3 == 'CrossMajor' ?'selected="selected"':'';?>>Cross Major</option>

</select>

</td>   -->
 	 <td >
							 <select name="profile_count3"id="profile3<?php echo $i ?>" class="sur_class3" >
<option value="0" >select panel</option>							 
<option value="28  HM(MiddleSchool)" <?=$sd->panel3 == 'HM(MiddleSchool)' ?'selected="selected"':'';?>>HM(MiddleSchool)</option>
<option value="29  HM(PrimarySchool)" <?=$sd->panel3 == 'HM(PrimarySchool)' ?'selected="selected"':'';?>>HM(PrimarySchool) </option>
<option value="1146BT Asst-English" <?=$sd->panel3 == 'BT Asst-English' ?'selected="selected"':'';?> >BT Asst-English</option>
<option value="1148BT Asst-Tamil" <?=$sd->panel3 == 'BT Asst-Tamil' ?'selected="selected"':'';?>>BT Asst-Tamil</option>
<option value="113 BT Asst-Mathematics" <?=$sd->panel3 == 'BT Asst-Mathematics' ?'selected="selected"':'';?> >BT Asst-Mathematics</option>
<option value="117 BT Asst-Science" <?=$sd->panel3 == 'BT Asst-Science' ?'selected="selected"':'';?>>BT Asst-Science</option>
<option value="118 BT Asst-Social Science" <?=$sd->panel3 == 'BT Asst-Social Science' ?'selected="selected"':'';?>>BT Asst-Social Science</option>



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

// $(document).ready(function() {
    // $('#sample_2').DataTable( {
        // "order": [[ 5, "asc" ]]
    // } );
// } );

function saveleaveperiods()
{

var dsegovsurplus_sgstaff = <?=json_encode($deebtschoolstaffpromot);?>;

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
// var major1 =$("#major"+i).val();
// var major2 =$("#major2"+i).val();
// var major3 =$("#major3"+i).val();

    if(m_id ==''){
			if(modeule_id1 != 0)
			{
			school_promotion.push({'modeule_id1':modeule_id1,'school_id':school_id,'teach_id':teach_id,'subject':subject,'dist_id':dist_id,'edu_dist_id':edu_dist_id,'block':block
			,'dpp':dpp,'adate':adate,'dps':dps,'dob':dob,'des':des,'tetype':tetype,'prof':prof,'regdate':regdate,'dojb':dojb,'panel1':panel1,'panel2':panel2,'panel3':panel3,'rank1':rank1,'rank2':rank2,'rank3':rank3});
			}
        }else
			{
				school_promotion.push({'modeule_id1':modeule_id1,'school_id':school_id,'teach_id':teach_id,'subject':subject,'dist_id':dist_id,'edu_dist_id':edu_dist_id,'block':block
			,'dpp':dpp,'adate':adate,'dps':dps,'dob':dob,'des':des,'tetype':tetype,'prof':prof,'regdate':regdate,'dojb':dojb,'panel1':panel1,'panel2':panel2,'panel3':panel3,'rank1':rank1,'rank2':rank2,'rank3':rank3});
				 
			}
}
// console.log(school_promotion); 
// return false;

$.ajax(
{
data:{'school_promotion':school_promotion},
url:baseurl+'Ceo_District/save_promotiondee',
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
