<?php
    //print_r($comment);die();
    $directorate_dee=array(16,18,27,29,32,34);
    $directorate_dse_dms=array(15,17,19,20,21,22,23,24,26,28,31,33);
    foreach($comment as $user_id => $cc){
        if(is_array($cc)){
            if($cc['finalcat']){
                $officer=$cc['username'].',';
                $officercat=$renew[0][$cc['discontent']];
                //$str='Recognised Private Schools (Regulation) Act, 1973 and Rules 1974 framed ';  
                $rc="<strong>".$comment[$user_id]['filenumber'].",</strong> நாள்<strong>.".date("d.m.Y",strtotime($comment[$user_id]['ts']))."</strong>";
            }  
        }
    }
    if(in_array($renew[0]['sch_directorate_id'],$directorate_dse_dms)){
        $str='Recognised Private Schools (Regulation) Act, 1973 and Rules 1974 framed ';  
    }
    elseif(in_array($renew[0]['sch_directorate_id'],$directorate_dee)){
        $str='Matriculation Schools Regulation Rules, 1978 and other Government orders ';   
    }
    /*if(in_array($renew[0]['sch_directorate_id'],$directorate_dse_dms)){
        $officer='CHIEF EDUCATION OFFICER,';
        $officercat=$renew[0]['district_name'];
        $str='Recognised Private Schools (Regulation) Act, 1973 and Rules 1974 framed ';  
        $rc="<strong>".$comment[9]['filenumber'].",</strong> நாள்<strong>.".date("d.m.Y",strtotime($comment[9]['ts']))."</strong>"; 
        $deo=1; 
        $beo=0;
    }
    elseif(in_array($renew[0]['sch_directorate_id'],$directorate_dee)){
        $officer='DISTRICT EDUCATION OFFICER,';
        $officercat=$renew[0]['edn_dist_name'];
        $str='Matriculation Schools Regulation Rules, 1978 and other Government orders ';   
        $rc=$comment[10]['filenumber'].", நாள்.".date("d.m.Y",strtotime($comment[10]['ts']));
        $deo=0; 
        $beo=1;
    }*/
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
        <p style="text-align:center;line-height:0.1em;font-size:1.5em;font-weight:900;">தொடக்கக் கல்வி இயக்குநரின் செயல்முறைகள், சென்னை – 600 006.</p>
        <!--<p style="text-align:center;line-height:0.1em;"><strong><?php echo($officer.$officercat);?></strong></p>-->
        <p style="text-align:center;line-height:0.1em;text-decoration:underline;font-weight:900;">ந.க.எண் : <?php echo($rc);?></p>
        <p style="padding:0;text-indent:0;">
            <ul style="list-style-type:none;">
                <li>
					பொருள்:
					தொடக்கக் கல்வி – மழலையர் மற்றும் தொடக்கப் பள்ளிக்கு <?php echo($renew[0]['low_class']." முதல் ".$renew[0]['high_class']); ?> ஆம் வகுப்புகள் வரை புதிதாக துவக்க அங்கீகாரம் – <?php echo($renew[0]['district_name']); ?> மாவட்டம், <?php echo($renew[0]['block_name']); ?> ஒன்றியம் – 
					<strong><?php echo $renew[0]['school_name'];?></strong> துவக்கப் பள்ளி க்கு <?php echo($renew[0]['low_class']." முதல் ".$renew[0]['high_class']); ?> ஆம் வகுப்புகள் வரை – <?php echo(date("Y",strtotime($renew[0]['vaild_from']))); ?>-<?php echo(date("Y",strtotime($renew[0]['vaild_from']))) ?> ஆம் கல்வியாண்டில் தொடக்க அங்கீகாரம் அனுமதித்து ஆணை <strong><?php if($renew[0]['vaild_from']!=null){echo(date("d.m.Y",strtotime($renew[0]['vaild_from']))); ?></strong> முதல் <strong><?php echo(date("d.m.Y",strtotime($renew[0]['vaild_upto'])));}?></strong>  துவக்க அனுமதி வழங்குதல் – சார்ந்து.
					<!--<strong><?php echo $renew[0]['school_name'];?></strong> for Recognition dated <strong><?php echo(date("d.m.Y",strtotime($renew[0]['createddate'])));?></strong>.-->
				</li>
				<li>
					பார்வை :
					<ol>
						<?php //if($beo){ ?>
                        <li>அரசாணை (நிலை) எண் 101, பள்ளிக் கல்வி (நிதி-1) துறை, நாள். 18.05.2018 
						<?php //echo($renew[0]['block_name'].",".$renew[0]['district_name'].",");if($comment[6]['filenumber']!=null){echo('letter '.$comment[6]['filenumber']." dt.".date("d.m.Y",strtotime($comment[6]['ts'])));}?>.
						</li>
						<?php //}elseif($deo) { ?>
                        <li>அரசாணை (நிலை) எண் 79, பள்ளிக் கல்வி (MS) துறை, நாள் 06.05.2019
						<?php //echo($renew[0]['edn_dist_name']);?>,<?php if($comment[10]['filenumber']!=null)echo('letter '.$comment[10]['filenumber']." dt.".date("d.m.Y",strtotime($comment[10]['ts'])));?>.
						</li>
                        <li><?php echo($renew[0]['district_name']); ?> மாவட்ட முதன்மைக் கல்வி அலுவலரின் கடித ந.க.எண் <?php echo($rc);?></li>
                        <?php //} ?>
                    </ol>
                </li>
            </ul>
        </p>
		<p style="text-align:center;clear:both;text-indent:2em;"><b>------------------------------------</b></p>
		<p style="clear:both;text-indent:2em;">குழந்தைகளுக்கான இலவச கட்டாயக் கல்வி உரிமைச் சட்டம், 2009 மற்றும் தமிழ்நாடு விதிகள்
			2011 இன்படியும், பார்வை 1 இல் காணும் அரசாணயின் அடிப்படையிலும், பார்வை 2 இல் உள்ள
			<?php echo($renew[0]['district_name']); ?> மாவட்ட முதன்மைக் கல்வி அலுவலரின் பரிந்துரையின் அடிப்படையிலும், பார்வை 2 இல்
			காணும் அரசாணையில் உரிய அமைப்பிடமிருந்து பள்ளி கட்டட வரைபட அனுமதி பெறாத
			பள்ளிகளுக்கு <strong><?php echo(date("d.m.Y",strtotime($renew[0]['vaild_upto'])));?></strong> வரை நீட்டித்து ஆணை வழங்கப்பட்டுள்ளதன் அடிப்படையிலும், 
			<?php echo($renew[0]['district_name']); ?> மாவட்டம், <?php echo($renew[0]['block_name']); ?> ஒன்றியம், <?php echo($renew[0]['school_name']); ?> துவக்கப் பள்ளி க்கு பின்வரும்
			நிபந்தனைகளின் அடிப்படையில் <strong><?php echo($renew[0]['low_class']."</strong> முதல் <strong>".$renew[0]['high_class']); ?></strong> ஆம் வகுப்புகள் வரை
			துவக்க அனுமதி <strong><?php if($renew[0]['vaild_from']!=null){echo(date("d.m.Y",strtotime($renew[0]['vaild_from']))); ?></strong> முதல் <strong><?php echo(date("d.m.Y",strtotime($renew[0]['vaild_upto'])));}?></strong> வரை வழங்கப்படுகிறது.
		</p>
        
        <p style="text-align:center;text-indent:2em;text-decoration:underline;">நிபந்தனைகள்
            <ol>
                <li>இப்பள்ளி குழந்தைகளுக்கான இலவச மற்றும் கட்டாயக் கல்வி உரிமைச் சட்டம் 2009 மற்றும் தமிழ்நாடு இலவச மற்றும் கட்டாயக் கல்வி உரிமைச் சட்ட விதிகள் 2011, ஆகியவற்றில் தெரிவிக்கப்பட்டுள்ள வழிகளை / காப்புரைகளுக்கு கட்டுப்பட வேண்டும்.</li>
                <li>பள்ளியில் நுழைவுநிலை வகுப்பில், அருகாமை பகுதியில் உள்ள நலிவடைந்த / வாய்ப்புகள் மறுக்கப்பட்ட பிரிவினருக்கு, வகுப்பில் மொத்த சேர்க்கையில் 25 % க்கு குறையாமல் சேர்க்கை செய்யப்பட்டு எல்.கே.ஜி முதல் 5ம் வகுப்பு முடிக்கும் வரை அவர்களுக்கு இலவசக் கட்டாயக் கல்வி அளிப்பதை உறுதி செய்ய வேண்டும். <?php //echo($str); ?></li>
                <li>பள்ளியில் கல்வி கட்டணத் தொகை ஈடு செய்ய ஏதுவாக “பள்ளி முதல்வர்” என்ற பதவிப் பெயரில் தனியாக வங்கி கணக்கு பராமரிக்க வேண்டும்.</li>
				<li>பெற்றோர்களிடமிருந்து நன்கொடை(Caption) ஏதும் வசூலிக்கக் கூடாது. மேலும் குழந்தைகளுக்கு சேர்க்கை நிமித்தம் எவ்வித எழுத்துத் தேர்வோ / நேர்காணலோ (Oral Interview)
				நடத்தக்கூடாது.</li>
				<li>எந்த ஒரு குழந்தைக்கும், (a) பிறப்புச் சான்று அளிக்காத காரணத்திற்கோகவோ, (b) சாதி, இன மத அடிப்படையிலோ, வேறு காரணத்திற்காகவோ சேர்க்கை மறுக்கப்படக் கூடாது.</li>
                <li>குழந்தைகளுக்கான இலவச மற்றும் கட்டாயக் கல்வி உரிமைச் ட்டம் 2009, விதி 23 (1)ன்படி அரசாணை (பல்வகை) எண்.181 பள்ளிக் கல்வித் துறை, நாள்.15.11.2011ல் குறிப்பிட்டவாறு 31.03.2015ற்குள் எல்.கே.ஜி முதல் 5 ஆம் வகுப்பு வரை கற்பிக்கும் ஆசிரியர்கள் குறைந்தபட்ச கல்வி மற்றும் தொழிற்கல்வி தகுதியுடன் ஆசிரியர் தகுதி தேர்விலும் தேர்ச்சி பெற வேண்டும். இத்தகுதி பெறாதவர்கள் முழுத்தகுதி பெற்ற ஆசிரியர்களாக கருத்தப்பட மாட்டார்கள்.</li>
                
                <li>குழந்தைகளுக்கான இலவச மற்றும் கட்டாயக் கல்வி உரிமைச் சட்டம் 2009, அதற்கான தமிழ்நாடு விதிகள் 2011 கீழ்க்குறித்த கீழ்க்காணும் காரணிகளை பள்ளி நிர்வாகம் உறுதி செய்து கொள்ள வேண்டும்.
                    <ol id="tami_index" type="i">
                        <li>சேர்க்கை செய்யப்பட்ட எந்த ஒரு குழந்தையையும் தொடக்கக் கல்வி (5ஆம் வகுப்பு) முடிக்கும் வரை நீக்கம் செய்யக் கூடாது.</li>
                        <li>எந்த ஒரு குழந்தையையும் உடல் ரீதியான / மன ரீதியான துன்புறுத்தலுக்கு ஆட்படுத்தக் கூடாது.</li>
                        <li>தொடக்கக் கல்வி முடியும் வரை குழந்தைகளை எவ்வித பொதுத் தேர்வுகளுக்கும் ஆட்படுத்தக் கூடாது.</li>
						<li>தொடக்கக் கல்வியினை நிறைவு செய்யும் குழந்தைகளுக்கு விதி எண்.21ல் தெரிவிக்கப்பட்டவாறு சான்று அளிக்கப்பட வேண்டும்.</li>
						<li>மாற்றுத் திறனாளி குழந்தைகள் / சிறப்பு கவனம் அளிக்கப்பட வேண்டிய குழந்தைகளுக்கு உரிய விதி தளர்வுகளுடன் சேர்க்கை அளிக்கப்பட வேண்டும்.</li>
						<li>விதி எண்.23(1)ன் படி குறைந்தபட்ச முழுக கல்வித் தகுதி பெற்ற ஆசிரியர்களே பணியில் அமர்த்தப்பட வேண்டும்.</li>
						<li>விதி எண்.24 உப விதி(1)ன் கீழ் வரையறுக்கப்பட்டவாறு ஆசிரியர்கள் தங்கள் பணியினை மேற்கொள்ள வேண்டும். எந்த ஒரு ஆசிரியரும் தனிப் பயிற்சி
							எடுத்திட பள்ளி நிர்வாகம் அனுமதிக்கக் கூடாது.
						</li>
                    </ol>
                </li>
				<li>பள்ளிக் கல்வி பொதுக் கல்வி வாரியத்தால் ஒப்பளிக்கப்பட்ட பாடத் திட்டங்கள் மற்றும் அரசு ஆணை எண்.143 ப.க. (எக்ஸ்2) துறை, நாள் 19.09.2011 இல் 			வரையறுக்கப்பட்ட முப்பருவ பாடமுறை மற்றும் தொடர் முழு மதிப்பீட்டு முறை பள்ளிகளில் தவறாது பின்பற்ற வேண்டும்.</li>
				<li>குழந்தைகளுக்கான இலவச மற்றும் கட்டாயக் கல்வி உரிமைச் சட்டம் 2009 சட்டப்பிரிவு 19ல் தெரிவிக்கப்பட்ட வரையறை மற்றும் தரங்களை (Norms and Standard) பள்ளிகள் தவறாது கடைபிடிக்கப்பட வேண்டும்.
				</li>
				<li>பள்ளிக் கட்டிடம், கல்விப் பணிக்காக அல்லது கல்வித் திறன் வளர்ப்பு பணிகளுக்காக மட்டுமே பயன்படுத்தப்பட வேண்டும்.</li>
                
                <li>தமிழ்நாடு பதிவு பெற்ற சங்கங்கள் வதி 1975ன்படி ஒரு சங்கமாகவோ அல்லது பதிவுப் பெற்ற அல்லது நடைமுறையிலுள்ள சட்டப்படி அமைக்கப்பட பொது அறக்கட்டளையால் பள்ளி நிர்வகிக்கப்படல் வேண்டும்.</li>
                <li>பள்ளி தனி நபர் இலாபத்திற்கோ, குழுக்களின் இலாபத்திற்கோ அல்லது கூட்டு நபர்கள் இலாபத்திற்கோ செயல்படல் கூடாது.</li>
                <li>பள்ளி வரவு செலவுக் கணக்குகள் பட்டயக் கணக்காயரால் முறைப்படி ஆய்வு செய்து நகல் அதிகாரப்பூர்வ அலுவலருககு அளித்தல் வேண்டும். இக்கணக்குகள் ஆண்டுதோறும் அங்கீகாரம் அளித்திட அதிகாரம் பெற்ற அலுவலர்களுக்கு அனுப்பி வைக்கப்பட வேண்டும்.</li>
                <li>பள்ளி அங்கீகார குறியீட்டு எண் அனைத்து கடிதத் தொடர்பிலும் தவறாது குறிப்பிடப்பட வேண்டும்.</li>
                <li>துறையால் அவ்வப்போது கோரப்படும் அறிக்கைகள் / தகவல்களையும் பள்ளி நிர்வாகம் உடனுக்குடன் அனுப்பி வைக்க வேண்டும். பள்ளி அங்கீகாரத்தை நிறைவு செய்திடவும் / பள்ளி நடைமுறையில் எழும் சிக்கல்களை நிவர்த்தி செய்து பள்ளி தொடர்ந்து நடைபெற நிர்வாகத்தால் / அரசால் அவ்வப்போது வழங்கப்படும் அறிவுரைகளை பள்ளி நிர்வாகம் கண்டிப்பாக கடைபிடிக்க வேண்டும்.</li>
                <li>இவ்வாணையில் கூறப்பட்டுள்ள சட்டங்கள், விதிகள், மற்றும் வரையறைகள் மற்றும் அங்கீகாரத்திற்கு விதிக்கப்பட்ட நிபந்தனைகளை மீறியதாக கண்டறியப்படும் பட்சத்தில் இந்த அங்கீகார ஆணை திரும்ப பெறப்படும்.</li>
                <li>இலவச கட்டாயக் கல்வி உரிமைச் சட்டம் 2009ன் படி எல்.கே.ஜி. முதல் 5 வகுப்புகள் வரை ஒவ்வொரு பிரிவிலும் அதிகபட்சமாக 30 மாணவர்கள், 6 முதல் 8 வகுப்புகள் வரை அதிகபட்சமாக 35 மாணவர்கள் மட்டுமே சேர்க்கப்பட வேண்டும்.</li>
                <li>தமிழ்நாடு பள்ளிகள் (கட்டணங்கள் வசூலித்தலை ஒழுங்குப்படுத்துதல்) சட்டம் 2009ன் படி பள்ளிக்கு கட்டண நிர்ணயக்குழு நிர்ணயித்த கட்டணம் மட்டுமே மாணவர்களிடமிருந்து கட்டணமாக வசூலிக்க வேண்டும்.</li>
                <li>பள்ளிகளில் பாதுகாப்பு நலன் கருதி கடைப்பிடிக்கப்பட வேண்டிய நெறிமுறைகள் சார்ந்து அரசு வெளியிட்டுள்ள அரசாணை எண்.131 பள்ளிக் கல்வி (எக்ஸ் 2)துறை, நாள்.10.09.2006ல் தெரிவிக்கப்பட்டுள்ளது. அந்நெறிமுறைகளைத் தவறாமல் பின்பற்ற வேண்டும். மேலும் துறையால் அவ்வப்போது வழங்கப்படும் அறிவுரைகள், நிபந்தனைகள் அனைத்தும் பள்ளியின் நிர்வாகத்தால் தவறாது கடைப்பிடிக்கப்பட வேண்டும்.</li>
				<li>எல்.கே.ஜி. முதல் 5 வகுப்புகள் வரை தரைத் தளத்தில் மட்டுமே செயல்பட வேண்டும்.</li>
				<li>இப்பள்ளி வளாகத்தில் இப்பள்ளி செயல்பாட்டினைத் தவிர வேறு கல்வி நிறுவனமோ அல்லது குடியிருப்புகளோ, வியாபார நோக்கு கொண்ட எந்த கடைகளோ அல்லது வேறு எந்த நிறுவனமோ செயல்படக் கூடாது-</li>
				<li>மாற்றுத் திறன் குழந்தைகளுக்காக சாய்தளம் (ramp) மற்றும் கைப்பிடிமான (handrails) வசதிகள் பள்ளி மற்றும் கழிப்பறைகளில் ஏற்படுத்தப்பட வேண்டும்.</li>
				<li>இவ்வங்கீகாரம் முடிவடையும் நாளுக்கு, மூன்று மாதங்களுக்கு முன்னரே தொடர் அங்கீகாரம் கோரும் கருத்துரு உரிய அனைத்து விவரங்கள் மற்றும் இணைப்புகளுடன் தொடர் அங்கீகாரம் வழங்கும் அலுவலருக்கு சமர்ப்பிக்கப்பட வேண்டும்.</li>
				<li>அரசாணை எண் 270, ப.க. துறை, நாள் 22.10.2012 இல் உள்ள அனைத்து நிபந்தனைகளும் பூர்த்தி செய்யப்பட வேண்டும்.</li>
				<li>தமிழ்நாடு தமிழ் கற்பதற்கான சட்டம் 2006ன் படி ஒன்று முதல் 5ஆம் வகுப்பு வரை பகுதி-1இல் தமிழ் மட்டுமே மொழிப்பாடமாகக் கற்பிக்கப்பட வேண்டும்.</li>
				<li>NCTE விதிகளின்படி நிர்ணயம் செய்யப்பட்ட கல்வித் தகுதியை ஆசிரியர்கள் பெற்றிருக்க வேண்டும்.</li>
                
            </ol>
        </p>
		
		<p style="text-align:center;text-indent:2em;text-decoration:underline;">சிறப்பு நிபந்தனைகள்
            <ol>
                <li>அரசாணை எண்.131 பள்ளிக் கல்வித் துறை, நாள்.10.08.2006 இன் படி எளிதில் தீப்பற்றும் அமைப்பு பள்ளியில் இருக்கக்கூடாது.</li>
                <li>அரசாணை எண் 175, பள்ளிக் கல்வித் துறை நாள்.20.07.2017ன்படி பள்ளியில் பயிலும் ஒவ்வொரு குழந்தைக்கும் 10 சதுர அடி இடப்பரப்பும், ஒவ்வொரு வகுப்பறையிலும் ஆசிரியருக்கு 40 சதுர அடி இடப்பரப்பும் உள்ளதை உறுதி செய்ய வேண்டும்.</li>
				<li>தீயணைப்பு மற்றும் மீட்பு பணித் துறை தடையின்மைச் சான்று, சுகாதாரச் சான்று ஆகியவற்றை உடன் புதுப்பித்து முன்னிலைப்படுத்தப்பட வேண்டும்.</li>
				<li>தமிழ்நாடு தனியார் பள்ளிகள் கல்விக் கட்டணம் குழு நிர்ணயம் செய்யப்பட்டதற்கான ஆணை பெறுவதற்கு விண்ணப்பிக்கும் போது துவக்க அனுமதியின் ஆணை / தொடர் அங்கீகாரத்திற்கான ஆணையின் நகல் தனியார் பள்ளிகள் கல்வி கட்டண நிர்ணய குழுவிற்கு முன்னிலைப்படுத்த வேண்டும் என்ற நிபந்தனையில் துவக்க அனுமதி வழங்கப்படுகிறது.</li>
				<li>தங்கள் பள்ளியில் பணிபுரியும் ஆசிரியர்கள் மற்றும் அனைத்து பணியாளர்களுக்கும் ஊதியம் ECS மூலமாகவே பெற்று வழங்கப்பட வேண்டும்.</li>
				<li>சம்மந்தப்பட்ட முதன்மைக் கல்வி அலுவலர் ஆய்வின் போது அனைத்து சிறப்பு நிபந்தனைகளையும் பூர்த்தி செய்துள்ளார்களா என்று உறுதி செய்யப்பட வேண்டும் எனவும் மாவட்டக் கல்வி அலுவலர்களுக்கு தொடர் ஆங்கீகாரம் வழங்குவதற்கு முன் இதன் சார்பான ஆவணங்கள் அனைத்தையும் பூர்த்தி செய்துள்ளார்களா என்பது சார்பான அறிவுரைகளையும் வழங்கப்பட வேண்டும்.</li>
				<li>தமிழ்நாடு அரசிதழ் எண் 274, நாள் 30.09.2012 இல் வெளியிடப்பட்டுள்ள தமிழ்நாடு மோட்டார் வாகனங்கள் (பள்ளி வாகனங்கள் முறைப்படுத்துதல் மற்றும் கட்டுப்படுத்துதல்) சிறப்பு விதிகள், 2012, இல் குறிப்பிடப்பட்ட அனைத்து வரைமுறைகளையும் பின்பற்றப்பட வேண்டும் என்பதை உறுதிசெய்யப்பட வேண்டும்.</li>
				<li>தொடர் அங்கீகாரம் பெறுவதற்கு முன்கூட்டியே உள்ளூர் திட்ட குழுமத்தின் கட்டிட வரைபடத்திற்கான ஒப்புதலினை பெற்று முன்னிலைப்படுத்தப்பட வேண்டும் என்ற
				நிபந்தனையில் துவக்க அனுமதி வழங்கப்படுகிறது.</li>
				<li>சென்னை உயர்நீதிமன்ற வழக்கு எண். டபிள்யு.ப்பி.எண் 17178/2018 மற்றும் நிலுவையில் உள்ளதால் வழக்கின் இறுதி தீர்ப்புக்கு உட்பட்டு துவக்க அனுமதி வழங்கப்படுகிறது.</li>
				<li>மாணவ மற்றும் மாணவியரின் எண்ணிக்கைக்கேற்ப போதுமான எண்ணிக்கையில் கழிப்பறைகளை ஏற்படுத்த வேண்டும். பள்ளி மாணவ மற்றும் மாணவியரின் கழிவறையின் மேற்கூரை டின் சீட்டு அகற்றப்பட்டு ஆர்.சி.சி. கூரையாக கட்டி முடிக்கப்பட்டு, தொடர் அங்கீகாரம் பெற விண்ணப்பிக்கும் போது அது சார்ந்த புகைப்படம் முன்னிலைப்படுத்தப்பட வேண்டும்.</li>
				
				<?php
                    if($comment['comment']!=null){
                ?>
                <li><?php echo($comment['comment']); ?></li>
                <?php
                    }
                ?>
			</ol>
		</p>
		
        <p style="text-indent:2em;page-break-before: always;">ஒரு பள்ளியில் கூடுதல் வகுப்பு துவங்க அனுமதித்தல், தரம் உயர்த்துதல் போன்றவை எவ்வாறு மாணாக்கர் நலன் சார்ந்ததோ, அவ்வாறே பள்ளியில் பயிலும் மாணாக்கர்கள் பாதுகாப்பாக கல்வி பயில்வதும், அதனை உறுதி செய்வதும் பள்ளியின் தாளாளர் மற்றும் ஆசிரியர்களின் கடமையாகும்.
		எனவே மேற்குறிப்பிட்டுள்ள 1 முதல் 9 வரையுள்ள சிறப்பு நிபந்தனைகளை பள்ளி நிர்வாகம் தொடர்
		அங்கீகாரத்திற்குக் கருத்துரு அனுப்பும் முன்பு நிவர்த்தி செய்ய வேண்டும் என தெரிவிக்கப்படுகிறது-</p>
		<table style="border: 1px solid black;border-collapse: collapse;">
			<thead >
				<tr>
					<td style="border: 1px solid black;">பதிவு எண்.</td>
					<td style="border: 1px solid black;">பள்ளியின் பெயர் மற்றும் முகவரி</td>
					<td style="border: 1px solid black;">அங்கீகாரம் கோரும் வகுப்புகள்</td>
					<td style="border: 1px solid black;">துவக்க அங்கீகாரம் கோரும் காலம்</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="border: 1px solid black;"><?php echo($rc);?></td>
					<td style="border: 1px solid black;"><strong><?php echo($renew[0]['school_name']); ?></strong>,
							<strong>UDISE:<?php echo($renew[0]['udise_code']); ?>,</strong>
							<?php $add=explode('\n',$renew[0]['address']); echo($add[0]); ?>,
							<?php echo($add[1]); ?>,- <?php echo($renew[0]['pincode']);?>
							<?php echo($renew[0]['district_name']); ?>  மாவட்டம்</td>
					<td style="border: 1px solid black;"><?php echo($renew[0]['low_class']." முதல் ".$renew[0]['high_class']); ?> ஆம்  வகுப்புகள் வரை</td>
					<td style="border: 1px solid black;"><strong><?php if($renew[0]['vaild_from']!=null){echo(date("d.m.Y",strtotime($renew[0]['vaild_from']))); ?></strong> முதல் <strong><?php echo(date("d.m.Y",strtotime($renew[0]['vaild_upto'])));}?></strong> வரை</td>
				</tr>
			</tbody>
		</table>
    </div>
    <div id="footer">
        <div style="float:left;width:380px;">
			<div >
				பெறுநர்
				<div style="width:100%;">
					<ol type="1">
						<li>
							<strong><?php echo($renew[0]['school_name']); ?></strong>,<br />
							<strong>UDISE:<?php echo($renew[0]['udise_code']); ?>,</strong><br />
							<?php $add=explode('\n',$renew[0]['address']); echo($add[0]); ?>,<br />
							<?php echo($add[1]); ?>,<br />
							<?php echo($renew[0]['district_name']); ?> - <?php echo($renew[0]['pincode']); ?><br/>
							முதன்மைக்கல்வி அலுவலர், <?php echo($renew[0]['district_name']); ?> மாவட்டம்
						</li>
					</ol>
				</div>
				<div style="width:100%;margin-left:-10px;padding:0;">
					<div style="width:200px;float:left;height:60px;display:inline-block;">
						<ol start="2">
							<li>சார்ந்த மாவட்டக் கல்வி அலுவலர்</li>
							<li>அலுவலர்</li>
						</ol>
					</div>
					<div style="width:23px;float:left;height:60px;display:inline-block;border-right:1px solid black;border-top:1px solid black;border-bottom:1px solid black;margin:0 7px;">
					</div>
					<div style="width:140px;float:right;height:60px;display:inline-block;margin-right:3px;">
						<p>(முதன்மைக் கல்வி 
						அலுவலர் மூலமாக)</p>
					</div>
					<div style="clear:both"></div>
				</div>

			</div>
            <div style="clear:both;">
				நகல்:<ol style="margin-top:0;">
					<strong><?php echo($renew[0]['school_name']); ?></strong>,
							<strong>UDISE:<?php echo($renew[0]['udise_code']); ?>,</strong>
							<?php $add=explode('\n',$renew[0]['address']); echo($add[0]); ?>,
							<?php echo($add[1]); ?>,- <?php echo($renew[0]['pincode']);?>
							<?php echo($renew[0]['district_name']); ?>  மாவட்டம்
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
        <div style="display:inline-block;float:right;width:257px;text-align:right;">
            <p style="line-height:0.2em;"><strong><?php echo($officer); ?></strong></p>
            <p><?php echo($officercat); ?></p>
        </div>
    </div>
</div>
<?php }else{
    echo("<h1>Application is Approved. Udise Code Not Mapped. Wait Till Mapping Completed.</h1>");
} ?>
<script>
        window.onload=function(){
            var tan_idx=document.getElementById("tami_index");
			tan_idx.style.listStyleType="none";
            var str=null;
            var arrList=[0,1,2,3,4,5,6,7,8,9,'A','E','F'];
            for(var i=0;i<tan_idx.children.length;i++){
                str="\""+"\\0028\\0B8"+(arrList[5+i])+"\\0029"+"\"";
                //str="\""+"\\0B8"+(arrList[5+i])+"\"";
                tan_idx.children[i].pseudoStyle("before","content",str);
                tan_idx.children[i].pseudoStyle("before","padding-right","5px");
                //alert(str);
                //tan_idx.children[i].style.content=str;
            }
        }
        
        var UID = {
        	_current: 0,
        	getNew: function(){
        		this._current++;
        		return this._current;
        	}
        };
        
        HTMLElement.prototype.pseudoStyle = function(element,prop,value){
        	var _this = this;
        	var _sheetId = "pseudoStyles";
        	var _head = document.head || document.getElementsByTagName('head')[0];
        	var _sheet = document.getElementById(_sheetId) || document.createElement('style');
        	_sheet.id = _sheetId;
        	var className = "pseudoStyle" + UID.getNew();
        	
        	_this.className +=  " "+className; 
        	
        	_sheet.innerHTML += " ."+className+":"+element+"{"+prop+":"+value+"}";
        	_head.appendChild(_sheet);
        	return this;
        };
    </script>
</body>
</html>