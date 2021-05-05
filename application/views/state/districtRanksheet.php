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
                margin:0;
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
                                <div class="container" >
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
                                <div class="container" style="width:100%;">
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                           <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <span class="caption-subject font-dark sbold uppercase"></span>
                                                </div>
                                                    <div class="row">
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
                                                    <div class="caption"><i class="fa fa-globe"></i>RankSheet - State</div>
                                                    <div class="tools"> </div>
                                                </div>
                                                <div class="portlet-body">  
                                                    <table class="table table-striped table-bordered table-hover" id="sample_2" >
                                                        <thead>
                                                            <tr>
                                                                <th>District Name</th>
                                                                <th>Rank</th>
                                                                <th>Overall Score</th>
                                                                <th colspan="30">Positive Indicators</th>
                                                                <th colspan="15">Negative Indicators</th>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th colspan="5">Passed Students</th>
                                                                <th colspan="5">Maximum Marks Obtained</th>
                                                                <th colspan="5">Average of Passed</th>
                                                                <th colspan="5">Distinction</th>
                                                                <th colspan="5">Centum</th>
                                                                <th colspan="5">Inclusiveness</th>
                                                                <th colspan="5">Bunch(35-40%)</th>
                                                                <th colspan="5">Below 20%</th>
                                                                <th colspan="5">District Average</th>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th>Tamil</th>
                                                                <th>English</th>
                                                                <th>Maths</th>
                                                                <th>Science</th>
                                                                <th>Social</th>
                                                                <th>Tamil</th>
                                                                <th>English</th>
                                                                <th>Maths</th>
                                                                <th>Science</th>
                                                                <th>Social</th>
                                                                <th>Tamil</th>
                                                                <th>English</th>
                                                                <th>Maths</th>
                                                                <th>Science</th>
                                                                <th>Social</th>
                                                                <th>Tamil</th>
                                                                <th>English</th>
                                                                <th>Maths</th>
                                                                <th>Science</th>
                                                                <th>Social</th>
                                                                <th>Tamil</th>
                                                                <th>English</th>
                                                                <th>Maths</th>
                                                                <th>Science</th>
                                                                <th>Social</th>
                                                                <th>Tamil</th>
                                                                <th>English</th>
                                                                <th>Maths</th>
                                                                <th>Science</th>
                                                                <th>Social</th>
                                                                <th>Tamil</th>
                                                                <th>English</th>
                                                                <th>Maths</th>
                                                                <th>Science</th>
                                                                <th>Social</th>
                                                                <th>Tamil</th>
                                                                <th>English</th>
                                                                <th>Maths</th>
                                                                <th>Science</th>
                                                                <th>Social</th>
                                                                <th>Tamil</th>
                                                                <th>English</th>
                                                                <th>Maths</th>
                                                                <th>Science</th>
                                                                <th>Social</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($ranksheet as $rank){ ?>
                                                            <tr>
                                                                <th><?php echo($rank['district_name']); ?></th>
                                                                <th><?php echo($rank['distrank']); ?></th>
                                                                <th><?php echo($rank['overscore']); ?></th>
                                                                <th><?php echo($rank['pass_score_stud_tam']); ?></th>
                                                                <th><?php echo($rank['pass_score_stud_eng']); ?></th>
                                                                <th><?php echo($rank['pass_score_stud_mat']); ?></th>
                                                                <th><?php echo($rank['pass_score_stud_sci']); ?></th>
                                                                <th><?php echo($rank['pass_score_stud_soc']); ?></th>
                                                                <th><?php echo($rank['maxm_score_stud_tam']); ?></th>
                                                                <th><?php echo($rank['maxm_score_stud_eng']); ?></th>
                                                                <th><?php echo($rank['maxm_score_stud_mat']); ?></th>
                                                                <th><?php echo($rank['maxm_score_stud_sci']); ?></th>
                                                                <th><?php echo($rank['maxm_score_stud_soc']); ?></th>
                                                                <th><?php echo($rank['avgp_score_stud_tam']); ?></th>
                                                                <th><?php echo($rank['avgp_score_stud_eng']); ?></th>
                                                                <th><?php echo($rank['avgp_score_stud_mat']); ?></th>
                                                                <th><?php echo($rank['avgp_score_stud_sci']); ?></th>
                                                                <th><?php echo($rank['avgp_score_stud_soc']); ?></th>
                                                                <th><?php echo($rank['dist_score_stud_tam']); ?></th>
                                                                <th><?php echo($rank['dist_score_stud_eng']); ?></th>
                                                                <th><?php echo($rank['dist_score_stud_mat']); ?></th>
                                                                <th><?php echo($rank['dist_score_stud_sci']); ?></th>
                                                                <th><?php echo($rank['dist_score_stud_soc']); ?></th>
                                                                <th><?php echo($rank['cent_score_stud_tam']); ?></th>
                                                                <th><?php echo($rank['cent_score_stud_eng']); ?></th>
                                                                <th><?php echo($rank['cent_score_stud_mat']); ?></th>
                                                                <th><?php echo($rank['cent_score_stud_sci']); ?></th>
                                                                <th><?php echo($rank['cent_score_stud_soc']); ?></th>
                                                                <th><?php echo($rank['incl_score_stud_tam']); ?></th>
                                                                <th><?php echo($rank['incl_score_stud_eng']); ?></th>
                                                                <th><?php echo($rank['incl_score_stud_mat']); ?></th>
                                                                <th><?php echo($rank['incl_score_stud_sci']); ?></th>
                                                                <th><?php echo($rank['incl_score_stud_soc']); ?></th>
                                                                <th><?php echo($rank['bunc_score_stud_tam']); ?></th>
                                                                <th><?php echo($rank['bunc_score_stud_eng']); ?></th>
                                                                <th><?php echo($rank['bunc_score_stud_mat']); ?></th>
                                                                <th><?php echo($rank['bunc_score_stud_sci']); ?></th>
                                                                <th><?php echo($rank['bunc_score_stud_soc']); ?></th>
                                                                <th><?php echo($rank['blow_score_stud_tam']); ?></th>
                                                                <th><?php echo($rank['blow_score_stud_eng']); ?></th>
                                                                <th><?php echo($rank['blow_score_stud_mat']); ?></th>
                                                                <th><?php echo($rank['blow_score_stud_sci']); ?></th>
                                                                <th><?php echo($rank['blow_score_stud_soc']); ?></th>
                                                                <th><?php echo($rank['dsta_score_stud_tam']); ?></th>
                                                                <th><?php echo($rank['dsta_score_stud_eng']); ?></th>
                                                                <th><?php echo($rank['dsta_score_stud_mat']); ?></th>
                                                                <th><?php echo($rank['dsta_score_stud_sci']); ?></th>
                                                                <th><?php echo($rank['dsta_score_stud_soc']); ?></th>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>         
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
                    //indicator();
                    if(spth[spth.length-1]!='SCH'){
                        var tb=document.getElementsByName('sample_2_length');
                        tb[0].value=-1;
                        $('select[name ="sample_2_length"]').change();
                    }
                }
             }
            
             /*function indicator(chk=0){
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
             }*/
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