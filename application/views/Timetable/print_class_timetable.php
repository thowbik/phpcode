
<table style="height: 309px; width: 100%; border-collapse: collapse;" border="1">
<tbody>
<tr style="height: 50px;">
<td style="text-align: center; height: 50px;font-size: 24px;" colspan="9">
<p><b><?php echo $school; ?></b></p>
</td>
</tr>
<tr style="height: 40px;background-color: #aeb3b3;">
<td style="width: 58px; height: 40px;border-right-style: hidden;" colspan="2">
<p>&nbsp;<b>Class :&nbsp;<?php echo $class ?></b></p>
</td>
<td style="width: 58px; height: 40px;border-right-style: hidden;" colspan="2">
<p>&nbsp;<b>Sec :&nbsp;<?php echo $section ?></b></p>
</td>
<td style="width: 58px; height: 40px;border-right-style: hidden;" colspan="2">
<p>&nbsp;<b>From Date :&nbsp;<?php echo $fromdate ?></b></p>
</td>
<td style="width: 58px; height: 40px;border-right-style: hidden;" colspan="2">
<p>&nbsp;<b>To Date :&nbsp;<?php echo $todate ?></b></p>
</td>
<td style="width: 58px; height: 40px;">
<p>&nbsp;<b>Medium :</b>&nbsp;</p>
</td>
</tr>
<tr>
<th style="width:10%;height: 50px;background-color: #aeb3b3;">Days</th>
<?php $noofperiods=8; ?>
<?php  
for ($x = 1; $x <= $noofperiods; $x++) { ?>
<th style="background-color: #aeb3b3;">Period:<?php echo $x ?></th>
<?php
} 
?>

</tr>
<tr>
<td style="height: 60px;text-align:center;background-color: #aeb3b3;"><strong>Monday</strong></td>

<?php 

for ($x = 1; $x <= $noofperiods; $x++) {		
?>		
<td style="width:30px;height: 60px;font-size:14px;">
<?php
if(!empty($timetabledetails_monday_pdf))
{
foreach($timetabledetails_monday_pdf as $r){
if($r->status==$x)
{
if($r->subjects=='' && $r->teacher_name=='')
{
echo 'Not Assigned';
}
else if($r->subjects==leave && $r->teacher_name==leave)
{
echo 'Leave';
}
else
{
echo $r->subjects;
echo '-<br>';
echo $r->teacher_name;
}
}




}
}
?>
</td>
<?php } ?>
</tr>
<tr>
<td style="height: 60px;text-align:center;background-color: #aeb3b3;"><strong>Tuesday</strong></td>

<?php 

for ($x = 1; $x <= $noofperiods; $x++) {		
?>		
<td style="width:30px;height: 60px;font-size:14px;">
<?php
if(!empty($timetabledetails_tuesday_pdf))
{
foreach($timetabledetails_tuesday_pdf as $tu){
if($tu->status==$x)
{
if($tu->subjects=='' && $tu->teacher_name=='')
{
echo 'Not Assigned';
}
else if($tu->subjects==leave && $tu->teacher_name==leave)
{
echo 'Leave';
}
else
{
echo $tu->subjects;
echo '-<br>';
echo $tu->teacher_name;
}
}




}
}
?>
</td>
<?php } ?>
</tr>
<tr>
<td style="height: 60px;text-align:center;background-color: #aeb3b3;"><strong>Wednesday</strong></td>

<?php 

for ($x = 1; $x <= $noofperiods; $x++) {		
?>		
<td style="width:30px;height: 60px;font-size:14px;">
<?php
if(!empty($timetabledetails_wednesday_pdf))
{
foreach($timetabledetails_wednesday_pdf as $w){
if($w->status==$x)
{
if($w->subjects=='' && $w->teacher_name=='')
{
echo 'Not Assigned';
}
else if($w->subjects==leave && $w->teacher_name==leave)
{
echo 'Leave';
}
else
{
echo $w->subjects;
echo '-<br>';
echo $w->teacher_name;
}
}




}
}
?>
</td>
<?php } ?>
</tr>
<tr>
<td style="height: 60px;text-align:center;background-color: #aeb3b3;"><strong>Thursday</strong></td>

<?php 

for ($x = 1; $x <= $noofperiods; $x++) {		
?>		
<td style="width:30px;height: 60px;font-size:14px;">
<?php
if(!empty($timetabledetails_thursday_pdf))
{
foreach($timetabledetails_thursday_pdf as $th){
if($th->status==$x)
{
if($th->subjects=='' && $th->teacher_name=='')
{
echo 'Not Assigned';
}
else if($th->subjects==leave && $th->teacher_name==leave)
{
echo 'Leave';
}
else
{
echo $th->subjects;
echo '-<br>';
echo $th->teacher_name;
}
}




}
}
?>
</td>
<?php } ?>
</tr>
<tr>
<td style="height: 60px;text-align:center;background-color: #aeb3b3;"><strong>Friday</strong></td>

<?php 

for ($x = 1; $x <= $noofperiods; $x++) {		
?>		
<td style="width:30px;height: 60px;font-size:14px;">
<?php
if(!empty($timetabledetails_friday_pdf))
{
foreach($timetabledetails_friday_pdf as $f){
if($f->status==$x)
{
if($f->subjects=='' && $f->teacher_name=='')
{
echo 'Not Assigned';
}
else if($f->subjects==leave && $f->teacher_name==leave)
{
echo 'Leave';
}
else
{
echo $f->subjects;
echo '-<br>';
echo $f->teacher_name;
}
}




}
}
?>
</td>
<?php } ?>
</tr>
<tr>
<td style="height: 60px;text-align:center;background-color: #aeb3b3;"><strong>Saturday</strong></td>

<?php 

for ($x = 1; $x <= $noofperiods; $x++) {		
?>		
<td style="width:30px;height: 60px;font-size:14px;">
<?php
if(!empty($timetabledetails_saturday_pdf))
{
foreach($timetabledetails_saturday_pdf as $sa){
if($sa->status==$x)
{
if($sa->subjects=='' && $sa->teacher_name=='')
{
echo 'Not Assigned';
}
else if($sa->subjects==leave && $sa->teacher_name==leave)
{
echo 'Leave';
}
else
{
echo $sa->subjects;
echo '-<br>';
echo $sa->teacher_name;
}
}




}
}
?>
</td>
<?php } ?>
</tr>
<tr>
<td style="height: 60px;text-align:center;background-color: #aeb3b3;"><strong>Sunday</strong></td>

<?php 

for ($x = 1; $x <= $noofperiods; $x++) {		
?>		
<td style="width:30px;height: 60px;font-size:14px;">
<?php
if(!empty($timetabledetails_sunday_pdf))
{
foreach($timetabledetails_sunday_pdf as $su){
if($su->status==$x)
{
if($su->subjects=='' && $su->teacher_name=='')
{
echo 'Not Assigned';
}
else if($su->subjects==leave && $su->teacher_name==leave)
{
echo 'Leave';
}
else
{
echo $su->subjects;
echo '-<br>';
echo $su->teacher_name;
}
}




}
}
?>
</td>
<?php } ?>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<table style="height: 18px; width: 100%; border-collapse: collapse;" border="1">
<tbody>
<tr>
<td style="width: 55px; text-align: center; height: 50px;background-color: #aeb3b3;">
<p>Subject</p>
</td>
<?php  
if(!empty($timetablecount))
{
foreach($timetablecount as $tc)
{ ?>
<td style="width: 50px; text-align: center; height: 50px;">&nbsp;<?php echo $tc->subjects;?></td>

<?php
} 
}
?>
</tr>
<tr>
<td style="width: 55px; text-align: center; height: 50px;background-color: #aeb3b3;">
<p>Periods</p>
</td>
<?php  
if(!empty($timetablecount))
{
foreach($timetablecount as $tc)
{ ?>
<td style="width: 50px; text-align: center; height: 50px;">&nbsp;<?php echo $tc->subcount;?></td>
<?php
} 
}
?>
</tr>
</tbody>
</table>