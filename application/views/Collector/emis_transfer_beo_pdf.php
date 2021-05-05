<?php 
	
?>
<div style="border-collapse: collapse;border: 1px solid black;">
<table style="height: 77px; width: 100%; border-collapse: collapse; border: 1px solid black;">
<tbody>
<tr style="height: 34px;">
<td style="width: 90px; text-align: center; height: 34px; background-color: #bfbfbf;" colspan="6"><strong>Transfer Request Application</strong></td>
</tr>
<tr style="height: 56px;">

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
<td style="width: 221px;">&nbsp;Date of Birth</td>
<td style="width: 12px;">&nbsp;:</td>
<td style="width: 323px;"><?= date('d-m-Y',strtotime($staff_details->dob));?>&nbsp;</td>
</tr>
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;Designation</td>
<td style="width: 12px;">&nbsp;:</td>
<td style="width: 323px;"><?= 'Block Education Officer';?>&nbsp;</td>
</tr>
<!--<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;Date of Retirement</td>
<td style="width: 12px;">&nbsp;:</td>
<td style="width: 323px;"><?=date('d-m-Y',strtotime($staff_details->date_retirement));?>&nbsp;</td>
</tr> -->

<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;Recruitment Mode</td>
<td style="width: 12px;">&nbsp;:</td>
<td style="width: 323px;"><?=($staff_details->recruit_mode);?>&nbsp;</td>
</tr>
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;First Date of joining as middle school HM</td>
<td style="width: 12px;">&nbsp;:</td>
<td style="width: 323px;"><?=($staff_details->doj_mhm);?>&nbsp;</td>
</tr>
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;Date of joining as BEO</td>
<td style="width: 12px;">&nbsp;:</td>
<td style="width: 323px;"><?=($staff_details->doj_beo);?>&nbsp;</td>
</tr>
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;Date of joining as BEO In Present Station</td>
<td style="width: 12px;">&nbsp;:</td>
<td style="width: 323px;"><?=($staff_details->doj_pr_beo);?>&nbsp;</td>
</tr>
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;District</td>
<td style="width: 12px;">&nbsp;:</td>
<td style="width: 323px;"><?=($staff_details->district_name);?>&nbsp;</td>
</tr>
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;Block</td>
<td style="width: 12px;">&nbsp;:</td>
<td style="width: 323px;"><?=($staff_details->block_name);?>&nbsp;</td>
</tr>
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;District in which appointed as Middle School HM</td>
<td style="width: 12px;">&nbsp;:</td>
<td style="width: 323px;"><?=($staff_details->mhm_district);?>&nbsp;</td>
</tr>
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 221px;">&nbsp;Block in which appointed as Middle School HM</td>
<td style="width: 12px;">&nbsp;:</td>
<td style="width: 323px;"><?=($staff_details->mhm_block);?>&nbsp;</td>
</tr>
</tbody>
</table>
</div>