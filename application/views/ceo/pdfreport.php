<?php
    
    //print_r($comment);die();
    
    $directorate_dee=array(16,18,27,29,32,34);
    $directorate_dse_dms=array(15,17,19,20,21,22,23,24,26,28,31,33);
    //print_r($comment);
    //print_r($display);
    
    foreach($comment as $user_id => $cc){
        if(is_array($cc)){
            if($cc['finalcat']){
                $officer=$cc['username'].',';
                $officercat=$renew[0][$cc['discontent']];
                //$str='Recognised Private Schools (Regulation) Act, 1973 and Rules 1974 framed ';  
                $rc=$comment[$user_id]['filenumber']."/Dt.".date("d.m.Y",strtotime($comment[$user_id]['ts']));
            }  
        }
    }
    if(in_array($renew[0]['sch_directorate_id'],$directorate_dse_dms)){
        $str='Recognised Private Schools (Regulation) Act, 1973 and Rules 1974 framed ';  
    }
    elseif(in_array($renew[0]['sch_directorate_id'],$directorate_dee)){
        $str='Matriculation Schools Regulation Rules, 1978 and other Government orders ';   
    }
    //$officer='CHIEF EDUCATION OFFICER,';
    //$rc=$deo[2]."/Dt.".date("d.m.Y",strtotime($deo[3])); 
     //this the the PDF filename that user will get to download
     //echo($this->session->userdata('sch_dircet'));
     if($renew[0]['udise_code']!=NULL){
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Vivek Rao Bhosale" />
	<title>SCHOOL RENEWAL</title>
</head>
<body>
<div id="wrapper" style="text-align:justify;font-size:9pt;padding:5px;">
    <div id="header">
        <div id="head1" style="display:inline-block;float:left;margin:0 auto;">&nbsp;</div>
        <div id="head2" style="display:inline-block;float:left;margin:0 auto;width:31%; text-align:center;"><!--<img src="<?php echo base_url().'asset/logo.jpg'?>" width="85" height="85" alt="Logo">--></div>
        <div id="head3" style="display:inline-block;float:left;margin:0 auto;">&nbsp;</div>
    </div>
    <div id="body" style="clear: both;">
        <p style="text-align:center;line-height:2em;"><strong>RENEWAL OF CERTIFICATE OF RECOGNITION</strong></p>
        <p style="text-align:center;line-height:0.1em;"><strong><?php echo($officer.$officercat);?></strong></p>
        <p style="text-align:center;line-height:0.1em;text-decoration:underline;"><strong>R.C.No.:<?php echo($rc);?></strong></p>
        <p>
            <ul>
                <li>Sub. : Renewal of Certificate of Recognition - Reg.</li>
                <li><span style="float:left;">Ref : </span>
                    <ol style="float:left;">
                        <li>Application from the Secretary / Correspondent <strong><?php echo($renew[0]['school_name']." (UDISE:".$renew[0]['udise_code']);?>)</strong> for Recognition dated <strong><?php echo(date("d.m.Y",strtotime($renew[0]['createddate'])));?></strong>.</li>
                        <?php foreach($comment as $user_id => $cc){
                            if(is_array($cc)){
                                if(!$cc['finalcat']){
                        ?>
                        <li><?php echo($cc['username'].",".$renew[0][$cc['discontent']].",".$renew[0]['district_name'].",");if($comment[$user_id]['filenumber']!=null){echo('letter '.$comment[$user_id]['filenumber']." dt.".date("d.m.Y",strtotime($comment[$user_id]['ts'])));}?>.</li>
                        <?php
                                }
                            }
                        } ?>
                        
                    </ol>
                </li>
            </ul>
        </p>
        <p style="clear:both;text-indent:2em;">The application for the Certificate of Recognition cited above, has been considered by the Competent Authority. The School has already been given Certificate of Recognition under Tamil Nadu Right of Children to Free and Compulsory Education Rules 2011 for classes <strong><?php echo($renew[0]['low_class']."</strong> to <strong>".$renew[0]['high_class']); ?></strong>.</p>
        <p style="text-indent:2em;">Now the application has been received for renewal of certificate of recognition for classes <strong><?php echo($renew[0]['low_class']."</strong> to <strong>".$renew[0]['high_class']); ?></strong>.</p>
        <p style="text-indent:2em;">After perusing the applications, documents and visit reports, the Competent Authority is satisfied that the Educational Agency has fulfilled the conditions prescribed for the Renewal of Recognition.</p>
        <p style="text-indent:2em;">Therefore, the competent Authority hereby renews the certificates of recognition to the above said school for the classes <strong><?php echo($renew[0]['low_class']."</strong> to <strong>".$renew[0]['high_class']); ?></strong> with effect from <strong><?php if($renew[0]['vaild_from']!=null){echo(date("d.m.Y",strtotime($renew[0]['vaild_from']))); ?></strong> to <strong><?php echo(date("d.m.Y",strtotime($renew[0]['vaild_upto'])));}?></strong>.</p>
        <p style="text-indent:2em;">The above renewal is subject to the following conditions.
            <ol>
                <li>The Educational Agency shall always keep the structural stability certificate, sanitary certificate, building license and fire and rescue safety certificate current and valid.</li>
                <li>The Educational Agency shall abide by the provisions contained in the Tamil Nadu <?php echo($str); ?> thereunder.</li>
                <li>The Educational Agency shall abide by the instructions issued by the officials from time to time.</li>
                <li>The Educational Agency / School shall abide by the provisions contained in the
                    <ol type="i">
                        <li>Tamil Nadu Tamil Learning Act, 2006.</li>
                        <li>Tamil Nadu schools (Regulation of collection of fees) Act, 2009 and rules made thereunder.</li>
                        <li>Tamil Nadu Right of Children to Free and Compulsory Education Act 2009 and Tamilnadu Rules 2011 and rules made thereunder.</li>
                    </ol>
                </li>
                <li>The school shall admit at the entry level to the extent of 25% of the strength in each class, children belonging to weaker section and disadvantaged group in the neighborhood and provide free and compulsory elementary education till its completion.</li>
                <li>The school shall maintain a separate bank account for the purpose of reimbursement.</li>
                <li>The school shall not collect any capitation fee and subject the child or his or her parent or guardian to any screening procedure.</li>
                <li>The school shall not deny admission to any child
                    <ol type="i">
                        <li>for lack of age proof if such admission is sought subsequent to the extended period prescribed for admission.</li>
                        <li>on the ground of religion, caste or race, place of birth or any of them.</li>
                    </ol>
                </li>
                <li>The school shall ensure that
                    <ol type="i">
                        <li>no child admitted shall be held back in any class or expelled from school till the completion of elementary education in a school.</li>
                        <li>no child shall be subjected to physical punishment or mental harassment.</li>
                        <li>no child is required to pass any board examination till the completion of elementary education.</li>
                        <li>every child completing elementary education shall be awarded a certificate as laid down under rule 21 of the Tamil Nadu Right of Children to Free and Compulsory Education Act 2009.</li>
                        <li>inclusion of student with disabilities/ special needs as per provision of the Act.</li><br />
                        <li>the teachers are recruited with minimum qualifications as laid under section 23(1) of the of the Tamil Nadu Right of Children to Free and Compulsory Education Act 2009:
                            <p style="text-indent:2em;">Provided that the teachers who, at the commencement of this Act do not possess minimum qualification shall acquire such minimum qualifications within a period of 5 years;</p>
                        </li>
                        <li>the teacher performs his duties specified under sub-section (1) of section 24 of the of the Tamil Nadu Right of Children to Free and Compulsory Education Act 2009; and</li>
                        <li>the teacher shall not engage himself for private teaching activities.</li>
                    </ol>
                </li>
                <li>The school shall follow the syllabus on the basis of curriculum laid down by appropriate authority.</li>
                <li>The school shall maintain the standards and norms as specified in section 19 of the Act.</li>
                <li>No unrecognized classes shall run within the premises of the school or outside in the name of the school.</li>
                <li>The school building or other structures and the grounds are used only for the purpose of education and skill development.</li>
                <li>The school is run by a society registered under the Tamil Nadu Societies Registration Act, 1975 ( Tamil Nadu Act 27 of 1975), or public trust constituted under any law for the time being in force.</li>
                <li>The school is not run for profit to any individual, group or association of individuals or any other persons.</li>
                <li>The accounts should be audited and certified by a Chartered Accountant and proper accounts statements should be prepared. A copy each of the Statements of Accounts should be sent every year to the competent authority granting recognition.</li>
                <li>The school shall furnish such reports and information as may be required by the competent authority from time to time and shall comply with such instructions of the State Government or the competent authority as may be issued to secure the continued fulfillment of the condition of recognition or the removal of deficiencies in working of the school.</li>
                <li>If it is found out at any point of time that the Educational Agency has violated any of the conditions prescribed for recognition, the recognition granted is liable to be withdrawn.</li>
                <?php
                    if($comment['comment']!=null){
                ?>
                <li><?php echo($comment['comment']); ?></li>
                <?php
                    }
                ?>
            </ol>
        </p>
        <p style="text-align:center;">The receipt of these proceedings should be acknowledged.</p>
    </div>
    <div id="footer">
        <div style="float:left;width:300px;">
            <div>
                <p>
                To<br />
                The Secretary / Correspondent,<br />
                <strong><?php echo($renew[0]['school_name']); ?></strong>,<br />
                <strong>UDISE:<?php echo($renew[0]['udise_code']); ?>,</strong><br />
                <?php $add=explode('\n',$renew[0]['address']); echo($add[0]); ?>,<br />
                <?php echo($add[1]); ?>,<br />
                <?php echo($renew[0]['district_name']); ?> - <?php echo($renew[0]['pincode']); ?></p>
            </div>
            <div>
                Copy to:<ol style="margin-top:0;">
                    <?php foreach($comment as $user_id => $cc){
                            if(is_array($cc)){
                                if(!$cc['finalcat']){
                        ?>
                        <li><?php echo($cc['username'].",".$renew[0][$cc['discontent']]); ?>,<span style="text-transform:capitalize;"><?php echo($renew[0]['district_name']); ?></span></li>
                        <?php
                                }
                            }
                        } ?>
                </ol>
            </div>
        </div>
        <div style="float:right;text-align:right;">
            <p style="line-height:0.2em;"><strong><?php echo($officer); ?></strong></p>
            <p><?php echo($officercat); ?></p>
        </div>
    </div>
</div>
<?php }else{
    echo("<h1>Application is Approved. Udise Code Not Mapped. Wait Till Mapping Completed.</h1>");
} ?>

</body>
</html>