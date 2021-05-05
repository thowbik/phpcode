<?php //print_r($scheme); ?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
     <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
     <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
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
    
    <style type="text/css">
        
    </style>
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
                                    <h1> SCHEME INDENT</h1>
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
                            <div class="container" style="width: 100%;">
                                <!-- BEGIN PAGE CONTENT INNER -->
                                <div class="page-content-inner">
                                    <?php $this->load->view('emis_school_profile_header1.php'); ?>
                                    <div class="portlet light portlet-fit ">
                                        
                                    </div>         
                                    <div class="portlet box green">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-globe"></i>Scheme Indent</div>
                                            </div>
                                            <div class="portlet-body">
                                                <form id="free_scheme_indent" name="free_scheme_indent" method="post" action="<?php echo base_url().'Basic/generalSchemeIndent/';?>">
                                                    <table class="table table-striped table-bordered table-hover" style="alignment-adjust: !important;" id="summary_table">
                                                        <thead>
                                                            <tr class="portlet box green" style="text-align: center;" >
                                                                
                                                                <th style="text-align: center;">Class</th>
                                                                <?php $schemeids=array(); foreach($scheme as $schemelist){ ?>
                                                                <th style="text-align: center;"><?php echo $schemelist->scheme_name; ?></th>
                                                                <?php array_push($schemeids,$schemelist->id); }?>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $result = array();$key='class_studying_id';
                                                                //$class_studying=[1=>'I',2=>'II',3=>'III',4=>'IV',5=>'V',6=>'VI',7=>'VII',8=>'VIII',9=>'IX',10=>'X',11=>'XI',12=>'XII'];
                                                                foreach($summary as $val) {
                                                                    if(array_key_exists($key, $val)){
                                                                        $result[$val[$key]][] = $val;
                                                                    }else{
                                                                        $result[""][] = $val;
                                                                    }
                                                                } 
                                                                ksort($result,SORT_NUMERIC);
                                                                //print_r($result);die();
                                                                foreach($result as $k => $r){ 
                                                                    $ch=1; $noon=-1;
                                                            ?>
                                                            <tr>
                                                                
                                                                <th><?php echo($r[0]['class_studying']); ?></th>
                                                                <?php 
                                                                    $summ = array();$key='scheme_id'; 
                                                                    foreach($r as $val) { 
                                                                        if(array_key_exists($key, $val)){
                                                                            $summ[$val[$key]][] = $val;
                                                                        }else{
                                                                            $summ[""][] = $val;
                                                                        }
                                                                    } 
                                                                    $i=count($schemeids);
                                                                    $callgeneral=[3,4,5,6,7,8,9];
                                                                    for($j=0;$j<$i;$j++){ $check=0;$prval=0;
                                                                        if(in_array($schemeids[$j],$callgeneral)){
                                                                            $call='Basic/callgeneral';
                                                                        }else{
                                                                            $call='Basic/callscheme'; 
                                                                        }
                                                                        
                                                                        foreach($summ as $s => $val){ //print_r($val);
                                                                            if($schemeids[$j]==$s){
                                                                                $prval=$val[0]['indcount'];
                                                                                $lowclass=$val[0]['low_class'];
                                                                                $highclass=$val[0]['high_class'];
                                                                                $check=0;
                                                                                
                                                                                //print_r($s.'--------------'.$lowclass.'---------'.$highclass.'<br>');
                                                                                break;
                                                                            }else{$check=1;} 
                                                                        }
                                                                        
                                                                        if($check==1){
                                                                            $prval=0;
                                                                        }
                                                                        
                                                                        if($schemeids[$j]==15){
                                                                            $noon=$prval;
                                                                            $link='<a href="'.base_url().$call.'/'.$schemeids[$j].'/'.$k.'/'.$noon.'">'.$prval.'</a>';
                                                                            $ch=$k<9?!$val[0]['checkbit']:$val[0]['checkbit']; 
                                                                        }elseif($ch==1){
                                                                            $link=$prval;
                                                                        }elseif($ch==0){
                                                                            $link='<a href="'.base_url().$call.'/'.$schemeids[$j].'/'.$k.'/'.$noon.'">'.$prval.'</a>';
                                                                        }
                                                                        if(betweenValues($k,$lowclass,$highclass,$schemeids[$j])){
                                                                ?>
                                                                <th style="text-align:center;"><?php echo($link); ?></th>
                                                            <?php }
                                                                    else{
                                                            ?>
                                                                <th style="text-align:center;">-</th>
                                                            <?php
                                                                    }
                                                                }
                                                             
                                                             ?>
                                                            </tr>
                                                            <?php 
                                                            } 
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                    <button style="visibility:hidden;">DDDD</button>
                                                </form>                                        
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
    <?php $this->load->view('scripts.php'); ?>
    <script src="<?php echo base_url().'asset/js/block.js';?>" type="text/javascript"></script>
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
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script> 
    </body>
    
    <?php
        function betweenValues($value,$min,$max,$scheme){
            $opt=false;
            
            for($i=$min;$i<=$max;$i++){
                if($value==$i){
                    $opt=true;
                }
            }
            
            /*echo('<br>--------------------------------<br>');
                echo('Value :'.$value.'<br>');
                echo('Min :'.$min.'<br>');
                echo('Max :'.$max.'<br>');
                echo('Scheme :'.$scheme);
                echo('--------------------------------');*/
            
            return $opt;
        }
    ?>
</html>