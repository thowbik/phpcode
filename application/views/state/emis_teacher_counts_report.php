
<?php $next='';
                                                                
                                                                switch(1){
                                                                    case $this->session->userdata('emis_state_id')!=null:{
                                                                        switch($this->uri->segment(3,0)){
                                                                            case '0':{
                                                                                $title='District';$index='District_Name';$next='EDU';$idval='District_Name';
                                                                                break;
                                                                            }
                                                                            case 'EDU':{
                                                                                $title='Educational District';$index='Edu_Dist_Name';$next='Block';$idval='Edu_Dist_Name';
                                                                                break;
                                                                            }
                                                                            case 'Block':{
                                                                                $title='Block';$index='Block_Name';$next='School';$idval='Block_Name';
                                                                                break;
                                                                            }
                                                                            case 'School':{
                                                                                $title='School';$index='School_Name';$idval='School_Name';
                                                                                break;
                                                                            }
                                                                        }
                                                                        break;
                                                                    }
                                                                    case $this->session->userdata('emis_district_id')!=null:{
                                                                         switch($this->uri->segment(3,0)){
                                                                            case '0':{
                                                                                $title='Educational District';$index='Edu_Dist_Name';$next='Block';$idval='Edu_Dist_Name';
                                                                                break;
                                                                            }
                                                                            case 'EDU':{
                                                                                $title='Educational District';$index='Edu_Dist_Name';$next='Block';$idval='Edu_Dist_Name';
                                                                                break;
                                                                            }
                                                                            case 'Block':{
                                                                                $title='Block';$index='Block_Name';$next='School';$idval='Block_Name';
                                                                                break;
                                                                            }
                                                                            case 'School':{
                                                                                $title='School';$index='School_Name';$idval='School_Name';
                                                                                break;
                                                                            }
                                                                        }
                                                                        break;
                                                                    }
                                                                    case $this->session->userdata('emis_deo_id')!=null:{
                                                                        switch($this->uri->segment(3,0)){
                                                                            case '0':{
                                                                                $title='Block';$index='Block_Name';$next='School';$idval='Block_Name';
                                                                                break;
                                                                            }
                                                                            case 'Block':{
                                                                                $title='Block';$index='Block_Name';$next='School';$idval='Block_Name';
                                                                                break;
                                                                            }
                                                                            case 'School':{
                                                                                $title='School';$index='School_Name';$idval='School_Name';
                                                                                break;
                                                                            }
                                                                        }
                                                                        break;
                                                                    }
                                                                    case $this->session->userdata('emis_block_id')!=null:{
                                                                        switch($this->uri->segment(3,0)){
                                                                            case '0':{
                                                                                $title='School';$index='School_Name';$idval='School_Name';
                                                                                break;
                                                                            }
                                                                            case 'Block':{
                                                                                $title='School';$index='School_Name';$idval='School_Name';
                                                                                break;
                                                                            }
                                                                            case 'School':{
                                                                                $title='School';$index='School_Name';$idval='School_Name';
                                                                                break;
                                                                            }
                                                                        }
                                                                        break;
                                                                    }
                                                                    case $this->session->userdata('emis_school_id')!=null:{
                                                                        switch($this->uri->segment(3,0)){
                                                                            case 0:{
                                                                                $title='School';$index='School_Name';$idval='School_Name';
                                                                                break;
                                                                            }
                                                                            case 'School':{
                                                                                $title='School';$index='School_Name';$idval='School_Name';
                                                                                break;
                                                                            }
                                                                        }
                                                                        break;
                                                                    }
                                                                }
?>
<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    <style>
    .icon>i {
        color: #cbd4e0;
        font-size: 42px !important;
    }
    .icon
    {
        margin-top:5% !important;

    }
    .dashboard-stat2 {
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    -ms-border-radius: 2px;
    -o-border-radius: 2px;
    border-radius: 2px;
    background: #fff;
    padding: 15px 15px 3px!important;
    
    }
    #breadcrumbs{
                color:#2bbaa5;
    }
    #breadcrumbs a{
                color:#2bbaa5;
                padding:2px;
    }
    </style>
        <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL STYLES -->       
        <!-- END PAGE LEVEL STYLES -->
    </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
        <?php 
            $this->load->view('allheader.php');
        ?>
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
                                        <h1>Users - <?php echo $title ?> Wise
                                        <br/>                                      
                                            <small id="breadcrumbs">
                                                            
                                                            <?php
                                                                foreach($new_user as $bread){
                                                                     
                                                                    //  print_r($bread->district_id);
                                                                     $breadcrumbs='';
                                                                     $crumbs_district = '<a href="'.base_url().'State/callteachercountreport/0/0">District</a> &GreaterGreater;';
                                                                     $crumbs_edudistrict = '<a href="'.base_url().'State/callteachercountreport/EDU/'.$bread->District_Name.'">Educational District</a> &GreaterGreater;';
                                                                     $crumbs_block = '<a href="'.base_url().'State/callteachercountreport/Block/'.$bread->Edu_Dist_Name.'">Block</a> &GreaterGreater;';
                                                                     $crumbs_school = 'School'; 
                                                                     break;
                                                                }
                                                                if($this->session->userdata('user_type')==5){
                                                                    $breadcrumbs=$crumbs_district;
                                                                    if($this->uri->segment(3,0)=='EDU'){
                                                                        $breadcrumbs.=$crumbs_edudistrict;
                                                                    }elseif($this->uri->segment(3,0)=='Block'){
                                                                        $breadcrumbs.=$crumbs_edudistrict.$crumbs_block;
                                                                    }elseif($this->uri->segment(3,0)=='School'){
                                                                        $breadcrumbs.=$crumbs_edudistrict.$crumbs_block.$crumbs_school;
                                                                    }
                                                                }
                                                                else{
                                                                    if($this->session->userdata('user_type')==9 || $this->session->userdata('user_type')==3){
                                                                        $breadcrumbs='District &GreaterGreater;'.$crumbs_edudistrict;
                                                                    }
                                                                    elseif($this->session->userdata('user_type')==10){
                                                                        $breadcrumbs='Education District &GreaterGreater;';
                                                                    }
                                                                    elseif($this->session->userdata('user_type')==6 || $this->session->userdata('user_type')==2){
                                                                        $breadcrumbs='Block &GreaterGreater;'.$crumbs_school;
                                                                    }
                                                                }
                                                                if($this->session->userdata('user_type')!=5){
                                                                    if($this->uri->segment(3,0)=='EDU'){
                                                                        $breadcrumbs.=$crumbs_edudistrict;
                                                                    }elseif($this->uri->segment(3,0)=='Block'){
                                                                        $breadcrumbs.=$crumbs_block;
                                                                    }elseif($this->uri->segment(3,0)=='School'){
                                                                        $breadcrumbs.=$crumbs_block.$crumbs_school;
                                                                    }
                                                                }
                                                                echo($breadcrumbs);
                                                            ?>
                                                               
                                                        
                                                    </small> 
                                        </h1>
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
                                    <div class="page-content-inner">           
                                                        <!-- BEGIN CARDS -->
                                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                                <div class="bs-callout-mediumaquamarine dashboard-stat2" style="background: #FA8072  ">
                                                                    <div class="display">
                                                                        <div class="number">
                                                                            <h3 style="color: white;">
                                                                                                <span class="bottom" data-counter="counterup" data-value="34">Today</span>

                                                                                                    </h3>
																		</br><div class="row">
																		<div class="col-md-12">
																		<div class="col-md-6">	<h3 style="color: white;"><?php if(!empty($today_user_count_last)){ echo number_format($today_user_count_last[0]->Teacher_Count);}else{ echo '0'; } ?></h3>						
                                                                        
																		</div>
																		<div class="col-md-6">
																		<h3 style="color: white;"><?php if(!empty($today_user_count)){ echo number_format($today_user_count[0]->Teacher_Count);}else{ echo '0'; } ?></h3>
																		</div>
																		</div>
																		</div>
																		<div class="row">
																		<center>
																		<div class="col-md-6">
																		<h4 style="color: white;">
																		<span class="bottom" data-counter="counterup" data-value="34">Users</span></h4>
																		</div></center>
																		<div class="col-md-6">
																		<h4 style="color: white;">
																		<span class="bottom" data-counter="counterup" data-value="34">New</span></h4>
																		</div>
																		</div>
                                                                        </div>
																		
                                                                       
                                                                    </div>
																	

                                                                </div>
                                                            </div>
                                                        
                                                            <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                                <div class="bs-callout-mediumaquamarine dashboard-stat2" style="background: #6e7725e0" >
                                                                    <div class="display">
                                                                        <div class="number">
                                                                            <h3 style="color: white;">
                                                                                                <span class="bottom" data-counter="counterup" data-value="34">This Week</span>

                                                                                                    </h3>
</br>																									<div class="row">
																									<div class="col-md-6">
                                                                       
																	   <h3 style="color: white;"><?php if(!empty($thisweek_user_count_last)){ echo number_format($thisweek_user_count_last[0]->Teacher_Count);}else{ echo '0'; } ?></h3>
																	  
																		</div>
																		<div class="col-md-6">
																		  <h3 style="color: white;"><?php if(!empty($thisweek_user_count)){ echo number_format($thisweek_user_count[0]->Teacher_Count);}else{ echo '0'; } ?></h3>
																		</div>
																		</div>
																		<div class="row">
																									                                                                        <div class="col-md-6">
																		<h4 style="color: white;">
																		<span class="bottom" data-counter="counterup" data-value="34">Users</span></h4>
																		</div>
																		<div class="col-md-6">
																		<h4 style="color: white;">
																		<span class="bottom" data-counter="counterup" data-value="34">New</span></h4>
																		</div>
																		</div>
                                                                        </div>
                                                                        
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                                <div class="bs-callout-mediumaquamarine dashboard-stat2" style="background: #5f2630e6" >
                                                                    <div class="display">
                                                                        <div class="number">
                                                                            <h3 style="color: white;">
                                                                                                <span class="bottom" data-counter="counterup" data-value="34">This Month</span>

                                                                                                    </h3>
																									</br>
																									<div class="row">
																									<div class="col-md-6">
																									<h3 style="color: white;"><?php if(!empty($thismonth_user_count_last)){ echo number_format($thismonth_user_count_last[0]->Teacher_Count);}else{ echo '0'; } ?></h3>
                                                                        
																		</div>
																		<div class="col-md-6">
																		
																		<h3 style="color: white;"><?php if(!empty($thismonth_user_count)){ echo number_format($thismonth_user_count[0]->Teacher_Count);}else{ echo '0'; } ?></h3>
																		</div>
																		</div>
																		<div class="row">
																									                                                                      <div class="col-md-6">
																		<h4 style="color: white;">
																		<span class="bottom" data-counter="counterup" data-value="34">Users</span></h4>
																		</div>
																		<div class="col-md-6">
																		<h4 style="color: white;">
																		<span class="bottom" data-counter="counterup" data-value="34">New</span></h4>
																		</div>
																		</div>
																		
                                                                        </div>
                                                                       
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        
                                                            <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                                <div class="bs-callout-mediumaquamarine dashboard-stat2" style="background: #435492e3">
                                                                    <div class="display">
                                                                        <div class="number">
                                                                            <h3 style="color: white;">
                                                                                                <span class="bottom" data-counter="counterup" data-value="34">Overall</span>

                                                                                                    </h3>
																									</br>
																									<div class="row">
																									                                                                 <div class="col-md-6">
                                                                       
                                                                  <h3 style="color: white;"><?php if(!empty($thisyear_user_count_last)){ echo number_format($thisyear_user_count_last[0]->Teacher_Count);}else{ echo '0'; } ?></h3>																	   
																		</div>
																		<div class="col-md-6" >
																		<h3 style="color: white;"><?php if(!empty($thisyear_user_count)){ echo number_format($thisyear_user_count[0]->Teacher_Count);}else{ echo '0'; } ?></h3>
																		
																		</div>
																		</div>
																		<div class="row">
																									                                                                        <div class="col-md-6">
																		<h4 style="color: white;">
																		<span class="bottom" data-counter="counterup" data-value="34">Users</span></h4>
																		</div>
																		<div class="col-md-6">
																		<h4 style="color: white;">
																		<span class="bottom" data-counter="counterup" data-value="34">New</span></h4>
																		</div>
																		</div>
                                                                        </div>
                                                                        <!--<div class="icon">
                                                                            <i class="fa fa-users"></i>
                                                                        </div>-->
                                                                    </div>

                                                                </div>
                                                            </div>
															  
                                                        </a>
                                        
                                                        <!-- END CARDS -->
                                    

                                                        <div class="portlet-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                                    <div class="page-content-inner">
                                                                        
                                                                        <div class="portlet light portlet-fit ">
                                                                            <?php if($this->session->flashdata('errors')){?>
                                                                            <div class="portlet-body">
                                                                                <div class ="row">
                                                                                    <div class="col-md-4">
                                                                                        <font style="color:#dd4b39;"><?php echo $this->session->flashdata('errors'); ?></font>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <?php } $user_type_id = $this->session->userdata('emis_user_type_id');?> 
                                                                            <!-- <div class="row"> -->
                                                                                <!-- <div class="col-md-12">
                                                                                    <form id="text_form_id" name="text_form_id" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                                                                                                <table class="table table-striped">
                                                                                                    <tr>
                                                                                                        <th style="width:300px;" id="th_scheme">
                                                                                                            <label class="control-label bold">Scheme Names</label>
                                                                                                            <select class="form-control"  id="scheme_name" name="schname">
                                                                                                                <option value=""><br/>Choose Scheme</option>
                                                                                                                <?php
                                                                                                                    
                                                                                                                
                                                                                                                foreach($scheme as $s){ 
                                                                                                                if($s->appli_highclass <= 8){ ?>
                                                                                                                    <option value="<?php echo($s->id); ?>" data-low="<?php echo($s->appli_lowclass); ?>" data-high="<?php echo($s->appli_highclass); ?>" <?php if($schemeid==$s->id){echo('selected');} ?> ><?php echo($s->scheme_name); ?></option>
                                                                                                                <?php } }?>
                                                                                                            </select>     
                                                                                                        </th>
                                                                                                        <th style="width:300px;" id="th_medium">
                                                                                                            <label class="control-label bold">Medium Of Instruction</label>
                                                                                                            <select class="form-control"  id="medium_name" name="medname">
                                                                                                                <option value="">Choose Medium</option>
                                                                                                                <?php foreach($mediumofinstruction as $M){ ?>
                                                                                                                        <option value="<?php echo($M->MEDINSTR_ID); ?>"  <?php if($mediumid==$M->MEDINSTR_ID){echo('selected');} ?> ><?php echo($M->MEDINSTR_DESC); ?></option>
                                                                                                                <?php } ?>
                                                                                                            </select> 
                                                                                                        </th>
                                                                                                        <th style="padding-top: 12.5px;" id="th_btn_submit">
                                                                                                            <br />
                                                                                                            <button type="submit" id="dee_rpt_btn_submit" name="dee_rpt_btn_submit" class="btn green btn-md">Submit</button>
                                                                                                        </th>
                                                                                                    </tr>
                                                                                                </table>
                                                                                    </form>
                                                                                </div> -->

                                                                                
                                                                            <!-- </div> -->
                                                                        </div>         
                                                                    </div>
                                                                    <div class="portlet box green">
                                                                            <div class="portlet-title">
                                                                                <div class="caption">
                                                                                <i class="fa fa-globe"></i><?php echo $title ?>wise Users List </div>
                                                                                <div class="tools"> </div>
                                                                            </div>
                                                                            <div class="portlet-body">
                                                                            <div class="row">
                                                                            <!-- <form id="user_rpt_form_id" name="user_rpt_form_id" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>"> -->
                                                                                    <div class="col-md-3">
                                                                                      <!-- From : <input type="date" class="form-control" id="from_date" name="from_date" onkeypress="return false" /> -->
                                                                                    </div>
                                                                                    
                                                                                    <div class="col-md-3">
                                                                                      <!-- TO: <input type="date" class="form-control" id="to_date" name="to_date" onkeypress="return false" /> -->
                                                                                    </div>
                                                                                    <!-- <button type="submit" id="user_rpt_btn_submit" name="user_rpt_btn_submit" class="btn green btn-md">Submit</button> -->
                                                                                    <button style="visibility:hidden;">DDDD</button>
                                                                            <!-- </form> -->
                                                                            </div> 
                                                                            <br/>    
                                                                            <table class="table table-striped table-bordered table-hover district" id="sample_2" style="text-align: center;">
                                                                                                                <thead>
                                                                                                                    <tr class="portlet box green" >    
                                                                                                                    <th style="text-align: center;">S.No</th>
                                                                                                                    <th style="text-align: left;"><?php echo $title; ?></th>
               <th style="text-align: center;">Total No.Of Teachers</th>                                                                                                     <th style="text-align: center;">Teachers  Logged In Count</th>
			         <?php if($title=='School')
					 {
						 ?>
					<th style="text-align: center;">Teachers Not Logged In Count</th> 
<?php					
					 }
					 ?>
                             <!--<th style="text-align: center;">Teachers Not Logged In Count</th>  -->                                                                                     </tr>
                                                                                                                    
                                                                                                                </thead>                                                
                                                                                                                <tbody>
                                                                                                                <?php $i=1; $finaltotal = 0;
                                                                                                                            foreach($new_user as $u){  
                                                                                                                                
                                                                                                                        ?>
                                                                                                                            
                                                                                                                            <tr>
                                                                                                                            <td style="text-align: center;"><?php echo($i++); ?></td>
                                                                                                                            <td style="text-align: left;"><?php if($next!=''){ ?>
                                                                                                                               <a href="<?php echo(base_url().'State/callteachercountreport/'.$next.'/'.$u->$idval); ?>">
                                                                                                                               <?php echo($u->$index); ?></a><?php } else{echo($u->$index);} ?></td>
                      <td style="text-align: center;"><?php echo($u->total_teacher); $teachertotal += $u->total_teacher;?></td>                                                                                            <td style="text-align: center;"><?php echo($u->Logged); $finaltotal += $u->Logged;?></td>
					  <?php if($title=='School')
					 {
						 ?>
					
					 <td><a  href="<?php echo base_url().'state/getteacher_unlogged?schoolid='.$u->school_id?>"><?php echo $p=($u->total_teacher - $u->Logged); $final += $p;?></a></td> 
<?php					
					 }
                                                                                                                             ?>
                                                                                                                            </tr>
                                                                                                                    <?php } ?>
                                                                                                                </tbody>
                                                                                                                <tfoot>
                                                                                                                    <tr class="bg-primary text-white">
                                                                                                                       <td colspan="2" style="text-align: left;">Total</td>    
                                                                                                                       <td style="text-align: center;"><?php echo $teachertotal; ?></td>
																													  <td style="text-align: center;"><?php echo $finaltotal; ?></td>
                 <?php if($title=='School')
					 {
						 ?>
                  <td style="text-align: center;"><?php echo $final; ?></td>				
				  
				  <?php					
					 }
                                                                                                                             ?>
				  </tr>
					                                                                                                    </tfoot>
                                                                                </table>
                                                                                                            

                                                                            </div>
                                                                        </div>
                                                                <!-- END EXAMPLE TABLE PORTLET-->
																
																<!-- center table -->
																
																
																	<!-- <div class="portlet box green schooltop" id ="schooltop">
                                                                            <div class="portlet-title">
                                                                                <div class="caption">
                                                                                <i class="fa fa-globe"></i>Users Active in Last 30 days </div>
                                                                                <div class="tools"> </div>
                                                                            </div>
                                                                            <div class="portlet-body">
                                                                            <div class="row">
                                                                            
                                                                                    <div class="col-md-3">
                                                                                     
                                                                                    </div>
                                                                                    
                                                                                    <div class="col-md-3">
                                                                                   
                                                                                    </div>
                                                                                   
                                                                                    <button style="visibility:hidden;">DDDD</button>
                                                                           
                                                                            </div> 
                                                                            <br/> 
<style>
.dataTables_scrollHeadInner{
	width:100% !important;
}
</style>																			
                                                                            <table class="table table-striped table-bordered table-hover district" id="sample_1" style="text-align: center;width:100% !important;">
                                                                                                                <thead>
                                                                                                                    <tr class="portlet box green" >    
                                                                                                                    <th style="text-align: center;">S.No</th>
                                                                                                                     <th style="text-align: left;"><?php echo $title; ?></th>
                                                                                                                   <th style="text-align: center;">Active User Count </th>
                                                                                                                   </tr>
                                                                                                                    
                                                                                                                </thead>                                                
                                                                                                                <tbody>
                                                                                                                <?php $i=1; $finaltotal = 0;
                                                                                                                            foreach($users_active_lastmonth as $u){  
                                                                                                                                
                                                                                                                        ?>
                                                                                                                            
                                                                                                                            <tr>
                                                                                                                            <td style="text-align: center;"><?php echo($i++); ?></td>
                                                                                                                           <td style="text-align: left;"><?php if($next!=''){ ?>
                                                                                                                               
                                                                                                                               <?php echo($u->$index); ?><?php } else{echo($u->$index);} ?></td>
																															   
																															   
                                                                                                                 <td style="text-align: center;"><?php echo($u->tech); $finaltotal += $u->tech;?></td>
                                                                                                                                                                                                                              </tr>
                                                                                                                    <?php } ?>
                                                                                                                </tbody>
                                                                                                             
                                                                                </table>
                                                                                                            

                                                                            </div>
                                                                        </div> -->
																	
																	<!-- center table -->

																	
                                                                      <!--<div class="portlet box green schooltop" id ="schooltop">
                                                                            <div class="portlet-title">
                                                                              
                                                                                <div class="tools"> </div>
                                                                            </div>
                                                                            <div class="portlet-body">
                                                                            <div class="row">
                                                                           
                                                                                    </div>
                                                                                    
                                                                                    <div class="col-md-3">
                                                                                      
                                                                                    </div>
                                                                                    
                                                                                    <button style="visibility:hidden;">DDDD</button>
                                                                            
                                                                            </div> 
                                                                            <br/> 
																			<style>
																					.dataTables_scrollHeadInner{
																						width:100% !important;
																					}
																			</style>																			
                                                                            <!--<table class="table table-striped table-bordered table-hover district" 
																			id="sample_3" style="text-align: center;width:100% !important;">
                                                                                                                <thead>
                                                                                                                    <tr class="portlet box green" >    
                                                                                                                    <th style="text-align: center;">S.No</th>
                                                                                                                    <th style="text-align: left;">School</th>
                                                                                                                    <th style="text-align: center;">Teacher Name</th>                       
																													<th style="text-align: center;">No. of Views</th>
                                                                                                                   </tr>
                                                                                                                    
                                                                                                                </thead>                                                
                                                                                                                <tbody>
                                                                                                                <?php $i=1; $finaltotal = 0;
                                                                                                                            foreach($new_staff_view as $u){  
                                                                                                                                
                                                                                                                        ?>
                                                                                                                            
                                                                                                                            <tr>
                                                                                                                            <td style="text-align: center;"><?php echo($i++); ?></td>
                                                                                                                            <td style="text-align: left;"><?php echo($u->School_Name .'<br>'.$u-> Block_Name .','.$u->Edu_Dist_Name .','. $u->District_Name);?>
                                                                                                                              </td>
																															<td style="text-align: center;"><?php echo($u->Teacher_Name);?></td>                                                 
																												            <td style="text-align: center;"><?php echo($u->views); $finaltotal += $u->views;?></td>
                                                                                                                           </tr>
                                                                                                                    <?php } ?>
                                                                                                                </tbody>
                                                                                                             <!--   <tfoot>
                                                                                                                    <tr class="bg-primary text-white">
                                                                                                                       <td colspan="2" style="text-align: left;">Total</td>    
                                                                                                                       <td style="text-align: center;"> </td>
																													  <td style="text-align: center;"><?php echo $finaltotal; ?></td>
                    
				</tr>
                                                                                                                </tfoot> 
                                                                                </table>
                                                                                                            

                                                                            </div>
                                                                        </div>-->

																	<!-- 2 table end -->      
                                                                    </div>
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
        <script src="<?php echo base_url().'asset/js/state.js';?>" type="text/javascript"></script>
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
		<?php echo $this->session->userdata('emis_school_id');?>
	 	
<script type="text/javascript">
// top 20 users school leavel hide and shows

 // $(document).ready(function(){
	
   // var  shows = '<?php if(array_key_exists("emis_school_id",$this->session->userdata()))
                      // {
							// echo $this->session->userdata('emis_school_id');
	                  // }
						// else
						// {
							// echo 0;
						// }
	// ?>';
	 // // alert(shows);
    // if(shows != 0) {
		// // alert('if');
        // $('.schooltop').hide();
    // }
    // else
    // {
		// // alert('else');
        // $('.schooltop').show();
    // }
 // });
</script>

		<script>
		
        /*** On ready For Hide Medium Field */
        $(document).ready(function(){
            sum_dataTable('#sample_3');
	    });
        function sum_dataTable(dataId){
    window.table = $(dataId).DataTable({
      dom: 'Blfrtip',
    //   scrollY: 100,
    //   scrollX: true
      "sScrollX": "100%",
        
        buttons: [
                { extend: 'print', className: 'btn default' },
                { extend: 'pdf', className: 'btn default' },
                { extend: 'csv', className: 'btn default' }
            ],
            order: [[0, "asc"]],
            lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            pageLength: 10,
            "footerCallback": function ( row, data, start, end, display ) {
        this.api().columns('.sum').every(function () {
            var column = this;
          var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
            var sum = column
               .data()
               .reduce(function (a, b) { 
                console.log(a);
                   a = intVal(a, 10);
                   if(isNaN(a)){ a = 0; }
                   
                   b = intVal(b, 10);
                   if(isNaN(b)){ b = 0; }
                   
                   return a + b;
               });
column.selector.opts.page='current';
               var currentPage = column
               .data()
               .reduce(function (a, b) { 
                   a = parseInt(a, 10);
                   if(isNaN(a)){ a = 0; }
                   
                   b = parseInt(b, 10);
                   if(isNaN(b)){ b = 0; }
                   
                   return a + b;
               });
               
            
            $(column.footer()).html(sum);
                        });
            }
        });
    }
        </script>


    </body>

</html>