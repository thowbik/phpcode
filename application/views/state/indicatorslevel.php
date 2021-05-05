<?php 

    //print_r($group);
    
    $append="";
    switch($this->uri->segment(3,0)){
        case 1:$append='p';$score=35;break;
        case 2:$append='m';$score=15;break;
        case 3:$append='a';$score=20;break;
        case 4:$append='d';$score=10;break;
        case 5:$append='c';$score=10;break;
        case 6:$append='i';$score=10;break;
        case 7:$append='b';$score=50;break;
        case 8:$append='l';$score=25;break;
        case 9:{
            if($this->uri->segment(4,0)!=0||$this->uri->segment(4,0)!=""){
                $append='dtavg_';
            }
            else{
               $append='state_'; 
            }
            $score=25;
            break;
        }
    }
?>


<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
      <style type="text/css">
  .panel-heading span {
    margin-top: -20px;
    font-size: 15px;
}
.tablecolor
{
    background-color: #32c5d2; 
}
</style>
    
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL STYLES -->
    
       <style type="text/css">
            #breadcrumbs{
                padding:1% 2.5%;
                background-color:#2bbaa5;
                width:100%;
                color:whitesmoke;
                margin-top: 2%;
            }
            #breadcrumbs a{
                color:whitesmoke;
                padding:2px;
            }
            #breadcrumbs a{
    -webkit-animation: color-change 2s infinite;
    -moz-animation: color-change 2s infinite;
    -o-animation: color-change 2s infinite;
    -ms-animation: color-change 2s infinite;
    animation: color-change 2s infinite;
}

@-webkit-keyframes color-change {
    0% { color: whitesmoke; }
    50% { color: #2bbaa5; }
    100% { color: whitesmoke; }
}
@-moz-keyframes color-change {
    0% { color: whitesmoke; }
    50% { color: #2bbaa5; }
    100% { color: whitesmoke; }
}
@-ms-keyframes color-change {
    0% { color: whitesmoke; }
    50% { color: #2bbaa5; }
    100% { color: whitesmoke; }
}
@-o-keyframes color-change {
    0% { color: whitesmoke; }
    50% { color: #2bbaa5; }
    100% { color: whitesmoke; }
}
@keyframes color-change {
    0% { color: whitesmoke; }
    50% { color: #2bbaa5; }
    100% { color: whitesmoke; }
}
        </style>
        <!-- END PAGE LEVEL STYLES -->
        
        <script>
        window.onload=function(){
                var pathname = new URL(window.location.href).pathname;
                var spth=pathname.split('/');
                var indicator_list=document.getElementById('indicator_list');
                var incValues=['1','2','3','4','5','6'];
                if(incValues.includes(spth[3]) || incValues.includes(spth[4])){
                    indicator_list.onchange();
                }
             }
        </script>

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            


<?php if($this->session->userdata('user_type')==5){ 
            $this->load->view('state/header.php');
        }elseif($this->session->userdata('user_type')==9){
            $this->load->view('Ceo_District/header.php');
        }elseif($this->session->userdata('user_type')==10){
            $this->load->view('Deo_District/header.php');
        }elseif($this->session->userdata('user_type')==6){
            $this->load->view('beo_Block/header.php');
        }elseif($this->session->userdata('user_type')==2){
            //print_r($this->session->userdata('user_type'));
            //die();
            $this->load->view('block/header.php');
        }  ?>


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
                                        <h1>Indicators</h1>
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
                                <div></div> 
                                <div class="container">
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                            
                                           <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    
                                                    <span class="caption-subject font-dark sbold uppercase"></span>
                                                    
                                                </div>
                                                <div></div>
                                                    <div class="portlet-body">
                                                    <div class="row">
                                                    <form action="" method="post" id="indicator_submit" onsubmit="return submitaction(this);">
                                                        <div class="col-md-12">
                                                            <div class="col-md-10">
                                                                <div class="col-md-5">
                                                                    <i class="icon-settings font-dark"><label>Term</label></i>
                                                                    <select id="term" name="term" class="form-control">
                                                                        <option value="1" <?php echo($term==1?"selected":""); ?> >TERM 1</option>
                                                                        <option value="2" <?php echo($term==2?"selected":""); ?> >TERM 2</option>
                                                                        <option value="3" <?php echo($term==3?"selected":""); ?> >TERM 3</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <i class="icon-settings font-dark"></i> <label>Indicators</label>
                                                                    <select name="indicator_list" id="indicator_list" class="form-control" onchange="indicator(1)">  
                                                                        <option value="">--select--</option>
                                                                        <option value="1" <?php echo($this->uri->segment(3,0)==1?"selected":""); ?> >Passed Students</option>
            															<option value="2" <?php echo($this->uri->segment(3,0)==2?"selected":""); ?> >Maximum Obtained</option>
            															<option value="3" <?php echo($this->uri->segment(3,0)==3?"selected":""); ?> >Average of Passed</option>
            															<option value="4" <?php echo($this->uri->segment(3,0)==4?"selected":""); ?> >Distinction</option>
            															<option value="5" <?php echo($this->uri->segment(3,0)==5?"selected":""); ?> >Centum</option>
            															<option value="6" <?php echo($this->uri->segment(3,0)==6?"selected":""); ?> >Inclusiveness</option>
                                                                        <option value="7" <?php echo($this->uri->segment(3,0)==7?"selected":""); ?> >Bunch(35-40%)</option>
                                                                        <option value="8" <?php echo($this->uri->segment(3,0)==8?"selected":""); ?> >Below20%</option>
                                                                        <option value="9" <?php echo($this->uri->segment(3,0)==9?"selected":""); ?> >District Avg</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <button id="indi_submit" style="margin-top:25px;" class="btn btn-primary" type="submit" name="devicelistsearch">Search</button>
                                                            </div>
                                                        </div>
                                                  </form>
                 
                                                 </div>
                                                 <div id="breadcrumbs">
                                                            <?php 
                                                                if($mklist!=""){
                                                                    $breadcrumbs='';
                                                                    $crumbs_district = '<a href="'.base_url().'AllApprove/indicators/'.$this->uri->segment(3,0).'/">DISTRICT</a> <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i>';
                                                                    $crumbs_edudistrict = '<a href="'.base_url().'AllApprove/indicators/'.$this->uri->segment(3,0).'/'.$mklist[0]['district_id'].'/EDU/">EDUCATIONAL DISTRICT</a> <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i>';
                                                                    $crumbs_block = '<a href="'.base_url().'AllApprove/indicators/'.$this->uri->segment(3,0).'/'.$mklist[0]['edu_dist_id'].'/BLK/">BLOCK</a> <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i>';
                                                                    $crumbs_school = '<a href="">SCHOOL</a>';
                                                                    if($this->session->userdata('user_type')==5){
                                                                        $breadcrumbs=$crumbs_district;
                                                                        if($this->uri->segment(5,0)=='EDU' && $this->uri->segment(5,0)!=''){
                                                                            $breadcrumbs.=$crumbs_edudistrict;
                                                                        }elseif($this->uri->segment(5,0)=='BLK' && $this->uri->segment(5,0)!=''){
                                                                            $breadcrumbs.=$crumbs_edudistrict.$crumbs_block;
                                                                        }elseif($this->uri->segment(5,0)=='SCH' && $this->uri->segment(5,0)!=''){
                                                                            $breadcrumbs.=$crumbs_edudistrict.$crumbs_block.$crumbs_school;
                                                                        }
                                                                    }
                                                                    else{
                                                                        if($this->session->userdata('user_type')==9 || $this->session->userdata('user_type')==3){
                                                                            $breadcrumbs='DISTRICT <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i>'.$crumbs_edudistrict;
                                                                        }
                                                                        elseif($this->session->userdata('user_type')==10){
                                                                            $breadcrumbs='EDUCATIONAL DISTRICT <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i>';
                                                                        }
                                                                        elseif($this->session->userdata('user_type')==6 || $this->session->userdata('user_type')==2){
                                                                            $breadcrumbs='BLOCK <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i>'.$crumbs_school;
                                                                        }
                                                                    }
                                                                    
                                                                    if($this->session->userdata('user_type')!=5 && $this->uri->segment(5,0)!=''){
                                                                        if($this->uri->segment(5,0)=='EDU'){
                                                                            $breadcrumbs.=$crumbs_edudistrict;
                                                                        }elseif($this->uri->segment(5,0)=='BLK' && $this->uri->segment(5,0)!=''){
                                                                            $breadcrumbs.=$crumbs_block;
                                                                        }elseif($this->uri->segment(5,0)=='SCH' && $this->uri->segment(5,0)!=''){
                                                                            $breadcrumbs.=$crumbs_block.$crumbs_school;
                                                                        }
                                                                    }
                                                                    
                                                                    echo($breadcrumbs);
                                                                }
                                                            ?>
                                                               
                                                        </div>
                                                </div>
                                        </div>
                                        
                                        </div>
                                       
                                           <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                             <i class="fa fa-globe"></i>Marks Summary Report</div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">  
                                                      
                                                       <table class="table table-striped table-bordered table-hover" id="sample_2" >
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align:center;">S.No</th>
                                                                    <th >Name</th> 
                                                                    <th style="text-align:center;">Total Students</th>
                                                                    <th colspan="4"  style="text-align:center;">Tamil</th>
                                                                    <th colspan="4"  style="text-align:center;">English</th>
                                                                    <th colspan="4"  style="text-align:center;">Maths</th>
                                                                    <th colspan="4"  style="text-align:center;">Science/EVS</th>
                                                                    <th colspan="4"  style="text-align:center;">Social</th>
                                                                    <th style="text-align:center;">Overall %</th>
                                                                    <th style="text-align:center;">Overall Score</th>
                                                                </tr>
                                                                <tr>
                                                                    <th></th>
                                                                    <th></th> 
                                                                    <th></th>
                                                                    <th class="inccheck">Present</th>
                                                                    <th class="incval">Inc Value</th>
                                                                    <th >%</th>
																	<th>Score</th>
                                                                    <th class="inccheck">Present</th>
                                                                    <th class="incval">Inc Value</th>
                                                                    <th >%</th>
																	<th>Score</th>
                                                                    <th class="inccheck">Present</th>
                                                                    <th class="incval">Inc Value</th>
                                                                    <th >%</th>
																	<th>Score</th>
																	<th class="inccheck">Present</th>
                                                                    <th class="incval">Inc Value</th>
                                                                    <th >%</th>
																	<th>Score</th>
																	<th class="inccheck">Present</th>
                                                                    <th class="incval">Inc Value</th>
                                                                    <th >%</th>
																	<th>Score</th>
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                           </thead>
                                                           <tbody id="tbindicators">
                                                            <?php 
                                                                $i=1;
                                                                if($mklist!=""){
                                                                    foreach($mklist as $mk){
                                                                ?>
                                                                    <tr>
                                                                        <th><?php echo($i++); ?></th>
                                                                        <td><?php if($group['next']!=''){ ?><a href="javascript:void(0);" onclick="seturlpost(this)" url="<?php echo base_url().'AllApprove/indicators/'.$this->uri->segment(3,0).'/'.$mk[$group['group']].'/'.$group['next'];?>"><?php } echo((($this->uri->segment(5,0)=='SCH' && $this->uri->segment(5,0)!="")?$mk['udise_code']."-":"").$mk[$group['groupname']]); ?></a></td> 
                                                                        <th><?php echo($mk['total_stud']); $tfoot['total']+=$mk['total_stud']; ?></th>
                                                                        <th><?php 
                                                                        $mks=$this->uri->segment(3,0)==2 || $this->uri->segment(3,0)==3?"100":($this->uri->segment(3,0)==9?$mk['s_avg_stud_tam']:$mk['attend_tam']);
                                                                        echo($mks); ?></th>
                                                                        <th><?php echo($mk[$append.'stud_tam']); $tfoot['1']+=$mks;$tfoot['2']+=$mk[$append.'stud_tam']; ?></th>
                                                                        <th><?php $over=$this->uri->segment(3,0)==9?round((($mks==0?1:$mks)/$mk[$append.'stud_tam'])*100,2):round(($mk[$append.'stud_tam']/($mks==0?1:$mks))*100,2); echo($over); $overper+=$over; ?>%</th>
										                                <th><?php $oScore=round(($score/100)*$over,2); echo($oScore); $overScore+=$oScore; ?>%</th>
                                                                        <th><?php 
                                                                        $mks=$this->uri->segment(3,0)==2 || $this->uri->segment(3,0)==3?"100":($this->uri->segment(3,0)==9?$mk['s_avg_stud_eng']:$mk['attend_eng']);
                                                                        echo($mks); ?></th>
                                                                        <th><?php echo($mk[$append.'stud_eng']); $tfoot['3']+=$mks;$tfoot['4']+=$mk[$append.'stud_eng']; ?></th>
                                                                        <th><?php $over=$this->uri->segment(3,0)==9?round((($mks==0?1:$mks)/$mk[$append.'stud_eng'])*100,2):round(($mk[$append.'stud_eng']/($mks==0?1:$mks))*100,2); echo($over); $overper+=$over; ?>%</th>
																	    <th><?php $oScore=round(($score/100)*$over,2); echo($oScore); $overScore+=$oScore; ?>%</th>
                                                                        <th><?php 
                                                                        $mks=$this->uri->segment(3,0)==2 || $this->uri->segment(3,0)==3?"100":($this->uri->segment(3,0)==9?$mk['s_avg_stud_mat']:$mk['attend_mat']);
                                                                        echo($mks); ?></th>
                                                                        <th><?php echo($mk[$append.'stud_mat']); $tfoot['5']+=$mks;$tfoot['6']+=$mk[$append.'stud_mat']; ?></th>
    																	<th ><?php $over=$this->uri->segment(3,0)==9?round((($mks==0?1:$mks)/$mk[$append.'stud_mat'])*100,2):round(($mk[$append.'stud_mat']/($mks==0?1:$mks))*100,2); echo($over); $overper+=$over; ?>%</th>
			                                                            <th><?php $oScore=round(($score/100)*$over,2); echo($oScore); $overScore+=$oScore; ?>%</th>
                                                                        <th><?php 
                                                                        $mks=$this->uri->segment(3,0)==2 || $this->uri->segment(3,0)==3?"100":($this->uri->segment(3,0)==9?$mk['s_avg_stud_sci']:$mk['attend_sci']);
                                                                        echo($mks); ?></th>
                                                                        <th><?php echo($mk[$append.'stud_sci']); $tfoot['7']+=$mks;$tfoot['8']+=$mk[$append.'stud_sci']; ?></th>
    																	<th><?php $over=$this->uri->segment(3,0)==9?round((($mks==0?1:$mks)/$mk[$append.'stud_sci'])*100,2):round(($mk[$append.'stud_sci']/($mks==0?1:$mks))*100,2); echo($over); $overper+=$over; ?>%</th>
																	    <th><?php $oScore=round(($score/100)*$over,2); echo($oScore); $overScore+=$oScore; ?>%</th>
                                                                        <th><?php 
                                                                        $mks=$this->uri->segment(3,0)==2 || $this->uri->segment(3,0)==3?"100":($this->uri->segment(3,0)==9?$mk['s_avg_stud_soc']:$mk['attend_soc']);
                                                                        echo($mks); ?></th>
                                                                        <th><?php echo($mk[$append.'stud_soc']); $tfoot['9']+=$mks;$tfoot['10']+=$mk[$append.'stud_soc']; ?></th>
                                                                        <th><?php $over=$this->uri->segment(3,0)==9?round((($mks==0?1:$mks)/$mk[$append.'stud_soc'])*100,2):round(($mk[$append.'stud_soc']/($mks==0?1:$mks))*100,2); echo($over); $overper+=$over; ?>%</th>
																	    <th><?php $oScore=round(($score/100)*$over,2); echo($oScore); $overScore+=$oScore; ?>%</th>
                                                                        <th><?php echo(round(($overper/5),2)); $overper=0; ?> %</th>
																	    <th><?php echo(round(($overScore/5),2)); $overScore=0; ?>%</th>
                                                                    </tr>
                                                                <?php
                                                                    }
                                                                }
                                                            ?>  
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="2">Total</td>
                                                                    <td><?php echo($tfoot['total']); ?></td>
                                                                    <?php if(!in_array($this->uri->segment(3,0),['0','2','3','9'])) { ?>
                                                                    <td><?php echo($tfoot['1']); ?></td>
                                                                    <td><?php echo($tfoot['2']); ?></td>
                                                                    <td colspan="2">&nbsp;</td>
                                                                    <td><?php echo($tfoot['3']); ?></td>
                                                                    <td><?php echo($tfoot['4']); ?></td>
                                                                    <td colspan="2">&nbsp;</td>
                                                                    <td><?php echo($tfoot['5']); ?></td>
                                                                    <td><?php echo($tfoot['6']); ?></td>
                                                                    <td colspan="2">&nbsp;</td>
                                                                    <td><?php echo($tfoot['7']); ?></td>
                                                                    <td><?php echo($tfoot['8']); ?></td>
                                                                    <td colspan="2">&nbsp;</td>
                                                                    <td><?php echo($tfoot['9']); ?></td>
                                                                    <td><?php echo($tfoot['10']); ?></td>
                                                                    <td colspan="4">&nbsp;</td>
                                                                    <?php }else{ ?>
                                                                    <td colspan="22">&nbsp;</td>
                                                                    <?php } ?>
                                                                </tr>
                                                            </tfoot> 
                                                        </table>
                                    <!-- END PAGE TITLE -->
                                    <!-- BEGIN PAGE TOOLBAR -->
                                    <div class="page-toolbar">
                                        <!-- BEGIN THEME PANEL -->
                           
                                        <!-- END THEME PANEL -->
                                    </div>
                                    <!-- END PAGE TOOLBAR -->
                                        
                                </div>
                            </div>
                            </div>
                                                        
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

                                                    </div>
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
        </div>

        <?php $this->load->view('scripts.php'); ?>


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
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
        <script type="text/javascript"> 
             window.onload=function(){
                var pathname = new URL(window.location.href).pathname;
                var spth=pathname.split('/');
                var incValues=['1','2','3','4','5','6','7','8','9'];
                if(incValues.includes(spth[3]) || incValues.includes(spth[4])){
                    indicator();
                    if(spth[spth.length-1]!='SCH'){
                        var tb=document.getElementsByName('sample_2_length');
                        tb[0].value=-1;
                        $('select[name ="sample_2_length"]').change();
                    }
                }
             }
            
             function indicator(chk=0){
                var inchk_txt='';
                var sel=document.getElementById("indicator_list");
                if(sel.value!=""){
                    var incval=document.querySelectorAll(".incval");
                    var incchk=document.querySelectorAll(".inccheck");
                    var opt="";
                    opt=sel.options[sel.selectedIndex].text;
                    var sopt=opt.split(" ");
                    //alert(sopt);
                    opt="";
                    for(var j in sopt){
                        if(sopt[j]=='District'){
                            var app_text="DISTRICT";
                            var pathname = new URL(window.location.href).pathname;
                            var spth=pathname.split('/');
                            var incValues=['EDU','BLK','SCH'];
                            if(!incValues.includes(spth[spth.length-1])){
                                sopt[j]="STATE";
                            }
                        }
                        opt+=sopt[j];
                        if(j!=sopt.length){
                            opt+='<br>';
                        }
                    }
                    //alert(opt);
                    for(var i in incval){
                        
                        incval[i].innerHTML=opt;
                    }
                    //alert(sel.value);
                    switch(parseInt(sel.value)){
                        case 1:inchk_txt='Present<br>Students';break;
                        case 2:
                        case 3:inchk_txt='Max<br>Possible';break;
                        case 4:
                        case 5:
                        case 6:
                        case 7:inchk_txt='Passed<br>Students';break;
                        case 8:inchk_txt='Total<br>Students';break;
                        case 9:
                        {
                             var app_text="DISTRICT";
                             var pathname = new URL(window.location.href).pathname;
                             var spth=pathname.split('/');
                             var incValues=['1','2','3','4','5','6','7','8','9'];
                             if(incValues.includes(spth[3]) || incValues.includes(spth[4])){
                                switch(spth[spth.length-1]){
                                    case 'EDU':app_text='EDU.DIST';break;
                                    case 'BLK':app_text='BLOCK';break;
                                    case 'SCH':app_text='SCHOOL';break;
                                    default:app_text="DISTRICT";
                                }
                             }
                             inchk_txt=app_text+'<br>Avg';
                             break;
                        }
                    }
                    //alert(inchk_txt);
                    for(var i in incchk){
                        incchk[i].innerHTML=inchk_txt;
                    }
                    if(chk){document.getElementById('tbindicators').innerHTML="<tr></tr>";}
                }
             }
             function submitaction(frm,url=window.location.href){
                var indicator_list=document.getElementById('indicator_list');
                if(frm.getAttribute('action')==''){
                    var pth=window.location.pathname;
                    var spth=pth.split('/');
                    for(i=0;i<spth.length;i++){
                        if(spth[i]=='indicators'){
                           spth[i+1]=indicator_list.value 
                        }
                    }
                    pth=spth.join('/');
                    url=window.location.protocol+'//'+window.location.hostname+pth;
                    //alert(url);
                    frm.setAttribute('action',url);
                    //return false;
                }
                return true;
             }
             function seturlpost(node){
                var frm=document.getElementById('indicator_submit');
                frm.setAttribute('action',node.getAttribute('url'));
                var btn=document.getElementById('indi_submit');
                btn.click();
            }
        </script>      
    </body>
</html>