<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('head.php'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'asset/css/support/brdcum-magesh.css';?>"></link>
    <link href="<?php echo base_url().'asset/css/support/custom-vivek.css';?>" rel="stylesheet" type="text/css" />
</head>

<body class="page-container-bg-solid page-md">
    <div class="page-wrapper">
        <div class="page-wrapper-row">
            <div class="page-wrapper-top">
                <!-- BEGIN HEADER -->
                <div class="page-header" style="height: 80px;">
                    <!-- BEGIN HEADER TOP -->
                    <div class="page-header-top">
                        <div class="container">
                            <!-- BEGIN LOGO -->
                            <div class="page-logo" style="min-width:50%;font-size: 18px;">
                                <a href="<php echo base_url(); ?>">
                                    <img src="<?php echo base_url().'asset/pages/img/emis_logo.png';?>"  style="height: 100%;margin:0px;"  alt="logo" class="logo-default">
                                </a>
                            </div>
                            <div class="top-menu">
                                <ul class="nav navbar-nav pull-right">
                                    <li><a onclick="location.href='<?php echo base_url().'Authentication/logout';?>'">Logout</a></li>
                                    <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
                                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                            <span class="square"><font style="color:#dd4b39;">*</font> Note: Fill the Details carefully.</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-wrapper-row full-height">
            <div class="page-wrapper-middle">
                <!-- BEGIN CONTAINER -->
                <div class="page-container">
                    <!-- BEGIN CONTENT -->
                    <div class="page-content-wrapper">
                        <!-- BEGIN CONTENT BODY -->
                        <!-- BEGIN PAGE HEAD-->
                        <div class="page-head">
                            <div class="container">
                                <!-- BEGIN PAGE TOOLBAR -->
                                <div class="page-toolbar">
                                    <!-- BEGIN THEME PANEL -->
                                    <!-- END THEME PANEL -->
                                </div>
                                <!-- END PAGE TOOLBAR -->
                            </div>
                        </div>
                        <!-- END PAGE HEAD-->
                        <!-- BEGIN PAGE CONTENT BODY -->
                        <div class="page-content">
                            <div></div> 
                            <div class="container">
                                <!-- BEGIN PAGE CONTENT INNER -->
                                <div class="page-content-inner">
                                    <!-- BEGIN CARDS -->
                                    <div class="row">
                                        <div class="portlet-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                    <div class="portlet box green">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <i class="fa fa-globe"></i>New School Registration Form</span>
                                                            </div>
                                                            <div class="tools"> </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <?php //$this->load->view('newSchool/supportHeader'); ?>
                                                            <ol class="track-progress">
                                                                <li class="done">
                                                                    <em>1</em>
                                                                    <span><a href="<?php echo(base_url().'AllApprove/schoolProfileView/'.$this->session->userdata('temp_id')."/2"); ?>" target="_blank">Application <strong>(<?php echo(date('d/m/Y h:i:s',strtotime($renew[0]['createddate']))); ?>)</strong></a> </span>
                                                                </li>
                                                                <?php 
                                                                    $res = array();$key='approveid';
                                                                    foreach($renew as $val) {
                                                                        if(array_key_exists($key, $val)){
                                                                            $res[$val[$key]][] = $val;
                                                                        }else{
                                                                            $res[""][] = $val;
                                                                        }
                                                                    }
                                                                    $result=array_reverse($res);
                                                                    
                                                                    //print_r($res);
                                                                    
                                                                    foreach($result as $key => $arrvalue){ $appr=0;
                                                                        //echo($key."<br>");
                                                                        foreach($user as $use){
                                                                            if($arrvalue[0]['approvedby']==$use['id']){
                                                                                $dis=$use['user_type'].'- APPROVED';
                                                                                $check="";
                                                                                $class='done';
                                                                                if($arrvalue[0]['applied_category']==5){
                                                                                    $dis='&nbsp;<a href="'.base_url().'Newschool/new_school/5"><strong>APPLY FOR RECOGNITION</strong></a>';
                                                                                }
                                                                                break;
                                                                            }
                                                                            else{
                                                                                $check=$arrvalue[0]['appprocess']; 
                                                                                $class='todo';
                                                                            }
                                                                        }
                                                                        if($arrvalue[0]['approvedby']==-1){
                                                                            $dis='REJECTED-';
                                                                            //$check='-<a href="'.base_url().'Home/renewalform/'.$renew[0]['renewal_id'].'">REAPPLICATION</a>';
                                                                        }
                                                                ?>
                                                                <li class="<?php echo($class); ?>" data-html="true" data-toggle="tooltip" title="<?php echo($arrvalue[0]['filenumber']); ?><br><?php echo($arrvalue[0]['approveremarks']); ?><br><?php echo(date("d/m/Y H:i:s",strtotime($arrvalue[0]['ts']))); ?>">
                                                                    <em><?php echo($arrvalue[0]['approvedby']); ?></em>
                                                                    <span><?php 
                                                                        //if(in_array($arrvalue[0]['sch_directorate_id'],$directorate_dee) && $arrvalue[0]['approvedby']==2){$temp=1;$check='';}
                                                                        //if($arrvalue[0]['appprocess']=='APPROVED'){$dis='<a href="'.base_url().'Basic/pdf/'.$this->session->userdata('temp_id').'/4">Download</a>'.' / '.'<a href="'.$arrvalue[0]['contidion_file'].'">CONDITIONS</a>';$check='';}
                                                                        //if($arrvalue[0]['approvedby']==-1){$dis='<a href="'.base_url().'Home/renewalform/'.$renew[0]['renewal_id'].'">REAPPLICATION</a>';}
                                                                        //$check=$arrvalue[0]['approvedby']>0?(($arrvalue[0]['approvedby']!=1 && $arrvalue[0]['approvedby']!=-3)?' RECOMMENDED':''):(($arrvalue[0]['approvedby']<-1)?' RECOMMENDED':' REJECTED'); 
                                                                        echo($dis.$check); 
                                                                    ?></span>
                                                                </li>
                                                                <?php } 
                                                                        if($arrvalue[0]['appprocess']=='APPROVED'){$dis='<a href="'.base_url().'Basic/pdf/'.$this->session->userdata('temp_id').'/4">Download</a>'.' / '.'<a href="'.$arrvalue[0]['contidion_file'].'">CONDITIONS</a>';$check='';$appr=1;}
                                                                        if($arrvalue[0]['approvedby']==-1){$dis='<a href="'.base_url().'Home/renewalform/'.$renew[0]['renewal_id'].'">REAPPLICATION</a>';$check="";$appr=1;}
                                                                        
                                                                ?>
                                                                <?php if($appr){echo('<li class="done">'.$dis.$check."</li>"); } ?>
                                                                    <li style="clear:both;display:block;visibility:hidden;margin-bottom:5px;float:none;">&nbsp;</li>
                                                                </ol>
                                                            </div>
                                                        </div>
                                                    <!-- END PAGE CONTENT INNER -->
                                                    </div>
                                                </div>
                                            <!-- END PAGE CONTENT BODY -->
                                            <!-- END CONTENT BODY -->
                                            </div>
                                        <!-- END CONTENT -->
                                        <!-- BEGIN QUICK SIDEBAR -->
                                        <!-- END QUICK SIDEBAR -->
                                        </div>
                                    <!-- END CONTAINER -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('footer.php'); ?>
        
    <?php $this->load->view('scripts.php'); ?>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/moment.min.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/jquery.mockjax.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js';?>" type="text/javascript"></script>
    
    <script src="<?php echo base_url().'asset/js/vivekrao/generate.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/js/vivekrao/jsonpost.js';?>" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <!-- END PAGE LEVEL SCRIPTS --> 
    
    <script>
        $(document).ready(function(){
             $('[data-toggle="tooltip"]').tooltip();   
        });
        function restrictImage(fileID){ 
            //alert(fileID);
            // GET THE FILE INPUT.
            var tot=0;
            var fi = document.getElementById(fileID);
            // VALIDATE OR CHECK IF ANY FILE IS SELECTED.
            if (fi.files.length > 0) {
                // THE TOTAL FILE COUNT.
                document.getElementById(fileID+'_td').innerHTML ='Total Files: <b>' + fi.files.length + '</b></br >';
                // RUN A LOOP TO CHECK EACH SELECTED FILE
                for (var i = 0; i <= fi.files.length - 1; i++) {
                    var fname = fi.files.item(i).name;      // THE NAME OF THE FILE.
                    var fsize = fi.files.item(i).size;      // THE SIZE OF THE FILE.
                    // SHOW THE EXTRACTED DETAILS OF THE FILE.
                    document.getElementById(fileID+'_td').innerHTML =document.getElementById(fileID+'_td').innerHTML + '<br /> ' + fname + ' (<b>' + fsize + '</b> bytes)';
                    fi.nextElementSibling.value=parseInt(fi.nextElementSibling.value)+fsize;
                    var ooo=fi.nextElementSibling;
                    if(ooo.hasAttribute('onchange')){
                        ooo.onchange();
                    }
                    else{
                        alert(fi.nextElementSibling.id);
                    }
                }
            }
            else{
               document.getElementById(fileID+'_td').innerHTML ='';
               fi.nextElementSibling.value=0;
               fi.nextElementSibling.onchange(); 
            }
        }    
        
        function filesizelimit(node){
            var fisize=parseInt(document.getElementById('totsize_hidden').value);
            if((fisize/1000/1000)>8){
                alert('Total File Size Limited to 8Mb');
                return false;
            }
            checkRequired(node);
        }
        
        function setFileSize(){
            document.getElementById('totsize_hidden').value=0;
            var hele=document.querySelectorAll('input[type="hidden"]');
            var sum=0,v;
            for(h in hele){
                if(checkInstanceof(hele[h])){
                    if(hele[h].id!=undefined && hele[h].id!=null && hele[h].id!='totsize_hidden' && hele[h].id!='renewal_id' && hele[h].id!='school_key_id')
                        sum+=parseInt(hele[h].value);
                }
            }
            document.getElementById('totsize_hidden').value=sum;
            document.getElementById('totsize').innerHTML=parseFloat(sum/1000/1000).toFixed(2)+' Mb';
        }
        
        function ifscsearch(node,rtmnode){
            var reg = node.getAttribute('pattern');
            var add='';
            if(node.value.match(reg)){
                var appli_class = $("#appli_class").val();
                    $.ajax({
                        type: "POST",
                        url:baseurl+'Basic/getBankByIFSC',
                        data:"&ifsc="+node.value,
                        success: function(resp){
                            var js=JSON.parse(resp);
                            if(js!=''){
                                add+='<strong>'+js[0]['bank_name']+'<br>'+js[0]['branch']+'<br>'+js[0]['branch_add']+'</strong>';
                                rtmnode.innerHTML=add;
                                return true;
                            }
                            else{
                                if(node.value.length>1){
                                    alert("Not Valid IFSC Code - Eg.:SBIN0000930");
                                    node.value="";
                                    rtmnode.innerHTML='';
                                }
                                return false;  
                            }              
                        },
                        error: function(e){ 
                            alert('Error: ' + e.responseText);
                            rtmnode.innerHTML='';
                            return false;  
                        }
                    });
            }
            else{
                alert("Not Valid IFSC Code - Eg.: CNRB0001285");
                node.value="";
                rtmnode.innerHTML='';
                return false;
            }
        }
        
        function removefile(fileid,filenode){
            alert(fileid+'   '+filenode);
            $.ajax({
                type: "POST",
                url:baseurl+'Basic/removeFiles',
                data:"&fileid="+fileid+"&filenode="+filenode,
                success: function(resp){
                    var js=JSON.parse(resp);
                    if(js!=''){
                        return true;
                    }
                    else{
                        return false;  
                    }              
                },
                error: function(e){ 
                    alert('Error: ' + e.responseText);
                    rtmnode.innerHTML='';
                    return false;  
                }
            });
        }
    </script>
</body>
</html>
