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
                            <div class="container">
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
                                                    <table class="table table-striped table-bordered table-hover" style="alignment-adjust: !important;" id="sample_2">
                                                        <thead>
                                                            <tr class="portlet box green" style="text-align: center;" >
                                                                <th colspan="2" style="text-align: center;">Class</th>
                                                                <th colspan="2" style="text-align: center;">Text book</th>                        
                                                                <th colspan="2" style="text-align: center;">School Bag</th>
                                                                <th colspan="2" style="text-align: center;">Crayon</th>
                                                                <th colspan="2" style="text-align: center;">Color pencil</th>
                                                                <th colspan="2" style="text-align: center;">Geometry box</th>
                                                                <th colspan="2" style="text-align: center;">Atlas</th>
                                                                <th colspan="2"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $check=0; foreach($scheme as $s) {?> 
                                                            <tr style="text-align: center;">
                                                                <td colspan="2"><b><?php echo($s[0]['class_studying']); ?></b></td>
                                                                <td colspan="2"><?php echo($s[5]['cscount']); $sum[0]+=$s[5]['cscount']; ?></td> <!--- TextBook ---->
                                                                <td colspan="2"><?php echo($s[0]['cscount']); $sum[1]+=$s[0]['cscount'];?></td> <!--- SchoolBag --->
                                                                <td colspan="2"><?php echo($s[1]['cscount']); $sum[2]+=$s[1]['cscount'];?></td> <!--- Crayon --->
                                                                <td colspan="2"><?php echo($s[2]['cscount']); $sum[3]+=$s[2]['cscount'];?></td> <!--- Color Pencil --->
                                                                <td colspan="2"><?php echo($s[3]['cscount']); $sum[4]+=$s[3]['cscount'];?></td> <!--- Geomentry --->
                                                                <td colspan="2"><?php echo($s[4]['cscount']); $sum[5]+=$s[4]['cscount'];?></td> <!--- Atlas --->
                                                                <td colspan="2"><?php echo($s[0]['indent_date']); ?></td>         <!--- Date--->
                                                               
                                                            </tr>
                                                            <?php } ?> 
                                                            <tr style="text-align: center;">
                                                                <td colspan="2"><b>Total</b></td>
                                                                <td colspan="2"><b><?php echo($sum[0]); ?></b></td> <!--- TextBook ---->
                                                                <td colspan="2"><b><?php echo($sum[1]); ?></b></td> <!--- SchoolBag --->
                                                                <td colspan="2"><b><?php echo($sum[2]); ?></b></td> <!--- Crayon --->
                                                                <td colspan="2"><b><?php echo($sum[3]); ?></b></td> <!--- Color Pencil --->
                                                                <td colspan="2"><b><?php echo($sum[4]); ?></b></td> <!--- Geomentry --->
                                                                <td colspan="2"><b><?php echo($sum[5]); unset($sum); ?></b></td> <!--- Atlas --->
                                                                <td colspan="2"><b>&nbsp;</b></td> <!--- Atlas --->
                                                                
                                                            </tr>
                                                            <tr>
                                                                 <td rowspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                            </tr>
                                                           
                                                        </tbody>
                                                        <thead>
                                                            <tr class="portlet box green">
                                                                <td rowspan="3"><b>Class</b></td>
                                                                <td rowspan="3"><b>Students</b></td>
                                                            </tr>   
                                                            <tr class="portlet box green" style="text-align: left;">
                                                                <td colspan="3"><b>40 pages</b></td>
                                                                <td colspan="3"><b>80 pages</b></td>
                                                                <td rowspan="2"><b>2 lines</b></td>
                                                                <td rowspan="2"><b>4 lines</b></td>
                                                                <td rowspan="2"><b>Drawing</b></td>
                                                                <td rowspan="2"><b>Composition</b></td>
                                                                <td rowspan="2"><b>Geometry</b></td>
                                                                <td rowspan="2"><b>Graph</b></td>
                                                                <td rowspan="2"><b>Record</b></td>
                                                                <td rowspan="2"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
                                                            </tr>
                                                            <tr class="portlet box green" style="text-align: center;">
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
                                                            foreach($notebook as $val) { ?>
                                                            <tr style="text-align: center;">
                                                                <td><b><?php echo($val[0]['class_studying']); ?></b></td>       <!---- Class ----->
                                                                <td><b><?php echo($val[0]['studcount']); ?></b></td>              <!----Total Students ----->
                                                                <td><?php if($val[3]['cscount']!='') echo($val[3]['cscount'] * $val[3]['appli_count']); $sum[0]+=$val[3]['cscount']; $tot[0]+=($val[3]['cscount'] * $val[3]['appli_count']); ?></td>              <!---- 40 Pages Ruled ----->
                                                                <td><?php if($val[4]['cscount']!='') echo($val[4]['cscount'] * $val[4]['appli_count']); $sum[1]+=$val[4]['cscount']; $tot[1]+=($val[4]['cscount'] * $val[4]['appli_count']);?></td>              <!---- 40 Pages Science ----->
                                                                <td><?php if($val[2]['cscount']!='') echo($val[2]['cscount'] * $val[2]['appli_count']); $sum[2]+=$val[2]['cscount']; $tot[2]+=($val[2]['cscount'] * $val[2]['appli_count']);?></td>              <!---- 40 Pages Maths ----->
                                                                <td><?php if($val[6]['cscount']!='') echo($val[6]['cscount'] * $val[6]['appli_count']); $sum[3]+=$val[6]['cscount']; $tot[3]+=($val[6]['cscount'] * $val[6]['appli_count']);?></td>               <!---- 80 Pages Ruled ----->
                                                                <td><?php if($val[7]['cscount']!='') echo($val[7]['cscount'] * $val[7]['appli_count']); $sum[4]+=$val[7]['cscount']; $tot[4]+=($val[7]['cscount'] * $val[7]['appli_count']);?></td>               <!---- 80 Pages Science ----->
                                                                <td><?php if($val[5]['cscount']!='') echo($val[5]['cscount'] * $val[5]['appli_count']); $sum[5]+=$val[5]['cscount']; $tot[5]+=($val[5]['cscount'] * $val[5]['appli_count']);?></td>               <!---- 80 Pages Maths ----->
                                                                <td><?php if($val[0]['cscount']!='') echo($val[0]['cscount'] * $val[0]['appli_count']); $sum[6]+=$val[0]['cscount']; $tot[6]+=($val[0]['cscount'] * $val[0]['appli_count']);?></td>              <!---- 2 Line ----->
                                                                <td><?php if($val[1]['cscount']!='') echo($val[1]['cscount'] * $val[1]['appli_count']); $sum[7]+=$val[1]['cscount']; $tot[7]+=($val[1]['cscount'] * $val[1]['appli_count']);?></td>              <!---- 4 Line ----->
                                                                <td><?php if($val[9]['cscount']!='') echo($val[9]['cscount'] * $val[9]['appli_count']); $sum[8]+=$val[9]['cscount']; $tot[8]+=($val[9]['cscount'] * $val[9]['appli_count']);?></td>              <!---- Drawing ----->
                                                                <td><?php if($val[8]['cscount']!='') echo($val[8]['cscount'] * $val[8]['appli_count']); $sum[9]+=$val[8]['cscount']; $tot[9]+=($val[8]['cscount'] * $val[8]['appli_count']);?></td>              <!---- Composition ----->
                                                                <td><?php if($val[10]['cscount']!='') echo($val[10]['cscount'] * $val[10]['appli_count']); $sum[10]+=$val[10]['cscount']; $tot[10]+=($val[10]['cscount'] * $val[10]['appli_count']); ?></td>               <!---- Geomentry ----->
                                                                <td><?php if($val[11]['cscount']!='') echo($val[11]['cscount'] * $val[11]['appli_count']); $sum[11]+=$val[11]['cscount']; $tot[11]+=($val[11]['cscount'] * $val[11]['appli_count']); ?></td>               <!---- Graph ----->
                                                                <td><?php if($val[12]['cscount']!='') echo($val[12]['cscount'] * $val[12]['appli_count']); $tot[12]+=($val[12]['cscount'] * $val[12]['appli_count']); ?></td>               <!---- Record ----->
                                                                <td><?php echo($val[9]['indent_date']); ?></td>              <!---- Indent Date ----->
                                                            </tr> 
                                                            <?php
                                                                $sum[12]+=$val[0]['studcount']; 
                                                                if($check==0){
                                                                    if($dis==''){
                                                                        $dis=($val[9]['indent_date']!=null?'disabled':'');
                                                                        $check=1;
                                                                    }
                                                                }
                                                            }?> 
                                                            <tr style="text-align: left;">
                                                                <td style="text-align: left;"><b>Total</b></td>
                                                                <td><b><?php echo($sum[12]); ?></b></td> <!---- 40 Pages Ruled ----->
                                                                <td><b><?php echo($tot[0]); ?></b></td> <!---- 40 Pages Ruled ----->
                                                                <td><b><?php echo($tot[1]); ?></b></td>  <!---- 40 Pages Science ----->
                                                                <td><b><?php echo($tot[2]); ?></b></td> <!---- 40 Pages Maths ----->
                                                                <td><b><?php echo($tot[3]); ?></b></td> <!---- 80 Pages Ruled ----->
                                                                <td><b><?php echo($tot[4]); ?></b></td> <!---- 80 Pages Science ----->
                                                                <td><b><?php echo($tot[5]); ?></b></td> <!---- 80 Pages Maths ----->
                                                                <td><b><?php echo($tot[6]); ?></b></td> <!---- 2 Line ----->
                                                                <td><b><?php echo($tot[7]); ?></b></td> <!---- 4 Line ----->
                                                                <td><b><?php echo($tot[8]); ?></b></td> <!---- Drawing ----->
                                                                <td><b><?php echo($tot[9]); ?></b></td> <!---- Composition ----->
                                                                <td><b><?php echo($tot[10]); ?></b></td><!---- Geomentry ----->
                                                                <td><b><?php echo($tot[11]); ?></b></td> <!---- Graph ----->
                                                                <td><b><?php echo($tot[12]); ?></b></td> <!---- Record ----->
                                                                <td><b>&nbsp;</b></td>  <!---- Indent Date ----->
                                                                <!---<td>&nbsp;</td>---> <!--- Atlas --->
                                                            </tr>
                                                                                                                        
                                                        </tbody>
                                                    </table>
                                                    <div class="form-row">
                                                        <input type="checkbox" id="agreecount" name="agreecount" onchange="agreecountfinal(this)" <?php echo($dis=='disabled'?'checked disabled':''); ?> />
                                                        <span>&nbsp;<strong>I, As a Head Master of this School Verified and Declared the Above given Count is final for Free Schemes of Tamil Nadu. And I know these cannot be edited and revert back.</strong></span>
                                                    </div>
                                                    <div class="form-row text-center">
                                                        <button style="visibility:hidden;">DDDD</button>
                                                        <div class="form-group col-md-12">
                                                            <button type="button" class="btn btn-primary" id="ssubmit"  onclick="return validate();" <?php echo($dis); ?>>Submit</button>
                                                            <button type="button" onclick="location.href='<?php echo $_SERVER['PHP_SELF'];?>'" class="btn default">Cancel</button>
                                                        </div>
                                                        <button style="visibility:hidden;">DDDD</button>
                                                    </div>
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
    <script>
        var s=document.getElementById('ssubmit');
        s.disabled=true;
        function agreecountfinal(node){
            var s=document.getElementById('ssubmit');
            if(node.checked){
                s.disabled=false;
            }
            else{
                s.disabled=true;
            }
        }
        function validate(){
               //alert('Click Submit');
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
               if (isConfirm) 
                    document.getElementById('free_scheme_indent').submit();
               else
                    swal("Cancelled", "Your cancelled the student profile", "error");
               });	
           }
    </script>     
</body>
</html>