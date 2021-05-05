<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <?php $this->load->view('head.php'); ?>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url().'asset/css/support/custom-vivek.css';?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url().'asset/css/bootstrap-multiselect.css';?>" type="text/css"/>
</head>
<!-- END HEAD -->

<body class="page-container-bg-solid page-md">
    <div class="page-wrapper">
            <?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
            <?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
            <?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 5){ ?>
            <?php $this->load->view('state/header.php'); }else{ $this->load->view('header.php'); } ?>
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
                                <!-- BEGIN PAGE TITLE -->
                                <div class="page-title">
                                    <h1>SCHOOL BASIC INFORMATION</h1>
                                </div>
                                <!-- END PAGE TITLE -->
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
                            <div class="container" style="width: 95%;">
                                <!-- BEGIN PAGE CONTENT INNER -->
                                <div class="page-content-inner">
                                       <?php $this->load->view('emis_school_profile_header1.php'); ?>
                                    <div class="portlet light portlet-fit ">
                                        <div class="portlet-body">
                                            <div class ="row">
                                                <div class="col-md-4">
                                                    <font style="color:#dd4b39;"><?php echo $this->session->flashdata('errors'); ?></font>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <form id="schoolupgradeform" method="post" action="<?php echo base_url().'Home/schoolUpgradesubmit/';?>" enctype="multipart/form-data" onsubmit="return popup(this);" >
                                                <div class="portlet light portlet-fit ">
													<div class="portlet-title">
                                                        <div class="caption col-md-12">
                                                            <i class="fa fa-book font-dark"></i>
                                                            <span class="caption-subject font-dark sbold uppercase">ADDITIONAL CLASSES / UPGRADATION</span>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="form-group col-md-12">
                                                            <div class="col-md-12 bg-primary" style="padding:5px;margin:5px 0;">
                                                                 <i class="fa fa-book"></i>
                                                                 <span class="caption-subject text-white sbold uppercase" >School Details</span>
                                                            </div>
                                                            <div class="col-md-12" style="margin:5px;">
                                                                <div class="col-md-3" style="margin:5px 0;"><label>School Name</label></div>
                                                                <div class="col-md-3" style="margin:5px 0;"><input type="text" class="form-control" id="school_name" name="school_name" onfocus="textvalidate(this.id,'emis_schoolname_alert');" onchange="textvalidate(this.id,'emis_schoolname_alert');" autocomplete="off"  placeholder="SCHOOL NAME" required="required" value="<?php echo $basic[0]->school_name; ?>" <?php if($basic[0]->school_name!=''){echo(' readonly="readonly"');} ?> /></div>
                                                                <div class="col-md-3" style="margin:5px 0;"><label>Udise Code</label></div>
                                                                <div class="col-md-3" style="margin:5px 0;">
                                                                    <input type="text" class="form-control" id="udise_code" onfocus="textvalidate(this.id,'emis_udisecode_alert');" onchange="textvalidate(this.id,'emis_udisecode_alert');" autocomplete="off"  name="udise_code" placeholder="UDISE CODE" required="required" value="<?php echo $basic[0]->udise_code; ?>" <?php if($basic[0]->udise_code!=''){echo(' readonly="readonly"');} ?> />
                                                                    <input type="hidden" name="school_key_id" id="school_key_id" value="<?php echo($this->session->userdata('emis_school_id')); ?>" />
                                                                    <input type="hidden" name="renewal_id" id="renewal_id" value="<?php echo($this->uri->segment(3,0)); ?>" />
                                                                </div>
                                                                <div class="col-md-3" style="margin:5px 0;">
                                                                    <?php $address=explode('\n',$basic[0]->address); ?>
                                                                    <label>Address Line 1</label>
                                                                </div>
                                                                <div class="col-md-3" style="margin:5px 0;">
                                                                    <input type="text" id="addressline_1" name="addressline_1" class="form-control" readonly="readonly" value="<?php echo($address[0]); ?>" />
                                                                </div>
                                                                <div class="col-md-3" style="margin:5px 0;"><label>Address Line 2</label></div>
                                                                <div class="col-md-3" style="margin:5px 0;"><input type="text" id="addressline_1" name="addressline_2" class="form-control" readonly="readonly" value="<?php echo($address[1]); ?>" /></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <div class="col-md-4">
                                                                <label for="manage_cate_id">Select Management Category <font style="color:#dd4b39;">*</font></label>
                                                                <select id="manage_cate_id" name="manage_cate_id" class="form-control" required readonly>
                                                                    <option value="<?php echo $basic[0]->manage_cate_id; ?>"><?php echo($basic[0]->manage_name); ?></option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="sch_management_id">Select Management <font style="color:#dd4b39;">*</font></label>
                                                                <select id="sch_management_id" name="sch_management_id" class="form-control" required readonly>
                                                                    <option value="<?php echo $basic[0]->sch_management_id; ?>"><?php echo($basic[0]->management); ?></option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="sch_directorate_id">Select Affiliation <font style="color:#dd4b39;">*</font></label>
                                                                <select id="sch_directorate_id" name="sch_directorate_id" class="form-control" required readonly><!--Directorate&nbsp;/&nbsp;Department&nbsp;/&nbsp;-->
                                                                    <option value="<?php echo $basic[0]->sch_directorate_id; ?>"><?php echo($basic[0]->department); ?></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <div class="col-md-12 bg-primary" style="padding:5px;margin:5px 0;">
                                                                 <i class="fa fa-book"></i>
                                                                 <span class="caption-subject text-white sbold uppercase" >School Last Recognition / Renewal Details</span>
                                                            </div>
                                                            <div class="col-md-12" style="padding:5px;">
                                                                <div class="col-md-2">Order No:</div>
                                                                <div class="col-md-2"><input type="text" class="form-control" /></div>
                                                                <div class="col-md-2">Validity Date</div>
                                                                <div class="col-md-2"><input type="date" class="form-control" /></div>
                                                                <div class="col-md-2">Order Copy</div>
                                                                <div class="col-md-2">
                                                                    <input type="file" id="lastrenewalfile" name="lastrenewalfile" class="form-control" required />
                                                                    <div id="regfilename_size"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <div class="col-md-6">
                                                                <label>Additional Classes / Upgradation</label>
                                                                <select class="form-control btn-info" id="renew_category" name="renew_category" onchange="upgradationcheck(this)" required>
                                                                    <option value="">Choose.....</option>
                                                                    <option value="3" data-low="<?php echo($basic[0]->low_class); ?>" data-high="<?php echo($basic[0]->high_class); ?>" >Additional Classes OR Upgradation</option>
                                                                    <!--<option value="4" data-low="<?php echo($basic[0]->low_class); ?>" data-high="<?php echo($basic[0]->high_class); ?>" >Additional Groups</option>-->
                                                                    <option value="2" data-low="<?php echo($basic[0]->low_class); ?>" data-high="<?php echo($basic[0]->high_class); ?>" >Tamil Medium Classes</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Classes/Group/Upgradation Levels</label>
                                                                <select id="levels" class="form-control btn-success" onchange="upgradationProcess(this)" required>
                                                                    <option value="">Choose.....</option>
                                                                    <optgroup id="upgradation" label="ADDITIONAL CLASSES OR UPGRADATION"></optgroup>
                                                                    <!--<optgroup id="groups" label="ADDITIONAL GROUPS"></optgroup>-->  
                                                                    <optgroup id="classes" label="TAMIL MEDIUM CLASS" ></optgroup>  
                                                                </select>    
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12" id="fundsandmanagement">
                                                            <?php $c='['; foreach($certificate as $cer){ $multiple='multiple="multiple"'; //if($cer['required']==1){ 
                                                                ?>
                                                            <div class="col-md-12" id="cer_<?php echo($cer['id']); ?>" style="<?php echo(($cer['id']!=17 && $cer['id']!=18)?'display:none;':''); ?>" >
                                                                <div class="col-md-12">
                                                                    <div class="<?php echo((!($cer['id']>16))?'col-md-2':'col-md-6');  ?>">
                                                                        <h4><?php echo($cer['certificatename']); ?></h4>
                                                                    </div>
                                                                     <?php if(!($cer['id']>16)){ if(strlen($c)>1){ $c.=',';}$c.=$cer['id']; $multiple=''; ?>
                                                                    <div class="col-md-2">
                                                                        <input type="text" id="cervalue_<?php echo($cer['id']); ?>" name="cervalue_<?php echo($cer['id']); ?>" class="form-control" placeholder="Paid Value" required="required"  />
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <input type="text" id="cernumber_<?php echo($cer['id']); ?>" name="cernumber_<?php echo($cer['id']); ?>" class="form-control" placeholder="Certificate/Challan Number" required="required"  />
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <input type="date" id="cerdate_<?php echo($cer['id']); ?>" name="cerdate_<?php echo($cer['id']); ?>" class="form-control" placeholder="Paid Value" required="required"  />
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <input type="text" id="cerifsc_<?php echo($cer['id']); ?>" name="cerifsc_<?php echo($cer['id']); ?>" class="form-control" placeholder="Bank IFSC Code" onblur="ifscsearch(this,document.getElementById('ifsc_<?php echo($cer['id']); ?>'))" pattern="^[A-Za-z]{4}[a-zA-Z0-9]{7}$" required="required" />
                                                                        <div id="ifsc_<?php echo($cer['id']); ?>"></div>
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="<?php echo((!($cer['id']>16))?'col-md-2':'col-md-6');  ?>">
                                                                        <!--<?php if($cer['id']==19){ ?>
                                                                        <div id="labs">
                                                                            <select id="groups_selected" class="form-control" name="groups_selected[]" multiple="multiple" onchange="selectedgroups(this)">
                                                                                
                                                                            </select>
                                                                        </div>
                                                                        <?php } ?>-->
                                                                        <!--<input type="file" id="cerfile_<?php echo($cer['id']); ?>" name="cerfile_<?php echo($cer['id']); ?>[]" class="form-control" <?php if($cer['id']==18){ ?> onchange="getAllGroupCodes(this)" required="required" <?php }elseif($cer['id']==19){ ?> style="visibility:hidden;" <?php }  echo($multiple); ?> required="required"  />-->
                                                                        <input type="file" id="cerfile_<?php echo($cer['id']); ?>" name="cerfile_<?php echo($cer['id']); ?>[]" class="form-control" <?php echo($multiple); ?> required="required"  />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php //} 
                                                            } $c.=']'; ?>
                                                        </div>
                                                        <!--<div class="col-md-12">
                                                            <div class="col-md-6" id="additionalClass">
                                                                <div class="col-md-6">
                                                                    <h4>Proof Of Additional Class Rooms</h4>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="file" id="addrooms" name="addrooms[]" multiple="multiple" class="form-control" onchange="getAllGroupCodes(this)" required="required" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6" id="qualifiedteachers">
                                                                <div class="col-md-6">
                                                                    <h4>Proof Of Fully Qualified Teachers</h4>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="file" id="quali_teacher" name="quali_teacher[]" multiple="multiple" class="form-control" onchange="getAllGroupCodes(this)" required="required" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12"  id="labs" style="display:none;">
                                                            <div class="col-md-12">
                                                                <div class="col-md-6">
                                                                    <h4>Groups</h4>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12" style="margin-top:15px;" id="labfile">
                                                                <div class="col-md-6">
                                                                    <h4>Proof Of Labs for Selected Subjects</h4>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="file" id="lab" name="lab[]" class="form-control" multiple="multiple"  />
                                                                </div>
                                                            </div>
                                                        </div>-->
                                                        <div class="form-row text-center">
                                                            <button type="submit" style="margin:40px 15px;" class="btn bg-primary" onclick="checkRequired(this.form.id)">Submit</button>
                                                            <button type="reset" style="margin:40px 15px;" class="btn bg-danger">Reset</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </form>
                                        </div>
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
    <script src="<?php echo base_url().'asset/js/bootstrap-multiselect.js';?>" type="text/javascript"></script>
    
    <script src="<?php echo base_url().'asset/js/vivekrao/generate.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/js/vivekrao/jsonpost.js';?>" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <!-- END PAGE LEVEL SCRIPTS --> 
    
    <script>
        document.getElementById('upgradation').setAttribute("disabled","disabled");
        //document.getElementById('groups').setAttribute("disabled","disabled");
        document.getElementById('classes').setAttribute("disabled","disabled");
        function upgradationcheck(node){
            var html='',cls='';
            var lowcls=node.options[node.selectedIndex].getAttribute('data-low');
            var higcls=node.options[node.selectedIndex].getAttribute('data-high');
            if(node.value==2){
                html=setApplicableClass(node);
                cls='classes';
                document.getElementById('upgradation').setAttribute("disabled","disabled");
                document.getElementById('upgradation').innerHTML='';
                //document.getElementById('groups').setAttribute("disabled","disabled");
                //document.getElementById('groups').innerHTML='';
                
                //Set Multiple
                document.getElementById('levels').setAttribute('multiple','multiple');
                document.getElementById('levels').setAttribute('name','levels[]');
            }
            else if(node.value==3){
                if(parseInt(higcls)<12){
                    html+='<option value="14">High School Upto X</option>';
                    html+='<option value="15">Higher Secondary School</option>';
                    cls='upgradation';
                }
                document.getElementById('classes').setAttribute("disabled","disabled");
                document.getElementById('classes').innerHTML='';
                //document.getElementById('groups').setAttribute("disabled","disabled");
                //document.getElementById('groups').innerHTML='';
                
                //Remove Multiple
                document.getElementById('levels').removeAttribute('multiple');
                document.getElementById('levels').setAttribute('name','levels');
            }
            else if(node.value==4){
                if(parseInt(higcls)>10){
                    html+='<option value="13">XI AND XII</option>';
                    cls='groups';
                }
                document.getElementById('classes').setAttribute("disabled","disabled");
                document.getElementById('classes').innerHTML='';
                document.getElementById('upgradation').setAttribute("disabled","disabled");
                document.getElementById('upgradation').innerHTML='';
                
                //Remove Multiple
                document.getElementById('levels').removeAttribute('multiple');
                document.getElementById('levels').setAttribute('name','levels');
            }
            if(document.getElementById(cls)){
                document.getElementById(cls).removeAttribute('disabled');
                document.getElementById(cls).innerHTML=html;
            }
            upgradationProcess(node);
        }
        
        function setApplicableClass(node){
            var low=node.options[node.selectedIndex].getAttribute('data-low');
            var high=node.options[node.selectedIndex].getAttribute('data-high');
            //alert(low+' ------ '+high);
            var html='';
            if(parseInt(low)==15){
                low=-2;
            }
            else if(parseInt(low)==14){
                low=-1;
            }
            else if(parseInt(low)==13){
                low=0;
            }
            var cl=0,cls='';
            for(var i=parseInt(low);i<=parseInt(high);i++){
                if(i==-2){cl=15;cls='PRE-KG';}
                else if(i==-1){cl=14;cls='UKG';}
                else if(i==0){cl=13;cls='LKG';}
                else{cl=i;cls=i;}
                html+='<option value="'+cl+'">'+cls+'</option>';
            }
            return html;
        }
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
                                alert("Not Valid IFSC Code");
                                node.value="";
                                rtmnode.innerHTML='';
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
               alert("Not Valid IFSC Code");
               node.value="";
               rtmnode.innerHTML='';
               return false;
           }
        }
        function getAllGroupCodes(node){
            var opt='<option value="">Choose.....</option>';
            $.ajax({
                type: "POST",
                url:baseurl+'Basic/getGroupCodes',
                data:"&schmanagement="+node.value,
                success: function(resp){
                    var js=JSON.parse(resp);
                    if(js!=''){
                        for(var j in js){
                           opt+='<option value="'+js[j]['group_code']+'" data-lab="'+js[j]['labs']+'">'+js[j]['group_name']+'</option>'; 
                        }
                        document.getElementById('groups_selected').innerHTML=opt;
                    }
                    else{
                        alert("Select Valid Groups");
                        node.value="";
                        return false;  
                    }              
                },
                error: function(e){ 
                    alert('Error: ' + e.responseText);
                    return false;  
                }
            });
        }
            
        function removefile(fileid,filenode){
            //alert(fileid+'   '+filenode);
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
        
        function upgradationProcess(node){
            var sch_dir=<?php echo($basic[0]->sch_directorate_id); ?>;
            var cerids=<?php echo($c); ?>;
            var dse =[1,5,15,17,19,20,21,22,23,24,26,31,33,2,3,16,18,27,29,32,34,42];
            var funds=document.getElementById('fundsandmanagement');
            var fundlen=0;
            for(var i=0;i<cerids.length;i++){
                document.getElementById('cervalue_'+cerids[i]).setAttribute('required','required');
                document.getElementById('cerfile_'+cerids[i]).setAttribute('required','required');
                document.getElementById('cerifsc_'+cerids[i]).setAttribute('required','required');
                document.getElementById('cernumber_'+cerids[i]).setAttribute('required','required');
                document.getElementById('cerdate_'+cerids[i]).setAttribute('required','required');
            }
            for(var i=0;i<4;i++){
                funds.children[i].style.display='none';
            }
            if(parseInt(node.value)>12){
                if(dse.indexOf(sch_dir)>0)
                {
                    if(parseInt(node.value)<13){
                        fundlen=0;
                    }
                    else{
                        fundlen=2;
                    }
                }
                else if(sch_dir==29){
                    fundlen=cerids.length;
                }
                if(parseInt(node.value)==15){
                    document.getElementById('cer_19').style.display='';
                    document.getElementById('cerfile_19').setAttribute('required','required');
                }     
            }
            else{
                document.getElementById('cer_19').style.display='none';
                document.getElementById('cerfile_19').removeAttribute('required');
            }
            
            for(var i=0;i<fundlen;i++){
                funds.children[i].style.display='';
            }
            for(var i=cerids.indexOf(parseInt(funds.children[i].id.split('_')[1]));i<cerids.length;i++){
                document.getElementById('cervalue_'+cerids[i]).removeAttribute('required');
                document.getElementById('cerfile_'+cerids[i]).removeAttribute('required');
                document.getElementById('cerifsc_'+cerids[i]).removeAttribute('required');
                document.getElementById('cernumber_'+cerids[i]).removeAttribute('required');
                document.getElementById('cerdate_'+cerids[i]).removeAttribute('required');
            }
        }
        
        
        
        function popup(node){
            swal({
               title: "Are you sure?",
               text: "You Have Validated The Form",
               type: "warning",
               showCancelButton: true,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "Yes, Save!",
               closeOnConfirm: false,
               showLoaderOnConfirm: true
                }, function(isConfirm){
               if (isConfirm) {
                    node.submit();
                    return true;
               }
               else{swal("Cancelled", "Your cancelled the student profile", "error");}
            });
            return false;
        }
        
        
        function selectedgroups(select){
              document.getElementById('cerfile_19').style.visibility='hidden';  
              document.getElementById('cerfile_19').removeAttribute('required');
              var result = [];
              var options = select && select.options;
              var opt;
            
              for (var i=0, iLen=options.length; i<iLen; i++) {
                opt = options[i];
            
                if (opt.selected) {
                  result.push(opt.getAttribute('data-lab'));
                }
              }
              
             var check=0;
             for(var i=0;i<result.length;i++){
                if(result[i]==1){
                    document.getElementById('cerfile_19').style.visibility='';
                    document.getElementById('cerfile_19').setAttribute('required','required');
                    break;
                }
             }
        }
    </script>
</body>
</html>
