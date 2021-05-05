<!-- <?php print_r($periodscount);?> -->
<table style="height: 309px; width: 100%;border-collapse: collapse;" border="1">
<tbody>
<tr style="height: 70px;">
<td style="text-align: center; height: 70px;font-size: 24px;" colspan="9">
<p><b><?php echo $school?></b></p>
</td>
</tr>
<tr style="height: 50px;background-color: #aeb3b3;">
<td style="width: 58px; height: 50px; border-right-style: hidden;" colspan="2">
<p>&nbsp;<b>Teacher Name :&nbsp;<?php echo $teacher ?></b></p>
</td>
<td style="width: 58px; height: 40px;border-right-style: hidden;" colspan="2">
<p>&nbsp;<b>From Date :&nbsp;<?php echo $fromdate ?></b></p>
</td>
<td style="width: 58px; height: 40px;border-right-style: hidden;" colspan="2">
<p>&nbsp;<b>To Date :&nbsp;<?php echo $todate ?></b></p>
</td>
</tr>
<tr>
<th style="width: 40px; text-align: center;height: 50x;background-color: #aeb3b3;">Days</th>
<?php $noofperiods=8; ?>
<?php  
for ($x = 1; $x <= $noofperiods; $x++) { ?>
<th width: 58px; text-align: center;>Periods:<?php echo $x ?></th>
<?php
} 
?>

</tr>
<tr>


<td style="width: 40px; text-align: center;height: 50x;background-color: #aeb3b3;"><strong>Monday</strong></td>
<?php 

for ($x = 1; $x <= $noofperiods; $x++) {		
?>		
<td style="width: 58px; text-align: center;height: 50x;">
<?php
if(!empty($Mondayclasses))
{
foreach($Mondayclasses as $r){
if($r['status']==$x)
{
 echo($r['classes'].'<br></br>');
}
}
}
?>
</td>
<?php } ?>

</tr>
<tr>

<td style="width: 40px; text-align: center;height: 50x;background-color: #aeb3b3;"><strong>Tuesday</strong></td>
<?php 


for ($x = 1; $x <= $noofperiods; $x++) {
?>
<td style="width: 58px; text-align: center;height: 50x;">
<?php
if(!empty($Tuesdayclasses))
{
foreach($Tuesdayclasses as $r){
if($r['status']==$x)
{
 echo($r['classes'].'<br></br>');
}

}
?>
</td>
<?php
}
}
?>
</tr>
<tr>

<td style="width: 40px; text-align: center;height: 50x;background-color: #aeb3b3;"><strong>Wednesday</strong></td>
<?php 
for ($x = 1; $x <= $noofperiods; $x++) {
?>
<td style="width: 58px; text-align: center;height: 50x;">
<?php
if(!empty($Wednesdayclasses))
{
foreach($Wednesdayclasses as $r){
if($r['status']==$x)
{
 echo($r['classes'].'<br></br>');
}

}
}
?>
</td>
<?php
}
?>
</tr>
<tr>

<td style="width: 40px; text-align: center;height: 50x;background-color: #aeb3b3;"><strong>Thursday</strong></td>
<?php 
for ($x = 1; $x <= $noofperiods; $x++) {
?>
<td style="width: 58px; text-align: center;height: 50x;">
<?php
if(!empty($Thursdayclasses))
{
foreach($Thursdayclasses as $r){
if($r['status']==$x)
{
 echo($r['classes'].'<br></br>');
}

}
}
?>
</td>
<?php
}
?>
</tr>
<tr>

<td style="width: 40px; text-align: center;height: 50x;background-color: #aeb3b3;"><strong>Friday</strong></td>
<?php 
for ($x = 1; $x <= $noofperiods; $x++) {
?>
<td style="width: 58px; text-align: center;height: 50x;">
<?php
if(!empty($Fridayclasses))
{
foreach($Fridayclasses as $r){
if($r['status']==$x)
{
 echo($r['classes'].'<br></br>');
}

}
}
?>
</td>
<?php
}
?>
</tr>
<tr>

<td style="width: 40px; text-align: center;height: 50x;background-color: #aeb3b3;"><strong>Saturday</strong></td>
<?php 
for ($x = 1; $x <= $noofperiods; $x++) {
?>
<td style="width: 58px; text-align: center;height: 50x;">
<?php
if(!empty($Saturdayclasses))
{
foreach($Saturdayclasses as $r){
if($r['status']==$x)
{
 echo($r['classes'].'<br></br>');
}

}
}
?>
</td>
<?php
}
?>
</tr>
<tr>

<td style="width: 40px; text-align: center;height: 50x;height: 50x;background-color: #aeb3b3;"><strong>Sunday</strong></td>
<?php 
for ($x = 1; $x <= $noofperiods; $x++) {
?>
<td style="width: 58px; text-align: center;height: 50x;">
<?php
if(!empty($Sundayclasses))
{
foreach($Sundayclasses as $r){
if($r['status']==$x){
echo($r['classes'].',');
}

}
}
?>
</td>
<?php
}
?>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<table style="height: 18px;border-collapse: collapse;" border="1">
<tbody>
<tr>
<td style="text-align: center;width:100px; height: 50px;background-color: #aeb3b3;">
<p>Class</p>
</td>
<!-- <?php                                                           
$i=1;
if(!empty($periodscount))
{
foreach($periodscount as $tc)
{    
?> -->
<td style="text-align: center; width:100px;height: 50px;"><?php echo $tc->classes?></td>

<!-- <?php 
$i++;  }
} 
?> -->
</tr>

<tr>
<td style="text-align: center;width:100px; height: 50px;background-color: #aeb3b3;">
<p>Periods</p>
</td>
<?php
if(!empty($periodscount))
{
foreach($periodscount as $tc)
{
	?>
<td style="text-align: center;width:100px; height: 50px;"><?php echo $tc->assigned?></td>
<?php
}
}
?>
</tr>
</tbody>
</table>