<?php
     //print_r($status_rt);die();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('head.php'); ?>
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
    
    <style>
        .boxhover{box-shadow:.5px .5px 10px 2px #999;}
        .boxhover:hover{box-shadow:.5px .5px 10px 2px #999 inset;}
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
                                                <span class="caption-subject font-green-sharp bold uppercase"><?PHP echo($subtitle); ?></span>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <table class="table table-striped table-bordered table-hover">
                                                <tr>
                                                <?php
                                                    foreach($status_rt as $key => $table1){
                                                        if($key!=2){
                                                            foreach($table1 as $tval){
                                                 ?>
                                                 <th class="text-center"><?php echo($tval['pending_desc']); ?></th>
                                                 <?php    
                                                            }  
                                                        }
                                                    } 
                                                ?>
                                                </tr>
                                                <tr>
                                                <?php
                                                    foreach($status_rt as $key => $table1){ 
                                                        if($key!=2){
                                                            foreach($table1 as $tval){
                                                 ?>
                                                 <th class="text-center"><?php if($tval['path']!=''){ ?><a href="<?php echo(base_url().'AllApprove/CheckForSubmission/'.$this->uri->segment(3,0).'/'.$tval['path']); ?>"><?php } echo($tval['cnt']); if($tval['path']!=''){ ?></a><?php } ?></th>
                                                 <?php    
                                                            }  
                                                        }
                                                    } 
                                                ?>
                                                </tr>
                                            </table>
                                            <table class="table table-striped table-bordered table-hover">
                                                <tr>
                                                <?php
                                                    foreach($status_rt as $key => $table2){
                                                        if($key!=1){
                                                            foreach($table2 as $tval){
                                                 ?>
                                                 <th class="text-center"><?php echo($tval['pending_desc']); ?></th>
                                                 <?php    
                                                            }  
                                                        }
                                                    } 
                                                ?>
                                                </tr>
                                                <tr>
                                                <?php
                                                    foreach($status_rt as $key => $table2){
                                                        if($key!=1){
                                                            foreach($table2 as $tval){
                                                 ?>
                                                 <th class="text-center"><?php echo($tval['cnt']); ?></th>
                                                 <?php    
                                                            }  
                                                        }
                                                    } 
                                                ?>
                                                </tr>
                                            </table>
                                        </div>
                                        
                                        <!--<div class="portlet-body">
                                        <?php if($check!=-1){ //print_r($status_rt);die();
                                        
                                        //$files = array();$key='school_key_id';
                                        foreach($status_rt as $val) {
                                            //if(array_key_exists($key, $val)){
                                                //$files[$val[$key]][] = $val;
                                            //}else{
                                                //$files[""][] = $val;
                                            //}
                                        //}
                                        //print_r($files);die();
                                        /*$files1 = array();$key='appauth';
                                        foreach($files as $v1){
                                            $files1[$v1[0][$key]]=$files1[$v1[0][$key]]+1;  
                                        }
                                        $sum=0;
                                        foreach($files1 as $key => $v2){
                                            $sum+=$v2;
                                        }
                                        $files1[0]=$sum;
                                        $a[0]=array('id' => 0,'user_type' => 'TOTAL');
                                        $a[1]=array('id' => 98,'user_type' => 'APPROVED');
                                        $a[2]=array('id' => 99,'user_type' => 'REJECTED');
                                        $a[3]=array('id' => 96,'user_type' => 'IN RESET QUEUE');
                                        $a[4]=array('id' => 97,'user_type' => 'SEND TO RESET QUEUE');
                                        
                                        foreach($a as $k){
                                            array_push($usercat,$k);
                                        }
                                        
                                        //print_r($usercat);die();
                                        
                                        //print_r($files1);die();
                                        
                                        
                                        foreach($files1 as $key => $stat){
                                            if($key==99){$checkpoint="99/3";}
                                            elseif($key==98){$checkpoint="98/2";}
                                            else{$checkpoint=$key."/1";}
                                            
                                            foreach($usercat as $u){
                                                if($u['id']==$key){
                                                    $usec=$u['user_type'];
                                                    break;
                                                }
                                            }
                                            
                                        ?>
                                        <?php if($checkpoint!=''){ echo('<a href="'.base_url().'AllApprove/CheckForSubmission/'.$this->uri->segment(3,0).'/'.$checkpoint.'">'); }?>
                                        <div class="col-md-<?php echo(strlen($usec)>12?'7':'2'); ?> bg-default boxhover" style="padding:2%;margin:1%;">
                                            <div class="col-md-12 text-center"><strong><?php echo($usec); ?></strong></div>
                                            <div class="col-md-12 text-center"><strong><?php echo($stat); ?></strong></div>
                                        </div><?php if($checkpoint!=''){ ?></a><?php }?>
                                        <?php }*/ ?>
                                        <?php if($val['checkpoint']!=''){ echo('<a href="'.base_url().'AllApprove/CheckForSubmission/'.$this->uri->segment(3,0).'/'.$val['checkpoint'].'">'); }?>
                                        <div class="col-md-<?php echo(strlen($val['descd'])>12?'7':'2'); ?> bg-default boxhover" style="padding:2%;margin:1%;">
                                            <div class="col-md-12 text-center"><strong><?php echo($val['descd']); ?></strong></div>
                                            <div class="col-md-12 text-center"><strong><?php echo($val['cnt']); $sum+=$val['cnt']; ?></strong></div>
                                        </div><?php if($val['checkpoint']!=''){ ?></a><?php }?>
                                        
                                        <?php } //End Foreach 
                                        echo('<a href="'.base_url().'AllApprove/CheckForSubmission/'.$this->uri->segment(3,0).'/0">');?>
                                        <div class="col-md-12 bg-default boxhover" style="padding:2%;margin:1%;">
                                            <div class="col-md-12 text-center"><strong>TOTAL</strong></div>
                                            <div class="col-md-12 text-center"><strong><?php echo($sum); ?></strong></div>
                                        </div></a>
                                        <?php } //End if Check?>
                                        </div>-->
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
    </script>
</body>
</html>