<!DOCTYPE html>
    <html lang="en">
         <!--<![endif]-->
         <!-- BEGIN HEAD -->
         <head>
            <?php $this->load->view('head.php'); ?>
        
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <style>
            #antisipatedstrength div,#certificates div{
                margin:5px 0;
            }
        </style>
        </head>
         <!-- END HEAD -->
         <body style="font-size: 1.5em;">
<div class="container">
    <div class="col-md-12">
        <div class="page-logo col-md-4">
            <a href="<php echo base_url(); ?>">
                <img src="<?php echo base_url().'asset/pages/img/emis_logo.png';?>" height="75"  alt="logo" class="logo-default">
            </a>
        </div>
        <div class="col-md-7" style="margin-left:15px;">
            <h4 class="text-right" style="margin-top:30px; text-shadow:5px 5px 3px #CCC">APPLICATION FOR PERMISSION TO OPEN A NEW SCHOOL</h4>
            <h5 class="text-right"><strong><a href="">HAVING LOGIN DETAILS ? SIGN IN</a></strong></h5>
        </div>
    </div>
    <div class="col-md-12" style="margin:30px auto;">
        <div class="<?php echo($this->session->flashdata('flashMsg')['cls']); ?>" role="alert" style="display:block;width:100%;">
            <?php echo($this->session->flashdata('flashMsg')['msg']); ?>
        </div>
        <form class="form-horizontal" id="newschoolfrmsubmit" method="post" action="<?php echo(base_url()); ?>NewschoolAct/NewSchoolSubmit" onsubmit="return formsubmit(this)" enctype="multipart/form-data">
            <div class="form-group" style="box-shadow:1px 1px 15px 5px #C1C1C1;padding:25px;">
                <div class="col-md-4"><strong>NAME OF THE PROPOSED NEW SCHOOL</strong></div>
                <div class="col-md-8"><input type="text" class="form-control" id="school_name" name="school_name" required="required" maxlength="200" /></div>
            </div>
            <div class="form-group" style="box-shadow:1px 1px 15px 5px #C1C1C1;padding:25px;">
                <div class="col-md-12 bg-primary text-center"><strong>COMPLETE POSTAL ADDRESS OF THE PROPOSED NEW SCHOOL</strong></div>
                <div class="col-md-12" style="padding:5px;">
                    <div class="col-md-4">
                        <label for="addressline_1">ADDRESS LINE 1 (DOOR NO./PLOT NO.)</label>
                        <input type="text" class="form-control" id="addressline_1" name="addressline_1" required="required" onkeypress="if(this.value.length>50){return false;}" />
                    </div>
                    <div class="col-md-4">
                        <label for="addressline_2">ADDRESS LINE 2(STREET/AREA NAME)</label>
                        <input type="text" class="form-control" id="addressline_2" name="addressline_2" required="required" onkeypress="if(this.value.length>50){return false;}" />
                    </div>
                    <div class="col-md-4">
                        <label for="pincode">PINCODE</label>
                        <input type="number" class="form-control" id="pincode" name="pincode" maxlength="6" required="required" pattern="^[1-9][0-9]{6}$" onkeypress="if(this.value.length>=6){return false;}" onblur="getPincode(this)" />
                    </div>
                </div>
                <div class="col-md-12" style="border-top:1px #CCC solid;border-bottom:1px #CCC solid;padding:5px;">
                    <div class="col-md-4">
                        <label for="district_id">DISTRICT NAME</label>
                        <select id="district_id" name="district_id" class="form-control" required="required" onchange="getAllDetails(this,'edudist_id','edudist_name','edudist_id')">
                            <option value="">DISTRICT NAME</option>
                            <?php 
                            foreach($district as $dist){
                            ?>
                            <option value="<?php echo($dist->id); ?>"><?php echo($dist->district_name); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="edu_dist_id">EDUCATIONCAL DISTRICT NAME</label>
                        <select id="edudist_id" name="edu_dist_id" class="form-control" required="required" disabled="true" onchange="getAllDetails(this,'block_id','block_name','block_id')">
                            <option value="">DISTRICT NAME</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="block_id">BLOCK NAME</label>
                        <select id="block_id" name="block_id" class="form-control" required="required" disabled="true" onchange="getAllDetails(this,'block_type','block_type','urbanrural')">
                            <option value="">DISTRICT NAME</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12" style="border-bottom:1px #CCC solid;padding:5px;">
                    <div class="col-md-4">
                        <label for="urbanrural">URBAN / RURAL</label>
                        <select id="urbanrural" name="fakeurbanrural" class="form-control" required="required" disabled="true" onchange="getAllDetails(this,'zone_type_id','zone_type_name','zone_type_id','\' AND schoolnew_block.id='+document.getElementById('block_id').value);if(this.value=='Urban'){this.nextElementSibling.value=2;}else if(this.value=='Rural'){this.nextElementSibling.value=1;}">
                            <option>DISTRICT NAME</option>
                        </select>
                        <input type="hidden" id="hiddenurbanrural" name="urbanrural" value="" required="required"/>
                    </div>
                    <div class="col-md-4">
                        <label for="local_body_type_id">LOCAL BODY</label>
                        <select id="zone_type_id" name="local_body_type_id" class="form-control"  required="required" disabled="true" onchange="getAllDetails(this,'village_id','village_name','village_panchayat_id',' AND schoolnew_block.id='+document.getElementById('block_id').value);">
                            <option value="">DISTRICT NAME</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="village_panchayat_id">VILLAGE / TOWN / MUNCIPALITY</label>
                        <select id="village_panchayat_id" name="village_panchayat_id" class="form-control" required="required" disabled="true" onchange="getAllDetails(this,'habit_id','habit_name','vill_habitation_id',' AND schoolnew_block.id='+document.getElementById('block_id').value)">
                            <option value="">DISTRICT NAME</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12" style="padding:5px;">
                    <div class="col-md-4">
                        <label for="vill_habitation_id">VILLAGE / WARD</label>
                        <select id="vill_habitation_id" name="vill_habitation_id" class="form-control" required="required" disabled="true" onchange="getAllDetails(this,'parliment_id','parliment_name','parliament_id',' AND schoolnew_block.id='+document.getElementById('block_id').value)">
                            <option value="">DISTRICT NAME</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="parliament_id">PARLIMENT CONSTITUENCY</label>
                        <select id="parliament_id" name="parliament_id" class="form-control" disabled="true" required="required" onchange="getAllDetails(this,'assembly_id','assembly_name','assembly_id',' AND schoolnew_block.id='+document.getElementById('block_id').value)">
                            <option value="">DISTRICT NAME</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="assembly_id">ASSEMBLY CONSTITUENCY</label>
                        <select id="assembly_id" name="assembly_id" class="form-control" disabled="true" required="required" onchange="getAllDetails(this,'std_code_id','std_code','off_std_code',' AND schoolnew_block.id='+document.getElementById('block_id').value);getAllDetails(this,'std_code_id','std_code','corr_std_code',' AND schoolnew_block.id='+document.getElementById('block_id').value)">
                            <option value="">DISTRICT NAME</option>
                        </select>
                    </div>
                    
                </div>
            </div>
            <div class="form-group" style="box-shadow:1px 1px 15px 5px #C1C1C1;padding:25px;">
                <div class="col-md-12 bg-primary text-center"><strong>COMPLETE COMMUNICATION OF THE PROPOSED NEW SCHOOL</strong></div>
                <div class="col-md-12" style="padding:5px;">
                    <div class="col-md-4">
                        <label for="doorno">OFFICE/SCHOOL LANDLINE</label>
                        <div class="col-md-12" style="padding:0;">
                            <div class="col-md-4" style="margin:0;">
                                <select id="off_std_code" name="school_stdcode" class="form-control" required="required" onchange="stdandlenthrest(this,document.getElementById('school_landline'))">
                                    <option>STD</option>
                                </select>
                            </div>
                            <div class="col-md-8"><input type="number" class="form-control" id="school_landline" required="required" name="school_landline" disabled="true" onblur="vailidatePhone(this,this.parentNode.previousElementSibling.children[0])" /></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="doorno">CORRESPONDENT/HM LANDLINE</label>
                        <div class="col-md-12" style="padding:0;">
                            <div class="col-md-4" style="margin:0;">
                                <select id="corr_std_code" name="corr_hm_stdcode" class="form-control" required="required" onchange="stdandlenthrest(this,document.getElementById('corr_hm_landline'))">
                                    <option>STD</option>
                                </select>
                            </div>
                            <div class="col-md-8"><input type="number" class="form-control" required="required" id="corr_hm_landline" name="corr_hm_landline" disabled="true" onblur="vailidatePhone(this,this.parentNode.previousElementSibling.children[0])"/></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="mobile">OFFICE MOBILE</label>
                        <input type="number" class="form-control" id="mobile" name="mobile" pattern="/(6|7|8|9)\d{9}/" onkeypress="if(this.value.length>=10){return false;}"/>
                    </div>
                </div>
                <div class="col-md-12" style="border-top:1px #CCC solid;padding:5px;">
                    <div class="col-md-4">
                        <label for="corr_hm_mobile">CORRESPONDENT/HM MOBILE</label>
                        <input type="number" class="form-control" id="corr_hm_mobile" name="corr_hm_mobile" required="required" onkeypress="if(this.value.length>=10){return false;}" />
                    </div>
                    <div class="col-md-4">
                        <label for="email">SCHOOL EMAIL</label>
                        <input type="email" class="form-control" id="email" name="email" required="required" onblur="vailidateEmail(this)"/>
                    </div>
                    <div class="col-md-4">
                        <label for="website">WEBSITE</label>
                        <input type="url" class="form-control" id="website" name="website" />
                    </div>
                </div>
            </div>
            <div class="form-group" style="box-shadow:1px 1px 15px 5px #C1C1C1;padding:25px;">
                <div class="col-md-12 bg-primary text-center" style="margin-bottom:8px;"><strong>ACADEMIC YEAR IN WHICH ITS IS PROPOSED TO OPEN THE NEW SCHOOL</strong></div>
                <input type="text" class="form-control" id="academic_year" required="required" readonly="readonly" name="academic_year" value="<?php if(date("m",strtotime("now"))<6){echo((date("Y",strtotime("now"))-1)."-".(date("Y",strtotime("now"))));}else{echo((date("Y",strtotime("now")))." - ".(date("Y",strtotime("now"))+1));} ?>"/>
            </div>
            <div class="form-group" style="box-shadow:1px 1px 15px 5px #C1C1C1;padding:25px;">
                <div class="col-md-12 bg-primary text-center" style="margin-bottom:8px;"><strong>PROPOSED BOARD OF AFFILIATION : STATE BOARD / OTHER BOARD</strong></div>
                 <div class="col-md-6" style="padding:5px;">
                    <input type="hidden" id="manage_cate_id" name="manage_cate_id" value="3" />
                    <select class="form-control" id="sch_management_id" name="sch_management_id" required="required" onchange="getAllDetails(this,'depart_id','department','sch_directorate_id')">
                        <option value="">MANAGEMENT</option>
                        <?php
                        foreach($management as $mg){
                        ?>
                        <option value="<?php echo($mg['id']);?>"><?php echo($mg['management']);?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6" style="padding:5px;">
                    <select class="form-control" id="sch_directorate_id" name="sch_directorate_id" required="required" >
                        <option value="">DIRECTORATE</option>
                    </select>
                </div>
            </div>
            <div class="form-group" style="box-shadow:1px 1px 15px 5px #C1C1C1;padding:25px;">
                <div class="col-md-12 bg-primary text-center" style="margin-bottom:8px;"><strong>DETAILS OF EDUCATIONAL AGENCY WHICH PROPOSES TO OPEN THE SCHOOL</strong></div>
                <div class="col-md-12">
                    <div class="col-md-4" style="padding:5px;">
                        <label for="">A) SOCIETY / TRUST / COMPANY NAME</label>
                        <input type="text" class="form-control" id="trust_name" name="trust_name" required="required"  />
                    </div>
                    <div class="col-md-4" style="padding:5px;">
                        <label>B) REGISTRATION NUMBER AND DATE</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="reg_number" name="trustreg_number" required="required"  placeholder="REGISTRATION NUMBER" maxlength="15"/>
                        </div>
                        <div class="col-md-7">
                            <input type="date" class="form-control" id="reg_date" name="trustdate" required="required" placeholder="REGISTRATION DATE" min="1980-01-01" max="<?php echo(date("Y-m-d",strtotime("now-12hours"))) ?>" />
                        </div>
                    </div>
                    <div class="col-md-4" style="padding:5px;">
                        <label>C) BYE-LAW / TRUST DEED / MEMORANDUM</label>
                        <input type="file" id="certificate_9" name="certificate_9" class="form-control" required="required" />
                    </div>
                </div>
                <div class="col-md-12" style="border-top:1px #CCC solid;padding:5px;">
                    <div class="col-md-4" style="padding:5px;">
                        <label for="">D) FINANCIAL SOUNDNESS OF THE EDUCATIONAL AGENCY</label>
                        <input type="radio" class="custom-form-control" id="finance_sound1" name="finance_sound" required="required"  />
                        <label for="finance_sound1">YES</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" class="custom-form-control" id="finance_sound2" name="finance_sound" required="required"  />
                        <label for="finance_sound2">NO</label>
                    </div>
                    <div class="col-md-4" style="padding:5px;">
                        <label for="">E) ANY OTHER SCHOOL(S) RUN BY THE EDUCATIONAL AGENCY</label>
                        <input type="radio" class="custom-form-control" id="schrun1" name="anyother_schools" value="1" required="required" onchange="wheathercheckdisplay(this,this.parentNode.nextElementSibling)"   />
                        <label for="finance_sound1">YES</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" class="custom-form-control" id="schrun2" name="anyother_schools" value="0" required="required" onchange="wheathercheckdisplay(this,this.parentNode.nextElementSibling)"   />
                        <label for="finance_sound2">NO</label>
                    </div>
                    <div class="col-md-12" style="padding:10px;box-shadow:0.5px 0.5px 1px 0.5px #999;">
                        <div class="col-md-12 bg-warning">
                            <div class="col-md-3" style="padding:2px;">NAME OF THE SCHOOL(S)</div>
                            <div class="col-md-4" style="padding:2px;">ADDRESS OF SCHOOL(S)</div>
                            <div class="col-md-3" style="padding:2px;">COPIES OF NOC / OPENING PERMISSION / RECOGNITION WHICHEVER IS APPLICABLE.</div>
                            <div class="col-md-2" style="padding:2px;">OPERATION</div>
                            <input type="hidden" id="trustentry" name="trustentry" value="newschool_trustentry" />
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-3" style="padding:2px;"><input type="text" id="trustname_0" name="trustname_0" class="form-control" placeholder="Name Of The Insitution"/></div>
                            <div class="col-md-4" style="padding:2px;"><textarea rows="4" id="trustplace_0" name="trustplace_0" class="form-control" placeholder="Address Of The Insitution"></textarea></div>
                            <div class="col-md-3" style="padding:2px;"><input type="file" id="trustfile_0" name="trustfile_0" class="form-control" /></div>
                            <div class="col-md-2" style="padding:2px;"><a class="btn btn-success" href="javascript:void(0);" onclick="callTwoFunctions(this.parentNode.parentNode,1,'div','col-md-12')"><i class="glyphicon glyphicon-plus"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="javascript:void(0);" onclick="callTwoFunctions(this.parentNode.parentNode,0)"><i class="glyphicon glyphicon-minus"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group" style="box-shadow:1px 1px 15px 5px #C1C1C1;padding:25px;">
                <div class="col-md-12 bg-primary text-center" style="margin-bottom:8px;"><strong>LAND OWNERSHIP DETAILS</strong></div>
                <div class="col-md-12">
                    <div class="col-md-3">
                        <label for="sqft">(i) EXTENT OF LAND IN Sq.ft. IN THE NAME OF THE SCHOOL AND SURVERY NUMBERS</label>
                    </div>
                    <div class="col-md-3">
                        <label for="sqft">Square Feet</label>
                        <input type="number" class="form-control" id="sqft" name="totland_sq" step="any" required="required" onchange="convertionofvalues(this.id)" onkeypress="if(this.value.length>10){return false;}"  />
                    </div>
                    <div class="col-md-3">
                        <label for="sqft">Square Metre</label>
                        <input type="number" class="form-control" id="sqm" name="totland_sqm" step="any" required="required"  onchange="convertionofvalues(this.id)" onkeypress="if(this.value.length>7){return false;}" />
                    </div>
                    <div class="col-md-3">
                        <label for="sqft">Acre</label>
                        <input type="number" class="form-control" id="acre" name="totland_acre" step="any" required="required" onchange="convertionofvalues(this.id)" onkeypress="if(this.value.length>4){return false;}"  />
                    </div>
                </div>
                <div class="col-md-12" style="margin:10px 0;">
                    <div class="col-md-6">
                        <label for="document">(ii) DETAILS OF LAND DOCUMENT</label>
                    </div>
                    <div class="col-md-3"> 
                       <select class="form-control" id="landowner" name="landowner" required="required">
                            <option value="">SELECT</option>
                            <option value="3">SALE DEED</option>
                            <option value="5">CONVEYANCE DEED</option>
                            <option value="4">GIFT DEED</option>
                            <option value="2">LEASE DEED</option>
                            <option value="1">RENTAL AGREEMENT</option>
                       </select>
                    </div>
                    <div class="col-md-3">
                       <input type="file" class="form-control" id="certificate_7" name="certificate_7" required="required" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <label for="document">(iii) REGISTRATION NUMBER AND DATE OF THE DOCUMENT</label>
                    </div>
                    <div class="col-md-3">
                       <input type="text" class="form-control" id="regdoc_number" name="landregnumber" />
                    </div>
                    <div class="col-md-3">
                       <input type="date" class="form-control" id="regdoc_date" name="landregdate" min="1980-01-01"  max="<?php echo(date("Y-m-d",strtotime("now-12hours"))) ?>" />
                    </div>
                </div>
            </div>
            <div class="form-group" style="box-shadow:1px 1px 15px 5px #C1C1C1;padding:25px;">
                <div class="col-md-12 bg-primary text-center" style="margin-bottom:8px;"><strong>APPROVED LAYOUT COPY TO BE UPLOADED</strong></div>
                <div class="col-md-6">APPROVED LAYOUT COPY</div>
                <div class="col-md-6"><input type="file" class="form-control" id="certificate_11" name="certificate_11" /></div>
            </div>
            <div class="form-group" style="box-shadow:1px 1px 15px 5px #C1C1C1;padding:25px;">
                <div class="col-md-12 bg-primary text-center" style="margin-bottom:8px;"><strong>MEDIUM OF INSTRUCTION</strong></div>
                <div class="col-md-6">MEDIUM OF INSTRUCTION</div>
                <div class="col-md-3">
                    <label for="medium1">English&nbsp;&nbsp;&nbsp;</label>
                    <input type="checkbox" id="medium1" name="medium_id[]" value="16"  />
                </div>
                <div class="col-md-3">
                    <label for="medium2">Tamil&nbsp;&nbsp;&nbsp;</label>
                    <input type="checkbox" id="medium2" name="medium_id[]" value="19"  />
                </div>
            </div>
            <div class="form-group" style="box-shadow:1px 1px 15px 5px #C1C1C1;padding:25px;">
                <div class="col-md-12 bg-primary text-center" style="margin-bottom:8px;"><strong>PROPOSED CATEGORY OF SCHOOL</strong></div>
                <div class="col-md-4">SCHOOL CATEGORY</div>
                <div class="col-md-3">
                    <select class="form-control" id="schoolcat" name="schoolcat" onchange="setSchoolCategory(this)" required="required">
                        <option>CATEGORY</option>
                        <option value="1" data-low="13" data-high="14" data-km="1">PLAY SCHOOL (LKG-UKG)</option>
                        <option value="1" data-low="13" data-high="5" data-km="1">NURSERY AND PRIMARY (LKG-V)</option>
                        <option value="2" data-low="1" data-high="5" data-km="1">PRIMARY SCHOOL (I-V)</option>
                        <option value="3" data-low="13" data-high="8" data-km="3">MIDDLE SCHOOL (LKG-VII)</option>
                        <option value="3" data-low="1" data-high="8" data-km="3">MIDDLE SCHOOL (I-VII)</option>
                        <option value="4" data-low="13" data-high="10" data-km="5">HIGH SCHOOL (LKG-X)</option>
                        <option value="4" data-low="1" data-high="10" data-km="5">HIGH SCHOOL (I-X)</option>
                        <option value="4" data-low="6" data-high="10" data-km="5">HIGH SCHOOL (VI-X)</option>
                        <option value="5" data-low="13" data-high="12" data-km="8">HIGHER SECONDARY SCHOOL (LKG-XII)</option>
                        <option value="5" data-low="1" data-high="12" data-km="8">HIGHER SECONDARY SCHOOL (I-XII)</option>
                        <option value="5" data-low="6" data-high="12" data-km="8">HIGHER SECONDARY SCHOOL (VI-XII)</option>
                        <option value="5" data-low="11" data-high="12" data-km="8">HIGHER SECONDARY SCHOOL (XI-XII)</option>
                    </select>
                </div>
                <div class="col-md-5">
                    <div class="col-md-6">
                        <select id="lowerclass" name="low_class" class="form-control" disabled="true">
                            <option>FROM</option>
                            <?php
                            foreach($cls as $c){
                                if($c->id>15){
                                    break;
                                }else{
                            ?>
                            <option value="<?php echo($c->id) ?>"><?php echo($c->class_studying); ?></option>
                            <?php
                                }
                            } 
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select id="higherclass" name="high_class" class="form-control" disabled="true">
                            <option>TO</option>
                            <?php
                            foreach($cls as $c){
                                if($c->id>15){
                                    break;
                                }else{
                            ?>
                            <option value="<?php echo($c->id) ?>"><?php echo($c->class_studying); ?></option>
                            <?php
                                }
                            } 
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group" style="box-shadow:1px 1px 15px 5px #C1C1C1;padding:25px;">
                <div class="col-md-12 bg-primary text-center" style="margin-bottom:8px;"><strong>ANTICIPATED STRENGTH OF PUPIL IN STANDARD</strong></div>
                <div class="col-md-12">
                    <div class="col-md-6">STANDARD</div>
                    <div class="col-md-6">ANTICIPATED STRENGTH</div>
                </div>
                <input type="hidden" id="antistrength" name="antistrength" value="newschool_antisipatedstrength" />
                <div class="col-md-12" id="antisipatedstrength">
                    <div class="col-md-12">
                        <div class="col-md-6"><select id="std_0" name="std_0" class="form-control" disabled="true" required="required">
                            <option>STANDARD</option>
                            <?php
                            foreach($cls as $c){
                                if($c->id>15){
                                    break;
                                }else{
                            ?>
                            <option value="<?php echo($c->id) ?>"><?php echo($c->class_studying); ?></option>
                            <?php
                                }
                            } 
                            ?>
                        </select></div>
                        <div class="col-md-6"><input type="number" class="form-control" id="str_0" name="str_0" value="0" required="required" onkeypress="if(this.value.length>3){return false;}"  /></div>
                        <div class="col-md-2" style="padding:2px;display:none;"><a class="btn btn-success" href="javascript:void(0);" onclick="callTwoFunctions(this.parentNode.parentNode,1,'div','col-md-12')"><i class="glyphicon glyphicon-plus"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="javascript:void(0);" onclick="callTwoFunctions(this.parentNode.parentNode,0)"><i class="glyphicon glyphicon-minus"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="form-group" style="box-shadow:1px 1px 15px 5px #C1C1C1;padding:25px;">
                <div class="col-md-12 bg-primary text-center" style="margin-bottom:8px;"><strong>LIST OF SCHOOLS WITH &nbsp;<span class="text-warning range">0</span>&nbsp;KM&nbsp;(DEPENING ON SCHOOL CATEGORY)</strong></div>
                <div class="col-md-12">
                    <div class="col-md-5">SCHOOL NAME</div>
                    <div class="col-md-5">DISTANCE IN METRES</div>
                    <div class="col-md-2">OPERATION</div>
                </div>
                <input type="hidden" id="school_distance" name="school_distance" value="newschool_distanceofschools" />
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="col-md-5"><input list="schoolnames_0" class="form-control" id="schname_0" name="schname_0" value="" placeholder="SCHOOL NAME" onkeyup="if(this.value.length>2 && document.getElementById('district_id').value!=''){getAllDetails(this,'udise_code','school_name',this.nextElementSibling.id,'%\' AND district_id='+document.getElementById('district_id').value);}" onchange="dataselect(this);" required />
                        <datalist id="schoolnames_0">
                            
                        </datalist>
                        <input type="hidden" id="schoolid_0" name="schoolid_0" value="" required="required" />
                        </div>
                        <div class="col-md-5"><input type="number" class="form-control" id="distance_0" name="distance_0" value="" placeholder="100" required="required" onkeypress="if(this.value.length>4){return false;}" /></div>
                        <div class="col-md-2" style="padding:2px;">
                            <a class="btn btn-success" href="javascript:void(0);" onclick="callTwoFunctions(this.parentNode.parentNode,1,'div','col-md-12')">
                                <i class="glyphicon glyphicon-plus"></i>
                            </a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-danger" href="javascript:void(0);" onclick="callTwoFunctions(this.parentNode.parentNode,0,'div','col-md-12')">
                                <i class="glyphicon glyphicon-minus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group" style="box-shadow:1px 1px 15px 5px #C1C1C1;padding:25px;">
                <div class="col-md-12 bg-primary text-center" style="margin-bottom:8px;"><strong>WHETHER THERE IS ANY NATURAL BARRIER WITHIN &nbsp;<span class="text-warning range">0</span>&nbsp;KM&nbsp;(DEPENING ON SCHOOL CATEGORY)</strong></div>
                <div class="col-md-6">
                   <label for="">ANY NATURAL BARRIER WITHIN RANGE</label><br />
                   <input type="radio" class="custom-form-control" id="natbarrier1" value="1" name="natural_barrier" onchange="document.getElementById('nat_bar').removeAttribute('readonly');" />
                   <label for="finance_sound1">YES</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <input type="radio" class="custom-form-control" id="natbarrier2" value="0" name="natural_barrier" onchange="document.getElementById('nat_bar').setAttribute('readonly','true');"  />
                   <label for="finance_sound2">NO</label> 
                </div>
                <div class="col-md-6">
                    <label for="nat_bar">Kindly Furnish Details about the Natural Barrier</label>
                   <textarea id="nat_bar" name="barrier_details" class="form-control" rows="3" readonly="true"></textarea> 
                </div>
            </div>
            <div class="form-group" style="box-shadow:1px 1px 15px 5px #C1C1C1;padding:25px;">
                <div class="col-md-12 bg-primary text-center" style="margin-bottom:8px;"><strong>WHETHER EDUCATIONAL AGENCY PROPOSES TO OPEN A NEW SCHOOL IN THE PREMISES WITH BUILDING</strong></div>
                <div class="col-md-12">
                    <div class="col-md-6">
                       <label for="">DO YOU HAVE BUILDING</label>
                    </div>
                    <div class="col-md-6">
                        <input type="radio" class="custom-form-control" id="with_premises1" name="with_premises" value="1" onchange="wheathercheckdisplay(this,this.parentNode.parentNode.nextElementSibling)"  />
                        <label for="finance_sound1">YES</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" class="custom-form-control" id="with_premises2" name="with_premises" value="0" onchange="wheathercheckdisplay(this,this.parentNode.parentNode.nextElementSibling)"  />
                        <label for="finance_sound2">NO</label> 
                    </div>
                </div>
                <div class="col-md-12" id="certificates" style="padding:10px;box-shadow:0.5px 0.5px 1px 0.5px #999;">
                    <input type="hidden" id="hiddencertificates" name="hiddencertificates" value="schoolnew_renewalfiles" />
                    <div class="col-md-12">
                        <div class="col-md-6">BUILDING PLAN APPROVAL FROM DTCP/CMDA/LPA</div>
                        <div class="col-md-6"><input type="file" class="form-control" id="certificate_5" name="certificate_5" /></div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">THE STRUCTURAL STABLILITY CERTIFICATE FROM ENGINEERS OF PUBLIC WORKS, DEPARTMENT/CHARTERED ENGINEERS (in the panel of qualified and registered Engineers maintained by the District Collectors) IN ACCORDANCE WITH TAMIL NADU PUBLIC BUILDING (LICENSING) ACT,1965 (TAMIL NADU ACT 13 of 1965)</div>
                        <div class="col-md-6"><input type="file" class="form-control" id="certificate_1" name="certificate_1" /></div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">BUILDING LICENSE ISSUED BY THE REVENUE COMPETENT AUTHORITY OF THE REVENUE DEPARTMENT IN ACCORDANCE WITH TAMIL NADU PUBLIC BUILDINGS(LICENSING) ACT,1965 (TAMIL NADU ACT 13of 1965)</div>
                        <div class="col-md-6"><input type="file" class="form-control" id="certificate_2" name="certificate_2" /></div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">SANITARY CERTIFICATE ISSUED BY THE LOCAL HEALTH AUTHORITIES</div>
                        <div class="col-md-6"><input type="file" class="form-control" id="certificate_3" name="certificate_3" /></div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">NO OBJECTION CERTIFICATE FROM THE STATION OFFICER, FIRE AND RESCUE SERVICE DEPARTMENT IN THE AREA IN WHICH THE SCHOOL IS SITUATED.</div>
                        <div class="col-md-6"><input type="file" class="form-control" id="certificate_4" name="certificate_4" /></div>
                    </div>
                </div>
            </div>
            <div class="form-group" style="box-shadow:1px 1px 15px 5px #C1C1C1;padding:25px;">
                <div class="col-md-12 bg-primary text-center" style="margin-bottom:8px;"><strong>DETAILS OF PAYMENT OF APPLICATION FEE</strong></div>
                <div class="col-md-4">
                    <label for="fee_amount">FEE AMOUNT</label>
                    <input type="number" class="form-control" id="fee_amount" name="amount" onkeypress="if(this.value.length>5){return false;}" />
                </div>
                <div class="col-md-4">
                    <label for="fee_date">DATE OF REMITTANCE</label>
                    <input type="date" class="form-control" id="fee_date" name="challan_date" min="="<?php echo(date("Y-m-d",strtotime("now-7day"))) ?>"" max="<?php echo(date("Y-m-d",strtotime("now-12hours"))) ?>" />
                </div>
                <div class="col-md-4">
                    <label for="fee_challan">CHALLAN SCANNED COPY</label>
                    <input type="file" class="form-control" id="fee_challan" name="fee_challan" />
                    <input type="hidden" id="applied_category" name="applied_category" value="5" />
                    <input type="hidden" id="part_1" name="part_1" value="1" />
                    <input type="hidden" id="part_2" name="part_2" value="1" />
                    <input type="hidden" id="part_3" name="part_3" value="1" />
                    <input type="hidden" id="final_flag" name="final_flag" value="1" />
                </div>
            </div>
            <div class="form-group" style="box-shadow:1px 1px 15px 5px #C1C1C1;padding:15px;">
                <div class="col-md-6 text-left"><input type="reset" class="btn btn-danger" /></div>
                <div class="col-md-6 text-right"><input type="submit" class="btn btn-success" /></div>
            </div>
        </form>
    </div>
</div> 
<script src="<?php echo base_url().'asset/js/vivekrao/generate.js';?>" type="text/javascript"></script>
<script>
    document.getElementById('schrun2').checked=true;
    document.getElementById('schrun2').onchange();
    document.getElementById('with_premises2').checked=true;
    document.getElementById('with_premises2').onchange();
    document.getElementById('natbarrier2').checked=true;
    document.getElementById('natbarrier2').onchange();
    
    var groupBy = function(xs, key) {
        return xs.reduce(function(rv, x) {
            (rv[x[key]] = rv[x[key]] || []).push(x);
            return rv;
        }, {});
    };
    function groupValue(allValue,searchIndex,eleid){
        var opt='<option value="">SELECT</option>';
            for(var i in allValue){
                opt+='<option value="'+i+'">'+allValue[i][0][searchIndex]+'</option>';
            }
            document.getElementById(eleid).innerHTML=opt;
            document.getElementById(eleid).disabled=false;
    } 
    
    function getAllDetails(node,grpkey,searchIndex,eleid,para=""){
        if(node.id=='district_id'){
            if(document.getElementById('pincode').value==null || document.getElementById('pincode').value==""){
                alert("Kindly Enter Pincode of Your School");
                node.value="";
                return false;
            }
        }
        if(node.value!='' && node.value!=null && node.value!='undefined'){
            $.ajax({
                    type: "POST",
                    url:baseurl+'NewschoolAct/getAllDetails/',
                    data:"&cond="+node.id+"&condval="+node.value+para,
                    beforeSend: function(){
                        $("#"+eleid).html('<option class="optania">LOADING....</option>');
                    },
                    success: function(resp){
                        groupValue(groupBy(JSON.parse(resp),grpkey),searchIndex,eleid);
                        return true;              
                    },
                    error: function(e){ 
                    alert('Error: ' + e.responseText);
                    return false;  
                }
            });
        }
    }
    function setSchoolCategory(node){
        var low=node.options[node.selectedIndex].getAttribute('data-low');
        var high=node.options[node.selectedIndex].getAttribute('data-high');
        var km=node.options[node.selectedIndex].getAttribute('data-km');
        var lnode=document.getElementById('lowerclass');
        var hnode=document.getElementById('higherclass');
        lnode.value=low;
        hnode.value=high;
        var range=document.querySelectorAll(".range");
        for(var i in range){
           if(range[i] instanceof HTMLSpanElement){
                range[i].innerHTML=km;
           }
        }
        var clslow=low,clshig=high;
        if(clslow==13){
            clslow=-1;
        }else if(clslow==14){
            clslow=0;
        }
        
        if(clshig==13){
            clshig=-1;
        }else if(clshig==14){
            clshig=0;
        }
        
        var anti=document.getElementById('antisipatedstrength');
        var clval,ch=0;
        //alert(anti.children.length);
        for(var i=anti.children.length;i>1;i--){
            anti.children[i-1].children[2].children[1].onclick();
        }
        
        for(var i=clslow;i<=clshig;i++,ch++){
            if(i==-1){clval=13;}else if(i==0){clval=14;}else{clval=i;}
            if(ch==0){
                document.getElementById('std_'+ch).value=clval;
            }else{
                if(!document.getElementById('std_'+ch)){
                    anti.children[ch-1].children[2].children[0].onclick();
                }
                document.getElementById('std_'+ch).value=clval;
            }
        }
        
    }
    function formsubmit(frmstr){
        //alert(frmstr.id);
        //event.preventDefault();
        var idarr=new Array();var z=0;
        for(var i=0;i<frmstr.elements.length;i++){
            if(frmstr.elements[i].disabled){
                frmstr.elements[i].disabled=false;
                idarr[z++]=frmstr.elements[i].id;
            }
        }
        //alert(JSON.stringify(idarr));
        if(!checkRequired(frmstr.id,0,'','','false')){
            for(var i=0;i<idarr.length;i++){
                document.getElementById(idarr[i]).disabled=true;
            }
            return false;
        }
        
        return true;
    }
    function wheathercheckdisplay(node,disnode){
        if(node.checked){
            if(node.value==1){
                disnode.style.display="";
            }else{
                disnode.style.display="none"
            }
        }
    }
    function stdandlenthrest(std1,landline){
        var stdval=std1.options[std1.selectedIndex].text;
        var stdlen=stdval.length;
        var asslen=11-stdlen;
        landline.setAttribute('maxlength',asslen);
        landline.setAttribute('pattern','^[1-9][0-9]{'+asslen+'}$');
        landline.removeAttribute('disabled');
        landline.setAttribute("onkeypress","if(this.value.length>="+asslen+"){return false;}")
    }
    function convertionofvalues(nodeid){
        
        switch(nodeid){
            case 'sqft':{
                document.getElementById('sqm').value=(parseFloat(document.getElementById('sqft').value)/parseFloat('10.764')).toFixed(3);
                document.getElementById('acre').value=(parseFloat(document.getElementById('sqft').value)/parseFloat('43560')).toFixed(3);
                break;
            }
            case 'sqm':{
                document.getElementById('sqft').value=(parseFloat(document.getElementById('sqm').value)*parseFloat('10.764')).toFixed(3);
                document.getElementById('acre').value=(parseFloat(document.getElementById('sqm').value)/parseFloat('4046.86')).toFixed(3);
                break;
            }
            case 'acre':{
                document.getElementById('sqft').value=(parseFloat(document.getElementById('acre').value)*parseFloat('43560')).toFixed(3);
                document.getElementById('sqm').value=(parseFloat(document.getElementById('acre').value)*parseFloat('4046.86')).toFixed(3);
                break;
            }
        }
    }
    
    function dataselect(node){
        alert(node.id);
        for(var i=0;i<node.nextElementSibling.children.length;i++){
            if(node.value==node.nextElementSibling.children[i].value){
                node.value=node.nextElementSibling.children[i].innerHTML;
                document.getElementById('schoolid_'+(node.id.split('_')[1])).value=node.nextElementSibling.children[i].value;
            }
        }
    }
    
    function getPincode(node){
        var url="https://api.data.gov.in/resource/04cbe4b1-2f2b-4c39-a1d5-1c2e28bc0e32?api-key=579b464db66ec23bdd000001f29b48af7b1440167733a2a76adf5080&format=json&offset=0&limit=10&filters[pincode]="+node.value;
        var disnode=document.getElementById('district_id');
        if(node.value!=""){
            $.ajax({
                    type: "GET",
                    url:url,
                    data:null,
                    success: function(resp){
                        var js=JSON.parse(JSON.stringify(resp));
                        if(js['total']>0){
                            //alert(js['records'][0]['districtname']);
                            for(var i=0;i<disnode.children.length;i++){
                                if(disnode.children[i].innerHTML.toLocaleLowerCase()==js['records'][0]['districtname'].toLocaleLowerCase()){
                                    disnode.children[i].setAttribute("selected","selected");
                                    disnode.onchange();
                                }
                            }
                            return true; 
                        }else{
                            alert("PINCODE NOT FOUND : "+node.value );
                            node.value="";
                            node.focus();
                        }
                                     
                    },
                    error: function(e){ 
                    alert('Error: ' + e.responseText);
                    return false;  
                }
            });
        }
    }
    function vailidateEmail(node){
        //var url="http://apilayer.net/api/check?access_key=35625ba236ad958e656937b2ff247a16&email="+node.value+"&smtp=1&format=1"
        var url="https://truemail.io/api/v1/verify/single?address_info=1&timeout=100&access_token=NBfQDsRTvWGBzzxDgp5JUMeZNh0eiTcsqS89iEmhEweLbWL86vVvOeA1sS3AxaA2&email="+node.value;
        if(node.value!=""){
            $.ajax({
                    type: "GET",
                    url:url,
                    data:null,
                    success: function(resp){
                        var js=JSON.parse(JSON.stringify(resp));
                        //alert(JSON.stringify(resp));
                        if(js['result']=='valid'){
                            return true;
                        }else if(js['result']=='invalid'){
                            alert("Your Email Address is Not Deliverable!");
                            node.value="";
                            node.focus();
                            return false;
                        }
                    },
                    error: function(e){ 
                    alert('Error: ' + e.responseText);
                    return false;  
                }
            });
        }
    }
    function vailidatePhone(phone,std){
        return true;
        var phoneNumber=std.options[std.selectedIndex].text+phone.value;
        var url="http://apilayer.net/api/validate?access_key=c198c7b6574ee4ce361d0b59936fa6e3&number="+phoneNumber+"&country_code=IN&format=1"
        if(phone.value!=""){
            $.ajax({
                    type: "GET",
                    url:url,
                    data:null,
                    success: function(resp){
                        var js=JSON.parse(JSON.stringify(resp));
                        //alert(JSON.stringify(resp));
                        if(js['valid']){
                            return true;
                        }else if(!js['valid']){
                            alert("Your Phone Number is Not Vaild!");
                            phone.value="";
                            phone.focus();
                            return false;
                        }
                    },
                    error: function(e){ 
                    alert('Error: ' + e.responseText);
                    return false;  
                }
            });
        }
    }
</script>
<?php $this->load->view('footer.php'); ?>
<?php $this->load->view('scripts.php'); ?>
</body>
</html>