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
                            <div class="container">
                                <!-- BEGIN PAGE CONTENT INNER -->
                                <div class="page-content-inner">
                                      
                                    <div class="portlet light portlet-fit ">
                                        <div class="portlet-body">
                                            <div class ="row">
                                                <div class="col-md-4">
                                                    <font style="color:#dd4b39;"><?php echo $this->session->flashdata('errors'); ?></font>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $user_type_id = $this->session->userdata('emis_user_type_id'); ?> 
                                        <div class="form-actions">
                                            <div class="portlet box green">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-globe"></i> <?php if($this->uri->segment(3,0)=='dist'){ echo('DISTRICT'); } elseif($this->uri->segment(3,0)=='blk'){ echo('BLOCK'); }elseif($this->uri->segment(3,0)=='sch'){ echo('SCHOOL');}?></div>
                                                    <div class="tools"> </div>
                                                </div>
                                                <div class="portlet-body">    
                                                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                        <thead>
                                                            <tr>
                                                                <th><?php if($this->uri->segment(3,0)=='dist'){ echo('DISTRICT'); } elseif($this->uri->segment(3,0)=='blk'){ echo('BLOCK'); }elseif($this->uri->segment(3,0)=='sch'){ echo('SCHOOL');}?> </th>
                                                                <th><?php if($this->uri->segment(3,0)!='sch'){echo('NO OF SCHOOLS');}else{echo('UDISE CODE');} ?></th>                        
                                                                <th>Part I</th>   
                                                                <th>Part II</th>
                                                                <th>Part III</th>
                                                                <th>Part IV</th>
                                                                <th>Part V</th>
                                                                <th>Part VI</th> 
                                                                <th>Part VII</th>                                                               
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                                if($this->uri->segment(3,0)=='dist'){
                                                                    $id='district_name';
                                                                    $idd='did';
                                                                }
                                                                elseif($this->uri->segment(3,0)=='blk'){
                                                                    $id='block_name';
                                                                    $idd='bid';
                                                                }
                                                                elseif($this->uri->segment(3,0)=='sch'){
                                                                    $id='school_name';
                                                                    $idd='did';
                                                                }
                                                                $totp1=$totp2=$totp3=$totp4=$totp5=$totp6=$totp7=$tot=0;
                                                                foreach($pc as $p){ 
                                                            ?>
                                                            <tr>
                                                                <th><a href="<?php echo base_url().'Home/profileCount/'.$next.'/'.$p[$idd];?>"><?php echo($p[$id]); ?></a> </th>
                                                                <th class="bg-primary text-white"><?php if($id!='school_name'){echo($p['tot']);$tot+=$p['tot'];}else{echo($p['udise_code']);$tot='-';} ?></th>                        
                                                                <th><?php  if($id=='school_name'){$totp1='-';if($p['p1']==1){echo('YES');}elseif($p['p1']==0){echo('NO');}}else{echo($p['p1']);$totp1+=$p['p1'];} ?></th>   
                                                                <th><?php  if($id=='school_name'){$totp2='-';if($p['p2']==1){echo('YES');}elseif($p['p1']==0){echo('NO');}}else{echo($p['p2']);$totp2+=$p['p2'];} ?></th>   
                                                                <th><?php  if($id=='school_name'){$totp3='-';if($p['p3']==1){echo('YES');}elseif($p['p1']==0){echo('NO');}}else{echo($p['p3']);$totp3+=$p['p3'];} ?></th>
                                                                <th><?php  if($id=='school_name'){$totp4='-';if($p['p4']==1){echo('YES');}elseif($p['p1']==0){echo('NO');}}else{echo($p['p4']);$totp4+=$p['p4'];} ?></th>     
                                                                <th><?php  if($id=='school_name'){$totp5='-';if($p['p5']==1){echo('YES');}elseif($p['p1']==0){echo('NO');}}else{echo($p['p5']);$totp5+=$p['p5'];} ?></th>     
                                                                <th><?php  if($id=='school_name'){$totp6='-';if($p['p6']==1){echo('YES');}elseif($p['p1']==0){echo('NO');}}else{echo($p['p6']);$totp6+=$p['p6'];} ?></th> 
                                                                <th><?php  if($id=='school_name'){$totp7='-';if($p['p7']==1){echo('YES');}elseif($p['p1']==0){echo('NO');}}else{echo($p['p7']);$totp7+=$p['p7'];} ?></th>                                                               
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    
                                                        <thead>
                                                            <tr class="bg-success">
                                                                <th >TOTAL </th>
                                                                <th class="bg-success text-white"><?php if($id!='school_name'){echo($tot);} ?></th>                        
                                                                <th><?php if($id!='school_name'){echo($totp1);} ?></th>   
                                                                <th><?php if($id!='school_name'){echo($totp2);} ?></th>   
                                                                <th><?php if($id!='school_name'){echo($totp3);} ?></th>
                                                                <th><?php if($id!='school_name'){echo($totp4);} ?></th>     
                                                                <th><?php if($id!='school_name'){echo($totp5);} ?></th>     
                                                                <th><?php if($id!='school_name'){echo($totp6);} ?></th> 
                                                                <th><?php if($id!='school_name'){echo($totp7);} ?></th>
                                                            </tr>
                                                        </thead>
                                                    </table> 
                                                </div>
                                            </div>
                                            <div class="portlet box green">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-globe"></i>SCHOOL PROFILE NOT STARTED - <?php if($this->uri->segment(3,0)=='dist'){ echo('DISTRICT'); } elseif($this->uri->segment(3,0)=='blk'){ echo('BLOCK'); }elseif($this->uri->segment(3,0)=='sch'){ echo('SCHOOL');}?></div>
                                                    <div class="tools"> </div>
                                                </div>
                                                <div class="portlet-body">    
                                                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                                                        <thead>
                                                            <tr>
                                                                <th><?php if($this->uri->segment(3,0)=='dist'){ echo('DISTRICT'); } elseif($this->uri->segment(3,0)=='blk'){ echo('BLOCK'); }elseif($this->uri->segment(3,0)=='sch'){ echo('SCHOOL');}?> </th>
                                                                <th><?php if($this->uri->segment(3,0)!='sch'){echo('NO OF SCHOOLS');}else{echo('UDISE CODE');} ?></th>                        
                                                                <th>Part I</th>   
                                                                <th>Part II</th>
                                                                <th>Part III</th>
                                                                <th>Part IV</th>
                                                                <th>Part V</th>
                                                                <th>Part VI</th> 
                                                                <th>Part VII</th>                                                               
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                                if($this->uri->segment(3,0)=='dist'){
                                                                    $id='district_name';
                                                                    $idd='did';
                                                                }
                                                                elseif($this->uri->segment(3,0)=='blk'){
                                                                    $id='block_name';
                                                                    $idd='bid';
                                                                }
                                                                elseif($this->uri->segment(3,0)=='sch'){
                                                                    $id='school_name';
                                                                    $idd='did';
                                                                }
                                                                $totp1=$totp2=$totp3=$totp4=$totp5=$totp6=$totp7=$tot=0;
                                                                foreach($npc as $p){ 
                                                            ?>
                                                            <tr>
                                                                <th><a href="<?php echo base_url().'Home/profileCount/'.$next.'/'.$p[$idd];?>"><?php echo($p[$id]); ?></a> </th>
                                                                <th class="bg-primary text-white"><?php if($id!='school_name'){echo($p['tot']);$tot+=$p['tot'];}else{echo($p['udise_code']);$tot='-';} ?></th>                        
                                                                <th><?php  if($id=='school_name'){$totp1='-';if($p['p1']==1){echo('YES');}elseif($p['p1']==0){echo('NO');}}else{echo($p['p1']);$totp1+=$p['p1'];} ?></th>   
                                                                <th><?php  if($id=='school_name'){$totp2='-';if($p['p2']==1){echo('YES');}elseif($p['p1']==0){echo('NO');}}else{echo($p['p2']);$totp2+=$p['p2'];} ?></th>   
                                                                <th><?php  if($id=='school_name'){$totp3='-';if($p['p3']==1){echo('YES');}elseif($p['p1']==0){echo('NO');}}else{echo($p['p3']);$totp3+=$p['p3'];} ?></th>
                                                                <th><?php  if($id=='school_name'){$totp4='-';if($p['p4']==1){echo('YES');}elseif($p['p1']==0){echo('NO');}}else{echo($p['p4']);$totp4+=$p['p4'];} ?></th>     
                                                                <th><?php  if($id=='school_name'){$totp5='-';if($p['p5']==1){echo('YES');}elseif($p['p1']==0){echo('NO');}}else{echo($p['p5']);$totp5+=$p['p5'];} ?></th>     
                                                                <th><?php  if($id=='school_name'){$totp6='-';if($p['p6']==1){echo('YES');}elseif($p['p1']==0){echo('NO');}}else{echo($p['p6']);$totp6+=$p['p6'];} ?></th> 
                                                                <th><?php  if($id=='school_name'){$totp7='-';if($p['p7']==1){echo('YES');}elseif($p['p1']==0){echo('NO');}}else{echo($p['p7']);$totp7+=$p['p7'];} ?></th>                                                               
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    
                                                        <thead>
                                                            <tr class="bg-success">
                                                                <th >TOTAL </th>
                                                                <th class="bg-success text-white"><?php if($id!='school_name'){echo($tot);} ?></th>                        
                                                                <th><?php if($id!='school_name'){echo($totp1);} ?></th>   
                                                                <th><?php if($id!='school_name'){echo($totp2);} ?></th>   
                                                                <th><?php if($id!='school_name'){echo($totp3);} ?></th>
                                                                <th><?php if($id!='school_name'){echo($totp4);} ?></th>     
                                                                <th><?php if($id!='school_name'){echo($totp5);} ?></th>     
                                                                <th><?php if($id!='school_name'){echo($totp6);} ?></th> 
                                                                <th><?php if($id!='school_name'){echo($totp7);} ?></th>
                                                            </tr>
                                                        </thead>
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
    <?php $this->load->view('footer.php'); ?>
        
    <?php $this->load->view('scripts.php'); ?>   
    <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
    <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>                                  
    </body>
</html>