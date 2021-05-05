<?php 
	
?>
<div style="border-collapse: collapse;border: 1px solid black;">
<table style="height: 77px; width: 100%; border-collapse: collapse; border: 1px solid black;">
<tbody>
<tr style="height: 34px;">
<td style="width: 90px; text-align: center; height: 34px; background-color: #bfbfbf;" colspan="6"><strong>Transfer Request Application</strong></td>
</tr>
<tr style="height: 56px;">


<?php 
 $school_details  = explode(",",$staff_details->school_type);

 foreach($school_details as $school)
 {
print_r($school);
switch($school)
	{
		
		case 1:
		echo '<td style="width: 90px; height: 56px;" colspan="6"> Panchayat School</td>';

		break;
		case 2:
		echo '<td style="width: 90px; height: 56px;" colspan="6"> Municipal School</td>';
		break;
		
		
	}
	
	// if($school==1)
// {
	// echo '<td style="width: 90px; height: 56px;"> Government School</td>';
// }
// elseif($school==2)
// {
	// echo '<td style="width: 90px; height: 56px;"> Municipal School</td>';
// }
	
	 }?>
	 
	 
	

</tr>
</tbody>


</table>
<table style="height: 30px; width: 100%; border-collapse: collapse; border: 1px solid black;">
<tbody>
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;Name of the Teacher</td>
<td style="width: 12px;">&nbsp;:</td>
<td style="width: 323px;"><?=($staff_details->name);?>&nbsp;</td>
</tr>
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;Gender</td>
<td style="width: 12px;">&nbsp;:</td>
<td style="width: 323px;"><?=($staff_details->gender==1?'Male':'Female');?>&nbsp;</td>
</tr>
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;Date of Birth</td>
<td style="width: 12px;">&nbsp;:</td>
<td style="width: 323px;"><?= date('d-m-Y',strtotime($staff_details->dob));?>&nbsp;</td>
</tr>
<!--<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;Date of Retirement</td>
<td style="width: 12px;">&nbsp;:</td>
<td style="width: 323px;"><?=date('d-m-Y',strtotime($staff_details->date_retirement));?>&nbsp;</td>
</tr> -->
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;Mobile Phone No</td>
<td style="width: 12px;">&nbsp;:</td>
<td style="width: 323px;"><?=($staff_details->mobile);?>&nbsp;</td>
</tr>
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;Designation</td>
<td style="width: 12px;">&nbsp;:</td>
<td style="width: 323px;"><?=($staff_details->type_teacher);?>&nbsp;</td>
</tr>
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;Subject</td>
<td style="width: 12px;">&nbsp;:</td>
<td style="width: 323px;"><?=($staff_details->subjects);?>&nbsp;</td>
</tr>
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;Education District</td>
<td style="width: 12px;">&nbsp;:</td>
<td style="width: 323px;"><?=($staff_details->edu_dist_name);?>&nbsp;</td>
</tr>
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;Revenue District</td>
<td style="width: 12px;">&nbsp;:</td>
<td style="width: 323px;"><?=($staff_details->district_name);?>&nbsp;</td>
</tr>
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;Block</td>
<td style="width: 12px;">&nbsp;:</td>
<td style="width: 323px;"><?=($staff_details->block_name);?>&nbsp;</td>
</tr>
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;Applied Options </td>
<td style="width: 12px;">&nbsp;:</td>
<?php 

 $trans_location=$staff_details->transfer_location;
 $trans_details  = explode(",",$trans_location);
// print_r($trans_location);
 
?>
<td style="width: 323px;"><?php foreach($trans_details as $trans)
 {
if($trans==1)
{
	echo 'With In Block -';
}
elseif($trans==2)
{
	echo 'Block to Block -';
}
elseif($trans==3)
{
	echo 'District to District- ';
}
 }?>&nbsp;</td>



</tr>
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">
<div class="col-md-4"><label class="control-label">&nbsp;First date of joining in the present post</label></div>
</td>
<td style="width: 12px;">&nbsp;:&nbsp;</td>
<td style="width: 323px;">
<?=($staff_details->doj_pr!='0000-00-00' && $staff_details->doj_pr!='' ?date('d-m-Y',strtotime($staff_details->doj_pr)):'-');?>
&nbsp;</td>
</tr>
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">
<div class="col-md-4"><label class="control-label">&nbsp;Date of regularisation in the&nbsp; present post</label></div>
</td>
<td style="width: 12px;">&nbsp;:&nbsp;</td>
<td style="width: 323px;">
<?=($staff_details->maxdates!='0000-00-00' && $staff_details->maxdates!=''?date('d-m-Y',strtotime($staff_details->maxdates)):'-');?>
&nbsp;</td>
</tr>
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;Date of joining in the present school </td>
<td style="width: 12px;">&nbsp;:&nbsp;</td>
<td style="width: 323px;">
<?=($staff_details->doj_pr_schol!='0000-00-00'  && $staff_details->doj_pr_schol!=''?date('d-m-Y',strtotime($staff_details->doj_pr_schol)):'-');?>
&nbsp;</td>
</tr>
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;Nature of joining in the present School&nbsp;</td>
<td style="width: 12px;">&nbsp;:&nbsp;</td>
<td style="width: 323px;"><?=($staff_details->joining_reason);?>&nbsp;</td>
</tr>
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">
<div class="col-md-4"><label class="control-label">&nbsp;Name of the present school</label></div>
</td>
<td style="width: 12px;">&nbsp;:&nbsp;</td>
<td style="width: 323px;"><?=($staff_details->school);?>&nbsp;</td>
</tr>

<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;UDISE Code</td>
<td style="width: 12px;">&nbsp;:&nbsp;</td>
<td style="width: 323px;"><?=($staff_details->udise_code)?>&nbsp;</td>
</tr>
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;<label class="control-label">Reason for the transfer request</label></td>
<td style="width: 12px;">&nbsp;:&nbsp;</td>
<td style="width: 323px;"><?=($staff_details->transfer_reason);?>&nbsp;</td>
</tr>
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;Details of the district to which transfer is requested</td>
<td style="width: 12px;">&nbsp;:&nbsp;</td>
<td style="width: 323px;"><?=($staff_details->school_name);?>&nbsp;</td>
</tr>
<!-- <tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;School Name</td>
<td style="width: 12px;">&nbsp;:&nbsp;</td>
<td style="width: 323px;"><?=($staff_details->school_name);?>&nbsp;</td>
</tr> 
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;Edn. District</td>
<td style="width: 12px;">&nbsp;:&nbsp;</td>
<td style="width: 323px;"><?=($staff_details->edu_dist_name);?>&nbsp;</td>
</tr> -->
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;Panel Type</td>
<td style="width: 12px;">&nbsp;:&nbsp;</td>
<td style="width: 323px;"><?=($staff_details->panel_type);?>&nbsp;</td>
</tr>
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;Details of the priority if claimed</td>
<td style="width: 12px;">&nbsp;:&nbsp;</td>
<td style="width: 323px;"><?=($staff_details->description);?>&nbsp;</td>
</tr>

<!--<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;Date of treatment</td>
<td style="width: 12px;">&nbsp;:&nbsp;</td>
<td style="width: 323px;"><?=($staff_details->kidney_treat_date!='0000-00-00'?date('d-m-Y',strtotime($staff_details->kidney_treat_date)):'-');?>&nbsp;</td>
</tr> 
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">
<div class="col-md-4">
<div class="form-group">&nbsp;Either husband or wife working in State / Central / Govt. Undertakings office and which located in a place which is more than 30 K.m. of distance from another may be considered with necessary certification from the competent authority</div>
</div>
</td>
<td style="width: 12px;">&nbsp;:&nbsp;</td>
<td style="width: 323px;"><?=($staff_details->spouse_district!='0'?$staff_details->spouse_district:'-');?>&nbsp;</td>
</tr> -->
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;Distance between the places of where the employee is working and his/her spouse is working</td>
<td style="width: 12px;">&nbsp;:&nbsp;</td>
<td style="width: 323px;"><?=($staff_details->spouse_district!='0'? $staff_details->spouse_district: '-');?>&nbsp;</td>
</tr>
</tbody>
</table>
</div>