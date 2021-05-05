<?php ?>
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
            <?php if($this->session->userdata('emis_user_type_id') == 3 )  {  ?>
            <?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) {  ?>
            <?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 5){  ?>
            <?php $this->load->view('state/header.php'); }else{  $this->load->view('header.php'); } ?>
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
                                    <h1> SCHEMES AUTO INDENT</h1>
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
                                     <!-- <?php $this->load->view('emis_school_profile_header1.php'); ?>  -->
                                    <div class="portlet light portlet-fit ">    
                                    </div>         
                                    <div class="portlet box green">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-globe"></i>Schemes Auto Indent (as per enrollment data)</div>
                                            </div>
                                            <div class="portlet-body">
                                            <?php $total_arr = [];?>
                                                    <table class="table table-striped table-bordered table-hover" style="alignment-adjust: !important;" id="summary_table">
                                                        <thead>
                                                            <tr class="portlet box green" style="text-align: center;" >    
                                                                <th style="text-align: center;">Class</th>
                                                                <?php $schemeids=array(); foreach($scheme as $schemelist){ ?>
                                                                <th style="text-align: center;"><?php echo $schemelist->id == 9 ?  $schemelist->scheme_name . ' ( sets ) ' : $schemelist->scheme_name ;?></th>
                                                                <?php array_push($schemeids,$schemelist->id);  }?>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $result = array();$key='class_studying_id';
                                                                foreach($summary as $val) {
                                                                    if(array_key_exists($key, $val)){
                                                                        $result[$val[$key]][] = $val;
                                                                    }else{
                                                                        $result[""][] = $val;
                                                                    }
                                                                } 
                                                                ksort($result,SORT_NUMERIC);
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
                                                                    for($j=0;$j<$i;$j++){ $check=0;$prval=0;
                                                                        foreach($summ as $s => $val){ //print_r($val);
                                                                            if($schemeids[$j]==$s){
                                                                                $prval=$val[0]['stdcount'];
                                                                                $lowclass=$val[0]['low_class'];
                                                                                $highclass=$val[0]['high_class'];
                                                                                $check=0;
                                                                                
                                                                                //print_r($s.'--------------'.$lowclass.'---------'.$highclass.'<br>');
                                                                                break;
                                                                            }else{$check=1;} 
                                                                        }
                                                                        
                                                                        if(betweenValues($k,$lowclass,$highclass,$schemeids[$j])){
                                                                   ?>
                                                                            <th style="text-align:center;"><?php echo($prval); ?></th>
                                                                   <?php }else{ ?>
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

                                                        <!-- <tfoot>
                                                            <tr>
                                                                <th >Total</th>
                                                                <th style="text-align:center"><?=$grand_total;?></th>
                                                                <th style="text-align:center"><?=$grand_total;?></th>
                                                                <th style="text-align:center"><?=$grand_total;?></th>
                                                                <th style="text-align:center"><?=$grand_total;?></th>
                                                                <th style="text-align:center"><?=$grand_total;?></th>

                                                            </tr>
                                                        </tfoot> -->
                                                    </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container" style="width: 100%;">
                                <div class="page-content-inner">
                                    <div class="portlet light portlet-fit ">    
                                    </div>         
                                    <div class="portlet box green">
                                     <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-globe"></i>Number of notebooks for each class</div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="row">
                                                <form id="nb_form" name="nb_form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>"> 
                                                    <div class="col-md-3">&nbsp;&nbsp;
                                                        <input type = 'radio' name ='nb_form_term' value= '1'> Term 1 &nbsp;&nbsp;
                                                        <input type = 'radio' name ='nb_form_term' value= '2'> Term 2 &nbsp;&nbsp;
                                                        <input type = 'radio' name ='nb_form_term' value= '3'> Term 3 &nbsp;&nbsp;
                                                    </div>
                                                    <button type="submit" id="nb_form_btn" name="nb_form_btn" class="btn green btn-md">Submit</button>
                                                </form>
                                            </div>
                                            
                                            <br />
                                                
                                                <table class="table table-striped table-bordered table-hover" style="alignment-adjust: !important;">
                                                    <thead class="portlet box green">
                                                        <tr>
                                                            <td rowspan="3"><b>Class</b></td>
                                                            <td rowspan="3"><b>Student Count</b></td>
                                                         </tr>   
                                                         
                                                         <tr style="text-align: center;">
                                                         
                                                              <td colspan="3"><b>40 pages</b></td>
                                                              <td colspan="3"><b>80 pages</b></td>
                                                              <td rowspan="2"><b>2 lines</b></td>
                                                              <td rowspan="2"><b>4 lines</b></td>
                                                              <td rowspan="2"><b>Drawing</b></td>
                                                              <td rowspan="2"><b>Composition</b></td>
                                                              <td rowspan="2"><b>Geometry</b></td>
                                                              <td rowspan="2"><b>Graph</b></td>
                                                              <td rowspan="2"><b>Record</b></td>
                                                         
                                                         </tr>
                                                         
                                                         <tr style="text-align: center;">
                                                              <td><b>Ruled</b></td>
                                                              <td><b>Science</b></td>
                                                              <td><b>Maths</b></td>
                                                              <td><b>Ruled</b></td>
                                                              <td><b>Science</b></td>
                                                              <td><b>Maths</b></td>
                                                         
                                                        </tr>
                                                   </thead>
                               
                                                    <tbody> 
                                                    <?php 
                                                    $summaryWiseDataFilteredforNB=array();
                                                    $noteBookSummaryWise=array();

                                                    $class_roma = array
                                                    ('I'=>1,'II'=>'2','III'=>'3','IV'=>'4','V'=>'5','VI'=>'6','VII'=>'7','VIII'=>'8','IX'=>'9','X'=>'10','XI'=>'11','XII'=>'12','LKG'=>'13','UKG'=>'14','PreKG'=>'15');
                                                    $enrolltotal=$total1=$total2=$total3=$total4=$total5=$total6=$total7=$total8=$total9=$total10=$total11=$total12=$total13=0;

                                                    foreach($result as $k => $r){ 
                                                        foreach($r as $s => $val){
                                                            if($val['scheme_id'] == '3'){
                                                                // print_r($val);
                                                                $arr = array( 'class_studying_id' => $val['class_studying_id'], 'stdcount' => $val['stdcount']);
                                                                array_push($summaryWiseDataFilteredforNB,$arr);
                                                            }
                                                        }
                                                    }
                                                    
                                                    for($j=0;$j<count($summaryWiseDataFilteredforNB);$j++){
                                                        foreach($notebook as &$blog) {
                                                                // $blog     = get_object_vars($blog);
                                                            $summary_class_id = $summaryWiseDataFilteredforNB[$j]['class_studying_id'];
                                                            if($summary_class_id == $blog->class){
                                                               $summary_std_count = $summaryWiseDataFilteredforNB[$j]['stdcount'];
                                                               $blog->summary_std_count = $summary_std_count;
                                                               array_push($noteBookSummaryWise,$blog);
                                                            } 
                                                        }
                                                    }
                                                        
                                                    // print_r($noteBookSummaryWise);

                                                    foreach($noteBookSummaryWise as $nb){ 

                                                        ?>

                                                                    <tr style="text-align: center;">
                                                                        <td><b><?php $class_roman_name = array_search($nb->class,$class_roma);
                                                                                     echo $nb->class == 9 || $nb->class == 10 || $nb->class == 11 || $nb->class == 12 ? $class_roman_name : $class_roman_name . '  Term - '.$nb->term ?></b></td>
                                                                        <td><b><?php echo $nb->summary_std_count; $enrolltotal += $nb->summary_std_count; ?></b></td>
                                                                        <td><?php echo($nb->FortyPageRuled != 0 ? $nb->FortyPageRuled * $nb->summary_std_count : ''); $total1 += $nb->FortyPageRuled * $nb->summary_std_count; ?></td>
                                                                        <td><?php echo($nb->FortyPageScience != 0 ? $nb->FortyPageScience * $nb->summary_std_count : ''); $total2 += $nb->FortyPageScience * $nb->summary_std_count;?></td>
                                                                        <td><?php echo($nb->FortyPageMaths != 0 ? $nb->FortyPageMaths * $nb->summary_std_count : ''); $total3 += $nb->FortyPageMaths * $nb->summary_std_count;?></td>
                                                                        <td><?php echo($nb->EightyPageRuled != 0 ? $nb->EightyPageRuled * $nb->summary_std_count : ''); $total4 += $nb->EightyPageRuled * $nb->summary_std_count;?></td>
                                                                        <td><?php echo($nb->EightyPageScience != 0 ? $nb->EightyPageScience * $nb->summary_std_count: '' ); $total5 += $nb->EightyPageScience * $nb->summary_std_count;?></td>
                                                                        <td><?php echo($nb->EightyPageMaths != 0 ? $nb->EightyPageMaths * $nb->summary_std_count : ''); $total6 += $nb->EightyPageMaths * $nb->summary_std_count;?></td>
                                                                        <td><?php echo($nb->TwoLines != 0 ? $nb->TwoLines * $nb->summary_std_count : ''); $total7 += $nb->TwoLines * $nb->summary_std_count;?></td>
                                                                        <td><?php echo($nb->FourLines != 0 ? $nb->FourLines * $nb->summary_std_count: ''); $total8 += $nb->FourLines * $nb->summary_std_count;?></td>
                                                                        <td><?php echo($nb->Drawing != 0 ? $nb->Drawing * $nb->summary_std_count: ''); $total9 += $nb->Drawing * $nb->summary_std_count;?></td>
                                                                        <td><?php echo($nb->Composition != 0 ? $nb->Composition * $nb->summary_std_count : ''); $total10 += $nb->Composition * $nb->summary_std_count;?></td>
                                                                        <td><?php echo($nb->GeometryNote != 0 ? $nb->GeometryNote * $nb->summary_std_count : ''); $total11 += $nb->GeometryNote * $nb->summary_std_count;?></td>
                                                                        <td><?php echo($nb->GraphNote != 0 ? $nb->GraphNote * $nb->summary_std_count: ''); $total12 += $nb->GraphNote * $nb->summary_std_count;?></td>
                                                                        <td><?php echo($nb->RecordNote != 0 ? $nb->RecordNote * $nb->summary_std_count : ''); $total13 += $nb->RecordNote * $nb->summary_std_count;?></td>
                                                                    </tr>
                                                          <?php  } ?>
                                                     
                                                      <tr style="text-align: center;">
                                                         <td><b>Total</b></td>
                                                         <td><b><?php echo($enrolltotal); ?></b></td>
                                                         <td><?php echo($total1); ?></td>
                                                         <td><?php echo($total2); ?></td>
                                                         <td><?php echo($total3); ?></td>
                                                         <td><?php echo($total4); ?></td>
                                                         <td><?php echo($total5); ?></td>
                                                         <td><?php echo($total6); ?></td>
                                                         <td><?php echo($total7); ?></td>
                                                         <td><?php echo($total8); ?></td>
                                                         <td><?php echo($total9); ?></td>
                                                         <td><?php echo($total10); ?></td>
                                                         <td><?php echo($total11); ?></td>
                                                         <td><?php echo($total12); ?></td>
                                                         <td><?php echo($total13); ?></td>
                                                     </tr>
                                                    </tbody>
                                                </table>
                                        
                                                   
                                                </div>
                                                <button style="visibility:hidden;">DDDD</button>
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
        <script>
               window.onload=function(){ 
                   var term = "<?php echo $termID ? $termID  : 1; ?>";
                    $("[name=nb_form_term]").val([term]);
               };
        </script>
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