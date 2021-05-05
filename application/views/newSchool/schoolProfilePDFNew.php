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
        <?php if($print!=0){ ?>
            <?php $this->load->view('head.php'); ?>
            <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
        <?php } ?>
        
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
                        foreach($profile as $val) {
                            if(array_key_exists($key, $val)){
                                $result[$val[$key]][] = $val;
                            }else{
                                $result[""][] = $val;
                            }
                        } 
                        //print_r($result);die();
                        $blockno=1;
                        foreach($result as $k => $r){
                            //print_r($r);echo('<br><br><br>');die();
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
                        foreach($profile as $val) {
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
                        <th style="text-align: center;">Library facility/Book Bank/ Reading Corner</th>
                        <th colspan="2" style="text-align: center;">Total number of books</th>
                    </tr>
                    <?php
                        $result = array();$key='library_type';
                        foreach($profile as $val) {
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
                    
                    
                    
                </tbody>
            </table>
            <p style="page-break-before: always"></p>
            
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <th style="text-align:center;background-color:#999;" colspan="11">
                            <strong><?php echo($profile[0]['udise_code']); ?> - <?php echo($profile[0]['school_name']); ?> - Dated On:<?php echo(date('d/m/Y h:i:s',strtotime("now"))); ?></strong><br>
                            Certificate Details & Document List Details
                        </th>
                    </tr>
                    
                    <?php
                        $result = array();$key='certid';
                        foreach($profile as $val) {
                            if(array_key_exists($key, $val)){
                                $result[$val[$key]][] = $val;
                            }else{
                                $result[""][] = $val;
                            }
                        }
                        $rowspan=0;//echo("<br>");
                        foreach($result as $rindx => $rval){
                            $cpyarr = array();$key='fileid';
                            foreach($rval as $val1) {
                                if(array_key_exists($key, $val1)){
                                    $cpyarr[$val1[$key]][] = $val1;
                                }else{
                                    $cpyarr[""][] = $val1;
                                }
                            }
                            $rowspan=count($cpyarr);
                            foreach($cpyarr as $cpy => $cpyval){ 
                        ?>
                            <tr>
                                <?php if($rowspan!=0){ ?><td colspan="8" rowspan="<?php echo($rowspan); $rowspan=0; ?>"><?php echo($cpyval[0]['certificatename']); ?></td> <?php } ?>
                                <td colspan="3"><a href="#" onclick="popuppdf('<?php echo($cpyval[0]['certificate_filepath']); ?>',1)"><?php echo($cpyval[0]['certificate_filename']); ?></a></td>
                            </tr>
                        <?php
                            }
                        }   
                      ?>  
                    
                    <tr>
                        <th colspan="3">Document No</th>
                        <th colspan="3">Survey No</th>
                        <th colspan="3">Place of Registration</th>
                        <th colspan="2">Date of Registration</th>
                    </tr>
                     <?php
                        $result = array();$key='docid';
                        foreach($profile as $val) {
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
                        <td colspan="3" style="text-align:center;"><?php echo($r[0]['docno']); ?></td>
                        <td colspan="3" style="text-align:center;"><?php echo($r[0]['surveyno']); ?></td>
                        <td colspan="3" style="text-align:center;"><?php echo($r[0]['placereg']); ?></td>
                        <td colspan="2" style="text-align:center;"><?php echo($r[0]['datereg']); ?></td>
                    </tr>
                    <?php } ?>
                    
                    
                </tbody>
            </table>
            
            <p style="page-break-before: always"></p>

            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <th style="text-align:center;background-color:#999;" colspan="5">
                            Endowment Fund Details
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">Name of the Bank deposited</th>
                        <td style="text-align:center;"><?php echo($profile[0]['endow_bank_id']); ?></td>
                        <th>Amount (in Rs.) </th>
                        <td ><?php echo($profile[0]['endow_amt']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="2">Date of Deposit</th>
                        <td style="text-align:center;"><?php echo($profile[0]['endow_date_deposit']); ?></td>
                        <th>Date of Maturity </th>
                        <td ><?php echo($profile[0]['endow_date_maturity']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="2">Bank Certificate Number</th>
                        <td colspan="3" style="text-align:center;"><?php echo($profile[0]['endow_certif']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align:center;background-color:#999;" colspan="5">Corpus Fund Details</th>
                    </tr>
                    <tr>
                        <th colspan="2">Name of the Bank deposited</th>
                        <td style="text-align:center;"><?php echo($profile[0]['corp_bank_id']); ?></td>
                        <th>Amount (in Rs.) </th>
                        <td ><?php echo($profile[0]['corp_amt']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="2">Date of Deposit</th>
                        <td style="text-align:center;"><?php echo($profile[0]['corp_date_deposit']); ?></td>
                        <th>Account Number  </th>
                        <td ><?php echo($profile[0]['corp_accno']); ?></td>
                    </tr>
                </tbody>
            </table>

            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <th style="text-align:center;background-color:#999;" colspan="5">
                            School Management Details
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">Name of the Management Trust</th>
                        <td style="text-align:center;"><?php echo($profile[0]['trust_name']); ?></td>
                        <th>Address & Pincode</th>
                        <td ><?php echo($profile[0]['trust_address'].'-'.$profile[0]['trust_pincode']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="4">Is the trust registered?</th>
                        <td style="text-align:center;"><?php echo($profile[0]['trustdate'].','.$profile[0]['trustplace']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="2" style="text-align:center;">Name of Institution</th>
                        <th colspan="3" style="text-align:center;">Place of Institution</th>
                    </tr>
                    <?php
                        $result = array();$key='instid';
                        foreach($profile as $val) {
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
                        <td colspan="2" style="text-align:center;"><?php echo($r[0]['institutionname']); ?></td>
                        <td colspan="3" style="text-align:center;"><?php echo($r[0]['institutionplace']); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <table style="margin:0% auto;width:100%;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <th style="text-align:center;background-color:#999;" colspan="5">
                            School Application Fee Details
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">Amount to be paid</th>
                        <td style="text-align:center;"><?php echo($profile[0]['amount']); ?></td>
                        <th>Challan No & Date</th>
                        <td ><?php echo($profile[0]['challan_no'].'-'.$profile[0]['challan_date']); ?></td>
                        
                    </tr>
                     <tr>
                        <th colspan="2">IFSC Code</th>
                        <td style="text-align:center;"><?php echo($profile[0]['ifsc_code']); ?></td>
                        <th>Upload Challan</th>
                        <td><a href="#" onclick="popuppdf('<?php echo($profile[0]['challanfp']); ?>',1)"><?php echo($profile[0]['challan_filename']); ?></a></td>
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
        <div id="myModal" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body bg-primary" id="modalbody" style="width:100%;">
                        <span style="font-size: 28px;font-weight: bold;cursor: pointer; float:right;" onclick="popuppdf('',0);">&times;</span>
                        <div>
                            <object id="viewpdf" style="width:100%;min-height:525px;" ></object>
                        </div>
                    </div>
                </div>
            </div>                                                                                                                                                                                                                        
        </div>
        <?php $this->load->view('scripts.php'); ?>
        <?php } ?>
        <script type="text/javascript">
            function popuppdf(url,disp) {
                if(disp==1){
                    document.getElementById('viewpdf').setAttribute('data',url);
                    document.getElementById('myModal').style.display='block';
                }
                else{
                   document.getElementById('viewpdf').removeAttribute('data');
                   document.getElementById('myModal').style.display='none'; 
                }
            }
        </script>
    </body>
    
</html>