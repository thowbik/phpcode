<?php
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('head.php'); ?>
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
    
    <style>
        #list_items_renew li:hover{
            background-color:#ccc;
    background-size: 200% 100%;
    background-position:left bottom;
    margin-left:10px;
    transition:all .2s ease;
            -webkit-transition: all .2s linear;
          -moz-transition: all .2s linear;
          -o-transition: all .2s linear;          
        }
    </style>
    
</head>
<body class="page-container-bg-solid page-md">
    <div class="page-wrapper">
          <?php  
                if($this->session->userdata('emis_state_id')!=''){
                    $this->load->view('state/header.php');
                }elseif($this->session->userdata('emis_district_id')!=''){
                    $this->load->view('Ceo_District/header.php');
                }elseif($this->session->userdata('emis_deo_id')){
                    $this->load->view('Deo_District/header.php'); 
                }elseif($this->session->userdata('emis_block_id')){
                    $this->load->view('beo_Block/header.php'); 
                }
          ?>
            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <div class="page-container">
                      <div class="page-content-wrapper">
                        <div class="page-head">
                            <div class="container">
                                <div class="page-title"><h1><?PHP echo($title); ?></h1></div>
                                <div class="page-toolbar">
                                    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                                <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
                                                    <li role="presentation">
                                                        <a href="<?php echo base_url().'AllApprove/CheckForSubmission/'.$this->uri->segment(3,0).'/0'?>">
                                                            <span class="text">Waiting/Queued/Not Viewed</span><br/>
                                                        </a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a href="<?php echo base_url().'AllApprove/CheckForSubmission/'.$this->uri->segment(3,0).'/98'?>">
                                                            <span class="text">Approved</span><br/>
                                                        </a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a href="<?php echo base_url().'AllApprove/CheckForSubmission/'.$this->uri->segment(3,0).'/99'?>">
                                                            <span class="text">Rejected</span>
                                                        </a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a href="<?php echo base_url().'AllApprove/CheckForSubmission/'.$this->uri->segment(3,0).'/96'?>">
                                                            <span class="text">In Reset Queue</span>
                                                        </a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a href="<?php echo base_url().'AllApprove/CheckForSubmission/'.$this->uri->segment(3,0).'/97'?>">
                                                            <span class="text">Send To Reset Queue</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                </div>
                            </div>
                        </div>
                        <div class="page-content"> 
                            <div class="container" style="width: 95%;height:600px;overflow-y:auto;">
                                <div class="page-content-inner">
                                    <div class="portlet light col-md-12">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="icon-settings font-green-sharp"></i>
                                                <span class="caption-subject font-green-sharp bold uppercase"><?PHP echo($subtitle); ?>&nbsp;&nbsp;<span class="badge badge-danger" id="countBadge">35</span></span>
                                            </div>
                                        </div>
                                        <?php if($check!=-1){ ?>
                                        <div class="portlet-body col-md-12">
                                            <div class="<?php echo($this->session->flashdata('flashMsg')['cls']); ?>" role="alert" style="display:block;width:100%;">
                                                <?php echo($this->session->flashdata('flashMsg')['msg']); ?>
                                            </div>
                                            <div class="accordion" id="accordionExample">
                                                <div class="card z-depth-0 bordered">
                                                    <div class="card-header" id="headingOne">
                                                        <ul class="list-group" id="list_items_renew">
                                                            <?php 
                                                                //Group By School_id
                                                                $school_list = array();$key='school_key_id';
                                                                foreach($list as $val) {
                                                                    if(array_key_exists($key, $val)){
                                                                        $school_list[$val[$key]][] = $val;
                                                                    }else{
                                                                        $school_list[""][] = $val;
                                                                    }
                                                                }
                                                                $cntschools=count($school_list);
                                                                foreach($school_list as $school){
                                                                    //print_r($school);die();
                                                            ?>
                                                            <li class="list-group-item">
                                                                <a class="link-unstyled collalpsed" data-toggle="collapse" 
                                                                data-target="#collapse_<?php echo($school[0]['school_key_id']); ?>" aria-expanded="false" aria-controls="<?php ?>" 
                                                                href="#" onclick="openactive(this.parentNode)"><strong><?php echo($school[0]['udise_code']); ?> - <?php echo($school[0]['school_name']); ?></strong></a>
                                                                <span class="badge badge-<?php echo($school[0]['appcolor']); ?>" style="cursor: pointer;" onclick="pdfviewfrombage('<?php echo($school[0]['school_key_id']."','".$school[0]['appprocess']); ?>')"><?php echo($school[0]['appprocess']); ?></span><?php if($school[0]['appprocess']!='APPROVED' && $school[0]['appprocess']!='REJECTED'){ ?><span class="badge badge-info"><?php echo($school[0]['pending']); ?></span><?php } ?>
                                                                <?php if($check==4){$url='AllApprove/generateProfilePDF/';$checkbit="/2";}else{$url='AllApprove/generateProfilePDF/';$checkbit="/1";} ?>
                                                                <a href="<?php echo (base_url().$url.$school[0]['school_key_id'].$checkbit);?>" target="_blank">
                                                                    <span class="badge badge-primary">School Profile</span></a>

                                                                <ul id="collapse_<?php echo($school[0]['school_key_id']); ?>" class="list-group collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                    <form method="post" action="<?php echo (base_url().'AllApprove/submitApproval/'.$school[0]['id']);?>" enctype="multipart/form-data" id="">
                                                                        <div class="col-md-12 bg-primary" style="margin:10px 0;padding:5px 0;border-bottom:3px solid #f5f5f5;">
                                                                            <div class="col-md-3" style="text-align: center;"><strong>Certificate / Orders</strong></div>
                                                                            <div class="col-md-3" style="text-align: center;"><strong>Fees / Details</strong></div>
                                                                            <div class="col-md-3" style="text-align: center;"><strong>Files / Validity</strong></div>
                                                                            <div class="col-md-3" style="text-align: center;"><strong>Comments/Remarks</strong></div>
                                                                        </div>
                                                                        <?php if($check<4){ ?>
                                                                        <div class="col-md-12" style="padding:10px;margin-bottom:10px;border-bottom:2px solid #f5f5f5;">
                                                                            <div class="col-md-3"><strong>Last/Previous Recognition.</strong></div>
                                                                            <div class="col-md-3">
                                                                                <?php if($check!=1){ ?>
                                                                                <p style="margin:0;"><strong>Order No:</strong></p>
                                                                                <p style="margin:0;"><strong>Validity Date :</strong></p>
                                                                                <?php } ?>
                                                                                <?php if($check==1){$min=null;  ?>
                                                                                
                                                                                <p style="margin-top:15px;">Status of Conditions laid in Previous Recognition Order :<strong> <?php echo($school[0]['conditionstatisfied']); ?></strong></p>
                                                                                <?php }else{$min=date("Y-m-d",strtotime($school[0]['createddate']));} ?>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="col-md-6">
                                                                                    <p style="margin:0;"><strong>Order Copy :</strong>
                                                                                        <a href="javascript:void(0);" onclick="popuppdf('<?php echo $school[0]['lastrenewal_filepath'];?>',1);" style="margin-left:5px;">
                                                                                            <span class="badge badge-primary"><?php echo (substr($school[0]['lastrenewal_filename'],0,20));?></span>
                                                                                        </a>
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <input type="date" id="lastrenewaldate_<?php echo($school[0]['id']); ?>" name="lastrenewaldate_<?php echo($school[0]['id']); ?>" class="form-control " min="<?php echo($min); ?>"  required="required" onkeypress="return false;" value="<?php echo($school[0]['file_exp']) ?>" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-2 form-group shadow-textarea">
                                                                                <textarea class="form-control z-depth-1" placeholder="Write Something...." rows="5" id="lastrenewal_<?php echo($school[0]['id']); ?>" name="lastrenewal_<?php echo($school[0]['id']); ?>"><?php echo($school[0]['year_rec_remarks']); ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <?php } if($school[0]['amount']!=''){ ?>
                                                                        <div class="col-md-12" style="padding:10px;margin-bottom:10px;border-bottom:2px solid #f5f5f5;">
                                                                            <div class="col-md-3"><strong>Fees And Challan Details</strong></div>
                                                                            <div class="col-md-3">
                                                                                <p style="margin:0;"><strong>Fee Amount: <?php echo $school[0]['amount'];?></strong></p>
                                                                                <p style="margin:0;"><strong>Challan No.: <?php echo $school[0]['challan_no'];?></strong></p>
                                                                                <p style="margin:0;"><strong>Challan No.: <?php echo $school[0]['ifsc_code'];?></strong></p>
                                                                                <p style="margin:0;"><strong>Date Paid: <?php echo($school[0]['challan_date']!=null?date("d.m.Y",strtotime($school[0]['challan_date'])):'');?></strong></p>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <p style="margin:0;"><strong>Challan Copy:</strong>
                                                                                    <a href="javascript:void(0);" onclick="popuppdf('<?php echo $school[0]['challan_filepath'];?>',1)" style="margin-left:5px;">
                                                                                        <span class="badge badge-primary"><?php echo (substr($school[0]['challan_filename'],0,20));?></span>
                                                                                    </a>
                                                                                </p>
                                                                            </div>
                                                                            <div class="col-md-2"></div>
                                                                        </div>
                                                                        <?php 
                                                                            }
                                                                            $certificate = array();$key='certificate_id';
                                                                            foreach($school as $val) {
                                                                                if(array_key_exists($key, $val)){
                                                                                    $certificate[$val[$key]][] = $val;
                                                                                }else{
                                                                                    $certificate[""][] = $val;
                                                                                }
                                                                            }
                                                                        if($check!=5){
                                                                            foreach($certificate as $cer){ ?>
                                                                        <div class="col-md-12" style="padding:10px;margin-bottom:10px;border-bottom:2px solid #f5f5f5;">
                                                                            <div class="col-md-3"><strong><?php echo($cer[0]['certificatename']); ?></strong></div>
                                                                            <div class="col-md-3">
                                                                                <?php if($cer[0]['value_paid']!=''){ ?>
                                                                                <p style="margin:0;"><strong>Amount :<?php echo($cer[0]['value_paid']); ?></strong></p>
                                                                                <p style="margin:0;"><strong>Certificate No:<?php echo($cer[0]['certificate_number']); ?></strong></p>
                                                                                <p style="margin:0;"><strong>Validity Date :<?php echo($cer[0]['certificate_date']); ?></strong></p>
                                                                                <p style="margin:0;"><strong>Validity Date :<?php echo($cer[0]['cerficate_ifsc']); ?></strong></p>
                                                                                <?php } ?>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <?php
                                                                                    $files = array();$key='fileid';
                                                                                    foreach($cer as $val) {
                                                                                        if(array_key_exists($key, $val)){
                                                                                            $files[$val[$key]][] = $val;
                                                                                        }else{
                                                                                            $files[""][] = $val;
                                                                                        }
                                                                                    }
                                                                                    foreach($files as $file){
                                                                                ?>
                                                                                <div class="col-md-6">
                                                                                    <a href="javascript:void(0);" onclick="popuppdf('<?php echo($file[0]['certificate_filepath']); ?>',1)" style="margin-left:5px;">
                                                                                        <span class="badge badge-primary"><?php echo(substr($file[0]['certificate_filename'],0,20)); ?></span>
                                                                                    </a>
                                                                                </div>
                                                                                <?php if($file[0]['certificate_id']!=18){ ?>
                                                                                <div class="col-md-6">
                                                                                    <input type="date" class="form-control" required="required" id="file_<?php echo($file[0]['certificate_id']); ?>_<?php echo($file[0]['fileid']); ?>" name="file_<?php echo($file[0]['certificate_id']); ?>_<?php echo($file[0]['fileid']); ?>" value="<?php echo($file[0]['certificate_exp']); ?>" />
                                                                                </div>
                                                                                    <?php } }  ?>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <textarea class="form-control" rows="5" placeholder="Write Something....." id="remarks_<?php echo($file[0]['certificate_id']); ?>" name="remarks_<?php echo($file[0]['certificate_id']); ?>"><?php echo($file[0]['beo_certificateremarks']); ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <?php } 
                                                                            }
                                                                        ?>
                                                                        <div id="infosection" class="col-md-12">
                                                                            <div id="titlesofinspection" class="col-md-12 bg-primary" style="padding:3px 0;">
                                                                                <div class="col-md-3 text-left"><strong>Inspection/Approval/Rejection</strong></div>
                                                                                <div class="col-md-4 text-right"><strong>Files / File Number</strong></div>
                                                                                <div class="col-md-5 text-right"><strong>Comments / Query</strong></div>
                                                                            </div>
                                                                            <?php
                                                                                $inspect = array();$key='approveid';
                                                                                foreach($school as $val) {
                                                                                    if(array_key_exists($key, $val)){
                                                                                        $inspect[$val[$key]][] = $val;
                                                                                    }else{
                                                                                        $inspect[""][] = $val;
                                                                                    }
                                                                                } 
                                                                                //print_r($usercat);die();
                                                                                foreach($inspect as $insp)
                                                                                {   
                                                                                    foreach($usercat as $user){
                                                                                        $approvedfile=$condition=$documents='';
                                                                                        if($user['id']==$insp[0]['approvedby']){
                                                                                ?>
                                                                            <div id="inspectiondetails" class="col-md-12 bg-warning" style="padding:3px 0;">
                                                                                <div class="col-md-3 text-left"><?php echo($user['user_type']); ?> - (<?php echo($user['id']>0?'Recommended/Approved':($user['id']==-1?'REJECTED TO SCHOOL':'Queued/Rejected')); ?>)</div>
                                                                                <div class="col-md-3 text-right">
                                                                                    <?php
                                                                                        if($insp[0]['appprocess']=='APPROVED'){
                                                                                            $approvedfile='<span class="badge" id="approvefile_'.$insp[0]['school_key_id'].'" style="cursor: pointer;" onclick="popuppdf(\''.base_url().'Basic/pdf/'.$insp[0]['school_key_id']."/98/".$this->uri->segment(3,0).'\',1);">FORWARDED '.$user['user_type'].' - ORDER COPY</span><br>';
                                                                                        } 
                                                                                        if($insp[0]['contidion_file']!=null){
                                                                                            $condition='<span class="badge" style="cursor: pointer;" onclick="popuppdf(\''.$insp[0]['contidion_file'].'\',1);">CONDITION TOWARDS RENEWAL</span><br>';
                                                                                        }
                                                                                        $documents='<span class="badge" style="cursor: pointer;" onclick="popuppdf(\''.$insp[0]['approvefilepath'].'\',1);">'.$insp[0]["approvefile"].'</span>';
                                                                                        
                                                                                        echo($approvedfile.$condition.$documents);
                                                                                    ?>
                                                                                
                                                                                </div>
                                                                                <div class="col-md-3 text-right"><?php echo($insp[0]['filenumber'].' - Dt :'.date('d-m-Y H:i:s',strtotime($insp[0]['ts']))); ?></div>
                                                                                <div class="col-md-3 text-right"><?php echo($insp[0]['approveremarks']); ?></div>
                                                                            </div>
                                                                            <?php
                                                                                        }
                                                                                    } 
                                                                                }
                                                                                
                                                                                $checklist=[96,97,98,99]; 
                                                                            ?>
                                                                        </div>
                                                                        <?php if(!in_array($school[0]['appauth'],$checklist) && $this->session->userdata('emis_state_id')=='' ){ ?>
                                                                        <div id="authoring" class="col-md-12" style="border:thin solid #f5f5f5;margin:10px 0;">
                                                                            <div class="col-md-3">
                                                                                <label>Inpsection Documents / Photographs</label>
                                                                                <input type="file" id="inspect_<?php echo($school[0]['id']); ?>" name="inspect_<?php echo($school[0]['id']); ?>" class="form-control"/>
                                                                                <?php
                                                                                    if($this->session->userdata('emis_user_type_id')==$school[0]['final_cat_id']){
                                                                                        $reject='';
                                                                                ?>
                                                                                <label>Condition Documents</label>
                                                                                <input type="file" id="condition_<?php echo($school[0]['id']); ?>" name="condition_<?php echo($school[0]['id']); ?>" class="form-control"/>
                                                                                <?php }else{$reject='style="display:none;"';} ?>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <label>File Number</label>
                                                                                <input type="text" id="filenumber_<?php echo($school[0]['id']); ?>" name="filenumber_<?php echo($school[0]['id']); ?>" class="form-control" required="required" />
                                                                            </div>
                                                                            <div class="col-md-5">
                                                                                <?php if(($check==1 || $check==4) && $this->session->userdata('emis_user_type_id')==$school[0]['final_cat_id']){ ?>
                                                                                <div class="col-md-12">
                                                                                    <div class="col-md-6">
                                                                                        <label>From Class</label>
                                                                                        <select id="fromclass_<?php echo($school[0]['id']); ?>" name="fromclass_<?php echo($school[0]['id']); ?>" class="form-control">
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
                                                                                    <div class="col-md-6">
                                                                                        <label>To Class</label>
                                                                                        <select id="toclass_<?php echo($school[0]['id']); ?>" name="toclass_<?php echo($school[0]['id']); ?>" class="form-control">
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
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="col-md-6">
                                                                                        <label>Valid From</label>
                                                                                        <input type="date" id="validfrom_<?php echo($school[0]['id']); ?>" name="validfrom_<?php echo($school[0]['id']); ?>" class="form-control" />
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label>Valid Upto</label>
                                                                                        <input type="date"  id="validupto_<?php echo($school[0]['id']); ?>" name="validupto_<?php echo($school[0]['id']); ?>" class="form-control" />
                                                                                        <!-- min="<?php //echo(date('Y-m-d',strtotime("now"))); ?>" -->
                                                                                    </div>
                                                                                </div>
                                                                                <?php } ?>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <label>Clarification Comments</label>
                                                                                <textarea id="finalremarks_<?php echo($school[0]['id']); ?>" name="finalremarks_<?php echo($school[0]['id']); ?>" class="form-control" rows="5" placeholder="Write Something....."></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div id="form_submit_reject" class="text-center">
                                                                            <input type="hidden" name="renewal_id" value="<?php echo($school[0]['id']); ?>" />
                                                                            <input type="hidden" name="redirect" value="<?php echo(substr($_SERVER['REQUEST_URI'],10));?>" />
                                                                            <!--<input type="hidden" name="redirect" value="<?php echo($_SERVER['REQUEST_URI']);?>" />-->
                                                                            <input type="hidden" name="module" value="<?php echo($check); ?>" />
                                                                            <input type="hidden" name="rejectDeclare" id="declare_<?php echo($school[0]['id']); ?>" value="" />
                                                                            <button type="submit" class="btn btn-success" style="margin:15px 15px 15px 0;" name="submit" id="submit_<?php echo($school[0]['id']); ?>" onclick="return removeRequired(<?php echo($school[0]['id']); ?>,0);"><strong>Approve / Recommend</strong></button>
                                                                            <button type="button" <?php echo($reject); ?> class="btn btn-danger" style="margin:15px 0 15px 15px;" name="reject" id="reject_<?php echo($school[0]['id']); ?>" onclick="return selectRejection('<?php echo($school[0]['appcat']);  ?>','<?php echo($school[0]['sch_directorate_id']);  ?>','<?php echo($school[0]['id']); ?>')"><strong>Reject / Query</strong></button>
                                                                        </div>
                                                                        <?php }else{ ?>
                                                                        <div id="form_submit_reject" class="text-center">
                                                                            <div class="col-md-12" style="margin-top:5px;">
                                                                                <textarea id="reason_reset_<?php echo($school[0]['id']); ?>" name="reason_reset_<?php echo($school[0]['id']); ?>" class="form-control" rows="5" placeholder="Reson For Queue to Reset Renewal than Already Feeded....." required="required"><?php echo($school[0]['reset_reason']); ?></textarea>
                                                                            </div>
                                                                            <input type="hidden" name="renewal_id" value="<?php echo($school[0]['id']); ?>" />
                                                                            <input type="hidden" name="redirect" value="<?php echo(substr($_SERVER['REQUEST_URI'],10));?>" />
                                                                            <!--<input type="hidden" name="redirect" value="<?php echo($_SERVER['REQUEST_URI']);?>" />-->
                                                                            <input type="hidden" name="module" value="<?php echo($check); ?>" />
                                                                            <input type="hidden" name="rejectDeclare" id="declare_<?php echo($school[0]['id']); ?>" value="" />
                                                                            <button type="submit" class="btn btn-success" style="margin:15px 15px 15px 0;" name="reset_submit_<?php echo($school[0]['id']); ?>" id="submit_<?php echo($school[0]['id']); ?>" onclick="return queueToreset(this.form,this)" url="<?php echo (base_url().'AllApprove/queueToreset/'.$school[0]['id']);?>"><strong>Queue To Reset</strong></button>
                                                                            <!--<button type="button" <?php echo($reject); ?> class="btn btn-danger" style="margin:15px 0 15px 15px;" name="reject" id="reject_<?php echo($school[0]['id']); ?>" onclick="return selectRejection('<?php echo($school[0]['appcat']);  ?>','<?php echo($school[0]['sch_directorate_id']);  ?>','<?php echo($school[0]['id']); ?>')"><strong>Reject / Query</strong></button>-->
                                                                        </div>
                                                                        <?php } ?>
                                                                    </form>
                                                                    <button style="visibility:hidden;"></button>
                                                                </ul>
                                                            </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>                                                                                           
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                             </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
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
            <div id="poprejectaction" class="modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body" id="modalbody" style="width:100%;min-height:152px;">
                            <span style="font-size: 28px;font-weight: bold;cursor: pointer; float:right;" onclick="closefile('poprejectaction');">&times;</span>
                            <div class="col-md-12">
                                <div class="col-md-7"><h4>To Whom The Rejection Is ?</h4></div>
                                <div class="col-md-5">
                                    <select id="rejectDelare" name="rejectDeclare" onchange="popreject(this)" class="form-control">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                                                                                                                                                                                                                        
            </div>   
        <?php $this->load->view('footer.php');?>
    </div>
    <?php $this->load->view('scripts.php'); ?>
    <script src="<?php echo base_url().'asset/js/block.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/js/vivekrao/generate.js';?>" type="text/javascript"></script>
    <script>
        document.getElementById('countBadge').innerHTML=<?php echo($cntschools); ?>;
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
        
        function selectRejection(appcat,directorate,rejet){
            var usertype=<?php echo($this->session->userdata('emis_user_type_id')); ?>;
            var url='<?php echo(base_url()."AllApprove/getRejectList") ?>';
            $.ajax({
                type: "POST",
                url:url,
                data:"&module="+appcat+"&schooltype="+directorate+"&usertype="+usertype,
                success: function(resp){  
                        var jsarr=JSON.parse(resp);
                        var opt='<option value="">Choose</option>';
                        for(js in jsarr){
                            opt+='<option value="'+jsarr[js]['id']+'" data-rej="'+rejet+'">'+jsarr[js]['user_type']+'</option>'
                        }
                        document.getElementById('rejectDelare').innerHTML=opt;
                        document.getElementById('poprejectaction').style.display='block';
                        return true;              
                },
                error: function(e){ 
                    //alert('Error: ' + e.responseText);
                    return false;  
                }
            });
            return false;
        }
        
        function closefile(ids){
            document.getElementById(ids).style.display='none';
        }
        
        function popreject(node){
            var rej=node.options[node.selectedIndex].getAttribute('data-rej');
            var rejbutton=document.getElementById('reject_'+rej);
            if(rejbutton!=null && document.getElementById('filenumber_'+rej).value!=''){
                document.getElementById('declare_'+rej).value=node.value;
                rejbutton.setAttribute('type','submit');
                rejbutton.removeAttribute('onclick');
                rejbutton.click();
            }
            else{
                alert('Check Filenumber All Procedures Are Correct !!!');
                closefile('poprejectaction');
                return false;
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
        function queueToreset(frm,btn){
            var sp=btn.name.split('_')[2];
            if(document.getElementById('reason_reset_'+sp).value!='' && document.getElementById('reason_reset_'+sp).value!=null){
                frm.setAttribute('action',btn.getAttribute('url'));
                return true;
            }
            else{
                alert('Kindly Enter Reason For Reset');
                return false;
            }
            return false;
        }
        
        function openactive(acli){
            var prnode=acli.parentNode;
            for(var i=0;i<prnode.children.length;i++){
                prnode.children[i].classList.remove("bg-warning");
                prnode.children[i].classList.remove("text-white");
            }
            acli.classList.add("bg-warning");
            acli.classList.add("text-white");
        }
        
        function pdfviewfrombage(school_key_id,approcess){
            if(approcess=='APPROVED'){
                document.getElementById('approvefile_'+school_key_id).onclick();
            }
        }
    </script>
</body>
</html>