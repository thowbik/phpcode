<?php if(!empty($staff_new_details[0]->school_name)) 
{
	$newschool=$staff_new_details[0]->school_name;
	$blockname=$staff_new_details[0]->block_name;
	$districtname=$staff_new_details[0]->district_name;
}
else
{
$newschool= $staff_new_details[0]->office_name;	
$blockname=$staff_old_details[0]->block_name;
$districtname=$staff_old_details[0]->district_name;
}
?>
<table style="height: 159px; width: 100%; border-collapse: collapse;" border="1">
<tbody>
<tr style="border-collapse: collapse; border: 1px solid black;">
<td style="width: 99.0369%; text-align: center; font-size: 13px;" colspan="2">
<span><?=$ceo_details[0]->tamil_name;?> மாவட்ட முதன்மைக் கல்வி அலுவலரின் செயல்முறைகள்</span><br>
<span>முன்னிலை:திரு/திருமதி. <?=$ceo_details[0]->officer_name.' '.$ceo_details[0]->officer_qualifi;?></span><br>
<span>ந.க.எண்.&nbsp;<?=$staff_old_details[0]->rc_no;?>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;நாள்.&nbsp;<?= date("d/m/Y") ?></span>
</tr>
<tr style="border-collapse: collapse;">
<td style="width: 16.1701%; text-align: center;">
<p>பொருள்</p>
</td>
<td style="width: 82.8668%; height: 50px; font-size: 13px;">
<p>தமிநாடு பள்ளிக் கல்வி சார்நிலைப்பணி &ndash; அரசு உயர்நிலை மேல்நிலைப் பள்ளிகளில் பணிபுரியும் பட்டதாரி ஆசிரியர்கள் நிர்வாக மாறுதல் வழங்கி ஆணையிடுதல் &ndash; சார்பு.</p>
</td>
</tr>
<tr style="border-collapse: collapse;">
<td style="width: 16.1701%; text-align: center;">
<p>பார்வை</p>
</td>
<td style="width: 82.8668%; height: 50px; font-size: 13px;">
<p>1)&nbsp; அரசாணை எண்.1(டி)218 பள்ளிக் கல்வி (பக5(1) துறை நாள்.20.6.2019</p>
2)&nbsp; சார்ந்த ஆசிரியரது விண்ணப்பம்.</td>
</tr>
</tbody>
</table>
<div style="font-size: 13px; margin-top: 6px; margin-bottom: 6px;">&nbsp; &nbsp; &nbsp; &nbsp; பார்வை -1 ல் காணும் அரசாணையின்படி  2019-2020 ம் கல்வி ஆண்டிற்கு பொது மாறுதல் வழங்குதல் சார்ந்து நெறிமுறைகள் வகுக்கப்பட்டுள்ளன .அதனடிப்படையில் கீழ்க்காணும் ஆசிரியருக்கு பார்வை -2 ல் காணும் அன்னாரின் விண்ணப்பத்தின்படி அவர் பெயருக்கு எதிரே குறிப்பிட்டுள்ள பள்ளிக்கு நிர்வாக மாறுதல் ஆணை வழங்கப்படுகிறது .</div>
<table style="height: 135px; width: 100%; border-collapse: collapse;" border="1">
<tbody>
<tr style="height: 100px; border-collapse: collapse; border: 1px solid black;">
<td style="width: 32%; text-align: center; height: 50px; font-size: 13px;">
<p> ஆசிரியர் பெயர் ,பதவி மற்றும் தற்போது பணிபுரியும் பள்ளி</p>
</td>
<td style="width: 18.4059%; text-align: center; height: 50px; font-size: 13px;">
<p align="center"> பாடம்</p>
</td>
<td style="width: 30.5941%; text-align: center; height: 50px; font-size: 13px;">
<p> மாறுதல் செய்யப்படும் பள்ளியின் பெயர் மற்றும் மாவட்டம்</p>
</td>
</tr>
<tr style="height: 66px; border-collapse: collapse; border: 1px solid black;">
<td style="width: 32%; height: 66px; font-size: 13px;">&nbsp;<?=$staff_old_details[0]->teacher_name.',<br>&nbsp;'.$staff_old_details[0]->type_teacher.',<br>&nbsp;'.$staff_old_details[0]->school_name.',<br>&nbsp;'.$staff_old_details[0]->block_name.' BLOCK,<br>&nbsp;'.$staff_old_details[0]->district_name.' DISTRICT';?></td>
<td style="width: 18.4059%; height: 66px; font-size: 13px;">&nbsp;<?=$staff_old_details[0]->subjects;?></td>
<td style="width: 30.5941%; height: 66px; font-size: 13px;">&nbsp;<?=$staff_old_details[0]->teacher_name.',<br>&nbsp;'.$newschool.',<br>&nbsp;'.$blockname.' BLOCK,<br>&nbsp;'.$districtname.' DISTRICT';?></td>
</tr>
</tbody>
</table>
<div style="text-align: left;">&nbsp;</div>
<div style="text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;சம்பந்தப்பட்ட ஆசிரியரை உடன் மாறுதல் பெற்ற பணியிடத்தில் பணியில் சேரும் வகையில் விடுவிக்குமாறு சம்பந்தப்பட்ட பள்ளித் தலைமை ஆசிரியர் கேட்டுக் கொள்ளப்படுகிறார் .</div>
<div style="text-align: left;">
<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;இவ்வாணையை மாற்றம் செய்யவோ ,இரத்து செய்யவோ கோரும் விண்ணப்பம் ஏற்றுக் கொள்ளப்படமாட்டாது .</p>
<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ஆசிரியரின் பணிவிடுவிப்பு மற்றும் பணியேற்பு அறிக்கையை உடனுக்குடன் இவ்வலுவலகத்திற்கு பணிந்தனுப்ப சம்பந்தப்பட்ட பள்ளித் தலைமை ஆசிரியர் கேட்டுக் கொள்ளப்படுகிறார் .</p>
</div>
<br /><br />
<div style="text-align: right; font-size: 13px;">மாவட்டக் கல்வி அலுவலர்,</div>
<span>பெறுநர்:<br />&nbsp; &nbsp;திரு /திருமதி. <?=$staff_old_details[0]->teacher_name;?></span><br />
<br /><span> நகல்:&nbsp; சம்பந்தப்பட்ட பள்ளித் தலைமை ஆசிரியர்</span>