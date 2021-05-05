<?php $colspan=9; ?>
<html>
    <head>
        <title>Profile - <?php echo($profile[0]['school_name']); ?> </title>
        <style>
            @page{margin:1%;}
            tbody div:last-child{border:none;}
            #watermark{position:fixed;bottom:5px;right:20px; opacity:0.5;z-index:99;color:black;}
        </style>
    </head>
    <body style="font-family: serif; font-size: 10pt;">
        <div id="wrapper">
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <thead>
                    <tr style="background-color: #999;color: white;">
                        <th colspan="<?php echo($colspan); ?>"><strong><?php echo($profile[0]['udise_code']); ?> - <?php echo($profile[0]['school_name']); ?> - Dated On:<?php echo(date('d/m/Y h:i:s',strtotime("now"))); ?></strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr >
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">UDISE CODE</th>
                        <td colspan="<?php echo($colspan+1-2); ?>" id="udise_code"><strong><?php echo($profile[0]['udise_code']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">School Name</th>
                        <td colspan="<?php echo($colspan+1-2); ?>" id="school_name"><strong><?php echo($profile[0]['school_name']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">District</th>
                        <td colspan="<?php echo($colspan+1-2); ?>" id="district_name"><strong><?php echo($profile[0]['district_name']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Educational District </th>
                        <td colspan="<?php echo($colspan+1-2); ?>" id="edu_dist_name"><strong><?php echo($profile[0]['edu_dist_name']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Block</th>
                        <td colspan="<?php echo($colspan+1-2); ?>" id="block_name"><strong><?php echo($profile[0]['block_name']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Urban/Rural</th>
                        <td colspan="<?php echo($colspan+1-2); ?>" id="urbanrural"><strong><?php echo($profile[0]['urbanrural']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Local Body</th>
                        <td colspan="<?php echo($colspan+1-2); ?>" id="zone_type"><strong><?php echo($profile[0]['zone_type']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Village/Town/Municipality</th>
                        <td colspan="<?php echo($colspan+1-2); ?>" id="village_munci"><strong><?php echo($profile[0]['village_munci']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Village/Ward </th>
                        <td colspan="<?php echo($colspan+1-2); ?>" id="village_ward"><strong><?php echo($profile[0]['village_ward']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Assembly Constituency </th>
                        <td colspan="<?php echo($colspan+1-2); ?>" id="assembly_name"><strong><?php echo($profile[0]['assembly_name']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Parliamentary Constituency</th>
                        <td colspan="<?php echo($colspan+1-2); ?>" id="parli_name"><strong><?php echo($profile[0]['parli_name']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Address </th>
                        <td colspan="<?php echo($colspan+1-2); ?>"><strong><?php echo(str_replace('\n','<br>',$profile[0]['address']).' - '.$profile[0]['pincode']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Office LandLine </th>
                        <td id="office_landline"><strong><?php echo($profile[0]['office_landline']); ?></strong></td>
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Correspondent LandLine</th>
                        <td colspan="<?php echo($colspan+1-4); ?>" id="corr_landline"><strong><?php echo($profile[0]['corr_landline']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Office Mobile </th>
                        <td id="office_mobile"><strong><?php echo($profile[0]['office_mobile']); ?></strong></td>
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Correspondent Mobile</th>
                        <td colspan="<?php echo($colspan+1-4); ?>" id="corr_mobile"><strong><?php echo($profile[0]['corr_mobile']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">E-Mail ID </th>
                        <td id="sch_email"><strong><?php echo($profile[0]['sch_email']); ?></strong></td>
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Website</th>
                        <td colspan="<?php echo($colspan+1-4); ?>" id="website"><strong><?php echo($profile[0]['website']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Latitude </th>
                        <td id="latitude"><strong><?php echo($profile[0]['latitude']); ?></strong></td>
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Longitude</th>
                        <td colspan="<?php echo($colspan+1-4); ?>" id="longitude"><strong><?php echo($profile[0]['longitude']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Management Category</th>
                        <td id="manage_name"><strong><?php echo($profile[0]['manage_name']); ?></strong></td>
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Management Type</th>
                        <td id="management"><strong><?php echo($profile[0]['management']); ?></strong></td>
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Management Directorate</th>
                        <td colspan="<?php echo($colspan+1-6); ?>" id="department"><strong><?php echo($profile[0]['department']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">School Category</th>
                        <td id="scl_category"><strong><?php echo($profile[0]['scl_category']); ?></strong></td>
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Low Class</th>
                        <td id="low_class"><strong><?php echo($profile[0]['low_class']); ?></strong></td>
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">High Class</th>
                        <td id="high_class"><strong><?php echo($profile[0]['high_class']); ?></strong></td>
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">School Type</th>
                        <td colspan="<?php echo($colspan+1-8); ?>" id="school_type"><strong><?php echo($profile[0]['school_type']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Minority Group</th>
                        <td id="minority_grp"><strong><?php echo($profile[0]['minority_grp']); ?></strong></td>
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Minority Validity Year</th>
                        <td id="minority_yr" colspan="<?php echo($colspan+1-4); ?>"><?php echo($profile[0]['minority_yr']); ?></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Medium Of Instruction</th>
                        <td id="mediumetr">
                            <?php 
                                $result = array();$key='mediumetr';
                                foreach($profile as $val) {
                                    if(array_key_exists($key, $val)){
                                        $result[$val[$key]][] = $val;
                                    }else{
                                        $result[""][] = $val;
                                    }
                                }
                                foreach($result as $r){
                            ?>
                            <div><strong><?php echo($r[0]['mediumetr']); ?></strong></div>
                            <?php } ?>
                        </td>
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Language Taught</th>
                        <td colspan="<?php echo($colspan+1-4); ?>" id="langetr">
                            <?php 
                                $result = array();$key='langetr';
                                foreach($profile as $val) {
                                    if(array_key_exists($key, $val)){
                                        $result[$val[$key]][] = $val;
                                    }else{
                                        $result[""][] = $val;
                                    }
                                }
                                foreach($result as $r){
                            ?>
                            <div><strong><?php echo($r[0]['langetr']); ?></strong></div>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Prevocational Course</th>
                        <td colspan="<?php echo($colspan+1-2); ?>" id="trade">
                        <?php 
                            $result = array();$key='trade';
                            foreach($daywork_club_trade as $val) {
                                if(array_key_exists($key, $val)){
                                    $result[$val[$key]][] = $val;
                                }else{
                                    $result[""][] = $val;
                                }
                            }
                            foreach($result as $r){
                            ?>
                            <div><strong><?php echo($r[0]['trade']); ?></strong></div>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;"> All-Weather Roads ?</th>
                        <td colspan="<?php echo($colspan+1-2); ?>" id="weather_roads"><strong><?php echo($profile[0]['weather_roads']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;"> Anganwadi Workers</th>
                        <td id="angan_wrks"><strong><?php echo($profile[0]['angan_wrks']); ?></strong></td>
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;"> Anganwadi Children</th>
                        <td colspan="<?php echo($colspan+1-4); ?>" id="angan_childs"><strong><?php echo($profile[0]['angan_childs']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Year of establishment of School</th>
                        <td id="yr_estd_schl"><strong><?php echo($profile[0]['yr_estd_schl']); ?></strong></td>
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Year of first recognition of School</th>
                        <td id="yr_recgn_first"><strong><?php echo($profile[0]['yr_recgn_first']); ?></strong></td>
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Last Renewal Year &amp; Certificate Number</th>
                        <td colspan="<?php echo($colspan+1-6); ?>">
                            <div id="yr_last_renwl"><strong><?php echo($profile[0]['yr_last_renwl']); ?></strong></div>
                            <div id="certifi_no"><strong><?php echo($profile[0]['certifi_no']); ?></strong></div>
                        </td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Year of Upgradation / Recognition</th>
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Middle School</th>
                        <td id="yr_rec_schl_elem"><strong><?php echo($profile[0]['yr_rec_schl_elem']); ?></strong></td>
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">High School</th>
                        <td id="yr_rec_schl_sec"><strong><?php echo($profile[0]['yr_rec_schl_sec']); ?></strong></td>
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Higher Secondary</th>
                        <td id="yr_rec_schl_hsc" colspan="<?php echo($colspan+1-7); ?>"><strong><?php echo($profile[0]['yr_rec_schl_hsc']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">CWSN School</th>
                        <td id="cwsn_scl" colspan="<?php echo($colspan+1-2); ?>"><strong><?php echo($profile[0]['cwsn_scl']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Shift School</th>
                        <td id="shftd_schl" colspan="<?php echo($colspan+1-2); ?>"><strong><?php echo($profile[0]['shftd_schl']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Type of Residential</th>
                        <td id="typ_resid_schl" colspan="<?php echo($colspan+1-2); ?>"><strong><?php echo($profile[0]['typ_resid_schl']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">School situated in</th>
                        <td id="hill_frst" colspan="<?php echo($colspan+1-2); ?>"><strong><?php echo($profile[0]['hill_frst']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether School has special educator ?</th>
                        <td id="spl_edtor" colspan="<?php echo($colspan+1-2); ?>"><strong><?php echo($profile[0]['spl_edtor']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Academic Session Start</th>
                        <td id="acad_mnth_start" colspan="<?php echo($colspan+1-2); ?>"><strong><?php echo($profile[0]['acad_mnth_start']); ?></strong></td>
                    </tr>
                </table>
                <p style="page-break-before: always"></p>
                <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                    <?php
                       $result = array();$key='daywork_school_type';
                       foreach($daywork_club_trade as $val) {
                            if(array_key_exists($key, $val)){
                                $result[$val[$key]][] = $val;
                            }else{
                                $result[""][] = $val;
                            }
                       }
                       $rowspan=count($result)+1;
                    ?>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th colspan="<?php echo($colspan); ?>" style="text-align:center;background-color:#999;" >SCHOOL DAYS AND HOURS DETAILS</th>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:center;">Category</th>
                        <th style="text-align:center;">Instructional days</th>
                        <th style="text-align:center;">Children Working Hours</th>
                        <th style="text-align:center;">Teachers Working Hours</th>
                        <th style="text-align:center;">(CCE) implemented</th>
                        <th style="text-align:center;">Cumulative Records maintained</th>
                        <th colspan="<?php echo($colspan+1-7); ?>" style="text-align:center;">Cumulative Records<br /> Shared</th>
                    </tr>
                    <tbody id="daywork_school_type">
                    <?php foreach($result as $r){ ?>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <td style="text-align:center;"><strong><?php echo($r[0]['daywork_school_type']); ?></td>
                        <td style="text-align:center;"><strong><?php echo($r[0]['instr_dys']); ?></td>
                        <td style="text-align:center;"><strong><?php echo($r[0]['stud_hrs']); ?></td>
                        <td style="text-align:center;"><strong><?php echo($r[0]['teach_hrs']); ?></td>
                        <td style="text-align:center;"><strong><?php echo($r[0]['cce_impl']); ?></td>
                        <td style="text-align:center;"><strong><?php echo($r[0]['cce_cum']); ?></td>
                        <td colspan="<?php echo($colspan+1-7); ?>" style="text-align:center;"><strong><?php echo($r[0]['cce_shared']); ?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th colspan="<?php echo($colspan); ?>" style="text-align:center;background-color:#999;" >SPECIAL TRAINING</th>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:center;">Boys</th>
                        <th style="text-align:center;">Girls</th>
                        <th style="text-align:center;">Training Conducted By</th>
                        <th style="text-align:center;">Training Conducted In</th>
                        <th style="text-align:center;">Type of Training</th>
                        <th colspan="<?php echo($colspan+1-6); ?>" style="text-align:center;">Psychological counselling</th>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <td style="text-align:center;" id="train_prov_boys"><strong><?php echo($profile[0]['train_prov_boys']); ?></td>
                        <td style="text-align:center;" id="train_prov_grls"><strong><?php echo($profile[0]['train_prov_grls']); ?></td>
                        <td style="text-align:center;" id="train_cond_by"><strong><?php echo($profile[0]['train_cond_by']); ?></td>
                        <td style="text-align:center;" id="train_cond_in"><strong><?php echo($profile[0]['train_cond_in']); ?></td>
                        <td style="text-align:center;" id="train_type"><strong><?php echo($profile[0]['train_type']); ?></td>
                        <td colspan="<?php echo($colspan+1-6); ?>" style="text-align:center;" id="stu_councel"><strong><?php echo($profile[0]['stu_councel']); ?></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Clubs</th>
                        <td colspan="<?php echo($colspan+1-2); ?>" id="clubs">
                            <?php
                                $result = array();$key='clubs';
                               foreach($daywork_club_trade as $val) {
                                    if(array_key_exists($key, $val)){
                                        $result[$val[$key]][] = $val;
                                    }else{
                                        $result[""][] = $val;
                                    }
                               } 
                               foreach($result as $r){
                            ?>
                            <div><strong><?php echo($r[0]['clubs']); ?></strong></div>
                            <?php } ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tbody>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether the School has received graded supplementary material in previous academic year?</th>
                        <td colspan="5"><?php echo($profile[0]['suppliment_prevousyr']); ?></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:center;background-color:#999;">Availability of free Textbooks, Teaching Learning Equipment (TLE) and Play material (in Current Academic Year)</th>
                        <th style="text-align:center;background-color:#999;">Pre-Primary</th>
                        <th style="text-align:center;background-color:#999;">Primary</th>
                        <th style="text-align:center;background-color:#999;">Upper Primary</th>
                        <th style="text-align:center;background-color:#999;">Secondary</th>
                        <th style="text-align:center;background-color:#999;">Higher Secondary</th>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether complete set of free Textbooks received for the current year?</th>
                        <td id="txtbk_curyr_prepri"><?php echo($profile[0]['txtbk_curyr_prepri']); ?></td>
                        <td id="txtbk_curyr_pri"><?php echo($profile[0]['txtbk_curyr_pri']); ?></td>
                        <td id="txtbk_curyr_upp"><?php echo($profile[0]['txtbk_curyr_upp']); ?></td>
                        <td id="txtbk_curyr_sec"><?php echo($profile[0]['txtbk_curyr_sec']); ?></td>
                        <td id="txtbk_curyr_hsec"><?php echo($profile[0]['txtbk_curyr_hsec']); ?></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether TLE available for each Grade?</th>
                        <td id="tle_grade_preprim"><?php echo($profile[0]['tle_grade_preprim']); ?></td>
                        <td id="tle_grade_prim"><?php echo($profile[0]['tle_grade_prim']); ?></td>
                        <td id="tle_grde_upp"><?php echo($profile[0]['tle_grde_upp']); ?></td>
                        <td id="tle_grde_sec"><?php echo($profile[0]['tle_grde_sec']); ?></td>
                        <td id="tle_grde_hsec"><?php echo($profile[0]['tle_grde_hsec']); ?></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether Play materials, Games and Sports equipment are available for each Grade?</th>
                        <td id="sports_prepri"><?php echo($profile[0]['sports_prepri']); ?></td>
                        <td id="sports_pri"><?php echo($profile[0]['sports_pri']); ?></td>
                        <td id="sports_upp"><?php echo($profile[0]['sports_upp']); ?></td>
                        <td id="sports_sec"><?php echo($profile[0]['sports_sec']); ?></td>
                        <td id="sports_hsec"><?php echo($profile[0]['sports_hsec']); ?></td>
                    </tr>
                </tbody>
            </table>
            
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tbody>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th colspan="4" style="text-align:center;background-color:#999;">SCHOOL INSPECTION DETAILS</th>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align: center;">School Inspection done by</th>
                        <th style="text-align: center;">Purpose </th>
                        <th style="text-align: center;">Date of Inspection</th>
                    </tr>
                    <?php
                        $result = array();$key='inspectid';
                        foreach($const_lib_insp as $val) {
                            if(array_key_exists($key, $val)){
                                $result[$val[$key]][] = $val;
                            }else{
                                $result[""][] = $val;
                            }
                        } 
                        foreach($result as $r){
                    ?>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <td style="text-align: center;"><?php echo($r[0]['officer_type']); ?></td>
                        <td style="text-align: center;"><?php echo($r[0]['purpose']); ?></td>
                        <td style="text-align: center;"><?php echo($r[0]['date_inspect']); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tbody>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th colspan="3" style="text-align:center;background-color:#999;">SCHOOL SAFETY DETAILS</th>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether the School Disaster Management Plan (SDMP) has been developed ?</th>
                        <td colspan="2"><strong><?php echo($profile[0]['sdmp_dev']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether Structural Safety Audit has been conducted ?</th>
                        <td colspan="2"><strong><?php echo($profile[0]['sturct_saf']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether Non- structural Safety Audit has been conducted ?</th>
                        <td colspan="2"><strong><?php echo($profile[0]['nonsturct_saf']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether CCTV Cameras available in school ?</th>
                        <td colspan="2"><strong><?php echo($profile[0]['cctv_school']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether Fire Extinguishers are installed ?</th>
                        <td colspan="2"><strong><?php echo($profile[0]['firext_schl']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Does the school have a nodal teacher for school safety?</th>
                        <td colspan="2"><strong><?php echo($profile[0]['nodtchr_schlsaf']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether students and teachers undergo regular training in school safety and disaster preparedness ?</th>
                        <td colspan="2"><strong><?php echo($profile[0]['dister_trng']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether disaster management is being taught as part of the curriculum ?</th>
                        <td colspan="2"><strong><?php echo($profile[0]['dister_part']); ?></strong></td>
                    </tr>
                    <tr style="border-bottom:2px #F5F5F5 solid;">
                        <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether school has received grant for Self Defense Training for Girls ?</th>
                        <td colspan="2"><strong><?php echo($profile[0]['noslfdfse_trng']); ?></strong></td>
                    </tr>
                </tbody>
            </table>
            <p style="page-break-before: always"></p>
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="4" style="text-align:center;background-color:#999;">SCHOOL MANAGEMENT COMMITTEE (SMC) DETAILS</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;"></th>
                    <th style="text-align:center;">Male</th>
                    <th style="text-align:center;" colspan="2">Female</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Total number of members in SMC</th>
                    <td id="smc_tot_mle"><?php echo($profile[0]['smc_tot_mle']); ?></td>
                    <td id="smc_tot_fmle" colspan="2"><?php echo($profile[0]['smc_tot_fmle']) ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Members of parents/guardians</th>
                    <td id="smc_prnts_mle"><?php echo($profile[0]['smc_prnts_mle']); ?></td>
                    <td id="smc_prnts_fmle" colspan="2"><?php echo($profile[0]['smc_prnts_fmle']) ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Representatives/nominees from local authority/local Government/urban local body</th>
                    <td id="smc_rep_mle"><?php echo($profile[0]['smc_rep_mle']); ?></td>
                    <td id="smc_rep_fmle" colspan="2"><?php echo($profile[0]['smc_rep_fmle']) ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Members from weaker section and disadvantage group?</th>
                    <td id="smc_weakr_mle"><?php echo($profile[0]['smc_weakr_mle']); ?></td>
                    <td id="smc_weakr_fmle" colspan="2"><?php echo($profile[0]['smc_weakr_fmle']) ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Number of SMC meetings held during the Previous academic year</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"></td>
                    <td id="smc_no_prev_acyr" colspan="2"><?php echo($profile[0]['smc_no_prev_acyr']) ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">When was SMC constituted?</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"></td>
                    <td id="smc_const_yr" colspan="2"><?php echo($profile[0]['smc_const_yr']) ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Total number of members in SMC</th>
                    <td id="smc_tot_mle"><?php echo($profile[0]['smc_tot_mle']); ?></td>
                    <td id="smc_tot_fmle" colspan="2"><?php echo($profile[0]['smc_tot_fmle']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether SMC has prepared the School Development Plan?</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"></td>
                    <td id="smc_sdp" colspan="2"><?php echo($profile[0]['smc_sdp']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether Separate Bank Account for SMC is being maintained?</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;">
                        <div>ACCOUNT NAME:<strong id="smc_acc_name"><?php echo($profile[0]['smc_acc_name']); ?></strong></div>
                        <div>ACCOUNT NUMBER:<strong id="smc_acc_no"><?php echo($profile[0]['smc_acc_no']); ?></strong></div> 
                    </td>
                    <td colspan="2">BRANCH &amp; IFSC CODE : <strong id="smc_bank"><?php echo($profile[0]['smc_bank']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">SMC Chairperson Name</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="smc_chair_name"><?php echo($profile[0]['smc_chair_name']); ?></strong></td>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">SMC Chairperson Mobile Number</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="smc_chair_mble"><?php echo($profile[0]['smc_chair_mble']); ?></strong></td>
                </tr>
            </table>
            <p style="page-break-before: always"></p>
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="4" style="text-align:center;background-color:#999;">SCHOOL MANAGEMENT AND DEVELOPMENT COMMITTEE (SMDC) DETAILS</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Total Members</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="smdc_tot_mle"><?php echo($profile[0]['smdc_tot_mle']); ?></strong></td>
                    <td colspan="2"><strong><?php echo($profile[0]['smdc_tot_fmle']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Representatives from Parents / Guardians / PTA</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong><?php echo($profile[0]['smdc_parnt_mle']); ?></strong></td>
                    <td colspan="2"><strong id="smdc_parnt_fmle"><?php echo($profile[0]['smdc_parnt_fmle']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Representatives / Nominees from Local Government / Urban Local Body</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="smdc_lb_mle"><?php echo($profile[0]['smdc_lb_mle']); ?></strong></td>
                    <td colspan="2"><strong id="smdc_lb_fmle"><?php echo($profile[0]['smdc_lb_fmle']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Members from Educationally Backward Minority Community</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="smdc_minori_mle"><?php echo($profile[0]['smdc_minori_mle']); ?></strong></td>
                    <td colspan="2"><strong id="smdc_minori_fmle"><?php echo($profile[0]['smdc_minori_fmle']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Members from any Women's Group</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"></strong></td>
                    <td colspan="2"><strong id="smdc_women"><?php echo($profile[0]['smdc_women']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Members from SC / ST Community</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="smdc_scst_mle"><?php echo($profile[0]['smdc_scst_mle']); ?></strong></td>
                    <td colspan="2" id="smdc_scst_fmle"><strong><?php echo($profile[0]['smdc_scst_fmle']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Nominees from the District Educational Office (DEO)</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="smdc_deo_mle"><?php echo($profile[0]['smdc_deo_mle']); ?></strong></td>
                    <td colspan="2"><strong id="smdc_deo_fmle"><?php echo($profile[0]['smdc_deo_fmle']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Members from Audit and Accounts Department (AAD)</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="smdc_audit_mle"><?php echo($profile[0]['smdc_audit_mle']); ?></strong></td>
                    <td colspan="2"><strong id="smdc_audit_fmle"><?php echo($profile[0]['smdc_audit_fmle']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Subject experts (each one from Science, Humanities and Arts / Crafts / Culture) nominated by District Programme Co-ordinator (RMSA)</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="smdc_exprt_mle"><?php echo($profile[0]['smdc_exprt_mle']); ?></strong></td>
                    <td colspan="2"><strong id="smdc_exprt_fmle"><?php echo($profile[0]['smdc_exprt_fmle']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Teachers (one each from Social Science, Science and Mathematics) of the School</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="smdc_techrs_mle"><?php echo($profile[0]['smdc_techrs_mle']); ?></strong></td>
                    <td colspan="2"><strong id="smdc_techrs_fmle"><?php echo($profile[0]['smdc_techrs_fmle']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Vice-Principal / Asst. Headmaster, as a member</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="smdc_hm_mle"><?php echo($profile[0]['smdc_hm_mle']); ?></strong></td>
                    <td colspan="2"><strong id="smdc_hm_fmle"><?php echo($profile[0]['smdc_hm_fmle']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Principal / Headmaster, as Chairperson</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="smdc_prnci_mle"><?php echo($profile[0]['smdc_prnci_mle']); ?></strong></td>
                    <td colspan="2"><strong id="smdc_prnci_fmle"><?php echo($profile[0]['smdc_prnci_fmle']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Chairperson (If Principal / Headmaster is not the Chairperson)</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="smdc_chair_mle"><?php echo($profile[0]['smdc_chair_mle']); ?></strong></td>
                    <td colspan="2"><strong id="smdc_chair_fmle"><?php echo($profile[0]['smdc_chair_fmle']); ?></strong></td>
                </tr>
                
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Year in which the SMDC was constituted?</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"></td>
                    <td colspan="2"><strong id="smdc_const_yr"><?php echo($profile[0]['smdc_const_yr']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Number of SMDC meetings held during the last academic year</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"></td>
                    <td colspan="2"><strong id="smdc_no_last_acyr"><?php echo($profile[0]['smdc_no_last_acyr']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether SMDC has prepared School Improvement Plan?</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"></td>
                    <td colspan="2"><strong id="smdc_sip"><?php echo($profile[0]['smdc_sip']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether separate Bank Account for SMDC is being maintained?</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;">
                        <div>ACCOUNT NAME:<strong id="smdc_acc_name"><?php echo($profile[0]['smdc_acc_name']); ?></strong></div>
                        <div>ACCOUNT NUMBER:<strong id="smdc_acc_no"><?php echo($profile[0]['smdc_acc_no']); ?></strong></div> 
                    </td>
                    <td colspan="2">BRANCH &amp; IFSC CODE : <strong id="smdc_bank"><?php echo($profile[0]['smdc_bank']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">SMC Chairperson Name</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="smc_chair_name"><?php echo($profile[0]['smc_chair_name']); ?></strong></td>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">SMC Chairperson Mobile Number</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="smc_chair_mble"><?php echo($profile[0]['smc_chair_mble']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">SMDC Contribution (in Rs.)</th>
                    <td colspan="3"><strong id="smdc_contrib_amt"><?php echo($profile[0]['smdc_contrib_amt']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether the School Building Committee (SBC) has been constituted?</th>
                    <td colspan="3"><strong id="sbc_const"><?php echo($profile[0]['sbc_const']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether the School has constituted its Academic Committee (AC)</th>
                    <td colspan="3"><strong id="acadecomm_const"><?php echo($profile[0]['acadecomm_const']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">PTA Established Year</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="pta_est_yr"><?php echo($profile[0]['pta_est_yr']); ?></strong></td>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Number of PTA meetings held during the last academic year</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="pta_no_curyr"><?php echo($profile[0]['pta_no_curyr']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">PTA Registration No.</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="pta_reg_no"><?php echo($profile[0]['pta_reg_no']); ?></strong></td>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Academic Year for Last PTA Subscription Paid</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="pta_subscri_amt"><?php echo($profile[0]['pta_subscri_amt']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">PTA Chairperson Name</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="pta_chair_name"><?php echo($profile[0]['pta_chair_name']); ?></strong></td>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">PTA Chairperson Mobile Number</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="pta_chair_mble"><?php echo($profile[0]['pta_chair_mble']); ?></strong></td>
                </tr>
            </table>
            <p style="page-break-before: always"></p>
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="6" style="text-align:center;background-color:#999;">SCHOOL INFRASTRUCTURE DETAILS</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Total land availability (Including Building area and Playground) in Acre </th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="land_avail_sqft"><?php echo($profile[0]['land_avail_sqft']); ?></strong></td>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Area of the Playground (in Acre) /<br /> Alternative Arrangements for Children to Play (Address &amp; Distance)   </th>
                    <td colspan="4"><strong id="play_area_sqft"><?php echo($profile[0]['play_area_sqft']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether land is available for expansion of School facilities? area of land available in Acre </th>
                    <td colspan="5"><strong id="play_land_area"><?php echo($profile[0]['play_land_area']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Land Ownership</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="land_ownersip"><?php echo($profile[0]['land_ownersip']); ?></strong></td>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">If Rented,Amount of Rent per year (in Rs.)</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="land_rent_amt"><?php echo($profile[0]['land_rent_amt']); ?></strong></td>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">If Leased,Period of Lease (in years) / Lease Ending Date</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="land_lease_perid"><?php echo($profile[0]['land_lease_perid'].' Years / '.$profile[0]['valid_upto']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Type of Boundary Wall</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="cmpwall_type"><?php echo($profile[0]['cmpwall_type']); ?></strong></td>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Perimeter of boundary (in meters)  </th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="cmpwall_perimtr"><?php echo($profile[0]['cmpwall_perimtr']); ?></strong></td>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Length of the boundary wall constructed (in meters)</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong id="cmpwall_length"><?php echo($profile[0]['cmpwall_length']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Total no of Buildings / Blocks </th>
                    <td colspan="5"><strong id="build_block_no"><?php echo($profile[0]['build_block_no']); ?></strong></td>
                </tr>
            </table>
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="17" style="text-align:center; background-color: #999;">Building / Block Details</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Block No.:</th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Construction Type</th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Floors (Inc. Ground Floor)</th>
                    <th colspan="2" style="text-align:center;">Class</th>	
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Office</th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Lab</th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Library</th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Computer</th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Arts/Craft</th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">HM/AHM/Vice Principal</th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Girls</th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Good condition</th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Minor Repair</th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Major Repair</th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Total</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;"></th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;"></th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;"></th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">In Use</th>	
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Not In Use</th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;"></th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;"></th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;"></th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;"></th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;"></th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;"></th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;"></th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;"></th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;"></th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;"></th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;"></th>
                </tr>
                <?php
                    $result = array();$key='constr_id';
                    foreach($const_lib_insp as $val) {
                        if(array_key_exists($key, $val)){
                            $result[$val[$key]][] = $val;
                        }else{
                            $result[""][] = $val;
                        }
                    } 
                    //print_r($result);die();
                    $blockno=1;
                    foreach($result as $r){
                ?>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><?php echo($blockno++); ?></td>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><?php echo($r[0]['construct_type']); ?></td>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><?php echo($r[0]['total_flrs']); ?></td>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><?php echo($r[0]['tot_classrm_use']); ?></td>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><?php echo($r[0]['tot_classrm_nouse']); ?></td>	
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><?php echo($r[0]['off_room']); ?></td>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><?php echo($r[0]['lab_room']); ?></td>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><?php echo($r[0]['comp_room']); ?></td>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><?php echo($r[0]['art_room']); ?></td>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><?php echo($r[0]['staff_room']); ?></td>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><?php echo($r[0]['hm_room']); ?></td>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><?php echo($r[0]['girl_room']); ?></td>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><?php echo($r[0]['good_condition']); ?></td>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><?php echo($r[0]['need_minorrep']); ?></td>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><?php echo($r[0]['need_majorrep']); ?></td>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><?php echo($r[0]['total_room']); ?></td>
                </tr>
                <?php } ?>
            </table>
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="3" style="text-align: center; background-color: #999;">CLASS ROOM DETAILS</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Classrooms under construction </th>
                    <td colspan="2"><strong id="classrm_undr_constr"><?php echo($profile[0]['classrm_undr_constr']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Do all the classrooms have desk / table for students?</th>
                    <td colspan="2"><strong id="classrm_desk_studs"><?php echo($profile[0]['classrm_desk_studs']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether there is a ramp for differently abled children to access classrooms?</th>
                    <td colspan="2"><strong id="ramp_disable_child"><?php echo($profile[0]['ramp_disable_child']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether hand-rails for ramp available?</th>
                    <td colspan="2"><strong id="ramp_handrail"><?php echo($profile[0]['ramp_handrail']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:center;">Levels</th>
                    <th colspan="2" style="text-align:center;">No of Rooms</th>
                </tr>
                <?php
                    $result = array();$key='category_name';
                    foreach($const_lib_insp as $val) {
                        if(array_key_exists($key, $val)){
                            $result[$val[$key]][] = $val;
                        }else{
                            $result[""][] = $val;
                        }
                    } 
                    //print_r($result);die();
                    $blockno=1;
                    foreach($result as $r){
                ?>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <td style="text-align:center;"><?php echo($r[0]['category_name']); ?></td>
                    <td colspan="2" style="text-align:center;"><?php echo($r[0]['num_rooms']); ?></td>
                </tr>
                <?php } ?>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="3" style="text-align:center;background-color:#999;">OTHER ROOM DETAILS</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Staff quarters (including Residential Quarters for Head Master/Principal and Others) </th>
                    <td colspan="2"><strong id="rooms_staffquartrs"><?php echo($profile[0]['rooms_staffquartrs']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Does the school have a full-time librarian? </th>
                    <td colspan="2"><strong id="fulltime_lib"><?php echo($profile[0]['fulltime_lib']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Does the school subscribe to newspapers/magazines? </th>
                    <td colspan="2"><strong id="news_subscribe"><?php echo($profile[0]['news_subscribe']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align: center;">Library facility/Book Bank/ Reading Corner</th>
                    <th colspan="2" style="text-align: center;">Total number of books</th>
                </tr>
                <?php
                    $result = array();$key='library_type';
                    foreach($const_lib_insp as $val) {
                        if(array_key_exists($key, $val)){
                            $result[$val[$key]][] = $val;
                        }else{
                            $result[""][] = $val;
                        }
                    } 
                    //print_r($result);die();
                    $blockno=1;
                    foreach($result as $r){
                ?>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <td style="text-align:center;"><?php echo($r[0]['library_type']); ?></td>
                    <td colspan="2" style="text-align:center;"><?php echo($r[0]['num_books']); ?></td>
                </tr>
                <?php } ?>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="3" style="text-align:center;background-color:#999;">SCHOOL TOILETS FOR STAFF DETAILS</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Details of Toilets and Urinals for Staff</th>
                    <th style="text-align:center;">Gents</th>
                    <th style="text-align:center;">Ladies</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Total number of Toilets available </th>
                    <td style="text-align:center;" id="toil_gents_tot"><?php echo($profile[0]['toil_gents_tot']); ?></td>
                    <td style="text-align:center;" id="toil_ladies_tot"><?php echo($profile[0]['toil_ladies_tot']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Total number of Urinals available</th>
                    <td style="text-align:center;" id="urinal_gents_tot"><?php echo($profile[0]['urinal_gents_tot']); ?></td>
                    <td style="text-align:center;" id="urinals_tot_ladies"><?php echo($profile[0]['urinals_tot_ladies']); ?></td>
                </tr>
            </table>
            <p style="page-break-before: always"></p>
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="7" style="text-align:center;background-color:#999;">SCHOOL TOILETS FOR STUDENTS DETAILS</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:center;">Details of Toilets and Urinals for Students</th>
                    <th colspan="3" style="text-align:center;">Boys</th>
                    <th colspan="3" style="text-align:center;">Girls</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">&nbsp;</th>
                    <th style="text-align:center;">In Use</th>
                    <th style="text-align:center;">Not In Use</th>
                    <th style="text-align:center;">Reason</th>
                    <th style="text-align:center;">In Use</th>
                    <th style="text-align:center;">Not In Use</th>
                    <th style="text-align:center;">Reason</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Total number of Toilets available</th>
                    <td style="text-align:center;"><strong id="toil_bys_inuse"><?php echo($profile[0]['toil_bys_inuse']); ?></strong></td>
                    <td style="text-align:center;"><strong id="toil_notuse_bys"><?php echo($profile[0]['toil_notuse_bys']); ?></strong></td>
                    <td style="text-align:center;"><strong id="toil_nonfunc_bys"><?php echo($profile[0]['toil_nonfunc_bys']); ?></strong></td>
                    <td style="text-align:center;"><strong id="toil_inuse_grls"><?php echo($profile[0]['toil_inuse_grls']); ?></strong></td>
                    <td style="text-align:center;"><strong id="toil_notuse_grls"><?php echo($profile[0]['toil_notuse_grls']); ?></strong></td>
                    <td style="text-align:center;"><strong id="toil_reasn_grls"><?php echo($profile[0]['toil_reasn_grls']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">CWSN friendly functional toilets</th>
                    <td style="text-align:center;"><?php echo($profile[0]['cwsntoil_inuse_bys']); ?></td>
                    <td style="text-align:center;"><?php echo($profile[0]['cwsntoil_notuse_bys']); ?></td>
                    <td style="text-align:center;"><?php echo($profile[0]['cwsntoil_reasn_bys']); ?></td>
                    <td style="text-align:center;"><?php echo($profile[0]['cwsntoil_inuse_grls']); ?></td>
                    <td style="text-align:center;"><?php echo($profile[0]['cwsntoil_notuse_grls']); ?></td>
                    <td style="text-align:center;"><?php echo($profile[0]['cwsntoil_reasn_grls']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Total number of Urinals available</th>
                    <td style="text-align:center;"><?php echo($profile[0]['urinls_inuse_bys']); ?></td>
                    <td style="text-align:center;"><?php echo($profile[0]['urinls_notuse_bys']); ?></td>
                    <td style="text-align:center;"><?php echo($profile[0]['urinls_reasn_bys']); ?></td>
                    <td style="text-align:center;"><?php echo($profile[0]['urinls_inuse_grls']); ?></td>
                    <td style="text-align:center;"><?php echo($profile[0]['urinls_notuse_grls']); ?></td>
                    <td style="text-align:center;"><?php echo($profile[0]['urinls_reasn_grls']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Toilets have running water facility for flushing and cleaning?</th>
                    <td colspan="3" style="text-align:center;"><?php echo($profile[0]['toil_waterfac_bys']); ?></td>
                    <td colspan="3" style="text-align:center;"><?php echo($profile[0]['toil_waterfac_grls']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">How many urinals have water facility?</th>
                    <td colspan="3" style="text-align:center;"><?php echo($profile[0]['urinls_waterfac_bys']); ?></td>
                    <td colspan="3" style="text-align:center;"><?php echo($profile[0]['urinls_waterfac_grls']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Sanitary Worker engaged to clean the Toilets</th>
                    <td colspan="6" style="text-align:center;"><?php echo($profile[0]['toil_sanit_wrks']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Land available for construction of additional Toilets</th>
                    <td colspan="6" style="text-align:center;"><?php echo($profile[0]['toil_land_avail']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">School has been provided with Napkin Vending Machine?</th>
                    <td colspan="6" style="text-align:center;">
                        <div>AVAILABLITY&nbsp;:&nbsp;<?php echo($profile[0]['napkin_avail_no']); ?></div>
                        <div>FUNCTIONAL&nbsp;&nbsp;:&nbsp;<?php echo($profile[0]['napkin_func_no']); ?></div>
                    </td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="3">&nbsp;</th>
                    <th style="text-align:center;">Manual (Choolas) Functional</th>
                    <th style="text-align:center;">Manual (Choolas) Non-Functional</th>
                    <th style="text-align:center;">Automatic (Electrical) Functional</th>
                    <th style="text-align:center;">Automatic (Electrical) Non-Functional</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="3">School has been provided with Incinerator?</th>
                    <td style="text-align:center;"><strong><?php echo($profile[0]['inci_auto_avail_no']); ?></strong></td>
                    <td style="text-align:center;"><strong><?php echo($profile[0]['inci_auto_func_no']); ?></strong></td>
                    <td style="text-align:center;"><strong><?php echo($profile[0]['inci_man_avail_no']); ?></strong></td>
                    <td style="text-align:center;"><strong><?php echo($profile[0]['inci_man_func_no']); ?></strong></td>
                </tr>
            </table>
            <p style="page-break-before: always"></p>
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="5" style="text-align:center;background-color:#999;">SCHOOL DRINIKING WATER AND HAND WASH FACILITY DETAILS</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Total no of Handwash Tap in use</th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Available</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong><?php echo($profile[0]['tot_handwash_bys']); ?></strong></td>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Functional</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong><?php echo($profile[0]['tot_handwash_grls']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether drinking water is available in School premises?</th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">source of drinking water</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong><?php echo($profile[0]['drnkwater_avail']); ?></strong></td>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether well is being maintained as top closed?</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><strong><?php echo($profile[0]['well_top']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether water quality is tested from water testing lab ?</th>
                    <td colspan="4"><strong><?php echo($profile[0]['water_test']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether the School is provided with Overhead tank ?</th>
                    <td colspan="4"><strong><?php echo($profile[0]['overheadtank_avail']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Does the School have provision for Rain Water Harvesting?</th>
                    <td colspan="4"><strong><?php echo($profile[0]['schl_rainwtr_hrv']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether solar panel is available in school ?</th>
                    <td colspan="4"><strong><?php echo($profile[0]['solar_panel']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Whether Kitchen Garden is available in school?</th>
                    <td colspan="4"><strong><?php echo($profile[0]['kitchen_garden']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Does the school have dustbins for collection of waste in Each Class Room?</th>
                    <td colspan="4"><strong><?php echo($profile[0]['class_dustbin']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Does the school have dustbins for collection of waste in Toilets?</th>
                    <td colspan="4"><strong><?php echo($profile[0]['waste_toilets']); ?></strong></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Does the school have dustbins for collection of waste in Kitchen?</th>
                    <td colspan="4"><strong><?php echo($profile[0]['waste_kitchen']); ?></strong></td>
                </tr>
            </table>
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="5" style="text-align:center;background-color:#999;">DETAILS OF EQUIPMENTS (FOR TEACHING AND LEARNING PURPOSE)</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:center;">List of Devices</th>
                    <th style="text-align:center;">Supplied by</th>
                    <th style="text-align:center;">Purpose </th>
                    <th style="text-align:center;">Available </th>
                    <th style="text-align:center;">Functional  </th>
                </tr>
                <?php
                    $result = array();$key='ictetrid';
                    foreach($equip_lab_inet as $val) {
                        if(array_key_exists($key, $val)){
                            $result[$val[$key]][] = $val;
                        }else{
                            $result[""][] = $val;
                        }
                    } 
                    //print_r($result);die();
                    foreach($result as $r){
                ?>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <td style="text-align:center;"><?php echo($r[0]['ict_type']); ?></td>
                    <td style="text-align:center;"><?php echo($r[0]['supplied_by']); ?></td>
                    <td style="text-align:center;"><?php echo($r[0]['purpose']); ?></td>
                    <td style="text-align:center;"><?php echo($r[0]['avail_nos']); ?></td>
                    <td style="text-align:center;"><?php echo($r[0]['working_nos']); ?></td>
                </tr>
                <?php } ?>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="5" style="text-align:center;background-color:#999;">INTERNET FACILITY DETAILS</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">School have a Computer Aided Learning Lab (CAL)</th>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;"></th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:center;">Service Provider</th>
                    <th colspan="2" style="text-align:center;">Data Speed</th>
                    <th colspan="2" style="text-align:center;">Provided by </th>
                </tr>
                <?php
                    $result = array();$key='internet';
                    foreach($equip_lab_inet as $val) {
                        if(array_key_exists($key, $val)){
                            $result[$val[$key]][] = $val;
                        }else{
                            $result[""][] = $val;
                        }
                    } 
                    //print_r($result);die();
                    foreach($result as $r){
                ?>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <td style="text-align:center;"><?php echo($r[0]['subscriber']); ?></td>
                    <td colspan="2" style="text-align:center;"><?php echo($r[0]['data_speed']); ?></td>
                    <td colspan="2" style="text-align:center;"><?php echo($r[0]['provided_by']); ?></td>
                </tr>
                <?php } ?>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="5" style="text-align:center;background-color:#999;">SCHOOL LAB DETAILS</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:center;">Lab</th>
                    <th colspan="2" style="text-align:center;">Seperate Room</th>
                    <th colspan="2" style="text-align:center;">Condition </th>
                </tr>
                <?php
                    $result = array();$key='labetrid';
                    foreach($equip_lab_inet as $val) {
                        if(array_key_exists($key, $val)){
                            $result[$val[$key]][] = $val;
                        }else{
                            $result[""][] = $val;
                        }
                    } 
                    //print_r($result);die();
                    foreach($result as $r){
                ?>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <td style="text-align:center;"><?php echo($r[0]['Lab']); ?></td>
                    <td colspan="2" style="text-align:center;"><?php echo($r[0]['seperate_room']); ?></td>
                    <td colspan="2" style="text-align:center;"><?php echo($r[0]['condition_now']); ?></td>
                </tr>
                <?php } ?>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="5" style="text-align:center;background-color:#999;">SCHOOL EQUIPMENT DETAILS</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:center;">Equipments</th>
                    <th colspan="2" style="text-align:center;">Supplier</th>
                    <th colspan="2" style="text-align:center;">Quantity </th>
                </tr>
                <?php
                    $result = array();$key='eqipid';
                    foreach($equip_lab_inet as $val) {
                        if(array_key_exists($key, $val)){
                            $result[$val[$key]][] = $val;
                        }else{
                            $result[""][] = $val;
                        }
                    } 
                    //print_r($result);die();
                    foreach($result as $r){
                ?>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <td style="text-align:center;"><?php echo($r[0]['ictkit']); ?></td>
                    <td colspan="2" style="text-align:center;"><?php echo($r[0]['kitsupplier']); ?></td>
                    <td colspan="2" style="text-align:center;"><?php echo($r[0]['quantity']); ?></td>
                </tr>
                <?php } ?>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="5" style="text-align:center;background-color:#999;">SCHOOL EQUIPMENT DETAILS</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:center;">List of Things</th>
                    <th colspan="2" style="text-align:center;">Supplier</th>
                    <th style="text-align:center;">Available </th>
                    <th style="text-align:center;">Functional</th>
                </tr>
                <?php
                    $result = array();$key='invenid';
                    foreach($equip_lab_inet as $val) {
                        if(array_key_exists($key, $val)){
                            $result[$val[$key]][] = $val;
                        }else{
                            $result[""][] = $val;
                        }
                    } 
                    //print_r($result);die();
                    foreach($result as $r){
                ?>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <td style="text-align:center;"><?php echo($r[0]['inven_item']); ?></td>
                    <td colspan="2" style="text-align:center;"><?php echo($r[0]['invensupp']); ?></td>
                    <td style="text-align:center;"><?php echo($r[0]['inven_avail']); ?></td>
                    <td style="text-align:center;"><?php echo($r[0]['inven_working']); ?></td>
                </tr>
                <?php } ?>
            </table>
            <p style="page-break-before: always"></p>
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:center;background-color:#999;" colspan="5">Endowment Fund Details</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Name of the Bank deposited</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><?php echo($fees_udiseplus_fund[0]['endow_bank_id']); ?></td>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Amount (in Rs.) </th>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['endow_amt']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Date of Deposit</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><?php echo($fees_udiseplus_fund[0]['endow_date_deposit']); ?></td>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Date of Maturity </th>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['endow_date_maturity']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Bank Certificate Number</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><?php echo($fees_udiseplus_fund[0]['endow_certif']); ?></td>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;"></th>
                    <td colspan="2"></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:center;background-color:#999;" colspan="5">Corpus Fund Details</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Name of the Bank deposited</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><?php echo($fees_udiseplus_fund[0]['corp_bank_id']); ?></td>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Amount (in Rs.) </th>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['corp_amt']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Date of Deposit</th>
                    <td style="padding:2px 15px;border-bottom:#CCC thin solid;"><?php echo($fees_udiseplus_fund[0]['corp_date_deposit']); ?></td>
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Account Number  </th>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['corp_accno']); ?></td>
                </tr>
            </table>
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:center;background-color:#999;" colspan="10">SCHOOL FEES DETAILS</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align: center;">Standard</th>                                                                        
                    <th style="text-align: center;">Institution Fee</th>
                    <th style="text-align: center;">Tution Fee</th>
                    <th style="text-align: center;">Regular Fee</th>
                    <th style="text-align: center;">Transport Fee</th>
                    <th style="text-align: center;">Annual Fee</th>
                    <th style="text-align: center;">Book Fee</th>
                    <th style="text-align: center;">Lab Fee</th>
                    <th style="text-align: center;">Other Fee</th>
                    <th style="text-align: center;">Total</th>
                </tr>
                <?php
                    $result = array();$key='feesid';
                    foreach($fees_udiseplus_fund as $val) {
                        if(array_key_exists($key, $val)){
                            $result[$val[$key]][] = $val;
                        }else{
                            $result[""][] = $val;
                        }
                    } 
                    //print_r($result);die();
                    foreach($result as $r){
                ?>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <td style="text-align: center;"><?php echo($r[0]['class_id']); ?></td>
                    <td style="text-align: center;"><?php echo($r[0]['inst_fee']); ?></td>
                    <td style="text-align: center;"><?php echo($r[0]['tution_fee']); ?></td>
                    <td style="text-align: center;"><?php echo($r[0]['regular_fee']); ?></td>
                    <td style="text-align: center;"><?php echo($r[0]['transport_fee']); ?></td>
                    <td style="text-align: center;"><?php echo($r[0]['annual_fee']); ?></td>
                    <td style="text-align: center;"><?php echo($r[0]['book_fee']); ?></td>
                    <td style="text-align: center;"><?php echo($r[0]['lab_fee']); ?></td>
                    <td style="text-align: center;"><?php echo($r[0]['other_fee']); ?></td>
                    <td style="text-align: center;"><?php echo($r[0]['total_fee']); ?></td>
                </tr>
                <?php } ?>
            </table>
            <p style="page-break-before: always"></p>
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:center;background-color:#999;" colspan="7">INCENTIVES &amp; FACILITIES PROVIDED TO CHILDREN</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align: center;">Types of Facility</th>
                    <th colspan="2" style="text-align: center;">Elementary</th>
                    <th colspan="2" style="text-align: center;">Secondary</th>
                    <th colspan="2" style="text-align: center;">Higher Secondary</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align: center;">&nbsp;</th>
                    <th style="text-align: center;">BOYS</th>
                    <th style="text-align: center;">GIRLS</th>
                    <th style="text-align: center;">BOYS</th>
                    <th style="text-align: center;">GIRLS</th>
                    <th style="text-align: center;">BOYS</th>
                    <th style="text-align: center;">GIRLS</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Braille books</th>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['brlbks_elebys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['brlbks_elegls']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['brailbks_secbys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['brlbks_secgls']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['brailbks_hsecbys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['brlbks_hsegls']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Braille kit</th>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['brlkit_elebys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['brlkit_elegls']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['brailkit_secbys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['brlkit_secgls']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['brailkit_hsecbys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['brlkit_hsegls']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Low vision kit</th>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['lvnkit_elebys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['lvnkit_elegls']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['lvnkit_secbys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['lvnkit_secgls']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['lvnkit_hsecbys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['lvnkit_hsegls']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Hearing Aid</th>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['hearaid_elebys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['hearaid_elegls']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['hearaid_secbys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['hearaid_secgls']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['hearaid_hsecbys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['hearaid_hsegls']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Braces</th>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['braces_elebys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['braces_elegls']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['braces_secbys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['braces_secgls']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['braces_hsecbys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['braces_hsegls']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Crutches</th>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['crthes_elebys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['crthes_elegls']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['crthes_secbys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['crthes_secgls']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['crthes_hsecbys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['crthes_hsegls']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Wheel chair</th>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['whlchr_elebys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['whlchr_elegls']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['whlchr_secbys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['whlchr_secgls']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['whlchr_hsegls']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['whlchr_hsegls']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Tri-cycle</th>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['tricyle_elebys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['tricyle_elegls']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['tricyle_secbys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['tricyle_secgls']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['tricyle_hsecbys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['tricyle_hsegls']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Caliper</th>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['caliper_elebys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['caliper_elegls']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['caliper_secbys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['caliper_secgls']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['caliper_hsecbys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['caliper_hsegls']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Escort</th>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['escort_elebys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['escort_elegls']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['escort_secbys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['escort_secgls']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['escort_hsecbys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['escort_hsegls']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:right;padding:2px 15px 2px 2px;border-bottom:#CCC thin solid;background-color:#CCC;color:#FFF;">Stipend</th>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['stipend_elebys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['stipend_elegls']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['stipend_secbys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['stipend_secgls']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['stipend_hsecbys']); ?></td>
                    <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['stipend_hsegls']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:center;background-color:#999;" colspan="7">School funds received excluding MDM for Elementary School/Sections(Govt and Aided Schools)</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="3">School Grant</th>
                    <th colspan="2">Receipt (in Rs.)</th>
                    <th colspan="2">Expenditure (in Rs.)</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="3">School Development Grant(under SSA)</th>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssadevep_recept']); ?></td>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssadevep_expdtre']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="3">School Maintanence Grant(under SSA)</th>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssamntn_recept']); ?></td>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssamntn_expdtre']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="3">TLM/TeachersGrant(under SSA)</th>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssatlm_recept']); ?></td>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssatlm_expdtre']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:center;background-color:#999;" colspan="7">Grants received by school & expenditure (Secondary & Higher Secondary Schools/Sections) (Govt and Aided Schools)</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="3">Details of School Level Grants</th>
                    <th colspan="2">Receipt (in Rs.)</th>
                    <th colspan="2">Expenditure (in Rs.)</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="3">Civil works</th>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssacivil_recept']); ?></td>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssacivil_expdtre']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="3">Annual School Grants(recurring)</th>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssaannual_recept']); ?></td>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssaannual_expdtre']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="3">Minor Repair/maintenance</th>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssamnr_recept']); ?></td>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssamnr_expdtre']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="3">Repair and replacement of laboratory equipments, purchase of laboratory consumable sand articles etc.</th>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssarpr_recept']); ?></td>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssarpr_expdtre']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="3">Pruchase of books, periodicals, newspaper, etc.</th>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssapur_recept']); ?></td>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssapur_expdtre']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="3">Grant for meeting water, telephone and electricity charges.</th>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssametwtr_recept']); ?></td>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssametwtr_expdtre']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="3">Others</th>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssaoth_recept']); ?></td>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssaoth_expdtre']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="3">Total (Grants at the school level)</th>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssatot_recept']); ?></td>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssatot_expdtre']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:center;background-color:#999;" colspan="7">Grants received by the school & expenditure (Govt. Schools)</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="3">Grants under Samagra Shiksha</th>
                    <th colspan="2">Receipt (in Rs.)</th>
                    <th colspan="2">Expenditure (in Rs.)</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="3">Composite School Grant</th>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssacmpste_recept']); ?></td>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssacmpste_expdtre']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="3">Library Grant</th>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssalibg_recept']); ?></td>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssalibg_expdtre']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="3">Grant for sports and physical education</th>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssaped_recept']); ?></td>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssamntn_recept']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="3">Grant for media and community mobilization</th>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssamedia_recept']); ?></td>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssamedia_expdtre']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="3">Grant for Training of SMC/SMDC</th>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssatrngsmcdc_recept']); ?></td>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssatrngsmcdc_expdtre']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="3">Grant for support at Preschool Level (Only for primary schools/sections)</th>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssapreschl_recept']); ?></td>
                    <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssapreschl_expdtre']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:center;background-color:#999;" colspan="7">Financial Assistance received by the school from NGO/PSU</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="4">Non - Govt. Organization (NGO)</th>
                    <td colspan="3"><?php echo($fees_udiseplus_fund[0]['ngo_name']); ?></td>
                </tr>
                 <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="4">Public Sector Undertaking (PSU) </th>
                    <td colspan="3"><?php echo($fees_udiseplus_fund[0]['psu_name']); ?></td>
                </tr>
            </table>
            <p style="page-break-before: always"></p>
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th style="text-align:center;background-color:#999;" colspan="7">Whether school is maintaining inventory register for the following</th>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="4">Computer</th>
                    <td colspan="3"><?php echo($fees_udiseplus_fund[0]['main_com']); ?></td>
                </tr>
                 <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="4">Sports Equipments</th>
                    <td colspan="3"><?php echo($fees_udiseplus_fund[0]['sprts_equip']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="4">Library Books</th>
                    <td colspan="3"><?php echo($fees_udiseplus_fund[0]['lib_boks']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="4">Number of teachers with Aadhar or whose unique ID is seeded in any electronic data base</th>
                    <td colspan="3"><?php echo($fees_udiseplus_fund[0]['noteacher_adhar']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="4">Whether the school has in place a system to capture student attendance electronically</th>
                    <td colspan="3"><?php echo($fees_udiseplus_fund[0]['stuatdnce_elet']); ?></td>
                </tr>
                 <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="4">Whether the school has in place a system to capture teacher attendance electronically</th>
                    <td colspan="3"><?php echo($fees_udiseplus_fund[0]['tchratdnce_elet']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="4">Has school evaluation been completed</th>
                    <td colspan="3"><?php echo($fees_udiseplus_fund[0]['schlevl_cmp']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="4">Has school made Improvement Plans on the basis of Evaluation?</th>
                    <td colspan="3"><?php echo($fees_udiseplus_fund[0]['schl_imp']); ?></td>
                </tr>
                <tr style="border-bottom:2px #F5F5F5 solid;">
                    <th colspan="4">Is the school registered under PFMS?</th>
                    <td colspan="3"><?php echo($fees_udiseplus_fund[0]['schlreg_pfms']); ?></td>
                </tr>
            </table>
        </div>
    </body>
</html>