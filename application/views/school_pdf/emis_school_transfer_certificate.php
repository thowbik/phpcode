
<?php 

$class_roma = array
                                                            ('I'=>1,'II'=>'2','III'=>'3','IV'=>'4','V'=>'5','VI'=>'6','VII'=>'7','VIII'=>'8','IX'=>'9','X'=>'10','XI'=>'11','XII'=>'12','LKG'=>'13','UKG'=>'14','PreKG'=>'15');
          

          $school_udise = $this->session->userdata('emis_school_udise');
          $year = date('Y',strtotime($students_data->student_apply_tc));
          $tc_no = $year.'/'.$school_udise.'/'.sprintf("%04d",$students_data->student_id);
          
          
          $gen_code_11 = array(1921,1923,1924,1925,1926,1931,1941,1942,1951,1961,1962);
          $gen_code_12 = array(2921,2923,2924,2925,2926,2931,2941,2942,2951,2961,2962);
          $group_offer = '';
          switch ($students_data->student_current_class_id) {
          		case 11:
          			$group_offer = (in_array($students_data->group_code, $gen_code_12)?' Vocational Education':' General Education');
          		break;
          	
          		case 12:
          			$group_offer = (in_array($students_data->group_code, $gen_code_11)?' Vocational Education':' General Education');
          		break;
          		default:
          			$group_offer ='';
          		break;
          }
          
?>
<html>

<head>
	
	<mata charset="UTF-8">
</head>
<body>
<table style="height: 49px;width: 100%; border-collapse: collapse;" border="1">
<tbody>
<tr style="height: 37px;">
<td style="width: 258px; height: 37px;">
<p style="text-align: left;"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">வரிசை எண்<br /></span></span><span style="font-family: TAU-Marutham, serif;">Serial No.</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?=$tc_no;?></strong></p> 
</td>
<td style="width: 275px; height: 37px;">&nbsp;<span lang="ar-SA">சேர்க்கை எண்</span><span style="font-family: TAU-Marutham, serif;">.<br /></span>Admission No.&nbsp;&nbsp;<?=$students_data->school_admission_no;?></td>
</tr>
</tbody>
</table>
<table style="height: 118px; width: 100%; border-collapse: collapse;" border="1">
<tbody>
<tr style="height: 66px;">
<td style="width: 52.4348%; height: 66px; text-align: center;">&nbsp;<span lang="ar-SA">தமிழ்நாடு அரசு</span><span style="font-family: TAU-Marutham, serif;"><span style="font-size: large;">, </span></span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">பள்ளிக் கல்வித் துறை</span></span>
<p align="center"><span style="font-family: 'TAU-Marutham';"><span lang="ar-SA"><span style="font-family: TAU-Marutham;">மாற்றுச் சான்றிதழ்</span></span></span></p>
</td>
<td style="width: 100px; height: 66px; text-align: center; font-size: 12px;" colspan="2">&nbsp;<span style="font-family: TAU-Marutham, serif;">GOVERNMENT OF TAMILNADU <br />DEPARTMENT OF SCHOOL EDUCATION<br /></span><span style="font-family: TAU-Marutham, serif;"><strong>TRANSFER CERTIFICATE</strong></span></td>
<!-- <td style="width: 94px; text-align: center; height: 146px;">&nbsp;<?php
			$key_name = Students_EMIS.'/'.$students_data->unique_id_no.'.jpg';
			$img_data = Common::get_url(TEACHER_BUCKET_NAME,$key_name,'+5 minutes')
	;
	// echo $students_data->unique_id_no;
	?>

	<img src="<?=$img_data;?>" alt="no-Image" width="100px" height="130px">
</td> --></tr>
</tbody>
</table>
<table style="height: 101px; width: 100%;border-collapse: collapse;" border="1">
<tbody>
<tr>
<td style="width: 18px;">&nbsp;01</td>
<td style="width: 248px;">(<span style="font-family: TAU-Marutham;"><span lang="ar-SA">அ</span></span><span style="font-family: TAU-Marutham, serif;">) </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">பள்ளியின் பெயர் </span></span><span style="font-family: TAU-Marutham, serif;">(Name of the School)</span></td>
<td style="width: 15px;">&nbsp;</td>
<td style="width: 263px;">&nbsp;(<span style="font-family: TAU-Marutham;"><span lang="ar-SA">ஆ</span></span><span style="font-family: TAU-Marutham, serif;">) </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">தனியார் பள்ளி எனில் பள்ளி அங்கீகார எண்</span></span><span style="font-family: TAU-Marutham, serif;">.<br /></span>(If private school recognition number)</td>
</tr>
<tr>
<td style="width: 18px;">&nbsp;</td>
<td style="width: 248px;">&nbsp;&nbsp;<?=$students_data->school_name;?></td>
<td style="width: 15px;">&nbsp;</td>
<td style="width: 263px;text-align: center;">&nbsp;<?=$students_data->school_recognition_no;?></td>
</tr>
</tbody>
</table>
<table style="height: 63px;width: 100%;border-collapse: collapse;" border="1">
<tbody>
<tr style="height: 52px;">
<td style="width: 179px; height: 52px;">
<p align="center"><span style="font-family: TAU-Marutham, serif;">(</span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">இ</span></span><span style="font-family: TAU-Marutham, serif;">) </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">வருவாய் மாவட்டம்<br /></span></span><span style="font-family: TAU-Marutham, serif;">(Revenue District)</span></p>
</td>
<td style="width: 181px; height: 52px;">
<p align="center"><span style="font-family: TAU-Marutham, serif;">(</span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">ஈ</span></span><span style="font-family: TAU-Marutham, serif;">) </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">கல்வி மாவட்டம் </span></span><br/><span style="font-family: TAU-Marutham, serif;">(Educational District)</span></p>
</td>
<td style="width: 182px; height: 52px;">
<p align="center"><span style="font-family: TAU-Marutham, serif;">(</span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">உ</span></span><span style="font-family: TAU-Marutham, serif;">) </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">ஒன்றியம்<br /></span></span><span style="font-family: TAU-Marutham, serif;">(Block)</span></p>
</td>
</tr>
<tr style="height: 27px;">
<td style="width: 179px; height: 27px;"><center><?=$students_data->district_name;?></center></td>
<td style="width: 181px; height: 27px;"><center><?=$students_data->edu_dist_name;?></center></td>
<td style="width: 182px; height: 27px;"><center><?=$students_data->block_name;?></center></td>
</tr>
</tbody>
</table>
<table style="height: 242px;width: 100%;border-collapse: collapse;" border="1">
<tbody>


</tr>
<tr style="height: 29px;">
<td style="width: 20px; height: 29px;">&nbsp;02</td>
<td style="width: 246px; height: 29px;">
<p align="justify"><span style="font-family: TAU-Marutham, serif;">(</span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">அ</span></span><span style="font-family: TAU-Marutham, serif;">) </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">மாணவரின் பெயர் Name of the Student தமிழில் (in Tamil)</span></span></p>
</td>
<td style="width: 16px; text-align: center; height: 18px;">:</td>
<td style="width: 260px; height: 29px;">&nbsp;<?=$students_data->name_tamil;?></td>
</tr>

<!-- <tr style="height: 66px;">
<td style="width: 20px; height: 29px;">&nbsp;02</td>
<td style="width: 246px; height: 66px;">
<p align="justify"><span style="font-family: TAU-Marutham, serif;">(</span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">அ</span></span><span style="font-family: TAU-Marutham, serif;">) </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">மாணவரின் பெயர் Name of the Student தமிழில் (in Tamil)</span></span></p>
</td>
<td style="width: 16px; text-align: center; height: 66px;">:&nbsp;</td>
<td style="width: 260px; height: 66px;">&nbsp;<?=$students_data->name_tamil;?></td>
</tr> -->
<tr style="height: 29px;">
<td style="width: 20px; height: 29px;">&nbsp;</td>
<td style="width: 246px; height: 29px;">
<p align="justify"><span style="font-family: TAU-Marutham, serif;">(</span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">ஆ</span></span><span style="font-family: TAU-Marutham, serif;">) </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">ஆங்கிலத்தில் </span></span><span style="font-family: TAU-Marutham, serif;">(in English, in block letters)</span></p>
</td>
<td style="width: 16px; text-align: center; height: 18px;">:</td>
<td style="width: 260px; height: 29px;">&nbsp;<?=$students_data->name;?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 20px; height: 18px;">03</td>
<td style="width: 246px; height: 18px;">
<p align="justify"><span style="font-family: TAU-Marutham, serif;">(</span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">அ</span></span><span style="font-family: TAU-Marutham, serif;">) </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">தந்தையின் பெயர் </span></span><span style="font-family: TAU-Marutham, serif;">(Father&rsquo;s name)</span></p>
</td>
<td style="width: 16px; height: 18px; text-align: center;">:</td>
<td style="width: 260px; height: 18px;">&nbsp;<?=$students_data->father_name;?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 20px; height: 18px;">&nbsp;</td>
<td style="width: 246px; height: 18px;">
<p align="justify"><span style="font-family: TAU-Marutham, serif;">(</span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">ஆ</span></span><span style="font-family: TAU-Marutham, serif;">) </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">தாயாரின் பெயர் </span></span><span style="font-family: TAU-Marutham, serif;">(Mother&rsquo;s name)</span></p>
</td>
<td style="width: 16px; height: 18px; text-align: center;">:&nbsp;</td>
<td style="width: 260px; height: 18px;">&nbsp;<?=$students_data->mother_name;?></td>
</tr>
<tr style="height: 18px;">
	<?php 
		$comm = '';
			if($students_data->student_community_tc !=null)
			{
				switch ($students_data->student_community_tc) {
						case 1:
						$comm = 'Left blank as per G.O 205, 31-Jul-2000';
						break;
						case 2:
						$comm = 'Refer Community Certificate issued by Revenue Authorities';
						break;
						case 3:
						$comm = 'No Religion, No Caste, No Community specified, as per G.O 205, 31-Jul-2000';
						break;
						default:
						$comm = '';
						break;
				}
			}
	?>
<td style="width: 20px; height: 18px;">04</td>
<td style="width: 246px; height: 18px;">
<p align="justify"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">தேசிய இனம் மற்றும் மதம் </span></span><span style="font-family: TAU-Marutham, serif;">(Nationality &amp; Religion)</span></p>
</td>
<td style="width: 16px; height: 18px; text-align: center;">:</td>
<td style="width: 260px; height: 18px;">&nbsp;<?=$students_data->student_nationality;?> - <?=$comm;?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 20px; height: 18px;">05</td>
<td style="width: 246px; height: 18px;">
<p align="justify"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">இனம் </span></span><span style="font-family: TAU-Marutham, serif;">(Community) <br /></span><span style="color: ;"><span style="font-family: TAU-Marutham, serif;"></span></span></p>
</td>
<td style="width: 16px; height: 18px; text-align: center;">:</td>
<td style="width: 260px; height: 18px;">
<p><span style="color: "><span style="font-family: TAU-Marutham, serif;"><span style=""><?=$comm;?></span></span></span></p>
</td>
</tr>
<tr style="height: 18px;">
<td style="width: 20px; height: 18px;">&nbsp;</td>
<td style="width: 246px; height: 18px;">
<p align="justify"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">உட்பிரிவு </span></span></p>
</td>
<td style="width: 16px; height: 18px; text-align: center;">:&nbsp;</td>
<td style="width: 260px; height: 18px;">&nbsp;<?=$comm;?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 20px; height: 18px;">06</td>
<td style="width: 246px; height: 18px;">
<p align="justify"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">பாலினம் </span></span><span style="font-family: TAU-Marutham, serif;">(</span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">ஆண் </span></span><span style="font-family: TAU-Marutham, serif;">/ </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">பெண் </span></span><span style="font-family: TAU-Marutham, serif;">/ </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">மூன்றாம் பாலினம்</span></span><span style="font-family: TAU-Marutham, serif;">) Gender (Male / Female / Transgender)</span></p>
</td>
<td style="width: 16px; height: 18px; text-align: center;">:</td>
<td style="width: 260px; height: 18px;">&nbsp;<?php 
			switch ($students_data->gender) {
					case 1:
					echo "Male";
					break;
					case 2:
					echo "Female";
					break;
					case 3:
					echo "Transgender";
					break;
				
			}
;?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 20px; height: 18px;">07</td>
<td style="width: 246px; height: 18px;">
<p align="justify"><span style="font-family: 'TAU-Marutham';"><span lang="ar-SA"><span style="font-family: TAU-Marutham;">பிறந்த தேதி</span></span></span><span style="font-family: TAU-Marutham, serif;">, </span><span style="font-family: 'TAU-Marutham';"><span lang="ar-SA"><span style="font-family: TAU-Marutham;">மாணவர் சேர்க்கைப் பதிவேட்டில் உள்ளபடி </span></span></span><span style="font-family: TAU-Marutham, serif;">(</span><span style="font-family: 'TAU-Marutham';"><span lang="ar-SA"><span style="font-family: TAU-Marutham;">எண்ணிலும் எழுத்திலும்</span></span></span><span style="font-family: TAU-Marutham, serif;">) Date of Birth as entered in the Admission </span><span style="color: ;"><span style="font-family: TAU-Marutham, serif;">R</span></span><span style="font-family: TAU-Marutham, serif;">egister (In figure and words) </span></p>
</td>
<td style="width: 16px; height: 18px; text-align: center;">:</td>
<td style="width: 260px; height: 18px;">&nbsp;<?=date('d-M-Y',strtotime($students_data->dob));?> - <?=$students_data->student_dob_words;?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 20px; height: 18px;">08</td>
<td style="width: 246px; height: 18px;">
<p align="justify"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">உடலில் அமைந்துள்ள அங்க அடையாளக் குறிகள் </span></span><span style="font-family: TAU-Marutham, serif;">(Personal marks of identification)</span></p>
</td>
<td style="width: 16px; height: 18px; text-align: center;">:</td>
<td style="width: 260px; height: 18px;">
<p><span style="font-family: TAU-Marutham, serif;">(</span><span style="font-family: 'TAU-Marutham';"><span lang="ar-SA">அ</span></span></span><span style="font-family: TAU-Marutham, serif;">) </span><span style=""><span style="font-family: TAU-Marutham, serif;"><?=$students_data->student_idenitiy1;?><br /></span></span><span style="font-family: TAU-Marutham, serif;">(</span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">ஆ</span></span><span style="font-family: TAU-Marutham, serif;">)<?=$students_data->student_idenitiy2;?></span></p>
</td>
</tr>
<tr style="height: 18px;">
<td style="width: 20px; height: 18px;" rowspan="2">09</td>
<td style="width: 246px; height: 18px;" rowspan="2">
<p align="justify">&nbsp;</p>
<p align="justify"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">மாணவர் பள்ளியில் சேர்க்கப்பட்ட தேதி மற்றும் சேர்க்கப்பட்ட வகுப்பு வருடத்தை எழுத்தால் எழுதவும் </span></span><span style="font-family: TAU-Marutham, serif;">Date and standard of admission of student (year in words)</span></p>
</td>
<td style="width: 16px; height: 18px; text-align: center;" rowspan="2">:</td>
<td style="width: 260px; height: 18px;">&nbsp;<?=date('d-M-Y',strtotime($students_data->student_period_study_from));?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 260px; height: 18px;">&nbsp;<?=array_search($students_data->student_class_id, $class_roma);?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 20px; height: 18px;">10</td>
<td style="width: 246px; height: 18px;">
<p align="justify"><span style="font-family: TAU-Marutham, serif;">(</span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">அ</span></span><span style="font-family: TAU-Marutham, serif;">) </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">மாணவர் பள்ளியை விட்டுச் செல்லும் நேரத்தில் படித்து வந்த வகுப்பு </span></span><span style="font-family: TAU-Marutham, serif;">(</span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">எண்ணிலும் எழுத்திலும்</span></span><span style="font-family: TAU-Marutham, serif;">) (Standard in which the Student was studying at the time of leaving School. ( in figure and words))</span></p>
</td>
<td style="width: 16px; height: 18px; text-align: center;">:</td>
<td style="width: 260px; height: 18px;">&nbsp;<?php

echo array_search($students_data->student_current_class_id,$class_roma);?></td>
</tr>
<?php if($students_data->student_current_class_id==11 || $students_data->student_current_class_id==12){?>
<tr style="height: 18px;">
<td style="width: 20px; height: 18px;">&nbsp;</td>
<td style="width: 246px; height: 18px;">
<p align="justify"><span style="font-family: TAU-Marutham, serif;">(</span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">ஆ</span></span><span style="font-family: TAU-Marutham, serif;">) </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">மேல்நிலைக் கல்வி எனில்</span></span><span style="font-family: TAU-Marutham, serif;">, </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">தேர்ந்தெடுத்த பாடப்பிரிவு அதாவது பொதுக்கல்வி அல்லது தொழிற்கல்வி </span></span><span style="font-family: TAU-Marutham, serif;">( If Higher Secondary Course, the Course offered ie., General Education or Vocational Education) </span></p>
</td>
<td style="width: 16px; height: 18px; text-align: center;">:&nbsp;</td>
<td style="width: 260px; height: 18px;">&nbsp;<?=$group_offer;?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 20px; height: 18px;">&nbsp;</td>
<td style="width: 246px; height: 18px;">&nbsp;
<p align="justify"><span style="font-family: TAU-Marutham, serif;">(</span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">இ</span></span><span style="font-family: TAU-Marutham, serif;">) </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">பொதுக்கல்வியாயின் பகுதி </span></span><span style="font-family: TAU-Marutham, serif;">III </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">தொகுதி </span></span><span style="font-family: TAU-Marutham, serif;">(</span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">அ</span></span><span style="font-family: TAU-Marutham, serif;">)-</span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">இல் தேர்ந்தெடுத்த விருப்பப் பாடங்கள் மற்றும் பயிற்று மொழி </span></span><span style="font-family: TAU-Marutham, serif;">(In the case of General Education the Subject offered under Part III Group A &amp; Medium of Instruction)</span></p>
</td>
<td style="width: 16px; height: 18px; text-align: center;">:&nbsp;</td>
<td style="width: 260px; height: 18px;">&nbsp;<?php 
$group = substr($students_data->group_name,10);
 	echo str_replace("/", " - ", $group);
?></td>
</tr>
<?php } ?>
<tr style="height: 18px;">
<td style="width: 20px; height: 18px;">11</td>
<td style="width: 246px; height: 18px;">
<p align="justify"><span style="font-family: 'TAU-Marutham';"><span lang="ar-SA">அடுத்த உயர் வகுப்பிற்குத்  தேர்ச்சி பெற தகுதி உடையவரா? ஆம் / இல்லை குறிப்பிடுக.</span></span> (</span><span style="color: ;"><span style="font-family: TAU-Marutham, serif;">Mention whether </span></span><span style="color: ;"><span style="font-family: TAU-Marutham, serif;"><span lang="en-IN">qualified for </span></span></span><span style="color: ;"><span style="font-family: TAU-Marutham, serif;">promot</span></span><span style="color: ;"><span style="font-family: TAU-Marutham, serif;"><span lang="en-IN">ion</span></span></span><span style="color: ;"><span style="font-family: TAU-Marutham, serif;"> to next higher class</span></span><span style="font-family: TAU-Marutham, serif;"> ( Yes/ No)</span></p>
</td>
<td style="width: 16px; height: 18px; text-align: center;">:</td>
<td style="width: 260px; height: 18px;">&nbsp;<?php
		switch ($students_data->student_promote_class) {
				case 1:
				echo "YES";
				break;
				case 2:
				echo "NO";
				break;
				case 3:
				echo "No-Discontinued";
				break;
			default:
				# code...
				break;
		}
;?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 20px; height: 18px;">12</td>
<td style="width: 246px; height: 18px;">
<p align="justify"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">மாணவர் படிப்பு உதவித் தொகை அல்லது படிப்பு கட்டணச்க் சலுகை ஏதேனும் பெற்றவரா</span></span><span style="font-family: TAU-Marutham, serif;">? (</span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">அதன் விவரத்தைக் குறிப்பிடுக</span></span><span style="font-family: TAU-Marutham, serif;">) (Whether the Student was in receipt of any Scholarship or Educational Concession; nature of the scholarship to be specified) </span></p>
</td>
<td style="width: 16px; height: 18px; text-align: center;">&nbsp;:</td>
<td style="width: 260px; height: 18px;">
<p><span style=""><span style="font-family: TAU-Marutham, serif;">&nbsp;<?=($students_data->student_scholarship !=''?$students_data->student_scholarship:'No');?></span></span></p>
&nbsp;</td>
</tr>
<tr style="height: 18px;">
<td style="width: 20px; height: 18px;">&nbsp;13</td>
<td style="width: 246px; height: 18px;">&nbsp;<span lang="ar-SA">மாணவர் நடப்புக் கல்வியாண்டில் மருத்துவ ஆய்வுக்குச் சென்றவரா</span><span style="font-family: TAU-Marutham, serif;">? (Whether the Student has undergone medical inspection during the last academic year)</span></td>
<td style="width: 16px; height: 18px; text-align: center;">:&nbsp;</td>
<td style="width: 260px; height: 18px;">&nbsp;<?=($students_data->student_medical_date !='0000-00-00'  && $students_data->student_medical_date !=''?'YES - '.date('d-M-Y',strtotime($students_data->student_medical_date)):'No');?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 20px; height: 18px;">&nbsp;14</td>
<td style="width: 246px; height: 18px;">
<p align="justify"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">மாணவர் கடைசியாகப் பள்ளிக்கு வருகை புரிந்த தேதி </span></span><span style="font-family: TAU-Marutham, serif;">(Last date on which the Student attended the school)</span></p>
</td>
<td style="width: 16px; height: 18px; text-align: center;">:&nbsp;</td>
<td style="width: 260px; height: 18px;">&nbsp;<?=($students_data->student_last_date !='1970-01-01' && $students_data->student_last_date!=''?date('d-M-Y',strtotime($students_data->student_last_date)):'');?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 20px; height: 18px;">&nbsp;15</td>
<td style="width: 246px; height: 18px;">&nbsp;<span lang="ar-SA"><span style="font-family: TAU-Marutham;">மாணவரின் நடத்தையும் பண்பும் <br/></span></span>The Student&rsquo;s conduct and character</td>
<td style="width: 16px; height: 18px; text-align: center;">&nbsp;:</td>
<td style="width: 260px; height: 18px;">&nbsp;<?=$students_data->student_conduct;?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 20px; height: 18px;">16&nbsp;</td>
<td style="width: 246px; height: 18px;">
<p align="justify"><span style="font-family: TAU-Marutham, serif;">(</span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">அ</span></span><span style="font-family: TAU-Marutham, serif;">) </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">மாற்றுச் சான்றிதழ் கோரி விண்ணப்பித்த தேதி<br /></span></span><span style="font-family: TAU-Marutham, serif;">(Date of application for Transfer Certificate)</span></p>
&nbsp;</td>
<td style="width: 16px; height: 18px; text-align: center;">:&nbsp;</td>
 <td style="width: 260px; height: 18px;">&nbsp;<?=date('d-M-Y',strtotime($students_data->student_apply_tc));?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 20px; height: 18px;">&nbsp;</td>
<td style="width: 246px; height: 18px;">
<p align="justify"><span style="font-family: TAU-Marutham, serif;">(</span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">ஆ</span></span><span style="font-family: TAU-Marutham, serif;">) </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">மாற்றுச் சான்றிதழ் கோரி விண்ணப்பிக்கக் காரணம் 
 </span></span><span style="font-family: TAU-Marutham, serif;">(Reason for applying for Transfer Certificate)</span></p>
</td>
<td style="width: 16px; height: 18px; text-align: center;">&nbsp;</td>
<td style="width: 260px; height: 18px;">&nbsp;<?php
		switch ($students_data->transfer_reason) {
				case 1:
				echo "Long Absent";
				break;
				case 2:
				echo "Parent Request";
				break;
				case 3:
				echo "Terminal Class";
				break;
				case 4:
				echo "Dropped Out";
				break;
				case 5:
				echo "Student Died";
				break;
				default:
				echo "--";
				break;
		}

;?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 20px; height: 18px;">&nbsp;17</td>
<td style="width: 246px; height: 18px;">
<p align="justify"><span style="font-family: 'TAU-Marutham';"><span lang="ar-SA"><span style="color: ;"><span style="font-family: TAU-Marutham;">மாற்றுச் சான்றிதழ் தேதி </span></span> </span></span><span style="font-family: TAU-Marutham, serif;">(Date of Transfer Certificate )</span></p>
</td>
<td style="width: 16px; height: 18px; text-align: center;">&nbsp;:</td>
<td style="width: 260px; height: 18px;">&nbsp;<?=date('d-M-Y',strtotime($students_data->student_tc_date));?></td>
</tr>
<!-- <tr style="height: 18px;">
<td style="width: 20px; height: 18px;">&nbsp;18</td>
<td style="width: 246px; height: 18px;">
<p align="justify"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">படிப்புக் காலம் </span></span><span style="font-family: TAU-Marutham, serif;">(Period of Study) </span>&nbsp;</p>
</td>
<td style="width: 16px; height: 18px; text-align: center;">:&nbsp;</td>
<td style="width: 260px; height: 18px;">&nbsp;<?=date('Y',strtotime($students_data->student_period_study_from)).'-'.date('Y',strtotime($students_data->student_period_study_to));?></td>
</tr> -->
<tr style="height: 18px;">
<td style="width: 20px; height: 18px;">&nbsp;18</td>
<td style="width: 246px; height: 18px;">
<p align="justify"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">மாணவர் எண்  </span></span><span style="font-family: TAU-Marutham, serif;">(Student EMIS ID) </span>&nbsp;</p>
</td>
<td style="width: 16px; height: 18px; text-align: center;">:&nbsp;</td>
<td style="width: 260px; height: 18px;">&nbsp;<?=$students_data->student_unique_id;?></td>
</tr>
</tbody>
</table>
<br/>
<table style="height: 225px;width: 750px;border-collapse: collapse;" border="1">
<tbody>
<tr style="height: 22px;">

<td style="width: 132px; height: 22px;">

<p align="center"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">கல்வி பயின்ற காலம்<br /></span></span><span style="font-family: TAU-Marutham, serif;">(Period of Study)</span></p>
</td>

<td style="width: 132px; height: 22px;">
<p align="center"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">படித்த வகுப்புகள்<br /></span></span><span style="font-family: TAU-Marutham, serif;">(Classes Studied)</span></p>
</td>
<td style="width: 133px; height: 22px;">
<p align="center"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">முதல் மொழி<br /></span></span><span style="font-family: TAU-Marutham, serif;">(First Language)</span></p>
</td>
<td style="width: 133px; height: 22px;">
<p align="center"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">பயிற்று மொழி<br /></span></span><span style="font-family: TAU-Marutham, serif;">(Medium of Instruction)</span></p>
</td>
</tr>
<tr style="height: 40px;">

<td style="width: 132px; height: 22px;"><center><?=date('Y',strtotime($students_data->student_period_study_from)).'-'.date('Y',strtotime($students_data->student_period_study_to));?></center></td>
<td style="width: 132px; height: 22px;"><center><?php 
		echo array_search($students_data->student_class_id, $class_roma).'-'.array_search($students_data->student_current_class_id, $class_roma)
;?></center></td>
<td style="width: 132px; height: 22px;"><center><?=$students_data->first_lang;?></center></td>
<td style="width: 132px; height: 22px;"><center><?=$students_data->MEDINSTR_DESC;?></center></td>

</tr>
</tbody>
</table>
<br/>
<table style="height: 7px;width: 100%;border-collapse: collapse;" border="1">
<tbody>
<tr>
<td style="width: 16px;">19</td>
<td style="width: 248px;">
<p align="justify"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">பள்ளித் தலைமையாசிரியரின் கையொப்பம்</span></span><span style="font-family: TAU-Marutham, serif;">, </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">(பெயர்</span></span><span style="font-family: TAU-Marutham, serif;">, </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">தேதி மற்றும் பள்ளி முத்திரையுடன்)<br /></span></span><span style="font-family: TAU-Marutham, serif;">Signature of the Head Master (with Name, Date and School Seal)</span></p>
</td>
<td style="width: 13px;">&nbsp;:</td>
<td style="width: 258px;">&nbsp;</td>
</tr>
</tbody>
</table>
<br/>
<!-- <div style="text-align: left;" style="font-size: medium;">* வருவாய்த்துறை சான்றிதழோடு ஒப்பிட்டு சரி பார்த்துக்கொள்ளப்பட வேண்டும்</div> -->
<div style="text-align: left;"><span style="font-family: TAU-Marutham, serif;"><span style="font-size: medium;">** </span></span><span style="font-family: 'TAU-Marutham';"><span lang="ar-SA"><span style="font-family: TAU-Marutham;">குழந்தைகளுக்கான இலவச மற்றும் கட்டாயக் கல்வி உரிமைச் சட்டம் </span></span></span><span style="font-family: TAU-Marutham, serif;"><span style="font-size: small;">2009, </span></span><span style="font-family: 'TAU-Marutham';"><span lang="ar-SA"><span style="font-family: TAU-Marutham;">மற்றும் விதிகள், </span></span></span><span style="font-family: TAU-Marutham, serif;"><span style="font-size: small;">2011-</span></span><span style="font-family: 'TAU-Marutham';"><span lang="ar-SA"><span style="font-family: TAU-Marutham;">க்கு உட்பட்டது</span></span></span><span style="font-family: TAU-Marutham, serif;"><span style="font-size: small;">.</span></span></div>

<br/>
<table style="height: 48px;width: 100%;border-collapse: collapse;">
<tbody>
<tr>
<td style="width: 15px;text-align: center;" colspan="2">
<p style="text-align: center;" align="justify"><span style="font-family: TAU-Marutham;"><span lang="ar-SA"><u>குறிப்பு <strong>(Note)</strong></u></span></span></p>
</td>
</tr>
<tr>
<td style="width: 15px;">1)</td>
<td style="width: 527px;">
<p align="justify"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">அடித்தல் மற்றும் அதிகாரப் பூர்வமற்ற அல்லது மோசடியான திருத்தங்கள் மாற்றுச் சான்றிதழில் கண்டறியப்படும் பட்சத்தில் இந்த மாற்றுச் சான்றிதழ் இரத்து செய்யப்படும் </span></span><span style="font-family: TAU-Marutham, serif;"><span style="font-size: small;">(Erasures and unauthenticated or fraudulent alterations in the Certificate will lead to its cancellation).</span></span></p>
</td>
</tr>
<tr>
<td style="width: 15px;">2)</td>
<td style="width: 527px;">&nbsp;<span lang="ar-SA">மாற்றுச் சான்றிதழில் அலுவலகத் தலைவர் தொடர்புடைய பதிவேட்டுடன் ஒப்பிட்டு சரிபார்த்து கையொப்பமிடவேண்டும்</span><span style="font-family: TAU-Marutham, serif;"><span style="font-size: small;">. </span></span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">சான்றிதழின் பதிவுகளுக்கு கையொப்பமிட்ட</span></span><span style="font-family: TAU-Marutham, serif;"><span style="font-size: small;">, </span></span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">சார்ந்த பள்ளித் தலைமையாசிரியரே பொறுப்பாவார் </span></span><span style="font-family: TAU-Marutham, serif;"><span style="font-size: small;">(Should be signed in ink by the Head of the Institution who will be held responsible for the correctness of the entries).</span></span></td>
</tr>
<tr>
<td style="width: 15px;text-align: center;" colspan="2">
<br>

<p style="text-align: center;" align="center"><u><span style="font-family: TAU-Marutham;"><span lang="ar-SA">பெற்றோர் </span></span><span style="font-family: TAU-Marutham, serif;">/ </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">பாதுகாவலரின் உறுதிமொழி</span></span></u></p>
<p style="text-align: center;" align="center"><span style="font-family: TAU-Marutham, serif;"><u>DECLARATION BY THE PARENT / GUARDIAN</u></span></p>
</td>
</tr>
<tr>
<td style="width: 15px;text-align: left;" colspan="2">
<p style="text-align: left!importa" align="justify"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">மேலே</span></span><span style="font-family: TAU-Marutham, serif;">, </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">வரிசை எண் </span></span><span style="font-family: TAU-Marutham, serif;">2 </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">முதல் </span></span><span style="font-family: TAU-Marutham, serif;">7 </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">வரையுள்ள இனங்களுக்கெதிரே பதிவு செய்யப்பட்டுள்ள விவரங்கள் சரியானவை என்றும் எதிர்காலத்தில் மாற்றம் எதுவும் கோரமாட்டேன் என்றும் நான் உறுதியளிக்கிறேன்</span></span><span style="font-family: TAU-Marutham, serif;">.<br /></span><span style="font-family: TAU-Marutham, serif;">I hereby declare that the particulars recorded above against items from 2 to 7 are correct and that no change will be demanded by me in the future.</span></p>
</td>
</tr>
</tbody>
</table>
<br>
<br>
<table style="height: 21px;width: 100%;border-collapse: collapse;" border="1">
<tbody>
 <tr>
 	<td style="width: 269px;height: 50px;">
</td>
<td style="width: 269px;">
</td>
 </tr>
<tr>
<td style="width: 269px;">
<p align="center"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">மாணவரின் கையொப்பம்<br /></span></span><span style="font-family: TAU-Marutham, serif;">Signature of the Student</span></p>
</td>
<td style="width: 269px;">
<p align="center"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">பெற்றோர் </span></span><span style="font-family: TAU-Marutham, serif;">/ </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">பாதுகாவலரின் கையொப்பம்<br /></span></span><span style="font-family: TAU-Marutham, serif;">Signature of the Parent / Guardian</span></p>
</td>
</tr>
</tbody>
</table>


<?php 
			// echo $students_data->student_smart_id;
			$smart_id = ($students_data->student_smart_id !=''?$students_data->student_smart_id:$students_data->smart_id);
			Common::print_qr('http://smartcard.tnschools.gov.in/TC/'.$smart_id);

?>




                                    <table style="height: 71px;" width="577">
                                   
<tbody>
<tr>
<td style="width: 750px; text-align: left;"> 
	<img src="<?=base_url().'application/docs/qr.png'?>" width="100" height="100"><br/>
<h4 >Scan To Verify</h4></td>
</tr>
</tbody>
</table>
<!-- <p style="text-align: center;">&nbsp;</p>
<p align="center"><span style="color: ;"><span style="font-family: TAU-Marutham, serif;"><u><strong>ANNEXURE 1</strong></u></span></span></p>
<table style="height: 202px;width: 100%;" border="1">
<tbody>
<tr>
<td style="width: 210px;">
<p align="justify"><span style="color: ;"><span style="font-family: TAU-Marutham, serif;">SCA</span></span></p>
</td>
<td style="width: 326px;">
<p align="justify"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">ஆதிதிராவிடர் </span></span><span style="font-family: TAU-Marutham, serif;">- </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">அருந்ததியினர்</span></span></p>
</td>
</tr>
<tr>
<td style="width: 210px;">
<p align="justify"><span style="color: ;"><span style="font-family: TAU-Marutham, serif;">SC -Others</span></span></p>
</td>
<td style="width: 326px;">
<p align="justify"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">ஆதிதிராவிடர் &ndash; இதர பிரிவினர்<br /></span></span><span style="font-family: TAU-Marutham, serif;">/ </span><span style="color: ;"><span style="font-family: VANAVIL-Avvaiyar, serif;"><span lang="en-IN">mU&ordf;j&Acirc;a&reg;</span></span></span><span style="font-family: TAU-Marutham, serif;"> (Schedule Caste / Scheduled Tribes/ </span><span style="color: ;"><span style="font-family: TAU-Marutham, serif;"><span lang="en-IN">Arunthathiyar</span></span></span><span style="font-family: TAU-Marutham, serif;">)</span></p>
</td>
</tr>
<tr>
<td style="width: 210px;">
<p align="justify"><span style="color: ;"><span style="font-family: TAU-Marutham, serif;">ST</span></span></p>
</td>
<td style="width: 326px;">
<p align="justify"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">பழங்குடியினர்</span></span></p>
</td>
</tr>
<tr>
<td style="width: 210px;">
<p align="justify"><span style="color: ;"><span style="font-family: TAU-Marutham, serif;">MBC</span></span></p>
</td>
<td style="width: 326px;">
<p align="justify"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">மிகவும் பிற்படுத்தப்பட்டோர் </span></span><span style="font-family: TAU-Marutham, serif;">/ </span><span style="font-family: TAU-Marutham;"><span lang="ar-SA">சீர்மரபினர் </span></span><span style="font-family: TAU-Marutham, serif;">(Most Backward Class)</span></p>
</td>
</tr>
<tr>
<td style="width: 210px;">
<p align="justify"><span style="color: ;"><span style="font-family: TAU-Marutham, serif;">DNC</span></span></p>
</td>
<td style="width: 326px;">
<p align="justify"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">அட்டவணையிலிருந்து நீக்கப்பட்ட இனம் </span></span><span style="font-family: TAU-Marutham, serif;">(Denotified Communities)</span></p>
</td>
</tr>
<tr>
<td style="width: 210px;">
<p align="justify"><span style="color: ;"><span style="font-family: TAU-Marutham, serif;">BCM</span></span></p>
</td>
<td style="width: 326px;">
<p align="justify"><span style="font-family: 'TAU-Marutham';"><span lang="ar-SA"><span style="color: ;"><span style="font-family: TAU-Marutham;">பிற்படுத்தப்பட்டோர் </span></span></span></span><span style="font-family: TAU-Marutham, serif;">(</span><span style="color: ;"><span style="font-family: VANAVIL-Avvaiyar, serif;">K</span></span><span style="color: ;"><span style="font-family: VANAVIL-Avvaiyar, serif;"><span lang="en-IN">&deg;&Auml;&laquo;)</span></span></span><span style="color: ;"><span style="font-family: TAU-Marutham, serif;"><span lang="en-IN"> Backward Class (Muslim)</span></span></span></p>
</td>
</tr>
<tr>
<td style="width: 210px;">
<p align="justify"><span style="color: ;"><span style="font-family: TAU-Marutham, serif;">BC-Others</span></span></p>
</td>
<td style="width: 326px;">
<p align="justify"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">ஆதிதிராவிடர் இனத்திலிருந்து கிறிஸ்துவ மதத்திற்கு மாறியவர் </span></span><span style="font-family: TAU-Marutham, serif;">(Convert of Christianity from Scheduled caste)</span></p>
</td>
</tr>
<tr>
<td style="width: 210px;">
<p align="justify"><span style="color: ;"><span style="font-family: TAU-Marutham, serif;">BC</span></span></p>
</td>
<td style="width: 326px;">
<p align="justify"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">பிற்படுத்தப்பட்டோர் &ndash; இதர பிரிவினர் </span></span><span style="font-family: TAU-Marutham, serif;">Backward Class</span></p>
</td>
</tr>
<tr>
<td style="width: 210px;">
<p align="justify"><span style="color: ;"><span style="font-family: TAU-Marutham, serif;">OC</span></span></p>
</td>
<td style="width: 326px;">
<p align="justify"><span style="font-family: TAU-Marutham;"><span lang="ar-SA">இதர பிரிவினர் </span></span><span style="font-family: TAU-Marutham, serif;">(Others)</span></p>
</td>
</tr>
<tr>
<td style="width: 210px;">
<p align="justify"><span style="color: ;"><span style="font-family: TAU-Marutham, serif;">Social Category not disclosed</span></span></p>
</td>
<td style="width: 326px;">
<p align="justify"><span style="font-family: 'TAU-Marutham';"><span lang="ar-SA"><span style="font-family: TAU-Marutham;">எந்த இனத்தையும் குறிக்க விரு</span><span style="color: ;"><span style="font-family: TAU-Marutham;">ப்</span></span><span style="font-family: TAU-Marutham;">பம் இல்லாதோர்<br /></span></span></span><span style="font-family: TAU-Marutham, serif;">(not willing to disclose community)</span></p>
&nbsp;</td>
</tr>
</tbody>
</table> -->
</body>
</html>