<html>
    <head>
        <title>School Profile: <?php echo($profile[0]['school_name']); ?></title>
        <style type="text/css">
            @page{margin:15px;}
            td{padding-left:5px;border-bottom:thin solid black;}
            tbody th{text-align:right;padding:2px 15px 2px 2px;border-bottom:thin solid whitesmoke;background-color:#CCC;color:#FFF;}
            tbody div{border-bottom:thin solid black;}
            tbody div:last-child{border:none;}
            table{border-right:thin solid black;border-left:thin solid black;}
        </style>
    </head>
    <body>
        <div id="wrapper">
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <thead>
                    <tr style="background-color: #999;color: white;">
                        <th colspan="8" style="padding:5px;"><strong><?php echo($profile[0]['udise_code']); ?> - <?php echo($profile[0]['school_name']); ?> - Dated On:<?php echo(date('d/m/Y h:i:s',strtotime("now"))); ?></strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th colspan="4">UDISE CODE</th>
                        <td colspan="4" id="udise_code"><strong><?php echo($profile[0]['udise_code']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="4">School Name</th>
                        <td colspan="4" id="school_name"><strong><?php echo($profile[0]['school_name']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="4">District</th>
                        <td colspan="4" id="district_name"><strong><?php echo($profile[0]['district_name']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="4">Educational District </th>
                        <td colspan="4" id="edu_dist_name"><strong><?php echo($profile[0]['edu_dist_name']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="4">Block</th>
                        <td colspan="4" id="block_name"><strong><?php echo($profile[0]['block_name']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="4">Urban/Rural</th>
                        <td colspan="4" id="urbanrural"><strong><?php echo($profile[0]['urbanrural']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="4">Local Body</th>
                        <td colspan="4" id="zone_type"><strong><?php echo($profile[0]['zone_type']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="4">Village/Town/Municipality</th>
                        <td colspan="4" id="village_munci"><strong><?php echo($profile[0]['village_munci']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="4">Village/Ward </th>
                        <td colspan="4" id="village_ward"><strong><?php echo($profile[0]['village_ward']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="4">Assembly Constituency </th>
                        <td colspan="4" id="assembly_name"><strong><?php echo($profile[0]['assembly_name']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="4">Parliamentary Constituency</th>
                        <td colspan="4" id="parli_name"><strong><?php echo($profile[0]['parli_name']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="4">Address </th>
                        <td colspan="4"><strong><?php echo(str_replace('\n','<br>',$profile[0]['address']).' - '.$profile[0]['pincode']); ?></strong></td>
                    </tr>
                    <tr>
                        <th>Office LandLine </th>
                        <td colspan="4" id="office_landline"><strong><?php echo($profile[0]['office_landline']); ?></strong></td>
                        <th>Correspondent LandLine</th>
                        <td colspan="4" id="corr_landline"><strong><?php echo($profile[0]['corr_landline']); ?></strong></td>
                    </tr>
                    <tr>
                        <th>Office Mobile </th>
                        <td colspan="3" id="office_mobile"><strong><?php echo($profile[0]['office_mobile']); ?></strong></td>
                        <th>Correspondent Mobile</th>
                        <td colspan="3" id="corr_mobile"><strong><?php echo($profile[0]['corr_mobile']); ?></strong></td>
                    </tr>
                    <tr>
                        <th>E-Mail ID </th>
                        <td colspan="3" id="sch_email"><strong><?php echo($profile[0]['sch_email']); ?></strong></td>
                        <th>Website</th>
                        <td colspan="3" id="website"><strong><?php echo($profile[0]['website']); ?></strong></td>
                    </tr>
                    <tr>
                        <th>Latitude </th>
                        <td colspan="3" id="latitude"><strong><?php echo($profile[0]['latitude']); ?></strong></td>
                        <th>Longitude</th>
                        <td colspan="3" id="longitude"><strong><?php echo($profile[0]['longitude']); ?></strong></td>
                    </tr>
                    <tr>
                        <th>Management Category</th>
                        <td id="manage_name"><strong><?php echo($profile[0]['manage_name']); ?></strong></td>
                        <th>Management Type</th>
                        <td id="management"><strong><?php echo($profile[0]['management']); ?></strong></td>
                        <th>Management Directorate</th>
                        <td colspan="3" id="department"><strong><?php echo($profile[0]['department']); ?></strong></td>
                    </tr>
                    <tr>
                        <th >School Category</th>
                        <td id="scl_category"><strong><?php echo($profile[0]['scl_category']); ?></strong></td>
                        <th>Low Class</th>
                        <td id="low_class"><strong><?php echo($profile[0]['low_class']); ?></strong></td>
                        <th>High Class</th>
                        <td id="high_class"><strong><?php echo($profile[0]['high_class']); ?></strong></td>
                        <th>School Type</th>
                        <td id="school_type"><strong><?php echo($profile[0]['school_type']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="2">Minority Group</th>
                        <td colspan="2" id="minority_grp"><strong><?php echo($profile[0]['minority_grp']); ?></strong></td>
                        <th colspan="2">Minority Validity Year</th>
                        <td colspan="2" id="minority_yr"><?php echo($profile[0]['minority_yr']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="2">Medium Of Instruction</th>
                        <td colspan="2" id="mediumetr">
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
                        <th colspan="2">Language Taught</th>
                        <td colspan="2" id="langetr">
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
                    <tr>
                        <th>Prevocational Course</th>
                        <td colspan="7" id="trade">
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
                    <tr>
                        <th> All-Weather Roads ?</th>
                        <td colspan="7" id="weather_roads"><strong><?php echo($profile[0]['weather_roads']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="2"> Anganwadi Workers</th>
                        <td colspan="2" id="angan_wrks"><strong><?php echo($profile[0]['angan_wrks']); ?></strong></td>
                        <th colspan="2"> Anganwadi Children</th>
                        <td colspan="2" id="angan_childs"><strong><?php echo($profile[0]['angan_childs']); ?></strong></td>
                    </tr>
                    <tr>
                        <th>Year of establishment of School</th>
                        <td id="yr_estd_schl"><strong><?php echo($profile[0]['yr_estd_schl']); ?></strong></td>
                        <th>Year of first recognition of School</th>
                        <td id="yr_recgn_first"><strong><?php echo($profile[0]['yr_recgn_first']); ?></strong></td>
                        <th colspan="2">Last Renewal Year &amp; Certificate Number</th>
                        <td colspan="2">
                            <div id="yr_last_renwl"><strong><?php echo($profile[0]['yr_last_renwl']); ?></strong></div>
                            <div id="certifi_no"><strong><?php echo($profile[0]['certifi_no']); ?></strong></div>
                        </td>
                    </tr>
                    <tr>
                        <th>Year of Upgradation / Recognition</th>
                        <th>Middle School</th>
                        <td id="yr_rec_schl_elem"><strong><?php echo($profile[0]['yr_rec_schl_elem']); ?></strong></td>
                        <th>High School</th>
                        <td id="yr_rec_schl_sec"><strong><?php echo($profile[0]['yr_rec_schl_sec']); ?></strong></td>
                        <th>Higher Secondary</th>
                        <td id="yr_rec_schl_hsc" colspan="2"><strong><?php echo($profile[0]['yr_rec_schl_hsc']); ?></strong></td>
                    </tr>
                    <tr>
                        <th>CWSN School</th>
                        <td id="cwsn_scl" colspan="7"><strong><?php echo($profile[0]['cwsn_scl']); ?></strong></td>
                    </tr>
                    <tr>
                        <th>Shift School</th>
                        <td id="shftd_schl" colspan="7"><strong><?php echo($profile[0]['shftd_schl']); ?></strong></td>
                    </tr>
                    <tr>
                        <th>Type of Residential</th>
                        <td id="typ_resid_schl" colspan="7"><strong><?php echo($profile[0]['typ_resid_schl']); ?></strong></td>
                    </tr>
                    <tr>
                        <th>School situated in</th>
                        <td id="hill_frst" colspan="7"><strong><?php echo($profile[0]['hill_frst']); ?></strong></td>
                    </tr>
                    <tr>
                        <th>Whether School has special educator ?</th>
                        <td id="spl_edtor" colspan="7"><strong><?php echo($profile[0]['spl_edtor']); ?></strong></td>
                    </tr>
                    <tr>
                        <th>Academic Session Start</th>
                        <td id="acad_mnth_start" colspan="7"><strong><?php echo($profile[0]['acad_mnth_start']); ?></strong></td>
                    </tr>
                </tbody>
                <tbody>
                    <?php
                       $result = array();$key='daywork_school_type';
                       foreach($daywork_club_trade as $val) {
                            if(array_key_exists($key, $val)){
                                $result[$val[$key]][] = $val;
                            }else{
                                $result[""][] = $val;
                            }
                       }
                    ?>
                    <tr>
                        <th colspan="8" style="text-align:center;background-color:#999;" >SCHOOL DAYS AND HOURS DETAILS</th>
                    </tr>
                    <tr>
                        <th colspan="2" style="text-align:center;">Category</th>
                        <th style="text-align:center;">Instructional days</th>
                        <th style="text-align:center;">Children Working Hours</th>
                        <th style="text-align:center;">Teachers Working Hours</th>
                        <th style="text-align:center;">(CCE) implemented</th>
                        <th style="text-align:center;">Cumulative Records maintained</th>
                        <th style="text-align:center;">Cumulative Records<br /> Shared</th>
                    </tr>
                </tbody>
                <tbody>
                    <?php foreach($result as $r){ ?>
                    <tr>
                        <td colspan="2" style="text-align:center;"><strong><?php echo($r[0]['daywork_school_type']); ?></td>
                        <td style="text-align:center;"><strong><?php echo($r[0]['instr_dys']); ?></td>
                        <td style="text-align:center;"><strong><?php echo($r[0]['stud_hrs']); ?></td>
                        <td style="text-align:center;"><strong><?php echo($r[0]['teach_hrs']); ?></td>
                        <td style="text-align:center;"><strong><?php echo($r[0]['cce_impl']); ?></td>
                        <td style="text-align:center;"><strong><?php echo($r[0]['cce_cum']); ?></td>
                        <td style="text-align:center;"><strong><?php echo($r[0]['cce_shared']); ?></td>
                    </tr>
                    <?php }?>
                    <tr>
                        <th colspan="8" style="text-align:center;background-color:#999;" >SPECIAL TRAINING</th>
                    </tr>
                    <tr>
                        <th style="text-align:center;">Boys</th>
                        <th style="text-align:center;">Girls</th>
                        <th style="text-align:center;">Training Conducted By</th>
                        <th style="text-align:center;">Training Conducted In</th>
                        <th style="text-align:center;">Type of Training</th>
                        <th colspan="3" style="text-align:center;">Psychological counselling</th>
                    </tr>
                    <tr>
                        <td style="text-align:center;" id="train_prov_boys"><strong><?php echo($profile[0]['train_prov_boys']); ?></td>
                        <td style="text-align:center;" id="train_prov_grls"><strong><?php echo($profile[0]['train_prov_grls']); ?></td>
                        <td style="text-align:center;" id="train_cond_by"><strong><?php echo($profile[0]['train_cond_by']); ?></td>
                        <td style="text-align:center;" id="train_cond_in"><strong><?php echo($profile[0]['train_cond_in']); ?></td>
                        <td style="text-align:center;" id="train_type"><strong><?php echo($profile[0]['train_type']); ?></td>
                        <td colspan="3" style="text-align:center;" id="stu_councel"><strong><?php echo($profile[0]['stu_councel']); ?></td>
                    </tr>
                    <tr>
                        <th>Clubs</th>
                        <td colspan="7" id="clubs">
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
                    <tr>
                        <th colspan="4">Whether the School has received graded supplementary material in previous academic year?</th>
                        <td colspan="4"><?php echo($profile[0]['suppliment_prevousyr']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="3" style="text-align:center;background-color:#999;">Availability of free Textbooks, Teaching Learning Equipment (TLE) and Play material (in Current Academic Year)</th>
                        <th style="text-align:center;background-color:#999;">Pre-Primary</th>
                        <th style="text-align:center;background-color:#999;">Primary</th>
                        <th style="text-align:center;background-color:#999;">Upper Primary</th>
                        <th style="text-align:center;background-color:#999;">Secondary</th>
                        <th style="text-align:center;background-color:#999;">Higher Secondary</th>
                    </tr>
                    <tr>
                        <th colspan="3">Whether complete set of free Textbooks received for the current year?</th>
                        <td id="txtbk_curyr_prepri"><?php echo($profile[0]['txtbk_curyr_prepri']); ?></td>
                        <td id="txtbk_curyr_pri"><?php echo($profile[0]['txtbk_curyr_pri']); ?></td>
                        <td id="txtbk_curyr_upp"><?php echo($profile[0]['txtbk_curyr_upp']); ?></td>
                        <td id="txtbk_curyr_sec"><?php echo($profile[0]['txtbk_curyr_sec']); ?></td>
                        <td id="txtbk_curyr_hsec"><?php echo($profile[0]['txtbk_curyr_hsec']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="3">Whether TLE available for each Grade?</th>
                        <td id="tle_grade_preprim"><?php echo($profile[0]['tle_grade_preprim']); ?></td>
                        <td id="tle_grade_prim"><?php echo($profile[0]['tle_grade_prim']); ?></td>
                        <td id="tle_grde_upp"><?php echo($profile[0]['tle_grde_upp']); ?></td>
                        <td id="tle_grde_sec"><?php echo($profile[0]['tle_grde_sec']); ?></td>
                        <td id="tle_grde_hsec"><?php echo($profile[0]['tle_grde_hsec']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="3">Whether Play materials, Games and Sports equipment are available for each Grade?</th>
                        <td id="sports_prepri"><?php echo($profile[0]['sports_prepri']); ?></td>
                        <td id="sports_pri"><?php echo($profile[0]['sports_pri']); ?></td>
                        <td id="sports_upp"><?php echo($profile[0]['sports_upp']); ?></td>
                        <td id="sports_sec"><?php echo($profile[0]['sports_sec']); ?></td>
                        <td id="sports_hsec"><?php echo($profile[0]['sports_hsec']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="8" style="text-align:center;background-color:#999;">SCHOOL INSPECTION DETAILS</th>
                    </tr>
                    <tr>
                        <th colspan="3" style="text-align: center;">School Inspection done by</th>
                        <th colspan="2" style="text-align: center;">Purpose </th>
                        <th colspan="3" style="text-align: center;">Date of Inspection</th>
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
                    <tr>
                        <td colspan="3" style="text-align: center;"><?php echo($r[0]['officer_type']); ?></td>
                        <td colspan="2" style="text-align: center;"><?php echo($r[0]['purpose']); ?></td>
                        <td colspan="3" style="text-align: center;"><?php echo($r[0]['date_inspect']); ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="8" style="text-align:center;background-color:#999;">SCHOOL SAFETY DETAILS</th>
                    </tr>
                    <tr>
                        <th colspan="5">Whether the School Disaster Management Plan (SDMP) has been developed ?</th>
                        <td colspan="3"><strong><?php echo($profile[0]['sdmp_dev']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="5">Whether Structural Safety Audit has been conducted ?</th>
                        <td colspan="3"><strong><?php echo($profile[0]['sturct_saf']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="5">Whether Non- structural Safety Audit has been conducted ?</th>
                        <td colspan="3"><strong><?php echo($profile[0]['nonsturct_saf']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="5">Whether CCTV Cameras available in school ?</th>
                        <td colspan="3"><strong><?php echo($profile[0]['cctv_school']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="5">Whether Fire Extinguishers are installed ?</th>
                        <td colspan="3"><strong><?php echo($profile[0]['firext_schl']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="5">Does the school have a nodal teacher for school safety?</th>
                        <td colspan="3"><strong><?php echo($profile[0]['nodtchr_schlsaf']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="5">Whether students and teachers undergo regular training in school safety and disaster preparedness ?</th>
                        <td colspan="3"><strong><?php echo($profile[0]['dister_trng']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="5">Whether disaster management is being taught as part of the curriculum ?</th>
                        <td colspan="3"><strong><?php echo($profile[0]['dister_part']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="5">Whether school has received grant for Self Defense Training for Girls ?</th>
                        <td colspan="3"><strong><?php echo($profile[0]['slfdfse_trng']); ?></strong></td>
                    </tr>
                </tbody>
            </table>
            
            
            <p style="page-break-before: always"></p>
            
            
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tr>
                    <th colspan="4" style="text-align:center;background-color:#999;"><strong><?php echo($profile[0]['udise_code']); ?> - <?php echo($profile[0]['school_name']); ?> - Dated On:<?php echo(date('d/m/Y h:i:s',strtotime("now"))); ?></strong>
                        <br>SCHOOL MANAGEMENT COMMITTEE (SMC) DETAILS
                    </th>
                </tr>
                <tbody>
                    <?php if($profile[0]['smc_const']=='YES'){ ?>
                    <tr>
                        <th></th>
                        <th style="text-align:center;">Male</th>
                        <th style="text-align:center;" colspan="2">Female</th>
                    </tr>
                    <tr>
                        <th>Total number of members in SMC</th>
                        <td id="smc_tot_mle"><?php echo($profile[0]['smc_tot_mle']); ?></td>
                        <td id="smc_tot_fmle" colspan="2"><?php echo($profile[0]['smc_tot_fmle']) ?></td>
                    </tr>
                    <tr>
                        <th>Members of parents/guardians</th>
                        <td id="smc_prnts_mle"><?php echo($profile[0]['smc_prnts_mle']); ?></td>
                        <td id="smc_prnts_fmle" colspan="2"><?php echo($profile[0]['smc_prnts_fmle']) ?></td>
                    </tr>
                    <tr>
                        <th>Representatives/nominees from local authority/local Government/urban local body</th>
                        <td id="smc_rep_mle"><?php echo($profile[0]['smc_rep_mle']); ?></td>
                        <td id="smc_rep_fmle" colspan="2"><?php echo($profile[0]['smc_rep_fmle']) ?></td>
                    </tr>
                    <tr>
                        <th>Members from weaker section and disadvantage group?</th>
                        <td id="smc_weakr_mle"><?php echo($profile[0]['smc_weakr_mle']); ?></td>
                        <td id="smc_weakr_fmle" colspan="2"><?php echo($profile[0]['smc_weakr_fmle']) ?></td>
                    </tr>
                    <tr>
                        <th>Number of SMC meetings held during the Previous academic year</th>
                        <td style="text-align:center;"></td>
                        <td id="smc_no_prev_acyr" colspan="2"><?php echo($profile[0]['smc_no_prev_acyr']) ?></td>
                    </tr>
                    <tr>
                        <th>When was SMC constituted?</th>
                        <td style="text-align:center;"></td>
                        <td id="smc_const_yr" colspan="2"><?php echo($profile[0]['smc_const_yr']) ?></td>
                    </tr>
                    <tr>
                        <th>Total number of members in SMC</th>
                        <td id="smc_tot_mle"><?php echo($profile[0]['smc_tot_mle']); ?></td>
                        <td id="smc_tot_fmle" colspan="2"><?php echo($profile[0]['smc_tot_fmle']); ?></td>
                    </tr>
                    <tr>
                        <th>Whether SMC has prepared the School Development Plan?</th>
                        <td style="text-align:center;"></td>
                        <td id="smc_sdp" colspan="2"><?php echo($profile[0]['smc_sdp']); ?></td>
                    </tr>
                    <tr>
                        <th>Whether Separate Bank Account for SMC is being maintained?</th>
                        <td style="text-align:center;">
                            <div>ACCOUNT NAME:<strong id="smc_acc_name"><?php echo($profile[0]['smc_acc_name']); ?></strong></div>
                            <div>ACCOUNT NUMBER:<strong id="smc_acc_no"><?php echo($profile[0]['smc_acc_no']); ?></strong></div> 
                        </td>
                        <td colspan="2">BRANCH &amp; IFSC CODE : <strong id="smc_bank"><?php echo($profile[0]['smc_bank']); ?></strong></td>
                    </tr>
                    <tr>
                        <th>SMC Chairperson Name</th>
                        <td style="text-align:center;"><strong id="smc_chair_name"><?php echo($profile[0]['smc_chair_name']); ?></strong></td>
                        <th>SMC Chairperson Mobile Number</th>
                        <td style="text-align:center;"><strong id="smc_chair_mble"><?php echo($profile[0]['smc_chair_mble']); ?></strong></td>
                    </tr>
                    <?php }else{ ?>
                    <tr>
                        <th>Whether School Management Committee (SMC) is constituted?</th>
                        <td colspan="3"><?php echo($profile[0]['smc_const']); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            
            
            <p style="page-break-before: always"></p>
            
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <th colspan="4" style="text-align:center;background-color:#999;">
                            <strong><?php echo($profile[0]['udise_code']); ?> - <?php echo($profile[0]['school_name']); ?> - Dated On:<?php echo(date('d/m/Y h:i:s',strtotime("now"))); ?></strong><br>
                            SCHOOL MANAGEMENT AND DEVELOPMENT COMMITTEE (SMDC) DETAILS
                        </th>
                    </tr>
                    <?php if($profile[0]['smdc_constitu']=='YES'){ ?>
                    <tr>
                        <th colspan="2"></th>
                        <th style="text-align:center;">Male</th>
                        <th style="text-align:center;">Female</th>
                    </tr>
                    <tr>
                        <th colspan="2">Total Members</th>
                        <td style="text-align:center;"><strong id="smdc_tot_mle"><?php echo($profile[0]['smdc_tot_mle']); ?></strong></td>
                        <td style="text-align:center;"><strong><?php echo($profile[0]['smdc_tot_fmle']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="2">Representatives from Parents / Guardians / PTA</th>
                        <td style="text-align:center;"><strong><?php echo($profile[0]['smdc_parnt_mle']); ?></strong></td>
                        <td style="text-align:center;"><strong id="smdc_parnt_fmle"><?php echo($profile[0]['smdc_parnt_fmle']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="2">Representatives / Nominees from Local Government / Urban Local Body</th>
                        <td style="text-align:center;"><strong id="smdc_lb_mle"><?php echo($profile[0]['smdc_lb_mle']); ?></strong></td>
                        <td style="text-align:center;"><strong id="smdc_lb_fmle"><?php echo($profile[0]['smdc_lb_fmle']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="2">Members from Educationally Backward Minority Community</th>
                        <td style="text-align:center;"><strong id="smdc_minori_mle"><?php echo($profile[0]['smdc_minori_mle']); ?></strong></td>
                        <td style="text-align:center;"><strong id="smdc_minori_fmle"><?php echo($profile[0]['smdc_minori_fmle']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="2">Members from any Women's Group</th>
                        <td style="text-align:center;"></strong></td>
                        <td style="text-align:center;"><strong id="smdc_women"><?php echo($profile[0]['smdc_women']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="2">Members from SC / ST Community</th>
                        <td style="text-align:center;"><strong id="smdc_scst_mle"><?php echo($profile[0]['smdc_scst_mle']); ?></strong></td>
                        <td style="text-align:center;" id="smdc_scst_fmle"><strong><?php echo($profile[0]['smdc_scst_fmle']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="2">Nominees from the District Educational Office (DEO)</th>
                        <td style="text-align:center;"><strong id="smdc_deo_mle"><?php echo($profile[0]['smdc_deo_mle']); ?></strong></td>
                        <td style="text-align:center;"><strong id="smdc_deo_fmle"><?php echo($profile[0]['smdc_deo_fmle']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="2">Members from Audit and Accounts Department (AAD)</th>
                        <td style="text-align:center;"><strong id="smdc_audit_mle"><?php echo($profile[0]['smdc_audit_mle']); ?></strong></td>
                        <td style="text-align:center;"><strong id="smdc_audit_fmle"><?php echo($profile[0]['smdc_audit_fmle']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="2">Subject experts (each one from Science, Humanities and Arts / Crafts / Culture) nominated by District Programme Co-ordinator (RMSA)</th>
                        <td style="text-align:center;"><strong id="smdc_exprt_mle"><?php echo($profile[0]['smdc_exprt_mle']); ?></strong></td>
                        <td style="text-align:center;"><strong id="smdc_exprt_fmle"><?php echo($profile[0]['smdc_exprt_fmle']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="2">Teachers (one each from Social Science, Science and Mathematics) of the School</th>
                        <td style="text-align:center;"><strong id="smdc_techrs_mle"><?php echo($profile[0]['smdc_techrs_mle']); ?></strong></td>
                        <td style="text-align:center;"><strong id="smdc_techrs_fmle"><?php echo($profile[0]['smdc_techrs_fmle']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="2">Vice-Principal / Asst. Headmaster, as a member</th>
                        <td style="text-align:center;"><strong id="smdc_hm_mle"><?php echo($profile[0]['smdc_hm_mle']); ?></strong></td>
                        <td style="text-align:center;"><strong id="smdc_hm_fmle"><?php echo($profile[0]['smdc_hm_fmle']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="2">Principal / Headmaster, as Chairperson</th>
                        <td style="text-align:center;"><strong id="smdc_prnci_mle"><?php echo($profile[0]['smdc_prnci_mle']); ?></strong></td>
                        <td style="text-align:center;"><strong id="smdc_prnci_fmle"><?php echo($profile[0]['smdc_prnci_fmle']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="2">Chairperson (If Principal / Headmaster is not the Chairperson)</th>
                        <td style="text-align:center;"><strong id="smdc_chair_mle"><?php echo($profile[0]['smdc_chair_mle']); ?></strong></td>
                        <td style="text-align:center;"><strong id="smdc_chair_fmle"><?php echo($profile[0]['smdc_chair_fmle']); ?></strong></td>
                    </tr>
                    
                    <tr>
                        <th colspan="2">Year in which the SMDC was constituted?</th>
                        <td style="text-align:center;"></td>
                        <td style="text-align:center;"><strong id="smdc_const_yr"><?php echo($profile[0]['smdc_const_yr']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="2">Number of SMDC meetings held during the last academic year</th>
                        <td style="text-align:center;"></td>
                        <td style="text-align:center;"><strong id="smdc_no_last_acyr"><?php echo($profile[0]['smdc_no_last_acyr']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="2">Whether SMDC has prepared School Improvement Plan?</th>
                        <td style="text-align:center;"></td>
                        <td style="text-align:center;"><strong id="smdc_sip"><?php echo($profile[0]['smdc_sip']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="2">Whether separate Bank Account for SMDC is being maintained?</th>
                        <td style="text-align:center;">
                            <div>ACCOUNT NAME:<strong id="smdc_acc_name"><?php echo($profile[0]['smdc_acc_name']); ?></strong></div>
                            <div>ACCOUNT NUMBER:<strong id="smdc_acc_no"><?php echo($profile[0]['smdc_acc_no']); ?></strong></div> 
                        </td>
                        <td style="text-align:center;">BRANCH &amp; IFSC CODE : <strong id="smdc_bank"><?php echo($profile[0]['smdc_bank']); ?></strong></td>
                    </tr>
                    <tr>
                        <th>SMDC Chairperson Name</th>
                        <td style="text-align:center;"><strong id="smc_chair_name"><?php echo($profile[0]['smdc_chair_name']); ?></strong></td>
                        <th>SMC Chairperson Mobile Number</th>
                        <td style="text-align:center;"><strong id="smc_chair_mble"><?php echo($profile[0]['smdc_chair_mble']); ?></strong></td>
                    </tr>
                    <tr>
                        <th>SMDC Contribution (in Rs.)</th>
                        <td colspan="3"><strong id="smdc_contrib_amt"><?php echo($profile[0]['smdc_contrib_amt']); ?></strong></td>
                    </tr>
                    <?php } else { ?>
                    <tr>
                        <th>Whether School Management and Development Committee has been constituted?</th>
                        <th colspan="3"><?php echo($profile[0]['smdc_constitu']); ?></th>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th>Whether the School Building Committee (SBC) has been constituted?</th>
                        <td colspan="3"><strong id="sbc_const"><?php echo($profile[0]['sbc_const']); ?></strong></td>
                    </tr>
                    <tr>
                        <th>Whether the School has constituted its Academic Committee (AC)</th>
                        <td colspan="3"><strong id="acadecomm_const"><?php echo($profile[0]['acadecomm_const']); ?></strong></td>
                    </tr>
                    <?php if($profile[0]['pta_const']=='YES'){ ?>
                    <tr>
                        <th>PTA Established Year</th>
                        <td style="text-align:center;"><strong id="pta_est_yr"><?php echo($profile[0]['pta_est_yr']); ?></strong></td>
                        <th>Number of PTA meetings held during the last academic year</th>
                        <td style="text-align:center;"><strong id="pta_no_curyr"><?php echo($profile[0]['pta_no_curyr']); ?></strong></td>
                    </tr>
                    <tr>
                        <th>PTA Registration No.</th>
                        <td style="text-align:center;"><strong id="pta_reg_no"><?php echo($profile[0]['pta_reg_no']); ?></strong></td>
                        <th>Academic Year for Last PTA Subscription Paid</th>
                        <td style="text-align:center;"><strong id="pta_subscri_amt"><?php echo($profile[0]['pta_subscri_amt']); ?></strong></td>
                    </tr>
                    <tr>
                        <th>PTA Chairperson Name</th>
                        <td style="text-align:center;"><strong id="pta_chair_name"><?php echo($profile[0]['pta_chair_name']); ?></strong></td>
                        <th>PTA Chairperson Mobile Number</th>
                        <td style="text-align:center;"><strong id="pta_chair_mble"><?php echo($profile[0]['pta_chair_mble']); ?></strong></td>
                    </tr>
                    <?php } else{ ?>
                    <tr>
                        <th>Whether the School has constituted its Parent-Teacher Association (PTA)?</th>
                        <td colspan="3" style="text-align:center;"><strong id="pta_reg_no"><?php echo($profile[0]['pta_const']); ?></strong></td>
                    </tr>    
                    <?php } ?>
                </tbody>
            </table>
            
            <p style="page-break-before: always"></p>
            
            
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <thead>
                    <tr>
                        <th colspan="6" style="text-align:center;background-color:#999;">
                            <strong><?php echo($profile[0]['udise_code']); ?> - <?php echo($profile[0]['school_name']); ?> - Dated On:<?php echo(date('d/m/Y h:i:s',strtotime("now"))); ?></strong><br>
                            SCHOOL INFRASTRUCTURE DETAILS
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th colspan="2">Total land availability (Including Building area and Playground) in Acre </th>
                        <td style="text-align:center;"><strong id="land_avail_sqft"><?php echo($profile[0]['land_avail_sqft']); ?></strong></td>
                        <th colspan="2">Area of the Playground (in Acre) /<br /> Alternative Arrangements for Children to Play (Address &amp; Distance)   </th>
                        <td style="text-align:center;"><strong id="play_area_sqft"><?php echo($profile[0]['play_area_sqft']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="3">Whether land is available for expansion of School facilities? area of land available in Acre </th>
                        <td colspan="3"><strong id="play_land_area"><?php echo($profile[0]['play_land_area']); ?></strong></td>
                    </tr>
                    <tr>
                        <th>Land Ownership</th>
                        <td style="text-align:center;"><strong id="land_ownersip"><?php echo($profile[0]['land_ownersip']); ?></strong></td>
                        <th>If Rented,Amount of Rent per year (in Rs.)</th>
                        <td style="text-align:center;"><strong id="land_rent_amt"><?php echo($profile[0]['land_rent_amt']); ?></strong></td>
                        <th>If Leased,Period of Lease (in years) / Lease Ending Date</th>
                        <td style="text-align:center;"><strong id="land_lease_perid"><?php echo($profile[0]['land_lease_perid'].' Years / '.$profile[0]['valid_upto']); ?></strong></td>
                    </tr>
                    <tr>
                        <th>Type of Boundary Wall</th>
                        <td style="text-align:center;"><strong id="cmpwall_type"><?php echo($profile[0]['cmpwall_type']); ?></strong></td>
                        <th>Perimeter of boundary (in meters)  </th>
                        <td style="text-align:center;"><strong id="cmpwall_perimtr"><?php echo($profile[0]['cmpwall_perimtr']); ?></strong></td>
                        <th>Length of the boundary wall constructed (in meters)</th>
                        <td style="text-align:center;"><strong id="cmpwall_length"><?php echo($profile[0]['cmpwall_length']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="3">Total no of Buildings / Blocks </th>
                        <td colspan="3"><strong id="build_block_no"><?php echo($profile[0]['build_block_no']); ?></strong></td>
                    </tr>
                </tbody>
            </table>
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <thead>
                    <tr>
                        <th colspan="17" style="text-align:center; background-color: #999;">Building / Block Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Block No.:</th>
                        <th>Construction Type</th>
                        <th>Floors (Inc. Ground Floor)</th>
                        <th colspan="2" style="text-align:center;">Class</th>	
                        <th>Office</th>
                        <th>Lab</th>
                        <th>Library</th>
                        <th>Computer</th>
                        <th>Arts/Craft</th>
                        <th>Staff</th>
                        <th>HM/AHM/Vice Principal</th>
                        <th>Girls</th>
                        <th>Good condition</th>
                        <th>Minor Repair</th>
                        <th>Major Repair</th>
                        <th>Total</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>In Use</th>	
                        <th>Not In Use</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
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
                        foreach($result as $k => $r){
                            //print_r($r);echo('<br><br><br>');
                    ?>
                    <tr>
                        <td style="text-align:center;"><?php echo($blockno++); ?></td>                      <!---Block Number -->
                        <td style="text-align:center;"><?php echo($r[0]['construct_type']); ?></td>         <!---Construction Type--->
                        <td style="text-align:center;"><?php echo($r[0]['total_flrs']); ?></td>             <!---Floors--->
                        <td style="text-align:center;"><?php echo($r[0]['tot_classrm_use']); ?></td>        <!---Class In Use--->
                        <td style="text-align:center;"><?php echo($r[0]['tot_classrm_nouse']); ?></td>	    <!---Class Not In Use--->
                        <td style="text-align:center;"><?php echo($r[0]['off_room']); ?></td>               <!---Office--->
                        <td style="text-align:center;"><?php echo($r[0]['lab_room']); ?></td>               <!---Lab--->
                        <td style="text-align:center;"><?php echo($r[0]['library_room']); ?></td>           <!---Library--->
                        <td style="text-align:center;"><?php echo($r[0]['comp_room']); ?></td>              <!---Computer--->
                        <td style="text-align:center;"><?php echo($r[0]['art_room']); ?></td>               <!---Arts/Craft--->
                        <td style="text-align:center;"><?php echo($r[0]['staff_room']); ?></td>             <!---Staff--->
                        <td style="text-align:center;"><?php echo($r[0]['hm_room']); ?></td>                <!---HM/AHM/Vice Principal--->
                        <td style="text-align:center;"><?php echo($r[0]['girl_room']); ?></td>              <!---Girls--->
                        <td style="text-align:center;"><?php echo($r[0]['good_condition']); ?></td>         <!---Good--->
                        <td style="text-align:center;"><?php echo($r[0]['need_minorrep']); ?></td>          <!---Minor--->
                        <td style="text-align:center;"><?php echo($r[0]['need_majorrep']); ?></td>          <!---Major--->         
                        <td style="text-align:center;"><?php echo($r[0]['total_room']); ?></td>             <!---Total--->
                    </tr>
                    <?php }?>
                </tbody>
            </table>
            
            <p style="page-break-before: always"></p>
            
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <th colspan="3" style="text-align: center; background-color: #999;">
                            <strong><?php echo($profile[0]['udise_code']); ?> - <?php echo($profile[0]['school_name']); ?> - Dated On:<?php echo(date('d/m/Y h:i:s',strtotime("now"))); ?></strong><br>
                            CLASS ROOM DETAILS
                        </th>
                    </tr>
                    <tr>
                        <th>Classrooms under construction </th>
                        <td colspan="2"><strong id="classrm_undr_constr"><?php echo($profile[0]['classrm_undr_constr']); ?></strong></td>
                    </tr>
                    <tr>
                        <th>Do all the classrooms have desk / table for students?</th>
                        <td colspan="2"><strong id="classrm_desk_studs"><?php echo($profile[0]['classrm_desk_studs']); ?></strong></td>
                    </tr>
                    <tr>
                        <th>Whether there is a ramp for differently abled children to access classrooms?</th>
                        <td colspan="2"><strong id="ramp_disable_child"><?php echo($profile[0]['ramp_disable_child']); ?></strong></td>
                    </tr>
                    <tr>
                        <th>Whether hand-rails for ramp available?</th>
                        <td colspan="2"><strong id="ramp_handrail"><?php echo($profile[0]['ramp_handrail']); ?></strong></td>
                    </tr>
                    <tr>
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
                    <tr>
                        <td style="text-align:center;"><?php echo($r[0]['category_name']); ?></td>
                        <td colspan="2" style="text-align:center;"><?php echo($r[0]['num_rooms']); ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="3" style="text-align:center;background-color:#999;">OTHER ROOM DETAILS</th>
                    </tr>
                    <tr>
                        <th>Staff quarters (including Residential Quarters for Head Master/Principal and Others) </th>
                        <td colspan="2"><strong id="rooms_staffquartrs"><?php echo($profile[0]['rooms_staffquartrs']); ?></strong></td>
                    </tr>
                    <tr>
                        <th>Does the school have a full-time librarian? </th>
                        <td colspan="2"><strong id="fulltime_lib"><?php echo($profile[0]['fulltime_lib']); ?></strong></td>
                    </tr>
                    <tr>
                        <th>Does the school subscribe to newspapers/magazines? </th>
                        <td colspan="2"><strong id="news_subscribe"><?php echo($profile[0]['news_subscribe']); ?></strong></td>
                    </tr>
                    <tr>
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
                    <tr>
                        <td style="text-align:center;"><?php echo($r[0]['library_type']); ?></td>
                        <td colspan="2" style="text-align:center;"><?php echo($r[0]['num_books']); ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="3" style="text-align:center;background-color:#999;">SCHOOL TOILETS FOR STAFF DETAILS</th>
                    </tr>
                    <tr>
                        <th>Details of Toilets and Urinals for Staff</th>
                        <th style="text-align:center;">Gents</th>
                        <th style="text-align:center;">Ladies</th>
                    </tr>
                    <tr>
                        <th>Total number of Toilets available </th>
                        <td style="text-align:center;" id="toil_gents_tot"><?php echo($profile[0]['toil_gents_tot']); ?></td>
                        <td style="text-align:center;" id="toil_ladies_tot"><?php echo($profile[0]['toil_ladies_tot']); ?></td>
                    </tr>
                    <tr>
                        <th>Total number of Urinals available</th>
                        <td style="text-align:center;" id="urinal_gents_tot"><?php echo($profile[0]['urinal_gents_tot']); ?></td>
                        <td style="text-align:center;" id="urinals_tot_ladies"><?php echo($profile[0]['urinals_tot_ladies']); ?></td>
                    </tr>
                </tbody>
            </table>
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <th colspan="7" style="text-align:center;background-color:#999;">SCHOOL TOILETS FOR STUDENTS DETAILS</th>
                    </tr>
                    <tr>
                        <th style="text-align:center;">Details of Toilets and Urinals for Students</th>
                        <th colspan="3" style="text-align:center;">Boys</th>
                        <th colspan="3" style="text-align:center;">Girls</th>
                    </tr>
                    <tr>
                        <th>&nbsp;</th>
                        <th style="text-align:center;">In Use</th>
                        <th style="text-align:center;">Not In Use</th>
                        <th style="text-align:center;">Reason</th>
                        <th style="text-align:center;">In Use</th>
                        <th style="text-align:center;">Not In Use</th>
                        <th style="text-align:center;">Reason</th>
                    </tr>
                    <tr>
                        <th>Total number of Toilets available</th>
                        <td style="text-align:center;"><strong id="toil_bys_inuse"><?php echo($profile[0]['toil_bys_inuse']); ?></strong></td>
                        <td style="text-align:center;"><strong id="toil_notuse_bys"><?php echo($profile[0]['toil_notuse_bys']); ?></strong></td>
                        <td style="text-align:center;"><strong id="toil_nonfunc_bys"><?php echo($profile[0]['toil_nonfunc_bys']); ?></strong></td>
                        <td style="text-align:center;"><strong id="toil_inuse_grls"><?php echo($profile[0]['toil_inuse_grls']); ?></strong></td>
                        <td style="text-align:center;"><strong id="toil_notuse_grls"><?php echo($profile[0]['toil_notuse_grls']); ?></strong></td>
                        <td style="text-align:center;"><strong id="toil_reasn_grls"><?php echo($profile[0]['toil_reasn_grls']); ?></strong></td>
                    </tr>
                    <tr>
                        <th>CWSN friendly functional toilets</th>
                        <td style="text-align:center;"><?php echo($profile[0]['cwsntoil_inuse_bys']); ?></td>
                        <td style="text-align:center;"><?php echo($profile[0]['cwsntoil_notuse_bys']); ?></td>
                        <td style="text-align:center;"><?php echo($profile[0]['cwsntoil_reasn_bys']); ?></td>
                        <td style="text-align:center;"><?php echo($profile[0]['cwsntoil_inuse_grls']); ?></td>
                        <td style="text-align:center;"><?php echo($profile[0]['cwsntoil_notuse_grls']); ?></td>
                        <td style="text-align:center;"><?php echo($profile[0]['cwsntoil_reasn_grls']); ?></td>
                    </tr>
                    <tr>
                        <th>Total number of Urinals available</th>
                        <td style="text-align:center;"><?php echo($profile[0]['urinls_inuse_bys']); ?></td>
                        <td style="text-align:center;"><?php echo($profile[0]['urinls_notuse_bys']); ?></td>
                        <td style="text-align:center;"><?php echo($profile[0]['urinls_reasn_bys']); ?></td>
                        <td style="text-align:center;"><?php echo($profile[0]['urinls_inuse_grls']); ?></td>
                        <td style="text-align:center;"><?php echo($profile[0]['urinls_notuse_grls']); ?></td>
                        <td style="text-align:center;"><?php echo($profile[0]['urinls_reasn_grls']); ?></td>
                    </tr>
                </tbody>
            </table>
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <th colspan="3">&nbsp;</th>
                        <th style="text-align:center;">BOYS</th>
                        <th style="text-align:center;">GIRLS</th>
                    </tr>
                    <tr>
                        <th colspan="3">Toilets have running water facility for flushing and cleaning?</th>
                        <td style="text-align:center;"><?php echo($profile[0]['toil_waterfac_bys']); ?></td>
                        <td style="text-align:center;"><?php echo($profile[0]['toil_waterfac_grls']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="3">How many urinals have water facility?</th>
                        <td style="text-align:center;"><?php echo($profile[0]['urinls_waterfac_bys']); ?></td>
                        <td style="text-align:center;"><?php echo($profile[0]['urinls_waterfac_grls']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="4">Sanitary Worker engaged to clean the Toilets</th>
                        <td style="text-align:center;"><?php echo($profile[0]['toil_sanit_wrks']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="4">Land available for construction of additional Toilets</th>
                        <td style="text-align:center;"><?php echo($profile[0]['toil_land_avail']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="4">School has been provided with Napkin Vending Machine?</th>
                        <td style="text-align:center;">
                            <div>AVAILABLITY&nbsp;:&nbsp;<?php echo($profile[0]['napkin_avail_no']); ?></div>
                            <div>FUNCTIONAL&nbsp;&nbsp;:&nbsp;<?php echo($profile[0]['napkin_func_no']); ?></div>
                        </td>
                    </tr>
                    <tr>
                        <th>&nbsp;</th>
                        <th style="text-align:center;">Manual (Choolas) Functional</th>
                        <th style="text-align:center;">Manual (Choolas) Non-Functional</th>
                        <th style="text-align:center;">Automatic (Electrical) Functional</th>
                        <th style="text-align:center;">Automatic (Electrical) Non-Functional</th>
                    </tr>
                    <tr>
                        <th>School has been provided with Incinerator?</th>
                        <td style="text-align:center;"><strong><?php echo($profile[0]['inci_auto_avail_no']); ?></strong></td>
                        <td style="text-align:center;"><strong><?php echo($profile[0]['inci_auto_func_no']); ?></strong></td>
                        <td style="text-align:center;"><strong><?php echo($profile[0]['inci_man_avail_no']); ?></strong></td>
                        <td style="text-align:center;"><strong><?php echo($profile[0]['inci_man_func_no']); ?></strong></td>
                    </tr>
                </tbody>
            </table>
            
            <p style="page-break-before: always"></p>
            
            
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <th colspan="6" style="text-align:center;background-color:#999;">
                            <strong><?php echo($profile[0]['udise_code']); ?> - <?php echo($profile[0]['school_name']); ?> - Dated On:<?php echo(date('d/m/Y h:i:s',strtotime("now"))); ?></strong><br>
                            SCHOOL DRINIKING WATER AND HAND WASH FACILITY DETAILS
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">Total no of Handwash Tap in use</th>
                        <th>Available</th>
                        <td style="text-align:center;"><strong><?php echo($profile[0]['tot_handwash_bys']); ?></strong></td>
                        <th>Functional</th>
                        <td style="text-align:center;"><strong><?php echo($profile[0]['tot_handwash_grls']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="2">Whether drinking water is available in School premises?</th>
                        <th>source of drinking water</th>
                        <td style="text-align:center;"><strong><?php echo($profile[0]['drnkwater_avail']); ?></strong></td>
                        <th>Whether well is being maintained as top closed?</th>
                        <td style="text-align:center;"><strong><?php echo($profile[0]['well_top']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="4">Whether water quality is tested from water testing lab ?</th>
                        <td colspan="2"><strong><?php echo($profile[0]['water_test']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="4">Whether the School is provided with Overhead tank ?</th>
                        <td colspan="2"><strong><?php echo($profile[0]['overheadtank_avail']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="4">Whether water purifier is available in the School ?</th>
                        <td colspan="2"><strong><?php echo($profile[0]['waterpuri_avail']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="4">Does the School have provision for Rain Water Harvesting?</th>
                        <td colspan="2"><strong><?php echo($profile[0]['schl_rainwtr_hrv']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="4">Whether solar panel is available in school ?</th>
                        <td colspan="2"><strong><?php echo($profile[0]['solar_panel']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="4">Whether Kitchen Garden is available in school?</th>
                        <td colspan="2"><strong><?php echo($profile[0]['kitchen_garden']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="4">Does the school have dustbins for collection of waste in Each Class Room?</th>
                        <td colspan="2"><strong><?php echo($profile[0]['class_dustbin']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="4">Does the school have dustbins for collection of waste in Toilets?</th>
                        <td colspan="2"><strong><?php echo($profile[0]['waste_toilets']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="4">Does the school have dustbins for collection of waste in Kitchen?</th>
                        <td colspan="2"><strong><?php echo($profile[0]['waste_kitchen']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="6" style="text-align:center;background-color:#999;">Medical Checkup Details</th>
                    </tr>
                    <tr>
                        <th colspan="4">Whether medical checkup for Students was conducted in the Last Academic Year?</th>
                        <td colspan="2"><?php echo($profile[0]['med_ckup_lstyr']); ?></td>
                    </tr>
                    <?php if($profile[0]['med_ckup_lstyr']=='YES'){ ?>
                    <tr>
                        <th>Check UP 1</th>
                        <td><?php echo($profile[0]['medcheckup_1']); ?></td>
                        <th>Check UP 2</th>
                        <td><?php echo($profile[0]['medcheckup_2']); ?></td>
                        <th>Check UP 3</th>
                        <td><?php echo($profile[0]['medcheckup_3']); ?></td>
                    </tr>
                    <?php }?>
                    <tr>
                        <th colspan="4">Whether De-worming tablets were given to Children?</th>
                        <td colspan="2"><?php echo($profile[0]['deworm_tab']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="4">Whether Iron and Folic acid tablets given to children as per guidelines of WCD?</th>
                        <td colspan="2"><?php echo($profile[0]['iron_folic']); ?></td>
                    </tr>
                </tbody>
            </table>
            
            <p style="page-break-before: always"></p>
            
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <th colspan="5" style="text-align:center;background-color:#999;">
                            <strong><?php echo($profile[0]['udise_code']); ?> - <?php echo($profile[0]['school_name']); ?> - Dated On:<?php echo(date('d/m/Y h:i:s',strtotime("now"))); ?></strong><br>
                            DETAILS OF EQUIPMENTS (FOR TEACHING AND LEARNING PURPOSE)
                        </th>
                    </tr>
                    <tr>
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
                    <tr>
                        <td style="text-align:center;"><?php echo($r[0]['ict_type']); ?></td>
                        <td style="text-align:center;"><?php echo($r[0]['supplied_by']); ?></td>
                        <td style="text-align:center;"><?php echo($r[0]['purpose']); ?></td>
                        <td style="text-align:center;"><?php echo($r[0]['avail_nos']); ?></td>
                        <td style="text-align:center;"><?php echo($r[0]['working_nos']); ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="5" style="text-align:center;background-color:#999;">INTERNET FACILITY DETAILS</th>
                    </tr>
                    <tr>
                        <th colspan="3">School have a Computer Aided Learning Lab (CAL)</th>
                        <td colspan="2"><strong><?php echo($profile[0]['cal']); ?></strong></td>
                    </tr>
                    <tr>
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
                    <tr>
                        <td style="text-align:center;"><?php echo($r[0]['subscriber']); ?></td>
                        <td colspan="2" style="text-align:center;"><?php echo($r[0]['data_speed']); ?></td>
                        <td colspan="2" style="text-align:center;"><?php echo($r[0]['provided_by']); ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="5" style="text-align:center;background-color:#999;">SCHOOL LAB DETAILS</th>
                    </tr>
                    <tr>
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
                    <tr>
                        <td style="text-align:center;"><?php echo($r[0]['Lab']); ?></td>
                        <td colspan="2" style="text-align:center;"><?php echo($r[0]['seperate_room']); ?></td>
                        <td colspan="2" style="text-align:center;"><?php echo($r[0]['condition_now']); ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="3">Integrated Science Laboratory for Secondary Sections available?</th>
                        <td colspan="2"><strong><?php echo($profile[0]['tot_room']); ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align:center;background-color:#999;">SCHOOL EQUIPMENT DETAILS</th>
                    </tr>
                    <tr>
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
                    <tr>
                        <td style="text-align:center;"><?php echo($r[0]['ictkit']); ?></td>
                        <td colspan="2" style="text-align:center;"><?php echo($r[0]['kitsupplier']); ?></td>
                        <td colspan="2" style="text-align:center;"><?php echo($r[0]['quantity']); ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="5" style="text-align:center;background-color:#999;">SCHOOL EQUIPMENT DETAILS</th>
                    </tr>
                    <tr>
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
                    <tr>
                        <td style="text-align:center;"><?php echo($r[0]['inven_item']); ?></td>
                        <td colspan="2" style="text-align:center;"><?php echo($r[0]['invensupp']); ?></td>
                        <td style="text-align:center;"><?php echo($r[0]['inven_avail']); ?></td>
                        <td style="text-align:center;"><?php echo($r[0]['inven_working']); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>    
            </table>
            
            <p style="page-break-before: always"></p>
            
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <th style="text-align:center;background-color:#999;" colspan="5">
                            <strong><?php echo($profile[0]['udise_code']); ?> - <?php echo($profile[0]['school_name']); ?> - Dated On:<?php echo(date('d/m/Y h:i:s',strtotime("now"))); ?></strong><br>
                            Endowment Fund Details
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">Name of the Bank deposited</th>
                        <td style="text-align:center;"><?php echo($fees_udiseplus_fund[0]['endow_bank_id']); ?></td>
                        <th>Amount (in Rs.) </th>
                        <td ><?php echo($fees_udiseplus_fund[0]['endow_amt']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="2">Date of Deposit</th>
                        <td style="text-align:center;"><?php echo($fees_udiseplus_fund[0]['endow_date_deposit']); ?></td>
                        <th>Date of Maturity </th>
                        <td ><?php echo($fees_udiseplus_fund[0]['endow_date_maturity']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="2">Bank Certificate Number</th>
                        <td colspan="3" style="text-align:center;"><?php echo($fees_udiseplus_fund[0]['endow_certif']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align:center;background-color:#999;" colspan="5">Corpus Fund Details</th>
                    </tr>
                    <tr>
                        <th colspan="2">Name of the Bank deposited</th>
                        <td style="text-align:center;"><?php echo($fees_udiseplus_fund[0]['corp_bank_id']); ?></td>
                        <th>Amount (in Rs.) </th>
                        <td ><?php echo($fees_udiseplus_fund[0]['corp_amt']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="2">Date of Deposit</th>
                        <td style="text-align:center;"><?php echo($fees_udiseplus_fund[0]['corp_date_deposit']); ?></td>
                        <th>Account Number  </th>
                        <td ><?php echo($fees_udiseplus_fund[0]['corp_accno']); ?></td>
                    </tr>
                </tbody>
            </table>
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <th style="text-align:center;background-color:#999;" colspan="10">SCHOOL FEES DETAILS</th>
                    </tr>
                    <tr>
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
                    <tr>
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
                </tbody>
            </table>
            
            <p style="page-break-before: always"></p>
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <th style="text-align:center;background-color:#999;" colspan="7">
                            <strong><?php echo($profile[0]['udise_code']); ?> - <?php echo($profile[0]['school_name']); ?> - Dated On:<?php echo(date('d/m/Y h:i:s',strtotime("now"))); ?></strong><br>
                            INCENTIVES &amp; FACILITIES PROVIDED TO CHILDREN
                        </th>
                    </tr>
                    <tr>
                        <th style="text-align: center;">Types of Facility</th>
                        <th colspan="2" style="text-align: center;">Elementary</th>
                        <th colspan="2" style="text-align: center;">Secondary</th>
                        <th colspan="2" style="text-align: center;">Higher Secondary</th>
                    </tr>
                    <tr>
                        <th style="text-align: center;">&nbsp;</th>
                        <th style="text-align: center;">BOYS</th>
                        <th style="text-align: center;">GIRLS</th>
                        <th style="text-align: center;">BOYS</th>
                        <th style="text-align: center;">GIRLS</th>
                        <th style="text-align: center;">BOYS</th>
                        <th style="text-align: center;">GIRLS</th>
                    </tr>
                    <tr>
                        <th>Braille books</th>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['brlbks_elebys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['brlbks_elegls']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['brailbks_secbys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['brlbks_secgls']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['brailbks_hsecbys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['brlbks_hsegls']); ?></td>
                    </tr>
                    <tr>
                        <th>Braille kit</th>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['brlkit_elebys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['brlkit_elegls']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['brailkit_secbys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['brlkit_secgls']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['brailkit_hsecbys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['brlkit_hsegls']); ?></td>
                    </tr>
                    <tr>
                        <th>Low vision kit</th>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['lvnkit_elebys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['lvnkit_elegls']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['lvnkit_secbys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['lvnkit_secgls']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['lvnkit_hsecbys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['lvnkit_hsegls']); ?></td>
                    </tr>
                    <tr>
                        <th>Hearing Aid</th>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['hearaid_elebys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['hearaid_elegls']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['hearaid_secbys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['hearaid_secgls']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['hearaid_hsecbys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['hearaid_hsegls']); ?></td>
                    </tr>
                    <tr>
                        <th>Braces</th>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['braces_elebys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['braces_elegls']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['braces_secbys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['braces_secgls']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['braces_hsecbys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['braces_hsegls']); ?></td>
                    </tr>
                    <tr>
                        <th>Crutches</th>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['crthes_elebys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['crthes_elegls']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['crthes_secbys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['crthes_secgls']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['crthes_hsecbys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['crthes_hsegls']); ?></td>
                    </tr>
                    <tr>
                        <th>Wheel chair</th>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['whlchr_elebys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['whlchr_elegls']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['whlchr_secbys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['whlchr_secgls']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['whlchr_hsegls']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['whlchr_hsegls']); ?></td>
                    </tr>
                    <tr>
                        <th>Tri-cycle</th>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['tricyle_elebys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['tricyle_elegls']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['tricyle_secbys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['tricyle_secgls']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['tricyle_hsecbys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['tricyle_hsegls']); ?></td>
                    </tr>
                    <tr>
                        <th>Caliper</th>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['caliper_elebys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['caliper_elegls']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['caliper_secbys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['caliper_secgls']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['caliper_hsecbys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['caliper_hsegls']); ?></td>
                    </tr>
                    <tr>
                        <th>Escort</th>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['escort_elebys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['escort_elegls']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['escort_secbys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['escort_secgls']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['escort_hsecbys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['escort_hsegls']); ?></td>
                    </tr>
                    <tr>
                        <th>Stipend</th>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['stipend_elebys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['stipend_elegls']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['stipend_secbys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['stipend_secgls']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['stipend_hsecbys']); ?></td>
                        <td style="text-align: right;"><?php echo($fees_udiseplus_fund[0]['stipend_hsegls']); ?></td>
                    </tr>
                    <tr>
                        <th style="text-align:center;background-color:#999;" colspan="7">School funds received excluding MDM for Elementary School/Sections(Govt and Aided Schools)</th>
                    </tr>
                    <tr>
                        <th colspan="3">School Grant</th>
                        <th colspan="2">Receipt (in Rs.)</th>
                        <th colspan="2">Expenditure (in Rs.)</th>
                    </tr>
                    <tr>
                        <th colspan="3">School Development Grant(under SSA)</th>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssadevep_recept']); ?></td>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssadevep_expdtre']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="3">School Maintanence Grant(under SSA)</th>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssamntn_recept']); ?></td>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssamntn_expdtre']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="3">TLM/TeachersGrant(under SSA)</th>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssatlm_recept']); ?></td>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssatlm_expdtre']); ?></td>
                    </tr>
                    <tr>
                        <th style="text-align:center;background-color:#999;" colspan="7">Grants received by school & expenditure (Secondary & Higher Secondary Schools/Sections) (Govt and Aided Schools)</th>
                    </tr>
                    <tr>
                        <th colspan="3">Details of School Level Grants</th>
                        <th colspan="2">Receipt (in Rs.)</th>
                        <th colspan="2">Expenditure (in Rs.)</th>
                    </tr>
                    <tr>
                        <th colspan="3">Civil works</th>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssacivil_recept']); ?></td>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssacivil_expdtre']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="3">Annual School Grants(recurring)</th>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssaannual_recept']); ?></td>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssaannual_expdtre']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="3">Minor Repair/maintenance</th>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssamnr_recept']); ?></td>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssamnr_expdtre']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="3">Repair and replacement of laboratory equipments, purchase of laboratory consumable sand articles etc.</th>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssarpr_recept']); ?></td>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssarpr_expdtre']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="3">Pruchase of books, periodicals, newspaper, etc.</th>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssapur_recept']); ?></td>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssapur_expdtre']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="3">Grant for meeting water, telephone and electricity charges.</th>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssametwtr_recept']); ?></td>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssametwtr_expdtre']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="3">Others</th>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssaoth_recept']); ?></td>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssaoth_expdtre']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="3">Total (Grants at the school level)</th>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssatot_recept']); ?></td>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssatot_expdtre']); ?></td>
                    </tr>
                    <tr>
                        <th style="text-align:center;background-color:#999;" colspan="7">Grants received by the school &amp; expenditure (Govt. Schools)</th>
                    </tr>
                    <tr>
                        <th colspan="3">Grants under Samagra Shiksha</th>
                        <th colspan="2">Receipt (in Rs.)</th>
                        <th colspan="2">Expenditure (in Rs.)</th>
                    </tr>
                    <tr>
                        <th colspan="3">Composite School Grant</th>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssacmpste_recept']); ?></td>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssacmpste_expdtre']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="3">Library Grant</th>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssalibg_recept']); ?></td>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssalibg_expdtre']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="3">Grant for sports and physical education</th>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssaped_recept']); ?></td>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssamntn_recept']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="3">Grant for media and community mobilization</th>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssamedia_recept']); ?></td>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssamedia_expdtre']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="3">Grant for Training of SMC/SMDC</th>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssatrngsmcdc_recept']); ?></td>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssatrngsmcdc_expdtre']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="3">Grant for support at Preschool Level (Only for primary schools/sections)</th>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssapreschl_recept']); ?></td>
                        <td colspan="2"><?php echo($fees_udiseplus_fund[0]['ssapreschl_expdtre']); ?></td>
                    </tr>
                </tbody>
            </table>
            <p style="page-break-before: always"></p>
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <th style="text-align:center;background-color:#999;" colspan="7">Financial Assistance received by the school from NGO/PSU</th>
                    </tr>
                    <tr>
                        <th colspan="4">Non - Govt. Organization (NGO)</th>
                        <td colspan="3"><?php echo($fees_udiseplus_fund[0]['ngo_name']); ?></td>
                    </tr>
                     <tr>
                        <th colspan="4">Public Sector Undertaking (PSU) </th>
                        <td colspan="3"><?php echo($fees_udiseplus_fund[0]['psu_name']); ?></td>
                    </tr>
                    <tr>
                        <th style="text-align:center;background-color:#999;" colspan="7">Whether school is maintaining inventory register for the following</th>
                    </tr>
                    <tr>
                        <th colspan="4">Computer</th>
                        <td colspan="3"><?php echo($fees_udiseplus_fund[0]['main_com']); ?></td>
                    </tr>
                     <tr>
                        <th colspan="4">Sports Equipments</th>
                        <td colspan="3"><?php echo($fees_udiseplus_fund[0]['sprts_equip']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="4">Library Books</th>
                        <td colspan="3"><?php echo($fees_udiseplus_fund[0]['lib_boks']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="4">Number of teachers with Aadhar or whose unique ID is seeded in any electronic data base</th>
                        <td colspan="3"><?php echo($fees_udiseplus_fund[0]['noteacher_adhar']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="4">Whether the school has in place a system to capture student attendance electronically</th>
                        <td colspan="3"><?php echo($fees_udiseplus_fund[0]['stuatdnce_elet']); ?></td>
                    </tr>
                     <tr>
                        <th colspan="4">Whether the school has in place a system to capture teacher attendance electronically</th>
                        <td colspan="3"><?php echo($fees_udiseplus_fund[0]['tchratdnce_elet']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="4">Has school evaluation been completed</th>
                        <td colspan="3"><?php echo($fees_udiseplus_fund[0]['schlevl_cmp']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="4">Has school made Improvement Plans on the basis of Evaluation?</th>
                        <td colspan="3"><?php echo($fees_udiseplus_fund[0]['schl_imp']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="4">Is the school registered under PFMS?</th>
                        <td colspan="3"><?php echo($fees_udiseplus_fund[0]['schlreg_pfms']); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php if($print!=0){ ?>
        <footer>
            <div style="text-align:center;">
                <button type="button" style="margin:10px;padding:10px 15px;color:whitesmoke;background-color: #5CB757;border:none;box-shadow:1px 1px 3px 5px #CCC;" onclick="alert('Exported As PDF');location.href='<?php echo base_url()."AllApprove/generateProfilePDF/".$this->uri->segment(3,0)."/".$this->uri->segment(4,0);?>'">Print</button>
                <button type="button" style="margin:10px;padding:10px 15px;color:whitesmoke;background-color: #D56A88;box-shadow:1px 1px 3px 5px #CCC;" onclick="location.href='<?php echo $_SERVER['PHP_SELF'];?>'" class="btn default">Reload</button>                                        
            </div>
        </footer>
        <?php } ?>
    </body>
</html>