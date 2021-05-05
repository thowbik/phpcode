
<?php 
	// print_r($staff_details);teacher_datesteacher_dates
	// echo $staff_detail->teacher_name;
	// echo $staff_details->gender;
	// print_r($this->session->userdata());
	$sch_name = $this->session->userdata('school_profile')[0];
  // echo $sch_name['id'];
  function change_date_format($date)
  {
      return ($date !='0000-00-00' && $date != '' ?date('d-m-Y',strtotime($date)):'--');

  }
?>
<div style="border-collapse: collapse;border: 1px solid black;">
<table style="width: 100%;">
<tbody>
<tr>
<td style="width: 600px; height: 100px;text-align: center;border-collapse: collapse;border-bottom: 1px solid black;" colspan="4"><h3><?=$sch_name['school_name'];?></h3></td>
<td style="width: 110px; height: 60px;text-align: center; border-collapse: collapse; border-left: 1px solid black;" rowspan="2"><?php 
	$key_name = 'Teachers/photo_all/'.$staff_details->e_picid.'.jpgx';
			$img_data = Common::get_url(TEACHER_BUCKET_NAME,$key_name,'+5 minutes');
			// echo  $img_data;
?><img src="<?=$img_data;?>" alt="no-Image" width="100px" height="130px"></td>
</tr>
<tr>
<td style="width: 80px; height:15px;border-collapse: collapse;">&nbsp;Teacher Code</td>
<td style="width: 120px; height:15px;border-right: 1px solid black;">:&nbsp;<?=$staff_details->teacher_code;?></td>
<td style="width: 20px; height:15px;border-collapse: collapse;">&nbsp;Category</td>
<td style="width: 80px; height:15px;">:&nbsp;<?=($staff_details->category==1?'Teaching':'Non-Teaching');?></td>
</tr> 
</tbody>
</table>
<table style="width:100%;border-collapse: collapse;" border="1">
<tbody>
<tr style="height: 21px;">
<td style="background-color: gray; color:#fff; text-align: center; height: 26px;" colspan="4">Staff Personal Information</td>
</tr>

<tr style="height: 26px;">
<td style="width: 125px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;border-left-style: hidden;">&nbsp;Name of the Staff</td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;">: <?=$staff_details->teacher_name;?></td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;">&nbsp;Aadhaar Number</td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;">:<?=$staff_details->aadhar_no;?></td>
</tr>
<tr style="height: 26px;">
<td style="width: 125px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;border-left-style: hidden;">&nbsp;Gender</td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;">: <?=($staff_details->gender==1?'Male':'Female');?>&nbsp;</td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;">&nbsp;Blood group</td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;">: <?=$staff_details->group;?></td>
</tr>
<tr style="height: 26px;">
<td style="width: 125px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;border-left-style: hidden;">&nbsp;Date of Birth</td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;">: <?=($staff_details->staff_dob!=''?date('d-m-Y',strtotime($staff_details->staff_dob)):"");?>&nbsp;</td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;">&nbsp;Social Category</td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;">: <?=$staff_details->social_cat;?></td>
</tr>
<tr style="height: 26px;">
<td style="width: 125px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;border-left-style: hidden;">&nbsp;Designation of Staff</td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;">: <?=$staff_details->desgination;?></td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;">&nbsp;Father's Name</td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;">: <?=$staff_details->e_prnts_nme;?></td>
</tr>
<tr style="height: 26px;">
<td style="width: 125px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;border-left-style: hidden;">&nbsp;Appointed for the Subject</td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;">: <?=$staff_details->appsub;?></td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;">&nbsp;Mother's Name</td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;">:<?=$staff_details->teacher_mother_name;?></td>
</tr>
<tr style="height: 26px;">
<td style="width: 125px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;border-left-style: hidden;">&nbsp;Differently abled type, If any</td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;">: <?php 

$dist_type = $staff_details->disability_type;
                                    // $dist_name = '';
                                    switch ($dist_type) {
                                        case 1:
                                        echo 'Not applicable';
                                        break;
                                        case 2:
                                        echo 'Physically Challenged';
                                        break;
                                        case 3:
                                        echo  'Visually Impaired';
                                        break;

                                        default:
                                        echo '';
                                        break;

                                    }
                                    // echo $dist_name;
?></td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;">&nbsp;Spouse Name, if any</td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;">: <?=$staff_details->teacher_spouse_name;?>	</td>
</tr>
<tr style="height: 26px;">
<td style="width: 125px; height: 26px;border-right-style: hidden;border-bottom-style: hidden;border-left-style: hidden;">&nbsp;Differently abled &nbsp;Details(including percentage)</td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;">:&nbsp;<?=($staff_details->types_disability!=0?$staff_details->types_disability:'--');?></td>
</tr>
</tbody>
</table>
<table style="width:100%;border-collapse: collapse;" border="1">
<tbody>
<tr style="height: 21px;">
<td style="width: 133px; height: 21px; text-align: center; background-color: gray; color:#fff;" colspan="4">Joining Details</td>
</tr>
<tr style="height: 26px;">
<td style="width: 140px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;border-left-style: hidden;">&nbsp;Date of Joining in Service</td>
<td style="width: 125px; height: 26px;border-bottom-style: hidden;">:&nbsp;<?=date('d-m-Y',strtotime($staff_details->staff_join));?></td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;">&nbsp;Date of Joining in Present Post</td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;">:&nbsp;<?=date('d-m-Y',strtotime($staff_details->staff_pjoin));?></td>
</tr>
<tr style="height: 26px;">
<td style="width: 140px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;border-left-style: hidden;">&nbsp;Date of Joining in Present School</td>
<td style="width: 125px; height: 26px;border-bottom-style: hidden;">:&nbsp;<?=date('d-m-Y',strtotime($staff_details->staff_psjoin));?></td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;">&nbsp;GPF/CPS/EPF Details</td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;">: <?=$staff_details->cps_gps_details;?></td>
</tr>
<tr style="height: 26px;">
<td style="width: 140px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;border-left-style: hidden;">&nbsp;GPF/CPS/EPF Number</td>
<td style="width: 125px; height: 26px;border-bottom-style: hidden;">: <?=$staff_details->cps_gps;?></td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;">&nbsp;Suffix</td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;">: <?=$staff_details->suf_name;?></td>
</tr>
<tr style="height: 26px;">
<td style="width: 140px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;border-left-style: hidden;">&nbsp;Mode of Recruitment</td>
<td style="width: 125px; height: 26px;border-bottom-style: hidden;">:&nbsp; <?=$staff_details->recruit_type;?></td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;">&nbsp;Recruitment Rank</td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;">: <?=$staff_details->recruit_rank;?></td>
</tr>
<tr style="height: 26px;">
<td style="width: 140px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;border-left-style: hidden;">&nbsp;Year Selection</td>
<td style="width: 125px; height: 26px;border-bottom-style: hidden;">: &nbsp;<?=$staff_details->recruit_year;?></td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;">&nbsp;Nature of appointment</td>
<td style="width: 133px; height: 26px;border-bottom-style: hidden;border-right-style: hidden;">: <?php 

                                    $nature_sub = $staff_details->appointment_nature;
                                    // $nature_sub_name = '';
                                      switch ($nature_sub) {
                                          case 1:
                                          echo 'Regular';
                                          break;
                                          case 2:
                                          echo 'Contract';
                                          break;
                                          case 3:
                                          echo 'Part-Time';
                                          break;
                                        
                                        default:
                                          Echo  '';
                                          break;
                                      }
                                      // echo $nature_sub_name;
                                    ?></td>
</tr>
</tbody>
</table>
<table style="width:100%";>
<tbody>
<tr style="height: 21px;">
<td style="width: 133px; height: 21px; text-align: center; background-color: gray; color:#fff;" colspan="4">Communication Details</td>
</tr>
<tr style="height: 26px;">
<td style="width: 205px; height: 26px;">&nbsp;Mobile Number</td>
<td style="width: 139px; height: 26px;" colspan="3">:&nbsp;<?=$staff_details->mbl_nmbr;?></td>
</tr>
<tr style="height: 26px;">
<td style="width: 205px; height: 26px;">&nbsp;E-Mail Id</td>
<td style="width: 139px; height: 26px;" colspan="3">:&nbsp;<?=$staff_details->email_id;?></td>
</tr>
<tr style="height: 26px;">
<td style="width: 205px; height: 26px;">&nbsp;Door no. / Building Name</td>
<td style="width: 139px; height: 26px;" colspan="3">:&nbsp;<?=$staff_details->e_prsnt_doorno;?></td>
</tr>
<tr style="height: 26px;">
<td style="width: 205px; height: 26px;">&nbsp;Street Name / Area name</td>
<td style="width: 139px; height: 26px;" colspan="3">:&nbsp;<?=$staff_details->e_prsnt_street;?></td>
</tr>
<tr style="height: 26px;">
<td style="width: 205px; height: 26px;">&nbsp;City name / Village name</td>
<td style="width: 139px; height: 26px;" colspan="3">:&nbsp;<?=$staff_details->e_prsnt_place;?></td>
</tr>
<tr style="height: 26px;">
<td style="width: 205px; height: 26px;">&nbsp;District</td>
<td style="width: 139px; height: 26px;" colspan="3">:&nbsp;<?=$staff_details->district_name;?></td>
</tr>
<tr style="height: 26px;">
<td style="width: 205px; height: 26px;">&nbsp;Pincode</td>
<td style="width: 139px; height: 26px;" colspan="3">:&nbsp;<?=$staff_details->e_prsnt_pincode;?></td>
</tr>
</tbody>
</table>
<!-- <table style="height: 235px;width:100%";>
<tbody>
<tr style="height: 21px;">
<td style="width: 133px; background-color: gray; color:#fff; text-align: center;" colspan="4">Communication Details</td>
</tr>
<tr style="height: 26px;">
<td style="width: 133px;height: 26px;">Mobile Number</td>
<td style="width: 133px;height: 26px;">:&nbsp;9445176313</td>
<td style="width: 133px;height: 26px;">&nbsp;E-Mail Id</td>
<td style="width: 133px;height: 26px;">:&nbsp;vgeethatr@gmail.com</td>
</tr>
<tr style="height: 26px;">
<td style="width: 133px;height: 26px;">Door no. / Building Name</td>
<td style="width: 133px;height: 26px;">:&nbsp;27 ,</td>
<td style="width: 133px;height: 26px;">Street Name / Area name&nbsp;</td>
<td style="width: 133px;height: 26px;">:&nbsp;JUDGES COLONY , 2ND STREET</td>
</tr>
<tr style="height: 26px;">
<td style="width: 133px;height: 26px;">City name / Village name</td>
<td style="width: 133px;height: 26px;">:&nbsp;PERIYAKUPPAM</td>
<td style="width: 133px;height: 26px;">District</td>
<td style="width: 133px;height: 26px;">: Kanniyakumari</td>
</tr>
<tr style="height: 26px;">
<td style="width: 133px;height: 26px;">Pincode</td>
<td style="width: 133px;height: 26px;" colspan="3">:&nbsp;602001&nbsp;&nbsp;</td>
</tr>
</tbody>
</table> -->
<table style="width:100%";>
<tbody>
<tr style="height: 21px;">
<td style="width: 133px; height: 21px; text-align: center; background-color: gray; color:#fff;" colspan="4">Academic Qualification</td>
</tr>
<tr style="height: 26px;">
<td style="width: 205px; height: 26px;">&nbsp;Academic</td>
<td style="width: 139px; height: 26px;" colspan="3">:&nbsp;<?=$staff_details->academic_teacher;?></td>
</tr>
<tr style="height: 26px;">
<td style="width: 205px; height: 26px;">&nbsp;Professiona</td>
<td style="width: 139px; height: 26px;" colspan="3">:&nbsp;<?=$staff_details->professional;?></td>
</tr>
<tr style="height: 26px;">
<td style="width: 205px; height: 26px;">&nbsp;UG</td>
<td style="width: 139px; height: 26px;" colspan="3">:&nbsp;<?=$staff_details->ug_degree;?></td>
</tr>
<tr style="height: 26px;">
<td style="width: 205px; height: 26px;">&nbsp;PG</td>
<td style="width: 139px; height: 26px;" colspan="3">:&nbsp;<?=$staff_details->pg_degree;?></td>
</tr>
</tbody>
</table>
<?php if($staff_details->category==1){?>
<table style="width:100%";>
<tbody>
<tr style="height: 21px;">
<td style="width: 133px; height: 21px; text-align: center; background-color: gray; color:#fff;" colspan="4">Main Subjects Taught</td>
</tr>
<tr style="height: 26px;">
<td style="width: 205px; height: 26px;">&nbsp;Subject 1</td>
<td style="width: 139px; height: 26px;" colspan="3">:&nbsp;<?=$staff_details->ts1;?></td>
</tr>
<tr style="height: 26px;">
<td style="width: 205px; height: 26px;">&nbsp;Subject 2</td>
<td style="width: 139px; height: 26px;" colspan="3">:&nbsp;<?=$staff_details->ts2;?></td>
</tr>
<tr style="height: 26px;">
<td style="width: 205px; height: 26px;">&nbsp;Subject 3</td>
<td style="width: 139px; height: 26px;" colspan="3">:&nbsp;<?=$staff_details->ts3;?></td>
</tr>
<tr style="height: 26px;">
<td style="width: 205px; height: 26px;">&nbsp;Subject 4</td>
<td style="width: 139px; height: 26px;" colspan="3">:&nbsp;<?=$staff_details->ts4;?></td>
</tr>
<tr style="height: 26px;">
<td style="width: 205px; height: 26px;">&nbsp;Subject 5</td>
<td style="width: 139px; height: 26px;" colspan="3">:&nbsp;<?=$staff_details->ts5;?></td>
</tr>
<tr style="height: 26px;">
<td style="width: 205px; height: 26px;">&nbsp;Subject 6</td>
<td style="width: 139px; height: 26px;" colspan="3">:&nbsp;<?=$staff_details->ts6;?></td>
</tr>
</tbody>
</table>
<?php }?>
</div>

<div style="border-collapse: collapse;border: 1px solid black; page-break-before: always;">
<table style="height: 71px; width: 100%;">
<tbody>
<tr>
<td style="width: 100%; height: 21px; text-align: center; background-color: gray; color: #ffffff;" colspan="3">Additional Details</td>
</tr>
<tr>
<td style="width: 34.2966%;"><strong>Date of Regularisation</strong></td>
<td style="width: 27.7034%;"><strong>Date</strong></td>
<!--<td style="width: 30.7034%;"><strong>Mode</strong></td>-->
</tr>
<?php if(!empty($teacher_regu_dates)){
	
      foreach($teacher_regu_dates as $regu_date) {?>
	  
<tr>
<td style="width: 34.2966%;"><?php 
                                      switch ($regu_date->type_date) {
                                          case 1: echo 'SGT'; break;
                                          case 2: echo 'PET'; break;
                                          case 3: echo 'Spl.Tr.'; break;
                                          case 4: echo 'BT'; break;
                                          case 5: echo 'PG'; break;
                                          case 7: echo 'Headmaster HSS'; break;
                                          case 6: echo 'Computer Instructor'; break;
                                          case 8: echo 'Headmaster HS'; break;
                                          case 9: echo 'Headmaster Middle School'; break;
                                          case 10: echo 'Headmaster Primary School'; break;
                                          case 11: echo 'Vocational Instructor'; break;
                                          case 12: echo 'PD Grade-I'; break;
                                          case 13: echo 'PD Grade-II'; break;
                                          case 14: echo 'BRTE'; break;
                                          default: echo  '--'; break;
                                      }
                                      
                  ?></td>
<td style="width: 27.7034%;">:&nbsp;<?=change_date_format($regu_date->dates);?></td>
<!--<td style="width: 30.7034%;">:&nbsp;<?=change_date_format($regu_date->dates);?></td>-->
</tr>
<?php }} ?>
</tbody>
</table>
&nbsp;
<table style="height: 52px; width: 100%;">
<tbody>
<?php if(!empty($teacher_dates)){
  $tchr_dates = $teacher_dates;
      // foreach($teacher_dates as $tchr_dates) {?>
<tr>
<td style="width: 33.8295%; text-align: left;"><strong>Date of Probation Declaration</strong></td>
<td style="width: 62.1705%; text-align: left;"><strong>Date</strong></td>
</tr>
<tr>
<td style="width: 33.8295%;"><?php                                 
switch ($tchr_dates->prob_id) {
                                        case 1: echo 'SGT'; break;
                                        case 2: echo 'PET'; break;
                                        case 3: echo 'Spl.Tr.'; break;
                                        case 4: echo 'BT'; break;
                                        case 5: echo 'PG'; break;
                                        case 7: echo 'Headmaster HSS'; break;
                                        case 6: echo 'Computer Instructor'; break;
                                        case 8: echo 'Headmaster HS'; break;
                                        case 9: echo 'Headmaster Middle School'; break;
                                        case 10: echo 'Headmaster Primary School'; break;
                                        case 11: echo 'Vocational Instructor'; break;
                                        case 12: echo 'PD Grade-I'; break;
                                        case 13: echo 'PD Grade-II'; break;
                                        case 14: echo 'BRTE'; break;
                                        default: echo  '--'; break;
                                      }

                  ?></td>
<td style="width: 62.1705%;">:&nbsp;<?=change_date_format($tchr_dates->prob_date);?></td>
</tr>

</tbody>
</table>
&nbsp;
<table style="height: 234px; width: 100%;">
<tbody>
<tr style="height: 30px;">
<td style="width: 63.5719%;">If Unit Transfer / Dept.Transfer Date of Joining in DSE / DEE</td>
<td style="width: 32.4281%;">:&nbsp;<?=change_date_format($tchr_dates->doj_dept);?></td>
</tr>
<tr style="height: 30px;">
<td style="width: 63.5719%;">10th Standard passed in Month / Year</td>
<td style="width: 32.4281%;">:&nbsp;<?=$tchr_dates->sslc_dop !='0000-00-00' && $tchr_dates->sslc_dop != '' ?date('m/Y',strtotime($tchr_dates->sslc_dop)):'--'  ?></td>
</tr>
<tr style="height: 30px;">
<td style="width: 63.5719%;">12th Standard passed in Month / Year</td>
<td style="width: 32.4281%;">:&nbsp;<?=$tchr_dates->higersec_dop !='0000-00-00' && $tchr_dates->sslc_dop != '' ?date('m/Y',strtotime($tchr_dates->higersec_dop)):'--'  ?></td>
</tr>
<tr style="height: 30px;">
<td style="width: 63.5719%;">Date Of Joining Present Block</td>
<td style="width: 32.4281%;">:&nbsp;<?=change_date_format($tchr_dates->doj_block); ?></td>
</tr>
<tr style="height: 30px;">
<td style="width: 63.5719%;">Date on which he/she become eligible for promotion (in the cadre of secondary Gr. / PET / Spl.Tr)</td>
<td style="width: 32.4281%;">:&nbsp;<?=change_date_format($tchr_dates->promo_eligi_date); ?></td>
</tr>
<tr style="height: 30px;">
<td style="width: 63.5719%;">Whether he/she already relinquished the similar promotion ?</td>
<td style="width: 32.4281%;">:&nbsp;<?php 
switch($tchr_dates->relinguish){
case 1: echo 'Yes'; break;
case 2: echo 'No'; break;
default: echo  '--'; break;
}
?></td>
</tr>
<?php if($tchr_dates->relinguish == 1) {?>
<tr style="height: 30px;">
<td style="width: 63.5719%;">Date of Relinquishment</td>
<td style="width: 32.4281%;">:&nbsp;<?=change_date_format($tchr_dates->relinguish_date);?></td>
</tr>
<?php } ?>
<tr style="height: 30px;">
<td style="width: 63.5719%;">Pay Drawing Head</td>
<td style="width: 32.4281%;">:&nbsp;<?=$tchr_dates->head_of_account_name;?></td>
</tr>
<?php
}?>
</tbody>
</table>

</div>