<?php //print_r($alllist); ?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <?php $this->load->view('head.php'); ?>
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
</head>
<!-- END HEAD -->

<body class="page-container-bg-solid page-md">
    <div class="page-wrapper">
          <?php  
                if($this->session->userdata('emis_district_id')!=''){
                    $this->load->view('Ceo_District/header.php');
                }
                else{
                    $this->load->view('Deo_District/header.php'); 
                }
          ?>
            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <div class="page-container">
                       <!-- BEGIN CONTENT -->
                      <div class="page-content-wrapper">
                        <!-- BEGIN CONTENT BODY -->
                        <!-- BEGIN PAGE HEAD-->
                        <div class="page-head">
                            <div class="container">
                                <!-- BEGIN PAGE TITLE -->
                                <div class="page-title"><h1>Renewal Status</h1></div>
                                <!-- END PAGE TITLE -->
                                <!-- BEGIN PAGE TOOLBAR -->
                                <div class="page-toolbar"><!-- BEGIN THEME PANEL --><!-- END THEME PANEL --></div>
                                <!-- END PAGE TOOLBAR -->
                            </div>
                        </div>
                            
                             <!-- BEGIN PAGE CONTENT BODY -->
                        <div class="page-content"> 
                            <div class="container" style="width: 95%;">
                                <!-- BEGIN PAGE CONTENT INNER -->
                                <div class="page-content-inner">
                                    <!--<center> <?php //$this->load->view('district/emis_district_profile_header.php'); ?></center>-->
                                    <!-- BEGIN BLOCK BUTTONS PORTLET-->
                                    <div class="portlet light col-md-12">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="icon-settings font-green-sharp"></i>
                                                <span class="caption-subject font-green-sharp bold uppercase">LIST OF APPLIED SCHOOLS - RENEWAL</span>
                                            </div>
                                            <!--<div class="actions">
                                                <span class="caption-subject  bold uppercase" style="color: #ec1358;">Note: Yet to come</span>
                                            </div>-->
                                        </div>
                                        
                                        <div class="portlet-body col-md-12">
                                                 
                                                 <div class="accordion" id="accordionExample">
                                                    <div class="card z-depth-0 bordered">
                                                        <div class="card-header" id="headingOne">
                                                             <h5 class="mb-0">
                                                                 
                                                                 <ul class="list-group">
                                                                    <?php
                                                                        $schid=0;$alschid=array(); 
                                                                        foreach($alllist as $list) {
                                                                            if(!in_array($list['school_key_id'],$alschid)){
                                                                                $schid=$list['school_key_id'];
                                                                                array_push($alschid,$list['school_key_id']);
                                                                            }
                                                                            else{
                                                                                continue;
                                                                            }
                                                                            
                                                                            
                                                                            /*if($schid==$list['school_key_id']){
                                                                                continue;
                                                                            }
                                                                            else{
                                                                                $schid=$list['school_key_id'];
                                                                            }*/
                                                                            
                                                                            $setstyle=$setbuttontext='';
                                                                            $directorate_dee=array(16,18,27,29,32,34);
                                                                            //Pending
                                                                            
                                                                            switch($list['approvedby']){
                                                                                        case -3:$p=-3;$pen='REJECTED : ';break;
                                                                                        case -2:$p=-2;$pen='Queried : ';break;
                                                                                        case -1:$p=-1;$pen='Queried : ';break;
                                                                                        case 1:$p=1;$pen='APPROVED :';break;
                                                                                        case 2:$p=2;$pen='Days Pending-CEO : ';break;
                                                                                        case 3:$p=3;$pen='Days Pending-DEO : ';break;
                                                                                         default:{
                                                                                            if(!in_array($list['sch_directorate_id'],$directorate_dee)){
                                                                                                $p=0;$pen='Days Pending-DEO : ';
                                                                                            }
                                                                                            else{
                                                                                                $p=0;$pen='Days Pending-BEO : ';
                                                                                            }
                                                                                        }
                                                                                        
                                                                                    }
                                                                            if($list['vaild_from']=='0000-00-00' && $list['vaild_upto']=='0000-00-00'){$pen="REJECTED";}
                                                                            elseif($list['vaild_from']!=null && $list['vaild_upto']!=null){$pen="APPROVED";}
                                                                            else{$pen.=$list['pending'];}
                                                                            
                                                                    ?>
                                                                        
                                                                    <li class="list-group-item">
                                                                        
                                                                        <a class="link-unstyled collalpsed" data-toggle="collapse" 
                                                                        data-target="#<?php echo $list['id']; ?>" aria-expanded="false" aria-controls="<?php echo $list['school_id']; ?>" 
                                                                        href="#"><strong><?php  echo $list['udise_code']; ?> - <?php  echo $list['school_name']; ?></strong></a>
                                                                        <span class="badge"><?php echo($pen); ?></span>
                                                                        <a href="<?php echo base_url().'Basic/emis_school_details_entry/1/'.$list['school_key_id']?>" target="_blank"><span class="badge"><?php echo("Profile"); ?></span></a>
                                                                        <!--<span class="badge">Renewal Order</span>
                                                                        <span class="badge">Status</span>
                                                                        <span class="badge">DEO Approval Days-<?php   ?></span>
                                                                        <span class="badge">BEO Approval Days-<?php echo($list['apptimestamp']); ?></span>
                                                                        <span class="badge">Applied Date-<?php  echo date("Y-m-d",strtotime($list['createddate'])); ?></span>-->
                                                                        <br/>
                                                                        <br/>
                                                                        
                                                                        <form method="post" action="<?php echo base_url().'Block/RenewalStatus/'.$list['id'];?>" enctype="multipart/form-data" id="<?php echo $list['id'].$list['school_key_id']; ?>">
                                                                        <ul id="<?php echo $list['id']; ?>" class="list-group collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                             <table class="table card-body">
                                                                                    <tr>
                                                                                        <td colspan="2">
                                                                                            <div class="col-md-12">
                                                                                            <div class="col-md-6">
                                                                                            <label>Status of Conditions laid in Previous Recognition Order : <strong><?php echo($list['conditionstatisfied']); ?></strong></label>
                                                                                            </div>
                                                                                            <div class="col-md-6" style="text-align: center;">
                                                                                            <label>Validity</label>
                                                                                            </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td colspan="7"><strong>Remarks</strong></td>
                                                                                    </tr>
                                                                                    <tr >
                                                                                        <td>Year of Last/Previous Recognition. </td>
                                                                                        <!--<td>
                                                                                            <label>Validated:</label>
                                                                                            <input type="checkbox" id="view1" name="viewlastrec" />
                                                                                        </td>-->
                                                                                         <td>
                                                                                            <div class="col-md-12">
																								<div class="col-md-6">
                                                                                                    <span class="badge" style="cursor: pointer;" onclick="popuppdf('<?php echo $list['lastrenewal_filepath'];?>');">
                                                                                                         <?php echo (substr($list['lastrenewal_filename'],0,30));?>
                                                                                                    </span>
                                                                                                    </div>
																							
																								<div class="col-md-6">
																									<input type="date" class="form-control" id="file_exp_<?php echo($list['id']); ?>" name="file_exp_<?php echo($list['id']); ?>"  value="<?php echo($list['file_exp']); ?>"/>
																								</div>
																							</div>
                                                                                        </td>
                                                                                       
                                                                                        <td colspan="6">
                                                                                            <textarea id="year_rec_remarks" name="year_rec_remarks" onfocus="textvalidate(this.id,'remarksvalidate');" onchange="textvalidate(this.id,'remarksvalidate');" class="form-control" onkeypress="return (event.charCode >=48 && event.charCode <=57) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 65 && event.charCode <= 90) || event.charCode == 8 || event.charCode == 32 || event.charCode == 44 || event.charCode == 46"><?php echo($list['year_rec_remarks']); ?></textarea>
                                                                                            <font style="color:#dd4b39;" id="remarksvalidate1_<?php echo($list['id']) ?>"></font>
                                                                                            </td>
                                                                                        <!--<td><label>Remarks: <font style="color:#dd4b39;">*</font></label></td>
                                                                                        <td>
                                                                                            
                                                                                            <textarea id="year_rec_remarks" name="year_rec_remarks" onfocus="textvalidate(this.id,'remarksvalidate');" onchange="textvalidate(this.id,'remarksvalidate');" class="form-control" onkeypress="return (event.charCode >=48 && event.charCode <=57) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 65 && event.charCode <= 90) || event.charCode == 8 || event.charCode == 32 || event.charCode == 44 || event.charCode == 46"></textarea>
                                                                                            <font style="color:#dd4b39;" id="remarksvalidate"></font>
                                                                                        </td>-->
                                                                                       
                                                                                    </tr>
                                                                                    <tr >
                                                                                        <td>
                                                                                            Fees And Challan Details.
                                                                                        </td>
                                                                                        <!--<td>
                                                                                            <label>Validated:</label>
                                                                                            <input type="checkbox" id="view1" name="viewlastrec" />
                                                                                        </td>-->
                                                                                         <td>
																							<div class="col-md-12">
																								<div class="col-md-6">
																									<span class="badge" style="cursor: pointer;" onclick="popuppdf('<?php echo $list['challan_filepath'];?>');">
																										<?php echo (substr($list['challan_filename'],0,30));?>
																									</span>
																								</div>
																								<div class="col-md-6">
																									<!--<input type="date" class="form-control" id="file_exp_<?php echo($list['id']); ?>" name="file_exp_<?php echo($list['id']); ?>" />-->
																								</div>
																							</div>
                                                                                        </td>
                                                                                      
                                                                                        <td>
                                                                                            <strong><p style="line-height:.3em;">Amount   : <?php echo $list['amount'];?></p>
                                                                                            <p style="line-height:.3em;">Challan No.: <?php echo $list['challan_no'];?></p>
                                                                                            <p style="line-height:.3em;">Challan Date   : <?php echo date("d.m.Y",strtotime($list['challan_date']));?></p></strong>
                                                                                            
                                                                                        </td>
                                                                                       
                                                                                    </tr>
                                                                                    <?php   $cerc=0;$filedt='0000-00-00'; 
                                                                                        foreach($alllist as $cer) { 
                                                                                            if($cerc==$cer['certificate_id'] && $schid==$cer['school_key_id']){
                                                                                                continue;
                                                                                            }
                                                                                            elseif($cerc<$cer['certificate_id'] && $schid==$cer['school_key_id']){
                                                                                                $cerc=$cer['certificate_id'];
                                                                                            }
                                                                                            elseif($schid==$cer['school_key_id']){
                                                                                                break;
                                                                                            }
                                                                                            else{
                                                                                                continue;
                                                                                            }
                                                                                        ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                           <?php echo($cer['certificatename']) ?>
                                                                                        </td>
                                                                                        <td >
                                                                                                <?php  $cep=0;
                                                                                                        foreach($alllist as $cerpdf) {
                                                                                                            if($cerc==$cerpdf['certificate_id'] && $cep!=$cerpdf['fileid'] && $schid==$cerpdf['school_key_id']){ 
                                                                                                                    $cep=$cerpdf['fileid'];
                                                                                                    ?>
                                                                                                    <div class="col-md-12">
																										  <div class="col-md-6">
                                                                                                           <span class="badge" style="cursor:pointer;" onclick="popuppdf('<?php echo $cerpdf['certificate_filepath']; ?>');">
                                                                                                            <?php echo(substr($cerpdf['certificate_filename'],0,20)); ?>
                                                                                                           </span>
                                                                                                           </div>
                                                                                                           <div class="col-md-6">
                                                                                                             <input type="date" class="form-control" id="file_exp_<?php echo($cerpdf['fileid']); ?>" name="file_exp_<?php echo($cerpdf['fileid']); ?>" value="<?php echo($cerpdf['certificate_exp']); ?>"/>
																									       </div>
																									</div>
                                                                                                        <?php }
                                                                                                         if(strtotime($cerpdf['certificate_exp'])<strtotime($filedt)){
                                                                                                            $filedt=$cerpdf['certificate_exp'];
                                                                                                         }
                                                                                                         elseif($filedt=='0000-00-00'){
                                                                                                            $filedt=$cerpdf['certificate_exp'];
                                                                                                         }
                                                                                                    
                                                                                                    } ?>
                                                                                        </td>
                                                                                        <td colspan="7">
                                                                                            <textarea id="remarks_<?php echo($cer['certificate_id']."_".$cer['id']); ?>" name="remarks_<?php echo($cer['certificate_id']."_".$cer['id']); ?>" class="form-control" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);" onkeypress="return (event.charCode >=48 && event.charCode <=57) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 65 && event.charCode <= 90) || event.charCode == 8 || event.charCode == 32 || event.charCode == 44 || event.charCode == 46"><?php echo($cer['beo_certificateremarks']); ?></textarea>
                                                                                            <font style="color:#dd4b39;" id="remarksvalidate1_<?php echo($list['id']) ?>"></font>
                                                                                        </td>
                                                                                       
                                                                                        <!--<td>
                                                                                            <label>Validated:</label>
                                                                                            <input type="checkbox" id="view1" name="viewlastrec" />
                                                                                        </td>
                                                                                        <td>
                                                                                            <input type="file" class="form-control" accept=".jpg,.jpeg,.doc,.docx,.pdf" id="build_stab_file" name="build_stab_file[]" multiple="mulitple" onchange="ExtSize(this.id,'correct');" />
                                                                                            
                                                                                            <font style="color:#dd4b39;" id="correct"></font>
                                                                                        </td>
                                                                                        <td><label>Remarks: <font style="color:#dd4b39;">*</font></label></td>
                                                                                        <td>
                                                                                            
                                                                                            <textarea id="remarks_<?php echo($cer['certificate_id']."_".$cer['id']); ?>" name="remarks_<?php echo($cer['certificate_id']."_".$cer['id']); ?>" class="form-control" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);" onkeypress="return (event.charCode >=48 && event.charCode <=57) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 65 && event.charCode <= 90) || event.charCode == 8 || event.charCode == 32 || event.charCode == 44 || event.charCode == 46"></textarea>
                                                                                            <font style="color:#dd4b39;" id="remarksvalidate1_<?php echo($list['id']) ?>"></font>
                                                                                        </td>-->
                                                                                        
                                                                                         
                                                                                    </tr>
                                                                                    <?php 
                                                                                        
                                                                                    } $ceo=($this->session->userdata('usertype1')==2?1:2);?>
                                                                                    
                                                                                    
                                                                                       <!-- <td>BEO Document / Photograph</td>-->
                                                                                      
                                                                                            <?php 
                                                                                                    $temp=0;
                                                                                                    //$directorate_dee=array(16,18,27,29,32,34);
                                                                                                    if(in_array($list['sch_directorate_id'],$directorate_dee)){
                                                                                                        $temp=1;
                                                                                                    }
                                                                                                    
                                                                                                    $cem=0;$arr=[];$check=0;$z=0;
                                                                                                    foreach($alllist as $ceom){
                                                                                                        if($cem!=$ceom['approvedby'] && $ceom['school_key_id']==$schid){
                                                                                                            foreach($arr as $key => $value){
                                                                                                                if($value==$ceom['approveid']){
                                                                                                                    $check=1;
                                                                                                                    break;
                                                                                                                }
                                                                                                            }
                                                                                                            if($check==0 && $ceom['approvedby']!=null){
                                                                                                                $cem=$ceom['approvedby'];
                                                                                                                $arr[$z++]=$ceom['approveid'];
                                                                                                                switch($ceom['approvedby']){
                                                                                                                    case 1:$txt='CEO Inspection / Photograph';break;
                                                                                                                    case 2:$txt='DEO Inspection / Photograph';break;
                                                                                                                    case 3:$txt='BEO Inspection / Photograph';break;
                                                                                                                    case -1:$txt='CE0 Inspection / Photograph';break;
                                                                                                                    case -2:$txt='DEO Inspection / Photograph';break;
                                                                                                                    case -3:$txt='REJECTED DIRECTLY TO SCHOOL';break;
                                                                                                                }
                                                                                                                $finaltxt=(($ceom['approvedby']==1 || ($temp==1 && $ceom['approvedby']==2))?base_url().'Basic/pdf/'.$ceom['school_key_id']:'');
                                                                                                                
                                                                                                                if($temp==1 && $ceom['approvedby']==2){$distxt='DEO ';}elseif($ceom['approvedby']==1){$distxt='CEO';}
                                                                                                                
                                                                                                                if($ceom['approvedby']==1 || ($temp==1 && $ceom['approvedby']==2)){$finaltxt='<span class="badge" style="cursor: pointer;" onclick="popuppdf(\''.$finaltxt.'\');">'.$distxt.'-APPROVAL</span>';}else{$finaltxt='';}
                                                                                                                echo('<tr>
                                                                                                                            <td>'.$txt.' Inspection / Photograph</td>
                                                                                                                            <td>
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="col-md-6">
                                                                                                                                        <span class="badge" style="cursor: pointer;" onclick="popuppdf(\''.$ceom['approvefilepath'].'\');">'.$ceom["approvefile"].'</span>'.$finaltxt.'
                                                                                                                                    </div>
                                                                                                                                    <div class="col-md-6">
                                                                                                                                        <strong>'.$ceom["filenumber"].' - /Dt:'.date("d:m:Y h:i:s",strtotime($ceom["ts"])).'</strong>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </td>
                                                                                                                                <td colspan="3"><strong>'.($ceom['approvedby']>0?$ceom['approveremarks']:'REJECTED').'</strong></td>
                                                                                                                         </tr>'
                                                                                                                );
                                                                                                            }   
                                                                                                        }
                                                                                                    }
                                                                                                    
                                                                                            ?>
                                                                                        
                                                                                           <!--<tr>
                                                                                                 <td><strong>School Remarks</strong></td>
                                                                                                 <td>School Declearation Remarks</td>
                                                                                                 <td></td>
                                                                                              </tr>-->                                                                                                                                                             
                                                                                     <?php if($list['vaild_from']==null && $list['vaild_upto']==null){ ?>                                                                                                                                                                        
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label>Inspection Documents/Photograph, if any</label>
                                                                                            <input type="file" class="form-control" accept=".jpg,.jpeg,.doc,.docx,.pdf" id="files_<?php echo($list['id']); ?>" name="files_<?php echo($list['id']); ?>" onchange="ExtSize(this.id,'correct');" />
                                                                                            <font style="color:#dd4b39;" id="correct"></font>
                                                                                            <?php 
                                                                                                if(($ceo==1 || $temp==1) && $list['contidion_file']=='') { ?>
                                                                                                <label>Condition Document, if any</label>
                                                                                                <input type="file" class="form-control" accept=".jpg,.jpeg,.doc,.docx,.pdf" id="condition_<?php echo($list['id']); ?>" name="condition_<?php echo($list['id']); ?>" onchange="ExtSize(this.id,'correct');" />
                                                                                                <font style="color:#dd4b39;" id="correct"></font>
                                                                                            <?php } elseif( $list['contidion_file']!=''){?>
                                                                                                 <label>Condition Document, if any</label>
                                                                                                 <span class="badge" style="cursor:pointer;" onclick="popuppdf('<?php echo $list['contidion_file']; ?>');">
                                                                                                 Condition Document
                                                                                                 </span>
                                                                                            <?php } ?>
                                                                                        </td>
                                                                                        <td>
                                                                                           <div class="col-md-12">
                                                                                                <div class="col-md-3">
                                                                                                    <label>File Number</label><font style="color:#dd4b39;">*</font>
                                                                                                    <input type="text" class="form-control" required id="fileno_<?php echo($list['id']) ?>" name="fileno_<?php echo($list['id']) ?>" onkeypress="return (event.charCode >=45 && event.charCode <=57) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 65 && event.charCode <= 90) || event.charCode == 8 || event.charCode == 32 || event.charCode == 44"/>
                                                                                                </div>
                                                                                                <?php 
                                                                                                    if($ceo==1 || $temp==1) {  $setbuttontext="Approve";?>
                                                                                                <div class="col-md-5">
                                                                                                    <label>Valid From</label><font style="color:#dd4b39;">*</font><input type="date" class="form-control" id="validfrom_<?php echo($list['id']); ?>" name="validfrom_<?php echo($list['id']); ?>" min="<?php echo(date('Y-m-d',strtotime($list['file_exp']))); ?>" required />
                                                                                                    <label>Valid Upto</label><font style="color:#dd4b39;">*</font><input type="date" class="form-control" id="validupto_<?php echo($list['id']); ?>" name="validupto_<?php echo($list['id']); ?>" min="<?php echo(date('Y-m-d',strtotime("now+5hours30minutes"))); ?>" required />
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <label>Classes Start</label><font style="color:#dd4b39;">*</font>
                                                                                                    <select class="form-control" id="fromclass_<?php echo($list['id']); ?>" name="fromclass_<?php echo($list['id']); ?>" onchange="getChecking(this)" required>
                                                                                                        <option value="">Choose</option>
                                                                                                        <option value="15">PRE-KG</option>
                                                                                                        <option value="13">LKG</option>
                                                                                                        <option value="14">UKG</option>
                                                                                                        <option value="1">1</option>
                                                                                                        <option value="2">2</option>
                                                                                                        <option value="3">3</option>
                                                                                                        <option value="4">4</option>
                                                                                                        <option value="5">5</option>
                                                                                                        <option value="6">6</option>
                                                                                                        <option value="7">7</option>
                                                                                                        <option value="8">8</option>
                                                                                                        <option value="9">9</option>
                                                                                                        <option value="10">10</option>
                                                                                                        <option value="11">11</option>
                                                                                                        <option value="12">12</option>
                                                                                                    </select>
                                                                                                    <label>Upto Classes</label><font style="color:#dd4b39;">*</font>
                                                                                                    <select class="form-control" id="toclass_<?php echo($list['id']); ?>"  name="toclass_<?php echo($list['id']); ?>" required>
                                                                                                        <option value="">Choose</option>
                                                                                                        <option value="15">PRE-KG</option>
                                                                                                        <option value="13">LKG</option>
                                                                                                        <option value="14">UKG</option>
                                                                                                        <option value="1">1</option>
                                                                                                        <option value="2">2</option>
                                                                                                        <option value="3">3</option>
                                                                                                        <option value="4">4</option>
                                                                                                        <option value="5">5</option>
                                                                                                        <option value="6">6</option>
                                                                                                        <option value="7">7</option>
                                                                                                        <option value="8">8</option>
                                                                                                        <option value="9">9</option>
                                                                                                        <option value="10">10</option>
                                                                                                        <option value="11">11</option>
                                                                                                        <option value="12">12</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <?php }
                                                                                                else{
                                                                                                    $setstyle='style="visibility:hidden;"'; $setbuttontext="Forward";
                                                                                                }
                                                                                            ?>
                                                                                           </div>
                                                                                           
                                                                                        </td>
                                                                                        
                                                                                        <td>
                                                                                            <textarea id="beo_remarks_<?php echo($list['id']); ?>" name="beo_remarks_<?php echo($list['id']); ?>" class="form-control" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);" onkeypress="return (event.charCode >=48 && event.charCode <=57) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 65 && event.charCode <= 90) || event.charCode == 8 || event.charCode == 32 || event.charCode == 44 || event.charCode == 46"></textarea>
                                                                                            <font style="color:#dd4b39;" id="remarksvalidate_<?php echo($cer['id']); ?>"></font>
                                                                                            <input type="hidden" id="hidden_<?php echo($list['id']) ?>" name="hidden_<?php echo($list['id']) ?>" value="" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <?php
                                                                                        if($filedt!=null && $filedt!='0000-00-00'){
                                                                                            if(strtotime($filedt)<strtotime("now+5hours30minutes")){
                                                                                                //$disable="disabled";
                                                                                            }
                                                                                        }
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td colspan="3">
                                                                                            <div class="text-center">
                                                                                                <button type="button" value="submit" id="submit_<?php echo($list['id']); ?>" name="submit_<?php echo($list['id']); ?>" class="btn btn-success" onclick="document.getElementById('hidden_<?php echo($list['id']) ?>').value=<?php echo($ceo); ?>;<?php if($ceo==1 OR $temp==1){?>removeRequired(<?php echo($list['id']); ?>,0); <?php } ?>return checkRequired(this.form.id,'','recommed',popuprej,'Approved')" <?php echo($disable);  ?> ><?php echo($setbuttontext); ?></button>
                                                                                                <button type="button" <?php echo($setstyle); ?> value="reject" onclick="removeRequired(<?php echo($list['id']); ?>);return checkRequired(this.form.id,'','Reject',popreject,this.id)" ceo="<?php echo($ceo); ?>" id="reject_<?php echo($list['id']); ?>" name="reject_<?php echo($list['id']); ?>" class="btn btn-danger">Reject</button> 
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                <?php } ?>
                                                                            </table>
                                                                         </ul>
                                                                        </form>                                                                                                                            
                                                                    </li>
                                                                     <?php } ?>
                                                                 </ul>
                                                            </h5>
                                                        </div>
                                                    
                                                    </div>
  
  
                                                 </div> 
                                                 
                                              
                                                  
                                                 
                                                 
                                              <div id="myModal" class="modal">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    
                                                    <div class="modal-body" id="modalbody" style="width: 100%;">
	                                                  <span style="font-size: 28px;font-weight: bold;cursor: pointer; float:right;" onclick="closefile('myModal');">&times;</span>
		                                              <table class="table">
                                                        <tr>
                                                            <td>
                                                                <object id="viewpdf" style="width:100%; min-height:500px;" src="" ></object>
                                                            </td>
                                                        </tr>                                                      
                                                      </table>
                                                    </div>
                                                    </div>
                                                    </div>                                                                                                                                                                                                                        
                                              </div>  
                                               <div id="approvedialog" class="modal">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body" id="modalbody" style="width: 100%;">
	                                                            <span style="font-size: 28px;font-weight: bold;cursor: pointer; float:right;" onclick="closefile('poprejectaction');">&times;</span>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>                                                                                                                                                                                                                        
                                              </div> 
                                              <div id="poprejectaction" class="modal">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body" id="modalbody" style="width: 100%;">
	                                                            <span style="font-size: 28px;font-weight: bold;cursor: pointer; float:right;" onclick="closefile('poprejectaction');">&times;</span>
                                                                <table class="table">
                                                                    <tr>
                                                                        <td>
                                                                            <strong>To Whom The Rejection is</strong>
                                                                        </td>
                                                                        <td>
                                                                            <select id="rejectDelare" onchange="popreject(this.value)" class="form-control">
                                                                                <option>Select</option>
                                                                                <option value="-1">DEO</option>
                                                                                <option value="-2">BEO</option>
                                                                                <option value="-3">SCHOOL</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>                                                      
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>                                                                                                                                                                                                                        
                                              </div>                                          
                                        </div>
                                    </div>
                                </div>
                             </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        <?php $this->load->view('footer.php'); ?>
    </div>
    
    <?php $this->load->view('scripts.php'); ?>
    <script src="<?php echo base_url().'asset/js/block.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/js/vivekrao/generate.js';?>" type="text/javascript"></script>
    <script>
        function popuppdf(url) {
            //var xmlHttp = new XMLHttpRequest();
            //xmlHttp.open( "GET", url, true );
            //xmlHttp.open( "GET", url, false ); // false for synchronous request
            //xmlHttp.setRequestHeader("Content-Type","text/pdf");
            //xmlHttp.send();
             //alert(xmlHttp.responseText);
             document.getElementById('viewpdf').setAttribute('data',url);
            //document.getElementById('viewpdf').setAttribute('data',xmlHttp.responseText+'#toolbar=1');
            //document.getElementById('viewpdf').setAttribute('src',url+'#toolbar=1');
            document.getElementById('myModal').style.display='block';
            
        }
        function closefile(closeDialog) {
            document.getElementById(closeDialog).style.display='none';
        }
        
        function ExtSize(id,alertidcorrect){
          var a = document.getElementById(id); 
          var c = document.getElementById(alertidcorrect);
          var allowfile = a.value;
          var allowExtension = /(\.jpg|\.jpeg|\.doc|\.docx|\.pdf)$/i;
          if(!allowExtension.exec(allowfile)) {
                a.value='';
                c.innerHTML="Please upload file only for .jpeg/.jpg/.pdf/.doc/.docx extension <br>";
                return false;
            }else {
                 c.innerHTML = "";
            } 
             if(a.files.length > 0){
                for(var i=0; i<=a.files.length -1;i++)
                var fsize = a.files.item(i).size;
                    if((fsize > 2000000)){
                        c.innerHTML+='File size to Big. Limit 2MB to each file';
                    }
            }else {
                 c.innerHTML = "";
            }
        }
        
        function textvalidate(id,alertid){
				
					var text = document.getElementById(id);
					var alt = document.getElementById(alertid);
					if(text.value==''){
						alt.innerHTML="This field is required";
					}else {
						alt.innerHTML="";
					}
		}
        
        function popuprej(frm,txt='Recommended'){
            //alert(frm.id);
            swal({
            title: "Are you sure?",
            text: "You Have "+txt+"ed The Form",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, "+txt+"!",
            closeOnConfirm: false,
            showLoaderOnConfirm: true
            }, function(isConfirm){
                if (isConfirm) 
                    frm.submit();
                 else
                    swal("Cancelled", "Your cancelled the CheckList", "error");
        });	
        }
        
        
        function popreject(frm,btn){
            var ceo=document.getElementById(btn).getAttribute('ceo');
            if(ceo>0){
                if(ceo==1 || ceo==2){
                    document.getElementById('rejectDelare').setAttribute('onchange','comobochange("'+btn+'",this.value);popreject("'+frm.id+'","'+btn+'")');
                    document.getElementById('poprejectaction').style.display='block';
                }
                else{
                    alert('Permission Denied');
                }
                return false;
            }
            else{
                //alert(ceo);
                document.getElementById('hidden_'+btn.split('_')[1]).value=ceo;
                document.getElementById('poprejectaction').style.display='none';
                popuprej(document.getElementById(frm),'Reject')
                return true;
            }
        }      
        function removeRequired(allids,r=1){
            if(r){
                document.getElementById('toclass_'+allids).removeAttribute('required'); 
                document.getElementById('fromclass_'+allids).removeAttribute('required'); 
                document.getElementById('validfrom_'+allids).removeAttribute('required'); 
                document.getElementById('validupto_'+allids).removeAttribute('required');
            } 
            else{
                document.getElementById('toclass_'+allids).setAttribute('required','required'); 
                document.getElementById('fromclass_'+allids).setAttribute('required','required'); 
                document.getElementById('validfrom_'+allids).setAttribute('required','required'); 
                document.getElementById('validupto_'+allids).setAttribute('required','required'); 
            }
        }   
        function getChecking(node){
            var nodeidsp=node.id.split("_");
            var low=node.value;
            var futnod='toclass_'+nodeidsp[1]; //document.getElementById('toclass_'+nodeidsp[1]);
            var cls=0;
            if(low==15)
                low=-2;
            else if(low==14)
                low=-1;
            else if(low==13)
                low=0;
            //alert(low);
            for(var i=-2;i<=low;i++){
                if(i==-2)
                    cls=15;
                else if(i==-1)
                    cls=14;
                else if(i==0)
                    cls=13;
                else
                    cls=i;
                    
                $('#'+futnod+' option[value='+cls+']').prop('disabled', true);
            }
            //alert('Disabled');
        }    
        function comobochange(btn,val){
           document.getElementById(btn).setAttribute('ceo',val);
            return true;
        } 
    </script>
</body>
</html>