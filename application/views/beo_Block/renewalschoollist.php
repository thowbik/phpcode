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
        <?php $this->load->view('block/header.php'); ?>
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
                            <div class="container">
                                <!-- BEGIN PAGE CONTENT INNER -->
                                <div class="page-content-inner">
                                    <!--<center><?php $this->load->view('block/emis_block_profile_header.php'); ?></center>-->
                                    <!-- BEGIN BLOCK BUTTONS PORTLET-->
                                    <div class="portlet light col-md-12">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="icon-settings font-green-sharp"></i>
                                                <span class="caption-subject font-green-sharp bold uppercase">LIST OF APPLIED UNAIDED SCHOOLS - RENEWAL</span>
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
                                                                        $schid=0; 
                                                                        foreach($alllist as $list) {
                                                                            if($schid==$list['school_key_id']){
                                                                                continue;
                                                                            }
                                                                            else{
                                                                                $schid=$list['school_key_id'];
                                                                            }
                                                                            
                                                                            
                                                                            switch($user){
                                                                                case 0:{
                                                                                    switch($list['approvedby']){
                                                                                        case -3:$pen='REJECTED :';break;
                                                                                        case -2:
                                                                                        case -1:$pen='Queried :';break;
                                                                                        case 1:$p=1;$pen='APPROVED :';break;
                                                                                        case 2:$p=2;$pen='Days Pending-CEO :';break;
                                                                                        case 3:$p=3;$pen='Days Pending-DEO :';break;
                                                                                        default:$p=0;$pen='Days Pending-BEO :';
                                                                                        
                                                                                    }
                                                                                    break;
                                                                                }
                                                                                case 1:{
                                                                                    switch($list['approvedby']){
                                                                                        case -3:$pen='REJECTED :';break;
                                                                                        case -2:
                                                                                        case -1:$pen='Queried :';break;
                                                                                        case 1:$p=1;$pen='APPROVED :';break;
                                                                                        case 2:$p=2;$pen='Days Pending-CEO :';break;
                                                                                        case 3:$p=3;$pen='Days Pending-DEO :';break;
                                                                                        default:$p=0;$pen='Days Pending-BEO :';
                                                                                        
                                                                                    }
                                                                                    break;
                                                                                }
                                                                                case 2:{
                                                                                    switch($list['approvedby']){
                                                                                        case -3:$pen='REJECTED :';break;
                                                                                        case -2:
                                                                                        case -1:$pen='Queried :';break;
                                                                                        case 1:$p=1;$pen='APPROVED :';break;
                                                                                        case 2:$p=2;$pen='Days Pending-CEO :';break;
                                                                                        case 3:$p=3;$pen='Days Pending-DEO :';break;
                                                                                        default:$p=0;$pen='Days Pending-BEO :';
                                                                                        
                                                                                    }
                                                                                    break;
                                                                                }
                                                                                case 3:{
                                                                                    switch($list['approvedby']){
                                                                                        case -3:$pen='REJECTED :';break;
                                                                                        case -2:
                                                                                        case -1:$pen='Queried :';break;
                                                                                        case 1:$p=1;$pen='APPROVED :';break;
                                                                                        case 2:$p=2;$pen='Days Pending-CEO :';break;
                                                                                        case 3:$p=3;$pen='Days Pending-DEO :';break;
                                                                                        default:$p=0;$pen='Days Pending-BEO :';
                                                                                        
                                                                                    }
                                                                                    break;
                                                                                }
                                                                            }
                                                                    ?>
                                                                        
                                                                    <li class="list-group-item">
                                                                        
                                                                        <a class="link-unstyled collalpsed" data-toggle="collapse" 
                                                                        data-target="#<?php echo $list['id']; ?>" aria-expanded="false" aria-controls="<?php echo $list['school_id']; ?>" 
                                                                        href="#"><strong>Udise Code: <?php  echo $list['udise_code']; ?> - School Name: <?php  echo $list['school_name']; ?></strong></a>
                                                                        <span class="badge"><?php echo($pen.$list['pending']); ?></span>
                                                                            <a href="<?php echo base_url().'Basic/emis_school_details_entry/1/'.$list['school_key_id']?>" target="_blank"><span class="badge"><?php echo("Profile"); ?></span></a>
                                                                        <br/>
                                                                        <br/>
                                                                        <form id="" method="post" action="<?php echo base_url().'Block/RenewalStatus/'.$list['id'];?>" enctype="multipart/form-data">
                                                                        <ul id="<?php echo $list['id']; ?>" class="list-group collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                             <table class="table card-body">
                                                                                    <tr>
                                                                                        <td colspan="2">
                                                                                            <div class="col-md-12">
																								<div class="col-md-6">
                                                                                                    <label>Status of Conditions laid in Previous Recognition Order : <strong><?php echo($list['conditionstatisfied']); ?></strong></label>
                                                                                                </div>
                                                                                                <div class="col-md-6" style="text-align: center;">
                                                                                                    <label >Valid Upto <font style="color:#dd4b39;">*</font></label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        
                                                                                        <td colspan="1">Remarks: <font style="color:#dd4b39;">*</font></td>
                                                                                        
                                                                                    </tr>
                                                                                    <tr >
                                                                                        <td>
                                                                                            Year of Last/Previous Recognition.
                                                                                        </td>
                                                                                        <!--<td>
                                                                                            <label>Validated:</label>
                                                                                            <input type="checkbox" id="view1" name="viewlastrec" />
                                                                                        </td>-->
                                                                                         <td style="width: 550px;">
																							<div class="col-md-12">
																								<div class="col-md-6">
																									<span class="badge" style="cursor: pointer;" onclick="popuppdf('<?php echo $list['lastrenewal_filepath'];?>');">
																										<?php echo (substr($list['lastrenewal_filename'],0,30));?>
																									</span>
																								</div>
																							
																								<div class="col-md-6">
																									<input type="date" class="form-control" id="file_exp_<?php echo($list['id']); ?>" name="file_exp_<?php echo($list['id']); ?>" />
																								</div>
																							</div>
                                                                                        </td>
                                                                                      
                                                                                        <td>
                                                                                            <textarea id="year_rec_remarks" name="year_rec_remarks" onfocus="textvalidate(this.id,'remarksvalidate');" onchange="textvalidate(this.id,'remarksvalidate');" class="form-control" onkeypress="return (event.charCode >=48 && event.charCode <=57) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 65 && event.charCode <= 90) || event.charCode == 8 || event.charCode == 32 || event.charCode == 44 || event.charCode == 46"></textarea>
                                                                                            <font style="color:#dd4b39;" id="remarksvalidate"></font>
                                                                                        </td>
                                                                                       
                                                                                    </tr>
                                                                                    <tr >
                                                                                        <td>
                                                                                            Fees And Challan Details.
                                                                                        </td>
                                                                                        <!--<td>
                                                                                            <label>Validated:</label>
                                                                                            <input type="checkbox" id="view1" name="viewlastrec" />
                                                                                        </td>-->
                                                                                         <td style="width: 550px;">
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
                                                                                    <?php $cerc=0; 
                                                                                        foreach($alllist as $cer) { 
                                                                                            if($cerc==$cer['certificate_id']){
                                                                                                continue;
                                                                                            }
                                                                                            elseif($cerc<$cer['certificate_id']){
                                                                                                $cerc=$cer['certificate_id'];
                                                                                            }
                                                                                            else{
                                                                                                break;
                                                                                            } ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                           <?php echo($cer['certificatename']) ?> 
                                                                                        </td>
                                                                                        <td>
																							
                                                                                                <?php  foreach($alllist as $cerpdf) {
                                                                                                            if($cer['certificate_id']==$cerpdf['certificate_id'] && $cep!=$cerpdf['fileid']){ $cep=$cerpdf['fileid'];
                                                                                                    ?>
																									<div class="col-md-12">
																										<div class="col-md-6">
																										<span class="badge" style="cursor: pointer;resize: both;overflow: auto;" onclick="popuppdf('<?php echo $cerpdf['certificate_filepath']; ?>');">
																											<?php echo (substr($cerpdf['certificate_filename'],0,30));?>
																										</span>
																										</div>
																										<div class="col-md-6">
																											<input type="date" class="form-control" id="file_exp_<?php echo($cerpdf['fileid']); ?>" name="file_exp_<?php echo($cerpdf['fileid']); ?>"/>
																										</div>
																									</div>
                                                                                                    
                                                                                                <?php }
                                                                                                    
                                                                                                } ?>
																								
                                                                                        </td>
                                                                                        <!--<td>
                                                                                            <label>Validated:</label>
                                                                                            <input type="checkbox" id="view1" name="viewlastrec" />
                                                                                        </td>
                                                                                        <td>
                                                                                            <input type="file" class="form-control" accept=".jpg,.jpeg,.doc,.docx,.pdf" id="build_stab_file" name="build_stab_file[]" multiple="mulitple" onchange="ExtSize(this.id,'correct');" />
                                                                                            
                                                                                            <font style="color:#dd4b39;" id="correct"></font>
                                                                                        </td>-->
                                                                                       
                                                                                        <td colspan="1">
                                                                                            
                                                                                            <textarea id="remarks_<?php echo($cer['certificate_id']."_".$cer['id']); ?>" name="remarks_<?php echo($cer['certificate_id']."_".$cer['id']); ?>" class="form-control" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);" onkeypress="return (event.charCode >=48 && event.charCode <=57) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 65 && event.charCode <= 90) || event.charCode == 8 || event.charCode == 32 || event.charCode == 44 || event.charCode == 46"></textarea>
                                                                                            <font style="color:#dd4b39;" id="remarksvalidate1_<?php echo($list['id']) ?>"></font>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <?php } $ceo=($this->session->userdata('usertype1')==2?1:2);?>
                                                                                     <!-- <td>BEO Document / Photograph</td>-->
                                                                                      
                                                                                            <?php 
                                                                                                    
                                                                                                    $cem=0;$arr=[];$check=0;$z=0;
                                                                                                    foreach($alllist as $ceom){
                                                                                                        if($cem!=$ceom['approvedby']){
                                                                                                            foreach($arr as $key => $value){
                                                                                                                if($value==$ceom['approveid']){
                                                                                                                    $check=1;
                                                                                                                    break;
                                                                                                                }
                                                                                                            }
                                                                                                            if($check==0){
                                                                                                                $cem=$ceom['approvedby'];
                                                                                                                $arr[$z++]=$ceom['approveid'];
                                                                                                                if($ceom['approvedby']==1||$ceom['approvedby']==-1){$txt='CEO';}
                                                                                                                elseif($ceom['approvedby']==2||$ceom['approvedby']==-2){$txt='DEO';}
                                                                                                                elseif($ceom['approvedby']==3||$ceom['approvedby']==-3){$txt='BEO';}
                                                                                                                $finaltxt=($ceom['approvedby']==1?base_url().'Basic/pdf':'');
                                                                                                                if($ceom['approvedby']==1){$finaltxt='<span class="badge" style="cursor: pointer;" onclick="popuppdf(\''.$finaltxt.'\');">CEO-APPROVAL</span>';}else{$finaltxt='';}
                                                                                                                echo('<tr>
                                                                                                                            <td>'.$txt.' Inspection / Photograph</td>
                                                                                                                            <td>
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="col-md-6">
                                                                                                                                        <span class="badge" style="cursor: pointer;" onclick="popuppdf(\''.$ceom['approvefilepath'].'\');">'.$ceom["approvefile"].'</span>'.$finaltxt.'
                                                                                                                                    </div>
                                                                                                                                    <div class="col-md-6">
                                                                                                                                        '.$ceom["filenumber"].'
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
                                                                                        <td>School Declearation remarks</td>
                                                                                        <td></td>
                                                                                    </tr>-->
                                                                                    <tr>
                                                                                        <td>Inspection Documents/Photograph, if any
                                                                                            <input type="file" class="form-control" accept=".jpg,.jpeg,.doc,.docx,.pdf" id="files_<?php echo($cer['id']); ?>" name="files_<?php echo($cer['id']); ?>" onchange="ExtSize(this.id,'correct');"/>
                                                                                            <font style="color:#dd4b39;" id="correct"></font>
                                                                                        </td>
                                                                                        <td><label>File Number <font style="color:#dd4b39;">*</font></label>
                                                                                            <input type="text" class="form-control" id="fileno_<?php echo($list['id']) ?>" name="fileno_<?php echo($list['id']) ?>" onkeypress="return (event.charCode >=45 && event.charCode <=57) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 65 && event.charCode <= 90) || event.charCode == 8 || event.charCode == 32 || event.charCode == 44"/>
                                                                                        </td>
                                                                                        
                                                                                        <td>
                                                                                            <textarea id="beo_remarks_<?php echo($cer['id']); ?>" name="beo_remarks_<?php echo($cer['id']); ?>" class="form-control" onfocus="textvalidate(this.id,this.nextElementSibling.id);" onchange="textvalidate(this.id,this.nextElementSibling.id);" onkeypress="return (event.charCode >=48 && event.charCode <=57) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 65 && event.charCode <= 90) || event.charCode == 8 || event.charCode == 32 || event.charCode == 44 || event.charCode == 46"></textarea>
                                                                                            <font style="color:#dd4b39;" id="remarksvalidate_<?php echo($cer['id']); ?>"></font>
                                                                                            <input type="hidden" id="hidden_<?php echo($list['id']) ?>" name="hidden_<?php echo($list['id']) ?>" value="" />
                                                                                        </td>
                                                                                    </tr>
																					
                                                                            </table>
                                                                          <div class="text-center">
                                                                            <button type="button" value="submit" id="submit_<?php echo($cer['id']); ?>" name="submit_<?php echo($cer['id']); ?>" class="btn btn-success" onclick="document.getElementById('hidden_<?php echo($list['id']) ?>').value=3;return popup(this.form);" >Recommend</button>
                                                                            <button type="button" value="reject" onclick="return popreject(3,this.form);" class="btn btn-danger">Reject</button> 
                                                                          </div>
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
	                                                  <span style="font-size: 28px;font-weight: bold;cursor: pointer; float:right;" onclick="closefile();">&times;</span>
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
                                                <div id="poprejectaction" class="modal">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body" id="modalbody" style="width: 100%;">
	                                                            <span style="font-size: 28px;font-weight: bold;cursor: pointer; float:right;" onclick="closefile();">&times;</span>
                                                                <table class="table">
                                                                    <tr>
                                                                        <td>
                                                                            To Whom The Rejection is
                                                                        </td>
                                                                        <td>
                                                                            <select id="" onchange="popreject(this.value)" class="form-control">
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
        function closefile() {
            document.getElementById('myModal').style.display='none';
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
        
        function popup(frm){
            //alert('Click Submit');
            swal({
            title: "Are you sure?",
            text: "You Have Recommend The Form",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Recommend!",
            closeOnConfirm: false,
            showLoaderOnConfirm: true
            }, function(isConfirm){
                if (isConfirm) 
                    frm.submit();
                 else
                    swal("Cancelled", "Your cancelled the CheckList", "error");
        });	
        }
        function popreject(ceo,frm){
            if(ceo>0){
                if(ceo==1){
                    document.getElementById('poprejectaction').style.display='block';
                }
                else{
                    alert('Permission Denied');
                }
                return false;
            }
            else{
                document.getElementById('hidden_<?php echo($list['id']) ?>').value=ceo;
                document.getElementById('poprejectaction').style.display='none';
                popup(frm,'Reject')
                return true;
            }
        }  
        
    </script>
</body>
</html>